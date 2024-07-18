         <?php
         

            $objPHPExcel->getActiveSheet($work_sheet)->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            //  Title ---------------------------------------------------------------------          	
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('A')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('B')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('C')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('F')->setWidth(20);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('G')->setWidth(23);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('H')->setWidth(20);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('I')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('J')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('K')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('L')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('M')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('N')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('O')->setWidth(15);
			$objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('P')->setWidth(15);
			$objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('Q')->setWidth(18);
			$objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('R')->setWidth(15);
			$objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('S')->setWidth(15);
			$objPHPExcel->getActiveSheet($work_sheet)->getColumnDimension('T')->setWidth(15);
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A1', " INVOICE NO ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B1', " LR NO. ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('C1', " LR DATE  ");
            $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D1', " CONSINER NAME ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E1', " CONSINEE NAME ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F1', " EWAY BILL NO. ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('G1', " FROM  ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('H1', " TO ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('I1', " INVOICE DATE ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('J1', " VEHICLE NO.");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('K1', " BASIC FARE ");

			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('L1', " RECEIVABLE AMOUNT ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('M1', " PAYABLE AMOUNT ");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('N1', " GROSS PROFIT ");

			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('O1', " DRIVER NAME");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('P1', " DRIVER MOBILE");
			$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('Q1', " REMARK ");
			// $objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('R1', " VEHICLE NO. ");
			$objPHPExcel->getActiveSheet($work_sheet)->getStyle('A1:Q1')->applyFromArray(array('font' => array('size' => 10,'bold' => true,'color' => array('rgb' => '333333'))));
          //  $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A1:T1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFDBE2F1');
         
            $objPHPExcel->getActiveSheet($work_sheet)->getStyle('A1:Q1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FBF126');
			$objPHPExcel->getActiveSheet($work_sheet)->getRowDimension('1')->setRowHeight(15);
			$objPHPExcel->getActiveSheet($work_sheet)->getStyle('A1:Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet($work_sheet)->getStyle('A1:Q1')->applyFromArray($styleArray);

			$cellno=2;
            foreach ($sequence as  $result) 
            {
           	
            	$this->db->select("DebtorName");
				$this->db->where("DebtorID",$result->Consignor);
				$Consignor=$this->db->get("tbl_debtors")->row();

				$this->db->select("DebtorName");
				$this->db->where("DebtorID",$result->Consignee);
				$Consignee=$this->db->get("tbl_debtors")->row();  

				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('A'.$cellno, $InvoiceNo);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('B'.$cellno, $result->LRNo);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('C'.$cellno, $result->LRDate);

				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('D'.$cellno, $Consignor->DebtorName);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('E'.$cellno, $Consignee->DebtorName);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('F'.$cellno, $result->EwayBillNo);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('G'.$cellno, $result->FromLocation);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('H'.$cellno, $result->ToLocation);

				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('I'.$cellno, $result->InvoiceDate);

				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('J'.$cellno, $result->VehicleNoenter);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('K'.$cellno, $result->RouteAmount);


				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('L'.$cellno, $result->AppoxReceivable);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('M'.$cellno, $result->AppoxPayable);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('N'.$cellno, $result->AppoxProfit);

				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('O'.$cellno, $result->DriverID);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('P'.$cellno, $result->DriverMobile);
				$objPHPExcel->getActiveSheet($work_sheet)->SetCellValue('Q'.$cellno, $result->LRRemarks);
				$cellno++;

            } 	

























           ?>