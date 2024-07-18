<?php
require APPPATH . '/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: multipart/form-data"); 
class Share_details extends REST_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->auth();

    }
    public function index_post()
    {
        $org_id=$this->input->post('org_id');
	    $leadopp_id = $this->input->post('leadopp_id');
	    $user_id= $this->input->post('user_id'); 
	    $employee_ids= $this->input->post('employee_ids');

        // include_once 'assets/phpmailer/phpmailer.php';
        // $mail = new PHPMailer(); // create a new object
        // $mail->IsSMTP(); // enable SMTP
        // $mail->SMTPDebug = 1; 
        // $mail->SMTPAuth = true;   
        // $mail->Host = "mail.buroforce.com";
        // $mail->Port = 25; // or 587
        // $mail->IsHTML(true);  
        // $mail->Username="support@buroforce.com";
        // $mail->Password="Bur@@ForCe$$2019";
        // $mail->FromName = "Buroforce";
        // $mail->From="support@buroforce.com";
        // // $cust_email ="sameer@dexterityindia.in";               
        // $cust_email ="b.bratotpala@splendornet.com";               
        // $mail->AddAddress($cust_email);  // send email to customer.
        
        // $mail->Subject ="Test";
        // $message_text = "<table width='650px' style='color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;'>

        //             <tr>
        //                 <td><b>Dear Sir ,</b></td>
        //             </tr>
        //             <tr>
        //                 <td>Greetings of thed day!!!</td>
        //             </tr>
        //             <tr>
        //                 <td >&nbsp;</td>
        //             </tr>
        //             <tr>
        //                 <td>".$employee_ids."</td>
        //             </tr>  
        //             <tr>
        //                 <td >&nbsp;</td>
        //             </tr>  
        //             <tr>
        //                 <td >&nbsp;</td>
        //             </tr>  
        //             <tr>
        //                 <td>With regards,</td>
        //             </tr>
        //             <tr>
        //                 <td>Buroforce Team</td>
        //             </tr> 

        //     </table>";
            
        // $mail->Body=$message_text;

        // if($mail->send())
        // {
        //     $responce = array(
        //         'status'=>200,
        //         'msg' =>'Mail Send Successfully'
        //     );
        // }
        // else
        // {
        //     $responce = array(
        //         'status'=>500,
        //         'msg' =>'Failed to send mail. Mailer Error: ' . $mail->ErrorInfo
        //     );
        // }
        $ids='';
        // $emp_id=$formdata['emp_id'];
        $this->db->where_in('id ',$employee_ids);
        $result= $this->db->get('tbl_admin_login')->result();
        $emailids='';
        foreach ($result as  $row) 
        {
          $emailids=$emailids.','.$row->email; 
        }
        $final_str=trim(substr($emailids, 1));
        // echo "<pre>";
        // print_r($final_str);
        // die;

        $this->db->where('emp_id', $user_id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();
        if(empty($emailData))
        {
            $responce = array(
                'status'=>500,
                'msg' =>'Please set the Email configuration from web application.'
            );
        }
        else
        {
          $this->load->model('Admin/Leads_model');
          $lead_data=$this->Leads_model->lead_data($leadopp_id);
        //   $history_data=$this->Leads_model->history_data($leadopp_id);
        //   $activity_data=$this->Leads_model->activity_data($leadopp_id);
        //   $document_data=$this->Leads_model->document_data($leadopp_id);

          if($lead_data['closure_date']=='0000-00-00' || $lead_data['closure_date']=='1970-01-01')
          {
            $closure_date_display="NA";
          }
          else
          {
            $closure_date_display=date("d F, Y",strtotime($lead_data['closure_date']));
          }
            $msg='<html><table id="customers" class="table table-bordered table-xs sampletabledata" border=0 width=100%>
                            <tbody>

                                <tr>
                                    <td colspan =4>&nbsp;</td>
                                </tr>
                                <tr >
                                    <td colspan =4>Dear Team ,</td>
                                </tr>

                                <tr >
                                    <td colspan =4>Please check below lead | opportunity details :</td>
                                </tr>
                                                <tr >
                                    <td colspan =4>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td style="width: 20%;">Comapny Name</td>
                                    <td style="color: #591F46;">
                                    <b>'.$lead_data['company_name'].'</b>
                                    </td>

                                    <td style="width: 20%;">Interested In</td>
                                    <td style="color: #1A6EA4  ;">
                                    <b>'.$lead_data['prdsrv_name'].'</b>
                                    </td>
                                </tr>

                                <tr>
                                <td>Address</td> <td>'.$lead_data['address'].'</td>
                                <td>Source</td>
                                    <td style="color: #FF5732;">
                                    <b>'.$lead_data['source'].'</b>
                                    </td>                                 
                                </tr>

                                <tr>
                                <td>Contact Person</td> <td>'.$lead_data['contact_person_name1'].'</td>
                                <td>Stage</td> 
                                    <td style="color: #4FAD57;">
                                    <b>'.$lead_data['stage'].'</b>
                                    </td> 
                                </tr>
                                <tr>
                                <td>Contact Number</td> <td>'.$lead_data['phone_no'].'</td>
                                <td>Expected Revenue</td>
                                    <td style="color: #6440B2;">
                                    <b>'.$lead_data['project_business_value'].'</b>
                                    </td>                             
                                </tr>
                                <tr>
                                <td>Email ID</td> <td>'.$lead_data['email'].'</td>
                                <td>Expected Closure Date</td>
                                <td style="color: #00BBD1;">
                                    <b>'.$closure_date_display.'</b>
                                </td>                              
                                </tr>
                                <tr>
                                <td>Segment</td> <td>'.$lead_data['business_name'].'</td>
                                <td>Account Manager</td>
                                <td style="color: #B61B6B;">
                                <b>'.$lead_data['empname'].'</b>
                                </td>
                                </tr>
                                <tr>
                                <td>Type</td> <td>'.$lead_data['type'].'</td>
                                <td>TAG</td>
                                <td style="color:#BC990B;">
                                <b>'.$lead_data['tag'].'</b>
                                </td>
                                </tr>
                            </tbody>
                            </table>';
                            
            $msg.='</html>';
            $sub='Lead-Opportunity Details';
            // $this->email->from($from, 'Buroforce');
            // $this->email->to($final_str);
            // $this->email->subject($sub);
            // $this->email->message($msg);
            // $this->email->set_mailtype("html");
            // if($this->email->send())
            $this->load->library('phpmailer_lib');

            /* PHPMailer object */
            $mail = $this->phpmailer_lib->load();
            
            /* SMTP configuration */
            $mail->isSMTP();
            $mail->Host     = $emailData->host_name;
            $mail->SMTPAuth = true;
            $mail->Username = $emailData->email_id;
            $mail->Password = $emailData->email_pass;
            $mail->SMTPSecure = $emailData->secure;
            $mail->Port     = $emailData->port_number;
            
            $mail->setFrom($emailData->email_id, 'Buroforce');

            $mail->addAddress($final_str);
            
            $mail->Subject = $sub;
            
            $mail->isHTML(true);
            
            $mail->Body = $msg;
            
            // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

            if(!$mail->send())
            {
                $responce = array(
                        'status'=>500,
                        'msg' =>'Failed to send mail.'
                    );
            }
            else
            {
                $responce = array(
                        'status'=>200,
                        'msg' =>'Mail Send Successfully'
                    );
            }
        }
        $this->response($responce, REST_Controller::HTTP_OK);

	}
}