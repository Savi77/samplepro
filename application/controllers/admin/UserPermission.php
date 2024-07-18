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
			$data['array_users']=$this->User_model->get_user_data();
			$data['array_module']=$this->User_model->get_array_module();			
			

			$this->load->model('Admin/UserPermission_model');
			$data['feature_list'] = $this->UserPermission_model->get_list_feature();
			$data['role_list'] = $this->UserPermission_model->get_role_list();
			$data['report_list'] = $this->UserPermission_model->get_list_report();

			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'User Permission';
			$data['sidebar']=array('menu' =>"UserManagement");

			// $this->load->view('Admin/UserPermissionView',$data);
			$this->load->view('Admin/NewUserPermissionView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function PermissionRole()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/User_model');
			$data['sidebar']=array('menu' =>"PermissionRole");
			$data['array_users']=$this->User_model->get_user_data();
			$data['array_module']=$this->User_model->get_array_module();
			
			$this->load->model('Admin/UserPermission_model');
			$data['feature_list'] = $this->UserPermission_model->get_list_feature();
			$data['role_list'] = $this->UserPermission_model->get_role_list();
			$data['report_list'] = $this->UserPermission_model->get_list_report();


			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'Role Permission';
			$data['sidebar']=array('menu' =>"UserManagement");
			// $this->load->view('Admin/PermissionRoleView',$data);
			$this->load->view('Admin/NewPermissionRoleView',$data);
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
			$formdata=$this->input->post();
		
			$this->load->model('Admin/UserPermission_model');
			$data['emp_id'] = $formdata['employee_id'];
			$data['feature_list']=$this->UserPermission_model->GetUserPermission($formdata);
			$data['module_list']=$this->UserPermission_model->module_list($formdata);
			$data['report_list'] = $this->UserPermission_model->get_list_report();
			// print_r($data['feature_list']);

			// echo json_encode($data['feature_list']);
			// echo 1;
			$this->load->view('Admin/PermissionListView',$data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function ClonePermission()
	{
		$this->load->model('Admin/Dashboard_model');
		$this->load->model('Admin/User_model');
		$data['sidebar']=array('menu' =>"ClonePermission");
		$data['array_users']=$this->User_model->get_user_data();

		$this->load->model('Admin/UserPermission_model');
		$data['feature_list'] = $this->UserPermission_model->get_list_feature();
		$data['role_list'] = $this->UserPermission_model->get_role_list();
		$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		
		$data['type'] = 'd_link';
		$data['page_name_link'] = 'admin/dashboard/UserManagement';
		$data['page_name_1'] = 'User Management';
		$data['page_name_2'] = 'Assign Role';
		$data['sidebar']=array('menu' =>"UserManagement");

		// $this->load->view('Admin/ClonePermissionView',$data);
		$this->load->view('Admin/NewClonePermissionView',$data);
	}

	public function CopyPermission()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->CopyPermission($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function CopyPermission_assign_role()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->CopyPermission_assign_role($formdata);
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
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->SetUserPermission2($formdata);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function SetRolePermission()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->SetRolePermission($formdata);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function edit_mastergroup()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();

			$this->load->model('Admin/UserPermission_model');
			$data['feature_list']=$this->UserPermission_model->edit_mastergroup($formdata);
			$data['edit_report_list'] = $this->UserPermission_model->edit_report_list($formdata);
			$data['report_list'] = $this->UserPermission_model->get_list_report();

			$data['role_data']=$this->UserPermission_model->role_data($formdata);

			// print_r($data['role_data']);			

			// echo json_encode($data['feature_list']);
			// echo 1;
			$this->load->view('Admin/EditPermissionListView',$data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function EditRolePermission()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->EditRolePermission($formdata);
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

	public function deleteRolePermission()
	{
		if(isset($_SESSION['id']))
		{
			
			$this->load->model('Admin/UserPermission_model');
			$role_id = $this->input->post('role_id');
			$this->UserPermission_model->deleteRolePermission($role_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function UpdateUserPermission()
	{
		
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			// echo "<pre>";
			// print_r($formdata);
			// die;
			$this->load->model('Admin/UserPermission_model');
			$this->UserPermission_model->updateCopyPermission($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}



	

}
