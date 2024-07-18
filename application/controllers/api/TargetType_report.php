<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class TargetType_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array = array();
        $org_id=$this->input->post('org_id');
        $this->db->select("target_type,targettype_id");
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->order_by("target_type",'ASC');
        $data=$this->db->get("tbl_target_type")->result();

        $final = array('target_type'=>'All','targettype_id'=>'All');
        array_push($final_array,$final); 

        foreach ($data as  $row) 
        {  
            $new = array(
                'target_type' => $row->target_type,
                'targettype_id' =>$row->targettype_id
            );
            array_push($final_array,$new); 
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Target Type Fetched Successfully',
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