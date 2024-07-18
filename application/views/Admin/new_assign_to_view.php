<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
<!-- Theme JS files -->

<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>



<?php
  $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
  
  $schedule_type_id = $schedule_type->schedule_type_id;

  // $this->db->select('*');
  $this->db->select('tbl_customer.company_name,tbl_user_query.*');
  $this->db->join('tbl_customer','tbl_customer.customer_id = tbl_user_query.customer_id','FULL');
  $this->db->where('query_id ',$query['query_id']);
  $scheduleData = $this->db->get('tbl_user_query')->row();
  // echo "<pre>";
  // print_r($scheduleData);
?>

<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">Reshedule Task (<?= $scheduleData->ticket_no.' / '.$scheduleData->company_name?>) </h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
  <form class="form-horizontal" id="assignto_form1" method="post">
    <input type="hidden" class="form-control" id="query_id1" name="query_id" value="<?= $query['query_id'] ?>" placeholder="Enter Company Name">

    <input type="hidden" name="" value="<?= $schedule_type_id; ?>">
    <input type="hidden" name="customer_id" value="<?= $scheduleData->customer_id; ?>">
    <input type="hidden" name="product_id" value="<?= $scheduleData->product_id; ?>">
    <input type="hidden" name="status" value="<?= $scheduleData->status; ?>">
    <input type="hidden" name="priority_id" value="Normal">
    <input type="hidden" name="ticket_no" value="<?= $scheduleData->ticket_no; ?>">
    <input type="hidden" name="edit_id" value="<?= $query['query_id']; ?>">

    <div class="row">

      <div class="form-group col-sm-12 d-flex">
        <label class="control-label col-sm-2" for="Youtube">Resource Name <span style="color: red;">*</span></label>
        <div class="col-sm-4">
          <select class="form-control" name="assign_to" id="assign_to" onchange="getassignedissue_list()" data-placeholder="Select Resource">
            <option value="">Select Resource</option>
            <?php
            foreach ($assign_issue->result() as $value) { ?>
              <option value="<?= $value->id ?>"><?= $value->name ?></option>
            <?php  } ?>
          </select>
          <span id="err1" style="color:red; font-size: 12px;"></span>
        </div>
        <label class="control-label col-sm-2" for="email">Schedule Date <span style="color: red;">*</span></label>
        <div class="col-sm-4">   
          <div class="input-group">
            <span class="input-group-prepend">
              <span class="input-group-text"><i class="icon-calendar5"></i></span>
            </span>
            <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date11" name="schedule_date" id="schedule_date" placeholder="Enter Schedule Date" value="<?= date('d F, Y',strtotime($scheduleData->assign_date)) ?>" onchange="getassignedissue_list()" autocomplete="off" >
          </div>
        </div>
      </div>
      <div class="form-group col-sm-12" id="issuelistdetails1" style="display: none">
        <label class="control-label col-sm-12" for="Youtube">Assigned Task List</label>
        <div class="col-sm-12" id="issue_schedule_list1">

        </div>
      </div>
      <div class="form-group col-sm-12 d-flex">
        <label class="control-label col-sm-2" for="Youtube">Start Time <span style="color: red;">*</span></label>
        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
          <input type="text" placeholder="Select Start Time" class="form-control" id="start_time" name="schedule_start_time" value="" onchange="mainInfo11()" onclick="document.getElementById('err33').innerHTML='' ">
          <span id="err33" style="color:red; font-size: 12px;"></span>
        </div>
        <label class="control-label col-sm-2" for="Youtube">End Time <span style="color: red;">*</span></label>
        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
          <input type="text" placeholder="Select End Time" class="form-control" id="end_time" name="schedule_end_time" value="" onchange="mainInfo11()" onclick="document.getElementById('err44').innerHTML='' ">
          <span id="err44" style="color:red; font-size: 12px;"></span>
        </div>
      </div>

      <div class="form-group col-sm-12 d-flex">
        <label class="control-label col-sm-2" for="Youtube">Select Type <span style="color: red;">*</span></label>
        <div class="col-sm-4">
          <select class="form-control" name="schedule_type_id" id="schedule_type_identity" data-placeholder="Select Type">
            <option value="">Select Type</option>
            <?php
            foreach ($schedule_type_array as $res) { ?>
              <option value="<?= $res->id ?>" <?php if ($res->id == $schedule_type_id) {
                                                // echo 'selected';
                                              } ?>>
                <?= $res->type_name; ?>
              </option>
            <?php  } ?>
          </select>
        </div>
        <label class="control-label col-sm-2" for="email">Comment <span style="color: red;">*</span></label>
        <div class="col-sm-4">   
          <div class="input-group">
            <input type="text" name="query" class="form-control"value="<?= $scheduleData->issue ?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-12 pl-3">
          <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1" >
          <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
      </div>
      <div class="reminderSetting col-sm-12" style="display: none;">
          <div class="row">
              <div class="form-group col-sm-6">
                  <label class="control-label col-sm-12" for="email">User 
                      <span style="color: red;">*</span>
                  </label>
                  <div class="col-sm-12">
                      <select class="form-control" name="user_id[]" id="user_id_type7" data-placeholder="Select User" multiple >
                          <option value="">Select User</option>
                          <?php foreach ($getUserSysyemList as $value1) {   ?>
                              <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                          <?php   }    ?>
                      </select>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                  <label class="control-label col-sm-12" for="email">Reminder Before Time <span style="color: red;">*</span></label>
                  <div class="col-sm-12">
                      <select class="form-control" name="reminder_before_time" id="reminder_before_time_type7" data-placeholder="Select Reminder Before Time">
                          <option value="">Select Reminder Before Time</option>
                          <!-- <?php foreach ($getTimeSlot as $value) { ?>
                              <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                          <?php  } ?> -->
                          <?php foreach ($getTimeSlot as $value) { ?>
                              <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                          <?php  } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                  <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                  <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                  <div class="col-sm-12">
                      <select class="form-control" multiple name="reminder_notify_by[]" id="reminder_notify_type7" data-placeholder="Select Notify By">
                          <option value="">Select Notify By</option> 
                          <!-- <?php foreach ($getNotifyBy as $value) { ?>
                              <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                          <?php  } ?> -->
                          <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                          <?php foreach ($getNotifyBy as $value) { ?>
                              <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                  <label class="control-label col-sm-12" for="email">Notes <span style="color: red;">*</span></label>
                  <div class="col-sm-12">
                      <textarea class="form-control" rows="2" id="reminder_note" name="reminder_note" placeholder="Enter Notes" maxlength="500"></textarea>
                  </div>
              </div>
              <div class="form-group col-sm-12">
                  <label class="control-label col-sm-12" for="email">Recurring <span style="color: red;">*</span></label>
                  <div class="col-sm-12">
                      <select class="form-control" name="recurring_set" id="recurring_set_type7" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
                          <option value="">Select Recurring</option>
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                      </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="recuuringData col-sm-12" style="display: none;clear:both">
          <div class="form-group col-sm-6">
              <label class="control-label col-sm-12" for="email" style="padding-left:0;">Recurring Interval </label>
              <div class="col-sm-12" style="padding-left:0;">
                  <select class="form-control" name="interval_type" id="interval_type7" data-placeholder="Select Recurring Interval">
                      <!-- <option value="">Select Recurring Interval</option>
                      <option value="day">Day</option>
                      <option value="week">Week</option>
                      <option value="fortnightly">Fortnightly</option>
                      <option value="monthly">Monthly</option>
                      <option value="quaterly">Quaterly</option>
                      <option value="half-quarterly">Half Quarterly</option>
                      <option value="year">Year</option> -->
                      <?php
                      if(!empty($get_reminder_details->rem_recurring_interval_name))
                      {
                          if($get_reminder_details->rem_recurring_interval_name == 'day')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day" selected=''>Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'week')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week" selected=''>Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'fortnightly')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly" selected=''>Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'monthly')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly" selected=''>Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'quaterly')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly" selected=''>Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'half-quarterly')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly" selected=''>Half Quarterly</option>
                              <option value="year">Year</option>
                      <?php
                          }
                          else if($get_reminder_details->rem_recurring_interval_name == 'year')
                          {
                      ?>
                              <option value="">Select Recurring Interval</option>
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="fortnightly">Fortnightly</option>
                              <option value="monthly">Monthly</option>
                              <option value="quaterly">Quaterly</option>
                              <option value="half-quarterly">Half Quarterly</option>
                              <option value="year" selected=''>Year</option>
                      <?php
                          }
                      }
                      else
                      {
                      ?>
                          <option value="">Select Recurring Interval</option>
                          <option value="day">Day</option>
                          <option value="week">Week</option>
                          <option value="fortnightly">Fortnightly</option>
                          <option value="monthly">Monthly</option>
                          <option value="quaterly">Quaterly</option>
                          <option value="half-quarterly">Half Quarterly</option>
                          <option value="year">Year</option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
          </div>
          <div class="form-group col-sm-6">
              <label class="control-label col-sm-12" for="email" style="padding-right:0;">Recurring EOD</label>
              <div class="col-sm-12" style="padding-right:0;">
                  <div class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group-text"><i class="icon-calendar5"></i></span>
                      </span>
                      <!-- <input type="text" class="form-control add-activity-selectors rounded-right" id="recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off"> -->
                      <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date11" name="schedule_date" id="schedule_date" placeholder="Enter Schedule Date" value="<?= date('d F, Y',strtotime($scheduleData->assign_date)) ?>" onchange="getassignedissue_list()" autocomplete="off" >
                  </div>
              </div>
          </div>
      </div>
    </div>  
    <!-- <div class="row" style="padding-inline:20px;">
      <p><b>Comment : <?= $scheduleData->issue ?></b></p>
    </div> -->
    <div class="form-group col-sm-12 d-flex" style="padding-bottom:0;">
      <div class="col-sm-10 text-right">
        <div id="loader_gif"></div>
      </div>
      <div class="col-sm-2" style="text-align: right;padding-right: 0;">
        <button type="submit" class="btn btn-primary pull-right btn_hide_show" id="desktopbutton1" >Submit
        <i class="icon-arrow-right14 position-right"></i></button>
      </div>

    </div>
  </form>
</div>

<script>
  $('#schedule_date11').change(function() {
      $('#assignto_form1').bootstrapValidator('revalidateField', 'schedule_date');
  });
  $('#start_time').change(function() {
      $('#assignto_form1').bootstrapValidator('revalidateField', 'start_time');
  });

  $('#end_time').change(function() {
      $('#assignto_form1').bootstrapValidator('revalidateField', 'end_time');
  });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#assignto_form1').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
              assign_to: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Resource'
                        }
                    }
                },
                schedule_date: {
                      validators: {
                          notEmpty: {
                              message: 'Please Select Schedule Date'
                          }
                      }
                  },

                schedule_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Type'
                        }
                    }
                },

                schedule_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Time'
                        }
                    }
                },

                schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Time'
                        }
                    }
                },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Notify By.'
                        }
                    }
                },
                recurring_set: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring Type'
                        }
                    }
                },
                'user_id[]': {
                    validators: {
                        notEmpty: {
                            message: 'Please Select User'
                        }
                    }
                },
                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Notes'
                        }
                    }
                },
                query: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Comment'
                        }
                    }
                },
            }
        });
    });
</script>




<script type="text/javascript">
  $('#assign_to').select2();

  $("#assign_to").select2({
      dropdownParent: $("#modal_default")
    });

  $('#schedule_type_identity').select2();

  $("#schedule_type_identity").select2({
      dropdownParent: $("#modal_default")
  });

  $('#reminder_before_time_type7').select2();

  $("#reminder_before_time_type7").select2({
    dropdownParent: $("#modal_default")
  });
  $('#reminder_notify_type7').select2();

  $("#reminder_notify_type7").select2({
      dropdownParent: $("#modal_default")
  });
  $('#recurring_set_type7').select2();

  $("#recurring_set_type7").select2({
      dropdownParent: $("#modal_default")
  });
  $("#interval_type7").select2({
      dropdownParent: $("#modal_default")
  });

  $('#user_id_type7').select2();
  $('#user_id_type7').select2({
        dropdownParent: $('#modal_default')
    });


  $('.clockpicker').clockpicker({
    placement: 'left',
    align: 'left',
    donetext: 'Done'
  });
    $(function() {
        $("#schedule_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "d F Y"
        });
    });
</script>

<!--========================== Date picker javascript ====================================-->




<script>
  function getassignedissue_list() {
    // alert();
    document.getElementById('err1').innerHTML = '';
    schedule_date = $('#schedule_date11').val();
    employee_id = $('#assign_to').val();
    // alert(schedule_date);
    // alert(employee_id);
    if (employee_id != '') {
      var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + employee_id;
      $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
        cache: false,
        data: datastring,
        success: function(data) {
          // alert(data);
          $('#issuelistdetails1').show();
          $('#issue_schedule_list1').html(data);


        },
        error: function() {
          alert('Error while request..');
        }
      });
      return false;
    }


  }
</script>
<!--========================== / Date picker javascript ====================================-->
    <script language="javascript">
        // $(document).ready(function() {
        //     $('#schedule_date11').datetimepicker({
        //         format: 'DD MMMM, YYYY',
        //         useCurrent: true,
        //     });
        // });

        $('#schedule_date11').pickadate({
            selectYears: 100,
            selectMonths: true
        });
    </script>
<!--============================== Time comparision ================================-->
<script type="text/javascript">
  function mainInfo11() {
    // alert();
    var employee_id1 = $('#assign_to').val();
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

    // if ((Date.parse(start_date) == Date.parse(someFormattedDate))) {
    //   var now = new Date();
    //   // alert(now);
    //   var curr_time = now.getHours() + ':' + now.getMinutes();
    //   if (startTime >= curr_time) {
    //     if (startTime >= endTime) {

    //       $('#desktopbutton1').prop('disabled', true);
    //       new PNotify({
    //         title: 'Schedule',
    //         text: 'End time should be greater than Start time',
    //         type: 'warning'
    //       });

    //     } else {
    //       $('#desktopbutton1').prop('disabled', false);
    //     }
    //   } 
    //   else {
    //     $('#desktopbutton1').prop('disabled', true);
    //     new PNotify({
    //       title: 'Schedule',
    //       text: 'Selected timing is less then current time',
    //       type: 'warning'
    //     });
    //   }
    // } 
    // else 
    // {
    //   var now = new Date();
    //   // alert(now);
    //   var curr_time = now.getHours() + ':' + now.getMinutes();
    //   // alert(startTime);
    //   // alert(startTime);
    //   // if (startTime>=curr_time) 
    //   // {
    //   if (startTime >= endTime) {

    //     $('#desktopbutton1').prop('disabled', true);
    //     new PNotify({
    //       title: 'Schedule',
    //       text: 'End time should be greater than Start time',
    //       type: 'warning'
    //     });

    //   } else {
    //     $('#desktopbutton1').prop('disabled', false);
    //   }
    //   // } 
    // }
  }
</script>
<!--============================== Time comparision ================================-->

<!-- ================== Check Employee availability ================================== -->
<script type="text/javascript">
  function check_availability() {
    start_date = $('#schedule_date11').val();
    start_time = $('#event_start_time').val();
    end_time = $('#event_end_time').val();


    if (start_date == '') {
      //alert();
    } else if (start_time == '') {
      // return false;
    } else if (end_time == '') {
      // return false;
    } else {
      if (start_time > end_time) {
        $('#desktopbutton').prop('disabled', true);
        new PNotify({
          title: 'Task Assign',
          text: 'End time should be greater than Start time',
          type: 'warning'
        });

      } else {
        // alert();
        $('#desktopbutton').prop('disabled', false);
        var datastring = 'start_date=' + start_date + '&start_time=' + start_time + '&end_time=' + end_time;
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Customer/availability'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            // alert(data);
            $('#all_employee').hide();
            $('#available_employee').html(data);

          },
          error: function() {
            alert('Error while request..');
          }
        });
        return false;
      }
    }


  }
</script>

<script>
  $(document).ready(function(e) {
        $("#assignto_form1").on('submit', (function(e) 
        {
          if (e.isDefaultPrevented()) 
          {
                //alert('invalid');
          } 
          else 
          {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);

                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                var status = $('#status').val();
                var employee = $('#employee_list').val();
                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivitySubmit'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $("#preview").hide();
                        if (data == 1) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Re-Schedule',
                                //     text: 'Re-Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $('#reschedule_form_success').modal('show');
                                $('#start_date_get_reschedule').val($('#start_date').val());
                                $("#end_date_get_reschedule").val($('#end_date').val()); 
                                $("#status_get__reschedule").val($('#status').val()); 
                                $("#employee_get_reschedule").val($('#employee_list').val()); 
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            // }, 1000);
                        } else if (data == 2) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Re-Schedule',
                                //     text: 'overlapping',
                                //     type: 'error'
                                // });
                                $('#reschedule_activity').modal('hide');
                                $('#reschedule_form_overlapping').modal('show');
                                $('#start_date_get_reschedule_overlap').val($('#start_date').val());
                                $("#end_date_get_reschedule_overlap").val($('#end_date').val()); 
                                $("#status_get__reschedule_overlap").val($('#status').val()); 
                                $("#employee_get_reschedule_overlap").val($('#employee_list').val()); 
                            });
                            

                        } else if (data == 0) {
                            $(function() {
                            //     new PNotify({
                            //         title: 'Re-Schedule',
                            //         text: 'Failed to submit',
                            //         type: 'error'
                            //     });
                                $('#reschedule_activity').modal('hide');
                                $('#reschedule_form_fail').modal('show');
                            });

                        }



                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
          }  
        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#get_data_form_refresh_reschedule").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                // alert('invalid');
                // $('#default_issue_table').dataTable().fnClearTable();
                // $('#default_issue_table').dataTable().fnDestroy();

                $("#set").hide();
                $("#loader_gif").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                );
                $("#loader_gif").show();

                $.ajax({
                    url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_data'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // console.log(data)
                        $("#loader_gif").hide();
                        $("#reschedule_form_success").modal('hide');
                        $("#all_activity_filter_table").show();
                        $("#all_activity_filter_table").html(data);
                        // $('#ajax_table').DataTable();
                        // animateCSS('#all_activity_filter_table', 'zoomIn');
                        
                    },
                    error: function() {
                        alert('fail');
                    }
                });

            }
            return false;

        }));
    });
</script>

<div class="modal fade" id="reschedule_form_overlapping" tabindex="-1" aria-labelledby="reschedule_form_overlappingLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_overlappingLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule is overlapping.</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="get_data_form_refresh_reschedule_overlap">
                        <input type="hidden" id="start_date_get_reschedule_overlap" name="start_date" value="">
                        <input type="hidden" id="end_date_get_reschedule_overlap" name="end_date" value="">
                        <input type="hidden" id="status_get__reschedule_overlap" name="status" value="">
                        <input type="hidden" id="employee_get_reschedule_overlap" name="employee_list" value="">
                        <button type="hidden" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                    </form>
                    <!-- <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reschedule_form_success" tabindex="-1" aria-labelledby="reschedule_form_successLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_successLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Re-Schedule</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form class="form-horizontal" id="get_data_form_refresh_reschedule">
                    <input type="hidden" id="start_date_get_reschedule" name="start_date" value="">
                    <input type="hidden" id="end_date_get_reschedule" name="end_date" value="">
                    <input type="hidden" id="status_get__reschedulestatus" name="status" value="">
                    <input type="hidden" id="employee_get_reschedule" name="employee_list" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="reschedule_form_fail" tabindex="-1" aria-labelledby="reschedule_form_failLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_failLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to submit.</div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Scheduled Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="scheduleModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Schedule is already assign on this time. Are sure want to overlap this schedule?</div>
                <div class="modal-footer" style="justify-content: center;">
                <form method="POST" id="schedule_addForm_overwrite">
                    <input type='hidden' id='fetchdata' name="formdata" value=''>
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px; margin-right:10px;">Yes</button>
                </form>
                <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>










<script type="text/javascript">
  function form_assignto() {
    employee = $('#assign_to').val();
    $('.btn_hide_show').prop('disabled', true);
    // alert(employee);
    start_date = $('#schedule_date11').val();
    event_start_time = $('#start_time').val();
    event_end_time = $('#end_time').val();

    if (employee == '') {
      // alert();
      document.getElementById("err1").innerHTML = "Please select employee name";
      $('#desktopbutton1').prop('disabled', false);
      return false;
    } else if (start_date == '') {
      //alert();
      document.getElementById("err22").innerHTML = "Please select date";
      $('#desktopbutton1').prop('disabled', false);
      return false;
    } else if (event_start_time == '') {
      document.getElementById("err33").innerHTML = "Please select start time";
      $('#desktopbutton1').prop('disabled', false);
      return false;
    } else if (event_end_time == '') {
      document.getElementById("err44").innerHTML = "Please select end time";
      $('#desktopbutton1').prop('disabled', false);
      return false;
    } else {
      // alert();
      $('#btn_hide_show').prop('disabled', true);
      $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" alt="Uploading...." /> ');
      var formresult = $("#assignto_form1").serialize();
      $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/assign_to'); ?>",
        data: $("#assignto_form1").serialize(),
        cache: false,
        success: function(data) {
          
          $('#loader_gif').hide();
          $('#desktopbutton1').prop('disabled', false);
          if (data == 1) {

            new PNotify({
              title: 'Assign Form',
              text: 'Assigned  Successfully',
              type: 'success'
            });
            $('#modal_default').modal('hide');
            setTimeout(function() {
              window.location = "<?php echo base_url('admin/ScheduleManagement/TrasnsferList'); ?>";
            }, 1000);
          } else if (data == 2) {
            var notice = new PNotify({
              title: 'Confirmation',
              text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
              hide: false,
              type: 'warning',
              confirm: {
                confirm: true,
                buttons: [{
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
            notice.get().on('pnotify.confirm', function() {


              $.ajax({
                url: "<?php echo base_url('admin/Customer/assign_to_override'); ?>",
                type: "POST",
                data: formresult,
                cache: false,
                success: function(data) {
                  // alert(data);
                  $(function() {
                    new PNotify({
                      title: 'Assign Form',
                      text: 'Assigned  Successfully',
                      type: 'success'
                    });
                  });
                  $('#modal_default').modal('hide');
                  setTimeout(function() {
                    window.location = "<?php echo base_url('admin/ScheduleManagement/TrasnsferList'); ?>";
                  }, 800);


                },
                error: function() {
                  alert('Error while request..');
                }
              });
            })
            // On cancel
            notice.get().on('pnotify.cancel', function() {
              // alert('Oh ok. Chicken, I see.');
            });
          }


        },
        error: function() {
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
    maxHeight: 400,
    enableCaseInsensitiveFiltering: true,
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
      } else {
        // Enable all checkboxes.
        jQuery('#employee option').each(function() {
          var input = jQuery('input[value="' + jQuery(this).val() + '"]');
          input.prop('disabled', false);
          input.parent('li').addClass('disabled');
        });
      }
    }
  });


  /*Add This to Block SHIFT Key*/
  var shiftClick = jQuery.Event("click");
  shiftClick.shiftKey = true;

  $(".multiselect-container li *").click(function(event) {
    if (event.shiftKey) {
      //alert("Shift key is pressed");
      event.preventDefault();
      return false;
    } else {
      //alert('No shift hey');
    }
  });
</script>
<!-- ====================================================================================================================== -->
<div class="modal fade" id="reschedule_form_success" tabindex="-1" aria-labelledby="reschedule_form_successLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_successLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Re-Schedule</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <form class="form-horizontal" id="get_data_form_refresh_reschedule">
                    <input type="hidden" id="start_date_get_reschedule" name="start_date" value="">
                    <input type="hidden" id="end_date_get_reschedule" name="end_date" value="">
                    <input type="hidden" id="status_get__reschedulestatus" name="status" value="">
                    <input type="hidden" id="employee_get_reschedule" name="employee_list" value="">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reschedule_form_overlapping" tabindex="-1" aria-labelledby="reschedule_form_overlappingLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_overlappingLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Re-Schedule is overlapping.</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="get_data_form_refresh_reschedule_overlap">
                        <input type="hidden" id="start_date_get_reschedule_overlap" name="start_date" value="">
                        <input type="hidden" id="end_date_get_reschedule_overlap" name="end_date" value="">
                        <input type="hidden" id="status_get__reschedule_overlap" name="status" value="">
                        <input type="hidden" id="employee_get_reschedule_overlap" name="employee_list" value="">
                        <button type="hidden" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Ok</button>
                    </form>
                    <!-- <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reschedule_form_fail" tabindex="-1" aria-labelledby="reschedule_form_failLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="reschedule_form_failLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Re-Schedule</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to submit.</div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>