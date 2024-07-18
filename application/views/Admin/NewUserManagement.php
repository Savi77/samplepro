<?php $this->load->view('Admin/includes/n-header');    ?>


<style>
    #Designation-List .flex-form-group .col-sm-11{
        flex: 0 0 90% !important;
        max-width: 90% !important;
    }
    #Designation-List .flex-form-group .col-sm-1{
        flex: 0 0 10% !important;
        max-width: 10% !important;
        margin-top: 30px;
    }
    .flex-form-group{
        align-items: start !important;
    }
    #moreSupportUpload .form-group .col-sm-11{
        flex: 0 0 90% !important;
        max-width: 90% !important;
    }
    #moreSupportUpload .form-group .col-sm-1{
        flex: 0 0 10% !important;
        max-width: 10% !important;
    }
    .select2-selection--multiple .select2-search--inline:first-child .select2-search__field
    {
        width:125px !important;
    }
    .select2-selection--single .select2-selection__placeholder {
        color: #999 !important;
    }
    #role-permission fieldset.form-filedset {
        margin: 0;
    }
    .role-text {
        margin-top: 0%;
    }
</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card">
                        <h4 class="green-text">Department-Designation List</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Designation-List"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?= base_url() ?>admin/Master/department_designation"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card">
                        <h4 class="bb-text">Manage Resource</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" onclick="open_user_view(this.id)" id="<?= count($array_users_add); ?>"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <input type="hidden" name="a" id="a" value="<?= $plan_subscription->no_of_user; ?>">
                        <input type="hidden" name="b" id="b" value="<?= count($array_users_add); ?>">
                        <!-- <button type="button" class="commom-btn" data-toggle="modal" data-target="#manage-view"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button> -->
                        <a href="<?= base_url() ?>admin/Users"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card">
                        <h4 class="green-text">Role Permission</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#role-permission"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <button type="button" class="commom-btn"><a href="<?= base_url() ?>admin/UserPermission/PermissionRole">
                                <span class="m-p-5">View</span><img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card">
                        <h4 class="bb-text">Assign Role</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <!--<button type="button" class="commom-btn" data-toggle="modal" data-target="#role-permission"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>-->
                        <button type="button" class="commom-btn"><a href="<?= base_url() ?>admin/UserPermission/ClonePermission"><span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card">
                        <h4 class="green-text">User Permission</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#user-permission"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <button type="button" class="commom-btn"><a href="<?= base_url() ?>admin/UserPermission"><span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card">
                        <h4 class="bb-text">Shift</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#shift123"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <button type="button" class="commom-btn"><span class="m-p-5">View</span>
                            <a href="<?= base_url() ?>admin/Tracking/MasterShift">
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card">
                        <h4 class="green-text">Assign Shift</h4>
                    </div>
                    <div class="card-footer footer-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#assign-shift"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <button type="button" class="commom-btn"><span class="m-p-5">View</span>
                            <a href="<?= base_url() ?>admin/Tracking/shift">
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('Admin/includes/n-footer');    ?>

    <!--Designation-List popup-->
    <div id="Designation-List" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content border">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Add Department-Designation</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="form-horizontal" id="TypeForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department Name" maxlength="50">
                        </div>

                        <div class="row flex-form-group">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter Designation Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-sm-1" style="padding: 0;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success addButton" id="attachSupport"><i class="icon-add"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="moreSupportUpload"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--manager view popup-->

    <div id="manage-view" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        &nbsp;Add Resource</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="UserForm" enctype="multipart/form-data" method="post">
                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Basic Info</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="user_department" id="user_department" class="form-control select2" data-placeholder="Select Department">
                                            <option value="">Select Department</option>
                                            <?php foreach ($department as $value) { ?>
                                                <option value=" <?= $value->dep_id; ?>"><?= $value->department_name; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Designation </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="user_designation" id="user_designation" class="form-control select2" data-placeholder="Select Designation">
                                            <option value="">Select Designation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nationality </label>
                                    <div class="media no-margin-top  m-0">
                                        <select class="form-control select2" name="nationality" id="nationality" data-placeholder="Select Nationality">
                                            <option value="">Select Nationality</option>
                                            <?php foreach ($country_list as $value5) { ?>
                                                <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="gender" id="gender" class="form-control select2" data-placeholder="Select Gender">
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                        </select>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="blood_group" id="blood_group" class="form-control select2" data-placeholder="Select Blood Group">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                        </select>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pan Card </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="p_name" name="pan_no" placeholder="Enter Pan Card Number" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhar Card </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="a_name" name="aadhar_no" placeholder="Enter Aadhar Card Number" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <div class="shbtn" id="show_hide_password_user" style="display: flex;">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off" style="border-right: 0px;" value="<?= $value->Password ?>">
                                        <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                            <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                        <label>Profile </label>
                                        <div class="media no-margin-top  m-0">
                                            <div class="media-left">
                                                <a href="#"><img src="<?= base_url()?>/assets/admin/assets/images/placeholder.jpg" class="img-size-cmp img-rounded" alt="" id="home_img"></a>
                                            </div>
                                            <div class="media-body ml-2">
                                                <label class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgInp" name="fileup">
                                                    <span class="custom-file-label">Choose file</span>
                                                </label>

                                                <p id="error1" style="display:none; color:#FF0000;">
                                                    Invalid Image Format! Image Format Must Be
                                                    JPG, JPEG, PNG or GIF.
                                                </p>
                                                <p id="error2" style="display:none; color:#FF0000;">
                                                    Maximum File Size Limit is 1MB.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </fieldset>

                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Contact Details</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternative Mobile No. </label>
                                    <input type="text" class="form-control" id="altr_mobile_no" name="altr_mobile_no" placeholder="Enter Alternative Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email Id <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Id" maxlength="50" onkeyup="checkmail()">
                                    <small id="mail_error" style="color:red;" maxlength="40"> </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Alternative Email Id </label>
                                    <input type="text" class="form-control" id="altr_email" name="altr_email" placeholder="Enter Alternative Email Id" maxlength="50" onkeyup="checkmail()">
                                    <small id="mail_error" style="color:red;" maxlength="40"> </small>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                     
                    <fieldset class="form-filedset email ">
                        <legend class="field bulk-email">Dates</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Joining Date </label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-selectors rounded-right" placeholder="Select Joining Date" name="joining_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Of Birth </label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" name="dob_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marriage Anniversary </label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" name="marriage_anniversary_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Document</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Document Type </label>                                                    
                                            <select class="form-control addSelect" name="doc_type[]" id='doc_type_0' data-placeholder="Select Document Type" onchange="toggleFileRequirement()">
                                                <option value="">Select Document Type</option>
                                                <?php
                                                foreach ($doc_type as  $row2) {
                                                ?>
                                                    <option value="<?= $row2->id; ?>">
                                                        <?= $row2->doc_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Upload File </label>
                                            <input type="file" class="form-control" name="uploadfile[]" id="file" style="padding:4px !important" onchange="toggleFileRequirement()">
                                            <small for="file" id="file-label" style="color:#f00 !important"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <lable></lable>
                                            <button class="btn btn-success mt-4" type="button" onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="education_fields">
                        </div>
                    </fieldset>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn_submit"> Submit<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function toggleFileRequirement() {
        const dropdown = document.getElementById('doc_type_0');
        const fileInput = document.getElementById('file');
        const fileLabel = document.getElementById('file-label');
        if (dropdown.value == '') 
        {
            fileInput.removeAttribute('required');
            fileLabel.textContent = 'file';
        }
        else 
        {
            fileInput.setAttribute('required', 'required');
            // fileLabel.textContent = 'Please Select File';
            $('#file-label').css('display','block');
            $('#file-label').html('Please Select File');
            $('#btn_submit').prop('disabled', true);
        } 

        if(fileInput.value != '')
        {
            $('#file-label').css('display','none');
            $('#btn_submit').prop('disabled', false);   
        }
    }
</script>

    <script type="text/javascript">
    // $('#user_department').select2({
    //     placeholder: 'Select Department',
    //     dropdownParent: $("#manage-view")
    // });

    // $('#user_designation').select2({
    //     placeholder: 'Select Designation',
    //     dropdownParent: $("#manage-view")
    // });
    // $('#user_type_io').select2({
    //     dropdownParent: $("#manage-view")
    // });
    // $('#nationality').select2({
    //     placeholder: 'Select Nationality',
    //     dropdownParent: $("#manage-view")
    // });
    // $('#gender').select2({
    //     placeholder: 'Select Gender',
    //     dropdownParent: $("#manage-view")
    // });
    // $('#blood_group').select2({
    //     placeholder: 'Select Blood Group',
    //     dropdownParent: $("#manage-view")
    // });
    // $('#doc_type').select2({
    //     placeholder: 'Select Document Name',
    //     dropdownParent: $("#manage-view")
    // });    
</script>
<script>

    $('body').on('shown.bs.modal', '#manage-view', function() {
        $(this).find('.select2,.addSelect').each(function() {
            $(this).select2({ dropdownParent: $('#manage-view') });
        });
    });
            
    $('#manage-view').on('scroll', function (event) {
        $(this).find(".select2,.addSelect").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
    });

</script>
<script type="text/javascript">
    var room = 0;

    function education_fields() 
    {    
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "w-100 form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-md-12"><div class="form-group"><div class="row"><div class="col-md-5"><label></label><select class="form-control addSelect" name="doc_type[]" id="doc_type_'+ room +'" data-placeholder="Select Document Type" onchange="toggleFileRequirement_add()"><option value="">Select Document Type</option><?php foreach ($doc_type as  $row2) {?><option value="<?= $row2->id; ?>"><?= $row2->doc_name; ?></option><?php } ?></select></div><div class="col-md-5"><lable></lable><input type="file" id="file_add" class="form-control" name="uploadfile['+ room +']" style="padding:4px !important" onchange="toggleFileRequirement_add()"><small for="file" id="file-label_add" style="color:#f00 !important"></small></div><div class="col-md-2"><lable></lable><button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span></button></div></div></div></div>';
        objTo.appendChild(divtest)

        $('.addSelect').select2({
                dropdownParent: $("#manage-view")
            });

        $('#add_new_form').bootstrapValidator('addField', 'productid[]');
        $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
    }

    function toggleFileRequirement_add()
    {
        const dropdown = document.getElementById('doc_type_'+ room +'');
        const fileInput = document.getElementById('file_add');
        const fileLabel = document.getElementById('file-label_add');
        if (dropdown.value == '') 
        {
            fileInput.removeAttribute('required');
            fileLabel.textContent = 'file';
        }
        else 
        {
            fileInput.setAttribute('required', 'required');
            // fileLabel.textContent = 'Please Select File';
            $('#file-label_add').css('display','block');
            $('#file-label_add').html('Please Select File');
            $('#btn_submit').prop('disabled', true);
        } 

        if(fileInput.value != '')
        {
            $('#file-label_add').css('display','none');
            $('#btn_submit').prop('disabled', false);   
        }
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>






    <!-- Role Permission -->
    <div id="role-permission" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        &nbsp;Add Role Permission</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="roelPermissionForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role  <sup class="text-danger">*</sup></label>
                                    <div class="">
                                        <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role" data-bv-field="role">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role Description  <sup class="text-danger">*</sup></label>
                                    <div class="">
                                        <input type="text" name="role_description" id="role_description" class="form-control" placeholder="Enter Role Description" data-bv-field="role">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label><?= $report_list[$j]->frequency_name; ?></label>
                                    <div class="">
                                        <select class="form-control" name="report_id" id= '$id' data-placeholder="Select Report Type">
                                            <option value="">Select Report Type</option>
                                            <?php foreach ($get_report as $value) { ?>
                                                <option value="<?= $value->report_type_id ?>"><?= $value->report_type ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <fieldset class="form-filedset email min-height-200" style="margin-bottom:30px;">
                            <legend class="field bulk-email">Role Permission</legend>
                                <table class="table" style="border: 2px solid #bb9c9c8c;">
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($feature_list as $row) {
                                            $collapse = "demo" . $i;
                                            $privilege = $row['privilege'];
                                            $component_id = $row['component_id'];
                                        ?>
                                            <tr>
                                                <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                                    <b><?= $row['component_title']; ?></b>
                                                </td>
                                                <td style="width: 78%;">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <?php
                                                            $checkbox = 1;

                                                            foreach ($privilege as  $row) {
                                                                $custom_id = $component_id . '/' . $row->privilege_id;
                                                            ?>
                                                                <div class="col-md-2">
                                                                    <div class="checkbox">
                                                                        <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                            <input style="height:16px;align-self: start;" type="checkbox" name="feature_ids[]" class="styled col-2" value="<?= $custom_id; ?>">
                                                                            <span class="role-text"><?= $row->privilege;  ?></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                                $checkbox++;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>
                        </fieldset>
                        <fieldset class="form-filedset email min-height-200">
                            <legend class="field bulk-email">Role Wise Report Permission</legend>
                            <table class="table" style="border: 2px solid #bb9c9c8c;">
                                <tbody>
                                <?php
                                        for($j=0;$j<COUNT($report_list);$j++) 
                                        {
                                            $frequency_id = $report_list[$j]->frquency_id;
                                            $get_report = $this->db->select('*')->from('tbl_frequency_wise_report_type')->where('frquency_id',$frequency_id)->get()->result();
                                        ?>
                                            <tr>
                                                <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                                    <b><?=  $report_list[$j]->frequency_name;?></b>
                                                </td>
                                                <td style="width: 78%;">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <?php
                                                            $checkbox = 1;

                                                            foreach ($get_report as $value) { 
                                                                $report_id = $value->frquency_id . '/' . $value->report_type_id;

                                                            ?>
                                                                <div class="col-md-2">
                                                                    <div class="checkbox">
                                                                        <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                            <input style="height:16px;align-self:start;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>">
                                                                            <span class="role-text"><?= $value->report_type  ?></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                                $checkbox++;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                    <?php
                                        $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitBtn" class="btn btn-primary" style="margin-right:4px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        
        $('#report_id123').select2({
            dropdownParent: $('#role-permission')
        });
    </script>
    <!--user permission-->
    <div id="user-permission" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        &nbsp;Copy Permission</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="CopyPermission" action="<?php echo base_url('admin/UserPermission/CopyPermission'); ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Role <sup class="text-danger">*</sup></label>
                                <select name="role_id" id="role_id" class="form-control select2" data-placeholder="Select Role">
                                    <option value="">Select Role</option>
                                    <?php foreach ($role_list as $value) { ?>
                                        <option value="<?= $value['role_id']; ?>"><?= $value['role_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label> Resource <sup class="text-danger">*</sup></label>
                                <select data-placeholder="Select Resource" class="form-control select2" name="copy_employee_id" id="copy_employee_id">
                                    <option value="">Select Employee</option>
                                    <?php foreach ($array_users->result() as $row3) { ?>
                                        <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 update-details" style="padding-right:20px;">
                        <button class="blue-btn" type="submit"> <span class="text-white">Copy Permission</span> <i class="icon-arrow-right14 position-right" style="color:#fff;"></i></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Assign shift-->
<div id="assign-shift" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Assign Shift</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addAssignShift" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Resource <span class="text-danger" >*</span></label>
                        <select data-placeholder="Select Resource" class="form-control select2" name="emp_id[]" id="edit_add_emp_id"  multiple >
                            <?php foreach ($array_users->result() as $row3) { ?>
                                <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Shift <span class="text-danger" >*</span> </label>
                        <select data-placeholder="Select Shift" class="form-control select2" data-fouc name="shift_timing" id="shift">
                            <option value="">Select Shift</option>
                            <?php foreach ($shift_list as $shift) { ?>
                                <option value="<?= $shift->id; ?>"><?= $shift->shift_title; ?> <?= $shift->from_timing.'-'.$shift->to_timing ?></option>
                            <?php   }   ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="updateBtn" style="margin-right:4px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--shift-->

<div id="shift123" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content border">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp; &nbsp;Add Shift</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addShift" method="post">
                <div class="modal-body pb-0">
                    <div class="form-group">
                        <label>Shift Name <span class="text-danger" >*</span> </label>
                        <input type="text" class="form-control" data-mask="Shift Name" name="shift_title" placeholder="Enter Shift Name">
                    </div>
                    <div class="form-group">
                        <label>From Time <span class="text-danger" >*</span> </label>
                        
                        <div class="clearfix">
                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true"> 
                                <input type="text" class="form-control" placeholder="Enter From Time" name="from_timing" id="from_timing" autocomplete="off" readonly> 
                                <!-- <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>  -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To Time <span class="text-danger" >*</span> </label>
                        <div class="clearfix">
                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true"> 
                                <input type="text" class="form-control" placeholder="Enter To Time" name="to_timing" id="to_timing" autocomplete="off" readonly> 
                                <!-- <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>  -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;"> Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script type="text/javascript">
        
        $(document).ready(function() {
            designationvalidator = {
                    row: '.col-md-12',
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Designation Name'
                        }
                    }
                },
                $('#TypeForm')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        'designation[]': designationvalidator,
                        department: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Department Name'
                                }
                            }
                        },
                    }
                })
                // Add button click handler
                .on('click', '.addButton', function() {})
                // Remove button click handler
                .on('click', '.removeButton', function() {});
        });

        $(document).ready(function(e) {
            $("#TypeForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?= base_url(); ?>admin/Master/add_department_designation",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 1) 
                            {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Department / Designation',
                                    //     text: 'Added  Successfully',
                                    //     type: 'success'
                                    // });
                                    $("#Designation-List").modal('hide');
                                    $("#successModalDepartmentdesignation").modal('show');
                                });

                                // setTimeout(function() {
                                //     window.location =
                                //         "<?php echo base_url(); ?>admin/Master/department_designation";
                                // }, 1000);
                            } 
                            // else {
                            //     $(function() {
                            //         new PNotify({
                            //             title: 'Department / Designation',
                            //             text: 'Please atleast one designation add.',
                            //             type: 'error'
                            //         });
                            //     });
                            // }
                        },
                        error: function() {
                            $("#alertModal").modal('show');

                        }
                    });
                }
                return false;

            }));
        });


        var cheque_number = 1;
        $('#attachSupport').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag +=
                '<div class="form-group row"><label class="control-label col-sm-12" for="email">Designation Name</label><div class="col-sm-11"><input type="text" class="form-control" id="designation' +
                cheque_number +
                '" name="designation[]" placeholder="Enter Designation Name" maxlength="50"></div><div class="col-sm-1" style="padding: 0;"><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
                cheque_number + ')"><i class=" icon-trash"></i></button></div></div>';
            $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
            cheque_number++;
        });

        function del_file(eleId) {
            var ele = document.getElementById("delete_file" + eleId);
            ele.parentNode.removeChild(ele);
        }
        $(document).ready(function() {
            $("#show_hide_password_user a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password_user input').attr("type") == "text") {
                    $('#show_hide_password_user input').attr('type', 'password');
                    $('#show_hide_password_user i').addClass("icon-eye-blocked");
                    $('#show_hide_password_user i').removeClass("icon-eye");
                } else if ($('#show_hide_password_user input').attr("type") == "password") {
                    $('#show_hide_password_user input').attr('type', 'text');
                    $('#show_hide_password_user i').removeClass("icon-eye-blocked");
                    $('#show_hide_password_user i').addClass("icon-eye");
                }
            });
        });

        function chk_emp_code() {
            emp_code = $('#emp_id').val();
            if (emp_code == '') {
                $('#error_emp_code').empty();
                // $('#error_emp_code').html('Employee Id is required');
                // $('#emp_id').focus();
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Users/chk_emp_code_add'); ?>",
                    dataType: "html",
                    type: "POST",
                    data: {
                        emp_code: emp_code
                    },
                    success: function(data) {
                        // alert(data);
                        if (data == 1) {
                            $('#error_emp_code').empty();
                            $('#error_emp_code').css('display','block');
                            $('#error_emp_code').html(
                                'Please add another employee code this code assign to a user.');
                            // $('#emp_id').focus();
                        } else {
                            $('#error_emp_code').hide();
                        }
                    }
                });
            }
        }

        function checkmail() {
            // var mobileno=$("#mobileno").val();
            var x = $("#email").val();

            var datastring = 'email_id=' + x;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Users/check_existmail_add'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    if (data == 1) {
                        $('#sign-in-button').prop('disabled', true);
                        $("#mail_error").html('Email is already exist');
                    } else {
                        $('#sign-in-button').prop('disabled', false);
                        $("#mail_error").html('');
                    }
                }
            });
        }
        $(document).ready(function() {
            $('#UserForm')
                // .find('[name="gender"]')
                // .multiselect()
                // .end()
                // .find('[name="module_ids"]')
                // .multiselect({
                //     // Re-validate the multiselect field when it is changed
                //     onChange: function(element, checked) {
                //         $('#UserForm').bootstrapValidator('revalidateField', 'module_ids');
                //     }
                // })
                // .end()
                .bootstrapValidator({
                    // Exclude only disabled fields
                    // The invisible fields set by Bootstrap Multiselect must be validated
                    excluded: ':disabled',
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Email Id.'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                }
                            }
                        },
                        'module_ids2[]': {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Modules'
                                }
                            }
                        },
                        fname: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter First Name'
                                }
                            }
                        },
                        lname: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Last Name'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Password'
                                }
                            }
                        },

                        mobile_no: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Mobile Number'
                                }
                            }
                        },
                        emp_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Emp Id'
                                }
                            }
                        }
                    }
                });
        });
        $(document).ready(function(e) {
            $("#UserForm").on('submit', (function(e) {
                if (e.isDefaultPrevented()) {} else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Users/Add_user'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            
                            $(function() {
                                // new PNotify({
                                //     title: 'Add User',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Designation-List").modal('hide');
                                $("#successModalManageUser").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/Users'); ?>";
                            // }, 1000);

                        },
                        error: function() {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;

            }));
        });

        $('#user_department').change(function() {
            getDesignation($('#user_department').val());
        });

        function getDesignation(country_id) {

            var datastring = 'country_id=' + country_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/dashboard/getDesignation'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {

                    $('#user_designation').html(data);
                },
                error: function() {
                    $('#validateDepartment').html('Please Select Department');
                    // alert('Error while request..');
                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInp').bind('change', function() {

            var ext = $('#imgInp').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1').slideDown("slow");
                $('#error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#error2').slideUp("slow");
                }
                $('#error1').slideUp("slow");

            }
        });
        // Role Permission
        $('#roelPermissionForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                role: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Role'
                        }
                    }
                },
                role_description: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Role Description'
                        }
                    }
                },
            }
        });
        $(document).ready(function(e) {
            $("#roelPermissionForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview44").show();
                    $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    $('#submitBtn').prop('disabled', true);
                    $.ajax({
                        url: "<?php echo base_url('admin/UserPermission/SetRolePermission'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview44").hide();
                            $('#submitBtn').removeAttr('disabled');
                            $(function() {
                                // new PNotify({
                                //     title: 'Assign Module Permission',
                                //     text: 'Permission Set Successfully',
                                //     type: 'success'
                                // });
                                $("#role-permission").modal('hide');
                                $("#successModalrolepermission").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/UserPermission/PermissionRole'); ?>";
                            // }, 2000);
                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });

                }
                return false;
            }));
        });
        $(document).ready(function() {
            $("#role_id").select2({
                dropdownParent: $("#user-permission")
            });
            $("#copy_employee_id").select2({
                dropdownParent: $("#user-permission")
            });
        });
        $('#CopyPermission').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                role_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Role'
                        }
                    }
                },
                copy_employee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Employee'
                        }
                    }
                },
            }
        });
        $(document).ready(function(e) {
            $("#CopyPermission").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $("#preview44").show();
                    $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                        url: "<?php echo base_url('admin/UserPermission/CopyPermission'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview44").hide();
                            // $("#rsdata").html(data);
                            // alert(data);
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Copy Permission',
                                //     text: 'Copy Permission Set Successfully',
                                //     type: 'success'
                                // });
                                $('#user-permission').modal('hide');
                                $('#successModaluserpermission').modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/UserPermission'); ?>";
                            // }, 2000);
                        },
                        error: function() {
                            $("#alertModal").modal('show');
                        }
                    });

                }
                return false;
            }));
        });
        // Shift
        $(document).ready(function() {
            $('.clockpicker').clockpicker().find('input').change(function() {
                console.log(this.value);
            });
        });
        $("#from_timing").blur(function () {
            $('#addShift').bootstrapValidator('revalidateField', 'from_timing');
        });
        $("#to_timing").blur(function () {
            $('#addShift').bootstrapValidator('revalidateField', 'to_timing');
        });
        $(document).ready(function () {
            $('#addShift').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    shift_title: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Shift Name'
                            }
                        }
                    },
                    from_timing: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter From Time'
                            }
                        }
                    },
                    to_timing: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter To Time'
                            }
                        }
                    },

                }
            });
        });

        $(document).ready(function (e) {
            $("#addShift").on('submit', (function (e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('admin/Tracking/add_master_shift'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            // alert(data);
                            
                            $(function () {
                                // new PNotify({
                                //     title: 'Shift Form',
                                //     text: 'Shift Added Successfully',
                                //     type: 'success'
                                // });
                                $("#shift").modal('hide');
                                $('#successModalshift').modal('show');
                            });

                            // setTimeout(function () {
                            //     window.location =
                            //         "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
                            // }, 1000);
                        },
                        error: function () {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;
            }));
        });
        $(document).ready(function () {

            FromLocationValidator = {
                row: '.col-md-12',
                validators: {
                    notEmpty: {
                        message: 'Please Select Employee'
                    }
                }
            };

            $('#addAssignShift').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    'emp_id[]': FromLocationValidator,
                    shift_timing: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Shift'
                            }
                        }
                    },
                }    
            });
        });
        
        

        $(document).ready(function (e) {
            $("#addAssignShift").on('submit', (function (e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                   
                    var formresult = new FormData(this);
                    // alert(formresult);
                    $.ajax({
                        url: "<?php echo base_url('admin/Tracking/add_shift'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            // alert(data);
                            $(function () {
                                // new PNotify({
                                //     title: 'Assign Shift',
                                //     text: 'Shift Assigned Successfully',
                                //     type: 'success'
                                // });
                                $("#assign-shift").modal('hide');
                                $('#successModalshiftassign').modal('show');
                            });
                            // setTimeout(function () {
                            //     window.location =
                            //         "<?php echo base_url('admin/Tracking/shift');?>";
                            // }, 1000);

                        },
                        error: function () {
                            // alert('fail');
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;
            }));
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalDepartmentdesignation" tabindex="-1" aria-labelledby="successModalDepartmentdesignationLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalDepartmentdesignationLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Department-Designation Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/department_designation'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalManageUser" tabindex="-1" aria-labelledby="successModalManageUserLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalManageUserLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Resource Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="successModalrolepermission" tabindex="-1" aria-labelledby="successModalrolepermissionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalrolepermissionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Role & Permission Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission/PermissionRole'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModaluserpermission" tabindex="-1" aria-labelledby="successModaluserpermissionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModaluserpermissionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Resource Permission Copied Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalshift" tabindex="-1" aria-labelledby="successModalshiftLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalshiftLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Shift Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalshiftassign" tabindex="-1" aria-labelledby="successModalshiftassignLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="ssuccessModalshiftassignLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Shift Assigned Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/shift'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="RestrictModal" tabindex="-1" aria-labelledby="RestrictModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="RestrictModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>User Restriction!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">The maximum number of resources has been reached. Please upgrade your plan or contact the Buroforce admin.</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#shift').select2({
        tags: true,
		dropdownParent: $("#assign-shift")
   });
   $('#edit_add_emp_id').select2({
        tags: true,
        dropdownParent: $("#assign-shift"),
   });
</script>


<script>
    function open_user_view(count) {
        
        var a = Number($("#a").val());
        var b = Number($("#b").val());
        
        if (a >= b) 
        {
            $(function () {
                // new PNotify({
                //     title: 'User Restriction',
                //     text: 'Maximum No. of user has reached. Please ugrade plan or contact buroforce admin',
                //     type: 'warning',
                //     delay: 700
                // });
                $('#manage-view').modal('show'); 
                
            });
        } 
        else 
        {
            $('#RestrictModal').modal('show');
        }
    }
</script>


