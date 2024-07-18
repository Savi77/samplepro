<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Add_leads_opportunity extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();

    }
    public function index_post()
    {
        $leadopp_id = $this->input->post('leadopp_id');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->input->post('company_id');
        $company_name = $this->input->post('company_name');
        $contact_person_name1 = $this->input->post('contact_person_name1');
        $phone_no = $this->input->post('phone_no');
        $email = $this->input->post('email');
        $sources = $this->input->post('sources');
        $stage = $this->input->post('stage');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $business_value = $this->input->post('business_value');
        $location = $this->input->post('location');
        $business_segment_id = $this->input->post('business_segment_id');
        $group_id = $this->input->post('group_id');
        $closure_date = $this->input->post('closure_date');
        $remarks = $this->input->post('remarks');
        $customer_type = $this->input->post('customer_type');
        $product_id = $this->input->post('product_id');  
        $org_id = $this->input->post('org_id');  

        if ($customer_type == 'Lead') 
        {
			$is_converted = 0;
		} 
        else 
        {
			$is_converted = 2;
		}
		$created_date = date("Y-m-d H:i:s");
		$cur_date = date("Ymd");
		if ($customer_type == 'Lead')
        {
			$Prefix = "L-" . $cur_date . '-';
		} 
        else 
        {
			$Prefix = "O-" . $cur_date . '-';
		}

		$this->db->select('lead_generate_id');
		$this->db->order_by('leadopp_id', 'DESC');
		$result = $this->db->get('tbl_leads_opportunity')->row();
		if (!empty($result->lead_generate_id)) 
        {
			$pre_date = explode('-', $result->lead_generate_id);
			$previous_date = $pre_date[1]; // from table last date
			$ticket_no = $pre_date[2]; // from table last ticket no

			if ($previous_date == $cur_date) 
            {
				$ticket_no++;
				$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
				// $final_ticket_num = $cur_date.'-'.$ticket_no1;
				$lead_generate_id = $Prefix . $ticket_no1;
			} 
            else 
            {
				$lead_generate_id = $Prefix . '001';
			}
		} 
        else 
        {
			$lead_generate_id = $Prefix . '001';
		}

		if (!empty($closure_date)) 
        {
			$closure_date_1 = str_replace(',', ' ', $closure_date);
			$closure_date1 = date("Y-m-d", strtotime($closure_date_1));
		} 
        else 
        {
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

			if ($customer_type == 'Lead') 
            {
				// $InsertCustomerArray = array(
				// 	'created_by' => $employee_id,
				// 	'parent_id' => 0,
				// 	'type_id' => 0,
				// 	'business_id' => 0,
				// 	'org_id' => $org_id,
				// 	'location_id' => 0,
				// 	'group_id' => 0,
				// 	'company_name' => $company_name,
				// 	'contact_person_name1' => $contact_person_name1,
				// 	'alternate_email' => '',
				// 	'phone_no' => $phone_no,
				// 	'alternate_number' => '',
				// 	'landline_number' => '',
				// 	'email' => $email,
				// 	'address' => $address,
				// 	'city' => '',
				// 	'state' => 0,
				// 	'country' => 101,
				// 	'password' => 'buro@123',
				// 	'dob' => '1970-01-01',
				// 	'company_anniversary' => '',
				// 	'marriage_anniversary ' => '',
				// 	'android_id ' => '',
				// 	'imei' => '',
				// 	'cust_type' => 'primary',
				// 	'leadopp_id' => $leadopp_id2,
				// 	'type' => 'T',
				// 	'delete_status' => 0,
				// 	'auto_contact_code' => $contact_code2,
				// 	'created_date' => $created_date
				// );
				// $this->db->insert("tbl_customer", $InsertCustomerArray);
				// $company_id = $this->db->insert_id();
				// $this->db->SET('company_id', $company_id);
				// $this->db->where('leadopp_id', $leadopp_id2);
				// $this->db->update('tbl_leads_opportunity');
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
            else 
            {
				// $InsertCustomerArray = array(
				// 	'created_by' => $employee_id,
				// 	'parent_id' => 0,
				// 	'type_id' => 0,
				// 	'business_id' => 0,
				// 	'org_id' => $org_id,
				// 	'location_id' => 0,
				// 	'group_id' => 0,
				// 	'company_name' => $company_name,
				// 	'contact_person_name1' => $contact_person_name1,
				// 	'alternate_email' => '',
				// 	'phone_no' => $phone_no,
				// 	'alternate_number' => '',
				// 	'landline_number' => '',
				// 	'email' => $email,
				// 	'address' => $address,
				// 	'city' => '',
				// 	'state' => 0,
				// 	'country' => 101,
				// 	'password' => 'buro@123',
				// 	'dob' => '1970-01-01',
				// 	'company_anniversary' => '',
				// 	'marriage_anniversary ' => '',
				// 	'android_id ' => '',
				// 	'imei' => '',
				// 	'cust_type' => 'primary',
				// 	'leadopp_id' => $leadopp_id2,
				// 	'type' => 'T',
				// 	'delete_status' => 0,
				// 	'auto_contact_code' => $contact_code2,
				// 	'created_date' => $created_date
				// );
				// $this->db->insert("tbl_customer", $InsertCustomerArray);
				// $company_id = $this->db->insert_id();
				// $this->db->SET('company_id', $company_id);
				// $this->db->where('leadopp_id', $leadopp_id2);
				// $this->db->update('tbl_leads_opportunity');

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
		} 
        else 
        {
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
		if ($data) 
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead-Oppertunity Added Successfully'
                );
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'No data'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}