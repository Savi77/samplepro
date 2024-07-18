<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class View_expense_typewise_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
        $finalArray=array();
        $UserID = $this->input->post('user_id');
        $type = $this->input->post('type');
        $this->db->order_by("tbl_expense_details.DateCreated","DESC");
        $this->db->where("tbl_expense_details.Status",$type);
        $this->db->where("tbl_expense_details.org_id",$org_id);
        $this->db->where("tbl_expense_details.UserID",$UserID);
        $this->db->select('tbl_expense_master.expense_name, tbl_expense_details.*')
                ->from('tbl_expense_details')
                ->join('tbl_expense_master', 'tbl_expense_details.ExpenseID = tbl_expense_master.expense_id');
        $expense_array=$this->db->get()->result();
        
        $finalArrayInner=array();
        if(!empty($expense_array))
        {
            foreach ($expense_array as  $value) 
            {
                $this->db->where("REFID",$value->REFID);
                $employee_expense=$this->db->get("tbl_employee_expense")->row();

                $this->db->select("name");
                $this->db->where("id",$value->approved_by);
                $employee=$this->db->get("tbl_admin_login")->row();
                if(!empty($employee))
                {
                $name = $employee->name;
                }
                else
                {
                    $name = '';
                }

                $this->db->select("name");
                $this->db->where("id",$value->rejected_by);
                $employee_rej=$this->db->get("tbl_admin_login")->row();

                if(!empty($employee_rej))
                {
                $rej_name = $employee_rej->name;
                }
                else
                {
                    $rej_name = '';
                }

                if($value->approved_on == '0000-00-00 00:00:00')
                {
                    $approved_on = '';
                }
                else
                {
                    $approved_on = date("d M Y",strtotime($value->approved_on));
                }

                if($value->rejected_on == '0000-00-00 00:00:00')
                {
                    $rejected_on = '';
                }
                else
                {
                    $rejected_on = date("d M Y",strtotime($value->rejected_on));
                }

                $arrayexpense=array(
                                    'ID'=>$value->ID,
                                    'REFID'=>$value->REFID,
                                    'expense_name'=>$value->expense_name,
                                    'UserID'=>$value->UserID,
                                    'ExpenseID'=>$value->ExpenseID,
                                    'Amount'=>$value->Amount,
                                    'SDate'=>date("d M Y",strtotime($value->SDate)),
                                    'EDate'=>date("d M Y",strtotime($value->EDate)),
                                    'Remark'=>$value->Remark,
                                    'Status'=>$value->Status,
                                    'title'=>$employee_expense->ExpenseTitle,
                                    'DateCreated'=>date("d M Y",strtotime($value->DateCreated)),
                                    'approved_on'=>$approved_on,
                                    'approved_by'=>$name,
                                    'rejected_on'=>$rejected_on,
                                    'rejected_by'=>$rej_name,
                                    );
                array_push($finalArrayInner, $arrayexpense);

                if(!empty($finalArrayInner))
                {
                    
                    $responce = array(
                        'status'=>200,
                        'msg' =>'View Pending Expense List Fetched Successfully',
                        'data' => $finalArrayInner
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
                
            }
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
    