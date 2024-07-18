
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseHead_model extends CI_Model
 {
	public function __construct() 
	{
	  parent::__construct();
	}

	public function GetList()
	{
		      $this->db->where("delete_status",0);
      return $this->db->get("tbl_expense_head")->result();
    }

	public function InsertData($inserarray)
	{
       $this->db->Insert("tbl_expense_head",$inserarray);
    }

	public function DeleteData($head_id)
	{	
	    $this->db->where("head_id",$head_id);
	    $this->db->set("delete_status",1);
	 	$this->db->update("tbl_expense_head");
    }

	public function EditData($head_id)
	{	
		$this->db->where("head_id",$head_id);
		return $this->db->get("tbl_expense_head")->result();
    }

	public function UpdateData($updatearray,$head_id)
	{	
		$this->db->where("head_id",$head_id);
		$this->db->Update("tbl_expense_head",$updatearray);
    }




  }


