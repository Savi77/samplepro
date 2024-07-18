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
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
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
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<!-- /theme JS files -->
	<style>
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
											<a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
											<a href="<?php echo base_url('admin/Dashboard/UserManagement'); ?>"> <span class="text-semibold">User Management</span></a>
											- Department / Designation
											List
										</h4>
									</div>

									<div class="heading-elements">
										<div class="heading-btn-group">
											<a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
										</div>
									</div>
								</div>
							</div>
							<!-- /page header -->
							<!-- Basic responsive configuration -->
							<div class="panel panel-flat">
								<div class="panel-heading table_header">
									<h5 class="panel-title" style="color:white">Department / Designation</h5>
									<div class="heading-elements">
										<td>
											<!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                        <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Client" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                      </a> -->
										</td>
									</div>
								</div>
								<div class="table-responsive ">
									<table class="table" id="example">
										<thead>
											<tr>
												<th>#</th>
												<th>Department</th>
												<th>Designation</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $count = 1;
											foreach ($get_data as $row) { ?>
												<tr>
													<td><?php echo $count ?></td>
													<td><?= $row->department_name ?></td>
													<td><?= $row->designation_name ?></td>
													<td class="text-center">
														<ul class="icons-list" style="display: flex;">
															<li <?= $EditClass; ?>><a data-toggle="modal" onclick="edit_client(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Department / Designation" data-placement="bottom"></i></span></a></li>

															<li <?= $DeleteClass; ?>><a onclick="del_client(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Department / Designation" data-placement="bottom"></i></span></a></li>

														</ul>
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

		</div>
		<!-- /basic responsive configuration -->

		<div id="interest_model" class="modal fade" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info" style="background-color:#009FDF;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h6 class="modal-title"><i class="icon-office position-left"></i>&nbsp;&nbsp; Add Department / Designation</h6>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" id="TypeForm">
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Department <span style="color: red;">*</span></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="department" name="department" placeholder="Enter department name" maxlength="50">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Designation <span style="color: red;">*</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter designation name" maxlength="50">
								</div>
								<div class="col-sm-1" style="padding: 0;">
									<button type="button" class="btn btn-success addButton" id="attachSupport"><i class="icon-add"></i></button>
								</div>
							</div>
							<div id="moreSupportUpload"></div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary pull-right">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
		<?php $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->
		<script>
			$('#example').DataTable({
				"language": {
					"search": "Filter:" + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0'
				}
			});
		</script>

		<!--=======================================  Validation login  ==========================================-->
		<script>
			var cheque_number = 1;
			$('#attachSupport').click(function() {
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
		<script type="text/javascript">
			$(document).ready(function() {
				$('#TypeForm').bootstrapValidator({
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
		</script>

		<!--======================================= / Validation login  ==========================================-->



		<script type="text/javascript">
			$(document).ready(function(e) {
				$("#TypeForm").on('submit', (function(e) {
					//e.preventDefault();
					if (e.isDefaultPrevented()) {
						//alert('invalid');
					} else {

						$.ajax({
							url: "<?= base_url(); ?>admin/Master/add_department_designation",
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {

								$(function() {
									new PNotify({
										title: 'Department / Designation',
										text: 'Added  Successfully',
										type: 'success'
									});
								});

								setTimeout(function() {
									window.location =
										"<?php echo base_url('admin/Master/department_designation'); ?>";
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



		<!--=======================================  delete Event  ==========================================-->

		<script>


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
					success: function(data) {
						// alert(data);
						$('#modal_default1').modal('show');
						$('#complaint_model_data1').html(data);

					},
					error: function() {
						alert('Error while request..');
					}
				});

			}

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
				notice.get().on('pnotify.confirm', function() {

					var datastring = 'dep_id=' + dep_id + '&deg_id=' + deg_id;
					// alert(datastring);return false;
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/deleteDepartmentDesignation'); ?>",
						cache: false,
						data: datastring,
						success: function(data) {
							//alert(data);
							$(function() {
								new PNotify({
									title: 'Delete Form',
									text: 'Deleted successfully',
									type: 'success'
								});
							});

							setTimeout(function() {
								window.location =
									"<?php echo base_url('admin/Master/department_designation'); ?>";
							}, 1000);


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
				//$('input[placeholder]').placeholderLabel();
			})
			$(document).ready(function() {
				$('textarea[placeholder]').placeholderLabel();
			})
		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-36251023-1']);
			_gaq.push(['_setDomainName', 'jqueryscript.net']);
			_gaq.push(['_trackPageview']);

			(function() {
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
				notice.get().on('pnotify.confirm', function() {

					var datastring = 'typeid=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/deactivate3'); ?>",
						cache: false,
						data: datastring,
						success: function(data) {
							// alert(data);
							$(function() {
								new PNotify({
									title: 'Confirmation Form',
									text: 'Inactive successfully',
									type: 'success'
								});
							});

							setTimeout(function() {
								window.location =
									"<?php echo base_url('admin/Master/department_designation'); ?>";
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
				notice.get().on('pnotify.confirm', function() {

					var datastring = 'typeid=' + id;
					// alert(datastring);
					$.ajax({
						type: "post",
						url: "<?php echo base_url('admin/Master/activate3'); ?>",
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
									"<?php echo base_url('admin/Master/department_designation'); ?>";
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


		<!--======================================= / Activate & Deactivate ==========================================-->


</body>

</html>