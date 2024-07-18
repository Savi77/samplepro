
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model
 {
	public function __construct() 
    {
       parent::__construct();
    }

    public function get_list()
    {
    	$this->db->where("status",1);
    	$data=$this->db->get("tbl_modules")->result();
        $finalarray=array();
        $labelarray=array('blue','teal','brown','grey','slate','pink','purple','green','violet','indigo','orange','slate','pink','purple','green','violet');
        foreach ($data as $res)
        {
           $component_ids=$res->component_ids;
           if(!empty($component_ids))
           {
                $feature='';
                $component_ids=explode(",",$component_ids);
                $this->db->where_in("component_id",$component_ids);
                $query=$this->db->get("tbl_feature_list")->result();
                $index=0;   
                foreach ($query as  $row) 
                {
                    // $randIndex = array_rand($labelarray);
                  $label=$labelarray[$index];
                  $title='<span class="">'.$row->component_title.'</span>';
                  $feature=$feature.$title.'<br/>';
                  $index++;
                }  
           }
           else
           {
             $feature='';
           }
           $newarray=array('module_name'=>$res->module_name,'module_id'=>$res->module_id,'feature'=>$feature); 
          array_push($finalarray, $newarray);
        }   
        return $finalarray;
    }	


    public function component_list()
    {
        $this->db->where("component_status",1);
        return $this->db->get("tbl_feature_list")->result();
    }

    public function module_list()
    {
        $this->db->where("status",1);
        return $this->db->get("tbl_modules")->result();
    }


    public function AddDetails($formdata)
    {
        if(!empty($formdata['component_ids']))
        {
           $component_ids=implode(",",$formdata['component_ids']);
        }
        else
        {
            $component_ids='';
        }
    	$Array=array('module_name'=>$formdata['module_name'],'price'=>$formdata['price'],'component_ids'=>$component_ids,'status'=>1,'date_created'=>date("Y-m-d H:i:s"));
    	$this->db->insert('tbl_modules',$Array);
    }	

    public function EditDetails($module_id)
    {
    	$this->db->where("module_id",$module_id);
    	return $this->db->get("tbl_modules")->result();
    }	

    public function UpdateDetails($formdata)
    {
        if(!empty($formdata['component_ids']))
        {
           $component_ids=implode(",",$formdata['component_ids']);
           $this->db->SET("component_ids",$component_ids);
        }
        $this->db->SET("module_name",$formdata['module_name']);
    	$this->db->where("module_id",$formdata['module_id']);
    	$this->db->update('tbl_modules');
    }	

    public function DeleteDetails($module_id)
    {
    	$Array=array('status'=>0);
    	$this->db->where("module_id",$module_id);
    	$this->db->update('tbl_modules',$Array);
    }

//----------------------------------------------------------------

    public function PlanMaster_list()
    {
    	$this->db->where("status",1);
    	$data=$this->db->get("tbl_plan_master")->result();
        $finalarray=array();
        $labelarray=array('blue','teal','brown','grey','slate','pink','purple','green','violet','indigo','orange','slate','pink','purple','green','violet');
        foreach ($data as $res)
        {
           $module_id=$res->module_id;
           if(!empty($module_id))
           {
                $module='';
                $module_ids=explode(",",$module_id);
                $this->db->where_in("module_id",$module_ids);
                $query=$this->db->get("tbl_modules")->result();
                $index=0;   
                foreach ($query as  $row) 
                {
                  $label=$labelarray[$index];
                  $title='<span class="">'.$row->module_name.'</span>';
                  $module=$module.$title.'<br/>';
                  $index++;
                }  
           }
           else
           {
             $module='';
           }
           $newarray=array('plan_name'=>$res->plan_name,'plan_id'=>$res->plan_id,'module'=>$module); 
          array_push($finalarray, $newarray);
        }   
        return $finalarray;
    }	


    public function AddDetailsPlanMaster($formdata)
    {
        if(!empty($formdata['module_ids']))
        {
           $module_ids=implode(",",$formdata['module_ids']);
        }
        else
        {
            $module_ids='';
        }
    	$Array=array('plan_name'=>$formdata['plan_name'],'price'=>$formdata['price'],'module_id'=>$module_ids,'discount_amount'=>$formdata['discount_amount'],'discount_perc'=>$formdata['discount_perc'],'status'=>1,'date_created'=>date("Y-m-d H:i:s"));
    	$this->db->insert('tbl_plan_master',$Array);
    }	

    public function EditDetailsPlanMaster($plan_id)
    {
    	$this->db->where("plan_id",$plan_id);
    	return $this->db->get("tbl_plan_master")->result();
    }	

    public function UpdateDetailsPlanMaster($formdata)
    {
        if(!empty($formdata['module_ids']))
        {
           $module_ids=implode(",",$formdata['module_ids']);
           $this->db->SET("module_id",$module_ids);
        }
        $this->db->SET("plan_name",$formdata['plan_name']);
        $this->db->SET("price",$formdata['price']);
        $this->db->SET("discount_amount",$formdata['discount_amount']);
        $this->db->SET("discount_perc",$formdata['discount_perc']);
    	$this->db->where("plan_id",$formdata['plan_id']);
    	$this->db->update('tbl_plan_master');
    }	

    public function DeleteDetailsPlanMaster($plan_id)
    {
    	$Array=array('status'=>0);
    	$this->db->where("plan_id",$plan_id);
    	$this->db->update('tbl_plan_master',$Array);
    }
    

    



}
