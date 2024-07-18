<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FeatureList_model extends CI_Model
 {
	public function __construct() 
    {
       parent::__construct();
    }

    public function get_list()
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
                $index=0;   
                foreach ($query as  $row) 
                {
                    // $randIndex = array_rand($labelarray);
                  $label=$labelarray[$index];
                  $privilege2='<span class="label bg-'.$label.'">'.$row->privilege.'</span>';
                  $privilege=$privilege.' '.$privilege2;
                  $index++;
                }  
           }
           else
           {
             $privilege='';
           }
           $newarray=array('component_title'=>$res->component_title,'component_id'=>$res->component_id,'privilege'=>$privilege); 
          array_push($finalarray, $newarray);
        }   
        return $finalarray;
    }	

    public function get_privilege_list()
    {
        $this->db->where("status",1);
        return $this->db->get("tbl_privilege")->result();
    }   

    public function AddDetails($formdata)
    {
        if(!empty($formdata['Privilegeids']))
        {
           $Privilegeids=implode(",",$formdata['Privilegeids']);
        }
        else
        {
            $Privilegeids='';
        }
    	$Array=array('component_title'=>$formdata['component_title'],'component_status'=>1,'Privilegeids'=>$Privilegeids);
    	$this->db->insert('tbl_feature_list',$Array);
    }	

    public function EditDetails($component_id)
    {
    	$this->db->where("component_id",$component_id);
    	return $this->db->get("tbl_feature_list")->result();
    }	

    public function UpdateDetails($formdata)
    {
        if(!empty($formdata['Privilegeids']))
        {
           $Privilegeids=implode(",",$formdata['Privilegeids']);
           $this->db->SET("Privilegeids",$Privilegeids);
        }
        $this->db->SET("component_title",$formdata['component_title']);
    	$this->db->where("component_id",$formdata['component_id']);
    	$this->db->update('tbl_feature_list',$Array);
    }	

    public function DeleteDetails($component_id)
    {
    	$Array=array('component_status'=>0);
    	$this->db->where("component_id",$component_id);
    	$this->db->update('tbl_feature_list',$Array);
    }




}