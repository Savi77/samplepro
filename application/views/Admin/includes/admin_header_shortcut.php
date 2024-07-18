<ul class="col-sm-1 breadcrumb text-left">
    <li>
        <div class="add-new-popup-control popup-control collapsed ember-view">
            <img id="addBtn" src="<?php echo base_url(); ?>assets/icons/plus.svg" alt="" width="32" height="32" class="popup-toggle" style="cursor: pointer;">
            <div class="popup-dropdown" id="popupDrop" style="display: none;">
                <ul class="popupUl">
                    <a data-toggle="modal" data-target="#activityModal" style="color: black;" id="addactivity">
                        <li><i class="icon-calendar2 position-left"></i>Add Activity</li>
                    </a>
                    <a href="<?= base_url('admin/Customer'); ?>" style="color: black;">
                        <li><i class="icon-users4 position-left"></i>Contact List</li>
                    </a>
                    <?php if ($this->session->user_type == 'SA') {    ?>
                        <a href="<?= base_url('admin/Users'); ?>" style="color: black;">
                            <li><i class="icon-user-tie position-left"></i>Users</li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </li>
</ul>
<style>
    .modal-backdrop.in {
        opacity: 0;
        filter: alpha(opacity=50);
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
        background-color: #000;
    }
</style>
<?php
$this->db->where('org_id', $this->session->org_id);
$this->db->where('delete_status', 0);
$this->db->order_by('company_name', 'ASC');
$customer_list = $this->db->get('tbl_customer')->result();

$this->db->select('prdsrv_name as product_name, prd_srv_id as product_id ');
$this->db->where('org_id', $this->session->org_id);
$this->db->where('delete_status', 0);
$this->db->where('status', 1);
$product_list = $this->db->get('tbl_product_service_list')->result();

$this->db->where('org_id', $this->session->org_id);
$this->db->where('user_status', 1);
$this->db->where('delete_status', 0);
$this->db->where('user_type', 'E');
$employee_list = $this->db->get('tbl_admin_login')->result();

$this->db->where('org_id', $this->session->org_id);
$this->db->where('delete_status', 0);
$this->db->where('status', 1);
$schedule_visit_list = $this->db->get('tbl_schedule_type_name')->result();

$created_date = date('Y-m-d');

if ($_SESSION['user_type'] == 'A' || $_SESSION['user_type'] == 'SA') {
    $this->db->where('DATE(assign_date)', $created_date);
    $this->db->where('org_id', $this->session->org_id);
    $this->db->where('delete_status', 0);
    $this->db->order_by('query_id', 'DESC');
    $this->db->where('status != ', 'in_complete');
    $this->db->limit(50);
    $queryRecords = $this->db->get('tbl_user_query')->result();
} else {
    $this->db->select('tbl_user_query.*');
    $this->db->join('tbl_schedule', 'tbl_user_query.query_id = tbl_schedule.issue_id');
    $this->db->where('tbl_schedule.created_by', $_SESSION['id']);
    $this->db->where('DATE(tbl_user_query.assign_date)', $created_date);
    $this->db->where('tbl_user_query.org_id', $this->session->org_id);
    $this->db->where('tbl_user_query.delete_status', 0);
    $this->db->where('tbl_user_query.status != ', 'in_complete');
    $this->db->order_by('query_id', 'DESC');
    $this->db->limit(50);
    $queryRecords = $this->db->get('tbl_user_query')->result();
}

$issue_list_array = array();
$a = 1;
$bg_color = '';
foreach ($queryRecords as $value) {
    $customer_id = $value->customer_id;
    $data1 = $this->db->query("SELECT * FROM `tbl_customer` WHERE `customer_id`='.$customer_id.'")->row();
    if(!empty($data1)){
        $company_name = $data1->company_name;
        $contact_person_name1 = $data1->contact_person_name1;
        $phone_no = $data1->phone_no;
        $email = $data1->email;
        $customer_id = $data1->customer_id;
        $query_id = $value->query_id;
        $data3 = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
        $schedulecount = $data3->count;
        if ($schedulecount > 1) {
            $highlight = "YES";
        } else {
            $highlight = "NO";
        }
        if ($schedulecount > 0) {
            $data_count = $this->db->query("SELECT count(schedule_id) as count FROM `tbl_schedule` WHERE `issue_id`='$query_id'")->row();
            $schedulecount1 = $data_count->count;
            $data4 = $this->db->query("SELECT * FROM `tbl_schedule` WHERE `issue_id`='$query_id' ORDER BY schedule_id DESC limit 1")->row();
            $employee_id = $data4->schedule_assign_to;
            $assign_date = $data4->assign_date;
            $assign_starttime = $data4->assign_starttime;
            $assign_endtime = $data4->assign_endtime;
            $data5 = $this->db->query("SELECT name FROM `tbl_admin_login` WHERE `id` = $employee_id")->row();
            $employee_name = $data5->name;
            $check_assign = "Yes";
        } else {
            $check_assign = "No";
        }

        $Status1 = $value->status;
        $scheduledatetime = date("h:ia", strtotime($assign_starttime)) . ' To ' . date("h:i a", strtotime($assign_endtime));

        if ($check_assign == 'No') {
            $check = ' <a data-popup="tooltip" title="" data-placement="bottom" onclick="assign_to(this.id)" id="' . $value->query_id . '"  data-original-title="Click for schedule task"><span class="label label-warning">Not-Schedule</span></a>';
        } else if ($schedulecount1 != 0) {
            $check = '<a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" onclick="reschedule_list(id)" id="' . $value->query_id . '"><span class="label label-primary">' . $schedulecount1 . '</span></a> ' . $employee_name . '<br>';
        } else {
            $check = '
                            <a data-toggle="modal"  data-toggle="tooltip" title="Re-Schedule count" data-placement="bottom" id="' . $value->query_id . '"><span class="label label-primary">' . $schedulecount1 . '</span></a> ' . $employee_name . '<br>
                            ';
        }
        if ($value->priority == 'Normal') {
            $Normal = 'class="active"';
            $bg_color = 'info';
        } else {
            $Normal = '';
            // $bg_color='info';
        }
        if ($value->priority == 'Low') {
            $Low = 'class="active"';
            $bg_color = 'danger';
        } else {
            $Low = '';
            // $bg_color='danger';
        }
        if ($value->priority == 'High') {
            $High = 'class="active"';
            $bg_color = 'success';
        } else {
            $High = '';
        }
        $priority = '
                                <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
                                    ' . $value->priority . ' <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                
                                <li ' . $Normal . '>
                                    <a onclick="priority_normal(this.id)" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-danger"></span> Normal
                                    </a>
                                </li>
                                <li ' . $Low . '>
                                    <a onclick="priority_low(this.id)" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-info"></span> Low
                                    </a>
                                </li>
                                <li ' . $High . ' >
                                    <a onclick="priority_high(this.id)" id="' . $value->query_id . '" >
                                        <span class="status-mark position-left bg-primary"></span> High
                                    </a>
                                </li>
                                </ul>
                            ';
        if ($value->status == 'pending') {
            $pending = 'class="active"';
            $bg_color = 'info';
            $name = 'Pending';
        } else {
            $pending = '';
        }
        if ($value->status == 'completed') {
            $completed = 'class="active"';
            $bg_color = 'success';
            $name = 'completed';
        } else {
            $completed = '';
        }
        if ($value->status == 'in_progress') {
            $in_progress = 'class="active"';
            $bg_color = 'danger';
            $name = 'In Progress';
        } else {
            $in_progress = '';
        }

        if ($value->status == 'in_complete') {
            $in_complete = 'class="active"';
            $bg_color = 'success';
            $name = 'Transfer Schedule';
        } else {
            $in_complete = '';
        }

        $status_remark = '
                                <a href="#" class="label label-' . $bg_color . ' dropdown-toggle" data-toggle="dropdown">
                                    ' . $name . ' <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                
                                <li ' . $pending . '>
                                    <a onclick="update_status(this.id,this.type)" type="pending" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-info"></span> Pending
                                    </a>
                                </li>
                                <li ' . $in_progress . ' >
                                    <a onclick="update_status(this.id,this.type)" type="in_progress" id="' . $value->query_id . '" >
                                        <span class="status-mark position-left bg-danger"></span> In-progress
                                    </a>
                                </li>
                                <li ' . $completed . '>
                                    <a onclick="update_status(this.id,this.type)" type="completed" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-success"></span> Completed
                                    </a>
                                </li>
                            </ul> ';
        $remark = '<ul class="icons-list">
                                <li><a onclick="remark_list(id)" id="' . $value->ticket_no . '">
                                <span class="label bg-success" style="line-height: 20px;">Remark</span> </a></li>
                            </ul>
                ';
        $upload_documents = '<ul class="icons-list">
                                        <li><a onclick="upload_documents(id)" id="' . $value->query_id . '"  title="Upload Documents">
                                        <span class="label bg-success" style="line-height: 20px;"><i class="icon-upload"></i></span> </a></li>
                                        </ul>
                ';


        $action_btn = '
                            <a href="#" class="label label-info dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                Select Action <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a onclick="Reshedule(this.id)" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-danger"></span> RE-SCHEDULE 
                                    </a>
                                </li>
                                <li>
                                    <a onclick="update_status(this.id,this.type)" type="in_complete" id="' . $value->query_id . '">
                                        <span class="status-mark position-left bg-info"></span> TRANSFER SCHEDULE
                                    </a>
                                </li>
                            </ul>
                ';
        $new = array(
            'ticket_no' => $value->ticket_no,
            'query_id' => $value->query_id,
            'status' => ucwords($Status1),
            'company_name' => $company_name,
            'contact_person_name1' => $contact_person_name1,
            'product_name' => $value->product_name,
            'issue' => $value->issue,
            'scheduledatetime' => $scheduledatetime,
            'check' => $check,
            'priority' => $priority,
            'created_date' => date("d M, Y", strtotime($value->created_date)),
            'schedule_date' => date("d M, Y", strtotime($assign_date)),
            'upload_documents' => $upload_documents,
            'remark' => $remark,
            'status_remark' => $status_remark,
            'action_btn' => $action_btn
        );
        array_push($issue_list_array, $new);
    }
}
?>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
<!-- Modal -->
<div class="modal fade" id="activityModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="schedule_form">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="select-search" name="customer_id" id="customer_id">
                                                <option value="">Select Company</option>
                                                <?php
                                                foreach ($customer_list as $value) { ?>
                                                    <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                                                        (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-sm-2" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="select-search" name="product_id" id="product_id">
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
                                    <div class="form-group">

                                        <label class="control-label col-sm-2" for="email">Schedule Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                <input type="text" class="form-control schedule_date_select" id="schedule_date_header" name="schedule_date" value="<?= date('d M Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueHeader()">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-2" for="Youtube">Employee Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="select-search" name="employee_id" id="employee_id" onchange="getassignedissueHeader()">
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










                                    <div class="form-group" id="issuelistdetails" style="display: none">
                                        <label class="control-label col-sm-2" for="Youtube">Assign issue list</label>
                                        <div class="col-sm-10" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time" value="" placeholder="Please select start time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' " autocomplete="off">
                                            <span id="err3" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        <label class="control-label col-sm-2" for="Youtube">End Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" id="schedule_end_time" name="schedule_end_time" value="" placeholder="Please select end time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off">
                                            <span id="err4" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="schedule_type_id" id="schedule_type_id">
                                                <option value="">Select Schedule Type</option>
                                                <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                    <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Comments <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="addReminder" class="custom-control-input checkboxchecked" id="addReminder" data-fv-field="rbi_requests" value="1" style="cursor: pointer;"><label class="custom-control-label" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                    </div>
                                </div>
                                <div id="reminderSetting" style="display: none;clear:both">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">User </label>
                                        <div class="col-sm-10">
                                            <select class="select-search" name="user_id[]" id="user_id" multiple>
                                                <option value="">Select Company</option>
                                                <?php   foreach ($getUserSysyemList as $value1) {   ?>
                                                    <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                                <?php   }    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="reminder_before_time" id="reminder_before_time">
                                                <option value="">Select Company</option>
                                                <?php foreach ($getTimeSlot as $value) { ?>
                                                    <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Notes <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Comments" maxlength="500"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Recurring <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="recurring_set" id="recurring_set" onchange="showDataRecurring(this.value)">
                                                <option value="">Select Recurring</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="recuuringData" style="display: none;clear:both">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Recurring Interval </label>
                                        <div class="col-sm-10">
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
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Recurring EOD</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
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

<script type="text/javascript">
    function showDataRecurring(id){
        if(id == 1){
            $('#recuuringData').toggle();
        }else{
            $('#recuuringData').hide();
        }
    }
    
    $(document).on('change', '.checkboxchecked', function() {
        if (this.checked) {
            $('#reminderSetting').toggle();
        }else{
            $('#reminderSetting').hide();
            $('#user_id').val("");
            $('#reminder_before_time').val("");
            $('#reminder_note').val('');
        }
    });
    $(document).ready(function() {
        $('#customer_id').select2({
            dropdownParent: $('#activityModal'),
            placeholder: "Select Company",
        });
        $('#product_id').select2({
            dropdownParent: $('#activityModal'),
            placeholder: "Select Product",
        });
        $('#employee_id').select2({
            dropdownParent: $('#activityModal'),
            placeholder: "Select Employee",
        });
        $('#priority_type').select2({
            dropdownParent: $('#activityModal'),
            placeholder: "Set Priority Type",
        });
        $('#recurring_eod').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
    });
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });
    $('#schedule_date_header').datetimepicker({
        format: 'DD MMMM, YYYY',
        useCurrent: true,
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', "#addBtn", function() {
            //alert("dgaj");
            $("#popupDrop").toggle();
        });
        $("#popupDrop").hide();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $("#schedule_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
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
                                            window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
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
    $('#schedule_date_header').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_date');
    });

    $('#schedule_start_time').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_start_time');
    });

    $('#schedule_end_time').change(function() {
        $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_end_time');
    });
</script>

<script type="text/javascript">
    function mainInfo1() {
        var start_date = $('#schedule_date_header').val();
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
            } else {
                $('#desktopbutton').prop('disabled', true);
                new PNotify({
                    title: 'Schedule',
                    text: 'Selected timing is less then current time',
                    type: 'warning'
                });
            }
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
    function getassignedissueHeader() {
        schedule_date = $('#schedule_date_header').val();
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


    $('#schedule_date_header').on('dp.change', function(e) {
        var schedule_date = $('#schedule_date_header').val();
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