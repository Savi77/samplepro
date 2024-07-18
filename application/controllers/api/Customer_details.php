<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Customer_details extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
        $org_id = $this->input->post('org_id');
		$this->db->select('*');
		$this->db->where('org_id', $org_id);
		$this->db->where('customer_id', $customer_id);
		$data = $this->db->get('tbl_customer')->row();
        // echo "<pre>";
		// print_r($data);
		// die;
	

		if ($data) 
        {
			$type_id = $data->type_id;
			if ($type_id != 0) 
            {
				$this->db->select('type_id, title');
				$this->db->where('type_id', $type_id);
				$type_data = $this->db->get('tbl_type')->row();

				$type_id1 = $type_data->type_id;
				$type_title1 = $type_data->title;
			} 
            else 
            {
				$type_id1 = "NA";
				$type_title1 = "NA";
			}

			$business_id = $data->business_id;
            $arr_bus = (explode(",",$business_id));

			if ($business_id != 0) 
            {
				$this->db->select('business_id, business_name');
				$this->db->where_in('business_id', $arr_bus);
				$business_data = $this->db->get('tbl_business')->result();

				$business_id2 = array();
				$business_name2 =array();
                foreach($business_data as $buss)
				{
					$business_id2[] = $buss->business_id;
					$business_name2[] = $buss->business_name;
				}
				$business_id1 = (implode(",",$business_id2));
				$business_name1 = (implode(",",$business_name2));
			} 
            else 
            {
				$business_id1 = "NA";
				$business_name1 = "NA";
			}

			$location_id = $data->location_id;

			if ($location_id != 0) 
            {
				$this->db->select('location_id, location');
				$this->db->where('location_id', $location_id);
				$location_data = $this->db->get('tbl_location')->row();

				$location_id1 = $location_data->location_id;
				$location1 = $location_data->location;
			} 
            else 
            {
				$location_id1 = "NA";
				$location1 = "NA";
			}

			$group_id = $data->group_id;

			if ($group_id != 0) 
            {
				$this->db->select('group_id, group_name');
				$this->db->where('group_id', $group_id);
				$group_data = $this->db->get('tbl_group')->row();

				$group_id1 = $group_data->group_id;
				$group_name1 = $group_data->group_name;
			} 
            else 
            {
				$group_id1 = "NA";
				$group_name1 = "NA";
			}



			$state = $data->state;
            if(!empty($state))
			{
				$this->db->select('id, name');
				$this->db->where('id', $state);
				$state_data = $this->db->get('states')->row();
				$state_data_id = $state_data->id;
				$state_data_name = $state_data->name;
			}
			else
			{
				$state_data_id = '';
				$state_data_name = '';
			}
			

			$country = $data->country;
            if(!empty($country))
			{
				$this->db->select('id, name');
				$this->db->where('id', $country);
				$country_data = $this->db->get('countries')->row();
				$country_data_id = $country_data->id;
				$country_data_name = $country_data->name;

			}
			else
			{
				$country_data_id = '';
				$country_data_name = '';
			}

			$credit_term = $data->credit_term;
			if(!empty($credit_term) || $credit_term != 0)
			{
				$this->db->select('credit_id, credit_name');
				$this->db->where('credit_id', $credit_term);
				$credit_term_data = $this->db->get('tbl_credit_term')->row();
				$credit_id = $credit_term_data->credit_id;
				$credit_name = $credit_term_data->credit_name;

			}
			else
			{
				$credit_id= '';
				$credit_name = '';
			}

			$account_manager = $data->account_manager;
            $arr_account = (explode(",",$account_manager));

			if(!empty($account_manager) || $account_manager != 0) 
            {
				$this->db->select('id,name');
				$this->db->where_in('id', $arr_account);
				$account_manager_data = $this->db->get('tbl_admin_login')->result();

				$acc_id2 = array();
				$acc_name2 =array();
                foreach($account_manager_data as $acc)
				{
					$acc_id2[] = $acc->id;
					$acc_name2[] = $acc->name;
				}
				$account_manager_id = (implode(",",$acc_id2));
				$account_manager_name = (implode(",",$acc_name2));
			} 
			else
			{
				$account_manager_id= '';
				$account_manager_name = '';
			}

			$refered_by = $data->reference_id;
			if(!empty($refered_by) || $refered_by != 0)
			{
				$refered_by_id= $data->reference_id;
				$refered_by_name = $data->reference_name;
			}
			else
			{
				$refered_by_id= '';
				$refered_by_name = '';
			}
			$final_array = array();

			$doc_details = $this->db->select('doc_id,uploadfilename,doc_name')->from('tbl_reference_document')->where('customer_id', $data->customer_id)->get()->result();
			if(!empty($doc_details)) 
            {
				$doc_id2 = array();
				$doc_upload_name2 = array();
				$doc_name2 = array();

                foreach($doc_details as $doc)
				{
					$doc_id2[] = $doc->doc_id;
					$doc_upload_name2[] = $doc->uploadfilename;
					$doc_name2[] = $doc->doc_name;

				}
				$doc_id2 = (implode(",",$doc_id2));
				$doc_upload_name2 = (implode(",",$doc_upload_name2));
				$doc_name2 = (implode(",",$doc_name2));
			} 
			else
			{
				$doc_id2 = "";
				$doc_upload_name2 = "";
				$doc_name2 = "";
			}

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

				'state_id' => $state_data_id,
				'state_name' => $state_data_name,

				'country_id' => $country_data_id,
				'country_title' => $country_data_name,
				'pincode' => $data->pincode,

				'credit_id' => $credit_id,
				'credit_name' => $credit_name,

				'account_manager_id' => $account_manager_id,
				'account_manager_name' => $account_manager_name,

				'refered_by_id' => $refered_by_id,
				'refered_by_name' => $refered_by_name,
	            'note' => $data->notes,
				'doc_id2' => $doc_id2,
				'doc_upload_name' => $doc_upload_name2,
				'doc_name' => $doc_name2,
			);

			array_push($final_array, $result_array);
            
            $responce = array(
                'status'=>200,
                'msg' =>'User Profile Fetched Successfully',
                'data' => $final_array
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
        $this->response($responce, REST_Controller::HTTP_OK);

	}
}