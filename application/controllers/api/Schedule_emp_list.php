<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Schedule_emp_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
  		$emp_id=$this->input->post('emp_id');

  		$this->db->select("name,id");
		$this->db->where("user_type","E");
		$this->db->where_not_in("id",$emp_id);
		$this->db->where("user_status",1);
		$this->db->where('delete_status',0);
		$this->db->where('org_id',$org_id);
		$employee=$this->db->get("tbl_admin_login")->result();

        if($employee)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Resource List Fetched Successfully',
                'data' => $employee
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