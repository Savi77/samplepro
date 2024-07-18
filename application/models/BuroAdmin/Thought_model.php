
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


}

?>


