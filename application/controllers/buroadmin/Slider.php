
<?php
// error_reporting(0);
class Slider extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('BuroAdmin/Slider_model');
			$data['get_list']=$this->Slider_model->get_list();
			// $data['get_data']=$this->Slider_model->get_data();
			$data['sidebar']=array('menu' =>"slider");
			$this->load->view('BuroAdmin/slider_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function add()
	{
		if(isset($_SESSION['id']))
		{
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Slider_model');
			$this->Slider_model->add($formdata,$image);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function Update_header()
	{
		if(isset($_SESSION['id']))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Slider_model');
			$this->Slider_model->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function delete_slider()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['sliderid'];
			$this->load->model('BuroAdmin/Slider_model');
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
			redirect('BuroAdminLogin');
		}
	}

	public function edit_slider()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
		    $id=$_REQUEST['sliderid'];
			$this->load->model('BuroAdmin/Slider_model');
			$data['edit_slider']=$this->Slider_model->edit($id);
			$this->load->view('BuroAdmin/edit_slider',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function update()
	{
		if(isset($_SESSION['id']))
		{
			$image=$_FILES['fileup']['name'];
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Slider_model');
			$this->Slider_model->update($formdata,$image);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	

	public function deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['sliderid'];
			$this->load->model('BuroAdmin/Slider_model');
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
			redirect('BuroAdminLogin');
		}
	}

	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['sliderid'];
			$this->load->model('BuroAdmin/Slider_model');
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
			redirect('BuroAdminLogin');
		}
	}
	
}

