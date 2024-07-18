<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Users_details extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id = $this->input->post('org_id');
        $user_type = $this->input->post('user_type');
        $user_id = $this->input->post('user_id');
		if ($user_type == 'E') 
        {
			$image_data = $this->db->query("SELECT tbl_admin_login.profile_img,tbl_designation.designation_name,tbl_department.department_name FROM tbl_admin_login JOIN tbl_designation ON tbl_admin_login.designation = tbl_designation.deg_id JOIN tbl_department ON tbl_admin_login.department = tbl_department.dep_id WHERE `id`='$user_id'")->row();
			$this->db->where("org_id", $org_id);
			$res_data = $this->db->get("tbl_organisation")->row();
			
			$emp_image = $image_data->profile_img;
			if($image_data->designation_name != '' && $image_data->department_name)
            {
				$user_pos = $image_data->designation_name .' (' .$image_data->department_name . ')' ;
			}
            else
            {
				$user_pos = '';
			}
			
			if ($emp_image != '') 
            {
				$profile_image = $emp_image;
			} 
            else 
            {
				$profile_image = 'dummy.png';
			}
			$array = array(
				'profile_img' => $profile_image,
				'user_position' => $user_pos,
				'user_company' => $res_data->org_cname
			);
		}
        else if($user_type == 'C') 
        {
            $this->db->select("company_name");
			$this->db->where("customer_id", $user_id);
			$res_data = $this->db->get("tbl_customer")->row();
			$profile_image = 'dummy.png';
			$array = array(
				'profile_img' => $profile_image,
				'user_position' => "Customer",
				'user_company' => $res_data->company_name
            );
        }
        else 
        {
			$array = array(
				'profile_img' => '',
				'user_position' => '',
				'user_company' => ''
            );
		}

        if(!empty($array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'User Profile Fetched Successfully',
                'data' => $array
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