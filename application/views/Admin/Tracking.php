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

		/* button size */

		.btn-float {
			padding: 1.1rem;
			border-radius: .25rem;
		}

		.fa-eye:before {
			content: "\f06e";
			font-size: 24px;
		}

		/* --------- */

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
			color: white;
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

		.icon-add:before {
			content: "\e991";
			font-size: 24px;
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
												class="text-semibold">Dashboard</span></a> - Tracking
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
											<h6 class="m-0 font-weight-semibold">Employee Schedule</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button> -->

												<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

												<a title="View" href="<?php echo base_url('admin/Tracking/LiveTracking');?>"
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
											<h6 class="m-0 font-weight-semibold">Employee History</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button> -->

												<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

												<a title="View" href="<?php echo base_url('admin/Tracking');?>"
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
											<h6 class="m-0 font-weight-semibold">Distance Report</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button> -->

												<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

												<a title="View" href="<?php echo base_url('admin/Tracking/employee_report');?>"
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
											<h6 class="m-0 font-weight-semibold">Live Tracking (Employee)</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button> -->

												<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

												<a title="View" href="<?php echo base_url('admin/Tracking/LiveEmployeeTracking');?>"
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
											<h6 class="m-0 font-weight-semibold">Client Visit Report</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button> -->

												<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

												<a title="View" href="<?php echo base_url('admin/Tracking/Tracking_Report');?>"
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

		<!-- pop-up business segment end -->

		<!-- Footer -->
		<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
		<!-- /footer -->
		<!-- /basic responsive configuration -->

		
</body>

</html>
