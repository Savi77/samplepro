
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class How_we_work_model extends CI_Model 
{
  public function __construct() 
  {
        parent::__construct();
  }

  public function get_list()
  {
    return $this->db->get('tbl_howwework')->result();
  }

  public function get_data()
  {
    $where=array('section'=>'howwework');
    $this->db->where($where);
    return $this->db->get('tbl_section_header')->result();
  }
    
   public function Update_header($formdata)
   {
      $where=array('section'=>'howwework');
      $this->db->where($where);
      $data=array(
                  'title'=>$formdata['title'],
                  'description'=>$formdata['description']
                );
      $this->db->update('tbl_section_header', $data);
   }

   public function add($formdata,$image)
    {

        $cur_date=date("dmyHis");
        $sepext = explode('.', strtolower($image));
        $extension = end($sepext);
        $store_file =$cur_date.".$extension";
        $move_file = FCPATH.'assets/admin/assets/images/howwework/';
        $move_file1 = $move_file . basename($store_file);

        $data=array(
                    'image'=>$store_file,
                    'title'=>$formdata['title'],
                    'description'=>$formdata['title_description']
                );
        $res=$this->db->insert('tbl_howwework',$data);
        if($data)
        {
          move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
          echo 1;
        }
        else
        {
           echo 0;
        }

    }

    public function edit($id) 
    {
      $where=array('id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_howwework');
    }

    public function delete($id)
    {   
       $this->db->where('id',$id);
       return $this->db->delete('tbl_howwework');
    }

    public function update($formdata,$image)
    {
          if($image=='')
          {
                $this->db->where('id', $formdata['work_id']);     
                $data=array(
                            'title'=>$formdata['title'],
                            'description'=>$formdata['title_description']
                          );

                 $this->db->update('tbl_howwework', $data);
          }
          else
          {

              $cur_date=date("dmyHis");
              $sepext = explode('.', strtolower($image));
              $extension = end($sepext);
              $store_file =$cur_date.".$extension";
              $move_file = FCPATH.'assets/admin/assets/images/howwework/';
              $move_file1 = $move_file . basename($store_file);
              $this->db->where('id', $formdata['work_id']);     

              $data=array(
                          'title'=>$formdata['title'],
                          'image'=>$store_file,
                          'description'=>$formdata['title_description']
                    );
              $this->db->update('tbl_howwework', $data);
              // if($res)
              // {
                  move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
              // }
          }
     }

//----------------------------------------------------------

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('id',$id);
       $this->db->update('tbl_howwework');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
       $this->db->where('id',$id);
       $this->db->update('tbl_howwework');
    }



}

?>


