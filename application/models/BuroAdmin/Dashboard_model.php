<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
 {
 	 private $country_code;
	
 	 function __construct()
	  {
	     parent::__construct(); // construct the Model class
	     $this->load->database();
         $this->country_code = array("country_code"=>$this->session->country_code);	  
        // global $country_code;
	  }

	  public function summary()
	  {

		$res1=$this->db->query(" SELECT count(`org_id`) as  totalcount FROM `tbl_organisation`  ")->row();
		$totalcount= $res1->totalcount;	

		$res2=$this->db->query(" SELECT count(`org_id`) as paidcount FROM `tbl_organisation` WHERE `subscription_type`='Paid' ")->row();
		$paidcount= $res2->paidcount;

		$res3=$this->db->query("  SELECT count(`org_id`) as trialcount FROM `tbl_organisation` WHERE `subscription_type`='Trial' ")->row();
		$trialcount= $res3->trialcount;

		$res4=$this->db->query("  SELECT count(`email`) as unverifiedcount FROM `tbl_unverifiedCustomer` WHERE `status`!='2' ")->row();
		$unverifiedcount= $res4->unverifiedcount;

		$arrayName = array(
							'totalcount' => $totalcount,
			                'paidcount' =>$paidcount,
			                'trialcount' =>$trialcount,
							'unverifiedcount' => $unverifiedcount
			           	  );
		//print_r($arrayName);
		return $arrayName;
	  }
	public function GeofenceNotification()
	{
		$date_created=date("Y-m-d");
		return $this->db->query("
						SELECT  tbl_customer.company_name,tbl_admin_login.name,tbl_admin_login.profile_img,tbl_user_geofence_notification.*
						FROM  `tbl_user_geofence_notification` 
						INNER JOIN tbl_customer
						ON tbl_user_geofence_notification.customer_id=tbl_customer.customer_id
						INNER JOIN tbl_admin_login
						ON tbl_user_geofence_notification.user_id=tbl_admin_login.id
						WHERE DATE(date_created)='$date_created' 
					")->result();
	}	

	public function get_profile_array()
	{
		$this->db->where("id", $this->session->id);
		return $this->db->get("tbl_admin_login")->row();
	}
	public function get_emailsetting_array()
	{
		$this->db->where("emp_id", $this->session->id);
		return $this->db->get("tbl_org_email_configuration")->row();
	}
	public function web_logo()
	{
		$this->db->where("emp_id", $this->session->id);
		return $this->db->get("tbl_web_logo")->row();
	}
}  