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
            padding: 10px 10px;
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
                <li class="active">Login Details</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Login Details</span> </h4>
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
                        <h5 class="panel-title" style="color: white;">Login Details</h5>
                    </div>

                    <div class="panel-heading">
                        <form class="form-horizontal" id="addform">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Login List</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Title <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="login_title" name="login_title" placeholder="Enter Title" maxlength="50" value="<?= $LoginDetails->login_title ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Sub Title <span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="login_sub_title" name="login_sub_title" placeholder="Enter Sub Title" maxlength="500" rows="3"><?= $LoginDetails->login_sub_title ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group p-0 d-flex">
                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-success addButton" style="margin-top:5px;">
                                            <i class="icon-add"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    $lgArray = json_decode($LoginDetails->login_list);
                                    $lgCount = count($lgArray);
                                    if ($lgCount == 0) {
                                ?>
                                    <div class="form-group p-0 d-flex">
                                        <div class="col-sm-12 pr-0">
                                            <textarea class="form-control" name="login_list[]" maxlength="150" rows="1" placeholder="Enter List"></textarea>
                                        </div>
                                    </div>
                                <?php   }else{
                                    $j = 1;
                                    foreach ($lgArray as $lg) {
                                        if ($lg != '') {
                                ?>
                                    <div class="form-group p-0 d-flex">
                                        <div class="col-sm-11 pr-0">
                                            <textarea class="form-control" name="login_list[]" maxlength="150" rows="1" placeholder="Enter List"><?= $lg ?></textarea>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <button type="button" class="btn btn-danger removeButton" style="margin-top:5px">
                                                <i class=" icon-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php   }  }  } ?>
                                
                                <div class="form-group p-0 d-flex hide" id="bookTemplate" style="margin-top: 10px;">
                                    <div class="col-sm-11 pr-0">
                                        <textarea class="form-control" name="login_list[]" maxlength="150" rows="1" placeholder="Enter List"></textarea>
                                    </div>
                                    <div class="col-sm-1 text-right">
                                        <button type="button" class="btn btn-danger removeButton" style="margin-top:5px">
                                            <i class=" icon-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </fieldset>


                            <div class="form-group" style="margin-right: 1%;">
                                <div class="col-sm-offset-3 col-sm-9" style="padding:0px 5px;">
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
           
            brandvalidator = 
                remarkValidator = {
                    row: '.col-xs-11',
                    validators: {
                        notEmpty: {
                            message: 'List is required'
                        }
                    }
                },
                login_title = {
                    validators: {
                        notEmpty: {
                            message: 'Title is required'
                        }
                    }
                },
                login_sub_title = {
                    validators: {
                        notEmpty: {
                            message: 'Sub Title is required'
                        }
                    }
                }
                bookIndex = 0;

            $('#addform')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        'login_list[]': remarkValidator,
                        'login_title' : login_title,
                        'login_sub_title' : login_sub_title,
                    }
                })
                // Add button click handler
                .on('click', '.addButton', function() {
                    bookIndex++;
                    var $template = $('#bookTemplate'),
                        $clone = $template
                        .clone()
                        .removeClass('hide')
                        .removeAttr('id')
                        .attr('data-book-index', bookIndex)
                        .insertBefore($template);

                    // Update the name attributes
                    $clone.find('[name="login_list[]"]').attr('name', 'login_list[]').end();

                    $('#addform').bootstrapValidator('addField', 'login_list[' + bookIndex + ']', remarkValidator);
                })
                // Remove button click handler
                .on('click', '.removeButton', function() {
                    var $row = $(this).parents('.form-group'),
                        index = $row.attr('data-book-index');
                    // Remove element containing the fields
                    $row.remove();
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
                        url: "<?php echo base_url('BA/LoginDetails/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            new PNotify({
                                title: 'Login Details',
                                text: 'Login Details Added Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/LoginDetails'); ?>";
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