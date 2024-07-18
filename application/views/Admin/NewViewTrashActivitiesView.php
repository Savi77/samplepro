<?php $this->load->view('Admin/includes/n-header'); ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<style>
    .list>li:first-child {
        color: #000 !important;
    }
/* 
    .dt-button {
        display: none;
    } */
    table td{
        color: #000 !important;
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
    #default_issue_table_wrapper {
        margin-top: 0 !important;
    }
    #default_issue_table th{
        text-wrap: nowrap !important;
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
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">View Trash Task</span>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter Task" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
                
            </div>
            <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;">
                <div class="col-lg-12 dflex mb-0" style="padding-inline: 30px;">
                    <label class="col-form-label">From </label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d F, Y'); ?>">
                        </div>
                    </div>
                    <label class="col-form-label">To </label>
                    <div class="col-md-3">

                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d F, Y'); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select class="form-control select-search" id="status" name="status" data-placeholder="Select Status">
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="in_progress">In-progress</option>
                        </select>
                    </div>
                    <div class="col-md-3 update-details">
                        <button class="blue-btn left-margin" type="submit" style="padding: 7px 14px !important;"> <span class="
                        text-white">Submit <i class="icon-arrow-right14 position-right" style="color:#"></i> </span></button>
                    </div>

                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Complete</option>
                                <option value="in_progress">In Progress</option>
                            </select>
                        </div>
                    </div> -->
                </div>
                <br>
                
            </form>
        </div>
<script type="text/javascript">
    $('#status').select2({
        placeholder: 'Select Status'
    });

</script>
        <?php $pending_cnt = count($issue_list_array);
        ?>
        <div class="card">
                <table class="table table-striped" id="default_issue_table">
                    <thead>
                        <th>Task ID</th>  
                        <th>Resource</th>  
                        <th>Company Name</th>  
                        <th>Product</th>  
                        <th>Comment</th>  
                        <th>Planned Date Time</th>  
                        <!-- <th>Sheduled Time</th>   -->
                        <th>Priorty</th>
                        <th>Status</th>  
                        <th>Action</th>  
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $pending_cnt; $i++) {
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
                            if ($issue_list_array[$i]['value_priority'] == '') {
                                $value_priority = 'No Priority';
                            } else {
                                $value_priority = $issue_list_array[$i]['value_priority'];
                            }
                            $value_status = $issue_list_array[$i]['value_status'];
                            ?>
                                <tr>
                                    <td>
                                        <div style="width:150px;">
                                            <?= $ticket_no_1 ?>
                                        </div>
                                    </td>  
                                    <td>
                                        <div style="display:flex;">
                                            <?= $check_1; ?>
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="text-wrap-col" style="width:200px;">
                                            <?= $company_name_1; ?>
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="text-wrap-col" style="width:200px;">
                                            <?= $product_name_1 ?>
                                        </div>
                                    </td> 
                                    <td>
                                        <div style="width:150px;">
                                            <?= $issue_1; ?>
                                        </div>
                                    </td>  
                                    <td>
                                        <div style="width:150px;">
                                            <?= $created_date_1; ?><br><small><?= $issue_list_array[$i]['scheduledatetime']; ?></small>
                                        </div>
                                    </td>  
                                    <!-- <td>
                                    <div style="width:150px;">
                                        <?= $issue_list_array[$i]['scheduledatetime']; ?>
                                    </div>
                                </td>   -->
                                    <td>
                                        <div style="width:150px;">
                                            <?= $value_priority; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= $value_status ?>
                                        </div>
                                    </td>  
                                    <!-- <td style="">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                                        <li><a id="<?= $query_1 ?>" data-toggle="modal" title="Restore Activity" rel="tooltip" onclick="restore_activity(this)" data-id="<?= $query_1 ?>"><i class="icon-store2"></i></a></li>
                                        <li <?= $DeleteClass; ?> class="ml-1"><a id="<?= $query_1 ?>" data-toggle="modal" title="Delete Activity" rel="tooltip" onclick="delete_activity(this)" data-id="<?= $query_1 ?>"><i class="icon-trash activity-trash"></i></a></li>
                                    </ul>
                                </td> -->

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
                                                                    <a id="<?= $query_1 ?>" data-toggle="modal" onclick="restore_activity(this)" data-id="<?= $query_1 ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-green"></span> Restore Task  
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a id="<?= $query_1 ?>" data-toggle="modal" onclick="delete_activity(this)" data-id="<?= $query_1 ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-red"></span> Delete Task  
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

                                    $product_name_2 = $issue_list_array[$record_cnt]['product_name'];
                                    $action_btn_2 = $issue_list_array[$record_cnt]['action_btn'];
                                    if ($issue_list_array[$record_cnt]['value_priority'] == '') {
                                        $value_priority_2 = 'No Priority';
                                    } else {
                                        $value_priority_2 = $issue_list_array[$record_cnt]['value_priority'];
                                    }
                                    $value_status_2 = $issue_list_array[$record_cnt]['value_status'];


                                    ?> 
                                    <tr>
                                        <td>
                                            <div style="width:150px;">
                                                <?= $ticket_no_2 ?>
                                            </div>
                                        </td>  
                                        <td>
                                            <div style="display:flex;"> 
                                                <?= $check_2; ?>
                                            </div>
                                        </td>  
                                        <td>
                                            <div class="text-wrap-col" style="width:200px;">
                                                <?= $company_name_2; ?>
                                            </div>
                                        </td>  
                                        <td>
                                            <div class="text-wrap-col" style="width:200px;">
                                                <?= $product_name_2 ?>
                                            </div>
                                        </td>  
                                        <td>
                                            <div style="width:150px;">
                                                <?= $issue_2; ?>
                                            </div>
                                        </td>  
                                        <td>
                                            <div style="width:150px;">
                                                <?= $created_date_2; ?><br><small><?= $issue_list_array[$record_cnt]['scheduledatetime']; ?></small>
                                            </div>
                                        </td>  
                                        <!-- <td>
                                    <div style="width:150px;">
                                        <?= $issue_list_array[$record_cnt]['scheduledatetime']; ?>
                                    </div>
                                </td>   -->
                                        <td>
                                            <div style="width:150px;">
                                                <?= $value_priority_2; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                                <?= $value_status_2 ?>
                                            </div>
                                        </td>  
                                        <!-- <td>
                                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                                        <li><a id="<?= $query_2 ?>" data-toggle="modal" title="Restore Activity" rel="tooltip" onclick="restore_activity(this)" data-id="<?= $query_2 ?>"><i class="icon-store2"></i></a></li>
                                        <li <?= $DeleteClass; ?> class="ml-1"><a id="<?= $query_2 ?>" data-toggle="modal" title="Delete Activity" rel="tooltip" onclick="delete_activity(this)" data-id="<?= $query_2 ?>"><i class="icon-trash activity-trash"></i></a></li>
                                    </ul>
                                </td>  -->

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
                                                                        <a id="<?= $query_2 ?>" data-toggle="modal" onclick="restore_activity(this)" data-id="<?= $query_2 ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-green"></span> Restore Task  
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a id="<?= $query_2 ?>" data-toggle="modal" onclick="delete_activity(this)" data-id="<?= $query_2 ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Task  
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
                                    <?php
                                }
                                ?>
                            <?php
                            $i = $record_cnt;
                        }
                        ?>
                    </tbody>
                </table>
            <div id="all_activity_filter_table"></div>
        </div>

    </div>
</div>

<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
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
// $('#myTableDelete').dataTable( {
//         "order": [0,'desc']
//     } );

// $(document).ready(function(){
//     var rescheduleTable = $('#default_issue_table').DataTable( {       
//         scrollX:        true,
//         scrollCollapse: true,
//         autoWidth:         true,  
//         paging:         true, 
//         order: [[0, 'desc']]
//     } );
    
//     // $('#myTable').dataTable();
// });
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
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="product_id" id="product_id">
                                                <option value="">Select Product</option>
                                                <?php
                                                foreach ($product_list as $value1) { ?>
                                                        <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php } ?>
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
                                                <?php } ?>
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
                                                        <?php foreach ($getUserSysyemList as $value1) { ?>
                                                                <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                        <?php } ?>
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
                                                        <?php } ?>
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
                                                        <?php } ?>
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
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="product_id" id="product_id_edit" disabled>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    foreach ($product_list as $value1) { ?>
                                                            <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                    <?php } ?>
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
                                                <select class="form-control" name="schedule_type_id" id="schedule_type_edit" disabled>
                                                    <option value="">Select Schedule Type</option>
                                                    <?php
                                                    foreach ($schedule_visit_list as $st_value) { ?>
                                                            <option value="<?= $st_value->id ?>" <?= $st = ($ResheduleActivityData->schedule_type_id == $st_value->id) ? 'selected' : ''; ?>>
                                                                <?= $st_value->type_name ?></option>
                                                    <?php } ?>
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
    $(document).ready(function(){
        var rescheduleTable =  $("#default_issue_table").DataTable({
            "language": {
                "emptyTable": "No data available in table"
            },
            "order": [0,'desc'],
            "columnDefs": [ {
                "targets": 5,
                "orderable": true
            } ],
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
                        // $('#ajax_table').DataTable();

                        var rescheduleTable = $('#ajax_table').DataTable( {       
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


<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Task?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form method="POST" id="delete_get_datarange">
                        <input type="hidden" id="queryId" name="query_id" value="" >
                        <input type="hidden" id="start_date_get_delete" name="start_date" value="">
                        <input type="hidden" id="end_date_get_delete" name="end_date" value="">
                        <input type="hidden" id="status_get_delete" name="status" value="">
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_activity_button_close()" id="delete_activity_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationRestoreModal" tabindex="-1" aria-labelledby="confirmationRestoreModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationRestoreModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with restoring this Task?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form method="POST" id="restore_get_datarange">
                        <input type="hidden" id="queryIdrestore" name="query_id" value="" >
                        <input type="hidden" id="start_date_get_restore" name="start_date" value="">
                        <input type="hidden" id="end_date_get_restore" name="end_date" value="">
                        <input type="hidden" id="status_get_restore" name="status" value="">
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_restore_activity_button_close()" id="restore_activity_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Restored Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form method="POST" id="restore_get_datarange_success"> 
                    <input type="hidden" id="start_date_get_restore_success" name="start_date" value="">
                    <input type="hidden" id="end_date_get_restore_success" name="end_date" value="">
                    <input type="hidden" id="status_get_restore_success" name="status" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </form>
                <!-- <a href="<?php echo base_url('admin/ScheduleManagement/view_trash_activities'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a> -->
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="successModalrestoreActivity" tabindex="-1" aria-labelledby="successModalrestoreActivityLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalrestoreActivityLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Activity Restored Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/view_trash_activities'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/view_trash_activities'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    function delete_activity (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#queryId').val(element.getAttribute("data-id"));
        $('#start_date_get_delete').val($('#start_date').val());
        $("#end_date_get_delete").val($('#end_date').val()); 
        $("#status_get_delete").val($('#status').val()); 
        $('#confirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_activity_button_close()
    {
        $(".popover-body").css('display','block');
        $('#delete_activity_button_close').attr('data-dismiss', 'modal');
    }
    function restore_activity (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#queryIdrestore').val(element.getAttribute("data-id"));
        $('#start_date_get_restore').val($('#start_date').val());
        $("#end_date_get_restore").val($('#end_date').val()); 
        $("#status_get_restore").val($('#status').val()); 
        $('#confirmationRestoreModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_restore_activity_button_close()
    {
        $(".popover-body").css('display','block');
        $('#restore_activity_button_close').attr('data-dismiss', 'modal');
    }
</script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $("#delete_get_datarange").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } 
            else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/permanent_delete_activity'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) 
                    {
                        $('#confirmationModal').modal('hide');
                        $("#loader_gif").hide();
                        $("#default_issue_table").hide();
                        $("#default_issue_table_wrapper").css('display','none');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        
                        var rescheduleTable = $('#ajax_table').DataTable( {       
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



                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $("#restore_get_datarange").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } 
            else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/restore_activity'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) 
                    {
                        $('#confirmationRestoreModal').modal('hide');
                        $('#successModal').modal('show');
                        $('#start_date_get_restore_success').val($('#start_date').val());
                        $("#end_date_get_restore_success").val($('#end_date').val()); 
                        $("#status_get_restore_success").val($('#status').val()); 
                        // $("#loader_gif").hide();
                        // $("#default_issue_table").hide();
                        // $("#default_issue_table_wrapper").css('display','none');
                        // $("#all_activity_filter_table").show();
                        // $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $("#restore_get_datarange_success").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } 
            else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_delete_data'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#successModal").modal('hide');
                        $("#loader_gif").hide();
                        $("#default_issue_table").hide();
                        $("#default_issue_table_wrapper").css('display','none');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        var rescheduleTable = $('#ajax_table').DataTable( {       
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
                        animateCSS('#all_activity_filter_table', 'zoomIn');
                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
            }
            return false;

        }));
    });
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

        $(document).ready(function () {
       
        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $(document).click(function (e) {
            if ($(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>
