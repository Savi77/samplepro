<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuroForce</title>
    <!-- Global stylesheets -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
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

    <!-- /theme JS files -->
    <style>
        fieldset.scheduler-border {
            border: 1px solid #009fdf !important;
            padding: 0 1.4em 0.4em 1.4em !important;
            margin: 0 2% 1.5em 2% !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #009fdf;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 5px 10px;
            border-bottom: none;
            background: #009fdf;
            color: white;
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
                <li><a href="<?php echo base_url('admin/dashboard/view_dashboard'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Contact Us</span> </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <!-- <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a> -->
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
            <?php $this->load->view('BuroAdmin/includes/sidebar'); ?>
            <!--  -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Hover rows -->
                <div class="panel panel-flat">
                    <div class="panel-heading" style="background-color: #009FDF;">
                        <h5 class="panel-title" style="color: white;">Contact Us List</h5>
                    </div>
                    <!-- <table class="table datatable-basic table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Person Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Message</th>
                                <th class="hidden">Status</th>
                                <th>Contact Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table> -->
                    
                    <div class="panel-heading">
                        <form class="form-horizontal" id="addform" >
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Phone</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Mobile No <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="mob_no" name="mob_no" placeholder="Enter Mobile No" maxlength="10" value="<?= $Contact_details->mob_no?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Tel No <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tel_no" name="tel_no" placeholder="Enter Tel No" maxlength="11" value="<?= $Contact_details->tel_no?>">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Email</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Prinary Email<span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="prinary_email" name="prinary_email" placeholder="Enter Prinary Email" maxlength="30" value="<?= $Contact_details->prinary_email?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Secondary Email <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="secondary_email" name="secondary_email" placeholder="Enter Secondary Email" maxlength="30" value="<?= $Contact_details->secondary_email?>">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Address</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Address <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="50" class="form-control" id="address" name="address" maxlength="150"><?= $Contact_details->address; ?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">About Us</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">About Us <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="50" class="form-control" id="about_us" name="about_us" maxlength="150"><?= $Contact_details->about_us; ?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Socal Link</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Facebook <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link" maxlength="50" value="<?= $Contact_details->facebook_link ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Twitter <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Enter Twitter Link" maxlength="50" value="<?= $Contact_details->twitter_link ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Pinterest <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="pinterest_link" name="pinterest_link" placeholder="Enter Pinterest Link" maxlength="50" value="<?= $Contact_details->pinterest_link ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Instagram <span style="color: red;">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Link" maxlength="50" value="<?= $Contact_details->instagram_link ?>">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9" style="padding:0px 25px;">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    mob_no: {
                        validators: {
                            notEmpty: {
                                message: 'Mobile No is required'
                            }
                        }
                    },
                    tel_no: {
                        validators: {
                            notEmpty: {
                                message: 'Tel No is required'
                            }
                        }
                    },
                    prinary_email: {
                        validators: {
                            notEmpty: {
                                message: 'Prinary Email is required'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            }
                        }
                    },
                    about_us: {
                        validators: {
                            notEmpty: {
                                message: 'About Us is required'
                            }
                        }
                    }
                }
            });
        });
    </script>


    <!--======================================= / Validation login  ==========================================-->
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#addform").on('submit', (function(e) {

                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('BA/ContactUs/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'Contact Us',
                                text: 'Contact Detail Added Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/ContactUs/ContactDetail'); ?>";
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