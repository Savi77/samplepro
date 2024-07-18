<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Emplist_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $this->db->select("id,name");
        $this->db->where("user_status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->where("user_type",'E');
        $final_array=$this->db->get("tbl_admin_login")->result();
        $PushArray = ['id'=>"default", 'name'=>"Select All"];
        array_unshift($final_array, $PushArray);

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Employee List Fetched Successfully',
                'data' => $final_array
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