<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Admin/includes/header'); ?>
  <!-- Global stylesheets -->

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
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/tasks_list.js"></script>
	<!-- /theme JS files -->

</head>


<body class="sidebar-xs">

  <!-- Main navbar -->
    <?php $this->load->view('Admin/includes/admin_header'); ?>
  <!-- /main navbar -->

  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
         <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Schedule List</span></h4>
      </div>
      <div class="heading-elements">
        <a href="#" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-folder-plus3"></i></b> Create Schedule</a>
      </div>
    </div>
  </div>
  <!-- /page header -->


  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main sidebar -->
       <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!-- /main sidebar -->


      <!-- Secondary sidebar -->
      <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content">

          <!-- Action buttons -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>Action buttons</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row">
                <div class="col-xs-6">
                  <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-git-branch"></i> <span>Branch</span></button>
                  <button class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-mail-read"></i> <span>Messages</span></button>
                </div>
                
                <div class="col-xs-6">
                  <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Statistics</span></button>
                  <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Users</span></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /action buttons -->
          <!-- Task navigation -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>Navigation</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>
            <div class="category-content no-padding">
              <ul class="navigation navigation-alt navigation-accordion">
                <li class="navigation-header">Actions</li>
                <li><a href="#"><i class="icon-googleplus5"></i> Create task</a></li>
                <li><a href="#"><i class="icon-portfolio"></i> Create project</a></li>
                <li><a href="#"><i class="icon-compose"></i> Edit task list</a></li>
                <li><a href="#"><i class="icon-user-plus"></i> Assign users <span class="label label-success">94 online</span></a></li>
                <li><a href="#"><i class="icon-collaboration"></i> Create team</a></li>
              </ul>
            </div>
          </div>
          <!-- /task navigation -->
        </div>
      </div>
      <!-- /secondary sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Task manager table -->
				<div class="panel panel-white">
					<table class="table tasks-list table-lg">
						<thead>
							<tr>
								<th>#</th>
								<th>Period</th>
				                <th>Task Description</th>
				                <th>Priority</th>
				                <th>Latest update</th>
				                <th>Status</th>
				                <th>Assigned users</th>
								<th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
				            </tr>
						</thead>
						<tbody>

							<tr>
								<td>#25</td>
								<td>Today</td>
				                <td>
				                	<div class="text-semibold"><a href="task_manager_detailed.html">New blog layout</a></div>
				                	<div class="text-muted">Grumbled ripely eternal </div>
				                </td>
				                <td>
				                	<div class="btn-group">
										<a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">Highest <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li class="active"><a href="#"><span class="status-mark position-left bg-danger"></span> Highest priority</a></li>
											<li><a href="#"><span class="status-mark position-left bg-info"></span> High priority</a></li>
											<li><a href="#"><span class="status-mark position-left bg-primary"></span> Normal priority</a></li>
											<li><a href="#"><span class="status-mark position-left bg-success"></span> Low priority</a></li>
										</ul>
									</div>
			                	</td>
				                <td>
				                	<div class="input-group input-group-transparent">
				                		<div class="input-group-addon"><i class="icon-calendar2 position-left"></i></div>
				                		<input type="text" class="form-control datepicker" value="22 January, 15">
				                	</div>
			                	</td>
				                <td>
				                	<select name="status" class="select" data-placeholder="Select status">
				                		<option value="open">Open</option>
				                		<option value="hold">On hold</option>
				                		<option value="resolved" selected="selected">Resolved</option>
				                		<option value="dublicate">Dublicate</option>
				                		<option value="invalid">Invalid</option>
				                		<option value="wontfix">Wontfix</option>
				                		<option value="closed">Closed</option>
				                	</select>
				                </td>
				                <td>
				                	<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
				                	<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
				                	<a href="#" class="text-default">&nbsp;<i class="icon-plus22"></i></a>
				                </td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#"><i class="icon-alarm-add"></i> Check in</a></li>
												<li><a href="#"><i class="icon-attachment"></i> Attach screenshot</a></li>
												<li><a href="#"><i class="icon-rotate-ccw2"></i> Reassign</a></li>
												<li class="divider"></li>
												<li><a href="#"><i class="icon-pencil7"></i> Edit task</a></li>
												<li><a href="#"><i class="icon-cross2"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
				            </tr>




						</tbody>
					</table>
				</div>
				<!-- /task manager table -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

    <!-- Footer -->
      <?php $this->load->view('Admin/includes/AdminFooter.php'); ?>
    <!-- /footer -->

	</div>
	<!-- /page container -->

</body>
</html>
