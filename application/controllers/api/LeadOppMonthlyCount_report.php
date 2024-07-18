<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class LeadOppMonthlyCount_report extends REST_Controller 
{
	function __construct()
	{
        parent::__construct();
    }
    public function index_post()
    {
        $final_array=array();
        $org_id=$this->input->post('org_id');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        $emp_id=$this->input->post('emp_id');
        $type=$this->input->post('type');

        if($emp_id!='')
        {
            $this->db->where("assign_to",$emp_id);
        }

        if($type=='')
        {
            $type_array=array('Lead','Opportunity');
        }
        else
        {
            $type_array=array($type);
        } 
    
        $start    = (new DateTime($start_date))->modify('first day of this month');
        $end      = (new DateTime($end_date))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) 
        {
            $month=$dt->format("m");
            $year=$dt->format("Y");

            for($a=0;$a<count($type_array);$a++)
            {
                $customer_type=$type_array[$a];
                $where_array3 = array('org_id' => $org_id,'customer_type' => $customer_type,'MONTH(created_date)' => $month,'YEAR(created_date)' => $year);                
                $this->db->where($where_array3);       
                $query_res=$this->db->get('tbl_leads_opportunity')->result();

                $pass_date=$year.'-'.$month.'-01';
                $month_name=date("F",strtotime($pass_date));
                $new_array=array(
                                    'customer_type'=>$customer_type, 
                                    'month'=>$month, 
                                    'month_name'=>$month_name,
                                    'year'=>$year, 
                                    'pass_date'=>$year.'-'.$month.'-01', 
                                    'total'=>count($query_res),
                                );

                if(!empty($new_array))
                {
                    array_push($final_array,$new_array);
                }  
            }
        } 

        if(!empty($final_array))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'Lead Opportunity Monthly Count Data Fetched Successfully',
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