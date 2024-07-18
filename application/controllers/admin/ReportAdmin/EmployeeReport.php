<?php 

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeReport extends CI_Controller
{

	  function __construct()
	  {
	     parent::__construct();
	     $this->load->model('Admin/ReportAdmin/Reports_Employee_model');
	     $this->load->model('Admin/ReportAdmin/Reports_model');
	  }
	 
	  public function AvailableTimeSlots()
	  {
			if(isset($_SESSION['id']))
			{				
			    $data['EmpArray']=$this->Reports_model->GetEmpArray();  
			    $data['AvailableTimeSlots']=$this->Reports_Employee_model->AvailableTimeSlots();
			    $data['sidebar']=array('menu' =>"AvailableTimeSlots"); 
			    // print_r($data['AvailableTimeSlots']);			    
			    $data['user_permission']= $this->GetUserPermissionByEmployee();

				$data['type'] = 'd_link';
				$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
				$data['page_name_1'] = 'Reports';
				$data['page_name_2'] = 'Time Slots';
				$data['sidebar']=array('menu' =>"Reports");

				$this->load->view('Admin/ReportAdmin/NewAvailableTimeSlotsView',$data);
			    // $this->load->view('Admin/ReportAdmin/AvailableTimeSlotsView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }

	  public function DateRangeAvailableTimeSlots()
	  {
			if(isset($_SESSION['id']))
			{
				$formdata=$this->input->post();
			    $data['AvailableTimeSlots']=$this->Reports_Employee_model->DateRangeAvailableTimeSlots($formdata);
			    $this->load->view('Admin/ReportAdmin/FilterAvailableTimeSlotsView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }

	  public function EmployeeTarget()
	  {
			if(isset($_SESSION['id']))
			{	
				$this->load->model('Admin/Dashboard_model');

				$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
				$getdate = $data['account_period_array'];
				$startdate = $getdate['start_date'];
				$enddate = $getdate['end_date'];
				$data['start_date'] = $startdate;
				$data['end_date'] = $enddate;

			    $data['EmpArray']=$this->Reports_model->GetEmpArray();
			    $data['ActivityArray']=$this->Reports_model->GetTargetTypeArray();
			    $data['EmployeeTarget']=$this->Reports_Employee_model->EmployeeTarget($startdate,$enddate);
			    $data['sidebar']=array('menu' =>"EmployeeTarget"); 
			    // var_dump($data['EmployeeTarget']);exit;		
			    $data['user_permission']= $this->GetUserPermissionByEmployee();	 
				$data['type'] = 'd_link';
				$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
				$data['page_name_1'] = 'Reports';
				$data['page_name_2'] = 'Resource Target';
				$data['sidebar']=array('menu' =>"Reports");
				$this->load->view('Admin/ReportAdmin/NewEmployeeTargetView',$data);
			    // $this->load->view('Admin/ReportAdmin/EmployeeTargetView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }

	  public function DaterangerEmployeeTarget()
	  {
			if(isset($_SESSION['id']))
			{
				$formdata=$this->input->post();
			    $data['EmployeeTarget']=$this->Reports_Employee_model->DaterangerEmployeeTarget($formdata);
			    $this->load->view('Admin/ReportAdmin/FilterEmployeeTargetView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }

//-----------------------------------------------------------------------------

	 
	  public function EmployeewiseActivities()
	  {
			if(isset($_SESSION['id']))
			{				
				$this->load->model('Admin/Dashboard_model');

				$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
				$getdate = $data['account_period_array'];
				$startdate = $getdate['start_date'];
				$enddate = $getdate['end_date'];
				$data['start_date'] = $startdate;
				$data['end_date'] = $enddate;	
	
			    $data['EmpArray']=$this->Reports_model->GetEmpArray();
			    $data['ActivityArray']=$this->Reports_model->GetActivityArray();
			    $data['EmployeewiseActivities']=$this->Reports_Employee_model->EmployeewiseActivities($startdate,$enddate);
			    $data['sidebar']=array('menu' =>"EmployeewiseActivities"); 
			    $data['user_permission']= $this->GetUserPermissionByEmployee();
				$data['type'] = 'd_link';
				$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
				$data['page_name_1'] = 'Reports';
				$data['page_name_2'] = 'Resource Tasks';
				$data['sidebar']=array('menu' =>"Reports");
				$this->load->view('Admin/ReportAdmin/NewEmployeewiseActivitiesView',$data);
			    // $this->load->view('Admin/ReportAdmin/EmployeewiseActivitiesView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }

	  public function ViewActivitiesDetails()
	  {
		$formdata=$this->input->post();
	    $data['formdata'] = $formdata;
		$data['EmpActivityData'] = $this->Reports_Employee_model->ViewActivitiesDetailsByEmp($formdata);
		$this->load->view('Admin/ReportAdmin/NewEmployeewiseActivitiesSerchView',$data);
	  }
	  
	  public function DaterangeEmployeewiseActivities()
	  {
			if(isset($_SESSION['id']))
			{
				$formdata=$this->input->post();
				$data['ActivityArray']=$this->Reports_model->GetActivityArray();
			    $data['EmployeewiseActivities']=$this->Reports_Employee_model->DaterangeEmployeewiseActivities($formdata);

			    // print_r($data['EmployeewiseActivities']);
			    $this->load->view('Admin/ReportAdmin/FilterEmployeewiseActivitiesView',$data);
			}
			else
			{
			   redirect('admin/Login');
			}
	  }


//--------------------------------------------------------------------------------------------
 
  public function EmployeewiseActivitiesMapping()
  {
		if(isset($_SESSION['id']))
		{	
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	

		    $data['EmpArray']=$this->Reports_model->GetEmpArray();
		    $data['ActivityArray']=$this->Reports_model->GetActivityArray();
		    $data['EmployeewiseActivitiesMapping']=$this->Reports_Employee_model->EmployeewiseActivitiesMapping($startdate,$enddate);
		    $data['sidebar']=array('menu' =>"EmployeewiseActivitiesMapping"); 
		    $data['user_permission']= $this->GetUserPermissionByEmployee();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Task Mapping';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewEmployeewiseActivitiesMappingView',$data);
		    // $this->load->view('Admin/ReportAdmin/EmployeewiseActivitiesMappingView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
  }

  
  public function DateRangeEmployeewiseActivitiesMapping()
  {
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$data['ActivityArray']=$this->Reports_model->GetActivityArray();
		    $data['EmployeewiseActivitiesMapping']=$this->Reports_Employee_model->DateRangeEmployeewiseActivitiesMapping($formdata);
		    // print_r($data['EmployeewiseActivities']);
		    $this->load->view('Admin/ReportAdmin/FilterActivitiesMappingView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
  }

//----------------------------------------------------------------------------------

  public function EmployeeRevenue()
  {
		if(isset($_SESSION['id']))
		{			
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	

		    $data['EmpArray']=$this->Reports_model->GetEmpArray();
		    $data['EmployeeRevenue']=$this->Reports_Employee_model->EmployeeRevenue($startdate,$enddate);
		    $data['sidebar']=array('menu' =>"EmployeeRevenue"); 
		    $data['user_permission']= $this->GetUserPermissionByEmployee();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Resource Earnings';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewEmployeeRevenueView',$data);
		    // $this->load->view('Admin/ReportAdmin/EmployeeRevenueView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
  }
  
  public function DateRangeEmployeeRevenue()
  {
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
		    $data['EmployeeRevenue']=$this->Reports_Employee_model->DateRangeEmployeeRevenue($formdata);
		    // print_r($data['EmployeewiseActivities']);
		    $this->load->view('Admin/ReportAdmin/FilterEmployeeRevenueView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
  }


  public function GetUserPermissionByEmployee()
  {
	// User Permission Functionality ------------ 
	$this->load->model('Admin/Dashboard_model');
	$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>29);
	return $this->Dashboard_model->get_user_permission($permission_array);
  }




//-----------------------------------------------------------------------------------------------


}