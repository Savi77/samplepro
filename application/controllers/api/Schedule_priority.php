<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Schedule_priority extends REST_Controller 
{
  function __construct()
  {
    parent::__construct();
  }
  public function index_post()
  {
    $finalArray=array();
    $priorityarray1["priority_name"] = 'Normal';  
    $priorityarray2["priority_name"] = 'High';  
    $priorityarray3["priority_name"] = 'Low'; 
    array_push($finalArray, $priorityarray1);
    array_push($finalArray, $priorityarray2);
    array_push($finalArray, $priorityarray3);

    if(!empty($finalArray))
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Schedule Priority List Fetched Successfully',
            'data' => $finalArray
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