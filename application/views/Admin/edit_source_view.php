<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editsorce_detail->result() as $value) {
?>
  <form class="form-horizontal" id="EditType">
    <input type="hidden" class="form-control" id="source_id" name="source_id" value="<?= $value->source_id ?>">

    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Source Title <span style="color: red;">*</span></label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="source_title123" name="source_title" value="<?= $value->source_title ?>" placeholder="Enter Source Title" maxlength="50" onkeyup="chk_source_list_edit()">
        <input type="hidden" class="form-control" id="source_id123" name="source_id123" value="<?= $value->source_id ?>">
        <small id="error_source_list123" style="color: #f00 !important;"></small>
      </div>
    </div>

    <div class="form-group" style="margin-bottom:0;">
      <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
        <button type="submit" class="btn btn-primary pull-right" id="source_list_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>
  </form>

<?php } ?>




<script type="text/javascript">
  $(document).ready(function(e) {

    $("#EditType").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
        return false;
      } else {

        // alert('test');  

        $.ajax({
          url: "<?php echo base_url('admin/Leads/Edit_Add_source'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
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
            //   window.location = "<?php echo base_url('admin/Leads'); ?>";
            // }, 1000);


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

<script type="text/javascript">
  $(document).ready(function() {
    $('#EditType').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        source_title: {
          validators: {
            notEmpty: {
              message: 'Please Enter Source Title'
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
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Source Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads'); ?>">
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
                <a href="<?php echo base_url('admin/Leads'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_source_list_edit()
    {
        source_title = $('#source_title123').val();
        source_id = $('#source_id123').val();
        
        if (source_title == '') 
        {
            $('#error_source_list123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_source_list_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {source_title: source_title,source_id: source_id},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_source_list123').empty();
                        $('#error_source_list123').css('display','block');
                        $('#error_source_list123').html('Please add another source , this source is already created.');
                        $("#source_list_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_source_list123').hide();
                    }
                }
            });
        }
    }
</script>