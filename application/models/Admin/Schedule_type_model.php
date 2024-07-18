<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_type_model extends CI_Model 
{
  public function __construct() 
  {
      parent::__construct();

  }

  public function get_list()
  {
      $this->db->where('org_id',$this->session->org_id);
      $this->db->where('delete_status',0);
      $this->db->order_by('id','desc');
      return $this->db->get('tbl_schedule_type_name')->result();
  }
    
  public function add_type($data) 
  {
      $date=date("Y-m-d H:i:s");
      $data1=array(
                      'org_id'=>$this->session->org_id,
                      'type_name'=>$data['type_name'],
                      'date_created'=>$date
                  );
      $res=$this->db->insert('tbl_schedule_type_name',$data1);
      if($res)
      {
        echo 1;
      }
      else
      {
         echo 0;
      }
  }

  public function delete_scheduletype($scheduletid) 
  {
      $this->db->set('delete_status',1);
      $this->db->where('id',$scheduletid);
      $this->db->update('tbl_schedule_type_name');
  }

  public function edit_scheduletype($scheduletid) 
  {
      $this->db->where('id',$scheduletid);
      return $this->db->get('tbl_schedule_type_name');
  }

  public function Edit_Add_scheduletype($data) 
  {

      $this->db->set('type_name',$data['type_name']);
      $this->db->where('id',$data['visittype_id']);
      $data = $this->db->update('tbl_schedule_type_name');
      $data1 = $this->db->affected_rows($data) > 0;
      if($data1)
      {
          echo "1";
      }
      else
      {
          echo "2";
      }
  }

  public function deactivate1($id)
  {   
     $this->db->set('status',0);
     $this->db->where('id',$id);
     return $this->db->update('tbl_schedule_type_name');
  }

  public function activate1($id)
  {   
      $this->db->set('status',1);
      $this->db->where('id',$id);
      return $this->db->update('tbl_schedule_type_name');
  }
    // =============================================================

//----------------------------------------------------------


}

?>


