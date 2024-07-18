<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Assign_query_activity_for extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $type = $this->input->post('type');
        $leadopp_id = $this->input->post('leadopp_id');
        $query = $this->input->post('query');
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $customer_id = $this->input->post('customer_id');
        $employee_id = $this->input->post('employee_id');
        $schedule_date = $this->input->post('schedule_date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $schedule_type = $this->input->post('schedule_type'); // Like case, own, task
        $schedule_type_id = $this->input->post('schedule_type_id');// Like onsite visit and online support etc...
        $overlapping = $this->input->post('overlapping');
        $org_id = $this->input->post('org_id');
		$priority_name = $this->input->post('priority_name');
        if ($query != '' && $product_id != '' && $customer_id != '' && $employee_id != '' && $schedule_date != '' && $start_time != '' && $end_time != '' && $schedule_type != '' && $overlapping != '' && $schedule_type_id != '') 
        {
            if ($overlapping == 'YES') 
            {
                $date = date("Y-m-d H:i:s");
                $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $max = strlen($string) - 1;
                $token = '';
                for ($i = 0; $i < 6; $i++) 
                {
                    $token .= $string[mt_rand(0, $max)];
                }
                $salt = $token;
                $schedule_date_1 = str_replace(',', ' ', $schedule_date);
                $schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
                $result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
                if ($result) 
                {
                    $result1 = $result->ticket_no;
                    $pre_date = explode('-', $result1);
                    $previous_date = $pre_date[0];
                    $ticket_no = $pre_date[1];
                    $cur_date = date("Ymd");
                    if ($previous_date == $cur_date) 
                    {
                        $ticket_no++;
                        $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                        $final_ticket_num = $cur_date . '-' . $ticket_no1;
                        $schedule_ticket_num = 'S_' . $cur_date . '-' . $ticket_no1;
                    } 
                    else 
                    {
                        $final_ticket_num = $cur_date . '-' . '001';
                        $schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
                    }
                } 
                else 
                {
                    $cur_date = date("Ymd");
                    $final_ticket_num = $cur_date . '-' . '001';
                    $schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
                }


                $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$priority_name','$schedule_date1')");
                $insert_id = $this->db->insert_id();

                if ($data) 
                {
                    $this->db->query(" INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`,`type`,`leadopp_id`) VALUES ('$org_id','$employee_id','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date','$type','$leadopp_id') ");
                    $schedule_insert_id = $this->db->insert_id();
                    $TaskArray = array(
                        'employee_id' => $employee_id,
                        'customer_id' => $customer_id,
                        'org_id' => $org_id,
                        'product_id' => $product_id,
                        'query_id' => $insert_id,
                        'schedule_id' => $schedule_insert_id,
                        'ticket_no' => $final_ticket_num,
                        'remark' => $query,
                        'status' => 'pending',
                        'created_date' => date("Y-m-d H:i:s")
                    );
                    $this->db->Insert("tbl_task_status", $TaskArray);

                    $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                    $name = $emp_name->name;
                    //======================= sending notification to customer regarding assign issue ===============
                    $data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $android_id = $data3->android_id;
                    // $contact_person_name1 = $data2->contact_person_name1;
                    // ----------------- Insertinf notification to table ---------------------------
                    $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                    $date = date("Y-m-d H:i:s");
                    $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                    $notification_id1 = $this->db->insert_id($res1);
                    // ----------------- Insertinf notification to table ---------------------------
                    $reg_token = $android_id;
                    $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1);
                    $target = $reg_token;
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                    $fields = array();
                    $fields['data'] = $data;
                    if (is_array($target)) 
                    {
                        $fields['registration_ids'] = $target;
                    } 
                    else 
                    {
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
                    if ($result === FALSE) 
                    {
                        die('FCM Send Error: ' . curl_error($ch));
                    } 
                    else 
                    {
                        $notification_date = date("Y-m-d", strtotime($schedule_date));
                        $this->db->set('assign_to', $employee_id);
                        $this->db->where('query_id', $insert_id);
                        $this->db->update('tbl_user_query');
                        // echo 1;
                    }
                    curl_close($ch);
                    $responce = array(
                        'status'=>200,
                        // 'msg' =>'Query/Issue Added Successfully'
                        'msg' =>'Task Assigned Successfully'
                        ); 
                } 
                else
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Failed to assign'
                        );
                }
            } 
            else 
            {
                $schedule_date_1 = str_replace(',', ' ', $schedule_date);
                $schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
                // $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
                $s_time = $start_time;
                $e_time = $end_time;
                $emp_id = $employee_id;

                $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
                $available_count = $available->num_rows();

                if ($available_count == 0) 
                {
                    $date = date("Y-m-d H:i:s");
                    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    $max = strlen($string) - 1;
                    $token = '';
                    for ($i = 0; $i < 6; $i++) 
                    {
                        $token .= $string[mt_rand(0, $max)];
                    }
                    $salt = $token;
                    $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
                    $result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
                    if ($result) 
                    {
                        $result1 = $result->ticket_no;
                        $pre_date = explode('-', $result1);

                        $previous_date = $pre_date[0]; // from table last date
                        $ticket_no = $pre_date[1]; // from table last ticket no
                        $cur_date = date("Ymd"); // current date
                        if ($previous_date == $cur_date) 
                        {
                            $ticket_no++;
                            $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                            $final_ticket_num = $cur_date . '-' . $ticket_no1;
                            $schedule_ticket_num = 'S_' . $cur_date . '-' . $ticket_no1;
                        } 
                        else 
                        {
                            $final_ticket_num = $cur_date . '-' . '001';
                            $schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
                        }
                    } 
                    else 
                    {
                        $cur_date = date("Ymd"); // current date
                        $final_ticket_num = $cur_date . '-' . '001';
                        $schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
                    }
                    // echo $cur_date=date("Ymd");
                    $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$priority_name','$schedule_date1')");
                    $insert_id = $this->db->insert_id();
                    if ($data) 
                    {
                        $this->db->query(" INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`,`type`,`leadopp_id`) VALUES ('$org_id','$employee_id','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date','$type','$leadopp_id') ");
                        $schedule_insert_id = $this->db->insert_id();

                        $TaskArray = array(
                            'employee_id' => $employee_id,
                            'customer_id' => $customer_id,
                            'product_id' => $product_id,
                            'org_id' => $org_id,
                            'query_id' => $insert_id,
                            'schedule_id' => $schedule_insert_id,
                            'ticket_no' => $final_ticket_num,
                            'remark' => $query,
                            'status' => 'pending',
                            'created_date' => date("Y-m-d H:i:s")
                        );

                        $this->db->Insert("tbl_task_status", $TaskArray);

                        $emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                        $name = $emp_name->name;
                        $data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                        $android_id = $data3->android_id;
                        $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                        $date = date("Y-m-d H:i:s");
                        $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                        $notification_id1 = $this->db->insert_id($res1);

                        // ------- Insertinf notification to table -------------------

                        $reg_token = $android_id;
                        $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1);
                        $target = $reg_token;
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                        $fields = array();
                        $fields['data'] = $data;
                        if (is_array($target)) 
                        {
                            $fields['registration_ids'] = $target;
                        } 
                        else 
                        {
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
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        } 
                        else 
                        {
                            $notification_date = date("Y-m-d", strtotime($schedule_date));
                            $this->db->set('assign_to', $employee_id);
                            $this->db->where('query_id', $insert_id);
                            $this->db->update('tbl_user_query');
                            // echo 1;
                        }
                        curl_close($ch);

                        //=============== Sending notification to customer regarding assign issue ===============

                        $responce = array(
                            'status'=>200,
                            // 'msg' =>'Query/Issue Added Successfully'
                            'msg' =>'Task Assigned Successfully'
                            );   
                    } 
                    else 
                    {
                        $responce = array(
                            'status'=>500,
                            'msg' =>'Failed to assign'
                            );
                    }
                } 
                else 
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Overlapping'
                        );
                }
            }
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Failed to assign'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}