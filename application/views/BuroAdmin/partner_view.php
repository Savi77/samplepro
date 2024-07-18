
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

   <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>


  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script> 
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
  <!-- /theme JS files -->

  <style type="text/css">
    
    @media only screen and (max-width: 600px) 
    {
      .mobile_ui 
      {
        padding: 18px !important;
      }
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
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Partner
        </h4>
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
        <!-- Basic responsive configuration -->
            <div class="panel panel-flat" >
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Partner</h5>
                  <div class="heading-elements">
                    <td> 
                        <a class="btn btn-info btn-lg" onclick="view_code()" style="background-color: #009FDF; border-color: #009FDF;">
                          <span class="glyphicon glyphicon-eye-open" data-popup="tooltip" title="View Code" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                        </a>
                     </td>
                  </div>
                </div>
                  <form class="form-horizontal" id="partnerForm">
                      <br><br>
                      <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <div class="form-group mobile_ui">
                              <label class="control-label col-sm-3" for="email" style="font-size: 18px">http://www.dexterityindia.com/</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="partner_code" name="partner_code" placeholder="Enter Partner Code" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6" >
                              </div>
                            </div>
                            <div class="form-group mobile_ui"> 
                              <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                              </div>
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


             <div id="modal_default" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Code List</h6>
                      </div>

                      <div class="modal-body">
                          <div id="code_model_data">

                          </div>
                     </div>

                    </div>
                  </div>
             </div>



<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#partnerForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               partner_code: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Partner Code'
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
             $("#partnerForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Partner/add_code');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    // alert(data);
                                      if (data==1)
                                      {
                                          new PNotify({
                                                            title: 'Partner Code',
                                                            text: 'Partner code Added Successfully',
                                                            type: 'success'
                                                           });

                                            setTimeout(function()
                                           {

                                            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
                                            {
                                                window.location="https://play.google.com/store/apps/details?id=in.ileaf.ecommerceapp&hl=en";
                                            }
                                            else
                                            {
                                                window.location="http://www.dexterityindia.com";
                                            }




                                           }, 1000);
                                      }
                                      else if(data==2)
                                      {
                                            new PNotify({
                                                            title: 'Partner Code',
                                                            text: 'Partner Code is already exist',
                                                            type: 'warning'
                                                           });
                                      }
                                      else
                                      {
                                             new PNotify({
                                                            title: 'Partner Code',
                                                            text: 'Failed to submit Partner code',
                                                            type: 'warning'
                                                           });
                                             
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

<script>
    function view_code()
    {
      // alert();
      var id = '1';
      var datastring = 'userid='+id;
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Partner/code_list'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
              // alert(data);
            $('#modal_default').modal('show');
            $('#code_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>
</body>
</html>
