<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Get_group_brand_list_crm extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
		$org_id = $this->input->post('org_id');

		$data = $this->db->query("SELECT id, interest FROM tbl_categories WHERE `status`='1' and org_id='$org_id'  ");
		$category_list = array();
		foreach ($data->result() as $value) {
			$array = array(
				'category_name' => $value->interest,
				'category_id' => $value->id
			);
			array_push($category_list, $array);
		}
        if(!empty($category_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Group/Branch Fetched Successfully',
                'data' => $category_list
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