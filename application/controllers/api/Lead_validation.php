<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_validation extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();

    }
    public function index_post()
    {
        $mobileno = $this->input->post('mobileno');
		$email = $this->input->post('email');
		$customer_id = $this->input->post('customer_id');
        $org_id = $this->input->post('org_id');

		$query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' AND `email`='$email' and  customer_id NOT IN('$customer_id') ")->row();
		if ($query) 
        {
            $responce = array(
                'status'=>500,
                'msg' =>'User is already registered.'
                );
		} 
        else 
        {
			$query1 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `phone_no`='$mobileno' and  customer_id NOT IN('$customer_id') ")->row();
			if ($query1) 
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>'Mobile number is already registered.'
                    );
				
			} 
            else 
            {
				$query2 = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `email`='$email' and  customer_id NOT IN('$customer_id')  ")->row();
				if ($query2) 
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Email is already registered.'
                        );
				} 
                else 
                {
					$responce = array(
                        'status'=>200,
                        'msg' =>'New User Registered Successfully'
                        );
				}
			}
		}
        $this->response($responce, REST_Controller::HTTP_OK);
    }
  }