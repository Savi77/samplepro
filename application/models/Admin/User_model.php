<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{

	public function __construct() 
    {
      parent::__construct();
    }

    public function get_user() 
    {
      $final_array = array();
      $org_id=$this->session->org_id;
      $data = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' and org_id='$org_id' ORDER BY id DESC")->result();
      // var_dump($data);
      foreach ($data as $value) {
        $this->db->where('dep_id',$value->department);
        $department = $this->db->get('tbl_department')->row();
        if (!empty($department)) {
          $department_name = $department->department_name;
        }else {
          $department_name = 'Na';
        }

        $this->db->where('deg_id',$value->designation);
        $designation = $this->db->get('tbl_designation')->row();
        if (!empty($designation)) {
          $designation_name = $designation->designation_name;
        }else {
          $designation_name = 'Na';
        }

        $this->db->where('id',$value->nationality);
        $nationality = $this->db->get('countries')->row();
        if (!empty($nationality)) {
          $nationality_name = $nationality->name;
        }else {
          $nationality_name = 'Na';
        }


        $new_data = array(
          'id' => $value->id,
          'org_id' => $value->org_id,
          'name' => $value->name,
          'Password' => $value->Password,
          'email' => $value->email,
          'mobile_no' => $value->mobile_no,
          'profile_img' => $value->profile_img,
          'user_type' => $value->user_type,
          'user_status' => $value->user_status,
          'department' => $value->department,
          'designation' => $value->designation,
          'update_permission' => $value->update_permission,
          'schedule_view' => $value->schedule_view,
          'login_status' => $value->login_status,
          'delete_status' => $value->delete_status,
          'department_name' => $department_name,
          'designation_name' => $designation_name,
          'timestamp' => $value->timestamp,
          'role_id' => $value->role_id,
          'fname' =>$value->fname,
          'lname' => $value->lname,
          'nationality' => $nationality_name,
          'address' =>$value->address,
          'gender' => $value->gender,
          'blood_group' =>$value->blood_group,
          'pan_no' => $value->pan_no,
          'aadhar_no' =>$value->aadhar_no,
          'joining_date' => date('d F, Y', strtotime($value->joining_date)),
          'dob_date' => date('d F, Y', strtotime($value->dob)),
          'marriage_anniversary_date' => date('d F, Y', strtotime($value->marriage_anniversary_date))
        );
        array_push($final_array,$new_data);
      }
      return $final_array;
    }

   public function get_array_module() 
    {
      $this->db->where('status',1);
      return $this->db->get("tbl_modules")->result();
    }

    public function chk_emp_code($emp_code,$id)
    {
      $this->db->where('emp_id',$emp_code);
      $this->db->where('id !=',$id);
      $data = $this->db->get("tbl_admin_login")->result();
      if (count($data) >= 1) {
        return 1;
      }else {
        return 0;
      }
    }

    public function chk_emp_code_add($emp_code)
    {
      $this->db->where('emp_id',$emp_code);
      $data = $this->db->get("tbl_admin_login")->result();
      if (count($data) >= 1) 
      {
        return 1;
      }
      else 
      {
        return 0;
      }
      
    }

    public function get_user_data()
    {
      $this->db->where('org_id',$this->session->org_id);
      $this->db->where('user_type','E');
      $this->db->order_by('id','DESC');
      return $this->db->get("tbl_admin_login");
    }

   public function get_plan_subscription() 
    {
      $this->db->select('no_of_user');
      $this->db->where('org_id',$this->session->org_id);
      return $this->db->get("tbl_plan_subscription")->row();
    }

    public function get_designation()
    {
        $this->db->where('delete_status',0);
        return $this->db->get("tbl_designation")->result();
    }
    public function get_designation_data($id)
    {
      $this->db->where('department_id',$id);
      $this->db->where('delete_status',0);
      return $this->db->get("tbl_designation")->result();
    }
    public function get_designation_data_edit()
    {
      // $this->db->where('department_id',$id);
      $this->db->where('delete_status',0);
      return $this->db->get("tbl_designation")->result();
    }
    public function get_department()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        return $this->db->get("tbl_department")->result();
    }
    public function getDesignation($dep_id)
    {
      $output = "";
      $this->db->where('department_id',$dep_id);
      $this->db->where('delete_status',0);
      $designation = $this->db->get("tbl_designation");
      
      $output = '<option value="">Select Designation</option>';
      foreach ($designation->result() as $row) {
          $output .= '<option value="' . $row->deg_id . '" id="' . $row->deg_id . '">' . $row->designation_name . '</option>';
      }
      return $output;
    }
    public function user_add($name,$fname,$lname,$email,$custom_id,$password,$mobile_no,$file,$department,$designation,$emp_id,$joining_date,$dob_date,$marriage_anniversary_date,$nationality,$address,$gender,$blood_group,$pan_no,$aadhar_no,$alternate_mobile_no,$alternate_email,$doc_type) 
    {
        $org_id=$_SESSION['org_id'];
        if ($file!='') 
        {
            $user_type="E";
            $cur_date=date("dmyHis");
            $sepext = explode('.', strtolower($file));
            $extension = end($sepext);
            $store_file =$cur_date.".$extension";
            $move_file = FCPATH.'assets/admin/assets/images/users/';
            $move_file1 = $move_file . basename($store_file);
            $user_status = 1;
            // $res = $this->db->query("INSERT INTO `tbl_admin_login`(`user_type_io`,`org_id`,`name`,`Password`, `email`, `custom_id` ,`mobile_no`,`profile_img`,`department`,`designation`,`user_type`,`emp_id`,`joining_date`,`user_status`,`dob`,`marriage_anniversary_date`) VALUES ('$user_type_io','$org_id','$name','$password','$email','$custom_id','$mobile_no','$store_file','$department','$designation','$user_type','$emp_id','$joining_date','$user_status','$dob_date','$marriage_anniversary_date') ");
            $res = $this->db->query("INSERT INTO `tbl_admin_login`(`org_id`,`name`,`fname`,`lname`,`Password`, `email`, `custom_id` ,`mobile_no`,`profile_img`,`department`,`designation`,`user_type`,`emp_id`,`joining_date`,`user_status`,`dob`,`marriage_anniversary_date`,`nationality`,`address`,`gender`,`blood_group`,`pan_no`,`aadhar_no`,`alternate_mobile_no`,`alternate_email`) VALUES ('$org_id','$name','$fname','$lname','$password','$email','$custom_id','$mobile_no','$store_file','$department','$designation','$user_type','$emp_id','$joining_date','$user_status','$dob_date','$marriage_anniversary_date','$nationality','$address','$gender','$blood_group','$pan_no','$aadhar_no','$alternate_mobile_no','$alternate_email')");
            $insert_id = $this->db->insert_id();
            if($res)
            {
              try 
              {  
                move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
                echo 'If you see this text, the passed value is less than 1'; 
              }  
              catch (Exception $e) 
              {  
                  echo 'Exception Message: ' .$e->getMessage();  
              }  

              $countfiles = count($_FILES['uploadfile']['name']);
              for($i=0;$i<=$countfiles-1;$i++)
              {
                  $image = $_FILES['uploadfile']['name'][$i];
                  $sepext = explode('.', strtolower($image));
                  $extension = end($sepext);
                  $store_file =$image.'_'.$i.".$extension";
                  $move_file = FCPATH.'assets/admin/userDocument/';
                  $move_file1 = $move_file . basename($store_file);
                  move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
                  chmod($move_file1, 0755);                  
                  $Insert_array=array
                                (
                                  'user_id'=>$insert_id,
                                  'doc_type_id'=>$doc_type[$i],
                                  'name'=>$store_file,
                                  'uploadfilename'=>$image,
                                  'created_date'=>date("Y-m-d H:i:s")                           
                                );
                  $this->db->Insert('tbl_user_documents',$Insert_array); 
              }
              
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
              $user_status = 1;
              // $res = $this->db->query("INSERT INTO `tbl_admin_login`(`user_type_io`,`org_id`,`name`,`Password`, `email`, `custom_id` , `mobile_no`,`profile_img`,`department`,`designation`,`user_type`,`emp_id`,`joining_date`,`user_status`,`dob`,`marriage_anniversary_date`) VALUES ('$user_type_io','$org_id','$name','$password','$email','$custom_id','$mobile_no','$file','$department','$designation','$user_type','$emp_id','$joining_date','$user_status','$dob_date','$marriage_anniversary_date')");
              $res = $this->db->query("INSERT INTO `tbl_admin_login`(`org_id`,`name`,`fname`,`lname`,`Password`, `email`, `custom_id` ,`mobile_no`,`profile_img`,`department`,`designation`,`user_type`,`emp_id`,`joining_date`,`user_status`,`dob`,`marriage_anniversary_date`,`nationality`,`address`,`gender`,`blood_group`,`pan_no`,`aadhar_no`,`alternate_mobile_no`,`alternate_email`) VALUES ('$org_id','$name','$fname','$lname','$password','$email','$custom_id','$mobile_no','$store_file','$department','$designation','$user_type','$emp_id','$joining_date','$user_status','$dob_date','$marriage_anniversary_date','$nationality','$address','$gender','$blood_group','$pan_no','$aadhar_no','$alternate_mobile_no','$alternate_email')");
              $insert_id = $this->db->insert_id();
              if($res)
              {
                $countfiles = count($_FILES['uploadfile']['name']);
                for($i=0;$i<=$countfiles-1;$i++)
                {
                    $image = $_FILES['uploadfile']['name'][$i];
                    $sepext = explode('.', strtolower($image));
                    $extension = end($sepext);
                    $store_file =$image.'_'.$i.".$extension";
                    $move_file = FCPATH.'assets/admin/userDocument/';
                    $move_file1 = $move_file . basename($store_file);
                    move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
                    chmod($move_file1, 0755);                  
                    $Insert_array=array
                                  (
                                    'user_id'=>$insert_id,
                                    'doc_type_id'=>$doc_type[$i],
                                    'name'=>$store_file,
                                    'uploadfilename'=>$image,
                                    'created_date'=>date("Y-m-d H:i:s")                           
                                  );
                    $this->db->Insert('tbl_user_documents',$Insert_array);
                }
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
        $this->db->set('delete_status',1);
        $this->db->where('id',$u_id);
        $this->db->update('tbl_admin_login'); 
	  }

	 public function user_edit($usr_id)
     {
       return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$usr_id'")->result();
     }

   public function edit_user_add($user_id,$fname,$lname,$name,$email,$password,$mobile_no,$fileup,$department,$designation,$emp_id,$joining_date,$dob_date,$marriage_anniversary_date,$nationality,$address,$gender,$blood_group,$pan_no,$aadhar_no,$alternate_mobile_no,$alternate_email,$doc_type,$doc_auto_id) 
   {
      if ($fileup!='') 
      {
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
                            'department' => $department,
                            'designation' => $designation,
                            'emp_id' => $emp_id,
                            'joining_date' => $joining_date,
                            'dob' => $dob_date,
                            'marriage_anniversary_date' => $marriage_anniversary_date,
                            'fname' => $fname,
                            'lname' => $lname,
                            'nationality' => $nationality,
                            'address' => $address,
                            'gender' => $gender,
                            'blood_group' => $blood_group,
                            'pan_no' => $pan_no,
                            'aadhar_no' => $aadhar_no,
                            'alternate_mobile_no' => $alternate_mobile_no,
                            'alternate_email' => $alternate_email
                          );
        $this->db->where('id',$user_id);
        $this->db->Update('tbl_admin_login',$updateArray);
        move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);

        $get_doc_exist = $this->db->select('*')->from('tbl_user_documents')->where('user_id',$user_id)->get()->result();
        $countfiles = count($_FILES['uploadfile']['name']);
        if(COUNT($get_doc_exist) < $countfiles)
        {
          for($i=0;$i<=count($get_doc_exist)-1;$i++)
          {
            $image = $_FILES['uploadfile']['name'][$i];
            if($image == '')
            {

            }
            else
            {
              $sepext = explode('.', strtolower($image));
              $extension = end($sepext);
              $store_file =$image.'_'.$i.".$extension";
              $move_file = FCPATH.'assets/admin/userDocument/';
              $move_file1 = $move_file . basename($store_file);
              move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
              chmod($move_file1, 0755);                  
              $update_array=array
                            (
                              'doc_type_id'=>$doc_type[$i],
                              'name'=>$store_file,
                              'uploadfilename'=>$image,
                              'updated_date'=>date("Y-m-d H:i:s")                           
                            );
              $this->db->where('user_id',$user_id);
              $this->db->where('doc_type_id',$doc_type[$i]);
              $this->db->where('id',$doc_auto_id[$i]);
              $this->db->update('tbl_user_documents',$update_array); 
            }
          } 
          for($j=count($get_doc_exist);$j<=$countfiles-1;$j++)
          {
            $image = $_FILES['uploadfile']['name'][$j];
            $sepext = explode('.', strtolower($image));
            $extension = end($sepext);
            $store_file =$image.'_'.$j.".$extension";
            $move_file = FCPATH.'assets/admin/userDocument/';
            $move_file1 = $move_file . basename($store_file);
            move_uploaded_file($_FILES['uploadfile']['tmp_name'][$j], $move_file1); 
            chmod($move_file1, 0755);                  
            $Insert_array=array
              (
                'user_id'=>$user_id,
                'doc_type_id'=>$doc_type[$j],
                'name'=>$store_file,
                'uploadfilename'=>$image,
                'created_date'=>date("Y-m-d H:i:s")                           
              );
            $this->db->Insert('tbl_user_documents',$Insert_array);
          }
        }
        else
        {
          for($i=0;$i<=$countfiles-1;$i++)
          {
              $image = $_FILES['uploadfile']['name'][$i];
              if($image == '')
              {

              }
              else
              {
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file =$image.'_'.$i.".$extension";
                $move_file = FCPATH.'assets/admin/userDocument/';
                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
                chmod($move_file1, 0755);                  
                $update_array=array
                              (
                                'doc_type_id'=>$doc_type[$i],
                                'name'=>$store_file,
                                'uploadfilename'=>$image,
                                'updated_date'=>date("Y-m-d H:i:s")                           
                              );
                $this->db->where('user_id',$user_id);
                $this->db->where('doc_type_id',$doc_type[$i]);
                $this->db->where('id',$doc_auto_id[$i]);
                $this->db->update('tbl_user_documents',$update_array); 
              }
              
          }
        }
      }
      else
      { 
        
        $updateArray=array(
          'name'=>$name,
          'email'=>$email,
          'Password'=>$password,
          'mobile_no'=>$mobile_no,
          'department' => $department,
          'designation' => $designation,
          'emp_id' => $emp_id,
          'joining_date' => $joining_date,
          'dob' => $dob_date,
          'marriage_anniversary_date' => $marriage_anniversary_date,
          'fname' => $fname,
          'lname' => $lname,
          'nationality' => $nationality,
          'address' => $address,
          'gender' => $gender,
          'blood_group' => $blood_group,
          'pan_no' => $pan_no,
          'aadhar_no' => $aadhar_no,
          'alternate_mobile_no' => $alternate_mobile_no,
          'alternate_email' => $alternate_email
        );
        $this->db->where('id',$user_id);
        $this->db->Update('tbl_admin_login',$updateArray);
        $get_doc_exist = $this->db->select('*')->from('tbl_user_documents')->where('user_id',$user_id)->get()->result();
        $countfiles = count($_FILES['uploadfile']['name']);

       
        if(COUNT($get_doc_exist) < $countfiles)
        {
          for($i=0;$i<=count($get_doc_exist)-1;$i++)
          {
            $image = $_FILES['uploadfile']['name'][$i];
            if($image == '')
            {

            }
            else
            {
              $sepext = explode('.', strtolower($image));
              $extension = end($sepext);
              $store_file =$image.'_'.$i.".$extension";
              $move_file = FCPATH.'assets/admin/userDocument/';
              $move_file1 = $move_file . basename($store_file);
              move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
              chmod($move_file1, 0755);                  
              $update_array=array
                            (
                              'doc_type_id'=>$doc_type[$i],
                              'name'=>$store_file,
                              'uploadfilename'=>$image,
                              'updated_date'=>date("Y-m-d H:i:s")                           
                            );
              $this->db->where('user_id',$user_id);
              $this->db->where('doc_type_id',$doc_type[$i]);
              $this->db->where('id',$doc_auto_id[$i]);
              $this->db->update('tbl_user_documents',$update_array); 
            }
          } 
          for($j=count($get_doc_exist);$j<=$countfiles-1;$j++)
          {
            $image = $_FILES['uploadfile']['name'][$j];
            $sepext = explode('.', strtolower($image));
            $extension = end($sepext);
            $store_file =$image.'_'.$j.".$extension";
            $move_file = FCPATH.'assets/admin/userDocument/';
            $move_file1 = $move_file . basename($store_file);
            move_uploaded_file($_FILES['uploadfile']['tmp_name'][$j], $move_file1); 
            chmod($move_file1, 0755);                  
            $Insert_array=array
              (
                'user_id'=>$user_id,
                'doc_type_id'=>$doc_type[$j],
                'name'=>$store_file,
                'uploadfilename'=>$image,
                'created_date'=>date("Y-m-d H:i:s")                           
              );
            $this->db->Insert('tbl_user_documents',$Insert_array);
          }
        }
        else
        {
          
          for($i=0;$i<=$countfiles-1;$i++)
          {
            

              $image = $_FILES['uploadfile']['name'][$i];
              if($image == '')
              {

              }
              else
              {
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file =$image.'_'.$i.".$extension";
                $move_file = FCPATH.'assets/admin/userDocument/';
                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
                chmod($move_file1, 0755);                  
                $update_array=array
                              (
                                'doc_type_id'=>$doc_type[$i],
                                'name'=>$store_file,
                                'uploadfilename'=>$image,
                                'updated_date'=>date("Y-m-d H:i:s")                           
                              );
                $this->db->where('user_id',$user_id);
                $this->db->where('doc_type_id',$doc_type[$i]);
                $this->db->where('id',$doc_auto_id[$i]);
                $this->db->update('tbl_user_documents',$update_array); 
                
              }
              
          }
        }
      }
   }

    //---------------------------------------------------------------------------
    public function confirm_user($user_id) 
    {
			$this->db->set('user_status',1);
			$this->db->where('id',$user_id);
			return $this->db->update('tbl_admin_login');
    }
    //---------------------------------------------------------------------------
    public function cancel_user($user_id) 
    {
			$this->db->set('user_status',0);
			$this->db->where('id',$user_id);
			return $this->db->update('tbl_admin_login');
    }

   //---------------------------------------------------------------------------
    public function update_approval($user_id) 
    {
      $this->db->set('update_permission',1);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
   //---------------------------------------------------------------------------
    public function cancel_approval($user_id) 
    {
      $this->db->set('update_permission',0);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
   //---------------------------------------------------------------------------
    public function cancel_login_permission($user_id) 
    {
      $this->db->set('schedule_view',0);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
   //---------------------------------------------------------------------------
    public function update_login_permission($user_id) 
    {
      $this->db->set('schedule_view',1);
      $this->db->where('id',$user_id);
      return $this->db->update('tbl_admin_login');
    }
  //===================== / Schedule View Permission =================================
    public function check_existmail($email,$id)
    {
      $this->db->where('email',$email);
      $this->db->where('id !=',$id);
      $data = $this->db->get("tbl_admin_login")->result();
      
      if (count($data) >= 1) 
      {
        return 1;
      }
      else {
        return 0;
      }
        // $res=$this->db->query(" SELECT count(`id`) as count  FROM `tbl_admin_login` WHERE `email`='$email' ")->row();
        // echo $count=$res->count;
    }

    public function check_existmail_add($email)
    {
      $this->db->where('email',$email);
      $data = $this->db->get("tbl_admin_login")->result();
      if (count($data) >= 1) 
      {
        return 1;
      }
      else {
        return 0;
      }
        // $res=$this->db->query(" SELECT count(`id`) as count  FROM `tbl_admin_login` WHERE `email`='$email' ")->row();
        // echo $count=$res->count;
    }

   //------------------------------------------------------------------------------------------
    public function check_mobile($mobile_no)
    {
        $res=$this->db->query(" SELECT count(`id`) as count  FROM `tbl_admin_login` WHERE `mobile_no`='$mobile_no' ")->row();
        echo $count=$res->count;
    }
 
   //------------------------------------------------------------------------------------------
    
   public function user_document_details($id)
   {
      $doc_details = $this->db->query('SELECT * FROM `tbl_user_documents` WHERE user_id = '.$id.'')->result();
      return $doc_details;
   } 
    
   public function delete_document($document_id)
   {
      $this->db->where('id ',$document_id);
      if($this->db->Delete('tbl_user_documents')){
        echo 1;
      }else {
        echo 0;
      }
   }

}
