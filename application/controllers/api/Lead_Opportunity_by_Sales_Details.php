<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_Sales_Details extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $emp_id=$this->input->post('emp_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $customer_type=$this->input->post('customer_type');
        $source = $this->input->post('source');
        

        $where_array3 = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array3);  
        if($source !='')
        {
        $this->db->where("source",$source);
        }
        if($emp_id!='default')
        {
            $this->db->where('assign_to',$emp_id);   
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
            
            if(!empty($product_data))
            {
                $prdsrv_name = $product_data->prdsrv_name;
            }
            else
            {
                $prdsrv_name = '';
            }

            $this->db->select("stage_title");
            $this->db->where("stage_id",$row->stage); 
            $stage_data=$this->db->get("tbl_stage")->row();

            if(!empty($stage_data))
            {
                $stage_title = $stage_data->stage_title;
            }
            else
            {
                $stage_title = '';
            }

            $this->db->select("source_title");
            $this->db->where("source_id",$row->source); 
            $source_data=$this->db->get("tbl_source")->row();

            if(!empty($source_data))
            {
                $source_title = $source_data->source_title;
            }
            else
            {
                $source_title = '';
            }



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
                                'prdsrv_name'=>$prdsrv_name,
                                'stage'=>$stage_title,
                                'source'=>$source_title,

                            );
            array_push($final_array,$new_array);                   
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By Sales Details Data Fetched Successfully',
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