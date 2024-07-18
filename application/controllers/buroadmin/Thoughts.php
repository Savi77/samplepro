
<?php
// error_reporting(0);
class Thoughts extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Thought_model');
			$data['get_list']=$this->Thought_model->get_list();
			$data['sidebar']=array('menu' =>"Thoughts");
			$this->load->view('Admin/ThoughtView',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function add()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('Admin/Thought_model');
			$this->Thought_model->add($formdata);
  	    }
		else
		{
			redirect('admin/Dashboard');
		}
	}


	public function delete()
	{
		if(isset($_SESSION['id']))
		{
		    $thought_id=$_REQUEST['thought_id'];
			$this->load->model('Admin/Thought_model');
			$data=$this->Thought_model->delete($thought_id);
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

	public function edit()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
		    $thought_id=$_REQUEST['thought_id'];
			$this->load->model('Admin/Thought_model');
			$data['edit_thought']=$this->Thought_model->edit($thought_id);
			// print_r($data['edit_thought']);
			$this->load->view('Admin/edit_thought',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function Update()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('Admin/Thought_model');
			$this->Thought_model->Update($formdata);
  	    }
		else
		{
			redirect('admin/Dashboard');
		}
	}



}

