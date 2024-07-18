
  <?php 

  foreach ($edit_shift as $shift) 
  {
    $shift_timing=$shift->shift_timing;
    $emp_id=$shift->emp_id;
    // echo "<pre>";
    // print_r($shift_timing);
  ?>
        <form  id="editform" method="post">
          <div class="panel panel-flat">
            <div class="panel-body">
              <fieldset1>
                <div class="row">
                    <div class="col-md-12"> 
                      <div class="form-group">
                        <label> Resource Name <span class="text-danger" >*</span></label>
                        <div class="multi-select-full">
                        <?php   
                          foreach ($employee_list as $value1) 
                          {
                            if($value1->id==$emp_id)
                            {
                            ?>
                            <input class="form-control" type="text" name="emp_name" value="<?= $value1->name ?>" readonly>
                            <input class="form-control" type="hidden" name="emp_id" value="<?= $value1->id ?>">
                          <?php
                            }
                          }
                          ?>
                            <!-- <select class="form-control" name="emp_id">
                                <?php   
                                  foreach ($employee_list as $value1) 
                                  {
                                    if($value1->id==$emp_id)
                                    {
                               ?>
                                <option value="<?= $value1->id ?>" selected><?= $value1->name;?></option>
                               <?php } } ?> 
                            </select> -->
                        </div>
                      </div>
                    </div>          
                </div>
              </fieldset1>
              <fieldset1>
               <div class="row">
                 <div class="col-md-12"> 
                    <div class="form-group">
                      <!-- <label>Select Shift <span class="text-danger" >*</span></label> -->
                        <!-- <select data-placeholder="Select Shift" class="form-control" name="shift_timing" id="shift_timing">
                            <option value="">Select Shift</option>
                              <?php   
                                foreach ($shift_list as $res) 
                                {
                              ?>
                              <option value="<?= $res->id ?>" <?php if($res->id==$shift_timing){ echo "selected"; } ?> >
                                <?= $res->shift_title.' -  '.$res->from_timing.' : '.$res->to_timing ?>
                              </option>
                             <?php } ?> 
                        </select>  -->
                        
                        <label>Select Shift <span class="text-danger" >*</span> </label>
                        <select data-placeholder="Select Shift" class="form-control select2" name="shift_timing" id="shift_timing">
                            <option value="">Select Shift</option>
                            <?php foreach ($shift_list as $shift) { ?>
                                <option value="<?= $shift->id ?>" <?php if($shift->id==$shift_timing){ echo "selected"; } ?> >
                                <?= $shift->shift_title.' -  '.$shift->from_timing.' : '.$shift->to_timing ?>
                              </option>
                            <?php   }   ?>
                            <!-- <?php foreach ($shift_list as $shift) { ?>
                                                            <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                        <?php  } ?> -->
                        </select>

                    </div>
                  </div>
                </div>
              </fieldset1>
             <br/>
            <div class="text-right">
            <button type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
            <span id="preview"></span>
          </div>  
        </div>
      </div>
    </form>

<?php } ?>

<script>
  $('#shift_timing').select2({
        tags: true,
		dropdownParent: $("#modal_default1")
   });
</script>


<script type="text/javascript">
$(document).ready(function() {
    $('#editform').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
                   

                emp_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please select employee'
                            }
                    }
                },

                 interval: {
                        validators: {
                            notEmpty: {
                                message: 'Please select time interval'
                            }
                    }
                },

                 shift_timing: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Shift'
                            }
                    }
                },

                 schedule_date: {
                        validators: {
                            notEmpty: {
                                message: 'Please select start date'
                            }
                    }
                },

                 schedule_date1: {
                        validators: {
                            notEmpty: {
                                message: 'Please select end date'
                            }
                    }
                },

                 emailid: {
                    validators: {
                        notEmpty: {
                             message: 'Email is required.'
                     },
                    regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                }
        }
    });
});
</script>



<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#editform").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                        var formresult = new FormData(this);
                              $.ajax({
                                 url: "<?php echo base_url('admin/Tracking/edit_add_shift'); ?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    // alert(data);
                                         if (data==1) 
                                         {
                                                 $(function(){
                                                  //  new PNotify({
                                                  //               title: 'Shift Form',
                                                  //               text: 'Shift Updated Successfully',
                                                  //               type: 'success'
                                                  //              });
                                                  $("#UpdatesuccessModal").modal('show');
                                                  });

                                                  //  setTimeout(function()
                                                  //    {
                                                  //        window.location="<?php echo base_url('admin/Tracking/shift');?>";
                                                  //    }, 1000);
                                         }
                                         else
                                         {
                                              $(function(){
                                                  //  new PNotify({
                                                  //               title: 'Shift Form',
                                                  //               text: 'Shift is already added on this date',
                                                  //               type: 'warning'
                                                  //              });
                                                  $("#updateErrorModal").modal('show');
                                                  });
                                         }
                                  },
                                  error: function() 
                                  {
                                    $("#updateErrorModal").modal('show');
                                  }           
                               });
                    }
                    return false;
                
                }));
            });
</script>

    
<!--======================================= / Validation form  ==========================================-->



<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Assigned Shift Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/shift'); ?>">
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
                <a href="<?php echo base_url('admin/Tracking/shift'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>