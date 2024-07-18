<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class EmployeeTargetList_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
       
        $org_id=$this->input->post('org_id');
        $emp_id = $this->input->post('emp_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $target_type = $this->input->post('target_type');  

        if($target_type!='')
        {
            if($target_type == 'All')
            {

            }
            else
            {
                $this->db->where("targettype_id",$target_type);            
            }
           
        }
        $this->db->where("status",1);
        $this->db->where("delete_status",0);
        $this->db->where("org_id",$org_id);
        $this->db->order_by("target_type",'ASC');
        $Target=$this->db->get("tbl_target_type")->result();
        foreach ($Target as  $res) 
        {  
            $targettype_id=$res->targettype_id;

            if($emp_id!='')
            {
                // $emp_id1=substr($emp_id,0,-1);
                
                $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and start_date>='$start_date' and   start_date<='$end_date' and employee_id  IN($emp_id)  ")->result();
            }
            else
            {
                $TargetValue=$this->db->query(" SELECT * FROM `tbl_target` WHERE  `targettype_id` = '$targettype_id' and   start_date<='$end_date'  ")->result();  
            }

            if(count($TargetValue)>0)
            {
                $Totalvalue=0; 
                        
                foreach ($TargetValue as  $val) 
                {
                    
                    $employee_id=$val->employee_id;
                    $Totalvalue=$Totalvalue+$val->target_value;
                    $tr_auto_id=$val->tr_auto_id;

                    $AchieveValue=$this->db->query("SELECT * FROM `tbl_target_achieve_list` WHERE  `targettype_id` = '$targettype_id' and   employee_id='$employee_id' and tr_auto_id='$tr_auto_id'  ")->result();

                    

                    if(count($AchieveValue)>0)
                    {

                        $TotalAchieveValue=0;           
                        foreach ($AchieveValue as  $achieve) 
                        {
                            if($achieve->targettype_value == 'null')
                            {
                                $achieve_targettype_value = 0;
                            }
                            else
                            {
                                $achieve_targettype_value = $achieve->targettype_value;
                            }
                            $TotalAchieveValue=$TotalAchieveValue+$achieve_targettype_value;
                        }        
                        $Balance=$Totalvalue-$TotalAchieveValue;

                        $this->db->select("name");
                        $this->db->where("id",$employee_id);
                        $EmpDetails=$this->db->get("tbl_admin_login")->row();

                        if(!empty($EmpDetails))
                        {
                            $EmpDetails_name = $EmpDetails->name;
                        }
                        else
                        {
                            $EmpDetails_name = '';
                        }

                        $NewArray=array(
                                        'TargetName'=>$res->target_type,
                                        'employee_id'=>$employee_id,
                                        'targettype_id'=>$res->targettype_id,
                                        'TargetAmount'=>$Totalvalue,
                                        'target_period'=>$val->target_period,
                                        'TargetAchieved'=>$TotalAchieveValue,
                                        'TargetBalance'=>$Balance,
                                        'TargetDAR'=>0,
                                        'emp_name'=>$EmpDetails_name,                                       
                                        'TargetSdate'=>$start_date,
                                        'TargetEdate'=>$end_date,
                                    );
                        array_push($final_array, $NewArray);
                    }
                }
            }
        }

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Employee Target List Data Fetched Successfully',
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