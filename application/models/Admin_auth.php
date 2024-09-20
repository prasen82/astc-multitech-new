<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auth extends CI_Model {
    public function checkLogin($username, $password) {
        // $ismobile=(is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))?1:0);
        // if($ismobile)
        // {
        //     $sql="SELECT * FROM `user_master` WHERE `user_id`='".$username."' and `role_id` >=3";
           
        // }
        // else
        // {
        //     $sql="SELECT * FROM `user_master` WHERE `user_id`='".$username."' ";
           
        // }

        $sql="SELECT * FROM `user_master` WHERE `user_id`='".$username."' ";
        $query=$this->db->query($sql)->result();
        if ($this->db->affected_rows() > 0) {
            foreach ($query as $key) {
                $decPassword = $this->encryption->decrypt($key->password);
                if ($decPassword == $password) {
                    if ($key->status == 1) {
                        $this->session->set_userdata('multitech_uid', $key->u_id);
                        $this->session->set_userdata('multitech_user_name', $key->name);
                        $this->session->set_userdata('multitech_mobile_no', $key->mobile_no);
                        $this->session->set_userdata('multitech_role_id', $key->role_id);

                    } else {
                        return "Not a active user";
                    }
                } else {
                    return 'Invalid password';
                }
            }
        } else {
            return "Invalid user id";
        }
    }
}

?>