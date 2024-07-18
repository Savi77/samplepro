<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_notes extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $leadopp_id = $this->input->post('leadopp_id');
        $this->db->where("leadopp_id",$leadopp_id);
        $this->db->where("status",0);
        $this->db->order_by('note_id','DESC');
        $leads=$this->db->get("tbl_leads_opportunity_note")->result();

        if($leads)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note Fetched Successfully',
                'data' => $leads
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
