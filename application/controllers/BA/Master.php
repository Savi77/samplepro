<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{

	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_data']=$this->Master_model->get_data();
			$data['sidebar']=array('menu' =>"s_type"); 
			$this->load->view('Admin/schedule_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_schedule($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$scheduletid = $this->input->post('scheduletid');
			$this->Master_model->delete_schedule($scheduletid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_master()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$scheduleid = $_REQUEST['scheduleid'];
			$data['editschedule']=$this->Master_model->edit_master($scheduleid);
			$this->load->view('Admin/edit_schedule_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_schedule($data);
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
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate1($id);
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
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate1($id);
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



	//============================================ Group section ========================================

	public function grouplist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"grouplist"); 
			$data['get_groupdata']=$this->Master_model->get_groupdata();
			$this->load->view('Admin/group_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_group($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$grouptid = $this->input->post('grouptid');
			$this->Master_model->delete_group($grouptid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_mastergroup()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$grouptid = $_REQUEST['grouptid'];
			$data['editgroup']=$this->Master_model->edit_mastergroup($grouptid);
			$this->load->view('Admin/edit_group',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_group($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate1()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['grouptid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate($id);
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

	public function activate1()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['grouptid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate($id);
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






//============================================ Business Segment ========================================

	public function businesslist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"busslist"); 
			$data['get_businessdata']=$this->Master_model->get_businessdata();
			$this->load->view('Admin/business_segment_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_business($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$businessid = $this->input->post('businessid');
			$this->Master_model->delete_business($businessid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_masterbusiness()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$businessid = $_REQUEST['businessid'];
			$data['editbusiness']=$this->Master_model->edit_masterbusiness($businessid);
			$this->load->view('Admin/edit_business',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_business($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate2()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['businessid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate2($id);
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

	public function activate2()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['businessid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate2($id);
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


//============================================ Type Section ========================================

	public function typelist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"typelist"); 
			$data['get_typedata']=$this->Master_model->get_typedata();
			$this->load->view('Admin/type_view',$data);
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
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$typeid = $this->input->post('typeid');
			$this->Master_model->delete_type($typeid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_mastertype()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$typeid = $_REQUEST['typeid'];
			$data['edittype']=$this->Master_model->edit_mastertype($typeid);
			$this->load->view('Admin/edit_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate3()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['typeid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate3($id);
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

	public function activate3()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['typeid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate3($id);
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

	//============================================ Location Section ========================================

	public function locationlist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"loclist");
			$data['get_locationdata']=$this->Master_model->get_locationdata();
			$this->load->view('Admin/location_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_location($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$locationid = $this->input->post('locationid');
			$this->Master_model->delete_location($locationid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_masterlocation()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$locationid = $_REQUEST['locationid'];
			$data['edit_masterlocation']=$this->Master_model->edit_masterlocation($locationid);
			$this->load->view('Admin/edit_location',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_location($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate4()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['locationid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate4($id);
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

	public function activate4()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['locationid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate4($id);
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
