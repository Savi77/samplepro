<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_expense_type extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id= $this->input->post('org_id');
        $this->db->select("expense_id,expense_name");
        $this->db->where("status",1);
        $this->db->where("org_id",$org_id);
        $this->db->order_by("expense_id","DESC");
        $expense=$this->db->get("tbl_expense_master")->result();

        if(!empty($expense))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Expense Type Fetched Successfully',
                'data' => $expense
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