<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Decrement_product_count extends REST_Controller 
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
		$quantity = $data1->quantity;
		$decrement_quantity = $quantity - 1;
		$this->db->set('quantity', $decrement_quantity);
		$dec_array = array('user_id' => $customer_id, 'product_id' => $product_id);
		$this->db->where($dec_array);
		$data = $this->db->update('tbl_prdsrv_cart');

		$data1 = $this->db->affected_rows($data) > 0;
		if ($data1) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Decrement Value By One'
                ); 

			$data1 = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id' AND `product_id`='$product_id'")->row();
			$quantity = $data1->quantity;
			if ($quantity <= 0) 
            {
				$where = array('user_id' => $customer_id, 'product_id' => $product_id);
				$this->db->where($where);
				$this->db->delete("tbl_prdsrv_cart");
			}
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'Failed To Decrement'
                ); 
		}
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}