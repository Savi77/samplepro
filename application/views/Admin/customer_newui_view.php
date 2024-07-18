<!DOCTYPE html>
<html lang="en">

<head>

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
    <style type="text/css">
        tr.group,
        tr.group:hover {
            background-color: #c1dff7 !important;
            color: #484848 !important;
            font-size: 14px !important;
            font-weight: 600 !important;
        }

        .has-success .help-block,
        .has-success .control-label,
        .has-success .radio,
        .has-success .checkbox,
        .has-success .radio-inline,
        .has-success .checkbox-inline,
        .has-success.radio label,
        .has-success.checkbox label,
        .has-success.radio-inline label,
        .has-success.checkbox-inline label {
            color: black;
        }

        .dataTables_length>label>span:first-child {
            float: left;
            margin: 5px 9px;
            margin-left: -15px;
        }

        .datatable-footer>div:first-child {
            margin-left: 9px !important;
            left: -13px !important;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #ffffff !important;
        }

        .pickadate {
            z-index: 100000;
        }



        ​ .sidebar-main {
            z-index: 0 !important;
        }

        .open>.dropdown-menu {
            display: block;
            padding: 4px;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: -31px !important;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 13px;
            text-align: left;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
            box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
            background-clip: padding-box;
        }
    </style>
    <style type="text/css">
        /* Select css override */
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            list-style: none;
            padding: 0;
            display: table-header-group;
        }

        .select2-selection--multiple .select2-selection__choice {
            background: #1c2428;
            border-radius: 20px;
            display: list-item;
            padding: 1px 8px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 5px;
            right: 1px;
            width: 20px;
        }

        .select2-container .select2-search--inline .select2-search__field {
            background: transparent;
            border: none;
            outline: 0;
            box-shadow: none;
            -webkit-appearance: textfield;
            width: 200% !important;
        }

        .select2-search--dropdown .select2-search__field {
            padding-left: 10%;
            width: 100%;
            box-sizing: border-box;
        }

        /* Select css override */
        .multiselect-container>li>a>label.checkbox {
            margin: -6px 12px;
        }

        .multiselect-container {
            min-width: 275px;
            max-height: 250px;
            overflow-y: auto;
        }

        .btn-group>.btn:first-child {
            margin-left: 0;
            width: 275px !important;
        }

        fieldset.scheduler-border {
            border: 1px solid #2196F3 !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0% 1.5em 0% !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #2196F3;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 5px 10px;
            border-bottom: none;
            background: #2196F3;
            color: white;
        }

        label {
            margin-bottom: 6px;
            font-weight: 550;
        }

        .datatable-header>div:first-child,
        .datatable-footer>div:first-child {
            margin-left: 10px !important;
            left: 0 !important;
        }

        input,
        button,
        select,
        textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            padding: 5px;
            border: 1px solid #dddddd;
        }

        .dataTables_length {
            float: right;
            display: inline-block;
            margin: 0px 20px 20px 20px;
        }
    </style>

</head>

<body style="overflow-x: hidden;">

    <?php $this->load->view('Admin/includes/admin_header'); ?>
    <?php
    if ($this->session->user_type == 'SA' or $this->session->update_permission == '1') {
        $cust_update = "";
    } else {
        $cust_update = "display: none";
    }
    $AddClass = 'display:block';
    $EditClass = 'display:block';
    $DeleteClass = 'display:block';
    $ImportClass = 'display:block';
    $ExportClass = 'display:block';

    foreach ($user_permission as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;
        if ($priviledge_key == 'ADD') {
            if ($status == 1) {
                $AddClass = ' display:block';
            } else {
                $AddClass = ' display:none';
            }
        }

        if ($priviledge_key == 'EDIT') {
            if ($status == 1) {
                $EditClass = ' display:block';
            } else {
                $EditClass = ' display:none';
            }
        }

        if ($priviledge_key == 'DELETE') {
            if ($status == 1) {
                $DeleteClass = 'display:block';
            } else {
                $DeleteClass = 'display:none';
            }
        }

        if ($priviledge_key == 'IMPORT') {
            if ($status == 1) {
                $ImportClass = 'display:block';
            } else {
                $ImportClass = 'display:none';
            }
        }

        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) {
                $ExportClass = 'display:block';
            } else {
                $ExportClass = 'display:none';
            }
        }
    }
    ?>


    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <?php $this->load->view('Admin/includes/sidebar'); ?>
            <!--  -->
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
                                            <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> - Contact
                                        </h4>
                                    </div>
                                    <div class="heading-elements">
                                        <div class="heading-btn-group" style="display: flex;">
                                            <a data-toggle="modal" data-target="#customer_model" class="btn btn-link btn-float has-text" style="<?= $cust_update ?>;<?= $AddClass; ?>"><i class="icon-file-plus text-primary"></i><span><b>ADD</b></span></a>
                                            <a style="color: green; <?= $ImportClass; ?>" onclick="ImportContact()" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-success"></i><span><b>Import Contact</b></span></a>
                                            <a style="color: red;<?= $ExportClass; ?>" href="<?= base_url('admin/Customer/ExportContacts'); ?>" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-danger"></i><span><b>Export Contact</b></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /page header -->
                            <!-- Control position -->
                            <form class="form-vertical" id="UpdateDataChk" method="post">
                                <div class="panel panel-flat">
                                    <div class="panel-heading table_header" style="color: white;">
                                        <h5 class="panel-title col-12">
                                            <div class="row col-12">
                                                <div class="col-sm-6" style="margin-top: 1%;">Contact List</div>
                                                <div class="col-sm-6 text-right">
                                                    <button type="submit" class="btn" id="updateBtn" style="background: #009fdf;font-size: 15px;font-weight: 400;"> Update Fields </button>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="employee_grid_data" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" id="selectAllChk" /> #</th>
                                                    <th>Company Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Landline</th>
                                                    <th>Group</th>
                                                    <th>Location</th>
                                                    <th>Segment</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /basic responsive configuration -->
        <!-- Footer -->
        <?php $this->load->view('Admin/includes/AdminFooter.php'); ?>
        <!-- /footer -->
        <div id="customer_model" class="modal fade" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
                        <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" style="margin-top: -4px">
                            <i class="icon-users" style="zoom:1.1; "></i>
                            &nbsp;Add New Contact
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-vertical" id="CustomerForm" method="post">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Basic Info </legend>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-body" style="padding: 10px;background: #F5F5F5;color: black;font-size: 15px;">
                                                    <label class="control-label col-sm-6" for="email">Contact Type <span style="color: red;">*</span></label>
                                                    <div class="form-group" style="margin-bottom: 4px;">
                                                        <div class="col-sm-6" style="margin-left: -9%;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="custtype" class="styled" value="primary" checked="" onclick="customertype(this.value)">
                                                                Primary
                                                            </label>
                                                            <label class="radio-inline" style="margin-left: 20%;margin-top: 4px;">
                                                                <input type="radio" name="custtype" class="styled" value="secondary" onclick="customertype(this.value)">
                                                                Secondary
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" id="parentlist_display">
                                                <label>Contact Name : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" id="ordanizer_name" name="ordanizer_name" onkeyup="bind_mailing_name(this.value)" placeholder="Enter Contact name" maxlength="100">
                                            </div>
                                            <div class="form-group" style="display: none" id="forsecondarylist_display">
                                                <label>Contact Name : <sup style="color: red">*</sup></label>
                                                <select class="select-search form-control" name="parentid" id="parentid">
                                                    <option value="">organization List</option>
                                                    <?php
                                                    foreach ($primary_customer->result() as $value21) {
                                                    ?>
                                                        <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mailing Name : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" name="mailing_name" placeholder="Enter Mailing name" maxlength="100">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <!-- <sup style="color: red">*</sup> [ <span>System Generated</span> ] -->
                                                <label>Contact Code : </label>
                                                <input type="text" class="form-control" name="contact_code" maxlength="15">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Contact Details </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contact Person : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person name" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile Number : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alternate Number : </label>
                                                <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Enter contact alternate number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Landline Number : </label>
                                                <input type="text" class="form-control" id="landline_number" name="landline_number" placeholder="Enter Landline Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email ID : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter email" maxlength="35">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alternate Email : </label>
                                                <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id" placeholder="Enter Alternate Email" maxlength="35">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Country : <sup style="color: red">*</sup></label>
                                                <select class="select-search form-control" onChange="getstate (this.value);" name="country" id="countryId">
                                                    <option value="">Select Country</option>
                                                    <?php
                                                    foreach ($country_list as $value5) {
                                                    ?>
                                                        <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>State :</label>
                                                <select name="state" id="state" class="select-search form-control">
                                                    <option value="">Select state</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City : </label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Address : <sup style="color: red">*</sup></label>
                                                <textarea class="form-control" name="address" placeholder="Enter Address" maxlength="200" col="5" row="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                                                <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch by google address" maxlength="200" readonly style="margin-top: -1.9%;" col="5" row="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pincode : </label>
                                                <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="10">
                                            </div>
                                        </div>
                                        <input type="hidden" name="g_lat" id="g_lat">
                                        <input type="hidden" name="g_long" id="g_long">
                                        <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label>Address Line2 : </label>
                        <input type="text" class="form-control" name="address2" placeholder="Enter Address Line2" maxlength="100">
                      </div>
                    </div>-->
                                    </div>
                                </fieldset>

                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Taxation Details </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Registration Type : <sup style="color: red">*</sup> </label>
                                                <select class="select-search form-control" name="registration_type">
                                                    <option value="">Select Registration Type</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Composition">Composition</option>
                                                    <option value="Consumer">Consumer</option>
                                                    <option value="Unregistered">Unregistered</option>
                                                    <option value="Unknown">Unknown</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>GST No. : </label>
                                                <input type="text" class="form-control" name="gstin" placeholder="Enter GST No." maxlength="15">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pan No. : </label>
                                                <input type="text" class="form-control" name="pan_no" placeholder="Enter Pan No." maxlength="30">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tan No. : </label>
                                                <input type="text" class="form-control" name="tan_no" placeholder="Enter Tan No." maxlength="30">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Calendar </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth : <sup style="color: red">*</sup></label>
                                                <input type="text" class="form-control" id="dob" name="dob" placeholder="Select DOB">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company Anniversary :</label>
                                                <input type="text" class="form-control" id="company_aniversary" name="company_aniversary" placeholder="Select Company Aniversary" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marriage Anniversary : </label>
                                                <input type="text" class="form-control" id="marriage_aniversary" name="marriage_aniversary" placeholder="Select Marriage Aniversary" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Other Info </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Type : </label>
                                                <select name="type" id="type" class="select-search form-control">
                                                    <option value="">Select Type</option>
                                                    <?php
                                                    foreach ($type_list as $value) {
                                                    ?>
                                                        <option value="<?= $value->type_id ?>"><?= $value->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Group : </label>
                                                <select name="group" id="group" class="select-search form-control">
                                                    <option value="">Select Group</option>
                                                    <?php
                                                    foreach ($group_list as $value2) {
                                                    ?>
                                                        <option value="<?= $value2->group_id ?>"><?= $value2->group_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Business Segment : </label>
                                                <select name="business[]" id="business" multiple="multiple" class="form-control">
                                                    <option value="">Select Business Segment</option>
                                                    <?php
                                                    foreach ($business_list as $value) {
                                                    ?>
                                                        <option value="<?= $value->business_id ?>"><?= $value->business_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Select Location : </label>
                                                <select name="location" id="location" class="select-search form-control">
                                                    <option value="">Select Location</option>
                                                    <?php
                                                    foreach ($location_list as $value3) {
                                                    ?>
                                                        <option value="<?= $value3->location_id ?>"><?= $value3->location; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Credit Term : <sup style="color: red">*</sup></label>
                                                <select class="select-search form-control" name="credit_term">
                                                    <option value="">Select Credit Term</option>
                                                    <?php
                                                    foreach ($credit_term as $row) {
                                                    ?>
                                                        <option value="<?= $row->credit_id ?>"><?= $row->credit_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Notes : <sup style="color: red">*</sup></label>
                                                <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="2"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Account Manager </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account Manager :</label>
                                                <select class="form-control" multiple="multiple" name="account_manager[]" id="account_manager">
                                                    <option value="">Select Account Manager</option>
                                                    <option value="NA">NA</option>
                                                    <?php
                                                    foreach ($account_manager as $row) {
                                                    ?>
                                                        <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border" style="margin: 0;">Access Credentials </legend>
                                <fieldset>
                                    <div class="row" style="margin-top: 1%;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password : <sup style="color: red">*</sup></label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password" maxlength="35">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password : <sup style="color: red">*</sup></label>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" id="btn_hide" class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title"><i class="icon-address-book2"></i>&nbsp;&nbsp;Edit Contact</h6>
                    </div>
                    <div class="modal-body">
                        <div id="complaint_model_data1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="get_account_manager" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Account Manager</h6>
                    </div>
                    <div class="modal-body">
                        <div id="account_manager_model_data">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="googlemapmodalAdd" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 4rem;">
                    <div class="modal-header bg-info" style="background-color:#00619F;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Search Google Address</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
                            <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div id="ImportContact_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
                        <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" style="margin-top: -4px">
                            <i class="icon-file-excel" style="zoom:1.1; "></i>
                            &nbsp;Import Contact
                        </h5>
                    </div>
                    <div class="modal-body" style="padding: 10px;">
                        <form id="upload_doc_form" method="post" enctype="multipart/form-data">
                            <div class="panel panel-flat">
                                <div class="panel-body" style="padding: 5px;">
                                    <fieldset>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" name="excel">
                                                            <div class="label-block text-right" style="margin-top: 15%;">
                                                                <span class="label label-danger text-right"><a style="color:white;" href="<?= base_url() ?>assets/ExcelSheet/sample.xlsx"><i class=" icon-download"></i>&nbsp;Download Sample File</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br /> <br />
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary">Import Documents<i class="icon-arrow-right14 position-right"></i></button>
                                            <span id="preview_upload"></span>
                                        </div>
                                    </fieldset>
                                    <br />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <div id="schedule_model" class="modal fade" style="top: 15px;" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title"> Add Activity</h6>
                    </div>

                    <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                        <div id="add_activity_data"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="reminder_model" class="modal fade" data-keyboard="false" data-backdrop="static" style="top: 15px;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title"> Add Reminder</h6>
                    </div>

                    <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                        <div id="add_reminder_data"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="update_field_model" class="modal fade" style="top: 15px;" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title"> Bulk Action For <span id="countRecords"></span> Records </h6>
                    </div>

                    <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                        <form id="updateFiledData" method="post" action="<?= base_url(); ?>admin/Customer/updateFiledData">
                            <input type="hidden" name="custome_id" id="custome_id">
                            <div class="panel panel-flat">
                                <div class="panel-body" style="padding: 5px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select Field <sup style="color: red">*</sup></label>
                                            <select class="select-search form-control" onchange="getFieldChange(this.value);" name="UpdateFieldChange" id="UpdateFieldChange">
                                                <option value="">Select Field</option>
                                                <option value="account_manager">Account Manager</option>
                                                <option value="location">Location</option>
                                                <option value="segment">Segment</option>
                                                <option value="group">Group</option>
                                                <option value="credit_terms">Credit Term</option>
                                                <option value="country">Country</option>
                                                <option value="state">State</option>
                                                <option value="city">City</option>
                                                <option value="registration_type">Registration Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="account_manager_edit" style="display: none;">
                                        <div class="form-group">
                                            <label>Account Manager :</label>
                                            <select class="form-control" multiple="multiple" name="account_manager[]" id="account_manager_update">
                                                <option value="">Select Account Manager</option>
                                                <option value="NA">NA</option>
                                                <?php
                                                foreach ($account_manager as $row) {
                                                ?>
                                                    <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="location_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Select Location : </label>
                                            <select name="location" id="location_update" class="select-search form-control">
                                                <option value="">Select Location</option>
                                                <?php
                                                foreach ($location_list as $value3) {
                                                ?>
                                                    <option value="<?= $value3->location_id ?>"><?= $value3->location; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="segment_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Business Segment : </label>
                                            <select name="segment[]" id="business_update" multiple="multiple" class="form-control">
                                                <option value="">Select Business Segment</option>
                                                <?php
                                                foreach ($business_list as $value) {
                                                ?>
                                                    <option value="<?= $value->business_id ?>"><?= $value->business_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="group_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Group : </label>
                                            <select name="group" id="group" class="select-search form-control">
                                                <option value="">Select Group</option>
                                                <?php
                                                foreach ($group_list as $value2) {
                                                ?>
                                                    <option value="<?= $value2->group_id ?>"><?= $value2->group_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="credit_terms_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Credit Term : <sup style="color: red">*</sup></label>
                                            <select class="select-search form-control" name="credit_terms">
                                                <option value="">Select Credit Term</option>
                                                <?php
                                                foreach ($credit_term as $row) {
                                                ?>
                                                    <option value="<?= $row->credit_id ?>"><?= $row->credit_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="country_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Country : <sup style="color: red">*</sup></label>
                                            <select class="select-search form-control" name="country" id="countryId">
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($country_list as $value5) {
                                                ?>
                                                    <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="state_update" style="display: none;">
                                        <div class="form-group">
                                            <label>State :</label>
                                            <select name="state" id="state" class="select-search form-control">
                                                <option value="">Select state</option>
                                                <?php
                                                foreach ($state_list as $value5) {
                                                ?>
                                                    <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="city_update" style="display: none;">
                                        <div class="form-group">
                                            <label>City : </label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="registration_type_update" style="display: none;">
                                        <div class="form-group">
                                            <label>Registration Type : <sup style="color: red">*</sup> </label>
                                            <select class="select-search form-control" name="registration_type">
                                                <option value="">Select Registration Type</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Composition">Composition</option>
                                                <option value="Consumer">Consumer</option>
                                                <option value="Unregistered">Unregistered</option>
                                                <option value="Unknown">Unknown</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary" id="updateBtn"> Update Data </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
        <script>
            $('#selectAllChk').click(function(e) {
                $(this).closest('table').find('tbody tr td ul li input:checkbox').prop('checked', this.checked);
                return false;
            });


            function getFieldChange(id) {
                if (id == 'account_manager') {
                    $('#account_manager_edit').show();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();
                } else if (id == 'location') {

                    $('#account_manager_edit').hide();
                    $('#location_update').show();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();

                } else if (id == 'segment') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').show();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();

                } else if (id == 'group') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').show();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();

                } else if (id == 'credit_terms') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').show();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();

                } else if (id == 'country') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').show();
                    $('#state_update').hide();
                    $('#city_update').hide();

                } else if (id == 'state') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').show();
                    $('#city_update').hide();
                    $('#registration_type_update').hide();

                } else if (id == 'city') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').show();
                    $('#registration_type_update').hide();
                } else if (id == 'registration_type') {

                    $('#account_manager_edit').hide();
                    $('#location_update').hide();
                    $('#segment_update').hide();
                    $('#group_update').hide();
                    $('#credit_terms_update').hide();
                    $('#country_update').hide();
                    $('#state_update').hide();
                    $('#city_update').hide();
                    $('#registration_type_update').show();
                }

            }
            $(document).ready(function() {
                $('#business_update').select2({
                    placeholder: "Select Business Segment"
                });
                $('#account_manager_update').select2({
                    placeholder: "Select Account Manager"
                });
            });
            $("#UpdateDataChk").on('submit', (function(e) {
                // e.preventDefault();
                if (e.isDefaultPrevented()) {
                    // alert('invalid');
                    // return false;
                } else {
                    $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/Demo",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            response = JSON.parse(data);

                            if (response.count == 1) {
                                $(function() {
                                    new PNotify({
                                        title: 'Bulk Action',
                                        text: 'Select Atleast One Contact.',
                                        type: 'warning'
                                    });
                                });
                            } else {
                                $('#update_field_model').modal('show');
                                $('#custome_id').val(response.customer_id);
                                $('#countRecords').html(response.count);
                            }
                        },
                        error: function() {
                            $(function() {
                                new PNotify({
                                    title: 'Register Form',
                                    text: 'Failed to load page',
                                    type: 'warning'
                                });
                            });
                        }
                    });
                }
                return false;

            }));

            $("#updateFiledData").on('submit', (function(e) {
                // e.preventDefault();
                if (e.isDefaultPrevented()) {
                    // alert('invalid');
                    // return false;
                } else {
                    $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            var count = $('#countRecords').html();
                            $(function() {
                                new PNotify({
                                    title: 'Bulk Action',
                                    text: data + ' Updated Successfully For ' + count + ' Contact',
                                    type: 'success'
                                });
                            });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Customer'); ?>";
                            }, 3000);
                        },
                        error: function() {
                            $(function() {
                                new PNotify({
                                    title: 'Register Form',
                                    text: 'Failed to load page',
                                    type: 'warning'
                                });
                            });
                        }
                    });
                }
                return false;

            }));
        </script>

        <script>
            $(document).ready(function() {
                Documentvalidator = {
                        // row: '.col-md-9',
                        validators: {
                            notEmpty: {
                                message: 'Excel File is required'
                            },
                            file: {
                                extension: 'xlx,xlsx',
                                type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                // maxSize: 5*1024*1024,   // 5 MB
                                message: 'The selected file is not valid, it should be (xlsx, xlx)'
                            },

                        }
                    },
                    $('#upload_doc_form')
                    .bootstrapValidator({
                        framework: 'bootstrap',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            'excel': Documentvalidator,
                        }
                    })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#upload_doc_form").on('submit', (function(e) {
                    //e.preventDefault();
                    if (e.isDefaultPrevented()) {
                        //alert('invalid');
                    } else {
                        $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                        $("#preview_upload").show();
                        $.ajax({
                            url: '<?php echo base_url('admin/Customer/ImportContacts') ?>',
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                // alert(data);

                                // $("#preview_upload").html(data);
                                $(function() {
                                    new PNotify({
                                        title: 'Import Contact',
                                        text: 'Imported  Successfully !!',
                                        type: 'success'
                                    });
                                });


                                setTimeout(function() {
                                    window.location = "<?php echo base_url('admin/Customer'); ?>";
                                }, 3000);

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
            function customertype(val) {
                if (val == 'secondary') {
                    $('#parentlist_display').hide();
                    $('#forsecondarylist_display').show();
                } else {
                    $('#forsecondarylist_display').hide();
                    $('#parentlist_display').show();
                }
            }

            function ImportContact() {
                $("#ImportContact_modal").modal({
                    backdrop: "static"
                });
            }
        </script>

        <script type="text/javascript">
            $("#dob").on("dp.change", function(e) {
                $('#CustomerForm').bootstrapValidator('revalidateField', 'dob');
            });
        </script>

        <script type="text/javascript">
            $(function() {
                $('#dob').datetimepicker({
                    format: 'DD MMMM, YYYY',
                    maxDate: 'now',
                    useCurrent: true
                });
                $('#company_aniversary').datetimepicker({
                    format: 'DD MMMM, YYYY',
                    maxDate: 'now',
                    useCurrent: true
                });
                $('#marriage_aniversary').datetimepicker({
                    format: 'DD MMMM, YYYY',
                    maxDate: 'now',
                    useCurrent: true
                });
                $('#schedule_date').datetimepicker({
                    format: 'DD MMMM, YYYY',
                    maxDate: 'now',
                    useCurrent: true
                });
            });
        </script>

        <script type="text/javascript">
            var param1var = getQueryVariable("param1");

            function getQueryVariable(variable) {
                var query = window.location.search.substring(1);
                if (query == 'customer=add') {
                    //alert(query);
                    // $("#useractivate").modal('show');
                    $("#customer_model").modal({
                        backdrop: "static"
                    });
                }
            }
        </script>
        <!--========================== / Date picker javascript ====================================-->

        <script type="text/javascript">
            function bind_mailing_name(value) {
                $("#mailing_name").val(value);
            }

            function open_google_map_add() {
                $("#googlemapmodalAdd").modal('show');
                initializeadd();
            }

            function initializeadd() {
                // alert();
                var markers = [];
                var map = new google.maps.Map(document.getElementById('googleMap2'), {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                });
                var defaultBounds = new google.maps.LatLngBounds(
                    new google.maps.LatLng(18.5204, 73.8567),
                    new google.maps.LatLng(18.6204, 73.9567));
                map.fitBounds(defaultBounds);
                // Create the search box and link it to the UI element.
                var input = /** @type {HTMLInputElement} */ (
                    document.getElementById('pac-input2'));
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                var searchBox = new google.maps.places.SearchBox((input));
                google.maps.event.addListener(searchBox, 'places_changed', function() {
                    map.setZoom(15);
                    var places = searchBox.getPlaces();
                    if (places.length == 0) {
                        return;
                    }
                    for (var i = 0, marker; marker = markers[i]; i++) {
                        marker.setMap(null);
                    }
                    // For each place, get the icon, place name, and location.
                    markers = [];
                    var bounds = new google.maps.LatLngBounds();
                    for (var i = 0, place; place = places[i]; i++) {
                        var image = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };
                        // Create a marker for each place.
                        var marker = new google.maps.Marker({
                            map: map,
                            draggable: true,
                            title: place.name,
                            position: place.geometry.location
                        });
                        markers.push(marker);
                        bounds.extend(place.geometry.location);
                        google.maps.event.addListener(marker, 'click', function(event) {
                            get_city2(event.latLng.lat(), event.latLng.lng());
                            var lat = event.latLng.lat();
                            var lng = event.latLng.lng();
                            var latlng = new google.maps.LatLng(lat, lng);
                            var geocoder = geocoder = new google.maps.Geocoder();
                            geocoder.geocode({
                                'latLng': latlng
                            }, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[1]) {
                                        location_name = results[1].formatted_address;
                                        // document.getElementById("address2").value = location_name;
                                        document.getElementById("google_address").value = location_name;
                                        document.getElementById("g_lat").value = lat;
                                        document.getElementById("g_long").value = lng;
                                        $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                        $("#googlemapmodalAdd").modal('hide');
                                        $("#googlemapmodalAdd").css('display','none');
                                    }
                                }
                            });
                        });
                    }
                    map.fitBounds(bounds);
                });
                // [END region_getplaces]
                // Bias the SearchBox results towards places that are within the bounds of the
                // current map's viewport.
                google.maps.event.addListener(map, 'bounds_changed', function() {
                    var bounds = map.getBounds();
                    searchBox.setBounds(bounds);
                });
            }


            // google.maps.event.addDomListener(window, 'load', initialize);
        </script>


        <script>
            function get_city(lat, long) {
                var geocoder;
                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(lat, long);
                geocoder.geocode({
                        'latLng': latlng
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var add = results[0].formatted_address;
                                var value = add.split(",");
                                // alert(add);
                                count = value.length;
                                country = value[count - 1];
                                state = value[count - 2];
                                city = value[count - 3];
                                if (value[count - 3] = null) {
                                    city = '';
                                }
                                // alert(city);
                                document.getElementById('city').value = city;
                                $('#CustomerForm').bootstrapValidator('revalidateField', 'city');
                            } else {
                                alert("address not found");
                            }
                        } else {
                            alert("Geocoder failed due to: " + status);
                        }
                    }
                );
            }

            function get_city2(lat, long) {
                var geocoder;
                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(lat, long);
                geocoder.geocode({
                        'latLng': latlng
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var add = results[0].formatted_address;
                                var value = add.split(",");
                                // alert(add);
                                count = value.length;
                                country = value[count - 1];
                                state = value[count - 2];
                                city = value[count - 3];
                                if (value[count - 3] = null) {
                                    city = '';
                                }
                                // alert(city);
                                document.getElementById('city2').value = city;
                                $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                            } else {
                                alert("address not found");
                            }
                        } else {
                            alert("Geocoder failed due to: " + status);
                        }
                    }
                );
            }
        </script>


        <script type="text/javascript">
            $(document).ready(function() {

                var groupColumn = 1;
                $('#employee_grid_data').DataTable({
                    "bProcessing": true,
                    "serverSide": true,
                    "stateSave": true,
                    "lengthMenu": [
                        [10, 25, 50, 100, 500, 1000, 1500, -1],
                        [10, 25, 50, 100, 500, 1000, 1500, "All"]
                    ],
                    "columnDefs": [{
                        visible: false
                    }],

                    "language": {
                        "search": "Filter records:",
                        "searchPlaceholder": "Search by Name"
                    },
                    "ajax": {
                        url: "<?php echo base_url('admin/Customer/EmployeeAjaxData'); ?>",
                        type: "post",
                        error: function() {
                            $("#employee_grid_processing").css("display", "none");
                        }
                    }
                });


            });

            function get_account_manger(id) {
                var datastring = 'customerid=' + id;
                //alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Customer/get_account_manger'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('#get_account_manager').modal('show');
                        $('#account_manager_model_data').html(data);

                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            }
        </script>


        <!--=======================================  Validation login  ==========================================-->

        <script type="text/javascript">
            $(document).ready(function() {
                $('#CustomerForm').bootstrapValidator({
                    message: 'This value is not valid',
                    fields: {
                        ordanizer_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Organizer Name'
                                }
                            }
                        },
                        address: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Address'
                                }
                            }
                        },

                        parentid: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Organizer Name'
                                }
                            }
                        },



                        custtype: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Customer Type'
                                }
                            }
                        },

                        contact_person: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Contact Person Name'
                                }
                            }
                        },

                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Password'
                                }
                            }
                        },

                        notes: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Notes'
                                },
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Password'
                                },
                            }
                        },
                        confirm_password: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Password'
                                },
                                identical: {
                                    field: 'password',
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },


                        registration_type: {
                            validators: {
                                notEmpty: {
                                    message: 'Registration type required'
                                }
                            }
                        },

                        credit_term: {
                            validators: {
                                notEmpty: {
                                    message: 'Credit Term required'
                                }
                            }
                        },
                        account_manager: {
                            validators: {
                                notEmpty: {
                                    message: 'Account Manager required'
                                }
                            }
                        },

                        city: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter City Name'
                                }
                            }
                        },

                        country: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Country'
                                }
                            }
                        },

                        state: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select State '
                                }
                            }
                        },

                        contact_number1: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Contact number'
                                }
                            }
                        },

                        dob: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select DOB'
                                }
                            }
                        },

                        email_id: {
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

                $("#CustomerForm").on('submit', (function(e) {
                    //e.preventDefault();
                    if (e.isDefaultPrevented()) {
                        //alert('invalid');
                    } else {
                        $.ajax({
                            url: "<?php echo base_url('admin/Customer/Add_customer'); ?>",
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                // alert(data);

                                $(function() {
                                    new PNotify({
                                        title: 'Add Contact',
                                        text: 'Contact Information Added Successfully !!',
                                        type: 'success'
                                    });
                                });

                                var param1var = getQueryVariable("param1");

                                function getQueryVariable(variable) {
                                    var query = window.location.search.substring(1);
                                    if (query == 'customer=add') {
                                        setTimeout(function() {
                                            window.location = "<?php echo base_url('admin/Tracking/add_location'); ?>";
                                        }, 1000);
                                    } else {
                                        setTimeout(function() {
                                            window.location = "<?php echo base_url('admin/Customer'); ?>";
                                        }, 1000);
                                    }
                                }
                            },
                            error: function() {
                                $(function() {
                                    new PNotify({
                                        title: 'Register Form',
                                        text: 'Failed to load page',
                                        type: 'warning'
                                    });
                                });
                            }
                        });
                    }
                    return false;

                }));
            });
        </script>


        <!--  -->
        <script>
            function getstate(val) {
                // alert(val);

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('admin/Customer/getstate') ?>',
                    data: 'country_id=' + val,
                    success: function(data) {
                        // alert(data);
                        $("#state").html(data);
                    }
                });
            }
        </script>
        <!--  -->

        <!-- Password Match -->

        <script type="text/javascript">
            $('#password, #confirm_password').on('keyup', function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Password Match').css('color', 'green');
                    document.getElementById("btn_hide").disabled = false;
                } else {
                    $('#message').html('Not Matching').css('color', 'red');
                    document.getElementById("btn_hide").disabled = true;
                }
            });
        </script>

        <!-- /Password Match -->

        <!--=======================================  delete Event  ==========================================-->

        <script>
            function del_customer(id) {

                var notice = new PNotify({
                    title: 'Confirmation',
                    text: '<p>Are you sure you want to delete this Contact?</p>',
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

                    var datastring = 'customerid=' + id;
                    // alert(datastring);
                    // return
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Customer/delete_customer'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert(data);
                            $(function() {
                                new PNotify({
                                    title: 'Delete Contact',
                                    text: 'Contact Information Deleted successfully',
                                    type: 'success'
                                });
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Customer'); ?>";
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


        <script type="text/javascript">
            // var url = "<?php //echo base_url(); 
                            ?>";

            // function delete(id) {
            //   var r = confirm("Do you want to delete this?")
            //   if (r == true)
            //     window.location = url + "user/deleteuser/" + id;
            //   else
            //     return false;
            // }
        </script>


        <!--======================================= / Delete Event  ==========================================-->

        <script>
            function edit_customer(id) {
                var datastring = 'customerid=' + id;
                //alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Customer/edit_customer'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('#modal_default1').modal('show');
                        $('#complaint_model_data1').html(data);

                    },
                    error: function() {
                        alert('Error while request..');
                    }
                });
            }

            function add_activity(id) {
                var datastring = 'customerid=' + id;
                //alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Customer/add_activity'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('#schedule_model').modal('show');
                        $('#add_activity_data').html(data);

                    },
                    error: function() {
                        alert('Error while request...');
                    }
                });
            }

            function add_reminder(id){
                var datastring = 'customer_id=' + id;
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Customer/add_reminder'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('#reminder_model').modal('show');
                        $('#add_reminder_data').html(data);

                    },
                    error: function() {
                        alert('Error while request...');
                    }
                });
            }
        </script>

        <!--=============================================== multiselect employee ================================== -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#business').select2({
                    placeholder: "Select Business Segment"
                });
                $('#account_manager').select2({
                    placeholder: "Select Account Manager"
                });
            });
            // jQuery('#business').multiselect({
            //   enableFiltering: true,
            //   maxHeight: 400,
            //   enableCaseInsensitiveFiltering: true,
            //   nonSelectedText: 'Select business segment',
            //   numberDisplayed: 10,
            //   selectAll: false,
            //   onChange: function(option, checked) {
            //     // Get selected options.
            //     var selectedOptions = jQuery('#business option:selected');

            //     if (selectedOptions.length >= 10) {
            //       // Disable all other checkboxes.
            //       var nonSelectedOptions = jQuery('#business option').filter(function() {
            //         return !jQuery(this).is(':selected');
            //       });

            //       nonSelectedOptions.each(function() {
            //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
            //         input.prop('disabled', true);
            //         input.parent('li').addClass('disabled');
            //       });

            //       new PNotify({
            //         title: 'Message',
            //         text: 'Please Select only 10 business segment',
            //         type: 'warning'
            //       });
            //     } else {
            //       // Enable all checkboxes.
            //       jQuery('#business option').each(function() {
            //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
            //         input.prop('disabled', false);
            //         input.parent('li').addClass('disabled');
            //       });
            //     }
            //   }
            // });

            // jQuery('#account_manager').multiselect({
            //   enableFiltering: true,
            //   maxHeight: 400,
            //   enableCaseInsensitiveFiltering: true,
            //   nonSelectedText: 'Select Account Manager',
            //   numberDisplayed: 10,
            //   selectAll: false,
            //   onChange: function(option, checked) {
            //     // Get selected options.
            //     var selectedOptions = jQuery('#account_manager option:selected');

            //     if (selectedOptions.length >= 10) {
            //       // Disable all other checkboxes.
            //       var nonSelectedOptions = jQuery('#account_manager option').filter(function() {
            //         return !jQuery(this).is(':selected');
            //       });

            //       nonSelectedOptions.each(function() {
            //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
            //         input.prop('disabled', true);
            //         input.parent('li').addClass('disabled');
            //       });

            //       new PNotify({
            //         title: 'Message',
            //         text: 'Please Select only 10 Account Manager',
            //         type: 'warning'
            //       });
            //     } else {
            //       // Enable all checkboxes.
            //       jQuery('#account_manager option').each(function() {
            //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
            //         input.prop('disabled', false);
            //         input.parent('li').addClass('disabled');
            //       });
            //     }
            //   }
            // });


            /*Add This to Block SHIFT Key*/
            var shiftClick = jQuery.Event("click");
            shiftClick.shiftKey = true;

            $(".multiselect-container li *").click(function(event) {
                if (event.shiftKey) {
                    //alert("Shift key is pressed");
                    event.preventDefault();
                    return false;
                } else {
                    //alert('No shift hey');
                }
            });
        </script>
        <!-- ====================================================================================================================== -->
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();

                        var last = null;

                        var groupadmin = [];

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {

                            if (last !== group) {

                                $(rows).eq(i).before(
                                    '<tr class="group" id="' + i + '"><td colspan="10" style="padding: 15px 20px !important;">' + group + '</td></tr>'
                                );
                                groupadmin.push(i);
                                last = group;
                            }
                        });

                        for (var k = 0; k < groupadmin.length; k++) {
                            // Code added for adding class to sibling elements as "group_<id>"  
                            $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                            // Code added for adding Toggle functionality for each group
                            $("#" + groupadmin[k]).click(function() {
                                var gid = $(this).attr("id");
                                $(".group_" + gid).slideToggle(300);
                            });

                        }
                    }
                });
            });
        </script>
</body>

</html>