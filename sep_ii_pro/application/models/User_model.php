<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 class User_model extends CI_Model
  {
      function __construct()
      {    parent::__construct();
      }
      

      public function I_user_Registration()
      {  
          //$err;
          
           $data["cus_first_name"] = $this->input->post("form-fname");
           $data["cus_last_name"] = $this->input->post("form-lname");
           $data["cus_email"] = $this->input->post("form-email");
           $data["cus_tel_no"] = $this->input->post("form-tel");
           
           $pwd = $this->input->post("form-password");
           $confirmPwd = $this->input->post("form-con-password");
           
           if($pwd==$confirmPwd)
           {
               $data["cus_password"] = $pwd;
           }
           
           $data["cus_country"] = $this->input->post("form-country");
           $data["cus_profile_pic"] = "default_profile_pic.jpg";
           $data["cus_registered_date"] = date('Y-m-d');
           
           if(empty($data["cus_first_name"]))
           {
               $err["fname"]="*Please enter first name";
               
           }
           if(empty($data["cus_last_name"]))
           {
               $err["lname"]="*Please enter last name";
           }
           return $err;
           
           //return $err;
           //$this->db->insert('tbl_users', $data);
           
      }

  }
