<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Edit_crm_note extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
	{
        $note_id = $this->input->post('note_id');
        $notes = $this->input->post('notes');

        $update_array =array('notes'=>$notes);
        $this->db->where('note_id',$note_id);
        $update_note = $this->db->update('tbl_leads_opportunity_note',$update_array);

        if($update_note)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note Updated Successfully'
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