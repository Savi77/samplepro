<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_Stage extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $stage=$this->input->post('stage');
        $emp_id=$this->input->post('emp_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $customer_type=$this->input->post('customer_type');

        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        if($stage!='')
        {
            if($stage == 'All')
            {

            }
            else
            {
                $this->db->where("stage_id",$stage);
            }
        }
        $query_res=$this->db->get("tbl_stage")->result();

        foreach ($query_res as  $result) 
        {                          
            $where_array3 = array('stage' => $result->stage_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
            $this->db->where($where_array3);

            if($emp_id!='')
                {
                $this->db->where("assign_to",$emp_id);
                }
            if($customer_type!='All')
                {
                $this->db->where("customer_type",$customer_type);
                }                 
            $leads_opportunity_total=$this->db->get("tbl_leads_opportunity")->result();               
            $new_array=array(
                                'stage_title'=>$result->stage_title, 
                                'stage_id'=>$result->stage_id, 
                                'total'=>count($leads_opportunity_total)
                            );
            array_push($final_array,$new_array);                   
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By Stage Data Fetched Successfully',
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
