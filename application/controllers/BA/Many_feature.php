
<?php
// error_reporting(0);
class Many_feature extends CI_Controller
 {

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('BuroAdmin/Many_feature_model');
			$data['get_list']=$this->Many_feature_model->get_list();
			$data['get_data']=$this->Many_feature_model->get_data();
			$data['sidebar']=array('menu' =>"m_feature");
			$this->load->view('BuroAdmin/many_feature_view',$data);
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
			$this->load->model('BuroAdmin/Many_feature_model');
			$this->Many_feature_model->add($formdata,$image);
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
			$this->load->model('BuroAdmin/Many_feature_model');
			$this->Many_feature_model->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function delete_feature()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Many_feature_model');
			$data=$this->Many_feature_model->delete($id);
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

	public function edit_feature()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Many_feature_model');
			$data['edit_feature']=$this->Many_feature_model->edit($id);
			$data['sidebar']=array('menu' =>"m_feature");
			$this->load->view('BuroAdmin/edit_many_feature',$data);
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
			$this->load->model('BuroAdmin/Many_feature_model');
			$this->Many_feature_model->update($formdata,$image);
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
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Many_feature_model');
			$data=$this->Many_feature_model->deactivate1($id);
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
		    $id=$_REQUEST['id'];
			$this->load->model('BuroAdmin/Many_feature_model');
			$data=$this->Many_feature_model->activate1($id);
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

