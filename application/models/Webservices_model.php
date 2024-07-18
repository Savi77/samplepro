<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webservices_model extends CI_Model
{
	function __construct()
	{
		parent::__construct(); // construct the Model class
		$this->load->database();
	}


	public function get_module($org_id)
	{
		$this->db->select("module_ids");
		$this->db->where("org_id", $org_id);
		$org = $this->db->get("tbl_organisation")->row();
		$explode = explode(",", $org->module_ids);
		$response["module_ids"] = $explode;
		echo json_encode($response);
	}

	public function check_login($mobileno, $password, $user_type, $email)
	{

		if ($user_type == 'Employee') {
			$user_password = $password;
			$query = $this->db->query(" SELECT * FROM `tbl_admin_login` WHERE `email`='$email'")->row();
			$response_array = array();
			if ($query) {
				$pass = $query->Password;
				$user_status = $query->user_status;
				$type = $query->user_type;
				if ($user_status == 1) {
					$emp_image = $query->profile_img;
					if ($emp_image != '') {
						$profile_image = $emp_image;
					} else {
						$profile_image = 'dummy.png';
					}
					if ($pass == $user_password) {
						if ($type == 'E') {
							$response_array["error"] = FALSE;
							$response_array["error_msg"] = "Login successfully.";
							$response_array['customer_id'] = $query->id;

							$response_array['org_id'] = $query->org_id;

							$response_array['company_name'] = $query->name;
							$response_array['phone_no'] = $query->mobile_no;
							$response_array['contact_person_name1'] = $query->name;
							$response_array['profile_img'] = $profile_image;
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
							$response_array['imei'] = $imei;
							echo json_encode($response_array);
						} else {
							$response["error"] = TRUE;
							$response["error_msg"] = "Sorry ! This account does not have login permission";
							echo json_encode($response);
						}
					} else {
						$response["error"] = TRUE;
						$response["error_msg"] = "Password does not Match";
						echo json_encode($response);
					}
				} else {
					$response["error"] = TRUE;
					$response["error_msg"] = "User not verified";
					echo json_encode($response);
				}
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "User does not exist";
				echo json_encode($response);
			}
		} else {
			$user_password = $password;
			$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `email`='$email' ")->row();
			$response_array = array();
			if ($query) {
				$pass = $query->password;
				$profile_image = 'dummy.png';

				if ($pass == $user_password) {
					$response_array["error"] = FALSE;
					$response_array["error_msg"] = "Registration successfully.";
					$response_array['customer_id'] = $query->customer_id;
					$response_array['org_id'] = $query->org_id;
					$response_array['company_name'] = $query->company_name;
					$response_array['phone_no'] = $query->phone_no;
					$response_array['contact_person_name1'] = $query->contact_person_name1;
					$response_array['profile_img'] = $profile_image;
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
					$response_array['imei'] = $imei;
					echo json_encode($response_array);
				} else {
					$response["error"] = TRUE;
					$response["error_msg"] = "Password does not Match";
					echo json_encode($response);
				}
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "User does not exist";
				echo json_encode($response);
			}
		}
	}


	//----------------------------------Employee Image-------------------------  

	public function user_image($user_id, $user_type)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Employee') {
			$image_data = $this->db->query("SELECT tbl_admin_login.profile_img,tbl_designation.designation_name,tbl_department.department_name FROM tbl_admin_login JOIN tbl_designation ON tbl_admin_login.designation = tbl_designation.deg_id JOIN tbl_department ON tbl_admin_login.department = tbl_department.dep_id WHERE `id`='$user_id'")->row();
			
			$this->db->where("org_id", $org_id);
			$res_data = $this->db->get("tbl_organisation")->row();
			
			$emp_image = $image_data->profile_img;
			if($image_data->designation_name != '' && $image_data->department_name){
				$user_pos = $image_data->designation_name .' (' .$image_data->department_name . ')' ;
			}else{
				$user_pos = '';
			}
			
			if ($emp_image != '') {
				$profile_image = $emp_image;
			} else {
				$profile_image = 'dummy.png';
			}
			$array = array(
				'profile_img' => $profile_image,
				'user_position' => $user_pos,
				'user_company' => $res_data->org_cname
			);
			echo json_encode($array);
		} else {
			$this->db->select("company_name");
			$this->db->where("customer_id", $user_id);
			$res_data = $this->db->get("tbl_customer")->row();
			$profile_image = 'dummy.png';
			$array = array(
				'profile_img' => $profile_image,
				'user_position' => "Customer",
				'user_company' => $res_data->company_name
			);
			echo json_encode($array);
		}
	}
	//-----------------------------Validate Mobileno------------------------------ 
	public function validate_mobileno($mobileno, $email)
	{
		$org_id = $_REQUEST['org_id'];

		$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' AND `email`='$email' and  org_id='$org_id'  ")->row();
		if ($query) {

			$response["error"] = TRUE;
			$response["error_msg"] = "User is already registerd.";
			echo json_encode($response);
		} else {
			$query1 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno'")->row();
			if ($query1) {

				$response["error"] = TRUE;
				$response["error_msg"] = "Mobile number is already registerd.";
				echo json_encode($response);
			} else {
				$query2 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `email`='$email'")->row();
				if ($query2) {

					$response["error"] = TRUE;
					$response["error_msg"] = "Email is already registerd.";
					echo json_encode($response);
				} else {
					$response["error"] = FALSE;
					$response["error_msg"] = "New User.";
					echo json_encode($response);
				}
			}
		}
	}


	public function lead_validation($mobileno, $email, $customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' AND `email`='$email' and  customer_id NOT IN('$customer_id') ")->row();
		if ($query) {

			$response["error"] = TRUE;
			$response["error_msg"] = "User is already registerd.";
			echo json_encode($response);
		} else {
			$query1 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' and  customer_id NOT IN('$customer_id') ")->row();
			if ($query1) {

				$response["error"] = TRUE;
				$response["error_msg"] = "Mobile number is already registerd.";
				echo json_encode($response);
			} else {
				$query2 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `email`='$email' and  customer_id NOT IN('$customer_id')  ")->row();
				if ($query2) {

					$response["error"] = TRUE;
					$response["error_msg"] = "Email is already registerd.";
					echo json_encode($response);
				} else {
					$response["error"] = FALSE;
					$response["error_msg"] = "New User.";
					echo json_encode($response);
				}
			}
		}
	}



	// ---------------------------------------------------------------------------------

	public function register_new_customer($customer_type, $parent_id, $company_name, $email, $phone_no, $contact_person_name1, $alternate_email, $city, $address, $password, $country_id, $dob, $cad, $mad, $alternate_phone_no, $state_id, $type_id, $business_segment_id, $group_id, $location_id, $created_by, $landline)
	{
		$org_id = $_REQUEST['org_id'];

		$date = date("Y-m-d H:i:s");

		$dob1 = date("Y-m-d", strtotime($dob));
		// $cad1 = date("Y-m-d", strtotime($cad));
		if ($mad == '' && $cad == '') {
			$mad1 = "";
			$cad1 = "";
		} else if ($mad != '' && $cad != '') {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = date("Y-m-d", strtotime($cad));
		} else if ($mad != '' && $cad == '') {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = "";
		} else if ($mad == '' && $cad != '') {
			$mad1 = "";
			$cad1 = date("Y-m-d", strtotime($cad));
		}

		$business_segment_id12 = rtrim($business_segment_id, ',');
		if ($business_segment_id12 != '') {
			$business_segment_id1 = $business_segment_id12;
		} else {
			$business_segment_id1 = '0';
		}


		// -------------------------------- Primary / Secondary Account --------------------------------

		if ($customer_type == 'primary') {
			$company_name1 = TRIM($company_name);
			$parentid = '0';
		} else {
			$parentid = $parent_id;
			$parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
			$company_name1 = $parent_res->company_name;
		}

		// -----------------------------------------------------------		 

		$data = $this->db->query("INSERT INTO `tbl_customer`(`org_id`,`created_by`, `parent_id`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `cust_type`,`created_date`) VALUES ('$org_id','$created_by','$parentid','$type_id','$business_segment_id1','$location_id','$group_id','$company_name1','$contact_person_name1','$alternate_email','$phone_no','$alternate_phone_no','$landline','$email','$address','$city','$state_id','$country_id','buro@123','$dob1','$cad1','$mad1','$customer_type','$date')");

		$insert_id = $this->db->insert_id();
		if ($data) {
			$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `customer_id`='$insert_id'")->row();

			$user_email = $query->email;
			$profile_image = 'dummy.png';

			$response_array["error"] = FALSE;
			$response_array["error_msg"] = "Registration successfully.";
			$response_array['customer_id'] = $query->customer_id;
			$response_array['company_name'] = $query->company_name;
			$response_array['phone_no'] = $query->phone_no;
			$response_array['contact_person_name1'] = $query->contact_person_name1;
			$response_array['profile_img'] = $profile_image;
			$response_array['alternate_email'] = $query->alternate_email;
			// $response_array['authorized_person'] = $query->authorized_person;
			$response_array['email'] = $query->email;
			$response_array['city'] = $query->city;
			$response_array['country'] = $query->country;
			$response_array['address'] = $query->address;
			$response_array['password'] = $query->password;
			$response_array['org_id'] = $query->org_id;

			$response_array['dob'] = $query->dob;
			$response_array['cad'] = $query->company_anniversary;
			$response_array['mad'] = $query->marriage_anniversary;
			echo json_encode($response_array);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Registration failed.";
			echo json_encode($response_array);
		}
	}



	//==================================== Product List =================================================
	public function product_list()
	{
		$org_id = $_REQUEST['org_id'];
		$data = $this->db->query("SELECT prdsrv_name as product_name, prd_srv_id as product_id FROM `tbl_product_service_list` WHERE status='1' and org_id='$org_id' and delete_status=0   ")->result();
		
		echo json_encode($data);
	}
	//==================================== Raise Issue =================================================
	public function submit_query($query, $product_id, $product_name, $customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$max = strlen($string) - 1;
		$token = '';
		for ($i = 0; $i < 6; $i++) {
			$token .= $string[mt_rand(0, $max)];
		}
		$salt = $token;
		$result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
		if ($result) {
			$result1 = $result->ticket_no;
			$pre_date = explode('-', $result1);

			$previous_date = $pre_date[0]; // from table last date
			$ticket_no = $pre_date[1]; // from table last ticket no

			$cur_date = date("Ymd"); // current date
			if ($previous_date == $cur_date) {
				$ticket_no++;
				$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
				$final_ticket_num = $cur_date . '-' . $ticket_no1;
			} else {
				$final_ticket_num = $cur_date . '-' . '001';
			}
		} else {
			$cur_date = date("Ymd"); // current date
			$final_ticket_num = $cur_date . '-' . '001';
		}

		// echo $cur_date=date("Ymd");


		$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query')");
		if ($data) {
			$response["error"] = FALSE;
			$response["error_msg"] = "Query/Issue submitted successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to submit";
			echo json_encode($response);
		}
	}

	//==================================== Custer Query =================================================
	public function query_list($customer_id)
	{
		$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$customer_id' ORDER BY created_date DESC")->result();
		// $created_date = $value->created_date;
		// $dayname = date();
		$query_list = array();
		foreach ($data as $value) {
			$created_date = date("D, d M Y", strtotime($value->created_date));

			$arr = array(
				'customer_id' => $value->customer_id,
				'product_id' => $value->product_id,
				'ticket_no' => $value->ticket_no,
				'product_name' => $value->product_name,
				'issue' => $value->issue,
				'status' => $value->status,
				'feedback' => $value->feedback,
				'rating' => $value->rating,
				'query_id' => $value->query_id,
				'created_date' => $created_date
			);
			array_push($query_list, $arr);
		}
		echo json_encode($query_list);
	}

	//==================================== tag query for status =================================================
	public function tag_query($query_id)
	{
		$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->result();

		echo json_encode($data);
	}

	//==================================== Add feedback =================================================

	public function submit_feedback($feedback, $ticket_no, $customer_id, $rating)
	{
		$org_id = $_REQUEST['org_id'];
		$result = array('customer_id' => $customer_id, 'ticket_no' => $ticket_no);
		$this->db->where($result);
		$this->db->set('feedback', $feedback);
		$this->db->set('rating', $rating);
		$data = $this->db->update('tbl_user_query');
		$data1 = $this->db->affected_rows($data);
		if ($data1) {
			$response["error"] = FALSE;
			$response["error_msg"] = "Feedback submitted successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to submit";
			echo json_encode($response);
		}
	}

	//==================================== Add feedback =================================================

	public function is_feedback_submitted($ticket_no)
	{
		$data = $this->db->query("SELECT feedback FROM tbl_user_query WHERE `ticket_no`='$ticket_no'")->row();
		$feedback = $data->feedback;
		if ($feedback == '') {
			$response["error"] = FALSE;
			$response["error_msg"] = "Feedback empty";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Feedback not empty";
			echo json_encode($response);
		}
	}

	//==================================== Get status count of issue using date range =================================================
	public function report($employee_id, $start_date, $end_date)
	{
		$org_id = $_REQUEST['org_id'];
		$start_date1 = date("Y-m-d H:i:s", strtotime($start_date));
		$end_date1 = date("Y-m-d H:i:s", strtotime($end_date));
		$data = $this->db->query("select count(query_id) total_queries, 
						sum(case when status = 'pending' then 1 else 0 end) pending,
						sum(case when status = 'inprogress' then 1 else 0 end) in_progress,
						sum(case when status = 'completed' then 1 else 0 end) completed
						from tbl_user_query WHERE DATE(created_date) >='$start_date1' AND DATE(created_date) <='$end_date1' AND `assign_to`='1' group by Status ")->row();

		$data1 = $this->db->query("select AVG(rating) as rating from tbl_user_query WHERE DATE(created_date) >='$start_date1' AND DATE(created_date) <='$end_date1' AND `assign_to`='$employee_id' AND status='completed' ")->row();
		// $rating = $data1->rating;
		$rating = number_format((float)$data1->rating, 1, '.', '');

		if ($data->total_queries != '') {
			$total_queries = $data->total_queries;
		} else {
			$total_queries = 0;
		}
		if ($data->pending != '') {
			$pending = $data->pending;
		} else {
			$pending = 0;
		}
		if ($data->in_progress != '') {
			$in_progress = $data->in_progress;
		} else {
			$in_progress = 0;
		}
		if ($data->completed != '') {
			$completed = $data->completed;
		} else {
			$completed = 0;
		}
		$arr = array(
			'total_queries' => $total_queries,
			'pending' => $pending,
			'in_progress' => $in_progress,
			'completed' => $completed,
			'rating' => $rating,
		);
		echo json_encode($arr);
	}

	//============= Get particular customer notification =============================
	public function notification_list($user_id, $user_type)
	{
		if ($user_type == 'Customer') {
			$data = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`=$user_id ORDER BY notification_date DESC")->result();
			// echo json_encode($data->result());

			$notofication_list = array();
			foreach ($data as $value) {
				$notification_date = date("d M Y", strtotime($value->notification_date));

				$arr = array(
					'notification_id' => $value->notification_id,
					'notification_title' => $value->notification_title,
					'notification_msg' => $value->notification_msg,
					'notification_to' => $value->notification_to,
					'query_id' => $value->query_id,
					'status' => $value->status,

					'ticket_no' => $value->status,
					'company_name' => $value->status,
					'product' => $value->status,
					'assigned_by' => $value->status,
					'priority' => $value->status,
					'details' => $value->status,

					'notification_date' => $notification_date
				);
				array_push($notofication_list, $arr);
			}
			echo json_encode($notofication_list);
		} else {
			$data1 = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`='$user_id' ORDER BY notification_date DESC");
			// echo json_encode($data->result());
			// echo $count = count($data1);
			if ($data1) {
				$notofication_list = array();
				foreach ($data1->result() as $value) {
					$this->db->where("query_id", $value->query_id);
					$ScheduleData = $this->db->get("tbl_user_query")->row();

					$this->db->where("issue_id", $value->query_id);
					$QueryData = $this->db->get("tbl_schedule")->row();

					$this->db->select("name");
					$this->db->where("id", $QueryData->created_by);
					$EmpData = $this->db->get("tbl_admin_login")->row();

					$this->db->select("company_name");
					$this->db->where("customer_id", $ScheduleData->customer_id);
					$CustData = $this->db->get("tbl_customer")->row();


					$notification_date = date("d M Y", strtotime($value->notification_date));
					$arr = array(
						'notification_id' => $value->notification_id,
						'notification_title' => $value->notification_title,
						'notification_msg' => $value->notification_msg,
						'notification_to' => $value->notification_to,
						'query_id' => $value->query_id,
						'status' => $value->status,

						'ticket_no' => $ScheduleData->ticket_no,
						'company_name' => $CustData->company_name,
						'product' => $ScheduleData->product_name,
						'assigned_by' => $EmpData->name,
						'priority' => $ScheduleData->priority,
						'details' => $ScheduleData->issue,

						'notification_date' => $notification_date
					);
					array_push($notofication_list, $arr);
				}
				echo json_encode($notofication_list);
			}
			// $data
		}
	}

	//================== Get dashboard count ==============================================

	public function dashboard_count($user_id, $user_type, $imei)
	{
		$org_id = $_REQUEST['org_id'];

		if ($user_type == 'Customer') {
			$this->db->set('imei', $imei);
			$this->db->where('customer_id', $user_id);
			$this->db->update('tbl_customer');
			$data = $this->db->query("SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='pending'")->row();
			$pending_count = $data->pending_count;
			$data1 = $this->db->query("SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='in_progress'")->row();
			$inprogress_count = $data1->inprogress_count;
			$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='completed'")->row();
			$completed = $data2->completed;
			$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `customer_id`=$user_id")->row();
			$all = $data3->all_data;
			$arr = array(
				'pending_count' => $pending_count,
				'in_progress' => $inprogress_count,
				'completed' => $completed,
				'all' => $all
			);
			echo json_encode($arr);
		} else {
			$this->db->set('imei', $imei);
			$this->db->where('customer_id', $user_id);
			$this->db->update('tbl_customer');

			$res = $this->db->query(" SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($user_id)  ")->row();
			$result = $res->assign_to;

			if (strpos($result, ',') !== false) {
				$data = $this->db->query(" SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='pending'  ")->row();
				$pending_count = $data->pending_count;
				$data1 = $this->db->query(" SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='in_progress' ")->row();
				$inprogress_count = $data1->inprogress_count;
				$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='completed' ")->row();
				$completed = $data2->completed;

				$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to)  and status NOT IN('in_complete') ")->row();
				$all = $data3->all_data;
			} else {

				$data = $this->db->query("  SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='pending'  ")->row();
				$pending_count = $data->pending_count;
				$data1 = $this->db->query(" SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='in_progress'  ")->row();
				$inprogress_count = $data1->inprogress_count;
				$data2 = $this->db->query(" SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='completed' ")->row();
				$completed = $data2->completed;

				$data3 = $this->db->query(" SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `assign_to` IN($user_id) and status NOT IN('in_complete')  ")->row();
				$all = $data3->all_data;
			}

			$arr = array(
				'pending_count' => $pending_count,
				'in_progress' => $inprogress_count,
				'completed' => $completed,
				'all' => $all
			);
			echo json_encode($arr);
		}
	}

	//==================================== Get allocated task list =================================================
	public function allocated_task($user_id)
	{
		$data = $this->db->query("SELECT query_id,customer_id,product_id,ticket_no,product_name,issue,status,feedback,rating,assign_to,created_date FROM `tbl_user_query` WHERE `assign_to`='$user_id' ORDER BY created_date DESC ")->result();

		$task_list = array();
		foreach ($data as $value) {
			$customer_id = $value->customer_id;
			$data1 = $this->db->query("SELECT company_name,contact_person_name1,alternate_email,phone_no,email,address,city,country FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			$created_date = date("d M Y", strtotime($value->created_date));
			$arr = array(
				'query_id' => $value->query_id,
				'customer_id' => $value->customer_id,
				'product_id' => $value->product_id,
				'ticket_no' => $value->ticket_no,
				'product_name' => $value->product_name,
				'issue' => $value->issue,
				'status' => $value->status,
				'feedback' => $value->feedback,
				'rating' => $value->rating,
				'assign_to' => $value->assign_to,
				'created_date' => $created_date,

				'company_name' => $data1->company_name,
				'contact_person_name1' => $data1->contact_person_name1,
				'alternate_email' => $data1->alternate_email,
				'phone_no' => $data1->phone_no,
				'email' => $data1->email,
				'address' => $data1->address,
				'city' => $data1->city,
				'country' => $data1->country,
			);
			array_push($task_list, $arr);
		}
		echo json_encode($task_list);
	}


	//============= Status update from employee side ================================

	public function update_task_status($employee_id, $customer_id, $product_id, $ticket_no, $remark, $status, $schedule_id, $query_id)
	{
		$org_id = $_REQUEST['org_id'];
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

			if ($status == 'in_progress') {
				$change_status = "In Progress";
				$title = "Query in_progress";
			} else if ($status == 'pending') {
				$change_status = "Pending";
				// $title = "Query in_progress";
			} else if ($status == 'completed') {
				$change_status = "Completed";
				$title = "Query resolved";
			} else if ($status == 'in_complete') {
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
			$this->db->update('tbl_user_query');
			$response["error"] = FALSE;
			$response["error_msg"] = "Status updated successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to update status";
			echo json_encode($response);
		}
	}



	//==================================== track task list =================================================
	public function track_task($customer_id)
	{
		$data = $this->db->query("SELECT query_id,customer_id,product_id,ticket_no,product_name,issue,status,feedback,rating,assign_to,created_date FROM `tbl_user_query` WHERE `customer_id`='$customer_id'")->result();

		$task_list = array();
		foreach ($data as $value) {
			$assign_to = $value->assign_to;

			$data1 = $this->db->query("SELECT name,email,mobile_no FROM `tbl_admin_login` WHERE `id`='$assign_to'")->row();
			$created_date = date("d M Y", strtotime($value->created_date));
			$arr = array(
				'query_id' => $value->query_id,
				'customer_id' => $value->customer_id,
				'product_id' => $value->product_id,
				'ticket_no' => $value->ticket_no,
				'product_name' => $value->product_name,
				'issue' => $value->issue,
				'status' => $value->status,
				'feedback' => $value->feedback,
				'rating' => $value->rating,
				'assign_to' => $value->assign_to,
				'created_date' => $created_date,

				'name' => $data1->name,
				'email' => $data1->email,
				'mobile_no' => $data1->mobile_no,
				'city' => ""
			);
			array_push($task_list, $arr);
		}
		echo json_encode($task_list);
	}

	//=================== Status update from employee side ===================
	public function save_token_id($user_id, $user_type, $token_id)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Customer') {
			$this->db->set('android_id', $token_id);
			$this->db->where('customer_id', $user_id);
			$this->db->update('tbl_customer');
		} else {
			$this->db->set('android_id', $token_id);
			$this->db->where('id', $user_id);
			$this->db->update('tbl_admin_login');
		}
	}

	//======= Get Task list according to status ===============================================
	public function get_task($user_id, $user_type, $task_type)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Customer') {
			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `customer_id`='$user_id' AND `status`='$task_type' ORDER BY created_date DESC ")->result();

			$task_list = array();
			foreach ($data as $value) {
				$employee_id = $value->assign_to;
				if ($employee_id == '') {
					$query_id = $value->query_id;
					$data1 = $this->db->query("SELECT assign_date,assign_starttime,assign_endtime,schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

					$created_date = date("d M Y", strtotime($value->created_date));

					$assign_date = date("d M Y", strtotime($data1->assign_date));
					$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
					$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

					$arr = array(
						'query_id' => $value->query_id,
						'customer_id' => $value->customer_id,
						'schedule_id' => $data1->schedule_id,
						'product_id' => $value->product_id,
						'ticket_no' => $value->ticket_no,
						'product_name' => $value->product_name,
						'issue' => $value->issue,
						'status' => $value->status,
						'assign_to' => $value->assign_to,
						'created_date' => $created_date,
						'assign_date' => $assign_date,
						'assign_starttime' => $assign_starttime1,
						'assign_endtime' => $assign_endtime1,
						'name' => 'NA',
						'company_name' => 'NA',
						'email' => 'NA',
						'phone_no' => 'NA',
						'city' => "NA"
					);
					array_push($task_list, $arr);
				} else {
					$employee_id1 = $employee_id;
					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
					// $employee_name = $data2->name;
					$area2 = "";
					$area3 = "";
					$area4 = "";
					foreach ($data2->result() as $multiple_employee) {
						$area2 = $area2 . $multiple_employee->name . " ,";
						$area3 = $area3 . $multiple_employee->email . " ,";
						$area4 = $area4 . $multiple_employee->mobile_no . " ,";
					}
					$employee_name = trim($area2, ',');
					$employee_email = trim($area3, ',');
					$employee_contact_no = trim($area4, ',');
					$created_date = date("d M Y", strtotime($value->created_date));

					$query_id = $value->query_id;
					$data1 = $this->db->query("SELECT assign_date,assign_starttime,assign_endtime,schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

					$assign_date = date("d M Y", strtotime($data1->assign_date));
					$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
					$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

					$arr = array(
						'query_id' => $value->query_id,
						'customer_id' => $value->customer_id,
						'schedule_id' => $data1->schedule_id,
						'product_id' => $value->product_id,
						'ticket_no' => $value->ticket_no,
						'product_name' => $value->product_name,
						'issue' => $value->issue,
						'status' => $value->status,
						'assign_to' => $value->assign_to,
						'created_date' => $created_date,
						'assign_date' => $assign_date,
						'assign_starttime' => $assign_starttime1,
						'assign_endtime' => $assign_endtime1,
						'name' => $employee_name,
						'company_name' => 'NA',
						'email' => $employee_email,
						'phone_no' => $employee_contact_no,
						'city' => "NA"
					);
					array_push($task_list, $arr);
				}
			}

			echo json_encode($task_list);
		} else {
			$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND `status`='$task_type' and  org_id='$org_id' ORDER BY created_date DESC   ")->result();

			$task_list = array();
			foreach ($data as $value) {
				$employee_id = $value->assign_to;
				$customer_id = $value->customer_id;
				$data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();

				$company_name = $data1->company_name;
				$contact_person_name1 = $data1->contact_person_name1;
				$phone_no = $data1->phone_no;
				$email = $data1->email;
				$address = $data1->address;
				$city = $data1->city;


				if ($employee_id == '') {

					$created_date = date("d M Y", strtotime($value->created_date));

					$query_id = $value->query_id;
					$data1 = $this->db->query("SELECT assign_date,assign_starttime,assign_endtime,schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

					$assign_date = date("d M Y", strtotime($data1->assign_date));
					$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
					$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

					$arr = array(
						'query_id' => $value->query_id,
						'schedule_id' => $data1->schedule_id,
						'customer_id' => $value->customer_id,
						'product_id' => $value->product_id,
						'ticket_no' => $value->ticket_no,
						'product_name' => $value->product_name,
						'issue' => $value->issue,
						'status' => $value->status,
						'assign_to' => $value->assign_to,
						'created_date' => $created_date,
						'assign_date' => $assign_date,
						'assign_starttime' => $assign_starttime1,
						'assign_endtime' => $assign_endtime1,
						'company_name' => $company_name,
						'contact_person_name1' => $contact_person_name1,
						'phone_no' => $phone_no,
						'email' => $email,
						'address' => $address,
						'city' => $city
					);
					array_push($task_list, $arr);
				} else {
					$employee_id1 = $employee_id;
					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
					// $employee_name = $data2->name;
					$area2 = "";
					$area3 = "";
					$area4 = "";
					foreach ($data2->result() as $multiple_employee) {
						$area2 = $area2 . $multiple_employee->name . " ,";
						$area3 = $area3 . $multiple_employee->email . " ,";
						$area4 = $area4 . $multiple_employee->mobile_no . " ,";
					}
					$employee_name = trim($area2, ',');
					$employee_email = trim($area3, ',');
					$employee_contact_no = trim($area4, ',');
					$created_date = date("d M Y", strtotime($value->created_date));

					$query_id = $value->query_id;
					$data1 = $this->db->query("SELECT assign_date,assign_starttime,assign_endtime,schedule_id FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();

					$assign_date = date("d M Y", strtotime($data1->assign_date));
					$assign_starttime1 = date("h:i A", strtotime($data1->assign_starttime));
					$assign_endtime1 = date("h:i A", strtotime($data1->assign_endtime));

					$arr = array(
						'query_id' => $value->query_id,
						'schedule_id' => $data1->schedule_id,
						'customer_id' => $value->customer_id,
						'product_id' => $value->product_id,
						'ticket_no' => $value->ticket_no,
						'product_name' => $value->product_name,
						'issue' => $value->issue,
						'status' => $value->status,
						'assign_to' => $value->assign_to,
						'created_date' => $created_date,
						'assign_date' => $assign_date,
						'assign_starttime' => $assign_starttime1,
						'assign_endtime' => $assign_endtime1,
						'company_name' => $company_name,
						'contact_person_name1' => $contact_person_name1,
						'phone_no' => $phone_no,
						'email' => $email,
						'address' => $address,
						'city' => $city
					);
					array_push($task_list, $arr);
				}
			}

			echo json_encode($task_list);
		}
	}

	//==================================== Add discussion to databse ==================================
	public function send_message($employee_id, $customer_id, $product_id, $query_id, $ticket_no, $message, $user_type)
	{
		$date = date("Y-m-d H:i:s");
		$data = $this->db->query("INSERT INTO `tbl_discussion`(`org_id`,`ticket_no`, `query_id`, `product_id`, `employee_id`, `customer_id`, `user_type`, `message`, `created_date`) VALUES ('$org_id','$ticket_no','$query_id','$product_id','$employee_id','$customer_id','$user_type','$message','$date')");
		if ($data) {
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
		} else {
			$response["error"] = FALSE;
			$response["error_msg"] = "Failed to send message";
			echo json_encode($response);
		}
	}
	//==================================== / StAdd discussion to databse ==============================

	//==================================== Get discussion from databse ==================================
	public function get_message($user_id, $query_id, $ticket_no, $user_type)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Customer') {
			$data = $this->db->query("SELECT customer_id,user_type,employee_id,created_date,message,ticket_no,query_id FROM `tbl_discussion` WHERE `query_id`='$query_id' AND `ticket_no`='$ticket_no'");

			$discussion_array = array();
			foreach ($data->result() as $value) {
				$user_type1 = $value->user_type;

				if ($user_type1 == 'Customer') {
					$customer_id = $value->employee_id;
					$data2 = $this->db->query("SELECT contact_person_name1, phone_no, email FROM `tbl_customer` WHERE `customer_id` = '$customer_id'")->row();
					$name = $data2->contact_person_name1;
					$mobile_no = $data2->phone_no;
					$email = $data2->email;
				} else {
					$employee_id = $value->employee_id;
					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` = '$employee_id'")->row();
					$name = $data2->name;
					$email = $data2->email;
					$mobile_no = $data2->mobile_no;
				}
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
		} else {
			$data = $this->db->query("SELECT customer_id,user_type,employee_id,created_date,message,ticket_no,query_id FROM `tbl_discussion` WHERE `query_id`='$query_id' AND `ticket_no`='$ticket_no'");

			$discussion_array = array();
			foreach ($data->result() as $value) {
				$customer_id = $value->customer_id;
				$user_type1 = $value->user_type;
				if ($user_type1 == 'Customer') {
					$employee_id = $value->employee_id;
					$data2 = $this->db->query("SELECT contact_person_name1, phone_no, email FROM `tbl_customer` WHERE `customer_id` = '$employee_id'")->row();
					$name = $data2->contact_person_name1;
					$mobile_no = $data2->phone_no;
					$email = $data2->email;
				} else {
					$employee_id = $value->employee_id;
					$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` = '$employee_id'")->row();
					$name = $data2->name;
					$email = $data2->email;
					$mobile_no = $data2->mobile_no;
				}
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
	}

	//==================================== Get sigle Task ===============================================
	public function get_query($query_id)
	{
		$org_id = $_REQUEST['org_id'];
		$data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->result();
		$single_task_list = array();
		foreach ($data as $value) {

			$employee_id1 = $value->assign_to;
			$data2 = $this->db->query("SELECT name, email, mobile_no FROM `tbl_admin_login` WHERE `id` IN($employee_id1)");
			// $employee_name = $data2->name;
			$area2 = "";
			$area3 = "";
			$area4 = "";
			foreach ($data2->result() as $multiple_employee) {
				$area2 = $area2 . $multiple_employee->name . " ,";
				$area4 = $area4 . $multiple_employee->mobile_no . " ,";
			}
			$employee_name = trim($area2, ',');
			$employee_email = trim($area3, ',');
			$employee_contact_no = trim($area4, ',');
			$array = explode(',', $employee_contact_no);
			$emp_number = $array[0];
			$created_datetime = date("d M Y, h:i A", strtotime($value->created_date));
			// $created_time = date("h:i A", strtotime($value->created_date));

			$arr = array(
				'query_id' => $value->query_id,
				'customer_id' => $value->customer_id,
				'product_id' => $value->product_id,
				'ticket_no' => $value->ticket_no,
				'product_name' => $value->product_name,
				'issue' => $value->issue,
				'status' => $value->status,
				'created_date' => $created_datetime,
				// 'created_time'=>$created_time,

				'name' => $employee_name,
				'email' => $employee_email,
				'phone_no' => $emp_number
			);
			array_push($single_task_list, $arr);
		}

		echo json_encode($single_task_list);
	}


	//==================================== Close Issue ===============================================
	public function close_issue($customer_id, $query_id, $remark, $status)
	{
		$org_id = $_REQUEST['org_id'];
		$date = date("Y-m-d H:i:s");
		$schedule_date = date("Y-m-d");
		$schedule_starttime = date("H:i");
		$schedule_endtime = date("H:i");
		// $this->db->set('user_remark',$remark);
		$this->db->set('status', $status);
		$this->db->where('query_id', $query_id);
		$this->db->update('tbl_user_query');

		$data1 = $this->db->query("SELECT assign_to,ticket_no,product_id,query_id FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
		$assign_to = $data1->assign_to;
		$ticket_no = $data1->ticket_no;
		$product_id = $data1->product_id;
		$query_id = $data1->query_id;


		$commaList = explode(',', $assign_to);

		for ($j = 0; $j < count($commaList); $j++) {
			$employee_id = $commaList[$j];
			// echo "<br>";
			//======================= sending notification to employee regarding assign issue ===============

			$data3 = $this->db->query("SELECT android_id FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
			$android_id = $data3->android_id;

			$data33 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `schedule_assign_to`='$employee_id' AND issue_id='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
			$schedule_id = $data33->schedule_id;
			$schedule_assign_to = $data33->schedule_assign_to;
			$schedule_ticket_num = $data33->ticket_no;
			$schedule_type = $data33->schedule_type;

			if ($status == 'in_progress') {
				$change_status = "In Progress";
				$title = "Previous task updated";
				$notification_msg = "Customer is not satisfied for " . $ticket_no . ". Customer want to keep this task " . $change_status;

				$this->db->query("INSERT INTO `tbl_schedule`(`created_by` , `issue_id`, `schedule_assign_to`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$employee_id','$query_id','$schedule_assign_to','$schedule_ticket_num','$schedule_date','$schedule_starttime','$schedule_endtime','$schedule_type','$date')");

				$reschedule = 'reschedule';
				$this->db->set('reschedule', $reschedule);
				$this->db->where('schedule_id', $schedule_id);
				$this->db->update('tbl_schedule');
			} else if ($status == 'completed') {
				$change_status = "Completed";
				$title = "Issue closed";
				$notification_msg = "Ticket " . $ticket_no . " is closed from customer side";
			}

			//=============  inserting notification to table and getting last inserted id
			$this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `schedule_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','$schedule_id','$ticket_no','$remark','$status','$date')");
			$date = date("Y-m-d H:i:s");
			$res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$employee_id','$employee_id','$title','$notification_msg','$status','$date')");
			$notification_id = $this->db->insert_id($res);
			//===============  inserting notification to table and getting last inserted id

			$reg_token = $android_id;
			$data = array('server_notification' => "employee_task_updated", 'message' => $notification_msg, 'query_id' => $query_id, 'notification_id' => $notification_id);
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
		$org_id = $_REQUEST['org_id'];
		$type_list = $this->db->query("SELECT type_id,title FROM `tbl_type` WHERE status='1'   and org_id='$org_id' and delete_status=0 ")->result();
		echo json_encode($type_list);
	}
	public function schedule_list()
	{
		$org_id = $_REQUEST['org_id'];
		$schedule_list = $this->db->query("SELECT schedule_id,title FROM `tbl_schedule_type` WHERE status='1' and org_id='$org_id' and delete_status=0   ")->result();
		echo json_encode($schedule_list);
	}

	public function location_list()
	{
		$org_id = $_REQUEST['org_id'];
		$location_list = $this->db->query("SELECT location_id,location FROM `tbl_location` WHERE status='1' and org_id='$org_id' and delete_status=0    ")->result();
		echo json_encode($location_list);
	}

	public function business_segment_list()
	{

		$org_id = $_REQUEST['org_id'];
		$this->db->select('business_id,business_name');
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);
		$this->db->where('status', 1);
		$data = $this->db->get('tbl_business')->result();
		if ($data) {
			echo json_encode($data);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}
	public function group_list()
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('group_id,group_name');
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);
		$this->db->where('status', 1);
		$data = $this->db->get('tbl_group')->result();
		if ($data) {
			echo json_encode($data);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}

	public function state_list($country_id)
	{
		$org_id = $_REQUEST['org_id'];
		$state_list = $this->db->query("SELECT id,name,country_id FROM `states` WHERE country_id='$country_id' ORDER BY name asc")->result();
		echo json_encode($state_list);
	}

	public function country_list()
	{
		$org_id = $_REQUEST['org_id'];
		$country_list = $this->db->query("SELECT id,sortname,name,phonecode FROM `countries` ORDER BY name asc ")->result();
		echo json_encode($country_list);
	}

	//=============== Schedule / assign query =================================================

	public function assign_query($query, $product_id, $product_name, $customer_id, $employee_id, $schedule_date, $start_time, $end_time, $schedule_type, $overlapping, $schedule_type_id, $type, $leadopp_id)
	{
		$org_id = $_REQUEST['org_id'];
		$priority_name = $_REQUEST['priority_name'];
		
		if ($overlapping == 'YES') {
			$date = date("Y-m-d H:i:s");
			$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			$max = strlen($string) - 1;
			$token = '';
			for ($i = 0; $i < 6; $i++) {
				$token .= $string[mt_rand(0, $max)];
			}
			$salt = $token;
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
			$result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
			if ($result) {
				$result1 = $result->ticket_no;
				$pre_date = explode('-', $result1);
				$previous_date = $pre_date[0];
				$ticket_no = $pre_date[1];
				$cur_date = date("Ymd");
				if ($previous_date == $cur_date) {
					$ticket_no++;
					$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
					$final_ticket_num = $cur_date . '-' . $ticket_no1;
					$schedule_ticket_num = 'S_' . $cur_date . '-' . $ticket_no1;
				} else {
					$final_ticket_num = $cur_date . '-' . '001';
					$schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
				}
			} else {
				$cur_date = date("Ymd");
				$final_ticket_num = $cur_date . '-' . '001';
				$schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
			}


			$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$priority_name','$schedule_date1')");
			$insert_id = $this->db->insert_id();

			if ($data) {
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
					$this->db->set('assign_to', $employee_id);
					$this->db->where('query_id', $insert_id);
					$this->db->update('tbl_user_query');
					// echo 1;
				}
				curl_close($ch);
				$response["error"] = FALSE;
				$response["error_msg"] = "Query/Issue submitted successfully";
				echo json_encode($response);
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Failed to submit";
				echo json_encode($response);
			}
		} else {
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
			// $schedule_date1 = date("Y-m-d", strtotime($schedule_date));
			$s_time = $start_time;
			$e_time = $end_time;
			$emp_id = $employee_id;

			$available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
			$available_count = $available->num_rows();

			if ($available_count == 0) {
				$date = date("Y-m-d H:i:s");
				$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				$max = strlen($string) - 1;
				$token = '';
				for ($i = 0; $i < 6; $i++) {
					$token .= $string[mt_rand(0, $max)];
				}
				$salt = $token;
				$schedule_date1 = date("Y-m-d", strtotime($schedule_date));
				$result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
				if ($result) {
					$result1 = $result->ticket_no;
					$pre_date = explode('-', $result1);

					$previous_date = $pre_date[0]; // from table last date
					$ticket_no = $pre_date[1]; // from table last ticket no
					$cur_date = date("Ymd"); // current date
					if ($previous_date == $cur_date) {
						$ticket_no++;
						$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
						$final_ticket_num = $cur_date . '-' . $ticket_no1;
						$schedule_ticket_num = 'S_' . $cur_date . '-' . $ticket_no1;
					} else {
						$final_ticket_num = $cur_date . '-' . '001';
						$schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
					}
				} else {
					$cur_date = date("Ymd"); // current date
					$final_ticket_num = $cur_date . '-' . '001';
					$schedule_ticket_num = 'S_' . $cur_date . '-' . '001';
				}
				// echo $cur_date=date("Ymd");
				$data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$priority_name','$schedule_date1')");
				$insert_id = $this->db->insert_id();
				if ($data) {
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
						$this->db->set('assign_to', $employee_id);
						$this->db->where('query_id', $insert_id);
						$this->db->update('tbl_user_query');
						// echo 1;
					}
					curl_close($ch);

					//=============== Sending notification to customer regarding assign issue ===============

					$response["error"] = FALSE;
					$response["error_msg"] = "Query/Issue submitted successfully";
					echo json_encode($response);
				} else {
					$response["error"] = TRUE;
					$response["error_msg"] = "Failed to submit";
					echo json_encode($response);
				}
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "overlapping";
				echo json_encode($response);
			}
		}
	}
	//================= Schedule / assign query  =================================================
	public function schedule_list1($employee_id, $date)
	{
		$org_id = $_REQUEST['org_id'];
		$schedule_date_1 = str_replace(',', ' ', $date);
		$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));

		$data = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND reschedule!='reschedule'");

		$assign_issue_list = array();
		foreach ($data->result() as $value) {
			$issue_id = $value->issue_id;
			$schedule_type_id = $value->schedule_type_id;
			$data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$issue_id' AND `status`!='in_complete'")->row();
			$customer_id = $data1->customer_id;
			if ($customer_id != '') {
				$created_date = date("d M y", strtotime($data1->created_date));
				$assign_date = date("d M y", strtotime($value->assign_date));

				$customer_id = $data1->customer_id;
				$data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
				$visit_type = $this->db->query("SELECT type_name FROM `tbl_schedule_type_name` WHERE `id`='$schedule_type_id'")->row();
				$customer_id = $data2->customer_id;
				$company_name = $data2->company_name;

				$contact_person_name1 = $data2->contact_person_name1;
				$email = $data2->email;
				$phone_no = $data2->phone_no;
				$city = $data2->city;

				$imei = $data2->imei; // customer IMEI to check customer app is installed or not
				if ($imei != '') {
					$chatstatus = "YES";
				} else {
					$chatstatus = "NO";
				}

				$assign_starttime1 = date("h:i A", strtotime($value->assign_starttime));
				$assign_endtime1 = date("h:i A", strtotime($value->assign_endtime));


				$arr = array(
					'ticket_no' => $data1->ticket_no,
					'product_name' => $data1->product_name,
					'product_id' => $data1->product_id,
					'status' => $data1->status,
					'query_id' => $data1->query_id,
					'org_id' => $org_id,
					'issue' => $data1->issue,
					'created_date' => $created_date,
					'assign_date' => $assign_date,
					'assign_starttime' => $assign_starttime1,
					'assign_endtime' => $assign_endtime1,
					'schedule_id' => $value->schedule_id,
					'schedule_ticket_no' => $value->ticket_no,
					'schedule_type' => $value->schedule_type,
					'schedule_visit_type' => $visit_type->type_name,
					'priority_name' => $data1->priority,
					'customer_id' => $customer_id,
					'company_name' => $company_name,
					'contact_person_name1' => $contact_person_name1,
					'email' => $email,
					'phone_no' => $phone_no,
					'city' => $city,
					'chat_status' => $chatstatus
				);

				array_push($assign_issue_list, $arr);
			}
		}

		// return $assign_issue_list;
		echo json_encode($assign_issue_list);
	}
	// ========================================= Schedule Type name ===========================================
	public function schedule_type_name()
	{
		$org_id = $_REQUEST['org_id'];
		$type_name_list = $this->db->query("SELECT type_name, id FROM `tbl_schedule_type_name` WHERE status='1' and org_id='$org_id' and delete_status=0 ORDER BY type_name asc ")->result();
		echo json_encode($type_name_list);
	}

	//==================================== ReSchedule / reassign query =================================================

	public function reschedule($employee_id, $overlapping, $schedule_date, $start_time, $end_time, $ticket_no, $remark, $customer_id, $query_id, $product_id)
	{
		$org_id = $_REQUEST['org_id'];
		if ($overlapping == 'YES') {
			$date = date("Y-m-d H:i:s");
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
			// $schedule_date1 = date("Y-m-d", strtotime($schedule_date));

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

				$response["error"] = FALSE;
				$response["error_msg"] = "Query/Issue submitted successfully";
				echo json_encode($response);
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Failed to submit";
				echo json_encode($response);
			}
		} else {
			$schedule_date_1 = str_replace(',', ' ', $schedule_date);
			$schedule_date1 = date("Y-m-d", strtotime($schedule_date_1));
			$s_time = $start_time;
			$e_time = $end_time;
			$emp_id = $employee_id;
			$available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$employee_id' AND `reschedule`!='reschedule'");

			$available_count = $available->num_rows();
			if ($available_count == 0) {
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

					$response["error"] = FALSE;
					$response["error_msg"] = "Query/Issue submitted successfully";
					echo json_encode($response);
				} else {
					$response["error"] = TRUE;
					$response["error_msg"] = "Failed to submit";
					echo json_encode($response);
				}
			} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "overlapping";
				echo json_encode($response);
			}
		}
	}

	//====================================  schedule_customer_list  ===============================

	public function schedule_customer_list()
	{
		$type = $_REQUEST['type'];
		$org_id = $_REQUEST['org_id'];
		if ($type == 'Opportunity' || $type == 'schedule') {
			$Custype = 'P';
		} else {
			$Custype = 'T';
		}
		$customer_list = $this->db->query("SELECT customer_id, CONCAT(TRIM(`company_name`), ' - ', cust_type) AS company_name FROM `tbl_customer` WHERE  type='$Custype' and org_id='$org_id' and delete_status=0 ORDER BY company_name asc ")->result();
		echo json_encode($customer_list);
	}

	// ===================================== Customer List =================================== 
	public function customer_list()
	{
		$org_id = $_REQUEST['org_id'];
		$customer_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name FROM `tbl_customer` WHERE type='P'  and org_id='$org_id' and delete_status=0   ORDER BY company_name asc")->result();
		echo json_encode($customer_list);
	}

	// --------------------------- primary Customer List --------------
	public function primary_customer_list()
	{
		$org_id = $_REQUEST['org_id'];
		$primary_customer_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name FROM `tbl_customer` WHERE parent_id='0' AND `cust_type`='primary' and type='P' and  org_id='$org_id' and delete_status=0 ORDER BY company_name ASC")->result();
		echo json_encode($primary_customer_list);
	}


	// ===================================== Customer List created by particular Employee =================================== 
	public function emp_customer_list()
	{
		$org_id = $_REQUEST['org_id'];
		$customer_list = $this->db->query(" SELECT customer_id, TRIM(`company_name`) as company_name, contact_person_name1, phone_no FROM `tbl_customer` WHERE delete_status=0 AND parent_id='0' AND `cust_type`='primary' and type='P' and org_id='$org_id' ORDER BY company_name asc ")->result();

		$primary_array = array();
		foreach ($customer_list as $value) {
			$customer_id = $value->customer_id;
			$secondary_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name, contact_person_name1, phone_no FROM `tbl_customer` WHERE `parent_id`='$customer_id' AND delete_status=0 ORDER BY company_name asc")->result();
			$secondary_array['second_array'] = array();
			foreach ($secondary_list as $second) {
				$array = array(
					'second_cust_id' => $second->customer_id,
					'second_company_name' => $second->company_name,
					'second_contact_person_name1' => $second->contact_person_name1,
					'second_phone_no' => $second->phone_no,
				);
				array_push($secondary_array['second_array'], $array);
			}
			$array2 = array(
				'primary_cust_id' => $value->customer_id,
				'primary_company_name' => $value->company_name,
				'primary_contact_person_name1' => $value->contact_person_name1,
				'primary_phone_no' => $value->phone_no,
			);
			array_push($array2, $secondary_array);
			array_push($primary_array, $array2);
		}
		echo json_encode($primary_array);
	}
	//------------------ Check employee permission for update customer---------------
	public function update_user_permission($employee_id)
	{
		$org_id = $_REQUEST['org_id'];
		$update_permission = $this->db->query("SELECT `update_permission` FROM `tbl_admin_login` WHERE `id`='$employee_id'  ")->row();
		$permission = $update_permission->update_permission;
		if ($permission == '1') {
			$response["permission"] = "TRUE";
			echo json_encode($response);
		} else {
			$response["permission"] = "FALSE";
			echo json_encode($response);
		}
	}
	// =================================== / Customer List created by particular Employee =================================== 

	// ===================================== get Customer for update =================================== 
	public function get_customer($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$data = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'  ");
		$update_array = array();
		foreach ($data->result() as $value) {
			$type_id = $value->type_id;
			if ($type_id != 0) {
				$data1 = $this->db->query("SELECT title FROM `tbl_type` WHERE `type_id`='$type_id'")->row();
				$type_title = $data1->title;
			} else {
				$type_title = 'NA';
			}

			$business_id = $value->business_id;
			if ($business_id != 0) {
				$business_array_name = $this->db->query("SELECT business_name, business_id FROM `tbl_business` where `business_id` IN($business_id)");
				$area3 = "";
				foreach ($business_array_name->result() as $multiple_business) {
					$area3 = $area3 . $multiple_business->business_name . ",";
				}

				$business_name = trim($area3, ',');
			} else {
				$business_name = 'NA';
			}

			$location_id = $value->location_id;
			if ($location_id != 0) {
				$data3 = $this->db->query("SELECT location FROM `tbl_location` WHERE `location_id`='$location_id'")->row();
				$location = $data3->location;
			} else {
				$location = 'NA';
			}


			$group_id = $value->group_id;
			if ($group_id != 0) {
				$data4 = $this->db->query("SELECT group_name FROM `tbl_group` WHERE `group_id`='$group_id'")->row();
				$group_name = $data4->group_name;
			} else {
				$group_name = 'NA';
			}


			$state = $value->state;

			$data5 = $this->db->query("SELECT name FROM `states` WHERE `id`='$state'")->row();
			$state_name = $data5->name;

			$country = $value->country;

			$data6 = $this->db->query("SELECT name FROM `countries` WHERE `id`='$country'")->row();
			$country_name = $data6->name;

			$dob = date("d M Y", strtotime($value->dob));

			if ($value->company_anniversary != 0) {
				$company_anniversary = date("d M Y", strtotime($value->company_anniversary));
			} else {
				$company_anniversary = 'NA';
			}


			if ($value->marriage_anniversary != 0) {

				$marriage_anniversary = date("d M Y", strtotime($value->marriage_anniversary));
			} else {
				$marriage_anniversary = 'NA';
			}

			$arr = array(
				'customer_id' => $customer_id,
				'type_title' => $type_title,
				'business_name' => $business_name,
				'location' => $location,
				'group_name' => $group_name,
				'state_name' => $state_name,
				'country_name' => $country_name,

				'company_name' => $value->company_name,
				'contact_person_name1' => $value->contact_person_name1,
				'alternate_email' => $value->alternate_email,
				'phone_no' => $value->phone_no,
				'alternate_number' => $value->alternate_number,
				'landline_number' => $value->landline_number,
				'email' => $value->email,
				'address' => $value->address,
				'city' => $value->city,
				'dob' => $dob,
				'company_anniversary' => $company_anniversary,
				'marriage_anniversary' => $marriage_anniversary

			);

			array_push($update_array, $arr);
		}
		echo json_encode($update_array);
	}

	// ===================================== / get Customer for update =================================== 

	// ---------------------------------------------------------------------------------

	public function update_customer($customer_id, $company_id, $company_name, $email, $phone_no, $contact_person_name1, $alternate_email, $city, $address, $password, $country_id, $dob, $cad, $mad, $alternate_phone_no, $state_id, $type_id, $business_segment_id, $group_id, $location_id, $created_by, $landline, $edited_by)
	{
		$org_id = $_REQUEST['org_id'];
		// echo $company_id;
		$date = date("Y-m-d H:i:s");
		$dob1 = date("Y-m-d", strtotime($dob));
		// $cad1 = date("Y-m-d", strtotime($cad));
		if ($mad == '' && $cad == '') {
			$mad1 = "";
			$cad1 = "";
		} else if ($mad != '' && $cad != '') {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = date("Y-m-d", strtotime($cad));
		} else if ($mad != '' && $cad == '') {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = "";
		} else if ($mad == '' && $cad != '') {
			$mad1 = "";
			$cad1 = date("Y-m-d", strtotime($cad));
		}

		$business_segment_id1 = rtrim($business_segment_id, ',');
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
		$data1 = array(
			'type_id' => $type_id,
			'business_id' => $business_segment_id1,
			'location_id' => $location_id,
			'group_id' => $group_id,
			'company_name' => $company_name1,
			'contact_person_name1' => $contact_person_name1,
			'alternate_email' => $alternate_email,
			'phone_no' => $phone_no,
			'alternate_number' => $alternate_phone_no,
			'landline_number' => $landline,
			'email' => $email,
			'address' => $address,
			'city' => $city,
			'state' => $state_id,
			'country' => $country_id,
			'dob' => $dob1,
			'company_anniversary' => $cad1,
			'marriage_anniversary' => $mad1,
		);

		// print_r($data1);

		$data = $this->db->update('tbl_customer', $data1);
		if ($data) {
			$response["error"] = False;
			$response["error_msg"] = "Updated Successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to update.";
			echo json_encode($response);
		}
	}


	// ===================================== Target List =================================== 
	public function target_list($employee_id)
	{
		$org_id = $_REQUEST['org_id'];
		$date = date("Y-m-d");
		$data = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `status`='1'");
		// print_r($data->result())
		$area2 = "";
		foreach ($data->result() as $target_list) {
			$area2 = $area2 . $target_list->target_id . " ,";
		}
		$target = trim($area2, ',');

		$data1 = $this->db->query("SELECT distinct targettype_id, tr_auto_id  FROM `tbl_target` WHERE target_id IN ($target) AND `employee_id`='$employee_id' GROUP BY targettype_id, tr_auto_id ")->result();

		$targettype_array = array();
		foreach ($data1 as $value1) {
			$targettype_id = $value1->targettype_id;
			$target_id = $value1->tr_auto_id;

			$data2 = $this->db->query("SELECT target_type,uom_id FROM tbl_target_type WHERE `targettype_id` = '$targettype_id'")->row();
			$target_type_name = $data2->target_type;
			$uom_id = $data2->uom_id;

			$data3 = $this->db->query("SELECT uom_type FROM tbl_uom WHERE `uom_id` = '$uom_id'")->row();

			$arr = array(
				'target_type_id' => $targettype_id,
				'target_id' => $target_id,
				'target_type' => $target_type_name,
				'uom_type' => $data3->uom_type
			);
			array_push($targettype_array, $arr);
		}
		// $emp_list = trim($targettype_array, ',');
		echo json_encode($targettype_array);
	}

	// ===================================== Complete Target =================================== 
	public function submit_billing_info($token_id, $employee_id, $billing_type, $billing_remark, $target, $price, $billing_amount)
	{
		$org_id = $_REQUEST['org_id'];
		$date = date("Y-m-d");
		$token_id = $token_id;
		$employee_id = $employee_id;
		$billing_type = $billing_type;
		$billing_remark = $billing_remark;
		$target1 = trim($target, ',');
		$schools_array = explode(",", $target1);
		$target1 = sizeof($schools_array);
		$data = $this->db->query("INSERT INTO `tbl_target_achieve`(`org_id`,`employee_id`, `token_id`, `billing_type`, `billing_remark`, `price`,billing_amount,billing_status,billing_app_amount,`date_created`) VALUES ('$org_id','$employee_id','$token_id','$billing_type','$billing_remark','$price','$billing_amount','pending','0','$date')");
		$insert_id = $this->db->insert_id();

		for ($i = 0; $i < $target1; $i++) {
			$target_value = $schools_array[$i];
			$var = explode('.', $target_value);
			$tr_auto_id = $var[0];
			$targettype_id = $var[1];
			$targettype_value = $var[2];
			$data1 = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `targettype_id`='$targettype_id'")->row();
			$target_id = $data1->target_id;
			$data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`org_id`,`achieve_id`, `tr_auto_id`, `targettype_id`, `targettype_value`,employee_id,created_date) VALUES ('$org_id','$insert_id','$tr_auto_id','$targettype_id','$targettype_value','$employee_id','$date')");
		}

		if ($data) {
			$response["error"] = False;
			$response["error_msg"] = "submitted Successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to Submit.";
			echo json_encode($response);
		}
	}

	public function submit_billing_info1($token_id, $employee_id, $billing_type, $billing_remark, $target)
	{
		$date = date("Y-m-d ");
		$token_id = $token_id;
		$employee_id = $employee_id;
		$billing_type = $billing_type;
		$billing_remark = $billing_remark;
		$target1 = trim($target, ',');
		$schools_array = explode(",", $target1);
		$target1 = sizeof($schools_array);
		$data = $this->db->query("INSERT INTO `tbl_target_achieve`(`employee_id`, `token_id`, `billing_type`, `billing_remark`, `price`, `date_created`) VALUES ('$employee_id','$token_id','$billing_type','$billing_remark','0','$date')");
		$insert_id = $this->db->insert_id();

		for ($i = 0; $i < $target1; $i++) {
			$target_value = $schools_array[$i];
			$targettype_id = substr($target_value, strpos($target_value, ".") + 1);
			$var = explode('.', $target_value);
			$tr_auto_id = $var[0];
			$data1 = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `targettype_id`='$targettype_id'")->row();
			$target_id = $data1->target_id;
			$data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`achieve_id`, `tr_auto_id`, `targettype_id`, `targettype_value`,`employee_id`, `created_date`) VALUES ('$insert_id','$tr_auto_id','$targettype_id','0','$employee_id','$date')");
		}
		if ($data) {
			$response["error"] = False;
			$response["error_msg"] = "submitted Successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to Submit.";
			echo json_encode($response);
		}
	}

	// ===================================== Billing Validation =================================== 
	public function billing_validation($token_id, $employee_id, $user_type)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Employee') {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
		} else {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id' ")->row();
		}

		$bill_count = $data->count;
		$billing = array();
		if ($bill_count > 0) {
			if ($user_type == 'Employee') {
				$data1 = $this->db->query("SELECT achieve_id,billing_type,billing_remark,billing_amount,billing_status,billing_app_amount FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
			} else {
				$data1 = $this->db->query("SELECT achieve_id,billing_type,billing_remark,billing_status,billing_app_amount FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
			}
			$achieve_id = $data1->achieve_id;
			$billing_type = $data1->billing_type;
			$billing["error"] = TRUE;
			$billing['billing_remark'] = $data1->billing_remark;
			$billing['billing_type'] = $data1->billing_type;

			$billing['billing_amount'] = $data1->billing_amount;
			$billing['billing_status'] = $data1->billing_status;
			$billing['billing_app_amount'] = $data1->billing_app_amount;

			echo json_encode($billing);
		} else {
			$response["error"] = False;
			$response["error_msg"] = "Not generated";
			echo json_encode($response);
		}
	}

	public function target_bill_validation($token_id, $employee_id, $user_type)
	{
		$org_id = $_REQUEST['org_id'];
		if ($user_type == 'Employee') {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
		} else {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
		}

		$bill_count = $data->count;
		$billing = array();
		if ($bill_count > 0) {
			if ($user_type == 'Employee') {
				$data1 = $this->db->query("SELECT achieve_id,billing_type FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
			} else {
				$data1 = $this->db->query("SELECT achieve_id,billing_type FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
			}
			$achieve_id = $data1->achieve_id;
			$billing_type = $data1->billing_type;
			$data2 = $this->db->query("SELECT targettype_id,targettype_value,adm_approved_price FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
			$target_array = array();
			foreach ($data2->result() as $value) {
				$targettype_id = $value->targettype_id;
				$data3 = $this->db->query("SELECT `target_type` FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
				$arr = array(
					'target_type' => $data3->target_type,
					'target_value' => $value->targettype_value,
					'admin_approved_price' => $value->adm_approved_price
				);
				array_push($target_array, $arr);
			}
			echo json_encode($target_array);
		} else {
			$response["error"] = False;
			$response["error_msg"] = "Not generated";
			echo json_encode($response);
		}
	}


	// ===================================== Customer issue allocated list =================================== 
	public function allocated_list($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$data = $this->db->query("SELECT query_id,assign_to,created_date,ticket_no,product_name,status,issue,product_id FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`!='0' AND `status`!='in_complete' ORDER BY created_date DESC ");
		$allocated_array = array();
		foreach ($data->result() as $value) {
			$query_id = $value->query_id;
			$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();
			$schedule_type_id = $data1->schedule_type_id;

			if ($schedule_type_id != '') {
				$visit_type = $this->db->query("SELECT type_name FROM `tbl_schedule_type_name` WHERE `id`='$schedule_type_id'")->row();
				$schedulevisit_type = $visit_type->type_name;
			} else {
				$schedulevisit_type = 'NA';
			}

			$emp_id = $value->assign_to;
			$data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();

			$assign_starttime = date("h:i A", strtotime($data1->assign_starttime));
			$assign_endtime = date("h:i A", strtotime($data1->assign_endtime));

			$created_date = date("d M Y", strtotime($value->created_date));
			$assign_date = date("d M Y", strtotime($data1->assign_date));

			// ------------------------------- Check IMEI for chat --------------------------------
			$cust_imei = $this->db->query("SELECT imei FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			$imei = $cust_imei->imei;
			if ($imei != '') {
				$chatstatus = "YES";
			} else {
				$chatstatus = "NO";
			}
			// ------------------------------- / Check IMEI for chat --------------------------------

			$arr = array(
				'emp_id' => $emp_id,
				'employee_name' => $data2->name,
				'ticket_no' => $value->ticket_no,
				'assign_date' => $assign_date,
				'priority_name' => $value->priority,
				'assign_starttime' => $assign_starttime,
				'assign_endtime' => $assign_endtime,
				'schedule_id' => $data1->schedule_id,
				'query_id' => $query_id,
				'schedule_type' => $data1->schedule_type,
				'schedule_visit_type' => $schedulevisit_type,
				'product_name' => $value->product_name,
				'status' => $value->status,
				'created_date' => $created_date,
				'email' => $data2->email,
				'mobile_no' => $data2->mobile_no,
				'issue' => $value->issue,
				'product_id' => $value->product_id,
				'chat_status' => $chatstatus

			);
			array_push($allocated_array, $arr);
		}
		echo json_encode($allocated_array);
	}


	// ===================================== Customer issue unallocated list =================================== 
	public function unallocated_list($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		// $data = $this->db->query("SELECT query_id,assign_to,created_date,ticket_no,product_name,status,issue,product_id FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`='$customer_id' OR `status`='in_complete' ORDER BY created_date DESC ");

		$data = $this->db->query("SELECT query_id,assign_to,created_date,ticket_no,product_name,status,issue,product_id FROM `tbl_user_query` WHERE `customer_id`='$customer_id' AND `assign_to`='0' ORDER BY created_date DESC ");

		$allocated_array = array();
		foreach ($data->result() as $value) {
			$query_id = $value->query_id;
			$data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC LIMIT 1")->row();

			$emp_id = $value->assign_to;
			$data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();

			$assign_starttime = date("h:i A", strtotime($data1->assign_starttime));
			$assign_endtime = date("h:i A", strtotime($data1->assign_endtime));

			$created_date = date("d M Y", strtotime($value->created_date));
			$assign_date = date("d M Y", strtotime($data1->assign_date));

			$arr = array(
				'emp_id' => $emp_id,
				'employee_name' => $data2->name,
				'ticket_no' => $value->ticket_no,
				'assign_date' => $assign_date,
				'assign_starttime' => $assign_starttime,
				'assign_endtime' => $assign_endtime,
				'schedule_id' => $data1->schedule_id,
				'query_id' => $query_id,
				'schedule_type' => $data1->schedule_type,
				'product_name' => $value->product_name,
				'status' => $value->status,
				'created_date' => $created_date,
				'email' => $data2->email,
				'mobile_no' => $data2->mobile_no,
				'issue' => $value->issue,
				'product_id' => $value->product_id,

			);
			array_push($allocated_array, $arr);
		}
		echo json_encode($allocated_array);
	}


	// =============================== Store Employee location =================================== 
	public function location($employee_id, $imei, $posdate_array, $pos_time_array, $sig_str_array, $Batt_Str_array, $Latitude_array, $Longitude_array, $status_array, $charge_status_array, $altitude_array, $speed_array, $serverdate, $servertime)
	{
		$org_id = $_REQUEST['org_id'];
		// echo $employee_id;
		if (!empty($imei)) {
			for ($i = 0; $i < sizeof($posdate_array); $i++) {
				$pos_date = $posdate_array[$i];
				$pos_time = $pos_time_array[$i];
				$sig_str = $sig_str_array[$i];
				$batt_str = $Batt_Str_array[$i];
				$latitude = $Latitude_array[$i];
				$longitude = $Longitude_array[$i];
				$status = $status_array[$i];
				$charge_status = $charge_status_array[$i];
				$altitude = $altitude_array[$i];
				$speed = $speed_array[$i];

				$insert_query = $this->db->query("INSERT INTO `gpsdata`(`org_id`,`IMEI`, `emp_id`,`pos_date`, `pos_time`, `sig_str`, `batt_str`, `latitude`, `longitude`, `status`, `charge_status`, `altitude`, `speed`, `server_date`, `server_time`)
					                                          VALUES('$org_id','$imei','$employee_id','$pos_date','$pos_time','$sig_str','$batt_str','$latitude','$longitude','$status','$charge_status','$altitude','$speed','$serverdate','$servertime')  ON DUPLICATE KEY UPDATE IMEI=IMEI,pos_date=pos_date,pos_time=pos_time");
			}
			if ($insert_query) {
				echo "1";
			} else {
				echo "0";
			}
		} else {
			echo "empty string";
		}
	}


	// ===================================== Get shift details using employee id =================================== 
	public function get_shift($employee_id)
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('tbl_shift_timing.*,tbl_shift.*');
		$this->db->from('tbl_shift');
		$this->db->join('tbl_shift_timing', 'tbl_shift.shift_timing = tbl_shift_timing.id');
		$this->db->where('emp_id', $employee_id);
		$query = $this->db->get()->result();
		if (count($query) > 0) {
			$final_result = array(
				'shift' => $query[0]->shift_title,
				'interval_time' => 1,
				'start_time' => $query[0]->from_timing,
				'end_time' => $query[0]->to_timing,
			);
			echo json_encode($final_result);
		} else {
			$final_result = array(
				'shift' => 'Morning',
				'interval_time' => 1,
				'start_time' => '10:00:00',
				'end_time' => '19:00:00',
			);
			echo json_encode($final_result);
		}
	}

	// ===================================== / Get shift details using employee id =================================== 
	// ============================== Customer Edit Permission =================================== 
	public function edit_customer_permission($employee_id)
	{
		$this->db->select('update_permission');
		$this->db->where('id', $employee_id);
		$data = $this->db->get('tbl_admin_login')->row();
		$update_permission = $data->update_permission;
		if ($update_permission == '1') {
			$response["error"] = False;
			$response["error_msg"] = "Permission";
			echo json_encode($response);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Permission";
			echo json_encode($response);
		}
	}

	// ============================== / Customer Edit Permission ================================= 

	// ============================== Return Source data =================================== 
	public function source_details()
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('source_id, source_title');
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);
		$this->db->where('status', 1);

		$data = $this->db->get('tbl_source')->result();
		if ($data) {
			echo json_encode($data);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}


	// ============================== Return Stage data =================================== 
	public function stage_details()
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('stage_id, stage_title');
		$this->db->where('status', 1);
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);

		$data = $this->db->get('tbl_stage')->result();
		if ($data) {
			echo json_encode($data);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}

	// ============================== / Return Stage data =================================

	// ============================== Return Company name(customer) =================================== 
	public function company_list()
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('customer_id, company_name');
		$this->db->where('delete_status', 0);
		$this->db->where('org_id', $org_id);
		$data = $this->db->get('tbl_customer')->result();
		if ($data) {
			echo json_encode($data);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}

	// ============================== / Return Company name(customer) =================================

	// ============================== / Particular company details(customer) =================================
	public function customer_details($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->select('*');
		$this->db->where('org_id', $org_id);
		$this->db->where('customer_id', $customer_id);
		$data = $this->db->get('tbl_customer')->row();

		if ($data) {
			$type_id = $data->type_id;
			if ($type_id != 0) {
				$this->db->select('type_id, title');
				$this->db->where('type_id', $type_id);
				$type_data = $this->db->get('tbl_type')->row();

				$type_id1 = $type_data->type_id;
				$type_title1 = $type_data->title;
			} else {
				$type_id1 = "NA";
				$type_title1 = "NA";
			}

			$business_id = $data->business_id;

			if ($business_id != 0) {
				$this->db->select('business_id, business_name');
				$this->db->where('business_id', $business_id);
				$business_data = $this->db->get('tbl_business')->row();

				$business_id1 = $business_data->business_id;
				$business_name1 = $business_data->business_name;
			} else {
				$business_id1 = "NA";
				$business_name1 = "NA";
			}

			$location_id = $data->location_id;

			if ($location_id != 0) {
				$this->db->select('location_id, location');
				$this->db->where('location_id', $location_id);
				$location_data = $this->db->get('tbl_location')->row();

				$location_id1 = $location_data->location_id;
				$location1 = $location_data->location;
			} else {
				$location_id1 = "NA";
				$location1 = "NA";
			}

			$group_id = $data->group_id;

			if ($group_id != 0) {
				$this->db->select('group_id, group_name');
				$this->db->where('group_id', $group_id);
				$group_data = $this->db->get('tbl_group')->row();

				$group_id1 = $group_data->group_id;
				$group_name1 = $group_data->group_name;
			} else {
				$group_id1 = "NA";
				$group_name1 = "NA";
			}



			$state = $data->state;

			$this->db->select('id, name');
			$this->db->where('id', $state);
			$state_data = $this->db->get('states')->row();

			$country = $data->country;

			$this->db->select('id, name');
			$this->db->where('id', $country);
			$country_data = $this->db->get('countries')->row();

			$final_array = array();

			$result_array = array(
				'customer_id' => $data->customer_id,
				'company_name' => $data->company_name,
				'contact_person_name1' => $data->contact_person_name1,
				'alternate_email' => $data->alternate_email,
				'phone_no' => $data->phone_no,
				'alternate_number' => $data->alternate_number,
				'landline_number' => $data->landline_number,
				'email' => $data->email,
				'address' => $data->address,

				'city' => $data->city,
				'dob' => $data->dob,
				'company_anniversary' => $data->company_anniversary,
				'marriage_anniversary' => $data->marriage_anniversary,
				'type_id' => $type_id1,
				'type_title' => $type_title1,

				'business_id' => $business_id1,
				'business_name' => $business_name1,
				'location_id' => $location_id1,
				'location' => $location1,

				'group_id' => $group_id1,
				'group_name' => $group_name1,

				'state_id' => $state_data->id,
				'state_name' => $state_data->name,

				'country_id' => $country_data->id,
				'country_title' => $country_data->name
			);

			array_push($final_array, $result_array);
			echo json_encode($final_array);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}

	// ============================== / Add Leads & Apportunity =================================
	public function add_leads_opportunity($employee_id, $company_name, $contact_person_name1, $phone_no, $email, $sources, $stage, $address, $city, $location, $business_segment_id, $group_id, $closure_date, $remarks, $customer_type, $business_value, $company_id, $leadopp_id, $product_id)
	{
		$org_id = $_REQUEST['org_id'];

		if ($customer_type == 'Lead') {
			$is_converted = 0;
		} else {
			$is_converted = 2;
		}
		$created_date = date("Y-m-d H:i:s");
		$cur_date = date("Ymd");
		if ($customer_type == 'Lead') {
			$Prefix = "L-" . $cur_date . '-';
		} else {
			$Prefix = "O-" . $cur_date . '-';
		}
		$this->db->select('lead_generate_id');
		$this->db->order_by('leadopp_id', 'DESC');
		$result = $this->db->get('tbl_leads_opportunity')->row();
		if (!empty($result->lead_generate_id)) {
			$pre_date = explode('-', $result->lead_generate_id);
			$previous_date = $pre_date[1]; // from table last date
			$ticket_no = $pre_date[2]; // from table last ticket no

			if ($previous_date == $cur_date) {
				$ticket_no++;
				$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
				// $final_ticket_num = $cur_date.'-'.$ticket_no1;
				$lead_generate_id = $Prefix . $ticket_no1;
			} else {
				$lead_generate_id = $Prefix . '001';
			}
		} else {
			$lead_generate_id = $Prefix . '001';
		}

		if (!empty($closure_date)) {
			$closure_date_1 = str_replace(',', ' ', $closure_date);
			$closure_date1 = date("Y-m-d", strtotime($closure_date_1));
		} else {
			$closure_date1 = "0000-00-00";
		}

		if ($leadopp_id == 0) // Insert New Lead
		{
			$add_array = array(
				'created_by' => $employee_id,
				'assign_to' => $employee_id,
				'assign_datetime' => date("Y-m-d H:i:s"),
				'lead_generate_id' => $lead_generate_id,
				'company_name' => $company_name,
				'company_id' => $company_id,
				'org_id' => $org_id,

				'contact_person_name1' => $contact_person_name1,
				'phone_no' => $phone_no,
				'email' => $email,
				'product_id' => $product_id,
				'address' => $address,
				'source' => $sources,
				'stage' => $stage,
				'city' => $city,
				'business_id' => $business_segment_id,
				'location' => $location,
				'group_id' => $group_id,
				'closure_date' => $closure_date1,
				'remarks' => $remarks,
				'is_converted' => $is_converted,
				'project_business_value' => $business_value,
				'customer_type' => $customer_type,
				'created_date' => $created_date
			);

			$data = $this->db->insert('tbl_leads_opportunity', $add_array);
			$leadopp_id2 = $this->db->insert_id();
			if ($customer_type == 'Lead') {
				$InsertCustomerArray = array(
					'created_by' => $employee_id,
					'parent_id' => 0,
					'type_id' => 0,
					'business_id' => 0,
					'org_id' => $org_id,

					'location_id' => 0,
					'group_id' => 0,
					'company_name' => $company_name,
					'contact_person_name1' => $contact_person_name1,
					'alternate_email' => '',
					'phone_no' => $phone_no,
					'alternate_number' => '',
					'landline_number' => '',
					'email' => $email,
					'address' => $address,
					'city' => '',
					'state' => 0,
					'country' => 101,
					'password' => 'buro@123',
					'dob' => '1970-01-01',
					'company_anniversary' => '',
					'marriage_anniversary ' => '',
					'android_id ' => '',
					'imei' => '',
					'cust_type' => 'primary',
					'leadopp_id' => $leadopp_id2,
					'type' => 'T',
					'delete_status' => 0,
					'created_date' => $created_date
				);
				$this->db->insert("tbl_customer", $InsertCustomerArray);
				$company_id = $this->db->insert_id();
				$this->db->SET('company_id', $company_id);
				$this->db->where('leadopp_id', $leadopp_id2);
				$this->db->update('tbl_leads_opportunity');
				$history_add_array = array(
					'leadopp_id' => $leadopp_id2,
					'created_by' => $employee_id,
					'assign_to' => $employee_id,
					'org_id' => $org_id,
					'assign_datetime' => date("Y-m-d H:i:s"),
					'company_name' => $company_name,
					'company_id' => $company_id,
					'contact_person_name1' => $contact_person_name1,
					'phone_no' => $phone_no,
					'email' => $email,
					'product_id' => $product_id,
					'address' => $address,
					'source' => $sources,
					'stage' => $stage,
					'city' => $city,
					'business_id' => $business_segment_id,
					'location' => $location,
					'group_id' => $group_id,
					'closure_date' => $closure_date1,
					'remarks' => $remarks,
					'is_converted' => $is_converted,
					'project_business_value' => $business_value,
					'customer_type' => $customer_type,
					'created_date' => $created_date
				);
				$this->db->insert("tbl_lead_history", $history_add_array);
			} else {
				$history_add_array = array(
					'leadopp_id' => $leadopp_id2,
					'created_by' => $employee_id,
					'assign_to' => $employee_id,
					'org_id' => $org_id,
					'assign_datetime' => date("Y-m-d H:i:s"),
					'company_name' => $company_name,
					'company_id' => $company_id,
					'contact_person_name1' => $contact_person_name1,
					'phone_no' => $phone_no,
					'email' => $email,
					'product_id' => $product_id,
					'address' => $address,
					'source' => $sources,
					'stage' => $stage,
					'city' => $city,
					'business_id' => $business_segment_id,
					'location' => $location,
					'group_id' => $group_id,
					'closure_date' => $closure_date1,
					'remarks' => $remarks,
					'is_converted' => $is_converted,
					'project_business_value' => $business_value,
					'customer_type' => $customer_type,
					'created_date' => $created_date
				);
				$this->db->insert("tbl_lead_history", $history_add_array);
			}
		} else {
			$update_array = array(
				'company_name' => $company_name,
				'company_id' => $company_id,
				'contact_person_name1' => $contact_person_name1,
				'phone_no' => $phone_no,
				'email' => $email,
				'address' => $address,
				'source' => $sources,
				'stage' => $stage,
				'city' => $city,
				'business_id' => $business_segment_id,
				'location' => $location,
				'group_id' => $group_id,
				'closure_date' => $closure_date1,
				'remarks' => $remarks,
				'project_business_value' => $business_value
			);
			$this->db->where('leadopp_id', $leadopp_id);
			$data = $this->db->update('tbl_leads_opportunity', $update_array);

			$history_add_array = array(
				'leadopp_id' => $leadopp_id,
				'created_by' => $employee_id,
				'assign_to' => $employee_id,
				'org_id' => $org_id,
				'assign_datetime' => date("Y-m-d H:i:s"),
				'company_name' => $company_name,
				'company_id' => $company_id,
				'contact_person_name1' => $contact_person_name1,
				'phone_no' => $phone_no,
				'email' => $email,
				'product_id' => $product_id,
				'address' => $address,
				'source' => $sources,
				'stage' => $stage,
				'city' => $city,
				'business_id' => $business_segment_id,
				'location' => $location,
				'group_id' => $group_id,
				'closure_date' => $closure_date1,
				'remarks' => $remarks,
				'is_converted' => $is_converted,
				'project_business_value' => $business_value,
				'customer_type' => $customer_type,
				'created_date' => $created_date
			);
			$this->db->insert("tbl_lead_history", $history_add_array);
		}
		if ($data) {
			$response["error"] = False;
			$response["error_msg"] = "Data Added Successfully";
			echo json_encode($response);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}


	//------------------- Transfer Leads -------------------
	public function transfer_leads($leadopp_id, $assign_to, $created_by)
	{
		$org_id = $_REQUEST['org_id'];
		$update_array = array(
			'assign_to' => $assign_to,
			'assign_datetime' => date("Y-m-d H:i:s")
		);
		$this->db->where("leadopp_id", $leadopp_id);
		$data = $this->db->update('tbl_leads_opportunity', $update_array);
		$data1 = $this->db->affected_rows($data);

		if ($data1) {

			$this->db->where('leadopp_id ', $leadopp_id);
			$row = $this->db->get('tbl_leads_opportunity')->row();
			$history_add_array = array(
				'leadopp_id' => $leadopp_id,
				'created_by' => $row->created_by,
				'company_name' => $row->company_name,
				'contact_person_name1' => $row->contact_person_name1,
				'phone_no' => $row->phone_no,
				'email' => $row->email,
				'address' => $row->address,
				'source' => $row->source,
				'stage' => $row->stage,
				'assign_to' => $assign_to,
				'assign_datetime' => date("Y-m-d H:i:s"),
				'product_id' => $row->product_id,
				'project_business_value' => $row->project_business_value,
				'city' => '',
				'tag' => $row->tag,
				'business_id' => $row->business_id,
				'location' => $row->location,
				'group_id' => $row->group_id,
				'closure_date' => $row->closure_date,
				'remarks' => $row->remarks,
				'customer_type' => $row->customer_type,
				'is_converted' => 0,
				'created_date' => date("Y-m-d H:i:s")
			);

			$this->db->insert("tbl_lead_history", $history_add_array);
			$response["error"] = FALSE;
			$response["error_msg"] = "Updated successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to update";
			echo json_encode($response);
		}
	}


	//===================================== Leads list ==============================================
	public function leads_list($employee_id)
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->from('tbl_leads_opportunity');
		$this->db->where("assign_to", $employee_id);
		$this->db->where("org_id", $org_id);
		$this->db->order_by("leadopp_id", "DESC");
		$data = $this->db->get();
		$final_array = array();

		foreach ($data->result() as $value) {
			$employee_id = $value->created_by;
			$this->db->select('id, name');
			$this->db->where('id', $employee_id);
			$emp_data = $this->db->get('tbl_admin_login')->row();
			$emp_name = $emp_data->name;
			$business_id = $value->business_id;
			$this->db->select('business_id, business_name');
			$this->db->where('business_id', $business_id);
			$business_data = $this->db->get('tbl_business')->row();
			$business_name = $business_data->business_name;
			$group_id = $value->group_id;
			$this->db->select('group_id, group_name');
			$this->db->where('group_id', $group_id);
			$group_data = $this->db->get('tbl_group')->row();
			$group_name = $group_data->group_name;
			$source = $value->source;
			$this->db->select('source_id, source_title');
			$this->db->where('source_id', $source);
			$source_data = $this->db->get('tbl_source')->row();
			$source_title = $source_data->source_title;
			$stage = $value->stage;
			$this->db->select('stage_id, stage_title');
			$this->db->where('stage_id', $stage);
			$stage_data = $this->db->get('tbl_stage')->row();
			$stage_title = $stage_data->stage_title;

			$this->db->where('prd_srv_id', $value->product_id);
			$product = $this->db->get('tbl_product_service_list')->row();


			if ($value->closure_date == '1970-01-01' || $value->closure_date == '0000-00-00') {
				$closure_date = "NA";
			} else {
				$closure_date = date("d M Y", strtotime($value->closure_date));
			}


			$result_array = array(
				'emp_name' => $emp_name,
				'company_name' => $value->company_name,
				'company_id' => $value->company_id,
				'business_value' => $value->project_business_value,
				'stage_id' => $value->stage,
				'source_id' => $value->source,
				'business_id' => $value->business_id,
				'product_id' => $value->product_id,
				'product_name' => $product->prdsrv_name,
				'group_id' => $value->group_id,
				'leadopp_id' => $value->leadopp_id,
				'lead_generate_id' => $value->lead_generate_id,
				'contact_person_name1' => $value->contact_person_name1,
				'phone_no' => $value->phone_no,
				'email' => $value->email,
				'address' => $value->address,
				'city' => $value->city,
				'business_name' => $business_name,
				'location' => $value->location,
				'group_name' => $group_name,
				'stage_title' => $stage_title,
				'source_title' => $source_title,
				'closure_date' => $closure_date,
				'remarks' => $value->remarks,
				'is_converted' => $value->is_converted,
				'customer_type' => $value->customer_type
				// 'created_date'=> $value->created_date
			);
			array_push($final_array, $result_array);
		}
		echo json_encode($final_array);
	}

	//==================================== Update Leads Opportunity =================================================
	public function update_leads_opportunity($stage, $leadopp_id)
	{
		$org_id = $_REQUEST['org_id'];
		$this->db->where('leadopp_id', $leadopp_id);
		$this->db->set('stage', $stage);
		$data = $this->db->update('tbl_leads_opportunity');
		$data1 = $this->db->affected_rows($data);
		if ($data1) {
			$response["error"] = FALSE;
			$response["error_msg"] = "Updated successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to update";
			echo json_encode($response);
		}
	}
	//==================================== / Update Leads Opportunity  =================================================
	//==================================== Return Category and type for filter =================================================
	public function get_category_list()
	{
		$org_id = $_REQUEST['org_id'];

		$data = $this->db->query("SELECT id, interest FROM tbl_categories WHERE `status`='1' and org_id='$org_id'  ");
		$category_list = array();
		foreach ($data->result() as $value) {
			$array = array(
				'category_name' => $value->interest,
				'category_id' => $value->id
			);
			array_push($category_list, $array);
		}

		echo json_encode($category_list);
	}

	public function get_type_list()
	{
		$type = array("product", "service", "all");
		$typeid = array("1", "2", "3");
		$count = count($type);
		$type_array = array();
		for ($i = 0; $i < $count; $i++) {
			$type_name = $type[$i];
			$type_id = $typeid[$i];
			$array = array(
				'type_name' => $type_name,
				'type_id' => $type_id
			);
			array_push($type_array, $array);
		}
		echo json_encode($type_array);
	}
	//==================================== / Return Category and type for filter ============================================

	// ========================= Product / Service List using group name and type name ===================
	public function get_product_service_list($user_id, $category_id, $type_name)
	{
		if ($type_name == 'all') {
			$data = $this->db->query("SELECT prd_srv_id,prdsrv_name,prdsrv_description,image,price FROM `tbl_product_service_list` WHERE `menu_id`='$category_id' AND `status`='1'")->result();
		} else {
			$data = $this->db->query("SELECT prd_srv_id,prdsrv_name,prdsrv_description,image,price FROM `tbl_product_service_list` WHERE `menu_id`='$category_id' AND `prdsrv_type`='$type_name' AND `status`='1'")->result();
		}
		// print_r($data);
		$final_array = array();
		foreach ($data as $value) {
			// $prd_brand = $value->prd_brand;
			// $prd_specs = $value->prd_specs;

			// $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

			// $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();
			$product_id = $value->prd_srv_id;
			$cart_total = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'")->row();
			$cart_quantity = $cart_total->quantity;
			if ($cart_quantity != '') {
				$cart_product_quantity = $cart_quantity;
			} else {
				$cart_product_quantity = '0';
			}


			$prdsrv_array = array(
				'product_id' => $value->prd_srv_id,
				'product_name' => $value->prdsrv_name,
				'product_description' => $value->prdsrv_description,
				'image' => $value->image,
				'price' => $value->price,
				'quantity' => '100',
				'cart_quantity' => $cart_product_quantity
			);
			array_push($final_array, $prdsrv_array);
		}
		echo json_encode($final_array);
	}

	// ------------------------------------------------------------------------------------------

	// public function get_service_list($user_id)
	// {
	//   $array=array('prdsrv_type'=>'service', 'status'=>'1');
	//   $this->db->where($array);
	//   $data = $this->db->get('tbl_product_service_list')->result();
	//   $final_array=array();
	//   foreach ($data as $value) 
	//   {
	//     // $prd_brand = $value->prd_brand;
	//     // $prd_specs = $value->prd_specs;

	//     // $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

	//     // $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();

	//   	$product_id=$value->prd_srv_id;
	// $cart_total = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'")->row();
	//   	$cart_quantity = $cart_total->quantity;
	//   	if ($cart_quantity!='')
	//   	{
	//   		$cart_product_quantity = $cart_quantity;
	//   	}
	//   	else
	//   	{
	//   		$cart_product_quantity = '0';
	//   	}


	//     $prdsrv_array=array
	//     (
	//         'service_id'=>$value->prd_srv_id,
	//         'service_name'=>$value->prdsrv_name,
	//         'service_description'=>$value->prdsrv_description,
	//         'image'=>$value->image,
	//         'price'=>$value->price,
	//         'quantity'=>'100',
	//         'cart_quantity'=>$cart_product_quantity 
	//     );
	//     array_push($final_array, $prdsrv_array);
	//   }
	//   // return $final_array;
	//   echo json_encode($final_array);
	// }
	// --------------------------------------------------------------------------------------------------------
	public function get_productservice_details($prd_srv_id)
	{
		$array = array('prd_srv_id' => $prd_srv_id);
		$this->db->where($array);
		$data = $this->db->get('tbl_product_service_list')->result();
		$final_array = array();
		foreach ($data as $value) {
			// $prd_brand = $value->prd_brand;
			$menu_id = $value->menu_id;
			// $prd_specs = $value->prd_specs;
			$prd_srv_id = $value->prd_srv_id;

			// $brand_name = $this->db->query("SELECT brand_name FROM tbl_product_group WHERE id='$prd_brand'")->row();

			$category = $this->db->query("SELECT interest FROM tbl_categories WHERE id='$menu_id'")->row();

			// $specs_name = $this->db->query("SELECT specs FROM tbl_product_group WHERE id='$prd_specs'")->row();


			// ======================product multiple images===============

			$prduct_multiple_images = $this->db->query("SELECT image FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->result();
			$multiple_image = array();
			// $image_arr['images1'] = array();
			foreach ($prduct_multiple_images as $images) {
				$image_arr = $images->image;
				array_push($multiple_image, $image_arr);
			}

			$multiple_image1 = "";
			for ($i = 0; $i < 1; $i++) {
				$mult_image = $prduct_multiple_images[$i]->image;
				$multiple_image1 = $multiple_image1 . $mult_image . ",";
			}
			$images1 = trim($multiple_image1, ',');
			// $img_path = 'assets/admin/product_service/'.$images1;

			$prduct_multiple_images_single = $this->db->query("SELECT image FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->row();

			$prdsrv_array = array(
				'prd_srv_id' => $value->prd_srv_id,
				'prdsrv_name' => $value->prdsrv_name,
				'prdsrv_type' => $value->prdsrv_type,
				// 'brand_name'=>$brand_name->brand_name,
				'brand_name' => $category->interest,
				// 'specs'=>$specs_name->specs,
				'prdsrv_uom' => $value->prdsrv_uom,
				'prdsrv_image' => $images1,
				'price' => $value->price,
				'quantity' => '100',
				'prdsrv_description' => $value->prdsrv_description
			);
			// array_push($prdsrv_array);
			array_push($prdsrv_array, $multiple_image);
		}
		echo json_encode($prdsrv_array);
	}
	// ======================================/ Product / Service deials and list ======================================

	// ====================================== Send mail to customer ======================================
	public function send_mail($customer_id, $description, $subject, $emp_id)
	{

		$org_id = $_REQUEST['org_id'];
		$array = array('customer_id' => $customer_id);
		$this->db->where($array);
		$cust_detals = $this->db->get('tbl_customer')->row();
		$cust_email = $cust_detals->email;
		$this->db->where("id", $emp_id);
		$emp = $this->db->get('tbl_admin_login')->row();
		$emp_name = $emp->name;
		$emp_email = $emp->email;
		$emp_mobile_no = $emp->mobile_no;

		include_once 'assets/phpmailer/phpmailer.php';
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->Host = "mail.buroforce.com";
		$mail->Port = 25; // or 587
		$mail->IsHTML(true);
		$mail->Username = "support@buroforce.com";
		$mail->Password = "Bur@@ForCe$$2019";
		$mail->FromName = "Buroforce";
		$mail->From = "support@buroforce.com";

		//cust_email ="kishor@ileaf.in";               
		$mail->AddAddress($cust_email);  // send email to customer.
		$mail->Subject = $subject;

		$message_text = "<table width='650px' style='color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>
 
                      <tr>
                          <td><b>Hello " . $cust_detals->company_name . ",</b></td>
                      </tr>
                      <tr>
                          <td>Greetings!!!</td>
                      </tr>
                       <tr>
                          <td >&nbsp;</td>
                       </tr>
                        <tr>
                          <td>" . $description . "</td>
                       </tr>  
                       <tr>
                          <td >&nbsp;</td>
                       </tr>  
                       <tr>
                          <td >&nbsp;</td>
                       </tr>  
                      <tr>
                          <td>With regards,</td>
                      </tr>
                        <tr>
                          <td>" . $emp_name . "</td>
                       </tr> 
                        <tr>
                          <td>" . $emp_mobile_no . "</td>
                       </tr> 
                         <tr>
                          <td>" . $emp_email . "</td>
                       </tr> 
                </table>";

		$mail->Body = $message_text;
		if ($mail->send()) {
			$response["error"] = FALSE;
			$response["error_msg"] = "Email send successfully";
			echo json_encode($response);
		} else {
			$error = "Mailer Error: " . $mail->ErrorInfo;
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to send mail";
			echo json_encode($response);
		}
	}


	//===================================== Shopping Cart =============================================================== 

	public function shopping_cart($customer_id, $product_id)
	{
		$org_id = $_REQUEST['org_id'];
		$data1 = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id' AND `product_id`='$product_id'")->row();
		$created_date = date("Y-m-d H:i:s");
		if ($data1) {
			// $session_id = $data1->session_id;
			$existing_quantity = $data1->quantity;
			$addition_quantity = $existing_quantity + 1;
			$this->db->set('quantity', $addition_quantity);
			$this->db->where('product_id', $product_id);
			$this->db->update('tbl_prdsrv_cart');

			$response["error"] = FALSE;
			$response["error_msg"] = "Successfully Added";
			echo json_encode($response);
		} else {
			$quantity = 1;
			$this->db->query("INSERT INTO `tbl_prdsrv_cart`(`user_id`, `product_id`, `quantity`, `date_created`) VALUES ('$customer_id','$product_id','$quantity','$created_date')");

			$response["error"] = FALSE;
			$response["error_msg"] = "Successfully Added";
			echo json_encode($response);
		}
	}


	//============= Get product from cart of particular user =================================================

	public function cart_products($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$products = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'");

		$product_array = array();
		$all_prd_price = 0;
		foreach ($products->result() as $row) {
			$cart_total = $this->db->query("SELECT sum(quantity) as total FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'")->row();
			$total_quantity = $cart_total->total;
			$product_id = $row->product_id;
			$prdsrv_quantity = $row->quantity;

			$product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

			$prd_srv_id = $product_description->prd_srv_id;
			$prdsrv_name = $product_description->prdsrv_name;
			// $prd_brand = $product_description->prd_brand;
			$menu_id = $product_description->menu_id;
			$prd_specs = $product_description->prd_specs;
			$price = $product_description->price;
			$product_description1 = $product_description->prdsrv_description;

			$all_prd_price += $price * $prdsrv_quantity;

			// get UOM Type
			$prdsrv_uom = $this->db->query("SELECT uom_type FROM `tbl_uom` WHERE `uom_id`='$prdsrv_uom'")->row();

			$uom_type = $prdsrv_uom->uom_type;

			// Get Brand Name
			// $prdsrv_brand = $this->db->query("SELECT brand_name FROM `tbl_product_group` WHERE `id`='$prd_brand'")->row();

			// $brand_name=$prdsrv_brand->brand_name; 

			$category = $this->db->query("SELECT interest FROM `tbl_categories` WHERE `id`='$menu_id'")->row();

			$interest = $category->interest;

			// ======================product multiple images===============
			$prduct_multiple_images_single = $this->db->query("SELECT image FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->row();
			$single_image = $prduct_multiple_images_single->image;


			// ====================== Retun cart product / services ===============
			$arr = array(
				'prd_srv_id' => $prd_srv_id,
				'prdsrv_name' => $prdsrv_name,
				// 'prd_brand' => $brand_name,
				'prd_brand' => $interest,
				'all_prd_price' => $all_prd_price,
				'price' => $price,
				// 'product_description' => $product_description1,
				// 'uom_type' => $uom_type,
				'single_image' => $single_image,
				'product_quantity' => $prdsrv_quantity,
				'cart_quantity' => $total_quantity

			);
			array_push($product_array, $arr);
		}
		// print_r($product_array);
		echo json_encode($product_array);
	}

	//====================================/ Get product from cart of particular user  =================================================


	//==================================== Remove product from cart  =================================================

	public function remove_product_cart($customer_id, $product_id)
	{
		$org_id = $_REQUEST['org_id'];
		$array = array('user_id' => $customer_id, 'product_id' => $product_id);
		$this->db->where($array);
		$this->db->delete("tbl_prdsrv_cart");

		$response["error"] = FALSE;
		$response["error_msg"] = "Deleted successfully";
		echo json_encode($response);
	}
	//------------ get order product details -----------------------------------

	public function order_details($order_id)
	{
		$array = array('order_id' => $order_id);
		$this->db->where($array);
		$response = $this->db->get("tbl_order_product")->result();
		echo json_encode($response);
	}


	//------------ get order product details -----------------------------------

	public function cust_feedback($cust_id, $feedback)
	{
		$org_id = $_REQUEST['org_id'];
		$InsertArray = array('org_id' => $org_id, 'cust_id' => $cust_id, 'feedback' => $feedback, 'created_date' => date("Y-m-d H:i:s"));
		$insert = $this->db->insert("tbl_cust_feedback", $InsertArray);
		if ($insert) {
			$response["error"] = False;
			$response["error_msg"] = "Feedback Sent Successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to Send";
			echo json_encode($response);
		}
	}



	//==================================== decrement product from cart  =================================================

	public function decrement_product_count($customer_id, $product_id)
	{
		$org_id = $_REQUEST['org_id'];

		$data1 = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id' AND `product_id`='$product_id'")->row();
		$quantity = $data1->quantity;
		$decrement_quantity = $quantity - 1;
		$this->db->set('quantity', $decrement_quantity);
		$dec_array = array('user_id' => $customer_id, 'product_id' => $product_id);
		$this->db->where($dec_array);
		$data = $this->db->update('tbl_prdsrv_cart');

		$data1 = $this->db->affected_rows($data) > 0;
		if ($data1) {
			$response["error"] = FALSE;
			$response["error_msg"] = "Decrement value by one";
			echo json_encode($response);

			$data1 = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id' AND `product_id`='$product_id'")->row();
			$quantity = $data1->quantity;
			if ($quantity <= 0) {
				$where = array('user_id' => $customer_id, 'product_id' => $product_id);
				$this->db->where($where);
				$this->db->delete("tbl_prdsrv_cart");
			}
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to decrement";
			echo json_encode($response);
		}
	}


	//==================================== decrement product from cart  =================================================
	//==================================== Sum of cart product/services & counter =================================================

	public function cart_sum_counter($customer_id)
	{
		$org_id = $_REQUEST['org_id'];
		$products = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'");
		$product_array = array();
		$all_prd_price = 0;
		foreach ($products->result() as $row) {
			// $cart_id = $row->cart_id;
			$cart_total = $this->db->query("SELECT sum(quantity) as total FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'")->row();
			$total_quantity = $cart_total->total;
			$product_id = $row->product_id;
			$prdsrv_quantity = $row->quantity;

			$product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

			$price = $product_description->price;

			$all_prd_price += $price * $prdsrv_quantity;

			// ====================== Retun cart product / services ===============

		}
		// print_r($product_array);
		$product_array = array(
			'all_prd_price' => $all_prd_price,
			'cart_quantity' => $total_quantity

		);
		echo json_encode($product_array);
	}

	//====================================/ Sum of cart product/services & counter =====================================

	//==================================== cart Place order =================================================
	public function cart_place_order($customer_id, $emp_id, $user_type, $amount)
	{
		$org_id = $_REQUEST['org_id'];

		if ($user_type == 'Customer') {
			$cart_total = $this->db->query("SELECT sum(quantity) as quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'")->row();
			$order_by_id = $customer_id;
		} else {
			$cart_total = $this->db->query("SELECT sum(quantity) as quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'")->row();
			$order_by_id = $emp_id;
		}
		$prdsrv_quantity = $cart_total->quantity;

		if ($prdsrv_quantity > 0) {
			$date = date("Y-m-d H:i:s");
			$result = $this->db->query("SELECT invoice_no FROM tbl_order ORDER BY order_id DESC LIMIT 1")->row();
			if ($result) {
				$result1 = $result->invoice_no;
				$pre_date = explode('-', $result1);

				$previous_date = $pre_date[0]; // from table last date
				$ticket_no = $pre_date[1]; // from table last ticket no

				$cur_date = date("Ymd"); // current date
				if ($previous_date == $cur_date) {
					$ticket_no++;
					$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
					$final_order_num = $cur_date . '-' . $ticket_no1;
				} else {
					$final_order_num = $cur_date . '-' . '001';
				}
			} else {
				$cur_date = date("Ymd"); // current date
				$final_order_num = $cur_date . '-' . '001';
			}

			$activestatus = $this->db->query("SELECT order_status_id FROM tbl_order_status WHERE `default_active`='1'")->row();

			// ====================== Retun cart product / services ===============
			$arr = array(
				'invoice_no' => $final_order_num,
				'org_id' => $org_id,
				'customer_id' => $customer_id,
				'order_by_id' => $order_by_id,
				'quantity' => $prdsrv_quantity,
				'total' => $amount,
				'order_status_id' => $activestatus->order_status_id,
				'order_by' => $user_type,
				'payment_method' => '',
				'payment_code' => '',
				'created_date' => $date,
				'updated_date' => $date

			);

			$res = $this->db->insert('tbl_order', $arr);
			$insert_id = $this->db->insert_id();

			//======================= sending notification to customer regarding order ===============

			if ($user_type == 'Customer') {
				$cart_result = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'");
			} else {
				$cart_result = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'");
			}
			foreach ($cart_result->result() as $value) {
				$product_id = $value->product_id;
				$quantity = $value->quantity;

				$product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

				$prd_srv_id = $product_description->prd_srv_id;
				$prdsrv_name = $product_description->prdsrv_name;
				$price = $product_description->price;

				$prd_total = $price * $quantity;



				$array2 = array(

					'order_id' => $insert_id,
					'org_id' => $org_id,
					'product_id' => $product_id,
					'product_name' => $prdsrv_name,
					'quantity' => $quantity,
					'price' => $price,
					'total' => $prd_total

				);
				$this->db->insert('tbl_order_product', $array2);

				// ========================================
			}
			// ------------------------ Order History add ------------------------

			$array3 = array(

				'order_id' => $insert_id,
				'order_status_id' => $activestatus->order_status_id,
				'date_added' => $date
			);
			$this->db->insert('tbl_order_history', $array3);
			// ------------------------ / Order History add ------------------------

			// =============================delete from cart==============================

			$this->db->where('user_id', $order_by_id);
			$this->db->delete("tbl_prdsrv_cart");



			//======================= sending notification to customer regarding order ===============

			$order_result = $this->db->query("SELECT * FROM `tbl_order` WHERE `order_id`='$insert_id'")->row();
			$customer_id = $order_result->customer_id;
			$total_prd_price = number_format((float)$order_result->total, 2, '.', '');
			$cust_result = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			$cust_email = $cust_result->email;
			$cust_state = $cust_result->state;
			$cust_country = $cust_result->country;

			$cust_country_name = $this->db->query("SELECT name FROM `countries` WHERE `id`='$cust_country'")->row();

			$cust_state_name = $this->db->query("SELECT name FROM `states` WHERE `id`='$cust_state'")->row();

			$order_default_status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `default_active`='1'")->row();


			include_once 'assets/phpmailer/phpmailer.php';
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = true;
			$mail->Host = "mail.buroforce.com";
			$mail->Port = 25; // or 587
			$mail->IsHTML(true);
			$mail->Username = "support@buroforce.com";
			$mail->Password = "Bur@@ForCe$$2019";
			$mail->FromName = "Buroforce";
			$mail->From = "support@buroforce.com";

			$mail->AddAddress($cust_email);  // Mail send to customer 
			$mail->AddCC('support@buroforce.com'); // Mail send to admin

			$mail->Subject = "Buroforce - " . $insert_id;
			$message_text = "
                             					<div style='width: 680px;'><a><img src='' alt='' style='margin-bottom: 20px; border: none;' /></a>
														  <p style='margin-top: 0px; margin-bottom: 20px;'>Thank you for your interest in Buroforce products. Your order has been received and will be processed once payment has been confirmed.</p>
														 
														  <p style='margin-top: 0px; margin-bottom: 20px;'></p>
														  <p style='margin-top: 0px; margin-bottom: 20px;'><a></a></p>
														  
														  <table style='border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;'>
														    <thead>
														      <tr>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;' colspan='2'>Order Details</td>
														      </tr>
														    </thead>
														    <tbody>
														      <tr>
														        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;'><b>Order ID:</b>" . '#' . $insert_id . "<br />
														          <b>Date Added:</b> " . $order_result->created_date . " <br />
														          <b>Payment Method:</b> " . $order_result->payment_method . "
														         </td>
														        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;'><b>E-mail:</b>" . $cust_result->email . "<br />
														          <b>Telephone:</b> " . $cust_result->phone_no . "<br />
														          <b>Order Status:</b> " . $order_default_status->name . "<br /></td>
														      </tr>
														    </tbody>
														   </table>
														   <table style='border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;'>
														    <thead>
														      <tr>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;'>Payment Address</td>
														      </tr>
														    </thead>
														    <tbody>
														      <tr>
															        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;'><span>" . $cust_result->contact_person_name1 . "</span><br>
												                        <span>" . $cust_result->company_name . "</span><br>
												                        <span>" . $cust_result->address . "</span><br>
												                        <span>" . $cust_result->city . "</span><br>
												                        <span>" . $cust_state_name->name . "</span><br>
												                        <span>" . $cust_country_name->name . "</span><br>
												                        <span>" . $cust_result->phone_no . "</span>
															        </td>
														      </tr>
														    </tbody>
														  </table>
														  <table style='border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;'>
														    <thead>
														      <tr>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;'>Product</td>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Quantity</td>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Price</td>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Total</td>
														      </tr>
														    </thead>";
			$email_order_product = $this->db->query("SELECT product_name,quantity,price FROM `tbl_order_product` WHERE `order_id`='$insert_id'");
			foreach ($email_order_product->result() as $key) {
				$quantity = $key->quantity;
				$price = $key->price;
				$quantity_price = $quantity * $price;

				$prd_price = number_format((float)$key->price, 2, '.', '');

				$message_text .= "<tr>
															        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;'>" . $key->product_name . "
															        </td>
															        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;'>" . $key->quantity . "</td>
															        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;'>" . $prd_price . "</td>
															        <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;'>" . $quantity_price . "</td>
															      </tr>";
			}
			$message_text .= "</tbody>
														    <tfoot>
														      <tr>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;' colspan='3'><b>Total:</b></td>
														        <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;'>Rs. " . $total_prd_price . "</td>
														      </tr>
														    </tfoot>
														  </table>
														</div>";
			$mail->Body = $message_text;
			if ($mail->send()) {
			} else {
				// $response["error"] = TRUE;
				// $response["error_msg"] = "Failed to send OTP, try again!";
				// echo json_encode($response);
			}
			//======================= / sending notification to customer regarding order ===============

			$response["order_id"] = $final_order_num;
			$response["error"] = FALSE;
			$response["error_msg"] = "Order placed successfully";
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Failed to place order";
			echo json_encode($response);
		}
	}


	//==================================== Order history =================================================
	public function order_history($customer_id, $user_type)
	{
		$org_id = $_REQUEST['org_id'];

		if ($user_type == 'Customer') {
			$data = $this->db->query("SELECT order_id,created_date,order_by_id,customer_id,quantity,total,order_by FROM `tbl_order` WHERE `customer_id`='$customer_id' ORDER BY order_id desc");
		} else {
			$data = $this->db->query("SELECT order_id,created_date,order_by_id,customer_id,quantity,total,order_by FROM `tbl_order` WHERE `order_by_id`='$customer_id' ORDER BY order_id desc");
		}
		// print_r($data->result());
		$final_array = array();
		foreach ($data->result() as $value) {
			// echo "1";
			$order_id = $value->order_id;
			$created_date = $value->created_date;
			$order_by_id = $value->order_by_id;
			$customer_id = $value->customer_id;
			$quantity = $value->quantity;
			$order_total = $value->total;
			$order_by = $value->order_by;

			if ($order_by == 'Employee') // Product Order order by Employee
			{
				if ($user_type == 'Employee') // Application login by employee
				{
					$cust_res = $this->db->query("SELECT `company_name` FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
					$company_name = $cust_res->company_name;
					$emp_name = 'self';
				} else {
					$emp_res = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$order_by_id'")->row();
					$emp_name = $emp_res->name;
					$company_name = 'self';
				}
			} else {
				// $emp_res = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$customer_id'")->row();
				$emp_name = 'self';
				$company_name = 'self';
			}

			$order_date = date("F d, Y", strtotime($value->created_date));
			$data2 = $this->db->query("SELECT sum(total) as total, count(`order_product_id`) as count FROM `tbl_order_product` WHERE `order_id`='$order_id'")->row();
			// $total = $data2->total;
			$total = number_format((float)$data2->total, 2, '.', '');
			$count = $data2->count;

			$data4 = $this->db->query("SELECT order_status_id FROM `tbl_order_history` WHERE `order_id`='$order_id' ORDER BY order_history_id DESC LIMIT 1")->row();
			$order_status_id = $data4->order_status_id;

			$data4 = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id' ")->row();
			$status_name = $data4->name;

			$array = array(
				'company_name' => $company_name,
				'order_id' => $order_id,
				'order_status' => $status_name,
				'order_date' => $order_date,
				'order_count' => $quantity,
				'employee_name' => $emp_name,
				'order_price' => $order_total
			);
			array_push($final_array, $array);
		}
		echo json_encode($final_array);
	}
	public function near_by_customer($org_id, $emp_id)
	{
		$final_array = array();
		$this->db->select('address2,g_lat,g_long');
		$this->db->where('org_id', $org_id);
		$this->db->where('account_manager', $emp_id);
		$this->db->where('type ', 'P');
		$this->db->where('g_lat!=','');
		$this->db->where('g_long!=','');
		$customerData = $this->db->get('tbl_customer')->result_array();
		if (!empty($customerData)) {
			foreach ($customerData as $cust) {
				$data = array(
					'google_address' => $cust['address2'],
					'google_lat' => $cust['g_lat'],
					'google_long' => $cust['g_long'],
				);
				array_push($final_array, $data);
			}
			echo json_encode($final_array);
		} else {
			$response["error"] = True;
			$response["error_msg"] = "No Data";
			echo json_encode($response);
		}
	}
	//==================================== Order history  =================================================

	//==================================== Order Status =================================================
	public function order_status($order_id)
	{
		$data = $this->db->query("SELECT tbl_order_history.*
													FROM  tbl_order_history WHERE tbl_order_history.order_id='$order_id' ORDER BY tbl_order_history.`order_history_id` DESC LIMIT 1")->row();

		$order_status_id = $data->order_status_id;
		// $date_added=$data->date_added;

		// $date_added = date_format($data->date_added,"Y/m/d H:i:s");

		$date_added = date("F d, Y", strtotime($data->date_added));

		$data4 = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id'")->row();
		$status_name = $data4->name;

		$array = array(
			'order_id' => $order_id,
			'order_status' => $status_name,
			'order_date' => $date_added
		);
		// array_push($final_array, $array); 

		echo json_encode($array);
	}
	//==================================== Order Status  =================================================


}
