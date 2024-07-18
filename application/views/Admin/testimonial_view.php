<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BuroForce</title>
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
    <style type="text/css">
    .nav-tabs > li > a 
    {
        margin-right: 0;
        color: #e0e0e0;
        border-radius: 0;
    }
  </style>
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
				<li class="active">Testimonial</li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Testimonial</span></h4>
			</div>

		<div class="heading-elements">
	        <div class="heading-btn-group">
	          <a data-toggle="modal" data-target="#Testimonial_modal" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
	        </div>
	     </div>
			
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
        <!-- Hover rows -->
        <div class="panel panel-flat">
          <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Testimonial List<i class="icon-menu7 position-right"></i></a></li>
                    <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">Testimonial Description</i></a></li>
                 
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                      <table class="table datatable-basic table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                              $count = 1;
                               foreach($testimonial_array->result() as $row) { ?>
                          <tr>
                            <td ><?php echo $count ?></td>

                            <?php if(!empty( $row->profile)) { ?>
                              <td><img type="file" src="<?= base_url() ?>assets/admin/assets/images/testimonial/<?= $row->profile ?>" class="img-circle img-sm" style="height: 70px;" alt="" ></td>
                              <?php } else { ?>

                                <td><img type="file" src="<?= base_url() ?>assets/admin/assets/images/testimonial/dummy.png" class="img-rounded" style="height: 70px;" alt="" ></td>
                             <?php } ?>

                            <td><?= $row->name ?></td>
                            <td><?= $row->company_name ?></td>
                            <td><?= $row->description ?></td>
                            <td><?php if($row->status==1){ ?>
                                 <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->test_id?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                               <?php } else {?>

                               <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->test_id?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                <?php } ?>
                        </td>
                            <td class="text-center">
                               <ul class="icons-list">
                                  <li><a data-toggle="modal" onclick="edit_testimonial(id)" id="<?= $row->test_id ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Testimonial" data-placement="bottom"></i></span></a></li>
                                  <li><a onclick="del_testimonial(id)" id="<?= $row->test_id ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Testimonial" data-placement="bottom"></i></span></a></li>
                                </ul>
                            </td>
                          </tr>
                        <?php $count++; } ?>
                    </tbody>
                  </table>
                    </div>

                    <div class="tab-pane" id="right-icon-tab2">
                      <div class="col-md-9 col-md-offset-1">
                            <!-- Basic legend -->
                          <form id="sectionform" class="form-horizontal">
                            <div class="panel panel-flat">
                              <div class="panel-body">
                                <fieldset>
                                  <legend class="text-semibold">Enter Header Section & Description</legend>
                                    <div class="form-group col-md-12">
                                      
                                      <label class="control-label col-sm-2" for="Title">Title <span style="color: red;">*</span></label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"  value="<?= $get_data[0]->title;?>" maxlength="40">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label class="control-label col-sm-2" for="Description">Description <span style="color: red;">*</span></label>
                                       <div class="col-sm-10">
                                          <div class="media-body">
                                               <textarea rows="5" cols="5" class="form-control"  name="description" maxlength="300"><?= $get_data[0]->description;?></textarea>
                                          </div>
                                      </div>
                                    </div>  
                                </fieldset>
                                <div class="text-right">
                                  <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>  
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /hover rows -->
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
    <!-- Footer -->
    <?php  $this->load->view('Admin/includes/admin_footer'); ?>
    <!-- /footer -->
  </div>
  <!-- /page container -->


                   <div id="Testimonial_modal" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"> Add Testimonial</h6>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" id="TestimonialForm" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Name <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Language" maxlength="35">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Company Name <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" maxlength="40">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Profile</label>
                                    <div class="col-lg-9">
                                      <div class="media no-margin-top">
                                        <div class="media-left">
                                          <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
                                        </div>

                                        <div class="media-body">
                                          <input type="file" class="file-styled" id="imgInp" name="fileup">
                                           <p id="error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 1MB.
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Site Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter Site Name" maxlength="40">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                      <textarea type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" maxlength="500"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group"> 
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                    </div>
                                  </div>
                              </form>
                           </div>

                    </div>
                  </div>
             </div>


    <!-- edit Testimonial Modal -->
             <div id="modal_default" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title">Edit Testimonial</h6>
                            </div>

                            <div class="modal-body">
                                <div id="Testimonial_model_data">

                                </div>
                           </div>

                          </div>
                        </div>
                   </div>
<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#TestimonialForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Full Name'
                        }
                }
            },
            company_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Company Name'
                        }
                }
            },

            description: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Description'
                        }
                }
            },
           
             emailid: {
                validators: {
                    notEmpty: {
                         message: 'Email is required.'
                 },
                regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            }
    }
});
});
</script>
    
<!--======================================= / Validation login  ==========================================-->



<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#TestimonialForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Testimonial/Add_Testimonial');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);

                                                   new PNotify({
                                                                title: 'Register Form',
                                                                text: 'Added  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Testimonial');?>";
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



<!--=======================================  delete Event  ==========================================-->

<script>
    function del_testimonial(id)
    {
      var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Testimonial?</p>',
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
            var datastring = 'test_id='+id;
            //alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Testimonial/testimonial_delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                                                 new PNotify({
                                                              title: 'Delete Form',
                                                              text: 'Deleted successfully',
                                                              type: 'success'
                                                             });
                                                  setTimeout(function()
                                                 {
                                                    window.location="<?php echo base_url('admin/Testimonial');?>";
                                                 }, 1000);

                
               },
                  error: function(){      
                   alert('Error while request..');
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
    var url="<?php echo base_url();?>";
    function delete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"user/deleteuser/"+id;
        else
          return false;
        } 
</script>


<script type="text/javascript">
$(document).ready(function() {
$('#sectionform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               title: {
                    validators: {
                        notEmpty: {
                            message: 'Title is required'
                        }
                  }
                  },
                description: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Description'
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
     $("#sectionform").on('submit',(function(e)
         {  
           if (e.isDefaultPrevented())
            {
              //alert('invalid');
            }
            else
            {   
              // alert();
                $.ajax({

                         url: "<?php echo base_url('admin/Testimonial/Update_header');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                 {

                                  // $("#inner_page_desc").val('');
                                 // alert(data);
                                   new PNotify({
                                                  title: 'Update Header',
                                                  text: 'Updated  Successfully',
                                                  type: 'success'
                                                 });

                                           setTimeout(function()
                                             {
                                                 window.location="<?php echo base_url('admin/Testimonial');?>";
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
<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_testimonial(id)
    {
      var datastring = 'testid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Testimonial/edit_Testimonial'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
           $('#Testimonial_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });

</script>



<script type="text/javascript">
  

var a=0;
//binds to onchange event of your input field
$('#imgInp').bind('change', function() {

var ext = $('#imgInp').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
  $('#error1').slideDown("slow");
  $('#error2').slideUp("slow");
  a=0;
  }else{
  var picsize = (this.files[0].size);
  if (picsize > 1000000){
  $('#error2').slideDown("slow");
  a=0;
  }else{
  a=1;
  $('#error2').slideUp("slow");
  }
  $('#error1').slideUp("slow");
  
}
});




</script>

<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Testimonial?</p>',
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

            var datastring = 'userid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Testimonial/deactivate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
                                       });
                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Testimonial');?>";
                           }, 800);

                
               },
                  error: function(){      
                   alert('Error while request..');
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

<script>
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Testimonial?</p>',
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

            var datastring = 'userid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Testimonial/activate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Testimonial');?>";
                           }, 800);

                
               },
                  error: function(){      
                   alert('Error while request..');
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
<!--======================================= / Activate & Deactivate ==========================================-->

</body>
</html>
