<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_SalesPerson extends REST_Controller 
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
        $source=$this->input->post('source');
        $customer_type=$this->input->post('customer_type');

        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));

        $this->db->where("user_status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);

        if($emp_id!='')
        {
            $this->db->where("id",$emp_id);
        }
        $query_res=$this->db->get("tbl_admin_login")->result();
        
        foreach ($query_res as  $result) 
        {              
            $name=$result->name;
            $assign_to=$result->id;
            
            $where_array3 = array('assign_to' => $assign_to, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_array3);
            if($source !='')
                {
                $this->db->where("source",$source);
                }
            if($customer_type!='All')
                {
                $this->db->where("customer_type",$customer_type);
                } 
            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();
            $new_array=array(
                                'emp_name'=>$result->name, 
                                'emp_id'=>$assign_to, 
                                'total'=>count($leads_opportunity_total)
                            );
            array_push($final_array,$new_array);                   
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By SalesPerson Statuswise Data Fetched Successfully',
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