<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller 
{
	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$data['sidebar']=array('menu' =>"target");
			$this->load->model('Admin/Target_model');
			$data['target_list']=$this->Target_model->target_list();
			$data['target_type']=$this->Target_model->target_type_list();
			$this->load->view('Admin/target_list_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function getemployee_list()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Target_model');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$targettype_id = $this->input->post('targettype_id');
			$data['emp_list']=$this->Target_model->getemployee_list($start_date,$end_date,$targettype_id);
			$data['get_uom']=$this->Target_model->get_uom($targettype_id);
			$this->load->view('Admin/target_emp_list',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function getemployee_list1()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Target_model');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$targettype_id = $this->input->post('targettype_id');
			$tr_auto_id = $this->input->post('tr_auto_id');
			$data['emp_list']=$this->Target_model->getemployee_list1($start_date,$end_date,$targettype_id,$tr_auto_id);
			$data['get_uom']=$this->Target_model->get_uom($targettype_id);
			$this->load->view('Admin/target_emp_list',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_target()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$target_period = $this->input->post('target_period');
			$start_date = $this->input->post('start_date');
			if ($target_period=='Daily') 
			{
				$end_date = $this->input->post('end_date');
			}
			else
			{
				$end_date = $this->input->post('end_date1');
			}
			
			$targettype_id = $this->input->post('targettype_id');
			$name_values = $this->input->post('name_values');
			$taget_value = $this->input->post('taget_value');
			$uom_id = $this->input->post('uom_id');

	//========================================= validation ====================================

			// $selected_emp = $this->input->post('selected_emp');
			// $checked_index = $this->input->post('checked_index');
			// $check = explode(",",$checked_index);
			// print_r($check);
			if ($name_values!='') 
			{
				// print_r($taget_value);
				$res1 = array_filter($taget_value);
				$res = array_values($res1);
				// print_r($res);
				$emp_id = explode(",",$name_values);
	       		$count = sizeof($emp_id);
				$count1 = count(array_filter($taget_value));
	       		// $count1 = sizeof($taget_value);
	       		if ($count!='0' && $count1 !='0') 
	       		{
	       			if ($count==$count1) 
		       		{
		       			$this->Target_model->add_target($target_period,$start_date,$end_date,$targettype_id,$name_values,$res,$uom_id);
		       			echo "1";
		       		}
		       		else
		       		{
		       			echo "0";
		       		}
	       		}
	       		else
	       		{
	       			echo "0";
	       		}
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

	public function delete_target()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$targetid = $this->input->post('targetid');
			$this->Target_model->delete_target($targetid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function edit_target()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Target_model');
			$targetid = $_REQUEST['targetid'];
			$data['edit_target']=$this->Target_model->edit_target($targetid);
			$data['target_type']=$this->Target_model->target_type_list();
			$data['selected_employee_list']=$this->Target_model->selected_employee_list($targetid);

			$res = $data['edit_target']->result();
			// print_r($res);
			$targettype_id = $res[0]->targettype_id;
			$start_date = $res[0]->start_date;
			$end_date = $res[0]->end_date;
			$data['all_employee_list']=$this->Target_model->getemployee_list($start_date,$end_date,$targettype_id);
			$data['get_uom']=$this->Target_model->get_uom($targettype_id);
			$this->load->view('Admin/edit_target_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_add_target()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$targettype_id = $this->input->post('targettype_id');
			$name_values = $this->input->post('name_values1');
			 $taget_value = $this->input->post('taget_value');
			$tr_auto_id = $this->input->post('tr_auto_id');
			$date_created = $this->input->post('created_date'); 
			$target_period = $this->input->post('target_period');
			// print_r($taget_value);
			$res1 = array_filter($taget_value);
			$res = array_values($res1);

			// print_r($name_values);
			// print_r($res);
			 $emp_id = explode(",",$name_values);
			// print_r($emp_id);
       		  $count = sizeof($emp_id);
			  $count1 = count(array_filter($taget_value));
       		// $count1 = sizeof($taget_value);
			if ($name_values!='') 
			{  
	       		if ($count!='0' && $count1 !='0') 
	       		{
	       			if ($count==$count1) 
		       		{
		       			$this->Target_model->edit_add_target($start_date,$end_date,$targettype_id,$name_values,$res,$tr_auto_id,$date_created,$target_period);
		       			echo "1";
		       		}
		       		else
		       		{
		       			echo "0";
		       		}
	       		}
	       		else
	       		{
	       			echo "0";
	       		}
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

	public function view_emp_list()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Target_model');
			$targetid = $_REQUEST['targetid'];
			$data['view_emp_list']=$this->Target_model->selected_employee_list($targetid);
			$this->load->view('Admin/target_allocated_emp',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function archive_target()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$data['sidebar']=array('menu' =>"archive");
			$this->load->model('Admin/Target_model');
			$data['archive_target']=$this->Target_model->archive_target();
			$this->load->view('Admin/archive_target_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

//============================================ Target type section ========================================

	public function target_type()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Target_model');
			$data['target_type']=$this->Target_model->target_type();
			$this->load->model('Admin/UOM_model');
			$data['sidebar']=array('menu' =>"t_type");
			// print_r($data['target_type']->result());
			$data['get_data']=$this->UOM_model->get_data();
			$this->load->view('Admin/target_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_targettype()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$data = $this->input->post();
			$this->Target_model->add_targettype($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_targettype()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$targettypeid = $this->input->post('targettypeid');
			$this->Target_model->delete_targettype($targettypeid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_targettype()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Target_model');
			$targettypeid = $_REQUEST['targettypeid'];
			$this->load->model('Admin/UOM_model');
			$data['get_data']=$this->UOM_model->get_data();
			$data['edit_targettype']=$this->Target_model->edit_targettype($targettypeid);
			$this->load->view('Admin/edit_target_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_targettype()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Target_model');
			$data = $this->input->post();
			$this->Target_model->Edit_Add_targettype($data);
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
		    $id=$_REQUEST['targettypeid'];
			$this->load->model('Admin/Target_model');
			$data=$this->Target_model->deactivate($id);
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
		    $id=$_REQUEST['targettypeid'];
			$this->load->model('Admin/Target_model');
			$data=$this->Target_model->activate($id);
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
