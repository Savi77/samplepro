<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Location_list_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array = array();
		$org_id = $this->input->post('org_id');
		$location_list = $this->db->query("SELECT location_id,location FROM `tbl_location` WHERE status='1' and org_id='$org_id' and delete_status=0")->result();

        $final = array('location_id'=>'All','location'=>'All');
        array_push($final_array,$final); 

        foreach ($location_list as  $row) 
        {  
            $new = array(
                'location_id' => $row->location_id,
                'location' =>$row->location
            );
            array_push($final_array,$new); 
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Location List Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data' => ''
                );
        }
		$this->response($responce, REST_Controller::HTTP_OK);
	}
}