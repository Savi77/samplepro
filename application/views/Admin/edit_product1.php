
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script> 
  <!-- /theme JS files -->
</head>

<body style="overflow-x: hidden;" onload="openmodal()">

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
          <div class="row">
            <div class="col-md-12">
        <!-- Basic responsive configuration -->
            <div class="panel panel-flat" >
              <div class="panel-heading table_header">
                <h5 class="panel-title" style="color:white">  Product  List</h5>
                <div class="heading-elements">
                  <td> 
                     <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                        <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Product" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                      </a> -->
                  </td>
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
                  <a href="<?php echo base_url('admin/Product') ?>"><button type="button" class="close">&times;</button>
                  </a>  
                  <h6 class="modal-title"> Edit Product </h6>
                </div>
                <div class="modal-body">
                  <?php foreach($edit_intr->result() as $row) { ?>
                        <form class="form-horizontal" id="edit_InterestForm">
                          <div class="row">
                            <input type="hidden" class="form-control" name="edit_id" value="<?= $row->product_id ?>">
                             <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="menu_id">Select Menu <span style="color: red;">*</span></label>
                                  <div class="col-sm-9">
                                     <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" >
                                          <?php   
                                            foreach ($get_menu_list as $value) 
                                            {
                                              if($row->menu_id==$value->id)
                                              {
                                          ?>
                                          <option value="<?= $value->id ?>" selected><?= $value->interest;?></option>
                                         <?php } else { ?> 
                                         <option value="<?= $value->id ?>"><?= $value->interest;?></option>
                                       <?php } } ?>  
                                     </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Select Submenu <span style="color: red;">*</span></label>
                                  <div class="col-sm-9">
                                     <select name="submenu_id" class="form-control" id="submmenu_data">
                                          <?php   
                                            foreach ($get_submenu_list as $value) 
                                            {
                                              if($row->submenu_id==$value->submenu_id)
                                              {
                                          ?>
                                          <option value="<?= $value->submenu_id ?>" selected><?= $value->submmenu;?></option>
                                         <?php }  else { ?> 

                                          <option value="<?= $value->submenu_id ?>"><?= $value->submmenu;?></option>

                                           <?php } } ?>  
                                     </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Product Name <span style="color: red;">*</span></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?= $row->product_name?>">
                                  </div>
                                </div>

                               <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Product Image </label>
                                   <div class="col-sm-9">
                                     <div class="col-sm-2">
                                        <img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/products/<?= $row->image ?>" id="prd_img">
                                     </div> 
                                     <div class="col-sm-10">
                                        <div class="media-body">
                                             <input type="file" class="file-styled" id="imgtemp123" name="image">
                                        </div>
                                    </div>                  
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="Youtube">Youtube URL</label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="Enter Youtube Embeded URL" value="<?= $row->youtube_url?>">
                                  </div>
                                  <label class="control-label col-sm-2" for="Download">Download File</label>
                                   <div class="col-sm-3">
                                        <div class="media-body">
                                             <input type="file" class="file-styled"  name="download_file">
                                        </div>
                                  </div>
                                </div>                                

                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="email">Short Description <span style="color: red;">*</span></label>
                                  <div class="col-sm-9">
                                    <textarea name="short_desc" class="form-control" placeholder="Enter Short Description"><?= $row->short_desc?></textarea>
                                  </div>
                                </div>

                                <div class="form-group" style="display: none">
                                  <label class="control-label col-sm-3" for="email">Long Description</label>
                                  <div class="col-sm-9">
                                    <textarea name="long_desc" class="form-control" placeholder="Enter Short Description"><?= $row->long_desc?></textarea>
                                  </div>
                                </div>

                              <div class="form-group">
                                  <textarea name="editor-full" id="editor-full" rows="2" cols="2">
                                    <?= $row->inner_page_desc?>
                                  </textarea>    
                                  <input type="hidden" name="inner_page_desc" id="inner_page_desc">
                             </div>   


                                <div class="form-group"> 
                                  <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                  </div>
                                </div>
                            </div>
                          </div>  
                        </form>
                  <?php } ?>
               </div>
             </div>
          </div>
        </div>

<script type="text/javascript">

  function readURL(input) {
    // alert();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#prd_img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgtemp123").change(function(){
      // alert();
        readURL(this);
    });

</script>
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



$(document).ready(function() {
$('#edit_InterestForm').bootstrapValidator({
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
              //           file: {
              //                    extension: 'jpg,png,jpeg',
              //                    maxSize: 2097152,   //2 mb  maxsize
              //                    message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
              //            }
              //         }
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
            //   download_file: {
            //             validators: {

            //             file: {
            //                      extension: 'doc,docx,pdf',
            //                      maxSize: 2097152,   //2 mb  maxsize
            //                      message: 'Download File size should be upto 2 MB. Supported Format (doc,docx,pdf)'
            //              }
            //           }
            //   },
            // youtube_url: {
            //     validators: {
            //         uri: {
            //             message: 'The Youtube URL is not valid'
            //         }
            //     }
            // },

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
        $(document).ready(function (e)
           {
             $("#edit_InterestForm").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Product/update');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {

                                       new PNotify({
                                                    title: 'Edit Product',
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
  
function openmodal()
{
  $('#interest_model').modal({backdrop: "static"});
}


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
