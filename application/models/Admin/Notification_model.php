
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model 
{
    public function __construct() 
    {
       parent::__construct();
    }

    public function get_customer()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);  
        return $this->db->get('tbl_customer')->result();
    }

    public function get_emp()
    {
        $where=array('user_status'=>1, 'user_type'=>E,'org_id'=>$this->session->org_id);
        $this->db->where($where);
        return $this->db->get('tbl_admin_login')->result();
    }

    public function send_notification($selct_cust_emp,$customer_id1,$emp_id1,$description)
    {
        $org_id=$this->session->org_id;
        if ($selct_cust_emp=='All_Customer') 
        {
                $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `delete_status`='0' and org_id='$org_id'    ");
                foreach ($data1->result() as $value) 
                {
                        $reg_token = $value->android_id;
                        // $reg_token = $android_id;
                        $data = array('server_notification'=>"Notification",'message'=>$description);
                        $target = $reg_token; 
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                        $fields = array();
                        $fields['data'] = $data;
                        if(is_array($target))
                        {
                          $fields['registration_ids'] = $target;
                        }
                        else
                        {
                          $fields['to'] = $target;
                        }
                        $headers = array(
                          'Content-Type:application/json',
                          'Authorization:key='.$server_key
                        );

                         $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                        $result = curl_exec($ch);
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        }
                        else
                        {
                            
                        }
                        curl_close($ch);
                } 
                // echo 1;   
        }
        else if ($selct_cust_emp=='Customer')
        {
                $count = count($customer_id1);
                for ($i=0; $i < $count; $i++) 
                { 
                      $customer=$customer_id1[$i];

                      $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer' ")->row();
                       $reg_token = $data2->android_id;
                        // $reg_token = $android_id;
                        $data = array('server_notification'=>"Notification",'message'=>$description);
                        $target = $reg_token; 
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                        $fields = array();
                        $fields['data'] = $data;
                        if(is_array($target))
                        {
                          $fields['registration_ids'] = $target;
                        }
                        else
                        {
                          $fields['to'] = $target;
                        }
                        $headers = array(
                          'Content-Type:application/json',
                          'Authorization:key='.$server_key
                        );

                         $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                        $result = curl_exec($ch);
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        }
                        else
                        {
                            
                        }
                        curl_close($ch);
                }
                // echo 1;
        }
        else if ($selct_cust_emp=='All_Employee')
        {
                $data3 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_status`='1' and org_id='$org_id'    ");
                foreach ($data3->result() as $value) 
                {
                        $reg_token = $value->android_id;
                        // $reg_token = $android_id;
                        $data = array('server_notification'=>"Notification",'message'=>$description);
                        $target = $reg_token; 
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                        $fields = array();
                        $fields['data'] = $data;
                        if(is_array($target))
                        {
                          $fields['registration_ids'] = $target;
                        }
                        else
                        {
                          $fields['to'] = $target;
                        }
                        $headers = array(
                          'Content-Type:application/json',
                          'Authorization:key='.$server_key
                        );

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                        $result = curl_exec($ch);
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        }
                        else
                        {
                            
                        }
                        curl_close($ch);
                }
                // echo 1;

        }
        else if ($selct_cust_emp=='Employee')
        {

                $count = count($emp_id1);
                for ($i=0; $i < $count; $i++) 
                { 
                        $emp=$emp_id1[$i];
                        $data4 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp'")->row();
                        $reg_token = $data4->android_id;
                        // $reg_token = $android_id;
                        $data = array('server_notification'=>"Notification",'message'=>$description);
                        $target = $reg_token; 
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                        $fields = array();
                        $fields['data'] = $data;
                        if(is_array($target))
                        {
                          $fields['registration_ids'] = $target;
                        }
                        else
                        {
                          $fields['to'] = $target;
                        }
                        $headers = array(
                          'Content-Type:application/json',
                          'Authorization:key='.$server_key
                        );

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                        $result = curl_exec($ch);
                        if ($result === FALSE) 
                        {
                            die('FCM Send Error: ' . curl_error($ch));
                        }
                        else
                        {
                            
                        }
                        curl_close($ch);
                }
                // echo 1;
        }


    }
}

?>


