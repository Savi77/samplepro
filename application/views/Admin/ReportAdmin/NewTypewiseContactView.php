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
     /* span.select2.select2-container.select2-container--default{
        width: 91% !important;
    }
    @media only screen and (max-width: 1680px){
        span.select2.select2-container.select2-container--default{
            width: 89% !important;
        }
    }
    @media only screen and (max-width: 1440px){
        span.select2.select2-container.select2-container--default{
            width: 88% !important;
        }
    }
    @media only screen and (max-width: 1366px){
        span.select2.select2-container.select2-container--default{
            width: 87% !important;
        }
    } 
    @media only screen and (max-width: 1280px){
        span.select2.select2-container.select2-container--default{
            width: 86% !important;
        }
    } */
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
                <h6 class="card-title py-sm-4 card-headings">Contact Type</h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div class="card-body padding-30 mb-2"> -->
                <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;padding:20px;">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>Contact Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="TypeArray[]">
                                    <?php foreach ($TypeArray as  $row) { ?>
                                        <option value="<?= $row->type_id; ?>"><?= $row->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-users4"></i></span>
                                </span> -->
                                <select class="form-control" name="cust_type" id="customer_type_12" data-placeholder="Type">
                                    <option value="">Type</option>
                                    <option value="All">All</option>
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-4 text-right">
                            <span id="loader_gif"></span>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
                            <th>Contact Type</th>
                            <th>Total</th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($TypewiseContact as $row) { ?>
                            <tr>
                                <td>
                                    <div>
                                    <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:200px;" class="text-wrap-col">
                                    <?= $row['title'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:200px;">
                                    <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="View Contact Type" onclick="ViewDetails(id)" id="<?= $row['type_id'] ?>"><?= $row['total'] ?></a>
                                    </div>
                                </td>
                                <td class="d-none"></td>
                                <td class="d-none"></td>
                                <td class="d-none"></td>
                            </tr>
                        <?php $count++;
                        } ?>
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
    <div id="ViewDetailsModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
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
        });


        // Create the chart
        // Highcharts.chart('container3', {
        //     chart: {
        //         type: 'column'
        //     },
        //     credits: {
        //         enabled: false,
        //     },

        //     title: {
        //         text: 'Type Wise Contact<br/><p style="font-size:12px;color:#FF5732;"></p>'
        //     },
        //     // subtitle: {
        //     //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
        //     // },
        //     xAxis: {
        //         type: 'category'
        //     },
        //     yAxis: {
        //         title: {
        //             text: 'Total'
        //         }
        //     },
        //     legend: {
        //         enabled: false
        //     },
        //     plotOptions: {
        //         series: {
        //             borderWidth: 0,
        //             dataLabels: {
        //                 enabled: true,
        //                 format: '{point.y:.1f}'
        //             }
        //         }
        //     },

        //     tooltip: {
        //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        //     },

        //     series: [{
        //         name: "Source",
        //         colorByPoint: true,
        //         data: [


        //             <?php
        //             foreach ($TypewiseContact as $Employee) {
        //             ?> {
        //                     name: '<?= $Employee['title']; ?>',
        //                     y: <?= $Employee['total']; ?>
        //                 },
        //         ]
        //     }],
        // });

        Highcharts.chart('container3', {
            chart: {
                animation: {
                    duration: 500
                },
                marginRight: 50
            },
            title: {
                text: 'Contact Type<br/><p style="font-size:12px;color:#FF5732;"></p>',
            },
            subtitle: {
                useHTML: true,
                text: '',
                floating: true,
                align: 'right',
                verticalAlign: 'middle',
                y: -80,
                x: -100
            },

            legend: {
                enabled: false
            },
            xAxis: {
                // type: 'category',
                categories: [
                    <?php foreach ($TypewiseContact as $row) { ?>'<?= $row['title']; ?>',<?php } ?>
                    ]
            },
            yAxis: {
                opposite: true,
                tickPixelInterval: 150,
                title: {
                    text: null
                }
            },
            plotOptions: {
                series: {
                    animation: false,
                    groupPadding: 0,
                    pointPadding: 0.1,
                    borderWidth: 0,
                    colorByPoint: true,
                    // dataSorting: {
                    //     enabled: true,
                    //     matchByName: true
                    // },
                    type: 'bar',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                
                {
                    type: 'bar',
                    name: 'Total',
                    data: [
                        <?php foreach ($TypewiseContact as $row) { ?><?= $row['total']; ?>,<?php } ?>
                    ],
                },
                
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 550
                    },
                    chartOptions: {
                        xAxis: {
                            visible: true
                        },
                        subtitle: {
                            x: 0
                        },
                        plotOptions: {
                            series: {
                                dataLabels: [{
                                    enabled: true,
                                    y: 8
                                }, {
                                    enabled: true,
                                    format: '{point.name}',
                                    y: -8,
                                    style: {
                                        fontWeight: 'normal',
                                        opacity: 0.7
                                    }
                                }]
                            }
                        }
                    }
                }]
            }
        });

        function plotgraph(json) {
            Highcharts.chart('container3', {
                chart: {
                    type: 'column'
                },
                credits: {
                    enabled: false,
                },

                title: {
                    text: 'Contact Type<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                    name: "Type",
                    colorByPoint: true,
                    data: json
                }],
            });

        }

        function ViewDetails(type_id) {
            var datastring = 'type_id=' + type_id ;
            // alert(datastring);
            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContactDetails'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $("#ViewDetailsModalData").html(data);
                    $("#ViewDetailsModal").modal();
                    $('#ajax_table').DataTable({
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

                    var datanew = $('#get_data_form').serialize();

                    $.ajax({

                        url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeTypewiseContact'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $("#loader_gif").hide();
                            $("#default_issue_table").hide();
                            $("#rsdata").css('display','block');
                            $("#rsdata").html(data);
                            $('#default_issue_table').dataTable().fnClearTable();
                            $('#default_issue_table').dataTable().fnDestroy();
                            $("#default_issue_table").hide();
                            $('#all_activity_filter_table').DataTable({
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

                            $('.highcharts-data-table').css('display','none');

                            $.ajax({
                                url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeTypewiseContactGraph'); ?>",
                                type: "POST",
                                data: datanew,
                                success: function(responsedata) {
                                    var responsedata = $.trim(responsedata);
                                    var json = $.parseJSON(responsedata);
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
          $('#customer_type_12').select2();
        
    </script>
    <script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
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