<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy_model extends CI_Model 
{

  public function __construct() 
  {
        parent::__construct();
        //echo 'Hello World2';
   }

  public function get_list()
  {
    return $this->db->get('tbl_policy')->result();
  }

  public function get_list1()
  {
    $this->db->where('status',1);
    return $this->db->get('tbl_policy');
  }

  public function get_data()
  {
    $where=array('section'=>'policy');
    $this->db->where($where);
    return $this->db->get('tbl_section_header')->result();
  }

   public function add($formdata)
    {
        $addmore=$formdata['task'];
        // print_r($addmore)
        $plans="";
        for ($i=0; $i < count($addmore); $i++) 
        { 
          $plans=$plans.$addmore[$i]."$";
        }
        $plans_list=substr($plans,0,-1);


        $date_created=date('Y-m-d H:i:s');

        $data=array(
                      'package_name'=>$formdata['package_name'],
                      'price'=>$formdata['price'],
                      'period'=>$formdata['period'],
                      'package_details'=>$plans_list,
                      'date_created'=>$date_created
                    );
        // print_r($data);
        $res=$this->db->insert('tbl_policy',$data);

        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
      
    }

    public function edit($id) 
    {
      $where=array('id'=>$id);
      $this->db->where($where);
      return  $this->db->get('tbl_policy');
    }

    public function delete($id)
    {   
       $this->db->where('id',$id);
       return $this->db->delete('tbl_policy');
    }

    public function deactivate($id)
    {   
       $this->db->set('status',0);
       $this->db->where('id',$id);
       return $this->db->update('tbl_policy');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
       $this->db->where('id',$id);
       return $this->db->update('tbl_policy');
    }

    public function update($formdata)
    {

        $addmore=$formdata['task'];
        // print_r($addmore);
        $plans="";
        for ($i=0; $i < count($addmore); $i++) 
        { 
          $plans=$plans.$addmore[$i]."$";
        }
        $plans_list=substr($plans,0,-1);

        $policyid = $formdata['policyid'];
        $where=array('id'=>$policyid);
        $this->db->where($where);
        $data=array(
                      'package_name'=>$formdata['package_name'],
                      'price'=>$formdata['price'],
                      'period'=>$formdata['period'],
                      'package_details'=>$plans_list
                    );
        // print_r($data);
         $this->db->update('tbl_policy', $data);
    }

    public function Update_header($formdata)
     {
        $where=array('section'=>'policy');
        $this->db->where($where);
        $data=array(
                    'title'=>$formdata['title'],
                    'description'=>$formdata['description']
                  );
        $this->db->update('tbl_section_header', $data);
     }



}

?>


