<?php

// error_reporting(0);

defined('BASEPATH') or exit('No direct script access allowed');
class Admin_authentication extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('BuroAdmin/Adminauthentication');
        $this->Adminauthentication->check_user($username, $password);
    }

    public function logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        $this->session->sess_destroy();
        redirect('BuroAdminLogin');
    }
}
