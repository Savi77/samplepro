<?php $this->load->view('Admin/includes/n-header');    ?>
<?php
if ($this->session->user_type == 'SA' or $this->session->schedule_view == '1') {
    $style = "display: none";
    $id = "";
    $class = "table datatable-responsive";
    $cellspacing = "";
    $incomplete_tab = "";
} else {
    $hidden = "d-none";
    $id = "example";
    $class = "display";
    $cellspacing = "0";
    $incomplete_tab = "display: none";
}

$reschedule_count = count($incomplete_issue);

?>

<!-- <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/assets/css/table.css"> -->
<style>
    .content .card {
        position: relative !important;
    } 
    /* .dataTables_length{
        position: absolute !important;
        right:  -18% !important;
    } */
    /* .dt-buttons{
        position: absolute !important;
        right: -23% !important;
    } */
    .datatable-footer{
        position: relative;
    }
    /* #DataTables_Table_0_paginate{
        position: absolute;
        right: -23% !important;
        top: 9px
    } */

    /* @media only screen and (max-width: 1680px){
        .dataTables_length{
            position: absolute !important;
            right:  -31% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -37% !important;
        }
    }
    @media only screen and (max-width: 1600px){
        .dataTables_length{
            position: absolute !important;
            right:  -39% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -45.5% !important;
        }
    }
    @media only screen and (max-width: 1536px){
        .dataTables_length{
            position: absolute !important;
            right:  -46% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -53% !important;
        }
    }
    @media only screen and (max-width: 1440px){
        .dataTables_length{
            position: absolute !important;
            right:  -58% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -66% !important;
        }
    }
    @media only screen and (max-width: 1400px){
        .dataTables_length{
            position: absolute !important;
            right:  -64% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -72% !important;
        }
    }
    @media only screen and (max-width: 1366px){
        .dataTables_length{
            position: absolute !important;
            right:  -102% !important;
           
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -112% !important;
           
        }
    } */
    /* @media only screen and (max-width: 1366px){
        .dataTables_length{
            position: absolute !important;
            right:  -102% !important;
            right: -85% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -112% !important;
            right: -93% !important;
        }
    } */
    /* @media only screen and (max-width: 1280px){
        .dataTables_length{
            position: absolute !important;
            right:  -84% !important;
        }
        .dt-buttons,#DataTables_Table_0_paginate{
            position: absolute !important;
            right: -93% !important;
        }
    } */
    table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }

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
    /* .datatable-scroll-wrap {
        overflow-x: unset !important;
    } */
    /* #DataTables_Table_0_wrapper{
        overflow-x: auto !important;
    }
    table{
        border-top: 1px solid #dddddd !important;
        border-bottom: 1px solid #dddddd !important;
    }
    .datatable-header {
        border-bottom: none !important;
    }  
    .datatable-footer {
        border-top: none !important;
    } */
    .select2-search__field{
        width: 100% !important;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
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
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    #myTableDashboard_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#myTableDashboard_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#myTableDashboard_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
    }
</style>
<div class="content-wrapper">
    <div class="content">
        
        <div class="card">

            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text"><?= $sidebar['menu']; ?> Task List</span>
                <!-- <div class="row crm-row">
                    <div class="col-lg-12 center-align crm-col">
                        <div class="col-lg-3 col-sm-4 small-col">
                            <button type="button" class="notes">
                                <figure class="sub-header-icon">
                                    <a data-toggle="modal" data-target="#schedule_model"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/add.png">
                                        <figcaption> Add </figcaption>
                                    </a>
                                </figure>
                            </button>
                        </div>
                    </div>
                </div> -->
                <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>

            </div>

            <table class="table table-striped" id="myTableDashboard">
                <thead>
                    <!-- <tr>
                        <th><div style="width:120px;">Task Id</div></th>
                        <th><div style="width:110px;">Status</div></th>
                        <th><div style="width:150px;">Company Name</div></th>
                        <th><div style="width:120px;">Customer Name</div></th>
                        <th><div style="width:120px;">Product Name</div></th>
                        <th><div style="width:120px;">Issue</div></th>
                        <th><div style="width:150px;">Issue schedule date</div></th>
                        <th class="<?= $hidden ?>"><div style="width:170px;">Schedule to</div></th>
                        <th><div style="width:120px;">Priority</div></th>
                        <th><div style="width:150px;">Issue assign date/time</div></th>
                        <th><div style="width:120px;">Action</div></th>
                    </tr> -->
                    <tr>
                        <th>Task ID</th>
                        <th>Product-Services</th>
                        <th>Contact Detail</th>
                        <th>Task Owner</th>
                        <th>Planned Date Time</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                    </tr>
                    <!-- <tr>
                        <th><div style="width:120px;">Task ID</div></th>
                        <th><div style="width:150px;">Company Name</div></th>
                        <th><div style="width:120px;">Customer Name</div></th>
                        <th><div style="width:120px;">Product Name</div></th>
                        <th class="d-none"></th>
                        <th><div style="width:150px;">Issue schedule date</div></th>
                        <th class="<?= $hidden ?>"><div style="width:170px;">Task Owner</div></th>
                        <th><div style="width:120px;">Priority</div></th>
                        <th><div style="width:110px;">Status</div></th>
                        <th class="d-none"></th>
                        <th><div style="width:120px;">Action</div></th>
                    </tr> -->
                </thead>
                <tbody>
                <?php
                    if(!empty($customer_issue))
                    {
                    $count = 1;
                    foreach ($customer_issue as $row) {
                        
                        if ($row['check_assign'] == 'No') 
                        {
                            $color = "#ffd2d2";
                            $emp_assign_date = "not schedule";
                        } 
                        else 
                        {
                            $color = "#ffffff";
                            $startTime = date('h:i a', strtotime($row['starttime']));
                            $endTime = date('h:i a', strtotime($row['endtime']));
                            $emp_assign_date = date("d M Y", strtotime($row['assign_date']));
                        }

                        if ($row['priority'] == 'Low') {
                            $priority_color = 'info';
                        } else if ($row['priority'] == 'Normal') {
                            $priority_color = 'primary';
                        } else {
                            $priority_color = 'warning';
                        }

                        if(!empty($row['priority']))
                        {
                            $priority = $row['priority'];
                        }
                        else
                        {
                            $priority = 'No Priority';
                        }

                    ?>
                    <tr>
                        <td style="font-weight: 600;color: #000;">
                            <a rel="tooltip" title="View Task details" href="<?= base_url('admin/ScheduleManagement/Task_view_dashboard_page') ?>?task_id=<?= $row['query_id'] ?>">
                                <div style="width: 100px; font-weight: 600; color:#000; cursor: pointer;"><?= $row['ticket_no'] ?></div>
                            </a>
                            <!-- <div style="width:120px;">#<?= $row['ticket_no'] ?></div>     -->
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:150px;"><?= $row['product_name'] ?></div>
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:200px;"><?= $row['company_name'] ?></div>
                        </td>
                        <td>
                            <div style="width:200px;display:flex;">
                                <!-- <?php
                                    if ($row['check_assign'] == 'No') { ?>
                                        <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="<?= $row['query_id'] ?>" data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>
                                    <?php } else { ?>
                                        <?php if ($row['schedulecount'] != 0) { ?>

                                        <a data-toggle="modal" data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="<?= $row['query_id'] ?>"><span class="label label-primary"><?= $row['schedulecount'] ?></span></a><br><?= $row['employee_name'] ?><br>
                                        <?php } else { ?>
                                        <a data-toggle="modal" data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="<?= $row['query_id'] ?>"><span class="label label-primary"><?= $row['schedulecount'] ?></span></a><br><?= $row['employee_name'] ?><br>
                                    <?php } ?>
                                <?php } ?> -->

                                <?php
                                    if ($row['check_assign'] == 'No') { ?>
                                        <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="<?= $row['query_id'] ?>" data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>
                                    <?php } else { ?>
                                        <?php if ($row['schedulecount'] != 0) { ?>

                                        <div class="text-wrap-col" style="width:150px;"><?= $row['employee_name'] ?></div><a data-toggle="modal" data-toggle="tooltip" title="Re-Schedule count" rel="tooltip" data-placement="bottom" onclick="reschedule_list(id)" id="<?= $row['query_id'] ?>"><button type="button" class="green-btn activity-btn-text" style="margin-left:10px;"><?= $row['schedulecount'] ?></button></a><br>
                                        <?php } else { ?>
                                        <div class="text-wrap-col" style="width:150px;"><?= $row['employee_name'] ?></div><a data-toggle="modal" data-toggle="tooltip" title="Re-Schedule count" rel="tooltip" data-placement="bottom" id="<?= $row['query_id'] ?>"><button type="button" class="green-btn activity-btn-text" style="margin-left:10px;"><?= $row['schedulecount'] ?></button></a><br>
                                    <?php } ?>
                                <?php } ?>

                            </div>    
                        </td>
                        <td>
                            <div style="width:150px;">
                                <?= $emp_assign_date ?> 
                                <br>
                                <?php
                                if($emp_assign_date == 'not schedule')
                                {
                                ?>
                                
                                <?php
                                }
                                else
                                {
                                ?>
                                <small><?= $startTime . " to " . $endTime ?></small>
                                <?php
                                }
                                ?>
                            </div>
                        </td>

                        <td style= "position: relative;">
                            <div style="width:150px";>
                                <!-- <input type="text" name="prior" value="<?=$priority;?>"> -->
                                <ul class="pull-right dflex Padding-0 m-auto text-black">
                                    <li>   
                                        <ul class="list list-unstyled" style="position:relative;">
                                            <li>
                                                <div>
                                                    <div class="panel-button">
                                                        <input type="button" title="Add Priority" rel="tooltip" value="<?= $priority; ?>" readonly style="width: 88px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                        <a title="Add Priority" rel="tooltip">
                                                            <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                        </a>
                                                    </div>
                                                    <div class="my-popover-content" style="display:none;">
                                                        <ul>
                                                            <li>
                                                                <a onclick="priority_normal(this.id)" id="<?= $row['query_id'] ?>">
                                                                    <span class="status-mark position-left dot dot-red"></span> Normal
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="priority_low(this.id)" id="<?= $row['query_id'] ?>">
                                                                    <span class="status-mark position-left dot dot-yellow"></span> Low
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="priority_high(this.id)" id="<?= $row['query_id'] ?>">
                                                                <span class="status-mark position-left dot dot-blue"></span> High
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                            
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>     
                        </td>



                        <td>
                            <div style="width:150px;"><?= ucwords($row['status']) ?></div>
                        </td>

                        <td>
                            <div style="width:150px;">
                                <ul class="pull-right dflex Padding-0 m-auto text-black">
                                    <li>  
                                        <div>
                                            <div class="panel-button">
                                                <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                    <i class="icon-menu9" style="cursor:pointer;"></i>
                                                </a>
                                            </div>
                                            
                                            <div class="my-popover-content" style="display:none">
                                                <ul>
                                                    <li>
                                                        <!-- <a id="<?= $row['ticket_no'] ?>" onclick="remark_list(this.id)" data-toggle="modal">
                                                            <span class="status-mark position-left dot dot-blue"></span> View Task
                                                        </a> -->
                                                        <a href="<?= base_url('admin/ScheduleManagement/Task_view_dashboard_page') ?>?task_id=<?= $row['query_id'] ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-blue"></span> View Task  
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> 

                                    </li>
                                </ul>
                            </div>
                        </td>

                        <td class="d-none"></td>
                        <td class="d-none"></td>
                        <td class="d-none"></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>


$(document).ready(function(){
    var rescheduleTable = $('#myTableDashboard').DataTable( {       
        // scrollX:        true,
        scrollCollapse: true,
        // autoWidth:         true,  
        paging:         true, 
        order: [[0, 'desc']],
        // columnDefs: [
        // { "width": "150px", "targets": [3] },
        // { "width": "100px", "targets": [0,1,2,4,6] },  
        // { "width": "50px", "targets": [5,7] },
        // ],
        // fixedColumns: true,
        // "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        buttons: [
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
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
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

    // $('#myTable').dataTable();
});

</script>


<?php $this->load->view('Admin/includes/n-footer');    ?>

    <!-- <div id="schedule_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Add Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="schedule_addForm">
                                <div class="row">
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="customer_id" id="customer_id_dashboard" data-placeholder="Select Company">
                                                <option value="">Select Company</option>
                                                <?php foreach ($customer_list as $value) { ?>
                                                    <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                        (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="product_id" id="product_id_dash" data-placeholder="Select Product">
                                                <option value="">Select Product</option>
                                                <?php
                                                foreach ($product_list as $value1) { ?>
                                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div> -->
                                        <!-- </div> -->
                                    <!-- </div>
                                    <?php
                                    $user_sess_type = $this->session->user_type;
                                    if ($this->session->user_type != "SA") {
                                        $emp_id = $this->session->id;
                                        $name_emp = $this->session->name;
                                    } else {
                                        $emp_id = '';
                                    }
                                    ?>
                                    <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                </span>
                                                <input type="text" class="form-control pickadate-selectors rounded-right" id="schedule_date" name="schedule_date" value="<?= date('d F, Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueChange12()" autocomplete="off">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Employee Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="employee_id" id="employee_id_dashboard" onchange="getassignedissueChange12()" data-placeholder="Select Employee">
                                                <option value="">Select Employee</option>
                                                <?php
                                                foreach ($employee_list as $value2) {
                                                    $all_emp_id = $value2->id;
                                                    if ($all_emp_id == $emp_id) {
                                                ?>
                                                        <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12" id="issuelistdetails" style="display: none">
                                        <label class="control-label col-sm-12 m-auto" for="Youtube">Assign issue list</label>
                                        <div class="col-sm-12" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time" value="" placeholder="Please select start time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' " autocomplete="off">
                                            <span id="err3" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_end_time" name="schedule_end_time" value="" placeholder="Please select end time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off">
                                            <span id="err4" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_dashboard" data-placeholder="Select Schedule Type">
                                                <option value="">Select Schedule Type</option>
                                                <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                    <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Comments <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 pl-3">
                                        <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1">
                                        <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                    </div>
                                    <div class="reminderSetting col-sm-12" style="display: none;">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">User </label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="user_id[]" id="user_id_dashboard" data-placeholder="Select Company">
                                                        <option value="">Select Company</option>
                                                        <?php foreach ($getUserSysyemList as $value1) {   ?>
                                                            <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                        <?php   }    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Reminder Before Time </label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="reminder_before_time" id="rmd_dashboard" data-placeholder="Select Company">
                                                        <option value="">Select Company</option>
                                                        <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Notify By </label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="reminder_notify_by" id="notify_dashboard" data-placeholder="Select Company">
                                                        <option value="">Select Notify By</option>
                                                        <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Notes <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Comments" maxlength="500"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="recurring_set" id="recurring_set_dashboard" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
                                                        <option value="">Select Recurring</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recuuringData col-sm-12" style="display: none;clear:both">
                                        <div class="form-group col-sm-6">
                                            <label class="control-label col-sm-12" for="email">Recurring Interval </label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="interval_type" id="interval_type_dashboard" data-placeholder="Select Recurring Interval">
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
                                        <div class="form-group col-sm-6">
                                            <label class="control-label col-sm-12" for="email">Recurring EOD</label>
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" id="recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
                                            Add Activity <i class="icon-arrow-right14 position-right"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-1">
                                        <div id="preview"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->






<div id="schedule_model" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="schedule_addForm">
                                <div class="row">
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="customer_id" id="customer_id_dashboard" data-placeholder="Select Company">
                                                <option value="">Select Company</option>
                                                <?php foreach ($customer_list as $value) { ?>
                                                    <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                        (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <!-- <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="product_id" id="product_id_type3" title="Select Product" data-placeholder="Select Product">
                                                <option value="">Select Product</option>
                                                <?php
                                                foreach ($product_list as $value1) { ?>
                                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div> -->
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Resource Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="employee_id" id="employee_id_dashboard" onchange="getassignedissueChange12()" data-placeholder="Select Resource">
                                                <option value="">Select Resource</option>
                                                <?php
                                                foreach ($employee_list as $value2) {
                                                    $all_emp_id = $value2->id;
                                                    if ($all_emp_id == $emp_id) {
                                                ?>
                                                        <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                    <?php
                                        $user_sess_type = $this->session->user_type;
                                        if ($this->session->user_type != "SA") {
                                            $emp_id = $this->session->id;
                                            $name_emp = $this->session->name;
                                        } else {
                                            $emp_id = '';
                                        }
                                    ?>
                                    <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="product_id" id="product_id_dash" data-placeholder="Select Product">
                                                <option value="">Select Product</option>
                                                <?php
                                                foreach ($product_list as $value1) { ?>
                                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="email">Comments</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="1" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                        </div>
                                        <!-- <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                </span>
                                                <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date" name="schedule_date" value="<?= date('d F, Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueChange12()" autocomplete="off">
                                            </div>
                                        </div> -->
                                        <!-- <label class="control-label col-sm-2 m-auto" for="Youtube">Employee Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="employee_id" id="employee_id_type3" onchange="getassignedissueChange12()" title="Select Employee" data-placeholder="Select Employee">
                                                <option value="">Select Employee</option>
                                                <?php
                                                foreach ($employee_list as $value2) {
                                                    $all_emp_id = $value2->id;
                                                    if ($all_emp_id == $emp_id) {
                                                ?>
                                                        <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div> -->
                                    </div>

                                    <div class="form-group col-sm-12" id="issuelistdetails" style="display: none">
                                        <label class="control-label col-sm-12 m-auto" for="Youtube">Assign issue list</label>
                                        <div class="col-sm-12" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                </span>
                                                <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date" name="schedule_date" value="<?= date('d F, Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueChange12()" autocomplete="off">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_dashboard" data-placeholder="Select Schedule Type">
                                                <option value="">Select Schedule Type</option>
                                                <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                    <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_start_time_schedule" name="schedule_start_time" placeholder="Select Start Time"  autocomplete="off" readonly>
                                            <span id="err3" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_end_time_schedule" name="schedule_end_time" placeholder="Select End Time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off" >
                                            <span id="err4" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="priority_id" id="priority_id_dashboard" data-placeholder="Select Priority">
                                                <option value="">Select Priority</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Low">Low</option>
                                                <option value="High">High</option>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" id="status_dashboard" data-placeholder="Select Status">
                                                <option value="">Select Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Inprogress">In-progress</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>
                                        <!-- </div> -->
                                    </div>

                                    <!-- <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_id_type3" title="Select Schedule Type" data-placeholder="Select Schedule Type">
                                                <option value="">Select Schedule Type</option>
                                                <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                    <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Comments <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="col-12 pl-3">
                                        <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1" >
                                        <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                    </div>
                                    <div class="reminderSetting col-sm-12" style="display: none;">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">User 
                                                    <span style="color: red;">*</span>
                                                </label>
                                                <!-- <div class="col-sm-12">
                                                    <select class="form-control" name="user_id[]" id="user_id_dashboard" data-placeholder="Select User" title="Select User" multiple>
                                                        <option value="">Select Company</option>
                                                        <?php foreach ($getUserSysyemList as $value1) {   ?>
                                                            <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                        <?php   }    ?>
                                                    </select>
                                                </div> -->
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="user_id[]" id="user_id_dashboard" data-placeholder="Select User" title="Select User" multiple >
                                                        <option value="">Select User</option>
                                                        <?php foreach ($getUserSysyemList as $value1) {   ?>
                                                            <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                        <?php   }    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="reminder_before_time" id="rmd_dashboard" data-placeholder="Select Reminder Before Time">
                                                        <option value="">Select Reminder Before Time</option>
                                                        <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="reminder_notify_by" id="notify_dashboard" data-placeholder="Select Notify By">
                                                        <option value="">Select Notify By</option> 
                                                        <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label col-sm-12" for="email">Notes <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Notes" maxlength="500"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="recurring_set" id="recurring_set_dashboard" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
                                                        <option value="">Select Recurring</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recuuringData col-sm-12" style="display: none;clear:both">
                                        <div class="form-group col-sm-6">
                                            <label class="control-label col-sm-12" for="email" style="padding-left:0;">Recurring Interval </label>
                                            <div class="col-sm-12" style="padding-left:0;">
                                                <select class="form-control" name="interval_type" id="interval_type_dashboard" data-placeholder="Select Recurring Interval">
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
                                        <div class="form-group col-sm-6">
                                            <label class="control-label col-sm-12" for="email" style="padding-right:0;">Recurring EOD</label>
                                            <div class="col-sm-12" style="padding-right:0;">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" id="recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
                                            Submit <i class="icon-arrow-right14 position-right"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-1">
                                        <div id="preview"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     $('#user_id_dashboard').select2({
        placeholder: 'Select User'
    });
</script>



<script>
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });

    $('#product_id_dash').select2({
        dropdownParent: $('#schedule_model')
    });

    // $('#user_id_dashboard').select2({
    //     dropdownParent: $('#schedule_model'),
    //     placeholder: 'Select User'
    // });

    $('#customer_id_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#employee_id_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#schedule_type_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#rmd_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#notify_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#recurring_set_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#interval_type_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#priority_id_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#status_dashboard').select2({
        dropdownParent: $('#schedule_model')
    });
    

    function showDataRecurring(id) {
        if (id == 1) {
            $('.recuuringData').css('display','flex');
        } else {
            $('.recuuringData').css('display','none');
        }
    }
    $(document).on('change', '.checkboxchecked', function() {
        if (this.checked) {
            $('.reminderSetting').show();
        } else {
            $('.reminderSetting').hide();
            $('#user_id').val("");
            $('#rmd_dashboard').val("");
            $('#reminder_note').val('');
        }
    });
    
    $('#schedule_date').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_date');
    });

    $('#schedule_start_time').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
    });

    $('#schedule_end_time').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
    });

    $(document).ready(function() {
        $('#schedule_addForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                customer_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Customer'
                        }
                    }
                },

                product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select product'
                        }
                    }
                },

                employee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Resource'
                        }
                    }
                },

                schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Schedule Date'
                        }
                    }
                },

                query: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Query'
                        }
                    }
                },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Notify By.'
                        }
                    }
                },
                recurring_set: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring Type'
                        }
                    }
                },

                schedule_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start time'
                        }
                    }
                },

                schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end time'
                        }
                    }
                },

                schedule_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select schedule type'
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

    $(document).ready(function(e) {

        $("#schedule_addForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/add_schedule'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        $("#preview").hide();
                        if (data == 1 || data == 11) {
                            $(function() {
                                new PNotify({
                                    title: 'Add Schedule',
                                    text: 'Schedule Submited Successfully',
                                    type: 'success'
                                });
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            }, 1000);
                        } else if (data == 2) {
                            var notice = new PNotify({
                                title: 'Confirmation',
                                text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
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
                                $.ajax({
                                    url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                                    type: "POST",
                                    data: formresult,
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function(data) {
                                        // alert(data);
                                        $(function() {
                                            new PNotify({
                                                title: 'Add Schedule',
                                                text: 'Schedule Submited Successfully',
                                                type: 'success'
                                            });
                                        });

                                        setTimeout(function() {
                                            window.location =
                                                "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
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
//     $(document).ready(function(){
//     var rescheduleTable = $('#dashboard_table').DataTable( {       
//         // scrollX:        true,
//         scrollCollapse: true,
//         // autoWidth:         true,  
//         paging:         true, 
//         order: [[0, 'desc']],
//         columnDefs: [
//         { "width": "150px", "targets": [3] },
//         { "width": "100px", "targets": [0,1,2,4,6] },  
//         { "width": "50px", "targets": [5,7] },
//         ],
//         fixedColumns: true,
//     } );

//     // $('#myTable').dataTable();
// });
</script>

<script>
    function assign_to(id) {
        var datastring = 'query_id=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/assign_task'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#modal_default').modal('show');
                $('#user_model_data').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>
<script>
    function reschedule_list(id) {
        var datastring = 'query_id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/reschedule_list'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                PNotify.removeAll();
                if (data == 0) {
                    new PNotify({
                        title: 'Remark',
                        text: 'No re-schedule result',
                        type: 'warning'
                    });
                } else {
                    $('#modal_reschedule').modal('show');
                    $('#reschedule_model_data').html(data);
                }
            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>
<script>
    function priority_normal(id) {
        var datastring = 'query_id=' + id;
        
        
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/priority_normal'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $(function() {
                    // new PNotify({
                    //     // title: 'priority Form',
                    //     text: 'Priority change  Successfully',
                    //     type: 'success'
                    // });
                    $('#PrioritysucessModal').modal('show');
                });
                $('#get_data_form').submit();

            },
            error: function() {
                // alert('Error while request..');
                $('#alertModal').modal('show');
            }
        });
        return false;

    }

    function priority_low(id) {
        var datastring = 'query_id=' + id;

        

        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/priority_low'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $(function() {
                    // new PNotify({
                    //     // title: 'priority Form',
                    //     text: 'Priority change  Successfully',
                    //     type: 'success'
                    // });
                    $('#PrioritysucessModal').modal('show');
                });
                $('#get_data_form').submit();
            },
            error: function() {
                // alert('Error while request..');
                $('#alertModal').modal('show');
            }
        });
        return false;
    }


    function priority_high(id) {
        var datastring = 'query_id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/priority_high'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $(function() {
                    
                    // new PNotify({
                    //     // title: 'priority Form',
                    //     text: 'Priority change  Successfully',
                    //     type: 'success'
                    // });
                    $('#PrioritysucessModal').modal('show');
                });
                $('#get_data_form').submit();
                //  setTimeout(function()
                //    {
                //        window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                //    }, 1000);                  
            },
            error: function() {
                // alert('Error while request..');
                $('#alertModal').modal('show');
            }
        });
        return false;
    }
</script>

<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>


<script>

        $(document).ready(function () {
       
        $(document).click(function (e) {
            if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>





<div id="modal_default" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Assign Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="user_model_data">

                </div>
            </div>

        </div>
    </div>
</div>

<div id="modal_reschedule" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="reschedule_model_data">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="PrioritysucessModal" tabindex="-1" aria-labelledby="PrioritysucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="PrioritysucessModal" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Priority Changed Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin//Customer/ScheduleReport?Type='.$_GET['Type'].''); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin//Customer/ScheduleReport?Type='.$_GET['Type'].''); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>