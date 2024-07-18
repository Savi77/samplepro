<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Primary_customer_list extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
		$primary_customer_list = $this->db->query("SELECT customer_id, TRIM(`company_name`) as company_name FROM `tbl_customer` WHERE parent_id='0' AND `cust_type`='primary' and type='P' and  org_id='$org_id' and delete_status=0 ORDER BY company_name ASC")->result();

        if(!empty($primary_customer_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Primary Customer List Fetched Successfully',
                'data' => $primary_customer_list
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data' => ''
                );
        }
		$this->response($responce, REST_Controller::HTTP_OK);
    }
}