<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

         public function manage_clients()
         {
           return $this->db->query("SELECT * FROM `tbl_clients` ORDER BY id DESC");
         }

         public function Add_clients($name,$url,$fileup)
         {

            $cur_date=date("dmyHis");
            $sepext = explode('.', strtolower($fileup));
            $extension = end($sepext);
            $store_file =$cur_date.".$extension";
            $move_file = FCPATH.'assets/images/clients/';
            $move_file1 = $move_file . basename($store_file);

            $created_date=date("Y-m-d H:i:s");

            $data=array(
                          'name'=>$name,
                          'home_img'=>$store_file,
                          'site_url'=>$url,
                          // 'description'=>$description,
                          'created_date'=>$created_date
                    );
            // print_r($data);
            $res=$this->db->insert('tbl_clients',$data);

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

          public function del_clients($clientid) 
          {
              $this->db->where('id',$clientid);
             return $this->db->delete('tbl_clients');
          }

          public function edit_client($clientid)
         {
          ///echo "fdsf";
           return $this->db->query("SELECT * FROM `tbl_clients` WHERE `id`='$clientid'");
         }

         public function edit_client_add($id,$name,$url,$fileup) 
          {
            //echo $test_id;
            if ($fileup!='') 
            {
                $cur_date=date("dmyHis");
                $sepext = explode('.', strtolower($fileup));
                $extension = end($sepext);
                $store_file =$cur_date.".$extension";
                $move_file = FCPATH.'assets/images/clients/';
                $move_file1 = $move_file . basename($store_file);

                $this->db->set('name',$name);
                $this->db->set('home_img',$store_file);
                $this->db->set('site_url',$url);
               
                $this->db->where('id',$id);
                $this->db->update('tbl_clients');

                move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
            }
            else
            {
                $this->db->set('name',$name);
                $this->db->set('site_url',$url);
               
                $this->db->where('id',$id);
                $this->db->update('tbl_clients');


            }
              
          }

          public function deactivate1($id)
          {   
             $this->db->set('status',0);
             $this->db->where('id',$id);
             $this->db->update('tbl_clients');
          }

          public function activate1($id)
          {   
              $this->db->set('status',1);
             $this->db->where('id',$id);
             $this->db->update('tbl_clients');
          }

    

} 
