<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Activity_snapshot_inprogrss extends REST_Controller 
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
			$data1 = $this->db->query("SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime, tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE tbl_user_query.customer_id=$user_id AND tbl_user_query.status='in_progress'")->result();
            for($i=0;$i<COUNT($data1);$i++)
            {
                $f_data = array(
                    "query_id"=> $data1[$i]->query_id,
                    "org_id"=> $data1[$i]->org_id,
                    "customer_id"=> $data1[$i]->customer_id,
                    "product_id"=> $data1[$i]->product_id,
                    "ticket_no"=> substr($data1[$i]->ticket_no, 2),
                    "product_name"=> $data1[$i]->product_name,
                    "issue"=> $data1[$i]->issue,
                    "status"=> ucfirst($data1[$i]->status),
                    "user_remark"=> $data1[$i]->user_remark,
                    "rating"=> $data1[$i]->rating,
                    "assign_to"=> $data1[$i]->assign_to,
                    "priority"=> $data1[$i]->priority,
                    "activity_id"=> $data1[$i]->activity_id,
                    "activity_name"=> $data1[$i]->activity_name,
                    "type"=> $data1[$i]->type,
                    "assign_date"=> date("d M Y", strtotime($data1[$i]->assign_date)),
                    "assign_starttime"=> date("h:i A", strtotime($data1[$i]->assign_starttime)),
                    "assign_endtime"=>  date("h:i A", strtotime($data1[$i]->assign_endtime)),
                    "delete_status"=> $data1[$i]->delete_status,
                    "created_date"=> $data1[$i]->created_date,
                    "company_name"=> $data1[$i]->company_name,
                    "mailing_name"=> $data1[$i]->mailing_name,
                    "contact_person_name1"=> $data1[$i]->contact_person_name1,
                    "email"=> $data1[$i]->email,
                    "alternate_number"=> $data1[$i]->alternate_number,
                    "landline_number"=> $data1[$i]->landline_number,
                    "state"=> $data1[$i]->state,
                    "city"=> $data1[$i]->city,
                    "address"=> $data1[$i]->address,
                    "address2"=> $data1[$i]->address2,
                    "g_lat"=> $data1[$i]->g_lat,
                    "g_long"=> $data1[$i]->g_long,
                    "phone_no"=> $data1[$i]->phone_no,
                );
                array_push($final_array,$f_data);
            }
            $inprogress = $final_array;
		} 
        else if($user_type == 'E')
        {
			// $res = $this->db->query(" SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($user_id)  ")->row();
			// $result = $res->assign_to;

			// if (strpos($result, ',') !== false) 
            // {
            //     $data1 = $this->db->query(" SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime, tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE FIND_IN_SET($user_id,assign_to) AND tbl_user_query.status='in_progress' ")->result();
            //     for($i=0;$i<COUNT($data1);$i++)
            //     {
            //         $f_data = array(
            //             "query_id"=> $data1[$i]->query_id,
            //             "org_id"=> $data1[$i]->org_id,
            //             "customer_id"=> $data1[$i]->customer_id,
            //             "product_id"=> $data1[$i]->product_id,
            //             "ticket_no"=> substr($data1[$i]->ticket_no, 2),
            //             "product_name"=> $data1[$i]->product_name,
            //             "issue"=> $data1[$i]->issue,
            //             "status"=> $data1[$i]->status,
            //             "status"=> $data1[$i]->status,
            //             "user_remark"=> $data1[$i]->user_remark,
            //             "rating"=> $data1[$i]->rating,
            //             "assign_to"=> $data1[$i]->assign_to,
            //             "priority"=> $data1[$i]->priority,
            //             "activity_id"=> $data1[$i]->activity_id,
            //             "activity_name"=> $data1[$i]->activity_name,
            //             "type"=> $data1[$i]->type,
            //             "assign_date"=> $data1[$i]->assign_date,
            //             "assign_starttime"=> date("h:i A", strtotime($data1[$i]->assign_starttime)),
            //             "assign_endtime"=>  date("h:i A", strtotime($data1[$i]->assign_endtime)),
            //             "delete_status"=> $data1[$i]->delete_status,
            //             "created_date"=> $data1[$i]->created_date,
            //             "company_name"=> $data1[$i]->company_name,
            //             "mailing_name"=> $data1[$i]->mailing_name,
            //             "contact_person_name1"=> $data1[$i]->contact_person_name1,
            //             "email"=> $data1[$i]->alternate_email,
            //             "alternate_number"=> $data1[$i]->alternate_number,
            //             "landline_number"=> $data1[$i]->landline_number,
            //             "state"=> $data1[$i]->state,
            //             "city"=> $data1[$i]->city,
            //             "address"=> $data1[$i]->address,
            //             "address2"=> $data1[$i]->address2,
            //             "g_lat"=> $data1[$i]->g_lat,
            //             "g_long"=> $data1[$i]->g_long,
            //             "phone_no"=> $data1[$i]->phone_no,
            //         );
            //         array_push($final_array,$f_data);
            //     }
            //     $inprogress = $final_array;
				
			// } 
            // else 
            // {
			// 	$data1 = $this->db->query("SELECT *,tbl_schedule.assign_starttime, tbl_schedule.assign_endtime,tbl_user_query.status FROM `tbl_user_query` JOIN tbl_customer ON tbl_user_query.customer_id=tbl_customer.customer_id JOIN tbl_schedule ON tbl_user_query.query_id=tbl_schedule.issue_id WHERE tbl_user_query.assign_to IN($user_id) AND tbl_user_query.status='in_progress'  ")->result();
            //     for($i=0;$i<COUNT($data1);$i++)
            //     {
            //         $f_data = array(
            //             "query_id"=> $data1[$i]->query_id,
            //             "org_id"=> $data1[$i]->org_id,
            //             "customer_id"=> $data1[$i]->customer_id,
            //             "product_id"=> $data1[$i]->product_id,
            //             "ticket_no"=> substr($data1[$i]->ticket_no, 2),
            //             "product_name"=> $data1[$i]->product_name,
            //             "issue"=> $data1[$i]->issue,
            //             "status"=> $data1[$i]->status,
            //             "status"=> $data1[$i]->status,
            //             "user_remark"=> $data1[$i]->user_remark,
            //             "rating"=> $data1[$i]->rating,
            //             "assign_to"=> $data1[$i]->assign_to,
            //             "priority"=> $data1[$i]->priority,
            //             "activity_id"=> $data1[$i]->activity_id,
            //             "activity_name"=> $data1[$i]->activity_name,
            //             "type"=> $data1[$i]->type,
            //             "assign_date"=> $data1[$i]->assign_date,
            //             "assign_starttime"=> date("h:i A", strtotime($data1[$i]->assign_starttime)),
            //             "assign_endtime"=>  date("h:i A", strtotime($data1[$i]->assign_endtime)),
            //             "delete_status"=> $data1[$i]->delete_status,
            //             "created_date"=> $data1[$i]->created_date,
            //             "company_name"=> $data1[$i]->company_name,
            //             "mailing_name"=> $data1[$i]->mailing_name,
            //             "contact_person_name1"=> $data1[$i]->contact_person_name1,
            //             "email"=> $data1[$i]->alternate_email,
            //             "alternate_number"=> $data1[$i]->alternate_number,
            //             "landline_number"=> $data1[$i]->landline_number,
            //             "state"=> $data1[$i]->state,
            //             "city"=> $data1[$i]->city,
            //             "address"=> $data1[$i]->address,
            //             "address2"=> $data1[$i]->address2,
            //             "g_lat"=> $data1[$i]->g_lat,
            //             "g_long"=> $data1[$i]->g_long,
            //             "phone_no"=> $data1[$i]->phone_no,
            //         );
            //         array_push($final_array,$f_data);
            //     }
            //     $inprogress = $final_array;
			// }
            $data = $this->db->query(" SELECT * FROM `tbl_user_query`  WHERE org_id='$org_id' and status='in_progress'  and assign_to='$user_id' ORDER BY query_id DESC  ");
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
                    $assign_date = date("d M Y", strtotime($data4->assign_date));
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
            $inprogress = $issue;
           
		}
        else
        {
            $inprogress = '';
        }

        if(!empty($inprogress))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Activity Snapshot Inprogrss Task Fetched Successfully',
                'data' => $inprogress
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