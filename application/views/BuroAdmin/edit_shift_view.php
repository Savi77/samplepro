
  <?php 

  foreach ($edit_shift as $shift) 
  {
    $shift_timing=$shift->shift_timing;
    $emp_id=$shift->emp_id;
  ?>
        <form  id="editform" method="post">
          <div class="panel panel-flat">
            <div class="panel-body">
              <fieldset>
                <div class="row">
                    <div class="col-md-12"> 
                      <div class="form-group">
                        <label> Employee Name :</label>
                        <div class="multi-select-full">
                            <select class="form-control" name="emp_id">
                                <?php   
                                  foreach ($employee_list as $value1) 
                                  {
                                    if($value1->id==$emp_id)
                                    {
                               ?>
                                <option value="<?= $value1->id ?>" selected><?= $value1->name;?></option>
                               <?php } } ?> 
                            </select>
                        </div>
                      </div>
                    </div>          
                </div>
              </fieldset>
              <fieldset>
               <div class="row">
                 <div class="col-md-12"> 
                    <div class="form-group">
                      <label>Select Shift :</label>
                        <select class="select-search form-control" name="shift_timing" >
                           <span class="caret"></span>
                            <option value="">Select Shift</option>
                              <?php   
                                foreach ($shift_list as $res) 
                                {
                              ?>
                              <option value="<?= $res->id ?>" <?php if($res->id==$shift_timing){ echo "selected"; } ?> >
                                <?= $res->shift_title.' -  '.$res->from_timing.' : '.$res->to_timing ?>
                              </option>
                             <?php } ?> 
                        </select> 
                    </div>
                  </div>
                </div>
              </fieldset>
             <br/>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
            <span id="preview"></span>
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
                                                   new PNotify({
                                                                title: 'Shift Form',
                                                                text: 'Shift Updated Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Tracking/shift');?>";
                                                     }, 1000);
                                         }
                                         else
                                         {
                                              $(function(){
                                                   new PNotify({
                                                                title: 'Shift Form',
                                                                text: 'Shift is already added on this date',
                                                                type: 'warning'
                                                               });
                                                  });
                                         }
                                  },
                                  error: function() 
                                  {
                                    alert('fail');
                                    }           
                               });
                    }
                    return false;
                
                }));
            });
</script>

    
<!--======================================= / Validation form  ==========================================-->



