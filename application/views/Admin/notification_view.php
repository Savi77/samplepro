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
    <!-- ==============multiselect ================-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <!-- ======================= -->
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
  <!-- --------------------------------------------- Multi select ------------------------------ -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
     <style type="text/css">
    
    /*--------------------------------------------------*/
      .multiselect-container>li>a>label.checkbox 
      {
          margin: -6px 12px;
      }

      .multiselect-container 
      {
            min-width: 730px;
            max-height: 250px;
            overflow-y: auto;
        }

      .btn-group > .btn:first-child {
    margin-left: 0;
    width: 415px !important;
}

  </style>
    <!-- --------------------------------------------- / Multi select ------------------------------ --> 
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
				<li class="active">Notification</li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Notification</span></h4>
			</div>

		<div class="heading-elements">
	        <div class="heading-btn-group">
	          <!-- <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a> -->
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
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li style="font-size: 18px;"><a data-toggle="tab">Notification<i class="icon-menu7 position-right"></i></a></li>
                 
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                      <div class="col-md-12">
                            <!-- Basic legend -->
                          <form id="notificationform" class="form-horizontal">
                            <div class="panel panel-flat">
                              <div class="panel-body">
                               <!--  <fieldset>
                                  <legend class="text-semibold">Notification</legend> -->
                                    <div class="form-group col-md-12">
                                      <label class="control-label col-sm-2" for="Title">To <span style="color: red;">*</span></label>
                                      <div class="col-sm-10">
                                            <select name="selct_cust_emp" class="select-search form-control" onchange="get_list(this.value)">
                                                <!-- <option value="">Select</option> -->
                                                <option value="All_Customer">All Customer (Notification to all Customer)</option>
                                                <option value="Customer">Customer (Notification to Selected Customer)</option>
                                                <option value="All_Employee">All Employee (Notification to all Employee)</option>
                                                <option value="Employee">Employee (Notification to Selected Employee)</option>
                                            </select>
                                      </div>
                                    </div> 
                                    <div class="form-group col-md-12" id="customerlist" style="display: none">
                                        <label class="control-label col-sm-2" for="Title">Customer List <span style="color: red;">*</span></label>
                                          <div class="col-sm-10">
                                                <select name="customer_id[]" id="customer_id" multiple class="select-search form-control">
                                                    <!-- <option value="">Select</option> -->
                                                    <?php 
                                                    foreach($customer_list as $row) 
                                                    {
                                                    ?>
                                                        <option value="<?= $row->customer_id ?>"><?= $row->company_name ?></option>
                                                    <?php } ?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="form-group col-md-12" id="employeelist" style="display: none">
                                        <label class="control-label col-sm-2" for="Title">Employee List <span style="color: red;">*</span></label>
                                          <div class="col-sm-10">
                                                <select name="emp_id[]" id="emp_id" multiple class="select-search form-control">
                                                    <!-- <option value="">Select</option> -->
                                                    <?php 
                                                    foreach($emp_list as $row1) 
                                                    {
                                                    ?>
                                                        <option value="<?= $row1->id ?>"><?= $row1->name ?></option>
                                                    <?php } ?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label class="control-label col-sm-2" for="Description">Message <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                          <!-- <div> -->
                                               <textarea rows="5" cols="5" class="form-control" id="description"  name="description" maxlength="50"></textarea>
                                               <div class="row" style="height: 20px">
                                                   <div class="col-lg-6">
                                                      <span style="font-size:15px; color:gray">Max: 50 character</span>
                                                  </div>
                                                   <div class="col-lg-6" style="height: 20px">
                                                      <div class="col-lg-6">
                                                      </div>
                                                      <div class="col-lg-5">
                                                        <p class="req_left_char pull-right" style="font-size:15px; color:gray;">Char Left:</p>
                                                      </div> 
                                                      <div class="col-lg-1">
                                                          <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">50</div>
                                                      
                                                         <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                         <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                      </div>
                                                      
                                                   </div>
                                             </div>
                                          <!-- </div> -->
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-12"> 
                                      <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary pull-right">Send Notification</button>
                                      </div>
                                    </div> 
                                <!-- </fieldset> -->
                              </div>
                            </div>
                          </form>
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


<!--==================================== Multi select (Customer/Employee)  =====================================-->
<script>
$(document).ready(function(){
 $('#customer_id').multiselect({
  nonSelectedText: 'Select Customer',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'730px'
 });

});
</script>

<script>
$(document).ready(function(){
 $('#emp_id').multiselect({
  nonSelectedText: 'Select Employee',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'730px'
 });

});
</script>

<script type="text/javascript">
  function get_list(value)
  {
      if (value=='Customer') 
      {
          $("#employeelist").hide();
          $("#customerlist").show();
      }
      else if (value=='Employee')
      {
          $("#customerlist").hide();
          $("#employeelist").show();
      }
      else
      {
          $("#customerlist").hide();
          $("#employeelist").hide();
      } 
      
  }
</script>
<!-- ====================character count================= -->

  <script type="text/javascript">
    
    $("#description").keyup(function()
    {
          el = $(this);
          if(el.val().length >= 50)
          {
              el.val( el.val().substr(0, 50) );
              $("#charNum").text(0);
          }
           else 
          {
              $("#charNum").text(50-el.val().length);
          }
    });

  </script>

<!-- ======================================= -->
<!--==================================== / Multi select (Customer/Employee)  =====================================-->
<!--=======================================  Validation Form  ==========================================-->
<script type="text/javascript">
$(document).ready(function() {
$('#notificationform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               title: {
                    validators: {
                        notEmpty: {
                            message: 'Question is required'
                        }
                  }
              },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Message is required'
                        }
                }
            },
    }
});
});
</script>
    
    
<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#notificationform").on('submit',(function(e)
                 {  

                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                        $.ajax({

                           url: "<?php echo base_url('admin/Notification/send_notification');?>",
                                  type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                  {

                                    // $("#inner_page_desc").val('');
                                     // alert(data);
                                     if (data==2)
                                     {
                                        new PNotify({
                                                    title: 'Notification',
                                                    text: 'Please Select Customer',
                                                    type: 'warning'
                                                   });
                                     }
                                     else if (data==3)
                                     {
                                        new PNotify({
                                                    title: 'Notification',
                                                    text: 'Please Select Employee',
                                                    type: 'warning'
                                                   });
                                     }
                                     else 
                                     {
                                        new PNotify({
                                                    title: 'Notification',
                                                    text: 'Notification Sent Successfully',
                                                    type: 'success'
                                                   });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('admin/Notification');?>";
                                               }, 1000);
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




<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this FAQ?</p>',
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
              url: "<?php echo base_url('admin/Faq/deactivate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Faq');?>";
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
            text: '<p>Are you sure you want to activate this FAQ?</p>',
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
              url: "<?php echo base_url('admin/Faq/activate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Faq');?>";
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



<script type="text/javascript">
$(document).ready(function() {
$('#sectionform_link').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               url: {
                    validators: {
                        notEmpty: {
                            message: 'URL is required'
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
     $("#sectionform_link").on('submit',(function(e)
         {  
           if (e.isDefaultPrevented())
            {
              //alert('invalid');
            }
            else
            {   
              // alert();
                $.ajax({

                         url: "<?php echo base_url('admin/Link/Update_link');?>",
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
                                                  title: 'Update Link',
                                                  text: 'Updated  Successfully',
                                                  type: 'success'
                                                 });

                                           setTimeout(function()
                                             {
                                                 window.location="<?php echo base_url('admin/Link');?>";
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

                         url: "<?php echo base_url('admin/Link/Update_header');?>",
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
                                                 window.location="<?php echo base_url('admin/Link');?>";
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
    function del_interest(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this FAQ?</p>',
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
              url: "<?php echo base_url('admin/Faq/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                         title: 'Delete FAQ',
                                         text: 'Deleted successfully',
                                         type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Faq');?>";
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



<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_interest(id)
    {
      var datastring = 'interestid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Faq/edit'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
            $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }

</script>
</body>
</html>
