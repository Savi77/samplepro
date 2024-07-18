<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_product extends CI_Controller {

	
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
			$this->load->view('Admin/product_categories_view',$data);
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

