<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class TypeWiseContactsDetails_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();  
        $type_id=$this->input->post('type_id');
        $org_id=$this->input->post('org_id');
        $customer_type=$this->input->post('customer_type');
        $where_array = array('type_id'=>$type_id,'org_id'=>$org_id);
        $this->db->where($where_array);    

        if($customer_type!='')
        {
            $this->db->where("cust_type",$customer_type);
        }
        $query_res=$this->db->get('tbl_customer')->result();
        foreach ($query_res as  $row) 
        {  
                $new_array=array(
                                'company_name'=>$row->company_name, 
                                'address'=>$row->address, 
                                'mobile'=>$row->phone_no, 
                                'email'=>$row->email, 
                                'contact_person_name1'=>$row->contact_person_name1, 
                                'city'=>$row->city, 
                            );
            array_push($final_array,$new_array);                   
        }
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Type Wise Contacts Details Data Fetched Successfully',
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