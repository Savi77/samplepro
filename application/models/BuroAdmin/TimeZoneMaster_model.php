<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeZoneMaster_model extends CI_Model
 {
    	public function __construct() 
        {
           parent::__construct();
           //echo 'Hello World2';
        }

	    public function get_list()
	    {
	    	$this->db->where("status",1);
	    	$this->db->order_by("country","ASC");
	    	return $this->db->get("tbl_timezone")->result();
	    }	

	    public function addDetails($formdata)
	    {
	    	$Array=array('country'=>$formdata['country'],'timezone_code'=>$formdata['timezone_code'],'status'=>1);
	    	$this->db->insert('tbl_timezone',$Array);
	    }	

	    public function EditDetails($timezone_id)
	    {
	    	$this->db->where("timezone_id",$timezone_id);
	    	return $this->db->get("tbl_timezone")->result();
	    }	

	    public function UpdateDetails($formdata)
	    {
	    	$Array=array('country'=>$formdata['country'],'timezone_code'=>$formdata['timezone_code']);
	    	$this->db->where("timezone_id",$formdata['timezone_id']);
	    	$this->db->update('tbl_timezone',$Array);
	    }	

	    public function DeleteDetails($timezone_id)
	    {
	    	$Array=array('status'=>0);
	    	$this->db->where("timezone_id",$timezone_id);
	    	$this->db->update('tbl_timezone',$Array);
	    }




}