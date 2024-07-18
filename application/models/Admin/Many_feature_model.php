
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Many_feature_model extends CI_Model 
{
  public function __construct() 
  {
        parent::__construct();
  }

  public function get_list()
  {
    return $this->db->get('tbl_manyfeature')->result();
  }

  public function get_data()
  {
    $where=array('section'=>'m_feature');
    $this->db->where($where);
    return $this->db->get('tbl_section_header')->result();
  }
    
   public function Update_header($formdata)
   {
      $where=array('section'=>'m_feature');
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
        $move_file = FCPATH.'assets/admin/assets/images/many_feature/';
        $move_file1 = $move_file . basename($store_file);
        $date_created=date("Y-m-d H:i:s");

        $data=array(
                    'tab_menu'=>$formdata['tab_menu'],
                    'image'=>$store_file,
                    'video_url'=>$formdata['url'],
                    'title'=>$formdata['title'],
                    'description'=>$formdata['description'],
                    'date_created'=>$date_created
                );
        $res=$this->db->insert('tbl_manyfeature',$data);
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
      return  $this->db->get('tbl_manyfeature');
    }

    public function delete($id)
    {   
       $this->db->where('id',$id);
       return $this->db->delete('tbl_manyfeature');
    }

    public function update($formdata,$image)
    {
          if($image=='')
          {
                $this->db->where('id', $formdata['mf_id']);     
                $data=array(
                            'tab_menu'=>$formdata['tab_menu'],
                            'video_url'=>$formdata['url'],
                            'title'=>$formdata['title'],
                            'description'=>$formdata['description']
                          );

                 $this->db->update('tbl_manyfeature', $data);
          }
          else
          {

              $cur_date=date("dmyHis");
              $sepext = explode('.', strtolower($image));
              $extension = end($sepext);
              $store_file =$cur_date.".$extension";
              $move_file = FCPATH.'assets/admin/assets/images/many_feature/';
              $move_file1 = $move_file . basename($store_file);
              $this->db->where('id', $formdata['mf_id']);     

              $data=array(
                          'tab_menu'=>$formdata['tab_menu'],
                          'image'=>$store_file,
                          'video_url'=>$formdata['url'],
                          'title'=>$formdata['title'],
                          'description'=>$formdata['description']
                    );
              $this->db->update('tbl_manyfeature', $data);
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
       $this->db->update('tbl_manyfeature');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
       $this->db->where('id',$id);
       $this->db->update('tbl_manyfeature');
    }



}

?>


