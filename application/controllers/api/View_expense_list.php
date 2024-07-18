<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class View_expense_list extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
    }
    public function index_post()
    {
        $finalArray=array();
        $UserID = $this->input->post('user_id'); 
        $this->db->order_by("DateCreated","DESC");
        $this->db->where("UserID",$UserID);
        $expense=$this->db->get("tbl_employee_expense")->result();

        foreach ($expense as $res) 
        {
            $this->db->where("REFID",$res->REFID);
            $this->db->select('tbl_expense_master.expense_name, tbl_expense_details.* ')
                    ->from('tbl_expense_details')
                    ->join('tbl_expense_master', 'tbl_expense_details.ExpenseID = tbl_expense_master.expense_id');
            $expense_array=$this->db->get()->result();

            $finalArrayInner=array();
            foreach ($expense_array as  $value) 
            {
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
                                );

                    array_push($finalArrayInner, $arrayexpense);
            }
            $this->db->where("REFID",$res->REFID);
            $this->db->select_sum('Amount');
            $this->db->from('tbl_expense_details');
            $amount=$this->db->get()->row();
        
            $newarray=array 
                        (
                            'REFID'=>$res->REFID,
                            'title'=>$res->ExpenseTitle,
                            'amount'=>$amount->Amount,
                            'DateCreated'=>date("d M Y h:i:s a",strtotime($res->DateCreated)),
                            'expense_array'=>$finalArrayInner
                        );
            array_push($finalArray, $newarray);               
        }
        if(!empty($finalArray))
        {
            $responce = array(
                'status'=>200,
                'msg' =>'View Expense List Fetched Successfully',
                'data' => $finalArray
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