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

        fieldset.scheduler-border {
            border: 1px solid #2196f3 !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0% 1.5em 0% !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #2196f3;
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
                <li class="active">Service Feature</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Service Feature</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                </div>
            </div>

        </div>
    </div>
    <!-- /page header -->
    <?php
    if ($this->session->flashdata('success')) {
        $message = $this->session->flashdata('success');
        echo '<div class="alert alert-success" id="updateMsg" style="margin-top: -70px;width: 30%;right: 0;left: 68%;">' . $message . '</div>';
        $this->session->unset_userdata('message');
    }
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
                                <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab" style="color:white">Service Feature List</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active modal-body" id="right-icon-tab1">
                                    <?php foreach ($edit_work->result() as $value) {    ?>
                                        <form class="form-horizontal" id="EditWorkFormService" enctype="multipart/form-data" action="<?php echo base_url('BA/Service_Feature/update'); ?>" method="POST">
                                            <input type="hidden" class="form-control" id="work_id" name="work_id" placeholder="Enter Language" value="<?= $value->id ?>">

                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="email">Title <span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $value->title ?>" maxlength="40">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Profile</label>
                                                <div class="col-lg-9">
                                                    <div class="media no-margin-top">
                                                        <div class="media-left">
                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah1"></a>
                                                        </div>

                                                        <div class="media-body">
                                                            <input type="file" class="file-styled" id="imgInp1" name="fileup">
                                                            <span><?= $value->profile ?></span>
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
                                                <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea rows="4" cols="50" class="form-control" id="title_description" name="title_description" maxlength="150"><?= $value->description ?> </textarea>
                                                    <span style="color:gray">Max 100 character</span>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label class="control-label col-sm-3" for="email">Detail Content <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="editor_full_edit" name="detail_content"><?= $value->detail_content ?> </textarea>
                                                </div>
                                            </div> -->

                                            <div class="row">
                                                <fieldset class="scheduler-border">
                                                    <legend class="scheduler-border">Detail Content</legend>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title One</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="tilte_one" id="tilte_one" class="form-control" value="<?= $value->tilte_one ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image One</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_one != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_one_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_one_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_one" name="image_one">
                                                                        <p id="image_one_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_one_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content One</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_one" name="detail_content_one"><?= $value->detail_content_one ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title Two</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="tilte_two" id="tilte_two" class="form-control" value="<?= $value->tilte_two ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image Two</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_two != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image_two ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_two_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_two_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_two" name="image_two">
                                                                        <p id="image_two_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_two_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content Two</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_two" name="detail_content_two"><?= $value->detail_content_two?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title Three</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="tilte_three" id="tilte_three" class="form-control" value="<?= $value->tilte_three ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image Three</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_three != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image_three ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_three_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_three_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_three" name="image_three">
                                                                        <p id="image_three_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_three_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content Three</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_three" name="detail_content_three"><?= $value->detail_content_three ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title Four</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="tilte_four" id="tilte_four" class="form-control" value="<?= $value->tilte_four ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image Four</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_four != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image_four ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_four_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_four_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_four" name="image_four">
                                                                        <p id="image_four_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_four_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content Four</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_four" name="detail_content_four"><?= $value->detail_content_four ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title Five</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="title_five" id="title_five" class="form-control" value="<?= $value->title_five ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image Five</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_five != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image_five ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_five_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_five_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_five" name="image_five">
                                                                        <p id="image_five_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_five_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content Five</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_five" name="detail_content_five"><?= $value->detail_content_five ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label class="control-label col-sm-3" for="email">Title Six</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="title_six" id="title_six" class="form-control" value="<?= $value->title_six ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label class="col-lg-3 control-label">Image Six</label>
                                                            <div class="col-lg-9">
                                                                <div class="media no-margin-top">
                                                                    <div class="media-left">
                                                                        <?php if ($value->image_six != '') {  ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $value->image_six ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_six_blah"></a>
                                                                        <?php   } else { ?>
                                                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/cover.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="image_six_blah"></a>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <input type="file" class="file-styled" id="image_six" name="image_six">
                                                                        <p id="image_six_error1" style="display:none; color:#FF0000;">
                                                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                        </p>
                                                                        <p id="image_six_error2" style="display:none; color:#FF0000;">
                                                                            Maximum File Size Limit is 1MB.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label col-sm-3" for="email"> Content Six</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="detail_content_six" name="detail_content_six"><?= $value->detail_content_six ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                                <!-- <div class="tab-pane" id="right-icon-tab2">
                                    <div class="col-md-9 col-md-offset-1">                                        
                                        <form id="sectionform" class="form-horizontal">
                                            <div class="panel panel-flat">
                                                <div class="panel-body">
                                                    <fieldset>
                                                        <legend class="text-semibold">Enter Header Section & Description</legend>
                                                        <div class="form-group col-md-12">

                                                            <label class="control-label col-sm-2" for="Title">Title <span style="color: red;">*</span></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="title" name="title" value="<?= $get_data[0]->title; ?>" maxlength="40">
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
                                </div> -->
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


    <script type="text/javascript">
        $(document).ready(function() {
            $('#editor_full_edit').summernote({
                // your options... and
                maximumImageFileSize: 500 * 1024, // 500 KB
                callbacks: {
                    onImageUploadError: function(msg) {
                        console.log(msg + ' (1 MB)');
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#EditWorkFormService').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Title is required'
                            }
                        }
                    },
                    title_description: {
                        validators: {
                            notEmpty: {
                                message: 'Description is required'
                            }
                        }
                    }
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#EditWorkFormService").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('BA/Service_Feature/update'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            new PNotify({
                                title: 'Update Record',
                                text: 'Updated  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('BA/Service_Feature'); ?>";
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


    <!--============================== Image view on page & Validation ========================================-->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp1").change(function() {
            readURL(this);
        });

        function readURL_image_one(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_one_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_one").change(function() {
            readURL_image_one(this);
        });

        function readURL_image_two(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_two_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_two").change(function() {
            readURL_image_two(this);
        });

        function readURL_image_three(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_three_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_three").change(function() {
            readURL_image_three(this);
        });

        function readURL_image_four(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_four_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_four").change(function() {
            readURL_image_four(this);
        });

        function readURL_image_five(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_five_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_five").change(function() {
            readURL_image_five(this);
        });

        function readURL_image_six(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_six_blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_six").change(function() {
            readURL_image_six(this);
        });
    </script>

    <script type="text/javascript">
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInp1').bind('change', function() {

            var ext = $('#imgInp1').val().split('.').pop().toLowerCase();
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

        $('#image_one').bind('change', function() {

            var ext = $('#image_one').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_one_error1').slideDown("slow");
                $('#image_one_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_one_error1').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_one_error2').slideUp("slow");
                }
                $('#image_one_error1').slideUp("slow");

            }
        });

        $('#image_two').bind('change', function() {

            var ext = $('#image_two').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_two_error1').slideDown("slow");
                $('#image_two_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_two_error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_two_error2').slideUp("slow");
                }
                $('#image_two_error1').slideUp("slow");

            }
        });

        $('#image_three').bind('change', function() {

            var ext = $('#image_three').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_three_error1').slideDown("slow");
                $('#image_three_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_three_error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_three_error2').slideUp("slow");
                }
                $('#image_three_error1').slideUp("slow");

            }
        });

        $('#image_four').bind('change', function() {

            var ext = $('#image_four').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_four_error1').slideDown("slow");
                $('#image_four_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_four_error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_four_error2').slideUp("slow");
                }
                $('#image_four_error1').slideUp("slow");

            }
        });

        $('#image_five').bind('change', function() {

            var ext = $('#image_five').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_five_error1').slideDown("slow");
                $('#image_five_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_five_error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_five_error2').slideUp("slow");
                }
                $('#image_five_error1').slideUp("slow");

            }
        });

        $('#image_six').bind('change', function() {

            var ext = $('#image_six').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#image_six_error1').slideDown("slow");
                $('#image_six_error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#image_six_error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#image_six_error2').slideUp("slow");
                }
                $('#image_six_error1').slideUp("slow");

            }
        });
    </script>
</body>

</html>