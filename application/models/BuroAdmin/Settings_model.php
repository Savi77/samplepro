<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    private $country_code;

    function __construct()
    {
        parent::__construct(); // construct the Model class
        $this->load->database();
        $this->country_code = array("country_code" => $this->session->country_code);
        // global $country_code;
    }

    public function EmailConfiguartion($formdata)
    {
        $this->db->where('emp_id', $this->session->id);
        $res = $this->db->get('tbl_org_email_configuration')->result();
        if (count($res) <= 0) {
            $Array = array(
                'from_name' => $formdata['from_name'],
                'host_name' => $formdata['host_name'],
                'email_id' => $formdata['email_id'],
                'email_pass' => $formdata['email_pass'],
                'port_number' => $formdata['port_number'],
                'protocol' => $formdata['protocol'],
                'emp_id' => $this->session->id,
                'secure' => $formdata['secure'],
            );
            $this->db->Insert("tbl_org_email_configuration", $Array);
        } else {
            $Array = array(
                'from_name' => $formdata['from_name'],
                'host_name' => $formdata['host_name'],
                'email_id' => $formdata['email_id'],
                'email_pass' => $formdata['email_pass'],
                'port_number' => $formdata['port_number'],
                'protocol' => $formdata['protocol'],
                'emp_id' => $this->session->id,
                'secure' => $formdata['secure'],
            );
            $this->db->where('emp_id', $this->session->id);
            $this->db->update("tbl_org_email_configuration", $Array);
        }
    }

    public function UpdateProfile($formdata)
    {
        $Array = array(
        'email' => $formdata['email'],
        'mobile_no' => $formdata['mobile_no']
        );
        $this->db->where('id', $this->session->id);
        $this->db->update("tbl_admin_login", $Array);
    }
    public function CheckPassword($password)
    {
        $this->db->where('id', $this->session->id);
        $this->db->where('Password', $password);
        $data = $this->db->get("tbl_admin_login")->result_array();
        return count($data);
    }

    public function UpdatePassword($formdata)
    {
        $Array = array(
            'Password' => $formdata['new_password']
        );
        $this->db->where('id', $this->session->id);
        $this->db->update("tbl_admin_login", $Array);
    }

    public function UpdateLogo($image_one,$image_two)
    {
        $cur_date_one = date("dmyHis");
        $sepext_one = explode('.', strtolower($image_one));
        $extension_one = end($sepext_one);
        $store_file_one = $cur_date_one . "1.$extension_one";
        $move_file_one = FCPATH . 'assets/images/web_images/';
        $move_file_1 = $move_file_one . basename($image_one);
        move_uploaded_file($_FILES['fileupone']['tmp_name'], $move_file_1);        

        $cur_date_two = date("dmyHis");
        $sepext_two = explode('.', strtolower($image_two));
        $extension_two = end($sepext_two);
        $store_file_two = $cur_date_two . "2.$extension_two";
        $move_file_two = FCPATH . 'assets/images/web_images/';
        $move_file_2 = $move_file_two . basename($image_two);
        move_uploaded_file($_FILES['fileuptwo']['tmp_name'], $move_file_2);

        $this->db->where('emp_id', $this->session->id);
        $res = $this->db->get('tbl_web_logo')->result();
        if (count($res) <= 0) {
            $Array = array(
                'emp_id' => $this->session->id,
                'logo_name_one' => $store_file_one,
                'logo_name_two' => $store_file_two,
            );
            $this->db->Insert("tbl_web_logo", $Array);
        }else {
            if ($image_one != '') {
                $this->db->set('logo_name_one',$image_one);
                $this->db->where('emp_id', $this->session->id);
                $this->db->update("tbl_web_logo");
            }
            if ($image_two != '') {
                $this->db->set('logo_name_two',$image_two);
                $this->db->where('emp_id', $this->session->id);
                $this->db->update("tbl_web_logo");
            }
        }


    }
}
