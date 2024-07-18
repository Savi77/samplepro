<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Activity_snapshot_complete extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $user_id = $this->input->post('user_id');
        $user_type = $this->input->post('user_type');
        $org_id = $this->input->post('org_id');
        $final_array = array();

        if ($user_type == 'C') 
        {
			$data2 = $this->db->query("SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime, tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE tbl_user_query.customer_id=$user_id AND tbl_user_query.status='completed'")->result();
            
            for($i=0;$i<COUNT($data2);$i++)
            {
                $f_data = array(
                    "query_id"=> $data2[$i]->query_id,
                    "org_id"=> $data2[$i]->org_id,
                    "customer_id"=> $data2[$i]->customer_id,
                    "product_id"=> $data2[$i]->product_id,
                    "ticket_no"=> substr($data2[$i]->ticket_no, 2),
                    "product_name"=> $data2[$i]->product_name,
                    "issue"=> $data2[$i]->issue,
                    "status"=> ucfirst($data2[$i]->status),
                    "user_remark"=> $data2[$i]->user_remark,
                    "rating"=> $data2[$i]->rating,
                    "assign_to"=> $data2[$i]->assign_to,
                    "priority"=> $data2[$i]->priority,
                    "activity_id"=> $data2[$i]->activity_id,
                    "activity_name"=> $data2[$i]->activity_name,
                    "type"=> $data2[$i]->type,
                    "assign_date"=> $data2[$i]->assign_date,
                    "assign_starttime"=> date("h:i A", strtotime($data2[$i]->assign_starttime)),
                    "assign_endtime"=>  date("h:i A", strtotime($data2[$i]->assign_endtime)),
                    "delete_status"=> $data2[$i]->delete_status,
                    "created_date"=> $data2[$i]->created_date,
                    "company_name"=> $data2[$i]->company_name,
                    "mailing_name"=> $data2[$i]->mailing_name,
                    "contact_person_name1"=> $data2[$i]->contact_person_name1,
                    "email"=> $data2[$i]->email,
                    "alternate_number"=> $data2[$i]->alternate_number,
                    "landline_number"=> $data2[$i]->landline_number,
                    "state"=> $data2[$i]->state,
                    "city"=> $data2[$i]->city,
                    "address"=> $data2[$i]->address,
                    "address2"=> $data2[$i]->address2,
                    "g_lat"=> $data2[$i]->g_lat,
                    "g_long"=> $data2[$i]->g_long,
                    "phone_no"=> $data2[$i]->phone_no,
                );
                array_push($final_array,$f_data);
            }
			$completed = $final_array;
		} 
        else if($user_type == 'E')
        {
			// $res = $this->db->query(" SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($user_id)  ")->row();
			// $result = $res->assign_to;

			// if (strpos($result, ',') !== false) 
            // {
            //     $data2 = $this->db->query("SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime, tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE FIND_IN_SET($user_id,assign_to) AND tbl_user_query.status='completed' ")->result();
            //     for($i=0;$i<COUNT($data2);$i++)
            //     {
            //         $f_data = array(
            //             "query_id"=> $data2[$i]->query_id,
            //             "org_id"=> $data2[$i]->org_id,
            //             "customer_id"=> $data2[$i]->customer_id,
            //             "product_id"=> $data2[$i]->product_id,
            //             "ticket_no"=> substr($data2[$i]->ticket_no, 2),
            //             "product_name"=> $data2[$i]->product_name,
            //             "issue"=> $data2[$i]->issue,
            //             "status"=> ucfirst($data2[$i]->status),
            //             "user_remark"=> $data2[$i]->user_remark,
            //             "rating"=> $data2[$i]->rating,
            //             "assign_to"=> $data2[$i]->assign_to,
            //             "priority"=> $data2[$i]->priority,
            //             "activity_id"=> $data2[$i]->activity_id,
            //             "activity_name"=> $data2[$i]->activity_name,
            //             "type"=> $data2[$i]->type,
            //             "assign_date"=> $data2[$i]->assign_date,
            //             "assign_starttime"=> date("h:i A", strtotime($data2[$i]->assign_starttime)),
            //             "assign_endtime"=>  date("h:i A", strtotime($data2[$i]->assign_endtime)),
            //             "delete_status"=> $data2[$i]->delete_status,
            //             "created_date"=> $data2[$i]->created_date,
            //             "company_name"=> $data2[$i]->company_name,
            //             "mailing_name"=> $data2[$i]->mailing_name,
            //             "contact_person_name1"=> $data2[$i]->contact_person_name1,
            //             "email"=> $data2[$i]->alternate_email,
            //             "alternate_number"=> $data2[$i]->alternate_number,
            //             "landline_number"=> $data2[$i]->landline_number,
            //             "state"=> $data2[$i]->state,
            //             "city"=> $data2[$i]->city,
            //             "address"=> $data2[$i]->address,
            //             "address2"=> $data2[$i]->address2,
            //             "g_lat"=> $data2[$i]->g_lat,
            //             "g_long"=> $data2[$i]->g_long,
            //             "phone_no"=> $data2[$i]->phone_no,
            //         );
            //         array_push($final_array,$f_data);
            //     }
            //     $completed = $final_array;
				
			// } 
            // else 
            // {
			// 	$data2 = $this->db->query("SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime, tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE tbl_user_query.assign_to IN($user_id) AND tbl_user_query.status='completed' ")->result();
			// 	for($i=0;$i<COUNT($data2);$i++)
            //     {
            //         $f_data = array(
            //             "query_id"=> $data2[$i]->query_id,
            //             "org_id"=> $data2[$i]->org_id,
            //             "customer_id"=> $data2[$i]->customer_id,
            //             "product_id"=> $data2[$i]->product_id,
            //             "ticket_no"=> substr($data2[$i]->ticket_no, 2),
            //             "product_name"=> $data2[$i]->product_name,
            //             "issue"=> $data2[$i]->issue,
            //             "status"=> ucfirst($data2[$i]->status),
            //             "user_remark"=> $data2[$i]->user_remark,
            //             "rating"=> $data2[$i]->rating,
            //             "assign_to"=> $data2[$i]->assign_to,
            //             "priority"=> $data2[$i]->priority,
            //             "activity_id"=> $data2[$i]->activity_id,
            //             "activity_name"=> $data2[$i]->activity_name,
            //             "type"=> $data2[$i]->type,
            //             "assign_date"=> $data2[$i]->assign_date,
            //             "assign_starttime"=> date("h:i A", strtotime($data2[$i]->assign_starttime)),
            //             "assign_endtime"=>  date("h:i A", strtotime($data2[$i]->assign_endtime)),
            //             "delete_status"=> $data2[$i]->delete_status,
            //             "created_date"=> $data2[$i]->created_date,
            //             "company_name"=> $data2[$i]->company_name,
            //             "mailing_name"=> $data2[$i]->mailing_name,
            //             "contact_person_name1"=> $data2[$i]->contact_person_name1,
            //             "email"=> $data2[$i]->alternate_email,
            //             "alternate_number"=> $data2[$i]->alternate_number,
            //             "landline_number"=> $data2[$i]->landline_number,
            //             "state"=> $data2[$i]->state,
            //             "city"=> $data2[$i]->city,
            //             "address"=> $data2[$i]->address,
            //             "address2"=> $data2[$i]->address2,
            //             "g_lat"=> $data2[$i]->g_lat,
            //             "g_long"=> $data2[$i]->g_long,
            //             "phone_no"=> $data2[$i]->phone_no,
            //         );
            //         array_push($final_array,$f_data);
            //     }
            //     $completed = $final_array;
			// }
            $data = $this->db->query("  SELECT * FROM `tbl_user_query` WHERE org_id='$org_id' and status='completed' and assign_to='$user_id' ORDER BY query_id DESC ");

            $issue = array();
            foreach ($data->result() as $value) 
            {
                // echo "<pre>";
                // print_r($value);
                
                $customer_id = $value->customer_id;
            
                if(!empty($customer_id))
                {
                    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $company_name = $data1->company_name;
                    $contact_person_name1 = $data1->contact_person_name1;
                    $phone_no = $data1->phone_no;
                    $email = $data1->email;
                    $customer_id = $data1->customer_id;
                }
                else
                {
                    $company_name = '';
                    $contact_person_name1 = '';
                    $phone_no = '';
                    $email = '';
                    $customer_id = '';
                }
               
                $query_id = $value->query_id;
                $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                $schedulecount = $data3->count;
                if ($schedulecount > 1) {
                    $highlight = "YES";
                } else {
                    $highlight = "NO";
                }
                if ($schedulecount > 0) {
                    $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
                    $schedulecount1 = $data_count->count;
                    $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
                    $employee_id = $data4->schedule_assign_to;
                    $assign_date = $data4->assign_date;
                    $assign_starttime = $data4->assign_starttime;
                    $assign_endtime = $data4->assign_endtime;
                    $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
                    $employee_name = $data5->name;
                    $check_assign = "Yes";
                } else {
                    $check_assign = "No";
                }

                $arr = array(
                    'company_name' => $company_name,
                    'contact_person_name1' => $contact_person_name1,
                    'phone_no' => $phone_no,
                    'email' => $email,
                    'customer_id' => $customer_id,
                    'product_name' => $value->product_name,
                    'query_id' => $value->query_id,
                    'issue' => $value->issue,
                    'ticket_no' => $value->ticket_no,
                    'status' => ucfirst($value->status),
                    'priority' => $value->priority,
                    'created_date' => $value->created_date,
                    'assign_date' => $assign_date,
                    'starttime' => date("h:i A", strtotime($assign_starttime)),
                    'endtime' => date("h:i A", strtotime($assign_endtime)),
                    'check_assign' => $check_assign,
                    'highlight' => $highlight,
                    'schedulecount' => $schedulecount1,
                    'employee_name' => $employee_name
                );
                array_push($issue, $arr);
            }
            $completed = $issue;
           
		}
        else
        {
            $completed = '';
        }

        if(!empty($completed))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Activity Snapshot Completed Task Fetched Successfully',
                'data' => $completed
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Something Went Wrong',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
	}
}