<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UOM_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

    public function get_data()
    {
      $where=array('delete_status'=>'1');
      $this->db->where($where);
      return $this->db->get('tbl_uom');
    }

    public function add_type($data) 
    {
      $date=date("Y-m-d H:i:s");
      $data1=array(
                      'uom_type'=>$data['type'],
                      'date_created'=>$date
                  );

      $res=$this->db->insert('tbl_uom',$data1);
      if($res)
      {
        echo 1;
      }
      else
      {
         echo 0;
      }
    }

    public function delete_uom($uom_id) 
    {
        $this->db->set('delete_status',0);
        $this->db->where('uom_id',$uom_id);
        $this->db->update('tbl_uom');
    }

    public function edit_uomtype($uom_id) 
    {
        $this->db->where('uom_id',$uom_id);
        return $this->db->get('tbl_uom');
    }

    public function Edit_Add_uom($data,$image) 
    {

        $this->db->set('uom_type',$data['type']);
        $this->db->where('uom_id',$data['uom_id']);
        $data = $this->db->update('tbl_uom');
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
       $this->db->where('uom_id',$id);
       return $this->db->update('tbl_uom');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('uom_id',$id);
        return $this->db->update('tbl_uom');
    }

}

?>


