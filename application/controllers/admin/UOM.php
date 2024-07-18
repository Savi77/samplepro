<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class UOM extends CI_Controller 
{

	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/UOM_model');
			$data['sidebar']=array('menu' =>"uom");
			$data['get_data']=$this->UOM_model->get_data();
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ProductSpecification/Product';
			$data['page_name_1'] = 'Product Management';
			$data['page_name_2'] = 'UOM Type';
			$data['sidebar']=array('menu' =>"ProductSpecification");
			$this->load->view('Admin/new_uom_view',$data);
			// $this->load->view('Admin/uom_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/UOM_model');
			$data = $this->input->post();
			$this->UOM_model->add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_uom()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/UOM_model');
			$uom_id = $this->input->post('uom_id');
			$this->UOM_model->delete_uom($uom_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_uomtype()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/UOM_model');
			$uom_id = $_REQUEST['uom_id'];
			$data['edituom']=$this->UOM_model->edit_uomtype($uom_id);
			$this->load->view('Admin/edit_uom_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_uom()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/UOM_model');
			$data = $this->input->post();
			$this->UOM_model->Edit_Add_uom($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['uom_id'];
			$this->load->model('Admin/UOM_model');
			$data=$this->UOM_model->deactivate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['uom_id'];
			$this->load->model('Admin/UOM_model');
			$data=$this->UOM_model->activate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
}