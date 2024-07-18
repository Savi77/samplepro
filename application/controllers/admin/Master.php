<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{
	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Master_model');
			$data['get_data']=$this->Master_model->get_data();
			$data['sidebar']=array('menu' =>"s_type"); 
			$data['user_permission']= $this->GetPermisstionMaster();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Task Type List';
			$data['sidebar']=array('menu' =>"Master");
           
			// $this->load->view('Admin/schedule_type_view',$data);
			$this->load->view('Admin/new_schedule_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_schedule($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_schedule()
	{
		// echo "<pre>";
		// print_r($this->input->post('scheduletid'));
		// die;
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$scheduletid = $this->input->post('scheduletid');
			$this->Master_model->delete_schedule($scheduletid);
			// redirect('admin/Master');
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_master()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$scheduleid = $_REQUEST['scheduleid'];
			$data['editschedule']=$this->Master_model->edit_master($scheduleid);
			$this->load->view('Admin/edit_schedule_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_schedule($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate1($id);
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
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate1($id);
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



	//============================================ Group section ========================================

	public function grouplist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"grouplist"); 
			$data['get_groupdata']=$this->Master_model->get_groupdata();
			$data['user_permission']= $this->GetPermisstionMaster();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Groups';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/group_view',$data);
			$this->load->view('Admin/new_group_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_group($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$grouptid = $this->input->post('grouptid');
			$this->Master_model->delete_group($grouptid);
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
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$grouptid = $_REQUEST['grouptid'];
			$data['editgroup']=$this->Master_model->edit_mastergroup($grouptid);
			$this->load->view('Admin/edit_group',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_group()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_group($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate1()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['grouptid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate($id);
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

	public function activate1()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['grouptid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate($id);
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






//============================================ Business Segment ========================================

	public function businesslist()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"busslist"); 
			$data['get_businessdata']=$this->Master_model->get_businessdata();
			$data['user_permission']= $this->GetPermisstionMaster();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Business Segment';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/business_segment_view',$data);
			$this->load->view('Admin/new_business_segment_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_business($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$businessid = $this->input->post('businessid');
			$this->Master_model->delete_business($businessid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_masterbusiness()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$businessid = $_REQUEST['businessid'];
			$data['editbusiness']=$this->Master_model->edit_masterbusiness($businessid);
			$this->load->view('Admin/edit_business',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_business()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_business($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate2()
	{
        
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['businessid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate2($id);
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

	public function activate2()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['businessid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate2($id);
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


//============================================ Type Section ========================================

	public function typelist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"typelist"); 
			$data['get_typedata']=$this->Master_model->get_typedata();
			$data['user_permission']= $this->GetPermisstionMaster();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Contact Type List';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/type_view',$data);
			$this->load->view('Admin/new_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$typeid = $this->input->post('typeid');
			$this->Master_model->delete_type($typeid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function edit_mastertype()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$typeid = $_REQUEST['typeid'];
			$data['edittype']=$this->Master_model->edit_mastertype($typeid);
			$this->load->view('Admin/edit_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_type($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate3()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['typeid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate3($id);
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

	public function activate3()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['typeid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate3($id);
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

	//============================================ Location Section ========================================

	public function locationlist()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"loclist");
			$data['get_locationdata']=$this->Master_model->get_locationdata();
			$data['user_permission']= $this->GetPermisstionMaster();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Location';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/location_view',$data);
			$this->load->view('Admin/new_location_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_location($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function time_list()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_timeslot_data']=$this->Master_model->get_timeslot_data();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Time Slot';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/time_slot_view',$data);
			$this->load->view('Admin/new_time_slot_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_time()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_time($data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function time_slot_deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['time_slot_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->time_slot_deactivate($id);
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

	public function time_slot_activate()
	{

		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['time_slot_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->time_slot_activate($id);
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

	public function edit_time_slot()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$time_slot_id = $_REQUEST['time_slot_id'];
			$data['edit_time_slot_data'] = $this->Master_model->edit_time_slot($time_slot_id);
			// echo json_encode($edit_time_slot);
			$this->load->view('Admin/edit_time_slot',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function updateTimeSlot()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$time_slot_id = $this->input->post('time_slot_id');
			$time_slot = $this->input->post('time_slot');
			$this->Master_model->updateTimeSlot($time_slot_id,$time_slot);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deleteTimeSlot()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$time_slot_id = $this->input->post('time_slot_id');
			$this->Master_model->deleteTimeSlot($time_slot_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Test()
	{
		$this->db->where('timezone_id',3);
        $this->db->set('status',1);
        $data = $this->db->get('tbl_timezone')->row();
		var_dump($data);

		date_default_timezone_set($data->timezone_code);

		echo date('d M, Y H:i:s');

		exit;
	}

	public function delete_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$locationid = $this->input->post('locationid');
			$this->Master_model->delete_location($locationid);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function edit_masterlocation()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$locationid = $_REQUEST['locationid'];
			$data['edit_masterlocation']=$this->Master_model->edit_masterlocation($locationid);
			$this->load->view('Admin/edit_location',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_Add_location()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_location($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate4()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['locationid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate4($id);
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

	public function activate4()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['locationid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate4($id);
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

	//---------------- Credit Term Master ----------------

	public function CreditTerm()
	{
		if(isset($_SESSION['id']))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"loclist");
			$data['get_locationdata']=$this->Master_model->get_locationdata();
			$this->load->view('Admin/location_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function AddCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_location($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function DeleteCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$locationid = $this->input->post('locationid');
			$this->Master_model->delete_location($locationid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function EditCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$locationid = $_REQUEST['locationid'];
			$data['edit_masterlocation']=$this->Master_model->EditCreditTerm($locationid);
			$this->load->view('Admin/EditCreditTermView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function UpdateCreditTerm()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->UpdateCreditTerm($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function department_designation()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			 $data['GetNotes']=$this->Dashboard_model->GetNotes(); 
			
			$this->load->model('Admin/Master_model');
			$data['sidebar']=array('menu' =>"DepDes"); 
			$data['get_data']=$this->Master_model->get_depdegData();
			$data['user_permission']= $this->GetPermisstionMaster();
			$data['page_name'] = 'Department/Designation';
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'Department-Designation';
			$data['sidebar']=array('menu' =>"UserManagement");
			// $this->load->view('Admin/department_designation_view',$data);
			$this->load->view('Admin/new_department_designation_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function add_department_designation()
	{
		$this->load->model('Admin/Master_model');
		$final_array = array();
		$dep_id =$this->Master_model->insert_department($this->input->post('department'));
		$designation = $this->input->post('designation');
		$org_id  = $this->session->org_id;
		if ($designation[0] == '') {
			echo 0;
		}else {
			for ($i=0; $i < count($designation); $i++) { 
				$data = array(
					'org_id' => $org_id,
					'department_id' => $dep_id,
					'designation_name' => $designation[$i],
					'delete_status' => 0
				);
				array_push($final_array,$data);
			}
			$this->Master_model->insert_designation($final_array);
			echo 1;	
		}
	}

	public function edit_department_designation()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$dep_id = $_REQUEST['dep_id'];
			$deg_id = $_REQUEST['deg_id'];
			$data['edit_dep']=$this->Master_model->edit_department($dep_id);
			$data['edit_deg']=$this->Master_model->edit_designation($deg_id);
			$this->load->view('Admin/edit_department_designation',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Edit_DepartmentDesignation()
	{
		$this->load->model('Admin/Master_model');
		$this->Master_model->update_dep($this->input->post('dep_id'),$this->input->post('department_name'));
		$this->Master_model->update_deg($this->input->post('deg_id'),$this->input->post('designation_name'));
	}

	public function deleteDepartmentDesignation()
	{
		
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$dep_id = $this->input->post('dep_id');
			$deg_id = $this->input->post('deg_id');
			$this->Master_model->deleteDepartmentDesignation($dep_id,$deg_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	//-----------------------GetPermisstionMaster--------------------
	public function GetPermisstionMaster()
	{
		// User Permission Functionality ------------ 
		$this->load->model('Admin/Dashboard_model');
		$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>32);
		return $this->Dashboard_model->get_user_permission($permission_array);
	}

	public function view_master()
	{
		$this->load->model('Admin/UOM_model');
		$this->load->model('Admin/Target_model');
		$this->load->model('Admin/Master_model');
		$this->load->model('Admin/Schedule_type_model');
		$this->load->model('Admin/CreditTerm_model');
		$this->load->model('Admin/Expense_model');
		$this->load->model('Admin/Ecommerce_model');
		$this->load->model('Admin/Leads_model');
		$this->load->model('Admin/Target_model');
		$this->load->model('Admin/TermConditions_model');
		$this->load->model('Admin/Thought_model');
		$data['target_list']=$this->Target_model->target_list();
		$data['target_type']=$this->Target_model->target_type_list();
		$data['get_data']=$this->UOM_model->get_data();
		$data['activity_type_list']=$this->Master_model->get_data()->result();
		$data['activity_list'] = $this->Schedule_type_model->get_list();
		$data['business_segment']=$this->Master_model->get_businessdata()->result();
		$data['branch']=$this->Master_model->get_branch()->result();
		$data['contact_type']=$this->Master_model->get_typedata()->result();
		$data['credit_term']=$this->CreditTerm_model->GetListData();
		$data['expense']=$this->Expense_model->get_expense_list();	
        $data['group']=$this->Master_model->get_groupdata()->result();
		$data['location']=$this->Master_model->get_locationdata()->result();
		$data['order_status']=$this->Ecommerce_model->get_data()->result();
		$data['source_list']=$this->Leads_model->get_data()->result();
		$data['stage_list']=$this->Leads_model->get_stagedata()->result();
		$data['target_type_list']=$this->Target_model->target_type()->result();
		$data['term_conditions']=$this->TermConditions_model->GetListData();
		$data['thought']=$this->Thought_model->get_list();
		$data['archive_target']=$this->Target_model->archive_target();
		$data['timeslot']=$this->Master_model->get_timeslot_data();
		$data['notifyby']=$this->Master_model->get_notifyby_data();
		$data['freq_type']=$this->Master_model->get_freq_type_data();
		$data['freq_wise_report']=$this->Master_model->get_freq_wise_report();
		$data['doc_type']=$this->Master_model->get_doc_type_report();
		$data['event_notify']=$this->Master_model->get_event_notify_report();



		$data['type'] = 's_link';
		$data['page_name'] = 'Master';
		$data['sidebar']=array('menu' =>"Master"); 
		// $this->load->view('Admin/Master',$data);
		$this->load->view('Admin/NewMaster',$data);
	}

	public function branch_master()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Master_model');
			$data['get_branch']=$this->Master_model->get_branch();
			$data['sidebar']=array('menu' =>"s_type"); 
			$data['user_permission']= $this->GetPermisstionMaster();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Branch';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/branch_master',$data);
			$this->load->view('Admin/new_branch_master',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function add_branch()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_branch_data($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate_branch()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['branchid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->deactivate_branch($id);
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

	public function activate_branch()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['branchid'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->activate_branch($id);
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

	public function edit_branch()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Master_model');
			$branchid = $_REQUEST['branchid'];
			$data['edit_branch']=$this->Master_model->edit_branch($branchid);
			$this->load->view('Admin/edit_branch',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Edit_Add_Branch()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->Edit_Add_Branch($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function DeleteBranch()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$branchid = $this->input->post('branchid');
			$this->Master_model->delete_branch($branchid);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function view_projectmilestone()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			
			


			$this->load->view('Admin/projectmilestone');
		}
		else
		{
			redirect('admin/Login');
		}
	}
	// NotifyBy
	public function NotifyBy()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_timeslot_data']=$this->Master_model->get_notifyby_data();

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Notify By';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/notify_by_view',$data);
			$this->load->view('Admin/new_notify_by_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}
	public function insertNotifyBy()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->insertNotifyBy($data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function notify_by_deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['time_slot_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->notify_by_deactivate($id);
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

	public function notify_by_activate()
	{

		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['time_slot_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->notify_by_activate($id);
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

	public function edit_notify_by()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$notify_id = $_REQUEST['time_slot_id'];
			$data['edit_notify_by_data'] = $this->Master_model->edit_notify_by($notify_id);
			$this->load->view('Admin/edit_notify_by',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function updateNotifyBy()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$notify_id = $this->input->post('notify_id');
			$edit_notify_by = $this->input->post('edit_notify_by');
			$this->Master_model->updateNotifyBy($notify_id,$edit_notify_by);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_notify_by()
	{

		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['notify_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->delete_notify_by($id);
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

	public function chk_activity_type_list()
	{
		if(isset($_SESSION['id']))
		{
		    $activity_type_list = $_REQUEST['activity_type_list'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_activity_type_list($activity_type_list);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function chk_activity_type_list_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $activity_type_list = $_REQUEST['activity_type_list'];
			$activity_type_list_id = $_REQUEST['activity_type_list_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_activity_type_list_edit($activity_type_list,$activity_type_list_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function chk_activity_list()
	{
		if(isset($_SESSION['id']))
		{
		    $activity_list = $_REQUEST['activity_list'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_activity_list($activity_list);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_activity_list_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $activity_list = $_REQUEST['activity_list'];
			$activity_list_id = $_REQUEST['activity_list_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_activity_list_edit($activity_list,$activity_list_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_business_segment()
	{
		if(isset($_SESSION['id']))
		{
		    $business_segment = $_REQUEST['business_segment'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_business_segment($business_segment);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_business_segment_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $business_segment = $_REQUEST['business_segment'];
			$business_segment_id = $_REQUEST['business_segment_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_business_segment_edit($business_segment,$business_segment_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_branch()
	{
		if(isset($_SESSION['id']))
		{
		    $branch = $_REQUEST['branch'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_branch($branch);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_branch_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $branch = $_REQUEST['branch'];
			$branch_id = $_REQUEST['branch_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_branch_edit($branch,$branch_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_contact_type()
	{
		if(isset($_SESSION['id']))
		{
		    $title = $_REQUEST['title'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_contact_type($title);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_contact_type_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $title = $_REQUEST['title'];
			$title_id = $_REQUEST['title_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_contact_type_edit($title,$title_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_credit_name()
	{
		if(isset($_SESSION['id']))
		{
		    $credit_name = $_REQUEST['credit_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_credit_name($credit_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_credit_days()
	{
		if(isset($_SESSION['id']))
		{
		    $credit_days = $_REQUEST['credit_days'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_credit_days($credit_days);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_credit_name_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $credit_name = $_REQUEST['credit_name'];
			$credit_id = $_REQUEST['credit_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_credit_name_edit($credit_name,$credit_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_credit_days_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $credit_days = $_REQUEST['credit_days'];
			$credit_id = $_REQUEST['credit_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_credit_days_edit($credit_days,$credit_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_expense()
	{
		if(isset($_SESSION['id']))
		{
		    $expense_name = $_REQUEST['expense_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_expense($expense_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
    public function chk_expense_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $expense_name = $_REQUEST['expense_name'];
			$expense_id = $_REQUEST['expense_id'];

			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_expense_edit($expense_name,$expense_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_group()
	{
		if(isset($_SESSION['id']))
		{
		    $group_name = $_REQUEST['group_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_group($group_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

    public function chk_group_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $group_name = $_REQUEST['group_name'];
			$group_id = $_REQUEST['group_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_group_edit($group_name,$group_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
    public function chk_location()
	{
		if(isset($_SESSION['id']))
		{
		    $location_name = $_REQUEST['location_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_location($location_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

    public function chk_location_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $location_name = $_REQUEST['location_name'];
			$location_id = $_REQUEST['location_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_location_edit($location_name,$location_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_order_status()
	{
		if(isset($_SESSION['id']))
		{
		    $status_name = $_REQUEST['status_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_order_status($status_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

    public function chk_order_status_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $status_name = $_REQUEST['status_name'];
			$status_id = $_REQUEST['status_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_order_status_edit($status_name,$status_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_source_list()
	{
		if(isset($_SESSION['id']))
		{
		    $source_title = $_REQUEST['source_title'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_source_list($source_title);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_source_list_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $source_title = $_REQUEST['source_title'];
			$source_id = $_REQUEST['source_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_source_list_edit($source_title,$source_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_stage_list()
	{
		if(isset($_SESSION['id']))
		{
		    $stage_title = $_REQUEST['stage_title'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_stage_list($stage_title);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_stage_list_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $stage_title = $_REQUEST['stage_title'];
			$stage_id = $_REQUEST['stage_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_stage_list_edit($stage_title,$stage_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_target_type_list()
	{
		if(isset($_SESSION['id']))
		{
		    $target_type = $_REQUEST['target_type'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_target_type_list($target_type);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_target_type_list_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $target_type = $_REQUEST['target_type'];
			$target_type_id = $_REQUEST['target_type_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_target_type_list_edit($target_type,$target_type_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_thought()
	{
		if(isset($_SESSION['id']))
		{
		    $thought = $_REQUEST['thought'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_thought($thought);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_thoughts_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $thought = $_REQUEST['thought'];
			$thought_id = $_REQUEST['thought_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_thoughts_edit($thought,$thought_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_time_slot()
	{
		if(isset($_SESSION['id']))
		{
		    $time_slot = $_REQUEST['time_slot'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_time_slot($time_slot);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_time_slot_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $time_slot = $_REQUEST['time_slot'];
			$time_slot_id = $_REQUEST['time_slot_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_time_slot_edit($time_slot,$time_slot_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_notify_by()
	{
		if(isset($_SESSION['id']))
		{
		    $notify_by = $_REQUEST['notify_by'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_notify_by($notify_by);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_notify_by_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $notify_by = $_REQUEST['notify_by'];
			$notify_by_id = $_REQUEST['notify_by_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_notify_by_edit($notify_by,$notify_by_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_term_condition()
	{
		if(isset($_SESSION['id']))
		{
		    $term_for = $_REQUEST['term_for'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_term_condition($term_for);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_term_condition_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $term_for = $_REQUEST['term_for'];
			$term_for_id = $_REQUEST['term_for_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_term_condition_edit($term_for,$term_for_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function insertFreq()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->insertFreq($data);
		}
		else
		{
			redirect('admin/Login');
		}	
	}
	public function FrequencyType()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_freq_type_data']=$this->Master_model->get_freq_type_data();
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Frequency Type';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/notify_by_view',$data);
			$this->load->view('Admin/new_freq_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_freq_type()
	{
		if(isset($_SESSION['id']))
		{
		    $freq_type = $_REQUEST['freq_type'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_freq_type($freq_type);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_freq_type_name()
	{
		if(isset($_SESSION['id']))
		{
		    $freq_type_name = $_REQUEST['freq_type_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_freq_type_name($freq_type_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_freq_type_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $freq_type = $_REQUEST['freq_type'];
			$freq_type_id = $_REQUEST['freq_type_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_freq_type_edit($freq_type,$freq_type_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function chk_freq_type_name_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $freq_type_name = $_REQUEST['freq_type_name'];
			$freq_type_id = $_REQUEST['freq_type_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_freq_type_name_edit($freq_type_name,$freq_type_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function edit_frequency_type()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$freq_id = $_REQUEST['freq_id'];
			$data['edit_frequency_type_data'] = $this->Master_model->edit_frequency_type($freq_id);

			$this->load->view('Admin/edit_frequency_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}
	public function updateFreqType()
	{
		// if(isset($_SESSION['id']))
		// {
		// 	$this->load->model('Admin/Master_model');
		// 	$notify_id = $this->input->post('notify_id');
		// 	$edit_notify_by = $this->input->post('edit_notify_by');
		// 	$this->Master_model->updateNotifyBy($notify_id,$edit_notify_by);
		// }
		// else
		// {
		// 	redirect('admin/Login');
		// }

		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$freq_id = $this->input->post('freq_id');
			$edit_freq_name = $this->input->post('edit_freq_name');
			$edit_freq_no = $this->input->post('edit_freq_no');
			$edit_freq_type = $this->input->post('edit_freq_type');
		
			$this->Master_model->updateFreqType($freq_id,$edit_freq_name,$edit_freq_no,$edit_freq_type);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function delete_freq_type()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['freq_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->delete_freq_type($id);
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
	public function freq_type_deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['freq_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->freq_type_deactivate($id);
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
	public function freq_type_activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['freq_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->freq_type_activate($id);
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

	public function insertFreqwiseReport()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->insertFreqwiseReport($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function FrequencywiseReport()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_freq_wise_report']=$this->Master_model->get_freq_wise_report();
			$data['freq_type']=$this->Master_model->get_freq_type_data();
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Frequency Wise Report';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/notify_by_view',$data);
			$this->load->view('Admin/new_freq_wise_report_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function edit_freq_wise_report()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$report_id = $_REQUEST['report_id'];
			$data['freq_type']=$this->Master_model->get_freq_type_data();
			$data['edit_frequency_wise_report_data'] = $this->Master_model->edit_frequency_wise_report($report_id);
			$this->load->view('Admin/edit_frequency_wise_report',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function updateFreqwisereportType()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$report_id = $this->input->post('report_id');
			$freq = $this->input->post('freq_edit_value');
			$report = $this->input->post('report_edit_value');
			$start_date = $this->input->post('start_date_report');
			$end_date = $this->input->post('end_date_report');
			$schedule_time = $this->input->post('schedule_time');

			$this->Master_model->updateFreqwisereportType($report_id,$freq,$report,$start_date,$end_date,$schedule_time);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function delete_freq_wise_report()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['report_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->delete_freq_wise_report($id);
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
	public function freq_wise_report_deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['report_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->freq_wise_report_deactivate($id);
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
	public function freq_wise_report_activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['report_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->freq_wise_report_activate($id);
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
	public function add_doc_type()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_doc_type_data($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function DocumentType()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_doc_type_report']=$this->Master_model->get_doc_type_report();
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Document Type';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/notify_by_view',$data);
			$this->load->view('Admin/new_doc_type_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function chk_document()
	{
		if(isset($_SESSION['id']))
		{
		    $doc_name = $_REQUEST['doc_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_document($doc_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function edit_doc_type()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$doc_id = $_REQUEST['doc_id'];
			$data['edit_doc_type_data'] = $this->Master_model->edit_doc_type_data($doc_id);

			$this->load->view('Admin/edit_doc_type_data',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function chk_doc_type_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $doc_name = $_REQUEST['doc_name'];
			$doc_name_id = $_REQUEST['doc_name_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_doc_type_edit($doc_name,$doc_name_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function updateDocType()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$doc_id = $this->input->post('doc_id123');
			$doc_name = $this->input->post('edit_doc_name');

			$this->Master_model->updateDocType($doc_id,$doc_name);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function delete_doc_type()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['doc_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->delete_doc_type($id);
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
	public function doc_type_deactivate()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['doc_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->doc_type_deactivate($id);
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
	public function doc_type_activate()
	{
		
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['doc_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->doc_type_activate($id);
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

	public function add_event_notify()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$data = $this->input->post();
			$this->Master_model->add_event_notify_data($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function EventNotify()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------

			$this->load->model('Admin/Master_model');
			$data['get_event_notify_report']=$this->Master_model->get_event_notify_report();
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Master/View_master';
			$data['page_name_1'] = 'Master';
			$data['page_name_2'] = 'Event Notify';
			$data['sidebar']=array('menu' =>"Master");

			// $this->load->view('Admin/notify_by_view',$data);
			$this->load->view('Admin/new_event_notify_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_event_notify()
	{
		if(isset($_SESSION['id']))
		{
		    $event_notify_name = $_REQUEST['event_notify_name'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_event_notify($event_notify_name);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function edit_event_notify()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			
			$this->load->model('Admin/Master_model');
			$event_notify_id = $_REQUEST['event_notify_id'];
			$data['edit_event_notify'] = $this->Master_model->edit_event_notify($event_notify_id);

			$this->load->view('Admin/edit_event_notify_data',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function chk_event_notify_edit()
	{
		if(isset($_SESSION['id']))
		{
		    $event_notify_name = $_REQUEST['event_notify_name'];
			$event_notify_id = $_REQUEST['event_notify_id'];
			$this->load->model('Admin/Master_model');
			$a = $this->Master_model->chk_event_notify_edit($event_notify_name,$event_notify_id);
			echo $a;
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function updateEventNotify()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Master_model');
			$event_notify = $this->input->post('event_notify123');
			$event_notify_name = $this->input->post('edit_event_notify_name');

			$this->Master_model->updateEventNotify($event_notify,$event_notify_name);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function delete_event_notify()
	{
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['event_notify_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->delete_event_notify($id);
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

	public function event_notify_deactivate()
	{
		
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['event_notify_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->event_notify_deactivate($id);
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

	public function event_notify_activate()
	{
		
		if(isset($_SESSION['id']))
		{
		    $id = $_REQUEST['event_notify_id'];
			$this->load->model('Admin/Master_model');
			$data=$this->Master_model->event_notify_activate($id);
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



// Project Milestone


