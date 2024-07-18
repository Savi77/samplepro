<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Admin/header'); ?>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<!-- /theme JS files -->

	<style type="text/css">
		.box_shade {
			border: solid 1px #555;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
			-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
			-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
		}
	</style>


</head>

<body>
	<?php
	$data = $this->db->get("tbl_web_logo")->row();
	if ($data->logo_name_two != '') {
		$file = base_url() . 'assets/images/web_images/' . $data->logo_name_two;
	}
	?>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand">
				<img src="<?= $file; ?>" alt="" style="width:150px;height:40px;margin-top: -10px;">
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">

			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Password recovery -->
				<form id="ForgotLoginForm">
					<div class="panel panel-body login-form box_shade">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
						</div>

						<div class="form-group has-feedback">
							<input type="email" class="form-control" name="email" id="email" placeholder="Your email">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>

						<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
				<!-- /password recovery -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			Copyright ©<?php echo date("Y"); ?>, Buroforce | All right reserved.</a> <a href="https://www.ileaf.in" target="_blank">Powered By iLEAF Information Technology Pvt Ltd</a>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->



	<!--=======================================  Validation login  ==========================================-->

	<script type="text/javascript">
		$(document).ready(function() {
			$('#ForgotLoginForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					Username: {
						validators: {
							notEmpty: {
								message: 'Username is required.'
							}
						}
					},
					Password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					},

					email: {
						validators: {
							notEmpty: {
								message: 'Email is required.'
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
					// $("#loader").html('<img src="images/5.gif" alt="Uploading...."/>');

					$.ajax({
						url: "<?php echo base_url('SignIn/forgotpassword'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							//alert(data);

							if (data == 1) {
								//alert();
								$(function() {
									new PNotify({
										title: 'Forgot Password Form',
										text: 'This Email Id is not registered.<br> please verify ',
										type: 'danger'
									});
								});

								setTimeout(function() {
									window.location = "";
								}, 2000);
							} else if (data == 2) {
								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Email has been sent on your registered Email Id.',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location = "<?php echo base_url('SignIn'); ?>";
								}, 2000);
							}


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



</body>

</html>