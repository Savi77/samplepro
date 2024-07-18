<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_customer extends REST_Controller 
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
        
        $data = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'  ");
		$update_array = array();
		foreach ($data->result() as $value) 
        {
			$type_id = $value->type_id;
			if ($type_id != 0) 
            {
				$data1 = $this->db->query("SELECT title FROM `tbl_type` WHERE `type_id`='$type_id'")->row();
				$type_title = $data1->title;
			} 
            else 
            {
				$type_title = 'NA';
			}

			$business_id = $value->business_id;
			if ($business_id != 0) 
            {
				$business_array_name = $this->db->query("SELECT business_name, business_id FROM `tbl_business` where `business_id` IN($business_id)");
				$area3 = "";
				foreach ($business_array_name->result() as $multiple_business) 
                {
					$area3 = $area3 . $multiple_business->business_name . ",";
				}

				$business_name = trim($area3, ',');
			} 
            else 
            {
				$business_name = 'NA';
			}

			$location_id = $value->location_id;
			if ($location_id != 0) 
            {
				$data3 = $this->db->query("SELECT location FROM `tbl_location` WHERE `location_id`='$location_id'")->row();
				$location = $data3->location;
			} 
            else 
            {
				$location = 'NA';
			}


			$group_id = $value->group_id;
			if ($group_id != 0) 
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

			if ($value->company_anniversary != 0) 
            {
				$company_anniversary = date("d M Y", strtotime($value->company_anniversary));
			} 
            else 
            {
				$company_anniversary = 'NA';
			}


			if ($value->marriage_anniversary != 0) 
            {

				$marriage_anniversary = date("d M Y", strtotime($value->marriage_anniversary));
			} 
            else 
            {
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
        if($update_array)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Customer Fetched Successfully',
                'data' => $update_array
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