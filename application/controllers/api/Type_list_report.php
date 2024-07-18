<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Type_list_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array = array();
        $org_id = $this->input->post('org_id');
		$type_list = $this->db->query("SELECT type_id,title FROM `tbl_type` WHERE status='1'   and org_id='$org_id' and delete_status=0 ")->result();

        $final = array('type_id'=>'All','title'=>'All');
        array_push($final_array,$final); 

        foreach ($type_list as  $row) 
        {  
            $new = array(
                'type_id' => $row->type_id,
                'title' =>$row->title
            );
            array_push($final_array,$new); 
        }
		
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Type List Fetched Successfully',
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