<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Renew extends CI_Controller {

    public function __construct() {

        parent::__construct();
        error_reporting(0);
        date_default_timezone_set("Asia/Kolkata");
       
    }

    

    public function index() {       
        
        
   
        $this->load->view('renew_reminder/reminder',$data);
    
    }

   
}
