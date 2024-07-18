<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Notification_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $user_type = $this->input->post('user_type');
        $user_id = $this->input->post('user_id');
        if ($user_type == 'C') 
        {
			$data = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`=$user_id GROUP BY query_id ORDER BY notification_date DESC")->result();
		
			$notofication_list = array();
			foreach ($data as $value) 
            {
				$this->db->where("query_id", $value->query_id);
				$ScheduleData = $this->db->get("tbl_user_query")->row();
			
				$this->db->where("issue_id", $value->query_id);
				$QueryData = $this->db->get("tbl_schedule")->row();
				
				if(!empty($QueryData))
				{
					$created_by_id = $QueryData->created_by;
					$this->db->select("name");
					$this->db->where("id", $created_by_id);
					$EmpData = $this->db->get("tbl_admin_login")->row();
					if(!empty($EmpData))
					{
						$EmpDataName = $EmpData->name;
					}
					else
					{
						$EmpDataName = '';
					}
				}
				else
				{
					$EmpDataName = '';
				}
				

				if(!empty($ScheduleData))
				{
					$customer_id = $ScheduleData->customer_id;
					$remark = $ScheduleData->issue;
					$this->db->where("issue_id", $ScheduleData->query_id);
					$QueryData = $this->db->get("tbl_schedule")->row();
					
					if(!empty($QueryData))
					{
						$created_by_id = $QueryData->created_by;
						$this->db->select("name");
						$this->db->where("id", $created_by_id);
						$EmpData = $this->db->get("tbl_admin_login")->row();
						if(!empty($EmpData))
						{
							$EmpDataName = $EmpData->name;
						}
						else
						{
							$EmpDataName = '';
						}


						$assign_starttime = $QueryData->assign_starttime;
					
						if(!empty($assign_starttime))
						{
							$assign_starttime1 = date("h:i A", strtotime($assign_starttime));
						}
						else
						{
							$assign_starttime1 = '';
						}

						$assign_endtime = $QueryData->assign_endtime;
						if(!empty($assign_endtime))
						{
							$assign_endtime1 = date("h:i A", strtotime($assign_endtime));
						}
						else
						{
							$assign_endtime1 = '';
						}

						
					}
					else
					{
						$EmpDataName = '';
					}
					
					$this->db->select("company_name");
					$this->db->where("customer_id", $ScheduleData->customer_id);
					$CustData = $this->db->get("tbl_customer")->row();
					if(!empty($CustData))
					{
						$company_name = $CustData->company_name;
					}
					else
					{
						$company_name = '';
					}
					$ticket_no = $ScheduleData->ticket_no;
					$product_name = $ScheduleData->product_name;
					$priority = $ScheduleData->priority;
					$issue = $ScheduleData->issue;
				}

				else
				{
					$ticket_no = '';
					$product_name = '';
					$priority = '';
					$issue = '';
					$company_name = '';
				}
				$notification_date = date("d M Y", strtotime($value->notification_date));

				$arr = array(
					'notification_id' => $value->notification_id,
					'notification_title' => $value->notification_title,
					'notification_msg' => $value->notification_msg,
					'notification_to' => $value->notification_to,
					'query_id' => $value->query_id,
					'status' => $value->status,
					'ticket_no' => $ticket_no,
					'company_name' => $company_name,
					'product_name' => $product_name,
					'assigned_by' => $EmpDataName,
					'priority' => $priority,
					'details' => $issue,
					'notification_date' => $notification_date,
					// 'assign_starttime' => $assign_starttime1,
					// 'assign_endtime' => $assign_endtime1,
					// 'employee_name' => $employee_name,
					// 'customer_id' => $customer_id,
					// 'remark' => $remark
				);
				array_push($notofication_list, $arr);
			}
		} 
        else if($user_type == 'E') 
        {
			$this->db->select("name");
			$this->db->where("id",$user_id);
			$employee_name=$this->db->get("tbl_admin_login")->row()->name;
			

			// $data1 = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `notification_to`='$user_id' ORDER BY notification_date DESC");
			$data1 = $this->db->query("SELECT * FROM `tbl_push_notification` WHERE `user_id`='$user_id' GROUP BY query_id ORDER BY notification_date DESC");

			if(!empty($data1))
			{
				$notofication_list = array();
				foreach($data1->result() as $value)
				{
					$this->db->where("query_id", $value->query_id);
					$this->db->where("delete_status != ",1);
					$ScheduleData = $this->db->get("tbl_user_query")->row();
					
					if(!empty($ScheduleData))
					{
						$remark = $ScheduleData->issue;
						$this->db->where("issue_id", $ScheduleData->query_id);
						$QueryData = $this->db->get("tbl_schedule")->row();
						
						if(!empty($QueryData))
						{
							$created_by_id = $QueryData->created_by;
							$this->db->select("name");
							$this->db->where("id", $created_by_id);
							$EmpData = $this->db->get("tbl_admin_login")->row();
							if(!empty($EmpData))
							{
								$EmpDataName = $EmpData->name;
							}
							else
							{
								$EmpDataName = '';
							}


							$assign_starttime = $QueryData->assign_starttime;
						
							if(!empty($assign_starttime))
							{
								$assign_starttime1 = date("h:i A", strtotime($assign_starttime));
							}
							else
							{
								$assign_starttime1 = '';
							}

							$assign_endtime = $QueryData->assign_endtime;
							if(!empty($assign_endtime))
							{
								$assign_endtime1 = date("h:i A", strtotime($assign_endtime));
							}
							else
							{
								$assign_endtime1 = '';
							}

							
						}
						else
						{
							$EmpDataName = '';
						}
						
						$this->db->select("company_name");
						$this->db->where("customer_id", $ScheduleData->customer_id);
						$CustData = $this->db->get("tbl_customer")->row();
						if(!empty($CustData))
						{
							$company_name = $CustData->company_name;
						}
						else
						{
							$company_name = '';
						}

                        

						$ticket_no = $ScheduleData->ticket_no;
						$product_name = $ScheduleData->product_name;
						$priority = $ScheduleData->priority;
						$issue = $ScheduleData->issue;
						$customer_id = $ScheduleData->customer_id;

						
	
						$notification_date = date("d M Y", strtotime($value->notification_date));
						$arr = array(
							'notification_id' => $value->notification_id,
							'notification_title' => $value->notification_title,
							'notification_msg' => $value->notification_msg,
							'notification_to' => $value->notification_to,
							'query_id' => $value->query_id,
							'status' => $value->status,
							'ticket_no' => $ticket_no,
							'company_name' => $company_name,
							'product_name' => $product_name,
							'assigned_by' => $EmpDataName,
							'priority' => $priority,
							'details' => $issue,
							'notification_date' => $notification_date,
							'assign_starttime' => $assign_starttime1,
							'assign_endtime' => $assign_endtime1,
							'employee_name' => $employee_name,
							'customer_id' => $customer_id,
							'remark' => $remark,
							'flag' => $value->flag
						);
						array_push($notofication_list, $arr);
					}
				}
			}
			// if ($data1) 
            // {
			// 	$notofication_list = array();
			// 	foreach ($data1->result() as $value) 
            //     {

			// 		$this->db->where("query_id", $value->query_id);
			// 		$ScheduleData = $this->db->get("tbl_user_query")->row();

			// 		$this->db->where("issue_id", $value->query_id);
			// 		$QueryData = $this->db->get("tbl_schedule")->row();
					
			// 		if(!empty($QueryData))
			// 		{
			// 			$created_by_id = $QueryData->created_by;
			// 			$this->db->select("name");
			// 			$this->db->where("id", $created_by_id);
			// 			$EmpData = $this->db->get("tbl_admin_login")->row();
			// 			if(!empty($EmpData))
			// 			{
			// 				$EmpDataName = $EmpData->name;
			// 			}
			// 			else
			// 			{
			// 				$EmpDataName = '';
			// 			}
			// 		}
			// 		else
			// 		{
			// 			$EmpDataName = '';
			// 		}
					

			// 		if(!empty($ScheduleData))
			// 		{
			// 			$this->db->select("company_name");
			// 		    $this->db->where("customer_id", $ScheduleData->customer_id);
			// 		    $CustData = $this->db->get("tbl_customer")->row();
			// 			if(!empty($CustData))
			// 			{
			// 				$company_name = $CustData->company_name;
			// 			}
			// 			else
			// 			{
			// 				$company_name = '';
			// 			}
			// 			$ticket_no = $ScheduleData->ticket_no;
			// 			$product_name = $ScheduleData->product_name;
			// 			$priority = $ScheduleData->priority;
			// 			$issue = $ScheduleData->issue;
			// 		}

			// 		else
			// 		{
			// 			$ticket_no = '';
			// 			$product_name = '';
			// 			$priority = '';
			// 			$issue = '';
			// 			$company_name = '';
			// 		}
                    
			// 		$notification_date = date("d M Y", strtotime($value->notification_date));
			// 		$arr = array(
			// 			'notification_id' => $value->notification_id,
			// 			'notification_title' => $value->notification_title,
			// 			'notification_msg' => $value->notification_msg,
			// 			'notification_to' => $value->notification_to,
			// 			'query_id' => $value->query_id,
			// 			'status' => $value->status,
			// 			'ticket_no' => $ticket_no,
			// 			'company_name' => $company_name,
			// 			'product' => $product_name,
			// 			'assigned_by' => $EmpDataName,
			// 			'priority' => $priority,
			// 			'details' => $issue,

			// 			'notification_date' => $notification_date
			// 		);
			// 		array_push($notofication_list, $arr);
			// 	}
			// }
		}
        else 
        {
			$notofication_list = array(
				'notification_id' => '',
                'notification_title' => '',
                'notification_msg' => '',
                'notification_to' => '',
                'query_id' => '',
                'status' => '',
                'ticket_no' => '',
                'company_name' => '',
                'product_name' => '',
                'assigned_by' => '',
                'priority' => '',
                'details' => '',
                'notification_date' => '',
				'remark' => '',
				'assign_starttime' => '',
				'assign_endtime' => '',
				'employee_name' => '',
				'customer_id' => '',
				'remark' => '',
				'flag' => ''
            );
		}


        if(!empty($notofication_list))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Notification Fetched Successfully',
                'data' => $notofication_list
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