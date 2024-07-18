<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model {

	public function __construct() 
    {
        parent::__construct();
        //echo 'Hello World2';
     }

    public function get_data()
    {
        $this->db->select('tbl_reminder.*,tbl_notify_by.notify_by');
        $this->db->where('tbl_reminder.delete_status',0);
        $this->db->where('tbl_reminder.org_id',$this->session->org_id);
        $this->db->where('tbl_reminder.module_name','');
        $this->db->from('tbl_reminder');
        $this->db->join('tbl_notify_by','tbl_reminder.notify_id = tbl_notify_by.notify_id','full');
        $this->db->order_by('tbl_reminder.reminder_id','DESC');
        return $this->db->get();        
    }

    public function activity_get_data()
    {
        // $this->db->select('tbl_reminder.*,tbl_notify_by.notify_by');
        $this->db->select('tbl_reminder.*');
        $this->db->where('tbl_reminder.delete_status',0);
        $this->db->where('tbl_reminder.org_id',$this->session->org_id);
        $this->db->where('tbl_reminder.module_name','Activity');
        $this->db->from('tbl_reminder');
        // $this->db->join('tbl_notify_by','tbl_reminder.notify_id = tbl_notify_by.notify_id','full');
        $this->db->order_by('tbl_reminder.reminder_id','DESC');
        return $this->db->get();   
    }

    public function contact_get_data()
    {
        // $this->db->select('tbl_reminder.*,tbl_notify_by.notify_by');
        $this->db->select('tbl_reminder.*');
        $this->db->where('tbl_reminder.delete_status',0);
        $this->db->where('tbl_reminder.org_id',$this->session->org_id);
        $this->db->where('tbl_reminder.module_name','Contact');
        $this->db->from('tbl_reminder');
        // $this->db->join('tbl_notify_by','tbl_reminder.notify_id = tbl_notify_by.notify_id','full');
        $this->db->order_by('tbl_reminder.reminder_id','DESC');
        return $this->db->get();   
    }

    public function general_get_data()
    {
        // $this->db->select('tbl_reminder.*,tbl_notify_by.notify_by');
        $this->db->select('tbl_reminder.*');
        $this->db->where('tbl_reminder.delete_status',0);
        $this->db->where('tbl_reminder.org_id',$this->session->org_id);
        $this->db->where('tbl_reminder.module_name','General');
        $this->db->from('tbl_reminder');
        // $this->db->join('tbl_notify_by','tbl_reminder.notify_id = tbl_notify_by.notify_id','full');
        $this->db->order_by('tbl_reminder.reminder_id','ASC');
        return $this->db->get();   
    }

    public function add_reminder($data) 
    {
        $user_id = implode(',',$data['user_id']);
        $notify_by = implode(',',$data['reminder_notify_by']);
        $reminder_date1 = str_replace(',', ' ', $data['reminder_date']);
        $reminder_date = date("Y-m-d", strtotime($reminder_date1));
        if (isset($this->session->org_timezone)) {
            date_default_timezone_set($this->session->org_timezone);
        }else{
            date_default_timezone_set('Asia/Kolkata');
        }
        if ($data['recurring_set'] == 1) {
            $recurring_eod1 = str_replace(',', ' ', $data['recurring_eod']);
            $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
            $data1 = array(
                'org_id'=>$this->session->org_id,
                'module_name'=> 'General',
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'time_zone' => $this->session->org_timezone,
                // 'notify_id' => $data['reminder_notify_by'],
                'notify_id' => implode(',',$data['reminder_notify_by']),
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time' => $data['reminder_before_time'],
                'reminder_note' => $data['reminder_note'],
                'interval_type'=>$data['interval_type'],
                'recurring_set'=>$data['recurring_set'],
                'recurring_eod'=>$recurringEOD
            );
            $this->db->insert('tbl_reminder',$data1);
            $reminderID = $this->db->insert_id(); 

            $recurringDatesListArray = array();
            $recurringDatesArray = $this->getRecurringDateString($data['interval_type'],$reminder_date,$recurringEOD);
            
            $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($data['reminder_time'])))));
			$b = new DateTime(date('H:i:s',strtotime($data['reminder_before_time'])));
			$interval = $a->diff($b);
			$timeDiff = $interval->format("%H:%i:%s%s");

            for ($i=0; $i < count($recurringDatesArray); $i++) { 
                $rec_data = array(
                    'reminder_id' => $reminderID,
                    'recurring_rem_date' => $reminder_date,
                    'recurring_rem_time' => date('H:i',strtotime($data['reminder_time'])),
                    'time_zone' => $this->session->org_timezone,
                    'recurring_date' => $recurringDatesArray[$i],
                    'recurring_time' => $timeDiff,
                    'notify_id' => implode(',',$data['reminder_notify_by']),
                    'recurring_mail_sent' => 0,
                    'recurring_user_id' => implode(',',$data['user_id']),
                );
                array_push($recurringDatesListArray,$rec_data);
            }
            $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
            if($res)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }else {
            $data1 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'module_name'=> 'General',
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time'=>$data['reminder_before_time'],
                'reminder_note'=>$data['reminder_note'],
                'recurring_set'=>$data['recurring_set'],
                'notify_id' => implode(',',$data['reminder_notify_by'])
            );
            $res = $this->db->insert('tbl_reminder',$data1);
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }
    }


    public function getRecurringData($id)
    {
        return $this->db->query('SELECT tbl_reminder_recurring.*,tbl_reminder.*,tbl_notify_by.notify_by FROM `tbl_reminder_recurring` JOIN tbl_reminder ON tbl_reminder.reminder_id = tbl_reminder_recurring.reminder_id JOIN tbl_notify_by ON tbl_notify_by.notify_id = tbl_reminder.notify_id WHERE tbl_reminder_recurring.reminder_id = '.$id.' AND tbl_reminder.delete_status = 0 ORDER BY tbl_reminder_recurring.recurring_date ASC')->result();
    }
    
    public function deleteAllReminder($id)
    {
        $this->db->where('reminder_id',$id);
        $this->db->delete('tbl_reminder');

        $this->db->where('reminder_id',$id);
        if ($this->db->delete('tbl_reminder_recurring')) {
            echo 1;
        }else {
            echo 0;
        }
    }

    public function addCustomerReminder($data)
    {
        $user_id = implode(',',$data['user_id']);
        $reminder_date1 = str_replace(',', ' ', $data['reminder_date']);
        $reminder_date = date("Y-m-d", strtotime($reminder_date1));
        if ($data['recurring_set'] == 1) {
            $recurring_eod1 = str_replace(',', ' ', $data['recurring_eod']);
            $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));

            $rem_notify_by = $data['reminder_notify_by'];
            $rem_notify_by_id = "";
            for ($i = 0; $i < count($rem_notify_by); $i++) 
            {
                $rem_notify_by_id = $rem_notify_by_id . $rem_notify_by[$i] . ","; 
            }
            $rem_notify_by_id1 = trim($rem_notify_by_id, ',');
            if (empty($rem_notify_by_id1)) 
            {
                $rem_notify_by_id1 = '';
            } 
            else 
            {
                $rem_notify_by_id1 = $rem_notify_by_id1;
            }

            $data1 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'recd_id'=>$data['recd_id'],
                'module_name'=> $data['module_name'],
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'notify_id' => $rem_notify_by_id1,
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time' => $data['reminder_before_time'],
                'reminder_note' => $data['reminder_note'],
                'interval_type'=>$data['interval_type'],
                'recurring_set'=>$data['recurring_set'],
                'recurring_eod'=>$recurringEOD
            );
            
            $this->db->insert('tbl_reminder',$data1);
            $reminderID = $this->db->insert_id(); 

            $recurringDatesListArray = array();
            $recurringDatesArray = $this->getRecurringDateString($data['interval_type'],$reminder_date,$recurringEOD);
            
            $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($data['reminder_time'])))));
			$b = new DateTime(date('H:i:s',strtotime($data['reminder_before_time'])));
			$interval = $a->diff($b);
			$timeDiff = $interval->format("%H:%i:%s%s");

            for ($i=0; $i < count($recurringDatesArray); $i++) { 
                $rec_data = array(
                    'time_zone' => $this->session->org_timezone,
                    'notify_id' => $rem_notify_by_id1,
                    'reminder_id' => $reminderID,
                    'recurring_rem_date' => $reminder_date,
                    'recurring_rem_time' => date('H:i',strtotime($data['reminder_time'])),
                    'recurring_date' => $recurringDatesArray[$i],
                    'recurring_time' => $timeDiff,
                    'recurring_mail_sent' => 0,
                    'recurring_user_id' => implode(',',$data['user_id']),
                );
                array_push($recurringDatesListArray,$rec_data);
            }
            $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
            if($res)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }else {
            $data1 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'recd_id'=>$data['recd_id'],
                'module_name'=> $data['module_name'],
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time' => $data['reminder_before_time'],
                'reminder_note' => $data['reminder_note'],
                'recurring_set'=>$data['recurring_set'],
                'notify_id' => $rem_notify_by_id1
            );
            
            $res = $this->db->insert('tbl_reminder',$data1);
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    public function getUserSysyemList()
    {
        $this->db->select('id,name,email');
        $this->db->where('org_id', $this->session->org_id);
        $this->db->where('user_type', 'E');
        $this->db->where('user_status', 1);
        return $this->db->get('tbl_admin_login')->result();
    }

    public function getTimeSlot()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        $this->db->where('status',0);
        $this->db->order_by("time_slot", "asc");
        return $this->db->get('tbl_time_slot')->result();
    }

    public function getNotifyBy()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        $this->db->where('status',0);
        $this->db->order_by("notify_id", "asc");
        return $this->db->get('tbl_notify_by')->result();
    }

    public function delete_reminder($reminder_id) 
    {
        $this->db->where('reminder_id',$reminder_id);
        $this->db->set('delete_status',1);
        $this->db->update('tbl_reminder');
    }

    public function deleteRecurringReminder($recurring_id)
    {
        $this->db->where('recurring_id',$recurring_id);
        $this->db->delete('tbl_reminder_recurring');
    }
  
    public function edit_reminder($reminder_id) 
    {
        $this->db->where('reminder_id',$reminder_id);
        $userData = $this->db->get('tbl_reminder')->result();
        foreach ($userData as $value) {
            $this->db->select('contact_person_name1');
            $this->db->where('customer_id',$value->recd_id);
            $department = $this->db->get('tbl_customer')->row();
            if (!empty($department)) {
              $user_name = $department->contact_person_name1;
            }else {
              $user_name = 'Na';
            }

            $new_data = array(
                'reminder_id' => $value->reminder_id,
                'org_id' => $value->org_id,
                'recd_id' => $value->recd_id,
                'module_name' => $value->module_name,
                'reminder_title' => $value->reminder_title,
                'user_id' => $value->user_id,
                'reminder_date' => $value->reminder_date,
                'reminder_time' => $value->reminder_time,
                'delete_status' => $value->delete_status,
                'created_date' => $value->created_date,
                'reminder_before_time' => $value->reminder_before_time,
                'reminder_note' => $value->reminder_note,
                'user_name' => $user_name,
                'interval_type' => $value->interval_type,
                'recurring_set' => $value->recurring_set,
                'recurring_eod' => $value->recurring_eod,
                'notify_id' => $value->notify_id,
            );
        }
        return $new_data;
    }

    public function edit_recurring_data($reminder_id)
    {
        $this->db->join('tbl_reminder','tbl_reminder.reminder_id=tbl_reminder_recurring.reminder_id','full');
        $this->db->where('recurring_id',$reminder_id);
        $userData = $this->db->get('tbl_reminder_recurring')->result();
        
        foreach ($userData as $value) {
            $this->db->select('contact_person_name1');
            $this->db->where('customer_id',$value->recd_id);
            $department = $this->db->get('tbl_customer')->row();
            if (!empty($department)) {
              $user_name = $department->contact_person_name1;
            }else {
              $user_name = 'Na';
            }

            $new_data = array(
                'recurring_id' => $value->recurring_id,
                'recurring_rem_date' => $value->recurring_rem_date,
                'recurring_rem_time' => $value->recurring_rem_time,
                'recurring_date' => $value->recurring_date,
                'recurring_time' => $value->recurring_time,
                'recurring_user_id' => $value->recurring_user_id,
                'reminder_id' => $value->reminder_id,
                'org_id' => $value->org_id,
                'recd_id' => $value->recd_id,
                'module_name' => $value->module_name,
                'notify_id' => $value->notify_id,
                'reminder_title' => $value->reminder_title,
                'user_id' => $value->user_id,
                'reminder_date' => $value->reminder_date,
                'reminder_time' => $value->reminder_time,
                'delete_status' => $value->delete_status,
                'created_date' => $value->created_date,
                'reminder_before_time' => $value->reminder_before_time,
                'reminder_note' => $value->reminder_note,
                'recurring_set' => $value->recurring_set,
                'user_name' => $user_name,
                'interval_type' => $value->interval_type,
                'recurring_eod' => $value->recurring_eod,
            );
        }
        return $new_data;
    }

    public function update_reminder($data) 
    {
        $user_id = implode(',',$data['user_id']);
        $reminder_date1 = str_replace(',', ' ', $data['reminder_date']);
        $reminder_date = date("Y-m-d", strtotime($reminder_date1));
        if ($data['edit_recurring_set'] == 1) 
        {
            echo "If";
            $recurring_eod1 = str_replace(',', ' ', $data['edit_recurring_eod']);
            $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
            $data1 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'module_name'=> $data['module_name'],
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time'=>$data['reminder_before_time'],
                'reminder_note'=>$data['reminder_note'],
                'recurring_set'=>$data['edit_recurring_set'],
                'recurring_eod'=>$recurringEOD,
                'interval_type'=>$data['interval_type'],  
                'notify_id'=>implode(',',$data['reminder_notify_by']),              
            );
            $this->db->where('reminder_id',$data['reminder_id']);
            $data2 = $this->db->update('tbl_reminder',$data1);

            if($data2 == 1)
            {
                $check_recurring = $this->db->select('*')->from('tbl_reminder_recurring')->where('reminder_id',$data['reminder_id'])->get()->result();

                if(COUNT($check_recurring) > 0)
                {
                    $data3 = array(
                        'reminder_id' => $data['reminder_id'],
                        'time_zone' => $this->session->org_timezone,
                        'recurring_rem_date' => $recurring_date,
                        'recurring_rem_time' => date('H:i',strtotime($data['reminder_time'])),
                        'recurring_date' => $recurring_date,
                        'recurring_time' => $timeDiff,
                        'recurring_user_id' => implode(',',$data['user_id']),
                        // 'notify_id' => $this->input->post('reminder_notify_by'),    
                        'notify_id' => implode(',',$data['reminder_notify_by']),                
                    );
                
                    $this->db->where('reminder_id',$data['reminder_id']);
                    $data4 = $this->db->update('tbl_reminder_recurring',$data3);

                    if($data4 == 1)
                    {
                        echo "1";
                    }
                    else
                    {
                        echo "2";
                    }
                }
                else
                {
                    $recurringDatesListArray = array();
                    $recurringDatesArray = $this->getRecurringDateString($data['interval_type'],$reminder_date,$recurringEOD);
                    
                    $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($data['reminder_time'])))));
                    $b = new DateTime(date('H:i:s',strtotime($data['reminder_before_time'])));
                    $interval = $a->diff($b);
                    $timeDiff = $interval->format("%H:%i:%s%s");

                    for ($i=0; $i < count($recurringDatesArray); $i++) { 
                        $rec_data = array(
                            'reminder_id' => $data['reminder_id'],
                            'recurring_rem_date' => $reminder_date,
                            'recurring_rem_time' => date('H:i',strtotime($data['reminder_time'])),
                            'time_zone' => $this->session->org_timezone,
                            'recurring_date' => $recurringDatesArray[$i],
                            'recurring_time' => $timeDiff,
                            'notify_id' => implode(',',$data['reminder_notify_by']),
                            'recurring_mail_sent' => 0,
                            'recurring_user_id' => implode(',',$data['user_id']),
                        );
                        array_push($recurringDatesListArray,$rec_data);
                    }
                    $data4 = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);

                    if($data4 == 1)
                    {
                        echo "1";
                    }
                    else
                    {
                        echo "2";
                    }
                }
            }
        }
        else 
        {
            $data1 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'module_name'=> $data['module_name'],
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time'=>$data['reminder_before_time'],
                'reminder_note'=>$data['reminder_note'],
                'recurring_set'=>$data['recurring_set'],
                'notify_id'=>implode(',',$data['reminder_notify_by']),
            );
        }
        
        $this->db->where('reminder_id',$data['reminder_id']);
        $data = $this->db->update('tbl_reminder',$data1);
        
        if($data)
        {
            echo "1";

            /*
                $userData = $this->db->query('SELECT `company_name`, `email`, `phone_no`, `contact_person_name1` FROM `tbl_customer` WHERE `customer_id` IN('.$user_id.')')->result_array();
                foreach ($userData as $user) {
                    if (isset($user['email'])) {
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
                
                        $from='support@buroforce.com';
                        $this->load->library('email', $email_config);
                        $this->email->from($from, 'Buroforce');
                        $sub = 'Reminder';
                        $msg = "
                        <table>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Dear Sir / Mam ,</td>
                            </tr>
                            <tr>
                                <td ><b style='color:red;'>Test</b></td>               
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                            <td colspan='2'><strong><em>Warm Regards</em></strong></td>
                            </tr>
                            <tr>
                            <td colspan='2'><strong>Buroforce Team</strong></td>
                            </tr>
                            <tr>
                                <td >&nbsp;</td>
                            </tr>
                        </table>";
                        $this->email->to($user['email']);
                        $this->email->bcc('ileaftechnology@gmail.com');
                        $this->email->subject($sub);
                        $this->email->message($msg);
                        $this->email->set_mailtype("html");
                        $this->email->send(); 
                    }  
                }
            */
            
        }
        else
        {
            echo "2";
        }
    }

    public function updateRecurringReminder($data)
    {
        
        $recurring_date1 = str_replace(',', ' ', $data['recurring_date']);
        $recurring_date = date("Y-m-d", strtotime($recurring_date1));

        $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($data['reminder_time'])))));
        $b = new DateTime(date('H:i:s',strtotime($data['reminder_before_time'])));
        $interval = $a->diff($b);
        $timeDiff = $interval->format("%H:%i:%s%s");

        $data1 = array(
            'reminder_id' => $data['reminder_id'],
            'time_zone' => $this->session->org_timezone,
            'recurring_rem_date' => $recurring_date,
            'recurring_rem_time' => date('H:i',strtotime($data['reminder_time'])),
            'recurring_date' => $recurring_date,
            'recurring_time' => $timeDiff,
            'recurring_user_id' => implode(',',$data['user_id']),
            // 'notify_id' => $this->input->post('reminder_notify_by'),    
            'notify_id' => implode(',',$data['reminder_notify_by']),                
        );

        $this->db->where('reminder_id',$data['reminder_id']);
        $data2 = $this->db->update('tbl_reminder_recurring',$data1);
        // $data2 = $this->db->affected_rows($data) > 0;
        
        if($data2 == 1)
        {
            $reminder_date1 = str_replace(',', ' ', $data['reminder_date']);
            $reminder_date = date("Y-m-d", strtotime($reminder_date1));
            $recurring_eod1 = str_replace(',', ' ', $data['edit_recurring_eod']);
            $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
            $data3 = array(
                'org_id'=>$this->session->org_id,
                'time_zone' => $this->session->org_timezone,
                'module_name'=> $data['module_name'],
                'reminder_title'=>$data['reminder_title'],
                'user_id' => implode(',',$data['user_id']),
                'reminder_date' => $reminder_date,
                'reminder_time' => date('H:i',strtotime($data['reminder_time'])),
                'reminder_before_time'=>$data['reminder_before_time'],
                'reminder_note'=>$data['reminder_note'],
                'recurring_set'=>1,
                'recurring_eod'=>$recurringEOD,
                'interval_type'=>$data['edit_interval_type'],  
                'notify_id'=>implode(',',$data['reminder_notify_by']),              
            );
            
            $this->db->where('reminder_id',$data['reminder_id']);
            $data4 = $this->db->update('tbl_reminder',$data3);
            // $data5 = $this->db->affected_rows($data) > 0;

            if($data4 == 1)
            {
                echo "1";
            }
            else
            {
                echo "2";
            }
        }
        else
        {
            echo "2";
        }
    }

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('reminder_id',$id);
       $this->db->update('tbl_reminder');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('reminder_id',$id);
        $this->db->update('tbl_reminder');
    }

    function getRecurringDateString($frequency, $start_date, $end_date = null) {
		$dt = new DateTime(str_replace("-", "/", $start_date));
		$dtUntil = new DateTime(str_replace("-", "/", $end_date ? $end_date : date("m-d-Y")));
		
		$modifiers = [
			"day" => "+1 day",
			"week" => "+1 week",
			"fortnightly" => "+2 weeks",
			"monthly" => "+1 month",
			"quaterly" => "+3 month",
			"half-quarterly" => "+6 month",
			"year" => "+12 month",
		];
		$modifier = $modifiers[$frequency];
		$dt->modify($modifier);
		$dates[] = date('Y-m-d',strtotime($start_date));
		while($dt <= $dtUntil) {
			$dates[] = $dt->format("Y-m-d");
			$dt->modify($modifier);
		}
        return $dates;
		// return implode(',',$dates);
		
	}
}
