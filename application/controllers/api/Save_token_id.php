<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Save_token_id extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $user_id = $this->input->post('user_id');
        $user_type = $this->input->post('user_type');
        $token_id = $this->input->post('token_id');
        $org_id = $this->input->post('org_id');
		if ($user_type == 'C') 
        {
			$this->db->set('android_id', $token_id);
			$this->db->where('customer_id', $user_id);
			$update = $this->db->update('tbl_customer');
		} 
        else 
        {
			$this->db->set('android_id', $token_id);
			$this->db->where('id', $user_id);
			$update = $this->db->update('tbl_admin_login');
		}

        if($update == TRUE)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Token Update Successfully'
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}
