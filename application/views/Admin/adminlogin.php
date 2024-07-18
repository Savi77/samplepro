<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Buroforce Sign In">
	<meta name="keywords" content="Buroforce Sign In">
	<meta name="author" content="Buroforce">
	<title>Buroforce Sign In</title>
	<link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/icheck.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/custom.css">
	<!-- END: Vendor CSS-->
	<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/notify/pnotify.custom.min.css">
	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/components.min.css">
	<!-- END: Theme CSS-->
	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/pages/login-register.min.css">
	<!-- END: Page CSS-->
	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/style.css">
	<!-- END: Custom CSS-->
	<style type="text/css">
		.line-on-side {
			border-bottom: 1px solid #DADADA !important;
			line-height: .1em !important;
			margin: 10px 0 15px !important;
		}

		.bv-form .help-block {
			color: #ad0c0c !important;
		}

		.brighttheme-notice {
			background-color: #9c4242 !important;
			border: 0 solid #FF0 !important;
			color: #FFF !important;
		}
		.navbar-inverse {
		border-bottom-color: rgba(255, 255, 255, 0.1);
		color: #fff;
		}

		.navbar {
		margin-bottom: 0;
		border-width: 1px 0;
		padding-left: 0;
		padding-right: 0;
		}
		.navbar-inverse {
			background-color: #BEBEBE;
			border-color: #37474F;
		}
		@media (min-width: 769px){
			.navbar {
			border-radius: 0;
			}
			.navbar {
				padding-left: 20px;
				padding-right: 20px;
			}
		}
		.navbar {
			position: relative;
			min-height: 54px;
			margin-bottom: 20px;
			border: 1px solid transparent;
			margin-top: -3.9%;
			margin-bottom: 0;
		}
		.adminLogin{
			margin-left: 67%;
		}
		@media screen and (max-width: 9000px) and (min-width: 5000px) { 
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -0.5%;
				margin-bottom: 0;
			}
		}
		@media screen and (max-width: 5000px) and (min-width: 3000px) { 
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -1.1%;
				margin-bottom: 0;
			}
		}
		@media screen and (max-width: 3000px) and (min-width: 2000px) { 
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -1.7%;
				margin-bottom: 0;
			}
		}
		@media (max-width: 900px){
			.adminLogin{
				margin-left: 10%;
			}
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -6.5%;
				margin-bottom: 0;
			}
		}
		@media (max-width: 700px){
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -7.5%;
				margin-bottom: 0;
			}
		}
		@media (max-width: 550px){
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -10%;
				margin-bottom: 0;
			}
		}
		@media (max-width: 400px){
			.navbar {
				position: relative;
				min-height: 54px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				margin-top: -17%;
				margin-bottom: 0;
			}
		}
	</style>
</head>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image-admin blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="overflow-y:hidden;">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-body">
				<section class="flexbox-container">
					<div class="col-12 d-flex">
						<div class="col-lg-4 col-md-8 adminLogin">
							<div class="card border-grey border-lighten-3 px-1 py-1 m-0 col-11 box-shadow-2 p-0">
								<div class="card-header border-0 px-0">
									<div class="card-title text-center">
										<img src="<?= base_url() ?>app-assets/images/logo/stack-logo-dark.png" style="height: 6rem;">
										<br />
										<img src="<?= base_url() ?>app-assets/images/logo/logo_two.png" style="height: 0.8rem;width: 7rem;">
										<br />
										<img src="<?= base_url() ?>app-assets/images/logo/logo_three.png" style="height: 0.6rem;width:16rem;">
									</div>
								</div>
								<div class="card-content">
									<p class="card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1"><span> Admin login</span></p>
									<div class="card-body">
										<form class="form-horizontal" id="LoginForm">
											<fieldset class="form-group position-relative has-icon-left">
												<input type="text" class="form-control" name="username" placeholder="Enter Username" autocomplete="off">
												<div class="form-control-position">
													<i class="ft-user"></i>
												</div>
											</fieldset>
											<fieldset class="form-group position-relative has-icon-left">
												<input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off">
												<div class="form-control-position">
													<i class="fa fa-key"></i>
												</div>
											</fieldset>
											<div class="form-group row">
												<div class="col-sm-6 col-12 text-center text-sm-left pr-0">
												</div>
												<div class="col-sm-6 col-12 float-sm-left text-center text-sm-right" style="display: none;"><a href="#" class="card-link">Forgot Password?</a></div>
											</div>
											<button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
											<div align="center" id="preview3"></div>
											<br><br>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="navbar navbar-inverse">
			<div class="navbar-header">				
				<!-- Footer -->
				<div class="footer text-muted" style="color: white !important;">
					&copy; <?php echo date("Y"); ?>  <a href="https://www.buroforce.com" target="_blank">www.buroforce.com</a>
				</div>
				<!-- /footer -->
			</div>
		</div>
	</div>
	<!-- END: Content-->

	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
	<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
	<script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
	<script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
	<script src="<?= base_url() ?>app-assets/js/core/app-menu.min.js"></script>
	<script src="<?= base_url() ?>app-assets/js/core/app.min.js"></script>
	<script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.min.js"></script>
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
	</script>

	<script type="text/javascript">
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
							if (data == 1) {
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

</body>

</html>