<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Contact_account_manager_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
    {
        $org_id = $this->input->post('org_id');

		$this->db->where('delete_status', 0);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        $this->db->where('org_id', $org_id);
        $account_manager_list =  $this->db->get('tbl_admin_login')->result();
        if(!empty($account_manager_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Account Manager List Fetched Successfully',
                'data' => $account_manager_list
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