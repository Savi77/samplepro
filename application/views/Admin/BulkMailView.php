<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('Admin/includes/header'); ?>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
  <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">


  <!-- <link href="http://demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css"> -->

  <!-- 
  <link href="http://demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css"> -->




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
  <!-- <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script> -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>


  <script type="text/javascript" src="http://demo.interface.club/limitless/demo/Template/global_assets/js/main/bootstrap.bundle.min.js"></script>

 <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>



  <!-- <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/editor_summernote.js"></script> -->

  <!-- 
  <script type="text/javascript" src="http://demo.interface.club/limitless/demo/Template/global_assets/js/demo_pages/mail_list_write.js"></script> -->
  <style>
    .w-auto {
      width: auto !important;
    }
    .flex-fill {
      -ms-flex: 1 1 auto !important;
      flex: 1 1 auto !important;
    }

    .rounded-0 {
      border-radius: 0 !important;
    }

    .border-0 {
      border: 0 !important;
      padding: 5px
    }

    .form-control {
      display: block;
      height: calc(1.5385em + .875rem + 2px);
      font-size: 14px;
      font-weight: 400;
      line-height: 1.5385;
      color: #333;
      background-color: #fff;
      background-clip: padding-box;
    }

    .table td,
    .table th {
      padding: .75rem 1.25rem;
      vertical-align: top;
      border-top: 1px solid #ddd;
    }

    @media (min-width: 576px) {
      .flex-sm-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
      }

      .d-sm-flex {
        display: -ms-flexbox !important;
        display: flex !important;
      }
    }

    .list-inline {
      padding-left: 0;
      list-style: none;
    }

    .list-inline-dotted .list-inline-item:not(:last-child) {
      margin-right: .625rem;
    }

    .list-inline-item:not(:last-child) {
      margin-right: 1.25rem;
    }

    .list-inline-item {
      position: relative;
    }

    .list-inline-item {
      display: inline-block;
    }
    .page-header-content {
			position: relative;
			background-color: inherit;
			padding: 18px 23px !important;
			top: -11px;
		}

		
		.btn {
    position: relative;
    border-radius: 2px;
    top: 11px;
}

		.list-inline {
			margin-left: 265px;
			font-size: 0;
		}

		.page-title {
			padding: 0px 30px 6px 0px !important;
			top: 17px;
		}
    .page-header {
    padding-bottom: 9px;
    margin: -1px 0 20px;
    /* border-bottom: 1px solid #ddd; */
    border-top: 1px solid #ddd;
}
.border-panel {
    border-bottom: 1px solid rgb(148, 140, 140);
}
.page-header {
    border-top: 0px solid #ddd;
    /* border-bottom: 1px solid rgb(148, 140, 140); */
    padding: 0;
}
.btn-panel {
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 7px 12px;
    font-size: 13.5px;
    line-height: 1.9;
    border-radius: 3px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.heading-elements .btn-float.btn-link {
    margin-top: 2.5px !important;
}
.heading-elements {
    background-color: inherit;
    position: absolute;
    top: 11%;
    right: 20px;
    height: 36px;
    margin-top: -10px;
}

  </style>
  
</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <?php
      // echo json_encode($user_permission);
      $ComposeClass='style="display:block";';

      foreach ($user_permission as $priviledge) 
      {
          $priviledge_key=$priviledge->priviledge_key;
          $status=$priviledge->status;
          if ($priviledge_key=='COMPOSE')
          {
              if($status==1)
              {
                $ComposeClass=' style="display:block"; ';
              } 
              else
              {
                $ComposeClass=' style="display:none"; ';   
              }
          } 
      }

  ?>

  <!-- Page header -->
 
  <!-- /page header -->

  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
      <?php $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="page-header">

          <div class="page-header-content">

            <?php $this->load->view('Admin/includes/panel'); ?>

            <div class="page-title">
              <h4>
                <i class="icon-arrow-left52 position-left"></i>
                <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span
                    class="text-semibold">Dashboard</span></a> -
                <a href="<?php echo base_url('admin/ReportAdmin/Reports/ReportViewCard');?>">
                  <span class="text-semibold">Reports</span></a>
                - Compose Mail
              </h4>
            </div>

          </div>
        </div>
        <!-- CKEditor default -->
        <div class="panel panel-flat flex-fill overflow-auto">
          <div class="panel-heading table_header" style="color: white;">
            <h5 class="panel-title"><?php echo $title;?></h5>
          </div>
          <div class="panel-body">

            <br />
            <form id="FeedbackForm" method="post" style="margin-top: -3%;">
              <!-- Mail details -->
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="align-top py-0" style="width: 1%">
                        <div class="py-2 mr-sm-3">To:</div>
                      </td>
                      
                      <td class="align-top py-0" style="padding: 0;">
                        <div class="d-sm-flex flex-sm-wrap">
                          <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" style="margin-right: 21px;height: 44px;" name="to" value="<?= $email_id; ?>">
                          <ul class="list-inline list-inline-dotted text-nowrap pt-sm-2 pb-2 mb-0 ml-sm-3" style="margin: 10px;font-size: 14px;">
                            <li class="list-inline-item"><a href="#" id="copy">Copy</a></li>
                            <li class="list-inline-item"><a href="#" id="hiddenCopy">Hidden copy</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr id="cc_display" style="display: none;">
                      <td class="align-top py-0" style="width: 1%">
                        <div class="py-2 mr-sm-3">CC:</div>
                      </td>
                      <td class="align-top py-0" style="padding: 0;">
                        <div class="d-sm-flex flex-sm-wrap">
                          <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" style="height: 44px;" name="cc">
                        </div>
                      </td>
                    </tr>
                    <tr id="bcc_display">
                      <td class="align-top py-0" style="width: 1%">
                        <div class="py-2 mr-sm-3">BCC:</div>
                      </td>
                      <td class="align-top py-0" style="padding: 0;">
                        <div class="d-sm-flex flex-sm-wrap">
                          <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" style="height: 44px;" name="bcc" value="<?php echo $emial = ($bcc_email) ? "$bcc_email" : "" ;?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-top py-0">
                        <div class="py-2 mr-sm-3">Subject:</div>
                      </td>
                      <td class="align-top py-0" style="padding: 0;">
                        <div class="d-sm-flex flex-sm-wrap">
                          <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add Subject" style="height: 44px;" name="subject" />
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /mail details -->
              <div class="row">
                <div class="content-group">
                  <textarea name="editor-full" id="editor-full" rows="4" cols="4"> </textarea>
                  <textarea name="inner_page_desc" id="inner_page_desc" hidden></textarea>
                </div>
              </div>


              <div class="text-right" <?= $ComposeClass; ?> >
                <button type="submit" class="btn btn-primary"><i class="icon-paperplane mr-2 position-right"></i> &nbsp;  &nbsp;Send mail </button>
                <span id="loader_gif"></span>
              </div>
            </form>





          </div>
        </div>
      </div>
    </div>

<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
    <!--=======================================  Validation login  ==========================================-->

    <script type="text/javascript">
      $(document).ready(function() {
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
    
      $(document).ready(function(e) {
        $("#FeedbackForm").on('submit', (function(e) {
          
          var content = $('#summernote').summernote('code');
          // var content = CKEDITOR.instances['editor-full'].getData();
          $("#inner_page_desc").val(content);
          if (e.isDefaultPrevented()) {
            //alert('invalid');
          } else {
            $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
            $("#loader_gif").show();
            $.ajax({
              url: "<?php echo base_url('admin/ReportAdmin/Reports/send_email_crm'); ?>",
              type: "POST",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                $("#loader_gif").hide();
                // alert(data);   
                $("#inner_page_desc").val('');
                // alert('Thank for your valuable Feedback !!');
                new PNotify({
                    title: 'Email',
                    text: 'Email Sent Successfully!',
                    type: 'success'
                });

                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail'); ?>";
                }, 3000);


              },
              error: function() {
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
      $('#editor-full').summernote();
    });
      // $(function() {
      //   // Full featured editor
      //   CKEDITOR.replace('editor-full', {
      //     height: '100px',
      //     extraPlugins: 'forms'
      //   });
      //   // Setup
      //   var editor = CKEDITOR.replace('editor-readonly', {
      //     height: '400px'
      //   });

      //   // The instanceReady event is fired, when an instance of CKEditor has finished its initialization.
      //   CKEDITOR.on('instanceReady', function(ev) {

      //     // Show this "on" button.
      //     document.getElementById('readOnlyOn').style.display = '';

      //     // Event fired when the readOnly property changes.
      //     editor.on('readOnly', function() {
      //       document.getElementById('readOnlyOn').style.display = this.readOnly ? 'none' : '';
      //       document.getElementById('readOnlyOff').style.display = this.readOnly ? '' : 'none';
      //     });
      //   });

      //   // Toggle state
      //   function toggleReadOnly(isReadOnly) {
      //     editor.setReadOnly(isReadOnly);
      //   }
      //   document.getElementById('readOnlyOn').onclick = function() {
      //     toggleReadOnly()
      //   }
      //   document.getElementById('readOnlyOff').onclick = function() {
      //     toggleReadOnly(false)
      //   }



      //   // Enter key configuration
      //   // ------------------------------

      //   // Define editor
      //   var editor2;

      //   // Setup editor
      //   function changeEnter() {
      //     // If we already have an editor, let's destroy it first.
      //     if (editor2)
      //       editor2.destroy(true);

      //     // Create the editor again, with the appropriate settings.
      //     editor2 = CKEDITOR.replace('editor-enter', {
      //       height: '400px',
      //       extraPlugins: 'enterkey',
      //       enterMode: Number(document.getElementById('xEnter').value),
      //       shiftEnterMode: Number(document.getElementById('xShiftEnter').value)
      //     });
      //   }

      //   // Run on indow load
      //   window.onload = changeEnter;

      //   // Change configuration
      //   document.getElementById('xEnter').onchange = function() {
      //     changeEnter()
      //   }
      //   document.getElementById('xShiftEnter').onchange = function() {
      //     changeEnter()
      //   }

      //   // We are using Select2 selects here
      //   $('.select').select2({
      //     minimumResultsForSearch: Infinity
      //   })



      //   // Inline editor
      //   // ------------------------------

      //   // We need to turn off the automatic editor creation first
      //   CKEDITOR.disableAutoInline = true;

      //   // Attach editor to the area
      //   var editor3 = CKEDITOR.inline('editor-inline');

      // });
    </script>

    <script>
        $( "#copy" ).click(function() {
              $('#cc_display').toggle();
        });
        $( "#hiddenCopy" ).click(function() {
              $('#bcc_display').toggle();
        });
    </script>




</body>

</html>