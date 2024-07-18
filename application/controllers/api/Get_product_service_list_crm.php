<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_product_service_list_crm extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $user_id = $this->input->post('user_id');
        $category_id = $this->input->post('category_id');
        $type_name = $this->input->post('type_name');

        if ($type_name == 'all') 
        {
			$data = $this->db->query("SELECT prd_srv_id,prdsrv_name,prdsrv_description,image,price FROM `tbl_product_service_list` WHERE `menu_id`='$category_id' AND `status`='1'")->result();
		} 
        else 
        {
			$data = $this->db->query("SELECT prd_srv_id,prdsrv_name,prdsrv_description,image,price FROM `tbl_product_service_list` WHERE `menu_id`='$category_id' AND `prdsrv_type`='$type_name' AND `status`='1'")->result();
		}
		// print_r($data);
		$final_array = array();
		foreach ($data as $value) 
        {
			$product_id = $value->prd_srv_id;
			$cart_total = $this->db->query("SELECT quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'")->row();
			// $cart_quantity = $cart_total->quantity;
			if ($cart_total != '') 
            {
				$cart_product_quantity = $cart_total->quantity;
			} 
            else 
            {
				$cart_product_quantity = '0';
			}


			$prdsrv_array = array(
				'product_id' => $value->prd_srv_id,
				'product_name' => $value->prdsrv_name,
				'product_description' => $value->prdsrv_description,
				'image' => $value->image,
				'price' => $value->price,
				'quantity' => '100',
				'cart_quantity' => $cart_product_quantity
			);
			array_push($final_array, $prdsrv_array);
		}
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Product Service List Fetched Successfully',
                'data' => $final_array
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