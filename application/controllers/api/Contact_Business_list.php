<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Contact_Business_list extends REST_Controller 
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
        $this->db->where('delete_status', 0);
        $this->db->where('status', 1);
        $business_list =  $this->db->get('tbl_business')->result();
        if(!empty($business_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Business List Fetched Successfully',
                'data' => $business_list
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