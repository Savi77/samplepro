<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentUpload_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

       public function GetMainDirectoryListData()
        {
            $this->db->where('dir_type','Main');
            $this->db->where('dir_status',1);
            $this->db->where('org_id',$this->session->org_id);
            return $this->db->get('tbl_doc_directory')->result();
        }
       public function GetListData()
        {
            $this->db->where('dir_status',1);
            $this->db->where('dir_type','Main');
            $this->db->where('org_id',$this->session->org_id);
            $result= $this->db->get('tbl_doc_directory')->result();
            $data = [];

            foreach ($result  as $row)
             {

                $this->db->where('dir_parentid',$row->dir_id);
                $res=$this->db->get('tbl_doc_directory')->result();
               $data[] = [
                          'dir_id'              => $row->dir_id,
                          'dir_name'              => $row->dir_name,
                          'dir_subarray'           => $res,
                          // 'files'           => ,
                         ];
            }
            // var_dump($data); 
            // exit;
            return $data;
        }
        
       public function GetDirDocData($dir_id)
        {
            // $this->db->where('dir_status',1);
            $this->db->where('dir_id',$dir_id);
            return $this->db->get('tbl_dir_documents')->result();
        }




       public function GetDirData($dir_id)
        {
            $final_array=array();
            $this->db->where('dir_id',$dir_id);
            $diractory=$this->db->get('tbl_doc_directory')->row();
            $dir_parentid=$diractory->dir_parentid;

            if($dir_parentid>0)
            {
                $this->db->where('dir_id',$dir_parentid);
                $dirstructure=$this->db->get('tbl_doc_directory')->row();
                $db_dir_name=$dirstructure->dir_name;

                 
                array_push($final_array, $db_dir_name);
                array_push($final_array, $diractory->dir_name); 

            }
            else
            {
              array_push($final_array, $diractory->dir_name);  
            }
            return $final_array;

        }


   public function UploadDocument($db_dir_id,$fileremark,$path)
    {
       $countfiles = count($_FILES['uploadfile']['name']);
       for($i=0;$i<$countfiles-1;$i++)
       {
          $image = $_FILES['uploadfile']['name'][$i];
          $cur_date=date("dmyHis");
          $sepext = explode('.', strtolower($image));
          $extension = end($sepext);
          $store_file =$cur_date.'_'.$i.".$extension";

          $move_file = FCPATH.'assets/Documents/'.$path.'/';



          $move_file1 = $move_file . basename($store_file);
          move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
          chmod($move_file1, 0755);                  
          $Insert_array=array
                             (
                               'dir_id'=>$db_dir_id,
                               'upload_by'=>$this->session->id,
                               'uploadfilename'=>$image,
                               'doc_name'=>$store_file,
                               'remark'=>$fileremark[$i],
                               'date_created'=>date("Y-m-d H:i:s")                           
                             );
          $this->db->Insert('tbl_dir_documents',$Insert_array); 
       }

    }

        public function AddDirectory($data)
        {
            $date=date("Y-m-d H:i:s"); 
            $dir_parentid=$data['dir_parentid'];
            $dir_name= $data['dir_name'];
            $data1=array(
                          'org_id'=>$this->session->org_id,
                          'dir_name'=>$data['dir_name'],
                          'dir_parentid'=>$data['dir_parentid'],
                          'dir_status'=>1,
                          'dir_type'=>$data['dir_type'],
                          'dir_access'=>$data['dir_access'],                          
                          'dir_createddate'=>$date
                        );
            $res=$this->db->insert('tbl_doc_directory',$data1);

            if($res)
            {
                if($dir_parentid>0)
                {
                  $this->db->where('dir_id',$dir_parentid);
                  $dirstructure=$this->db->get('tbl_doc_directory')->row();
                  $db_dir_name=$dirstructure->dir_name;
                  $dir = umask(0);
                  mkdir('assets/Documents/'.$db_dir_name.'/'.$dir_name, 0777, true);
                  umask($dir);
                }
                else
                {
                  $dir = umask(0);
                  mkdir('assets/Documents/'.$dir_name, 0777, true);
                  umask($dir);
                }
            }
        }

        public function DeleteDir($dir_id) 
        {
            $this->db->where('dir_id',$dir_id);
            $this->db->set('dir_status',0);
            $this->db->update('tbl_doc_directory');
        }

        //-----------------------------------------------




        public function AddCreditTerm($data) 
        {
            $date=date("Y-m-d H:i:s"); 
            $data1=array(
                          'credit_name'=>$data['credit_name'],
                          'credit_days'=>$data['credit_days'],
                          'org_id'=>$this->session->org_id,
                          'date_created'=>$date
                        );
            $this->db->insert('tbl_directory',$data1);
        }

        public function DeleteCreditTerm($credit_id) 
        {
            $this->db->where('credit_id',$credit_id);
            $this->db->set('delete_status',1);
            $this->db->update('tbl_directory');
        }
    
        public function EditCreditTerm($credit_id) 
        {
            $this->db->where('credit_id',$credit_id);
            return $this->db->get('tbl_directory')->result();
        }

        public function UpdateCreditTerm($data) 
        {
            $this->db->set('credit_name',$data['credit_name']);
            $this->db->set('credit_days',$data['credit_days']);
            $this->db->where('credit_id',$data['credit_id']);
            $this->db->update('tbl_directory');
        }


  }  