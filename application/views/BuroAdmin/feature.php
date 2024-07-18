<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('Admin/includes/header'); ?>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">	
    <link href="<?= base_url() ?>assets/css/hover.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switch.min.js"></script>
      
	<!-- /theme JS files -->
</head>
<body>
 <!--  Load header value -->
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->
	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('admin/dashboard/view_dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">User</li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User</span> - Manage</h4>
			</div>
<!-- 			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div> -->
		</div>
	</div>
	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
   			<!-- Main sidebar -->
              <?php  $this->load->view('Admin/includes/sidebar'); ?>
			<!--  -->
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Switchery toggles -->
				<div class="panel panel-flat" style="display: none">
					<div class="panel-heading">
						<h5 class="panel-title">Switchery toggles</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="content-group-lg">
									<h6 class="text-semibold">Default switchers</h6>
									<p class="content-group">You can add as many switches as you like, as long as their corresponding checkboxes have the same class. Select them and make new instance of the Switchery class for every of them.</p>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery" checked="checked">
											Checked switch
										</label>
									</div>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery">
											Unchecked switch
										</label>
									</div>

									<div class="checkbox checkbox-switchery disabled">
										<label>
											<input type="checkbox" class="switchery" checked="checked" disabled="disabled">
											Checked disabled
										</label>
									</div>

									<div class="checkbox checkbox-switchery disabled">
										<label>
											<input type="checkbox" class="switchery" disabled="disabled">
											Unchecked disabled
										</label>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="content-group-lg">
									<h6 class="text-semibold">Switcher colors</h6>
									<p class="content-group">You can change the default color of the switch to fit your design perfectly. According to the color system, any of its color can be applied to the switchery. Custom colors are also supported.</p>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery-primary" checked="checked">
											Switch in <span class="text-semibold">primary</span> context
										</label>
									</div>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery-danger" checked="checked">
											Switch in <span class="text-semibold">danger</span> context
										</label>
									</div>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery-info" checked="checked">
											Switch in <span class="text-semibold">info</span> context
										</label>
									</div>

									<div class="checkbox checkbox-switchery">
										<label>
											<input type="checkbox" class="switchery-warning" checked="checked">
											Switch in <span class="text-semibold">warning</span> context
										</label>
									</div>
								</div>
							</div>
						</div>
						</div>
				</div>
				<!-- /switchery toggles -->


				<!-- Bootstrap switch -->
				<div class="panel panel-flat">
					<div class="panel-heading" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
						<h5 class="panel-title">Features</h5>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<br/>
			                       <div class="panel invoice-grid">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-6">
													<h6 class="text-semibold text-right">Add Retailer to earn :</h6>
												</div>
												<div class="col-md-6">
													<div class="checkbox checkbox-switch">
														<label>
														<?php  
														 $check=$check['value'];
														 if($check=='true')
														 {
														 
														?>	
															<input type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="Enable" data-off-text="Disable" class="switch" checked="Enable" onchange="change_status(this)">
														<?php } else { ?>
													  <input type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="Enable" data-off-text="Disable" class="switch" onchange="change_status(this)">
														<?php } ?>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /bootstrap switch -->

			</div>
			<!-- /content wrapper -->
		</div>
		<!-- /page content -->
		<!-- Footer -->
		<?php  $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->
	</div>
	<!-- /page container -->

  <script type="text/javascript">
	function change_status(e)
	 {
		// alert(e.checked);
		var check=e.checked;
		var datastring='check='+check; 
		// alert(datastring);
		$.ajax({
			      url: '<?php echo base_url('admin/Feature/enable_retailer') ?>',
			      type: "POST",
			      data:  datastring,
			      success: function(data)
			        {
			        	 // alert(data);
			           new PNotify({
			                         title: 'Change status',
			                         text: 'Add retailer to earn status updated successfully',
			                         type: 'success'
			                });
			              setTimeout(function()
			               {
			                   window.location="<?php echo base_url('admin/Feature') ?>";
			               }, 1000);
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
       $("#addslider").on('submit',(function(e)
           {
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
                }
              else
              {
                       $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                        $.ajax({

                              url: '<?php echo base_url('admin/Slider/insert') ?>',
                              type: "POST",
                              data:  new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false,
                              success: function(data)
                                {
                                	// alert(data);
                                     $("#preview3").hide();
                                  //   $("#viewquery").html(data);
                                    
                                   new PNotify({
                                                 title: 'Add Slider',
                                                 text: 'New slider added successfully',
                                                 type: 'success'
                                        });
                                      setTimeout(function()
                                       {
                                           window.location="<?php echo base_url('admin/Slider') ?>";
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
  function edit_post(editid)
	{
		// alert(editid);

		fake_load();
		var datastring='editid='+editid;
	      $.ajax({
	      url: '<?php echo base_url('admin/Slider/edit') ?>',
	      type: "POST",
	      data:  datastring,
	      success: function(data)
	        {
	        	PNotify.removeAll();
	        	//alert(data); 
	        	$("#show_Usercategorydata").html(data);
	        	$("#edit_User").modal('show');
	        	
	        },
	      error: function()
	      {
	          alert('fail');
	       }
	   });
	}
	    // Confirm
 function delete_slider(deleteid)
 {
 	//alert(deleteid);
        var notice = new PNotify({
					            title: 'Confirmation',
					            text: '<p>Are you sure you want to delete this slider permanently?</p>',
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
            //alert(deleteid);
            		var datastring='deleteid='+deleteid;
				      $.ajax({
				      url: '<?php echo base_url('admin/Slider/delete') ?>',
				      type: "POST",
				      data:  datastring,
				      success: function(data)
				        {
				        //	alert(data); 
        	             new PNotify({
                                   title: 'Delete Slider',
                                   text: 'Slider has been deleted successfully',
                                   type: 'success'
                          });
             	        setTimeout(function()
                             {
                                 window.location="<?php echo base_url('admin/Slider') ?>";
                             }, 2000);

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
<script type="text/javascript">
function fake_load() {
    var cur_value = 1,
        progress;
    // Make a loader.
    var loader = new PNotify({
        title: "Loading ...",
        text: '<div class="progress progress-striped active" style="margin:0">\
			  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">\
			    <span class="sr-only">0%</span>\
			  </div>\
			</div>',
        //icon: 'fa fa-moon-o fa-spin',
        icon: 'fa fa-cog fa-spin',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        },
        before_open: function(notice) {
            progress = notice.get().find("div.progress-bar");
            progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
            // Pretend to do something.
            var timer = setInterval(function() 
            {
                if (cur_value == 90) 
                {
                    loader.update({
                        title: "Loading",
                        icon: "fa fa-spinner fa-spin"
                    });
                }
                if (cur_value >= 100) 
                {
                    // Remove the interval.
                    window.clearInterval(timer);
                    loader.remove();
                    return;
                }
                cur_value += 1;
                progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
            }, 20);
        }
    });
}
</script>

<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_checkboxes_radios.js"></script>


</body>
</html>
