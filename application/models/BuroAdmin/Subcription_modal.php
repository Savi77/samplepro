<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcription_modal extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        //echo 'Hello World2';
    }

    public function subcription()
    {
        return $this->db->query("SELECT * FROM `tbl_email_subcription` WHERE sent_status = 0 ORDER BY sub_id DESC")->result_array();
    }
    public function get_data()
    {
        $where=array('section'=>'subcription');
        $this->db->where($where);
        return $this->db->get('tbl_section_header')->result();
    }
    public function Update_header($formdata)
    {
        $this->db->where('section', 'subcription');     
        $data=array(
            'title'=>$formdata['title'],
            'description'=>$formdata['description']
        );
        $this->db->update('tbl_section_header', $data);
    }
    public function subcription_add($subcriptionList,$description)
    {
        if ($_FILES['uploadfileData']['name'][0] != '') {
            $final_array = array();
            $countfiles = count($_FILES['uploadfileData']['name']);
            for($i=0; $i<$countfiles ; $i++)
            {
                $image = $_FILES['uploadfileData']['name'][$i];
                $cur_date=date("dmyHis");
                $sepext = explode('.', strtolower($image));
                $extension = end($sepext);
                $store_file =$cur_date.'_'.$i.".$extension";

                $move_file = 'assets/images/emailFiles/';

                $move_file1 = $move_file . basename($store_file);
                move_uploaded_file($_FILES['uploadfileData']['tmp_name'][$i], $move_file1); 
                chmod($move_file1, 0755);                  
                array_push($final_array,$move_file1);
            }

            $to_mail = implode(',',$subcriptionList);
            
            $email_config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.buroforce.com',
                'smtp_port' => '465',
                'smtp_user' => 'support@buroforce.com',
                'smtp_pass' => 'Bur@@ForCe$$2019',
                'mailtype'  => 'html',
                'starttls'  => true,
                'newline'   => "\r\n"
            );
            $sub='BuroForce';
            $from='support@buroforce.com';
            
            $this->load->library('email', $email_config);
            $this->email->from($from, 'BuroForce');
            $this->email->to($to_mail);
            $this->email->subject($sub);
            for ($i=0; $i < count($final_array); $i++) { 
                $this->email->attach(base_url().$final_array[$i]);
            }
            $this->email->message($description);
            $this->email->set_mailtype('html');
            if ($this->email->send()) {
                for ($i=0; $i < count($subcriptionList); $i++) { 
                    $this->db->set('sent_status','1');
                    $this->db->where('sub_id',$subcriptionList[$i]);
                    $this->db->update('tbl_email_subcription');
                }
                echo 1;
            }else {
                echo 0;
            }
        }else{
            $to_mail = implode(',',$subcriptionList);
            
            $email_config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.buroforce.com',
                'smtp_port' => '465',
                'smtp_user' => 'support@buroforce.com',
                'smtp_pass' => 'Bur@@ForCe$$2019',
                'mailtype'  => 'html',
                'starttls'  => true,
                'newline'   => "\r\n"
            );
            $sub='BuroForce';
            $from='support@buroforce.com';
            
            $this->load->library('email', $email_config);
            $this->email->from($from, 'BuroForce');
            $this->email->to($to_mail);
            $this->email->subject($sub);
            $this->email->message($description);
            $this->email->set_mailtype('html');
            if ($this->email->send()) {
                for ($i=0; $i < count($subcriptionList); $i++) { 
                    $this->db->set('sent_status','1');
                    $this->db->where('sub_id',$subcriptionList[$i]);
                    $this->db->update('tbl_email_subcription');
                }
                echo 1;
            }else {
                echo 0;
            }
        }
    }
} 
