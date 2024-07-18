
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseHead extends CI_Controller
 {

  	public function __construct() 
     {
       parent::__construct();
       $this->load->model('ExpenseHead_model');
     }

	public function index()
	{
		if(isset($this->session->user_id))
		{
		   $data['listarray']=$this->ExpenseHead_model->GetList();
		   $this->load->view('ExpenseHeadView',$data);
		}
		else
		{
		   redirect('Login');
		}
	} 

	public function InsertData()
	{   
       $inserarray=$this->input->post();
       $this->ExpenseHead_model->InsertData($inserarray);
	}

	public function DeleteData()
	{
	   $head_id=$_REQUEST['head_id'];
	   $this->ExpenseHead_model->DeleteData($head_id);
	}

	public function EditData()
	{
		$head_id=$_REQUEST['head_id'];
		$data['EditData']=$this->ExpenseHead_model->EditData($head_id);
		$this->load->view('EditExpenseHeadView',$data);
	}

	public function UpdateData()
	{
	   $head_id=$_REQUEST['head_id'];
       $updatearray=$this->input->post();
       $this->ExpenseHead_model->UpdateData($updatearray,$head_id);
	}



}
