<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Admin/includes/header'); ?>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
	<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js">
	</script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js">
	</script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>

	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
	</script>
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
	</script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js">
	</script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>



	<style type="text/css">
		.has-success .help-block,
		.has-success .control-label,
		.has-success .radio,
		.has-success .checkbox,
		.has-success .radio-inline,
		.has-success .checkbox-inline,
		.has-success.radio label,
		.has-success.checkbox label,
		.has-success.radio-inline label,
		.has-success.checkbox-inline label {
			color: #2d2725 !important;
		}

		.table-striped>tbody>tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, .05);
		}

		table.table td h2.table-avatar {
			align-items: center;
			display: inline-flex;
			font-size: inherit;
			font-weight: 550;
			margin: 0;
			padding: 0;
			vertical-align: middle;
			white-space: nowrap;
		}

		table.table td .avatar {
			margin: 0 10px 0 0;
		}

		.avatar>img {
			border-radius: 50%;
			display: block;
			overflow: hidden;
			width: 40px;
			height: 40px;
		}

		table.table td h2 span {
			color: #888;
			display: block;
			font-size: 12px;
			margin-top: 3px;
		}

		table.table td h2 a {
			color: #333;
		}

		/* panel css */


		div#example_wrapper {
			padding: 20px 0;
		}

		.navbar-brand>img {
			margin-top: -1.8rem !important;
		}

		/* panel css end */

		/* main content css starts */
		.border-top-primary {
			border-top-color: #2196f3 !important;
		}

		.card {
			margin-bottom: 1.25rem;
			box-shadow: 0 1px 2px rgb(0 0 0 / 5%);
		}

		.custom-scrollbars * {
			-ms-overflow-style: -ms-autohiding-scrollbar;
			scrollbar-width: thin;
			scrollbar-color: #999 #eee;
		}

		.card-body {
			-ms-flex: 1 1 auto;
			flex: 1 1 auto;
			min-height: 1px;
			padding: 1.25rem;
		}

		.card {
			position: relative;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #fff;
			background-clip: border-box;
			border: 1px solid rgba(0, 0, 0, .125);
			border-radius: .25rem;
		}

		*,
		::after,
		::before {
			box-sizing: border-box;
		}

		user agent stylesheet div {
			display: block;
		}

		.text-center {
			text-align: center !important;
		}

		.align-items-center {
			-ms-flex-align: center !important;
			align-items: center !important;
		}

		.d-inline-flex {
			display: -ms-inline-flexbox !important;
			display: inline-flex !important;
		}

		*,
		::after,
		::before {
			box-sizing: border-box;
		}

		.btn:not(:disabled):not(.disabled) {
			cursor: pointer;
		}

		[type=button]:not(:disabled),
		[type=reset]:not(:disabled),
		[type=submit]:not(:disabled),
		button:not(:disabled) {
			cursor: pointer;
		}

		.btn-float {
			padding: 1.1rem;
			border-radius: .25rem;
		}

		.icon-add:before {
			content: "\e991";
			font-size: 24px;
		}

		.fa-eye:before {
			content: "\f06e";
			font-size: 24px;
		}

		.btn {
			position: relative;
		}

		.custom-scrollbars * {
			-ms-overflow-style: -ms-autohiding-scrollbar;
			scrollbar-width: thin;
			scrollbar-color: #999 #eee;
		}

		.rounded-pill {
			border-radius: 50rem !important;
		}

		.btn-success {
			color: #fff;
			background-color: #25b372;
			border-color: #25b372;
		}

		.btn {
			display: inline-block;
			font-weight: 400;

			text-align: center;
			vertical-align: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			border: 1px solid transparent;
			line-height: 1.5715;
			border-radius: .25rem;
			transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
		}

		[type=button],
		[type=reset],
		[type=submit],
		button {
			-webkit-appearance: button;
		}

		button,
		select {
			text-transform: none;
		}

		button,
		input {
			overflow: visible;
		}

		button,
		input,
		optgroup,
		select,
		textarea {
			margin: 0;
			font-family: inherit;
			font-size: inherit;
			line-height: inherit;
		}

		button {
			border-radius: 0;
		}

		*,
		::after,
		::before {
			box-sizing: border-box;
		}

		user agent stylesheet button {
			appearance: auto;
			-webkit-writing-mode: horizontal-tb !important;
			text-rendering: auto;
			color: -internal-light-dark(black, white);
			letter-spacing: normal;
			word-spacing: normal;
			text-transform: none;
			text-indent: 0px;
			text-shadow: none;
			display: inline-block;
			text-align: center;
			align-items: flex-start;
			cursor: default;
			background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
			box-sizing: border-box;
			margin: 0em;
			font: 400 13.3333px Arial;
			padding: 1px 6px;
			border-width: 2px;
			border-style: outset;
			border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
			border-image: initial;
		}

		.btn-danger {
			color: #fff;
			background-color: #ef5350;
			border-color: #ef5350;
		}

		.btn-success {
			color: #fff;
			background-color: #25b372;
			border-color: #25b372;
		}

		.btn-indigo {
			color: #fff;
			background-color: #5c6bc0;
			border-color: #5c6bc0;
		}

		.row {
			margin-left: -7px;
			margin-right: -10px;
		}

		.eye-icon {
			color: white;
			font-size: 16px;
		}

		.m-0 {
			margin-bottom: 21px;
			font-weight: 500 !important;
		}

		.card {
			border-radius: 4px;
			background: #fff;
			box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
			transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);


			/* background-image: url(https://ionicframework.com/img/getting-started/theming-card.png); */
			background-repeat: no-repeat;
			background-position: right;
			background-size: 80px;
		}

		.card:hover {
			transform: scale(1.05);
			box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
		}

		.card h3 {
			font-weight: 600;
		}

		.card img {
			position: absolute;
			top: 20px;
			right: 15px;
			max-height: 120px;
		}

		@media(max-width: 990px) {
			.card {
				margin: 20px;
			}
		}

	</style>

</head>

<body style="overflow-x: hidden;">
	<?php $this->load->view('Admin/includes/admin_header'); ?>


	<div class="page-container">
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<div class="content-wrapper">
				<div class="row">

					<input type="hidden" name="no_of_user" id="no_of_user"
						value="<?= $plan_subscription->no_of_user; ?>">

					<div class="row">
						<?php $this->load->view('Admin/includes/panel'); ?>
						<div class="page-header">
							<div class="page-header-content">
								<div class="page-title">
									<h4>
										<i class="icon-arrow-left52 position-left"></i>
										<a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span
												class="text-semibold">Dashboard</span></a> - User Management
									</h4>
								</div>

							</div>
						</div>

						<div class="content">

							<!-- Basic button layouts title -->

							<!-- /basic button layouts title -->


							<!-- Default button -->
							<div class="row">

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Department / Designation List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View"
													href="<?php echo base_url('admin/Master/department_designation');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Manage User</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#user_modal"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Users');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Role Permission</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model1"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View"
													href="<?php echo base_url('admin/UserPermission/PermissionRole');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Assign Roles</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">

												<a title="View"
													href="<?php echo base_url('admin/UserPermission/ClonePermission');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">User Permission</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model2"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View" href="<?php echo base_url('admin/UserPermission');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Shift</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model3"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View"
													href="<?php echo base_url('admin/Tracking/MasterShift');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Assign Shift</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View" href="<?php echo base_url('admin/Tracking/shift');?>"
													type="button" class="btn btn-float rounded-pill"
													style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
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

		<!-- pop-up business segment -->

		<div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Department / Designation</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TypeForm">
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Department <span
										style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="department" name="department"
										placeholder="Enter department name" maxlength="50">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Designation <span
										style="color: red;">*</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="designation" name="designation[]"
										placeholder="Enter designation name" maxlength="50">
								</div>
								<div class="col-sm-1" style="padding: 0;">
									<button type="button" class="btn btn-success addButton" id="attachSupport"><i
											class="icon-add"></i></button>
								</div>
							</div>
							<div id="moreSupportUpload"></div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="user_modal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-user-plus" style="zoom:1.1; "></i>
							&nbsp;Add User
						</h5>
					</div>
					<div class="modal-body">
						<form id="UserForm" enctype="multipart/form-data" method="post">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Name: <span style="color: red;">*</span></label>
													<input type="text" class="form-control" id="name" name="name"
														placeholder="Enter Name" maxlength="35">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Email: <span style="color: red;">*</span></label>
													<input type="text" class="form-control" id="email" name="email"
														placeholder="Enter Email" maxlength="35" onkeyup="checkmail()">
													<span id="mail_error" style="color:red;" maxlength="40"> </span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Password: <span style="color: red;">*</span></label>
													<div class="shbtn" id="show_hide_password_user"
														style="display: flex;">
														<input type="password" class="form-control" name="password"
															placeholder="Enter Password" autocomplete="off"
															style="border-right: 0px;" value="<?= $value->Password ?>">
														<div class="input-group-addon">
															<a style="margin-left: -6px;"><i class="icon-eye"
																	aria-hidden="true" style="margin-top:2px"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>

									<fieldset>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Mobile No.: <span style="color: red;">*</span></label>
													<input type="text" class="form-control" id="mobile_no"
														name="mobile_no" placeholder="Enter Mobile no"
														onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
														maxlength="15" onkeyup="checkmobile()">
													<span id="mobile_error" style="color:red;" maxlength="10"> </span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Emp Id: </label>
													<!-- $performaGui; <input type="hidden" name="custom_id" id="custom_id" value="<?= $order_id; ?>"> -->
													<input type="text" class="form-control" id="emp_id" name="emp_id"
														placeholder="Enter Emp Id" onblur="chk_emp_code()">
													<span id="error_emp_code" style="color: red;font-size: 11px"></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Joining Date: </label>
													<input type="text" class="form-control" id="joining_date"
														name="joining_date" placeholder="Enter Joining Date">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="col-md-4">
											<div class="form-group">
												<label>Department:</label>
												<div class="media no-margin-top" style="margin-left: -8px;">
													<select name="department" id="department" class="form-control" ">
                                                            <option value="">Select Department</option>
                                                            <?php foreach ($department as $value) { ?>
                                                                <option value="
														<?= $value->dep_id; ?>"><?= $value->department_name; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Designation:</label>
												<div class="media no-margin-top">
													<select name="designation" id="designation" class="form-control">
														<option value="">Select Designation</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Profile:</label>
													<div class="media no-margin-top">
														<div class="media-left">
															<a href="#"><img
																	src="<?= base_url() ?>assets/admin/assets/images/placeholder.jpg"
																	style="width: 58px; height: 58px;"
																	class="img-rounded" alt="" id="blah"></a>
														</div>

														<div class="media-body">
															<input type="file" class="file-styled" id="imgInp"
																name="file">
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row" style="margin-top: -25px;">
											<div class="col-md-4">
												<div class="form-group">
													<label>User Type:</label>
													<div class="media no-margin-top">
														<select name="user_type_io" id="user_type_io" class="form-control">
															<option value="Inside">Inside</option>
															<option value="Outside">Outside</option>
														</select>
													</div>
												</div>
											</div>
											
										</div>
									</fieldset>

									<br />
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit<i
												class="icon-arrow-right14 position-right"></i></button>
										<span id="preview"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-calendar" style="zoom:1.1; "></i>
							&nbsp;Add Role Permission
						</h5>
					</div>
					<div class="modal-body" style="padding: 0px;">
						<form method="post" id="roelPermissionForm"
							action="<?php echo base_url('admin/UserPermission/SetRolePermission'); ?>">
							<fieldset style="margin-top: 2%;">
								<div class="col-md-6">
									<div class="form-group">
										<label>Role : <sup style="color: red">*</sup></label>
										<div class="">
											<input type="text" name="role" id="role" class="form-control"
												placeholder="Role">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Role Description : <sup style="color: red">*</sup></label>
										<div class="">
											<textarea name="role_description" id="role_description" class="form-control"
												rows="1" maxlength="150" placeholder="Role Description"></textarea>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<table class="table">
									<tbody>
										<?php
										$i = 1;
										foreach ($feature_list as $row) {
											$collapse = "demo" . $i;
											$privilege = $row['privilege'];
											$component_id = $row['component_id'];
										?>
										<tr>
											<td
												style="width: 25%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
												<b><?= $row['component_title']; ?></b></td>
											<td style="width: 75%;">
												<div class="form-group">
													<div class="row">
														<?php
															$checkbox = 1;
	
															foreach ($privilege as  $row) {
																$custom_id = $component_id . '/' . $row->privilege_id;
															?>
														<div class="col-md-2">
															<div class="checkbox">
																<label>
																	<input type="checkbox" name="feature_ids[]"
																		class="styled" value="<?= $custom_id; ?>">
																	<?= $row->privilege;  ?>
																</label>
															</div>
														</div>
														<?php
																$checkbox++;
															}
															?>
													</div>
												</div>


											</td>
										</tr>
										<?php
											$i++;
										} ?>

									</tbody>
								</table>
							</fieldset>
							<fieldset>
								<div class="col-md-12 text-right">
									<div class="form-group" style="margin-top:2%;">
										<button type="submit" class="btn btn-primary" id="submitBtn">Submit
											<i class="icon-arrow-right14 position-right"></i>
										</button>
										<span id="preview12"></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model2" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-copy4" style="zoom:1.1; "></i>
							&nbsp;Copy Permission
						</h5>
					</div>
					<div class="modal-body" style="padding: 0px;">
						<form method="post" id="CopyPermission"
							action="<?php echo base_url('admin/UserPermission/CopyPermission'); ?>">
							<fieldset style="margin-top: 2%;">
								<div class="col-md-6">
									<div class="form-group">
										<label>Role : <sup style="color: red">*</sup></label>
										<div class="">
											<select name="role_id" id="role_id"
												class="select-search select2-hidden-accessible">
												<option value="">Select Role</option>
												<?php foreach ($role_list as $value) { ?>
												<option value="<?= $value['role_id']; ?>"><?= $value['role_name']; ?>
												</option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Role Description : <sup style="color: red">*</sup></label>
										<div class="">
											<select class="select-search select2-hidden-accessible" name="employee_id"
												id="employee_id">
												<option value="">Select Employee</option>
												<?php
											foreach ($array_users->result() as $row3) {
											?>
												<option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<div class="col-md-12 text-right">
									<div class="form-group" style="margin-top:2%;">
										<button type="submit" class="btn btn-primary" id="submitBtn">Copy Permission
											<i class="icon-copy3 position-right"></i>
										</button>
										<span id="preview12"></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model3" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">

			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-calendar" style="zoom:1.1; "></i>
							&nbsp;Add Master Shift
						</h5>
					</div>
					<div class="modal-body">
						<form id="addform" method="post">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Shift Name : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="shift_title">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group clockpicker" data-autoclose="true">
													<label>From Time : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="from_timing"
														id="from_timing" autocomplete="off">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group clockpicker" data-autoclose="true">
													<label>To Time : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="to_timing"
														id="to_timing" autocomplete="off">
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit<i
												class="icon-arrow-right14 position-right"></i></button>
										<span id="preview"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model4" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-briefcase3" style="zoom:1.1; "></i>
							&nbsp; &nbsp;Assign Shift
						</h5>
					</div>
					<div class="modal-body">
						<form id="addform2" method="post">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Select Employee :</label>
													<div class="multi-select-full">
														<select class="multiselect-select-all" multiple="multiple"
															name="emp_id[]">
															<?php   
												foreach ($employee_list as $value1) 
												{
											  ?>
															<option value="<?= $value1->id ?>"><?= $value1->name;?>
															</option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Select Shift :</label>
													<select class="select-search form-control" name="shift_timing">
														<span class="caret"></span>
														<option value="">Select Shift</option>
														<?php   
												foreach ($shift_list as $res) 
												{
											  ?>
														<option value="<?= $res->id ?>">
															<?= $res->shift_title.' -  '.$res->from_timing.' : '.$res->to_timing ?>
														</option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit<i
												class="icon-arrow-right14 position-right"></i></button>
										<span id="preview"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- pop-up business segment end -->

		<!-- Footer -->
		<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
		<!-- /footer -->

		<!-- /basic responsive configuration -->
		<script type="text/javascript">
			$(document).ready(function () {
				$('#TypeForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						title: {
							validators: {
								notEmpty: {
									message: 'Please Enter Title'
								}
							}
						},
						url: {
							validators: {
								notEmpty: {
									message: 'Please Enter URL'
								}
							}
						},

						fileup: {
							validators: {
								notEmpty: {
									message: 'Please Select Image for Home Page'
								}
							}
						},

						fileup1: {
							validators: {
								notEmpty: {
									message: 'Please Select Image for Landing Page'
								}
							}
						},

						emailid: {
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

			$(document).ready(function (e) {
				$("#TypeForm").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?= base_url();?>admin/Master/add_department_designation",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {

								$(function () {
									new PNotify({
										title: 'Department / Designation',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/Master/department_designation'); ?>";
								}, 1000);


							},
							error: function () {
								alert('fail');
							}
						});
					}
					return false;

				}));
			});

		</script>

		<script>
			var cheque_number = 1;
			$('#attachSupport').click(function () {
				//add more file
				var moreUploadTag = '';
				moreUploadTag +=
					'<div class="form-group"><label class="control-label col-sm-3" for="email">Designation <span style="color: red;">*</span></label><div class="col-sm-8"><input type="text" class="form-control" id="designation' +
					cheque_number +
					'" name="designation[]" placeholder="Enter designation name" maxlength="50"></div><div class="col-sm-1" style="padding: 0;"><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
					cheque_number + ')"><i class=" icon-trash"></i></button></div></div>';
				$('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
				cheque_number++;
			});

			function del_file(eleId) {
				var ele = document.getElementById("delete_file" + eleId);
				ele.parentNode.removeChild(ele);
			}

		</script>

		<script type="text/javascript">
			$(document).ready(function () {
				$('#UserForm')
					.find('[name="gender"]')
					.multiselect()
					.end()
					.find('[name="module_ids"]')
					.multiselect({
						// Re-validate the multiselect field when it is changed
						onChange: function (element, checked) {
							$('#UserForm').bootstrapValidator('revalidateField', 'module_ids');
						}
					})
					.end()
					.bootstrapValidator({
						// Exclude only disabled fields
						// The invisible fields set by Bootstrap Multiselect must be validated
						excluded: ':disabled',
						fields: {
							gender: {
								validators: {
									notEmpty: {
										message: 'The gender is required'
									}
								}
							},
							'module_ids2[]': {
								validators: {
									notEmpty: {
										message: 'Please Select Modules'
									}
								}
							},
							name: {
								validators: {
									notEmpty: {
										message: 'Please Enter Full Name'
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
						}
					});
			});
			$(document).ready(function (e) {
				$("#UserForm").on('submit', (function (e) {
					if (e.isDefaultPrevented()) {} else {

						$.ajax({
							url: "<?php echo base_url('admin/Users/Add_user'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								// alert(data);

								$(function () {
									new PNotify({
										title: 'Add User',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/Users'); ?>";
								}, 1000);

							},
							error: function () {
								alert('error occured');
							}
						});
					}
					return false;

				}));
			});
		</script>

		<script type="text/javascript">
			

		</script>

		<script type="text/javascript">
			function checkmail() {
				// var mobileno=$("#mobileno").val();
				var x = $("#email").val();

				var datastring = 'email_id=' + x;
				//alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Users/check_existmail'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						// console.log(data);
						// alert(data);
						if (data == 1) {
							$('#sign-in-button').prop('disabled', true);
							$("#mail_error").html('Email is already exist');
						} else {
							$('#sign-in-button').prop('disabled', false);
							$("#mail_error").html('');
						}
					}
				});
			}

		</script>

		<script type="text/javascript">
			function checkmobile() {
				// var mobileno=$("#mobileno").val();
				var x = $("#mobile_no").val();

				var datastring = 'mobile_no=' + x;
				//alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Users/check_mobile'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						// console.log(data);
						// alert(data);
						if (data == 1) {
							$('#sign-in-button').prop('disabled', true);
							$("#mobile_error").html('Mobile number is already exist');
						} else {
							$('#sign-in-button').prop('disabled', false);
							$("#mobile_error").html('');
						}
					}
				});
			}

		</script>

		<script>
			$(document).ready(function () {
				$("#show_hide_password_user a").on('click', function (event) {
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

			function chk_emp_code() {
				emp_code = $('#emp_id').val();
				if (emp_code == '') {
					$('#error_emp_code').empty();
					$('#error_emp_code').html('Employee Id is required');
					$('#emp_id').focus();
				} else {
					$.ajax({
						url: "<?php echo base_url('admin/Users/chk_emp_code'); ?>",
						dataType: "html",
						type: "POST",
						data: {
							emp_code: emp_code
						},
						success: function (data) {
							// alert(data);
							if (data == 1) {
								$('#error_emp_code').empty();
								$('#error_emp_code').html(
									'Please add another employee code this code assign to a user.');
								$('#emp_id').focus();
							} else {
								$('#error_emp_code').hide();
							}
						}
					});
				}
			}

		</script>

		<script>
			$(function () {
				$('#joining_date').datetimepicker({
					format: 'DD MMMM, YYYY',
					maxDate: 'now',
					useCurrent: true
				});
			});
			$('#department').change(function () {
				getDepartment();
			});

		</script>

		<script type="text/javascript">
			$('#roelPermissionForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					role: {
						validators: {
							notEmpty: {
								message: 'Role is Required'
							}
						}
					},
					role_description: {
						validators: {
							notEmpty: {
								message: 'Role Description is Required'
							}
						}
					},
				}
			});
			$(document).ready(function (e) {
				$("#roelPermissionForm").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$("#preview44").show();
						$("#preview44").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
							);
						$('#submitBtn').prop('disabled', true);
						$.ajax({
							url: "<?php echo base_url('admin/UserPermission/SetRolePermission'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								$("#preview44").hide();
								$('#submitBtn').removeAttr('disabled');
								$(function () {
									new PNotify({
										title: 'Assign Module Permission',
										text: 'Permission Set Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/UserPermission/PermissionRole'); ?>";
								}, 2000);
							},
							error: function () {
								alert('fail');
							}
						});

					}
					return false;
				}));
			});

			function edit_permission(id) {
				var datastring = 'role_id=' + id;
				//alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/UserPermission/edit_mastergroup'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						//alert(data);
						$('#modal_default').modal('show');
						$('#complaint_model_data').html(data);
					},
					error: function () {
						alert('Error while request..');
					}
				});

			}

		</script>

		<script>
			$(document).ready(function (e) {
				$("#CopyPermission").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$("#preview44").show();
						$("#preview44").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
							);

						$.ajax({
							url: "<?php echo base_url('admin/UserPermission/CopyPermission'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								$("#preview44").hide();
								// $("#rsdata").html(data);
								// alert(data);
								// alert(data);
								$(function () {
									new PNotify({
										title: 'Copy Permission',
										text: 'Copy Permission Set Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/UserPermission'); ?>";
								}, 2000);
							},
							error: function () {
								alert('fail');
							}
						});

					}
					return false;
				}));
			});

		</script>

		<script type="text/javascript">
			$("#from_timing").blur(function () {
				$('#addform').bootstrapValidator('revalidateField', 'from_timing');
			});
			$("#to_timing").blur(function () {
				$('#addform').bootstrapValidator('revalidateField', 'to_timing');
			});

		</script>


		<script type="text/javascript">
			$(document).ready(function () {
				$('#addform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						shift_title: {
							validators: {
								notEmpty: {
									message: 'Shift Name Required'
								}
							}
						},
						from_timing: {
							validators: {
								notEmpty: {
									message: 'From Timing Required'
								}
							}
						},
						to_timing: {
							validators: {
								notEmpty: {
									message: 'To Timing Required'
								}
							}
						},

					}
				});
			});

			$(document).ready(function (e) {
				$("#addform").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$.ajax({
							url: "<?php echo base_url('admin/Tracking/add_master_shift'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								// alert(data);
								$(function () {
									new PNotify({
										title: 'Shift Form',
										text: 'Shift Added Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/Tracking/MasterShift'); ?>";
								}, 1000);
							},
							error: function () {
								alert('fail');
							}
						});
					}
					return false;
				}));
			});

		</script>

		<script type="text/javascript">
			$(document).ready(function () {
				FromLocationValidator = {
					row: '.col-md-12',
					validators: {
						notEmpty: {
							message: 'From Location is required'
						}
					}
				};

				$('#addform2').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						'emp_id[]': FromLocationValidator,
						shift_timing: {
							validators: {
								notEmpty: {
									message: 'Please Select Shift'
								}
							}
						}
					}
				});
			});

			$(document).ready(function (e) {
				$("#addform2").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						var formresult = new FormData(this);
						$.ajax({
							url: "<?php echo base_url('admin/Tracking/add_shift'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								// alert(data);
								$(function () {
									new PNotify({
										title: 'Assign Shift',
										text: 'Shift Assigned Successfully',
										type: 'success'
									});
								});
								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/Tracking/shift');?>";
								}, 1000);

							},
							error: function () {
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
