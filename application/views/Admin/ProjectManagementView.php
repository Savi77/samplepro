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
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" />
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

	<!-- /theme JS files -->

	<!-- Theme JS files -->
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
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<!-- <script type="text/javascript" src="assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script> -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
	</script>

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
	</script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>


	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

	<!-- <script type="text/javascript" src="assets/admin/assets/js/pages/datatables_responsive.js"></script> -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	<!-- /theme JS files -->
	<style>
		.multiselect-container>li>a>label.checkbox {
			margin: -6px 12px;
		}

		.multiselect-container {
			min-width: 275px;
			max-height: 250px;
			overflow-y: auto;
		}

		.navbar-brand>img {
			margin-top: -1.8rem !important;
		}

		.sidebar-default .sidebar-content {
			background-color: #009fdf;
			border-color: #ddd;
			-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			margin-bottom: -5000px;
			padding-bottom: 5000px;
			top: -20px;
			margin-left: -22px;
		}

		div#example_wrapper {
			padding: 20px 0;
		}

		.datepicker .table-condensed td,
		.datepicker .table-condensed th {
			text-align: center;
			padding: 7px 12px;
			border-radius: 3px;
			border: 0;
		}

		.table-condensed>thead>tr>th,
		.table-condensed>tbody>tr>th,
		.table-condensed>tfoot>tr>th,
		.table-condensed>thead>tr>td,
		.table-condensed>tbody>tr>td,
		.table-condensed>tfoot>tr>td {
			padding: 8px 20px;
		}

		td,
		th {
			padding: 0;
		}

		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		user agent stylesheet td {
			display: table-cell;
			vertical-align: inherit;
		}

		legend.scheduler-border {
			font-size: 1.2em !important;
			font-weight: bold !important;
			text-align: left !important;
			width: auto;
			padding: 5px 10px;
			border-bottom: none;
			background: #2196F3;
			color: white;
		}

		legend {
			font-size: 12px;
			padding-top: 10px;
			padding-bottom: 10px;
			text-transform: uppercase;
		}

		legend {
			display: block;
			width: 100%;
			padding: 0;
			margin-bottom: 20px;
			font-size: 19.5px;
			line-height: inherit;
			color: #333333;
			border: 0;
			border-bottom: 1px solid #e5e5e5;
		}

		legend {
			border: 0;
			padding: 0;
		}

		fieldset.scheduler-border {
			border: 1px solid #2196F3 !important;
			padding: 0 1.4em 1.4em 1.4em !important;
			margin: 0 0% 1.5em 0% !important;
			-webkit-box-shadow: 0px 0px 0px 0px #000;
			box-shadow: 0px 0px 0px 0px #2196f3;
		}

		.col-md-4 {
			width: 48.333333%;
		}

		.multiselect {
			width: 100%;
			min-width: 100%;
			text-align: left;
			padding-left: 29px;
			padding-right: 29px;
			text-overflow: ellipsis;
			overflow: hidden;
		}

		label {
			margin-bottom: 10px;
			padding-top: 7px;
			font-weight: 400;
		}

		.text-right {
			text-align: right;
			padding-top: 5px;
		}

		textarea.form-control {
			height: auto;
			width: 770px;
		}
		.datatable-header > div:first-child, .datatable-footer > div:first-child {
    margin-left: 14px;
}
.dataTables_length {
    float: right;
    display: inline-block;
    margin: 0 14px 20px 20px;
}
label {
    margin-bottom: 10px;
    padding-top: 16px;
    font-weight: 400;
}
.dataTables_filter > label:after {
    content: "\e98e";
    font-family: 'icomoon';
    font-size: 12px;
    display: inline-block;
    position: absolute;
    top: 27px;
    right: 12px;
    color: #999999;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.select2-selection--single:not([class*=bg-]):not([class*=border-]) {
    border-color: #ddd;
}
.select2-selection--single:not([class*=bg-]) {
    background-color: #fff;
}
.select2-selection--single {
    cursor: pointer;
    outline: 0;
    display: block;
    height: 36px;
    padding: 7px 0;
    line-height: 1.5384616;
    position: relative;
    border: 1px solid transparent;
    white-space: nowrap;
    border-radius: 3px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
	</style>
</head>

<body style="overflow-x: hidden;">

	<?php $this->load->view('Admin/includes/admin_header'); ?>
	<?php
  // echo json_encode($user_permission);
  $AddClassP = 'style="display:block";';
  $EditClass = 'style="display:block";';
  $DeleteClass = 'style="display:block";';
  $StatusClass = 'style="display:block";';

  foreach ($user_permission as $priviledge) {
    $priviledge_key = $priviledge->priviledge_key;
    $status = $priviledge->status;
    if ($priviledge_key == 'ADD') {
      if ($status == 1) {
        $AddClassP = ' style="display:block"; ';
      } else {
        $AddClassP = ' style="display:none"; ';
      }
    }

    if ($priviledge_key == 'EDIT') {
      // echo 11;
      if ($status == 1) {
        $EditClass = ' style="display:block"; ';
      } else {
        $EditClass = ' style="display:none"; ';
      }
    }

    if ($priviledge_key == 'DELETE') {
      if ($status == 1) {
        $DeleteClass = 'style="display:block"; ';
      } else {
        $DeleteClass = 'style="display:none"; ';
      }
    }

    if ($priviledge_key == 'ACTIVE') {
      if ($status == 1) {
        $StatusClass = 'style="display:block"; ';
      } else {
        $StatusClass = 'style="display:none"; ';
      }
    }
  }

  ?>







	<!-- Page container -->
    <div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<!--  -->
			<!-- Main content -->
			<div class="content-wrapper">
				<div class="row">
					<div class="row">
						<div class="col-md-12">
							<!-- Page header -->
							<?php $this->load->view('Admin/includes/panel'); ?>
							<div class="page-header">
								<div class="page-header-content">
									<div class="page-title">
										<h4>
											<i class="icon-arrow-left52 position-left"></i>
											<a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span
													class="text-semibold">Dashboard</span></a> -
											Project Management

										</h4>
									</div>

									<div class="heading-elements">
										<div class="heading-btn-group">
											<a data-toggle="modal" data-target="#interest_model"
												class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i
													class="icon-file-plus text-primary"></i><span>ADD</span></a>
										</div>
									</div>
								</div>
							</div>
							<!-- /page header -->
							<!-- Basic responsive configuration -->
							<div class="panel panel-flat">
								<div class="panel-heading table_header">
									<h5 class="panel-title" style="color:white">Project Management</h5>
								</div>
								
								<table class="table datatable-colvis-state" id="mytable">
									<thead>
										<tr>
											<th>ID No.</th>
											<th>Project Manager</th>
											<th>Project Name</th>
											<th>Client</th>
											<th>Status</th>

										</tr>
									</thead>
									<tbody>

										<?php
									$count = 1;
									foreach ($project_manager->result() as $row) {
									?>
										<tr>

											<td>
												<a
													href="<?= base_url('admin/ProjectManagement/ViewDetails') ?>?ProjectId=<?= $row->pid; ?>">
													<div style="font-weight: 600;width: 120px;color:#0d79d0;">
														<?= $row->id; ?></div>
												</a>
											</td>
											<td>
												<div style="width: 150px;"><?= $row->managername; ?></div>
											</td>

											<td>
												<div style="width: 250px;"><?= $row->projectname; ?></div>
											</td>
											<td>
												<div style="width: 250px;"><?= $row->client; ?></div>
											</td>

											<td>
												<div style="width: 200px;"><?= $row->status; ?></div>
											</td>

										</tr>
										<?php $count++;
									} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /basic responsive configuration -->
		<div class="modal fade" id="interest_model" role="dialog" style="margin-top:20px;">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #009fdf;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
							<i class="icon icon-users4" style="zoom:1.1; "></i>&nbsp;&nbsp;Add New Project
						</h5>
					</div>
					<div class="modal-body" style="margin-top: -10px; height: auto ; background-color: #F5F5F5;">
						<div class="row">
							<!-- Fieldset legend -->
							<div class="row">
								<div class="col-md-12">
									<form id="projectmanagement" method="post">
										<div class="panel panel-flat">
											<div class="panel-body">
												<!--  -->
												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Project Details
													</legend>

													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Project Name:<span class="text-danger">*</span>
																</label>
																<input type="text" name="ProjectName" id="ProjectName"
																	class="form-control" maxlength="150">

															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Client:<span class="text-danger">*</span></label>
																<select name="ClientName" id="ClientName"
																	data-placeholder="Client Name" class="select">
																	<option value=""></option>
																	<?php
																	foreach ($primary_customer->result() as $value21) {
																	?>
																	<option value="<?= $value21->customer_id ?>">
																		<?= $value21->company_name; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>

													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Interested In:<span
																		class="text-danger">*</span></label>
																<select name="InterestesIn" id="InterestesIn"
																	data-placeholder="Interestes In" class="select">
																	<option value=""></option>
																	<?php
																	foreach ($product_list as $row1) { ?>
																	?>
																	<option value="<?= $row1->product_id ?>">
																		<?= $row1->product_name; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>

												</fieldset>

												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Status /
														Priority</legend>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Status:<span class="text-danger">*</span></label>
																<select name="StatusType" id="StatusType"
																	data-placeholder="StatusType" class="select">
																	<option value=""></option>
																	<option value="In Progress">In Progress</option>
																	<option value="Deffered">Deffered</option>
																	<option value="Cancelled">Cancelled</option>
																	<option value="Abandoned">Abandoned</option>
																	<option value="Completed">Completed</option>
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Priority:<span
																		class="text-danger">*</span></label>
																<select name="PriorityType" id="PriorityType"
																	data-placeholder="Priority" class="select">
																	<option value=""></option>
																	<option value="low">low</option>
																	<option value="Medium">Medium</option>
																	<option value="High">High</option>
																</select>
															</div>
														</div>
													</div>
												</fieldset>
												<!--  -->
												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Commercially
													</legend>
													<div class="collapse in" id="demo1">
														<div class="row">

															<div class="col-md-4">
																<div class="form-group">
																	<label>Rate:<span class="text-danger">*</span>
																	</label>
																	<input type="text" name="Rate" id="Rate"
																		class="form-control">

																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>Per:<span
																			class="text-danger">*</span></label>
																	<select name="Per" id="Per" data-placeholder="Per"
																		class="select">
																		<option value=""></option>
																		<option value="Fixed">Fixed</option>
																		<option value="Hourly">Hourly</option>
																	</select>
																</div>
															</div>

														</div>
													</div>
												</fieldset>
												<!--  -->

												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Resource
														Management</legend>

													<div class="collapse in" id="demo2">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Project Manager:<span
																			class="text-danger">*</span></label>
																	<select name="ProjectManager" id="ProjectManager"
																		data-placeholder="Project Manager Name"
																		class="select">
																		<option value=""></option>
																		<?php
																	foreach ($array_users as $row1) { ?>
																		?>
																		<option value="<?= $row1['id']?>">
																			<?= $row1['name'] ?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>Team </label><br>
																	<select name="Team[]" id="Team" multiple=""
																		class="form-control"
																		style="width: 100%; display: none;">
																		<?php
																		foreach ($array_users as $row2) { ?>
																		?>
																		<option value="<?= $row2['id'] ?>">
																			<?= $row2['name'] ?></option>
																		<?php } ?>

																	</select>
																</div>
															</div>

														</div>
													</div>
												</fieldset>

												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Timeline
													</legend>

													<div class="row">

														<div class="col-md-4">
															<div class="form-group">
																<label>Frequency:<span
																		class="text-danger">*</span></label>
																<select name="frequency" id="frequency"
																	onchange="setvalue(); mainInfo()"
																	data-placeholder="Frequency" class="select">
																	<option value=""></option>
																	<option value="One Time">One Time</option>
																	<option value="Repeatative">Repeatative</option>
																</select>
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Target Period:<span
																		class="text-danger">*</span></label>
																<select class="form-control" name="target_period"
																	id="target_period" onchange="mainInfo()">
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
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Recurring Count: <sup
																		style="color: red">*</sup></label>
																<input type="text" class="form-control"
																	id="recurring_cnt" name="recurring_cnt" value="1"
																	onkeyup="mainInfo()">

															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Start Date : <sup
																		style="color: red">*</sup></label>
																<input type="text" class="form-control" id="start_date"
																	name="start_date" onchange="startdate_result()"
																	value="<?= date("d F Y") ?>">
															</div>
														</div>
													</div>

													<div class="row">


														<div class="col-md-4">
															<div class="form-group">
																<label>End Date : <sup
																		style="color: red">*</sup></label>
																<input type="text" class="form-control" id="end_date"
																	name="end_date" placeholder="Select End Date"
																	onchange="enddate_result()">
																<input type="text" style="display: none"
																	class="form-control" id="end_date1" name="end_date1"
																	onchange="enddate_result1()">
															</div>
														</div>
													</div>

												</fieldset>

												<fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Description
													</legend>
													<div class="row">


														<div class="col-md-4">
															<div class="form-group">
																<label for="email"> Project Description: </label>
																<textarea class="form-control col-md-12"
																	id="ProjectDescription" name="ProjectDescription"
																	placeholder="Please enter Description"
																	maxlength="200" style="margin-top: -1.9%;" col="5"
																	row="3"
																	data-bv-field="ProjectDescription"></textarea>
																<small class="help-block"
																	data-bv-validator="stringLength"
																	data-bv-for="ProjectDescription"
																	data-bv-result="NOT_VALIDATED"
																	style="display: none;"></small></div>
														</div>
													</div>
												</fieldset>



												<div class="text-right">
													<button type="submit" class="btn btn-primary">Submit<i
															class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>
									</form>
									<!-- /a legend -->
								</div>
							</div>
							<!-- /fieldset legend -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="interest_model1" class="modal fade" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"><i class="icon-office position-left"></i>&nbsp;&nbsp; Add Department /
							Designation
						</h6>
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
									<button type="submit" class="btn btn-primary pull-right">Submit<i
											class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"><i class="icon-insert-template" style="zoom:1.1; "></i>
							&nbsp; &nbsp;Edit Department / Designation</h6>
					</div>

					<div class="modal-body">
						<div id="complaint_model_data1">

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- Footer -->
		<?php  $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->
		<script>
			$('#mytable').DataTable({
				"language": {
					"search": "Filter:" + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0'
				}
			});

		</script>

		<script type="text/javascript">
			$("#StartDate").on("dp.change", function (e) {
				$('#projectmanagement').bootstrapValidator('revalidateField', 'StartDate');
			});
			$("#start_date").on("dp.change", function (e) {
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
						var cnt1 = recurring_cnt * 30 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Quarterly') {
						var cnt1 = recurring_cnt * 91 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Half Yearly') {
						var cnt1 = recurring_cnt * 183 - 1;
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);
								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			});

		</script>

		<script type="text/javascript">
			$("#EndDate").on("dp.change", function (e) {
				$('#projectmanagement').bootstrapValidator('revalidateField', 'EndDate');
			});

		</script>

		<script type="text/javascript">
			$(function () {
				$('#start_date').datetimepicker({
					format: 'DD MMMM, YYYY',
					maxDate: 'now',
					useCurrent: true,
				});
				$('#end_date').datetimepicker({
					format: 'DD MMMM, YYYY',
					maxDate: 'now',
					useCurrent: true
				});
				$('#end_date1').datetimepicker({
					format: 'DD MMMM, YYYY',
					maxDate: 'now',
					useCurrent: true
				});

			});
			$('#Team').select2();
			$('#frequency').select2();
		

		</script>

		<script>
			function setvalue() {

				var dropdown1 = document.getElementById('frequency');
				if (dropdown1.value == "One Time") {
					var a = '1';
					var textbox = document.getElementById('recurring_cnt');
					textbox.value = a;
					$("#recurring_cnt").attr("disabled", "disabled");
				} else {
					$("#recurring_cnt").prop("disabled", false);
				}

			}

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
						var cnt1 = recurring_cnt * 30 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Quarterly') {
						var cnt1 = recurring_cnt * 91 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Half Yearly') {
						var cnt1 = recurring_cnt * 183 - 1;
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);
								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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

				alert(startDate);
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
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
			$(document).ready(function () {
				$('#projectmanagement').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						ProjectName: {
							validators: {
								notEmpty: {
									message: 'Please Enter Project Name'
								}
							}
						},
						ClientName: {
							validators: {
								notEmpty: {
									message: 'Please select client Name'
								}
							}
						},
						InterestesIn: {
							validators: {
								notEmpty: {
									message: 'Please select interest'
								}
							}
						},
						StatusType: {
							validators: {
								notEmpty: {
									message: 'Please select status'
								}
							}
						},
						ProjectManager: {
							validators: {
								notEmpty: {
									message: 'Please select manager Name'
								}
							}
						},
						Team: {
							validators: {
								notEmpty: {
									message: 'Please select team Name'
								}
							}
						},
						frequency: {
							validators: {
								notEmpty: {
									message: 'Please select frequency'
								}
							}
						},
						target_period: {
							validators: {
								notEmpty: {
									message: 'Please select target period'
								}
							}
						},
						frequency: {
							validators: {
								notEmpty: {
									message: 'Please select frequency'
								}
							}
						},
						recurring_cnt: {
							validators: {
								notEmpty: {
									message: 'Please Enter recurring count'
								}
							}
						},
						start_date: {
							validators: {
								notEmpty: {
									message: 'Please Enter start date'
								}
							}
						},
						end_date: {
							validators: {
								notEmpty: {
									message: 'Please Enter end date'
								}
							}
						},
						end_date1: {
							validators: {
								notEmpty: {
									message: 'Please Enter end date'
								}
							}
						},
						ProjectDescription: {
							validators: {
								notEmpty: {
									message: 'Please Enter description'
								}
							}
						},
						Priority: {
							validators: {
								notEmpty: {
									message: 'Please select priority'
								}
							}
						},


					}
				});
			});

		</script>

		<script type="text/javascript">
			//  jQuery('#business1').multiselect({
			//    enableFiltering: true,
			//    maxHeight: 400,
			//    enableCaseInsensitiveFiltering: true,
			//    nonSelectedText: 'Select business segment',
			//    numberDisplayed: 10,
			//    selectAll: false,
			//    onChange: function(option, checked) {
			//      // Get selected options.
			//      var selectedOptions = jQuery('#business1 option:selected');

			//      if (selectedOptions.length >= 10) {
			//        // Disable all other checkboxes.
			//        var nonSelectedOptions = jQuery('#business1 option').filter(function() {
			//          return !jQuery(this).is(':selected');
			//        });

			//        nonSelectedOptions.each(function() {
			//          var input = jQuery('input[value="' + jQuery(this).val() + '"]');
			//          input.prop('disabled', true);
			//          input.parent('li').addClass('disabled');
			//        });

			//        new PNotify({
			//          title: 'Message',
			//          text: 'Please Select only 10 business segment',
			//          type: 'warning'
			//        });
			//      } else {
			//        // Enable all checkboxes.
			//        jQuery('#business1 option').each(function() {
			//          var input = jQuery('input[value="' + jQuery(this).val() + '"]');
			//          input.prop('disabled', false);
			//          input.parent('li').addClass('disabled');
			//        });
			//      }
			//    }
			//  });
			/*Add This to Block SHIFT Key*/
			var shiftClick = jQuery.Event("click");
			shiftClick.shiftKey = true;

			$(".multiselect-container li *").click(function (event) {
				if (event.shiftKey) {
					//alert("Shift key is pressed");
					event.preventDefault();
					return false;
				} else {
					//alert('No shift hey');
				}
			});

		</script>


		<script type="text/javascript">
			$(document).ready(function (e) {
				$("#projectmanagement").on('submit', (function (e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {
						//alert("a");
						$("#preview").show();
						$("#preview").html(
							'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
						);

						$.ajax({
							url: "<?php echo base_url('admin/ProjectManagement/add_new_project');?>",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function (data) {
								$("#preview").hide();
								$(function () {
									new PNotify({
										title: 'Register Form',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function () {
									window.location =
										"<?php echo base_url('admin/ProjectManagement');?>";
								}, 1000);


							},
							error: function () {
								alert('fail to addaa');
							}
						});
					}
					return false;

				}));
			});

		</script>



		<!--=======================================  Validation login  ==========================================-->
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


		<!--======================================= / Validation login  ==========================================-->







		<!--=======================================  delete Event  ==========================================-->

		<script>
			function del_client(dep_id, deg_id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to delete this Department / Designation?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'dep_id=' + dep_id + '&deg_id=' + deg_id;
					// alert(datastring);return false;
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/deleteDepartmentDesignation'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Delete Form',
									text: 'Deleted successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location =
									"<?php echo base_url('admin/Master/department_designation'); ?>";
							}, 1000);


						},
						error: function () {
							alert('Error while request..');
						}
					});
				})
				// On cancel
				notice.get().on('pnotify.cancel', function () {
					// alert('Oh ok. Chicken, I see.');
				});

			}

		</script>

		<!--======================================= / Delete Event  ==========================================-->

		<script>
			function edit_client(dep_id, deg_id) {
				var datastring = 'dep_id=' + dep_id + '&deg_id=' + deg_id;
				// alert(datastring);return false;
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Master/edit_department_designation'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						// alert(data);
						$('#modal_default1').modal('show');
						$('#complaint_model_data1').html(data);

					},
					error: function () {
						alert('Error while request..');
					}
				});

			}

		</script>

		<script type="text/javascript">
			$(document).ready(function () {
				//$('input[placeholder]').placeholderLabel();
			})
			$(document).ready(function () {
				$('textarea[placeholder]').placeholderLabel();
			})

		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-36251023-1']);
			_gaq.push(['_setDomainName', 'jqueryscript.net']);
			_gaq.push(['_trackPageview']);

			(function () {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
					'.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>



		<!--======================================= Activate & deactivate  ==========================================-->

		<script>
			function deactivate(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to Inactive this Department / Designation?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'typeid=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/deactivate3'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							// alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation Form',
									text: 'Inactive successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location =
									"<?php echo base_url('admin/Master/department_designation'); ?>";
							}, 800);


						},
						error: function () {
							alert('Error while request..');
						}
					});
				})
				// On cancel
				notice.get().on('pnotify.cancel', function () {
					// alert('Oh ok. Chicken, I see.');
				});

			}

		</script>

		<script>
			function activate(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to activate this Type?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'typeid=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/activate3'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation Form',
									text: 'Activated successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location =
									"<?php echo base_url('admin/Master/department_designation'); ?>";
							}, 800);


						},
						error: function () {
							alert('Error while request..');
						}
					});
				})
				// On cancel
				notice.get().on('pnotify.cancel', function () {
					// alert('Oh ok. Chicken, I see.');
				});

			}

		</script>


		<!--======================================= / Activate & Deactivate ==========================================-->


</body>

</html>
