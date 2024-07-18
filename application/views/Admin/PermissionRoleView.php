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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
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
<style>
    .sidebar-default .navigation li > a {
    color: #fcfcfc !important;
}
.sidebar-default {
    color: white !important;
}
</style>
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
                                                <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> 
                                                - 
                                                <a href="<?php echo base_url('admin/Dashboard/UserManagement'); ?>"> <span class="text-semibold">User Management</span></a>
                                                : Role Permission
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
                            <div class="panel panel-flat">
                                <div class="panel-heading table_header">
                                    <h5 class="panel-title" style="color:white">Role Permission</h5>
                                    <div class="heading-elements">
                                    </div>
                                </div>
                                <div class="row">
                                    <br />
                                    <div class="col-md-12">
                                        <table class="table datatable-responsive">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Role Name</th>
                                                <th class="hidden"></th>
                                                <th class="hidden"></th>
                                                <th class="hidden">Status</th>
                                                <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php $i = 1;  foreach ($role_list as $value) { ?>
                                                    <tr>
                                                        <td><?= $i; $i++; ?></td>
                                                        <td><?= $value['role_name'] ?></td>
                                                        <td class="hidden"></td>
                                                        <td class="hidden"></td>
                                                        <td class="hidden">Status</td>
                                                        <td>
                                                            <ul class="icons-list" style="display: flex;">
                                                                <li><a data-toggle="modal" onclick="edit_permission(id)" id="<?= $value['role_id']; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit group" data-placement="bottom"></i></span></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php   }   ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
                    <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" style="margin-top: -4px">
                        <i class="icon-calendar" style="zoom:1.1; "></i>
                        &nbsp;Add Role Permission
                    </h5>
                </div>
                <div class="modal-body" style="padding: 0px;">
                    <form method="post" id="rolePermissionForm">
                        <fieldset style="margin-top: 2%;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role : <sup style="color: red">*</sup></label>
                                    <div class="">
                                        <input type="text" name="role" id="role" class="form-control" placeholder="Role">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role Description : <sup style="color: red">*</sup></label>
                                    <div class="">
                                        <textarea name="role_description" id="role_description" class="form-control" rows="1" maxlength="150" placeholder="Role Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <table class="table">
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($feature_list as $row) {
                                        $collapse = "demo" . $i;
                                        $privilege = $row['privilege'];
                                        $component_id = $row['component_id'];
                                    ?>
                                        <tr>
                                            <td style="width: 25%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;"><b><?= $row['component_title']; ?></b></td>
                                            <td style="width: 75%;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <?php
                                                        $checkbox = 1;

                                                        foreach ($privilege as  $row) {
                                                            $custom_id = $component_id . '/' . $row->privilege_id;
                                                        ?>
                                                            <div class="col-md-2">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="feature_ids[]" class="styled" value="<?= $custom_id; ?>">
                                                                        <?= $row->privilege;  ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        <?php
                                                            $checkbox++;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <div class="col-md-12 text-right">
                                <div class="form-group" style="margin-top:2%;">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit
                                        <i class="icon-arrow-right14 position-right"></i>
                                    </button>
                                    <span id="preview12"></span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info" style="background-color:#009FDF;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><i class="icon-insert-template" style="zoom:1.1; "></i>
            &nbsp; &nbsp;Edit Role Permission</h6>
          </div>

          <div class="modal-body">
            <div id="complaint_model_data1">

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
        
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#addform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#emp_id").val();
                var emp_id = $("#employee_id").val();
                $("#preview12").show();
                $("#preview12").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                $.ajax({
                    url: "<?php echo base_url('admin/UserPermission/GetUserPermission'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#emp_id").val(emp_id);
                        $("#preview12").hide();
                        $('#preLoadForm').hide();
                        $("#resultdata").html(data);
                        // alert(data);
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
    $('#rolePermissionForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            role: {
                validators: {
                    notEmpty: {
                        message: 'Role is Required'
                    }
                }
            },
            role_description: {
                validators: {
                    notEmpty: {
                        message: 'Role Description is Required'
                    }
                }
            },
        }
    });
    $(document).ready(function(e) {
        $("#rolePermissionForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview44").show();
                $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $('#submitBtn').prop('disabled', true);
                $.ajax({
                    url: "<?php echo base_url('admin/UserPermission/SetRolePermission'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview44").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $(function() {
                            new PNotify({
                                title: 'Assign Module Permission',
                                text: 'Permission Set Successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/UserPermission/PermissionRole'); ?>";
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

    function edit_permission(id) {
        var datastring = 'role_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/UserPermission/edit_mastergroup'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
            //alert(data);
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);
            },
            error: function() {
            alert('Error while request..');
            }
        });

    }
</script>


</html>