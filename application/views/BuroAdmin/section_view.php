<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuroForce</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/hover.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/user_pages_team.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <style type="text/css">
        .nav-tabs>li>a {
            margin-right: 0;
            color: #e0e0e0;
            border-radius: 0;
        }
        @media (max-width: 768px){
            .nav-tabs:before {
                content: '';
                color: inherit;
                font-size: 12px;
                line-height: 0;
                margin-top: 0;
                margin-left: 0;
                margin-bottom: 0;
                text-transform: uppercase;
                opacity: 0.5;
                filter: alpha(opacity=50);
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('BuroAdmin/includes/admin_header'); ?>
    <div class="page-header">
        <div class="breadcrumb-line breadcrumb-line-wide">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard/view_dashboard'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Section</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Section</span></h4>
            </div>
        </div>
    </div>

    <div class="page-container">
        <div class="page-content">
            <?php $this->load->view('BuroAdmin/includes/sidebar'); ?>
            <div class="content-wrapper">

                <div class="panel panel-flat">
                    <div class="">
                        <div class="panel-body" style="padding:0px;">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab" style="color: white;background: #009fdf;"><i class="icon-image4 position-right"></i> &nbsp;Section List</a></li>
                                    <!-- <li><a href="#right-icon-tab2" data-toggle="tab" style="font-size: 18px;">How We Work Description</i></a></li> -->

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="right-icon-tab1">
                                        <div class="col-md-12">
                                            <table class="table datatable-basic table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Section Name</th>
                                                        <th class="hidden">Index</th>
                                                        <th class="hidden">Title</th>
                                                        <th class="hidden">Title</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $count = 1;
                                                    foreach ($get_list_home as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $count ?></td>
                                                            <td><?= $row->section_name; ?></td>
                                                            <td class="hidden"><?= $row->index ?></td>
                                                            <td class="hidden"></td>
                                                            <td class="hidden"></td>
                                                            <td><?php if ($row->status == 1) { ?>
                                                                    <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->id ?>" onclick="deactivate(this.id)"><span class="label label-success">Show</span></a>
                                                                <?php } else { ?>

                                                                    <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->id ?>" onclick="activate(this.id)"><span class="label label-danger">Hide</span></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php $count++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                                    <input type="text" class="form-control" id="title" name="title" value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="control-label col-sm-2" for="Description">Description <span style="color: red;">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <div class="media-body">
                                                                        <textarea rows="5" cols="5" class="form-control" name="description"></textarea>
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
                </div>
            </div>
        </div>
        <?php $this->load->view('BuroAdmin/includes/admin_footer'); ?>
    </div>



    <!--======================================= Activate & deactivate  ==========================================-->

    <script>
        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Hide this Section?</p>',
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

                var datastring = 'userid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('BA/Section/deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Hide',
                                text: 'Status change successfully !',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Section'); ?>";
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
                text: '<p>Are you sure you want to show this Section?</p>',
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

                var datastring = 'userid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('BA/Section/activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Show',
                                text: 'Status change successfully !',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Section'); ?>";
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


</body>

</html>