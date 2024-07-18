<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductSpecification_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

       public function GetListData()
        {
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$this->session->org_id);
            $this->db->order_by('specification_id','DESC');
            return $this->db->get('tbl_product_specification')->result();
        }

        public function Add($data) 
        {
            $date=date("Y-m-d H:i:s"); 
            $data1=array(
                          'specification_name'=>$data['specification_name'],
                          'specification_desc'=>$data['specification_desc'],
                          'org_id'=>$this->session->org_id,
                          'date_created'=>$date
                        );
            $this->db->insert('tbl_product_specification',$data1);
        }

        public function Delete($specification_id) 
        {
            $this->db->where('specification_id',$specification_id);
            $this->db->set('delete_status',1);
            $this->db->update('tbl_product_specification');
        }
      
        public function Edit($specification_id) 
        {
            $this->db->where('specification_id',$specification_id);
            return $this->db->get('tbl_product_specification')->result();
        }

        public function Update($data) 
        {
            $this->db->set('specification_name',$data['specification_name']);
            $this->db->set('specification_desc',$data['specification_desc']);
            $this->db->where('specification_id',$data['specification_id']);
            $this->db->update('tbl_product_specification');
        }


  }  