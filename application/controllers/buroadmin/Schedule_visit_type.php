<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_visit_type extends CI_Controller {

//========================= Customer add/ edit/ delete ============================================ 

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Schedule_type_model');
			$data['sidebar']=array('menu' =>"s_v_t");
			$data['schedule_list_type']=$this->Schedule_type_model->get_list();
			$this->load->view('Admin/schedule_visit_type_view',$data);
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
			$this->load->model('Admin/Schedule_type_model');
			$data = $this->input->post();
			$this->Schedule_type_model->add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_scheduletype()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Schedule_type_model');
			$scheduletid = $this->input->post('scheduletid');
			$this->Schedule_type_model->delete_scheduletype($scheduletid);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function edit_scheduletype()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Schedule_type_model');
			$scheduleid = $_REQUEST['scheduleid'];
			$data['editscheduletype']=$this->Schedule_type_model->edit_scheduletype($scheduleid);
			$this->load->view('Admin/edit_schedule_visit_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_scheduletype()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Schedule_type_model');
			$data = $this->input->post();
			$this->Schedule_type_model->Edit_Add_scheduletype($data);
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
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Schedule_type_model');
			$data=$this->Schedule_type_model->deactivate1($id);
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
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Schedule_type_model');
			$data=$this->Schedule_type_model->activate1($id);
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
