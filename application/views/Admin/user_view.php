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
		.img-sm {
			width: 50px !important;
			height: 50px !important;
		}

	</style>
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
        .navbar-brand>img {
    margin-top: -1.8rem !important;
}
		/* panel css end */

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
												class="text-semibold">Dashboard</span></a> - 
										<a href="<?php echo base_url('admin/Dashboard/UserManagement'); ?>"> <span
										class="text-semibold">User Management</span></a> -  Users List
									</h4>
								</div>
								<div class="heading-elements">
									<div class="heading-btn-group">
										<a onclick="open_user_view(this.id)" id="<?= count($array_users); ?>"
											class="btn btn-link btn-float has-text"><i
												class="icon-file-plus text-primary"></i><span>ADD</span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading table_header">
									<h5 class="panel-title" style="color:white">Users List</h5>
									<div class="heading-elements">

									</div>
								</div>
								<div class="table-responsive">
									<table class="table datatable-responsive table-striped">
										<thead>
											<tr>
												<!-- <th>#</th> -->
												<th>Employee Detail</th>
												<th>Email</th>
												<th>Mobile No.</th>
												<?php if ($this->session->user_type == "SA") { ?>
												<th>Status</th>
												<th class="text-center" style="width: 146px;">Actions</th>
												<?php } ?>
												<th class="hidden">Password</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$count = 1;
												foreach ($array_users as $row) {
													if (!empty($row['profile_img'])) {
														$file = base_url().'assets/admin/assets/images/users/'.$row['profile_img'];
													} else {
														$file = base_url().'assets/admin/assets/images/testimonial/dummy.png';
													}
												?>
											<tr>

												<td>
													<h2 class="table-avatar">
														<a href="<?= $file; ?>" target="_blank" class="avatar"><img
																alt="" src="<?= $file; ?>"></a>
														<a id="name"><?= $row['name'] ?>
															<span><?= $row['department_name'].' / '.$row['designation_name']?></span></a>
													</h2>
												</td>
												<td>
													<?= $row['email'] ?>
												</td>
												<td>
													<?= $row['mobile_no'] ?>
												</td>
												<?php if ($this->session->user_type == "SA") {
                                                    ?>
												<td>
													<?php if ($row['user_status'] == '1') { ?>
													<a data-popup="tooltip" title="" data-placement="bottom"
														data-original-title="Click for Inactive"
														onclick="cancel_verification(id)" id="<?= $row['id'] ?>"><span
															class="label label-success">Active</span></a>
													<?php } else { ?>

													<a data-popup="tooltip" title="" data-placement="bottom"
														data-original-title="Click for Activate"
														onclick="confirm_verification(id)" id="<?= $row['id'] ?>"><span
															class="label label-danger">Inactive</span></a>
													<?php } ?>
												</td>
												<td class="text-center" style="padding: 12px 7px; width: 146px;">
													<ul class="icons-list">

														<?php if ($row['update_permission'] == '1') { ?>
														<li><a onclick="cancel_approval(id)"
																id="<?= $row['id'] ?>"><span class="label bg-info"
																	style="line-height: 20px;"><i class="icon-hyperlink"
																		style="font-size: 12px;" data-toggle="tooltip"
																		title="Disable customer editing."
																		data-placement="bottom"></i></span></a></li>
														<?php } else { ?>
														<li><a onclick="update_approval(id)"
																id="<?= $row['id'] ?>"><span class="label bg-warning"
																	style="line-height: 20px;"><i class="icon-hyperlink"
																		style="font-size: 12px;" data-toggle="tooltip"
																		title="Enable customer editing"
																		data-placement="bottom"></i></span></a></li>
														<?php } ?>
														<!-- <li><a onclick="delete_user(id)" id="<?= $row['id'] ?>"><span class="label bg-danger" style="line-height: 20px;"><i class=" icon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete User" data-placement="bottom"></i></span></a></li> -->
														<li><a onclick="edit_user(id)" id="<?= $row['id'] ?>"><span
																	class="label bg-primary"
																	style="line-height: 20px;"><i
																		class="glyphicon glyphicon-edit"
																		style="font-size: 12px;" data-toggle="tooltip"
																		title="Edit User"
																		data-placement="bottom"></i></span></a></li>
														<?php if ($row['schedule_view'] == '1') { ?>
														<li><a onclick="cancel_login_permission(id)"
																id="<?= $row['id'] ?>"><span class="label bg-success"
																	style="line-height: 20px;"><i
																		class="icon-user-check" style="font-size: 12px;"
																		data-toggle="tooltip"
																		title="Disable Schedule View"
																		data-placement="bottom"></i></span></a></li>
														<?php } else { ?>
														<li><a onclick="update_login_permission(id)"
																id="<?= $row['id'] ?>"><span class="label bg-warning"
																	style="line-height: 20px;"><i class="icon-user-lock"
																		style="font-size: 12px;" data-toggle="tooltip"
																		title="Enable Schedule View"
																		data-placement="bottom"></i></span></a></li>
														<?php } ?>
													</ul>
												</td>
												<?php } ?>
												<td class="hidden"></td>
											</tr>
											<?php $count++;	} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
		<!-- /footer -->
		<!-- /basic responsive configuration -->
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
												<div class="media no-margin-top" style="margin-left: -11px;">
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

		<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header"
						style="background-color: #2196f3 ;color: white;padding: 13px; height: 55px;">
						<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
							data-dismiss="modal">&times;</button>
						<h5 class="modal-title" style="margin-top: -4px">
						<i class="icon-insert-template" style="zoom:1.1; "></i>
							&nbsp;Edit User
						</h5>
					</div>
					<div class="modal-body">
						<div id="user_model_data1">
						</div>
					</div>
				</div>
			</div>
		</div>

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

			function getDepartment() {
				var department = $("#department").val();
				$.ajax({
					url: "<?php echo base_url('admin/Users/getDepartmentId'); ?>",
					dataType: "html",
					type: "POST",
					data: {
						department: department
					},
					success: function (data) {
						$('#designation').html(data);
					}
				});
			}

		</script>
		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#imgInp").change(function () {
				readURL(this);
			});

		</script>

		<script type="text/javascript">
			var a = 0;
			//binds to onchange event of your input field
			$('#imgInp').bind('change', function () {

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

		</script>

		<script type="text/javascript">
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
		<script>
			function delete_user(id) {
				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to delete this User?</p>',
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
				notice.get().on('pnotify.confirm', function () {
					var datastring = 'user_id=' + id;
					//alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/user_delete'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Delete User',
									text: 'User deleted successfully',
									type: 'success'
								});
							});
							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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
		<script>
			function edit_user(id) {
				var datastring = 'usr_id=' + id;
				//alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/Users/edit_user'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						//alert(data);
						$('#modal_default1').modal('show');
						$('#user_model_data1').html(data);

					},
					error: function () {
						alert('Error while request..');
					}
				});

			}

		</script>

		<script>
			function open_user_view(count) {
				// alert(count);
				var no_of_user = $("#no_of_user").val();
				// alert(no_of_user);  
				if (no_of_user <= count) {
					$('#user_modal').modal('show');
				} else {
					$('#user_modal').modal('show');
					$(function () {
						new PNotify({
							title: 'User Restriction',
							text: 'Maximum No. of user has reached. Please ugrade plan or contact buroforce admin',
							type: 'warning',
							delay: 6000
						});
					});
				}
			}

		</script>

		<script type="text/javascript">
			var a = 0;
			//binds to onchange event of your input field
			$('#imgInp').bind('change', function () {

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
			function cancel_approval(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Do you want to disable the employee from editing customers detail?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/cancel_approval'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation',
									text: 'confirmation cancel successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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

			// Cancel verification -------------------------------

			function update_approval(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>This will enable the employee from editing the customers detail. Do you really want to continue?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/update_approval'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation',
									text: 'confirmation approved successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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

		<script>
			function cancel_login_permission(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Do you want to disable the employee from schedule view permission?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/cancel_login_permission'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation',
									text: 'confirmation cancel successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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

			// Cancel verification -------------------------------

			function update_login_permission(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>This will enable the employee to view all the schedule list. Do you really want to continue?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/update_login_permission'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							// alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation Form',
									text: 'confirmation approved successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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
		<script>
			function confirm_verification(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to verify this User?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/confirm_user'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation Form',
									text: 'User Confirm successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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

			// Cancel verification -------------------------------
			function cancel_verification(id) {

				var notice = new PNotify({
					title: 'Confirmation',
					text: '<p>Are you sure you want to un-verify this User?</p>',
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
				notice.get().on('pnotify.confirm', function () {

					var datastring = 'user_id=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Users/cancel_user'); ?>",
						cache: false,
						data: datastring,
						success: function (data) {
							//alert(data);
							$(function () {
								new PNotify({
									title: 'Confirmation Form',
									text: 'User confirmation cancel successfully',
									type: 'success'
								});
							});

							setTimeout(function () {
								window.location = "<?php echo base_url('admin/Users'); ?>";
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

</body>

</html>
