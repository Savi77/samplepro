<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_submenu_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }


   public function get_list()
    {
      $org_id=$this->session->org_id;
       return  $this->db->query(" 
                                SELECT tbl_sub_categories.*,tbl_categories.interest
                                FROM `tbl_sub_categories` 
                                INNER JOIN tbl_categories 
                                ON tbl_sub_categories.menu_id=tbl_categories.id
                                Where tbl_sub_categories.org_id='$org_id' and tbl_sub_categories.delete_status=0
                                ORDER BY tbl_sub_categories.submenu_id DESC
                            ");    
   }

   public function add($data)
    { 
      $data['org_id']=$this->session->org_id;
      return  $this->db->insert('tbl_sub_categories',$data);
    }

    public function edit($id) 
    {
      $where=array('submenu_id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_sub_categories');
    }

    public function delete($id)
    {   
         $this->db->set('delete_status',1);
         $this->db->where('submenu_id',$id);
         return $this->db->update('tbl_sub_categories');
    }

    public function update($submmenu,$id,$menu_id)
    {
      $this->db->set('submmenu',$submmenu);
      $this->db->set('menu_id',$menu_id);
      $this->db->where('submenu_id',$id);
      return $this->db->update('tbl_sub_categories');
    }

   public function active($id)
    {
      $this->db->set('status',1);
      $this->db->where('submenu_id', $id); 
      $this->db->update('tbl_sub_categories');

    }

   public function deactive($id)
    {
      $this->db->set('status',0);
      $this->db->where('submenu_id', $id); 
      $this->db->update('tbl_sub_categories');
    }
   


}

?>


