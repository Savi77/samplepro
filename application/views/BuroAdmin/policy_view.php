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
  <?php  $this->load->view('BuroAdmin/includes/admin_header'); ?>
  <!-- Page header -->
	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('admin/dashboard/view_dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Policy</li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Policy</span></h4>
			</div>

		<div class="heading-elements">
	        <div class="heading-btn-group">
	          <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
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
              <?php  $this->load->view('BuroAdmin/includes/sidebar'); ?>
			<!--  -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Hover rows -->
				<div class="panel panel-flat">
					<div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Policy List<i class="icon-menu7 position-right"></i></a></li>
                    <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">Policy Description</i></a></li>
                 
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                       <table class="table datatable-basic table-hover">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Package Name</th>
                              <th class="hidden">Title</th>
                              <th>Price</th>
                              <th class="hidden">Package Details</th>
                              <th class="hidden">Title</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                             <?php
                               $count = 1;
                               foreach($get_list as $row) { ?>
                              <tr>
                                <td><?php echo $count ?></td>             
                                <td><?= $row->package_name ?></td>
                                <td class="hidden"></td>
                                <td><?= $row->price ?> / <?= $row->period ?></td>
                                <td class="hidden"><?= $row->package_details ?></td>
                                <td class="hidden"><?= $row->title ?></td>
                                 <td><?php if($row->status==1){ ?>
                                     <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->id?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                   <?php } else {?>

                                   <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->id?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                    <?php } ?>
                                </td>
                                <td>
                                   <ul class="icons-list">
                                      <li><a  href="<?php echo base_url("BA/Policy/edit?id=$row->id") ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Policy" data-placement="bottom"></i></span></a></li>
                                      <li><a onclick="del_interest(id)" id="<?= $row->id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Policy" data-placement="bottom"></i></span></a></li>
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
		<?php  $this->load->view('BuroAdmin/includes/admin_footer'); ?>
		<!-- /footer -->
	</div>
	<!-- /page container -->

<div id="faq_model" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"> Add Package Policy </h6>
                </div>

                <div class="modal-body">
                  <form class="form-horizontal" id="addform">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Package Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name" maxlength="100">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Price <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                               <input type="text" class="form-control" id="price" name="price" placeholder="Enter Package Price" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <label class="control-label col-sm-2" for="email">Package Period <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                                  <!-- <label>Select Package Period</label> -->
                                  <select name="period" class="select-search form-control">
                                      <option value="Monthly">Monthly</option>
                                      <option value="Yearly">Yearly</option>
                                  </select>
                            </div>
                          </div>  

                          <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Package Details <span style="color: red;">*</span></label>
                              <div class="col-md-10">
                                  <div class="col-xs-11">
                                      <input type="text" class="form-control" name="task[]" placeholder="Enter package Details"  maxlength="25" style="margin-top: 13px;margin-bottom: 13px;"  autocomplete="off">
                                  </div>
                                  <div class="col-xs-1">
                                      <button type="button" class="btn btn-default addButton" style="margin-top: 14px;color: #f5f5f5;background-color: #43a047;border-color: #4caf50;">
                                        <i class="icon-add"></i>
                                      </button>
                                  </div>
                                </div>
                          </div> 
                          <div class="form-group hide" id="bookTemplate" >
                              <div class="col-md-10 col-md-offset-2">
                                    <div class="col-xs-11">
                                       <input type="text" class="form-control" name="task[]" placeholder="Enter package Details" maxlength="25"  style="margin-top: 13px;margin-bottom: 13px;"  autocomplete="off">
                                    </div>
                                    <div class="col-xs-1">
                                       <button type="button" class="btn btn-default removeButton" style="margin-top: 14px;color: #f5f5f5;background-color: #FF5733;border-color: #4caf50;">
                                          <i class="icon-subtract"></i></button>
                                    </div>
                              </div>
                          </div> 
      
                          <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                          </div>
                  </form>
               </div>
             </div>
          </div>
        </div>


       <div id="modal_default" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info" style="background-color:#009FDF;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Edit FAQ</h6>
              </div>

              <div class="modal-body">
                  <div id="complaint_model_data">

                  </div>
             </div>

            </div>
          </div>
     </div>


<script>
$(document).ready(function() {
            brandvalidator = {
                row: '.col-xs-11',
                validators: {
                    notEmpty: {
                        message: 'Package detail is required'
                    }
                }
            },
            bookIndex = 0;

        $('#addform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'task[]': brandvalidator,             
                     proj: {
                            validators: {
                                notEmpty: {
                                    message: 'Select project'
                                }
                            }
                        },
                    package_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Package Name is required'
                                }
                            }
                        },
                        price: {
                            validators: {
                                notEmpty: {
                                    message: 'Price is required'
                                }
                            }
                        },
                         package_period: {
                            validators: {
                                notEmpty: {
                                    message: 'Package Period is required'
                                }
                            }
                        }
                }
            })
            // Add button click handler
            .on('click', '.addButton', function()
             {
                bookIndex++;
                var $template = $('#bookTemplate'),
                    $clone    = $template
                                    .clone()
                                    .removeClass('hide')
                                    .removeAttr('id')
                                    .attr('data-book-index', bookIndex)
                                    .insertBefore($template);
                // Update the name attributes
                $clone.find('[name="task[]"]').attr('name', 'task[' + bookIndex + ']').end();
                // Add new fields
                // Note that we also pass the validator rules for new field as the third parameter
                $('#addform')
                        .bootstrapValidator('addField', 'task[' + bookIndex + ']', brandvalidator);
                })
            // Remove button click handler
            .on('click', '.removeButton', function() 
            {
                var $row  = $(this).parents('.form-group'),
                    index = $row.attr('data-book-index');
                $row.remove();
            });
    });
</script>


<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#addform").on('submit',(function(e)
                 {  

                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                        $.ajax({

                           url: "<?php echo base_url('BA/Policy/add');?>",
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
                                                    title: 'Add  Policy',
                                                    text: 'Added  Successfully',
                                                    type: 'success'
                                                   });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('BA/Policy');?>";
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


<script>
  function deactivate(id)
  {

      var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to Inactive this Policy?</p>',
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
            url: "<?php echo base_url('BA/Policy/deactivate'); ?>",
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
                            window.location="<?php echo base_url('BA/Policy');?>";
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
            text: '<p>Are you sure you want to activate this Policy?</p>',
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
              url: "<?php echo base_url('BA/Policy/activate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('BA/Policy');?>";
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

                         url: "<?php echo base_url('BA/Policy/Update_header');?>",
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
                                                 window.location="<?php echo base_url('BA/Policy');?>";
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


<script>
    function del_interest(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Policy?</p>',
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
              url: "<?php echo base_url('BA/Policy/delete'); ?>",
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
                              window.location="<?php echo base_url('BA/Policy');?>";
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
    function edit_interest(id)
    {
      var datastring = 'policyid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('BA/Policy/edit'); ?>",
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
