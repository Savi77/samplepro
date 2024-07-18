
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ----------------------------------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //---------------------------------------------------------------------------
			$this->load->model('Admin/User_model');
			$data['sidebar']=array('menu' =>"user");
			$data['array_users']=$this->User_model->get_user();
			$data['array_module']=$this->User_model->get_array_module();
			$this->load->view('Admin/user_view',$data);
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
			$module_ids=$_REQUEST['module_ids'];
			$file =$_FILES['file']['name'];
			$this->load->model('Admin/User_model');
			$data=$this->User_model->user_add($name,$email,$password,$mobile_no,$file,$module_ids);
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
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
		    $usr_id=$_REQUEST['usr_id'];
			$this->load->model('Admin/User_model');
			$data['edit_user']=$this->User_model->user_edit($usr_id);
			$data['array_module']=$this->User_model->get_array_module();
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
			 $user_id=$_REQUEST['user_id'];
		     $name=$_REQUEST['name'];
		     $email=$_REQUEST['email'];
		     $password=$_REQUEST['password'];
		     $mobile_no=$_REQUEST['mobile_no'];
		     $fileup =$_FILES['fileup']['name'];
		     $module_ids=$_REQUEST['module_ids'];		     
			 $this->User_model->edit_user_add($user_id,$name,$email,$password,$mobile_no,$fileup,$module_ids);
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
