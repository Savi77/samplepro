<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_query_customer extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {

        $org_id = $this->input->post('org_id');
        $customer_id = $this->input->post('customer_id');
		$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `org_id`='$org_id' AND `customer_id`='$customer_id' AND `assign_to`='0' ORDER BY `query_id` DESC")->result();
		// $single_task_list = array();
		// foreach ($data as $value) 
        // {

		// 	$employee_id1 = $value->assign_to;
		// 	$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
		// 	// $employee_name = $data2->name;
		// 	$area2 = "";
		// 	$area3 = "";
		// 	$area4 = "";
		// 	foreach ($data2->result() as $multiple_employee) 
        //     {
		// 		$area2 = $area2 . $multiple_employee->name . " ,";
		// 		$area4 = $area4 . $multiple_employee->mobile_no . " ,";
		// 	}
		// 	$employee_name = trim($area2, ',');
		// 	$employee_email = trim($area3, ',');
		// 	$employee_contact_no = trim($area4, ',');
		// 	$array = explode(',', $employee_contact_no);
		// 	$emp_number = $array[0];
		// 	$created_datetime = date("d M Y, h:i A", strtotime($value->created_date));

		// 	$arr = array(
		// 		'query_id' => $value->query_id,
		// 		'customer_id' => $value->customer_id,
		// 		'product_id' => $value->product_id,
		// 		'ticket_no' => $value->ticket_no,
		// 		'product_name' => $value->product_name,
		// 		'issue' => $value->issue,
		// 		'status' => $value->status,
		// 		'created_date' => $created_datetime,
		// 		// 'created_time'=>$created_time,

		// 		'name' => $employee_name,
		// 		'email' => $employee_email,
		// 		'phone_no' => $emp_number
		// 	);
		// 	array_push($single_task_list, $arr);
		// }
		$FinalArray=array();
		
		foreach ($data as $res) 
	    {
			$final_data = array(
				"query_id"=> $res->query_id,
				"org_id"=> $res->org_id,
				"customer_id"=> $res->customer_id,
				"product_id"=> $res->product_id,
				"ticket_no"=> $res->ticket_no,
				"product_name"=> $res->product_name,
				"issue"=> $res->issue,
				"status"=> ucfirst($res->status),
				"feedback"=> $res->feedback,
				"user_remark"=> $res->user_remark,
				"rating"=> $res->rating,
				"assign_to"=> $res->assign_to,
				"priority"=> $res->priority,
				"activity_id"=> $res->activity_id,
				"activity_name"=> $res->activity_name,
				"type"=> $res->type,
				"assign_date"=> date("d M Y", strtotime($res->assign_date)),
				"assign_starttime"=> $res->assign_starttime,
				"assign_endtime"=> $res->assign_endtime,
				"delete_status"=> $res->delete_status,
				"created_date"=> $res->created_date
			);
			array_push($FinalArray, $final_data);
		}

        
        if ($data) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Customer Query List Fetched Successfully',
                'data' => $FinalArray
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data'=>'',
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);

    }
}