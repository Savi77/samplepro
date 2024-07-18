<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
 {
 	 private $country_code;
	
 	 function __construct()
	  {
		    parent::__construct(); // construct the Model class
		    $this->load->database();
	        $this->country_code = array("country_code"=>$this->session->country_code);	    
	  }



	  public function get_user_permission($permission_array)
	  {
	  	$this->db->select("priviledge_id,priviledge_key,status");
	  	$where_array=array('user_id'=>$permission_array['user_id'],'module_id'=>$permission_array['module_id'],'feature_id'=>$permission_array['feature_id'],);
	  	$this->db->where($where_array);
	  	return $this->db->get("tbl_module_permission")->result();	 
	  }


	  public function AddNotes()
	  {
	      $InsertArray=array(  
	                        'org_id'=>$this->session->org_id,
	                        'emp_id'=>$this->session->id,
	                        'notes'=>$this->input->post('notes'),
	                        'created_date'=>date("Y-m-d H:i:s")
	                      );
          $this->db->insert('tbl_notes',$InsertArray);
      }

	  public function del_notes()
	  {
          $this->db->where("note_id",$this->input->post('note_id'));
          $this->db->Delete('tbl_notes');
      }

	  public function GetNotes()
	  {
	  	$this->db->where("emp_id",$this->session->id);
	  	return $this->db->get("tbl_notes")->result();
	  }

	  public function get_profile_array()
	  {
	  	$this->db->where("id",$this->session->id);
	  	return $this->db->get("tbl_admin_login")->row();
	  }

	  public function get_gst_details_array()
	  {
	  	$this->db->where("org_id",$this->session->org_id);
	  	return $this->db->get("tbl_org_gst_details")->result();
	  }

	  public function get_account_period_array()
	  {
	  	$this->db->where("org_id",$this->session->org_id);
	  	return $this->db->get("tbl_org_account_period")->result();
	  }

	  public function get_organsation_email_array()
	  {
	  	$this->db->where("org_id",$this->session->org_id);
		$this->db->where("emp_id",$this->session->id);
	  	return $this->db->get("tbl_org_email_configuration")->row();
	  }

	  public function get_organsation_array()
	  {
	  	$this->db->where("org_id",$this->session->org_id);
	  	return $this->db->get("tbl_organisation")->row();
	  }


	  public function ScheduleSummary()
	  {
	  	$org_id=$this->session->org_id;
	  	$assign_to=$_SESSION['id'];

	      if($_SESSION['user_type']=='SA')
	      {
	          $filter_data = " " ;
	      }
	      else
	      {
	      	$filter_data = " and assign_to='$assign_to'  " ;	          
	      }



		$res1=$this->db->query(" SELECT count(`query_id`) as  TodayCount FROM `tbl_user_query` WHERE DATE(`created_date`) = CURDATE() and org_id='$org_id' $filter_data  ")->row();
		$TodayCount= $res1->TodayCount;	

		$res2=$this->db->query(" SELECT count(`query_id`) as MonthCount FROM `tbl_user_query` WHERE MONTH(created_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data  ")->row();
		$MonthCount= $res2->MonthCount;

		$res3=$this->db->query("SELECT count(`query_id`) as YearCount  FROM `tbl_user_query` WHERE  YEAR(created_date) = YEAR(CURRENT_DATE()) and org_id='$org_id' $filter_data  ")->row();
		$YearCount= $res3->YearCount;

		$res4=$this->db->query(" SELECT  count(`query_id`) as Allcount FROM `tbl_user_query`  where org_id='$org_id' $filter_data  ")->row();
		$All= $res4->Allcount;

		$res5=$this->db->query(" SELECT  count(`query_id`) as Completed FROM `tbl_user_query` WHERE status='completed' and org_id='$org_id' $filter_data   ")->row();
		$Completed= $res5->Completed;

		$res6=$this->db->query(" SELECT  count(`query_id`) as Pending FROM `tbl_user_query` WHERE status='pending' and org_id='$org_id' $filter_data  ")->row();
		$Pending= $res6->Pending;

		$res7=$this->db->query(" SELECT  count(`query_id`) as Incompleted FROM `tbl_user_query` WHERE status='incompleted' and org_id='$org_id' $filter_data  ")->row();
		$Incompleted= $res7->Incompleted;

		$arrayName = array(
							'TodayCount' => $TodayCount,
			                'MonthCount' =>$MonthCount,
			                'YearCount' =>$YearCount,
			                'All' =>$All,
			                'Completed' =>$Completed,
			                'Pending' =>$Pending,
			                'Incompleted' =>$Incompleted,
			           	  );
		//print_r($arrayName);
		return $arrayName;
	  }	

	  public function OrderSummary()
	  {
	  	$org_id=$this->session->org_id;

	      // if($_SESSION['user_type']=='SA')
	      // {
	      //     $filter_data = " " ;
	      // }
	      // else
	      // {
	      // 	$filter_data = " and  " ;	          
	      // }

		$res1=$this->db->query(" SELECT count(`order_id`) as  TodayCount FROM `tbl_order` WHERE DATE(`created_date`) = CURDATE() and org_id='$org_id'   ")->row();
		$TodayCount= $res1->TodayCount;	

		$res2=$this->db->query(" SELECT count(`order_id`) as MonthCount FROM `tbl_order` WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) and org_id='$org_id'   ")->row();
		$MonthCount= $res2->MonthCount;

		$res3=$this->db->query("SELECT count(`order_id`) as YearCount  FROM `tbl_order` WHERE  YEAR(created_date) = YEAR(CURRENT_DATE()) and org_id='$org_id'  ")->row();
		$YearCount= $res3->YearCount;

		$res4=$this->db->query(" SELECT  count(`order_id`) as Booked FROM `tbl_order` WHERE order_status_id=3 and org_id='$org_id'   ")->row();
		$Booked= $res4->Booked;

		$res5=$this->db->query(" SELECT  count(`order_id`) as Processed FROM `tbl_order` WHERE order_status_id=4  and org_id='$org_id'  ")->row();
		$Processed= $res5->Processed;

		$res6=$this->db->query(" SELECT  count(`order_id`) as Shipped FROM `tbl_order` WHERE order_status_id=5  and org_id='$org_id'   ")->row();
		$Shipped= $res6->Shipped;

		$res7=$this->db->query(" SELECT  count(`order_id`) as Completed FROM `tbl_order` WHERE order_status_id=6 and org_id='$org_id'   ")->row();
		$Completed= $res7->Completed;

		$res8=$this->db->query(" SELECT  count(`order_id`) as Canceled FROM `tbl_order` WHERE order_status_id=7 and org_id='$org_id'   ")->row();
		$Canceled= $res8->Canceled;

		$arrayName = array(
							'TodayCount' => $TodayCount,
			                'MonthCount' =>$MonthCount,
			                'YearCount' =>$YearCount,
			                'Booked' =>$Booked,
			                'Processed' =>$Processed,
			                'Shipped' =>$Shipped,
			                'Completed' =>$Completed,
			                'Canceled' =>$Canceled
			           	  );
		return $arrayName;

	  }	

	  public function TargetSummary()
	  {
	  	   $finalArray=array();
	  	   $this->db->where('org_id',$this->session->org_id);
	       $this->db->where("status",1);
	       $this->db->where('delete_status',0);
	       $this->db->order_by("target_type",'ASC');
           $Target=$this->db->get("tbl_target_type")->result();

           foreach ($Target as  $res) 
           {
           	 $targettype_id=$res->targettype_id;
             $TargetValue=$this->db->query("SELECT `target_value` FROM `tbl_target` WHERE MONTH(date_created) = MONTH(CURRENT_DATE()) AND `targettype_id` = '$targettype_id'   ")->result();
             $Totalvalue=0;           
             foreach ($TargetValue as  $val) 
             {
                $Totalvalue=$Totalvalue+$val->target_value;
             }

             $AchieveValue=$this->db->query("SELECT `targettype_value` FROM `tbl_target_achieve_list` WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND `targettype_id` = '$targettype_id'  ")->result();
             $TotalAchieveValue=0;           
             foreach ($AchieveValue as  $achieve) 
             {
             	$TotalAchieveValue=$TotalAchieveValue+$achieve->targettype_value;
             }        
             $Balance=$Totalvalue-$TotalAchieveValue;

           	 $NewArray=array(
           	 	               'target_type'=>$res->target_type,
           	 	               'TargetValue'=>$Totalvalue,
           	 	               'TotalAchieveValue'=>$TotalAchieveValue,           	 	               
           	 	               'Balance'=>$Balance,
           	 	            );
           	 array_push($finalArray, $NewArray);
           }
           return $finalArray;
	  }	
	  

	  public function LeadsOveallSummary()
	  {
	  	  $org_id=$this->session->org_id;
	  	  $assign_to=$_SESSION['id'];
	      if($_SESSION['user_type']=='SA')
	      {
	          $filter_data = " " ;
	      }
	      else
	      {
	      	$filter_data = " and assign_to='$assign_to'  " ;	          
	      }

		$res1=$this->db->query(" SELECT count(`leadopp_id`) as  TodayCount FROM `tbl_leads_opportunity` WHERE DATE(`created_date`) = CURDATE()  and org_id='$org_id' $filter_data   ")->row();
		
		$res2=$this->db->query(" SELECT count(`leadopp_id`) as WeekCount FROM `tbl_leads_opportunity` WHERE WEEK(created_date) = WEEK(CURRENT_DATE())  and org_id='$org_id' $filter_data ")->row();

		$res3=$this->db->query("SELECT count(`leadopp_id`) as MonthCount  FROM `tbl_leads_opportunity` WHERE  MONTH(created_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data ")->row();

		$res4=$this->db->query(" SELECT  count(`leadopp_id`) as total FROM `tbl_leads_opportunity` where  org_id='$org_id' $filter_data ")->row();

       	$res5=$this->db->query(" SELECT  count(`leadopp_id`) as closuremonth FROM `tbl_leads_opportunity`  WHERE  MONTH(closure_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data   ")->row();

       	$res6=$this->db->query("  SELECT  SUM(`project_business_value`) as salesmonth FROM `tbl_leads_opportunity`  WHERE  MONTH(closure_date) = MONTH(CURRENT_DATE())  and org_id='$org_id' $filter_data  ")->row();
       	
       	if(empty($res6->salesmonth)){$res6->salesmonth=0;}
       	return array(
   	 	               'today'=>$res1->TodayCount,
   	 	               'weekcount'=>$res2->WeekCount,
 	 	               'monthcount'=>$res3->MonthCount,
  	 	               'total'=>$res4->total,
   	 	               'closuremonth'=>$res5->closuremonth,
   	 	               'salesmonth'=>$res6->salesmonth
   	 	            );
	  }

	  public function LeadsBySourceSummary()
	  {
	  	  $assign_to=$_SESSION['id'];
	      if($_SESSION['user_type']=='SA')
	      {
	          $filter_data = " " ;
	      }
	      else
	      {
	      	$filter_data = " and assign_to='$assign_to'  " ;	          
	      }

	  	   $finalArray=array();
	       $this->db->select('source_id, source_title');
	       $this->db->where('status',1);
	       $this->db->where('org_id',$this->session->org_id);


	       $source=$this->db->get('tbl_source')->result();
           foreach ($source as  $res) 
           {
           	 $source_id=$res->source_id;
           	 $res1=$this->db->query(" SELECT count(`leadopp_id`) as  SourceCount FROM `tbl_leads_opportunity` WHERE  source='$source_id' $filter_data  ")->row();
          	 $NewArray=array(
           	 	               'sourcecount'=>$res1->SourceCount,
           	 	               'sourcetitle'=>$res->source_title
           	 	            );
           	 array_push($finalArray, $NewArray);
           }
           return $finalArray;
	  }	

	  public function LeadsByOwnerSummary()
	  {
	  	  $assign_to=$_SESSION['id'];
	      if($_SESSION['user_type']=='SA')
	      {	          
	      }
	      else
	      {
	      	$this->db->where('id',$assign_to);        
	      }

	  	   $finalArray=array();
	       $this->db->select('id, name');
	       $this->db->where('user_status',1);
	       $this->db->where('user_type','E');
	       $this->db->where('org_id',$this->session->org_id);
	       $Owner=$this->db->get('tbl_admin_login')->result();
           foreach ($Owner as  $res) 
           {
           	 $created_by=$res->id;
           	 $res1=$this->db->query(" SELECT count(`leadopp_id`) as  OwnerCount FROM `tbl_leads_opportunity` WHERE  created_by='$created_by'  ")->row();
          	 $NewArray=array(
           	 	               'OwnerCount'=>$res1->OwnerCount,
           	 	               'name'=>$res->name
           	 	            );
           	 array_push($finalArray, $NewArray);
           }
           return $finalArray;
	  }	
	  	  

	  public function LeadsByStagesSummary()
	  {
	  	  $assign_to=$_SESSION['id'];
	      if($_SESSION['user_type']=='SA')
	      {
	          $filter_data = " " ;
	      }
	      else
	      {
	      	$filter_data = " and assign_to='$assign_to'  " ;	          
	      }

	  	   $finalArray=array();
	       $this->db->select('stage_id, stage_title');
	       $this->db->where('status',1);
	       $this->db->where('org_id',$this->session->org_id);
	       $Stage=$this->db->get('tbl_stage')->result();
	       foreach ($Stage as  $res) 
           {
           	 $stage_id=$res->stage_id;
           	 $res1=$this->db->query(" SELECT count(`leadopp_id`) as  StageCount FROM `tbl_leads_opportunity` WHERE  stage='$stage_id' $filter_data  ")->row();
          	 $NewArray=array(
           	 	               'StageCount'=>$res1->StageCount,
           	 	               'stage_title'=>$res->stage_title
           	 	            );
           	 array_push($finalArray, $NewArray);
           }
           return $finalArray;
	  }	
	  	  

    //Get all user summary ------------------------------------
	  public function summary()
	  {
		  	$org_id=$this->session->org_id;
			$res1=$this->db->query(" SELECT count(`id`) as  usercount FROM `tbl_admin_login` WHERE `user_type`='E' and org_id='$org_id' ")->row();
			$totalusercount= $res1->usercount;		
			$res2=$this->db->query(" SELECT count(`customer_id`) as custcount FROM `tbl_customer` WHERE `delete_status`='0'  and org_id='$org_id' ")->row();
			$custcount= $res2->custcount;
			$res3=$this->db->query("SELECT count(`query_id`) as issuecount  FROM `tbl_user_query` WHERE org_id='$org_id'  ")->row();
			$issuecount= $res3->issuecount;
			$res4=$this->db->query(" SELECT  count(`order_id`) as ordercount FROM `tbl_order`  WHERE org_id='$org_id' ")->row();
			$ordercount= $res4->ordercount;

			$arrayName = array(
								'totalusercount' => $totalusercount,
				                'custcount' =>$custcount,
				                'issuecount' =>$issuecount,
				                'ordercount' =>$ordercount
				           	  );
			return $arrayName;
	  }
//-----------------------------------------------------------

	  public function pending_userrewards()
	  {
	  	$country_code=$this->country_code['country_code'];
	  	return $this->db->query("
								  	SELECT  tbl_register.firstname,tbl_register.lastname,tbl_register.email,tbl_register.image_url,tbl_retailer.name,tbl_retailer.logo_small,tbl_retailer.user_reward
									FROM  `tbl_retailer` 
									INNER JOIN tbl_register
									ON tbl_retailer.created_by=tbl_register.user_id
									WHERE  tbl_retailer.user_reward =  'claim' and tbl_retailer.country_code='$country_code'
                     	  	  ");

	  }

//------------------GeofenceNotification -----------------------------------------

	 public function GeofenceNotification()
	  {

	       // $this->db->where('org_id',$this->session->org_id);
	       // $Result=$this->db->get('tbl_admin_login')->result();
	  	
	  	 $date_created=date("Y-m-d");
         return $this->db->query("
						  	SELECT  tbl_customer.company_name,tbl_admin_login.name,tbl_admin_login.profile_img,tbl_user_geofence_notification.*
							FROM  `tbl_user_geofence_notification` 
							INNER JOIN tbl_customer
							ON tbl_user_geofence_notification.customer_id=tbl_customer.customer_id
							INNER JOIN tbl_admin_login
							ON tbl_user_geofence_notification.user_id=tbl_admin_login.id
							WHERE DATE(date_created)='$date_created' 
                       ")->result();
	  }	

//-----------------------------------------------------------







	}  