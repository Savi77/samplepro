<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermConditions_model extends CI_Model 
{

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
        }

       public function GetListData()
        {
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$this->session->org_id);
            $this->db->order_by('term_id','desc');
            return $this->db->get('tbl_terms_condition')->result();
        }

        public function Add($data) 
        {
            $terms= $data['terms'];
            $final_terms='';
            for($i=0;$i<count($terms);$i++)
            {
              $final_terms=$final_terms.'$^'.$terms[$i];
            }
            $data1=array(
              'term_for'=>$data['term_for'],
              'term_condition'=>$final_terms,
              'org_id'=>$this->session->org_id
            );
            $this->db->insert('tbl_terms_condition',$data1);
        }

        public function Delete($term_id) 
        {
            $this->db->where('term_id',$term_id);
            $this->db->set('delete_status',1);
            $this->db->update('tbl_terms_condition');
        }
      
        public function Edit($term_id) 
        {
            $this->db->where('term_id',$term_id);
            return $this->db->get('tbl_terms_condition')->result();
        }

        public function Update($data) 
        {
            $terms= $data['terms'];
            $final_terms='';
            for($i=0;$i<count($terms);$i++)
            {
              $final_terms=$final_terms.'$^'.$terms[$i];
            }
            $this->db->set('term_for',$data['term_for']);
            $this->db->set('term_condition',$final_terms);
            $this->db->where('term_id',$data['term_id']);
            $this->db->update('tbl_terms_condition');
        }
        public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('term_id',$id);
       $this->db->update('tbl_terms_condition');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('term_id',$id);
        $this->db->update('tbl_terms_condition');
    }
    public function ViewTermCondition($term_id)
    {
      $this->db->where('term_id',$term_id);
      return $this->db->get('tbl_terms_condition')->result();
    }

  }  