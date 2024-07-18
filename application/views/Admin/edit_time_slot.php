<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>

<?php foreach ($edit_time_slot_data->result() as $value) {   ?>
    <form class="form-horizontal" id="EditData" method="POST">
        <input type="hidden" class="form-control" id="time_id" name="time_id" value="<?= $value->time_id ?>">

        <div class="form-group">
            <label class="control-label col-sm-12" for="email">Time Slot <span style="color: red;">*</span></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="edit_time_slot" name="edit_time_slot" value="<?= $value->time_slot ?>" placeholder="Enter Time Slot Ex. 00:15 In 24Hrs" maxlength="50" onkeyup="chk_time_slot_edit()" pattern="\d{2}:\d{2}">
                <input type="hidden" class="form-control" id="time_slot_id123" name="time_slot_id123" value="<?= $value->time_id ?>">
                <span id="error_time_slot123" style="color: red;font-size:80%" ></span>
            </div>
        </div>

        <div class="form-group" style="margin-bottom:0;">
            <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
                <button type="button" onclick="updateData()" class="btn btn-primary pull-right" id="time_slot_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditData').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                edit_time_slot: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Time Slot'
                        }
                    }
                }
            }
        });
    });

    function updateData(){
        timeSlot = $('#edit_time_slot').val();
        timeId = $('#time_id').val();
        
        if (timeSlot == '') {
            $('#error_time_slot').html('');
            // $('#error_time_slot').html('Please enter time slot');
        }else{
            var datastring = 'time_slot_id=' + timeId + '&time_slot=' + timeSlot;
            
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/updateTimeSlot'); ?>",
                cache: false,
                data: datastring,
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
                    //     window.location = "<?php echo base_url('admin/Master/time_list'); ?>";
                    // }, 1000);
                },
                error: function() {
                    $("#updateErrorModal").modal('show');
                }
            });
        }
    }

    function Validate(e){
        $('#error_time_slot').html('');

        var keyCode = e.keyCode || e.which;

        var pattern = /^[0-9\d\s:]+$/i;

        var isValid = pattern.test(String.fromCharCode(keyCode));
        
        return isValid
    }
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Time Slot Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/time_list'); ?>">
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
                <a href="<?php echo base_url('admin/Master/time_list'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>

<script>
    function chk_time_slot_edit()
    {
        
        time_slot = $('#edit_time_slot').val();
        time_slot_id = $('#time_slot_id123').val();
        
        if (time_slot == '') 
        {
            $('#error_time_slot123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_time_slot_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {time_slot: time_slot,time_slot_id:time_slot_id},
                success: function(data) 
                {
                   
                    if (data == 1) 
                    {
                        $('#error_time_slot123').empty();
                        $('#error_time_slot123').css('display','block');
                        $('#error_time_slot123').html('Please add another time slot , this time slot is already created.');
                        $("#time_slot_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_time_slot123').hide();
                    }
                }
            });
        }
    }
</script>
