
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_model extends CI_Model 
{

	public function __construct() 
  {
    parent::__construct();
    $this->load->helper("file");
    $this->load->library('email'); // new email configration.

    // $Mailconfig['protocol'] = 'smtp';

    // $Mailconfig['smtp_host'] = 'tls://smtp.gmail.com';

    // $Mailconfig['smtp_port'] = '465';

    // $Mailconfig['smtp_timeout'] = '7';

    // $Mailconfig['smtp_user'] = 'burosnta@gmail.com';

    // $Mailconfig['smtp_pass'] = 'qzeywydcyxspevry';

    // $Mailconfig['charset'] = 'utf-8';

    // $Mailconfig['newline'] = "\r\n";

    // $Mailconfig['mailtype'] = 'html'; // or html

    // $Mailconfig['validation'] = TRUE; // bool whether to validate email or not

    // $Mailconfig['wordwrap'] = 'true';

    // $Mailconfig['wrapchars'] = '76';

    // $Mailconfig['crlf'] = "\r\n";

    // $Mailconfig['starttls'] = TRUE;

    // $this->email->initialize($Mailconfig);
  }

 public function edit_lead($leadopp_id)
  {
     $this->db->where('leadopp_id ',$leadopp_id);
    return $this->db->get('tbl_leads_opportunity')->row();     
  }

 public function show_activity_details($schedule_id)
  {
     $this->db->where('schedule_id ',$schedule_id);
     $this->db->select('tbl_task_status.*, tbl_admin_login.name as empname') 
               ->from('tbl_task_status')
               ->join('tbl_admin_login', 'tbl_task_status.employee_id = tbl_admin_login.id ');
     return $this->db->get()->result(); 
  }


 public function get_terms_list($termsfor)
  {
    $this->db->where('org_id',$this->session->org_id);
     $this->db->where('term_id',$termsfor);
    return $this->db->get('tbl_terms_condition')->result();     
  }


 public function terms_for()
  {
     $this->db->select('term_for,term_id');
     $this->db->where('org_id',$this->session->org_id);
    return $this->db->get('tbl_terms_condition')->result();     
  }

  public function getAllSection()
  {    
    $this->db->select('section_id,section_name');
    $this->db->where('status',1);
    $this->db->where('display_status',1);
    $this->db->where('org_id',$this->session->org_id);
    return $this->db->get('tbl_section_details')->result();     
  }

  public function get_section($id)
  {
    $this->db->where('section_id',$id);
    $this->db->where('status',1);
    $this->db->where('org_id',$this->session->org_id);
    return $this->db->get('tbl_section_details')->result();  
  }
  
  public function lead_data($leadopp_id)
    {
      // $this->db->where('tbl_leads_opportunity.leadopp_id ',$leadopp_id);
      // $this->db->select('tbl_leads_opportunity.*, tbl_product_service_list.prdsrv_name ,
      //                         tbl_admin_login.name as empname
      //                   ')
      //          ->from('tbl_leads_opportunity')
      //          ->join('tbl_product_service_list', 'tbl_leads_opportunity.product_id = tbl_product_service_list.prd_srv_id ')
      //          ->join('tbl_admin_login', 'tbl_leads_opportunity.assign_to = tbl_admin_login.id'
      //        );
      $this->db->where('tbl_leads_opportunity.leadopp_id ',$leadopp_id);
      $this->db->select('tbl_leads_opportunity.*,tbl_admin_login.name as empname')
               ->from('tbl_leads_opportunity')
              //  ->join('tbl_product_service_list', 'tbl_leads_opportunity.product_id = tbl_product_service_list.prd_srv_id ')
               ->join('tbl_admin_login', 'tbl_leads_opportunity.assign_to = tbl_admin_login.id'
             );

          $res=$this->db->get()->row();  
      // echo "<pre>";
      // print_r($res);
      // die;
          $business_id=$res->business_id;
          $business_id=rtrim($business_id,",");
          
          if(!empty($business_id))
          {
              $businessname="";
              $business=$this->db->query(" SELECT `business_name` FROM `tbl_business` WHERE `business_id` IN($business_id) ")->result();   
              foreach ($business as  $bres)
              {
                $businessname=$businessname.' , '.$bres->business_name;
              }
             $businessname=substr($businessname,3);
          }
          else
          {
             $businessname="";
          } 
          
          $generated_by_id=$res->generated_by;
          if(!empty($generated_by_id))
          {
            $generated_by = $this->db->query(" SELECT `name` FROM `tbl_admin_login` WHERE `id`= $generated_by_id")->row()->name;   
          }
          else
          {
            $generated_by = "";
          }
         
         $this->db->where('source_id ',$res->source);
         $sourceres=$this->db->get('tbl_source')->row();  
         $this->db->where('stage_id ',$res->stage);
         $stageres=$this->db->get('tbl_stage')->row(); 
         
         if(!empty($res->product_id))
         {
            $this->db->where('prd_srv_id ',$res->product_id);
            $product_name=$this->db->get('tbl_product_service_list')->row();  
         }
         else
         {
            $product_name = '';
         }

         $NewArray=array(
                            'leadopp_id'=>$leadopp_id,
                            'assign_to'=>$res->assign_to,
                            'assign_datetime'=>$res->assign_datetime,
                            'project_business_value'=>$res->project_business_value,
                            'tag'=>$res->tag,
                            'lead_generate_id'=>$res->lead_generate_id,
                            'company_name'=>$res->company_name,
                            'contact_person_name1'=>$res->contact_person_name1,
                            'phone_no'=>$res->phone_no,
                            'email'=>$res->email,
                            'address'=>$res->address,
                            'location'=>$res->location,
                            'closure_date'=>$res->closure_date,
                            'customer_type'=>$res->customer_type,
                            'remarks'=>$res->remarks,
                            'prdsrv_name'=>$product_name->prdsrv_name,
                            'empname'=>$res->empname,
                            'type'=>$res->customer_type,
                            'source'=>$sourceres->source_title,
                            'stage'=>$stageres->stage_title,
                            'document'=>$res->document,
                            'business_name'=>$businessname,
                            'business_id'=>$business_id,
                            'generated_by'=>$generated_by,
                            'is_convert' => $res->is_converted
                         ); 

         return $NewArray;
    }

   public function history_data($leadopp_id)
    {
      $this->db->where('tbl_lead_history.leadopp_id ',$leadopp_id);
      $this->db->select('tbl_lead_history.*,tbl_admin_login.name as empname ')   
               ->from('tbl_lead_history')
               ->join('tbl_admin_login', 'tbl_lead_history.assign_to = tbl_admin_login.id'
             );
      return $this->db->get()->result();     
        
    }

   public function document_data($leadopp_id)
    {
        $this->db->where('leadopp_id ',$leadopp_id);
        return $this->db->get('tbl_lead_documents')->result();
    }

   public function product_list()
    {
         $this->db->select('prdsrv_name,product_code,prd_srv_id');
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status ',0);
        $this->db->where('status ',1);
        return $this->db->get('tbl_product_service_list')->result();
    }


   public function get_product_details($productid)
    {
      $this->db->where('prd_srv_id',$productid);
      $this->db->where('status ',1);
      $res=$this->db->get('tbl_product_service_list')->row();
      echo json_encode($res);
    }


   public function get_lead_details($lead_id)
    {
      $this->db->select('contact_person_name1,phone_no,email,company_name');
      $this->db->where('leadopp_id',$lead_id);
      $res=$this->db->get('tbl_leads_opportunity')->row();
      echo json_encode($res);
    }


   public function AddQuotation($data)
    {
      
      $terms= $data['terms'];
      $final_terms='';
      if(!empty($terms))
      {
          for($i=0;$i<count($terms);$i++)
          {
             $final_terms=$final_terms.'$^'.$terms[$i];
          }
      }
      else
      {
          $final_terms = '';
      }
    //   for($i=0;$i<count($terms);$i++)
    //       {
    //          $final_terms=$final_terms.'$^'.$terms[$i];
    //       }
      
      $validity= $data['validity'];
      $valid_till=date('Y-m-d', strtotime($Date. " + $validity days"));
      $quotation_date2 = str_replace(',', ' ', $data['quotation_date']);
      $quotation_date = date("Y-m-d", strtotime($quotation_date2));
      $AddQuotationArray = array(
        'leadopp_id'=> $data['db_quotation_lead_id'],
        'created_by'=> $this->session->id,
        'org_id'=> $this->session->org_id,
        'custom_id' => $data['quote_custome_numner'],
        'quotation_number'=>$data['quotation_number'],
        'quotation_date'=>$quotation_date,
        'contact_person'=>$data['contact_person'],
        'contact_number'=>$data['contact_number'],

        'quto_subject' => $data['quto_subject'],
        'section_content' => $data['section_content'],
        'section_id' => $data['section_id'],
        // 'terms_conditions'=>$final_terms, 
        // 'termsfor'=>$data['termsfor'],
        
        'email'=>$data['email'],
        'validity'=>$validity,
        'valid_till'=>$valid_till,
        'quotation_status'=> 'none',
        'created_date'=> date("Y-m-d H:i:s")
      );
      
      
       $this->db->insert("tbl_lead_quotation",$AddQuotationArray);
       $quotation_id=$this->db->insert_id();

       $ProductidArray = $data['product_id'];
       $ProductcodeArray = $data['productcode'];
       $PriceArray = $data['price'];
       $QuantityArray = $data['quantity'];
       $CgstArray = $data['cgst'];
       $SgstArray = $data['sgst'];
       $TotalArray = $data['total'];
       $discountArray = $data['discount'];
       $cgstvalueArray = $data['cgstvalue'];
       $sgstvalueArray = $data['sgstvalue'];
       $subtotalArray = $data['subtotal'];
       $desctiptionArray = $data['desctiption'];

       for($i=0;$i<count($ProductidArray);$i++)
       {
          $QuotationDetailArray = array(
            'quotation_id'=> $quotation_id,
            'org_id'=> $this->session->org_id,
            'leadopp_id'=> $data['db_quotation_lead_id'],
            'product_id'=>$ProductidArray[$i],
            'product_code'=>$ProductcodeArray[$i],
            'desctiption'=>$desctiptionArray[$i],
            'quantity'=>$QuantityArray[$i],
            'discount' => $discountArray[$i],
            'price'=>$PriceArray[$i],
            'cgst'=>$CgstArray[$i],
            'sgst'=>$SgstArray[$i],
            'cgstvalue'=>$cgstvalueArray[$i],
            'sgstvalue'=>$sgstvalueArray[$i],
            'subtotal'=>$subtotalArray[$i],
            'igst'=>0,
            'cess'=>0,
            'total'=>$TotalArray[$i],
            'date_created'=>date("Y-m-d H:i:s")
          );
          
           $this->db->insert("tbl_quotation_details",$QuotationDetailArray);
       }
       $this->SaveQuotationPdf($quotation_id);
    }
    public function addQutationStatus($status, $id, $lead_id)
    {
      $this->db->order_by('quotation_id ', 'ASC');
      $this->db->where('leadopp_id',$lead_id);
      $data = $this->db->get('tbl_lead_quotation')->result();
      foreach ($data as $qut) {
        if ($qut->quotation_status == 'won') {
          $tempStatus = 'won';
          if ($tempStatus != $status) {
            $this->db->set('quotation_status', $status);
            $this->db->where('quotation_id', $id);
            $this->db->update('tbl_lead_quotation');
            echo 1;
          }else {
            echo 0;
          }
          exit;
        } else {
          $tempStatus = 'not_won';
        }
      }
      $this->db->set('quotation_status', $status);
      $this->db->where('quotation_id', $id);
      $this->db->update('tbl_lead_quotation');
      echo 1;
    }
  public function UpldateQuotation($data)
  {
    
    $terms= $data['terms'];
    $final_terms='';
    for($i=0;$i<count($terms);$i++)
    {
        $final_terms=$final_terms.'$^'.$terms[$i];
    }

    $quotation_id= $data['edit_quotation_id'];
    $validity= $data['validity'];
    $valid_till=date('Y-m-d', strtotime($Date. " + $validity days"));
    $quotation_date2 = str_replace(',', ' ', $data['quotation_date']);
    $quotation_date = date("Y-m-d", strtotime($quotation_date2));

    $UpdateQuotationArray = array
    (
      'quotation_number'=>$data['quotation_number'],
      'quotation_date'=>$quotation_date,
      'contact_person'=>$data['contact_person'],
      'contact_number'=>$data['contact_number'],
      // 'terms_conditions'=>$final_terms, 
      // 'termsfor'=>$data['termsfor'],                                  
      'quto_subject' => $data['quto_subject'],
      'section_content' => $data['section_content'],
      'section_id' => $data['section_id_edit'],
      'email'=>$data['email'],
      'validity'=>$validity,
      'valid_till'=>$valid_till,
      // 'quotation_status'=>$data['quotation_status']
    );

      $this->db->where('quotation_id',$quotation_id);                        
      $this->db->Update("tbl_lead_quotation",$UpdateQuotationArray);

      $this->db->where('quotation_id',$quotation_id);
      $this->db->Delete('tbl_quotation_details');

      //--------------------------------------------------------------------------------------

      $ProductidArray = $data['productid'];
      $ProductcodeArray = $data['productcode'];
      $PriceArray = $data['price'];
      $QuantityArray = $data['quantity'];
      $CgstArray = $data['cgst'];
      $SgstArray = $data['sgst'];
      $TotalArray = $data['total'];

      $desctiptionArray = $data['desctiption'];
      $discountArray = $data['discount'];

      $cgstvalueArray = $data['cgstvalue'];
      $sgstvalueArray = $data['sgstvalue'];
      $subtotalArray = $data['subtotal'];


      for($i=0;$i<count($ProductidArray);$i++)
      {
        $QuotationDetailArray = array(
          'quotation_id'=> $quotation_id,
          'org_id'=> $this->session->org_id,
          'leadopp_id'=> $data['leadopp_id'],
          'product_id'=>$ProductidArray[$i],
          'product_code'=>$ProductcodeArray[$i],
          'desctiption'=>$desctiptionArray[$i],
          'quantity'=>$QuantityArray[$i],
          'discount' => $discountArray[$i],
          'price'=>$PriceArray[$i],
          'cgst'=>$CgstArray[$i],
          'sgst'=>$SgstArray[$i],
          'cgstvalue'=>$cgstvalueArray[$i],
          'sgstvalue'=>$sgstvalueArray[$i],
          'subtotal'=>$subtotalArray[$i],
          'igst'=>0,
          'cess'=>0,
          'total'=>$TotalArray[$i],
          'date_created'=>date("Y-m-d H:i:s")
        );
          $this->db->insert("tbl_quotation_details",$QuotationDetailArray);
      }
     $this->SaveQuotationPdf($quotation_id);
  }


   public function ShareDetails($formdata)
    {
        // $lead_id=$formdata['share_db_lead_id'];
        $ids='';
        $emp_id=$formdata['emp_id'];
        $this->db->where_in('id ',$emp_id);
        $result= $this->db->get('tbl_admin_login')->result();
        $emailids='';
        foreach ($result as  $row) 
        {
          $emailids=$emailids.','.$row->email; 
        }
        $final_str=trim(substr($emailids, 1));
        

        $this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();
        if(empty($emailData))
        {
          echo 0;
        }
        else
        {
          $leadopp_id = $formdata['share_db_lead_id'];
          $this->load->model('Admin/Leads_model');
          $lead_data=$this->Leads_model->lead_data($leadopp_id);
          $history_data=$this->Leads_model->history_data($leadopp_id);
          $activity_data=$this->Leads_model->activity_data($leadopp_id);
          $document_data=$this->Leads_model->document_data($leadopp_id);



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

                            <tr >
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
                 $sub='Lead / Opportunity Details';
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
                      echo 0;
                      // echo 'Mailer Error: ' . $mail->ErrorInfo;
                  }
                  else
                  {
                      echo 1;
                  }
        }

        

        

        // $email_config = Array(
        //                     'protocol'  => 'smtp',
        //                     'smtp_host' => 'mail.buroforce.com',
        //                     'smtp_port' => '21',
        //                     'smtp_user' => 'support@buroforce.com',
        //                     'smtp_pass' => 'Bur@@ForCe$$2019',
        //                     'mailtype'  => 'html',
        //                     'starttls'  => true,
        //                     'newline'   => "\r\n"
        //                   );
        //         $this->load->library('email', $email_config);
        //         // $this->email->initialize($email_config);
        //        $sub='Lead / Opportunity Details';
        //        $from='support@buroforce.com';
        //        // $to=$org_email;


               
    }

    public function organisationData($id)
    {
      $this->db->where('org_id ',$id);
      return $this->db->get('tbl_organisation')->row();
    }
  public function SaveQuotationPdf($quotation_id)
  {
    
    error_reporting(0);
    $this->db->where('quotation_id ',$quotation_id);
    $result=$this->db->get('tbl_lead_quotation')->row();

    $leadopp_id=$result->leadopp_id;
    $this->db->where('leadopp_id',$leadopp_id);
    $lead=$this->db->get('tbl_leads_opportunity')->row();
    $company_name=$lead->company_name;
    $company_address=$lead->address;
    $email=$lead->email;
    $phone_no=$lead->phone_no;
    $city=$lead->city;

    $terms_conditions=$result->terms_conditions;
    $termsarray=explode("$^", $terms_conditions);

    $this->db->where('org_id',$this->session->org_id);
    $organisation=$this->db->get('tbl_organisation')->row();

    $this->db->where('quotation_id ',$quotation_id);
    $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
             ->from('tbl_quotation_details')
             ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
    $quotation_result = $this->db->get()->result();
    
    $data = $this->db->get("tbl_web_logo")->row();
    

    if ($organisation->q_printing_title != '') {
      $quotation_name = $organisation->q_printing_title;
    }else {
      $quotation_name = '';
    }

    include("assets/mpdf/mpdf.php");
    $imgpath=base_url().'assets/images/Logo/logo_one.png';
    $imgpath2=base_url().'assets/images/Logo/logo_two.png';
    $imgpath3=base_url().'assets/images/Logo/logo_three.png';
    $html = '
      <html>
      <head>
      <style>
          body {font-family: sans-serif;}
          p { margin: 0pt; }
          
          .tb1 {
            padding: 12px;
            color: white;
            background: #0363ab;
          }

        .tb2 {
          padding: 12px;
          color: white;
          background: #00aef3;
        }
        #product_data td,th {
          border: 1px solid #ddd;
          padding: 12px !important;
        }
        #footerData td,th {
          border: 1px solid #ddd;
          padding: 12px !important;
        }
      </style>
      </head>
      <body>

      <!--mpdf
      <htmlpageheader name="myheader">
      <table width="100%">
          <tr>                          
            <td width="60%" align="left">
              <span style="font-weight: bold; font-size: 14pt;">' . $organisation->org_cname . '</span><br/><span style="font-size: 10pt;">' . $organisation->org_address . '<br>Email ID : ' . $organisation->org_email . '<br>Contact No : ' . $organisation->org_contact . '<br> Website : ' . $organisation->org_web_url . '</span>
            </td>
            <td width="40%" align="right">';
              if ($data->logo_name_two != '') {
                $file = base_url().'assets/images/web_images/'.$data->logo_name_two;
                $html.='<img src="'.$file.'" class="content-group" style="height: 65px;margin-bottom: 8px !important;">';
              }
            $html.='</td> 
          </tr>
      </table>
      </htmlpageheader>

      <htmlpagefooter name="myfooter">
      <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
      Page {PAGENO} of {nb}
      </div>
      </htmlpagefooter>
      <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
      <sethtmlpagefooter name="myfooter" value="on" />
      mpdf-->

       <table>
         <tr>
          <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>
           <td width="10%">
                  <h4 style="background: #2196f3;margin-top:0px;letter-spacing: 2px;font-size:22px;text-align:center;color: white;">&nbsp;'.$quotation_name.' &nbsp;</h4> 
           </td>
            <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>

         </tr>
       </table>

      <table width="100%" style="font-family: serif;" cellpadding="10">
        <tr>
          <td width="50%" style="border: 0mm solid #888888; "><span style="font-size: 12pt; color: black; font-family: sans;">To :</span><br />
            <span style="font-size: 11pt">'.$company_name.'</span> , <br />
            <span style="font-size: 11pt">'.$company_address.' , '.$city.'</span><br />
            <span style="font-size: 11pt">'.$email.'</span><br />
            <span style="font-size: 11pt">'.$phone_no.'</span><br />
          </td>
          <td width="20%">&nbsp;</td>
          <td width="30%" >
            <table class="bpmTopic1" style="font-size:12px;"><thead></thead>
              <tbody>
                <tr><td align="right">Quotation No. :</td><td align="left"><b>'.$result->quotation_number.'</b></td></tr>
                <tr><td align="right" >Quotation Date :</td><td align="left"><b>'.date("d F, Y",strtotime($result->quotation_date)).'</b></td></tr>
                <tr><td align="right" >Due Date :</td><td align="left"><b>'.date("d F, Y",strtotime($result->valid_till)).'</b></td></tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>

    <br />

    <table class="items" id="product_data" width="100%" style="font-size: 10pt; border-collapse: collapse;" cellpadding="8">
       <thead>
          <tr>
            <th>#</th>
            <th>PARTICULARS</th>
            <th>PRODUCT CODE</th>
            <th>QTY</th>
            <th>RATE</th>
            <th>GROSS AMOUNT</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>NET AMOUNT</th>
          </tr>
       </thead>
    <tbody>';
      $cnt = 1;

      $cgstvalue = 0;
      $sgstvalue = 0;
      $subtotal = 0;
      $grossamt_total = 0;
    foreach ($quotation_result as  $row) 
    {
      $cgstvalue = $cgstvalue + $row->cgstvalue;
      $sgstvalue = $sgstvalue + $row->sgstvalue;
      $subtotal = $subtotal + $row->subtotal;
      $gross_amt = $row->quantity * $row->price;
      $grossamt_total = $grossamt_total + $gross_amt;
      $html.= '
        <tr>
          <td>'.$cnt.'</td>
          <td>
            <strong style="font-weight: 650;">'. $row->prdsrv_name .'</strong>
            </br><small>'. $row->desctiption .'</small>
          </td>
          <td>'.$row->product_code.'</td>
          <td align="right">'. $row->quantity .'</td>
          <td align="right">'.  $row->price .'</td>
          <td align="right">'.  $row->quantity * $row->price .'</td>
          <td align="right">'.  $row->cgst .'</td>
          <td align="right">'.  $row->sgst .'</td>
          <td align="right">'.  $row->subtotal .'</td>
        </tr>';
      $cnt++;
    }
    $final_total=$subtotal+$cgstvalue+$sgstvalue;

   $number = $final_total;
   $no = round($final_total);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two','3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six','7' => 'seven', '8' => 'eight', '9' => 'nine','10' => 'ten', '11' => 'eleven', '12' => 'twelve','13' => 'thirteen', '14' => 'fourteen','15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen','18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty','30' => 'thirty', '40' => 'forty', '50' => 'fifty','60' => 'sixty', '70' => 'seventy','80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) 
   {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
    }
  $str = array_reverse($str);
  $in_result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 $in_result . "Rupees  " . $points . " Paise";

  $html.= '
          <tfoot>
            <tr>
              <td colspan="5">&nbsp;</td>
              <td align="right">Rs '.  $grossamt_total  .'</td>
              <td align="right">Rs '.  $cgstvalue  .'</td>
              <td align="right">Rs '.  $sgstvalue  .'</td>
              <td align="right">Rs '.  $subtotal  .'</td>
            </tr>
          </tfoot>
      </tbody>
      </table>
      <table align="right" id="footerData" style="width: 60%;">
        <tbody>
            <tr>
                <td class="left ml-1">Gross Value </td>
                <td align="right"><b>Rs '. number_format($grossamt_total, 2) .'</b></td>
            </tr>';
            if ($cgstvalue >= 1) { 
                $html.='<tr>
                    <td class="left" style="width: 32%;">GST Value</td>
                    <td align="right"><b>Rs '. number_format($cgstvalue, 2) .'</b></td>
                </tr>';
            }
            if ($sgstvalue >= 1) {
              $html.='<tr>
                    <td class="left" style="width: 32%;">SGST Value</td>
                    <td align="right"><b>Rs '. number_format($sgstvalue, 2) .'</b></td>
                </tr>';
            }
            $html.='<tr>
                <td class="left" style="width: 32%;">NET Value</td>
                <td align="right"><b>Rs '. number_format($final_total, 2) .'</b></td>
            </tr>
            <tr>
                <td class="left">Amount in Words </td>
                <td align="right" style="padding-left: 0px !important;">
                    <div >
                        <b>Rupees ' . ucwords($in_result) . ' Only</b>
                    </div>
                </td>
            </tr>
        </tbody>
      </table>
      ';

    $html .='<br/>
            <div style="font-size:12px !important;">
              '.$result->section_content.'
            </div>
      </body>
    </html>';
    
    $mpdf=new mPDF('c','A4','','',10,10,30,16,8,8);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
    $mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
    $mpdf->defaultheaderfontsize = 12;  /* in pts */
    $mpdf->defaultheaderfontstyle = B;  /* blank, B, I, or BI */
    $mpdf->defaultheaderline = 1;   /* 1 to include line below header/above footer */
    $mpdf->defaultfooterfontsize = 12;  /* in pts */
    $mpdf->defaultfooterfontstyle = B;  /* blank, B, I, or BI */
    $mpdf->defaultfooterline = 1;   /* 1 to include line below header/above footer */  
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle($organisation->org_cname);
    $mpdf->SetAuthor($organisation->org_cname);
    // $mpdf->SetWatermarkText($organisation->org_cname);
    $mpdf->showWatermarkText = true;
    $mpdf->watermark_font = 'DejaVuSansCondensed';
    $mpdf->watermarkTextAlpha = 0.1;
    $mpdf->SetDisplayMode('fullpage');
    $stylesheet = file_get_contents('assets/mpdf/mpdfstyletables.css');
    $mpdf->WriteHTML($stylesheet, 1);
    $mpdf->WriteHTML($html);
    // $mpdf->Output();
    $mpdf->Output("assets/admin/quotationdocuments/$quotation_id.pdf", 'F');
  }

   public function quotation_detail_list($leadopp_id)
    {
        $this->db->order_by('quotation_id ','DESC');
        $this->db->where('leadopp_id ',$leadopp_id);
        return $this->db->get('tbl_lead_quotation')->result();
    }

   public function PrintQuotation($quotation_id)
    {
        $this->db->where('quotation_id ',$quotation_id);
        $result = $this->db->get('tbl_lead_quotation')->row();
        
        $leadopp_id=$result->leadopp_id;
        $this->db->where('tbl_leads_opportunity.leadopp_id',$leadopp_id);
        $lead = $this->db->get('tbl_leads_opportunity')->row();
        
        return array(
          'company_name'=>$lead->company_name,
          'company_address'=>$lead->address,
          'city'=>$lead->city,
          'phone_no'=>$lead->phone_no,
          'email'=>$lead->email,
          'terms_conditions'=>$result->terms_conditions,
          'quotation_number'=>$result->quotation_number,
          'quotation_date'=>date("d F, Y",strtotime($result->quotation_date)),
          'valid_till'=>date("d F, Y",strtotime($result->valid_till)),
          'contact_person'=>$result->contact_person,
          'quto_subject'=>$result->quto_subject,
          'leadopp_id' => $leadopp_id,
          'section_content'=>$result->section_content,
        );
    }


   public function quotation_product_array($quotation_id)
    {
        $this->db->where('quotation_id ',$quotation_id);
        $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
                 ->from('tbl_quotation_details')
                 ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
        return $this->db->get()->result();
    }

   public function get_org_array()
    {
        $this->db->where('org_id',$this->session->org_id);
        return $this->db->get('tbl_organisation')->row();
    }



   public function QuotationPdf($quotation_id)
    {
        error_reporting(0);
        $this->db->where('quotation_id ',$quotation_id);
        $result=$this->db->get('tbl_lead_quotation')->row();

        $leadopp_id=$result->leadopp_id;
        $this->db->where('leadopp_id',$leadopp_id);
        $lead=$this->db->get('tbl_leads_opportunity')->row();
        $company_name=$lead->company_name;
        $company_address=$lead->address;
        $email=$lead->email;
        $phone_no=$lead->phone_no;
        $city=$lead->city;

        $terms_conditions=$result->terms_conditions;
        $termsarray=explode("$^", $terms_conditions);

        $this->db->where('org_id',$this->session->org_id);
        $organisation=$this->db->get('tbl_organisation')->row();

        $this->db->where('quotation_id ',$quotation_id);
        $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
                 ->from('tbl_quotation_details')
                 ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
        $quotation_result = $this->db->get()->result();
        
        $data = $this->db->get("tbl_web_logo")->row();
        

        if ($organisation->q_printing_title != '') {
          $quotation_name = $organisation->q_printing_title;
        }else {
          $quotation_name = '';
        }

        include("assets/mpdf/mpdf.php");
        $imgpath=base_url().'assets/images/Logo/logo_one.png';
        $imgpath2=base_url().'assets/images/Logo/logo_two.png';
        $imgpath3=base_url().'assets/images/Logo/logo_three.png';
        $html = '
          <html>
          <head>
          <style>
              body {font-family: sans-serif;}
              p { margin: 0pt; }
              
              .tb1 {
                padding: 12px;
                color: white;
                background: #0363ab;
              }

            .tb2 {
              padding: 12px;
              color: white;
              background: #00aef3;
            }
            #product_data td,th {
              border: 1px solid #ddd;
              padding: 12px !important;
            }
            #footerData td,th {
              border: 1px solid #ddd;
              padding: 12px !important;
            }
          </style>
          </head>
          <body>

          <!--mpdf
          <htmlpageheader name="myheader">
          <table width="100%">
              <tr>                          
                <td width="50%" align="left">
                  <span style="font-weight: bold; font-size: 14pt;">' . $organisation->org_cname . '</span><br/><span style="font-size: 10pt;">' . $organisation->org_address . '<br>Email ID : ' . $organisation->org_email . '<br>Contact No : ' . $organisation->org_contact . '<br> Website : ' . $organisation->org_web_url . '</span>
                </td>
                <td width="10%" align="right">&nbsp;</td>
                <td width="40%" align="right">';
                  if ($data->logo_name_two != '') {
                    $file = base_url().'assets/images/web_images/'.$data->logo_name_two;
                    $html.='<img src="'.$file.'" class="content-group" style="height: 65px;margin-bottom: 8px !important;">';
                  }
                $html.='</td> 
              </tr>
          </table>
          </htmlpageheader>

          <htmlpagefooter name="myfooter">
          <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
          Page {PAGENO} of {nb}
          </div>
          </htmlpagefooter>
          <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
          <sethtmlpagefooter name="myfooter" value="on" />
          mpdf-->

           <table>
             <tr>
              <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>
               <td width="10%">
                      <h4 style="background: #2196f3;margin-top:0px;letter-spacing: 2px;font-size:22px;text-align:center;color: white;">&nbsp;'.$quotation_name.' &nbsp;</h4> 
               </td>
                <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>

             </tr>
           </table>

          <table width="100%" style="font-family: serif;" cellpadding="10">
            <tr>
              <td width="50%" style="border: 0mm solid #888888; "><span style="font-size: 12pt; color: black; font-family: sans;">To :</span><br />
                <span style="font-size: 11pt">'.$company_name.'</span> , <br />
                <span style="font-size: 11pt">'.$company_address.' , '.$city.'</span><br />
                <span style="font-size: 11pt">'.$email.'</span><br />
                <span style="font-size: 11pt">'.$phone_no.'</span><br />
              </td>
              <td width="20%">&nbsp;</td>
              <td width="30%" >
                <table class="bpmTopic1" style="font-size:12px;"><thead></thead>
                  <tbody>
                    <tr><td align="right">Quotation No. :</td><td align="left"><b>'.$result->quotation_number.'</b></td></tr>
                    <tr><td align="right" >Quotation Date :</td><td align="left"><b>'.date("d F, Y",strtotime($result->quotation_date)).'</b></td></tr>
                    <tr><td align="right" >Due Date :</td><td align="left"><b>'.date("d F, Y",strtotime($result->valid_till)).'</b></td></tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>

        <br />

        <table class="items" id="product_data" width="100%" style="font-size: 10pt; border-collapse: collapse;" cellpadding="8">
           <thead>
              <tr>
                <th>#</th>
                <th>PARTICULARS</th>
                <th>PRODUCT CODE</th>
                <th>QTY</th>
                <th>RATE</th>
                <th>GROSS AMOUNT</th>
                <th>CGST</th>
                <th>SGST</th>
                <th>NET AMOUNT</th>
              </tr>
           </thead>
        <tbody>';
          $cnt = 1;

          $cgstvalue = 0;
          $sgstvalue = 0;
          $subtotal = 0;
          $grossamt_total = 0;
        foreach ($quotation_result as  $row) 
        {
          $cgstvalue = $cgstvalue + $row->cgstvalue;
          $sgstvalue = $sgstvalue + $row->sgstvalue;
          $subtotal = $subtotal + $row->subtotal;
          $gross_amt = $row->quantity * $row->price;
          $grossamt_total = $grossamt_total + $gross_amt;
          $html.= '
            <tr>
              <td>'.$cnt.'</td>
              <td>
                <strong style="font-weight: 650;">'. $row->prdsrv_name .'</strong>
                </br><small>'. $row->desctiption .'</small>
              </td>
              <td>'.$row->product_code.'</td>
              <td align="right">'. $row->quantity .'</td>
              <td align="right">'.  $row->price .'</td>
              <td align="right">'.  $row->quantity * $row->price .'</td>
              <td align="right">'.  $row->cgst .'</td>
              <td align="right">'.  $row->sgst .'</td>
              <td align="right">'.  $row->subtotal .'</td>
            </tr>';
          $cnt++;
        }
        $final_total=$subtotal+$cgstvalue+$sgstvalue;

       $number = $final_total;
       $no = round($final_total);
       $point = round($number - $no, 2) * 100;
       $hundred = null;
       $digits_1 = strlen($no);
       $i = 0;
       $str = array();
       $words = array('0' => '', '1' => 'one', '2' => 'two','3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six','7' => 'seven', '8' => 'eight', '9' => 'nine','10' => 'ten', '11' => 'eleven', '12' => 'twelve','13' => 'thirteen', '14' => 'fourteen','15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen','18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty','30' => 'thirty', '40' => 'forty', '50' => 'fifty','60' => 'sixty', '70' => 'seventy','80' => 'eighty', '90' => 'ninety');
       $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
       while ($i < $digits_1) 
       {
         $divider = ($i == 2) ? 10 : 100;
         $number = floor($no % $divider);
         $no = floor($no / $divider);
         $i += ($divider == 10) ? 1 : 2;
         if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
         } else $str[] = null;
        }
      $str = array_reverse($str);
      $in_result = implode('', $str);
      $points = ($point) ?
        "." . $words[$point / 10] . " " . 
              $words[$point = $point % 10] : '';
     $in_result . "Rupees  " . $points . " Paise";

      $html.= '
              <tfoot>
                <tr>
                  <td colspan="5">&nbsp;</td>
                  <td align="right">Rs '.  $grossamt_total  .'</td>
                  <td align="right">Rs '.  $cgstvalue  .'</td>
                  <td align="right">Rs '.  $sgstvalue  .'</td>
                  <td align="right">Rs '.  $subtotal  .'</td>
                </tr>
              </tfoot>
          </tbody>
          </table>
          <table align="right" id="footerData" style="width: 60%;">
            <tbody>
                <tr>
                    <td class="left ml-1">Gross Value </td>
                    <td align="right"><b>Rs '. number_format($grossamt_total, 2) .'</b></td>
                </tr>';
                if ($cgstvalue >= 1) { 
                    $html.='<tr>
                        <td class="left" style="width: 32%;">GST Value</td>
                        <td align="right"><b>Rs '. number_format($cgstvalue, 2) .'</b></td>
                    </tr>';
                }
                if ($sgstvalue >= 1) {
                  $html.='<tr>
                        <td class="left" style="width: 32%;">SGST Value</td>
                        <td align="right"><b>Rs '. number_format($sgstvalue, 2) .'</b></td>
                    </tr>';
                }
                $html.='<tr>
                    <td class="left" style="width: 32%;">NET Value</td>
                    <td align="right"><b>Rs '. number_format($final_total, 2) .'</b></td>
                </tr>
                <tr>
                    <td class="left">Amount in Words </td>
                    <td align="right" style="padding-left: 0px !important;">
                        <div >
                            <b>Rupees ' . ucwords($in_result) . ' Only</b>
                        </div>
                    </td>
                </tr>
            </tbody>
          </table>
          ';

        $html .='<br/>
                <div style="font-size:12px !important;">
                  '.$result->section_content.'
                </div>
          </body>
        </html>';

        $mpdf=new mPDF('c','A4','','',10,10,30,16,8,8);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
        $mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
        $mpdf->defaultheaderfontsize = 12;  /* in pts */
        $mpdf->defaultheaderfontstyle = B;  /* blank, B, I, or BI */
        $mpdf->defaultheaderline = 1;   /* 1 to include line below header/above footer */
        $mpdf->defaultfooterfontsize = 12;  /* in pts */
        $mpdf->defaultfooterfontstyle = B;  /* blank, B, I, or BI */
        $mpdf->defaultfooterline = 1;   /* 1 to include line below header/above footer */  
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle($organisation->org_cname);
        $mpdf->SetAuthor($organisation->org_cname);
        // $mpdf->SetWatermarkText($organisation->org_cname);
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $stylesheet = file_get_contents('assets/mpdf/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html);
        // $mpdf->Output();
        $mpdf->Output("assets/admin/quotationdocuments/$company_name$quotation_id.pdf", 'F');
        $mpdf->Output("$company_name_$quotation_id.pdf", 'I');
    }

   public function quotation_mail($quotation_id)
    {
        $this->db->where('quotation_id ',$quotation_id);
        $result=$this->db->get('tbl_lead_quotation')->row();
        $response['email_id'] = $result->email;
        $response['quotation_id'] = $result->quotation_number;
        $response['quotation_content'] = $result->quto_subject;
        echo json_encode($response);
    }


   public function get_cust_details($quotation_id)
    {
        $this->db->select('leadopp_id');
        $this->db->where('quotation_id ',$quotation_id);
        $result=$this->db->get('tbl_lead_quotation')->row();
        $leadopp_id=$result->leadopp_id;

        $this->db->select('company_name');
        $this->db->where('leadopp_id',$leadopp_id);
        return $this->db->get('tbl_leads_opportunity')->row();
    }


   public function get_quotation_details($quotation_id)
   {
      $this->db->where('quotation_id ',$quotation_id);
      return $this->db->get('tbl_lead_quotation')->result();
   }

   public function get_quotation_product_details($quotation_id)
   {
      $this->db->where('quotation_id ',$quotation_id);
      return $this->db->get('tbl_quotation_details')->result();
   }


   public function send_quotation_mail($formdata)
    {
        
        $quotation_id = $formdata['quotation_id'];
        $to_mail = $formdata['to_mail'];
        $cc_mail = $formdata['cc_mail'];
        $bcc_mail = $formdata['bcc_mail'];
        $email_subject = $formdata['email_subject'];
        $email_draft = $formdata['email_draft'];
        
        $this->db->where('emp_id', $this->session->id);
        $emailData = $this->db->get('tbl_org_email_configuration')->row();
        if (empty($emailData)) {
          echo 0;
        } else {
          $this->db->where('quotation_id ',$quotation_id);
          $result=$this->db->get('tbl_lead_quotation')->row();

          $leadopp_id=$result->leadopp_id;
          $this->db->where('leadopp_id',$leadopp_id);
          $lead=$this->db->get('tbl_leads_opportunity')->row();
          $company_name=$lead->company_name;
          $attachment = base_url()."assets/admin/quotationdocuments/$company_name$quotation_id.pdf";

      //      $email_config = array(
      //        'protocol'  => $emailData->protocol,
      //        'smtp_host' => $emailData->host_name,
      //        'smtp_port' => $emailData->port_number,
      //        'smtp_user' => $emailData->email_id,
      //        'smtp_pass' => $emailData->email_pass,
      //        'mailtype'  => 'html',
      //        'starttls'  => true,
      //        'newline'   => "\r\n"
      //      );
		  // $this->load->library('email', $email_config);
      //     $this->email->initialize($email_config);	
		  // $from = 'support@buroforce.com';
          
      //     // $from = $emailData->email_id;
          
      //   //   $this->load->library('email', $email_config);
      //     $this->email->from($from, $emailData->from_name);
      //     if ($to_mail != '') {
      //       $this->email->to($to_mail);
      //     }
      //     if ($bcc_mail != '') {
      //       $this->email->cc($bcc_mail); 
      //     }          
      //     $this->email->subject($email_subject);
      //     $this->email->message($email_draft);
      //     $this->email->attach($attachment);
      //   //   $this->email->set_mailtype('html');
      //     if($this->email->send())
      //     {
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
      
          $mail->addAddress($to_mail);
          
          $mail->Subject = $email_subject;
          
          $mail->isHTML(true);
          
          $mail->Body = $email_draft;
          
          $mail->addAttachment("assets/admin/quotationdocuments/$company_name$quotation_id.pdf"); 

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



   public function delete_document($document_id)
    {
      $this->db->where('document_id ',$document_id);
      if($this->db->Delete('tbl_lead_documents')){
        echo 1;
      }else {
        echo 0;
      }
    }

   public function UploadDocument($attachment_lead_id,$fileremark)
    {
       $countfiles = count($_FILES['uploadfile']['name']);
       for($i=0;$i<$countfiles-1;$i++)
       {
          $image = $_FILES['uploadfile']['name'][$i];
          $cur_date=date("dmyHis");
          $sepext = explode('.', strtolower($image));
          $extension = end($sepext);
          $store_file =$cur_date.'_'.$i.".$extension";
          $move_file = FCPATH.'assets/admin/leaddocuments/';
          $move_file1 = $move_file . basename($store_file);
          move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $move_file1); 
          chmod($move_file1, 0755);                  
          $Insert_array=array
                             (
                               'leadopp_id'=>$attachment_lead_id,
                               'name'=>$store_file,
                               'uploadfilename'=>$image,
                               'remark'=>$fileremark[$i],
                               'datecreated'=>date("Y-m-d H:i:s")                           
                             );
          $this->db->Insert('tbl_lead_documents',$Insert_array); 
       }

    }

   public function activity_data($leadopp_id)
    {
      $this->db->where('tbl_schedule.leadopp_id ',$leadopp_id);
      $this->db->select('
                          tbl_admin_login.name as empname,tbl_schedule.*, tbl_user_query.product_name,tbl_user_query.query_id,tbl_user_query.issue,tbl_user_query.status,tbl_schedule_type_name.type_name
                        ')
               ->from('tbl_schedule')               
               ->join('tbl_user_query', 'tbl_schedule.issue_id = tbl_user_query.query_id ')
               ->join('tbl_admin_login', 'tbl_schedule.schedule_assign_to = tbl_admin_login.id ')          
               ->join('tbl_schedule_type_name', 'tbl_schedule.schedule_type_id = tbl_schedule_type_name.id ');
      $res=$this->db->get()->result();

      $final_array=array();
      foreach ($res as $row)
       {
             $this->db->order_by('created_date ','desc'); 
             $this->db->where('schedule_id ',$row->schedule_id);
             $task_status=$this->db->get('tbl_task_status')->row(); 

             $NewArray=array(
                               'query_id'=>$row->query_id, 
                               'schedule_id'=>$row->schedule_id, 
                               'type_name'=>$row->type_name,
                               'empname'=>$row->empname,
                               'created_date'=>$row->created_date,
                               'assign_date'=>$row->assign_date,
                               'assign_starttime'=>$row->assign_starttime,
                               'assign_endtime'=>$row->assign_endtime,
                               'assign_endtime'=>$row->assign_endtime,
                               'issue'=>$row->issue,
                               'taskstatus'=>$task_status->status,
                               'statusdatetime'=>$task_status->created_date,
                               'ticket_no'=>$row->ticket_no,
                               'leadopp_id' => $leadopp_id
                           );

            array_push($final_array, $NewArray);
       }

       return $final_array;
    }

   public function get_data()
    {
        // echo "232";
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);

        $this->db->from('tbl_source');
        $this->db->order_by("source_id", "DESC");
        return $this->db->get();
    }

   public function employee_list()
    {
          $session_id = $this->session->id;
          $user_type = $this->session->user_type;

          $this->db->select('id,name');          
          $this->db->where('user_status',1);
          // $this->db->where('user_type ','E');
          $this->db->where('org_id',$this->session->org_id);  

          if($this->session->user_type=='E')
          {
             $this->db->where_in('id',$session_id);     
             return $this->db->get('tbl_admin_login')->result();
          }
          else
          {
            //  $this->db->where_not_in('id',$session_id);     
             return $this->db->get('tbl_admin_login')->result();
          }
    }

   public function add_source($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'org_id'=>$this->session->org_id,
                      'source_title'=>$data['source_title'],
                      'date_created'=>$date
                );
        $res=$this->db->insert('tbl_source',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function Transfer_Lead($leadopp_id,$emp_id)
    {
      $this->db->set('assign_to',$emp_id);
      $this->db->set('assign_datetime',date("Y-m-d H:i:s"));
      $this->db->where('leadopp_id',$leadopp_id);
      $res=$this->db->update('tbl_leads_opportunity');

      $data1 = $this->db->affected_rows($res);

      if($data1)
      {
          $this->db->where('leadopp_id ',$leadopp_id);
          $row=$this->db->get('tbl_leads_opportunity')->row(); 
          $history_add_array = array
                                    (
                                      'leadopp_id'=> $leadopp_id,
                                      'created_by'=> $row->created_by,
                                      'company_name'=> $row->company_name,
                                      'contact_person_name1'=> $row->contact_person_name1,
                                      'phone_no'=> $row->phone_no,
                                      'email'=> $row->email,
                                      'address'=> $row->address,
                                      'source'=> $row->source,
                                      'stage'=> $row->stage,
                                      'assign_to'=> $emp_id,
                                      'assign_datetime'=> date("Y-m-d H:i:s"),
                                      'product_id'=> $row->product_id,
                                      'project_business_value'=> $row->project_business_value,
                                      'city'=>'',
                                      'tag'=>$row->tag,
                                      'business_id'=> $row->business_id,
                                      'location'=> $row->location,
                                      'group_id'=> $row->group_id,
                                      'closure_date'=> $row->closure_date,
                                      'remarks'=> $row->remarks,
                                      'customer_type'=> $row->customer_type,
                                      'is_converted'=> 0,
                                      'created_date'=> date("Y-m-d H:i:s")
                                    );

           $this->db->insert("tbl_lead_history",$history_add_array); 
      }
    }

    public function delete_source($id) 
    {
      $this->db->set('delete_status',1);
      $this->db->where('source_id',$id);
      $this->db->update('tbl_source');
    }
  
    public function edit_source($id) 
    {
      $this->db->where('source_id',$id);
      return $this->db->get('tbl_source');
    }

    public function Edit_Add_source($data) 
    {
        $this->db->set('source_title',$data['source_title']);
        $this->db->where('source_id',$data['source_id']);
        $data = $this->db->update('tbl_source');
        $data1 = $this->db->affected_rows($data) > 0;
        if($data1)
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function deactivate($id)
    {   
       $this->db->set('status',0);
       $this->db->where('source_id',$id);
       $this->db->update('tbl_source');
    }

    public function activate($id)
    {   
        $this->db->set('status',1);
        $this->db->where('source_id',$id);
        $this->db->update('tbl_source');
    }

// ============== Stage section ===================================
    public function get_stagedata()
    {
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);
        $this->db->from('tbl_stage');
        $this->db->order_by("stage_id", "DESC");
        return $this->db->get();
    }

    public function add_stage($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'stage_title'=>$data['stage_title'],
                      'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                );

        $res=$this->db->insert('tbl_stage',$data1);
        if($res)
        {
          echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function delete_stage($id) 
    {
      $this->db->set('delete_status',1);
      $this->db->where('stage_id',$id);
      $this->db->update('tbl_stage');
    }
  
    public function edit_stage($id) 
    {
        $this->db->where('stage_id',$id);
        return $this->db->get('tbl_stage');
    }

    public function Edit_Add_stage($data) 
    {
        $this->db->set('stage_title',$data['stage_title']);
        $this->db->where('stage_id',$data['stage_id']);
        $data = $this->db->update('tbl_stage');
        // $data1 = $this->db->affected_rows($data) > 0;
        
        if($data == 1)
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }

    public function deactivate1($id)
    {   
       $this->db->set('status',0);
       $this->db->where('stage_id',$id);
       $this->db->update('tbl_stage');
    }

    public function activate1($id)
    {   
        $this->db->set('status',1);
        $this->db->where('stage_id',$id);
        $this->db->update('tbl_stage');
    }

    public function AddTask($formdata)
    {
            $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
            $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
            $conv_date = date("Ymd", strtotime($schd_date1));
            $s_time = $formdata['schedule_start_time'];
            $e_time = $formdata['schedule_end_time'];
            $emp_id = $formdata['employee_id'];
            $type=$formdata['tasktype'];
            $leadopp_id=$formdata['leadopp_id'];

            $org_id=$this->session->org_id;

            $available = $this->db->query("SELECT schedule_id from tbl_schedule where `assign_starttime` >= '$s_time' AND `assign_starttime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_endtime` >= '$s_time' AND `assign_endtime` <= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule' UNION SELECT schedule_id from tbl_schedule where `assign_starttime` <= '$s_time' AND `assign_endtime` >= '$e_time' AND `assign_date`='$schedule_date1' AND `schedule_assign_to`='$emp_id' AND `reschedule`!='reschedule'");
            $available_count = $available->num_rows();

            if ($available_count==0) 
                {
                      $created_by = $this->session->id;
                      date_default_timezone_set('Asia/Kolkata');
                      $date=date("Y-m-d H:i:s");
                      $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                      $max = strlen($string) - 1;
                      $token = '';
                      for ($i = 0; $i < 6; $i++) 
                      {
                        $token .= $string[mt_rand(0, $max)];
                      } 
                      $salt = $token;
                      $schd_date1 = str_replace(',', ' ', $formdata['schedule_date']);
                      $schedule_date1 = date("Y-m-d", strtotime($schd_date1));
                      $result = $this->db->query("SELECT ticket_no FROM tbl_user_query ORDER BY query_id DESC LIMIT 1;")->row();
                      if ($result) 
                      {
                        $result1=$result->ticket_no;
                        $pre_date = explode('-', $result1);
                        $previous_date = $pre_date[0]; 
                        $ticket_no = $pre_date[1]; 
                        $cur_date=date("Ymd"); 
                        if ($previous_date==$cur_date) 
                        {
                          $ticket_no++;
                          $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                          $final_ticket_num = $cur_date.'-'.$ticket_no1;
                          $schedule_ticket_num='S_'.$cur_date.'-'.$ticket_no1;
                        }
                        else
                        {
                          $final_ticket_num=$cur_date.'-'.'001';
                          $schedule_ticket_num='S_'.$cur_date.'-'.'001';
                        }
                      }
                      else
                      {
                        $cur_date=date("Ymd");
                        $final_ticket_num=$cur_date.'-'.'001';
                        $schedule_ticket_num='S_'.$cur_date.'-'.'001';
                      }
                      $customer_id = $formdata['customer_id'];
                      $product_id = $formdata['product_id'];
                      $pdr_name = $this->db->query("SELECT prdsrv_name FROM `tbl_product_service_list` WHERE prd_srv_id='$product_id'")->row(); 
                      $product_name = $pdr_name->prdsrv_name;
                      $query = $formdata['query'];
                      $employee_id = $emp_id;
                      $start_time = $formdata['schedule_start_time'];
                      $end_time = $formdata['schedule_end_time'];
                      $schedule_type_id = $formdata['schedule_type_id'];

                      $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`assign_date`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','$schedule_date1','Normal')"); 

                      $insert_id = $this->db->insert_id();
                      if ($data) 
                      {
                           if($this->session->user_type!='SA') 
                            {
                              $schedule_type = "Own";
                            }
                            else
                            {
                              $schedule_type = "Task";
                            }
                            $this->db->query("INSERT INTO `tbl_schedule`(`org_id`,`created_by`, `issue_id`, `schedule_assign_to`, `schedule_type_id`, `ticket_no`, `assign_date`, `assign_starttime`, `assign_endtime`, `schedule_type`, `created_date`,type,leadopp_id) VALUES ('$org_id','$created_by','$insert_id','$employee_id','$schedule_type_id','$schedule_ticket_num','$schedule_date1','$start_time','$end_time','$schedule_type','$date','$type','$leadopp_id')");                              
                           
                            $schedule_insert_id = $this->db->insert_id();
                            $TaskArray=array(
                                               'employee_id'=>$employee_id,
                                               'customer_id'=>$customer_id,
                                               'product_id'=>$product_id,
                                               'query_id'=>$insert_id, 
                                               'schedule_id'=>$schedule_insert_id,
                                               'ticket_no'=>$final_ticket_num,
                                               'remark'=>$query,
                                               'status'=>'pending',
                                               'created_date'=>date("Y-m-d H:i:s")
                                               );
                           $this->db->Insert("tbl_task_status",$TaskArray);      

                            $data2 = $this->db->query("SELECT * FROM `tbl_admin_login` WHERE `id`='$employee_id'")->row();
                            $android_id = $data2->android_id;
                            $name = $data2->name;
                            $notification_date = date("Y-m-d H:i:s");
                            $notification_msg = "Allocated new task and ticket no.is ".$final_ticket_num;
                            $date=date("Y-m-d H:i:s");
                            $res = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$employee_id','Query allocated','$notification_msg','pending','$date')");
                            $notification_id = $this->db->insert_id($res);
                            $reg_token = $android_id;
                            $data = array('server_notification'=>"employee_task_allocated",'message'=>'Allocated new task and ticket no.is '.$final_ticket_num,'query_id'=>$insert_id,'notification_id'=>$notification_id);
                             $target = $reg_token; 
                             $url = 'https://fcm.googleapis.com/fcm/send';
                             $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                             $fields = array();
                             $fields['data'] = $data;
                             if(is_array($target))
                              {
                                $fields['registration_ids'] = $target;
                              }
                              else
                              {
                                $fields['to'] = $target;
                              }
                              $headers = array(
                                'Content-Type:application/json',
                                'Authorization:key='.$server_key
                              );
                              $ch = curl_init();
                              curl_setopt($ch, CURLOPT_URL, $url);
                              curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                              curl_setopt($ch, CURLOPT_POST, true);
                              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                              $result = curl_exec($ch);
                              
                              if ($result === FALSE) 
                              {
                                  die('FCM Send Error: ' . curl_error($ch));
                              }
                              else
                              {
                                   $data3 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='$customer_id'")->row();
                                   $android_id = $data3->android_id;
                                   $contact_person_name1 = $data2->contact_person_name1;
                                   $notification_msg = "Your issue ".$final_ticket_num." is assign to ".$name;
                                   $date=date("Y-m-d H:i:s");
                                   $res1 = $this->db->query("INSERT INTO `tbl_push_notification`(`org_id`,`customer_id`, `query_id`, `user_id`, `notification_to`, `notification_title`, `notification_msg`, `status`, `notification_date`) VALUES ('$org_id','$customer_id','$insert_id','$employee_id','$customer_id','Query allocated','$notification_msg','pending','$date')");
                                   $notification_id1 = $this->db->insert_id($res1);
                                   $reg_token = $android_id;
                                   $data = array('server_notification'=>"customer_query_allocated",'message'=>'Your issue '.$final_ticket_num.' is assign to '.$name,'query_id'=>$insert_id,'notification_id'=>$notification_id1);
                                   $target = $reg_token; 
                                   $url = 'https://fcm.googleapis.com/fcm/send';
                                   $server_key = 'AAAA-SCnH0c:APA91bE6sqzZiDzhvqIr7qorgSJykF3Y5HERn8k6MkCC9hp8D63jXJAal7V5J94JNM7Y76GKslvLPNWrUrS9TmXl8QIF4oaJqOkI1PZwN1n0utlDlEy-kqjQ6btjL7DD1e0bF2KbNdU0ZKsLegI7_5_bqsBMPvgK1w';
                                   $fields = array();
                                   $fields['data'] = $data;

                                   if(is_array($target))
                                    {
                                      $fields['registration_ids'] = $target;
                                    }
                                    else
                                    {
                                      $fields['to'] = $target;
                                    }
                                    $headers = array(
                                      'Content-Type:application/json',
                                      'Authorization:key='.$server_key
                                    );
                                     $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_URL, $url);
                                    curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                                    curl_setopt($ch, CURLOPT_POST, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                                    $result = curl_exec($ch);
                                    if ($result === FALSE) 
                                    {
                                        die('FCM Send Error: ' . curl_error($ch));
                                    }
                                    else
                                    {
                                        $notification_date = date("Y-m-d", strtotime($schedule_date));
                                        $this->db->set('assign_to',$employee_id);
                                        $this->db->where('query_id',$insert_id);
                                        $this->db->update('tbl_user_query');
                                        echo 1;
                                    }
                                     curl_close($ch);                                         
                              }
                               curl_close($ch);
                      }
                      else
                      {

                      }
                      if ($formdata['addReminder'] == 1) 
                      {
                          $recurring_eod1 = str_replace(',', ' ', $formdata['recurring_eod']);
                          $recurringEOD = date("Y-m-d", strtotime($recurring_eod1));
                          $eod_date = date("Ymd", strtotime($recurringEOD));

                          $rem_notify_by = $formdata['reminder_notify_by'];
                          $rem_notify_by_id = "";
                          for ($i = 0; $i < count($rem_notify_by); $i++) 
                          {
                              $rem_notify_by_id = $rem_notify_by_id . $rem_notify_by[$i] . ","; 
                          }
                          $rem_notify_by_id1 = trim($rem_notify_by_id, ',');
                          if (empty($rem_notify_by_id1)) 
                          {
                              $rem_notify_by_id1 = '';
                          } 
                          else 
                          {
                              $rem_notify_by_id1 = $rem_notify_by_id1;
                          }

                          if($formdata['recurring_set'] == 1)
                          {
                              $data1 = array(
                                  'org_id'=>$this->session->org_id,
                                  'time_zone' => $this->session->org_timezone,
                                  'recd_id' => $insert_id,
                                  'module_name'=> 'Activity',
                                  'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                  'user_id' => implode(',',$formdata['user_id']),
                                  'reminder_date' => $conv_date,
                                  'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                  'reminder_before_time' => $formdata['reminder_before_time'],
                                  'notify_id' => $rem_notify_by_id1,
                                  'reminder_note' => $formdata['reminder_note'],
                                  'recurring_set' => $formdata['recurring_set'],
                                  'interval_type' => $formdata['interval_type'],
                                  'recurring_eod' => $eod_date,
                              );
                              
                              $this->db->insert('tbl_reminder',$data1);
                              
                              $reminderID = $this->db->insert_id(); 

                              $recurringDatesListArray = array();
                              $recurringDatesArray = $this->getRecurringDateString($formdata['interval_type'],$conv_date,$recurringEOD);
                              
                              $a = new DateTime(date('H:i:s',strtotime(date('H:i',strtotime($formdata['reminder_time'])))));
                              $b = new DateTime(date('H:i:s',strtotime($formdata['reminder_before_time'])));
                              $interval = $a->diff($b);
                              $timeDiff = $interval->format("%H:%i:%s%s");

                              for ($i=0; $i < count($recurringDatesArray); $i++) { 
                                  $rec_data = array(
                                      'time_zone' => $this->session->org_timezone,
                                      'notify_id' => $rem_notify_by_id1,
                                      'reminder_id' => $reminderID,
                                      'recurring_rem_date' => $conv_date,
                                      'recurring_rem_time' => date('H:i',strtotime($formdata['reminder_time'])),
                                      'recurring_date' => $recurringDatesArray[$i],
                                      'recurring_time' => $timeDiff,
                                      'recurring_mail_sent' => 0,
                                      'recurring_user_id' => implode(',',$formdata['user_id']),
                                  );
                                  array_push($recurringDatesListArray,$rec_data);
                              }
                              $res = $this->db->insert_batch('tbl_reminder_recurring',$recurringDatesListArray);
                            
                              if($res)
                              {
                                  echo 1;
                              }
                              else
                              {
                                  echo 0;
                              }
                          }
                          else
                          {
                              $data1 = array(
                                  'org_id'=>$this->session->org_id,
                                  'time_zone' => $this->session->org_timezone,
                                  'recd_id' => $insert_id,
                                  'module_name'=> 'Activity',
                                  'reminder_title' => $schedule_ticket_num.' - '.$product_name,
                                  'user_id' => implode(',',$formdata['user_id']),
                                  'reminder_date' => $conv_date,
                                  'reminder_time' => date('H:i',strtotime($formdata['schedule_start_time'])),
                                  'reminder_before_time' => $formdata['reminder_before_time'],
                                  'reminder_note' => $formdata['reminder_note'],
                                  'recurring_set' => $formdata['recurring_set']
                              );
                              $res = $this->db->insert('tbl_reminder',$data1);
                              if($res){
                                  echo 1;
                              }else{
                                  echo 0;
                              }
                          }
                      }
            }
            else
            {
                echo "2";
            }

    }

// ========================================= Leads Opportunity ====================

    public function get_leads_opportunity()
    { 
        $session_id = $this->session->id;
        $user_type = $this->session->user_type;
        if($user_type=='E')
        {
          $this->db->where('assign_to',$session_id);
        }
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_leads_opportunity');
        $this->db->order_by("leadopp_id", "DESC");
        $data = $this->db->get();
        
        $final_array=array();
        foreach ($data->result() as $value) 
        {
            $employee_id = $value->assign_to;
            $this->db->select('id, name');
            $this->db->where('id',$employee_id);
            $emp_data = $this->db->get('tbl_admin_login')->row();
            $emp_name = $emp_data->name;
            $business_id = $value->business_id;      
            $business_id=rtrim($business_id,",");
            if ($business_id!='')
            {              
                $data = $this->db->query(" SELECT business_name FROM `tbl_business` WHERE `business_id` IN($business_id) ")->result();
                 // print_r($data);
                 $buss_name="";
                  foreach ($data as $row)
                  {
                      $buss_name=$buss_name.$row->business_name." ,";
                  }
                  $business_name = trim($buss_name, ',');
            }
            else
            {
                $business_name = '';
            }

            $group_id = $value->group_id;
            $this->db->select('group_id, group_name');
            $this->db->where('group_id',$group_id);
            $group_data = $this->db->get('tbl_group')->row();
            $group_name = $group_data->group_name;
            $source = $value->source;
            $this->db->select('source_id, source_title');
            $this->db->where('source_id',$source);
            $source_data = $this->db->get('tbl_source')->row();
            $source_title = $source_data->source_title;
            $stage = $value->stage;
            
            $this->db->select('stage_id, stage_title');
            $this->db->where('stage_id',$stage);
            $stage_data = $this->db->get('tbl_stage')->row();
            $stage_title = $stage_data->stage_title;
            $this->db->where('prd_srv_id',$value->product_id);
            $prodcut = $this->db->get('tbl_product_service_list')->row();
            $result_array = array
            (
                'emp_name'=> $emp_name,
                'leadopp_id'=> $value->leadopp_id,
                'lead_generate_id'=> $value->lead_generate_id,
                'company_name'=> $value->company_name,
                'contact_person_name1'=> $value->contact_person_name1,
                'phone_no'=> $value->phone_no,
                'email'=> $value->email,
                'tag'=> $value->tag,
                'prdsrv_name'=> $prodcut->prdsrv_name,
                'address'=> $value->address,
                'city'=> $value->city,
                'business_name'=> $business_name,
                'remarks'=> $value->remarks,
                'location'=> $value->location,
                'group_name'=> $group_name,
                'stage_title'=> $stage_title,
                'source_title'=> $source_title,
                'welcome_email_status' => $value->welcome_email_status,
                'closure_date'=> $value->closure_date,
                'remarks'=> $value->remarks,
                'customer_type'=> $value->customer_type,
                'created_date'=> $value->created_date
            );
            array_push($final_array, $result_array);
        }
         // echo json_encode($final_array);
         return $final_array;
    }
// =============== Delete Leads Opp =================================================
    public function del_leads($leadopp_id) 
    {
        $this->db->where('leadopp_id',$leadopp_id);
        $this->db->delete('tbl_leads_opportunity');
    }
// ========================================= Get company List =================================================
    public function company_list() 
    {
        $this->db->select('customer_id, company_name, contact_person_name1, phone_no');
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);

        return $this->db->get('tbl_customer')->result();
    }
// ============================== / Particular company details(customer) =================================
public function get_cust_detail($customer_id)
    {
       $this->db->select('*');
       $this->db->where('customer_id',$customer_id);
       $data = $this->db->get('tbl_customer')->row();
       if ($data)
       {
            
           $business_id = $data->business_id;
            if ($business_id!=0)
            {
                $this->db->select('business_id, business_name');
                $this->db->where('business_id',$business_id);
                $business_data = $this->db->get('tbl_business')->row();
                $business_id1 = $business_data->business_id;
                $business_name1 = $business_data->business_name;
            }
            else
            {
                 $business_id1="";
                 $business_name1="";
            }

            $location_id = $data->location_id;
            if ($location_id!=0)
            {
                $this->db->select('location_id, location');
                $this->db->where('location_id',$location_id);
                $location_data = $this->db->get('tbl_location')->row();

                 $location_id1 = $location_data->location_id;
                 $location1 = $location_data->location;
            }
            else
            {
                 $location_id1="";
                 $location1="";
            }
            $group_id = $data->group_id;
            if ($group_id!=0)
            {
                $this->db->select('group_id, group_name');
                $this->db->where('group_id',$group_id);
                $group_data = $this->db->get('tbl_group')->row();

                 $group_id1 = $group_data->group_id;
                 $group_name1 = $group_data->group_name;
            }
            else
            {
                 $group_id1="";
                 $group_name1="";
            }
            $final_array=array();
            $result_array = array
            (
                'customer_id'=> $data->customer_id,
                'company_name'=> $data->company_name,
                'contact_person_name1'=> $data->contact_person_name1,
                'alternate_email'=> $data->alternate_email,
                'phone_no'=> $data->phone_no,
                'alternate_number'=> $data->alternate_number,
                'landline_number'=> $data->landline_number,
                'email'=> $data->email,
                'address'=> $data->address,
                'city'=> $data->city,
                'dob'=> $data->dob,
                'company_anniversary'=> $data->company_anniversary,
                'marriage_anniversary'=> $data->marriage_anniversary,
                'business_id'=> $business_id1,
                'business_name'=> $business_name1,
                'location_id'=> $location_id1,
                'location'=> $location1,
                'group_id'=> $group_id1,
                'group_name'=> $group_name1
            );
            array_push($final_array, $result_array);
            echo json_encode($final_array);
       }
       else
       {
            $response["error"] = True;
            $response["error_msg"] = "No Data";
            echo json_encode($response);
       }
    }

    public function convert_to_contact($leadopp_id)
    {
        $this->db->select('customer_id');
        $this->db->where('leadopp_id', $leadopp_id);
        return $this->db->get('tbl_customer')->row();
    }

    public function source_details()
    {
        $this->db->select('source_id, source_title');
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);    
        $this->db->where('status',1);

       return $this->db->get('tbl_source')->result();
    }

    public function stage_details()
    {
        $this->db->select('stage_id, stage_title');
        $this->db->where('org_id',$this->session->org_id);
        $this->db->where('delete_status',0);    
        $this->db->where('status',1);
        return $this->db->get('tbl_stage')->result();
    }

    public function InsertLead($leadopp_array)
     { 
        $cur_date=date("Ymd"); 
        $Prefix="L-".$cur_date.'-';
        $this->db->select('lead_generate_id');
        $this->db->order_by('leadopp_id','DESC');
        $result = $this->db->get('tbl_leads_opportunity')->row();
        if(!empty($result->lead_generate_id))
        {
            $pre_date = explode('-', $result->lead_generate_id);        
            $previous_date = $pre_date[1]; 
            $ticket_no = $pre_date[2]; 
            if ($previous_date==$cur_date) 
            {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                // $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $lead_generate_id=$Prefix.$ticket_no1;
            }
            else
            {
                $lead_generate_id=$Prefix.'001';
            }
        }
        else
        {
             $lead_generate_id=$Prefix.'001';
        }

        $contact_person = $leadopp_array['contact_person'];
        $source = $leadopp_array['source'];
        $stage = $leadopp_array['stage'];
        $employee_id = $this->session->id;
        $leadopp_type = $leadopp_array['leadopp_type'];
        $bussiness = $leadopp_array['business'];
        $bussiness_id="";
        for ($i=0; $i < count($bussiness); $i++) 
        { 
          $bussiness_id=$bussiness_id.$bussiness[$i].",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1))
        {
           $business_segment_id='0';
        }
        else
        {
           $business_segment_id=$buss_id1;
        }

        $location = '';
        $group_id = '';
        $company_name = $leadopp_array['org_name_lead'];
        if(!empty($leadopp_array['closure_date']))
        {
          $closure_date1 = date("Y-m-d", strtotime($leadopp_array['closure_date']));
        }
        else
        {
          $closure_date1 = "0000-00-00";   
        }               
        $created_date=date("Y-m-d H:i:s");

        $add_array = array
        (
            'org_id'=>$this->session->org_id,
            'created_by'=> $employee_id,
            'lead_generate_id'=> $lead_generate_id,
            'company_name'=> $company_name,
            'contact_person_name1'=> $leadopp_array['contact_person'],
            'phone_no'=> $leadopp_array['contact_number1'],
            'email'=> $leadopp_array['email_id'],
            'address'=> $leadopp_array['address'],
            'source'=> $leadopp_array['source'],
            'stage'=> $leadopp_array['stage'],
            'assign_to'=> $leadopp_array['emp_id'],
            'assign_datetime'=> date("Y-m-d H:i:s"),
            'tag'=>$leadopp_array['tag'],
            'product_id'=> $leadopp_array['product_id'],
            'generated_by'=> $leadopp_array['lead_generated_by'],
            'project_business_value'=> $leadopp_array['project_business_value'],
            'city'=> '',
            'business_id'=> $business_segment_id,
            'location'=> $location,
            'group_id'=> $group_id,
            'closure_date'=> $closure_date1,
            'remarks'=> $leadopp_array['remarks'],
            'customer_type'=> $leadopp_type,
            'is_converted'=> 0,
            'branch_id'=> $leadopp_array['branch_id'],
            'created_date'=> $created_date
        );
        $this->db->insert('tbl_leads_opportunity',$add_array);

        $leadopp_id=$this->db->insert_id();

        // $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
        // if($check_code2->auto_contact_code != '')
        // {
        //     $code2 = $check_code2->auto_contact_code; 
        //     $contact_code2 = (int)$code2 + 1;
        // }
        // else
        // {
        //     $contact_code2 = '1000000';
        // }

        // $InsertCustomerArray=array(
        //   'org_id'=>$this->session->org_id,
        //   'created_by'=>$employee_id,
        //   'parent_id'=>0,
        //   'type_id'=>0,
        //   'business_id'=>0,
        //   'location_id'=>0,
        //   'group_id'=>0,
        //   'company_name'=>$company_name,
        //   'contact_person_name1'=>$leadopp_array['contact_person'],
        //   'alternate_email'=>'',
        //   'phone_no'=>$leadopp_array['contact_number1'],
        //   'alternate_number'=>'',
        //   'landline_number'=>'',
        //   'email'=>$leadopp_array['email_id'],
        //   'address'=>$leadopp_array['address'],
        //   'city'=>'',
        //   'state'=>0,
        //   'country'=>101,
        //   'password'=>'buro@123',
        //   'dob'=>'',
        //   'company_anniversary'=>'',
        //   'marriage_anniversary '=>'',
        //   'android_id '=>'',
        //   'imei'=>'',
        //   'cust_type'=>'primary',
        //   'leadopp_id'=>$leadopp_id,
        //   'type'=>'T',                            
        //   'delete_status'=>0,
        //   'auto_contact_code' => $contact_code2,
        //   'created_date'=>$created_date 
        // );
        // $this->db->insert("tbl_customer",$InsertCustomerArray); 
        $company_id=$this->db->insert_id();
        if ($leadopp_array['welcome_email_lead'] === 'Welcome') {
          $this->WelComeEmailSent($leadopp_id);
        }

        $this->db->SET('company_id',$company_id);
        $this->db->where('leadopp_id',$leadopp_id);
        $this->db->update('tbl_leads_opportunity');
        $history_add_array = array(
          'org_id'=>$this->session->org_id,
          'leadopp_id'=> $leadopp_id,
          'created_by'=> $employee_id,
          'company_name'=> $company_name,
          'contact_person_name1'=> $leadopp_array['contact_person'],
          'phone_no'=> $leadopp_array['contact_number1'],
          'email'=> $leadopp_array['email_id'],
          'address'=> $leadopp_array['address'],
          'source'=> $leadopp_array['source'],
          'stage'=> $leadopp_array['stage'],
          'assign_to'=> $leadopp_array['emp_id'],
          'assign_datetime'=> date("Y-m-d H:i:s"),
          'product_id'=> $leadopp_array['product_id'],
          'generated_by'=> $leadopp_array['lead_generated_by'],
          'project_business_value'=> $leadopp_array['project_business_value'],
          'city'=> '',
          'tag'=>$leadopp_array['tag'],
          'business_id'=> $business_segment_id,
          'location'=> $location,
          'group_id'=> $group_id,
          'closure_date'=> $closure_date1,
          'remarks'=> $leadopp_array['remarks'],
          'customer_type'=> $leadopp_type,
          'is_converted'=> 0,
          'created_date'=> $created_date
        );
        $this->db->insert("tbl_lead_history",$history_add_array); 
        echo "1";

    }


    public function InsertOpportunity($leadopp_array)
    { 
      
       $cur_date=date("Ymd"); 
       $Prefix="E-".$cur_date.'-';
       $this->db->select('lead_generate_id');
       $this->db->order_by('leadopp_id','DESC');
       $result = $this->db->get('tbl_leads_opportunity')->row();
       if(!empty($result->lead_generate_id))
       {
            $pre_date = explode('-', $result->lead_generate_id);        
            $previous_date = $pre_date[1]; // from table last date
            $ticket_no = $pre_date[2]; // from table last ticket no
            if ($previous_date==$cur_date) 
            {
                $ticket_no++;
                $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
                // $final_ticket_num = $cur_date.'-'.$ticket_no1;
                $lead_generate_id=$Prefix.$ticket_no1;
            }
            else
            {
                $lead_generate_id=$Prefix.'001';
            }
       }
       else
       {
          $lead_generate_id=$Prefix.'001';
       }

        $contact_person = $leadopp_array['contact_person'];
        $source = $leadopp_array['source'];
        $stage = $leadopp_array['stage'];

        $employee_id = $this->session->id;
        $leadopp_type = $leadopp_array['leadopp_type'];
        $business_segment_id = $leadopp_array['business_id'];
        $location = $leadopp_array['location_id'];
        $group_id = $leadopp_array['group_id'];
        $cust_id = $leadopp_array['company_id'];
        $this->db->select('company_name');
        $this->db->where('customer_id',$cust_id);
        $company = $this->db->get('tbl_customer')->row();
        $company_name = $company->company_name;

        if(!empty($leadopp_array['closure_date']))
        {
          $closure_date1 = date("Y-m-d", strtotime($leadopp_array['closure_date']));
        }
        else
        {
          $closure_date1 = "0000-00-00";   
        }       
        $created_date=date("Y-m-d H:i:s");
        $add_array = array
        (
            'org_id'=>$this->session->org_id,
            'created_by'=> $employee_id,
            'lead_generate_id'=> $lead_generate_id,
            'company_name'=> $company_name,
            'company_id'=>  $leadopp_array['company_id'],
            'contact_person_name1'=> $leadopp_array['contact_person'],
            'phone_no'=> $leadopp_array['contact_number1'],
            'email'=> $leadopp_array['email_id'],
            'address'=> $leadopp_array['address'],
            'source'=> $leadopp_array['source'],
            'stage'=> $leadopp_array['stage'],
            'assign_to'=> $leadopp_array['emp_id'],            
            'assign_datetime'=> date("Y-m-d H:i:s"),
            'product_id'=> $leadopp_array['product_id'],
            'generated_by'=> $leadopp_array['opp_generated_by'],
            'project_business_value'=> $leadopp_array['project_business_value'],
            'city'=> '',
            'business_id'=> $business_segment_id,
            'location'=> $location,
            'group_id'=> $group_id,
            'closure_date'=> $closure_date1,
            'remarks'=> $leadopp_array['remarks'],
            'tag'=> $leadopp_array['tag'],
            'customer_type'=> $leadopp_type,
            'is_converted'=> 2,
            'branch_id' => $leadopp_array['branch_id'],
            'created_date'=> $created_date
        );
        $this->db->insert('tbl_leads_opportunity',$add_array);
        $leadopp_id=$this->db->insert_id();

        // $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
        // if($check_code2->auto_contact_code != '')
        // {
        //     $code2 = $check_code2->auto_contact_code; 
        //     $contact_code2 = (int)$code2 + 1;
        // }
        // else
        // {
        //     $contact_code2 = '1000000';
        // }
        // $InsertCustomerArray=array(
        //   'org_id'=>$this->session->org_id,
        //   'created_by'=>$employee_id,
        //   'parent_id'=>0,
        //   'type_id'=>0,
        //   'business_id'=>0,
        //   'location_id'=>0,
        //   'group_id'=>0,
        //   'company_name'=>$company_name,
        //   'contact_person_name1'=>$leadopp_array['contact_person'],
        //   'alternate_email'=>'',
        //   'phone_no'=>$leadopp_array['contact_number1'],
        //   'alternate_number'=>'',
        //   'landline_number'=>'',
        //   'email'=>$leadopp_array['email_id'],
        //   'address'=>$leadopp_array['address'],
        //   'city'=>'',
        //   'state'=>0,
        //   'country'=>101,
        //   'password'=>'buro@123',
        //   'dob'=>'1970-01-01',
        //   'company_anniversary'=>'',
        //   'marriage_anniversary '=>'',
        //   'android_id '=>'',
        //   'imei'=>'',
        //   'cust_type'=>'primary',
        //   'leadopp_id'=>$leadopp_id,
        //   'type'=>'T',                            
        //   'delete_status'=>0,
        //   'auto_contact_code' => $contact_code2,
        //   'created_date'=>$created_date 
        // );
        // $this->db->insert("tbl_customer",$InsertCustomerArray); 

        if ($leadopp_array['welcome_email_opp'] === 'Welcome') {
          $this->WelComeEmailSent($leadopp_id);
        }

        $history_add_array = array
        (
          'org_id'=>$this->session->org_id,
          'leadopp_id'=> $leadopp_id,
          'created_by'=> $employee_id,
          'company_name'=> $company_name,
          'company_id'=>  $leadopp_array['company_id'],
          'contact_person_name1'=> $leadopp_array['contact_person'],
          'phone_no'=> $leadopp_array['contact_number1'],
          'email'=> $leadopp_array['email_id'],
          'address'=> $leadopp_array['address'],
          'source'=> $leadopp_array['source'],
          'stage'=> $leadopp_array['stage'],
          'assign_to'=> $leadopp_array['emp_id'],            
          'assign_datetime'=> date("Y-m-d H:i:s"),
          'product_id'=> $leadopp_array['product_id'],
          'generated_by'=> $leadopp_array['opp_generated_by'],
          'project_business_value'=> $leadopp_array['project_business_value'],
          'city'=> '',
          'business_id'=> $business_segment_id,
          'location'=> $location,
          'group_id'=> $group_id,
          'closure_date'=> $closure_date1,
          'remarks'=> $leadopp_array['remarks'],
          'tag'=> $leadopp_array['tag'],
          'customer_type'=> $leadopp_type,
          'is_converted'=> 2,
          'created_date'=> $created_date
        );
        $this->db->insert("tbl_lead_history",$history_add_array); 
        echo "1";

    }


  public function UpdateLead($leadopp_array)
  {
      $leadopp_id = $leadopp_array['leadopp_id'];
      $contact_person = $leadopp_array['contact_person'];
      $source = $leadopp_array['source'];
      $stage = $leadopp_array['stage'];
      $employee_id = $this->session->id;
      $leadopp_type = $leadopp_array['leadopp_type'];
      $created_date=date("Y-m-d H:i:s");
        $bussiness = $leadopp_array['business'];
        $bussiness_id="";
        for ($i=0; $i < count($bussiness); $i++) 
        { 
             $bussiness_id=$bussiness_id.$bussiness[$i].",";
        }
        $buss_id1 = trim($bussiness_id, ',');
        if (empty($buss_id1))
        {
           $business_segment_id='0';
        }
        else
        {
           $business_segment_id=$buss_id1;
        }


      $location='';
      $group_id='';
      $company_name = $leadopp_array['org_name_lead'];
      if(!empty($leadopp_array['closure_date']))
      {
        $closure_date1 = date("Y-m-d", strtotime($leadopp_array['closure_date']));
      }
      else
      {
        $closure_date1 = "0000-00-00";   
      }      

      $update_array = array
      (
          'company_name'=> $company_name,
          'contact_person_name1'=> $leadopp_array['contact_person'],
          'phone_no'=> $leadopp_array['contact_number1'],
          'email'=> $leadopp_array['email_id'],
          'address'=> $leadopp_array['address'],
          'source'=> $leadopp_array['source'],
          'stage'=> $leadopp_array['stage'],
          'assign_to'=> $leadopp_array['emp_id'],
          'assign_datetime'=> date("Y-m-d H:i:s"),
          'tag'=>$leadopp_array['tag'],
          'product_id'=> $leadopp_array['product_id'],
          'project_business_value'=> $leadopp_array['project_business_value'],
          'business_id'=> $business_segment_id,
          'remarks'=> $leadopp_array['remarks'],
          'closure_date'=> $closure_date1,
          'generated_by'=> $leadopp_array['lead_generated_by'],
          'branch_id'=> $leadopp_array['branch_id'],
          
      );
      // print_r($add_array);
      $this->db->where('leadopp_id',$leadopp_id);
      $this->db->Update('tbl_leads_opportunity',$update_array);
      
      if ($leadopp_array['welcome_email_lead'] === 'Welcome') {
        $this->WelComeEmailSent($leadopp_id);
      }
      
      $history_add_array = array
                                  (
                                      'org_id'=>$this->session->org_id,
                                      'leadopp_id'=> $leadopp_id,
                                      'created_by'=> $employee_id,
                                      'company_name'=> $company_name,
                                      'contact_person_name1'=> $leadopp_array['contact_person'],
                                      'phone_no'=> $leadopp_array['contact_number1'],
                                      'email'=> $leadopp_array['email_id'],
                                      'address'=> $leadopp_array['address'],
                                      'source'=> $leadopp_array['source'],
                                      'stage'=> $leadopp_array['stage'],
                                      'assign_to'=> $leadopp_array['emp_id'],
                                      'assign_datetime'=> date("Y-m-d H:i:s"),
                                      'product_id'=> $leadopp_array['product_id'],
                                      'project_business_value'=> $leadopp_array['project_business_value'],
                                      'city'=> '',
                                      'tag'=>$leadopp_array['tag'],
                                      'business_id'=> $business_segment_id,
                                      'location'=> $location,
                                      'group_id'=> $group_id,
                                      'closure_date'=> $closure_date1,
                                      'remarks'=> $leadopp_array['remarks'],
                                      'customer_type'=> $leadopp_type,
                                      'is_converted'=> 0,
                                      'created_date'=> $created_date
                                  );
         $this->db->insert("tbl_lead_history",$history_add_array); 
  }



// =============== Activity Section =======================================================
   public function activity()
    {        
        $this->db->where('delete_status',0);
        $this->db->where('org_id',$this->session->org_id);
        $this->db->from('tbl_activity');
        $this->db->order_by("activity_title", "DESC");
        return $this->db->get();
    }

    public function add_activity($data) 
    {
        $date=date("Y-m-d H:i:s"); 
        $data1=array(
                      'activity_title'=>$data['activity_title'],
                      'org_id'=>$this->session->org_id,
                      'date_created'=>$date
                );
        $res=$this->db->insert('tbl_activity',$data1);
        if($res)
        {
           echo 1;
        }
        else
        {
           echo 0;
        }
    }

    public function delete_activity($id) 
    {
        $this->db->set('delete_status',1);
        $this->db->where('activity_id',$id);
        $this->db->update('tbl_activity');
    }
  

    public function edit_activity($id) 
    {
        $this->db->where('activity_id',$id);
        return $this->db->get('tbl_activity');
    }

    public function Edit_Add_activity($data) 
    {
        $this->db->set('activity_title',$data['activity_title']);
        $this->db->where('activity_id',$data['activity_id']);
        $data = $this->db->update('tbl_activity');
        $data1 = $this->db->affected_rows($data) > 0;
        if($data1)
        {
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
// =================================================

    public function deactivate_activity($id)
    {   
       $this->db->set('status',0);
       $this->db->where('activity_id',$id);
       $this->db->update('tbl_activity');
    }

    public function activate_activity($id)
    {   
        $this->db->set('status',1);
        $this->db->where('activity_id',$id);
        $this->db->update('tbl_activity');
    }


  // =============================================================
  // public function WelComeEmailSent($lead_main_id)
  // {
   
  //   error_reporting(0);
  //   $this->db->select('email,contact_person_name1');
  //   $this->db->where('leadopp_id', $lead_main_id);
  //   $data = $this->db->get('tbl_leads_opportunity')->row();

  //   if (!empty($data)) {
  //     $name = $data->contact_person_name1;
  //     $to_email = $data->email;
  //   }
    
  //   $this->db->where('emp_id', $this->session->id);
  //   $emailData = $this->db->get('tbl_org_email_configuration')->row();
  //   if (empty($emailData)) {
  //     echo 0;
  //   } else {
  //     $this->db->where('email_body_id', 1);
  //     $data1 = $this->db->get('tbl_email_body')->row();
  //     if (!empty($data1)) {
  //       $body_content = $data1->email_body_content;
  //     } else {
  //       $body_content = '';
  //     }
      
  //     $html = '<html><body>'.$body_content.'</body></html>';
      
  //     $this->db->select('org_company_attachment');
  //     $this->db->where('org_id', $this->session->org_id);
  //     $orgData = $this->db->get('tbl_organisation')->row();
  //     $attachment = base_url() . "assets/admin/company_attachment/" . $orgData->org_company_attachment;

      
  //   //   $email_config = array(
  //   //     'protocol'  => $emailData->protocol,
  //   //     'smtp_host' => $emailData->host_name,
  //   //     'smtp_port' => $emailData->port_number,
  //   //     'smtp_user' => $emailData->email_id,
  //   //     'smtp_pass' => $emailData->email_pass,
  //   //  );
  //     $Mailconfig['protocol'] = "smtp";
  //     $Mailconfig['mailpath'] = "";
  //     $Mailconfig['smtp_host'] = $emailData->host_name;
  //     $Mailconfig['smtp_port'] = $emailData->port_number;
  //     $Mailconfig['smtp_timeout'] = '7';
  //     $Mailconfig['smtp_user'] = $emailData->email_id;
  //     $Mailconfig['smtp_pass'] = $emailData->email_pass;
  //     $Mailconfig['smtp_crypto'] = "tls";
      
    
  //     $this->load->library('email', $Mailconfig);
  //     $this->email->initialize($Mailconfig);
     
  //    $sub = 'Buroforce Team';
  //    $from = $emailData->email_id;
  //    $this->email->from($from, $emailData->from_name);
  //    $this->email->to($data->email);
  //    $this->email->subject($sub);
  //    $this->email->message($html);
  //    if (!empty($orgData)) {
  //      $this->email->attach($attachment);
  //    }
  //    //$this->email->set_mailtype('html');
  //   //  $send = $this->email->send(); 

  //    if($this->email->send())
  //    {
  //      $this->db->where('leadopp_id', $lead_main_id);
  //      $this->db->set('welcome_email_status',1);
  //      $this->db->update('tbl_leads_opportunity'); 
  //      echo 1;
  //    }
  //    else
  //    {
  //      print_r($this->email->print_debugger());
  //      echo 0;
  //    }
     
  //   }
  // }

  public function WelComeEmailSent($lead_main_id)
  {
    error_reporting(0);
    $this->db->select('email,contact_person_name1');
    $this->db->where('leadopp_id', $lead_main_id);
    $data = $this->db->get('tbl_leads_opportunity')->row();

    if (!empty($data)) {
      $name = $data->contact_person_name1;
      $to_email = $data->email;
    }
    
    $this->db->where('emp_id', $this->session->id);
    $emailData = $this->db->get('tbl_org_email_configuration')->row();
    if (empty($emailData)) {
      echo 0;
    } else {
      $this->db->where('email_body_id', 1);
      $data1 = $this->db->get('tbl_email_body')->row();
      if (!empty($data1)) {
        $body_content = $data1->email_body_content;
      } else {
        $body_content = '';
      }
      
      $html = '<html><body>'.$body_content.'</body></html>';
      
      $this->db->select('org_company_attachment');
      $this->db->where('org_id', $this->session->org_id);
      $orgData = $this->db->get('tbl_organisation')->row();
      if($orgData->org_company_attachment != '')
      {
        $attachment = base_url() . "assets/admin/company_attachment/" . $orgData->org_company_attachment;
      }
      else
      {
        $attachment = '';
      }

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
      
      $mail->setFrom($emailData->email_id, 'BuroMatrix');
  
      $mail->addAddress($data->email);
      
      $mail->Subject = 'BuroMatrix Team';
      
      $mail->isHTML(true);
      
      $mail->Body = $html;

      if($orgData->org_company_attachment != '')
      {
        $mail->addAttachment("assets/admin/company_attachment/" . $orgData->org_company_attachment); 
      }
      else
      {

      }
      

      if(!$mail->send())
      {
          // echo 'Mail could not be sent.';
          // echo 'Mailer Error: ' . $mail->ErrorInfo;
          echo 0;
      }
      else
      {
          $this->db->where('leadopp_id', $lead_main_id);
          $this->db->set('welcome_email_status',1);
          $this->db->update('tbl_leads_opportunity'); 
          echo 1;
      }
     
    }
  }
  public function ExportLeadOpp()
  {
    $org_id = $this->session->org_id;
    define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    require_once('assets/PHPExcel/Classes/PHPExcel.php');
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Leads-Opportunities List');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:R2');

    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'CRM Type');
    $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Lead Id');
    $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Contact Person');
    $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Company Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Contact Number');

    $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Email ID ');
    $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Address');
    $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Source');
    $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Stage');
    $objPHPExcel->getActiveSheet()->SetCellValue('J3', 'Account Manager ');

    $objPHPExcel->getActiveSheet()->SetCellValue('K3', 'Tag');
    $objPHPExcel->getActiveSheet()->SetCellValue('L3', 'Business');
    $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Expected Closure Date');
    $objPHPExcel->getActiveSheet()->SetCellValue('N3', 'Expected Revenue');
    $objPHPExcel->getActiveSheet()->SetCellValue('O3', 'Interested In');

    $objPHPExcel->getActiveSheet()->SetCellValue('P3', 'Remark');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'Generated By');
    $objPHPExcel->getActiveSheet()->SetCellValue('R3', 'Branch');


    $objPHPExcel->getActiveSheet()->getStyle("A3:R3")->getFont()->setBold(true);

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(17);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(65);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);



    $styleArray = array(
      'font'  => array(
          'bold'  => true,
          'color' => array('rgb' => '000000'),
          'size'  => 12,
          'name'  => 'Arial'
    ));
    $objPHPExcel->getActiveSheet()->getStyle('A3:R3')->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('A2:R2')->applyFromArray($styleArray);

    $objPHPExcel->getActiveSheet()->getStyle('A3:R3')->applyFromArray(
      array(
        'fill' => array(
          'type' => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array('rgb' => 'c6d9f1')
        )
      )
    );

    $objPHPExcel->getActiveSheet()->getStyle('A2:R2')->applyFromArray(
      array(
        'fill' => array(
          'type' => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array('rgb' => 'c6d9f1'),
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
      )
    );

    $objPHPExcel->getActiveSheet()->getColumnDimension('A2')->setWidth(30);
    $rowCount = 4;
    $this->db->where('org_id', $org_id);
    $data = $this->db->get('tbl_leads_opportunity')->result();
    $finalarray = array();
    $cnt = 1;
    foreach ($data as  $res) {
      $account_manager = $res->assign_to;
      $generated_by = $res->generated_by;
      $acc_name = '';
      $type_name = '';
      $buss_name = '';
      $loc_name = '';

      $Closure_Date = '';
      $marriage_anniversary = '';

      if ($account_manager > 0) {
        $this->db->where('id', $account_manager);
        $emp_data = $this->db->get('tbl_admin_login')->row();
        $acc_name = $emp_data->name;
      }

      if (!empty($res->closure_date) && $res->closure_date != '1970-01-01') {
        $Closure_Date = date("d/m/Y", strtotime($res->closure_date));
      }

      $this->db->where('source_id', $res->source);
      $tbl_source_data = $this->db->get('tbl_source')->row();
      $source_name = $tbl_source_data->source_title;

      $this->db->where('stage_id', $res->stage);
      $tbl_stage_data = $this->db->get('tbl_stage')->row();
      $stage_name = $tbl_stage_data->stage_title;

      $this->db->where('prd_srv_id', $res->product_id);
      $tbl_product_data = $this->db->get('tbl_product_service_list')->row();
      $product_name = $tbl_product_data->prdsrv_name;

      $busArray = explode(',',$res->business_id);
      $result = array_filter($busArray); 
      if (!empty($result)) {
        $buss_string = implode(',',$result);
        $tbl_business_data = $this->db->query('SELECT * FROM `tbl_business` WHERE business_id IN ('.$buss_string.')')->result();
      }
      
      $last_id = count($tbl_business_data) - 1;
      for ($i = 0; $i < count($tbl_business_data); $i++) {
        $buss_name .= $tbl_business_data[$i]->business_name;
        if ($last_id == $i) {
          $buss_name .= " ";
        } else {
          $buss_name .= ",";
        }
      }
      
      if ($account_manager > 0) 
      {
        $this->db->where('id', $generated_by);
        $emp_data_gen = $this->db->get('tbl_admin_login')->row();
        $gen_name = $emp_data_gen->name;
      }
      else
      {
        $gen_name = '';
      }

      $branch_id = $res->branch_id;
      if($branch_id == 0)
      {
        $this->db->where('name', $branch_id);
        $this->db->where('org_id',$this->session->org_id);
        $tbl_branch_res = $this->db->get('tbl_branch')->row();
        $get_branch = $tbl_branch_res[0]->name;
      }
      else
      {
        $get_branch = '';
      }
     

      $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, trim($res->customer_type));
      $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, trim($res->lead_generate_id));

      $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, trim($res->contact_person_name1));
      $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, trim($res->company_name));
      $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, trim($res->phone_no));
      $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, trim($res->email));
      $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, trim($res->address));
      $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $source_name);
      $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $stage_name);
      $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $acc_name);

      $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, trim($res->tag));

      $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $buss_name);
      $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $Closure_Date);
      $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, trim($res->project_business_value));
      $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $product_name);
      $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, trim($res->remarks));
      $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $gen_name);
      $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $get_branch);

      $rowCount++;
      $cnt++;
    }

    $filename = 'LeadOpp.xlsx';
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $filename . "");
    header("Content-Transfer-Encoding: binary ");
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    $objWriter->save('php://output');
    exit;
  }
  public function ImportLeadOpp()
  {
    $org_id = $this->session->org_id;
    $created_by = $this->session->id;
    $created_date = date('Y-m-d H:i:s');
    $date = date('Y-m-d');

    if (isset($_FILES['crm_excel']) && $_FILES['crm_excel']['error'] == 0) 
    {
      define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
      require_once('assets/PHPExcel/Classes/PHPExcel.php');
      $tmpfname = $_FILES['crm_excel']['tmp_name'];
      $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
      $excelObj = $excelReader->load($tmpfname);
      $worksheet = $excelObj->getSheet(0);
      $lastRow = $worksheet->getHighestRow();
      for ($row = 3; $row <= $lastRow; $row++) 
      {
        $contact_person_name1 = $worksheet->getCell('A' . $row)->getValue();
        $company_name = $worksheet->getCell('B' . $row)->getValue();
        $phone_number = $worksheet->getCell('C' . $row)->getValue();
        $email = $worksheet->getCell('D' . $row)->getValue();
        

        $address = $worksheet->getCell('E' . $row)->getValue();
        
        $source_id = $worksheet->getCell('F' . $row)->getValue();
        $stage_id = $worksheet->getCell('G' . $row)->getValue();
        $account_manager_id = $worksheet->getCell('H' . $row)->getValue();        
        $tag = $worksheet->getCell('I' . $row)->getValue();

        $business_id = $worksheet->getCell('J' . $row)->getValue();
        $exp_closure = $worksheet->getCell('K' . $row)->getValue();
        $exp_revenue = $worksheet->getCell('L' . $row)->getValue();
        $interestedin_id= $worksheet->getCell('M' . $row)->getValue();
        $remark = $worksheet->getCell('N' . $row)->getValue();

        $generated_by = $worksheet->getCell('O' . $row)->getValue();
        $branch = $worksheet->getCell('P' . $row)->getValue();
        //Business
        $busArray = explode(',',$business_id);        
        
        $business_id_str = '';
        $last_id = count($busArray) - 1;
        for ($i=0; $i < count($busArray); $i++) { 
          $this->db->like('business_name', trim($busArray[$i]));
          $this->db->where('org_id',$this->session->org_id);
          $business_res = $this->db->get('tbl_business')->row();
          
          $business_id_str .=  $business_res->business_id;
          if ($last_id == $i) {
            $business_id_str .= "";
          } else {
            $business_id_str .= ",";
          }
        }

        //exp_closure_date
        $exp_closure_date ='';
        $group_id = '';
        $location = '';
        if(!empty($exp_closure))
        {
          $date1 = str_replace("/", "-", $exp_closure);
          $re_date = date('Y-m-d', strtotime($date1));
          $exp_closure_date = date("Y-m-d",strtotime($re_date));
        }
        
        //Source Id
        if ($source_id != '') {
          $this->db->like('source_title', $source_id);
          $this->db->where('org_id',$this->session->org_id);
          $source_res = $this->db->get('tbl_source')->result();
          if(count($source_res)>0)
          {
            $source = $source_res[0]->source_id;
          }
        }
        //Stage Id
        if ($stage_id != '') {
          $this->db->like('stage_title', $stage_id);
          $this->db->where('org_id',$this->session->org_id);
          $stage_res = $this->db->get('tbl_stage')->result();
          if(count($stage_res)>0)
          {
            $stage = $stage_res[0]->id;
          }
        }
        //Stage Id
        if ($stage_id != '') {
          $this->db->like('stage_title', $stage_id);
          $this->db->where('org_id',$this->session->org_id);
          $stage_res = $this->db->get('tbl_stage')->result();
          if(count($stage_res)>0)
          {
            $stage = $stage_res[0]->stage_id;
          }
        }
        //Interested In Id
        if ($interestedin_id != '') {
          $this->db->like('prdsrv_name', $interestedin_id);
          $this->db->where('org_id',$this->session->org_id);
          $product_service_res = $this->db->get('tbl_product_service_list')->result();
          if(count($product_service_res)>0)
          {
            $product_service = $product_service_res[0]->prd_srv_id;
          }
        }
        //Admin Login
        $this->db->like('name', $account_manager_id);
        $this->db->where('org_id',$this->session->org_id);
        $tbl_admin_login_res = $this->db->get('tbl_admin_login')->result();
        if(count($tbl_admin_login_res)>0)
        {
          $assign_to=$tbl_admin_login_res[0]->id;
        }
        else
        {
          $assign_to=0;
        }

        $this->db->like('name', $generated_by);
        $this->db->where('org_id',$this->session->org_id);
        $tbl_generated_by_res = $this->db->get('tbl_admin_login')->result();
        if(count($tbl_generated_by_res)>0)
        {
          $get_generated_by=$tbl_generated_by_res[0]->id;
        }
        else
        {
          $get_generated_by=0;
        }

        //branch
        $this->db->like('name', $branch);
        $this->db->where('org_id',$this->session->org_id);
        $tbl_branch_res = $this->db->get('tbl_branch')->result();
        if(count($tbl_branch_res)>0)
        {
          $get_branch = $tbl_branch_res[0]->id;
        }
        else
        {
          $get_branch=0;
        }
        
        $cur_date=date("Ymd"); 
        $Prefix="L-".$cur_date.'-';
        $this->db->select('lead_generate_id');
        $this->db->order_by('leadopp_id','DESC');
        $result = $this->db->get('tbl_leads_opportunity')->row();
        
        if(!empty($result->lead_generate_id))
        {
          
          $pre_date = explode('-', $result->lead_generate_id);        
          $previous_date = $pre_date[1]; 
          $ticket_no = $pre_date[2]; 
          if ($previous_date == $cur_date) 
          {
            $ticket_no++;
            $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
            // $final_ticket_num = $cur_date.'-'.$ticket_no1;
            $lead_generate_id=$Prefix.$ticket_no1;
          }
          else
          {
            $ticket_no++;
            $ticket_no1 = str_pad($ticket_no, 3, '0', STR_PAD_LEFT);
            // $final_ticket_num = $cur_date.'-'.$ticket_no1;
            $lead_generate_id=$Prefix.$ticket_no1;
          }
        }
        else
        {
          $lead_generate_id=$Prefix.'001';
        }
        
        if ($exp_revenue == '') {
          $rxpRvn = 0;
        }else{
          $rxpRvn = $exp_revenue;
        }
        
        $add_array = array(
          'org_id'=>$this->session->org_id,
          'created_by'=> $created_by,
          'lead_generate_id'=> $lead_generate_id,
          'company_name'=> trim($company_name),
          'contact_person_name1'=> trim($contact_person_name1),
          'phone_no'=> trim($phone_number),
          'email'=> trim($email),
          'address'=> trim($address),
          'source'=> trim($source),
          'stage'=> trim($stage),
          'assign_to'=> trim($assign_to),
          'assign_datetime'=> date("Y-m-d H:i:s"),
          'tag'=>trim($tag),
          'product_id'=> trim($product_service),
          'project_business_value'=> $rxpRvn,
          'city'=> '',
          'business_id'=> trim($business_id_strtrim),
          'location'=> trim($location),
          'group_id'=> trim($group_id),
          'closure_date'=> trim($exp_closure_date),
          'remarks'=> trim($remark),
          'customer_type'=> 'Lead',
          'is_converted'=> 0,
          'generated_by' => trim($get_generated_by),
          'branch_id' =>trim($get_branch),
          'created_date'=> trim($created_date)
        );
        
        $this->db->insert('tbl_leads_opportunity',$add_array);
        $leadopp_id=$this->db->insert_id();

        $check_code2 = $this->db->query("SELECT auto_contact_code FROM tbl_customer ORDER BY customer_id DESC LIMIT 1")->row();
       
        if($check_code2->auto_contact_code != '')
        {
            $code2 = $check_code2->auto_contact_code; 
            $contact_code2 = (int)$code2 + 1;
        }
        else
        {
            $contact_code2 = '1000000';
        }

        $InsertCustomerArray=array(
          'org_id'=>$this->session->org_id,
          'created_by'=> trim($created_by),
          'parent_id'=>0,
          'type_id'=>0,
          'business_id'=>0,
          'location_id'=>0,
          'group_id'=>0,
          'company_name'=> trim($company_name),
          'contact_person_name1'=> trim($contact_person_name1),
          'alternate_email'=>'',
          'phone_no'=> trim($phone_number),
          'alternate_number'=>'',
          'landline_number'=>'',
          'email'=> trim($email),
          'address'=> trim($address),
          'auto_contact_code' => $contact_code2,
          'city'=>'',
          'state'=>0,
          'country'=>101,
          'password'=>'buro@123',
          'dob'=>'1970-01-01',
          'company_anniversary'=>'',
          'marriage_anniversary '=>'',
          'android_id '=>'',
          'imei'=>'',
          'cust_type'=>'primary',
          'leadopp_id'=>trim($leadopp_id),
          'type'=>'T',                            
          'delete_status'=>1,
          'created_date'=>trim($created_date) 
        );
        $this->db->insert("tbl_customer",$InsertCustomerArray); 
        $company_id=$this->db->insert_id();

        $this->db->SET('company_id',$company_id);
        $this->db->where('leadopp_id',$leadopp_id);
        $this->db->update('tbl_leads_opportunity');

        $history_add_array = array(
          'org_id'=>$this->session->org_id,
          'leadopp_id'=> $leadopp_id,
          'created_by'=> $created_by,
          'company_name'=> trim($company_name),
          'contact_person_name1'=> trim($contact_person_name1),
          'phone_no'=> trim($phone_number),
          'email'=> trim($email),
          'address'=> trim($address),
          'source'=> trim($source),
          'stage'=> trim($stage),
          'assign_to'=> trim($assign_to),
          'assign_datetime'=> date("Y-m-d H:i:s"),
          'tag'=>trim($tag),
          'product_id'=> trim($product_service),
          'project_business_value'=> $rxpRvn,
          'city'=> '',
          'business_id'=> trim($business_id_str),
          'location'=> trim($location),
          'group_id'=> trim($group_id),
          'closure_date'=> trim($exp_closure_date),
          'remarks'=> trim($remark),
          'customer_type'=> 'Lead',
          'is_converted'=> 0,
          'created_date'=> trim($created_date)
        );
        $this->db->insert("tbl_lead_history",$history_add_array); 
      }
      
    }
  }
  function getRecurringDateString($frequency, $start_date, $end_date = null) {
		$dt = new DateTime(str_replace("-", "/", $start_date));
		$dtUntil = new DateTime(str_replace("-", "/", $end_date ? $end_date : date("m-d-Y")));
		
		$modifiers = [
			"day" => "+1 day",
			"week" => "+1 week",
			"fortnightly" => "+2 weeks",
			"monthly" => "+1 month",
			"quaterly" => "+3 month",
			"half-quarterly" => "+6 month",
			"year" => "+12 month",
		];
		$modifier = $modifiers[$frequency];
		$dt->modify($modifier);
		$dates[] = date('Y-m-d',strtotime($start_date));
		while($dt <= $dtUntil) {
			$dates[] = $dt->format("Y-m-d");
			$dt->modify($modifier);
		}
        return $dates;
		// return implode(',',$dates);
	}

  public function Recent_Task_view_page($leadopp_id)
  {
      $this->db->where('tbl_schedule.ticket_no ',$leadopp_id);
      $this->db->select('
                          tbl_admin_login.name as empname,tbl_schedule.*, tbl_user_query.product_name,tbl_user_query.query_id,tbl_user_query.issue,tbl_user_query.status,tbl_schedule_type_name.type_name
                        ')
               ->from('tbl_schedule')               
               ->join('tbl_user_query', 'tbl_schedule.issue_id = tbl_user_query.query_id ')
               ->join('tbl_admin_login', 'tbl_schedule.schedule_assign_to = tbl_admin_login.id ')          
               ->join('tbl_schedule_type_name', 'tbl_schedule.schedule_type_id = tbl_schedule_type_name.id ');
      $res=$this->db->get()->result();

      $final_array=array();
      foreach ($res as $row)
       {
             $this->db->order_by('created_date ','desc'); 
             $this->db->where('schedule_id ',$row->schedule_id);
             $task_status=$this->db->get('tbl_task_status')->row(); 

             $NewArray=array(
                               'query_id'=>$row->query_id, 
                               'schedule_id'=>$row->schedule_id, 
                               'type_name'=>$row->type_name,
                               'empname'=>$row->empname,
                               'created_date'=>$row->created_date,
                               'assign_date'=>$row->assign_date,
                               'assign_starttime'=>$row->assign_starttime,
                               'assign_endtime'=>$row->assign_endtime,
                               'assign_endtime'=>$row->assign_endtime,
                               'issue'=>$row->issue,
                               'taskstatus'=>$task_status->status,
                               'statusdatetime'=>$task_status->created_date,
                               'ticket_no'=>$row->ticket_no,
                               'leadopp_id' => $leadopp_id
                           );

            array_push($final_array, $NewArray);
       }

       return $final_array;
  }

  public function show_history_details($history_id)
  {
      $this->db->where('tbl_lead_history.history_id ',$history_id);
      $this->db->select('tbl_lead_history.*,tbl_admin_login.name as empname ')   
               ->from('tbl_lead_history')
               ->join('tbl_admin_login', 'tbl_lead_history.assign_to = tbl_admin_login.id'
             );
      return $this->db->get()->result();     
  }
  public function AddNote($data)
  {
    $data1=array(
                  'notes'=>$data['note'],
                  'leadopp_id'=>$data['note_lead_id'],
                  'org_id'=>$this->session->org_id,
                  'status'=>0
                );
    
    $this->db->insert('tbl_leads_opportunity_note',$data1);
  }

  public function notes_list($leadopp_id)
  {
    $this->db->where('status ',0);
    $this->db->order_by('note_id ','DESC');
    $this->db->where('leadopp_id ',$leadopp_id);
    return $this->db->get('tbl_leads_opportunity_note')->result();
  }
  public function get_note_details($note_id)
  {
    $this->db->where('note_id',$note_id);
    return $this->db->get('tbl_leads_opportunity_note')->row();
  }

  public function Edit_note($data)
  {
    $this->db->set('notes',$data['edit_note']);
    $this->db->where('note_id',$data['edit_note_lead_id']);
    $data = $this->db->update('tbl_leads_opportunity_note');
    $data1 = $this->db->affected_rows($data) > 0;
    if($data1)
    {
        echo "1";
    }
    else
    {
        echo "2";
    }
  }
  public function delete_note($note_id)
  {
    $this->db->set('status',1);
    $this->db->where('note_id',$note_id);
    $data = $this->db->update('tbl_leads_opportunity_note');
    $data1 = $this->db->affected_rows($data) > 0;
    if($data1)
    {
        echo "1";
    }
    else
    {
        echo "2";
    }
  }
}

?>


