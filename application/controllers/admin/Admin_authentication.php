<?php

// error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_authentication extends CI_Controller
{

    function __construct()
     {
  	  	parent::__construct();
     }
    
    public function index() 
    {
        
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('Admin/Adminauthentication');
        $this->Adminauthentication->check_user($username,$password);
    }

    public function logout() 
    {
        $this->db->SET('login_status',0);
        $this->db->WHERE('id',$this->session->id);
        $this->db->Update("tbl_admin_login");

        unset($_SESSION['admin_id']);
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        $this->session->sess_destroy();
        redirect('SignIn');
    }


    public function BuroAdminLogin()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('BuroAdmin/Adminauthentication');
        $this->Adminauthentication->check_user($username,$password);
    }

}
