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
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<link href="<?= base_url() ?>assets/admin/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/jquery-ui.js"></script>
	<!-- /theme JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js">

	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.fn.dataTable.ext.errMode = 'none';
		});
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-multiselect.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
	<script src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<style type="text/css">
		thead {
			display: none !important;
		}

		.icon-newspaper2:before {
			content: "\e99b";
		}
	</style>
	<style type="text/css">
		.nav-tabs.nav-tabs-bottom>li {
			margin-bottom: -4px;
		}

		.badge {
			padding: 1px 7px 0px 7px !important;
			font-size: 14px;
		}
	</style>
	<style type="text/css">
		tr.group,
		tr.group:hover {
			background-color: rgb(103, 98, 98) !important;
			color: white !important;
			font-size: 14px !important;
			font-weight: 600 !important;
		}

		.dataTables_length>label>span:first-child {
			float: left;
			margin: 5px 9px;
			margin-left: -15px;
		}

		.datatable-header>div:first-child,
		.datatable-footer>div:first-child {
			margin-left: 20px !important;
			left: -13px !important;
		}

		.dataTables_length {
			margin-right: 11px !important;
		}

		input,
		button,
		select,
		textarea {
			height: auto !important;
		}

		.btn-info {
			color: #fff;
			background-color: rgba(236, 14, 39, 0.77) !important;
			border-color: rgba(236, 14, 39, 0.77) !important;
		}

		.nav-tabs>li>a {
			margin-right: 0;
			color: #ddd !important;
		}

		table.dataTable thead th,
		table.dataTable thead td {
			padding: 10px 6px;
			border-bottom: 1px solid #111;
		}

		.nav-tabs[class*=bg-]>.active>a {
			background-color: rgba(0, 0, 0, 0.4) !important;
		}

		.dataTables_length>label>span:first-child {
			float: left;
			margin: 5px 9px;
			margin-left: -15px;
		}

		.datatable-header>div:first-child,
		.datatable-footer>div:first-child {
			margin-left: 20px !important;
			left: 0px !important;
		}

		.dataTables_length {
			margin-right: 11px !important;
		}
	</style>

	<style type="text/css">
		.ui-datepicker table td.ui-state-disabled span {
			color: #2d2d2d;
		}

		.ui-datepicker table td.ui-datepicker-today .ui-state-highlight {
			background-color: #2196F3;
			color: #252424;
		}

		.testing {
			z-index: 100000;
		}

		.ui-datepicker .ui-datepicker-title .ui-datepicker-year {
			font-size: 12px;
			color: #333232;
			margin-left: 5px;
		}

		.ui-datepicker .ui-datepicker-prev span,
		.ui-datepicker .ui-datepicker-next span {
			display: none !important;
		}

		.ui-datepicker table td.ui-datepicker-current-day .ui-state-active {
			background-color: #26A69A;
			color: #333;
		}

		.table>tbody>tr>td {
			padding: 7px 15px !important;
		}
	</style>

	<style>

	</style>
	<style>
		#blinklink {
			animation: blinklink 1.5s linear infinite;
		}

		@keyframes blinklink {
			100% {
				opacity: 0;
			}
		}

		.panel-body {
			padding: 10px !important;
		}

		.panel {
			margin-bottom: 4px !important;
		}
	</style>

	<style type="text/css">
		.panel-footer {
			padding: 0 10px !important;
		}

		/* margin-bottom: 20px !important; */
		.content-group {
			margin-bottom: 0px !important;
		}

		td.dataTables_empty {
			color: red !important;
			font-size: 15px;
			font-weight: 500;
		}
		.badge-danger {
			background-color: #f00;
			border-color: #f00;
		}
	</style>
</head>

<body class="sidebar-xs1">
	<!-- Main navbar -->
	<?php
		$this->load->view('Admin/includes/admin_header');
		$reschedule_count = count($incomplete_issue_list);
		if ($reschedule_count == 0) {
			$blinlkClass = 'blinklink1';
		}else {
			$blinlkClass = 'blinklink';
		}
	?>
	<?php
		// echo json_encode($user_permission);
		$AddClass = 'style="display:block";';
		$UploadDataClass = 'style="display:block";';
		$ChangePriorityClass = 'style="display:block";';
		$ViewAllDataClass = 'display:block';
		$DeleteClass = 'display:block';
		foreach ($user_permission as $priviledge) {
			$priviledge_key = $priviledge->priviledge_key;
			$status = $priviledge->status;
			if ($priviledge_key == 'ADD') {
				if ($status == 1) {
					$AddClass = ' style="display:block"; ';
				} else {
					$AddClass = ' style="display:none"; ';
				}
			}

			if ($priviledge_key == 'UPLOADDOC') {
				// echo 11;
				if ($status == 1) {
					$UploadDataClass = ' style="display:block"; ';
				} else {
					$UploadDataClass = ' style="display:none"; ';
				}
			}

			if ($priviledge_key == 'CHANGEPRIORITY') {
				if ($status == 1) {
					$ChangePriorityClass = 'style="display:block"; ';
				} else {
					$ChangePriorityClass = 'style="display:none"; ';
				}
			}

			if ($priviledge_key == 'DELETE') {
				if ($status == 1) {
					$DeleteClass = 'display:block';
				} else {
					$DeleteClass = 'display:none';
				}
			}

			if ($priviledge_key == 'SCHEDULEVIEWALLEMPLOYEES') {
				if ($status == 1) {
					$ViewAllDataClass = 'display:block';
				} else {
					$ViewAllDataClass = 'display:none';
				}
			}
		}
	?>
	
	<!-- /page header -->
	<!-- Page container -->
	<div class="page-container">
		
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
			<?php $this->load->view('Admin/includes/panel'); ?>
			<div class="page-header">
				<div class="page-header-content">
					<div class="page-title">
						<h4>
                            <i class="icon-arrow-left52 position-left"></i>
                            <a href="<?= base_url() ?>admin/Dashboard/view_dashboard"> <span class="text-semibold">Dashboard</span></a> - Activity List
                        </h4>
					</div>
					<div class="heading-elements">
						<a href="<?= base_url() ?>admin/ScheduleManagement/TrasnsferList" class="btn bg-warning btn-labeled heading-btn"><b style="background: #f5f5f5; border: 1px solid #ff5722; padding: 5px ;"><span > <b> <span id="<?= $blinlkClass ?>" class="badge badge-danger"><?= $reschedule_count ?></span> </b></span></b> Transfered Activity
						</a>
						<a data-toggle="modal" data-target="#schedule_model" class="btn bg-blue btn-labeled heading-btn" <?= $AddClass; ?>><b><i class="icon-task"></i></b> Add Activity
						</a>
					</div>
				</div>
			</div>
			<div class="panel panel-body" id="all_activity_filter" style="margin-top: 2%;">
				<form method="post" class="form-horizontal" id="get_data_form">
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-3 control-label">From : <span style="color: red;">*</span></label> 
								<div class="col-sm-9">
									<div class="input-group date">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d M Y'); ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-3 control-label">To : <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<div class="input-group date">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-3 control-label">Status :</label>
								<div class="col-sm-9">
									<select class="form-control" name="status">
										<option value="">Select Status</option>
										<option value="pending">Pending</option>
										<option value="completed">Complete</option>
										<option value="in_progress">In Progress</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12" <?= $ViewAllDataClass; ?>>
							<div class="form-group">
								<label class="col-sm-1 control-label">Employee :</label>
								<div class="col-sm-11">
									<select class="form-control" id="employee_list" name="employee_list">
										<option value="">Select Employee List</option>
										<?php
										foreach ($employee_list as  $row) {
										?>
											<option value="<?= $row->id; ?>"><?= $row->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<span id="loader_gif"></span>
							<button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
						</div>
					</div>
				</form>
			</div>
			
			<!-- 
				<div class="navbar navbar-default navbar-xs navbar-component" style="background-color: white !important;">
					<ul class="nav navbar-nav no-border visible-xs-block">
						<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>
					<div class="navbar-collapse collapse" id="navbar-filter" style="display: none !important;">
						<div class="category-content" style="margin-bottom: -10px;padding: 10px;margin-top: 10px;">
							<div class="row">
							<div class="col-md-4">
								<div class="panel panel-body"  id="pending_issue_list"  style="border:3px solid #08ad0f;cursor: pointer;" onclick="Show_issue_list()">
								<div class="media">
									<div class="media-left">
									<i class="icon-newspaper2 text-success-400 icon-2x no-edge-top mt-5"></i>
									</div>
									<div class="media-body" style="vertical-align: bottom;">
									<h6 class="media-heading text-semibold"><a href="#" class="text-default">All Activity</a></h6>
									</div>
								</div>
								<hr style="margin-top: 10px;margin-bottom: 10px;"  />
									<div class="row text-center">
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i><?= $activity_issue_count['todaycnt']; ?></h6>
										<span class="text-muted text-size-small">Today</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> <?= $activity_issue_count['monthcnt']; ?></h6>
										<span class="text-muted text-size-small">Month</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class=" icon-calendar position-left text-slate"></i> <?= $activity_issue_count['allcnt']; ?></h6>
										<span class="text-muted text-size-small">All</span>
										</div>
									</div>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="panel panel-body"  id="reschedule_issue_list"  style="border-color: #FF6F4C;cursor: pointer;" onclick="Show_reschedule_list()">
								<div class="media">
									<div class="media-left">
									<i class="icon-history text-warning-400 icon-2x no-edge-top mt-5"></i>
									</div>
									<div class="media-body" style="vertical-align: bottom;">
									<h6 class="media-heading text-semibold"><a href="#" class="text-default">Re-Scheduled</a>                       
										&nbsp;&nbsp;
										<?php if ($reschedule_count > 0) { ?>
											<b>
											<span id="blinklink" class="badge badge-danger"><?= $reschedule_count ?></span>                             
											</b>
										<?php } ?>  
									</h6>
									</div>
									<hr style="margin-top: 10px;margin-bottom: 10px;"  />
									<div class="row text-center">
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> <?= $rechedule_issue_count['todaycnt']; ?></h6>
										<span class="text-muted text-size-small">Today</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> <?= $rechedule_issue_count['monthcnt']; ?></h6>
										<span class="text-muted text-size-small">Month</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar position-left text-slate"></i> <?= $rechedule_issue_count['allcnt']; ?></h6>
										<span class="text-muted text-size-small">All</span>
										</div>
									</div>
									</div>

								</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel panel-body"  id="completed_issue_list"  style="border-color: #00BBD1;cursor: pointer;"  onclick="Show_Completed_list()">
								<div class="media">
									<div class="media-left">
									<i class="icon-file-check2 text-info icon-2x no-edge-top mt-5"></i>
									</div>
									<div class="media-body" style="vertical-align: bottom;">
									<h6 class="media-heading text-semibold"><a href="#" class="text-default">Completed Activity</a></h6>
									</div>

									<hr style="margin-top: 10px;margin-bottom: 10px;"  />
									<div class="row text-center">
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> <?= $complete_issue_count['todaycnt']; ?></h6>
										<span class="text-muted text-size-small">Today</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> <?= $complete_issue_count['monthcnt']; ?></h6>
										<span class="text-muted text-size-small">Month</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="content-group">
										<h6 class="text-semibold no-margin"><i class="icon-calendar position-left text-slate"></i> <?= $complete_issue_count['allcnt']; ?></h6>
										<span class="text-muted text-size-small">All</span>
										</div>
									</div>
									</div>

								</div>
								</div>
							</div>
							</div>
							<hr  style="margin-top: 10px;margin-bottom: 10px;" />
							<div class="row">

								<div class="row" id="all_activity_filter">                  
								<form method="post" class="form-horizontal" id="get_data_form">
									<div class="col-md-6">
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">From<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">To<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
									</div> 
										<div class="col-md-2">
										<div class="form-group">
											<select class="form-control" name="status">
												<option value="">Select Status</option>
												<option value="pending">Pending</option>                                
												<option value="completed">Complete</option>
												<option value="in_progress">In Progress</option>
											</select>
										</div>
										</div>
									<div class="col-md-1">  
											<button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
									</div>
									<div class="col-md-1">  
											<span id="loader_gif"></span>
									</div>                     
									</form> 
								</div>    

								<div class="row" id="reschedule_activity_filter" style="display: none;">                  
								<form method="post" class="form-horizontal" id="reschedule_data_form">
									<div class="col-md-6">
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">From<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="start_date" id="start_date2" placeholder="Please select start date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">To<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="end_date" id="end_date2" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
									</div> 
									<div class="col-md-1">  
										<button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
									</div>
									<div class="col-md-1">  
										<span id="loader_gif2"></span>
									</div>                     
									</form> 
								</div>  

								<div class="row" id="completed_activity_filter" style="display: none;">                  
								<form method="post" class="form-horizontal" id="complete_data_form">
									<div class="col-md-6">
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">From<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="start_date" id="start_date3" placeholder="Please select start date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
										<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">To<span style="color: red;">*</span></label>
											<div class="col-sm-9">
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="text" class="form-control" name="end_date" id="end_date3" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
												</div>
											</div>
										</div>
										</div>
									</div> 
									<div class="col-md-1">  
										<button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
									</div>
									<div class="col-md-1">  
											<span id="loader_gif3"></span>
									</div>                     
									</form> 
								</div>  
							</div>     
							</div> 
					</div>					
				</div>
			-->


				<div id="all_activity_view" style="margin-top: 2%;">
					<?php
					$pending_cnt = count($issue_list_array);
					// $quotient = (int)($pending_cnt/2); style="border: 3px solid #18AA2C;"
					?>
					<div class="panel panel-flat">
						<table class="table datatable-basic1" id="default_issue_table">
							<tbody>
								<?php
								for ($i = 0; $i < $pending_cnt; $i++) {
								?>
									<tr>
										<td class="hidden"></td>
										<td class="hidden"><a href="#"></a></td>
										<td class="hidden"></td>
										<td class="hidden"></td>
										<td style="width:100%;background-color: #ffffff;">
											<div class="row">
												<?php
												$ticket_no_1 = $issue_list_array[$i]['ticket_no'];
												$issue_1 = $issue_list_array[$i]['issue'];
												$check_1 = $issue_list_array[$i]['check'];
												$company_name_1 = $issue_list_array[$i]['company_name'];
												$created_date_1 = $issue_list_array[$i]['schedule_date'];
												$created_on = $issue_list_array[$i]['created_date'];
												$priority = $issue_list_array[$i]['priority'];
												$status_remark = $issue_list_array[$i]['status_remark'];
												$query_1 = $issue_list_array[$i]['query_id'];
												$product_name_1 = $issue_list_array[$i]['product_name'];
												$action_btn = $issue_list_array[$i]['action_btn'];
												?>
												<div class="col-md-6">
													<div class="panel" style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
														<div class="panel-body">
															<div class="row">
																<div class="col-sm-12">
																	<div class="row">
																		<div class="col-md-6" align="left">
																			<h6><a href="#">#<?= $ticket_no_1; ?></a></h6>
																		</div>
																		<div class="col-md-6" align="right">
																			<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_1; ?></h6>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_1; ?><br /> <i style="font-size: 10px;">Created on <?= $created_on ?></i></li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right">
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																					<?= $product_name_1 ?>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-alarm-check"></i>&nbsp;:
																					&nbsp;<?= $issue_list_array[$i]['scheduledatetime']; ?></li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																					<?= $priority; ?>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<ul class="list list-unstyled">
																		<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1; ?></li>
																	</ul>
																	<div class="row">
																		<div class="col-md-12" align="left">
																			<ul class="list list-unstyled">
																				<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1; ?></span></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="panel-footer">
															<ul>
																<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_list_array[$i]['scheduledatetime']; ?></span></li>
															</ul>

															<ul class="pull-right">
																<li class="dropdown">
																	<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																	<?= $action_btn; ?>
																</li>
																<li>
																	<!-- $issue_list_array[$i]['status']; -->
																	<ul class="list list-unstyled ">
																		<li class="dropdown"><?= $status_remark ?></li>
																	</ul>
																</li>
																<li><a id="<?= $ticket_no_1 ?>" onclick="remark_list_pending(this.id)"><i class="icon-eye"></i></a></li>
																<li <?= $DeleteClass; ?>><a id="<?= $query_1 ?>" onclick="delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
															</ul>

														</div>
													</div>
												</div>
												<?php
												$record_cnt = $i + 1;
												if ($record_cnt < $pending_cnt) {
													$ticket_no_2 = $issue_list_array[$record_cnt]['ticket_no'];
													$issue_2 = $issue_list_array[$record_cnt]['issue'];
													$check_2 = $issue_list_array[$record_cnt]['check'];
													$company_name_2 = $issue_list_array[$record_cnt]['company_name'];
													$created_date_2 = $issue_list_array[$record_cnt]['schedule_date'];
													$created_on_2 = $issue_list_array[$record_cnt]['created_date'];
													$priority_2 = $issue_list_array[$record_cnt]['priority'];
													$status_remark_2 = $issue_list_array[$record_cnt]['status_remark'];
													$query_2 = $issue_list_array[$record_cnt]['query_id'];
													$ticket_no_2 = $issue_list_array[$record_cnt]['ticket_no'];
													$product_name_2 = $issue_list_array[$record_cnt]['product_name'];
													$action_btn_2 = $issue_list_array[$record_cnt]['action_btn'];

												?>
													<div class="col-md-6">
														<div class="panel " style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="row">
																			<div class="col-md-6" align="left">
																				<h6><a href="#">#<?= $ticket_no_2; ?></a></h6>
																			</div>
																			<div class="col-md-6" align="right">
																				<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_2; ?></h6>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_2; ?><br /> <i style="font-size: 10px;">Created on <?= $created_on_2 ?></i></li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right">
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																						<?= $product_name_2 ?>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-alarm-check"></i>&nbsp;:
																						&nbsp;<?= $issue_list_array[$record_cnt]['scheduledatetime']; ?></li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																						<?= $priority_2; ?>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<ul class="list list-unstyled">
																			<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_2; ?></li>
																		</ul>
																		<div class="row">
																			<div class="col-md-12" align="left">
																				<ul class="list list-unstyled">
																					<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_2; ?></span></li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel-footer">
																<ul>
																	<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_list_array[$record_cnt]['scheduledatetime']; ?></span>
																	</li>
																</ul>
																<ul class="pull-right">
																	<li class="dropdown">
																		<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																		<?= $action_btn_2; ?>
																	</li>
																	<li>
																		<!-- $issue_list_array[$record_cnt]['status']; -->
																		<ul class="list list-unstyled ">
																			<li class="dropdown"><?= $status_remark_2 ?></li>
																		</ul>
																	</li>
																	<li><a id="<?= $ticket_no_2 ?>" onclick="remark_list_pending(this.id)"><i class="icon-eye"></i></a></li>
																	<li <?= $DeleteClass; ?>><a id="<?= $query_2 ?>" onclick="delete_activity(this.id)"><i class="icon-trash" style="color: red;"></i></a></li>
																</ul>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</td>
										<td class="hidden">22 Jun 1972</td>
									</tr>
								<?php
									$i = $record_cnt;
								}
								?>
							</tbody>
						</table>
						<div id="all_activity_filter_table"></div>
					</div>
				</div>

				<!--  Reschedule List -->
				<div id="reschedule_issue_view" style="display: none;">
					<?php
					$reschedule_cnt = count($reschedule_issue_list);
					?>
					<div class="panel panel-flat" style="border: 3px solid #FF6E53;">
						<table class="table datatable-basic" id="reschedule_issue_table">
							<tbody>
								<?php
								for ($j = 0; $j < $reschedule_cnt; $j++) {
								?>
									<tr>
										<td class="hidden"></td>
										<td class="hidden"><a href="#"></a></td>
										<td class="hidden"></td>
										<td class="hidden"></td>
										<td style="width:100%;background-color: #EDECEC;">
											<div class="row">
												<?php
												$ticket_no_1_reschedule = $reschedule_issue_list[$j]['ticket_no'];
												$issue_1_reschedule = $reschedule_issue_list[$j]['issue'];
												$check_1_reschedule = $reschedule_issue_list[$j]['check'];
												$company_name_1_reschedule = $reschedule_issue_list[$j]['company_name'];
												$created_date_1_reschedule = $reschedule_issue_list[$j]['schedule_date'];
												$created_on_3 = $reschedule_issue_list[$j]['created_date'];
												$priority_reschedule = $reschedule_issue_list[$j]['priority'];
												$query_1_reschedule = $reschedule_issue_list[$j]['query_id'];
												$product_name_3 = $reschedule_issue_list[$j]['product_name'];

												?>
												<div class="col-md-6">
													<div class="panel " style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
														<div class="panel-body">
															<div class="row">
																<div class="col-sm-12">
																	<div class="row">
																		<div class="col-md-6" align="left">
																			<h6><a href="#">#<?= $ticket_no_1_reschedule; ?></a></h6>
																		</div>
																		<div class="col-md-6" align="right">
																			<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_1_reschedule; ?></h6>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_1_reschedule; ?>
																					<br /> <i style="font-size: 10px;">Created on <?= $created_on_3 ?></i>
																				</li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right">
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																					<?= $product_name_3 ?>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-alarm-check"></i>&nbsp;:
																					&nbsp;<?= $reschedule_issue_list[$j]['scheduledatetime']; ?></li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																					<?= $priority_reschedule; ?>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<ul class="list list-unstyled">
																		<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1_reschedule; ?></li>
																	</ul>
																	<div class="row">
																		<div class="col-md-12" align="left">
																			<ul class="list list-unstyled">
																				<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1_reschedule; ?></span></li>
																			</ul>
																		</div>
																	</div>
																</div>

															</div>
														</div>
														<div class="panel-footer">
															<ul>
																<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $reschedule_issue_list[$j]['scheduledatetime']; ?></span>
																</li>
															</ul>
															<ul class="pull-right">
																<li><?= $reschedule_issue_list[$j]['status']; ?></li>

																<li><a id="<?= $ticket_no_1_reschedule ?>" onclick="remark_list(this.id)"><i class="icon-eye"></i></a></li>

															</ul>
														</div>
													</div>
												</div>
												<?php

												$record_cnt_reschedule = $j + 1;
												if ($record_cnt_reschedule < $reschedule_cnt) {
													$ticket_no_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['ticket_no'];
													$issue_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['issue'];
													$check_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['check'];
													$company_name_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['company_name'];
													$created_date_2_reschedule = $reschedule_issue_list[$record_cnt_reschedule]['schedule_date'];
													$created_on_4 = $reschedule_issue_list[$record_cnt_reschedule]['created_date'];
													$priority_2_reschedule = $reschedule_issue_list[$j]['priority'];
													$product_name_3_2 = $reschedule_issue_list[$record_cnt_reschedule]['product_name'];

												?>
													<div class="col-md-6">
														<div class="panel border-left-lg border-left-success" style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12">

																		<div class="row">
																			<div class="col-md-6" align="left">
																				<h6><a href="#">#<?= $ticket_no_2_reschedule; ?></a></h6>
																			</div>
																			<div class="col-md-6" align="right">
																				<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_2_reschedule; ?></h6>
																			</div>
																		</div>

																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-calendar"></i>&nbsp;:
																						&nbsp;<?= $created_date_2_reschedule; ?><br /> <i style="font-size: 10px;">Created on <?= $created_on_4 ?></i></li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right">
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																						<?= $product_name_3_2 ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-alarm-check"></i>&nbsp;:
																						&nbsp;<?= $reschedule_issue_list[$record_cnt_reschedule]['scheduledatetime']; ?>
																					</li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																						<?= $priority_2_reschedule; ?>
																					</li>
																				</ul>
																			</div>
																		</div>


																		<ul class="list list-unstyled">
																			<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_2_reschedule; ?></li>
																		</ul>
																		<div class="row">
																			<div class="col-md-12" align="left">
																				<ul class="list list-unstyled">
																					<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_2_reschedule; ?></span></li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel-footer">
																<ul>
																	<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $reschedule_issue_list[$record_cnt_reschedule]['scheduledatetime']; ?></span>
																	</li>
																</ul>
																<ul class="pull-right">
																	<li><?= $reschedule_issue_list[$record_cnt_reschedule]['status']; ?></li>
																	<li><a id="<?= $ticket_no_2_reschedule ?>" onclick="remark_list(this.id)"><i class="icon-eye"></i></a></li>

																</ul>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</td>
										<td class="hidden">22 Jun 1972</td>
									</tr>
								<?php
									$j = $record_cnt_reschedule;
								} ?>
							</tbody>
						</table>
						<div id="reschedule_filter_table"></div>
					</div>
				</div>


				<div id="complete_issue_view" style="display: none;">
					<?php
					$complete_cnt = count($complete_issue_list);
					?>
					<div class="panel panel-flat" style="border: 3px solid #00BBD1;">
						<table class="table datatable-basic" id="complete_issue_table">
							<tbody>
								<?php
								for ($k = 0; $k < $complete_cnt; $k++) {
								?>
									<tr>
										<td class="hidden"></td>
										<td class="hidden"><a href="#"></a></td>
										<td class="hidden"></td>
										<td class="hidden"></td>
										<td style="width:100%;background-color: #EDECEC;">
											<div class="row">
												<?php
												$ticket_no_1_complete = $complete_issue_list[$k]['ticket_no'];
												$issue_1_complete = $complete_issue_list[$k]['issue'];
												$check_1_complete = $complete_issue_list[$k]['check'];
												$company_name_1_complete = $complete_issue_list[$k]['company_name'];
												$created_date_1_complete = $complete_issue_list[$k]['schedule_date'];
												$created_on_5 = $complete_issue_list[$k]['created_date'];
												$priority_complete = $complete_issue_list[$k]['priority'];
												$query_1_complete = $complete_issue_list[$k]['query_id'];
												$ticket_no_1_complete = $complete_issue_list[$k]['ticket_no'];
												$product_name_complete = $complete_issue_list[$k]['product_name'];
												?>
												<div class="col-md-6">
													<div class="panel" style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
														<div class="panel-body">
															<div class="row">
																<div class="col-sm-12">

																	<div class="row">
																		<div class="col-md-6" align="left">
																			<h6><a href="#">#<?= $ticket_no_1_complete; ?></a></h6>
																		</div>
																		<div class="col-md-6" align="right">
																			<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_1_complete; ?></h6>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-calendar"></i>&nbsp;:
																					&nbsp;<?= $created_date_1_complete; ?><br /> <i style="font-size: 10px;">Created
																						on <?= $created_on_5 ?></i></li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right">
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																					<?= $product_name_complete ?>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6" align="left">
																			<ul class="list list-unstyled">
																				<li><i class="icon-alarm-check"></i>&nbsp;:
																					&nbsp;<?= $complete_issue_list[$k]['scheduledatetime']; ?></li>
																			</ul>
																		</div>
																		<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																			<ul class="list list-unstyled ">
																				<li class="dropdown">
																					<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																					<?= $priority_complete; ?>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<ul class="list list-unstyled">
																		<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_1_complete; ?></li>
																	</ul>
																	<div class="row">
																		<div class="col-md-12" align="left">
																			<ul class="list list-unstyled">
																				<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_1_complete; ?></span></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="panel-footer">
															<ul>
																<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $complete_issue_list[$k]['scheduledatetime']; ?></span></li>
															</ul>
															<ul class="pull-right">
																<li><?= $complete_issue_list[$k]['status']; ?></li>

																<li><a id="<?= $ticket_no_1_complete ?>" onclick="remark_list(this.id)"><i class="icon-eye"></i></a></li>

															</ul>
														</div>
													</div>
												</div>

												<?php

												$record_cnt_complete = $k + 1;
												if ($record_cnt_complete < $complete_cnt) {
													$ticket_no_2_complete = $complete_issue_list[$record_cnt_complete]['ticket_no'];
													$issue_2_complete = $complete_issue_list[$record_cnt_complete]['issue'];
													$check_2_complete = $complete_issue_list[$record_cnt_complete]['check'];
													$company_name_2_complete = $complete_issue_list[$record_cnt_complete]['company_name'];
													$created_date_2_complete = $complete_issue_list[$record_cnt_complete]['schedule_date'];
													$created_on_6 = $complete_issue_list[$record_cnt_complete]['created_date'];
													$priority_2_complete = $complete_issue_list[$record_cnt_complete]['priority'];
													$query_2_complete = $complete_issue_list[$record_cnt_complete]['query_id'];
													$product_name_complete_2 = $complete_issue_list[$record_cnt_complete]['product_name'];
												?>
													<div class="col-md-6">
														<div class="panel " style="box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);">
															<div class="panel-body">
																<div class="row">
																	<div class="col-sm-12">


																		<div class="row">
																			<div class="col-md-6" align="left">
																				<h6><a href="#">#<?= $ticket_no_2_complete; ?></a></h6>
																			</div>
																			<div class="col-md-6" align="right">
																				<h6><i class=" icon-user-tie"></i>&nbsp;: &nbsp;<?= $check_2_complete; ?></h6>
																			</div>
																		</div>

																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-calendar"></i>&nbsp;: &nbsp;<?= $created_date_2_complete; ?>
																						<br /> <i style="font-size: 10px;">Created on <?= $created_on_6 ?></i>
																					</li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right">
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
																						<?= $product_name_complete_2 ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6" align="left">
																				<ul class="list list-unstyled">
																					<li><i class="icon-alarm-check"></i>&nbsp;:
																						&nbsp;<?= $complete_issue_list[$record_cnt_complete]['scheduledatetime']; ?>
																					</li>
																				</ul>
																			</div>
																			<div class="col-md-6" align="right" <?= $ChangePriorityClass; ?>>
																				<ul class="list list-unstyled ">
																					<li class="dropdown">
																						<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
																						<?= $priority_2_complete; ?>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<ul class="list list-unstyled">
																			<li><i class=" icon-office"></i>&nbsp;: &nbsp;<?= $company_name_2_complete; ?></li>
																		</ul>
																		<div class="row">
																			<div class="col-md-12" align="left">
																				<ul class="list list-unstyled">
																					<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $issue_2_complete; ?></span></li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel-footer">
																<ul>
																	<li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $complete_issue_list[$record_cnt_complete]['scheduledatetime']; ?></span>
																	</li>
																</ul>
																<ul class="pull-right">
																	<li><?= $complete_issue_list[$record_cnt_complete]['status']; ?></li>
																	<li><a id="<?= $ticket_no_2_complete ?>" onclick="remark_list(this.id)"><i class="icon-eye"></i></a></li>


																</ul>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</td>
										<td class="hidden">22 Jun 1972</td>
									</tr>
								<?php
									$k = $record_cnt_complete;
								}
								?>
							</tbody>
						</table>
						<div id="complete_filter_table"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	<!-- Footer -->
	<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
	<!-- /footer -->

	<style type="text/css">
		.optionGroup {
			font-weight: bold !important;
			/*color:red;*/
			font-style: italic !important;
			font-size: 16px;
		}

		.optionChild {
			padding-left: 30px !important;
		}
	</style>
	<div id="schedule_model" class="modal fade" style="top: 15px;" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title"> Add Activity</h6>
				</div>

				<div class="modal-body" style="overflow-y: auto; max-height: 550px;">
					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="col-md-12">
								<form class="form-horizontal" id="schedule_addForm">
									<div class="row">
										<div class="form-group">
											<label class="control-label col-sm-2" for="Youtube">Company Name <span
													style="color: red;">*</span></label>
											<div class="col-sm-4">
												<select class="select-search" name="customer_id" id="customer_id">
													<option value="">Select Company</option>
													<?php
							foreach ($customer_list as $value) { ?>
													<option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
														(<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
													<?php  } ?>
												</select>
											</div>
											<label class="control-label col-sm-2" for="Youtube">Product Name <span
													style="color: red;">*</span></label>
											<div class="col-sm-4">
												<select class="select-search" name="product_id" id="product_id">
													<option value="">Select Product</option>
													<?php
							foreach ($product_list as $value1) { ?>
													<option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
													<?php  } ?>
												</select>
											</div>
											<!-- </div> -->
										</div>
										<?php
					$user_sess_type = $this->session->user_type;
					if ($this->session->user_type != "SA") {
						$emp_id = $this->session->id;
						$name_emp = $this->session->name;
					} else {
						$emp_id = '';
					}
					?>
										<input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>"
											readonly>
										<div class="form-group">
											
											<label class="control-label col-sm-2" for="email">Schedule Date <span
													style="color: red;">*</span></label>
											<div class="col-sm-4">                                           
												<div class="input-group date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
													<input type="date" class="form-control schedule_date_select" id="schedule_date" name="schedule_date"
													value="<?= date('d M Y'); ?>" placeholder="Enter Schedule Date" onchange="getassignedissue()" autocomplete="off" style="padding: 0px 15px;">
												</div>
											</div>
											<label class="control-label col-sm-2" for="Youtube">Employee Name <span
													style="color: red;">*</span></label>
											<div class="col-sm-4">
												<select class="select-search" name="employee_id" id="employee_id" onchange="getassignedissue()">
													<option value="">Select Employee</option>
													<?php
														foreach ($employee_list as $value2) {
														$all_emp_id = $value2->id;
														if ($all_emp_id == $emp_id) { 
													?>
													<option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
													<?php } else { ?>
													<option value="<?= $value2->id ?>"><?= $value2->name ?></option>
													<?php } } ?>
												</select>
											</div>
										</div>










										<div class="form-group" id="issuelistdetails" style="display: none">
											<label class="control-label col-sm-2" for="Youtube">Assign issue list</label>
											<div class="col-sm-10" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">

											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-2" for="Youtube">Start Time <span
													style="color: red;">*</span></label>
											<div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
												<input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time"
													value="" placeholder="Please select start time" onchange="mainInfo1()"
													onclick="document.getElementById('err3').innerHTML='' " autocomplete="off">
												<span id="err3" style="color:red; font-size: 12px;"></span>
											</div>
											<label class="control-label col-sm-2" for="Youtube">End Time <span
													style="color: red;">*</span></label>
											<div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
												<input type="text" class="form-control" id="schedule_end_time" name="schedule_end_time" value=""
													placeholder="Please select end time" onchange="mainInfo1()"
													onclick="document.getElementById('err4').innerHTML='' " autocomplete="off">
												<span id="err4" style="color:red; font-size: 12px;"></span>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-2" for="Youtube">Schedule Type <span
													style="color: red;">*</span></label>
											<div class="col-sm-10">
												<select class="form-control" name="schedule_type_id" id="schedule_type_id">
													<option value="">Select Schedule Type</option>
													<?php   foreach ($schedule_visit_list as $st_value) { ?>
													<option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
													<?php  } ?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-2" for="email">Comments <span
													style="color: red;">*</span></label>
											<div class="col-sm-10">
												<textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter Comments"
													maxlength="500"></textarea>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
												Add Activity <i class="icon-arrow-right14 position-right"></i>
											</button>
										</div>
										<div class="col-sm-1">
											<div id="preview"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ===================================================================================== -->
	<div id="upload_schedule_documents2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #00619F;color: white;padding: 13px; height: 55px;">
					<button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title" style="margin-top: -4px">
						<i class="icon-upload" style="zoom:1.1; "></i>
						&nbsp;Upload Documents
					</h5>
				</div>
				<div class="modal-body" style="padding: 10px;">

				</div>
			</div>
		</div>
	</div>


	<!--=============================== Assign task modal (ADMIN SIDE) ================================ -->

	<div id="modal_default" class="modal fade" style="top: 15px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Assign Task</h6>
				</div>

				<div class="modal-body">
					<div id="user_model_data">

					</div>
				</div>

			</div>
		</div>
	</div>
	<!--============================== Re-schedule ===========================================-->
	<div id="modal_default12" class="modal fade" style="top: 15px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Assign Task</h6>
				</div>

				<div class="modal-body">
					<div id="user_model_data12">

					</div>
				</div>

			</div>
		</div>
	</div>
	<!--=============================== / Assign task modal (ADMIN SIDE) ================================ -->

	<!--=============================== Status Change modal (Employee SIDE) ================================ -->
	<div id="modal_status" class="modal fade" style="top: 15px;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Change Status</h6>
				</div>

				<div class="modal-body">
					<form class="form-horizontal" id="StatusForm">
						<div class="form-group">
							<label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
							<div class="col-sm-9">
								<textarea type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" maxlength="150"></textarea>
							</div>
						</div>
						<label class="control-label col-sm-3" for="email">Change Status <span style="color: red;">*</span></label>
						<div class="col-sm-9">
							<select name="status_update" class="form-control">
								<option value="">Select status</option>
								<option value="pending">Pending</option>
								<option value="in_progress">In progress</option>
								<option value="completed">Completed</option>
							</select>
						</div>
						<input type="hidden" id="qry_id" class="file-styled" name="query_id">
						<br>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<br>
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--=============================== Remark modal (Admin SIDE) ================================ -->
	<div id="modal_remark" class="modal fade" style="top: 15px;">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Issue details</h6>
				</div>
				<div class="modal-body" id="remark_model_data">

				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="reschedule_activity" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title"> Reshedule Activity</h6>
				</div>

				<div class="modal-body" style="overflow-y: auto; max-height: 550px;">
					<div id="reschedule_data">
						<div class="panel panel-flat">
							<div class="panel-body">
								<div class="col-md-12">
									<form class="form-horizontal" id="reschedule_form" method="POST" action="<?= base_url(); ?>admin/ScheduleManagement/ResheduleActivitySubmit">
										<input type="hidden" name="edit_id" id="edit_id">
										<input type="hidden" name="ticket_no" id="ticket_no_edit">
										<input type="hidden" name="assign_to" id="assign_to_edit">
										<input type="hidden" name="schedule_type_id" id="schedule_type_id_edit">
										<input type="hidden" name="customer_id" id="customer_id_data">
										<input type="hidden" name="product_id" id="product_id_data">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-sm-2" for="Youtube">Company Name <span style="color: red;">*</span></label>
												<div class="col-sm-4">
													<select class="select-search" name="customer_id" id="customer_id_edit" disabled>
														<option value="">Select Company</option>
														<?php
														foreach ($customer_list as $value) { ?>
															<option value="<?= $value->customer_id ?>"><?= $value->company_name ?>
																(<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
														<?php  } ?>
													</select>
												</div>
												<label class="control-label col-sm-2" for="Youtube">Product Name <span style="color: red;">*</span></label>
												<div class="col-sm-4">
													<select class="select-search" name="product_id" id="product_id_edit" disabled>
														<option value="">Select Product</option>
														<?php
														foreach ($product_list as $value1) { ?>
															<option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
														<?php  } ?>
													</select>
												</div>
												<!-- </div> -->
											</div>
											<?php
											$user_sess_type = $this->session->user_type;
											if ($this->session->user_type != "SA") {
												$emp_id = $this->session->id;
												$name_emp = $this->session->name;
											} else {
												$emp_id = '';
											}
											?>
											<input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
											<div class="form-group">
												<label class="control-label col-sm-2" for="Youtube">Employee Name <span style="color: red;">*</span></label>
												<div class="col-sm-4">
													<select class="select-search" name="employee_id" id="employee_id_edit" onchange="getassignedissue()" disabled>
														<option value="">Select Employee</option>
														<?php
														foreach ($employee_list as $value2) {
															// $ResheduleActivityData->assign_to = $value2->id;
															if ($ResheduleActivityData->assign_to == $value2->id) { ?>
																<option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
															<?php } else { ?>
																<option value="<?= $value2->id ?>"><?= $value2->name ?></option>
														<?php }
														} ?>
													</select>
												</div>
												<label class="control-label col-sm-2" for="email">Schedule Date <span style="color: red;">*</span></label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="schedule_date_edit" name="schedule_date" placeholder="Enter Schedule Date" onchange="getassignedissueResch()" autocomplete="off">
												</div>
											</div>


											<div class="form-group" id="issuelistdetails_edit" style="display: none">
												<label class="control-label col-sm-2" for="Youtube">Assign issue list</label>
												<div class="col-sm-10" id="issue_schedule_list_edit" style="max-height: 110px; overflow: auto;">

												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="Youtube">Start Time <span style="color: red;">*</span></label>
												<div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
													<input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time" value="" placeholder="Please select start time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' ">
													<span id="err3" style="color:red; font-size: 12px;"></span>
												</div>
												<label class="control-label col-sm-2" for="Youtube">End Time <span style="color: red;">*</span></label>
												<div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
													<input type="text" class="form-control" id="schedule_end_time" name="schedule_end_time" value="" placeholder="Please select end time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' ">
													<span id="err4" style="color:red; font-size: 12px;"></span>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
												<div class="col-sm-10">
													<select class="form-control" name="schedule_type_id" id="schedule_type_edit" disabled>
														<option value="">Select Schedule Type</option>
														<?php
														foreach ($schedule_visit_list as $st_value) { ?>
															<option value="<?= $st_value->id ?>" <?= $st = ($ResheduleActivityData->schedule_type_id == $st_value->id) ? 'selected' : ''; ?>>
																<?= $st_value->type_name ?></option>
														<?php  } ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-sm-2" for="email">Comments <span style="color: red;">*</span></label>
												<div class="col-sm-10">
													<textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter Comments" maxlength="500"></textarea>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-8">
												<button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
													Add Activity <i class="icon-arrow-right14 position-right"></i>
												</button>
											</div>
											<div class="col-sm-1">
												<div id="preview"></div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--  -->
	<!-- Modal -->
	<div class="modal fade" id="issue_details" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" id="bind_issue_data">

			</div>
		</div>
	</div>
	<!--  -->

	<div id="modal_billing" class="modal fade" style="top: 15px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div id="billing_model_data">

				</div>
			</div>
		</div>
	</div>

	<div id="modal_reschedule" class="modal fade" style="top: 15px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div id="reschedule_model_data">

				</div>
			</div>
		</div>
	</div>

	</div>
	<!-- /page container -->

	<script type="text/javascript">
		$('#schedule_date').change(function() {
			$('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_date');
		});

		$('#schedule_start_time').change(function() {
			$('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
		});

		$('#schedule_end_time').change(function() {
			$('#schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#schedule_addForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					customer_id: {
						validators: {
							notEmpty: {
								message: 'Please select Customer'
							}
						}
					},

					product_id: {
						validators: {
							notEmpty: {
								message: 'Please select product'
							}
						}
					},

					employee_id: {
						validators: {
							notEmpty: {
								message: 'Please select Employee'
							}
						}
					},

					schedule_date: {
						validators: {
							notEmpty: {
								message: 'Please select Schedule Date'
							}
						}
					},

					query: {
						validators: {
							notEmpty: {
								message: 'Please Enter Query'
							}
						}
					},

					schedule_start_time: {
						validators: {
							notEmpty: {
								message: 'Please select start time'
							}
						}
					},

					schedule_end_time: {
						validators: {
							notEmpty: {
								message: 'Please select end time'
							}
						}
					},

					schedule_type_id: {
						validators: {
							notEmpty: {
								message: 'Please select schedule type'
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
	</script>


	<script type="text/javascript">
		$(document).ready(function(e) {

			$("#schedule_addForm").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {
					$("#preview").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
					var formresult = new FormData(this);
					$.ajax({
						url: "<?php echo base_url('admin/Customer/add_schedule'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							// alert(data);

							$("#preview").hide();
							if (data == 1) {
								$(function() {
									new PNotify({
										title: 'Add Schedule',
										text: 'Schedule Submited Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
								}, 1000);
							} else if (data == 2) {
								var notice = new PNotify({
									title: 'Confirmation',
									text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
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
									$.ajax({
										url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
										type: "POST",
										data: formresult,
										contentType: false,
										cache: false,
										processData: false,
										success: function(data) {
											// alert(data);
											$(function() {
												new PNotify({
													title: 'Add Schedule',
													text: 'Schedule Submited Successfully',
													type: 'success'
												});
											});

											setTimeout(function() {
												window.location =
													"<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
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
		$('#employee_list').select2({
			placeholder: 'Select Employee List'
		});

		$(function() {
			$("#start_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
			$("#end_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
			$("#start_date2").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
			$("#end_date2").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
			$("#start_date3").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
			$("#end_date3").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "d M yy"
			});
		});
	</script>


	<script type="text/javascript">
		$(function() {
			$("#default_issue_table").DataTable({
				"language": {
					"emptyTable": "No Activity For Set Periods !!"
				},
				stateSave: true
			});
		});

		function Show_issue_list() {
			$('#reschedule_issue_view').hide();
			$('#complete_issue_view').hide();
			$('#all_activity_view').show();

			$('#pending_issue_list').css('border', '3px solid #08ad0f');
			$('#reschedule_issue_list').css('border', '1px solid #FF6F4C');
			$('#completed_issue_list').css('border', '1px solid #08ad0f');

			$('#completed_activity_filter').hide();
			$('#reschedule_activity_filter').hide();
			$('#all_activity_filter').show();

			animateCSS('#default_issue_table', 'zoomIn');
		}

		function Show_reschedule_list() {
			$('#reschedule_issue_view').show();
			$('#complete_issue_view').hide();
			$('#all_activity_view').hide();

			$('#reschedule_issue_list').css('border', '3px solid #FF6F4C');
			$('#pending_issue_list').css('border', '1px solid #08ad0f');
			$('#completed_issue_list').css('border', '1px solid #08ad0f');

			$('#completed_activity_filter').hide();
			$('#reschedule_activity_filter').show();
			$('#all_activity_filter').hide();

			animateCSS('#reschedule_issue_table', 'zoomIn');
		}

		function Show_Completed_list() {
			$('#complete_issue_view').show();
			$('#reschedule_issue_view').hide();
			$('#all_activity_view').hide();

			$('#completed_issue_list').css('border', '3px solid #00BBD1');
			$('#reschedule_issue_list').css('border', '1px solid #FF6F4C');
			$('#pending_issue_list').css('border', '1px solid #08ad0f');

			$('#completed_activity_filter').show();
			$('#reschedule_activity_filter').hide();
			$('#all_activity_filter').hide();

			animateCSS('#complete_issue_table', 'zoomIn');
		}
	</script>

	<script type="text/javascript">
		function animateCSS(element, animationName, callback) {
			const node = document.querySelector(element)
			node.classList.add('animated', animationName)

			function handleAnimationEnd() {
				node.classList.remove('animated', animationName)
				node.removeEventListener('animationend', handleAnimationEnd)

				if (typeof callback === 'function') callback()
			}
			node.addEventListener('animationend', handleAnimationEnd)
		}


		$(document).ready(function() {
			animateCSS('#default_issue_table', 'zoomIn');
		});
	</script>






	<script type="text/javascript">
		function get_val(val) {
			alert(val);
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#issue_list_grid').DataTable({
				"bProcessing": true,
				"serverSide": true,
				"displayLength": 5,
				"language": {
					"search": "Filter records:",
					"searchPlaceholder": "Search by Name"
				},
				"ajax": {
					url: "<?php echo base_url('admin/Customer/IssueAjaxData'); ?>",
					type: "post",
					error: function() {
						$("#issue_list_grid").css("display", "none");
					}
				}
			});
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function() {
			$('#reschedule_issue_list').DataTable({
				responsive: true,
				"bProcessing": true,
				"serverSide": true,
				"displayLength": 10,

				"language": {
					"search": "Filter records:",
					"searchPlaceholder": "Search by Name"
				},
				"ajax": {
					url: "<?php echo base_url('admin/Customer/RescheduleIssueAjaxData'); ?>",
					type: "post",
					error: function() {
						$("#reschedule_issue_list").css("display", "none");
					}
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#complete_issue_list').DataTable({
				responsive: true,
				"bProcessing": true,
				"serverSide": true,
				"displayLength": 10,
				"language": {
					"search": "Filter records:",
					"searchPlaceholder": "Search by Name"
				},


				columnDefs: [{
					width: 500,
					targets: 4
				}],
				// fixedColumns: true

				"ajax": {
					url: "<?php echo base_url('admin/Customer/CompleteIssueAjaxData'); ?>",
					type: "post",
					error: function() {
						$("#reschedule_issue_list").css("display", "none");
					}
				}
			});
		});
	</script>
<script language="javascript">
		$(document).ready(function() {


			$('#schedule_date').datetimepicker({

				format: 'DD MMMM, YYYY',
				maxDate: 'now',
				useCurrent: true,
				widgetPositioning: {
					vertical: 'top',
					horizontal: 'left'
				}
			});


			$("#schedule_date_edit").datepicker({
				dateFormat: "d MM yy",
				minDate: 0
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
	</script>

	<script type="text/javascript">
		function mainInfo1() {
			var start_date = $('#schedule_date').val();
			var startTime = document.getElementById("schedule_start_time").value;
			var endTime = document.getElementById("schedule_end_time").value;
			var newdate = new Date();
			newdate.setDate(newdate.getDate());
			const monthNames = ["January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			];
			var dd = newdate.getDate();
			var mm = newdate.getMonth();
			var y = newdate.getFullYear();
			const d = mm;
			var full_month = monthNames[d];
			var someFormattedDate = dd + ' ' + full_month + ' ' + y;
			if ((Date.parse(start_date) == Date.parse(someFormattedDate))) {
				var now = new Date();
				var curr_time = now.getHours() + ':' + now.getMinutes();
				if (startTime >= curr_time) {
					if (startTime >= endTime) {
						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Schedule',
							text: 'End time should be greater than Start time',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
					}
				} else {
					$('#desktopbutton').prop('disabled', true);
					new PNotify({
						title: 'Schedule',
						text: 'Selected timing is less then current time',
						type: 'warning'
					});
				}
			} else {
				var now = new Date();
				var curr_time = now.getHours() + ':' + now.getMinutes();
				if (startTime >= endTime) {
					$('#desktopbutton').prop('disabled', true);
					new PNotify({
						title: 'Schedule',
						text: 'End time should be greater than Start time',
						type: 'warning'
					});

				} else {
					$('#desktopbutton').prop('disabled', false);
				}
			}
		}
	</script>

	

	<script>
		function chenge_status_model(id) {
			$('#modal_status').modal('show');
			$('#status_model_data').html();
			// document.getElementById("qry_id").value=id;
			$("#qry_id").val(id);
		}
	</script>

	<script>
		function activate(id) {

			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to activate this product?</p>',
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
				var datastring = 'userid=' + id;
				// alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Product/activate'); ?>",
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
							window.location = "<?php echo base_url('admin/Product'); ?>";
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
		function del_interest(id) {

			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to delete this product?</p>',
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

				var datastring = 'userid=' + id;
				// alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Product/delete'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						//alert(data);
						$(function() {
							new PNotify({
								title: 'Delete Product',
								text: 'Deleted successfully',
								type: 'success'
							});
						});

						setTimeout(function() {
							window.location = "<?php echo base_url('admin/Product'); ?>";
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
		$(document).ready(function() {
			$('#StatusForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					fullname: {
						validators: {
							notEmpty: {
								message: 'Please Enter Full Name'
							}
						}
					},
					status_update: {
						validators: {
							notEmpty: {
								message: 'Please select status'
							}
						}
					},

					description: {
						validators: {
							notEmpty: {
								message: 'Please Enter Description'
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
	</script>

	<script type="text/javascript">
		$(document).ready(function(e) {
			$("#get_data_form").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {
					// alert('invalid');
					$('#default_issue_table').dataTable().fnClearTable();
					$('#default_issue_table').dataTable().fnDestroy();

					$("#default_issue_table").hide();
					$("#loader_gif").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
					);
					$("#loader_gif").show();

					$.ajax({
						url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_data'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$("#loader_gif").hide();
							$("#default_issue_table").hide();
							$("#all_activity_filter_table").show();
							$("#all_activity_filter_table").html(data);
							$('#ajax_table').DataTable();
							animateCSS('#all_activity_filter_table', 'zoomIn');
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
			$("#reschedule_data_form").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {
					$('#reschedule_issue_table').dataTable().fnClearTable();
					$('#reschedule_issue_table').dataTable().fnDestroy();
					$("#reschedule_issue_table").hide();

					$("#loader_gif2").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
					);
					$("#loader_gif2").show();

					$.ajax({
						url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_reschedule_data'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$("#loader_gif2").hide();
							$("#reschedule_issue_table").hide();

							$("#reschedule_filter_table").show();
							$("#reschedule_filter_table").html(data);

							$('#ajax_table_reschedule').DataTable();
							animateCSS('#reschedule_filter_table', 'zoomIn');
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
			$("#complete_data_form").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {

					$('#complete_issue_table').dataTable().fnClearTable();
					$('#complete_issue_table').dataTable().fnDestroy();

					$("#complete_issue_table").hide();
					$("#loader_gif3").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
					);
					$("#loader_gif3").show();

					$.ajax({
						url: "<?php echo base_url('admin/ScheduleManagement/get_daterange_completed_data'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							$("#loader_gif3").hide();
							$("#complete_issue_table").hide();
							$("#complete_filter_table").show();
							$("#complete_filter_table").html(data);
							$('#ajax_table_completed').DataTable();
							animateCSS('#complete_filter_table', 'zoomIn');
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
			$("#StatusForm2").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {
					$.ajax({
						url: "<?php echo base_url('admin/Customer/change_status'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							//alert(data);
							$(function() {
								new PNotify({
									title: 'Change Status',
									text: 'Status change  Successfully',
									type: 'success'
								});
							});

							setTimeout(function() {
								window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
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
		function assign_to(id) {
			var datastring = 'query_id=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/assign_task'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					// alert(data);
					$('#modal_default').modal('show');
					$('#user_model_data').html(data);

				},
				error: function() {
					alert('Error while request..');
				}
			});

		}
	</script>

	<script>
		function assign_to1(id) {
			var datastring = 'query_id=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/assign_task1'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					//alert(data);
					$('#modal_default12').modal('show');
					$('#user_model_data12').html(data);

				},
				error: function() {
					alert('Error while request..');
				}
			});

		}
	</script>

	<script>
		function Viewdetails(id) {
			var datastring = 'query_id=' + id;
			//alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/issue_detail'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					//alert(data);
					$('#modal_default1').modal('show');
					$('#user_model_data1').html(data);

				},
				error: function() {
					alert('Error while request..');
				}
			});

		}
	</script>

	<script>
		function remark_list(id) {
			var datastring = 'ticket_no=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/remark_list'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					// alert(data);
					PNotify.removeAll();
					$('#bind_issue_data').html(data);
					$('#issue_details').modal('show');
				},
				error: function() {
					alert('Error while request..');
				}
			});

		}

		function remark_list_pending(id) {
			var datastring = 'ticket_no=' + id;
			// alert(datastring);
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/remark_list_pending'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					// alert(data);
					PNotify.removeAll();
					$('#bind_issue_data').html(data);
					$('#issue_details').modal('show');
				},
				error: function() {
					alert('Error while request..');
				}
			});

		}

		function delete_activity(id) {

			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to delete this Activity?</p>',
				hide: false,
				type: 'warning',
				confirm: {
					confirm: true,
					buttons: [{
						text: 'Yes',
						addClass: 'btn-sm'
					}, {
						text: 'No',
						addClass: 'btn-sm'
					}]
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

				var datastring = 'query_id=' + id;
				// alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/ScheduleManagement/delete_activity'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						// alert(data);
						PNotify.removeAll();
						$(function() {
							new PNotify({
								title: 'Activity',
								text: 'Activity Deleted Successfully',
								type: 'success'
							});
						});
						$('#get_data_form').submit();
						// setTimeout(function()
						//  {
						//      window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
						//  }, 1000); 
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
		function bill_list(id) {
			var datastring = 'ticket_no=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/bill_list'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					PNotify.removeAll();
					$('#modal_billing').modal('show');
					$('#billing_model_data').html(data);
				},
				error: function() {
					alert('Error while request..');
				}
			});

		}
	</script>

	<script>
		function reschedule_list(id) {
			var datastring = 'query_id=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/reschedule_list'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					// alert(data);
					PNotify.removeAll();
					if (data == 0) {
						new PNotify({
							title: 'Remark',
							text: 'No re-schedule result',
							type: 'warning'
						});
					} else {
						$('#modal_reschedule').modal('show');
						$('#reschedule_model_data').html(data);
					}
				},
				error: function() {
					alert('Error while request..');
				}
			});

		}
	</script>

	<script>
		function getassignedissue() {
			schedule_date = $('#schedule_date').val();
			employee_id = $('#employee_id').val();
			if (employee_id != '') {
				var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + employee_id;
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
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
		}

		function getassignedissueResch() {
			schedule_date = $('#schedule_date_edit').val();
			emp_id = $('#assign_to_edit').val();
			if (emp_id != '') {
				var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + emp_id;
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						// alert(data);
						$('#issuelistdetails_edit').show();
						$('#issue_schedule_list_edit').html(data);
					},
					error: function() {
						alert('Error while request..');
					}
				});
				return false;
			}
		}


		$('#schedule_date').on('dp.change', function(e) {
			var schedule_date = $('#schedule_date').val();
			employee_id = $('#employee_id').val();
			if (employee_id != '') {
				var datastring = 'schedule_date=' + schedule_date + '&employee_id=' + employee_id;
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
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

		});
	</script>

	<script type="text/javascript">
		$('.clockpicker').clockpicker({
			placement: 'left',
			align: 'left',
			donetext: 'Done',
			minTime: '12:00' // 11:45:00 AM,
		});
	</script>

	<script>
		function priority_normal(id) {
			var datastring = 'query_id=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/priority_normal'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					PNotify.removeAll();
					$(function() {
						new PNotify({
							// title: 'priority Form',
							text: 'Priority change  Successfully',
							type: 'success'
						});
					});
					$('#get_data_form').submit();
					//  setTimeout(function()
					//    {
					//        window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
					//    }, 1000);


				},
				error: function() {
					alert('Error while request..');
				}
			});
			return false;

		}

		function priority_low(id) {
			var datastring = 'query_id=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/priority_low'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					PNotify.removeAll();
					$(function() {
						new PNotify({
							// title: 'priority Form',
							text: 'Priority change  Successfully',
							type: 'success'
						});
					});
					$('#get_data_form').submit();
					// setTimeout(function()
					//  {
					//      window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
					//  }, 1000);                  
				},
				error: function() {
					alert('Error while request..');
				}
			});
			return false;
		}


		function priority_high(id) {
			var datastring = 'query_id=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/priority_high'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					PNotify.removeAll();
					$(function() {
						new PNotify({
							// title: 'priority Form',
							text: 'Priority change  Successfully',
							type: 'success'
						});
					});
					$('#get_data_form').submit();
					//  setTimeout(function()
					//    {
					//        window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
					//    }, 1000);                  
				},
				error: function() {
					alert('Error while request..');
				}
			});
			return false;
		}

		function update_status(id, type) {
			//  alert(type+'=='+id); return false;
			var datastring = 'query_id=' + id + '&status_type=' + type;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/Customer/update_status_schedule'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					PNotify.removeAll();
					$(function() {
						new PNotify({
							title: 'Activity Status',
							text: 'Status Change Successfully',
							type: 'success'
						});
					});
					$('#get_data_form').submit();
					// setTimeout(function()
					// {
					//     window.location="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
					// }, 1000);                  
				},
				error: function() {
					alert('Error while request..');
				}
			});
			return false;
		}

		function Reshedule(id) {
			var datastring = 'query_id=' + id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivityData'); ?>",
				cache: false,
				data: datastring,
				success: function(data) {
					rsp = JSON.parse(data);
					tn = rsp.ticket_no;
					$('#reschedule_activity').modal('show');
					$("#edit_id").val(id);
					$("#ticket_no_edit").val(tn);
					$("#assign_to_edit").val(rsp.assign_to);
					$("#customer_id_data").val(rsp.customer_id);
					$("#product_id_data").val(rsp.product_id);
					$('#schedule_type_id_edit').val(rsp.schedule_type_id);
					$("#customer_id_edit").val(rsp.customer_id).change();
					$("#product_id_edit").val(rsp.product_id).change();
					$("#employee_id_edit").val(rsp.assign_to).change();
					$("#schedule_type_edit").val(rsp.schedule_type_id).change();
				},
				error: function() {
					alert('Error while request..');
				}
			});
			return false;
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#reschedule_form').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					schedule_date: {
						validators: {
							notEmpty: {
								message: 'Please select Schedule Date'
							}
						}
					},

					query: {
						validators: {
							notEmpty: {
								message: 'Please Enter Query'
							}
						}
					},

					schedule_start_time: {
						validators: {
							notEmpty: {
								message: 'Please select start time'
							}
						}
					},

					schedule_end_time: {
						validators: {
							notEmpty: {
								message: 'Please select end time'
							}
						}
					},

				}
			});
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function(e) {

			$("#reschedule_form").on('submit', (function(e) {
				//e.preventDefault();
				if (e.isDefaultPrevented()) {
					//alert('invalid');
				} else {
					$("#preview").html(
						'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
					var formresult = new FormData(this);
					$.ajax({
						url: "<?php echo base_url('admin/ScheduleManagement/ResheduleActivitySubmit'); ?>",
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data) {
							// alert(data);

							$("#preview").hide();
							if (data == 1) {
								$(function() {
									new PNotify({
										title: 'Re-Schedule',
										text: 'Re-Schedule Submited Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
								}, 1000);
							} else if (data == 2) {
								$(function() {
									new PNotify({
										title: 'Re-Schedule',
										text: 'overlapping',
										type: 'error'
									});
								});
							} else if (data == 0) {
								$(function() {
									new PNotify({
										title: 'Re-Schedule',
										text: 'Failed to submit',
										type: 'error'
									});
								});
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
	<script>
		var param1var = getQueryVariable("param1");

		function getQueryVariable(variable) {
			var key = window.location.search.substring(1);
			if (key == 'addschedule') {
				$("#schedule_model").modal({
					backdrop: "static"
				});
			}
		}
	</script>


	<script>
		function update_price(value) {
			// alert(value);
			PNotify.removeAll();
			var lastid = value.split("_").pop();
			var adm_approved_price = $('#admapprovedprice_' + lastid).val();
			var targettype_id = $('#targettypeid_' + lastid).val();
			var emp_set_price = $('#empsetprice_' + lastid).val();

			var id = $('#achieveid_' + lastid).val();


			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to Update the value ' + adm_approved_price + '</p>',
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
				// var adm_approved_price = $('#adm_approved_price').val();
				var datastring = 'achieve_id=' + id + '&adm_approved_price=' + adm_approved_price + '&targettype_id=' +
					targettype_id;
				alert(datastring);

				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Customer/update_price'); ?>",
					cache: false,
					data: datastring,
					success: function(data) {
						// alert(data);
						PNotify.removeAll();
						// if (data==0)
						// {
						new PNotify({
							title: 'Price Update',
							text: 'Price updated successfully',
							type: 'success'
						});

						// $('#bill_value').val(data);
						// }
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

		function activate_price(value) {
			var lastid = value.split("_").pop();

			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to activate for update value </p>',
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
				document.getElementById("admapprovedprice_" + lastid).readOnly = false;
				$(".activateupdate_" + lastid).hide();
				$(".afteractivateupdate_" + lastid).show();
			})
			// On cancel
			notice.get().on('pnotify.cancel', function() {
				// alert('Oh ok. Chicken, I see.');
			});
		}
	</script>

</body>

</html>