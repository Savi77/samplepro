<style type="text/css">
  	.navbar-brand>img {
  		margin-top: -0.8rem !important;
  		/* height: 4rem !important;
		width: 4.5rem !important; */
  	}

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
  </style>
  <?php
	if ($this->session->user_type == 'SA') {
		$u_type = "Super Admin";
		$SA_hidden = "display:none";
		$hidden = "";
	} else {
		if ($this->session->schedule_view == '1') {
			$u_type = "Employee";
			$hidden_master = "display:none";
			$hidden = "display:none";
		} else {
			$u_type = "Employee";
			$hidden = "display:none";
		}
	}

	$data = $this->db->get("tbl_web_logo")->row();
	if ($data->logo_name_two != '') {
		$logoAdminUpdate = base_url() . 'assets/images/web_images/' . $data->logo_name_two;
	}

	//$NotificationCount = count($GeofenceNotification);

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id', $_SESSION['id']);
	$this->db->where('module_id', 1);
	$this->db->where('feature_id', 7);
	$permissionDocument = $this->db->get("tbl_module_permission")->result();

	$this->db->select("priviledge_id,priviledge_key,status");
	$this->db->where('user_id', $_SESSION['id']);
	$this->db->where('module_id', 1);
	$this->db->where('feature_id', 34);
	$permissionCalender = $this->db->get("tbl_module_permission")->result();
	$ViewClassDoc = 'style="display:block";';
	$ViewClassCal = 'style="display:block";';

	foreach ($permissionDocument as $priviledgeDoc) {
		$priviledge_key = $priviledgeDoc->priviledge_key;
		$status = $priviledgeDoc->status;
		if ($priviledge_key == 'SHOWHIDE') {
			if ($status == 1) {
				$ViewClassDoc = ' style="display:block"; ';
			} else {
				$ViewClassDoc = ' style="display:none"; ';
			}
		}
	}

	foreach ($permissionCalender as $priviledgeCal) {
		$priviledge_key = $priviledgeCal->priviledge_key;
		$status = $priviledgeCal->status;
		if ($priviledge_key == 'SHOWHIDE') {
			if ($status == 1) {
				$ViewClassCal = ' style="display:block"; ';
			} else {
				$ViewClassCal = ' style="display:none"; ';
			}
		}
	}

	$this->db->join('tbl_currency', 'tbl_currency.currency_id = tbl_organisation.org_currency');
	$this->db->where('org_id', $_SESSION['org_id']);
	$orgData = $this->db->get('tbl_organisation')->row();

	?>
  <style>
  	.add-new-popup-control .popup-dropdown {
  		position: absolute;
  		width: 22.5em;
  		top: 100%;
  		left: -2px;
  		border-radius: 4px;
  		background-color: #fff;
  		box-shadow: 0 3px 24px rgb(0 0 0 / 18%);
  		z-index: 50;
  	}

  	.popupUl {
  		padding: 0;
  		margin-top: 5px;
  	}

  	.add-new-popup-control .popup-dropdown li {
  		border-bottom: 1px solid #eceded;
  		list-style: none;
  		background-size: 10px;
  		background-position: 10px;
  		padding: 10px;
  		cursor: pointer;
  	}

  	.add-new-popup-control .popup-dropdown li:hover {
  		color: #fff !important;
  		font-size: 15px;
  		background-color: #009fdf;
  		background-size: 10px;
  		background-position: 10px;
  	}

  	.breadcrumb-elements>li>a {
  		display: block;
  		padding: 11px 15px;
  		color: #333333;
  	}
	  .ml-1{
		margin-left: 1px;
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
	
}
  </style>
  <!-- Main navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
  	<div class="navbar-header">
  		<a class="navbar-brand" href="<?= base_url('admin/dashboard/view_dashboard'); ?>">
  			<img src="<?= $logoAdminUpdate; ?>" alt="" style="width:150px;height:40px;margin-top: 20px;">
  		</a>

  		<ul class="nav navbar-nav visible-xs-block">
  			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
  			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
  		</ul>
  	</div>
  	<div class="navbar-collapse collapse" id="navbar-mobile">
  		<ul class="nav navbar-nav">
  			<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
  		</ul>
        

          
  		<div class="col-sm-6" id="test">
          <ul class="col-sm-1 breadcrumb text-left">
  			<!-- <li><a href="#"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li> -->
  			<li>
  				<div class="add-new-popup-control popup-control collapsed ember-view">
  					<img id="addBtn" src="<?php echo base_url(); ?>assets/icons/plus.svg" alt="" width="32" height="32" class="popup-toggle" style="cursor: pointer;">
  					<div class="popup-dropdown" id="popupDrop" style="display: none;">
  						<ul class="popupUl">
  							<!-- <a href="<?= base_url('admin/ScheduleManagement/GridList'); ?>?addschedule" style="color: black;" ><li><i class="icon-calendar2 position-left" ></i>Add Activity</li></a> -->
  							<a onclick="showactivity()" data-target="#schedule_model" style="color: black;" id="addactivity">
  								<li><i class="icon-calendar2 position-left"></i>Add Activity</li>
  							</a>
  							<a href="<?= base_url('admin/Customer'); ?>" style="color: black;">
  								<li><i class="icon-users4 position-left"></i>Contact List</li>
  							</a>
  							<?php if ($this->session->user_type == 'SA') {	?>
  								<a href="<?= base_url('admin/Users'); ?>" style="color: black;">
  									<li><i class="icon-user-tie position-left"></i>Users</li>
  								</a>
  							<?php } ?>
  						</ul>
  					</div>
  				</div>
  			</li>
  		</ul>
		  <div class="col-sm-4">
  			<p class="navbar-text1 text-right" style="color: black;font-size: 15px;font-weight: 450;">
  				<?php
					//$this->db->where('org_id',$_SESSION['org_id']);
					//$organsation_array = $this->db->get('tbl_organisation')->row();
					//if (!empty($organsation_array)) {
					//$organsation_array->org_cdomain;

					date_default_timezone_set('Asia/Calcutta');

					// 24-hour format of an hour without leading zeros (0 through 23)
					$Hour = date('G');

					if ($Hour >= 0 && $Hour < 12) {
						$str = "Good Morning ! ";
					} else if ($Hour >= 12 && $Hour < 18) {
						$str = "Good Afternoon ! ";
					} else if ($Hour >= 18 || $Hour < 22) {
						$str = "Good Evening ! ";
					} else if ($Hour >= 22 || $Hour < 24) {
						$str = "Good Night ! ";
					}
					?>
  				<span><?= $str; ?><?= $_SESSION['name']; ?> </span>
  			</p>
        
              <p class="text-center" style="color: grey;font-size: 11px;font-weight: 450; margin-top: -12px;"> <?= date('d F, Y / l'); ?></p>
		  </div>
			</div>
  		<ul class="nav navbar-nav navbar-right">
  			<!-- <li style="margin-top: 3%;font-size: 15px;">
					Time Zone : <strong> <?= $orgData->org_timezone; ?> </strong>
				</li>
				<li style="margin-top: 3%;font-size: 15px;margin-left: 10px;">
					Currency : <strong> <?= $orgData->currency_sign; ?> </strong>
				</li> -->
  			<!-- <li <?= $ViewClassDoc; ?>>
  				<a href="<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>" title="Document Management System">
  					<i class="icon-file-presentation" style="margin-top: 1rem;"></i>
  				</a>
  			</li>

  			<li <?= $ViewClassCal; ?>>
  				<a href="<?php echo base_url('admin/dashboard/viewcalendar'); ?>" title="Calendar View">
  					<i class=" icon-calendar52" style="margin-top: 1rem;"></i>
  				</a>
  			</li>
  			<li><a data-toggle="modal" data-target="#AddNotesModal"><i class="icon-design position-left"></i>Notes</a></li> -->

  			<li class="dropdown">
  				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  					<i class=" icon-bell3" style="margin-top: 0rem;"></i>
  					<span class="visible-xs-inline-block position-right">Messages</span>
  					<span class="badge bg-warning-400"><?= $NotificationCount; ?></span>
  				</a>

  				<!-- <div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Geofence Notification							
						</div>
						<ul class="media-list dropdown-content-body">
							<?php
							foreach ($GeofenceNotification as $res) {
								$image = $res->profile_img;
								if (empty($image)) {
									$image = 'default.png';
								}
							?>	
								<li class="media">
		                            <div class="media-left">
		                            	<img src="<?= base_url() ?>assets/admin/assets/images/users/<?= $image; ?>" class="img-circle img-sm" >
		                            </div>
									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold"><?= $res->name; ?></span>
											<span class="media-annotation pull-right"><?= date("d F, Y H:i", strtotime($res->date_created)); ?></span>
										</a>
										<span class="text-muted"><?= $res->company_name; ?></span>
									</div>
								</li>
						    <?php } ?>		
						</ul>
						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="" data-original-title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div> -->
  			</li>

  			<li class="dropdown dropdown-user">
  				<a class="dropdown-toggle" data-toggle="dropdown">
  					<img src="<?= base_url() ?>assets/admin/assets/images/user.png" alt="">
  					<span><?= $_SESSION['name']; ?></span>
  					<i class="caret"></i>
  				</a>
  				<ul class="dropdown-menu dropdown-menu-right">
  					<li><a href="<?= base_url('admin/dashboard/ViewMyProfile') ?>"><i class="icon-user-plus"></i> My profile</a></li>
  					<li><a href="<?= base_url('admin/Admin_authentication/logout') ?>"><i class="icon-switch2"></i> Logout</a></li>
  				</ul>
  			</li>
  		</ul>
  	</div>
  </div>
  <!-- /main navbar -->
  <div class="page-header">
  	<div class="breadcrumb-line breadcrumb-line-wide">
  		<ul class="breadcrumb">
  			<!-- <li><a href="#"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li> -->
  			<li>
  				<div class="add-new-popup-control popup-control collapsed ember-view">
  					<img id="addBtn" src="<?php echo base_url(); ?>assets/icons/plus.svg" alt="" width="32" height="32" class="popup-toggle" style="cursor: pointer; ">
  					<div class="popup-dropdown" id="popupDrop" style="display: none;">
  						<ul class="popupUl">
  							<!-- <a href="<?= base_url('admin/ScheduleManagement/GridList'); ?>?addschedule" style="color: black;" ><li><i class="icon-calendar2 position-left" ></i>Add Activity</li></a> -->
  							<a onclick="showactivity()" data-target="#schedule_model" style="color: black;" id="addactivity">
  								<li><i class="icon-calendar2 position-left"></i>Add Activity</li>
  							</a>
  							<a href="<?= base_url('admin/Customer'); ?>" style="color: black;">
  								<li><i class="icon-users4 position-left"></i>Contact List</li>
  							</a>
  							<?php if ($this->session->user_type == 'SA') {	?>
  								<a href="<?= base_url('admin/Users'); ?>" style="color: black;">
  									<li><i class="icon-user-tie position-left"></i>Users</li>
  								</a>
  							<?php } ?>
  						</ul>
  					</div>
  				</div>
  			</li>
  		</ul>
  		<ul class="breadcrumb-elements">

  			<!-- <li><a href="<?= base_url('admin/ScheduleManagement/GridList'); ?>?addschedule"><i class="icon-calendar2 position-left"></i>Add Schedule</a></li>

				<li><a href="<?= base_url('admin/Customer'); ?>"><i class="icon-users4 position-left"></i>Customer List</a></li>
				<li style="display: none;"><a href="<?= base_url('admin/Target'); ?>"><i class="icon-target position-left"></i>Target</a></li>
				<?php
				if ($this->session->user_type == 'SA') {
				?>
				<li><a href="<?= base_url('admin/Users'); ?>"><i class="icon-user-tie position-left"></i>Users</a></li>
			   <?php } ?> -->
  			<li><a data-toggle="modal" data-target="#AddNotesModal"><i class="icon-design position-left"></i>Notes</a></li>
  			<!-- <li style="padding: 10px 0px 10px;font-size: 16px;font-weight: 700;">Date : <?= date('d F, Y / l'); ?></li> -->
  			<!-- h:i:s A -->
  		</ul>
  	</div>
  </div>

  <div id="modal_default" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Add Activity</h6>
        </div>

        <div class="modal-body">
          <div id="activitydata">

          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
  	$(document).ready(function() {
  		$(document).on('click', "#addBtn", function() {
  			$("#popupDrop").toggle();
  		});
  		$("#popupDrop").hide();
  	});
  </script>

<script>
    function showactivity() {
	  //alert("dsda");
      $.ajax({
        type: "post",
        url: "<?php echo base_url('GlobalFunctions/AddActivity'); ?>",
        cache: false,
        success: function(data) {
          //alert(data);
		  $('#modal_default').modal('show');
          $('#activitydata').html(data);
        },
        error: function() {
          alert('Error while request..1');
        }
      });

    }
  </script>