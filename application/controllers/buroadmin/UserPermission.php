<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPermission extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/User_model');
			$data['sidebar']=array('menu' =>"UserPermission");
			$data['array_users']=$this->User_model->get_user();
			$data['array_module']=$this->User_model->get_array_module();
			$this->load->model('Admin/UserPermission_model');
			$data['feature_list']=$this->UserPermission_model->get_list_feature();
			$this->load->view('Admin/UserPermissionView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function GetUserPermission()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/UserPermission_model');
			$data['feature_list']=$this->UserPermission_model->GetUserPermission();
			// print_r($data['feature_list']);
			$this->load->view('Admin/Permissionlist',$data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}


	public function SetUserPermission()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->SetUserPermission($formdata);
		}
		else
		{
			redirect('admin/Login');
		}	
	}



	public function Add_user()
	{
		if(isset($_SESSION['id']))
		{
			$cur_date = date("YmdHi");
			$name=$_REQUEST['name'];
			$email=$_REQUEST['email'];
			$password=$_REQUEST['password'];
			$mobile_no=$_REQUEST['mobile_no'];
			$file =$_FILES['file']['name'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->user_add($name,$email,$password,$mobile_no,$file);
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

	public function SetPermission()
	{
		$formdata=$this->input->post();
		print_r($formdata);
	}

	public function user_delete()
	{
		if(isset($_SESSION['id']))
		{
		    $u_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->user_delete($u_id);
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

	public function edit_user()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------			
		    $usr_id=$_REQUEST['usr_id'];
			$this->load->model('Admin/User_model');
			$data['edit_user']=$this->User_model->user_edit($usr_id);
			$this->load->view('Admin/edit_user_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Edit_Add_user()
	{
		if(isset($_SESSION['id']))
		{
			//echo "dgfdg";
			 $cur_date = date("YmdHi");
			 $this->load->model('Admin/User_model');
			 $user_id=$this->input->post('user_id');
		     $name=$_REQUEST['name'];
		     $email=$_REQUEST['email'];
		     $password=$_REQUEST['password'];
		     $mobile_no=$_REQUEST['mobile_no'];
		     $fileup =$_FILES['fileup']['name'];
			$this->User_model->edit_user_add($user_id,$name,$email,$password,$mobile_no,$fileup);
			
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function confirm_user()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->confirm_user($user_id);
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

	public function cancel_user()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->cancel_user($user_id);
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
//===================== Update customer by user confirmation=================================
	public function cancel_approval()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->cancel_approval($user_id);
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

	public function update_approval()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->update_approval($user_id);
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

//===================== / Update customer by user confirmation =================================
//===================== Schedule View Permission =================================
	public function cancel_login_permission()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->cancel_login_permission($user_id);
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

	public function update_login_permission()
	{
		if(isset($_SESSION['id']))
		{
		    $user_id=$_REQUEST['user_id'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->update_login_permission($user_id);
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

//===================== / Schedule View Permission =================================
	//---------------------------------------------------------------------------
   public function check_existmail()
	{
		// echo "123";
		$email=$this->input->post('email_id');
		$this->load->model('Admin/User_model');
		$this->User_model->check_existmail($email); 
	}

	//---------------------------------------------------------------------------
   public function check_mobile()
	{
		// echo "123";
		$mobile_no=$this->input->post('mobile_no');
		$this->load->model('Admin/User_model');
		$this->User_model->check_mobile($mobile_no); 
	}



	

}
