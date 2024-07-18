<?php
	$new = array();
	foreach ($allreports['report_preference'] as $row) {
		array_push($new, explode(',', $row));	
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Company Settings</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js">
	</script>
	<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
	</script>
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<style>
		.box-item {
			position: relative;
			box-shadow: #d2d2d2 0px 0px 15px;
			border-radius: 3px;
			margin-right: 1.5rem;
			width: 29%;
			padding: 2.5rem;

		}

		.pb-4,
		.py-4 {
			padding-bottom: 1.5rem !important;
		}

		.icon-block-top span {
			background-color: #188ef4;
			padding: 1.5rem;
			position: absolute;
			border-radius: 50%;
			margin-top: -5rem;
			top: 0;
		}

		.display-2 {
			font-family: 'Montserrat', sans-serif;
			font-size: 1.8rem;
		}

		.mbri-sites:before {
			content: "\e973";
		}

		.display-5 {
			font-family: 'Montserrat', sans-serif;
			font-size: 1.2rem;
		}

		.mbr-black {
			color: #000000;
		}

		.pb-3,
		.py-3 {
			padding-bottom: 1rem !important;
		}

		.mbr-text,
		.box-item-text {
			color: #8d97ad;
		}

		.display-7 {
			font-family: 'Montserrat', sans-serif;
			font-size: 1rem;
		}

		.container-boxes {
			padding-bottom: 90px;
			position: relative;
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			align-items: stretch;
			background-color: white;
			padding-top: 3rem;
		}

		.mbr-white {
			color: #ffffff;
		}
	</style>
	<style>
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

		fieldset.scheduler-border {
			border: 1px solid #009FDF !important;
			padding: 0 1.4em 1.4em 1.4em !important;
			margin: 0 0% 1.5em 0% !important;
			-webkit-box-shadow: 0px 0px 0px 0px #000;
			box-shadow: 0px 0px 0px 0px #009fdf;
		}

		legend.scheduler-border {
			font-size: 1.2em !important;
			font-weight: bold !important;
			text-align: left !important;
			width: auto;
			padding: 6px 14px 6px 0px !important;
			border-bottom: none;
			background: #009FDF;
			color: white;
		}

		.pt-1 {
			margin-top: 10px;
		}
	</style>
	<script>
		// assumes you're using jQuery
		$(document).ready(function() {
			<
			?
			php
			if ($this - > session - > flashdata('msg')) {
				?
				>
				new PNotify({
					title: 'Email',
					text: '<?php echo $this->session->flashdata('
					msg '); ?>',
					type: 'error'
				}); <
				?
				php
			} ? >
		});
	</script>
</head>

<body>
	<!--  Load header value -->
	<?php $this->load->view('Admin/includes/admin_header'); ?>
	<!-- Page header -->

	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Cover area -->
				<div class="page-header border-panel">

					<div class="page-header-content pt-1">

						<div class="page-title">

							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>
								<a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -

								Company Settings
							</h4>
						</div>
					</div>
				</div>
				<!-- /cover area -->
				<?php $this->load->view('Admin/includes/panel'); ?>

				<div class=" navbar-default navbar-xs navbar-component">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>
					<div class="navbar-collapse collapse" id="navbar-filter" style="margin-left: -2px;">
						<ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar nav-justified" id="myTab">
							<li class=" item active"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i>Company Profile</a></li>
							<li class="nav-item"><a class="nav-link" href="#activity" id="emailTab" data-toggle="tab"><i class="icon-calendar position-left"></i>Timeline Settings</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#emailconfigactivity" id="emailTab" data-toggle="tab"><i class=" icon-envelop4  position-left"></i>Email Configuration</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#basic_settings" id="emailTab" data-toggle="tab"><i class="icon-cog3 position-left"></i>Basic Setting</a></li>
							<li class="nav-item"><a class="nav-link" href="#printing_configuration" id="emailTab" data-toggle="tab"><i class=" icon-address-book  position-left"></i>Printing
									Configuration</a></li>
							<li class="nav-item"><a class="nav-link" href="#report_settings" id="emailTab" data-toggle="tab"><i class=" icon-address-book  position-left"></i>Report
									Settings</a></li>

						</ul>
					</div>
				</div>


				<!-- /toolbar -->
				<style>
					form .form-section {
						color: #404E67;
						line-height: 3rem;
						margin-bottom: 20px;
						border-bottom: 1px solid #404E67;
					}

					.heading-elements {
						background-color: inherit;
						position: absolute;
						top: 50%;
						right: 20px;
						height: 36px;
						margin-top: -82px;
					}
				</style>
				<!-- User profile -->
				<div class="row">
					<div class="col-md-12">
						<div class="tabbable">
							<div class="tab-content">

								<div class="tab-pane fade in active" id="settings">
									<!-- Profile info -->
									<div class="panel panel-flat">
										<div class="panel-body">
											<form id="gstform" method="post">
												<!-- <fieldset>
													<legend class="text-semibold"><i class="icon-file-text position-left"></i> General Details</legend>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Orgnasation Name:</label>
																<input type="text" name="org_cdomain" placeholder="Orgnasation Name" class="form-control" value="<?= $organsation_array->org_cname; ?>">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Orgnasation Address :</label>
																<input type="text" name="org_address" placeholder="Orgnasation Address" class="form-control" value="<?= $organsation_array->org_address; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Email :</label>
																<input type="text" name="org_email" placeholder="Orgnasation Emnail" class="form-control" value="<?= $organsation_array->org_email; ?>">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Contact No. :</label>
																<input type="text" name="org_contact" placeholder="Contact No." class="form-control" value="<?= $organsation_array->org_contact; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Profile Attachment : </label>
																<div class="media no-margin-top">
																	<div class="media-left">
																		<?php
																		if ($organsation_array->org_company_attachment != '') {
																			$file = base_url() . 'assets/admin/company_attachment/' . $organsation_array->org_company_attachment;
																			$ext = pathinfo($file, PATHINFO_EXTENSION);
																			if ($ext == 'pdf' || $ext == 'PDF') { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-pdf" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} elseif ($ext == "doc" || $ext == "docx") { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-word" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} else { ?>
																				<a href="<?= $file ?>" target="_blank"><img src="<?= $file ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></a>
																			<?php }
																		} else { ?>
																			<a><img src="<?= base_url(); ?>assets/admin/assets/images/placeholder1.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
																		<?php	}
																		?>
																	</div>
																	<div class="media-body" style="padding-top: 2.5%;">
																		<input type="file" name="org_company_attachment" id="org_company_attachment" class="form-control">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</fieldset> -->
												<div class="form-body">
													<h4 class="form-section"><i class="fa fa-eye"></i> About Company
													</h4>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput1">Company
																	Name </label>
																<input type="text" class="form-control " placeholder="Enter Company Name" name="org_cname" maxlength="150" autocomplete="off" value="<?= $organsation_array->org_cname; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Company
																	Domain </label>
																<input type="text" class="form-control " placeholder="Enter domain" maxlength="50" id="org_cdomain" name="org_cdomain" autocomplete="off" value="<?= $organsation_array->org_cdomain; ?>">
															</div>
														</div>
													</div>

													<h4 class="form-section"><i class="ft-mail"></i> Contact Info &amp;
														Bio </h4>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput1">First Name
																</label>
																<input type="text" class="form-control " placeholder="Enter First Name" name="org_fname" id="org_fname" autocomplete="off" value="<?= $organsation_array->org_fname; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Last Name
																</label>
																<input type="text" class="form-control " placeholder="Enter Last Name" name="org_lname" id="org_lname" autocomplete="off" value="<?= $organsation_array->org_lname; ?>">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput1">Username /
																	Email </label>
																<input type="text" id="org_email" class="form-control " placeholder="Enter Email" name="org_email" autocomplete="off" value="<?= $organsation_array->org_email; ?>">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Contact
																	No. </label>
																<input type="text" class="form-control " placeholder="Contact No." name="org_contact" maxlength="10" autocomplete="off" value="<?= $organsation_array->org_contact; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Landline
																</label>
																<input type="text" class="form-control " placeholder="Landline" name="org_landline" autocomplete="off" value="<?= $organsation_array->org_landline; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput1">Address
																</label>
																<textarea class="form-control" rows="1" name="org_address" onblur="bind_address(this.value)"><?= $organsation_array->org_address; ?></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Website
																</label>
																<input type="text" class="form-control " placeholder="Website" name="org_website" autocomplete="off" value="<?= $organsation_array->org_web_url; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Country
																</label>
																<select class="form-control" name="org_country" id="org_country" onchange="GetState(this.value)">
																	<option value="">Please Select Country</option>
																	<?php foreach ($CountryArray as  $res) { ?>
																		<option value="<?= $res->id; ?>" <?= $country = ($organsation_array->org_country == $res->id) ? 'selected' : ''; ?>>
																			<?= $res->name; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput1">State
																</label>
																<select class="form-control" name="org_state" id="bind_state_list">
																	<option value="">Please Select State</option>
																	<?php foreach ($StateArray as  $res) { ?>
																		<option value="<?= $res->id; ?>" <?= $state = ($organsation_array->org_state == $res->id) ? 'selected' : ''; ?>>
																			<?= $res->name; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">City
																</label>
																<input type="text" class="form-control " placeholder="City Name" name="org_city" autocomplete="off" value="<?= $organsation_array->org_city ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Post Code
																</label>
																<input type="text" class="form-control " placeholder="Post Code" name="org_postcode" autocomplete="off" maxlength="6" value="<?= $organsation_array->org_postcode ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Time
																	Zone</label>
																<select class="form-control" name="org_timezone">
																	<?php foreach ($TimeZoneArray as  $res) { ?>
																		<option value="<?= $res->timezone_code; ?>" <?= $time = ($organsation_array->org_timezone == $res->timezone_code) ? 'selected' : ''; ?>>
																			<?= ucfirst($res->country); ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="label-control" for="userinput2">Currency</label>
																<select class="form-control" name="org_currency">
																	<?php foreach ($CurrencyArray as  $res) { ?> <option value="<?= $res->currency_id; ?>" <?= $crs = ($organsation_array->org_currency == $res->currency_id) ? 'selected' : ''; ?>>
																			<?= ucfirst($res->currency_sign); ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label class="label-control" for="userinput2">About
																	Company </label>
																<textarea class="form-control " placeholder="About Comapny" name="org_abt_compnay" maxlength="100"><?= $organsation_array->org_abt_compnay ?></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Company Logo </label>
																<div class="media no-margin-top">
																	<div class="media-left">
																		<?php
																		if ($organsation_array->org_company_logo != '') {
																			$file = base_url() . 'assets/admin/company_logo/' . $organsation_array->org_company_logo;
																			$ext = pathinfo($file, PATHINFO_EXTENSION);
																			if ($ext == 'pdf' || $ext == 'PDF') { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-pdf" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} elseif ($ext == "doc" || $ext == "docx") { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-word" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} else { ?>
																				<a href="<?= $file ?>" target="_blank"><img src="<?= $file ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah" data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></a>
																			<?php }
																		} else { ?>
																			<a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/company.png" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img"></a>
																		<?php	}
																		?>
																	</div>
																	<div class="media-body ml-5">
																		<input type="file" class="file-styled form-control" id="imgInp" name="fileup">
																		<p id="error1" style="display:none; color:#FF0000;">
																			Invalid Image Format! Image Format Must Be
																			JPG, JPEG, PNG or GIF.
																		</p>
																		<p id="error2" style="display:none; color:#FF0000;">
																			Maximum File Size Limit is 1MB.
																		</p>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Profile Attachment : </label>
																<div class="media no-margin-top">
																	<div class="media-left">
																		<?php
																		if ($organsation_array->org_company_attachment != '') {
																			$file = base_url() . 'assets/admin/company_attachment/' . $organsation_array->org_company_attachment;
																			$ext = pathinfo($file, PATHINFO_EXTENSION);
																			if ($ext == 'pdf' || $ext == 'PDF') { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-pdf" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} elseif ($ext == "doc" || $ext == "docx") { ?>
																				<a href="<?= $file ?>" target="_blank" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"><i class="icon-file-word" style="margin-top: 40%;font-size: 30px;color: red;" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
																			<?php	} else { ?>
																				<a href="<?= $file ?>" target="_blank"><img src="<?= $file ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></a>
																			<?php }
																		} else { ?>
																			<a><img src="<?= base_url(); ?>assets/admin/assets/images/placeholder1.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
																		<?php	}
																		?>
																	</div>
																	<div class="media-body" style="padding-top: 2.5%;">
																		<input type="file" name="org_company_attachment" id="org_company_attachment" class="form-control">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php
												$gst_applicable = $gst_array[0]->gst_applicable;
												$gst_no = $gst_array[0]->gst_no;
												?>

												<fieldset>
													<legend class="text-semibold"><i class=" icon-price-tag position-left"></i> GST Details
													</legend>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>GST Applicable :</label>
																<select class="form-control" name="gst_applicable" onchange="gst_details(this.value)">
																	<option value="">Select GST Applicable</option>
																	<option value="Yes" <?php if ($gst_applicable == 'Yes') {
																							echo 'selected';
																						} ?>>Yes</option>
																	<option value="No" <?php if ($gst_applicable == 'No') {
																							echo 'selected';
																						} ?>>No</option>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>GSI No. :</label>
																<input type="text" placeholder="GST No." class="form-control" name="gst_no" id="gst_no" maxlength="15" value="<?= $gst_no; ?>">
															</div>
														</div>
													</div>
													<br />
													<div class="row">
														<div class="text-right">
															<button type="submit" class="btn btn-primary">Update Details
																<i class="icon-arrow-right14 position-right"></i></button>
														</div>
													</div>
												</fieldset>
											</form>
										</div>
									</div>
								</div>

								<div class="tab-pane " id="activity">
									<div class="panel panel-flat">
										<div class="panel-body">
											<form id="account_form" method="post">
												<fieldset>
													<legend class="text-semibold"><i class="icon-calendar position-left"></i> Add new period
													</legend>
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Period Name :</label>
																<input type="text" name="period_name" placeholder="Period Name" class="form-control">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Short Year :</label>
																<input type="text" name="short_year" placeholder="Short Year" class="form-control">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Start Date :</label>
																<input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>End Date :</label>
																<input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off">
															</div>
														</div>
													</div>
													<br />
													<div class="row">
														<div class="text-right">
															<button type="submit" class="btn btn-primary">Add Details <i class="icon-arrow-right14 position-right"></i></button>
														</div>
													</div>
												</fieldset>
											</form>

											<fieldset>
												<legend class="text-semibold"><i class="icon-calendar52 position-left"></i> Timeline </legend>
												<div class="row">
													<div class="table-responsive">
														<table class="table" id="exmple">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Period Name</th>
																	<th>Start Date</th>
																	<th>End Date</th>
																	<th class="text-center">Active / Closed</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$cnt1 = 1;
																foreach ($account_period_array as $row) {
																?>
																	<tr>
																		<td><?= $cnt1; ?></td>
																		<td><?= $row->period_name; ?></td>
																		<td><?= date("d F, Y", strtotime($row->start_date)); ?>
																		</td>
																		<td><?= date("d F, Y", strtotime($row->end_date)); ?>
																		</td>
																		<td class="text-center">
																			<?php if ($row->status == 1) { ?>
																				<a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Closed" onclick="deactivate(this.id)" id="<?= $row->period_id ?>"><span class="label label-success">Active</span></a>
																			<?php } else { ?>
																				<a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" onclick="activate(this.id)" id="<?= $row->period_id ?>"><span class="label label-danger">Closed</span></a>
																			<?php } ?>
																		</td>
																		<td class="text-center">
																			<ul class="icons-list" style="display: flex;">
																				<li style="display:block" ;=""><a data-toggle="modal" onclick="edit_accounting_period(id)" id="<?= $row->period_id ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit group" data-placement="bottom"></i></span></a>
																				</li>
																			</ul>
																		</td>
																	</tr>
																<?php
																	$cnt1++;
																}
																?>
															</tbody>
														</table>
													</div>

												</div>
												<br />
											</fieldset>
										</div>
									</div>
								</div>

								<div class="tab-pane " id="basic_settings">
									<div class="panel panel-flat">
										<div class="panel-body">

											<form class="col-12" id="basic_settings_form" method="post">
												<div class="col-sm-6">
													<fieldset class="scheduler-border">
														<legend class="text-semibold scheduler-border"><i class="icon-con52"></i> Quotation</legend>
														<div class="row">
															<div class="form-group">
																<label class="control-label col-lg-4">Title : </label>
																<div class="col-lg-12">
																	<input type="text" name="q_printing_title" class="form-control" id="q_printing_title" placeholder="Printing Title" value="<?= $organsation_array->q_printing_title ?>">
																</div>
															</div>
															<br>
															<div class="form-group">
																<label class="control-label col-lg-4">Prefix : </label>
																<div class="col-lg-12">
																	<input type="text" name="quote_prefix" class="form-control" id="quote_prefix" placeholder="Quotation Prefix" value="<?= $organsation_array->quote_prefix ?>">
																</div>
															</div>
															<br>
															<div class="form-group">
																<label class="control-label col-lg-4">Suffix : </label>
																<div class="col-lg-12">
																	<input type="text" name="quote_suffix" class="form-control" id="quote_suffix" placeholder="Quotation Suffix" value="<?= $organsation_array->quote_suffix ?>">
																</div>
															</div>
															<br>
															<div class="form-group">
																<label class="control-label col-lg-4">Starting Number :
																</label>
																<div class="col-lg-12">
																	<input type="text" name="quote_number" class="form-control" id="quote_number" placeholder="Starting Number" value="<?= $organsation_array->quote_number ?>">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-sm-6">
													<fieldset class="scheduler-border">
														<legend class="text-semibold scheduler-border"><i class="icon-con52"></i> CRM </legend>
														<div class="row">
															<div class="form-group">
																<label class="control-label col-lg-12">Intimation On
																	Last Action ( By Days ) :</label>
																<div class="col-lg-12">
																	<input type="text" name="intimation_days" class="form-control" id="intimation_days" placeholder="Intimation On Last Action ( By Days ) " value="<?= $id = ($organsation_array->intimation_days != '') ? $organsation_array->intimation_days : '2'; ?>">
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-sm-12 row">
													<div class="text-right">
														<button type="submit" class="btn btn-primary">Add Details <i class="icon-arrow-right14 position-right"></i></button>
													</div>
												</div>
											</form>

										</div>
									</div>
								</div>

								<!-- <div class="tab-pane fade in" id="emailconfigactivity">
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
									</div>
								</div> -->
								<div class="tab-pane fade in" id="printing_configuration">
									<div class="panel panel-flat">
										<div class="panel-body">
											<form id="emailconfiguration_form" method="post">
												<fieldset>
													<legend class="text-semibold"><i class="icon-envelop2 position-left"></i> Printing
														Configuration
														<div class="heading-elements1" style="margin-top: -4%;">
															<div class="heading-btn-group text-right">
																<a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
															</div>
														</div>
													</legend>
													<div class="row">
														<div class="table-responsive">
															<table class="table" id="exmple1">
																<thead>
																	<tr>
																		<th>#</th>
																		<th>Name</th>
																		<th class="hidden"></th>
																		<th class="hidden"></th>
																		<th style="width:10%;">Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $count = 1; foreach ($get_section_array as $row) { ?>
																		<tr>
																			<td><?= $count;
																				$count++; ?></td>
																			<td><?= $row->section_name; ?></td>
																			<td class="hidden"></td>
																			<td class="hidden"></td>
																			<td>
																				<ul class="icons-list">
																					<li><a data-toggle="modal" onclick="Edit(id)" id="<?= $row->section_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit" data-placement="top"></i></span></a>
																					</li>
																					<li><a data-toggle="modal" onclick="Delete(id)" id="<?= $row->section_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete" data-placement="top"></i></span></a>
																					</li>
																				</ul>
																			</td>
																		</tr>
																	<?php $count++;
																	} ?>
																</tbody>
															</table>
														</div>
													</div>
												</fieldset>

											</form>
										</div>
									</div>
								</div>

								<div class="tab-pane fade in" id="report_settings">
									<div class="panel panel-flat">
										<div class="panel-body">
											<div class="container-boxes mbr-white">
												<div class="box-item">
													<div class="icon-block-top pb-4">
														<span class="display-2"><i class=" icon-stats-dots "></i></span>
													</div>
													<h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">
														CRM</h4>

													<!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                        								<div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->

													<table class="table table-striped" style="color:black">
														<tbody>

															<tr>
																<td>Leads Opportunity By Source</td>
																<td style="text-align: right;">
																	<input type="checkbox" id="leadsopportunitybysourcecard" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadsopportunitybysourcecard') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>

															<tr>
																<td>Leads Opportunity By Segment</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																<input type="checkbox" id="leadsopportunitybysegment" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadsopportunitybysegment') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads Opportunity by Product</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadoppbyproductservice" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadoppbyproductservice') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads Opportunity - Monthly Counts</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadoppbymonthlycount" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadoppbymonthlycount') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads Opportunity - Userwise Monthly Count</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadoppbyuserwisemonthlycount" <?php for ($i = 0; $i <= 40; $i++) {
																																			if ($new[0][$i] == 'leadoppbyuserwisemonthlycount') {
																																				print 'checked="checked" ';
																																			}
																																		} ?> />
																</td>
															</tr>
															<tr>
																<td>Leads|Opportunity by Sales Person</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadsopportunitybysalesperson" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadsopportunitybysalesperson') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads|Opportunity by Stage</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadsopportunitybystagecard" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadsopportunitybystagecard') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads|Opportunity by Sales Person -Segment wise</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="losalespersonsegmentwise" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'losalespersonsegmentwise') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Leads|Opportunity by Sales Person -Product wise</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" />
																</td>
															</tr>

														</tbody>
													</table>
												</div>
												<div class="box-item">
													<div class="icon-block-top pb-4">
														<span class="display-2"><i class="icon-users4"></i></span>
													</div>
													<h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">
														Contacts</h4>
													<!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                       													 <div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->
													<table class="table table-striped" style="color:black">
														<tbody>
															<tr>
																<td>All Contacts</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" />
																</td>	
															</tr>
															<tr>
																<td>Segments wise Contact</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="segmentwisecontact" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'segmentwisecontact') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Account Owner</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadopportunitybyowner" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadopportunitybyowner') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Account wise revenue</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" />
																</td>
															</tr>
															<tr>
																<td>Contact Summary</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="contactsummary" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'contactsummary') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Type wise Contact</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="typewisecontact" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'typewisecontact') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Contact with activity</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" />
																</td>
															</tr>
															<tr>
																<td>Contact with no activity</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="contactnoactivity" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'contactnoactivity') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>

														</tbody>
													</table>
												</div>
												<div class="box-item">
													<div class="icon-block-top pb-4">
														<span class="display-2"><i class="icon-address-book2"></i></span>
													</div>
													<h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">
														Employee</h4>
													<!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                       														 <div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->
													<table class="table table-striped" style="color:black">
														<tbody>
															<tr>
																<td>Available Time Slots</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="availabletimeslots" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'availabletimeslots') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Employee -Target</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" />
																</td>
															</tr>
															<tr>
																<td>Employee Revenue</td>
																<<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="employeerevenue" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'employeerevenue') { print 'checked="checked" '; } } ?> />
																			</td>
															</tr>
															<tr>
																<td>Employee wise Activity</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="employeewiseactivity" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'employeewiseactivity') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
															<tr>
																<td>Employee wise Activity Mapping</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="employeewiseactivitymapping" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'employeewiseactivitymapping') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="container-boxes mbr-white">
												<div class="box-item">
													<div class="icon-block-top pb-4">
														<span class="display-2"><i class=" icon-stats-dots "></i></span>
													</div>
													<h4 class="box-item-title pb-3 mbr-fonts-style mbr-black display-6">
														General Report</h4>

													<!-- <p class="box-item-text mbr-fonts-style display-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, cupiditate delectus doloremque ea enim eveniet id magni necessitatibus odio.</p>
                        								<div class="mbr-section-btn"><a class="btn-underline mr-3 text-info display-4" href="index.html">Read More</a></div> -->

													<table class="table table-striped" style="color:black">
														<tbody>

															<tr>
																<td>Activity Summary</td>
																<td style="text-align: right;">
																	<input type="checkbox" id="schedulesummarycard" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'schedulesummarycard') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>

															<tr>
																<td>Target Report</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="targetreport" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'targetreport') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>

															<tr>
																<td>Todays Activity</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="Todaysactivitiescard" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'Todaysactivitiescard') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>

															<tr>
																<td>Leads Opportunity By Owner</td>
																<td style="text-align: right;"> <a href="#"><span class="display-2">
																			<input type="checkbox" id="leadsopportunitybyowner" <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'leadsopportunitybyowner') { print 'checked="checked" '; } } ?> />
																</td>
															</tr>


														</tbody>
													</table>
												</div>


											</div>
										</div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
				<!-- /user profile -->
			</div>
			<!-- /main content -->
			<div id="modal_default" class="modal fade" data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog modal-lg">
					<div class="modal-content" style="    margin-top: 15%;">
						<div class="modal-header bg-info" style="background-color:#2196f3;">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h6 class="modal-title">Edit Timeline Settings</h6>
						</div>

						<div class="modal-body">
							<div id="complaint_model_data">

							</div>
						</div>

					</div>
				</div>
			</div>
			<div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
							<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
							<h5 class="modal-title" style="margin-top: -4px">
								<i class=" icon-clipboard6" style="zoom:1.1; "></i>
								&nbsp;Add Section
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
														<label>Section For  <sup style="color: red">*</sup></label>
														<input type="text" name="section_name" id="section_name" class="form-control" placeholder="E.g. Section 1">
														<span id="error_section_name" style="color: red;font-size:13px"></span>
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<label>Section  <sup style="color: red">*</sup></label>
											<div class="row">
												<div class="col-md-12">
													<textarea rows="1" name="section_content" id="section_content" class="form-control"></textarea>
													<span id="error_section" style="color: red;font-size:13px"></span>
												</div>
											</div>
										</fieldset>
										<br />
										<div class="text-center">
											<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
											<span id="preview_upload"></span>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_section" class="modal fade" data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog modal-lg">
					<div class="modal-content" style="margin-top: 15%;">
						<div class="modal-header bg-info" style="background-color:#2196f3;">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h6 class="modal-title">Edit Section</h6>
						</div>

						<div class="modal-body">
							<div id="section_data">

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!-- /page content -->

		<!-- Footer -->
		<?php $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->
</body>

<script type="text/javascript">
	$('#exmple1').DataTable();
	$('#exmple').DataTable();

	$(document).ready(function(e) {
		$("#addform").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {
				section_content = $('#section_content').val();
				section_name = $('#section_name').val();
				if (section_content == '' && section_name == '') {
					$('#error_section').html('Please enter section content..');
					$('#error_section_name').html('Please enter section name..');
					return false;
				} else if (section_content == '') {
					$('#error_section').html('');
					$('#error_section_name').html('');
					$('#error_section').html('Please enter section content..');
					return false;
				} else if (section_name == '') {
					$('#error_section').html('');
					$('#error_section_name').html('');
					$('#error_section_name').html('Please enter section name..');
					return false;
				} else {
					$('#error_section').html('');
					$('#error_section_name').html('');
					$("#preview_upload").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
					);
					$("#preview_upload").show();
					$.ajax({
						url: "<?= base_url('admin/Settings/addSection') ?>",
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
									title: 'Add Section',
									text: 'Added Successfully !!',
									type: 'success'
								});
							});
							setTimeout(function() {
								window.location =
									"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#section_content').summernote();
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#home_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function() {
		readURL(this);
	});


	setTimeout(function() {
		$("#updateMsg").fadeOut("slow");
	}, 2000);
</script>

<script type="text/javascript">
	var a = 0;
	//binds to onchange event of your input field
	$('#imgInp').bind('change', function() {

		var ext = $('#imgInp').val().split('.').pop().toLowerCase();
		if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			$('#error1').slideDown("slow");
			$('#error2').slideUp("slow");
			a = 0;
		} else {
			var picsize = (this.files[0].size);
			if (picsize > 1000000) {
				$('#error2').slideDown("slow");
				a = 0;
			} else {
				a = 1;
				$('#error2').slideUp("slow");
			}
			$('#error1').slideUp("slow");

		}
	});
</script>
<script>
	function edit_accounting_period(id) {

		var datastring = 'id=' + id;

		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/dashboard/edit_mastergroup'); ?>",
			cache: false,
			data: datastring,
			success: function(data) {
				//   alert(data);
				$('#modal_default').modal('show');
				$('#complaint_model_data').html(data);
			},
			error: function() {
				alert('Error while request..');
			}
		});

	}

	function Edit(id) {

		var edit_section = 'id=' + id;

		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/Settings/getData'); ?>",
			cache: false,
			data: edit_section,
			success: function(data) {
				// alert(data);
				$('#edit_section').modal('show');
				$('#section_data').html(data);
			},
			error: function() {
				alert('Error while request..');
			}
		});

	}

	function Delete(id) {

		var notice = new PNotify({
			title: 'Confirmation',
			text: '<p>Are you sure you want to Delete this Section ?</p>',
			hide: false,
			type: 'warning',
			confirm: {
				confirm: true,
				buttons: [{
						text: 'Yes',
						addClass: 'btn-sm'
					},
					{
						text: 'No',
						addClass: 'btn-sm'
					}
				]
			},
			buttons: {
				closer: false,
				sticker: false
			},
			history: {
				history: false
			}
		})

		// On confirm
		notice.get().on('pnotify.confirm', function() {

			var datastring = 'section_id=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Settings/Delete'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					//alert(data);
					$(function() {
						new PNotify({
							title: 'Delete Section',
							text: 'Deleted Section successfully',
							type: 'success'
						});
					});

					setTimeout(function() {
						window.location =
							"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
					}, 800);


				},
				error: function() {
					alert('Error while request..');
				}
			});
		})
		// On cancel
		notice.get().on('pnotify.cancel', function() {
			// alert('Oh ok. Chicken, I see.');
		});

	}
</script>


<script type="text/javascript">
	$(function() {
		$('#start_date').datetimepicker({
			format: 'DD MMMM, YYYY',
			useCurrent: true
		});
		$('#end_date').datetimepicker({
			format: 'DD MMMM, YYYY',
			useCurrent: true
		});
	});
</script>

<script type="text/javascript">
	function gst_details(value) {
		if (value == 'Yes') {
			$("#igst_rate").prop("readonly", false);
			$("#cgst_rate").prop("readonly", false);
			$("#sgst_rate").prop("readonly", false);
			$("#cess").prop("readonly", false);
			$("#gst_no").prop("readonly", false);
		} else {
			$("#igst_rate").prop("readonly", true);
			$("#cgst_rate").prop("readonly", true);
			$("#sgst_rate").prop("readonly", true);
			$("#cess").prop("readonly", true);
			$("#gst_no").prop("readonly", true);
			$("#gst_no").val('');

		}
	}
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
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#gstform').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				gst_applicable: {
					validators: {
						notEmpty: {
							message: 'Please Select GST Applicable'
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
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(e) {
		$("#gstform").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {

				$.ajax({
					url: "<?php echo base_url('admin/Settings/InsertGstDetails'); ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						// alert(data);
						$(function() {
							new PNotify({
								title: 'Compay Setting',
								text: 'Compay Setting Updated Successfully',
								type: 'success'
							});
						});
						setTimeout(function() {
							window.location =
								"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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
		$('#account_form').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				period_name: {
					validators: {
						notEmpty: {
							message: 'Enter Period Name'
						}
					}
				},

				start_date: {
					validators: {
						notEmpty: {
							message: 'Select Start Date'
						}
					}
				},

				end_date: {
					validators: {
						notEmpty: {
							message: 'Select Start Date'
						}
					}
				},

			}
		});
	});
	$(document).ready(function(e) {
		$("#account_form").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {

				$.ajax({
					url: "<?php echo base_url('admin/Settings/AddAccountPeriod'); ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						// alert(data);
						$(function() {
							new PNotify({
								title: 'Add Period',
								text: 'Added Successfully',
								type: 'success'
							});
						});
						setTimeout(function() {
							window.location =
								"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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
		$("#basic_settings_form").on('submit', (function(e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				//alert('invalid');
			} else {

				$.ajax({
					url: "<?php echo base_url('admin/Settings/UpdateBasicSettingDetails'); ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						// alert(data);
						$(function() {
							new PNotify({
								title: 'Basic Setting',
								text: 'Updated Successfully',
								type: 'success'
							});
						});
						setTimeout(function() {
							window.location =
								"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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



<!--======================================= Activate & deactivate  ==========================================-->

<script>
	function deactivate(id) {

		var notice = new PNotify({
			title: 'Confirmation',
			text: '<p>Are you sure you want to Closed this financial year?</p>',
			hide: false,
			type: 'warning',
			confirm: {
				confirm: true,
				buttons: [{
						text: 'Yes',
						addClass: 'btn-sm'
					},
					{
						text: 'No',
						addClass: 'btn-sm'
					}
				]
			},
			buttons: {
				closer: false,
				sticker: false
			},
			history: {
				history: false
			}
		})

		// On confirm
		notice.get().on('pnotify.confirm', function() {

			var datastring = 'p_id=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/dashboard/deactivate'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					// alert(data);
					if (data == 1) {
						$(function() {
							new PNotify({
								title: 'Confirmation Form',
								text: 'Closed successfully',
								type: 'success'
							});
						});
					}

					setTimeout(function() {
						window.location =
							"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
					}, 800);


				},
				error: function() {
					alert('Error while request..');
				}
			});
		})
		// On cancel
		notice.get().on('pnotify.cancel', function() {
			// alert('Oh ok. Chicken, I see.');
		});

	}

	function activate(id) {

		var notice = new PNotify({
			title: 'Confirmation',
			text: '<p>Are you sure you want to Activate this financial year?</p>',
			hide: false,
			type: 'warning',
			confirm: {
				confirm: true,
				buttons: [{
						text: 'Yes',
						addClass: 'btn-sm'
					},
					{
						text: 'No',
						addClass: 'btn-sm'
					}
				]
			},
			buttons: {
				closer: false,
				sticker: false
			},
			history: {
				history: false
			}
		})

		// On confirm
		notice.get().on('pnotify.confirm', function() {

			var datastring = 'p_id=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/dashboard/activate'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					//alert(data);
					$(function() {
						new PNotify({
							title: 'Confirmation Form',
							text: 'Activated successfully',
							type: 'success'
						});
					});

					setTimeout(function() {
						window.location =
							"<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
					}, 800);


				},
				error: function() {
					alert('Error while request..');
				}
			});
		})
		// On cancel
		notice.get().on('pnotify.cancel', function() {
			// alert('Oh ok. Chicken, I see.');
		});

	}
</script>

<script>
	function GetState(country_id) {
		// alert(country_id);
		var datastring = 'country_id=' + country_id;
		// alert(datastring);
		$.ajax({
			type: "post",
			url: "<?php echo base_url('CreateProfile/GetStates'); ?>",
			cache: false,
			data: datastring,
			success: function(data) {
				$('#bind_state_list').html(data);
			},
			error: function() {
				alert('Error while request..');
			}
		});
	}
</script>


<!-- cards display starts.... -->
<script>
	$(document).ready(function() {
		$('#leadsopportunitybysourcecard').change(function() {
			var reportname = document.getElementById('leadsopportunitybysourcecard').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadsopportunitybystagecard').change(function() {
			var reportname = document.getElementById('leadsopportunitybystagecard').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						//alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#typewisecontact').change(function() {
			var reportname = document.getElementById('typewisecontact').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>


<script>
	$(document).ready(function() {
		$('#schedulesummarycard').change(function() {
			var reportname = document.getElementById('schedulesummarycard').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#contactsummary').change(function() {
			var reportname = document.getElementById('contactsummary').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//	alert('checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadsopportunitybysalesperson').change(function() {
			var reportname = document.getElementById('leadsopportunitybysalesperson').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadsopportunitybysegment').change(function() {
			var reportname = document.getElementById('leadsopportunitybysegment').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadopportunitybyowner').change(function() {
			var reportname = document.getElementById('leadopportunitybyowner').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#targetreport').change(function() {
			var reportname = document.getElementById('targetreport').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				// alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#Todaysactivitiescard').change(function() {
			var reportname = document.getElementById('Todaysactivitiescard').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadsopportunitybyowner').change(function() {
			var reportname = document.getElementById('leadsopportunitybyowner').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#segmentwisecontact').change(function() {
			var reportname = document.getElementById('segmentwisecontact').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				// alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//	alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#employeerevenue').change(function() {
			var reportname = document.getElementById('employeerevenue').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadoppbyproductservice').change(function() {
			var reportname = document.getElementById('leadoppbyproductservice').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>


<script>
	$(document).ready(function() {
		$('#leadoppbymonthlycount').change(function() {
			var reportname = document.getElementById('leadoppbymonthlycount').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#employeewiseactivity').change(function() {
			var reportname = document.getElementById('employeewiseactivity').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#employeewiseactivitymapping').change(function() {
			var reportname = document.getElementById('employeewiseactivitymapping').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>


<script>
	$(document).ready(function() {
		$('#contactnoactivity').change(function() {
			var reportname = document.getElementById('contactnoactivity').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#availabletimeslots').change(function() {
			var reportname = document.getElementById('availabletimeslots').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#leadoppbyuserwisemonthlycount').change(function() {
			var reportname = document.getElementById('leadoppbyuserwisemonthlycount').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#losalespersonsegmentwise').change(function() {
			var reportname = document.getElementById('losalespersonsegmentwise').id;
			var datastring = 'report_name=' + reportname + ',';
			if (this.checked != true) {
				//alert('not checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});

			} else {
				//alert('checked');
				//alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert("working"+data);
					},
					error: function() {
						alert('Error while request..2');
					}
				});
			}
		});
	});
</script>



</html>