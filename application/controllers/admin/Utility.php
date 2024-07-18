
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ----------------------------------------------------
	        $this->load->model('Admin/Dashboard_model');
			$data['GetNotes']=$this->Dashboard_model->GetNotes(); 

	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //---------------------------------------------------------------------------
			$this->load->model('Admin/User_model');
			
			
			$data['type'] = 's_link';
			$data['page_name'] = 'Utility';
			$data['sidebar']=array('menu' =>"Utility");
			
			$this->load->view('Admin/new_utility_page',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}
}
?>