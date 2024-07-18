<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectManagement extends CI_Controller 
{
	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Customer_model');
			$this->load->model('Admin/Area_interest_model');
			$this->load->model('Admin/User_model');
			$this->load->model('Admin/ProjectManagement_model');
			
			$data['array_users']=$this->User_model->get_user();
			$data['product_list']=$this->Customer_model->product_list();
			$data['array_interest']=$this->Area_interest_model->get_interst();
			$data['primary_customer'] = $this->Customer_model->primary_customer();

			$data['project_manager'] = $this->ProjectManagement_model->get_project_manager();

			$this->load->view('Admin/ProjectManagementView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_new_project()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Projectmanagement_model');

			$target_period = $this->input->post('target_period');
			$start_date = $this->input->post('start_date');

			if ($target_period=='Daily') 
			{
				$end_date = $this->input->post('end_date');
			}
			else
			{
				$end_date = $this->input->post('end_date1');
			}
			$frequency = $this->input->post('frequency');
			if($frequency=='One Time'){
				$recurring_cnt =1;
			}
			else{
				$recurring_cnt = $this->input->post('recurring_cnt');	
			}
				
			$ProjectName = $this->input->post('ProjectName');		
			$ClientName = $this->input->post('ClientName');		
			$InterestesIn = $this->input->post('InterestesIn');		
			$StatusType = $this->input->post('StatusType');		
			$PriorityType = $this->input->post('PriorityType');
			$Rate = $this->input->post('Rate');
			$Per = $this->input->post('Per');
			$ProjectManager = $this->input->post('ProjectManager');
			$Team = $this->input->post('Team');
				
			$target_period = $this->input->post('target_period');	
			$ProjectDescription = $this->input->post('ProjectDescription');	
			
			$this->Projectmanagement_model->add_project($start_date,$end_date,$recurring_cnt,$ProjectName,$ClientName,$InterestesIn,$StatusType,
			$PriorityType,$Rate,$Per,$ProjectManager,$frequency,$target_period,$ProjectDescription,$Team);
		       				
		}
		else
		{
			redirect('admin/Login');
		}	
		
	}

	public function ViewDetails()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Projectmanagement_model');

			$ProjectId = $this->input->get('ProjectId');
			$data['task_list'] = $this->Projectmanagement_model->project_details($ProjectId);
			$data['main_list'] = $this->Projectmanagement_model->project_details_main($ProjectId);
			$this->load->view('Admin/ProjectDetailsView',$data);
		}
		else
		{
			redirect('admin/Login');
		}

	}

	public function edit_project()
	{
		if(isset($_SESSION['id']))
		{
			$ProjectId = $_REQUEST['project_id'];
			$this->load->model('Admin/Projectmanagement_model');
			$this->load->model('Admin/Customer_model');
			$this->load->model('Admin/Area_interest_model');
			$this->load->model('Admin/User_model');
			$this->load->model('Admin/ProjectManagement_model');
			
			$data['array_users']=$this->User_model->get_user();
			$data['product_list']=$this->Customer_model->product_list();
			$data['array_interest']=$this->Area_interest_model->get_interst();
			$data['primary_customer'] = $this->Customer_model->primary_customer();
			$data['project_manager'] = $this->ProjectManagement_model->get_project_manager();

			$data['task_list'] = $this->Projectmanagement_model->project_details($ProjectId);
			$data['main_list'] = $this->Projectmanagement_model->project_details_main($ProjectId);
			
			$data['selected_list'] = $this->Projectmanagement_model->team_list($ProjectId);
			//$data['team_list_name'] = $this->Projectmanagement_model->team_list_name($ProjectId);

			


		$this->load->view('Admin/EditProjectView',$data);
		}
		else
		{
			redirect('admin/Login');
		}

		
	}

	public function edit_deliverables()
	{
		
		$this->load->model('Admin/Projectmanagement_model');

		

			$project_task_id = $_REQUEST['project_task_id'];
			$data['project_task_id']=$this->Projectmanagement_model->getd($project_task_id);
			// var_dump($data['project_task_id']);
			// exit;
		$this->load->view('Admin/EditDeliverableView',$data);
	}

	public function Adddays()
	{
		$this->load->model('Admin/Projectmanagement_model');

		$project_task_id = $this->input->post('project_task_id');
		$adddays = $this->input->post('adddays');

		$this->Projectmanagement_model->adddays($project_task_id,$adddays);
		
		

	}

	public function Updateproject()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Projectmanagement_model');

			$target_period = $this->input->post('target_period');
			$recurring_cnt = $this->input->post('recurring_cnt');

			$start_date = $this->input->post('start_date');

			if ($target_period=='Daily') 
			{
				$end_date = $this->input->post('end_date');
			}
			else
			{
				$end_date = $this->input->post('end_date1');
			}
			$frequency = $this->input->post('frequency');
			if($frequency=='One Time'){
				$recurring_cnt =1;
			}
			else{
				$recurring_cnt = $this->input->post('recurring_cnt');	
			}
			
			$project_id = $this->input->post('project_id');
					
			$ProjectName = $this->input->post('ProjectName');		
			$ClientName = $this->input->post('ClientName');		
			$InterestesIn = $this->input->post('InterestesIn');		
			$StatusType = $this->input->post('StatusType');		
			$PriorityType = $this->input->post('PriorityType');
			$Rate = $this->input->post('Rate');
			$Per = $this->input->post('Per');
			$ProjectManager = $this->input->post('ProjectManager');
			$Team = $this->input->post('Team');	
			$target_period = $this->input->post('target_period');	
			$ProjectDescription = $this->input->post('ProjectDescription');	
			
			$this->Projectmanagement_model->update_project($start_date,$end_date,$recurring_cnt,$ProjectName,$ClientName,$InterestesIn,$StatusType,
			$PriorityType,$Rate,$Per,$ProjectManager,$frequency,$target_period,$ProjectDescription,$Team,$project_id);
		       				
		}
		else
		{
			redirect('admin/Login');
		}	
	}

	public function delete()
	{
		$this->load->model('Admin/Projectmanagement_model');
		$project_id = $this->input->post('project_id');
		$this->Projectmanagement_model->delete_project($project_id);
	}

	public function add_new_frequency()
	{
		$this->load->model('Admin/Projectmanagement_model');
		$project_id = $this->input->post('pid');

		$target_period = $this->input->post('target_period');
		$start_date = $this->input->post('start_date');

		if ($target_period=='Daily') 
		{
			$end_date = $this->input->post('end_date');
		}
		else
		{
			$end_date = $this->input->post('end_date1');
		}
		$frequency = $this->input->post('frequency');
		if($frequency=='One Time'){
			$recurring_cnt =1;
		}
		else{
			$recurring_cnt = $this->input->post('recurring_cnt');	
		}

		$this->Projectmanagement_model->new_frequency($project_id,$target_period,$end_date,$frequency,$recurring_cnt,$start_date);




	}

	public function add_new_task_display()
	{
		$ProjectId = $_REQUEST['project_id'];
		$this->load->model('Admin/Projectmanagement_model');
		$data['task_list'] = $this->Projectmanagement_model->project_details($ProjectId);
		$this->load->view('admin/AddDeliverableTaskView',$data);
	}

	public function AddNewTask()
	{
		$this->load->model('Admin/Projectmanagement_model');

		$parent_task_id =$this->input->post('parent_task_id');
		$task_name= $this->input->post('task_name');

		$this->Projectmanagement_model->addnewtask($parent_task_id,$task_name);

	}

	public function add_new_activity()
	{		
		$this->load->model('Admin/Customer_model');
		$this->load->model('Admin/Projectmanagement_model');
		// $pidtaskid = $_REQUEST['data'];

		// $string = $pidtaskid ;
		// $str_arr = explode (",", $string); 

		$ProjectId = $_GET['id'];
		$data['task_id'] = $_GET['task_id'];

		// echo $ProjectId;
		// echo $data['task_id'];
		// exit;
		
		$data['project_name'] = $this->Projectmanagement_model->get_project_name($ProjectId);
		$data['employee_list'] = $this->Customer_model->employee_list();		
		$data['customer_list']=$this->Customer_model->customer_list();
		$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
		$data['main_list'] = $this->Projectmanagement_model->project_details_main($ProjectId);
		$data['client_id'] = $this->Projectmanagement_model->get_client_id($ProjectId);
		
		// var_dump($data['client_id']);
		// exit;

		$this->load->view("admin/AddActivityInTaskView",$data);
	}

	public function Insertact()
	{
		$this->load->model('Admin/Projectmanagement_model');

		$new_task_id = $this->input->post('task_id');
		$new_task_name = $this->input->post('task_name');
		$project_name = $this->input->post('projectName');
		$company_name = $this->input->post('company_name');
		$employee_id = $this->input->post('employee_id');
		$schedule_date = $this->input->post('schedule_date');
		$schedule_start_time = $this->input->post('schedule_start_time');
		$schedule_end_time = $this->input->post('schedule_end_time');
		$schedule_type = $this->input->post('schedule_type');
		$query = $this->input->post('query');

		$this->Projectmanagement_model->Insertnew_Actvity($new_task_id,$new_task_name,
		$company_name,$project_name,$employee_id,$schedule_date,$schedule_start_time,$schedule_end_time,$schedule_type,$query);

	}

	public function reInsertact()
	{
		$this->load->model('Admin/Projectmanagement_model');

		$new_task_id = $this->input->post('task_id');
		$new_task_name = $this->input->post('task_name');
		$project_name = $this->input->post('projectName');
		$company_name = $this->input->post('company_name');
		$employee_id = $this->input->post('employee_id');
		$schedule_date = $this->input->post('schedule_date');
		$schedule_start_time = $this->input->post('schedule_start_time');
		$schedule_end_time = $this->input->post('schedule_end_time');
		$schedule_type = $this->input->post('schedule_type');
		$query = $this->input->post('query');

		$this->Projectmanagement_model->add_schedule_overright_ac($new_task_id,$new_task_name,
		$company_name,$project_name,$employee_id,$schedule_date,$schedule_start_time,$schedule_end_time,$schedule_type,$query);

	}

	public function view_activities()
	{
		if(isset($_SESSION['id']))
		{
				$project_id =  $_GET['ProjectId'];
				$task_id    =  $_GET['task_id'];
				
				

				// Geofence Notification ---------------------------
		        $this->load->model('Admin/Dashboard_model');
		        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		        //------------------------------------------------	
            	$data['sidebar']=array('menu' =>"issue");
				$this->load->model('Admin/Customer_model');
				
				$data['customer_list']=$this->Customer_model->customer_list();
				$data['product_list']=$this->Customer_model->product_list();
				$data['employee_list'] = $this->Customer_model->employee_list();
				$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
				
				$data['incomplete_issue_list']=$this->Customer_model->incomplete_issue();

				$data['issue_list_array'] = $this->Customer_model->view_activities_model($project_id,$task_id);

				$data['reschedule_issue_list']=$this->Customer_model->get_reschedule_issue_list();
				$data['complete_issue_list']=$this->Customer_model->get_complete_issue_list();
				
				$data['activity_issue_count']=$this->Customer_model->get_activity_issue_count();
				$data['rechedule_issue_count']=$this->Customer_model->get_rechedule_issue_count();
				$data['complete_issue_count']=$this->Customer_model->get_complete_issue_count();
				
				$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>3);
				$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
				$this->load->view('admin/View_activities', $data);
		}
		else
		{
		   redirect('admin/Login');
		}
		
	}

}