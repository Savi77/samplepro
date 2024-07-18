<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_Dashboard_Notes extends REST_Controller 
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
        $this->db->select("note_id,notes");
        $this->db->where("emp_id",$emp_id);
        $this->db->order_by('note_id','DESC');
        // $this->db->where("org_id",$org_id);
        $note=$this->db->get("tbl_notes")->result();

		if(!empty($note))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note Fetched Successfully',
                'data' => $note
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