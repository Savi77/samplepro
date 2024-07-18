          <?php
          foreach ($EditArray as $key) {
          ?>
            <form id="edit_Form" method="post" enctype="multipart/form-data">
              <div class="panel panel-flat">
                <div class="panel-body">
                  <input type="hidden" name="expense_id" value="<?= $key->expense_id ?>">
                  <fieldset1>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" style="margin-bottom:0;">
                          <label>Expense Name  <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="expense_name" id="expense_name123" value="<?= $key->expense_name; ?>" placeholder="Enter Expense Name" onkeyup="chk_expense_edit()">
                          <input type="hidden" class="form-control" name="expense_id" id="expense_id123" value="<?= $key->expense_id; ?>">
                          <small id="error_expense123" style="color: #f00 !important;"></small>
                        </div>
                      </div>
                    </div>
                  </fieldset1>
                  <br />
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="expense_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
                    <!-- <span id="preview22"></span> -->
                  </div>
                </div>
              </div>
            </form>
          <?php } ?>



          <script type="text/javascript">
            $(document).ready(function() {
              $('#edit_Form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                  expense_name: {
                    validators: {
                      notEmpty: {
                        message: 'Please Enter Expense Name'
                      }
                    }
                  }
                }
              });
            });
          </script>

          <script type="text/javascript">
            $(document).ready(function(e) {
              $("#edit_Form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                  //alert('invalid');
                } else {

                  $("#preview22").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                  $("#preview22").show();


                  $.ajax({
                    url: "<?php echo base_url('admin/Expense/update_expense'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                      $("#preview22").hide();
                      // alert(data);
                      $(function() {
                        // new PNotify({
                        //   title: 'Update Expense',
                        //   text: 'Expense Updated Successfully',
                        //   type: 'success'
                        // });
                        $("#UpdatesuccessModal").modal('show');
                      });
                      // setTimeout(function() {
                      //   window.location = "<?php echo base_url('admin/Expense'); ?>";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Expense Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense'); ?>">
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
                <a href="<?php echo base_url('admin/Expense'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_expense_edit()
    {
        expense_name = $('#expense_name123').val();
        expense_id = $('#expense_id123').val();
        if (expense_name == '') 
        {
            $('#error_expense123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_expense_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {expense_name: expense_name,expense_id: expense_id},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_expense123').empty();
                        $('#error_expense123').css('display','block');
                        $('#error_expense123').html('Please add another expense, this expense is already created.');
                        $("#expense_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_expense123').hide();
                    }
                }
            });
        }
    }
</script>