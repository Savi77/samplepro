<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_State_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
    {
        $country_id = $this->input->post('country_id');
		$state_list = $this->db->query("SELECT id,name FROM `states` WHERE country_id = $country_id ORDER BY id ASC")->result();
        if(!empty($state_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'State List Fetched Successfully',
                'data' => $state_list
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