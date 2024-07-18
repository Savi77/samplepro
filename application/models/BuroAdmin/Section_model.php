<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function get_list_home()
    {
      $this->db->where('footer_section','home');
      return $this->db->get('tbl_all_section')->result();
    }

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('id',$id);
       return $this->db->update('tbl_all_section');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('id',$id);
        return $this->db->update('tbl_all_section');
    }


}
