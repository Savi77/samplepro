<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Place_order extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
        $emp_id = $this->input->post('emp_id');
        $user_type = $this->input->post('user_type');
        $amount = $this->input->post('amount');
        $org_id = $this->input->post('org_id');

		if ($user_type == 'C') 
        {
			$cart_total = $this->db->query("SELECT sum(quantity) as quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'")->row();
			$order_by_id = $customer_id;
		} 
        else 
        {
			$cart_total = $this->db->query("SELECT sum(quantity) as quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'")->row();
			$order_by_id = $emp_id;
		}
		$prdsrv_quantity = $cart_total->quantity;
       
		if ($prdsrv_quantity > 0) 
        {
			$date = date("Y-m-d H:i:s");
			$result = $this->db->query("SELECT invoice_no FROM tbl_order ORDER BY order_id DESC LIMIT 1")->row();
			if ($result) 
            {
				$result1 = $result->invoice_no;
				$pre_date = explode('-', $result1);

				$previous_date = $pre_date[0]; // from table last date
				$ticket_no = $pre_date[1]; // from table last ticket no

				$cur_date = date("Ymd"); // current date
				if ($previous_date == $cur_date) 
                {
					$ticket_no++;
					$ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
					$final_order_num = $cur_date . '-' . $ticket_no1;
				} 
                else 
                {
					$final_order_num = $cur_date . '-' . '001';
				}
			} 
            else 
            {
				$cur_date = date("Ymd"); // current date
				$final_order_num = $cur_date . '-' . '001';
			}

			$activestatus = $this->db->query("SELECT order_status_id FROM tbl_order_status WHERE `default_active`='1'")->row();

			// ====================== Retun cart product / services ===============
			$arr = array(
				'invoice_no' => $final_order_num,
				'org_id' => $org_id,
				'customer_id' => $customer_id,
				'order_by_id' => $order_by_id,
				'quantity' => $prdsrv_quantity,
				'total' => $amount,
				'order_status_id' => $activestatus->order_status_id,
				'order_by' => $user_type,
				'payment_method' => '',
				'payment_code' => '',
				'created_date' => $date,
				'updated_date' => $date

			);

			$res = $this->db->insert('tbl_order', $arr);
			$insert_id = $this->db->insert_id();

			//======================= sending notification to customer regarding order ===============

			if ($user_type == 'C') 
            {
				$cart_result = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'");
			} 
            else 
            {
				$cart_result = $this->db->query("SELECT product_id,quantity FROM `tbl_prdsrv_cart` WHERE `user_id`='$emp_id'");
			}
			foreach ($cart_result->result() as $value) 
            {
				$product_id = $value->product_id;
				$quantity = $value->quantity;

				$product_description = $this->db->query("SELECT * FROM tbl_product_service_list WHERE `prd_srv_id`='$product_id'")->row();

				$prd_srv_id = $product_description->prd_srv_id;
				$prdsrv_name = $product_description->prdsrv_name;
				$price = $product_description->price;

				$prd_total = $price * $quantity;



				$array2 = array(

					'order_id' => $insert_id,
					'org_id' => $org_id,
					'product_id' => $product_id,
					'product_name' => $prdsrv_name,
					'quantity' => $quantity,
					'price' => $price,
					'total' => $prd_total

				);
				$this->db->insert('tbl_order_product', $array2);

				// ========================================
			}
			// ------------------------ Order History add ------------------------

			$array3 = array(

				'order_id' => $insert_id,
				'order_status_id' => $activestatus->order_status_id,
				'date_added' => $date
			);
			$this->db->insert('tbl_order_history', $array3);
			// ------------------------ / Order History add ------------------------

			// =============================delete from cart==============================

			// $this->db->where('user_id', $order_by_id);
			// $this->db->delete("tbl_prdsrv_cart");
			$this->db->where('user_id', $emp_id);
			$this->db->delete("tbl_prdsrv_cart");



			//======================= sending notification to customer regarding order ===============

			$order_result = $this->db->query("SELECT * FROM `tbl_order` WHERE `order_id`='$insert_id'")->row();
			$customer_id = $order_result->customer_id;
			$total_prd_price = number_format((float)$order_result->total, 2, '.', '');
			$cust_result = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
			
			$cust_email = $cust_result->email;
			$cust_state = $cust_result->state;
			$cust_country = $cust_result->country;

			$cust_country_name = $this->db->query("SELECT name FROM `countries` WHERE `id`='$cust_country'")->row();

			$cust_state_name = $this->db->query("SELECT name FROM `states` WHERE `id`='$cust_state'")->row();

			$order_default_status = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `default_active`='1'")->row();


            $responce = array(
                'status'=>200,
                'msg' =>'Order Placed Successfully',
                'data' => $final_order_num
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