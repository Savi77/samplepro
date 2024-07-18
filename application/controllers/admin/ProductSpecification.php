<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductSpecification extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/ProductSpecification_model');
			$data['sidebar']=array('menu' =>"ProductSpecification");
			$data['listdata']=$this->ProductSpecification_model->GetListData();
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ProductSpecification/Product';
			$data['page_name_1'] = 'Product Management';
			$data['page_name_2'] = 'Product Specification';
			$data['sidebar']=array('menu' =>"ProductSpecification");

			$this->load->view('Admin/NewProductSpecification',$data);
			// $this->load->view('Admin/ProductSpecification',$data);
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
			$this->load->model('Admin/ProductSpecification_model');
			$data = $this->input->post();
			$this->ProductSpecification_model->Add($data);
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
			$this->load->model('Admin/ProductSpecification_model');
			$specification_id = $this->input->post('specification_id');
			$this->ProductSpecification_model->Delete($specification_id);
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
			$this->load->model('Admin/ProductSpecification_model');
			$specification_id = $_REQUEST['specification_id'];
			$data['edit_data']=$this->ProductSpecification_model->Edit($specification_id);
			$this->load->view('Admin/EditSpecification',$data);
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
			$this->load->model('Admin/ProductSpecification_model');
			$data = $this->input->post();
			$this->ProductSpecification_model->Update($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Product()
	{
		$this->load->model('Admin/Product_model');
		$this->load->model('Admin/UOM_model');
		$this->load->model('Admin/Product_service_model');

		$this->load->model('Admin/Product_model');
			
		$data['get_data']=$this->Product_model->get_data();

		$data['get_menu_list']=$this->Product_model->get_menu_list1();
		$data['get_data']=$this->UOM_model->get_data();
		$data['specification_array']=$this->Product_service_model->get_specification_array();
		$data['hsn_code_array']=$this->Product_service_model->get_hsn_code();

		$data['type'] = 's_link';
		$data['page_name'] = 'Product Management';
		$data['sidebar']=array('menu' =>"ProductManagement");
		$this->load->view('Admin/New_Product_main_view', $data);
		// $this->load->view('Admin/Product_main_view', $data);
	}



}