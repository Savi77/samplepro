<?php  
	if( isset( $company['trade_name']) ) { 
		$com_state_id = $company['state'];
	}
	else {
		$com_state_id = 1;
	}
	
	if( $order['state_id'] ) {
		 $client_state_id = $order['state_id'] ;
		$client_gst_category = $order['party_category'];
	}
	else {
		$client_state_id = 1;
		$client_gst_category = '';
	}
?>

<!doctype html>
<html>
	<head>
	  	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<title> <?php  if( isset( $order['so_challan_id'] )  ) { echo $order['so_challan_id']; }?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>app-assets/css/vendors.css">
	
		<style>
			.btn-info:focus, .btn-info.focus,.btn-info:hover {
				background-color: #2196F3;
				border-color: #2196F3;
			}
			.btn-info {
				color: #fff;
				background-color: #2196F3;
				border-color: #2196F3;
			}
			.heading-elements {
				background-color: inherit;
				position: absolute;
				top: 8px;
				right: 34px;
				height: 36px;
			}	
			@media print  
			{
				a[href]:after {
					content: none !important;
				}
				@page {
					margin-top: 0;
					margin-bottom: 0;
				
				}
		
			}

			body {
				font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
			}
			
			
			.main {
				padding-bottom:0px;
				width: 100%;
				margin: auto;
				line-height: 1.2;
				position: relative;
			}
			
			.half {
				width:33%;
			}
			
			.chalf {
				width:50%;
			}
				
			#heading {
				width:100%; 
				
			}
			
			div.img {
				width:120px;
			}
			
			img {
				width:120px;
			}
			
			.top-mid {
				width:660px;
			}
			ul{
				text-align: left;
			}
			
			.left {
				float:left;
				
			}
			.right {
				float:right;
				
				
			}
			.center {
				text-align:center;
				
			}
			align-right {
				text-align:right;
			}
			h1{
				font-size:1.5em;
			}
			h2 {
				font-size:1.2em;
				margin:0px;
				padding:0px;
			}
			h4 {
				font-size:15;
				line-height:20px;
				margin:0px;
			}
			h3 {
				font-size:13px;
			}
			
			.border {
				border:1px solid gray;
			}
			.full {
				width:100%;
			}	
			
			.fourty {
				width:30%;
			}
			.seventee {
				width:65%;
			}
			
			.clear-both {
				clear:both;
			}
			
			
			#purchase_ordr {
				display: inline-block;
				width: 100%;
				padding: 10px 20px;
				box-sizing: border-box;
			}
			#purchase_ordr .addrs{ width:33%;float: left;}

			.tbl table{ width:100%; margin:auto;} 
			.tbl thead {color:#fff;}
			.tbl th{background-color: #2196f3;
			color: #fff;
			font-size: 14px;
			padding: 4px 8px;}
			.tbl tr{ text-align:center;}
			
			.tbl td {
			padding: 5px 6px;
			font-size: 14px;
			}
			#purchase_ordr1 {
				display: inline-block;
				width: 100%;
				padding-top: 15px;
				box-sizing: border-box;
			}
			.tbln table{ width:100%; margin:auto;} 
			.tbln thead {background-color:#2196f3;}
			.tbln th{
			color: white;
			font-size: 14px;
			padding: 4px 8px;}
			.tbln tr{ text-align:center;}
			.tbln td {
			padding: 5px 6px;
			font-size: 14px;
			}
			.tbl2 td{ color:#000; border:none;text-align: right; }	
			
			.tableborder {
				border:1px solid gray;
				border-collapse: collapse;
			}
			
			.tableborder td  {
				border:1px solid gray;
				border-collapse: collapse;
			}
			.tableborder th  {
				border:1px solid gray;
				border-collapse: collapse;
			}
			.hr_line {
				margin-bottom: 0px;
				border: 0;
				border-top: 1px solid rgba(0, 0, 0, 0.1);
				margin-top: 6px;
				background: #1399D7;
				height: 2px;
			}
			.tb1{
				padding: 12px;color: white;background: #58595b;
			}
			.tb2{
				padding: 12px;color: white;background: #1399D7;
			}
			#invTable td, #invTable th {
				border: 1px solid #ddd;
				padding: 10px;
			}
			li{
				font-size: 14px;
			}
			ol li, ul li, dl li {
				line-height: 1.6;
			}
			td{
				word-wrap: break-word;
			}
			body{
				color: black;
			}
			.table th, .table td {
				padding: 0px 0px 5px 2px;
				vertical-align: top;
				border-top: 0px solid transparent;
			}
 		</style>
		
	</head>
	
<body >
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="container">
				<div class="col-md-12" style="padding: 2px;margin-top: 2%;">
					<div class="card">
						<div class="card-header" style="background: #f3f2f2">
							<strong>Purchase Order</strong>
							<div class="heading-elements">
								<a href="<?php echo base_url(); ?>purchase/Download?id=<?= $po_id; ?>" target="_blank">
									<button type="button" class="btn btn-info btn-labeled" style="color: white;"><b><i class="fa fa-download pull-right" aria-hidden="true"></i></b> Download Quotation </button>
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row" >
								<div class="col-sm-6">
									<div class="row" style="padding-left: 7%;">
										<div class="col-sm-2 p-0">
											<?php 
												$logoFile = $company['company_logo'] ; 
												if (file_exists( $logoFile)) {
											?>
												<img src="<?= base_url()  ?>/<?= $company['company_logo'] ?>"  style="width: 80px;height: 100px;margin-bottom: 10px !important;float: right;"   alt="logo">
											<?php } ?>
										</div>
										<div class="col-sm-10 pl-1">
											<div class="left">
												<ul class="list-condensed list-unstyled invoice-payment-details" style="width: 120%;">
													<li style="color: black;font-size: 18px;font-weight: 700;"><?php if( isset( $company['trade_name']) ) { echo $company['trade_name'] ; } ?></li>
													<li><?php if( isset( $company['city_name']) ) { echo $company['city_name'] ; } ?>, <?php if( isset( $company['state_name']) ) { echo $company['state_name'] ; } ?>, <?php if( isset( $company['pincode']) ) { echo $company['pincode'] ; } ?>, <?php if( isset( $company['country_sort']) ) { echo $company['country_sort'] ; } ?></li>
													<li><?php if( isset( $company['user_phone_num']) ) { echo $company['user_phone_num'] ; } ?></li>
													<li><?php if( isset( $company['user_email']) ) { echo $company['user_email'] ; } ?></li>
													<li><?php if( isset( $company['gst_number']) ) { echo 'GSTIN: '.$company['gst_number'] ; } ?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 rigth">
									<div class="row right">
										<p style="font-size: 30px;font-family: inherit;color: #1399D7;font-weight: 650;margin-right: 33px;margin-bottom: 0px;">PURCHASE ORDER</p>
									</div>
									<br>
									<table class="bpmTopic right" style="width: 90%;">
										<tbody>
											<tr >
												<td class="text-left" >Invoice Number : </td>
												<td class="right" ><b><?php  if( isset( $order['challan_id'] )  ) { echo $order['challan_id']; }?></b></td>
											</tr>
											<tr>
												<td class="text-left" >Invoice Date : </td>
												<td class="right" ><b><?php  if( isset( $order['order_placed_on'] )  ) { echo $dateto 	= date('d-m-Y', strtotime($order['order_placed_on'])); } ?></b></td>
											</tr>
											<tr>
												<td class="text-left" >Place of Supply: </td>
												<td class="right" ><b><?php if( isset( $company['city_name']) ) { echo $company['city_name'] ; } ?>, <?php if( isset( $company['state_name']) ) { echo '( '.$company['state_name'].' )' ; } ?></b></td>
											</tr>
											<tr>
												<td colspan="2"><hr class="hr_line"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-6">
											<div class="left">
												<ul class="list-condensed list-unstyled invoice-payment-details">
													<li style="font-size: 20px;font-weight: 700;background: #1399D7;margin: 0;"><span style="color: black;margin-left: 5%;">VENDOR</span></li>
													<li style="color: black;font-size: 15px;font-weight: 700;"> <?php if( isset( $clientdetails['vendor_name']) ) { echo $clientdetails['vendor_name'] ; } ?> </li>
													<li style="color: black;font-size: 15px;font-weight: 700;"> <?php if( isset( $clientdetails['company_name']) ) { echo $clientdetails['company_name'] ; } ?> </li>
													<li style="font-size: 15px"><?= $order['phone_number'] ; ?></li>
													<li style="font-size: 15px"><?= $order['address_line1'] ?>, <?= $order['state_name']; ?> - <?= $order['address_postal']; ?></li>
												</ul>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="right">
												<ul class="list-condensed list-unstyled invoice-payment-details">
													<li style="font-size: 20px;font-weight: 700;background: #1399D7;margin: 0;"><span style="color: black;margin-left: 5%;">SHIP TO</span></li>
													<li style="color: black;font-size: 15px;font-weight: 700;"> <?php if( isset( $clientdetails['vendor_name']) ) { echo $clientdetails['vendor_name'] ; } ?> </li>
													<li style="color: black;font-size: 15px;font-weight: 700;"> <?php if( isset( $clientdetails['company_name']) ) { echo $clientdetails['company_name'] ; } ?> </li>
													<li style="font-size: 15px"><?= $order['phone_number'] ; ?></li>
													<li style="font-size: 15px"><?= $order['address_line1'] ?>, <?= $order['state_name']; ?> - <?= $order['address_postal']; ?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<!-- <div class="right">
										<ul class="list-condensed list-unstyled invoice-payment-details">
											<li style="color: black;font-size: 15px;font-weight: 700;"> 
												Vendor Quote Number: <?php if( isset( $order['vendor_quote_number']) ) { echo $order['vendor_quote_number'] ; } ?> 
											</li>
											<li style="color: black;font-size: 15px;font-weight: 700;"> 
												Vendor Quote Date: <?php if( isset( $order['vendor_quote_date']) ) { echo dbdate_to_caldate($order['vendor_quote_date']); } ?> 
											</li>
										</ul>
									</div>	 -->
									<table class="table" style="margin-left: 10%;width:90%">
										<tr>
											<td>Vendor Quote Number:</td>
											<td><?php if( isset( $order['vendor_quote_number']) ) { echo $order['vendor_quote_number'] ; } ?> </td>
										</tr>
										<tr>
											<td>Vendor Quote Date:</td>
											<td><?php if( isset( $order['vendor_quote_date']) ) { echo $dateto 	= date('d-m-Y', strtotime($order['vendor_quote_date'])); } ?> </td>
										</tr>
									</table>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 table-responsive">
									<table style="width: 100%;" id="invTable">
											<thead>
												<th class="tb2">No.</th>
												<th class="tb2" >Item Description</th>
												<th class="tb2" >HSN/SAC</th>
												<th class="tb2" >Price</th>
												<?php if($client_state_id != $com_state_id){ ?>
													<th class="tb1" >IGST</th>
												<?php	}else { ?>
													<th class="tb1" >CGST</th>
													<th class="tb1" >SGST</th>
												<?php	}	?>
												<th class="tb1" >Amount</th>
											</thead>
											<tbody>
												<?php 
													$i = 1;
													$taxableAmount = 0 ; 
													$totalAmount = 0 ; 
													$totalIgst = 0;
													$totalCgst = 0;
													$totalSgst = 0;
													foreach ($order_items as $key => $order_item) {
														if($client_state_id != $com_state_id){ 
															$totalIgst = (float) $totalIgst  + (float) $order_item['gst_amount']  ;
														}else {
															$date1  = $order_item['gst_amount']/2.00  ;
															$totalCgst = (float) $totalCgst  + (float) $date1  ;
															$totalSgst = (float) $totalSgst  + (float) $date1  ;
														}
													$taxableAmount = (float) $taxableAmount  + (float) $order_item['taxable_amount'] ;
													$totalAmount 	= (float) $totalAmount  + (float) $order_item['total']  ;
													$uom  =   $this->main_model->get_Row_Data_By_Query('klc_option',['option_id'=> $order_item['uom']]);
												?>
													<tr>
														<td><?= $i.'.'; $i++; ?></td>
														<td><?= $order_item['product_name'] ?> </td>
														<td class="text-right" ><?= $order_item['hsn/sac_code'] ?>   </td>
														<td class="text-right" >&#x20B9 <?= number_format( $order_item['unit_price'],2); ?>   </td>
														<?php 
															$toatl_cgst = 0.00;
															$toatl_sgst = 0.00;
															if($client_state_id != $com_state_id){ 
														?>
															<td class="text-right" >&#x20B9	<?= $order_item['gst_amount'] ?>	</td>
														<?php	}	else {	?>
															<td class="text-right" >
																&#x20B9 <?php 
																	$date1  = $order_item['gst_amount']/2.00  ;

																	echo number_format($date1,2 );
																?>  
															</td class="text-right" >
															<td class="text-right" >
															&#x20B9 <?php 
																	$date2  = $order_item['gst_amount']/2.00  ;
																	
																	echo number_format($date2,2 );
																?>  
															</td>
														<?php	}	?>
														
														<td class="text-right" >&#x20B9 <?= number_format($order_item['total'],2) ?>   </td>
													</tr>

												<?php	}	?>
											</tbody>
											<?php if($client_state_id != $com_state_id){ ?>
												<tfoot id="invTableFoot">
													<td colspan="4" style="border: none;"></td>
													<td class="text-right" >&#x20B9 <?= number_format($totalIgst,2); ?></td>
													<td class="text-right" >&#x20B9 <?= number_format($totalAmount,2)?></td>
												</tfoot>
											<?php	}else { ?>
												<tfoot id="invTableFoot">
													<td colspan="4" style="border: none;"></td>
													<td class="text-right" >&#x20B9 <?= number_format($totalCgst,2); ?></td>
													<td class="text-right" >&#x20B9 <?= number_format($totalSgst,2); ?></td>
													<td class="text-right" >&#x20B9 <?= number_format($totalAmount,2)?></td>
												</tfoot>	
											<?php	}	?>
									</table>
								</div>
							</div>
							<?php
								$number = $totalAmount;
								$no = round($totalAmount);
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
								// $points = ($point) ?
								// "." . $words[$point / 10] . " " . 
								// 	$words[$point = $point % 10] : '';
								// $in_result . "Rupees  " . $points . " Paise";
								
								if (strlen($in_result) >= 50) {
									$style = 'width: 68%;float: right;margin-top: -6%;text-align: end;';
								}else {
									$style = 'width: 76%;float: right;margin-top: -6%;text-align: end;';
								}
							?>
							<div class="row" style="margin-top: 3%;">
								<div class="col-sm-6" style="margin-top: -6%;">
									<ul class="list-condensed list-unstyled invoice-payment-details">
										<li style="color: #1399D7;font-size: 20px;font-weight: 700;">Terms And Conditions :</li>
										<?php 
											if( isset( $company['so_term']) ) {

											echo  "<li>" . $company['so_term'] . "</li>" ; 
											
											} else {
											?>
											<li>. GST 18% Extra (As Per Government Norms)</li>
											<li>. Payment Terms</li>
											<?php
											}
										?>
									</ul>
								</div>
								<div class="col-sm-6">
									<table class="bpmTopic right" style="width: 107%;margin-top: -5%;">
										<tbody>
											<tr>
												<td class="left ml-1" >Total Taxable Value </td>
												<td class="right" ><b>&#x20B9 <?= number_format($totalAmount,2)?></b></td>
											</tr>
											<tr>
												<td class="left" >Total Value (in Figure) </td>
												<td class="right" ><b>&#x20B9 <?= number_format($totalAmount,2)?></b></td>
											</tr>
											<tr>&nbsp;</tr>
											<tr>
												<td class="left" >Total Value (in Words) </td>
												<td class="right" >
													<div style="<?= $style; ?>">
														<b><?= 'Rupees '.ucwords($in_result).' Only'; ?></b> 
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="row" style="margin-top: 1%;">
								<div class="col-sm-6">
									<p style="color: #1399D7;font-size: 22px;font-weight: 700;text-align: left;">Thank You For Your Business</p>
								</div>
								<div class="col-sm-6">
									<hr class="hr_line">
									<p style="color: #1399D7;font-size: 18px;font-weight: 700;text-align: center;">For : <?php if( isset( $company['trade_name']) ) { echo $company['trade_name'] ; } ?></p>
								</div>
							</div>

							<div class="row" style="margin-top: 1%;">
								<div class="col-sm-6" id="footerQut_one" style="background: #1399D7;color: white;font-size: 16px;padding: 14px 0px 0px 35px;height: 52px;">
									<p>+91 - <?php if( isset( $company['user_phone_num']) ) { echo $company['user_alternet_number'] ; } ?></p>
								</div>
								<!-- height: 42px;top: 13px;padding: 6px 0px 0px 50px; -->
								<div class="col-sm-6" id="footerQut_two" style="background: #58595b;color: white;font-size: 16px;padding: 14px 0px 0px 35px;height: 52px;">
									<p>info@kalcy.in | www.kalcy.in | +91 - <?php if( isset( $company['user_phone_num']) ) { echo $company['user_phone_num'] ; } ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>