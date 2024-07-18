<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
         }

         //========================= Customer add/ edit/ delete ============================================ 

         public function schedule_list()
         {
           return $this->db->query("SELECT * FROM `tbl_user_query`");
         }

         public function customer_list()
         {
           return $this->db->query("SELECT * FROM `tbl_customer` WHERE delete_status='1'")->result();
         }

    

        public function getstate($country_id)
        {
              $data=$this->db->query(" SELECT * FROM states WHERE country_id='$country_id'");
              echo "<option value=''>Select State</option>";
              foreach ($data->result() as  $value) 
              {
                echo "<option value='".$value->id."'>".$value->name."</option>";
              }
        }


          public function Add_customer($formdata) 
          {
               $admin_id = $this->session->id;

               $dob1 = date("Y-m-d", strtotime($formdata['dob']));
               $company_anniversary = date("Y-m-d", strtotime($formdata['company_anniversary']));
               $marriage_anniversary = date("Y-m-d", strtotime($formdata['marriage_anniversary']));

               //  if ($mad=='' && $cad=='') 
               // {
               //   $mad1 = "";
               //   $cad1 = "";
               // }
               // else if($mad!='' && $cad!='') 
               // {
               //   $mad1 = date("Y-m-d", strtotime($mad));
               //   $cad1 = date("Y-m-d", strtotime($cad));
               // }
               // else if($mad!='' && $cad=='') 
               // {
               //   $mad1 = date("Y-m-d", strtotime($mad));
               //   $cad1 = "";
               // }
               // else if($mad=='' && $cad!='') 
               // {
               //   $mad1 = "";
               //   $cad1 = date("Y-m-d", strtotime($cad));
               // }

              $date=date("Y-m-d H:i:s"); 
              $data1=array(
                            'created_by'=>$admin_id,
                            'type_id'=>$formdata['type'],
                            'business_id'=>$formdata['business'],
                            'location_id'=>$formdata['location'],
                            'group_id'=>$formdata['group'],
                            'company_name'=>$formdata['ordanizer_name'],
                            'contact_person_name1'=>$formdata['contact_person'],
                            'alternate_email'=>$formdata['alternate_email_id'],
                            'phone_no'=>$formdata['contact_number1'],
                            'alternate_number'=>$formdata['contact_number2'],
                            'landline_number'=>$formdata['landline_number'],
                            'email'=>$formdata['email_id'],
                            'address'=>$formdata['address'],
                            'city'=>$formdata['city'],
                            'state'=>$formdata['state'],
                            'country'=>$formdata['country'],
                            'password'=>$formdata['password'],
                            'dob'=>$dob1,
                            'company_anniversary'=>$company_anniversary,
                            'marriage_anniversary'=>$marriage_anniversary,
                            'android_id'=>'',
                            'created_date'=>$date
                      );

              $res=$this->db->insert('tbl_customer',$data1);
              if($res)
              {
                echo 1;
              }
              else
              {
                 echo 0;
              }
          }


           public function delete_customer($customerid) 
          { 
              $this->db->set('delete_status',0);
              $this->db->where('customer_id',$customerid);
             return $this->db->update('tbl_customer');
          }

          public function edit_customer($customerid)
         {
          ///echo "fdsf";
           return $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customerid'");

         }

         // getting selected state list

         public function selected_state_list($customerid)
        {
              $data = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customerid'")->row();
              $country = $data->country;

              return $this->db->query(" SELECT * FROM states WHERE country_id='$country'")->result();
        }


     public function update_customer($formdata)
      {
        
               $dob1 = date("Y-m-d", strtotime($formdata['dob']));
               $company_anniversary = date("Y-m-d", strtotime($formdata['company_aniversary']));
               $marriage_anniversary = date("Y-m-d", strtotime($formdata['marriage_aniversary']));

              $this->db->where('customer_id', $formdata['customer_id']);     
              $data1=array(
                            'type_id'=>$formdata['type'],
                            'business_id'=>$formdata['business'],
                            'location_id'=>$formdata['location'],
                            'group_id'=>$formdata['group'],
                            'company_name'=>$formdata['ordanizer_name'],
                            'contact_person_name1'=>$formdata['contact_person'],
                            'alternate_email'=>$formdata['alternate_email_id'],
                            'phone_no'=>$formdata['contact_number1'],
                            'alternate_number'=>$formdata['contact_number2'],
                            'landline_number'=>$formdata['landline_number'],
                            'email'=>$formdata['email_id'],
                            'address'=>$formdata['address'],
                            'city'=>$formdata['city'],
                            'state'=>$formdata['state'],
                            'country'=>$formdata['country'],
                            'dob'=>$dob1,
                            'company_anniversary'=>$company_anniversary,
                            'marriage_anniversary'=>$marriage_anniversary,
                      );

               $this->db->update('tbl_customer', $data1);
         
        }



//========================= Customer add/ edit/ delete ============================================ 


// ================================================= isuue list ===========================================================

         public function Issue()
         {
            if($this->session->user_type=='SA')
            {
                $data = $this->db->query("SELECT * FROM `tbl_user_query` ORDER BY query_id DESC");
                 $issue=array();
                 foreach ($data->result() as $value)
                 {
                    $customer_id = $value->customer_id;
                    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;

                    $employee_id = $value->assign_to;
                    $data2 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` IN($employee_id)");
                    // $employee_name = $data2->name;
                    $area2="";
                   foreach ($data2->result() as $multiple_employee) 
                   {
                      $area2=$area2.$multiple_employee->name.",";
                   }
                    $employee_name = trim($area2, ',');

                    $arr=array
                    (
                      'company_name'=>$company_name,
                      'contact_person_name1'=>$contact_person_name1,
                      'phone_no'=>$phone_no,
                      'email'=>$email,
                      'customer_id'=>$customer_id,
                      'product_name'=>$value->product_name,
                      'query_id'=>$value->query_id,
                      'issue'=>$value->issue,
                      'ticket_no'=>$value->ticket_no,
                      'status'=>$value->status,
                      'created_date'=>$value->created_date,
                      'employee_name'=>$employee_name
                    );
                    array_push($issue, $arr);
                 }
                 return $issue;
            }
            else
            {
                $employee_id = $this->session->id;
                
                //================== get id from comma sepereted column ==============================

                $res = $this->db->query("SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($employee_id)")->row();
                $result = $res->assign_to;
                if (strpos($result, ',') !== false) 
                {
                    $data = $this->db->query("SELECT * FROM `tbl_user_query` where FIND_IN_SET($employee_id,assign_to) ORDER BY query_id DESC");
                }
                else
                {
                    $data = $this->db->query("SELECT * FROM `tbl_user_query` where `assign_to` IN($employee_id) ORDER BY query_id DESC");
                }
                // $this->db->like('assign_to', $employee_id);
                // $data = $this->db->get('tbl_user_query');

                // print_r($data->result());
                $issue=array();
                foreach ($data->result() as $value)
                {
                  $customer_id = $value->customer_id;
                  $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                  $company_name = $data1->company_name;
                  $contact_person_name1 = $data1->contact_person_name1;
                  $phone_no = $data1->phone_no;
                  $email = $data1->email;
                  $customer_id = $data1->customer_id;

                   $employee_id = $value->assign_to;
                    $data2 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'");
                    // $employee_name = $data2->name;
                    $area2="";
                   foreach ($data2->result() as $multiple_employee) 
                   {
                      $area2=$area2.$multiple_employee->name.",";
                   }
                    $employee_name = trim($area2, ',');

                  $arr=array
                  (
                    'company_name'=>$company_name,
                    'contact_person_name1'=>$contact_person_name1,
                    'phone_no'=>$phone_no,
                    'email'=>$email,
                    'customer_id'=>$customer_id,
                    'product_name'=>$value->product_name,
                    'query_id'=>$value->query_id,
                    'issue'=>$value->issue,
                    'ticket_no'=>$value->ticket_no,
                    'status'=>$value->status,
                    'created_date'=>$value->created_date,
                    'assign_date'=>$value->assign_date,
                    'starttime'=>$value->assign_starttime,
                    'endtime'=>$value->assign_endtime,
                    'employee_name'=>$employee_name
                  );
                  array_push($issue, $arr);
                }
                return $issue;
            }
             
         }

// ================================================= isuue list ============================================================

// ========================================== employee list ==================================================
         public function availability($start_date,$start_time,$end_time)
         {
            $date = date("Y-m-d", strtotime($start_date));
               $not_available = $this->db->query("SELECT `assign_to` from tbl_user_query where (`assign_date` = '$date' and `assign_endtime` <= '$end_time') and (`assign_date` = '$date' and `assign_starttime` >= '$start_time') AND status != 'completed'");
               $data="";
               foreach ($not_available->result() as $value) 
               {
                    $data = $value->assign_to;
               }

                $emp_id = explode(',', $data);
                $final_emp_id =" ";

               for($i=0;$i<sizeof($emp_id);$i++)
                {   
                   $final_emp_id=$final_emp_id."'".$emp_id[$i]."',";
                }
                $final_emp_id1=rtrim($final_emp_id, ",");

               return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id` NOT IN($final_emp_id1) AND `user_type`='E' AND user_status='1'");

               // print_r($result->result());

               
                 //  echo "<select class='form-control soft_skill_list' id='employee' multiple='multiple' name='employee[]'' onchange='document.getElementById('err1').innerHTML='' ' readonly=''>";
                 //        foreach ($result->result() as $value1)
                 //        {
                 //          echo "<option value=". $value1->id .">".$value1->name."</option>";
                 //        } 
                 // echo "</select>";           
         }


          public function assign_task()
         {
            return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' AND user_status='1'");
         }

// ========================================== employee list ==================================================

// ========================================== asign task to customer ==================================================

          public function assign_to($query_id,$employee,$start_date,$event_start_time,$event_end_time)
         {

              $emp_id="";
              for ($i=0; $i < count($employee); $i++) 
              { 
                   $emp_id=$emp_id.$employee[$i].",";
              }
              $employee_id = trim($emp_id, ',');


              for ($j=0; $j < count($employee); $j++) 
              { 
                   $emp_id=$employee[$j];
                   $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$emp_id'")->row();
                   $android_id = $data2->android_id;
                   $name = $data2->name;

                   $data3 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
                   $ticket_no = $data3->ticket_no;
                   $customer_id = $data3->customer_id;


                   //======================= inserting notification to table for record ===============

                            $notification_msg = "Allocated new task and ticket no.is ".$ticket_no;
                            $date=date("Y-m-d H:i:s");
                            
                            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$emp_id','New task allocated','$notification_msg','pending','$date')");

                            $notification_id = $this->db->insert_id($res);
                         
                   //======================= / inserting notification to table for record ===============


                    //======================= sending notification to employee regarding assign issue ===============
                    $reg_token = $android_id;
                    $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$ticket_no,'query_id'=>$query_id,'notification_id'=>$notification_id);
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

                          

                          //======================= sending notification to customer regarding assign issue ===============

                           $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                           $android_id = $data3->android_id;
                           $contact_person_name1 = $data2->contact_person_name1;

                           // ----------------- Insertinf notification to table ---------------------------

                           $notification_msg = "Your issue ".$ticket_no." is assign to ".$name;
                                $date=date("Y-m-d H:i:s");
                                
                           $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','pending','$date')");

                            $notification_id1 = $this->db->insert_id($res1);

                          // ----------------- Insertinf notification to table ---------------------------

                          $reg_token = $android_id;
                          $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id1);
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
                                $notification_date = date("Y-m-d H:i:s", strtotime($start_date));
                                $this->db->set('assign_to',$employee_id);
                                $this->db->set('assign_date',$notification_date);
                                $this->db->set('assign_starttime',$event_start_time);
                                $this->db->set('assign_endtime',$event_end_time);
                                $this->db->where('query_id',$query_id);
                                $this->db->update('tbl_user_query');

                                
                                echo 1;
                            }
                             curl_close($ch);

                          //======================= / sending notification to customer regarding assign issue ===============
                      }
                      curl_close($ch);

                       //======================= sending notification to employee regarding assign issue ===============
              }
                //print_r($regid);
               
         }

// ========================================== / asign task to customer ==================================================

         public function change_status($query_id,$description,$status_update)
         {
            $employee_id = $this->session->id;
            $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id'")->row();
            $status = $data->status;
            $customer_id = $data->customer_id;
            $product_id = $data->product_id;
            $ticket_no = $data->ticket_no;
            // if ($status=='pending') 
            // {
                // echo "123";
                // $in_progress='in_progress';
                //======================= sending notification to customer regarding assign issue ===============

                          $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                           $android_id = $data3->android_id;


                          $notification_date = date("Y-m-d H:i:s");
                              
                          $notification_msg = "Your issue ".$ticket_no." is ".$change_status;
                          $date=date("Y-m-d H:i:s");
                          
                          $res = $this->db->query("INSERT INTO `tbl_push_notification`(`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$customer_id','$query_id','$emp_id','$customer_id','Query allocated','$notification_msg','$status_update','$date')");

                         $notification_id = $this->db->insert_id($res);

                          $reg_token = $android_id;
                          $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$ticket_no.' is assign to '.$name,'query_id'=>$query_id,'notification_id'=>$notification_id);
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
                                 $this->db->set('status',$status_update);
                                 $this->db->where('query_id',$query_id);      
                                 $this->db->update('tbl_user_query');

                                 $this->db->query("INSERT INTO `tbl_task_status`(`employee_id`, `customer_id`, `product_id`, `ticket_no`, `remark`, `status`, `created_date`) VALUES ('$employee_id','$customer_id','$product_id','$ticket_no','$description','$status_update','$date')");
                                // echo 1;
                            }
                             curl_close($ch);

                          //======================= / sending notification to customer regarding assign issue ===============

                // $this->db->set('status',$in_progress);
                // $this->db->where( 'query_id',$query_id );       
                // $this->db->update('tbl_push_notification');
            // }
         }

} 
