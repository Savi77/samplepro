<?php

error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function InsertGstDetails()
	{
		if (isset($_SESSION['id'])) {
			$image = $_FILES['fileup']['name'];
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();			
			$this->Settings_model->InsertGstDetails($formdata, $image);
		} else {
			redirect('admin/Login');
		}
	}


	public function AddAccountPeriod()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();
			$this->Settings_model->AddAccountPeriod($formdata);
		} else {
			redirect('admin/Login');
		}
	}

	public function UpdateBasicSettingDetails()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();
			$this->Settings_model->UpdateBasicSettingDetails($formdata);
		} else {
			redirect('admin/Login');
		}
	}

	public function EmailConfiguartion()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();
			$this->Settings_model->EmailConfiguartion($formdata);
		} else {
			redirect('admin/Login');
		}
	}

	public function EmailContentFrom()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();
			$this->Settings_model->EmailContentFrom($formdata);
		} else {
			redirect('admin/Login');
		}
	}

	public function UpdateProfile()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$formdata = $this->input->post();
			$this->Settings_model->UpdateProfile($formdata);
		} else {
			redirect('admin/Login');
		}
	}



	public function addSection()
	{
		$this->load->model('Admin/Settings_model');
		$data = array(
			'org_id' => $this->session->org_id,
			'section_name' => $this->input->post('section_name'),
			'section_content' => $this->input->post('section_content'),
			'status' => 1,
			'display_status' => 1,
		);
		$this->Settings_model->addSection($data);
	}

	public function getData()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Settings_model');
			$id = $this->input->post('id');
			$data['getData'] =$this->Settings_model->getData($id);
			$this->load->view('Admin/EditSectionView',$data);
		} else {
			redirect('admin/Login');
		}
	}

	public function Update()
	{
		$this->load->model('Admin/Settings_model');
		$data = array(
			'section_name' => $this->input->post('section_name'),
			'section_content' => $this->input->post('section_content'),
		);
		$this->Settings_model->Update($data,$this->input->post('section_id'));
	}

	public function Delete()
	{
		$this->load->model('Admin/Settings_model');
		$this->Settings_model->Delete($this->input->post('section_id'));
	}
}
