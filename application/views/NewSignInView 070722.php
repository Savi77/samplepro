<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buroforce SignIn</title>

    <!--Global stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url() ?>new-assets/assets/css/newstyle.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!--/global stylesheets -->

    <!--Core JS files -->
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!--/core JS files -->

    <!--Theme JS files -->
    <script src="<?= base_url() ?>new-assets/assets/js/app.js"></script>
    <!--/theme JS files -->

    
    <style>
        .card.mb-0.logincard {
            box-shadow: 0px -1px 20px 6px rgb(53 105 144);
            border: 0px;
        }

        .login-form-wrapper {
            background: rgb(0, 62, 112);
            background: linear-gradient(0deg, rgba(0, 62, 112, 1) 6%, rgba(46, 136, 177, 1) 100%);
            opacity: 0.8;
            position: absolute;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;

        }

        form {
            padding: 20px 0;
            position: relative;
            z-index: 2;
        }

        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background: rgb(25, 110, 179);
            background: linear-gradient(0deg, rgba(25, 110, 179, 1) 6%, rgba(20, 154, 215, 1) 100%);
            bottom: -160px;
            -webkit-animation: square 25s infinite;
            animation: square 25s infinite;
            -webkit-transition-timing-function: linear;
            transition-timing-function: linear;
        }

        .bg-bubbles li:nth-child(1) {
            left: 10%;
        }

        .bg-bubbles li:nth-child(2) {
            left: 20%;
            width: 80px;
            height: 80px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 17s;
            animation-duration: 17s;
        }

        .bg-bubbles li:nth-child(3) {
            left: 25%;
            -webkit-animation-delay: 4s;
            animation-delay: 4s;
        }

        .bg-bubbles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            -webkit-animation-duration: 22s;
            animation-duration: 22s;
            background-color: rgba(255, 255, 255, 0.25);
        }

        .bg-bubbles li:nth-child(5) {
            left: 70%;
        }

        .bg-bubbles li:nth-child(6) {
            left: 80%;
            width: 120px;
            height: 120px;
            -webkit-animation-delay: 3s;
            animation-delay: 3s;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .bg-bubbles li:nth-child(7) {
            left: 32%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 7s;
            animation-delay: 7s;
        }

        .bg-bubbles li:nth-child(8) {
            left: 55%;
            width: 20px;
            height: 20px;
            -webkit-animation-delay: 15s;
            animation-delay: 15s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
        }

        .bg-bubbles li:nth-child(9) {
            left: 25%;
            width: 10px;
            height: 10px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
            background-color: rgba(255, 255, 255, 0.3);
        }

        
        .card-body.p-20 {
            padding-top: 20px !important;
        }

        .bg-bubbles li:nth-child(10) {
            left: 90%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 11s;
            animation-delay: 11s;
        }

        @-webkit-keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                -webkit-transform: translateY(-700px) rotate(600deg);
                transform: translateY(-700px) rotate(600deg);
            }
        }

        @keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                -webkit-transform: translateY(-700px) rotate(600deg);
                transform: translateY(-700px) rotate(600deg);
            }
        }

        i#show_eye {

            border: 0px !important;
            position: absolute;
            right: -340px;
            top: 3px;
            color: #a0abc2;
            cursor: pointer;
        }

        i#hide_eye {
            position: absolute;
            top: 3px;
            right: -340px;
            color: #a0abc2;
            cursor: pointer;
        }

        /*responsive*/
        @media (max-width:767px) {
            i#show_eye {
                border: 0px !important;
                position: absolute;
                right: -255px;
                top: 3px;
                color: #a0abc2;
            }

            i#hide_eye {
                position: absolute;
                top: 3px;
                right: -255px;
                color: #a0abc2;
            }
        }
    </style>
</head>
<div class="login-form-wrapper">
    <div class="login-container">
        <div class="content d-flex justify-content-center align-items-center">
            <form class="login-form signin" id="LoginForm">
                <div class="card mb-0 logincard">
                    <div class="back-header">
                        <img src="<?= base_url() ?>new-assets/global_assets/images/header-logo.png" class=" d-sm-block center-img" alt="">
                        <p class="white-text">Your Business Manager</p>
                    </div>
                    <h5 class="mb-0 sign-in">Sign In</h5>
                    <div class="card-body p-20">
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control"  name="username" placeholder="Enter Username" autocomplete="off">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>
                    
                        <div class="form-group form-group-feedback form-group-feedback-left">

                            <input type="password" class="form-control" name="password" id="password" placeholder="Email Password">
                            <div class="form-control-feedback">
                                <i class="fa fa-key"></i>
                                <span onclick="password_show_hide();">
                                    <i class="fa fa-eye" id="hide_eye" style="display:none"></i>
                                    <i class="fa fa-eye-slash " id="show_eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="#"><button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-lock" aria-hidden="true"></i>LOGIN</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
    
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("hide_eye");
        var hide_eye = document.getElementById("show_eye");
        show_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        } else {
            x.type = "password";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";

        }
    }
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