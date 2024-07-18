<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">

    <title>Verify Mail</title>
    <style>
        .form-control:focus {
        outline: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #ddd;
    }
    input::placeholder::before{
        content:"/f023";
        font-family: fontAwesome;
    }
    .login-text:hover{
        text-decoration: underline #003399;
    }
    .icon-click{
        color: #000;
    }
    .icon-click:hover{
        color: #000;

    }
    </style>
</head> 
<body>
<?php
$str = $this->uri->segment(3);
?>
        <section>
            <div class="container" style="max-width: 700px;font-family: catamaran, sans-serif;margin-top: 50px;border: 1px solid #f5f5f5;box-shadow: 5px 10px 30px #dee2e6;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="https://buroforce.progfeel.co.in//app-assets/image/BURO_FORCE_logo_ctc.png" alt="" style="max-width: 250px;width: 100%;height: auto;display: block;margin: 0 auto;padding: 20px;">	
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center" style="background-color: #003399;padding: 30px;">
                        <i class="fa-solid fa-user-lock" style="font-size: 60px;color: #fff;"></i>
                        <h3 style="font-size: 32px;font-weight: 400;color: #fff;margin-top: 10px;margin-bottom:0">Please Reset Your Password</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="padding: 50px 50px 15px 50px;">
                        <!-- <div>
                            <form action="<?= base_url()?>CreateProfile/PasswordReset" method="POST">
                            <div class="mb-3" style="position: relative;">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control Pass" placeholder="Enter New Password" name= "password">
                                <input type="hidden" class="form-control Pass" name= "email" value="<?php echo $str;?>">
                                <a class="icon-click"><i class="fa fa-eye-slash" style="position: absolute;top: 42px;right: 10px;"></i></a>

                            </div>
                            <div class="mb-3" style="position: relative;">
                                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control Pass" id="confirmNewPassword" placeholder="Confirm New Password" name="cpassword">
                                <a class="icon-click"><i class="fa fa-eye-slash" style="position: absolute;top: 42px;right: 10px;"></i></a>

                            </div>
                            <div style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                 <button style="display: block;color: #fff;background-color: #003399;border-color: #003399;font-weight: 400;text-align: center;border: 1px solid transparent;padding: 0.4375rem 0.875rem;font-size: .875rem;line-height: 1.5715;border-radius: 0.25rem;float: right;">Save Your New Password</button>
                               <p style="margin-top: 12px;">Back to  <a href="<?= base_url()?>SignIn"><span class="login-text" style="color: #003399;font-weight: 600;cursor: pointer;">Login</span></a></p>
                            </div>
                            </form>
                        </div> -->

                        <div>
                            <form class="form-horizontal" id="addform">
                                <div class="mb-3" style="position: relative;">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control " id="Password" placeholder="Enter New Password" name="password" required>
                                    <a id="icon-click"><i class="fa fa-eye-slash" style="position: absolute;top: 42px;right: 10px;"></i></a>
                                </div>
                                <div class="mb-3" style="margin-top: 7px;position: relative;" id="BlankPassword"></div>
                                <div>
                                <input type="hidden" class="form-control Pass" name= "email" value="<?php echo $str;?>">
                                </div>
                                <div class="mb-3" style="position: relative;">
                                    <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm New Password" name="cpassword" required>
                                    <a id="icon-click-2"><i class="fa fa-eye-slash" style="position: absolute;top: 42px;right: 10px;"></i></a>
                                </div>
                                <div class="mb-3" style="margin-top: 7px;positionburoforce.progfeel.co.in: relative;" id="CheckPasswordMatch"></div>
                                
                                <div class="mb-3" style="margin-top: 7px;position: relative;" id="BlankConfirmPassword"></div>
                                <div style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                    <button style="display: block;color: #fff;background-color: #003399;border-color: #003399;font-weight: 400;text-align: center;border: 1px solid transparent;padding: 0.4375rem 0.875rem;font-size: .875rem;line-height: 1.5715;border-radius: 0.25rem;float: right; border-radius: 30px;" onclick = "CheckValidation()">Save Your New Password</button>
                                    <p style="margin-top: 12px;">Back to <a href = "<?= base_url('SignIn');?>"><span class="login-text" style="color: #003399;font-weight: 600;cursor: pointer;">Login</span></a></p>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div  class="col-md-12" style="background-color: #003399;padding: 25px 20px;color: #fff;font-size: 16px; text-align:center;">
                            <p style=" margin-bottom: 0;">Copyright © 2023 Buroforce | All Rights Reserved.</p>
                            <a href="<?echo base_url();?>" style="text-decoration:none;"><p style="text-align: center; margin-top: 0; color: #fff; text-decoration: none;margin-bottom:0">Buroforce.com</p><a>
                        <!-- <div class="col-md-7" style="align-self: center;">
                            <span>Copyright © 2023 Buroforce | All Rights Reserved.</span>
                        </div> -->
                    </div>
                   
                </div>
                
                
            </div>
           
        </section>

        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

        <script>

        $(document).ready(function() {
        $("#icon-click").click(function(e) {          // capture the event e here
            var input = $("#Password");

            if (input.attr("type") == "text") {
                input.attr("type", "password");
                e.target.classList.remove('fa-eye');    // e.target is what is clicked (icon)
                e.target.classList.add('fa-eye-slash');
            } else {
                input.attr("type", "text");
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
            }
        });

        $("#icon-click-2").click(function(e) {          // capture the event e here
            var confirmInput = $("#ConfirmPassword");

            if (confirmInput.attr("type") == "text") {
                confirmInput.attr("type", "password");
                e.target.classList.remove('fa-eye');    // e.target is what is clicked (icon)
                e.target.classList.add('fa-eye-slash');
            } else {
                confirmInput.attr("type", "text");
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
            }
        });
        });

        </script>

        <script>
            $(document).ready(function () {
            $("#ConfirmPassword").on('keyup', function(){
                var password = $("#Password").val();
                var confirmPassword = $("#ConfirmPassword").val();
                if (password != confirmPassword)
                    $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
                else
                    $("#CheckPasswordMatch").html("Password match !").css("color","green");
            });
            });
        </script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
            Password = {
                validators: {
                    notEmpty: {
                        message: 'New Password is required'
                    }
                }
            },
            ConfirmPassword = {
                validators: {
                    notEmpty: {
                        message: 'Confirm Password is required'
                    }
                }
            }
            bookIndex = 0;

           $('#addform')
               .bootstrapValidator({
                   framework: 'bootstrap',
                   icon: {
                       valid: 'glyphicon glyphicon-ok',
                       invalid: 'glyphicon glyphicon-remove',
                       validating: 'glyphicon glyphicon-refresh'
                   },
                   fields: {
                       'Password' : password,
                       'ConfirmPassword': cpassword
                   }
               })
       });
</script> -->

<script type="text/javascript">
// function CheckValidation() 
// {
//     var password = $("#Password").val();
//     var confirmPassword = $("#ConfirmPassword").val();
//     if(password == '')
//     {
//         $("#BlankPassword").html("Password is required !").css("color","red");

//     }
//     if(confirmPassword == '')
//     {
//         $("#BlankConfirmPassword").html("Confirm Password is required !").css("color","red");

//     }
    
// }

</script>

<script type="text/javascript">
        $(document).ready(function(e) {
            $("#addform").on('submit', (function(e) {
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('CreateProfile/PasswordReset'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // new PNotify({
                            //     title: 'Password Reset',
                            //     text: 'Password Reset Successfully',
                            //     type: 'success'
                            // });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn'); ?>";
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
    

    <script src="https://kit.fontawesome.com/6a2e8e265f.js" crossorigin="anonymous"></script>

</body>
</html>