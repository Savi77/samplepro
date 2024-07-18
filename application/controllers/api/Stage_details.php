<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Stage_details extends REST_Controller 
{
	function __construct()
	{
  parent::__construct();
  }
  public function index_post()
  {
    $final_array = array();
    $org_id = $this->input->post('org_id');
    $this->db->select('stage_id, stage_title');
    $this->db->where('status', 1);
    $this->db->where('org_id', $org_id);
    $this->db->where('delete_status', 0);

    $data = $this->db->get('tbl_stage')->result();

    $final = array('stage_id'=>'All','stage_title'=>'All');
        array_push($final_array,$final); 
        
        foreach ($data as  $row) 
        {  
            $new = array(
                'stage_id' => $row->stage_id,
                'stage_title' =>$row->stage_title
            );
            array_push($final_array,$new); 
        }
    
    if ($final_array) 
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Stage Details Fetched Successfully',
            'data' => $final_array
            );
    }
    else
    {
        $responce = array(
            'status'=>500,
            'msg' => 'No Stage Details is available',
            'data' => ''
            );
    }
    $this->response($responce, REST_Controller::HTTP_OK);
  }
}