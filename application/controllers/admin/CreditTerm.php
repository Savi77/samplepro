<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class CreditTerm extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/CreditTerm_model');
			$data['sidebar']=array('menu' =>"CreditTerms");
			$data['listdata']=$this->CreditTerm_model->GetListData();
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Credit Term';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/CreditTerm',$data);
			$this->load->view('Admin/NewCreditTerm',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function AddCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/CreditTerm_model');
			$data = $this->input->post();
			$this->CreditTerm_model->AddCreditTerm($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function DeleteCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/CreditTerm_model');
			$credit_id = $this->input->post('credit_id');
			$this->CreditTerm_model->DeleteCreditTerm($credit_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function EditCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/CreditTerm_model');
			$credit_id = $_REQUEST['credit_id'];
			$data['edit_data']=$this->CreditTerm_model->EditCreditTerm($credit_id);
			$this->load->view('Admin/EditCreditTermView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function UpdateCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/CreditTerm_model');
			$data = $this->input->post();
			$this->CreditTerm_model->UpdateCreditTerm($data);
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
		    $id=$_REQUEST['creditid'];
			$this->load->model('Admin/CreditTerm_model');
			$data=$this->CreditTerm_model->deactivate2($id);
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
		    $id=$_REQUEST['creditid'];
			$this->load->model('Admin/CreditTerm_model');
			$data=$this->CreditTerm_model->activate2($id);
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