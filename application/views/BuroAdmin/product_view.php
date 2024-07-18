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

    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>


  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>



    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

 <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }

    .dataTables_length > label > span:first-child
      {
        float: left;
        margin: 5px 9px;
        margin-left: -15px;
      }
    .datatable-header > div:first-child, .datatable-footer > div:first-child 
    {
        margin-left: 9px !important;
        left: -13px !important;
    }

    input, button, select, textarea 
    {
        height: 30px !important;
    }
      .btn-info 
      {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
      }
      .nav-tabs > li > a 
     {
        margin-right: 0;
        color: #ddd !important;
     }

  </style>


</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Product
        </h4>
      </div>

      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
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
        <div class="row">

          <div class="row">
          <div class="col-md-12">
            <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Product List<i class="icon-menu7 position-right"></i></a></li>
                    <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">Product Header Section</a></li>
                 
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                      
                      <table id="example" class="display" cellspacing="0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Image</th>
                      <th>Menu</th>
                      <th>Submenu</th>
                      <th>Name</th>
                      <th>Short Desc</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                       //print_r($get_list->result());
                       $count = 1;
                       foreach($get_list->result() as $row) { ?>
                      <tr>
                        <td><?php echo $count ?></td> 
                        <?php if (!empty($row->image)) 
                        { ?>
                           <td><img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/products/<?= $row->image ?>"></td>
                      <?php } else { ?> 
                             <td><img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/logo.png ?>"></td>
                        <?php } ?>                     
                       
                        <td><?= $row->interest ?></td>
                        <td><?= $row->submmenu ?></td>
                        <td><?= $row->product_name ?></td>  
                        <td><?= $row->short_desc ?></td>
                          <td><?php if($row->active_status==1){ ?>
                                   <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row->product_id?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                 <?php } else {?>

                                 <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row->product_id?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                  <?php } ?>
                          </td>

                        <td class="text-center" style="padding: 7px 7px;">
                           <ul class="icons-list">
                              <li><a href="<?php echo base_url("admin/Product/edit?interestid=$row->product_id") ?>" ><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Interest" data-placement="bottom"></i></span></a></li>
                              <li><a onclick="del_interest(id)" id="<?= $row->product_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Interest" data-placement="bottom"></i></span></a></li>
                               <li><a onclick="file_upload(id)" id="<?= $row->product_id; ?>"><span class="label bg-info" style="line-height: 20px;"><i class="glyphicon glyphicon-file" style="font-size: 12px;" data-toggle="tooltip" title="Upload File" data-placement="bottom"></i></span></a></li>
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
                          <form id="sectionform1" class="form-horizontal">
                            <div class="panel panel-flat">
                              <div class="panel-body">
                                <fieldset>
                                  <legend class="text-semibold">Enter Header Section information</legend>
                                    <div class="form-group col-md-12">
                                      
                                      <label class="control-label col-sm-2" for="Title">Title <span style="color: red;">*</span></label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"  value="<?= $get_data[0]->title;?>">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label class="control-label col-sm-2" for="Description">Description <span style="color: red;">*</span></label>
                                       <div class="col-sm-10">
                                          <div class="media-body">
                                               <textarea rows="5" cols="5" class="form-control"  name="description"><?= $get_data[0]->description;?></textarea>
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

      </div>
    </div>

</div>
        <!-- /basic responsive configuration -->

       <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"> Add Product </h6>
                </div>

                <div class="modal-body">
                  <form class="form-horizontal" id="addform">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="menu_id">Select Menu <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                               <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" >
                                  <option value="">Select Menu</option>
                                    <?php   
                                      foreach ($get_menu_list as $value) 
                                      {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->interest;?></option>
                                   <?php } ?> 
                               </select>
                            </div>
                            <label class="control-label col-sm-2" for="email">Select Submenu <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                                <select name="submenu_id" class="form-control" id="submmenu_data">
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Product Name <span style="color: red;">*</span></label>
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
                            <label class="control-label col-sm-2" for="Youtube">Youtube URL</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="Enter Youtube Embeded URL" >
                            </div>
                            <label class="control-label col-sm-2" for="Download">Download File</label>

                         <!--    <div class="col-md-9">
                              <div class="col-xs-1">
                                  <button type="button" class="btn btn-default addButton" style="margin-top: 20px;">
                                    <i class="icon-stack-plus"></i>
                                  </button>
                              </div>
                              <div class="col-xs-4">
                                  Title :<input type="text" class="form-control" name="title[]" >
                              </div>
                              <div class="col-xs-5">
                                  File :<input type="file" class="file-styled" id="file-input"  name="upload_file[]" onchange="getName()">                                                       
                              </div>
                               <div class="col-xs-2">
                                  <div id="thumb-output" style="margin-top: 20px;"></div>
                                </div>
                            </div> -->

                             <div class="col-sm-4">
                                <div class="media-body">
                                    <input type="file" class="file-styled"  name="download_file">
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Short Description (HomePage) <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <textarea name="short_desc" class="form-control" placeholder="Enter Short Description"></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                              <textarea name="editor-full" id="editor-full" rows="2" cols="2"></textarea>    
                              <input type="hidden" name="inner_page_desc" id="inner_page_desc">
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

         <div id="modal_file" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info" style="background-color:#009FDF;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Upload File</h6>
              </div>

              <div class="modal-body">
                     <!-- <div class="col-md-10 col-md-offset-1"> -->
                            <!-- Basic legend -->
                          <form id="sectionform12" class="form-horizontal" method="post">
                            <div class="panel panel-flat">
                              <div class="panel-body">
                                <fieldset>

                                     <div class="col-md-12"> 
                                        <div class="form-group ">
                                            <div class="col-lg-12">  
                                               <div class="col-md-3">
                                                <br>
                                                <label class="control-label">Product Files: <sup style="color: red">*</sup></label>
                                               </div> 
                                               <input type="hidden" class="form-control" name="prd_id" id="prd_id" >
                                                <div class="col-md-9">
                                                  <div class="col-xs-1">
                                                      <button type="button" class="btn btn-default addButton" style="margin-top: 20px;">
                                                        <i class="icon-stack-plus"></i>
                                                      </button>
                                                  </div>
                                                  <div class="col-xs-4">
                                                      Title : <span style="color: red;">*</span><input type="text" class="form-control" name="title[]" >
                                                  </div>
                                                  <div class="col-xs-5">
                                                      File : <span style="color: red;">*</span><input type="file" id="file-input"  name="upload_file[]" onchange="getName()">                                                       
                                                  </div>
                                                   <div class="col-xs-2">
                                                      <div id="thumb-output" style="margin-top: 20px;"></div>
                                                    </div>
                                                </div> 
                                           </div>  
                                        </div>
                                        <div class="form-group hide" id="bookTemplate" >
                                           <div class="col-lg-12"> 
                                                  <div class="col-md-9 col-md-offset-3">
                                                  <div class="col-xs-1">
                                                     <button type="button" class="btn btn-default removeButton" style="margin-top: 20px;"><i class="icon-stack-minus"></i></button>
                                                  </div>
                                                      <div class="col-xs-4">
                                                      Title :<input type="text" class="form-control" name="title[]" >
                                                  </div>
                                                  <div class="col-xs-5">
                                                      File :<input type="file" id="file-input"  name="upload_file[]" onchange="getName()">                                                       
                                                  </div>
                                                   <div class="col-xs-2">
                                                      <div id="thumb-output" style="margin-top: 20px;"></div>
                                                    </div>
                                                </div>
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
                        <!-- </div>   -->
                 </div>

            </div>
          </div>
     </div>


       <div id="modal_default" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info" style="background-color:#009FDF;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Edit Product</h6>
              </div>

              <div class="modal-body">
                  <div id="complaint_model_data">

                  </div>
             </div>

            </div>
          </div>
     </div>



<script>
    function file_upload(id)
    {
            $('#prd_id').val(id);
             $('#modal_file').modal('show');

    }

</script>

<script>

$(document).ready(function() {
        brandvalidator = {
            row: '.col-xs-3',
            validators: {
                notEmpty: {
                    message: 'Select title'
                }
            }
        },
        bookIndex = 0;

    $('#sectionform12')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                'title[]': brandvalidator,  
                                   location: {
                        validators: {
                            notEmpty: {
                                message: 'Location is required'
                            }
                        }
                    },
                    'upload_file[]': {
                        validators: {
                          notEmpty: {
                                    message: 'Select File'
                                },
                        file: {
                                 extension: 'jpg,png,jpeg,pdf,doc',
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
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
            $clone
                .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
            $('#sectionform12')
                    .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
            })

        // Remove button click handler
        .on('click', '.removeButton', function() 
        {
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-book-index');

            // Remove element containing the fields
            $row.remove();
        });
});
</script>

<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#sectionform12").on('submit',(function(e)
                 {  

                    var content = CKEDITOR.instances['editor-full'].getData();
                    // $("#inner_page_desc").val(content);
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                      // alert();
                        $.ajax({

                           url: "<?php echo base_url('admin/Product/profile_file');?>",
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
                                                    title: 'Add  File',
                                                    text: 'Added  Successfully',
                                                    type: 'success'
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


<!-- ==================================================================================================== -->
<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this product?</p>',
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
              url: "<?php echo base_url('admin/Product/deactivate'); ?>",
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

<script>
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this product?</p>',
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
              url: "<?php echo base_url('admin/Product/activate'); ?>",
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


<!--======================================= / Activate & Deactivate ==========================================-->

<!--=======================================  Validation login  ==========================================-->
  <script type="text/javascript">
  
    function fetch_submenu(id)
    {
      var datastring = 'menu_id='+id;
      // alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
            // alert(data);
            $('#submmenu_data').html(data);
           },
          error: function(){      
           alert('Error while request..');
        }
       });
    }
//-----------------------------------------------------------------------------------------

  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="7">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                }
            } );
            
            for( var k=0; k < groupadmin.length; k++){
        // Code added for adding class to sibling elements as "group_<id>"  
                  $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                // Code added for adding Toggle functionality for each group
                    $("#"+groupadmin[k]).click(function(){
                        var gid = $(this).attr("id");
                         $(".group_"+gid).slideToggle(300);
                    });
                 
            }
        }
    } );
} );

</script>



<script type="text/javascript">
$(document).ready(function() {
$('#sectionform1').bootstrapValidator({
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
     $("#sectionform1").on('submit',(function(e)
         {  
           if (e.isDefaultPrevented())
            {
              //alert('invalid');
            }
            else
            {   
              alert();
                $.ajax({

                         url: "<?php echo base_url('admin/Product/Update_header');?>",
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
              // image: {
              //           validators: {
              //             notEmpty: {
              //                       message: 'Select Product Image'
              //                   },
              //           file: {
              //                    extension: 'jpg,png,jpeg',
              //                    maxSize: 2097152,   //2 mb  maxsize
              //                    message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
              //            }
              //         }
              // },
              // download_file: {
              //           validators: {
              //             notEmpty: {
              //                       message: 'Select Download File'
              //                   },
              //           file: {
              //                    extension: 'doc,docx,pdf',
              //                    maxSize: 2097152,   //2 mb  maxsize
              //                    message: 'Download File size should be upto 2 MB. Supported Format (doc,docx,pdf)'
              //            }
              //         }
              // },
            // youtube_url: {
            //     validators: {
            //         uri: {
            //             message: 'The Youtube URL is not valid'
            //         }
            //     }
            // },
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

<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#addform").on('submit',(function(e)
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
                        $.ajax({

                           url: "<?php echo base_url('admin/Product/add');?>",
                                  type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                   {

                                    $("#inner_page_desc").val('');
                                   // alert(data);
                                     new PNotify({
                                                    title: 'Add  Product',
                                                    text: 'Added  Successfully',
                                                    type: 'success'
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


<script type="text/javascript">
  $(function() {
    // Full featured editor
    CKEDITOR.replace( 'editor-full', {
        height: '150px',
        extraPlugins: 'forms'
    });

    // Readonly editor
    // ------------------------------

    // Setup
    var editor = CKEDITOR.replace('editor-readonly', 
    {
        height: '400px'
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
