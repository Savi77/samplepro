<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model 
{

  public function __construct() 
  {
        parent::__construct();
        //echo 'Hello World2';
   }

  public function get_list()
  {
    return $this->db->get('tbl_faq')->result();
  }

  public function get_list1()
  {
    $this->db->where('status',1);
    return $this->db->get('tbl_faq');
  }

  public function get_data()
  {
    $where=array('section'=>'faq');
    $this->db->where($where);
    return $this->db->get('tbl_section_header')->result();
  }

   public function add($formdata)
    {
        $date_created=date('Y-m-d H:i:s');
        $data=array(
                      'question'=>$formdata['title'],
                      'answer'=>$formdata['title_description'],
                      'date_created'=>$date_created
                    );
        // print_r($data);
        $res=$this->db->insert('tbl_faq',$data);

        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
      
    }

    public function edit($id) 
    {
      $where=array('faq_id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_faq');
    }

    public function delete($id)
    {   
       $this->db->where('faq_id',$id);
       return $this->db->delete('tbl_faq');
    }

    public function deactivate($id)
    {   
        $this->db->set('status',0);
       $this->db->where('faq_id',$id);
       return $this->db->update('tbl_faq');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
       $this->db->where('faq_id',$id);
       return $this->db->update('tbl_faq');
    }

    public function update($formdata)
    {
            $this->db->where('faq_id', $formdata['faq_id']);     
            $data=array(
                          'question'=>$formdata['title'],
                          'answer'=>$formdata['title_description']
                    );
             $this->db->update('tbl_faq', $data);
    }

    public function Update_header($formdata,$image)
     {
        if($image=='')
        {
            $where=array('section'=>'faq');
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

            $where=array('section'=>'faq');
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


