<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class LeadOppSalesPersonProductwise_report extends REST_Controller 
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
        $product_id1=$this->input->post('product_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $customer_type=$this->input->post('customer_type');;

        if($product_id1!='')
        {
            $this->db->where('prd_srv_id',$product_id1);   
        }

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $query_res=$this->db->get("tbl_product_service_list")->result();
        
        foreach ($query_res as  $row) 
        {              
            $product_id=$row->prd_srv_id;
            $where_array = array('product_id' => $product_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array);   

            if($emp_id!='')
            {
                $this->db->where('assign_to',$emp_id);   
            }
            if($customer_type!='All')
                {
                $this->db->where("customer_type",$customer_type);
                } 
            $result_count=$this->db->get('tbl_leads_opportunity')->result();
            $new_array=array(
                                'product_name'=>$row->prdsrv_name, 
                                'product_id'=>$product_id,
                                'count'=>count($result_count),
                            );
            array_push($final_array,$new_array);                   
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity Sales Person Productwise Data Fetched Successfully',
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