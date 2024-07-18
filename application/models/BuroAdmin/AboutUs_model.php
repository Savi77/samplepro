<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  public function Aboout_Details_Data()
  {
    return $this->db->query("SELECT * FROM `tbl_aboutus_detail`")->row();
  }
  public function insertData($image,$formdata)
  {
    // $this->db->truncate('tbl_aboutus_detail');
    if($image == '')
    {
      $data=array(
        'title_name'=>$formdata['title_name'],
        'title_description'=>$formdata['title_description'],
        'date_created' => date('Y-m-d H:i:s')
      );
      $this->db->insert('tbl_aboutus_detail', $data);
    }
    else
    {
        $cur_date=date("dmyHis");
        $sepext = explode('.', strtolower($image));
        $extension = end($sepext);
        $store_file =$cur_date.".$extension";
        $move_file = FCPATH.'assets/admin/assets/images/about_us/';
        $move_file1 = $move_file . basename($store_file);
        move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);

        $result = $this->db->query("SELECT * FROM `tbl_aboutus_detail`")->result();
        if (count($result) >= 1) {
          $this->db->where('about_id', 1);    
          $data=array(
            'image'=>$store_file,
            'title_name'=>$formdata['title_name'],
            'title_description'=>$formdata['title_description'],
            'date_created' => date('Y-m-d H:i:s')
          );
          $this->db->update('tbl_aboutus_detail', $data);
        }else {
          $data=array(
            'image'=>$store_file,
            'title_name'=>$formdata['title_name'],
            'title_description'=>$formdata['title_description'],
            'date_created' => date('Y-m-d H:i:s')
          );
          $this->db->insert('tbl_aboutus_detail', $data);
        }
    }
  }
}
