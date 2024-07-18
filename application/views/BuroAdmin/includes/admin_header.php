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
		/* border-bottom: 1px solid transparent; */
		border-bottom: 1px solid #ddd;
	}
	.nav-tabs.nav-tabs-bottom > li.active > a
	{
	   border-bottom-color: #fff !important;
	}
  </style>
	<?php
		$data = $this->db->get("tbl_web_logo")->row();
		if ($data->logo_name_two != '') {
			$file = base_url().'assets/images/web_images/'.$data->logo_name_two;
		}
	?>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= base_url('Dashboard'); ?>">
				<img src="<?= $file; ?>" alt="" style="width:150px;height:40px;margin-top: 20px;">	
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
					<!-- <span class="label bg-success-600" style="font-size: 12px;">
				    </span> -->
               </p>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url() ?>assets/admin/assets/images/user.png" alt="">
						<span><?= $_SESSION['name'];?></span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?= base_url('BA/Setting') ?>"><i class="icon-cog52"></i> Setting </a></li>
						<li><a href="<?= base_url('BA/Admin_authentication/logout') ?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->