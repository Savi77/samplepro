<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
type="text/css" />
<!-- Theme JS files -->

<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
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
                     <label class="control-label col-sm-2" for="Youtube">Employee Name</label>
                      <div class="col-sm-4">
                            <select class="select-search" name="employee_id" id="employee_id11" onchange="getassignedissue_list()">
                                      <option value="">Select Employee</option>
                                      <?php 
                                      foreach ($assign_issue->result() as $value) 
                                      { ?>
                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                    <?php  } ?>
                            </select>
                            <span id="err1" style="color:red; font-size: 12px;"></span>
                      </div>
                      <label class="control-label col-sm-2" for="email">Schedule Date</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="schedule_date11" name="schedule_date" placeholder="Select Schedule Date"  onchange="getassignedissue_list()" onclick="document.getElementById('err22').innerHTML='' ">
                          <span id="err22" style="color:red; font-size: 12px;"></span>
                        </div>
                </div>
                <div class="form-group" id="issuelistdetails1" style="display: none">
                     <label class="control-label col-sm-2" for="Youtube">Assign issue list</label>
                        <div class="col-sm-10" id="issue_schedule_list1">
                              
                        </div>     
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Youtube">Start Time</label>
                  <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" id="start_time" name="start_time" value="" onchange="mainInfo11()" onclick="document.getElementById('err33').innerHTML='' ">
                        <span id="err33" style="color:red; font-size: 12px;"></span>
                  </div>
                  <label class="control-label col-sm-2" for="Youtube">End Time</label>
                  <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" id="end_time"  name="end_time" value="" onchange="mainInfo11()" onclick="document.getElementById('err44').innerHTML='' ">
                        <span id="err44" style="color:red; font-size: 12px;"></span>
                  </div>
                </div>
            </div>

          <div class="form-group"> 
            <div class="col-sm-2">
              <div id="loader_gif"></div>
            </div>
            <div class="col-sm-offset-3">
              <button type="submit" class="btn btn-primary pull-right btn_hide_show" id="desktopbutton1" onclick="return form_assignto()">Submit</button>
            </div>
            
          </div>
      </form>

<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'left',
    align: 'left',
    donetext: 'Done'
});
</script>

<!--========================== Date picker javascript ====================================-->


      <script language="javascript">
              $(document).ready(function () {
                  $("#schedule_date11").datepicker({
                      dateFormat: "d MM yy",
                      minDate: 0
                  });
              });
      </script>


<script>
    function getassignedissue_list()
    {
          // alert();
                document.getElementById('err1').innerHTML=''; 
                 schedule_date = $('#schedule_date11').val();
                 employee_id = $('#employee_id11').val();
                  // alert(schedule_date);
                  // alert(employee_id);
                  if (employee_id!='') 
                  {
                      var datastring = 'schedule_date='+schedule_date+'&employee_id='+employee_id;
                      $.ajax({
                          type: "post",
                          url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
                          cache: false,    
                          data: datastring,
                          success: function(data)
                          {    
                            // alert(data);
                            $('#issuelistdetails1').show();      
                            $('#issue_schedule_list1').html(data);

                            
                           },
                              error: function(){      
                               alert('Error while request..');
                              }
                           });
                          return false;
                  }


    }
</script>
<!--========================== / Date picker javascript ====================================-->

    <!--============================== Time comparision ================================-->
<script type="text/javascript">

function mainInfo11()
{
    // alert();
    var employee_id1 = $('#employee_id11').val();
    var start_date = $('#schedule_date11').val();
    // alert(start_date);
    var startTime = document.getElementById("start_time").value;
    // alert(startTime);
    var endTime = document.getElementById("end_time").value;
    // alert(endTime);



    var newdate = new Date();

    newdate.setDate(newdate.getDate());


    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
    ];

    var dd = newdate.getDate();
    var mm = newdate.getMonth();
    var y = newdate.getFullYear();

    const d = mm;
    var full_month = monthNames[d];

    var someFormattedDate = dd + ' ' + full_month + ' ' + y;
 // alert(someFormattedDate);

    if ((Date.parse(start_date) == Date.parse(someFormattedDate))) 
    {
          var now = new Date();
          // alert(now);
          var curr_time = now.getHours()+':'+now.getMinutes();
          if (startTime>=curr_time) 
          {
               if (startTime >= endTime) 
                {

                   $('#desktopbutton1').prop('disabled', true);
                    new PNotify({
                                   title: 'Schedule',
                                   text: 'End time should be greater than Start time',
                                   type: 'warning'
                                });

                }
                else
                {
                      $('#desktopbutton1').prop('disabled', false);
                }  
          } 
          else
          {
               $('#desktopbutton1').prop('disabled', true);
              new PNotify({
                             title: 'Schedule',
                             text: 'Selected timing is less then current time',
                             type: 'warning'
                          });
          }
    }
    else
    {
      var now = new Date();
          // alert(now);
          var curr_time = now.getHours()+':'+now.getMinutes();
          // alert(startTime);
          // alert(startTime);
          // if (startTime>=curr_time) 
          // {
               if (startTime >= endTime) 
                {

                   $('#desktopbutton1').prop('disabled', true);
                    new PNotify({
                                   title: 'Schedule',
                                   text: 'End time should be greater than Start time',
                                   type: 'warning'
                                });

                }
                else
                {
                      $('#desktopbutton1').prop('disabled', false);
                }  
          // } 
    }
}


</script>
    <!--============================== Time comparision ================================-->

<!-- ================== Check Employee availability ================================== -->
<script type="text/javascript">
 function check_availability()
{
       start_date = $('#schedule_date11').val();
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


}
</script>
<!-- ============================================================================= -->
<!--=======================================  Validation form  ==========================================-->
<!--       <script type="text/javascript">
          $(function () 
          {
              $('#schedule_date1').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now', useCurrent: true});
          });
      </script> -->
   <!--    <script type="text/javascript">
        
      $('#schedule_date11').change(function()
      {
          $('#assignto_form1').bootstrapValidator('revalidateField', 'schedule_date11'); 
      });

      $('#start_time').change(function()
      {
        $('#assignto_form1').bootstrapValidator('revalidateField', 'start_time'); 
      });

      $('#end_time').change(function()
      {
        $('#assignto_form1').bootstrapValidator('revalidateField', 'end_time'); 
      });

      </script> -->
<!-- <script type="text/javascript">
$(document).ready(function() {
$('#assignto_form1').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               employee_id: {
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

             schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select date'
                        }
                }
            },

             start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start time'
                        }
                }
            },

             end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end time'
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
</script> -->
    
<!--======================================= / Validation form  ==========================================-->
<script type="text/javascript">
function form_assignto()
{
       employee = $('#employee_id11').val();
       $('.btn_hide_show').prop('disabled', true);
       // alert(employee);
       start_date = $('#schedule_date11').val();
       event_start_time = $('#start_time').val();
       event_end_time = $('#end_time').val();

        if(employee=='')
        {
          // alert();
          document.getElementById("err1").innerHTML = "Please select employee name";
          $('#desktopbutton1').prop('disabled', false);
          return false;
        }
        else if(start_date=='')
        {
          //alert();
          document.getElementById("err22").innerHTML = "Please select date";
          $('#desktopbutton1').prop('disabled', false);
          return false;
        }
        else if(event_start_time=='')
        {
          document.getElementById("err33").innerHTML = "Please select start time";
          $('#desktopbutton1').prop('disabled', false);
          return false;
        }
          else if(event_end_time=='')
        {
          document.getElementById("err44").innerHTML = "Please select end time";
          $('#desktopbutton1').prop('disabled', false);
          return false;
        }
        else
        {
          // alert();
            $('#btn_hide_show').prop('disabled', true);
            $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" alt="Uploading...." /> ');
              var formresult = $("#assignto_form1").serialize();
               $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/assign_to'); ?>",
                data:  $("#assignto_form1").serialize(),
                cache: false,
                success: function(data)
                {    
                         // alert(data);
                              $('#loader_gif').hide();
                                $('#desktopbutton1').prop('disabled', false);
                               if (data==1) 
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
                               else if(data==2)
                               {
                                    var notice = new PNotify({
                                                title: 'Confirmation',
                                                text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
                                                hide: false,
                                                type: 'warning',
                                                confirm: {
                                                    confirm: true,
                                                    buttons: [
                                                        {
                                                            text: 'Yes',
                                                            addClass: 'btn-sm'
                                                        },
                                                        {
                                                            text: 'No',
                                                            addClass: 'btn-sm'
                                                        }
                                                    ]
                                                },
                                                buttons: {
                                                    closer: false,
                                                    sticker: false
                                                },
                                                history: {
                                                    history: false
                                                }
                                            })

                                             // On confirm
                                            notice.get().on('pnotify.confirm', function()
                                             {


                                                    $.ajax({
                                                               url: "<?php echo base_url('admin/Customer/assign_to_override'); ?>",
                                                                type: "POST",
                                                                data:  formresult,
                                                                cache: false,
                                                                success: function(data)
                                                                {    
                                                                  // alert(data);
                                                                  $(function(){
                                                                             new PNotify({
                                                                                          title: 'Assign Form',
                                                                                          text: 'Assigned  Successfully',
                                                                                          type: 'success'
                                                                                         });
                                                                            });

                                                                              setTimeout(function()
                                                                             {
                                                                                window.location="<?php echo base_url('admin/Customer/Issue');?>";
                                                                             }, 800);

                                                                  
                                                                 },
                                                                  error: function(){      
                                                                   alert('Error while request..');
                                                                  }
                                                               });
                                             })
                                              // On cancel
                                              notice.get().on('pnotify.cancel', function()
                                               {
                                                  // alert('Oh ok. Chicken, I see.');
                                              });
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