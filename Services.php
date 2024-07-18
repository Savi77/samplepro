<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller
 {

	public function index()
     {
	     	$tag=$_REQUEST['tag'];
	     	$this->load->model('Webservices_model');
	     	$this->load->model('Webservices_newmodel');
	     	$this->load->model('Webservices_filemodel');    	     	
	     	$this->load->model('Webservices_Report_model');  	 

			switch ($tag) 
			{

				case "get_module":
							  $org_id = $_REQUEST['org_id'];
							  $this->Webservices_model->get_module($org_id);
				              break;

				case "login":
							  $mobileno = $_REQUEST['mobile_no'];
							  $password = $_REQUEST['password'];
							  $user_type = $_REQUEST['user_type'];
							  $this->Webservices_model->check_login($mobileno, $password,$user_type);
				               break;

				case "user_image":               
								   $user_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $this->Webservices_model->user_image($user_id, $user_type);
				                   break;

				case "validation":               
								   $mobileno = $_REQUEST['mobile_no'];
								   $email = $_REQUEST['email'];
								   $this->Webservices_model->validate_mobileno($mobileno, $email);
				                   break;

				case "lead_validation":               
								   $mobileno = $_REQUEST['mobile_no'];
								   $email = $_REQUEST['email'];
								   $customer_id = $_REQUEST['company_id'];
								   $this->Webservices_model->lead_validation($mobileno, $email,$customer_id);
				                   break;


				case "register":       
								$customer_type = $_REQUEST['customer_type'];
								$parent_id = $_REQUEST['parent_id'];
								$company_name = $_REQUEST['company_name'];
							    $email = $_REQUEST['email'];
							    $phone_no = $_REQUEST['phone_no'];
								$contact_person_name1 = $_REQUEST['contact_person_name1'];
								$alternate_email = $_REQUEST['alternate_email'];
								$city = $_REQUEST['city'];
								$address = $_REQUEST['address'];
								$password = $_REQUEST['password'];
								$country_id = $_REQUEST['country_id'];
								$dob = $_REQUEST['dob'];
								$cad = $_REQUEST['cad'];
								$mad = $_REQUEST['mad'];
								$alternate_phone_no = $_REQUEST['alternate_phone_no'];
								$state_id = $_REQUEST['state_id'];
								$type_id = $_REQUEST['type_id'];
								$business_segment_id = $_REQUEST['business_segment_id'];
								$group_id = $_REQUEST['group_id'];
								$location_id = $_REQUEST['location_id'];
								$created_by = $_REQUEST['created_by'];
								$landline = $_REQUEST['landline'];

								if ($company_name!='' && $email!='' && $phone_no!='' && $contact_person_name1!='' && $address!='')
							    {
									$this->Webservices_model->register_new_customer($customer_type,$parent_id,$company_name,$email,$phone_no,$contact_person_name1,$alternate_email,$city,$address,$password,$country_id,$dob,$cad,$mad,$alternate_phone_no,$state_id,$type_id,$business_segment_id,$group_id,$location_id,$created_by,$landline);
							    }
							    else
							    {
							   		$response["error"] = TRUE;
									$response["error_msg"] = "Registration failed.";
									echo json_encode($response);
							    }
                               break;

				case "convert_to_contact":               
										$leadopp_id = $_REQUEST['leadopp_id'];
										$company_name = $_REQUEST['company_name'];
									    $email = $_REQUEST['email'];
									    $phone_no = $_REQUEST['phone_no'];
										$contact_person_name1 = $_REQUEST['contact_person_name1'];
										$address = $_REQUEST['address'];
										$created_by = $_REQUEST['created_by'];
							            $this->Webservices_filemodel->convert_to_contact($leadopp_id,$company_name,$email,$phone_no,$contact_person_name1,$address,$created_by);
				                        break;

				case "social_login":               
								   $name = $_REQUEST['name'];
								   $email = $_REQUEST['email'];
								   $mobile_no = $_REQUEST['mobile_no'];
								   $ip = $_REQUEST['ip'];
								   $this->Webservices_model->social_login($name,$email,$mobile_no,$ip);
				                   break;

				case "forgot_password":               
									   $email = $_REQUEST['email'];
									   $this->Webservices_model->forgot_password($email);
					                   break;

				case "change_password":               
									   $email = $_REQUEST['email'];
									   $password = $_REQUEST['password'];
									   $code = $_REQUEST['code'];
									   $this->Webservices_model->change_password($email, $password, $code);
				                       break;

				case "product_list":               
									$this->Webservices_model->product_list();
				                     break;

				case "submit_query":               
									   $query = $_REQUEST['query'];
									   $product_id = $_REQUEST['product_id'];
									   $product_name = $_REQUEST['product_name'];
									   $customer_id = $_REQUEST['customer_id'];
									   if ($query!='' && $product_id!='' && $customer_id!='')
									   {
											$this->Webservices_model->submit_query($query,$product_id,$product_name,$customer_id);
									   }
									   else
									   {
									   		$response["error"] = TRUE;
											$response["error_msg"] = "Failed to submit.";
											echo json_encode($response);
									   }
				                     break;

				case "query_list":               
								   $customer_id = $_REQUEST['customer_id'];
								   $this->Webservices_model->query_list($customer_id);
				                   break;

				case "tag_query":               
								   $query_id = $_REQUEST['query_id'];
								   $this->Webservices_model->tag_query($query_id);
				                   break;

				case "submit_feedback":               
									   $feedback = $_REQUEST['feedback'];
									   $ticket_no = $_REQUEST['ticket_no'];
									   $customer_id = $_REQUEST['customer_id'];
									   $rating = $_REQUEST['rating'];
									   $this->Webservices_model->submit_feedback($feedback,$ticket_no,$customer_id,$rating);
				                   break;

				case "is_feedback_submitted":               
										   $ticket_no = $_REQUEST['ticket_no'];
										   $this->Webservices_model->is_feedback_submitted($ticket_no);
				                  break;
				case "report":               
								   $employee_id = $_REQUEST['employee_id'];
								   $start_date = $_REQUEST['start_date'];
								   $end_date = $_REQUEST['end_date'];
								   $this->Webservices_model->report($employee_id,$start_date,$end_date);
				                   break;

				case "notification_list":               
								   $user_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $this->Webservices_model->notification_list($user_id,$user_type);
				                   break;

				case "dashboard_count":               
								   $user_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $imei = $_REQUEST['imei'];
								   $this->Webservices_model->dashboard_count($user_id,$user_type,$imei);
				                   break;

				case "allocated_task":               
								   $user_id = $_REQUEST['user_id'];
								   $this->Webservices_model->allocated_task($user_id);
				                   break;


				case "update_task_status":               
								   $employee_id = $_REQUEST['employee_id'];
								   $customer_id = $_REQUEST['customer_id'];
								   $product_id = $_REQUEST['product_id'];
								   $ticket_no = $_REQUEST['ticket_no'];
								   $remark = $_REQUEST['remark'];
								   $status = $_REQUEST['status'];
								   $schedule_id = $_REQUEST['schedule_id'];
								   $query_id = $_REQUEST['query_id'];

								   $this->Webservices_model->update_task_status($employee_id,$customer_id,$product_id,$ticket_no,$remark,$status,$schedule_id,$query_id);
				                  break;

				case "track_task":               
								   $customer_id = $_REQUEST['customer_id'];
								   $this->Webservices_model->track_task($customer_id);
				                   break;

				case "save_token_id":               
								   $user_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $token_id = $_REQUEST['token_id'];
								   $this->Webservices_model->save_token_id($user_id,$user_type,$token_id);
				                   break;

				case "get_task":               
								   $user_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $task_type = $_REQUEST['task_type'];
								   $this->Webservices_model->get_task($user_id,$user_type,$task_type);
				                  break;

				case "send_message":               
								   $employee_id = $_REQUEST['employee_id'];
								   $customer_id = $_REQUEST['customer_id'];
								   $product_id = $_REQUEST['product_id'];
								   $query_id = $_REQUEST['query_id'];
								   $ticket_no = $_REQUEST['ticket_no'];
								   $message = $_REQUEST['message'];
								   $user_type = $_REQUEST['user_type'];
								   $this->Webservices_model->send_message($employee_id,$customer_id,$product_id,$query_id,$ticket_no,$message,$user_type);

				                  break;

				case "get_message":               
								   $user_id = $_REQUEST['user_id'];
								   $query_id = $_REQUEST['query_id'];
								   $ticket_no = $_REQUEST['ticket_no'];
								   $user_type = $_REQUEST['user_type'];
								   $this->Webservices_model->get_message($user_id,$query_id,$ticket_no,$user_type);
				                  break;

				case "get_query":               
								   $query_id = $_REQUEST['query_id'];
								   $this->Webservices_model->get_query($query_id);
				                  break;

				case "close_issue":               
								   $customer_id = $_REQUEST['customer_id'];
								   $query_id = $_REQUEST['query_id'];
								   $remark = $_REQUEST['remark'];
								   $status = $_REQUEST['status'];
								   $this->Webservices_model->close_issue($customer_id,$query_id,$remark,$status);
				                  break;

				case "group_list":               
									 $this->Webservices_model->group_list();
				                  break;

				case "state_list":               
								   $country_id = $_REQUEST['country_id']; 
								   $this->Webservices_model->state_list($country_id);
				                  break;

				case "business_segment_list":               
								  $this->Webservices_model->business_segment_list();
				                  break;

				case "type_list":               
								  $this->Webservices_model->type_list();
				                  break;

				case "location_list":               
								 $this->Webservices_model->location_list();	
				                  break;

				case "country_list":               
									$this->Webservices_model->country_list();
				                  break;

				case "assign_query":               
								   $type = $_REQUEST['type'];
								   $leadopp_id = $_REQUEST['leadopp_id'];
								   $query = $_REQUEST['query'];
								   $product_id = $_REQUEST['product_id'];
								   $product_name = $_REQUEST['product_name'];
								   $customer_id = $_REQUEST['customer_id'];
								   $employee_id = $_REQUEST['employee_id'];
								   $schedule_date = $_REQUEST['schedule_date'];
								   $start_time = $_REQUEST['start_time'];
								   $end_time = $_REQUEST['end_time'];
								   $schedule_type = $_REQUEST['schedule_type']; // Like case, own, task
								   $schedule_type_id = $_REQUEST['schedule_type_id']; // Like onsite visit and online support etc...
								   $overlapping = $_REQUEST['overlapping']; // No then validate and if yes then insert

								   if ($query!='' && $product_id!='' && $customer_id!='' && $employee_id!='' && $schedule_date!='' && $start_time!='' && $end_time!='' && $schedule_type!='' && $overlapping!='' && $schedule_type_id!='')
								   {
										$this->Webservices_model->assign_query($query,$product_id,$product_name,$customer_id,$employee_id,$schedule_date,$start_time,$end_time,$schedule_type,$overlapping,$schedule_type_id,$type,$leadopp_id);
								   }
								   else
								   {
								   		$response["error"] = TRUE;
										$response["error_msg"] = "Failed to submit";
										echo json_encode($response);
								   }
				                  break;

				case "assign_emp_schedule":               
										   $query = $_REQUEST['query'];
										   $product_id = $_REQUEST['product_id'];
										   $product_name = $_REQUEST['product_name'];
										   $customer_id = $_REQUEST['customer_id'];
										   $employee_id = $_REQUEST['employee_id'];
										   $schedule_date = $_REQUEST['schedule_date'];
										   $start_time = $_REQUEST['start_time'];
										   $end_time = $_REQUEST['end_time'];
										   $schedule_type = $_REQUEST['schedule_type']; // Like case, own, task
										   $schedule_type_id = $_REQUEST['schedule_type_id']; // Like onsite visit and online support etc...
										   $overlapping = $_REQUEST['overlapping']; // No then validate and if yes then insert
										   $user_id = $_REQUEST['user_id']; //select employee nae

										   if ($query!='' && $product_id!='' && $customer_id!='' && $employee_id!='' && $schedule_date!='' && $start_time!='' && $end_time!='' && $schedule_type!='' && $overlapping!='' && $schedule_type_id!='')
										   {
												$this->Webservices_newmodel->assign_emp_schedule($query,$product_id,$product_name,$customer_id,$employee_id,$schedule_date,$start_time,$end_time,$schedule_type,$overlapping,$schedule_type_id,$user_id);
										   }
										   else
										   {
										   		$response["error"] = TRUE;
												$response["error_msg"] = "Failed to submit";
												echo json_encode($response);
										   }
				                  break;


				case "schedule_list":               
								   $employee_id = $_REQUEST['employee_id'];
								   $date = $_REQUEST['date'];
								   $this->Webservices_model->schedule_list1($employee_id,$date);
				                  break;

				case "schedule_type_name":               
								          $this->Webservices_model->schedule_type_name();
				                          break;

				case "reschedule":               
								   $employee_id = $_REQUEST['employee_id'];
								   $overlapping = $_REQUEST['overlapping'];
								   $schedule_date = $_REQUEST['schedule_date'];
								   $start_time = $_REQUEST['start_time'];
								   $end_time = $_REQUEST['end_time'];
								   $ticket_no = $_REQUEST['ticket_no'];
								   $remark = $_REQUEST['remark'];
								   $customer_id = $_REQUEST['customer_id'];
								   $query_id = $_REQUEST['query_id'];
								   $product_id = $_REQUEST['product_id'];

								   if ($query_id!='' && $product_id!='' && $customer_id!='' && $employee_id!='' && $schedule_date!='' && $start_time!='' && $end_time!='' && $overlapping!='' && $ticket_no!='' && $remark!='')
								   {
										$this->Webservices_model->reschedule($employee_id,$overlapping,$schedule_date,$start_time,$end_time,$ticket_no,$remark,$customer_id,$query_id,$product_id);
								   }
								   else
								   {
								   		$response["error"] = TRUE;
										$response["error_msg"] = "Failed to submit";
										echo json_encode($response);
								   }
				                  break;


				case "customer_list":               
									  $this->Webservices_model->customer_list();	
				                      break;

				case "schedule_customer_list":               
										$this->Webservices_model->schedule_customer_list();
				                        break;

				case "get_customer":               
									$customer_id = $_REQUEST['customer_id'];
								    $this->Webservices_model->get_customer($customer_id);
				                    break;


				case "update_customer":               
										$customer_id = $_REQUEST['customer_id'];
										$company_id = $_REQUEST['company_id'];
										$company_name = $_REQUEST['company_name'];
									    $email = $_REQUEST['email'];
									    $phone_no = $_REQUEST['phone_no'];
										$contact_person_name1 = $_REQUEST['contact_person_name1'];
										$alternate_email = $_REQUEST['alternate_email'];
										$city = $_REQUEST['city'];
										$address = $_REQUEST['address'];
										$password = $_REQUEST['password'];
										$country_id = $_REQUEST['country_id'];
										$dob = $_REQUEST['dob'];
										$cad = $_REQUEST['cad'];
										$mad = $_REQUEST['mad'];
										$alternate_phone_no = $_REQUEST['alternate_phone_no'];
										$state_id = $_REQUEST['state_id'];
										$type_id = $_REQUEST['type_id'];
										$business_segment_id = $_REQUEST['business_segment_id'];
										$group_id = $_REQUEST['group_id'];
										$location_id = $_REQUEST['location_id'];
										$created_by = $_REQUEST['created_by'];
										$landline = $_REQUEST['landline'];
										$edited_by = $_REQUEST['edited_by'];
										$this->Webservices_model->update_customer($customer_id,$company_id,$company_name,$email,$phone_no,$contact_person_name1,$alternate_email,$city,$address,$password,$country_id,$dob,$cad,$mad,$alternate_phone_no,$state_id,$type_id,$business_segment_id,$group_id,$location_id,$created_by,$landline,$edited_by);
				                    break;


				case "target_list":               
									$employee_id = $_REQUEST['employee_id'];
								   $this->Webservices_model->target_list($employee_id);
				                    break;

				case "submit_billing_info":               
											$token_id = $_REQUEST['token_id'];
											$employee_id = $_REQUEST['employee_id'];
											$billing_type = $_REQUEST['billing_type'];
											$billing_remark = $_REQUEST['billing_remark'];
											$target = $_REQUEST['target'];
											$price = $_REQUEST['price'];
											$this->Webservices_model->submit_billing_info($token_id,$employee_id,$billing_type,$billing_remark,$target,$price);
				                      break;


				case "billing_validation":               
										$token_id = $_REQUEST['token_id'];
										$employee_id = $_REQUEST['employee_id'];
										$user_type = $_REQUEST['user_type'];
										// print_r($json_data2);
									    $this->Webservices_model->billing_validation($token_id,$employee_id,$user_type);
					                    break;

				case "target_bill_validation":               
											$token_id = $_REQUEST['token_id'];
											$employee_id = $_REQUEST['employee_id'];
											$user_type = $_REQUEST['user_type'];
											// print_r($json_data2);
										    $this->Webservices_model->target_bill_validation($token_id,$employee_id,$user_type);
				                         break;


				case "allocated_list":               
									$customer_id = $_REQUEST['customer_id'];
								    $this->Webservices_model->allocated_list($customer_id);
				                    break;
				case "unallocated_list":               
									$customer_id = $_REQUEST['customer_id'];
								    $this->Webservices_model->unallocated_list($customer_id);
				                    break;
				case "location":               
								 $employee_id = $_REQUEST['user_id'];
								 $imei=$_REQUEST['IMEI'];
								 $posdate_array=explode(",", $_REQUEST['pos_date']);
								 $pos_time_array=explode(",", $_REQUEST['pos_time']);
								 $sig_str_array=explode(",", $_REQUEST['sig_str']);
								 $Batt_Str_array=explode(",", $_REQUEST['batt_str']);
								 $Latitude_array=explode(",", $_REQUEST['latitude']);
								 $Longitude_array=explode(",", $_REQUEST['longitude']);
								 $status_array=explode(",", $_REQUEST['status']);
								 $charge_status_array=explode(",", $_REQUEST['charge_status']);
								 $altitude_array=explode(",", $_REQUEST['altitude']);
								 $speed_array=explode(",", $_REQUEST['speed']);
								 date_default_timezone_set('Asia/Colombo');
								 $serverdate=date("Y-m-d");
								 $servertime=date("H:i", strtotime("now"));
							     $this->Webservices_model->location($employee_id,$imei,$posdate_array,$pos_time_array,$sig_str_array,$Batt_Str_array,$Latitude_array,$Longitude_array,$status_array,$charge_status_array,$altitude_array,$speed_array,$serverdate,$servertime);

				                    break;

				case "get_shift":               
									$employee_id = $_REQUEST['employee_id'];
								    $this->Webservices_model->get_shift($employee_id);
				                    break;

				case "edit_customer_permission":               
										$employee_id = $_REQUEST['employee_id'];
									    $this->Webservices_model->edit_customer_permission($employee_id);
				                    break;

				case "source_details":               
									$this->Webservices_model->source_details();
				                    break;

				case "stage_details":               
									 $this->Webservices_model->stage_details();
				                    break;

				case "company_list":               
									$this->Webservices_model->company_list();
				                    break;



				case "customer_details":               
									$customer_id = $_REQUEST['customer_id'];
								    $this->Webservices_model->customer_details($customer_id);
				                    break;


				case "add_leads_opportunity":               
										    $leadopp_id = $_REQUEST['leadopp_id'];
											$employee_id = $_REQUEST['employee_id'];
											$company_id = $_REQUEST['company_id'];
											$company_name = $_REQUEST['company_name'];
											$contact_person_name1 = $_REQUEST['contact_person_name1'];
											$phone_no = $_REQUEST['phone_no'];
											$email = $_REQUEST['email'];
											$sources = $_REQUEST['sources'];
											$stage = $_REQUEST['stage'];
											$address = $_REQUEST['address'];
											$city = $_REQUEST['city'];
											$business_value = $_REQUEST['business_value'];
											$location = $_REQUEST['location'];
											$business_segment_id = $_REQUEST['business_segment_id'];
											$group_id = $_REQUEST['group_id'];
											$closure_date = $_REQUEST['closure_date'];
											$remarks = $_REQUEST['remarks'];
											$customer_type = $_REQUEST['customer_type'];				
											$product_id = $_REQUEST['product_id'];
									        $this->Webservices_model->add_leads_opportunity($employee_id,$company_name,$contact_person_name1,$phone_no,$email,$sources,$stage,$address,$city,$location,$business_segment_id,$group_id,$closure_date,$remarks,$customer_type,$business_value,$company_id,$leadopp_id,$product_id);
				                    break;

				case "leads_list":               
									$employee_id = $_REQUEST['employee_id'];
								    $this->Webservices_model->leads_list($employee_id);
				                    break;
				case "transfer_leads":               
									$leadopp_id = $_REQUEST['leadopp_id'];
									$assign_to = $_REQUEST['assign_to'];
									$created_by = $_REQUEST['created_by'];
								    $this->Webservices_model->transfer_leads($leadopp_id,$assign_to,$created_by);
				                    break;

				case "update_leads_opportunity":               
									$stage = $_REQUEST['stage'];
									$leadopp_id = $_REQUEST['leadopp_id'];
								    $this->Webservices_model->update_leads_opportunity($stage, $leadopp_id);
				                    break;

				case "emp_customer_list":               
									$this->Webservices_model->emp_customer_list();
				                    break;
				                    
				case "update_user_permission":               
								   $employee_id = $_REQUEST['employee_id'];
								   $this->Webservices_model->update_user_permission($employee_id);
				                    break;



				case "get_category_list":               
									$this->Webservices_model->get_category_list();
				                    break;

				case "get_type_list":               
									$this->Webservices_model->get_type_list();
				                    break;

				case "get_product_service_list":               
								   $user_id = $_REQUEST['user_id'];
								   $category_id = $_REQUEST['category_id'];
								   $type_name = $_REQUEST['type_name'];
								   $this->Webservices_model->get_product_service_list($user_id, $category_id, $type_name);
				                    break;


				case "cust_feedback":               
								   $cust_id = $_REQUEST['cust_id'];
								   $feedback = $_REQUEST['feedback'];
								   $this->Webservices_model->cust_feedback($cust_id,$feedback);
				                    break;
				case "get_productservice_details":               
								   $prd_srv_id = $_REQUEST['product_service_id'];
								   $this->Webservices_model->get_productservice_details($prd_srv_id);
				                    break;


				case "get_productservice_details":               
								   $prd_srv_id = $_REQUEST['product_service_id'];
								   $this->Webservices_model->get_productservice_details($prd_srv_id);
				                    break;

				case "send_mail":               
								   $customer_id = $_REQUEST['customer_id'];
								   $description = $_REQUEST['description'];
								   $subject = $_REQUEST['subject'];
								   $emp_id = $_REQUEST['emp_id'];
								   $this->Webservices_model->send_mail($customer_id,$description,$subject,$emp_id);
				                    break;

				case "shopping_cart":               
								   $customer_id = $_REQUEST['customer_id'];
								   $product_id = $_REQUEST['product_id'];
								   $this->Webservices_model->shopping_cart($customer_id, $product_id);
				                    break;			                    

				case "cart_products":               
									$customer_id = $_REQUEST['customer_id'];
									$this->Webservices_model->cart_products($customer_id);
				                    break;

				case "remove_product_cart":               
										   $customer_id = $_REQUEST['customer_id'];
										   $product_id = $_REQUEST['product_id'];
										   $this->Webservices_model->remove_product_cart($customer_id,$product_id);
				                    break;

				case "decrement_product_count":               
										   $customer_id = $_REQUEST['customer_id'];
										   $product_id = $_REQUEST['product_id'];
										   $this->Webservices_model->decrement_product_count($customer_id,$product_id);
				                    break;

				case "cart_sum_counter":               
									   $customer_id = $_REQUEST['customer_id'];
									   $this->Webservices_model->cart_sum_counter($customer_id);
				                    break;

				case "order_details":               
						            $order_id = $_REQUEST['order_id'];
						            $this->Webservices_model->order_details($order_id);
				                    break;

				case "place_order":               
									   $customer_id = $_REQUEST['customer_id'];
									   $emp_id = $_REQUEST['user_id'];
									   $user_type = $_REQUEST['user_type'];
									   $amount = $_REQUEST['amount'];
									   $this->Webservices_model->cart_place_order($customer_id,$emp_id,$user_type,$amount); 
				                    break;

				case "order_history":               
								   $customer_id = $_REQUEST['user_id'];
								   $user_type = $_REQUEST['user_type'];
								   $this->Webservices_model->order_history($customer_id,$user_type);
				                    break;

				case "order_status":               
								   $order_id = $_REQUEST['order_id'];
								   $this->Webservices_model->order_status($order_id);
				                    break;


				case "primary_customer_list":               
									$this->Webservices_model->primary_customer_list();
				                    break;

				case "get_cust_location":               
									$this->Webservices_newmodel->get_cust_location();
				                    break;

				case "user_geofence":               
									$this->Webservices_newmodel->user_geofence();
				                    break;

				case "schedule_emp_list":               
									 $this->Webservices_newmodel->schedule_emp_list();
				                    break;

				case "user_permission":               
									$this->Webservices_newmodel->user_permission();
				                    break;

				case "today_schedule_list":               
									$this->Webservices_newmodel->today_schedule_list();
				                    break;

				case "todays_thought":               
									$this->Webservices_newmodel->todays_thought();
				                    break;
				case "target_summary":               
									$this->Webservices_newmodel->target_summary();
				                    break;

				case "upload_documents":               
									$this->Webservices_filemodel->upload_documents();
				                    break;

				case "share_details":               
									$this->Webservices_filemodel->share_details();
				                    break;

				case "get_notes":               
									$this->Webservices_filemodel->get_notes();
				                    break;


				case "quotation_list":               
									$this->Webservices_filemodel->quotation_list();
				                    break;

				case "get_dashboard_notes":               
									$this->Webservices_filemodel->get_dashboard_notes();
				                    break;

				case "send_dashboard_notes":               
									$this->Webservices_filemodel->send_dashboard_notes();
				                    break;

				case "edit_dashboard_notes":               
									$this->Webservices_filemodel->edit_dashboard_notes();
				                    break;
				
				case "delete_dashboard_notes":               
									$this->Webservices_filemodel->delete_dashboard_notes();
				                    break;				     

				case "send_notes":               
									$this->Webservices_filemodel->send_notes();
				                    break;

				case "get_expense_type":               
									$this->Webservices_filemodel->get_expense_type();
				                    break;

				case "add_expense":               
									$this->Webservices_filemodel->add_expense();
				                    break;

				case "upload_expense_documents":               
									$this->Webservices_filemodel->upload_expense_documents();
				                    break;

				case "view_expense_list":               
									$this->Webservices_filemodel->view_expense_list();
				                    break;
				                    
				case "view_pending_expense_list":               
									$this->Webservices_filemodel->view_pending_expense_list();
				                    break;
				case "expense_list":               
									$this->Webservices_filemodel->expense_list();
				                    break;

				case "edit_expense":               
									$this->Webservices_filemodel->edit_expense();
				                    break;

				case "schedule_priority":               
									$this->Webservices_filemodel->schedule_priority();
				                    break;

				case "upload_schedule_documents":               
									$this->Webservices_filemodel->upload_schedule_documents();
				                    break;

				// Reports ----------------------------------------------------------------- 

				case "Lead_Opportunity_by_Source":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Source();
				                    break;


				case "Lead_Opportunity_by_Segments":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Segment();
				                    break;

				case "Lead_Opportunity_by_Segments_Details":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Segments_Details();
				                    break;


				case "Lead_Opportunity_by_Product":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Product();
				                    break;

				case "Lead_Opportunity_by_Product_Details":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Product_Details();
				                    break;

				case "Lead_Opportunity_by_SalesPerson":               
									$this->Webservices_Report_model->Lead_Opportunity_by_SalesPerson();
				                    break;

				case "EmpList":               
									$this->Webservices_Report_model->GetEmpList();
				                    break;


 				case "Lead_Opportunity_by_Stage":               
									$this->Webservices_Report_model->Lead_Opportunity_by_Stage();
				                    break;










				 // Reports -----------------------------------------------------------------                    

				default: echo "Tag is missing";
			        
			}


     }











}
