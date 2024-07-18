	
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
         $this->load->view('includes/head_script');
    ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap_validator/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/drilldown.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/components_notifications_pnotify.js"></script>	
	<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <style type="text/css">
        .serviceBox 
        {
            border: 1px solid #00BBD2;
            padding: 27px 20px 0px;
            margin: 20px 0 0 20px;
            position: relative;
        }
		.serviceBox .service-icon 
		{
		    width: auto;
            padding: 1px 7px;
		    height: 31px;
		    line-height: 29px;
		    background: #26a69a;
		    border: 2px solid #26a69a;
		    text-align: center;
		    font-size: 15px;
		    color: #f7f7f7;
		    position: absolute;
		    top: -14px;
		    left: 30px;
		    font-weight: 700;
		    transition: all 0.5s ease 0s;
		}
        .serviceBox:hover .service-icon 
        {
            color: #fff;
            background: #2B559B;
            border: 2px solid #2B559B;
        }
      .serviceBox .title 
        {
            font-size: 22px;
            font-weight: 600;
            color: #3e5482;
            margin-bottom: 15px;
        }
        .serviceBox .description 
        {
            font-size: 15px;
            color: #7a696f;
            line-height: 27px;
        }
        @media only screen and (max-width: 990px) 
        {
            .serviceBox 
            {
                margin-bottom: 80px;
            }
        }
    </style>

	<style type="text/css">
		.dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu 
		 {
		    top: auto;
		    bottom: -4px !important;
		 }
		.daterangepicker.dropdown-menu
		 {
		   z-index: 9999 !important;
		 }
	</style>
	<script type="text/javascript">
	  function isNumber(evt)
	    {
	        evt = (evt) ? evt : window.event;
	        var charCode = (evt.which) ? evt.which : evt.keyCode;
	        if (charCode > 31 && (charCode < 48 || charCode > 57))
	         {
	            return false;
	         }
	        return true;
	    }
	</script>
</head>

<body>
   <?php 
       $trip_no=$_REQUEST['trip_no'];
       $this->load->view('includes/header');
       $this->load->view('includes/menubar');
   ?>
	<div class="page-header" style="display: none;">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create New LR</span></h4>
			</div>
			<div class="heading-elements">
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('LRData') ?>"> LR</a></li>
					<li class="active">Create New LR</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page container -->
	<div class="page-container">
		<div class="page-content">
			<div class="content-wrapper">
				<div class="">
                      <div class="row">
                     
                        <div class="col-md-12">
				            <div class="panel panel-white">

			                	<form class="stepy-validation" id="defaultForm" method="POST">
			                		<input type="hidden" name="TripsheetNo" id="trip_no" value="<?= $trip_no;?>">
									<fieldset title="1">
									 <legend class="text-semibold">Sequence 1</legend>
									 <hr style="margin-top: 10px;margin-bottom: 10px;" />									

                                           <div class="serviceBox"  style="margin-bottom: 20px;">
	                                            <div class="service-icon">
	                                               LR Details
	                                            </div>
	                                            <p class="description">
													<div class="row">
														<input type="hidden" name="LRCompany" value="<?= $_SESSION['LRCompany']; ?>">
														<div class="col-md-3">
															<div class="form-group">
																<label>Transport Service Type : <span class="text-danger">*</span></label>
																    <select name="TransportServiceType" data-placeholder="Select Transport Service Type" class="select" >
																	    <option value="">Select Transport Service Type</option>
																	    <option value="FTL">FTL</option>
																	    <option value="PTL">PTL</option>
																	    <option value="Road">BY ROAD </option>
																	    <option value="Train">BY TRAIN</option>
																	    <option value="Air">BY AIR</option>
																	    <option value="Sea">BY SEA</option>
															    	</select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>LR Type : <span class="text-danger">*</span></label>
																    <select name="LRType" id="LRType" data-placeholder="LR Type" class="select" >
																	    <option value=""></option>
																		<option value="Customer">Customer LR</option>
																		<option value="Our">Our LR</option>
															    	</select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Select Billing Party : <span class="text-danger">*</span></label>
																    <select name="PartyID" data-placeholder="Select Customer" class="select" onchange="FetchBillingCustomer(this.value)" >
																	    <option value=""></option>
																			<?php foreach ($BillingPartylistarray as $party) 
																			{?>
																				<option value="<?=$party->PartyID;?>"><?=$party->PartyName;?></option>
																			<?php } ?>
															    	</select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Select Customer (Project) Name: <span class="text-danger">*</span></label>
																    <select name="CustID" id="CustIDDetails" data-placeholder="Select Customer (Project)" class="select" onchange="FetchCustomerDetails(this.value)" >
																	</select>
															</div>
														</div>
													</div>

	                                            	<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>LR No. : <span class="text-danger">*</span></label>
																<input type="text" name="LRNo"  onkeyup="CheckLRExist(value)"  class="form-control" placeholder="Enter LR No." >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>LR Date : <span class="text-danger">*</span></label>
																<input type="text" name="LRDate" id="LRDate" class="form-control"  placeholder="Select LR Date" value="<?= date('d F, Y');?>" >
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Pickup Date : <span class="text-danger">*</span></label>
																<input type="text" name="PickupDate" id="PickupDate" class="form-control"  placeholder="Select Pickup Date" value="<?= date('d F, Y');?>" >
															</div>
														</div>


														<div class="col-md-3">
															<div class="form-group">
																<label>Actual Pickup Date : <span class="text-danger">*</span></label>
																<input type="text" name="LRDate" id="ActualPickupDate" class="form-control"  placeholder="Select Actual Pickup Date" value="<?= date('d F, Y');?>" >
															</div>
														</div>
												    </div>		

													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Expected Delivery Date : <span class="text-danger">*</span></label>
																<input type="text" name="ExpectDeliveryDate" id="ExpectedDeliveryDate" class="form-control" placeholder="Expected Delivery Date" >
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Consignor Name : <span class="text-danger">*</span></label>
																<select name="Consignor" data-placeholder="Select Consignor" class="select" >
															    	<option value=""></option>
																	<?php foreach ($debtorlistarray as $row4) 
																	{?>
																		<option value="<?=$row4->DebtorID;?>"><?=$row4->DebtorName;?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Consignee Name : <span class="text-danger">*</span></label>
																<select name="Consignee" data-placeholder="Select Consignee" class="select" >
															    	<option value=""></option>
																		<?php foreach ($debtorlistarray as $row5) 
																		{?>
																			<option value="<?=$row5->DebtorID;?>"><?=$row5->DebtorName;?></option>
																		<?php } ?>
																</select>
															</div>
														</div>		
														<div class="col-md-3">
															<div class="form-group">
																<label>Contract Type : <span class="text-danger">*</span></label>
																<input type="text" name="ContractType" id="ContractType" class="form-control" placeholder="Contract Type" readonly="">
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>LR From Branch : <span class="text-danger">*</span></label>
																<input type="text" name="LRFromBranch" id="LRFromBranch" class="form-control" placeholder="Contract Type" readonly="">
															</div>
														</div>
														<div class="col-md-9" id="dynamic_data">														  		
														    <div class="col-md-8">
																<div class="form-group">
																	<label>From To Location : <span class="text-danger">*</span></label>
																	<select name="FromToLocation" data-placeholder="From To Location" class="select" id="FromToLocation"  onchange="FetchFromToLocationCustomer(this.value)" >	
																   </select>
														   		</div>
														      </div>		
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Amount : <span class="text-danger">*</span></label>
																		<input type="text" name="RouteAmountdb" maxlength="10" class="form-control"  placeholder="Route Amount"  onkeypress="return isNumber(event)" >
																	</div>
																</div>	
													   </div>

														<div class="col-md-8" id="manually_data"  style="display: none;">
															 <div class="row">	
																<div class="col-md-4">
																	<div class="form-group">
																		<label>From Location : <span class="text-danger">*</span></label>
																		<input type="text" name="FromLocation" id="FromLocation" class="form-control"  placeholder="From Location"  maxlength="100">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>TO Location : <span class="text-danger">*</span></label>
																		<input type="text" name="ToLocation" id="ToLocation" class="form-control"  placeholder="To Location">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Amount : <span class="text-danger">*</span></label>
																		<input type="text" name="RouteAmount" id="RouteAmount" maxlength="10" class="form-control"  placeholder="Route Amount"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
															</div>	
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Product Weight :<span class="text-danger">*</span></label>
																<input type="text" name="ProductWeight" class="form-control" placeholder="Weight" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Chargeable Weight : <span class="text-danger">*</span></label>
																<input type="text" name="ChargeableWeight" class="form-control" placeholder="No. of Packages" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>No. of Packages : <span class="text-danger">*</span></label>
																<input type="text" name="NoOfPackage" class="form-control" placeholder="No Of Package" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Value of Goods :</label>
																<input type="text" name="valueofgoods" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Eway Bill No :</label>
																<input type="text" name="EventBillNo" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Goods Insurance Details :<span class="text-danger">*</span></label>
																<input type="text" name="InsuranceDetails" class="form-control" placeholder="Insurance Details" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label> Remarks : <span class="text-danger">*</span></label>
																<textarea class="form-control" name="LRRemarks" rows="1"></textarea>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Tender No :<span class="text-danger">*</span></label>
																<input type="text" name="TenderNo" class="form-control" placeholder="Weight" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Tender Date : <span class="text-danger">*</span></label>
																<input type="text" name="TenderDate" class="form-control" placeholder="No. of Packages" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Invoice No. : <span class="text-danger">*</span></label>
																<input type="text" name="InvoiceNo" class="form-control" placeholder="Customer Invoice No." >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Invoice Date :</label>
																<input type="text" name="InvoiceDate" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-2">
															<div class="form-group">
																<label>PO No. :<span class="text-danger">*</span></label>
																<input type="text" name="PONo" class="form-control" placeholder="Weight" >
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>PO Date : <span class="text-danger">*</span></label>
																<input type="text" name="PODate" class="form-control" placeholder="No. of Packages" >
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Challan No : <span class="text-danger">*</span></label>
																<input type="text" name="ChallanNo" class="form-control" placeholder="Customer Invoice No." >
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Challan Date :</label>
																<input type="text" name="ChallanDate" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Indent No :</label>
																<input type="text" name="IndentNo" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Indent Date :</label>
																<input type="text" name="IndentDate" class="form-control" placeholder="Eway Bill No.">
															</div>
														</div>
													</div>


                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="form-control" name="spec_name[]">
                                                                <option value=""> Select Specification</option>
                                                                <?php foreach ($Specificationlistarray as  $value){?>
                                                                
                                                                <option value="<?= $value->spec_name;?>"><?=  $value->spec_name; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input class="form-control" name="spec_value[]" placeholder="Enter value" type="text">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
	                                            <div class="row">
	                                              <div class="col-md-12">	
	                                            	<div id="education_fields"></div>
	                                              </div> 	
	                                            </div>
	                                            </p>
	                                        </div>
									</fieldset>


									<!---------------------------- SEQUENCE 2-------------------------------------------------- -->

							        <fieldset title="2">
									  <legend class="text-semibold">Sequence 2</legend>
									  <hr style="margin-top: 10px;margin-bottom: 20px;" />
	                                   <div class="serviceBox"  style="margin-bottom: 20px;">
	                                        <div class="service-icon">
	                                          LR Charges 
	                                        </div>
	                                        <p class="description">
											    <div class="row">
				  								    <div class="col-md-3">
														<div class="form-group">
															<label>Vehicle Type :</label>
															<select name="VehicleType" id="VehicleType" data-placeholder="Select Vehicle Type" class="select"  onchange="show_status(this.value);" >	
																<option value="">Select Vehicle Type</option>
																<option value="Own">Own Vehicle</option>
																<option value="Market">Outside (Market) Vehicle</option>
														   </select>
														</div>
													</div>										

													<div class="col-md-3">
														<div class="form-group" style="margin-bottom: 5px;">
															<label>Vehicle No. :</label>
															<div id="VehicleNoselect">
																<select name="VehicleNoselect" id="VehicleNoMaster"  class="form-control">	
																  
																</select>
															 </div> 
															<input type="text" name="VehicleNoenter" id="VehicleNoenter" class="form-control"  placeholder="Enter Market Vehicle No." style="display:none !important;">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Driver Name :</label>
														   <input type="text" id="DriverID" name="DriverID" id="DriverID"  list="allNames5" class='form-control'  placeholder="Select / Enter Driver Name"/>
															<datalist id="allNames5">
							 	                             <?php
															 	foreach ($driverlistarray as  $rows33) 
															 	{
														         ?>
														    		<option value="<?php echo $rows33->DriverName?>" data-xyz5="<?php echo $rows33->DriverName?>">
														    			<?php echo $rows33->DriverName?>
														    		</option>
															  	<?php } ?>  
															</datalist>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group" style="margin-bottom: 5px;">
															<label>Driver Mobile No. :</label>
															<input type="text" name="DriverMobile" id="DriverMobile" class="form-control"  onkeypress="return isNumber(event)" placeholder="Driver Mobile No."  maxlength="10">
														</div>
													</div>
										    	</div>

										    	 <div class="row">
										    	 	<div class="col-md-6">
										    	 		<legend class="text-semibold"><i class="icon-reading position-left"></i> Customer</legend>
										    	 		 <div class="row">
		                                                    <div class="col-md-6">
		                                                        <div class="form-group">
		                                                            <select class="form-control" name="cust_head_title[]">
		                                                                <option value=""> Select Expense Head</option>
		                                                                <?php foreach ($ExpenseHeadlistarray as  $value){?>
		                                                                
		                                                                <option value="<?= $value->head_title;?>"><?=  $value->head_title; ?></option>
		                                                            <?php } ?>
		                                                            </select>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-md-4 ">
		                                                        <div class="form-group">
		                                                            <div class="input-group">
		                                                                <input class="form-control" name="cust_head__value[]" placeholder="Enter value" type="text">
		                                                                <div class="input-group-btn">
		                                                                    <button class="btn btn-success" type="button" onclick="cust_education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                    </div>
	                                                    </div> 
			                                            <div class="row">
			                                              <div class="col-md-12">	
			                                            	<div id="cust_education_fields"></div>
			                                              </div> 	
			                                            </div>
										    	 	</div>
										    	 	<div class="col-md-6" style="display: none;" id="Vendor_ouside_view">
										    	 		<legend class="text-semibold"><i class="icon-truck position-left"></i> Vendor</legend>

										    	 		 <div class="row">
		                                                    <div class="col-md-6">
		                                                        <div class="form-group">
		                                                            <select class="form-control" name="vendor_head_title[]">
		                                                                <option value=""> Select Expense Head</option>
		                                                                <?php foreach ($ExpenseHeadlistarray as  $value){?>
		                                                                
		                                                                <option value="<?= $value->head_title;?>"><?=  $value->head_title; ?></option>
		                                                            <?php } ?>
		                                                            </select>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-md-4 ">
		                                                        <div class="form-group">
		                                                            <div class="input-group">
		                                                                <input class="form-control" name="vendor_head__value[]" placeholder="Enter value" type="text">
		                                                                <div class="input-group-btn">
		                                                                    <button class="btn btn-success" type="button" onclick="vendor_education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                    </div>
	                                                    </div>
			                                            <div class="row">
			                                              <div class="col-md-12">	
			                                            	<div id="vendor_education_fields"></div>
			                                              </div> 	
			                                            </div>
										    	 	</div>
										    	 </div> 
										    	 <br/>

											    <div class="row">
													<div class="col-md-4">
														<div class="form-group" >
															<label>Appox Receivable. :</label>
															<input type="text" name="AppoxReceivable" id="AppoxReceivable" class="form-control" readonly="" >
														</div>
													</div>							

													<div class="col-md-4">
														<div class="form-group" >
															<label>Appox Payable :</label>
															<input type="text" name="AppoxPayable" id="AppoxPayable" class="form-control"  readonly="" >
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group" >
															<label>Appox Profit. :</label>
															<input type="text" name="AppoxProfit" id="AppoxProfit" class="form-control" readonly=""  >
														</div>
													</div>
											   </div>		
	                                        </p>    	
	                                    </div>    
									</fieldset>
									<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
								    <span id="preview"></span>
								 </form>
				               </div>
			               <!-- /wizard with validation -->
			               <span id="query"></span>
                           </div>   
                         </div> 
					   </div>
					</div>
					<!-- /main content -->
				</div>
				<!-- /page content -->
			</div>
	<!-- /page container -->




</body>


<script type="text/javascript">
    var room = 1;
    function education_fields() 
    {
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="row"> <div class="col-md-3"><div class="form-group"> <select class="form-control"  name="spec_name[]"><option value=""> Select Specification</option><?php foreach ($Specificationlistarray as  $value){?><option value="<?= $value->spec_name?>"><?= $value->spec_name?></option><?php } ?></select> </div></div><div class="col-md-3 nopadding"><div class="form-group"><div class="input-group"> <input class="form-control" name="spec_value[]" placeholder="Enter Specification" type="text" >  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';
        objTo.appendChild(divtest)
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

<script type="text/javascript">
    var cust_room = 1;
    function cust_education_fields() 
    {
    	// alert(cust_room);
        cust_room++;
        var objTo = document.getElementById('cust_education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + cust_room);
        var rdiv = 'removeclass' + cust_room;
        divtest.innerHTML = '<div class="row"> <div class="col-md-6"><div class="form-group"> <select class="form-control"  name="cust_head_title[]"><option value=""> Select Specification</option><?php foreach ($ExpenseHeadlistarray as  $value){?><option value="<?= $value->head_title?>"><?= $value->head_title?></option><?php } ?></select> </div></div><div class="col-md-4"><div class="form-group"><div class="input-group"> <input class="form-control" name="cust_head_title[]" placeholder="Enter Value" type="text" >  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="cust_remove_education_fields(' + cust_room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div></div>';
        objTo.appendChild(divtest)
    }

    function cust_remove_education_fields(rid)
     {
        $('.removeclass' + rid).remove();
    }
</script>



<script type="text/javascript">
    var vendor_room = 1;
    function vendor_education_fields() 
    {
    	// alert(cust_room);
        vendor_room++;
        var objTo = document.getElementById('vendor_education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + vendor_room);
        var rdiv = 'removeclass' + vendor_room;
        divtest.innerHTML = '<div class="row"> <div class="col-md-6"><div class="form-group"> <select class="form-control"  name="cust_head_title[]"><option value=""> Select Specification</option><?php foreach ($ExpenseHeadlistarray as  $value){?><option value="<?= $value->head_title?>"><?= $value->head_title?></option><?php } ?></select> </div></div><div class="col-md-4"><div class="form-group"><div class="input-group"> <input class="form-control" name="cust_head_title[]" placeholder="Enter Value" type="text" >  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="vendor_remove_education_fields(' + vendor_room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div></div>';
        objTo.appendChild(divtest)
    }

    function vendor_remove_education_fields(rid)
    {
        $('.removeclass' + rid).remove();
    }
</script>




<script type="text/javascript">
	
  $(function() 
	{
	    $("#DriverID").on('input',function ()
	    {
            var val3 = $('#DriverID').val()
	        var xyz3 = $('#allNames5 option').filter(function() {
	            return this.value == val3;
	        }).data('xyz5');
	        var msg3 = xyz3 ? '' + xyz3 : '';
	        // alert(msg);
	        if(msg3 != '')
	        {
				var datastring='DriverName='+msg3;
				// alert(datastring);
		        $.ajax({
		            url: "<?php echo base_url('Drivers/GetContactNo');?>",
		            type: "POST",
		            data:  datastring,
		            success: function(data)
		              {              
		                 var contact=$.trim(data);  
		                 $("#DriverMobile").val(contact);        
		              },
		            error: function()
		              {
		                alert('fail');
		              }
		           });
	        }
	        else
	        {
	        	$("#DriverMobile").val('');        
	        }
	    }); 
	})
</script>

<script type="text/javascript">

function show_status(value)
{
	 if(value=='Attached' || value=='Own')  
	 {
	 	$("#VehicleNoselect").show(); 
	 	$("#VehicleNoenter").hide(); 
	 	show_vehicleno();
	 	$("#Vendor_ouside_view").hide(); 
	 }
	 else
	 {
	 	$("#VehicleNoselect").hide(); 
	 	$("#VehicleNoenter").show(); 

	 	$("#Vendor_ouside_view").show(); 

	 } 
}

  function show_vehicleno(ModelID)
	{
        $.ajax({
            url: "<?php echo base_url('LRData/GetVehicleNo');?>",
            type: "POST",
            data:  '',
            success: function(data)
              {                          
              	// alert(data);	
                $("#VehicleNoMaster").html(data);        
              },
            error: function()
              {
                alert('fail');
              }
           });
	}


  function FetchBillingCustomer(PartyID)
	{
		var datastring='PartyID='+PartyID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('LRData/FetchBillingCustomer');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	$("#CustIDDetails").html(data); 
              },
            error: function()
              {
                alert('fail');
              }
           });
	}

  function FetchCustomerDetails(CustID)
	{
		var datastring='CustID='+CustID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('Customer/FetchCustomerDetails');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	 var ContractType=$.trim(data);
              	 //alert(ContractType);	
                 $("#ContractType").val(ContractType);  
                 if(ContractType=='Contractual')  
                 {
                 	$("#manually_data").hide(); 
                 	$("#dynamic_data").show(); 
                 	CustomerRouteDetails(CustID);  

                 	$('#LoadingAsPerAgreement').prop('disabled', false);
                 	$('#UnionAsPerAgreement').prop('disabled', false);
                 	$('#DeliveryAsPerAgreement').prop('disabled', false);
                 	$('#DetentionAsPerAgreement').prop('disabled', false);
                 }
                 else
                 {
                 	$("#dynamic_data").hide(); 
                 	$("#manually_data").show(); 

                 	$('#LoadingAsPerAgreement').prop('disabled', true);
                 	$('#UnionAsPerAgreement').prop('disabled', true);
                 	$('#DeliveryAsPerAgreement').prop('disabled', true);
                 	$('#DetentionAsPerAgreement').prop('disabled', true);
                 }        
              },
            error: function()
              {
                alert('fail');
              }
           });
	}

  function CustomerRouteDetails(CustID)
	{
		var datastring='CustID='+CustID;
		// alert(datastring); 
        $.ajax({
            url: "<?php echo base_url('Customer/CustomerRouteDetails');?>",
            type: "POST",
            data:  datastring,
            success: function(response)
              {   
                $("#FromToLocation").html(response);             
              },
            error: function()
              {
                alert('fail');
              }
           });
	}

  function CheckLRExist(LRNo)
	{
		
		// alert(LRNo); 
		var datastring='LRNo='+LRNo;
		// alert(datastring); 
        $.ajax({
            url: "<?php echo base_url('LRData/CheckLRExist');?>",
            type: "POST",
            data:  datastring,
            success: function(response)
              {   
              	
              	var res=$.trim(response);
              	// alert(res);
              	if(res>0)
              	{
              		PNotify.removeAll();
	                new PNotify({
					            text: 'LR No. already exist. Provide another LR No.',
								icon: 'glyphicon glyphicon-ok-circle',
					            addclass: 'bg-danger'
					        }); 
	                $(".stepy-finish").hide();           
              	}
              	else
              	{
              		$(".stepy-finish").show();   
              	}       
              },
            error: function()
              {
                alert('fail');
              }
           });
	}

  function FetchFromToLocationCustomer(RouteID)
	{
		var datastring='RouteID='+RouteID;
		// alert(datastring); 
        $.ajax({
            url: "<?php echo base_url('Customer/FetchFromToLocationCustomer');?>",
            type: "POST",
            data:  datastring,
            success: function(response)
              {   
				var res=$.trim(response);
				var obj = JSON.parse(res);
				var FromLocation=obj.FromLocation;
				var ToLocation=obj.ToLocation;
				var Amount=obj.Amount;
				// alert(ToLocation);
				$("#FromLocation").val(FromLocation);  
				$("#ToLocation").val(ToLocation);  
				$("#RouteAmount").val(Amount);  
              },
            error: function()
              {
                alert('fail');
              }
           });
	}
</script>

 <script type="text/javascript">
	$(document).ready(function() {
	    $('#CostDetailsForm').bootstrapValidator({
	        message: 'This value is not valid',
	        fields: {
	            TripCost: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Trip Cost required'
	                    }
	                }
	            },
	            DriverID: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Driver is required'
	                    }
	                }
	            },
	            DriverMobile: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Driver is required'
	                    }
	                }
	            },
	            ModelID: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Vehicle Model is required'
	                    }
	                }
	            },

	            VendorID: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Vendor is required'
	                    }
	                }
	            },
	            VehicleType: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Vehicle Type required'
	                    }
	                }
	            }
	       }
	    });
	});
</script>

 <script type="text/javascript">
	$(document).ready(function (e)
	   {
	     $("#CostDetailsForm").on('submit',(function(e)
	         {
	           //e.preventDefault();
	           if (e.isDefaultPrevented())
	            {
	              //  alert('invalid');
	             }
	            else
	                {
	                	var TripsheetNo=$("#trip_no").val();
	                	var TripsheetNo=$("#trip_no").val();
	                	var TripCost=$("#TripCost").val();
	                	var DriverID=$("#DriverID").val();
	                	var DriverMobile=$("#DriverMobile").val();
	                	var VendorID=$("#VendorID").val();
	                	var VehicleType=$("#VehicleType").val();
	                	var VehicleNoenter=$("#VehicleNoenter").val();
	                	var VehicleNoMaster=$("#VehicleNoMaster").val();
	                	var ModelID=$("#ModelID").val();
	                	var DriverMobile=$("#DriverMobile").val();               	
	                	var TripsheetFromLocation=$("#TripsheetFromLocation").val();
	                	var TripsheetToLocation=$("#TripsheetToLocation").val();    
	                	var TripsheetNo=$.trim(TripsheetNo);   
	                	var datastring='TripsheetNo='+TripsheetNo+'&TripCost='+TripCost+'&DriverID='+DriverID+'&DriverMobile='+DriverMobile+'&VehicleType='+VehicleType+'&VendorID='+VendorID+'&VehicleNoMaster='+VehicleNoMaster+'&VehicleNoenter='+VehicleNoenter+'&ModelID='+ModelID+'&DriverMobile='+DriverMobile+'&TripsheetFromLocation='+TripsheetFromLocation+'&TripsheetToLocation='+TripsheetToLocation;
	                	// alert(datastring);	

				        $.ajax({
				            url: "<?php echo base_url('LRData/InsertTripshhetCost');?>",
				            type: "POST",
				            data:  datastring,
				            success: function(data)
				              {                          
				              	// alert(data);	
				              	var TripsheetType=$("#TripsheetType").val();
                                if(TripsheetType=='Single')
                                {
                                    new PNotify({
									            text: 'LR Details Added Successfully',
												icon: 'glyphicon glyphicon-ok-circle',
									            addclass: 'bg-success'
									        });
									setTimeout(function()
                                     {
                                         window.location="<?php echo base_url('ViewLR')?>";
                                     }, 2000);
                                }
                                else
                                {
                                  $('#CostDetails').modal('hide');
					              $("#myModal").modal({backdrop: "static"});
                                }			              	
				              },
				            error: function()
				              {
				                alert('fail');
				              }
				           });
	                }
					return false;
	        }));
	    });
</script>

 <script type="text/javascript">
	$(document).ready(function (e)
	   {
	     $("#defaultForm").on('submit',(function(e)
	         {
	           //e.preventDefault();
	           if (e.isDefaultPrevented())
	            {
	              //  alert('invalid');
	             }
	            else
	                 {

	                 	var TripsheetType=$("#TripsheetType").val();
                        $("#preview").html('<img src="<?= base_url() ?>assets/images/ajax-loader.gif" style="height:30px;width:30px;" />');
	                 	 //
	                      $.ajax({
	                        url: "<?php echo base_url('LRData/InsertData');?>",
	                        type: "POST",
	                        data:  new FormData(this),
	                        contentType: false,
	                        cache: false,
	                        processData:false,
	                        success: function(TripsheetNo)
	                          {
	                          	    $("#preview").hide();
					              	PNotify.removeAll();
					              	var lrcount=$.trim(TripsheetNo);  
					              	// alert(count); 
					              	if(lrcount=='exist')
					              	{
				                         new PNotify({
				                                 	delay: 6000,
										            text: 'LR No. Exist. Please Enter Another LR No.',
													icon: 'glyphicon glyphicon-ok-circle',
										            addclass: 'bg-danger'
										        });
					              	}
					              	else
					              	{
								      	var TripsheetNo=$.trim(TripsheetNo);  
										var datastring='TripsheetNo='+TripsheetNo;
										// alert(datastring);
								        $.ajax({
								            url: "<?php echo base_url('LRData/TripsheetCostDetails');?>",
								            type: "POST",
								            data:  datastring,
								            success: function(response)
								              {
								              	PNotify.removeAll();
								              	var count=$.trim(response);  
								              	// alert(count); 
								                if(count==0)
								              	{
							                         new PNotify({
							                                 	delay: 6000,
													            text: 'LR Created Successfully. Please Enter Tripsheet Details and Continue',
																icon: 'glyphicon glyphicon-ok-circle',
													            addclass: 'bg-primary'
													        });

								                      $("#trip_no").val(TripsheetNo);
										              $("#CostDetails").modal({backdrop: "static"});
								              	}  
								              	else 
								              	{
								                    if(TripsheetType=='Single')
								                    {
								                       new PNotify({
														            text: 'LR Details Added Successfully',
																	icon: 'glyphicon glyphicon-ok-circle',
														            addclass: 'bg-success'
														        });
														setTimeout(function()
								                         {
								                             window.location="<?php echo base_url('ViewLR')?>";
								                         }, 2000);
								                    }
								                    else
								                    {
								                      $("#trip_no").val(TripsheetNo);
										              $("#myModal").modal({backdrop: "static"});
								                    }
								              	}                     
								              },
								            error: function()
								              {
								                alert('fail');
								              }
								           });
					              	}
	                           },
	                        error: function()
	                          {
	                            alert('fail');
	                          }
	                       });
	                }
					return false;
	        }));
	    });
</script>

<script type="text/javascript">

$( document ).ready(function() 
{
    $(".showchargesdata").hide();
});

function CreateLRContinue()
{
  var trip_no=$("#trip_no").val();
  window.location="<?php echo base_url('LRData')?>?trip_no="+trip_no;
}

function show_cash_advance_data(value)
{
	if(value=='Paid')
	{
         document.getElementById('CashAdvancePaidAmount').readOnly = false;
	}
	else
	{
		$("#CashAdvancePaidAmount").val('');
		document.getElementById('CashAdvancePaidAmount').readOnly = true;
	}
}


function show_diesel_advance_data(value)
{
	if(value=='Paid')
	{
         document.getElementById('DieselPaidAmount').readOnly = false;
	}
	else
	{
		$("#DieselPaidAmount").val('');
		document.getElementById('DieselPaidAmount').readOnly = true;
	}
}

function show_data(permit)
{
	if(permit=='Yes')
	{
		$(".showchargesdata").show();
	}
	else
	{
		$(".showchargesdata").hide();
	}
}

function show_loading_data(value)
{
	if(value=='Agreement')
	{	
		document.getElementById('LoadingCost').readOnly = true;
		var RouteID=$("#FromToLocation").val();
		// alert(RouteID);
		var datastring='RouteID='+RouteID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('LRData/GetLoadingCharges');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	$("#LoadingCost").val(data);
              },
            error: function()
              {
                alert('fail');
              }
           });
	}
	else
	{
		document.getElementById('LoadingCost').readOnly = false;
	}
}

function show_union_data(value)
{
	if(value=='Agreement')
	{
		// $("#UnionCost").val('');
		document.getElementById('UnionCost').readOnly = true;
		var RouteID=$("#FromToLocation").val();
		// alert(RouteID);
		var datastring='RouteID='+RouteID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('LRData/GetUnionCharges');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	$("#UnionCost").val(data);
              },
            error: function()
              {
                alert('fail');
              }
           });
	}
	else
	{
		document.getElementById('UnionCost').readOnly = false;
	}
}

function show_extra_delivery_data(value)
{
	if(value=='Agreement')
	{
		// $("#DeliveryCost").val('');
		document.getElementById('DeliveryCost').readOnly = true;
		var RouteID=$("#FromToLocation").val();
		// alert(RouteID);
		var datastring='RouteID='+RouteID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('LRData/GetDeliveryCharges');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	$("#DeliveryCost").val(data);
              },
            error: function()
              {
                alert('fail');
              }
           });

	}
	else
	{
		document.getElementById('DeliveryCost').readOnly = false;
	}
}

function show_detention_data(value)
{
	if(value=='Agreement')
	{
		// $("#DetentionCost").val('');
		document.getElementById('DetentionCost').readOnly = true;
		var RouteID=$("#FromToLocation").val();
		// alert(RouteID);
		var datastring='RouteID='+RouteID;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('LRData/GetDetentionCharges');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {                          
              	// alert(data);	
              	$("#DetentionCost").val(data);
              },
            error: function()
              {
                alert('fail');
              }
           });

	}
	else
	{
		document.getElementById('DetentionCost').readOnly = false;
	}
}

</script>

<script type="text/javascript">
  function FetchVehicleDetails(VehicleID)
	{
		var datastring='VehicleID='+VehicleID;
		// alert(datastring); 

        $.ajax({
            url: "<?php echo base_url('Customer/FetchVehicleDetails');?>",
            type: "POST",
            data:  datastring,
            success: function(data)
              {   
              	var VehicleType=$.trim(data);
                $("#VehicleType").val(VehicleType);             
              },
            error: function()
              {
                alert('fail');
              }
           });
	}

</script>


<script type="text/javascript">
    $(function () 
    {
        $('#LRDate').datetimepicker({format: 'DD MMMM, YYYY'});
        $('#ExpectedDeliveryDate').datetimepicker({format: 'DD MMMM, YYYY'});       
    });
</script>


 <script type="text/javascript">

	function ChangeLRCompany() 
	{
		// alert();
	   $("#CompanyPopup").modal('show');        
	}

	$(document).ready(function() {
	    $('#CompanyPopupForm').bootstrapValidator({
	        message: 'This value is not valid',
	        fields: {
	            LRCompany: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Select LR Company'
	                    }
	                }
	            }
	       }
	    });
	});
</script>

 <script type="text/javascript">
		$(document).ready(function (e)
		   {
		     $("#CompanyPopupForm").on('submit',(function(e)
		         {
		           //e.preventDefault();
		           if (e.isDefaultPrevented())
		            {
		              //  alert('invalid');
		              }
		            else
		                 {

                             $("#preview121").html('<img src="<?= base_url() ?>assets/images/ajax-loader.gif" style="height:30px;width:30px;" />');
		                 	 // alert();
		                      $.ajax({
		                        url: "<?php echo base_url('Dashboard/SetLRCompany');?>",
		                        type: "POST",
		                        data:  new FormData(this),
		                        contentType: false,
		                        cache: false,
		                        processData:false,
		                        success: function(data)
		                          {
	                                   $("#preview121").hide();
	                                   // alert(data);	 
	                                   new PNotify({
									            text: 'LR Company Details Updated  Successfully',
												icon: 'glyphicon glyphicon-ok-circle',
									            addclass: 'bg-success'
									        });
										setTimeout(function()
	                                     {
	                                     	location.reload(true);	                                          
	                                     }, 2000);
		                           },
		                        error: function()
		                          {
		                            alert('fail');
		                          }
		                       });
		                }
						return false;
		        }));
		    });
	</script>



</html>
