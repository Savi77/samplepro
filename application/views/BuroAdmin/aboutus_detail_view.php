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

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <!-- /theme JS files -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style type="text/css">
        .nav-tabs>li>a {
            margin-right: 0;
            color: #e0e0e0;
            border-radius: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
            position: absolute;
            top: 1px;
            right: -7px;
            width: 20px;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 40px;
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
            right: 8px;
        }
    </style>
</head>

<body>
    <!--  Load header value -->
    <?php $this->load->view('BuroAdmin/includes/admin_header'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line breadcrumb-line-wide">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard/view_dashboard'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">About Us</span></h4>
            </div>

            <!-- <div class="heading-elements">
                <div class="heading-btn-group">
                    <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                </div>
            </div> -->

        </div>
    </div>
    <!-- /page header -->
    <?php
    // if ($this->session->flashdata('success')) {
    //     $message = $this->session->flashdata('success');
    //     echo '<div class="alert alert-success" id="updateMsg" style="margin-top: -70px;width: 30%;right: 0;left: 68%;">' . $message . '</div>';
    //     $this->session->unset_userdata('message');
    // }
    ?>
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
                            <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                                <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab" style="color:white">About Us List </a></li>
                            </ul>
                            <div class="panel-heading">
                                <form class="form-horizontal" id="addform" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Image <span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <div class="media no-margin-top">
                                                <div class="media-left">
                                                    <?php if ($Contact_details->image == '') { ?>
                                                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img"></a>    
                                                    <?php   }else { ?>
                                                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/about_us/<?= $Contact_details->image; ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img"></a>
                                                    <?php   }   ?>
                                                    
                                                </div>

                                                <div class="media-body">
                                                    <input type="file" class="file-styled" id="imgInp" name="fileup">
                                                    <p id="error1" style="display:none; color:#FF0000;">
                                                        Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                    </p>
                                                    <p id="error2" style="display:none; color:#FF0000;">
                                                        Maximum File Size Limit is 1MB.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Title <span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="title_name" name="title_name" placeholder="Enter Mobile No" maxlength="50" value="<?= $Contact_details->title_name ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="email">Title Description<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <textarea rows="4" cols="50" class="form-control" id="title_description" name="title_description" maxlength="150"><?= $Contact_details->title_description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9" style="padding:0px 25px;">
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
    <!-- ======================= Image preview and validation ======================== -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>

    <script type="text/javascript">
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInp').bind('change', function() {

            var ext = $('#imgInp').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1').slideDown("slow");
                $('#error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#error2').slideUp("slow");
                }
                $('#error1').slideUp("slow");

            }
        });
    </script>
    <!-- ======================= / Image preview and validation ======================== -->
    <!--=======================================  Validation login  ==========================================-->


    <script type="text/javascript">
        $("#title_description").summernote();
        $(document).ready(function() {
            $('#addform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    title_name: {
                        validators: {
                            notEmpty: {
                                message: 'Title is required'
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
                        url: "<?php echo base_url('BA/AboutUs/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'About Us',
                                text: 'About Us Added Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/AboutUs'); ?>";
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