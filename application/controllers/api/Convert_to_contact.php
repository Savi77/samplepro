<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Convert_to_contact extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();

  }
  public function index_post()
  {
    $leadopp_id = $this->input->post('leadopp_id');
    $company_name = $this->input->post('company_name');
    $email = $this->input->post('email');
    $phone_no = $this->input->post('phone_no');
    $contact_person_name1 = $this->input->post('contact_person_name1');
    $address = $this->input->post('address');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $country = $this->input->post('country');
    $pincode = $this->input->post('pincode');
    $created_by = $this->input->post('created_by');
    $org_id= $this->input->post('org_id');
    $password = 'buro123';

    $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
    if($check_code2->auto_contact_code != '')
    {
        $code2 = $check_code2->auto_contact_code; 
        $contact_code2 = (int)$code2 + 1;
    }
    else
    {
        $contact_code2 = '1000000';
    }

    $add_array=array(
        'company_name'=>$company_name,
        'contact_person_name1'=>$contact_person_name1,
        'phone_no'=>$phone_no,
        'email'=>$email,
        'address'=>$address,
        'leadopp_id'=>$leadopp_id,
        'country'=>$country,
        'state'=>$state,
        'city'=>$city,
        'pincode'=>$pincode,
        'org_id'=>$org_id,
        'auto_contact_code'=> $contact_code2,
        'cust_type'=> 'T'
      );
    $data = $this->db->insert('tbl_customer', $add_array);
    $insert_id = $this->db->insert_id();

    // $this->db->where("leadopp_id",$leadopp_id);
    // $data=$this->db->Update("tbl_customer",$UpdateArray);     
    if($data)
    {
      $query = $this->db->query(" SELECT * FROM `tbl_customer` WHERE `customer_id`='$insert_id'")->row();

			$user_email = $query->email;
			$profile_image = 'dummy.png';
      $data2 = array(
          'custom_id' => $insert_id,
          'org_id' => $org_id,
          'Password' => $password,
          'email' => $email,
          'mobile_no' => $phone_no,
          'user_type' => 'C',
          'user_status' => 1,
          'name' => $company_name,
          'user_type_io' => 'NULL',
          'profile_img' => $profile_image,
          'department' => 0,
          'designation' => 0,
          'emp_id' => 'NULL',
          'joining_date' => ''
      );
      $res2 = $this->db->insert('tbl_admin_login', $data2);

      $this->db->set("is_converted",1);
      $this->db->where("leadopp_id",$leadopp_id);
      $leads=$this->db->update("tbl_leads_opportunity");

      $responce = array(
          'status'=>200,
          'msg' =>'Contact Converted Successfully'
          );
        
    } 
    else
    {
      $responce = array(
          'status'=>500,
          'msg' =>'Failed to convert'
          );
    }
    $this->response($responce, REST_Controller::HTTP_OK);
  }
}