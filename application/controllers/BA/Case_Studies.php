<?php
error_reporting(0);
class Case_Studies extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('BuroAdmin/Case_studies_model');
			$data['get_list'] = $this->Case_studies_model->get_list();
			$data['AllCount'] = count($data['get_list']);
			$data['sidebar']=array('menu' =>"Creative_Features");
			$this->load->view('BuroAdmin/case_studies_view',$data);
		}
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function add()
	{
		if(isset($_SESSION['id']))
		{
			$image_one = $_FILES['fileupone']['name'];
            $image_two = $_FILES['fileuptwo']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Case_studies_model');
			$this->Case_studies_model->add($formdata,$image_one,$image_two);
  	    }
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function delete_work()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('BuroAdmin/Case_studies_model');
			$data=$this->Case_studies_model->delete($id);
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
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function edit_work()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['workid'];
			$this->load->model('BuroAdmin/Case_studies_model');
			$data['edit_work']=$this->Case_studies_model->edit($id);
			$this->load->view('BuroAdmin/edit_case_studies',$data);
		}
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function update()
	{
		if(isset($_SESSION['id']))
		{
			$image_one = $_FILES['fileupone']['name'];
            $image_two = $_FILES['fileuptwo']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Case_studies_model');
			$this->Case_studies_model->update($formdata , $image_one , $image_two);
		}
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}

	

	public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('BuroAdmin/Case_studies_model');
			$data=$this->Case_studies_model->deactivate1($id);
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
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('BuroAdmin/Case_studies_model');
			$data=$this->Case_studies_model->activate1($id);
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
			redirect('BuroAdmin/Dashboard');
		}
	}
	
}

