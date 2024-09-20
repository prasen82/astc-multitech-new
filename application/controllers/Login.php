<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
		error_reporting(0);
		date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Admin_auth');
        $this->load->library('encryption');

		// Server error reminder
		$sql="SELECT * FROM `renew_master` WHERE `next_renew_date`<=CURDATE();";
		$this->db->query($sql);
		if($this->db->affected_rows()==1)
		{
			redirect('server_error');
		}
        else if ($this->session->userdata('multitech_uid')) {
            // redirect('home');
        }
    }

    public function index() {
        $this->load->view('login/index');
    }

	public function qr_create($userId)
	{
		$str_result = '0123456789';
		$eq='0123456789abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYD';
			
		$d=$this->input->post();      
       	$code="Q".$userId.substr(str_shuffle($eq), 0, 3).substr(str_shuffle($str_result), 0, 3).substr(str_shuffle($str_result), 0, 3).substr(str_shuffle($eq), 0, 5).substr(str_shuffle($str_result), 0, 4);
		
		
		 return $code;
	}
	public function check_existance()
	{
		$d=$this->input->post();
	
		$sql="SELECT * FROM `business_master` WHERE  `mobile_no`='".$d['mobile_no']."'";
		$this->db->query($sql);
		echo json_encode($this->db->affected_rows());

	}
	public function register_submit()
	{
		$d=$this->input->post();
		$pwd=$d['password'];
		$dt=date("Y-m-d h:i:s");    
		

		$encrypt=$this->encryption->encrypt($pwd);
	
	
		$sql="INSERT INTO `business_master`(`business_name`, `address`, `pin`, `states`, `gstno`, `mobile_no`, `email_id`, `distributor_code`,`password`,`balance_wallet`,`register_date`) VALUES ('".$d['business_name']."','".$d['address']."','".$d['pin']."','".$d['state']."','".$d['gst']."','".$d['mobile']."','".$d['email']."','".$d['distributor_code']."','".$encrypt."','".$d['free']."','".$dt."')";
		$this->db->query($sql);

		$sql="SELECT `business_id` FROM `business_master` WHERE `business_name`='".$d['business_name']."' and `address`='".$d['address']."' and `pin`='".$d['pin']."' and `states`='".$d['state']."' and `gstno`='".$d['gst']."' and `mobile_no`='".$d['mobile']."' and `email_id`='".$d['email']."' and `password`='".$encrypt."' and `distributor_code`='".$d['distributor_code']."' and `balance_wallet`='".$d['free']."' and `register_date`='".$dt."'";
		$result=$this->db->query($sql)->result_array();
		$business_id=$result[0]['business_id'];
		$code=$this->qr_create($business_id);
		$sql="UPDATE `business_master` SET `qr_code`='".$code."' WHERE `business_id`='".$business_id."'";
		$this->db->query($sql);

		$data['mobile']=$d['mobile'];
		$data['password']=$d['password'];
		$this->send_registration_email($d['email'],$d['business_name'],$d['mobile'],$d['password']);

		$this->load->view('login/index',$data);

	}


public function send_registration_email($email,$name,$mobile,$pwd)
{

 
	$arrContextOptions=array(
        "ssl"=>array(
             "verify_peer"=>false,
             "verify_peer_name"=>false,
        ),
    );

	$body= file_get_contents(base_url('email/register.html'), false, stream_context_create($arrContextOptions)); 


    $body             = preg_replace('/\\\\/','', $body);
  
    // $body=str_replace("#LOGO#",$img,$body);
    $body=str_replace("#VENDOR#",$name,$body);
    $body=str_replace("#UID#",$mobile,$body);
    $body=str_replace("#PWD#",$pwd,$body);

    // echo $body;
    // return;
	$this->load->library('phpmailer_lib');
   
    $subject = 'Registration mail - Restaura Qube';
    // $message = 'This is a test email sent using CodeIgniter and PHPMailer.';
    
    if ($this->phpmailer_lib->sendMail($email, $subject, $body)) {
        // echo 'Email sent successfully.';
        } else {
            // echo 'Email could not be sent.';
        }
    }

   
	public function register() {
		$sql="SELECT name FROM `states` WHERE `country_id`='101' order by name";
		$data['states']=$this->db->query($sql)->result_array();

		$sql="SELECT * FROM `free_credit` ";
		$result=$this->db->query($sql)->result_array();
		$free_credit=0;
		foreach($result as $rs)
		{
			$free_credit=$rs['free_credit'];
		}

		$data['free']=$free_credit;

        $this->load->view('login/register',$data);
    }

    public function processLogin() {

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$result = $this->Admin_auth->checkLogin($this->input->post('username'), $this->input->post('password'));
			if ($result == '') {
				$this->session->set_flashdata('danger', '');
				redirect('home');
			} else {
				$this->session->set_flashdata('danger', $result);
				redirect('/');
			}
		} else {
			$this->session->set_flashdata('danger', 'Invalid user id or password');
			redirect('/');
		}



	}


public function get_password()
{
	$params   = $_SERVER['QUERY_STRING']; 
	$pwd=$this->encryption->decrypt($params);
	echo $pwd;

}
	
	

}