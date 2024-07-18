<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends CI_Controller
 {

	public function index()
	{
		if(isset($this->session->id))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('BuroAdmin/Policy_model');
			$data['get_list']=$this->Policy_model->get_list();
			$data['get_data']=$this->Policy_model->get_data();
			$data['sidebar']=array('menu' =>"policy"); 
			$this->load->view('BuroAdmin/policy_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}


	public function add()
	{
		if(isset($this->session->id))
		{
			 $formdata =$this->input->post();
			 // print_r($formdata);
			$this->load->model('BuroAdmin/Policy_model');
			$this->Policy_model->add($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}


	public function delete()
	{
		if(isset($this->session->id))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('BuroAdmin/Policy_model');
			$data=$this->Policy_model->delete($id);
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
			redirect('BuroAdminLogin');
		}
	}

	public function deactivate()
	{
		if(isset($this->session->id))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('BuroAdmin/Policy_model');
			$data=$this->Policy_model->deactivate($id);
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
			redirect('BuroAdminLogin');
		}
	}

	public function activate()
	{
		if(isset($this->session->id))
		{
		    $id=$_REQUEST['userid'];
			$this->load->model('BuroAdmin/Policy_model');
			$data=$this->Policy_model->activate($id);
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
			redirect('BuroAdminLogin');
		}
	}

	public function edit()
	{
		if(isset($this->session->id))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Policy_model');
			$data['edit_policy']=$this->Policy_model->edit($id);
			$this->load->view('BuroAdmin/edit_policy',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function update()
	{
		if(isset($this->session->id))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Policy_model');
			$this->Policy_model->update($formdata);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function Update_header()
	{
		if(isset($this->session->id))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Policy_model');
			$this->Policy_model->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

		public function profile_file()
		{
			if(isset($this->session->id))
			{
				$upload_file=$_FILES['upload_file']['name'];
				$formdata =$this->input->post();
				$this->load->model('BuroAdmin/Policy_model');
				$this->Policy_model->profile_file($upload_file,$formdata);
			}
			else
			{
				redirect('BuroAdminLogin');
			}
			
		}
	
}

