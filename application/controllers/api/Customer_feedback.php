<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Customer_feedback extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $cust_id = $this->input->post('cust_id');
		$feedback = $this->input->post('feedback');
        $org_id = $this->input->post('org_id');
		$InsertArray = array('org_id' => $org_id, 'cust_id' => $cust_id, 'feedback' => $feedback, 'created_date' => date("Y-m-d H:i:s"));
		$insert = $this->db->insert("tbl_cust_feedback", $InsertArray);
		if ($insert) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Feedback Sent Successfully'
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}