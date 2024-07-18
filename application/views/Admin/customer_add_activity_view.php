<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>new-assets/golbal_assets/js/demo-pages/form_multiselect.js"></script>
<!-- <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script> -->

<style>
    .ui-datepicker:not(.ui-datepicker-inline) {
        display: none !important;
    }
    .select2-container .select2-search--inline .select2-search__field {
        background: #0000;
        border: none;
        outline: 0;
        box-shadow: none;
        -webkit-appearance: textfield;
        width: 100% !important;
    }
    
    /* #schedule_form .form-group{
        align-items: center !important;
    } */
    #schedule_form .form-group label{
        margin-top: 10px !important;
    }
   
    .select2-results .select2-results__options li:nth-child(1) {
        display: block !important;
    }
</style>
<?php
    $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
?>
<div class="panel panel-flat">
    <div class="panel-body">
        <div class="col-md-12">
            <form class="form-horizontal" id="schedule_form" method = "post">
                <div class="row">
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <?php
                            $company_name = $this->db->select('company_name')->from('tbl_customer')->where('customer_id',$customer_id)->get()->row()->company_name;
                            ?>
                            <input class="form-control" type="text" name="customer_id" value="<?= $company_name; ?>" readonly>
                        </div>

                        <label class="control-label col-sm-2 m-auto" for="Youtube">Resource Name <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="employee_id" id="employee_identity" data-placeholder="Select Resource">
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

                    <!-- <?php
                    $user_sess_type = $this->session->user_type;
                    if ($this->session->user_type != "SA") {
                        $emp_id = $this->session->id;
                        $name_emp = $this->session->name;
                    } else {
                        $emp_id = '';
                    }
                    ?> -->
                    <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="product_id" id="productIdentity" data-placeholder="Select Product">
                                <option value="">Select Product</option>
                                <?php
                                foreach ($product_list as $value1) { ?>
                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <label class="control-label col-sm-2 m-auto" for="email">Comments <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <textarea class="form-control" rows="1" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
                        </div>                        
                    </div>


                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control add-activity-selectors rounded-right" id="contact_schedule_date" name="schedule_date" value="<?= date('d F, Y'); ?>" placeholder="Enter Schedule Date" autocomplete="off" onchange="getassignedissueChange12()">
                            </div>
                        </div>
                        <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="schedule_type_id" id="schedule_type_identity" data-placeholder="Select Schedule Type">
                                <option value="">Select Schedule Type</option>
                                <?php foreach ($schedule_visit_list as $st_value) { ?>
                                    <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                <?php  } ?>
                            </select>
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
                        <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="priority_id" id="priority_identity" data-placeholder="Select Priority">
                                <option value="">Select Priority</option>
                                <option value="Normal">Normal</option>
                                <option value="Low">Low</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status_identity" data-placeholder="Select Status">
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
                                    <select class="form-control" name="user_id[]" id="edit_add_user_id" data-placeholder="Select User" multiple>
                                        <option value="">Select User</option>
                                        <?php foreach ($getUserSysyemList as $value1) {   ?>
                                            <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                        <?php   }    ?>
                                    </select>
                                    <small id="userchk"style="color: red; font-size: 80%; font-weight: 400; display: none;" >Please Select User</small>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-12" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="reminder_before_time" id="remainderBeforeTime2" data-placeholder="Select Reminder Before Time">
                                        <option value="">Select Reminder Before Time</option>
                                        <?php foreach ($getTimeSlot as $value) { ?>
                                            <!-- <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option> -->
                                            <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                                <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control" multiple name="reminder_notify_by[]" id="remainderNotifyBy" data-placeholder="Select Notify By">
                                        <option value="">Select Notify By</option>
                                        <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                        <?php foreach ($getNotifyBy as $value) { ?>
                                            <!-- <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option> -->
                                            <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
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
                                    <select class="form-control" name="recurring_set" id="recurring_set_type1" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                            <label class="control-label col-sm-12" for="email">Recurring Interval <span style="color: red;">*</span></label>
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
                        <div class="form-group col-sm-6">
                            <label class="control-label col-sm-12" for="email">Recurring EOD <span style="color: red;">*</span></label>
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
<script>
    $('.pickadate-selectors').pickadate({
            selectYears: 100,
            selectMonths: true
        });
</script>
<script>
    $(document).ready(function() {
        $("#customer_id").select2({
            dropdownParent: $('#schedule_model')
        });
        $("#priority_identity").select2({
            dropdownParent: $('#schedule_model')
        });
        $("#status_identity").select2({
            dropdownParent: $('#schedule_model')
        });
        $('#employee_identity').select2({
            dropdownParent: $("#schedule_model")
        });
        $("#productIdentity").select2({
            dropdownParent: $('#schedule_model')
        });
        $("#schedule_type_identity").select2({
            dropdownParent: $('#schedule_model')
        });

        $("#remainderBeforeTime2").select2({
            dropdownParent: $('#schedule_model')
        });
        $("#remainderNotifyBy").select2({
            dropdownParent: $('#schedule_model')
        });
        $('#edit_add_user_id').select2({
            tags: true,
            dropdownParent: $("#schedule_model")
        });
        
        $('#recurring_set_type1').select2({
            tags: true,
            dropdownParent: $("#schedule_model")
        });
        
        $('#interval_type_2').select2({
            tags: true,
            dropdownParent: $("#schedule_model")
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
        
    });

    var max = new Date();
    $('#contact_schedule_date').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: 100,
        min: max
    })

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
            $('#edit_add_user_id').val("");
            $('#remainderBeforeTime2').val("");
            $('#reminder_note').val('');
        }
    });
</script>
<script>
    function getassignedissue() {
        schedule_date = $('#contact_schedule_date').val();
        employee_id = $('#employee_identity').val();
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

    $('#schedule_date').on('dp.change', function(e) {
        var schedule_date = $('#contact_schedule_date').val();
        employee_id = $('#employee_identity').val();
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

    $('#contact_schedule_date').change(function() {
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
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });

    $(document).ready(function() {
        $("#contact_schedule_date").datepicker({
            dateFormat: "d MM yy",
            minDate: 0
        });
    });
</script>

<script type="text/javascript">
    function mainInfo1() {
        var start_date = $('#contact_schedule_date').val();
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
            if (startTime >= curr_time) 
            {
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
            // else 
            // {
            //     $('#desktopbutton').prop('disabled', true);
            //     new PNotify({
            //         title: 'Schedule',
            //         text: 'Selected timing is less then current time',
            //         type: 'warning'
            //     });
            // }
        } 
        // else {
        //     var now = new Date();
        //     var curr_time = now.getHours() + ':' + now.getMinutes();
        //     if (startTime >= endTime) {
        //         $('#desktopbutton').prop('disabled', true);
        //         new PNotify({
        //             title: 'Schedule',
        //             text: 'End time should be greater than Start time',
        //             type: 'warning'
        //         });

        //     } else {
        //         $('#desktopbutton').prop('disabled', false);
        //     }
        // }
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

                query: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Comments'
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

                // emailid: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Email is required.'
                //         },
                //         regexp: {
                //             regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                //             message: 'The value is not a valid email address'
                //         }
                //     }
                // },
                user_id:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select User'
                        }
                    }
                },
                reminder_before_time:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time'
                        }
                    }
                },
                reminder_notify_by:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select Notify By'
                        }
                    }
                },
                reminder_note:{
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Note'
                        }
                    }
                },
                recurring_set:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring'
                        }
                    }
                },
                interval_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring Interval'
                        }
                    }
                },
                recurring_eod: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Recurring EOD'
                        }
                    } 
                }

            }
        });
    });
</script>

<script>
    
    $(document).on('change','#edit_add_user_id',function()
    {
        $("#userchk").hide();
        $("#desktopbutton").attr('disabled', false);
        $("#desktopbutton").attr('enable', enable);
    });
</script>


<script type="text/javascript">
    $(document).ready(function(e) {

        $("#schedule_form").on('submit', (function(e) {
            if($('#edit_add_user_id').val() == '')
            {
                $("#userchk").show();  
            }
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);
                var formresult = new FormData(this);
                object= {}
                formresult.forEach((value, key) => object[key] = value);
                var txt = JSON.stringify(object);
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
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $('#schedule_form').modal('hide');
                                $('#successModalAddactiviy').modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                            // }, 1000);
                        } 
                        else if (data == 2) 
                        {
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

                            // // On confirm
                            // notice.get().on('pnotify.confirm', function() {
                            //     $.ajax({
                            //         url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                            //         type: "POST",
                            //         data: formresult,
                            //         contentType: false,
                            //         cache: false,
                            //         processData: false,
                            //         success: function(data) {
                            //             // alert(data);
                            //             $(function() {
                            //                 new PNotify({
                            //                     title: 'Add Schedule',
                            //                     text: 'Schedule Submited Successfully',
                            //                     type: 'success'
                            //                 });
                            //             });

                            //             setTimeout(function() {
                            //                 window.location = "<?php echo base_url('admin/Customer'); ?>";
                            //             }, 800);


                            //         },
                            //         error: function() {
                            //             alert('Error while request..');
                            //         }
                            //     });
                            // })
                            // // On cancel
                            // notice.get().on('pnotify.cancel', function() {
                            //     // alert('Oh ok. Chicken, I see.');
                            // });
                        }
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

<div class="modal fade" id="successModalAddactiviy" tabindex="-1" aria-labelledby="successModalAddactiviyLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalAddactiviyLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Task Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Customer'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px;text-align: center;">Task is already assigned on this time. Shall we proceed with overlapping this task?</div>
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
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $("#schedule_addForm_overwrite").on('submit', (function(e) {
            if (e.isDefaultPrevented()) {
               
            } 
            else 
            {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $("#preview").hide();
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
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                // $("#schedule_model").modal('hide');
                                // $("#scheduleModal").modal('hide');
                                $("#successModalAddactiviy").modal('show');
                            });
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
        }));
    });
</script>
<script>
    function getassignedissueChange12() {
        contact_schedule_date = $('#contact_schedule_date').val();
        employee_id = $('#employee_identity').val();
        if (employee_id != '') {
            var datastring = 'contact_schedule_date=' + contact_schedule_date + '&employee_id=' + employee_id;
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
    };
</script>

