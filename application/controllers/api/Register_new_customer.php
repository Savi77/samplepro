<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Register_new_customer extends REST_Controller 
{
	function __construct()
	{
  parent::__construct();
  }
  public function index_post()
  {
    $customer_type = $this->input->post('customer_type');
    $parent_id = $this->input->post('parent_id');
    $company_name = $this->input->post('company_name');
    $email = $this->input->post('email');
    $phone_no = $this->input->post('phone_no');
    $contact_person_name1 = $this->input->post('contact_person_name1');
    $alternate_email = $this->input->post('alternate_email');
    $city = $this->input->post('city');
    $address = $this->input->post('address');
    // $password = $this->input->post('password');
    $password = 'buro123';
    $country_id = $this->input->post('country_id');
    $dob = $this->input->post('dob');
    $cad = $this->input->post('cad');
    $mad = $this->input->post('mad');
    $alternate_phone_no = $this->input->post('alternate_phone_no');
    $state_id = $this->input->post('state_id');
    $type_id = $this->input->post('type_id');
    $business_segment_id = $this->input->post('business_segment_id');
    $group_id = $this->input->post('group_id');
    $location_id = $this->input->post('location_id');
    $created_by = $this->input->post('created_by');
    $landline = $this->input->post('landline');
    $org_id = $this->input->post('org_id');
    $contact_code_manual = $this->input->post('contact_code');
    $pincode = $this->input->post('pincode');
    $account_manager = $this->input->post('account_manager'); 
    $refered_by =  $this->input->post('refered_by'); 
    $credit_term = $this->input->post('credit_term'); 
    $note = $this->input->post('note'); 


    $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
    if($check_code2->auto_contact_code != '')
    {
        $code2 = $check_code2->auto_contact_code; 
        $contact_code2 = (int)$code2 + 1;
    }
    else
    {
        $contact_code2 = '1000000';
    }

    if ($company_name != '' && $email != '' && $phone_no != '' && $contact_person_name1 != '' && $address != '' && $customer_type != '' && $password != '') 
    {
        $date = date("Y-m-d H:i:s");

        if($dob == '')
        {
            $dob1 = '';
        }
        else
        {
            $dob1 = date("Y-m-d", strtotime($dob));
        }


        if ($mad == '' && $cad == '') 
        {
			$mad1 = "";
			$cad1 = "";
		} 
        else if ($mad != '' && $cad != '') 
        {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = date("Y-m-d", strtotime($cad));
		} 
        else if ($mad != '' && $cad == '') 
        {
			$mad1 = date("Y-m-d", strtotime($mad));
			$cad1 = "";
		} 
        else if ($mad == '' && $cad != '') 
        {
			$mad1 = "";
			$cad1 = date("Y-m-d", strtotime($cad));
		}

		$business_segment_id12 = rtrim($business_segment_id, ',');
		if ($business_segment_id12 != '') 
        {
			$business_segment_id1 = $business_segment_id12;
		} 
        else 
        {
			$business_segment_id1 = '0';
		}


		// -------------------------------- Primary / Secondary Account --------------------------------

		if ($customer_type == 'primary') 
        {
			$company_name1 = TRIM($company_name);
			$parentid = '0';
		} 
        else 
        {
			$parentid = $parent_id;
			$parent_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$parentid'")->row();
			$company_name1 = $parent_res->company_name;
		}

		// -----------------------------------------------------------	
    

        if(!empty($refered_by) || $refered_by != 0)
        {
            $reference_id = $refered_by;
            $reference_res = $this->db->query("SELECT company_name FROM tbl_customer WHERE `customer_id`='$reference_id'")->row();
            $reference_name = $reference_res->company_name;
        }
        else
        {
            $reference_id = $refered_by;
            $reference_name = '';
        }

        $account_id1 = rtrim($account_manager, ',');
        

		$data = $this->db->query("INSERT INTO `tbl_customer`(`org_id`,`created_by`, `parent_id`,`contact_code`,`auto_contact_code`, `type_id`, `business_id`, `location_id`, `group_id`, `company_name`, `contact_person_name1`, `alternate_email`, `phone_no`, `alternate_number`, `landline_number`, `email`, `address`, `city`, `state`, `country`, `password`, `dob`, `company_anniversary`, `marriage_anniversary`, `cust_type`,`created_date`,`pincode`,`account_manager`,`reference_id`,`reference_name`,`credit_term`,`notes`) VALUES ('$org_id','$created_by','$parentid','$contact_code_manual','$contact_code2','$type_id','$business_segment_id1','$location_id','$group_id','$company_name1','$contact_person_name1','$alternate_email','$phone_no','$alternate_phone_no','$landline','$email','$address','$city','$state_id','$country_id','$password','$dob1','$cad1','$mad1','$customer_type','$date','$pincode','$account_id1','$reference_id','$reference_name','$credit_term','$note')");

		$insert_id = $this->db->insert_id();
		if ($data) 
        {
			$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `customer_id`='$insert_id'")->row();

			$user_email = $query->email;
			$profile_image = 'dummy.png';


            $data2 = array(
                'custom_id' => $insert_id,
                'org_id' => $org_id,
                'Password' => $password,
                'email' => $email,
                'mobile_no' => $phone_no,
                'user_type' => 'C',
                'user_status' => 1,
                'name' => $company_name1,
                'user_type_io' => 'NULL',
                'profile_img' => $profile_image,
                'department' => 0,
                'designation' => 0,
                'emp_id' => 'NULL',
                'joining_date' => ''
            );
            $res2 = $this->db->insert('tbl_admin_login', $data2);

            if(!empty($_FILES['document']['name']))
            {
                $count = count($_FILES['document']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['document']['name'][$i])) {
                        $image = $_FILES['document']['name'][$i];
                        $cur_date = date("dmyHis");
                        $sepext = explode('.', strtolower($image));
                        $extension = end($sepext);
                        $store_file = $cur_date . '_' . $i . ".$extension";
                        $move_file = FCPATH . 'assets/admin/contactmanagementdocuments/';
                        $move_file1 = $move_file . basename($store_file);
                        move_uploaded_file($_FILES['document']['tmp_name'][$i], $move_file1);
                        chmod($move_file1, 0755);
                        
                        $Array = array(
                            'customer_id' => $insert_id,
                            'upload_by' => $created_by,
                            'uploadfilename' => $store_file,
                            'doc_name' => $image,
                            'date_created' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('tbl_reference_document', $Array);
                    }
                }
            }

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
    
            $response_array['contact_code'] = $contact_code_manual;
            $response_array['auto_contact_code'] = $contact_code2;

            $responce = array(
                'status'=>200,
                'msg' => 'Customer Registred Successfully.',
                'data' => $response_array
                ); 
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'Registration Failed',
                'data' => ''
                ); 
		}
    } 
    else 
    {
        $responce = array(
            'status'=>500,
            'msg' =>'Some Field are missing',
            'data' => ''
            ); 
    }
    $this->response($responce, REST_Controller::HTTP_OK); 
  }
}