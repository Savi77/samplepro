<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Lead_Opportunity_by_Stage_Details extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $emp_id=$this->input->post('emp_id');
        $stage_id=$this->input->post('stage_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        

        if($emp_id!='')
        {
            $this->db->where('assign_to',$emp_id);   
        }
        $where_array3 = array('stage' => $stage_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
        $this->db->where($where_array3);       

        $query_res=$this->db->get('tbl_leads_opportunity')->result();
        foreach ($query_res as  $row) 
        {  
            $this->db->select("quotation_id");      
            $this->db->where("leadopp_id",$row->leadopp_id); 
            $this->db->order_by("quotation_id","DESC");           
            $quotation=$this->db->get('tbl_lead_quotation')->row(); 

            if(!empty($quotation->quotation_id))
            {
                $quotation_id=$quotation->quotation_id;
                $quotation_res=$this->db->query("  SELECT sum(`total`) as amount FROM `tbl_quotation_details` WHERE `quotation_id`='$quotation_id'  ")->row();                      
                $quotation_amount=$quotation_res->amount;

                if(empty($quotation_amount))
                {
                    $quotation_amount="NA";
                }
            } 
            else
            {
                $quotation_amount="NA";
            }  

            $this->db->select("stage_title");
            $this->db->where("stage_id",$row->stage); 
            $stage_data=$this->db->get("tbl_stage")->row();

            $this->db->select("source_title");
            $this->db->where("source_id",$row->source); 
            $source_data=$this->db->get("tbl_source")->row();


            $this->db->select("name");
            $this->db->where("id",$row->assign_to); 
            $admin_data=$this->db->get("tbl_admin_login")->row();

            $this->db->select("prdsrv_name");
            $this->db->where("prd_srv_id",$row->product_id); 
            $product_data=$this->db->get("tbl_product_service_list")->row();
            if(!empty($product_data))
            {
                $product_name = $product_data->prdsrv_name;
            }
            else
            {
                $product_name = '';
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
                                'prdsrv_name'=>$product_name,
                                'quotation_amount'=>$quotation_amount, 
                                'stage'=>$stage_data->stage_title,
                                'source'=>$source_data->source_title,
                            );
            array_push($final_array,$new_array); 
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity By Stage Details Data Fetched Successfully',
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