<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Activity_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $date = $this->input->post('date');
  		$assign_date=date("Y-m-d",strtotime($date));
  		$org_id=$this->input->post('org_id');
  		$schedule_assign_to = $this->input->post('employee_id');
  		$this->db->where("status",1);
  		$this->db->where('delete_status',0);
  		$this->db->order_by("type_name",'asc');
  		$this->db->where("org_id",$org_id);	
  		$query=$this->db->get("tbl_schedule_type_name")->result();

  		$FinalArray=array();
	    foreach ($query as $res) 
	    {
	       // $assign_date=date("Y-m-d");
	   	   $schedule_type_id=$res->id;
	   	   $this->db->select("tbl_schedule.issue_id,tbl_schedule.schedule_assign_to,tbl_schedule.schedule_type_id");
		   $this->db->from('tbl_schedule');
		   $this->db->join('tbl_user_query','tbl_schedule.issue_id= tbl_user_query.query_id');
		   $this->db->where("tbl_schedule.schedule_assign_to",$schedule_assign_to);
		   $this->db->where("tbl_schedule.schedule_type_id",$schedule_type_id);	
		   $this->db->where("tbl_schedule.assign_date",$assign_date);
		   $this->db->where("tbl_user_query.delete_status !=",1);
		   $this->db->where("tbl_user_query.status !=",'in_complete');
		   $this->db->where_not_in("tbl_schedule.reschedule",'reschedule');
		   $this->db->group_by('tbl_schedule.issue_id,tbl_schedule.schedule_assign_to,tbl_schedule.schedule_type_id'); 
	   	//    $type=$this->db->get("tbl_schedule")->result();
		   $type=$this->db->get()->result();

		   $newArray=array('name'=>$res->type_name,'count'=>count($type));
	   	   array_push($FinalArray, $newArray);
	    }

        if(!empty($FinalArray))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Today Schedule List Fetched Successfully',
                'data' => $FinalArray
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