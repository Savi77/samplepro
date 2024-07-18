<?php

foreach ($edit_data as $row) {

?>
    <form id="editform" method="post">
        <input type="hidden" name="term_id" value="<?= $row->term_id; ?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Term For  <sup style="color: red">*</sup></label>
                            <input type="text" name="term_for" id="term_for123" class="form-control" placeholder="E.g. Tally" value="<?= $row->term_for ?>" style="max-width: 550px;width: 100%;" onkeyup="chk_term_condition_edit()">
                            <input type="hidden" name="term_for_id123" id="term_for_id123" class="form-control" value="<?= $row->term_id; ?>">
                            <small id="error_term_for123" style="color: #f00 !important;"></small>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="row col-12">
                        <div class="col-sm-6">
                            Terms & Conditions  <sup style="color: red">*</sup>
                        </div>
                        <div class="col-sm-6 text-right p-0">
                            <div class="form-group">
                                <button type="button" class="btn btn-success addButton" id="EditAttachSupport"><i class="icon-add"></i></button>
                            </div>
                        </div>
                    </div>

                    <div id="moreEditSupportUpload" class="col-12"></div>

                    <div class="col-md-12 mt-2">
                        <?php
                            $cc = 43;
                            $terms = explode("$^", $row->term_condition);
                            for ($i = 1; $i < count($terms); $i++) {
                        ?>
                            <dl id="delete_file<?= $cc ?>">
                                <div class="form-group row col-12">
                                    <div class="col-sm-11">
                                        <textarea class="form-control" id="terms<?= $cc ?>" name="terms[]" placeholder="Enter Terms & Condition" rows="2"><?= $terms[$i]; ?></textarea>
                                    </div>
                                    <div class="col-sm-1 text-right"><button type="button" class="btn btn-danger removeButton" onclick="del_file(<?= $cc ?>)"><i class=" icon-trash"></i></button></div>
                                </div>
                            </dl>
                        <?php $cc++;
                        } ?>
                    </div>
                    <div class="col-md-12">
                        <div id="edit_education_fields"></div>
                    </div>
                </div>
                <br />
                <div class="text-right" style="padding-right: 10px;">
                    <button type="submit" class="btn btn-primary" id="termcon_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>

<?php } ?>

<script>
    var cheque_number = 100;
    $('#EditAttachSupport').click(function() {
        //add more file
        var moreUploadTag = '';
        moreUploadTag +=
            '<div class="form-group row col-12"><div class="col-sm-11"><textarea class="form-control" id="terms' +
            cheque_number + '" name="terms[]" rows="2"></textarea> </div><div class="col-sm-1 text-right" ><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
            cheque_number + ')"><i class=" icon-trash"></i></button></div></div>';
        $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreEditSupportUpload');
        cheque_number++;
    });

    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>

<script type="text/javascript">

</script>




<script>
    $(document).ready(function() {
        termsvalidator = {
                row: '.col-md-12',
                validators: {
                    notEmpty: {
                        message: 'Please Enter Term & Condition'
                    }
                }
            },
            $('#editform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'terms[]': termsvalidator,
                    term_for: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Terms for '
                            }
                        }
                    },
                }
            })
            // Add button click handler
            .on('click', '.addButton', function() {})
            // Remove button click handler
            .on('click', '.removeButton', function() {});
    });
</script>


<script type="text/javascript">
    $(document).ready(function(e) {

        $("#editform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_edit").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_edit").show();

                $.ajax({
                    url: "<?php echo base_url('admin/TermConditions/Update'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_edit").hide();
                        $(function() {
                            // new PNotify({
                            //     title: 'Update  Term | Condition',
                            //     text: 'Updated Successfully !!',
                            //     type: 'success'
                            // });
                            $("#UpdatesuccessModal").modal('show');

                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/TermConditions'); ?>";
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
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Term & Condition Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
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
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>
<script>
    function chk_term_condition_edit()
    {
        term_for = $('#term_for123').val();
        term_for_id = $('#term_for_id123').val();
        
        if (term_for == '') 
        {
            $('#error_term_for123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_term_condition_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {term_for: term_for,term_for_id: term_for_id},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_term_for123').empty();
                        $('#error_term_for123').css('display','block');
                        $('#error_term_for123').html('Please add another term, this term is already created.');
                        $("#termcon_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_term_for123').hide();
                    }
                }
            });
        }
    }
</script>