

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_New_model extends CI_Model 
{

	public function ContactsActivities($startdate,$enddate)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    // $start_date=date("Y-m-d");
	    // $end_date=date("Y-m-d");

		if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

         $query_res=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date' and `org_id` = '$org_id' GROUP BY customer_id ORDER BY created_date DESC ")->result(); 

	    // $query_res= $this->db->get('tbl_user_query')->result(); 
   
	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
            $this->db->where('issue_id',$issue_id);  
            $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
	        $Schedule=$this->db->get('tbl_schedule')->row();

	        if(!empty($Schedule->schedule_id))
	        {
	            $this->db->where('id',$Schedule->schedule_type_id);             
		        $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();

		        $this->db->select('company_name');
	            $this->db->where('customer_id',$row->customer_id);             
		        $company=$this->db->get('tbl_customer')->row();

		        $this->db->select('name');
	            $this->db->where('id',$Schedule->schedule_assign_to);             
		        $admin_login=$this->db->get('tbl_admin_login')->row();

		        $this->db->select('status');
	            $this->db->where('query_id',$issue_id);             
		        $user_query=$this->db->get('tbl_user_query')->row();

		        $ticket_no=$row->ticket_no;
	            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
	            if($target)
	            {
	            	$total_bill=$target->adm_approved_price;
	            }
	            else
	            {
	            	$total_bill="NA";
	            }

		        $this->db->select('query_id');
                $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
		        $activity=$this->db->get('tbl_user_query')->result();
		        $new_array=array(
									'customer_id'=>$row->customer_id, 
									'customer_id'=>$row->customer_id, 
									'schedule_id'=>$Schedule->schedule_id, 
									'company_name'=>$company->company_name,                           
									'employee'=>$admin_login->name, 

									'status'=>$user_query->status, 
									'total_bill'=>$total_bill, 
									'total_activity'=>count($activity), 

									'last_activity'=>$schedule_type_name->type_name, 
									'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
		                        );
		        array_push($final_array,$new_array);    
	        }              
	    }
	    return $final_array;
	    // print_r($final_array);
	}


	public function DateRangeContactsActivities($formdata)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;  
	    // $start_date=date("Y-m-d",strtotime($formdata['start_date']));
	    // $end_date=date("Y-m-d",strtotime($formdata['end_date']));

		$start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date=date("Y-m-d",strtotime($start_date1));
		$end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date=date("Y-m-d",strtotime($end_date1));

        $EmpArray=$formdata['EmpArray'];
        $ActivityArray=$formdata['ActivityArray'];
        $customer_type=$formdata['customer_type'];

         // $query_res=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date'  GROUP BY customer_id ORDER BY created_date DESC ")->result(); 

        $this->db->select(' MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no');
        $where_array3 = array('DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
        $this->db->where($where_array3);
		$this->db->where('org_id', $org_id);    
        $this->db->where_in("assign_to",$EmpArray);  
        $this->db->group_by("customer_id");    
        $this->db->order_by("created_date","DESC");  
        $query_res=$this->db->get('tbl_user_query')->result();
   
	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
            $this->db->where('issue_id',$issue_id);  
            $this->db->where_in("schedule_type_id",$ActivityArray);  
            $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
	        $Schedule=$this->db->get('tbl_schedule')->row();

	        if(!empty($Schedule->schedule_id))
	        {
	            $this->db->where('id',$Schedule->schedule_type_id);             
		        $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();

		        $this->db->select('company_name,cust_type');
	            $this->db->where('customer_id',$row->customer_id);             
		        $company=$this->db->get('tbl_customer')->row();

		        $this->db->select('name');
	            $this->db->where('id',$Schedule->schedule_assign_to);             
		        $admin_login=$this->db->get('tbl_admin_login')->row();

		        $this->db->select('status');
	            $this->db->where('query_id',$issue_id);             
		        $user_query=$this->db->get('tbl_user_query')->row();

		        $ticket_no=$row->ticket_no;
	            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
	            if($target)
	            {
	            	$total_bill=$target->adm_approved_price;
	            }
	            else
	            {
	            	$total_bill="NA";
	            }

		        $this->db->select('query_id');
                $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
                $this->db->where($where_array3);
		        $activity=$this->db->get('tbl_user_query')->result();


		        if($customer_type!='')
			        {
						if($customer_type == 'All')
						{
							$new_array=array(
								'customer_id'=>$row->customer_id, 
								'customer_id'=>$row->customer_id, 
								'schedule_id'=>$Schedule->schedule_id, 
								'company_name'=>$company->company_name,                           
								'employee'=>$admin_login->name, 

								'status'=>$user_query->status, 
								'total_bill'=>$total_bill, 
								'total_activity'=>count($activity), 

								'last_activity'=>$schedule_type_name->type_name, 
								'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
							);
			                array_push($final_array,$new_array);    
						}
						else
						{
							if($customer_type==$company->cust_type)
				        	{	
						        $new_array=array(
													'customer_id'=>$row->customer_id, 
													'customer_id'=>$row->customer_id, 
													'schedule_id'=>$Schedule->schedule_id, 
													'company_name'=>$company->company_name,                           
													'employee'=>$admin_login->name, 

													'status'=>$user_query->status, 
													'total_bill'=>$total_bill, 
													'total_activity'=>count($activity), 

													'last_activity'=>$schedule_type_name->type_name, 
													'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
						                        );
						        array_push($final_array,$new_array);
				        	}
						}
			        		
			        }
			        else
			        {
				        $new_array=array(
											'customer_id'=>$row->customer_id, 
											'customer_id'=>$row->customer_id, 
											'schedule_id'=>$Schedule->schedule_id, 
											'company_name'=>$company->company_name,                           
											'employee'=>$admin_login->name, 

											'status'=>$user_query->status, 
											'total_bill'=>$total_bill, 
											'total_activity'=>count($activity), 

											'last_activity'=>$schedule_type_name->type_name, 
											'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
				                        );
				        array_push($final_array,$new_array);      	
			        }
	        }            
	    }
	    return $final_array;
	}

	public function ContactsActivitiesDetails($formdata)
	{
	    $final_array=array();  
	    $customer_id=$formdata['customer_id'];
	    $where_array = array('customer_id'=>$customer_id);
	    $this->db->where($where_array);	    
	    $query_res=$this->db->get('tbl_customer')->result();
	    foreach ($query_res as  $row) 
	    {  


	         $new_array=array(
	                            'company_name'=>$row->company_name, 
	                            'address'=>$row->address, 
	                            'mobile'=>$row->phone_no, 
	                            'email'=>$row->email, 
	                            'contact_person_name1'=>$row->contact_person_name1, 
	                            'city'=>$row->city, 
	                        );
	        array_push($final_array,$new_array);                   
	    }
	    return $final_array;
	}

	public function FetchCustomerData($formdata)
	{	
		$customer_id=$formdata['customer_id'];
        $this->db->select('company_name');
        $this->db->where('customer_id',$customer_id);             
        return $this->db->get('tbl_customer')->row();
	}


	public function ViewTotalActivityDetails($formdata)
	{
	    $final_array=array();  
	    $customer_id=$formdata['customer_id'];
        $start_date1 = str_replace(',', ' ', $formdata['start_date']);
        $start_date=date("Y-m-d",strtotime($start_date1));
		$end_date1 = str_replace(',', ' ', $formdata['end_date']);
        $end_date=date("Y-m-d",strtotime($end_date1));
        $where_array3 = array('customer_id' => $customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
        $this->db->where($where_array3);
	    $query_res=$this->db->get('tbl_user_query')->result();
		// echo "<pre>";
		// print_r($start_date);
		
	    foreach ($query_res as  $row) 
	    {  
	        $this->db->select('name');
            $this->db->where('id',$row->assign_to);             
	        $admin_login=$this->db->get('tbl_admin_login')->row();

	         $new_array=array(
				'ticket_no'=>$row->ticket_no, 
				'product_name'=>$row->product_name, 
				'issue'=>$row->issue, 
				'status'=>$row->status, 
				'assign_to'=>$admin_login->name, 
				'priority'=>$row->priority, 
			);
	        array_push($final_array,$new_array);                   
	    }
	    return $final_array;
	}



//----------------------------------------------------------------

	public function ContactsWithNoActivities($startdate,$enddate)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    // $start_date=date("Y-m-d");
	    // $end_date=date("Y-m-d");

		if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

	     $query=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date' and `org_id` = '$org_id' GROUP BY customer_id ORDER BY created_date DESC ")->result(); 
         
	     foreach ($query as  $row) 
	     {
	     	$ids[]=$row->customer_id;
	     }

        $this->db->select(' MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no'); 
		$this->db->where("org_id",$org_id);
        $this->db->where_not_in("customer_id",$ids);  
        $this->db->group_by("customer_id");    
        $this->db->order_by("MAX(`query_id`)","ASC");  
        $query_res=$this->db->get('tbl_user_query')->result();

	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
	        $this->db->where('issue_id',$issue_id);  
	        $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
	        $Schedule=$this->db->get('tbl_schedule')->row();

	        if(!empty($Schedule->schedule_id))
	        {
	            $this->db->where('id',$Schedule->schedule_type_id);             
		        $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();

		        $this->db->select('company_name');
	            $this->db->where('customer_id',$row->customer_id);             
		        $company=$this->db->get('tbl_customer')->row();

		        $this->db->select('name');
	            $this->db->where('id',$Schedule->schedule_assign_to);             
		        $admin_login=$this->db->get('tbl_admin_login')->row();

		        $this->db->select('status');
	            $this->db->where('query_id',$issue_id);             
		        $user_query=$this->db->get('tbl_user_query')->row();

		        $ticket_no=$row->ticket_no;
	            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
	            if($target)
	            {
	            	$total_bill=$target->adm_approved_price;
	            }
	            else
	            {
	            	$total_bill="NA";
	            }

				$date1=date_create($Schedule->assign_date);
				$date2=date_create($start_date);
				$diff=date_diff($date1,$date2);
				$last_activity_before=$diff->format("%R%a");


		        $this->db->select('query_id');
	            $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
	            $this->db->where($where_array3);
		        $activity=$this->db->get('tbl_user_query')->result();
		        $new_array=array(
									'customer_id'=>$row->customer_id, 
									'customer_id'=>$row->customer_id, 
									'schedule_id'=>$Schedule->schedule_id, 
									'company_name'=>$company->company_name,                           
									'employee'=>$admin_login->name,
									'status'=>$user_query->status, 
									'total_bill'=>$total_bill, 
									'total_activity'=>count($activity), 
									'last_activity'=>$schedule_type_name->type_name, 
									'last_activity_before'=>$last_activity_before,
									'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
		                        );
		        array_push($final_array,$new_array);    
	        }              
	    }
	    return $final_array;
	}


	public function DateRangeContactsWithNoActivities($formdata)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;  
	    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
	    $end_date=date("Y-m-d",strtotime($formdata['end_date']));

	    $EmpArray=$formdata['EmpArray'];
	    $ActivityArray=$formdata['ActivityArray'];
	    $customer_type1=$formdata['customer_type'];
        
		if(empty($customer_type1))
		{
			$customer_type = "All";
		}
		else
		{
			$customer_type = $formdata['customer_type'];
		}
		
	     $query=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date' and `org_id` = '$org_id' GROUP BY customer_id ORDER BY created_date DESC ")->result(); 

	     foreach ($query as  $row) 
	     {
	     	$ids[]=$row->customer_id;
	     }

        $this->db->select(' MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no'); 
		$this->db->where("org_id", $org_id);
        $this->db->where_not_in("customer_id",$ids);  
		$this->db->where_in('assign_to',$EmpArray); 
        $this->db->group_by("customer_id"); 
		$this->db->order_by("MAX(`query_id`)","ASC");    
        // $this->db->order_by("created_date","DESC");  
        $query_res=$this->db->get('tbl_user_query')->result();
		
	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
            $this->db->where('issue_id',$issue_id);  
            $this->db->where_in("schedule_type_id",$ActivityArray);  
            $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id,ticket_no');          
	        $Schedule=$this->db->get('tbl_schedule')->row();
            
	        if(!empty($Schedule->schedule_id))
	        {
	            $this->db->where('id',$Schedule->schedule_type_id);             
		        $schedule_type_name=$this->db->get('tbl_schedule_type_name')->row();

		        $this->db->select('company_name,cust_type');
	            $this->db->where('customer_id',$row->customer_id);             
		        $company=$this->db->get('tbl_customer')->row();

		        $this->db->select('name');
	            $this->db->where('id',$Schedule->schedule_assign_to);             
		        $admin_login=$this->db->get('tbl_admin_login')->row();

		        $this->db->select('status');
	            $this->db->where('query_id',$issue_id);             
		        $user_query=$this->db->get('tbl_user_query')->row();

		        $ticket_no=$row->ticket_no;
	            $target = $this->db->query("SELECT adm_approved_price FROM `tbl_target_achieve` WHERE `token_id`='$ticket_no' ")->row();
	            if($target)
	            {
	            	$total_bill=$target->adm_approved_price;
	            }
	            else
	            {
	            	$total_bill="NA";
	            }

				$date1=date_create($Schedule->assign_date);
				$date2=date_create($start_date);
				$diff=date_diff($date1,$date2);
				$last_activity_before=$diff->format("%R%a");


		        $this->db->select('query_id');
	            $where_array3 = array('customer_id' => $row->customer_id, 'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date,);
	            $this->db->where($where_array3);
		        $activity=$this->db->get('tbl_user_query')->result();

			        if($customer_type!='All')
					{
						if($customer_type==$company->cust_type)
						{
								$new_array=array(
											'customer_id'=>$row->customer_id, 
											'customer_id'=>$row->customer_id, 
											'schedule_id'=>$Schedule->schedule_id, 
											'company_name'=>$company->company_name,                           
											'employee'=>$admin_login->name,
											'status'=>$user_query->status, 
											'total_bill'=>$total_bill, 
											'total_activity'=>count($activity), 
											'last_activity'=>$schedule_type_name->type_name, 
											'last_activity_before'=>$last_activity_before,
											// 'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
										);	
											
								array_push($final_array,$new_array); 
						}
					}
					else
					{
						$new_array=array(
											'customer_id'=>$row->customer_id, 
											'customer_id'=>$row->customer_id, 
											'schedule_id'=>$Schedule->schedule_id, 
											'company_name'=>$company->company_name,                           
											'employee'=>$admin_login->name,
											'status'=>$user_query->status, 
											'total_bill'=>$total_bill, 
											'total_activity'=>count($activity), 
											'last_activity'=>$schedule_type_name->type_name, 
											'last_activity_before'=>$last_activity_before,
											// 'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
										);
													
							array_push($final_array,$new_array);       	
					}
			          
            }
			
	    } 
		// echo "<pre>";
		// print_r($final_array);
		// die; 
	    return $final_array;
	}


//--------------------------------------------------------------

	public function TypeArray()
	{
		 $org_id=$this->session->org_id;    
	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1);   
	    return $this->db->get('tbl_type')->result();  
	}

    public function TypewiseContactDashboard($startdate, $enddate)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    // $start_date=date("2018-m-01");
	    // $end_date=date("Y-m-d");

		if(!empty($startdate))
		{
			$start_date = $startdate;
		}
		else
		{
			$start_date = date('Y-m-d');
		}

		if(!empty($enddate))
		{
			$end_date = $enddate;
		}
		else
		{
			$end_date = date('Y-m-d');
		}

	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1);
		$this->db->order_by('type_id','asc');   
	    $query_res= $this->db->get('tbl_type')->result();  
	    
	    foreach ($query_res as  $result) 
	    {              
	        $type_id=$result->type_id;
	        $where_array = array('type_id'=>$type_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
	        $this->db->where($where_array);             
	        $result_count=$this->db->get('tbl_customer')->result();
	        $new_array=array(
	                           'type_id'=>$result->type_id, 
	                           'title'=>$result->title, 
	                           'total'=>count($result_count),
	                        );
	        array_push($final_array,$new_array);                   
	    }
	    return $final_array;
	}

	public function TypewiseContact()
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    $start_date=date("2018-m-01");
	    $end_date=date("Y-m-d");

	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1); 
		$this->db->order_by('type_id','asc');     
	    $query_res= $this->db->get('tbl_type')->result();  
	    
	    foreach ($query_res as  $result) 
	    {              
	        $type_id=$result->type_id;
	        $where_array = array('type_id'=>$type_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
	        $this->db->where($where_array);             
	        $result_count=$this->db->get('tbl_customer')->result();
	        $new_array=array(
	                           'type_id'=>$result->type_id, 
	                           'title'=>$result->title, 
	                           'total'=>count($result_count),
	                        );
	        array_push($final_array,$new_array);                   
	    }
		
	    return $final_array;
	}



	public function DateRangeTypewiseContact($formdata)
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;  
	    $TypeArray=$formdata['TypeArray'];
	    $cust_type=$formdata['cust_type'];

	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1);   
	    $this->db->where_in("type_id",$TypeArray);
	    $query_res= $this->db->get('tbl_type')->result();  
	    
	    foreach ($query_res as  $result) 
	    {              
	        $type_id=$result->type_id;
	        $where_array = array('type_id'=>$type_id);
	        $this->db->where($where_array); 
	        if($cust_type!='All')
	        {
	          $this->db->where("cust_type",$cust_type); 
	        }
	        $result_count=$this->db->get('tbl_customer')->result();
	        $new_array=array(
	                           'type_id'=>$result->type_id, 
	                           'title'=>$result->title, 
	                           'total'=>count($result_count),
	                           'name'=>$result->title, 
	                           'y'=>count($result_count),

	                        );
	        array_push($final_array,$new_array);                   
	    }
	    return $final_array;
	}



	public function FetchTypeData($formdata)
	{
	    $this->db->select("title");
	    $this->db->where("type_id",$formdata['type_id']); 
	    return $this->db->get("tbl_type")->row();
	}

	public function TypewiseContactDetails($formdata)
	{
	    $final_array=array();  
	    $type_id=$formdata['type_id'];

	    $where_array = array('type_id'=>$type_id);
	    $this->db->where($where_array);	    
	    $query_res=$this->db->get('tbl_customer')->result();

	    foreach ($query_res as  $row) 
	    {  
	         $new_array=array(
	                            'company_name'=>$row->company_name, 
	                            'address'=>$row->address, 
	                            'mobile'=>$row->phone_no, 
	                            'email'=>$row->email, 
	                            'contact_person_name1'=>$row->contact_person_name1, 
	                            'city'=>$row->city, 
	                        );
	        array_push($final_array,$new_array);                   
	    }
	    return $final_array;
	}



//-------------------------------------------------------------------

}