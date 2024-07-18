<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Adminauthentication extends CI_Model
{
	function __construct()
	{
		parent::__construct(); // construct the Model class
		$this->load->database();
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

	//---------------------------------------------------------------------------------
	public function check_user($username, $password)
	{
		$res = $this->db->query(" SELECT count(id) as count FROM `tbl_admin_login` WHERE `email`='$username' and `Password`='$password' and user_status = 1 ")->row();
		$count = $res->count;
		if ($count == 1) {
			$res1 = $this->db->query(" SELECT *  FROM `tbl_admin_login` WHERE `email`='$username' ")->row();

			$this->db->select('org_cname,plan_id,module_ids,org_company_attachment,org_timezone');
			$this->db->where('org_id', $res1->org_id);
			$organasation = $this->db->get("tbl_organisation")->row();

			// $this->db->SET('login_status',1);
			// $this->db->WHERE('id',$res1->id);
			// $this->db->Update("tbl_admin_login");

			$user_array = array(
				'id' => $res1->id,
				'admin_id' => $res1->id,
				'org_id' => $res1->org_id,
				'name' => $res1->name,
				'org_name' => $organasation->org_cname,
				'plan_id' => $organasation->plan_id,
				'module_ids' => $organasation->module_ids,
				'org_company_attachment' => $organasation->org_company_attachment,
				'username' => $res1->email,
				'user_type' => $res1->user_type,
				'user_status' => $res1->user_status,
				'schedule_view' => $res1->schedule_view,
				'update_permission' => $res1->update_permission,
				'org_timezone' => $organasation->org_timezone
			);
			// print_r($user_array);
			$this->session->set_userdata($user_array);
			echo 1;



			// if($res1->login_status==1)
			// {
			//    echo 2;
			// }
			// else
			// {
			//    $this->db->SET('login_status',1);
			//    $this->db->WHERE('id',$res1->id);
			//    $this->db->Update("tbl_admin_login");

			//    $user_array=array(
			//   		'id'=>$res1->id,
			//   		'admin_id'=>$res1->id,
			//   		'org_id'=>$res1->org_id,
			//   		'name'=>$res1->name,
			//   		'org_name'=>$organasation->org_cname,

			//   		'plan_id'=>$organasation->plan_id,
			//   		'module_ids'=>$organasation->module_ids,

			//   		'username'=>$res1->email,
			//   		'user_type'=>$res1->user_type,
			//   		'user_status'=>$res1->user_status,
			//   		'schedule_view' => $res1->schedule_view,
			//   		'update_permission' => $res1->update_permission
			//  	);
			// // print_r($user_array);
			// $this->session->set_userdata($user_array);
			// echo 1;
			// }



		} else {
			echo 0;
		}
	}

	public function forgotpassword($email)
	{
		return $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `email`='$email'")->row();
	}
	public function sendpassword_old($email)
	{
		$query1 = $this->db->query("SELECT *  from tbl_admin_login where email = '$email' ")->row();

		if ($query1) {
			$password = $query1->Password;
			$name = $query1->name;
			$html = '
				<html>
					<body>
					<table width="650px" style="background:#f2f2f2;color: #3D3D3D;border-radius:5px;box-shadow:0px 0px 5px #444;  padding: 15px;">		
						<tr>
							<td><b>Reset Password.</b></td>
						</tr>
						<tr>
							<td >&nbsp;</td>
						</tr>
						<tr>
							<td >Name : ' . $name . '</td>
						</tr>  
						<tr>
							<td >&nbsp;</td>
						</tr>    
								
						<tr>
								<td >
									You are receiving this email because you have requested to reset your password.<br>  
									Please find your password :- ' . $password . '
								</td>		
						</tr>
						<tr>
							<td >&nbsp;</td>
						</tr>  
					
						<tr>
						<td colspan="2"><strong><em>Warm regards.</em></strong></td>
						</tr>
						<tr>
						<td colspan="2"><strong>BuroMatrix Team</strong></td>
						</tr>
				</table>
					</body>
				</html>';


			
			$email_config = array(
				'protocol'  => 'SMTP',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => '465',
				'smtp_user' => 'contact@buromatrix.com',
				'smtp_pass' => 'Bur@@ForCe$$2019',
				'mailtype'  => 'html',
				'starttls'  => true,
				'newline'   => "\r\n"
			);

			$this->email->initialize($email_config);
			$sub = 'Change Password';
			$from = 'contact@buromatrix.com';
			// $cc_mail = 'ileaftechnology@gmail.com';
			$this->load->library('email', $email_config);
			$this->email->from($from, 'Sameer Deokar');
			$this->email->to($email);
			// $this->email->cc($cc_mail);
			$this->email->subject($sub);
			$this->email->message($html);
			$this->email->set_mailtype('html');
			$this->email->send();
			echo 2;
		}
	}
    
	public function sendpassword($email)
	{
		
		// $updateArray = array(
        //     'password' => $new_pass,
        //     'updated_date' => date("Y-m-d H:i:s")
        // );
		// $this->db->set($updateArray);
		// $this->db->where('email',$email);
		// $query = $this->db->update('tbl_admin_login');

		// if($query == TRUE)
		// {
			$query1 = $this->db->query("SELECT *  from tbl_admin_login where email = '$email' ")->row();
            $company_url = base_url();
			
			if ($query1) 
			{
				$password = $query1->Password;
				$name = $query1->name;
				$redi_url = $email;
				$url = base64_encode($redi_url);
				$ApproveURL = base_url() . 'CreateProfile/Forgotpasswordview/' . $url;
		
				$html = '
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
                                                    <img src="https://buroforce.progfeel.co.in/app-assets/image/thumb_reset_image_removebg.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                    <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Please Reset Your Password</h3>
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
                                                    <p>Hello '.$name.',</p>
                                                    <p>Seems like you forgot your password for Buro Matrix. Click below to reset your password.</p>
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
                                                <a href="'.$ApproveURL.'" style="color: #fff;text-decoration: none;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td bgcolor="#003399" style="border: none;padding: 12px 30px;display: inline-block;font-weight: 600;border-radius: 30px;text-decoration: none;">
                                                                    <a href="'.$ApproveURL.'" style="color: #fff;text-decoration: none;">Reset</a>
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
                                                <div style="padding: 0px 50px 0px 50px;">
                                                    <p style="margin-bottom: 0px;">If you did not forgot your password, please ignore this email.</p>
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
                                                    <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix | All Rights Reserved.</p>
                                                    <a href = "'.$company_url.'" style="text-decoration:none;"><p style="text-align: center; margin-top: 0;color: white;">BuroMatrix.com</p></a>
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

				// $email_config = array(
				// 	'protocol'  => 'SMTP',
				// 	'smtp_host' => 'smtp.gmail.com',
				// 	'smtp_port' => '21',
				// 	'smtp_user' => 'support@buroforce.com',
				// 	'smtp_pass' => 'Bur@@ForCe$$2019',
				// 	'mailtype'  => 'html',
				// 	'starttls'  => true,
				// 	'newline'   => "\r\n"
				// );

				

				// $this->email->initialize($email_config);
				// $sub = 'Change Password';
				// $cc_mail = 'ileaftechnology@gmail.com';
				// $this->load->library('email', $email_config);
				// $this->email->from($from, 'Sameer Deokar');
				// $this->email->to($email);
				// $this->email->cc($cc_mail);
				// $this->email->subject($sub);
				// $this->email->message($html);
				// $this->email->set_mailtype('html');
				// $this->email->send();
				// $this->email->from($from, 'Sameer Deokar');
				// $this->email->to($email);
				// // $this->email->cc($cc_mail);
				// $this->email->subject($sub);
				// $this->email->message($html);
				// $this->email->send();
				$sub = 'Change Password';
                // $cc_mail = 'ileaftechnology@gmail.com';

				$this->email->from($from, 'Sameer Deokar');
				$this->email->to($email);
				// $this->email->cc($cc_mail);
				$this->email->subject($sub);
				$this->email->message($html);

				if($this->email->send())
				{
					
					echo 2;
					// redirect('SignIn');
				}
				else
				{
					echo 1;
					// echo "email_not_sent";
                    // echo $this->email->print_debugger();
				}
			}
		// }
		
	}

	public function updatePassword($email,$new_pass,$confirm_pass)
	{
		$updateArray = array(
            'password' => $new_pass,
            'updated_date' => date("Y-m-d H:i:s")
        );
		$this->db->set($updateArray);
		$this->db->where('email',$email);
		$query = $this->db->update('tbl_admin_login');
		if($query == TRUE)
		{

		}
		else
		{

		}
	}

	public function LoginDetailsData()
    {
        return $this->db->query("SELECT * FROM `tbl_login_details`")->row();
    }
}
