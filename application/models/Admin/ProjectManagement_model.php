<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectManagement_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

	 public function add_project($start_date,$end_date,$recurring_cnt,$ProjectName,$ClientName,$InterestesIn,$StatusType,
     $PriorityType,$Rate,$Per,$ProjectManager,$frequency,$target_period,$ProjectDescription,$Team) 
	 {
		 
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $date=date("Y-m-d H:i:s");

        $start_date_m=date('Y-m-d', strtotime($start_date1));
        $end_date_m=date('Y-m-d',  strtotime($end_date1));

        $bussiness = $Team;
        $bussiness_id = "";
        for ($i = 0; $i < count($bussiness); $i++) {
            $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1)) {
            $nTeam = '0';
        } else {
            $nTeam = $buss_id1;
        }

        // $emp_id = explode(",",$name_values);
        // $count = sizeof($emp_id);
        // for($i=0;$i<$count;$i++)
        // {
        //     $employee_id=$emp_id[$i];
        //     $taget_value1=$res[$i];

        //         $result = $this->db->query("SELECT tr_auto_id FROM tbl_target ORDER BY target_id DESC LIMIT 1;")->row();
        //         if ($result) 
        //           {
        //                 $result1=$result->tr_auto_id;
        //                 $pre_date = explode('-', $result1);
        //                 // $previous_date = $pre_date[0]; // from table last date
        //                 $previous_date = $pre_date[1]; // from table last date
        //                 $tr_auto_id = $pre_date[2]; // from table last ticket no

        //                 $cur_date=date("YmdHis"); // current date
        //                 if ($previous_date==$cur_date) 
        //                 {
        //                   $tr_auto_id++;
        //                   $ticket_no1 = str_pad($tr_auto_id, 3, '0', STR_PAD_LEFT);
        //                   $final_ticket_num = $cur_date.'-'.$ticket_no1;
        //                   $target_auto_num='T-'.$cur_date.'-'.$ticket_no1;
        //                 }
        //                 else
        //                 {
        //                   $final_ticket_num=$cur_date.'-'.'001';
        //                   $target_auto_num='T-'.$cur_date.'-'.'001';
        //                 }
        //           }
        //           else
        //           {
        //             $cur_date=date("Ymd"); // current date
        //             $final_ticket_num=$cur_date.'-'.'001';
        //             $target_auto_num='T-'.$cur_date.'-'.'001';
        //           }
        $cur_date=date("Ymd"); 
        $Prefix="P-".$cur_date.'-';
        $this->db->select('p_auto_id');
        $this->db->order_by('p_auto_id','DESC');
        $result = $this->db->get('tbl_project_management')->row();
        if(!empty($result->p_auto_id))
        {
            $pre_date = explode('-', $result->p_auto_id);        
            $previous_date = $pre_date[1]; 
            $ticket_no = $pre_date[2]; 
            if ($previous_date==$cur_date) 
            {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                // $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $p_auto_id=$Prefix.$ticket_no1;
            }
            else
            {
                $p_auto_id=$Prefix.'001';
            }
        }
        else
        {
             $p_auto_id=$Prefix.'001';
        }


        $insert_array=array(
            'org_id'=>$org_id,
            'project_id'=>$Projectid,
            'project_name'=>$ProjectName,
            'client'=>$ClientName,
            'status'=>$StatusType,
            'priority'=>$PriorityType,
            'rate'=>$Rate,
            'per'=>$Per,
            'project_manager'=>$ProjectManager,
            'team'=>$nTeam,
            'project_description'=>$ProjectDescription,
            'date_created'=>$date,
            'p_auto_id'=>$p_auto_id,
            'frequency'=>$frequency,
            'interested_in'=>$InterestesIn,
            'recurring_count'=>$recurring_cnt,
            'start_date'=>$start_date_m,
            'end_date'=>$end_date_m,

        );

            $this->db->insert("tbl_project_management",$insert_array);

            $this->db->select('project_id');
            $this->db->where('project_name',$ProjectName);
            $result = $this->db->get('tbl_project_management')->row();
            if(!empty($result->project_id))
            {
                $related_pid = $result->project_id;
            }
            
            //$related_pid = $this->db->query("SELECT project_id FROM tbl_project_management WHERE project_name = $ProjectName");
        $pointer = 1;
            for($inner=0;$inner<$recurring_cnt;$inner++)
            {

                if($target_period=='Daily')
                {
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
                }

                if($target_period=='Weekly')
                {
                    $add_days=$inner*7-1; 
					if($inner>0)
					{
						$add_days=$inner*7;
					}
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*7+7-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Fortnightly')
                {
                    $add_days=$inner*15-1; 
					if($inner>0)
					{
						$add_days=$inner*15;
					}
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*15+15-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Monthly')
                {
                    $add_days=$inner*30-1; 
					if($inner>0)
					{
						$add_days=$inner*30;
					}
										
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*30+30-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Quarterly')
                {
                    $add_days=$inner*121-1; 
					if($inner>0)
					{
						$add_days=$inner*120;
					}					
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*121+121-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Half Yearly')
                {
                    $add_days=$inner*183-1; 
					if($inner>0)
					{
						$add_days=$inner*183;
					}					
					
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*183+183-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }
                

                if($target_period=='Yearly')
                {
                    $add_days=$inner*365-1; 
					if($inner>0)
					{
						$add_days=$inner*365;
					}					
										
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*365+365-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                

                $insert_array=array(
                    'org_id'=>$org_id,
                    'project_id'=>$related_pid,
                    'target_period'=>$target_period,
                    'p_auto_id'=>$p_auto_id,
                    'start_date'=>$startdate_new,
                    'end_date'=>$enddate_new,
                    'p_auto_id'=>$p_auto_id,

                    
                    'dir_createddate'=>$date,
                    'pointer'=>$pointer,
                    
                    
                    

                    
                );
                $pointer++;
                $this->db->insert("tbl_project_management_task",$insert_array);

            }

    
	}

    public function get_project_manager()
    {
        $org_id=$this->session->org_id;
       return $this->db->query("SELECT tbl_project_management.project_id as pid, tbl_project_management.p_auto_id as id, tbl_admin_login.name as managername, tbl_project_management.project_name as projectname, tbl_project_management.status as status, tbl_customer.company_name as client
       FROM tbl_project_management
       INNER JOIN tbl_admin_login
       ON tbl_project_management.project_manager=tbl_admin_login.id
       INNER JOIN tbl_customer
       ON tbl_customer.customer_id=tbl_project_management.client 
       WHERE tbl_project_management.org_id = $org_id AND tbl_project_management.delete_status=0");
    }

    public function project_details($pautoid)
    {
       return $this->db->query("SELECT  
       tbl_project_management.project_id as pid, 
       tbl_project_management.project_name as pname, 
       tbl_project_management_task.p_auto_id as pautoid, 
       tbl_project_management_task.start_date as sdate,
       tbl_project_management_task.end_date as edate,
       tbl_project_management_task.target_period as targetperiod,
       tbl_project_management_task.pointer as pointer,
       tbl_project_management_task.project_task_id as project_task_id
              
          FROM tbl_project_management
          INNER JOIN tbl_project_management_task 
          ON tbl_project_management_task.project_id = tbl_project_management.project_id
          WHERE tbl_project_management_task.project_id  = $pautoid");
    }

   

    public function getd($project_task_id) 
    {
        $this->db->where('project_task_id',$project_task_id);
        return $this->db->get('tbl_project_management_task')->result();
        
    }

    public function adddays($project_task_id,$adddays)
    {
        
        //updating first row of end date
        $mainvalues = $this->db->query("SELECT end_date as ed , project_id as project_id FROM tbl_project_management_task WHERE project_task_id = $project_task_id")->row();
        $daten = $mainvalues->ed;
        $get_project_id = $mainvalues->project_id;

        $newdate = date('Y-m-d', strtotime($daten. ' + '.$adddays.' days'));

        $this->db->set('end_date',$newdate);
        $this->db->where('project_task_id',$project_task_id);
        $this->db->update('tbl_project_management_task');    
        //--------------------



        //id of starting frequency
        $starting_frequency = $project_task_id+1;

        //id of ending frequency
        $lastid = $this->db->query("SELECT project_task_id as project_task_id FROM tbl_project_management_task WHERE project_id = $get_project_id ORDER BY project_id DESC LIMIT 1")->row();
        $ending_frequency = $lastid->project_task_id;

         $result = $this->db->query("SELECT * FROM tbl_project_management_task WHERE project_task_id BETWEEN $starting_frequency AND $ending_frequency")->result();
       
         foreach($result as $row1){
             $sdate =  $row1->start_date;
             $edate =  $row1->end_date;
             $count = $row1->project_task_id;    

             $newsdate = date('Y-m-d', strtotime($sdate. ' + '.$adddays.' days'));
             $newedate = date('Y-m-d', strtotime($edate. ' + '.$adddays.' days'));

             $this->db->set('start_date',$newsdate);
             $this->db->set('end_date',$newedate);
             $this->db->where('project_task_id',$count);
             $this->db->update('tbl_project_management_task');
            
         }
         
    }


    public function project_details_main($pautoid)
    {
       $mainvalues = $this->db->query("SELECT DISTINCT
       tbl_project_management.project_id as pid,
        tbl_project_management.project_name as pname,
        tbl_project_management.status as pstatus,
        tbl_project_management.priority as ppriority,
        tbl_project_management.project_description as pdescription,
        tbl_project_management.rate as prate,
        tbl_project_management.per as pper,
        tbl_project_management.frequency as pfrequency,
        tbl_project_management_task.target_period as targetperiod,
        tbl_project_management.project_description as pdescription,
        tbl_project_management.recurring_count as precurringcount,
        tbl_project_management.start_date as sdate,
        tbl_project_management.end_date as edate,

        tbl_project_management.interested_in as pinterestedin,
        tbl_project_management.client as pclient,
        tbl_project_management.team as pteam,
        tbl_project_management.project_manager as pmanager
        



        
        FROM tbl_project_management
        INNER JOIN tbl_project_management_task 
        ON tbl_project_management.project_id = tbl_project_management_task.project_id
        WHERE tbl_project_management_task.project_id = $pautoid")->row();


              
          $pinterestedin=$mainvalues->pinterestedin;
          $pinterestedin=rtrim($pinterestedin,",");
          if(!empty($pinterestedin))
          {
              $interest_name="";
              $pinterestedin=$this->db->query(" SELECT `prdsrv_name` FROM `tbl_product_service_list` WHERE `prd_srv_id` IN($pinterestedin) ")->result();   
              foreach ($pinterestedin as  $ires)
              {
                $interest_name=$interest_name.' , '.$ires->prdsrv_name;
              }
             $interest_name=substr($interest_name,3);
          }
          else
          {
             $interest_name="";
          }

          $pteam=$mainvalues->pteam;
          $pteam=rtrim($pteam,",");
          if(!empty($pteam))
          {
              $team_name="";
              $team_name=$this->db->query(" SELECT `name` FROM `tbl_admin_login` WHERE `id` IN($pteam) ")->result();   
              foreach ($team_name as  $tres)
              {
                $team_name=$team_name.' , '.$tres->name;
              }
             $team_name=substr($team_name,7);
          }
          else
          {
             $team_name="";
          }

          $pmanager = $mainvalues->pmanager;
          $pmanager=rtrim($pmanager,",");
          if(!empty($pmanager))
          {
              $pmanager_name="";
              $pmanager_name=$this->db->query("SELECT `name` FROM `tbl_admin_login` WHERE `id` IN($pmanager) ")->result();  
              foreach ($pmanager_name as  $mres)
              {
                $pmanager_name=$pmanager_name.' , '.$mres->name;
              }
             $pmanager_name=substr($pmanager_name,7);
          }
          else
          {
             $pmanager_name="";
          }

          $pfrequencyid = $mainvalues->pfrequency;
          

          $pclient = $mainvalues->pclient;
          $pclient=rtrim($pclient,",");
          if(!empty($pclient))
          {
              $pclient_name="";
              $pclient_name=$this->db->query("SELECT `company_name` FROM `tbl_customer` WHERE `customer_id` IN($pclient) ")->result();  
              foreach ($pclient_name as  $cres)
              {
                $pclient_name=$pclient_name.' , '.$cres->company_name;
              }
             $pclient_name=substr($pclient_name,7);
          }
          else
          {
             $pclient_name="";
          }

         // $pid1 = $mainvalues->pid;
        
          $fixedenddate = $this->db->query("SELECT `end_date` as `ed` from tbl_project_management_task WHERE project_id = $pautoid and end_date= (select max(end_date) From tbl_project_management_task where project_id = $pautoid )")->row();
          $r = $fixedenddate->ed;
          $today = str_replace('/', '-', $r);
          $today = date('Y-m-d', strtotime($today));
          $nextday = date("Y-m-d", strtotime($today. "+1 day"));


        $NewArray=array(
            'pid'=>$mainvalues->pid,
            'pname'=>$mainvalues->pname,
            'pstatus'=>$mainvalues->pstatus,
            'ppriority'=>$mainvalues->ppriority,
            'pdescription'=>$mainvalues->pdescription,
            'prate'=>$mainvalues->prate,
            'pper'=>$mainvalues->pper,
            'pfrequency'=>$mainvalues->pfrequency,
            'targetperiod'=>$mainvalues->targetperiod,
            'pdescription'=>$mainvalues->pdescription,
            'precurringcount'=>$mainvalues->precurringcount,
            'sdate'=>$mainvalues->sdate,
            'edate'=>$mainvalues->edate,
            'pinterestedin'=>$interest_name,
            'pteam'=>$team_name,
            'pmanager_name'=>$pmanager_name,
            'pclient_name'=>$pclient_name,
            'pmanager'=>$pmanager,
            'pclient'=>$pclient,
            'pfrequencyid'=>$pfrequencyid,
            'projectenddate'=>$nextday

            
        ); 

       return $NewArray;
        // var_dump($NewArray);
        //exit;
        
    }

    public function new_frequency($project_id,$target_period,$end_date,$frequency,$recurring_cnt,$start_date)
    {
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $date=date("Y-m-d H:i:s");

        $start_date_m=date('Y-m-d', strtotime($start_date1));
        $end_date_m=date('Y-m-d',  strtotime($end_date1));

        $cur_date=date("Ymd"); 
        $Prefix="P-".$cur_date.'-';
        $this->db->select('p_auto_id');
        $this->db->order_by('p_auto_id','DESC');
        $result = $this->db->get('tbl_project_management')->row();
        if(!empty($result->p_auto_id))
        {
            $pre_date = explode('-', $result->p_auto_id);        
            $previous_date = $pre_date[1]; 
            $ticket_no = $pre_date[2]; 
            if ($previous_date==$cur_date) 
            {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                // $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $p_auto_id=$Prefix.$ticket_no1;
            }
            else
            {
                $p_auto_id=$Prefix.'001';
            }
        }
        else
        {
             $p_auto_id=$Prefix.'001';
        }

        $pointer = $this->db->query("SELECT `pointer` as pointer from tbl_project_management_task where project_id = $project_id and pointer= (select max(pointer) From tbl_project_management_task where project_id = $project_id )")->row();
        
        $new_pointer = $pointer->pointer + 1;

        
        for($inner=0;$inner<$recurring_cnt;$inner++)
            {

                if($target_period=='Daily')
                {
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
                }

                if($target_period=='Weekly')
                {
                    $add_days=$inner*7-1; 
					if($inner>0)
					{
						$add_days=$inner*7;
					}
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*7+7-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Fortnightly')
                {
                    $add_days=$inner*15-1; 
					if($inner>0)
					{
						$add_days=$inner*15;
					}
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*15+15-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Monthly')
                {
                    $add_days=$inner*30-1; 
					if($inner>0)
					{
						$add_days=$inner*30;
					}
										
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*30+30-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Quarterly')
                {
                    $add_days=$inner*121-1; 
					if($inner>0)
					{
						$add_days=$inner*120;
					}					
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*121+121-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                if($target_period=='Half Yearly')
                {
                    $add_days=$inner*183-1; 
					if($inner>0)
					{
						$add_days=$inner*183;
					}					
					
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*183+183-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }
                

                if($target_period=='Yearly')
                {
                    $add_days=$inner*365-1; 
					if($inner>0)
					{
						$add_days=$inner*365;
					}					
										
					
                    if($add_days<0)
                    {
                        $add_days=0;
                    }
                    $add_days_new=$inner*365+365-1; 
                    $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                    $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
                }

                $insert_array=array(
                    'org_id'=>$org_id,
                    'project_id'=>$project_id,
                    'target_period'=>$target_period,
                    'start_date'=>$startdate_new,
                    'end_date'=>$enddate_new,
                    'p_auto_id'=>$p_auto_id,
                    'dir_createddate'=>$date,
                    'pointer'=>$new_pointer,
                    'updated_date'=>$enddate_new
                );
                
                $this->db->insert("tbl_project_management_task",$insert_array);
                $new_pointer++;
            }

        
    }


    public function update_project($start_date,$end_date,$recurring_cnt,$ProjectName,$ClientName,$InterestesIn,$StatusType,
    $PriorityType,$Rate,$Per,$ProjectManager,$frequency,$target_period,$ProjectDescription,$Team,$project_id)
    {
        $org_id=$this->session->org_id;

        // $this->db->query("DELETE FROM tbl_project_management WHERE project_id = $project_id");
        $this->db->query("DELETE FROM tbl_project_management_task WHERE project_id = $project_id");

        
        

        

        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $date=date("Y-m-d H:i:s");

        $start_date_m=date('Y-m-d', strtotime($start_date1));
        $end_date_m=date('Y-m-d',  strtotime($end_date1));

        $bussiness = $Team;
        $bussiness_id = "";
        for ($i = 0; $i < count($bussiness); $i++) {
            $bussiness_id = $bussiness_id . $bussiness[$i] . ",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1)) {
            $nTeam = '0';
        } else {
            $nTeam = $buss_id1;
        }

      
        $cur_date=date("Ymd"); 
        $Prefix="P-".$cur_date.'-';
        $this->db->select('p_auto_id');
        $this->db->order_by('p_auto_id','DESC');
        $result = $this->db->get('tbl_project_management')->row();
        if(!empty($result->p_auto_id))
        {
            $pre_date = explode('-', $result->p_auto_id);        
            $previous_date = $pre_date[1]; 
            $ticket_no = $pre_date[2]; 
            if ($previous_date==$cur_date) 
            {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                // $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $p_auto_id=$Prefix.$ticket_no1;
            }
            else
            {
                $p_auto_id=$Prefix.'001';
            }
        }
        else
        {
             $p_auto_id=$Prefix.'001';
        }

        
        $insert_array=array(
            
            'project_name'=>$ProjectName,
            'client'=>$ClientName,
            'status'=>$StatusType,
            'priority'=>$PriorityType,
            'rate'=>$Rate,
            'per'=>$Per,
            'project_manager'=>$ProjectManager,
            'team'=>$nTeam,
            'project_description'=>$ProjectDescription,
            
            'frequency'=>$frequency,
            'interested_in'=>$InterestesIn,
            'recurring_count'=>$recurring_cnt,
            'start_date'=>$start_date_m,
            'end_date'=>$end_date_m,
        );

        $related_pid = $this->input->post('project_id');
        $this->db->where('project_id',$related_pid);
        $this->db->update("tbl_project_management",$insert_array);
           
        $pointer = $this->db->query("SELECT `pointer` as pointer from tbl_project_management_task where project_id = $project_id and pointer= (select max(pointer) From tbl_project_management_task where project_id = $project_id )")->row();
        $new_pointer = $pointer->pointer + 1;

        for($inner=0;$inner<$recurring_cnt;$inner++)
        {

            if($target_period=='Daily')
            {
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$inner.' days'));
            }

            if($target_period=='Weekly')
            {
                $add_days=$inner*7-1; 
                if($inner>0)
                {
                    $add_days=$inner*7;
                }
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*7+7-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }

            if($target_period=='Fortnightly')
            {
                $add_days=$inner*15-1; 
                if($inner>0)
                {
                    $add_days=$inner*15;
                }
                
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*15+15-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }

            if($target_period=='Monthly')
            {
                $add_days=$inner*30-1; 
                if($inner>0)
                {
                    $add_days=$inner*30;
                }
                                    
                
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*30+30-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }

            if($target_period=='Quarterly')
            {
                $add_days=$inner*121-1; 
                if($inner>0)
                {
                    $add_days=$inner*120;
                }					
                
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*121+121-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }

            if($target_period=='Half Yearly')
            {
                $add_days=$inner*183-1; 
                if($inner>0)
                {
                    $add_days=$inner*183;
                }					
                
                
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*183+183-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }
            

            if($target_period=='Yearly')
            {
                $add_days=$inner*365-1; 
                if($inner>0)
                {
                    $add_days=$inner*365;
                }					
                                    
                
                if($add_days<0)
                {
                    $add_days=0;
                }
                $add_days_new=$inner*365+365-1; 
                $startdate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days.' days'));
                $enddate_new=date('Y-m-d', strtotime($startdate. ' + '.$add_days_new.' days'));
            }

            

            $insert_array=array(
                'org_id'=>$org_id,
                'project_id'=>$related_pid,
                'target_period'=>$target_period,
                'p_auto_id'=>$p_auto_id,
                'start_date'=>$startdate_new,
                'end_date'=>$enddate_new,
                'pointer'=>$new_pointer,
                'updated_date'=>$enddate_new
                                );
            $this->db->insert("tbl_project_management_task",$insert_array);
            $new_pointer++;

        }

    

    }

    public function team_list($ProjectId)
    {
        $mainvalues = $this->db->query("SELECT 
        tbl_project_management.team as pteam
        FROM tbl_project_management
        INNER JOIN tbl_project_management_task 
        ON tbl_project_management.project_id = tbl_project_management_task.project_id
        WHERE tbl_project_management_task.project_id = $ProjectId")->row();

        $pteam=$mainvalues->pteam;
        $pteam=rtrim($pteam,",");
        if(!empty($pteam))
        {
            $team_name="";
           return $this->db->query(" SELECT `name`,`id` FROM `tbl_admin_login` WHERE `id` IN($pteam) ")->result();   
            
        
        }
        else
        {
        $team_name="";
        }

       
    }

    public function delete_project($project_id)
    {
        $this->db->query("UPDATE `tbl_project_management` SET `delete_status` = 1 WHERE `project_id` = $project_id");
        $this->db->query("DELETE FROM `tbl_project_management_task` WHERE `project_id` = $project_id");

    }

    public function addnewtask($parent_task_id,$task_name)
    {
        $this->db->query("INSERT INTO tbl_project_management_task (`dir_parentid`,`task_name`) VALUES ('$parent_task_id','$task_name')");
    }

    public function get_project_name($ProjectId)
    {
        $result = $this->db->query("SELECT `project_name` AS `pname`, `project_id` AS `pid` FROM `tbl_project_management` WHERE `project_id` = $ProjectId")->row();
        $project_name =  $result->pname;
        $show_array = array(
            'pname' =>$project_name,
            'pid' => $result->pid,
        );
        
        return $show_array;
    }

    // public function Insertnew_Actvity($new_task_id,$new_task_name,
    // $company_name,$employee_id,$schedule_date,$schedule_start_time,$schedule_end_time,$schedule_type,$query)
    // {
    //     $org_id = $this->session->org_id;

    //     $date = date("Y-m-d H:i:s");

    //     $schd_date1 = str_replace(',', ' ', $schedule_date);
    //     $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
    //     $conv_date = date("Ymd", strtotime($schd_date1));
        
    //     $insert_array=array(
    //         'org_id' =>$org_id,
    //         'activity_id'=>$new_task_id,
    //         'activity_name'=>$new_task_name,
    //         'product_name'=>$new_task_name,
    //         'assign_starttime'=>$schedule_start_time,
    //         'assign_endtime'=>$schedule_end_time,
    //         'created_date'=>$date,
    //         'assign_date'=> $conv_date,
    //         'issue'=>$query,
    //         'type'=>'PM',
    //         'customer_id'=>$company_name,
    //         'assign_to'=>$employee_id,
            
    //                         );
                            
    //         $insert_array1=array(
    //                     'org_id' =>$org_id,
    //                     'activity_name'=>$new_task_name,
    //                     'dir_parentactivityid'=>$new_task_id,
    //                         );
    //         $insert_array2 = array(
    //             'org_id' =>$org_id,
    //             'created_by'=>$org_id,
    //             'schedule_assign_to' => $employee_id,
    //             'created_date'=>$date,
    //             'assign_starttime'=>$schedule_start_time,
    //             'assign_endtime'=>$schedule_end_time
    //         );
    //     $this->db->insert("tbl_user_query",$insert_array);
    //     $this->db->insert("tbl_schedule",$insert_array2);

    //     $this->db->insert("tbl_project_management_task",$insert_array1);

 
    // }

    public function get_client_id($ProjectId)
    {
        $client_id = $this->db->query("SELECT client FROM `tbl_project_management` WHERE `project_id` = '$ProjectId'")->row();
        
        $show_array = array(
            'Client_id' => $client_id->client,
        );

        return $show_array;
    }

    public function Insertnew_Actvity($new_task_id,$new_task_name,
    $company_name,$project_name,$employee_id,$schedule_date,$schedule_start_time,$schedule_end_time,$schedule_type,$query)
    {
        $org_id = $this->session->org_id;
        $schd_date1 = str_replace(',', ' ', $schedule_date);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $conv_date = date("Ymd", strtotime($schd_date1));

        $insert_array1=array(
                                'org_id' =>$org_id,
                                'activity_name'=>$new_task_name,
                                'dir_parentactivityid'=>$new_task_id,
                                    );
       $this->db->insert("tbl_project_management_task",$insert_array1);


       // $p_type = $formdata['priority_type'];
        $s_time = $schedule_start_time;
        $e_time = $schedule_end_time;
        $emp_id = $employee_id;
        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
        $available_count = $available->num_rows();

        if ($available_count == 0) {
            $created_by = $this->session->id;
            $date = date("Y-m-d H:i:s");
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($string) - 1;
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $string[mt_rand(0, $max)];
            }
            $salt = $token;
            $schd_date1 = str_replace(',', ' ', $schedule_date);
            $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

            $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' order by schedule_id desc ")->row();
            if (!empty($result->ticket_no)) {
                $explode = explode('S_', $result->ticket_no);
                $string = $explode[1];
                $db1_date = explode('-', $string);
                $previous_date = $db1_date[0];
                $ticket_no = $db1_date[1];
                // $cur_date=date("Ymd");
                if ($previous_date == $conv_date) {
                    $ticket_no++;
                    $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                    $final_ticket_num = $conv_date . '-' . $ticket_no1;
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . $ticket_no1;
                } else {
                    $final_ticket_num = $conv_date . '-' . '001';
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
                }
            } else {
                // $cur_date=date("Ymd"); 
                $final_ticket_num = $conv_date . '-' . '001';
                $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            }

            $customer_id = $company_name;
            $product_id = $project_name;
            $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$project_name'")->row();
            $product_name = $pdr_name->prdsrv_name;
            $query = $query;
            $employee_id = $emp_id;
            $start_time = $schedule_start_time;
            $end_time = $schedule_end_time;
            $schedule_type_id = $schedule_type;

            $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`,`activity_id`,`activity_name`,`type`) VALUES ('$org_id','$customer_id','$project_name','$final_ticket_num','$new_task_name','$query','$employee_id','$p_type','$schedule_date1','$new_task_id','$new_task_name','PM')");
            $insert_id = $this->db->insert_id();
            if ($data) {
                if ($this->session->user_type != 'SA') {
                    $schedule_type = "Own";
                } else {
                    $schedule_type = "Task";
                }

                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
                $schedule_insert_id = $this->db->insert_id();
                $TaskArray = array(
                    'employee_id' => $emp_id,
                    'org_id' => $this->session->org_id,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'query_id' => $insert_id,
                    'schedule_id' => $schedule_insert_id,
                    'ticket_no' => $final_ticket_num,
                    'remark' => $query,
                    'status' => 'pending',
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->db->Insert("tbl_task_status", $TaskArray);
                //======================= sending notification to employee regarding assign issue ===============

                $this->db->select("company_name");
                $this->db->where("customer_id", $customer_id);
                $CustData = $this->db->get("tbl_customer")->row();

                $this->db->where("query_id", $insert_id);
                $ScheduleData = $this->db->get("tbl_user_query")->row();

                $this->db->where("schedule_id", $schedule_insert_id);
                $QueryData = $this->db->get("tbl_schedule")->row();

                $sche_date = date("d M, Y", strtotime($schedule_date1));
                $sche_time = date("H:ia", strtotime($start_time)) . ' TO ' . date("H:ia", strtotime($end_time));

                $this->db->select("name");
                $this->db->where("id", $QueryData->created_by);
                $EmpData = $this->db->get("tbl_admin_login")->row();

                $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id' ")->row();
                $android_id = $data2->android_id;
                $name = $data2->name;
                // $android_id = $data3->android_id;
                $notification_date = date("Y-m-d H:i:s");
                $notification_msg = "Allocated new task and ticket no.is " . $final_ticket_num;
                $date = date("Y-m-d H:i:s");
                $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','pending','$date')");
                $notification_id = $this->db->insert_id($res);
                $reg_token = $android_id;

                $data = array('server_notification' => "employee_task_allocated", 'message' => ' You have been allocated new task for ' . $CustData->company_name . ' assigned by ' . $EmpData->name . ' click here for more details', 'query_id' => $insert_id, 'notification_id' => $notification_id, 'ticket_no' => $ScheduleData->ticket_no, 'company_name' => $CustData->company_name, 'product' => $ScheduleData->product_name, 'assigned_by' => $EmpData->name, 'priority' => $ScheduleData->priority, 'remark' => $ScheduleData->issue, 'date' => $sche_date, 'time' => $sche_time);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {

                    $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $android_id = $data3->android_id;
                    $contact_person_name1 = $data2->contact_person_name1;
                    // ----------------- Insertinf notification to table ---------------------------
                    $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                    $date = date("Y-m-d H:i:s");

                    $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                    $notification_id1 = $this->db->insert_id($res1);
                    // ----------------- Insertinf notification to table ---------------------------
                    $reg_token = $android_id;
                    $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1, 'date' => $sche_date, 'time' => $sche_time);
                    $target = $reg_token;
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                    $fields = array();
                    $fields['data'] = $data;
                    if (is_array($target)) {
                        $fields['registration_ids'] = $target;
                    } else {
                        $fields['to'] = $target;
                    }
                    $headers = array(
                        'Content-Type:application/json',
                        'Authorization:key=' . $server_key
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                    $result = curl_exec($ch);
                    if ($result === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    } else {
                        $notification_date = date("Y-m-d", strtotime($schedule_date1));
                        $this->db->set('assign_to', $employee_id);
                        $this->db->where('query_id', $insert_id);
                        $this->db->update('tbl_user_query');
                        echo 1;
                    }
                    curl_close($ch);
                }
                curl_close($ch);
            } else {
            }
        } else {
            echo "2";
        }
 
    }

    public function add_schedule_overright_ac($new_task_id,$new_task_name,
    $company_name,$project_name,$employee_id,$schedule_date,$schedule_start_time,$schedule_end_time,$schedule_type,$query)
    {
        $org_id = $this->session->org_id;
        $schd_date1 = str_replace(',', ' ', $schedule_date);
        $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
        $conv_date = date("Ymd", strtotime($schd_date1));

        


       // $p_type = $formdata['priority_type'];
        $s_time = $schedule_start_time;
        $e_time = $schedule_end_time;
        $emp_id = $employee_id;
        $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
        $available_count = $available->num_rows();

        if ($available_count == 0) {
            $created_by = $this->session->id;
            $date = date("Y-m-d H:i:s");
            $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($string) - 1;
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $string[mt_rand(0, $max)];
            }
            $salt = $token;
            $schd_date1 = str_replace(',', ' ', $schedule_date);
            $schedule_date1 = date("Y-m-d", strtotime($schd_date1));

            $result = $this->db->query("SELECT ticket_no FROM tbl_schedule where assign_date='$schedule_date1' order by schedule_id desc ")->row();
            if (!empty($result->ticket_no)) {
                $explode = explode('S_', $result->ticket_no);
                $string = $explode[1];
                $db1_date = explode('-', $string);
                $previous_date = $db1_date[0];
                $ticket_no = $db1_date[1];
                // $cur_date=date("Ymd");
                if ($previous_date == $conv_date) {
                    $ticket_no++;
                    $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                    $final_ticket_num = $conv_date . '-' . $ticket_no1;
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . $ticket_no1;
                } else {
                    $final_ticket_num = $conv_date . '-' . '001';
                    $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
                }
            } else {
                // $cur_date=date("Ymd"); 
                $final_ticket_num = $conv_date . '-' . '001';
                $schedule_ticket_num = 'S_' . $conv_date . '-' . '001';
            }

            $customer_id = $company_name;
            $product_id = $project_name;
            $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$project_name'")->row();
            $product_name = $pdr_name->prdsrv_name;
            $query = $query;
            $employee_id = $emp_id;
            $start_time = $schedule_start_time;
            $end_time = $schedule_end_time;
            $schedule_type_id = $schedule_type;

            $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`,`assign_date`,`activity_id`,`activity_name`,`type`) VALUES ('$org_id','$customer_id','$project_name','$final_ticket_num','$new_task_name','$query','$employee_id','$p_type','$schedule_date1','$new_task_id','$new_task_name','PM')");
            $insert_id = $this->db->insert_id();
            if ($data) {
                if ($this->session->user_type != 'SA') {
                    $schedule_type = "Own";
                } else {
                    $schedule_type = "Task";
                }

                $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date')");
                $schedule_insert_id = $this->db->insert_id();
                $TaskArray = array(
                    'employee_id' => $emp_id,
                    'org_id' => $this->session->org_id,
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'query_id' => $insert_id,
                    'schedule_id' => $schedule_insert_id,
                    'ticket_no' => $final_ticket_num,
                    'remark' => $query,
                    'status' => 'pending',
                    'created_date' => date("Y-m-d H:i:s")
                );
                $this->db->Insert("tbl_task_status", $TaskArray);
                //======================= sending notification to employee regarding assign issue ===============

                $this->db->select("company_name");
                $this->db->where("customer_id", $customer_id);
                $CustData = $this->db->get("tbl_customer")->row();

                $this->db->where("query_id", $insert_id);
                $ScheduleData = $this->db->get("tbl_user_query")->row();

                $this->db->where("schedule_id", $schedule_insert_id);
                $QueryData = $this->db->get("tbl_schedule")->row();

                $sche_date = date("d M, Y", strtotime($schedule_date1));
                $sche_time = date("H:ia", strtotime($start_time)) . ' TO ' . date("H:ia", strtotime($end_time));

                $this->db->select("name");
                $this->db->where("id", $QueryData->created_by);
                $EmpData = $this->db->get("tbl_admin_login")->row();

                $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id' ")->row();
                $android_id = $data2->android_id;
                $name = $data2->name;
                // $android_id = $data3->android_id;
                $notification_date = date("Y-m-d H:i:s");
                $notification_msg = "Allocated new task and ticket no.is " . $final_ticket_num;
                $date = date("Y-m-d H:i:s");
                $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','pending','$date')");
                $notification_id = $this->db->insert_id($res);
                $reg_token = $android_id;

                $data = array('server_notification' => "employee_task_allocated", 'message' => ' You have been allocated new task for ' . $CustData->company_name . ' assigned by ' . $EmpData->name . ' click here for more details', 'query_id' => $insert_id, 'notification_id' => $notification_id, 'ticket_no' => $ScheduleData->ticket_no, 'company_name' => $CustData->company_name, 'product' => $ScheduleData->product_name, 'assigned_by' => $EmpData->name, 'priority' => $ScheduleData->priority, 'remark' => $ScheduleData->issue, 'date' => $sche_date, 'time' => $sche_time);
                $target = $reg_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                $fields = array();
                $fields['data'] = $data;
                if (is_array($target)) {
                    $fields['registration_ids'] = $target;
                } else {
                    $fields['to'] = $target;
                }
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                } else {

                    $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                    $android_id = $data3->android_id;
                    $contact_person_name1 = $data2->contact_person_name1;
                    // ----------------- Insertinf notification to table ---------------------------
                    $notification_msg = "Your issue " . $final_ticket_num . " is assign to " . $name;
                    $date = date("Y-m-d H:i:s");

                    $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                    $notification_id1 = $this->db->insert_id($res1);
                    // ----------------- Insertinf notification to table ---------------------------
                    $reg_token = $android_id;
                    $data = array('server_notification' => "customer_query_allocated", 'message' => 'Your issue ' . $final_ticket_num . ' is assign to ' . $name, 'query_id' => $insert_id, 'notification_id' => $notification_id1, 'date' => $sche_date, 'time' => $sche_time);
                    $target = $reg_token;
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                    $fields = array();
                    $fields['data'] = $data;
                    if (is_array($target)) {
                        $fields['registration_ids'] = $target;
                    } else {
                        $fields['to'] = $target;
                    }
                    $headers = array(
                        'Content-Type:application/json',
                        'Authorization:key=' . $server_key
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

                    $result = curl_exec($ch);
                    if ($result === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    } else {
                        $notification_date = date("Y-m-d", strtotime($schedule_date1));
                        $this->db->set('assign_to', $employee_id);
                        $this->db->where('query_id', $insert_id);
                        $this->db->update('tbl_user_query');
                        echo 1;
                    }
                    curl_close($ch);
                }
                curl_close($ch);
            } else {
            }
        } else {
            echo "2";
        }
 
    }
 
}



	
