<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleBaseEmailSend_weekly extends CI_Controller 
{
    public function Index()
	{
        $this->db->select('*'); // Selects all columns, replace '*' with specific column names if needed
        $this->db->from('tbl_userwise_role_report'); // Replace 'your_table' with your actual table name
        $this->db->where('frequency','weekly'); 
        $query = $this->db->get()->result();
        
        foreach($query as $value)
        {
            $frequency_id = $value->frequency_id;
            $report_id = $value->report_id;
            $user_id = $value->user_id;
            $report = $value->report_name;

            $currentTime = date('H:i:00');
            $currentDate = date('Y-m-d');
            $currentday = date('d', strtotime($currentDate));
            

            $get_frequency = $this->db->select('frequency')->from('tbl_frequency_type')->where('id',$frequency_id)->get()->row()->frequency;

            $get_details = $this->db->select('*')->from('tbl_frequency_wise_report_type')->where('frquency_id',$frequency_id)->where('report_type_id',$report_id)->get()->row();
            $start_date = date('Y-m-d', strtotime($get_details->start_date));
            $startday = date('d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($get_details->end_date));
            $time = date('H:i:00',strtotime($get_details->schedule_time));
            

            $useremail = $this->db->query('SELECT `email` FROM `tbl_admin_login` WHERE `id` = '.$user_id.'')->row()->email;
            $userename = $this->db->query('SELECT `name` FROM `tbl_admin_login` WHERE `id` = '.$user_id.'')->row()->name;
            $org_id = $this->db->query('SELECT `org_id` FROM `tbl_admin_login` WHERE `id` = '.$user_id.'')->row()->org_id;

            $usercompany = $this->db->query('SELECT `org_cname` FROM `tbl_organisation` JOIN `tbl_admin_login` ON `tbl_admin_login`.`org_id` = `tbl_organisation`.`org_id` WHERE `tbl_admin_login`.`id` = '.$user_id.'')->row()->org_cname;
            $start_date = date('Y-m-d', strtotime('-7 days'));
            
            if($start_date <= $currentDate && $currentDate <= $end_date)
            {
                if ($currentTime == $time) 
                {
                    if($report == 'Product Lead')
                    {
                        
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                    

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 
                        $monthName = date('M');
                        $formattedYear = date('Y') % 100;
                        $monthName1 = date('F');
                        $formattedYear1 = date('Y');

                      
                        $showyear = $monthName . '-' .$formattedYear;
                        $showyear1 = $monthName1 . '-' .$formattedYear1;

                        $years = array($showyear);
                        $years1 = array($showyear1);

                        // for ($month = 4; $month <= 3 + 12; $month++) 
                        // {
                        //     // Calculate month and year
                        //     $monthInFinancialYear = ($month - 1) % 12 + 1;
                        //     $year = $financialYearStart + floor(($month - 1) / 12);
                        
                        //     // Format the month and year
                        //     $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                        //     $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                        //     $formattedYear = $year % 100 ;
                        //     $formattedYear1 = $year;

                        
                        //     // Output the month and year
                        //     $years[]= $monthName . '-' .$formattedYear;
                        //     $years1[]= $monthName1 . '-' .$formattedYear1;
                        // }

                        $product = $this->db->select('*')->from('tbl_product_service_list')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Product Leads</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Product Lead Reprot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px;">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Products/Service</th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                foreach($product as $prd)
                                                                                {
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;">'.$prd->prdsrv_name.'</td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                                }
                                                                                
                                                                                $html .= '<tr>
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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

                       
                    
                        $this->load->library('phpmailer_lib');
                        $mail = $this->phpmailer_lib->load();
                        $mail->isSMTP();
                        $mail->Host     = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'contact@buromatrix.com';
                        $mail->Password = 'khujsqoduyvcgxmy';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port     = '465';
                        
                        $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                            $mail->addAddress($useremail);
                            $mail->Subject = 'Product Lead Report For Active Year';
                            $mail->isHTML(true);
                            $mail->Body = $html;
                            if(!$mail->send())
                            {
                                echo 0;
                            }
                            else
                            {
                                echo 1;
                            }

                    }

                    else if($report == 'Monthly Lead')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                    

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 
                        $monthName = date('M');
                        $formattedYear = date('Y') % 100;
                        $monthName1 = date('F');
                        $formattedYear1 = date('Y');

                      
                        $showyear = $monthName . '-' .$formattedYear;
                        $showyear1 = $monthName1 . '-' .$formattedYear1;

                        $years = array($showyear);
                        $years1 = array($showyear1);

                        // for ($month = 4; $month <= 3 + 12; $month++) {
                        //     // Calculate month and year
                        //     $monthInFinancialYear = ($month - 1) % 12 + 1;
                        //     $year = $financialYearStart + floor(($month - 1) / 12);
                        
                        //     // Format the month and year
                        //     $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                        //     $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                        //     $formattedYear = $year % 100 ;
                        //     $formattedYear1 = $year;

                        
                        //     // Output the month and year
                        //     $years[]= $monthName . '-' .$formattedYear;
                        //     $years1[]= $monthName1 . '-' .$formattedYear1;
                        // }

                        $product = $this->db->select('*')->from('tbl_product_service_list')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Monthly Leads</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Monthly Lead Reprot assigned to you for current active year monthwise.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px;">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;"></th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;"></td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                               
                                                                                
                                                                                $html .= '<tr>
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                    
                        
                        $this->load->library('phpmailer_lib');
                        $mail = $this->phpmailer_lib->load();
                        $mail->isSMTP();
                        $mail->Host     = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'contact@buromatrix.com';
                        $mail->Password = 'khujsqoduyvcgxmy';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port     = '465';
                        
                        $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                        $mail->addAddress($useremail);
                        $mail->Subject = 'Monthly Lead Report For Active Year';
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        if(!$mail->send())
                        {
                            echo 0;
                        }
                        else
                        {
                            echo 1;
                        }
                    }

                    else if($report == 'User Lead')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                    

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 
                        $monthName = date('M');
                        $formattedYear = date('Y') % 100;
                        $monthName1 = date('F');
                        $formattedYear1 = date('Y');

                      
                        $showyear = $monthName . '-' .$formattedYear;
                        $showyear1 = $monthName1 . '-' .$formattedYear1;

                        $years = array($showyear);
                        $years1 = array($showyear1);

                        // for ($month = 4; $month <= 3 + 12; $month++) {
                        //     // Calculate month and year
                        //     $monthInFinancialYear = ($month - 1) % 12 + 1;
                        //     $year = $financialYearStart + floor(($month - 1) / 12);
                        
                        //     // Format the month and year
                        //     $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                        //     $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                        //     $formattedYear = $year % 100 ;
                        //     $formattedYear1 = $year;

                        
                        //     // Output the month and year
                        //     $years[]= $monthName . '-' .$formattedYear;
                        //     $years1[]= $monthName1 . '-' .$formattedYear1;
                        // }

                        // $product = $this->db->select('*')->from('tbl_product_service_list')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">User Leads</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Product Lead Reprot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px;">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$userename.'</th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                foreach($userename as $name)
                                                                                {
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;">'.$prd->prdsrv_name.'</td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                                }
                                                                                
                                                                                $html .= '<tr>
                                                                                            
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                        
                        // echo "<pre>";
                        // print_r($html);
                        // die;
                       
                        $this->load->library('phpmailer_lib');
                            $mail = $this->phpmailer_lib->load();
                            $mail->isSMTP();
                            $mail->Host     = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contact@buromatrix.com';
                            $mail->Password = 'khujsqoduyvcgxmy';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port     = '465';
                            
                            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                        $mail->addAddress($useremail);
                        $mail->Subject = 'Product Lead Report For Active Year';
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        if(!$mail->send())
                        {
                            echo 0;
                        }
                        else
                        {
                            echo 1;
                        } 
                    }
                    
                    else if($report == 'Sales Force Score')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                    

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 
                        $monthName = date('M');
                        $formattedYear = date('Y') % 100;
                        $monthName1 = date('F');
                        $formattedYear1 = date('Y');

                      
                        $showyear = $monthName . '-' .$formattedYear;
                        $showyear1 = $monthName1 . '-' .$formattedYear1;

                        $years = array($showyear);
                        $years1 = array($showyear1);

                        // for ($month = 4; $month <= 3 + 12; $month++) {
                        //     // Calculate month and year
                        //     $monthInFinancialYear = ($month - 1) % 12 + 1;
                        //     $year = $financialYearStart + floor(($month - 1) / 12);
                        
                        //     // Format the month and year
                        //     $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                        //     $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                        //     $formattedYear = $year % 100 ;
                        //     $formattedYear1 = $year;

                        
                        //     // Output the month and year
                        //     $years[]= $monthName . '-' .$formattedYear;
                        //     $years1[]= $monthName1 . '-' .$formattedYear1;
                        // }

                        // $product = $this->db->select('*')->from('tbl_product_service_list')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Sales Force Score</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Sales Force Score Reprot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px;">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$userename.'</th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                foreach($userename as $name)
                                                                                {
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;">'.$prd->prdsrv_name.'</td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                                }
                                                                                
                                                                                $html .= '<tr>
                                                                                            
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                        // echo "<pre>";
                        // print_r($html);
                        // die;
                   
                        $this->load->library('phpmailer_lib');
                            $mail = $this->phpmailer_lib->load();
                            $mail->isSMTP();
                            $mail->Host     = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contact@buromatrix.com';
                            $mail->Password = 'khujsqoduyvcgxmy';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port     = '465';
                            
                            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                        $mail->addAddress($useremail);
                        $mail->Subject = 'Sales Force Score Report For Active Year';
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        if(!$mail->send())
                        {
                            echo 0;
                        }
                        else
                        {
                            echo 1;
                        } 
                    }



                    else if($report == 'Sales Segment')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                    

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 
                        $monthName = date('M');
                        $formattedYear = date('Y') % 100;
                        $monthName1 = date('F');
                        $formattedYear1 = date('Y');

                      
                        $showyear = $monthName . '-' .$formattedYear;
                        $showyear1 = $monthName1 . '-' .$formattedYear1;

                        $years = array($showyear);
                        $years1 = array($showyear1);

                        // for ($month = 4; $month <= 3 + 12; $month++) {
                        //     // Calculate month and year
                        //     $monthInFinancialYear = ($month - 1) % 12 + 1;
                        //     $year = $financialYearStart + floor(($month - 1) / 12);
                        
                        //     // Format the month and year
                        //     $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                        //     $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                        //     $formattedYear = $year % 100 ;
                        //     $formattedYear1 = $year;

                        
                        //     // Output the month and year
                        //     $years[]= $monthName . '-' .$formattedYear;
                        //     $years1[]= $monthName1 . '-' .$formattedYear1;
                        // }

                        $segment = $this->db->select('*')->from('tbl_business')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Product Leads</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Product Lead Reprot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px; height: 330px">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Products/Service</th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                foreach($segment as $seg)
                                                                                {
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;">'.$seg->business_name.'</td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND business_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND business_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                                }
                                                                                
                                                                                $html .= '<tr>
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                        
                      
                       $this->load->library('phpmailer_lib');
                       $mail = $this->phpmailer_lib->load();
                       $mail->isSMTP();
                       $mail->Host     = 'smtp.gmail.com';
                       $mail->SMTPAuth = true;
                       $mail->Username = 'contact@buromatrix.com';
                       $mail->Password = 'khujsqoduyvcgxmy';
                       $mail->SMTPSecure = 'ssl';
                       $mail->Port     = '465';
                       
                       $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                        $mail->addAddress($useremail);
                        $mail->Subject = 'Sales Force Score Report For Active Year';
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        if(!$mail->send())
                        {
                            echo 0;
                        }
                        else
                        {
                            echo 1;
                        } 
                    }
                    else if($report == 'Sales Product')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = $financialYearStart . '-04-01';
                        $active_period_end_date = $financialYearEnd . '-03-31';

                        $totalLead = array_fill(0, count($years), 0); // Initialize with zeros for each year
                        $totalOpportunity = array_fill(0, count($years), 0); 

                        $years = array();
                        $years1 = array();

                        for ($month = 4; $month <= 3 + 12; $month++) {
                            // Calculate month and year
                            $monthInFinancialYear = ($month - 1) % 12 + 1;
                            $year = $financialYearStart + floor(($month - 1) / 12);
                        
                            // Format the month and year
                            $monthName = date('M', mktime(0, 0, 0, $monthInFinancialYear, 1));
                            $monthName1 = date('F', mktime(0, 0, 0, $monthInFinancialYear, 1));

                            $formattedYear = $year % 100 ;
                            $formattedYear1 = $year;

                        
                            // Output the month and year
                            $years[]= $monthName . '-' .$formattedYear;
                            $years1[]= $monthName1 . '-' .$formattedYear1;
                        }

                        $segment = $this->db->select('*')->from('tbl_business')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->result();
                    
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Product Leads</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Product Lead Reprot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px; height: 330px">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Products/Service</th>';
                                                                                    foreach($years as $row)
                                                                                    {
                                                                                    $html .= '<th colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                <tr>';
                                                                                
                                                                                foreach($segment as $seg)
                                                                                {
                                                                                $html .= '<td style="border: 1px solid black;padding: 8px;text-align: center;">'.$seg->business_name.'</td>';
                                                                                    
                                                                                    foreach($years1 as $index => $row1)
                                                                                    {
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND business_id = ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $leadCount = count($lead);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND business_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $oppCount = count($opp);
                                                                                        
                                                                                    $html .='<td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($lead).'</td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;">'.count($opp).'</td>';
                                                                                    }
                                                                                    
                                                                                $html .= '</tr>';
                                                                                }
                                                                                
                                                                                $html .= '<tr>
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Sub Total</strong></td>';
                                                                                                foreach($years1 as $row1)
                                                                                                {
                                                                                                    
                                                                                                    // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                                    list($month, $day) = explode('-', $row1);
                                                                                                    $monthNumerical = date('m', strtotime($month));

                                                                                                    $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                                    $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                                    $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                                    $totalleadCount = count($lead1);
                                                                                                    
                                                                                                    $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                                    $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                                    $totaloppCount = count($opp1);
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalleadCount.'</strong></td>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totaloppCount.'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>
                                                                                <tr>
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Total</strong></td>';
                                                                                    $totalleadCount = array();
                                                                                    $totaloppCount = array();
                                                                                    foreach($years1 as $row1)
                                                                                    {
                                                                                        
                                                                                        // SELECT * FROM `tbl_leads_opportunitys` WHERE DATE(created_date) >= '2024-04-01' AND DATE(created_date) <= '2025-03-31' AND `product_id` = '3'
                                                                                        list($month, $day) = explode('-', $row1);
                                                                                        $monthNumerical = date('m', strtotime($month));

                                                                                        $s1 = $day. '-' .$monthNumerical. '-01';
                                                                                        $e1 = $day. '-' .$monthNumerical. '-31';

                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND assign_to = ? AND customer_type = 'Lead'";
                                                                                        $lead1 = $this->db->query($query, array($s1, $e1,$user_id))->result_array();
                                                                                        $totalleadCount = count($lead1);
                                                                                        
                                                                                        $query = "SELECT * FROM tbl_leads_opportunity WHERE DATE(created_date) >= ? AND DATE(created_date) <= ? AND product_id = ? AND assign_to = ? AND customer_type = 'Opportunity'";
                                                                                        $opp1 = $this->db->query($query, array($s1, $e1, $prd->prd_srv_id,$user_id))->result_array();
                                                                                        $totaloppCount= count($opp1);

                                                                                        $totalSum = $totalleadCount + $totaloppCount;

                                                                                    $html .= '<td colspan="2" style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.$totalSum.'</strong></td>';
                                                                                    }
                                                                                $html .= '</tr>
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                        
                      
                        $this->load->library('phpmailer_lib');
                        $mail = $this->phpmailer_lib->load();
                        $mail->isSMTP();
                        $mail->Host     = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'contact@buromatrix.com';
                        $mail->Password = 'khujsqoduyvcgxmy';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port     = '465';
                        
                        $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                        $mail->addAddress($useremail);
                        $mail->Subject = 'Sales Force Score Report For Active Year';
                        $mail->isHTML(true);
                        $mail->Body = $html;
                        if(!$mail->send())
                        {
                            echo 0;
                        }
                        else
                        {
                            echo 1;
                        } 
                    }


                    else if($report == 'Time Slot')
                    {
                        $get_active_period = $this->db->select('*')->from('tbl_org_account_period')->where('org_id',$org_id)->where('status',1)->get()->row();
                        
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';
                        
                        $get_shift = $this->db->select('*')->from('tbl_shift_timing')->where('org_id',$org_id)->where('status',1)->where('delete_status',0)->get()->row();
                        

                        $from_time_str = $get_shift->from_timing; 
                        $to_time_str = $get_shift->to_timing;    

                        $from_time = new DateTime($from_time_str);
                        $to_time = new DateTime($to_time_str);

                        $current_time = clone $from_time;

                        $show_time = array();
                        $show_time1 = array();

                        while ($current_time < $to_time) {
                            $start_time = $current_time->format('H:i') . ' - ';

                            $start_time1 = $current_time->format('H:i:s') . ' - ';

                            
                            $current_time->add(new DateInterval('PT1H'));
                            
                            $end_time = min($current_time, $to_time);
                            $final_time = $end_time->format('H:i');
                            $final_time1 = $end_time->format('H:i:s');


                            $show_time[] = $start_time . $final_time;
                            $show_time1[] = $start_time1. $final_time1;


                        }
                        
                        $html = '
                        <html>
                            <section>
                                <center style="width: 100%;">
                                    <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="background-color: #003399;padding: 30px;">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="text-center" >
                                                                        <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Time Slot</h3>
                                                                        <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                        <p>Dear '.$userename.',</p>
                                                                        <p>Below are the Time Slot assigned to you for current active year.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="overflow: auto;width: 540px;">
                                                                        <table border="0" cellspacing="0" cellpadding="4" width="100%" style="width: 100%; border-collapse: collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th rowspan="2" style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;"></th>';
                                                                                    foreach($show_time as $row)
                                                                                    {
                                                                                    $html .= '<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">'.$row.'</th>';
                                                                                    }
                                                                                $html .='</tr>
                                                                                <tr>';
                                                                                foreach($years as $row)
                                                                                {
                                                                                    $html .='<th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Lead</th>
                                                                                    <th style="border: 1px solid black;padding: 8px;text-align: center;background-color: #f2f2f2;">Opportunity</th>';
                                                                                }
                                                                                $html .= '</tr>
                                                                            </thead>
                                                                                <tbody>
                                                                                ';
                                                            
                                                                                
                                                                                $html .= '<tr>
                                                                                            <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>Task Avalabilty</strong></td>';
                                                                                                foreach($show_time1 as $row1)
                                                                                                {
                                                                                                    list($start, $end) = explode('-', $row1);

                                                                                                    $s1 = $start;
                                                                                                    $e1 = $end;
                                                                                                    
                                                                                                    $get_task = $this->db->select('*')->from('tbl_schedule')->where('assign_date >=', $active_period_start_date)->where('assign_date <=', $active_period_end_date)->where('assign_starttime',$s1)->where('assign_endtime',$e1)->get()->result();
                                                                                                    
                                                                                    $html .= '
                                                                                    <td style="border: 1px solid black;padding: 8px;text-align: center;"><strong>'.count($get_task).'</strong></td>';
                                                                                                }
                                                                                $html .= '</tr>';

                                                                                $html .= '
                                                                            </tbody>
                                                                        </table>
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
                                                                        <p>Management</p>
                                                                        <p>'.$usercompany.'</p>
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
                                                                        <p style=" margin-bottom: 0;">Copyright © 2023 BuroMatrix.com | All Rights Reserved.</p>
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
                      
                    
                        $this->load->library('phpmailer_lib');
                        $mail = $this->phpmailer_lib->load();
                        $mail->isSMTP();
                        $mail->Host     = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'contact@buromatrix.com';
                        $mail->Password = 'khujsqoduyvcgxmy';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port     = '465';
                        
                        $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                            $mail->addAddress($useremail);
                            $mail->Subject = 'Time Slot For Active Year';
                            $mail->isHTML(true);
                            $mail->Body = $html;
                            if(!$mail->send())
                            {
                                echo 0;
                            }
                            else
                            {
                                echo 1;
                            }
                    }
                   
                    else if($report == 'Resource Task')
                    {
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                        $get_task = $this->db->select('*,tbl_user_query.ticket_no as tickect')->from('tbl_user_query')->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id')->where('tbl_user_query.assign_to',$user_id)->where('tbl_schedule.assign_date >=',$active_period_start_date)->where('tbl_schedule.assign_date <=',$active_period_end_date)->where('tbl_user_query.status !=','completed')->get()->result();
                        
                        $over_due_task = $this->db->select('*,tbl_user_query.ticket_no as tickect')->from('tbl_user_query')->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id')->where('tbl_user_query.assign_to',$user_id)->where('tbl_schedule.assign_date <',$active_period_end_date)->where('tbl_user_query.status !=','completed')->get()->result();
    

                        if(!empty($get_task))
                        {
                            $html = 
                            '<html>
                                <section>
                                    <center style="width: 100%;">
                                        <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <div class="text-center" >
                                                                            <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Montly Task Assignment</h3>
                                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                            <p>Dear '.$userename.',</p>
                                                                            <p>Below are the tasks assigned to you for last 1 year.</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div align="center" style="overflow: auto;width: 540px;">
                                                                            <table border="0" cellspacing="0" cellpadding="4" width="100%" style="border-collapse:collapse;overflow-x: auto;">
                                                                                <thead>
                                                                                    <tr style="border: 1px solid black">
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Sr No</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Time</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Ticket Id</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Customer Name</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Product / Service</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Priority</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Remarks/Narration</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>';
                                                                                $count = 1;
                                                                                foreach($get_task as $value)
                                                                                { 
                                                                                    $customer_name = $this->db->select('company_name')->from('tbl_customer')->where('customer_id',$value->customer_id)->get()->row()->company_name;
                                                                                    $html .='<tr style="border: 1px solid black">
                                                                                    <td><div style="text-align: center;">'.$count.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.date('H:i a',strtotime($value->assign_starttime)).'-' .date('H:i a',strtotime($value->assign_endtime)).'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->tickect.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$customer_name.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->product_name.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->priority.'</div></td>
                                                                                    <td><div style="width: 150px;text-align: center;">'.$value->issue.'</div></td>
                                                                                    </tr>';
                                                                                $count ++;
                                                                                }
                                                                                $html .='</tbody>
                                                                            </table>
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
                                                                            <p>Overdue Task(s) : '.count($over_due_task).'</p>
                                                                            <p>Please make sure to complete these tasks by the specified deadlines.</p>
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
                                                                            <p>Management</p>
                                                                            <p>'.$usercompany.'</p>
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
                            
                            $this->load->library('phpmailer_lib');
                            $mail = $this->phpmailer_lib->load();
                            $mail->isSMTP();
                            $mail->Host     = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contact@buromatrix.com';
                            $mail->Password = 'khujsqoduyvcgxmy';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port     = '465';
                            
                            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                            $mail->addAddress($useremail);
                            // $mail->addAddress('p.shinde@splendornet.com');
                            $mail->Subject = 'Yearly Task Assignment';
                            $mail->isHTML(true);
                            $mail->Body = $html;
                            if(!$mail->send())
                            {
                                echo 0;
                            }
                            else
                            {
                                echo 1;
                            }
                        }
                    }

                    else if($report == 'Task Today')
                    {
                        $currentMonth = date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 4) 
                        {
                            $financialYearStart = $currentYear;
                        } 
                        else 
                        {
                            $financialYearStart = $currentYear - 1;
                        }

                        $financialYearEnd = $financialYearStart + 1;

                        $active_period_start_date = date('Y') .'-'.$currentMonth.'-01';
                        $active_period_end_date = date('Y') . '-'.$currentMonth. '-31';

                        $get_task = $this->db->select('*,tbl_user_query.ticket_no as tickect')->from('tbl_user_query')->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id')->where('tbl_user_query.assign_to',$user_id)->where('tbl_schedule.assign_date >=',$active_period_start_date)->where('tbl_schedule.assign_date <=',$active_period_end_date)->where('tbl_user_query.status !=','completed')->get()->result();
                        
                        $over_due_task = $this->db->select('*,tbl_user_query.ticket_no as tickect')->from('tbl_user_query')->join('tbl_schedule','tbl_schedule.issue_id = tbl_user_query.query_id')->where('tbl_user_query.assign_to',$user_id)->where('tbl_schedule.assign_date <',$active_period_end_date)->where('tbl_user_query.status !=','completed')->get()->result();
    

                        if(!empty($get_task))
                        {
                            $html = 
                            '<html>
                                <section>
                                    <center style="width: 100%;">
                                        <table width="650" style="margin-top: 50px;margin-bottom: 50px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;max-width: 650px">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="background-color: #003399;padding: 30px;">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <div class="text-center" >
                                                                            <img src="https://buroforce.progfeel.co.in/app-assets/image/task-1.png" alt="img" style="max-width: 70px;width: 100%;height:auto">
                                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">Montly Task Assignment</h3>
                                                                            <h3 style="margin-bottom: 0px;font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;">'.date('d F, Y', strtotime($active_period_start_date)). ' To ' .date('d F, Y', strtotime($active_period_end_date)).'</h3>
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
                                                                            <p>Dear '.$userename.',</p>
                                                                            <p>Below are the tasks assigned to you for last 1 year.</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div align="center" style="overflow: auto;width: 540px;">
                                                                            <table border="0" cellspacing="0" cellpadding="4" width="100%" style="border-collapse:collapse;overflow-x: auto;">
                                                                                <thead>
                                                                                    <tr style="border: 1px solid black">
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Sr No</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Time</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Ticket Id</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Customer Name</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Product / Service</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Priority</td>
                                                                                        <td style="color: #fff;background: #003399;padding: 5px 8px;text-align: center;">Remarks/Narration</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>';
                                                                                $count = 1;
                                                                                foreach($get_task as $value)
                                                                                { 
                                                                                    $customer_name = $this->db->select('company_name')->from('tbl_customer')->where('customer_id',$value->customer_id)->get()->row()->company_name;
                                                                                    $html .='<tr style="border: 1px solid black">
                                                                                    <td><div style="text-align: center;">'.$count.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.date('H:i a',strtotime($value->assign_starttime)).'-' .date('H:i a',strtotime($value->assign_endtime)).'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->tickect.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$customer_name.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->product_name.'</div></td>
                                                                                    <td><div style="width: 120px;text-align: center;">'.$value->priority.'</div></td>
                                                                                    <td><div style="width: 150px;text-align: center;">'.$value->issue.'</div></td>
                                                                                    </tr>';
                                                                                $count ++;
                                                                                }
                                                                                $html .='</tbody>
                                                                            </table>
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
                                                                            <p>Overdue Task(s) : '.count($over_due_task).'</p>
                                                                            <p>Please make sure to complete these tasks by the specified deadlines.</p>
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
                                                                            <p>Management</p>
                                                                            <p>'.$usercompany.'</p>
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
                            
                            $this->load->library('phpmailer_lib');
                            $mail = $this->phpmailer_lib->load();
                            $mail->isSMTP();
                            $mail->Host     = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contact@buromatrix.com';
                            $mail->Password = 'khujsqoduyvcgxmy';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port     = '465';
                            
                            $mail->setFrom('contact@buromatrix.com', 'Buroforce');
                            $mail->addAddress($useremail);
                            // $mail->addAddress('p.shinde@splendornet.com');
                            $mail->Subject = 'Weekly Task Assignment';
                            $mail->isHTML(true);
                            $mail->Body = $html;
                            if(!$mail->send())
                            {
                                echo 0;
                            }
                            else
                            {
                                echo 1;
                            }
                        }
                    }
                    
                }
            }
            else
            {
                
            }
        }

    }
}