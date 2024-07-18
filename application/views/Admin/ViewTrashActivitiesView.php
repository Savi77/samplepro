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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <script src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <style type="text/css">
        thead {
            display: none !important;
        }

        .icon-newspaper2:before {
            content: "\e99b";
            /*color: white !important;*/
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

        .ui-datepicker .ui-datepicker-prev span,
        .ui-datepicker .ui-datepicker-next span {
            display: none !important;
        }

        .ui-datepicker table td.ui-datepicker-current-day .ui-state-active {
            background-color: #26A69A;
            color: #333;
        }

        .table>tbody>tr>td {
            padding: 7px 15px !important;
        }
    </style>

    <style type="text/css">
        .daterange-single {
            z-index: 100000;
        }

        .modal {
            z-index: 20;
        }

        .modal-backdrop {
            z-index: 10;
        }

        ​
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
        .navbar-1 {
    border-bottom: 1px solid transparent;
    -ms-flex-align: stretch;
    align-items: stretch;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    line-height: 1.5715;
    background-color: white !important;
}
.row {
    margin-left: -2px;
    margin-right: -17px;
    padding-top: 27px;
}
.page-header-content {
    position: relative;
    background-color: inherit;
    padding: 4px 4px !important;
}
.heading-elements {
    background-color: inherit;
    position: absolute;
    top: 50%;
    right: -4px;
    height: 36px;
    margin-top: -18px;
}
.label {
    display: inline-block;
    font-weight: 500;
    padding: 1px 4px 0px 4px;
    line-height: 1.5384616;
    border: 1px solid transparent;
    text-transform: uppercase;
    font-size: 10px;
    letter-spacing: 0.1px;
    border-radius: 2px;
    margin-left: -10px !important;
    padding-bottom: 1px !important;
}
    </style>
</head>

<body class="sidebar-xs1">
    <!-- Main navbar -->
    <?php
    $this->load->view('Admin/includes/admin_header');
    $reschedule_count = count($incomplete_issue_list);
    ?>
    <!-- /main navbar -->
    <!-- Page header -->
    <?php
        // echo json_encode($user_permission);
        $AddClass = 'style="display:block";';
        $UploadDataClass = 'style="display:block";';
        $ChangePriorityClass = 'style="display:block";';
        $ViewAllDataClass = 'display:block';
        $DeleteClass = 'display:block';
        foreach ($user_permission as $priviledge) {
            $priviledge_key = $priviledge->priviledge_key;
            $status = $priviledge->status;
            if ($priviledge_key == 'ADD') {
                if ($status == 1) {
                    $AddClass = ' style="display:block"; ';
                } else {
                    $AddClass = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'UPLOADDOC') {
                // echo 11;
                if ($status == 1) {
                    $UploadDataClass = ' style="display:block"; ';
                } else {
                    $UploadDataClass = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'CHANGEPRIORITY') {
                if ($status == 1) {
                    $ChangePriorityClass = 'style="display:block"; ';
                } else {
                    $ChangePriorityClass = 'style="display:none"; ';
                }
            }

            if ($priviledge_key == 'DELETE') {
                if ($status == 1) {
                    $DeleteClass = 'display:block';
                } else {
                    $DeleteClass = 'display:none';
                }
            }

            if ($priviledge_key == 'SCHEDULEVIEWALLEMPLOYEES') {
                if ($status == 1) {
                    $ViewAllDataClass = 'display:block';
                } else {
                    $ViewAllDataClass = 'display:none';
                }
            }
        }
    ?>
    
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
                <div class="page-header">
                    <div class="page-header-content">
                        <?php $this->load->view('Admin/includes/panel'); ?>
                        <div class="page-title">
                            <h4><i class="icon-arrow-left52 position-left"></i>
                            <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span
												class="text-semibold">Dashboard</span></a> - 
                             <span class="text-semibold">View Trash Activites</span></h4>

                        </div>
                        <!-- <div class="heading-elements">
                            <a data-toggle="modal" data-target="#schedule_model" class="btn bg-blue btn-labeled heading-btn" <?= $AddClass; ?>><b><i class="icon-task"></i></b> Add Activity</a>
                        </div> -->
                    </div>
                </div>
                <div class="navbar-1 navbar-default navbar-xs navbar-component">
                    
                    <ul class="nav navbar-nav no-border visible-xs-block">
                        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                    </ul>
                    

                    <div class="row" id="all_activity_filter" style="margin-top: 2%;">
                        <form method="post" class="form-horizontal" id="get_data_form">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">From<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d M Y'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">To<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="completed">Complete</option>
                                        <option value="in_progress">In Progress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
                            </div>
                            <div class="col-md-1">
                                <span id="loader_gif"></span>
                            </div>
                        </form>
                    </div>
                </div>


                <div id="all_activity_view">
                    <?php
                    $pending_cnt = count($issue_list_array);
                    // $quotient = (int)($pending_cnt/2); style="border: 3px solid #18AA2C;"
                    ?>
                    <div class="panel panel-flat">
                        <table class="table datatable-basic1" id="default_issue_table">
                            <tbody>
                                <?php
                                for ($i = 0; $i < $pending_cnt; $i++) {
                                ?>
                                    <tr>
                                        <td class="hidden"></td>
                                        <td class="hidden"><a href="#"></a></td>
                                        <td class="hidden"></td>
                                        <td class="hidden"></td>
                                        <td style="width:100%;background-color: #ffffff;">
                                            <div class="row">
                                                <?php
                                                $ticket_no_1 = $issue_list_array[$i]['ticket_no'];
                                                $issue_1 = $issue_list_array[$i]['issue'];
                                                $check_1 = $issue_list_array[$i]['check'];
                                                $company_name_1 = $issue_list_array[$i]['company_name'];
                                                $created_date_1 = $issue_list_array[$i]['schedule_date'];
                                                $created_on = $issue_list_array[$i]['created_date'];
                                                $priority = $issue_list_array[$i]['priority'];
                                                $status_remark = $issue_list_array[$i]['status_remark'];
                                                $query_1 = $issue_list_array[$i]['query_id'];
                                                $product_name_1 = $issue_list_array[$i]['product_name'];
                                                $action_btn = $issue_list_array[$i]['action_btn'];
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="panel" style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6" align="left">
                                                                            <h6><a href="#">#<?= $ticket_no_1; ?></a></h6>
                                                                        </div>
                                                                        <div class="col-md-6" align="right">
                                                                            <h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_1; ?></h6>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6" align="left">
                                                                            <ul class="list list-unstyled">
                                                                                <li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_1; ?><br /> <i style="font-size: 10px;">Created on <?= $created_on ?></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-6" align="right">
                                                                            <ul class="list list-unstyled ">
                                                                                <li class="dropdown">
                                                                                    <i class=" icon-shrink3"></i>&nbsp;: &nbsp;
                                                                                    <?= $product_name_1 ?>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6" align="left">
                                                                            <ul class="list list-unstyled">
                                                                                <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<?= $issue_list_array[$i]['scheduledatetime']; ?></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
                                                                            <ul class="list list-unstyled ">
                                                                                <li class="dropdown">
                                                                                    <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                                                                    <?= $priority; ?>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="list list-unstyled">
                                                                        <li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1; ?></li>
                                                                    </ul>
                                                                    <div class="row">
                                                                        <div class="col-md-12" align="left">
                                                                            <ul class="list list-unstyled">
                                                                                <li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1; ?></span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <ul>
                                                                <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_list_array[$i]['scheduledatetime']; ?></span></li>
                                                            </ul>

                                                            <ul class="pull-right">
                                                                <li>
                                                                    <!-- $issue_list_array[$i]['status']; -->
                                                                    <ul class="list list-unstyled ">
                                                                        <li class="dropdown"><?= $status_remark ?></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a id="<?= $query_1 ?>" onclick="restore_activity(this.id)"><i class="icon-store2"></i></a></li>
                                                                <li <?= $DeleteClass; ?>><a id="<?= $query_1 ?>" onclick="permanent_delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $record_cnt = $i + 1;
                                                if ($record_cnt < $pending_cnt) {
                                                    $ticket_no_2 = $issue_list_array[$record_cnt]['ticket_no'];
                                                    $issue_2 = $issue_list_array[$record_cnt]['issue'];
                                                    $check_2 = $issue_list_array[$record_cnt]['check'];
                                                    $company_name_2 = $issue_list_array[$record_cnt]['company_name'];
                                                    $created_date_2 = $issue_list_array[$record_cnt]['schedule_date'];
                                                    $created_on_2 = $issue_list_array[$record_cnt]['created_date'];
                                                    $priority_2 = $issue_list_array[$record_cnt]['priority'];
                                                    $status_remark_2 = $issue_list_array[$record_cnt]['status_remark'];
                                                    $query_2 = $issue_list_array[$record_cnt]['query_id'];
                                                    $ticket_no_2 = $issue_list_array[$record_cnt]['ticket_no'];
                                                    $product_name_2 = $issue_list_array[$record_cnt]['product_name'];
                                                    $action_btn_2 = $issue_list_array[$record_cnt]['action_btn'];

                                                ?>
                                                    <div class="col-md-6">
                                                        <div class="panel " style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6" align="left">
                                                                                <h6><a href="#">#<?= $ticket_no_2; ?></a></h6>
                                                                            </div>
                                                                            <div class="col-md-6" align="right">
                                                                                <h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_2; ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6" align="left">
                                                                                <ul class="list list-unstyled">
                                                                                    <li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_2; ?><br /> <i style="font-size: 10px;">Created on <?= $created_on_2 ?></i></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-6" align="right">
                                                                                <ul class="list list-unstyled ">
                                                                                    <li class="dropdown">
                                                                                        <i class=" icon-shrink3"></i>&nbsp;: &nbsp;
                                                                                        <?= $product_name_2 ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6" align="left">
                                                                                <ul class="list list-unstyled">
                                                                                    <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<?= $issue_list_array[$record_cnt]['scheduledatetime']; ?></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
                                                                                <ul class="list list-unstyled ">
                                                                                    <li class="dropdown">
                                                                                        <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                                                                        <?= $priority_2; ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <ul class="list list-unstyled">
                                                                            <li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_2; ?></li>
                                                                        </ul>
                                                                        <div class="row">
                                                                            <div class="col-md-12" align="left">
                                                                                <ul class="list list-unstyled">
                                                                                    <li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_2; ?></span></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <ul>
                                                                    <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_list_array[$record_cnt]['scheduledatetime']; ?></span></li>
                                                                </ul>
                                                                <ul class="pull-right">
                                                                    <li class="dropdown">
                                                                        <i class="icon-hour-glass"></i>&nbsp;: &nbsp;
                                                                        <?= $action_btn_2; ?>
                                                                    </li>
                                                                    <li>
                                                                        <!-- $issue_list_array[$record_cnt]['status']; -->
                                                                        <ul class="list list-unstyled ">
                                                                            <li class="dropdown"><?= $status_remark_2 ?></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a id="<?= $query_2 ?>" onclick="restore_activity(this.id)"><i class="icon-eye"></i></a></li>
                                                                    <li <?= $DeleteClass; ?>><a id="<?= $query_2 ?>" onclick="permanent_delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td class="hidden">22 Jun 1972</td>
                                    </tr>
                                <?php
                                    $i = $record_cnt;
                                } ?>
                            </tbody>
                        </table>
                        <div id="all_activity_filter_table"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    <!-- Footer -->
   
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->

    </div>
    <!-- /page container -->


    <script type="text/javascript">
        $(function() {
            $("#start_date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
            $("#end_date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
            $("#start_date2").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
            $("#end_date2").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
            $("#start_date3").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
            $("#end_date3").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "d M yy"
            });
        });
    </script>


    <script type="text/javascript">
        $(function() {
            $("#default_issue_table").DataTable({
                "language": {
                    "emptyTable": "No Activity For Set Periods !!"
                },
                stateSave: true
            });
        });
    </script>

    <script type="text/javascript">
        function animateCSS(element, animationName, callback) {
            const node = document.querySelector(element)
            node.classList.add('animated', animationName)

            function handleAnimationEnd() {
                node.classList.remove('animated', animationName)
                node.removeEventListener('animationend', handleAnimationEnd)

                if (typeof callback === 'function') callback()
            }
            node.addEventListener('animationend', handleAnimationEnd)
        }


        $(document).ready(function() {
            animateCSS('#default_issue_table', 'zoomIn');
        });
    </script>

    <script type="text/javascript">
        function get_val(val) {
            alert(val);
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#issue_list_grid').DataTable({
                "bProcessing": true,
                "serverSide": true,
                "displayLength": 5,
                "language": {
                    "search": "Filter records:",
                    "searchPlaceholder": "Search by Name"
                },
                "ajax": {
                    url: "<?php echo base_url('admin/Customer/IssueAjaxData'); ?>",
                    type: "post",
                    error: function() {
                        $("#issue_list_grid").css("display", "none");
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>


    <script>
        function activate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to activate this product?</p>',
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
                    url: "<?php echo base_url('admin/Product/activate'); ?>",
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
                            window.location = "<?php echo base_url('admin/Product'); ?>";
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
        function restore_activity(id) {
            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure want to restore for this Activity?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    }, {
                        text: 'No',
                        addClass: 'btn-sm'
                    }]
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

                var datastring = 'query_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/ScheduleManagement/restore_activity'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        PNotify.removeAll();
                        $(function() {
                            new PNotify({
                                title: 'Restore',
                                text: 'Restore Activity Successfully',
                                type: 'success'
                            });
                        });
                        $('#get_data_form').submit();
                        // setTimeout(function()
                        //  {
                        //      window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                        //  }, 1000); 
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

        function permanent_delete_activity(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure want to permanent delete for this Activity?</p>',
                hide: false,
                type: 'warning',
                confirm: {
                    confirm: true,
                    buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    }, {
                        text: 'No',
                        addClass: 'btn-sm'
                    }]
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

                var datastring = 'query_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/ScheduleManagement/permanent_delete_activity'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        PNotify.removeAll();
                        $(function() {
                            new PNotify({
                                title: 'Activity',
                                text: 'Activity Deleted Successfully',
                                type: 'success'
                            });
                        });
                        $('#get_data_form').submit();
                        // setTimeout(function()
                        //  {
                        //      window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                        //  }, 1000); 
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
        $(document).ready(function(e) {
            $("#get_data_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    // alert('invalid');
                    $('#default_issue_table').dataTable().fnClearTable();
                    $('#default_issue_table').dataTable().fnDestroy();

                    $("#default_issue_table").hide();
                    $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif").show();

                    $.ajax({
                        url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_delete_data'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#loader_gif").hide();
                            $("#default_issue_table").hide();
                            $("#all_activity_filter_table").show();
                            $("#all_activity_filter_table").html(data);
                            $('#ajax_table').DataTable();
                            animateCSS('#all_activity_filter_table', 'zoomIn');
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