<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Product_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
  }
  public function index_post()
  {
    $final_array = array();
    $org_id = $this->input->post('org_id');
	  $data = $this->db->query("SELECT prdsrv_name as product_name, prd_srv_id as product_id FROM `tbl_product_service_list` WHERE status='1' and org_id='$org_id' and delete_status=0   ")->result();

    $final = array('product_name'=>'All','product_id'=>'All');
    array_push($final_array,$final); 

    foreach ($data as  $row) 
    {  
        $new = array(
            'product_name' => $row->product_name,
            'product_id' =>$row->product_id
        );
        array_push($final_array,$new); 
    }

    if($final_array)
    {
        $responce = array(
            'status'=>200,
            'msg' =>'Product List Fetched Successfully',
            'data' => $final_array
            );
    }
    else
    {
        $responce = array(
            'status'=>500,
            'msg' => 'No Product is available',
            'data' => ''
            );
    }
    $this->response($responce, REST_Controller::HTTP_OK);	
  }
}