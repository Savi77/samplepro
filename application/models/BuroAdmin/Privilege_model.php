<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege_model extends CI_Model
 {
    	public function __construct() 
        {
           parent::__construct();
           //echo 'Hello World2';
        }

	    public function get_list()
	    {
	    	$this->db->where("status",1);
	    	$this->db->order_by("privilege","ASC");
	    	return $this->db->get("tbl_privilege")->result();
	    }	

	    public function add_privilege($formdata)
	    {
	    	$Array=array('privilege'=>$formdata['privilege'],'privilege_key'=>$formdata['privilege_key'],'status'=>1);
	    	$this->db->insert('tbl_privilege',$Array);
	    }	

	    public function EditDetails($privilege_id)
	    {
	    	$this->db->where("privilege_id",$privilege_id);
	    	return $this->db->get("tbl_privilege")->result();
	    }	

	    public function UpdatePrivelege($formdata)
	    {
	    	$Array=array('privilege'=>$formdata['privilege'],'privilege_key'=>$formdata['privilege_key']);
	    	$this->db->where("privilege_id",$formdata['privilege_id']);
	    	$this->db->update('tbl_privilege',$Array);
	    }	

	    public function DeleteDetails($privilege_id)
	    {
	    	$Array=array('status'=>0);
	    	$this->db->where("privilege_id",$privilege_id);
	    	$this->db->update('tbl_privilege',$Array);
	    }




}