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
    table td:nth-child(2) div a:hover{
        color: #605959 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        width: 150px !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    #get_data_form .col-lg-3{
        margin-bottom: 15px;
    }

    .dt-button{
        color: #fff !important;
        background-color: #1e6196 !important;
        border-color: #1e6196 !important;
        width: 50px
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
    .dt-button-collection .dt-button.active {
        color: #fff !important;
        background-color: #2196f3 !important;
    }
    button.dt-button.buttons-collection.buttons-colvis.btn.bg-indigo-400.btn-icon{
        width:50px !important;
    }
    .dt-button.buttons-columnVisibility{
        background: #fff !important;
        color: #000 !important;
    }
    .dt-button.buttons-columnVisibility:hover{
        background-color: #eee !important;
    }
    .dt-button-collection .dt-button.active:hover{
        background-color: #2196f3 !important;
    }
    #contact_with_no_activity_table th:first-child{
        width:100px;
        text-wrap: nowrap !important;
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
                <h6 class="card-title py-sm-4 card-headings">Inactive Contacts </h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div class="card-body padding-30 mb-2 " style="padding: 20px 20px 15px 20px!important;"> -->
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
                            <label>Resource </label>
                            <div class="input-group" style="flex-wrap: nowrap;">
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

                        <div class="col-lg-3">
                            <label>Task </label>
                            <div class="input-group" style="flex-wrap: nowrap;">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="ActivityArray[]">
                                    <?php foreach ($ActivityArray as  $row) { ?>
                                        <option value="<?= $row->id; ?>"><?= $row->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender" style="max-width:45px;padding:11px;"><i class="icon-users4"></i></span>
                                </span> -->
                                <select class="form-control" name="customer_type" id="customer_type_14" data-placeholder="Select Type">
                                    <option value="">Select Type</option>
                                    <option value="All">All</option>
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-9 text-right" style="margin-top:30px;">
                            <span id="loader_gif"></span>
                            <button type="submit" class="btn btn-primary" id="act_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            
                        </div>
                        
                    </div>
                    
                </form>
            <!-- </div> -->
        </div>

        <div class="card col-md-12 p-0">
            <div class="table-responsive">
            <!-- id="contact_with_no_activity_table" -->
                <table class="table table-striped" id= "contact_with_no_activity_table">
                <!-- <table class="table table-striped datatable-colvis-state"> -->
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Company Name</th>
                            <th>Last Task Before</th>
                            <th>Task</th>
                            <th>Resource</th>
                            <th>Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($ContactsActivities as $row) {
                        ?>
                            <tr>
                                <td>
                                    <div>
                                        <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;">

                                        <!-- <a rel="tooltip" title="View Contact With No Task Details" style="color:#000" href="<?= base_url('admin/ReportAdmin/Reports/ViewDetailsContent') ?>?customer_id=<?= $row['customer_id'] ?>"><b><?= $row['company_name'] ?></b> -->
                                        <a rel="tooltip" title="View Inactive Contacts" onclick="ViewDetails(id)" id="<?= $row['customer_id'] ?>" style="font-weight:600;"><?= $row['company_name'] ?></a>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $row['last_activity_before'] ?> Days 
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $row['last_activity'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $row['employee'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= ucwords($row['status']) ?>
                                    </div>
                                </td>
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
    <!-- View Modal -->
    <div id="ViewDetailsModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">&nbsp;Contact Details</h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="ViewDetailsModalData">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- View Modal -->
    <div id="ViewTotalActivityDetailsModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="ViewTotalActivityDetailsModalData">

            </div>
        </div>
    </div>
    <!--  -->


    <script>
        $(document).ready(function(){
            var rescheduleTable = $('#contact_with_no_activity_table').DataTable( {       
                scrollCollapse: true,
                paging:         true, 
                // order: [[0, 'desc']],
                // fixedColumns: true,
                // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
                "buttons": [
                    {
                        extend: 'colvis',
                        text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                        className: 'btn bg-indigo-400 btn-icon'
                    }
                ],
                "drawCallback": function() {
                        popoverOptions = {
                        content: function () {
                            // Get the content from the hidden sibling.
                            return $(this).siblings('.my-popover-content').html();
                        },
                        placement: 'bottom',
                        container: 'body',
                        html: true,
                        sanitize: false,
                        // selector: '[data-toggle="popover"]',
                    };
                    $('.panel-button').popover(popoverOptions);

                    $('.panel-button').click(function (e) {
                        e.stopPropagation();
                    });

                    }  
                // stateSave: true,
                // columnDefs: [
                //     {
                //         targets: -1,
                //         visible: true,
                //     }
                // ]
            } );

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
    </script>

    <?php $this->load->view('Admin/includes/n-footer');    ?>
    <script>
        // $('#contact_with_no_activity_table').DataTable();
        
        function ViewDetails(customer_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
            // alert(datastring);
            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivitiesDetails'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $("#ViewDetailsModalData").html(data);
                    $("#ViewDetailsModal").modal();
                    // $('#ajax_table').DataTable();  

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


        function ViewTotalActivityDetails(customer_id) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
            // alert(datastring);
            $.ajax({
                url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewTotalActivityDetails'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $("#ViewTotalActivityDetailsModalData").html(data);
                    $("#ViewTotalActivityDetailsModal").modal();
                    // $('#ajax_table').DataTable();  

                    $('#ajax_table2').DataTable({
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

                        url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeContactsWithNoActivities'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $("#loader_gif").hide();
                            $("#rsdata").css('display', 'block');
                            $("#rsdata").html(data);
                            // $('#all_activity_filter_table').DataTable();
                            $('#contact_with_no_activity_table').dataTable().fnClearTable();
                            $('#contact_with_no_activity_table').dataTable().fnDestroy();
                            $("#contact_with_no_activity_table").hide();
                            // $('#all_activity_filter_table').DataTable({
                            //     buttons: {
                            //         dom: {
                            //             button: {
                            //                 className: 'btn btn-default'
                            //             }
                            //         },
                            //         buttons: [
                            //             'copyHtml5',
                            //             'excelHtml5',
                            //             'csvHtml5',
                            //             'pdfHtml5'
                            //         ]
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
          $('#customer_type_14').select2();
        
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
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date').val());
            var end_date = new Date($('#end_date').val());
            
            if (start_date > end_date) 
            {
                $('#error_end_date').css('display','block');
                $("#act_sub_btn").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#act_sub_btn").attr('disabled', false);
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