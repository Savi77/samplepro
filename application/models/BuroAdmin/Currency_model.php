<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends CI_Model
 {
    public function __construct() 
    {
        parent::__construct();
        //echo 'Hello World2';
    }

    public function get_list()
    {
        $this->db->where("status",1);
        $this->db->order_by("country","ASC");
        return $this->db->get("tbl_currency")->result();
    }	

    public function addDetails($formdata)
    {
        $Array=array('country'=>$formdata['country'],'currency_sign'=>$formdata['currency_sign'],'status'=>1);
        $this->db->insert('tbl_currency',$Array);
    }	

    public function EditDetails($currency_id)
    {
        $this->db->where("currency_id",$currency_id);
        return $this->db->get("tbl_currency")->result();
    }	

    public function UpdateDetails($formdata)
    {
        $Array=array('country'=>$formdata['country'],'currency_sign'=>$formdata['currency_sign']);
        $this->db->where("currency_id",$formdata['currency_id']);
        $this->db->update('tbl_currency',$Array);
    }	

    public function DeleteDetails($currency_id)
    {
        $Array=array('status'=>0);
        $this->db->where("currency_id",$currency_id);
        $this->db->update('tbl_currency',$Array);
    }
}