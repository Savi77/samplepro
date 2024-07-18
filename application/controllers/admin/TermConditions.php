<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class TermConditions extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('Admin/TermConditions_model');
			$data['sidebar']=array('menu' =>"TermsCondition");
			$data['listdata']=$this->TermConditions_model->GetListData();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Term & Conditions';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/TermConditionsView',$data);
			$this->load->view('Admin/NewTermConditionsView',$data);
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
			$this->load->model('Admin/TermConditions_model');
			$data = $this->input->post();
			$this->TermConditions_model->Add($data);
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
			$this->load->model('Admin/TermConditions_model');
			$term_id = $this->input->post('term_id');
			$this->TermConditions_model->Delete($term_id);
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
			$this->load->model('Admin/TermConditions_model');
			$term_id = $_REQUEST['term_id'];
			$data['edit_data']=$this->TermConditions_model->Edit($term_id);
			$this->load->view('Admin/EditTermConditionsView',$data);
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
			$this->load->model('Admin/TermConditions_model');
			$data = $this->input->post();
			$this->TermConditions_model->Update($data);
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
		    $id=$_REQUEST['termid'];
			$this->load->model('Admin/TermConditions_model');
			$data=$this->TermConditions_model->deactivate2($id);
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
		    $id=$_REQUEST['termid'];
			$this->load->model('Admin/TermConditions_model');
			$data=$this->TermConditions_model->activate2($id);
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
    public function ViewTermCondition()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/TermConditions_model');
			$term_id = $_REQUEST['term_id'];
			$data['view_data']=$this->TermConditions_model->ViewTermCondition($term_id);
			
			$this->load->view('Admin/ViewTermConditionsDetails',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

}