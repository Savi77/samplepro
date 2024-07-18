<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LogIn</title>

    <!--Global stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url() ?>new-assets/assets/css/newstyle.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>new-assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!--/global stylesheets -->
    <script src="https://kit.fontawesome.com/6a2e8e265f.js" crossorigin="anonymous"></script>

    <!--Core JS files -->
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!--/core JS files -->

    <!--Theme JS files -->
    <script src="<?= base_url() ?>new-assets/assets/js/app.js"></script>
    <!--/theme JS files -->
    <style>
        small.help-block {
            color: red !important;
        }
    </style>
</head>

<body>

    <!-- particles.js container -->
    <div id="particles-js"></div>
    <!-- scripts -->
    <script src="<?= base_url() ?>new-assets/js/particles.js"></script>
    <script src="<?= base_url() ?>new-assets/js/app.js"></script>

    <!-- stats.js -->
    <script src="<?= base_url() ?>new-assets/js/stats.js"></script>
    <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>


    <div class="login-form-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="login-container">
                    <div class="content d-flex justify-content-center align-items-center">
                        <form class="login-form signin" id="LoginForm">
                            <img src="<?= base_url() ?>new-assets/assets/images/Backup_of_BURO FORCE final logo.svg" class=" d-sm-block center-img" alt="">


                            <div class="card-body p-20 login-form-card">
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <label class="user">Username</label>
                                    <input type="text" class="form-control pl-2" name="username" id="username" placeholder="Enter Username">
                                    <div class="form-control-feedback" >
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <label class="user">Password</label>
                                    <input type="password" class="form-control pl-2" id="password" name="password" placeholder="Enter Password">
                                    <!--			<div class="form-control-feedback">-->
                                    <!--<i class="fa fa-key"></i>-->
                                    <!--  <span onclick="password_show_hide();">-->
                                    <!--            <i class="fa fa-eye" id="hide_eye"></i>-->
                                    <!--            <i class="fa fa-eye-slash d-none" id="show_eye"></i>-->
                                    <!--          </span>-->
                                    <!--			</div>-->
                                </div>

                                <div class="form-group">
                                    <a href="#"><button type="submit" class="btn btn-primary btn-block"> <!--<i class="fa fa-lock" aria-hidden="true">--></i>LOGIN </button></a>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" checked>
                                        <span class="custom-control-label">Remember</span>
                                    </label>

                                    <a href="<?= base_url(); ?>SignIn/recovery_pass" class="ml-auto">Forgot password?</a>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 text-slider">
                <div class="w3-content w3-section">
                    <div class="mySlides">
                        <div class="custom-margin-padding">
                            <h2 class="heading-1"><?= $loginTitle = ($loginDetails->login_title) ? $loginDetails->login_title : '' ; ?></h2>
                            <p class="bold-para">
                            <?= $loginSubTitle = ($loginDetails->login_sub_title) ? $loginDetails->login_sub_title : '' ; ?>
                            </p>
                            <div style="height: 260px;overflow-y: scroll;margin-bottom: 2%;">
                                <?php
                                    $colors = array('red','yellow','green','blue','red','yellow','green','blue','red','yellow','green','blue','red','yellow','green','blue');
                                    $lgArray = json_decode($loginDetails->login_list);
                                    $lgCount = count($lgArray);
                                    $j = 0;
                                    foreach ($lgArray as $lg) {
                                        if ($lg != '') {
                                ?>
                                    <div class="flex-content">
                                        <p class="login-page-para"> <i class="fa fa-check <?= $colors[$j]; ?>" aria-hidden="true"></i><?php echo $lg; ?></p>
                                    </div>    
                                <?php } $j++; } ?>
                            </div>
                            <a href="<?= base_url('SignUp'); ?>">
                                <button type="button" class="btn btn-primary TRIAL-BTN ">START MY FREE TRIAL <i class="icon-arrow-right14 position-right"></i></button>
                            </a>
                        </div>
                        <img class="svg-animation" src="<?= base_url(); ?>new-assets/assets/Images/63787-secure-login.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!--style sheet-->
<style>
    /*text-column*/
    .text-slider {
        background: #fff;
        padding: 0;
    }

    .custom-margin-padding {
        padding: 20px 30px;
    }

    h2.heading-1 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #1e6196;
        font-family: 'Roboto';
    }

    p.login-page-para {
        font-size: 15px;
        margin-bottom: 20px;
        font-family: 'Roboto';
        color: #181818;
        line-height: 18px;
    }

    p.bold-para {
        font-size: 16px;
        font-family: 'Roboto';

        margin-bottom: 20px;
    }

    i.fa.fa-check.red {
        padding-right: 10px;
        color: #d63722;
        font-size: 19px;
    }

    i.fa.fa-check.yellow {
        padding-right: 10px;
        color: #fdc80a;
        font-size: 19px;
    }

    i.fa.fa-check.blue {
        padding-right: 10px;
        color: #0e66ad;
        font-size: 19px;
    }

    i.fa.fa-check.green {
        padding-right: 10px;
        color: #02964a;
        font-size: 19px;
    }

    img.d-sm-block.center-img {
        width: 200px;
    }

    /*button.btn.btn-primary.TRIAL-BTN {*/
    /*    MARGIN-TOP: 20PX;*/
    /*}*/
    .login-form {
        width: 70%;
        margin-top: 50px;
    }

    .login-form-wrapper {
        position: relative;
        z-index: 999;
        /*margin-top:50px;*/

    }

    .card.mb-0.logincard {
        box-shadow: 0px -1px 20px 6px rgb(53 105 144);
        border: 0px;
    }

    .card-body.p-20.login-form-card {
        background: #fff;
        margin: 30px auto;
        border: 1px solid #1e6196;
        border-radius: 10px;
        width: 85%;
    }

    label.user {
        font-family: 'Roboto';
        font-size: 15px;
        margin-bottom: 5px;
    }

    img.svg-animation {
        width: 350px;
        height: 300px;
    }

    .flex-content {
        display: flex;
    }

    form {
        padding: 20px 0;
        position: relative;
        z-index: 2;
    }

    /* =============================================================================
   HTML5 CSS Reset Minified - Eric Meyer
   ========================================================================== */

    html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent
    }

    body {
        line-height: 1
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block
    }

    nav ul {
        list-style: none
    }

    blockquote,
    q {
        quotes: none
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: none
    }

    a {
        margin: 0;
        padding: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
        text-decoration: none
    }

    mark {
        background-color: #ff9;
        color: #000;
        font-style: italic;
        font-weight: bold
    }

    del {
        text-decoration: line-through
    }

    abbr[title],
    dfn[title] {
        border-bottom: 1px dotted;
        cursor: help
    }

    table {
        border-collapse: collapse;
        border-spacing: 0
    }

    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1em 0;
        padding: 0
    }

    input,
    select {
        vertical-align: middle
    }

    li {
        list-style: none
    }


    /* =============================================================================
   My CSS
   ========================================================================== */

    /* ---- base ---- */

    html,
    body {
        width: 100%;
        height: 100%;
        background: #111;
    }

    html {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    body {
        font: normal 75% Arial, Helvetica, sans-serif;
    }

    canvas {
        display: block;
        vertical-align: bottom;
        position: absolute;
        z-index: 1;
        background: #303030;
    }

    .particles-js-canvas-el {
        width: 50% !important;
        height: 100%;
    }

    body.custom-scrollbars {
        background: #fff;
    }

    /* ---- stats.js ---- */

    .count-particles {
        background: #000022;
        position: absolute;
        top: 48px;
        left: 0;
        width: 80px;
        color: #13E8E9;
        font-size: .8em;
        text-align: left;
        text-indent: 4px;
        line-height: 14px;
        padding-bottom: 2px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    .js-count-particles {
        font-size: 1.1em;
    }

    #stats,
    .count-particles {
        -webkit-user-select: none;
        margin-top: 5px;
        margin-left: 5px;
    }

    #stats {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .count-particles {
        border-radius: 0 0 3px 3px;
    }

    div#stats {
        display: none;
    }

    i#show_eye {

        border: 0px !important;
        position: absolute;
        right: -330px;
        top: 3px;
        color: #a0abc2;
    }

    i#hide_eye {
        position: absolute;
        top: 3px;
        right: -330px;
        color: #a0abc2;
    }

    .ui-pnotify.ui-pnotify-fade-normal.ui-pnotify.ui-pnotify-move{
        position: absolute; 
        top:50%;
        left:50%;
        transform: translate(-50%);
    }


    /*responsive*/
    @media (max-width:767px) {
        body {
            overflow: auto;
        }

        .particles-js-canvas-el {
            width: 100% !important;
        }

        form.login-form.signin {
            text-align: center;
        }

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

    @media(min-width:1600px) {
        i#hide_eye {
            position: absolute;
            top: 3px;
            right: -540px;
            color: #a0abc2;
        }

        i#show_eye {
            right: -540px;
        }

        .login-container {
            margin-top: 100px;
        }
    }
</style>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
<script>
    $(document).ready(function() {
        $('#LoginForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Username'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Please Enter Registered Email Address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Password'
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
                            $('#failLoginModal').modal('show');
                            // new PNotify({
                            //     title: 'Login Fail',
                            //     text: 'Please contact admin..',
                            //     type: 'danger'
                            // });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn') ?>";
                            }, 2000);
                            
                        } else if (data == 1) {
                            $('#successLoginModal').modal('show');
                            // new PNotify({
                            //     title: 'Login',
                            //     text: 'Login successful',
                            //     type: 'success'
                            // });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Dashboard/view_dashboard') ?>";
                            }, 400);
                        } else if (data == 2) {
                            $('#restrictionLoginModal').modal('show');
                            // new PNotify({
                            //     title: 'Login Restriction',
                            //     text: 'Allow Only one login over the internet',
                            //     type: 'danger'
                            // });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn') ?>";
                            }, 2000);
                        } else {
                            $('#invalidLoginModal').modal('show');
                            // new PNotify({
                            //     title: 'Login Fail',
                            //     text: 'Invalid Username/Password',
                            //     type: 'danger'
                            // });
                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn') ?>";
                            }, 2000);
                        }
                    },
                    error: function(exception) {
                        // PNotify.removeAll();
                        $('#alertModal').modal('show');
                        $('#alertmsg').html('Exeption:' + exception);
                        setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn') ?>";
                            }, 2000);
                        // alert('Exeption:' + exception);
                    }
                });
            }
            return false;
        }));
    });
</script>

<div class="modal" id='alert-msg' tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successLoginModal" tabindex="-1" aria-labelledby="successLoginModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successLoginModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Login Successfully</div>
            <!-- <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="failLoginModal" tabindex="-1" aria-labelledby="failLoginModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failLoginModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Login Fail</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Please Enter Valid Login Details...</div>
                <!-- <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="restrictionLoginModal" tabindex="-1" aria-labelledby="restrictionLoginModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="restrictionLoginModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Login Restriction</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Allow Only one login over the internet...</div>
                <!-- <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="invalidLoginModal" tabindex="-1" aria-labelledby="invalidLoginModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="invalidLoginModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Login Fail</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Invalid Username/Password</div>
                <!-- <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;" id="alertmsg"></div>
            <!-- <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('SignIn'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div> -->
        </div>
    </div>
</div>

<!--<script>-->
<!--function password_show_hide() {-->
<!--  var x = document.getElementById("password");-->
<!--  var show_eye = document.getElementById("hide_eye");-->
<!--  var hide_eye = document.getElementById("show_eye");-->
<!--  hide_eye.classList.remove("d-none");-->
<!--  if (x.type === "password") {-->
<!--    x.type = "text";-->
<!--    show_eye.style.display = "block";-->
<!--    hide_eye.style.display = "none";-->
<!--  } else {-->
<!--    x.type = "password";-->
<!--    show_eye.style.display = "none";-->
<!--    hide_eye.style.display = "block";-->

<!--  }-->
<!--}-->
<!--</script>-->

<!--<script>-->
<!--var myIndex = 0;-->
<!--carousel();-->

<!--function carousel() {-->
<!--  var i;-->
<!--  var x = document.getElementsByClassName("mySlides");-->
<!--  for (i = 0; i < x.length; i++) {-->
<!--    x[i].style.display = "none";  -->
<!--  }-->
<!--  myIndex++;-->
<!--  if (myIndex > x.length) {myIndex = 1}    -->
<!--  x[myIndex-1].style.display = "block";  -->
<!--  setTimeout(carousel, 60000);  Change image every 2 seconds-->
<!--}-->
<!--</script>-->