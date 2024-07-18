<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editstage->result() as $value) {
?>
  <form class="form-horizontal" id="EditType">
    <input type="hidden" class="form-control" id="stage_id" name="stage_id" value="<?= $value->stage_id ?>">

    <div class="form-group">
      <label class="control-label col-sm-12 " for="email">Stage Title <span style="color: red;">*</span></label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="stage_title123" name="stage_title" value="<?= $value->stage_title ?>" placeholder="Enter Stage Title" maxlength="50" onkeyup="chk_stage_list_edit()">
        <small id="error_stage_list123" style="color: #f00 !important;"></small>
      </div>
    </div>

    <div class="form-group" style="margin-bottom:0;">
      <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
        <button type="submit" class="btn btn-primary pull-right" id="stage_list_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>
  </form>

<?php } ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#EditType').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        stage_title: {
          validators: {
            notEmpty: {
              message: 'Please Enter Stage Title'
            }
          }
        }
      }
    });
  });
</script>

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
          url: "<?php echo base_url('admin/Leads/Edit_Add_stage'); ?>",
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
            //   window.location = "<?php echo base_url('admin/Leads/Stage'); ?>";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Stage Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/Stage'); ?>">
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
              <a href="<?php echo base_url('admin/Leads/Stage'); ?>">
                  <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
              </a>
          </div>
        </div>
    </div>
</div>

<script>
    function chk_stage_list_edit()
    {
        stage_title = $('#stage_title123').val();
        stage_id = $('#stage_id123').val();
        
        if (stage_title == '') 
        {
            $('#error_stage_list123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_stage_list_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {stage_title: stage_title,stage_id: stage_id},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_stage_list123').empty();
                        $('#error_stage_list123').css('display','block');
                        $('#error_stage_list123').html('Please add another stage , this stage is already created.');
                        $("#stage_list_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_stage_list123').hide();
                    }
                }
            });
        }
    }
</script>
    
