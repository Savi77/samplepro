<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_Segment extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $emp_id=$this->input->post('emp_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $customer_type=$this->input->post('customer_type');
        $business_id=$this->input->post('business_id');

        if($business_id!='')
        {
            if($business_id == 'All')
            {

            }
            else
            {
                $this->db->where("business_id",$business_id);
            }
        }
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_business")->result();

        foreach ($query_res as  $result) 
        {              
            $business_id=$result->business_id;  
            $where_array = array('assign_to' => $emp_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array); 
            $this->db->where("find_in_set($business_id, business_id)");     
            if($customer_type!='All')
            {
            $this->db->where("customer_type",$customer_type);
            }                   
            $result_count=$this->db->get('tbl_leads_opportunity')->result();
            $new_array=array(
                                'business_name'=>$result->business_name, 
                                'business_id'=>$result->business_id,
                                'count'=>count($result_count)
                            );
            array_push($final_array,$new_array);                   
        }
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By Segment Data Fetched Successfully',
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
