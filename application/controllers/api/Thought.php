<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Thought extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $date = date("Y-m-d",strtotime($this->input->post('date')));

        $this->db->where('org_id',$org_id);
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $thought = $this->db->get("tbl_thoughts")->row();

        $this->db->where('date',$date);
        $this->db->where('org_id',$org_id);
        $check_exist = $this->db->get("tbl_thoughts_daywise")->result();

        if(count($check_exist) > 0)
        {
            $this->db->where('date',$date);
            $this->db->where('org_id',$org_id);
            $this->db->order_by('rand()');
	        $this->db->limit(1);
            $final = $this->db->get("tbl_thoughts_daywise")->row();
        }
        else
        {
            $data = array(
                "org_id" => $org_id,
                "thought_id" => $thought->thought_id,
                "thought" => $thought->thought,
                "date" => $date,
                "created_date" => date('Y-m-d')
            );
            $insert_data = $this->db->insert('tbl_thoughts_daywise',$data);

            if($insert_data == 1)
            {
                $this->db->where('date',$date);
                $this->db->where('org_id',$org_id);
                $this->db->order_by('rand()');
                $this->db->limit(1);
                $final = $this->db->get("tbl_thoughts_daywise")->row();
            }
        }


        if(!empty($final))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Today Thought Fetched Successfully',
                'data' => $final
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}