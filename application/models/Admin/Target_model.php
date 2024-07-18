<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_model extends CI_Model {

	public function __construct() 
    {
          parent::__construct();
          //echo 'Hello World2';
     }

    public function target_list() 
    {
        $org_id=$this->session->org_id;
        $data = $this->db->query("SELECT distinct target_id,tr_auto_id, targettype_id, target_period, start_date, end_date, date_created FROM `tbl_target` WHERE org_id='$org_id' and  `status`!='2' GROUP BY tr_auto_id, targettype_id, target_period, start_date, end_date, date_created ORDER BY target_id DESC ");
        $target_array=array();
        foreach ($data->result() as $value) 
        {
                $tr_auto_id = $value->tr_auto_id;
                $data1 = $this->db->query("SELECT distinct(employee_id) FROM `tbl_target` WHERE `tr_auto_id`='$tr_auto_id' ");
                // $emp_result = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'");
                $employee_array='';
                foreach ($data1->result() as $value1) 
                {
                    $employee_id = $value1->employee_id;
                    $emp_result = $this->db->query("SELECT distinct(name) FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                    $employee_array=$employee_array.$emp_result->name.",";
                }
                $emp_list = trim($employee_array, ',');

                $targettype_id = $value->targettype_id;
                $data1 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
                $target_type = $data1->target_type;

                $arr = array
                (
                    'target_id'=> $value->target_id,
                    'target_period'=> $value->target_period,
                    'tr_auto_id'=> $tr_auto_id,
                    'target_type'=> $target_type,
                    'start_date'=> $value->start_date,
                    'end_date'=> $value->end_date,
                    'emp_list'=> $emp_list,
                    'date_created'=> $value->date_created
                );
                array_push($target_array, $arr);
        }
        // print_r($target_array);
        return $target_array;
    }
// ===========================================  Archive Target ====================================================
    public function archive_target() 
    {
            $org_id=$this->session->org_id;
            $data = $this->db->query("SELECT distinct tr_auto_id, targettype_id, target_period, start_date, end_date, date_created FROM `tbl_target` WHERE org_id='$org_id' and  `status`='2' GROUP BY tr_auto_id, targettype_id, target_period, start_date, end_date, date_created ORDER BY target_id DESC");
            $target_array=array();
            foreach ($data->result() as $value) 
            {
                    $tr_auto_id = $value->tr_auto_id;
                    $data1 = $this->db->query("SELECT employee_id FROM `tbl_target` WHERE `tr_auto_id`='$tr_auto_id'");
                    // $emp_result = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'");
                    $employee_array='';
                    foreach ($data1->result() as $value1) 
                    {
                        $employee_id = $value1->employee_id;
                        $emp_result = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                        $employee_array=$employee_array.$emp_result->name.",";
                    }
                    $emp_list = trim($employee_array, ',');

                    $targettype_id = $value->targettype_id;
                    $data1 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id'")->row();
                    $target_type = $data1->target_type;

                    $arr = array
                    (
                        'target_id'=> $value->target_id,
                        'target_period'=> $value->target_period,
                        'tr_auto_id'=> $tr_auto_id,
                        'target_type'=> $target_type,
                        'start_date'=> $value->start_date,
                        'end_date'=> $value->end_date,
                        'emp_list'=> $emp_list,
                        'date_created'=> $value->date_created
                    );
                    array_push($target_array, $arr);
            }
            // print_r($target_array);
            return $target_array;
    }
// ===================================================================================================
    public function target_type_list()
    {
        $this->db->from('tbl_target_type');
        $this->db->order_by("targettype_id", "DESC");
        $this->db->where('status',1);
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        return $this->db->get();
    }

    public function getemployee_list($start_date,$end_date,$targettype_id,$tr_auto_id) 
    { 
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $data = $this->db->query("SELECT * FROM tbl_target WHERE ('$startdate' BETWEEN `start_date` AND `end_date` OR '$enddate' BETWEEN `start_date` AND `end_date`) AND `tr_auto_id`='$tr_auto_id' AND `status`!='2' and  org_id='$org_id' ");

        $target_array='';
        foreach ($data->result() as $value) 
        {
            $target_id = $value->target_id;
            $target_array=$target_array.$target_id.",";
        }
        $target_list = trim($target_array, ',');
        // echo "<pre>";
        // print_r($data);
        // die;
        if ($target_list!='') 
        {
            $data1 = $this->db->query("SELECT distinct employee_id  FROM `tbl_target` WHERE target_id IN ($target_list)  and org_id='$org_id' GROUP BY employee_id   ");

            $employee_array='';
            foreach ($data1->result() as $value1) 
            {
                $employee_array=$employee_array.$value1->employee_id.",";
            }
            $emp_list = trim($employee_array, ',');

            if($emp_list!='') 
            {
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE id NOT IN ($emp_list) AND `user_type`='E'  AND user_status=1  and org_id='$org_id' ");
                // print_r($emp_result->result());
            }
            else
            {
                // echo "All";
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  AND user_status=1  and org_id='$org_id'  ");
            }
        }
        else
        {
            // echo "All";
            return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  AND user_status=1 AND user_status=1  and org_id='$org_id'  ");
        }
    }


    public function getemployee_list1($start_date,$end_date,$targettype_id,$tr_auto_id) 
    {
         $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);
        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));

        // $start_date = date("Y-m-d", strtotime($start_date));
        // $end_date = date("Y-m-d", strtotime($end_date));

        $data = $this->db->query("SELECT * FROM `tbl_target` WHERE    org_id='$org_id' and  `targettype_id`='$targettype_id' AND `tr_auto_id` != '$tr_auto_id'  AND `status`!='2' AND ('$startdate' BETWEEN `start_date` AND `end_date` OR '$enddate' BETWEEN `start_date` AND `end_date`)");

        $target_array='';
        foreach ($data->result() as $value) 
        {
            $target_id = $value->target_id;
            $target_array=$target_array.$target_id.",";
        }
        $target_list = trim($target_array, ',');

        if ($target_list!='') 
        {
            $data1 = $this->db->query("SELECT distinct employee_id  FROM `tbl_target` WHERE  target_id IN ($target_list) GROUP BY employee_id");

            $employee_array='';
            foreach ($data1->result() as $value1) 
            {
                $employee_array=$employee_array.$value1->employee_id.",";
            }
             $emp_list = trim($employee_array, ',');

            if($emp_list!='') 
            {
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE id NOT IN ($emp_list) AND `user_type`='E' and  org_id='$org_id'  ");
                // print_r($emp_result->result());
            }
            else
            {
                // echo "All";
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  and  org_id='$org_id'  ");
            }
        }
        else
        {
            // echo "All";
            return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  and  org_id='$org_id'  ");
        }
    }

    public function get_uom($targettype_id)
    {
         $org_id=$this->session->org_id;
        return $this->db->query("SELECT tbl_target_type.uom_id, tbl_uom.uom_type FROM tbl_target_type INNER JOIN tbl_uom ON tbl_target_type.uom_id = tbl_uom.uom_id WHERE tbl_target_type.`targettype_id`='$targettype_id' and  tbl_target_type.org_id='$org_id'      ")->result();;
    }

    public function add_target($target_period,$start_date,$end_date,$targettype_id,$name_values,$res,$uom_id,$recurring_cnt) 
    {
        
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $date=date("Y-m-d H:i:s");
        
        $emp_id = implode(",",$name_values);

        $count = sizeof($name_values);
        
        $result = $this->db->query("SELECT tr_auto_id FROM tbl_target ORDER BY target_id DESC LIMIT 1;")->row();
        if ($result) 
        {
            $result1=$result->tr_auto_id;
            $pre_date = explode('-', $result1);
            // $previous_date = $pre_date[0]; // from table last date
            $previous_date = $pre_date[1]; // from table last date
            $tr_auto_id = $pre_date[2]; // from table last ticket no

            $cur_date=date("YmdHis"); // current date
            if ($previous_date==$cur_date) 
            {
                $tr_auto_id++;
                $ticket_no1 = str_pad($tr_auto_id, 3, '0', STR_PAD_LEFT);
                $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $target_auto_num='T-'.$cur_date.'-'.$ticket_no1;
            }
            else
            {
                $final_ticket_num=$cur_date.'-'.'001';
                $target_auto_num='T-'.$cur_date.'-'.'001';
            }
        }
        else
        {
            $cur_date=date("Ymd"); // current date
            $final_ticket_num=$cur_date.'-'.'001';
            $target_auto_num='T-'.$cur_date.'-'.'001';
        }
        
        for($i=0;$i<$count;$i++)
        {
            $employee_id=$name_values[$i];
            $taget_value1=$res[$i];
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
                                     'tr_auto_id'=>$target_auto_num,
                                     'targettype_id'=>$targettype_id,
                                     'uom_id'=>$uom_id,
                                     'target_period'=>$target_period,
                                     'start_date'=>$startdate_new,
                                     'end_date'=>$enddate_new,
                                     'employee_id'=>$employee_id,
                                     'target_value'=>$taget_value1,
                                     'date_created'=>$date,
                                     'updated_date'=>$date
                                  );
                $this->db->insert("tbl_target",$insert_array);

            }

            //$data = $this->db->query("INSERT INTO `tbl_target`(`org_id`,`tr_auto_id`, `targettype_id`,
             //`uom_id`,  `target_period`, `start_date`, `end_date`, `employee_id`,
           //   `target_value`, `date_created`, `updated_date`) VALUES 
        //('$org_id','$target_auto_num','$targettype_id','$uom_id','$target_period','$startdate','$enddate','$employee_id','$taget_value1','$date','$date')");           
       
        }
    }

    public function delete_target($targetid) 
    {
        $this->db->set('status',2);
        $this->db->where('tr_auto_id',$targetid);
        $this->db->update('tbl_target');

        // $this->db->where('targettype_id',$targettypeid);
        // $this->db->delete('tbl_target_type');
    }

    public function edit_target($targetid) 
    {
        $this->db->where('target_id',$targetid);
        return $this->db->get('tbl_target');
    }

    public function selected_employee_list($targetid) 
    {
        $org_id=$this->session->org_id;
        $data = $this->db->query("SELECT * FROM tbl_target WHERE `tr_auto_id`='$targetid' and org_id='$org_id'  ");
        $emp_array = array();
        foreach ($data->result() as $value) 
        {
           $employee_id = $value->employee_id;

           $data1 = $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
           $emp_name = $data1->name;
           $id = $data1->id;

           $targettype_id = $value->targettype_id;
           $data1 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id' and org_id='$org_id'    ")->row();
           $target_type = $data1->target_type;


            $arr = array(
                'emp_name'=>$emp_name,
                'emp_id'=>$id,
                'target_value'=>$value->target_value,
                'target_type'=>$target_type

            );
           array_push($emp_array, $arr);
        }
        return $emp_array;
    }

    public function employee_list($tr_auto_id) 
    {
        $org_id=$this->session->org_id;
        $data = $this->db->query("SELECT * FROM tbl_target WHERE `tr_auto_id`='$tr_auto_id' and org_id='$org_id' GROUP BY employee_id  ");
        $emp_array = array();
        foreach ($data->result() as $value) 
        {
           $employee_id = $value->employee_id;

           $data1 = $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
           $emp_name = $data1->name;
           $id = $data1->id;

           $targettype_id = $value->targettype_id;
           $data1 = $this->db->query("SELECT * FROM `tbl_target_type` WHERE `targettype_id`='$targettype_id' and org_id='$org_id'    ")->row();
           $target_type = $data1->target_type;


            $arr = array(
                'emp_name'=>$emp_name,
                'emp_id'=>$id,
                'target_value'=>$value->target_value,
                'target_type'=>$target_type

            );
           array_push($emp_array, $arr);
        }
        return $emp_array;
    }

    public function edit_add_target($start_date,$end_date,$targettype_id,$name_values,$res,$tr_auto_id,$date_created,$target_period,$recurring_cnt) 
    {
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);
        
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));

        // $start_date = date("Y-m-d", strtotime($start_date));
        // $end_date = date("Y-m-d", strtotime($end_date));
        $date=date("Y-m-d H:i:s");

        $created = str_replace(',', ' ', $date_created);
        $datecreated = date("Y-m-d", strtotime($created));
        // $date_created = date("Y-m-d", strtotime($date_created));


        $this->db->where('targettype_id',$targettype_id);
        $UOM_result = $this->db->get('tbl_target_type')->row();
        $uom_id = $UOM_result->uom_id;

        $this->db->where('tr_auto_id',$tr_auto_id);
        $this->db->delete('tbl_target');

        $emp_id = explode(",",$name_values);
        // print_r($emp_id);
        // print_r($taget_value);
        $count = sizeof($emp_id);
        for($i=0;$i<$count;$i++)
        {
            $employee_id=$emp_id[$i];
            $taget_value1=$res[$i];

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
                    'tr_auto_id'=>$tr_auto_id,
                    'targettype_id'=>$targettype_id,
                    'uom_id'=>$uom_id,
                    'target_period'=>$target_period,
                    'start_date'=>$startdate_new,
                    'end_date'=>$enddate_new,
                    'employee_id'=>$employee_id,
                    'target_value'=>$taget_value1,
                    'date_created'=>$datecreated,
                    'updated_date'=>$date
                );
                $this->db->insert("tbl_target",$insert_array);

            }






            // $data = $this->db->query("INSERT INTO `tbl_target`(`org_id`,`tr_auto_id`
            //     , `targettype_id`, `uom_id`, `target_period`, `start_date`, `end_date`, `employee_id`, 
            //     `target_value`, `date_created`, `updated_date`) VALUES ('$org_id','$tr_auto_id','$targettype_id','$uom_id','$target_period',
            //     '$startdate','$enddate','$employee_id','$taget_value1','$datecreated','$date')");

            // $this->db->query("INSERT INTO `tbl_target_employee`(`target_id`, `targettype_id`, `employee_id`, `target_value`) VALUES ('$insert_id','$targettype_id','$employee_id','$taget_value1')");

           // echo "<br>";
        }
        
    }


    // ============== Target type section ===================================

    public function target_type()
    {
        $this->db->select('tbl_target_type.*, tbl_uom.uom_type');
        $this->db->from('tbl_target_type');
        $this->db->join('tbl_uom', 'tbl_uom.uom_id = tbl_target_type.uom_id');
        // $this->db->where('tbl_target_type.status != ',2,FALSE);
        $this->db->where('tbl_target_type.org_id',$this->session->org_id);
        $this->db->where('tbl_target_type.delete_status',0);
        $this->db->order_by("tbl_target_type.targettype_id", "DESC");
        return $this->db->get();
    }

    public function add_targettype($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'target_type'=>$data['target_type'],
                      'org_id'=>$this->session->org_id,
                      'uom_id'=>$data['uom_type'],
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_target_type',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }


    public function delete_targettype($targettypeid) 
    {
        $this->db->set('delete_status',1);
        $this->db->where('targettype_id',$targettypeid);
        $this->db->update('tbl_target_type');
    }
  

    public function edit_targettype($targettypeid) 
    {
        $this->db->where('targettype_id',$targettypeid);
        return $this->db->get('tbl_target_type');
    }

    public function Edit_Add_targettype($data) 
    {
        $this->db->set('target_type',$data['target_type']);
        $this->db->set('uom_id',$data['uom_type']);
        $this->db->where('targettype_id',$data['targettype_id']);

        $data = $this->db->update('tbl_target_type');
        $data1 = $this->db->affected_rows($data) > 0;

        if($data1)
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function deactivate($id)
    {   
       $this->db->set('status',0);
       $this->db->where('targettype_id',$id);
       $this->db->update('tbl_target_type');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('targettype_id',$id);
        $this->db->update('tbl_target_type');
    }

    public function getallemployeefortargetliist($start_date,$end_date,$targettype_id)
    {
        $org_id=$this->session->org_id;
        $start_date1 = str_replace(',', ' ', $start_date);
        $end_date1 = str_replace(',', ' ', $end_date);
        $startdate = date("Y-m-d", strtotime($start_date1));
        $enddate = date("Y-m-d", strtotime($end_date1));
        $data = $this->db->query("SELECT * FROM tbl_target WHERE ('$startdate' BETWEEN `start_date` AND `end_date` OR '$enddate' BETWEEN `start_date` AND `end_date`) AND `targettype_id`='$targettype_id' AND `status`!='2' and  org_id='$org_id' ");

        $target_array='';
        foreach ($data->result() as $value) 
        {
            $target_id = $value->target_id;
            $target_array=$target_array.$target_id.",";
        }
        $target_list = trim($target_array, ',');

        if ($target_list!='') 
        {
            $data1 = $this->db->query("SELECT distinct employee_id  FROM `tbl_target` WHERE target_id IN ($target_list)  and org_id='$org_id' GROUP BY employee_id   ");

            $employee_array='';
            foreach ($data1->result() as $value1) 
            {
                $employee_array=$employee_array.$value1->employee_id.",";
            }
            $emp_list = trim($employee_array, ',');

            if($emp_list!='') 
            {
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE id NOT IN ($emp_list) AND `user_type`='E'  AND user_status=1  and org_id='$org_id' ");
                // print_r($emp_result->result());
            }
            else
            {
                // echo "All";
                return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  AND user_status=1  and org_id='$org_id'  ");
            }
        }
        else
        {
            // echo "All";
            return $this->db->query("SELECT name, id FROM `tbl_admin_login` WHERE `user_type`='E'  AND user_status=1 AND user_status=1  and org_id='$org_id'  ");
        }


    }


    // =============================================================


} ?>

