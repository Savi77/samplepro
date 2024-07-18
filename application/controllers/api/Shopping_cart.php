<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Shopping_cart extends REST_Controller 
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
		$data1 = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id' AND `product_id`='$product_id'")->row();
        
		$created_date = date("Y-m-d H:i:s");
		if ($data1) 
        {
			$existing_quantity = $data1->quantity;
			$addition_quantity = $existing_quantity + 1;
			$this->db->set('quantity', $addition_quantity);
			$this->db->where('product_id', $product_id);
			$this->db->update('tbl_prdsrv_cart');

			$responce = array(
                'status'=>200,
                'msg' =>'Product Added Successfully on Cart'
                );   
		} 
        else 
        {
			$quantity = 1;
			$this->db->query("INSERT INTO `tbl_prdsrv_cart`(`user_id`, `product_id`, `quantity`, `date_created`) VALUES ('$customer_id','$product_id','$quantity','$created_date')");

			$responce = array(
                'status'=>200,
                'msg' =>'Product Added Successfully on Cart'
                ); 
		}
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}