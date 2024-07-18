
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Specification extends CI_Controller
 {
  	public function __construct() 
     {
       parent::__construct();
       $this->load->model('Specification_model');
     }

	public function index()
	{
		if(isset($this->session->user_id))
		{
		   $data['listarray']=$this->Specification_model->GetList();
		   $this->load->view('SpecificationView',$data);
		}
		else
		{
		   redirect('Login');
		}
	} 

	public function InsertData()
	{   
        $inserarray=array(
							'spec_name'=>$_REQUEST['spec_name'],
							'date_created'=>date("Y-m-d H:i:s")
					    );
        $this->Specification_model->InsertData($inserarray);
	}

	public function DeleteData()
	{
	   $id=$_REQUEST['id'];
	   $this->Specification_model->DeleteData($id);
	}

	public function EditData()
	{
		$id=$_REQUEST['id'];
		$data['EditData']=$this->Specification_model->EditData($id);
		$this->load->view('EditSpecification',$data);
	}

	public function UpdateData()
	{
	   $id =$_REQUEST['id'];
       $updatearray=array('spec_name'=>$_REQUEST['spec_name']);
					    
       $this->Specification_model->UpdateData($updatearray,$id);
	}


}
