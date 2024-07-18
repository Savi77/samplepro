<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Contact_reference_by_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
    {
        $org_id = $this->input->post('org_id');

        $this->db->select('customer_id as id,company_name as name');
        $this->db->where('org_id', $org_id);
        $this->db->where('delete_status', 0);
        $this->db->where('parent_id', 0);
        $this->db->where('cust_type', 'primary');
        $this->db->order_by('company_name', 'ASC');
        $reference_by_list =  $this->db->get('tbl_customer')->result();
        if(!empty($reference_by_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Reference By List Fetched Successfully',
                'data' => $reference_by_list
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