<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class UserPermission extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $user_id = $this->input->post('user_id');
        $module_id = $this->input->post('module_id');
        $feature_id = $this->input->post('feature_id');
        $where_array=array('user_id'=>$user_id,'module_id'=>$module_id,'feature_id'=>$feature_id);

        $this->db->select("priviledge_id,priviledge_key,status");
        $this->db->where($where_array);
        $data =$this->db->get("tbl_module_permission")->result(); 

        if($data)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Module Permission Fetched Successfully',
                'data' => $data
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