<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Edit_expense extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $ID = $this->input->post('ID'); 
        $Details=array(
                    'Amount'=>$this->input->post('Amount'),
                    'SDate'=>date("Y-m-d",strtotime($this->input->post('SDate'))),
                    'EDate'=>date("Y-m-d",strtotime($this->input->post('EDate'))),
                    'Remark'=>$this->input->post('Remark'),
                    'Filename'=>$this->input->post('Filename'),
                    'Document'=>$this->input->post('Document')
                );
        $this->db->where("ID",$ID);
        $res=$this->db->Update("tbl_expense_details",$Details);
        $REFID=$this->input->post('REFID');
        $title=$this->input->post('title');
        $this->db->set("ExpenseTitle",$title);
        $this->db->where("REFID",$REFID);
        $this->db->Update("tbl_employee_expense");

        if($res)
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Edit Successfully'
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong'
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}