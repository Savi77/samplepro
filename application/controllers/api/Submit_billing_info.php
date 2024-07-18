<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Submit_billing_info extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $token_id = $this->input->post('token_id');
        $employee_id = $this->input->post('employee_id');
        $billing_type = $this->input->post('billing_type');
        $billing_remark = $this->input->post('billing_remark');
        $target = $this->input->post('target');
        $price = $this->input->post('price');
        $billing_amount = $this->input->post('billing_amount');
        $org_id = $this->input->post('org_id');

        $date = date("Y-m-d");
		$token_id = $token_id;
		$employee_id = $employee_id;
		$billing_type = $billing_type;
		$billing_remark = $billing_remark;
		$target1 = trim($target, ',');
		$schools_array = explode(",", $target1);
		$target1 = sizeof($schools_array);
		$data = $this->db->query("INSERT INTO `tbl_target_achieve`(`org_id`,`employee_id`, `token_id`, `billing_type`, `billing_remark`, `price`,billing_amount,billing_status,billing_app_amount,`date_created`) VALUES ('$org_id','$employee_id','$token_id','$billing_type','$billing_remark','$price','$billing_amount','pending','0','$date')");
		$insert_id = $this->db->insert_id();

		for ($i = 0; $i < $target1; $i++) 
        {
			$target_value = $schools_array[$i];
			$var = explode('.', $target_value);
			$tr_auto_id = $var[0];
			$targettype_id = $var[1];
			$targettype_value = $var[2];
			$data1 = $this->db->query("SELECT target_id FROM tbl_target WHERE CURDATE() BETWEEN start_date AND end_date AND `targettype_id`='$targettype_id'")->row();
			$target_id = $data1->target_id;
			$data2 = $this->db->query("INSERT INTO `tbl_target_achieve_list`(`org_id`,`achieve_id`, `tr_auto_id`, `targettype_id`, `targettype_value`,employee_id,created_date) VALUES ('$org_id','$insert_id','$tr_auto_id','$targettype_id','$targettype_value','$employee_id','$date')");
		}

		if ($data) 
        {
			$responce = array(
                'status'=> 200,
                'msg' => 'Billing Submitted Successfully'
            );
		} 
        else 
        {
			$responce = array(
                'status'=> 500,
                'msg' => 'Failed to Submit',
                'data' => ''
            );
		}
    }
}