<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Issues_tracking_customer extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
        $org_id = $this->input->post('org_id');
		$data = $this->db->query("SELECT query_id,assign_to,created_date,ticket_no,product_name,status,issue,product_id FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`!='0' AND `status`!='in_complete' ORDER BY created_date DESC ");
		$allocated_array = array();
		foreach ($data->result() as $value) 
        {
            
			$query_id = $value->query_id;
			$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
			$schedule_type_id = $data1->schedule_type_id;

			if ($schedule_type_id != '') 
            {
				$visit_type = $this->db->query("SELECT type_name FROM `tbl_schedule_type_name` WHERE `id`='$schedule_type_id'")->row();
                if(!empty($visit_type))
                {
                    $schedulevisit_type = $visit_type->type_name;
                }
                else
                {
                    $schedulevisit_type = '';
                }
				
			} 
            else 
            {
				$schedulevisit_type = 'NA';
			}

			$emp_id = $value->assign_to;
            $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
            if(!empty($data2))
            {
                $emp_name = $data2->name;
                $emp_email = $data2->email;
                $emp_mobile_no = $data2->mobile_no;
            }
            else
            {
                $emp_name = '';
                $emp_email = '';
                $emp_mobile_no = '';
            }
			

			$assign_starttime = date("h:i A", strtotime($data1->assign_starttime));
			$assign_endtime = date("h:i A", strtotime($data1->assign_endtime));

			$created_date = date("d M Y", strtotime($value->created_date));
			$assign_date = date("d M Y", strtotime($data1->assign_date));

			// ------------------------------- Check IMEI for chat --------------------------------
			$cust_imei = $this->db->query("SELECT imei,city FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			$imei = $cust_imei->imei;
			$city = $cust_imei->city;
			if ($imei != '') {
				$chatstatus = "YES";
			} else {
				$chatstatus = "NO";
			}
			// ------------------------------- / Check IMEI for chat --------------------------------

			$arr = array(
				'emp_id' => $emp_id,
				'employee_name' => $emp_name,
				'ticket_no' => $value->ticket_no,
				'assign_date' => $assign_date,
				// 'priority_name' => $value->priority,
				'assign_starttime' => $assign_starttime,
				'assign_endtime' => $assign_endtime,
				'schedule_id' => $data1->schedule_id,
				'query_id' => $query_id,
				'schedule_type' => $data1->schedule_type,
				'schedule_visit_type' => $schedulevisit_type,
				'product_name' => $value->product_name,
				'status' => $value->status,
				'created_date' => $created_date,
				'email' => $emp_email,
				'mobile_no' => $emp_mobile_no,
				'issue' => $value->issue,
				'product_id' => $value->product_id,
				'chat_status' => $chatstatus,
				'city' =>$city

			);
			array_push($allocated_array, $arr);
		}

        if ($allocated_array) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Issues Tracking List Fetched Successfully',
                'data' => $allocated_array
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