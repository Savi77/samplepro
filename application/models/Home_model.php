<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetPlanArray()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_plan_master')->result();
    }

    public function GETPrice($module_id)
    {
        $this->db->where('module_id', $module_id);
        $res = $this->db->get('tbl_modules')->row();
        echo $res->price;
    }

    public function plan_list()
    {
        $final_array = array();
        $this->db->where('status', 1);
        $this->db->where_not_in('plan_id', 6);
        $result = $this->db->get('tbl_plan_master')->result();
        foreach ($result as  $value) {
            $ids = $value->module_id;
            if (empty($ids)) {
                $ids = 0;
            }
            $module = $this->db->query(" SELECT module_name FROM tbl_modules where module_id IN($ids)  ")->result();
            $new_array = array('plan_name' => $value->plan_name, 'price' => $value->price, 'plan_id' => $value->plan_id, 'module_list_array' => $module);
            array_push($final_array, $new_array);
        }
        return $final_array;
    }


    public function client_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_clients')->result();
    }

    public function state_list($org_country)
    {   
        if ($org_country != '') {
            $this->db->where('country_id',$org_country);   
        }
        return $this->db->get('states')->result();
    }
    public function country_list()
    {
        return $this->db->get('countries')->result();
    }

    public function TimeZone_list()
    {
        $this->db->where('status',1);
        return $this->db->get('tbl_timezone')->result();
    }

    public function Currency_list()
    {
        return $this->db->query('SELECT * FROM `tbl_currency` WHERE status = 1')->result();
    }

    public function GetStates($country_id)
    {
        $this->db->where('country_id', $country_id);
        $res = $this->db->get('states')->result();

        echo ' <option value="">Please Select State</option>';
        foreach ($res as  $value) {
            echo ' <option value="' . $value->id . '">' . $value->name . '</option>';
        }
    }


    public function testimonial_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_testimonial')->result();
    }
    public function sfeature_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_superfeature')->result();
    }

    public function work_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_howwework')->result();
    }

    public function manyfeature_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_manyfeature')->result();
    }
    public function slider_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_slider')->result();
    }

    public function faq_list()
    {
        $this->db->where('status', 1);
        $this->db->order_by("faq_id", "desc");
        return $this->db->get('tbl_faq')->result();
    }

    public function play_store()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_link')->result();
    }


    public function insert_contact_details($formdata)
    {
        $person_name = explode(' ', $formdata['person_name']);
        $firstname = $person_name[0];
        $lastname = $person_name[1];

        if ($lastname != '') {
            $lastname1 = $lastname;
        } else {
            $lastname1 = '';
        }

        $date = date("Y-m-d H:i:s");
        $arr = array(
            'first_name' => $firstname,
            'last_name' => $lastname1,
            'email' => $formdata['person_email'],
            'phone_number' => $formdata['contact_number'],
            'message' => $formdata['desc_message'],
            'created_date' => $date
        );
        // print_r($arr);
        $this->db->insert('tbl_contact', $arr);

        include_once 'assets/phpmailer/phpmailer.php';
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled                
        $mail->Host = "mail.ileaf.in";
        $mail->Port = 25; // or 587
        $mail->IsHTML(true);
        $mail->Username = "kedar@ileaf.in";
        $mail->Password = "ileaf@@2017";

        // From :(user name and user mail id)
        $mail->FromName = "Contact - Buroforce";
        $mail->From = "kedar@ileaf.in";
        $email = "kedar@ileaf.in";
        // To 
        $mail->AddAddress($email);  // IMP : This is static email id. we need to change it later
        $mail->Subject = 'Contact Us';
        // $message_text .="Content-Type: text/html; charset=\"iso-8859-1\"";
        // $message_text .= "Content-Transfer-Encoding: 8bit";
        $message_text = "<table width='650px' style='background:#f2f2f2;color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>
  
                      <tr>
                          <td><b>Dear Team,</b></td>
                      </tr>
                        <tr>
                          <td >&nbsp;</td>
                        </tr>
                      <tr>
                          <td>Following User Contact Detail</td>
                        </tr>
                        <tr>
                          <td >&nbsp;</td>
                        </tr>
                        <tr>
                          <td >Name : <b>" . $formdata['person_name'] . "</b></td>
                        </tr>  
                        <tr>
                          <td >Contact Number : <b>" . $formdata['contact_number'] . "</b></td>
                        </tr>  
                        <tr>
                          <td >Email ID : <b>" . $formdata['person_email'] . "</b></td>
                        </tr> 
                        <tr>
                          <td >Message : <b>" . $formdata['desc_message'] . "</b></td>
                        </tr>    
                        <tr>
                          <td >&nbsp;</td>
                        </tr>                              
                </table>";

        $mail->addAttachment($store_file, "$subject");
        $mail->Body = $message_text;
        if ($mail->send()) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function insert_email_subcription($email)
    {
        $data =  array(
            'email_id' => $email,
            'sent_status' => 0,
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_email_subcription', $data);

        $email_config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.buroforce.com',
            'smtp_port' => '465',
            'smtp_user' => 'support@buroforce.com',
            'smtp_pass' => 'Bur@@ForCe$$2019',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );
        $message_text = "<table width='650px' style='background:#f2f2f2;color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>
              <tr>
                  <td><b>Dear Team,</b></td>
              </tr>
                <tr>
                  <td >&nbsp;</td>
                </tr>
              <tr>
                  <td>Subscription Message Sent Successfully..</td>
                </tr>
                <tr>
                  <td >&nbsp;</td>
                </tr>                    
        </table>";
        $sub = 'Buroforce';
        $from = 'support@buroforce.com';
        $this->load->library('email', $email_config);
        $this->email->from($from, 'Buroforce');
        $this->email->to($email);
        $this->email->subject($sub);
        $this->email->message($message_text);
        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            echo "1";
        } else {
            echo "1";
        }
    }


    public function getPolicies()
    {
        return $this->db->get('tbl_policies')->result_array();
    }

    public function get_creative_feature_title()
    {
        $where = array('section' => 'creative_features');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }
    public function creative_feature_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_creative_features')->result_array();
    }
    public function get_service_feature_title()
    {
        $where = array('section' => 'service_features');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }
    public function service_feature_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_service_feature')->result_array();
    }
    public function whychooseus_title()
    {
        $where = array('section' => 'superfeature');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }
    public function FaqList()
    {
        $this->db->where('status', 1);
        return $this->db->get('tbl_faq')->result();
    }
    public function subcription_title()
    {
        $where = array('section' => 'subcription');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }
    public function case_studies_list()
    {
        $this->db->select('case_studies_id,case_studies_name');
        $this->db->where('status', 1);
        return $this->db->get('tbl_case_studies')->result();
    }
    public function getCaseStudiesData($case_studies_id)
    {
        $where = array('case_studies_id' => $case_studies_id);
        $this->db->where($where);
        return  $this->db->get('tbl_case_studies')->row();
    }
    // ================ Get Section Hide/Show ===================
    public function get_slider()
    {
        $this->db->where('section_name', 'Slider');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_it_services()
    {
        $this->db->where('section_name', 'IT Agency Services');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_creative_features()
    {
        $this->db->where('section_name', 'Creative Features');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_pricing_plan()
    {
        $this->db->where('section_name', 'Pricing Plan');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_whychooseus_section()
    {
        $this->db->where('section_name', 'Why Choose Us');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_faq()
    {
        $this->db->where('section_name', 'FAQ');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_testimonial()
    {
        $this->db->where('section_name', 'Testimonial');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_client()
    {
        $this->db->where('section_name', 'Client');
        return $this->db->get("tbl_all_section")->row();
    }

    public function get_newsletter()
    {
        $this->db->where('section_name', 'Newsletter');
        return $this->db->get("tbl_all_section")->row();
    }
    public function ServiceDetail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("tbl_service_feature")->row();
    }
    public function Contact_Details_Data()
    {
        return $this->db->query("SELECT * FROM `tbl_contact_details`")->row();
    }
    public function About_Details_Data()
    {
        return $this->db->query("SELECT * FROM `tbl_aboutus_detail`")->row();
    }
    public function insert_trail_days($days)
    {
        $data =  array(
            'created_by_name' => $_SESSION['name'],
            'created_by_id' => $_SESSION['id'],
            'trial_days' => $days
        );
        $check_exist = $this->db->select('*')->from('tbl_trial_days')->where('created_by_id',$_SESSION['id'])->where('created_by_name',$_SESSION['name'])->get()->row();
        
        if(!empty($check_exist))
        {
            $this->db->set($data);
            $this->db->where('created_by_id',$_SESSION['id']);
            $this->db->where('created_by_name',$_SESSION['name']);
            $this->db->update('tbl_trial_days'); 
            return 1;

        }
        else
        {
            $this->db->insert('tbl_trial_days', $data);
            return 1;
  
        }
    }

    public function TrialDays()
    {
        $result = $this->db->select('trial_days')->from('tbl_trial_days')->get()->row();
        return $result;

    }
}
