<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class LoginDetails extends CI_Controller
{
	public function index()
	{
		if (isset($this->session->id)) {
			$this->load->model('BuroAdmin/LoginDetailsModel');
			$data['LoginDetails'] = $this->LoginDetailsModel->LoginDetailsData();
			$data['sidebar'] = array('menu' => "LoginDetails");
			$this->load->view('BuroAdmin/login_details_view', $data);
		} else {
			redirect('BuroAdminLogin');
		}
	}
	public function add()
	{
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('BuroAdmin/LoginDetailsModel');
		$data = array(
			'login_title' => $this->input->post('login_title'),
			'login_sub_title' => $this->input->post('login_sub_title'),
			'login_list' => json_encode($this->input->post('login_list')),
			'date_created' => date('Y-m-d H:i:s')
		);
		if ($this->db->truncate('tbl_login_details')) {
            $this->db->insert('tbl_login_details', $data);
        }
	}
}
