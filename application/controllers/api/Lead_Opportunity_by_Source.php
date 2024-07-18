<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_Source extends REST_Controller 
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
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        if($source!='')
        {
            if($source == 'All')
            {

            }
            else
            {
                $this->db->where("source_id",$source);
            }
        }
        $query_res=$this->db->get("tbl_source")->result();
        
        foreach ($query_res as  $result) 
        {         
            $source_id=$result->source_id;
            //--------------------------------------------------------------------------------------------------------------
            $where_total = array('source' => $source_id, 'assign_to' => $emp_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
            $this->db->where($where_total);

            if($customer_type!='All')
            {
            $this->db->where("customer_type",$customer_type);
            }                
            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();
            $total_final=count($leads_opportunity_total);

            //--------------------------------------------------------------------------------------------------------------
            
            $where_array2 = array('source' => $source_id, 'assign_to' => $emp_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array2);
            if($source!='')
            {
            $this->db->where("source",$source);
            }
            $leads_opportunity_close=$this->db->get("tbl_leads_opportunity")->result();
            $no_of_close=count($leads_opportunity_close);

            //---------------------------------------------------------------------------------------------------------------
            
            // if($no_of_close==0)
            // {
            //     $ratio=0;
            // }
            // else
            // {
            //     $ratio=$no_of_close*100/$total_final;
            // }

            // $ratio=$no_of_close*100/$total_final;
            // $TotalRevenue=0;
            // foreach ($leads_opportunity_total as $row) 
            // {
            //     $TotalRevenue=$TotalRevenue+$row->project_business_value;
            // }
            
            // if($total_final==0)
            // {
            //     $avg_revenue=0;
            // }
            // else
            // {
            // $avg_revenue=$TotalRevenue/$total_final;
            // $avg_revenue=number_format((float)$avg_revenue, 2, '.', ''); 
            // }   

            // if(is_nan($ratio))
            // {
            // $ratio=0;
            // }
            
            $new_array=array(
                                'source'=>$result->source_title, 
                                'source_id'=>$result->source_id, 
                                'total'=>$total_final, 
                                'no_of_close'=>$no_of_close, 
                                // 'ratio'=>$ratio, 
                                // 'total_revenue'=>$TotalRevenue, 
                                // 'avg_revenue'=>$avg_revenue,
                            );
            array_push($final_array,$new_array);                   
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By Source Data Fetched Successfully',
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