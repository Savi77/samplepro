<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Reschedule extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
	{

        $employee_id = $this->input->post('employee_id');
        $overlapping = $this->input->post('overlapping');
        $schedule_date = $this->input->post('schedule_date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $ticket_no = $this->input->post('ticket_no');
        $remark = $this->input->post('remark');
        $customer_id = $this->input->post('customer_id');
        $query_id = $this->input->post('query_id');
        $product_id = $this->input->post('product_id');
        $org_id = $this->input->post('org_id');

        if ($overlapping == 'YES') 
		{
			$date = date("Y-m-d H:i:s");
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));

			$schedule_result = $this->db->query("SELECT schedule_type,ticket_no,schedule_id,schedule_type_id FROM tbl_schedule WHERE issue_id='$query_id' ORDER BY schedule_id DESC limit 1")->row();

			$schedule_type = $schedule_result->schedule_type;
			$schedule_ticket_num = $schedule_result->ticket_no;
			$schedule_id = $schedule_result->schedule_id;
			$schedule_type_id = $schedule_result->schedule_type_id;

			$reschedule = "reschedule";
			$this->db->set('reschedule', $reschedule);
			$this->db->where('schedule_id', $schedule_id);
			$this->db->update('tbl_schedule');

			$ticket_reschedule = $this->db->query("SELECT ticket_no FROM tbl_user_query WHERE query_id='$query_id'")->row();
			$final_ticket_num = $ticket_reschedule->ticket_no;

			$data = $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$employee_id','$query_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
			$insert_id = $this->db->insert_id();
			if ($data) 
            {

				$this->db->query("INSERT INTO `tbl_task_status`(`org_id`,`employee_id`, `customer_id`, `product_id`,`query_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$org_id','$employee_id','$customer_id','$product_id','query_id','$schedule_id','$ticket_no','$remark','reschedule','$date') ");


				$emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
				$name = $emp_name->name;

				//======================= sending notification to customer regarding assign issue ===============

				$data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
				$android_id = $data3->android_id;
				// $contact_person_name1 = $data2->contact_person_name1;

				// ----------------- Insertinf notification to table ---------------------------

				$notification_msg = "Your issue " . $final_ticket_num . " is Schedule to " . $schedule_date . "by " . $name;
				$date = date("Y-m-d H:i:s");

				$res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$employee_id','$customer_id','Issue Re-Schedule','$notification_msg','pending','$date')");

				$notification_id1 = $this->db->insert_id($res1);

				// ----------------- Insertinf notification to table ---------------------------

				$reg_token = $android_id;
				$data = array('server_notification' => "customer_query_status_updated", 'message' => 'Your issue ' . $final_ticket_num . ' is Schedule to ' . $schedule_date . 'by ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);
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
					$notification_date = date("Y-m-d", strtotime($schedule_date));
					$pending = "pending";
					$this->db->set('status', $pending);
					$this->db->where('query_id', $query_id);
					$this->db->update('tbl_user_query');
					// echo 1;
				}
				curl_close($ch);

				//======================= / sending notification to customer regarding assign issue ===============
                $responce = array(
                    'status'=>200,
                    'msg' =>'Reschedule Submitted Successfully',
                );
			}
            else 
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>'Failed to added',
                );
			}
		} 
		else 
		{
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
			$s_time = $start_time;
			$e_time = $end_time;
			$emp_id = $employee_id;
			$available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

			$available_count = $available->num_rows();
			if ($available_count == 0) 
            {
				$date = date("Y-m-d H:i:s");
				$schedule_result = $this->db->query("SELECT schedule_type,ticket_no,schedule_id,schedule_type_id FROM tbl_schedule WHERE issue_id='$query_id' ORDER BY schedule_id DESC limit 1")->row();

				$schedule_type = $schedule_result->schedule_type;
				$schedule_ticket_num = $schedule_result->ticket_no;
				$schedule_id = $schedule_result->schedule_id;
				$schedule_type_id = $schedule_result->schedule_type_id;

				$reschedule = "reschedule";
				$this->db->set('reschedule', $reschedule);
				$this->db->where('schedule_id', $schedule_id);
				$this->db->update('tbl_schedule');

				$ticket_reschedule = $this->db->query("SELECT ticket_no FROM tbl_user_query WHERE query_id='$query_id'")->row();
				$final_ticket_num = $ticket_reschedule->ticket_no;

				$data = $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$employee_id','$query_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

				$insert_id = $this->db->insert_id();
				if ($data) {
					$this->db->query("INSERT INTO `tbl_task_status`(`org_id`,`employee_id`, `customer_id`, `product_id`,`query_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$org_id','$employee_id','$customer_id','$product_id','$query_id','$schedule_id','$ticket_no','$remark','reschedule','$date')");

					$emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
					$name = $emp_name->name;

					//======================= sending notification to customer regarding assign issue ===============

					$data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
					$android_id = $data3->android_id;
					// $contact_person_name1 = $data2->contact_person_name1;

					// ----------------- Insertinf notification to table ---------------------------

					$notification_msg = "Your issue " . $final_ticket_num . " is Schedule to " . $schedule_date . "by " . $name;
					$date = date("Y-m-d H:i:s");

					$res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$query_id','$employee_id','$customer_id','Issue Re-Schedule','$notification_msg','pending','$date')");

					$notification_id1 = $this->db->insert_id($res1);

					// ----------------- Insertinf notification to table ---------------------------

					$reg_token = $android_id;

					$data = array('server_notification' => "customer_query_status_updated", 'message' => 'Your issue ' . $final_ticket_num . ' is Schedule to ' . $schedule_date . 'by ' . $name, 'query_id' => $query_id, 'notification_id' => $notification_id1);

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
						$notification_date = date("Y-m-d", strtotime($schedule_date));
						$pending = "pending";
						$this->db->set('status', $pending);
						$this->db->where('query_id', $query_id);
						$this->db->update('tbl_user_query');
						// echo 1;
					}
					curl_close($ch);

					//======================= / sending notification to customer regarding assign issue ===============

					$responce = array(
                        'status'=>200,
                        'msg' =>'Reschedule Submitted Successfully',
                    );
				} 
                else 
                {
					$responce = array(
                        'status'=>500,
                        'msg' =>'Failed to added',
                    );
				}
			} 
            else 
            {
				$responce = array(
                    'status'=>500,
                    'msg' =>'Failed to added',
                );
			}
		}
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}