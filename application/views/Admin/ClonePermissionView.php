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
</head>

<body style="overflow-x: hidden;">

  <?php $this->load->view('Admin/includes/admin_header'); ?>

  
  <!-- Page container -->
  <div class="page-container">
    <div class="page-content">
      <!-- Main sidebar -->
      <?php $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <?php $this->load->view('Admin/includes/panel'); ?>
              <!-- Page header -->
              <div class="page-header">
                <div class="page-header-content">
                  <div class="page-title">
                    <h4>
                      <i class="icon-arrow-left52 position-left"></i>
                      <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
                      <a href="<?php echo base_url('admin/Dashboard/UserManagement'); ?>"> <span class="text-semibold">User Management</span></a>
                       : Assign Roles
                    </h4>
                  </div>
                </div>
              </div>
              <!-- /page header -->
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Assign Roles</h5>
                  <div class="heading-elements">
                  </div>
                </div>
                <div class="row">   
                  <div class="col-md-12">
                    <form method="post" id="CopyPermission" action="<?php echo base_url('admin/UserPermission/CopyPermission'); ?>">
                        <fieldset style="margin-top: 2%;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select User Roles : <sup style="color: red">*</sup></label>
                                    <div class="">
                                        <select name="role_id" id="role_id" class="select-search select2-hidden-accessible">
                                        <option value="">Select Role</option>
                                        <?php foreach ($role_list as $value) { ?>
                                            <option value="<?= $value['role_id']; ?>"><?= $value['role_name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Users : <sup style="color: red">*</sup></label>
                                    <div class="">
                                    <select class="select2-hidden-accessible" name="employee_id[]" id="employee_id" multiple>
                                        
                                        <?php
                                        foreach ($array_users->result() as $row3) {
                                        ?>
                                        <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="col-md-12 text-right">
                                <div class="form-group" style="margin-top:2%;">
                                    <span id="preview44"></span>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Assign Roles
                                        <i class="icon-copy3 position-right"></i>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
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

<!-- Footer -->
<?php  $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->
</body>


<script type="text/javascript">
  $(document).ready(function() {

    $('#employee_id').select2({
        placeholder: 'Select Employee'
    });
    $('#CopyPermission').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        employee_id: {
          validators: {
            notEmpty: {
              message: 'Please Select a Employee'
            }
          }
        },
        role_id: {
          validators: {
            notEmpty: {
              message: 'Please Select a Role'
            }
          }
        },
      }
    });
  });

  $(document).ready(function(e) {
    $("#CopyPermission").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } else {

        $("#preview44").show();
        $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/UserPermission/CopyPermission'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview44").hide();
            
            $(function() {
              new PNotify({
                title: 'Assign Roles',
                text: 'Assign Roles Set Successfully',
                type: 'success'
              });
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/UserPermission/ClonePermission'); ?>";
            }, 2000);
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


</html>