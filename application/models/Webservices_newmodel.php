
<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservices_newmodel extends CI_Model
 {

	function __construct()
	 {
       parent::__construct(); // construct the Model class
       $this->load->database();
	 }


   	public function target_summary()
  	{
  	   $org_id=$_REQUEST['org_id'];
	   $employee_id = $_REQUEST['user_id'];
	   $user_type= $_REQUEST['user_type'];  
  	   $finalArray=array();
       $this->db->where("status",1);
       $this->db->order_by("target_type",'ASC');
       $Target=$this->db->get("tbl_target_type")->result();

       foreach ($Target as  $res) 
       {

       	 $targettype_id=$res->targettype_id;
         $TargetValue=$this->db->query(" 
         	                             SELECT * FROM `tbl_target` where employee_id='$employee_id' 
         	                             and `targettype_id` = '$targettype_id' and CURDATE() BETWEEN start_date AND end_date ")->result();
      
      	if(count($TargetValue)>0)
      	{
	         $Totalvalue=0;           
	         foreach ($TargetValue as  $val) 
	         {
	            $Totalvalue=$Totalvalue+$val->target_value;
	         }
	         $start_date=$TargetValue[0]->start_date;
	         $end_date=$TargetValue[0]->end_date;
	         $AchieveValue=$this->db->query("SELECT `targettype_value` FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and created_date>='$start_date' and created_date<='$end_date'   ")->result();
	         $TotalAchieveValue=0;           
	         foreach ($AchieveValue as  $achieve) 
	         {
	         	$TotalAchieveValue=$TotalAchieveValue+$achieve->targettype_value;
	         }        
	         $Balance=$Totalvalue-$TotalAchieveValue;
	       	 $NewArray=array(
	       	 	               'TargetName'=>$res->target_type,
	       	 	               'TargetAmount'=>$Totalvalue,
	       	 	               'TargetAchieved'=>$TotalAchieveValue,
	       	 	               'TargetBalance'=>$Balance,
	       	 	               'TargetDAR'=>0,
	       	 	               'TargetSdate'=>$start_date,
	       	 	               'TargetEdate'=>$start_date,
	       	 	            );
	       	 array_push($finalArray, $NewArray);
         } 
       }

       echo json_encode($finalArray);
  	}

   	public function todays_thought()
  	{
  		$org_id=$_REQUEST['org_id'];
  		$this->db->where('org_id',$org_id);
        $this->db->order_by('rand()');
	    $this->db->limit(1);
  		$thought=$this->db->get("tbl_thoughts")->row();
		$response["thought"] = $thought->thought;;
		echo json_encode($response);
 	}


   	public function today_schedule_list()
  	{
  		// $assign_date=date("Y-m-d");
  		
  		$date = $_REQUEST['date'];
  		$assign_date=date("Y-m-d",strtotime($date));
  		$org_id=$_REQUEST['org_id'];
  		$schedule_assign_to = $_REQUEST['employee_id'];
  		$this->db->where("status",1);
  		$this->db->where('delete_status',0);
  		$this->db->order_by("type_name",'asc');
  		$this->db->where("org_id",$org_id);	
  		$query=$this->db->get("tbl_schedule_type_name")->result();

  		$FinalArray=array();
	    foreach ($query as $res) 
	    {
	       // $assign_date=date("Y-m-d");
	   	   $schedule_type_id=$res->id;
	   	   $this->db->select("issue_id,schedule_assign_to,schedule_type_id");
		   $this->db->where("schedule_assign_to",$schedule_assign_to);
		   $this->db->where("schedule_type_id",$schedule_type_id);	
		   $this->db->where("assign_date",$assign_date);
		   $this->db->where_not_in("reschedule",'reschedule');
		   $this->db->group_by('issue_id,schedule_assign_to,schedule_type_id'); 
	   	   $type=$this->db->get("tbl_schedule")->result();

   	       $newArray=array('name'=>$res->type_name,'count'=>count($type));
	   	   array_push($FinalArray, $newArray);
	    }
	    echo json_encode($FinalArray);

  	}


   	public function get_cust_location()
  	{
  	   $org_id=$_REQUEST['org_id'];
  	   $assign_date=date("Y-m-d");
	   $user_id =$_REQUEST['user_id'];
	   $this->db->where("schedule_assign_to",$user_id);
	   $this->db->where("assign_date",$assign_date);
	   $this->db->order_by("assign_starttime",'asc');
	   $query=$this->db->get("tbl_schedule")->result();

	   if(count($query)>0)
	   {
		   foreach ($query as $res) 
		   {
	            $ticket_no1=$res->ticket_no;
	            $explode=explode("S_", $ticket_no1);
	            $ticket_no=$explode[1];

	            $this->db->where("ticket_no",$ticket_no);
	            $this->db->where("status",'completed');
				$result_task=$this->db->get("tbl_task_status")->result();

				if(count($result_task)<=0)
				{
					$issue_id=$res->issue_id;
					$this->db->where("query_id",$issue_id);
					$result=$this->db->get("tbl_user_query")->result();
					$customer_id=$result[0]->customer_id;
					$this->db->where("customer_id",$customer_id);
					$customer=$this->db->get("tbl_customer")->result();
					$address=$customer[0]->address;

					$formattedAddr = str_replace(' ','+',$address);
					$geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&key=AIzaSyC9YQgODPIUDt-9tIajRrBRuHSfkRxSty8'); 
					$output = json_decode($geocodeFromAddr);
					$latitude  = $output->results[0]->geometry->location->lat; 
					$longitude= $output->results[0]->geometry->location->lng;

					if(empty($latitude))
					{
						$latitude=0;
					}
					if(empty($longitude))
					{
						$longitude=0;
					}					
					$response["error"] = FALSE;
					$response["latitude"] =$latitude;
					$response["longitude"] =$longitude;
					$response["customer_id"] =$customer[0]->customer_id;
					echo json_encode($response);	
					break;		
			    }
			    else
			    {
					$response["error"] = TRUE;
					echo json_encode($response);				    	
			    }
		    }	   	
	   }
		else
		{
		   $response["error"] = TRUE;
		   echo json_encode($response);				    	
		}

  	}


   	public function user_geofence()
  	{
  		   $org_id=$_REQUEST['org_id']; 
		   $user_id =$_REQUEST['user_id'];
		   $customer_id =$_REQUEST['customer_id'];
		   $status =$_REQUEST['status'];
		   if($status=='outside')
		   {
				$this->db->where("user_id",$user_id);
				$this->db->where("org_id",$org_id);
				$this->db->where("customer_id",$customer_id);
				$this->db->where("status",'inside');
				$insideres=$this->db->get("tbl_user_geofence_notification")->result();
				if(count($insideres)>0)
				{
					$this->db->where("user_id",$user_id);
					$this->db->where("customer_id",$customer_id);
					$this->db->where("status",'outside');
					$outsideres=$this->db->get("tbl_user_geofence_notification")->result();
					if(count($outsideres)<=0)
					{
		               $Insertarray=array(
						   	            'user_id'=>$user_id,
						   	            'org_id'=>$org_id,
						   	            'customer_id'=>$customer_id,
						   	            'status'=>$status,
						   	            'date_created'=>date("Y-m-d H:i:s")
						   	         );
					  $res2=$this->db->Insert("tbl_user_geofence_notification",$Insertarray);
					  if($res2)
						{
							$this->db->where("employee_id",$user_id);
							$this->db->where("customer_id",$customer_id);
							$this->db->where("org_id",$org_id);
							$this->db->where_not_in("status",'completed');
							$this->db->order_by("created_date",'desc');
							$task_status=$this->db->get("tbl_task_status")->result();

							if(count($task_status)>0)
							{
								$this->db->where("id",$user_id);
								$emp=$this->db->get("tbl_admin_login")->result();
	                            $reg_token = $emp[0]->android_id;
	                            $data = array('server_notification'=>"customer_task_status",'message'=>'You have not completed your task. Please complete the task');
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
	                               //echo 1;
	                            }
	                             curl_close($ch);
							}

							//--------------------------------------------
							$response["error"] = FALSE;
						    $response["error_msg"] = "Employee $status Customer Location";
						    echo json_encode($response);
						}
						else
						{
							$response["error"] = TRUE;
						    $response["error_msg"] = "Failed";
						    echo json_encode($response);
						}
					}
					else
					{
							$response["error"] = TRUE;
						    $response["error_msg"] = "Employee $status Customer Location";
						    echo json_encode($response);						
					}
				}	
				else
				{
						$response["error"] = TRUE;
					    $response["error_msg"] = "Employee $status Customer Location";
					    echo json_encode($response);						
				}

		   }
		   else
		   {
				$this->db->where("user_id",$user_id);
				$this->db->where("customer_id",$customer_id);
				$this->db->where("org_id",$org_id);
				$this->db->where("status",'inside');
				$insideres=$this->db->get("tbl_user_geofence_notification")->result();
				if(count($insideres)<=0)
				{
				   $Insertarray=array(
				   	            'user_id'=>$user_id,
				   	            'org_id'=>$org_id,
				   	            'customer_id'=>$customer_id,
				   	            'status'=>$status,
				   	            'date_created'=>date("Y-m-d H:i:s")
				   	          );
				  $res=$this->db->Insert("tbl_user_geofence_notification",$Insertarray);
				  if($res)
					{
						$response["error"] = FALSE;
					    $response["error_msg"] = "Employee $status Customer Location";
					    echo json_encode($response);
					}
					else
					{
						$response["error"] = TRUE;
					    $response["error_msg"] = "Failed";
					    echo json_encode($response);
					}					
				}
				else
				{
						$response["error"] = FALSE;
					    $response["error_msg"] = "Employee $status Customer Location";
					    echo json_encode($response);					
				}
		   }
	}   


   	public function schedule_emp_list()
  	{
  		$org_id=$_REQUEST['org_id'];
  		$emp_id=$_REQUEST['emp_id'];
  		$this->db->select("name,id");
		$this->db->where("user_type","E");
		$this->db->where_not_in("id",$emp_id);
		$this->db->where("user_status",1);
		$this->db->where('delete_status',0);
		$this->db->where('org_id',$org_id);
		$employee=$this->db->get("tbl_admin_login")->result();
	   if($employee)
		{
		    echo json_encode($employee);
		}
		else
		{
			$response["error"] = TRUE;
		    $response["error_msg"] = "Failed";
		    echo json_encode($response);
		}	
	}

   	public function user_permission()
  	{
  		$org_id=$_REQUEST['org_id'];
  		$emp_id=$_REQUEST['emp_id'];
  		$title_id=1;
		$this->db->where("title_id",$title_id);
		$this->db->where("emp_id",$emp_id);
		
		$this->db->where("org_id",$org_id);

		$permission=$this->db->get("tbl_user_permission")->result();
		 if($permission)
			{
				$response["error"] = FALSE;
			    $response["error_msg"] =$permission[0]->status;
			    echo json_encode($response);
			}
			else
			{
				$response["error"] = FALSE;
			    $response["error_msg"] =1;
			    echo json_encode($response);
				// $response["error"] = TRUE;
			 //    $response["error_msg"] = "Failed";
			 //    echo json_encode($response);
			}	
  	}

//-------------------------------------------------------------------------------
      	public function assign_emp_schedule($query,$product_id,$product_name,$customer_id,$employee_id,$schedule_date,$start_time,$end_time,$schedule_type,$overlapping,$schedule_type_id,$user_id)
      	{
      		$priority=$_REQUEST['priority'];
      		$remark=$_REQUEST['query'];

	          $sche_date=date("d M, Y",strtotime($schedule_date));
	          $sche_time=date("H:ia",strtotime($start_time)).' TO '.date("H:ia",strtotime($end_time));

      		$org_id=$_REQUEST['org_id'];
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
						

      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$schedule_date1')"); 
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

								$response["error"] = FALSE;
								$response["error_msg"] = "Query/Issue submitted successfully";
								echo json_encode($response);	
      					}
      					else
      					{
      						$response["error"] = TRUE;
							$response["error_msg"] = "Failed to submit";
							echo json_encode($response);
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

	      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$schedule_date1')"); 
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

								$response["error"] = FALSE;
								$response["error_msg"] = "Query/Issue submitted successfully";
								echo json_encode($response);	
	      					}
	      					else
	      					{
	      						$response["error"] = TRUE;
								$response["error_msg"] = "Failed to submit";
								echo json_encode($response);
	      					}
	                }
	                else
	                {
	                   			$response["error"] = TRUE;
								$response["error_msg"] = "overlapping";
								echo json_encode($response);
	                }
      		}			
      	}
//---------------------------------------------------------------------------------

 }
