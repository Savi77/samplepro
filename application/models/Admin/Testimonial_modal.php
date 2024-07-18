<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_modal extends CI_Model {

    	public function __construct() 
        {

              parent::__construct();
              //echo 'Hello World2';

         }

         public function testimonial()
         {
           return $this->db->query("SELECT * FROM `tbl_testimonial` ORDER BY test_id DESC");
         }

         public function testimonial1()
         {
           return $this->db->query("SELECT * FROM `tbl_testimonial` WHERE status='1' ORDER BY test_id DESC");
         }

        public function get_data()
        {
          $where=array('section'=>'testimonial');
          $this->db->where($where);
          return $this->db->get('tbl_section_header')->result();
        }

         public function testimonial_add($fullname,$company_name,$site_name,$description,$fileup)
         {
              $cur_date=date("dmyHis");
              $sepext = explode('.', strtolower($fileup));
              $extension = end($sepext);
              $store_file =$cur_date.".$extension";
              $move_file = FCPATH.'assets/admin/assets/images/testimonial/';
              $move_file1 = $move_file . basename($store_file);

              $created_date=date("Y-m-d H:i:s");

              $data = $this->db->query("INSERT INTO `tbl_testimonial`(`name`,`company_name`,`site_name`,`description`,`profile`,`created_date`) VALUES ('$fullname','$company_name','$site_name','$description','$store_file','$created_date')");
              if ($data) 
              {
                  move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
                  echo 1;
              }
              else
              {
                  echo 0;
              }
         }

        public function testimonial_delete($test_id) 
        {
            $this->db->where('test_id',$test_id);
           return $this->db->delete('tbl_testimonial');
        }

          public function testimonial_edit($test_id)
         {
           return $this->db->query("SELECT * FROM `tbl_testimonial` WHERE `test_id`='$test_id'");
         }

         public function edit_testimonial_add($test_id,$fullname,$company_name,$site_name,$description,$fileup) 
          {

              if ($fileup!='')
              {
                  $cur_date=date("dmyHis");
                  $sepext = explode('.', strtolower($fileup));
                  $extension = end($sepext);
                  $store_file =$cur_date.".$extension";
                  $move_file = FCPATH.'assets/admin/assets/images/testimonial/';
                  $move_file1 = $move_file . basename($store_file);
                  move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);

                  $this->db->set('name',$fullname);
                  $this->db->set('company_name',$company_name);
                  $this->db->set('site_name',$site_name);
                  $this->db->set('description',$description);
                  $this->db->set('profile',$store_file);
                  $this->db->where('test_id',$test_id);
                  return $this->db->update('tbl_testimonial');
              }
              else
              {
                  $this->db->set('name',$fullname);
                  $this->db->set('company_name',$company_name);
                  $this->db->set('site_name',$site_name);
                  $this->db->set('description',$description);
                  $this->db->where('test_id',$test_id);
                  return $this->db->update('tbl_testimonial');
              }
          }

          public function deactivate1($id)
          {   
             $this->db->set('status',0);
             $this->db->where('test_id',$id);
             return $this->db->update('tbl_testimonial');
          }

          public function activate1($id)
          {   
              $this->db->set('status',1);
             $this->db->where('test_id',$id);
            return $this->db->update('tbl_testimonial');
          }

           public function Update_header($formdata)
          {
                  $this->db->where('section', 'testimonial');     
                  $data=array(
                                'title'=>$formdata['title'],
                                'description'=>$formdata['description']
                          );
                   $this->db->update('tbl_section_header', $data);
          }

    

} 
