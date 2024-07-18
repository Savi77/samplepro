
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
	<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/components_notifications_pnotify.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>
    
    <script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- /theme JS files -->
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
      $this->load->view('includes/header');
      $this->load->view('includes/menubar');
   ?>
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Expense Head</span> - List</h4>
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('Company') ?>">Expense Head</a></li>
					<li class="active">List</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Basic datatable -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Expense Head List</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								  <li>
									  <span class="label label-flat border-primary text-primary-600 label-icon">
									    <a data-toggle="modal"  data-backdrop="static"  data-target="#add_branch" data-popup="tooltip" title="" data-placement="left" data-original-title="Add New Company">
									    	<i class="icon-folder-plus"></i> Add New Head
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
								<th>Expense Head</th>
								<th>Expense Contact</th>
								<th  class="hidden"></th>
								<th  class="hidden"></th>
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
								<td><?php echo $row->head_title;?></td>
								<td><?php echo  $row->head_desc;?></td>
								<td  class="hidden"></td>
								<td class="hidden"></td>
								<td class="text-left">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
                                             <li>
                                             	<a  onclick="edit_data(this.id)" id="<?= $row->head_id;?>"  data-popup="tooltip" title="" data-original-title="Edit Company Details"  data-placement="left" >
                                             		<i class=" icon-pencil"></i>Edit Details
                                             	</a>
                                             </li>
                                             <li>
                                             	<a onclick="delete_data(this.id)" id="<?= $row->head_id;?>"   data-popup="tooltip" title="" data-original-title="Delete"  data-placement="left" >
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

	</div>
	<!-- /page container -->

	<!-- Modal -->
		<div class="modal fade" id="add_branch" role="dialog" style="margin-top:20px;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
					          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
					          <h5 class="modal-title" style="margin-top: -4px" >
					          	<i class="icon-font-size" style="zoom:1.1; "></i>
					          &nbsp; &nbsp;Add New Head
					          </h5>
				        </div>
						<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						  <div class="row">
							<form id="defaultForm" method="post">
								<div class="panel panel-flat">
									<div class="panel-body">
										<fieldset>
                                             <div class="row">
										       <div class="col-md-6">	
													<div class="form-group">
														<label>Expense Head :</label>
														<input type="text" class="form-control" maxlength="60" name="head_title" id="head_title" placeholder="Enter Expense Head " >
													</div>
												</div>
												 <div class="col-md-6">	
													<div class="form-group">
														<label>Expense Description :</label>
														<textarea class="form-control" name="head_desc" rows="1"  placeholder="Enter Description"></textarea>
													</div>
												  </div>
											</div>
										</fieldset>
										<br/>
										<br/>
 									    <div class="text-center">
											<button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
											<span id="preview"></span>
										</div>	
									</div>
								</div>
							</form>
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
				          <h5 class="modal-title" style="margin-top: -4px" >
				          	<i class="icon-font-size" style="zoom:1.1; "></i>
				          &nbsp; &nbsp;Edit Head
				          </h5>
				        </div>
						<div class="modal-body" style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						   <div id="show_editdata"></div>	
						</div>
				</div>
			</div>
		</div>
<!--  -->
</body>



 <script type="text/javascript">
	$(document).ready(function() {
	    $('#defaultForm').bootstrapValidator({
	        message: 'This value is not valid',
	        fields: {
	            head_title: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Expense Title required'
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
	     $("#defaultForm").on('submit',(function(e)
	         {
	           //e.preventDefault();
	           if (e.isDefaultPrevented())
	            {
	              //  alert('invalid');
	              }
	            else
	                 {
                       $("#preview").html('<img src="<?= base_url() ?>assets/images/ajax-loader.gif" style="height:30px;width:30px;" />');
	                 	 // alert();
	                      $.ajax({
	                        url: "<?php echo base_url('ExpenseHead/InsertData');?>",
	                        type: "POST",
	                        data:  new FormData(this),
	                        contentType: false,
	                        cache: false,
	                        processData:false,
	                        success: function(data)
	                          {
                                 $("#preview").hide();
                                   new PNotify({
								            text: 'Expense Head Details Added Successfully',
											icon: 'glyphicon glyphicon-ok-circle',
								            addclass: 'bg-success'
								        });
										setTimeout(function()
                                         {
                                             window.location="<?php echo base_url('ExpenseHead')?>";
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

<!-- ///////////////////////////// edit popup  ///////////////////////////////// -->

<script type="text/javascript">
	
  function edit_data(head_id)
	{
		var datastring='head_id='+head_id;
		// alert(datastring);
        $.ajax({
            url: "<?php echo base_url('ExpenseHead/EditData');?>",
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
</script>

<script type="text/javascript">
 function delete_data(head_id)
 {
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure want to delete this head record ?</p>',
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
        	var datastring1='head_id='+head_id;
        	//alert(datastring1);
	        $.ajax({
	            url: "<?php echo base_url('ExpenseHead/DeleteData');?>",
	            type: "POST",
	            data:  datastring1,
	            success: function(data)
	              {    
	               // alert(data);
	              	 new PNotify({
						            text: 'ExpenseHead Details Deleted Successfully',
									icon: 'glyphicon glyphicon-ok-circle',
						            addclass: 'bg-success'
						        });
						setTimeout(function()
	                     {
	                         window.location="<?php echo base_url('ExpenseHead')?>";
	                     }, 1000);
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
