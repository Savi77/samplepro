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
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
	<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js">
	</script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript"
		src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
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
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>

	<style type="text/css">
		.nav-tabs.nav-tabs-bottom>li {
			margin-bottom: -4px;
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
			left: 0px !important;
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

	</style>

	<style type="text/css">
		.modal {
			z-index: 20;
		}

		.modal-backdrop {
			z-index: 10;
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
		}

  ?>

	<!-- Page container -->
	<div class="page-container">
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<div class="content-wrapper">
				<div class="row">
					<div class="row">
						<div class="col-md-12">
							<?php $this->load->view('Admin/includes/panel'); ?>
							<!-- Page header -->
							<div class="page-header">
								<div class="page-header-content">
									<div class="page-title">
										<h4>
											<i class="icon-arrow-left52 position-left"></i>
											<a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span
													class="text-semibold">Dashboard</span></a> -
											<a href="<?php echo base_url('admin/ProductSpecification/Product');?>"> <span
													class="text-semibold">Product Management</span></a> - HSN Code
										</h4>
									</div>
									<div class="heading-elements">
										<div class="heading-btn-group">
											<a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"
												<?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
										</div>
									</div>
								</div>
							</div>
							<!-- /page header -->
							<div class="panel panel-flat">
								<div class="panel-heading table_header">
									<h5 class="panel-title" style="color:white">HSN Code</h5>
								</div>
								<table class="table datatable-responsive">
									<thead>
										<tr>											<th>#</th>
											<th class="hidden">Name</th>
											<th>HSN Code</th>
											<th>HSN Description</th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
                    $count = 1;
                    foreach ($listdata as $row) {
                    ?>
										<tr>
											<td><?php echo $count ?></td>
											<td class="hidden"></td>
											<td><?= $row->hsn_code; ?></td>
											<td><?= $row->hsn_desc; ?></td>
											<td class="hidden"></td>
											<td class="hidden"></td>
											<td>
												<ul class="icons-list" style="display: flex;">
													<li <?= $EditClass; ?>><a data-toggle="modal" onclick="Edit(id)"
															id="<?= $row->hsn_id; ?>"><span class="label bg-success" style="line-height: 20px;"><i
																	class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip"
																	title="Edit" data-placement="bottom"></i></span></a></li>
													<li <?= $DeleteClass; ?>><a data-toggle="modal" onclick="Delete(id)"
															id="<?= $row->hsn_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i
																	class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip"
																	title="Delete" data-placement="bottom"></i></span></a></li>
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

	<div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
					<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
						data-dismiss="modal">&times;</button>
					<h5 class="modal-title" style="margin-top: -4px">
						<i class="icon-make-group" style="zoom:1.1; "></i>
						&nbsp;Add HSN Code
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

	<!--  -->

	<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info" style="background-color:#009FDF;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title"><i class="icon-make-group" style="zoom:1.1; "></i>
						&nbsp; &nbsp;Edit HSN Code</h6>
				</div>
				<div class="modal-body">
					<div id="complaint_model_data1">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
	<!-- /footer -->
	<script type="text/javascript">
		$(document).ready(function () {
			$('#addform').bootstrapValidator({
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

	</script>

	<script type="text/javascript">
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
						url: "<?php echo base_url('admin/HSNCode/Add'); ?>",
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
									title: 'Add HSN',
									text: 'Added Successfully !!',
									type: 'success'
								});
							});
							setTimeout(function () {
								window.location = "<?php echo base_url('admin/HSNCode'); ?>";
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


	<script>
		function Edit(hsn_id) {
			var datastring = 'hsn_id=' + hsn_id;
			$.ajax({
				type: "post",
				url: "<?php echo base_url('admin/HSNCode/Edit'); ?>",
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

	<script>
		function Delete(hsn_id) {
			var notice = new PNotify({
				title: 'Confirmation',
				text: '<p>Are you sure you want to delete this code ?</p>',
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

				var datastring = 'hsn_id=' + hsn_id;
				// alert(datastring);
				$.ajax({
					type: "post",
					url: "<?php echo base_url('admin/HSNCode/Delete'); ?>",
					cache: false,
					data: datastring,
					success: function (data) {
						// alert(data);
						$(function () {
							new PNotify({
								title: 'Delete HSN',
								text: 'Deleted successfully !!',
								type: 'success'
							});
						});

						setTimeout(function () {
							window.location = "<?php echo base_url('admin/HSNCode'); ?>";
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


</body>

</html>
