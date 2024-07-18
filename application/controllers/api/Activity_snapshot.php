<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Activity_snapshot extends REST_Controller 
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
        $imei = $this->input->post('imei');
        $org_id = $this->input->post('org_id');

        if ($user_type == 'C') 
        {
			$this->db->set('imei', $imei);
			$this->db->where('customer_id', $user_id);
			$this->db->update('tbl_customer');
			$data = $this->db->query("SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='pending'")->row();
			$pending_count = $data->pending_count;
			$data1 = $this->db->query("SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='in_progress'")->row();
			$inprogress_count = $data1->inprogress_count;
			$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `customer_id`=$user_id AND status='completed'")->row();
			$completed = $data2->completed;
			$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `customer_id`=$user_id")->row();
			$all = $data3->all_data;
			$data4 = $this->db->query("SELECT  count(`query_id`) as incomplete FROM `tbl_user_query` WHERE status='in_complete' and customer_id=$user_id")->row();
			$incomplete = $data4->incomplete;
			$arr = array(
				'pending_count' => $pending_count,
				'in_progress' => $inprogress_count,
				'completed' => $completed,
				'all' => $all,
				'incomplete' => $incomplete
			);

		} 
        else if($user_type == 'E')
        {
			$this->db->set('imei', $imei);
			$this->db->where('customer_id', $user_id);
			$this->db->update('tbl_customer');

			$data = $this->db->query("  SELECT  count(`query_id`) as pending_count FROM `tbl_user_query` WHERE status='pending' and org_id=$org_id and `assign_to` = $user_id ")->row();
			$pending_count = $data->pending_count;
			 
			$data1 = $this->db->query(" SELECT  count(`query_id`) as inprogress_count FROM `tbl_user_query` WHERE status='in_progress' and org_id= $org_id and `assign_to` = $user_id ")->row();
			$inprogress_count = $data1->inprogress_count;

			$data2 = $this->db->query(" SELECT  count(`query_id`) as completed FROM `tbl_user_query` WHERE status='completed' and org_id= $org_id and `assign_to` = $user_id ")->row();
			$completed = $data2->completed;

			// $data3 = $this->db->query(" SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `assign_to` = $user_id and status NOT IN('in_complete')")->row();
			// $data3 = $this->db->query(" SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `assign_to` = $user_id ")->row();
			
			$data3 = $this->db->query("SELECT  count(`query_id`) as all_data FROM `tbl_user_query` where status = 'completed' and org_id=$org_id and `assign_to` = $user_id or `status` = 'in_complete' and `org_id`=$org_id and `assign_to` = $user_id or `status` = 'pending'and `org_id`=$org_id and `assign_to` = $user_id or `status` = 'in_progress' and `org_id`=$org_id and `assign_to` = $user_id ")->row();
			$all = $data3->all_data;

			$data4 = $this->db->query("SELECT  count(`query_id`) as incomplete FROM `tbl_user_query` WHERE status='in_complete' and org_id=$org_id and `assign_to`=$user_id")->row();
			$incomplete = $data4->incomplete;


			// $res = $this->db->query(" SELECT assign_to FROM `tbl_user_query` WHERE assign_to IN($user_id)  ")->row();
			// $result = $res->assign_to;

			// if (strpos($result, ',') !== false) 
            // {
			// 	$data = $this->db->query(" SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='pending'  ")->row();
			// 	$pending_count = $data->pending_count;
			// 	$data1 = $this->db->query(" SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='in_progress' ")->row();
			// 	$inprogress_count = $data1->inprogress_count;
			// 	$data2 = $this->db->query("SELECT count(query_id) as completed FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to) AND status='completed' ")->row();
			// 	$completed = $data2->completed;

			// 	$data3 = $this->db->query("SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE FIND_IN_SET($user_id,assign_to)  and status NOT IN('in_complete') ")->row();
			// 	$all = $data3->all_data;
			// } 
            // else 
            // {

			// 	$data = $this->db->query("  SELECT count(query_id) as pending_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='pending'  ")->row();
			// 	$pending_count = $data->pending_count;
			// 	$data1 = $this->db->query(" SELECT count(query_id) as inprogress_count FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='in_progress'  ")->row();
			// 	$inprogress_count = $data1->inprogress_count;
			// 	$data2 = $this->db->query(" SELECT count(query_id) as completed FROM `tbl_user_query` WHERE `assign_to` IN($user_id) AND status='completed' ")->row();
			// 	$completed = $data2->completed;

			// 	$data3 = $this->db->query(" SELECT count(query_id) as all_data FROM `tbl_user_query` WHERE `assign_to` IN($user_id) and status NOT IN('in_complete')  ")->row();
			// 	$all = $data3->all_data;
			// }

			$arr = array(
				'pending_count' => $pending_count,
				'in_progress' => $inprogress_count,
				'completed' => $completed,
				'all' => $all,
				'incomplete' => $incomplete
			);
		}
        else
        {
            $arr = array(
				'pending_count' => '',
				'in_progress' => '',
				'completed' => '',
				'all' => '',
				'incomplete' => ''
			); 
        }

        if(!empty($arr))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Activity Snapshot Fetched Successfully',
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