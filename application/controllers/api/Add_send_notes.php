<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Add_send_notes extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    // public function index_post()
    // {
    //     $org_id=$this->input->post('org_id');
    //     $leadopp_id = $this->input->post('leadopp_id');
    //     $notes = $this->input->post('notes');
    //     $this->db->where("leadopp_id",$leadopp_id);
    //     $leads=$this->db->get("tbl_leads_opportunity_note")->row();
    //     $db_notes=$leads->notes;

    //     if($db_notes == '')
    //     {
    //         $update_notes=$notes.'\n'; 
    //     }
    //     else
    //     {
    //         $update_notes=$db_notes.$notes.'\n';
    //     }

    //     $this->db->set("notes",$update_notes);
    //     $this->db->where("leadopp_id",$leadopp_id);
    //     $leads=$this->db->update("tbl_leads_opportunity");
        
    //     if($leads)
    //     {
    //         $responce = array(
    //             'status'=>200,
    //             'msg' =>'Note Added Successfully',
    //             'data' => $leads
    //         );
    //     }
    //     else
    //     {
    //         $responce = array(
    //             'status'=>500,
    //             'msg' =>'Something Went Wrong',
    //             'data' => ''
    //         );
    //     }
    //     $this->response($responce, REST_Controller::HTTP_OK);
	// }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $leadopp_id = $this->input->post('leadopp_id');
        $notes = $this->input->post('notes');

        $add_note=array(
                        'org_id'=>$org_id,
                        'leadopp_id'=>$leadopp_id,
                        'notes'=>$notes
                      );
        $res=$this->db->Insert("tbl_leads_opportunity_note",$add_note);

      if($res)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Note Added Successfully',
                'data' => $add_note
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                'data' =>''
            );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}