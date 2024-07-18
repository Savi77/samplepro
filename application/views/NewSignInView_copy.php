<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buroforce SignIn</title>

    <!-- Global stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url() ?>new-assets/assets/css/newstyle.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="base_url<?= base_url() ?>new-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="base_url<?= base_url() ?>new-assets/global_assets/js/main/jquery.min.js"></script>
    <script src="base_url<?= base_url() ?>new-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= base_url() ?>new-assets/assets/js/app.js"></script>
    <!-- /theme JS files -->
    <style>
        .input-group-addon {
            padding-top: .7rem;
            padding-bottom: .7rem;
            padding-left: 1.5rem;
            padding-right: 1rem;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            background: #F5F5F5;
        }

        i.fa.fa-eye-slash {
            position: inherit !important;
        }
        small.help-block {
            color: #f00;
        }
    </style>
</head>
<!-- Main content -->
<div class="content-wrapper">
    <div class="content">
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login form -->
            <form class="login-form signin" id="LoginForm">
                <div class="card mb-0">
                    <div class="back-header">
                        <img src="<?= base_url() ?>new-assets/global_assets/images/header-logo.png" class=" d-sm-block center-img" alt="">
                        <p class="white-text">Your Business Manager</p>
                    </div>

                    <h5 class="mb-0 sign-in">Sign In</h5>
                    <div class="card-body p-20">
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control" name="username" placeholder="Enter Username" autocomplete="off">
                            <div class="form-control-feedback">
                                <i class="fa fa-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="shbtn" id="show_hide_password_user" style="display: flex;">
                                <input type="password" name="password" placeholder="Email Password" class="form-control rmv-border-right rmv-border-left" >
                                <div class="input-group-addon">
                                    <a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="#"><button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-lock" aria-hidden="true"></i> &nbsp;LOGIN</button></a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /login form -->
        </div>
    </div>
</div>
<script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="<?= base_url() ?>app-assets/js/core/app-menu.min.js"></script>
<script src="<?= base_url() ?>app-assets/js/core/app.min.js"></script>
<script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.min.js"></script>
<script>
    $(document).ready(function() {
        $("#show_hide_password_user a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password_user input').attr("type") == "text") {
                $('#show_hide_password_user input').attr('type', 'password');
                $('#show_hide_password_user i').addClass("fa-eye-slash");
                $('#show_hide_password_user i').removeClass("fa-eye");
            } else if ($('#show_hide_password_user input').attr("type") == "password") {
                $('#show_hide_password_user input').attr('type', 'text');
                $('#show_hide_password_user i').removeClass("fa-eye-slash");
                $('#show_hide_password_user i').addClass("fa-eye");
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#LoginForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Enter registered email address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#LoginForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Authenticate data...."/>');
                $("#preview3").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Admin_authentication') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        PNotify.removeAll();
                        $("#preview3").hide();

                        var data = $.trim(data);
                        // alert(data);
                        if (data == 0) {
                            new PNotify({
                                title: 'Login Fail',
                                text: 'Please contact admin..',
                                type: 'danger'
                            });
                        } else if (data == 1) {
                            new PNotify({
                                title: 'Login',
                                text: 'Login successful',
                                type: 'success'
                            });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Dashboard/view_dashboard') ?>";
                            }, 500);
                        } else if (data == 2) {
                            new PNotify({
                                title: 'Login Restriction',
                                text: 'Allow Only one login over the internet',
                                type: 'danger'
                            });
                        } else {
                            new PNotify({
                                title: 'Login Fail',
                                text: 'Invalid Username/Password',
                                type: 'danger'
                            });
                        }
                    },
                    error: function(exception) {
                        PNotify.removeAll();
                        alert('Exeption:' + exception);
                    }
                });
            }
            return false;
        }));
    });
</script>