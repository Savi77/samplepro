<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class User_geofence extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id'); 
        $user_id=$this->input->post('user_id'); 
        $customer_id=$this->input->post('customer_id'); 
        $status =$this->input->post('status'); 
        if($status=='outside')
        {
            $this->db->where("user_id",$user_id);
            $this->db->where("org_id",$org_id);
            $this->db->where("customer_id",$customer_id);
            $this->db->where("status",'inside');
            $insideres=$this->db->get("tbl_user_geofence_notification")->result();
            if(count($insideres)>0)
            {
                $this->db->where("user_id",$user_id);
                $this->db->where("customer_id",$customer_id);
                $this->db->where("status",'outside');
                $outsideres=$this->db->get("tbl_user_geofence_notification")->result();
                if(count($outsideres)<=0)
                {
                    $Insertarray=array(
                                    'user_id'=>$user_id,
                                    'org_id'=>$org_id,
                                    'customer_id'=>$customer_id,
                                    'status'=>$status,
                                    'date_created'=>date("Y-m-d H:i:s")
                                    );
                    $res2=$this->db->Insert("tbl_user_geofence_notification",$Insertarray);
                    if($res2)
                    {
                        $this->db->where("employee_id",$user_id);
                        $this->db->where("customer_id",$customer_id);
                        $this->db->where("org_id",$org_id);
                        $this->db->where_not_in("status",'completed');
                        $this->db->order_by("created_date",'desc');
                        $task_status=$this->db->get("tbl_task_status")->result();

                        if(count($task_status)>0)
                        {
                            $this->db->where("id",$user_id);
                            $emp=$this->db->get("tbl_admin_login")->result();
                            $reg_token = $emp[0]->android_id;
                            $data = array('server_notification'=>"customer_task_status",'message'=>'You have not completed your task. Please complete the task');
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
                                //echo 1;
                            }
                                curl_close($ch);
                        }

                        //--------------------------------------------
                       
                        $responce = array(
                            'status'=>200,
                            'msg' =>"Employee $status Customer Location"
                            ); 
                    }
                    else
                    {
                       
                        $responce = array(
                            'status'=>500,
                            'msg' =>'Failed'
                            ); 
                    }
                }
                else
                {
                        
                        $responce = array(
                            'status'=>500,
                            'msg' =>"Employee $status Customer Location"
                            ); 						
                }
            }	
            else
            {
                    $responce = array(
                        'status'=>500,
                        'msg' =>"Employee $status Customer Location"
                        ); 						
            }


        }
        else
        {
            $this->db->where("user_id",$user_id);
            $this->db->where("customer_id",$customer_id);
            $this->db->where("org_id",$org_id);
            $this->db->where("status",'inside');
            $insideres=$this->db->get("tbl_user_geofence_notification")->result();
            if(count($insideres)<=0)
            {
                $Insertarray=array(
                            'user_id'=>$user_id,
                            'org_id'=>$org_id,
                            'customer_id'=>$customer_id,
                            'status'=>$status,
                            'date_created'=>date("Y-m-d H:i:s")
                            );
                $res=$this->db->Insert("tbl_user_geofence_notification",$Insertarray);
                if($res)
                {
                    $responce = array(
                        'status'=>200,
                        'msg' =>"Employee $status Customer Location"
                        ); 
                }
                else
                {
                    $responce = array(
                        'status'=>500,
                        'msg' =>'Failed'
                        ); 
                }					
            }
            else
            {
                $responce = array(
                    'status'=>500,
                    'msg' =>"Employee $status Customer Location"
                    ); 							
            }
        }
        $this->response($responce, REST_Controller::HTTP_OK); 
    }
}