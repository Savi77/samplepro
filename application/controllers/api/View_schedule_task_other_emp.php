<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class View_schedule_task_other_emp extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
	public function index_post()
	{
		$org_id = $this->input->post('org_id');
        $employee_id = $this->input->post('employee_id');
		$date = $this->input->post('date');
        $assign_date = date("Y-m-d", strtotime($date));

        $this->db->select("name");
        $this->db->where("id",$employee_id);
        $employee_name=$this->db->get("tbl_admin_login")->row()->name;
	
        // $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `ticket_no`='$ticket_no' AND `status`!='in_complete'")->result();
        $this->db->select('tbl_user_query.*');
        $this->db->join('tbl_schedule','tbl_user_query.query_id = tbl_schedule.issue_id');
        $this->db->where('tbl_schedule.schedule_assign_to', $employee_id);
        $this->db->where('DATE(tbl_user_query.assign_date)', $assign_date);
        $this->db->where('tbl_user_query.org_id', $org_id);
        $this->db->where('tbl_user_query.delete_status', 0);
        $this->db->where('tbl_user_query.status != ', 'in_complete');
        $this->db->group_by('issue_id');
        $this->db->order_by('query_id', 'DESC');
        $data = $this->db->get('tbl_user_query')->result();
        // $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `assign_to`='$employee_id' AND `status`!='in_complete' AND DATE(`assign_date`)= '$assign_date'")->result();

        $finalArrayInner=array();
        if(!empty($data))
        {
            for($i=0;$i<count($data);$i++)
            {
                $created_date = date("d M y", strtotime($data[$i]->created_date));

                $issue_id = $data[$i]->query_id;
                
                $data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$issue_id' AND `schedule_assign_to`='$employee_id' AND reschedule!='reschedule'")->result();
                $customer_id = $data[$i]->customer_id;
                
                $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                $company_name = $data2->company_name;
                $contact_person_name1 = $data2->contact_person_name1;
                $email = $data2->email;
                $phone_no = $data2->phone_no;
                $city = $data2->city;
                $imei = $data2->imei;
                if ($imei != '') 
                {
                    $chatstatus = "YES";
                } 
                else 
                {
                    $chatstatus = "NO";
                }
                if(!empty($data1))
                {
                    $assign_date = date("d M Y", strtotime($data1[0]->assign_date));
                    $assign_starttime1 = date("h:i A", strtotime($data1[0]->assign_starttime));
                    $assign_endtime1 = date("h:i A", strtotime($data1[0]->assign_endtime));
                    $schedule_id = $data1[0]->schedule_id;
                    $schedule_ticket_no = $data1[0]->ticket_no;
                    $schedule_type = $data1[0]->schedule_type;
                    $schedule_type_id = $data1[0]->schedule_type_id;

                    $visit_type = $this->db->query("SELECT type_name FROM `tbl_schedule_type_name` WHERE `id`='$schedule_type_id'")->row();
                    if(!empty($visit_type))
                    {
                        $visit_type_name = $visit_type->type_name;
                    }
                    else
                    {
                        $visit_type_name = '';
                    }
                }
                else
                {
                    $assign_date = '';
                    $assign_starttime1 = '';
                    $assign_endtime1 = '';
                    $schedule_id ='';
                    $schedule_ticket_no = '';
                    $schedule_type = '';
                    $schedule_type_id = '';
                    $visit_type_name = '';
                }
                
                
                $arr = array(
                        'ticket_no' => $data[$i]->ticket_no,
                        'product_name' => $data[$i]->product_name,
                        'product_id' => $data[$i]->product_id,
                        'status' => ucfirst($data[$i]->status),
                        'query_id' => $data[$i]->query_id,
                        'org_id' => $org_id,
                        'issue' => $data[$i]->issue,
                        'created_date' => $created_date,
                        'priority_name' => $data[$i]->priority,
                        'assign_date' => $assign_date,
                        'starttime' => $assign_starttime1,
                        'endtime' => $assign_endtime1,
                        'schedule_id' => $schedule_id,
                        'schedule_ticket_no' => $schedule_ticket_no,
                        'schedule_type' => $schedule_type,
                        'schedule_visit_type' => $visit_type_name,
                        'customer_id' => $customer_id,
                        'company_name' => $company_name,
                        'contact_person_name1' => $contact_person_name1,
                        'email' => $email,
                        'phone_no' => $phone_no,
                        'city' => $city,
                        'chat_status' => $chatstatus,
                        'employee_name' => $employee_name,
                );
                array_push($finalArrayInner, $arr);
            }
            // $created_date = date("d M y", strtotime($data[0]->created_date));

            // $issue_id = $data[0]->query_id;
            
            // $data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$issue_id' AND `schedule_assign_to`='$employee_id' AND reschedule!='reschedule'")->result();
            // $customer_id = $data[0]->customer_id;
            
            // $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
            // $company_name = $data2->company_name;
            // $contact_person_name1 = $data2->contact_person_name1;
            // $email = $data2->email;
            // $phone_no = $data2->phone_no;
            // $city = $data2->city;
            // $imei = $data2->imei;
            // if ($imei != '') 
            // {
            //     $chatstatus = "YES";
            // } 
            // else 
            // {
            //     $chatstatus = "NO";
            // }
            // if(!empty($data1))
            // {
            //     $assign_date = date("d M Y", strtotime($data1[0]->assign_date));
            //     $assign_starttime1 = date("h:i A", strtotime($data1[0]->assign_starttime));
            //     $assign_endtime1 = date("h:i A", strtotime($data1[0]->assign_endtime));
            //     $schedule_id = $data1[0]->schedule_id;
            //     $schedule_ticket_no = $data1[0]->ticket_no;
            //     $schedule_type = $data1[0]->schedule_type;
            //     $schedule_type_id = $data1[0]->schedule_type_id;

            //     $visit_type = $this->db->query("SELECT type_name FROM `tbl_schedule_type_name` WHERE `id`='$schedule_type_id'")->row();
            //     if(!empty($visit_type))
            //     {
            //         $visit_type_name = $visit_type->type_name;
            //     }
            //     else
            //     {
            //         $visit_type_name = '';
            //     }
            // }
            // else
            // {
            //     $assign_date = '';
            //     $assign_starttime1 = '';
            //     $assign_endtime1 = '';
            //     $schedule_id ='';
            //     $schedule_ticket_no = '';
            //     $schedule_type = '';
            //     $schedule_type_id = '';
            //     $visit_type_name = '';
            // }
		    
            
            // $arr = array(
            //         'ticket_no' => $data[0]->ticket_no,
            //         'product_name' => $data[0]->product_name,
            //         'product_id' => $data[0]->product_id,
            //         'status' => ucfirst($data[0]->status),
            //         'query_id' => $data[0]->query_id,
            //         'org_id' => $org_id,
            //         'issue' => $data[0]->issue,
            //         'created_date' => $created_date,
            //         'priority_name' => $data[0]->priority,
            // 		'assign_date' => $assign_date,
        	// 		'starttime' => $assign_starttime1,
        	// 		'endtime' => $assign_endtime1,
        	// 		'schedule_id' => $schedule_id,
        	// 		'schedule_ticket_no' => $schedule_ticket_no,
        	// 		'schedule_type' => $schedule_type,
        	// 		'schedule_visit_type' => $visit_type_name,
         	// 		'customer_id' => $customer_id,
         	// 		'company_name' => $company_name,
        	// 		'contact_person_name1' => $contact_person_name1,
        	// 		'email' => $email,
        	// 		'phone_no' => $phone_no,
        	// 		'city' => $city,
            //         'chat_status' => $chatstatus,
            //         'employee_name' => $employee_name,
            // );
             
            $responce = array(
				'status'=>200,
				'msg' =>'View schedule task other emp List Fetch Successfully',
				'data' => $finalArrayInner
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