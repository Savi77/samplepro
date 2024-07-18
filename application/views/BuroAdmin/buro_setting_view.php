<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View profile</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <style>
        .input-group-addon {
            padding: 8px 17px;
            font-size: 13px;
            font-weight: normal;
            line-height: 1;
            color: #333333;
            text-align: center;
            background-color: #fcfcfc;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-left: -3px;
        }
    </style>
</head>

<body>
    <!--  Load header value -->
    <?php $this->load->view('BuroAdmin/includes/admin_header'); ?>


    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <?php $this->load->view('BuroAdmin/includes/sidebar'); ?>
            <!-- Main content style="border: 1px solid #d8d3d3;" -->
            <div class="content-wrapper">
                <!-- User profile -->
                <div class="panel panel-flat">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="navbar navbar-default navbar-xs navbar-component">
                                    <ul class="nav navbar-nav visible-xs-block">
                                        <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                                    </ul>
                                    <div class="navbar-collapse collapse" id="navbar-filter">
                                        <ul class="nav navbar-nav element-active-slate-400 " id="myTab">
                                            <li class="active"><a href="#PersonalDetails" data-toggle="tab"><i class="icon-cog3 position-left"></i>Basic Information</a></li>
                                            <li><a href="#Logo" data-toggle="tab"><i class="icon-image2 position-left"></i>Logo</a></li>
                                            <li><a href="#emailconfigactivity" id="emailTab" data-toggle="tab"><i class=" icon-envelop4 position-left"></i> Email Configuration</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0;">
                                        <div class="col-lg-12">
                                            <div class="tabbable">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="PersonalDetails">
                                                        <div class="panel panel-flat">
                                                            <div class="panel-body">
                                                                <form id="myprofile_form" method="post">
                                                                    <fieldset>
                                                                        <legend class="text-semibold"><i class=" icon-address-book position-left"></i> Contact</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Mobile Number :</label>
                                                                                    <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control" value="<?= $profile_array->mobile_no; ?>" maxlength="10">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>EMail ID :</label>
                                                                                    <input type="text" name="email" placeholder="EMail ID" class="form-control" value="<?= $profile_array->email; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <br />
                                                                    <div class="row">
                                                                        <div class="text-right">
                                                                            <button type="submit" class="btn btn-primary">Update Contact <i class="icon-arrow-right14 position-right"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                                <form id="myprofile_password_form" method="post">
                                                                    <fieldset>
                                                                        <legend class="text-semibold"><i class=" icon-key position-left"></i> Change Password</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Current Password :</label>
                                                                                    <div class="shbtn" id="show_hide_currnt_password" style="display: flex;">
                                                                                        <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="form-control" onblur='passwordCheck()'>
                                                                                        <div class="input-group-addon">
                                                                                            <a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" id="passwordSet" style="display: none;">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>New Password :</label>
                                                                                    <div class="shbtn" id="show_hide_new_password" style="display: flex;">
                                                                                        <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control" >
                                                                                        <div class="input-group-addon">
                                                                                            <a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Confirm Password :</label>
                                                                                    <div class="shbtn" id="show_hide_cnf_password" style="display: flex;">
                                                                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" >
                                                                                        <div class="input-group-addon">
                                                                                            <a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <br />
                                                                    <div class="row">
                                                                        <div class="text-right">
                                                                            <button type="submit" class="btn btn-primary" id="submitPassBtn" disabled>Update Password <i class="icon-arrow-right14 position-right"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade in active" id="Logo">
                                                        <div class="panel panel-flat">
                                                            <div class="panel-body">
                                                                <form id="logo_form" method="post">
                                                                    <fieldset>
                                                                        <legend class="text-semibold"><i class=" icon-image2 position-left"></i> Logo</legend>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-lg-2 control-label">Web Logo<span style="color: red;">*</span></label>
                                                                                    <div class="col-lg-10">
                                                                                        <div class="media no-margin-top">
                                                                                            <div class="media-left">
                                                                                            <?php   if ($web_logo->logo_name_one != '') { ?>
                                                                                                <a href="#"><img src="<?= base_url() ?>assets/images/web_images/<?= $web_logo->logo_name_one; ?>" style="width: 150px; height: 58px;" class="img-rounded" alt="" id="home_img_one"></a>
                                                                                            <?php   }else { ?>
                                                                                                <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_one"></a>
                                                                                            <?php    }  ?>
                                                                                                
                                                                                            </div>

                                                                                            <div class="media-body">
                                                                                                <input type="file" class="file-styled" id="imgInpOne" name="fileupone">
                                                                                                <p id="error1_one" style="display:none; color:#FF0000;">
                                                                                                    Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                                                </p>
                                                                                                <p id="error2_one" style="display:none; color:#FF0000;">
                                                                                                    Maximum File Size Limit is 1MB.
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="margin-top: 2%;">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-lg-2 control-label">Admin Logo <span style="color: red;">*</span></label>
                                                                                    <div class="col-lg-10">
                                                                                        <div class="media no-margin-top">
                                                                                            <div class="media-left">
                                                                                            <?php   if ($web_logo->logo_name_two != '') { ?>
                                                                                                <a href="#"><img src="<?= base_url() ?>assets/images/web_images/<?= $web_logo->logo_name_two; ?>" style="width: 150px; height: 58px;" class="img-rounded" alt="" id="home_img_one"></a>
                                                                                            <?php   }else { ?>
                                                                                                <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_one"></a>
                                                                                            <?php    }  ?>
                                                                                            </div>

                                                                                            <div class="media-body">
                                                                                                <input type="file" class="file-styled" id="imgInpTwo" name="fileuptwo">
                                                                                                <p id="error1_two" style="display:none; color:#FF0000;">
                                                                                                    Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                                                </p>
                                                                                                <p id="error2_two" style="display:none; color:#FF0000;">
                                                                                                    Maximum File Size Limit is 1MB.
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br />
                                                                        <div class="row">
                                                                            <div class="text-right">
                                                                                <button type="submit" class="btn btn-primary" >Update Logo <i class="icon-arrow-right14 position-right"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade in" id="emailconfigactivity">
                                                        <div class="panel panel-flat">
                                                            <div class="panel-body">
                                                                <form id="emailconfiguration_form" method="post">
                                                                    <fieldset>
                                                                        <legend class="text-semibold"><i class="icon-envelop2 position-left"></i> Email Settings</legend>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>From Name :</label>
                                                                                    <input type="text" name="from_name" placeholder="From Name" class="form-control" value="<?= $emailsetting_array->from_name; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>SMTP host name:</label>
                                                                                    <input type="text" name="host_name" placeholder="Host Name" class="form-control" value="<?= $emailsetting_array->host_name; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>SMTP port number :</label>
                                                                                    <input type="text" name="port_number" placeholder="Enter SMTP port number" class="form-control" value="<?= $emailsetting_array->port_number; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Protocol :</label>
                                                                                    <input type="text" name="protocol" placeholder="Enter Protocol" class="form-control" value="<?= $emailsetting_array->protocol; ?>">
                                                                                    <p style="font-size: 11px;">(e.g smtp)</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Email ID:</label>
                                                                                    <input type="text" name="email_id" placeholder="Email ID" class="form-control" value="<?= $emailsetting_array->email_id; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Email Password :</label>
                                                                                    <div class="shbtn" id="show_hide_password" style="display: flex;">
                                                                                        <input type="password" name="email_pass" placeholder="Email Password" class="form-control" value="<?= $emailsetting_array->email_pass; ?>">
                                                                                        <div class="input-group-addon">
                                                                                            <a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>SMTP Secure:</label>
                                                                                    <!-- <input type="text" name="secure" placeholder="SMTP Secure" class="form-control" value="<?= $emailsetting_array->email_id; ?>"> -->
                                                                                    <select class="form-control col-md-6" name="secure" data-placeholder="SMTP Secure" id="smtp_secure">
                                                                                        <?php
                                                                                        if(!empty($emailsetting_array->secure))
                                                                                        {
                                                                                            if($emailsetting_array->secure == 'ssl')
                                                                                            {
                                                                                            ?>
                                                                                                <option value="">Select SMTP Secure Type</option>
                                                                                                <option value="ssl"selected=''>ssl</option>
                                                                                                <option value="tls">tls</option>
                                                                                            <?php
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                            ?>
                                                                                                <option value="">Select SMTP Secure Type</option>
                                                                                                <option value="ssl">ssl</option>
                                                                                                <option value="tls" selected=''>tls</option>
                                                                                            <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <br />
                                                                    <div class="row">
                                                                        <div class="text-right">
                                                                            <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /user profile -->
            </div>
            <!-- /main content -->


        </div>
        <!-- /page content -->

        <!-- Footer -->
        <?php $this->load->view('BuroAdmin/includes/admin_footer'); ?>
        <!-- /footer -->

    </div>
    <!-- /page container -->
</body>


<script type="text/javascript">
    $(document).ready(function() {
        $('#email_content').summernote({
            placeholder: 'Please add email content..',
            tabsize: 2,
            height: 500
        });
    });
</script>
<!-- ======================= Image preview and validation ======================== -->
<script type="text/javascript">
    function readURLOne(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#home_img_one').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInpOne").change(function() {
        readURLOne(this);
    });

    function readURLTwo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#home_img_two').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInpTwo").change(function() {
        readURLTwo(this);
    });
</script>
<script type="text/javascript">
    function passwordCheck() {
        pass = $('#current_password').val();
        var datastring = 'current_password=' + pass;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('BA/Setting/CheckPassword'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                if (data == 1) {
                    $('#passwordSet').show();
                    $('#submitPassBtn').removeAttr('disabled');
                }else{
                    $('#passwordSet').hide();
                    $('#submitPassBtn').prop('disabled',true);
                }
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    $(document).ready(function() {
        $('#myprofile_password_form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                current_password: {
                    validators: {
                        notEmpty: {
                            message: 'Current Password is required'
                        }
                    }
                },
                new_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password Required'
                        },
                        regexp: {
                            regexp: '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$',
                            // regexp: '^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$',
                            message: "Minimum 8 characters<br/> At least 1 uppercase letter.<br/>At least 1 lowercase letter."
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        identical: {
                            field: 'new_password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
            }
        })
    });
    $(document).ready(function(e) {
        $("#myprofile_password_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('BA/Setting/UpdatePassword'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(function() {
                            new PNotify({
                                title: 'Update Password',
                                text: 'Password Updated Successfully',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Setting'); ?>";
                        }, 1000);

                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;

        }));
    });
    $(document).ready(function(e) {
        $("#logo_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('BA/Setting/UpdateLogo'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(function() {
                            new PNotify({
                                title: 'Update Logo',
                                text: 'Logo Updated Successfully',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Setting'); ?>";
                        }, 1000);

                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;

        }));
    });
    $(document).ready(function(e) {
        $("#myprofile_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('BA/Setting/UpdateProfile'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(function() {
                            new PNotify({
                                title: 'Update Profile',
                                text: 'Profile Updated Successfully',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Setting'); ?>";
                        }, 1000);

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

<script type="text/javascript">
    $(document).ready(function() {
        $('#emailconfiguration_form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                from_name: {
                    validators: {
                        notEmpty: {
                            message: 'From Name Required'
                        }
                    }
                },

                host_name: {
                    validators: {
                        notEmpty: {
                            message: 'Host Name Required'
                        }
                    }
                },
                port_number: {
                    validators: {
                        notEmpty: {
                            message: 'SMTP port number Required'
                        }
                    }
                },
                protocol: {
                    validators: {
                        notEmpty: {
                            message: 'protocol Required'
                        }
                    }
                },
                email_id: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Enter Valid email address'
                        }
                    }
                },
                email_pass: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Valid Email Password'
                        }
                    }
                },



            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_currnt_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_currnt_password input').attr("type") == "text") {
                $('#show_hide_currnt_password input').attr('type', 'password');
                $('#show_hide_currnt_password i').addClass("fa-eye-slash");
                $('#show_hide_currnt_password i').removeClass("fa-eye");
            } else if ($('#show_hide_currnt_password input').attr("type") == "password") {
                $('#show_hide_currnt_password input').attr('type', 'text');
                $('#show_hide_currnt_password i').removeClass("fa-eye-slash");
                $('#show_hide_currnt_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_new_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_new_password input').attr("type") == "text") {
                $('#show_hide_new_password input').attr('type', 'password');
                $('#show_hide_new_password i').addClass("fa-eye-slash");
                $('#show_hide_new_password i').removeClass("fa-eye");
            } else if ($('#show_hide_new_password input').attr("type") == "password") {
                $('#show_hide_new_password input').attr('type', 'text');
                $('#show_hide_new_password i').removeClass("fa-eye-slash");
                $('#show_hide_new_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_cnf_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_cnf_password input').attr("type") == "text") {
                $('#show_hide_cnf_password input').attr('type', 'password');
                $('#show_hide_cnf_password i').addClass("fa-eye-slash");
                $('#show_hide_cnf_password i').removeClass("fa-eye");
            } else if ($('#show_hide_cnf_password input').attr("type") == "password") {
                $('#show_hide_cnf_password input').attr('type', 'text');
                $('#show_hide_cnf_password i').removeClass("fa-eye-slash");
                $('#show_hide_cnf_password i').addClass("fa-eye");
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#emailconfiguration_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('BA/Setting/EmailConfiguartion'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Update Email Configuartion',
                                text: 'Updated Successfully',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Setting'); ?>";
                        }, 1000);
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
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#email_content_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                if ($('#email_content').summernote('isEmpty')) { //using name
                    alert('Please Enter Email Content!');
                    $("#email_content").focus;
                    return false;
                } else {
                    $.ajax({
                        url: "<?php echo base_url('admin/Settings/EmailContentFrom'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $(function() {
                                new PNotify({
                                    title: 'Email Content',
                                    text: 'Email Content Updated Successfully',
                                    type: 'success'
                                });
                            });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                            }, 1000);
                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
            }
            return false;

        }));
    });
</script>


</html>