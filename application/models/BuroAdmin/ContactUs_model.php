<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactUs_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //echo 'Hello World2';
  }
  public function Contact_details()
  {
    return $this->db->query("SELECT * FROM `tbl_contact` ORDER BY contact_id DESC");
  }
  public function Contact_Details_Data()
  {
    return $this->db->query("SELECT * FROM `tbl_contact_details`")->row();
  }
  public function insertData($data)
  {
    if ($this->db->truncate('tbl_contact_details')) {
      $this->db->insert('tbl_contact_details',$data);
    }
  }
}
