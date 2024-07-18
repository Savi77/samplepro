<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>

<?php foreach ($edit_notify_by_data->result() as $value) {   ?>
    <form class="form-horizontal" id="EditData" method="POST">
        <input type="hidden" class="form-control" id="notify_id" name="notify_id" value="<?= $value->notify_id ?>">

        <div class="form-group">
            <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="edit_notify_by" name="edit_notify_by" value="<?= $value->notify_by ?>" placeholder="Enter Notify By Ex. Eamil,SMS,Whast's UP" maxlength="50" onkeyup="chk_notify_by_edit()">
                <input type="hidden" class="form-control" id="notify_by_id123" name="notify_by_id123" value="<?= $value->notify_id ?>">
                <small id="error_notify_by123" style="color: #f00 !important;"></small>
                <span id="error_time_slot" style="color: red;font-size:80%" ></span>
            </div>
        </div>

        <div class="form-group" style="margin-bottom:0;">
            <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
                <button type="submit" class="btn btn-primary pull-right" id="notify_by_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditData').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                edit_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Notify By'
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
                    url: "<?php echo base_url('admin/Master/updateNotifyBy'); ?>",
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Notify By Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
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
    function chk_notify_by_edit()
    {
        
        notify_by = $('#edit_notify_by').val();
        notify_by_id = $('#notify_by_id123').val();
        
        if (notify_by == '') 
        {
            $('#error_notify_by123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_notify_by_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {notify_by: notify_by,notify_by_id: notify_by_id},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_notify_by123').empty();
                        $('#error_notify_by123').css('display','block');
                        $('#error_notify_by123').html('Please add another notify type , this notify type is already created.');
                        $("#notify_by_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_notify_by123').hide();
                    }
                }
            });
        }
    }
</script>