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
<body style="overflow-x: hidden;" onload="openmodal()">
 <!--  Load header value -->
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->
  <!-- Page header -->
  <div class="page-header">
    <div class="breadcrumb-line breadcrumb-line-wide">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/view_dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Features</li>
      </ul>
    </div>
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Features</span></h4>
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
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Features List<i class="icon-menu7 position-right"></i></a></li>
                    <!-- <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">How We Work Description</i></a></li> -->
                 
                  </ul>
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

<div id="many_feature_model" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <a href="<?php echo base_url('admin/Many_feature') ?>"><button type="button" class="close">&times;</button></a>

                  <h6 class="modal-title"> Edit Feature </h6>
                </div>

                <div class="modal-body">
                  <?php foreach($edit_feature->result() as $row) { ?>
                      <form class="form-horizontal" id="updateform">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Tab Menu <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="tab_menu" name="tab_menu" placeholder="Enter Tab Menu" maxlength="30" value="<?= $row->tab_menu ?>">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-lg-2 control-label">Manu Image <span style="color: red;">*</span></label>
                            <div class="col-lg-10">
                              <div class="media no-margin-top">
                                <div class="media-left">
                                  <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/many_feature/<?= $row->image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img"></a>
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
                            <label class="control-label col-sm-2" for="email">Title <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" maxlength="35" value="<?= $row->title ?>">

                              <input type="hidden" class="form-control" id="mf_id" name="mf_id" maxlength="100" value="<?= $row->id ?>">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-sm-2" for="email">URL <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" maxlength="100" value="<?= $row->video_url ?>">
                            </div>
                          </div>
                           <div class="form-group">
                                  <textarea name="editor-full" id="editor-full" rows="2" cols="2">
                                   <?= $row->description ?>
                                  </textarea>    
                                  <input type="hidden" name="description" id="description">
                             </div>   
      
                          <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary pull-right">Update Details</button>
                            </div>
                          </div>
                      </form>
                  <?php } ?>
               </div>
             </div>
          </div>
        </div>


<script type="text/javascript">
  
  function openmodal()
  {
    $('#many_feature_model').modal('show');
  }

</script>
<!-- ======================= Image preview and validation ======================== -->
      <script type="text/javascript">
          function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#home_img').attr('src', e.target.result);
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
<!-- ======================= / Image preview and validation ======================== -->
<!--=======================================  Validation login  ==========================================-->



<script type="text/javascript">
$(document).ready(function() {
$('#updateform').bootstrapValidator({
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
                        message: 'Description is required'
                        }
                }
            },
            url: 
            {
                validators: 
                {
                    notEmpty: {
                        message: 'URL is required'
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
             $("#updateform").on('submit',(function(e)
                 {  
                     var content = CKEDITOR.instances['editor-full'].getData();
                     $("#description").val(content);

                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                        $.ajax({

                           url: "<?php echo base_url('admin/Many_feature/update');?>",
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
                                                    title: 'Edit  Feature',
                                                    text: 'Updated  Successfully',
                                                    type: 'success'
                                                   });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('admin/Many_feature');?>";
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

<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Feature?</p>',
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

            var datastring = 'id='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Many_feature/deactivate'); ?>",
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
                              window.location="<?php echo base_url('admin/Many_feature');?>";
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
            text: '<p>Are you sure you want to activate this Feature?</p>',
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

            var datastring = 'id='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Many_feature/activate'); ?>",
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
                              window.location="<?php echo base_url('admin/Many_feature');?>";
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

                         url: "<?php echo base_url('admin/Many_feature/Update_header');?>",
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
                                                 window.location="<?php echo base_url('admin/Many_feature');?>";
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
    function del_work(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Feature?</p>',
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

            var datastring = 'sliderid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Many_feature/delete_feature'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                         title: 'Delete Feature',
                                         text: 'Deleted successfully',
                                         type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Many_feature');?>";
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
    function edit_slider(id)
    {
        var datastring = 'sliderid='+id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Many_feature/edit_feature'); ?>",
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
