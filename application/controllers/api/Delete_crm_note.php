<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Delete_crm_note extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
	{
        $note_id = $this->input->post('note_id');
    
        $update_array =array('status'=>1);
        $this->db->where('note_id',$note_id);
        $delete_note = $this->db->update('tbl_leads_opportunity_note',$update_array);

        if($delete_note)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note deleted Successfully'
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