<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Company_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
		$this->db->select('customer_id, company_name');
		$this->db->where('delete_status', 0);
		$this->db->where('org_id', $org_id);
		$data = $this->db->get('tbl_customer')->result();

        if ($data) 
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Company List Fetch Successfully',
                'data' => $data
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' => 'No Company is available',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}