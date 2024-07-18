  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_interest_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

    public function get_interst() 
    {

      $this->db->where('org_id',$this->session->org_id);
      $this->db->where('delete_status',0);
      $this->db->order_by('id','DESC');
      return $this->db->get("tbl_categories");
    }

     public function get_interst1() 
    {
      // $this->db->where('status',1);
      return $this->db->query("SELECT * FROM `tbl_categories` WHERE `status`=1");
    }

    public function interest_add($interest) 
    {
          $data=array(
                        'interest'=>$interest,
                        'org_id'=>$this->session->org_id,
                        'timestamp'=>date('Y-m-d H:i:s')
                  );
           return $res=$this->db->insert('tbl_categories',$data);
    }

    public function interest_delete($id) 
    {
        $this->db->set('delete_status',1);
        $this->db->where('id',$id);        
       return $this->db->update('tbl_categories');
    }

     public function edit_interest($id) 
    {
        return $this->db->query("SELECT * FROM `tbl_categories` WHERE `id`='$id'");
       // print_r($data->result());
    }

    public function edit_interest_add($interest,$id) 
    {
      $this->db->set('interest',$interest);
      $this->db->where('id',$id);
      return $this->db->update('tbl_categories');
    }

         // =================================================

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('id',$id);
       $this->db->update('tbl_categories');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('tbl_categories');
    }


    // =============================================================

    


}

?>


