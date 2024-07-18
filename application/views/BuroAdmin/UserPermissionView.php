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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
      <!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
      <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- /theme JS files -->
      <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
      <!-- Theme JS files -->
      <!--  -->
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switch.min.js"></script>
      <!--  -->
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
      <!-- <script type="text/javascript" src="assets/admin/assets/js/pages/datatables_responsive.js"></script> -->
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
</head>

<body style="overflow-x: hidden;">

    <?php  $this->load->view('Admin/includes/admin_header'); ?>

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Users
        </h4>
                </div>
                <!--       <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#user_modal" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div> -->
            </div>
        </div>
        <!-- /page header -->
        <!-- Page container -->
        <div class="page-container">
            <div class="page-content">
                <!-- Main sidebar -->
                <?php  $this->load->view('Admin/includes/sidebar'); ?>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading table_header">
                                            <h5 class="panel-title" style="color:white">User Feature Permission</h5>
                                            <div class="heading-elements">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br/>
                                            <div class="col-md-12">  
                                              <div class="col-md-12">  
                                                 <form  method="post"  id="addform">
                                                  <fieldset>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                               <label>Select Employee : <sup style="color: red">*</sup></label>
                                                              <div class="">
                                                                <select class="select-search select2-hidden-accessible" name="employee_id" id="employee_id">
                                                                    <option value="">Select Employee</option>
                                                                    <?php   
                                                                      foreach ($array_users->result() as $row3) 
                                                                      {
                                                                    ?>
                                                                    <option value="<?= $row3->id;?>"><?= $row3->name;?></option>
                                                                   <?php } ?> 
                                                                </select>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"> 
                                                            <div class="form-group" style="margin-top:11%;">
                                                               <button type="submit" class="btn btn-primary">Set Permission
                                                                <i class="icon-arrow-right14 position-right"></i>
                                                              </button>
                                                              <span id="preview12"></span>
                                                            </div>
                                                        </div> 
                                                      </fieldset>
                                                    </form> 
                                                   </div>  
                                                    <form  method="post"  id="permissionform">
                                                       <input type="hidden" name="emp_id" id="emp_id">
                                                       <div class="col-md-12" id="resultdata"></div>         
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
</body>


<script type="text/javascript">
 $(document).ready(function()
  {
    $('#addform').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
                   employee_id: {
                          validators: {
                              notEmpty: {
                                  message: 'Employee is Required'
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
       $("#addform").on('submit',(function(e)
           {  
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {   
                  $("#emp_id").val();            
                  var emp_id=$("#employee_id").val();
                  $("#preview12").show();
                  $("#preview12").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                  $.ajax({
                    url: "<?php echo base_url('admin/UserPermission/GetUserPermission'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                        $("#emp_id").val(emp_id);
                         $("#preview12").hide();
                         $("#resultdata").html(data);
                         // alert(data);
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
  $(document).ready(function (e)
     {
       $("#permissionform").on('submit',(function(e)
           {  
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {
                  
                    $("#preview44").show();
                    $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                      url: "<?php echo base_url('admin/UserPermission/SetUserPermission'); ?>",
                      type: "POST",
                      data:  new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data)
                        {
                           $("#preview44").hide();

                            $("#rsdata").html(data);

                           // alert(data);
                           // alert(data);
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



</html>