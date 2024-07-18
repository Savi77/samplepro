<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

   public function get_data()
    {
        $this->db->from('tbl_schedule_type');
        $this->db->order_by("title", "asc");
        return $this->db->get();
    }

    public function add_schedule($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'title'=>$data['schedule_type'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_schedule_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_schedule($scheduletid) 
    {
        $this->db->where('schedule_id',$scheduletid);
        $this->db->delete('tbl_schedule_type');
    }
  

    public function edit_master($scheduleid) 
    {
        $this->db->where('schedule_id',$scheduleid);
        return $this->db->get('tbl_schedule_type');
    }

    public function edit_type($id) 
    {
        $this->db->where('id',$id);
        return $this->db->get('tbl_gallery_type');
    }


    public function Edit_Add_schedule($data) 
    {

        $this->db->set('title',$data['schedule_type']);
        $this->db->where('schedule_id',$data['schedule_id']);

        $data = $this->db->update('tbl_schedule_type');
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


// =================================================

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('schedule_id',$id);
       $this->db->update('tbl_schedule_type');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('schedule_id',$id);
        $this->db->update('tbl_schedule_type');
    }


    // =============================================================

    // ============== group section ===================================

     public function get_groupdata()
    {
        $this->db->from('tbl_group');
        $this->db->order_by("group_name", "asc");
        return $this->db->get();
    }

    public function add_group($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'group_name'=>$data['group_name'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_group',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_group($grouptid) 
    {
        $this->db->where('group_id',$grouptid);
        $this->db->delete('tbl_group');
    }
  

    public function edit_mastergroup($grouptid) 
    {
        $this->db->where('group_id',$grouptid);
        return $this->db->get('tbl_group');
    }

    public function Edit_Add_group($data) 
    {

        $this->db->set('group_name',$data['group_name']);
        $this->db->where('group_id',$data['group_id']);

        $data = $this->db->update('tbl_group');
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

    public function deactivate($id)
    {   
       $this->db->set('status',0);
       $this->db->where('group_id',$id);
       $this->db->update('tbl_group');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('group_id',$id);
        $this->db->update('tbl_group');
    }


    // =============================================================



    // ============== business section ===================================

     public function get_businessdata()
    {
      // $where=array('status'=>'1');
      // $this->db->where($where);
        $this->db->from('tbl_business');
        $this->db->order_by("business_name", "asc");
        return $this->db->get();
    }

    public function add_business($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'business_name'=>$data['business_name'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_business',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_business($businessid) 
    {
        $this->db->where('business_id',$businessid);
        $this->db->delete('tbl_business');
    }
  

    public function edit_masterbusiness($businessid) 
    {
        $this->db->where('business_id',$businessid);
        return $this->db->get('tbl_business');
    }

    public function Edit_Add_business($data) 
    {

        $this->db->set('business_name',$data['business_name']);
        $this->db->where('business_id',$data['business_id']);

        $data = $this->db->update('tbl_business');
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

    public function deactivate2($id)
    {   
       $this->db->set('status',0);
       $this->db->where('business_id',$id);
       $this->db->update('tbl_business');
    }

    public function activate2($id)
    {   
        $this->db->set('status',1);
        $this->db->where('business_id',$id);
        $this->db->update('tbl_business');
    }


    // =============================================================

        // ============== Type section ===================================

     public function get_typedata()
    {
        $this->db->from('tbl_type');
        $this->db->order_by("title", "asc");
        return $this->db->get();
    }

    public function add_type($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'title'=>$data['title'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_type($typeid) 
    {
        $this->db->where('type_id',$typeid);
        $this->db->delete('tbl_type');
    }
  

    public function edit_mastertype($typeid) 
    {
        $this->db->where('type_id',$typeid);
        return $this->db->get('tbl_type');
    }

    public function Edit_Add_type($data) 
    {

        $this->db->set('title',$data['title']);
        $this->db->where('type_id',$data['type_id']);

        $data = $this->db->update('tbl_type');
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

    public function deactivate3($id)
    {   
       $this->db->set('status',0);
       $this->db->where('type_id',$id);
       $this->db->update('tbl_type');
    }

    public function activate3($id)
    {   
        $this->db->set('status',1);
        $this->db->where('type_id',$id);
        $this->db->update('tbl_type');
    }


    // =============================================================




          // ============== Locarion section ===================================

     public function get_locationdata()
    {
        $this->db->from('tbl_location');
        $this->db->order_by("location", "asc");
        return $this->db->get();
    }

    public function add_location($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'location'=>$data['location'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_location',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_location($locationid) 
    {
        $this->db->where('location_id',$locationid);
        $this->db->delete('tbl_location');
    }
  

    public function edit_masterlocation($locationid) 
    {
        $this->db->where('location_id',$locationid);
        return $this->db->get('tbl_location');
    }

    public function Edit_Add_location($data) 
    {

        $this->db->set('location',$data['location']);
        $this->db->where('location_id',$data['location_id']);

        $data = $this->db->update('tbl_location');
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

    public function deactivate4($id)
    {   
       $this->db->set('status',0);
       $this->db->where('location_id',$id);
       $this->db->update('tbl_location');
    }

    public function activate4($id)
    {   
        $this->db->set('status',1);
        $this->db->where('location_id',$id);
        $this->db->update('tbl_location');
    }


    // =============================================================





}

?>


