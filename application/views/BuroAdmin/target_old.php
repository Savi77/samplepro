
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
   
<!--============================ Date picker adjustment ================================ -->

  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }

    .dataTables_length > label > span:first-child
      {
        float: left;
        margin: 5px 9px;
        margin-left: -15px;
      }
    .datatable-header > div:first-child, .datatable-footer > div:first-child 
    {
        margin-left: 9px !important;
        left: -13px !important;
    }

    input, button, select, textarea 
    {
        height: auto !important;
    }
      .btn-info 
      {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
      }
      .nav-tabs > li > a 
     {
        margin-right: 0;
        color: #ddd !important;
     }

     table.dataTable thead th, table.dataTable thead td 
     {
        padding: 10px 6px;
        border-bottom: 1px solid #111;
    }

  </style>
  <!--============================ / Date picker adjustment ================================ -->

  <!--============================ previous date hide datepicker color changes================================ -->
  <style type="text/css">
  .ui-datepicker table td.ui-state-disabled span 
  {
    color: #2d2d2d;
  }
  .ui-datepicker table td.ui-datepicker-today .ui-state-highlight 
  {
    background-color: #2196F3;
    color: #252424;
  }
   .testing 
  {
    z-index: 100000;
  }
  .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
    font-size: 12px;
    color: #333232;
    margin-left: 5px;
}

.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span
 {
    display: none !important;
 }

 .ui-datepicker table td.ui-datepicker-current-day .ui-state-active 
 {
    background-color: #26A69A;
    color: #333;
}

</style>
<!--============================ / previous date hide datepicker color changes================================ -->
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
<!--========================= Multiple target type assign to employee ===================================-->
<style type="text/css">
  input[type="radio"], input[type="checkbox"] 
  {
    margin: 10px 0 0;
    margin-top: 1px \9;
    line-height: normal;
  }
  .form-horizontal .form-group .form-group 
  {
    /*margin-left: -15px;*/
    margin-right: 0;
  }
</style>
<!--========================= / Multiple target type assign to employee ===================================-->

<?php 
    foreach ($edit_target->result() as $targetvalue) 
    {
       $tr_auto_id = $targetvalue->tr_auto_id;
       $targettype_id = $targetvalue->targettype_id;
       $start_date = $targetvalue->start_date;
       $end_date = $targetvalue->end_date;
    }

 ?>

                 <form class="form-horizontal" id="editTarget_Form">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Youtube">Start Date</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control testing" onchange="mainInfo1(this.value);" id="start_date1" name="start_date" value="<?= date("d M Y", strtotime($start_date)); ?>" disabled="true">
                                </div>
                                <label class="control-label col-sm-2" for="Youtube">End Date</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control testing" onchange="mainInfo1(this.value);" id="end_date1" name="end_date" value="<?= date("d M Y", strtotime($end_date)); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-sm-2" for="Youtube">Target Type</label>
                                  <div class="col-sm-10">
                                        <select class="select-search form-control" name="targettype_id" id="targettype_id1" onchange="mainInfo1()" disabled="true">
                                                  <option value="">Select Target Type</option>
                                                  <?php 
                                                  foreach ($target_type->result() as $value2) 
                                                  { 
                                                      $tt_id = $value2->targettype_id;
                                                      if ($tt_id==$targettype_id) 
                                                        { ?>
                                                            <option value="<?= $value2->targettype_id ?>" selected><?= $value2->target_type ?></option>

                                                    <?php } else {
                                                    ?>
                                                        <option value="<?= $value2->targettype_id ?>"><?= $value2->target_type ?></option>
                                                <?php } } ?>
                                        </select>
                                  </div>
                            </div>
                            <input class="form-control" type="hidden" id="name_values1" name="name_values">

                             <?php

                                $ids1 = array();
                                // $tr_value = array();
                                foreach ($selected_employee_list as  $emp1) 
                                {  
                                   $tr_type_id = $emp1['emp_id'];
                                   $target_value = $emp1['target_value'];
                                   array_push($ids1, $tr_type_id);
                                   // array_push($tr_value, $target_value);
                                }

                              ?>

                            <div class="form-group" id="selectedemployeelist">
                                    <label class="control-label col-sm-2" for="Youtube">Employee list</label>
                                    <div class="col-sm-10">

                                          <?php foreach ($all_employee_list->result() as $emp2) 
                                          { 

                                              echo $id = $emp2->id;

                                              print_r($ids1);

                                            // if ($business_id==$business) 
                                            if (in_array($id, $ids1))
                                            {
                                              echo "if";
                                             ?>
                                                <div class="row">
                                                  <div class="col-md-1 form-group" align="left">
                                                    <input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" checked="" value="<?= $emp2->id ?>">
                                                  </div>
                                                  <div class="col-md-4 form-group">
                                                    <input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp2->name ?>" readonly>
                                                    
                                                  </div>
                                                  <div class="col-md-2 form-group">
                                                    <input class="form-control day1" type="text" id="taget_value" name="taget_value[]" value="<?= $tr_value ?>">
                                                  </div>
                                                     <br>
                                                  </div>
                                    <?php } else { 
                                       echo "else";
                                       ?>

                                                <div class="row">
                                                  <div class="col-md-1 form-group" align="left">
                                                    <input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" value="<?= $emp2->id ?>">
                                                  </div>
                                                  <div class="col-md-4 form-group">
                                                    <input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp2->name ?>" readonly>
                                                    
                                                  </div>
                                                  <div class="col-md-2 form-group">
                                                    <input class="form-control day1" type="text" id="taget_value" name="taget_value[]">
                                                  </div>
                                                     <br>
                                                  </div>
                                    <?php } } ?>
                                    </div>
                            </div>

                            <div class="form-group" id="issuelistdetails1" style="display: none">
                                  <label class="control-label col-sm-2" for="Youtube">Employee list</label>
                                  <div class="col-sm-10" id="issue_schedule_list1">
                                          
                                  </div>
                            </div>
                      </div>
                      <div class="form-group"> 
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary pull-right" id="desktopbutton1">Submit</button>
                        </div>
                        <div id="loader"></div>
                      </div>
            </form>

<!--============================== date comparision and get employee list ================================-->
<script type="text/javascript">

function mainInfo1()
{
  // alert();
   var startDate = document.getElementById("start_date1").value;
    var endDate = document.getElementById("end_date1").value;
 
     if ((Date.parse(startDate) == Date.parse(endDate))) 
    {

        $('#desktopbutton1').prop('disabled', false);
        start_date = $('#start_date1').val();
                 end_date = $('#end_date1').val();
                 targettype_id = $('#targettype_id1').val();

                 if (end_date!='' && targettype_id !='') 
                 {
                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                     // alert(datastring);
                          $.ajax({
                              type: "post",
                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                              cache: false,    
                              data: datastring,
                              success: function(data)
                              {    
                                // alert(data);
                                  $('input:checkbox').removeAttr('checked');

                                  $('#selectedemployeelist').hide(); 
                                  $('#issuelistdetails1').show();   
                                  $('#issue_schedule_list1').html(data);

                                
                               },
                                  error: function(){      
                                   alert('Error while request..');
                                  }
                               });
                              return false;

                  }
       // alert();

    }
    else if ((Date.parse(startDate) > Date.parse(endDate))) 
    {

        $('#desktopbutton1').prop('disabled', true);
        new PNotify({
                       title: 'Event',
                       text: 'End date should be greater than Start date',
                       type: 'warning'
                    });

    }
    else
    {
                $('#desktopbutton1').prop('disabled', false);
                 start_date = $('#start_date1').val();
                 end_date = $('#end_date1').val();
                 targettype_id = $('#targettype_id1').val();
                 if (end_date!='' && targettype_id !='') 
                 {
                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                     // alert(datastring);
                          $.ajax({
                              type: "post",
                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                              cache: false,    
                              data: datastring,
                              success: function(data)
                              {    
                                // alert(data);
                                  $('input:checkbox').removeAttr('checked');
                                  $('#selectedemployeelist').hide(); 
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
}


</script>

<script language="javascript">
        $(document).ready(function () {
            $("#start_date1").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });

        $(document).ready(function () {
            $("#end_date1").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });
</script>
<!--====================================== / date comparision and get employee list ==========================-->

<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#editTarget_Form').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                }
            },
            end_date: {
                validators: {
                    notEmpty: {
                        message: 'Please select end date'
                        }
                }
            },

            targettype_id: {
                validators: {
                    notEmpty: {
                        message: 'Please select target type'
                        }
                }
            },

            fileup1: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Image for Landing Page'
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
    
<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#editTarget_Form").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                               var values = [];
                                $('input[type=checkbox]:checked').each(function(index)
                                {
                                  var id=$(this).val();
                                  values.push(id);
                                });
                              alert(values);
                                // var datastring='areaid='+values;
                    }
                    return false;
                
                }));
            });
</script>


<!--  -->
<script>
 function updatestate(val) 
  {
    // alert(val);
    $.ajax({
    type: "POST",
     url: '<?php echo base_url('admin/Customer/getstate') ?>',
    data:'country_id='+val,
    success: function(data)
    {
      // alert(data);
       $("#state1").html(data);
    }
    });
  }
</script>
<!--  -->

<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
jQuery('#business1').multiselect({
        enableFiltering: true,
        maxHeight:400,
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Select business segment', 
        numberDisplayed: 10, 
        selectAll: false, 
        onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = jQuery('#business1 option:selected');
 
                if (selectedOptions.length >= 10) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = jQuery('#business1 option').filter(function() {
                        return !jQuery(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });

                     new PNotify({
                                      title: 'Message',
                                      text: 'Please Select only 10 business segment',
                                      type: 'warning'
                                     });
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#business1 option').each(function() {
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