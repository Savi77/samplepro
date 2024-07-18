<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    /* .dt-buttons {
        display: none;
    } */
    tr.group{
        background: #fff;
        color: #000;
    }
    /* tr.odd{
        background: #e6f5fa;
    } */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    table td{
        color: #000 !important;
   }
   .text-wrap-col{
        width: 150px !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
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
    .popover .arrow{
        display: none !important;
    }

    .popover-body{
        width: 200px !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    #reminder_table2 th:first-child,#reminder_table1 th:first-child ,#reminder_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
            padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
    }
    
    
</style>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Reminder</span>
                <div class="small-div contact text-right">
                    <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#modal_default2"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span>
                </div>
            </div>
            <?php
                $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
            ?>
               <!-- <li class="nav-item"><a href="#activity_table" class="nav-link active" data-toggle="tab">Activity ()</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">Contact ()</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">General ()</a></li> -->
        <div class="tab-section">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified border pl-3 pr-3" style="margin-top:1.25rem;">
                <li class="nav-item"><a href="#view_activity" class="nav-link active" data-toggle="tab">Task (<?= COUNT($activity_get_data->result())?>)</a></li>
                <li class="nav-item"><a href="#view_contact" class="nav-link" data-toggle="tab">Contact (<?= COUNT($contact_get_data->result())?>)</a></li>
                <li class="nav-item"><a href="#view_general" class="nav-link" data-toggle="tab">General (<?= COUNT($general_get_data->result())?>)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane has-padding active" id="view_activity">
                    <table class="table table-striped" id="reminder_table">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Planned Date Time</th>
                                <th>Reminder Date Time </th>
                                <th>Notify By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($activity_get_data->result() as $row) {
                               
                                $a = new DateTime(date('H:i:s', strtotime($row->reminder_time)));
                                $b = new DateTime(date('H:i:s', strtotime($row->reminder_before_time)));
                                $interval = $a->diff($b);
                                $timeDiff = $interval->format("%H:%i");

                                $rem_notify_by = $row->notify_id;
                                $str_arr = preg_split ("/\,/", $rem_notify_by);  
                                
                                $rem_notify_name = "";
                                for ($i = 0; $i < count($str_arr); $i++) 
                                {
                                    $rem_notify_by_name = $this->db->select('notify_by')->from('tbl_notify_by')->where('notify_id',$str_arr[$i])->where('org_id',$this->session->org_id)->get()->row()->notify_by;  
                                    $rem_notify_name = $rem_notify_name . $rem_notify_by_name . ",";
                                }
                                $rem_notify_name1 = trim($rem_notify_name, ',');
                            ?>
                                <tr <?= $bg_class ?>>
                                    <td>
                                        <div>
                                            <?php echo $count ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $row->reminder_title ?>
                                        </div>
                                    </td>
                                    <td> 
                                        <div style="width:100px;">
                                            <?= $row->module_name ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($row->reminder_time)) ?></small> 
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($timeDiff)) ?></small>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $rem_notify_name1 ?>
                                        </div> 
                                    </td>

                                    <td>
                                        <div style="width:100px;">
                                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                <li>  
                                                    <div>
                                                        <div class="panel-button">
                                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                <i class="icon-menu9" style="cursor:pointer;"></i>
                                                            </a>
                                                        </div>

                                                        <?php if ($row->recurring_set == 1) {   ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/Reminder/View/<?= $row->reminder_id; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-blue"></span> View Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    } else {    ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->reminder_id; ?>" <?= $EditClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-green"></span> Edit Reminder  
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <!-- <a data-toggle="modal" onclick="DeleteList(id)" id="<?= $row->reminder_id; ?>" data_id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a> -->
                                                                        <a data-toggle="modal" onclick="DeleteList(this)" id="<?= $row->reminder_id; ?>" data-id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    }  ?>
                                                        
                                                        
                                                    </div> 

                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane has-padding" id="view_contact">
                    <table class="table table-striped" id="reminder_table1">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Planned Date Time</th>
                                <th>Reminder Date Time </th>
                                <th>Notify By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($contact_get_data->result() as $row) {
                                $a = new DateTime(date('H:i:s', strtotime($row->reminder_time)));
                                $b = new DateTime(date('H:i:s', strtotime($row->reminder_before_time)));
                                $interval = $a->diff($b);
                                $timeDiff = $interval->format("%H:%i");

                                $rem_notify_by = $row->notify_id;
                                $str_arr = preg_split ("/\,/", $rem_notify_by);  
                                
                                $rem_notify_name = "";
                                for ($i = 0; $i < count($str_arr); $i++) 
                                {
                                    $rem_notify_by_name = $this->db->select('notify_by')->from('tbl_notify_by')->where('notify_id',$str_arr[$i])->where('org_id',$this->session->org_id)->get()->row()->notify_by;  
                                    $rem_notify_name = $rem_notify_name . $rem_notify_by_name . ",";
                                }
                                $rem_notify_name1 = trim($rem_notify_name, ',');
                            ?>
                                <tr <?= $bg_class ?>>
                                    <td>
                                        <div>
                                            <?php echo $count ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $row->reminder_title ?>
                                        </div>
                                    </td>
                                    <td> 
                                        <div style="width:100px;">
                                            <?= $row->module_name ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($row->reminder_time)) ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($timeDiff)) ?></small>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $rem_notify_name1 ?>
                                        </div> 
                                    </td>

                                    <td>
                                        <div style="width:100px;">
                                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                <li>  
                                                    <div>
                                                        <div class="panel-button">
                                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                <i class="icon-menu9" style="cursor:pointer;"></i>
                                                            </a>
                                                        </div>

                                                        <?php if ($row->recurring_set == 1) {   ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/Reminder/View/<?= $row->reminder_id; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-blue"></span> View Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    } else {    ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->reminder_id; ?>" <?= $EditClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-green"></span> Edit Reminder  
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <!-- <a data-toggle="modal" onclick="del_client(id)" id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a> -->
                                                                        <a data-toggle="modal" onclick="DeleteList(this)" id="<?= $row->reminder_id; ?>" data-id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    }  ?>
                                                        
                                                        
                                                    </div> 

                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane has-padding" id="view_general">
                    <table class="table table-striped" id="reminder_table2">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Planned Date Time</th>
                                <th>Reminder Date Time </th>
                                <th>Notify By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($general_get_data->result() as $row) {
                                
                                $a = new DateTime(date('H:i:s', strtotime($row->reminder_time)));
                                $b = new DateTime(date('H:i:s', strtotime($row->reminder_before_time)));
                                $interval = $a->diff($b);
                                $timeDiff = $interval->format("%H:%i");

                                $rem_notify_by = $row->notify_id;
                                $str_arr = preg_split ("/\,/", $rem_notify_by);  
                                
                                $rem_notify_name = "";
                                for ($i = 0; $i < count($str_arr); $i++) 
                                {
                                    $rem_notify_by_name = $this->db->select('notify_by')->from('tbl_notify_by')->where('notify_id',$str_arr[$i])->where('org_id',$this->session->org_id)->get()->row()->notify_by;  
                                    $rem_notify_name = $rem_notify_name . $rem_notify_by_name . ",";
                                }
                                $rem_notify_name1 = trim($rem_notify_name, ',');

                            ?>
                                <tr <?= $bg_class ?>>
                                    <td>
                                        <div>
                                            <?php echo $count ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $row->reminder_title ?>
                                        </div>
                                    </td>
                                    <td> 
                                        <div style="width:100px;">
                                            <?= $row->module_name ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($row->reminder_time)) ?></small> 
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px;">
                                            <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($timeDiff)) ?></small> 
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="text-wrap-col" style="width:150px;">
                                            <?= $rem_notify_name1;?>   
                                        </div> 
                                    </td>

                                    <td>
                                        <div style="width:100px;">
                                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                <li>  
                                                    <div>
                                                        <div class="panel-button">
                                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                <i class="icon-menu9" style="cursor:pointer;"></i>
                                                            </a>
                                                        </div>

                                                        <?php if ($row->recurring_set == 1) {   ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>admin/Reminder/View/<?= $row->reminder_id; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-blue"></span> View Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    } else {    ?>
                                                            <div class="my-popover-content" style="display:none">
                                                                <ul>
                                                                    <li>
                                                                        <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->reminder_id; ?>" <?= $EditClass; ?> style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-green"></span> Edit Reminder  
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                    
                                                                        <!-- <a data-toggle="modal" onclick="del_client(id)" id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a> -->
                                                                        <a data-toggle="modal" onclick="DeleteList(this)" id="<?= $row->reminder_id; ?>" data-id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php    }  ?>
                                                        
                                                        
                                                    </div> 

                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <!-- <div class="tab-section">
                <ul class="nav nav-tabs nav-tabs-solid nav-justified border pl-3 pr-3" style="margin-top:1.25rem;">
                    <li class="nav-item"><a href="#activity_table" class="nav-link active" data-toggle="tab">Activity ()</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">Contact ()</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" data-toggle="tab">General ()</a></li>
                </ul>
            </div> -->
            <!-- <table class="table table-striped" id="reminder_table">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Planned Date Time</th>
                        <th>Reminder Date Time </th>
                        <th>Notify By</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($get_data->result() as $row) {
                        $a = new DateTime(date('H:i:s', strtotime($row->reminder_time)));
                        $b = new DateTime(date('H:i:s', strtotime($row->reminder_before_time)));
                        $interval = $a->diff($b);
                        $timeDiff = $interval->format("%H:%i");
                    ?>
                        <tr <?= $bg_class ?>>
                            <td>
                                <div style="width:100px;">
                                    <?php echo $count ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->reminder_title ?>
                                </div>
                            </td>
                            <td> 
                                <div style="width:100px;">
                                    <?= $row->module_name ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:200px;">
                                    <?= date('d M Y', strtotime($row->reminder_date)) ?> / <?= date('H:i A', strtotime($row->reminder_time)) ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:200px;">
                                    <?= date('d M Y', strtotime($row->reminder_date)) ?> / <?= date('H:i A', strtotime($timeDiff)) ?>
                                </div>
                            </td>
                            <td> 
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->notify_by ?>
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

                                                <?php if ($row->recurring_set == 1) {   ?>
                                                    <div class="my-popover-content" style="display:none">
                                                        <ul>
                                                            <li>
                                                                <a href="<?= base_url() ?>admin/Reminder/View/<?= $row->reminder_id; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                    <span class="status-mark position-left dot dot-blue"></span> View Reminder  
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php    } else {    ?>
                                                    <div class="my-popover-content" style="display:none">
                                                        <ul>
                                                            <li>
                                                                <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->reminder_id; ?>" <?= $EditClass; ?> style="color:#333333;">
                                                                    <span class="status-mark position-left dot dot-green"></span> Edit Reminder  
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="modal" onclick="del_client(id)" id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                    <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php    }  ?>
                                                
                                                
                                            </div> 

                                            
                                        </li>
                                    </ul>
                                </div>
                            </td>




                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table> -->
        </div>
    </div>
</div>
<?php $this->load->view('Admin/includes/n-footer'); ?>
<!--popup-->
<div id="modal_default2" class="modal fade show" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Add Reminder</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <form class="form-horizontal" id="ReminderForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Title <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="reminder_title" name="reminder_title" placeholder="Enter Title" maxlength="50">
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">User </label>
                            <div class="col-sm-12">
                                <select class="form-control multiselect-select-all" multiple="multiple" name="user_id[]" id="rmd_user_id" >
                                    <?php foreach ($getUserSysyemList as $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Date<span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate-selectors rounded-right" class="form-control schedule_date_select" id="reminder_date" name="reminder_date" value="<?= date('d F, Y'); ?>" placeholder="Please select start date" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Time <span style="color: red;">*</span></label>
                            <div class="col-sm-12 clearfix" >
                                <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <!-- <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </span> -->
                                    <input type="text" class="form-control" placeholder="Enter Time" name="reminder_time" id="reminder_time" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">User </label>
                            <div class="col-sm-12">
                                <select class="form-control multiselect-select-all" multiple="multiple" name="user_id[]" id="rmd_user_id" >
                                    <?php foreach ($getUserSysyemList as $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Before Time <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select class="form-control" name="reminder_before_time" id="reminder_before_time_1" data-placeholder="Select Before Time">
                                    <option value="">Select Before Time</option>
                                    <!-- <?php foreach ($getTimeSlot as $value) { ?>
                                        <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                    <?php  } ?> -->
                                    <?php foreach ($getTimeSlot as $value) { ?>
                                        <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                            <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_by_2" data-placeholder="Select Notify By">
                                <!-- <select class="form-control" name="reminder_notify_by" id="reminder_notify_by_2" data-placeholder="Select Notify By">  -->
                                    <option value="">Select Notify By</option>
                                    <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                    <?php foreach ($getNotifyBy as $value) { ?>
                                        <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Comment <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="1" id="reminder_note" name="reminder_note" placeholder="Enter Comments" maxlength="500"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select class="form-control" name="recurring_set" id="recurring_set_1" onchange="showDataRecurringData(this.value)" data-placeholder="Select Recurring">
                                    <option value="">Select Recurring</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div id="recuuringDataAdd" style="display: none;clear:both">
                            <div class="form-group col-6">
                                <label class="control-label col-sm-12" for="email">Recurring Interval </label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="interval_type" id="interval_type_2" data-placeholder="Select Recurring Interval">
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
                            <div class="form-group col-6">
                                <label class="control-label col-sm-12" for="email">Recurring EOD</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-selectors rounded-right" id="recurringEOD" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="modal_default1" class="modal fade show" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Reminder</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div> -->

            <!-- <div class="modal-body"> -->
                <div id="complaint_model_data1"></div>
            <!-- </div> -->

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.clockpicker').clockpicker().find('input').change(function() {
            console.log(this.value);
        });
    });
    $(document).ready(function() {
        
    });

    function showDataRecurringData(id) {
        if (id == 1) {
            $('#recuuringDataAdd').show();
            $('#recuuringDataAdd').css('display','contents');
        } else {
            $('#recuuringDataAdd').hide();
            $('#recuuringDataAdd').css('display','none');
        }
    }
    $(document).ready(function() {
        var groupColumn = 2;
        var table1 = $('#reminder_table').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });

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
                    table.on('page.dt', function() {
                        var currentPage = table.page.info().page + 1;
                        
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
        var table2 = $('#reminder_table1').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });

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
        });

        var table3 = $('#reminder_table2').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });

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
        });
    
    
        var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        table1.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    table1.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = table1.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            table1.column(i).visible(columnVisibility[i]);
        }
    }


    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        table2.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    table2.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = table2.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            table2.column(i).visible(columnVisibility[i]);
        }
    }


    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        table3.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    table3.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = table3.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            table3.column(i).visible(columnVisibility[i]);
        }
    }
    
    
    
    });

    $('#reminder_date').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_date');
    });

    $('#reminder_time').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_time');
    });

    $(document).ready(function() {
        
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'bottom',
            donetext: 'Done',
            minTime: '12:00'
        });
    });

    $(document).ready(function() {
        $('#ReminderForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                reminder_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Date'
                        }
                    }
                },
                reminder_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Time'
                        }
                    }
                },
                reminder_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Title'
                        }
                    }
                },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Before Time.'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Notify By.'
                        }
                    }
                },
                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Comment.'
                        }
                    }
                },
                recurring_set: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring.'
                        }
                    }
                }

            }
        });
    });

    $(document).ready(function(e) {
        $("#ReminderForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").show();
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                $.ajax({
                    url: "<?php echo base_url('admin/Reminder/add_reminder'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();

                        $(function() {
                            // new PNotify({
                            //     title: 'Reminder Form',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $("#modal_default2").modal('hide');
                            $("#successModalReminder").modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Reminder'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        // alert('fail');
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });

    function edit_client(id) {
        var datastring = 'reminder_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Reminder/edit_reminder'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);
                $(".popover-body").css('display','none');

            },
            error: function() {
                alert('Error while request..');
            }
        });

    }

    function updateUI_edit_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#modal_default1').modal('hide');
        location.reload();

    }

    // function del_client(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to delete this Reminder?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                     text: 'Yes',
    //                     addClass: 'btn-sm'
    //                 },
    //                 {
    //                     text: 'No',
    //                     addClass: 'btn-sm'
    //                 }
    //             ]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'reminder_id=' + id;
    //         // alert(datastring);return false;
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Reminder/delete_reminder'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Delete Form',
    //                         text: 'Deleted successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Reminder'); ?>";
    //                 }, 1000);


    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });
    //     })
    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }
</script>
<script>
    $('#reminder_notify_by_2').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#reminder_before_time_1').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#recurring_set_1').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#interval_type_2').select2({
        dropdownParent: $('#modal_default2')
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
//     $(document).click(function (e) {
//             if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
//                 $('.panel-button').popover('hide');
//             }
//         });
// });
    $(document).click(function (e) {
        if ($(e.target).is('.close')) {
            $('.panel-button').popover('hide');
        }
    });
});
            

</script>

<script>
    function DeleteList (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
        $('#deleteconfirmationModal').modal('hide');
    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#reminderdeleteForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Reminder/delete_reminder'); ?>",
          cache: false,
          data: { "reminder_id": datastring },
          success: function(data) {
            $(function() {
              $("deleteSucessModal").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Master'); ?>";
            // }, 1000);


          },
          error: function() {
            // alert('Error while request..');
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>


<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalReminder" tabindex="-1" aria-labelledby="successModalReminderLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalReminderLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Reminder Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Reminder?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="reminderdeleteForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSucessModal" tabindex="-1" aria-labelledby="deleteSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deleteSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
