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
.multiselect.btn-default,
.multiselect.btn-default.disabled {
    background-color: #fff;
    border-color: #ddd;
}

.btn-group>.btn,
.btn-group-vertical>.btn {
    position: relative;
    float: left;
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

.btn-group>.btn:first-child {
    margin-left: 0;
    width: 400px !important;
}

.modal-lg {
    width: 48% !important;
}

.col-sm-2 {
    width: 44.666667%;
}
	</style>
</head>

<body style="overflow-x: hidden;">

	<?php $this->load->view('Admin/includes/admin_header'); ?>



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
							<div class="modal-header bg-info" style="background-color:#009FDF;" data-backdrop="static" tabindex="-1" role="dialog">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h6 class="modal-title"><i class="icon-store2"></i>&nbsp;&nbsp;Add
									<?= $lead_data->lead_generate_id;?> </h6>
							</div>
							<div class="modal-body">
								<div class="row" id="Lead_edit">
									<form id="AddNewTaskActivity">
							
										<input type="hidden" value="<?=$task_id?>" name="task_id"></input>
										<input type="hidden" value="<?= $client_id['Client_id'] ?>" name="company_name" id="company_name"></input>
										<input type="hidden" name="projectName" id="projectName" value="<?= $project_name['pid']; ?>"></input>
							
							
										<div class="panel panel-flat">
											<div class="panel-body">
							
												<fieldset>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Company Name <sup style="color: red">*</sup></label>
																<input type="text" class="form-control" name="company_name_nouse"
																	id="company_name_nouse" value="<?= $main_list['pclient_name']; ?>" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Project Name<sup style="color: red">*</sup></label>
																<input type="text" class="form-control" name="projectNameNouse"
																	id="projectNameNouse" value="<?= $project_name['pname']; ?>" disabled></input>
							
															</div>
														</div>
													</div>
												</fieldset>
							
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
							
												<fieldset>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Employee Name <sup style="color: red">*</sup></label>
																<select class="form-control" name="employee_id" id="employee_id"
																	onchange="getassignedissue()">
																	<option value="">Select Employee</option>
																	<?php
																foreach ($employee_list as $value2) {
																	$all_emp_id = $value2->id;
																	if ($all_emp_id == $emp_id) { ?>
																	<option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option>
																	<?php } else { ?>
																	<option value="<?= $value2->id ?>"><?= $value2->name ?></option>
																	<?php }
																} ?>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Schedule Date <sup style="color: red">*</sup></label>
																<input type="text" class="form-control" id="schedule_date" name="schedule_date"
																	value="<?= date('d M Y'); ?>" placeholder="Enter Schedule Date"
																	onchange="getassignedissue()">
							
															</div>
														</div>
													</div>
												</fieldset>
							
												<fieldset>
							
												</fieldset>
							
												<div class="row">
													<div class="col-md-12">
														<div class="form-group" id="issuelistdetails" style="display: none">
															<label>Assign issue list</label>
															<div class="col-sm-12" id="issue_schedule_list"
																style="max-height: 110px; overflow: auto;">
							
															</div>
														</div>
													</div>
												</div>
							
												<fieldset>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-sm-2" for="Youtube">Start Time <span
																		style="color: red; padding-left: 6px !important;">*</span></label>
							
																<div class="col-sm-12 clockpicker" data-placement="left" data-align="top"
																	data-autoclose="true">
																	<input type="text" class="form-control" id="schedule_start_time"
																		name="schedule_start_time" value="" placeholder="Please select start time"
																		onchange="mainInfo1()"
																		onclick="document.getElementById('err3').innerHTML='' ">
																	<span id="err3" style="color:red; font-size: 12px;"></span>
																</div>
															</div>
														</div>
														<div class="col-md-6">
							
															<div class="form-group">
							
																<label class="control-label col-sm-2" for="Youtube">End Time <span
																		style="color: red; padding-left: 6px !important">*</span></label>
																<div class="col-sm-12 clockpicker" data-placement="left" data-align="top"
																	data-autoclose="true">
																	<input type="text" class="form-control" id="schedule_end_time"
																		name="schedule_end_time" value="" placeholder="Please select end time"
																		onchange="mainInfo1()"
																		onclick="document.getElementById('err4').innerHTML='' ">
																	<span id="err4" style="color:red; font-size: 12px;"></span>
																</div>
															</div>
												</fieldset>
							
							
												<fieldset>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-sm-2" for="Youtube">Schedule Type <span
																		style="color: red;">*</span></label>
																<div class="col-sm-12">
																	<select class="form-control" name="schedule_type" id="schedule_type">
																		<option value="">Select Schedule Type</option>
																		<?php
													  foreach ($schedule_visit_list as $st_value) { ?>
																		<option value="<?= $st_value->type_name ?>"><?= $st_value->type_name ?>
																		</option>
																		<?php  } ?>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-6">
							
															<div class="form-group">
																<label class="control-label col-sm-2" for="email">Comments <span
																		style="color: red;">*</span></label>
																<div class="col-sm-12">
																	<textarea class="form-control" rows="2" id="query" name="query"
																		placeholder="Enter Comments" maxlength="500"></textarea>
																</div>
															</div>
												</fieldset>
							
							
												<fieldset>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Task Name<sup style="color: red">*</sup></label>
																<input type="text" class="form-control" name="task_name" id="task_name"
																	value="<?= $project_name['pname']; ?>"></input>
							
															</div>
														</div>
													</div>
												</fieldset>
							
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary" style="margin: 5px;">Add<i
														class="icon-arrow-right14 position-right"></i></button>
												<span id="preview31"></span>
											</div>
							
							
											<br />
							
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
							


	



<script>
$(document).ready(function(e) {
    $("#AddNewTaskActivity").on('submit', (function(e) {
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
                url: "<?php echo base_url('admin/ProjectManagement/Insertact');?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    //alert(data);
                    $("#preview").hide();
                    if (data == 1) {
                        $(function() {
                            new PNotify({
                                title: 'Register Form',
                                text: 'Added  Successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location =
                                "<?php echo base_url('admin/ProjectManagement');?>";
                        }, 1000);
                    } else {

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
                                url: "<?php echo base_url('admin/ProjectManagement/reInsertact'); ?>",
                                type: "POST",
                                data: data,
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
                    alert('fail to add');
                }
            });
        }
        return false;

    }));
});
</script>



<!-- <script type="text/javascript">
	$(document).ready(function (e) {
		$("#AddNewTaskActivity").on('submit', (function (e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				// alert('invalid');
			} else {
				$("#preview31").show();
				$("#preview31").html(
					'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
				);
				//alert("da");
				$.ajax({
					url: "<?php echo base_url('admin/ProjectManagement/insertact');?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function (data) {
						alert(data);
						$("#preview31").hide();
						new PNotify({
							title: 'Update',
							text: 'Updated  Successfully',
							type: 'success'
						});

						setTimeout(function () {
							window.location =
								"<?php echo base_url('admin/ProjectManagement');?>";
						}, 1000);

					},
					error: function () {
						$(function () {
							new PNotify({
								title: 'Leads Transfer',
								text: 'Failed to load page',
								type: 'warning'
							});
						});
					}
				});
			}
			return false;

		}));
	});

</script> -->

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

<script language="javascript">
$(document).ready(function() {
    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });

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