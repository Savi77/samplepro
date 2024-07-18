<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Cart_products extends REST_Controller 
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
		foreach ($products->result() as $row) 
        {
			$cart_total = $this->db->query("SELECT sum(quantity) as total FROM `tbl_prdsrv_cart` WHERE `user_id`='$customer_id'")->row();
			$total_quantity = $cart_total->total;
			$product_id = $row->product_id;
			$prdsrv_quantity = $row->quantity;

			$product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

			$prd_srv_id = $product_description->prd_srv_id;
			$prdsrv_name = $product_description->prdsrv_name;
			// $prd_brand = $product_description->prd_brand;
			$menu_id = $product_description->menu_id;
			$prd_specs = $product_description->prd_specs;
			$price = $product_description->price;
			$product_description1 = $product_description->prdsrv_description;
            $get_prdsrv_uom = $product_description->prdsrv_uom;

			$all_prd_price += $price * $prdsrv_quantity;

			// get UOM Type
			$prdsrv_uom = $this->db->query("SELECT uom_type FROM `tbl_uom` WHERE `uom_id`='$get_prdsrv_uom'")->row();

			$uom_type = $prdsrv_uom->uom_type;

			// Get Brand Name
			// $prdsrv_brand = $this->db->query("SELECT brand_name FROM `tbl_product_group` WHERE `id`='$prd_brand'")->row();

			// $brand_name=$prdsrv_brand->brand_name; 

			$category = $this->db->query("SELECT interest FROM `tbl_categories` WHERE `id`='$menu_id'")->row();

			$interest = $category->interest;

			// ======================product multiple images===============
			$prduct_multiple_images_single = $this->db->query("SELECT image FROM `tbl_prdsrv_img` WHERE `prd_srv_id`='$prd_srv_id'")->row();
			if(empty($prduct_multiple_images_single))
			{
				$single_image = '';
			}
			else
			{
				$single_image = $prduct_multiple_images_single->image;
			}


			// ====================== Retun cart product / services ===============
			$arr = array(
				'prd_srv_id' => $prd_srv_id,
				'prdsrv_name' => $prdsrv_name,
				// 'prd_brand' => $brand_name,
				'prd_brand' => $interest,
				'all_prd_price' => $all_prd_price,
				'price' => $price,
				// 'product_description' => $product_description1,
				// 'uom_type' => $uom_type,
				'single_image' => $single_image,
				'product_quantity' => $prdsrv_quantity,
				'cart_quantity' => $total_quantity

			);
			array_push($product_array, $arr);
		}
		// print_r($product_array);
		if(!empty($product_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Cart Product Fetched Successfully',
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