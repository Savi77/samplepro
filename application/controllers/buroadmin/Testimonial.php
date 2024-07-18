<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller 
{
	
	public function index()
	{
		if(isset($this->session->id))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('BuroAdmin/Testimonial_modal');
			$data['testimonial_array']=$this->Testimonial_modal->testimonial();
			$data['get_data']=$this->Testimonial_modal->get_data();
			$data['sidebar']=array('menu' =>"testimonial"); 
			$this->load->view('BuroAdmin/testimonial_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function Add_Testimonial()
	{
		if(isset($this->session->id))
		{
			//echo "dgfdg";
		    $cur_date = date("YmdHi");
			$this->load->model('BuroAdmin/Testimonial_modal');
		    $fullname=$this->input->post('fullname');
			$company_name=$this->input->post('company_name');
			$site_name=$this->input->post('site_name');
			$description=$this->input->post('description');

			$fileup =$_FILES['fileup']['name'];
			
			$data = $this->Testimonial_modal->testimonial_add($fullname,$company_name,$site_name,$description,$fileup);
			if($data)
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

	public function testimonial_delete()
	{
		if(isset($this->session->id))
		{
		    $test_id=$_REQUEST['test_id'];
			$this->load->model('BuroAdmin/Testimonial_modal');
			$data=$this->Testimonial_modal->testimonial_delete($test_id);
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

	public function edit_Testimonial()
	{
		if(isset($this->session->id))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $test_id=$_REQUEST['testid'];
			$this->load->model('BuroAdmin/Testimonial_modal');
			$data['edit_Testimonial']=$this->Testimonial_modal->testimonial_edit($test_id);
			$this->load->view('BuroAdmin/edit_testimonial_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
		
	}

	public function Edit_Add_Testimonial()
	{
		if(isset($this->session->id))
		{
			//echo "dgfdg";
		    $cur_date = date("YmdHi");
			$this->load->model('BuroAdmin/Testimonial_modal');
			$test_id=$this->input->post('test_id');
		    $fullname=$this->input->post('fullname');
		    $site_name=$this->input->post('site_name');
			$company_name=$this->input->post('company_name');
			$description=$this->input->post('description');
		    $fileup = $_FILES['fileup']['name'];
			$data = $this->Testimonial_modal->edit_testimonial_add($test_id,$fullname,$company_name,$site_name,$description,$fileup);
			if($data)
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
			$this->load->model('BuroAdmin/Testimonial_modal');
			$data=$this->Testimonial_modal->deactivate1($id);
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
			$this->load->model('BuroAdmin/Testimonial_modal');
			$data=$this->Testimonial_modal->activate1($id);
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

	public function Update_header()
	{
		if(isset($this->session->id))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Testimonial_modal');
			$this->Testimonial_modal->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	

}
