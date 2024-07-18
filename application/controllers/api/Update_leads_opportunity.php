<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Update_leads_opportunity extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();

    }
    public function index_post()
    {
        $stage = $this->input->post('stage');
		$leadopp_id = $this->input->post('leadopp_id');
        $org_id = $this->input->post('org_id');

		$this->db->where('leadopp_id', $leadopp_id);
		$this->db->set('stage', $stage);
		$data = $this->db->update('tbl_leads_opportunity');
		$data1 = $this->db->affected_rows($data);

		if ($data1) 
        {
			$responce = array(
                'status'=>200,
                'msg' =>'Stage Updated Successfully'
                );
		} 
        else 
        {
			$responce = array(
                'status'=>500,
                'msg' =>'Fail to update'
                );
		}
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}