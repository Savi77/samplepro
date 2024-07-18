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
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switch.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts-3d.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/cylinder.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/funnel3d.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/exporting.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/export-data.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/data.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/highchart/drilldown.js"></script>

    <script src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

    <style type="text/css">
        .modal-body {
            position: relative !important;
            padding-top: -14px !important;
            padding: 0px !important;
        }

        select[name='ajax_table_length'],
        select[name='all_activity_filter_table_length'] {
            margin-top: 8px !important;
        }

        .datatable-header,
        .datatable-footer {
            /*padding-top: 0px !important;*/
        }
    </style>
    <!--  -->

    <style type="text/css">
        .panel-flat>.panel-heading {
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }

        .dataTables_wrapper {
            padding: 10px !important;
        }

        .form-horizontal .radio,
        .form-horizontal .checkbox,
        .form-horizontal .radio-inline,
        .form-horizontal .checkbox-inline {
            padding-top: 0px !important;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            padding: 8px 13px !important;
        }

        .page-title {
            padding: 7px 30px 10px 0px !important;
        }

        .list-inline-condensed>li {
            padding-right: 0px !important;
        }

        @media (min-width: 1025px) {
            .modal-lg {
                width: 99% !important;
            }
        }
    </style>

    <style>
        .box-item {
            position: relative;
            box-shadow: #d2d2d2 0px 0px 15px;
            border-radius: 3px;
            margin-right: 1.5rem;
            width: 29%;
            padding: 2.5rem;

        }

        .pb-4,
        .py-4 {
            padding-bottom: 1.5rem !important;
        }

        .icon-block-top span {
            background-color: #188ef4;
            padding: 1.5rem;
            position: absolute;
            border-radius: 50%;
            margin-top: -5rem;
            top: 0;
        }

        .display-2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
        }

        .mbri-sites:before {
            content: "\e973";
        }

        .display-5 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
        }

        .mbr-black {
            color: #000000;
        }

        .pb-3,
        .py-3 {
            padding-bottom: 1rem !important;
        }

        .mbr-text,
        .box-item-text {
            color: #8d97ad;
        }

        .display-7 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
        }

        .container-boxes {
            padding-bottom: 90px;
            position: relative;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-items: stretch;
            background-color: white;
            padding-top: 3rem;
        }

        .mbr-white {
            color: #ffffff;
        }
        .page-header-content {
    position: relative;
    background-color: inherit;
    top: 7px;
    padding: 17px 0px !important;
}
.heading-elements {
    background-color: inherit;
    position: absolute;
    top: 50%;
    right: 0px;
    height: 36px;
    margin-top: -25px;
}
    </style>
</head>


<body style="overflow-x: hidden;">

    <?php $this->load->view('Admin/includes/admin_header'); ?>
    <?php
    $ExportBtn = 0;

    foreach ($user_permission as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;
        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) { ?>
                <style>
                    .dt-buttons {
                        float: right;
                        display: inline-block;
                        margin: 0 0 20px 20px;
                    }
                </style>
            <?php } else { ?>
                <style>
                    .dt-buttons {
                        float: right;
                        display: none;
                        margin: 0 0 20px 20px;
                    }
                </style>
    <?php  }
        }
    }
    ?>
   

    <!-- Page container -->
    <div class="page-container">
        <div class="page-content">
            <!-- Main sidebar -->
            <?php $this->load->view('Admin/includes/sidebar'); ?>
            <?php $this->load->view('Admin/includes/panel'); ?>
           
                 <!-- Page header -->
                 <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4>
                                <i class="icon-arrow-left52 position-left"></i>
                                <a href="http://localhost/ileaf/Buroforce/index.php/admin/Dashboard/view_dashboard"> <span class="text-semibold">Dashboard</span></a> - Reports
                            </h4>
                        </div>

                    </div>
                </div>

    

    <!-- /page header -->
                <div class="container-boxes mbr-white">
                    <div class="box-item">
                        <div class="icon-block-top pb-4">
                            <span class="display-2"><i class=" icon-stats-dots "></i></span>
                        </div>
                        <h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">CRM</h4>
                        <!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                        <div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->
                        <table class="table table-striped" style="color:black">
                            <tbody>
                                <tr>
                                    <td>Leads Opportunity By Source</td>
                                    <td style="text-align: right;">
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySource'); ?>"><span class="display-2">
                                                <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads Opportunity By Segment</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySegments'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads Opportunity by Product</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByProduct'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads Opportunity - Monthly Counts</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByMonthlyCounts'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads Opportunity - Userwise Monthly Count</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByUserwiseMonthlyCounts'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads|Opportunity by Sales Person</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPerson'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads|Opportunity by Stage</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppByStage'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads|Opportunity by Sales Person -Segment wise</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonSegment'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leads|Opportunity by Sales Person -Product wise</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/LeadOppBySalesPersonProduct'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Branch</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/branch'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="box-item">
                        <div class="icon-block-top pb-4">
                            <span class="display-2"><i class="icon-users4"></i></span>
                        </div>
                        <h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">Contacts</h4>
                        <!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                        <div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->
                        <table class="table table-striped" style="color:black">
                            <tbody>
                                <tr>
                                    <td>All Contacts</td>
                                    <td style="text-align: right;">
                                        <a href="<?php echo base_url('admin/ReportAdmin/Reports/AllContacts'); ?>"><span class="display-2">
                                        <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Segments wise Contact</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Account Owner</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Account wise revenue</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/AccountRevenue'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Summary</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactSummary'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Type wise Contact</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact with activity</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivities'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact with no activity</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsWithNoActivities'); ?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="box-item">
                        <div class="icon-block-top pb-4">
                            <span class="display-2"><i class="icon-address-book2"></i></span>
                        </div>
                        <h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">Employee</h4>
                        <!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                        <div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->
                        <table class="table table-striped" style="color:black">
                            <tbody>
                                <tr>
                                    <td>Available Time Slots</td>
                                    <td style="text-align: right;">
                                        <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/AvailableTimeSlots');?>"><span class="display-2">
                                        <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee -Target</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeTarget');?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee Revenue</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeeRevenue');?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee wise Activity</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivities');?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Employee wise Activity Mapping</td>
                                    <td style="text-align: right;"> <a href="<?php echo base_url('admin/ReportAdmin/EmployeeReport/EmployeewiseActivitiesMapping');?>"><span class="display-2">
                                    <span class="iconify" data-icon="emojione:eye" data-inline="false"></span>
                                        </a>
                                    </td>
                                </tr>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <!-- View Modal -->
    <div id="ViewDetailsModal" class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="ViewDetailsModalData">

            </div>
        </div>
    </div>
    <!--  -->
</body>
<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
<!-- /footer -->


<script type="text/javascript">
    function ViewTotalDetails(source_id) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var customer_type = $("#customer_type").val();
        var datastring = 'source_id=' + source_id + '&start_date=' + start_date + '&end_date=' + end_date + '&customer_type=' + customer_type;
        // alert(datastring);

        $.ajax({
            url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewSourceTotalDetails'); ?>",
            type: "POST",
            data: datastring,
            success: function(data) {
                $("#ViewDetailsModalData").html(data);
                $("#ViewDetailsModal").modal();
                $('#ajax_table').DataTable({
                    buttons: {
                        dom: {
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    }
                });
            },
            error: function() {
                alert('fail');
            }
        });
    }
</script>



<script type="text/javascript">
    function ViewStageDetails(stage_id) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var datastring = 'stage_id=' + stage_id + '&start_date=' + start_date + '&end_date=' + end_date;
        // alert(datastring);

        $.ajax({
            url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewSourceStageData'); ?>",
            type: "POST",
            data: datastring,
            success: function(data) {
                $("#ViewDetailsModalData").html(data);
                $("#ViewDetailsModal").modal();
                $('#ajax_table').DataTable({
                    buttons: {
                        dom: {
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    }
                });
            },
            error: function() {
                alert('fail');
            }
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
                $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#loader_gif").show();

                var datanew = $('#get_data_form').serialize();

                $.ajax({

                    url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeLeadOppBySource'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#loader_gif").hide();
                        $("#default_issue_table").hide();
                        $("#rsdata").html(data);
                        $('#all_activity_filter_table').DataTable({
                            buttons: {
                                dom: {
                                    button: {
                                        className: 'btn btn-default'
                                    }
                                },
                                buttons: [
                                    'copyHtml5',
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
                                ]
                            }
                        });

                        $('#default_issue_table').dataTable().fnClearTable();
                        $('#default_issue_table').dataTable().fnDestroy();
                        $("#default_issue_table").hide();
                        //------------------------------------------------------------

                        $.ajax({
                            url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeLeadOppBySourceGraph'); ?>",
                            type: "POST",
                            data: datanew,
                            success: function(responsedata) {
                                var responsedata = $.trim(responsedata);
                                var json = $.parseJSON(responsedata);
                                // alert(responsedata);
                                // Create the chart
                                plotgraph(json);

                            },
                            error: function() {
                                alert('fail');
                            }
                        });
                        //------------------------------------------------------------

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
    });
</script>



<script type="text/javascript">
    // Create the chart
    Highcharts.chart('container3', {
        chart: {
            type: 'line'
        },
        credits: {
            enabled: false,
        },

        title: {
            text: 'Leads/Opportunities by Source<br/><p style="font-size:12px;color:#FF5732;"></p>'
        },
        // subtitle: {
        //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
        // },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },

        series: [{
            name: "Source",
            colorByPoint: true,
            data: [
                <?php
                foreach ($Lead_Opportunity_by_Source as $Employee) {
                ?> {
                        name: '<?= $Employee['source']; ?>',
                        y: <?= $Employee['total']; ?>
                        // drilldown: "Chrome"
                    },
                <?php } ?>
            ]
        }],
    });


    function plotgraph(json) {
        Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Leads/Opportunities by Source<br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: json
            }],
        });


    }
</script>

<script type="text/javascript">
    $(function() {

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '&rarr;',
                    'previous': '&larr;'
                }
            }
        });

        // Basic initialization
        $('#default_issue_table').DataTable({
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-default'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }
        });
        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

    });
</script>


</html>