<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Update_task_status extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
        $employee_id = $this->input->post('employee_id');
        $customer_id = $this->input->post('customer_id');
        $product_id = $this->input->post('product_id');
        $query_id = $this->input->post('query_id');
        $schedule_id = $this->input->post('schedule_id');
        $ticket_no = $this->input->post('ticket_no');
        $remark = $this->input->post('remark');
        $status = $this->input->post('status');
		$date = date("Y-m-d H:i:s");
		$TaskArray = array(
			'employee_id' => $employee_id,
			'customer_id' => $customer_id,
			'product_id' => $product_id,
			'org_id' => $org_id,
			'query_id' => $query_id,
			'schedule_id' => $schedule_id,
			'ticket_no' => $ticket_no,
			'remark' => $remark,
			'status' => $status,
			'created_date' => date("Y-m-d H:i:s")
		);
		$data = $this->db->Insert("tbl_task_status", $TaskArray);
		$data1 = $this->db->query("SELECT query_id FROM `tbl_user_query` WHERE `ticket_no`='$ticket_no'")->row();
		$query_id = $data1->query_id;
		if ($data) {
			$data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			$android_id = $data3->android_id;

			if ($status == 'in_progress') 
            {
				$change_status = "In Progress";
				$title = "Query in_progress";
			} 
            else if ($status == 'pending') 
            {
				$change_status = "Pending";
				$title = "Query pending";
			} 
            else if ($status == 'completed') 
            {
				$change_status = "Completed";
				$title = "Query resolved";
			} 
            else if ($status == 'in_complete') 
            {
				$reschedule = 'reschedule';
				$this->db->set('reschedule', $reschedule);
				$where = array('issue_id' => $query_id, 'schedule_assign_to' => $employee_id);
				$this->db->where($where);
				$this->db->update('tbl_schedule');
				$change_status = "In Complete";
				$title = "Query transfer";
			}
			//=============  inserting notification to table and getting last inserted id
			$notification_msg = "Your issue " . $ticket_no . " is " . $change_status;
			$date = date("Y-m-d H:i:s");
			$res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$employee_id','$customer_id','$title','$notification_msg','$status','$date')");
			$notification_id = $this->db->insert_id($res);
			//===============  inserting notification to table and getting last inserted id

			$reg_token = $android_id;
			$data = array('server_notification' => "customer_query_status_updated", 'message' => $notification_msg, 'query_id' => $query_id, 'notification_id' => $notification_id);
			$target = $reg_token;
			$url = 'https://fcm.googleapis.com/fcm/send';
			$server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
			$fields = array();
			$fields['data'] = $data;
			if (is_array($target)) {
				$fields['registration_ids'] = $target;
			} else {
				$fields['to'] = $target;
			}
			$headers = array(
				'Content-Type:application/json',
				'Authorization:key=' . $server_key
			);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

			$result = curl_exec($ch);
			if ($result === FALSE) {
				die('FCM Send Error: ' . curl_error($ch));
			} else {
				// echo 1;
			}
			curl_close($ch);

			$this->db->set('status', $status);
			$this->db->where('query_id', $query_id);
			$update = $this->db->update('tbl_user_query');
			if($update)
			{
				$responce = array(
					'status'=>200,
					'msg' =>'Status Updated Successfully'
					);
			}
			else
			{
				$responce = array(
					'status'=>500,
					'msg' =>'Something Went Wrong',
					'data' => ''
					);
			}
		} 
		else 
		{
			$responce = array(
				'status'=>500,
				'msg' =>'Something Went Wrong',
				'data' => ''
				);
		}
		$this->response($responce, REST_Controller::HTTP_OK);
	}
}