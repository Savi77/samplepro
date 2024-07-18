<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Cart_sum_counter extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
        $org_id = $this->input->post('org_id');
		$products = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'");
		$product_array = array();
		$all_prd_price = 0;
        if(!empty($products->result()))
        {
            foreach ($products->result() as $row) 
            {
                $cart_total = $this->db->query("SELECT sum(quantity) as total FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'")->row();
                $total_quantity = $cart_total->total;
                $product_id = $row->product_id;
                $prdsrv_quantity = $row->quantity;

                $product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

                $price = $product_description->price;

                $all_prd_price += $price * $prdsrv_quantity;
            }
            $product_array = array(
                'all_prd_price' => $all_prd_price,
                'cart_quantity' => $total_quantity

            );
            $responce = array(
                'status'=>200,
                'msg' =>'Cart Sum Count Fetch Successfully',
                'data' => $product_array
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