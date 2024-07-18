<?php $this->load->view('Admin/includes/master_header'); ?>
<?php $this->load->view('Admin/includes/admin_header'); ?>

<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <?php $this->load->view('Admin/includes/sidebar'); ?>

        <!-- Main content -->
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
                                        <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
                                        <a href="<?php echo base_url('admin/Master/view_master'); ?>"> <span class="text-semibold">Masters</span></a> - Time Slot List
                                    </h4>
                                </div>

                                <div class="heading-elements">
                                    <div class="heading-btn-group">
                                        <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /page header -->

                        <!-- Basic responsive configuration -->
                        <div class="panel panel-flat">
                            <div class="panel-heading table_header">
                                <h5 class="panel-title" style="color:white">Time Slot</h5>
                                <div class="heading-elements">
                                    <td>
                                        <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                        <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Client" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                      </a> -->
                                    </td>
                                </div>
                            </div>

                            <table class="table datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Time Slot</th>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($get_timeslot_data as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?= $row->time_slot ?></td>
                                            <td class="hidden"></td>
                                            <td class="hidden"></td>
                                            <td><?php if ($row->status == 0) { ?>
                                                    <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->time_id ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                                <?php } else { ?>
                                                    <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->time_id ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list" style="display: flex;">
                                                    <li>
                                                        <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->time_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Time Slot" data-placement="bottom"></i></span></a>
                                                    </li>
                                                    <li>
                                                        <a onclick="del_client(id)" id="<?= $row->time_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Time Slot" data-placement="bottom"></i></span></a>
                                                    </li>
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

    </div>
    <!-- /basic responsive configuration -->

    <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"> Add Time Slot</h6>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" id="TimeSlotForm">


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Time Slot <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="time_slot" name="time_slot" placeholder="Enter Time Slot" maxlength="50" onkeypress="return Validate(event);">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="addTimeSlotModule" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"><i class="icon-location3" style="zoom:1.1; "></i>
                        &nbsp; &nbsp;Edit Time Slot</h6>
                </div>

                <div class="modal-body">
                    <div id="complaint_model_data1">

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->

    <!--=======================================  Validation login  ==========================================-->

    <script type="text/javascript">
        function Validate(e){
            var keyCode = e.keyCode || e.which;

            var pattern = /^[0-9\d\s:]+$/i;

            var isValid = pattern.test(String.fromCharCode(keyCode));
            
            return isValid
        }
        $(document).ready(function() {
            $('#TimeSlotForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Time Slot'
                            }
                        }
                    },
                    url: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter URL'
                            }
                        }
                    },

                    fileup: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Image for Home Page'
                            }
                        }
                    },

                    fileup1: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Image for Landing Page'
                            }
                        }
                    },

                    emailid: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required.'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'The value is not a valid email address'
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
            $("#TimeSlotForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/add_time'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $(function() {
                                new PNotify({
                                    title: 'Register Form',
                                    text: 'Added  Successfully',
                                    type: 'success'
                                });
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Master/time_list'); ?>";
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
        function del_client(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this Time Slot?</p>',
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

                var datastring = 'locationid=' + id;
                //alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/delete_location'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Delete Form',
                                text: 'Deleted successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Master/time_list'); ?>";
                        }, 1000);


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
        function edit_client(id) {
            var datastring = 'time_slot_id=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/edit_time_slot'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // response = JSON.parse(data);
                    // alert(response.time_id);
                    // alert(response.time_slot);
                    $('#addTimeSlotModule').modal('show');
                    $('#complaint_model_data1').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('input[placeholder]').placeholderLabel();
        })
        $(document).ready(function() {
            $('textarea[placeholder]').placeholderLabel();
        })
    </script>


    <!--======================================= Activate & deactivate  ==========================================-->

    <script>
        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Inactive this Time Slot?</p>',
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

                var datastring = 'time_slot_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/time_slot_deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Time Slot',
                                text: 'Inactive successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Master/time_list'); ?>";
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
                text: '<p>Are you sure you want to activate this Time Slot?</p>',
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

                var datastring = 'time_slot_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/time_slot_activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Time Slot',
                                text: 'Activated successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Master/time_list'); ?>";
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


    <!--======================================= / Activate & Deactivate ==========================================-->


    </body>

    </html>