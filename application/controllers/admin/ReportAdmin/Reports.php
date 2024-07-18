<?php

error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/ReportAdmin/Reports_New_model');
	}

	public function ReportViewCard()
	{
		if (isset($_SESSION['id'])) {
			// $this->load->view('Admin/ReportAdmin/ReportView');

			$data['type'] = 's_link';
			$data['page_name'] = 'Reports';
			$data['sidebar']=array('menu' =>"Reports");

			$this->load->view('Admin/ReportAdmin/NewReportView',$data);
		} else {
			redirect('admin/Login');
		}
	}

	public function LeadOppBySource()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;
			
			$data['SourceArray'] = $this->Reports_model->GetSourceArray();
			$data['StageArray'] = $this->Reports_model->GetStageArray();
			$data['Lead_Opportunity_by_Source'] = $this->Reports_model->Lead_Opportunity_by_Source($startdate,$enddate);
			$data['LeadcountountBySourceSummary'] = $this->Dashboard_model->LeadcountountBySourceSummary($startdate, $enddate);
            $data['OppCountBySourceSummary'] = $this->Dashboard_model->OppCountBySourceSummary($startdate, $enddate);
			
			$data['sidebar'] = array('menu' => "bySource");
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();

			//$data['GeofenceNotification'] = $this->Reports_model->GeofenceNotification();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Source Leads';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppBySourceView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppBySourceView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySource()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Source'] = $this->Reports_model->Daterange_LeadOppBySource($formdata);
			$data['LeadcountountBySourceSummary'] = $this->Reports_model->LeadcountountBySourceSummary($formdata);
            $data['OppCountBySourceSummary'] = $this->Reports_model->OppCountBySourceSummary($formdata);
			$StageArray = $formdata['StageArray'];

			if (empty($StageArray)) {
				$StageArray = array('0');
			}
			$data['StageArray'] = $this->Reports_model->GetStageArrayUsingIds($StageArray);
			$this->load->view('Admin/ReportAdmin/FilterScheduleBySourceView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySourceGraph()
	{
		$formdata = $this->input->post();
		$this->load->model('Admin/ReportAdmin/Reports_model');
		$data['Lead_Opportunity_by_Source'] = $this->Reports_model->Daterange_LeadOppBySource($formdata);
		$result = json_encode($data['Lead_Opportunity_by_Source']);
		echo $result;
	}

	//---------------------------------------------------------------------------------------------

	public function ViewSourceTotalDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewSourceTotalDetails($formdata);
			$data['GetSourceData'] = $this->Reports_model->GetSourceData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewSourceTotalDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ViewSourceStageData()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewStageDetails($formdata);
			$data['GetSourceStageData'] = $this->Reports_model->GetSourceStageData($formdata);

			// print_r($data['ViewDetails']);
			$this->load->view('Admin/ReportAdmin/ViewSourceStageDataView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//------------------------------------------------------------------------------------

	public function LeadOppBySalesPersonSegment()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			$data['LeadOppBySalesPersonSegment'] = $this->Reports_model->LeadOppBySalesPersonSegment($startdate,$enddate);
			$data['sidebar'] = array('menu' => "LeadOppBySalesPersonSegment");
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Sales Segment';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppBySalesPersonSegmentView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppBySalesPersonSegmentView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySalesPersonSegment()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			$data['LeadOppBySalesPersonSegment'] = $this->Reports_model->DaterangeLeadOppBySalesPersonSegment($formdata);
			$data['LeadOppBySalesPersonSegmentGraph'] = $this->Reports_model->DaterangeLeadOppBySalesPersonSegment($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppBySalesPersonSegmentView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySalesPersonSegmentGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LeadOppByStage'] = $this->Reports_model->DaterangeLeadOppBySalesPersonSegment($formdata);
			$result = json_encode($data['LeadOppByStage']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}

	public function ViewLeadOppBySalesPersonSegment()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['formdata'] = $formdata;
			$data['ViewDetails'] = $this->Reports_model->ViewLeadOppBySalesPersonSegment($formdata);
            // echo "<pre>";
			// print_r($data['ViewDetails']);
            // die;
			// $data['GetBusinessDetails'] = $this->Reports_model->ViewSalesPersonSegment($formdata);
			$this->load->view('Admin/ReportAdmin/ViewLeadOppBySalesPersonSegment', $data);
		} else {
			redirect('admin/Login');
		}
	}
	//-----------------------------------------------------------------------------
	public function LeadOppBySalesPersonProduct()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['ProductArray'] = $this->Reports_model->GetProductArray();
			$data['LeadOppBySalesPersonSegment'] = $this->Reports_model->LeadOppBySalesPersonProduct($startdate,$enddate);
			$data['sidebar'] = array('menu' => "LeadOppBySalesPersonProduct");
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Sales Product';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppBySalesPersonProductView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppBySalesPersonProductView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function branch()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Master_model');
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['get_branch_report'] = $this->Master_model->get_branch_report();
			// $data['LeadOppBySalesPersonSegment'] = $this->Master_model->get_branch_report();
			
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['ProductArray'] = $this->Reports_model->GetProductArray();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Branch';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/new_branch', $data);
			// $this->load->view('Admin/ReportAdmin/branch', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeBranch()
	{
		if (isset($_SESSION['id'])) 
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Master_model');
			$data['get_branch_report_filter'] = $this->Master_model->get_branch_report_filter($formdata);
			$data['get_branch_report_filter_graph'] = $this->Master_model->get_branch_report_filter($formdata);

			$this->load->view('Admin/ReportAdmin/FilterCRMBranchView', $data);
		} 
		else
		{
			redirect('admin/Login');
		}
	}

	public function Viewbranchtotal()
	{

		$this->load->model('Admin/ReportAdmin/Reports_model');
		$formdata = $this->input->post();
		$data['formdata'] = $formdata;
		$data['viewtotal'] = $this->Reports_model->get_branch_total($formdata);
		$this->load->view('Admin/ReportAdmin/ViewBranchTotalDetailsView', $data);
	}

	public function DaterangeLeadOppBySalesPersonProduct()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LeadOppBySalesPersonSegment'] = $this->Reports_model->DaterangeLeadOppBySalesPersonProduct($formdata);
			$data['LeadOppBySalesPersonSegmentGraph'] = $this->Reports_model->DaterangeLeadOppBySalesPersonProduct($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppBySalesPersonProductView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ViewLeadOppBySalesPersonProduct()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();			
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['formdata'] = $formdata;
			$data['ViewDetails'] = $this->Reports_model->ViewLeadOppBySalesPersonProduct($formdata);
			$this->load->view('Admin/ReportAdmin/ViewLeadOppBySalesPersonProduct', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//--------------------------------------------------------------------------------------

	public function LeadOppBySegments()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['Lead_Opportunity_by_Segments'] = $this->Reports_model->Lead_Opportunity_by_Segments($startdate,$enddate);
			$data['Lead_by_Segments'] = $this->Reports_model->Lead_by_Segments($startdate, $enddate);
            $data['Opportunity_by_Segments'] = $this->Reports_model->Opportunity_by_Segments($startdate, $enddate);

			$data['sidebar'] = array('menu' => "bySegments");
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			// print_r($data['LeadsBySegmentsSummary']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Segment Leads';
			$data['sidebar']=array('menu' =>"Reports");
			
			$this->load->view('Admin/ReportAdmin/NewLeadOppBySegmentsView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppBySegmentsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySegments()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Segments'] = $this->Reports_model->DaterangeLeadOppBySegments($formdata);
			$data['Lead_by_Segments'] = $this->Reports_model->Lead_by_Segments_filter($formdata);
            $data['Opportunity_by_Segments'] = $this->Reports_model->Opportunity_by_Segments_filter($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppBySegmentsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppBySegmentsGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Segments'] = $this->Reports_model->DaterangeLeadOppBySegments($formdata);
			$result = json_encode($data['Lead_Opportunity_by_Segments']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}



	public function ViewBusinessDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewBusinessDetails($formdata);
			$data['GetBusinessDetails'] = $this->Reports_model->GetBusinessDetails($formdata);
			$this->load->view('Admin/ReportAdmin/ViewBusinessDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//------------  Product / Services  --------------------------------------------------------------------------


	public function LeadOppByProduct()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['Lead_Opportunity_by_Product'] = $this->Reports_model->Lead_Opportunity_by_Product($startdate,$enddate);
			$data['ProductArray'] = $this->Reports_model->GetProductArray();
			$data['LeadsByProductSummary'] = $this->Reports_model->Lead_Opportunity_by_Product_graph($startdate,$enddate);
			$data['sidebar'] = array('menu' => "byProduct");
			// print_r($data['Lead_Opportunity_by_Product']);
			// print_r($data['ProductArray']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Product Leads';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppByProductView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppByProductView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function ViewProductDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewProductDetails($formdata);
			$data['FetchProductData'] = $this->Reports_model->FetchProductData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewProductDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppByProduct()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Product'] = $this->Reports_model->DaterangeLeadOppByProduct($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppByProductView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function DaterangeLeadOppByProductGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Product'] = $this->Reports_model->DaterangeLeadOppByProduct($formdata);
			$result = json_encode($data['Lead_Opportunity_by_Product']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}

	//--------------------------------------------------------------------------------------------

	public function LeadOppBySalesPerson()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			// $data['SourceArray']=$this->Reports_model->GetEmpArray();
			// $data['StageArray']=$this->Reports_model->GetStageArray();
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['LeadOppBySalesPerson'] = $this->Reports_model->LeadOppBySalesPerson($startdate,$enddate);
			$data['sidebar'] = array('menu' => "bySource");
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Sales Force Scores';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppBySalesPersonView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppBySalesPersonView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLeadOppBySalesPerson()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Product'] = $this->Reports_model->DateRangeLeadOppBySalesPerson($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppBySalesView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLeadOppBySalesPersonGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['Lead_Opportunity_by_Product'] = $this->Reports_model->DateRangeLeadOppBySalesPerson($formdata);
			$result = json_encode($data['Lead_Opportunity_by_Product']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}



	public function ViewSalesPersonDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewSalesPersonDetails($formdata);
			$data['FetchSalesPerson'] = $this->Reports_model->FetchSalesPerson($formdata);
			$this->load->view('Admin/ReportAdmin/ViewSalesPersonDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//------------------------------------------------------

	public function LeadOppByStage()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['StageArray'] = $this->Reports_model->GetStageArray();
			$data['LeadOppByStage'] = $this->Reports_model->LeadOppByStage($startdate,$enddate);
			$data['LeadscountByStagesSummary'] = $this->Dashboard_model->LeadscountByStagesSummary($startdate, $enddate);
            $data['OpportunitycountByStagesSummary'] = $this->Dashboard_model->OpportunitycountByStagesSummary($startdate, $enddate);

			$data['sidebar'] = array('menu' => "LeadOppByStage");
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Stage Leads';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppByStageView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppByStageView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLeadOppByStage()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LeadOppByStage'] = $this->Reports_model->DateRangeLeadOppByStage($formdata);
			$data['LeadscountByStagesSummary'] = $this->Reports_model->LeadscountByStagesSummary($formdata);
            $data['OpportunitycountByStagesSummary'] = $this->Reports_model->OpportunitycountByStagesSummary($formdata);

			$this->load->view('Admin/ReportAdmin/FilterLeadOppByStageView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLeadOppByStageGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LeadOppByStage'] = $this->Reports_model->DateRangeLeadOppByStage($formdata);
			$result = json_encode($data['LeadOppByStage']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}



	public function ViewStageDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->Lead_Opportunity_by_Stage_Details($formdata);
			$data['FetchStageData'] = $this->Reports_model->FetchStageData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewDetailsByStageView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	//-------------------------------------------------------------------------------------------------------- 

	public function LeadOppByUserwiseMonthlyCounts()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['StageArray'] = $this->Reports_model->GetStageArray();
			$data['MonthArray'] = $this->Reports_model->GetMonthArray($startdate,$enddate);
			$data['LeadOppByUserwiseMonthlyCounts'] = $this->Reports_model->LeadOppByUserwiseMonthlyCounts($startdate,$enddate);
			
			$data['sidebar'] = array('menu' => "LeadOppByUserwiseMonthlyCounts");
			// echo json_encode($data['MonthArray']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'User Leads';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppByUserwiseMonthlyCountsView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppByUserwiseMonthlyCountsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLeadOppByUserwiseMonthlyCounts()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['MonthArray'] = $this->Reports_model->GetMonthArrayFilter($formdata);
			$data['LeadOppByUserwiseMonthlyCounts_new'] = $this->Reports_model->DateRangeLeadOppByUserwiseMonthlyCounts($formdata);
			$this->load->view('Admin/ReportAdmin/FilterUserwiseMonthlyCountsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//-------------------------------------------------------------------------------------------------

	public function LeadOppByMonthlyCounts()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['StageArray'] = $this->Reports_model->GetStageArray();

			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
            $getdate = $data['account_period_array'];
            $startdate = $getdate['start_date'];
            $enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;

			$data['LeadOppByMonthlyCounts'] = $this->Reports_model->LeadOppByMonthlyCounts($startdate,$enddate);
			
			$data['sidebar'] = array('menu' => "LeadOppByMonthlyCounts");
			// echo json_encode($data['LeadOppByMonthlyCounts']);
			$data['user_permission'] = $this->GetUserPermissionByCRM();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Monthly Leads';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewLeadOppByMonthlyCountsView', $data);
			// $this->load->view('Admin/ReportAdmin/LeadOppByMonthlyCountsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppByMonthlyCounts()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LeadOppByMonthlyCounts'] = $this->Reports_model->DaterangeLeadOppByMonthlyCounts($formdata);
			$data['LeadOppByMonthlyCountsGraph'] = $this->Reports_model->DaterangeLeadOppByMonthlyCounts($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLeadOppByMonthlyCountsView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DaterangeLeadOppByMonthlyCountsGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			// $data['SegmentWiseContact'] = $this->Reports_model->DateRangeSegmentWiseContact($formdata);
			$data['LeadOppByMonthlyCounts'] = $this->Reports_model->DaterangeLeadOppByMonthlyCounts($formdata);
			$result = json_encode($data['LeadOppByMonthlyCounts']);
			echo $result;
		} else {
			redirect('admin/Login');
		}

	}

	public function ViewMonthlyDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewMonthlyDetails($formdata);
			$data['formdata'] = $formdata;
			// print_r($data['ViewDetails']);
			$this->load->view('Admin/ReportAdmin/ViewMonthlyDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function ViewUserwiseMonthlyDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['formdata'] = $formdata;
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->ViewUserwiseMonthlyDetails($formdata);
			$this->load->view('Admin/ReportAdmin/ViewUserwiseMonthlyDetails', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//------------------------------------------------------------------------------------------------------------

	public function SegmentWiseContact()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['SegmentWiseContact'] = $this->Reports_model->SegmentWiseContact();
			$data['sidebar'] = array('menu' => "SegmentWiseContact");
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			// $this->load->view('Admin/ReportAdmin/SegmentWiseContactView', $data);
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Segment Contacts';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewSegmentWiseContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function AllContacts()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/ReportAdmin/Reports_New_model');
			$this->load->model('Admin/Master_model');

			$data['SegmentWiseContact'] = $this->Reports_model->SegmentWiseContact();
			$data['sidebar'] = array('menu' => "AllContacts");
			$data['get_groupdata'] = $this->Master_model->get_groupdata();
			$data['TypeArray'] = $this->Reports_New_model->TypeArray();
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			$data['LocationArray'] = $this->Reports_model->GetLocationArray();
			$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();

			$data['Allcontact'] = $this->Reports_model->AllContact();


			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'All Contacts';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewAllContactView', $data);
			// $this->load->view('Admin/ReportAdmin/AllContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeSegmentWiseContact()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['SegmentWiseContact'] = $this->Reports_model->DateRangeSegmentWiseContact($formdata);
			$this->load->view('Admin/ReportAdmin/FilterSegmentWiseContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeAllContact()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['SegmentWiseContact'] = $this->Reports_model->DateRangeAllContact($formdata);
			$this->load->view('Admin/ReportAdmin/FilterAllContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeSegmentWiseContactGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['SegmentWiseContact'] = $this->Reports_model->DateRangeSegmentWiseContact($formdata);
			$result = json_encode($data['SegmentWiseContact']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}




	public function SegmentWiseContactDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->SegmentWiseContactDetails($formdata);
			$data['FetchSegmentWiseContact'] = $this->Reports_model->FetchSegmentWiseContact($formdata);
			$this->load->view('Admin/ReportAdmin/SegmentWiseContactDetailsView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	//------------------------------------------------------------------------------------------------------------

	public function AccountOwners()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	
	
			$data['AccountOwners'] = $this->Reports_model->AccountOwners($startdate,$enddate);
			// $data['sidebar'] = array('menu' => "AccountOwners");
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Account Manger';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewAccountOwnersView', $data);
			// $this->load->view('Admin/ReportAdmin/AccountOwnersView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeAccountOwners()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['AccountOwners'] = $this->Reports_model->DateRangeAccountOwners($formdata);
			$this->load->view('Admin/ReportAdmin/FilterAccountOwnersView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function AccountOwnersDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->AccountOwnersDetails($formdata);
			$data['FetchAccountOwnersData'] = $this->Reports_model->FetchAccountOwnersData($formdata);
			// print_r($data['ViewDetails']);
			$this->load->view('Admin/ReportAdmin/AccountOwnersDetails', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//-------------------------------------------------------------------

	public function LocationWiseContact()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LocationWiseContact'] = $this->Reports_model->LocationWiseContact();
			$data['LocationArray'] = $this->Reports_model->GetLocationArray();
			$data['sidebar'] = array('menu' => "LocationWiseContact");
			// print_r($data['LocationWiseContact']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$this->load->view('Admin/ReportAdmin/LocationWiseContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLocationWiseContact()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LocationWiseContact'] = $this->Reports_model->DateRangeLocationWiseContact($formdata);
			$this->load->view('Admin/ReportAdmin/FilterLocationwiseView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeLocationWiseContactGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['LocationWiseContact'] = $this->Reports_model->DateRangeLocationWiseContact($formdata);
			$result = json_encode($data['LocationWiseContact']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}


	public function LocationWiseContactDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ViewDetails'] = $this->Reports_model->LocationWiseContactDetails($formdata);
			$data['FetchLocationData'] = $this->Reports_model->FetchLocationData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewLocationView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	//-------------------------------------------------------------------------------


	public function ContactsActivities()
	{
		if (isset($_SESSION['id'])) {

			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	
	

			$data['ContactsActivities'] = $this->Reports_New_model->ContactsActivities($startdate,$enddate);

			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['ActivityArray'] = $this->Reports_model->GetActivityArray();
			$data['sidebar'] = array('menu' => "ContactsActivities");
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Contacts With Task Details';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewContactsActivitiesView', $data);
			// $this->load->view('Admin/ReportAdmin/ContactsActivitiesView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeContactsActivities()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['ContactsActivities'] = $this->Reports_New_model->DateRangeContactsActivities($formdata);
			$this->load->view('Admin/ReportAdmin/FilterContactsActivitiesView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ContactsActivitiesDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['ViewDetails'] = $this->Reports_New_model->ContactsActivitiesDetails($formdata);
			// print_r($data['ViewDetails']);
			$this->load->view('Admin/ReportAdmin/ContactsActivitiesDetails', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ViewTotalActivityDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['ViewDetails'] = $this->Reports_New_model->ViewTotalActivityDetails($formdata);
			// print_r($data['ViewDetails']);
			$data['FetchCustomerData'] = $this->Reports_New_model->FetchCustomerData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewTotalActivityDetails', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//------------------------------------------------------------------------------------------------------------

	public function TypewiseContact()
	{
		if (isset($_SESSION['id'])) {
			
			$data['TypewiseContact'] = $this->Reports_New_model->TypewiseContact();
			$data['TypeArray'] = $this->Reports_New_model->TypeArray();
			$data['sidebar'] = array('menu' => "TypewiseContact");
			// print_r($data['TypeArray']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Contact Type';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewTypewiseContactView', $data);
			// $this->load->view('Admin/ReportAdmin/TypewiseContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeTypewiseContact()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['TypewiseContact'] = $this->Reports_New_model->DateRangeTypewiseContact($formdata);
			$this->load->view('Admin/ReportAdmin/FilterTypewiseContactView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeTypewiseContactGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['TypewiseContact'] = $this->Reports_New_model->DateRangeTypewiseContact($formdata);
			$result = json_encode($data['TypewiseContact']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}



	public function TypewiseContactDetails()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['ViewDetails'] = $this->Reports_New_model->TypewiseContactDetails($formdata);
			$data['FetchTypeData'] = $this->Reports_New_model->FetchTypeData($formdata);
			$this->load->view('Admin/ReportAdmin/ViewTypewiseView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	//----------------------------------------------------------------------------

	public function AssignAccountOwners()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['AccountOwners'] = $this->Reports_model->AssignAccountOwners();
			$data['sidebar'] = array('menu' => "AssignAccountOwners");
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			// print_r($data['LeadsBySourceSummary']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$this->load->view('Admin/ReportAdmin/AssignAccountOwnersView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeAssignAccountOwners()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['AccountOwners'] = $this->Reports_model->DateRangeAssignAccountOwners($formdata);
			$this->load->view('Admin/ReportAdmin/FilterAccountOwnersView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function DateRangeAccountOwnersGraph()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['AccountOwners'] = $this->Reports_model->DateRangeAssignAccountOwners($formdata);
			$result = json_encode($data['AccountOwners']);
			echo $result;
		} else {
			redirect('admin/Login');
		}
	}





	//----------------------------------------------------------------------------

	public function ContactSummary()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['ContactSummary'] = $this->Reports_model->ContactSummary();
			$data['sidebar'] = array('menu' => "ContactSummary");

			// print_r($data['ContactSummary']);
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Contact List';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewContactSummaryView', $data);
			// $this->load->view('Admin/ReportAdmin/ContactSummaryView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeContactSummary()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$formdata = $this->input->post();
			$data['ContactSummary'] = $this->Reports_model->DateRangeContactSummary($formdata);
			$this->load->view('Admin/ReportAdmin/FilterContactSummaryView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function ContactSummaryDetails()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$formdata = $this->input->post();
			$data['formdata'] = $formdata;
			$data['ViewDetails'] = $this->Reports_model->ContactSummaryDetails($formdata);
			$this->load->view('Admin/ReportAdmin/ViewContactSummaryDetails', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function AccountRevenue()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	
	
			$data['AccountRevenue'] = $this->Reports_model->AccountRevenue($startdate,$enddate);
			$data['sidebar'] = array('menu' => "AccountRevenue");
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Account Revenue';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewAccountRevenueView', $data);
			// $this->load->view('Admin/ReportAdmin/AccountRevenueView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeAccountRevenue()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$formdata = $this->input->post();
			$data['AccountRevenue'] = $this->Reports_model->DaterangeAccountRevenue($formdata);
			$this->load->view('Admin/ReportAdmin/FilterAccountRevenueView', $data);
		} else {
			redirect('admin/Login');
		}
	}









	//----------------------------------------------------------------------------

	public function ContactsWithNoActivities()
	{
		if (isset($_SESSION['id'])) {

			$this->load->model('Admin/Dashboard_model');

			$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['start_date'] = $startdate;
			$data['end_date'] = $enddate;	
	
			$data['ContactsActivities'] = $this->Reports_New_model->ContactsWithNoActivities($startdate,$enddate);
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['EmpArray'] = $this->Reports_model->GetEmpArray();
			$data['ActivityArray'] = $this->Reports_model->GetActivityArray();
			$data['sidebar'] = array('menu' => "ContactsWithNoActivities");
			$data['user_permission'] = $this->GetUserPermissionByContact();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ReportViewCard';
			$data['page_name_1'] = 'Reports';
			$data['page_name_2'] = 'Inactive Contacts';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/NewContactsWithNoActivitiesView', $data);
			// $this->load->view('Admin/ReportAdmin/ContactsWithNoActivitiesView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function DateRangeContactsWithNoActivities()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$data['ContactsActivities'] = $this->Reports_New_model->DateRangeContactsWithNoActivities($formdata);
			$this->load->view('Admin/ReportAdmin/FilterContactsWithNoActivitiesView', $data);
		} else {
			redirect('admin/Login');
		}
	}




	//-------------------------------------------------------------------------

	public function BulkEmail()
	{
		if (isset($_SESSION['id'])) {
			$this->db->where('org_id', $this->session->org_id);
			$this->db->where('emp_id', $this->session->id);
			$res = $this->db->get('tbl_org_email_configuration')->result();
			if (count($res) >= 1) {
				$this->load->model('Admin/Dashboard_model');
				$data['account_period_array'] = $this->Dashboard_model->get_start_enddate_array();
				$getdate = $data['account_period_array'];
				$startdate = $getdate['start_date'];
				$enddate = $getdate['end_date'];

				$data['ContactsActivities'] = $this->Reports_New_model->ContactsActivities($startdate,$enddate);
				$this->load->model('Admin/ReportAdmin/Reports_model');
				$this->load->model('Admin/Master_model');
				$data['EmpArray'] = $this->Reports_model->GetEmpArray();
				$data['StageArray'] = $this->Reports_model->GetStageArray();
				$data['SourceArray'] = $this->Reports_model->GetSourceArray();
				$data['SegmentArray'] = $this->Reports_model->GetSegmentArray();
				$data['ProductArray'] = $this->Reports_model->GetProductArray();
				$data['TypeArray'] = $this->Reports_New_model->TypeArray();
				$data['LocationArray'] = $this->Reports_model->GetLocationArray();
				$data['get_groupdata'] = $this->Master_model->get_groupdata();
				
				$data['type'] = 's_link';
				$data['page_name'] = 'Bulk Email';				
				$data['sidebar'] = array('menu' => "BulkEmail");
				// $this->load->view('Admin/ReportAdmin/BulkEmailView', $data);
				$this->load->view('Admin/ReportAdmin/NewBulkEmailView', $data);
			} else {
				$this->session->set_flashdata('msg', 'Your email configuration setting not available.<br>Please enter email configuration setting.');
				redirect('admin/dashboard/ViewMyProfile');
			}
		} else {
			redirect('admin/Login');
		}
	}
	public function DaterangeBulkEmail()
	{
		if (isset($_SESSION['id'])) {
			$formdata = $this->input->post();
			$this->load->model('Admin/ReportAdmin/Reports_model');
			$data['leads_opportunity'] = $this->Reports_model->DaterangeBulkEmailData($formdata);
			if ($formdata['typeModule'] == 'crm') {
				$this->load->view('Admin/ReportAdmin/FilterByBulkEmailCrm', $data);
			} else {
				$this->load->view('Admin/ReportAdmin/FilterByBulkEmailContact', $data);
			}
		} else {
			redirect('admin/Login');
		}
	}
	public function mail_write()
	{
		if (isset($_SESSION['id'])) 
		{
			$this->db->where('org_id', $this->session->org_id);
			$this->db->where('emp_id', $this->session->id);
			$res = $this->db->get('tbl_org_email_configuration')->result();
			$email_id_array = $_REQUEST['crmEmail'];
			$email_ids = implode(', ', $email_id_array);
			
			if (count($res) >= 1) {
				if ($_GET['id'] == "compose") {
					$data['title'] = "Compose Mail";
					$data['sidebar'] = array('menu' => "compose");
				} else {
					$data['title'] = "Bulk Mail";
				}
				if ($_REQUEST['crmEmail'] != '') {
					$data['email_id'] = $email_ids;
				} else {
					$data['email_id'] = '';
				}

				//commented on 8 july 2021
				//$data['bcc_email']= implode(",",$this->input->post('crmEmail'));	

				// User Permission Functionality ------------ 
				$this->load->model('Admin/Dashboard_model');
				$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 30);
				$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
				$data['type'] = 's_link';
				$data['page_name'] = 'Compose Email';				
				$data['sidebar'] = array('menu' => "Compose");
				$this->load->view('Admin/NewBulkMailView', $data);
				// $this->load->view('Admin/BulkMailView', $data);
			} else {
				$this->session->set_flashdata('msg', 'Your email configuration setting not available.<br>Please enter email configuration setting.');
				redirect('admin/dashboard/ViewMyProfile');
			}
		} else {
			redirect('admin/Login');
		}
	}
	public function mail_write_contact()
	{
		if (isset($_SESSION['id'])) 
		{
			$this->db->where('org_id', $this->session->org_id);
			$this->db->where('emp_id', $this->session->id);
			$res = $this->db->get('tbl_org_email_configuration')->result();
			$email_id_array = $_GET['email'];
			// $email_ids = implode(', ', $email_id_array);
			
			if (count($res) >= 1) {
				if ($_GET['id'] == "compose") {
					$data['title'] = "Compose Mail";
					$data['sidebar'] = array('menu' => "compose");
				} else {
					$data['title'] = "Bulk Mail";
				}
				if ($email_id_array != '') {
					$data['email_id'] = $email_id_array;
				} else {
					$data['email_id'] = '';
				}

				//commented on 8 july 2021
				//$data['bcc_email']= implode(",",$this->input->post('crmEmail'));	

				// User Permission Functionality ------------ 
				$this->load->model('Admin/Dashboard_model');
				$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 30);
				$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
				$data['type'] = 's_link';
				$data['page_name'] = 'Compose Email';				
				$data['sidebar'] = array('menu' => "Compose");
				$this->load->view('Admin/NewBulkMailView', $data);
				// $this->load->view('Admin/BulkMailView', $data);
			} else {
				$this->session->set_flashdata('msg', 'Your email configuration setting not available.<br>Please enter email configuration setting.');
				redirect('admin/dashboard/ViewMyProfile');
			}
		} else {
			redirect('admin/Login');
		}
	}
	public function send_email_crm()
	{
		
		$to = $this->input->post('to');
		
		
		$bcc = $this->input->post('bcc');
		$sub = $this->input->post('subject');
		$msg = $this->input->post('editor-full');

		// $email_config = array(
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'mail.buroforce.com',
		// 	'smtp_port' => '465',
		// 	'smtp_user' => 'support@buroforce.com',
		// 	'smtp_pass' => 'Bur@@ForCe$$2019',
		// 	'mailtype'  => 'html',
		// 	'starttls'  => true,
		// 	'newline'   => "\r\n"
		// );

		
		// $this->load->library('email', $email_config);
		// $this->email->initialize($email_config);

        // $from = 'support@buroforce.com';
		// $this->email->from($from, 'Buroforce');
		// if (isset($to)) {
		// 	$this->email->to($to);
		// }
		// if (isset($cc)) {
		// 	$this->email->cc($cc);
		// }
		// if (isset($bcc)) {
		// 	$this->email->bcc($bcc);
		// }
		// $this->email->subject($sub);
		// $this->email->message($msg);
		// $this->email->set_mailtype("html");
		// if($this->email->send())
		$this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();
		if (empty($emailData)) 
		{
			echo 0;
		} 
		else 
		{
			$this->load->library('phpmailer_lib');
		
			/* PHPMailer object */
			$mail = $this->phpmailer_lib->load();
			
			/* SMTP configuration */
			$mail->isSMTP();
			$mail->Host     = $emailData->host_name;
			$mail->SMTPAuth = true;
			$mail->Username = $emailData->email_id;
			$mail->Password = $emailData->email_pass;
			$mail->SMTPSecure = $emailData->secure;
			$mail->Port     = $emailData->port_number;
			
			$mail->setFrom($emailData->email_id, 'Buroforce');
		    
			// $mail->addAddress($to);
			$toAddresses = explode(',', $to);
			foreach ($toAddresses as $address) {
				$mail->addAddress(trim($address)); // Add each recipient
			}

            if(!empty($this->input->post('cc')))
			{
				$cc = $this->input->post('cc');
				$ccAddresses = explode(',', $cc);
				foreach ($ccAddresses as $address1) {
					$mail->addCC(trim($address1)); // Add each recipient
				}
			}
			
			if(!empty($this->input->post('bcc')))
			{
				$bcc = $this->input->post('bcc');
				$bccAddresses = explode(',', $bcc);
				foreach ($bccAddresses as $address2) {
					$mail->addBCC(trim($address2)); // Add each recipient
				}
			}
			
			
			$mail->Subject = $sub;
			
			$mail->isHTML(true);
			
			$mail->Body = $msg;
			
			// $mail->addAttachment("assets/admin/quotationdocuments/$company_name$quotation_id.pdf"); 

			if(!$mail->send())
			{
				echo "0";
			}
			else
			{
				echo "1";
			}
		}
	}

	public function GetUserPermissionByCRM()
	{
		// User Permission Functionality ------------ 
		$this->load->model('Admin/Dashboard_model');
		$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 2, 'feature_id' => 33);
		return $this->Dashboard_model->get_user_permission($permission_array);
	}
	public function GetUserPermissionByContact()
	{
		// User Permission Functionality ------------ 
		$this->load->model('Admin/Dashboard_model');
		$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 28);
		return $this->Dashboard_model->get_user_permission($permission_array);
	}
	public function ViewDetailsContent()
	{
		if (isset($_SESSION['id'])) 
		{
			$cust_id = $_GET['customer_id'];

			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			$this->load->model('Admin/Customer_model');
            $data['get_details'] = $this->Customer_model->Get_customer_details($cust_id);

			// $ticket_no = $data['get_details']['ticket_no'];
			// $data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			// $data['doc_list']=$this->Customer_model->doc_list($ticket_no);
			// $data['bill_list']=$this->Customer_model->bill_list($ticket_no);
			// $data['target_list']=$this->Customer_model->target_bill_list($ticket_no);

			// $data['view_details'] = $this->remark_details($data['get_details']['ticket_no']);
		
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ReportAdmin/Reports/ContactsWithNoActivities';
			$data['page_name_1'] = 'Contacts with No Task Details';
			$data['page_name_2'] = 'View Contacts with No Task Details';
			$data['sidebar']=array('menu' =>"Reports");
			$this->load->view('Admin/ReportAdmin/ContactsWithNoActivitiesView_viewpopup',$data);
		}
		else 
		{
			redirect('admin/Login');
		}
	}
}
