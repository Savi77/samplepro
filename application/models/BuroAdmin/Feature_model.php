<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature_model extends CI_Model 
{

  public function __construct() 
  {
        parent::__construct();
        //echo 'Hello World2';
   }

  public function manage_feature()
  {
             $this->db->order_by("id", "desc");
      return $this->db->get('tbl_superfeature')->result();
  }

  public function get_data()
  {
      $where=array('section'=>'superfeature');
      $this->db->where($where);
      return $this->db->get('tbl_section_header')->result();
  }

  public function add($formdata,$fileup)
  {
        $cur_date=date("dmyHis");
        $sepext = explode('.', strtolower($fileup));
        $extension = end($sepext);
        $store_file =$cur_date.".$extension";
        $move_file = FCPATH.'assets/admin/assets/images/superfeature/';
        $move_file1 = $move_file . basename($store_file);

        $created_date=date("Y-m-d H:i:s");

        $data=array(
                      'image'=>$store_file,
                      'title'=>$formdata['title'],
                      'description'=>$formdata['title_description'],
                      'date_created'=>$created_date
                    );
        // print_r($data);
        $res=$this->db->insert('tbl_superfeature',$data);

        if($res)
        {
            move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
            echo 1;
        }
        else
        {
            echo 0;
        }
      
  }

    public function edit_feature($id) 
    {
        $where=array('id'=>$id);
        $this->db->where($where);
        return  $this->db->get('tbl_superfeature');
    }

    public function delete_feature($id)
    {   
       $this->db->where('id',$id);
       return $this->db->delete('tbl_superfeature');
    }

    public function deactivate($id)
    {   
        $this->db->set('status',0);
       $this->db->where('id',$id);
       return $this->db->update('tbl_superfeature');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('id',$id);
        return $this->db->update('tbl_superfeature');
    }

    public function Edit_Add_feature($formdata,$fileup)
    {
        if ($fileup!='')
        {
            $cur_date=date("dmyHis");
            $sepext = explode('.', strtolower($fileup));
            $extension = end($sepext);
            $store_file =$cur_date.".$extension";
            $move_file = FCPATH.'assets/admin/assets/images/superfeature/';
            $move_file1 = $move_file . basename($store_file);
            move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);

            $this->db->where('id', $formdata['feature_id']);     
            $data=array(
                          'image'=>$store_file,
                          'title'=>$formdata['title'],
                          'description'=>$formdata['title_description']
                        );
            $this->db->update('tbl_superfeature', $data);
        }
        else
        {
          // echo "1";
            $this->db->where('id', $formdata['feature_id']);     
            $data=array(
                          'title'=>$formdata['title'],
                          'description'=>$formdata['title_description']
                        );
            // print_r($data);
            $this->db->update('tbl_superfeature', $data);
        }
          
    }

    public function Update_header($formdata,$image)
    {
        if($image=='')
        {
            $where=array('section'=>'superfeature');
            $this->db->where($where);
            $data=array(
                'title'=>$formdata['title'],
                'description'=>$formdata['description']
            );
            $this->db->update('tbl_section_header', $data);
        }else {
            $cur_date=date("dmyHis");
            $sepext = explode('.', strtolower($image));
            $extension = end($sepext);
            $store_file =$cur_date.".$extension";
            $move_file = FCPATH.'assets/admin/assets/images/section_image/';
            $move_file1 = $move_file . basename($store_file);
            move_uploaded_file($_FILES['fileupFeature']['tmp_name'], $move_file1);
            $where=array('section'=>'superfeature');
            $this->db->where($where);
            $data=array(
                'title'=>$formdata['title'],
                'description'=>$formdata['description'],
                'section_image'=>$store_file,
            );
            $this->db->update('tbl_section_header', $data);
        }
    }



}

?>


