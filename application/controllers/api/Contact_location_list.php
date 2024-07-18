<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Contact_location_list extends REST_Controller 
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
        $location_list =  $this->db->get('tbl_location')->result();
        if(!empty($location_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Location List Fetched Successfully',
                'data' => $location_list
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