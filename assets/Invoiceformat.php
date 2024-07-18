         <?php


            $objPHPExcel->getActiveSheet($work_sheet)->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            //  Title ---------------------------------------------------------------------
           
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('A')->setWidth(30);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('C')->setWidth(13);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('B')->setWidth(25);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A3:F3')->applyFromArray(array('font' => array('size' => 12,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A3', "ORIGINAL FOR RECIPIENT");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);           
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A4:F4')->applyFromArray(array('font' => array('size' => 12,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A4:F4');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A4', "TAX INVOICE");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A7', "To,");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A7')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A9', "Customer Name :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A10', "Address :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A11', "State :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A12', "State Code :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A13', "Tel. No. :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A14', "GST No. :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A15', "PAN No. :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A16', "Place of Supply (City, State):");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A17', "Address of Delivery (City, State):");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A18', "GST payable under reverse charge: ");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A9:A18')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B9',  $PartyName);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B9:F9');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B10', $PartyAddress);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B10:F10');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B11', $statename);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B11:F11');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('B11:B15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B12', $Billing->StateCode);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B12:F12');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B13', $Billing->TelNo);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B13:F13');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B14', $Billing->GSTNo);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B14:F14');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B15', $Billing->PanNo);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B15:F15');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B16', $Billing->PlaceofSupply);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B16:F16');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B17', $statename);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B17:F17');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B18', $Billing->ReverseCharge);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B18:F18');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('B9:B18')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A22', "Invoice No :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A23', "Invoice Date :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A24', "Project:");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A22:A24')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B22', $InvoiceNo);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B23', $InvoiceDate);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B24', $CustomerName);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('B22:B24')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A22:B25')->applyFromArray($styleArray);

            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A7:F18')->applyFromArray($styleArray);
            
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A3:F60')->applyFromArray($styleArray);
            

            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('B22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D22', "PAN No :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D23', "GSTIN: ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D24', "Nature of Services : ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D25', "SAC Code : ");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('D22:D25')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E22', $PanNo);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E23', $GSTNo);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E24', 'Transportation of Goods by Road');
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('E24:F24');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E25', $Billing->SACCode);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('E22:F25')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('E22:F25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A28', " Sr. No. :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B28', " Description of Service ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('C28', " Month ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D28', " Trip ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E28', " Rate ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F28', " Amount ");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F40')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F28')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F28')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('D22:F25')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A30', " 1 ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B30', " Transporation of Goods by Road ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B31', " (As per enclosed Annexure)");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B32', "Freight Charges");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F32', $basic_freight_charges);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F33', $OtherChargesTotal);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B35', "Total");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F35', $summation_of_freight);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A37', "Add:");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A38', "1");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A39', "2");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B37', "Add:");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B38', "CGST (Central Tax)");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B39', "SGST (State Tax)");

           if(!empty($IGST))
            {
               $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B40', "IGST");
               $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E40', $IGST.' %');
               $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F40', $RouteAmountIGST);
               $total_amount=$summation_of_freight+$RouteAmountIGST;
            }
            else
            {
                 $total_amount=$summation_of_freight;
            }   

            
           if(!empty($CGST))
            {
                $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E38', $CGST.' %');
                $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E39', $SGST.' %');
                $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F38', $RouteAmountCGST);
                $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F39', $RouteAmountSGST);      
                $total_amount=$RouteAmountCGST+$RouteAmountSGST+$summation_of_freight;          
            }
            else
            {
                 $total_amount=$summation_of_freight;
            }   


            //--------------- Words conversion  ------------------------------------------
               $number = $total_amount;
               $no = round($total_amount);
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
              $result = implode('', $str);
              $points = ($point) ?
                "." . $words[$point / 10] . " " . 
                      $words[$point = $point % 10] : '';
             $result . "Rupees  " . $points . " Paise";
            //------------------------------------------------------------------------------
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E41', "TOTAL");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F41', $total_amount);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F41')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
             // $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A41', "80,554");
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A41')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A28:F41')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A42', "Total invoice value [ in Words] :");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B42', $result);
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('B42:D42');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A42:F42')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A43', "Remarks - Customer is not liabile to pay GST under Reverse Charge since  Dhananjay Roadways being GTA supplier has opted to pay GST under Forward Charge.");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A43:F43');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A43:F43')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('F41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A45', "TERMS & CONDITIONS  :");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A45:F45');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A46', "1.All Payments by cheques / drafts in favor of  Dhananjay Roadways should be crossed to payees account.");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A46:F46');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A47', "2.No Claims and / or discrepancy if any shall be considered unless brought to the notice of the company in writing within 3 days of the receipt of the bill.");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A47:F47');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A48', "3.Dispute if any shall be subjected to the jurisdiction of Mumbai Courts only.");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A48:F48');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A45:A48')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));          
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D52', 'For " Dhananjay Roadways " ');
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('D52:E52');   
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('D52')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));         
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A57', 'Regd office address: Plot No. 144B, Sector Number 23, Transport Nagar, Nigdi, Pune, Maharashtra 411044');
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A57:F57');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A58', "Head Office address:Plot No. 144B, Sector Number 23, Transport Nagar, Nigdi, Pune, Maharashtra 411044");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A58:F58');
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A59', "Email: dhananjay@gmail.com ,    website ____________________________________   TEL. NO. 91xxxxxxxxx,  FAX: ____________________________________");
            $objPHPExcel->getActiveSheet($work_sheet)->mergeCells('A59:F59');
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A57:F59')->applyFromArray(array('font' => array('size' => 8,'bold' => true,'color' => array('rgb' => '333333'))));
          


          ?>  