<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editscheduletype->result() as $value) {
?>
  <form class="form-horizontal" id="Updatescheduetype">
    <input type="hidden" class="form-control" id="visittype_id" name="visittype_id" value="<?= $value->id ?>">

    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Task Title <span style="color: red;">*</span></label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="type_name123" name="type_name" value="<?= $value->type_name ?>" placeholder="Enter Task Title" maxlength="35" onkeyup="chk_activity_list_edit()">
        <input type="hidden" class="form-control" id="type_id" name="type_id" value="<?= $value->id ?>">
        <small id="error_activity_list123" style="color: #f00 !important;"></small>
      </div>
    </div>
    <div class="form-group" style="margin-bottom:0;">
      <div class="col-sm-offset-3 col-sm-12" style="text-align: right;">
        <button type="submit" class="btn btn-primary pull-right" id="act_list_sub_btn">Update<i class="icon-arrow-right14 position-right"></i></button>
      </div>
    </div>
  </form>

<?php } ?>




<script type="text/javascript">
  $(document).ready(function() {
    $('#Updatescheduetype').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        type_name: {
          validators: {
            notEmpty: {
              message: 'Please Enter Task Title'
            }
          }
        }
      }
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(e) {

    $("#Updatescheduetype").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
        return false;
      } else {
        $.ajax({
          url: "<?php echo base_url('admin/Schedule_visit_type/Edit_Add_scheduletype'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            PNotify.removeAll()
            $(function() {
              // new PNotify({
              //   title: 'Edit Form',
              //   text: 'Updated  Successfully',
              //   type: 'success'
              // });
              $("#UpdatesuccessModal").modal('show');
            });
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Schedule_visit_type'); ?>";
            // }, 900);
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task List Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Schedule_visit_type'); ?>">
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
                <a href="<?php echo base_url('admin/Schedule_visit_type'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_activity_list_edit() 
    {
      
        activity_list = $('#type_name123').val();
        activity_list_id = $('#type_id').val();
        if (activity_list == '') 
        { 
            $('#error_activity_list123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
            
        } 
        else 
        {
          
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_activity_list_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {activity_list: activity_list,activity_list_id:activity_list_id},
                success: function(data) 
                {
                  
                    if (data == 1) 
                    {
                        $('#error_activity_list123').empty();
                        $('#error_activity_list123').css('display','block');
                        $('#error_activity_list123').html('Please add another activity , this activity is already created.');
                        $("#act_list_sub_btn").attr('disabled', true);
                    }   
                    else 
                    {
                      
                        $('#error_activity_list123').hide();
                    }
                }
            });
        }
    }

</script>