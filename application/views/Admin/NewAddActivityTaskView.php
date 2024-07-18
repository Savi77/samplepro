<?php $this->load->view('Admin/includes/n-header');    ?>
<!-- Main content -->

<style>
    input.select2-search__field{
        width:100% !important;
    }
</style>
<?php
    $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
?>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div id="schedule_model" class="modal fade" style="top: 15px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                        <h6 class="card-title py-sm-4 card-headings">
                            Add Task For <?= $_REQUEST['GenerateID']; ?></h6>
                        <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id=') ?><?= $_REQUEST['leadopp_id']; ?>"><button type="button" class="close">&times;</button></a>
                    </div>
                    <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <form class="form-horizontal" id="schedule_form">
                                        <input type="hidden" name="leadopp_id" value="<?php echo $_REQUEST['leadopp_id']; ?>">
                                        <input type="hidden" name="tasktype" value="<?php echo $_REQUEST['tasktype']; ?>">
                                        <!-- <div class="row">
                                            <div class="form-group col-sm-12 d-flex">
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="customer_id" id="customer_id_3" data-placeholder="Select Company Name">
                                                        <?php
                                                        foreach ($customer_list as $value) {
                                                        ?>
                                                            <option value="<?= $value->customer_id ?>">
                                                                <?= $value->company_name ?> (<?= $value->contact_person_name1 ?>
                                                                / <?= $value->phone_no ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="product_id" id="product_id_3">
                                                        <?php foreach ($product_list as $value1) { ?>
                                                            <option value="<?= $value1->product_id ?>">
                                                                <?= $value1->product_name ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            $user_sess_type = $this->session->user_type;
                                            if ($this->session->user_type != "SA") {
                                                // echo "1";
                                                $emp_id = $this->session->id;
                                                $name_emp = $this->session->name;
                                            } else {
                                                // echo "2";
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
                                                    <select class="form-control" name="employee_id" id="employee_id_3" onchange="getassignedissueChange12()">
                                                        <?php
                                                        foreach ($employee_list as $value2) {
                                                            $all_emp_id = $value2->id;
                                                            if ($all_emp_id == $emp_id) { ?>
                                                                <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?>
                                                                </option>
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
                                                    <select class="form-control" name="schedule_type_id" id="schedule_type_id_3" data-placeholder="Select Schedule Type">
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
                                                            <select class="select-search" name="user_id[]" id="user_id" multiple data-placeholder="Select Company">
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
                                                            <select class="form-control" name="reminder_before_time" id="reminder_before_time_5" data-placeholder="Select Company">
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
                                                            <select class="form-control" name="reminder_notify_by" id="reminder_notify_by_5" data-placeholder="Select Notify By">
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
                                                            <select class="form-control" name="recurring_set" id="recurring_set_5" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                                                        <select class="form-control" name="interval_type" id="interval_type_5" data-placeholder="Select Recurring Interval">
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
                                        </div> -->



                                        <div class="row">
                                            <div class="form-group col-sm-12 d-flex">

                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="customer_id" id="customer_id_3" data-placeholder="Select Company Name">
                                                        <?php
                                                        foreach ($customer_list as $value) {
                                                        ?>
                                                            <option value="<?= $value->customer_id ?>">
                                                                <?= $value->company_name ?> (<?= $value->contact_person_name1 ?>
                                                                / <?= $value->phone_no ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Resource <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="employee_id" id="employee_id_3" onchange="getassignedissueChange12()" data-placeholder="Select Resource">
                                                        <?php
                                                        foreach ($employee_list as $value2) {
                                                            $all_emp_id = $value2->id;
                                                            if ($all_emp_id == $emp_id) { ?>
                                                                <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 d-flex">

                                                <label class="control-label col-sm-2" for="Youtube" style="margin:10px auto auto auto">Product Name <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="product_id" id="product_id_3" data-placeholder="Select Product">
                                                        <?php foreach ($product_list as $value1) { ?>
                                                            <option value="<?= $value1->product_id ?>">
                                                                <?= $value1->product_name ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <label class="control-label col-sm-2" for="email" style="margin:10px auto auto auto">Comments <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control" rows="1" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                                                </div>

                                            </div>

                                            <div class="col-sm-12 form-group d-flex">

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
                                                    <select class="form-control" name="schedule_type_id" id="schedule_type_id_3" data-placeholder="Select Schedule Type">
                                                        <option value="">Select Schedule Type</option>
                                                        <?php foreach ($schedule_visit_list as $st_value) { ?>
                                                            <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-sm-12 form-group d-flex">

                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                                <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input type="text" class="form-control" id="schedule_start_time_schedule_crm" name="schedule_start_time" value="" placeholder="Please select start time" autocomplete="off" readonly>
                                                    <span id="err3" style="color:red; font-size: 12px;"></span>
                                                </div>
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
                                                <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input type="text" class="form-control" id="schedule_end_time_schedule_crm" name="schedule_end_time" value="" placeholder="Please select end time" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off" readonly>
                                                    <span id="err4" style="color:red; font-size: 12px;"></span>
                                                </div>

                                            </div>

                                            <div class="form-group col-sm-12 d-flex">
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="priority_id" id="priority_id_3" data-placeholder="Select Priority">
                                                        <option value="">Select Priority</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Low">Low</option>
                                                        <option value="High">High</option>
                                                    </select>
                                                </div>
                                                <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="status" id="status_3" data-placeholder="Select Status">
                                                        <option value="">Select Status</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Inprogress">In-progress</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 pl-3">
                                                <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1">
                                                <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                            </div>
                                            <div class="reminderSetting col-sm-12" style="display: none;">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label col-sm-12" for="email">User <span style="color: red;">*</span></label>
                                                        <div class="col-sm-12">
                                                            <select class="select-search" name="user_id[]" id="user_id" multiple data-placeholder="Select User">
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
                                                            <select class="form-control" name="reminder_before_time" id="reminder_before_time_5" data-placeholder="Select Reminder Before Time">
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
                                                        <label class="control-label col-sm-12" for="email">Notify By </label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_by_5" data-placeholder="Select Notify By">
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
                                                            <select class="form-control" name="recurring_set" id="recurring_set_5" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                                                        <select class="form-control" name="interval_type" id="interval_type_5" data-placeholder="Select Recurring Interval">
                                                            <option value="">Select Recurring Interval</option>
                                                            <!-- <option value="day">Day</option>
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
                                                    <label class="control-label col-sm-12" for="email">Recurring EOD</label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                            </span>
                                                            <input type="text" class="form-control pickadate-selectors rounded-right" id="recurring_eod1" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off"  onchange="checkvalidationdate()">
                                                        </div>
                                                        <small id = 'error_recurring_eod' style="display:none; color: #f00 !important"> Recurring EOD can not be less than start date</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-12" style="text-align:right;">
                                                <button type="submit" class="btn btn-primary pull-right" id="task_sub_btn">
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

    </div>
    <?php $this->load->view('Admin/includes/n-footer');    ?>
    <script>
        $('#schedule_date').change(function() {
            $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_date');
        });

        $('#schedule_start_time_schedule_crm').change(function() {
            $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_start_time');
        });

        $('#schedule_end_time_schedule_crm').change(function() {
            $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_end_time');
        });

        function mainInfo1() {
            // alert();
            var start_date = $('#schedule_date').val();
            // alert(start_date);
            var startTime = document.getElementById("schedule_start_time").value;
            // alert(startTime);
            var endTime = document.getElementById("schedule_end_time").value;
            // alert(endTime);
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
            // alert(someFormattedDate);
            if ((Date.parse(start_date) == Date.parse(someFormattedDate))) {
                var now = new Date();
                var curr_time = now.getHours() + ':' + now.getMinutes();
                // alert(curr_time);
                // alert(startTime);
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
        $(document).ready(function() {
            // $('#schedule_model').modal('show');
            $("#schedule_model").modal({
                backdrop: "static"
            });
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
                                message: 'Please Select Resource'
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
                    // 'reminder_notify_by[]': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please Select Notify By'
                    //         }
                    //     }
                    // },
                }
            });
            
        });
        $(document).ready(function(e) {

            $("#schedule_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
                    );
                    var formresult = new FormData(this);
                    object= {}
                    formresult.forEach((value, key) => object[key] = value);
                    // alert('got here');
                    var txt = JSON.stringify(object);
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/AddTask'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview").hide();
                            // alert(data);
                            // $('#user_model_data123').html(data);
                            if (data == 1 || data == 11) {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Add Activity',
                                    //     text: 'Activity Added Successfully',
                                    //     type: 'success'
                                    // });
                                    $("#schedule_model").modal('hide');
                                    $("#successModal").modal('show');
                                });

                                // setTimeout(function() {
                                //     window.location =
                                //         "<?php echo base_url('admin/Leads/ViewDetails?leadopp_id=') ?><?= $_REQUEST['leadopp_id']; ?>";
                                // }, 1000);
                            } else if (data == 2) 
                            {
                                $(function() 
                                {
                                    $("#scheduleModal").modal('show');
                                    $("input[name=formdata]").val(txt);
                                });
                            }
                            //     var notice = new PNotify({
                            //         title: 'Confirmation',
                            //         text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
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
                            //         $.ajax({
                            //             url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                            //             type: "POST",
                            //             data: formresult,
                            //             contentType: false,
                            //             cache: false,
                            //             processData: false,
                            //             success: function(
                            //                 data) {
                            //                 // alert(data);
                            //                 $(function() {
                            //                     new PNotify
                            //                         ({
                            //                             title: 'Add Activity',
                            //                             text: 'Activity Added Successfully',
                            //                             type: 'success'
                            //                         });
                            //                 });

                            //                 setTimeout(
                            //                     function() {
                            //                         window
                            //                             .location =
                            //                             "<?php echo base_url('admin/Leads/ViewDetails?leadopp_id=') ?><?= $_REQUEST['leadopp_id']; ?>";
                            //                     }, 800);

                            //             },
                            //             error: function() {
                            //                 alert(
                            //                     'Error while request..'
                            //                 );
                            //             }
                            //         });
                            //     })
                            //     // On cancel
                            //     notice.get().on('pnotify.cancel', function() {
                            //         // alert('Oh ok. Chicken, I see.');
                            //     });
                            // }

                        },
                        error: function() {
                            $('#alertModal').modal('show');
                        }
                    });
                }
                return false;

            }));
        });
    </script>
    <script type="text/javascript">
        $('#customer_id_3').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#product_id_3').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#employee_id_3').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#schedule_type_id_3').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#reminder_before_time_5').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#reminder_notify_by_5').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#recurring_set_5').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#interval_type_5').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#priority_id_3').select2({
            dropdownParent: $("#schedule_model")
        });
        $('#status_3').select2({
            dropdownParent: $("#schedule_model")
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

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?><?= $_REQUEST['leadopp_id']; ?>">
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?><?= $_REQUEST['leadopp_id']; ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function checkvalidationdate()
        {
            var schedule_date = new Date($('#schedule_date').val());
            var recurring_eod = new Date($('#recurring_eod1').val());
            
            if (schedule_date > recurring_eod) 
            {
                $('#error_recurring_eod').css('display','block');
                $("#task_sub_btn").attr('disabled', true);
            }
            else
            {
                $('#error_recurring_eod').css('display','none');
                $("#task_sub_btn").attr('disabled', false);
            }
        } 
</script>