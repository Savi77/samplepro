<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
<style>
    /* .select2-container .select2-search--inline .select2-search__field {
        background: #0000;
        border: none;
        outline: 0;
        box-shadow: none;
        -webkit-appearance: textfield;
        width: 100% !important;
    } */
    .ui-datepicker:not(.ui-datepicker-inline) {
        display: none !important;
    }
    /* #addReminderContact .form-group{
        align-items: center !important;
    }
    #addReminderContact .form-group label{
        margin-bottom: 0px !important;
    } */
    #addReminderContact .form-group label{
        margin-top: 10px !important;
    }
    /* .select2-search__field
    span.select2.select2-container.select2-container--default .select2-selection__rendered .select2-search .select2-search__field{
        width: 100% !important;
    } */
    .select2-results .select2-results__options li:nth-child(1) {
        display: block !important;
    }
    /* #reminder_notify_by .select2-selection__choice{
        display: table-cell !important;
    }
    #reminder_notify_by ul.select2-selection__rendered{
        display: -webkit-box !important;
    } */
    
</style>
<?php
  $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
?>
<div class="panel-flat">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="addReminderContact" method="POST"> 
                <input type="hidden" name="recd_id" id="recd_id" value="<?= $customerId ?>">
                <input type="hidden" name="module_name" id="module_name" value="Contact">
                <div class="row">
                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Reminder Title <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="reminder_title" name="reminder_title" placeholder="Enter Reminder Title" maxlength="50" >
                        </div>
                    </div>

                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Reminder Date <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar black-clr"></i></span>
                                </span>
                                <input type="text" class="form-control" id="reminder_date" name="reminder_date" value="<?= date('d F, Y') ?>" placeholder="Enter Reminder Date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Reminder Time <span style="color: red;">*</span></label>
                        <div class="col-sm-8 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control" id="reminder_time" name="reminder_time" value="" placeholder="Select Reminder Time" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">User <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <!-- <select class="form-control select2" placeholder="Select User" name="user_id[]" id="edit_rmd_user_id" multiple> -->
                            <select class="form-control select-search select2" name="user_id[]" id="edit_rmd_user_id" multiple="multiple" data-placeholder="Select User">
                                <option value="">Select User</option>
                                <?php   foreach ($getUserSysyemList as $value1) {   ?>
                                    <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                <?php   }    ?>
                            </select>
                            <small id="userchk"style="color: red; font-size: 80%; font-weight: 400; display: none;" >Please Select User</small>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="reminder_before_time" id="reminderBeforeTime" data-placeholder="Select Reminder Before Time">
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
                    <div class="form-group col-sm-6 d-flex">
                        <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                        <label class="control-label col-sm-4" for="email">Notify By <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_by" data-placeholder="Select Notify By">
                                <option value="">Select Notify By</option>
                                <!-- <?php foreach ($getNotifyBy as $value) { ?>
                                    <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                                <?php  } ?> -->

                                <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                <?php foreach ($getNotifyBy as $value) { ?>
                                    <option  value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Notes <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Notes" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 d-flex">
                        <label class="control-label col-sm-4" for="email">Recurring <span style="color: red;">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="recurring_set" id="recurring_set_type2" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
                                <option value="">Select Recurring</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="recuuringClass col-sm-12" id="recuuringData" style="display: none;clear:both;">
                        <div class="form-group col-sm-6 d-flex">
                            <label class="control-label col-sm-4" for="email" style="padding-left: 0px;">Recurring Interval <span style="color: red;">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="interval_type" id="intervalTypes" data-placeholder="Select Recurring Interval">
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
                        <div class="form-group col-sm-6 d-flex">
                            <label class="control-label col-sm-4" for="email">Recurring EOD <span style="color: red;">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar black-clr"></i></span>
                                    </span>
                                    <input type="text" class="form-control" id="add_recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 d-flex">
                        <div class="col-md-offset-2 col-md-12" style="text-align:right;">
                            <button type="submit" class="btn btn-primary  pull-right" id="desktopbutton">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i> </button>
                            <span id="preview"></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    $(document).on('change','#edit_rmd_user_id',function()
    {
        $("#userchk").hide();
        $("#desktopbutton").attr('disabled', false);
        $("#desktopbutton").attr('enable', enable);
    });
</script>

<script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });
    // $('#reminder_date').pickadate({
    //     labelMonthNext: 'Go to the next month',
    //     labelMonthPrev: 'Go to the previous month',
    //     labelMonthSelect: 'Pick a month from the dropdown',
    //     labelYearSelect: 'Pick a year from the dropdown',
    //     selectMonths: true,
    //     selectYears: 100
    // })
    $('#add_recurring_eod').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: true
    }) 

    var max = new Date();
        $('#reminder_date').pickadate({
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectYears: 100,
            selectMonths: true,
            min: max,
        });


    function showDataRecurring(id){
        // if(id == 1){
        //     $('.recuuringClass').show();
        // }else{
        //     $('.recuuringClass').hide();
        // }
        if (id == 1) {
            $('.recuuringClass').css('display','flex');
        } else {
            $('.recuuringClass').css('display','none');
        }
    }
    $(document).ready(function() {
        $("#edit_rmd_user_id").select2({
            dropdownParent: $("#reminder_model")
        });

        $("#reminderBeforeTime").select2({
            dropdownParent: $("#reminder_model")
        });
        $("#intervalTypes").select2({
            dropdownParent: $("#reminder_model")
        });
        
        $("#recurring_set_type2").select2({
            dropdownParent: $("#reminder_model")
        });
        $(' #reminder_notify_by').select2({
            dropdownParent: $("#reminder_model"),
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

    $('#add_recurring_eod').change(function() {
        $('#addReminderContact').bootstrapValidator('revalidateField', 'add_recurring_eod');
    });

    $('#edit_reminder_date').change(function() {
        $('#addReminderContact').bootstrapValidator('revalidateField', 'edit_reminder_date');
    });

    $('#reminder_time').change(function() {
        $('#addReminderContact').bootstrapValidator('revalidateField', 'reminder_time');
    });

    $(document).ready(function() {
        $('#edit_reminder_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
    });

    $(document).ready(function() {
        $('#addReminderContact').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                reminder_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Reminder Date'
                        }
                    }
                },
                reminder_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Time'
                        }
                    }
                },
                reminder_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Reminder Title'
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
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Notify By'
                        }
                    }
                },
                recurring_set: {
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
                add_recurring_eod: {
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

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#addReminderContact").on('submit', (function(e) {
            //e.preventDefault();
            if($('#edit_rmd_user_id').val() == '')
            {
                $("#userchk").show();  
            }
            if (e.isDefaultPrevented()) {
                // alert('invalids');
            } else {
                $("#preview").show();
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                $.ajax({
                    url: "<?php echo base_url('admin/Customer/addCustomerReminder'); ?>",
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
                            //     text: 'Added Successfully',
                            //     type: 'success'
                            // });
                            // $('#reminder_model').modal('hide');
                            $('#successModalAddreminder').modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Reminder'); ?>";
                        // }, 1000);


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

<div class="modal fade" id="successModalAddreminder" tabindex="-1" aria-labelledby="successModalAddreminderLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalAddreminderLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
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