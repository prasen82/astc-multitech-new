<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        // ini_set('display_errors', 1);
        $this->load->library('Cross');
        $this->cross->access();
        $this->load->helper('url');
        $this->load->library('encryption');
// 
    }   

    

public function send_qr_email()
{

    $name=$this->session->userdata('restaurant_business_name');	
    $business_id=$this->session->userdata('multitech_uid');
    $email=$this->session->userdata('restaurant_business_email_id');

    // $email="prasenjittamuly@gmail.com";
    $encryptid=$this->encryption->encrypt($business_id);
    $link=str_replace("restaurant","downloadqr",base_url())."?".$encryptid;


    $arrContextOptions=array(
        "ssl"=>array(
             "verify_peer"=>false,
             "verify_peer_name"=>false,
        ),
    );

	$body= file_get_contents(base_url('email/qrdownload.html'), false, stream_context_create($arrContextOptions)); 
   

    $body             = preg_replace('/\\\\/','', $body);
  
    // $body=str_replace("#LOGO#",$img,$body);
    $body=str_replace("#VENDOR#",$name,$body);
    $body=str_replace("#LINK#",$link,$body);
    // echo $body;
    // return;
	$this->load->library('phpmailer_lib');
   
    $subject = 'QR download - Restaura Qube';
    // $message = 'This is a test email sent using CodeIgniter and PHPMailer.';
    
    if ($this->phpmailer_lib->sendMail($email, $subject, $body)) {
        // echo 'Email sent successfully.';
        } else {
            // echo 'Email could not be sent.';
        }
    }


    // Forgot password

public function forgot_password()
{
    $d=$this->input->post();
    $email="";
   
    $sql="SELECT `business_name`,`email_id`,`password` FROM `business_master` WHERE `mobile_no`='".$d['mobile_no']."'";
      $result=$this->db->query($sql)->result_array();
    foreach($result as $rs)
    {
        $email=$rs['email_id'];
        $name=$rs['business_name'];
        $pwd=$this->encryption->decrypt($rs['password']);
    }
    if($email=="")
    {
        echo json_encode("xx");
        return;
    }

    $arrContextOptions=array(
        "ssl"=>array(
             "verify_peer"=>false,
             "verify_peer_name"=>false,
        ),
    );

	$body= file_get_contents(base_url('email/forgotpassword.html'), false, stream_context_create($arrContextOptions)); 
    $body             = preg_replace('/\\\\/','', $body);
  
    $body=str_replace("#VENDOR#",$name,$body);
    $body=str_replace("#UID#",$d['mobile_no'],$body);
    $body=str_replace("#PWD#",$pwd,$body);
    
    // $body="hello";
   
	$this->load->library('phpmailer_lib');
   
    $subject = 'Forgot password - Restaura Qube';
  
    // $message = 'This is a test email sent using CodeIgniter and PHPMailer.';
//    echo json_encode($this->phpmailer_lib->sendMail($email, $subject, $message));

//    return;
    if ($this->phpmailer_lib->sendMail($email, $subject, $body)) {
        echo 'Email sent successfully.';
        } else {
            echo 'Email could not be sent.';
        }
    }
}







//  Set this in application/config/routes.php
// $route['api/users'] = 'api/users';



