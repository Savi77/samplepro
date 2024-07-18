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
												class="text-semibold">Dashboard</span></a> - Product Management
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
											<h6 class="m-0 font-weight-semibold">Product Specification</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/ProductSpecification');?>"
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
											<h6 class="m-0 font-weight-semibold">HSN Code</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model1"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/HSNCode');?>"
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
											<h6 class="m-0 font-weight-semibold">UOM List</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model2"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/UOM');?>"
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
											<h6 class="m-0 font-weight-semibold">Product Categories</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model3"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master_product');?>"
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
											<h6 class="m-0 font-weight-semibold">Product Sub-Categories</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model4"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Master_submenu');?>"
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
											<h6 class="m-0 font-weight-semibold">Manage Products</h6>
											<p class="text-muted mb-3"> </p>

											<div class="d-inline-flex align-items-center">
												<button title="Add" type="button"
													class="btn btn-success btn-float rounded-pill" data-toggle="modal"
													data-target="#interest_model5"><i class="icon-add"></i></button>

												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

												<a title="View" href="<?php echo base_url('admin/Product');?>"
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
					<div class="modal-header"
						style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon-insert-template" style="zoom:1.1; "></i>
							&nbsp;Add Specification
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
													<label>Specification Name : <sup style="color: red">*</sup></label>
													<input type="text" class="form-control" name="specification_name">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group clockpicker" data-autoclose="true">
													<label>Specification Description : <sup
															style="color: red">*</sup></label>
													<input type="text" class="form-control" name="specification_desc"
														autocomplete="off">
												</div>
											</div>
										</div>
									</fieldset>
									<br />
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit <i
												class="icon-arrow-right14 position-right"></i></button>
										<span id="preview_upload"></span>
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
                <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
                  <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px">
                    <i class="icon-make-group" style="zoom:1.1; "></i>
                    &nbsp;Add HSN Code
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
                                <label>HSN Code : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="hsn_code">
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group clockpicker" data-autoclose="true">
                                <label>HSN Description : </label>
                                <input type="text" class="form-control" name="hsn_desc" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <br />
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                          <span id="preview_upload"></span>
                        </div>
                      </div>
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
                  <h6 class="modal-title"> Add UOM</h6>
                </div>
      
                <div class="modal-body">
                  <form class="form-horizontal" id="TypeForm">
      
      
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">UOM Type <span style="color: red;">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="type" name="type" placeholder="Enter UOM Type" maxlength="50">
                      </div>
                    </div>
      
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

          <div id="interest_model3" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"> Add Product Categories</h6>
                </div>
      
                <div class="modal-body">
                  <form class="form-horizontal" id="InterestForm">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Product Name <span style="color: red;">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="interest" name="interest" placeholder="Enter Product Name" maxlength="35">
                      </div>
                    </div>
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

          <div id="interest_model4" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"> Add Product Sub-Categories </h6>
                </div>
      
                <div class="modal-body">
                  <form class="form-horizontal" id="InterestForm1">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Select Menu <span style="color: red;">*</span></label>
                      <div class="col-sm-9">
                        <select name="menu_id" class="form-control">
                          <option value="">Select Menu</option>
                          <?php
                          foreach ($get_menu_list as $value) {
                          ?>
                            <option value="<?= $value->id ?>"><?= $value->interest; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
      
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Sub-Categories Name <span style="color: red;">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Enter Submenu Name" maxlength="35">
                      </div>
                    </div>
      
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

          <div id="interest_model5" class="modal fade" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
                  <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px">
                    <i class="fa fa-life-ring" style="zoom:1.1; "></i>
                    &nbsp;Add New Product
                  </h5>
                </div>
                <div class="modal-body">
                  <form class="form-vertical" id="addform2" method="post">
                    <div class="panel panel-flat">
                      <div class="panel-body">
                        <fieldset>
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="panel panel-default">
                                <div class="panel-body" style="padding: 10px;">
                                  <div class="form-group" style="margin-bottom: 4px;">
                                    <label class="control-label col-sm-6" for="email">Product / Service Type <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                      <label class="radio-inline">
                                        <input type="radio" name="prd_srv_type" checked="" class="styled" value="product" onclick="product_group()">
                                        Product
                                      </label>
      
                                      <label class="radio-inline">
                                        <input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()">
                                        Service
                                      </label>
                                    </div>
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
                                <label>Select Category : <sup style="color: red">*</sup></label>
                                <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)">
                                  <option value="">Select Category</option>
                                  <?php
                                  foreach ($get_menu_list as $value) {
                                  ?>
                                    <option value="<?= $value->id ?>"><?= $value->interest; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Select Sub-Category : <sup style="color: red">*</sup></label>
                                <select name="submenu_id" class="form-control" id="submmenu_data">
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Product Name : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" maxlength="100">
                              </div>
                            </div>
                          </div>
                        </fieldset>
      
                        <fieldset>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Printing Name : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100">
                              </div>
                            </div>
      
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Product Code : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="product_code" placeholder="Enter Product Name" maxlength="50">
                              </div>
                            </div>
      
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Product Image : <sup style="color: red">*</sup></label>
                                <div class="media no-margin-top">
                                  <div class="media-left">
                                    <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
                                  </div>
                                  <div class="media-body">
                                    <input type="file" class="file-styled" id="imgInp" name="fileup" accept="image/*">
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
                                <label>Select UOM : <sup style="color: red">*</sup></label>
                                <select class="select-search form-control" name="uom_type">
                                  <option value="">Select UOM</option>
                                  <?php
                                  foreach ($get_data->result() as $uom) {
                                  ?>
                                    <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Product Price : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                              </div>
                            </div>
      
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Product Specification : <sup style="color: red">*</sup></label>
                                <select class="select-search form-control" name="specification_id">
                                  <option value="">Select Specification</option>
                                  <?php
                                  foreach ($specification_array as $row) {
                                  ?>
                                    <option value="<?= $row->specification_id ?>"><?= $row->specification_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
      
                          </div>
                        </fieldset>
      
                        <fieldset>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>GST Applicable : <sup style="color: red">*</sup></label>
                                <select class="select-search form-control" name="gst_applicable">
                                  <option value="">Select Type</option>
                                  <option value="Applicable">Applicable</option>
                                  <option value="Not Applicable">Not Applicable</option>
                                  <option value="Undefined">Undefined</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>HSN / SAC Code : <sup style="color: red">*</sup></label>
                                <select class="select-search form-control" name="hsn_code">
                                  <option value="">Select HSN</option>
                                  <?php
                                  foreach ($hsn_code_array as $hsn) {
                                  ?>
                                    <option value="<?= $hsn->hsn_id ?>"><?= $hsn->hsn_code; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>HSN Description :</label>
                                <input type="text" class="form-control" name="hsn_desc" placeholder="Enter Product / Service Price" maxlength="50">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Taxability : <sup style="color: red">*</sup></label>
                                <select class="select-search form-control" name="taxability">
                                  <option value="">Select Taxability</option>
                                  <option value="Taxable">Taxable</option>
                                  <option value="Nil Rated ">Nil Rated </option>
                                  <option value="Exempt">Exempt</option>
                                  <option value="Unknwon">Unknwon</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </fieldset>
      
      
                        <fieldset>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>IGST Rate : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="igst_tax" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                              </div>
                            </div>
      
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>CGST Rate : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="cgst_tax" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                              </div>
                            </div>
      
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>SGST Rate : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="sgst_tax" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Cess : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="cess" placeholder="Enter Cess" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                              </div>
                            </div>
                          </div>
                        </fieldset>
      
                        <fieldset>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Product Description : <sup style="color: red">*</sup></label>
                                <textarea class="form-control" id="prd_srv_description" name="prd_srv_description" placeholder="Enter Description" maxlength="250" rows="1"></textarea>
                                <div class="row" style="height: 16px;">
                                  <div class="col-lg-8">
                                    <span style="font-size:15px; color:gray">Max: 250 character</span>
                                  </div>
                                  <div class="col-lg-4" style="height: 15px;">
                                    <div class="col-lg-6">
                                      <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left:</p>
                                    </div>
                                    <div class="col-lg-6">
                                      <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">250</div>
                                      <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                      <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
      
                        <fieldset>
                          <div class="row">
                            <div class="col-md-12">
                              <input type="hidden" class="form-control" id="imgadd_count" name="imgadd_count" value="0">
                              <div class="form-group">
                                <div class="col-md-2">
                                  <br>
                                  <label class="control-label">Slider Images:<sup style="color: red">*</sup></label>
                                </div>
                                <div class="col-md-10">
                                  <div class="col-xs-1">
                                    <button type="button" class="btn btn-default addButton" style="margin-top: 20px;">
                                      <i class="icon-stack-plus"></i>
                                    </button>
                                  </div>
                                  <div class="col-xs-5">
                                    File : <span style="color: red;">*</span><input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()">
                                  </div>
                                  <div class="col-xs-2">
                                    <div id="thumb-output" style="margin-top: 20px;"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group hide" id="bookTemplate">
                                <div class="col-md-10 col-md-offset-2">
                                  <div class="col-xs-1">
                                    <button type="button" class="btn btn-default removeButton" style="margin-top: 20px;"><i class="icon-stack-minus"></i></button>
                                  </div>
                                  <div class="col-xs-5">
                                    File : <span style="color: red;">*</span><input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()">
                                  </div>
                                  <div class="col-xs-2">
                                    <div id="thumb-output" style="margin-top: 20px;"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
      
      
                        <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary pull-right">Submit<i class="icon-arrow-right14 position-right"></i></button>
                          </div>
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
				$('#addform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						specification_name: {
							validators: {
								notEmpty: {
									message: 'Specification Name Required'
								}
							}
						}
					}
				});
			});

			$(document).ready(function (e) {
				$("#addform").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						$("#preview_upload").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
							);
						$("#preview_upload").show();
						$.ajax({
							url: "<?php echo base_url('admin/ProductSpecification/Add'); ?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								$("#preview_upload").hide();
								// alert(data);
								$(function () {
									new PNotify({
										title: 'Add Specification',
										text: 'Added Successfully !!',
										type: 'success'
									});
								});
								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/ProductSpecification'); ?>";
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
            $(document).ready(function() {
            $('#addform1').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                hsn_code: {
                    validators: {
                    notEmpty: {
                        message: 'HSN Code Required'
                    }
                    }
                }
                }
            });
            });
        
            $(document).ready(function(e) {
            $("#addform1").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/HSNCode/Add'); ?>",
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
                        title: 'Add HSN',
                        text: 'Added Successfully !!',
                        type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/HSNCode'); ?>";
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
            $('#TypeForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                type: {
                    validators: {
                    notEmpty: {
                        message: 'Please Enter Type'
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
            $("#TypeForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {

                $.ajax({
                    url: "<?php echo base_url('admin/UOM/add_type'); ?>",
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
                        window.location = "<?php echo base_url('admin/UOM'); ?>";
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
            $('#InterestForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                interest: {
                    validators: {
                    notEmpty: {
                        message: 'Please Enter Product Name'
                    }
                    }
                }
                }
            });
            });
        
            $(document).ready(function(e) {
            $("#InterestForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Master_product/add_area_interest'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                    //alert(data);


                    $(function() {
                        new PNotify({
                        title: 'Add  Product Categories',
                        text: 'Added  Successfully',
                        type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master_product'); ?>";
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
            $('#InterestForm1').bootstrapValidator({
                message: 'This value is not valid',
                fields: {

                menu_id: {
                    validators: {
                    notEmpty: {
                        message: 'Select Menu'
                    }
                    }
                },
                submenu: {
                    validators: {
                    notEmpty: {
                        message: 'Enter Submenu Name'
                    }
                    }
                }
                }
            });
            });
       
            $(document).ready(function(e) {
            $("#InterestForm1").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Master_submenu/add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                    //alert(data);


                    $(function() {
                        new PNotify({
                        title: 'Add  Product Sub-Categories',
                        text: 'Added  Successfully',
                        type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master_submenu'); ?>";
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

        <!-- manage product -->

        <script>
            $(document).ready(function() {
            brandvalidator = {
                row: '.col-xs-3',
                validators: {
                    notEmpty: {
                    message: 'Required'
                    }
                }
                },
                bookIndex = 0;
            // imgcnt = 0;

            $('#addform2')
                .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'title[]': brandvalidator,
                    location: {
                    validators: {
                        notEmpty: {
                        message: 'Location is required'
                        }
                    }
                    },
                    product_name: {
                    validators: {
                        notEmpty: {
                        message: 'Product / Service name is required'
                        }
                    }
                    },
                    menu_id: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Menu'
                        }
                    }
                    },
                    submenu_id: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Submenu'
                        }
                    }
                    },
                    prd_srv_price: {
                    validators: {
                        notEmpty: {
                        message: 'Product / Service price is required'
                        }
                    }
                    },
                    prd_srv_type: {
                    validators: {
                        notEmpty: {
                        message: 'Please select type'
                        }
                    }
                    },
                    fileup: {
                    validators: {
                        notEmpty: {
                        message: 'Please select File'
                        },
                        file: {
                        extension: 'jpg,png,jpeg,pdf,doc',
                        maxSize: 2097152, //2 mb  maxsize
                        message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                        }
                    }
                    },
                    uom_type: {
                    validators: {
                        notEmpty: {
                        message: 'UOM is required'
                        }
                    }
                    },
                    sgst_tax: {
                    validators: {
                        notEmpty: {
                        message: 'SGST is required'
                        }
                    }
                    },
                    cgst_tax: {
                    validators: {
                        notEmpty: {
                        message: 'CGST is required'
                        }
                    }
                    },

                    product_code: {
                    validators: {
                        notEmpty: {
                        message: 'Product Code is required'
                        }
                    }
                    },

                    printing_name: {
                    validators: {
                        notEmpty: {
                        message: 'Printing name is required'
                        }
                    }
                    },

                    specification_id: {
                    validators: {
                        notEmpty: {
                        message: 'Specification is required'
                        }
                    }
                    },
                    taxability: {
                    validators: {
                        notEmpty: {
                        message: 'Taxability is required '
                        }
                    }
                    },

                    gst_applicable: {
                    validators: {
                        notEmpty: {
                        message: 'GST Applicable  is required'
                        }
                    }
                    },

                    hsn_code: {
                    validators: {
                        notEmpty: {
                        message: 'HSN  is required'
                        }
                    }
                    },

                    igst_tax: {
                    validators: {
                        notEmpty: {
                        message: 'IGST is required'
                        }
                    }
                    },

                    prd_srv_description: {
                    validators: {
                        notEmpty: {
                        message: 'Description is required'
                        }
                    }
                    },
                    'upload_file[]': {
                    validators: {
                        notEmpty: {
                        message: 'Select File'
                        },
                        file: {
                        extension: 'jpg,png,jpeg,pdf,doc',
                        maxSize: 2097152, //2 mb  maxsize
                        message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                        }
                    }
                    }
                }
                })

                // Add button click handler
                .on('click', '.addButton', function() {
                bookIndex++;
                // alert(imgcnt);
                var imgcnt = $('#imgadd_count').val();
                // var imgstore_cnt $('#imgadd_count').val(imgcnt);
                if (imgcnt < 2) {
                    var result2 = parseInt(imgcnt) + 1;
                    $('#imgadd_count').val(result2);

                    var $template = $('#bookTemplate'),
                    $clone = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-book-index', bookIndex)
                    .insertBefore($template);

                    // Update the name attributes
                    $clone
                    .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                    .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                    // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

                    // Add new fields
                    // Note that we also pass the validator rules for new field as the third parameter
                    $('#addform2')
                    .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                } else {
                    PNotify.removeAll()
                    new PNotify({
                    title: 'Image Upload',
                    text: 'Maximum image upload size is 3',
                    type: 'warning'
                    });
                }
                })

                // Remove button click handler
                .on('click', '.removeButton', function() {
                var img_count1 = $('#imgadd_count').val();
                // alert(img_count);
                var result1 = parseInt(img_count1) - 1;
                // alert(result);
                $('#imgadd_count').val(result1);

                var $row = $(this).parents('.form-group'),
                    index = $row.attr('data-book-index');

                // Remove element containing the fields
                $row.remove();
                });
            });
       
            $(document).ready(function(e) {
            $("#addform2").on('submit', (function(e) {
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {
                // alert();
                $.ajax({

                    url: "<?php echo base_url('admin/Product/add_product_service'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                    // $("#inner_page_desc").val('');
                    // alert(data);
                    new PNotify({
                        title: 'Add  Product / Service',
                        text: 'Added  Successfully',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Product'); ?>";
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

            function fetch_submenu(id) {
              var datastring = 'menu_id=' + id;
              // alert(datastring);
              $.ajax({
                  type: "post",
                  url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
                  cache: false,
                  data: datastring,
                  success: function(data) {
                  // alert(data);
                  $('#submmenu_data').html(data);
                  },
                  error: function() {
                  alert('Error while request..');
                  }
              });
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function(e) {
            $("#addformnew").on('submit', (function(e) {

                var content = CKEDITOR.instances['editor-full'].getData();
                $("#inner_page_desc").val(content);
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                //alert('invalid');
                } else {
                $.ajax({

                    url: "<?php echo base_url('admin/Product/add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                    $("#inner_page_desc").val('');
                    // alert(data);
                    new PNotify({
                        title: 'Add  Product',
                        text: 'Added  Successfully',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Product'); ?>";
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
            var table = $('#example').DataTable({
                "columnDefs": [{
                "visible": false,
                "targets": 2
                }],
                "order": [
                [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();

                var last = null;

                var groupadmin = [];

                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {

                    if (last !== group) {

                    $(rows).eq(i).before(
                        '<tr class="group" id="' + i + '"><td colspan="10">' + group + '</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                    }
                });

                for (var k = 0; k < groupadmin.length; k++) {
                    // Code added for adding class to sibling elements as "group_<id>"  
                    $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                    // Code added for adding Toggle functionality for each group
                    $("#" + groupadmin[k]).click(function() {
                    var gid = $(this).attr("id");
                    $(".group_" + gid).slideToggle(300);
                    });

                }
                }
            });
            });
        </script>

        <!-- ------- -->

        




</body>

</html>
