<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Schedule_type_name extends REST_Controller 
{
  function __construct()
  {
    parent::__construct();
  }
  public function index_post()
  {
    $org_id = $this->input->post('org_id');
    $type_name_list = $this->db->query("SELECT type_name, id FROM `tbl_schedule_type_name` WHERE status='1' and org_id='$org_id' and delete_status=0 ORDER BY type_name asc ")->result();
    
    if(!empty($type_name_list))
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Schedule Type Name List Fetched Successfully',
            'data' => $type_name_list
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