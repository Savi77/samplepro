<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	
	public function index()
	{
		if(isset($this->session->id))
		{
	        // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
			$this->load->model('Admin/Clients_model');
			$data['array_client']=$this->Clients_model->manage_clients();
      		$data['sidebar']=array('menu' =>"client"); 
			$this->load->view('Admin/manage_client_view',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}

	public function Add_client()
	{
		if(isset($this->session->id))
		{
		   	$this->load->model('Admin/Clients_model');
		    $name = $this->input->post('name');
	    	$url = $this->input->post('url');
		   	$description = $this->input->post('description');

		   	// Logo
		   	$fileup = $_FILES['fileup']['name'];

  			$this->Clients_model->Add_clients($name,$url,$fileup);
  			
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}

	public function delete_client()
	{
		if(isset($this->session->id))
		{
			$this->load->model('Admin/Clients_model');
		  $clientid = $this->input->post('clientid');
			$data=$this->Clients_model->del_clients($clientid);
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
			redirect('admin/Dashboard');
		}
	}


	public function edit_client()
	{
			 $this->load->model('Admin/Clients_model');
		   $clientid = $this->input->post('clientid');
		   $data['edit_client']=$this->Clients_model->edit_client($clientid);
			 $this->load->view('Admin/edit_client_view',$data);
		
		
	}

	public function Edit_Add_Client()
	{
		if(isset($this->session->id))
		{
		   	$this->load->model('Admin/Clients_model');
		   	$id = $this->input->post('id');
		    $name = $this->input->post('name');
	    	$url = $this->input->post('url');
        $fileup = $_FILES['fileup']['name'];
			  $this->Clients_model->edit_client_add($id,$name,$url,$fileup);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}


	public function deactivate()
	{
		if(isset($this->session->id))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Clients_model');
			$data=$this->Clients_model->deactivate1($id);
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
			redirect('admin/Dashboard');
		}
	}

	public function activate()
	{
		if(isset($this->session->id))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('Admin/Clients_model');
			$data=$this->Clients_model->activate1($id);
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
			redirect('admin/Dashboard');
		}
	}



	

}
