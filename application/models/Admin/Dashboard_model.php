<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	private $country_code;

	function __construct()
	{
		parent::__construct(); // construct the Model class
		$this->load->database();
		$this->country_code = array("country_code" => $this->session->country_code);
	}

	public function TodaysActivity($emp_id, $created_date)
	{
		$this->db->select("type_name");
		$this->db->where("org_id", $emp_id);
		//$this->db->from('tbl_schedule_type_name');
		$data = $this->db->get('tbl_schedule_type_name')->result();
		print_r($data);
	}

	public function get_schedule_data()
	{
		// $finalArray=array();
		$this->db->select("schedule_id,created_date,assign_date,assign_starttime ,assign_endtime,SUBSTR(`ticket_no`, 3) as title,issue_id,ticket_no,schedule_assign_to");
		$where_array = array('reschedule' => '', 'org_id' => $this->session->org_id, 'YEAR(assign_date)' => date('Y'));
		$this->db->where($where_array);
		if ($this->session->user_type == 'E') {
			$this->db->where("tbl_schedule.schedule_assign_to", $this->session->id);
		}
		$data2 = $this->db->get("tbl_schedule")->result();

		$data = [];
		foreach ($data2 as  $row) {
			$strat = $row->assign_date . '' . $row->assign_starttime;
			$end = $row->assign_date . '' . $row->assign_endtime;
			$created_date = $row->created_date;
			if ($this->session->user_type == 'E') {
				$title = $row->title;
			} else {
				$this->db->select("name");
				$this->db->where("id", $row->schedule_assign_to);
				$res22 = $this->db->get("tbl_admin_login")->row();
				$title = $res22->name;
			}

			$data[] = [
				'id'              => $row->schedule_id,
				'title'           => $title,
				'start'           => date('Y-m-d H:i:s', strtotime($strat)),
				'end'             => date('Y-m-d H:i:s', strtotime($end)),
			];
		}

		// print_r($data);	
		return  $data;
	}

	public function get_user_permission($permission_array)
	{
		$this->db->select("priviledge_id,priviledge_key,status");
		$where_array = array('user_id' => $permission_array['user_id'], 'module_id' => $permission_array['module_id'], 'feature_id' => $permission_array['feature_id'],);
		$this->db->where($where_array);
		return $this->db->get("tbl_module_permission")->result();
	}


	public function AddNotes()
	{
		$InsertArray = array(
			'org_id' => $this->session->org_id,
			'emp_id' => $this->session->id,
			'notes' => $this->input->post('notes'),
			'created_date' => date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_notes', $InsertArray);
	}

	public function del_notes()
	{
		$this->db->where("note_id", $this->input->post('note_id'));
		$this->db->Delete('tbl_notes');
	}

	public function editnotes()
	{
		$this->db->where("note_id", $this->input->post('note_id'));
		$res = $this->db->get("tbl_notes")->result();
		return $res; 
	}

	public function inserteditnotes($formdata)
	{
		$notes_id=$formdata['note_id'];
		$editednote=$formdata['editednote'];

		$NotesArray=array(
			'notes'=>$formdata['editednote']
		  );

		  $this->db->where("note_id",$formdata['note_id']);
		$this->db->update('tbl_notes',$NotesArray);
        

	}

	//23 06 2021 arbaz
	public function insertpreferenceleft($data)
	{
		$org_id = $this->session->org_id;
		$emp_id = $this->session->id;
		$this->db->where('org_id', $org_id);
		$this->db->where('emp_id', $emp_id);
		$leftData = $this->db->get('tbl_dashborad_preference')->result();
		
		if (empty($leftData)) {
			$InsertArray = array(
				'emp_id' => $emp_id,
				'org_id' => $org_id,
				'preference_left' => $data,
			);
			$this->db->where('org_id', $org_id);
			$this->db->where('emp_id', $emp_id);
			$this->db->insert('tbl_dashborad_preference', $InsertArray);
		}else{
			$InsertArray = array(
				'emp_id' => $emp_id,
				'org_id' => $org_id,
				'preference_left' => $data,
			);
			// $this->db->where('org_id', $org_id);
			// $this->db->where('emp_id', $emp_id);
			// $this->db->update('tbl_dashborad_preference', $InsertArray);
			$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_left` = concat(preference_left,'$data') WHERE `org_id`='$org_id' and `emp_id`='$emp_id'"); 
		}
	}

	public function insertpreferenceright($data)
	{
		$org_id = $this->session->org_id;
		$emp_id = $this->session->id;
		$this->db->where('org_id', $org_id);
		$this->db->where('emp_id', $emp_id);
		$leftData = $this->db->get('tbl_dashborad_preference')->result();
		if (empty($leftData)) {
			$InsertArray2 = array(
				'emp_id' => $emp_id,
				'org_id' => $org_id,
				'preference_right' => $data,
			);
			$this->db->where('org_id', $org_id);
			$this->db->where('emp_id', $emp_id);
			$this->db->insert('tbl_dashborad_preference', $InsertArray2);
		}else{
			// $InsertArray2 = array(
			// 	'emp_id' => $emp_id,
			// 	'org_id' => $org_id,
			// 	'preference_right' => $data,
			// );
			// $this->db->where('org_id', $org_id);
			// $this->db->where('emp_id', $emp_id);
			// $this->db->update('tbl_dashborad_preference', $InsertArray2);
			$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_right` = concat(preference_right,'$data') WHERE `org_id`='$org_id' and `emp_id`='$emp_id'"); 

		}
	}

	public function get_preference()
	{
		$org_id = $this->session->org_id;
		$this->db->where("org_id", $org_id);
		$res = $this->db->get("tbl_dashborad_preference")->row();

		$left = $res->preference_left;
		$right = $res->preference_right;

		$dbpreference = array(
			'left' => $left,
			'right' => $right,
		);
		//print_r($arrayName);
		return $dbpreference;
	}

	public function count_primarycustomer(){
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('cust_type', 'primary');
        $primarycount = $this->db->get('tbl_customer')->result();
		$pcount = array(
			'pcount' => count($primarycount)
		);
        return $pcount;
    }

    public function count_secondarycustomer(){
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('cust_type', 'secondary');
        $secondarycount = $this->db->get('tbl_customer')->result();
		$scount = array(
			'scount' => count($secondarycount)
		);
        return $scount;
    }

	public function count_all(){
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $allcount = $this->db->get('tbl_customer')->result();
		$allcount = array(
			'tcount' => count($allcount)
		);
		
        return $allcount;
    }

	

	public function GetNotes()
	{
		$this->db->where("emp_id", $this->session->id);
		return $this->db->get("tbl_notes")->result();
	}

	public function eventdata($schedule_id)
	{
		$this->db->where("tbl_schedule.schedule_id", $schedule_id);
		$this->db->select('tbl_user_query.*,tbl_user_query.ticket_no as title,tbl_user_query.status as newstatus,tbl_schedule.*,tbl_customer.company_name,tbl_customer.contact_person_name1,tbl_admin_login.name as empname');
		$this->db->from('tbl_schedule');
		$this->db->join('tbl_user_query', 'tbl_schedule.issue_id = tbl_user_query.query_id', 'left');
		$this->db->join('tbl_customer', 'tbl_user_query.customer_id = tbl_customer.customer_id', 'left');
		$this->db->join('tbl_admin_login', 'tbl_schedule.schedule_assign_to = tbl_admin_login.id', 'left');
		return $this->db->get()->row();
	}

	public function get_profile_array()
	{
		$this->db->where("id", $this->session->id);
		return $this->db->get("tbl_admin_login")->row();
	}

	public function get_emailbody_array()
	{
		$this->db->where("email_body_id", 1);
		return $this->db->get("tbl_email_body")->row();
	}
	public function get_gst_details_array()
	{
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_org_gst_details")->result();
	}

	public function get_account_period_array()
	{
		$this->db->where("org_id", $this->session->org_id);
		$this->db->order_by('period_id', 'DESC');
		return $this->db->get("tbl_org_account_period")->result();
	}

	public function deactivate($id)
	{
		$this->db->set('status', 0);
		$this->db->where('period_id', $id);
		$this->db->update('tbl_org_account_period');
	}

	public function activate($id)
	{
		$this->db->set('status', 1);
		$this->db->where('period_id', $id);
		$this->db->update('tbl_org_account_period');
	}

	public function changestatus($id)
	{
		$this->db->set('status', 0);
		$this->db->where('org_id', $this->session->org_id);
		// $this->db->where_not('period_id', $id);
		$this->db->update('tbl_org_account_period');

		$this->db->set('status', 1);
		$this->db->where('period_id', $id);
		$this->db->update('tbl_org_account_period');
	}

	public function savereport_preference($report_id,$emp_id)
	{
		$org_id = $this->session->org_id;
		// $check = $this->db->query("SELECT * FROM `tbl_dashborad_preference` WHERE `preference_left` like '%$report_id%' AND `emp_id` = '$emp_id'")->result();
		$check = $this->db->query("SELECT * FROM `tbl_dashborad_preference` WHERE  `emp_id` = '$emp_id'")->result();
        
		if($check)
		{
			// $this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_left` = REPLACE(`preference_left`, '$report_id', '$report_id')"); 
			$left = $this->db->query("SELECT preference_left FROM `tbl_dashborad_preference` WHERE  `emp_id` = '$emp_id'")->result();
			$list_left = $left[0]->preference_left;
			$str_arr_left = preg_split ("/\,/", $list_left);
			$left_nonEmpty = array_filter($str_arr_left);
			$left_count = count($left_nonEmpty);  
			
			$right = $this->db->query("SELECT preference_right FROM `tbl_dashborad_preference` WHERE  `emp_id` = '$emp_id'")->result();
			$list_right= $right[0]->preference_right;
			$str_arr_right = preg_split ("/\,/", $list_right);
			$right_nonEmpty = array_filter($str_arr_right);
			$right_count = count($right_nonEmpty);  
	
			if($left_count == $right_count)
			{
				$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_left` = concat(preference_left,'$report_id')"); 
	
			}
			if($left_count > $right_count)
			{
				$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_right` = concat(preference_right,'$report_id')"); 
			}

			if($left_count < $right_count)
			{
				$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_left` = concat(preference_left,'$report_id')"); 
			}

		}
		else
		{
			$data = array(
				'org_id' => $org_id,
				'emp_id' => $emp_id,
				'preference_left' => $report_id
			);
			$this->db->insert('tbl_dashborad_preference',$data);
			// $this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_right` = concat(preference_right,'$report_id')");
		}	
		return true;
	}

	public function deletereport_preference($report_id,$emp_id)
	{
		$check = $this->db->query("SELECT * FROM `tbl_dashborad_preference` WHERE `preference_left` like '%$report_id%' AND `emp_id` = '$emp_id'")->result();

		if($check){
			$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_left` = REPLACE (`preference_left` , '$report_id' ,'') WHERE `preference_left` LIKE '%$report_id%'");
		}
		else{
			$this->db->query("UPDATE `tbl_dashborad_preference` SET `preference_right` = REPLACE (`preference_right` , '$report_id' ,'') WHERE `preference_right` LIKE '%$report_id%'");
		}
		return true;
	}

	public function addreport($report_id,$emp_id)
	{
		// $check = $this->db->query("SELECT * FROM `tbl_report_preference` WHERE `report_preference` like '%$report_id%' AND `emp_id` = '$emp_id'")->result();
		$check = $this->db->query("SELECT * FROM `tbl_report_preference` WHERE  `emp_id` = '$emp_id'")->result();
        
		if($check)
		{
			// $this->db->query("UPDATE `tbl_report_preference` SET `report_preference` = REPLACE (`report_preference` , '$report_id' ,'') WHERE `report_preference` LIKE '%$report_id%'");
			$this->db->query("UPDATE `tbl_report_preference` SET `report_preference` = concat(report_preference, '$report_id')");

		}
		else
		{
			$data = array(
				'emp_id' => $emp_id,
				'report_preference' => $report_id
			);
			$this->db->insert('tbl_report_preference',$data);
			//$this->db->query("UPDATE `tbl_report_preference` SET `report_preference` = concat(report_preference, '$report_id')");
		}
	}

	public function deletereport($report_id,$emp_id)
	{
		$check = $this->db->query("SELECT * FROM `tbl_report_preference` WHERE `report_preference` like '%$report_id%' AND `emp_id` = '$emp_id'")->result();

		if($check){
			$this->db->query("UPDATE `tbl_report_preference` SET `report_preference` = REPLACE (`report_preference` , '$report_id' ,'') WHERE `report_preference` LIKE '%$report_id%'");
		}
		else{
			$this->db->query("UPDATE `tbl_report_preference` SET `report_preference` = REPLACE (`report_preference` , '$report_id' ,'') WHERE `report_preference` LIKE '%$report_id%'");
		}
	}

	public function showallreports($emp_id)
	{
		$reports = $this->db->query("SELECT `report_preference` FROM `tbl_report_preference` WHERE `emp_id`='$emp_id'")->row();
		$allreport = array(
			'report_preference' => $reports
		);
		return $allreport;
	}

	public function edit_mastergroup($id)
	{
		$this->db->where("period_id", $id);
		return $this->db->get("tbl_org_account_period");
	}
	public function updateAccountPeriod($formdata)
	{
		$start_date1 = str_replace(',', ' ', $formdata['start_date_edit']);
		$start_date = date("Y-m-d", strtotime($start_date1));

		$end_date1 = str_replace(',', ' ', $formdata['end_date_edit']);
		$end_date = date("Y-m-d", strtotime($end_date1));

		$InsertArray = array(
			'short_year' => $formdata['short_year'],
			'period_name' => $formdata['period_name_edit'],
			'start_date' => $start_date,
			'end_date' => $end_date,
		);
		
		$this->db->where("period_id", $formdata['edit_id']);
		return $this->db->update("tbl_org_account_period", $InsertArray);
	}
	public function getDesignation($id)
	{
		$designation = '<option value="">Select Designation</option>';
		$Designation = $this->db->query('SELECT * FROM `tbl_designation` WHERE delete_status = 0 AND department_id = '.$id.'')->result_array();
		foreach ($Designation as $desg) {
			$designation .= '<option value="'.$desg['deg_id'].'">'.$desg['designation_name'].'</option>';
		}
		return $designation;
	}
	public function get_organsation_email_array()
	{
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_org_email_configuration")->row();
	}

	public function get_organsation_array()
	{
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_organisation")->row();
	}

	public function get_user_array()
	{
		$this->db->select('tbl_admin_login.profile_img');
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_admin_login")->row();
	}

	public function get_section_array()
	{
		$this->db->where('status', 1);
		$this->db->where('display_status', 1);
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_section_details")->result();
	}

	public function getLastRecord($table_name, $column_name)
	{
		return $last_row = $this->db->select($column_name . ' AS last_id ')->where('org_id', $_SESSION['org_id'])->order_by($column_name, "desc")->limit(1)->get($table_name)->row();
	}

	public function update_change_image($store_file, $user_id)
	{
		// echo $user_id;
		$this->db->query(" UPDATE `tbl_admin_login` SET profile_img='$store_file' where id='$user_id'  ");
		return true;
	}

	public function get_financial_detail_array()
	{
		$this->db->where('status', 1);
		$this->db->where("org_id", $this->session->org_id);
		return $this->db->get("tbl_org_account_period")->row();
	}
	public function ScheduleSummary($startdate, $enddate)
	{
		$org_id = $this->session->org_id;
		$assign_to = $_SESSION['id'];

		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}



		$res1 = $this->db->query(" SELECT count(`query_id`) as  TodayCount FROM `tbl_user_query` WHERE DATE(`created_date`) = CURDATE() and org_id='$org_id' $filter_data  ")->row();
		$TodayCount = $res1->TodayCount;

		$res2 = $this->db->query(" SELECT count(`query_id`) as MonthCount FROM `tbl_user_query` WHERE MONTH(created_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data  ")->row();
		$MonthCount = $res2->MonthCount;

		$res3 = $this->db->query("SELECT count(`query_id`) as YearCount  FROM `tbl_user_query` WHERE  YEAR(created_date) = YEAR(CURRENT_DATE()) and org_id='$org_id' $filter_data  ")->row();
		$YearCount = $res3->YearCount;

		// $res4 = $this->db->query(" SELECT  count(`query_id`) as Allcount FROM `tbl_user_query`  where org_id='$org_id' $filter_data and `assign_date` >= '$sdate' and `assign_date` <= '$edate' ")->row();
		$res4 = $this->db->query(" SELECT  count(`query_id`) as Allcount FROM `tbl_user_query`  where status = 'completed' and org_id='$org_id' $filter_data or status = 'in_complete' and org_id='$org_id' $filter_data or status = 'pending'and org_id='$org_id' $filter_data or status = 'in_progress' and org_id='$org_id' $filter_data ")->row();
		$All = $res4->Allcount;
		
		// $res5 = $this->db->query(" SELECT  count(`query_id`) as Completed FROM `tbl_user_query` WHERE status='completed' and org_id='$org_id' $filter_data  and `assign_date` >= '$sdate' and `assign_date` <= '$edate'  ")->row();
		$res5 = $this->db->query(" SELECT  count(`query_id`) as Completed FROM `tbl_user_query` WHERE status='completed' and org_id='$org_id' $filter_data ")->row();
		$Completed = $res5->Completed;

		$res6 = $this->db->query(" SELECT  count(`query_id`) as Pending FROM `tbl_user_query` WHERE status='pending' and org_id='$org_id' $filter_data ")->row();
		// $res6 = $this->db->query(" SELECT  count(`query_id`) as Pending FROM `tbl_user_query` WHERE status='pending' and org_id='$org_id' $filter_data and `assign_date` >= '$sdate' and `assign_date` <= '$edate' ")->row();
		$Pending = $res6->Pending;

		$res7 = $this->db->query(" SELECT  count(`query_id`) as Incompleted FROM `tbl_user_query` WHERE status='in_complete' and org_id='$org_id' $filter_data ")->row();
		// $res7 = $this->db->query(" SELECT  count(`query_id`) as Incompleted FROM `tbl_user_query` WHERE status='incompleted' and org_id='$org_id' $filter_data and `assign_date` >= '$sdate' and `assign_date` <= '$edate'  ")->row();
		$Incompleted = $res7->Incompleted;

		$res8 = $this->db->query(" SELECT  count(`query_id`) as Inprogress FROM `tbl_user_query` WHERE status='in_progress' and org_id='$org_id' $filter_data ")->row();
		// $res7 = $this->db->query(" SELECT  count(`query_id`) as Incompleted FROM `tbl_user_query` WHERE status='incompleted' and org_id='$org_id' $filter_data and `assign_date` >= '$sdate' and `assign_date` <= '$edate'  ")->row();
		$Inprogress = $res8->Inprogress;

		$arrayName = array(
			'TodayCount' => $TodayCount,
			'MonthCount' => $MonthCount,
			'YearCount' => $YearCount,
			'All' => $All,
			'Completed' => $Completed,
			'Pending' => $Pending,
			'Incompleted' => $Incompleted,
			'Inprogress' =>$Inprogress
		);
		//print_r($arrayName);
		return $arrayName;
	}
	// Changed by arbaz 21 june 2021 
	public function get_start_enddate_array()
	{
		$org_id = $this->session->org_id;
		$status = "1";
		$this->db->where("org_id", $this->session->org_id);
		$this->db->where("status", 1);
		$sedate =  $this->db->get("tbl_org_account_period")->row();
		
		//$sedate =  $this->db->query("SELECT `start_date`,`end_date` FROM `tbl_org_account_period` WHERE `org_id`= $org_id AND `status`= $status")->row();

		$start_date = $sedate->start_date;
		$end_date = $sedate->end_date;

		$arrayName = array(
			'start_date' => $start_date,
			'end_date' => $end_date
		);
		//print_r($arrayName);
		return $arrayName;
	}

	public function OrderSummary()
	{
		$org_id = $this->session->org_id;

		// if($_SESSION['user_type']=='SA')
		// {
		//     $filter_data = " " ;
		// }
		// else
		// {
		// 	$filter_data = " and  " ;	          
		// }

		$res1 = $this->db->query(" SELECT count(`order_id`) as  TodayCount FROM `tbl_order` WHERE DATE(`created_date`) = CURDATE() and org_id='$org_id'   ")->row();
		$TodayCount = $res1->TodayCount;

		$res2 = $this->db->query(" SELECT count(`order_id`) as MonthCount FROM `tbl_order` WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) and org_id='$org_id'   ")->row();
		$MonthCount = $res2->MonthCount;

		$res3 = $this->db->query("SELECT count(`order_id`) as YearCount  FROM `tbl_order` WHERE  YEAR(created_date) = YEAR(CURRENT_DATE()) and org_id='$org_id'  ")->row();
		$YearCount = $res3->YearCount;

		$res4 = $this->db->query(" SELECT  count(`order_id`) as Booked FROM `tbl_order` WHERE order_status_id=3 and org_id='$org_id'   ")->row();
		$Booked = $res4->Booked;

		$res5 = $this->db->query(" SELECT  count(`order_id`) as Processed FROM `tbl_order` WHERE order_status_id=4  and org_id='$org_id'  ")->row();
		$Processed = $res5->Processed;

		$res6 = $this->db->query(" SELECT  count(`order_id`) as Shipped FROM `tbl_order` WHERE order_status_id=5  and org_id='$org_id'   ")->row();
		$Shipped = $res6->Shipped;

		$res7 = $this->db->query(" SELECT  count(`order_id`) as Completed FROM `tbl_order` WHERE order_status_id=6 and org_id='$org_id'   ")->row();
		$Completed = $res7->Completed;

		$res8 = $this->db->query(" SELECT  count(`order_id`) as Canceled FROM `tbl_order` WHERE order_status_id=7 and org_id='$org_id'   ")->row();
		$Canceled = $res8->Canceled;

		$arrayName = array(
			'TodayCount' => $TodayCount,
			'MonthCount' => $MonthCount,
			'YearCount' => $YearCount,
			'Booked' => $Booked,
			'Processed' => $Processed,
			'Shipped' => $Shipped,
			'Completed' => $Completed,
			'Canceled' => $Canceled
		);
		return $arrayName;
	}

	public function TargetSummary()
	{
		$finalArray = array();
		$this->db->where('org_id', $this->session->org_id);
		$this->db->where("status", 1);
		$this->db->where('delete_status', 0);
		$this->db->order_by("target_type", 'ASC');
		$Target = $this->db->get("tbl_target_type")->result();

		foreach ($Target as  $res) {
			$targettype_id = $res->targettype_id;
			$TargetValue = $this->db->query("SELECT `target_value` FROM `tbl_target` WHERE MONTH(date_created) = MONTH(CURRENT_DATE()) AND `targettype_id` = '$targettype_id'   ")->result();
			$Totalvalue = 0;
			foreach ($TargetValue as  $val) {
				$Totalvalue = $Totalvalue + $val->target_value;
			}

			$AchieveValue = $this->db->query("SELECT `targettype_value` FROM `tbl_target_achieve_list` WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND `targettype_id` = '$targettype_id'  ")->result();
			$TotalAchieveValue = 0;
			foreach ($AchieveValue as  $achieve) {
				//$TotalAchieveValue = $TotalAchieveValue + $achieve->targettype_value;
			}
			$Balance = $Totalvalue - $TotalAchieveValue;

			$NewArray = array(
				'target_type' => $res->target_type,
				'TargetValue' => $Totalvalue,
				'TotalAchieveValue' => $TotalAchieveValue,
				'Balance' => $Balance,
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}


	public function LeadsOveallSummary()
	{
		$org_id = $this->session->org_id;
		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  TodayCount FROM `tbl_leads_opportunity` WHERE DATE(`created_date`) = CURDATE()  and org_id='$org_id' $filter_data   ")->row();

		$res2 = $this->db->query(" SELECT count(`leadopp_id`) as WeekCount FROM `tbl_leads_opportunity` WHERE WEEK(created_date) = WEEK(CURRENT_DATE())  and org_id='$org_id' $filter_data ")->row();

		$res3 = $this->db->query("SELECT count(`leadopp_id`) as MonthCount  FROM `tbl_leads_opportunity` WHERE  MONTH(created_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data ")->row();

		$res4 = $this->db->query(" SELECT  count(`leadopp_id`) as total FROM `tbl_leads_opportunity` where  org_id='$org_id' $filter_data ")->row();

		$res5 = $this->db->query(" SELECT  count(`leadopp_id`) as closuremonth FROM `tbl_leads_opportunity`  WHERE  MONTH(closure_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data   ")->row();

		$res6 = $this->db->query("  SELECT  SUM(`project_business_value`) as salesmonth FROM `tbl_leads_opportunity`  WHERE  MONTH(closure_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data  ")->row();

		if (empty($res6->salesmonth)) {
			$res6->salesmonth = 0;
		}
		return array(
			'today' => $res1->TodayCount,
			'weekcount' => $res2->WeekCount,
			'monthcount' => $res3->MonthCount,
			'total' => $res4->total,
			'closuremonth' => $res5->closuremonth,
			'salesmonth' => $res6->salesmonth
		);
	}

	public function LeadsBySourceSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('source_id, source_title');
		$this->db->where('status', 1);
		$this->db->where("delete_status", 0);
		$this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('source_id','asc');

		$source = $this->db->get('tbl_source')->result();
		foreach ($source as  $res) {
			$source_id = $res->source_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  SourceCount FROM `tbl_leads_opportunity` WHERE  source='$source_id' $filter_data and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate'  ")->row();
			$NewArray = array(
				'sourcecount' => $res1->SourceCount,
				'sourcetitle' => $res->source_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function LeadcountountBySourceSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('source_id, source_title');
		$this->db->where('status', 1);
		$this->db->where("delete_status", 0);
		$this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('source_id','asc');

		$source = $this->db->get('tbl_source')->result();
		foreach ($source as  $res) {
			$source_id = $res->source_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  LeadCount FROM `tbl_leads_opportunity` WHERE  source='$source_id'  and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Lead' ")->row();
			$NewArray = array(
				'sourcecount' => $res1->LeadCount,
				'sourcetitle' => $res->source_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function OppCountBySourceSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('source_id, source_title');
		$this->db->where('status', 1);
		$this->db->where("delete_status", 0);
		$this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('source_id','asc');

		$source = $this->db->get('tbl_source')->result();
		foreach ($source as  $res) {
			$source_id = $res->source_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  OppCount FROM `tbl_leads_opportunity` WHERE  source='$source_id' $filter_data and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Opportunity' ")->row();
			$NewArray = array(
				'sourcecount' => $res1->OppCount,
				'sourcetitle' => $res->source_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function LeadsByOwnerSummary()
	{
	
		// if(!empty($startdate))
		// {
		// 	$sdate = $startdate;
		// }
		// else
		// {
		// 	$sdate = date('Y-m-d H:i:s');
		// }

		// if(!empty($enddate))
		// {
		// 	$edate = $enddate;
		// }
		// else
		// {
		// 	$edate = date('Y-m-d H:i:s');
		// }
		$sdate=date("2018-m-01");
	    $edate=date("Y-m-d");

		
		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
		} else {
			$this->db->where('id', $assign_to);
		}

		$finalArray = array();
		$this->db->select('id, name');
		$this->db->where('user_status', 1);
		$this->db->where('user_type', 'E');
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('id','asc');
		$Owner = $this->db->get('tbl_admin_login')->result();
		foreach ($Owner as  $res) {
			$created_by = $res->id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  OwnerCount FROM `tbl_leads_opportunity` WHERE  created_by='$created_by' and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' ")->row();
			$NewArray = array(
				'OwnerCount' => $res1->OwnerCount,
				'name' => $res->name
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function LeadscountByOwnerSummary()
	{
	
		// if(!empty($startdate))
		// {
		// 	$sdate = $startdate;
		// }
		// else
		// {
		// 	$sdate = date('Y-m-d H:i:s');
		// }

		// if(!empty($enddate))
		// {
		// 	$edate = $enddate;
		// }
		// else
		// {
		// 	$edate = date('Y-m-d H:i:s');
		// }
		$sdate=date("2018-m-01");
	    $edate=date("Y-m-d");

		
		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
		} else {
			$this->db->where('id', $assign_to);
		}

		$finalArray = array();
		$this->db->select('id, name');
		$this->db->where('user_status', 1);
		$this->db->where('user_type', 'E');
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('id','asc');
		$Owner = $this->db->get('tbl_admin_login')->result();
		foreach ($Owner as  $res) {
			$created_by = $res->id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  OwnerCount FROM `tbl_leads_opportunity` WHERE  created_by='$created_by' and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Lead' ")->row();
			$NewArray = array(
				'OwnerCount' => $res1->OwnerCount,
				'name' => $res->name
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function OpportunitycountByOwnerSummary()
	{
	
		// if(!empty($startdate))
		// {
		// 	$sdate = $startdate;
		// }
		// else
		// {
		// 	$sdate = date('Y-m-d H:i:s');
		// }

		// if(!empty($enddate))
		// {
		// 	$edate = $enddate;
		// }
		// else
		// {
		// 	$edate = date('Y-m-d H:i:s');
		// }
		$sdate=date("2018-m-01");
	    $edate=date("Y-m-d");

		
		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
		} else {
			$this->db->where('id', $assign_to);
		}

		$finalArray = array();
		$this->db->select('id, name');
		$this->db->where('user_status', 1);
		$this->db->where('user_type', 'E');
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('id','asc');
		$Owner = $this->db->get('tbl_admin_login')->result();
		foreach ($Owner as  $res) {
			$created_by = $res->id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  OwnerCount FROM `tbl_leads_opportunity` WHERE  created_by='$created_by' and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Opportunity' ")->row();
			$NewArray = array(
				'OwnerCount' => $res1->OwnerCount,
				'name' => $res->name
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}


	public function LeadsByStagesSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('stage_id, stage_title');
		$this->db->where('status', 1);
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('stage_id','asc');
		$Stage = $this->db->get('tbl_stage')->result();
		foreach ($Stage as  $res) {
			$stage_id = $res->stage_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  StageCount FROM `tbl_leads_opportunity` WHERE  stage='$stage_id' $filter_data and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' ")->row();
			$NewArray = array(
				'StageCount' => $res1->StageCount,
				'stage_title' => $res->stage_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function LeadscountByStagesSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('stage_id, stage_title');
		$this->db->where('status', 1);
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('stage_id','asc');
		$Stage = $this->db->get('tbl_stage')->result();
		foreach ($Stage as  $res) {
			$stage_id = $res->stage_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  StageCount FROM `tbl_leads_opportunity` WHERE  stage='$stage_id' $filter_data and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Lead' ")->row();
			$NewArray = array(
				'StageCount' => $res1->StageCount,
				'stage_title' => $res->stage_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}

	public function OpportunitycountByStagesSummary($startdate, $enddate)
	{
		if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d H:i:s');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d H:i:s');
		}

		$assign_to = $_SESSION['id'];
		if ($_SESSION['user_type'] == 'SA') {
			$filter_data = " ";
		} else {
			$filter_data = " and assign_to='$assign_to'  ";
		}

		$finalArray = array();
		$this->db->select('stage_id, stage_title');
		$this->db->where('status', 1);
		$this->db->where('org_id', $this->session->org_id);
		$this->db->order_by('stage_id','asc');
		$Stage = $this->db->get('tbl_stage')->result();
		foreach ($Stage as  $res) {
			$stage_id = $res->stage_id;
			$res1 = $this->db->query(" SELECT count(`leadopp_id`) as  StageCount FROM `tbl_leads_opportunity` WHERE  stage='$stage_id' $filter_data and `assign_datetime` >= '$sdate' and `assign_datetime` <= '$edate' and `customer_type` = 'Opportunity' ")->row();
			$NewArray = array(
				'StageCount' => $res1->StageCount,
				'stage_title' => $res->stage_title
			);
			array_push($finalArray, $NewArray);
		}
		return $finalArray;
	}


	//Get all user summary ------------------------------------
	public function summary()
	{
		$org_id = $this->session->org_id;
		$res1 = $this->db->query(" SELECT count(`id`) as  usercount FROM `tbl_admin_login` WHERE `user_type`='E' and org_id='$org_id' ")->row();
		$totalusercount = $res1->usercount;
		$res2 = $this->db->query(" SELECT count(`customer_id`) as custcount FROM `tbl_customer` WHERE `delete_status`='0'  and org_id='$org_id' ")->row();
		$custcount = $res2->custcount;
		$res3 = $this->db->query("SELECT count(`query_id`) as issuecount  FROM `tbl_user_query` WHERE org_id='$org_id'  ")->row();
		$issuecount = $res3->issuecount;
		$res4 = $this->db->query(" SELECT  count(`order_id`) as ordercount FROM `tbl_order`  WHERE org_id='$org_id' ")->row();
		$ordercount = $res4->ordercount;

		$arrayName = array(
			'totalusercount' => $totalusercount,
			'custcount' => $custcount,
			'issuecount' => $issuecount,
			'ordercount' => $ordercount
		);
		return $arrayName;
	}
	//-----------------------------------------------------------

	public function pending_userrewards()
	{
		$country_code = $this->country_code['country_code'];
		return $this->db->query("
								  	SELECT  tbl_register.firstname,tbl_register.lastname,tbl_register.email,tbl_register.image_url,tbl_retailer.name,tbl_retailer.logo_small,tbl_retailer.user_reward
									FROM  `tbl_retailer` 
									INNER JOIN tbl_register
									ON tbl_retailer.created_by=tbl_register.user_id
									WHERE  tbl_retailer.user_reward =  'claim' and tbl_retailer.country_code='$country_code'
                     	  	  ");
	}

	//------------------GeofenceNotification -----------------------------------------

	public function GeofenceNotification()
	{

		// $this->db->where('org_id',$this->session->org_id);
		// $Result=$this->db->get('tbl_admin_login')->result();

		$date_created = date("Y-m-d");
		return $this->db->query("
						  	SELECT  tbl_customer.company_name,tbl_admin_login.name,tbl_admin_login.profile_img,tbl_user_geofence_notification.*
							FROM  `tbl_user_geofence_notification` 
							INNER JOIN tbl_customer
							ON tbl_user_geofence_notification.customer_id=tbl_customer.customer_id
							INNER JOIN tbl_admin_login
							ON tbl_user_geofence_notification.user_id=tbl_admin_login.id
							WHERE DATE(date_created)='$date_created' 
                       ")->result();
	}


	//------------------GeofenceNotification -----------------------------------------

	public function ExpirationMailSend()
	{
		$this->db->where('status', 1);
		$this->db->where('mail_status', 0);
		$Result = $this->db->get('tbl_plan_subscription')->result();

		$email_config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.buroforce.com',
			'smtp_port' => '465',
			'smtp_user' => 'support@buroforce.com',
			'smtp_pass' => 'Bur@@ForCe$$2019',
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n"
		);

		$sub = 'Buroforce - Plan Renewal';
		$from = 'support@buroforce.com';

		foreach ($Result as $row) {
			//---------------------------------------------------------------------------------
			$org_id = $row->org_id;
			$this->db->where('org_id', $org_id);
			$organisation = $this->db->get('tbl_organisation')->row();

			$to = $organisation->org_email;
			$exp_date = date("d F, Y", strtotime($row->subscription_end_date));

			$msg = "<html><table>

	                      <tr>
	                          <td>&nbsp;</td>
	                       </tr>
	                     <tr>
	                          <td>Hi '" . $organisation->org_cname . "'  ,</td>
	                      </tr>
	                      <tr>
	                          <td>&nbsp;</td>
	                       </tr>
	                        <tr>
	                           <td>
	                             <b> Buroforce Plan Renewal</b>
	                          </td>
	                       </tr>

	                        <tr>
	                           <td>
	                             
This is a reminder that your buroorce plan subscription  expired on '" . $exp_date . "' and you are now within your membership grace period.
	                          </td>
	                       </tr>

	                       <tr>
	                       <td>
                             If you’re still deciding whether or not to renew, or just haven’t gotten around to it yet, please let us remind you of what you’ll be missing if you do not renew
	                       </td>
	                       </tr>

	                         <tr>
	                          <td>&nbsp;</td>
	                         </tr>

	                        <tr>
	                          <td colspan='2'><strong><em>Warm Regards</em></strong></td>
	                        </tr>
	                        <tr>
	                          <td colspan='2'><strong>Buroforce Team</strong></td>
	                        </tr>
	                     <tr>
	                        <td >&nbsp;</td>
	                     </tr>
	                  </table></html>";

			$this->load->library('email', $email_config);
			$this->email->from($from, 'Buroforce');
			$this->email->to($to);
			$this->email->cc('mustafa.kothawala@gmail.com');
			$this->email->subject($sub);
			$this->email->message($msg);
			$this->email->set_mailtype("html");

			if ($this->email->send()) {
				$this->db->where("org_id", $row->org_id);
				$this->db->SET("mail_status", 1);
				$this->db->update('tbl_plan_subscription');
			}
		}
	}

	public function SubscriptionData($org_id)
	{
		$this->db->join('tbl_plan_master', 'tbl_plan_master.plan_id = tbl_plan_subscription.plan_id');
		$this->db->where('tbl_plan_subscription.org_id', $org_id);
		$data = $this->db->get('tbl_plan_subscription')->result_array();

		foreach ($data as $value) {
			// $this->db->where_in('module_id',explode(',',$value['module_id']));
			// $module_data = $this->db->get('tbl_modules')->result_array();
			$this->db->where('org_id', $value['org_id']);
			$organisation = $this->db->get('tbl_organisation')->row();

			$NewArray = array(
				'subscription_start_date' => $value['subscription_start_date'],
				'subscription_end_date' => $value['subscription_end_date'],
				'no_of_user' => $value['no_of_user'],
				'plan_name' => $value['plan_name'],
				'plan_price' => $value['plan_price'],
				'org_cname' => $organisation->org_cname,
				'org_fname' => $organisation->org_fname,
				'org_lname' => $organisation->org_lname,
				'org_email' => $organisation->org_email,
				'org_contact' => $organisation->org_contact,
				'subscription_type' => $organisation->subscription_type,
			);
		}
		return $NewArray;
	}

	//sent by sunil pasted by arbaz
	public function TodaysActivityCount()
	{
		$finalArray = array();
		$this->db->where('org_id', $this->session->org_id);
		$this->db->where('delete_status', 0);
		$scheduleTypeData = $this->db->get('tbl_schedule_type_name')->result();

		$date = date('Y-m-d');
		$s_date = $date . ' 00:00:00';
		$e_date = $date . ' 23:59:59';

        if ($this->session->user_type == 'E') {
			$this->db->where("schedule_assign_to", $this->session->id);
			// $this->db->where("created_by", $this->session->id);
		}
		$this->db->where('org_id', $this->session->org_id);
		$this->db->where('created_date >= ', $s_date);
		$this->db->where('created_date <= ', $e_date);
		$ActivityData_total = $this->db->get('tbl_schedule')->result_array();

		foreach ($scheduleTypeData as $value) {
			if ($this->session->user_type == 'E') {
				$this->db->where("schedule_assign_to", $this->session->id);
				// $this->db->where("created_by", $this->session->id);
			}
			$this->db->where('org_id', $this->session->org_id);
			$this->db->where('schedule_type_id', $value->id);
			$this->db->where('created_date >= ', $s_date);
			$this->db->where('created_date <= ', $e_date);
			$ActivityData = $this->db->get('tbl_schedule')->result_array();

			if (empty($ActivityData)) {
				$ActivityCount = 0;
			} else {
				$ActivityCount = count($ActivityData);
			}

			$data = array(
				'type' => $value->type_name,
				'count' => $ActivityCount,
				'total_count' => count($ActivityData_total)
			);
			array_push($finalArray, $data);
		}
		return $finalArray;
	}
	public function get_role_details_array()
	{
	    return $this->db->select('*')->from('tbl_role')->where('org_id',$this->session->org_id)->where('status',0)->get()->result();
	}

	public function addCompany_rolewise_details($data)
	{
		$this->db->Insert("tbl_company_rolewise_details", $data);
	}

	public function get_company_details()
	{
		$query = $this->db->select('*')->from('tbl_company_rolewise_details')->where('org_id',$this->session->org_id)->where('status',0)->order_by('id','DESC')->get()->result();
		return $query;
	}

	public function getDataCompany($id)
	{
		$this->db->where('id', $id);
        return $this->db->get("tbl_company_rolewise_details")->result_array();
	}

	public function Update_company_details($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update("tbl_company_rolewise_details", $data);
	}

	public function Delete_company_details($id)
	{
		$this->db->set('status',1);
		$this->db->where('id', $id);
		$this->db->update("tbl_company_rolewise_details");
	}

	public function get_emp_profile_array()
	{
		$this->db->where("id", $this->session->id);
		$org_id = $this->db->select('org_id')->from('tbl_admin_login')->where("id", $this->session->id)->get()->row()->org_id;
		return $this->db->select('*')->from('tbl_admin_login')->where("org_id", $org_id)->where('user_type','SA')->get()->row();
	}

	public function get_company_details_rolewise()
	{
		$this->db->where("id", $this->session->id);
		$role_id = $this->db->select('role_id')->from('tbl_admin_login')->where("id", $this->session->id)->get()->row()->role_id;
		$query = $this->db->select('*')->from('tbl_company_rolewise_details')->where('org_id',$this->session->org_id)->where('role_id',$role_id)->or_where('role_id','all')->where('status',0)->order_by('id','DESC')->get()->result();
        
		return $query;
	}

	public function birthday_list()
	{
		$current_date = date('d');
		$current_month = date('m');
		$final_array = array();
		$query1 = $this->db->select('*')->from('tbl_admin_login')->where('DAY(dob)',$current_date)->where('MONTH(dob)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
		foreach($query1 as $row1)
		{
			$new_array=array(
				'name'=>$row1->name, 
				'dob'=>$row1->dob, 
				'email'=>$row1->email,
				'department'=>$row1->department,
				'role_id'=>$row1->role_id,
				'id' => $row1->id
			);
            array_push($final_array,$new_array);    
		}
		// $query2 = $this->db->select('*')->from('tbl_customer')->where('DAY(dob)',$current_date)->where('MONTH(dob)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
		// foreach($query2 as $row2)
		// {
		// 	$new_array1=array(
		// 		'name'=>$row2->contact_person_name1, 
		// 		'dob'=>$row2->dob, 
		// 		'email'=>$row2->email, 
		// 		'department'=>'',
		// 		'role_id'=>'',
		// 		'id' => $row2->customer_id
		// 	);
        //     array_push($final_array,$new_array1);    
		// }
		return $final_array;
	}
	public function marriage_anniversary_list()
	{
		$current_date = date('d');
		$current_month = date('m');
		$final_array = array();
		$query1 = $this->db->select('*')->from('tbl_admin_login')->where('DAY(marriage_anniversary_date)',$current_date)->where('MONTH(marriage_anniversary_date)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
		foreach($query1 as $row1)
		{
			$new_array=array(
				'name'=>$row1->name, 
				'marriage_anniversary_date'=>$row1->marriage_anniversary_date, 
				'email'=>$row1->email,
				'id' => $row1->id 
			);
            array_push($final_array,$new_array);    
		}
		// $query2 = $this->db->select('*')->from('tbl_customer')->where('DAY(marriage_anniversary)',$current_date)->where('MONTH(marriage_anniversary)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
		// foreach($query2 as $row2)
		// {
		// 	$new_array1=array(
		// 		'name'=>$row2->contact_person_name1, 
		// 		'marriage_anniversary_date'=>$row2->marriage_anniversary, 
		// 		'email'=>$row2->email,
		// 		'id' => $row22->customer_id 
		// 	);
        //     array_push($final_array,$new_array1);    
		// }
		return $final_array;
	}
	public function company_anniversary_list()
	{
		$current_date = date('d');
		$current_month = date('m');
		$query = $this->db->select('*')->from('tbl_customer')->where('DAY(company_anniversary)',$current_date)->where('MONTH(company_anniversary)',$current_month)->where('org_id',$this->session->org_id)->get()->result();
		return $query;
	}
}
