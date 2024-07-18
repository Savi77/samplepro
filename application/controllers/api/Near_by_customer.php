<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Near_by_customer extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
	    $emp_id = $this->input->post('emp_id');

        $final_array = array();
		$this->db->select('address2,g_lat,g_long');
		$this->db->where('org_id', $org_id);
		$this->db->where('account_manager', $emp_id);
		$this->db->where('type ', 'P');
		$this->db->where('g_lat!=','');
		$this->db->where('g_long!=','');
		$customerData = $this->db->get('tbl_customer')->result_array();
		if (!empty($customerData)) 
        {
			foreach ($customerData as $cust) 
            {
				$data = array(
					'google_address' => $cust['address2'],
					'google_lat' => $cust['g_lat'],
					'google_long' => $cust['g_long'],
				);
				array_push($final_array, $data);
			}
			$responce = array(
                'status'=>200,
                'msg' =>'Near By Customer Fetched Successfully',
                'data' => $final_array
                );
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data' => ''
                );
        }
            $this->response($responce, REST_Controller::HTTP_OK);
    }
}