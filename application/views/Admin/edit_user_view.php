<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>    
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/picker_date.js"></script>
<style>
    .select2-selection--single .select2-selection__placeholder {
        color: #999 !important;
    }
   .filename span{
        position: absolute;
        top: 7px;
        left: 96px;
        font-size: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 130px;
    }
</style>

<?php
    foreach ($edit_user as $value) {
        $ids = array();
        $selected = $value->module_ids;

        $selectedregion = trim($selected, ',');
        $explode = explode(",", $selectedregion);
        for ($i = 0; $i < count($explode); $i++) {
            $re_array_id = $explode[$i];
            array_push($ids, $re_array_id);
        }
        // echo "<pre>";
        // print_r($value->joining_date);
        // print_r($value->dob);
        // print_r($value->marriage_anniversary_date);
        if($value->joining_date == '0001-11-30' || $value->joining_date == '-0001-11-30' || $value->joining_date == '1970-01-01' || $value->joining_date == NULL)
        {
            $j_date = '';
        }
        else
        {
            $j_date=date('d F, Y', strtotime($value->joining_date)); 
        }

        if($value->dob == '0001-11-30' || $value->dob == '-0001-11-30' || $value->dob == '1970-01-01' || $value->dob == NULL)
        {
            $dob = '';
        }
        else
        {
            $dob=date('d F, Y', strtotime($value->dob)); 
        }

        if($value->marriage_anniversary_date == '0001-11-30' || $value->marriage_anniversary_date == '-0001-11-30' || $value->marriage_anniversary_date == '1970-01-01' || $value->marriage_anniversary_date == NULL)
        {
            $m_date = '';
        }
        else
        {
            $m_date=date('d F, Y', strtotime($value->marriage_anniversary_date)); 
        }
        
?>
       <form id="EditUserForm1" enctype="multipart/form-data" method="post">
           <input type="hidden" value="<?= $value->id ?>" id="user_id" name="user_id">
           <div class="panel panel-flat">
               <div class="panel-body">
                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Basic Info</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" maxlength="50" value="<?= $value->fname ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" maxlength="50" value="<?= $value->lname ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="user_department" id="department_id" class="form-control select2" data-placeholder="Select Department">
                                            <option value="">Select Department</option>
                                            <?php foreach ($department as $dp) { ?>
                                                    <option value="<?= $dp->dep_id; ?>" <?php echo $dep = ( $value->department == $dp->dep_id) ? 'selected' : '' ;?> ><?php echo $dp->department_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Designation </label>
                                    <div class="media no-margin-top m-0">
                                        <select name="designation_id" id="designation_id" class="form-control select2" data-placeholder="Select Designation">
                                            <option value="">Select Designation</option>
                                            <?php foreach ($designation as $dp) { ?>
                                                <option value="<?= $dp->deg_id; ?>" <?php echo $dep = ( $value->designation == $dp->deg_id) ? 'selected' : '' ;?> ><?php echo $dp->designation_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nationality </label>
                                    <div class="media no-margin-top  m-0">
                                        <select class="form-control select2" name="nationality12" id="nationality12" data-placeholder="Select Nationality">
                                            <option value="">Select Nationality</option>
                                            <?php 
                                            foreach ($country_list as $value5) 
                                            { 
                                                if($value5->id == $value->nationality)
                                                {
                                            ?>
                                                <option value="<?= $value5->id ?>" selected> <?= $value5->name; ?></option>
                                            <?php 
                                                }
                                                else
                                                {
                                            ?>
                                                <option value="<?= $value5->id ?>"> <?= $value5->name; ?></option>
                                            <?php
                                                } 
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" maxlength="50" value="<?= $value->address; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="gender" id="gender12" class="form-control select2" data-placeholder="Select Gender">
                                            <?php
                                            if($value->gender == 'M')
                                            {
                                            ?>
                                            <option value="">Select Gender</option>
                                            <option value="M" selected>Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                            <?php
                                            }
                                            elseif($value->gender == 'F')
                                            {
                                            ?>
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F" selected>Female</option>
                                            <option value="O">Other</option>
                                            <?php
                                            }
                                            elseif($value->gender == 'O')
                                            {
                                            ?>
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O" selected>Other</option>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O" selected>Other</option>
                                            <?php
                                            }
                                            ?>
                                            
                                        </select>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Blood Group </label>
                                    <div class="media no-margin-top  m-0">
                                        <select name="blood_group" id="blood_group12" class="form-control select2" data-placeholder="Select Blood Group">
                                        <?php
                                            if($value->blood_group == 'A+')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+" selected>A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'B+')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+" selected>B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'AB+')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+" selected>AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'O+')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+" selected>O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'A-')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-" selected>A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'B-')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-" selected>B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'AB-')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-" selected>AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            elseif($value->blood_group == 'O-')
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-" selected>O-</option>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <?php
                                            }
                                            ?>
                                        </select>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pan Card </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder="Enter Pan Card Number" maxlength="50" value=<?= $value->pan_no; ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhar Card </label>
                                    <div class="media no-margin-top  m-0">
                                        <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" placeholder="Enter Aadhar Card Number" maxlength="50" value=<?= $value->aadhar_no; ?>>
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
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()" value=<?= $value->mobile_no; ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternative Mobile No. </label>
                                    <input type="text" class="form-control" id="altr_mobile_no" name="altr_mobile_no" placeholder="Enter Alternative Mobile Number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15" onkeyup="checkmobile()" value=<?= $value->alternate_mobile_no; ?>>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email Id <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Id" maxlength="50" onkeyup="checkmail()" value=<?= $value->email; ?>>
                                    <small id="mail_error" style="color:red;" maxlength="40"> </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Alternative Email Id </label>
                                    <input type="text" class="form-control" id="altr_email" name="altr_email" placeholder="Enter Alternative Email Id" maxlength="50" onkeyup="checkmail()" value=<?= $value->alternate_email; ?>>
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
                                        <input type="text" class="form-control pickadate-selectors rounded-right" placeholder="Select Joining Date" name="joining_date" value= "<?= $j_date; ?>">
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
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" name="dob_date" value="<?= $dob; ?>">
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
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" name="marriage_anniversary_date" value="<?= $m_date; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Document</legend>
                        <div class="row">
                        <?php
                        if(!empty($doc))
                        {
                            $prdct_cnt = 0;
                            foreach ($doc as  $row6) 
                            {
                                $name = 'uploadfile['.$prdct_cnt.']';
                                $id = 'fileInput'.$prdct_cnt;
                            ?>
                            <input type="hidden" name="doc_fetch" id="doc_fetch" value="<?= count($doc); ?>">
                            <input type="hidden" name="doc_auto_id[]" id="doc_auto_id" value="<?= $row6->id; ?>">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Document Type </label>                                                    
                                            <select class="form-control addSelect" name="edit_doc_type[]" data-placeholder="Select Document Type">
                                                <option value="">Select Document Type</option>
                                                <?php
                                                foreach ($doc_type as  $row2) 
                                                {
                                               ?>
                                                    <option value="<?= $row2->id; ?>" <?php if ($row6->doc_type_id == $row2->id)echo 'selected';?>>
                                                        <?= $row2->doc_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Upload File </label>
                                            <div class="filename" style="position:relative;">
                                                <input type="file" class="form-control" name="<?= $name;?>" id= <?=$id;?> onchange="myFunction(this)" style="padding:4px !important;color:transparent;" value="<?=$row6->uploadfilename;?>">
                                                <span id ="<?= $id; ?>_filename"><?=$row6->uploadfilename;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn mt-4" target="_blank" href="<?= base_url() ?>assets/admin/userDocument/<?= $row6->name ?>" style="color:#333333;">
                                                <i class="icon-eye" aria-hidden="true"></i>
                                            </a>
                                            <button class="btn btn-success mt-4" type="button" onclick="education_fields_edit();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                            <!-- <button class="btn btn-danger rmv-border-left mt-4" type="button" onclick="remove_education_fields(1);"> <span class="fa fa-minus" aria-hidden="true"></span></button></ -->
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $prdct_cnt++;
                         } 
                        }
                        else
                        {
                            $name = 'uploadfile[]';
                        ?>
                        <input type="hidden" name="doc_fetch" id="doc_fetch" value="1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Document Type </label>                                                    
                                        <select class="form-control addSelect" name="edit_doc_type[]" data-placeholder="Select Document Type">
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
                                        <input type="file" class="form-control" name="<?= $name;?>" style="padding:4px !important" value="<?=$row6->uploadfilename;?>">
                                    </div>
                                    <div class="col-md-2">
                                        <lable></lable>
                                        <button class="btn btn-success mt-4" type="button" onclick="education_fields_edit();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        </div>
                        <div class="row" id="education_fields_edit">
                        </div>
                    </fieldset>
                   
                   <br />
                   <div class="text-right">
                       <button type="submit" class="btn btn-primary" id="btn_submit_edit">Update <i class="icon-arrow-right14 position-right"></i></button>
                       <span id="preview2"></span>
                   </div>
               </div>
           </div>
       </form>

   <?php } ?>

   <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var fileLabel = document.getElementById('fileLabel');
            var initialFileName = "<?= $row6->uploadfilename; ?>";
            fileLabel.textContent = initialFileName ? initialFileName : 'Choose a file';
        });

        function updateLabel() {
            var fileInput = document.getElementById('fileInput');
            var fileLabel = document.getElementById('fileLabel');
            var fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose a file';
            fileLabel.textContent = fileName;
        }
    </script> -->
  
   <script>
    $('.pickadate-selectors').pickadate({
            selectYears: 100,
            selectMonths: true
        });
   </script>
   <script>
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
       $(function() {
            $('#joining_date').pickadate({
                selectYears: 100,
                selectMonths: true
            });
            $('.pickadate-accessibility').pickadate({
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectMonths: true,
            selectYears: 200
        });
        });

		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if($('#show_hide_password input').attr("type") == "text"){
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass( "icon-eye-blocked" );
					$('#show_hide_password i').removeClass( "icon-eye" );
				}else if($('#show_hide_password input').attr("type") == "password"){
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass( "icon-eye-blocked" );
					$('#show_hide_password i').addClass( "icon-eye" );
				}
			});
		});
        function chk_emp_code_edit() {
            emp_code = $('#emp_id_edit').val();
            
            if (emp_code == '') 
            {
                $('#error_emp_code_edit').empty();
                $('#error_emp_code_edit').html('Please Enter Emp Id');
                $('#emp_id_edit').focus();
            }
            else{
                id = $('#employee_uid').val();

                $.ajax({
                    url: "<?php echo base_url('admin/Users/chk_emp_code'); ?>",
                    dataType: "html",
                    type: "POST",
                    data: {
                        emp_code: emp_code, id: id
                    },
                    success: function(data) {
                        // alert(data);
                        if (data == 1) {
                            $('#error_emp_code_edit').empty();
                            $('#error_emp_code_edit').css('display','block');
                            $('#error_emp_code_edit').html('Please add another employee code this code assign to a user.');
                            $('#emp_id_edit').focus();
                        }else{
                            $('#error_emp_code_edit').hide();
                        }
                    }
                });
            }
    
        }
	</script>
   <script>
       
        $('#department_id').change(function() {
            getDepartment();
        });

        function getDepartment() {
            var department_id = $("#department_id").val();
            $.ajax({
                url: "<?php echo base_url('admin/Users/getDepartmentId'); ?>",
                dataType: "html",
                type: "POST",
                data: {
                    department: department_id
                },
                success: function(data) {
                    alert(data);
                    $('#designation_id').html(data);
                }
            });
        }
    </script>
   <script type="text/javascript">
       function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function(e) {
                   $('#u_image').attr('src', e.target.result);
               }

               reader.readAsDataURL(input.files[0]);
           }
       }

       $("#imgtemp123").change(function() {
           readURL(this);
       });
   </script>



   <script type="text/javascript">
       var a = 0;
       //binds to onchange event of your input field
       $('#imgtemp123').bind('change', function() {

           var ext = $('#imgtemp123').val().split('.').pop().toLowerCase();
           if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
               $('#error14').slideDown("slow");
               $('#error24').slideUp("slow");
               a = 0;
           } else {
               var picsize = (this.files[0].size);
               if (picsize > 1000000) {
                   $('#error24').slideDown("slow");
                   a = 0;
               } else {
                   a = 1;
                   $('#error24').slideUp("slow");
               }
               $('#error14').slideUp("slow");

           }
       });
   </script>
   
<script type="text/javascript">
    var room = Number($("#doc_fetch").val()) - 1;
    function education_fields_edit() 
    {    
        room++;
        var objTo = document.getElementById('education_fields_edit')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "w-100 form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-md-12"><div class="form-group"><div class="row"><div class="col-md-5"><label></label><select class="form-control addSelect" name="edit_doc_type[]" id="edit_doc_type_'+ room +'" data-placeholder="Select Document Type" onchange="toggleFileRequirement_add_edit()"><option value="">Select Document Type</option><?php foreach ($doc_type as  $row2) {?><option value="<?= $row2->id; ?>"><?= $row2->doc_name; ?></option><?php } ?></select></div><div class="col-md-5"><lable></lable><input type="file" id="file_add_edit" class="form-control" name="uploadfile['+ room +']" style="padding:4px !important"><small for="file" id="file-label_add_edit" style="color:#f00 !important"></small></div><div class="col-md-2"><lable></lable><button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span></button></div></div></div></div>';
        objTo.appendChild(divtest)

        $('.addSelect').select2({
                dropdownParent: $("#modal_default1")
            });

        $('#add_new_form').bootstrapValidator('addField', 'productid[]');
        $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
    }

    function toggleFileRequirement_add_edit()
    {
        
        const dropdown = document.getElementById('edit_doc_type_'+ room +'');
        const fileInput = document.getElementById('file_add_edit');
        const fileLabel = document.getElementById('file-label_add_edit');
        if (dropdown.value == '') 
        {
            fileInput.removeAttribute('required');
            fileLabel.textContent = 'file';
        }
        else 
        {
            fileInput.setAttribute('required', 'required');
            // fileLabel.textContent = 'Please Select File';
            $('#file-label_add_edit').css('display','block');
            $('#file-label_add_edit').html('Please Select File');
            $('#btn_submit_edit').prop('disabled', true);
        } 

        if(fileInput.value != '')
        {
            $('#file-label_add_edit').css('display','none');
            $('#btn_submit_edit').prop('disabled', false);   
        }
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

<script>
    
    // $('#edit_doc_type_0').select2({
    //     dropdownParent: $('#modal_default1')
    // })

    $('body').on('shown.bs.modal', '#modal_default1', function() {
        $(this).find('.select2,.addSelect').each(function() {
            $(this).select2({ dropdownParent: $('#modal_default1') });
        });
    });
            
    $('#modal_default1').on('scroll', function (event) {
        $(this).find(".select2,.addSelect").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
    });
</script>


   <script type="text/javascript">
       $(document).ready(function() {
           $('#EditUserForm1').bootstrapValidator({
               message: 'This value is not valid',
               fields: {
                   name: {
                       validators: {
                           notEmpty: {
                               message: 'Please Enter Full Name'
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

                   file: {
                       validators: {
                           file: {
                               extension: 'jpg,png,jpeg',
                               maxSize: 2097152, //2 mb  maxsize
                               message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
                           }
                       }
                   },

                   email: {
                       validators: {
                           notEmpty: {
                               message: 'Please Enter Email Id'
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
       $(document).ready(function(e) {

           $("#EditUserForm1").on('submit', (function(e) {
               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                   //alert('invalid');
                   return false;
               } else {

                   $.ajax({
                       url: "<?php echo base_url('admin/Users/Edit_Add_user'); ?>",
                       type: "POST",
                       data: new FormData(this),
                       contentType: false,
                       cache: false,
                       processData: false,
                       success: function(data) {
                           $("#UpdatesuccessModal").modal('show');

                           // alert(data);
                        //    PNotify.removeAll()
                        //    new PNotify({
                        //        title: 'Update User Form',
                        //        text: 'Updated  Successfully !',
                        //        type: 'success'
                        //    });
                        //    setTimeout(function() {
                        //        window.location = "<?php echo base_url('admin/Users'); ?>";
                        //    }, 1000);

                           return false;

                       },
                       error: function() {
                        //    alert('fail');
                        $("#updateErrorModal").modal('show');

                       }
                   });
               }
               return false;

           }));
       });
   </script>

   <script type="text/javascript">
       function checkmail1() {
           // alert();
           // var mobileno=$("#mobileno").val();
           var email = $("#email1").val();
           var id = $('#employee_uid').val();
        //    var datastring = 'email_id=' + x;
           //alert(datastring);
           $.ajax({
               type: "post",
               url: "<?php echo base_url('admin/Users/check_existmail'); ?>",
               cache: false,
            //    data: datastring,
               data: {
                        email: email, id: id
                    },
               success: function(data) {
                   // console.log(data);
                //    alert(data);
                   if (data == 1) {
                       $('#sign-in-button1').prop('disabled', true);
                       $("#mail_error1").html('Email is already exist');
                   } else {
                       $('#sign-in-button1').prop('disabled', false);
                       $("#mail_error1").html('');
                   }
               }
           });
       }
   </script>

   <script type="text/javascript">
       function checkmobile1() {
           // var mobileno=$("#mobileno").val();
           var x = $("#mobile_no1").val();

           var datastring = 'mobile_no=' + x;
           //alert(datastring);
           $.ajax({
               type: "post",
               url: "<?php echo base_url('admin/Users/check_mobile'); ?>",
               cache: false,
               data: datastring,
               success: function(data) {
                   // console.log(data);
                   // alert(data);
                   if (data == 1) {
                       $('#sign-in-button1').prop('disabled', true);
                       $("#mobile_error1").html('Mobile number is already exist');
                   } else {
                       $('#sign-in-button1').prop('disabled', false);
                       $("#mobile_error1").html('');
                   }
               }
           });
       }
   </script>

   <script>
    
    // $('#department_id').select2({
    //     dropdownParent: $('#modal_default1')
    // });
    
    // $('#designation_id').select2({
    //     dropdownParent: $('#modal_default1')
    // });

    // $('#nationality12').select2({
    //     placeholder: 'Select Nationality',
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#gender12').select2({
    //     placeholder: 'Select Gender',
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#blood_group12').select2({
    //     placeholder: 'Select Blood Group',
    //     dropdownParent: $("#modal_default1")
    // });

   </script>
   <!--===================================== Email/Mobile number validation(already exist or not) =====================================-->
<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Resource Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Users'); ?>">
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
                <a href="<?php echo base_url('admin/Users'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>

//    function myFunction() {
//         let x = document.getElementById("fileInput");
//         // Get the full path of the file
//         alert('Hii');
//         let filePath = x.value;
//         // Extract the file name from the full path
//         let fileName = filePath.split('\\').pop().split('/').pop();
//         // Display the file name in the span tag
//         document.getElementById("filename").textContent = fileName;
//     }

function myFunction(input) {
    let fileId = input.id; // Get the id of the input element that triggered the change
    let fileName = '';

    if (input.files.length > 0) {
        // Get the full path of the file
        let filePath = input.value;
        // Extract the file name from the full path
        fileName = filePath.split('\\').pop().split('/').pop();
    } else {
        // Handle case where no file is selected
        fileName = 'No file selected';
    }

    // Display the file name in the corresponding span tag
    document.getElementById(fileId + '_filename').textContent = fileName;
}
</script>