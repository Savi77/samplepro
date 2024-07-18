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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- /theme JS files -->
    <style>
        .pnotify-center {
            right: calc(50% - 150px) !important;
        }
    </style>
</head>

<body>
    <!--  Load header value -->
    <?php $this->load->view('BuroAdmin/includes/admin_header'); ?>
    <!-- Page header -->
    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line breadcrumb-line-wide">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('BA/dashboard/view_dashboard'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Terms of Service</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Terms of Service</span> - Manage</h4>
            </div>

            <!-- <div class="heading-elements">
                <div class="heading-btn-group">
                    <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                </div>
            </div> -->

        </div>
    </div>
    <!-- /page header -->

    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <?php $this->load->view('BuroAdmin/includes/sidebar'); ?>
            <!--  -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Hover rows -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Terms of Service</h5>   
                    </div>
                    <hr style="margin: 0;">
                    <?php if (!empty($Terms_of_Service_Data)) { ?>
                        <form class="form-horizontal" id="UpdatePrivacyPolicyFrom" style="padding: 5px 30px;" method="POST">
                            <input type="hidden" name="policies_type" value="<?= $Terms_of_Service_Data->policies_type?>">
                            <input type="hidden" name="policies_id" value="<?= $Terms_of_Service_Data->policies_id?>">
                            <div class="form-group" style="padding-top: 20px;">
                                <div class="col-sm-12">
                                    <textarea name="description" id="description" rows="4" cols="4" required> <?= $Terms_of_Service_Data->policies_section?> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                </div>
                            </div>
                        </form>
                    <?php   }else { ?>
                        <form class="form-horizontal" id="AddPrivacyPolicyFrom" style="padding: 5px 30px;" method="POST">
                            <input type="hidden" name="type" value="Terms_Service">
                            <div class="form-group" style="padding-top: 20px;">
                                <div class="col-sm-12">
                                    <textarea name="description" id="description" rows="4" cols="4" required> </textarea>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                </div>
                            </div>
                        </form>
                    <?php   }   ?>
                </div>
                <!-- /hover rows -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- Footer -->
        <?php $this->load->view('BuroAdmin/includes/admin_footer'); ?>
        <!-- /footer -->
    </div>
    <!-- /page container -->

    <script>
        $(document).ready(function(){
            $("#description").summernote();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#PrivacyPolicyFrom').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Company Name'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#UpdatePrivacyPolicyFrom").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('BA/Policies/Update_Policies'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            new PNotify({
                                title: 'Update Policies',
                                text: 'Update Terms of Service Successfully!',
                                type: 'success',
                                addclass: 'pnotify-center'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/Policies/Terms_of_Service'); ?>";
                            }, 1000);


                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;

            }));
        });

        $(document).ready(function(e) {
            $("#AddPrivacyPolicyFrom").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('BA/Policies/Add_Policies'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            new PNotify({
                                title: 'Add Policies',
                                text: 'Add Terms of Service Successfully!',
                                type: 'success',
                                addclass: 'pnotify-center'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/Policies/Terms_of_Service'); ?>";
                            }, 1000);


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

</body>

</html>