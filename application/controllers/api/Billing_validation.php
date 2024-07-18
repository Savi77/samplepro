<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Billing_validation extends REST_Controller 
{
	function __construct()
	{
    parent::__construct();
  }
  public function index_post()
  {
    $token_id = $this->input->post('token_id');
    $employee_id = $this->input->post('employee_id');
    $user_type = $this->input->post('user_type');
    $org_id = $this->input->post('org_id');

    if ($user_type == 'E') 
    {
        $data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
    } 
    else 
    {
        $data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id' ")->row();
    }

    $bill_count = $data->count;
    $billing = array();
    if ($bill_count > 0) 
    {
        if ($user_type == 'E') 
        {
            $data1 = $this->db->query("SELECT achieve_id,billing_type,billing_remark,billing_amount,billing_status,billing_app_amount FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
        } 
        else 
        {
            $data1 = $this->db->query("SELECT achieve_id,billing_type,billing_remark,billing_status,billing_app_amount FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
        }
        $achieve_id = $data1->achieve_id;
        $billing_type = $data1->billing_type;

        $data = array(
            'billing_remark' => $data1->billing_remark,
            'billing_type' => $data1->billing_type,
            'billing_amount' => $data1->billing_amount,
            'billing_status' => $data1->billing_status,
            'billing_app_amount' => $data1->billing_app_amount
        );
        $responce = array(
            'status'=> 200,
            'msg' => 'Billing details fetch successfully',
            'data' => $data
        );
    } 
    else 
    {
        $responce = array(
            'status'=> 500,
            'msg' => 'Not generated',
            'data' => ''
        );
    }
    $this->response($responce, REST_Controller::HTTP_OK);
  }
}