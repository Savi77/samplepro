<?php
error_reporting(0);
class Service_Feature extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$this->load->model('BuroAdmin/Service_features_model');
			$data['get_list'] = $this->Service_features_model->get_list();
			$data['get_data'] = $this->Service_features_model->get_data();
			$data['AllCount'] = count($data['get_list']);
			$data['sidebar']=array('menu' =>"Service_Feature");
			$this->load->view('BuroAdmin/service_feature_view',$data);
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
			$this->load->model('BuroAdmin/Service_features_model');
			$this->Service_features_model->add($formdata,$image);
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
			$this->load->model('BuroAdmin/Service_features_model');
			$this->Service_features_model->Update_header($formdata);
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
			$this->load->model('BuroAdmin/Service_features_model');
			$data=$this->Service_features_model->delete($id);
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

	public function add_service()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('BuroAdmin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$data['sidebar']=array('menu' =>"Service_Feature");
			$this->load->model('BuroAdmin/Service_features_model');
			$this->load->view('BuroAdmin/add_service_feature');
		}
		else
		{
			redirect('BuroAdmin/Dashboard');
		}
	}
	public function edit_service()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ------------------------
			$this->load->model('BuroAdmin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//-----------------------------------------------
			
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Service_features_model');
			$data['edit_work']=$this->Service_features_model->edit($id);
			$data['sidebar']=array('menu' =>"Service_Feature");
			$this->load->view('BuroAdmin/edit_service_feature',$data);
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
			$this->load->model('BuroAdmin/Service_features_model');
			$data = $this->Service_features_model->update($formdata,$image);
			if ($data == 1) {
				$this->session->set_flashdata('success', 'Updated  Successfully!!');
				redirect('buroadmin/Service_Feature');
			}
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
			$this->load->model('BuroAdmin/Service_features_model');
			$data=$this->Service_features_model->deactivate1($id);
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
			$this->load->model('BuroAdmin/Service_features_model');
			$data=$this->Service_features_model->activate1($id);
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

