<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Update_customer extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
        $company_id = $this->input->post('company_id');
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
        $edited_by = $this->input->post('edited_by');
        $org_id = $this->input->post('org_id');
		$contact_code_manual = $this->input->post('contact_code');
		$pincode = $this->input->post('pincode');
		$account_manager = $this->input->post('account_manager'); 
		$refered_by =  $this->input->post('refered_by'); 
		$credit_term = $this->input->post('credit_term'); 
		$note = $this->input->post('note'); 

		$date = date("Y-m-d H:i:s");
		$dob1 = date("Y-m-d", strtotime($dob));

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


        // $account_manager_get = $account_manager;
        // $account_manager_id = "";
        // for ($i = 0; $i < count($account_manager_get); $i++) 
		// {
        //     $account_manager_id = $account_manager_id . $account_manager_get[$i] . ",";
        // }
        // $account_id1 = trim($account_manager_id, ',');
        // if (empty($account_id1)) 
		// {
        //     $account_id1 = '';
        // } 
		// else {
        //     $account_id1 = $account_id1;
        // }
		$account_id1 = rtrim($account_manager, ',');

		$business_segment_id1 = rtrim($business_segment_id, ',');
		
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
			'contact_code' => $contact_code_manual,
			'pincode' => $pincode,
			'account_manager' => $account_id1,
			'reference_id' => $reference_id,
			'reference_name' => $reference_name,
			'credit_term' => $credit_term,
			'notes' => $note
		);

		$data = $this->db->update('tbl_customer', $data1);

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
						'customer_id' => $customer_id,
						'upload_by' => $created_by,
						'uploadfilename' => $store_file,
						'doc_name' => $image,
						'date_created' => date('Y-m-d H:i:s')
					);
					$this->db->insert('tbl_reference_document', $Array);
				}
			}
		}
		if ($data) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Customer Updated Successfully'
                );
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'Fail to Update',
                'data' => ''
                );
		}
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}