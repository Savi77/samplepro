<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HSNCode_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

       public function GetListData()
        {
            $this->db->where('delete_status',0);
            $this->db->where('org_id',$this->session->org_id);
            $this->db->order_by('hsn_id','DESC');
            return $this->db->get('tbl_hsn_code')->result();
        }

        public function Add($data) 
        {
            $date=date("Y-m-d H:i:s"); 
            $data1=array(
                          'hsn_code'=>$data['hsn_code'],
                          'hsn_desc'=>$data['hsn_desc'],
                          'org_id'=>$this->session->org_id,
                          'date_created'=>$date
                        );
            $this->db->insert('tbl_hsn_code',$data1);
        }

        public function Delete($hsn_id) 
        {
            $this->db->where('hsn_id',$hsn_id);
            $this->db->set('delete_status',1);
            $this->db->update('tbl_hsn_code');
        }
      
        public function Edit($hsn_id) 
        {
            $this->db->where('hsn_id',$hsn_id);
            return $this->db->get('tbl_hsn_code')->result();
        }

        public function Update($data) 
        {
            $this->db->set('hsn_code',$data['hsn_code']);
            $this->db->set('hsn_desc',$data['hsn_desc']);
            $this->db->where('hsn_id',$data['hsn_id']);
            $this->db->update('tbl_hsn_code');
        }


  }  