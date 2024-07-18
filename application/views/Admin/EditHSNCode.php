<?php  foreach ($edit_data as $row) {  ?>
  <form id="editform" method="post">
    <input type="hidden" name="hsn_id" value="<?= $row->hsn_id; ?>">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>HSN Code <sup style="color: red">*</sup></label>
            <input type="text" class="form-control" name="hsn_code" value="<?= $row->hsn_code; ?>" placeholder="Enter HSN Code">
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group clockpicker" data-autoclose="true">
            <label>HSN Description </label>
            <input type="text" class="form-control" name="hsn_desc" value="<?= $row->hsn_desc; ?>" autocomplete="off" placeholder="Enter HSN Code">
          </div>
        </div>
      </div>
      
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
        <span id="preview_edit"></span>
      </div>
  </form>
<?php } ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#editform').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        hsn_code: {
          validators: {
            notEmpty: {
              message: 'Please Enter HSN Code'
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
          url: "<?php echo base_url('admin/HSNCode/Update'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview_upload").hide();

            $(function() {
              // new PNotify({
              //   title: 'Update HSN',
              //   text: 'Updated Successfully !!',
              //   type: 'success'
              // });
              $("#UpdatesuccessModal").modal('show');
            });
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/HSNCode'); ?>";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">HSN Code Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/HSNCode'); ?>">
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
                <a href="<?php echo base_url('admin/HSNCode'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>