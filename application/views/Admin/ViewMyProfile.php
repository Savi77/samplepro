<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View profile</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
	<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/croppie.css" />
	<script src="<?= base_url() ?>assets/js/croppie.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<style>
		/* .page-title {
    padding: 30px 36px 30px 0 !important;
    display: block;
    position: relative;
} */
		.sidebar-default .sidebar-content {
			background-color: #2196f3 !important;
			border-color: #ddd;
			-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			bottom: auto;
			margin-left: -21px;
			top: 64px;
			margin-top: 70px !important;
			position: fixed;
			width: 281px;
		}

		fieldset:first-child legend:first-child {
			padding-top: 0;
			padding-bottom: 6px;
		}

		.input-group-addon {
			padding: 8px 17px;
			font-size: 13px;
			font-weight: normal;
			line-height: 1;
			color: #333333;
			text-align: center;
			background-color: #fcfcfc;
			border: 1px solid #ddd;
			border-radius: 3px;
			margin-left: -3px;
		}
	</style>
	<style type="text/css">
		ul.social-media-list img {
			padding: 5px;
			border-radius: 5px;
			background-color: lightblue;
			width: 36px;
			height: 36px;
		}

		ul.social-media-list li {
			display: inline-block;
		}

		.picture-src1 {
			width: 115px;
			height: 115px;
			border-radius: 50%;
			border: 1px solid #eeeeee;

		}

		.picture-src {
			width: 115px;
			height: 115px;
			border-radius: 50%;
			border: 1px solid #eeeeee;
		}


		@media (max-width: 768px) {
			.picture input[type="file"] {
				cursor: pointer;
				display: block;
				height: 13%;
				/*left: 530px;*/
				opacity: 0 !important;
				position: absolute;
				top: 20px;
				width: 40%;
				border-radius: 50%;
				margin-left: 35%;
			}

			/*======================== Image crop button ============================*/
			.crop_btn {
				margin-top: -60px !important;
			}

			/*======================== / Image crop button ============================*/
		}

		@media (min-width: 768px) {
			.col-md-offset-2 {
				/*margin-left: 29.666667%;*/
			}

			.picture input[type="file"] {
				cursor: pointer;
				display: block;
				height: 268%;
				/* left: -155px; */
				opacity: 0 !important;
				position: absolute;
				top: -172px;
				width: 67%;
				border-radius: 50%;
				margin-left: 22%;
			}

			/*======================== Image crop button ============================*/
			.crop_btn {
				margin-top: 95px !important;
			}

			/*======================== / Image crop button ============================*/
		}

		.thumb-rounded,
		.thumb-rounded img {
			border-radius: 16%;
		}

		.navbar-default .navbar-nav>.active>a,
		.navbar-default .navbar-nav>.active>a:hover,
		.navbar-default .navbar-nav>.active>a:focus {
			color: #333333;
			background-color: #eeeeee;
		}

		.badge {
			display: inline-block;
			padding: .3125rem .4375rem;
			font-size: 1.7rem;
			font-weight: 500;
			line-height: 1;
			text-align: center;
			white-space: nowrap;
			vertical-align: baseline;
			border-radius: .1875rem;
			transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
		}

		.navbar-nav-link>.badge {
			position: absolute;
			top: -1px;
			right: 16px;
		}

		.ml-auto,
		.mx-auto {
			margin-left: auto !important;
		}

		.badge-warning {
			color: #fff;
			background-color: #f58646;
		}

		.badge-pill {
			padding-right: .5rem;
			padding-left: .5rem;
			border-radius: 10rem;
		}

		.nav-item-dropdown-lg {
			position: static;
		}

		.dropdown,
		.dropleft,
		.dropright,
		.dropup {
			position: relative;
		}

		*,
		::after,
		::before {
			box-sizing: border-box;
		}

		user agent stylesheet li {
			display: list-item;
			text-align: -webkit-match-parent;
		}

		legend {
			display: block;
			width: 100%;
			padding: 0;
			margin-bottom: 20px;
			font-size: 14.5px;
			line-height: inherit;
			color: #333333;
			border: 0;
			border-bottom: 1px solid #e5e5e5;
		}

		.nav-justified .nav-item,
		.nav-justified>.nav-link {
			-ms-flex-preferred-size: 0;
			flex-basis: 0;
			-ms-flex-positive: 1;
			flex-grow: 1;
			text-align: center;
		}

		.navbar-component.navbar-default {
			border-color: #fcfcfc;
			background-color: #fff;
		}

		.row {
			margin-left: -9px;
			margin-right: 8px;
			top: 2px;
		}

		top: 2px;
		}
	</style>
</head>

<body>
	<!--  Load header value -->
	<?php $this->load->view('Admin/includes/admin_header'); ?>
	<!-- Page header -->
	<!-- <div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li>
			</ul>
			<ul class="breadcrumb-elements">
				<li><a href="<?= base_url('admin/Customer/Issue'); ?>?addschedule"><i class="icon-calendar2 position-left"></i>Add Schedule</a></li>
				<li><a href="<?= base_url('admin/Customer'); ?>"><i class="icon-users4 position-left"></i>Customer List</a></li>
				<li style="display: none;"><a href="<?= base_url('admin/Target'); ?>"><i class="icon-target position-left"></i>Target</a></li>
				<li><a href="<?= base_url('admin/Users'); ?>"><i class="icon-user-tie position-left"></i>Users</a></li>
				<li><a data-toggle="modal" data-target="#AddNotesModal"><i class="icon-design position-left"></i>Notes
					</a></li>
			</ul>
		</div>
	</div> -->


	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<!-- Main content style="border: 1px solid #d8d3d3;" -->
			<div class="content-wrapper">
				<?php $this->load->view('Admin/includes/panel'); ?>
				<div class="page-header-content">

					<div class="page-title">
						<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span> View Profile</h4>
					</div>
				</div>

				<?php

					if ($profile_array->user_type == 'SA') {
						$user_type = "Admin";
					} else {
						$user_type = "Employee";
					}

					if ($profile_array->profile_img == '') {
						$profile_img = "placeholder.jpg";
					} else {
						$profile_img = $profile_array->profile_img;
					}


				?>

				<!-- User profile -->
				<div class="panel panel-flat">
					<div class="panel-body">

						<div class="row">
							<div class="col-md-3">

								<div class="thumbnail">
									<div class="thumb thumb-rounded" style="width: 75%;">
										<div class="picture-container" style="margin-left: 0;margin-top: 115px;">
											<div class="picture">
												<input type="file" id="upload_image" class="" style="cursor: pointer;">
												<?php
												if ($profile_array->profile_img == '') {
												?>
													<div id="default_image">
														<img src="<?= base_url() ?>assets/admin/assets/images/users/<?= $profile_img; ?>" class="picture-src1" alt="" style="height: 220px;margin-top: -62%;width: 220px !important;max-width: 105%;">
													</div>
												<?php } else { ?>
													<div id="default_image">
														<img src="<?= base_url() ?>assets/admin/assets/images/users/<?= $profile_img; ?>" class="picture-src1" alt="" style="height: 220px;margin-top: -62%;width: 220px !important;max-width: 105%;">
													</div>
												<?php } ?>
												<div id="uploaded_image"></div>
											</div>
										</div>
										<div class="caption text-center">
											<h6 class="text-semibold no-margin"><?= $profile_array->name; ?>
												<small class="display-block"><?= $user_type; ?></small>
											</h6>
											<!-- <ul class="icons-list mt-15">
												<li><a href="#" data-popup="tooltip" title="" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
												<li><a href="#" data-popup="tooltip" title="" data-original-title="Twitter"><i class="icon-facebook"></i></a></li>
												<li><a href="#" data-popup="tooltip" title="" data-original-title="Github"><i class="icon-github"></i></a></li>
											</ul> -->
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-9">
								<!-- <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar nav-justified">
										<li class="nav-item"><a href="#toolbar-justified-pill1" class="nav-link active" data-toggle="tab">Active</a></li>
										<li class="nav-item"><a href="#toolbar-justified-pill2" class="nav-link" data-toggle="tab">Inactive</a></li>
										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#toolbar-justified-pill3" class="dropdown-item" data-toggle="tab">Dropdown pill</a>
												<a href="#toolbar-justified-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
											</div>
										</li>
									</ul> -->

								<div class=" navbar-default navbar-xs navbar-component">
									<ul class="nav navbar-nav visible-xs-block">
										<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
									</ul>
									<div class="navbar-collapse collapse" id="navbar-filter">
										<ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar nav-justified" id="myTab">
											<li class=" item active"><a class="nav-link active" href="#PersonalDetails" data-toggle="tab"><i class="icon-cog3 position-left"></i>Personal Details</a></li>
											<li class="nav-item"><a class="nav-link" href="#emailconfigactivity" id="emailTab" data-toggle="tab"><i class=" icon-envelop4 position-left"></i> Email Configuration</a></li>
											<li class="nav-item"><a class="nav-link" href="#subscription_plan" id="emailTab" data-toggle="tab"><i class=" icon-address-book  position-left"></i> Subscription Plan</a></li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="padding: 0;">
										<div class="col-lg-12">
											<div class="tabbable">
												<div class="tab-content">
													<div class="tab-pane fade in active" id="PersonalDetails">
														<div class="panel panel-flat">
															<div class="panel-body">
																<form id="myprofile_form" method="post">
																	<fieldset>
																		<legend class="text-semibold"><i class=" icon-address-book position-left"></i> Personal Details</legend>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Full Name :</label>
																					<input type="text" name="name" placeholder="Full Name" class="form-control" value="<?= $profile_array->name; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label>EMail ID :</label>
																					<input type="text" name="email" placeholder="EMail ID" class="form-control" value="<?= $profile_array->email; ?>">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Mobile Number :</label>
																					<input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control" value="<?= $profile_array->mobile_no; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Password :</label>
																					<div class="shbtn" id="show_hide_password_profile" style="display: flex;">
																						<input type="password" name="password" placeholder="Email Password" class="form-control" value="<?= $profile_array->Password; ?>">
																						<div class="input-group-addon">
																							<a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<br />
																	<div class="row">
																		<div class="text-right">
																			<button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="tab-pane fade in" id="emailconfigactivity">
														<div class="panel panel-flat">
															<div class="panel-body">
																<form id="emailconfiguration_form" method="post">
																	<fieldset>
																		<legend class="text-semibold"><i class="icon-envelop2 position-left"></i> Email Settings</legend>

																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>From Name :</label>
																					<input type="text" name="from_name" placeholder="From Name" class="form-control" value="<?= $organsation_email_array->from_name; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label>SMTP host name:</label>
																					<input type="text" name="host_name" placeholder="Host Name" class="form-control" value="<?= $organsation_email_array->host_name; ?>">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>SMTP port number :</label>
																					<input type="text" name="port_number" placeholder="Enter SMTP port number" class="form-control" value="<?= $organsation_email_array->port_number; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Protocol :</label>
																					<input type="text" name="protocol" placeholder="Enter Protocol" class="form-control" value="<?= $organsation_email_array->protocol; ?>">
																					<p style="font-size: 11px;">(e.g smtp)</p>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Email ID:</label>
																					<input type="text" name="email_id" placeholder="Email ID" class="form-control" value="<?= $organsation_email_array->email_id; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Email Password :</label>
																					<div class="shbtn" id="show_hide_password" style="display: flex;">
																						<input type="password" name="email_pass" placeholder="Email Password" class="form-control" value="<?= $organsation_email_array->email_pass; ?>">
																						<div class="input-group-addon">
																							<a style="margin-left: -6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<br />
																	<div class="row">
																		<div class="text-right">
																			<button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="panel-body">
																<form id="email_content_form" method="post">
																	<fieldset>
																		<legend class="text-semibold"><i class="icon-envelop2 position-left"></i> Welcome Email Content</legend>
																		<div class="row">
																			<input type="hidden" name="email_body_id" id="email_body_id" value="<?= $emailbody_array->email_body_id; ?>">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label>Welcome Email Content :</label>
																					<textarea name="email_content" id="email_content" class="form-control" rows="3"><?= $emailbody_array->email_body_content; ?></textarea>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<br />
																	<div class="row">
																		<div class="text-right">
																			<button type="submit" class="btn btn-primary">Update Content <i class="icon-arrow-right14 position-right"></i></button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="tab-pane fade in" id="subscription_plan">
														<div class="panel panel-flat">
															<div class="panel-body">
																<fieldset>
																	<legend class="text-semibold"><i class=" icon-address-book position-left"></i> Subscription Plan Details&nbsp;&nbsp;&nbsp;

																		<i class="icon-users2"></i>&nbsp;&nbsp;&nbsp;No. of Users&nbsp;&nbsp;&nbsp;
																		<span class="badge badge-pill ml-auto ml-lg-0" style="background-color:rgb(24 142 244)"><?= $SubscriptionData['no_of_user']; ?></span>

																	</legend>



																	<!-- <i class="icon-users2"></i>&nbsp;&nbsp;&nbsp;No. of Users&nbsp;&nbsp;&nbsp;
																			<span class="badge badge-pill ml-auto ml-lg-0" style="background-color:rgb(24 142 244)"><?= $SubscriptionData['no_of_user']; ?></span><span class="badge badge-pill ml-auto ml-lg-0" style="background-color:rgb(24 142 244)"><?= $SubscriptionData['no_of_user']; ?></span> -->

																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Full Name :</b> <br>
																				<label for=""><?= $SubscriptionData['org_fname'] . ' ' . $SubscriptionData['org_lname']; ?></label>
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Email Id :</b> <br>
																				<label for=""><?= $SubscriptionData['org_email']; ?></label>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Subscription Start Date :</b> <br>
																				<label for=""><?= date('d M, Y', strtotime($SubscriptionData['subscription_start_date'])) ?></label>
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Subscription End Date :</b> <br>
																				<label for=""><?= date('d M, Y', strtotime($SubscriptionData['subscription_end_date'])); ?></label>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Plan Name :</b> <br>
																				<label for=""><?= $SubscriptionData['plan_name']; ?></label>
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Plan Price :</b> <br>
																				<label for="">&#8377; <?= $SubscriptionData['plan_price']; ?></label>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-3">
																			<div class="form-group" style="text-align: center;margin: 10px;">

																				<!-- <i class="icon-users2"></i>&nbsp;&nbsp;&nbsp;No. of Users&nbsp;&nbsp;&nbsp;
																			<span class="badge badge-pill ml-auto ml-lg-0" style="background-color:rgb(24 142 244)"><?= $SubscriptionData['no_of_user']; ?></span> -->

																				<!-- <li class="nav-item nav-item-dropdown-lg dropdown" style="list-style-type:none;">
																				<a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown" aria-expanded="false">
																					
																					<i class="icon-users2"></i><p style="list-style-type:none; color: black; padding-left: 2px; padding-right:2px">No of Users</p>
																					
																					
																					
																				</a>
																			</li>
																			 -->


																				<!-- <b>No Of User :</b> <br>
																				<p for="" ><?= $SubscriptionData['no_of_user']; ?></p> -->
																			</div>
																		</div>
																		<div class="col-md-3">&nbsp;</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<b>Subscription Type :</b> <br>
																				<label for=""><?= $SubscriptionData['subscription_type']; ?></label>
																			</div>
																		</div>
																	</div>
																</fieldset>
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

					</div>
				</div>
				<div id="uploadimageModal" class="modal" role="dialog" style="top: 60px">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Crop & Upload Image</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-8 text-center">
										<div id="image_demo" style="width:350px; margin-top:30px"></div>
									</div>
									<div class="col-md-3 crop_btn" align="center">
										<br />
										<br />
										<br />
										<button class="btn btn-success crop_image">Crop & Upload Image</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /user profile -->
			</div>
			<!-- /main content -->


		</div>
		<!-- /page content -->

		<!-- Footer -->
		<?php $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->
</body>

<script>
	$(document).ready(function() {
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 200,
				height: 200,
				type: 'square' //circle
			},
			boundary: {
				width: 300,
				height: 300
			}
		});

		$('#upload_image').on('change', function() {
			// alert();
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimageModal').modal('show');
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?php echo base_url('admin/dashboard/crop_file'); ?>",
					type: "POST",
					data: {
						"image": response
					},
					success: function(data) {
						// alert(data);
						$('#uploadimageModal').modal('hide');
						$('#default_image').hide();
						$('#uploaded_image').html(data);
						// $('.picture-src1').hide();
						window.location.href = "";
					}
				});
			})
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#email_content').summernote({
			placeholder: 'Please add email content..',
			tabsize: 2,
			height: 500
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(e) {
		$("#myprofile_form").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {

				$.ajax({
					url: "<?php echo base_url('admin/Settings/UpdateProfile'); ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						$(function() {
							new PNotify({
								title: 'Update Profile',
								text: 'Profile Updated Successfully',
								type: 'success'
							});
						});
						setTimeout(function() {
							window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
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
		$('#emailconfiguration_form').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				from_name: {
					validators: {
						notEmpty: {
							message: 'From Name Required'
						}
					}
				},

				host_name: {
					validators: {
						notEmpty: {
							message: 'Host Name Required'
						}
					}
				},
				port_number: {
					validators: {
						notEmpty: {
							message: 'SMTP port number Required'
						}
					}
				},
				protocol: {
					validators: {
						notEmpty: {
							message: 'protocol Required'
						}
					}
				},
				email_id: {
					validators: {
						notEmpty: {
							message: 'Username is required'
						},
						regexp: {
							regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
							message: 'Enter Valid email address'
						}
					}
				},
				email_pass: {
					validators: {
						notEmpty: {
							message: 'Enter Valid Email Password'
						}
					}
				},



			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if (activeTab) {
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}
	});
	$(document).ready(function() {
		$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("fa-eye-slash");
				$('#show_hide_password i').removeClass("fa-eye");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("fa-eye-slash");
				$('#show_hide_password i').addClass("fa-eye");
			}
		});

		$("#show_hide_password_profile a").on('click', function(event) {
			event.preventDefault();
			if ($('#show_hide_password_profile input').attr("type") == "text") {
				$('#show_hide_password_profile input').attr('type', 'password');
				$('#show_hide_password_profile i').addClass("fa-eye-slash");
				$('#show_hide_password_profile i').removeClass("fa-eye");
			} else if ($('#show_hide_password_profile input').attr("type") == "password") {
				$('#show_hide_password_profile input').attr('type', 'text');
				$('#show_hide_password_profile i').removeClass("fa-eye-slash");
				$('#show_hide_password_profile i').addClass("fa-eye");
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(e) {
		$("#emailconfiguration_form").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {

				$.ajax({
					url: "<?php echo base_url('admin/Settings/EmailConfiguartion'); ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						// alert(data);
						$(function() {
							new PNotify({
								title: 'Update Email Configuartion',
								text: 'Updated Successfully',
								type: 'success'
							});
						});
						setTimeout(function() {
							window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
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
	$(document).ready(function(e) {
		$("#email_content_form").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {
				if ($('#email_content').summernote('isEmpty')) { //using name
					alert('Please Enter Email Content!');
					$("#email_content").focus;
					return false;
				} else {
					$.ajax({
						url: "<?php echo base_url('admin/Settings/EmailContentFrom'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							// alert(data);
							$(function() {
								new PNotify({
									title: 'Email Content',
									text: 'Email Content Updated Successfully',
									type: 'success'
								});
							});
							setTimeout(function() {
								window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
							}, 1000);
						},
						error: function() {
							alert('fail');
						}
					});
				}
			}
			return false;

		}));
	});
</script>


</html>