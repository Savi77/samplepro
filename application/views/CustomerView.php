
<!DOCTYPE html>
<html lang="en">
<head>
   <?php 
      $this->load->view('includes/head_script');
   ?>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap_validator/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/datatables_responsive.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->
	<style type="text/css">
	  .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu 
		{
		    top: auto;
		    bottom: -4px !important;
		}
		legend
		 {
		    padding-bottom: 10px !important;
		    margin-bottom: 5px !important;
		 }
		.dropdown-menu > li > a
		 {
		    padding: 5px 12px!important;
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
      $this->load->view('includes/header');
      $this->load->view('includes/menubar');
   ?>

	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Customer</span> - List</h4>
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('Customer') ?>">Customer  / Vendor</a></li>
					<li class="active">List</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="page-container">
		<div class="page-content">
			<div class="content-wrapper">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Customer  / Vendor List</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								  <li>
									<span class="label label-flat border-primary text-primary-600 label-icon">
									   <a data-toggle="modal"  data-backdrop="static"  data-target="#add_branch" data-popup="tooltip" title="" data-placement="left" data-original-title="Add New Customer">
									   	<i class="icon icon-users4"></i>
									      Add New Customer  / Vendor
									   </a>
								     </span>
								  </li>
							</ul>
          	           </div>
					</div>
					<table class="table datatable-responsive">
				  	   <thead>
							<tr>
								<th>#</th>
								<th>Customer  / Vendor Name</th>
								<th>Head office Address</th>
								<th>UnitAddress</th>
								<th>Person Name</th>
								<th>Person Contact</th>
								<th>Person Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						    $count = 1;
						 	foreach ($listarray as  $row) 
						 	{
						 ?>
							<tr>
								<td><?php echo $count;?></td>
								<td><?php echo $row->CustomerName;?></td>
								<td><?php echo $row->HeadofficeAddress;?></td>
 							    <td><?php echo $row->UnitAddress;?></td>
								<td><?php echo $row->PersonName1;?></td>
								<td><?php echo $row->Contact1;?></td>
								<td><?php echo $row->Email1;?></td>

								<td class="text-left">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">


                                             <li>
                                             	<a onclick="edit_customer(this.id)" id="<?= $row->CustID;?>"   data-popup="tooltip" title="" data-original-title="Edit" data-placement="left">
                                             		<i class="icon-pencil"></i>Edit Details
                                             	</a>
                                            </li>

                                             <li>
                                             	<a onclick="UpdateRouteDetails(this.id)" id="<?= $row->CustID;?>"   data-popup="tooltip" title="" data-original-title="Update Route Details" data-placement="left">
                                             		<i class="icon-map"></i>Update Route Details
                                             	</a>
                                            </li>

                                             <li>
                                             	<a onclick="delete_customer(this.id)" id="<?= $row->CustID;?>"   data-popup="tooltip" title="" data-original-title="Delete"  data-placement="left">
                                             		<i class="icon-trash"></i>Delete Details
                                             	</a>
                                             </li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php $count++; } ?>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
		<!-- Footer -->
		<div class="footer text-white">
			&copy; 2018. <a href="#" class="text-white">Anvita Logistics</a>
		</div>
		<!-- /footer -->
	</div>
	<!-- /page container -->
	

	<!-- Modal -->
		<div class="modal fade" id="add_branch" role="dialog" style="margin-top:20px;">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
			          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
			          <h5 class="modal-title" style="margin-top: -4px" >
			          	<i class="icon icon-users4" style="zoom:1.1; "></i>&nbsp;&nbsp;Add New Customer / Vendor
			          </h5>
				    </div>
					<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						  <div class="row">
								<!-- Fieldset legend -->
								<div class="row">
									<div class="col-md-12">
										<form id="defaultForm" method="post">
											<div class="panel panel-flat">
												<div class="panel-body">
													<!--  -->
													<fieldset>
													  <div class="row">	
													  	<div class="col-md-4">
								                			<div class="form-group">
																<label>Billing Party Name :<span class="text-danger">*</span>	</label>
																<select name="PartyID" data-placeholder="Billing Party Name" class="select">
																	   <option value=""></option>
																		<?php foreach ($BillingPartylistarray as $row5) 
																		{?>
																			<option value="<?=$row5->PartyID;?>"><?=$row5->PartyName;?></option>
																		<?php } ?>
																</select>
								                			</div>
								                		</div>

													  	<div class="col-md-4">
								                			<div class="form-group">
																<label>Customer  / Vendor Name :<span class="text-danger">*</span></label>
							                                    <input type="text" name="CustomerName" id="CustomerName" class="form-control"  maxlength="150">
								                			</div>
								                		</div>	
							                			<div class="col-md-4">
															<div class="form-group">
																<label>Contract Type : <span class="text-danger">*</span></label>
																<select name="ContractType" data-placeholder="Contract Type" class="select">
																	<option value=""></option>
																	<option value="Contractual">Contractual</option>
																	<option value="Regular">Regular</option>
																</select>
															</div>
														</div>	
													  </div>

												    </fieldset>		
													<!--  -->
													 <fieldset>
														<div class="collapse in" id="demo1">
                                                         <div class="row">
													       <div class="col-md-4">	
																<div class="form-group">
																	<label>Head Office Address :<span class="text-danger">*</span></label>
																	<textarea class="form-control" name="HeadofficeAddress"  rows="1"></textarea>
																</div>
															</div>
															 <div class="col-md-4">	
																<div class="form-group">
																	<label>Operational Unit Address :<span class="text-danger">*</span></label>
																	<textarea class="form-control" name="UnitAddress" rows="1"></textarea>
																</div>
															</div>
														     <div class="col-md-4">	
																<div class="form-group">
																	<label>GST No. :</label>
																	<input type="text" name="GSTNo" id="GSTNo" class="form-control"  maxlength="20">
																</div>
															</div>

															</div>
														</div>
													</fieldset>
													<!--  -->
													
													 <fieldset>
														<legend class="text-semibold">
															<i class="icon-user position-left"></i>
															1st Point Contact
															<a class="control-arrow" data-toggle="collapse" data-target="#demo2">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo2">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :<span class="text-danger">*</span></label>
																		<input type="text" name="PersonName1" id="PersonName1" class="form-control"  maxlength="60">
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :<span class="text-danger">*</span></label>
																		<input type="text" name="Contact1" id="Contact1" class="form-control"  maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :</label>
																		<input type="text" name="Email1" id="Email1" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->
													 <fieldset>
														<legend class="text-semibold">
															<i class=" icon-users position-left"></i>
															2nd Point Contact
															<a class="control-arrow" data-toggle="collapse" data-target="#demo3">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo3">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :</label>
																		<input type="text" name="PersonName2" id="PersonName2" class="form-control"  maxlength="60">
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :</label>
																		<input type="text" name="Contact2" id="Contact2" class="form-control"  maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :</label>
																		<input type="text" name="Email2" id="Email2" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->

													 <fieldset>
														<legend class="text-semibold">
															<i class=" icon-design position-left"></i>
															Contract Signing Authority
															<a class="control-arrow" data-toggle="collapse" data-target="#demo4">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo4">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :<span class="text-danger">*</span></label>
																		<input type="text" name="SigningPersonName" id="SigningPersonName" class="form-control"  maxlength="60">
																		
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :<span class="text-danger">*</span></label>
																		<input type="text" name="SigningPersonContact" id="SigningPersonContact" class="form-control"  maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :</label>
																		<input type="text" name="SigningPersonEmail" id="SigningPersonEmail" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->

													 <fieldset>
														<legend class="text-semibold">
															<i class="icon-drawer3 position-left"></i>
															Bill Verifying Authority
															<a class="control-arrow" data-toggle="collapse" data-target="#demo5">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo5">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :</label>
																		<input type="text" name="VerifyingPersonName" id="VerifyingPersonName" class="form-control"  maxlength="60">
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :</label>
																		<input type="text" name="VerifyingPersonContact" id="VerifyingPersonContact" class="form-control" maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :</label>
																		<input type="text" name="VerifyingPersonEmail" id="VerifyingPersonEmail" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->

													 <fieldset>
														<legend class="text-semibold">
															<i class=" icon-percent position-left"></i>
															Payment Enquiry Person
															<a class="control-arrow" data-toggle="collapse" data-target="#demo6">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo6">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :</label>
																		<input type="text" name="EnquiryPersonName" id="EnquiryPersonName" class="form-control"  maxlength="60">
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :</label>
																		<input type="text" name="EnquiryPersonContact" id="EnquiryPersonContact" class="form-control" maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :</label>
																		<input type="text" name="EnquiryPersonEmail" id="VerifyingPersonEmail" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->


													 <fieldset>
														<legend class="text-semibold">
															<i class=" icon-truck position-left"></i>
															Shipment Information
															<a class="control-arrow" data-toggle="collapse" data-target="#demo7">
																<i class="icon-circle-down2"></i>
															</a>
														</legend>
														<div class="collapse in" id="demo7">
                                                           <div class="row">
														       <div class="col-md-4">	
																	<div class="form-group">
																		<label>Person Name :<span class="text-danger">*</span></label>
																		<input type="text" name="ShipmentPersonName" id="ShipmentPersonName" class="form-control"  maxlength="60">
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Contact No. :</label>
																		<input type="text" name="ShipmentPersonContact" id="ShipmentPersonContact" class="form-control" maxlength="10"  onkeypress="return isNumber(event)" >
																	</div>
																</div>
																 <div class="col-md-4">	
																	<div class="form-group">
																		<label>Email :<span class="text-danger">*</span></label>
																		<input type="text" name="ShipmentPersonEmail" id="ShipmentPersonEmail" class="form-control"  maxlength="40">
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
													<!--  -->

													 <fieldset>
                                                        <div class="row">
													       <div class="col-md-6">	
																<div class="form-group">
																	<label>Payment Terms :<span class="text-danger">*</span></label>
																	<input type="text" name="PaymentTerms" id="PaymentTerms" class="form-control"  maxlength="60">
																</div>
															</div>
															 <div class="col-md-6">	
																<div class="form-group">
																	<label>Credit Period :<span class="text-danger">*</span></label>
																	<input type="text" name="CreditPeriod" id="CreditPeriod" class="form-control"  maxlength="2"  onkeypress="return isNumber(event)" >			
																</div>
															</div>
														</div>
													</fieldset>

													<div class="text-right">
														<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
													</div>
												</div>
											</div>
										</form>
										<!-- /a legend -->
									</div>
								</div>
								<!-- /fieldset legend -->
							</div>
						</div>
				</div>
			</div>
		</div>
<!--  -->

<!--  edit modal -->
		<div class="modal fade" id="edit_debtordetail" role="dialog" style="margin-top:20px;"> 
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
						<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
				          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
				          <h5 class="modal-title" style="margin-top: -4px" ><i class="icon-users4" style="zoom:1.1; "></i>
				          &nbsp; &nbsp;Edit Customer
				          </h5>
				        </div>
						<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						<div id="show_editdata"></div>	
						</div>
				</div>
			</div>
		</div>
<!--  -->
<!--  edit modal -->
		<div class="modal fade" id="UpdateRouteModal" role="dialog" style="margin-top:20px;"> 
			<div class="modal-dialog modal-lg" style="width: 98% !important;">
				<!-- Modal content-->
				<div class="modal-content">
						<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
				          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
				          <h5 class="modal-title" style="margin-top: -4px" ><i class="icon-map" style="zoom:1.1; "></i>
				          &nbsp; &nbsp;Update Route Details
				          </h5>
				        </div>
						<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						<div id="show_updatedata">
						 

                        </div>  
					</div>
				</div>
			</div>
		</div>
</body>

<script type="text/javascript">
	
  function edit_customer(CustID)
	{
		var datastring='CustID='+CustID;
		// alert(datastring);

        $.ajax({
	            url: "<?php echo base_url('Customer/EditData');?>",
	            type: "POST",
	            data:  datastring,
	            success: function(data)
	              {                          
	              	//alert(data);	
	              	$('#edit_debtordetail').modal('show');
	                 $("#show_editdata").html(data);
	               },
	            error: function()
	              {
	                alert('fail');
	              }
           });
	}
	
  function UpdateRouteDetails(CustID)
	{
		var datastring='CustID='+CustID;
        $.ajax({
	            url: "<?php echo base_url('Customer/UpdateRouteDetails');?>",
	            type: "POST",
	            data:  datastring,
	            success: function(data)
	              {                          
	              	//alert(data);	
	              	$('#UpdateRouteModal').modal('show');
	                $("#show_updatedata").html(data);
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
	    $('#defaultForm').bootstrapValidator({
	        message: 'This value is not valid',
	        fields: {
	            CustomerName: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Customer Name is required '
	                    }
	                }
	            },
	            PartyID: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Billing Party is required '
	                    }
	                }
	            },           
	            GSTNo1: {
	                validators: {
	                    notEmpty: {	
	                        message: 'GST No. is required '
	                    }
	                }
	            },
	            ShipmentPersonName: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Shipment Person Name is required '
	                    }
	                }
	            },
	            ShipmentPersonEmail: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Shipment Person Email1 is required '
	                    }
	                }
	            },
	            ContractType: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Contract Type required '
	                    }
	                }
	            },

	             HeadofficeAddress: {
	                validators: {
	                    notEmpty: {
	                        message: 'Head office Address required '
	                    }
	                }
	            },
	            UnitAddress: {
	                validators: {
	                    notEmpty: {
	                        message: 'Unit Address required '
	                    }
	                }
	            },
	            PaymentTerms: {
	                validators: {
	                    notEmpty: {
	                        message: 'Payment Terms required '
	                    }
	                }
	            },


	            CreditPeriod: {
	                validators: {
	                    notEmpty: {
	                        message: 'Credit Period required '
	                    }
	                }
	            },	   

	            PersonName1: {
	                validators: {
	                    notEmpty: {
	                        message: 'Person Name1 required '
	                    }
	                }
	            },
	            Contact1: {
	                validators: {
	                    notEmpty: {
	                        message: 'Contact1 required '
	                    }
	                }
	            },
	            Email1: {
	                validators: {
	                    regexp: {
		                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
		                        message: 'Enter a valid email address'
		                    }
	                }
	            },

            SigningPersonName: {
	                validators: {
	                    notEmpty: {
	                        message: 'Person Name required '
	                    }
	                }
	            },
	            SigningPersonContact: {
	                validators: {
	                    notEmpty: {
	                        message: 'Contact required '
	                    }
	                }
	            },
	            SigningPersonEmail: {
	                validators: {
	                    regexp: {
		                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
		                        message: 'Enter a valid email address'
		                    }
	                }
	            },
	            FromLocation: {
	                validators: {
	                    notEmpty: {
	                        message: 'From Location required '
	                    }
	                }
	            },
	            ToLocation: {
	                validators: {
	                    notEmpty: {
	                        message: 'To Location required '
	                    }
	                }
	            },
	       }
	    });
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
	                 	 // alert();
	                      $.ajax({
	                        url: "<?php echo base_url('Customer/InsertData');?>",
	                        type: "POST",
	                        data:  new FormData(this),
	                        contentType: false,
	                        cache: false,
	                        processData:false,
	                        success: function(data)
	                          {
                                 // $("#preview").hide();
                                //  $("#show").html(data);
                                  // alert(data);	
                                   new PNotify({
								            text: 'Customer Details Added Successfully',
											icon: 'glyphicon glyphicon-ok-circle',
								            addclass: 'bg-success'
								        });

										setTimeout(function()
                                         {
                                              window.location="<?php echo base_url('Customer');?>";
                                         }, 1000);

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
 function delete_customer(CustID)
 {
    // Setup
    //alert('');
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure want to delete this customer record ?</p>',
        hide: false,
        type: 'warning',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn-sm'
                },
                {
                    text: 'No',
                    addClass: 'btn-sm'
                }
            ]
        },
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        }
    })
    // On confirm
    notice.get().on('pnotify.confirm', function()
     {
        	var datastring1='CustID='+CustID;
        	//alert(datastring1);
	        $.ajax({
	            url: "<?php echo base_url('Customer/DeleteData');?>",
	            type: "POST",
	            data:  datastring1,
	            success: function(data)
	              {    
	               // alert(data);
	              	 new PNotify({
						            text: 'Customer Details Deleted Successfully',
									icon: 'glyphicon glyphicon-ok-circle',
						            addclass: 'bg-success'
						        });

								setTimeout(function()
			                     {
			                        window.location="<?php echo base_url('Customer');?>";
			                     }, 1500);
	               },
	            error: function()
	              {
	                alert('fail');
	              }
	           });
	        
            })
            // On cancel
            notice.get().on('pnotify.cancel', function()
             {
                // alert('Oh ok. Chicken, I see.');
            });
 }
</script>

</html>
