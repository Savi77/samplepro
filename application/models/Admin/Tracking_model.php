<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking_model extends CI_Model
 {

    	public function __construct() 
        {
              parent::__construct();
              //echo 'Hello World2';
        }

        public function employee_list()
	    {
	    	$org_id=$this->session->org_id;
	       return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `user_type`='E' AND user_status='1' and org_id='$org_id' ")->result();
	    }
	    public function customer_list()
	    {
	    	// $where=array('delete_status'=>'1', 'parent_id'=>'0', 'cust_type'=>'primary');
	    	$this->db->select('customer_id, company_name, contact_person_name1, phone_no');
	    	$this->db->where('delete_status','1');
	        return $this->db->get('tbl_customer')->result();
	    }

	    public function get_shift_list()
	    {
	    	 $this->db->where('delete_status',0);
			 $this->db->where('status',1);
	    	 $this->db->where('org_id',$this->session->org_id);
			 $this->db->order_by('id','DESC');
	    	 return $this->db->get("tbl_shift_timing")->result();
	    }	

		public function add_master_shift($formdata)
		{
			$formData = $formdata['from_timing'].':00';
			$toData = $formdata['to_timing'].':00';
			
			// $formData1 = DateTime::createFromFormat('h:i A', $formdata['from_timing']);
			// $formData = $formData1->format('H:i:s');

			// $formData2 = DateTime::createFromFormat('h:i A', $formdata['to_timing']);
			// $toData = $formData2->format('H:i:s');
			$this->db->SET('status',0); 
			$this->db->where('org_id',$this->session->org_id);
			$this->db->Update('tbl_shift_timing');	

			$data = array(
				'org_id' => $this->session->org_id,
				'shift_title' => $formdata['shift_title'],
				'from_timing' => $formData,
				'to_timing' => $toData,
			);
    		$formdata['org_id']=$this->session->org_id;
			$this->db->insert('tbl_shift_timing',$data);	
			
			echo "1"; 	
		}

		public function edit_master_shift($id)
		{
	    	$this->db->where("id",$id);
	    	return $this->db->get("tbl_shift_timing")->result();	
		}

		public function delete_master_shift($id)
		{
			$this->db->SET('delete_status',1); 
			$this->db->where('org_id',$this->session->org_id);
			$this->db->where('id',$id); 
			$this->db->Update('tbl_shift_timing');	
			echo "1"; 	
		}
		//---------------------------------------------------------------------------
		public function confirm_shift($user_id) 
		{
			$this->db->SET('status',1); 
			$this->db->where('id',$user_id); 
			$this->db->Update('tbl_shift_timing');
		}
		//---------------------------------------------------------------------------
		public function cancel_shift($user_id) 
		{
			$this->db->SET('status',0); 
			$this->db->where('id',$user_id); 
			$this->db->Update('tbl_shift_timing');
		}

	 public function update_master_shift($formdata)
	 {
		$arr=array
	 	(
	 		'shift_title'=>$formdata['shift_title'],
	 		'from_timing'=>$formdata['from_timing'],
	 		'to_timing'=>$formdata['to_timing']
	 	);
	 	$this->db->where('id',$formdata['id']);
	 	$this->db->update('tbl_shift_timing',$arr);
	 	echo "1";
	}


//------------- LiveTrackingSchedule -------------------------------- 
	public function LiveTrackingSchedule($formdata)
	 {
    	   $marker_array=array();
		   $user_id=$formdata['emp_id'];
		   $start_date1 = str_replace(',', ' ', $formdata['start_date']);
		   $assign_date = date("Y-m-d", strtotime($start_date1));	

	 	   $this->db->select("latitude,longitude");
		   $this->db->where("emp_id",$user_id);
		//    $this->db->where("IMEI !=","null");
		   $this->db->order_by("pos_date",'desc');
		   $this->db->order_by("pos_time",'desc');
		   $this->db->limit(1); 
		   $location=$this->db->get("gpsdata")->result();

		   $this->db->where("schedule_assign_to",$user_id);
		   $this->db->where("assign_date",$assign_date);
		   $this->db->order_by("assign_starttime",'asc');
		   $res1=$this->db->get("tbl_schedule")->result();

		   $i=1;
		   $numrows=count($res1);

		   foreach ($res1  as  $value)
		    {

		    	if($i==$numrows)
		    	{
			        $emp_latitude=$location[0]->latitude;
			        $emp_longitude=$location[0]->longitude;
			    	$data2="<b style='color:red;'>Employee Name: </b>";				
				    $marker_array[]=array("address" => array("status" => 'emp',"lat" => $emp_latitude,"lng" => $emp_longitude),"title" => $data2); 
		    	}

				$issue_id=$value->issue_id;
				$this->db->where("query_id",$issue_id);
				$result=$this->db->get("tbl_user_query")->result();
				$customer_id=$result[0]->customer_id;
				$this->db->where("customer_id",$customer_id);
				$customer=$this->db->get("tbl_customer")->result();
				$address=$customer[0]->address;
				$company_name=$customer[0]->company_name;
				$formattedAddr = str_replace(' ','+',$address);
				$geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&key=AIzaSyC9YQgODPIUDt-9tIajRrBRuHSfkRxSty8'); 
				$output = json_decode($geocodeFromAddr);
				$latitude  = $output->results[0]->geometry->location->lat; 
				$longitude= $output->results[0]->geometry->location->lng;
				$data2="<b style='color:red;'>Client Name: ".$company_name."</b>";
				
				$marker_array[]=array("address" => array("status" => 'client',"lat" => $latitude,"lng" => $longitude),"title" => $data2); 
			
				$i++;
            }
	     echo trim(json_encode($marker_array)); 

	 }

//------------- Viewdata_employee ------------------------------------------------------------------- 
	public function Viewdata_admin($formdata)
	 {
			$emp_id=$formdata['emp_id'];
			$start_date1 = str_replace(',', ' ', $formdata['start_date']);
			$date = date("Y-m-d", strtotime($start_date1));
			$marker_array=array();
			// $date="2019-06-07";
			// $emp_id=34;
			$res1=$this->db->query("SELECT `track_id`, `latitude`,`longitude`,`pos_time`
									FROM gpsdata
									WHERE track_id IN
									(
									   SELECT MIN(track_id)
									   FROM gpsdata
									   GROUP BY latitude, longitude, pos_time
									)
									and emp_id='$emp_id' and `pos_date`='$date'
									order by pos_time ASC")->result(); 

		 	$i=1;
		 	$numrows=count($res1);
		 	foreach ($res1  as $key => $value)
		    {
		    	$current=$key;
		    	$next=$key+1;
		    	$x1=$res1[$current]->latitude;
		    	$x2=$res1[$next]->latitude;
		    	$y1=$res1[$current]->longitude;
		    	$y2=$res1[$next]->longitude;
		    	$deltavalue_lat=$x2-$x1;
		    	$deltavalue_long=$y2-$y1;
		    	$distance_value=sqrt(($deltavalue_lat*$deltavalue_lat)+($deltavalue_long*$deltavalue_long));
		    	$final_distance_value=$distance_value*108;
		    	$difference=number_format((float)$final_distance_value, 2, '.', '');

		    	$pos_time=$value->pos_time;

				if($i==$numrows)
				{
				  	$status='Fused';
					$imei=$imei_no;
					$postime=$pos_time;
					$lat=$value->latitude;
					$long=$value->longitude;
					$data2="<b style='color:red;'> End Point<p style='color:red'>Time: ".$postime."</p></b>";
					$marker_array[]=array("address" => array("status" => $status,"lat" => $lat,"lng" => $long),"title" => $data2,"difference" =>$difference); 

				}
		    	else if($difference<=2)
		    	{
				  	$status='Fused';
					$imei=$imei_no;
					$postime=$pos_time;
					$lat=$value->latitude;
					$long=$value->longitude;	
					if($i==1)
					{
					    $data2="<b style='color:green;'> Start Point<p style='color:red'>Time: ".$postime."</p></b>";
					}
					else
					{
						 $data2="<b><p style='color:red'>Time: ".$postime."</p></b>";
					}
				    $marker_array[]=array("address" => array("status" => $status,"lat" => $lat,"lng" => $long),"title" => $data2,"difference" =>$difference);      
				}
   
			    $i++;
			}
	     echo trim(json_encode($marker_array)); 
	 }


	public function LiveEmployeeTrackingData()
	 {
		$marker_array=array();
		$this->db->where("user_type","E");
		$res1=$this->db->get("tbl_admin_login")->result();
	 	foreach ($res1  as $key => $value)
		 {
	    	$emp_id=$value->id;
	    	$name=$value->name;
	    	$pos_date=date("Y-m-d");

	    	$this->db->where("pos_date",$pos_date);
	    	$this->db->order_by("pos_time","DESC");
			$this->db->where("emp_id",$emp_id);
			$gpsdata=$this->db->get("gpsdata")->row(); 
			if(!empty($gpsdata->latitude))
			{
				$postime=$gpsdata->pos_time;
				$lat=$gpsdata->latitude;
				$long=$gpsdata->longitude;
				$status='Fused';
				$data2="<b style='color:#0080B1;'>Name : ".$name." <br/><p style='color:red'>Recent Time: ".$postime."</p> 
				    </b>";

				$marker_array[]=array("address" => array("status" => $status,"lat" => $lat,"lng" => $long),"title_details" => $data2,"difference" =>''); 
			}
		}
	    echo trim(json_encode($marker_array)); 
	 }

	public function LiveLocation()
	 {
		$marker_array=array();
		$this->db->where("user_type","E");
		$res1=$this->db->get("tbl_admin_login")->result();
	 	foreach ($res1  as $key => $value)
		 {
	    	$emp_id=$value->id;
	    	$name=$value->name;
	    	$pos_date=date("Y-m-d");

	    	$this->db->where("pos_date",$pos_date);
	    	$this->db->order_by("pos_time","DESC");
			$this->db->where("emp_id",$emp_id);
			$gpsdata=$this->db->get("gpsdata")->row(); 
			if(!empty($gpsdata->latitude))
			{
				$postime=$gpsdata->pos_time;
				$lat=$gpsdata->latitude;
				$long=$gpsdata->longitude;
				$status='Fused';
				$data2="<b style='color:#0080B1;'>Name : ".$name." <br/><p style='color:red'>Recent Time: ".$postime."</p> 
				    </b>";

				$marker_array[]=array("address" => array("status" => $status,"lat" => $lat,"lng" => $long),"title_details" => $data2,"difference" =>''); 
			}
		}
		return $marker_array;
	 }

//--------------------------------------------------------------------


        public function AddLocation($formdata)
		{
		 	return $this->db->insert('tbl_selectedarea',$formdata); 
		}

		public function viewlocation()
		{	
			// $this->db->where('cust_id',$cust_id);
			
			$data=$this->db->get("tbl_selectedarea")->result();
			$customer_array=array();
			foreach ($data as $value) 
			{
				$cust_id = $value->cust_id;
				$this->db->where('customer_id',$cust_id);
	       		$data1 = $this->db->get('tbl_customer')->row();
	       		$arr=array
	       		(
	       			'cust_id'=>$cust_id,
	       			'selected_areaid'=>$value->id,
	       			'location'=>$value->location,
	       			'city'=>$value->city,
	       			'latitude'=>$value->latitude,
	       			'longitude'=>$value->longitude,
	       			'date_created'=>$value->date_created,
	       			'company_name'=>$data1->company_name
	       		);
	       		array_push($customer_array, $arr);
			}
			return $customer_array;
		}

		public function get_location_detail()
		{
			$marker_array=array();
			$res1=$this->db->query(" SELECT * from tbl_selectedarea ");
			$i=1;
			$numrows=count($res1->result());
			foreach ($res1->result() as $value)
			{
				$imei=$value->title;
				$title=$value->location;
				$latitude=$value->latitude;
				$longitude=$value->longitude;
				
			    $marker_array[]=array("address" => array("status" => $title,"lat" => $latitude,"lng" => $longitude),"title" => $title);      
			    $i++;
			}
		     echo trim(json_encode($marker_array));
	    }

		public function DeleteLocation($del_id)
		{
		 	$this->db->where('id',$del_id); 
		 	$this->db->delete('tbl_selectedarea'); 
		}

		//-----------------------------------------------------------------------------------
	    public function FetchClientReport_default()
		{
			$final_array=array();
			// $user_id=$formdata['emp_id'];
			// $start_date1 = str_replace(',', ' ', $formdata['form_date']);
			// $assign_date = date("Y-m-d", strtotime($start_date1));	
			$assign_date = date("Y-m-d");	


			$this->db->select("latitude,longitude");
			$this->db->where("org_id",$this->session->org_id);
			$this->db->order_by("pos_date",'desc');
			$this->db->order_by("pos_time",'desc');
			// $this->db->limit(1); 
			$location=$this->db->get("gpsdata")->result();

			$this->db->where("schedule_assign_to",$user_id);
			$this->db->where("assign_date",$assign_date);
			$this->db->where_not_in("reschedule",'reschedule');			   
			$this->db->order_by("assign_starttime",'asc');
			$res1=$this->db->get("tbl_schedule")->result();

			$numrows=count($res1);
			foreach ($res1  as  $value)
			{
				$issue_id=$value->issue_id;
				$this->db->where("query_id",$issue_id);
				$result=$this->db->get("tbl_user_query")->result();
				$customer_id=$result[0]->customer_id;

				$this->db->where("customer_id",$customer_id);
				$customer=$this->db->get("tbl_customer")->result();
				$address=$customer[0]->address;
				$company_name=$customer[0]->company_name;

				$formattedAddr = str_replace(' ','+',$address);
				$geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&key=AIzaSyC9YQgODPIUDt-9tIajRrBRuHSfkRxSty8'); 
				$output = json_decode($geocodeFromAddr);
				$latitude  = $output->results[0]->geometry->location->lat; 
				$longitude= $output->results[0]->geometry->location->lng;


					$distance=$this->db->query(" 
												SELECT IMEI,pos_date,pos_time,( 3959 * acos ( cos ( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$longitude') ) + sin ( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance  FROM gpsdata where pos_date='$assign_date' and emp_id='$user_id' HAVING distance < 0.124274 ORDER BY pos_time ASC")->result();
					$size=sizeof($distance)-1;
					$first=$distance[0]->pos_time;
					$last=$distance[$size]->pos_time;
					$datetime1 = strtotime("$first");
					$datetime2 = strtotime("$last");
					$interval  = abs($datetime2 - $datetime1);
					$minutes   = round($interval / 60);
					$interval=date('H:i', mktime(0,$minutes));

					if(empty($first))
					{
					$first="00:00";
					}
					if(empty($last))
					{	
					$last="00:00";
					}

					$newarray=array(
								'company_name'=>$company_name,
								'from'=>$first,
								'to'=>$last,
								'interval'=>$interval,
								'address'=>$address
							);
				array_push($final_array, $newarray);
			}
			return $final_array;

		}

		public function FetchClientReport($formdata)
		 {
	    	   $final_array=array();
			   $user_id=$formdata['emp_id'];
			   $start_date1 = str_replace(',', ' ', $formdata['form_date']);
			   $assign_date = date("Y-m-d", strtotime($start_date1));	

		 	   $this->db->select("latitude,longitude");
			   $this->db->where("emp_id",$user_id);
			   $this->db->order_by("pos_date",'desc');
			   $this->db->order_by("pos_time",'desc');
			   $this->db->limit(1); 
			   $location=$this->db->get("gpsdata")->result();

			   $this->db->where("schedule_assign_to",$user_id);
			   $this->db->where("assign_date",$assign_date);
			   $this->db->where_not_in("reschedule",'reschedule');			   
			   $this->db->order_by("assign_starttime",'asc');
			   $res1=$this->db->get("tbl_schedule")->result();

			   $numrows=count($res1);
			   foreach ($res1  as  $value)
			    {
					$issue_id=$value->issue_id;
					$this->db->where("query_id",$issue_id);
					$result=$this->db->get("tbl_user_query")->result();
					$customer_id=$result[0]->customer_id;

					$this->db->where("customer_id",$customer_id);
					$customer=$this->db->get("tbl_customer")->result();
					$address=$customer[0]->address;
					$company_name=$customer[0]->company_name;

					$formattedAddr = str_replace(' ','+',$address);
					$geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&key=AIzaSyC9YQgODPIUDt-9tIajRrBRuHSfkRxSty8'); 
					$output = json_decode($geocodeFromAddr);
					$latitude  = $output->results[0]->geometry->location->lat; 
					$longitude= $output->results[0]->geometry->location->lng;


			 	 	 $distance=$this->db->query(" 
											     SELECT IMEI,pos_date,pos_time,( 3959 * acos ( cos ( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$longitude') ) + sin ( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance  FROM gpsdata where pos_date='$assign_date' and emp_id='$user_id' HAVING distance < 0.124274 ORDER BY pos_time ASC")->result();
		   	 	     $size=sizeof($distance)-1;
		 	 	     $first=$distance[0]->pos_time;
		 	 	     $last=$distance[$size]->pos_time;
					 $datetime1 = strtotime("$first");
					 $datetime2 = strtotime("$last");
					 $interval  = abs($datetime2 - $datetime1);
					 $minutes   = round($interval / 60);
					 $interval=date('H:i', mktime(0,$minutes));

					 if(empty($first))
					 {
					 	$first="00:00";
					 }
					 if(empty($last))
					 {	
					 	$last="00:00";
					 }

		 	 	     $newarray=array(
									'company_name'=>$company_name,
									'from'=>$first,
									'to'=>$last,
									'interval'=>$interval,
									'address'=>$address
					 	 	    );
		 	 	    array_push($final_array, $newarray);
	            }
             return $final_array;

	     }


	  public function daterange_report($formdata)
	 {
	 	$start_date1 = str_replace(',', ' ', $formdata['form_date']);
		$curdate = date("Y-m-d", strtotime($start_date1));
		    $emp_id=$formdata['emp_id'];
	 	    $final_array=array();
		 	$this->db->where('id',$emp_id); 
		 	$this->db->where('user_type',E); 
		 	$employee=$this->db->get("tbl_admin_login")->result();
		 	foreach ($employee as  $vehicle)
		 	 {
		 	 	$emp_id=$vehicle->id;
		 	 	$name=$vehicle->name;
			 	// $this->db->where('cust_id',$cust_id); 
			 	$location=$this->db->get("tbl_selectedarea")->result();
			 	foreach ($location as  $value)
			 	 {
			 	 	 $cust_id=$value->cust_id;
			 	 	 $this->db->where('customer_id',$cust_id);
	       			 $data1 = $this->db->get('tbl_customer')->row();
			 	 	 $location=$value->location;	
			 	 	 $latitude=$value->latitude;
			 	 	 $longitude=$value->longitude;	
			 	 	 $distance=$this->db->query(" 
											     SELECT IMEI,pos_date,pos_time,( 3959 * acos ( cos ( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$longitude') ) + sin ( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance  FROM gpsdata where pos_date='$curdate' and emp_id='$emp_id' HAVING distance < 0.124274	")->result();
		   	 	     $size=sizeof($distance)-1;
		 	 	     $first=$distance[0]->pos_time;
		 	 	     $last=$distance[$size]->pos_time;
					 $datetime1 = strtotime("$first");
					 $datetime2 = strtotime("$last");
					 $interval  = abs($datetime2 - $datetime1);
					 $minutes   = round($interval / 60);
					 $interval=date('H:i', mktime(0,$minutes));

					 if(empty($first))
					 {
					 	$first="00:00";
					 }
					 if(empty($last))
					 {	
					 	$last="00:00";
					 }

		 	 	     $newarray=array(
									'company_name'=>$data1->company_name,
									'from'=>$first,
									'to'=>$last,
									'interval'=>$interval,
									'imei'=>$imei,
									'emp_name'=>$name,
									'location'=>$location
					 	 	    );
		 	 	    array_push($final_array, $newarray);
			     }	
		     }	
		     return $final_array;
		     // echo  json_encode($final_array);		
     }

    public function get_shift_employee_list()
	{
		$org_id=$this->session->org_id;
		$this->db->where('org_id',$this->session->org_id);
		$this->db->select("emp_id");
		$res=$this->db->get("tbl_shift")->result();
		$empids='';
		foreach ($res as  $value) 
		{
		  $empids=$empids.$value->emp_id.',';
		}

	    $finalids=substr($empids,0, -1);

	    if(!empty($finalids))
	    {
	    	return $this->db->query(" SELECT * FROM  tbl_admin_login WHERE user_type='E'  and  `user_status` = 1 and  id NOT IN($finalids) and org_id='$org_id' ")->result();
	    }
	    else
	    {
	    	return $this->db->query(" SELECT * FROM  tbl_admin_login WHERE user_type='E' and  `user_status` = 1 and org_id='$org_id'  ")->result();
	    }
    
    }

    public function get_employee_list()
	{
		$this->db->where('org_id',$this->session->org_id); 
	 	$this->db->where('user_type','E'); 
		return $this->db->get("tbl_admin_login")->result();
	}

	// ---------- date range report ---------------------------------------------
    public function daterange_distance_default()
	{
		// $start_date1 = str_replace(',', ' ', $formdata['start_date']);
   		// $end_date1 = str_replace(',', ' ', $formdata['end_date']);	
		$form_date = date("Y-m-d");
		$to_date = date("Y-m-d");
	 	$org_id = $this->session->org_id;
	    $query=$this->db->query("SELECT `pos_date`,`emp_id`  FROM  `gpsdata` WHERE  pos_date >= '$form_date' AND  pos_date <='$to_date' AND  `org_id`='$org_id' group by `pos_date`,`emp_id` ");

	    // print_r($query2->result());
	    $final_array1=array();
	    foreach ($query->result() as $value) 
	    {
	    	
	    	$pos_date = $value->pos_date;
	    	$emp_id = $value->emp_id;
	    	$query1=$this->db->query("SELECT * from gpsdata where pos_date='$pos_date' AND `org_id`='$org_id' ORDER BY pos_time ASC")->row();
	    	$emp_id = $query1->emp_id;
	    	$query2=$this->db->query("SELECT * from gpsdata where pos_date='$pos_date' AND `org_id`='$org_id' ORDER BY pos_time ASC");

	    	// print_r($query2->result());


			     $delta_lat_array=array();
				 $delta_long_array=array();
				 foreach ($query2->result() as $value1) 
				 {
				 	$distance_lat_array[]=$value1->latitude;
			        $distance_long_array[]=$value1->longitude;
				 }    
				 // print_r($distance_lat_array);
				 // print_r($distance_long_array);
	            for($p=0;$p<sizeof($distance_lat_array)-1;$p++)
	             {
	               $latvalue1=$distance_lat_array[$p];
	               $latvalue2=$distance_lat_array[$p+1];
	               // echo $latvalue1 .' '.$latvalue2;
	               // echo "<br>";
	               $deltavalue=$latvalue1-$latvalue2;
	               array_push($delta_lat_array, $deltavalue);
	             }
	             // echo "<br/>";
		          // print_r($delta_lat_array); 
		         // echo "<br/>";
	            for($b=0;$b<sizeof($distance_long_array)-1;$b++)
	            {
	               $longvalue1=$distance_long_array[$b];
	               $longvalue2=$distance_long_array[$b+1];
	               // echo $longvalue1 .' '.$longvalue2;
	               // echo "<br>";
	               $deltalongvalue=($longvalue1-$longvalue2);
	               array_push($delta_long_array, $deltalongvalue);
	            }
				$final_deltavalue="";
				          // echo "<br/>";
				          // print_r($delta_long_array);
				          // echo "<br/>";

				for($d=0;$d<count($delta_long_array);$d++)
				{
				  $distance_value=sqrt(($delta_lat_array[$d]*$delta_lat_array[$d])+($delta_long_array[$d]*$delta_long_array[$d]));
				  $final_deltavalue=$final_deltavalue+$distance_value;
				}
				// echo "<br/>Final distance";           
				$final_distance_value=$final_deltavalue*108;
				$time2=number_format((float)$final_distance_value, 2, '.', '');

				$data_array= array
				(
					'Date'=>$pos_date,
					'IMEI'=>$IMEI,
					// 'model_no'=>$model_no,
					'Distance'=>$time2
				);

				array_push($final_array1, $data_array);
				unset($distance_lat_array);
				unset($distance_long_array);
				unset($delta_lat_array);
				unset($delta_long_array);
				// array_push($final_array1, $data_array);

	    }
	    // echo json_encode($final_array1);
	    return $final_array1;
	    // print_r($final_array1);
	    // echo json_encode($final_array1);

	}
	 public function daterange_distance($formdata)
	 {

	 	$start_date1 = str_replace(',', ' ', $formdata['start_date']);
   		$end_date1 = str_replace(',', ' ', $formdata['end_date']);	
		$form_date = date("Y-m-d", strtotime($start_date1));
		$to_date = date("Y-m-d", strtotime($end_date1));
	 	$emp_id = $formdata['emp_id'];
	    $query=$this->db->query("SELECT `pos_date`,`emp_id`  FROM  `gpsdata` WHERE  pos_date >= '$form_date' AND  pos_date <='$to_date' AND  `emp_id`='$emp_id' group by `pos_date`,`emp_id` ");

	    // print_r($query2->result());
	    $final_array1=array();
	    foreach ($query->result() as $value) 
	    {
	    	
	    	$pos_date = $value->pos_date;
	    	$emp_id = $value->emp_id;
	    	$query1=$this->db->query("SELECT * from gpsdata where pos_date='$pos_date' AND emp_id='$emp_id' ORDER BY pos_time ASC")->row();
	    	$emp_id = $query1->emp_id;
	    	$query2=$this->db->query("SELECT * from gpsdata where pos_date='$pos_date' AND emp_id='$emp_id' ORDER BY pos_time ASC");

	    	// print_r($query2->result());


			     $delta_lat_array=array();
				 $delta_long_array=array();
				 foreach ($query2->result() as $value1) 
				 {
				 	$distance_lat_array[]=$value1->latitude;
			        $distance_long_array[]=$value1->longitude;
				 }    
				 // print_r($distance_lat_array);
				 // print_r($distance_long_array);
	            for($p=0;$p<sizeof($distance_lat_array)-1;$p++)
	             {
	               $latvalue1=$distance_lat_array[$p];
	               $latvalue2=$distance_lat_array[$p+1];
	               // echo $latvalue1 .' '.$latvalue2;
	               // echo "<br>";
	               $deltavalue=$latvalue1-$latvalue2;
	               array_push($delta_lat_array, $deltavalue);
	             }
	             // echo "<br/>";
		          // print_r($delta_lat_array); 
		         // echo "<br/>";
	            for($b=0;$b<sizeof($distance_long_array)-1;$b++)
	            {
	               $longvalue1=$distance_long_array[$b];
	               $longvalue2=$distance_long_array[$b+1];
	               // echo $longvalue1 .' '.$longvalue2;
	               // echo "<br>";
	               $deltalongvalue=($longvalue1-$longvalue2);
	               array_push($delta_long_array, $deltalongvalue);
	            }
				$final_deltavalue="";
				          // echo "<br/>";
				          // print_r($delta_long_array);
				          // echo "<br/>";

				for($d=0;$d<count($delta_long_array);$d++)
				{
				  $distance_value=sqrt(($delta_lat_array[$d]*$delta_lat_array[$d])+($delta_long_array[$d]*$delta_long_array[$d]));
				  $final_deltavalue=$final_deltavalue+$distance_value;
				}
				// echo "<br/>Final distance";           
				$final_distance_value=$final_deltavalue*108;
				$time2=number_format((float)$final_distance_value, 2, '.', '');

				$data_array= array
				(
					'Date'=>$pos_date,
					'IMEI'=>$IMEI,
					// 'model_no'=>$model_no,
					'Distance'=>$time2
				);

				array_push($final_array1, $data_array);
				unset($distance_lat_array);
				unset($distance_long_array);
				unset($delta_lat_array);
				unset($delta_long_array);
				// array_push($final_array1, $data_array);

	    }
	    // echo json_encode($final_array1);
	    return $final_array1;
	    // print_r($final_array1);
	    // echo json_encode($final_array1);

	 }

	 // ------------------------------------- Location report ---------------------------------------------

	 public function daterange_location($formdata)
	 {
	 	$start_date1 = str_replace(',', ' ', $formdata['start_date']);
   		$end_date1 = str_replace(',', ' ', $formdata['end_date']);
		
		$form_date = date("Y-m-d", strtotime($start_date1));
		$to_date = date("Y-m-d", strtotime($end_date1));

	 	$emp_id = $formdata['emp_id'];
	    $query=$this->db->query("SELECT `pos_date`,`emp_id`  FROM  `gpsdata` WHERE  pos_date >= '$form_date' AND  pos_date <='$to_date' AND  `emp_id`='$emp_id' group by `pos_date`,`emp_id`");

	    $final_array=array();
	    foreach ($query->result() as $value) 
	    {
	    	$pos_date = $value->pos_date;
	    	$emp_id = $value->emp_id;
	    	$query2=$this->db->query("SELECT DISTINCT `pos_time`, `pos_date`, `emp_id`, `latitude`, `longitude` from gpsdata where pos_date='$pos_date' AND emp_id='$emp_id' ORDER BY pos_time ASC");
			foreach ($query2->result() as $value1) 
			{
			 	$latitude=$value1->latitude;
		        $longitude=$value1->longitude;

	        	$url = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=AIzaSyDLrMUV6WjjwjfAWRvFMi5TC1B2gAMz7rU&latlng=$latitude,$longitude&sensor=false");
				$response = json_decode($url);
				$address = $response->results[0]->formatted_address;
				$position_date = date("d M, Y",strtotime($value1->pos_date));
				$newarray=array(
									'time'=>$value1->pos_time,
									// 'latitude'=>$latitude,
									// 'longitude'=>$longitude,
									'date'=>$position_date,
									'address'=>$address
					 	 	    );
	 	 	    array_push($final_array, $newarray);
					       
			}  
	    }
	    // echo json_encode($final_array);
	    return $final_array;
	 }

// ======================================= Employee shift =================================================
	public function emp_shift()
	{
        $this->db->where('org_id',$this->session->org_id);
		$this->db->order_by('shift_id','DESC');
		$data = $this->db->get("tbl_shift")->result();
		$shift_array=array();

		foreach ($data as $value) 
		{
			$emp_id = $value->emp_id;
			$this->db->where('id',$emp_id);
			$this->db->order_by('id','DESC');
		 	$employee=$this->db->get("tbl_admin_login")->row();
		 	$name = $employee->name;
		 	$shift_id = $value->shift_timing;
			$this->db->where('id',$shift_id); 
			$this->db->order_by('id','DESC');
		 	$shift_timing=$this->db->get("tbl_shift_timing")->row();

		 	$start_time = date("h:i A", strtotime($shift_timing->from_timing));
		 	$end_time = date("h:i A", strtotime($shift_timing->to_timing));

		 	$arr=array
		 	(
		 		'shift_id'=>$value->shift_id,
		 		'shift'=>$shift_timing->shift_title,
		 		'start_time'=>$start_time,
		 		'end_time'=>$end_time,
		 		'name'=>$name
		 	);
		 	array_push($shift_array, $arr);
		}
		return $shift_array;
	}


	public function add_shift($formdata)
	{
		    $EmpArray=$formdata['emp_id'];
		    $shift_timing=$formdata['shift_timing'];
		    for($i=0;$i<count($EmpArray);$i++)
		    {
		    	$emp_id=$EmpArray[$i];
		    	$arr=array
				( 
					'emp_id'=>$emp_id,
					'org_id'=>$this->session->org_id,
					'shift_timing'=>$shift_timing,
					'created_date'=>date("Y-m-d H:i:s")
				);	
				$this->db->insert('tbl_shift',$arr);	
				echo "1"; 	
		    }		
	}

	public function edit_shift($shiftid)
	 {
	   $this->db->where('shift_id',$shiftid); 
	   return $this->db->get("tbl_shift")->result();
	 }

	 
	 public function edit_add_shift($formdata)
	 {
		$emp_id = $formdata['emp_id'];
		$shift_timing = $formdata['shift_timing'];
		$arr=array
	 	(
	 		'shift_timing'=>$shift_timing
	 	);
	 	$this->db->where('emp_id',$emp_id);
	 	$this->db->update('tbl_shift',$arr);
	 	echo "1";
	}




} 
