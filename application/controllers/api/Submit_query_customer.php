<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Submit_query_customer extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $query = $this->input->post('query');
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $customer_id = $this->input->post('customer_id');
        $org_id = $this->input->post('org_id');
        $assign_date = date("Y-m-d");
        if ($query != '' && $product_id != '' && $customer_id != '') 
        {
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($string) - 1;
            $token = '';
            for ($i = 0; $i < 6; $i++) 
            {
                $token .= $string[mt_rand(0, $max)];
            }
            $salt = $token;
            $result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
            if ($result) 
            {
                $result1 = $result->ticket_no;
                $pre_date = explode('-', $result1);

                $previous_date = $pre_date[0]; // from table last date
                $ticket_no = $pre_date[1]; // from table last ticket no

                $cur_date = date("Ymd"); // current date
                if ($previous_date == $cur_date) 
                {
                    $ticket_no++;
                    $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                    $final_ticket_num = $cur_date . '-' . $ticket_no1;
                } 
                else 
                {
                    $final_ticket_num = $cur_date . '-' . '001';
                }
            } 
            else 
            {
                $cur_date = date("Ymd"); // current date
                $final_ticket_num = $cur_date . '-' . '001';
            }

            $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`,`assign_date`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$assign_date')");
            if ($data) 
            {
                $responce = array(
                    'status'=>200,
                    // 'msg' =>'Query/Issues Added Successfully'
                    'msg' =>'Task Assigned Successfully'
                    );
            } 
            else 
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>'Failed to assign'
                    );
            }
        } 
        else 
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Failed to assign'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}