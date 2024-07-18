<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editbusiness->result() as $value) {
?>
  <form class="form-horizontal" id="EditBusiness">
    <div class="panel panel-flat">
      <div class="panel-body">
        <input type="hidden" class="form-control" id="business_id" name="business_id" value="<?= $value->business_id ?>" placeholder="Enter Company Name">
        <div class="form-group">
          <label class="control-label col-sm-12" for="email">Business Segment Title <span style="color: red;">*</span></label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="business_name123" name="business_name" value="<?= $value->business_name ?>" placeholder="Enter Business Segment Title" maxlength="50" onkeyup="chk_business_segment_edit()">
            <input type="hidden" class="form-control" id="business_id" name="business_id" value="<?= $value->business_id ?>">
            <small id="error_business_segment123" style="color: #f00 !important;"></small>
          </div>
        </div>

        <div class="form-group" style="margin-bottom:0;">
          <div class="col-md-offset-2 col-md-12" style="text-align: right;">
            <button type="submit" class="btn btn-primary pull-right" id="business_segment_sub_btn">Update<i class="icon-arrow-right14 position-right"></i>&nbsp;<span id="preview2"></span></button>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php } ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#EditBusiness').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        business_name: {
          validators: {
            notEmpty: {
              message: 'Please Enter Business Segment Title'
            }
          }
        }
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(e) {

    $("#EditBusiness").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
        return false;
      } else {
        $("#preview2").show();
        $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

        $.ajax({
          url: "<?php echo base_url('admin/Master/Edit_Add_business'); ?>",
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

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Business Segment Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/businesslist'); ?>">
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
                <a href="<?php echo base_url('admin/Master/businesslist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_business_segment_edit()
    {
        business_segment = $('#business_name123').val();
        business_segment_id = $('#business_id').val();
        if (business_segment == '') 
        {
            $('#error_business_segment123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_business_segment_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {business_segment: business_segment,business_segment_id:business_segment_id},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_business_segment123').empty();
                        $('#error_business_segment123').css('display','block');
                        $('#error_business_segment123').html('Please add another business name , this business name is already created.');
                        $("#business_segment_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_business_segment123').hide();
                    }
                }
            });
        }
    }
</script>