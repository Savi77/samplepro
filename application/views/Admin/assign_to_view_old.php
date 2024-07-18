 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
  <!-- /theme JS files -->
<style type="text/css">
  
  .daterange-single 
  {
    z-index: 100000;
  }

/*  Display datepicker on modal (popup)  */

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

</style>
<style type="text/css">
  .multiselect-container > li {
    padding: 0px 10px;
}

.multiselect-container .input-group {
    margin: 5px;
    display: none;
}

.btn-group.open .multiselect.btn-default 
{
    width: 476px !important;
}

.btn-group > .btn:first-child 
{
    margin-left: 0;
    width: 476px !important;
}
.multiselect-container {
    min-width: 476px !important;
}

.multiselect-container>li>a>label>input[type=checkbox] 
{
    margin-top: -4px !important;
}

</style>
        <form class="form-horizontal" id="assignto_form1" method="post">
            <input type="hidden" class="form-control" id="query_id1" name="query_id" value="<?= $query['query_id'] ?>" placeholder="Enter Company Name">
              <div class="row">
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Youtube">Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control daterange-single" id="start_date" name="start_date" onchange="check_availability()" >
                      <span id="err2" style="color:red; font-size: 12px;"></span>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Youtube">Start Time</label>
                  <div class="col-sm-4 clockpicker">
                        <input type="text" class="form-control" id="event_start_time" name="event_start_time" value="" onchange="check_availability()" onclick="document.getElementById('err3').innerHTML='' ">
                        <span id="err3" style="color:red; font-size: 12px;"></span>
                  </div>
                  <label class="control-label col-sm-2" for="Youtube">End Time</label>
                  <div class="col-sm-4 clockpicker">
                        <input type="text" class="form-control" id="event_end_time"  name="event_end_time" value="" onchange="check_availability()" onclick="document.getElementById('err4').innerHTML='' ">
                        <span id="err4" style="color:red; font-size: 12px;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                      <label>Employee name</label>
                  </div>
                  <div class="col-sm-10">
                      <div id="all_employee">
                          <select class="form-control soft_skill_list" id="employee" multiple="multiple" name="employee[]" onchange="document.getElementById('err1').innerHTML='' " readonly="">
                          <?php foreach ($assign_issue->result() as $value)
                          { ?>
                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                          <?php } ?>
                        </select>
                         <span id="err1" style="color:red; font-size: 12px;"></span>
                    </div>
                    <div id="available_employee"></div>
                  </div>
                  <br><br>
                </div>
            </div>

          <div class="form-group"> 
            
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary pull-right" id="desktopbutton" onclick="return form_assignto()">Submit</button>
            </div>
            <div id="loader"></div>
          </div>
      </form>

<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>
<!-- ================== Check Employee availability ================================== -->
<script type="text/javascript">
 function check_availability()
          {
                 start_date = $('#start_date').val();
                 start_time = $('#event_start_time').val();
                 end_time = $('#event_end_time').val();


                  if(start_date=='')
                  {
                    //alert();
                  }
                  else if(start_time=='')
                  { 
                      // return false;
                  }
                    else if(end_time=='')
                  { 
                      // return false;
                  }
                  else
                  {
                       if (start_time > end_time) 
                        {
                           $('#desktopbutton').prop('disabled', true);
                            new PNotify({
                                           title: 'Task Assign',
                                           text: 'End time should be greater than Start time',
                                           type: 'warning'
                                        });

                        }
                        else
                        {
                          // alert();
                              $('#desktopbutton').prop('disabled', false);
                              var datastring = 'start_date='+start_date+'&start_time='+start_time+'&end_time='+end_time;
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('admin/Customer/availability'); ?>",
                                    cache: false,    
                                    data: datastring,
                                    success: function(data)
                                    {    
                                      // alert(data);
                                      $('#all_employee').hide(); 
                                      $('#available_employee').html(data);     
                                      
                                     },
                                        error: function(){      
                                         alert('Error while request..');
                                        }
                                     });
                                    return false;
                        }
                  }

                   

                  //  if(start_date=='')
                  // {
                  //   //alert();
                  //   document.getElementById("err2").innerHTML = "Please select date";
                  // }
                  // else if(event_start_time=='')
                  // {
                  //   document.getElementById("err3").innerHTML = "Please select start time";
                  // }
                  //   else if(event_end_time=='')
                  // {
                  //   document.getElementById("err4").innerHTML = "Please select end time";
                  // }
                  // else
                  // {
                     
                  // }

          }
</script>
<!-- ============================================================================= -->
<!--=======================================  Validation form  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#assignto_form1').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               "employee[]": {
                    validators: {
                        notEmpty: {
                            message: 'Please select employee name'
                        }
                }
            },

            query_id1: {
                    validators: {
                        notEmpty: {
                            message: 'Please select queryid'
                        }
                }
            },

             start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select date'
                        }
                }
            },

             event_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                }
            },

             event_end_time: {
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
    
<!--======================================= / Validation form  ==========================================-->
<script type="text/javascript">
function form_assignto()
{
       employee = $('#employee').val();

       // alert(employee);
       start_date = $('#start_date').val();
       event_start_time = $('#event_start_time').val();
       event_end_time = $('#event_end_time').val();

        if(employee=='')
        {
          document.getElementById("err1").innerHTML = "Please select employee name";
          return false;
        }
        else if(start_date=='')
        {
          //alert();
          document.getElementById("err2").innerHTML = "Please select date";
          return false;
        }
        else if(event_start_time=='')
        {
          document.getElementById("err3").innerHTML = "Please select start time";
          return false;
        }
          else if(event_end_time=='')
        {
          document.getElementById("err4").innerHTML = "Please select end time";
          return false;
        }
        else
        {
            $("#loader").html('<img src="<?= base_url() ?>assets/images/default.gif" alt="Uploading...."/>');

               $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/assign_to'); ?>",
                data:  $("#assignto_form1").serialize(),
                cache: false,
                success: function(data)
                {    
                  // alert(data);
                  $('#loader').hide();
                  if (data==0) 
                  {
                      new PNotify({
                                          title: 'Select Form',
                                          text: 'Please select employee name',
                                          type: 'warning'
                                         });
                  }
                  else
                  {

                      new PNotify({
                                          title: 'Assign Form',
                                          text: 'Assigned  Successfully',
                                          type: 'success'
                                         });
                          
                              setTimeout(function()
                                       {
                                           window.location="<?php echo base_url('admin/Customer/Issue');?>";
                                       }, 1000);
                  }
                       
                  
                 },
                    error: function(){      
                     alert('Error while request..');
                    }
                 });
                return false;
        }

}

</script>



<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
jQuery('#employee').multiselect({
        enableFiltering: true,
        maxHeight:400,
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Please select employee', 
        numberDisplayed: 5, 
        selectAll: false, 
        onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = jQuery('#employee option:selected');
 
                if (selectedOptions.length >= 5) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = jQuery('#employee option').filter(function() {
                        return !jQuery(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });

                     new PNotify({
                                      title: 'Message',
                                      text: 'Please Select only 5 employee',
                                      type: 'warning'
                                     });
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#employee option').each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }});
            
            
     /*Add This to Block SHIFT Key*/       
var shiftClick = jQuery.Event("click");
shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });
</script>
<!-- ====================================================================================================================== -->