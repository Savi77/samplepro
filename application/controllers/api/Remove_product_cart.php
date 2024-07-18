<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Remove_product_cart extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
		$product_id = $this->input->post('product_id');
        $org_id = $this->input->post('org_id');
		$array = array('user_id' => $customer_id, 'product_id' => $product_id);
		$this->db->where($array);
		$delete = $this->db->delete("tbl_prdsrv_cart");

        if($delete == TRUE)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Product Succesfully Removed From Cart',
                ); 
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                ); 
        }
        $this->response($responce, REST_Controller::HTTP_OK); 
    }
}