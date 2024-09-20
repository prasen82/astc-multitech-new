<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {

        parent::__construct();
        error_reporting(0);
        date_default_timezone_set("Asia/Kolkata");
        if (!$this->session->userdata('multitech_uid')) {
            redirect('/');
        }
    }
    public function staff() {
        $data['page_name'] = 'Staffs';
        $data['type'] = 's';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='s' and is_deleted=0 and status=1 ORDER BY balance desc");
        $data['staff'] = $sql->result_array();

        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/staff', $data);
        $this->load->view('layouts/footer');
    }
    public function driver() {
        $d=$this->input->post();
        $agency=($d?($d['agency']=='0'?'':' and s.agency='.$d['agency']):'');
        $data['agency_id']=($d?$d['agency']:0);
        $data['page_name'] = 'Drivers';
        $data['type'] = 'd';     
        $user_id = $this->session->userdata('multitech_uid');
          
        $sql ="SELECT s.*,a.name as agency_name FROM staff_master s INNER JOIN staff_master a on s.agency=a.staff_id WHERE s.type='d' and s.is_deleted=0  and s.status=1  ".$agency." ORDER BY s.name";
        // echo $sql;
        // return;
        $query= $this->db->query($sql);
        $data['staff'] = $query->result_array();

        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/staff', $data);
        $this->load->view('layouts/footer');
    }

    public function transaction()
    {
        $d=$this->input->post();
        $data['page_name'] = 'Transaction Details';
        $sql="SELECT s.remarks,date_format(s.date,'%d-%m-%Y') as dt,l.vehicle_no,CONCAT(l.route_no,' - ',l.route_name) as route,l.target,l.total,l.payment_due,s.debit as balance,s.credit as paid FROM staff_transaction s LEFT JOIN log_master l on s.log_id=l.log_id WHERE s.staff_id='".$d['staff_id']."' order by s.date;";
        $result=$this->db->query($sql);
        $data['transaction']=$result->result_array();

        $data['type']=$d['type'];
        $data['name']=$d['staff_name'];
        $data['contact_no']=$d['contact_no'];

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/transaction', $data);
        $this->load->view('layouts/footer');
    }
    public function conductors() {
        $d=$this->input->post();
        $d=$this->input->post();
        $agency=($d?($d['agency']=='0'?'':' and s.agency='.$d['agency']):'');
        $data['agency_id']=($d?$d['agency']:0);

        $data['page_name'] = 'Conductors';
        $data['type'] = 'c';     
        $user_id = $this->session->userdata('multitech_uid');
        // $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='c' and status=1 ORDER BY balance desc");
        $sql = $this->db->query("SELECT s.*,a.name as agency_name FROM staff_master s INNER JOIN staff_master a on s.agency=a.staff_id WHERE s.type='c' and s.is_deleted=0 and s.status=1 ".$agency." ORDER BY s.name");
       
        $data['staff'] = $sql->result_array();

      
        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/staff', $data);
        $this->load->view('layouts/footer');
    }
    public function technicians() {
        $data['page_name'] = 'Technicians';
        $data['type'] = 't';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='t' and is_deleted=0 and status=1 ORDER BY name");
        $data['staff'] = $sql->result_array();
        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/staff', $data);
        $this->load->view('layouts/footer');
    }

    

    public function bus_not_gone() {
        $data['page_name'] = 'Bus None';
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT *,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile FROM (vehicle_master v INNER JOIN staff_master d on d.staff_id=v.driver_staff_id) INNER JOIN staff_master c on c.staff_id=v.conductor_staff_id WHERE (SELECT distinct vehicle_id FROM `log_master` WHERE `vehicle_no`=v.vehicle_no and DATE_FORMAT(`log_date`,'%Y-%m-%d')=CURDATE()) IS NULL;";
        $data['left']=$this->db->query($sql)->result_array();        


          
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus_not_gone', $data);
        $this->load->view('layouts/footer');
    }

    public function bus_left() {
        $data['page_name'] = 'Bus Left';
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT *,date_format(log_date,'%d-%m-%Y') as ldate, date_format(departure_time,'%h:%i %p') as dtime,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile FROM (log_master l INNER JOIN staff_master d on d.staff_id=l.driver_staff_id) INNER JOIN staff_master c on c.staff_id=l.conductor_staff_id WHERE  closing_time is null;";
        $data['left']=$this->db->query($sql)->result_array();        


          
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus_left', $data);
        $this->load->view('layouts/footer');
    }

    public function bus_arrived() {
        $data['page_name'] = 'Bus Arrived';
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT *,date_format(departure_time,'%d-%m-%Y') as ddate,date_format(closing_time,'%d-%m-%Y') as cdate, date_format(departure_time,'%h:%i %p') as dtime,date_format(closing_time,'%h:%i %p') as atime,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile FROM (log_master l INNER JOIN staff_master d on d.staff_id=l.driver_staff_id) INNER JOIN staff_master c on c.staff_id=l.conductor_staff_id WHERE   date_format(l.closing_time,'%Y-%m-%d')=CURDATE();";
        $data['arrived']=$this->db->query($sql)->result_array();     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus_arrived', $data);
        $this->load->view('layouts/footer');
    }

    public function bus_collection() {
        $data['page_name'] = "Today's Collection";
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT *,date_format(departure_time,'%d-%m-%Y') as ddate,date_format(closing_time,'%d-%m-%Y') as cdate, date_format(departure_time,'%h:%i %p') as dtime,date_format(closing_time,'%h:%i %p') as atime,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile FROM (log_master l INNER JOIN staff_master d on d.staff_id=l.driver_staff_id) INNER JOIN staff_master c on c.staff_id=l.conductor_staff_id WHERE   date_format(l.closing_time,'%Y-%m-%d')=CURDATE();";
        $data['arrived']=$this->db->query($sql)->result_array();     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus_collection', $data);
        $this->load->view('layouts/footer');
    }

    public function panelty() {
        $data['page_name'] = "Today's Pending";
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT *,date_format(departure_time,'%d-%m-%Y') as ddate,date_format(closing_time,'%d-%m-%Y') as cdate, date_format(departure_time,'%h:%i %p') as dtime,date_format(closing_time,'%h:%i %p') as atime,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile FROM (log_master l INNER JOIN staff_master d on d.staff_id=l.driver_staff_id) INNER JOIN staff_master c on c.staff_id=l.conductor_staff_id WHERE   date_format(l.closing_time,'%Y-%m-%d')=CURDATE() and payment_due>0;";
        $data['arrived']=$this->db->query($sql)->result_array();     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus_collection', $data);
        $this->load->view('layouts/footer');
    }


    public function panelty_collection() {
        $data['page_name'] = "Today's Pending Collection";
        $user_id = $this->session->userdata('multitech_uid');

        $sql="SELECT * FROM (staff_transaction st INNER JOIN staff_master s on st.staff_id=s.staff_id) LEFT JOIN log_master l on st.log_id=l.log_id WHERE DATE_FORMAT(date,'%Y-%m-%d')=CURDATE() and st.log_id>0 and credit >0";
        $data['arrived']=$this->db->query($sql)->result_array();     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/panelty_collection', $data);
        $this->load->view('layouts/footer');
    }


    public function licence_expired_driver() {
        $data['page_name'] = "Driver's Licence Expired";
        $user_id = $this->session->userdata('multitech_uid');
        $type='d';

        $sql="SELECT  *,DATE_FORMAT(`valid_till`,'%d-%m-%Y') as dt FROM `staff_master`  WHERE type='".$type."' and DATEDIFF(`valid_till`,CURDATE())<=0";
      
        $data['staff']=$this->db->query($sql)->result_array();   
        $data['type']=$type;  
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/licence_expired', $data);
        $this->load->view('layouts/footer');
    }


    public function licence_expiring_driver() {
        $data['page_name'] = "Driver's Licence Expiring in 15 days";
        $user_id = $this->session->userdata('multitech_uid');
        $type='d';

        $sql="SELECT  *,DATE_FORMAT(`valid_till`,'%d-%m-%Y') as dt, DATEDIFF(`valid_till`,CURDATE()) days FROM `staff_master`  WHERE type='".$type."' and DATEDIFF(`valid_till`,CURDATE())<=15 and DATEDIFF(`valid_till`,CURDATE())>0";
      
        $data['staff']=$this->db->query($sql)->result_array();   
        $data['type']=$type;  
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/licence_expiring', $data);
        $this->load->view('layouts/footer');
    }

    public function licence_expired_conductor() {
        $data['page_name'] = "Conductor's Licence Expired";
        $user_id = $this->session->userdata('multitech_uid');
        $type='c';

        $sql="SELECT  *,DATE_FORMAT(`valid_till`,'%d-%m-%Y') as dt FROM `staff_master`  WHERE type='".$type."' and DATEDIFF(`valid_till`,CURDATE())<=0";
      
        $data['staff']=$this->db->query($sql)->result_array();   
        $data['type']=$type;  
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/licence_expired', $data);
        $this->load->view('layouts/footer');
    }

  
    public function licence_expiring_conductor() {
        $data['page_name'] = "Conductor's Licence Expiring in 15 days";
        $user_id = $this->session->userdata('multitech_uid');
        $type='c';

        $sql="SELECT  *,DATE_FORMAT(`valid_till`,'%d-%m-%Y') as dt, DATEDIFF(`valid_till`,CURDATE()) days FROM `staff_master`  WHERE type='".$type."' and DATEDIFF(`valid_till`,CURDATE())<=15 and DATEDIFF(`valid_till`,CURDATE())>0";
      
        $data['staff']=$this->db->query($sql)->result_array();   
        $data['type']=$type;  
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/licence_expiring', $data);
        $this->load->view('layouts/footer');
    }


    public function bus() {
        $data['page_name'] = 'Buses';
       
        $user_id = $this->session->userdata('multitech_uid');
     
        $sql = $this->db->query("SELECT v.vehicle_id,v.vehicle_no,v.driver_staff_id as driver_id,v.conductor_staff_id as conductor_id, d.name as driver_name,d.contact_no as driver_mobile,c.name as conductor_name,c.contact_no as conductor_mobile FROM (vehicle_master v INNER JOIN staff_master d on v.driver_staff_id=d.staff_id) INNER JOIN staff_master c on v.conductor_staff_id=c.staff_id order by `vehicle_no`;");
        $data['bus'] = $sql->result_array();

     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/bus', $data);
        $this->load->view('layouts/footer');
    }
   

    public function logsheet() {
        $data['page_name'] = 'Vehicle Logsheet Report';
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT l.*,r.target as rtarget,l.log_id,l.vehicle_no, d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(log_date,'%d-%m-%Y') as ldate,DATE_FORMAT(departure_time,'%h:%i %p') as dtime,DATE_FORMAT(closing_time,'%h:%i %p') as ctime,ad.name as dagency,ac.name as cagency FROM ((((log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id) INNER JOIN route_master r on r.route_no=l.route_no) INNER JOIN staff_master ad on d.agency=ad.staff_id) INNER JOIN staff_master ac on c.agency=ac.staff_id where DATE_FORMAT(log_date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(log_date,'%Y-%m-%d')<='".$dtt."' order by log_date ;";
       
    
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     

        $sql = $this->db->query("SELECT * FROM `route_master` ORDER BY `route_no`");
        $data['route'] = $sql->result_array();   
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/logsheetreport', $data);
        $this->load->view('layouts/footer');
    }

    public function collection_statement() {
        $data['page_name'] = 'Collection Statement';
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT *,d.agency as dagency,c.agency as cagency,l.log_id,l.vehicle_no, d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(log_date,'%d-%m-%Y') as ldate,DATE_FORMAT(departure_time,'%h:%i %p') as dtime,DATE_FORMAT(closing_time,'%h:%i %p') as ctime FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where DATE_FORMAT(closing_time,'%Y-%m-%d') >='".$dtf."' and DATE_FORMAT(closing_time,'%Y-%m-%d')<='".$dtt."' order by closing_time ;";
       
    
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();    
        // $data['log'] = "";     

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/collection_statement', $data);
        $this->load->view('layouts/footer');
    }
public function update_draft()
{
    $d=$this->input->post();
   
    $sql="UPDATE `salary_bill_master` SET `no_of_days_work`='".$d['working_days']."',`extra_days_work`='".$d['extra_working_days']."',`total_working_days`='".$d['total_working_days']."',`total_salary_days`='".$d['total_salary_days']."',`total_wages_payable`='".$d['total_wages']."',`leave_wages`='".$d['leave_wages']."',`bonus`='".$d['bonus']."',`gross_income`='".$d['gross_income']."',`pf_deduction`='".$d['pf_deduction']."',`esic_deduction`='".$d['esic_deduction']."',`advance_deduction`='".$d['advance_deduction']."',`total_deduction`='".$d['total_deduction']."',`net_salary_payable`='".$d['salary_payable']."',`eployers_pf_contribution`='".$d['pf_employer_contribution']."',`eployers_esic_contribution`='".$d['esic_employer_contribution']."',`p_tax`='".$d['p_tax']."',`allowance`='".$d['allowance']."' WHERE `bill_id`='".$d['bill_id']."'";
    $this->db->query($sql);
    echo $this->db->affected_rows();
}



public function rebate_report() {
    $data['page_name'] = 'Rebate Report';
   
    $user_id = $this->session->userdata('multitech_uid');
    $d=$this->input->post();
    if($d)
    {
        $dtf=$d['from'];
        $dtt=$d['to'];
    }
    else 
    {
        $dtf=date('Y-m-d');
        $dtt=date('Y-m-d');
    }
    
    
    $data['from']=$dtf;
    $data['to']=$dtt;
    $sql="SELECT a.name as agency_name,st.remarks,debit,credit,s.name as name,s.type,s.contact_no as mobile,s.agency,DATE_FORMAT(st.date,'%d-%m-%Y') as dt,st.transaction_type FROM (staff_transaction st INNER JOIN staff_master s on st.staff_id=s.staff_id) LEFT JOIN staff_master a on s.agency=a.staff_id WHERE transaction_type=2 and  DATE_FORMAT(st.date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(st.date,'%Y-%m-%d')<='".$dtt."' order by st.date ";
     

    $query = $this->db->query($sql);
    
    $data['transaction'] = $query->result_array();     
  
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar');
    $this->load->view('report/rebate_history', $data);
    $this->load->view('layouts/footer');
}


    public function transaction_history() {
        $data['page_name'] = 'Transaction History';
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT s.agency,st.remarks,l.target,l.total,debit,credit,s.name as name,s.type,s.contact_no as mobile,s.agency,l.vehicle_no,DATE_FORMAT(st.date,'%d-%m-%Y') as dt,l.route_name,l.route_no,l.depo,st.transaction_type,a.name as agency_name FROM ((staff_transaction st INNER JOIN staff_master s on st.staff_id=s.staff_id) LEFT JOIN staff_master a on s.agency=a.staff_id) LEFT JOIN log_master l on st.log_id=l.log_id where DATE_FORMAT(st.date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(st.date,'%Y-%m-%d')<='".$dtt."' order by st.date ";
          
        $query = $this->db->query($sql);
        
        $data['transaction'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/transaction_history', $data);
        $this->load->view('layouts/footer');
    }

    public function driver_penalty() {
        $data['page_name'] = "Driver's Penalty ";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $type="d";
        $data['type']=$type;

        $data['back']="driver_penalty";
        $sql="SELECT *,DATE_FORMAT(date,'%d-%m-%Y') as pdate,sm.name as sname,a.name as agency_name FROM (staf_absent_master sa INNER JOIN staff_master sm on sa.staff_id=sm.staff_id) INNER JOIN staff_master a on sm.agency=a.staff_id WHERE sm.type='".$type."' and  DATE_FORMAT(sa.date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(sa.date,'%Y-%m-%d')<='".$dtt."' order by sa.date ";
          
        $query = $this->db->query($sql);
        
        $data['penalty'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/penalty_history', $data);
        $this->load->view('layouts/footer');
    }

    public function conductor_penalty() {
        $data['page_name'] = "Conductor's Penalty ";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $type="c";
        $data['type']=$type;

        $data['back']="conductor_penalty";
        $sql="SELECT *,DATE_FORMAT(date,'%d-%m-%Y') as pdate,sm.name as sname,a.name as agency_name FROM (staf_absent_master sa INNER JOIN staff_master sm on sa.staff_id=sm.staff_id) INNER JOIN staff_master a on sm.agency=a.staff_id WHERE sm.type='".$type."' and  DATE_FORMAT(sa.date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(sa.date,'%Y-%m-%d')<='".$dtt."' order by sa.date ";
          
      
        $query = $this->db->query($sql);
        
        $data['penalty'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/penalty_history', $data);
        $this->load->view('layouts/footer');
    }

    public function agency_penalty() {
        $data['page_name'] = "Agency's Penalty ";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $type="a";
        $data['type']=$type;

        $data['back']="agency_penalty";
        $sql="SELECT *,DATE_FORMAT(date,'%d-%m-%Y') as pdate,sm.name as sname FROM staf_absent_master sa INNER JOIN staff_master sm on sa.staff_id=sm.staff_id WHERE sm.type='".$type."' and  DATE_FORMAT(sa.date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(sa.date,'%Y-%m-%d')<='".$dtt."' order by sa.date ";
          
        $query = $this->db->query($sql);
        
        $data['penalty'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/penalty_history', $data);
        $this->load->view('layouts/footer');
    }

    public function attendance_d() {
        $data['page_name'] = 'Driver Attendance Sheet';
      
        $data['back']="driver_attendance";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='d';
      
        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT s.name as sname,s.staff_id as sid,a.name as agency_name ,s.contact_no as mobile,s.* FROM  (log_master l INNER JOIN staff_master s on l.driver_staff_id=s.staff_id) INNER JOIN staff_master a on s.agency=a.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$month."'  GROUP BY s.name,s.staff_id order by s.name;";
        // $sql="SELECT count(log_id) as cnt,ROUND(sum(l.cash_collection),2) as amt, s.name as sname,s.staff_id,s.agency ,s.contact_no as mobile FROM  log_master l INNER JOIN staff_master s on l.driver_staff_id=s.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$month."'  GROUP BY s.name,s.staff_id order by s.name;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/attendance_sheet_driver', $data);

        $this->load->view('layouts/footer');
    }

    public function bill_draft_driver() {
       
        $sql="SELECT DATE_FORMAT(bill_month,'%M-%Y') as month FROM `salary_bill_master` WHERE is_final=0 GROUP BY bill_month ORDER BY bill_month DESC LIMIT 1";
        $result=$this->db->query($sql)->result_array();
        $draft_month=($result[0]?" For The Month Of ".$result[0]['month']:'');
        $data['page_name'] = 'Draft Salary Bill of Drivers'.$draft_month;
      
        $data['back']="draft_bill_driver";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        // if($d)
        // {
        //     $month=$d['month'];
          
          
        // }
        // else 
        // {
        //     $month=date('Y-m');
          
        // }
        
        $data['type']='d';
        $employee_type="d";
        $data['emp_type']=$employee_type;



      
        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=0  and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }

    public function bill_draft_conductor() {
       
        $sql="SELECT DATE_FORMAT(bill_month,'%M-%Y') as month FROM `salary_bill_master` WHERE is_final=0 GROUP BY bill_month  ORDER BY bill_month DESC LIMIT 1";
        $result=$this->db->query($sql)->result_array();
        $draft_month=($result[0]?" For The Month Of ".$result[0]['month']:'');
        $data['page_name'] = 'Draft Salary Bill of Conductors'.$draft_month;
      
        $data['back']="draft_bill_conductor";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        // if($d)
        // {
        //     $month=$d['month'];
          
          
        // }
        // else 
        // {
        //     $month=date('Y-m');
          
        // }
        
        $data['type']='d';
        $employee_type="c";
        $data['emp_type']=$employee_type;



      
        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=0  and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }

    public function bill_draft_staff() {
       
        $sql="SELECT DATE_FORMAT(bill_month,'%M-%Y') as month FROM `salary_bill_master` WHERE is_final=0 GROUP BY bill_month ORDER BY bill_month DESC LIMIT 1";
        $result=$this->db->query($sql)->result_array();
        $draft_month=($result[0]?" For The Month Of ".$result[0]['month']:'');
        $data['page_name'] = 'Draft Salary Bill of Staff'.$draft_month;
      
        $data['back']="draft_bill_staff";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        // if($d)
        // {
        //     $month=$d['month'];
          
          
        // }
        // else 
        // {
        //     $month=date('Y-m');
          
        // }
        
        $data['type']='d';
        $employee_type="s";
        $data['emp_type']=$employee_type;



      
        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=0  and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }

    public function bill_final_driver() {
        $data['page_name'] = 'Final Salary Bill of Drivers';
      
        $data['back']="final_bill_driver";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="d";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }

    public function bill_final_conductor() {
        $data['page_name'] = 'Final Salary Bill of Conductors';
      
        $data['back']="final_bill_conductor";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="c";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }
    public function bill_final_staff() {
        $data['page_name'] = 'Final Salary Bill of Staffs';
      
        $data['back']="final_bill_staff";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="s";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/salary_bill', $data);

        $this->load->view('layouts/footer');
    }

    // PF Statement
    public function pf_statement_driver() {
        $data['page_name'] = 'PF / ESIC Statement of Drivers';
      
        $data['back']="pf_statement_driver";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="d";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/pf_statement', $data);

        $this->load->view('layouts/footer');
    }

    public function pf_statement_conductor() {
        $data['page_name'] = 'PF / ESIC Statement of Conductors';
      
        $data['back']="pf_statement_conductor";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="c";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/pf_statement', $data);

        $this->load->view('layouts/footer');
    }
    public function pf_statement_staff() {
        $data['page_name'] = 'PF / ESIC Statement of Staffs';
      
        $data['back']="pf_statement_staff";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="s";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/pf_statement', $data);

        $this->load->view('layouts/footer');
    }

    // ESIC Statement
    public function esic_statement_driver() {
        $data['page_name'] = 'ESIC Statement of Drivers';
      
        $data['back']="esic_statement_driver";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="d";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/esic_statement', $data);

        $this->load->view('layouts/footer');
    }

    public function esic_statement_conductor() {
        $data['page_name'] = 'ESIC Statement of Conductors';
      
        $data['back']="esic_statement_conductor";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="c";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/esic_statement', $data);

        $this->load->view('layouts/footer');
    }
    public function esic_statement_staff() {
        $data['page_name'] = 'ESIC Statement of Staffs';
      
        $data['back']="esic_statement_staff";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');
          
        }
        
        $data['type']='f';
        $employee_type="s";
        $data['emp_type']=$employee_type;

        $data['month']=$month;
        // $data['to']=$dtt;
        $sql="SELECT *,s.name as sname,b.designation as desig,b.emp_id as empid,b.bank_ac_no as bank,b.ifsc_code as ifsc FROM salary_bill_master b INNER JOIN staff_master s on b.staff_id=s.staff_id WHERE is_final=1 and  DATE_FORMAT(`bill_month`,'%Y-%m')='".$month."' and s.type='".$employee_type."' order by s.name;";

        $query = $this->db->query($sql);
        
        $data['salary'] = $query->result_array();   
        
      
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/esic_statement', $data);

        $this->load->view('layouts/footer');
    }

    public function attendance_c() {
        $data['page_name'] = 'Conductor Attendance Sheet';
      
        $data['back']="conductor_attendance";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $month=$d['month'];
          
          
        }
        else 
        {
            $month=date('Y-m');          
        }
        
        $data['type']='c';
      
        $data['month']=$month;
        // $data['to']=$dtt;
        
        $sql="SELECT s.name as sname,s.staff_id as sid,a.name as agency_name ,s.contact_no as mobile,s.* FROM  (log_master l INNER JOIN staff_master s on l.conductor_staff_id=s.staff_id) INNER JOIN staff_master a on s.agency=a.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$month."'  GROUP BY s.name,s.staff_id order by s.name;";

        // $sql="SELECT count(log_id) as cnt,ROUND(sum(l.cash_collection),2) as amt, s.name as sname,s.staff_id,s.agency ,s.contact_no as mobile FROM  log_master l INNER JOIN staff_master s on l.conductor_staff_id=s.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$month."'  GROUP BY s.name,s.staff_id order by s.name;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/attendance_sheet_conductor', $data);

        $this->load->view('layouts/footer');
    }

      public function conductor_collection() {
        $data['page_name'] = 'Conductor Collection Report';
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT depo,route_no,route_name,(sum(opening_charge)-sum(closing_charge)) as consumed_soc,(sum(closing_meter_reading)-sum(opening_meter_reading)) as covered_km, l.vehicle_no,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(closing_time,'%d-%m-%Y') as dt,sum(cash_collection) as cash,sum(machine_collection) as machine,place FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where DATE_FORMAT(closing_time,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(closing_time,'%Y-%m-%d')<='".$dtt."' GROUP BY depo,route_no,route_name, l.vehicle_no,c.name,c.contact_no,dt,place order by dt  ;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/conductor_collection', $data);
        // $this->load->view('report/conductor_wise_collection', $data);

        $this->load->view('layouts/footer');
    }


    public function conductor_wise_collection() {
        $data['page_name'] = 'Conductor Collection Report';
        $data['type'] = 'c';
        $staff_id="";
        $staff_name="";
        $data['back']="conductor_wise_collection";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
            $staff_id=$d['staff_id'];
            $staff_name=$d['staff_name'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        $data['staff_id']=$staff_id;
        $data['staff_name']=$staff_name;
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT d.name as dname,d.contact_no as dmobile,depo,route_no,route_name,(opening_charge-closing_charge) as consumed_soc,(closing_meter_reading-opening_meter_reading) as covered_km, l.vehicle_no,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(closing_time,'%d-%m-%Y') as dt,`machine_collection`,`fooding`,`pump`,`parking`,`fastag`,`extra`,`total`,`cash_collection`,`manual`,place,l.target,l.payment_due/2 as payment_due  FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where DATE_FORMAT(closing_time,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(closing_time,'%Y-%m-%d')<='".$dtt."'  and l.conductor_staff_id='".$staff_id."' order by dt  ;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/conductor_wise_collection', $data);

        $this->load->view('layouts/footer');
    }

    public function driver_wise_collection() {
        $data['page_name'] = 'Driver Collection Report';
        $data['type'] = 'd';
        $staff_id="";
        $staff_name="";
        $data['back']="driver_wise_collection";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
            $staff_id=$d['staff_id'];
            $staff_name=$d['staff_name'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        $data['staff_id']=$staff_id;
        $data['staff_name']=$staff_name;
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT d.name as dname,d.contact_no as dmobile,depo,route_no,route_name,(opening_charge-closing_charge) as consumed_soc,(closing_meter_reading-opening_meter_reading) as covered_km, l.vehicle_no,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(closing_time,'%d-%m-%Y') as dt,`machine_collection`,`fooding`,`pump`,`parking`,`fastag`,`extra`,`total`,`cash_collection`,`manual`,place,l.target,l.payment_due/2 as payment_due FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where DATE_FORMAT(closing_time,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(closing_time,'%Y-%m-%d')<='".$dtt."'  and l.driver_staff_id='".$staff_id."' order by dt  ;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/conductor_wise_collection', $data);

        $this->load->view('layouts/footer');
    }


    public function vehicle_wise_collection() {
        $data['page_name'] = 'Vehicle Collection Report';
        $data['type'] = 'v';
        $staff_id="";
        $staff_name="";
        $data['back']="vehicle_wise_collection";
       
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];
            $staff_id=$d['staff_id'];
            $staff_name=$d['staff_name'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        $data['staff_id']=$staff_id;
        $data['staff_name']=$staff_name;
        $data['from']=$dtf;
        $data['to']=$dtt;
        $sql="SELECT d.name as dname,d.contact_no as dmobile,depo,route_no,route_name,(opening_charge-closing_charge) as consumed_soc,(closing_meter_reading-opening_meter_reading) as covered_km, l.vehicle_no,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(closing_time,'%d-%m-%Y') as dt,`machine_collection`,`fooding`,`pump`,`parking`,`fastag`,`extra`,`total`,`cash_collection`,`manual`,place FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where DATE_FORMAT(closing_time,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(closing_time,'%Y-%m-%d')<='".$dtt."'  and l.vehicle_no='".$staff_name."' order by l.log_date  ;";
        $query = $this->db->query($sql);
        
        $data['log'] = $query->result_array();     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/conductor_wise_collection', $data);

        $this->load->view('layouts/footer');
    }


    public function daybook() {

        $d=$this->input->post();
        if($d)
        {
            $dt=$d['date'];
        }
        else 
        {
            $dt=date('Y-m-d');
        }

        
        $data['date']=$dt;
        $data['page_name'] = 'Products';
        $data['page_element'] = 'All Product';
        $businessid = $this->session->userdata('multitech_uid');

        $sql="SELECT p.product_name,sum(od.qty) as qty,sum(od.amount) as amt,p.unit,(select i.image from image_master i where id=SUBSTRING_INDEX(p.image, ',', 1)) as img FROM (order_master o INNER JOIN order_details od on o.id=od.order_id) INNER JOIN product_master p on od.product_id=p.product_id where DATE_FORMAT(o.order_date,'%Y-%m-%d')='".$dt."' and o.business_id='".$businessid."' and o.status=3 group by p.product_name,p.image,p.unit order by amt desc;";
		
        $data['item_sale']=$this->db->query($sql)->result_array();	
        $business['business_name']=$this->session->userdata('restaurant_business_name');
        $this->load->view('layouts/header',$business);
        $this->load->view('layouts/sidebar');
        $this->load->view('report/daybook', $data);
        $this->load->view('layouts/footer');
    }

    public function statement() {

        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }

        $data['from']=$dtf;
        $data['to']=$dtt;

        $data['page_name'] = 'Products';
        $data['page_element'] = 'All Product';
        $businessid = $this->session->userdata('multitech_uid');
        $sql="SELECT DATE_FORMAT(`order_date`,'%Y-%m-%d') as dt,sum(od.amount) as amt FROM order_master o INNER JOIN order_details od on o.id=od.order_id  WHERE DATE_FORMAT(`order_date`,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(`order_date`,'%Y-%m-%d')<='".$dtt."'  and o.business_id='".$businessid."' and o.status=3  group by dt order by dt;";
        $data['sale'] = $this->db->query($sql)->result_array();
        $business['business_name']=$this->session->userdata('restaurant_business_name');
        $this->load->view('layouts/header',$business);
        $this->load->view('layouts/sidebar');
        $this->load->view('report/statement', $data);
        $this->load->view('layouts/footer');
    }


    public function product_wise_sale() {

        $d=$this->input->post();
        if($d)
        {
            $dtf=$d['from'];
            $dtt=$d['to'];

        }
        else 
        {
            $dtf=date('Y-m-d');
            $dtt=date('Y-m-d');
        }
        
        
        $data['from']=$dtf;
        $data['to']=$dtt;
        $businessid = $this->session->userdata('multitech_uid');

        $sql = "SELECT p.product_name,sum(qty) as qty,sum(od.amount) as amt, p.unit,(select i.image from image_master i where id=SUBSTRING_INDEX(p.image, ',', 1)) as img FROM (product_master p INNER JOIN order_details od on p.product_id=od.product_id) INNER JOIN order_master o on od.order_id=o.id WHERE DATE_FORMAT(o.order_date,'%Y-%m-%d')>='".$dtf."' and DATE_FORMAT(o.order_date,'%Y-%m-%d')<='".$dtt."' and o.business_id='".$businessid."'  and o.status=3 group by p.product_name,p.unit,img;";
   
        $data['item_sale'] = $this->db->query($sql)->result_array();    		
        $business['business_name']=$this->session->userdata('restaurant_business_name');
        $this->load->view('layouts/header',$business);
        $this->load->view('layouts/sidebar');      
		$this->load->view('report/product_wise_sale',$data);		
        $this->load->view('layouts/footer');
    }
   
}
