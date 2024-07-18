<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
<style>
    .select2-selection__rendered{
        width: 100% !important;
    }
    .reminder-module-type{
        background: #fff !important;
        font-size: 14px !important;
        color: #333333;
        padding: 0;
    }
</style>

<!-- <?php if ($editschedule['user_name'] == 'Na') {   ?>
        <div class="panel-body reminder-panel">  
            <div class="form-group reminder-module-type" >
                <label class="control-label col-sm-3" for="email" style="font-weight: 400"> Module Type: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $editschedule['module_name'] ?>" readonly>
                </div>
            </div>
        </div>
    <?php   }else { ?>
        <div class="panel-body reminder-panel" >  
            <div class="form-group reminder-module-type">
                <label class="control-label col-sm-7" for="email" style="font-weight: 400"> Module Type: (<?= $editschedule['module_name'] ?>)</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" value="<?= $editschedule['user_name'] ?>" readonly>
                </div>
            </div>
        </div>  
    <?php      }    ?> -->

    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card" style="margin-bottom:20px;">
        <?php if ($editschedule['user_name'] == 'Na') {   ?>
            <h6 class="card-title py-sm-4 card-headings">Edit Reminder (<?= $editschedule['module_name'] ?>)</h6>
        <?php   }else { ?>
            <h6 class="card-title py-sm-4 card-headings">Edit Reminder (<?= $editschedule['user_name'] ?>)</h6>
        <?php      }    ?>
        <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">×</button>
    </div>
    <form class="form-horizontal" id="EditReminder" style="padding-left: 15px;padding-right: 15px;">
        <input type="hidden" class="form-control" id="reminder_id" name="reminder_id" value="<?= $editschedule['reminder_id'] ?>">
        <input type="hidden" class="form-control" id="recurring_id" name="recurring_id" value="<?= $editschedule['recurring_id'] ?>">
        <input type="hidden" class="form-control" id="module_name" name="module_name" value="<?= $editschedule['module_name'] ?>">
        <input type="hidden" class="form-control" id="edit_interval_type" name="edit_interval_type" value="<?= $editschedule['interval_type'] ?>">
        <div class="row">
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Title <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="reminder_title" name="reminder_title" placeholder="Enter Title" maxlength="50" value="<?= $editschedule['reminder_title'] ?>" readonly>
                </div>
            </div>

            <div class="form-group col-6">
                
                <label class="control-label col-sm-12" for="email">User </label>
                <div class="col-sm-12">
                    <select class="form-control" name="user_id[]" id="edit_rmd_user_id" data-placeholder="Select User" multiple>
                        <!-- <option value="">Select User</option> -->
                        <?php
                        $ids = explode(',', $editschedule['recurring_user_id']);
                        foreach ($getUserSysyemList as $value1) {
                            $user_id = $value1->id;
                            if (in_array($user_id, $ids)) {
                        ?>
                            <option value="<?= $user_id ?>" selected><?= $value1->name ?></option>
                        <?php   } else { ?>
                            <option value="<?= $user_id ?>"><?= $value1->name ?></option>
                        <?php   }   }    ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Date <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                        </span>
                        <input type="text" class="form-control pickadate-selectors rounded-right" class="form-control schedule_date_select" id="reminder_date" name="recurring_date" value="<?= date('d M, Y', strtotime($editschedule['recurring_rem_date'])); ?>" placeholder="Enter Date" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Time <span style="color: red;">*</span></label>
                <div class="col-sm-12 clearfix" >
                    <div class="input-group edit_clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                        <!-- <span class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        </span> -->
                        <input type="text" class="form-control" id="reminder_time" name="reminder_time" placeholder="Enter Time" autocomplete="off" value="<?= date('H:i', strtotime($editschedule['recurring_rem_time'])); ?>" readonly> 
                    </div>
                </div>
            </div>

            
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Before Time <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control" name="reminder_before_time" id="reminder_before_time_3" data-placeholder="Select Before Time">
                        <option value="">Select Before Time</option>
                        <?php foreach ($getTimeSlot as $RBT) { ?>
                            <option value="<?= $RBT->time_slot ?>" <?= $rbt = ($editschedule['reminder_before_time'] == $RBT->time_slot.':00') ? 'selected' : '' ?> ><?= $RBT->time_slot ?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_by_3" data-placeholder="Select Notify By">
                        <option value="">Select Notify By</option>
                        <!-- <?php foreach ($getNotifyBy as $value) { ?>
                            <option value="<?= $value->notify_id ?>" <?= $rbt = ($editschedule['notify_id'] == $value->notify_id) ? 'selected' : '' ?> ><?= $value->notify_by ?></option>
                        <?php  } ?> -->
                        <?php
                        $notify_ids = explode(',', $editschedule['notify_id']);
                        foreach ($getNotifyBy as $value) {
                            $notify_id = $value->notify_id;
                            if (in_array($notify_id, $notify_ids)) {
                        ?>
                            <option value="<?= $notify_id ?>" selected><?= $value->notify_by ?></option>
                        <?php   } else { ?>
                            <option value="<?= $notify_id ?>"><?= $value->notify_by ?></option>
                        <?php   }   }    ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Comments <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="1" id="reminder_note" name="reminder_note" placeholder="Enter Comments" maxlength="500" readonly><?= $editschedule['reminder_note'] ?></textarea>
                </div>
            </div>
                            
            <div class="form-group col-6">
                <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control" name="edit_recurring_set" id="edit_recurring_set_3" onchange="showEditDataRecurring(this.value)" disabled>
                        <option value="">Select Recurring</option>
                        <option value="0" <?= $rbt = ($editschedule['recurring_set'] == 0) ? 'selected' : '' ?> >No</option>
                        <option value="1" <?= $rbt = ($editschedule['recurring_set'] == 1) ? 'selected' : '' ?> >Yes</option>
                    </select>
                </div>
            </div>
            <?php
                if ($editschedule['recurring_set'] == 1) {
                    $style = 'display: contents';
                }else {
                    $style = 'display: none';
                }
            ?>
            <div id="edit_recuuring_data" style="<?= $style ?>;clear:both">
                <div class="form-group col-6">
                    <label class="control-label col-sm-12" for="email">Recurring Interval </label>
                    <div class="col-sm-12">
                        <select class="form-control" name="interval_type" id="interval_type_3" disabled>
                            <option value="">Select Recurring Interval</option>
                            <option value="day" <?= $rbt = ($editschedule['interval_type'] == 'day') ? 'selected' : '' ?> >Day</option>
                            <option value="week" <?= $rbt = ($editschedule['interval_type'] == 'week') ? 'selected' : '' ?> >Week</option>
                            <option value="fortnightly" <?= $rbt = ($editschedule['interval_type'] == 'fortnightly') ? 'selected' : '' ?> >Fortnightly</option>
                            <option value="monthly" <?= $rbt = ($editschedule['interval_type'] == 'monthly') ? 'selected' : '' ?> >Monthly</option>
                            <option value="quaterly" <?= $rbt = ($editschedule['interval_type'] == 'quaterly') ? 'selected' : '' ?> >Quaterly</option>
                            <option value="half-quarterly" <?= $rbt = ($editschedule['interval_type'] == 'half-quarterly') ? 'selected' : '' ?> >Half Quarterly</option>
                            <option value="year" <?= $rbt = ($editschedule['interval_type'] == 'year') ? 'selected' : '' ?>>Year</option>
                        </select>                       
                    </div>
                </div>
                <div class="form-group col-6">
                    <label class="control-label col-sm-12" for="email">Recurring EOD</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control pickadate-selectors rounded-right" id="edit_recurring_eod" name="edit_recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off" value="<?= date('d M Y', strtotime($editschedule['recurring_eod'])); ?>" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-12 " style="text-align:right;">
                <button type="submit" class="btn btn-primary  pull-right">Update&nbsp;<i class="icon-arrow-right14 position-right"></i> </button>
                <span id="preview"></span>
            </div>
        </div>

    </form>

<script type="text/javascript">
   
    function showEditDataRecurring(id){
        // if($('#edit_recurring_set').val() == 1){
        //     $('#edit_recuuring_data').show();
        // }else{
        //     $('#edit_recuuring_data').hide();
        // }
        if (id == 1) {
            $('#edit_recuuring_data').show();
            $('#edit_recuuring_data').css('display','contents');
        } else {
            $('#edit_recuuring_data').hide();
            $('#edit_recuuring_data').css('display','none');
        }
    }
    $(document).ready(function() {
        $("#edit_rmd_user_id").select2({
            dropdownParent: $("#modal_default1")
        });
    });

    $('#edit_recurring_data').change(function() {
        $('#EditReminder').bootstrapValidator('revalidateField', 'edit_recurring_data');
    });

    $('#reminder_time').change(function() {
        $('#EditReminder').bootstrapValidator('revalidateField', 'reminder_time');
    });
    $(document).ready(function() {
        $('.edit_clockpicker').clockpicker().find('input').change(function() {
            console.log(this.value);
        });
    });

    // $(document).ready(function() {
    //     $("#reminder_date").datepicker({
    //         dateFormat: "d MM yy",
    //         minDate: 0
    //     });
    // });

    $(document).ready(function() {
        $('#EditReminder').bootstrapValidator({
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
                            message: 'Please Enter Reminder Time'
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
                reminder_before_time:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                },
                reminder_note:{
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#EditReminder").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").show();
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var reminder_id = $('#reminder_id').val();
                $.ajax({
                    url: "<?php echo base_url('admin/Reminder/updateRecurringReminder'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Reminder Form',
                            //     text: 'Updated  Successfully',
                            //     type: 'success'
                            // });
                            
                            $("#UpdatesuccessModal").modal('show');
                            // $("#myURL").html(str1);
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url(); ?>admin/Reminder/view/"+reminder_id+"";
                        // }, 1000);


                    },
                    error: function() {
                        $("#updateErrorModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>
<script>
    $('#reminder_notify_by_3').select2({
        dropdownParent: $('#modal_default1')
    });
    $('#reminder_before_time_3').select2({
        dropdownParent: $('#modal_default1')
    });
    $('#interval_type_3').select2({
        dropdownParent: $('#modal_default1')
    });
    $('#edit_recurring_set_3').select2({
        dropdownParent: $('#modal_default1')
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
    $('.pickadate-selectors').pickadate({
        selectYears: 50,
        selectMonths: true
    });
</script>


<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
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