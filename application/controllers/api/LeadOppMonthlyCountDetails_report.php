<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class LeadOppMonthlyCountDetails_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $pass_date=$this->input->post('pass_date');
        $emp_id=$this->input->post('emp_id');
        $customer_type=$this->input->post('customer_type');

        $month=date("m",strtotime($pass_date));
        $year=date("Y",strtotime($pass_date));

        $where_array3 = array('org_id' => $org_id,'MONTH(created_date)' => $month,'YEAR(created_date)' => $year);
        $this->db->where($where_array3);  
        
        if($emp_id!='')
        {
            $this->db->where("assign_to",$emp_id);
        }

        if($customer_type!='All')
        {
            $this->db->where("customer_type",$customer_type);
        }


        $query_res=$this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) 
        {  
            $this->db->select("name");
            $this->db->where("id",$row->assign_to); 
            $admin_data=$this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id",$row->product_id); 
            $product_data=$this->db->get("tbl_product_service_list")->row();

            $this->db->select("stage_title");
            $this->db->where("stage_id",$row->stage); 
            $stage_data=$this->db->get("tbl_stage")->row();

            $this->db->select("source_title");
            $this->db->where("source_id",$row->source); 
            $source_data=$this->db->get("tbl_source")->row();

            $new_array=array(
                                'company'=>$row->company_name, 
                                'contactperson'=>$row->contact_person_name1, 
                                'mobile'=>$row->phone_no, 
                                'email'=>$row->email, 
                                'address'=>$row->address, 
                                'leadopp_id'=>$row->leadopp_id, 
                                'lead_generate_id'=>$row->lead_generate_id,
                                'closure_date'=>date("d F, Y",strtotime($row->closure_date)), 
                                'project_business_value'=>$row->project_business_value,
                                'assign_to'=>$admin_data->name, 
                                'prdsrv_name'=>$product_data->prdsrv_name,
                                'quotation_amount'=>$quotation_amount, 
                                'stage'=>$stage_data->stage_title,
                                'source'=>$source_data->source_title,
                            );
        }
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity Monthly Count Details Data Fetched Successfully',
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