<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();
        error_reporting(0);
        date_default_timezone_set("Asia/Kolkata");
        if (!$this->session->userdata('multitech_uid')) {
            redirect('/');
        }
    }

    

    public function index() {
        
        
        $business_id=$this->session->userdata('multitech_uid');
        $sql="SELECT count(`vehicle_id`) as cnt FROM `vehicle_master` ";
        $result=$this->db->query($sql)->result_array();
        $data['total_bus']=$result[0]['cnt'];

     
        
        $driver=0;
        $conductor=0;
        $staff=0;

        $technician=0;
        $collections=0;
        $panelty=0;

        $driver_collection=0;
        $conductor_panelty=0;

        $ticket_count=0;


      
        $sql="SELECT count(staff_id)as cnt,`type` FROM `staff_master` where status=1 GROUP BY type";
      
        $result=$this->db->query($sql)->result_array();
        foreach($result as $rs)
        {
            if($rs['type']=='d')  $driver=$rs['cnt']; 
            if($rs['type']=='c')  $conductor=$rs['cnt'];
            if($rs['type']=='t')  $technician=$rs['cnt'];
            if($rs['type']=='s')  $staff=$rs['cnt'];


        }
      
        $data['technician']=$technician;
        $data['driver']=$driver;
        $data['conductor']=$conductor;
        $data['staff']=$staff;

      
        $sql="SELECT l.vehicle_no FROM log_master l INNER JOIN vehicle_maintanance v on l.log_id=v.log_id WHERE  closing_time is not null and v.status=0 GROUP BY l.vehicle_no;";
        $this->db->query($sql);
        $data['maintanance']= $this->db->affected_rows();


        $sql="SELECT count(log_id) as cnt FROM log_master WHERE  closing_time is null ";
        $result=$this->db->query($sql)->result_array();
        $data['left']= $result[0]['cnt'];


        $sql="SELECT count(log_id) as cnt FROM log_master WHERE  closing_time is not null and date_format(closing_time,'%Y-%m-%d')=CURDATE();";
        $result=$this->db->query($sql)->result_array();
        $arrive=$result[0]['cnt'];
        $data['arrive']= $result[0]['cnt'];




        $sql="SELECT *,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile,date_format(departure_time,'%h:%i %p') as dtime FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id WHERE l.closing_time IS NULL";
		$data['on_road']=$this->db->query($sql)->result_array();	
        
        $sql="SELECT *,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile,date_format(departure_time,'%h:%i %p') as dtime FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id WHERE l.closing_time IS NOT NULL and DATE_FORMAT(closing_time,'%Y-%m-%d')=CURDATE();";
		$data['collection']=$this->db->query($sql)->result_array();
        $total_collection=0;
        $sql="SELECT sum(cash_collection) as amt,sum(phone_pay_collection) as pamt,sum(payment_due) as panelty,sum(ticket_count) as ticket_count FROM log_master WHERE closing_time IS NOT NULL and DATE_FORMAT(closing_time,'%Y-%m-%d')=CURDATE();";
		$result=$this->db->query($sql)->result_array();
        // $total_collection=$this->db->query($sql)->result_array()[0]['amt'];
        $total_collection=$result[0]['amt']+$result[0]['pamt'];
		
        $data['phonepay']=round($result[0]['pamt'],2);
        $data['cash_collection']=round($result[0]['amt'],2);
        $data['panelty']=round($result[0]['panelty'],2);
        $data['ticket_count']=$result[0]['ticket_count'];


        $data['collections']=round($total_collection,2);
        $sql="SELECT sum(credit) as amt FROM staff_transaction WHERE DATE_FORMAT(date,'%Y-%m-%d')=CURDATE() and log_id>0";
		$result=$this->db->query($sql)->result_array();
        $panelty_collection=$result[0]['amt'];

        $data['panelty_collection']=round($panelty_collection,2);

        //license
        $driver_license_expired=0;
        $conductor_license_expired=0;
        $driver_license_expiring=0;
        $conductor_license_expiring=0;

        $sql="SELECT count(`staff_id`) as cnt ,DATEDIFF(`valid_till`,CURDATE())  as diff,type FROM `staff_master` WHERE (type='c' OR type='d') and DATEDIFF(`valid_till`,CURDATE())<=15 GROUP BY DATEDIFF(`valid_till`,CURDATE()),type";
		$result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            if($rs['type']=='c')
            {
                $conductor_license_expired+=($rs['diff']<=0?1:0);
                $conductor_license_expiring+=($rs['diff']>0?1:0);

            }
            else {
                $driver_license_expired+=($rs['diff']<=0?1:0);
                $driver_license_expiring+=($rs['diff']>0?1:0);

            }
            
            # code...
        }

        $data['driver_license_expired']=$driver_license_expired;
        $data['conductor_license_expired']=$conductor_license_expired;
        $data['driver_license_expiring']=$driver_license_expiring;
        $data['conductor_license_expiring']=$conductor_license_expiring;



        
        // $sql="SELECT count(log_id) as cnt FROM `log_master` WHERE DATE_FORMAT(`log_date`,'%Y-%m-%d')=CURDATE() and `closing_time` is not null";
		// $result=$this->db->query($sql);
        // $no_bus=$result->result_array()[0]['cnt'];
        // $no_bus=($no_bus==0?1:$no_bus);

        $data['average']=round($total_collection/($arrive==0?1:$arrive),2);

                
        $not_gone=0;
        // if($total_bus>($left+$arrive))
     
        // {
            // $sql="SELECT count(v.vehicle_id) as cnt FROM vehicle_master v WHERE (SELECT distinct  vehicle_id FROM `log_master` WHERE `vehicle_no`=v.vehicle_no and DATE_FORMAT(`log_date`,'%Y-%m-%d')=CURDATE()) IS NULL;";
		    // $not_gone=$this->db->query($sql)->result_array()[0]['cnt'];
        // }
        // $data['notgone']=$not_gone;
       



        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidebar');       
        $this->load->view('dashboard',$data);
        $this->load->view('layouts/footer');
    }



    public function maintanance_list()
    {
         
        $user_id=$this->session->userdata('multitech_uid');     
        $d=$this->input->post();
        $data['vehicle_no']=$d['vehicle_no'];
        $data['log_id']=$d['log_id'];

        $sql="SELECT * FROM `staff_master` WHERE `type`='t'";
        $data['technician']=$this->db->query($sql)->result_array();

        $sql="SELECT * FROM technician_assign t INNER JOIN staff_master s on t.technician_staff_id=s.staff_id WHERE t.log_id='".$d['log_id']."'";
        $data['assign_tech']=$this->db->query($sql)->result_array();


        $sql="SELECT * FROM vehicle_maintanance v INNER JOIN work_master w on v.work_id=w.work_id where v.log_id='".$d['log_id']."'";
        $data['issue']=$this->db->query($sql)->result_array();
        

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');       
        $this->load->view('maintanance/maintanance_list',$data);
        $this->load->view('layouts/footer');
    }

    public function update_remarks()
    {
        $d=$this->input->post();
        $sql="UPDATE `vehicle_maintanance` SET `remarks`='".$d['remarks']."' WHERE `id`='".$d['m_id']."'";
        $this->db->query($sql);

       echo 1;
    }
    


    public function update_status()
    {
        $d=$this->input->post();
        $sql="UPDATE `vehicle_maintanance` SET `status`='".$d['status']."' WHERE `id`='".$d['m_id']."'";
        $this->db->query($sql);
        $sql="SELECT * FROM `vehicle_maintanance` WHERE `log_id`='".$d['log_id']."' and status=0";
        $this->db->query($sql);
        echo json_encode($this->db->affected_rows());
    }

    public function technician_de_assign()
    {
        $d=$this->input->post();
        $sql="DELETE FROM `technician_assign`  WHERE `log_id`='".$d['log_id']."' and `technician_staff_id`='".$d['tech_id']."'";
        $this->db->query($sql);
        echo 1;
    }
    public function assign_technician()
    {
        $d=$this->input->post();
        $sql="SELECT * FROM `technician_assign` WHERE `log_id`='".$d['log_id']."' and `technician_staff_id`='".$d['tech_id']."'";
        $this->db->query($sql);
        if($this->db->affected_rows()==0)
        {
            $sql="INSERT INTO `technician_assign`(`log_id`, `technician_staff_id`) VALUES ('".$d['log_id']."','".$d['tech_id']."')";
            $this->db->query($sql);
            echo 1;
        }
        else
        {
            echo 3;
        }
       
    }

    public function maintanance() {        
        
        $user_id=$this->session->userdata('multitech_uid');     
        $sql="SELECT l.log_id,l.vehicle_no,d.name as dname,d.contact_no as dmobile,count(v.id) as cnt FROM (log_master l INNER JOIN vehicle_maintanance v on l.log_id=v.log_id) INNER JOIN staff_master d on l.driver_staff_id=d.staff_id WHERE  l.closing_time is not null and v.status=0 GROUP BY l.log_id,l.vehicle_no,d.name,d.contact_no order by l.vehicle_no;";
        $data['maintanance']=$this->db->query($sql)->result_array();
        

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');       
        $this->load->view('maintanance/maintanance',$data);        
        $this->load->view('layouts/footer');

        
    }
    public function logout()
    {
        $this->session->unset_userdata('multitech_uid');
        $this->session->unset_userdata('multitech_user_name');
        $this->session->unset_userdata('multitech_mobile_no');
        $this->session->unset_userdata('multitech_role_id');
        
        redirect('/');
    }

  

    public function change_password() {
        $data['page_name'] = 'Settings';
        $data['page_element'] = 'Reset Password';
        
        $this->load->view('layouts/header',$business);
        $this->load->view('layouts/sidebar');
        $this->load->view('settings/changepassword', $data);
        $this->load->view('layouts/footer');
    }

 

    public function reset_password()
    {
        $this->load->library('encryption');
        $uid = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        $opwd=$d['opwd'];
        $npwd=$d['npwd'];
       
		
        $sql="SELECT * FROM `user_master` WHERE `u_id`='".$uid."'";
        $result=$this->db->query($sql)->result_array();
        foreach($result as $rs)
        {
			if($this->encryption->decrypt($rs['password'])==$opwd)
			{
				$sql="UPDATE `user_master` SET `password`='".$this->encryption->encrypt($npwd)."' WHERE `u_id`='".$uid."'";
				$this->db->query($sql);
				echo 1;
			}
			else
			{
				echo 0;
			}
        }

    }
}
