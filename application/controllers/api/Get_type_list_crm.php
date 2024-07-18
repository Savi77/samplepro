<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_type_list_crm extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
  }
  public function index_post()
  {
    $type = array("product", "service", "all");
    $typeid = array("1", "2", "3");
    $count = count($type);
    $type_array = array();
    for ($i = 0; $i < $count; $i++) {
        $type_name = $type[$i];
        $type_id = $typeid[$i];
        $array = array(
            'type_name' => $type_name,
            'type_id' => $type_id
        );
        array_push($type_array, $array);
    }
    if(!empty($type_array))
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Type Fetched Successfully',
            'data' => $type_array
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