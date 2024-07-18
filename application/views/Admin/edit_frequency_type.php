<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>

<?php foreach ($edit_frequency_type_data->result() as $value) {   ?>
    <form class="form-horizontal" id="EditData" method="POST">
        <input type="hidden" class="form-control" id="freq_id" name="freq_id" value="<?= $value->id ?>">

        <div class="form-group">
            <label class="control-label col-sm-12" for="email">Frequency Name <span style="color: red;">*</span></label>
            <div class="col-sm-12 ">
                <input type="text" class="form-control" id="edit_freq_name" name="edit_freq_name" placeholder="Enter Freqency Name" onkeyup="chk_freq_type_edit()" value="<?=$value->frequency_name;?>">
                <small id="error_freq_type123" style="color: #f00 !important;"></small>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-12" for="email">Frequency Set<sup style="color: red">*</sup></label>
            <div class="col-sm-12 ">
                <div class="d-flex align-items-center" style="max-width:98%"> 
                
                    <!-- <input type="number" class="form-control mr-3" value="<?= $value->frequency_number;?>" name = "edit_freq_no" id="edit_freq_no" style="width: 65px"/> -->
                    <input type="hidden" class="form-control" id="freq_id123" name="freq_id123" value="<?= $value->id ?>">
                    <select name="edit_freq_type" id="edit_freq_type" data-placeholder="Select Frequency Type" onchange="chk_freq_type_name_edit()">
                        <?php
                        if($value->frequency_type == 'daily')
                        {
                        ?>
                        <option value="">Select Frequency Type</option>
                        <option value="daily" selected>Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                        <?php
                        }
                        else if($value->frequency_type == 'weekly')
                        {
                        ?>
                        <option value="">Select Frequency Type</option>
                        <option value="daily">Daily</option>
                        <option value="weekly" selected>Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                        <?php
                        }
                        else if($value->frequency_type == 'monthly')
                        {
                        ?>
                        <option value="">Select Frequency Type</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly" selected>Monthly</option>
                        <option value="yearly">Yearly</option>
                        <?php
                        }
                        else
                        {
                        ?>
                        <option value="">Select Frequency Type</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly" selected>Yearly</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <small id="error_freq_type_name123" style="color: #f00 !important;"></small>
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
    $('#edit_freq_type').select2({
        tags: true,
		dropdownParent: $("#addTimeSlotModule")
   });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditData').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                edit_freq_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Frequency Name'
                        }
                    }
                },
                edit_freq_no: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Frequency Number'
                        }
                    }
                },
                edit_freq_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Frequency Type'
                        }
                    }
                }
            }
        });
    });
    $(document).ready(function(e) {
        $("#EditData").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Master/updateFreqType'); ?>",
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Frequency Type Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/FrequencyType'); ?>">
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
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>
<script>
    function chk_freq_type_edit()
    {
        
        freq_type = $('#edit_freq_name').val();
        freq_type_id = $('#freq_id123').val();
        
        if (freq_type == '') 
        {
            $('#error_freq_type123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_freq_type_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {freq_type: freq_type,freq_type_id: freq_type_id},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_freq_type123').empty();
                        $('#error_freq_type123').css('display','block');
                        $('#error_freq_type123').html('Please add another frequency name , this frequency name is already created.');
                        $("#frequency_type_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_freq_type123').hide();
                    }
                }
            });
        }
    }
    
    function chk_freq_type_name_edit()
    {
        
        freq_type_name = $('#edit_freq_type').val();
        freq_type_id = $('#freq_id123').val();
        
        if (freq_type_name == '') 
        {
            $('#error_freq_type_name123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_freq_type_name_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {freq_type_name: freq_type_name,freq_type_id: freq_type_id},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_freq_type_name123').empty();
                        $('#error_freq_type_name123').css('display','block');
                        $('#error_freq_type_name123').html('Please add another frequency type , this frequency type is already created.');
                        $("#frequency_type_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_freq_type_name123').hide();
                    }
                }
            });
        }
    }
</script>