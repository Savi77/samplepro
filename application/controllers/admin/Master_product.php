<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_product extends CI_Controller
 {	

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/Area_interest_model');
			$data['sidebar']=array('menu' =>"menu_m"); 
			$data['array_interest']=$this->Area_interest_model->get_interst();
			// geofence Notification ---------------------------
			// $this->load->model('Admin/Dashboard_model');
			// $data['user_permission']=$this->Area_interest_model->get_user_permission();

			// User Permission Functionality ------------
			// module_id = 1, feature id = 2 for Product Management , Privilegeids for Product Management= 1,2,3,4
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>2);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
			//------------------------------------------
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ProductSpecification/Product';
			$data['page_name_1'] = 'Product Management';
			$data['page_name_2'] = 'Product Categories';
			$data['sidebar']=array('menu' =>"ProductSpecification");
			$this->load->view('Admin/new_product_categories_view',$data);
			// $this->load->view('Admin/product_categories_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function add_area_interest()
	{
		if(isset($_SESSION['id']))
		{
			 $interest=$_REQUEST['interest'];
			$this->load->model('Admin/Area_interest_model');
			$data = $this->Area_interest_model->interest_add($interest);
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


	public function delete_area_interest()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Area_interest_model');
			$data=$this->Area_interest_model->interest_delete($id);
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

	public function edit_area_interest()
	{
		if(isset($_SESSION['id']))
		{

	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['interestid'];
			$this->load->model('Admin/Area_interest_model');
			$data['edit_intr']=$this->Area_interest_model->edit_interest($id);
			$this->load->view('Admin/edit_rateofinterest',$data);
			
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function edit_area_interest_add()
	{
		if(isset($_SESSION['id']))
		{
			 $interest=$_REQUEST['interest'];
			 $id=$_REQUEST['id'];
			$this->load->model('Admin/Area_interest_model');
			$data = $this->Area_interest_model->edit_interest_add($interest,$id);
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

		public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Area_interest_model');
			$data=$this->Area_interest_model->deactivate1($id);
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
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Area_interest_model');
			$data=$this->Area_interest_model->activate1($id);
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

