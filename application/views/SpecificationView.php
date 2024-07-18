
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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Specification</span> - List</h4>
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('Specification>') ?>">Specification</a></li>
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
						<h5 class="panel-title">Specification List</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								  <li>
									<span class="label label-flat border-primary text-primary-600 label-icon">
									    <a data-toggle="modal"  data-backdrop="static"  data-target="#add_branch" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Add New Specification"><i class="icon-folder-plus"></i> Add New Specification</a>
									   </li>
								  </span>
							</ul>
          	           </div>
					</div>
					<table class="table datatable-responsive">
					 	<thead>
							<tr>
								<th>#</th>
								<th>Specification Name</th>
								<th  class="hidden"></th>
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
									<td><?php echo $row->spec_name;?></td>
									<td  class="hidden"></td>
									<td class="hidden"></td>
									<td  class="hidden"></td>
									<td class="text-left">
										<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="icon-menu9"></i>
													</a>
													<ul class="dropdown-menu dropdown-menu-right">
													 	 <li><a id="<?php echo $row->id ?>" onclick="edit_specdetails(this.id)"  data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-database-edit2"></i>Edit Details</a></li>
												         <li><a id="<?php echo $row->id ?>"  onclick="delete_specdetails(this.id)"  data-popup="tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i>Delete Details</a></li>
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
			<div class="modal-dialog modal-md">
				<!-- Modal content-->
				<div class="modal-content">
						<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
				          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
				          <h5 class="modal-title" style="margin-top: -4px" >
				          <i class="icon-menu2" style="zoom:1.1; "></i>
				          &nbsp; &nbsp;Add New Specification
				          </h5>
				        </div>

						<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						  <div class="row">
								<!-- 2 columns form -->
								<form class="form-horizontal"  id="defaultForm" method="post">
									<div class="panel panel-flat" style="margin-bottom: 0px;margin-left: 10px;margin-right: 10px;">
										<div class="panel-body">
											<div class="row">
												<div class="col-md-12">
													<fieldset>
														<div class="col-md-12">
														  <div class="col-md-12">
															<div class="form-group">
																<label class="col-lg-4 control-label"> Specification Name:</label>
																<div class="col-lg-8">
																	<input type="text" class="form-control" name="spec_name" id="spec_name" placeholder="Enter Specification Name">
																</div>
															</div>
														  </div>	
														</div>
														  <div class="col-md-12 ">
														    <div class="col-md-12 ">
																<div class="text-right">
																	<button type="submit" class="btn btn-primary">Add Specification <i class="icon-arrow-right14 position-right"></i></button>
																</div>
															</div>	
														</div>	
													</fieldset>
												</div>
											</div>
											<div class="text-left" id="preview"></div>
										</div>
										<div class="text-left" id="show"></div>
									</div>
								</form>
								<!-- /2 columns form -->
							</div>
						</div>
				</div>
			</div>
		</div>
<!--  -->

<!--  edit modal -->

	<div class="modal fade" id="edit_debtordetail" role="dialog" style="margin-top:20px;">
		<div class="modal-dialog modal-md">
			<!-- Modal content-->
			<div class="modal-content">
					<div class="modal-header" style="background-color: #37474F;color: white;padding: 13px; height: 55px;">
			          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
			          <h5 class="modal-title" style="margin-top: -4px" >
			          <i class="icon-menu2" style="zoom:1.1; "></i>
			          &nbsp; &nbsp;Edit Specification
			          </h5>
			        </div>
					<div class="modal-body"  style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
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
	            spec_name: {
	                validators: {
	                    notEmpty: {	
	                        message: 'Specification  Name is required '
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
	                 	 // alert();
	                      $.ajax({
	                       url: "<?php echo base_url('Specification/InsertData');?>",
	                        type: "POST",
	                        data:  new FormData(this),
	                        contentType: false,
	                        cache: false,
	                        processData:false,
	                        success: function(data)
	                          {
                                //  $("#preview").hide();
                                  //$("#show").html(data);
                                  // alert(data);	
                                   new PNotify({
								            text: 'Specification Details Added Successfully',
											icon: 'glyphicon glyphicon-ok-circle',
								            addclass: 'bg-success'
								        });
										setTimeout(function()
                                         {
                                              window.location="<?php echo base_url('Specification');?>";
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
	
  function edit_specdetails(id)
	{
		var datastring='id='+id;
		//alert(datastring);

        $.ajax({
            url: "<?php echo base_url('Specification/EditData');?>",
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
<!-- /////////////////////////////////  delete Debtor -->
<script type="text/javascript">
	
function delete_specdetails(id)
{
    if (confirm("Are you sure want to delete this specification record") == true) 
	 {
        	var datastring1='id='+id;
        	//alert(datastring1);
	        $.ajax({
	             url: "<?php echo base_url('Specification/DeleteData');?>",
	            type: "POST",
	            data:  datastring1,
	            success: function(data)
	              {    
	               // alert(data);
	              	 new PNotify({
						            text: 'Specification Details Deleted Successfully',
									icon: 'glyphicon glyphicon-ok-circle',
						            addclass: 'bg-success'
						        });

								setTimeout(function()
			                     {
			                          window.location="<?php echo base_url('Specification');?>";
			                     }, 1000);
	               },
	            error: function()
	              {
	                alert('fail');
	              }
	           });
    } 
}
</script>

</html>
