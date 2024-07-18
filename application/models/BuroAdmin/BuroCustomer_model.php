
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class BuroCustomer_model extends CI_Model
 {
    	public function __construct() 
        {
           parent::__construct();
        }

	    public function SubscribedCustomer()
	    {
	    	$this->db->where("subscription_type",'Paid');
			$this->db->order_by("org_id", "desc");
	    	return $this->db->get("tbl_organisation")->result();
	    }	

	    public function TrialCustomer()
	    {
	    	$this->db->where("subscription_type",'Trial');
			$this->db->order_by("org_id", "desc");
	    	return $this->db->get("tbl_organisation")->result();
	    }
		
		public function AllCustomer()
	    {
	    	// $this->db->where("subscription_type",'Trial');
			$this->db->order_by("org_id", "desc");
	    	return $this->db->get("tbl_organisation")->result();
	    }

		public function UnverifiedCustomer()
		{
			$this->db->where("status !=",2);
			$this->db->order_by("id", "desc");
	    	return $this->db->get("tbl_unverifiedCustomer")->result();
		}

		public function edit_period($org_id)
		{
			// $this->db->join('tbl_plan_master', 'tbl_plan_master.plan_id = tbl_plan_subscription.plan_id');
			$data = $this->db->select('*')->from('tbl_plan_subscription')->where('org_id', $org_id)->get()->result();
			return $data;
		}

		public function UpdateEndDate($data)
		{
			$end_date1 = str_replace(',', ' ', $data['s_end']);
			$no_user = $data['no_user'];
			$sub_type = $data['sub_type'];
			if($sub_type == 'trial')
			{
				$sub_id = 5;
				$subscription_type = 'trial';
			}
			else
			{
				$sub_id = $this->db->select('plan_name_id')->from('tbl_plan_name')->where('plan_name',$sub_type)->get()->row()->plan_name_id;
				$subscription_type = 'Paid';
			}
			// $sub_id = $this->db->select('plan_name_id')->from('tbl_plan_name')->where('plan_name',$sub_type)->get()->row()->plan_name_id;
            $end_date = date("Y-m-d", strtotime($end_date1));
            $this->db->set('subscription_end_date',$end_date);
			$this->db->set('plan_id',$sub_id);
            $this->db->set('no_of_user',$no_user);
            $this->db->where('org_id',$data['org_id']);
            $this->db->update('tbl_plan_subscription');

            $this->db->set('plan_id',$sub_id);
			$this->db->set('subscription_type',$subscription_type);
            $this->db->where('org_id',$data['org_id']);
            $this->db->update('tbl_organisation');

		}



}