<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buroforce</title>
	<!-- Global stylesheets -->
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
  <?php  $this->load->view('admin/includes/admin_header'); ?>
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
              <?php  $this->load->view('admin/includes/sidebar'); ?>
			<!--  -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Hover rows -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Slider List</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<a data-toggle="modal" data-target="#myModal"  data-backdrop="static"> 
		                		<span class="label label-flat border-grey text-grey-600 hvr-float"  style="padding: 8px 10px 4px 10px;">Add New Slider</span></a>
		                	</ul>
	                	</div>
					</div>
					<table class="table datatable-basic table-hover">
						<thead>
							<tr>
								<th>Sr.No.</th>
								<th>Image</th>
								<th>Description</th>
								<th class="hidden"></th>
								<th class="hidden"></th>
								<th class="hidden"></th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						  <?php 
						     
						     $i=1;
						     foreach ($slider_array->result() as  $slider)
						       {
						    ?>
							<tr>
								<td><?= $i ?></td>
								<td>
									<img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/images/slider/<?= $slider->image ?>">
								</td>
								<td><?= $slider->description?></td>
								<td class="hidden"></td>
								<td class="hidden"></td>
								<td class="hidden"></td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a id="<?= $slider->id?>" onclick="edit_post(this.id)"><i class="icon-pencil7"></i> Edit </a></li>
												<li><a id="<?= $slider->id?>" onclick="delete_slider(this.id)"><i class="icon-user-block"></i>Delete </a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							 <?php $i++; } ?>
						</tbody>
					</table>
				</div>
				<!-- /hover rows -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
		<!-- Footer -->
		<?php  $this->load->view('admin/includes/admin_footer'); ?>
		<!-- /footer -->
	</div>
	<!-- /page container -->


 <!-- Add New Retailer Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background-color: #37474F;color: white;padding-bottom: 7px;">
	          <button type="button" style="color: white;top: 35%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title" style="margin-top: -2%;"><i class=" icon-briefcase"></i> &nbsp;Add New Slider</h4>
	        </div>
	        <div class="modal-body">
	          <div class="row">
	            <div class="col-md-10 col-md-offset-1">
		            <form class="form-horizontal" id="addslider" style="margin-top: 2%">
							<div class="form-group">
								<label class="col-lg-3 control-label text-semibold">Logo1 <sub class="text-muted">(Small)</sub> :<sup style="color:red">*</sup></label>
								<div class="col-lg-9">
									<input type="file" class="file-input" name="image" data-show-upload="false" id="image">
								</div>
							</div>
			               <div class="form-group">
			                  <label class="control-label col-sm-3 text-semibold" for="Description">Description :<sup style="color:red">*</sup></label>
			                  <div class="col-sm-9">
			                   <textarea class="form-control" id="description" name="description" ></textarea>
			                  </div>
			                </div>
						    <div class="form-group">        
						       <div class="col-sm-offset-3 col-sm-6">
							        <button type="submit" class="btn bg-teal btn-xlg hvr-grow">
							             <span class="ladda-label">Submit</span>
							              <div class="ladda-progress" style="width: 159px;"></div>
							        </button>
						        </div>
						       <div class="col-sm-3">
						         <span id="preview3"></span>						        
						      </div>
						       <div class="col-sm-12">
						         <span id="viewquery"></span>						        
						      </div>
						    </div>
					  </form>
				   </div>	  
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
  <!--  -->


    <!-- edit category Modal -->
	  <div class="modal fade" id="edit_User" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background-color: #37474F;color: white;padding-bottom: 7px;">
	          <button type="button" style="color: white;top: 35%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title" style="margin-top: -2%;"><i class="icon-images2"></i> &nbsp; Edit Slider Details</h4>
	        </div>
	        <div class="modal-body">
	          <div class="row">
	  			<div id="show_Usercategorydata"></div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
  <!--  -->

  <script type="text/javascript">
    $(document).ready(function() 
      {
          $('#addslider').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
              image: {
                    validators: {
                      notEmpty: {
                                message: 'Please Select Slider Image'
                            },
                    file: {
                             extension: 'jpg,png,jpeg',
                             maxSize: 2097152,   //2 mb  maxsize
                             message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
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
</body>
</html>
