<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Order_history extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $customer_id = $this->input->post('customer_id');
		$user_type = $this->input->post('user_type');
        $org_id = $this->input->post('org_id');

		if ($user_type == 'C') 
        {
			$data = $this->db->query("SELECT order_id,created_date,order_by_id,customer_id,quantity,total,order_by FROM `tbl_order` WHERE `customer_id`='$customer_id' ORDER BY order_id desc");
		} 
        else 
        {
			$data = $this->db->query("SELECT order_id,created_date,order_by_id,customer_id,quantity,total,order_by FROM `tbl_order` WHERE `order_by_id`='$customer_id' ORDER BY order_id desc");
		}
		// print_r($data->result());
		$final_array = array();
        if(!empty($data->result()))
        {
            foreach ($data->result() as $value) 
            {
                // echo "1";
                $order_id = $value->order_id;
                $created_date = $value->created_date;
                $order_by_id = $value->order_by_id;
                $customer_id = $value->customer_id;
                $quantity = $value->quantity;
                $order_total = $value->total;
                $order_by = $value->order_by;

                if ($order_by == 'Employee' || $order_by == 'E') // Product Order order by Employee
                {
                    if ($user_type == 'E') // Application login by employee
                    {
                        $cust_res = $this->db->query("SELECT `company_name` FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                        $company_name = $cust_res->company_name;
                        $emp_name = 'self';
                    } 
                    else 
                    {
                        $emp_res = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$order_by_id'")->row();
                        $emp_name = $emp_res->name;
                        $company_name = 'self';
                    }
                } 
                else 
                {
                    // $emp_res = $this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id`='$customer_id'")->row();
                    $emp_name = 'self';
                    $company_name = 'self';
                }

                $order_date = date("F d, Y", strtotime($value->created_date));
                $data2 = $this->db->query("SELECT sum(total) as total, count(`order_product_id`) as count FROM `tbl_order_product` WHERE `order_id`='$order_id'")->row();
                // $total = $data2->total;
                $total = number_format((float)$data2->total, 2, '.', '');
                $count = $data2->count;

                $data4 = $this->db->query("SELECT order_status_id FROM `tbl_order_history` WHERE `order_id`='$order_id' ORDER BY order_history_id DESC LIMIT 1")->row();
                $order_status_id = $data4->order_status_id;

                $data4 = $this->db->query("SELECT name FROM `tbl_order_status` WHERE `order_status_id`='$order_status_id' ")->row();
                $status_name = $data4->name;

                $array = array(
                    'company_name' => $company_name,
                    'order_id' => $order_id,
                    'order_status' => $status_name,
                    'order_date' => $order_date,
                    'order_count' => $quantity,
                    'employee_name' => $emp_name,
                    'order_price' => $order_total
                );
                array_push($final_array, $array);
            }

            $responce = array(
                'status'=>200,
                'msg' =>'Order History Fetched Successfully',
                'data' => $final_array
                );   
        }
        else
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Something Went wrong',
                'data' => ''
                ); 
        }
		$this->response($responce, REST_Controller::HTTP_OK);

    }
}