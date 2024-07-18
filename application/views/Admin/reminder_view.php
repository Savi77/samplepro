<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('Admin/includes/header'); ?>
    <!-- Global stylesheets -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
    <link href="<?= base_url() ?>assets/admin/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/jquery-ui.js"></script>
    <!-- /theme JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js">

    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
        });
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <style type="text/css">
        .icon-newspaper2:before {
            content: "\e99b";
        }
        .select2-selection--multiple .select2-selection__choice {
            background: #1c2428;
            border-radius: 20px;
            display: list-item;
            padding: 1px 8px;
        }
    </style>
    <style type="text/css">
        .nav-tabs.nav-tabs-bottom>li {
            margin-bottom: -4px;
        }

        .badge {
            padding: 1px 7px 0px 7px !important;
            font-size: 14px;
        }
    </style>
    <style type="text/css">
        tr.group,
        tr.group:hover {
            background-color: rgb(103, 98, 98) !important;
            color: white !important;
            font-size: 14px !important;
            font-weight: 600 !important;
        }

        .dataTables_length>label>span:first-child {
            float: left;
            margin: 5px 9px;
            margin-left: -15px;
        }

        .datatable-header>div:first-child,
        .datatable-footer>div:first-child {
            margin-left: 20px !important;
            left: -13px !important;
        }

        .dataTables_length {
            margin-right: 11px !important;
        }

        input,
        button,
        select,
        textarea {
            height: auto !important;
        }

        .btn-info {
            color: #fff;
            background-color: rgba(236, 14, 39, 0.77) !important;
            border-color: rgba(236, 14, 39, 0.77) !important;
        }

        .nav-tabs>li>a {
            margin-right: 0;
            color: #ddd !important;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 6px;
            border-bottom: 1px solid #111;
        }

        .nav-tabs[class*=bg-]>.active>a {
            background-color: rgba(0, 0, 0, 0.4) !important;
        }

        .dataTables_length>label>span:first-child {
            float: left;
            margin: 5px 9px;
            margin-left: -15px;
        }

        .datatable-header>div:first-child,
        .datatable-footer>div:first-child {
            margin-left: 20px !important;
            left: 0px !important;
        }

        .dataTables_length {
            margin-right: 11px !important;
        }
    </style>

    <style type="text/css">
        .ui-datepicker table td.ui-state-disabled span {
            color: #2d2d2d;
        }

        .ui-datepicker table td.ui-datepicker-today .ui-state-highlight {
            background-color: #2196F3;
            color: #252424;
        }

        .testing {
            z-index: 100000;
        }

        .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
            font-size: 12px;
            color: #333232;
            margin-left: 5px;
        }

        .ui-datepicker table td.ui-datepicker-current-day .ui-state-active {
            background-color: #26A69A;
            color: #333;
        }

        .table>tbody>tr>td {
            padding: 7px 15px !important;
        }
    </style>

    <style>

    </style>
    <style>
        #blinklink {
            animation: blinklink 1.5s linear infinite;
        }

        @keyframes blinklink {
            100% {
                opacity: 0;
            }
        }

        .panel-body {
            padding: 10px !important;
        }

        .panel {
            margin-bottom: 4px !important;
        }
    </style>

    <style type="text/css">
        .panel-footer {
            padding: 0 10px !important;
        }

        /* margin-bottom: 20px !important; */
        .content-group {
            margin-bottom: 0px !important;
        }

        td.dataTables_empty {
            color: red !important;
            font-size: 15px;
            font-weight: 500;
        }

        .badge-danger {
            background-color: #f00;
            border-color: #f00;
        }
    </style>
</head>

<body class="sidebar-xs1">
    <?php $this->load->view('Admin/includes/admin_header'); ?>
    <!-- /page header -->
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <?php $this->load->view('Admin/includes/sidebar'); ?>
            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <?php $this->load->view('Admin/includes/panel'); ?>
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4>
                                <i class="icon-arrow-left52 position-left"></i>
                                <a href="<?= base_url() ?>admin/Dashboard/view_dashboard"> <span class="text-semibold">Dashboard</span></a> - Reminder List
                            </h4>
                        </div>
                        <div class="heading-elements">
                            <a data-toggle="modal" data-target="#interest_model" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-bell3"></i></b> Add Reminder
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-heading table_header">
                        <h5 class="panel-title" style="color:white">Reminder </h5>
                    </div>

                    <table class="table table-responsive" id="reminder_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Planned Date/Time</th>
                                <th>Reminder Date & Time </th>
                                <th>Notify By</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                foreach ($get_data->result() as $row) { 
                                    $a = new DateTime(date('H:i:s',strtotime($row->reminder_time)));
                                    $b = new DateTime(date('H:i:s',strtotime($row->reminder_before_time)));
                                    $interval = $a->diff($b);
                                    $timeDiff = $interval->format("%H:%i");	
                            ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?= $row->reminder_title ?></td>
                                    <td><?= $row->module_name ?></td>
                                    <td><?= date('d M, Y', strtotime($row->reminder_date)) ?> / <?= date('H:i A',strtotime($row->reminder_time)) ?></td>
                                    <td>
                                        <?= date('d M, Y', strtotime($row->reminder_date)) ?> / <?= date('H:i A',strtotime($timeDiff)) ?>
                                    </td>
                                    <td> <?= $row->notify_by ?> </td>
                                    <td class="text-center">
                                        <?php   if($row->recurring_set == 1){   ?>
                                            <a href="<?= base_url() ?>admin/Reminder/View/<?= $row->reminder_id; ?>" >
                                                <span class="label bg-info" style="line-height: 20px;"><i class="icon-eye" style="font-size: 15px;" data-toggle="tooltip" title="Edit schedule" data-placement="bottom"></i></span>
                                            </a>
                                        <?php    }else {    ?>
                                            <ul class="icons-list">
                                                <li><a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->reminder_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit schedule" data-placement="bottom"></i></span></a></li>
                                                <li><a onclick="del_client(id)" id="<?= $row->reminder_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete schedule" data-placement="bottom"></i></span></a></li>
                                            </ul>
                                        <?php    }  ?>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                
                <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title"><i class="icon-bell3"></i>&nbsp;&nbsp; Add Reminder</h6>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" id="ReminderForm">
                                    <div class="panel-flat">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Reminder Title <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="reminder_title" name="reminder_title" placeholder="Enter Reminder Title" maxlength="50">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Reminder Date<span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        <input type="text" class="form-control schedule_date_select" id="reminder_date" name="reminder_date" value="<?= date('d M Y'); ?>" placeholder="Enter Reminder Date" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Reminder Time <span style="color: red;">*</span></label>
                                                <div class="col-sm-8 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" class="form-control" id="reminder_time" name="reminder_time" placeholder="Please select Reminder Time" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">User </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="user_id[]" id="rmd_user_id" multiple>
                                                        <option value="">Select Company</option>
                                                        <?php foreach ($getUserSysyemList as $value) { ?>
                                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="reminder_before_time" id="reminder_before_time">
                                                        <option value="">Select Company</option>
                                                        <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Notify By <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="reminder_notify_by" id="reminder_notify_by">
                                                        <option value="">Select Notify By</option>
                                                        <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="email">Notes <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Comments" maxlength="500"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="control-label col-sm-4" for="email">Recurring <span style="color: red;">*</span></label>
												<div class="col-sm-8">
													<select class="form-control" name="recurring_set" id="recurring_set" onchange="showDataRecurringData(this.value)">
														<option value="">Select Recurring</option>
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
												</div>
											</div>
                                            <div id="recuuringDataAdd" style="display: none;clear:both">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="email">Recurring Interval </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="interval_type" id="interval_type">
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="email">Recurring EOD</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="recurringEOD" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i> </button>
                                                    <span id="preview"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title"><i class="icon-bell3"></i>&nbsp;&nbsp;&nbsp;Edit Reminder</h6>
                            </div>

                            <div class="modal-body">
                                <div id="complaint_model_data1">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->

    <script>
        $(document).ready(function(){
            $('#recurringEOD').datetimepicker({
				format: 'DD MMMM, YYYY',
				useCurrent: true,
			});
        }); 
        function showDataRecurringData(id){
			if(id == 1){                
				$('#recuuringDataAdd').show();
			}else{
				$('#recuuringDataAdd').hide();
			}
		}
        $(document).ready(function() {
            var groupColumn = 2;
            var table = $('#reminder_table').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": groupColumn
                }],
                "order": [
                    [groupColumn, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(groupColumn, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
            $("#rmd_user_id").select2({
                dropdownParent: $("#interest_model")
            });
        });

        $('#reminder_date').change(function() {
            $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_date');
        });

        $('#reminder_time').change(function() {
            $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_time');
        });

        $(document).ready(function() {
            $('#reminder_date').datetimepicker({
                format: 'DD MMMM, YYYY',
                useCurrent: true,
            });
            $('.clockpicker').clockpicker({
                placement: 'bottom',
                align: 'bottom',
                donetext: 'Done',
                minTime: '12:00'
            });
        });

        $(document).ready(function() {
            $('#ReminderForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    reminder_date: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Reminder Date'
                            }
                        }
                    },
                    reminder_time: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Reminder Time'
                            }
                        }
                    },
                    reminder_title: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Reminder Title'
                            }
                        }
                    },
                    reminder_before_time:{
                        validators: {
                            notEmpty: {
                                message: 'Please Select Reminder Before Time.'
                            }
                        }
                    },
                    reminder_notify_by:{
                        validators: {
                            notEmpty: {
                                message: 'Please Select Reminder Notify By.'
                            }
                        }
                    },
                    reminder_note:{
                        validators: {
                            notEmpty: {
                                message: 'Please Select Reminder Before Time.'
                            }
                        }
                    },
                    recurring_set:{
                        validators: {
                            notEmpty: {
                                message: 'Please Select Recurring.'
                            }
                        }
                    }

                }
            });
        });

        $(document).ready(function(e) {
            $("#ReminderForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                        url: "<?php echo base_url('admin/Reminder/add_reminder'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview").hide();
                            
                            $(function() {
                                new PNotify({
                                    title: 'Reminder Form',
                                    text: 'Added  Successfully',
                                    type: 'success'
                                });
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Reminder'); ?>";
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

        function edit_client(id) {
            var datastring = 'reminder_id=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Reminder/edit_reminder'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    $('#modal_default1').modal('show');
                    $('#complaint_model_data1').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }

        function del_client(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this Reminder?</p>',
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

                var datastring = 'reminder_id=' + id;
                // alert(datastring);return false;
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Reminder/delete_reminder'); ?>",
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
                            window.location = "<?php echo base_url('admin/Reminder'); ?>";
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
</body>

</html>