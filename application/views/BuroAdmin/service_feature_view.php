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
                    <?php if ($AllCount < 7) { ?>
                        <!-- <a data-toggle="modal" data-target="#faq_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus 
                        text-primary"></i><span>ADD</span></a> -->
                        <a href="<?= base_url();?>BA/Service_Feature/add_service" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <!-- /page header -->
    <?php
        if($this->session->flashdata('success')) {
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
                                <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Service Feature List<i class="icon-menu7 position-right"></i></a></li>
                                <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">Service Feature Description</i></a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="right-icon-tab1">
                                    <table class="table datatable-basic table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Question</th>
                                                <th>Answer</th>
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
                                                    <td><img class="img-thum" style="height:32px;width:32px;" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $row->image ?>"></td>
                                                    <td><?= $row->title ?></td>
                                                    <td><?= $row->description ?></td>
                                                    <td class="hidden"><?= $row->title ?></td>
                                                    <td class="hidden"><?= $row->title ?></td>
                                                    <td><?php if ($row->status == 1) { ?>
                                                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                                        <?php } else { ?>

                                                            <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <ul class="icons-list">
                                                            <!-- <li><a onclick="edit_work(id)" id="<?= $row->id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Service Feature" data-placement="bottom"></i></span></a></li> -->
                                                            <li><a href="<?= base_url();?>BA/Service_Feature/edit_service/?id=<?= $row->id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Service Feature" data-placement="bottom"></i></span></a></li>
                                                            <li><a onclick="del_work(id)" id="<?= $row->id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Service Feature" data-placement="bottom"></i></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php $count++;
                                            } ?>
                                        </tbody>
                                    </table>

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

    <div id="faq_model" class="modal fade" style="overflow-y: scroll !important;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"> Add Service Feature </h6>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="addform">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Image <span style="color: red;">*</span></label>
                            <div class="col-lg-10">
                                <div class="media no-margin-top">
                                    <div class="media-left">
                                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img"></a>
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
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title1" name="title" placeholder="Enter Title" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Description <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" class="form-control" id="title_description" name="title_description" maxlength="100"> </textarea>
                                <span style="color:gray">Max 100 character</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Detail Content <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <textarea rows="4" cols="50" class="form-control" id="detail_content" name="detail_content" maxlength="150"> </textarea>
                            </div>
                        </div>

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


    <div id="edit_service" class="modal fade" style="overflow-y: scroll !important;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <h6 class="modal-title">Edit Service Feature</h6>
                </div>

                <div class="modal-body">
                    <div id="complaint_model_data">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ======================= Image preview and validation ======================== -->
    <script type="text/javascript">
        $('#detail_content').summernote();

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

        
        setTimeout(function(){
            $( "#updateMsg" ).fadeOut( "slow" );
        },2000);
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#addform').bootstrapValidator({
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
                    },
                    fileup: {
                        validators: {
                            notEmpty: {
                                message: 'Image is required'
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

                        url: "<?php echo base_url('BA/Service_Feature/add'); ?>",
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




    <!--======================================= Activate & deactivate  ==========================================-->

    <script>
        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Inactive this Service Feature?</p>',
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
                    url: "<?php echo base_url('BA/Service_Feature/deactivate'); ?>",
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
                            window.location = "<?php echo base_url('BA/Service_Feature'); ?>";
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
                text: '<p>Are you sure you want to activate this Service Feature?</p>',
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
                    url: "<?php echo base_url('BA/Service_Feature/activate'); ?>",
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
                            window.location = "<?php echo base_url('BA/Service_Feature'); ?>";
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

                        url: "<?php echo base_url('BA/Service_Feature/Update_header'); ?>",
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

    <!--=======================================  delete Event  ==========================================-->

    <script>
        function del_work(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this Service Feature?</p>',
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
                    url: "<?php echo base_url('BA/Service_Feature/delete_work'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Delete Service Feature',
                                text: 'Deleted successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Service_Feature'); ?>";
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
                url: "<?php echo base_url('BA/Service_Feature/edit_work'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $('#edit_service').modal('show');
                    $('#complaint_model_data').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
        }
        $('#edit_service').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>



</body>

</html>