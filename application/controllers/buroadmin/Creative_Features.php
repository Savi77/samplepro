<?php
error_reporting(0);
class Creative_Features extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('BuroAdmin/Creative_features_model');
			$data['get_list'] = $this->Creative_features_model->get_list();
			$data['get_data'] = $this->Creative_features_model->get_data();
			$data['AllCount'] = count($data['get_list']);
			$data['sidebar']=array('menu' =>"Creative_Features");
			$this->load->view('BuroAdmin/creative_features_view',$data);
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
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Creative_features_model');
			$this->Creative_features_model->add($formdata,$image);
  	    }
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}

	public function Update_header()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Creative_features_model');
			$this->Creative_features_model->Update_header($formdata);
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
			$this->load->model('BuroAdmin/Creative_features_model');
			$data=$this->Creative_features_model->delete($id);
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
			$this->load->model('BuroAdmin/Creative_features_model');
			$data['edit_work']=$this->Creative_features_model->edit($id);
			$this->load->view('BuroAdmin/edit_creative_features',$data);
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
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Creative_features_model');
			$this->Creative_features_model->update($formdata,$image);
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
			$this->load->model('BuroAdmin/Creative_features_model');
			$data=$this->Creative_features_model->deactivate1($id);
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
			$this->load->model('BuroAdmin/Creative_features_model');
			$data=$this->Creative_features_model->activate1($id);
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

