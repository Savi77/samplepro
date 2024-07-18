<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Transfer_leads extends REST_Controller 
{
	function __construct()
	{
    parent::__construct();
  }
  public function index_post()
  {
    $leadopp_id = $this->input->post('leadopp_id');
    $assign_to = $this->input->post('assign_to');
    $created_by = $this->input->post('created_by');
    $org_id = $this->input->post('org_id');

    $update_array = array(
        'assign_to' => $assign_to,
        'assign_datetime' => date("Y-m-d H:i:s")
    );
    $this->db->where("leadopp_id", $leadopp_id);
    $data = $this->db->update('tbl_leads_opportunity', $update_array);
    $data1 = $this->db->affected_rows($data);

    if ($data1) 
    {
        $this->db->where('leadopp_id ', $leadopp_id);
        $row = $this->db->get('tbl_leads_opportunity')->row();
        $history_add_array = array(
            'leadopp_id' => $leadopp_id,
            'created_by' => $row->created_by,
            'company_name' => $row->company_name,
            'contact_person_name1' => $row->contact_person_name1,
            'phone_no' => $row->phone_no,
            'email' => $row->email,
            'address' => $row->address,
            'source' => $row->source,
            'stage' => $row->stage,
            'assign_to' => $assign_to,
            'assign_datetime' => date("Y-m-d H:i:s"),
            'product_id' => $row->product_id,
            'project_business_value' => $row->project_business_value,
            'city' => '',
            'tag' => $row->tag,
            'business_id' => $row->business_id,
            'location' => $row->location,
            'group_id' => $row->group_id,
            'closure_date' => $row->closure_date,
            'remarks' => $row->remarks,
            'customer_type' => $row->customer_type,
            'is_converted' => 0,
            'created_date' => date("Y-m-d H:i:s")
        );

        $this->db->insert("tbl_lead_history", $history_add_array);
        
        $responce = array(
            'status'=>200,
            'msg' =>'Lead-Opportunity Transfered Successfully'
            );
        
    } 
    else 
    {
        $responce = array(
            'status'=>500,
            'msg' =>'Failed To Transfer'
            );
    }
    $this->response($responce, REST_Controller::HTTP_OK);
  }
}