<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- <?php
echo "<pre>";
print_r();	
?> -->
    
    <form class="form-horizontal" id="editnote" enctype='multipart/form-data'>
        <input type="hidden" name="leadopp_id" value="<?= $note_details->leadopp_id; ?>">
        <input type="hidden" name="edit_note_lead_id" id="edit_note_lead_id" value="<?= $note_details->note_id?>">
        <div class="">
            <div class="col-md-12">
                <div class="form-group ">
                    <div class="">
                        <div class="d-flex">
                            <div class="col-sm-12">
                                Note <span style="color: red;">*</span><textarea placeholder="Enter Note" class="form-control" name="edit_note" maxlength="150" rows="1"><?= $note_details->notes?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right mr-3">
                <button type="submit" class="btn btn-primary btn-xs">Update <i class="icon-arrow-right14 position-right"></i></button>
                <span id="preview"></span>
            </div>
        </div>
    </form>

<script>
    $(document).ready(function() {
        $('#editnote').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                edit_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Note'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#editnote").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/Leads/Edit_note'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if(data == 1)
                        {
                            $("#preview_upload").hide();
                            $(function() {
                                $("#UpdatesuccessModal").modal('show');
                            });
                        }
                        else
                        {
                            $("#updateErrorModal").modal('show');
                        }
                    },
                    error: function() {
                        // alert('fail');
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Note Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?>"> -->
                  <a onclick="javascript:window.location.reload()">
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
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

