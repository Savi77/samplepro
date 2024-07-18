
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_model extends CI_Model 
{

	public function __construct() 
  {
    parent::__construct();
    $this->load->helper("file");
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

  
  public function lead_data($leadopp_id)
    {
      $this->db->where('tbl_leads_opportunity.leadopp_id ',$leadopp_id);
      $this->db->select('tbl_leads_opportunity.*, tbl_product_service_list.prdsrv_name ,
                              tbl_admin_login.name as empname
                        ')
               ->from('tbl_leads_opportunity')
               ->join('tbl_product_service_list', 'tbl_leads_opportunity.product_id = tbl_product_service_list.prd_srv_id ')
               ->join('tbl_admin_login', 'tbl_leads_opportunity.assign_to = tbl_admin_login.id'
             );

          $res=$this->db->get()->row();  
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
         
         $this->db->where('source_id ',$res->source);
         $sourceres=$this->db->get('tbl_source')->row();  
         $this->db->where('stage_id ',$res->stage);
         $stageres=$this->db->get('tbl_stage')->row();  

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
                            'prdsrv_name'=>$res->prdsrv_name,
                            'empname'=>$res->empname,
                            'type'=>$res->customer_type,
                            'source'=>$sourceres->source_title,
                            'stage'=>$stageres->stage_title,
                            'document'=>$res->document,
                            'business_name'=>$businessname
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
      for($i=0;$i<count($terms);$i++)
      {
         $final_terms=$final_terms.'$^'.$terms[$i];
      }

      $validity= $data['validity'];
      $valid_till=date('Y-m-d', strtotime($Date. " + $validity days"));
      $quotation_date2 = str_replace(',', ' ', $data['quotation_date']);
      $quotation_date = date("Y-m-d", strtotime($quotation_date2));
      $AddQuotationArray = array
                                (
                                  'leadopp_id'=> $data['db_quotation_lead_id'],
                                  'created_by'=> $this->session->id,
                                  'org_id'=> $this->session->org_id,
                                  'quotation_number'=>$data['quotation_number'],
                                  'quotation_date'=>$quotation_date,
                                  'contact_person'=>$data['contact_person'],
                                  'contact_number'=>$data['contact_number'],

                                  'terms_conditions'=>$final_terms, 
                                  'termsfor'=>$data['termsfor'],
                                  
                                  'email'=>$data['email'],
                                  'validity'=>$validity,
                                  'valid_till'=>$valid_till,
                                  'quotation_status'=>$data['quotation_status'],
                                  'created_date'=> date("Y-m-d H:i:s")
                                );
       $this->db->insert("tbl_lead_quotation",$AddQuotationArray);
       $quotation_id=$this->db->insert_id();

       $ProductidArray = $data['productid'];
       $ProductcodeArray = $data['productcode'];
       $PriceArray = $data['price'];
       $QuantityArray = $data['quantity'];
       $CgstArray = $data['cgst'];
       $SgstArray = $data['sgst'];
       $TotalArray = $data['total'];

       $cgstvalueArray = $data['cgstvalue'];
       $sgstvalueArray = $data['sgstvalue'];
       $subtotalArray = $data['subtotal'];

       for($i=0;$i<count($ProductidArray);$i++)
       {
          $QuotationDetailArray = array
                                    (
                                      'quotation_id'=> $quotation_id,
                                      'org_id'=> $this->session->org_id,
                                      'leadopp_id'=> $data['db_quotation_lead_id'],
                                      'product_id'=>$ProductidArray[$i],
                                      'product_code'=>$ProductcodeArray[$i],
                                      'quantity'=>$QuantityArray[$i],
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
                                  'terms_conditions'=>$final_terms, 
                                  'termsfor'=>$data['termsfor'],                                  
                                  'email'=>$data['email'],
                                  'validity'=>$validity,
                                  'valid_till'=>$valid_till,
                                  'quotation_status'=>$data['quotation_status']
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

       $cgstvalueArray = $data['cgstvalue'];
       $sgstvalueArray = $data['sgstvalue'];
       $subtotalArray = $data['subtotal'];


       print_r($$ProductidArray);

       for($i=0;$i<count($ProductidArray);$i++)
       {
          $QuotationDetailArray = array
                                    (
                                      'quotation_id'=> $quotation_id,
                                      'org_id'=> $this->session->org_id,
                                      'leadopp_id'=> $data['leadopp_id'],
                                      'product_id'=>$ProductidArray[$i],
                                      'product_code'=>$ProductcodeArray[$i],
                                      'quantity'=>$QuantityArray[$i],
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
        $terms_conditions=$result->terms_conditions;
        $termsarray=explode("$^", $terms_conditions);

        $this->db->where('quotation_id ',$quotation_id);
        $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
                 ->from('tbl_quotation_details')
                 ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
        $quotation_result = $this->db->get()->result();


        include("assets/mpdf/mpdf.php");
        $imgpath=base_url().'assets/images/Logo/logo_one.png';
        $imgpath2=base_url().'assets/images/Logo/logo_two.png';
        $imgpath3=base_url().'assets/images/Logo/logo_three.png';
        $html = '
          <html>
          <head>
          <style>
          body {font-family: sans-serif;
            font-size: 10pt;
          }
          p { margin: 0pt; }
          table.items {
            border: 0.1mm solid #000000;
          }
          td { vertical-align: top; }
          .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
          }
          table thead td { background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
          }
          .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
          }
          .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
          }
          .items td.cost {
            text-align: "." center;
          }
          </style>
          </head>
          <body>

          <!--mpdf
          <htmlpageheader name="myheader">
          <table width="100%">
              <tr>             
                <td width="40%" align="left">
                    <img style="vertical-align: top" src="'.$imgpath.'" width="60" /><br/>
                     <img style="vertical-align: middle" src="'.$imgpath2.'" width="100" />
                </td>
              
               <td width="60%" align="right" style="color:#00629B; "><span style="font-weight: bold; font-size: 14pt;">Universal Construction Ltd</span><br />Universal House Naka,<br /> Warje Malwadi Rd,<br />Warje, Pune,  Maharashtra - 411038</td>
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
                      <h4 style="margin-top:0px;letter-spacing: 1px;font-size:20px;text-align:center;">QUOTATION</h4> 
               </td>
                <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>

             </tr>
           </table>

          <table width="100%" style="font-family: serif;" cellpadding="10"><tr>
          <td width="45%" style="border: 0mm solid #888888; "><span style="font-size: 10pt; color: #555555; font-family: sans;">Customer Name :</span><br />
          <b>'.$company_name.'<b> , <br />
          '.$company_address.'<br />
          </td>
          <td width="20%">&nbsp;</td>
          <td>
                <table class="bpmTopic" style="font-size:12px;"><thead></thead><tbody>
                    <tr><td>Quotation No. :</td><td><b>'.$result->quotation_number.'</b></td></tr>
                    <tr><td>Quotation Date </td><td><b>'.date("d F, Y",strtotime($result->quotation_date)).'</b></td></tr>
                    <tr><td>Due Date :</td><td><b>'.date("d F, Y",strtotime($result->valid_till)).'</b></td></tr>
                    <tr><td>Kind Attention :</td><td><b>'.$result->contact_person.'</b></td></tr>
                </tbody>
                </table>
          </td>
          </tr>
          </table>

        <br />

        <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
           <thead style="background-color:#00629B;">
              <tr>
                  <td width="5%">#</td>                
                  <td width="10%">Product Code</td>
                  <td width="40%">Product & Description </td>
                  <td width="10%">Qty</td>
                  <td width="10%">Rate</td>
                  <td width="10%">CGST</td>
                  <td width="10%">SGST</td>
                  <td width="10%">Amount</td>
              </tr>
           </thead>
        <tbody>';
        $cnt=1;
        $cgstvalue=0;
        $sgstvalue=0;
        $subtotal=0;
        foreach ($quotation_result as  $row) 
        {
          $cgstvalue=$cgstvalue+$row->cgstvalue;
          $sgstvalue=$sgstvalue+$row->sgstvalue;
          $subtotal=$subtotal+$row->subtotal;
          $html.= '
                <tr>
                <td align="center">'.$cnt.'</td>
                <td align="center">'.$row->product_code.'</td>
                 <td align="center">'.$row->prdsrv_name.'</td>
                <td align="center">'.$row->quantity.'</td>
                <td align="center">'.$row->price.'</td>
                <td class="cost">'.$row->cgst.'%</td>
                <td class="cost">'.$row->sgst.'%</td>
                <td class="cost">'.$row->subtotal.'</td>
                </tr>';
        $cnt++;}
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
               <tr>
                <td class="blanktotal" colspan="6" rowspan="4"></td>
                <td class="totals">Subtotal:</td>
                <td class="totals cost"  align="center">'.$subtotal.'</td>
                </tr>
                <tr>
                <td class="totals">CGST:</td>
                <td class="totals cost"  align="center">'.$cgstvalue.'</td>
                </tr>
                <tr>
                <td class="totals">SGST:</td>
                <td class="totals cost"  align="center">'.$sgstvalue.'</td>
                </tr>
                <tr>
                <td class="totals"><b>TOTAL:</b></td>
                <td class="totals cost"  align="center">'.$final_total.'</td>
                </tr>
               <tr>
                <td class="blanktotal" colspan="2" rowspan="1"></td>
                <td class="totals">Total In Words: </td>
                <td class="totals cost"  colspan="5"   align="center">'.$in_result.'</td>
              </tr>
          </tbody>
          </table>';

        $html .='<br/><h5>Terms and Conditions :</h5>
                <ol class="lista">';
                for($k=0;$k<count($termsarray);$k++)
                {
                   $html .='<li>'.$termsarray[$k].'</li>';
                }
        $html .='</ol></body>
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
        $mpdf->SetTitle("Universal Construction Machinery and Equipment Limited : Quotation");
        $mpdf->SetAuthor("Universal Construction Limited");
        $mpdf->SetWatermarkText("Universal");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $stylesheet = file_get_contents('assets/mpdf/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html);
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
        $result=$this->db->get('tbl_lead_quotation')->row();

        $leadopp_id=$result->leadopp_id;
        $this->db->where('leadopp_id',$leadopp_id);
        $lead=$this->db->get('tbl_leads_opportunity')->row();

        return array(
               'company_name'=>$lead->company_name,
               'company_address'=>$lead->address,
               'terms_conditions'=>$result->terms_conditions,
               'quotation_number'=>$result->quotation_number,
               'quotation_date'=>date("d F, Y",strtotime($result->quotation_date)),
               'valid_till'=>date("d F, Y",strtotime($result->valid_till)),
               'contact_person'=>$result->contact_person,
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
        $terms_conditions=$result->terms_conditions;
        $termsarray=explode("$^", $terms_conditions);

        $this->db->where('org_id',$this->session->org_id);
        $organisation=$this->db->get('tbl_organisation')->row();

        $this->db->where('quotation_id ',$quotation_id);
        $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
                 ->from('tbl_quotation_details')
                 ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
        $quotation_result = $this->db->get()->result();


        include("assets/mpdf/mpdf.php");
        $imgpath=base_url().'assets/images/Logo/logo_one.png';
        $imgpath2=base_url().'assets/images/Logo/logo_two.png';
        $imgpath3=base_url().'assets/images/Logo/logo_three.png';
        $html = '
          <html>
          <head>
          <style>
          body {font-family: sans-serif;
            font-size: 10pt;
          }
          p { margin: 0pt; }
          table.items {
            border: 0.1mm solid #000000;
          }
          td { vertical-align: top; }
          .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
          }
          table thead td { background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
          }
          .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
          }
          .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
          }
          .items td.cost {
            text-align: "." center;
          }
          </style>
          </head>
          <body>

          <!--mpdf
          <htmlpageheader name="myheader">
          <table width="100%">
              <tr>             
                <td width="40%" align="left">
                    <img style="vertical-align: top" src="'.$imgpath.'" width="60" /><br/>
                     <img style="vertical-align: middle" src="'.$imgpath2.'" width="100" />
                </td>              
               <td width="60%" align="right" style="color:#00629B; "><span style="font-weight: bold; font-size: 14pt;">'.$organisation->org_cname.'</span><br/>'.$organisation->org_address.'</td>
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
                      <h4 style="margin-top:0px;letter-spacing: 1px;font-size:20px;text-align:center;">QUOTATION</h4> 
               </td>
                <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>

             </tr>
           </table>

          <table width="100%" style="font-family: serif;" cellpadding="10"><tr>
          <td width="45%" style="border: 0mm solid #888888; "><span style="font-size: 10pt; color: #555555; font-family: sans;">Customer Name :</span><br />
          <b>'.$company_name.'<b> , <br />
          '.$company_address.'<br />
          </td>
          <td width="20%">&nbsp;</td>
          <td>
                <table class="bpmTopic" style="font-size:12px;"><thead></thead><tbody>
                    <tr><td>Quotation No. :</td><td><b>'.$result->quotation_number.'</b></td></tr>
                    <tr><td>Quotation Date :</td><td><b>'.date("d F, Y",strtotime($result->quotation_date)).'</b></td></tr>
                    <tr><td>Due Date :</td><td><b>'.date("d F, Y",strtotime($result->valid_till)).'</b></td></tr>
                    <tr><td>Kind Attention :</td><td><b>'.$result->contact_person.'</b></td></tr>
                </tbody>
                </table>
          </td>

          </tr>
          </table>

        <br />

        <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
           <thead style="background-color:#00629B;">
              <tr>
                  <td width="5%">#</td>                
                  <td width="10%">Product Code</td>
                  <td width="40%">Product & Description </td>
                  <td width="10%">Qty</td>
                  <td width="10%">Rate</td>
                  <td width="10%">CGST</td>
                  <td width="10%">SGST</td>
                  <td width="10%">Amount</td>
              </tr>
           </thead>
        <tbody>';
        $cnt=1;
        $cgstvalue=0;
        $sgstvalue=0;
        $subtotal=0;
        foreach ($quotation_result as  $row) 
        {
          $cgstvalue=$cgstvalue+$row->cgstvalue;
          $sgstvalue=$sgstvalue+$row->sgstvalue;
          $subtotal=$subtotal+$row->subtotal;
          $html.= '
                <tr>
                <td align="center">'.$cnt.'</td>
                <td align="center">'.$row->product_code.'</td>
                 <td align="center">'.$row->prdsrv_name.'</td>
                <td align="center">'.$row->quantity.'</td>
                <td align="center">'.$row->price.'</td>
                <td class="cost">'.$row->cgst.'%</td>
                <td class="cost">'.$row->sgst.'%</td>
                <td class="cost">'.$row->subtotal.'</td>
                </tr>';
        $cnt++;}
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
               <tr>
                <td class="blanktotal" colspan="6" rowspan="4"></td>
                <td class="totals">Subtotal:</td>
                <td class="totals cost"  align="center">'.$subtotal.'</td>
                </tr>
                <tr>
                <td class="totals">CGST:</td>
                <td class="totals cost"  align="center">'.$cgstvalue.'</td>
                </tr>
                <tr>
                <td class="totals">SGST:</td>
                <td class="totals cost"  align="center">'.$sgstvalue.'</td>
                </tr>
                <tr>
                <td class="totals"><b>TOTAL:</b></td>
                <td class="totals cost"  align="center">'.$final_total.'</td>
                </tr>
               <tr>
                <td class="blanktotal" colspan="2" rowspan="1"></td>
                <td class="totals">Total In Words: </td>
                <td class="totals cost"  colspan="5"   align="center">'.$in_result.'</td>
              </tr>
          </tbody>
          </table>';

        $html .='<br/><h5>Terms and Conditions :</h5>
                <ol class="lista">';
                for($k=0;$k<count($termsarray);$k++)
                {
                   $html .='<li>'.$termsarray[$k].'</li>';
                 }
        $html .='</ol></body>
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
        $mpdf->SetWatermarkText($organisation->org_cname);
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $stylesheet = file_get_contents('assets/mpdf/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html);
        // $mpdf->Output();
        $mpdf->Output("assets/admin/quotationdocuments/$quotation_id.pdf", 'F');
        $mpdf->Output("Universal Construction_$quotation_id.pdf", 'D');
    }

   public function quotation_mail($quotation_id)
    {
        $this->db->where('quotation_id ',$quotation_id);
        $result=$this->db->get('tbl_lead_quotation')->row();
        echo $result->email;
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
        error_reporting(0);
        $quotation_id=$formdata['quotation_id'];
        $to_mail=$formdata['to_mail'];
        $cc_mail=$formdata['cc_mail'];

        $this->db->where('quotation_id ',$quotation_id);
        $result=$this->db->get('tbl_lead_quotation')->row();

        $leadopp_id=$result->leadopp_id;
        $this->db->where('leadopp_id',$leadopp_id);
        $lead=$this->db->get('tbl_leads_opportunity')->row();
        $company_name=$lead->company_name;
        $company_address=$lead->address;
        $terms_conditions=$result->terms_conditions;
        $termsarray=explode("$^", $terms_conditions);

        $this->db->where('quotation_id ',$quotation_id);
        $this->db->select('tbl_quotation_details.*, tbl_product_service_list.prdsrv_name')
                 ->from('tbl_quotation_details')
                 ->join('tbl_product_service_list', 'tbl_quotation_details.product_id = tbl_product_service_list.prd_srv_id');
        $quotation_result = $this->db->get()->result();
        $imgpath=base_url().'assets/images/Logo/logo_one.png';
        $imgpath2=base_url().'assets/images/Logo/logo_two.png';
        $imgpath3=base_url().'assets/images/Logo/logo_three.png';

        $html = '        <tr>
                              <td><b>Dear Sir,</b></td>
                          </tr>
                           <tr>
                              <td ><br/></td>
                           </tr>
                           <tr>
                              <td ><br/></td>
                           </tr>

                          <tr>
                              <td>Following Quotation Detail are :</td>
                           </tr>
                            <tr>
                              <td ><br/></td>
                           </tr>
                          <tr>
                              <td ><br/></td>
                           </tr>
                           ';
        $html.= '
                <html>
                <head>
                <style>
                body {font-family: sans-serif;
                  font-size: 10pt;
                }
                p { margin: 0pt; }
                table.items {
                  border: 0.1mm solid #000000;
                }
                td { vertical-align: top; }
                .items td {
                  border-left: 0.1mm solid #000000;
                  border-right: 0.1mm solid #000000;
                }
                table thead td { background-color: #EEEEEE;
                  text-align: center;
                  border: 0.1mm solid #000000;
                  font-variant: small-caps;
                }
                .items td.blanktotal {
                  background-color: #EEEEEE;
                  border: 0.1mm solid #000000;
                  background-color: #FFFFFF;
                  border: 0mm none #000000;
                  border-top: 0.1mm solid #000000;
                  border-right: 0.1mm solid #000000;
                }
                .items td.totals {
                  text-align: right;
                  border: 0.1mm solid #000000;
                }
                .items td.cost {
                  text-align: "." center;
                }
                </style>
                </head>
                <body>
                <!--mpdf
                <htmlpageheader name="myheader">
                <table width="100%">
                    <tr>             
                      <td width="40%" align="left">
                          <img style="vertical-align: top" src="'.$imgpath.'" width="60" /><br/>
                           <img style="vertical-align: middle" src="'.$imgpath2.'" width="100" />
                      </td>             
                     <td width="60%" align="right" style="color:#00629B; "><span style="font-weight: bold; font-size: 14pt;">Universal Construction Ltd</span><br />Universal House Naka,<br /> Warje Malwadi Rd,<br />Warje, Pune,  Maharashtra - 411038</td>
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
                         <h4 style="margin-top:0px;letter-spacing: 1px;font-size:20px;text-align:center;">QUOTATION</h4> 
                     </td>
                      <td width="45%">  <hr  style="border-top: 1px solid #999;width:100%;" /></td>
                   </tr>
                 </table>

                <table width="100%" style="font-family: serif;" cellpadding="10"><tr>
                <td width="45%" style="border: 0mm solid #888888; "><span style="font-size: 10pt; color: #555555; font-family: sans;">Customer Name :</span><br />
                <b>'.$company_name.'<b> , <br />
                '.$company_address.'<br />
                </td>
                <td width="20%">&nbsp;</td>

                <td>
                      <table class="bpmTopic" style="font-size:12px;"><thead></thead><tbody>
                          <tr><td>Quotation No. :</td><td><b>'.$result->quotation_number.'</b></td></tr>
                          <tr><td>Quotation Date </td><td><b>'.date("d F, Y",strtotime($result->quotation_date)).'</b></td></tr>
                          <tr><td>Due Date :</td><td><b>'.date("d F, Y",strtotime($result->valid_till)).'</b></td></tr>
                          <tr><td>Kind Attention :</td><td><b>'.$result->contact_person.'</b></td></tr>
                      </tbody>
                      </table>
                </td>
                 </tr>
               </table>
              <br />
              <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
                 <thead style="background-color:#00629B;">
                    <tr>
                        <td width="5%">#</td>                
                        <td width="10%">Product Code</td>
                        <td width="40%">Product & Description </td>
                        <td width="10%">Qty</td>
                        <td width="10%">Rate</td>
                        <td width="10%">CGST</td>
                        <td width="10%">SGST</td>
                        <td width="10%">Amount</td>
                    </tr>
                 </thead>
              <tbody>';

        $cnt=1;
        $cgstvalue=0;
        $sgstvalue=0;
        $subtotal=0;
        foreach ($quotation_result as  $row) 
        {
          $cgstvalue=$cgstvalue+$row->cgstvalue;
          $sgstvalue=$sgstvalue+$row->sgstvalue;
          $subtotal=$subtotal+$row->subtotal;
          $html.= '
                <tr>
                <td align="center">'.$cnt.'</td>
                <td align="center">'.$row->product_code.'</td>
                 <td align="center">'.$row->prdsrv_name.'</td>
                <td align="center">'.$row->quantity.'</td>
                <td align="center">'.$row->price.'</td>
                <td class="cost">'.$row->cgst.'%</td>
                <td class="cost">'.$row->sgst.'%</td>
                <td class="cost">'.$row->subtotal.'</td>
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
                   <tr>
                    <td class="blanktotal" colspan="6" rowspan="4"></td>
                    <td class="totals">Subtotal:</td>
                    <td class="totals cost"  align="center">'.$subtotal.'</td>
                    </tr>
                    <tr>
                    <td class="totals">CGST:</td>
                    <td class="totals cost"  align="center">'.$cgstvalue.'</td>
                    </tr>
                    <tr>
                    <td class="totals">SGST:</td>
                    <td class="totals cost"  align="center">'.$sgstvalue.'</td>
                    </tr>
                    <tr>
                    <td class="totals"><b>TOTAL:</b></td>
                    <td class="totals cost"  align="center">'.$final_total.'</td>
                    </tr>
                   <tr>
                    <td class="blanktotal" colspan="2" rowspan="1"></td>
                    <td class="totals">Total In Words: </td>
                    <td class="totals cost"  colspan="5"   align="center">'.$in_result.'</td>
                  </tr>

                </tbody>

               </table>';

                $html .='<br/><h3>Terms and Conditions :</h3>
                        <ol class="lista">';
                        for($k=1;$k<count($termsarray);$k++)
                        {
                           $html .='<li>'.$termsarray[$k].'</li>';
                         }
                $html .='</ol>
                      <table>
                      <tr >
                          <td  colspan="8"><br/></td>
                      </tr>
                      <tr >
                          <td  colspan="8"><br/></td>
                      </tr>
                      <tr>
                        <td  colspan="8"><strong><em>Warm Regards</em></strong></td>
                      </tr>
                      <tr>
                        <td  colspan="8"><strong>Universal Construction Team</strong></td>
                      </tr>
                     </table>
                    </tbody>
               </html>';

            $attachment = base_url()."assets/admin/quotationdocuments/$quotation_id.pdf";
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
            $sub='Universal Construction - Quotation';
            $from='support@buroforce.com';
            $to=$email_id;
            $this->load->library('email', $email_config);
            $this->email->from($from, 'Universal Construction');
            $this->email->to($to_mail);
            $this->email->cc($cc_mail); 
            $this->email->subject($sub);
            $this->email->message($html);
            $this->email->attach($attachment);
            $this->email->set_mailtype('html');
            $this->email->send(); 

     }



   public function delete_document($document_id)
    {
        $this->db->where('document_id ',$document_id);
        $res=$this->db->get('tbl_lead_documents')->row();
        $filename = 'assets/admin/leaddocuments/'.$res->name;
        chmod($filename, 0777);
        if (unlink($filename)) 
        {
            // echo 'File deleted';
           $this->db->where('document_id ',$document_id);
           $this->db->Delete('tbl_lead_documents');
         } 
         else 
         {
            // echo 'Cannot remove that file';
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
        $this->db->order_by("source_title", "DESC");
        return $this->db->get();
    }

   public function employee_list()
    {
        $session_id = $this->session->id;
        $user_type = $this->session->user_type;
        $this->db->select('id,name');  
        $this->db->where_not_in('id',$session_id);
        $this->db->where('user_status',1);
        $this->db->where('user_type ','E');
        $this->db->where('org_id',$this->session->org_id);        
        return $this->db->get('tbl_admin_login')->result();
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
        $this->db->order_by("stage_title", "DESC");
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

                      $data = $this->db->query("INSERT INTO `tbl_user_query`(`org_id`,`customer_id`, `product_id`, `ticket_no`, `product_name`, `issue`, `assign_to`,`priority`) VALUES ('$org_id','$customer_id','$product_id','$final_ticket_num','$product_name','$query','$employee_id','Normal')"); 
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
        $this->db->order_by("created_date", "DESC");
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
            'project_business_value'=> $leadopp_array['project_business_value'],
            'city'=> '',
            'business_id'=> $business_segment_id,
            'location'=> $location,
            'group_id'=> $group_id,
            'closure_date'=> $closure_date1,
            'remarks'=> $leadopp_array['remarks'],
            'customer_type'=> $leadopp_type,
            'is_converted'=> 0,
            'created_date'=> $created_date
        );
        $this->db->insert('tbl_leads_opportunity',$add_array);

        $leadopp_id=$this->db->insert_id();
        $InsertCustomerArray=array(
                                    'org_id'=>$this->session->org_id,
                                    'created_by'=>$employee_id,
                                    'parent_id'=>0,
                                    'type_id'=>0,
                                    'business_id'=>0,
                                    'location_id'=>0,
                                    'group_id'=>0,
                                    'company_name'=>$company_name,
                                    'contact_person_name1'=>$leadopp_array['contact_person'],
                                    'alternate_email'=>'',
                                    'phone_no'=>$leadopp_array['contact_number1'],
                                    'alternate_number'=>'',
                                    'landline_number'=>'',
                                    'email'=>$leadopp_array['email_id'],
                                    'address'=>$leadopp_array['address'],
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
                                    'leadopp_id'=>$leadopp_id,
                                    'type'=>'T',                            
                                    'delete_status'=>1,
                                    'created_date'=>$created_date 
                                  );
        $this->db->insert("tbl_customer",$InsertCustomerArray); 
        $company_id=$this->db->insert_id();

        $this->db->SET('company_id',$company_id);
        $this->db->where('leadopp_id',$leadopp_id);
        $this->db->update('tbl_leads_opportunity');
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
         echo "1";

    }


    public function InsertOpportunity($leadopp_array)
    { 
      
       $cur_date=date("Ymd"); 
       $Prefix="O-".$cur_date.'-';
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
        $this->db->insert('tbl_leads_opportunity',$add_array);
        $leadopp_id=$this->db->insert_id();

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
          'closure_date'=> $closure_date1
      );
      // print_r($add_array);
      $this->db->where('leadopp_id',$leadopp_id);
      $this->db->Update('tbl_leads_opportunity',$update_array);  
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

}

?>


