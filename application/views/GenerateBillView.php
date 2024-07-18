	
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

    <!-- ==============multiselect ================-->
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-multiselect.css" />
    <!-- ======================= -->



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
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/components_notifications_pnotify.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
   <!-- ==============multiselect ================-->

    <script src="<?= base_url() ?>assets/js/bootstrap3-typeahead.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-multiselect.js"></script>
   <!-- ======================= -->
	<style type="text/css">
	.serviceBox
	 {
	    border: 1px solid #00BBD2;
	    padding: 26px 28px 40px;
	    margin: 20px 20px 13px 20px;
	    position: relative;
	}
	.serviceBox .service-icon 
	{
	    /*width: 124px;*/
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
   .serviceBox:hover .service-icon {
        color: #fff;
        background: #2B559B;
        border: 2px solid #2B559B;
    }
    .serviceBox .title {
        font-size: 22px;
        font-weight: 600;
        color: #3e5482;
        margin-bottom: 15px;
    }
    .serviceBox .description {
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
	<style type="text/css">
	    .multiselect-container {
	        width: 100% !important;
	    }
		.multiselect-container>li>a>label>input[type=checkbox] 
		{
		    margin-bottom: 0px !important;
		    margin-left: 10px !important;
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
	<style>
		.multiselect-native-select 
		{
			position: relative;
			select {
				border: 0 !important;
				clip: rect(0 0 0 0) !important;
				height: 1px !important;
				margin: -1px -1px -1px -3px !important;
				overflow: hidden !important;
				padding: 0 !important;
				position: absolute !important;
				width: 1px !important;
				left: 50%;
				top: 30px;
			}
		}
		.multiselect-container {
			position: absolute;
			list-style-type: none;
			margin: 0;
			padding: 0;
			.input-group {
				margin: 5px;
			}
			li {
				padding: 0;
				.multiselect-all {
					label {
						font-weight: 700;
					}
				}
				a {
					padding: 0;
					label {
						margin: 0;
						height: 100%;
						cursor: pointer;
						font-weight: 400;
						padding: 3px 20px 3px 40px;
						input[type=checkbox] {
							margin-bottom: 5px;
						}
					}
					label.radio {
						margin: 0;
					}
					label.checkbox {
						margin: 0;
					}
				}
			}
			li.multiselect-group 
			{
				label {
					margin: 0;
					padding: 3px 20px 3px 20px;
					height: 100%;
					font-weight: 700;
				}
			}
			li.multiselect-group-clickable {
				label {
					cursor: pointer;
				}
			}
		}
	</style>
</head>

<body>
   <?php 
      $this->load->view('includes/header');
      $this->load->view('includes/menubar');
   ?>
	<div class="page-header" style="display: block">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i>
				 <span class="text-semibold">Generate Bill</span></h4>
			</div>
			<div class="heading-elements">
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('LRData') ?>"> Invoice</a></li>
					<li class="active">Generate Bill</li>
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
			                	<form id="defaultForm" method="post" >
                                   <div class="serviceBox" style="margin-bottom: 20px;">
                                            <div class="service-icon">
                                               Generate Bill
                                            </div>
	                                        <p class="description">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>Billing Party : <span class="text-danger">*</span></label>
															<select name="PartyID" id="PartyID" class="select" onchange="GETProjectList(this.value)">
														    	<option value="">Select Billing Party</option>
														    	<?php 
														    	 foreach ($BillingDataArray as $res2)
														    	  {
														    	?>
																<option value="<?= $res2->PartyID;?>"><?= $res2->PartyName;?></option>
															<?php } ?>
															</select>
														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label>Customer (Project) Name :</label>
															 <select name="ProjectName" id="ProjectNameList"  data-placeholder="Select Customer (Project) Name"  class="form-control" onchange="GETLRList(this.value)">
														    	
															</select>	                                                       
														</div>
													</div>	
													<div class="col-md-4">
														<div class="form-group">
															<label>Select LR No. : <span class="text-danger">*</span></label>
						                                     <select class='form-control' id='reg_id_default'>
						                                     	<option value="">Select Multiple  LR</option>
						                                     </select>
						                                     <div id="sel_reg_mf"></div>										
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>SAC Code :</label>
	                                                        <input type="text" name="SACCode" id="SACCode" class="form-control" placeholder="SAC Code" onkeypress="return isNumber(event)"   autocomplete="off">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>Invoice No. :</label>
	                                                        <input type="text" name="InvoiceNo" id="InvoiceNo" class="form-control" placeholder="Invoice No." autocomplete="off">
														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label>Invoice Date :</label>
	                                                        <input type="text" name="InvoiceDate" id="InvoiceDate" class="form-control" placeholder="Invoice Date"  value="<?= date("d F, Y");?>"  autocomplete="off">
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>CGST :</label>
															<select name="CGST" id="CGST" class="form-control" onchange="GET_Tax(this.value)">
														    	<option value="">Select CGST</option>
														    	<?php 
														    	 foreach ($TaxArray as $res2)
														    	  {
														    	?>
																<option value="<?= $res2->CGST;?>"><?= $res2->CGST;?> %</option>
															<?php } ?>
															</select>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>SGST :</label>
															<select name="SGST" id="SGST" class="form-control"  onchange="GET_Tax2(this.value)">
														    	<option value="">Select SGST</option>
														    	<?php 
														    	 foreach ($TaxArray as $res2)
														    	  {
														    	?>
																<option value="<?= $res2->SGST;?>"><?= $res2->SGST;?> %</option>
															<?php } ?>
															</select>	                                                        
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>IGST :</label>
															<select name="IGST" id="IGST" class="form-control"   onchange="GET_Tax3(this.value)">
														    	<option value="">Select IGST</option>
														    	<?php 
														    	 foreach ($TaxArray as $res2)
														    	  {
														    	?>
																<option value="<?= $res2->IGST;?>"><?= $res2->IGST;?> %</option>
															<?php } ?>
															</select>	                                                        
														</div>
													</div>
												</div>

												<div class="row" style="display: none;">
													<div class="col-md-3">
														<div class="form-group">
															<label>Select Bill Format :</label>
															<select name="bill_format" id="bill_format" class="form-control">
														    	<option value="">Select Bill Format</option>
														    	<option value="MLLCummins" selected>MLL Cummins</option>
														    	<option value="MLLFedex">MLL Fedex</option>	
														    	<option value="TVS">TVS</option>
														    	<option value="METROCASH">Metro Cash & Cary</option>
														    	<!-- <option value="MLLMHEPL">MLL MHEPL</option> -->
														    	<!-- <option value="TCISAMSUNG">TCI SAMSUNG</option> -->
														    	<!-- <option value="TCIMARKET">TCI MARKET ATTACH</option> -->
														    	<!-- <option value="TCIVWDAMLER">TCI VW & Damler</option> -->
														    	<!-- <option value="JCBINDIA">JCB INDIA</option> -->
														    </select>
														</div>
													</div>
											    </div>	
											    <br/>	

												<button type="submit" style="float: right;" class="btn btn-primary stepy-finish">
													View Invoice Details
 												   <i class=" icon-square-right position-right"></i>
												</button>
												<span id="preview"></span>
												<br/>	
	                                        </p>  
	                                  </div> 
								  </form>
				               </div>
			               <!-- /wizard with validation -->
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

$(document).ready(function() 
{
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
			PartyID: {
                 validators: {
					notEmpty: {
						 message: 'Billing Party is required'
				    }
                }
		       },

            SACCode3: {
                validators: {
                    notEmpty: {
                        message: 'SAC Code is required '
                    }
                }
            },		       
            ProjectName: {
                validators: {
                    notEmpty: {
                        message: 'Project Name is required '
                    }
                }
            },
            InvoiceNo: {
                validators: {
                    notEmpty: {
                        message: 'Invoice No. is required '
                    }
                }
            },
            bill_format2: {
                validators: {
                    notEmpty: {
                        message: 'Bill Format is required '
                    }
                }
            },
            CGST2: {
                validators: {
                    notEmpty: {
                        message: 'CGST is required '
                    }
                }
            },
            SGST2: {
                validators: {
                    notEmpty: {
                        message: 'SGST is required '
                    }
                }
            },
           InvoiceDate: {
                validators: {
                    notEmpty: {
                        message: 'Invoice Date is required '
                    }
                }
            },
            'LRNo[]': {
                validators: {
                    notEmpty: {
                        message: 'LR No. is required '
                    }
                }
            },
        }
    });
});
</script>


<script type="text/javascript">

  function GETProjectList(PartyID)
	{
		var datastring='PartyID='+PartyID;
		// alert(datastring);
         $.ajax({
		            url: "<?php echo base_url('GenerateBill/GETProjectList');?>",
		            type: "POST",
		            data:  datastring,
		            success: function(data)
		              {      
		              	// alert(data);
		               	$("#ProjectNameList").html(data);
   	                 },
		            error: function()
		              {
		                alert('fail');
		              }
	           });
	}


  function GETLRList(CustID)
	{
	  var datastring='CustID='+CustID;
      $.ajax({
	            url: "<?php echo base_url('GenerateBill/GETLRListOption');?>",
	            type: "POST",
	            data:  datastring,
	            success: function(data)
	              {   
	                 var res=$.trim(data);
		              $("#LRNoList option").remove();
		              $("#reg_id_default").hide();
		              $("#sel_reg_mf").show();
		              $("#sel_reg_mf").html(res);
		              $('#LRNoList').multiselect({
		                         nonSelectedText: 'Select Multiple LR',
		                        enableFiltering: true,
		                        includeSelectAllOption : true,
		                        enableCaseInsensitiveFiltering: true,
		                        buttonWidth:'345px'
		             });

		              SetInvoiceNO(); 



	               },
	            error: function()
	              {
	                alert('fail');
	              }
           });
	}
  

  function SetInvoiceNO()
	{
	  var ProjectName=$("#ProjectNameList").val();
	  var datastring='ProjectName='+ProjectName;
	  // alert(datastring);
      $.ajax({
	            url: "<?php echo base_url('GenerateBill/SetInvoiceNO');?>",
	            type: "POST",
	            data:  datastring,
	            success: function(data)
	              {   
	                 var res=$.trim(data);
		             $("#InvoiceNo").val(res);
	               },
	            error: function()
	              {
	                alert('fail');
	              }
           });
	}


    $(function () 
    {
        $('#InvoiceDate').datetimepicker({format: 'DD MMMM, YYYY'});     
    });

    $("#InvoiceDate").on("dp.change", function (e) 
    {
        $('#defaultForm').bootstrapValidator('revalidateField', 'InvoiceDate');
    });

 
	function GET_Tax(CGST)
	{
		var datastring='CGST='+CGST;
		// alert(datastring);
         $.ajax({
		            url: "<?php echo base_url('GenerateBill/GET_Tax');?>",
		            type: "POST",
					// dataType: 'json',
		            data:  datastring,
		            success: function(data)
		              {       
		              	var res=$.trim(data);
		              	var obj = JSON.parse(res);
 	                    var CGST=obj.CGST;
 	                    var SGST=obj.SGST;
 	                    var IGST=obj.IGST;
 	                    // $("#CGST").val(CGST);
 	                    $("#SGST").val(SGST);
 	                    $("#IGST").val('');       
 	                    // $('#defaultForm').bootstrapValidator('revalidateField', 'SGST');
 	                    // $("#InvoiceNo").val(InvoiceNo);                   
   	                 },
		            error: function()
		              {
		                alert('fail');
		              }
	           });
	}

	function GET_Tax2(SGST)
	{
		var datastring='SGST='+SGST;
		// alert(datastring);
         $.ajax({
		            url: "<?php echo base_url('GenerateBill/GET_Tax2');?>",
		            type: "POST",
					// dataType: 'json',
		            data:  datastring,
		            success: function(data)
		              {       
		              	var res=$.trim(data);
		              	var obj = JSON.parse(res);
 	                    var CGST=obj.CGST;
 	                    var SGST=obj.SGST; 
 	                    $("#CGST").val(CGST);
 	                    // $('#defaultForm').bootstrapValidator('revalidateField', 'CGST');
 	                    $("#IGST").val('');               
   	                 },
		            error: function()
		              {
		                alert('fail');
		              }
	           });
	}


	function GET_Tax3(IGST)
	{
		$("#CGST").val('');      
		$("#SGST").val('');  
	}




	function GET_Invoice_Details(LRNo)
	{
		var datastring='LRNo='+LRNo;
		// alert(datastring);
         $.ajax({
		            url: "<?php echo base_url('GenerateBill/GET_Invoice_Details');?>",
		            type: "POST",
		            data:  datastring,
		            success: function(data)
		              {       
		              	var res=$.trim(data);
		              	var obj = JSON.parse(res);
 	                    var PartyName=obj.PartyName;
 	                    var CustomerName=obj.CustomerName;
 	                    var InvoiceNo=obj.InvoiceNo;
 	                    $("#BillingParty").val(PartyName);
 	                    $("#ProjectName").val(CustomerName);
 	                    $("#InvoiceNo").val(InvoiceNo);        
				        $('#defaultForm').bootstrapValidator('revalidateField', 'BillingParty');
				        $('#defaultForm').bootstrapValidator('revalidateField', 'InvoiceNo');
				        $('#defaultForm').bootstrapValidator('revalidateField', 'ProjectName');
   	                 },
		            error: function()
		              {
		                alert('fail');
		              }
	           });
	}

</script>



<script type="text/javascript">
$(document).ready(function (e)
   {
     $("#defaultForm").on('submit',(function(e)
         {
           //e.preventDefault();
           if (e.isDefaultPrevented())
            {
                //alert('invalid');
            }
            else
            {
	            	PNotify.removeAll();
	                var LRNo=$("#LRNoList").val();
					var CGST=$("#CGST").val();
					var SGST=$("#SGST").val();
					var IGST=$("#IGST").val();

					// alert(CGST);





	                $("#preview").show();
	                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="checking...."/>');
                    
                    var PartyID=$("#PartyID").val();
					var CustID=$("#ProjectNameList").val();
					var InvoiceNo=$("#InvoiceNo").val();
					var InvoiceDate=$("#InvoiceDate").val();
					var bill_format=$("#bill_format").val();
					var SACCode=$("#SACCode").val();	

					if(CGST=='' || SGST=='')
					{
						CGST=0;
						SGST=0;
					}



	                var datastring='LRNo='+LRNo+'&PartyID='+PartyID+'&CustID='+CustID+'&InvoiceNo='+InvoiceNo+'&InvoiceDate='+InvoiceDate+'&CGST='+CGST+'&SGST='+SGST+'&IGST='+IGST+'&SACCode='+SACCode+'&bill_format='+bill_format;
	                // alert(datastring);
	                $("#preview").hide();
	                window.open('<?= base_url('GenerateBill/ViewInvoice?');?>'+datastring+' ','_blank');											
					
					setTimeout(function()
	                 {
	                     window.location="<?php echo base_url('GenerateBill/ViewData')?>";

	                 }, 6000);

            }
				return false;
        }));
    });
</script>



</html>
