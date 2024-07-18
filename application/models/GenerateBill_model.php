
<?php

error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateBill_model extends CI_Model
 {

  //--------------------------------------------------------------------- 	
   public function __construct() 
	{
	  parent::__construct();
	}
  //---------------------------------------------------------------------

	public function GetBillingPartyList()
	{
      $this->db->order_by("PartyName", "asc");
      $this->db->where("Status",1);
      $this->db->where("LRCompany",$this->session->LRCompany);
      return $this->db->get("tbl_billing_party")->result();
  }

	public function GetLRList()
	{
		$this->db->select("LRNo");
    return $this->db->get("tbl_lr_sequence12")->result();
  }

  public function SetInvoiceNO($ProjectName)
   {
      $this->db->select("company_code");
      $this->db->where("company_id",$this->session->LRCompany);
      $res=$this->db->get("tbl_company")->row();
      $company_code=$res->company_code;

      $this->db->select("CustomerName");
      $this->db->where("CustID",$ProjectName);
      $res=$this->db->get("tbl_customer")->row();
      $CustomerName=$res->CustomerName;
      $project=substr($CustomerName, 0,3);
      $month=date('m');
      $Year=date('y');
      $Year_add=$Year+1;

      $this->db->select("InvoiceNo");
      $this->db->order_by('InvoiceID', 'DESC');
      $this->db->limit('10');
      $this->db->where("LRCompany",$this->session->LRCompany);
      $lrinvoice=$this->db->get("tbl_lrinvoice")->row();
      $InvoiceNo=$lrinvoice->InvoiceNo;
      // $InvoiceNo='ATONK1119211';


      if(empty($InvoiceNo))
      {
        $id=01;
        echo $code=$company_code.$project.$month.$Year.$Year_add.$id;
      }
      else
      {
        $db_month=substr($InvoiceNo, 5,2);
        if($db_month==$month)
        {
            $last_digit=substr($InvoiceNo,10);
            $id=$last_digit+1;
            if($id<9)
            {
              $id='0'.$id;
            }

           echo  $code=$company_code.$project.$month.$Year.$Year_add.$id;
        }
        else
        {
            $last_digit=substr($InvoiceNo,10);
            $id=$last_digit+1;
            if($id<9)
            {
              $id='0'.$id;
            }
           echo $code=$company_code.$project.$db_month.$Year.$Year_add.$id;
        }

      }      

    }

    public function GetTaxArrayList()
    {
        $this->db->order_by("CGST","ASC");
        return $this->db->get("tbl_taxation")->result();
    }

    public function GETProjectList($PartyID)
    {
      $this->db->order_by("CustomerName", "asc");    
      $this->db->where("Status",1);  
      $this->db->where("PartyID",$PartyID);
      $data=$this->db->get("tbl_customer")->result();
      echo '<option value="">Select Project Name</option>';
      echo "<option value='0'><b>NOT APPLICABLE<b></option>";
      foreach ($data as  $res) 
      {
         echo '<option value='.$res->CustID.'>'.$res->CustomerName.'</option>';
      }
      
    }

    public function GetLRlistarray()
    {
         $LRCompany=$this->session->LRCompany;
        return $this->db->query("  SELECT tbl_lrinvoice.* FROM `tbl_lrinvoice`
                                    INNER JOIN tbl_lr_data ON tbl_lrinvoice.`LRNo`=tbl_lr_data.LRNo
                                    WHERE  tbl_lr_data.LRCompany='$LRCompany' 
                  ")->result();
    }


    public function CancelInvoice($InvoiceNo)
    {
        $updatearray=array('Status'=>'C');
        $this->db->where("InvoiceNo",$InvoiceNo);
        $this->db->Update("tbl_lrinvoice",$updatearray);
    } 

    public function GETLRListOption($CustID)
    {
      $this->db->where("CustID",$CustID);
      $data=$this->db->get("tbl_lr_data")->result();
      $LRArray=array();
      foreach ($data as  $res) 
      {
              $this->db->where("Status",'G');
              $this->db->where("LRNo",$res->LRNo);
              $Invoice=$this->db->get("tbl_lrinvoice")->result();
              $Invoicecount=count($Invoice);
              if($Invoicecount<=0)
              {
                array_push($LRArray, $res->LRNo);
              }     
       }
      return $LRArray;
    }




	public function GET_Invoice_Details($LRNo)
	{
		$this->db->where("LRNo",$LRNo);
        $data=$this->db->get("tbl_lr_sequence12")->row();
        $company_id=$data->LRCompany;
        $CustID=$data->CustID;
        $PartyID=$data->PartyID;

        $this->db->select("company_name");
	    	$this->db->where("company_id",$company_id);
        $company=$this->db->get("tbl_company")->row();
        $company_name=$company->company_name;

        $this->db->select("PartyName");
		    $this->db->where("PartyID",$PartyID);
        $Billing=$this->db->get("tbl_billing_party")->row();
        $PartyName=$Billing->PartyName;

        $this->db->select("CustomerName");
	     	$this->db->where("CustID",$CustID);
        $customer=$this->db->get("tbl_customer")->row();
        $CustomerName=$customer->CustomerName;  

        $InvoiceNo=$company_name.'/'.$LRNo;
        $array=array(
        			  'PartyName'=>$PartyName,
        			  'CustomerName'=>$CustomerName,
        			  'InvoiceNo'=>$InvoiceNo
        			);
        echo json_encode($array);
    }


    public function GET_Tax($CGST)
    {
        $this->db->where("CGST",$CGST);
        $data=$this->db->get("tbl_taxation")->row();
        $array=array(
                      'CGST'=>$data->CGST,
                      'SGST'=>$data->SGST,
                      'IGST'=>$data->IGST,
                    );
        echo json_encode($array);

    }

    public function GET_Tax2($SGST)
    {
        $this->db->where("SGST",$SGST);
        $data=$this->db->get("tbl_taxation")->row();
        $array=array(
                      'CGST'=>$data->CGST,
                      'SGST'=>$data->SGST
                    );
        echo json_encode($array);

    }
    
    public function ViewInvoice2()
    {
        error_reporting(0);
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br/>');
        require_once ('assets/PHPExcel/Classes/PHPExcel.php');
        $LRNo=$_REQUEST['LRNo'];
        $PartyID=$_REQUEST['PartyID'];
        $CustID=$_REQUEST['CustID'];
        $InvoiceNo=$_REQUEST['InvoiceNo'];
        $InvoiceDate=$_REQUEST['InvoiceDate'];
        $CGST=$_REQUEST['CGST'];
        $SGST=$_REQUEST['SGST'];
        $IGST=$_REQUEST['IGST'];
        $SACCode=$_REQUEST['SACCode'];
        $bill_format=$_REQUEST['bill_format'];
        $InvoiceDateInsert=date("Y-m-d",strtotime(str_replace(',', ' ', $InvoiceDate)));

        if(empty($CGST))
        {
          $CGST=0;
          $SGST=0;
        }



        $lR_array=explode(",", $LRNo);
        $this->db->where_in("LRNo",$lR_array);
        $sequence=$this->db->get("tbl_lr_data")->result();

        $RouteAmountTotal=0;
        $LoadingCostTotal=0;
        $UnionCostTotal=0;
        $DeliveryCostTotal=0;
        $DetentionCostTotal=0;

        foreach ($sequence as  $result2) 
        {
            $InvoiceLRNo=$result2->LRNo;
            $this->db->where("LRNo",$InvoiceLRNo);
            $invoice=$this->db->get("tbl_lrinvoice")->result();
            $InsetLRInvoiceArray=array(
                                        'InvoiceNo'=>$InvoiceNo,
                                        'LRCompany'=>$this->session->LRCompany,
                                        'InvoiceDate'=>$InvoiceDateInsert,
                                        'LRNo'=>$result2->LRNo,
                                        'PartyID'=>$PartyID,
                                        'CustID'=>$CustID,
                                        'CGST'=>$CGST,
                                        'SGST'=>$SGST,
                                        'IGST'=>$IGST,
                                        'SACCode'=>$SACCode,
                                        'DateCreated'=>date("Y-m-d H:i:s")
                                      );
            $this->db->Insert("tbl_lrinvoice",$InsetLRInvoiceArray);  
        }


        $receivable_amount=0;

        foreach ($sequence as  $row2) 
        {
            // $PDLRNo=$row2->LRNo;
            // $lr_id=$row2->LRID;
            // $this->db->where("lr_id",$LRID);
            // $loading=$this->db->get("tbl_customer_charges")->result();            
            $receivable_amount=$receivable_amount+$row2->AppoxReceivable; 



       }

        //--------Freight Charges -------------------------------------------------------
        $summation_of_freight=$receivable_amount;

        if(!empty($CGST))
        {
          $RouteAmountCGST=$summation_of_freight*$CGST/100;
          $RouteAmountSGST=$summation_of_freight*$SGST/100;
        }
        if(!empty($IGST))
        {
          $RouteAmountIGST=$summation_of_freight*$IGST/100;
        }

        $company_id=$_SESSION['LRCompany'];         
        $this->db->where("company_id",$company_id);
        $company=$this->db->get("tbl_company")->row();
        $company_name=$company->company_name;
        $PanNo=$company->PanNo;
        $GSTNo=$company->GSTNo;

        $this->db->where("PartyID",$PartyID);
        $Billing=$this->db->get("tbl_billing_party")->row();
        $PartyName=$Billing->PartyName;
        $PartyAddress=$Billing->OfficeAddress;

        $this->db->select("CustomerName");
        $this->db->where("CustID",$CustID);
        $customer=$this->db->get("tbl_customer")->row();
        $CustomerName=$customer->CustomerName; 

        $StateID=$Billing->StateID;
        $this->db->where("id",$StateID);
        $state=$this->db->get("tbl_gstin")->row();
        $statename=$state->state;

        $styleArray = array(
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("creater");
        $objPHPExcel->getProperties()->setLastModifiedBy("Middle field");
        $objPHPExcel->getProperties()->setSubject("Subject");
        $objWorkSheet = $objPHPExcel->createSheet();
        $work_sheet_count=2;//number of sheets you want to create
        $work_sheet=0;
        $col=0;
        $row=0;
        $i=0;

        while($work_sheet<=$work_sheet_count)
        { 
             if($work_sheet==0)
             {
                    $objWorkSheet->setTitle("Invoice Details");
                    switch ($bill_format) 
                    {
                           case 'MLLCummins':
                                 require_once ('assets/Invoiceformat.php');
                                 break;
                      
                           case 'MLLFedex':
                                 require_once ('assets/MLLFedex.php');
                                 break;

                           case 'TVS':
                                 require_once ('assets/TvsInvoiceFormat.php');
                                 break;

                           case 'METROCASH':
                                 require_once ('assets/METROCASHInvoiceformat.php');
                                 break;


                           case 'MLLMHEPL':
                                 require_once ('assets/MLLMHEPLInvoiceformat.php');
                                 break;
                           case 'TCISAMSUNG':
                                 require_once ('assets/TCISAMSUNGInvoiceformat.php');
                                 break;
                           case 'TCIMARKET':
                                 require_once ('assets/TCIMARKETInvoiceformat.php');
                                 break;
                           case 'TCIVWDAMLER':
                                 require_once ('assets/TCIVWDAMLERInvoiceformat.php');
                                 break;
                           case 'JCBINDIA':
                                 require_once ('assets/JCBINDIAInvoiceformat.php');
                                break;
                          default:
                                  // echo 'Bill Format Missing';
                                 require_once ('assets/Invoiceformat.php');
                                 break;
                   }
             }

             if($work_sheet==1)
             {                   
                $objWorkSheet->setTitle("LR Details");
                $objPHPExcel->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow($col++, $row++, $i++);//setting value by column and row indexes if needed             
                require_once ('assets/LRDetailsFormat.php');
             }
            $work_sheet++;
        }

          $filename="$InvoiceNo.xlsx";
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          ob_end_clean();
          header('Content-type: application/vnd.ms-excel');
          header("Content-Disposition: attachment; filename=$filename");
          $objWriter->save('php://output');
    }


    public function DownloadInvoice($InvoiceNo)
    {
        error_reporting(0);
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br/>');
        require_once ('assets/PHPExcel/Classes/PHPExcel.php');

        $this->db->where_in("InvoiceNo",$InvoiceNo);
        $Invoice=$this->db->get("tbl_lrinvoice")->result();

        $FinalLRNo='';
        foreach ($Invoice as  $res) 
        {
          $FinalLRNo=$FinalLRNo.','.$res->LRNo;
        }

       $LRNo=substr($FinalLRNo, 1);


        $PartyID=$Invoice[0]->PartyID;
        $CustID=$Invoice[0]->CustID;
        $InvoiceNo=$Invoice[0]->InvoiceNo;
        $InvoiceDate=$Invoice[0]->InvoiceDate;
        $CGST=$Invoice[0]->CGST;
        $SGST=$Invoice[0]->SGST;
        $IGST=$Invoice[0]->IGST;
        $SACCode=$Invoice[0]->SACCode;
        $bill_format="MLLCummins";
        $InvoiceDateInsert=date("Y-m-d",strtotime(str_replace(',', ' ', $InvoiceDate)));

        $lR_array=explode(",", $LRNo);
        $this->db->where_in("LRNo",$lR_array);
        $sequence=$this->db->get("tbl_lr_data")->result();

        $RouteAmountTotal=0;

        $LoadingCostTotal=0;
        $UnionCostTotal=0;
        $DeliveryCostTotal=0;
        $DetentionCostTotal=0;

        // foreach ($sequence as  $result2) 
        // {
        //     $InvoiceLRNo=$result2->LRNo;
        //     $this->db->where("LRNo",$InvoiceLRNo);
        //     $invoice=$this->db->get("tbl_lrinvoice")->result();
        //     $InsetLRInvoiceArray=array(
        //                                 'InvoiceNo'=>$InvoiceNo,
        //                                 'LRCompany'=>$this->session->LRCompany,
        //                                 'InvoiceDate'=>$InvoiceDateInsert,
        //                                 'LRNo'=>$result2->LRNo,
        //                                 'PartyID'=>$PartyID,
        //                                 'CustID'=>$CustID,
        //                                 'CGST'=>$CGST,
        //                                 'SGST'=>$SGST,
        //                                 'IGST'=>$IGST,
        //                                 'SACCode'=>$SACCode,
        //                                 'DateCreated'=>date("Y-m-d H:i:s")
        //                               );
        //     $this->db->Insert("tbl_lrinvoice",$InsetLRInvoiceArray);  
        // }

        foreach ($sequence as  $row2) 
        {
            $PDLRNo=$row2->LRNo;
            $lr_id=$row2->LRID;
            $this->db->where("lr_id",$LRID);
            $loading=$this->db->get("tbl_customer_charges")->result();
            $RouteAmountTotal=$RouteAmountTotal+$row2->RouteAmount; 

       }

        //--------Freight Charges -------------------------------------------------------
        $summation_of_freight=$RouteAmountTotal+$LoadingCostTotal+$UnionCostTotal+$DeliveryCostTotal+$DetentionCostTotal;

        if(!empty($CGST))
        {
          $RouteAmountCGST=$summation_of_freight*$CGST/100;
          $RouteAmountSGST=$summation_of_freight*$SGST/100;
        }
        if(!empty($IGST))
        {
          $RouteAmountIGST=$summation_of_freight*$IGST/100;
        }

        $company_id=$_SESSION['LRCompany'];         
        $this->db->where("company_id",$company_id);
        $company=$this->db->get("tbl_company")->row();
        $company_name=$company->company_name;
        $PanNo=$company->PanNo;
        $GSTNo=$company->GSTNo;

        $this->db->where("PartyID",$PartyID);
        $Billing=$this->db->get("tbl_billing_party")->row();
        $PartyName=$Billing->PartyName;
        $PartyAddress=$Billing->OfficeAddress;

        $this->db->select("CustomerName");
        $this->db->where("CustID",$CustID);
        $customer=$this->db->get("tbl_customer")->row();
        $CustomerName=$customer->CustomerName; 

        $StateID=$Billing->StateID;
        $this->db->where("id",$StateID);
        $state=$this->db->get("tbl_gstin")->row();
        $statename=$state->state;

        $styleArray = array(
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("creater");
        $objPHPExcel->getProperties()->setLastModifiedBy("Middle field");
        $objPHPExcel->getProperties()->setSubject("Subject");
        $objWorkSheet = $objPHPExcel->createSheet();
        $work_sheet_count=2;//number of sheets you want to create
        $work_sheet=0;
        $col=0;
        $row=0;
        $i=0;

        while($work_sheet<=$work_sheet_count)
        { 
             if($work_sheet==0)
             {
                    $objWorkSheet->setTitle("Invoice Details");
                    switch ($bill_format) 
                    {
                           case 'MLLCummins':
                                 require_once ('assets/Invoiceformat.php');
                                 break;
                      
                           case 'MLLFedex':
                                 require_once ('assets/MLLFedex.php');
                                 break;

                           case 'TVS':
                                 require_once ('assets/TvsInvoiceFormat.php');
                                 break;

                           case 'METROCASH':
                                 require_once ('assets/METROCASHInvoiceformat.php');
                                 break;


                           case 'MLLMHEPL':
                                 require_once ('assets/MLLMHEPLInvoiceformat.php');
                                 break;
                           case 'TCISAMSUNG':
                                 require_once ('assets/TCISAMSUNGInvoiceformat.php');
                                 break;
                           case 'TCIMARKET':
                                 require_once ('assets/TCIMARKETInvoiceformat.php');
                                 break;
                           case 'TCIVWDAMLER':
                                 require_once ('assets/TCIVWDAMLERInvoiceformat.php');
                                 break;
                           case 'JCBINDIA':
                                 require_once ('assets/JCBINDIAInvoiceformat.php');
                                break;
                          default:
                                  // echo 'Bill Format Missing';
                                 require_once ('assets/Invoiceformat.php');
                                 break;
                   }
             }

             if($work_sheet==1)
             {                   
                $objWorkSheet->setTitle("LR Details");
                $objPHPExcel->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow($col++, $row++, $i++);//setting value by column and row indexes if needed             
                require_once ('assets/LRDetailsFormat.php');
             }
            $work_sheet++;
        }

          $filename="$InvoiceNo.xlsx";
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          ob_end_clean();
          header('Content-type: application/vnd.ms-excel');
          header("Content-Disposition: attachment; filename=$filename");
          $objWriter->save('php://output');
    }




//---------------------------------------------------------------------
  public function AjaxData()
    {
      $LRCompany=$this->session->LRCompany;
      $params = $columns = $totalRecords = $data = array();
      $params = $_REQUEST;
      $columns = array( 
                          0 =>'InvoiceNo',
                          1 =>'LRNo', 
                          2 => 'TripsheetNo',
                          3 => 'BalancePaymentPaid',
                          4 => 'BalancePaymentDate',
                          5 => 'ReferenceDocumentNo',
                          6 => 'DateCreated'
                     );

        $where = $sqlTot = $sqlRec = "";
        // check search value exist
        if( !empty($params['search']['value']) ) 
        {   
          $where .=" and tbl_lrinvoice.LRNo LIKE '".$params['search']['value']."%' ";    
        }

        // getting total number records without any search
        // $sql = " SELECT * FROM  tbl_lrinvoice  ";


        $sql = "  SELECT tbl_lrinvoice.* FROM `tbl_lrinvoice`
                  INNER JOIN tbl_lr_sequence12 ON tbl_lrinvoice.`LRNo`=tbl_lr_sequence12.LRNo
                  WHERE  tbl_lr_sequence12.LRCompany='$LRCompany'
               ";



        $sqlTot .= $sql;
        $sqlRec .= $sql;
        //concatenate search sql if value exist
        if(isset($where) && $where != '') 
        {
          $sqlTot .= $where;
          $sqlRec .= $where;
        }

        $sqlRec .=" ORDER BY DateCreated ".'DESC'."  LIMIT ".$params['start'].",".$params['length']." ";

        $queryTot =$this->db->query($sqlTot)->result();
        $totalRecords =count($queryTot);
        $queryRecords =$this->db->query($sqlRec)->result();
        $i=1;
        foreach ($queryRecords as $row)
         {
              $PartyID=$row->PartyID;
              $CustID=$row->CustID;

              $this->db->select("PartyName");
              $this->db->where("PartyID",$PartyID);
              $Billing=$this->db->get("tbl_billing_party")->row();
              $PartyName=$Billing->PartyName;

              $this->db->select("CustomerName");
              $this->db->where("CustID",$CustID);
              $customer=$this->db->get("tbl_customer")->row();
              $CustomerName=$customer->CustomerName;  

              // $data=;

              $new=array(
                           0=>$row->LRNo,
                           1=>$row->InvoiceNo,
                           2=>$row->TripsheetNo,                        
                           3=>date("d F, Y",strtotime($row->InvoiceDate )),
                           4=>$PartyName,     
                           5=>$CustomerName,
                           6=>$row->CGST,
                           7=>$row->SGST,
                           8=>$row->IGST,
                           9=>$row->SACCode
                      );
                 $i++;
               array_push($data, $new);
         }
         $json_data = array(
                  "draw"            => intval( $params['draw'] ),   
                  "recordsTotal"    => intval( $totalRecords ),  
                  "recordsFiltered" => intval($totalRecords),
                  "data"            => $data   // total data array
                  );
         echo json_encode($json_data);  // send data as json format
    }

//---------------------------------------------------------------------

    public function SendEmail($InvoiceNo)
    {
        $this->db->where("InvoiceNo",$InvoiceNo);
        $query=$this->db->get("tbl_lrinvoice")->result();
        foreach ($query as  $result)
         {
            $InvoiceNo=$result->InvoiceNo;
            $InvoiceDate=date("d F, Y",strtotime($result->InvoiceDate));
            $TripsheetNo=$result->TripsheetNo;
            $LRNo=$result->LRNo;
            $CGST=$result->CGST;
            $SGST=$result->SGST;
            $IGST=$result->IGST;
            $SACCode=$result->SACCode;
            $CustID=$result->CustID;
            $this->db->select("CustomerName,Email1");
            $this->db->where("CustID",$CustID);
            $customer=$this->db->get("tbl_customer")->row();
            $CustomerName=$customer->CustomerName;
            $CustomerEmail1=$customer->Email1;

            $email_config = Array(
                         'protocol'  => 'smtp',
                         'smtp_host' => 'mail.ileaf.in',
                         'smtp_port' => '465',
                         'smtp_user' => 'kedar@ileaf.in',
                         'smtp_pass' => 'ileaf@@2019',
                         'mailtype'  => 'html',
                         'starttls'  => true,
                         'newline'   => "\r\n"
                      );

           $sub='DhananjayRoadways - Invoice Details';
           $from='kedar@ileaf.in';
           // $to='anvita_associates@rediffmail.com';
           $msg = "<html><table>
                              <tr>
                                  <td>&nbsp;</td>
                               </tr>
                             <tr>
                                  <td>Dear  " .$CustomerName." ,</td>
                              </tr>
                              <tr>
                                  <td>&nbsp;</td>
                               </tr>
                                <tr>
                                   <td>
                                     <b> Following Invoice Details :</b>
                                  </td>
                               </tr>
                                 <tr>
                                    <td> &nbsp;</td>
                                 </tr>
                                  <tr>
                                       <td>Invoice No. - " .$InvoiceNo."</td>
                                  </tr>
                                  <tr>
                                       <td>LR No. - " .$LRNo."</td>
                                  </tr>
                                <tr>
                                    <td > &nbsp;</td>
                                </tr>
                                 <tr>
                                  <td>&nbsp;</td>
                                 </tr>
                                <tr>
                                  <td colspan='2'><strong><em>Warm Regards</em></strong></td>
                                </tr>
                                <tr>
                                  <td colspan='2'><strong>Dhananjay Roadways Team</strong></td>
                                </tr>
                             <tr>
                                <td >&nbsp;</td>
                             </tr>
                          </table></html>";

                    $this->load->library('email', $email_config);
                    $this->email->from($from, 'Dhananjay Roadways');
                    $this->email->to($CustomerEmail1);
                    $this->email->cc('mustafa.kothawala@gmail.com'); 
                    $this->email->subject($sub);
                    $this->email->message($msg);
                     $this->email->set_mailtype('html');
                    $this->email->send();       
                   echo 1;  
                   
          }
    } 







    



}  
