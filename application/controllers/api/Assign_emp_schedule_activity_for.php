<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Assign_emp_schedule_activity_for extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $query = $this->input->post('query');
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $customer_id = $this->input->post('customer_id');
        $employee_id = $this->input->post('employee_id');
        $schedule_date = $this->input->post('schedule_date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $schedule_type = $this->input->post('schedule_type'); // Like case, own, task
        $schedule_type_id = $this->input->post('schedule_type_id'); // Like onsite visit and online support etc...
        $overlapping = $this->input->post('overlapping'); // No then validate and if yes then insert
        $user_id = $this->input->post('user_id'); //select employee nae
        $priority= $this->input->post('priority');
      	$remark= $this->input->post('remark');
        $org_id= $this->input->post('org_id');

        if ($query != '' && $product_id != '' && $customer_id != '' && $employee_id != '' && $schedule_date != '' && $start_time != '' && $end_time != '' && $schedule_type != '' && $overlapping != '' && $schedule_type_id != '') 
        {
	          $sche_date=date("d M, Y",strtotime($schedule_date));
	          $sche_time=date("H:ia",strtotime($start_time)).' TO '.date("H:ia",strtotime($end_time));

      		if ($overlapping=='YES') 
      		{
      					$date=date("Y-m-d H:i:s");
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
							$result1=$result->ticket_no;
							$pre_date = explode('-', $result1);
							$previous_date = $pre_date[0]; // from table last date
							$ticket_no = $pre_date[1]; // from table last ticket no
							$cur_date=date("Ymd"); // current date
							if ($previous_date==$cur_date) 
							{
								$ticket_no++;
								$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
								$final_ticket_num = $cur_date.'-'.$ticket_no1;
								$schedule_ticket_num='S_'.$cur_date.'-'.$ticket_no1;
							}
							else
							{
								$final_ticket_num=$cur_date.'-'.'001';
								$schedule_ticket_num='S_'.$cur_date.'-'.'001';
							}
						}
						else
						{
							$cur_date=date("Ymd"); // current date
							$final_ticket_num=$cur_date.'-'.'001';
							$schedule_ticket_num='S_'.$cur_date.'-'.'001';
						}
						

      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`assign_date`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$schedule_date1','$priority')"); 
      					$insert_id = $this->db->insert_id();
      					if ($data) 
      					{
      						$this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$user_id','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

      						$emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                            $name = $emp_name->name;

      						//======================= sending notification to customer regarding assign issue ===============

                                 $data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                 $android_id = $data3->android_id;
                                 // $contact_person_name1 = $data2->contact_person_name1;

                                 // ----------------- Insertinf notification to table ---------------------------

                                 $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
                                      $date=date("Y-m-d H:i:s");
                                      
                                 $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                                  $notification_id1 = $this->db->insert_id($res1);

                                // ----------------- Insertinf notification to table ---------------------------

                                $reg_token = $android_id;
                                $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$final_ticket_num.' is assign to '.$name,'query_id'=>$insert_id,'notification_id'=>$notification_id1,'date'=>$sche_date,'time'=>$sche_time);
                                  $target = $reg_token; 
                                  $url = 'https://fcm.googleapis.com/fcm/send';
                                  $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                  $fields = array();
                                  $fields['data'] = $data;
                                  if(is_array($target))
                                  {
                                    $fields['registration_ids'] = $target;
                                  }
                                  else
                                  {
                                    $fields['to'] = $target;
                                  }
                                  $headers = array(
                                    'Content-Type:application/json',
                                    'Authorization:key='.$server_key
                                  );

                                   $ch = curl_init();
                                  curl_setopt($ch, CURLOPT_URL, $url);
                                  curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
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
                                      $this->db->set('assign_to',$employee_id);
                                      $this->db->where('query_id',$insert_id);
                                      $this->db->update('tbl_user_query');
                                      // echo 1;
                                  }
                                curl_close($ch);


                                //----- Employee Notification ------------------------------------                              
                        		 $this->db->select("android_id,name");
                      		     $this->db->where("id",$employee_id);
                                 $emp_result = $this->db->get("tbl_admin_login")->row();

                        		 $this->db->select("company_name");
                      		     $this->db->where("customer_id",$customer_id);
                                 $comp_result = $this->db->get("tbl_customer")->row();


								 $data22 = array('server_notification'=>"employee_task_allocated",'message'=>' You have been allocated new task for '.$comp_result->company_name.' assigned by '.$emp_result->name.' click here for more details','query_id'=>$insert_id,'notification_id'=>$notification_id1,'ticket_no'=>$schedule_ticket_num,'company_name'=>$comp_result->company_name,'product'=>$product_name,'assigned_by'=>$emp_result->name,'priority'=>$priority,'remark'=>$remark,'date'=>$sche_date,'time'=>$sche_time);


                                  $target22 = $emp_result->android_id; 
                                  $url22 = 'https://fcm.googleapis.com/fcm/send';
                                  $server_key22 = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';

                                  $fields22 = array();
                                  $fields22['data'] = $data22;
                                  if(is_array($target22))
                                  {
                                    $fields22['registration_ids'] = $target22;
                                  }
                                  else
                                  {
                                    $fields22['to'] = $target22;
                                  }

                                  $headers22 = array(
                                    'Content-Type:application/json',
                                    'Authorization:key='.$server_key22
                                  );

                                  $ch22 = curl_init();
                                  curl_setopt($ch22, CURLOPT_URL, $url22);
                                  curl_setopt($ch22, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                  curl_setopt($ch22, CURLOPT_POST, true);
                                  curl_setopt($ch22, CURLOPT_HTTPHEADER, $headers22);
                                  curl_setopt($ch22, CURLOPT_RETURNTRANSFER, true);
                                  curl_setopt($ch22, CURLOPT_SSL_VERIFYHOST, 0);
                                  curl_setopt($ch22, CURLOPT_SSL_VERIFYPEER, false);
                                  curl_setopt($ch22, CURLOPT_POSTFIELDS, json_encode($fields22));
                                  $result22 = curl_exec($ch22);
                                  if ($result22 === FALSE) 
                                  {
                                      die('FCM Send Error: ' . curl_error($ch22));
                                  }
                                 curl_close($ch22);
                                //----------------------------------------------------

								$responce = array(
                                    'status'=>200,
                                    'msg' =>'Query/Issue Submitted Successfully'
                                );	
      					}
      					else
      					{
                            $responce = array(
                                'status'=>500,
                                'msg' =>'Failed to submit'
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
	               // $available = $this->db->query("SELECT count(schedule_id) as count from tbl_schedule where `assign_endtime` BETWEEN '$s_time' AND '$e_time' AND `assign_starttime` BETWEEN '$s_time' AND '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id'")->row();

	              $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");

                $available_count = $available->num_rows();
	                if ($available_count==0) 
	                {
	                		$date=date("Y-m-d H:i:s");

	      					$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
							$max = strlen($string) - 1;
							$token = '';
							for ($i = 0; $i < 6; $i++) {
								$token .= $string[mt_rand(0, $max)];
							}	
							$salt = $token;

							// $start_value = 0001;
							// echo $invID = str_pad($start_value, 3, '0', STR_PAD_LEFT);

							$schedule_date1 = date("Y-m-d", strtotime($schedule_date));

							$result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
							if ($result) 
							{
								$result1=$result->ticket_no;
								$pre_date = explode('-', $result1);

								$previous_date = $pre_date[0]; // from table last date
								$ticket_no = $pre_date[1]; // from table last ticket no

								$cur_date=date("Ymd"); // current date
								if ($previous_date==$cur_date) 
								{
									$ticket_no++;
									$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
									$final_ticket_num = $cur_date.'-'.$ticket_no1;
									$schedule_ticket_num='S_'.$cur_date.'-'.$ticket_no1;
								}
								else
								{
									$final_ticket_num=$cur_date.'-'.'001';
									$schedule_ticket_num='S_'.$cur_date.'-'.'001';
								}
							}
							else
							{
								$cur_date=date("Ymd"); // current date
								$final_ticket_num=$cur_date.'-'.'001';
								$schedule_ticket_num='S_'.$cur_date.'-'.'001';
							}

	      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`assign_date`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$schedule_date1','$priority)"); 
	      					$insert_id = $this->db->insert_id();
	      					if ($data) 
	      					{
	      						$this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by` , `issue_id`, `schedule_assign_to`, `schedule_type_id`,`ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$user_id','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

	      						$emp_name = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
	                            $name = $emp_name->name;

	      						//======================= sending notification to customer regarding assign issue ===============

	                                 $data3 = $this->db->query("SELECT android_id FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
	                                 $android_id = $data3->android_id;
	                                 // $contact_person_name1 = $data2->contact_person_name1;

	                                 // -------- Insertinf notification to table ---------------------------

	                                 $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
	                                      $date=date("Y-m-d H:i:s");
	                                      
	                                 $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
	                                  $notification_id1 = $this->db->insert_id($res1);

	                                // ------- Insertinf notification to table ---------------------------

	                                $reg_token = $android_id;
	                                $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$final_ticket_num.' is assign to '.$name,'query_id'=>$insert_id,'notification_id'=>$notification_id1);
	                                  $target = $reg_token; 
	                                  $url = 'https://fcm.googleapis.com/fcm/send';
	                                  $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
	                                  $fields = array();
	                                  $fields['data'] = $data;
	                                  if(is_array($target))
	                                  {
	                                    $fields['registration_ids'] = $target;
	                                  }
	                                  else
	                                  {
	                                    $fields['to'] = $target;
	                                  }
	                                  $headers = array(
	                                    'Content-Type:application/json',
	                                    'Authorization:key='.$server_key
	                                  );

	                                  $ch = curl_init();
	                                  curl_setopt($ch, CURLOPT_URL, $url);
	                                  curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
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
	                                      $this->db->set('assign_to',$employee_id);
	                                      $this->db->where('query_id',$insert_id);
	                                      $this->db->update('tbl_user_query');
	                                  }
	                                   curl_close($ch);


                                //----- Employee Notification ------------------------------------                              
                        		 $this->db->select("android_id,name");
                      		     $this->db->where("id",$employee_id);
                                 $emp_result = $this->db->get("tbl_admin_login")->row();

                        		 $this->db->select("company_name");
                      		     $this->db->where("customer_id",$customer_id);
                                 $comp_result = $this->db->get("tbl_customer")->row();


								 $data22 = array('server_notification'=>"employee_task_allocated",'message'=>' You have been allocated new task for '.$comp_result->company_name.' assigned by '.$emp_result->name.' click here for more details','query_id'=>$insert_id,'notification_id'=>$notification_id1,'ticket_no'=>$schedule_ticket_num,'company_name'=>$comp_result->company_name,'product'=>$product_name,'assigned_by'=>$emp_result->name,'priority'=>$priority,'remark'=>$remark,'date'=>$sche_date,'time'=>$sche_time);


                                  $target22 = $emp_result->android_id; 
                                  $url22 = 'https://fcm.googleapis.com/fcm/send';
                                  $server_key22 = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';

                                  $fields22 = array();
                                  $fields22['data'] = $data22;

                                  if(is_array($target22))
                                  {
                                    $fields22['registration_ids'] = $target22;
                                  }
                                  else
                                  {
                                    $fields22['to'] = $target22;
                                  }

                                  $headers22 = array(
                                    'Content-Type:application/json',
                                    'Authorization:key='.$server_key22
                                  );

                                  $ch22 = curl_init();
                                  curl_setopt($ch22, CURLOPT_URL, $url22);
                                  curl_setopt($ch22, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                  curl_setopt($ch22, CURLOPT_POST, true);
                                  curl_setopt($ch22, CURLOPT_HTTPHEADER, $headers22);
                                  curl_setopt($ch22, CURLOPT_RETURNTRANSFER, true);
                                  curl_setopt($ch22, CURLOPT_SSL_VERIFYHOST, 0);
                                  curl_setopt($ch22, CURLOPT_SSL_VERIFYPEER, false);
                                  curl_setopt($ch22, CURLOPT_POSTFIELDS, json_encode($fields22));
                                  $result22 = curl_exec($ch22);
                                  if ($result22 === FALSE) 
                                  {
                                      die('FCM Send Error: ' . curl_error($ch22));
                                  }
                                 curl_close($ch22);

                                //----------------------------------------------------

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