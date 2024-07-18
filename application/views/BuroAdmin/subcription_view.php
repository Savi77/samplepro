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

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style type="text/css">
        .pnotify-center {
            right: calc(50% - 150px) !important;
        }
        .nav-tabs>li>a {
            margin-right: 0;
            color: #e0e0e0;
            border-radius: 0;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 38px;
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 5px;
            right: 1px;
            width: 20px;
        }

        .select2-search--dropdown .select2-search__field {
            height: 36px;
            padding: 7px 12px !important;
            padding-left: 40px !important;
            border-radius: 3px;
            border: 1px solid #ddd;
            outline: 0;
            width: 100%;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: black;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
            display: inline-block;
            margin-left: 5px;
            margin-top: 5px;
            padding: 0;
            padding-left: 30px;
            padding-right: 5px;
            position: relative;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: bottom;
            white-space: nowrap;
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
                <li class="active">Subcription</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Subcription</span></h4>
            </div>

            <!-- <div class="heading-elements">
	        <div class="heading-btn-group">
	          <a data-toggle="modal" data-target="#Testimonial_modal" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
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
                    <div class="panel-body" style="padding:0px;">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                                <li class="active" style="font-size: 18px;color: black !important;font-weight: 600;"><a href="#right-icon-tab1" data-toggle="tab">Subcription List<i class="icon-menu7 position-right"></i></a></li>
                                <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">Subcription Description</i></a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="right-icon-tab1">
                                    <form class="form-horizontal" id="TestimonialForm" style="padding: 5px 30px;" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="email">Subcription List <span style="color: red;">*</span></label>
                                            <div class="col-sm-12">
                                                <select name="subcriptionList[]" id="subcriptionList" class="form-control" multiple>
                                                    <option value="">Select Email id </option>
                                                    <?php foreach ($subcription_array as $subcription) { ?>
                                                        <option value="<?= $subcription['sub_id']; ?>"><?= $subcription['email_id']; ?></option>
                                                    <?php   }   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Attachment</label>
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <div class="col-md-12">
                                                        <div class="col-xs-10">
                                                            Choose File : <input type="file" name="uploadfileData[]" id="uploadfileData0" class="form-control col-12">
                                                            
                                                        </div>
                                                        <div class="col-xs-2 text-right">
                                                            <button type="button" class="btn btn-success" id="attachSupport" style="margin-top:20px;">
                                                                <i class="icon-add"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div id="moreSupportUpload"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="email">Message <span style="color: red;">*</span></label>
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
                                </div>

                                <div class="tab-pane" id="right-icon-tab2">
                                    <div class="col-md-9 col-md-offset-1">
                                        <!-- Basic legend -->
                                        <form id="sectionform" class="form-horizontal">
                                            <div class="panel panel-flat">
                                                <div class="panel-body">
                                                    <fieldset>
                                                        <legend class="text-semibold">Enter Header Section & Description</legend>
                                                        <div class="form-group col-md-12">

                                                            <label class="control-label col-sm-2" for="Title">Title <span style="color: red;">*</span></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="title" name="title" value="<?= $get_data[0]->title; ?>" maxlength="200">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label col-sm-2" for="Description">Description <span style="color: red;">*</span></label>
                                                            <div class="col-sm-10">
                                                                <div class="media-body">
                                                                    <textarea rows="5" cols="5" class="form-control" name="description" maxlength="300"><?= $get_data[0]->description; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
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

    <!-- edit Testimonial Modal -->
    <div id="modal_default" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Edit Testimonial</h6>
                </div>

                <div class="modal-body">
                    <div id="Testimonial_model_data">

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        var cheque_number = 1;
        $('#attachSupport').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag += '<div class="col-md-12"><div class="col-xs-10">Choose File :<input type="file" name="uploadfileData[]" class="form-control"></div><div class="col-xs-2 text-right"><button type="button" class="btn btn-danger removeButton" onclick="del_file('+cheque_number+')" style="margin-top:20px;"><i class="icon-trash"></i></button></div></div>';
            $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
            cheque_number++;
        });
        function del_file(eleId) {
            var ele = document.getElementById("delete_file" + eleId);
            ele.parentNode.removeChild(ele);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
            $("#subcriptionList").select2({
                placeholder: 'Select Email Id',
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#TestimonialForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    'subcriptionList[]': {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Eamil id'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Message'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {

            $("#TestimonialForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('BA/Subcription/Add_Subcription'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            //alert(data);
                            if (data == 1) {
                                new PNotify({
                                    title: 'Subcription Email',
                                    text: 'Subcription Email Sent Successfully!',
                                    type: 'success',
                                    addclass: 'pnotify-center'
                                });

                                setTimeout(function() {
                                    window.location = "<?php echo base_url('BA/Subcription'); ?>";
                                }, 1000);
                            }else{
                                new PNotify({
                                    title: 'Subcription Email',
                                    text: 'Something went to wrong!',
                                    type: 'error',
                                    addclass: 'pnotify-center'
                                });

                                setTimeout(function() {
                                    window.location = "<?php echo base_url('BA/Subcription'); ?>";
                                }, 1000);
                            }
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
            $('input[placeholder]').placeholderLabel();
        })
        $(document).ready(function() {
            $('textarea[placeholder]').placeholderLabel();
        })
    </script>

    <script type="text/javascript">
        // $(document).ready(function() {
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
        // });
    </script>

    <script type="text/javascript">
        // $(document).ready(function(e) {
        $("#sectionform").on('submit', (function(e) {
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert();
                $.ajax({

                    url: "<?php echo base_url('BA/Subcription/Update_header'); ?>",
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
                            window.location = "<?php echo base_url('BA/Subcription'); ?>";
                        }, 1000);


                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;

        }));
        // });
    </script>
</body>

</html>