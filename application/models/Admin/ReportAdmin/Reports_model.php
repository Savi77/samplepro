

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetSourceArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_source')->result();
    }

    public function GetSegmentArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_business')->result();
    }

    public function GetEmpArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        return $this->db->get('tbl_admin_login')->result();
    }

    public function GetStageArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_stage')->result();
    }

    public function GetActivityArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_schedule_type_name')->result();
    }

    public function GetLocationArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_location')->result();
    }

    public function GetTargetTypeArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_target_type')->result();
    }


    public function GetProductArray()
    {
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        return $this->db->get('tbl_product_service_list')->result();
    }

    public function GetStageArrayUsingIds($StageArray)
    {
        $this->db->where_in('stage_id', $StageArray);
        return $this->db->get('tbl_stage')->result();
    }

    //-----------------------------------------------------------------------------

    public function ContactSummary()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $type_array = array('total', 'primary', 'secondary');

        for ($a = 0; $a < count($type_array); $a++) {
            $type2 = $type_array[$a];
            $where_array = array('org_id' => $org_id);

            if ($type2 != 'total') {
                $this->db->where("cust_type", $type2);
            }
            $this->db->where($where_array);
            $cust_query = $this->db->get("tbl_customer")->result();
            $new_array = array(
                'cust_type' => $type2,
                'count' => count($cust_query)
            );

            array_push($final_array, $new_array);
        }

        return $final_array;
    }


    public function DateRangeContactSummary()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $cust_type = $_REQUEST['cust_type'];
        if ($cust_type == "All") {
            $type_array = array('total', 'Primary', 'Secondary');
        } else {
            $type_array = array($cust_type);
        }


        for ($a = 0; $a < count($type_array); $a++) {
            $type2 = $type_array[$a];
            $where_array = array('org_id' => $org_id);

            if ($type2 != 'total') {
                $this->db->where("cust_type", $type2);
            }
            $this->db->where($where_array);
            $cust_query = $this->db->get("tbl_customer")->result();
            $new_array = array(
                'cust_type' => $type2,
                'count' => count($cust_query)
            );

            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function ContactSummaryDetails($formdata)
    {

        $final_array = array();
        $type2 = $formdata['cust_type'];
        if ($type2 != 'total') {
            $this->db->where("cust_type", $type2);
        }
        $this->db->where('org_id', $this->session->org_id);
        $query_res = $this->db->get('tbl_customer')->result();
        foreach ($query_res as  $row) {
            $new_array = array(
                'company_name' => $row->company_name,
                'address' => $row->address,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'contact_person_name1' => $row->contact_person_name1,
                'city' => $row->city,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }



    //------------------------------------------------------

    public function AccountRevenue($startdate,$enddate)
    {
        $org_id = $this->session->org_id;
        $final_array = array();
        // $start_date = date("Y-m-01");
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

        $this->db->where("date_created>=",$start_date);
        $this->db->where("date_created<=",$end_date);
        $this->db->where("org_id", $org_id);
        $query = $this->db->get("tbl_target_achieve")->result();
        
        foreach ($query as  $row) {
            $token_id = $row->token_id;
            $achieve_id = $row->achieve_id;

            $this->db->where("achieve_id", $achieve_id);
            $achieve_list = $this->db->get("tbl_target_achieve_list")->row();

            if ($achieve_list) {
                $employee_id = $achieve_list->employee_id;
                $this->db->where("ticket_no", $token_id);
                $user_query = $this->db->get("tbl_user_query")->row();

                $this->db->where("customer_id", $user_query->customer_id);
                $customer = $this->db->get("tbl_customer")->row();

                $this->db->select("id,name");
                $this->db->where("id", $employee_id);
                $admin_login = $this->db->get("tbl_admin_login")->row();

                $new_array = array(
                    'company_name' => $customer->company_name,
                    'customer_id' => $customer->customer_id,
                    'assign_to' => $admin_login->name,
                    'revenue' => $achieve_list->targettype_value,
                );
                array_push($final_array, $new_array);
            }
        }
        
        return $final_array;
    }


    //------------------------------------------------------

    public function DaterangeAccountRevenue($formdata)
    {
        $org_id = $this->session->org_id;
        $final_array = array();
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $this->db->where("date_created>=",$start_date);
        $this->db->where("date_created<=",$end_date);
        $this->db->where("org_id", $org_id);
        $query = $this->db->get("tbl_target_achieve")->result();
        
        foreach ($query as  $row) {
            $token_id = $row->token_id;
            $achieve_id = $row->achieve_id;

            $this->db->where("achieve_id", $achieve_id);
            $achieve_list = $this->db->get("tbl_target_achieve_list")->row();
            
            if ($achieve_list) {
                $employee_id = $achieve_list->employee_id;
                $this->db->where("ticket_no", $token_id);
                $user_query = $this->db->get("tbl_user_query")->row();

                $this->db->where("customer_id", $user_query->customer_id);
                $customer = $this->db->get("tbl_customer")->row();

                $this->db->select("id,name");
                $this->db->where("id", $employee_id);
                $admin_login = $this->db->get("tbl_admin_login")->row();
               
                if ($achieve_list->targettype_value == 'null') {
                    $rnv = 0;                
                }else{
                    $rnv = $achieve_list->targettype_value;
                }

                $new_array = array(
                    'company_name' => $customer->company_name,
                    'customer_id' => $customer->customer_id,
                    'assign_to' => $admin_login->name,
                    'revenue' => $rnv
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }


    //------------------------------------------------------

    public function LeadOppByMonthlyCountsDashboard($startdate, $enddate)
    {
        $org_id = $this->session->org_id;
        $final_array = array();
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
        $type_array = array('Lead', 'Opportunity');

        for ($a = 0; $a < count($type_array); $a++) {
            $customer_type = $type_array[$a];
            $pre_array = array();
            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('org_id' => $org_id, 'customer_type' => $customer_type, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);
                $query_res = $this->db->get('tbl_leads_opportunity')->result();

                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'customer_type' => $customer_type,
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );

                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            array_push($final_array, $pre_array);
        }

        // print_r($final_array);
        return $final_array;
    }
    public function LeadOppByMonthlyCounts($startdate, $enddate)
    {
        $org_id = $this->session->org_id;
        $final_array = array();
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

        $type_array = array('Lead', 'Opportunity');

        for ($a = 0; $a < count($type_array); $a++) {
            $customer_type = $type_array[$a];
            $pre_array = array();
            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('org_id' => $org_id, 'customer_type' => $customer_type, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);
                $query_res = $this->db->get('tbl_leads_opportunity')->result();

                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'customer_type' => $customer_type,
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );

                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            array_push($final_array, $pre_array);
        }

        // print_r($final_array);
        return $final_array;
    }



    public function DaterangeLeadOppByMonthlyCounts($formdata)
    {
        $org_id = $this->session->org_id;
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $customer_type = $formdata['customer_type'];
        if ($customer_type == 'All') 
        {
            $type_array = array('Lead', 'Opportunity');
        }
        else if($customer_type == '')
        {
            $type_array = array('Lead', 'Opportunity');
        } 
        else 
        {
            $type_array = array($customer_type);
        }

        for ($a = 0; $a < count($type_array); $a++) {
            $customer_type = $type_array[$a];
            $pre_array = array();
            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('org_id' => $org_id, 'customer_type' => $customer_type, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);
                $query_res = $this->db->get('tbl_leads_opportunity')->result();

                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'customer_type' => $customer_type,
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );

                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            array_push($final_array, $pre_array);
        }
        return $final_array;
    }
    public function ViewMonthlyDetails($formdata)
    {
        $final_array = array();
        $ids = $formdata['ids'];
        $explode = explode("|", $ids);
        $org_id = $this->session->org_id;

        $month = $explode[0];
        $year = $explode[1];
        $customer_type = $explode[2];

        $where_array3 = array('org_id' => $org_id, 'customer_type' => $customer_type, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
        $this->db->where($where_array3);
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,
                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
        // print_r($final_array);
    }


    public function ViewUserwiseMonthlyDetails($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $ids = $formdata['ids'];
        $explode = explode("|", $ids);
        $org_id = $this->session->org_id;
        $customer_type = $formdata['customer_type'];
        $month = $explode[0];
        $year = $explode[1];
        $assign_to = $explode[2];
        
        $where_array3 = array('assign_to' => $assign_to, 'org_id' => $org_id, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
        $this->db->where($where_array3);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,
                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //----------------------------------------------------------------------


    public function GetMonthArray($startdate,$enddate)
    {
        $final_array = array();
        // $start_date = date("Y-m-01");
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

        $start    = (new DateTime($start_date))->modify('first day of this month');
        $end      = (new DateTime($end_date))->modify('first day of next month');
        
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {

            $month = $dt->format("m");
            $year = $dt->format("Y");
            $pass_date = $year . '-' . $month . '-01';
            $month_name = date("F", strtotime($pass_date));
            $new_array = array(
                'month' => $month,
                'month_name' => $month_name,
                'year' => $year,
            );
            array_push($final_array, $new_array);
        }
        
        return $final_array;
    }


    public function GetMonthArrayFilter($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $start    = (new DateTime($start_date))->modify('first day of this month');
        $end      = (new DateTime($end_date))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {

            $month = $dt->format("m");
            $year = $dt->format("Y");
            $pass_date = $year . '-' . $month . '-01';
            $month_name = date("F", strtotime($pass_date));
            $new_array = array(
                'month' => $month,
                'month_name' => $month_name,
                'year' => $year,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function LeadOppByUserwiseMonthlyCountsDashboard($startdate, $enddate)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        // $start_date = date("Y-m-01");
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

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $pre_array = array();
            $name = $result->name;
            $assign_to = $result->id;

            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('assign_to' => $assign_to, 'org_id' => $org_id, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);
                $query_res = $this->db->get('tbl_leads_opportunity')->result();

                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );
                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            $new_arrayq = array(
                'emp_name' => $name,
                'emp_id' => $assign_to,
                'montharray' => $pre_array,
                'total' => count($query_res)
            );
            array_push($final_array, $new_arrayq);
        }
        return $final_array;
    }

    public function LeadOppByUserwiseMonthlyCounts($startdate, $enddate)
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

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $pre_array = array();
            $name = $result->name;
            $assign_to = $result->id;

            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('assign_to' => $assign_to, 'org_id' => $org_id, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);
                $query_res = $this->db->get('tbl_leads_opportunity')->result();

                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );
                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            $new_arrayq = array(
                'emp_name' => $name,
                'emp_id' => $assign_to,
                'montharray' => $pre_array,
                'total' => count($query_res)
            );
            array_push($final_array, $new_arrayq);
        }
        return $final_array;
    }


    public function DateRangeLeadOppByUserwiseMonthlyCounts($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $customer_type = $formdata['customer_type'];

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();
        foreach ($query_res as  $result) {
            $pre_array = array();
            $name = $result->name;
            $assign_to = $result->id;

            $start    = (new DateTime($start_date))->modify('first day of this month');
            $end      = (new DateTime($end_date))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            foreach ($period as $dt) {
                $month = $dt->format("m");
                $year = $dt->format("Y");
                $where_array3 = array('assign_to' => $assign_to, 'org_id' => $org_id, 'MONTH(created_date)' => $month, 'YEAR(created_date)' => $year);
                $this->db->where($where_array3);

                if ($customer_type != '') 
                {
                    if($customer_type == 'All')
                    {
                    }
                    else
                    {
                        $this->db->where("customer_type", $customer_type);

                    }
                }

                $query_res = $this->db->get('tbl_leads_opportunity')->result();
                $pass_date = $year . '-' . $month . '-01';
                $month_name = date("F", strtotime($pass_date));
                $new_array = array(
                    'month' => $month,
                    'month_name' => $month_name,
                    'year' => $year,
                    'pass_date' => $year . '-' . $month . '-01',
                    'total' => count($query_res),
                );
                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
            }
            $new_array = array(
                'emp_name' => $name,
                'emp_id' => $assign_to,
                'montharray' => $pre_array,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //-----------------------------------------------------------------------
    public function LeadOppBySalesPersonSegmentDashboard($startdate, $enddate)
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

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;
            $this->db->where("status", 1);
            $this->db->where("delete_status", 0);
            $this->db->where("org_id", $org_id);
            $business_res = $this->db->get("tbl_business")->result();

            foreach ($business_res as $ow2) {
                $business_id = $ow2->business_id;
                $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                $this->db->where("find_in_set($business_id, business_id)");
                $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
  
                $where_array4 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Lead');
                $this->db->where($where_array4);
                $this->db->where("find_in_set($business_id, business_id)");
                $leads_total = $this->db->get("tbl_leads_opportunity")->result();

                $where_array5 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Opportunity');
                $this->db->where($where_array5);
                $this->db->where("find_in_set($business_id, business_id)");
                $opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

                if (count($leads_opportunity_total) > 0) {
                    $new_array = array(
                        'emp_name' => $result->name,
                        'business_id' => $ow2->business_id,
                        'business_name' => $ow2->business_name,
                        'emp_id' => $assign_to,
                        'total' => count($leads_opportunity_total),
                        'lead' => count($leads_total),
                        'opp' => count($opportunity_total)
                    );
                    array_push($final_array, $new_array);
                }
            }
        }
        // echo "<pre>";
        // print_r($final_array);
        // die;
        return $final_array;
    }


    public function LeadOppBySalesPersonSegment($startdate,$enddate)
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
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $pre_array = array();
            $name = $result->name;
            $assign_to = $result->id;
            $this->db->where("status", 1);
            $this->db->where("delete_status", 0);
            $this->db->where("org_id", $org_id);
            $business_res = $this->db->get("tbl_business")->result();

            foreach ($business_res as $ow2) {
                $business_id = $ow2->business_id;
                $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                $this->db->where("find_in_set($business_id, business_id)");
                $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();


                $new_array = array(
                    'business_id' => $ow2->business_id,
                    'business_name' => $ow2->business_name,
                    'total' => count($leads_opportunity_total),
                );

                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }


                // if (count($leads_opportunity_total) > 0) {
                //     $new_array = array(
                //         'emp_name' => $name,
                //         'business_id' => $ow2->business_id,
                //         'business_name' => $ow2->business_name,
                //         'emp_id' => $assign_to,
                //         'total' => count($leads_opportunity_total)
                //     );
                //     array_push($final_array, $new_array);
                // }
            }
            $new_arrayq = array(
                'emp_name' => $name,
                'emp_id' => $assign_to,
                'businessarray' => $pre_array,
                'total' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_arrayq);
        }
        return $final_array;
    }

    public function DaterangeLeadOppBySalesPersonSegment($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $EmpArray = $formdata['EmpArray'];
        $customer_type = $formdata['customer_type'];
        $SegmentArray = $formdata['SegmentArray'];

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $pre_array = array();
            $name = $result->name;
            $assign_to = $result->id;
            $this->db->where("status", 1);
            $this->db->where("delete_status", 0);
            $this->db->where("org_id", $org_id);
            $this->db->where_in("business_id", $SegmentArray);
            $business_res = $this->db->get("tbl_business")->result();

            foreach ($business_res as $ow2) {
                $business_id = $ow2->business_id;
                $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                $this->db->where("find_in_set($business_id, business_id)");
                if ($customer_type != '') 
                {
                    if($customer_type == 'All')
                    {

                    }
                    else
                    {
                        $this->db->where("customer_type", $customer_type);

                    }
                }
                $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

                $new_array = array(
                    'business_id' => $ow2->business_id,
                    'business_name' => $ow2->business_name,
                    'total' => count($leads_opportunity_total),
                );

                if (!empty($new_array)) {
                    array_push($pre_array, $new_array);
                }
                
                // if (count($leads_opportunity_total) > 0) {
                //     $new_array = array(
                //         'emp_name' => $result->name,
                //         'business_id' => $ow2->business_id,
                //         'business_name' => $ow2->business_name,
                //         'emp_id' => $assign_to,
                //         'total' => count($leads_opportunity_total),



                //     );
                //     array_push($final_array, $new_array);
                // }
            }
            $new_arrayq = array(
                'emp_name' => $name,
                'emp_id' => $assign_to,
                'businessarray' => $pre_array,
                'total' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_arrayq);
        }
        return $final_array;
    }


    public function ViewLeadOppBySalesPersonSegment($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $customer_type = $formdata['customer_type'];
        $ids = $formdata['ids'];
        $explode = explode("|", $ids);
        $business_id = $explode[0];
        $emp_id = $explode[1];

        $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'assign_to' => $emp_id);
        $this->db->where($where_array);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $this->db->where("find_in_set($business_id, business_id)");
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,
                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;

        // print_r($final_array);
    }

    //-------------------------------------------------------------------------------

    public function LeadOppBySalesPersonProduct($startdate,$enddate)
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

        $customer_type = 'All';
        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;

            $this->db->where("status", 1);
            $this->db->where("delete_status", 0);
            $this->db->where("org_id", $org_id);
            $business_res = $this->db->get("tbl_product_service_list")->result();

            foreach ($business_res as $ow2) {
                $product_id = $ow2->prd_srv_id;
                $where_array3 = array('product_id' => $product_id, 'assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                // if ($customer_type != '') 
                // {
                //     $this->db->where("customer_type", $customer_type);
                // }

                $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
                
                if (count($leads_opportunity_total) > 0) {
                    $new_array = array(
                        'prdsrv_name' => $ow2->prdsrv_name,
                        'product_id' => $product_id,
                        'emp_id' => $assign_to,
                        'emp_name' => $result->name,
                        'total' => count($leads_opportunity_total)
                    );
                    array_push($final_array, $new_array);
                }
            }
        }
        return $final_array;
    }

    public function DaterangeLeadOppBySalesPersonProduct($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $EmpArray = $formdata['EmpArray'];
        $customer_type = $formdata['customer_type'];
        $ProductArray = $formdata['ProductArray'];

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;
            $this->db->where("status", 1);
            $this->db->where("delete_status", 0);
            $this->db->where("org_id", $org_id);
            $this->db->where_in("prd_srv_id", $ProductArray);
            $business_res = $this->db->get("tbl_product_service_list")->result();

            foreach ($business_res as $ow2) {
                $product_id = $ow2->prd_srv_id;
                $where_array3 = array('product_id' => $product_id, 'assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
                if ($customer_type != '') 
                {
                    if($customer_type == 'All')
                    {

                    }
                    else
                    {
                        $this->db->where("customer_type", $customer_type);
                    }
                }
                $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
                if (count($leads_opportunity_total) > 0) {
                    $new_array = array(

                        'prdsrv_name' => $ow2->prdsrv_name,
                        'product_id' => $product_id,
                        'emp_id' => $assign_to,
                        'emp_name' => $result->name,
                        'total' => count($leads_opportunity_total)
                    );
                    array_push($final_array, $new_array);
                }
            }
        }
        return $final_array;
    }


    public function ViewLeadOppBySalesPersonProduct($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $customer_type = $formdata['customer_type'];
        $ids = $formdata['ids'];
        $explode = explode("|", $ids);
        $product_id = $explode[0];
        $emp_id = $explode[1];

        $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'assign_to' => $emp_id, 'product_id' => $product_id);
        $this->db->where($where_array);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,
                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;

        // print_r($final_array);
    }



    //-----------------------------------------------------------------------------------
    public function LeadOppBySalesPersonDashboard($startdate, $enddate)
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

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;

            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $assign_to,
                'total' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function LeadOppBySalesPerson($startdate,$enddate)
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

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;

            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

            $where_array4 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Lead');
            $this->db->where($where_array4);
            $leads_total = $this->db->get("tbl_leads_opportunity")->result();

            $where_array5 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Opportunity');
            $this->db->where($where_array5);
            $opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $assign_to,
                'total' => count($leads_opportunity_total),
                'lead' => count($leads_total),
                'opp' => count($opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DateRangeLeadOppBySalesPerson($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $EmpArray = $formdata['EmpArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("user_status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("user_type", "E");
        $this->db->where("org_id", $org_id);
        $this->db->where_in("id", $EmpArray);
        $query_res = $this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) {
            $name = $result->name;
            $assign_to = $result->id;

            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

            $where_array4 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Lead');
            $this->db->where($where_array4);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_total = $this->db->get("tbl_leads_opportunity")->result();

            $where_array5 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Opportunity');
            $this->db->where($where_array5);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $assign_to,
                'total' => count($leads_opportunity_total),
                'name' => $result->name,
                'y' => count($leads_opportunity_total),
                'lead' => count($leads_total),
                'opp' => count($opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function FetchSalesPerson($formdata)
    {
        $this->db->select("name");
        $this->db->where("id", $formdata['emp_id']);
        return $this->db->get("tbl_admin_login")->row();
    }

    public function ViewSalesPersonDetails($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $emp_id = $formdata['emp_id'];
        $customer_type = $formdata['customer_type'];

        $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'assign_to' => $emp_id);
        $this->db->where($where_array);

        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,

                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //-----------------------------------------------------------------------------------------------------------------

    public function LeadOppByStage($startdate,$enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by('stage_id','asc');
        $query_res = $this->db->get("tbl_stage")->result();

        foreach ($query_res as  $result) {
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);

            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
            $new_array = array(
                'stage_title' => $result->stage_title,
                'stage_id' => $result->stage_id,
                'total' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function DateRangeLeadOppByStage($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("stage_id", $StageArray);
        $this->db->order_by('stage_id','asc');
        $query_res = $this->db->get("tbl_stage")->result();

        foreach ($query_res as  $result) {
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);
            if ($customer_type != '') 
            {
                if($customer_type  == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
            $new_array = array(
                'stage_title' => $result->stage_title,
                'name' => $result->stage_title,
                'stage_id' => $result->stage_id,
                'total' => count($leads_opportunity_total),
                'y' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function LeadscountByStagesSummary($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("stage_id", $StageArray);
        $this->db->order_by('stage_id','asc');
        $query_res = $this->db->get("tbl_stage")->result();

        foreach ($query_res as  $result) {
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Lead');
            $this->db->where($where_array3);
            if ($customer_type != '') 
            {
                if($customer_type  == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
            $new_array = array(
                'stage_title' => $result->stage_title,
                'name' => $result->stage_title,
                'stage_id' => $result->stage_id,
                'total' => count($leads_opportunity_total),
                'y' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    
    public function OpportunitycountByStagesSummary($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("stage_id", $StageArray);
        $this->db->order_by('stage_id','asc');
        $query_res = $this->db->get("tbl_stage")->result();

        foreach ($query_res as  $result) {
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type' => 'Opportunity');
            $this->db->where($where_array3);
            if ($customer_type != '') 
            {
                if($customer_type  == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();
            $new_array = array(
                'stage_title' => $result->stage_title,
                'name' => $result->stage_title,
                'stage_id' => $result->stage_id,
                'total' => count($leads_opportunity_total),
                'y' => count($leads_opportunity_total)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function FetchStageData($formdata)
    {
        $this->db->select("stage_title");
        $this->db->where("stage_id", $formdata['stage_id']);
        return $this->db->get("tbl_stage")->row();
    }


    public function Lead_Opportunity_by_Stage_Details($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $stage_id = $formdata['stage_id'];
        $customer_type = $formdata['customer_type'];

        $where_array3 = array('stage' => $stage_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array3);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {
            $this->db->select("quotation_id");
            $this->db->where("leadopp_id", $row->leadopp_id);
            $this->db->order_by("quotation_id", "DESC");
            $quotation = $this->db->get('tbl_lead_quotation')->row();

            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();

            if (!empty($quotation->quotation_id)) {
                $quotation_id = $quotation->quotation_id;
                $quotation_res = $this->db->query("  SELECT sum(`total`) as amount FROM `tbl_quotation_details` WHERE `quotation_id`='$quotation_id'  ")->row();
                $quotation_amount = $quotation_res->amount;
            } else {
                $quotation_amount = "NA";
            }
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,
                'quotation_amount' => $quotation_amount,
                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    //----------------------------------------------------------------------------------------------------------------    


    public function Lead_Opportunity_by_Source($startdate,$enddate)
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

        // $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        // $start_date = date("Y-m-d", strtotime($start_date1));

        // $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        // $end_date = date("Y-m-d", strtotime($end_date1));

        // $this->db->where("status", 1);
        // $this->db->where("delete_status", 0);
        // $this->db->where("org_id", $org_id);
        // $query_res = $this->db->get("tbl_source")->result();
        $this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where("delete_status", 0);
		$this->db->where('org_id', $this->session->org_id);
        $this->db->order_by('source_id','asc');

		$query_res = $this->db->get('tbl_source')->result();

        foreach ($query_res as  $result) {
            $source_id = $result->source_id;
            $where_array3 = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            $leads_opportunity_total = $this->db->get("tbl_leads_opportunity")->result();

            $total_final = count($leads_opportunity_total);

            // echo  $ratio=$no_of_close/$total_final*100;
            $new_array = array(
                'source' => $result->source_title,
                'source_id' => $result->source_id,
                'total' => $total_final
            );
            array_push($final_array, $new_array);
        }
       
        return $final_array;
    }

    public function Daterange_LeadOppBySource($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $sourceArray = $formdata['sourceArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("source_id", $sourceArray);
        $query_res = $this->db->get("tbl_source")->result();

        foreach ($query_res as  $result) {
            $source_id = $result->source_id;
            $where_array2 = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array2);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_res_total = $this->db->get("tbl_leads_opportunity")->result();

            if (count($StageArray) > 0) {
                $countArray = array();
                $stage_title_array = array();
                $stage_id_array = array();
                for ($i = 0; $i < count($StageArray); $i++) {
                    $stage_id = $StageArray[$i];
                    $this->db->where("stage_id", $stage_id);
                    $stage_res = $this->db->get("tbl_stage")->row();
                    $where_array = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'stage' => $stage_id);
                    $this->db->where($where_array);

                    if ($customer_type != '') 
                    {
                        if($customer_type == 'All')
                        {

                        }
                        else
                        {
                            $this->db->where("customer_type", $customer_type);
                        }
                    }
                    $leads_res = $this->db->get("tbl_leads_opportunity")->result();
                    array_push($stage_title_array, $stage_res->stage_title);
                    array_push($countArray, count($leads_res));
                    array_push($stage_id_array, $stage_res->stage_id);
                }


                $new_array = array(
                    'source' => $result->source_title,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                    'source_id' => $result->source_id,
                    'stage_id_array' => $stage_id_array,
                    'stage_cnt_array' => $countArray,
                    'stage_title_array' => $stage_title_array,
                );
                array_push($final_array, $new_array);
            } else {
                $new_array = array(
                    'source' => $result->source_title,
                    'source_id' => $result->source_id,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }

    public function LeadcountountBySourceSummary($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $sourceArray = $formdata['sourceArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("source_id", $sourceArray);
        $query_res = $this->db->get("tbl_source")->result();

        foreach ($query_res as  $result) {
            $source_id = $result->source_id;
            $where_array2 = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type =' => 'Lead');
            $this->db->where($where_array2);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_res_total = $this->db->get("tbl_leads_opportunity")->result();

            if (count($StageArray) > 0) {
                $countArray = array();
                $stage_title_array = array();
                $stage_id_array = array();
                for ($i = 0; $i < count($StageArray); $i++) {
                    $stage_id = $StageArray[$i];
                    $this->db->where("stage_id", $stage_id);
                    $stage_res = $this->db->get("tbl_stage")->row();
                    $where_array = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'stage' => $stage_id, 'customer_type =' => 'Lead');
                    $this->db->where($where_array);

                    if ($customer_type != '') 
                    {
                        if($customer_type == 'All')
                        {

                        }
                        else
                        {
                            $this->db->where("customer_type", $customer_type);
                        }
                    }
                    $leads_res = $this->db->get("tbl_leads_opportunity")->result();
                    array_push($stage_title_array, $stage_res->stage_title);
                    array_push($countArray, count($leads_res));
                    array_push($stage_id_array, $stage_res->stage_id);
                }


                $new_array = array(
                    'source' => $result->source_title,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                    'source_id' => $result->source_id,
                    'stage_id_array' => $stage_id_array,
                    'stage_cnt_array' => $countArray,
                    'stage_title_array' => $stage_title_array,
                );
                array_push($final_array, $new_array);
            } else {
                $new_array = array(
                    'source' => $result->source_title,
                    'source_id' => $result->source_id,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }
    
    public function OppCountBySourceSummary($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $StageArray = $formdata['StageArray'];
        $sourceArray = $formdata['sourceArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("source_id", $sourceArray);
        $query_res = $this->db->get("tbl_source")->result();

        foreach ($query_res as  $result) {
            $source_id = $result->source_id;
            $where_array2 = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type =' => 'Opportunity');
            $this->db->where($where_array2);
            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }
            $leads_res_total = $this->db->get("tbl_leads_opportunity")->result();

            if (count($StageArray) > 0) {
                $countArray = array();
                $stage_title_array = array();
                $stage_id_array = array();
                for ($i = 0; $i < count($StageArray); $i++) {
                    $stage_id = $StageArray[$i];
                    $this->db->where("stage_id", $stage_id);
                    $stage_res = $this->db->get("tbl_stage")->row();
                    $where_array = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'stage' => $stage_id, 'customer_type =' => 'Opportunity');
                    $this->db->where($where_array);

                    if ($customer_type != '') 
                    {
                        if($customer_type == 'All')
                        {

                        }
                        else
                        {
                            $this->db->where("customer_type", $customer_type);
                        }
                    }
                    $leads_res = $this->db->get("tbl_leads_opportunity")->result();
                    array_push($stage_title_array, $stage_res->stage_title);
                    array_push($countArray, count($leads_res));
                    array_push($stage_id_array, $stage_res->stage_id);
                }


                $new_array = array(
                    'source' => $result->source_title,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                    'source_id' => $result->source_id,
                    'stage_id_array' => $stage_id_array,
                    'stage_cnt_array' => $countArray,
                    'stage_title_array' => $stage_title_array,
                );
                array_push($final_array, $new_array);
            } else {
                $new_array = array(
                    'source' => $result->source_title,
                    'source_id' => $result->source_id,
                    'total' => count($leads_res_total),
                    'name' => $result->source_title,
                    'y' => count($leads_res_total),
                );
                array_push($final_array, $new_array);
            }
        }
        return $final_array;
    }



    public function GetSourceData($formdata)
    {
        $this->db->select("source_title");
        $this->db->where("source_id", $formdata['source_id']);
        return $this->db->get("tbl_source")->row();
    }

    public function GetSourceStageData($formdata)
    {
        $stage_id = $formdata['stage_id'];
        $explode = explode("|", $stage_id);
        $stage_id = $explode[0];
        $source_id = $explode[1];

        $this->db->select("source_title");
        $this->db->where("source_id", $source_id);
        $source_data = $this->db->get("tbl_source")->row();

        $this->db->select("stage_title");
        $this->db->where("stage_id", $stage_id);
        $stage_data = $this->db->get("tbl_stage")->row();

        return array('source_title' => $source_data->source_title, 'stage_title' => $stage_data->stage_title);
    }

    public function get_branch_total($formdata)
    {
        $name = $formdata['name'];
        // $id = $this->db->query("SELECT `branch_id` FROM `tbl_branch` WHERE `name` = '$name'");
        $id = $this->db->select('branch_id')->from('tbl_branch')->where('name',$name)->where('org_id',$this->session->org_id)->get()->row()->branch_id;
        $cust_type = $formdata['cust_type'];
        if($cust_type == '' || $cust_type == 'All')
        {
            return $this->db->query("SELECT 
            `lead_generate_id` AS leadopp_id,
            `company_name` AS company_name,
            `contact_person_name1` AS contact_person_name1,
            `phone_no` AS phone_no,
            `email` AS email,
            `address` AS `address`
            FROM `tbl_leads_opportunity` WHERE tbl_leads_opportunity.org_id = " . $this->session->org_id . " AND `branch_id` = ". $id);
        }
        else
        {
            return $this->db->query("SELECT 
            `lead_generate_id` AS leadopp_id,
            `company_name` AS company_name,
            `contact_person_name1` AS contact_person_name1,
            `phone_no` AS phone_no,
            `email` AS email,
            `address` AS `address`
            FROM `tbl_leads_opportunity` WHERE tbl_leads_opportunity.org_id = " . $this->session->org_id . " AND `branch_id` = ". $id . " AND tbl_leads_opportunity.customer_type = '" . $cust_type ."'");
        }
        
    }

    public function ViewSourceTotalDetails($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $source_id = $formdata['source_id'];
        $customer_type = $formdata['customer_type'];
        

        $where_array = array('source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {

            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,

                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function ViewStageDetails($formdata)
    {
        $final_array = array();
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));
        $stage_id = $formdata['stage_id'];

        $explode = explode("|", $stage_id);
        $stage = $explode[0];
        $source_id = $explode[1];

        $customer_type = $formdata['customer_type'];

        $where_array = array('stage' => $stage, 'source' => $source_id, 'DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where('customer_type', $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {

            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,

                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //----------------------------------------------------------------------------------------------------------
    public function Lead_Opportunity_by_Segments_Dashboard($startdate, $enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by("business_id", 'asc');
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");
            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function Lead_by_Segments($startdate, $enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by("business_id", 'asc');
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");
            $this->db->where("customer_type","Lead");
            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function Opportunity_by_Segments($startdate, $enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->order_by("business_id", 'asc');
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");
            $this->db->where("customer_type","Opportunity");
            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    
    public function Lead_Opportunity_by_Segments($startdate,$enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);

        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");
            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function DaterangeLeadOppBySegments($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $SegmentArray = $formdata['SegmentArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("business_id", $SegmentArray);
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");

            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }    
            }

            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
                'name' => $result->business_name,
                'y' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    
    public function Lead_by_Segments_filter($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $SegmentArray = $formdata['SegmentArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("business_id", $SegmentArray);
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type =' => 'Lead');
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");

            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }    
            }

            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
                'name' => $result->business_name,
                'y' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function Opportunity_by_Segments_filter($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $SegmentArray = $formdata['SegmentArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("business_id", $SegmentArray);
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'customer_type =' => 'Opportunity');
            $this->db->where($where_array);
            $this->db->where("find_in_set($business_id, business_id)");

            if ($customer_type != '') 
            {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }    
            }

            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
                'name' => $result->business_name,
                'y' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function ViewBusinessDetails($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $business_id = $formdata['business_id'];
        $customer_type = $formdata['customer_type'];

        $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array);
        $this->db->where("find_in_set($business_id, business_id)");
        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {

            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {

            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,

                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function GetBusinessDetails($formdata)
    {
        $this->db->select("business_name");
        $this->db->where("business_id", $formdata['business_id']);
        return $this->db->get("tbl_business")->row();
    }


    //----------------------------------------------------------------------------------
    public function Lead_Opportunity_by_ProductDashboard($startdate, $enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);


        $query_res = $this->db->get("tbl_product_service_list")->result();

        foreach ($query_res as  $row) {
            $product_id = $row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
            $this->db->where($where_array);
            $result_count = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_lead = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Lead');
            $this->db->where($where_array_lead);
            $result_lead = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_opp = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Opportunity');
            $this->db->where($where_array_opp);
            $result_opp = $this->db->get('tbl_leads_opportunity')->result();


            $new_array = array(
                'product_name' => $row->prdsrv_name,
                'product_id' => $product_id,
                'total' => count($result_count),

                'name' => $result->prdsrv_name,
                'y' => count($result_count),
                'lead' => count($result_lead),
                'opp' => count($result_opp)


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function Lead_Opportunity_by_Product($startdate,$enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);


        $query_res = $this->db->get("tbl_product_service_list")->result();

        foreach ($query_res as  $row) {
            $product_id = $row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
            $this->db->where($where_array);
            $result_count = $this->db->get('tbl_leads_opportunity')->result();
            $new_array = array(
                'product_name' => $row->prdsrv_name,
                'product_id' => $product_id,
                'total' => count($result_count),

                'name' => $result->prdsrv_name,
                'y' => count($result_count)


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function FetchProductData($formdata)
    {
        $this->db->select("prdsrv_name");
        $this->db->where("prd_srv_id", $formdata['product_id']);
        return $this->db->get("tbl_product_service_list")->row();
    }


    public function ViewProductDetails($formdata)
    {
        $final_array = array();

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $product_id = $formdata['product_id'];
        $customer_type = $formdata['customer_type'];

        $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
        $this->db->where($where_array);

        if ($customer_type != '') 
        {
            if($customer_type == 'All')
            {
                
            }
            else
            {
                $this->db->where("customer_type", $customer_type);
            }
        }
        $query_res = $this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) {

            $this->db->select("name");
            $this->db->where("id", $row->assign_to);
            $admin_data = $this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id", $row->product_id);
            $product_data = $this->db->get("tbl_product_service_list")->row();
            $new_array = array(
                'company' => $row->company_name,
                'contactperson' => $row->contact_person_name1,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'address' => $row->address,
                'leadopp_id' => $row->lead_generate_id,
                'lead_id' => $row->leadopp_id,

                'closure_date' => date("d F, Y", strtotime($row->closure_date)),
                'project_business_value' => $row->project_business_value,
                'assign_to' => $admin_data->name,
                'prdsrv_name' => $product_data->prdsrv_name,


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function Lead_Opportunity_by_Product_graph($startdate,$enddate)
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

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_product_service_list")->result();

        foreach ($query_res as  $row) {
            $product_id = $row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
            $this->db->where($where_array);
            $result_count = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_lead = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Lead');
            $this->db->where($where_array_lead);
            $result_lead = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_opp = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Opportunity');
            $this->db->where($where_array_opp);
            $result_opp = $this->db->get('tbl_leads_opportunity')->result();

            $new_array = array(
                'name' => $row->prdsrv_name,
                'OwnerCount' => count($result_count),
                'lead' => count($result_lead),
                'opp' => count($result_opp)
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DaterangeLeadOppByProduct($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;

        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));
        $ProductArray = $formdata['ProductArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("prd_srv_id", $ProductArray);
        $query_res = $this->db->get("tbl_product_service_list")->result();

        foreach ($query_res as  $row) {
            $product_id = $row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
            $this->db->where($where_array);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_count = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_lead = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Lead');
            $this->db->where($where_array_lead);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_lead = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_opp = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Opportunity');
            $this->db->where($where_array_opp);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_opp = $this->db->get('tbl_leads_opportunity')->result();
          

            $new_array = array(
                'product_name' => $row->prdsrv_name,
                'product_id' => $product_id,
                'total' => count($result_count),
                'name' => $row->prdsrv_name,
                'y' => count($result_count),
                'lead' => count($result_lead),
                'opp' => count($result_opp)

            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    //----------------------------------------------------------------------------------------------------
    public function LeadOpp_By_Product($startdate,$enddate)
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

        
        $ProductArray = $formdata['ProductArray'];
        $customer_type = $formdata['customer_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        // $this->db->where_in("prd_srv_id", $ProductArray);
        $query_res = $this->db->get("tbl_product_service_list")->result();

        foreach ($query_res as  $row) {
            $product_id = $row->prd_srv_id;
            $where_array = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id);
            $this->db->where($where_array);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_count = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_lead = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Lead');
            $this->db->where($where_array_lead);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_lead = $this->db->get('tbl_leads_opportunity')->result();

            $where_array_opp = array('DATE(created_date)>=' => $start_date, 'DATE(created_date)<=' => $end_date, 'product_id' => $product_id, 'customer_type' => 'Opportunity');
            $this->db->where($where_array_opp);

            if ($customer_type != '') {
                if($customer_type == 'All')
                {

                }
                else
                {
                    $this->db->where("customer_type", $customer_type);
                }
            }

            $result_opp = $this->db->get('tbl_leads_opportunity')->result();
          

            $new_array = array(
                'product_name' => $row->prdsrv_name,
                'product_id' => $product_id,
                'total' => count($result_count),
                'name' => $row->prdsrv_name,
                'y' => count($result_count),
                'lead' => count($result_lead),
                'opp' => count($result_opp)

            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function SegmentWiseContact()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $query_res = $this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $this->db->where("find_in_set($business_id, business_id)");
            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DateRangeSegmentWiseContact($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $SegmentArray = $formdata['SegmentArray'];
        $cust_type = $formdata['cust_type'];

        $this->db->where("status", 1);
        $this->db->where("delete_status", 0);
        $this->db->where("org_id", $org_id);
        $this->db->where_in("business_id", $SegmentArray);
        $query_res = $this->db->get("tbl_business")->result();
        foreach ($query_res as  $result) {
            $business_id = $result->business_id;
            $this->db->where("find_in_set($business_id, business_id)");
            if ($cust_type != 'All') {
                $this->db->where("cust_type", $cust_type);
            }

            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'business_name' => $result->business_name,
                'business_id' => $result->business_id,
                'total' => count($result_count),
                'name' => $result->business_name,
                'y' => count($result_count)

            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function FetchSegmentWiseContact($formdata)
    {
        $this->db->select("business_name");
        $this->db->where("business_id", $formdata['business_id']);
        return $this->db->get("tbl_business")->row();
    }


    public function SegmentWiseContactDetails($formdata)
    {
        $final_array = array();
        $business_id = $formdata['business_id'];
        $this->db->where("find_in_set($business_id, business_id)");
        $query_res = $this->db->get('tbl_customer')->result();
        foreach ($query_res as  $row) {
            $new_array = array(
                'company_name' => $row->company_name,
                'address' => $row->address,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'contact_person_name1' => $row->contact_person_name1,
                'city' => $row->city,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //------------------------------------------------------------------------------------

    public function AccountOwners($startdate,$enddate)
    {
        $final_array = array();
        // $start_date = date('Y-m-d');
        // $end_date = date('Y-m-d');
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
        
        $org_id = $this->session->org_id;
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $query_res = $this->db->get('tbl_admin_login')->result();
        foreach ($query_res as  $result) {
            $created_by = $result->id;
            $where_array = array('created_by' => $created_by);
            $this->db->where($where_array);
            $this->db->where('created_date >= ', $start_date);
            $this->db->where('created_date <= ', $end_date);
            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $result->id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DateRangeAccountOwners($formdata)
    {
        $final_array = array();
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));
        
        $org_id = $this->session->org_id;
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('user_type','E');      
        $query_res = $this->db->get('tbl_admin_login')->result();
        foreach ($query_res as  $result) {
            $created_by = $result->id;
            $where_array = array('created_by' => $created_by);
            $this->db->where('created_date >= ', $start_date);
            $this->db->where('created_date <= ', $end_date);
            $this->db->where($where_array);
            $result_count = $this->db->get('tbl_customer')->result();

            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $result->id,
                'total' => count($result_count),
                'name' => $result->name,
                'y' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }
    public function FetchAccountOwnersData($formdata)
    {
        $this->db->select("name");
        $this->db->where("id", $formdata['emp_id']);
        return $this->db->get("tbl_admin_login")->row();
    }

    public function AccountOwnersDetails($formdata)
    {
        // Code added by Sunil
        $final_array = array();
        $assign_to = $formdata['emp_id'];
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $created_by = $assign_to;
        $org_id = $this->session->org_id;
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('id', $assign_to);
        $userData = $this->db->get('tbl_admin_login')->row();

        $where_array = array('created_by' => $created_by);
        $this->db->where('created_date >= ', $start_date);
        $this->db->where('created_date <= ', $end_date);
        $this->db->where($where_array);
        $result_count = $this->db->get('tbl_customer')->result();
        foreach ($result_count as $key => $value) {
            $new_array = array(
                'company_name' => $value->company_name,
                'contact_person_name1' => $value->contact_person_name1,
                'email' => $value->email,
                'phone_no' => $value->phone_no,
                'city' => $value->city,
                'address' => $value->address
            );
            array_push($final_array, $new_array);
        }


        return $final_array;
        exit;

        $final_array = array();
        $assign_to = $formdata['emp_id'];
        $cust_type = $formdata['cust_type'];
        if ($cust_type != 'All') {
            $this->db->where("cust_type", $cust_type);
        }
        $this->db->where("find_in_set($assign_to, account_manager)");
        $query_res = $this->db->get('tbl_customer')->result();
        foreach ($query_res as  $row) {

            $new_array = array(
                'company_name' => $row->company_name,
                'address' => $row->address,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'contact_person_name1' => $row->contact_person_name1,
                'city' => $row->city,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    //-------------------------------------------------------------------------------

    public function LocationWiseContact()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        $query_res = $this->db->get('tbl_location')->result();

        foreach ($query_res as  $result) {
            $location_id = $result->location_id;
            $where_array = array('location_id' => $location_id);
            $this->db->where($where_array);
            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'location_id' => $result->location_id,
                'location' => $result->location,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function DateRangeLocationWiseContact($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $LocationArray = $formdata['LocationArray'];
        $customer_type = $formdata['cust_type'];

        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        $this->db->where_in("location_id", $LocationArray);
        $query_res = $this->db->get('tbl_location')->result();

        foreach ($query_res as  $result) {
            $location_id = $result->location_id;
            $where_array = array('location_id' => $location_id);
            $this->db->where($where_array);
            if ($customer_type != 'All') {
                $this->db->where("cust_type", $customer_type);
            }
            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'location_id' => $result->location_id,
                'location' => $result->location,
                'total' => count($result_count),
                'name' => $result->location,
                'y' => count($result_count),


            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function LocationWiseContactDetails($formdata)
    {
        $final_array = array();
        $location_id = $formdata['location_id'];
        $customer_type = $formdata['customer_type'];
        $where_array = array('location_id' => $location_id);
        $this->db->where($where_array);
        if ($customer_type != 'All') {
            $this->db->where("cust_type", $customer_type);
        }
        $query_res = $this->db->get('tbl_customer')->result();
        foreach ($query_res as  $row) {
            $new_array = array(
                'company_name' => $row->company_name,
                'address' => $row->address,
                'mobile' => $row->phone_no,
                'email' => $row->email,
                'contact_person_name1' => $row->contact_person_name1,
                'city' => $row->city,
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function FetchLocationData($formdata)
    {
        $this->db->select("location");
        $this->db->where("location_id", $formdata['location_id']);
        return $this->db->get("tbl_location")->row();
    }

    //-----------------------------------------------------------------------------------------------------

    public function AssignAccountOwners()
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        $query_res = $this->db->get('tbl_admin_login')->result();
        foreach ($query_res as  $result) {
            $assign_to = $result->id;
            $this->db->where("find_in_set($assign_to, account_manager)");
            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'emp_name' => $result->name,
                'emp_id' => $result->id,
                'total' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }



    public function DateRangeAssignAccountOwners($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date = date("Y-m-d", strtotime($start_date1));

        $end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date = date("Y-m-d", strtotime($end_date1));

        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        $query_res = $this->db->get('tbl_admin_login')->result();
        foreach ($query_res as  $result) {
            $assign_to = $result->id;
            $this->db->where("find_in_set($assign_to, account_manager)");
            $this->db->where('created_date >= ', $start_date);
            $this->db->where('created_date <= ', $end_date);

            $result_count = $this->db->get('tbl_customer')->result();
            $new_array = array(
                'name' => $result->name,
                'y' => count($result_count),
            );
            array_push($final_array, $new_array);
        }
        return $final_array;
    }

    public function DaterangeBulkEmailData($formdata)
    {
        if ($formdata['typeModule'] == 'crm') {
            $final_array = array();
            $org_id = $this->session->org_id;
            $start_date1 = str_replace(',', ' ', $formdata['start_date']);
            $s_date = date("Y-m-d", strtotime($start_date1));

            $end_date1 = str_replace(',', ' ', $formdata['end_date']);
            $e_date = date("Y-m-d", strtotime($end_date1));

            $lead_type = $formdata['lead_type'];
            $sourceArray = implode(",", $formdata['sourceArray']);
            $SegmentArray = implode(",", $formdata['SegmentArray']);
            $StageArray = implode(",", $formdata['StageArray']);
            $ProductArray = implode(",", $formdata['ProductArray']);
            $EmpArray = implode(",", $formdata['EmpArray']);
            $tag_type = $formdata['tag_type'];
            $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= '$s_date' AND DATE(created_date) <= '$e_date' AND tbl_leads_opportunity.org_id= '$org_id'";

            if ($lead_type != '') {
                $query .= " AND customer_type = '$lead_type'";
            }
            if (isset($sourceArray)) {
                $query .= " AND source  IN ($sourceArray)";
            }
            if (isset($SegmentArray)) {
                $query .= " AND business_id   IN ($SegmentArray) ";
            }
            if (isset($StageArray)) {
                $query .= " AND stage  IN ($StageArray) ";
            }
            if (isset($ProductArray)) {
                $query .= " AND product_id  IN ($ProductArray)";
            }
            if (isset($EmpArray)) {
                $query .= " AND assign_to IN  ($EmpArray) ";
            }
            if ($tag_type != '') {
                $query .= " AND tag = '$tag_type' ";
            }
            $query = $this->db->query($query);
            foreach ($query->result_array() as $crm) {
                $this->db->select('id, name');
                $this->db->where('id', $crm['assign_to']);
                $emp_data = $this->db->get('tbl_admin_login')->row();
                $emp_name = $emp_data->name;
                $product = $crm['product_id'];
                $this->db->where('prd_srv_id', $crm['product_id']);
                $prodcut = $this->db->get('tbl_product_service_list')->row();
                $this->db->select('stage_id, stage_title');
                $this->db->where('stage_id', $crm['stage']);
                $stage_data = $this->db->get('tbl_stage')->row();
                $stage_title = $stage_data->stage_title;
                $this->db->select('source_id, source_title');
                $this->db->where('source_id', $crm['source']);
                $source_data = $this->db->get('tbl_source')->row();
                $source_title = $source_data->source_title;
                $this->db->select('group_id, group_name');
                $this->db->where('group_id', $crm['group_id']);
                $group_data = $this->db->get('tbl_group')->row();
                if ($group_data->group_name == null) {
                    $group_name = '';
                } else {
                    $group_name = $group_data->group_name;
                }
                $crmData = array(
                    'lead_generate_id' => $crm['lead_generate_id'],
                    'emp_name' => $emp_name,
                    'customer_type' => $crm['customer_type'],
                    'tag' => $crm['tag'],
                    'company_name' => $crm['company_name'],
                    'contact_person_name1' => $crm['contact_person_name1'],
                    'phone_no' => $crm['phone_no'],
                    'email' => $crm['email'],
                    'prdsrv_name' => $prodcut->prdsrv_name,
                    'address' => $crm['address'],
                    'city' => $crm['city'],
                    'stage_title' => $stage_title,
                    'source_title' => $source_title,
                    'closure_date' => $crm['closure_date'],
                    'remarks' => $crm['remarks'],
                    'location' => $crm['location'],
                    'group_name' => $group_name,
                    'created_date' => $crm['created_date'],
                    'cust_type' => "crm",
                );
                array_push($final_array, $crmData);
            }
            return $final_array;
        } else {
            $final_array = array();
            $org_id = $this->session->org_id;
            $cust_type = $formdata['cust_type'];
            $TypeArray = implode(",", $formdata['TypeArray']);
            $group = implode(",", $formdata['group']);
            $SegmentArray = implode(",", $formdata['SegmentArray']);
            $LocationArray = implode(",", $formdata['LocationArray']);
            $EmpArray = implode(",", $formdata['EmpArray']);
            $query = "SELECT * FROM tbl_customer WHERE tbl_customer.org_id= '$org_id'";

            if ($cust_type != 'All') {
                $query .= " AND cust_type = '$cust_type'";
            }
            if (isset($TypeArray)) {
                $query .= " AND type_id  IN ($TypeArray)";
            }
            if (isset($SegmentArray)) {
                $query .= " AND business_id   IN ($SegmentArray) ";
            }
            if (isset($group)) {
                $query .= " AND group_id  IN ($group) ";
            }
            if (isset($LocationArray)) {
                $query .= " AND location_id  IN ($LocationArray)";
            }
            if (isset($EmpArray)) {
                $query .= " AND account_manager IN  ($EmpArray) ";
            }
            $query = $this->db->query($query);
            foreach ($query->result_array() as $crm) {
                $this->db->select('id, name');
                $this->db->where('id', $crm['account_manager']);
                $emp_data = $this->db->get('tbl_admin_login')->row();
                if ($emp_data->name == null) {
                    $emp_name = '';
                } else {
                    $emp_name = $emp_data->name;
                }
                $this->db->select('group_id, group_name');
                $this->db->where('group_id', $crm['group_id']);
                $group_data = $this->db->get('tbl_group')->row();
                if ($group_data->group_name == null) {
                    $group_name = '';
                } else {
                    $group_name = $group_data->group_name;
                }
                $this->db->select('location_id, location');
                $this->db->where('location_id', $crm['location_id']);
                $location_data = $this->db->get('tbl_location')->row();
                if ($location_data->location == null) {
                    $location_name = '';
                } else {
                    $location_name = $location_data->location;
                }
                $crmData = array(
                    'emp_name' => $emp_name,
                    'cust_type' => $crm['cust_type'],
                    'company_name' => $crm['company_name'],
                    'contact_person_name1' => $crm['contact_person_name1'],
                    'phone_no' => $crm['phone_no'],
                    'email' => $crm['email'],
                    'address' => $crm['address'],
                    'city' => $crm['city'],
                    'created_date' => $crm['created_date'],
                    'location' => $location_name,
                    'group_name' => $group_name,
                    'created_date' => $crm['created_date']
                );
                array_push($final_array, $crmData);
            }
            return $final_array;
        }
    }

    public function AllContact()
    {
        $org_id = $this->session->org_id;
        $query = "SELECT `tbl_customer`.*, `countries`.`name` as `c_name`, `states`.`name` as `s_name`, `tbl_type`.`title`, `tbl_group`.`group_name`, `tbl_location`.`location`, `tbl_credit_term`.`credit_name`, `tbl_admin_login`.`name` as `a_name` FROM `tbl_customer` LEFT JOIN `countries` ON `countries`.`id` = `tbl_customer`.`country` LEFT JOIN `states` ON `states`.`id` = `tbl_customer`.`state` LEFT JOIN `tbl_type` ON `tbl_type`.`type_id` = `tbl_customer`.`type_id` LEFT JOIN `tbl_group` ON `tbl_group`.`group_id` = `tbl_customer`.`group_id` LEFT JOIN `tbl_location` ON `tbl_location`.`location_id` = `tbl_customer`.`location_id` LEFT JOIN `tbl_credit_term` ON `tbl_credit_term`.`credit_id` = `tbl_customer`.`credit_term` LEFT JOIN `tbl_admin_login` ON `tbl_admin_login`.`id` = `tbl_customer`.`assign_to` WHERE tbl_customer.org_id= '$org_id'";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function DateRangeAllContact($formdata)
    {
        $final_array = array();
        $org_id = $this->session->org_id;
        $cust_type = $formdata['customer_type'];
        $TypeArray = implode(",", $formdata['TypeArray']);
        $group = implode(",", $formdata['group']);
        $SegmentArray = implode(",", $formdata['SegmentArray']);
        $LocationArray = implode(",", $formdata['LocationArray']);
        $EmpArray = implode(",", $formdata['EmpArray']);
        $query = "SELECT `tbl_customer`.*, `countries`.`name` as `c_name`, `states`.`name` as `s_name`, `tbl_type`.`title`, `tbl_group`.`group_name`, `tbl_location`.`location`, `tbl_credit_term`.`credit_name`, `tbl_admin_login`.`name` as `a_name` FROM `tbl_customer` LEFT JOIN `countries` ON `countries`.`id` = `tbl_customer`.`country` LEFT JOIN `states` ON `states`.`id` = `tbl_customer`.`state` LEFT JOIN `tbl_type` ON `tbl_type`.`type_id` = `tbl_customer`.`type_id` LEFT JOIN `tbl_group` ON `tbl_group`.`group_id` = `tbl_customer`.`group_id` LEFT JOIN `tbl_location` ON `tbl_location`.`location_id` = `tbl_customer`.`location_id` LEFT JOIN `tbl_credit_term` ON `tbl_credit_term`.`credit_id` = `tbl_customer`.`credit_term` LEFT JOIN `tbl_admin_login` ON `tbl_admin_login`.`id` = `tbl_customer`.`assign_to` WHERE tbl_customer.org_id= '$org_id'";

        if ($cust_type != 'All') {
            $query .= " AND tbl_customer.cust_type = '$cust_type'";
        }
        if (isset($TypeArray)) {
            $query .= " AND tbl_customer.type_id  IN ($TypeArray)";
        }
        if (isset($SegmentArray)) {
            $query .= " AND tbl_customer.business_id   IN ($SegmentArray) ";
        }
        if (isset($group)) {
            $query .= " AND tbl_customer.group_id  IN ($group) ";
        }
        if (isset($LocationArray)) {
            $query .= " AND tbl_customer.location_id  IN ($LocationArray)";
        }
        if (isset($EmpArray)) {
            $query .= " AND tbl_customer.account_manager IN  ($EmpArray) ";
        }

        $query = $this->db->query($query);
        return $query->result();
        /*
        foreach ($query->result_array() as $crm) {
            $this->db->select('id, name');
            $this->db->where('id',$crm['account_manager']);
            $emp_data = $this->db->get('tbl_admin_login')->row();
            if ($emp_data->name == null) {
                $emp_name = '';
            }else{
                $emp_name = $emp_data->name;
            }
            $this->db->select('group_id, group_name');
            $this->db->where('group_id',$crm['group_id']);
            $group_data = $this->db->get('tbl_group')->row();
            if ($group_data->group_name == null) {
                $group_name = '';
            }else{
                $group_name = $group_data->group_name;
            }
            $this->db->select('location_id, location');
            $this->db->where('location_id',$crm['location_id']);
            $location_data = $this->db->get('tbl_location')->row();
            if ($location_data->location == null) {
                $location_name = '';
            }else{
                $location_name = $location_data->location;
            }
            $crmData = array(
                'emp_name' => $emp_name,
                'cust_type' => $crm['cust_type'],
                'company_name' => $crm['company_name'],
                'contact_person_name1' => $crm['contact_person_name1'],
                'phone_no'=> $crm['phone_no'],
                'email'=> $crm['email'],
                'address'=> $crm['address'],
                'city'=> $crm['city'],
                'created_date'=> $crm['created_date'],
                'location'=> $location_name,
                'group_name'=> $group_name,
                'created_date'=> $crm['created_date']
            );
            array_push($final_array,$crmData);
        }
        return $final_array; */
    }
}
