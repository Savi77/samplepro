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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <!-- /theme JS files -->
    <!-- /theme JS files -->
    <style type="text/css">
        .nav-tabs>li>a {
            margin-right: 0;
            color: #e0e0e0;
            border-radius: 0;
        }

        fieldset.scheduler-border {
            border: 1px solid #2196f3 !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0% 1.5em 0% !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #2196f3;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 5px 10px;
            border-bottom: none;
            background: #2196f3;
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
                <li class="active">Case Studies</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Case Studies</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <?php if ($AllCount < 4) { ?>
                        <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                    <?php } else { ?>
                        <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                    <?php   } ?>
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
                    <div class="panel-body" style="padding:0px;">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF; padding: 20px;">
                                <li class="active" style="font-size: 18px;">
                                    Case Studies List
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="right-icon-tab1">
                                    <table class="table datatable-basic table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Case Studies Name</th>
                                                <th class="hidden">Question</th>
                                                <th class="hidden">Answer</th>
                                                <th class="hidden">Title</th>
                                                <th class="hidden">Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            //print_r($get_list->result());
                                            $count = 1;
                                            foreach ($get_list as $row) { ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?= $row->case_studies_name ?></td>
                                                    <td class="hidden"></td>
                                                    <td class="hidden"></td>
                                                    <td class="hidden"></td>
                                                    <td class="hidden"></td>
                                                    <td><?php if ($row->status == 1) { ?>
                                                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->case_studies_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                                        <?php } else { ?>

                                                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->case_studies_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <ul class="icons-list">
                                                            <li><a onclick="edit_work(id)" id="<?= $row->case_studies_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit How we work" data-placement="bottom"></i></span></a></li>
                                                            <li><a onclick="del_work(id)" id="<?= $row->case_studies_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete How we work" data-placement="bottom"></i></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php $count++;
                                            } ?>
                                        </tbody>
                                    </table>

                                </div>
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
        <?php $this->load->view('BuroAdmin/includes/admin_footer'); ?>
        <!-- /footer -->
    </div>
    <!-- /page container -->

    <div id="faq_model" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"> Add Case Studies </h6>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Case Studie Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="case_studies_name" name="case_studies_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Image 1<span style="color: red;">*</span></label>
                            <div class="col-lg-10">
                                <div class="media no-margin-top">
                                    <div class="media-left">
                                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_one"></a>
                                    </div>

                                    <div class="media-body">
                                        <input type="file" class="file-styled" id="imgInpOne" name="fileupone">
                                        <p id="error1_one" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                        </p>
                                        <p id="error2_one" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 1MB.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Image 2 <span style="color: red;">*</span></label>
                            <div class="col-lg-10">
                                <div class="media no-margin-top">
                                    <div class="media-left">
                                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_two"></a>
                                    </div>

                                    <div class="media-body">
                                        <input type="file" class="file-styled" id="imgInpTwo" name="fileuptwo">
                                        <p id="error1_two" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                        </p>
                                        <p id="error2_two" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 1MB.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Competitor Analysis <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" class="form-control" id="competitor_analysis" name="competitor_analysis"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Core Development <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" class="form-control" id="core_development" name="core_development"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Define Your Choices <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" class="form-control" id="define_your_choices" name="define_your_choices"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Client <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Category <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Date <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="case_date" name="case_date" placeholder="Enter Date">
                            </div>
                        </div>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"> <i class="icon-link"></i> Link</legend>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Facebook </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Twitter </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Enter Twitter Kink">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Pinterest Link </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pinterest_Link " name="pinterest_Link " placeholder="Enter Pinterest Link ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Instagram </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Live Link </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="live_link" name="live_link" placeholder="Enter Live Link">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_default" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Edit Case Studies</h6>
                </div>

                <div class="modal-body">
                    <div id="complaint_model_data">

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#case_date').datetimepicker({
                format: 'DD MMMM, YYYY',
                useCurrent: true
            });
        });
    </script>
    <!-- ======================= Image preview and validation ======================== -->
    <script type="text/javascript">
        function readURLOne(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img_one').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInpOne").change(function() {
            readURLOne(this);
        });

        function readURLTwo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img_two').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInpTwo").change(function() {
            readURLTwo(this);
        });
    </script>

    <script type="text/javascript">
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInpOne').bind('change', function() {

            var ext = $('#imgInpOne').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1_one').slideDown("slow");
                $('#error2_one').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2_one').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#error2_one').slideUp("slow");
                }
                $('#error1_one').slideUp("slow");

            }
        });

        var b = 0;
        //binds to onchange event of your input field
        $('#imgInpTwo').bind('change', function() {

            var ext = $('#imgInpTwo').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1_two').slideDown("slow");
                $('#error2_two').slideUp("slow");
                b = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2_two').slideDown("slow");
                    b = 0;
                } else {
                    b = 1;
                    $('#error2_two').slideUp("slow");
                }
                $('#error1_two').slideUp("slow");

            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#addform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    case_studies_name: {
                        validators: {
                            notEmpty: {
                                message: 'Competitor Analysis is required'
                            }
                        }
                    },
                    competitor_analysis: {
                        validators: {
                            notEmpty: {
                                message: 'Competitor Analysis is required'
                            }
                        }
                    },
                    core_development: {
                        validators: {
                            notEmpty: {
                                message: 'Core Development is required'
                            }
                        }
                    },
                    fileupone: {
                        validators: {
                            notEmpty: {
                                message: 'Image 1 is required'
                            }
                        }
                    },
                    fileuptwo: {
                        validators: {
                            notEmpty: {
                                message: 'Image 2 is required'
                            }
                        }
                    },
                    define_your_choices: {
                        validators: {
                            notEmpty: {
                                message: 'Define Your Choices is required'
                            }
                        }
                    },
                    client: {
                        validators: {
                            notEmpty: {
                                message: 'Client is required'
                            }
                        }
                    },
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'Category is required'
                            }
                        }
                    },
                    case_date: {
                        validators: {
                            notEmpty: {
                                message: 'Project Date is required'
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

                        url: "<?php echo base_url('BA/Case_Studies/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'Add Record',
                                text: 'Added  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
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
    <!--======================================= Activate & deactivate  ==========================================-->

    <script>
        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Inactive this How we work?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
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
            notice.get().on('pnotify.confirm', function() {

                var datastring = 'workid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('BA/Case_Studies/deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Confirmation ',
                                text: 'Inactive successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
                        }, 800);


                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            })
            // On cancel
            notice.get().on('pnotify.cancel', function() {
                // alert('Oh ok. Chicken, I see.');
            });

        }
    </script>

    <script>
        function activate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to activate this How we work?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
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
            notice.get().on('pnotify.confirm', function() {

                var datastring = 'workid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('BA/Case_Studies/activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Confirmation Form',
                                text: 'Activated successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
                        }, 800);


                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            })
            // On cancel
            notice.get().on('pnotify.cancel', function() {
                // alert('Oh ok. Chicken, I see.');
            });

        }
    </script>

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
        $(document).ready(function(e) {
            $("#sectionform").on('submit', (function(e) {
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    // alert();
                    $.ajax({

                        url: "<?php echo base_url('BA/Case_Studies/Update_header'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'Update Header',
                                text: 'Updated  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
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

    <!--=======================================  delete Event  ==========================================-->

    <script>
        function del_work(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this How we work?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
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
            notice.get().on('pnotify.confirm', function() {

                var datastring = 'workid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('BA/Case_Studies/delete_work'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Delete Case Studies',
                                text: 'Deleted successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
                        }, 800);

                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            })
            // On cancel
            notice.get().on('pnotify.cancel', function() {
                // alert('Oh ok. Chicken, I see.');
            });

        }
    </script>



    <!--======================================= / Delete Event  ==========================================-->

    <script>
        function edit_work(id) {
            var datastring = 'workid=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('BA/Case_Studies/edit_work'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $('#modal_default').modal('show');
                    $('#complaint_model_data').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
        }
    </script>



</body>

</html>