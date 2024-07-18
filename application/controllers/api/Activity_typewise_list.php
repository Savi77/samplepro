<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Activity_typewise_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        
        $date = $this->input->post('date');
  		$assign_date=date("Y-m-d",strtotime($date));
  		$org_id=$this->input->post('org_id');
  		$schedule_assign_to = $this->input->post('employee_id');
        $schedule_type_name = $this->input->post('type_name');

        $final_array = array();

        if($schedule_type_name == 'viewAll')
        {
            $this->db->select("id");
            $this->db->where("status",1);
            $this->db->where('delete_status',0);
            $this->db->where("org_id",$org_id);
            // $this->db->where("type_name",$schedule_type_name);	
            $query=$this->db->get("tbl_schedule_type_name")->result();
            
            foreach($query as $qid)
            {
                $schedule_type_id[] = $qid->id;
            }
            // $schedule_type_id[] = $query->id;
            
            $this->db->select("*");
            $this->db->where("schedule_assign_to",$schedule_assign_to);
            $this->db->where_in("schedule_type_id",$schedule_type_id);	
            $this->db->where("assign_date",$assign_date);
            $this->db->where("org_id",$org_id);
            $this->db->where_not_in("reschedule",'reschedule');
            $result=$this->db->get("tbl_schedule")->result();
            
            $this->db->select("name");
            $this->db->where("id",$schedule_assign_to);
            $employee_name=$this->db->get("tbl_admin_login")->row()->name;
    
            for($i=0;$i<count($result);$i++)
            {
                $query_id = $result[$i]->issue_id;
                if(!empty($query_id))
                {
                    $data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id' AND `status`!='in_complete' AND `delete_status` != 1")->result();
                    if(!empty($data1))
                    {
                    
                        $customer_id = $data1[0]->customer_id;
                        $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                        $company_name = $data2->company_name;
                        $contact_person_name1 = $data2->contact_person_name1;
                        $email = $data2->email;
                        $phone_no = $data2->phone_no;
                        $city = $data2->city;
                        $status = $data1[0]->status;
                        $product_name = $data1[0]->product_name;
    
                        $assign_date1 = $result[$i]->assign_date;
                        if(!empty($assign_date1))
                        {
                            $assign_date = date("d M y", strtotime($assign_date1));
                        }
                        else
                        {
                            $assign_date = '';
                        }
    
                        $assign_starttime = $result[$i]->assign_starttime;
                        if(!empty($assign_starttime))
                        {
                            $assign_starttime1 = date("h:i A", strtotime($assign_starttime));
                        }
                        else
                        {
                            $assign_starttime1 = '';
                        }
    
                        $assign_endtime = $result[$i]->assign_endtime;
                        if(!empty($assign_endtime))
                        {
                            $assign_endtime1 = date("h:i A", strtotime($assign_endtime));
                        }
                        else
                        {
                            $assign_endtime1 = '';
                        }
                        
                        $schedule_name = $result[$i]->schedule_type_id;
                        if(!empty($schedule_name))
                        {
                            $schedule_name1 = $this->db->select('type_name')->from('tbl_schedule_type_name')->where('id',$schedule_name)->get()->row()->type_name;
                        }
                        else
                        {
                            $schedule_name1 = '';
                        }
                        
    
                        $result_array = array(
                            'ticket_no' => substr($result[$i]->ticket_no, 2),
                            'org_id' => $org_id,
                            'issue_id' => $result[0]->issue_id,
                            'assign_date' => $assign_date,
                            'assign_starttime' => $assign_starttime1,
                            'assign_endtime' => $assign_endtime1,
                            'schedule_id' => $result[0]->schedule_id,
                            'schedule_type' => $result[0]->schedule_type,
                            'schedule_visit_type' => $schedule_name1,
                            'customer_id' => $customer_id,
                            'company_name' => $company_name,
                            'contact_person_name1' => $contact_person_name1,
                            'email' => $email,
                            'phone_no' => $phone_no,
                            'city' => $city,
                            'created_by' => $result[0]->created_by,
                            'schedule_assign_to' => $result[0]->schedule_assign_to,
                            'schedule_type_id' => $result[0]->schedule_type_id,
                            'status' => ucfirst($status),
                            'reschedule' => $result[0]->reschedule, 
                            'created_date' => $result[0]->created_date,
                            'type' => $result[0]->type ,
                            'leadopp_id' => $result[0]->leadopp_id,
                            'starttime' => $assign_starttime1,
                            'endtime' => $assign_endtime1,
                            'employee_name' => $employee_name,
                            'product_name' => $product_name,
                            'query_id' => $query_id,
                            'remark' =>$data1[0]->issue
                        );
                        array_push($final_array, $result_array);
                    }
                    else
                    {
                        $customer_id = '';
                        $company_name = '';
                        $contact_person_name1 = '';
                        $email = '';
                        $phone_no = '';
                        $city = '';
                        $status = '';
                    }
                   
                }
                else
                {
                    $customer_id = '';
                    $company_name = '';
                    $contact_person_name1 = '';
                    $email = '';
                    $phone_no = '';
                    $city = '';
                    $status = '';
                }
            }
        }
        else
        {
            $this->db->select("id");
            $this->db->where("status",1);
            $this->db->where('delete_status',0);
            $this->db->where("org_id",$org_id);
            $this->db->where("type_name",$schedule_type_name);	
            $query=$this->db->get("tbl_schedule_type_name")->row();
    
            $schedule_type_id = $query->id;
    
            $this->db->select("*");
            $this->db->where("schedule_assign_to",$schedule_assign_to);
            $this->db->where("schedule_type_id",$schedule_type_id);	
            $this->db->where("assign_date",$assign_date);
            $this->db->where("org_id",$org_id);
            $this->db->where_not_in("reschedule",'reschedule');
            $result=$this->db->get("tbl_schedule")->result();
    
            $this->db->select("name");
            $this->db->where("id",$schedule_assign_to);
            $employee_name=$this->db->get("tbl_admin_login")->row()->name;
    
            for($i=0;$i<count($result);$i++)
            {
                $query_id = $result[$i]->issue_id;
                if(!empty($query_id))
                {
                    $data1 = $this->db->query("SELECT * FROM `tbl_user_query` WHERE `query_id`='$query_id' AND `status`!='in_complete' AND `delete_status` != 1")->result();
                    if(!empty($data1))
                    {

                        $customer_id = $data1[0]->customer_id;
                        $data2 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                        $company_name = $data2->company_name;
                        $contact_person_name1 = $data2->contact_person_name1;
                        $email = $data2->email;
                        $phone_no = $data2->phone_no;
                        $city = $data2->city;
                        $status = $data1[0]->status;
                        $product_name = $data1[0]->product_name;
    
                        $assign_date1 = $result[$i]->assign_date;
                        if(!empty($assign_date1))
                        {
                            $assign_date = date("d M y", strtotime($assign_date1));
                        }
                        else
                        {
                            $assign_date = '';
                        }
    
                        $assign_starttime = $result[$i]->assign_starttime;
                        if(!empty($assign_starttime))
                        {
                            $assign_starttime1 = date("h:i A", strtotime($assign_starttime));
                        }
                        else
                        {
                            $assign_starttime1 = '';
                        }
    
                        $assign_endtime = $result[$i]->assign_endtime;
                        if(!empty($assign_endtime))
                        {
                            $assign_endtime1 = date("h:i A", strtotime($assign_endtime));
                        }
                        else
                        {
                            $assign_endtime1 = '';
                        }

                        
                        $result_array = array(
                            'ticket_no' => substr($result[$i]->ticket_no, 2),
                            'org_id' => $org_id,
                            'issue_id' => $result[0]->issue_id,
                            'assign_date' => $assign_date,
                            'assign_starttime' => $assign_starttime1,
                            'assign_endtime' => $assign_endtime1,
                            'schedule_id' => $result[0]->schedule_id,
                            'schedule_type' => $result[0]->schedule_type,
                            'schedule_visit_type' => $schedule_type_name,
                            'customer_id' => $customer_id,
                            'company_name' => $company_name,
                            'contact_person_name1' => $contact_person_name1,
                            'email' => $email,
                            'phone_no' => $phone_no,
                            'city' => $city,
                            'created_by' => $result[0]->created_by,
                            'schedule_assign_to' => $result[0]->schedule_assign_to,
                            'schedule_type_id' => $result[0]->schedule_type_id,
                            'status' => ucfirst($status),
                            'reschedule' => $result[0]->reschedule, 
                            'created_date' => $result[0]->created_date,
                            'type' => $result[0]->type ,
                            'leadopp_id' => $result[0]->leadopp_id,
                            'starttime' => $assign_starttime1,
                            'endtime' => $assign_endtime1,
                            'employee_name' => $employee_name,
                            'product_name' => $product_name,
                            'query_id' => $query_id,
                            'remark' =>$data1[0]->issue
                        );
                        array_push($final_array, $result_array);
                    }
                    else
                    {
                        $customer_id = '';
                        $company_name = '';
                        $contact_person_name1 = '';
                        $email = '';
                        $phone_no = '';
                        $city = '';
                        $status = '';
                    }
                   
                }
                else
                {
                    $customer_id = '';
                    $company_name = '';
                    $contact_person_name1 = '';
                    $email = '';
                    $phone_no = '';
                    $city = '';
                    $status = '';
                }
            }
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Activity Typewise List Fetched Successfully',
                'data' => $final_array
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