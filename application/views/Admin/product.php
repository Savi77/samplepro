
<!DOCTYPE html>
<html lang="en">
<head>
	 <?php $this->load->view('Admin/includes/header'); ?>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/editor_ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<!-- /theme JS files -->
</head>

<body style="overflow-x: hidden;">

<?php  $this->load->view('Admin/includes/admin_header'); ?>

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
      <!-- Main sidebar -->
              <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!--  -->
			<!-- Main content -->
			<div class="content-wrapper">
				<div class="row">
          <form class="form-horizontal" id="addform">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="menu_id">Select Menu </label>
                    <div class="col-sm-4">
                       <select name="menu_id" class="form-control" >
                          <option value="">Select Menu</option>
                            <?php   
                              foreach ($get_menu_list as $value) 
                              {
                            ?>
                            <option value="<?= $value->id ?>"><?= $value->interest;?></option>
                           <?php } ?> 
                       </select>
                    </div>
                    <label class="control-label col-sm-2" for="email">Select Submenu </label>
                    <div class="col-sm-4">
                       <select name="submenu_id" class="form-control">
                          <option value="">Select Submenu</option>
                            <?php   
                              foreach ($get_submenu_list as $value) 
                              {
                            ?>
                            <option value="<?= $value->submenu_id ?>"><?= $value->submmenu;?></option>
                           <?php } ?> 
                       </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Product Name</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" >
                    </div>
                    <label class="control-label col-sm-2" for="email">Product Image</label>
                     <div class="col-sm-4">
                          <div class="media-body">
                               <input type="file" class="file-styled"  name="image">
                          </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Short Description</label>
                    <div class="col-sm-10">
                      <textarea name="short_desc" class="form-control" placeholder="Enter Short Description"></textarea>
                    </div>
                  </div>
                  <!-- CKEditor default -->
                  <div class="panel panel-flat">
                    <div class="panel-heading">
                      <h5 class="panel-title">Full featured CKEditor</h5>
                      <div class="heading-elements">
                        <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="panel-body">
                         <div class="content-group">
                              <textarea name="editor-full" id="editor-full" rows="4" cols="4">

                              </textarea>  
                          </div>
                      </div>
                    </div>  
                  <!-- /CKEditor default -->

                  <div class="form-group"> 
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
              </div>
            </form>
        </div>
      </div>
  </div>        


<!--=======================================  Validation login  ==========================================-->


<script type="text/javascript">
$(document).ready(function() {
$('#addform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               product_name: {
                    validators: {
                        notEmpty: {
                            message: 'Product Name is required'
                        }
                  }
              },
              image: {
                        validators: {
                          notEmpty: {
                                    message: 'Select Product Image'
                                },
                        file: {
                                 extension: 'jpg,png,jpeg',
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
                         }
                      }
              },
            menu_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Menu'
                        }
                }
            },
            short_desc: {
                validators: {
                    notEmpty: {
                        message: 'Enter Short Description'
                        }
                }
            },


            submenu_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Submenu'
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
             $("#addform").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                        $.ajax({

                           url: "<?php echo base_url('admin/Product/add');?>",
                                  type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                   {
                                   //alert(data);
                                    $(function(){
                                             new PNotify({
                                                            title: 'Add  Product',
                                                            text: 'Added  Successfully',
                                                            type: 'success'
                                                           });
                                            });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('admin/Product');?>";
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
            text: '<p>Are you sure you want to delete this product?</p>',
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
              url: "<?php echo base_url('admin/Product/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
              	//alert(data);
                $(function(){
                           new PNotify({
                                         title: 'Delete Product',
                                         text: 'Deleted successfully',
                                         type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Product');?>";
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
        url: "<?php echo base_url('admin/Product/edit'); ?>",
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
