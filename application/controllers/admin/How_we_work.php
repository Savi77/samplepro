
<?php
error_reporting(0);
class How_we_work extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/How_we_work_model');
			$data['get_list']=$this->How_we_work_model->get_list();
			$data['get_data']=$this->How_we_work_model->get_data();
			$data['sidebar']=array('menu' =>"howwework");
			$this->load->view('Admin/how_we_work_view',$data);
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
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('Admin/How_we_work_model');
			$this->How_we_work_model->add($formdata,$image);
  	    }
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function Update_header()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('Admin/How_we_work_model');
			$this->How_we_work_model->Update_header($formdata);
  	    }
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function delete_work()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('Admin/How_we_work_model');
			$data=$this->How_we_work_model->delete($id);
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

	public function edit_work()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['workid'];
			$this->load->model('Admin/How_we_work_model');
			$data['edit_work']=$this->How_we_work_model->edit($id);
			$this->load->view('Admin/edit_howwe_work',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function update()
	{
		if(isset($_SESSION['id']))
		{
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('Admin/How_we_work_model');
			$this->How_we_work_model->update($formdata,$image);
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
		    $id=$_REQUEST['workid'];
			$this->load->model('Admin/How_we_work_model');
			$data=$this->How_we_work_model->deactivate1($id);
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
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('Admin/How_we_work_model');
			$data=$this->How_we_work_model->activate1($id);
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

