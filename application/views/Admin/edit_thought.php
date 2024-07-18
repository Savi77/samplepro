<?php

foreach ($edit_thought as $res) {
  $thought = $res->thought;
  $thought_id = $res->thought_id;
?>
  <form id="editform" method="post">
    <div class="panel panel-flat">
      <div class="panel-body">
        <input type="hidden" name="thought_id" value="<?= $thought_id; ?>">
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <fieldset1>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="margin-bottom:0;">
                      <label>Enter Thought <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="thought" id="thought123" rows="2" maxlength="500" onkeyup="chk_thoughts_edit()" placeholder="Enter Thought"><?= $thought; ?></textarea>
                      <input type="hidden" name="thought_id123" id="thought_id123" value="<?= $thought_id; ?>">
                      <small id="error_thought123" style="color: #f00 !important;"></small>
                    </div>
                  </div>
                </div>
              </fieldset1>
            </div>
          </div>
        </fieldset1>
        <br />
        <div class="text-right">
          <button type="submit" class="btn btn-primary" id="thought_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
          <span id="preview2"></span>
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

        thought: {
          validators: {
            notEmpty: {
              message: 'Please Enter Thought'
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


        $.ajax({
          url: "<?php echo base_url('admin/Thoughts/Update'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $(function() {
              // new PNotify({
              //   title: 'Update Thought',
              //   text: 'Updated Successfully',
              //   type: 'success'
              // });
              $("#UpdatesuccessModal").modal('show');
            });
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Thoughts'); ?>";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Thought Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Thoughts'); ?>">
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
                <a href="<?php echo base_url('admin/Thoughts'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>

<script>
    function chk_thoughts_edit()
    {
      
      thought = $('#thought123').val();
      thought_id = $('#thought_id123').val();
    
      if (thought == '') 
      {
          $('#error_thought123').empty();
      } 
      else 
      {
          $.ajax({
              url: "<?php echo base_url('admin/Master/chk_thoughts_edit'); ?>",
              dataType: "html",
              type: "POST",
              data: {thought: thought,thought_id: thought_id},
              success: function(data) 
              {
                  if (data == 1) 
                  {
                      $('#error_thought123').empty();
                      $('#error_thought123').css('display','block');
                      $('#error_thought123').html('Please add another thought , this thought is already created.');
                      $("#thought_sub_btn123").attr('disabled', true);
                      // $().(disabled="disabled")
                  }   
                  else 
                  {
                      $('#error_thought123').hide();
                  }
              }
          });
      }
    }
</script>