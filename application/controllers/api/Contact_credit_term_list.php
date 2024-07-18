<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Contact_credit_term_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
    {
        $org_id = $this->input->post('org_id');

		$this->db->where('org_id',$org_id);
        $credit_term_list =  $this->db->get('tbl_credit_term')->result();
        if(!empty($credit_term_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Credit Term List Fetched Successfully',
                'data' => $credit_term_list
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