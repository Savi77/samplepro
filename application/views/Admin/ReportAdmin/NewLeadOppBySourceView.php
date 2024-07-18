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
        width: 89% !important;
    }
    @media only screen and (max-width: 1680px){
        span.select2.select2-container.select2-container--default{
            width: 88% !important;
        }
    }
    @media only screen and (max-width: 1600px){
        span.select2.select2-container.select2-container--default{
            width: 87.5% !important;
        }
    }
    @media only screen and (max-width: 1536px){
        span.select2.select2-container.select2-container--default{
            width: 86.5% !important;
        }
    }
    @media only screen and (max-width: 1440px){
        span.select2.select2-container.select2-container--default{
            width: 84% !important;
        }
    }
    @media only screen and (max-width: 1280px){
        span.select2.select2-container.select2-container--default{
            width: 82% !important;
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
    .highcharts-data-table table tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .highcharts-data-table table th.text,.highcharts-data-table table tbody td.number{
        padding: 0.75rem 1.25rem !important;
    }
    .highcharts-data-table table {
        border: 1px solid #dddddd;
        margin-top: 20px !important;

    }
    .highcharts-data-table table tbody th.text,.highcharts-data-table table tbody td.number{
        font-weight: 400 !important;
    }
    .highcharts-table-caption{
      
        display: none !important;
    }
    .highcharts-data-table table tbody tr:nth-of-type(even) {
        background-color: #fff !important;
    }
    .highcharts-data-table table thead tr{
        background-color: #fff !important;
        border-bottom: 1px solid #ddd !important;
    }

    .multiselect {
        width:200px !important;
    }

</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <!-- <?php
        echo "<pre>";
        print_r($start_date);
        print_r($end_date);
        ?> -->

        <div class="col-lg-12"></div>
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <h6 class="card-title py-sm-4 card-headings">Source Leads</h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div > -->
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
                                <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Source </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="sourceArray[]">
                                    <?php foreach ($SourceArray as  $row) { ?>
                                        <option value="<?= $row->source_id; ?>"> <?= $row->source_title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Stage </label>
                            <div class="input-group">
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="StageArray[]">
                                    <?php foreach ($StageArray as  $row) { ?>
                                        <option value="<?= $row->stage_id; ?>"> <?= $row->stage_title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- <div class="col-lg-3">
                            <label>Stage </label>
                            <div class="input-group">
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="StageArray[]">
                                    <?php foreach ($StageArray as  $row) { ?>
                                        <option value="<?= $row->stage_id; ?>"> <?= $row->stage_title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-sm-3">
                            <label>Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"></i></span>
                                </span> -->
                                <select class="form-control" name="customer_type" id="customer_type" data-placeholder="Select Type">
                                    <option value="">Select Type</option>
                                    <option value="All">All</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Opportunity">Opportunity</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9 mt-4 text-right">
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
                            <th>Source</th>
                            <th>Total</th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                            <th class="d-none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                            foreach ($Lead_Opportunity_by_Source as $row) {
                        ?>
                            <tr>
                                <td>
                                    <div>   
                                        <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;">
                                        <?= $row['source'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 150px;">
                                        <a rel="tooltip" title="View Source Leads" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" onclick="ViewTotalDetails(id)" id="<?= $row['source_id'] ?>">
                                        <?= $row['total'] ?></a>
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
            <div id="rsdata" style="display: none;" ></div>     
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
    //     $('#default_issue_table').DataTable({       
    //     // scrollX:        true,
    //     scrollCollapse: true,
    //     // autoWidth:         true,  
    //     paging:         true, 
    //     order: [[0, 'desc']],
    //     // columnDefs: [
    //     // { "width": "150px", "targets": [3] },
    //     // { "width": "100px", "targets": [0,1,2,4,6] },  
    //     // { "width": "50px", "targets": [5,7] },
    //     // ],
    //     "fixedColumns": true,
    //     "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
    //     "buttons": [
    //         {
    //             extend: 'colvis',
    //             text: '<i class="icon-grid3"></i> <span class="caret"></span>',
    //             className: 'btn bg-indigo-400 btn-icon'
    //         }
    //     ],
       
    // });



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






        // // Create the chart
        // Highcharts.chart('container3', 
        // {
        //     chart: {
        //         type: 'line'
        //     },
        //     credits: {
        //         enabled: false,
        //     },

        //     title: {
        //         text: 'Leads / Opportunities By Source<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
        //             foreach ($Lead_Opportunity_by_Source as $Employee) {
        //             ?> {
        //                     name: '<?= $Employee['source']; ?>',
        //                     y: <?= $Employee['total']; ?>
        //                     // drilldown: "Chrome"
        //                 },
        //         ]
        //     }],
        // });

        Highcharts.chart('container3', {

            chart: {
                type: 'column'
            },

            title: {
                text: 'Source Leads<br/><p style="font-size:12px;color:#FF5732;"></p>'                
            },

            xAxis: {
                categories: [
                    <?php foreach ($Lead_Opportunity_by_Source as  $Source) { ?> '<?= $Source['source']; ?>',
                    <?php } ?>
                ]
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ''
                }
            },

            tooltip: {
                format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                    'Total: {point.stackTotal}'
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php foreach ($LeadcountountBySourceSummary as  $SourceLead) {?> <?= $SourceLead['sourcecount']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }, {
                name: 'Opportunity',
                data: [
                    <?php foreach ($OppCountBySourceSummary as  $SourceOpp) {?> <?= $SourceOpp['sourcecount']; ?>,
                    <?php } ?>
                ],
                stack: ''
            }]
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
                    text: 'Source Leads<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                    headerFormat: '<span style="font-size:;">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
                },

                series: [{
                    name: "Source",
                    colorByPoint: true,
                    data: json
                }],
            });


        }

        function ViewTotalDetails(source_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var customer_type = $("#customer_type").val();
            var datastring = 'source_id=' + source_id + '&start_date=' + start_date + '&end_date=' + end_date +
                '&customer_type=' + customer_type;
            // alert(datastring);

            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewSourceTotalDetails'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
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
                    $('[rel="tooltip"]').tooltip(); 
                },
                error: function() {
                    alert('fail');
                }
            });
        }

        function ViewStageDetails(stage_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var customer_type = $('#customer_type').val();
            var datastring = 'stage_id=' + stage_id + '&start_date=' + start_date + '&end_date=' + end_date + '&customer_type=' + customer_type;
            // alert(datastring);

            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewSourceStageData'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
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
                    $('[rel="tooltip"]').tooltip();

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
                    $("#loader_gif").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
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

                           
                            //------------------------------------------------------------

                            // $.ajax({
                            //     url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeLeadOppBySourceGraph'); ?>",
                            //     type: "POST",
                            //     data: datanew,
                            //     success: function(responsedata) {
                            //         var responsedata = $.trim(responsedata);
                            //         var json = $.parseJSON(responsedata);
                            //         // alert(responsedata);
                            //         // Create the chart
                            //         plotgraph(json);
                            //         $('.highcharts-data-table').css('display','none');

                            //     },
                            //     error: function() {
                            //         alert('fail');
                            //     }
                            // });

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
          $('#customer_type').select2();
        
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

