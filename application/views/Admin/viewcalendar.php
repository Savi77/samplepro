<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendar</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/calendar/fullcalendar.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>

	<!-- /theme JS files -->
	<style type="text/css">
		.content-group {
			margin-bottom: 0px !important;
		}
	</style>

	<style type="text/css">
		.fc-scroller {
			height: 100% !important;
		}

		a.fc-more {
			margin: 1px 5px;
			background-color: #43a047 !important;
			display: block;
			padding: 5px;
			text-align: center;
			border-radius: 2px;
			color: #fcfcfc !important;
			font-size: 12px;
		}


		.fc-year-main-table {
			border-spacing: 5px;
		}

		.fc td.fc-year-monthly-td,
		.fc td.fc-year-month-separator,
		.fc td.fc-year-month-border {
			border-color: transparent;
		}

		.fc-year-monthly-td {
			text-align: center;
		}

		.fc-year-month-border.fc-first {
			width: 0;
			max-width: 8px;
		}

		.fc-year-month-border.fc-last {
			width: 0;
			max-width: 8px;
		}

		.fc-year-month-separator {
			width: 8px;
		}

		.fc-year-view .fc-row table.fc-year-month-header {
			border-left: 1px solid #dddddd;
			border-right: 1px solid #dddddd;
		}

		.fc-year-monthly-name {
			margin-top: 16px;
			line-height: 24px;
		}

		.fc-year-monthly-name.fc-first {
			margin-top: 0;
		}

		.fc-year-monthly-name a {
			color: black;
			font-size: 1.2em;
			font-weight: bold;
			text-decoration: none;
		}

		.fc-year-monthly-footer {}

		.fc-year-view .fc-row .fc-bg table {
			/* missing borders */
			border-left: 1px solid #dddddd;
			border-right: 1px solid #dddddd;
		}

		.fc-year-view .fc-row.fc-last .fc-bg table {
			/* missing borders */
			border-bottom: 1px solid #dddddd;
		}

		.fc-year-view .fc-week-number-head.ui-widget-header,
		.fc-year-view .fc-day-header.ui-widget-header {
			/* non visible with 1px due to .fc-row:first-child table style */
			border-bottom-width: 2px;
		}

		.fc-year-view .fc-rigid.fc-row {
			/* fix: right and bottom borders hidden with overflow hidden */
			overflow: inherit;
		}

		.fc-year-view .fc-day-grid .fc-row {
			min-height: 42px;
			/* ensure that all rows are at least this tall */
		}

		.fc-year-view table {
			font-size: .9em;
		}

		.fc-ltr .fc-year-view .fc-day-number {
			text-align: right;
		}

		.fc-year-view td.fc-day-number {
			padding: 0 2px;
		}

		/* week numbers */

		.fc-year-view th.fc-week-number-head {
			font-size: 0.85em;
			font-weight: normal;
		}

		.fc-year-view .fc-week-number-head {
			max-width: 22px;
			overflow-x: hidden;
			vertical-align: middle;
		}

		.fc-year-view td.fc-week-number {
			text-align: center;
			border-left-width: 1px;
			border-left-style: solid;
			/* border-left-color: #dddddd; */
			font-size: 0.92em;
			font-weight: normal;
			padding-left: 2px;
		}

		/* events */

		.fc-year-view .fc-event {
			font-size: .76em;
			line-height: 1.15;
			text-align: left;
			border-radius: 2px;
		}

		.fc-year-view .fc-event-inner {
			white-space: nowrap;
			text-overflow: ellipsis;
		}

		.fc-year-view .fc-event-title {}

		.fc-year-view .fc-time {
			/* hide time in year view */
			display: none;
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
				<li><a href="index.html"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li>
			</ul>
			<ul class="breadcrumb-elements">
				<li><a href="<?= base_url('admin/ScheduleManagement/GridList'); ?>?addschedule"><i class="icon-calendar2 position-left"></i>Add Schedule</a></li>
                <li><a href="<?= base_url('admin/Customer'); ?>"><i class="icon-users4 position-left"></i>Customer List</a></li>
				<?php
				if ($this->session->user_type == 'SA') {
				?>
				<li><a href="<?= base_url('admin/Users'); ?>"><i class="icon-user-tie position-left"></i>Users</a></li>
			   <?php } ?>

			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
			</div>
		</div>
	</div> -->
	<!-- /page header -->
	<!-- Page container -->
	<div class="page-header-content">
		<div class="page-title1">
			&nbsp;
		</div>
	</div>
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<div class="content-wrapper">

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-white">
							<div class="container-fluid">
								<div class="row">
									<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-success-600 border-top border-top-success-600">
										<li class="">
											<a class="text-size-lg text-uppercase" data-toggle="tab" style="float: left;cursor: none;">
												<i class=" icon-calendar2"></i> <b>Calendar</b>
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active fade in has-padding" id="messages-tue">
											<div id='calendar'></div>
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
	<!-- /page content -->

	</div>
	<!-- /page container -->


	<div id="EditExpenseModalAll" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#00619F;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title"><i class="icon-drawer3" style="zoom:1.1; "></i>
						&nbsp; &nbsp;Activity Details</h6>
				</div>
				<div class="modal-body" style="border: 8px solid #d4d0d0;">
					<div id="complaint_model_data_all">

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="issue_details" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" id="bind_issue_data">

			</div>
		</div>
	</div>
	<!--  -->
	<!-- Footer -->
	<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
	<!-- /footer -->

</body>

<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?= date('Y-m-d') ?>',
			timezone: 'local',
			selectable: true,
			eventLimit: true,
			views: {
				month: {
					eventLimit: 3
				}
			},
			events: <?php echo json_encode($schedule_data); ?>,
			eventClick: function(calEvent, jsEvent, view) {
				// console.log('Event: ' + calEvent.title);
				show_event_data(calEvent.id);
				// remark_list(calEvent.id,calEvent.title);
				// console.log('Event: ' + calEvent.products[0].name);
			},
		});
	});

	function show_event_data(schedule_id) {
		var datastring = 'schedule_id=' + schedule_id;
		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/dashboard/eventdata'); ?>",
			data: datastring,
			success: function(data) {
				// alert(data);

				$('#EditExpenseModalAll').modal('show');
				$('#complaint_model_data_all').html(data);
			},
			error: function() {
				alert('Error while request..');
			}
		});
	}

	function remark_list(schedule_id, ticket_no) {
		var datastring = 'ticket_no=' + ticket_no;
		// alert(datastring);

		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/Customer/remark_list'); ?>",
			cache: false,
			data: datastring,
			success: function(data) {
				// alert(data);
				// PNotify.removeAll();           
				$('#bind_issue_data').html(data);
				$('#issue_details').modal('show');
			},
			error: function() {
				alert('Error while request..');
			}
		});

	}
</script>



</html>