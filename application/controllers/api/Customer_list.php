<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Customer_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
		// $customer_list = $this->db->query("SELECT contact_person_name1,phone_no,company_name,customer_id,email,address,cust_type FROM `tbl_customer` WHERE type='P'  and org_id='$org_id' and delete_status=0   ORDER BY customer_id DESC")->result();
        $customer_list = $this->db->query("SELECT contact_person_name1,phone_no,company_name,customer_id,email,address,cust_type FROM `tbl_customer` WHERE  org_id='$org_id' and delete_status=0   ORDER BY customer_id DESC")->result();
        if(!empty($customer_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Customer List Fetched Successfully',
                'data' => $customer_list
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