<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Source_details extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $final_array = array();
        $org_id = $this->input->post('org_id');
		$this->db->select('source_id, source_title');
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);
		$this->db->where('status', 1);

		$data = $this->db->get('tbl_source')->result();

        $final = array('source_id'=>'All','source_title'=>'All');
        array_push($final_array,$final); 
        
        foreach ($data as  $row) 
        {  
            $new = array(
                'source_id' => $row->source_id,
                'source_title' =>$row->source_title
            );
            array_push($final_array,$new); 
        }

        if ($final_array) 
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Source Details Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' => 'No Source Details is available',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}