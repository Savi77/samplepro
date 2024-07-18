
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model 
{

	public function __construct() 
   {
     parent::__construct();
   }

   public function get_product_data()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_product_service_list');
        return $this->db->get()->result();
    }

   public function SubmitFeedback($formdata)
    {
        // print_r($formdata);
        $InsertArray=array(
                             'org_id'=>$this->session->org_id,
                             'cust_id'=>$this->session->org_id,
                             'feedback'=>$formdata['inner_page_desc'],
                             'type'=>$formdata['service_type'],
                             'product'=>$formdata['prd_service'],
                             'created_date'=>date('Y-m-d H:i:s')
                           );
        $this->db->insert('tbl_cust_feedback',$InsertArray);  
    }





}