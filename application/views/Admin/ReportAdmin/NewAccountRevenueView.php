<?php $this->load->view('Admin/includes/n-header');    ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<!-- Main content -->
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
<style>
    table td{
        color: #000 !important;
    }
    /* table td:nth-child(1) a div:hover{
        color: #605959 !important;
    } */

    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px;
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    #default_issue_table_wrapper {
        margin-top: 0;
    }
    #default_issue_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    .highcharts-contextmenu .highcharts-menu .highcharts-menu-item{
        font-size: 12px !important;
    }
    .highcharts-contextmenu .highcharts-menu .highcharts-menu-item:last-child{
        padding-bottom: 2px !important;
    }
    .highcharts-contextmenu .highcharts-menu hr{
        margin-top: 2px !important;
        margin-bottom: 2px !important;
    }
    .multiselect {
        width:200px !important;
    }
</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <div class="col-lg-12"></div>
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <h6 class="card-title py-sm-4 card-headings">Account Revenue</h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div class="card-body padding-30 mb-2"> -->
                <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;padding:20px;">
                    <div class="row">

                        <div class="col-lg-3">
                            <label>Start Date </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d F, Y',strtotime($start_date)); ?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>End Date </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d F, Y',strtotime($end_date)); ?>" onchange="checkvalidationdate()">
                            </div>
                            <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                        </div>

                        <div class="col-lg-3">
                            <label>Resource </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="EmpArray[]">
                                    <?php foreach ($EmpArray as  $row) { ?>
                                        <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 mt-4" style="text-align:right;">
                            <span id="loader_gif"></span>
                            <button type="submit" class="btn btn-primary" id="sub_btn123">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            
                        </div>
                    </div>
                </form>
            <!-- </div> -->
        </div>

        <div class="card col-md-12 p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="default_issue_table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Company Name</th>
                            <th>Revenue</th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($AccountRevenue as $row) {
                            if($row['company_name'] != '')
                            {
                        ?>
                            <tr>
                                <td>
                                    <div>
                                    <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;">
                                    <?= $row['company_name'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:200px;cursor: auto;">
                                    <?= $row['revenue'] ?>
                                    </div>
                                </td>
                                <td class="d-none"></td>
                                <td class="d-none"></td>
                                <td class="d-none"></td>    
                            </tr>
                        <?php $count++;
                        }
                        else
                        { 
                        ?>
                            <tr>
                                <td colspan="3" style="color: #f00 !important;font-size: 15px;font-weight: 500; text-align:center">No data available in table</td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
            <div id="rsdata" style="display: none;"></div>
        </div>
        <div class="col-md-12">
            <div class=" panel-body">
                <div id="container3"></div>
            </div>
        </div>
    </div>
    <div id="ViewDetailsModal"  class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="ViewDetailsModalData">

            </div>
        </div>
    </div>
    <?php $this->load->view('Admin/includes/n-footer');    ?>
    <script>
        // $('#default_issue_table').DataTable();

        $(document).ready(function(){
            var rescheduleTable = $('#default_issue_table').DataTable( {       
                // scrollX:        true,
                scrollCollapse: true,
                // autoWidth:         true,  
                paging:         true, 
                // order: [[0, 'desc']],
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                        className: 'btn bg-indigo-400 btn-icon'
                    }
                ],

            } );

            // $('#myTable').dataTable();
        });


        // Create the chart
        
        Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: ' Account Revenue<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                    foreach ($AccountRevenue as $Employee) 
                    {
                        if(!empty($Employee['company_name'] || $Employee['revenue']))
                        {
                    ?> {
                            name: '<?= $Employee['company_name']; ?>',
                            y: <?= $Employee['revenue']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } }?>
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
                    text: 'Account Revenue <br/><p style="font-size:12px;color:#FF5732;"></p>'
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

                series: json
            });


        }

        function ViewDetails(product_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var customer_type = $("#customer_type").val();
            var datastring = 'product_id=' + product_id + '&start_date=' + start_date + '&end_date=' + end_date + '&customer_type=' + customer_type;
            // alert(datastring);

            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewProductDetails'); ?>",
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

        $(document).ready(function(e) {
            $("#get_data_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif").show();

                    $.ajax({
                        url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeAccountRevenue'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#loader_gif").hide();
                            $("#default_issue_table").hide();
                            $("#rsdata").show();
                            $("#rsdata").html(data);
                            var rescheduleTable = $('#all_activity_filter_table').DataTable({
                                // buttons: {
                                //     dom: {
                                //         button: {
                                //             className: 'btn btn-default'
                                //         }
                                //     },
                                //     buttons: [
                                //         'copyHtml5',
                                //         'excelHtml5',
                                //         'csvHtml5',
                                //         'pdfHtml5'
                                //     ]
                                // }
                                buttons: [
                                {
                                    extend: 'colvis',
                                    text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                                    className: 'btn bg-indigo-400 btn-icon'
                                }
                            ],
                            });

                            var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

                            // Hide columns initially
                            for (var i = 0; i < columnsToHide.length; i++) {
                                rescheduleTable.column(columnsToHide[i]).visible(false);
                            }

                            // Event listener for column visibility change
                            rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
                                // Update local storage with current visibility state
                                var columnVisibility = rescheduleTable.columns().visible().toArray();
                                localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
                            });

                            // Check local storage for saved column visibility preferences
                            var columnVisibility = localStorage.getItem('columnVisibility');
                            if (columnVisibility) {
                                columnVisibility = JSON.parse(columnVisibility);
                                // Apply stored column visibility preferences
                                for (var i = 0; i < columnVisibility.length; i++) {
                                    rescheduleTable.column(i).visible(columnVisibility[i]);
                                }
                            }

                            $('#default_issue_table').dataTable().fnClearTable();
                            $('#default_issue_table').dataTable().fnDestroy();
                            $("#default_issue_table").hide();

                            $('.highcharts-data-table').css('display','none');


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
<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date').val());
            var end_date = new Date($('#end_date').val());
            if (start_date > end_date) 
            {
                $('#error_end_date').css('display','block');
                $("#sub_btn123").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#sub_btn123").attr('disabled', false);
            }
        } 
</script>


<script>
    function showFilter() {
        var filter = document.querySelector(".displayFilter");
        // filter.style.display = "block";
        if (filter.style.display === "none") {
            filter.style.display = "block";
        } else {
            filter.style.display = "none";
        }

    }
</script>