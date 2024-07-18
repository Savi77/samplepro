<?php $this->load->view('Admin/includes/n-header'); ?>
<!-- Main content -->
<div class="content-wrapper">
    <div class="content">
        <div class="card extra-margin-top">
            <?php
                if ($profile_array->user_type == 'SA') {
                    $user_type = "Admin";
                } else {
                    $user_type = "Resource";
                }

                if ($profile_array->profile_img == '') {
                    $profile_img = base_url()."assets/admin/assets/images/users/placeholder.jpg";
                } else {
                    $profile_img = base_url().'assets/admin/assets/images/users/'.$profile_array->profile_img;
                }
            ?>
            <figure class="profile-row"><img class="profile-img" src="<?= $profile_img ?>">
                <figcaption>
                    <h4 class="big-font-text"><?= $profile_array->name ?></h4>
                </figcaption>
                <figcaption>
                    <h5 class="line-height"><?= $user_type ?></h5>
                </figcaption>
            </figure>

            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-solid nav-justified border">
                    <li class="nav-item"><a href="#solid-bordered-justified-tab1" class="nav-link active" data-toggle="tab">Personal Details</a></li>
                    <li class="nav-item"><a href="#solid-bordered-justified-tab2" class="nav-link" data-toggle="tab">Email Configuration</a></li>
                    <li class="nav-item"><a href="#solid-bordered-justified-tab3" class="nav-link" data-toggle="tab">Subscription Plan</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="solid-bordered-justified-tab1">
                        <form id="myprofile_form" class="m-0" method="post">
                            <fieldset>
                                <legend class="text-semibold pt-2">Personal Details</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name <sup style="color: red">*</sup></label>
                                            <input type="text" name="name" placeholder="Full Name" class="form-control" value="<?= $profile_array->name; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email ID  <sup style="color: red">*</sup></label>
                                            <input type="text" name="email" placeholder="Email ID" class="form-control" value="<?= $profile_array->email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number <sup style="color: red">*</sup></label>
                                            <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control" value="<?= $profile_array->mobile_no; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password <sup style="color: red">*</sup></label>
                                            <div class="shbtn" id="show_hide_password_profile" style="display: flex;position:relative;">
                                                <input type="password" name="password" placeholder="Email Password" class="form-control" value="<?= $profile_array->Password; ?>">
                                                <!-- <div class="input-group-addon"> -->
                                                    <a><i style="position: absolute;right: 15px;top: 10px;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <div class="row">
                                <div class="col-xl-12 float-right-btn">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="solid-bordered-justified-tab2">
                        <div class="panel-body">
                            <form id="emailconfiguration_form" method="post">
                                <fieldset>
                                    <legend class="text-semibold pt-2">Email Settings</legend>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>From Name <sup style="color: red">*</sup></label>
                                                <input type="text" name="from_name" placeholder="From Name" class="form-control" value="<?= $organsation_email_array->from_name; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SMTP host name <sup style="color: red">*</sup></label>
                                                <input type="text" name="host_name" placeholder="Host Name" class="form-control" value="<?= $organsation_email_array->host_name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SMTP port number <sup style="color: red">*</sup></label>
                                                <input type="text" name="port_number" placeholder="Enter SMTP port number" class="form-control" value="<?= $organsation_email_array->port_number; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Protocol <sup style="color: red">*</sup></label>
                                                <input type="text" name="protocol" placeholder="Enter Protocol" class="form-control" value="<?= $organsation_email_array->protocol; ?>">
                                                <p style="font-size: 11px;">(e.g smtp)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email ID <sup style="color: red">*</sup></label>
                                                <input type="text" name="email_id" placeholder="Email ID" class="form-control" value="<?= $organsation_email_array->email_id; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Password <sup style="color: red">*</sup></label>
                                                <div class="shbtn" id="show_hide_password" style="display: flex;position:relative;">
                                                    <input type="password" name="email_pass" placeholder="Email Password" class="form-control" value="<?= $organsation_email_array->email_pass; ?>">
                                                    <!-- <div class="input-group-addon"> -->
                                                        <a><i style="position: absolute;right: 15px;top: 10px;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SMTP Secure <sup style="color: red">*</sup></label>
                                                <select class="form-control col-md-12" name="smtp_secure" data-placeholder="Select Section" id="smtp_secure">
                                                    <!-- <option value="">Select Section</option>
                                                    <option value="ssl" selected>ssl</option>
                                                    <option value="ssl">tls</option> -->
                                                    <?php
                                                    if(!empty($organsation_email_array->secure))
                                                    {
                                                        if($organsation_email_array->secure == 'ssl')
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
                                                    else
                                                    {
                                                    ?>
                                                            <option value="">Select SMTP Secure Type</option>
                                                            <option value="ssl">ssl</option>
                                                            <option value="tls">tls</option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <div class="row">
                                    <div class="col-xl-12 float-right-btn">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form id="email_content_form" method="post">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-envelop2 position-left"></i> Welcome Email Content</legend>
                                    <div class="row">
                                        <input type="hidden" name="email_body_id" id="email_body_id" value="<?= $emailbody_array->email_body_id; ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Welcome Email Content :</label>
                                                <textarea name="email_content" id="email_content" class="form-control"><?= $emailbody_array->email_body_content; ?></textarea>
                                            </div>
                                        </div>
                                </fieldset>
                                <br>
                                <div class="row">
                                    <div class="col-xl-12 float-right-btn">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="solid-bordered-justified-tab3">
                        <div class="panel-body">
                            <fieldset>
                                <legend class="text-semibold">Subscription Plan Details<br>

                                    <!-- <i class="icon-users2"></i>&nbsp;&nbsp;&nbsp;No. of Users&nbsp;&nbsp;&nbsp;
                                    <span class="badge badge-pill ml-auto ml-lg-0" style="background-color:rgb(24 142 244)"><?= $SubscriptionData['no_of_user']; ?></span> -->

                                </legend>

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Full Name :</b> <br>
                                            <label for=""><?= $SubscriptionData['org_fname'] . ' ' . $SubscriptionData['org_lname']; ?></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Email Id :</b> <br>
                                            <label for=""><?= $SubscriptionData['org_email']; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Subscription Start Date :</b> <br>
                                            <label for=""><?= date('d M, Y', strtotime($SubscriptionData['subscription_start_date'])) ?></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Subscription End Date :</b> <br>
                                            <label for=""><?= date('d M, Y', strtotime($SubscriptionData['subscription_end_date'])); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Plan Name :</b> <br>
                                            <label for=""><?= $SubscriptionData['plan_name']; ?></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Plan Price :</b> <br>
                                            <label for="">&#8377; <?= $SubscriptionData['plan_price']; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align: center;margin: 10px;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b>Subscription Type :</b> <br>
                                            <label for=""><?= $SubscriptionData['subscription_type']; ?></label>
                                        </div>
                                    </div>
                                </div> -->

                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name <sup style="color: red">*</sup></label>
                                            <input type="text" name="name" placeholder="Full Name" class="form-control" value="<?= $SubscriptionData['org_fname'] . ' ' . $SubscriptionData['org_lname']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email ID  <sup style="color: red">*</sup></label>
                                            <input type="text" name="email" placeholder="Email ID" class="form-control" value="<?= $SubscriptionData['org_email']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subscription Start Date <sup style="color: red">*</sup></label>
                                            <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control" value="<?= date('d M, Y', strtotime($SubscriptionData['subscription_start_date'])) ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subscription End Date <sup style="color: red">*</sup></label>
                                            <div class="shbtn" id="show_hide_password_profile" style="display: flex;">
                                                <input type="text" name="password" placeholder="Email Password" class="form-control" value="<?= date('d M, Y', strtotime($SubscriptionData['subscription_end_date'])); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Plan Name <sup style="color: red">*</sup></label>
                                            <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control" value="<?= $SubscriptionData['plan_name']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Plan Price <sup style="color: red">*</sup></label>
                                            <div class="shbtn" id="show_hide_password_profile" style="display: flex;">
                                                <input type="text" name="password" placeholder="Email Password" class="form-control" value="<?= $SubscriptionData['plan_price']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subscription Type <sup style="color: red">*</sup></label>
                                            <div class="shbtn" id="show_hide_password_profile" style="display: flex;">
                                                <input type="text" name="password" placeholder="Email Password" class="form-control" value="<?= $SubscriptionData['subscription_type']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. Of Users <sup style="color: red">*</sup></label>
                                            <div class="shbtn" id="show_hide_password_profile" style="display: flex;">
                                                <input type="text" name="user)no" placeholder="Email Password" class="form-control" value="<?= $SubscriptionData['no_of_user']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <?php $this->load->view('Admin/includes/n-footer'); ?>
    <script>
        $('#smtp_secure').select2();
    </script>
    <script>
        $(document).ready(function() {
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'square' //circle
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            $('#upload_image').on('change', function() {
                // alert();
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        url: "<?php echo base_url('admin/dashboard/crop_file'); ?>",
                        type: "POST",
                        data: {
                            "image": response
                        },
                        success: function(data) {
                            // alert(data);
                            $('#uploadimageModal').modal('hide');
                            $('#default_image').hide();
                            $('#uploaded_image').html(data);
                            // $('.picture-src1').hide();
                            window.location.href = "";
                        }
                    });
                })
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#email_content').summernote({
                placeholder: 'Please add email content..',
                tabsize: 2,
                height: 500
            });
        });
    </script>

<script type="text/javascript">
        $(document).ready(function() {
            $('#myprofile_form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Name'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter email'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Please Enter Valid email address'
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
                    
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Password'
                            }
                        }
                    },


                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#myprofile_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    
                    $.ajax({
                        url: "<?php echo base_url('admin/Settings/UpdateProfile'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Update Profile',
                                //     text: 'Profile Updated Successfully',
                                //     type: 'success'
                                // });
                                $('#successModalprofile').modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                            // }, 1000);

                        },
                        error: function() {
                            // alert('fail');
                            $('#alertModal').modal('show');
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
                                message: 'Please Enter From Name'
                            }
                        }
                    },

                    host_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Host Name'
                            }
                        }
                    },
                    port_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter SMTP port number'
                            }
                        }
                    },
                    protocol: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Protocol'
                            }
                        }
                    },
                    email_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Username'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Please Enter Valid email address'
                            }
                        }
                    },
                    email_pass: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Valid Email Password'
                            }
                        }
                    },
                    
                    smtp_secure: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select SMTP Secure'
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

            $("#show_hide_password_profile a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password_profile input').attr("type") == "text") {
                    $('#show_hide_password_profile input').attr('type', 'password');
                    $('#show_hide_password_profile i').addClass("fa-eye-slash");
                    $('#show_hide_password_profile i').removeClass("fa-eye");
                } else if ($('#show_hide_password_profile input').attr("type") == "password") {
                    $('#show_hide_password_profile input').attr('type', 'text');
                    $('#show_hide_password_profile i').removeClass("fa-eye-slash");
                    $('#show_hide_password_profile i').addClass("fa-eye");
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
                        url: "<?php echo base_url('admin/Settings/EmailConfiguartion'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Update Email Configuartion',
                                //     text: 'Updated Successfully',
                                //     type: 'success'
                                // });
                                $('#successModalEmailConfiguartion').modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            // alert('fail');
                            $('#alertModal').modal('show');
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
                                    // new PNotify({
                                    //     title: 'Email Content',
                                    //     text: 'Email Content Updated Successfully',
                                    //     type: 'success'
                                    // });
                                    $('#successModalEmailContent').modal('show');
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                                // }, 1000);
                            },
                            error: function() {
                                // alert('fail');
                                $('#alertModal').modal('show');

                            }
                        });
                    }
                }
                return false;

            }));
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
                <a href="<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalprofile" tabindex="-1" aria-labelledby="successModalprofileLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalprofileLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Profile Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalEmailConfiguartion" tabindex="-1" aria-labelledby="successModalEmailConfiguartionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalEmailConfiguartionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Email Configuartion Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalEmailContent" tabindex="-1" aria-labelledby="successModalEmailContentLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalEmailContentLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Email Content Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>