<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Order_details extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $order_id = $this->input->post('order_id');
        $array = array('order_id' => $order_id);
		$this->db->where($array);
		$result = $this->db->get("tbl_order_product")->result();

        if($result)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Order Details Fetched Successfully',
                'data' => $result
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