<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies_Model extends CI_Model {

	public function __construct() 
    {
    	parent::__construct();
 	}

 	public function PrivacyPolicyData()
 	{
		$this->db->where('policies_type','Privacy_Policy');
		return $this->db->get('tbl_policies')->row();
	}
	public function TermsofServiceData()
	{
		$this->db->where('policies_type','Terms_Service');
		return $this->db->get('tbl_policies')->row();
	}
	public function RefundCancellationPolicyData()
	{
		$this->db->where('policies_type','Refund_Cancellation');
		return $this->db->get('tbl_policies')->row();
	}
	public function Add_Policies($data)
	{
		if ($this->db->insert('tbl_policies',$data)) {
			echo 1;
		}else {
			echo 0;
		}
	} 
	public function Update_Policies($data,$policies_id)
	{
		$this->db->where('policies_id',$policies_id);
		if ($this->db->update('tbl_policies',$data)) {
			echo 1;
		}else {
			echo 0;
		}
	}
}
?>