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
	<!-- /core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/media/fancybox.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/user_pages_team.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<!-- /theme JS files -->
	<!-- /theme JS files -->
</head>
<body  onload="openmodal()">
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

			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
		<!-- Footer -->
		<?php  $this->load->view('admin/includes/admin_footer'); ?>
		<!-- /footer -->
	</div>
	<!-- /page container -->

    <!-- edit category Modal -->
	  <div class="modal fade" id="edit_User" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background-color: #37474F;color: white;padding-bottom: 7px;">
	           <a href="<?php echo base_url('admin/Career') ?>">
	           	<button type="button" class="close" style="color:white;">&times;</button>
               </a>  
	          <h4 class="modal-title" style="margin-top: -2%;"><i class="icon-briefcase"></i> &nbsp; Edit Carrer Details</h4>
	        </div>
	        <div class="modal-body">
	          <div class="row">
       
					 <?php 
					  foreach ($edit_career->result() as  $career) 
					  {  
					 ?>
					        <div class="col-md-12">
					            <form class="form-horizontal" id="edit_career">
					             	 <input type="hidden" name="editid" id="editid" value="<?= $career->id?>">
					                     <div class="form-group">
					                        <label class="control-label col-sm-3 text-semibold" for="Title">Title :<sup style="color:red">*</sup></label>
					                        <div class="col-sm-9">
					                          <input type="text" class="form-control" id="title" name="title" value="<?= $career->title?>" placeholder="Enter Career Title">
					                        </div>
					                      </div>
					                     <div class="form-group">
					                        <label class="control-label col-sm-3 text-semibold" for="Description">Description :<sup style="color:red">*</sup></label>
					                        <div class="col-sm-9">
					                              <textarea name="editor-full1" id="editor-full" rows="1" cols="2"><?= $career->description?></textarea>    
					                              <input type="hidden" name="inner_page_desc" id="inner_page_desc">
					                         <!-- <textarea class="form-control" id="description" name="description" ><?= $career->description?></textarea> -->
					                        </div>
					                      </div>


									    <br/>
									    <div class="form-group">        
									      <div class="col-sm-offset-3 col-sm-6">
									        <!-- <button type="submit" class="btn btn-primary">Update Details</button> -->
					                  <button type="submit" class="btn bg-teal btn-xlg hvr-grow" data-style="expand-right"  data-spinner-size="20">
					                         <span class="ladda-label">Update Details</span>
					                          <div class="ladda-progress" style="width: 159px;"></div>
					                  </button>
									      </div>
									       <div class="col-sm-3">
									         <span id="preview4"></span>
									      </div>
									    </div>
								  </form>
							   </div>
					<?php } ?>	
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
  <!--  -->

<script type="text/javascript">
  
  function openmodal()
  {
    $('#edit_User').modal('show');
  }

</script>

<script type="text/javascript">
    $(document).ready(function() 
      {
          $('#edit_career').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
              title: {
                        validators: {
                            notEmpty: {
                                message: 'The title is required'
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
       $("#edit_career").on('submit',(function(e)
           {

           	              		var content = CKEDITOR.instances['editor-full'].getData();
              		$("#inner_page_desc").val(content);

             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
                }
              else
              {
              		var content = CKEDITOR.instances['editor-full'].getData();
					if(content=='')
					{
                       new PNotify({
                                     title: 'Add Career',
                                     text: 'Please enter carrer description',
                                     type: 'warning'
                            });
					}
					else
					{


                       $("#preview4").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                        $.ajax({
                              url: '<?php echo base_url('admin/Career/update') ?>',
	                              type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                              success: function(data)
                                {
                                    $("#preview4").hide();
	                                 new PNotify({
	                                               title: 'Update Career',
	                                               text: 'Career details updated successfully',
	                                               type: 'success'
	                                      });
	                                    setTimeout(function()
	                                     {
	                                         window.location="<?php echo base_url('admin/Career') ?>";
	                                     }, 1000);
                                },
                              error: function()
                              {
                                alert('fail');
                                }
                           });
                }        
              }
          return false;
          }));
      });
</script>


<script type="text/javascript">
  $(function() {
    // Full featured editor
    CKEDITOR.replace( 'editor-full', {
        height: '180px',
        extraPlugins: 'forms'
    });

    // Readonly editor
    // ------------------------------

    // Setup
    var editor = CKEDITOR.replace('editor-readonly', 
    {
        height: '200px'
    });

    // The instanceReady event is fired, when an instance of CKEditor has finished its initialization.
    CKEDITOR.on('instanceReady', function (ev) {

        // Show this "on" button.
        document.getElementById('readOnlyOn').style.display = '';

        // Event fired when the readOnly property changes.
        editor.on('readOnly', function() {
            document.getElementById('readOnlyOn').style.display = this.readOnly ? 'none' : '';
            document.getElementById('readOnlyOff').style.display = this.readOnly ? '' : 'none';
        });
    });

    // Toggle state
    function toggleReadOnly(isReadOnly) 
    {
        editor.setReadOnly(isReadOnly);
    }
    document.getElementById('readOnlyOn').onclick=function(){ toggleReadOnly() }
    document.getElementById('readOnlyOff').onclick=function(){ toggleReadOnly(false) }
    // Enter key configuration
    // ------------------------------
    // Define editor
    var editor2;
    // Setup editor
    function changeEnter() {
        // If we already have an editor, let's destroy it first.
        if (editor2)
            editor2.destroy(true);

        // Create the editor again, with the appropriate settings.
        editor2 = CKEDITOR.replace('editor-enter', {
            height: '400px',
            extraPlugins: 'enterkey',
            enterMode: Number(document.getElementById('xEnter').value),
            shiftEnterMode: Number(document.getElementById('xShiftEnter').value)
        });
    }

    // Run on indow load
    window.onload = changeEnter;

    // Change configuration
    document.getElementById('xEnter').onchange=function(){changeEnter()}
    document.getElementById('xShiftEnter').onchange=function(){changeEnter()}

    // We are using Select2 selects here
    $('.select').select2({
        minimumResultsForSearch: Infinity
    })


    // We need to turn off the automatic editor creation first
    CKEDITOR.disableAutoInline = true;

    // Attach editor to the area
    var editor3 = CKEDITOR.inline('editor-inline');
    
});

</script>




</body>
</html>
