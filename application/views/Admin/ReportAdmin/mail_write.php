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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
	<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>


	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_extension_colvis.js"></script>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>
	<!-- Core JS files -->
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/main/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?= base_url(); ?>assets/admin/global_assets/js/app.js"></script>
	<script src="<?= base_url(); ?>assets/admin/global_assets/js/demo_pages/mail_list_write.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<!-- /theme JS files -->
	<style type="text/css">
		.pickadate {
			z-index: 100000;
		}

		.modal {
			z-index: 20;
		}

		.modal-backdrop {
			z-index: 10;
		}

		​
	</style>
	<style type="text/css">
		.multiselect-container>li>a>label.checkbox {
			margin: -6px 12px;
		}

		.multiselect-container {
			min-width: 275px;
			max-height: 250px;
			overflow-y: auto;
		}

		.btn-group>.btn:first-child {
			margin-left: 0;
		}

		.help-block {
			color: #F44336 !important;
		}
	</style>
	<style>
		.dropdown-toggle::after {
			font-family: icomoon;
			display: inline-block;
			border: 0;
			vertical-align: middle;
			font-size: .6875rem;
			margin-left: .46875rem;
			line-height: 1;
			position: relative;
			content: "";
		}
	</style>
</head>

<body style="overflow-x: hidden;">
	<?php $this->load->view('Admin/includes/admin_header'); ?>
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Home</span></a> - Leads Opportunity
				</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->
	<div class="page-container">
		<div class="page-content">
			<?php $this->load->view('Admin/includes/sidebar'); ?>
			<div class="content-wrapper">

				<div class="panel panel-flat">
					<div class="panel-heading table_header">
						<h5 class="panel-title" style="color:white">Leads Opportunity List</h5>
					</div>
					<div class="d-md-flex align-items-md-start">
						<div class="flex-fill overflow-auto">
							<div class="card">
								<div class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2 rounded-top">
									<div class="text-center d-lg-none w-100">
										<button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-write">
											<i class="icon-circle-down2"></i>
										</button>
									</div>

									<div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-write">

										<div class="mt-3 mt-lg-0 mr-lg-3">
											<button type="button" class="btn bg-blue"><i class="icon-paperplane mr-2"></i> Send mail</button>
										</div>


										<div class="mt-3 mt-lg-0 mr-lg-3">
											<div class="btn-group">
												<button type="button" class="btn btn-light">
													<i class="icon-checkmark3"></i>
													<span class="d-none d-lg-inline-block ml-2">Save</span>
												</button>
												<button type="button" class="btn btn-light">
													<i class="icon-cross2"></i>
													<span class="d-none d-lg-inline-block ml-2">Cancel</span>
												</button>
												<div class="btn-group">
													<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></button>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item">Select all</a>
														<a href="#" class="dropdown-item">Select read</a>
														<a href="#" class="dropdown-item">Select unread</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item">Clear selection</a>
													</div>
												</div>
											</div>
										</div>

										<div class="navbar-text ml-lg-auto">12:49 pm</div>

										<div class="ml-lg-3 mb-3 mb-lg-0">
											<div class="btn-group">
												<button type="button" class="btn btn-light">
													<i class="icon-printer"></i>
													<span class="d-none d-lg-inline-block ml-2">Print</span>
												</button>
												<button type="button" class="btn btn-light">
													<i class="icon-new-tab2"></i>
													<span class="d-none d-lg-inline-block ml-2">Share</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- /action toolbar -->


								<!-- Mail details -->
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<td class="align-top py-0" style="width: 1%">
													<div class="py-2 mr-sm-3">To:</div>
												</td>
												<td class="align-top py-0">
													<div class="d-sm-flex flex-sm-wrap">
														<input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients">
														<ul class="list-inline list-inline-dotted text-nowrap pt-sm-2 pb-2 mb-0 ml-sm-3">
															<li class="list-inline-item"><a href="#">Copy</a></li>
															<li class="list-inline-item"><a href="#">Hidden copy</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td class="align-top py-0">
													<div class="py-2 mr-sm-3">Subject:</div>
												</td>
												<td class="align-top py-0">
													<input type="text" class="form-control py-2 px-0 border-0 rounded-0" placeholder="Add subject">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="card-body p-0">
									<div class="overflow-auto mw-100">
										<div class="summernote summernote-borderless">


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
</body>

</html>