<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct() {

        parent::__construct();
        error_reporting(0);
      
        $this->load->library('encryption');
        date_default_timezone_set("Asia/Kolkata");
        if (!$this->session->userdata('multitech_uid')) {
            redirect('/');
        }
    }


    
   
    public function user() {
        $data['page_name'] = 'Users';
   
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT * FROM user_master u INNER JOIN role_master r on u.role_id=r.role_id WHERE `u_id`>1 ORDER BY `name`;");
        $data['user'] = $sql->result_array();


        $sql = $this->db->query("SELECT * FROM `role_master`  ORDER BY `role_id`");
        $data['role'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('settings/user', $data);
        $this->load->view('layouts/footer');
    }
    public function settings()
    {
        $sql="SELECT * FROM `salary_allowance_deduction_setup` ";
        $query=$this->db->query($sql);
        echo json_encode($query->result_array());
    }
    public function staff() {
        $data['page_name'] = 'Staffs';
        $data['type'] = 's';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT *, date_format(block_date,'%d-%m-%Y') as bdate FROM `staff_master` WHERE `type`='s' and `is_deleted`=0 ORDER BY name");
        $data['staff'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/staff', $data);
        $this->load->view('layouts/footer');
    }

    public function driver() {
        $data['page_name'] = 'Drivers';
        $data['type'] = 'd';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT s.*, date_format(s.block_date,'%d-%m-%Y') as bdate,date_format(s.valid_till,'%d-%m-%Y') as ldate,a.name as agency_name FROM staff_master s INNER JOIN staff_master a on s.agency=a.staff_id WHERE s.type='d' and s.is_deleted=0 ORDER BY name");
        $data['staff'] = $sql->result_array();

        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/staff', $data);
        $this->load->view('layouts/footer');
    }
    public function route() {
        $data['page_name'] = 'Routes';
       
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT * FROM `route_master` order by route_no");
        $data['route'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/route', $data);
        $this->load->view('layouts/footer');
    }

    public function maintanance() {
        $data['page_name'] = 'Maintenance';
       
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT * FROM `work_master` order by work_id");
        $data['work'] = $sql->result_array();

       
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/maintanance', $data);
        $this->load->view('layouts/footer');
    }


    public function log_close()
    {
        $user_id = $this->session->userdata('multitech_uid');
        $d=$this->input->post();
        date_default_timezone_set('Asia/Kolkata');

        // Then call the date functions
        $date = date('Y-m-d H:i:s');
        $time = date('H:i:s');

        if ($time<16 && $d['route_no']=='99')
        {
            echo "d";
            return;
        }

       
        $sql="UPDATE `log_master` SET `closing_time`='".$date."',`closing_charge`='".$d['closing_soc']."', `charge_consumed`=`opening_charge`-".$d['closing_soc'].",`closing_meter_reading`='".$d['closing_km']."',`distance_covered`=".$d['closing_km']."-`opening_meter_reading`,`closing_remarks`='".$d['remarks']."',`close_by`='".$user_id."',`cash_collection`='".$d['cash_collection']."',`machine_collection`='".$d['machine_collection']."',`ticket_count`='".$d['ticket_count']."',`phone_pay_collection`='".$d['phone_pay']."',`total`='".$d['total']."',`payment_due`='".$d['payment_due']."',`target`='".$d['target']."' WHERE `log_id`='".$d['log_id']."'";
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            $work=explode("!",$d['work']);
            foreach($work as $wk)
            {
                if($wk!="")
                {
                    $sql="INSERT INTO `vehicle_maintanance`(`log_id`, `work_id`) VALUES ('".$d['log_id']."','".$wk."')";
                    $this->db->query($sql);
                }
               
            }

            $bal=0;
            if($d['payment_due']>0)
            {
                $bal=round($d['payment_due']/2,2);
                $sql="INSERT INTO `staff_transaction`( `staff_id`, `debit`, `log_id`) VALUES ('".$d['driver_id']."','".$bal."','".$d['log_id']."')";
                $this->db->query($sql);
                

                $sql="INSERT INTO `staff_transaction`( `staff_id`, `debit`, `log_id`) VALUES ('".$d['conductor_id']."','".$bal."','".$d['log_id']."')";
                $this->db->query($sql);
            }

            if($d['driver_payment']>0)
            {
                $sql="INSERT INTO `staff_transaction`( `staff_id`, `credit`, `log_id`) VALUES ('".$d['driver_id']."','".$d['driver_payment']."','".$d['log_id']."')";
                $this->db->query($sql);
            }

            if($d['conductor_payment']>0)
            {
                $sql="INSERT INTO `staff_transaction`( `staff_id`, `credit`, `log_id`) VALUES ('".$d['conductor_id']."','".$d['conductor_payment']."','".$d['log_id']."')";
                $this->db->query($sql);
            }

            $balance_update_driver=$bal-$d['driver_payment'];
            $balance_update_conductor=$bal-$d['conductor_payment'];

           if($balance_update_driver!=0) $this->balance_update($d['driver_id'],$balance_update_driver);
           if($balance_update_conductor!=0)   $this->balance_update($d['conductor_id'],$balance_update_conductor);


           
        }
        echo json_encode($this->db->affected_rows());
    }

    public function finalize()
    {
        $previous_month=date("M-Y",strtotime("-1 Month"))   ;   
        $d=$this->input->post();
        $sql="SELECT * FROM `salary_bill_master` WHERE `is_final`=0 and `employee_type`='".$d['type']."'";
        $result=$this->db->query($sql)->result_array();
        foreach($result as $rs)
        {
            if($rs['advance_deduction']>0)
            {
                $sql="INSERT INTO `staff_transaction`( `staff_id`, `credit`,remarks,transaction_type) VALUES ('".$rs['staff_id']."','".$rs['advance_deduction']."','Adjusted from the salary of ".$previous_month."','4')";
                $this->db->query($sql);
                $sql="UPDATE `staff_master` SET `balance`=`balance`-".$rs['advance_deduction']." WHERE `staff_id`='".$rs['staff_id']."'";
                $this->db->query($sql);
            }          


        }
        $sql="UPDATE `salary_bill_master` SET `is_final`=1 WHERE is_final=0 and `employee_type`='".$d['type']."'";
        $this->db->query($sql);
       
        echo $this->db->affected_rows();
    }

    public function balance_update($staff_id,$balance)
    {
        $sql="UPDATE `staff_master` SET `balance`=`balance`+".$balance." WHERE `staff_id`='".$staff_id."'";
        $this->db->query($sql);
    }
// Check is_absent of driver anductor while saving departure log
   
    public function log_save()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        date_default_timezone_set('Asia/Kolkata');
       
        $time = date('H:i:s');

        if ($time>12 && $d['route_no']=='99')
        {
            echo json_encode("c");
            return;
        }

        // Then call the date functions
        $date = date('Y-m-d H:i:s');

        $sql="SELECT * FROM `log_master` WHERE (`vehicle_no`='".$d['vehicle_no']."' or driver_staff_id='".$d['driver_id']."' or `conductor_staff_id`='".$d['conductor_id']."') and closing_time is null;";
        $this->db->query($sql);
        if($this->db->affected_rows()>=1)
        {
            echo json_encode("d");
        }
        else
        {
            $sql="INSERT INTO `log_master`(`vehicle_no`,`depo`, `driver_staff_id`, `conductor_staff_id`, `route_no`, `route_name`, `opening_charge`,  `opening_meter_reading`,`departure_reamrks`,`place`,`departure_by`, `log_date`, `departure_time`,`target`) VALUES ('".$d['vehicle_no']."','".$d['depo']."','".$d['driver_id']."','".$d['conductor_id']."','".$d['route_no']."','".$d['route']."','".$d['opening_soc']."','".$d['opening_reading']."','".$d['remarks']."','".$d['place']."','".$user_id."','".$date."','".$date."','".$d['target']."')";
            $this->db->query($sql);

            $sql="SELECT * FROM `log_master` WHERE `vehicle_no`='".$d['vehicle_no']."' and date_format(`log_date`,'%Y-%m-%d')=CURDATE();";
            $result=$this->db->query($sql)->result_array();

          echo $result[0]['log_id'];

        }
       
    }


    public function log_update()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        date_default_timezone_set('Asia/Kolkata');

        // Then call the date functions
        $date = date('Y-m-d H:i:s');

        $sql="SELECT * FROM `log_master` WHERE (`vehicle_no`='".$d['vehicle_no']."' or driver_staff_id='".$d['driver_id']."' or `conductor_staff_id`='".$d['conductor_id']."') and `log_id`<>'".$d['logsheet_id']."' and closing_time is null;";
        $this->db->query($sql);
        if($this->db->affected_rows()>=1)
        {
            echo json_encode("d");
        }
        else
        {
            // $sql="INSERT INTO `log_master`(`vehicle_no`,`depo`, `driver_staff_id`, `conductor_staff_id`, `route_no`, `route_name`, `opening_charge`,  `opening_meter_reading`,`departure_reamrks`,`place`,`departure_by`, `log_date`, `departure_time`,`target`) VALUES ('".$d['vehicle_no']."','".$d['depo']."','".$d['driver_id']."','".$d['conductor_id']."','".$d['route_no']."','".$d['route']."','".$d['opening_soc']."','".$d['opening_reading']."','".$d['remarks']."','".$d['place']."','".$user_id."','".$date."','".$date."','".$d['target']."')";
          $sql="UPDATE `log_master` SET `driver_staff_id`='".$d['driver_id']."',`conductor_staff_id`='".$d['conductor_id']."',`route_no`='".$d['route_no']."',`route_name`='".$d['route']."',`opening_charge`='".$d['opening_soc']."',`opening_meter_reading`='".$d['opening_reading']."',`departure_reamrks`='".$d['remarks']."',`target`='".$d['target']."' WHERE `log_id`='".$d['logsheet_id']."'";
            $this->db->query($sql);

            $sql="SELECT * FROM `log_master` WHERE `log_id`='".$d['logsheet_id']."' ;";
            $result=$this->db->query($sql)->result_array();

          echo $result[0]['log_id'];
     
        }
       
    }


    public function departure_log()
    {
        $driver_balance=$conductor_balance=0;
        $d=$this->input->post();
        $sql="SELECT *,d.balance as dbalance,c.balance as cbalance,l.driver_staff_id,l.conductor_staff_id,DATE_FORMAT(l.log_date,'%d-%m-%Y') as ldate,DATE_FORMAT(l.departure_time,'%h:%i %p') as dtime, d.name as dname,c.name as cname,d.contact_no as dmobile,c.contact_no as cmobile FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where l.vehicle_no='".$d['vehicle_no']."' and `closing_time` is NULL ORDER BY `log_date` DESC LIMIT 1;";
        $result=$this->db->query($sql)->result_array(); 
        $data['log']=$result;
        // foreach($result as $lg)
        // {
        //     // $driver_balance=$this->staff_balance($lg['driver_staff_id']);
        //     // $conductor_balance=$this->staff_balance($lg['conductor_staff_id']);

        //     $driver_balance=$this->staff_balance($lg['driver_staff_id']);
        //     $conductor_balance=$this->staff_balance($lg['conductor_staff_id']);


        // // }
        // $data['driver_balance']=$driver_balance;
        // $data['conductor_balance']=$conductor_balance;
        echo json_encode($data);

    }

    public function staff_balance($staff_id)
    {
        $balance=0;
        $sql="SELECT (sum(debit)-sum(credit)) as balance FROM `staff_transaction` WHERE `staff_id`='".$staff_id."'";
        $result=$this->db->query($sql)->result_array(); 
        $balance=($result[0]?$result[0]['balance']:0);
        return (is_null($balance)?0:$balance);
    }

    public function vehicle()
    {
        $d=$this->input->post();
        $sql="SELECT *, d.status as dstatus,c.status as cstatus,d.name as dname,c.name as cname,d.contact_no as dmobile,c.contact_no as cmobile FROM (vehicle_master v INNER JOIN staff_master d on v.driver_staff_id=d.staff_id) INNER JOIN staff_master c on v.conductor_staff_id=c.staff_id where v.vehicle_no='".$d['vehicle_no']."'";
       $query=$this->db->query($sql)->result_array();
        $data['bus']=$query;

        $driver_staff_id=$query[0]['driver_staff_id'];
        $conductor_staff_id=$query[0]['conductor_staff_id'];

        $data['driver_penalty']=$this->is_penalty_driver($driver_staff_id);
        $data['conductor_penalty']=$this->is_penalty_conductor($conductor_staff_id);


        $sql="SELECT * FROM `log_master` WHERE vehicle_no='".$d['vehicle_no']."' ORDER BY log_date DESC LIMIT 1";
        $result=$this->db->query($sql)->result_array();
        $log_id=$result[0]['log_id'];

        $data['opening_soc']=$result[0]['closing_charge'];
        $data['opening_km']=$result[0]['closing_meter_reading'];


        $sql="SELECT * FROM vehicle_maintanance v INNER JOIN work_master w on v.work_id=w.work_id WHERE `log_id`='".$log_id."' and status=0 order by id";
        $data['issue']= $this->db->query($sql)->result_array();      

        echo json_encode($data);

    }

    public function absent_reason_update()
    {
        $d=$this->input->post();

        $sql="SELECT * FROM `staff_master` WHERE `staff_id`='".$d['staff_id']."'";
        $query=$this->db->query($sql)->result_array();
        $agency_id=$query[0]['agency'];

        $sql="SELECT * FROM `penalty_condition_master` WHERE `id`='".$d['reason']."'";
        $query=$this->db->query($sql)->result_array();
        $staff_penalty=$query[0]['staff_penalty'];
        $condition=$query[0]['condition'];

        $agency_penalty=$query[0]['agency_penalty'];
        if($staff_penalty>0)
        {
              $sql="INSERT INTO `staff_transaction`( `staff_id`, `debit`,`transaction_type`,`remarks`) VALUES ('".$d['staff_id']."','".$staff_penalty."',3,'".$condition."')";
              $this->db->query($sql);   
              $this->balance_update($d['staff_id'],$staff_penalty);   
            //   $sql="INSERT INTO `staf_absent_master`(`staff_id`, `penalty`, `absent_reason`) VALUES ('".$d['staff_id']."','".$staff_penalty."','".$condition."')";          
            //   $this->db->query($sql);   
        }

        $sql="INSERT INTO `staf_absent_master`(`staff_id`, `penalty`, `absent_reason`) VALUES ('".$d['staff_id']."','".$staff_penalty."','".$condition."')";          
        $this->db->query($sql);   

        if($agency_penalty>0)
        {
              $sql="INSERT INTO `staff_transaction`( `staff_id`, `debit`,`transaction_type`,`remarks`) VALUES ('".$agency_id."','".$agency_penalty."',3,'".$condition."')";
              $this->db->query($sql);         
              $this->balance_update($agency_id,$agency_penalty);  
                  
        }
        $sql="INSERT INTO `staf_absent_master`(`staff_id`, `penalty`, `absent_reason`) VALUES ('".$agency_id."','".$agency_penalty."','".$condition."')";          
        $this->db->query($sql);   
        $data['driver_penalty']=$this->is_penalty_driver($d['driver_id']);
        $data['conductor_penalty']=$this->is_penalty_conductor($d['conductor_id']);

        echo json_encode($data);


    }
    public function check_penalty()
    {
        $d=$this->input->post();
        if($d['type']=='d')     $data['is_penalty']=$this->is_penalty_driver($d['staff_id']);
        else $data['is_penalty']=$this->is_penalty_conductor($d['staff_id']);
        echo json_encode($data);

    }
    public function is_penalty_driver($staff_id)
    {
        $absent=false;
        $sql="SELECT DATEDIFF(CURDATE(),`log_date`) as ld,DATE_FORMAT(log_date,'%Y-%m-%d') as ldate FROM `log_master` WHERE driver_staff_id='". $staff_id."' ORDER BY `log_date`  DESC  limit 1";
        $query=$this->db->query($sql)->result_array();
        if($this->db->affected_rows()>0) {
            $days=$query[0]['ld'];
            $ldate=$query[0]['ldate'];
        }  
        else   {
            $days=0;
            $ldate="";

        }
        if($days==0) $absent=false;
        else if($days==1)
        {
            $sql="SELECT DAYNAME(`log_date`) day FROM log_master l INNER JOIN staff_master s on l.driver_staff_id=s.staff_id WHERE l.driver_staff_id='". $staff_id."' and DATE_FORMAT(l.log_date,'%Y-%m-%d')='".$ldate."' and DAYNAME(l.log_date)=s.off_day";
            $query=$this->db->query($sql);
            $absent=($this->db->affected_rows()==1?false:true);
        }   
        else $absent=true;

        $penalty=false;
        if($absent)
        {
            $sql="SELECT * FROM `staf_absent_master` WHERE DATE_FORMAT(`date`,'%Y-%m-%d')=CURDATE() and `staff_id`='". $staff_id."' ";
            $this->db->query($sql);
            $penalty=($this->db->affected_rows()>0?false:true);
        }
        // if absent check whether penalty charged for log date or not and if charged return false else trut (staff_transaction table)
        return $penalty;
    }

    public function is_penalty_conductor($staff_id)
    {
        $absent=false;
        $sql="SELECT DATEDIFF(CURDATE(),`log_date`) as ld,DATE_FORMAT(log_date,'%Y-%m-%d') as ldate FROM `log_master` WHERE conductor_staff_id='". $staff_id."' ORDER BY `log_date`  DESC  limit 1";
        $query=$this->db->query($sql)->result_array();
        if($this->db->affected_rows()>0) {
            $days=$query[0]['ld'];
            $ldate=$query[0]['ldate'];
        }  
        else   {
            $days=0;
            $ldate="";

        }
        if($days==0) $absent=false;
        else if($days==1)
        {
            $sql="SELECT DAYNAME(`log_date`) day FROM log_master l INNER JOIN staff_master s on l.conductor_staff_id=s.staff_id WHERE l.conductor_staff_id='". $staff_id."' and DATE_FORMAT(l.log_date,'%Y-%m-%d')='".$ldate."' and DAYNAME(l.log_date)=s.off_day";
            $query=$this->db->query($sql);
            $absent=($this->db->affected_rows()==1?false:true);
        }   
        else $absent=true;

        $penalty=false;
        if($absent)
        {
            $sql="SELECT * FROM `staf_absent_master` WHERE DATE_FORMAT(`date`,'%Y-%m-%d')=CURDATE() and `staff_id`='". $staff_id."' ";
            $this->db->query($sql);
            $penalty=($this->db->affected_rows()>0?false:true);
        }
        // if absent check whether penalty charged for log date or not and if charged return false else trut (staff_transaction table)
        return $penalty;
    }

    public function departure() {
        $data['page_name'] = 'Vehicle Log Sheet ( Departure )';
        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('multitech_uid');
     
        $sql = $this->db->query("SELECT * FROM `place` ORDER BY id");
        $data['place'] = $sql->result_array();
        $sql = $this->db->query("SELECT * FROM `route_master` ORDER BY `route_no`");
        $data['route'] = $sql->result_array();   

        $cur_date = Date("Y-m-d"); 
        $day = date('l', strtotime($cur_date));    
        $data['day']=$day;

        $sql="SELECT * FROM `penalty_condition_master` ORDER BY `id`";
        $query=$this->db->query($sql);
        $data['condition']=$query->result_array();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('logsheet/departure', $data);
        $this->load->view('layouts/footer');
    }

    public function advance_payment() {
        $data['page_name'] = 'Payment';
       
        $user_id = $this->session->userdata('multitech_uid');

     
        $data['transaction_type'] = 1;   

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/advance_payment', $data);
       
        $this->load->view('layouts/footer');
    }

    public function rebate_() {
        $data['page_name'] = 'Rebate';
       
        $user_id = $this->session->userdata('multitech_uid');

 
        $data['transaction_type'] = 2;   

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/advance_payment', $data);
       
        $this->load->view('layouts/footer');
    }

    public function receipt_() {
        $data['page_name'] = 'Receipt';
       
        $user_id = $this->session->userdata('multitech_uid');

 
        $data['transaction_type'] = 5;   

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/advance_payment', $data);
       
        $this->load->view('layouts/footer');
    }


    public function payment()
    {
       $d=$this->input->post();
       if($d['type']==1)
       {
        $sql="INSERT INTO `staff_transaction`( `staff_id`, `debit`, `remarks`,transaction_type) VALUES ('".$d['driver_id']."','".$d['amount']."','".$d['remarks']."','".$d['type']."')";
        $this->db->query($sql);

        $sql="UPDATE `staff_master` SET `balance`=`balance`+".$d['amount']." WHERE `staff_id`='".$d['driver_id']."'";
        $this->db->query($sql);

        // should be reflacted on draft salary bill in advance on advance payment
        // $sql="UPDATE `salary_bill_master` SET `advance_deduction`=`advance_deduction`+".$d['amount'].",`total_deduction`=`total_deduction`+".$d['amount'].",`net_salary_payable`=`net_salary_payable`-".$d['amount']." WHERE `staff_id`='".$d['driver_id']."' and is_final=0";
        // $this->db->query($sql);

       }
       else if($d['type']==2){
        
        $sql="INSERT INTO `staff_transaction`( `staff_id`, `credit`, `remarks`,transaction_type) VALUES ('".$d['driver_id']."','".$d['amount']."','".$d['remarks']."','".$d['type']."')";
        $this->db->query($sql);

        $sql="UPDATE `staff_master` SET `balance`=`balance`-".$d['amount']." WHERE `staff_id`='".$d['driver_id']."'";
        $this->db->query($sql);
        // should be reflacted on draft salary bill in rebate on advance payment
        $sql="UPDATE `salary_bill_master` SET `advance_deduction`=`advance_deduction`-".$d['amount'].",`total_deduction`=`total_deduction`-".$d['amount'].",`net_salary_payable`=`net_salary_payable`+".$d['amount']." WHERE `staff_id`='".$d['driver_id']."' and is_final=0";
        $this->db->query($sql);
       }
       else {        
        $sql="INSERT INTO `staff_transaction`( `staff_id`, `credit`, `remarks`,transaction_type) VALUES ('".$d['driver_id']."','".$d['amount']."','".$d['remarks']."','".$d['type']."')";
        $this->db->query($sql);       
        $sql="UPDATE `staff_master` SET `balance`=`balance`-".$d['amount'].",status=IF(`balance`-".$d['amount']."<5000,1,status), block_reason='' WHERE `staff_id`='".$d['driver_id']."'";
      
        $this->db->query($sql);
   
       }
          
      
       echo 1;



    }
    public function closing() {
        $data['page_name'] = 'Vehicle Log Sheet ( Closing )';

        $sql="SELECT * FROM  work_master ";
        $query = $this->db->query($sql);
        $data['issue'] = $query->result_array();  

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('logsheet/closinglogsheet', $data);
        $this->load->view('layouts/footer');
    }

    public function print_logsheet() {
        $data['page_name'] = 'Vehicle Log Sheet ( Departure )';
        $d=$this->input->post();

        $data['from']=$d['from'];
        $data['to']=$d['to'];

        if($d['type']=='d')   $data['type']="departure";
        else if($d['type']=='c')   $data['type']="closing";
        else if($d['type']=='l')   $data['type']="logsheet";

        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT *,TIME_TO_SEC(TIMEDIFF(closing_time, departure_time))/(60*60) as diff,d.name as dname,d.contact_no as dmobile,c.name as cname,c.contact_no as cmobile,DATE_FORMAT(`log_date`,'%d-%m-%y') as ldate,DATE_FORMAT(`departure_time`,'%h:%i %p') as dtime,DATE_FORMAT(`closing_time`,'%h:%i %p') as ctime  FROM (log_master l INNER JOIN staff_master d on l.driver_staff_id=d.staff_id) INNER JOIN staff_master c on l.conductor_staff_id=c.staff_id where log_id='".$d['log_id']."'";
        $query = $this->db->query($sql);
        $data['log'] = $query->result_array();  
        
        $sql="SELECT * FROM vehicle_maintanance v INNER JOIN work_master w on v.work_id=w.work_id where v.log_id='".$d['log_id']."'";
        $query = $this->db->query($sql);
        $data['issue'] = $query->result_array();  
     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('logsheet/printlogsheet', $data);
        $this->load->view('layouts/footer');
    }

    public function print_payslip() {
        $data['page_name'] = 'Payslip';
        $d=$this->input->post();

        $bill_id=$d['bill_id'];
        if($d['bill_type']=='d')
        $data['type']=($d['type']=='d'?'draft_bill_driver':($d['type']=='c'?'draft_bill_conductor':'draft_bill_staff'));
        else
        $data['type']=($d['type']=='d'?'final_bill_driver':($d['type']=='c'?'final_bill_conductor':'final_bill_staff'));

     
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT st.name as sname,st.contact_no as smobile,s.bill_month,date_format(s.bill_month,'%M-%Y') as mnth,date_format(s.bill_month,'%Y-%m') as bill_mnth,s.designation,s.emp_id,s.location,s.bank_ac_no,s.ifsc_code,s.pf_ac_no,s.esi_ac_no,s.* FROM salary_bill_master s INNER JOIN staff_master st on s.staff_id=st.staff_id WHERE bill_id='".$bill_id."'";
       
        $query = $this->db->query($sql);
        $data['salary'] = $query->result_array();  
        
    
     
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/printpayslip', $data);    
        
        $this->load->view('layouts/footer');
    }

    public function print_receipt() {
        
        $d=$this->input->post();

    
      
        $dname=$d_contact= $cname=$c_contact=$d_receipt_no=$c_receipt_no=$d_empid=$c_empid="";
        $d_amount=$c_amount=0;
        $dt="";
     
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT s.employee_id,transaction_id,s.name,s.contact_no,t.credit, DATE_FORMAT(t.date,'%d-%m-%Y %h:%i %p') as dt,s.type FROM staff_transaction t INNER JOIN staff_master s on t.staff_id=s.staff_id WHERE credit>0 and `log_id`='".$d['log_id_r']."'";
        $query = $this->db->query($sql)->result_array();
        foreach ($query as $rs) {
           $dt=$rs['dt'];
           if($rs['type']=='d')
           {
            $dname=$rs['name'];
            $d_contact=$rs['contact_no'];
            $d_empid=$rs['employee_id'];

            $d_amount=$rs['credit'];
            $d_receipt_no=$rs['transaction_id'];

           }
           else {
            $cname=$rs['name'];
            $c_contact=$rs['contact_no'];
            $c_empid=$rs['employee_id'];

            $c_amount=$rs['credit'];
            $c_receipt_no=$rs['transaction_id'];

           }

        }
        $data['d_empid']=$d_empid;      
        $data['c_empid']=$c_empid;

        $data['date']=$dt;
        $data['dname']=$dname;
        $data['d_contact']=$d_contact;
        $data['d_amount']=$d_amount;
        $data['d_receipt_no']=$d_receipt_no;

        $data['cname']=$cname;
        $data['c_contact']=$c_contact;
        $data['c_amount']=$c_amount;      
        $data['c_receipt_no']=$c_receipt_no;

    
        $data['type']="closing";
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('report/printreceipt', $data);        
        $this->load->view('layouts/footer');
    }


    public function bus() {
        $data['page_name'] = 'Bus Setup';
       
        $user_id = $this->session->userdata('multitech_uid');
     
        $sql = $this->db->query("SELECT v.vehicle_id,v.vehicle_no,v.driver_staff_id as driver_id,v.conductor_staff_id as conductor_id, d.name as driver_name,d.contact_no as driver_mobile,c.name as conductor_name,c.contact_no as conductor_mobile FROM (vehicle_master v INNER JOIN staff_master d on v.driver_staff_id=d.staff_id) INNER JOIN staff_master c on v.conductor_staff_id=c.staff_id order by `vehicle_no`;");
        $data['bus'] = $sql->result_array();

     
      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/bus', $data);
        $this->load->view('layouts/footer');
    }

    public function block_staff()
    {
        $user_id = $this->session->userdata('multitech_uid');

        $d=$this->input->post();
        $sql="UPDATE `staff_master` SET `status`='".$d['status']."',`block_reason`='".$d['reason']."',`block_date`=CURDATE(),`high_pending_block_status`=0 WHERE `staff_id`='".$d['staff_id']."'";
        $this->db->query($sql);

        $sql="INSERT INTO `staff_block_history`(`staff_id`, `reason`, `block_by`) VALUES ('".$d['staff_id']."','".$d['reason']."','".$user_id."')";
        $this->db->query($sql);

        echo 1;
    }

    
    public function block_unblock_user()
    {
        $d=$this->input->post();
        $sql="UPDATE `user_master` SET `status`='".$d['status']."' WHERE `u_id`='".$d['u_id']."'";
        $this->db->query($sql);
        echo 1;
    }
    

    public function history()
    {
        $d=$this->input->post();
        $sql="SELECT DATE_FORMAT(`block_unblock_date`,'%d-%m-%Y %h:%i %p') as dt,h.reason,u.name as block_by FROM staff_block_history h INNER JOIN user_master u on h.block_by=u.u_id WHERE h.staff_id='".$d['staff_id']."' order by `block_unblock_date`";
        $query=$this->db->query($sql);
        echo json_encode($query->result_array());
    }
    public function block_unblock()
    {
        $d=$this->input->post();
        $sql="UPDATE `staff_master` SET `status`='".$d['status']."',`block_reason`='' WHERE `staff_id`='".$d['staff_id']."'";
        $this->db->query($sql);
        echo 1;
    }
    

    public function delete_restore()
    {
        $d=$this->input->post();
        $sql="UPDATE `staff_master` SET `is_deleted`='".$d['status']."' WHERE `staff_id`='".$d['staff_id']."'";
        $this->db->query($sql);
        echo 1;
    }
    public function view_staff()
    {
        $d=$this->input->post();
        $sql="SELECT * FROM `staff_master` WHERE `name` like '%".$d['search']."%' and type='".$d['type']."' and status=1";
        $query=$this->db->query($sql);
        echo json_encode($query->result_array());
    }

    public function view_employee()
    {
        $d=$this->input->post();
        $sql="SELECT * FROM `staff_master` WHERE `name` like '%".$d['search']."%' ";
        $query=$this->db->query($sql);
        echo json_encode($query->result_array());
    }

    public function add_user()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT * FROM `user_master` WHERE `mobile_no`='".$d['mobile_no']."'  and u_id<>'".$d['user_id']."'";
     
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            echo json_encode("d");
        }
        else
        {

        $pwd=substr($d['mobile_no'],6,10);
        $pwd=$this->encryption->encrypt($pwd);
        $uid=strtoupper(substr($d['name'],0,3)).substr($d['mobile_no'],7,10);;
        if($d['user_id']=="")  $sql="INSERT INTO `user_master`( `role_id`, `name`, `mobile_no`, `user_id`, `password`,create_by) VALUES ('".$d['role_id']."','".$d['name']."','".$d['mobile_no']."','".$uid."','".$pwd."','".$user_id."')";
        else $sql="UPDATE `user_master` SET `role_id`='".$d['role_id']."',`name`='".$d['name']."',`mobile_no`='".$d['mobile_no']."'  WHERE `u_id`='".$d['user_id']."'";

        $this->db->query($sql);
        echo 1;
        }

    }

    public function add_bus()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT * FROM `vehicle_master` WHERE `vehicle_no`='".$d['vehicle_no']."'  and vehicle_id<>'".$d['vehicle_id']."'";
     
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            echo json_encode("d");
        }
        else
        {

        if($d['vehicle_id']=="")  $sql="INSERT INTO `vehicle_master`(`vehicle_no`, `driver_staff_id`, `conductor_staff_id`,`u_id`) VALUES ('".$d['vehicle_no']."','".$d['driver_id']."','".$d['conductor_id']."','".$user_id."')";
        else $sql="UPDATE `vehicle_master` SET `vehicle_no`='".$d['vehicle_no']."',`driver_staff_id`='".$d['driver_id']."',`conductor_staff_id`='".$d['conductor_id']."'  WHERE `vehicle_id`='".$d['vehicle_id']."'";


        $this->db->query($sql);
        echo 1;
        }

    }

    public function add_work()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT * FROM `work_master` WHERE `work_description`='".$d['work']."'  and work_id<>'".$d['work_id']."'";
     
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            echo json_encode("d");
        }
        else
        {

        if($d['work_id']=="")  $sql="INSERT INTO `work_master`(`work_description`,`u_id`) VALUES ('".$d['work']."','".$user_id."')";
        else $sql="UPDATE `work_master` SET `work_description`='".$d['work']."' WHERE `work_id`='".$d['work_id']."'";


        $this->db->query($sql);
        echo 1;
        }

    }


    public function add_route()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT * FROM `route_master` WHERE `route_no`='".$d['route_no']."'  and route_id<>'".$d['route_id']."'";
     
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            echo json_encode("d");
        }
        else
        {

        if($d['route_id']=="")  $sql="INSERT INTO `route_master`(`route_no`, `route_name`,  `u_id`,`target`) VALUES ('".$d['route_no']."','".$d['route_name']."','".$user_id."','".$d['target']."')";
        else $sql="UPDATE `route_master` SET `route_no`='".$d['route_no']."',`route_name`='".$d['route_name']."' ,`target`='".$d['target']."'  WHERE `route_id`='".$d['route_id']."'";


        $this->db->query($sql);
        echo 1;
        }

    }


    public function add_staff()
    {
        $d=$this->input->post();
        $user_id = $this->session->userdata('multitech_uid');
        $sql="SELECT * FROM `staff_master` WHERE `contact_no`='".$d['contact_no']."' and type='".$d['type']."' and staff_id<>'".$d['staff_id']."'";
     
        $this->db->query($sql);
        if($this->db->affected_rows()==1)
        {
            echo "d";
        }
        else
        {
            $sql="SELECT * FROM `staff_master` WHERE `employee_id`='".$d['emp_id']."' and staff_id<>'".$d['staff_id']."'";
     
            $this->db->query($sql);
            if($this->db->affected_rows()==1)
            {
                echo "e";
            }
            else {

                $sql="SELECT * FROM `staff_master` WHERE `license_no`='".$d['license_no']."' and staff_id<>'".$d['staff_id']."'";
     
            $this->db->query($sql);
            if($this->db->affected_rows()==1)
            {
                echo "l";
            }
            else {
                if($d['emp_id']=="")
                {
                    $cr=($d['type']=='d'?"MEC/D/":($d['type']=='c'?"MEC/C/":($d['type']=='s'?"MEC/SW/":'')));
                    $n=strlen($cr)+1;
                    $sql="SELECT MAX(CAST(SUBSTR(`employee_id`,".$n.") as UNSIGNED))+1 as empid FROM `staff_master` WHERE employee_id LIKE '".$cr."%'";
                    // echo $sql;
                    $query=$this->db->query($sql)->result_array();
                    $emp_id=$cr.$query[0]['empid'];
                }
                else {
                    $emp_id=$d['emp_id'];
                }

                // return;
                if($d['staff_id']=="")  $sql="INSERT INTO `staff_master`(`name`, `contact_no`, `type`, `u_id`,`agency`,`balance`,`is_updated`, `designation`, `employee_id`, `location_of_work`, `bank_ac_no`, `ifsc_code`, `pf_ac_no`, `esi_ac_no`, `monthly_basic_wages`, `daily_basic_wages`,`allowance`, `license_no`, `valid_till`, `off_day`,joining_date) VALUES ('".$d['name']."','".$d['contact_no']."','".$d['type']."','".$user_id."','".$d['agency']."','".$d['balance']."','1','".$d['designation']."','".$emp_id."','".$d['location']."','".$d['bank_ac']."','".$d['ifsc_code']."','".$d['pf_ac']."','".$d['esi_ac']."','".$d['monthly_wages']."','".$d['daily_wages']."','".$d['allowance']."','".$d['license_no']."','".$d['valid_till']."','".$d['off_day']."','".$d['joining_date']."')";
                else $sql="UPDATE `staff_master` SET `agency`='".$d['agency']."',`name`='".$d['name']."',`contact_no`='".$d['contact_no']."' ,`balance`='".$d['balance']."' ,`is_updated`='1' ,`designation`='".$d['designation']."'  ,`employee_id`='".$emp_id."'  ,`location_of_work`='".$d['location']."'  ,`bank_ac_no`='".$d['bank_ac']."'  ,`ifsc_code`='".$d['ifsc_code']."'  ,`pf_ac_no`='".$d['pf_ac']."'  ,`esi_ac_no`='".$d['esi_ac']."'  ,`monthly_basic_wages`='".$d['monthly_wages']."'  ,`daily_basic_wages`='".$d['daily_wages']."' ,`allowance`='".$d['allowance']."',`license_no`='".$d['license_no']."',`valid_till`='".$d['valid_till']."' ,`off_day`='".$d['off_day']."',`joining_date`='".$d['joining_date']."'  WHERE `staff_id`='".$d['staff_id']."'";
                $this->db->query($sql);
                echo 1;
            }
                
            }
                
        }

    }
public function present_absent()
{
    $d=$this->input->post();
    $sql="UPDATE `log_master` SET `attendance_status`='".$d['status']."' WHERE `log_id`='".$d['logsheet_id']."'";
    $this->db->query($sql);
    echo 1;
}
    
    public function conductor() {
        $data['page_name'] = 'Conductors';
        $data['type'] = 'c';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT s.*, date_format(s.block_date,'%d-%m-%Y') as bdate,date_format(s.valid_till,'%d-%m-%Y') as ldate,a.name as agency_name FROM staff_master s INNER JOIN staff_master a on s.agency=a.staff_id WHERE s.type='c' and s.is_deleted=0 ORDER BY name");
        $data['staff'] = $sql->result_array();

        $sql = $this->db->query("SELECT * FROM `staff_master` WHERE `type`='a' and `is_deleted`=0 ORDER BY name");
        $data['agency'] = $sql->result_array();

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/staff', $data);
        $this->load->view('layouts/footer');
    }

    public function agency() {
        $data['page_name'] = 'Agency';
        $data['type'] = 'a';    
         
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT *, date_format(block_date,'%d-%m-%Y') as bdate,date_format(valid_till,'%d-%m-%Y') as ldate FROM `staff_master` WHERE `type`='a' and `is_deleted`=0  ORDER BY name");
        $data['staff'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/staff', $data);
        $this->load->view('layouts/footer');
    }


    public function technician() {
        $data['page_name'] = 'Technicians';
        $data['type'] = 't';     
        $user_id = $this->session->userdata('multitech_uid');
        $sql = $this->db->query("SELECT *, date_format(block_date,'%d-%m-%Y') as bdate FROM `staff_master` WHERE `type`='t' and `is_deleted`=0 ORDER BY name");
        $data['staff'] = $sql->result_array();

      
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('master/staff', $data);
        $this->load->view('layouts/footer');
    }
    

    public function change_status(){
        extract($_POST);

        $data = [
            'is_available' => $status
        ];

        if($this->db->update("product_master", $data, "`product_id` = '$id'")){
            echo 1;
        }
    }

    
}
