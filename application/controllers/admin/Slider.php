
<?php
// error_reporting(0);
class Slider extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Slider_model');
			$data['get_list']=$this->Slider_model->get_list();
			// $data['get_data']=$this->Slider_model->get_data();
			$data['sidebar']=array('menu' =>"slider");
			$this->load->view('Admin/slider_view',$data);
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
			$this->load->model('Admin/Slider_model');
			$this->Slider_model->add($formdata,$image);
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
			$this->load->model('Admin/Slider_model');
			$this->Slider_model->Update_header($formdata);
  	    }
		else
		{
			redirect('admin/Dashboard');
		}
	}

	public function delete_slider()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['workid'];
			$this->load->model('Admin/Slider_model');
			$data=$this->Slider_model->delete($id);
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

	public function edit_slider()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['sliderid'];
			$this->load->model('Admin/Slider_model');
			$data['edit_slider']=$this->Slider_model->edit($id);
			$this->load->view('Admin/edit_slider',$data);
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
			$this->load->model('Admin/Slider_model');
			$this->Slider_model->update($formdata,$image);
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
		    $id=$_REQUEST['sliderid'];
			$this->load->model('Admin/Slider_model');
			$data=$this->Slider_model->deactivate1($id);
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
		    $id=$_REQUEST['sliderid'];
			$this->load->model('Admin/Slider_model');
			$data=$this->Slider_model->activate1($id);
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

