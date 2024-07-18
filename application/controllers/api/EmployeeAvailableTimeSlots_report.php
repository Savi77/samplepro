<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class EmployeeAvailableTimeSlots_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        // $end_date=date("Y-m-d",strtotime($_REQUEST['end_date']));
        $start_time=date("H:i:s",strtotime($this->input->post('start_time')));
        $end_time=date("H:i:s",strtotime($this->input->post('end_time')));
        $emp_id=$this->input->post('emp_id');

        if($emp_id!='')
        {
           $explode=explode(",", $emp_id); 
           $this->db->where_in("id",$explode);
        }

        $this->db->select("id,name,email,mobile_no");
        $this->db->where("user_status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->where("user_type",'E');
        $query_res=$this->db->get("tbl_admin_login")->result();

        foreach ($query_res as  $result) 
        {                          
            $schedule_assign_to=$result->id;
            $where_array = array('schedule_assign_to'=>$schedule_assign_to,'assign_date' => $start_date,'assign_starttime>=' => $start_time,'assign_endtime<=' => $end_time);
            $this->db->where($where_array);   
            $schedule_query=$this->db->get("tbl_schedule")->result();

            if(count($schedule_query)<=0)
            {
                $new_array=array(
                                    'name'=>$result->name, 
                                    'emp_id'=>$result->id, 
                                    'email'=>$result->email, 
                                    'mobile_no'=>$result->mobile_no, 
                                );
                array_push($final_array,$new_array); 
            }                  
        }
        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Employee Available Time Slots Data Fetched Successfully',
                'data' => $final_array
                );
        }
        else
        {
            $responce = array(
                'status'=>500,
                'msg' =>'No Data Found',
                'data' => ''
                );
        }
        $this->response($responce, REST_Controller::HTTP_OK);
    }
}