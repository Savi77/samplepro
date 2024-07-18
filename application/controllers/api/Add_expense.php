<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Add_expense extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
  }
  public function index_post()
  {
      $UserID = $this->input->post('user_id'); 
      $org_id = $this->input->post('org_id'); 
      $expenseArray = $this->input->post('expensearray'); 
      $ExpenseTitle = $this->input->post('expensetitle');
     
      // $ExpenseExplode=substr($expenseArray, 0,-1);
      // $explode=explode(",", $ExpenseExplode);
      $Expense=array(
                          'UserID'=>$UserID,
                          'org_id'=>$org_id,
                          'ExpenseTitle'=>$ExpenseTitle,
                          'DateCreated'=>date("Y-m-d H:i:s")
                      );
      $this->db->Insert("tbl_employee_expense",$Expense);
      $REFID = $this->db->insert_id();

      for($i=0;$i<COUNT($expenseArray);$i++)
      {
        // $a = $expenseArray[$i]['displayName'];
        if(!empty($_FILES['displayName']['name'][$i]))
        {
          $random=rand(11,125700);
          $PdfUploadFolder = 'assets/admin/expensedocuments/';
          $ServerURL = base_url().$PdfUploadFolder;
          $PdfName = $_FILES['displayName']['name'][$i];  
          $PdfInfo = pathinfo($_FILES['displayName']['name'][$i]);
          $PdfFileExtension = $PdfInfo['extension'];  
          $PdfFileURL = $ServerURL . date('YmdHis').$random. '.' . $PdfFileExtension;
          $PdfFileFinalPath = $PdfUploadFolder . date('YmdHis').$random. '.'. $PdfFileExtension;
          $uploadfilename=date('YmdHis').$random. '.' . $PdfFileExtension;

          $Details=array(
            'UserID'=>$UserID,
            'org_id'=>$org_id,
            'REFID'=>$REFID,
            'ExpenseID'=>$expenseArray[$i]['expenseId'],
            'Amount'=>$expenseArray[$i]['amount'],
            'SDate'=>date("Y-m-d",strtotime($expenseArray[$i]['startDate'])),
            'EDate'=>date("Y-m-d",strtotime($expenseArray[$i]['endDate'])),
            'Remark'=>$expenseArray[$i]['remark'],
            'Filename'=>$_FILES['displayName']['name'][$i],
            'Document'=>$uploadfilename,
            'DateCreated'=>date("Y-m-d H:i:s")
          );
        }
        else
        {
          $Details=array(
            'UserID'=>$UserID,
            'org_id'=>$org_id,
            'REFID'=>$REFID,
            'ExpenseID'=>$expenseArray[$i]['expenseId'],
            'Amount'=>$expenseArray[$i]['amount'],
            'SDate'=>date("Y-m-d",strtotime($expenseArray[$i]['startDate'])),
            'EDate'=>date("Y-m-d",strtotime($expenseArray[$i]['endDate'])),
            'Remark'=>$expenseArray[$i]['remark'],
            'Filename'=>'',
            'Document'=>'',
            'DateCreated'=>date("Y-m-d H:i:s")
          );
        }
        $res=$this->db->Insert("tbl_expense_details",$Details);
      }
      if($res)
      {
        $responce = array(
          'status'=>200,
          'msg' =>'Expense Added Successfully'
          );            
      }
      else
      {
        $responce = array(
          'status'=>500,
          'msg' =>'Something Went Wrong'
          );
      }
      $this->response($responce, REST_Controller::HTTP_OK);
  }
}