<?php $this->load->view('Admin/includes/n-header'); ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<!-- <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/assets/css/table.css"> -->
<style>
    .list>li:first-child {
        color: #000 !important;
    }

    /* .dt-button {
        display: none;
    } */

    tr.odd {
        background: #fff;
        color: #000;
    }
    /* #myTable1 tbody tr .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, 35px, 0px) !important;
    }
    #myTable1 tbody tr:last-child .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, -100px, 0px) !important;
    }
    #myTable1 tbody tr:first-child .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, 35px, 0px) !important;
    }
    #myTable1 tbody tr .list-unstyled{
        position: relative !important;
    } */

    table tbody tr .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, 26px, 0px) !important;
    }
    /* #myTable tbody tr:last-child .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, -100px, 0px) !important;
    }
    #myTable tbody tr:first-child .list-unstyled .dropdown-menu{
        transform: translate3d(-124px, 35px, 0px) !important;
    } */
    /* #myTable tbody tr .list-unstyled{
        position: relative !important;
    } */

    span.select2.select2-container.select2-container--default .select2-selection__rendered .select2-search .select2-search__field {
        width: 100% !important;
    }
   
    .sorting_1 a{
        cursor: auto !important;
    }
    /* #myTable1 tbody tr .list-unstyled .dropdown-menu{
    transform: translate3d(-124px, 25px, 0px) !important;
    }
    #myTable1 tbody tr .list-unstyled{
        position: relative !important;
    } */
    
    /* table#myTable{
        border-top: 1px solid #dddddd !important;
        border-bottom: 1px solid #dddddd !important;
    }
    .datatable-header {
        border-bottom: none !important;
    }  
    .datatable-footer {
        border-top: none !important;
    } */
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
    /* #myTable.dataTable td:nth-child(2),#myTable.dataTable td:nth-child(3)  {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    #myTable.dataTable td:nth-child(2),#myTable.dataTable td:nth-child(3){
        max-width: 100px;
    } */
    /* #myTable .datatable-scroll-wrap {
        overflow-x: unset !important;
    }
    #myTable_wrapper{
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
            right:  -2% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -8.7%;
        }
        
    }
    @media only screen and (max-width: 1600px){
        .dataTables_length{
            position: absolute !important;
            right:  -8% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -15.5%;
        }
        
    }
    @media only screen and (max-width: 1536px){
        .dataTables_length{
            position: absolute !important;
            right:  -14% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -21%;
        }
        
    }
    @media only screen and (max-width: 1440px){
        .dataTables_length{
            position: absolute !important;
            right:  -24% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -31.5%;
        }
    }
    @media only screen and (max-width: 1400px){
        .dataTables_length{
            position: absolute !important;
            right:  -28% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -36.5%;
        }
    }
    @media only screen and (max-width: 1366px){
        .dataTables_length{
            position: absolute !important;
            right:  -43% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -53%;
        }
    }
    @media only screen and (max-width: 1280px){
        .dataTables_length{
            position: absolute !important;
            right:  -44% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -52.5%;
        }
        
    } */
    /* @media only screen and (max-width: 1200px){
        .dataTables_length{
            position: absolute !important;
            right:  -58% !important;
        }
        .dt-buttons,#myTable_paginate{
            position: absolute;
            right: -67.5%;
        }
        
    } */
    /* .dt-button{
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
    } */

    
   table td{
    color: #000 !important;
   }
   table td:nth-child(1) a div:hover{
    color: #605959 !important;
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
        width: 150px !important;
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
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    
</style>
<?php
    $reschedule_count = count($incomplete_issue_list);
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
<?php
    $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
?>
 <?php 
 $current_date = date('Y-m-d');
 ?>
<div class="content-wrapper">
    <div class="content">
        <div class="col-lg-12 activitylist-top-btn d-none">
            <div class="col-lg-3 col-md-4">
                <a href="<?= base_url() ?>admin/ScheduleManagement/TrasnsferList">
                <button type="button" class="btn btn-secondary btn-labeled btn-labeled-left red-border"><b><?= $reschedule_count; ?></b>Transferred Activity</button></a>
            </div>

            <div class="col-lg-3 col-md-4" <?= $AddClass; ?>>
                <button type="button" data-toggle="modal" data-target="#schedule_model" class="btn btn-secondary btn-labeled btn-labeled-left blue-border"><b><img class="small-add-icon" src="<?= base_url() ?>new-assets/assets/Images/add.png"></b> Add Activity</button>
            </div>
        </div>
        <!-- <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <span class="span-py-10 white-text">Task</span></i>
    
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter Task" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
                </div>

            </div>
            
            <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;">
                <div class="col-lg-12 dflex mb-0" style="padding-inline:30px">
                    <label class="col-form-label">From </label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d F Y'); ?>">
                        </div>
                    </div>
                    <label class="col-form-label">To </label>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d F Y'); ?>">
                        </div>
                    </div>

                    <div class="col-lg-3 row mt-0">
                        <div class="col-lg-12">
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="in_progress">In-progress</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 row mt-0" <?= $ViewAllDataClass; ?>>
                        <div class="col-lg-12">
                            <select class="form-control" id="employee_list" name="employee_list">
                                <option value="">Select Employee List</option>
                                <?php
                                foreach ($employee_list as  $row) {
                                ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 update-details" style="padding-top: 12px;margin-left: 8px;">
                    <button class="blue-btn left-margin" type="submit" style="padding: 7px 14px !important;"> <span class="text-white">Submit <i class="icon-arrow-right14 position-right"></i></span> </button>
                    <span id="loader_gif"></span>
                </div>
            </form>
        </div> -->

        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <span class="span-py-10 white-text">Task</span></i>
                <!-- <a style="display:block" ;="" data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">ADD</span></i></a> -->
                <!-- <a style="display:block" ;="" data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">ADD</span></i></a> -->
                <!-- <div class="col-sm-6 d-flex p-0">
                    <div class="col-lg-6 col-md-4">
                        <a href="<?= base_url() ?>admin/ScheduleManagement/TrasnsferList">
                        <button type="button" class="btn btn-secondary btn-labeled btn-labeled-left red-border"><b><span class="blinknumber"><?= $reschedule_count; ?></span></b>Transferred Activity</button></a>
                    </div>

                    <div class="col-lg-6 col-md-4" <?= $AddClass; ?>>
                        <button type="button" data-toggle="modal" data-target="#schedule_model" class="btn btn-secondary btn-labeled btn-labeled-left green-border"><b><img class="small-add-icon" src="<?= base_url() ?>new-assets/assets/Images/add.png"></b> Add Activity</button>
                    </div>
                </div> -->

                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter Task" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
                </div>

            </div>
            
            <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;">
                <div class="col-lg-12 dflex mb-0" style="padding-inline:30px">
                    <label class="col-form-label">From </label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                           
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d F, Y'); ?>">
                        </div>
                    </div>
                    <label class="col-form-label">To </label>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d F, Y'); ?>" onchange="checkvalidationdate()">
                            <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                        </div>
                    </div>

                    <div class="col-lg-3 row mt-0">
                        <div class="col-lg-12">
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="in_progress">In-progress</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 row mt-0" <?= $ViewAllDataClass; ?>>
                        <div class="col-lg-12">
                            <select class="form-control" id="employee_list" name="employee_list">
                                <option value="">Select Resource List</option>
                                <?php
                                foreach ($employee_list as  $row) {
                                ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 update-details" style="padding-top: 12px;margin-left: 8px;">
                    <button class="blue-btn left-margin" type="submit" style="padding: 7px 14px !important;" id= "act_sub_btn123"> <span class="text-white">Submit <i class="icon-arrow-right14 position-right"></i></span> </button>
                    <span id="loader_gif"></span>
                </div>
            </form>
        </div>

        <?php $pending_cnt = count($issue_list_array); 
        ?>

        <div class="card">
            <div id='set'>
            <!-- id="myTable" -->
                <!-- <table class="table table-striped datatable-colvis-state">   -->
                <table class="table table-striped" id="myTable">  
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
                        <?php
                        for ($i = 0; $i < $pending_cnt; $i++) 
                        {
                            // echo "<pre>";
                            // print_r($issue_list_array[$i]);
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
                            if($issue_list_array[$i]['value_priority'] == '')
                            {
                                $value_priority = 'No Priority';
                            }
                            else
                            {
                                $value_priority = $issue_list_array[$i]['value_priority'];
                            }

                            
                            
                            if($issue_list_array[$i]['value_status'] == 'Inprogress')
                            {
                                $value_status = 'In-progress';
                            }
                            else if($issue_list_array[$i]['value_status'] == 'in_progress')
                            {
                                $value_status = 'In-progress';
                            }
                            else if ($issue_list_array[$i]['value_status'] == 'pending')
                            {
                                $value_status = 'Pending';
                            }
                            else if ($issue_list_array[$i]['value_status'] == 'completed')
                            {
                                $value_status = 'Completed';
                            }
                            else
                            {
                                $value_status = $issue_list_array[$i]['value_status'];
                            }


                        ?> 


                            <tr style="position:relative;">  
                                <td>
                                <a href="<?= base_url('admin/ScheduleManagement/Task_view_page') ?>?task_id=<?= $query_1 ?>">
                                    <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $ticket_no_1 ?></div>
                                </a>
                                    <!-- <div style="width: 100px;"><a onclick='view_task_details(this)' id="<?= $query_1 ?>" data-id="<?= $query_1 ?>" style="font-weight: 600;color: #000;">#<?= $ticket_no_1 ?></a></div> -->
                                </td>  
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $product_name_1; ?></div>
                                </td>  
                                <td>
                                    <div class="text-wrap-col" style="width:200px;"><?= $company_name_1; ?></div>
                                </td>  
                                <td>
                                    <div style="width:200px;display:flex;"><?= $check_1 ?></div>
                                </td>
                                <!-- <td><?= $issue_1; ?></td>   -->
                                <td>
                                    <div style="width: 150px;"><?= $created_date_1; ?><br><small><?= $issue_list_array[$i]['scheduledatetime']; ?></small></div>
                                </td>  
                                <!-- <td><?= $issue_list_array[$i]['scheduledatetime']; ?></td>   -->


                                <td style="position:relative;">
                                <div style="width:150px">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>   
                                            <ul class="list list-unstyled" style="position:relative;">
                                                <li>
                                                    <div>
                                                        <div class="panel-button" >
                                                            <input type="button" title="Add Priority" rel="tooltip" value="<?= $value_priority; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                            <a title="Add Priority" rel="tooltip">
                                                                <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                            </a>
                                                        </div>
                                                        <div  class="my-popover-content" style="display:none;">
                                                            <ul>
                                                                <li>
                                                                    <a onclick="priority_normal(this.id)" id="<?= $query_1 ?>">
                                                                        <span class="status-mark position-left dot dot-red"></span> Normal
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="priority_low(this.id)" id="<?= $query_1 ?>">
                                                                        <span class="status-mark position-left dot dot-yellow"></span> Low
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="priority_high(this.id)" id="<?= $query_1 ?>">
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
                                <!-- <input type="text" name="prior" value="<?=$priority;?>"> -->
                                   
                                </td>

                                <td style= "position: relative;">
                                <div style="width:150px">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>
                                            <ul class="list list-unstyled" style="position:relative;">
                                                <li>
                                                    <div>
                                                        <div class="panel-button">
                                                            <input type="button" title="Status Update" rel="tooltip" value="<?= $value_status; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                            <a title="Status Update" rel="tooltip">
                                                                <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="my-popover-content" style="display:none">
                                                            <ul>
                                                                <li class="active">
                                                                    <a onclick="update_status(this.id,this.type)" type="pending" id="<?= $query_1 ?>">
                                                                        <span class="status-mark position-left dot dot-red"></span> Pending
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="update_status(this.id,this.type)" type="in_progress" id="<?= $query_1 ?>">
                                                                        <span class="status-mark position-left dot dot-yellow"></span> In-progress
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="update_status(this.id,this.type)" type="completed" id="<?= $query_1 ?>">
                                                                        <span class="status-mark position-left dot dot-blue"></span> Completed
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



                                <!-- <td>
                                <div style="width:120px">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>
                                            <ul class="list list-unstyled " style="position:relative;">
                                                <li class="dropdown">
                                                    <input type="button" title="Status Update" rel="tooltip" popovertarget="my-popover" value="<?= $value_status; ?>" readonly style="width: 95px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                    <a style="position: absolute;right: 18px;top: 0px; color: #fff !important;">
                                                    <span class="caret"></span>
                                                    </a>
                                                    <div popover id="my-popover">
                                                        <ul>
                                                            <li class="active">
                                                                <a onclick="update_status(this.id,this.type)" type="pending" id="<?= $query_1 ?>">
                                                                    <span class="status-mark position-left dot dot-red"></span> Pending
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="update_status(this.id,this.type)" type="in_progress" id="<?= $query_1 ?>">
                                                                    <span class="status-mark position-left dot dot-yellow"></span> In-progress
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="update_status(this.id,this.type)" type="completed" id="<?= $query_1 ?>">
                                                                    <span class="status-mark position-left dot dot-blue"></span> Completed
                                                                </a>
                                                            </li>
                                                        </ul> 
                                                    </div>    
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                </td> -->


                                <td>
                                <div style="width:150px;">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                                        <li> 
                                            <div>
                                                <div class="panel-button">
                                                    <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                        <i class="icon-menu9" style="cursor:pointer;"></i>
                                                    </a>
                                                </div>                                  
                                                
                                                <!-- <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                </a> -->
                                                <div class="my-popover-content" style="display:none">
                                                    <ul>
                                                        <li>
                                                            <a onclick="Reshedule(this.id)" id="<?= $query_1 ?>">
                                                                <span class="status-mark position-left dot dot-green"></span> Re-schedule
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="update_status(this.id,this.type)" type="in_complete" id="<?= $query_1 ?>">
                                                                <span class="status-mark position-left dot dot-yellow"></span> Transfer Task
                                                            </a>
                                                        </li>
                                                        
                                                        <!-- <li>
                                                            <a onclick="edit_task(id)" id="<?= $query_1 ?>">
                                                                <span class="status-mark position-left dot dot-yellow"></span> Edit Task
                                                            </a>
                                                        </li> -->

                                                        <li>
                                                            <a href="<?= base_url('admin/ScheduleManagement/Task_view_page') ?>?task_id=<?= $query_1 ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-blue"></span> View Task  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="openAddBookDialog(this)" id="<?= $query_1 ?>" data-id="<?= $query_1 ?>"  data-toggle="modal">
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
                                // echo "<pre>";
                                // print_r($issue_list_array[$record_cnt]);

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

                                if($issue_list_array[$record_cnt]['value_priority'] == '')
                                {
                                    $value_priority_2 = 'No Priority';
                                }
                                else
                                {
                                    $value_priority_2 = $issue_list_array[$record_cnt]['value_priority'];
                                }
                               

                                if($issue_list_array[$record_cnt]['value_status'] == 'Inprogress')
                                {
                                    $value_status_2 = 'In-progress';
                                }
                                else if($issue_list_array[$record_cnt]['value_status'] == 'in_progress')
                                {
                                    $value_status_2 = 'In-progress';
                                }
                                else if ($issue_list_array[$record_cnt]['value_status'] == 'pending')
                                {
                                    $value_status_2 = 'Pending';
                                }
                                else if($issue_list_array[$record_cnt]['value_status'] == 'completed')
                                {
                                    $value_status_2 = 'Completed';
                                }
                                else
                                {
                                    $value_status_2 = $issue_list_array[$record_cnt]['value_status'];
                                }


                            ?> 
                            <tr>  
                                <td>
                                    <a href="<?= base_url('admin/ScheduleManagement/Task_view_page') ?>?task_id=<?= $query_2 ?>">
                                        <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $ticket_no_2 ?></div>
                                    </a>
                                    <!-- <a onclick='view_task_details(this)' id="<?= $query_2 ?>" data-id="<?= $query_2 ?>" style="font-weight: 600;color: #000;">#<?= $ticket_no_2 ?></a> -->
                                </td>  
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $product_name_2 ?></div>
                                </td>  
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $company_name_2; ?></div>
                                </td>  
                                <td>
                                    <div style="width:200px;display:flex;"><?= $check_2; ?></div>
                                </td>
                                <!-- <td><?= $issue_2; ?></td>   -->
                                <td>
                                    <div style="width:150px;"><?= $created_date_2; ?> <br> <small><?= $issue_list_array[$record_cnt]['scheduledatetime'];?></small></div>
                                </td>  
                                <!-- <td><?= $issue_list_array[$record_cnt]['scheduledatetime'];?></td>   -->


                                <td style= "position: relative;">
                                    <div style="width:150px;">
                                        <ul class="pull-right dflex Padding-0 m-auto text-black">
                                            <li>
                                                <ul class="list list-unstyled" style="position:relative;">
                                                    <li>
                                                        <div>
                                                            <div class="panel-button" >
                                                                <input type="button" title="Add Priority" rel="tooltip" value="<?= $value_priority_2; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                                <a title="Add Priority" rel="tooltip">
                                                                    <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                                </a>
                                                            </div>
                                                            
                                                            <div class="my-popover-content" style="display:none;">
                                                                <ul>
                                                                    <li>
                                                                        <a onclick="priority_normal(this.id)" id="<?= $query_2 ?>">
                                                                            <span class="status-mark position-left dot dot-red"></span> Normal
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="priority_low(this.id)" id="<?= $query_2 ?>">
                                                                            <span class="status-mark position-left dot dot-yellow"></span> Low
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="priority_high(this.id)" id="<?= $query_2 ?>">
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

                                <td style= "position: relative;">
                                    <div style="width:150px;">
                                        <ul class="pull-right dflex Padding-0 m-auto text-black">
                                            <li> 
                                                <ul class="list list-unstyled" style="position:relative;">
                                                    <li>
                                                        <div>
                                                            <div class="panel-button">
                                                                <input type="button" title="Status Update" rel="tooltip" value="<?= $value_status_2; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                                <a title="Status Update" rel="tooltip">
                                                                    <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                                </a>
                                                            </div>
                                                            
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li class="active">
                                                                        <a onclick="update_status(this.id,this.type)" type="pending" id="<?= $query_2 ?>">
                                                                            <span class="status-mark position-left dot dot-red"></span> Pending
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="update_status(this.id,this.type)" type="in_progress" id="<?= $query_2 ?>">
                                                                            <span class="status-mark position-left dot dot-yellow"></span> In-progress
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="update_status(this.id,this.type)" type="completed" id="<?= $query_2 ?>">
                                                                            <span class="status-mark position-left dot dot-blue"></span> Completed
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
                                
                                
                                <!-- <td style= "position: relative;">
                                <div style="width:120px">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>
                                            <ul class="list list-unstyled " style="position:relative;">
                                                <li class="dropdown">
                                                    <input type="button" title="Status Update" rel="tooltip" popovertarget="my-popover_1" value="<?= $value_status_2; ?>" readonly style="width: 95px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                    <a style="position: absolute;right: 18px;top: 0px; color: #fff !important;">
                                                    <span class="caret"></span>
                                                    </a>
                                                    <div popover id="my-popover_1">
                                                        <ul>
                                                            <li class="active">
                                                                <a onclick="update_status(this.id,this.type)" type="pending" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-red"></span> Pending
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="update_status(this.id,this.type)" type="in_progress" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-yellow"></span> In-progress
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="update_status(this.id,this.type)" type="completed" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-blue"></span> Completed
                                                                </a>
                                                            </li>
                                                        </ul> 
                                                    </div>    
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                </td> -->


                                <td>
                                    <div style="width:150px;">
                                        <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                                            <li>
                                                <div>
                                                    <div class="panel-button">
                                                        <a class="list-icons-item" rel="tooltip" title="Select Action">
                                                            <i class="icon-menu9" style="cursor:pointer;"></i>
                                                        </a>
                                                    </div>                                
                                                    
                                                    <div class="my-popover-content" style="display:none">
                                                        <ul>
                                                            <li>
                                                                <a onclick="Reshedule(this.id)" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-green"></span> Re-Schedule
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="update_status(this.id,this.type)" type="in_complete" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-yellow"></span> Transfer Task
                                                                </a>
                                                            </li>
                                                            
                                                            <!-- <li>
                                                                <a onclick="edit_task(id)" id="<?= $query_2 ?>">
                                                                    <span class="status-mark position-left dot dot-yellow"></span> Edit Task
                                                                </a>
                                                            </li> -->
                                                            <li>
                                                                <!-- <a id="<?= $ticket_no_2 ?>" onclick="remark_list_pending(this.id)" data-toggle="modal"> -->
                                                                <a href="<?= base_url('admin/ScheduleManagement/Task_view_page') ?>?task_id=<?= $query_2 ?>" style="color:#333333;">
                                                                    <span class="status-mark position-left dot dot-blue"></span> View Task
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="openAddBookDialog(this)" id="<?= $query_2 ?>" data-id="<?= $query_2 ?>"  data-toggle="modal">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Task
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>   
                                            
                                            
                                            </li>
                                            <li>
                                                <!-- onclick="delete_activity(this.id)" -->
                                                <!-- <a id="<?= $ticket_no_2 ?>" onclick="remark_list_pending(this.id)" data-toggle="modal" title="View Activity" rel="tooltip"><i class="icon-eye"></i></a> -->
                                            </li>
                                            <!-- <a data-target="#confirmationModal"  data-toggle="modal" title="Delete Activity" rel="tooltip">Test Modal</a> -->
                                            <!-- <li display:block="" class="ml-1"><a onclick="openAddBookDialog(this)" id="<?= $query_2 ?>" data-id="<?= $query_2 ?>"  data-toggle="modal" title="Delete Activity" rel="tooltip"><i class="icon-trash activity-trash open-AddBookDialog"></i></a></li> -->
                                        </ul>
                                    </div>
                                
                                </td>  

                            
                            </tr>
                        <?php
                            }
                            $i = $record_cnt;
                        ?>
                        <?php
                        }
                        ?>  
                    </tbody>  
                    </table>
            </div>
            <div id="all_activity_filter_table"></div>
        </div>

    </div>
</div>

<script> 
$(document).ready(function(){
    var rescheduleTable = $('#myTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        order: [[0, 'desc']],
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
</script>





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
                                            <select class="form-control" name="customer_id" id="customer_id_type3" data-placeholder="Select Company">
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
                                            <select class="form-control" name="employee_id" id="employee_id_type3" onchange="getassignedissueChange12()" data-placeholder="Select Resource">
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
                                            <select class="form-control" name="product_id" id="product_id_type3" data-placeholder="Select Product">
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
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_id_type3" data-placeholder="Select Schedule Type">
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
                                            <input type="text" class="form-control" id="schedule_end_time_schedule" name="schedule_end_time" placeholder="Select End Time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off" readonly>
                                            <span id="err4" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="priority_id" id="priority_id_fetch" data-placeholder="Select Priority">
                                                <option value="">Select Priority</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Low">Low</option>
                                                <option value="High">High</option>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" id="status_fetch" data-placeholder="Select Status">
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
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="user_id[]" id="user_id_type3" data-placeholder="Select User" multiple >
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
                                                    <select class="form-control" name="reminder_before_time" id="reminder_before_time_type3" data-placeholder="Select Reminder Before Time">
                                                        <option value="">Select Reminder Before Time</option>
                                                        <!-- <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                        <?php  } ?> -->
                                                        <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                                                <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_type3" data-placeholder="Select Notify By">
                                                        <option value="">Select Notify By</option> 
                                                        <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                                        <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                                        <?php } ?>
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
                                                    <select class="form-control" name="recurring_set" id="recurring_set_type3" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                                                <select class="form-control" name="interval_type" id="interval_type3" data-placeholder="Select Recurring Interval">
                                                    <!-- <option value="">Select Recurring Interval</option>
                                                    <option value="day">Day</option>
                                                    <option value="week">Week</option>
                                                    <option value="fortnightly">Fortnightly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="quaterly">Quaterly</option>
                                                    <option value="half-quarterly">Half Quarterly</option>
                                                    <option value="year">Year</option> -->
                                                    <?php
                                                    if(!empty($get_reminder_details->rem_recurring_interval_name))
                                                    {
                                                        if($get_reminder_details->rem_recurring_interval_name == 'day')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day" selected=''>Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'week')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week" selected=''>Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'fortnightly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly" selected=''>Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'monthly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly" selected=''>Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'quaterly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly" selected=''>Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'half-quarterly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly" selected=''>Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'year')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year" selected=''>Year</option>
                                                    <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <option value="">Select Recurring Interval</option>
                                                        <option value="day">Day</option>
                                                        <option value="week">Week</option>
                                                        <option value="fortnightly">Fortnightly</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="quaterly">Quaterly</option>
                                                        <option value="half-quarterly">Half Quarterly</option>
                                                        <option value="year">Year</option>
                                                    <?php
                                                    }
                                                    ?>
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
                                    <div class="col-sm-12" style="text-align:end;">
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




<!-- ===================================================================================== -->
<div id="upload_schedule_documents2" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
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

<div id="modal_default" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-task" style="zoom:1.1; "></i>
                    &nbsp;Assign Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->
            
            <!-- <div class="modal-body"> -->
                <div id="user_model_data">

                </div>
            <!-- </div> -->

        </div>
    </div>
</div>
<!--============================== Re-schedule ===========================================-->
<div id="modal_default12" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
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
<div id="modal_status" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
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
<div id="modal_remark" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
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
<div id="reschedule_activity" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings" id="fetch_title"><i class="icon-drawer3" style="zoom:1.1; "></i>&nbsp;&nbsp;</h6>
                <button type="button" class="close" onclick="updateUI_reschedule_button_close()" id="reschedule_button_close">×</button>
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
                                    <!-- <input type="hidden" name="schedule_type_id" id="schedule_type_id_edit"> -->
                                    <input type="hidden" name="customer_id" id="customer_id_data">
                                    <!-- <input type="hidden" name="customer_id1" id="customer_id_edit"> -->
                                    <input type="hidden" name="product_id" id="product_id_data">
                                    <div class="row">
                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name<span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="customer_id" id="customer_id_edit" disabled>
                                                    <option value="">Select Company</option>
                                                    <?php
                                                    foreach ($customer_list as $value) { ?>
                                                        <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>(<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
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
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Resource Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="select-search" name="employee_id" id="employee_id_edit" onchange="getassignedissueResch()" disabled>
                                                    <option value="">Select Resource</option>
                                                    <?php
                                                    foreach ($employee_list as $value2) {
                                                        
                                                        // $ResheduleActivityData->assign_to = $value2->id;
                                                        if ($ResheduleActivityData->assign_to == $value2->id) {?>
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
                                                    <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date_edit" name="schedule_date" placeholder="Enter Schedule Date" onchange="getassignedissueResch()" value="<?= date('d F, Y'); ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-12" id="issuelistdetails_edit" style="display: none">
                                            <label class="control-label col-sm-12" for="Youtube">Assigned Task List</label>
                                            <div class="col-sm-12" id="issue_schedule_list_edit" style="max-height: 110px; overflow: auto;">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" id="schedule_start_time_reschedule" name="schedule_start_time"  placeholder="Select Start Time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' ">
                                                <span id="err3" style="color:red; font-size: 12px;"></span>
                                            </div>
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" id="schedule_end_time_reschedule" name="schedule_end_time"  placeholder="Select End Time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' ">
                                                <span id="err4" style="color:red; font-size: 12px;"></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="schedule_type_id" id="schedule_type_edit" data-placeholder="Select Schedule Type">
                                                    <option value="">Select Schedule Type</option>
                                                    <?php
                                                    foreach ($schedule_visit_list as $st_value) 
                                                    { 
                                                        if($ResheduleActivityData->schedule_type_id == $st_value->id)
                                                        {
                                                        ?>
                                                        <option value="<?= $st_value->id ?>" selected=""> <?= $st_value->type_name ?></option>
                                                    <?php 
                                                        } 
                                                        else
                                                        {
                                                    ?>
                                                        <option value="<?= $st_value->id ?>"> <?= $st_value->type_name ?></option>
                                                    <?php
                                                        }
                                                    } 
                                                    ?>
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
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="user_id[]" id="user_id_type5" data-placeholder="Select User" multiple >
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
                                                    <select class="form-control" name="reminder_before_time" id="reminder_before_time_type5" data-placeholder="Select Reminder Before Time">
                                                        <option value="">Select Reminder Before Time</option>
                                                        <!-- <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                        <?php  } ?> -->
                                                        <?php foreach ($getTimeSlot as $value) { ?>
                                                            <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                                                <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_type5" data-placeholder="Select Notify By">
                                                        <option value="">Select Notify By</option> 
                                                        <!-- <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                                                        <?php  } ?> -->
                                                        <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                                        <?php foreach ($getNotifyBy as $value) { ?>
                                                            <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                                        <?php } ?>
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
                                                    <select class="form-control" name="recurring_set" id="recurring_set_type5" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                                                <select class="form-control" name="interval_type" id="interval_type5" data-placeholder="Select Recurring Interval">
                                                    <!-- <option value="">Select Recurring Interval</option>
                                                    <option value="day">Day</option>
                                                    <option value="week">Week</option>
                                                    <option value="fortnightly">Fortnightly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="quaterly">Quaterly</option>
                                                    <option value="half-quarterly">Half Quarterly</option>
                                                    <option value="year">Year</option> -->
                                                    <?php
                                                    if(!empty($get_reminder_details->rem_recurring_interval_name))
                                                    {
                                                        if($get_reminder_details->rem_recurring_interval_name == 'day')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day" selected=''>Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'week')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week" selected=''>Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'fortnightly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly" selected=''>Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'monthly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly" selected=''>Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'quaterly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly" selected=''>Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'half-quarterly')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly" selected=''>Half Quarterly</option>
                                                            <option value="year">Year</option>
                                                    <?php
                                                        }
                                                        else if($get_reminder_details->rem_recurring_interval_name == 'year')
                                                        {
                                                    ?>
                                                            <option value="">Select Recurring Interval</option>
                                                            <option value="day">Day</option>
                                                            <option value="week">Week</option>
                                                            <option value="fortnightly">Fortnightly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quaterly">Quaterly</option>
                                                            <option value="half-quarterly">Half Quarterly</option>
                                                            <option value="year" selected=''>Year</option>
                                                    <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <option value="">Select Recurring Interval</option>
                                                        <option value="day">Day</option>
                                                        <option value="week">Week</option>
                                                        <option value="fortnightly">Fortnightly</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="quaterly">Quaterly</option>
                                                        <option value="half-quarterly">Half Quarterly</option>
                                                        <option value="year">Year</option>
                                                    <?php
                                                    }
                                                    ?>
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

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
                                                Add Task <i class="icon-arrow-right14 position-right"></i>
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
<div id="issue_details" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="bind_issue_data">

        </div>
    </div>
</div>
<!--  -->

<div id="modal_billing" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="billing_model_data">

            </div>
        </div>
    </div>
</div>

<div id="modal_reschedule" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="reschedule_model_data">

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>





<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>

<script type="text/javascript">
    $('#employee_id_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#product_id_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#customer_id_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#schedule_type_id_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#user_id_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#reminder_before_time_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#reminder_notify_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#recurring_set_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#interval_type3').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#priority_id_fetch').select2({
        dropdownParent: $('#schedule_model')
    });

    $('#status_fetch').select2({
        dropdownParent: $('#schedule_model')
    });


    

    $('.select2-selection__rendered').hover(function () {
        $(this).removeAttr('title');
    });


    $("ul.select2-selection__rendered").hover(function(){
      $(this).find('li').removeAttr('title');
    });

    
    $(".select2-container--default").tooltip({
        title: function() {
            return $(this).prev().attr("title");
        },
        placement: "auto",
        //container: 'body'
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
            $('#reminder_before_time_type3').val("");
            $('#reminder_note').val('');
        }
    });

    $('#schedule_date').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_date');
    });

    $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

    $('#schedule_start_time_schedule').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
    });

    $('#schedule_end_time_schedule').change(function() {
        $('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
    });

    
</script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#schedule_addForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                customer_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Customer'
                        }
                    }
                },

                product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Product'
                        }
                    }
                },

                employee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Resource'
                        }
                    }
                },

                schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Schedule Date'
                        }
                    }
                },

                // query: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Comment'
                //         }
                //     }
                // },
                priority_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Priority'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Status'
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
                            message: 'Please Select Start Time'
                        }
                    }
                },

                schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Time'
                        }
                    }
                },

                schedule_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Schedule Type'
                        }
                    }
                },

                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Notes'
                        }
                    }
                },

                'user_id[]': {
                    validators: {
                        notEmpty: {
                            message: 'Please Select User'
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
            
            if (e.isDefaultPrevented()) {
               
            } else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
               
                var formresult = new FormData(this);
                object= {}
                formresult.forEach((value, key) => object[key] = value);
                // alert('got here');
                var txt = JSON.stringify(object);
                // alert (json_decode($txt));
                // const arrayAgain = JSON.parse(txt);
                // console.log(arrayAgain);

                $("#preview").hide();
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/add_schedule'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();
                        if (data == 1 || data == 11) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $("#schedule_model").modal('hide');
                                $("#successModal").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            // }, 1000);
                        } 
                        else if (data == 2) {
                            $(function() 
                            {
                                $("#scheduleModal").modal('show');
                                $("input[name=formdata]").val(txt);
                            });
                            
                            // var notice = new PNotify({
                            //     title: 'Confirmation',
                            //     text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
                            //     hide: false,
                            //     type: 'warning',
                            //     confirm: {
                            //         confirm: true,
                            //         buttons: [{
                            //                 text: 'Yes',
                            //                 addClass: 'btn-sm'
                            //             },
                            //             {
                            //                 text: 'No',
                            //                 addClass: 'btn-sm'
                            //             }
                            //         ]
                            //     },
                            //     buttons: {
                            //         closer: false,
                            //         sticker: false
                            //     },
                            //     history: {
                            //         history: false
                            //     }
                            // })

                            // On confirm
                            // notice.get().on('pnotify.confirm', function() {
                                
                                
                            
                            // On cancel
                            // notice.get().on('pnotify.cancel', function() {
                            //     // alert('Oh ok. Chicken, I see.');
                            // });
                        }



                    },
                    error: function() 
                    {
                        $('#alertModal').modal('show');
                        // alert('fail');
                    }
                });
            }
            return false;

        }));
    });
</script>


<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="scheduleModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Task is already assign on this time. Shall we proceed with overlapping this task?</div>
                <div class="modal-footer" style="justify-content: center;">
                <form method="POST" id="schedule_addForm_overwrite">
                    <input type='hidden' id='fetchdata' name="formdata" value=''>
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px; margin-right:10px;">Yes</button>
                </form>
                <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $("#schedule_addForm_overwrite").on('submit', (function(e) {
            e.preventDefault();
            // alert(e.isDefaultPrevented());
            if (e.isDefaultPrevented()) {
                // alert("default preented");
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                // $("#preview").hide();
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();
                        
                        if (data == 1 || data == 11) {
                            $(function() 
                            {
                                // alert("Bratati");
                                // alert(data);
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $("#schedule_model").modal('hide');
                                $("#scheduleModal").modal('hide');
                                $('#successModal').modal("toggle");

                                // $("#successModal").modal('show');
                                
                            });
                            // setTimeout(function() {
                            //     $('#successModal').modal({show:true});
                            // }, 200);
                        }
                        else
                        {
                            $('#alertModal').modal('show');
                        }
                    },
                    error: function() 
                    {
                        $('#alertModal').modal('show');
                    }
                });
            }   
            else 
            {
                // $("#preview").html(
                //     '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                // // $("#preview").hide();
                // $.ajax({
                //     url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                //     type: "POST",
                //     data: new FormData(this),
                //     contentType: false,
                //     cache: false,
                //     processData: false,
                //     success: function(data) {
                //         $("#preview").hide();
                        
                //         if (data == 1 || data == 11) {
                //             $(function() 
                //             {
                //                 alert("Bratati");
                //                 // alert(data);
                //                 // new PNotify({
                //                 //     title: 'Add Schedule',
                //                 //     text: 'Schedule Submited Successfully',
                //                 //     type: 'success'
                //                 // });
                //                 $("#schedule_model").modal('hide');
                //                 $("#scheduleModal").modal('hide');
                //                 $('#successModal').modal("toggle");

                //                 // $("#successModal").modal('show');
                                
                //             });
                //             // setTimeout(function() {
                //             //     $('#successModal').modal({show:true});
                //             // }, 200);
                //         }
                //         else
                //         {
                //             $('#alertModal').modal('show');
                //         }
                //     },
                //     error: function() 
                //     {
                //         $('#alertModal').modal('show');
                //     }
                // });
            }
        }));
    });
</script>




<script type="text/javascript">
    $('#employee_list').select2({
        placeholder: 'Select Resource List'
    });

    $('#status').select2({
        placeholder: 'Select Status'
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


    // $(document).ready(function() {
    //     animateCSS('#default_issue_table', 'zoomIn');
    // });
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
<!-- <script language="javascript">
    $(document).ready(function() {
        $('#schedule_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
        $("#schedule_date_edit").datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
        $('.recurring_eod').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
    });
</script> -->




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
        
        // alert(start_date);
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
                // alert(startTime);
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
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
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
                       // console.log(data)
                        $("#loader_gif").hide();
                        $("#set").hide();
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
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
    function getassignedissueChange12() {
        schedule_date = $('#schedule_date').val();
        employee_id = $('#employee_id_type3').val();
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
        employee_id = $('#employee_id_type3').val();
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
   
    // $('.clockpicker').clockpicker()
	// .find('input').change(function(){
	// 	// TODO: time changed
	// 	console.log(this.value);
	// });
    
    // $('.clockpicker').clockpicker({
    //     placement: 'left',
    //     align: 'left',
    //     donetext: 'Done',
    //     minTime: '12:00' // 11:45:00 AM,
    // });
</script>

<script>
    function priority_normal(id) {
        var datastring = 'query_id=' + id;

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status = $('#status').val();
        var employee = $('#employee_list').val();
        
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
                    $(".popover-body").css('display','none');
                    $('#start_date_get').val($('#start_date').val());
                    $("#end_date_get").val($('#end_date').val()); 
                    $("#status_get").val($('#status').val()); 
                    $("#employee_get").val($('#employee_list').val()); 



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

    // function updateUI_PrioritysucessModal_button_close()
    // {
    //     $(".popover-body").css('display','block');
    //     $('#PrioritysucessModal').attr('data-dismiss', 'modal');
    // }

    function priority_low(id) {
        var datastring = 'query_id=' + id;

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status = $('#status').val();
        var employee = $('#employee_list').val();

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
                    $(".popover-body").css('display','none');
                    $('#start_date_get').val($('#start_date').val());
                    $("#end_date_get").val($('#end_date').val()); 
                    $("#status_get").val($('#status').val()); 
                    $("#employee_get").val($('#employee_list').val()); 
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

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status = $('#status').val();
        var employee = $('#employee_list').val();

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
                    $(".popover-body").css('display','none');
                    $('#start_date_get').val($('#start_date').val());
                    $("#end_date_get").val($('#end_date').val()); 
                    $("#status_get").val($('#status').val()); 
                    $("#employee_get").val($('#employee_list').val()); 
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

    function update_status(id, type) {
        //  alert(type+'=='+id); return false;
        var datastring = 'query_id=' + id + '&status_type=' + type;

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status = $('#status').val();
        var employee = $('#employee_list').val();
        
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/update_status_schedule'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                PNotify.removeAll();
                $(function() {
                    // new PNotify({
                    //     title: 'Activity Status',
                    //     text: 'Status Change Successfully',
                    //     type: 'success'
                    // });
                    $('#statusupdatesucessModal').modal('show');
                    $(".popover-body").css('display','none');
                    $('#start_date_get_status').val($('#start_date').val());
                    $("#end_date_get_status").val($('#end_date').val()); 
                    $("#status_get__status").val($('#status').val()); 
                    $("#employee_get_status").val($('#status').val()); 
                });
                $('#get_data_form').submit();
                // setTimeout(function()
                // {
                //     window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                // }, 1000);                  
            },
            error: function() {
                // alert('Error while request..');
                $('#alertModal').modal('show');
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
                // alert(data);
                // console.log(data);
                rsp = JSON.parse(data);
                tn = rsp.ticket_no;
                // var title = "Reshedule Task For "
                $("#fetch_title").html('Reshedule Task For '+ tn);
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
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
        return false;
    }
    function updateUI_reschedule_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#reschedule_button_close').attr('data-dismiss', 'modal');
        location.reload();
    }
</script>


<script type="text/javascript">
    $(document).ready(function(e) {
        $("#get_data_form_refresh").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert('invalid');
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
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
                        // console.log(data)
                        $("#loader_gif").hide();
                        $("#PrioritysucessModal").modal('hide');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        // animateCSS('#all_activity_filter_table', 'zoomIn');
                        
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
        $("#get_data_form_refresh_status").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert('invalid');
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
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
                        // console.log(data)
                        $("#loader_gif").hide();
                        $("#statusupdatesucessModal").modal('hide');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        // animateCSS('#all_activity_filter_table', 'zoomIn');
                        
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
        $("#get_data_form_refresh_reschedule").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert('invalid');
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
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
                        // console.log(data)
                        $("#loader_gif").hide();
                        $("#reschedule_form_success").modal('hide');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        // animateCSS('#all_activity_filter_table', 'zoomIn');
                        
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
        $("#get_data_form_refresh_reschedule_overlap").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert('invalid');
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
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
                        // console.log(data)
                        $("#loader_gif").hide();
                        $("#reschedule_form_overlapping").modal('hide');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        // animateCSS('#all_activity_filter_table', 'zoomIn');
                        
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


<div class="modal fade" id="PrioritysucessModal" tabindex="-1" aria-labelledby="PrioritysucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="PrioritysucessModal" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Priority Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form class="form-horizontal" id="get_data_form_refresh">
                    <input type="hidden" id="start_date_get" name="start_date" value="">
                    <input type="hidden" id="end_date_get" name="end_date" value="">
                    <input type="hidden" id="status_get" name="status" value="">
                    <input type="hidden" id="employee_get" name="employee_list" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="statusupdatesucessModal" tabindex="-1" aria-labelledby="statusupdatesucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Status Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form class="form-horizontal" id="get_data_form_refresh_status">
                    <input type="hidden" id="start_date_get_status" name="start_date" value="">
                    <input type="hidden" id="end_date_get_status" name="end_date" value="">
                    <input type="hidden" id="status_get__status" name="status" value="">
                    <input type="hidden" id="employee_get_status" name="employee_list" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

        $('#schedule_start_time_reschedule').change(function() {
            $('#reschedule_form').bootstrapValidator('revalidateField', 'schedule_start_time');
        });

        $('#schedule_end_time_reschedule').change(function() {
            $('#reschedule_form').bootstrapValidator('revalidateField', 'schedule_end_time');
        });
    
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
                            message: 'Please Enter Comment'
                        }
                    }
                },

                schedule_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Time'
                        }
                    }
                },

                schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Time'
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

                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                var status = $('#status').val();
                var employee = $('#employee_list').val();
                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivitySubmit'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                       
                        $("#preview").hide();
                        if (data == 1) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Re-Schedule',
                                //     text: 'Re-Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $('#reschedule_activity').modal('hide');
                                $('#reschedule_form_success').modal('show');
                                $('#start_date_get_reschedule').val($('#start_date').val());
                                $("#end_date_get_reschedule").val($('#end_date').val()); 
                                $("#status_get__reschedule").val($('#status').val()); 
                                $("#employee_get_reschedule").val($('#employee_list').val()); 
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            // }, 1000);
                        } else if (data == 2) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Re-Schedule',
                                //     text: 'overlapping',
                                //     type: 'error'
                                // });
                                $('#reschedule_activity').modal('hide');
                                $('#reschedule_form_overlapping').modal('show');
                                $('#start_date_get_reschedule_overlap').val($('#start_date').val());
                                $("#end_date_get_reschedule_overlap").val($('#end_date').val()); 
                                $("#status_get__reschedule_overlap").val($('#status').val()); 
                                $("#employee_get_reschedule_overlap").val($('#employee_list').val()); 
                            });
                            

                        } else if (data == 0) {
                            $(function() {
                            //     new PNotify({
                            //         title: 'Re-Schedule',
                            //         text: 'Failed to submit',
                            //         type: 'error'
                            //     });
                                $('#reschedule_activity').modal('hide');
                                $('#reschedule_form_fail').modal('show');
                            });

                        }



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
<div class="modal fade" id="reschedule_form_overlapping" tabindex="-1" aria-labelledby="reschedule_form_overlappingLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_overlappingLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule is overlapping</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="get_data_form_refresh_reschedule_overlap">
                        <input type="hidden" id="start_date_get_reschedule_overlap" name="start_date" value="">
                        <input type="hidden" id="end_date_get_reschedule_overlap" name="end_date" value="">
                        <input type="hidden" id="status_get__reschedule_overlap" name="status" value="">
                        <input type="hidden" id="employee_get_reschedule_overlap" name="employee_list" value="">
                        <button type="hidden" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                    </form>
                    <!-- <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reschedule_form_success" tabindex="-1" aria-labelledby="reschedule_form_successLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_successLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Re-Schedule</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form class="form-horizontal" id="get_data_form_refresh_reschedule">
                    <input type="hidden" id="start_date_get_reschedule" name="start_date" value="">
                    <input type="hidden" id="end_date_get_reschedule" name="end_date" value="">
                    <input type="hidden" id="status_get__reschedulestatus" name="status" value="">
                    <input type="hidden" id="employee_get_reschedule" name="employee_list" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="reschedule_form_fail" tabindex="-1" aria-labelledby="reschedule_form_failLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_failLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to submit.</div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
<!-- <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Are you sure you want to delete this Activity?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form action="<?php echo base_url('admin/ScheduleManagement/delete_activity'); ?>" method="POST">
                        <input type="hidden" id="queryId" name="query_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

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
                        <input type="hidden" id="employee_get_delete" name="employee_list" value="">
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function openAddBookDialog (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#queryId').val(element.getAttribute("data-id"));
        $('#start_date_get_delete').val($('#start_date').val());
        $("#end_date_get_delete").val($('#end_date').val()); 
        $("#status_get_delete").val($('#status').val()); 
        $("#employee_get_delete").val($('#employee_list').val()); 
        $('#confirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        $('#confirmationModal').modal('hide');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
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
                    url: "<?php echo base_url('admin/ScheduleManagement/delete_activity_new'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) 
                    {
                        $("#preview").hide();
                        $('#confirmationModal').modal('hide');
                        $('#myTable_wrapper').css('display','none');
                        // $("#confirmationModal").modal('hide');
                        // $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
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


<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

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
    function view_task_details(element) 
    {
        var datastring = element.getAttribute("data-id");

        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/ScheduleManagement/Task_view_page'); ?>",
            cache: false,
            data: datastring,
            success: function(data) 
            {
                PNotify.removeAll();
                $(function() 
                {
                    // new PNotify({
                    //     // title: 'priority Form',
                    //     text: 'Priority change  Successfully',
                    //     type: 'success'
                    // });
                    // $('#PrioritysucessModal').modal('show');
                    // $('#start_date_get').val($('#start_date').val());
                    // $("#end_date_get").val($('#end_date').val()); 
                    // $("#status_get").val($('#status').val()); 
                    // $("#employee_get").val($('#employee_list').val()); 



                });

            },
            error: function() 
            {
                // alert('Error while request..');
                $('#alertModal').modal('show');
            }
        });
        return false;
    }
</script>

<script>
    // var popOverSettingsPriority = {
    //     placement: 'bottom',
    //     container: 'body',
    //     html: true,
    //     sanitize: false,
    //     selector: '[data-toggle="popover"]',
    //     content: function () {
    //         return $('#popover-content-priority').html();
    //     }
    // }


// $('body').popover(popOverSettingsPriority);


</script>

<!-- <script>
    $(document).ready(function() {
    var rescheduleTable = $('#myTable').DataTable( {       
        scrollX:        true,
        scrollCollapse: true,
        autoWidth:         true,  
        paging:         true, 
    } );
} );
</script> -->



<script type="text/javascript">
    $('#schedule_type_edit').select2({
        dropdownParent: $('#reschedule_activity')
    });
    $('#reminder_before_time_type5').select2({
        dropdownParent: $('#reschedule_activity')
    });
    $('#reminder_notify_type5').select2({
        dropdownParent: $('#reschedule_activity')
    });
    $('#recurring_set_type5').select2({
        dropdownParent: $('#reschedule_activity')
    });
    $('#interval_type5').select2({
        dropdownParent: $('#reschedule_activity')
    });
    $('#user_id_type5').select2({
        dropdownParent: $('#reschedule_activity')
    });
</script>

<div id="modal_default_edit" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Task</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data_edit"></div>
            </div>

        </div>
    </div>
</div>

<script>
    function edit_task(id) {
        var datastring = 'id=' + id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/ScheduleManagement/edit_task'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#modal_default_edit').modal('show');
                $('#complaint_model_data_edit').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });

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
                $("#act_sub_btn123").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#act_sub_btn123").attr('disabled', false);
            }
        } 
</script>

<script>

//         $(document).ready(function () {

//         popoverOptions = {
//             content: function () {
//                 // Get the content from the hidden sibling.
//                 return $(this).siblings('.my-popover-content').html();
//             },
//             placement: 'bottom',
//             container: 'body',
//             html: true,
//             sanitize: false,
//             // selector: '[data-toggle="popover"]',
//         };
//         $('.panel-button').popover(popoverOptions);

//         $('.panel-button').click(function (e) {
//             e.stopPropagation();
//         });

        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });

// });


// $('body').on('click', function (e) {
//     $('.popover-body').each(function () {
//         // hide any open popovers when the anywhere else in the body is clicked
//         if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
//             $(this).popover('hide');
//         }
//     });
// });
                    
</script>
<script>
    // $(document).click(function (e) {
    //         if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
    //             $('.panel-button').popover('hide');
    //         }
    //     });
    $(document).click(function (e) {
        if ($(e.target).is('.close')) {
            $('.panel-button').popover('hide');
        }
    });
</script>