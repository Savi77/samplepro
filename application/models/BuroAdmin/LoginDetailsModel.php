<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginDetailsModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function LoginDetailsData()
    {
        return $this->db->query("SELECT * FROM `tbl_login_details`")->row();
    }
}
