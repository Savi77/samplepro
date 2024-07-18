  
   <style type="text/css">
	.navbar-brand > img 
	{
		margin-top: -0.8rem !important;
		/* height: 4rem !important;
		width: 4.5rem !important; */
	}

	.modal-header 
	{
		padding: 27px;
		border-bottom: 1px solid #ddd;
	}

	.nav-tabs.nav-tabs-bottom > li.active > a
	{
	   border-bottom-color: #fff !important;
	}

	.navigation > li ul li a 
	{
	    padding-left: 23px !important;
	}

  </style>
<?php
	    if($this->session->user_type=='SA') 
		{
			$u_type = "Super Admin";
			$SA_hidden ="display:none";
			$hidden = "";
		}
		else
		{
			if($this->session->schedule_view=='1') 
			{
				$u_type = "Employee";
				$hidden_master = "display:none";
				$hidden = "display:none";
			}
			else
			{
				$u_type = "Employee";
				$hidden = "display:none";
			}
		}
	
		$data = $this->db->get("tbl_web_logo")->row();		
		if ($data->logo_name_two != '') {
			$logoAdminUpdate = base_url().'assets/images/web_images/'.$data->logo_name_two;
		}

		
		if($GeofenceNotification == '' ){
			$NotificationCount = "0";
		}
		else{
		$NotificationCount=count($GeofenceNotification);
		}
		
		$this->db->select("priviledge_id,priviledge_key,status");
		$this->db->where('user_id',$_SESSION['id']);
		$this->db->where('module_id',1);
		$this->db->where('feature_id',7);
		$permissionDocument = $this->db->get("tbl_module_permission")->result();
		
		$this->db->select("priviledge_id,priviledge_key,status");
		$this->db->where('user_id',$_SESSION['id']);
		$this->db->where('module_id',1);
		$this->db->where('feature_id',34);
		$permissionCalender = $this->db->get("tbl_module_permission")->result();
		$ViewClassDoc='style="display:block";';
		$ViewClassCal='style="display:block";';

		foreach ($permissionDocument as $priviledgeDoc) 
		{
			$priviledge_key=$priviledgeDoc->priviledge_key;
			$status=$priviledgeDoc->status;
			if ($priviledge_key=='SHOWHIDE')
			{
				if($status==1)
				{
					$ViewClassDoc=' style="display:block"; ';
				} 
				else
				{
					$ViewClassDoc=' style="display:none"; ';   
				}
			} 
		}
		
		foreach ($permissionCalender as $priviledgeCal) 
		{
			$priviledge_key=$priviledgeCal->priviledge_key;
			$status=$priviledgeCal->status;
			if ($priviledge_key=='SHOWHIDE')
			{
				if($status==1)
				{
					$ViewClassCal=' style="display:block"; ';
				} 
				else
				{
					$ViewClassCal=' style="display:none"; ';   
				}
			} 
		}

		$this->db->join('tbl_currency','tbl_currency.currency_id = tbl_organisation.org_currency');
		$this->db->where('org_id',$_SESSION['org_id']);
		$orgData = $this->db->get('tbl_organisation')->row();
		
 ?>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
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
				<p class="navbar-text">
					<?php
						$this->db->where('org_id',$_SESSION['org_id']);
						$organsation_array = $this->db->get('tbl_organisation')->row();
						if (!empty($organsation_array)) {
					?>
						<span style="color: black;font-size: 15px;font-weight: 450;">Welcome <?= $organsation_array->org_cdomain; ?></span>
					<?php	}	?>
               	</p>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li style="margin-top: 3%;font-size: 15px;">
					Time Zone : <strong> <?= $orgData->org_timezone;?> </strong>
				</li>
				<li style="margin-top: 3%;font-size: 15px;margin-left: 10px;">
					Currency : <strong> <?= $orgData->currency_sign;?> </strong>
				</li>
               	 <li <?= $ViewClassDoc; ?> >
					<a  href="<?php echo base_url('admin/DocumentUpload/CreateDirectory');?>" title="Document Management System">
						<i class="icon-file-presentation" style="margin-top: 1rem;"></i>
					</a>
				</li>

                	<li <?= $ViewClassCal; ?> >
					<a  href="<?php echo base_url('admin/dashboard/viewcalendar');?>" title="Calendar View">
						<i class=" icon-calendar52" style="margin-top: 1rem;"></i>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class=" icon-bell3" style="margin-top: 1rem;"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400"><?=$NotificationCount;?></span>
					</a>
					
					<!-- <div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Geofence Notification							
						</div>
						<ul class="media-list dropdown-content-body">
							<?php 
							 foreach ($GeofenceNotification as $res) 
							 { 
							 	$image=$res->profile_img;
							 	if(empty($image))
							 	{
							 		$image='default.png';
							 	}
							 ?>	
								<li class="media">
		                            <div class="media-left">
		                            	<img src="<?= base_url() ?>assets/admin/assets/images/users/<?=$image;?>" class="img-circle img-sm" >
		                            </div>
									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold"><?= $res->name; ?></span>
											<span class="media-annotation pull-right"><?= date("d F, Y H:i",strtotime($res->date_created)); ?></span>
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
						<span><?= $_SESSION['name'];?></span>
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