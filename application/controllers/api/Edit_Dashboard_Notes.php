<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Edit_Dashboard_Notes extends REST_Controller 
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
        $this->db->where("note_id",$note_id);
        $update_array =array('notes'=>$notes);
        $update = $this->db->update("tbl_notes",$update_array);

        if($update)
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
                'msg' =>'Something Went Wrong',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}