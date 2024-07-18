
<?php 

error_reporting(0);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservices_filemodel extends CI_Model
 {

	function __construct()
	 {
       parent::__construct(); // construct the Model class
       $this->load->database();
	 }

    public function get_expense_type()
    {
        $org_id=$_REQUEST['org_id'];
        $this->db->select("expense_id,expense_name");
        $this->db->where("status",1);
        $this->db->where("org_id",$org_id);
        $expense=$this->db->get("tbl_expense_master")->result();
        echo json_encode($expense);
    }

    public function get_dashboard_notes()
    {  
        $org_id=$_REQUEST['org_id'];
        $emp_id = $_REQUEST['emp_id'];
        $this->db->select("note_id,notes");
        $this->db->where("emp_id",$emp_id);
        // $this->db->where("org_id",$org_id);
        $note=$this->db->get("tbl_notes")->result();
        echo json_encode($note);
    }

    public function delete_dashboard_notes()
    {
        $this->db->where("note_id",$_REQUEST['note_id']);
        $this->db->delete("tbl_notes");
        $response["error"] = FALSE;
        $response["error_msg"] = "Success";
        echo json_encode($response);

    }

    public function edit_dashboard_notes()
    {
      $this->db->where("note_id",$_REQUEST['note_id']);
      $update_array =array('notes'=>$_REQUEST['notes']);
      $this->db->update("tbl_notes",$update_array);
      $response["error"] = FALSE;
      $response["error_msg"] = "Success";
      echo json_encode($response);

    }

    public function schedule_priority()
    {
          $finalArray=array();
          $priorityarray1["priority_name"] = 'Normal';  
          $priorityarray2["priority_name"] = 'High';  
          $priorityarray3["priority_name"] = 'Low'; 
          array_push($finalArray, $priorityarray1);
          array_push($finalArray, $priorityarray2);
          array_push($finalArray, $priorityarray3);
          echo json_encode($finalArray);
    }


    public function view_expense_list()
    {

      $finalArray=array();
      $UserID = $_REQUEST['user_id']; 
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
      echo json_encode($finalArray);
    }

    public function view_pending_expense_list()
    {
        $org_id=$_REQUEST['org_id'];
        $finalArray=array();
        $UserID = $_REQUEST['user_id'];
        $type = $_REQUEST['type'];
        $this->db->order_by("tbl_expense_details.DateCreated","DESC");
        $this->db->where("tbl_expense_details.Status",$type);
        $this->db->where("tbl_expense_details.org_id",$org_id);
        $this->db->where("tbl_expense_details.UserID",$UserID);
        $this->db->select('tbl_expense_master.expense_name, tbl_expense_details.*')
                 ->from('tbl_expense_details')
                 ->join('tbl_expense_master', 'tbl_expense_details.ExpenseID = tbl_expense_master.expense_id');
        $expense_array=$this->db->get()->result();

        $finalArrayInner=array();
        foreach ($expense_array as  $value) 
        {
            $this->db->where("REFID",$value->REFID);
            $employee_expense=$this->db->get("tbl_employee_expense")->row();

            $this->db->select("name");
            $this->db->where("id",$value->approved_by);
            $employee=$this->db->get("tbl_admin_login")->row();

            $this->db->select("name");
            $this->db->where("id",$value->rejected_by);
            $employee_rej=$this->db->get("tbl_admin_login")->row();

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
                                  'approved_on'=>date("d M Y",strtotime($value->approved_on)),
                                  'approved_by'=>$employee->name,
                                  'rejected_on'=>date("d M Y",strtotime($value->rejected_on)),
                                  'rejected_by'=>$employee_rej->name,
                                );
             array_push($finalArrayInner, $arrayexpense);
        }
        echo json_encode($finalArrayInner);
    }


    public function quotation_list()
    {
        $FinalArray=array();
        $org_id=$_REQUEST['org_id'];
        $leadopp_id = $_REQUEST['lead_opp_ID'];                
        $this->db->where("leadopp_id",$leadopp_id);
        $quotation_array=$this->db->get('tbl_lead_quotation')->result();

        if(count($quotation_array)>0)
        {
          foreach ($quotation_array as  $value) 
          {
              $newarray=array(
                              'quotation_id'=>$value->quotation_id,
                              'quotation_no'=>$value->quotation_number,
                              'quotation_date'=>date("d M, Y",strtotime($value->quotation_date)),
                              'contact_person'=>$value->contact_person,
                              'contact_no'=>$value->contact_number,
                              'email'=>$value->email,
                              'valid_till'=>date("d M, Y",strtotime($value->valid_till)),
                              'quotation_status'=>$value->quotation_status
                            );
               array_push($FinalArray, $newarray);
          }
          echo json_encode($FinalArray);
        }
        else
        {
              $response =array();
              echo json_encode($response);
        }

    }

    public function expense_list()
    {
      $REFID = $_REQUEST['REFID']; 
      $this->db->where("REFID",$REFID);
      $this->db->select('tbl_expense_details.*, tbl_expense_master.expense_name')                        
               ->from('tbl_expense_details')
               ->join('tbl_expense_master', 'tbl_expense_details.ExpenseID = tbl_expense_master.expense_id');
      $expense=$this->db->get()->result();
      echo json_encode($expense);
    }

    public function add_expense()
    {
        $UserID = $_REQUEST['user_id']; 
        $org_id = $_REQUEST['org_id']; 
        $expenseArray = $_REQUEST['expense']; 
        $ExpenseTitle = $_REQUEST['title']; 
        
        $ExpenseExplode=substr($expenseArray, 0,-1);
        $explode=explode(",", $ExpenseExplode);
        $Expense=array(
                            'UserID'=>$UserID,
                            'org_id'=>$org_id,
                            'ExpenseTitle'=>$ExpenseTitle,
                            'DateCreated'=>date("Y-m-d H:i:s")
                        );
        $this->db->Insert("tbl_employee_expense",$Expense);
        $REFID = $this->db->insert_id();

        for($i=0;$i<count($explode);$i++)
         {
             $String=trim($explode[$i]);
             if(!empty($String))
             {
               $expense=explode("*", $String);
               $count=count($expense);

                if($count>5)
                {
                  $Filename=$expense[5];
                  $Document=$expense[6];
                }
                else
                {
                  $Filename='';
                  $Document='';
                }
               $Details=array(
                              'UserID'=>$UserID,
                              'org_id'=>$org_id,
                              'REFID'=>$REFID,
                              'ExpenseID'=>$expense[0],
                              'Amount'=>$expense[1],
                              'SDate'=>date("Y-m-d",strtotime($expense[2])),
                              'EDate'=>date("Y-m-d",strtotime($expense[3])),
                              'Remark'=>$expense[4],
                              'Filename'=>$Filename,
                              'Document'=>$Document,
                              'DateCreated'=>date("Y-m-d H:i:s")
                          );
               $res=$this->db->Insert("tbl_expense_details",$Details);
             }
         }

        if($res)
          {
              $response["error"] = FALSE;
              $response["error_msg"] = "success";
              echo json_encode($response);              
          }
          else
          {
              $response["error"] = TRUE;
              $response["error_msg"] = "Failed";
              echo json_encode($response);
          }
     }

    public function edit_expense()
    { 
          $ID = $_REQUEST['ID']; 
          $Details=array(
                        'Amount'=>$_REQUEST['Amount'],
                        'SDate'=>date("Y-m-d",strtotime($_REQUEST['SDate'])),
                        'EDate'=>date("Y-m-d",strtotime($_REQUEST['EDate'])),
                        'Remark'=>$_REQUEST['Remark'],
                        'Filename'=>$_REQUEST['filename'],
                        'Document'=>$_REQUEST['document']
                    );
           $this->db->where("ID",$ID);
           $res=$this->db->Update("tbl_expense_details",$Details);
           $REFID=$_REQUEST['REFID'];
           $title=$_REQUEST['title'];
           $this->db->set("ExpenseTitle",$title);
           $this->db->where("REFID",$REFID);
           $this->db->Update("tbl_employee_expense");

          if($res)
          {
              $response["error"] = FALSE;
              $response["error_msg"] = "success";
              echo json_encode($response);
          }
          else
          {
              $response["error"] = TRUE;
              $response["error_msg"] = "Failed";
              echo json_encode($response);
          }
    }



   	public function upload_documents()
  	{
         $PdfUploadFolder = 'assets/admin/leaddocuments/';
         $ServerURL = base_url().$PdfUploadFolder;
         $PdfName = $_POST['name'];  
         $PdfInfo = pathinfo($_FILES['pdf']['name']);
         $PdfFileExtension = $PdfInfo['extension'];  
         $PdfFileURL = $ServerURL . date('YmdHis') . '.' . $PdfFileExtension;
         $PdfFileFinalPath = $PdfUploadFolder . date('YmdHis') . '.'. $PdfFileExtension;

         $uploadfilename=date('YmdHis') . '.' . $PdfFileExtension;

         try
           {
               move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
               $Details=array(
                              'leadopp_id'=>$_REQUEST['leadopp_id'],
                              'name'=>$PdfName,
                              'uploadfilename'=>$uploadfilename,
                              'remark'=>$_REQUEST['remark'],
                              'DateCreated'=>date("Y-m-d H:i:s")
                          );
                $this->db->Insert("tbl_lead_documents",$Details);

                $response["error"] = FALSE;
                $response["error_msg"] = "File Uploaded Successfully";
                echo json_encode($response);

           }
           catch(Exception $e)
           {
              $response["error"] = TRUE;
              $response["error_msg"] = "Failed";
              echo json_encode($response);
           } 
  	}


    public function upload_schedule_documents()
    {
         $random=rand(11,125700);

         $PdfUploadFolder = 'assets/admin/scheduledocuments/';
         $ServerURL = base_url().$PdfUploadFolder;
         $PdfName = $_POST['name'];  
         $PdfInfo = pathinfo($_FILES['pdf']['name']);
         $PdfFileExtension = $PdfInfo['extension'];  
         $PdfFileURL = $ServerURL . date('YmdHis').$random. '.' . $PdfFileExtension;
         $PdfFileFinalPath = $PdfUploadFolder . date('YmdHis').$random. '.'. $PdfFileExtension;
         $uploadfilename=date('YmdHis').$random. '.' . $PdfFileExtension;

         try
           {
               move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
               $Details=array(
                              'schedule_id'=>$_REQUEST['schedule_id'],
                              'issue_id'=>$_REQUEST['issue_id'],
                              'upload_by'=>$_REQUEST['upload_by'],
                              'doc_name'=>$PdfName,
                              'uploadfilename'=>$uploadfilename,
                              'date_created'=>date("Y-m-d H:i:s")
                            );
                $this->db->Insert("tbl_schedule_document",$Details);
                $response["error"] = FALSE;
                $response["error_msg"] = "File Uploaded Successfully";
                echo json_encode($response);

           }
           catch(Exception $e)
           {
              $response["error"] = TRUE;
              $response["error_msg"] = "Failed";
              echo json_encode($response);
           } 
    }


    public function upload_expense_documents()
    {
         $PdfUploadFolder = 'assets/admin/expensedocuments/';
         $ServerURL = base_url().$PdfUploadFolder;
         $PdfName = $_POST['name'];  
         $PdfInfo = pathinfo($_FILES['pdf']['name']);
         $PdfFileFinalPath = $PdfUploadFolder . $PdfName;
         try
           {
                move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
                $response["error"] = FALSE;
                $response["error_msg"] = "File Uploaded Successfully";
                echo json_encode($response);
           }
           catch(Exception $e)
           {
              $response["error"] = TRUE;
              $response["error_msg"] = "Failed";
              echo json_encode($response);
           } 
    }

    public function get_notes()
    {
      $org_id=$_REQUEST['org_id'];
      $leadopp_id = $_REQUEST['leadopp_id'];
      $this->db->where("leadopp_id",$leadopp_id);
      $leads=$this->db->get("tbl_leads_opportunity")->row();
      if($leads)
        {

              $response["error"] = FALSE;
              $response["notes"] = $leads->notes;
              $response["error_msg"] = "success";
              echo json_encode($response);
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "Failed";
            echo json_encode($response);
        }
    }

    public function send_notes()
    {
      $org_id=$_REQUEST['org_id'];
      $leadopp_id = $_REQUEST['leadopp_id']; 
      $this->db->where("leadopp_id",$leadopp_id);
      $leads=$this->db->get("tbl_leads_opportunity")->row();
      $db_notes=$leads->notes;

      $update_notes=$db_notes.$_REQUEST['notes'].'\n';
      $this->db->set("notes",$update_notes);
      $this->db->where("leadopp_id",$leadopp_id);
      $leads=$this->db->update("tbl_leads_opportunity");
      if($leads)
        {
              $response["error"] = FALSE;
              $response["error_msg"] = "success";
              echo json_encode($response);
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "Failed";
            echo json_encode($response);
        }

    }

    public function send_dashboard_notes()
    {
        $org_id=$_REQUEST['org_id'];
        $emp_id = $_REQUEST['emp_id']; 
        $notes=$_REQUEST['notes'];
        $InsertArray=array(  
                          'org_id'=>$org_id,
                          'emp_id'=>$emp_id,
                          'notes'=>$notes,
                          'created_date'=>date("Y-m-d H:i:s")
                        );
        $notes=$this->db->insert('tbl_notes',$InsertArray);
        if($notes)
         {
              $response["error"] = FALSE;
              $response["error_msg"] = "success";
              echo json_encode($response);
         }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "Failed";
            echo json_encode($response);
        }
    }



    public function convert_to_contact($leadopp_id,$company_name,$email,$phone_no,$contact_person_name1,$address,$created_by)
    { 
        $org_id=$_REQUEST['org_id'];
        $UpdateArray=array(
                            'company_name'=>$company_name,
                            'contact_person_name1'=>$contact_person_name1,
                            'phone_no'=>$phone_no,
                            'email'=>$email,
                            'address'=>$address
                          );
         $this->db->where("leadopp_id",$leadopp_id);
         $data=$this->db->Update("tbl_customer",$UpdateArray);     
         if($data)
         {
            $this->db->set("is_converted",1);
            $this->db->where("leadopp_id",$leadopp_id);
            $leads=$this->db->update("tbl_leads_opportunity");
            $response["error"] = FALSE;
            $response["error_msg"] = "Registration Completed";
            echo json_encode($response);   
         } 
         else
         {
            $response["error"] = TRUE;
            $response["error_msg"] = "Registration Failed";
            echo json_encode($response);
         }      

  } 


   	public function share_details()
  	{
      $org_id=$_REQUEST['org_id'];
	    $leadopp_id = $_REQUEST['leadopp_id'];
	    $user_id= $_REQUEST['user_id']; 
	    $employee_ids= $_REQUEST['employee_ids'];

		// $response["error"] = FALSE;
		// $response["error_msg"] = "Email send successfully";
		// echo json_encode($response); 

            include_once 'assets/phpmailer/phpmailer.php';
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; 
            $mail->SMTPAuth = true;   
            $mail->Host = "mail.buroforce.com";
            $mail->Port = 25; // or 587
            $mail->IsHTML(true);  
            $mail->Username="support@buroforce.com";
            $mail->Password="Bur@@ForCe$$2019";
            $mail->FromName = "Buroforce";
            $mail->From="support@buroforce.com";
            $cust_email ="kedar@ileaf.in";               
            $mail->AddAddress($cust_email);  // send email to customer.
            
            $mail->Subject ="Test";
            $message_text = "<table width='650px' style='color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>
 
                      <tr>
                          <td><b>Dear Sir ,</b></td>
                      </tr>
                      <tr>
                          <td>Greetings of thed day!!!</td>
                      </tr>
                       <tr>
                          <td >&nbsp;</td>
                       </tr>
                        <tr>
                          <td>".$employee_ids."</td>
                       </tr>  
                       <tr>
                          <td >&nbsp;</td>
                       </tr>  
                       <tr>
                          <td >&nbsp;</td>
                       </tr>  
                      <tr>
                          <td>With regards,</td>
                      </tr>
                        <tr>
                          <td>Buroforce Team</td>
                       </tr> 

                </table>";
              
             $mail->Body=$message_text;

             if($mail->send())
             {
                $response["error"] = FALSE;
                $response["error_msg"] = "Email send successfully";
                echo json_encode($response);    
             }
             else
             {
                $error = "Mailer Error: " . $mail->ErrorInfo;
                $response["error"] = TRUE;
                $response["error_msg"] = "Failed to send mail";
                echo json_encode($response);
             }
  	}






}