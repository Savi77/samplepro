<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservices_model extends CI_Model
 {
 	 function __construct()
	  {
	    parent::__construct(); // construct the Model class
	    $this->load->database();
	  }
//---------------------------------------------------------------------------------------------------------------------------
	  //------------------------------------------- login  --------------------------------------------------------------------------------------
		  public function check_login($mobileno, $password,$user_type) 
			  {

			  	if ($user_type=='Employee') 
			  	{
			  			$user_password=$password;
						$query = $this->db->query(" SELECT * FROM `tbl_admin_login` WHERE `mobile_no`='$mobileno'")->row();
						$response_array = array();
						if($query)
						{
							 $pass=$query->Password;
							 $user_status=$query->user_status;
							 if ($user_status==1) 
							 {
									 	// $user_password = str_replace("'", "", $pass_encrypt);
							         // echo $pass;
							         if($pass == $user_password)
							         {
							         	 	$response_array["error"] = FALSE;
											$response_array["error_msg"] = "Registration successfully.";
											$response_array['customer_id'] = $query->id;
					         	 			$response_array['company_name'] = $query->name;
					         	 			$response_array['phone_no'] = $query->mobile_no;
					         	 			$response_array['contact_person_name1'] = $query->name;
					         	 			$response_array['alternate_email'] = 'NA';
					         	 			// $response_array['authorized_person'] = $query->authorized_person;
					         	 			$response_array['email'] = $query->email;
					         	 			$response_array['city'] = 'NA';
					         	 			$response_array['country'] = 'India';
					         	 			$response_array['address'] = 'NA';
					         	 			$response_array['password'] = $query->Password;
					         	 			$response_array['dob'] = 'NA';
					         	 			$response_array['cad'] = 'NA';
					         	 			$response_array['mad'] = 'NA';
											echo json_encode($response_array);

									 }
							         else
							         {
							         	$response["error"] = TRUE;
										$response["error_msg"] = "Password does not Match";
										echo json_encode($response);
							         }
							 }
							 else
							 {
						 			$response["error"] = TRUE;
									$response["error_msg"] = "User not verified";
									echo json_encode($response);
							 }
							
						}
						else
						{
							$response["error"] = TRUE;
							$response["error_msg"] = "User does not exist";
							echo json_encode($response);
						}
			  	}
			  	else
			  	{
			  			$user_password=$password;
						$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno'")->row();
						$response_array = array();
						if($query)
						{
							 $pass=$query->password;
							// $user_password = str_replace("'", "", $pass_encrypt);
					         // echo $pass;
					         if($pass == $user_password)
					         {
					         	 	$response_array["error"] = FALSE;
									$response_array["error_msg"] = "Registration successfully.";
									$response_array['customer_id'] = $query->customer_id;
			         	 			$response_array['company_name'] = $query->company_name;
			         	 			$response_array['phone_no'] = $query->phone_no;
			         	 			$response_array['contact_person_name1'] = $query->contact_person_name1;
			         	 			$response_array['alternate_email'] = $query->alternate_email;
			         	 			// $response_array['authorized_person'] = $query->authorized_person;
			         	 			$response_array['email'] = $query->email;
			         	 			$response_array['city'] = $query->city;
			         	 			$response_array['country'] = $query->country;
			         	 			$response_array['address'] = $query->address;
			         	 			$response_array['password'] = $query->password;
			         	 			$response_array['dob'] = $query->dob;
			         	 			$response_array['cad'] = $query->company_anniversary;
			         	 			$response_array['mad'] = $query->marriage_anniversary;
									echo json_encode($response_array);
					         }
					         else
					         {
					         	$response["error"] = TRUE;
								$response["error_msg"] = "Password does not Match";
								echo json_encode($response);
					         }
						}

						else
						{
							$response["error"] = TRUE;
							$response["error_msg"] = "User does not exist";
							echo json_encode($response);
						}
			  	}		
			  	
			  }


//-----------------------------------------------------------  

//-----------------------------Validate Mobileno------------------------------ 
	  public function validate_mobileno($mobileno, $email) 
	  {

			$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' AND `email`='$email' ")->row();
			if($query)
			{
				
		         	$response["error"] = TRUE;
					$response["error_msg"] = "User is already registerd.";
					echo json_encode($response);
			}

			else
			{
				$query1 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno'")->row();
					if($query1)
					{
						
				         	$response["error"] = TRUE;
							$response["error_msg"] = "Mobile number is already registerd.";
							echo json_encode($response);
					}
					else
					{
						$query2 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `email`='$email'")->row();
						if($query2)
						{
							
					         	$response["error"] = TRUE;
								$response["error_msg"] = "Email is already registerd.";
								echo json_encode($response);
						}
						else
						{
								$response["error"] = FALSE;
								$response["error_msg"] = "New User.";
								echo json_encode($response);
						}
					}

			}
	  } 

// ---------------------------------------------------------------------------------

	public function register_new_customer($company_name,$email,$phone_no,$contact_person_name1,$alternate_email,$city,$address,$password,$country_id,$dob,$cad,$mad,$alternate_phone_no,$state_id,$type_id,$business_segment_id,$group_id,$location_id,$created_by,$landline)
	  {	
	  		$date=date("Y-m-d H:i:s"); 

	  		 $dob1 = date("Y-m-d", strtotime($dob));
	  		 // $cad1 = date("Y-m-d", strtotime($cad));
	  		 if ($mad=='' && $cad=='') 
	  		 {
	  		 	 $mad1 = "";
	  		 	 $cad1 = "";
	  		 }
	  		 else if($mad!='' && $cad!='') 
	  		 {
	  		 	 $mad1 = date("Y-m-d", strtotime($mad));
	  		 	 $cad1 = date("Y-m-d", strtotime($cad));
	  		 }
	  		 else if($mad!='' && $cad=='') 
	  		 {
	  		 	 $mad1 = date("Y-m-d", strtotime($mad));
	  		 	 $cad1 = "";
	  		 }
	  		 else if($mad=='' && $cad!='') 
	  		 {
	  		 	 $mad1 = "";
	  		 	 $cad1 = date("Y-m-d", strtotime($cad));
	  		 }

	  		 $business_segment_id12 = rtrim($business_segment_id,',');
	  		 if ($business_segment_id12!='')
	  		 {
	  		 	$business_segment_id1=$business_segment_id12;
	  		 }
	  		 else
	  		 {
	  		 	$business_segment_id1='0';
	  		 }

	  		 $company_name1 = TRIM($company_name);

			$data = $this->db->query("INSERT INTO `tbl_customer`(`created_by`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `created_date`) VALUES ('$created_by','$type_id','$business_segment_id1','$location_id','$group_id','$company_name1','$contact_person_name1','$alternate_email','$phone_no','$alternate_phone_no','$landline','$email','$address','$city','$state_id','$country_id','buro@123','$dob1','$cad1','$mad1','$date')");

			$insert_id = $this->db->insert_id();
			if ($data) 
			{
							$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `customer_id`='$insert_id'")->row();

							$user_email = $query->email;

							$response_array["error"] = FALSE;
							$response_array["error_msg"] = "Registration successfully.";
							$response_array['customer_id'] = $query->customer_id;
	         	 			$response_array['company_name'] = $query->company_name;
	         	 			$response_array['phone_no'] = $query->phone_no;
	         	 			$response_array['contact_person_name1'] = $query->contact_person_name1;
	         	 			$response_array['alternate_email'] = $query->alternate_email;
	         	 			// $response_array['authorized_person'] = $query->authorized_person;
	         	 			$response_array['email'] = $query->email;
	         	 			$response_array['city'] = $query->city;
	         	 			$response_array['country'] = $query->country;
	         	 			$response_array['address'] = $query->address;
	         	 			$response_array['password'] = $query->password;

	         	 			$response_array['dob'] = $query->dob;
	         	 			$response_array['cad'] = $query->company_anniversary;
	         	 			$response_array['mad'] = $query->marriage_anniversary;
							echo json_encode($response_array);
			}
			else
			{
							$response["error"] = TRUE;
							$response["error_msg"] = "Registration failed.";
							echo json_encode($response_array);
			}

				
	  } 



//==================================== Order Status =================================================
      	public function product_list()
      	{
      					$data = $this->db->query("SELECT product_name,product_id FROM `tbl_product` WHERE active_status='1'")->result(); 

      					echo json_encode($data);
      	}
//==================================== Order Status  =================================================

//==================================== Order Status =================================================
      	public function submit_query($query,$product_id,$product_name,$customer_id)
      	{
      					$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						$max = strlen($string) - 1;
						$token = '';
						for ($i = 0; $i < 6; $i++) {
							$token .= $string[mt_rand(0, $max)];
						}	
						$salt = $token;

						// $start_value = 0001;
						// echo $invID = str_pad($start_value, 3, '0', STR_PAD_LEFT);

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
							}
							else
							{
								$final_ticket_num=$cur_date.'-'.'001';
							}
						}
						else
						{
							$cur_date=date("Ymd"); // current date
							$final_ticket_num=$cur_date.'-'.'001';
						}
						
							// echo $cur_date=date("Ymd");


      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`) VALUES ('$customer_id','$product_id','$final_ticket_num','$product_name','$query')"); 
      					if ($data) 
      					{
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
//==================================== Order Status  =================================================
//==================================== Custer Query =================================================
      	public function query_list($customer_id)
      	{
      					$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$customer_id' ORDER BY created_date DESC")->result(); 
      					// $created_date = $value->created_date;
      					// $dayname = date();
      					$query_list=array();
      					foreach ($data as $value) 
      					{
      						$created_date = date("D, d M Y", strtotime($value->created_date));

      						$arr=array
      						(
      							'customer_id'=>$value->customer_id,
		  						'product_id'=>$value->product_id,
		  						'ticket_no'=>$value->ticket_no,
		  						'product_name'=>$value->product_name,
		  						'issue'=>$value->issue,
		  						'status'=>$value->status,
		  						'feedback'=>$value->feedback,
		  						'rating'=>$value->rating,
		  						'query_id'=>$value->query_id,
		  						'created_date'=>$created_date
      						);
      						array_push($query_list, $arr);
      					}
      					echo json_encode($query_list);
      	}
//==================================== Custer Query  =================================================
      	//==================================== tag query for status =================================================
      	public function tag_query($query_id)
      	{
      					$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->result(); 
      					
      					echo json_encode($data);
      	}
//==================================== / tag query for status  =================================================

//==================================== Add feedback =================================================
      	public function submit_feedback($feedback,$ticket_no,$customer_id,$rating)
      	{	
      					$result=array('customer_id'=>$customer_id, 'ticket_no'=>$ticket_no);
      					$this->db->where($result);
      					$this->db->set('feedback',$feedback);
      					$this->db->set('rating',$rating);
      					$data = $this->db->update('tbl_user_query'); 
      					$data1 = $this->db->affected_rows($data);
      					if ($data1) 
      					{
      						$response["error"] = FALSE;
							$response["error_msg"] = "Feedback submitted successfully";
							echo json_encode($response);
      					}
      					else
      					{
      						$response["error"] = TRUE;
							$response["error_msg"] = "Failed to submit";
							echo json_encode($response);
      					}
      					
      	}
//==================================== / Add feedback  =================================================
//==================================== Add feedback =================================================
      	public function is_feedback_submitted($ticket_no)
      	{	
      					$data = $this->db->query("SELECT feedback FROM tbl_user_query WHERE `ticket_no`='$ticket_no'")->row();
      					$feedback = $data->feedback;
      					if ($feedback=='') 
      					{
      						$response["error"] = FALSE;
							$response["error_msg"] = "Feedback empty";
							echo json_encode($response);
      					}
      					else
      					{
      						$response["error"] = TRUE;
							$response["error_msg"] = "Feedback not empty";
							echo json_encode($response);
      					}
      					
      	}
//==================================== / Add feedback  =================================================

//==================================== Get status count of issue using date range =================================================
      	public function report($employee_id,$start_date,$end_date)
      	{	
      					$start_date1 = date("Y-m-d H:i:s", strtotime($start_date));
      					$end_date1 = date("Y-m-d H:i:s", strtotime($end_date));
      					$data = $this->db->query("select count(query_id) total_queries, 
      								sum(case when status = 'pending' then 1 else 0 end) pending,
      								sum(case when status = 'inprogress' then 1 else 0 end) in_progress,
      								sum(case when status = 'completed' then 1 else 0 end) completed
      								from tbl_user_query WHERE DATE(created_date) >='$start_date1' AND DATE(created_date) <='$end_date1' AND `assign_to`='1' group by Status ")->row();

      					$data1 = $this->db->query("select AVG(rating) as rating from tbl_user_query WHERE DATE(created_date) >='$start_date1' AND DATE(created_date) <='$end_date1' AND `assign_to`='1' AND status='completed'")->row();

      					 // $rating = $data1->rating;
      					$rating = number_format((float)$data1->rating, 1, '.', '');

      					if ($data->total_queries!='') 
      					{
      						 $total_queries=$data->total_queries;
      					}
      					else
      					{
      						$total_queries=0;
      					}
      					if ($data->pending!='') 
      					{
      						 $pending=$data->pending;
      					}
      					else
      					{
      						$pending=0;
      					}
      					if ($data->in_progress!='') 
      					{
      						 $in_progress=$data->in_progress;
      					}
      					else
      					{
      						$in_progress=0;
      					}
      					if ($data->completed!='') 
      					{
      						 $completed=$data->completed;
      					}
      					else
      					{
      						$completed=0;
      					}      					
  						$arr=array
  						(
  							'total_queries'=>$total_queries,
	  						'pending'=>$pending,
	  						'in_progress'=>$in_progress,
	  						'completed'=>$completed,
	  						'rating'=>$rating,
  						);

  						echo json_encode($arr);

      					

      					
      	}
//==================================== / Get status count of issue using date range  =================================================

//==================================== Get particular customer notification =================================================
      	public function notification_list($user_id,$user_type)
      	{	
      		if ($user_type=='Customer') 
      		{
      			$data = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`=$user_id ORDER BY notification_date DESC")->result();
      			// echo json_encode($data->result());

      			$notofication_list=array();
				foreach ($data as $value) 
				{
					$notification_date = date("d M Y", strtotime($value->notification_date));

					$arr=array
					(
						'notification_id'=>$value->notification_id,
						'notification_title'=>$value->notification_title,
						'notification_msg'=>$value->notification_msg,
						'notification_to'=>$value->notification_to,
						'query_id'=>$value->query_id,
						'status'=>$value->status,
						'notification_date'=>$notification_date
					);
					array_push($notofication_list, $arr);
				}
				echo json_encode($notofication_list);

      		}
      		else
      		{
      			$data1 = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`='$user_id' ORDER BY notification_date DESC");
      			// echo json_encode($data->result());
      			// echo $count = count($data1);
      			if ($data1) 
      			{
      				$notofication_list=array();
					foreach ($data1->result() as $value) 
					{
						$notification_date = date("d M Y", strtotime($value->notification_date));

						$arr=array
						(
							'notification_id'=>$value->notification_id,
							'notification_title'=>$value->notification_title,
							'notification_msg'=>$value->notification_msg,
							'notification_to'=>$value->notification_to,
							'query_id'=>$value->query_id,
							'status'=>$value->status,
							'notification_date'=>$notification_date
						);
						array_push($notofication_list, $arr);
					}
					echo json_encode($notofication_list);
      			}
      			// $data
      		}		
      	}
//==================================== / Get particular customer notification  =================================================
//==================================== Get dashboard count =================================================
      	public function dashboard_count($user_id,$user_type)
      	{	
      		if ($user_type=='Customer') 
      		{
    //   			$data = $this->db->query("SELECT count(notification_id) as alert_count FROM `tbl_push_notification` WHERE `notification_to`=$user_id")->row();

    //   			$alert_count = $data->alert_count;

    //   			$data1 = $this->db->query("SELECT count(query_id) as track_count FROM `tbl_user_query` WHERE `customer_id`=$user_id")->row();
    //   			// echo json_encode($data->result());
    //   			$track_count = $data1->track_count;

    //   			$arr=array
				// 	(
				// 		'alert_count'=>$alert_count,
				// 		'track_count'=>$track_count
				// 	);

				// echo json_encode($arr);

      			$data = $this->db->query("SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='pending'")->row();
      			$pending_count = $data->pending_count;

      			$data1 = $this->db->query("SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='in_progress'")->row();
      			$inprogress_count = $data1->inprogress_count;

      			$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='completed'")->row();
      			$completed = $data2->completed;

      			$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `customer_id`=$user_id")->row();
      			$all = $data3->all_data;

      			$arr=array
					(
						'pending_count'=>$pending_count,
						'in_progress'=>$inprogress_count,
						'completed'=>$completed,
						'all'=>$all
					);

				echo json_encode($arr);

      		}
      		else
      		{
    //   			$data = $this->db->query("SELECT count(notification_id) as alert_count FROM `tbl_push_notification` WHERE `notification_to`=$user_id")->row();

    //   			$alert_count = $data->alert_count;

    //   			$data1 = $this->db->query("SELECT count(query_id) as track_count FROM `tbl_user_query` WHERE `assign_to`=$user_id")->row();
    //   			// echo json_encode($data->result());
    //   			$track_count = $data1->track_count;

    //   			$arr=array
				// 	(
				// 		'alert_count'=>$alert_count,
				// 		'report_count'=>$track_count
				// 	);
				// echo json_encode($arr);
				$res = $this->db->query("SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($user_id)")->row();
				$result = $res->assign_to;
				if (strpos($result, ',') !== false) 
				{
					$data = $this->db->query("SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='pending'")->row();
	      			$pending_count = $data->pending_count;

	      			$data1 = $this->db->query("SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='in_progress'")->row();
	      			$inprogress_count = $data1->inprogress_count;

	      			$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='completed'")->row();
	      			$completed = $data2->completed;

	      			$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) ")->row();
	      			$all = $data3->all_data;
				}
				else
				{
				  	$data = $this->db->query("SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='pending'")->row();
	      			$pending_count = $data->pending_count;

	      			$data1 = $this->db->query("SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='in_progress'")->row();
	      			$inprogress_count = $data1->inprogress_count;

	      			$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='completed'")->row();
	      			$completed = $data2->completed;

	      			$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `assign_to` IN($user_id) ")->row();
	      			$all = $data3->all_data;

				}

      			
      			$arr=array
					(
						'pending_count'=>$pending_count,
						'in_progress'=>$inprogress_count,
						'completed'=>$completed,
						'all'=>$all
					);

				echo json_encode($arr);

      		}		
      	}
//==================================== / Get dashboard count =================================================


//==================================== Get allocated task list =================================================
      	public function allocated_task($user_id)
      	{	
      			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `assign_to`='$user_id' ORDER BY created_date DESC ")->result();

      			$task_list=array();
				foreach ($data as $value) 
				{
					$customer_id=$value->customer_id;
					$data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
					$created_date = date("d M Y", strtotime($value->created_date));
					$arr=array
					(
						'query_id'=>$value->query_id,
						'customer_id'=>$value->customer_id,
						'product_id'=>$value->product_id,
						'ticket_no'=>$value->ticket_no,
						'product_name'=>$value->product_name,
						'issue'=>$value->issue,
						'status'=>$value->status,
						'feedback'=>$value->feedback,
						'rating'=>$value->rating,
						'assign_to'=>$value->assign_to,
						'created_date'=>$created_date,

						'company_name'=>$data1->company_name,
						'contact_person_name1'=>$data1->contact_person_name1,
						'alternate_email'=>$data1->alternate_email,
						'phone_no'=>$data1->phone_no,
						'email'=>$data1->email,
						'address'=>$data1->address,
						'city'=>$data1->city,
						'country'=>$data1->country,
					);
					array_push($task_list, $arr);
				}
				echo json_encode($task_list);
      	}
//==================================== / Get allocated task list =================================================

//==================================== Status update from employee side =================================================
      	public function update_task_status($employee_id,$customer_id,$product_id,$ticket_no,$remark,$status)
      	{	
      		$date=date("Y-m-d H:i:s");
      		$data = $this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `schedule_id`,`ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','','$ticket_no','$remark','$status','$date')");

      		$data1 = $this->db->query("SELECT query_id FROM `tbl_user_query` WHERE `ticket_no`='$ticket_no'")->row();
      		$query_id = $data1->query_id;

      		if ($data) 
			{
				 //======================= sending notification to customer regarding assign issue ===============

                           $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                           $android_id = $data3->android_id;

                           if ($status == 'in_progress')
                        	{
                        		$change_status = "In Progress";
                        		$title = "Query in_progress";
                        	}
                        	else if ($status == 'pending')
                        	{
                        		$change_status = "Pending";
                        		// $title = "Query in_progress";
                        	}
                        	else if ($status == 'completed')
                        	{
                        		$change_status = "Completed";
                        		$title = "Query resolved";
                        	}
                        	else if ($status == 'in_complete')
                        	{
                        		$reschedule='reschedule';
                        		$this->db->set('reschedule',$reschedule);
                        		$where=array('issue_id'=>$query_id, 'schedule_assign_to'=>$employee_id);
							    $this->db->where($where);
							    $this->db->update('tbl_schedule');

                        		$change_status = "In Complete";
                        		$title = "Query transfer";
                        	}

                        	//=============  inserting notification to table and getting last inserted id

                        	$notification_msg = "Your issue ".$ticket_no." is ".$change_status;
                        	$date=date("Y-m-d H:i:s");
                                
                            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$employee_id','$customer_id','$title','$notification_msg','$status','$date')");

                            $notification_id = $this->db->insert_id($res);

                          //===============  inserting notification to table and getting last inserted id

                          $reg_token = $android_id;
                          $data = array('server_notification'=>"customer_query_status_updated",'message'=>$notification_msg,'query_id'=>$query_id,'notification_id'=>$notification_id);
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
                            	
                                
                                // echo 1;
                            }
                             curl_close($ch);

                          //======================= / sending notification to customer regarding assign issue ===============


				$this->db->set('status',$status);
				$this->db->where('ticket_no',$ticket_no);
				$this->db->update('tbl_user_query');

				// $this->db->set('status',$status);
				// $this->db->where('query_id',$query_id);
				// $this->db->update('tbl_push_notification');

				$response["error"] = FALSE;
				$response["error_msg"] = "Status updated successfully";
				echo json_encode($response);
			}
			else
			{
				$response["error"] = TRUE;
				$response["error_msg"] = "Failed to update status";
				echo json_encode($response);
			}
      	}
//==================================== / Status update from employee side ==============================================

//==================================== track task list =================================================
      	public function track_task($customer_id)
      	{	
      			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$customer_id'")->result();

      			$task_list=array();
				foreach ($data as $value) 
				{
					$assign_to=$value->assign_to;
					
					$data1 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$assign_to'")->row();
					$created_date = date("d M Y", strtotime($value->created_date));
					$arr=array
					(
						'query_id'=>$value->query_id,
						'customer_id'=>$value->customer_id,
						'product_id'=>$value->product_id,
						'ticket_no'=>$value->ticket_no,
						'product_name'=>$value->product_name,
						'issue'=>$value->issue,
						'status'=>$value->status,
						'feedback'=>$value->feedback,
						'rating'=>$value->rating,
						'assign_to'=>$value->assign_to,
						'created_date'=>$created_date,

						'name'=>$data1->name,
						'email'=>$data1->email,
						'mobile_no'=>$data1->mobile_no,
						'city'=>""
					);
					array_push($task_list, $arr);
				}
				echo json_encode($task_list);
      	}
//==================================== / track task list =================================================

//==================================== Status update from employee side =================================================
      	public function save_token_id($user_id,$user_type,$token_id)
      	{	
      		
      		if ($user_type=='Customer') 
			{
				$this->db->set('android_id',$token_id);
				$this->db->where('customer_id',$user_id);
				$this->db->update('tbl_customer');
			}
			else
			{
				$this->db->set('android_id',$token_id);
				$this->db->where('id',$user_id);
				$this->db->update('tbl_admin_login');
			}
      	}
//==================================== / Status update from employee side ==============================================

//==================================== Get Task list according to status ===============================================
      	public function get_task($user_id,$user_type,$task_type)
      	{	
      		if ($user_type=='Customer') 
      		{
		      			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$user_id' AND `status`='$task_type' ORDER BY created_date DESC")->result();

		      			$task_list=array();
						foreach ($data as $value) 
						{
							$employee_id = $value->assign_to;
							if ($employee_id=='') 
							{
								$query_id=$value->query_id;
								$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
								
				      			$created_date = date("d M Y", strtotime($value->created_date));

				      			$assign_date = date("d M Y", strtotime($data1->assign_date));
				      			$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
                        		$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

								$arr=array
								(
									'query_id'=>$value->query_id,
									'customer_id'=>$value->customer_id,
									'product_id'=>$value->product_id,
									'ticket_no'=>$value->ticket_no,
									'product_name'=>$value->product_name,
									'issue'=>$value->issue,
									'status'=>$value->status,
									'assign_to'=>$value->assign_to,
									'created_date'=>$created_date,

									'assign_date'=>$assign_date,
									'assign_starttime'=>$assign_starttime1,
									'assign_endtime'=>$assign_endtime1,
									// 'user_id'=>$user_id,

									'name'=>'NA',
									'company_name'=>'NA',
									'email'=>'NA',
									'phone_no'=>'NA',
									'city'=>"NA"
								);
								array_push($task_list, $arr);
							}
							else
							{
								$employee_id1=$employee_id;
								$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
		                    // $employee_name = $data2->name;
			                    $area2="";
			                    $area3="";
			                    $area4="";
			                   foreach ($data2->result() as $multiple_employee) 
			                   {
			                      $area2=$area2.$multiple_employee->name." ,";
			                      $area3=$area3.$multiple_employee->email." ,";
			                      $area4=$area4.$multiple_employee->mobile_no." ,";
			                   }
			                    $employee_name = trim($area2, ',');
			                    $employee_email = trim($area3, ',');
			                    $employee_contact_no = trim($area4, ',');
				      			$created_date = date("d M Y", strtotime($value->created_date));

				      			$query_id=$value->query_id;
								$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

				      			$assign_date = date("d M Y", strtotime($data1->assign_date));
				      			$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
                        		$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

								$arr=array
								(
									'query_id'=>$value->query_id,
									'customer_id'=>$value->customer_id,
									'product_id'=>$value->product_id,
									'ticket_no'=>$value->ticket_no,
									'product_name'=>$value->product_name,
									'issue'=>$value->issue,
									'status'=>$value->status,
									'assign_to'=>$value->assign_to,
									'created_date'=>$created_date,

									'assign_date'=>$assign_date,
									'assign_starttime'=>$assign_starttime1,
									'assign_endtime'=>$assign_endtime1,
									// 'user_id'=>$user_id,

									'name'=>$employee_name,
									'company_name'=>'NA',
									'email'=>$employee_email,
									'phone_no'=>$employee_contact_no,
									'city'=>"NA"
								);
								array_push($task_list, $arr);
							}
		                    
						}

						echo json_encode($task_list);
      		}
      		else
      		{
      			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND `status`='$task_type' ORDER BY created_date DESC ")->result();

		      			$task_list=array();
						foreach ($data as $value) 
						{
							$employee_id = $value->assign_to;
							$customer_id = $value->customer_id;
							$data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();

							$company_name=$data1->company_name;
							$contact_person_name1=$data1->contact_person_name1;
							$phone_no=$data1->phone_no;
							$email=$data1->email;
							$address=$data1->address;
							$city=$data1->city;


							if ($employee_id=='') 
							{
								
				      			$created_date = date("d M Y", strtotime($value->created_date));

				      			$query_id=$value->query_id;
								$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

				      			$assign_date = date("d M Y", strtotime($data1->assign_date));
				      			$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
                        		$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

								$arr=array
								(
									'query_id'=>$value->query_id,
									'customer_id'=>$value->customer_id,
									'product_id'=>$value->product_id,
									'ticket_no'=>$value->ticket_no,
									'product_name'=>$value->product_name,
									'issue'=>$value->issue,
									'status'=>$value->status,
									'assign_to'=>$value->assign_to,
									'created_date'=>$created_date,

									'assign_date'=>$assign_date,
									'assign_starttime'=>$assign_starttime1,
									'assign_endtime'=>$assign_endtime1,
									// 'user_id'=>$user_id,

									'company_name'=>$company_name,
									'contact_person_name1'=>$contact_person_name1,
									'phone_no'=>$phone_no,
									'email'=>$email,
									'address'=>$address,
									'city'=>$city

									// 'name'=>'NA',
									// 'company_name'=>'NA',
									// 'email'=>'NA',
									// 'phone_no'=>'NA',
									// 'city'=>"NA"
								);
								array_push($task_list, $arr);
							}
							else
							{
								$employee_id1=$employee_id;
								$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
		                    // $employee_name = $data2->name;
			                    $area2="";
			                    $area3="";
			                    $area4="";
			                   foreach ($data2->result() as $multiple_employee) 
			                   {
			                      $area2=$area2.$multiple_employee->name." ,";
			                      $area3=$area3.$multiple_employee->email." ,";
			                      $area4=$area4.$multiple_employee->mobile_no." ,";
			                   }
			                    $employee_name = trim($area2, ',');
			                    $employee_email = trim($area3, ',');
			                    $employee_contact_no = trim($area4, ',');
				      			$created_date = date("d M Y", strtotime($value->created_date));

				      			$query_id=$value->query_id;
								$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

				      			$assign_date = date("d M Y", strtotime($data1->assign_date));
				      			$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
                        		$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

								$arr=array
								(
									'query_id'=>$value->query_id,
									'customer_id'=>$value->customer_id,
									'product_id'=>$value->product_id,
									'ticket_no'=>$value->ticket_no,
									'product_name'=>$value->product_name,
									'issue'=>$value->issue,
									'status'=>$value->status,
									'assign_to'=>$value->assign_to,
									'created_date'=>$created_date,

									'assign_date'=>$assign_date,
									'assign_starttime'=>$assign_starttime1,
									'assign_endtime'=>$assign_endtime1,
									// 'user_id'=>$user_id,

									'company_name'=>$company_name,
									'contact_person_name1'=>$contact_person_name1,
									'phone_no'=>$phone_no,
									'email'=>$email,
									'address'=>$address,
									'city'=>$city

									// 'name'=>$employee_name,
									// 'company_name'=>'NA',
									// 'email'=>$employee_email,
									// 'phone_no'=>$employee_contact_no,
									// 'city'=>"NA"
								);
								array_push($task_list, $arr);
							}
		                    
						}

						echo json_encode($task_list);
      		}		
      	}
//==================================== / Get Task list according to status =============================================

//==================================== Add discussion to databse ==================================
      	public function send_message($employee_id,$customer_id,$product_id,$query_id,$ticket_no,$message,$user_type)
      	{	
      		$date=date("Y-m-d H:i:s");
      		$data = $this->db->query("INSERT INTO `tbl_discussion`(`ticket_no`, `query_id`, `product_id`, `employee_id`, `customer_id`, `user_type`, `message`, `created_date`) VALUES ('$ticket_no','$query_id','$product_id','$employee_id','$customer_id','$user_type','$message','$date')");
      		if ($data) 
      		{
      			 //======================= sending notification to employee regarding assign issue ===============
      			// if ($user_type=='Customer') 
      			// {

      			// 	$result = $this->db->query("SELECT assign_to FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
      			// 	$assign_to = $result->assign_to

      			// 	$emp_id = explode(',', $assign_to);

	        //        	for($i=0;$i<sizeof($emp_id);$i++)
	        //         {   
	        //            $final_emp_id=$emp_id[$i];

	        //            	$dataresult = $this->db->query("SELECT android_id FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
         //           		$android_id = $dataresult->android_id;

	        //            	 $reg_token = $android_id;
	        //              $data = array('server_notification'=>"chat",'query_id'=>$query_id);
	        //               $target = $reg_token; 
	        //               $url = 'https://fcm.googleapis.com/fcm/send';
	        //               $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
	        //               $fields = array();
	        //               $fields['data'] = $data;
	        //                  if(is_array($target))
	        //               {
	        //                 $fields['registration_ids'] = $target;
	        //               }
	        //               else
	        //               {
	        //                 $fields['to'] = $target;
	        //               }
	        //               $headers = array(
	        //                 'Content-Type:application/json',
	        //                 'Authorization:key='.$server_key
	        //               );

	        //               $ch = curl_init();
	        //               curl_setopt($ch, CURLOPT_URL, $url);
	        //               curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	        //               curl_setopt($ch, CURLOPT_POST, true);
	        //               curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        //               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        //               curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	        //               curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        //               curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	        //               $result = curl_exec($ch);
	        //               if ($result === FALSE) 
	        //               {
	        //                 die('FCM Send Error: ' . curl_error($ch));

	        //               }
	        //               else
	        //               {
	        //               	curl_close($ch);
	        //               }
	        //         }
      				
      			// }
                   
      			$response["error"] = FALSE;
				$response["error_msg"] = "Message send successfully";
				echo json_encode($response);
      		}
      		else
      		{
      			$response["error"] = FALSE;
				$response["error_msg"] = "Failed to send message";
				echo json_encode($response);
      		}
      	}
//==================================== / StAdd discussion to databse ==============================

//==================================== Get discussion from databse ==================================
      	public function get_message($user_id,$query_id,$ticket_no,$user_type)
      	{	
      		if ($user_type=='Customer') 
      		{
      			$data = $this->db->query("SELECT * FROM `tbl_discussion` WHERE `query_id`='$query_id' AND `ticket_no`='$ticket_no'");

      			$discussion_array=array();
      			foreach ($data->result() as $value) 
      			{
      				$user_type1=$value->user_type;
      				
      				if ($user_type1=='Customer') 
      				{
      					$customer_id=$value->employee_id;
      					$data2 = $this->db->query("SELECT contact_person_name1, phone_no, email FROM `tbl_customer` WHERE `customer_id` = '$customer_id'")->row();
							$name=$data2->contact_person_name1;
							$mobile_no=$data2->phone_no;
							$email=$data2->email;
      						
      				}
      				else
      				{
      					$employee_id=$value->employee_id;
      					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` = '$employee_id'")->row();
						$name=$data2->name;
						$email=$data2->email;
						$mobile_no=$data2->mobile_no;
      				}
      				// echo "<br>";
      				// $employee_id=$value->employee_id;
      				$created_date = date("d M Y", strtotime($value->created_date));
      				$created_time = date("h:i A", strtotime($value->created_date));


					

					$arr = array(
						'name' => $name,
						'email' => $email,
						'user_id' => $employee_id,
						'phone_no' => $mobile_no,
						'user_type' => $value->user_type,
						'message' => $value->message,
						'ticket_no' => $value->ticket_no,
						'query_id' => $value->query_id,
						'created_datetime' => $created_date,
						'time' => $created_time

						);

					array_push($discussion_array, $arr);

      			}
      			echo json_encode($discussion_array);
      		}
      		else
      		{

      			// $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to)")->result();

      			$data = $this->db->query("SELECT * FROM `tbl_discussion` WHERE `query_id`='$query_id' AND `ticket_no`='$ticket_no'");

      			$discussion_array=array();
      			foreach ($data->result() as $value) 
      			{
      				$customer_id=$value->customer_id;
      				$user_type1=$value->user_type;
      				if ($user_type1=='Customer') 
      				{
      					$employee_id=$value->employee_id;
      					$data2 = $this->db->query("SELECT contact_person_name1, phone_no, email FROM `tbl_customer` WHERE `customer_id` = '$employee_id'")->row();
							$name=$data2->contact_person_name1;
							$mobile_no=$data2->phone_no;
							$email=$data2->email;
      						
      				}
      				else
      				{
      					$employee_id=$value->employee_id;
      					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` = '$employee_id'")->row();
						$name=$data2->name;
						$email=$data2->email;
						$mobile_no=$data2->mobile_no;
      				}
      				$created_date = date("d M Y", strtotime($value->created_date));
      				$created_time = date("h:i A", strtotime($value->created_date));
					// $data2 = $this->db->query("SELECT contact_person_name1, phone_no, email FROM `tbl_customer` WHERE `customer_id` = '$customer_id'")->row();
					// $contact_person_name1=$data2->contact_person_name1;
					// $phone_no=$data2->phone_no;
					// $email=$data2->email;

					$arr = array(
						'name' => $name,
						'email' => $email,
						'user_id' => $employee_id,
						'phone_no' => $mobile_no,
						'user_type' => $value->user_type,
						'message' => $value->message,
						'ticket_no' => $value->ticket_no,
						'query_id' => $value->query_id,
						'created_datetime' => $created_date,
						'time' => $created_time

						);
					array_push($discussion_array, $arr);

      			}
      			echo json_encode($discussion_array);
      		}
      	}
//==================================== / Get discussion from databse ==============================






//==================================== Get sigle Task ===============================================
      	public function get_query($query_id)
      	{	
		      			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->result();

		      			$single_task_list=array();
						foreach ($data as $value) 
						{
							
								$employee_id1=$value->assign_to;
								$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
		                    // $employee_name = $data2->name;
			                    $area2="";
			                    $area3="";
			                    $area4="";
			                   foreach ($data2->result() as $multiple_employee) 
			                   {
			                      $area2=$area2.$multiple_employee->name." ,";
			                      $area4=$area4.$multiple_employee->mobile_no." ,";
			                   }
			                    $employee_name = trim($area2, ',');
			                    $employee_email = trim($area3, ',');
			                    $employee_contact_no = trim($area4, ',');
			                    $array = explode(',', $employee_contact_no);
								$emp_number = $array [0];
				      			$created_datetime = date("d M Y, h:i A", strtotime($value->created_date));
      							// $created_time = date("h:i A", strtotime($value->created_date));

								$arr=array
								(
									'query_id'=>$value->query_id,
									'customer_id'=>$value->customer_id,
									'product_id'=>$value->product_id,
									'ticket_no'=>$value->ticket_no,
									'product_name'=>$value->product_name,
									'issue'=>$value->issue,
									'status'=>$value->status,
									'created_date'=>$created_datetime,
									// 'created_time'=>$created_time,

									'name'=>$employee_name,
									'email'=>$employee_email,
									'phone_no'=>$emp_number
								);
								array_push($single_task_list, $arr);
		                    
						}

						echo json_encode($single_task_list);
      		
      	}
//==================================== / Get sigle Task =============================================



//==================================== Close Issue ===============================================
      	public function close_issue($customer_id,$query_id,$remark,$status)
      	{	
		    $date=date("Y-m-d H:i:s");
		    $schedule_date=date("Y-m-d");
		    $schedule_starttime=date("H:i");
		    $schedule_endtime=date("H:i");
		    // $this->db->set('user_remark',$remark);
		    $this->db->set('status',$status);
		    $this->db->where('query_id',$query_id);
		    $this->db->update('tbl_user_query');

      		$data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
      		 $assign_to = $data1->assign_to;
      		 $ticket_no = $data1->ticket_no;
      		 $product_id = $data1->product_id;
      		 $query_id = $data1->query_id;


      		$commaList = explode(',', $assign_to);

	          for ($j=0; $j < count($commaList); $j++) 
              { 
              		$employee_id = $commaList[$j];
              		// echo "<br>";
      				 //======================= sending notification to employee regarding assign issue ===============

                           $data3 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                           $android_id = $data3->android_id;

                           $data33 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `schedule_assign_to`='$employee_id' AND issue_id='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
                           $schedule_id = $data33->schedule_id;
                           $schedule_assign_to = $data33->schedule_assign_to;
                           $schedule_ticket_num = $data33->ticket_no;
                           $schedule_type = $data33->schedule_type;

                           if ($status == 'in_progress')
                        	{
                        		$change_status = "In Progress";
                        		$title = "Previous task updated";
                        		$notification_msg = "Customer is not satisfied for ".$ticket_no.". Customer want to keep this task ".$change_status;

                        		$this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$query_id','$schedule_assign_to','$schedule_ticket_num','$schedule_date','$schedule_starttime','$schedule_endtime','$schedule_type','$date')");

                        		$reschedule='reschedule';
                        		$this->db->set('reschedule',$reschedule);
							    $this->db->where('schedule_id',$schedule_id);
							    $this->db->update('tbl_schedule');

                        	}
                        	else if ($status == 'completed')
                        	{
                        		$change_status = "Completed";
                        		$title = "Issue closed";
                        		$notification_msg = "Ticket ".$ticket_no." is closed from customer side";
                        	}

                        	//=============  inserting notification to table and getting last inserted id

                        	$this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','$schedule_id','$ticket_no','$remark','$status','$date')");

                        	
                        	$date=date("Y-m-d H:i:s");
                                
                            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$employee_id','$employee_id','$title','$notification_msg','$status','$date')");

                            $notification_id = $this->db->insert_id($res);

                          //===============  inserting notification to table and getting last inserted id

                          $reg_token = $android_id;
                          $data = array('server_notification'=>"employee_task_updated",'message'=>$notification_msg,'query_id'=>$query_id,'notification_id'=>$notification_id);
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
                            	
                                
                                // echo 1;
                            }
                             curl_close($ch);
                  }

                          //======================= / sending notification to customer regarding assign issue ===============

							$response["error"] = FALSE;
							$response["error_msg"] = "Status updated successfully";
							echo json_encode($response);
			
      	}
//==================================== / Close Issue =============================================

//==================================== Customer master fields ====================================

      	 public function type_list()
         {
           $type_list = $this->db->query("SELECT * FROM `tbl_type` WHERE status='1'")->result();
           echo json_encode($type_list);
         }
         public function schedule_list()
         {
           $schedule_list = $this->db->query("SELECT * FROM `tbl_schedule_type` WHERE status='1'")->result();
           echo json_encode($schedule_list);
         }
         public function location_list()
         {
           $location_list = $this->db->query("SELECT * FROM `tbl_location` WHERE status='1'")->result();
           echo json_encode($location_list);
         }
         public function business_segment_list()
         {
           $business_segment_list = $this->db->query("SELECT * FROM `tbl_business` WHERE status='1'")->result();
           echo json_encode($business_segment_list);
         }
         public function group_list()
         {
           $group_list = $this->db->query("SELECT * FROM `tbl_group` WHERE status='1'")->result();
           echo json_encode($group_list);
         }
         public function state_list($country_id)
         {
           $state_list = $this->db->query("SELECT * FROM `states` WHERE country_id='$country_id' ORDER BY name asc")->result();
           echo json_encode($state_list);
         }

          public function country_list()
         {
           $country_list = $this->db->query("SELECT * FROM `countries` ORDER BY name asc")->result();
           echo json_encode($country_list);
         }



// ================================================================================================ 

//==================================== Schedule / assign query =================================================

      	public function assign_query($query,$product_id,$product_name,$customer_id,$employee_id,$schedule_date,$start_time,$end_time,$schedule_type,$overlapping)
      	{

      		if ($overlapping=='YES') 
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
						
							// echo $cur_date=date("Ymd");


      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`) VALUES ('$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id')"); 
      					$insert_id = $this->db->insert_id();
      					if ($data) 
      					{
      						$this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$insert_id','$employee_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

      						$emp_name = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                           $name = $emp_name->name;

      						//======================= sending notification to customer regarding assign issue ===============

                                 $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                 $android_id = $data3->android_id;
                                 $contact_person_name1 = $data2->contact_person_name1;

                                 // ----------------- Insertinf notification to table ---------------------------

                                 $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
                                      $date=date("Y-m-d H:i:s");
                                      
                                 $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                                  $notification_id1 = $this->db->insert_id($res1);

                                // ----------------- Insertinf notification to table ---------------------------

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
                                      // echo 1;
                                  }
                                   curl_close($ch);

                                //======================= / sending notification to customer regarding assign issue ===============

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
      			   $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
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
							
								// echo $cur_date=date("Ymd");


	      					$data = $this->db->query("INSERT INTO `tbl_user_query`(`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`) VALUES ('$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id')"); 
	      					$insert_id = $this->db->insert_id();
	      					if ($data) 
	      					{
	      						$this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$insert_id','$employee_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

	      						$emp_name = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
	                           $name = $emp_name->name;

	      						//======================= sending notification to customer regarding assign issue ===============

	                                 $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
	                                 $android_id = $data3->android_id;
	                                 $contact_person_name1 = $data2->contact_person_name1;

	                                 // ----------------- Insertinf notification to table ---------------------------

	                                 $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
	                                      $date=date("Y-m-d H:i:s");
	                                      
	                                 $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

	                                  $notification_id1 = $this->db->insert_id($res1);

	                                // ----------------- Insertinf notification to table ---------------------------

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
	                                      // echo 1;
	                                  }
	                                   curl_close($ch);

	                                //======================= / sending notification to customer regarding assign issue ===============

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
//==================================== Schedule / assign query  =================================================

// ===================================== Schedule list of particular employee =================================== 
 public function schedule_list1($employee_id,$date)
         {
                    $schedule_date1 = date("Y-m-d", strtotime($date));

                    // $employee_id = $this->session->id;
                    // echo "SELECT * FROM `tbl_schedule` WHERE `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id'";
                    $data = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND reschedule!='reschedule'");

                    // print_r($data->result());
                    $assign_issue_list=array();
                    foreach ($data->result() as $value) 
                    {
                        $issue_id=$value->issue_id;
                        $data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$issue_id' AND `status`!='in_complete'")->row();
                        $customer_id = $data1->customer_id;
                        if ($customer_id!='') 
                        {
                        	$created_date = date("d M y", strtotime($data1->created_date));
                        	$assign_date = date("d M y", strtotime($value->assign_date));

	                        $customer_id=$data1->customer_id;
	                        $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
	                        $customer_id=$data2->customer_id;
	                        $company_name=$data2->company_name;
	                        $contact_person_name1=$data2->contact_person_name1;
	                        $email=$data2->email;
	                        $phone_no=$data2->phone_no;
	                        $city=$data2->city;

	                        $assign_starttime1 = date("h:i A", strtotime($value->assign_starttime));
	                        $assign_endtime1 = date("h:i A", strtotime($value->assign_endtime));


	                        $arr = array
	                        (
	                          'ticket_no'=>$data1->ticket_no,
	                          'product_name'=>$data1->product_name,
	                          'product_id'=>$data1->product_id,
	                          'status'=>$data1->status,
	                          'query_id'=>$data1->query_id,
	                          'issue'=>$data1->issue,
	                          'created_date'=>$created_date,
	                          'assign_date'=>$assign_date,
	                          'assign_starttime'=>$assign_starttime1,
	                          'assign_endtime'=>$assign_endtime1,
	                          'schedule_id'=>$value->schedule_id,
	                          'schedule_ticket_no'=>$value->ticket_no,
	                          'schedule_type'=>$value->schedule_type,

	                          'customer_id'=>$customer_id,
	                          'company_name'=>$company_name,
	                          'contact_person_name1'=>$contact_person_name1,
	                          'email'=>$email,
	                          'phone_no'=>$phone_no,
	                          'city'=>$city

	                        );

	                        array_push($assign_issue_list, $arr);
                        }
                        
                    }

                   // return $assign_issue_list;
                   echo json_encode($assign_issue_list);
         }
// ===================================== Schedule list of particular employee =================================== 

//==================================== ReSchedule / reassign query =================================================

      	public function reschedule($employee_id,$overlapping,$schedule_date,$start_time,$end_time,$ticket_no,$remark,$customer_id,$query_id,$product_id)
      	{

      		if ($overlapping=='YES') 
      		{
      					$date=date("Y-m-d H:i:s");
      					$schedule_date1 = date("Y-m-d", strtotime($schedule_date));

      					$schedule_result = $this->db->query("SELECT * FROM tbl_schedule WHERE issue_id='$query_id' ORDER BY schedule_id DESC limit 1")->row();

      					$schedule_type = $schedule_result->schedule_type;
      					$schedule_ticket_num = $schedule_result->ticket_no;
      					$schedule_id = $schedule_result->schedule_id;

      					$reschedule="reschedule";
      					$this->db->set('reschedule',$reschedule);
                      	$this->db->where('schedule_id',$schedule_id);
                      	$this->db->update('tbl_schedule');

      					$ticket_reschedule = $this->db->query("SELECT * FROM tbl_user_query WHERE query_id='$query_id'")->row();
      					$final_ticket_num=$ticket_reschedule->ticket_no;

      					$data = $this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$query_id','$employee_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
      					$insert_id = $this->db->insert_id();
      					if ($data) 
      					{
      						$this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','$schedule_id','$ticket_no','$remark','pending','$date')");


      						$emp_name = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                           $name = $emp_name->name;

      						//======================= sending notification to customer regarding assign issue ===============

                                 $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                 $android_id = $data3->android_id;
                                 $contact_person_name1 = $data2->contact_person_name1;

                                 // ----------------- Insertinf notification to table ---------------------------

                                 $notification_msg = "Your issue ".$final_ticket_num." is Schedule to ".$schedule_date. "by ".$name ;
                                      $date=date("Y-m-d H:i:s");
                                      
                                 $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$employee_id','$customer_id','Issue Re-Schedule','$notification_msg','pending','$date')");

                                  $notification_id1 = $this->db->insert_id($res1);

                                // ----------------- Insertinf notification to table ---------------------------

                                $reg_token = $android_id;
                                $data = array('server_notification'=>"customer_query_status_updated",'message'=>'Your issue '.$final_ticket_num.' is Schedule to '.$schedule_date. 'by '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
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
                                      $pending="pending";
                                      $this->db->set('status',$pending);
                                      $this->db->where('query_id',$query_id);
                                      $this->db->update('tbl_user_query');
                                      // echo 1;
                                  }
                                   curl_close($ch);

                                //======================= / sending notification to customer regarding assign issue ===============

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
      			   $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
	               $s_time = $start_time;
	               $e_time = $end_time;
	               $emp_id = $employee_id;
	               // $available = $this->db->query("SELECT count(schedule_id) as count from tbl_schedule where `assign_endtime` BETWEEN '$s_time' AND '$e_time' AND `assign_starttime` BETWEEN '$s_time' AND '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id'")->row();

	              $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

                 $available_count = $available->num_rows();
	                if ($available_count==0) 
	                {
	                		$date=date("Y-m-d H:i:s");

	                		$schedule_result = $this->db->query("SELECT * FROM tbl_schedule WHERE issue_id='$query_id' ORDER BY schedule_id DESC limit 1")->row();

	      					$schedule_type = $schedule_result->schedule_type;
	      					$schedule_ticket_num = $schedule_result->ticket_no;
	      					$schedule_id = $schedule_result->schedule_id;

	      					$reschedule="reschedule";
	      					$this->db->set('reschedule',$reschedule);
	                      	$this->db->where('schedule_id',$schedule_id);
	                      	$this->db->update('tbl_schedule');

	      					$ticket_reschedule = $this->db->query("SELECT * FROM tbl_user_query WHERE query_id='$query_id'")->row();
	      					$final_ticket_num=$ticket_reschedule->ticket_no;

	      					$data = $this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$query_id','$employee_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");

	      					$insert_id = $this->db->insert_id();
	      					if ($data) 
	      					{
	      						$this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','$schedule_id','$ticket_no','$remark','pending','$date')");

	      						$emp_name = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
	                           $name = $emp_name->name;

	      						//======================= sending notification to customer regarding assign issue ===============

	                                 $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
	                                 $android_id = $data3->android_id;
	                                 $contact_person_name1 = $data2->contact_person_name1;

	                                 // ----------------- Insertinf notification to table ---------------------------

	                                  $notification_msg = "Your issue ".$final_ticket_num." is Schedule to ".$schedule_date. "by ".$name ;
	                                      $date=date("Y-m-d H:i:s");
	                                      
	                                  $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$employee_id','$customer_id','Issue Re-Schedule','$notification_msg','pending','$date')");

	                                  $notification_id1 = $this->db->insert_id($res1);

	                                // ----------------- Insertinf notification to table ---------------------------

	                                $reg_token = $android_id;

	                                $data = array('server_notification'=>"customer_query_status_updated",'message'=>'Your issue '.$final_ticket_num.' is Schedule to '.$schedule_date. 'by '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);

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
	                                      $pending="pending";
	                                      $this->db->set('status',$pending);
	                                      $this->db->where('query_id',$query_id);
	                                      $this->db->update('tbl_user_query');
	                                      // echo 1;
	                                  }
	                                   curl_close($ch);

	                                //======================= / sending notification to customer regarding assign issue ===============

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
//==================================== / Reschedule / Reassign query  =================================================

// ===================================== Customer List =================================== 
    public function customer_list()
	{
	   $customer_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name FROM `tbl_customer` WHERE delete_status='1' ORDER BY company_name asc")->result();
	   echo json_encode($customer_list);
	}

// ===================================== / Customer List =================================== 

// ===================================== Customer List created by particular Employee =================================== 
    public function emp_customer_list()
	{
	   $customer_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name, contact_person_name1, phone_no FROM `tbl_customer` WHERE delete_status='1' ORDER BY company_name asc")->result();
	   echo json_encode($customer_list);
	}
	//------------------ Check employee permission for update customer---------------
	public function update_user_permission($employee_id)
	{
	   $update_permission = $this->db->query("SELECT `update_permission` FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
	   	$permission = $update_permission->update_permission;
	   	if ($permission=='1')
	   	{
			$response["permission"] = "TRUE";
			echo json_encode($response);	
		}
		else
		{
			$response["permission"] = "FALSE";
			echo json_encode($response);
		}
	}
// =================================== / Customer List created by particular Employee =================================== 

// ===================================== get Customer for update =================================== 
    public function get_customer($customer_id)
         {
          ///echo "fdsf";
           	$data = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'");
           	$update_array=array();
           	foreach ($data->result() as $value) 
           	{
           		$type_id = $value->type_id;
           		if ($type_id!=0) 
           		{
           			$data1 = $this->db->query("SELECT title FROM `tbl_type` WHERE `type_id`='$type_id'")->row();
           			$type_title = $data1->title;
           		}
           		else
           		{
           			$type_title = 'NA';
           		}
           			
           		$business_id = $value->business_id;
           		if ($business_id!=0) 
           		{
           			 $business_array_name=$this->db->query("SELECT business_name, business_id FROM `tbl_business` where `business_id` IN($business_id)");
		               $area3="";
		               foreach ($business_array_name->result() as $multiple_business) 
		               {
		                  $area3=$area3.$multiple_business->business_name.",";
		               }

		               $business_name = trim($area3, ',');
           		}
           		else
           		{
           			$business_name = 'NA';
           		}

           		$location_id = $value->location_id;
           		if ($location_id!=0) 
           		{
           			$data3 = $this->db->query("SELECT location FROM `tbl_location` WHERE `location_id`='$location_id'")->row();
           			$location = $data3->location;
           		}
           		else
           		{
           			$location = 'NA';
           		}
           			

           		$group_id = $value->group_id;
       			if ($group_id!=0) 
           		{
           			$data4 = $this->db->query("SELECT group_name FROM `tbl_group` WHERE `group_id`='$group_id'")->row();
       				$group_name = $data4->group_name;
           		}
           		else
           		{
           			$group_name = 'NA';
           		}


           		$state = $value->state;

           			$data5 = $this->db->query("SELECT name FROM `states` WHERE `id`='$state'")->row();
           			$state_name = $data5->name;

           		$country = $value->country;

           			$data6 = $this->db->query("SELECT name FROM `countries` WHERE `id`='$country'")->row();
           			$country_name = $data6->name;

           		$dob = date("d M Y", strtotime($value->dob));

           		 if ($value->company_anniversary!=0) 
	              {
	                  $company_anniversary = date("d M Y", strtotime($value->company_anniversary));
	              }
	              else 
	              {
	                  $company_anniversary = 'NA';
	              }


	              if ($value->marriage_anniversary!=0) 
	              {

	                 $marriage_anniversary = date("d M Y", strtotime($value->marriage_anniversary));
	              }
	              else
	              {
	                	$marriage_anniversary = 'NA';
	              }

	           		$arr = array
	           		(
	           				'customer_id'=>$customer_id,
	           				'type_title'=>$type_title,
	           				'business_name'=>$business_name,
	           				'location'=>$location,
	           				'group_name'=>$group_name,
	           				'state_name'=>$state_name,
	           				'country_name'=>$country_name,

	           				'company_name'=>$value->company_name,
	           				'contact_person_name1'=>$value->contact_person_name1,
	           				'alternate_email'=>$value->alternate_email,
	           				'phone_no'=>$value->phone_no,
	           				'alternate_number'=>$value->alternate_number,
	           				'landline_number'=>$value->landline_number,
	           				'email'=>$value->email,
	           				'address'=>$value->address,
	           				'city'=>$value->city,
	           				'dob'=>$dob,
	           				'company_anniversary'=>$company_anniversary,
	           				'marriage_anniversary'=>$marriage_anniversary

	           		);

           		array_push($update_array, $arr);
           	}
           	echo json_encode($update_array);

         }

// ===================================== / get Customer for update =================================== 

// ---------------------------------------------------------------------------------

	public function update_customer($customer_id,$company_id,$company_name,$email,$phone_no,$contact_person_name1,$alternate_email,$city,$address,$password,$country_id,$dob,$cad,$mad,$alternate_phone_no,$state_id,$type_id,$business_segment_id,$group_id,$location_id,$created_by,$landline,$edited_by)
	  {	

	  		// echo $company_id;
	  		$date=date("Y-m-d H:i:s"); 

	  		 $dob1 = date("Y-m-d", strtotime($dob));
	  		 // $cad1 = date("Y-m-d", strtotime($cad));
	  		 if ($mad=='' && $cad=='') 
	  		 {
	  		 	 $mad1 = "";
	  		 	 $cad1 = "";
	  		 }
	  		 else if($mad!='' && $cad!='') 
	  		 {
	  		 	 $mad1 = date("Y-m-d", strtotime($mad));
	  		 	 $cad1 = date("Y-m-d", strtotime($cad));
	  		 }
	  		 else if($mad!='' && $cad=='') 
	  		 {
	  		 	 $mad1 = date("Y-m-d", strtotime($mad));
	  		 	 $cad1 = "";
	  		 }
	  		 else if($mad=='' && $cad!='') 
	  		 {
	  		 	 $mad1 = "";
	  		 	 $cad1 = date("Y-m-d", strtotime($cad));
	  		 }

	  		 $business_segment_id1 = rtrim($business_segment_id,',');
	  		 // if ($business_segment_id12!='') 
	  		 // {
	  		 // 	$business_segment_id1 = $business_segment_id12;
	  		 // }
	  		 // else
	  		 // {
	  		 // 	$business_segment_id1 = "NA";
	  		 // }	
	  		 $company_name1 = TRIM($company_name);

	  		 	$this->db->where('customer_id', $customer_id);     
	  		 	 $data1=array(
                            'type_id'=>$type_id,
                            'business_id'=>$business_segment_id1,
                            'location_id'=>$location_id,
                            'group_id'=>$group_id,
                            'company_name'=>$company_name1,
                            'contact_person_name1'=>$contact_person_name1,
                            'alternate_email'=>$alternate_email,
                            'phone_no'=>$phone_no,
                            'alternate_number'=>$alternate_phone_no,
                            'landline_number'=>$landline,
                            'email'=>$email,
                            'address'=>$address,
                            'city'=>$city,
                            'state'=>$state_id,
                            'country'=>$country_id,
                            'dob'=>$dob1,
                            'company_anniversary'=>$cad1,
                            'marriage_anniversary'=>$mad1,
                      );

	  		 	 // print_r($data1);

            $data = $this->db->update('tbl_customer', $data1);
			if ($data) 
			{
							$response["error"] = False;
							$response["error_msg"] = "Updated Successfully";
							echo json_encode($response);

			}
			else
			{
							$response["error"] = TRUE;
							$response["error_msg"] = "Failed to update.";
							echo json_encode($response);
			}			
	  } 


// ===================================== Target List =================================== 
    public function target_list($employee_id)
     {
	     	$date=date("Y-m-d"); 

	      	$data = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `status`='1'");
	     	// print_r($data->result())
	     	$area2="";
		       foreach ($data->result() as $target_list) 
		       {
		          $area2=$area2.$target_list->target_id." ,";
		       }
		       $target = trim($area2, ',');

	       	$data1 = $this->db->query("SELECT distinct targettype_id, tr_auto_id  FROM `tbl_target` WHERE target_id IN ($target) AND `employee_id`='$employee_id' GROUP BY targettype_id, tr_auto_id ")->result();

	       	// print_r($data1);
	       	// echo json_encode($data1);

	        $targettype_array=array();
	        foreach ($data1 as $value1) 
	        {
	            $targettype_id = $value1->targettype_id;
	        	$target_id = $value1->tr_auto_id;

	        	$data2 = $this->db->query("SELECT * FROM tbl_target_type WHERE `targettype_id` = '$targettype_id'")->row();
	        	$target_type_name = $data2->target_type;
	        	$uom_id = $data2->uom_id;

	        	$data3 = $this->db->query("SELECT uom_type FROM tbl_uom WHERE `uom_id` = '$uom_id'")->row();

	        	$arr = array
	        	(
	        		'target_type_id' => $targettype_id,
	        		'target_id' => $target_id,
	        		'target_type' => $target_type_name,
	        		'uom_type' => $data3->uom_type
	        	);
	        	array_push($targettype_array, $arr);
	        }
	        // $emp_list = trim($targettype_array, ',');
	        echo json_encode($targettype_array);

	        // $data1 = $this->db->query("SELECT targettype_id, target_id FROM tbl_target_employee WHERE `employee_id`='$employee_id'");
	        // $target_array = array();
	        // foreach ($data1->result() as $value) 
	        // {
	        // 	$target_type = $value->targettype_id;
	        // 	$target_id = $value->target_id;

	        // 	$data2 = $this->db->query("SELECT * FROM tbl_target_type WHERE `targettype_id` = '$target_type'")->row();
	        // 	$target_type_name = $data2->target_type;

	        // 	$arr = array
	        // 	(
	        // 		'target_type_id' => $target_type,
	        // 		'target_id' => $target_id,
	        // 		'target_type' => $target_type_name
	        // 	);

	        // 	array_push($target_array, $arr);

	        // }
	        // echo json_encode($target_array);

     }

// ===================================== / Target List =================================== 

// ===================================== Complete Target =================================== 
    public function submit_billing_info($token_id,$employee_id,$billing_type,$billing_remark,$target,$price)
     {
     		$date=date("Y-m-d"); 
			$token_id = $token_id;
			$employee_id = $employee_id;
			$billing_type = $billing_type;
			$billing_remark = $billing_remark;
			// echo $target = sizeof($target);  // count of array value of cart
			// echo $price;
			$target1 = trim($target, ',');
			$schools_array = explode(",", $target1);
			// print_r($schools_array);
			$target1 = sizeof($schools_array); 
			// print_r($target);

			$data = $this->db->query("INSERT INTO `tbl_target_achieve`(`employee_id`, `token_id`, `billing_type`, `billing_remark`, `price`, `date_created`) VALUES ('$employee_id','$token_id','$billing_type','$billing_remark','$price','$date')"); 
	      	$insert_id = $this->db->insert_id();

			for ($i = 0; $i < $target1; $i++) 
			{
				$target_value = $schools_array[$i];
				// echo $targettype_id = substr($target_value, strpos($target_value, "") + 0, 1);
		  //  		echo "<br>";
		  //  		echo $targettype_id1 = substr($target_value, strpos($target_value, ".") + 1, 1);
		  //  		echo "<br>";
		  //  		echo $target_value = substr($target_value, strpos($target_value, "."));
		  //  		echo "<br>";
				$var = explode('.', $target_value);
				// print_r($var);
				 $tr_auto_id= $var[0];
				 $targettype_id= $var[1];
				 $targettype_value= $var[2];
				// $targettype_value= $quantity_local;

				$data1 = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `targettype_id`='$targettype_id'")->row();
				$target_id = $data1->target_id;

				$data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`achieve_id`, `tr_auto_id`, `targettype_id`, `targettype_value`) VALUES ('$insert_id','$tr_auto_id','$targettype_id','$targettype_value')"); 
			}

			if ($data) 
			{
					$response["error"] = False;
					$response["error_msg"] = "submitted Successfully";
					echo json_encode($response);

			}
			else
			{
					$response["error"] = TRUE;
					$response["error_msg"] = "Failed to Submit.";
					echo json_encode($response);
			}
     }

      public function submit_billing_info1($token_id,$employee_id,$billing_type,$billing_remark,$target)
     {
     		$date=date("Y-m-d "); 

			$token_id = $token_id;
			$employee_id = $employee_id;
			$billing_type = $billing_type;
			$billing_remark = $billing_remark;
			// echo $target = sizeof($target);  // count of array value of cart
			// $schools_array = explode(",", $target);
			$target1 = trim($target, ',');
			$schools_array = explode(",", $target1);
			// print_r($schools_array);
			$target1 = sizeof($schools_array); 
			// print_r($target);

			$data = $this->db->query("INSERT INTO `tbl_target_achieve`(`employee_id`, `token_id`, `billing_type`, `billing_remark`, `price`, `date_created`) VALUES ('$employee_id','$token_id','$billing_type','$billing_remark','0','$date')"); 
	      	$insert_id = $this->db->insert_id();


			for ($i = 0; $i < $target1; $i++) 
			{
				$target_value = $schools_array[$i];
		   		$targettype_id = substr($target_value, strpos($target_value, ".") + 1);
				$var = explode('.', $target_value);
				$tr_auto_id= $var[0];

				$data1 = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `targettype_id`='$targettype_id'")->row();
				$target_id = $data1->target_id;

				$data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`achieve_id`, `tr_auto_id`, `targettype_id`, `targettype_value`) VALUES ('$insert_id','$tr_auto_id','$targettype_id','0')");

				// $data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`achieve_id`, `targettype_id`, `targettype_value`) VALUES ('$insert_id','$targettype_id','$targettype_value')"); 
			}

			if ($data) 
			{
					$response["error"] = False;
					$response["error_msg"] = "submitted Successfully";
					echo json_encode($response);

			}
			else
			{
					$response["error"] = TRUE;
					$response["error_msg"] = "Failed to Submit.";
					echo json_encode($response);
			}
     }

// ===================================== / Complete Target =================================== 

// ===================================== Billing Validation =================================== 
    public function billing_validation($token_id,$employee_id,$user_type)
     {
     			if ($user_type=='Employee') 
     			{
     				$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
     			}
     			else
     			{
     				$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
     			}
				
				$bill_count = $data->count;
				$billing=array();
				if ($bill_count>0) 
				{
					if ($user_type=='Employee') 
	     			{
	     				$data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
	     			}
	     			else
	     			{
	     				$data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
	     			}
	     			$achieve_id = $data1->achieve_id;
					$billing_type = $data1->billing_type;
					
					// $billing['adm_approved_price'] = $data1->adm_approved_price;
					// if ($billing_type=='Billable')
					// {
					// 	$billing['price'] = $data1->price;
					// }
					// else
					// {
					// 	$billing['price'] = '';
					// }

					// $data2 = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
					// // print_r($data2->result());
					// $target_array=array();
			  //      	foreach ($data2->result() as $value) 
					// {
					// 	$targettype_id = $value->targettype_id;
					// 	$data3 = $this->db->query("SELECT `target_type` FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
			  //         	$arr = array
			  //         	(
			  //         		'target_type'=>$data3->target_type,
			  //         		'target_value'=>$value->targettype_value,
			  //         		'admin_approved_price'=>$value->adm_approved_price
			  //         	);
			  //         	array_push($target_array, $arr);
			  //      	}
					$billing["error"] = TRUE;

					$billing['billing_remark'] = $data1->billing_remark;
					$billing['billing_type'] = $data1->billing_type;
					echo json_encode($billing);
				}
				else
				{
					$response["error"] = False;
					$response["error_msg"] = "Not generated";
					echo json_encode($response);
				}
     }

      public function target_bill_validation($token_id,$employee_id,$user_type)
     {
     			if ($user_type=='Employee') 
     			{
     				$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
     			}
     			else
     			{
     				$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
     			}
				
				$bill_count = $data->count;
				$billing=array();
				if ($bill_count>0) 
				{
					if ($user_type=='Employee') 
	     			{
	     				$data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
	     			}
	     			else
	     			{
	     				$data1 = $this->db->query("SELECT * FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
	     			}
	     			$achieve_id = $data1->achieve_id;
					$billing_type = $data1->billing_type;
					
					// $billing['adm_approved_price'] = $data1->adm_approved_price;
					// if ($billing_type=='Billable')
					// {
					// 	$billing['price'] = $data1->price;
					// }
					// else
					// {
					// 	$billing['price'] = '';
					// }

					$data2 = $this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
					// print_r($data2->result());
					$target_array=array();
			       	foreach ($data2->result() as $value) 
					{
						$targettype_id = $value->targettype_id;
						$data3 = $this->db->query("SELECT `target_type` FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
			          	$arr = array
			          	(
			          		'target_type'=>$data3->target_type,
			          		'target_value'=>$value->targettype_value,
			          		'admin_approved_price'=>$value->adm_approved_price
			          	);
			          	array_push($target_array, $arr);
			       	}
					// $billing["error"] = TRUE;
					
					// $billing['billing_remark'] = $data1->billing_remark;
					// $billing['billing_type'] = $data1->billing_type;
					echo json_encode($target_array);
				}
				else
				{
					$response["error"] = False;
					$response["error_msg"] = "Not generated";
					echo json_encode($response);
				}
     }

// ===================================== / Billing Validation =================================== 


// ===================================== Customer issue allocated list =================================== 
    public function allocated_list($customer_id)
     {
     	$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`!='0' AND `status`!='in_complete' ORDER BY created_date DESC ");
     	$allocated_array=array();
     	foreach ($data->result() as $value) 
     	{
     		$query_id = $value->query_id;
     		$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();

     		$emp_id = $value->assign_to;
     		$data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();

     		$assign_starttime = date("h:i A", strtotime($data1->assign_starttime));
     		$assign_endtime = date("h:i A", strtotime($data1->assign_endtime));

     		 $created_date = date("d M Y", strtotime($value->created_date));
     		 $assign_date = date("d M Y", strtotime($data1->assign_date));

     		$arr=array
     		(
     			'emp_id'=>$emp_id,
     			'employee_name'=>$data2->name,
     			'ticket_no'=>$value->ticket_no,
     			'assign_date'=>$assign_date,
     			'assign_starttime'=>$assign_starttime,
     			'assign_endtime'=>$assign_endtime,
     			'schedule_id'=>$data1->schedule_id,
     			'query_id'=>$query_id,
     			'schedule_type'=>$data1->schedule_type,
     			'product_name'=>$value->product_name,
     			'status'=>$value->status,
     			'created_date'=>$created_date,
     			'email'=>$data2->email,
     			'mobile_no'=>$data2->mobile_no,
     			'issue'=>$value->issue,
     			'product_id'=>$value->product_id,

     		);
     		array_push($allocated_array, $arr);
     	}
     	echo json_encode($allocated_array);
     }

// ===================================== / Customer issue allocated list =================================== 

// ===================================== Customer issue unallocated list =================================== 
    public function unallocated_list($customer_id)
     {
     	$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`='0' OR `status`='in_complete' ORDER BY created_date DESC ");
     	$allocated_array=array();
     	foreach ($data->result() as $value) 
     	{
     		$query_id = $value->query_id;
     		$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();

     		$emp_id = $value->assign_to;
     		$data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();

     		$assign_starttime = date("h:i A", strtotime($data1->assign_starttime));
     		$assign_endtime = date("h:i A", strtotime($data1->assign_endtime));

     		 $created_date = date("d M Y", strtotime($value->created_date));
     		 $assign_date = date("d M Y", strtotime($data1->assign_date));

     		$arr=array
     		(
     			'emp_id'=>$emp_id,
     			'employee_name'=>$data2->name,
     			'ticket_no'=>$value->ticket_no,
     			'assign_date'=>$assign_date,
     			'assign_starttime'=>$assign_starttime,
     			'assign_endtime'=>$assign_endtime,
     			'schedule_id'=>$data1->schedule_id,
     			'query_id'=>$query_id,
     			'schedule_type'=>$data1->schedule_type,
     			'product_name'=>$value->product_name,
     			'status'=>$value->status,
     			'created_date'=>$created_date,
     			'email'=>$data2->email,
     			'mobile_no'=>$data2->mobile_no,
     			'issue'=>$value->issue,
     			'product_id'=>$value->product_id,

     		);
     		array_push($allocated_array, $arr);
     	}
     	echo json_encode($allocated_array);
     }

// ===================================== / Customer issue unallocated list =================================== 

// =============================== Store Employee location =================================== 
    public function location($employee_id,$imei,$posdate_array,$pos_time_array,$sig_str_array,$Batt_Str_array,$Latitude_array,$Longitude_array,$status_array,$charge_status_array,$altitude_array,$speed_array,$serverdate,$servertime)
     {
     	// echo $employee_id;
     	  if(!empty($imei))
		  {
			   for($i=0;$i<sizeof($posdate_array);$i++)
			   {
			   		$pos_date=$posdate_array[$i];
					// $employee_id=$employee_id[$i];
					$pos_time=$pos_time_array[$i];
					$sig_str=$sig_str_array[$i];
					$batt_str=$Batt_Str_array[$i];
					$latitude=$Latitude_array[$i];
					$longitude=$Longitude_array[$i];
					$status=$status_array[$i];
					$charge_status=$charge_status_array[$i];
					$altitude=$altitude_array[$i];
					$speed=$speed_array[$i];

					$insert_query = $this->db->query("INSERT INTO `gpsdata`(`IMEI`, `emp_id`,`pos_date`, `pos_time`, `sig_str`, `batt_str`, `latitude`, `longitude`, `status`, `charge_status`, `altitude`, `speed`, `server_date`, `server_time`)
					                                          VALUES('$imei','$employee_id','$pos_date','$pos_time','$sig_str','$batt_str','$latitude','$longitude','$status','$charge_status','$altitude','$speed','$serverdate','$servertime')  ON DUPLICATE KEY UPDATE IMEI=IMEI,pos_date=pos_date,pos_time=pos_time");
			    
			  }
			  if($insert_query)
			  {
			  	echo "1";
			  }
			  else
			  {	
				echo "0";
			  }
		   }
		   else
		   {
				echo "empty string";
		   }
     }

// ===================================== / Customer issue unallocated list =================================== 

// ===================================== Get shift details using employee id =================================== 
     public function get_shift($employee_id)
     {
		$date=date("Y-m-d");

	    $query=$this->db->query("SELECT * FROM `tbl_shift` WHERE  '$date' BETWEEN `shift_startdate` AND `shift_enddate` AND  `emp_id`='$employee_id'")->row();
	    // echo "SELECT * FROM `tbl_shift` WHERE '$date' BETWEEN `shift_startdate` AND `shift_enddate` AND `emp_id`='7'";
	    if ($query->shift_id!='') 
	    {
	    	$shift = $query->shift;
			$interval_time = $query->interval_time;
			$start_time = $query->start_time;
			$end_time = $query->end_time;
			// if ($shift=='flexible') 
			// {
			// 	$shift = $query->shift;
			// }
			// else
			// {
			// 	$shift = $query->shift;
			// }

			$final_result=array
			(
				'shift'=>$shift,
				'interval_time'=>$interval_time,
				'start_time'=>$start_time,
				'end_time'=>$end_time,
			);

			echo json_encode($final_result);
	    }
	    else
	    {
	    	$final_result=array
			(
				'shift'=>'12 Hours(8 am-8 pm)',
				'interval_time'=>'5',
				'start_time'=>'00:00:00',
				'end_time'=>'00:00:00',
			);

			echo json_encode($final_result);
	    }

     }

// ===================================== / Get shift details using employee id =================================== 
// ============================== Customer Edit Permission =================================== 
    public function edit_customer_permission($employee_id)
	{
	   $this->db->select('update_permission');
	   $this->db->where('id',$employee_id);
	   $data = $this->db->get('tbl_admin_login')->row();
	   $update_permission = $data->update_permission;
	   if ($update_permission=='1')
	   {
	   		$response["error"] = False;
			$response["error_msg"] = "Permission";
			echo json_encode($response);
	   }
	   else
	   {
	   		$response["error"] = True;
			$response["error_msg"] = "No Permission";
			echo json_encode($response);
	   }
	}

// ============================== / Customer Edit Permission ================================= 

// ============================== Return Source data =================================== 
    public function source_details()
	{
	   $this->db->select('source_id, source_title');
	   $this->db->where('status',1);
	   $data = $this->db->get('tbl_source')->result();
	   if ($data)
	   {
			echo json_encode($data);
	   }
	   else
	   {
	   		$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
	   }
	}

// ============================== / Return Source data ================================= 

// ============================== Return Stage data =================================== 
    public function stage_details()
	{
	   $this->db->select('stage_id, stage_title');
	   $this->db->where('status',1);
	   $data = $this->db->get('tbl_stage')->result();
	   if ($data)
	   {
			echo json_encode($data);
	   }
	   else
	   {
	   		$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
	   }
	}

// ============================== / Return Stage data =================================

// ============================== Return Company name(customer) =================================== 
    public function company_list()
	{
	   $this->db->select('customer_id, company_name');
	   $this->db->where('delete_status',1);
	   $data = $this->db->get('tbl_customer')->result();
	   if ($data)
	   {
			echo json_encode($data);
	   }
	   else
	   {
	   		$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
	   }
	}

// ============================== / Return Company name(customer) =================================

// ============================== / Particular company details(customer) =================================
public function customer_details($customer_id)
    {
       $this->db->select('*');
       $this->db->where('customer_id',$customer_id);
       $data = $this->db->get('tbl_customer')->row();
       if ($data)
       {
            
            $type_id = $data->type_id;
            if ($type_id!=0)
            {
            	 $this->db->select('type_id, title');
		         $this->db->where('type_id',$type_id);
		         $type_data = $this->db->get('tbl_type')->row();

		         $type_id1 = $type_data->type_id;
                 $type_title1 = $type_data->title;
            }
            else
            {
            	 $type_id1="NA";
            	 $type_title1="NA";
            }

            $business_id = $data->business_id;

            if ($business_id!=0)
            {
            	$this->db->select('business_id, business_name');
	            $this->db->where('business_id',$business_id);
	            $business_data = $this->db->get('tbl_business')->row();

		         $business_id1 = $business_data->business_id;
                 $business_name1 = $business_data->business_name;
            }
            else
            {
            	 $business_id1="NA";
            	 $business_name1="NA";
            }

            $location_id = $data->location_id;

            if ($location_id!=0)
            {
            	$this->db->select('location_id, location');
            	$this->db->where('location_id',$location_id);
            	$location_data = $this->db->get('tbl_location')->row();

		         $location_id1 = $location_data->location_id;
                 $location1 = $location_data->location;
            }
            else
            {
            	 $location_id1="NA";
            	 $location1="NA";
            }

            $group_id = $data->group_id;

            if ($group_id!=0)
            {
            	$this->db->select('group_id, group_name');
                $this->db->where('group_id',$group_id);
                $group_data = $this->db->get('tbl_group')->row();

		         $group_id1 = $group_data->group_id;
                 $group_name1 = $group_data->group_name;
            }
            else
            {
            	 $group_id1="NA";
            	 $group_name1="NA";
            }

            

            $state = $data->state;

            $this->db->select('id, name');
            $this->db->where('id',$state);
            $state_data = $this->db->get('states')->row();

            $country = $data->country;

            $this->db->select('id, name');
            $this->db->where('id',$country);
            $country_data = $this->db->get('countries')->row();

            $final_array=array();

            $result_array = array
            (
                'customer_id'=> $data->customer_id,
                'company_name'=> $data->company_name,
                'contact_person_name1'=> $data->contact_person_name1,
                'alternate_email'=> $data->alternate_email,
                'phone_no'=> $data->phone_no,
                'alternate_number'=> $data->alternate_number,
                'landline_number'=> $data->landline_number,
                'email'=> $data->email,
                'address'=> $data->address,

                'city'=> $data->city,
                'dob'=> $data->dob,
                'company_anniversary'=> $data->company_anniversary,
                'marriage_anniversary'=> $data->marriage_anniversary,
                'type_id'=> $type_id1,
                'type_title'=> $type_title1,

                'business_id'=> $business_id1,
                'business_name'=> $business_name1,

                'location_id'=> $location_id1,
                'location'=> $location1,

                'group_id'=> $group_id1,
                'group_name'=> $group_name1,

                'state_id'=> $state_data->id,
                'state_name'=> $state_data->name,

                'country_id'=> $country_data->id,
                'country_title'=> $country_data->name
            );

            array_push($final_array, $result_array);

            echo json_encode($final_array);
       }
       else
       {
            $response["error"] = True;
            $response["error_msg"] = "No Data";
            echo json_encode($response);
       }
    }

// ============================== / Add Leads & Apportunity =================================
public function add_leads_opportunity($employee_id,$company_name,$contact_person_name1,$phone_no,$email,$sources,$stage,$address,$city,$location,$business_segment_id,$group_id,$closure_date,$remarks,$customer_type)
    { 
    		$closure_date1 = date("Y-m-d", strtotime($closure_date));
    		$created_date=date("Y-m-d H:i:s");
    		$lead_generate_id=date("YmdHis"); 
            $add_array = array
            (
                'created_by'=> $employee_id,
                'lead_generate_id'=> $lead_generate_id,
                'company_name'=> $company_name,
                'contact_person_name1'=> $contact_person_name1,
                'phone_no'=> $phone_no,
                'email'=> $email,
                'address'=> $address,
                'source'=> $sources,
                'stage'=> $stage,
                'city'=> $city,
                'business_id'=> $business_segment_id,
                'location'=> $location,
                'group_id'=> $group_id,
                'closure_date'=> $closure_date1,
                'remarks'=> $remarks,
                'customer_type'=> $customer_type,
                'created_date'=> $created_date
            );

            $data = $this->db->insert('tbl_leads_opportunity',$add_array);
            if ($data) 
            {
            	$response["error"] = False;
	            $response["error_msg"] = "Data Added Successfully";
	            echo json_encode($response);
            }
	        else
	        {
	            $response["error"] = True;
	            $response["error_msg"] = "No Data";
	            echo json_encode($response);
	        }
    }
 
//===================================== Leads list ==============================================
	public function leads_list($employee_id)
    {
        $this->db->from('tbl_leads_opportunity');
        $this->db->where("created_by", $employee_id);
        $this->db->order_by("leadopp_id", "DESC");
        $data = $this->db->get();
        $final_array=array();
        foreach ($data->result() as $value) 
        {
            $employee_id = $value->created_by;

            $this->db->select('id, name');
            $this->db->where('id',$employee_id);
            $emp_data = $this->db->get('tbl_admin_login')->row();
            $emp_name = $emp_data->name;

            $business_id = $value->business_id;

            $this->db->select('business_id, business_name');
            $this->db->where('business_id',$business_id);
            $business_data = $this->db->get('tbl_business')->row();
            $business_name = $business_data->business_name;

            $group_id = $value->group_id;

            $this->db->select('group_id, group_name');
            $this->db->where('group_id',$group_id);
            $group_data = $this->db->get('tbl_group')->row();
            $group_name = $group_data->group_name;

            $source = $value->source;

            $this->db->select('source_id, source_title');
            $this->db->where('source_id',$source);
            $source_data = $this->db->get('tbl_source')->row();
            $source_title = $source_data->source_title;

            $stage = $value->stage;

            $this->db->select('stage_id, stage_title');
            $this->db->where('stage_id',$stage);
            $stage_data = $this->db->get('tbl_stage')->row();
            $stage_title = $stage_data->stage_title;


            $result_array = array
            (
                'emp_name'=> $emp_name,
                'company_name'=> $value->company_name,
                'leadopp_id'=> $value->leadopp_id,
                'contact_person_name1'=> $value->contact_person_name1,
                'phone_no'=> $value->phone_no,
                'email'=> $value->email,
                'address'=> $value->address,
                'city'=> $value->city,
                'business_name'=> $business_name,
                'location'=> $value->location,
                'group_name'=> $group_name,
                'stage_title'=> $stage_title,
                'source_title'=> $source_title,
                'closure_date'=> date("d M Y", strtotime($value->closure_date)),
                'remarks'=> $value->remarks,
                'customer_type'=> $value->customer_type
                // 'created_date'=> $value->created_date
            );

            array_push($final_array, $result_array);
        }

         echo json_encode($final_array);
    }

//==================================== Update Leads Opportunity =================================================
  	public function update_leads_opportunity($stage, $leadopp_id)
  	{	
			$this->db->where('leadopp_id', $leadopp_id);
			$this->db->set('stage',$stage);
			$data = $this->db->update('tbl_leads_opportunity'); 
			$data1 = $this->db->affected_rows($data);
			if ($data1) 
			{
				$response["error"] = FALSE;
				$response["error_msg"] = "Updated successfully";
				echo json_encode($response);
			}
			else
			{
				$response["error"] = TRUE;
				$response["error_msg"] = "Failed to update";
				echo json_encode($response);
			}			
  	}
//==================================== / Update Leads Opportunity  =================================================

// =================================== Product / Service List ==========================================================
  	public function get_product_list()
    {
      $array=array('prdsrv_type'=>'product', 'status'=>'1');
      $this->db->where($array);
      $data = $this->db->get('tbl_product_service')->result();
      $final_array=array();
      foreach ($data as $value) 
      {
        $prd_brand = $value->prd_brand;
        $prd_specs = $value->prd_specs;

        $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

        $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();

        $prdsrv_array=array
        (
            'product_id'=>$value->prd_srv_id,
            'product_name'=>$value->prdsrv_name
        );
        array_push($final_array, $prdsrv_array);
      }
      echo json_encode($final_array);
    }

// ------------------------------------------------------------------------------------------

    public function get_service_list()
    {
      $array=array('prdsrv_type'=>'service', 'status'=>'1');
      $this->db->where($array);
      $data = $this->db->get('tbl_product_service')->result();
      $final_array=array();
      foreach ($data as $value) 
      {
        // $prd_brand = $value->prd_brand;
        // $prd_specs = $value->prd_specs;

        // $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

        // $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();

        $prdsrv_array=array
        (
            'service_id'=>$value->prd_srv_id,
            'service_name'=>$value->prdsrv_name
        );
        array_push($final_array, $prdsrv_array);
      }
      // return $final_array;
      echo json_encode($final_array);
    }

// --------------------------------------------------------------------------------------------------------
    public function get_productservice_details($prd_srv_id)
    {
      $array=array('prd_srv_id'=>$prd_srv_id);
      $this->db->where($array);
      $data = $this->db->get('tbl_product_service')->result();
      $final_array=array();
      foreach ($data as $value) 
      {
        $prd_brand = $value->prd_brand;
        $prd_specs = $value->prd_specs;
        $prd_srv_id = $value->prd_srv_id;

        $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

        $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();


		// ======================product multiple images===============

		$prduct_multiple_images = $this->db->query("SELECT image FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->result();
		// $multiple_image= array();
		// // $image_arr['images1'] = array();
		// foreach ($prduct_multiple_images->result() as $images)
		//  {
		// 	$image_arr=$images->image;
		// 	array_push($multiple_image,$image_arr);
	 //     }

	     $multiple_image="";
         for ($i=0; $i < count($prduct_multiple_images); $i++) 
         { 
         	 $mult_image = $prduct_multiple_images[$i]->image;
             $multiple_image=$multiple_image.$mult_image.",";
         }
         $images = trim($multiple_image, ',');


        $prdsrv_array=array
        (
            'prd_srv_id'=>$value->prd_srv_id,
            'prdsrv_name'=>$value->prdsrv_name,
            'prdsrv_type'=>$value->prdsrv_type,
            'brand_name'=>$brand_name->brand_name,
            'specs'=>$specs_name->specs,
            'prdsrv_uom'=>$value->prdsrv_uom,
            'multiple_image'=>$images,
            'prdsrv_description'=>$value->prdsrv_description
        );
        
        array_push($prdsrv_array);
        // array_push($final_array, $prdsrv_array);
      }
      // return $final_array;
      echo json_encode($prdsrv_array);
    }
// ======================================/ Product / Service deials and list ======================================

// ====================================== Send mail to customer ======================================
    public function send_mail($customer_id,$description)
    {
      $array=array('customer_id'=>$customer_id);
      $this->db->where($array);
      $cust_detals = $this->db->get('tbl_customer')->row();
	    
	  $cust_email = $cust_detals->email;

  			include_once 'assets/phpmailer/phpmailer.php';

            // $email = "dtechsysindia@gmail.com";
            // $password = "dtechsys@17771";
            // $to_id = "kishor@ileaf.in";
            // $subject = "Prduct / Service";
            $message1 = "<table width='650px' style='background:#f2f2f2;color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>
                              
                              <tr>
                                  <td><b>Hello ".$cust_detals->company_name.",</b></td>
                              </tr>
                               <tr>
                                  <td >&nbsp;</td>
                               </tr>
                                <tr>
                                  <td>".$description."</td>
                               </tr>  
                               <tr>
                                  <td >&nbsp;</td>
                               </tr>   
                        </table>";
            

                  // Configuring SMTP server settings
                  $mail = new PHPMailer;
                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';
                  $mail->Port = 25;
                  $mail->SMTPSecure = 'tls';
                  $mail->SMTPAuth = true;
                  $mail->Username = "dtechsysindia@gmail.com";
                  $mail->Password = "dtechsys@17771";

                  $mail->FromName = "Dexterity TechSys Pvt. Ltd.";

                  // Email Sending Details
                  $mail->addAddress($cust_email);
                  // $mail->AddCC("accounts@dexterityindia.in");
                  $mail->Subject = "Prduct / Service";
                  $mail->msgHTML($message1);

                  // Success or Failure
                  if (!$mail->send()) 
                  {
	                    $error = "Mailer Error: " . $mail->ErrorInfo;

	                    $response["error"] = TRUE;
						$response["error_msg"] = "Filed to send mail";
						echo json_encode($response);
                  }
                  else 
                  {
	                    $response["error"] = FALSE;
						$response["error_msg"] = "Email send successfully";
						echo json_encode($response);
                  }
       }

       
}

