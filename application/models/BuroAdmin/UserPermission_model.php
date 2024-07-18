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

    public function GetUserPermission()
    {
        $id=$_REQUEST['employee_id'];       
        $this->db->select("module_ids");
        $this->db->where("id",$id);
        $res=$this->db->get("tbl_admin_login")->row();
        $module_ids=explode(",", $res->module_ids);
       // echo count($module_ids);
        if(count($module_ids)>1)
        {
            $this->db->where_in("module_id",$module_ids);
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
            // echo json_encode($finalarray);
        }
        else
        {
            $finalarray=array();
        }
       return $finalarray;
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


        $this->db->select("module_ids");
        $this->db->where("id",$emp_id);
        $res=$this->db->get("tbl_admin_login")->row();
        $module_ids=explode(",", $res->module_ids);

        //---------------------------------------------------
          $this->db->where_in("module_id",$module_ids);
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
        //------------------------------------------------------------------



    }
     













}

?>


