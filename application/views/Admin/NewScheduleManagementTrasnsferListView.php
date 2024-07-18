<?php $this->load->view('Admin/includes/n-header'); ?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/assets/css/table.css"> -->
<style>
    .list>li:first-child {
        color: #000 !important;
    }

    /* .dt-button {
        display: none;
    } */
    #myTableTransferlist tbody tr .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, 26px, 0px) !important;
    }
    /* #myTableTransferlist tbody tr:last-child .list-unstyled .dropdown-menu{
        transform: translate3d(-129px, -100px, 0px) !important;
    } */
    .sorting_1 a{
        cursor: auto !important;
    }
    tr.odd 
    {
        white-space: nowrap !important;
    }
    tr {
        white-space: nowrap !important;
    }
    /* .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    } */
    /* #myTableTransferlist.dataTable td:nth-child(2),#myTableTransferlist.dataTable td:nth-child(3){
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    #myTableTransferlist.dataTable td:nth-child(2),#myTableTransferlist.dataTable td:nth-child(3){
        max-width: 100px;
    } */
    /* th.sorting{
        white-space: nowrap;
    }
    td.sorting{
        white-space: nowrap;
    } */
    /* #myTableTransferlist_wrapper .datatable-scroll-wrap {
        overflow-x: unset !important;
    }
    #myTableTransferlist_wrapper{
        overflow-x: auto !important;
    }     
    .content .card {
        position: relative !important;
    } 
    .datatable-footer{
        position: relative;
    }
    @media only screen and (max-width: 1680px){
        .dataTables_length{
            position: absolute !important;
            right:  5% !important;
        }
        .dt-buttons{
            position: absolute;
            right: -2%;
        }
        #myTableTransferlist_paginate{
            position: absolute;
            right: -2%;
            top: 9px;
        }
    }
    @media only screen and (max-width: 1600px){
        .dataTables_length{
            position: absolute !important;
            right:  -1% !important;
        }
        .dt-buttons{
            position: absolute;
            right: -8.5%;
        }
        #myTableTransferlist_paginate{
            position: absolute;
            right: -8.5%;
            top: 9px;
        }
    }
    @media only screen and (max-width: 1536px){
        .dataTables_length{
            position: absolute !important;
            right:  -6% !important;
        }
        .dt-buttons{
            position: absolute;
            right: -14%;
        }
        #myTableTransferlist_paginate{
            position: absolute;
            right: -14%;
            top: 9px;
        }
    }
    @media only screen and (max-width: 1440px){
        .dataTables_length{
            position: absolute !important;
            right:  -15% !important;
        }
        .dt-buttons,#myTableTransferlist_paginate{
            position: absolute;
            right: -23%;
        }
    }
    @media only screen and (max-width: 1400px){
        .dataTables_length{
            position: absolute !important;
            right:  -19% !important;
        }
        .dt-buttons,#myTableTransferlist_paginate{
            position: absolute;
            right: -28%;
        }
    }
    @media only screen and (max-width: 1366px){
        .dataTables_length{
            position: absolute !important;
            right:  -33% !important;
        }
        .dt-buttons,#myTableTransferlist_paginate{
            position: absolute;
            right: -43%;
        }
    }
    @media only screen and (max-width: 1280px){
        .dataTables_length{
            position: absolute !important;
            right:  -34% !important;
        }
        .dt-buttons,#myTableTransferlist_paginate{
            position: absolute;
            right: -43%;
        }
        
    } */
    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
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
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }
    button.green-btn,button.red-btn{
        font-size: 12px !important;
    }
    button.red-btn{
        width:70px !important;
        padding: 2px !important;
    }
    .list.list-unstyled input{
        padding-left: 10px !important;
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
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    

</style>
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
<div class="content-wrapper">
    <div class="content">
        <?php $reschedule_cnt = count($reschedule_issue_list);?>
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Transferred Task List</span>
            </div>
            <!-- id="myTableTransferlist"  -->
            <table class="table table-striped" id="myTableTransferlist" >  
                <thead>  
                <!-- <tr>  
                    <th>ID</th>  
                    <th>EMPName</th>  
                    <th>Company Name</th>  
                    <th>Product</th>  
                    <th>Comment</th>  
                    <th>Date</th>  
                    <th>Sheduled Time</th>  
                    <th>Priorty</th>
                    <th>Status</th>  
                    <th>Action</th>  
                </tr>   -->
                <tr>  
                    <th>Task ID</th>  
                    <th>Product-Service</th>  
                    <th>Contact Details</th>  
                    <th>Task Owner</th>  
                    <th>Planned Date Time</th>  
                    <th>Priority</th>  
                    <th>Status</th>  
                    <th>Action</th>
                </tr>
                </thead> 
                <tbody>
                <?php for ($j = 0; $j < $reschedule_cnt; $j++) 
                {
                    $ticket_no_1_reschedule = $reschedule_issue_list[$j]['ticket_no'];
                    $issue_1_reschedule = $reschedule_issue_list[$j]['issue'];
                    $check_1_reschedule = $reschedule_issue_list[$j]['check'];
                    $company_name_1_reschedule = $reschedule_issue_list[$j]['company_name'];
                    $created_date_1_reschedule = $reschedule_issue_list[$j]['schedule_date'];
                    $created_on_3 = $reschedule_issue_list[$j]['created_date'];
                    $priority_reschedule = $reschedule_issue_list[$j]['priority'];
                    $query_1_reschedule = $reschedule_issue_list[$j]['query_id'];
                    $product_name_3 = $reschedule_issue_list[$j]['product_name']; 

                    if($reschedule_issue_list[$j]['value_priority'] == '')
                    {
                        $value_priority_3 = 'No Priority';
                    }
                    else
                    {
                        $value_priority_3 = $reschedule_issue_list[$j]['value_priority'];
                    }
                    
                ?>
                <tr>
                    <td>
                        <a href="<?= base_url('admin/ScheduleManagement/Task_view_transfer_page') ?>?task_id=<?= $query_1_reschedule ?>">
                            <div style="width:150px;font-weight: 600; color:#000; cursor: pointer;"><?= $ticket_no_1_reschedule ?></div>
                        </a>
                        <!-- <div style="width: 100px;"><a style="font-weight: 600;color: #000;">#<?= $ticket_no_1_reschedule ?></a></div> -->
                    </td>
                    <td >
                        <div class="text-wrap-col" style="width:150px;"><?= $product_name_3; ?></div>
                    </td>
                    <td>
                        <div class="text-wrap-col" style="width:200px;"><?= $company_name_1_reschedule; ?></div>
                    </td>
                    <td style="width: 200px;display:flex;height:72px;align-items:center;">
                        <?= $check_1_reschedule ?>
                    </td>
                    <!-- <td><?= $issue_1_reschedule; ?></td> -->
                    <td>
                        <div style="width: 150px;"><?= $created_date_1_reschedule; ?> <br><small><?= $reschedule_issue_list[$j]['scheduledatetime']; ?></small></div>
                    </td>
                    <!-- <td><?= $reschedule_issue_list[$j]['scheduledatetime']; ?></td> -->
                    <td style= "position: relative;">
                        <div style="width:150px;">
                            <ul class="list list-unstyled " style="position: relative;">
                                <li class="dropdown">
                                <!-- <input type="button" title="Add Priority" rel="tooltip" data-toggle="dropdown" value = "<?= $value_priority_3; ?>" readonly style="width: 90px;/* height:22px; */background: #009846;/* padding-right: 3px; */margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                    <?= $priority_reschedule; ?> -->
                                    <?= $value_priority_3;?>
                                </li>
                            </ul>
                        </div>
                    </td>

                    <td>
                        <div style="width:150px;">
                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                <li><?= $reschedule_issue_list[$j]['status']; ?></li>
                            </ul>
                        </div>
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
                                                    <a href="<?= base_url('admin/ScheduleManagement/Task_view_transfer_page') ?>?task_id=<?= $query_1_reschedule ?>" style="color:#000;">
                                                        <span class="status-mark position-left dot dot-blue"></span> View Task
                                                    </a>
                                                    <!-- <a id="<?= $ticket_no_1_reschedule ?>" onclick="remark_list(this.id)" data-toggle="modal">
                                                        <span class="status-mark position-left dot dot-blue"></span> View Task
                                                    </a> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div> 
                                </li>
                                <!-- <li class="ml-3"><a id="<?= $ticket_no_1_reschedule ?>" onclick="remark_list(this.id)" data-toggle="modal" rel="tooltip" title="View Transferred Activity"><i class="icon-eye"> -->
                                    <!-- <span class="tooltiptext">Tooltip text</span> -->
                                </i></a></li>
                            </ul>
                        </div>
                    </td>

                </tr>
                <!-- <?php
                    $record_cnt_reschedule = $j + 1;
                    if ($record_cnt_reschedule < $reschedule_cnt) {
                        
                        $ticket_no_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['ticket_no'];
                        $issue_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['issue'];
                        $check_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['check'];
                        $company_name_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['company_name'];
                        $created_date_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['schedule_date'];
                        $created_on_4 = $reschedule_issue_list[$record_cnt_reschedule]['created_date'];
                        $priority_2_reschedule = $reschedule_issue_list[$j]['priority'];
                        $product_name_3_2 = $reschedule_issue_list[$record_cnt_reschedule]['product_name'];
                        $query_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['query_id'];

                        if($reschedule_issue_list[$record_cnt_reschedule]['value_priority'] == '')
                        {
                            $value_priority_3_2 = 'No Priority';
                        }
                        else
                        {
                            $value_priority_3_2 = $reschedule_issue_list[$record_cnt_reschedule]['value_priority']; 
                        }
                ?>
                 <tr>
                    <td>
                        <a href="<?= base_url('admin/ScheduleManagement/Task_view_transfer_page') ?>?task_id=<?= $query_2_reschedule ?>">
                            <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $ticket_no_2_reschedule ?></div>
                        </a>
                    </td>
                    <td>
                        <div class="text-wrap-col" style="width:150px;"><?= $product_name_3_2; ?></div>
                    </td>
                    <td>
                        <div class="text-wrap-col" style="width:200px;"><?= $company_name_2_reschedule; ?></div>
                    </td>
                    <td style="display: flex; justify-content: space-between;width:200px;"><?= $check_2_reschedule ?></td>
                    <td>
                        <div style="width: 150px;"><?= $created_date_2_reschedule; ?> <br> <small><?= $reschedule_issue_list[$j]['scheduledatetime']; ?> </small></div>
                    </td>
                    <td style= "position: relative;">
                        <div style="width:150px;">
                            <ul class="list list-unstyled " style="position: relative;">
                                <li class="dropdown">
                                    <?= $value_priority_3_2;?>

                                </li>
                            </ul>
                        </div>
                    </td>

                    <td>
                        <div style="width:150px;">
                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                <li><?= $reschedule_issue_list[$j]['status']; ?></li>
                            </ul>
                        </div>
                    </td>

                    <td>
                        <div>
                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                <li>  
                                    <div>
                                        <div class="panel-button">
                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                <i class="icon-menu9"></i>
                                            </a>
                                        </div> 
                                        <div class="my-popover-content" style="display:none">
                                            <ul>
                                                <li>
                                                    <a href="<?= base_url('admin/ScheduleManagement/Task_view_transfer_page') ?>?task_id=<?= $query_2_reschedule ?>" style="color:#000;">
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


                </tr>
                <?php }?> -->
                <?php }?>
                </tbody>
            </table>
        </div>

    </div>
</div>




<script> 
$(document).ready(function(){
    var rescheduleTable = $('#myTableTransferlist').DataTable( {       
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
        
});

</script>


<div id="schedule_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Add Activity</h6>
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
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                <option value="">Select Company</option>
                                                <?php foreach ($customer_list as $value) { ?>
                                                    <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                        (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="product_id" id="product_id">
                                                <option value="">Select Product</option>
                                                <?php
                                                foreach ($product_list as $value1) { ?>
                                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php  } ?>
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
                                            <select class="form-control" name="employee_id" id="employee_id" onchange="getassignedissueChange12()">
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
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_id">
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
                                                    <select class="select-search" name="user_id[]" id="user_id" multiple>
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
                                                    <select class="form-control" name="reminder_before_time" id="reminder_before_time">
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
                                                    <select class="form-control" name="reminder_notify_by" id="reminder_notify_by">
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
                                                    <select class="form-control" name="recurring_set" id="recurring_set" onchange="showDataRecurring(this.value)">
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
                                    <div class="col-sm-12">
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
</div>

<!-- ===================================================================================== -->
<div id="upload_schedule_documents2" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00619F;color: white;padding: 13px; height: 55px;">
                <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="margin-top: -4px">
                    <i class="icon-upload" style="zoom:1.1; "></i>
                    &nbsp;Upload Documents
                </h5>
            </div>
            <div class="modal-body" style="padding: 10px;">

            </div>
        </div>
    </div>
</div>


<!--=============================== Assign task modal (ADMIN SIDE) ================================ -->

<div id="modal_default" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="user_model_data">

            </div>
        </div>
    </div>
</div>
<!--============================== Re-schedule ===========================================-->
<div id="modal_default12" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Assign Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="user_model_data12">

                </div>
            </div>

        </div>
    </div>
</div>

<!--=============================== / Assign task modal (ADMIN SIDE) ================================ -->

<!--=============================== Status Change modal (Employee SIDE) ================================ -->
<div id="modal_status" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Change Status</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="StatusForm">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" maxlength="150"></textarea>
                        </div>
                    </div>
                    <label class="control-label col-sm-3" for="email">Change Status <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <select name="status_update" class="form-control">
                            <option value="">Select status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <input type="hidden" id="qry_id" class="file-styled" name="query_id">
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--=============================== Remark modal (Admin SIDE) ================================ -->
<div id="modal_remark" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Issue details</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="remark_model_data">

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="reschedule_activity" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-drawer3" style="zoom:1.1; "></i>&nbsp;&nbsp; Reshedule Activity </h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div id="reschedule_data">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form class="form-horizontal" id="reschedule_form" method="POST" action="<?= base_url(); ?>admin/ScheduleManagement/ResheduleActivitySubmit">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    <input type="hidden" name="ticket_no" id="ticket_no_edit">
                                    <input type="hidden" name="assign_to" id="assign_to_edit">
                                    <input type="hidden" name="schedule_type_id" id="schedule_type_id_edit">
                                    <input type="hidden" name="customer_id" id="customer_id_data">
                                    <input type="hidden" name="product_id" id="product_id_data">
                                    <div class="row">
                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="customer_id" id="customer_id_edit" disabled>
                                                    <option value="">Select Company</option>
                                                    <?php
                                                    foreach ($customer_list as $value) { ?>
                                                        <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                            (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="product_id" id="product_id_edit" disabled>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    foreach ($product_list as $value1) { ?>
                                                        <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                    <?php  } ?>
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
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Employee Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="employee_id" id="employee_id_edit" onchange="getassignedissueResch()" disabled>
                                                    <option value="">Select Employee</option>
                                                    <?php
                                                    foreach ($employee_list as $value2) {
                                                        // $ResheduleActivityData->assign_to = $value2->id;
                                                        if ($ResheduleActivityData->assign_to == $value2->id) { ?>
                                                            <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" id="schedule_date_edit" name="schedule_date" placeholder="Enter Schedule Date" onchange="getassignedissueResch()">
                                                    <!-- <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d F, Y'); ?>"> -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-12" id="issuelistdetails_edit" style="display: none">
                                            <label class="control-label col-sm-12" for="Youtube">Assign issue list</label>
                                            <div class="col-sm-12" id="issue_schedule_list_edit" style="max-height: 110px; overflow: auto;">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time" value="" placeholder="Please select start time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' ">
                                                <span id="err3" style="color:red; font-size: 12px;"></span>
                                            </div>
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" id="schedule_end_time" name="schedule_end_time" value="" placeholder="Please select end time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' ">
                                                <span id="err4" style="color:red; font-size: 12px;"></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="schedule_type_id" id="schedule_type_edit">
                                                    <option value="">Select Schedule Type</option>
                                                    <?php
                                                    foreach ($schedule_visit_list as $st_value) { ?>
                                                        <option value="<?= $st_value->id ?>" <?= $st = ($ResheduleActivityData->schedule_type_id == $st_value->id) ? 'selected' : ''; ?>>
                                                            <?= $st_value->type_name ?></option>
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
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-12">
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
    </div>
</div>
<!--  -->
<!-- Modal -->
<div id="issue_details" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="bind_issue_data">

        </div>
    </div>
</div>
<!--  -->

<div id="modal_billing" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="billing_model_data">

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

<?php $this->load->view('Admin/includes/n-footer'); ?>


<script type="text/javascript">
    $('#employee_list').select2({
        placeholder: 'Select Employee List'
    });

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

    function Show_issue_list() {
        $('#reschedule_issue_view').hide();
        $('#complete_issue_view').hide();
        $('#all_activity_view').show();

        $('#pending_issue_list').css('border', '3px solid #08ad0f');
        $('#reschedule_issue_list').css('border', '1px solid #FF6F4C');
        $('#completed_issue_list').css('border', '1px solid #08ad0f');

        $('#completed_activity_filter').hide();
        $('#reschedule_activity_filter').hide();
        $('#all_activity_filter').show();

        animateCSS('#default_issue_table', 'zoomIn');
    }

    function Show_reschedule_list() {
        $('#reschedule_issue_view').show();
        $('#complete_issue_view').hide();
        $('#all_activity_view').hide();

        $('#reschedule_issue_list').css('border', '3px solid #FF6F4C');
        $('#pending_issue_list').css('border', '1px solid #08ad0f');
        $('#completed_issue_list').css('border', '1px solid #08ad0f');

        $('#completed_activity_filter').hide();
        $('#reschedule_activity_filter').show();
        $('#all_activity_filter').hide();

        animateCSS('#reschedule_issue_table', 'zoomIn');
    }

    function Show_Completed_list() {
        $('#complete_issue_view').show();
        $('#reschedule_issue_view').hide();
        $('#all_activity_view').hide();

        $('#completed_issue_list').css('border', '3px solid #00BBD1');
        $('#reschedule_issue_list').css('border', '1px solid #FF6F4C');
        $('#pending_issue_list').css('border', '1px solid #08ad0f');

        $('#completed_activity_filter').show();
        $('#reschedule_activity_filter').hide();
        $('#all_activity_filter').hide();

        animateCSS('#complete_issue_table', 'zoomIn');
    }
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
        $('#reschedule_issue_list').DataTable({
            responsive: true,
            "bProcessing": true,
            "serverSide": true,
            "displayLength": 10,

            "language": {
                "search": "Filter records:",
                "searchPlaceholder": "Search by Name"
            },
            "ajax": {
                url: "<?php echo base_url('admin/Customer/RescheduleIssueAjaxData'); ?>",
                type: "post",
                error: function() {
                    $("#reschedule_issue_list").css("display", "none");
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#complete_issue_list').DataTable({
            responsive: true,
            "bProcessing": true,
            "serverSide": true,
            "displayLength": 10,
            "language": {
                "search": "Filter records:",
                "searchPlaceholder": "Search by Name"
            },


            columnDefs: [{
                width: 500,
                targets: 4
            }],
            // fixedColumns: true

            "ajax": {
                url: "<?php echo base_url('admin/Customer/CompleteIssueAjaxData'); ?>",
                type: "post",
                error: function() {
                    $("#reschedule_issue_list").css("display", "none");
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $('#schedule_date').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_date');
    });

    $('#schedule_start_time').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_start_time');
    });

    $('#schedule_end_time').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_end_time');
    });
</script>


<script language="javascript">
    $(document).ready(function() {


        $('#schedule_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            maxDate: 'now',
            useCurrent: true,
            widgetPositioning: {
                // vertical: 'top',
                horizontal: 'left'
            }
        });


        $("#schedule_date_edit").datepicker({
            dateFormat: "d MM yy",
            minDate: 0
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

<script type="text/javascript">
    function mainInfo1() {
        var start_date = $('#schedule_date').val();
        var startTime = document.getElementById("schedule_start_time").value;
        var endTime = document.getElementById("schedule_end_time").value;
        var newdate = new Date();
        newdate.setDate(newdate.getDate());
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var dd = newdate.getDate();
        var mm = newdate.getMonth();
        var y = newdate.getFullYear();
        const d = mm;
        var full_month = monthNames[d];
        var someFormattedDate = dd + ' ' + full_month + ' ' + y;
        if ((Date.parse(start_date) == Date.parse(someFormattedDate))) {
            var now = new Date();
            var curr_time = now.getHours() + ':' + now.getMinutes();
            if (startTime >= curr_time) {
                if (startTime >= endTime) {
                    $('#desktopbutton').prop('disabled', true);
                    new PNotify({
                        title: 'Schedule',
                        text: 'End time should be greater than Start time',
                        type: 'warning'
                    });

                } else {
                    $('#desktopbutton').prop('disabled', false);
                }
            } 
            // else {
            //     $('#desktopbutton').prop('disabled', true);
            //     new PNotify({
            //         title: 'Schedule',
            //         text: 'Selected timing is less then current time',
            //         type: 'warning'
            //     });
            // }
        } else {
            var now = new Date();
            var curr_time = now.getHours() + ':' + now.getMinutes();
            if (startTime >= endTime) {
                $('#desktopbutton').prop('disabled', true);
                new PNotify({
                    title: 'Schedule',
                    text: 'End time should be greater than Start time',
                    type: 'warning'
                });

            } else {
                $('#desktopbutton').prop('disabled', false);
            }
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#schedule_form').bootstrapValidator({
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
                            message: 'Please select Employee'
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
</script>


<script type="text/javascript">
    $(document).ready(function(e) {

        $("#schedule_form").on('submit', (function(e) {
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
                        if (data == 1) {
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
    function chenge_status_model(id) {
        $('#modal_status').modal('show');
        $('#status_model_data').html();
        // document.getElementById("qry_id").value=id;
        $("#qry_id").val(id);
    }
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
    function del_interest(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this product?</p>',
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
                url: "<?php echo base_url('admin/Product/delete'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Product',
                            text: 'Deleted successfully',
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#StatusForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Full Name'
                        }
                    }
                },
                status_update: {
                    validators: {
                        notEmpty: {
                            message: 'Please select status'
                        }
                    }
                },

                description: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Description'
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
                $("#loader_gif").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                );
                $("#loader_gif").show();

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_data'); ?>",
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


<script type="text/javascript">
    $(document).ready(function(e) {
        $("#reschedule_data_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $('#reschedule_issue_table').dataTable().fnClearTable();
                $('#reschedule_issue_table').dataTable().fnDestroy();
                $("#reschedule_issue_table").hide();

                $("#loader_gif2").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                );
                $("#loader_gif2").show();

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_reschedule_data'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#loader_gif2").hide();
                        $("#reschedule_issue_table").hide();

                        $("#reschedule_filter_table").show();
                        $("#reschedule_filter_table").html(data);

                        $('#ajax_table_reschedule').DataTable();
                        animateCSS('#reschedule_filter_table', 'zoomIn');
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
    $(document).ready(function(e) {
        $("#complete_data_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $('#complete_issue_table').dataTable().fnClearTable();
                $('#complete_issue_table').dataTable().fnDestroy();

                $("#complete_issue_table").hide();
                $("#loader_gif3").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                );
                $("#loader_gif3").show();

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_completed_data'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#loader_gif3").hide();
                        $("#complete_issue_table").hide();
                        $("#complete_filter_table").show();
                        $("#complete_filter_table").html(data);
                        $('#ajax_table_completed').DataTable();
                        animateCSS('#complete_filter_table', 'zoomIn');
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
    $(document).ready(function(e) {
        $("#StatusForm2").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/change_status'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Change Status',
                                text: 'Status change  Successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
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
    function assign_to1(id) {
        var datastring = 'query_id=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/assign_task1'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#modal_default12').modal('show');
                $('#user_model_data12').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>

<script>
    function Viewdetails(id) {
        var datastring = 'query_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/issue_detail'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#modal_default1').modal('show');
                $('#user_model_data1').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>

<script>
    function remark_list(id) {
        var datastring = 'ticket_no=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/remark_list'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                PNotify.removeAll();
                $('#bind_issue_data').html(data);
                $('#issue_details').modal('show');
            },
            error: function() {
                alert('Error while request..');
            }
        });

    }

    function remark_list_pending(id) {
        var datastring = 'ticket_no=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/remark_list_pending'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                PNotify.removeAll();
                $('#bind_issue_data').html(data);
                $('#issue_details').modal('show');
            },
            error: function() {
                alert('Error while request..');
            }
        });

    }

    
    function delete_activity(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Activity?</p>',
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
                url: "<?php echo base_url('admin/ScheduleManagement/delete_activity'); ?>",
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
                    setTimeout(function()
                {
                    window.location="";
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

<script>
    function bill_list(id) {
        var datastring = 'ticket_no=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/bill_list'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $('#modal_billing').modal('show');
                $('#billing_model_data').html(data);
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
    function getassignedissue() {
        schedule_date = $('#schedule_date').val();
        employee_id = $('#employee_id').val();
        if (employee_id != '') {
            var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + employee_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#issuelistdetails').show();
                    $('#issue_schedule_list').html(data);
                },
                error: function() {
                    alert('Error while request..');
                }
            });
            return false;
        }
    }

    function getassignedissueResch() {
        schedule_date = $('#schedule_date_edit').val();
        emp_id = $('#assign_to_edit').val();
        if (emp_id != '') {
            var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + emp_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#issuelistdetails_edit').show();
                    $('#issue_schedule_list_edit').html(data);
                },
                error: function() {
                    alert('Error while request..');
                }
            });
            return false;
        }
    }


    $('#schedule_date').on('dp.change', function(e) {
        var schedule_date = $('#schedule_date').val();
        employee_id = $('#employee_id').val();
        if (employee_id != '') {
            var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + employee_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#issuelistdetails').show();
                    $('#issue_schedule_list').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
            return false;
        }

    });
</script>

<script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });
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
                // setTimeout(function()
                // {
                //     window.location="";
                // }, 1000);
********************************************************************************************************************************************************************************************
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
                // setTimeout(function()
                // {
                //     window.location="";
                // }, 1000);              
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
                // setTimeout(function()
                // {
                //     window.location="";
                // }, 1000);                
            },
            error: function() {
                // alert('Error while request..');
                $('#alertModal').modal('show');

            }
        });
        return false;
    }

    function update_status(id, type) {
        //  alert(type+'=='+id); return false;
        var datastring = 'query_id=' + id + '&status_type=' + type;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/update_status_schedule'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $(function() {
                    new PNotify({
                        title: 'Activity Status',
                        text: 'Status Change Successfully',
                        type: 'success'
                    });
                });
                setTimeout(function()
                {
                    window.location="";
                }, 1000);                 
            },
            error: function() {
                alert('Error while request..');
            }
        });
        return false;
    }

    function Reshedule(id) {
        var datastring = 'query_id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivityData'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                rsp = JSON.parse(data);
                tn = rsp.ticket_no;
                $('#reschedule_activity').modal('show');
                $("#edit_id").val(id);
                $("#ticket_no_edit").val(tn);
                $("#assign_to_edit").val(rsp.assign_to);
                $("#customer_id_data").val(rsp.customer_id);
                $("#product_id_data").val(rsp.product_id);
                $('#schedule_type_id_edit').val(rsp.schedule_type_id);
                $("#customer_id_edit").val(rsp.customer_id).change();
                $("#product_id_edit").val(rsp.product_id).change();
                $("#employee_id_edit").val(rsp.assign_to).change();
                $("#schedule_type_edit").val(rsp.schedule_type_id).change();
            },
            error: function() {
                alert('Error while request..');
            }
        });
        return false;
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#reschedule_form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
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

            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(e) {

        $("#reschedule_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivitySubmit'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        $("#preview").hide();
                        if (data == 1) {
                            $(function() {
                                new PNotify({
                                    title: 'Re-Schedule',
                                    text: 'Re-Schedule Submited Successfully',
                                    type: 'success'
                                });
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            }, 1000);
                        } else if (data == 2) {
                            $(function() {
                                new PNotify({
                                    title: 'Re-Schedule',
                                    text: 'overlapping',
                                    type: 'error'
                                });
                            });
                        } else if (data == 0) {
                            $(function() {
                                new PNotify({
                                    title: 'Re-Schedule',
                                    text: 'Failed to submit',
                                    type: 'error'
                                });
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
    var param1var = getQueryVariable("param1");

    function getQueryVariable(variable) {
        var key = window.location.search.substring(1);
        if (key == 'addschedule') {
            $("#schedule_model").modal({
                backdrop: "static"
            });
        }
    }
</script>


<script>
    function update_price(value) {
        // alert(value);
        PNotify.removeAll();
        var lastid = value.split("_").pop();
        var adm_approved_price = $('#admapprovedprice_' + lastid).val();
        var targettype_id = $('#targettypeid_' + lastid).val();
        var emp_set_price = $('#empsetprice_' + lastid).val();

        var id = $('#achieveid_' + lastid).val();


        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Update the value ' + adm_approved_price + '</p>',
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
            // var adm_approved_price = $('#adm_approved_price').val();
            var datastring = 'achieve_id=' + id + '&adm_approved_price=' + adm_approved_price + '&targettype_id=' +
                targettype_id;
            alert(datastring);

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/update_price'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    PNotify.removeAll();
                    // if (data==0)
                    // {
                    new PNotify({
                        title: 'Price Update',
                        text: 'Price updated successfully',
                        type: 'success'
                    });

                    // $('#bill_value').val(data);
                    // }
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

    function activate_price(value) {
        var lastid = value.split("_").pop();

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate for update value </p>',
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
            document.getElementById("admapprovedprice_" + lastid).readOnly = false;
            $(".activateupdate_" + lastid).hide();
            $(".afteractivateupdate_" + lastid).show();
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });
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


<div class="modal fade" id="PrioritysucessModal" tabindex="-1" aria-labelledby="PrioritysucessModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="PrioritysucessModal" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Priority Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>           
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>
