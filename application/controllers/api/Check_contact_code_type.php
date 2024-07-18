<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Check_contact_code_type extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();
    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
        $contact_type = $this->db->select('contact_code_id')->from('tbl_organisation')->where('org_id', $org_id)->get()->row()->contact_code_id;
        if(!empty($contact_type))
        {
            if($contact_type == 1)
            {
                $flag = 'Yes';
                $responce = array(
                    'status'=>200,
                    'msg' =>'Contact Code Field Need To Show',
                    'data' => $flag
                    );
            }
            else
            {
                $flag = 'No';
                $responce = array(
                    'status'=>200,
                    'msg' =>'Contact Code Field Not Need To Show',
                    'data' => $flag
                    );
            }
        }
        else
        {
            $flag = 'No';
            $responce = array(
                'status'=>200,
                'msg' =>'Contact Code Field Not Need To Show',
                'data' => $flag
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);

	}
}