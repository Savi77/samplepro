<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Business_segment_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $final_array = array();
        $org_id = $this->input->post('org_id');
		$this->db->select('business_id,business_name');
		$this->db->where('org_id', $org_id);
		$this->db->where('delete_status', 0);
		$this->db->where('status', 1);
		$data = $this->db->get('tbl_business')->result();

        $final = array('business_id'=>'All','business_name'=>'All');
        array_push($final_array,$final); 

        foreach ($data as  $row) 
        {  
            $new = array(
                'business_id' => $row->business_id,
                'business_name' =>$row->business_name
            );
            array_push($final_array,$new); 
        }

		if ($final_array) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Business Segment List Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' => 'No Business Segment is available',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}