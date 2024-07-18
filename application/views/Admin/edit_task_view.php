<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
<?php
// echo "<pre>";
// print_r($edit_detail->row());
if(!empty($edit_detail->row()->customer_id))
{
    $company_name = $this->db->select('company_name')->from('tbl_customer')->where('customer_id',$edit_detail->row()->customer_id)->get()->row()->company_name;
}
else
{
    $company_name = '';
}
?>
<form class="form-horizontal" id="edit_sch_task">
    <div class="row">
        <div class="form-group col-sm-12 d-flex">
            <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="customer_id_type3" name="customer_id" value="<?= $company_name; ?>" readonly>
                <!-- <select class="form-control" name="customer_id" id="customer_id_type3" data-placeholder="Select Company">
                    <option value="">Select Company</option>
                    <?php foreach ($customer_list as $value) { ?>
                        <option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
                            (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                    <?php  } ?>
                </select> -->
            </div>
            <label class="control-label col-sm-2 m-auto" for="Youtube">Employee Name <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" name="employee_id" id="employee_id_type3" onchange="getassignedissueChange12()" data-placeholder="Select Employee">
                    <option value="">Select Employee</option>
                    <?php
                    foreach ($employee_list as $value2) {
                        $all_emp_id = $value2->id;
                        if ($all_emp_id == $edit_detail->row()->assign_to) {
                    ?>
                            <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
                        <?php } else { ?>
                            <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </div>
        <?php
            $user_sess_type = $this->session->user_type;
            if ($this->session->user_type != "SA") {
                $emp_id = $this->session->id;
                $name_emp = $this->session->name;
            } else {
                $emp_id = '';
            }
        ?>
        <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
        <div class="form-group col-sm-12 d-flex">
            <label class="control-label col-sm-2 m-auto" for="Youtube">Product Name <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <!-- <select class="form-control" name="product_id" id="product_id_type3" data-placeholder="Select Product">
                    <option value="">Select Product</option>
                    <?php
                    foreach ($product_list as $value1) { ?>
                        <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                    <?php  } ?>
                </select> -->
                <input type="text" class="form-control" id="product_id_type3" name="product_id" value="<?= $edit_detail->row()->product_name?>" readonly>
            </div>
            <label class="control-label col-sm-2 m-auto" for="email">Comments</label>
            <div class="col-sm-4">
                <textarea class="form-control" rows="1" id="query" name="query" placeholder="Enter Comments" maxlength="500"><?= $edit_detail->row()->issue?></textarea>
            </div>
        </div>
        <div class="form-group col-sm-12" id="issuelistdetails" style="display: none">
            <label class="control-label col-sm-12 m-auto" for="Youtube">Assign issue list</label>
            <div class="col-sm-12" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

            </div>
        </div>
        <div class="form-group col-sm-12 d-flex">
            <label class="control-label col-sm-2 m-auto" for="email">Schedule Date <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                    </span>
                    <input type="text" class="form-control add-activity-selectors rounded-right" id="schedule_date" name="schedule_date" value="<?= date('d F, Y', strtotime($edit_detail->row()->assign_date)); ?>" placeholder="Enter Schedule Date" onchange="getassignedissueChange12()" autocomplete="off">
                </div>
            </div>
            <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" name="schedule_type_id" id="schedule_type_id_type3" data-placeholder="Select Schedule Type">
                    <option value="">Select Schedule Type</option>
                    <!-- <?php foreach ($schedule_visit_list as $st_value) { ?>
                        <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                    <?php  } ?> -->
                    <?php
                    foreach ($schedule_visit_list as $st_value) {
                        $all_schedule_visit_list = $st_value->id;
                        $get_id = $edit_detail->row()->schedule_type_id;
                        if ($all_schedule_visit_list == $get_id) 
                        {
                    ?>
                            <option value="<?= $st_value->id ?>" selected=""><?= $st_value->type_name ?></option>
                        <?php } else { ?>
                            <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12 d-flex">
            <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time <span style="color: red;">*</span></label>
            <div class="col-sm-4 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" id="schedule_start_time_schedule" name="schedule_start_time" placeholder="Select Start Time"  autocomplete="off" readonly>
                <span id="err3" style="color:red; font-size: 12px;"></span>
            </div>
            <label class="control-label col-sm-2 m-auto" for="Youtube">End Time <span style="color: red;">*</span></label>
            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" id="schedule_end_time_schedule" name="schedule_end_time" placeholder="Select End Time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' " autocomplete="off" readonly>
                <span id="err4" style="color:red; font-size: 12px;"></span>
            </div>
        </div>
        <div class="form-group col-sm-12 d-flex">
            <label class="control-label col-sm-2 m-auto" for="Youtube">Priority <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" name="priority_id" id="priority_id_fetch" data-placeholder="Select Priority">
                    <option value="">Select Priority</option>
                    <?php
                    if($edit_detail->row()->priority == 'Normal')
                    {
                    ?>
                    <option value="Normal" selected="">Normal</option>
                    <option value="Low">Low</option>
                    <option value="High">High</option>
                    <?php
                    }
                    else if($edit_detail->row()->priority == 'Low')
                    {
                    ?>
                    <option value="Normal">Normal</option>
                    <option value="Low" selected="">Low</option>
                    <option value="High">High</option>
                    <?php
                    }
                    else if($edit_detail->row()->priority == 'High')
                    {
                    ?>
                    <option value="Normal">Normal</option>
                    <option value="Low">Low</option>
                    <option value="High" selected="">High</option>
                    <?php
                    }
                    else
                    {
                    ?>
                    <option value="Normal">Normal</option>
                    <option value="Low">Low</option>
                    <option value="High">High</option>
                    <?php
                    }
                    ?>
                    
                </select>
            </div>
            <label class="control-label col-sm-2 m-auto" for="Youtube">Status <span style="color: red;">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" name="status" id="status_fetch" data-placeholder="Select Status">
                    <option value="">Select Status</option>
                    <?php
                    if($edit_detail->row()->status == 'Pending')
                    {
                    ?>
                    <option value="Pending" selected="">Pending</option>
                    <option value="Inprogress">In-progress</option>
                    <option value="Completed">Completed</option>
                    <?php
                    }
                    else if($edit_detail->row()->status == 'Inprogress')
                    {
                    ?>
                    <option value="Pending">Pending</option>
                    <option value="Inprogress" selected="">In-progress</option>
                    <option value="Completed">Completed</option>
                    <?php
                    }
                    else if($edit_detail->row()->status == 'Completed')
                    {
                    ?>
                    <option value="Pending">Pending</option>
                    <option value="Inprogress">In-progress</option>
                    <option value="Completed" selected="">Completed</option>
                    <?php
                    }
                    else
                    {
                    ?>
                    <option value="Pending">Pending</option>
                    <option value="Inprogress">In-progress</option>
                    <option value="Completed">Completed</option>
                    <?php
                    }
                    ?>
                </select>
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
                        <select class="form-control" name="user_id[]" id="user_id_type3" data-placeholder="Select User" multiple >
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
                        <select class="form-control" name="reminder_before_time" id="reminder_before_time_type3" data-placeholder="Select Reminder Before Time">
                            <option value="">Select Reminder Before Time</option>
                            <?php foreach ($getTimeSlot as $value) { ?>
                                <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-12" for="email">Notify By <span style="color: red;">*</span></label>
                    <div class="col-sm-12">
                        <select class="form-control" name="reminder_notify_by" id="reminder_notify_type3" data-placeholder="Select Notify By">
                            <option value="">Select Notify By</option> 
                            <?php foreach ($getNotifyBy as $value) { ?>
                                <option value="<?= $value->notify_id ?>"><?= $value->notify_by ?></option>
                            <?php  } ?>
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
                        <select class="form-control" name="recurring_set" id="recurring_set_type3" onchange="showDataRecurring(this.value)" data-placeholder="Select Recurring">
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
                    <select class="form-control" name="interval_type" id="interval_type3" data-placeholder="Select Recurring Interval">
                        <option value="">Select Recurring Interval</option>
                        <option value="day">Day</option>
                        <option value="week">Week</option>
                        <option value="fortnightly">Fortnightly</option>
                        <option value="monthly">Monthly</option>
                        <option value="quaterly">Quaterly</option>
                        <option value="half-quarterly">Half Quarterly</option>
                        <option value="year">Year</option>
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
                        <input type="text" class="form-control pickadate-selectors rounded-right" id="recurring_eod" name="recurring_eod" placeholder="Enter Recurring EOD" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12" style="text-align:end;">
            <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
                Update <i class="icon-arrow-right14 position-right"></i>
            </button>
        </div>
        <div class="col-sm-1">
            <div id="preview"></div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });
</script>

<script type="text/javascript">
  $(document).ready(function(e) {

    $("#edit_sch_task").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) 
      {
        //alert('invalid');
        return false;
      } 
      else 
      {

        $.ajax({
          url: "<?php echo base_url('admin/ScheduleManagement/Edit_Schedule_Task'); ?>",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            PNotify.removeAll()
           alert(data);
            $(function() {
              
              $("#UpdatesuccessModal").modal('show');
            });
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#EditType').bootstrapValidator({
      message: 'This value is not valid',
      fields: {
        source_title: {
          validators: {
            notEmpty: {
              message: 'Please Enter Source Title'
            }
          }
        }
      }
    });
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
                <a href="<?php echo base_url('admin/Leads'); ?>">
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
                <a href="<?php echo base_url('admin/Leads'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function chk_source_list_edit()
    {
        source_title = $('#source_title123').val();
        source_id = $('#source_id123').val();
        
        if (source_title == '') 
        {
            $('#error_source_list123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_source_list_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {source_title: source_title,source_id: source_id},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_source_list123').empty();
                        $('#error_source_list123').css('display','block');
                        $('#error_source_list123').html('Please add another source , this source is already created.');
                        $("#source_list_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_source_list123').hide();
                    }
                }
            });
        }
    }
</script>