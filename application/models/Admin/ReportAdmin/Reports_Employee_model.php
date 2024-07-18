

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports_Employee_model extends CI_Model
{

    public function AvailableTimeSlots()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date = date("Y-m-d");
        $end_date = date("Y-m-d");

        $start_time = '10:00:00';
        $end_time = date("H:i:s");

        $this->db->select("id,name,email,mobile_no");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date=' => $start_date, 'assign_date<=' => $end_date, 'assign_starttime=' => $start_time, 'assign_endtime<=' => $end_time);
            $this->db->where($where_array);
            $schedule_query = $this->db->get("tbl_schedule")->result();
            
            if (count($schedule_query) <= 0) {
                $new_array = array(
                    'name' => $result->name,
                    'emp_id' => $result->id,
                    'email' => $result->email,
                    'mobile_no' => $result->mobile_no,
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }

    public function AvailableTimeSlotsDashboard($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");
        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

        $start_time = '10:00:00';
        $end_time = date("H:i:s");

        $this->db->select("id,name,email,mobile_no");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date=' => $start_date, 'assign_date<=' => $end_date, 'assign_starttime=' => $start_time, 'assign_endtime<=' => $end_time);
            $this->db->where($where_array);
            $schedule_query = $this->db->get("tbl_schedule")->result();
            
            if (count($schedule_query) <= 0) {
                $new_array = array(
                    'name' => $result->name,
                    'emp_id' => $result->id,
                    'email' => $result->email,
                    'mobile_no' => $result->mobile_no,
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }

    public function DateRangeAvailableTimeSlots($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));
 
        $start_time = date("H:i:s", strtotime($formdata['start_time']));
        $end_time = date("H:i:s", strtotime($formdata['end_time']));
        $EmpArray = $formdata['EmpArray'];

        // print_r($EmpArray);

        $this->db->select("id,name,email,mobile_no");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date=' => $start_date, 'assign_date<=' => $start_date, 'assign_starttime=' => $start_time, 'assign_endtime<=' => $end_time);
            $this->db->where($where_array);
            $schedule_query = $this->db->get("tbl_schedule")->result();

            if (count($schedule_query) <= 0) {
                $new_array = array(
                    'name' => $result->name,
                    'emp_id' => $result->id,
                    'email' => $result->email,
                    'mobile_no' => $result->mobile_no,
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }

    public function EmployeeTarget($startdate,$enddate)
    {
        $finalArray = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
        {
            $start_date = $startdate;
        }
        else
        {
            $start_date = date('Y-m-d');
        }

        if(!empty($enddate))
        {
            $end_date = $enddate;
        }
        else
        {
            $end_date = date('Y-m-d');
        }

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by("target_type", 'ASC');
        $Target = $this->db->get("tbl_target_type")->result();

        foreach ($Target as  $res) {
            $targettype_id = $res->targettype_id;

            // $TargetValue = $this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and `start_date` <= '$end_date'  ")->result();
            $TargetValue = $this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and `date_created` >= '$start_date' and `date_created` <= '$end_date' ")->result();

            if (count($TargetValue) > 0) {

                $Totalvalue = 0;
                foreach ($TargetValue as  $val) {
                    $employee_id = $val->employee_id;
                    $Totalvalue = $Totalvalue + $val->target_value;
                    $tr_auto_id = $val->tr_auto_id;

                    $AchieveValue = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and   employee_id='$employee_id' and tr_auto_id='$tr_auto_id'  ")->result();

                    if (count($AchieveValue) > 0) {

                        $TotalAchieveValue = 0;
                        foreach ($AchieveValue as  $achieve) {
                            $TotalAchieveValue = $TotalAchieveValue + $achieve->targettype_value;
                        }
                        $Balance = $Totalvalue - $TotalAchieveValue;

                        $this->db->select("name");
                        $this->db->where("id", $employee_id);
                        $EmpDetails = $this->db->get("tbl_admin_login")->row();

                        $NewArray = array(
                            'TargetName' => $res->target_type,
                            'employee_id' => $employee_id,
                            'targettype_id' => $res->targettype_id,
                            'TargetAmount' => $Totalvalue,
                            'target_period' => $val->target_period,
                            'TargetAchieved' => $TotalAchieveValue,
                            'TargetBalance' => $Balance,
                            'TargetDAR' => 0,
                            'emp_name' => $EmpDetails->name,
                            'TargetSdate' => $start_date,
                            'TargetEdate' => $end_date,
                        );
                        array_push($finalArray, $NewArray);
                    }
                }
            }
        }

        return $finalArray;
    }


    public function DaterangerEmployeeTarget($formdata)
    {
        $finalArray = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $ActivityArray = $formdata['ActivityArray'];
        $EmpArray = $formdata['EmpArray'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by("target_type", 'ASC');
        $this->db->where_in("targettype_id", $ActivityArray);
        $Target = $this->db->get("tbl_target_type")->result();
        foreach ($Target as  $res) {
            $targettype_id = $res->targettype_id;
            if (count($EmpArray) > 0) {
                $this->db->where('targettype_id',$targettype_id);
                $this->db->where('date_created >=',$start_date);
                $this->db->where('date_created <=',$end_date);
                $this->db->where_in("employee_id", $EmpArray);
                $TargetValue = $this->db->get("tbl_target")->result();
            } else {
                $this->db->where('targettype_id',$targettype_id);
                $this->db->where('date_created >=',$start_date);
                $this->db->where('date_created <=',$end_date);
                $TargetValue = $this->db->get("tbl_target")->result();
            }
            if (count($TargetValue) > 0) {
                $Totalvalue = 0;
                foreach ($TargetValue as  $val) {
                    $employee_id = $val->employee_id;
                    $Totalvalue = $Totalvalue + $val->target_value;
                    $tr_auto_id = $val->tr_auto_id;

                    $AchieveValue = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and   employee_id='$employee_id' and tr_auto_id='$tr_auto_id'  ")->result();
                    
                    if (count($AchieveValue) > 0) {

                        $TotalAchieveValue = 0;
                        foreach ($AchieveValue as  $achieve) {
                            $TotalAchieveValue = $TotalAchieveValue + $achieve->targettype_value;
                        }
                        $Balance = $Totalvalue - $TotalAchieveValue;

                        $this->db->select("name");
                        $this->db->where("id", $employee_id);
                        $EmpDetails = $this->db->get("tbl_admin_login")->row();

                        $NewArray = array(
                            'TargetName' => $res->target_type,
                            'employee_id' => $employee_id,
                            'targettype_id' => $res->targettype_id,
                            'TargetAmount' => $Totalvalue,
                            'target_period' => $val->target_period,
                            'TargetAchieved' => $TotalAchieveValue,
                            'TargetBalance' => $Balance,
                            'TargetDAR' => 0,
                            'emp_name' => $EmpDetails->name,
                            'TargetSdate' => $start_date,
                            'TargetEdate' => $end_date,
                        );
                        array_push($finalArray, $NewArray);
                    }
                }
            }
        }
        return $finalArray;
    }

    //-------------------------------------------------------------------

    public function EmployeewiseActivities($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->where('status', 1);
            $schedule_type_array = $this->db->get('tbl_schedule_type_name')->result();

            $schedule_array = array();
            foreach ($schedule_type_array as  $row) {
                $where_array = array('schedule_type_id' => $row->id, 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
                $this->db->where($where_array);
                // $this->db->
                $schedule_query = $this->db->get("tbl_schedule")->result();
                $activityData = $this->db->query("SELECT tbl_user_query.ticket_no,tbl_user_query.product_name,tbl_user_query.issue,tbl_user_query.status,tbl_user_query.priority,tbl_admin_login.name FROM `tbl_schedule` JOIN tbl_user_query on tbl_user_query.query_id = tbl_schedule.issue_id JOIN tbl_admin_login on tbl_admin_login.id = tbl_schedule.schedule_assign_to WHERE schedule_assign_to = $schedule_assign_to AND tbl_schedule.assign_date >= '$start_date' AND tbl_schedule.assign_date <= '$end_date' AND schedule_type_id = $row->id")->result();
                // echo "<pre>";
                // print_r($activityData);
                $array = array(
                    'id' => $row->id,
                    'type_name' => $row->type_name,
                    'type_count' => count($activityData)
                );
                array_push($schedule_array, $array);
            }

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'ActivityArray' => $schedule_array,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    
    
    public function EmployeewiseActivitiesDashboard($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->where('status', 1);
            $schedule_type_array = $this->db->get('tbl_schedule_type_name')->result();

            $schedule_array = array();
            foreach ($schedule_type_array as  $row) {
                $where_array = array('schedule_type_id' => $row->id, 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
                $this->db->where($where_array);
                $schedule_query = $this->db->get("tbl_schedule")->result();
                $activityData = $this->db->query("SELECT tbl_user_query.ticket_no,tbl_user_query.product_name,tbl_user_query.issue,tbl_user_query.status,tbl_user_query.priority,tbl_admin_login.name FROM `tbl_schedule` JOIN tbl_user_query on tbl_user_query.query_id = tbl_schedule.issue_id JOIN tbl_admin_login on tbl_admin_login.id = tbl_schedule.schedule_assign_to WHERE schedule_assign_to = $schedule_assign_to AND tbl_schedule.assign_date >= '$start_date' AND tbl_schedule.assign_date <= '$end_date' AND schedule_type_id = $row->id")->result();

                $array = array(
                    'id' => $row->id,
                    'type_name' => $row->type_name,
                    'type_count' => count($activityData)
                );
                array_push($schedule_array, $array);
            }

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'ActivityArray' => $schedule_array,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }



    public function ViewActivitiesDetailsByEmp($formdata)
    {
        $finalArray = array();
        $ids = explode('|',$formdata['ids']);
        $type_id = $ids[0];
        $emp_id = $ids[1];
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $activityData = $this->db->query("SELECT tbl_user_query.ticket_no,tbl_user_query.product_name,tbl_user_query.issue,tbl_user_query.status,tbl_user_query.priority,tbl_admin_login.name FROM `tbl_schedule` JOIN tbl_user_query on tbl_user_query.query_id = tbl_schedule.issue_id JOIN tbl_admin_login on tbl_admin_login.id = tbl_schedule.schedule_assign_to WHERE schedule_assign_to = $emp_id AND tbl_schedule.assign_date >= '$start_date' AND tbl_schedule.assign_date <= '$end_date' AND schedule_type_id = $type_id")->result_array();
        
        foreach ($activityData as $value) {
            $new_array = array(
                'ticket_no' => $value['ticket_no'],
                'product_name' => $value['product_name'],
                'issue' => $value['issue'],
                'status' => $value['status'],
                'priority' => $value['priority'],
                'name' => $value['name'],
            );
            array_push($finalArray,$new_array);
        }
        return $finalArray;
    }

    public function DaterangeEmployeewiseActivities($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));
        $ActivityArray = $formdata['ActivityArray'];
        $EmpArray = $formdata['EmpArray'];

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $this->db->where('org_id', $this->session->org_id);
            $this->db->where('delete_status', 0);
            $this->db->where('status', 1);
            $this->db->where_in("id", $ActivityArray);
            $schedule_type_array = $this->db->get('tbl_schedule_type_name')->result();

            $schedule_array = array();
            foreach ($schedule_type_array as  $row) {
                $where_array = array('schedule_type_id' => $row->id, 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
                $this->db->where($where_array);
                $schedule_query = $this->db->get("tbl_schedule")->result();
                $activityData = $this->db->query("SELECT tbl_user_query.ticket_no,tbl_user_query.product_name,tbl_user_query.issue,tbl_user_query.status,tbl_user_query.priority,tbl_admin_login.name FROM `tbl_schedule` JOIN tbl_user_query on tbl_user_query.query_id = tbl_schedule.issue_id JOIN tbl_admin_login on tbl_admin_login.id = tbl_schedule.schedule_assign_to WHERE schedule_assign_to = $schedule_assign_to AND tbl_schedule.assign_date >= '$start_date' AND tbl_schedule.assign_date <= '$end_date' AND schedule_type_id = $row->id")->result();                $array = array(
                    'id' => $row->id,
                    'type_name' => $row->type_name,
                    'type_count' => count($activityData)
                );
                array_push($schedule_array, $array);
            }
            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'ActivityArray' => $schedule_array,
            );

            array_push($final_array, $new_array);
        }

        return $final_array;
    }

    //-----------------------------------------------------------------------------------------
    
    public function EmployeewiseActivitiesMappingDashboard($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
		{
			$sdate = $startdate;
		}
		else
		{
			$sdate = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$edate = $enddate;
		}
		else
		{
			$edate = date('Y-m-d');
		}

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $sdate, 'assign_date<=' => $edate);
            $this->db->where($where_array);
            $schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array2 = array('schedule_type' => "Task", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $sdate, 'assign_date<=' => $edate);
            $this->db->where($where_array2);
            $Task_schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array3 = array('schedule_type' => "own", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $sdate, 'assign_date<=' => $edate);
            $this->db->where($where_array3);
            $Own_schedule_query = $this->db->get("tbl_schedule")->result();

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'total_issue' => count($schedule_query),
                'own_issue' => count($Own_schedule_query),
                'task_issue' => count($Task_schedule_query),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function EmployeewiseActivitiesMapping($startdate,$enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array);
            $schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array2 = array('schedule_type' => "Task", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array2);
            $Task_schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array3 = array('schedule_type' => "own", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array3);
            $Own_schedule_query = $this->db->get("tbl_schedule")->result();

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'total_issue' => count($schedule_query),
                'own_issue' => count($Own_schedule_query),
                'task_issue' => count($Task_schedule_query),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function DateRangeEmployeewiseActivitiesMapping($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));
        $ActivityArray = $formdata['ActivityArray'];
        $EmpArray = $formdata['EmpArray'];

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $schedule_assign_to = $result->id;
            $where_array = array('schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array);
            $this->db->where_in("schedule_type_id", $ActivityArray);
            $schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array2 = array('schedule_type' => "Task", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array2);
            $this->db->where_in("schedule_type_id", $ActivityArray);
            $Task_schedule_query = $this->db->get("tbl_schedule")->result();

            $where_array3 = array('schedule_type' => "own", 'schedule_assign_to' => $schedule_assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
            $this->db->where($where_array3);
            $this->db->where_in("schedule_type_id", $ActivityArray);
            $Own_schedule_query = $this->db->get("tbl_schedule")->result();


            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'total_issue' => count($schedule_query),
                'own_issue' => count($Own_schedule_query),
                'task_issue' => count($Task_schedule_query),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //-------------------------------------------------------------------
    
    public function EmployeeRevenueDashboard($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");
        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $employee_id = $result->id;
            $target = $this->db->query(" SELECT sum(target_value) as revenue FROM  tbl_target WHERE employee_id='$employee_id'  and DATE(date_created)>='$start_date' and DATE(date_created)<='$end_date' ")->row();
           
            if ($target->revenue == NULL) {
                $target->revenue = 0;
            }

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'revenue' => $target->revenue,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function EmployeeRevenue($startdate,$enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-d");
        // $end_date = date("Y-m-d");

        if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}


        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $employee_id = $result->id;
            $target = $this->db->query(" SELECT sum(target_value) as revenue FROM  tbl_target WHERE employee_id='$employee_id'  and DATE(date_created)>='$start_date' and DATE(date_created)<='$end_date' ")->row();
           
            if ($target->revenue == NULL) {
                $target->revenue = 0;
            }

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'revenue' => $target->revenue,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DateRangeEmployeeRevenue($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $EmpArray = $formdata['EmpArray'];

        $this->db->select("id,name");
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where("user_type", 'E');
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $employee_id = $result->id;
            $target = $this->db->query(" SELECT sum(target_value) as revenue FROM  tbl_target WHERE employee_id='$employee_id'  and DATE(date_created)>='$start_date' and DATE(date_created)<='$end_date' ")->row();
            if ($target->revenue == NULL) {
                $target->revenue = 0;
            }

            $new_array = array(
                'name' => $result->name,
                'emp_id' => $result->id,
                'revenue' => $target->revenue,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function FetchScheduleType($schedule_type_id)
    {
        $this->db->where('id', $schedule_type_id);
        return $this->db->get('tbl_schedule_type_name')->row();
    }


    public function ViewActivitiesDetails($formdata)
    {
        $final_array = array();
        $ids = $formdata['ids'];

        $explode = explode("|", $ids);
        $schedule_type_id = $explode[0];
        $assign_to = $explode[1];

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $where_array3 = array('schedule_type_id' => $schedule_type_id, 'schedule_assign_to' => $assign_to, 'assign_date>=' => $start_date, 'assign_date<=' => $end_date);
        $this->db->where($where_array3);
        $query_res = $this->db->get('tbl_schedule')->result();
        foreach ($query_res as  $row) {
            $this->db->select('name');
            $this->db->where('id', $row->schedule_assign_to);
            $admin_login = $this->db->get('tbl_admin_login')->row();

            $this->db->where('query_id', $row->issue_id);
            $user_query = $this->db->get('tbl_user_query')->row();

            $new_array = array(
                'ticket_no' => $user_query->ticket_no,
                'product_name' => $user_query->product_name,
                'issue' => $user_query->issue,
                'status' => $user_query->status,
                'assign_to' => $admin_login->name,
                'priority' => $user_query->priority,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //-------------------------------------------------------------------


}
