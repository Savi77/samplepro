
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
			$data['GetNotes']=$this->Dashboard_model->GetNotes(); 

	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //---------------------------------------------------------------------------
			$this->load->model('Admin/User_model');
			$data['sidebar']=array('menu' =>"user");
			$data['array_users']=$this->User_model->get_user();
			$data['department']=$this->User_model->get_department();
			$data['plan_subscription']=$this->User_model->get_plan_subscription();
			$this->load->model('Admin/Customer_model');
			$this->load->model('Admin/Master_model');

			$data['country_list']=$this->Customer_model->country_list();
			$data['doc_type']=$this->Master_model->get_doc_type_report();


			

			$data['organsation_array']=$this->Dashboard_model->get_organsation_array();
			$data['financial_detail']=$this->Dashboard_model->get_financial_detail_array();
			$middleSession = $data['financial_detail']->short_year;

			//Last year Id 
			$emp_prefix = $data['organsation_array']->emp_prefix;

			$data['last_po'] = $this->Dashboard_model->getLastRecord('tbl_admin_login', 'custom_id');

			if ($data['last_po']) {
				$orderId  = $data['last_po']->last_id  + 1;
				$data['order_id'] = $orderId;
				$data['performaGui'] = $emp_prefix .  "/" . $middleSession    .  "/" . $orderId;
			} else {
				$emp_number = $data['organsation_array']->emp_number;
				$data['order_id'] = $emp_number;
				$data['performaGui'] = $emp_prefix .  "/" . $middleSession    .  "/" . $emp_number;
			}
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'Manage Resource';
			$data['sidebar']=array('menu' =>"UserManagement");
			// $data['array_module']=$this->User_model->get_array_module();
			// $this->load->view('Admin/user_view',$data);
			$this->load->view('Admin/new_user_view',$data);
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
			if ($_REQUEST['joining_date'] != '') {
				$joining_date1 = str_replace(',', ' ', $_REQUEST['joining_date']);
				$db_joining_date = date("Y-m-d", strtotime($joining_date1));
			} else {
				$db_joining_date = '';
			}

			if ($_REQUEST['dob_date'] != '') {
				$dob_date1 = str_replace(',', ' ', $_REQUEST['dob_date']);
				$db_dob_date = date("Y-m-d", strtotime($dob_date1));
			} else {
				$db_dob_date = '';
			}

			if ($_REQUEST['marriage_anniversary_date'] != '') {
				$marriage_anniversary_date1 = str_replace(',', ' ', $_REQUEST['marriage_anniversary_date']);
				$db_marriage_anniversary_date = date("Y-m-d", strtotime($marriage_anniversary_date1));
			} else {
				$db_marriage_anniversary_date = '';
			}

			$cur_date = date("YmdHi");
			$fname=$_REQUEST['fname'];
			$lname=$_REQUEST['lname'];
			$name= $fname.' '.$lname;
			$department=$_REQUEST['user_department'];
			$designation=$_REQUEST['user_designation'];
			$nationality=$_REQUEST['nationality'];
			$address = $_REQUEST['address'];
			$gender = $_REQUEST['gender'];
			$blood_group = $_REQUEST['blood_group'];
			$pan_no = $_REQUEST['pan_no'];
			$aadhar_no = $_REQUEST['aadhar_no'];
			$password=$_REQUEST['password'];
			$mobile_no=$_REQUEST['mobile_no'];
			$alternate_mobile_no=$_REQUEST['altr_mobile_no'];
			$email=$_REQUEST['email'];
			$alternate_email=$_REQUEST['altr_email'];
			$joining_date=$db_joining_date;
			$dob_date = $db_dob_date;
			$marriage_anniversary_date = $db_marriage_anniversary_date;
			$file =$_FILES['fileup']['name'];
            $custom_id = $_REQUEST['custom_id'];
			$emp_id = $_REQUEST['emp_id'];
			$doc_type = $_REQUEST['doc_type'];
			// $joining_date = $db_joining_date;
			
			// $user_type_io = $_REQUEST['user_type_io'];
			

			// $module_ids=$_REQUEST['module_ids'];
			$this->load->model('Admin/User_model');
			// $data=$this->User_model->user_add($user_type_io,$name,$email,$custom_id,$password,$mobile_no,$file,$department,$designation,$emp_id,$joining_date,$dob_date,$marriage_anniversary_date);
			$data=$this->User_model->user_add($name,$fname,$lname,$email,$custom_id,$password,$mobile_no,$file,$department,$designation,$emp_id,$joining_date,$dob_date,$marriage_anniversary_date,$nationality,$address,$gender,$blood_group,$pan_no,$aadhar_no,$alternate_mobile_no,$alternate_email,$doc_type);
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


	public function chk_emp_code()
	{
		if(isset($_SESSION['id']))
		{
		    $emp_code = $_REQUEST['emp_code'];
			$id = $_REQUEST['id'];
			$this->load->model('Admin/User_model');
			echo $this->User_model->chk_emp_code($emp_code,$id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_emp_code_add()
	{
		if(isset($_SESSION['id']))
		{
		    $emp_code = $_REQUEST['emp_code'];
			$this->load->model('Admin/User_model');
			$a = $this->User_model->chk_emp_code_add($emp_code);
			echo $a;
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
			$data['edit_user'] = $this->User_model->user_edit($usr_id);
			$data['department']=$this->User_model->get_department();

			$this->load->model('Admin/Customer_model');
			$data['country_list']=$this->Customer_model->country_list();
			$this->load->model('Admin/Master_model');
			$data['doc_type']=$this->Master_model->get_doc_type_report();
			
			// $data['designation']=$this->User_model->get_designation_data($data['edit_user'][0]->department);
			$data['designation']=$this->User_model->get_designation_data_edit();
			$data['doc'] = $this->User_model->user_document_details($usr_id);

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
			// echo "<pre>";
			// print_r($_REQUEST);
			// die;
			//echo "dgfdg";
			if ($_REQUEST['joining_date'] != '') {
				$joining_date1 = str_replace(',', ' ', $_REQUEST['joining_date']);
				$db_joining_date = date("Y-m-d", strtotime($joining_date1));
			} else {
				$db_joining_date = '';
			}

			if ($_REQUEST['dob_date'] != '') {
				$dob_date1 = str_replace(',', ' ', $_REQUEST['dob_date']);
				$db_dob_date = date("Y-m-d", strtotime($dob_date1));
			} else {
				$db_dob_date = '';
			}

			if ($_REQUEST['marriage_anniversary_date'] != '') {
				$marriage_anniversary_date1 = str_replace(',', ' ', $_REQUEST['marriage_anniversary_date']);
				$db_marriage_anniversary_date = date("Y-m-d", strtotime($marriage_anniversary_date1));
			} else {
				$db_marriage_anniversary_date = '';
			}

			$cur_date = date("YmdHi");
			$this->load->model('Admin/User_model');

			$user_id=$_REQUEST['user_id'];
			$fname=$_REQUEST['fname'];
			$lname=$_REQUEST['lname'];
			$name= $fname. ' ' .$lname;
			$email=$_REQUEST['email'];
			$custom_id = $_REQUEST['custom_id'];
			$emp_id = $_REQUEST['emp_id'];
			$joining_date = $db_joining_date;
			$password=$_REQUEST['password'];
			$mobile_no=$_REQUEST['mobile_no'];
			$department=$_REQUEST['user_department'];
			$designation=$_REQUEST['user_designation'];
			$nationality=$_REQUEST['nationality'];
			$address = $_REQUEST['address'];
			$gender = $_REQUEST['gender'];
			$blood_group = $_REQUEST['blood_group'];
			$pan_no = $_REQUEST['pan_no'];
			$aadhar_no = $_REQUEST['aadhar_no'];
			$alternate_mobile_no=$_REQUEST['altr_mobile_no'];
			$alternate_email=$_REQUEST['altr_email'];
			$fileup =$_FILES['fileup']['name'];
			$dob_date = $db_dob_date;
			$marriage_anniversary_date = $db_marriage_anniversary_date;	
			$doc_type = $_REQUEST['edit_doc_type'];  
			$doc_auto_id = $_REQUEST['doc_auto_id'];   
			$this->User_model->edit_user_add($user_id,$fname,$lname,$name,$email,$password,$mobile_no,$fileup,$department,$designation,$emp_id,$joining_date,$dob_date,$marriage_anniversary_date,$nationality,$address,$gender,$blood_group,$pan_no,$aadhar_no,$alternate_mobile_no,$alternate_email,$doc_type,$doc_auto_id);
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
		$email=$_REQUEST['email'];
		$id=$_REQUEST['id'];
		// $email=$this->input->post('email_id');
		$this->load->model('Admin/User_model');
		$a = $this->User_model->check_existmail($email,$id); 
		echo $a;
		
	}

	public function check_existmail_add()
	{
		// echo "123";
		// $email=$_REQUEST['email'];
		$email=$this->input->post('email_id');
		$this->load->model('Admin/User_model');
		$a = $this->User_model->check_existmail_add($email); 
		echo $a;
		
	}

	//---------------------------------------------------------------------------
   public function check_mobile()
	{
		// echo "123";
		$mobile_no=$this->input->post('mobile_no');
		$this->load->model('Admin/User_model');
		$this->User_model->check_mobile($mobile_no); 
	}


	public function getDepartmentId()
	{
		$this->load->model('Admin/User_model');
		$dep_id = $this->input->post('department');
		echo $this->User_model->getDesignation($dep_id); 
	}
	public function user_document_details()
	{
		
		$id = $this->input->post('user_id');
		$this->load->model('Admin/User_model');
		$data['DocumentData'] = $this->User_model->user_document_details($id);
		
		$this->load->view('Admin/UserDocumentData',$data);	
	}

	public function delete_document()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/User_model');
			$document_id = $this->input->post('document_id');
			$this->User_model->delete_document($document_id);
		}
		else
		{
			redirect('admin/Login');
		}
	}

}
