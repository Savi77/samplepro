
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
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>  
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>

</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>


    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Feedback</h4>
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
      <!-- Main content -->
      <div class="content-wrapper">
        <!-- CKEditor default -->
        <div class="panel panel-flat">
          <div class="panel-heading"  style="background-color:#009FDF;color: white;">
            <h5 class="panel-title">Feedback</h5>
          </div>
             <div class="panel-body"> 
                  <br/>          
                  <form id="FeedbackForm" method="post">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Type:</label>
                                <select data-placeholder="Select Type" class="form-control" name="service_type" onchange="show_service(this.value)" >
                                  <option value="">Select Type</option>                              
                                  <option value="Product">Product/ Service</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6" id="prd_service">
                            <div class="form-group type">
                              <label>Select Product/Service:</label>
                                <select data-placeholder="Select Product" class="form-control" name="prd_service">
                                  <option value="">Select Product/Service</option>   
                                   <?php   foreach ($product_data as $row) 
                                    {  ?>                      
                                  <option value="<?= $row->prdsrv_name?>"><?= $row->prdsrv_name;?></option>
                                  <?php } ?>
                                  <option id="Other_product" value="Other">Other</option>  
                                </select> 
                            </div>
                        </div>
                      </div>  

                     <div class="row">
                      <div class="content-group">
                        <textarea name="editor-full" id="editor-full" rows="4" cols="4"> </textarea>    
                        <textarea name="inner_page_desc"  id="inner_page_desc" hidden></textarea>                       
                      </div>
                     </div>  
                     <div class="text-right">
                      <button type="submit" class="btn bg-teal-400">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
             </div>
          </div>
      </div>
</div>


<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function()
 {
    $('#FeedbackForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
                 service_type: {
                      validators: {
                          notEmpty: {
                              message: 'Type is required'
                          }
                  }
                },
                prd_service: {
                    validators: {
                        notEmpty: {
                            message: 'Select Product/Service'
                            }
                    }
                },
        }
    });
});
</script>


<script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#FeedbackForm").on('submit',(function(e)
           {  
              var content = CKEDITOR.instances['editor-full'].getData();
              $("#inner_page_desc").val(content);
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {
                  $.ajax({
                          url: "<?php echo base_url('admin/Feedback/SubmitFeedback');?>",
                          type: "POST",
                          data:  new FormData(this),
                          contentType: false,
                          cache: false,
                          processData:false,
                          success: function(data)
                            {
                              // alert(data);   
                              $("#inner_page_desc").val('');   
                              alert('Thank for your valuable Feedback !!');

                                   setTimeout(function()
                                   {
                                       window.location="<?php echo base_url('admin/Feedback');?>";
                                   }, 3000);


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


    function show_service(value)
    {
       // alert(value);
       if(value=='Other')
       {
          $(".type select").val("Other");
       }
       else
       {
          $(".type select").val("");
       }
    }

</script>


<script type="text/javascript">
  
  $(function() 
  {
      // Full featured editor
      CKEDITOR.replace( 'editor-full', {
          height: '100px',
          extraPlugins: 'forms'
      });
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
      function toggleReadOnly(isReadOnly) {
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



      // Inline editor
      // ------------------------------

      // We need to turn off the automatic editor creation first
      CKEDITOR.disableAutoInline = true;

      // Attach editor to the area
      var editor3 = CKEDITOR.inline('editor-inline');
      
  });

</script>






</body>
</html>
