<?php
    $this->db->where("emp_id", $this->session->id);
    $GetNotes =  $this->db->get("tbl_notes")->result();
 ?>

<style type="text/css">
	.page-title {
		padding: 18px 36px 30px 0;
		display: block;
		position: relative;
	}

	p {
		margin: 0 0 5px;
	}

	.page-header {
		border-top: 0px solid #ddd;
		/* border-bottom: 1px solid rgb(148, 140, 140); */
		padding: 0;
	}


	.border-panel {
		border-bottom: 1px solid rgb(148, 140, 140);

	}

	.navbar {
		border-bottom: 1px solid transparent;
		-ms-flex-align: stretch;
		align-items: stretch;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-ms-flex-negative: 0;
		flex-shrink: 0;
		line-height: 1.5715;
		background-color: #009fdf;
		position: fixed;
	}

	/* logo alignment common css */
	.navbar-brand>img {
		margin-top: -1.8rem !important;
	}

	/*  */

	.modal-header {
		padding: 27px;
		border-bottom: 1px solid #ddd;
	}

	.nav-tabs.nav-tabs-bottom>li.active>a {
		border-bottom-color: #fff !important;
	}

	.navigation>li ul li a {
		padding-left: 23px !important;
	}

	.modal {
		display: none;
		overflow: hidden;
		position: fixed;
		top: 10%;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1050;
		-webkit-overflow-scrolling: touch;
		outline: 0;
		left: 13%;
	}

	.btn-link {
		color: #333333;
	}

	.btn-panel {
		display: inline-block;
		margin-bottom: 0;
		font-weight: normal;
		text-align: center;
		vertical-align: middle;
		touch-action: manipulation;
		cursor: pointer;
		background-image: none;
		border: 1px solid transparent;
		white-space: nowrap;
		padding: 7px 12px;
		font-size: 13.5px;
		line-height: 1.9;
		border-radius: 3px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	.page-header-content {
		position: relative;
		background-color: inherit;
		padding: 4px 0px;
	}

	.heading-elements .btn-float.btn-link {
		margin-top: -9.5px;
	}

	.heading-elements,
	.breadcrumb-elements {
		display: block;
	}

	.col-md-5 {
		width: 41.666667%;
		top: 20px !important;
	}

	.ml-1 {
		margin-left: -22px;
	}

	.col-md-5 {
		width: 41.666667%;
		top: 5px;
	}

	.table>thead>tr>th,
	.table>tbody>tr>th,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		padding: 14px 20px !important;
		line-height: 1.5384616;
		vertical-align: top;
		border-top: 1px solid #ddd;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	.heading-elements {
		background-color: inherit;
		top: 50%;
		right: 36px;
		height: 36px;
		position: inherit;
		margin-top: 12px;
	}

	.dropdown-menu {
		position: absolute;
		top: 100%;
		left: -122px;
		z-index: 1000;
		display: none;
		float: left;
		min-width: 160px;
		padding: 5px 0;
		margin: 2px 0 0;
		list-style: none;
		font-size: 13px;
		text-align: left;
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 3px;
		-webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
		box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
		background-clip: padding-box;
	}
</style>

<div class="page-header page-header-light">
	<div class="page-header-content header-elements-lg-inline">
		<div class="page-title d-flex">
			<h4><i class=""></i> <span class="font-weight-semibold"></span> Dashboard</h4>
			<a href="#" class="header-elements-toggle text-body d-lg-none"><i class=""></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">

				<div class="heading-elements">
					<div class="heading-btn" style="display: flex;">
						<div class="dropdown">
							<button class="btn bg-indigo-400 dropdown-toggle" type="button" data-toggle="dropdown"> <i
									class="icon-inbox mr-2"></i> <span class="caret"></span></button>
							<ul class="dropdown-menu" style="position: absolute;transform: translate3d(-56px, 36px, 0px);top: 0px;left: -46px;will-change: transform;">
								<li>
									<a href="<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail');?>" id="208" style="display:block" ;="">
										<i class="icon-share3" style="color: black;"></i> Bulk Mail
									</a>
								</li>
								<li>
									<a href="<?php echo base_url('admin/ReportAdmin/Reports/mail_write?id=compose');?>" id="208" style="display:block" ;="">
										<i class="icon-upload" style="color: black;"></i> Compose
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<a href="<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>"
					class="btn btn-link btn-float text-body"><i
						class="icon-file-presentation text-primary"></i><span>Documents</span></a>
				<a href="<?php echo base_url('admin/dashboard/viewcalendar'); ?>"
					class="btn btn-link btn-float text-body"><i class="icon-calendar52 text-primary"></i>
					<span>Calendar</span></a>
				<a a data-toggle="modal" data-target="#AddNotesModal" class="btn btn-link btn-float text-body"><i
						class="icon-design text-primary"></i>
					<span>Notes</span></a>

				
				
			</div>
		</div>
	</div>
</div>
<div class="page-header pt-1">
	<div class="page-header-content header-elements-lg-inline">
		<div class="page-title d-flex">
			<a href="#" class="header-elements-toggle text-body d-lg-none"><i class=""></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<p href="" class=""><i class=""></i><span style="font-size: 13px;font-weight: 700;">Date: 01 April, 2021
						- 31 March, 2022</span></p>

			</div>
		</div>
	</div>
</div>

<div id="AddNotesModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
				<button type="button" style="color: white;top: 25%;font-weight:600;" class="close"
					data-dismiss="modal">&times;</button>
				<h5 class="modal-title" style="margin-top: -1px">
					<i class="icon-design" style="zoom:1.1; "></i>
					&nbsp;Notes
				</h5>
			</div>
			<div class="modal-body">
				<form id="add_notes_form" method="post">
					<div class="panel panel-flat">
						<div class="panel-body">
							<fieldset>
								<div class="row">
									<div class="col-md-7">
										<table class="table">
											<thead>
												<tr role="row">
													<th class="sorting_asc" tabindex="0" aria-controls="example"
														rowspan="1" colspan="1" aria-sort="ascending"
														aria-label="#: activate to sort column descending"
														style="width: 98px;">#</th>
													<th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
														colspan="1"
														aria-label="Department: activate to sort column ascending"
														style="width: 354px;">Notes</th>
													<th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
														colspan="1"
														aria-label="Designation: activate to sort column ascending"
														style="width: 357px;">Action</th>

												</tr>
											</thead>
											<tbody>
												<?php
                                                $cnt = 1;
                                                foreach ($GetNotes as $row) {
                                                ?>
												<tr>
													<td style="width: 2%;"><?= $cnt; ?></td>
													<td style="width: 90%;"><?= $row->notes; ?></td>
													<td style="width: 10%;">
														<a onclick="edit_notes(id)" id="<?= $row->note_id; ?>"><span
																class="label bg-primary"
																style="line-height: 20px;  margin-left:-11px;"><i
																	class="glyphicon glyphicon-edit"
																	style="font-size: 12px;" data-toggle="tooltip"
																	title="Edit Location"
																	data-placement="bottom"></i></span></a>

														&Tab; &Tab; &Tab;
														<a onclick="del_notes(id)" id="<?= $row->note_id; ?>"><span
																class="label bg-danger" style="line-height: 20px;"><i
																	class="glyphicon glyphicon-trash"
																	style="font-size: 12px;" data-toggle="tooltip"
																	title="Delete Location"
																	data-placement="bottom"></i></span></a>
													</td>





												</tr>
												<?php $cnt++;
                                                } ?>
											</tbody>
										</table>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Add new note : <sup style="color: red">*</sup>
											</label>
											<textarea class="form-control" name="notes" rows="3"></textarea>
										</div>
										<div class="text-center">
											<button type="submit" class="btn-panel btn-primary">Save Note
												<i class="icon-arrow-right14 position-right"></i></button>
											<span id="preview"></span>
										</div>
									</div>
								</div>
							</fieldset>
							<br />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="EditNotes" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info" style="background-color:#00619F;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
					&nbsp; &nbsp;Edit Notes</h6>
			</div>
			<div class="modal-body" style="border: 8px solid #d4d0d0;">
				<div id="EditNotesModel">

				</div>
			</div>
		</div>
	</div>
</div>


<!-- <script>
  	$(document).ready(function() {
  		$(document).on('click', "#addBtn", function() {
  			$("#popupDrop").toggle();
  		});
  		$("#popupDrop").hide();
  	});
  </script> -->

<script>
	function showactivity() {
		//alert("dsda");
		$.ajax({
			type: "post",
			url: "<?php echo base_url('GlobalFunctions/AddActivity'); ?>",
			cache: false,
			success: function (data) {
				//alert(data);
				$('#modal_default').modal('show');
				$('#activitydata').html(data);
			},
			error: function () {
				alert('Error while request..1');
			}
		});

	}
</script>

<script type="text/javascript">
	function edit_notes(id) {
		var datastring = 'note_id=' + id;
		// alert(datastring);
		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/Dashboard/EditNotes'); ?>",
			data: datastring,
			success: function (data) {
				$('#EditNotes').modal('show');
				$('#EditNotesModel').html(data);
			},
			error: function () {
				alert('Error while request..');
			}
		});
	}
</script>