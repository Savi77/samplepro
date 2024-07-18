<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/picker_date.js"></script>

<style>
    .form-control-feedback {
        position: absolute;
        top: 0 !important;
    }
    .checkbox.crm-email {
        background: #ddd;
        text-align: center;
        padding-top: 10px;
    }
</style>

<?php

    if ($lead_data->closure_date == '0000-00-00' || $lead_data->closure_date == '1970-01-01') {
        $closure_date = '';
    } else {
        $closure_date = date("d F, Y", strtotime($lead_data->closure_date));
    }

    $ids = array();
    $selected = $lead_data->business_id;

    $selectedstudent = trim($selected, ',');
    $explode = explode(",", $selectedstudent);
    for ($i = 0; $i < count($explode); $i++) {
        $student_id = $explode[$i];
        array_push($ids, $student_id);
    }
    if($lead_data->customer_type == 'Opportunity')
    {
        $type_name = 'Client Engagement';
    }
    else if($lead_data->customer_type == 'Lead')
    {
        $type_name = 'New Lead';
    }
    
?>

<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">Edit <?= $type_name; ?> For <?= $lead_data->lead_generate_id; ?> </h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
    <div class="row" id="Lead_edit">
        <form id="EditLeadForm" method="post">
            <input type="hidden" name="leadopp_type" id="leadopp_type" value="<?= $lead_data->customer_type; ?>">
            <input type="hidden" name="leadopp_id" value="<?= $lead_data->leadopp_id; ?>">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Contact Info</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control" name="org_name_lead" placeholder="Enter Company name" maxlength="50" autocomplete="off" value="<?= $lead_data->company_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Person <sup style="color: red">*</sup></label></label>
                                    <input type="text" class="form-control" name="contact_person" placeholder="Enter contact person name" maxlength="50" autocomplete="off" value="<?= $lead_data->contact_person_name1; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" autocomplete="off" value="<?= $lead_data->phone_no; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email ID  </label>
                                    <input type="text" class="form-control" name="email_id" placeholder="Enter email" maxlength="35" autocomplete="off" value="<?= $lead_data->email; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address  </label>
                                    <textarea class="form-control" name="address" placeholder="Enter address" rows="1"><?= $lead_data->address; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Enquiry Details</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Interested In  <sup style="color: red">*</sup></label>
                                    <select name="product_id" class="form-control select2" id="product_id_2" data-placeholder="Select Interest">
                                        <option value="">Select Interest</option>
                                        <?php
                                        foreach ($product_list as $res) {
                                        ?>
                                            <option value="<?= $res->product_id ?>" <?php if ($res->product_id == $lead_data->product_id) { echo 'selected'; } ?>>
                                                <?= $res->product_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Source  <sup style="color: red">*</sup></label>
                                    <select name="source" id="source_2" class="form-control select2" data-placeholder="Select Source">
                                        <option value="">Select Source</option>
                                        <?php
                                        foreach ($source_details as $value) {
                                        ?>
                                            <option value="<?= $value->source_id ?>" <?php if ($value->source_id == $lead_data->source) { echo 'selected'; } ?>>
                                                <?= $value->source_title; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stage  <sup style="color: red">*</sup></label>
                                    <select name="stage" class="form-control select2" id="stage_2" data-placeholder="Select Stage">
                                        <option value="">Select Stage</option>
                                        <?php foreach ($stage_details as $value) { ?>
                                            <option value="<?= $value->stage_id ?>" <?php if ($value->stage_id == $lead_data->stage) { echo 'selected'; } ?>>
                                                <?= $value->stage_title; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Segment  </label></br>
                                    <select name="business[]" id="business_lead" multiple class="form-control" placeholder="Select Business Segment" multiple>
                                        <!-- <span class="caret"></span> -->
                                        <?php
                                        foreach ($business_list as $value1) {
                                            $business_id = $value1->business_id;
                                        ?>
                                            <option value="<?= $value1->business_id ?>" <?php if (in_array($business_id, $ids)) { echo 'selected="selected"'; } ?>>
                                                <?= $value1->business_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            

                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Commercials</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expected Closure Date  </label>
                                    <input type="text" class="form-control add-activity-selectors rounded-right" value="<?= $closure_date; ?>" id="edit_closure_date" name="closure_date" placeholder="Expected Closure Date" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expected Revenue  </label>
                                    <input type="text" class="form-control" name="project_business_value" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' autocomplete="off" value="<?= $lead_data->project_business_value; ?>">
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Management</legend>
                        <div class="row">
                            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Generated By </label>
                                <select name="lead_generated_by" id="edit_generated" class="form-control select2" data-placeholder="Select Generated By">

                                   <option value="">Select Generated By</option>
                                    <?php 
                                    foreach ($employee_list as $emp) {  
                                    ?>
                                    <option value="<?= $emp->id ?>" <?php if ($emp->id == $lead_data->generated_by) { echo 'selected="selected"'; } ?>>
                                    <?= $emp->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Manager  <sup style="color: red">*</sup></label>
                                <select name="emp_id" id="edit_emp_id" class="form-control select2">
                                    <?php if ($this->session->user_type == 'SA') { ?>
                                    <option value="">Select Account Manager</option>
                                    <?php  } ?>
                                    <?php
                                    foreach ($employee_list as $emp) {
                                    ?>
                                    <option value="<?= $emp->id ?>" <?php if ($emp->id == $lead_data->assign_to) { echo 'selected="selected"'; } ?>>
                                    <?= $emp->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch Name </label>
                                <select name="branch_id" id="edit_branch" class="form-control select2" data-placeholder="Select Branch Name">
                                    <option value="">Branch Name</option>
                                    <?php foreach ($get_branch->result() as $res) {  ?>
                                        <option value="<?= $res->branch_id; ?>" <?php if ($res->branch_id == $lead_data->branch_id) { echo 'selected="selected"'; } ?>>
                                        <?= $res->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        </div>
                        

                    </fieldset>
                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Additional Info</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tag  </label>
                                    <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40" autocomplete="off" value="<?= $lead_data->tag; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Remark  </label>
                                    <textarea class="form-control" id="remarkslead" name="remarks" placeholder="Enter Remark" rows="2" maxlength="500"><?= $lead_data->remarks; ?></textarea>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span style="font-size:13px; ">Max: 500 character</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <!-- <div class="col-md-12 d-flex">
                                                <div class="col-md-10 text-right"> -->
                                                    <p class="pull-right" style="font-size:13px;">Char Left: <span id="charNum" style="font-size:13px; color:gray;">500</span></p>

                                                    <!-- <p class="pull-right" style="font-size:13px;">Char Left:</p>
                                                </div>
                                                <div class="col-md-2 text-right p-0">
                                                    <div id="charNum" style="font-size:13px; color:gray;">500</div>
                                                </div> 
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php
                    if($lead_data->welcome_email_status != 1)
                    {
                    ?>
                    <fieldset class="form-filedset email top-margin">
                        <legend class="field bulk-email">Communication</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group" class="form-group">
                                        <div id="cat" class="form-group has-feedback has-feedback-left panel panel-default border ">
                                            <div class="checkbox crm-email">
                                                <label class="checkbox-inline"><input type="checkbox" id="flagData" name="welcome_email_lead" value="Welcome" checked>&nbsp; Send Welcome Mail</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php
                    }
                    ?>

                </div>
                <div class="text-right" style="padding-right:15px;">
                    <button type="submit" class="btn btn-primary" style="margin: 5px;">Update <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview31"></span>
                </div>
                </fieldset>

                <br />

            </div>
    </div>
    </form>
</div>
</div>



<script type="text/javascript">
    $("#remarkslead").keyup(function() {
        el = $(this);
        if (el.val().length >= 500) {
            el.val(el.val().substr(0, 500));
            $("#charNum").text(0);
        } else {
            $("#charNum").text(500 - el.val().length);
        }
    });
</script>

<script type="text/javascript">
    // $(function() {
    //     $('#edit_closure_date').pickadate({
    //         today: '',
    //         close: '',
    //         clear: 'Clear selection'
    //     });
    // });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditLeadForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                org_name_lead: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Company Name'
                        }
                    }
                },
                contact_number1: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact Number'
                        }
                    }
                },
                source: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Source'
                        }
                    }
                },
                product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Interest'
                        }
                    }
                },
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Account Manager '
                        }
                    }
                },
                stage: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Stage'
                        }
                    }
                }
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(e) {
        $("#EditLeadForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                // alert('invalid');
            } else {
                $("#preview31").show();
                $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $.ajax({
                    url: "<?php echo base_url('admin/Leads/UpdateLead'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#preview31").hide();
                        // new PNotify({
                        //     title: 'Update <?= $lead_data->customer_type; ?>',
                        //     text: '<?= $lead_data->customer_type; ?> Updated  Successfully',
                        //     type: 'success'
                        // });

                        $('#UpdatesuccessModal').modal('show');

                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 1000);
                        return false;

                    },
                    error: function() {
                        $(function() {
                            $('#updateErrorModal').modal('show');
                            // new PNotify({
                            //     title: 'Leads Transfer',
                            //     text: 'Failed to load page',
                            //     type: 'warning'
                            // });
                        });
                    }
                });
            }
            return false;

        }));
    });
</script>





<!-- commented script for multiselect which is done by previous developer -->


<script type="text/javascript">
    jQuery('#business_lead').multiselect({
        enableFiltering: true,
        maxHeight: 170,
        enableCaseInsensitiveFiltering: true,
        nonSelectedText: 'Select business segment',
        numberDisplayed: 10,
        selectAll: false,
        onChange: function(option, checked) {
            // Get selected options.
            var selectedOptions = jQuery('#business_lead option:selected');

            if (selectedOptions.length >= 10) {
                // Disable all other checkboxes.
                var nonSelectedOptions = jQuery('#business_lead option').filter(function() {
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
            } else {
                // Enable all checkboxes.
                jQuery('#business option').each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
            }
        }
    });

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
<!-- <script type="text/javascript">
    
        $('#edit_branch').select2({
            dropdownParent: $("#editmodal")
        });
        $('#edit_generated').select2({
            dropdownParent: $("#editmodal")
        });
        $('#product_id_2').select2({
            dropdownParent: $("#editmodal")
        });
        $('#source_2').select2({
            dropdownParent: $("#editmodal")
        });
        // $('#business_lead').select2({
        //     dropdownParent: $("#editmodal")
        // });
        $('#stage_2').select2({
            dropdownParent: $("#editmodal")
        });
        $('#edit_emp_id').select2({
            dropdownParent: $("#editmodal")
        })
        
    </script> -->

<script>
    $('body').on('shown.bs.modal', '#editmodal', function() {
        $(this).find('.select2').each(function() {
            $(this).select2({ dropdownParent: $('#editmodal') });
        });
    });
            
    $('#editmodal').on('scroll', function (event) {
        $(this).find(".select2").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
    });

</script>

    <script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
    </script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
            <?php
            $text =  $lead_data->customer_type." Updated Successfully";
            ?>
        <div class="modal-body" style="font-size: 18px;text-align: center;"><?= $text; ?></div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='.$lead_data->leadopp_id.''); ?>">
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
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='.$lead_data->leadopp_id.''); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>

    var max = new Date();
        $('#edit_closure_date').pickadate({
            selectYears: 100,
            selectMonths: true,
            min: max,
        });
    </script>