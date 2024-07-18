<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

    public function get_user() 
    {
      return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' ORDER BY id DESC");
    }

   public function get_array_module() 
    {
      $this->db->where('status',1);
      return $this->db->get("tbl_modules")->result();
    }
    public function user_add($name,$email,$password,$mobile_no,$file,$module_ids) 
    {
       if($module_ids==0)
        {
           $module_ids='';
        }
        else
        {
           $module_ids=implode(',', $module_ids);
        }

        if ($file!='') 
         {
          	  $user_type="E";
              $cur_date=date("dmyHis");
              $sepext = explode('.', strtolower($file));
              $extension = end($sepext);
              $store_file =$cur_date.".$extension";
              $move_file = FCPATH.'assets/admin/assets/images/users/';
              $move_file1 = $move_file . basename($store_file);
              $res = $this->db->query("INSERT INTO `tbl_admin_login`(`name`, `Username`, `Password`, `email`, `mobile_no`,`profile_img`,`user_type`,`module_ids`) VALUES ('$name','','$password','$email','$mobile_no','$store_file','$user_type','$module_ids')");
             if($res)
              {
                move_uploaded_file($_FILES['file']['tmp_name'], $move_file1);
                echo 1;
              }
              else
              {
                 echo 0;
              }
          }
          else
          {   
               $user_type="E";
               $res = $this->db->query("INSERT INTO `tbl_admin_login`(`name`, `Username`, `Password`, `email`, `mobile_no`,`profile_img`,`user_type`,`module_ids`) VALUES ('$name','','$password','$email','$mobile_no','$file','$user_type','$module_ids')");
               if($res)
                {
                  echo 1;
                }
                else
                {
                   echo 0;
                }
          }
    }

    public function user_delete($u_id) 
	  {
        // $this->db->set('user_status',1);
        // $this->db->where('id',$user_id);
        // return $this->db->update('tbl_admin_login');
      
	      $this->db->where('id',$u_id);
	      return $this->db->delete('tbl_admin_login');
	  }

	 public function user_edit($usr_id)
     {
       return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$usr_id'");
     }

     public function edit_user_add($user_id,$name,$email,$password,$mobile_no,$fileup,$module_ids) 
      {
          echo $user_id;
        

       if($module_ids==0)
        {
           $module='';
        }
        else
        {
           $module=implode(',', $module_ids);
        }

          if ($fileup!='') 
         {
            // echo "if";
              $cur_date=date("dmyHis");
              $sepext = explode('.', strtolower($fileup));
              $extension = end($sepext);
              $store_file =$cur_date.".$extension";
              $move_file = FCPATH.'assets/admin/assets/images/users/';
              $move_file1 = $move_file . basename($store_file);

              $updateArray=array(
                                  'name'=>$name,
                                  'email'=>$email,
                                  'Password'=>$password,
                                  'mobile_no'=>$mobile_no,
                                  'profile_img'=>$store_file,
                                  'module_ids'=>$module,
                                );
              $this->db->where('id',$user_id);

              print_r($updateArray);

              $this->db->Update('tbl_admin_login',$updateArray);
              move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
              
          }
          else
          { 
              // echo "else";
                // $this->db->set('name',$name);
                // $this->db->set('email',$email);
                // $this->db->set('Password',$password);
                // $this->db->set('mobile_no',$mobile_no);
                //  $this->db->set('profile_img',$store_file);
                //  $this->db->set('module_ids',$module);
                $updateArray=array(
                                  'name'=>$name,
                                  'email'=>$email,
                                  'Password'=>$password,
                                  'mobile_no'=>$mobile_no,
                                  'module_ids'=>$module
                                );

                        print_r($updateArray);
                $this->db->where('id',$user_id);
                $this->db->Update('tbl_admin_login',$updateArray);
                // echo "1";
          }
      }

//===================== User confirmation=================================
    public function confirm_user($user_id) 
    {
			$this->db->set('user_status',1);
			$this->db->where('id',$user_id);
			return $this->db->update('tbl_admin_login');
    }

    public function cancel_user($user_id) 
    {
			$this->db->set('user_status',0);
			$this->db->where('id',$user_id);
			return $this->db->update('tbl_admin_login');
    }
//=====================/ User confirmation=================================

//===================== Update customer by user confirmation=================================
    public function update_approval($user_id) 
    {
      $this->db->set('update_permission',1);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }

    public function cancel_approval($user_id) 
    {
      $this->db->set('update_permission',0);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
//===================== / Update customer by user confirmation=================================

//===================== Schedule View Permission =================================
    public function cancel_login_permission($user_id) 
    {
      $this->db->set('schedule_view',0);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }

    public function update_login_permission($user_id) 
    {
      $this->db->set('schedule_view',1);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
//===================== / Schedule View Permission =================================

    //------------------------------------------------------------------------------------------
    public function check_existmail($email)
    {
        $res=$this->db->query(" SELECT count(`id`) as count  FROM `tbl_admin_login` WHERE `email`='$email' ")->row();
        echo $count=$res->count;
    }

   //------------------------------------------------------------------------------------------
    public function check_mobile($mobile_no)
    {
        $res=$this->db->query(" SELECT count(`id`) as count  FROM `tbl_admin_login` WHERE `mobile_no`='$mobile_no' ")->row();
        echo $count=$res->count;
    }

    

    


}

?>