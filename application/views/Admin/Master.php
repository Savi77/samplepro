<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Admin/includes/header'); ?>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
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
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
	</script>
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js">
	</script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
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

					<input type="hidden" name="no_of_user" id="no_of_user" value="<?= $plan_subscription->no_of_user; ?>">

					<div class="row">
						<?php $this->load->view('Admin/includes/panel'); ?>
						<div class="page-header">
							<div class="page-header-content">
								<div class="page-title">
									<h4>
										<i class="icon-arrow-left52 position-left"></i>
										<a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> - Masters
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
											<h6 class="m-0 font-weight-semibold">Activity Type List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model4"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Activity List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model5"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Schedule_visit_type'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Business Segment</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model"><i class="icon-add"></i></button>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View" href="<?php echo base_url('admin/Master/businesslist'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>


								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Branch</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model15"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master/branch_master'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Contact Type List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model9"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master/typelist'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Credit Term</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model12"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/CreditTerm'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Expense</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model3"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Expense'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Groups</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model1"><i class="icon-add"></i></button>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View" href="<?php echo base_url('admin/Master/grouplist'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Location</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model2"><i class="icon-add"></i></button>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a title="View" href="<?php echo base_url('admin/Master/locationlist'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Order Status List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model13"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Ecommerce/status'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Project Milestone</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model16"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master/view_projectmilestone'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Source List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model6"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Leads'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Stage List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model7"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Leads/Stage'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Target Type List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model8"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Target/target_type'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>



								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Terms And Conditions</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model10"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/TermConditions'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Thoughts</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model11"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Thoughts'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Target List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#interest_model14"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Target'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Target Archive</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<!-- <button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model15"><i class="icon-add"></i></button> -->


												<a title="View" href="<?php echo base_url('admin/Target/archive_target'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Time</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#addTimeGap"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master/time_list'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
													<i class="eye-icon fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3">
									<div class="card card-body border-top-primary">
										<div class="text-center">
											<h6 class="m-0 font-weight-semibold">Notify By</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button" class="btn btn-success btn-float rounded-pill" data-toggle="modal" data-target="#addNotifyBy"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master/NotifyBy'); ?>" type="button" class="btn btn-float rounded-pill" style="background-color:rgb(24 142 244)">
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
						<h6 class="modal-title"> Add Business</h6>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="BusinessForm">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Business title <span style="color: red;">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Business title" maxlength="50" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn-panel btn-primary pull-right">Submit&nbsp;<span id="preview"></span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Group</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="GroupForm">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Group Name <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter Group Name" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model2" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Location</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="LocationForm">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Location <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model3" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-coins" style="zoom:1.1; "></i>
							&nbsp;Add New Expense
						</h5>
					</div>
					<div class="modal-body">
						<form id="addform" method="post" enctype="multipart/form-data">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Expense Name : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="expense_name">
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-center">
										<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Activity Type</h6>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="ScheduleForm1">
							<div class="panel panel-flat">
								<div class="panel-body">

									<div class="form-group">
										<label class="control-label col-sm-3" for="email">Activity Type <span style="color: red;">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="schedule_type" name="schedule_type" placeholder="Enter Activity Type" maxlength="50">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn-panel btn-primary  pull-right">Submit&nbsp;<span id="preview"></span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model5" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Activity</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="ScheduleForm2">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Activity <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="type_name" name="type_name" placeholder="Enter Activity" maxlength="35">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn=panel btn-primary pull-right">Submit<i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model6" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Source</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TargetTypeForm">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Source Title <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="source_title" name="source_title" placeholder="Enter Source Title" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model7" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Stage</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TargetTypeForm1">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Stage Title <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="stage_title" name="stage_title" placeholder="Enter Stage Title" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model8" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Target Type</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TargetTypeForm2">
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Target Type <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="target_type" name="target_type" placeholder="Enter Target Type" maxlength="50">
								</div>
							</div>
							<div class="form-group" id="prd_grp">
								<label class="control-label col-sm-3" for="email">Select UOM <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<select class="select-search form-control" name="uom_type" id="uom_type">
										<option value="">Select UOM</option>
										<?php
										foreach ($get_data->result() as $uom) {
										?>
											<option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model9" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Contact Types</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TypeForm3">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Title <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model10" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class=" icon-clipboard6" style="zoom:1.1; "></i>
							&nbsp;Add Term | Condition
						</h5>
					</div>
					<div class="modal-body">
						<form id="addform1" method="post">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Term For : <sup style="color: red">*</sup></label>
													<input type="text" name="term_for" class="form-control" placeholder="E.g. Tally">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<label>Terms | Conditions : <sup style="color: red">*</sup></label>
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12 nopadding">
														<div class="form-group">
															<div class="input-group">
																<textarea rows="1" name="terms[]" class="form-control"></textarea>
																<div class="input-group-btn">
																	<button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
																</div>
															</div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>
											<div class="col-md-12">
												<div id="education_fields"></div>
											</div>
										</div>
									</fieldset>
									<br />
									<br />
									<br />
									<div class="text-right">
										<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
										<span id="preview_upload"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model11" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-file-text" style="zoom:1.1; "></i>
							&nbsp; &nbsp;Add New Thought
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
													<label>Enter Thought :</label>
													<textarea class="form-control" name="thought" rows="2" maxlength="500"></textarea>
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-right">
										<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
										<span id="preview"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model12" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-sort-numeric-asc" style="zoom:1.1; "></i>
							&nbsp;Add Credit Term
						</h5>
					</div>
					<div class="modal-body">
						<form id="addform3" method="post">
							<div class="panel panel-flat">
								<div class="panel-body">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Credit Name : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="credit_name">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group clockpicker" data-autoclose="true">
													<label>Credit Days : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="credit_days" id="credit_days" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-right">
										<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
										<span id="preview_upload"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model13" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Order Status</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="StatusForm">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Status Name <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="status_name" name="status_name" placeholder="Enter Order Status" maxlength="15">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model14" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Create Target</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="Target_Form">
							<div class="row">
								<div class="form-group">
									<label class="control-label col-sm-2" for="Youtube">Target Period <span style="color: red;">*</span></label>
									<div class="col-sm-4">
										<select class="form-control" name="target_period" id="target_period" onchange="mainInfo()">
											<option value=""> - Select - </option>
											<option value="Daily">Daily</option>
											<option value="Weekly">Weekly</option>
											<option value="Fortnightly">Fortnightly</option>
											<option value="Monthly">Monthly</option>
											<option value="Quarterly">Quarterly</option>
											<option value="Half Yearly">Half Yearly</option>
											<option value="Yearly">Yearly</option>
										</select>
									</div>
									<label class="control-label col-sm-2" for="Youtube">Recurring Count<span style="color: red;">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="recurring_cnt" name="recurring_cnt" value="1" onkeyup="mainInfo()">
									</div>
								</div>

								<div id="onchange_display" style="display: none">
									<div class="form-group">
										<label class="control-label col-sm-2" for="Youtube">Start Date <span style="color: red;">*</span></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="start_date" name="start_date" onchange="startdate_result()" value="<?= date("d F Y") ?>">
										</div>
										<label class="control-label col-sm-2" for="Youtube">No. of Instance <span style="color: red;">*</span></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="end_date" name="end_date" onchange="enddate_result()">
											<input type="text" style="display: none" class="form-control" id="end_date1" name="end_date1" onchange="enddate_result1()">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Youtube">Target Type <span style="color: red;">*</span></label>
										<div class="col-sm-10">
											<select class="select-search form-control" name="targettype_id" id="targettype_id" onchange="mainInfo1()">
												<option value="">Select Target Type</option>
												<?php
												foreach ($target_type->result() as $value2) { ?>
													<option value="<?= $value2->targettype_id ?>">
														<?= $value2->target_type ?></option>
												<?php  } ?>
											</select>
										</div>
									</div>
									<input class="form-control" type="hidden" id="name_values" name="name_values">
									<input class="form-control" type="hidden" id="checked_index" name="checked_index">
									<div class="form-group" id="issuelistdetails" style="display: none">
										<label class="control-label col-sm-2" for="Youtube">Employee list <span style="color: red;">*</span></label>
										<div class="col-sm-10" id="issue_schedule_list" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">

										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn-panel btn-primary pull-right" id="desktopbutton">Submit<i class="icon-arrow-right14 position-right"></i></button>
								</div>
								<div id="loader"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model15" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Branch</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="branchform">


							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Branch Name <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" maxlength="50">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="addTimeGap" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Time Slot</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TimeForm">
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Time Slot: <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="time_slot" name="time_slot" placeholder="Enter Time Slot Ex. 00:15 In 24Hrs">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="preview_upload"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="addNotifyBy" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"> Add Notify By</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="insertNotifyBy">
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Notify By: <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="notify_by" name="notify_by" placeholder="Enter Notify By Ex. Eamil,SMS,Whast's UP">
								</div>
							</div>

							<div class="text-right">
								<button type="submit" class="btn-panel btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								<span id="NotifyByPreview"></span>
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
			$(document).ready(function() {
				$('#BusinessForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						business_name: {
							validators: {
								notEmpty: {
									message: 'Please Enter Business Title'
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
		
			$(document).ready(function(e) {
				$("#BusinessForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$("#preview").show();
						$("#preview").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
						);

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_business'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								$("#preview").hide();
								$(function() {
									new PNotify({
										title: 'Add Segment',
										text: 'Added  Successfully',
										type: 'success'
									});
								});
								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/businesslist'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#GroupForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						group_name: {
							validators: {
								notEmpty: {
									message: 'Please Enter Group Name'
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
		
			$(document).ready(function(e) {
				$("#GroupForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_group'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/grouplist'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#LocationForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						location: {
							validators: {
								notEmpty: {
									message: 'Please Enter Location'
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
		
			$(document).ready(function(e) {
				$("#LocationForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_location'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/locationlist'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#addform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						expense_name: {
							validators: {
								notEmpty: {
									message: 'Expense Name Required'
								}
							}
						}
					}
				});
			});
		
			$(document).ready(function(e) {
				$("#addform").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$.ajax({
							url: "<?php echo base_url('admin/Expense/add_expense'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								// alert(data);
								$(function() {
									new PNotify({
										title: 'Add Expense',
										text: 'Expense Added Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Expense'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#ScheduleForm1').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						schedule_type: {
							validators: {
								notEmpty: {
									message: 'Please Enter Activity Type'
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
		
			$(document).ready(function(e) {
				$("#ScheduleForm1").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$("#preview").show();
						$("#preview").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
						);

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_schedule'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								$("#preview").hide();
								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#ScheduleForm2').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						type_name: {
							validators: {
								notEmpty: {
									message: 'Please Enter Activity'
								}
							}
						}
					}
				});
			});

			$(document).ready(function(e) {
				$("#ScheduleForm2").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Schedule_visit_type/add_type'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Schedule_visit_type'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#TargetTypeForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						source_title: {
							validators: {
								notEmpty: {
									message: 'Please Enter Source Title'
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
		
			$(document).ready(function(e) {
				$("#TargetTypeForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Leads/add_source'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Add Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Leads'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#TargetTypeForm1').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						stage_title: {
							validators: {
								notEmpty: {
									message: 'Please Enter Source Title'
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
		
			$(document).ready(function(e) {
				$("#TargetTypeForm1").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Leads/add_stage'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Add Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Leads/Stage'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#TargetTypeForm2').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						target_type: {
							validators: {
								notEmpty: {
									message: 'Please Enter Target Type'
								}
							}
						},
						uom_type: {
							validators: {
								notEmpty: {
									message: 'Please Select UOM'
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
		
			$(document).ready(function(e) {
				$("#TargetTypeForm2").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Target/add_targettype'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Add Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Target/target_type'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#TypeForm3').bootstrapValidator({
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
		
			$(document).ready(function(e) {
				$("#TypeForm3").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_type'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/typelist'); ?>";
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

		<script>
			$(document).ready(function() {
				$('#addform1')
					.bootstrapValidator({
						framework: 'bootstrap',
						icon: {
							valid: 'glyphicon glyphicon-ok',
							invalid: 'glyphicon glyphicon-remove',
							validating: 'glyphicon glyphicon-refresh'
						},
					})
					// Add button click handler
					.on('click', '.addButton', function() {})
					// Remove button click handler
					.on('click', '.removeButton', function() {});
			});
		
			$(document).ready(function(e) {
				$("#addform1").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$("#preview_upload").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
						);
						$("#preview_upload").show();
						$.ajax({
							url: "<?php echo base_url('admin/TermConditions/Add'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								$("#preview_upload").hide();
								// alert(data);
								$(function() {
									new PNotify({
										title: 'Add Term | Condition',
										text: 'Added Successfully !!',
										type: 'success'
									});
								});
								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/TermConditions'); ?>";
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

		<script type="text/javascript">
			var room = 112;

			function education_fields() {
				room++;
				var objTo = document.getElementById('education_fields')
				var divtest = document.createElement("div");
				divtest.setAttribute("class", "form-group removeclass" + room);
				var rdiv = 'removeclass' + room;
				divtest.innerHTML =
					'<div class="row"> <div class="col-md-12 nopadding"><div class="form-group"><div class="input-group"> <textarea class="form-control" name="terms[]" rows="1"></textarea> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
					room +
					');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';
				objTo.appendChild(divtest)

				$('#addform').bootstrapValidator('addField', 'terms[]');
			}

			function remove_education_fields(rid) {
				$('.removeclass' + rid).remove();
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#addform2').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						thought: {
							validators: {
								notEmpty: {
									message: 'Please Enter Thought'
								}
							}
						}
					}
				});
			});
			$(document).ready(function(e) {
				$("#addform2").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$.ajax({
							url: "<?php echo base_url('admin/Thoughts/add'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								// alert(data);
								$(function() {
									new PNotify({
										title: 'Add Thought',
										text: 'Shift Added Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Thoughts'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#addform3').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						credit_name: {
							validators: {
								notEmpty: {
									message: 'Credit Name Required'
								}
							}
						},
						credit_days: {
							validators: {
								notEmpty: {
									message: 'Credit Days Required'
								}
							}
						}
					}
				});
			});
		
			$(document).ready(function(e) {
				$("#addform3").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$("#preview_upload").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
						);
						$("#preview_upload").show();
						$.ajax({
							url: "<?php echo base_url('admin/CreditTerm/AddCreditTerm'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								$("#preview_upload").hide();
								// alert(data);
								$(function() {
									new PNotify({
										title: 'Add Credit Term',
										text: 'Added Successfully !!',
										type: 'success'
									});
								});
								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/CreditTerm'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#StatusForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						status_name: {
							validators: {
								notEmpty: {
									message: 'Please Enter Status Name'
								}
							}
						}
					}
				});
			});
			$(document).ready(function(e) {
				$("#StatusForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Ecommerce/add_status'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Order Status Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Ecommerce/status'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#branchform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						branch_name: {
							validators: {
								notEmpty: {
									message: 'Please Enter Status Name'
								}
							}
						}
					}
				});
			});
		
			
		</script>

		<script type="text/javascript">
			$(document).ready(function(e) {
				$("#branchform").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_branch'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Order Status Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/view_master'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#Target_Form').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						start_date: {
							validators: {
								notEmpty: {
									message: 'Please select start date'
								}
							}
						},
						end_date: {
							validators: {
								notEmpty: {
									message: 'Please select end date'
								}
							}
						},

						targettype_id: {
							validators: {
								notEmpty: {
									message: 'Please select target type'
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

						target_period: {
							validators: {
								notEmpty: {
									message: 'Please Select Target Period'
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
		
			$(document).ready(function(e) {
				$("#Target_Form").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						var pos = [];
						$(".day").each(function(i) {
							if (this.checked) {
								// alert("Checkbox at index " + i + " is checked.");
								pos.push(i);
							}
						});

						$('#checked_index').val(pos);

						// alert(pos);
						var values = [];
						$('input[type=checkbox]:checked').each(function(index) {
							var id = $(this).val();
							values.push(id);
						});
						// alert(values);
						// var datastring='areaid='+values;
						$('#name_values').val(values);
						// alert(datastring);
						$.ajax({
							url: "<?php echo base_url('admin/Target/add_target'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								// alert(data);
								if (data == 0) {
									$(function() {
										new PNotify({
											title: 'Add Form',
											text: 'Please tick the checkbox / fill necessary value',
											type: 'warning'
										});
									});
								} else {

									$(function() {
										new PNotify({
											title: 'Add Form',
											text: 'Target added successfully',
											type: 'success'
										});
									});

									setTimeout(function() {
										window.location =
											"<?php echo base_url('admin/Target'); ?>";
									}, 1000);
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

		<script type="text/javascript">
			function mainInfo() {
				var startDate = document.getElementById("start_date").value;
				var recurring_cnt = document.getElementById("recurring_cnt").value;
				// alert(recurring_cnt);
				$('#onchange_display').show();
				if (startDate != '') {
					var target_period = document.getElementById("target_period").value;
					var date = new Date(startDate);
					var newdate = new Date(date);
					// alert(target_period);
					if (target_period == 'Daily') {
						if (recurring_cnt > 1) {
							var add_days = recurring_cnt - 1;
							// alert(add_days);  
							newdate.setDate(newdate.getDate() + add_days);
						} else {
							// alert('else');
							newdate.setDate(newdate.getDate() + 0);
						}

						// var add_days='0';
					} else if (target_period == 'Weekly') {
						var cnt1 = recurring_cnt * 7 - 1;
						// var add_days=cnt1-1; 
						// alert(add_days);  
						newdate.setDate(newdate.getDate() + cnt1);
					} else if (target_period == 'Fortnightly') {
						var cnt1 = recurring_cnt * 15 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='15';
					} else if (target_period == 'Monthly') {
						var cnt1 = recurring_cnt * 29 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Quarterly') {
						var cnt1 = recurring_cnt * 120 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Half Yearly') {
						var cnt1 = recurring_cnt * 182 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Yearly') {
						var cnt1 = recurring_cnt * 365 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					}

					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					const monthNames = ["January", "February", "March", "April", "May", "June",
						"July", "August", "September", "October", "November", "December"
					];

					var dd = newdate.getDate();
					var mm = newdate.getMonth();
					var y = newdate.getFullYear();

					const d = mm;
					var full_month = monthNames[d];

					var someFormattedDate = dd + ' ' + full_month + ' ' + y;
					// alert(someFormattedDate);
					if (target_period == 'Daily') {
						$('#end_date1').hide();
						$('#end_date').show();
						document.getElementById('end_date').value = someFormattedDate;
					} else {
						$('#end_date').hide();
						$('#end_date1').show();
						document.getElementById('end_date1').value = someFormattedDate;
					}


					// alert(startDate);
					// return result;

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);
								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			}


			function mainInfo1() {
				// alert();
				var startDate = document.getElementById("start_date").value;

				// alert(startDate);
				$('#onchange_display').show();
				if (startDate != '') {
					var target_period = document.getElementById("target_period").value;

					// alert(target_period);

					var date = new Date(startDate);
					var newdate = new Date(date);

					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					// alert(startDate);
					// return result;

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;

						} else {
							$('#issuelistdetails').hide();
						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			}
		</script>

		<script type="text/javascript">
			// $("#start_date").on("dp.change", function (e) 
			// {
			function startdate_result() {
				// alert();
				var startDate = document.getElementById("start_date").value;

				// alert(startDate);
				// $('#onchange_display').show();   
				if (startDate != '') {
					var target_period = document.getElementById("target_period").value;

					// alert(target_period);

					var date = new Date(startDate);
					var newdate = new Date(date);

					// alert(target_period);
					if (target_period == 'Daily') {
						newdate.setDate(newdate.getDate() + 0);
						// var add_days='0';
					} else if (target_period == 'Weekly') {
						newdate.setDate(newdate.getDate() + 7);
						var add_days = '7';
						// $('#end_date').prop('readonly',true);
						// $('#end_date').attr('readonly',true);
						// alert(add_days);
					} else if (target_period == 'Fortnightly') {
						newdate.setDate(newdate.getDate() + 15);
						// var add_days='15';
					} else if (target_period == 'Monthly') {
						newdate.setDate(newdate.getDate() + 30);
						// var add_days='31';
					}


					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					const monthNames = ["January", "February", "March", "April", "May", "June",
						"July", "August", "September", "October", "November", "December"
					];

					var dd = newdate.getDate();
					var mm = newdate.getMonth();
					var y = newdate.getFullYear();

					const d = mm;
					var full_month = monthNames[d];

					var someFormattedDate = dd + ' ' + full_month + ' ' + y;
					// alert(someFormattedDate);
					if (target_period == 'Daily') {
						$('#end_date1').hide();
						$('#end_date').show();
						document.getElementById('end_date').value = someFormattedDate;
					} else {
						$('#end_date').hide();
						$('#end_date1').show();
						document.getElementById('end_date1').value = someFormattedDate;
					}




					// alert(startDate);
					// return result;

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;

						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			}

			// $("#end_date").on("dp.change", function (e) 
			// {
			function enddate_result() {
				// alert();
				var startDate = document.getElementById("start_date").value;
				var end_date = document.getElementById("end_date").value;

				// alert(startDate);
				// $('#onchange_display').show();   
				if (end_date != '') {
					var target_period = document.getElementById("target_period").value;

					// alert(target_period);

					var date = new Date(startDate);
					var newdate = new Date(date);

					// alert(target_period);
					// if (target_period=='Daily') 
					// {
					//      newdate.setDate(newdate.getDate() + 0);
					//     // var add_days='0';
					// }
					// else if (target_period=='Weekly') 
					// {
					//      newdate.setDate(newdate.getDate() + 7);
					//     var add_days='7';
					//     // $('#end_date').prop('readonly',true);
					//     // $('#end_date').attr('readonly',true);
					//     // alert(add_days);
					// }
					// else if (target_period=='Fortnightly') 
					// {
					//      newdate.setDate(newdate.getDate() + 15);
					//     // var add_days='15';
					// }
					// else if (target_period=='Monthly') 
					// {
					//      newdate.setDate(newdate.getDate() + 30);
					//     // var add_days='31';
					// }


					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					// const monthNames = ["January", "February", "March", "April", "May", "June",
					//   "July", "August", "September", "October", "November", "December"
					// ];

					// var dd = newdate.getDate();
					// var mm = newdate.getMonth();
					// var y = newdate.getFullYear();

					// const d = mm;
					// var full_month = monthNames[d];

					// var someFormattedDate = dd + ' ' + full_month + ' ' + y;
					// // alert(someFormattedDate);
					// if (target_period=='Daily')
					// {
					//     $('#end_date1').hide(); 
					//     $('#end_date').show();  
					//     document.getElementById('end_date').value = someFormattedDate; 
					// }
					// else
					// {
					//   $('#end_date').hide();
					//   $('#end_date1').show(); 
					//   document.getElementById('end_date1').value = someFormattedDate;
					// }




					// alert(startDate);
					// return result;

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;

						} else {
							$('#issuelistdetails').hide();
						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			}

			// $("#end_date1").on("dp.change", function (e) 
			//   {
			function enddate_result1() {
				// alert();
				var startDate = document.getElementById("start_date").value;
				var end_date1 = document.getElementById("end_date1").value;

				// alert(end_date1);
				// $('#onchange_display').show();   
				if (end_date1 != '') {
					var target_period = document.getElementById("target_period").value;

					// alert(target_period);

					var date = new Date(startDate);
					var newdate = new Date(date);

					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;

						} else {
							$('#issuelistdetails').hide();
						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function(data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function() {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#TimeForm').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						time_slot: {
							validators: {
								notEmpty: {
									message: 'Please Enter Time Gap'
								}
							}
						}
					}
				});
			});
			$(document).ready(function(e) {
				$("#TimeForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/add_time'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/time_list'); ?>";
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#insertNotifyBy').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						notify_by: {
							validators: {
								notEmpty: {
									message: 'Please Enter Notify By'
								}
							}
						}
					}
				});
			});
			$(document).ready(function(e) {
				$("#insertNotifyBy").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?php echo base_url('admin/Master/insertNotifyBy'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/NotifyBy'); ?>";
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
</body>

</html>