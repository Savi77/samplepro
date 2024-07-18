<?php

foreach ($edit_data as $period) {
  $sub_type = $this->db->select('subscription_type')->from('tbl_organisation')->where('org_id',$period->org_id)->get()->row()->subscription_type;
?>
  <form id="editform" method="post">
    <input type="hidden" name="org_id" value="<?= $period->org_id; ?>">
    <!-- <div class="panel panel-flat">
      <div class="panel-body">
        <fieldset1> -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Subscription Start Date <sup style="color: red">*</sup></label>
                <input type="text" class="form-control" name="s_start" placeholder="Enter Subscription Start Date" value="<?= date('d F, Y', strtotime($period->subscription_start_date)); ?>" readonly>
              </div>
            </div>
          </div>
        <!-- </fieldset1>
        <fieldset1> -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" data-autoclose="true" style="margin-bottom:0;">
                <label>Subscription End Date <sup style="color: red">*</sup></label>
                <input type="text" class="form-control pickadate-selectors rounded-right" name="s_end" id="s_end" placeholder="Enter Subscription End Date" autocomplete="off" value="<?= date('d F, Y', strtotime($period->subscription_end_date)); ?>">
                <span class="glyphicon glyphicon-edit errspan" style="float: right;margin-right: 9px;margin-top: -24px;position: relative;z-index: 2; color: #979faf;pointer-events:none;"></span>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" data-autoclose="true" style="margin-bottom:0;">
                <label>Type Of Subscription <sup style="color: red">*</sup></label>
                <select class="form-control" name="sub_type" id="sub_type" data-placeholder="Select Subscription Type">
                  <?php
                  if($sub_type == 'trial')
                  {
                  ?>
                  <option value="">Select Subscription Type</option>
                  <option value="trial" selected>Trial Account</option>
                  <option value="Yearly_Subscription">Yearly Subscription</option>
                  <option value="Free_Account">Free Account</option>
                  <?php
                  }
                  else if($sub_type == 'Yearly_Subscription')
                  {
                  ?>
                  <option value="">Select Subscription Type</option>
                  <option value="trial">Trial Account</option>
                  <option value="Yearly_Subscription" selected>Yearly Subscription</option>
                  <option value="Free_Account">Free Account</option>
                  <?php
                  }
                  else if($sub_type == 'Free_Account')
                  {
                  ?>
                  <option value="">Select Subscription Type</option>
                  <option value="trial">Trial Account</option>
                  <option value="Yearly_Subscription">Yearly Subscription</option>
                  <option value="Free_Account" selected>Free Account</option>
                  <?php
                  }
                  else
                  {
                  ?>
                  <option value="">Select Subscription Type</option>
                  <option value="trial">Trial Account</option>
                  <option value="Yearly_Subscription">Yearly Subscription</option>
                  <option value="Free_Account">Free Account</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" data-autoclose="true" style="margin-bottom:0;">
                <label>No. of User <sup style="color: red">*</sup></label>
                <input type="number" class="form-control pickadate-selectors rounded-right" name="no_user" id="no_user" placeholder="Enter No. of Users" autocomplete="off" value="<?= $period->no_of_user;?>">
              </div>
            </div>
          </div>
        <!-- </fieldset1> -->

        <br />
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
          <!-- <span id="preview_edit"></span> -->
        </div>
      </div>
    </div>
  </form>

<?php } ?>

<script>
    var max = new Date();
    $('#s_end').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: 100,
        min: max
    })
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#editform').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        s_start: {
          validators: {
            notEmpty: {
              message: 'Please Enter Subscription Start Date'
            }
          }
        },
        s_end: {
          validators: {
            notEmpty: {
              message: 'Please Enter Subscription End Date'
            }
          }
        },
        sub_type: {
          validators: {
            notEmpty: {
              message: 'Please Select Subscription Type'
            }
          }
        },
        no_user: {
          validators: {
            notEmpty: {
              message: 'Please Enter No. of Users'
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
      } 
      else {
        $.ajax({
          url: "<?php echo base_url('BA/BuroCustomer/Updateenddate'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            PNotify.removeAll()
              new PNotify({
                title: 'Update Term',
                text: 'Updated Successfully !!',
                type: 'success'
              });
            //   $("#UpdatesuccessModal").modal('show');
           

            setTimeout(function() {
              window.location = "<?php echo base_url(); ?>BA/BuroCustomer/TrialCustomer";
            }, 1000);
          },
          error: function() {
            // $("#updateErrorModal").modal('show');
            alert("Error")
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Updated Successfully</div>
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