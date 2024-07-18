<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Notification_flag_change extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $notification_id = $this->input->post('notification_id');

        $this->db->where('notification_id',$notification_id);
        $this->db->set('flag',1);
        $update_flag = $this->db->update('tbl_push_notification');

        if($update_flag)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Notification Flag Updated Successfully'
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