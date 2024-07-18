<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    .checkbox.crm-email {
        background: #ddd;
        text-align: center;
        padding-top: 10px;
    }

    input#crm-checkbox {
        margin-right: 10px;
    }

    fieldset.form-filedset.email.top-margin {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    input[readonly],textarea[readonly] {
        background-color: #f3f0f0 !important;
    }
   
    #closure_date1 {
        background-color: #fff !important;
        }
    #closure_date1{
        background-color: #fff !important;
    }
    .nav-tabs li.bv-tab-success>a {
        color: #000 !important;
    }
</style>
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text" id="mySpan">New Lead</span>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-solid nav-justified border pl-3 pr-3">
                    <li class="nav-item"><a href="#Leads" class="nav-link active" data-toggle="tab" id="leadtext">New Lead</a></li>
                    <li class="nav-item"><a href="#Opportunity" class="nav-link" data-toggle="tab" id="opptext">Client Engagement</a></li>
                </ul>

                <div class="tab-content">                    
                    <div class="tab-pane fade active show" id="Leads">
                        <form id="LeadForm" method="post">
                            <input type="hidden" name="leadopp_type" value="Lead">
                            <fieldset class="form-filedset email">
                                <legend class="field bulk-email">Contact Info</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Company Name <span class="color-red">*</span></label>
                                                <input type="text" class="form-control" name="org_name_lead" placeholder="Enter Company name" maxlength="50" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label> Contact Person <span class="color-red">*</span></label>
                                                <input type="text" class="form-control" name="contact_person" placeholder="Enter contact person name" maxlength="50" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Contact Number <span class="color-red">*</span></label>
                                                <input type="text" class="form-control" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" autocomplete="off" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label> Email ID </label>
                                                <input type="text" class="form-control" name="email_id" placeholder="Enter email" maxlength="35" autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Address </label>
                                                <textarea class="form-control" name="address" placeholder="Enter address" rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-filedset email top-margin">
                                <legend class="field bulk-email">Enquiry Details</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Interested In  <span class="color-red">*</span></label>
                                                <select name="product_id" id="product_id_lead" class="form-control" data-placeholder="Select Interest">
                                                    <option value="">Select Interest</option>
                                                    <?php
                                                    foreach ($product_list as $res) {
                                                    ?>
                                                    <option value="<?= $res->product_id ?>"><?= $res->product_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Source <span class="color-red">*</span></label>
                                                <select name="source" id="source_lead" class="form-control" data-placeholder="Select Source">
                                                    <option value="">Select Source</option>
                                                    <?php
                                                    foreach ($source_details as $value) {
                                                    ?>
                                                    <option value="<?= $value->source_id ?>"><?= $value->source_title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Stage <span class="color-red">*</span></label>
                                                <select name="stage" id="stage_lead" class="form-control" data-placeholder="Select Stage">
                                                    <option value="">Select Stage</option>
                                                    <?php
                                                    foreach ($stage_details as $value) {
                                                    ?>
                                                    <option value="<?= $value->stage_id ?>"><?= $value->stage_title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Business Segment </label>
                                                <select name="business[]" id="business_lead" multiple class="form-control" style="width: 100%;" data-placeholder="Select Business Segment">
                                                    <span class="caret"></span>
                                                    <?php
                                                    foreach ($business_list as $value1) {
                                                    ?>
                                                    <option value="<?= $value1->business_id ?>"><?= $value1->business_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-filedset email top-margin">
                                <legend class="field bulk-email">Commercials</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expected Closure Date </label>
                                                <input type="text" class="form-control add-activity-selectors rounded-right picker__input picker__input--active" placeholder="Select Closure Date" id="closure_date1" name="closure_date" aria-haspopup="true" aria-expanded="true" aria-readonly="false" aria-owns="P1679127260_root">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Expected Revenue </label>
                                                <input type="text" class="form-control" name="project_business_value" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset class="form-filedset email top-margin">
                                <legend class="field bulk-email">Management</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Generated By </label>
                                                <select name="lead_generated_by" id="lead_generated_by_lead" class="form-control" data-placeholder="Select Generated By">
                                                    <option value="">Select Generated By</option>
                                                    <?php foreach ($employee_list as $emp) {  ?>
                                                    <option value="<?= $emp->id; ?>"><?= $emp->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account Manager <span class="color-red">*</span></label>
                                                <select name="emp_id" id="emp_id_lead" class="form-control" data-placeholder="Select Account Manager">
                                                    <?php if ($this->session->user_type == 'SA') { ?>
                                                    <option value="">Select Account Manager</option>
                                                    <?php  } ?>
                                                    <?php
                                                    foreach ($employee_list as $emp) {
                                                    ?>
                                                    <option value="<?= $emp->id; ?>"><?= $emp->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <!-- <label>Resource Type </label> -->
                                                <label>Branch Name </label>
                                                <select name="branch_id" id="branch_id_lead" class="form-control" data-placeholder="Select Branch Name">
                                                    <option value="">Branch Name</option>
                                                    <?php foreach ($get_branch->result() as $res) {  ?>
                                                        <option value="<?= $res->branch_id; ?>"><?= $res->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-filedset email top-margin">
                                <legend class="field bulk-email">Additional Info</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group" <div class="form-group">
                                                <label>Tag </label>
                                                <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label>Remark </label>
                                                <textarea class="form-control" id="remarkslead" name="remarks" placeholder="Enter Remark" rows="2" maxlength="500"></textarea>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <span style="font-size:13px; ">Max: 500 character</span>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                    <!-- <div class="col-md-12 d-flex">
                                                        <div class="col-md-6"> -->
                                                        <p class="pull-right" style="font-size:13px;">Char Left: <span id="charNum" style="font-size:13px; color:gray;">500</span></p>
                                                        <!-- </div>
                                                        <div class="col-md-6 text-right p-0">
                                                        <div id="charNum" style="font-size:13px; color:gray;">500</div>
                                                        </div>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset class="form-filedset email top-margin">
                                <legend class="field bulk-email">Communication</legend>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group" <div class="form-group">
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

                            <div class="col-sm-12 text-right pr-3">
                                <span id="preview1"></span>
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                <!--  -->
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="Opportunity">

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="Opportunity">
                                <form id="OpportunityForm" method="post">
                                    <input type="hidden" name="leadopp_type" value="Opportunity">
                                    <input type="hidden" name="company_name" id="opp_company_name">
                                    <input type="hidden" class="form-control" id="location_id" name="location_id" maxlength="35">
                                    <input type="hidden" class="form-control" id="business_id" name="business_id" maxlength="35">
                                    <input type="hidden" class="form-control" id="group_id" name="group_id" placeholder="Enter business" maxlength="35">
                                    <fieldset class="form-filedset email">
                                        <legend class="field bulk-email">Contact Info</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Company Name <span class="color-red">*</span></label>
                                                        <select name="company_id" id="company_id" class="form-control" onchange="get_cust_detail(this.value)" data-placeholder="Select company">
                                                            <option value="">Select company</option>
                                                            <?php
                                                            foreach ($array_company as $company) {
                                                            ?>
                                                            <option value="<?= $company->customer_id ?>"><?= $company->company_name; ?> (<?= $company->contact_person_name1 ?> / <?= $company->phone_no ?>)</option>
                                                            <?php } ?>
                                                        </select>
                                                        <small id="company_id_error" style="color: red;display:none;">Please Select Company Name</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Contact Person </label>
                                                        <input type="text" class="form-control" id="contact_person2" name="contact_person" placeholder="Contact person name" maxlength="50" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Contact Number <span class="color-red">*</span></label>
                                                        <input type="text" class="form-control" id="contact_number2" name="contact_number1" placeholder="Contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email Id </label>
                                                        <input type="text" class="form-control" name="email_id" id="email_id2" placeholder="Email" maxlength="35" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Address </label>
                                                        <textarea class="form-control" id="address2" name="address" placeholder="Enter address" rows="1" readonly></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-filedset email top-margin">
                                        <legend class="field bulk-email">Enquiry Details</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Interested In <span class="color-red">*</span></label>
                                                        <!-- <select name="product_id" id="opp_product_id1" class="form-control" onchange="$('#opp_product_id_error').hide();" data-placeholder="Select Interest"> -->
                                                        <select name="product_id" id="opp_product_id1" class="form-control" onchange="checkStageSelection()" data-placeholder="Select Interest">
                                                            <option value="">Select Interest</option>
                                                            <?php
                                                            foreach ($product_list as $res) {
                                                            ?>
                                                            <option value="<?= $res->product_id ?>"><?= $res->product_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <small id="opp_product_id_error" style="color: red;display:none;">Please Select Interest</small>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Source <span class="color-red">*</span></label>
                                                        <!-- <select name="source" id="source_opp1" class="form-control" onchange="$('#source_error').hide();" data-placeholder="Select Source"> -->
                                                        <select name="source" id="source_opp1" class="form-control" onchange="checkStageSelection()" data-placeholder="Select Source">
                                                            <option value="">Select Source</option>
                                                            <?php
                                                            foreach ($source_details as $value) {
                                                            ?>
                                                            <option value="<?= $value->source_id ?>"><?= $value->source_title; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <small id="source_error" style="color: red;display:none;">Please Select Source</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Stage <span class="color-red">*</span></label>
                                                        <!-- <select name="stage" id="stage_opp1" class="form-control" onchange="$('#stage_error').hide();" data-placeholder="Select Stage"> -->
                                                        <select name="stage" id="stage_opp1" class="form-control" onchange="checkStageSelection()" data-placeholder="Select Stage">
                                                            <option value="">Select Stage</option>
                                                            <?php
                                                            foreach ($stage_details as $value) {
                                                            ?>
                                                            <option value="<?= $value->stage_id ?>"><?= $value->stage_title; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <small id="stage_error" style="color: red;display:none;">Please Select Stage</small>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Business Segment </label>
                                                        <input type="text" class="form-control" id="business_opp" name="business1" placeholder="Business Segment" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-filedset email top-margin">
                                        <legend class="field bulk-email">Commercials</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Expected Closure Date </label>
                                                        <input type="text" class="form-control add-activity-selectors rounded-right picker__input picker__input--active" style="background-color: #fff !important;" id="closure_date1" name="closure_date" placeholder="Select Expected Closure Date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Expected Revenue </label>
                                                        <input type="text" class="form-control" name="project_business_value" id = "project_business_value_check" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' autocomplete="off">
                                                        <small id = "project_business_value_check_error" style="color: red;display:none;">Please Enter Numeric Value</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <fieldset class="form-filedset email top-margin">
                                        <legend class="field bulk-email">Management</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Generated By </label>
                                                        <select name="opp_generated_by" id="opp_generated_by1" class="form-control"  data-placeholder="Select Generated By">
                                                            <option value="">Select Generated By</option>
                                                            <?php foreach ($employee_list as $emp) {  ?>
                                                                <option value="<?= $emp->id; ?>"><?= $emp->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Account Manager <span class="color-red">*</span></label>
                                                        <!-- <select name="emp_id" id="opp_emp_id1" class="form-control" onchange="$('#opp_emp_id_error').hide();" data-placeholder="Select Account Manager"> -->
                                                        <select name="emp_id" id="opp_emp_id1" class="form-control" onchange="checkStageSelection()" data-placeholder="Select Account Manager">
                                                            <?php if ($this->session->user_type == 'SA') { ?>
                                                                <option value="">Select Account Manager</option>
                                                            <?php  } ?>
                                                            <?php
                                                            foreach ($employee_list as $emp) {
                                                            ?>
                                                                <option value="<?= $emp->id; ?>"><?= $emp->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <small id="opp_emp_id_error" style="color: red;display:none;">Please Select Account Manager </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <!-- <label>Resource Type </label> -->
                                                        <label>Branch Name </label>
                                                        <select name="branch_id" id="opp_branch_id1" class="form-control" data-placeholder="Select Branch Name">
                                                            <option value="">Branch Name</option>
                                                            <?php foreach ($get_branch->result() as $res) {  ?>
                                                                <option value="<?= $res->branch_id; ?>"><?= $res->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-filedset email top-margin">
                                        <legend class="field bulk-email">Additional Info</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group" <div class="form-group">
                                                        <label>Tag </label>
                                                        <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">

                                                        <label>Remark</label>
                                                        <textarea class="form-control" id="remarksopp" name="remarks" placeholder="Enter Remark" rows="2" maxlength="500"></textarea>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span style="font-size:13px; ">Max 500 character</span>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <!-- <div class="col-md-12 d-flex">
                                                                    <div class="col-md-6"> -->
                                                                        <p class="pull-right" style="font-size:13px;">Char Left: <span id="charNum2" style="font-size:13px; color:gray;">500</span></p>
                                                                    <!-- </div>
                                                                    <div class="col-md-6 text-right p-0">
                                                                        <div id="charNum2" style="font-size:13px; color:gray;">500</div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-filedset email top-margin">
                                        <legend class="field bulk-email">Communication</legend>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group" <div class="form-group">
                                                        <div id="cat" class="form-group has-feedback has-feedback-left panel panel-default border ">
                                                            <div class="checkbox crm-email">
                                                                <label class="checkbox-inline"><input type="checkbox" id="flagData" name="welcome_email_opp" value="Welcome" checked>&nbsp; Send Welcome Mail</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-sm-12 text-right">
                                        <span id="preview2"></span>
                                        <button type="submit" class="btn btn-primary" id="opp_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#opptext').click(function() {
                $('#mySpan').text('Client Engagement');
            });
        });
        $(document).ready(function() {
            $('#leadtext').click(function() {
                $('#mySpan').text('New Lead');
            });
        });
    </script>

    <script>
        function checkStageSelection() {
            var company_id = $("#company_id").val();
            var source_opp = $("#source_opp1").val();
            var stage_opp = $("#stage_opp1").val();
            var opp_product_id = $("#opp_product_id1").val();
            var opp_emp_id = $("#opp_emp_id1").val();
            if(company_id != '' || source_opp != '' || stage_opp != '' || opp_product_id != '' || opp_emp_id != '')
            // if (selectedStage === '') 
            {
                if(company_id != '')
                {
                    $('#company_id_error').hide();
                    $('#opp_sub_btn').prop('disabled', false);

                }
                if(source_opp != '')
                {
                    $('#source_error').hide();
                    $('#opp_sub_btn').prop('disabled', false);

                }
                if(stage_opp != '')
                {
                    $('#stage_error').hide();
                    $('#opp_sub_btn').prop('disabled', false);

                }
                if(opp_product_id != '')
                {
                    $('#opp_product_id_error').hide();
                    $('#opp_sub_btn').prop('disabled', false);

                }
                if(opp_emp_id != '')
                {
                    $('#opp_emp_id_error').hide();
                    $('#opp_sub_btn').prop('disabled', false);

                }

            } 
            else 
            {
                $('#opp_sub_btn').prop('disabled', true);
            }
        }
    </script>

    <?php $this->load->view('Admin/includes/n-footer'); ?>
    <script>
        $('#business_lead').select2();

        $("#remarkslead").keyup(function() {
            el = $(this);
            if (el.val().length >= 500) {
            el.val(el.val().substr(0, 500));
            $("#charNum").text(0);
            } else {
            $("#charNum").text(500 - el.val().length);
            }
        });

        $("#remarksopp").keyup(function() {
            el = $(this);
            if (el.val().length >= 500) {
            el.val(el.val().substr(0, 500));
            $("#charNum2").text(0);
            } else {
            $("#charNum2").text(500 - el.val().length);
            }
        });

        function get_cust_detail(value) {
            var datastring = 'customerid=' + value;
            
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/get_cust_detail'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                // alert(data);
                var obj = JSON.parse(data);
                $('#opp_company_name').val(obj[0].company_name);
                $('#contact_person2').val(obj[0].contact_person_name1);
                $('#address2').val(obj[0].address);
                $('#contact_number2').val(obj[0].phone_no);
                $('#email_id2').val(obj[0].email);
                $('#location_opp').val(obj[0].location);
                $('#city1').val(obj[0].city);
                // alert(obj[0].business_name);
                $('#business_opp').val(obj[0].business_name);
                $('#group_opp').val(obj[0].group_name);
                $('#location_id').val(obj[0].location_id);
                $('#business_id').val(obj[0].business_id);
                $('#group_id').val(obj[0].group_id);
                $('#company_id_error').hide();
            },
            error: function() {
                alert('Error while request..');
            }
            });
        }

        $(document).ready(function() {
            $('#LeadForm').bootstrapValidator({
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
                    contact_person: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Contact Person'
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
                    branch_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Branch Name '
                            }
                        }
                    },
                    stage: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Stage'
                            }
                        }
                    },

                    project_business_value: {
                        validators: {
                            regexp: {
                                regexp: '^(0|[1-9][0-9]*)$',
                                message: 'Please Enter Numeric Value'
                            }
                        }
                    },
                }
            });
        });

        $(document).ready(function(e) {
            $("#LeadForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $("#preview1").show();
                    $("#preview1").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/InsertLead'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview1").hide();
                            // new PNotify({
                            //     title: 'Add Leads',
                            //     text: 'Leads Added  Successfully',
                            //     type: 'success'
                            // });
                            $('#successModalleadcreate').modal('show');

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                            // }, 1000);

                        },
                        error: function() {
                            $(function() {
                                // new PNotify({
                                //     title: 'Leads / Opportunity Add',
                                //     text: 'Failed to load page',
                                //     type: 'warning'
                                // });
                                $('#failleadcreateModal').modal('show');
                            });
                        }
                    });
                }
                return false;

            }));
        });
    </script>
    <script type="text/javascript">
        $('#product_id_lead').select2();
        $('#source_lead').select2();
        $('#stage_lead').select2();
        $('#business_lead').select2();
        $('#lead_generated_by_lead').select2();
        $('#emp_id_lead').select2();
        $('#branch_id_lead').select2();
    </script>
    <script>

        // $(document).ready(function(e){
        //     $('#OpportunityForm').bootstrapValidator({
        //         message: 'This value is not valid',
        //         fields: {
        //             project_business_value: {
        //                     validators: {
        //                         regexp: {
        //                             regexp: '^(0|[1-9][0-9]*)$',
        //                             message: 'Please Enter Numeric Value'
        //                         }
        //                     }
        //                 }
        //         }
        //     });
        // });

        $(document).ready(function(e) {
            $("#OpportunityForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    var company_id = $("#company_id").val();
                    var source_opp = $("#source_opp1").val();
                    var stage_opp = $("#stage_opp1").val();
                    var opp_product_id = $("#opp_product_id1").val();
                    var opp_emp_id = $("#opp_emp_id1").val();
                    // var project_business_value_check = $("#project_business_value_check").val();
                    // var check = /^(0|[1-9][0-9]*)$/.test($("#project_business_value_check").val()); 
                    
                    // if(company_id == '' || source_opp == '' || stage_opp == '' || opp_product_id == '' || opp_emp_id == ''){
                        
                    //     if (company_id == '') {
                    //         $("#company_id_error").show();
                    //         $("#opp_sub_btn").attr('disabled', true);
                    //     } 
                    //     if (source_opp == '') {
                    //         $("#source_error").show();
                    //         $("#opp_sub_btn").attr('disabled', true);
                    //     } 
                    //     if (stage_opp == '') {
                    //         $("#stage_error").show();
                    //         $("#opp_sub_btn").attr('disabled', true);
                    //     } 
                    //     if (opp_product_id == '') {
                    //         $("#opp_product_id_error").show();
                    //         $("#opp_sub_btn").attr('disabled', true);
                    //     } 
                    //     if (opp_emp_id == '' ) {
                    //         $("#opp_emp_id_error").show();
                    //         $("#opp_sub_btn").attr('disabled', true);
                    //     } 
                    //     // if(project_business_value_check == '')
                    //     // {

                    //     // }
                    //     // else
                    //     // {
                    //     //     if(check == false)
                    //     //     {
                    //     //         $("#project_business_value_check_error").show();
                    //     //         $("#opp_sub_btn").attr('disabled', true);
                    //     //     } 
                    //     // }
                    // }
                    // if (company_id == '') {
                    //     $("#company_id_error").show();
                    // } 
                    // else if (source_opp == '') {
                    //     $("#source_error").show();
                    // } 
                    // else if (stage_opp == '') {
                    //     $("#stage_error").show();
                    // } 
                    // else if (opp_product_id == '') {
                    //     $("#opp_product_id_error").show();
                    // } 
                    // else if (opp_emp_id == '') {
                    //     $("#opp_emp_id_error").show();
                    // } 
                    
                        $("#preview2").show();
                        $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                        $.ajax({
                            url: "<?php echo base_url('admin/Leads/InsertOpportunity'); ?>",
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                $("#preview2").hide();
                                // new PNotify({
                                //     title: 'Add Opportunity',
                                //     text: 'Opportunity Added  Successfully',
                                //     type: 'success'
                                // });
                                $(function() {
                                    $('#successModaloppcreate').modal('show');
                                });
                                

                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                                // }, 1000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Leads / Opportunity Add',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#failoppcreateModal').modal('show');
                                });
                            }
                        });
                
                }
                return false;
            }));
        });
    </script>
    <script>
        $(document).ready(function(e){
            $('#OpportunityForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    project_business_value: {
                            validators: {
                                regexp: {
                                    regexp: '^(0|[1-9][0-9]*)$',
                                    message: 'Please Enter Numeric Value'
                                }
                            }
                        }
                }
            });
        });
    </script>

<script type="text/javascript">
        $('#product_id').select2();
        $('#source').select2();
        $('#stage_1').select2();
        $('#lead_generated_by').select2();
        $('#emp_id_1').select2();
        $('#branch_id_1').select2();
        $('#company_id').select2();
        $('#opp_product_id1').select2();
        $('#source_opp1').select2();
        $('#stage_opp1').select2();
        $('#opp_generated_by1').select2();
        // $('#business_opp').select2();
        $('#opp_branch_id1').select2();
        $('#opp_account_id').select2();
        $('#opp_emp_id1').select2();
        
</script>
<script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
</script>


<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="failleadcreateModal" tabindex="-1" aria-labelledby="failleadcreateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failleadcreateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalleadcreate" tabindex="-1" aria-labelledby="successModalleadcreateLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalleadcreateLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Lead Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="failloppcreateModal" tabindex="-1" aria-labelledby="failloppcreateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failloppcreateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModaloppcreate" tabindex="-1" aria-labelledby="successModaloppcreateLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModaloppcreateLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
            
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Opportunity Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>