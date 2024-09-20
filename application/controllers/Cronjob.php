<?php

class Cronjob extends CI_Controller {
	public function __construct() {
		error_reporting(0);
		parent::__construct();		
	}
    public function cronjob()
    { 

        $sql="SELECT DATE_FORMAT(bill_month,'%M-%Y') as month FROM `salary_bill_master` WHERE is_final=0 GROUP BY bill_month";
        $this->db->query($sql);
        // if($this->db->affected_rows()>0) return;
        $cur_date = Date("Y-m-d"); 
        $previous_month=date("Y-m",strtotime("-1 Month"))   ;   
        $salary_month=date("Y-m-t",strtotime("-1 Month"))   ;   


        $fdate= date("Y-m-01", strtotime($cur_date));  //first date of the month
        $ldate= date("Y-m-t", strtotime($cur_date));      //last date of the month
       
        $day = date('l', strtotime($cur_date));     
        

        $sql="SELECT * FROM `salary_allowance_deduction_setup`";
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            $percentage_of_leave_wages=$rs['leave_wages'];
            $percentage_of_bonus=$rs['bonus'];
         
            $percentage_of_pf_deduction=$rs['pf_employee_share'];
            $percentage_of_pf_employer_contribution=$rs['pf_employer_contribution'];
            $percentage_of_esic_deduction=$rs['esic_employee_share'];
            $percentage_of_esic_employer_contribution=$rs['esic_employer_contribution'];
        
         

        }

        // $this->salary_bill_driver($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
        // $this->salary_bill_conductor($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
        // $this->salary_bill_staff($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
       
        if($cur_date==$fdate)
        {
            $this->salary_bill_driver($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
            $this->salary_bill_conductor($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
            $this->salary_bill_staff($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution);
                            
        } 
    
    }  

    public function no_of_working_days_driver($previous_month,$staff_id)
    {
        $no_of_working_days=0;
        $sql="SELECT DATE_FORMAT(`log_date`,'%Y-%m-%d') as cnt FROM  log_master  WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$previous_month."' and driver_staff_id='".$staff_id."'  and attendance_status=1  GROUP BY DATE_FORMAT(`log_date`,'%Y-%m-%d')";
        $result=$this->db->query($sql);
        $no_of_working_days=$this->db->affected_rows();
        return $no_of_working_days;
    }

    public function no_of_working_days_conductor($previous_month,$staff_id)
    {
        $no_of_working_days=0;
        $sql="SELECT DATE_FORMAT(`log_date`,'%Y-%m-%d') as cnt FROM  log_master  WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$previous_month."' and conductor_staff_id='".$staff_id."'  and attendance_status=1 GROUP BY DATE_FORMAT(`log_date`,'%Y-%m-%d')";
        $result=$this->db->query($sql);
        $no_of_working_days=$this->db->affected_rows();
        return $no_of_working_days;
    }
    public function salary_bill_driver($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution)
    {
               
        $sql="SELECT s.name as sname,s.staff_id as sid,s.agency ,s.contact_no as mobile,s.* FROM  log_master l INNER JOIN staff_master s on l.driver_staff_id=s.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$previous_month."'  GROUP BY s.name,s.staff_id order by s.name;";
       
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            $no_of_working_days=$this->no_of_working_days_driver($previous_month,$rs['sid']);
            
            $total_salary_days=$no_of_working_days+($no_of_working_days>25?4:0);
            $total_wages_payable=$total_salary_days*$rs['daily_basic_wages'];
            $leave_wages=round($total_wages_payable*$percentage_of_leave_wages/100,2);
            $bonus=round($total_wages_payable*$percentage_of_bonus/100,2);
            $allowance=$rs['allowance'];
            $gross=$total_wages_payable+$leave_wages+$bonus+$allowance;
            $pf_deduction=round($total_wages_payable*$percentage_of_pf_deduction/100,2);
            if($gross<=21000)
            {
                $esic_deduction=round($gross*$percentage_of_esic_deduction/100,2);
                $employers_esic_contribution=round($gross*$percentage_of_esic_employer_contribution/100,2);
    
            }
            else
            {
                $esic_deduction=0;
                $employers_esic_contribution=0;
    
            }
           
            $p_tax=($gross>25000?208:($gross>15000?180:($gross>10000?150:0)));
            $advance=$rs['balance'];

            $total_deduction=$pf_deduction+$advance+$esic_deduction+$p_tax;
            $net_payable=$gross-$total_deduction;
            if($net_payable<0)
            {
                $total_deduction+=$net_payable;
                $advance+=$net_payable;
                $net_payable=0;
            }

            $employers_pf_contribution=round($total_wages_payable*$percentage_of_pf_employer_contribution/100,2);
       

            $sql="INSERT INTO `salary_bill_master`( `bill_date`, `bill_month`, `staff_id`, `designation`, `emp_id`, `location`, `bank_ac_no`, `ifsc_code`, `pf_ac_no`, `esi_ac_no`, `no_of_days_work`, `total_working_days`, `total_salary_days`, `montly_basic_wages`, `daily_basic_wages`, `total_wages_payable`, `leave_wages`, `bonus`, `allowance`, `gross_income`, `pf_deduction`, `esic_deduction`, `p_tax`, `advance_deduction`, `total_deduction`, `net_salary_payable`, `eployers_pf_contribution`, `eployers_esic_contribution`,`employee_type`) 
            VALUES ('".$cur_date."','".$salary_month."','".$rs['sid']."','Driver','".$rs['employee_id']."','".$rs['location_of_work']."','".$rs['bank_ac_no']."','".$rs['ifsc_code']."','".$rs['pf_ac_no']."','".$rs['esi_ac_no']."','".$no_of_working_days."','".$no_of_working_days."','".$total_salary_days."','".$rs['monthly_basic_wages']."','".$rs['daily_basic_wages']."','".$total_wages_payable."','".$leave_wages."','".$bonus."','".$allowance."','".$gross."','".$pf_deduction."','".$esic_deduction."','".$p_tax."','".$advance."','".$total_deduction."','".$net_payable."','".$employers_pf_contribution."','".$employers_esic_contribution."','".$rs['type']."')";
        //    echo $sql;
           $this->db->query($sql);
    }
    }

    public function salary_bill_conductor($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution)
    {
        
       
        $sql="SELECT  s.name as sname,s.staff_id as sid,s.agency ,s.contact_no as mobile,s.* FROM  log_master l INNER JOIN staff_master s on l.conductor_staff_id=s.staff_id WHERE DATE_FORMAT(`log_date`,'%Y-%m')='".$previous_month."'  GROUP BY s.name,s.staff_id order by s.name;";
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            $no_of_working_days=$this->no_of_working_days_conductor($previous_month,$rs['sid']);
            $total_salary_days=$no_of_working_days+($no_of_working_days>25?4:0);
            $total_wages_payable=$total_salary_days*$rs['daily_basic_wages'];
            $leave_wages=round($total_wages_payable*$percentage_of_leave_wages/100,2);
            $bonus=round($total_wages_payable*$percentage_of_bonus/100,2);
            $allowance=$rs['allowance'];
           
            $gross=$total_wages_payable+$leave_wages+$bonus+$allowance;
            $pf_deduction=round($total_wages_payable*$percentage_of_pf_deduction/100,2);
        
            if($gross<=21000)
            {
                $esic_deduction=round($gross*$percentage_of_esic_deduction/100,2);
                $employers_esic_contribution=round($gross*$percentage_of_esic_employer_contribution/100,2);
    
            }
            else
            {
                $esic_deduction=0;
                $employers_esic_contribution=0;
    
            }

            $p_tax=($gross>25000?208:($gross>15000?180:($gross>10000?150:0)));

            $advance=$rs['balance'];

            $total_deduction=$pf_deduction+$advance+$esic_deduction+$p_tax;
            $net_payable=$gross-$total_deduction;
            if($net_payable<0)
            {
                $total_deduction+=$net_payable;
                $advance+=$net_payable;
                $net_payable=0;
            }

            $employers_pf_contribution=round($total_wages_payable*$percentage_of_pf_employer_contribution/100,2);
        

            $sql="INSERT INTO `salary_bill_master`( `bill_date`, `bill_month`, `staff_id`, `designation`, `emp_id`, `location`, `bank_ac_no`, `ifsc_code`, `pf_ac_no`, `esi_ac_no`, `no_of_days_work`, `total_working_days`, `total_salary_days`, `montly_basic_wages`, `daily_basic_wages`, `total_wages_payable`, `leave_wages`, `bonus`, `allowance`, `gross_income`, `pf_deduction`, `esic_deduction`, `p_tax`, `advance_deduction`, `total_deduction`, `net_salary_payable`, `eployers_pf_contribution`, `eployers_esic_contribution`,`employee_type`) 
            VALUES ('".$cur_date."','".$salary_month."','".$rs['sid']."','Conductor','".$rs['employee_id']."','".$rs['location_of_work']."','".$rs['bank_ac_no']."','".$rs['ifsc_code']."','".$rs['pf_ac_no']."','".$rs['esi_ac_no']."','".$no_of_working_days."','".$no_of_working_days."','".$total_salary_days."','".$rs['monthly_basic_wages']."','".$rs['daily_basic_wages']."','".$total_wages_payable."','".$leave_wages."','".$bonus."','".$allowance."','".$gross."','".$pf_deduction."','".$esic_deduction."','".$p_tax."','".$advance."','".$total_deduction."','".$net_payable."','".$employers_pf_contribution."','".$employers_esic_contribution."','".$rs['type']."')";
        //    echo $sql;
           $this->db->query($sql);
    }
    }

    public function salary_bill_staff($cur_date,$salary_month,$previous_month,$percentage_of_leave_wages,$percentage_of_bonus,$percentage_of_pf_deduction,$percentage_of_pf_employer_contribution,$percentage_of_esic_deduction,$percentage_of_esic_employer_contribution)
    {
        
        $no_of_working_days=0;
        $total_salary_days=$no_of_working_days+($no_of_working_days>25?4:0);
        $sql="SELECT s.name as sname,s.staff_id as sid,s.agency ,s.contact_no as mobile,s.* FROM   staff_master s WHERE s.type='s' order by s.name;";
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
           
            $total_wages_payable=$total_salary_days*$rs['daily_basic_wages'];
            $leave_wages=round($total_wages_payable*$percentage_of_leave_wages/100,2);
            $bonus=round($total_wages_payable*$percentage_of_bonus/100,2);
            $allowance=$rs['allowance'];

            $gross=$total_wages_payable+$leave_wages+$bonus+$allowance;
            $pf_deduction=round($total_wages_payable*$percentage_of_pf_deduction/100,2);
            if($gross<=21000)
            {
                $esic_deduction=round($gross*$percentage_of_esic_deduction/100,2);
                $employers_esic_contribution=round($gross*$percentage_of_esic_employer_contribution/100,2);
    
            }
            else
            {
                $esic_deduction=0;
                $employers_esic_contribution=0;
    
            }
            $p_tax=($gross>25000?208:($gross>15000?180:($gross>10000?150:0)));

            $advance=$rs['balance'];

            $total_deduction=$pf_deduction+$advance+$esic_deduction+$p_tax;
            $net_payable=$gross-$total_deduction;
            if($net_payable<0)
            {
                $total_deduction+=$net_payable;
                $advance+=$net_payable;
                $net_payable=0;
            }

            $employers_pf_contribution=round($total_wages_payable*$percentage_of_pf_employer_contribution/100,2);


            $sql="INSERT INTO `salary_bill_master`( `bill_date`, `bill_month`, `staff_id`, `designation`, `emp_id`, `location`, `bank_ac_no`, `ifsc_code`, `pf_ac_no`, `esi_ac_no`, `no_of_days_work`, `total_working_days`, `total_salary_days`, `montly_basic_wages`, `daily_basic_wages`, `total_wages_payable`, `leave_wages`, `bonus`, `allowance`, `gross_income`, `pf_deduction`, `esic_deduction`, `p_tax`, `advance_deduction`, `total_deduction`, `net_salary_payable`, `eployers_pf_contribution`, `eployers_esic_contribution`,`employee_type`) 
            VALUES ('".$cur_date."','".$salary_month."','".$rs['sid']."','".$rs['designation']."','".$rs['employee_id']."','".$rs['location_of_work']."','".$rs['bank_ac_no']."','".$rs['ifsc_code']."','".$rs['pf_ac_no']."','".$rs['esi_ac_no']."','".$no_of_working_days."','".$no_of_working_days."','".$total_salary_days."','".$rs['monthly_basic_wages']."','".$rs['daily_basic_wages']."','".$total_wages_payable."','".$leave_wages."','".$bonus."','".$allowance."','".$gross."','".$pf_deduction."','".$esic_deduction."','".$p_tax."','".$advance."','".$total_deduction."','".$net_payable."','".$employers_pf_contribution."','".$employers_esic_contribution."','".$rs['type']."')";
        //    echo $sql;
           $this->db->query($sql);
    }
    }

//Run this cronjob at 5 PM ever day
    public function auto_close_shutdown_attendance()
    {
        $sql="UPDATE `log_master` SET `closing_time`=CURRENT_TIMESTAMP(),`attendance_status`=0 WHERE `route_no`='99'  and `closing_time` IS NULL";
        $this->db->query($sql);
    }

    public function balance_update()
    {
        $sql="SELECT s.staff_id,sum(debit),sum(credit),sum(debit)-sum(credit) as balance FROM staff_transaction t INNER JOIN	staff_master s on s.staff_id=t.staff_id GROUP BY s.staff_id";
        $query=$this->db->query($sql)->result_array();
        foreach ($query as $r) {
            $sql="UPDATE `staff_master` SET `balance`= '".$r['balance']."' WHERE `staff_id`='".$r['staff_id']."'";
            $this->db->query($sql);
        }
        {

        }
    }

    // 
    public function block_high_pending_driver_conductor()
    {
        $cur_date = Date("Y-m"); 
        $sql="SELECT staff_id,sum(debit)-sum(credit) as pending FROM `staff_transaction` WHERE `transaction_type`=0 and DATE_FORMAT(`date`,'%Y-%m')='".$cur_date."'  GROUP BY staff_id having (sum(debit)-sum(credit))>5000 ORDER BY `pending`  DESC";
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            $sql="UPDATE `staff_master` SET `status`=0,`block_reason`='Blocked due to high pending',`block_date`=CURDATE() WHERE staff_id='".$rs['staff_id']."'";
        
            $this->db->query($sql);

            $sql="INSERT INTO `staff_block_history`(`staff_id`, `reason`, `block_by`) VALUES ('".$rs['staff_id']."','Blocked due to high pending','1')";
            $this->db->query($sql);
        }
    }

    public function block_license_expired_driver_conductor()
    {
       
        $sql="SELECT  *,DATE_FORMAT(`valid_till`,'%d-%m-%Y') as dt FROM `staff_master`  WHERE (type='d' or type='c') and DATEDIFF(`valid_till`,CURDATE())<=0";
        $result=$this->db->query($sql)->result_array();
        foreach ($result as $rs) {
            $sql="UPDATE `staff_master` SET `status`=0,`block_reason`='Licence Expired',`block_date`=CURDATE() WHERE staff_id='".$rs['staff_id']."'";
        
            $this->db->query($sql);

            $sql="INSERT INTO `staff_block_history`(`staff_id`, `reason`, `block_by`) VALUES ('".$rs['staff_id']."','Licence Expired','1')";
            $this->db->query($sql);
        }
    }

}

/* Cronjob running in server

30 22 * * * /usr/bin/curl -k http://156.67.219.10/microfinance/admin/cronjob/cronjob
59 23 * * * /usr/bin/curl -k https://restauraqube.com/superadmin/cronjob/cronjob
59 03 * * * /usr/bin/curl -k https://skpt.co.in/webmis/dsc_expiry_notification_auto_mail_cronjob.php
01 01 * * * /usr/bin/curl -k http://multitechengineering.in/e-bus/cronjob
30 11 * * * /usr/bin/curl -k http://multitechengineering.in/e-bus/cronjob/auto_close_shutdown_attendance

*/

