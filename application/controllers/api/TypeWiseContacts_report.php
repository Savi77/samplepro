<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class TypeWiseContacts_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        // $start_date=date("Y-m-d",strtotime($_REQUEST['start_date']));
        // $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
        $type_id=$this->input->post('type_id');
        $customer_type=$this->input->post('customer_type');
        if($type_id!='')
        {
            if($type_id == 'All')
            {

            }
            else
            {
                $this->db->where("type_id",$type_id);
            }
        }
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_type")->result();
        foreach ($query_res as  $result) 
        {                          
            $type_id=$result->type_id;
            if($customer_type!='')
            {
                $this->db->where("cust_type",$customer_type);
            }
            $where_array = array('type_id'=>$type_id);
            $this->db->where($where_array);   
            $cust_query=$this->db->get("tbl_customer")->result();               
            $new_array=array(
                            'title'=>$result->title, 
                            'type_id'=>$result->type_id, 
                            'total'=>count($cust_query)
                            );
            array_push($final_array,$new_array);                   
        }
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Type Wise Contacts Data Fetched Successfully',
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