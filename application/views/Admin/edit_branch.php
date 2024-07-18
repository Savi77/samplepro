<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_branch->result() as $value) {
?>
  <form class="form-horizontal" id="EditBranch">
    <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="<?= $value->branch_id ?>" placeholder="Enter Branch Name">

    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Branch Name <span style="color: red;">*</span></label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="branch_name123" name="branch_name" value="<?= $value->name ?>" placeholder="Enter Branch Name" maxlength="50" onkeyup="chk_branch_edit()">
        <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="<?= $value->branch_id ?>">
        <small id="error_branch123" style="color: #f00 !important;"></small>
      </div>
    </div>

    <div class="form-group" style="margin-bottom:0;">
      <div class="col-sm-offset-3 col-sm-12" style="text-align: right;">
        <button type="submit" class="btn btn-primary pull-right" id="branch_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>
  </form>

<?php } ?>






<script type="text/javascript">
  $(document).ready(function(e) {
    $("#EditBranch").on('submit', (function(e) 
    {
      if (e.isDefaultPrevented()) 
      {
        return false;
      } else {
        $("#preview2").show();
        $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/Master/Edit_Add_Branch'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview2").hide();
            PNotify.removeAll()
            // alert(data);
            $(function() {
              // new PNotify({
              //   title: 'Edit Form',
              //   text: 'Updated  Successfully',
              //   type: 'success'
              // });
              $("#UpdatesuccessModal").modal('show');

            });
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Master/businesslist'); ?>";
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#EditBranch').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        branch_name: {
          validators: {
            notEmpty: {
              message: 'Please Enter Branch Name'
            }
          }
        }
      }
    });
  });
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Branch Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/branch_master'); ?>">
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
                <a href="<?php echo base_url('admin/Master/branch_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
     function chk_branch_edit()
    {
        branch = $('#branch_name123').val();
        branch_id = $('#branch_id').val();
        if (branch == '') 
        {
            $('#error_branch123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_branch_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {branch: branch,branch_id: branch_id},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_branch123').empty();
                        $('#error_branch123').css('display','block');
                        $('#error_branch123').html('Please add another branch, this branch is already created.');
                        $("#branch_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_branch123').hide();
                    }
                }
            });
        }
    }

</script>