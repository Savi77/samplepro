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
       return  $this->db->query(" 
                            SELECT tbl_sub_categories.*,tbl_categories.interest
                            FROM `tbl_sub_categories` 
                            INNER JOIN tbl_categories 
                            ON tbl_sub_categories.menu_id=tbl_categories.id

                         ");    
   }

   public function add($data)
    {
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
         $this->db->where('submenu_id',$id);
         return $this->db->delete('tbl_sub_categories');
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


