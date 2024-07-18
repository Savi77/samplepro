
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{

  public function InsertGstDetails($formdata, $image)
  {
    $this->db->where('org_id', $this->session->org_id);
    $res = $this->db->get('tbl_org_gst_details')->result();
    if (count($res) <= 0) {
      $Array = array(
        'org_id' => $this->session->org_id,
        'gst_applicable' => $formdata['gst_applicable'],
        'gst_no' => $formdata['gst_no']
      );
      $this->db->Insert("tbl_org_gst_details", $Array);
    } else {
      $Array = array(
        'gst_applicable' => $formdata['gst_applicable'],
        'gst_no' => $formdata['gst_no']
      );
      $this->db->where('org_id', $this->session->org_id);
      $this->db->update("tbl_org_gst_details", $Array);
    }

    $file =  "assets/admin/company_attachment";
    $org_company_attachment = "";
    $config['upload_path'] = $file;
    $config['allowed_types'] = 'jpg|png|gif|pdf|doc|docx|jpeg|JPEG';
    $this->load->library('upload', $config);
    $fileSaveProfile = "org_company_attachment";
    if (!empty($_FILES[$fileSaveProfile])) {
      $data = array();
      if (!$this->upload->do_upload($fileSaveProfile)) {
        $error = array('error' => $this->upload->display_errors());
      } else {
        $dataCheque = $this->upload->data();
        $org_company_attachment = $dataCheque['file_name'];
      }
    }
    $move_file = FCPATH . 'assets/admin/company_logo/';
    $move_file1 = $move_file . basename($image);
    $date_created = date("Y-m-d H:i:s");
    move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);

    if ($org_company_attachment != "" && $image != "") {
      $org_Array = array(
        'org_cname' => $formdata['org_cname'],
        'org_cdomain' => $formdata['org_cdomain'],
        'org_fname' => $formdata['org_fname'],
        'org_lname' => $formdata['org_lname'],
        'org_email' => $formdata['org_email'],
        'org_contact' => $formdata['org_contact'],
        'org_address' => $formdata['org_address'],
        'org_country' => $formdata['org_country'],
        'org_state' => $formdata['org_state'],
        'org_city' => $formdata['org_city'],
        'org_postcode' => $formdata['org_postcode'],
        'org_timezone' => $formdata['org_timezone'],
        'org_currency' => $formdata['org_currency'],
        'org_landline' => $formdata['org_landline'],
        'org_web_url' => $formdata['org_website'],
        'org_abt_compnay' => $formdata['org_abt_compnay'],
        'org_company_attachment' => $org_company_attachment,
        'org_company_logo' => $image
      );
      $this->db->WHERE('org_id', $this->session->org_id);
      $this->db->UPDATE("tbl_organisation", $org_Array);
    } else if ($image != "") {
      $org_Array = array(
        'org_cname' => $formdata['org_cname'],
        'org_cdomain' => $formdata['org_cdomain'],
        'org_fname' => $formdata['org_fname'],
        'org_lname' => $formdata['org_lname'],
        'org_email' => $formdata['org_email'],
        'org_contact' => $formdata['org_contact'],
        'org_address' => $formdata['org_address'],
        'org_country' => $formdata['org_country'],
        'org_state' => $formdata['org_state'],
        'org_city' => $formdata['org_city'],
        'org_postcode' => $formdata['org_postcode'],
        'org_timezone' => $formdata['org_timezone'],
        'org_currency' => $formdata['org_currency'],
        'org_landline' => $formdata['org_landline'],
        'org_web_url' => $formdata['org_website'],
        'org_abt_compnay' => $formdata['org_abt_compnay'],
        'org_company_logo' => $image
      );
      $this->db->WHERE('org_id', $this->session->org_id);
      $this->db->UPDATE("tbl_organisation", $org_Array);
    } elseif ($org_company_attachment != "") {
      $org_Array = array(
        'org_cname' => $formdata['org_cname'],
        'org_cdomain' => $formdata['org_cdomain'],
        'org_fname' => $formdata['org_fname'],
        'org_lname' => $formdata['org_lname'],
        'org_email' => $formdata['org_email'],
        'org_contact' => $formdata['org_contact'],
        'org_address' => $formdata['org_address'],
        'org_country' => $formdata['org_country'],
        'org_state' => $formdata['org_state'],
        'org_city' => $formdata['org_city'],
        'org_postcode' => $formdata['org_postcode'],
        'org_timezone' => $formdata['org_timezone'],
        'org_currency' => $formdata['org_currency'],
        'org_landline' => $formdata['org_landline'],
        'org_web_url' => $formdata['org_website'],
        'org_abt_compnay' => $formdata['org_abt_compnay'],
        'org_company_attachment' => $org_company_attachment,
      );
      $this->db->WHERE('org_id', $this->session->org_id);
      $this->db->UPDATE("tbl_organisation", $org_Array);
    } else {
      $org_Array = array(
        'org_cname' => $formdata['org_cname'],
        'org_cdomain' => $formdata['org_cdomain'],
        'org_fname' => $formdata['org_fname'],
        'org_lname' => $formdata['org_lname'],
        'org_email' => $formdata['org_email'],
        'org_contact' => $formdata['org_contact'],
        'org_address' => $formdata['org_address'],
        'org_country' => $formdata['org_country'],
        'org_state' => $formdata['org_state'],
        'org_city' => $formdata['org_city'],
        'org_postcode' => $formdata['org_postcode'],
        'org_timezone' => $formdata['org_timezone'],
        'org_currency' => $formdata['org_currency'],
        'org_landline' => $formdata['org_landline'],
        'org_web_url' => $formdata['org_website'],
        'org_abt_compnay' => $formdata['org_abt_compnay'],
      );
      $this->db->WHERE('org_id', $this->session->org_id);
      $this->db->UPDATE("tbl_organisation", $org_Array);
    }
  }


  public function AddAccountPeriod($formdata)
  {
    $start_date1 = str_replace(',', ' ', $formdata['start_date']);
		$start_date = date("Y-m-d", strtotime($start_date1));

		$end_date1 = str_replace(',', ' ', $formdata['end_date']);
		$end_date = date("Y-m-d", strtotime($end_date1));
    // $start_date = date("Y-m-d", strtotime($formdata['start_date']));
    // $end_date = date("Y-m-d", strtotime($formdata['end_date']));
  
    $this->db->SET('status',0);
    $this->db->WHERE('org_id', $this->session->org_id);
    $this->db->UPDATE("tbl_org_account_period");

    $InsertArray = array(
      'org_id' => $this->session->org_id,
      'period_name' => $formdata['period_name'],
      'short_year' => $formdata['short_year'],
      'start_date' => $start_date,
      'end_date' => $end_date,
      'status' => 1,
      'date_created' => date('Y-m-d H:i:s')
    );
    $this->db->Insert("tbl_org_account_period", $InsertArray);
  }

  public function UpdateBasicSettingDetails($formdata)
  {
    $rem_notify_by = $formdata['rem_notify_by_id'];
    $rem_notify_by_id = "";
    $rem_notify_name = "";
    for ($i = 0; $i < count($rem_notify_by); $i++) 
    {
        $rem_notify_by_id = $rem_notify_by_id . $rem_notify_by[$i] . ","; 
        $rem_notify_by_name = $this->db->select('notify_by')->from('tbl_notify_by')->where('notify_id',$rem_notify_by[$i])->where('org_id',$this->session->org_id)->get()->row()->notify_by;  
        $rem_notify_name = $rem_notify_name . $rem_notify_by_name . ",";
    }
    $rem_notify_by_id1 = trim($rem_notify_by_id, ',');
    $rem_notify_name1 = trim($rem_notify_name, ',');

    if (empty($rem_notify_by_id1)) 
    {
      $rem_notify_by_id1 = '';
      $rem_notify_name1 = '';
    } 
    else 
    {
        $rem_notify_by_id1 = $rem_notify_by_id1;
        $rem_notify_name1 = $rem_notify_name1;
    }
    $data = array(
      'quote_prefix' => $formdata['quote_prefix'],
      'quote_suffix' => $formdata['quote_suffix'],
      'quote_number' => $formdata['quote_number'],
      'q_printing_title' => $formdata['q_printing_title'],
      'intimation_days' => $formdata['intimation_days'],
      'contact_code_id' => $formdata['contact_code'],
      'rem_before_time_name' => $formdata['rem_before_time_name'],
      'rem_notify_by_id' => $rem_notify_by_id1,
      'rem_notify_by_name' => $rem_notify_name1,
      'rem_recurring_interval_name' => $formdata['rem_recurring_interval_name']

    );
    
    $this->db->where('org_id', $this->session->org_id);
    $this->db->update("tbl_organisation", $data);
  }
  public function EmailConfiguartion($formdata)
  {
    $this->db->where('org_id', $this->session->org_id);
    $this->db->where('emp_id', $this->session->id);
    $res = $this->db->get('tbl_org_email_configuration')->result();
    if (count($res) <= 0) {
      $Array = array(
        'org_id' => $this->session->org_id,
        'from_name' => $formdata['from_name'],
        'host_name' => $formdata['host_name'],
        'email_id' => $formdata['email_id'],
        'email_pass' => $formdata['email_pass'],
        'port_number' => $formdata['port_number'],
        'protocol' => $formdata['protocol'],
        'secure' =>$formdata['smtp_secure'],
        'emp_id' => $this->session->id,
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
        'secure' =>$formdata['smtp_secure'],
        'emp_id' => $this->session->id,
      );
      $this->db->where('emp_id', $this->session->id);
      $this->db->update("tbl_org_email_configuration", $Array);
    }
  }

  public function UpdateProfile($formdata)
  {
    $Array = array(
      'name' => $formdata['name'],
      'email' => $formdata['email'],
      'mobile_no' => $formdata['mobile_no'],
      'Password' => $formdata['password']
    );
    $this->db->where('id', $this->session->id);
    $this->db->update("tbl_admin_login", $Array);
  }

  public function EmailContentFrom($data)
  {
    $this->db->set('email_body_content', $data['email_content']);
    $this->db->where('email_body_id', $data['email_body_id']);
    $this->db->update("tbl_email_body");
  }

  public function addSection($data)
  {
    $this->db->Insert("tbl_section_details", $data);
  }

  public function getData($id)
  {
    $this->db->where('section_id', $id);
    return $this->db->get("tbl_section_details")->result_array();
  }

  public function Update($data, $id)
  {
    $this->db->where('section_id', $id);
    $this->db->update("tbl_section_details", $data);
  }

  public function Delete($id)
  {
    $this->db->set('status', 0);
    $this->db->where('section_id', $id);
    $this->db->update("tbl_section_details");
  }
}
