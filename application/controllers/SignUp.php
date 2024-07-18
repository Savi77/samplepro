<?php

error_reporting(-1);
defined('BASEPATH') or exit('No direct script access allowed');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
  
// require_once(__DIR__ . '/vendor/autoload.php');

class SignUp extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
        $this->load->library('email'); // new email configration.

        $Mailconfig['protocol'] = 'smtp';

        $Mailconfig['smtp_host'] = 'ssl://smtp.gmail.com';

        $Mailconfig['smtp_port'] = '465';

        $Mailconfig['smtp_timeout'] = '7';

        $Mailconfig['smtp_user'] = 'burosnta@gmail.com';

        $Mailconfig['smtp_pass'] = 'qzeywydcyxspevry';

        $Mailconfig['charset'] = 'utf-8';

        $Mailconfig['newline'] = "\r\n";

        $Mailconfig['mailtype'] = 'html'; // or html

        $Mailconfig['validation'] = TRUE; // bool whether to validate email or not

        $Mailconfig['wordwrap'] = 'true';

        $Mailconfig['wrapchars'] = '76';

        $Mailconfig['crlf'] = "\r\n";

        $this->email->initialize($Mailconfig);
   }

   public function index()
   {
      $this->session->sess_destroy();
      $this->load->view('SignUpView');
   }

   //Sending mail to new user user signup
   public function SendVerificationEmail()
   {
      $email_id = $this->input->post('email_id');
      $checkUnverified = $this->db->select('email')->from('tbl_unverifiedCustomer')->where('email',$email_id)->get()->row();
      
      if(!empty($checkUnverified))
      {
        echo ("Given mailid is already exist."); 
      }
      else
      {
        
        $redi_url = 'email_id=' . $email_id;
        $url = base64_encode($redi_url);
        $ApproveURL = base_url() . 'CreateProfile/VerificationProcess?' . $url;
        $logo = base_url() . 'app-assets/image/BURO_FORCE_logo_ctc.png';
        $img = base_url() . 'app-assets/image/thumb_white_check_mark_removebg.png';

        $company_url = base_url();

        // $sub = 'Email Verification Needed for Buro Matrix';
        // $from ='burosnta@gmail.com';
        $to = $email_id;
        $msg = '
            <section>
                    <center style="width: 100%;">
                        <table width="650px" style="margin-top: 50px;margin-bottom: 50px; font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/BURO_FORCE_logo_ctc.png" alt="img" style="max-width: 250px;width: 100%;height: auto;display: block;margin: 0 auto;padding: 20px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <div class="text-center" >
                                                            <img src="https://buroforce.progfeel.co.in/app-assets/image/thumb_white_check_mark_removebg.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                            <h3 style="font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px; margin-bottom: 0px;">Verify Your Email Address</h3>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 25px 50px 15px 50px;">
                                                            <p>Hello '.$email_id.',</p>
                                                            <p>Welcome to Buro Matrix! To get started, we need to verify your email address. </p>
                                                            <p>Please click on the following link to complete the verification process:</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 50px 0px 50px">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="'. $ApproveURL .'" style="color: #fff;text-decoration: none;">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td bgcolor="#003399" style="border: none;padding: 12px 30px;display: inline-block;font-weight: 600;border-radius: 30px;text-decoration: none;">
                                                                            <a href="'. $ApproveURL .'" style="color: #fff;text-decoration: none;">Verify Your Email</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 15px 50px;">
                                                            <p>Best Regards,</p>
                                                            <p>Team Buro Matrix</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="background-color: #003399;padding: 15px 20px;color: #fff;font-size: 16px;display: flex;text-align: center;">
                                        <table align="center" >
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <div>
                                                            <p style=" margin-bottom: 0;">Copyright © 2023 Buroforce | All Rights Reserved.</p>
                                                            <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;">Buroforce.com</p></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </section>
            ';

            // $this->db->where('emp_id', $this->session->id);
            $this->db->where('org_id', 0);
            $emailData = $this->db->get('tbl_org_email_configuration')->row();

            if (empty($emailData)) 
            {
                // echo 0;
                    $sub = 'Email Verification Needed for Buro Matrix';
                // $from ='burosnta@gmail.com';

                $this->load->library('phpmailer_lib');
        
                    /* PHPMailer object */
                $mail = $this->phpmailer_lib->load();
                
                /* SMTP configuration */
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'contact@buromatrix.com';
                $mail->Password = 'bouv yjlp dhip qzxh';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = '465';
                
                $mail->setFrom('contact@buromatrix.com', 'BuroMatrix');
            
                $mail->addAddress($to);
                
                $mail->Subject = $sub;
                
                $mail->isHTML(true);
                
                $mail->Body = $msg;
                
                // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

                if(!$mail->send())
                {
                    // echo 'Mail could not be sent.';
                    // echo 'Mailer Error: ' . $mail->ErrorInfo;
                    echo "email_not_sent";
                    echo $this->email->print_debugger();
                }
                else
                {
                    $InsertArray = array(
                        'email' => $email_id,
                        'status' => 1
                    );
                    $this->db->Insert('tbl_unverifiedCustomer', $InsertArray);   
                    $this->load->view('EmailAuthenticationView');
                }
            } 
            else 
            {
                $sub = 'Email Verification Needed for Buro Matrix';
                // $from ='burosnta@gmail.com';

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
            
                $mail->addAddress($to);
                
                $mail->Subject = $sub;
                
                $mail->isHTML(true);
                
                $mail->Body = $msg;
                
                // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

                if(!$mail->send())
                {
                    // echo 'Mail could not be sent.';
                    // echo 'Mailer Error: ' . $mail->ErrorInfo;
                    echo "email_not_sent";
                    echo $this->email->print_debugger();
                }
                else
                {
                    $InsertArray = array(
                        'email' => $email_id,
                        'status' => 1
                    );
                    $this->db->Insert('tbl_unverifiedCustomer', $InsertArray);   
                    $this->load->view('EmailAuthenticationView');
                }   
            }
            
            // $this->email->from($from, 'Buroforce');
            // $this->email->to($to);
            // $this->email->subject($sub);
        
            // $this->email->message($msg);
        
            // if ($this->email->send()) 
            // {
            //     $InsertArray = array(
            //         'email' => $email_id,
            //         'status' => 1
            //     );
            //     $this->db->Insert('tbl_unverifiedCustomer', $InsertArray);   
            //     $this->load->view('EmailAuthenticationView');
            // } 
            // else 
            // {
            //     echo "email_not_sent";
            //     echo $this->email->print_debugger();
            // }
        }
    }
}
