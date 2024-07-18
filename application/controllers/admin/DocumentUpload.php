<?php

// error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentUpload extends CI_Controller 
{

	public function CreateDirectory()
	{
		if(isset($_SESSION['id']))
		{
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/DocumentUpload_model');
			$data['sidebar']=array('menu' =>"CreateDictory");
			$data['listdata']=$this->DocumentUpload_model->GetListData();
			$data['MainDirectoryList']=$this->DocumentUpload_model->GetMainDirectoryListData();
			// User Permission Functionality ------------
			// module_id = 1, feature id = 7 for Document
			$permission_array_lead=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>7);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array_lead);

			// echo json_encode($data['listdata']);
			$data['type'] = 's_link';
			$data['page_name'] = 'Document Manangement System';
			$this->load->view('Admin/NewCreateDirectoryView',$data);
			// $this->load->view('Admin/CreateDirectoryView',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}


	public function AddDirectory()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/DocumentUpload_model');
			$data = $this->input->post();
			$this->DocumentUpload_model->AddDirectory($data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function DeleteDir()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/DocumentUpload_model');
			$dir_id = $this->input->post('dir_id');
			$this->DocumentUpload_model->DeleteDir($dir_id);
		}
		else
		{
			redirect('admin/Login');
		}		
	}


	public function GetDirData()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/DocumentUpload_model');
			$dir_id = $this->input->post('dir_id');
			$data['GetDirData']=$this->DocumentUpload_model->GetDirData($dir_id);
			$this->load->view('Admin/UploadAttach',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}


	public function ViewDirDocData()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/DocumentUpload_model');
			$this->load->model('Admin/Dashboard_model');
			$dir_id = $this->input->post('dir_id');
			$data['GetDirData']=$this->DocumentUpload_model->GetDirData($dir_id);
			$data['GetDirDocData']=$this->DocumentUpload_model->GetDirDocData($dir_id);
			// User Permission Functionality ------------
			// module_id = 1, feature id = 7 for Document
			$permission_array_lead=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>7);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array_lead);
			$this->load->view('Admin/ViewDirDocData',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}



	public function UploadDocument()
	{
		// $db_dir_id=$_REQUEST['db_dir_id'];
		$this->load->model('Admin/DocumentUpload_model');
		$fileremark = $this->input->post('fileremark');
		$db_dir_id = $this->input->post('db_dir_id');
		$path = $this->input->post('path');
		
		$this->DocumentUpload_model->UploadDocument($db_dir_id,$fileremark,$path);

	}	



	public function UploadDocumentold()
	{
		$this->load->model('Admin/Customer_model');
	   	$ticket_no = $this->input->post('ticket_no');
    	$data['doc_list']=$this->Customer_model->doc_list($ticket_no);

    	// print_r($data['bill_list']);
    	
		// print_r($data['remark_list']);
		$result = $data['remark_list'];
		if ($result==0)
		{
			echo "0";
		}
		else
		{
			$this->load->view('Admin/employee_remark_pending_view',$data);
		}
			
	}




//-----------------------------------------------------------------------------------
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/DocumentUpload_model');
			$data['sidebar']=array('menu' =>"CreditTerms");
			$data['listdata']=$this->DocumentUpload_model->GetListData();
			$this->load->view('Admin/DocumentUploadView',$data);
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
			$this->load->model('Admin/DocumentUpload_model');
			$data = $this->input->post();
			$this->DocumentUpload_model->AddCreditTerm($data);
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
			$this->load->model('Admin/DocumentUpload_model');
			$credit_id = $this->input->post('credit_id');
			$this->DocumentUpload_model->DeleteCreditTerm($credit_id);
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
			$this->load->model('Admin/DocumentUpload_model');
			$credit_id = $_REQUEST['credit_id'];
			$data['edit_data']=$this->DocumentUpload_model->EditCreditTerm($credit_id);
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
			$this->load->model('Admin/DocumentUpload_model');
			$data = $this->input->post();
			$this->DocumentUpload_model->UpdateCreditTerm($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}



}