<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Send_Dashboard_Notes extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $emp_id = $this->input->post('emp_id');
        $notes= $this->input->post('notes');
        $InsertArray=array(  
                          'org_id'=>$org_id,
                          'emp_id'=>$emp_id,
                          'notes'=>$notes,
                          'created_date'=>date("Y-m-d H:i:s")
                        );
        $notes=$this->db->insert('tbl_notes',$InsertArray);
        if($notes)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note Added Successfully'
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
