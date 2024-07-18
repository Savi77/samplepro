<?php

foreach ($edit_data as $shift) {

?>
  <form id="editform" method="post">
    <input type="hidden" name="credit_id" value="<?= $shift->credit_id; ?>">
    <div class="panel panel-flat">
      <div class="panel-body">
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Credit Name <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" name="credit_name" id="credit_name123" placeholder="Enter Credit Name" value="<?= $shift->credit_name; ?>" onkeyup="chk_credit_name_edit()">
                <input type="hidden" class="form-control" id="credit_id123" value="<?= $shift->credit_id ?>">
                <small id="error_credit_name123" style="color: #f00 !important;"></small>
              </div>
            </div>
          </div>
        </fieldset1>
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group clockpicker" data-autoclose="true" style="margin-bottom:0;">
                <label>Credit Days <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" name="credit_days" id="credit_days123" placeholder="Enter Credit Days" autocomplete="off" value="<?= $shift->credit_days; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" onkeyup="chk_credit_days_edit()">
                <!-- <input type="hidden" class="form-control" id="credit_id123" name="credit_id123" value="<?= $value->credit_id ?>"> -->
                <small id="error_credit_days123" style="color: #f00 !important;"></small>
              </div>
            </div>
          </div>
        </fieldset1>

        <br />
        <div class="text-right">
          <button type="submit" class="btn btn-primary" id="credit_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
          <span id="preview_edit"></span>
        </div>
      </div>
    </div>
  </form>

<?php } ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#editform').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        credit_name: {
          validators: {
            notEmpty: {
              message: 'Please Enter Credit Name'
            }
          }
        },
        credit_days: {
          validators: {
            notEmpty: {
              message: 'Please Enter Credit Days'
            }
          }
        }
      }
    });
  });
</script>



<script type="text/javascript">
  $(document).ready(function(e) {

    $("#editform").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } else {
        $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
        $("#preview_upload").show();

        $.ajax({
          url: "<?php echo base_url('admin/CreditTerm/UpdateCreditTerm'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview_upload").hide();

            $(function() {
              // new PNotify({
              //   title: 'Update Term',
              //   text: 'Updated Successfully !!',
              //   type: 'success'
              // });
              $("#UpdatesuccessModal").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url(); ?>admin/CreditTerm";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Credit Term Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/CreditTerm'); ?>">
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
                <a href="<?php echo base_url('admin/CreditTerm'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_credit_name_edit()
    {
        credit_name = $('#credit_name123').val();
        credit_id = $('#credit_id123').val();
        if (credit_name == '') 
        {
            $('#error_credit_name123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_name_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_name: credit_name,credit_id: credit_id},
                success: function(data) 
                {
                   
                    if (data == 1) 
                    {
                        $('#error_credit_name123').empty();
                        $('#error_credit_name123').css('display','block');
                        $('#error_credit_name123').html('Please add another credit name, this credit name is already created.');
                        $("#credit_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_name123').hide();
                    }
                }
            });
        }
    }
    
    function chk_credit_days_edit()
    {
        credit_days = $('#credit_days123').val();
        credit_id = $('#credit_id123').val();
        if (credit_days == '') 
        {
            $('#error_credit_days123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_days_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_days: credit_days,credit_id: credit_id},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_credit_days123').empty();
                        $('#error_credit_days123').css('display','block');
                        $('#error_credit_days123').html('Please add another credit days, this credit days is already created.');
                        $("#credit_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_days123').hide();
                    }
                }
            });
        }
    }
</script>