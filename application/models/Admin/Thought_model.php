
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Thought_model extends CI_Model 
{
  public function __construct() 
  {
        parent::__construct();
  }

  public function get_list()
  {
    $this->db->where('org_id',$this->session->org_id);
    $this->db->order_by('thought_id','desc');
    return $this->db->get('tbl_thoughts')->result();
  }

  public function get_data()
  {
    $where=array('section'=>'slider');
    $this->db->where($where);
    return $this->db->get('tbl_thoughts')->result();
  }
    
   public function Update_header($formdata)
   {
      $where=array('section'=>'slider');
      $this->db->where($where);
      $data=array(
                  'title'=>$formdata['title'],
                  'description'=>$formdata['description']
                );
      $this->db->update('tbl_thoughts', $data);
   }

   public function add($formdata)
    {
        $formdata['org_id']=$this->session->org_id;
        $this->db->insert('tbl_thoughts',$formdata);
    }

    public function edit($thought_id) 
    {
      $where=array('thought_id'=>$thought_id);
      $this->db->where($where);
      return  $this->db->get('tbl_thoughts')->result();
    }

    public function delete($thought_id)
    {   
       $this->db->where('thought_id',$thought_id);
       return $this->db->delete('tbl_thoughts');
    }

    public function Update($formdata)
    {
        $this->db->where('thought_id', $formdata['thought_id']);     
        $data=array(
                    'thought'=>$formdata['thought']
              );
        $this->db->update('tbl_thoughts', $data);
     }

//----------------------------------------------------------

public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('thought_id',$id);
       $this->db->update('tbl_thoughts');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('thought_id',$id);
        $this->db->update('tbl_thoughts');
    }

}

?>


