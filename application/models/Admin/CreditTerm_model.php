<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreditTerm_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

       public function GetListData()
        {
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$this->session->org_id);
            $this->db->order_by('credit_id','desc');
            return $this->db->get('tbl_credit_term')->result();
        }

        public function AddCreditTerm($data) 
        {
            $date=date("Y-m-d H:i:s"); 
            $data1=array(
                          'credit_name'=>$data['credit_name'],
                          'credit_days'=>$data['credit_days'],
                          'org_id'=>$this->session->org_id,
                          'date_created'=>$date,
                          'status'=>1
                        );
            
            $this->db->insert('tbl_credit_term',$data1);
        }

        public function DeleteCreditTerm($credit_id) 
        {
            $this->db->where('credit_id',$credit_id);
            $this->db->set('delete_status',1);
            $this->db->update('tbl_credit_term');
        }
      
        public function EditCreditTerm($credit_id) 
        {
            $this->db->where('credit_id',$credit_id);
            return $this->db->get('tbl_credit_term')->result();
        }

        public function UpdateCreditTerm($data) 
        {
            $this->db->set('credit_name',$data['credit_name']);
            $this->db->set('credit_days',$data['credit_days']);
            $this->db->where('credit_id',$data['credit_id']);
            $this->db->update('tbl_credit_term');
        }

    public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('credit_id',$id);
       $this->db->update('tbl_credit_term');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('credit_id',$id);
        $this->db->update('tbl_credit_term');
    }
  }  