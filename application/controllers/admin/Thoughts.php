
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
			// User Permission Functionality ------------ 
			$this->load->model('Admin/Dashboard_model');
			$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Thoughts';
			$data['sidebar']=array('menu' =>"Master");
			
			// $this->load->view('Admin/ThoughtView',$data);
			$this->load->view('Admin/NewThoughtView',$data);
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

	public function deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['thoughtid'];
			$this->load->model('Admin/Thought_model');
			$data=$this->Thought_model->deactivate2($id);
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
		    $id=$_REQUEST['thoughtid'];
			$this->load->model('Admin/Thought_model');
			$data=$this->Thought_model->activate2($id);
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

