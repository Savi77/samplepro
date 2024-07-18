<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Quotation_list extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $FinalArray=array();
        $org_id=$this->input->post('org_id');
        $leadopp_id = $this->input->post('leadopp_id'); 

        // $this->db->where("leadopp_id",$leadopp_id);
        // $companyname 

        $this->db->where("leadopp_id",$leadopp_id);
        $this->db->order_by("quotation_id",'DESC');
        $quotation_array=$this->db->get('tbl_lead_quotation')->result();
        

        $this->db->where("leadopp_id",$leadopp_id);
        $lead_id=$this->db->get('tbl_leads_opportunity')->row()->lead_generate_id;

        if(count($quotation_array)>0)
        {
            foreach ($quotation_array as  $value) 
            {
                $this->db->where("quotation_id",$value->quotation_id);
                $price_array=$this->db->get('tbl_quotation_details')->result();
               
                $amount= 0;
                foreach ($price_array as $price)
                {
                    $amount += $price->subtotal;
                }
               
                $newarray=array(
                                'quotation_id'=>$value->quotation_id,
                                'quotation_no'=>$value->quotation_number,
                                'quotation_date'=>date("d M Y",strtotime($value->quotation_date)),
                                'contact_person'=>$value->contact_person,
                                'contact_no'=>$value->contact_number,
                                'email'=>$value->email,
                                'valid_till'=>date("d M Y",strtotime($value->valid_till)),
                                'quotation_status'=>ucfirst($value->quotation_status),
                                'leadOppNumber' =>$lead_id,
                                'amount' => $amount
                                );
                array_push($FinalArray, $newarray);
            }
        }
        if(!empty($FinalArray))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Quotation List Fetched Successfully',
                'data' => $FinalArray
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