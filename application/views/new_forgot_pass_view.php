<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_password_recover.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 14:26:56 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Buroforce Password recovery</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>new-assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>new-assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
    <script src="https://kit.fontawesome.com/6a2e8e265f.js" crossorigin="anonymous"></script>


	<!-- Core JS files -->
	<script src="<?= base_url() ?>new-assets/global_assets/js/main/jquery.min.js"></script>
	<script src="<?= base_url() ?>new-assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?= base_url() ?>new-assets/assets/js/app.js"></script>
	<!-- /theme JS files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />

</head>

<body>
<style>
    form.login-form.password-recovery {
        width: 25%;
    }
    .form-control-feedback {
        position:absolute;
        top:0;
    }
    /*mobile responsive*/
    @media (max-width:767px){
        form.login-form.password-recovery{
            width:90%;
        }
    }
    .help-block {
        color: red;
    }
</style>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content-inner">
				<div class="content d-flex justify-content-center align-items-center">
                    <form id="ForgotLoginForm" class="col-sm-3" >
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Password recovery</h5>
									<span class="d-block text-muted">We'll send you instructions in email</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-right">
									<input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off">
									<div class="form-control-feedback">
										<i class="icon-mail5 text-muted"></i>
									</div>
								</div>

								<button type="submit" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
                                <div align="center" id="preview3"></div>    
							</div>
                            <a href="<?php echo base_url(); ?>SignIn" class="mt-3" style="background: #BAB3B326;">
                                <div class="card-footer text-black text-center">
                                    Back To Login
                                </div>
                            </a>
						</div>
					</form>
                </div>
			</div>
		</div>
	</div>
    <div class="footer text-muted text-center mb-3">
        Copyright ©<?= date('Y')?>, Buroforce | All right reserved. <a href="https://www.ileaf.in" target="_blank">Powered By iLEAF Information Technology Pvt Ltd</a>
    </div>
</body>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ForgotLoginForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Email'
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

    $(document).ready(function(e) {
        $("#ForgotLoginForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Authenticate data...."/>');
                $("#preview3").show();  
                $.ajax({
                    url: "<?php echo base_url('SignIn/forgotpassword'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        if (data == 1 ) {
                            //alert();
                            $(function() {
                                // new PNotify({
                                //     title: 'Forgot Password Form',
                                //     text: 'This Email Id is not registered.<br> please verify ',
                                //     type: 'danger'
                                // });
                                $('#failForgotpasswordModal').modal('show');
                            });
                            $("#preview3").hide();
                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn/recovery_pass'); ?>";
                            }, 2000);
                        } else if (data == 2) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Register Form',
                                //     text: 'Email has been sent on your registered Email Id.',
                                //     type: 'success'
                                // });
                                $('#successForgotpasswordModal').modal('show');
                            });
                            $("#preview3").hide();
                            setTimeout(function() {
                                window.location = "<?php echo base_url('SignIn'); ?>";
                            }, 2000);
                        }


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
</html>

<div class="modal fade" id="successForgotpasswordModal" tabindex="-1" aria-labelledby="successForgotpasswordModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successForgotpasswordModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Email has been sent on your registered Email Id</div>
            <!-- <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="failForgotpasswordModal" tabindex="-1" aria-labelledby="failForgotpasswordModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failForgotpasswordModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation-triangle" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Login Fail</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">This Email Id is not registered.please verify</div>
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
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <!-- <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('SignIn'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div> -->
        </div>
    </div>
</div>

