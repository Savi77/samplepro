<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>

<?php 

foreach ($edit_frequency_wise_report_data->result() as $value) 
{
    // echo "<pre>";
    // print_r($value);
    $start_date = date("d F, Y",strtotime($value->start_date));
    $end_date = date("d F, Y",strtotime($value->end_date));
    $schedule_time = date("H:i", strtotime($value->schedule_time));

?>
<form class="form-horizontal" id="EditForm" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="report_id" name="report_id" placeholder="Enter Language" value="<?= $value->report_type_id ?>">
    <div class="form-group">
        <label class="control-label col-sm-3 p-0" for="email">Frequency Type  <span style="color: red;">*</span></label>
        <div class="col-sm-12 p-0">
            <select name="freq_edit_value" id="freq_edit_value" data-placeholder="Select Frequency Type">
                <option value="">Select Frequency Type</option>
                <?php foreach ($freq_type as $row) { ?>
                    <option value="<?= $row->id ?>" <?= $rbt = ($row->id == $value->frquency_id) ? 'selected' : '' ?> ><?= $row->frequency_name ?></option>
                <?php  } ?>
            </select>
            <small id="error_freq_type" style="color: #f00 !important;"></small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 p-0" for="email">Report Type  <span style="color: red;">*</span></label>
        <div class="col-sm-12 p-0">
            <select name="report_edit_value" id="report_edit_value" data-placeholder="Select Report Type">
                <option value="">Select Report Type</option>

                <?php
                if($value->report_type == 'Product Lead')
                {
                ?>
                <option value="Product Lead" selected>Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Monthly Lead')
                {
                ?>
               <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead" selected>Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'User Lead')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead" selected>User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Sales Force Score')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score" selected>Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Sales Segment')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment" selected>Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Sales Product')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product" selected>Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Time Slot')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot" selected>Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Resource Task')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task" selected>Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Task Mapping')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping" selected>Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php   
                }
                else if($value->report_type == 'Target Overview')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview" selected>Target Overview</option>
                <option value="Task Today">Task Today</option>
                <?php
                }
                else if($value->report_type == 'Task Today')
                {
                ?>
                <option value="Product Lead">Product Lead</option>
                <option value="Monthly Lead">Monthly Lead</option>
                <option value="User Lead">User Lead</option>
                <option value="Sales Force Score">Sales Force Score</option>
                <option value="Sales Segment">Sales Segment</option>
                <option value="Sales Product">Sales Product</option>
                <option value="Time Slot">Time Slot</option>
                <option value="Resource Task">Resource Task</option>
                <option value="Task Mapping">Task Mapping</option>
                <option value="Target Overview">Target Overview</option>
                <option value="Task Today" selected>Task Today</option>
                <?php
                }
                ?>
            </select>
            <small id="error_report_type" style="color: #f00 !important;"></small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 p-0" for="email">Starting Date  <span style="color: red;">*</span></label>
        <div class="col-sm-12 p-0">
            <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date_report" id="start_date_report1" placeholder="Please Select Starting Date" autocomplete="off" value="<?= $start_date; ?>">
            <small id="error_start_date_report" style="color: #f00 !important;"></small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 p-0" for="email">Ending Date <span style="color: red;">*</span></label>
        <div class="col-sm-12 p-0">
            <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date_report" id="end_date_report1" placeholder="Please Select Ending Date" autocomplete="off"  value="<?= $end_date; ?>" onchange="checkvalidationdate()">
            <small id="error_end_date_report123" style="display:none; color: #f00 !important;">Ending date can not be less than starting date</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 p-0" for="email">Schedule Time  <span style="color: red;">*</span></label>
        <div class="col-sm-12 p-0 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
            <input type="text" class="form-control" id="schedule_time" name="schedule_time" placeholder="Select Schedule Time"  autocomplete="off"  value="<?= $schedule_time; ?>" readonly>
            <span id="error_schedule_time" style="color:red; font-size: 12px;"></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom:0;">
        <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
            <button type="submit" class="btn btn-primary pull-right" id="frequency_type_sub_btn123">Update <i class="icon-arrow-right14 position-right"></i></button>
        </div>
    </div>
</form>
<?php } ?>
<script>
    $('.pickadate-selectors').pickadate({
        selectYears: 50,
        selectMonths: true
    });
</script>

<script>
    $('#freq_edit_value').select2({
        tags: true,
		dropdownParent: $("#MyeditForm")
    });
    $('#report_edit_value').select2({
            tags: true,
            dropdownParent: $("#MyeditForm")
    });
</script>

<script>
    $('#start_date_report1').change(function() {
        $('#EditForm').bootstrapValidator('revalidateField', 'start_date_report');
    });
    $('#end_date_report1').change(function() {
        $('#EditForm').bootstrapValidator('revalidateField', 'end_date_report');
    });

    $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });

    $('#schedule_time').change(function() {
        $('#EditForm').bootstrapValidator('revalidateField', 'schedule_time');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                freq_edit_value: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Frequency Type'
                        }
                    }
                },
                report_edit_value: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Report Type'
                        }
                    }
                },
                start_date_report: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Starting Date'
                        }
                    }
                },
                end_date_report: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Ending Date'
                        }
                    }
                },
                schedule_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Schedule Time'
                        }
                    }
                },
            }
        });
    });
    $(document).ready(function(e) {
        $("#EditForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Master/updateFreqwisereportType'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $(function() {
                            // new PNotify({
                            //     title: 'Register Form',
                            //     text: 'Updated Successfully',
                            //     type: 'success'
                            // });
                            $("#UpdatesuccessModal").modal('show');

                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Master/NotifyBy'); ?>";
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

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Frequency Wise Report Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/FrequencywiseReport'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
                <a href="<?php echo base_url('admin/Master/FrequencywiseReport'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>
<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date_report1').val());
            var end_date = new Date($('#end_date_report1').val());

            if (start_date > end_date) 
            {
                $('#error_end_date_report123').css('display','block');
                $("#frequency_type_sub_btn123").attr('disabled', true);
            }
            else
            {
                $('#error_end_date_report123').css('display','none');
                $("#frequency_type_sub_btn123").attr('disabled', false);
            }
        } 
</script>
