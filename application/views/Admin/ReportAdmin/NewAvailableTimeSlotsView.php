<?php $this->load->view('Admin/includes/n-header');    ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
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
    .multiselect {
        width:200px !important;
    }
</style>
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <div class="col-lg-12"></div>
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <h6 class="card-title py-sm-4 card-headings">Time Slots </h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>

            </div>
            <!-- <div class="card-body padding-30"> -->
                <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;padding:20px;">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Date</label>

                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-accessibility rounded-right" name="start_date" id="start_date" placeholder="Select start date" autocomplete="off" value="<?= date('d F, Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Start Time <span class="text-danger">*</span> </label>

                            <div class="clearfix">
                                <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <!-- <input type="text" class="form-control" placeholder="From Time" id="start_time" name="start_time" autocomplete="off" value="00:00"> -->
                                    <input type="text" class="form-control" placeholder="Enter Start Time" id="start_time" name="start_time" autocomplete="off" readonly>
                                    <!-- <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label>End Time <span class="text-danger">*</span> </label>
                            
                            <div class="clearfix">
                                <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" placeholder="Enter End Time" name="end_time" id="end_time" autocomplete="off"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>Resource </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                </span> -->
                                <select class="multiselect-selected-all" multiple="multiple" style="display: none;" name="EmpArray[]" id= "multiselect">
                                    <?php foreach ($EmpArray as  $row) { ?>
                                        <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <span id="loader_gif"></span>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </form>
            <!-- </div> -->
            
        </div>
        <script>
            $(document).ready(function() {
                $('#multiselect').multiselect({
                    includeSelectAllOption: true,
                    onChange: function(option, checked) 
                    {
                        var selectedCount = $('#multiselect option:selected').length;
                        
                        if (selectedCount >= 2) 
                        {
                           
                            $('span.multiselect-selected-text').text(selectedCount + ' selected');
                        } 
                        else 
                        {
                            $('.multiselect .multiselect-selected-text').text('Select options');
                        }
                    }
                });
            });
        </script>
        <div class="card col-md-12 p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="default_issue_table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Resource</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th class="d-none" ></th>
                            <th class="d-none" ></th>
                            <th class="d-none" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($AvailableTimeSlots as $row) {
                        ?>
                            <tr>
                                <td>
                                    <div>
                                    <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?= $row['name'] ?>
                                    </div>
                                    <!-- <a title="<?= $row['name'] ?>"><b><?= $row['name'] ?></b></a> -->
                                    
                                </td>
                                <td>
                                    <div style="width:200px;" class="text-wrap-col">
                                    <?= $row['email'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $row['mobile_no'] ?>
                                    </div>
                                </td>
                                <td class="d-none" ></td>
                                <td class="d-none" ></td>
                                <td class="d-none" ></td>
                            </tr>
                        <?php $count++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div id="rsdata" style="display: none;">
        </div>
        </div>
        <div class="col-md-12">
            <div class=" panel-body">
                <div id="container32" style="min-width: 400px; height: 350px; margin: 0 auto"></div>
            </div>
            <br/>
            <br/>
        </div> 
    </div>
    <div id="ViewDetailsModal" class="modal fade">
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


        $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

        function ViewDetails(stage_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var customer_type = $("#customer_type").val();
            var datastring = 'stage_id=' + stage_id + '&start_date=' + start_date + '&end_date=' + end_date + '&customer_type=' + customer_type;
            // alert(datastring);

            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/EmployeeReport/ViewStageDetails'); ?>",
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
        
        $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

        $('#start_time').change(function() {
            $('#get_data_form').bootstrapValidator('revalidateField', 'start_time');
        });

        $('#end_time').change(function() {
            $('#get_data_form').bootstrapValidator('revalidateField', 'end_time');
        });

        $(document).ready(function() {
            $('#get_data_form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    start_date: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Start Date'
                            }
                        }
                    },

                    start_time: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Start Time'
                            }
                        }
                    },

                    end_time: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter End Time'
                            }
                        }
                    }
                }
            });
        });
        $(document).ready(function(e) {
            $("#get_data_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif").show();

                    $.ajax({

                        url: "<?php echo base_url('admin/ReportAdmin/EmployeeReport/DateRangeAvailableTimeSlots'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#loader_gif").hide();
                            $("#rsdata").css('display', 'block');
                            $("#rsdata").html(data);
                            $("#default_issue_table").css('display', 'none');

                            $('#default_issue_table').dataTable().fnClearTable();
                            $('#default_issue_table').dataTable().fnDestroy();


                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;

            }));
        });

        Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Leads/Opportunities by Stage<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                name: "Available Time Slots",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($LeadOppByStage as $Employee) {
                    ?> {
                            name: '<?= $Employee['stage_title']; ?>',
                            y: <?= $Employee['total']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } ?>
                ]
            }],
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