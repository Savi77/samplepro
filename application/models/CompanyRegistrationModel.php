  <?php

  defined('BASEPATH') or exit('No direct script access allowed');

  class CompanyRegistrationModel extends CI_Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->load->dbforge();
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

    public function plan_list($plan_id)
    {
      $final_array = array();
      $this->db->where('plan_id', $plan_id);
      $result = $this->db->get('tbl_plan_master')->result();
      foreach ($result as  $value) {
        $ids = $value->module_id;
        if (empty($ids)) {
          $ids = 0;
        }
        $module = $this->db->query(" SELECT module_name FROM tbl_modules where module_id IN($ids)  ")->result();
        $new_array = array('plan_name' => $value->plan_name, 'module_id' => $value->module_id, 'price' => $value->price, 'plan_id' => $value->plan_id, 'module_list_array' => $module);
        array_push($final_array, $new_array);
      }
      return $final_array;
    }

    public function Custom_plan_list($plan_id, $module_ids)
    {
      $final_array = array();
      $this->db->where('plan_id', $plan_id);
      $result = $this->db->get('tbl_plan_master')->result();
      foreach ($result as  $value) {
        $ids = $module_ids;
        if (empty($ids)) {
          $ids = 0;
        }
        $module = $this->db->query(" SELECT module_name,price FROM tbl_modules where module_id IN($ids) ")->result();
        $new_array = array('plan_name' => $value->plan_name, 'module_id' => $value->module_id, 'price' => $value->price, 'plan_id' => $value->plan_id, 'module_list_array' => $module);
        array_push($final_array, $new_array);
      }
      return $final_array;
    }


    public function Paid_plan_list($plan_id, $module_ids)
    {
      $final_array = array();
      $this->db->where('plan_id', $plan_id);
      $result = $this->db->get('tbl_plan_master')->result();
      foreach ($result as  $value) {
        $ids = $module_ids;
        if (empty($ids)) {
          $ids = 0;
        }
        $module = $this->db->query(" SELECT module_name,price FROM tbl_modules where module_id IN($ids)  ")->result();
        $new_array = array('plan_name' => $value->plan_name, 'module_id' => $value->module_id, 'price' => $value->price, 'plan_id' => $value->plan_id, 'module_list_array' => $module);
        array_push($final_array, $new_array);
      }
      return $final_array;
    }


    public function GetModules()
    {
      $final_array = array();
      $this->db->where('status', 1);
      $result = $this->db->get('tbl_modules')->result();
      foreach ($result as  $value) {
        $ids = $value->component_ids;
        $feature = $this->db->query(" SELECT * FROM tbl_feature_list where component_id IN($ids)  ")->result();
        $new_array = array('module_name' => $value->module_name, 'price' => $value->price, 'module_id' => $value->module_id, 'feature_list_array' => $feature);
        array_push($final_array, $new_array);
      }
      return $final_array;
    }


    public function InsertDataCompany($formdata)
    {
      $org_access_url = $formdata['org_cdomain'];
      $org_email = $formdata['org_email'];

      $this->db->where('org_cdomain', $org_access_url);
      $res = $this->db->get('tbl_organisation')->result();
      $rescount = count($res);

      $this->db->where('email', $org_email);
      $admin_res = $this->db->get('tbl_admin_login')->result();
      $admincount = count($admin_res);
      
      if ($rescount > 0) {
        return 0;
      } else if ($admincount > 0) {
        return 2;
      } 
      else {
        $move_file = FCPATH . 'assets/admin/company_logo/';
        $move_file1 = $move_file . basename($formdata['fileup']);
        $date_created = date("Y-m-d H:i:s");
        move_uploaded_file($_FILES['fileup']['tmp_name'], $move_file1);
        chmod($move_file1, 0755);

        $module_ids = $formdata['module_ids'];
        $plan_id = $formdata['plan_id'];

        // if ($formdata['imageup'] != '') {
        if ($formdata['fileup'] != '') {
          $InsertArray = array(
            'org_cname' => $formdata['org_cname'],
            'plan_id' => $plan_id,
            'module_ids' => $module_ids,
            'org_cdomain' => $formdata['org_cdomain'],
            'org_fname' => $formdata['org_fname'],
            'org_lname' => $formdata['org_lname'],
            'org_email' => $formdata['org_email'],
            'org_contact' => $formdata['org_contact'],
            'org_address' => $formdata['org_address'],
            'org_country' => $formdata['org_country'],
            'org_state' => $formdata['org_state'],
            'org_city' => $formdata['org_city'],
            'org_postcode' => $formdata['org_postcode'],
            'subscription_type' => $formdata['subscription_type'],

            'org_timezone' => $formdata['org_timezone'],
            'org_currency' => $formdata['org_currency'],
            'org_company_logo' => $formdata['fileup'],
            'org_landline' => $formdata['org_landline'],
            'org_web_url' => $formdata['org_website'],
            'org_abt_compnay' => $formdata['org_abt_compnay'],
            'date_created' => date("Y-m-d H:i:s")
          );
        } 
        else {
          $InsertArray = array(
            'org_cname' => $formdata['org_cname'],
            'plan_id' => $plan_id,
            'module_ids' => $module_ids,
            'org_cdomain' => $formdata['org_cdomain'],
            'org_fname' => $formdata['org_fname'],
            'org_lname' => $formdata['org_lname'],
            'org_email' => $formdata['org_email'],
            'org_contact' => $formdata['org_contact'],
            'org_address' => $formdata['org_address'],
            'org_country' => $formdata['org_country'],
            'org_state' => $formdata['org_state'],
            'org_city' => $formdata['org_city'],
            'org_postcode' => $formdata['org_postcode'],
            'subscription_type' => $formdata['subscription_type'],

            'org_timezone' => $formdata['org_timezone'],
            'org_currency' => $formdata['org_currency'],

            'org_landline' => $formdata['org_landline'],
            'org_web_url' => $formdata['org_website'],
            'org_abt_compnay' => $formdata['org_abt_compnay'],

            'date_created' => date("Y-m-d H:i:s")
          );
        }

        $this->db->Insert('tbl_organisation', $InsertArray);
        $org_id = $this->db->insert_id();

        // $_SESSION['insert_org_id']=$org_id;
        $new_array = array(
          'insert_org_id' => $org_id
        );
        // print_r($user_array);
        $this->session->set_userdata($new_array);

        $org_fullname = $formdata['org_fname'] . ' ' . $formdata['org_lname'];
        $org_email = $formdata['org_email'];
        $org_contact = $formdata['org_contact'];
        $password = $formdata['password'];
        $AdminInsertArray = array(
          'org_id' => $org_id,
          'name' => $org_fullname,
          'Password' => $password,
          'email' => $org_email,
          'mobile_no' => $org_contact,
          'profile_img' => $formdata['fileup'],
          'user_type' => 'SA',
          'user_status' => 1,
          'forgot_pass' => '',
          'android_id' => '',
          'imei' => '',
          'update_permission' => 0,
          'schedule_view' => 0,
          'timestamp' => date("Y-m-d H:i:s")
        );
        $this->db->Insert('tbl_admin_login', $AdminInsertArray);
        $subscription_start_date = date("Y-m-d");
        $gettrial = $this->db->select('trial_days')->from('tbl_trial_days')->get()->row();
        if(!empty($gettrial))
        {
            $days = $gettrial->trial_days . "day";
        }
        else
        {
            $days = "15 day";
        }
        $subscription_end_date = date('Y-m-d', strtotime($date_created . ' + ' . $days ));
        // $subscription_end_date = date('Y-m-d', strtotime($date_created . '+ 15 day'));
        $SubInsertArray = array(
          'org_id' => $org_id,
          'plan_id' => $plan_id,
          'module_ids' => $module_ids,
          'subscription_start_date' => $subscription_start_date,
          'subscription_end_date' => $subscription_end_date,
          'no_of_user' => $formdata['no_of_user'],
          'plan_price' => $formdata['price'],
          'status' => 1,
          'created_date' => date("Y-m-d H:i:s")
        );
        $this->db->Insert('tbl_plan_subscription', $SubInsertArray);

        //----------------Update Status In UnverifiedCustomer --------------------------------------------
        
        $checkEmail = $this->db->select('email')->from('tbl_admin_login')->where('email',$org_email)->get()->row();
        if(!empty($checkEmail))
        {
          $updateArray = array(
            'status' => 2,
            'updated_date' => date("Y-m-d H:i:s")
          );
          $this->db->set($updateArray);
          $this->db->where('email',$org_email);
          $this->db->update('tbl_unverifiedCustomer'); 
        }
        
       //---------------------------------------------------------------------------------

        //----------------Insertt Master Value --------------------------------------------

        // include('assets/InsertMaster.php');

        //---------------------------------------------------------------------------------
        // $email_config = array(
        //   'protocol'  => 'smtp',
        //   'smtp_host' => 'mail.buroforce.com',
        //   'smtp_port' => '465',
        //   'smtp_user' => 'support@buroforce.com',
        //   'smtp_pass' => 'Bur@@ForCe$$2019',
        //   'mailtype'  => 'html',
        //   'starttls'  => true,
        //   'newline'   => "\r\n"
        // );

        if($formdata['subscription_type'] == 'trial')
        {
          $type = 'Trial';
        }

        else if($formdata['subscription_type'] == 'Paid')
        {
          $type = 'Regular';
        }
        
        $gettrial = $this->db->select('trial_days')->from('tbl_trial_days')->get()->row();
        if(!empty($gettrial))
        {
            $days = $gettrial->trial_days;
        }
        else
        {
            $days = 15;
        }

        $sub = $formdata['org_fname'].', Welcome to Buro Matrix!';
        
        $to = $org_email;
        $company_url =  base_url();
        $msg = '
        <html>
        <section>
            <center style="width: 100%;">
                <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                    <tbody>
                        <tr>
                            <td>
                                <img src="https://buroforce.progfeel.co.in/app-assets/image/BURO_FORCE_logo_ctc.png" alt="" style="max-width: 250px;width: 100%;height: auto;display: block;margin: 0 auto;padding: 20px;">
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="background-color: #003399;padding: 30px;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <div class="text-center" >
                                                    <img src="https://buroforce.progfeel.co.in/app-assets/image/welcome_removebg.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                    <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Welcome!</h3>
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
                                                <div style="padding: 25px 50px 0px 50px;">
                                                    <p>Dear "'.$formdata['org_fname'].'",</p>
                                                    <p>We are thrilled to welcome you to our family. We believe that you will find our services beneficial and enjoyable.</p>
                                                    <p style="margin-bottom: 0;">We look forward to a fruitful journey together.</p>
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
                                                    <a href="'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0; color: #fff; text-decoration: none;">Buroforce.com</p></a>
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
            
        </html>';
        $this->db->where('org_id',0);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();

        if(empty($emailData))
        {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
        
            /* SMTP configuration */
            $mail->isSMTP();
            $mail->Host     = 'mail.buroforce.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@buroforce.com';
            $mail->Password = 'Bur@@ForCe$$2019';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = '465';
            
            $mail->setFrom('support@buroforce.com', 'Buroforce');
        
            $mail->addAddress($org_email);
            
            $mail->Subject = $sub;
            
            $mail->isHTML(true);
            
            $mail->Body = $msg;
            
            // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

            if(!$mail->send())
            {
                echo 'Mail could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else
            {
                $sub = 'New Customer Onboarded - '.$formdata['org_fname'].' '.$formdata['org_lname'];
                $to = 'sameer@dexterityindia.in';
                
                $msg = '
                <html>
                <section>
                <center style="width: 100%;">
                    <!--  -->
                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px;">
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
                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/user1_removebg.png" alt="img" style="max-width: 70px;width: 100%;height:auto">                           
                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">New Customer Onboarded</h3>
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
                                                    <!--  -->
                                                    <div style="padding: 25px 50px 0cqi 50px;">
                                                        <p>Dear Admin,</p>
                                                        <p>A new customer, '.$formdata['org_fname'].' '.$formdata['org_lname'].', has been successfully onboarded. Please find the details below:</p>
                                                        <ul>
                                                            <li>Name : '.$formdata['org_fname'].' '.$formdata['org_lname'].'</li>
                                                            <li>Comapny : '.$formdata['org_cname'].'</li>
                                                            <li>Email : '.$org_email.'</li>
                                                            <li>Subscription Type : '.$type.'</li>
                                                            <li>Sign-up Date : '.date("Y-m-d H:i:s").'</li>
                                                            <li>Subscription Start Date : '.date("Y-m-d").'</li>
                                                            <li>Subscription End Date : '.Date('Y-m-d', strtotime('+'.$days. 'days')).'</li>
                                                        </ul>
                                                        <p>Please ensure that all necessary actions are taken to provide the best service to our new customer.</p>
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
                                                        <a href="'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; color: #fff; text-decoration: none;">Buroforce.com</p></a>
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
                </html>
                ';

                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
            
                /* SMTP configuration */
                $mail->isSMTP();
                $mail->Host     = 'mail.buroforce.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'support@buroforce.com';
                $mail->Password = 'Bur@@ForCe$$2019';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = '465';
                
                $mail->setFrom('support@buroforce.com', 'Buroforce');
            
                $mail->addAddress($to);
                
                $mail->Subject = $sub;
                
                $mail->isHTML(true);
                
                $mail->Body = $msg;
                
                // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

                if(!$mail->send())
                {
                    echo 'Mail could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
                else
                {
                    return 1;
                }
            }
        }

        else
        {
            $this->load->library('phpmailer_lib');
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
        
            $mail->addAddress($org_email);
            
            $mail->Subject = $sub;
            
            $mail->isHTML(true);
            
            $mail->Body = $msg;
            
            // $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

            if(!$mail->send())
            {
                echo 'Mail could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else
            {
                $sub = 'New Customer Onboarded - '.$formdata['org_fname'].' '.$formdata['org_lname'];
                $to = 'sameer@dexterityindia.in';
                
                $msg = '
                <html>
                <section>
                <center style="width: 100%;">
                    <!--  -->
                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px;">
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
                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/user1_removebg.png" alt="img" style="max-width: 70px;width: 100%;height:auto">                           
                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">New Customer Onboarded</h3>
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
                                                    <!--  -->
                                                    <div style="padding: 25px 50px 0cqi 50px;">
                                                        <p>Dear Admin,</p>
                                                        <p>A new customer, '.$formdata['org_fname'].' '.$formdata['org_lname'].', has been successfully onboarded. Please find the details below:</p>
                                                        <ul>
                                                            <li>Name : '.$formdata['org_fname'].' '.$formdata['org_lname'].'</li>
                                                            <li>Comapny : '.$formdata['org_cname'].'</li>
                                                            <li>Email : '.$org_email.'</li>
                                                            <li>Subscription Type : '.$type.'</li>
                                                            <li>Sign-up Date : '.date("Y-m-d H:i:s").'</li>
                                                            <li>Subscription Start Date : '.date("Y-m-d").'</li>
                                                            <li>Subscription End Date : '.Date('Y-m-d', strtotime('+'.$days. 'days')).'</li>
                                                        </ul>
                                                        <p>Please ensure that all necessary actions are taken to provide the best service to our new customer.</p>
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
                                                        <a href="'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; color: #fff; text-decoration: none;">Buroforce.com</p></a>
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
                </html>
                ';
                $this->load->library('phpmailer_lib');
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

                if(!$mail->send())
                {
                    echo 'Mail could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
                else
                {
                    return 1;
                }
            }
        }
      }
    }
}
