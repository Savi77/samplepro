<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs_model extends CI_Model {

    	public function __construct() 
        {
          parent::__construct();
          //echo 'Hello World2';
         }
         public function Contact_details()
         {
           return $this->db->query("SELECT * FROM `tbl_contact` ORDER BY contact_id DESC");
         }
} 
