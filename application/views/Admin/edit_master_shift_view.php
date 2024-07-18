<!-- <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script> -->

<?php

foreach ($edit_shift as $shift) {
  // $shift_from_time = $shift->from_timing;
  // echo date('H:i', strtotime($shift_from_time));
  // $from_time = $shift_from_time->format('H:i');
  // $shift_to_time = $shift->to_timing;
  // $to_time = substr($shift_to_time, 0, -3);

?>
  <form id="editform" method="post">
    <input type="hidden" name="id" value="<?= $shift->id; ?>">
    <div class="panel panel-flat">
      <div class="panel-body">
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Shift Name <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" name="shift_title" value="<?= $shift->shift_title; ?>" placeholder="Enter Shift Name">
              </div>
            </div>
          </div>
        </fieldset1>
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group clockpicker" data-autoclose="true">
                <label>From Time <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" placeholder="Enter From Time" name="from_timing" id="from_timing" autocomplete="off" value="<?= date('H:i', strtotime($shift->from_timing)); ?>" readonly> 
                <!-- <input type="text" class="form-control" name="from_timing" id="from_timing" autocomplete="off" value="<?= $shift->from_time; ?>" placeholder="Enter From Time"> -->
              </div>
            </div>
          </div>
        </fieldset1>
        <fieldset1>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group clockpicker" data-autoclose="true">
                <label>To Time <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" name="to_timing" id="to_timing" autocomplete="off" value="<?= date('H:i', strtotime($shift->to_timing)); ?>" placeholder="Enter To Time" readonly>
              </div>
            </div>
          </div>
        </fieldset1>
        <br />
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
          <span id="preview2"></span>
        </div>
      </div>
    </div>
  </form>

<?php } ?>



<script type="text/javascript">
  $('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
  });
</script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#editform').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
              shift_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Shift Name'
                        }
                    }
                },

                from_timing: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select From Time'
                        }
                        // regexp: {
                        //             regexp: '/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/',
                        //             message: 'The value is not a valid email address'
                        //         }
                    }
                },
                to_timing: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select To Time'
                        }
                    }
                },
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
          url: "<?php echo base_url('admin/Tracking/update_master_shift'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            // alert(data);
            if (data == 1) {
              $(function() {
                // new PNotify({
                //   title: 'Update Shift',
                //   text: 'Updated Successfully',
                //   type: 'success'
                // });
                $("#UpdatesuccessModal").modal('show');
              });

              // setTimeout(function() {
              //   window.location = "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
              // }, 1000);
            } 
            // else {
            //   $(function() {
            //     new PNotify({
            //       title: 'Shift Form',
            //       text: 'Shift is already added on this date',
            //       type: 'warning'
            //     });
            //   });
            // }
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Shift Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
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
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>