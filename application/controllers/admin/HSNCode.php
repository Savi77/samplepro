<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class HSNCode extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/HSNCode_model');
			$data['sidebar']=array('menu' =>"HSNCode");
			$data['listdata']=$this->HSNCode_model->GetListData();
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ProductSpecification/Product';
			$data['page_name_1'] = 'Product Management';
			$data['page_name_2'] = 'HSN Code';
			$data['sidebar']=array('menu' =>"ProductSpecification");
			$this->load->view('Admin/NewHSNCode',$data);
			// $this->load->view('Admin/HSNCode',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Add()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/HSNCode_model');
			$data = $this->input->post();
			$this->HSNCode_model->Add($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Delete()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/HSNCode_model');
			$hsn_id = $this->input->post('hsn_id');
			$this->HSNCode_model->Delete($hsn_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function Edit()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/HSNCode_model');
			$hsn_id = $_REQUEST['hsn_id'];
			$data['edit_data']=$this->HSNCode_model->Edit($hsn_id);
			$this->load->view('Admin/EditHSNCode',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Update()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/HSNCode_model');
			$data = $this->input->post();
			$this->HSNCode_model->Update($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}



}