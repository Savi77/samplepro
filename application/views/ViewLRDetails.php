	


<style type="text/css">
.table > tbody > tr > td, .table > tfoot > tr > td 
 {
    padding: 5px 20px !important;
 }
</style>





	<div class="panel panel-flat">
		<div class="table-responsive" style="overflow-x: hidden !important;">
	       <div class="row">		
	       	 <div class="col-md-6 view">		
				<table class="table" style="border: 1px solid #ddd;">
					<tbody>
						<tr>
							<th colspan="2" class="active" style="padding: 3px 10px;background-color: #2196F3;color: white;">LR Basic Details</th>
						</tr>

						<tr>
							<td>LR No. :</td>
							<td><b><?= $objects['LRNo'];?></b></td>
						</tr>
						<tr>
							<td>Transport Service Type :</td>
							<td><?= $objects['TransportServiceType']?></td>
						</tr>

						<tr>
							<td>Billing Party :</td>
							<td><?= $objects['PartyName']?></td>
						</tr>
						<tr>
							<td> Customer (Project) Name:</td>
							<td><?= $objects['CustomerName']?></td>
						</tr>
						<tr>
							<td>LR Date : </td>
							<td><?php if($objects['LRDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['LRDate'])); }  ?></td>
						</tr>
						<tr>
							<td>Pickup Date : </td>							
							<td><?php if($objects['PickupDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['PickupDate'])); }  ?></td>
						</tr>
					
						<tr>
							<td>Actual Pickup Date :</td>							
							<td><?php if($objects['ActualPickupDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['ActualPickupDate'])); }  ?></td>
						</tr>
						<tr>
							<td>Expected Delivery Date : </td>							
							<td><?php if($objects['ExpectDeliveryDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['ExpectDeliveryDate'])); }  ?></td>
						</tr>
						<tr>
							<td>Consignor Name :</td>
							<td><?= $objects['Consignor'] ?>
						    </td>
						</tr>

						<tr>
							<td>Consignee Name :</td>
							<td><?= $objects['Consignee'] ?>
						    </td>
						</tr>

						<tr>
							<td>Contract Type :</td>
							<td><?= $objects['ContractType']?></td>
						</tr>
						<tr>
							<td>LR From Branch : </td>
							<td><?= $objects['LRFromBranch']?></td>
						</tr>
						<tr>
							<td>From Location :</td>
							<td><?= $objects['FromLocation'] ?></td>
						</tr>
						<tr>
							<td>To Location :</td>
							<td><?= $objects['ToLocation'] ?></td>
						</tr>
						<tr>
							<td>Amount :</td>
							<td><?= $objects['RouteAmount'] ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table"  style="border: 1px solid #ddd;">
					<tbody>
						<tr>
							<th colspan="2" class="active" style="padding: 3px 10px;background-color: #2196F3;color: white;">
								Product Details
							</th>
						</tr>
						<tr>
							<td>Product Weight :</td>
							<td><?= $objects['ProductWeight'] ?></td>
						</tr>
						<tr>
							<td>Chargeable Weight :</td>
							<td><?= $objects['ChargeableWeight'] ?></td>
						</tr>
						<tr>
							<td>No. of Packages :</td>
							<td><?= $objects['NoOfPackage']; ?></td>
						</tr>
						<tr>
							<td>Value of Goods :</td>
							<td><?= $objects['Valueofgoods']; ?></td>
						</tr>
						<tr>
							<td>Eway Bill No :</td>
							<td><?= $objects['EwayBillNo']; ?></td>
						</tr>

						<tr>
							<td>Goods Insurance Details :</td>
							<td><?= $objects['InsuranceDetails']; ?></td>
						</tr>
						<tr>
							<td>Remarks :</td>
							<td><?= $objects['LRRemarks']; ?></td>
						</tr>

					</tbody>
				</table>
		     </div>		

	       	 <div class="col-md-6 view">		
				<table class="table"  style="border: 1px solid #ddd;">
					<tbody>
						<tr>
							<th colspan="2" class="active" style="padding: 3px 10px;background-color: #2196F3;color: white;">
							Bill Details
						</th>
						</tr>
						<tr>
							<td>Tender No : </td>
							<td><?= $objects['TenderNo'] ?></td>
						</tr>
						<tr>
							<td>Tender Date :</td>							
							<td><?php if($objects['TenderDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['TenderDate'])); }  ?></td>
						</tr>
						<tr>
							<td>Invoice No. : </td>
							<td><?= $objects['InvoiceNo'];?></td>
						</tr>

						<tr>
							<td>Invoice Date :</td>
							<td><?php if($objects['InvoiceDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['InvoiceDate'])); }  ?></td>
						</tr>

						<tr>
							<td>PO No. :</td>
							<td><?= $objects['PONo']; ?></td>
						</tr>

						<tr>
							<td>PO Date :</td>							
							<td><?php if($objects['PODate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['PODate'])); }  ?></td>
						</tr>

						<tr>
							<td>Challan No :</td>
							<td><?= $objects['ChallanNo']; ?></td>
						</tr>	

						<tr>
							<td>Challan Date :</td>							
							<td><?php if($objects['ChallanDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['ChallanDate'])); }  ?></td>
						</tr>

						<tr>
							<td>Indent No :</td>
							<td><?= $objects['IndentNo']; ?></td>
						</tr>

						<tr>
							<td>Indent Date :</td>
							
							<td><?php if($objects['IndentDate']!='0000-00-00') { echo date("d-M-Y",strtotime($objects['IndentDate'])); }  ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table"  style="border: 1px solid #ddd;">
					<tbody>
						<tr>
							<th colspan="2" class="active" style="padding: 3px 10px;background-color: #2196F3;color: white;">
							 LR Charges
						</th>
						</tr>
						<tr>
							<td>Vehicle Type : </td>
							<td><?= $objects['VehicleType']; ?></td>
						</tr>
						<tr>
							<td>Vehicle No. :</td>
							<td><?= $objects['VehicleNoenter']; ?></td>
						</tr>
						<tr>
							<td>Driver Name :</td>
							<td><?= $objects['DriverID']; ?></td>
						</tr>

						<tr>
							<td>Driver Mobile No. :</td>
							<td><?= $objects['DriverMobile']; ?></td>
						</tr>

						<tr>
							<td>Receivable Amount :</td>
							<td><?= $objects['AppoxReceivable']; ?></td>
						</tr>
						<tr>
							<td>Payable Amount :</td>
							<td><?= $objects['AppoxPayable']; ?></td>
						</tr>
						<tr>
							<td>Gross Profit :</td>
							<td><?= $objects['AppoxProfit']; ?></td>
						</tr>						
					</tbody>
				</table>


		     </div>	
		    </div> 
		</div>
	</div>


