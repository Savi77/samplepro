

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_New_model extends CI_Model 
{

	public function ContactsActivities()
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    $start_date=date("Y-m-01");
	    $end_date=date("Y-m-d");

         $query_res=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date'  GROUP BY customer_id ORDER BY created_date DESC ")->result(); 

	    // $query_res= $this->db->get('tbl_user_query')->result(); 
   
	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
            $this->db->where('issue_id',$issue_id);  
            $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id');          
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

		        $new_array=array(
									'customer_id'=>$row->customer_id, 
									'customer_id'=>$row->customer_id, 
									'schedule_id'=>$Schedule->schedule_id, 
									'company_name'=>$company->company_name,                           
									'employee'=>$admin_login->name, 
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
	    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
	    $end_date=date("Y-m-d",strtotime($formdata['end_date']));

         $query_res=$this->db->query("SELECT MAX(`query_id`) AS query_id, `customer_id`, MAX(ticket_no) AS ticket_no FROM tbl_user_query where DATE(`created_date`)>='$start_date' and DATE(`created_date`)<='$end_date'  GROUP BY customer_id ORDER BY created_date DESC ")->result(); 

   
	    foreach ($query_res as  $row) 
	    {  
	        $issue_id=$row->query_id;
            $this->db->where('issue_id',$issue_id);  
            $this->db->select('schedule_assign_to,assign_date,schedule_type_id,schedule_id');          
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

		        $new_array=array(
									'customer_id'=>$row->customer_id, 
									'issue_id'=>$row->issue_id, 
									'schedule_id'=>$Schedule->schedule_id, 
									'company_name'=>$company->company_name,                           
									'employee'=>$admin_login->name, 
									'last_activity'=>$schedule_type_name->type_name, 
									'last_activity_date'=>date("d M, Y",strtotime($Schedule->assign_date)), 
		                        );
		        array_push($final_array,$new_array);    
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
	
//--------------------------------------------------------------

	public function TypewiseContact()
	{
	    $final_array=array();
	    $org_id=$this->session->org_id;    
	    $start_date=date("2018-m-01");
	    $end_date=date("Y-m-d");

	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1);   
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
	    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
	    $end_date=date("Y-m-d",strtotime($formdata['end_date']));

	    $this->db->where('org_id',$org_id);
	    $this->db->where('delete_status',0);  
	    $this->db->where('status',1);   
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

	public function FetchTypeData($formdata)
	{
	    $this->db->select("title");
	    $this->db->where("type_id",$formdata['type_id']); 
	    return $this->db->get("tbl_type")->row();
	}

	public function TypewiseContactDetails($formdata)
	{
	    $final_array=array();  
	    $start_date=date("Y-m-d",strtotime($formdata['start_date']));
	    $end_date=date("Y-m-d",strtotime($formdata['end_date']));
	    $type_id=$formdata['type_id'];

	    $where_array = array('type_id'=>$type_id,'DATE(created_date)>=' => $start_date,'DATE(created_date)<=' => $end_date);
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