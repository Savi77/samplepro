<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller 
{
	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Reminder_model');
			$data['get_data'] = $this->Reminder_model->get_data();

			$data['activity_get_data'] = $this->Reminder_model->activity_get_data();
			$data['contact_get_data'] = $this->Reminder_model->contact_get_data();
			$data['general_get_data'] = $this->Reminder_model->general_get_data();
			
			$data['sidebar']=array('menu' =>""); 
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();

			$data['type'] = 's_link';
			$data['page_name'] = 'Reminder';
			$data['sidebar']=array('menu' =>"Reminder");

			// $this->load->view('Admin/reminder_view',$data);
			$this->load->view('Admin/new_reminder_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_reminder()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$data = $this->input->post();
			$this->Reminder_model->add_reminder($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_reminder()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$reminder_id = $this->input->post('reminder_id');
			$this->Reminder_model->delete_reminder($reminder_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function edit_reminder()
	{
		if(isset($_SESSION['id']))
		{
            // geofence Notification ---------------------------
            $this->load->model('Admin/Dashboard_model');
            $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
            //------------------------------------------------

			$this->load->model('Admin/Reminder_model');
			$reminder_id = $_REQUEST['reminder_id'];
			$data['editschedule']=$this->Reminder_model->edit_reminder($reminder_id);
            $data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
			$this->load->view('Admin/edit_reminder_type',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function edit_recurring_data()
	{
		if(isset($_SESSION['id']))
		{
            // geofence Notification ---------------------------
            $this->load->model('Admin/Dashboard_model');
            $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
            //------------------------------------------------

			$this->load->model('Admin/Reminder_model');
			$reminder_id = $_REQUEST['recurring_id'];
			$data['editschedule']=$this->Reminder_model->edit_recurring_data($reminder_id);
            $data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
			$this->load->view('Admin/edit_recurring_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deleteRecurringReminder()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$recurring_id = $this->input->post('recurring_id');
			$this->Reminder_model->deleteRecurringReminder($recurring_id);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function update_reminder()
	{
		// echo"<pre>";
		// print_r($this->input->post());
		// die;
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$data = $this->input->post();
			$this->Reminder_model->update_reminder($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function updateRecurringReminder()
	{

		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$data = $this->input->post();
			$this->Reminder_model->updateRecurringReminder($data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function deactivate()
	{

		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Reminder_model');
			$data=$this->Reminder_model->deactivate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function activate()
	{
		if(isset($_SESSION['id']))
		{
		    $id=$_REQUEST['scheduletid'];
			$this->load->model('Admin/Reminder_model');
			$data=$this->Reminder_model->activate1($id);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function View($id)
	{
		if ($id != '') {
			$this->load->model('Admin/Reminder_model');
			$data['getRecurringData'] = $this->Reminder_model->getRecurringData($id);
			
			$data['reminder_id'] = $id;
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Reminder';
			$data['page_name_1'] = 'Reminder';
			$data['page_name_2'] = 'Recurring Reminder';
			$data['sidebar']=array('menu' =>"Reminder");
			// $this->load->view('Admin/recurring_reminder_view',$data);
			$this->load->view('Admin/new_recurring_reminder_view',$data);
		}else {
			redirect('admin/Reminder');
		}
	}

	public function deleteAllReminder()
	{
		$reminder_id = $this->input->post('reminder_id');
		$this->load->model('Admin/Reminder_model');
		$this->Reminder_model->deleteAllReminder($reminder_id);
	}

	public function reminderMailSend()
	{
		$today_date = date('Y-m-d');
		// $this->db->where('org_id',$this->session->org_id);
		$this->db->where('reminder_date',$today_date);
		$this->db->where('delete_status',0);
		$this->db->where('mail_sent',0);
        $this->db->from('tbl_reminder');
        $this->db->order_by('reminder_id','ASC');
        $reminderData = $this->db->get()->result_array();
        
		$email_value = "";
		$email_id_data = "";
		
		if(!empty($reminderData))
		{
			foreach ($reminderData as $rmd) 
			{
				if ($rmd['time_zone'] != '') {
					date_default_timezone_set($rmd['time_zone']);
				}else{
					date_default_timezone_set('Asia/Kolkata');
				}
				$currentTime = date('H:i:00');
				$user_id = $rmd['user_id'];
				$a = new DateTime(date('H:i:s',strtotime($rmd['reminder_time'])));
				$b = new DateTime(date('H:i:s',strtotime($rmd['reminder_before_time'])));
				$interval = $a->diff($b);
				$timeDiff = date('H:i:00',strtotime($interval->format("%H:%i:%s%s")));			
				
				if ($currentTime == $timeDiff) 
				{
					$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
					for ($i=0; $i < count($userData); $i++) { 
						$email_id_data=$email_id_data.$userData[$i]['email']." ,";
					}
					$email_value = trim($email_id_data, ',');
					if ($email_value != '') {
						// $email_config = Array(
						// 	'protocol'  => 'smtp',
						// 	'smtp_host' => 'mail.buroforce.com',
						// 	'smtp_port' => '465',
						// 	'smtp_user' => 'support@buroforce.com',
						// 	'smtp_pass' => 'Bur@@ForCe$$2019',
						// 	'mailtype'  => 'html',
						// 	'starttls'  => true,
						// 	'newline'   => "\r\n"
						// );
				
						$from = 'support@buroforce.com';
						
						$sub = $rmd['module_name'].' Reminder';

						$file = base_url().'assets/images/buro-force.jpg';
						$msg = "
						<style>
							tbody>tr>td {
								padding: 7px 15px !important;
							}
							.center {
								margin-left: auto;
								margin-right: auto;
							}
						</style>
						<table class='center'>
							<tr>
								<td colspan='2' style='padding: 0px !important;text-align: center;'>
									<img src='".$file."'/>
								</td>
							</tr>
							<tr>
								<td colspan='2' style='padding: 0px !important;text-align: center;'>
									<hr style='border: 2px solid #0f74b9;margin: 5px 0px 0px 0px'>
									<hr style='border: 2px solid #c63825;margin: 0px 0px 5px 0px;'>
								</td>
							</tr>
							<tr>
								<td colspan='2' style='padding: 0px !important;text-align: center;'>
									
								</td>
							</tr>
							<tr>
								<td  colspan='2' style='padding: 0px !important;text-align: center;'>
									<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='border-bottom: 1px solid #292728 !important;line-height: .1em !important;margin-left: auto;margin-right: auto;margin-top: 1.5%;text-align: center;'><span style='background: #fff;padding: 2px 12px;font-size: 19px;font-weight: 600;border: 1px solid #e1e1e1;'> Reminder </span></p>
								</td>
							</tr>
							<tr>
								<td colspan='2' style='padding: 0px !important;text-align: center;'>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td colspan='2' style='padding: 0px !important;'>
								<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
									<tr>
										<td>Title </td>
										<td>:&nbsp;".$rmd['reminder_title']."</td>
									</tr>
									<tr>
										<td>Module</td>
										<td>:&nbsp;".$rmd['module_name']."</td>
									</tr>
									<tr>
										<td>Notes</td>
										<td>:&nbsp;".$rmd['reminder_note']."</td>
									</tr>
									<tr>
										<td>Date & Time of</td>
										<td>:&nbsp;".date('d M Y',strtotime($rmd['reminder_date']))." at ".date('H:i',strtotime($rmd['reminder_time']))."</td>
									</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td colspan='2' style='padding: 0px !important;'>
									<hr style='border: 2px solid #fdc90b;margin: 5px 0px 0px 0px;'>
									<hr style='border: 2px solid #068641;margin: 0px 0px 5px 0px;'>
								</td>
							</tr>
						</table>
						";
						// $this->load->library('email', $email_config);
						// $this->email->from($from, 'Buroforce');
						// $this->email->to($email_value);
						// // $this->email->bcc('ileaftechnology@gmail.com');
						// $this->email->subject($sub);
						// $this->email->message($msg);
						// $this->email->set_mailtype('html');
						// if ($this->email->send()) {
						// 	$this->db->set('mail_sent',1);
						// 	$this->db->where('reminder_id',$rmd['reminder_id']);
						// 	$this->db->update('tbl_reminder');	
						// }
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
						
						$mail->setFrom($from, 'Buroforce');
					
						$mail->addAddress($email_value);
						
						$mail->Subject = $sub;
						
						$mail->isHTML(true);
						
						$mail->Body = $msg;
						
						// $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

						if(!$mail->send())
						{
							// echo 'Mail could not be sent.';
							// echo 'Mailer Error: ' . $mail->ErrorInfo;
							echo 0;
						}
						else
						{
							$this->db->set('mail_sent',1);
							$this->db->where('reminder_id',$rmd['reminder_id']);
							$this->db->update('tbl_reminder');	
							echo 1;
						}
					}  
				}
				else
				{
					echo "No Cron Job found";
				}
			}
		}
		else
		{
			echo "No Cron Job Found";
		}
		
	}
	
	public function recurringData()
	{
		$today_date = date('Y-m-d');
		// $this->db->where('org_id',$this->session->org_id);
		// $this->db->where('recurring_set',1);
		// $this->db->where('delete_status',0);
		// $this->db->where('mail_sent',0);
        // $this->db->from('tbl_reminder');
        // $this->db->order_by('reminder_id','ASC');
        // $reminderData = $this->db->get()->result_array();		
		// var_dump($reminderData);

		$recurringData = $this->db->query('SELECT * FROM `tbl_reminder_recurring` JOIN tbl_reminder ON tbl_reminder.reminder_id = tbl_reminder_recurring.reminder_id WHERE recurring_mail_sent = 0 AND  tbl_reminder_recurring.recurring_date = "'.$today_date.'"')->result_array();
		
		$email_value = "";
		$email_id_data = "";
		foreach ($recurringData as $rec) {
			if ($rec['time_zone'] != '') {
				date_default_timezone_set($rec['time_zone']);
			}else{
				date_default_timezone_set('Asia/Kolkata');
			}
            $currentTime = date('H:i:00');
			$user_id = $rec['recurring_user_id'];
			$timeDiff = $rec['recurring_time'];
			if ($currentTime == $timeDiff) {
				$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
				for ($i=0; $i < count($userData); $i++) { 
					$email_id_data=$email_id_data.$userData[$i]['email']." ,";
				}
				$email_value = trim($email_id_data, ',');
				if ($email_value != '') {
					// $email_config = Array(
					// 	'protocol'  => 'smtp',
					// 	'smtp_host' => 'mail.buroforce.com',
					// 	'smtp_port' => '465',
					// 	'smtp_user' => 'support@buroforce.com',
					// 	'smtp_pass' => 'Bur@@ForCe$$2019',
					// 	'mailtype'  => 'html',
					// 	'starttls'  => true,
					// 	'newline'   => "\r\n"
					// );
			
					$from = 'support@buroforce.com';
					
					$sub = $rec['module_name'].' Reminder';

					$file = base_url().'assets/images/buro-force.jpg';
					$msg = "
					<style>
						tbody>tr>td {
							padding: 7px 15px !important;
						}
						.center {
							margin-left: auto;
							margin-right: auto;
						}
						.line-on-side {		
							border-bottom: 1px solid #292728 !important;
							line-height: .1em !important;
							margin-left: auto;
							margin-right: auto;
							margin-top: 1.5%;
						}
						.line-on-side span {
							background: #fff;
							padding: 2px 12px;
							font-size: 19px;
							font-weight: 600;
							border: 1px solid #e1e1e1;
						}
					</style>
					<table class='center'>
						<tr>
							<td colspan='2' style='padding: 0px !important;text-align: center;'>
								<img src='".$file."'/>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;text-align: center;'>
								<hr style='border: 2px solid #0f74b9;'>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;text-align: center;'>
								<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;text-align: center;'>
								
							</td>
						</tr>
						<tr>
							<td  colspan='2' style='padding: 0px !important;text-align: center;'>
								<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;text-align: center;'>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;'>
							<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
								<tr>
									<td>Title </td>
									<td>:&nbsp;".$rec['reminder_title']."</td>
								</tr>
								<tr>
									<td>Module</td>
									<td>:&nbsp;".$rec['module_name']."</td>
								</tr>
								<tr>
									<td>Notes</td>
									<td>:&nbsp;".$rec['reminder_note']."</td>
								</tr>
								<tr>
									<td>Date & Time of</td>
									<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;'>
								<hr style='border: 2px solid #fdc90b;'>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='padding: 0px !important;'>
								<hr style='border: 2px solid #068641;    margin-top: -10px;'>
							</td>
						</tr>
					</table>
					";
					// $this->load->library('email', $email_config);
					// $this->email->from($from, 'Buroforce');
					// $this->email->to($email_value);
					// // $this->email->bcc('ileaftechnology@gmail.com');
					// $this->email->subject($sub);
					// $this->email->message($msg);
					// $this->email->set_mailtype('html');
					// if ($this->email->send()) {
					// 	$this->db->set('recurring_mail_sent',1);
					// 	$this->db->where('recurring_id',$rec['recurring_id']);
					// 	$this->db->update('tbl_reminder');	
					// }
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
					
					$mail->setFrom($from, 'Buroforce');
				
					$mail->addAddress($email_value);
					
					$mail->Subject = $sub;
					
					$mail->isHTML(true);
					
					$mail->Body = $msg;
					
					// $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 

					if(!$mail->send())
					{
						// echo 'Mail could not be sent.';
						// echo 'Mailer Error: ' . $mail->ErrorInfo;
						echo 0;
					}
					else
					{
						$this->db->set('recurring_mail_sent',1);
						$this->db->where('recurring_id',$rec['recurring_id']);
						$this->db->update('tbl_reminder');	
						echo 1;
					}
				}
			}
			/*
				if ($rec['interval_type'] == 'week') {				
				}

				if ($rec['interval_type'] == 'monthly') {
					$day = date('d',strtotime($rec['reminder_date']));				
					$nextMonthDate = date('Y-m-'.$day,strtotime('first day of +1 month'));
					
					if ($today_date == $rec['recurring_eod'] && $day == date('d',strtotime($rec['recurring_eod']))) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								if ($this->email->send()) {
									$this->db->set('mail_sent',1);
									$this->db->where('reminder_id',$rec['reminder_id']);
									$this->db->update('tbl_reminder');	
								}
							}
						}
					}elseif ($nextMonthDate < $rec['recurring_eod']) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								$this->email->send();
							}						
						}
					}
				}

				if ($rec['interval_type'] == 'fortnightly') {
					$day = date('d',strtotime($rec['reminder_date']));				
					
					$nextFortnightlyDate = strtotime('+15 days','Y-m-'.$day);
					
					if ($today_date == $rec['recurring_eod'] && $day == date('d',strtotime($rec['recurring_eod']))) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								if ($this->email->send()) {
									$this->db->set('mail_sent',1);
									$this->db->where('reminder_id',$rec['reminder_id']);
									$this->db->update('tbl_reminder');	
								}
							}
						}
					}elseif ($nextFortnightlyDate < $rec['recurring_eod']) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								$this->email->send();
							}
						}
					}
				}

				if ($rec['interval_type'] == 'quaterly') {
					$day = date('d',strtotime($rec['reminder_date']));
					$nextQuaterDate = date('Y-m-'.$day,strtotime('first day of +3 month'));
					
					if ($today_date == $rec['recurring_eod'] && $day == date('d',strtotime($rec['recurring_eod']))) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								if ($this->email->send()) {
									$this->db->set('mail_sent',1);
									$this->db->where('reminder_id',$rec['reminder_id']);
									$this->db->update('tbl_reminder');	
								}
							}
						}
					}elseif ($nextQuaterDate < $rec['recurring_eod']) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								$this->email->send();
							}
						}
					}
				}

				if ($rec['interval_type'] == 'half-quarterly') {
					$day = date('d',strtotime($rec['reminder_date']));
					$nextHalfQuarteDate = date('Y-m-'.$day,strtotime('first day of +6 month'));
					
					if ($today_date == $rec['recurring_eod'] && $day == date('d',strtotime($rec['recurring_eod']))) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								if ($this->email->send()) {
									$this->db->set('mail_sent',1);
									$this->db->where('reminder_id',$rec['reminder_id']);
									$this->db->update('tbl_reminder');	
								}
							}
						}
					}elseif ($nextHalfQuarteDate < $rec['recurring_eod']) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								$this->email->send();
							}
						}
					}
				}

				if ($rec['interval_type'] == 'yearly') {
					$day = date('d',strtotime($rec['reminder_date']));
					$nextYearDate = date('Y-m-'.$day,strtotime('first day of +12 month'));
					
					if ($today_date == $rec['recurring_eod'] && $day == date('d',strtotime($rec['recurring_eod']))) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								if ($this->email->send()) {
									$this->db->set('mail_sent',1);
									$this->db->where('reminder_id',$rec['reminder_id']);
									$this->db->update('tbl_reminder');	
								}
							}
						}
					}elseif ($nextYearDate < $rec['recurring_eod']) {
						if ($currentTime == $timeDiff) {
							$userData = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` IN ('.$user_id.')')->result_array();
							for ($i=0; $i < count($userData); $i++) { 
								$email_id_data=$email_id_data.$userData[$i]['email']." ,";
							}
							$email_value = trim($email_id_data, ',');
							if ($email_value != '') {
								$email_config = Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'mail.buroforce.com',
									'smtp_port' => '465',
									'smtp_user' => 'support@buroforce.com',
									'smtp_pass' => 'Bur@@ForCe$$2019',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
								);
						
								$from = 'support@buroforce.com';
								
								$sub = $rec['module_name'].' Reminder';

								$file = base_url().'assets/images/buro-force.jpg';
								$msg = "
								<style>
									tbody>tr>td {
										padding: 7px 15px !important;
									}
									.center {
										margin-left: auto;
										margin-right: auto;
									}
									.line-on-side {		
										border-bottom: 1px solid #292728 !important;
										line-height: .1em !important;
										margin-left: auto;
										margin-right: auto;
										margin-top: 1.5%;
									}
									.line-on-side span {
										background: #fff;
										padding: 2px 12px;
										font-size: 19px;
										font-weight: 600;
										border: 1px solid #e1e1e1;
									}
								</style>
								<table class='center'>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<img src='".$file."'/>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #0f74b9;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											<hr style='border: 2px solid #c63825;    margin-top: -10px;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											
										</td>
									</tr>
									<tr>
										<td  colspan='2' style='padding: 0px !important;text-align: center;'>
											<p class='card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1' style='text-align: center;'><span> Reminder </span></p>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;text-align: center;'>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
										<table style='background: #fff;border: 1px solid #e1e1e1; width: 100%;' >
											<tr>
												<td>Title </td>
												<td>:&nbsp;".$rec['reminder_title']."</td>
											</tr>
											<tr>
												<td>Module</td>
												<td>:&nbsp;".$rec['module_name']."</td>
											</tr>
											<tr>
												<td>Notes</td>
												<td>:&nbsp;".$rec['reminder_note']."</td>
											</tr>
											<tr>
												<td>Date & Time of</td>
												<td>:&nbsp;".date('d M Y',strtotime($rec['reminder_date']))." at ".date('H:i',strtotime($rec['reminder_time']))."</td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #fdc90b;'>
										</td>
									</tr>
									<tr>
										<td colspan='2' style='padding: 0px !important;'>
											<hr style='border: 2px solid #068641;    margin-top: -10px;'>
										</td>
									</tr>
								</table>
								";
								$this->load->library('email', $email_config);
								$this->email->from($from, 'Buroforce');
								$this->email->to($email_value);
								$this->email->bcc('ileaftechnology@gmail.com');
								$this->email->subject($sub);
								$this->email->message($msg);
								$this->email->set_mailtype('html');
								$this->email->send();
							}
						}
					}
				}
			*/
		}
	}

	public function getEmailId($userData)
	{
		$email_id="";
		for ($i=0; $i < count($userData); $i++) { 
			$email_id=$email_id.$userData[$i]['email']." ,";
		}
		return $email_id = trim($email_id, ',');
	}
}