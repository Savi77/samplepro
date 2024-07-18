<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Schedule_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
	public function index_post()
	{
		$org_id = $this->input->post('org_id');
        $employee_id = $this->input->post('employee_id');
		$ticket_no = $this->input->post('ticket_no');

        $this->db->select("user_type");
        $this->db->where("id",$employee_id);
        $user_type=$this->db->get("tbl_admin_login")->row()->user_type;

        $this->db->select("name");
        $this->db->where("id",$employee_id);
        $employee_name=$this->db->get("tbl_admin_login")->row()->name;
	
        $data = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `ticket_no`='$ticket_no' AND `status`!='in_complete'")->result();

        if(!empty($data))
        {
            $created_date = date("d M y", strtotime($data[0]->created_date));

            $issue_id = $data[0]->query_id;
            
            // $data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$issue_id' AND `schedule_assign_to`='$employee_id' AND reschedule!='reschedule'")->result();
            if($user_type == 'E')
            {
                $data1 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$issue_id' AND `schedule_assign_to`='$employee_id'")->result();
                
                $customer_id = $data[0]->customer_id;
            
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
                        'ticket_no' => $data[0]->ticket_no,
                        'product_name' => $data[0]->product_name,
                        'product_id' => $data[0]->product_id,
                        'status' => ucfirst($data[0]->status),
                        'query_id' => $data[0]->query_id,
                        'org_id' => $org_id,
                        'issue' => $data[0]->issue,
                        'created_date' => $created_date,
                        'priority_name' => $data[0]->priority,
                        'assign_date' => $assign_date,
                        'assign_starttime' => $assign_starttime1,
                        'assign_endtime' => $assign_endtime1,
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
                        'remark' => $data[0]->issue
                 );
            }
            else
            {
                // $data1 = $this->db->query("SELECT * FROM `tbl_schedule` JOIN `tbl_user_query` ON tbl_schedule.issue_id = tbl_user_query.query_id WHERE tbl_schedule.issue_id ='$issue_id' AND  tbl_user_query.customer_id = $employee_id AND tbl_schedule.reschedule != 'reschedule'")->result();
                // $data1 = $this->db->query("SELECT * FROM `tbl_schedule` JOIN `tbl_user_query` ON tbl_schedule.issue_id = tbl_user_query.query_id WHERE tbl_schedule.issue_id ='$issue_id' AND  tbl_user_query.customer_id = $employee_id ")->result();
                $data1 = $this->db->query("SELECT * FROM `tbl_schedule` JOIN `tbl_user_query` ON tbl_schedule.issue_id = tbl_user_query.query_id WHERE tbl_schedule.issue_id ='$issue_id' ")->result();

                
                $customer_id = $data[0]->customer_id;
            
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
                        'ticket_no' => $data[0]->ticket_no,
                        'product_name' => $data[0]->product_name,
                        'product_id' => $data[0]->product_id,
                        'status' => ucfirst($data[0]->status),
                        'query_id' => $data[0]->query_id,
                        'org_id' => $org_id,
                        'issue' => $data[0]->issue,
                        'created_date' => $created_date,
                        'priority_name' => $data[0]->priority,
                        'assign_date' => $assign_date,
                        'assign_starttime' => $assign_starttime1,
                        'assign_endtime' => $assign_endtime1,
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
                        'remark' => $data[0]->issue
                );
                }

                
                
                $responce = array(
                    'status'=>200,
                    'msg' =>'Schedule List Fetch Successfully',
                    'data' => $arr
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