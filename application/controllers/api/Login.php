<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Login extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); 
        $fcmToken = $this->input->post('fcmToken'); 


        $result=$this->db->where('email',$username)->get('tbl_admin_login');

        if ($result->num_rows() > 0) 
        {
            $result=$result->row();
			$getpass=$result->Password;

            $emp_image = $result->profile_img;
            if ($emp_image != '') 
            {
                $profile_image = $emp_image;
            } 
            else 
            {
                $profile_image = 'dummy.png';
            }

            if ($password == $getpass) 
            {                
                $user_type = $result->user_type;
                $user_status = $result->user_status;
                if($user_type == 'E' && $user_status != 0)
                {
                    $this->db->set('android_id',$fcmToken);
                    $this->db->where('email',$username);
                    $update_andriod_id = $this->db->update('tbl_admin_login');

                    $result1=$this->db->where('email',$username)->get('tbl_admin_login')->row();


                    $contact = ['Contact',1,1];
                    $expense = ['Expense',1,5];
                    $crm = ['CRM',2,9];
                    $ecommerce = ['ecommerce',3,12];
                    $report_crm = ['report_crm',2,33];
                    $report_contact = ['report_contact',1,28];
                    $report_emp = ['report_emp',1,29];

                    $result_emp = array(
                    "id" => $result1->id,
                    "org_id" => $result1->org_id,
                    "custom_id" => $result1->custom_id,
                    "name" => $result1->name,
                    "Password" => $result1->Password,
                    "email" => $result1->email,
                    "mobile_no" => $result1->mobile_no,
                    "profile_img" => $result1->profile_img,
                    "user_type" => $result1->user_type,
                    "emp_id" => $result1->emp_id,
                    "joining_date" => $result1->joining_date,
                    "user_status" => $result1->user_status,
                    "forgot_pass" => $result1->forgot_pass,
                    "department" => $result1->department,
                    "designation" => $result1->designation,
                    "user_type_io" => $result1->user_type_io,
                    "android_id" => $result1->android_id,
                    "imei" => $result1->imei,
                    "update_permission" => $result1->update_permission,
                    "module_ids" => array($contact,$expense,$crm,$ecommerce,$report_crm,$report_contact,$report_emp),
                    "schedule_view" => $result1->schedule_view,
                    "login_status" => $result1->login_status,
                    "delete_status" => $result1->delete_status,
                    "timestamp" => $result1->timestamp,
                    );
                    $responce = array(
                        'status'=>200,
                        'msg' =>'Login successfully',
                        'data' => $result_emp
                        );
                }
                else if($user_type == 'E' && $user_status == 0)
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Sorry ! This account does not have login permission',
                        'data' => $result
                        );
                }
				else if($user_type == 'C' && $user_status != 0)
                {
                    $responce = array(
                        'status'=>200,
                        'msg' =>'Login successfully',
                        'data' => $result
                        );
                }
				else if($user_type == 'C' && $user_status == 0)
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Sorry ! This account does not have login permission',
                        'data' => $result
                        );
                }
                else
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Login Failed',
                        'data' => ''
                        );
                }
            }
            else
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>'Password does not Match',
                    'data' => ''
                    );
            }
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'User does not exist',
                'data' => ''
                );
        }

        $this->response($responce, REST_Controller::HTTP_OK);

    }
}