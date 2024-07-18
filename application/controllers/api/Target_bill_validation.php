<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Target_bill_validation extends REST_Controller 
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

        if ($user_type == 'Employee') 
        {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
		} 
        else 
        {
			$data = $this->db->query("SELECT count(achieve_id) as count FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
		}

		$bill_count = $data->count;
		$billing = array();
		if ($bill_count > 0) 
        {
			if ($user_type == 'E') 
            {
				$data1 = $this->db->query("SELECT achieve_id,billing_type FROM tbl_target_achieve WHERE `employee_id`='$employee_id' AND `token_id`='$token_id'")->row();
			} 
            else 
            {
				$data1 = $this->db->query("SELECT achieve_id,billing_type FROM tbl_target_achieve WHERE `token_id`='$token_id'")->row();
			}
			$achieve_id = $data1->achieve_id;
			$billing_type = $data1->billing_type;
			$data2 = $this->db->query("SELECT targettype_id,targettype_value,adm_approved_price FROM `tbl_target_achieve_list` WHERE `achieve_id`='$achieve_id'");
			$target_array = array();
			foreach ($data2->result() as $value) 
            {
				$targettype_id = $value->targettype_id;
				$data3 = $this->db->query("SELECT `target_type` FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
				$arr = array(
					'target_type' => $data3->target_type,
					'target_value' => $value->targettype_value,
					'admin_approved_price' => $value->adm_approved_price
				);
				array_push($target_array, $arr);
			}
			$responce = array(
                'status'=> 200,
                'msg' => 'Target Billing Details Fetched Successfully',
                'data' => $target_array
            );
		} 
        else 
        {
			$responce = array(
                'status'=> 500,
                'msg' => 'Something Went Wrong',
                'data' => ''
            );
		}
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}