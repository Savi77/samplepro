<?php
error_reporting(0);

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($this->session->id)) {
            redirect('admin/Dashboard/view_dashboard');
        } else {
            $this->load->model('Admin/Adminauthentication');
            $data['loginDetails'] = $this->Adminauthentication->LoginDetailsData();
            $this->load->view('NewSignInView', $data);
        }
    }

    public function AddNotes()
    {
        $this->load->model('Admin/Dashboard_model');
        $this->Dashboard_model->AddNotes();
    }

    public function EditNotes()
    {
        $this->load->model('Admin/Dashboard_model');
        $data['notes1'] = $this->Dashboard_model->editnotes();
        $this->load->view('Admin/includes/edit_note_view', $data);
    }

    public function inserteditnote()
    {
        $this->load->model('Admin/Dashboard_model');
        $formdata = $this->input->post();
        $this->Dashboard_model->inserteditnotes($formdata);
    }


    public function del_notes()
    {
        $this->load->model('Admin/Dashboard_model');
        $this->Dashboard_model->del_notes();
    }


    public function viewcalendar()
    {
        if (isset($this->session->id)) {
            $this->load->model('Admin/Dashboard_model');
            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();

            $data['schedule_data'] = $this->Dashboard_model->get_schedule_data();


            $data['sidebar'] = array('menu' => "calendar");
            // $this->load->view('Admin/viewcalendar',$data);
            $this->load->view('Admin/newviewcalendar', $data);
        } else {
            redirect('admin/Dashboard');
        }
    }

    // changed by arbaz 21 june 2021
    public function view_dashboard()
    {
        if (isset($this->session->id)) {
            $this->load->model('Admin/Dashboard_model');
            $this->load->model('Admin/ReportAdmin/Reports_model');
            $this->load->model('Admin/ReportAdmin/Reports_New_model');
            $this->load->model('Admin/ReportAdmin/Reports_Employee_model');


            // $data['Lead_Opportunity_by_Segments'] = $this->Reports_model->Lead_Opportunity_by_Segments();
            $data['preference'] = $this->Dashboard_model->get_preference();
            $data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
            

            $data['EmpArray'] = $this->Reports_model->GetEmpArray();
            $data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
            $data['LeadOppBySalesPersonSegment'] = $this->Reports_model->LeadOppBySalesPersonSegmentDashboard($startdate, $enddate);

            $data['StageArray'] = $this->Reports_model->GetStageArray();
            $data['MonthArray'] = $this->Reports_model->GetMonthArray($startdate,$enddate);
            $data['LeadOppByUserwiseMonthlyCounts'] = $this->Reports_model->LeadOppByUserwiseMonthlyCountsDashboard($startdate, $enddate);

            $data['ContactsActivities'] = $this->Reports_New_model->ContactsWithNoActivities($startdate,$enddate);

            $data['AvailableTimeSlots'] = $this->Reports_Employee_model->AvailableTimeSlotsDashboard($startdate, $enddate);

            $data['SegmentWiseContact'] = $this->Reports_model->SegmentWiseContact();
            $data['EmployeeRevenue'] = $this->Reports_Employee_model->EmployeeRevenueDashboard($startdate, $enddate);
            $data['Lead_Opportunity_by_Product'] = $this->Reports_model->Lead_Opportunity_by_ProductDashboard($startdate, $enddate);
          
            $data['LeadOppByMonthlyCounts'] = $this->Reports_model->LeadOppByMonthlyCounts($startdate, $enddate);
            $data['EmployeewiseActivitiesMapping'] = $this->Reports_Employee_model->EmployeewiseActivitiesMappingDashboard($startdate, $enddate);
            $data['EmployeewiseActivities'] = $this->Reports_Employee_model->EmployeewiseActivitiesDashboard($startdate, $enddate);
        
            $data['ActivityArray'] = $this->Reports_model->GetActivityArray();

            $data['TypewiseContact'] = $this->Reports_New_model->TypewiseContact();
            $data['LeadOppBySalesPerson'] = $this->Reports_model->LeadOppBySalesPerson($startdate, $enddate);
            $data['AccountRevenue'] = $this->Reports_model->AccountRevenue($startdate,$enddate);
            $data['LeadOppBySalesPersonProducrwise'] = $this->Reports_model->LeadOppBySalesPersonProduct($startdate,$enddate);


            $emp_id = $this->session->id;
            $createddate = date("Y-m-d");

            $data['Lead_Opportunity_by_Segments'] = $this->Reports_model->Lead_Opportunity_by_Segments_Dashboard($startdate, $enddate);
            $data['Lead_by_Segments'] = $this->Reports_model->Lead_by_Segments($startdate, $enddate);
            $data['Opportunity_by_Segments'] = $this->Reports_model->Opportunity_by_Segments($startdate, $enddate);
            $data['Lead_Opportunity_by_Product'] = $this->Reports_model->LeadOpp_By_Product($startdate, $enddate);

           
            $data['preference'] = $this->Dashboard_model->get_preference();
            $data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];

            $data['ScheduleSummary'] = $this->Dashboard_model->ScheduleSummary($startdate, $enddate);

            $data['OrderSummary'] = $this->Dashboard_model->OrderSummary();
            $data['TargetSummary'] = $this->Dashboard_model->TargetSummary();
            $data['summaryarray'] = $this->Dashboard_model->summary();

            $data['LeadsOveallSummary'] = $this->Dashboard_model->LeadsOveallSummary();

            $data['LeadsBySourceSummary'] = $this->Dashboard_model->LeadsBySourceSummary($startdate, $enddate);
            $data['LeadcountountBySourceSummary'] = $this->Dashboard_model->LeadcountountBySourceSummary($startdate, $enddate);
            $data['OppCountBySourceSummary'] = $this->Dashboard_model->OppCountBySourceSummary($startdate, $enddate);

            $data['LeadsByOwnerSummary'] = $this->Dashboard_model->LeadsByOwnerSummary();
            $data['LeadscountByOwnerSummary'] = $this->Dashboard_model->LeadscountByOwnerSummary();
            $data['OpportunitycountByOwnerSummary'] = $this->Dashboard_model->OpportunitycountByOwnerSummary();

            $data['LeadsByStagesSummary'] = $this->Dashboard_model->LeadsByStagesSummary($startdate, $enddate);
            $data['LeadscountByStagesSummary'] = $this->Dashboard_model->LeadscountByStagesSummary($startdate, $enddate);
            $data['OpportunitycountByStagesSummary'] = $this->Dashboard_model->OpportunitycountByStagesSummary($startdate, $enddate);

            $data['GetNotes'] = $this->Dashboard_model->GetNotes();
            $data['TodaysActivityCount'] = $this->Dashboard_model->TodaysActivityCount();

            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();

            $data['primary_count'] = $this->Dashboard_model->count_primarycustomer();
            $data['secondary_count'] = $this->Dashboard_model->count_secondarycustomer();
            $data['total_count_contact'] = $this->Dashboard_model->count_all();

            

            // $data['TodaysActivity'] = $this->Dashboard_model->TodaysActivity($emp_id, $createddate);  

            $data['type'] = 's_link';
            $data['page_name'] = 'Dashboard';
            $data['sidebar'] = array('menu' => "dashboard");
            // $this->load->view('Admin/dashboard',$data);
            $this->load->view('Admin/new_dashboard', $data);
        } else {
            redirect('admin/Dashboard');
        }
    }

    public function CompanySetting()
    {
        if (isset($this->session->id)) {
            $emp_id = $this->session->id;
            if (isset($_GET['section'])) {
                if ($_GET['section'] == 'print_section') {
                    $data['print_name'] = 'print_section';
                } else if ($_GET['section'] == 'timeline_setting') {
                    $data['print_name'] = 'timeline_setting';
                } elseif ($_GET['section'] == 'basic_setting') {
                    $data['print_name'] = 'basic_setting';
                } else {
                    $data['print_name'] = '';
                }
            } else {
                $data['print_name'] = '';
            }

            $this->load->model('Admin/Dashboard_model');
            $data['profile_array'] = $this->Dashboard_model->get_profile_array();
            $data['organsation_array'] = $this->Dashboard_model->get_organsation_array();
            $data['user_array'] = $this->Dashboard_model->get_user_array();
            $data['gst_array'] = $this->Dashboard_model->get_gst_details_array();
            $data['financial_detail'] = $this->Dashboard_model->get_financial_detail_array();
            $data['account_period_array'] = $this->Dashboard_model->get_account_period_array();
            $data['organsation_email_array'] = $this->Dashboard_model->get_organsation_email_array();
            $data['allreports'] = $this->Dashboard_model->showallreports($emp_id);

            $data['get_section_array'] = $this->Dashboard_model->get_section_array();

            // print_r($data['organsation_email_array']);
            $this->load->model('Home_model');
            $data['StateArray'] = $this->Home_model->state_list($data['organsation_array']->org_country);
            $data['CountryArray'] = $this->Home_model->country_list();
            $data['TimeZoneArray'] = $this->Home_model->TimeZone_list();
            $data['CurrencyArray'] = $this->Home_model->Currency_list();
            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
            $data['type'] = 's_link';
            $data['sidebar'] = array('menu' => "ViewProfile");
            $data['page_name'] = 'Company Setting';

            // $this->load->view('Admin/ViewProfile',$data);
            $this->load->view('Admin/NewViewProfile', $data);
        } else {
            redirect('admin/Dashboard');
        }
    }

    public function Report_settings_add()
    {
        $emp_id = $this->session->id;
        $this->load->model('Admin/Dashboard_model');
        $report_id = $_REQUEST['report_name'];
        $this->Dashboard_model->addreport($report_id, $emp_id);
        $this->Dashboard_model->savereport_preference($report_id, $emp_id);
    }

    public function Report_settings_delete()
    {
        $emp_id = $this->session->id;
        $this->load->model('Admin/Dashboard_model');
        $report_id = $_REQUEST['report_name'];
        $this->Dashboard_model->deletereport($report_id, $emp_id);
        $this->Dashboard_model->deletereport_preference($report_id, $emp_id);
    }

    public function crop_file()
    {
        if (isset($_POST["image"])) {
            $this->load->model('Admin/Dashboard_model');
            $data = $_POST["image"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $cur_date = date("YmdHis");
            $user_id = $this->session->id;

            $store_file1 = $user_id . '_' . $cur_date;
            $store_file = $store_file1 . '.png';
            $path = 'assets/admin/assets/images/users/';
            $move_file1 = $path . basename($store_file);

            $name = base_url() . $path . $store_file;
            $data1 = $this->Dashboard_model->update_change_image($store_file, $user_id);

            if ($data1) {
                file_put_contents($move_file1, base64_decode($image_array_2[1]));
                echo '<img src="' . $name . '" class="img-thumbnail picture-src"  style="height: 220px;margin-top: -62%;width: 220px !important;max-width: 105%;"/>';
            } else {
                echo "0";
            }
        }
    }
    public function ViewMyProfile()
    {
        if (isset($this->session->id)) {
            $this->load->model('Admin/Dashboard_model');
            $org_id = $this->session->userdata('org_id');
            $data['profile_array'] = $this->Dashboard_model->get_profile_array();
            $data['emailbody_array'] = $this->Dashboard_model->get_emailbody_array();
            $data['SubscriptionData'] = $this->Dashboard_model->SubscriptionData($org_id);
            $data['organsation_email_array'] = $this->Dashboard_model->get_organsation_email_array();
            $data['sidebar'] = array('menu' => "ViewmyProfile");
            $data['GeofenceNotification'] =  $this->Dashboard_model->GeofenceNotification();
            $data['type'] = 's_link';
            $data['page_name'] = 'View Profile';
            $data['sidebar'] = array('menu' => "Reports");
            $this->load->view('Admin/NewViewMyProfile', $data);
            // $this->load->view('Admin/ViewMyProfile',$data);
        } else {
            redirect('SignIn');
        }
    }

    public function eventdata()
    {
        $schedule_id = $this->input->post('schedule_id');
        $this->load->model('Admin/Dashboard_model');
        $data['profile_array'] = $this->Dashboard_model->eventdata($schedule_id);
        // echo json_encode($data['profile_array']);
        // print_r($data);
        $this->load->view('Admin/viewactivitydetails', $data);
    }

    public function deactivate()
    {

        if (isset($this->session->id)) {
            $id = $_REQUEST['p_id'];
            $this->load->model('Admin/Dashboard_model');
            $data = $this->Dashboard_model->deactivate($id);
            echo 1;
        } else {
            redirect('admin/Login');
        }
    }

    public function activate()
    {
        if (isset($this->session->id)) {
            $id = $_REQUEST['p_id'];
            $this->load->model('Admin/Dashboard_model');
            $data = $this->Dashboard_model->activate($id);
            echo 1;
        } else {
            redirect('admin/Login');
        }
    }

    public function changestatus()
    {

        if (isset($this->session->id)) {
            $id = $_REQUEST['p_id'];
            $this->load->model('Admin/Dashboard_model');
            $data = $this->Dashboard_model->changestatus($id);
            echo 1;
        } else {
            redirect('admin/Login');
        }
    }

    public function edit_mastergroup()
    {
        if (isset($_SESSION['id'])) {
            $this->load->model('Admin/Dashboard_model');
            $id = $_REQUEST['id'];
            $data['editAccountingPeriod'] = $this->Dashboard_model->edit_mastergroup($id);
            $this->load->view('Admin/edit_accounting_period', $data);
        } else {
            redirect('admin/Login');
        }
    }
    public function EditAccountingPeriod()
    {
        $this->load->model('Admin/Dashboard_model');
        $formdata = $this->input->post();
        $this->Dashboard_model->updateAccountPeriod($formdata);
        echo 1;
    }
    //arbaz 23 06 2021
    public function Savepreferenceleft()
    {
        $this->load->model('Admin/Dashboard_model');

        $myArrayleft = $this->input->post('newArrayleft');
        $myArrayleft1 = json_decode($myArrayleft);
        $data = implode($myArrayleft1);
        $this->Dashboard_model->insertpreferenceleft($data);
    }

    public function Savepreferenceright()
    {
        $this->load->model('Admin/Dashboard_model');

        $myArrayright = $this->input->post('newArrayright');
        $myArrayright2 = json_decode($myArrayright);
        $data = implode($myArrayright2);
        $this->Dashboard_model->insertpreferenceright($data);
    }

    public function UserManagement()
    {
        $this->load->model('Admin/User_model');
        $this->load->model('Admin/UserPermission_model');
        $this->load->model('Admin/Tracking_model');
        $this->load->model('Admin/Customer_model');
        $this->load->model('Admin/Master_model');
        $data['employee_list'] = $this->Tracking_model->get_shift_employee_list();
        $data['shift_list'] = $this->Tracking_model->get_shift_list();
        $data['array_users'] = $this->User_model->get_user_data();
        $data['role_list'] = $this->UserPermission_model->get_role_list();
        $data['feature_list'] = $this->UserPermission_model->get_list_feature();
        $data['department'] = $this->User_model->get_department();
        $data['array_users_add']=$this->User_model->get_user();
        $data['plan_subscription']=$this->User_model->get_plan_subscription();
        $data['report_list'] = $this->UserPermission_model->get_list_report();
        $data['country_list']=$this->Customer_model->country_list();
		$data['doc_type']=$this->Master_model->get_doc_type_report();
        
        $data['type'] = 's_link';
        $data['page_name'] = 'User Management';
        $data['sidebar'] = array('menu' => "UserManagement");

        // $this->load->view('Admin/UserManagement',$data);
        $this->load->view('Admin/NewUserManagement', $data);
    }

    public function getDesignation()
    {
        $this->load->model('Admin/Dashboard_model');
        echo $this->Dashboard_model->getDesignation($this->input->post('country_id'));
    }

    public function profile_setting()
    {
        if (isset($this->session->id)) 
        {
            $data['type'] = 's_link';
            $data['page_name'] = 'Profile Setting';
            $data['sidebar'] = array('menu' => "Profile Setting");
            $this->load->model('Admin/Dashboard_model');
            $data['organsation_array'] = $this->Dashboard_model->get_organsation_array();
            $data['profile_array'] = $this->Dashboard_model->get_profile_array();
            $data['gst_array'] = $this->Dashboard_model->get_gst_details_array();
            $data['role_array'] = $this->Dashboard_model->get_role_details_array();

            $data['get_company_details'] = $this->Dashboard_model->get_company_details();



            $this->load->model('Home_model');
            $data['StateArray'] = $this->Home_model->state_list($data['organsation_array']->org_country);
            $data['CountryArray'] = $this->Home_model->country_list();
            $data['TimeZoneArray'] = $this->Home_model->TimeZone_list();
            $data['CurrencyArray'] = $this->Home_model->Currency_list();
            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
            $this->load->view('Admin/Profile_setting', $data);
        }
        else 
        {
            redirect('admin/Dashboard');
        }
        
    }
    public function configuration_setting()
    {
        if (isset($this->session->id)) 
        {
            $emp_id = $this->session->id;
            if (isset($_GET['section'])) 
            {
                if ($_GET['section'] == 'print_section') {
                    $data['print_name'] = 'print_section';
                } else if ($_GET['section'] == 'timeline_setting') {
                    $data['print_name'] = 'timeline_setting';
                } elseif ($_GET['section'] == 'basic_setting') {
                    $data['print_name'] = 'basic_setting';
                } else {
                    $data['print_name'] = '';
                }
            } 
            else 
            {
                $data['print_name'] = '';
            }

            $this->load->model('Admin/Dashboard_model');
            $data['profile_array'] = $this->Dashboard_model->get_profile_array();
            $data['organsation_array'] = $this->Dashboard_model->get_organsation_array();
            $data['user_array'] = $this->Dashboard_model->get_user_array();
            $data['gst_array'] = $this->Dashboard_model->get_gst_details_array();
            $data['financial_detail'] = $this->Dashboard_model->get_financial_detail_array();
            $data['account_period_array'] = $this->Dashboard_model->get_account_period_array();
            $data['organsation_email_array'] = $this->Dashboard_model->get_organsation_email_array();
            $data['allreports'] = $this->Dashboard_model->showallreports($emp_id);

            $data['get_section_array'] = $this->Dashboard_model->get_section_array();

            // print_r($data['organsation_email_array']);
            $this->load->model('Home_model');
            $data['StateArray'] = $this->Home_model->state_list($data['organsation_array']->org_country);
            $data['CountryArray'] = $this->Home_model->country_list();
            $data['TimeZoneArray'] = $this->Home_model->TimeZone_list();
            $data['CurrencyArray'] = $this->Home_model->Currency_list();
            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();

            $this->load->model('Admin/Reminder_model');
            $data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();

            $data['type'] = 's_link';
            $data['page_name'] = 'Configuration Setting';
            $data['sidebar'] = array('menu' => "Configuration Setting");
            $this->load->view('Admin/Configuration_setting', $data);
        } 
        else 
        {
            redirect('admin/Dashboard');
        }
    }

    public function addCompany_rolewise_details()
	{
       
		$this->load->model('Admin/Dashboard_model');
		$data = array(
			'org_id' => $this->session->org_id,
            'role_id' => $this->input->post('role'),
			'title' => $this->input->post('title_name'),
			'content' => $this->input->post('section_content'),
			'status' => 0,
		);
		$this->Dashboard_model->addCompany_rolewise_details($data);
	}

    public function getDataCompany()
    {
        if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Dashboard_model');
			$id = $this->input->post('id');
			$data['getData'] =$this->Dashboard_model->getDataCompany($id);
            $data['role_array'] = $this->Dashboard_model->get_role_details_array();
			$this->load->view('Admin/EditCompanyRolewiseView',$data);
		} else {
			redirect('admin/Login');
		}
    }
    public function Update_company_details()
	{
		$this->load->model('Admin/Dashboard_model');
		$data = array(
            'title' => $this->input->post('title_name'),
			'content' => $this->input->post('section_content'),
			'role_id' => $this->input->post('role'),
		);
		$this->Dashboard_model->Update_company_details($data,$this->input->post('title_id'));
	}

    public function Delete_company_details()
    {
        if (isset($_SESSION['id'])) 
        {
			$this->load->model('Admin/Dashboard_model');
			$id = $this->input->post('id');
            $this->Dashboard_model->Delete_company_details($id);
		} 
        else
        {
			redirect('admin/Login');
		}
    }

    public function emp_profile_setting()
    {
        if (isset($this->session->id)) 
        {
            $data['type'] = 's_link';
            $data['page_name'] = 'Company Setting';
            $data['sidebar'] = array('menu' => "Company Setting");
            $this->load->model('Admin/Dashboard_model');
            $data['organsation_array'] = $this->Dashboard_model->get_organsation_array();
            $data['profile_array'] = $this->Dashboard_model->get_emp_profile_array();
            $data['gst_array'] = $this->Dashboard_model->get_gst_details_array();
            $data['role_array'] = $this->Dashboard_model->get_role_details_array();

            $data['get_company_details'] = $this->Dashboard_model->get_company_details_rolewise();



            $this->load->model('Home_model');
            $data['StateArray'] = $this->Home_model->state_list($data['organsation_array']->org_country);
            $data['CountryArray'] = $this->Home_model->country_list();
            $data['TimeZoneArray'] = $this->Home_model->TimeZone_list();
            $data['CurrencyArray'] = $this->Home_model->Currency_list();
            $data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
            $this->load->view('Admin/Emp_Profile_setting', $data);
        }
        else 
        {
            redirect('admin/Dashboard');
        }
        
    }
    public function TodayEvent()
    {
        if (isset($this->session->id)) 
        {
            $data['type'] = 's_link';
            $data['page_name'] = "Today's Events";
            $data['sidebar'] = array('menu' => "Today's Events");
            $this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Reminder_model');

			$data['birthday_list'] = $this->Dashboard_model->birthday_list();
			$data['marriage_anniversary_list'] = $this->Dashboard_model->marriage_anniversary_list();
			$data['company_anniversary_list'] = $this->Dashboard_model->company_anniversary_list();
			
			$data['sidebar']=array('menu' =>""); 

			$this->load->view('Admin/new_today_event',$data);
        }
        else 
        {
            redirect('admin/Dashboard');
        }
    }

    public function Single_bday($id)
    {
        // echo "<pre>";
        $get_details = $this->db->select('*')->from('tbl_admin_login')->where('id',$id)->get()->row();

        $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
        $emp_details = $this->db->select('*')->from('tbl_admin_login')->where('id',$this->session->org_id)->get()->row();
        $send_email = $get_details->email;
        $send_company = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row()->org_cname;
        $des = $emp_details->designation;
        $position = $this->db->select('designation_name')->from('tbl_designation')->where('deg_id',$emp_details->designation)->get()->row()->designation_name;

        $html = 
        '<html>
            <section>
                <center style="width: 100%;">
                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                        <tbody>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 30px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <div class="text-center" >
                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Birthday!</h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                    <img class="center" src="https://buroforce.progfeel.co.in/app-assets/image/bday.jpeg" alt="img" style="max-width: 270px;width: 100%;height:auto;margin-left:125px;">                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 0px 50px 0px 50px;">
                                                        <p>Dear '.$get_details->name.',</p>
                                                        <p>I hope this email finds you in great spirits. Today is a special day, and it gives me immense pleasure to reach out to you with warm wishes on your birthday!</p>
                                                        <p>May your day be filled with laughter, joy, and all the things that make you smile. Your dedication and hard work are truly appreciated, and we are lucky to have you as part of our team.</p>
                                                        <p>Here is to celebrating you and the wonderful person you are. Enjoy every moment of your day!</p>
                                                        <p>Happy Birthday!</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                        <p>Warm regards,</p>
                                                        <p>'.$emp_details->name.'</p>
                                                        <p>'.$position.'</p>
                                                        <p>'.$send_company.'</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                    <table align="center" >
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="middle">
                                                    <div>
                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                        <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </section>
        </html>';
        // echo $html;
        // die;

        
        $this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();

        if(empty($emailData))
        {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact@buromatrix.com';
            $mail->Password = 'khujsqoduyvcgxmy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = '465';
            
            $mail->setFrom('khujsqoduyvcgxmy', 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Happy Birthday '.$get_details->name.'!';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();
            }
        }
        else
        {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = $emailData->host_name;
            $mail->SMTPAuth = true;
            $mail->Username = $emailData->email_id;
            $mail->Password = $emailData->email_pass;
            $mail->SMTPSecure = $emailData->secure;
            $mail->Port     = $emailData->port_number;
            
            $mail->setFrom($emailData->email_id, 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Happy Birthday '.$get_details->name.'!';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();

            }
        }

        
    }

    public function Single_marriage($id)
    {
        // echo "<pre>";
        $get_details = $this->db->select('*')->from('tbl_admin_login')->where('id',$id)->get()->row();

        $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
        $send_email = $get_details->email;
        // print_r($get_details);
        // print_r($send_email);
        $html = 
        '<html>
            <section>
                <center style="width: 100%;">
                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                        <tbody>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 30px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <div class="text-center" >
                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Marriage Anniversary</h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                    <img class="center" src="https://buroforce.progfeel.co.in/app-assets/image/marriage.jpeg" alt="img" style="max-width: 290px;width: 100%;height:auto;margin-left:125px;">                                                    
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 0px 50px 0px 50px;">
                                                        <p>Dear '.$get_details->name.',</p>
                                                        <p>On this special day, we are delighted to extend our warmest wishes to you as you celebrate your marriage anniversary. It’s moments like these that remind us of the beautiful journey of life and the milestones we achieve along the way.</p>
                                                        <p>May this anniversary be filled with joy, love, and cherished memories with your loved ones. Here’s to many more years of togetherness, happiness, and success, both in your personal life and your career.</p>
                                                        <p>Once again, congratulations on this special occasion!</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                        <p>Best Regards,</p>
                                                        <p>'.$org_name.'</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                    <table align="center" >
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="middle">
                                                    <div>
                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                        <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </section>
        </html>';
        // echo $html;
        // die;
        $this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();

        if(empty($emailData))
        {
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact@buromatrix.com';
            $mail->Password = 'khujsqoduyvcgxmy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = '465';
            
            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Warm Marriage Anniversary Wishes from '.$org_name.'';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();
            }
        }
        else
        {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = $emailData->host_name;
            $mail->SMTPAuth = true;
            $mail->Username = $emailData->email_id;
            $mail->Password = $emailData->email_pass;
            $mail->SMTPSecure = $emailData->secure;
            $mail->Port     = $emailData->port_number;
            
            $mail->setFrom($emailData->email_id, 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Warm Marriage Anniversary Wishes from '.$org_name.'';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();
            }
        }
    }

    public function Single_company($id)
    {
        // echo "<pre>";
        $get_details = $this->db->select('*')->from('tbl_customer')->where('customer_id',$id)->get()->row();

        $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
        $send_email = $get_details->email;
        // print_r($get_details);
        // print_r($send_email);
        $html = 
        '<html>
            <section>
                <center style="width: 100%;">
                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                        <tbody>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 30px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <div class="text-center" >
                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Company Anniversary!</h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                    <img class="center" src="https://buroforce.progfeel.co.in/app-assets/image/company.jpeg" alt="img" style="max-width: 269px;width: 100%;height:auto;margin-left:117px;">                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 0px 50px 0px 50px;">
                                                        <p>Dear '.$get_details->company_name.'</p>
                                                        <p>Warm congratulations on '.$get_details->company_name.' anniversary!.</p>
                                                        <p>Your unwavering commitment and the collective efforts of the entire team have brought '.$get_details->company_name.' to this remarkable milestone. May this celebration mark the beginning of even greater achievements and continued success.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 15px 50px;">
                                                        <p>Best Wishes,</p>
                                                        <p>'.$org_name.'</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                    <table align="center" >
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="middle">
                                                    <div>
                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                        <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </section>
        </html>';
        // echo $html;
        // die;
        
        $this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();

        if(empty($emailData))
        {
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact@buromatrix.com';
            $mail->Password = 'khujsqoduyvcgxmy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = '465';
            
            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Warm Company Anniversary Wishes from '.$org_name.'';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();
            }
        }
        else
        {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host     = $emailData->host_name;
            $mail->SMTPAuth = true;
            $mail->Username = $emailData->email_id;
            $mail->Password = $emailData->email_pass;
            $mail->SMTPSecure = $emailData->secure;
            $mail->Port     = $emailData->port_number;
            
            $mail->setFrom($emailData->email_id, 'Buroforce');
            $mail->addAddress($send_email);
            // $mail->addAddress('p.shinde@splendornet.com');
            $mail->Subject = 'Warm Company Anniversary Wishes from '.$org_name.'';
            $mail->isHTML(true);
            $mail->Body = $html;
            if(!$mail->send())
            {
                echo 0;
            }
            else
            {
                // echo 1;
                $this->TodayEvent();
            }
        }
    }

    public function bday_bulk_mail()
    {
        $ids = $this->input->post('updateFiled');
        for($i=0;$i<count($ids);$i++)
        {
            $get_details = $this->db->select('*')->from('tbl_admin_login')->where('id',$ids[$i])->get()->row();

            $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
            $send_email = $get_details->email;

            $html = 
            '<html>
                <section>
                    <center style="width: 100%;">
                        <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                            <tbody>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <div class="text-center" >
                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Birth Day!</h3>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 25px 50px 0px 50px;">
                                                            <p>Dear '.$get_details->name.',</p>
                                                            <p>On behalf of everyone at '.$org_name.', I wanted to take a moment to wish you a very happy birthday!</p>
                                                            <p>Birthdays are a time for celebration, reflection, and gratitude. As you celebrate another year of life, we want you to know how much you mean to our team. Your dedication, hard work, and positive attitude make a significant impact on our organization every day.</p>
                                                            <p>May this special day bring you joy, laughter, and unforgettable memories with your loved ones. Take some time to relax and enjoy the festivities - you deserve it!</p>
                                                            <p>We look forward to continuing to work alongside you and witnessing all the incredible things you will accomplish in the year ahead.</p>
                                                            <p>Once again, happy birthday, '.$get_details->name.'!</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 15px 50px;">
                                                            <p>Best Regards,</p>
                                                            <p>'.$org_name.'</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                        <table align="center" >
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <div>
                                                            <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                            <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </section>
            </html>';
            
            $this->db->where('emp_id', $this->session->id);
            $emailData = $this->db->get('tbl_org_email_configuration')->row();

            if(empty($emailData))
            {
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'contact@buromatrix.com';
                $mail->Password = 'khujsqoduyvcgxmy';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = '465';
                
                $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Birthday Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
            else
            {
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host     = $emailData->host_name;
                $mail->SMTPAuth = true;
                $mail->Username = $emailData->email_id;
                $mail->Password = $emailData->email_pass;
                $mail->SMTPSecure = $emailData->secure;
                $mail->Port     = $emailData->port_number;
                
                $mail->setFrom($emailData->email_id, 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Birthday Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
        }
    }

    public function marriage_bulk_mail()
    {
        $ids = $this->input->post('updateFiled_m');
        
        for($i=0;$i<count($ids);$i++)
        {
            $get_details = $this->db->select('*')->from('tbl_admin_login')->where('id',$ids[$i])->get()->row();

            $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
            $send_email = $get_details->email;
            
            $html = 
            '<html>
                <section>
                    <center style="width: 100%;">
                        <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                            <tbody>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <div class="text-center" >
                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Marriage Anniversary</h3>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 25px 50px 0px 50px;">
                                                            <p>Dear '.$get_details->name.',</p>
                                                            <p>On this special day, we are delighted to extend our warmest wishes to you as you celebrate your marriage anniversary. It’s moments like these that remind us of the beautiful journey of life and the milestones we achieve along the way.</p>
                                                            <p>May this anniversary be filled with joy, love, and cherished memories with your loved ones. Here’s to many more years of togetherness, happiness, and success, both in your personal life and your career.</p>
                                                            <p>Once again, congratulations on this special occasion!</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 15px 50px;">
                                                            <p>Best Regards,</p>
                                                            <p>'.$org_name.'</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                        <table align="center" >
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <div>
                                                            <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                            <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </section>
            </html>';
            
            
            $this->db->where('emp_id', $this->session->id);
            $emailData = $this->db->get('tbl_org_email_configuration')->row();
    
            if(empty($emailData))
            {
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2; 
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'contact@buromatrix.com';
                $mail->Password = 'khujsqoduyvcgxmy';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = '465';
                
                $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Marriage Anniversary Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
            else
            {
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2; 
                $mail->isSMTP();
                $mail->Host     = $emailData->host_name;
                $mail->SMTPAuth = true;
                $mail->Username = $emailData->email_id;
                $mail->Password = $emailData->email_pass;
                $mail->SMTPSecure = $emailData->secure;
                $mail->Port     = $emailData->port_number;
                
                $mail->setFrom($emailData->email_id, 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Marriage Anniversary Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
        }
    }

    public function company_bulk_mail()
    {
        $ids = $this->input->post('updateFiled_c');
        
        for($i=0;$i<count($ids);$i++)
        {
            $get_details = $this->db->select('*')->from('tbl_customer')->where('customer_id',$ids[$i])->get()->row();

            $org_name = $this->db->select('org_cname')->from('tbl_organisation')->where('org_id',$get_details->org_id)->get()->row()->org_cname;
            $send_email = $get_details->email;
            
            $html = 
            '<html>
                <section>
                    <center style="width: 100%;">
                        <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                            <tbody>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <div class="text-center" >
                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Happy Company Anniversary!</h3>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 15px 50px;">
                                                        <img class="center" src="https://buroforce.progfeel.co.in/app-assets/image/company_anniversary.png" alt="img" style="max-width: 340px;width: 100%;height:auto;margin-left:95px;">                                                    </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 25px 50px 0px 50px;">
                                                            <p>Dear '.$get_details->company_name.'</p>
                                                            <p>On behalf of '.$org_name.', we are delighted to extend our warmest congratulations to '.$get_details->company_name.' on the occasion of your company anniversary. This milestone is a testament to your dedication, hard work, and the successful journey you have undertaken.</p>
                                                            <p>Over the years, it has been our privilege to partner with you and witness your growth and achievements. Your vision, leadership, and commitment to excellence have not only benefited your organization but also inspired us as your trusted vendor.</p>
                                                            <p>As we celebrate this significant milestone together, we reflect on the strong partnership and collaboration we have shared. Your trust in our services and solutions has been the cornerstone of our relationship, and we look forward to continuing this successful journey with you.</p>
                                                            <p>May this anniversary be a time of celebration, reflection, and renewed energy for the exciting endeavors ahead. We are grateful for the opportunity to contribute to your success and remain committed to providing you with exceptional service and support.</p>
                                                            <p>Once again, congratulations to the entire '.$get_details->company_name.' team on this remarkable achievement!</p>
                                                        </div>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 15px 50px;">
                                                            <p>Best Regards,</p>
                                                            <p>'.$org_name.'</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                        <table align="center" >
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <div>
                                                            <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                            <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">Buromatrix.com</p></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </section>
            </html>';
            // echo $html;
            // die;
            $this->db->where('emp_id', $this->session->id);
            $emailData = $this->db->get('tbl_org_email_configuration')->row();

            if(empty($emailData))
            {
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2; 
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'contact@buromatrix.com';
                $mail->Password = 'khujsqoduyvcgxmy';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = '465';
                
                $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Company Anniversary Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
            else
            {
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->SMTPDebug = 2; 
                $mail->isSMTP();
                $mail->Host     = $emailData->host_name;
                $mail->SMTPAuth = true;
                $mail->Username = $emailData->email_id;
                $mail->Password = $emailData->email_pass;
                $mail->SMTPSecure = $emailData->secure;
                $mail->Port     = $emailData->port_number;
                
                $mail->setFrom($emailData->email_id, 'Buroforce');
                $mail->addAddress($send_email);
                // $mail->addAddress('p.shinde@splendornet.com');
                $mail->Subject = 'Warm Company Anniversary Wishes from '.$org_name.'';
                $mail->isHTML(true);
                $mail->Body = $html;
                if(!$mail->send())
                {
                    echo 0;
                }
                else
                {
                    // echo 1;
                    $this->TodayEvent();
                }
            }
        }
    }
}
