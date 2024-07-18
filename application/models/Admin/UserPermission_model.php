<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPermission_model extends CI_Model 
{

    public function __construct() 
    {
       parent::__construct();
    }


    public function get_list_feature()
    {
        $this->db->where("component_status",1);
        $data=$this->db->get("tbl_feature_list")->result();
        $finalarray=array();
        $labelarray=array('blue','teal','brown','grey','slate','pink','purple','green','violet','indigo','orange','slate','pink','purple','green','violet');
        foreach ($data as $res)
        {
           $Privilegeids=$res->Privilegeids;
           if(!empty($Privilegeids))
           {
                $privilege='';
                $Privilegeids=explode(",",$Privilegeids);
                $this->db->where_in("privilege_id",$Privilegeids);
                $query=$this->db->get("tbl_privilege")->result();
           }
           else
           {
             $query=array();
           }
           $newarray=array('component_title'=>$res->component_title,'component_id'=>$res->component_id,'privilege'=>$query); 
           array_push($finalarray, $newarray);
        }   
        return $finalarray;
    } 


   public function GetUserPermission2()
   {
      $final_array=array();
      $user_id=$formdata['emp_id'];
      $feature_ids_array=$formdata['feature_ids'];
      $module_ids=$this->session->module_ids;
      $module_ids_final=explode(",", $module_ids);       
      $this->db->where_in("module_id",$module_ids_final); 
      $modules=$this->db->get("tbl_modules")->result();
      foreach ($modules as $row) 
      {
          $module_id=$row->module_id;
          $component_ids=explode(",", $row->component_ids);  
          $this->db->where_in("component_id",$component_ids);
          $this->db->where("component_status",1);
          $feature_data=$this->db->get("tbl_feature_list")->result();

          foreach ($feature_data as $res)
          {
              $feature_id_array=array();

              $component_id=$res->component_id;
              $Privilegeids=explode(",", $res->Privilegeids);
              for($c=0;$c<count($Privilegeids);$c++)
              { 
                  $priviledge_id=$Privilegeids[$c];
                  $custom_id=$component_id.'/'.$priviledge_id;

                  $this->db->where("module_id",$module_id);
                  $this->db->where("feature_id",$component_id);
                  $this->db->where("privilege_id",$priviledge_id);
                  $prv=$this->db->get("tbl_privilege")->result();

                  if(count($prv)>0)
                  {
                    $checkbox="checked";
                  }
                  else
                  {
                    $checkbox="";
                  }
                  $push_array=array(
                                       'component_id'=>$component_id,
                                       'component_title'=>$component_title,
                                       'priviledge_id'=>$priviledge_id,
                                       'checkbox'=>$checkbox, 
                                    );
                  array_push($feature_id_array, $push_array);
               }
          }
      }
   }


    public function module_list($formdata)
    { 
      $user_id=$formdata['employee_id'];
      $this->db->where("user_id",$user_id);
      return $this->db->get("tbl_module_permission")->result();
    }

    public function GetUserPermission($formdata)
    { 
            $user_id=$formdata['employee_id'];
            $module_ids=$this->session->module_ids;
            $module_ids_final=explode(",", $module_ids);       
            $this->db->where_in("module_id",$module_ids_final); 
            $modules=$this->db->get("tbl_modules")->result();
            $component_ids=array();
            foreach ($modules as $row) 
            {
              $component_id=explode(",", $row->component_ids);  
              for($a=0;$a<count($component_id);$a++)
              {
                array_push($component_ids, $component_id[$a]);
              }
            }

            $this->db->where_in("component_id",$component_ids);
            $this->db->where("component_status",1);
            $data=$this->db->get("tbl_feature_list")->result();
            $finalarray=array();            
            foreach ($data as $res)
            {
                $component_id=$res->component_id;
                // -----------------------------------------------
                $where = "FIND_IN_SET('".$component_id."', component_ids)";  
                $this->db->where( $where ); 
                $modules_res=$this->db->get("tbl_modules")->row();
                $module_id=$modules_res->module_id;
                 // -----------------------------------------------
                $Privilegeids=$res->Privilegeids;
                $Privilegeids=explode(",",$Privilegeids);
                $this->db->where_in("privilege_id",$Privilegeids);
                $query=$this->db->get("tbl_privilege")->result();

                $feature_id_array=array();
                foreach ($query as  $row55) 
                {
                    $priviledge_id=$row55->privilege_id;      
                    $this->db->where("feature_id",$component_id);
                    $this->db->where("priviledge_id",$priviledge_id);
                    $this->db->where("module_id",$module_id);
                    $this->db->where("user_id",$user_id);
                    $prv=$this->db->get("tbl_module_permission")->row();

                    if($prv->status==1)
                    {
                       $checkbox="checked";
                    }
                    else
                    {
                       $checkbox="";
                    }
                    $push_array=array(
                                       'privilege_id'=>$row55->privilege_id,
                                       'privilege'=>$row55->privilege,
                                       'privilege_key'=>$row55->privilege_key,
                                       'status  '=>$row55->status ,
                                       'checkbox'=>$checkbox
                                    );
                  array_push($feature_id_array, $push_array);
                }

               $newarray=array('module_id'=>$module_id,'component_title'=>$res->component_title,'component_id'=>$res->component_id,'privilege'=>$feature_id_array); 
               array_push($finalarray, $newarray);
            }   
          return $finalarray;
     } 

    public function SetUserPermission2($formdata)
    {
        $user_id=$formdata['emp_id'];
        $feature_ids_array=$formdata['feature_ids'];
        $action_for=$formdata['action_for'];


        $module_ids=$this->session->module_ids;
        $module_ids_final=explode(",", $module_ids);       
        $this->db->where_in("module_id",$module_ids_final); 
        $modules=$this->db->get("tbl_modules")->result();
        foreach ($modules as $row) 
        {
          $module_id=$row->module_id;
          $component_ids=explode(",", $row->component_ids);  
          $this->db->where_in("component_id",$component_ids);
          $this->db->where("component_status",1);
          $feature_data=$this->db->get("tbl_feature_list")->result();

          foreach ($feature_data as $res)
          {
              $component_id=$res->component_id;
              $Privilegeids=explode(",", $res->Privilegeids);
              for($c=0;$c<count($Privilegeids);$c++)
              { 
                  $priviledge_id=$Privilegeids[$c];
                  $custom_id=$component_id.'/'.$priviledge_id;
                  
                  $this->db->select("privilege_key");  
                  $this->db->where("privilege_id",$priviledge_id);
                  $prv_res=$this->db->get("tbl_privilege")->row();

                  if(in_array($custom_id, $feature_ids_array))
                  {
                        $this->db->where("feature_id",$component_id);
                        $this->db->where("priviledge_id",$priviledge_id);
                        $this->db->where("module_id",$module_id);
                        $this->db->where("user_id",$user_id);
                        $prv=$this->db->get("tbl_module_permission")->result();

                        if(count($prv)>0)
                        {
                          $UpdateArray=array(
                                         'user_id'=>$user_id,
                                         'module_id'=>$module_id,
                                         'feature_id'=>$component_id,
                                         'priviledge_id'=>$priviledge_id,
                                         'priviledge_key'=>$prv_res->privilege_key,
                                         'status'=>1
                                      );
                            $this->db->where("feature_id",$component_id);
                            $this->db->where("priviledge_id",$priviledge_id);
                            $this->db->where("module_id",$module_id);
                            $this->db->where("user_id",$user_id);  
                            $this->db->Update("tbl_module_permission",$UpdateArray);
                        }
                        else
                        {
                          $InsertArray=array(
                                         'user_id'=>$user_id,
                                         'module_id'=>$module_id,
                                         'feature_id'=>$component_id,
                                         'priviledge_id'=>$priviledge_id,
                                         'priviledge_key'=>$prv_res->privilege_key,
                                         'status'=>1,
                                         'date_created'=>date('Y-m-d H:i:s')
                                      );
                            $this->db->Insert("tbl_module_permission",$InsertArray);
                        }                     
                  }
                  else
                  {
                        $this->db->where("feature_id",$component_id);
                        $this->db->where("priviledge_id",$priviledge_id);
                        $this->db->where("module_id",$module_id);
                        $this->db->where("user_id",$user_id);
                        $prv=$this->db->get("tbl_module_permission")->result();

                        if(count($prv)>0)
                        {
                          $UpdateArray=array(
                                         'user_id'=>$user_id,
                                         'module_id'=>$module_id,
                                         'feature_id'=>$component_id,
                                         'priviledge_id'=>$priviledge_id,
                                         'priviledge_key'=>$prv_res->privilege_key,
                                         'status'=>0
                                      );
                            $this->db->where("feature_id",$component_id);
                            $this->db->where("priviledge_id",$priviledge_id);
                            $this->db->where("module_id",$module_id);
                            $this->db->where("user_id",$user_id);  
                            $this->db->Update("tbl_module_permission",$UpdateArray);
                        }
                        else
                        {
                          $InsertArray=array(
                                       'user_id'=>$user_id,
                                       'module_id'=>$module_id,
                                       'feature_id'=>$component_id,
                                       'priviledge_id'=>$priviledge_id,
                                       'priviledge_key'=>$prv_res->privilege_key,
                                       'status'=>0,
                                       'date_created'=>date('Y-m-d H:i:s')
                                    );
                            $this->db->Insert("tbl_module_permission",$InsertArray);
                        } 
                 }
              }
          }
        }
    }

    public function SetUserPermission($formdata)
    {
        $emp_id=$formdata['emp_id'];
        $feature_ids_array=$formdata['feature_ids'];

        $ids=array();
        for($i=0;$i<count($feature_ids_array);$i++)
        {
          $val=$feature_ids_array[$i];
          $module_res=explode("/", $val);
          $holding_module=$module_res[0];
          array_push($ids, $holding_module);
        }
        $ids=array_unique($ids);
          // $this->db->where_in("module_id",$module_ids);
          $modules=$this->db->get("tbl_modules")->result();
          foreach ($modules as $row) 
          {
              $module_id=$row->module_id; 
              $component_id=explode(",", $row->component_ids);  

              for($a=0;$a<count($component_id);$a++)
              {
                  $comp_id=$component_id[$a];
                  $this->db->select("Privilegeids");
                  $this->db->where("component_id",$comp_id);
                  $query_res=$this->db->get("tbl_feature_list")->row();
                  $Privilegeids=explode(",", $query_res->Privilegeids);

                  if(in_array($comp_id, $ids))
                  {
                      for($b=0;$b<count($Privilegeids);$b++)
                      {
                          $Privilegeid=$Privilegeids[$b];
                          $insertArray=array(
                                             'emp_id'=>$emp_id,
                                             'module_id'=>$module_id,
                                             'feature_id'=>$comp_id,
                                             'priviledge_id'=>$Privilegeids[$b],
                                             'status'=>1
                                          );                  
                          $this->db->Insert("tbl_user_feature_permission",$insertArray);
                      }
                  }
                  else
                  {
                    for($b=0;$b<count($Privilegeids);$b++)
                    {
                        $Privilegeid=$Privilegeids[$b];
                        $insertArray=array(
                                           'emp_id'=>$emp_id,
                                           'module_id'=>$module_id,
                                           'feature_id'=>$comp_id,
                                           'priviledge_id'=>$Privilegeids[$b],
                                           'status'=>0
                                        );                  
                        $this->db->Insert("tbl_user_feature_permission",$insertArray);
                    }
                  }  
              }
          }
    }
    
    public function SetRolePermission($formdata)
    {
      $role=$formdata['role'];
      $role_description=$formdata['role_description'];
      
      $data = array(
        'role_name' => $role,
        'org_id' => $_SESSION['org_id'],
        'role_description' => $role_description,
        'status' => 0
      );
      $this->db->Insert("tbl_role",$data);
      $role_id = $this->db->insert_id();

      $feature_ids_array=$formdata['feature_ids'];
      
      $module_ids=$this->session->module_ids;
      $module_ids_final=explode(",", $module_ids);       
      $this->db->where_in("module_id",$module_ids_final); 
      $modules=$this->db->get("tbl_modules")->result();
      foreach ($modules as $row) 
      {
        $module_id=$row->module_id;
        $component_ids=explode(",", $row->component_ids);  
        $this->db->where_in("component_id",$component_ids);
        $this->db->where("component_status",1);
        $feature_data=$this->db->get("tbl_feature_list")->result();

        foreach ($feature_data as $res)
        {
            $component_id=$res->component_id;
            $Privilegeids=explode(",", $res->Privilegeids);
            for($c=0;$c<count($Privilegeids);$c++)
            { 
                $priviledge_id=$Privilegeids[$c];
                $custom_id=$component_id.'/'.$priviledge_id;
                
                $this->db->select("privilege_key");  
                $this->db->where("privilege_id",$priviledge_id);
                $prv_res=$this->db->get("tbl_privilege")->row();

                if(in_array($custom_id, $feature_ids_array))
                {
                      $this->db->where("feature_id",$component_id);
                      $this->db->where("priviledge_id",$priviledge_id);
                      $this->db->where("module_id",$module_id);
                      $this->db->where("role_id",$role_id);
                      $prv=$this->db->get("tbl_role_permission")->result();

                      if(count($prv)>0)
                      {
                        $UpdateArray=array(
                                       'role_id'=>$role_id,
                                       'module_id'=>$module_id,
                                       'feature_id'=>$component_id,
                                       'priviledge_id'=>$priviledge_id,
                                       'priviledge_key'=>$prv_res->privilege_key,
                                       'status'=>1
                                    );
                          $this->db->where("feature_id",$component_id);
                          $this->db->where("priviledge_id",$priviledge_id);
                          $this->db->where("module_id",$module_id);
                          $this->db->where("role_id",$role_id);  
                          $this->db->Update("tbl_role_permission",$UpdateArray);
                      }
                      else
                      {
                        $InsertArray=array(
                                       'role_id'=>$role_id,
                                       'module_id'=>$module_id,
                                       'feature_id'=>$component_id,
                                       'priviledge_id'=>$priviledge_id,
                                       'priviledge_key'=>$prv_res->privilege_key,
                                       'status'=>1,
                                       'date_created'=>date('Y-m-d H:i:s')
                                    );
                          $this->db->Insert("tbl_role_permission",$InsertArray);
                      }                     
                }
                else
                {
                      $this->db->where("feature_id",$component_id);
                      $this->db->where("priviledge_id",$priviledge_id);
                      $this->db->where("module_id",$module_id);
                      $this->db->where("role_id",$role_id);
                      $prv=$this->db->get("tbl_role_permission")->result();

                      if(count($prv)>0)
                      {
                        $UpdateArray=array(
                                       'role_id'=>$role_id,
                                       'module_id'=>$module_id,
                                       'feature_id'=>$component_id,
                                       'priviledge_id'=>$priviledge_id,
                                       'priviledge_key'=>$prv_res->privilege_key,
                                       'status'=>0
                                    );
                          $this->db->where("feature_id",$component_id);
                          $this->db->where("priviledge_id",$priviledge_id);
                          $this->db->where("module_id",$module_id);
                          $this->db->where("role_id",$role_id);  
                          $this->db->Update("tbl_role_permission",$UpdateArray);
                      }
                      else
                      {
                        $InsertArray=array(
                                     'role_id'=>$role_id,
                                     'module_id'=>$module_id,
                                     'feature_id'=>$component_id,
                                     'priviledge_id'=>$priviledge_id,
                                     'priviledge_key'=>$prv_res->privilege_key,
                                     'status'=>0,
                                     'date_created'=>date('Y-m-d H:i:s')
                                  );
                          $this->db->Insert("tbl_role_permission",$InsertArray);
                      } 
               }
            }
        }
      }

      $report_ids_array=$formdata['report_id'];
      $frequency_id = array();
      $report_id = array();
      foreach ($report_ids_array as $item) 
      {
          $parts = explode('/', $item); // Split each item by '/'
          $frequency_id = $parts[0]; // Add the first part to the $numbers array
          $frequency_name = $this->db->select('frequency_name')->from('tbl_frequency_type')->where('id',$frequency_id)->get()->row()->frequency_name;
          $frequency = $this->db->select('frequency_type')->from('tbl_frequency_type')->where('id',$frequency_id)->get()->row()->frequency_type;
          $report_id = $parts[1];
          $report_name = $this->db->select('report_type')->from('tbl_frequency_wise_report_type')->where('report_type_id',$report_id)->get()->row()->report_type;
          $data_report = array(
              'role_id' => $role_id,
              'org_id' => $_SESSION['org_id'],
              'frequency_id' => $frequency_id,
              'report_id' => $report_id,
              'frequency_name' => $frequency_name,
              'frequency' => $frequency,
              'report_name' => $report_name,
              'status' => 0
            );
            
            $this->db->Insert("tbl_role_permisssion_report",$data_report);
      }
      die;
    }

  public function get_role_list()
  {
    $this->db->where('org_id',$_SESSION['org_id']);
    $this->db->where('status',0);
    $this->db->order_by('role_id','DESC');
    return $this->db->get('tbl_role')->result_array();
  }

  public function edit_mastergroup($formdata)
  {
    $role_id = $formdata['role_id'];

    $module_ids = $this->session->module_ids;
    $module_ids_final = explode(",", $module_ids);
    $this->db->where_in("module_id", $module_ids_final);
    $modules = $this->db->get("tbl_modules")->result();
    $component_ids = array();
    foreach ($modules as $row) {
      $component_id = explode(",", $row->component_ids);
      for ($a = 0; $a < count($component_id); $a++) {
        array_push($component_ids, $component_id[$a]);
      }
    }

    $this->db->where_in("component_id", $component_ids);
    $this->db->where("component_status", 1);
    $data = $this->db->get("tbl_feature_list")->result();
    $finalarray = array();
    foreach ($data as $res) {
      $component_id = $res->component_id;
      // -----------------------------------------------
      $where = "FIND_IN_SET('" . $component_id . "', component_ids)";
      $this->db->where($where);
      $modules_res = $this->db->get("tbl_modules")->row();
      $module_id = $modules_res->module_id;
      // -----------------------------------------------
      $Privilegeids = $res->Privilegeids;
      $Privilegeids = explode(",", $Privilegeids);
      $this->db->where_in("privilege_id", $Privilegeids);
      $query = $this->db->get("tbl_privilege")->result();

      $feature_id_array = array();
      foreach ($query as  $row55) {
        $priviledge_id = $row55->privilege_id;
        $this->db->where("feature_id", $component_id);
        $this->db->where("priviledge_id", $priviledge_id);
        $this->db->where("module_id", $module_id);
        $this->db->where("role_id", $role_id);
        $prv = $this->db->get("tbl_role_permission")->row();

        if ($prv->status == 1) {
          $checkbox = "checked";
        } else {
          $checkbox = "";
        }
        $push_array = array(
          'privilege_id' => $row55->privilege_id,
          'privilege' => $row55->privilege,
          'privilege_key' => $row55->privilege_key,
          'status  ' => $row55->status,
          'checkbox' => $checkbox
        );
        array_push($feature_id_array, $push_array);
      }

      $newarray = array('module_id' => $module_id, 'component_title' => $res->component_title, 'component_id' => $res->component_id, 'privilege' => $feature_id_array);
      array_push($finalarray, $newarray);
    }
    return $finalarray;
  } 

  public function role_data($formdata)
  {
    $this->db->where('role_id',$formdata['role_id']);
    $this->db->where('org_id',$_SESSION['org_id']);
    return $this->db->get('tbl_role')->row();
  }

  public function EditRolePermission($formdata)
  {
    $role_id=$formdata['role_id'];
    $role=$formdata['role'];
    $role_description=$formdata['role_description'];

    $data = array(
      'role_name' => $role,
      'role_description' => $role_description,
    );
    $this->db->where('role_id',$role_id);
    $this->db->update("tbl_role",$data);

    $feature_ids_array=$formdata['feature_ids'];
    


    $module_ids=$this->session->module_ids;
    $module_ids_final=explode(",", $module_ids);       
    $this->db->where_in("module_id",$module_ids_final); 
    $modules=$this->db->get("tbl_modules")->result();
    foreach ($modules as $row) 
    {
      $module_id=$row->module_id;
      $component_ids=explode(",", $row->component_ids);  
      $this->db->where_in("component_id",$component_ids);
      $this->db->where("component_status",1);
      $feature_data=$this->db->get("tbl_feature_list")->result();

      foreach ($feature_data as $res)
      {
          $component_id=$res->component_id;
          $Privilegeids=explode(",", $res->Privilegeids);
          for($c=0;$c<count($Privilegeids);$c++)
          { 
              $priviledge_id=$Privilegeids[$c];
              $custom_id=$component_id.'/'.$priviledge_id;
              
              $this->db->select("privilege_key");  
              $this->db->where("privilege_id",$priviledge_id);
              $prv_res=$this->db->get("tbl_privilege")->row();

              if(in_array($custom_id, $feature_ids_array))
              {
                    $this->db->where("feature_id",$component_id);
                    $this->db->where("priviledge_id",$priviledge_id);
                    $this->db->where("module_id",$module_id);
                    $this->db->where("role_id",$role_id);
                    $prv=$this->db->get("tbl_role_permission")->result();

                    if(count($prv)>0)
                    {
                      $UpdateArray=array(
                                      'role_id'=>$role_id,
                                      'module_id'=>$module_id,
                                      'feature_id'=>$component_id,
                                      'priviledge_id'=>$priviledge_id,
                                      'priviledge_key'=>$prv_res->privilege_key,
                                      'status'=>1
                                  );
                        $this->db->where("feature_id",$component_id);
                        $this->db->where("priviledge_id",$priviledge_id);
                        $this->db->where("module_id",$module_id);
                        $this->db->where("role_id",$role_id);  
                        $this->db->Update("tbl_role_permission",$UpdateArray);
                    }
                    else
                    {
                      $InsertArray=array(
                                      'role_id'=>$role_id,
                                      'module_id'=>$module_id,
                                      'feature_id'=>$component_id,
                                      'priviledge_id'=>$priviledge_id,
                                      'priviledge_key'=>$prv_res->privilege_key,
                                      'status'=>1,
                                      'date_created'=>date('Y-m-d H:i:s')
                                  );
                        $this->db->Insert("tbl_role_permission",$InsertArray);
                    }                     
              }
              else
              {
                    $this->db->where("feature_id",$component_id);
                    $this->db->where("priviledge_id",$priviledge_id);
                    $this->db->where("module_id",$module_id);
                    $this->db->where("role_id",$role_id);
                    $prv=$this->db->get("tbl_role_permission")->result();

                    if(count($prv)>0)
                    {
                      $UpdateArray=array(
                                      'role_id'=>$role_id,
                                      'module_id'=>$module_id,
                                      'feature_id'=>$component_id,
                                      'priviledge_id'=>$priviledge_id,
                                      'priviledge_key'=>$prv_res->privilege_key,
                                      'status'=>0
                                  );
                        $this->db->where("feature_id",$component_id);
                        $this->db->where("priviledge_id",$priviledge_id);
                        $this->db->where("module_id",$module_id);
                        $this->db->where("role_id",$role_id);  
                        $this->db->Update("tbl_role_permission",$UpdateArray);
                    }
                    else
                    {
                      $InsertArray=array(
                                    'role_id'=>$role_id,
                                    'module_id'=>$module_id,
                                    'feature_id'=>$component_id,
                                    'priviledge_id'=>$priviledge_id,
                                    'priviledge_key'=>$prv_res->privilege_key,
                                    'status'=>0,
                                    'date_created'=>date('Y-m-d H:i:s')
                                );
                        $this->db->Insert("tbl_role_permission",$InsertArray);
                    } 
              }
          }
      }
    }


    $report_ids_array=$formdata['report_id'];
    $frequency_id = array();
    $report_id = array();
    foreach ($report_ids_array as $item) 
    {
        $parts = explode('/', $item); // Split each item by '/'
        $frequency_id = $parts[0]; // Add the first part to the $numbers array
        $report_id = $parts[1];

        $check = $this->db->select('*')->from('tbl_role_permisssion_report')->where('role_id',$role_id)->where('report_id', $report_id)->where('frequency_id',$frequency_id)->get()->result();
        if(!empty($check))
        {

        }
        else
        {
            $frequency_name = $this->db->select('frequency_name')->from('tbl_frequency_type')->where('id',$frequency_id)->get()->row()->frequency_name;
            $frequency = $this->db->select('frequency_type')->from('tbl_frequency_type')->where('id',$frequency_id)->get()->row()->frequency_type;
            $report_name = $this->db->select('report_type')->from('tbl_frequency_wise_report_type')->where('report_type_id',$report_id)->get()->row()->report_type;
            $data_report = array(
                'role_id' => $role_id,
                'org_id' => $_SESSION['org_id'],
                'frequency_id' => $frequency_id,
                'report_id' => $report_id,
                'frequency_name' => $frequency_name,
                'frequency' => $frequency,
                'report_name' => $report_name,
                'status' => 0
              );
              $this->db->Insert("tbl_role_permisssion_report",$data_report);
        }
        
    }

    $get_list = $this->db->select('frequency_id,report_id')->from('tbl_role_permisssion_report')->where('role_id',$role_id)->get()->result();
    foreach($get_list as $abc)
    {
      $get_value[] = $abc->frequency_id .'/' . $abc->report_id;
      
    }
  
    $notInReportIds = array_diff($get_value, $report_ids_array);
    foreach ($notInReportIds as $item1) 
    {
        $parts_1 = explode('/', $item1); // Split each item by '/'
        $frequency_id_1 = $parts_1[0]; // Add the first part to the $numbers array
        $report_id_1 = $parts_1[1];
        $update = array(
                  'role_id' => $role_id,
                  'org_id' => $_SESSION['org_id'],
                  'frequency_id' => $frequency_id_1,
                  'report_id' => $report_id_1,
                );
        $this->db->where($update);
        $this->db->set('status',1);
        $this->db->update('tbl_role_permisssion_report'); 
      
    }
    // print_r($notInReportIds); 
    // die;
    
    // 
    
  }

  public function CopyPermission_assign_role($formdata)
  {
    $role_id = $formdata['role_id'];
    $employee_id = $formdata['employee_id'];
    foreach($employee_id as $emp)
    {
      $this->db->set('role_id',$role_id);
      $this->db->where('id',$emp);
      $this->db->update('tbl_admin_login');

      $this->db->where('user_id',$emp);
      $this->db->delete('tbl_module_permission');

      $final_array = array();
      $this->db->where('role_id',$role_id);
      $role_permission = $this->db->get("tbl_role_permission")->result_array();
      
      for($i=0;$i<count($role_permission);$i++)
      {
          $data = array(
            'user_id' => $emp,
            'module_id' => $role_permission[$i]['module_id'],
            'feature_id' => $role_permission[$i]['feature_id'],
            'priviledge_id' => $role_permission[$i]['priviledge_id'],
            'priviledge_key' => $role_permission[$i]['priviledge_key'],
            'status' => $role_permission[$i]['status'],
            'date_created' => date('Y-m-d H:i:s')
          );
          array_push($final_array,$data); 
      }
      $this->db->insert_batch('tbl_module_permission',$final_array);

      $final_array_report = array();
      $this->db->where('role_id',$role_id);
      $role_report_permission = $this->db->get("tbl_role_permisssion_report")->result_array();
      
      $this->db->where('user_id',$emp);
      $this->db->delete('tbl_userwise_role_report');

      for($i=0;$i<count($role_report_permission);$i++)
      {
          $data_report = array(
            'user_id' => $emp,
            'org_id' => $_SESSION['org_id'],
            'frequency_id' => $role_report_permission[$i]['frequency_id'],
            'report_id' => $role_report_permission[$i]['report_id'],
            'frequency_name' => $role_report_permission[$i]['frequency_name'],
            'frequency' => $role_report_permission[$i]['frequency'],
            'report_name' => $role_report_permission[$i]['report_name'],
            'status' => $role_report_permission[$i]['status'],
          );
          array_push($final_array_report,$data_report); 
      }
      if(!empty($final_array_report))
      {
        $this->db->insert_batch('tbl_userwise_role_report',$final_array_report);
      }
      else
      {
        
      }

    }
  }


  public function CopyPermission($formdata)
  {
    $role_id = $formdata['role_id'];
    $employee_id = $formdata['copy_employee_id'];
    
    $this->db->set('role_id',$role_id);
    $this->db->where('id',$employee_id);
    $this->db->update('tbl_admin_login');

    $this->db->where('user_id',$employee_id);
    $this->db->delete('tbl_module_permission');

    $final_array = array();
    $this->db->where('role_id',$role_id);
    $role_permission = $this->db->get("tbl_role_permission")->result_array();
    
    for($i=0;$i<count($role_permission);$i++)
    {
        $data = array(
          'user_id' => $employee_id,
          'module_id' => $role_permission[$i]['module_id'],
          'feature_id' => $role_permission[$i]['feature_id'],
          'priviledge_id' => $role_permission[$i]['priviledge_id'],
          'priviledge_key' => $role_permission[$i]['priviledge_key'],
          'status' => $role_permission[$i]['status'],
          'date_created' => date('Y-m-d H:i:s')
        );
        array_push($final_array,$data); 
    }
    $this->db->insert_batch('tbl_module_permission',$final_array);

    $final_array_report = array();
    $this->db->where('role_id',$role_id);
    $role_report_permission = $this->db->get("tbl_role_permisssion_report")->result_array();
    
    $this->db->where('user_id',$employee_id);
    $this->db->delete('tbl_userwise_role_report');

    for($i=0;$i<count($role_report_permission);$i++)
    {
        $data_report = array(
          'user_id' => $employee_id,
          'org_id' => $_SESSION['org_id'],
          'frequency_id' => $role_report_permission[$i]['frequency_id'],
          'report_id' => $role_report_permission[$i]['report_id'],
          'frequency_name' => $role_report_permission[$i]['frequency_name'],
          'frequency' => $role_report_permission[$i]['frequency'],
          'report_name' => $role_report_permission[$i]['report_name'],
          'status' => $role_report_permission[$i]['status'],
        );
        array_push($final_array_report,$data_report); 
    }
    if(!empty($final_array_report))
    {
      $this->db->insert_batch('tbl_userwise_role_report',$final_array_report);
    }
    else
    {
      
    }

  }

  public function updateCopyPermission($formdata)
  {
    $emp_id =  $formdata['emp_id'];
    $feature_ids = $formdata['feature_ids'];
    $arr = array();
    for($i=0;$i<count($feature_ids);$i++)
    {
      $a = $feature_ids[$i];
      $str_arr[] = explode ("/", $a); ; 
    }
    for($j=0;$j<count($str_arr);$j++)
    {
      $b = $str_arr[$j];
      $feature_id = $str_arr[$j][0];
      $priviledge_id = $str_arr[$j][1];
      $this->db->where(['user_id'=>$emp_id,'feature_id'=>$feature_id,'priviledge_id'=>$priviledge_id]);
      $this->db->set('status',1);
      $this->db->update('tbl_module_permission');
    }
    $get_list_module = $this->db->select('feature_id,priviledge_id')->from('tbl_module_permission')->where('user_id',$emp_id)->get()->result();
    foreach($get_list_module as $abc)
    {
      $get_value_module[] = $abc->feature_id .'/' . $abc->priviledge_id;
    }
    
    $notInmoduleIds = array_diff($get_value_module, $feature_ids);
    foreach ($notInmoduleIds as $item1) 
    {
        $parts_1 = explode('/', $item1); // Split each item by '/'
        $feature_id = $parts_1[0]; // Add the first part to the $numbers array
        $priviledge_id = $parts_1[1];
        $update = array(
                  'user_id' => $emp_id,
                  'feature_id' => $feature_id,
                  'priviledge_id' => $priviledge_id,
                );
        $this->db->where($update);
        $this->db->set('status',0);
        $this->db->update('tbl_module_permission'); 
      
    }

    $report_id = $formdata['report_id'];
    $arr_report = array();
    for($k=0;$k<count($report_id);$k++)
    {
      $c= $report_id[$k];
      $str_arr_report[] = explode ("/", $c); ; 
    }

    
    for($l=0;$l<count($str_arr_report);$l++)
    {
      $d = $str_arr_report[$l];
      $frequency_id_get = $str_arr_report[$l][0];
      $report_id_get = $str_arr_report[$l][1];

      $frequency_name = $this->db->select('frequency_name')->from('tbl_frequency_type')->where('id',$frequency_id_get)->get()->row()->frequency_name;
      $report_name = $this->db->select('report_type')->from('tbl_frequency_wise_report_type')->where('report_type_id',$report_id_get)->get()->row()->report_type;
      $frequency = $this->db->select('frequency_type')->from('tbl_frequency_type')->where('id',$frequency_id_get)->get()->row()->frequency_type;


      $check_exist = $this->db->select('*')->from('tbl_userwise_role_report')->where(['user_id'=>$emp_id,'frequency_id'=>$frequency_id_get,'report_id'=>$report_id_get])->get()->result();
      if(!empty($check_exist))
      {
        $this->db->where(['user_id'=>$emp_id,'frequency_id'=>$frequency_id_get,'report_id'=>$report_id_get]);
        $this->db->set('status',0);
        $this->db->update('tbl_userwise_role_report');
      }
      else
      {
        $data_report = array(
          'user_id' => $emp_id,
          'org_id' => $_SESSION['org_id'],
          'frequency_id' => $frequency_id_get,
          'report_id' => $report_id_get,
          'frequency_name' => $frequency_name,
          'frequency' => $frequency,
          'report_name' => $report_name,
          'status' => 0,
        );
        $this->db->insert('tbl_userwise_role_report',$data_report);
 
      }
    }

    $get_list_report = $this->db->select('frequency_id,report_id')->from('tbl_userwise_role_report')->where('user_id',$emp_id)->get()->result();
    foreach($get_list_report as $report)
    {
      $get_value_report[] = $report->frequency_id .'/' . $report->report_id;
    }
    
    $notInReportIds = array_diff($get_value_report, $report_id);

    foreach ($notInReportIds as $item2) 
    {
        $parts_2 = explode('/', $item2); // Split each item by '/'
        $frequency_id = $parts_2[0]; // Add the first part to the $numbers array
        $report_id = $parts_2[1];
        $update = array(
                  'user_id' => $emp_id,
                  'frequency_id' => $frequency_id,
                  'report_id' => $report_id,
                );
        $this->db->where($update);
        $this->db->set('status',1);
        $this->db->update('tbl_userwise_role_report'); 
      
    }
    
  }

  public function deleteRolePermission($role_id)
  {
        $this->db->where('role_id',$role_id);
        $this->db->set('status',1);
        $this->db->update('tbl_role');

        $this->db->where('role_id',$role_id);
        $this->db->set('status',1);
        $this->db->update('tbl_role_permission');

        $this->db->where('role_id',$role_id);
        $this->db->set('status',1);
        $this->db->update('tbl_role_permisssion_report');
  }
  public function get_list_report()
  {
     return $this->db->select('*')->from('tbl_frequency_wise_report_type')->where('org_id',$this->session->org_id)->group_by('frequency_name')->get()->result();
  }

  public function edit_report_list($formdata)
  {
      $role_id = $formdata['role_id'];
      return $this->db->select('*')->from('tbl_role_permisssion_report')->where('role_id',$role_id)->get()->result();
  }

  public function GetUserPermission_report($formdata)
  {
    
    $user_id = $formdata['employee_id'];
    $this->db->where("user_id",$user_id);
    $prv=$this->db->get("tbl_userwise_role_report")->result();
    for($i=0;$i<count($prv);$i++)
    {
      if($prv[$i]->status==1)
      {
          $checkbox="checked";
      }
      else
      {
          $checkbox="";
      }
      $push_array[]=array(
          'frequency_id'=> $prv[$i]->frequency_id,
          'report_id'=> $prv[$i]->report_id,
          'frequency_name'=> $prv[$i]->frequency_name,
          'report_name'=> $prv[$i]-> report_name,
          'checkbox'=>$checkbox
      );
    }
    return $push_array;
  }
}

?>


