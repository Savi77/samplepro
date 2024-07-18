<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

    public function partner_code($formdata) 
    {
        $org_id=$this->session->org_id;
    	$date=date("Y-m-d H:i:s");
    	$partner_code = $formdata['partner_code'];
    	$code_result = $this->db->query("SELECT  count(partner_id) as count FROM `tbl_partner` WHERE `code`='$partner_code'")->row();
    	$count = $code_result->count;

    	if ($count<=0) 
    	{
    		$data = $this->db->query("INSERT INTO `tbl_partner`(`org_id`,`code`, `date_created`) VALUES ('$org_id','$partner_code','$date')");
	        if ($data) 
	        {
	        	echo "1";
	        }
	        else
	        {
	        	echo "0";
	        }
    	}
    	else
    	{
    		echo "2";
    	}

        
    }

    public function code_list() 
    {
        $org_id=$this->session->org_id;
    	return $this->db->query("SELECT  * FROM `tbl_partner`  where org_id='$org_id' ");
    }
}