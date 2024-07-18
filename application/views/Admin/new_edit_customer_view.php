<?php $this->load->view('Admin/includes/n-header'); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Edit Contact</span>
            </div>

            <form class="form-vertical" id="EditCustomerForm" method="post">
                <?php foreach ($edit_customerresult->result() as $row1) {
                    if ($row1->company_anniversary != '') 
                    {
                        if($row1->company_anniversary == '1970-01-01')
                        {
                            $company_anniversary = '';
                        }
                        else
                        {
                            $company_anniversary = date("d F, Y", strtotime($row1->company_anniversary));
                        }
                        
                    } 
                    else 
                    {
                        $company_anniversary = '';
                    }

                    if ($row1->dob != '') 
                    {
                        if($row1->dob == '1970-01-01')
                        {
                            $dob = '';
                        }
                        else
                        {
                            $dob = date("d F, Y", strtotime($row1->dob));
                        }
                        
                    } 
                    else 
                    {
                        
                        $dob = '';
                    }

                    if ($row1->marriage_anniversary != '') {
                        $marriage_anniversary = date("d F, Y", strtotime($row1->marriage_anniversary));
                    } else {
                        $marriage_anniversary = '';
                    }
                ?>
                    <input type="hidden" class="form-control textWidth" id="customer_id" name="customer_id" value="<?= $row1->customer_id ?>">
                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Basic Info</legend>
                        <div class="panel-body width-100">
                            <div class="col-md-12 dflex responsive">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-6" for="email">Contact Type</label>
                                    </div>
                                </div>
                                <?php
                                if ($row1->parent_id == '0') {
                                    $primary = 'display:block';
                                    $secondary = 'display:none';
                                ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="primary" checked="" onclick="customertype(this.value)"></span><span class="padding-left">Primary</span></lable>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="secondary" onclick="customertype(this.value)"></span><span class="padding-left">Secondary</span>
                                            </label>
                                        </div>
                                    </div>
                                <?php   } else {
                                    $primary = 'display:none';
                                    $secondary = 'display:block';
                                ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="Primery" onclick="customertype(this.value)"></span><span class="padding-left">Primary</span></lable>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="secondary" checked="" onclick="customertype(this.value)"></span><span class="padding-left">Secondary</span>
                                            </label>
                                        </div>
                                    </div>
                                <?php   }   ?>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div id="Primery_display" style="<?= $primary ?>">
                                        <div class="form-group">
                                            <label> Contact Name <span class="color-red">*</span></label>
                                            <input type="text" class="form-control" id="ordanizer_name" name="ordanizer_name" onkeyup="bind_mailing_name(this.value)" placeholder="Enter Company name" maxlength="100" value="<?= $row1->company_name ?>">
                                        </div>
                                    </div>
                                    <div id="secondary_display" style="<?= $secondary ?>">
                                        <div class="form-group">
                                            <label>Contact Name <span class="color-red">*</span></label>
                                            <select class="form-control" name="parentid" id="parentid" data-placeholder="Select Company Name">
                                                <option value="">Select Company Name</option>
                                                <?php foreach ($editprimary_customer->result() as $value21) {
                                                    $cust_id = $value21->customer_id;
                                                    $parentid = $row1->parent_id;
                                                    if ($parentid == $cust_id) {
                                                ?>
                                                        <option value="<?= $value21->customer_id ?>" selected=""><?= $value21->company_name; ?></option>
                                                    <?php  } else { ?>
                                                        <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Mailing Name <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="mailing_name" id="mailing_name" placeholder="Enter Mailing name" maxlength="100" value="<?= $row1->mailing_name ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <?php
                                        $contact_type = $this->db->select('contact_code_id')->from('tbl_organisation')->where('org_id', $this->session->org_id)->get()->row()->contact_code_id;
                                        if(!empty($contact_type))
                                        {
                                            if($contact_type == 1)
                                            {
                                            ?>
                                                <label>Contact Code</label>
                                                <input type="text" class="form-control" name="contact_code" id="contact_code" maxlength="15" placeholder="Enter Contact Code">
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <?php
                                            }
                                        ?>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Contact Code <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="contact_code" maxlength="15" value="<?= $row1->contact_code ?>" placeholder="Enter Contact Code">
                                    </div>
                                </div> -->
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Contact Details</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Contact Person <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50" value="<?= $row1->contact_person_name1 ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Mobile Number <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Enter Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->phone_no ?>">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Alternate Number </label>
                                        <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Enter Alternate Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->alternate_number ?>">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Landline Number </label>
                                        <input type="text" class="form-control" id="landline_number" name="landline_number" placeholder="Enter Landline Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->landline_number ?>">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email ID <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email" maxlength="35" value="<?= $row1->email ?>">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Alternate Email </label>
                                        <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id" placeholder="Enter Alternate Email" maxlength="35" value="<?= $row1->alternate_email ?>">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Country <span class="color-red">*</span></label>
                                        <select class="form-control" onChange="updatestate(this.value);" name="country" id="addContryId" data-placeholder="Select Country">
                                            <option value="">Select Country</option>
                                            <?php foreach ($country_list1 as $value5) {
                                                $country_id = $value5->id;
                                                $country = $row1->country;

                                                if ($country_id == $country) {
                                            ?>
                                                    <option value="<?= $value5->id ?>" selected><?= $value5->name; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>State <span class="color-red">*</span></label>
                                        <select name="state" id="state" class="form-control" data-placeholder="Select state">
                                            <option value="">Select state</option>
                                            <?php foreach ($selected_state_list as $value6) {
                                                $state_id = $value6->id;
                                                $state = $row1->state;
                                                if ($state_id == $state) {
                                            ?>
                                                    <option value="<?= $value6->id ?>" selected><?= $value6->name; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value6->id ?>"><?= $value6->name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>City <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50" value="<?= $row1->city ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50" value="<?= $row1->city ?>">
                                    </div>
                                </div> -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Address <span class="color-red">*</span></label>
                                        <textarea class="form-control" name="address" placeholder="Enter Address" maxlength="200" col="5" row="3"><?= $row1->address ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Pincode </label>
                                        <textarea class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="6" col="5" row="3"><?= $row1->pincode ?></textarea>

                                        <!-- <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="6" value="<?= $row1->pincode ?>"> -->
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email" style="margin-bottom:6px;"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                                        <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch by google address" maxlength="200" readonly col="5" row="3"><?= $row1->address2 ?></textarea>
                                        <input type="hidden" name="g_lat" id="g_lat" value="<?= $row1->g_lat; ?>">
                                        <input type="hidden" name="g_long" id="g_long" value="<?= $row1->g_long ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- <fieldset class="form-filedset email">
                        <legend class="field bulk-email">TAXATION DETAILS</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Type <span class="color-red">*</span></label>
                                        <select class="form-control" name="registration_type" id="registration_type2" title="Select Registration Type">
                                            <option value="">Select Registration Type</option>
                                            <option value="Regular" <?php echo $reg_type = ($row1->registration_type == 'Regular') ? "selected" : ""; ?>>Regular</option>
                                            <option value="Composition" <?php echo $reg_type = ($row1->registration_type == 'Composition') ? "selected" : ""; ?>>Composition</option>
                                            <option value="Consumer" <?php echo $reg_type = ($row1->registration_type == 'Consumer') ? "selected" : ""; ?>>Consumer</option>
                                            <option value="Unregistered" <?php echo $reg_type = ($row1->registration_type == 'Unregistered') ? "selected" : ""; ?>>Unregistered</option>
                                            <option value="Unknown" <?php echo $reg_type = ($row1->registration_type == 'Unknown') ? "selected" : ""; ?>>Unknown</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>GST No. </label>
                                        <input type="text" class="form-control" name="gstin" placeholder="Enter GST No." maxlength="15" value="<?= $row1->gstin ?>">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>PAN No. </label>
                                        <input type="text" class="form-control" name="pan_no" placeholder="Enter Pan No." value="<?= $row1->pan_no ?>">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>TAN No. </label>
                                        <input type="text" class="form-control" name="tan_no" placeholder="Enter Tan No." value="<?= $row1->tan_no ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset> -->
                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Calendar</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Date Of Birth </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" readonly="" id="dob" name="dob" value="<?= $dob ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Company Anniversay </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Company Aniversary" readonly="" id="company_aniversary" name="company_aniversary" value="<?= $company_anniversary ?>">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Marriage Anniversary </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" readonly="" id="marriage_aniversary" name="marriage_aniversary" value="<?= $marriage_anniversary ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Other Info</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Contact Type </label>
                                        <select name="type" id="type" class="form-control" data-placeholder="Select Type">
                                            <option value="">Select Type</option>
                                            <?php foreach ($type_list1 as $value) {
                                                $type_id = $value->type_id;
                                                $type = $row1->type_id;
                                                if ($type_id == $type) {
                                            ?>
                                                    <option value="<?= $value->type_id ?>" selected><?= $value->title; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value->type_id ?>"><?= $value->title; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Group </label>
                                        <select name="group" id="group" class="form-control" data-placeholder="Select Group">
                                            <option value="">Select Group</option>
                                            <?php foreach ($group_list1 as $value2) {
                                                $group_id = $value2->group_id;
                                                $group = $row1->group_id;
                                                if ($group_id == $group) {
                                            ?>
                                                    <option value="<?= $value2->group_id ?>" selected><?= $value2->group_name; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value2->group_id ?>"><?= $value2->group_name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                $ids = array();
                                foreach ($selected_buss->result() as  $buss) {
                                    $sel_buss_id = $buss->business_id;
                                    array_push($ids, $sel_buss_id);
                                }
                                ?>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Business Segment </label>
                                        <select name="business[]" id="business" multiple class="form-control" data-placeholder="Business Segment">
                                            <option value="">Select Business Segment</option>
                                            <?php foreach ($business_list1 as $value1) {
                                                $business_id = $value1->business_id;
                                                $business = $row1->business_id;
                                                if (in_array($business_id, $ids)) {
                                            ?>
                                                    <option value="<?= $value1->business_id ?>" selected><?= $value1->business_name; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value1->business_id ?>"><?= $value1->business_name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Location </label>
                                        <select name="location" id="location" class="form-control" data-placeholder="Select Location">
                                            <option value="">Select Location</option>
                                            <?php foreach ($location_list1 as $value3) {
                                                $location_id = $value3->location_id;
                                                $location = $row1->location_id;
                                                if ($location_id == $location) {
                                            ?>
                                                    <option value="<?= $value3->location_id ?>" selected><?= $value3->location; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $value3->location_id ?>"><?= $value3->location; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Credit Term</label>
                                        <select class="form-control" name="credit_term" id="credit_term" data-placeholder="Select Credit Term">
                                            <option value="">Select Credit Term</option>
                                            <?php foreach ($credit_term as $row) { ?>
                                                <option value="<?= $row->credit_id ?>" <?php echo $credit = ($row1->credit_term == $row->credit_id) ? "selected" : ""; ?>><?= $row->credit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="1"><?= $row1->notes; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Connection</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php $acc_mng = explode(",", $row1->account_manager); ?>
                                        <label>Account Manager </label>
                                        <select data-placeholder="Select Account Manager" multiple="multiple" class="form-control" name="account_manager[]" id="account_manager">
                                            <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                            <?php foreach ($account_manager as $row) { ?>
                                                <option value="<?= $row->id ?>" <?php echo $acc = (in_array($row->id, $acc_mng)) ? "Selected" : ""; ?>><?= $row->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Referred By </label>
                                        <select data-placeholder="Select Reference" class="form-control" name="reference" id="reference_cm">
                                            <option value="">Select Reference</option>
                                            <!-- <?php foreach ($editprimary_customer->result() as $value21) { ?>
                                                <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                            <?php } ?> -->
                                            <?php foreach ($editprimary_customer->result() as $value21) { ?>
                                                <option value="<?= $value21->customer_id ?>" <?php echo $pcom = ($row1->reference_id == $value21->customer_id) ? "selected" : ""; ?>><?= $value21->company_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Referenced Documents</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Document </label>
                                    <input type="file" style="padding:4px;" class="form-control" name="document[]" id="document" multiple>

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">Access Credentials</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Password</label>
                                        <!-- <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" maxlength="35" value="<?php echo $row1->password; ?>"> -->
                                        <div class="shbtn" id="show_hide_password_edit" style="display: flex;">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" maxlength="35" value="<?php echo $row1->password; ?>">
                                            <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                                <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Confirm Password</label>
                                        <!-- <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password"> -->
                                        <div class="shbtn" id="show_hide_cpassword_edit" style="display: flex;">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" value="<?php echo $row1->password; ?>">
                                            <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                                <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-sm-12 text-right mb-3" style="padding-left:20px; padding-right:20px;">
                        <button type="submit" class="btn btn-primary" id="btn_hide"> Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                <?php   }   ?>
            </form>

        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>

<div id="googlemapmodalAdd" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="fa-fa-map" style="zoom:1.1; "></i>
                    &nbsp;Search Google Address </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
                    <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; border: 2px solid #009FDF;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#parentid').select2();

$('#addContryId').select2();

$('#state').select2();

$('#type').select2();

$('#registration_type2').select2();

$('#group').select2();

$('#business').select2();

$('#location').select2();

$('#credit_term').select2();

$('#account_manager').select2();

$('#reference_cm').select2();

$('.select2-selection__rendered').hover(function () {
    $(this).removeAttr('title');
});


$("ul.select2-selection__rendered").hover(function(){
  $(this).find('li').removeAttr('title');
});


$(".select2-container--default").tooltip({
    title: function() {
        return $(this).prev().attr("title");
    },
    placement: "auto",
    //container: 'body'
});

    function customertype(val) {
        if (val == 'secondary') {
            $('#Primery_display').hide();
            $('#secondary_display').show();
        } else {
            $('#secondary_display').hide();
            $('#Primery_display').show();
        }
    }


    function bind_mailing_name(value) {
        $("#mailing_name").val(value);
    }

    function open_google_map_add() {
        $("#googlemapmodalAdd").modal('show');
        initializeadd();
    }

    function initializeadd() {
        // alert();
        $g_lat = $('#g_lat').val();
        $g_long = $('#g_long').val();
        var markers = [];
        var map = new google.maps.Map(document.getElementById('googleMap2'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        });
        
        var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(18.5204, 73.8567),
        new google.maps.LatLng(18.6204, 73.9567));
        map.fitBounds(defaultBounds);
        
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input2');

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var searchBox = new google.maps.places.SearchBox((input));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            map.setZoom(15);
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            for (var i = 0, marker; marker = markers[i]; i++) {
                marker.setMap(null);
            }
            // For each place, get the icon, place name, and location.
            markers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                var marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    title: place.name,
                    position: place.geometry.location
                });
                markers.push(marker);
                bounds.extend(place.geometry.location);
                google.maps.event.addListener(marker, 'click', function(event) {
                    get_city2(event.latLng.lat(), event.latLng.lng());
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    var latlng = new google.maps.LatLng(lat, lng);
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'latLng': latlng
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[1]) {
                                location_name = results[1].formatted_address;
                                // document.getElementById("address2").value = location_name;
                                document.getElementById("google_address").value = location_name;
                                $('#g_lat').val(lat);
                                $('#g_long').val(lng);
                                $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                $("#googlemapmodalAdd").modal('hide');
                                $("#googlemapmodalAdd").css('display','none');
                            }
                        }
                    });
                });
            }
            map.fitBounds(bounds);
        });
        // [END region_getplaces]
        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
            var bounds = map.getBounds();
            searchBox.setBounds(bounds);
        });
    }


    // google.maps.event.addDomListener(window, 'load', initialize);

    function get_city2(lat, long) {
        var geocoder;
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat, long);
        geocoder.geocode({
                'latLng': latlng
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var add = results[0].formatted_address;
                        var value = add.split(",");
                        // alert(add);
                        count = value.length;
                        country = value[count - 1];
                        state = value[count - 2];
                        city = value[count - 3];
                        if (value[count - 3] = null) {
                            city = '';
                        }
                        // alert(city);
                        document.getElementById('city2').value = city;
                        $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                    } else {
                        alert("address not found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            }
        );
    }


    $(document).ready(function() {
        $('#EditCustomerForm').bootstrapValidator({
            // message: 'This value is not valid',
            // fields: {
            //     ordanizer_name: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Company Name'
            //             }
            //         }
            //     },
            //     address: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Address'
            //             }
            //         }
            //     },

            //     mailing_name: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Mailing Name'
            //             }
            //         } 
            //     },

            //     contact_person: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Contact Person Name'
            //             }
            //         }
            //     },

            //     city: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter City Name'
            //             }
            //         }
            //     },

            //     country: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Country Name'
            //             }
            //         }
            //     },

            //     state: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Select State'
            //             }
            //         }
            //     },

            //     contact_number1: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Contact number'
            //             }
            //         }
            //     },

            //     dob: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Select DOB'
            //             }
            //         }
            //     },

            //     email_id: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Email is required.'
            //             },
            //             regexp: {
            //                 regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
            //                 message: 'The value is not a valid email address'
            //             }
            //         }
            //     },
            //     password: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Password'
            //             },
            //         }
            //     },
            //     confirm_password: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please Enter Password'
            //             },
            //             identical: {
            //                 field: 'password',
            //                 message: 'The password and its confirm are not the same'
            //             }
            //         }
            //     },
            // }
            message: 'This value is not valid',
            fields: {
                ordanizer_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Company Name'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Address'
                        }
                    }
                },

                parentid: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Company Name'
                        }
                    }
                },



                custtype: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Customer Type'
                        }
                    }
                },

                contact_person: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact Person Name'
                        }
                    }
                },

                // password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Password'
                //         }
                //     }
                // },

                // notes: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Notes'
                //         },
                //     }
                // },
                // password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Password'
                //         },
                //     }
                // },
                // confirm_password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Confirm Password'
                //         },
                //         identical: {
                //             field: 'password',
                //             message: 'The password and its confirm are not the same'
                //         }
                //     }
                // },


                registration_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Registration Type'
                        }
                    }
                },

                // credit_term: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Select Credit Term'
                //         }
                //     }
                // },
                account_manager: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Account Mangager'
                        }
                    }
                },

                city: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter City Name'
                        }
                    }
                },

                country: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Country'
                        }
                    }
                },

                state: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select State '
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

                email_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Email'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },

                mailing_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Mailing Name'
                        }
                    }
                },

                contact_code: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact Code'
                        }
                    }
                },
                // pincode: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Pincode'
                //         }
                //     } 
                // }
            }
        });
    });

    $(document).ready(function(e) {
        $("#EditCustomerForm").on('submit', (function(e) {
            // alert("Hii");
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/update'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        // new PNotify({
                        //     title: 'Edit Contact',
                        //     text: 'Contact Information Updated Successfully!',
                        //     type: 'success'
                        // });
                        $("#UpdatesuccessModal").modal('show');

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        // alert('fail');
                        $("#updateErrorModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });

    function updatestate(val) {
        // alert(val);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('admin/Customer/getstate') ?>',
            data: 'country_id=' + val,
            success: function(data) {
                // alert(data);
                $("#state1").html(data);
            }
        });
    }
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Contact Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Customer'); ?>">
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
                <a href="<?php echo base_url('admin/Target/target_type'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>
<script>
    $(document).ready(function() {
        $("#show_hide_password_edit a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password_edit input').attr("type") == "text") {
                $('#show_hide_password_edit input').attr('type', 'password');
                $('#show_hide_password_edit i').addClass("icon-eye-blocked");
                $('#show_hide_password_edit i').removeClass("icon-eye");
            } else if ($('#show_hide_password_edit input').attr("type") == "password") {
                $('#show_hide_password_edit input').attr('type', 'text');
                $('#show_hide_password_edit i').removeClass("icon-eye-blocked");
                $('#show_hide_password_edit i').addClass("icon-eye");
            }
        });
    });
    $(document).ready(function() {
        $("#show_hide_cpassword_edit a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_cpassword_edit input').attr("type") == "text") {
                $('#show_hide_cpassword_edit input').attr('type', 'password');
                $('#show_hide_cpassword_edit i').addClass("icon-eye-blocked");
                $('#show_hide_cpassword_edit i').removeClass("icon-eye");
            } else if ($('#show_hide_cpassword_edit input').attr("type") == "password") {
                $('#show_hide_cpassword_edit input').attr('type', 'text');
                $('#show_hide_cpassword_edit i').removeClass("icon-eye-blocked");
                $('#show_hide_cpassword_edit i').addClass("icon-eye");
            }
        });
    });
</script>