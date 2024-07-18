<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard</title>

		<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.13.1/lodash.min.js"></script>
		<!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
       <!-- /global stylesheets -->
    
        <!-- Core JS files -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script src="<?= base_url() ?>assets/drag/global_assets/js/main/bootstrap.bundle.min.js"></script>
        <!-- /core JS files -->
    
        <!-- Theme JS files -->
        <script src="<?= base_url() ?>assets/drag/global_assets/js/plugins/ui/dragula.min.js"></script>
        <script src="<?= base_url() ?>assets/drag/global_assets/js/plugins/uploaders/bs_custom_file_input.min.js"></script>
    
        <script src="<?= base_url() ?>assets/drag/assets/js/app.js"></script>
        <script src="<?= base_url() ?>assets/drag/global_assets/js/demo_pages/extension_dnd.js"></script>
        <!-- /theme JS files -->

		
		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
		<!-- /global stylesheets -->
		<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
		<!-- Core JS files -->
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
		<!-- <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script> -->
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
		<!-- /core JS files -->
		<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
		<script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
		<!-- Theme JS files -->
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
		
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts-3d.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/cylinder.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/funnel3d.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/exporting.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/export-data.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/data.js"></script>
		<script src="<?= base_url() ?>assets/admin/assets/js/highchart/drilldown.js"></script>

	<!-- /theme JS files -->
    <style type="text/css">   	
	.content-group 
	 {
	   margin-bottom: 0px !important; 
	 }
	.nav-tabs[class*=bg-] > .active > a
	 {
	   /*background-color: #3F51B5 !important; */
	 }
    </style>

    <style type="text/css">	 
		.card
		 {
		    margin-bottom: 1.875rem;
		    border: none;
		    border-radius: 0;
		    -webkit-box-shadow: 0 10px 40px 0 rgba(62,57,107,.07), 0 2px 9px 0 rgba(62,57,107,.06);
		    box-shadow: 0 10px 40px 0 rgba(62,57,107,.07), 0 2px 9px 0 rgba(62,57,107,.06);
		}
		.card 
		{
		    position: relative;
		    display: -webkit-box;
		    display: -webkit-flex;
		    display: -ms-flexbox;
		    display: flex;
		    -webkit-box-direction: normal;
		    -webkit-flex-direction: column;
		    -ms-flex-direction: column;
		    flex-direction: column;
		    min-width: 0;
		    word-wrap: break-word;
		    background-clip: border-box;
		    border: 1px solid rgba(0,0,0,.06);
		    border-radius: .25rem;
		}
		.card, .navbar-nav 
		{
		    display: -moz-box;
		    -webkit-box-orient: vertical;
		}
		.card, .card-footer, .card-header
		{
		    background-color: #FFF;
		}
		.align-items-stretch 
		{
		    -webkit-box-align: stretch!important;
		    -webkit-align-items: stretch!important;
		    -moz-box-align: stretch!important;
		    -ms-flex-align: stretch!important;
		    align-items: stretch!important;
		}
		.media
		{
		    display: flex;
		    -webkit-box-align: start;
		    -webkit-align-items: flex-start;
		    -moz-box-align: start;
		    -ms-flex-align: start;
		    align-items: flex-start;
		}
		.media, .progress-bar 
		{
		    display: -webkit-box;
		    display: -webkit-flex;
		    display: -moz-box;
		    display: -ms-flexbox;
		}
		.bg-primary.bg-darken-2, .btn-primary.btn-darken-2 
		{
		    background-color: #016769!important;
		}
		.text-center
		 {
		    text-align: center!important;
		}

		.font-large-2 
		{
		    font-size: 3rem!important;
		}
		.bg-gradient-x-primary 
		{
		    background-image: -webkit-gradient(linear,left top,right top,from(#006567),to(#00a6a9));
		    background-image: -webkit-linear-gradient(left,#006567 0,#00a6a9 100%);
		    background-image: -moz-linear-gradient(left,#006567 0,#00a6a9 100%);
		    background-image: -o-linear-gradient(left,#006567 0,#00a6a9 100%);
		    background-image: linear-gradient(to right,#006567 0,#00a6a9 100%);
		    background-repeat: repeat-x;
		}
		.white
		{
		    color: #FFF!important;
		}
		.media-body 
		{
		    -webkit-box-flex: 1;
		    -webkit-flex: 1;
		    -moz-box-flex: 1;
		    -ms-flex: 1;
		    flex: 1;
		}
		.p-2 
		{
		  padding: 2rem 2rem 0rem 1rem!important;
		}
		.text-bold-400 
		{
		    font-weight: 400;
		}
		.font-large-2
		{
		    font-size: 4rem!important;
		    margin-top: 1rem !important;
		}
		/**/
		.bg-danger.bg-darken-2, .btn-danger.btn-darken-2 
		{
		    background-color: #E53B3D!important;
		}
		.bg-danger 
		{
		    background-color: #d8001e!important;
		}
		.bg-gradient-x-danger
		 {
		    background-image: -webkit-gradient(linear,left top,right top,from(#E53B3D),to(#da6171));
		    background-image: -webkit-linear-gradient(left,#E53B3D 0,#da6171 100%);
		    background-image: -moz-linear-gradient(left,#E53B3D 0,#da6171 100%);
		    background-image: -o-linear-gradient(left,#E53B3D 0,#da6171 100%);
		    background-image: linear-gradient(to right,#E53B3D 0,#da6171 100%);
		    background-image: linear-gradient(to right,#E53B3D 0,#da6171 100%);
		    background-repeat: repeat-x;
		}
		/**/
		.bg-gradient-x-success
		 {
		    background-image: -webkit-gradient(linear,left top,right top,from(#11A578),to(#32EAB2));
		    background-image: -webkit-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: -moz-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: -o-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: linear-gradient(to right,#11A578 0,#32EAB2 100%);
		    background-repeat: repeat-x;
		}

		.bg-gradient-x-success
		{
		    background-image: -webkit-gradient(linear,left top,right top,from(#11A578),to(#32EAB2));
		    background-image: -webkit-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: -moz-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: -o-linear-gradient(left,#11A578 0,#32EAB2 100%);
		    background-image: linear-gradient(to right,#11A578 0,#32EAB2 100%);
		    background-repeat: repeat-x;
		}

		.bg-success.bg-darken-2, .btn-success.btn-darken-2
		{
		    background-color: #E53B3D!important;
		}

		.bg-success 
		{
		    background-color: #16D39A!important;
		}
	</style>
	<style type="text/css">
	   .p-2 
		{
		    padding: 3rem 5rem 2rem 3rem!important;
		}
	</style>
	<style type="text/css">
		
	.progress2
	{
	    width: 100px;
	    height: 100px;
	    line-height: 100px;
	    background: none;
	    margin: 0 auto;
	    box-shadow: none;
	    position: relative;
	}
	.progress2:after{
	    content: "";
	    width: 100%;
	    height: 100%;
	    border-radius: 50%;
	    border: 12px solid #fff;
	    position: absolute;
	    top: 0;
	    left: 0;
	}
	.progress2 > span{
	    width: 50%;
	    height: 100%;
	    overflow: hidden;
	    position: absolute;
	    top: 0;
	    z-index: 1;
	}
	.progress2 .progress2-left{
	    left: 0;
	}
	.progress2 .progress2-bar{
	    width: 100%;
	    height: 100%;
	    background: none;
	    border-width: 12px;
	    border-style: solid;
	    position: absolute;
	    top: 0;
	}
	.progress2 .progress2-left .progress2-bar{
	    left: 100%;
	    border-top-right-radius: 80px;
	    border-bottom-right-radius: 80px;
	    border-left: 0;
	    -webkit-transform-origin: center left;
	    transform-origin: center left;
	}
	.progress2 .progress2-right{
	    right: 0;
	}
	.progress2 .progress2-right .progress2-bar{
	    left: -100%;
	    border-top-left-radius: 80px;
	    border-bottom-left-radius: 80px;
	    border-right: 0;
	    -webkit-transform-origin: center right;
	    transform-origin: center right;
	    animation: loading-1 1.8s linear forwards;
	}
	.progress2 .progress2-value
	{
	    width: 90%;
	    height: 90%;
	    border-radius: 50%;
	    background: #44484b;
	    font-size: 24px;
	    color: #fff;
	    line-height: 110px;
	    text-align: center;
	    position: absolute;
	    top: 0%;
	    left: 5%;
	}
	.progress2.blue .progress2-bar{
	    border-color: #049dff;
	}
	.progress2.blue .progress2-left .progress2-bar{
	    animation: loading-2 1.5s linear forwards 1.8s;
	}
	.progress2.yellow .progress2-bar{
	    border-color: #fdba04;
	}
	.progress2.yellow .progress2-left .progress2-bar{
	    animation: loading-3 1s linear forwards 1.8s;
	}
	.progress2.pink .progress2-bar{
	    border-color: #ed687c;
	}
	.progress2.pink .progress2-left .progress2-bar{
	    animation: loading-4 0.4s linear forwards 1.8s;
	}
	.progress2.green .progress2-bar{
	    border-color: #469E4E;
	}
	.progress2.green .progress2-left .progress2-bar{
	    animation: loading-5 1.2s linear forwards 1.8s;
	}

	.progress2.teal .progress2-bar{
	    border-color: #00887A;
	}
	.progress2.teal .progress2-left .progress2-bar{
	    animation: loading-5 1.2s linear forwards 1.8s;
	}


	@keyframes loading-1{
	    0%{
	        -webkit-transform: rotate(0deg);
	        transform: rotate(0deg);
	    }
	    100%{
	        -webkit-transform: rotate(180deg);
	        transform: rotate(180deg);
	    }
	}
	@keyframes loading-2{
	    0%{
	        -webkit-transform: rotate(0deg);
	        transform: rotate(0deg);
	    }
	    100%{
	        -webkit-transform: rotate(144deg);
	        transform: rotate(144deg);
	    }
	}
	@keyframes loading-3{
	    0%{
	        -webkit-transform: rotate(0deg);
	        transform: rotate(0deg);
	    }
	    100%{
	        -webkit-transform: rotate(90deg);
	        transform: rotate(90deg);
	    }
	}
	@keyframes loading-4{
	    0%{
	        -webkit-transform: rotate(0deg);
	        transform: rotate(0deg);
	    }
	    100%{
	        -webkit-transform: rotate(36deg);
	        transform: rotate(36deg);
	    }
	}
	@keyframes loading-5{
	    0%{
	        -webkit-transform: rotate(0deg);
	        transform: rotate(0deg);
	    }
	    100%{
	        -webkit-transform: rotate(126deg);
	        transform: rotate(126deg);
	    }
	}
	@media only screen and (max-width: 990px)
	{
	    .progress2{ margin-bottom: 20px; }
	}

	</style>
	<style type="text/css">
	 .progress3-value {
	    width: 90%;
	    height: 90%;
	    border-radius: 50%;
	    background: #eff1f3;
	    font-size: 24px;
	    color: #150303;
	    line-height: 110px;
	    text-align: center;
	    position: absolute;
	    top: 0%;
	    left: 5%;
	}	

	</style>

	<style type="text/css">
		#container2 
		{
		  min-width: 300px; 
		  max-width: 400px;
		  margin: 0 auto;
		}
		#container2
		{
		  height: 300px; 
		}

		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
		 {
		    padding: 6px 19px !important;
		 }

	</style>

</head>
<body>

 <!--  Load header value -->
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->

	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li>
			</ul>
			<ul class="breadcrumb-elements">

				<li><a href="<?= base_url('admin/ScheduleManagement/GridList'); ?>?addschedule"><i class="icon-calendar2 position-left"></i>Add Schedule</a></li>

				<li><a href="<?= base_url('admin/Customer'); ?>"><i class="icon-users4 position-left"></i>Customer List</a></li>
				<li style="display: none;"><a href="<?= base_url('admin/Target'); ?>"><i class="icon-target position-left"></i>Target</a></li>
				<?php	
				 if($this->session->user_type=='SA') 
				  {
				  	?>
				<li><a href="<?= base_url('admin/Users'); ?>"><i class="icon-user-tie position-left"></i>Users</a></li>
			   <?php } ?>
				<li><a  data-toggle="modal" data-target="#AddNotesModal" ><i class="icon-design position-left"></i>Notes</a></li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class=" icon-home7 position-left"></i> <span class="text-semibold"></span> Dashboard</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
         <?php  $this->load->view('Admin/includes/sidebar'); ?>
  		  <div class="content-wrapper">
				<!-- card starts here.... -->
			<div class="mb-2">
				<div class="row">
					<div class="col-lg-12" id="cards-target-left">

						<div id="1">
					    
						<div class="card" id="Schedulesummary">
							<div class="card-header">
								<div class="panel-heading" style="background-color: #03BBD1;border-bottom-color: #ddd;color: white;font-weight:600;">
									<h6 class="panel-title" style="font-weight: 600;">SCHEDULE SUMMARY1</h6>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4">
								   <div class="col-xl-12">
										<div class="card">
											<div class="card-content">
												<div class="media align-items-stretch">
													<div class="p-2 text-center bg-danger bg-darken-2">
														<i class=" icon-calendar3 font-large-2 white"></i>
													</div>
													<div class="p-1 bg-gradient-x-danger white media-body">
														<h6>Today Count  &nbsp;&nbsp;:&nbsp;  <?= $ScheduleSummary['TodayCount']; ?> </h6>
														<h6>Month Count  &nbsp;:&nbsp;  <?= $ScheduleSummary['MonthCount']; ?> </h6>
														<h6>Year Count  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?= $ScheduleSummary['YearCount'];?> </h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8">
								   <div class="col-xl-12">
										<div class="col-md-3 col-sm-6">
											<a onclick="OpenScheduleSummary(this.id)" id="All">
											<div class="progress2 blue">
												<span class="progress2-left">
													<span class="progress2-bar"></span>
												</span>
												<span class="progress2-right">
													<span class="progress2-bar"></span>
												</span>
												<div class="progress2-value"><?= $ScheduleSummary['All'];?> </div>
											</div>
										   <div align="center"> <b style="font-weight:600;color: #009DFB;"> All </b></div>
										  </a>
										</div>
										<div class="col-md-3 col-sm-6">
										  <a onclick="OpenScheduleSummary(this.id)" id="Completed">	
											<div class="progress2 green">
												<span class="progress2-left">
													<span class="progress2-bar"></span>
												</span>
												<span class="progress2-right">
													<span class="progress2-bar"></span>
												</span>
												<div class="progress2-value"><?= $ScheduleSummary['Completed'];?> </div>
											</div>
											 <div align="center"> <b style="font-weight: 600;color: #499C54;"> Completed </b></div>
										  </a>   
										</div>
										<div class="col-md-3 col-sm-6">
										  <a onclick="OpenScheduleSummary(this.id)" id="Pending">	
											<div class="progress2 yellow">
												<span class="progress2-left">
													<span class="progress2-bar"></span>
												</span>
												<span class="progress2-right">
													<span class="progress2-bar"></span>
												</span>
												<div class="progress2-value"><?= $ScheduleSummary['Pending'];?> </div>
											</div>
											 <div align="center"> <b style="font-weight: 600;color: #FF9800;"> Pending </b></div>
										 </a> 
										</div>
										<div class="col-md-3 col-sm-6">
										   <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">	
											<div class="progress2 pink">
												<span class="progress2-left">
													<span class="progress2-bar"></span>
												</span>
												<span class="progress2-right">
													<span class="progress2-bar"></span>
												</span>
												<div class="progress2-value"><?= $ScheduleSummary['Incompleted'];?> </div>
											</div>
											 <div align="center"> <b style="font-weight: 600;color: #ED687C;"> Incompleted </b></div>
										   </a>
										</div>
									</div>
								</div>
							</div>
						</div>

						</div>
						

						<div id="2">

						<div class="card" id="goaltarget">
							<div class="card-header">
								<div class="panel-heading" style="background-color: #03BBD1;border-bottom-color: #ddd;color: white;font-weight:600;">
									<h6 class="panel-title" style="font-weight: 600;">GOAL / TARGET2</h6>
								</div>
							</div>
							
									<div class="tab-content">
										   <div class="tab-pane active fade in " id="messages-tue">
											 <div class="card">
												<div class="table-responsive">
													<table class="table text-nowrap">
														<tr>
															<th>SR. No.</th>
															<th>Target Name</th>
															<th>Goal / Target</th>
															<th>Achieved</th>
															<th>Balance</th>
														</tr>
														<tbody>
															<?php
															  $counter=1;
															 foreach ($TargetSummary as$value) 
															 {
															 ?>
															<tr>
																<td style="width: 10%;">
																	<div class="d-flex align-items-center">
																		<div class="content-group">
																			<a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
																				<span class="letter-icon">
																				  <?=$counter; ?>
																			   </span>
																			</a>
																			
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="content-group">
																			<span class="text-semibold no-margin">																
																				<?= $value['target_type'];?>
																			 </span>
																			<!-- <span class="text-muted text-size-small"></span> -->
																		</div>
																	</div>
																</td>
		
																<td>
																	<div class="d-flex align-items-center">
																		<div class="content-group">
																			<h6 class="text-semibold no-margin">
																				<?= $value['TargetValue'];?>
																		   </h6>
																		</div>
																	</div>
																</td>
		
																<td>
																	<div class="d-flex align-items-center">
																		<div class="content-group">
																			<h6 class="text-semibold no-margin">
																				<?= $value['TotalAchieveValue'];?>
																		   </h6>
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="content-group">
																			<h6 class="text-semibold no-margin">
																			  <?= $value['Balance'];?>
																			 </h6>
																			<!-- <span class="text-muted text-size-small">this year</span> -->
																		</div>
																	</div>
																</td>
															</tr>
														  <?php $counter++; } ?>
														</tbody>
													</table>
												</div>
											</div>
										 </div>
										</div>
									<!-- /tabs content -->	
						</div>
					
						</div>

						<div id="3">
					
						<div class="card" id="leadsopportunity">
							<div class="card-header">
								<div class="panel-heading" style="background-color: #03BBD1;border-bottom-color: #ddd;color: white;font-weight:600;">
									<h6 class="panel-title" style="font-weight: 600;">LEADS AND OPPORTUNITIES3</h6>
								</div>
							</div>
							<div class="tab-content">
								<div class="tab-pane active fade in has-padding" id="messages-tue">

								  <div class="row" style="display: none;">
									 <div class="col-sm-6 col-md-2">
										 <div class="panel panel-body bg-blue-400 has-bg-image">
											 <div class="media no-margin">
												 <div class="media-body">
													 <h3 class="no-margin">54,390</h3>
													 <span class="text-uppercase text-size-mini">total comments</span>
												 </div>
											 </div>
										 </div>
									 </div>

									 <div class="col-sm-6 col-md-3">
										 <div class="panel panel-body bg-danger-400 has-bg-image">
											 <div class="media no-margin">
												 <div class="media-body">

												 </div>
											 </div>
										 </div>
									 </div>

									 <div class="col-sm-6 col-md-3">
										 <div class="panel panel-body bg-success-400 has-bg-image">
											 <div class="media no-margin">
												 <div class="media-left media-middle">
													 <i class="icon-pointer icon-3x opacity-75"></i>
												 </div>

												 <div class="media-body text-right">
													 <h3 class="no-margin"><?= $LeadsOveallSummary['today'];?></h3>
													 <span class="text-uppercase text-size-mini">total clicks</span>
												 </div>
											 </div>
										 </div>
									 </div>

									 <div class="col-sm-6 col-md-3">
										 <div class="panel panel-body bg-indigo-400 has-bg-image">
											 <div class="media no-margin">
												 <div class="media-left media-middle">
													 <i class="icon-enter6 icon-3x opacity-75"></i>
												 </div>

												 <div class="media-body text-right">
													 <h3 class="no-margin"><?= $LeadsOveallSummary['weekcount'];?></h3>
													 <span class="text-uppercase text-size-mini">total visits</span>
												 </div>
											 </div>
										 </div>
									 </div>
								 </div>

								 <div class="row text-center" >
									 <div class="col-md-2">
										 <p><i class=" icon-calendar52 icon-2x display-inline-block text-info"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['today'];?></h5>
										 <!-- <h6 class="text-semibold no-margin-bottom mt-0" style="">Invitation statistics</h6> -->
										 <span class="text-semibold text-size-small">Today</span>
									 </div>

									 <div class="col-md-2">
										 <p><i class=" icon-calendar2 icon-2x display-inline-block text-warning"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['weekcount'];?></h5>
										 <span class="text-semibold text-size-small">This Week</span>
									 </div>

									 <div class="col-md-2">
										 <p><i class="icon-calendar22 icon-2x display-inline-block text-success"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['monthcount'];?></h5>
										 <span class="text-semibold text-size-small">This Month</span>
									 </div>
									 <div class="col-md-2">
										 <p><i class=" icon-grid4 icon-2x display-inline-block text-info"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['weekcount'];?></h5>
										 <span class="text-semibold text-size-small">Total</span>
									 </div>

									 <div class="col-md-2">
										 <p><i class="icon-hour-glass2 icon-2x display-inline-block text-warning"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['closuremonth'];?></h5>
										 <span class="text-semibold text-size-small">Expected Closure by This Month</span>
									 </div>
									 <div class="col-md-2">
										 <p><i class="icon-stats-growth  icon-2x display-inline-block text-success"></i></p>
										 <h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['salesmonth'];?></h5>
										 <span class="text-semibold text-size-small">Expected Sales by This Month</span>
									 </div>
								 </div>	
								 <hr/>
								  <div class="row">
									  <div class="col-md-6">
									   <div class="panel panel-body panel-body-accent">
											<div id="source_chart" style="min-width: 300px; height: 300px; max-width: 600px; margin: 0 auto"></div>
										 </div>
									 </div>
									 
									  <div class="col-md-6">
									   <div class="panel panel-body panel-body-accent">

										   <div id="container2"></div>
									   </div>
									 </div>

									  <div class="col-md-12">
									   <div class="panel panel-body panel-body-accent">
											<div id="container3" style="min-width: 400px; height: 300px; margin: 0 auto"></div>
									   </div>
									 </div>
								 </div>	  
							   </div>
							  </div>
							
							
						</div>

						</div>

						<div id="4">
	
						<div class="card" id="orderssummary">
							<div class="card-header">
								<div class="panel-heading" style="background-color: #03BBD1;border-bottom-color: #ddd;color: white;font-weight:600;">
									<h6 class="panel-title" style="font-weight: 600;">ORDERS AND SUMMARY4</h6>
								</div>	
							</div>
							 <div class="row">
							<div class="col-lg-4">
							   <div class="col-xl-12">
							        <div class="card">
							            <div class="card-content">
							                <div class="media align-items-stretch">
							                    <div class="p-2 text-center bg-primary bg-darken-2">
							                        <i class=" icon-cart font-large-2 white"></i>
							                    </div>
							                    <div class="p-1 bg-gradient-x-primary white media-body">
							                        <h6>Today Count  &nbsp;&nbsp;:&nbsp;  <?= $OrderSummary['TodayCount'];?> </h6>
							                        <h6>Month Count  &nbsp;:&nbsp;   <?= $OrderSummary['MonthCount'];?> </h6>
							                        <h6>Year Count  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?= $OrderSummary['YearCount'];?> </h6>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="col-lg-8">
							   <div class="col-xl-12">
					                <div class="col-md-2" style="width: 19.66666667%;">
					                	<a onclick="OpenOrderSummary(this.id)" id="Booked">
								            <div class="progress2 blue">
								                <span class="progress2-left">
								                    <span class="progress2-bar"></span>
								                </span>
								                <span class="progress2-right">
								                    <span class="progress2-bar"></span>
								                </span>
								                <div class="progress3-value"> <?= $OrderSummary['Booked'];?> </div>
								            </div>
								           <div align="center"> <b style="font-weight: 600;color: #009DFB;"> Booked </b></div>

											<div class="panel-body"  style="display: none;">>
												<div class="svg-center position-relative mb-5" id="progress_percentage_one"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Booked </b></div>
											</div>
									   </a>	
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							         	<a onclick="OpenOrderSummary(this.id)" id="Processed">	

										   <div class="progress2 yellow">
										    <span class="progress2-left">
										        <span class="progress2-bar"></span>
										    </span>
										    <span class="progress2-right">
										        <span class="progress2-bar"></span>
										    </span>
										    <div class="progress3-value"> <?= $OrderSummary['Processed'];?> </div>
										</div>
										 <div align="center"> <b style="font-weight: 600;color: #FF9800;"> Processed </b></div>

											<div class="panel-body"  style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_two"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Processed </b></div>
											</div>
							        	</a>
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							         	<a onclick="OpenOrderSummary(this.id)" id="Shipped">
										   <div class="progress2 teal">
										    <span class="progress2-left">
										        <span class="progress2-bar"></span>
										    </span>
										    <span class="progress2-right">
										        <span class="progress2-bar"></span>
										    </span>
										    <div class="progress3-value"> <?= $OrderSummary['Shipped'];?> </div>
										</div>
										<div align="center"> <b style="font-weight: 600;color: #008779;"> Shipped </b></div>

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_three"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Shipped </b></div>
											</div>	
								        </a>
							        </div>
							        <div class="col-md-2" style="width: 19.66666667%;">
							           <a onclick="OpenOrderSummary(this.id)" id="Completed">	
							            <div class="progress2 green">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value"> <?= $OrderSummary['Completed'];?> </div>
							            </div>
							             <div align="center"> <b style="font-weight: 600;color: #499C54;"> Completed </b></div>											

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_four"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Completed </b></div>
											</div>

							           </a>
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							           <a onclick="OpenOrderSummary(this.id)" id="Canceled">	

							             <div class="progress2 pink">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value"> <?= $OrderSummary['Canceled'];?> </div>
							              </div>
							             <div align="center"> <b style="font-weight: 600;color: #ED687C;"> Canceled </b></div>

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_five"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Canceled </b></div>
											</div>
							       		</a>
							        </div>
							    </div>
							</div>					
						</div>
							
						</div>
						
						</div>
					</div>
				</div>
			</div>
			
			
			<!-- <div class="row">
				<div class="panel panel-white" style="border-color: #03BBD1;">
                    <div class="panel-heading" style="background-color: #03BBD1;border-bottom-color: #ddd;color: white;font-weight:600;">
						<h6 class="panel-title" style="font-weight: 600;">SCHEDULE SUMMARY</h6>
	                </div>
					<div class="container-fluid">
						<br/>
	                    <div class="row">
							<div class="col-lg-4">
							   <div class="col-xl-12">
							        <div class="card">
							            <div class="card-content">
							                <div class="media align-items-stretch">
							                    <div class="p-2 text-center bg-danger bg-darken-2">
							                        <i class=" icon-calendar3 font-large-2 white"></i>
							                    </div>
							                    <div class="p-1 bg-gradient-x-danger white media-body">
							                        <h6>Today Count  &nbsp;&nbsp;:&nbsp;  <?= $ScheduleSummary['TodayCount']; ?> </h6>
							                        <h6>Month Count  &nbsp;:&nbsp;  <?= $ScheduleSummary['MonthCount']; ?> </h6>
							                        <h6>Year Count  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?= $ScheduleSummary['YearCount'];?> </h6>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="col-lg-8">
							   <div class="col-xl-12">
							        <div class="col-md-3 col-sm-6">
							        	<a onclick="OpenScheduleSummary(this.id)" id="All">
							            <div class="progress2 blue">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value"><?= $ScheduleSummary['All'];?> </div>
							            </div>
							           <div align="center"> <b style="font-weight:600;color: #009DFB;"> All </b></div>
							          </a>
							        </div>
							        <div class="col-md-3 col-sm-6">
							          <a onclick="OpenScheduleSummary(this.id)" id="Completed">	
							            <div class="progress2 green">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value"><?= $ScheduleSummary['Completed'];?> </div>
							            </div>
							             <div align="center"> <b style="font-weight: 600;color: #499C54;"> Completed </b></div>
							          </a>   
							        </div>
							        <div class="col-md-3 col-sm-6">
							          <a onclick="OpenScheduleSummary(this.id)" id="Pending">	
							            <div class="progress2 yellow">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value"><?= $ScheduleSummary['Pending'];?> </div>
							            </div>
							             <div align="center"> <b style="font-weight: 600;color: #FF9800;"> Pending </b></div>
							         </a> 
							        </div>
							        <div class="col-md-3 col-sm-6">
							           <a onclick="OpenScheduleSummary(this.id)" id="Incompleted">	
							            <div class="progress2 pink">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value"><?= $ScheduleSummary['Incompleted'];?> </div>
							            </div>
							             <div align="center"> <b style="font-weight: 600;color: #ED687C;"> Incompleted </b></div>
							           </a>
							        </div>
							    </div>
							</div>
						</div>
					 </div>	
			       </div>

				  <div class="panel panel-white" style="border-color: #009688d9;display: block;">
					<div class="container-fluid">
	                    <div class="row">
		                    <div class="panel-heading" style="background-color: #009688d9;border-bottom-color: #ddd;color: white;font-weight:800;">
								<h6 class="panel-title"  style="font-weight: 600;">GOAL / TARGET</h6>
			                </div>
							<div class="tab-content">
	  							 <div class="tab-pane active fade in " id="messages-tue">
			                         <div class="card">
										<div class="table-responsive">
											<table class="table text-nowrap">
												<tr>
													<th>SR. No.</th>
													<th>Target Name</th>
													<th>Goal / Target</th>
													<th>Achieved</th>
													<th>Balance</th>
												</tr>
												<tbody>
													<?php
													  $counter=1;
													 foreach ($TargetSummary as$value) 
													 {
													 ?>
													<tr>
														<td style="width: 10%;">
															<div class="d-flex align-items-center">
																<div class="content-group">
																	<a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
																		<span class="letter-icon">
																		  <?=$counter; ?>
																	   </span>
																	</a>
																	
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-center">
																<div class="content-group">
																	<span class="text-semibold no-margin">																
																		<?= $value['target_type'];?>
																	 </span>
																	<span class="text-muted text-size-small"></span>
																</div>
															</div>
														</td>

														<td>
															<div class="d-flex align-items-center">
																<div class="content-group">
																	<h6 class="text-semibold no-margin">
																		<?= $value['TargetValue'];?>
																   </h6>
																</div>
															</div>
														</td>

														<td>
															<div class="d-flex align-items-center">
																<div class="content-group">
																	<h6 class="text-semibold no-margin">
																		<?= $value['TotalAchieveValue'];?>
																   </h6>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-center">
																<div class="content-group">
																	<h6 class="text-semibold no-margin">
																	  <?= $value['Balance'];?>
																	 </h6>
																	<span class="text-muted text-size-small">this year</span> -->
																<!-- </div>
															</div>
														</td>
													</tr>
												  <?php $counter++; } ?>
												</tbody>
											</table>
										</div>
									</div>
								 </div>
  							  </div> -->
							<!-- /tabs content -->
						<!-- </div>
					 </div>	
			       </div>

				<div class="panel panel-white" style="border-color: #566DB7;">
					<div class="container-fluid">
	                    <div class="row">
		                     <div class="panel-heading" style="background-color: #566DB7;border-bottom-color: #ddd;color: white;font-weight:800;">
								<h6 class="panel-title"  style="font-weight: 600;"> LEADS | OPPORTUNITIES </h6>
			                </div>
							<div class="tab-content">
	  							 <div class="tab-pane active fade in has-padding" id="messages-tue">

					                 <div class="row" style="display: none;">
										<div class="col-sm-6 col-md-2">
											<div class="panel panel-body bg-blue-400 has-bg-image">
												<div class="media no-margin">
													<div class="media-body">
														<h3 class="no-margin">54,390</h3>
														<span class="text-uppercase text-size-mini">total comments</span>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3">
											<div class="panel panel-body bg-danger-400 has-bg-image">
												<div class="media no-margin">
													<div class="media-body">

													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3">
											<div class="panel panel-body bg-success-400 has-bg-image">
												<div class="media no-margin">
													<div class="media-left media-middle">
														<i class="icon-pointer icon-3x opacity-75"></i>
													</div>

													<div class="media-body text-right">
														<h3 class="no-margin"><?= $LeadsOveallSummary['today'];?></h3>
														<span class="text-uppercase text-size-mini">total clicks</span>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3">
											<div class="panel panel-body bg-indigo-400 has-bg-image">
												<div class="media no-margin">
													<div class="media-left media-middle">
														<i class="icon-enter6 icon-3x opacity-75"></i>
													</div>

													<div class="media-body text-right">
														<h3 class="no-margin"><?= $LeadsOveallSummary['weekcount'];?></h3>
														<span class="text-uppercase text-size-mini">total visits</span>
													</div>
												</div>
											</div>
										</div>
									</div>

		                            <div class="row text-center" >
										<div class="col-md-2">
											<p><i class=" icon-calendar52 icon-2x display-inline-block text-info"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['today'];?></h5> -->
											<!-- <h6 class="text-semibold no-margin-bottom mt-0" style="">Invitation statistics</h6> -->
										    <!-- <span class="text-semibold text-size-small">Today</span>
										</div>

										<div class="col-md-2">
											<p><i class=" icon-calendar2 icon-2x display-inline-block text-warning"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['weekcount'];?></h5>
											<span class="text-semibold text-size-small">This Week</span>
										</div>

										<div class="col-md-2">
											<p><i class="icon-calendar22 icon-2x display-inline-block text-success"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['monthcount'];?></h5>
											<span class="text-semibold text-size-small">This Month</span>
										</div>
										<div class="col-md-2">
											<p><i class=" icon-grid4 icon-2x display-inline-block text-info"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['weekcount'];?></h5>
											<span class="text-semibold text-size-small">Total</span>
										</div>

										<div class="col-md-2">
											<p><i class="icon-hour-glass2 icon-2x display-inline-block text-warning"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['closuremonth'];?></h5>
											<span class="text-semibold text-size-small">Expected Closure by This Month</span>
										</div>
										<div class="col-md-2">
											<p><i class="icon-stats-growth  icon-2x display-inline-block text-success"></i></p>
											<h5 class="text-semibold no-margin"><?= $LeadsOveallSummary['salesmonth'];?></h5>
											<span class="text-semibold text-size-small">Expected Sales by This Month</span>
										</div>
									</div>	
									<hr/>
									 <div class="row">
									 	<div class="col-md-6">
				                          <div class="panel panel-body panel-body-accent">
                                               <div id="source_chart" style="min-width: 300px; height: 300px; max-width: 600px; margin: 0 auto"></div>
											</div>
										</div>
										
									 	<div class="col-md-6">
				                          <div class="panel panel-body panel-body-accent">

				                          	<div id="container2"></div>
										  </div>
										</div>

									 	<div class="col-md-12">
				                          <div class="panel panel-body panel-body-accent">
                                               <div id="container3" style="min-width: 400px; height: 300px; margin: 0 auto"></div>
										  </div>
										</div>
									</div>	  
 								 </div>
  					   	    </div>
				      </div>
				   </div>	
			    </div>

				<div class="panel panel-white" style="border-color: #e46775;display: block;">
                   <div class="panel-heading" style="background-color: #e46775;border-bottom-color: #ddd;color: white;font-weight:800;">
						<h6 class="panel-title"  style="font-weight: 600;"> ORDER SUMMARY</h6>
	                </div>
					<div class="container-fluid">
						<br/>
	                    <div class="row">
							<div class="col-lg-4">
							   <div class="col-xl-12">
							        <div class="card">
							            <div class="card-content">
							                <div class="media align-items-stretch">
							                    <div class="p-2 text-center bg-primary bg-darken-2">
							                        <i class=" icon-cart font-large-2 white"></i>
							                    </div>
							                    <div class="p-1 bg-gradient-x-primary white media-body">
							                        <h6>Today Count  &nbsp;&nbsp;:&nbsp;  <?= $OrderSummary['TodayCount'];?> </h6>
							                        <h6>Month Count  &nbsp;:&nbsp;   <?= $OrderSummary['MonthCount'];?> </h6>
							                        <h6>Year Count  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;  <?= $OrderSummary['YearCount'];?> </h6>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="col-lg-8">
							   <div class="col-xl-12">
					                <div class="col-md-2" style="width: 19.66666667%;">
					                	<a onclick="OpenOrderSummary(this.id)" id="Booked">
								            <div class="progress2 blue">
								                <span class="progress2-left">
								                    <span class="progress2-bar"></span>
								                </span>
								                <span class="progress2-right">
								                    <span class="progress2-bar"></span>
								                </span>
								                <div class="progress3-value"> <?= $OrderSummary['Booked'];?> </div>
								            </div>
								           <div align="center"> <b style="font-weight: 600;color: #009DFB;"> Booked </b></div>

											<div class="panel-body"  style="display: none;">>
												<div class="svg-center position-relative mb-5" id="progress_percentage_one"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Booked </b></div>
											</div>
									   </a>	
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							         	<a onclick="OpenOrderSummary(this.id)" id="Processed">	

										   <div class="progress2 yellow">
										    <span class="progress2-left">
										        <span class="progress2-bar"></span>
										    </span>
										    <span class="progress2-right">
										        <span class="progress2-bar"></span>
										    </span>
										    <div class="progress3-value"> <?= $OrderSummary['Processed'];?> </div>
										</div>
										 <div align="center"> <b style="font-weight: 600;color: #FF9800;"> Processed </b></div>

											<div class="panel-body"  style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_two"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Processed </b></div>
											</div>
							        	</a>
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							         	<a onclick="OpenOrderSummary(this.id)" id="Shipped">
										   <div class="progress2 teal">
										    <span class="progress2-left">
										        <span class="progress2-bar"></span>
										    </span>
										    <span class="progress2-right">
										        <span class="progress2-bar"></span>
										    </span>
										    <div class="progress3-value"> <?= $OrderSummary['Shipped'];?> </div>
										</div>
										<div align="center"> <b style="font-weight: 600;color: #008779;"> Shipped </b></div>

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_three"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Shipped </b></div>
											</div>	
								        </a>
							        </div>
							        <div class="col-md-2" style="width: 19.66666667%;">
							           <a onclick="OpenOrderSummary(this.id)" id="Completed">	
							            <div class="progress2 green">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value"> <?= $OrderSummary['Completed'];?> </div>
							            </div>
							             <div align="center"> <b style="font-weight: 600;color: #499C54;"> Completed </b></div>											

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_four"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Completed </b></div>
											</div>

							           </a>
							        </div>
							         <div class="col-md-2" style="width: 19.66666667%;">
							           <a onclick="OpenOrderSummary(this.id)" id="Canceled">	

							             <div class="progress2 pink">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value"> <?= $OrderSummary['Canceled'];?> </div>
							              </div>
							             <div align="center"> <b style="font-weight: 600;color: #ED687C;"> Canceled </b></div>

											<div class="panel-body" style="display: none;">
												<div class="svg-center position-relative mb-5" id="progress_percentage_five"></div>
												<div align="right"> <b style="font-weight: 600;color: #009DFB;"> Canceled </b></div>
											</div>
							       		</a>
							        </div>
							    </div>
							</div>					
						</div>
					 </div>	
			       </div>
			   
				</div>  -->
<!-- ENDS | -->


			</div>
		</div>
		<!-- /page content -->

	    <div id="AddNotesModal" class="modal fade">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
	                  <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
	                  <h5 class="modal-title" style="margin-top: -4px" >
	                  <i class="icon-design" style="zoom:1.1; "></i>
	                    &nbsp;Add Note
	                  </h5>
	              </div>
	                <div class="modal-body">
	                  <form id="add_notes_form" method="post">
	                    <div class="panel panel-flat">
	                      <div class="panel-body">
	                        <fieldset>
	                          <div class="row">
	                              <div class="col-md-7"> 
									  <table class="table table-bordered">
									    <thead>
									      <tr>
									        <th style="width: 2%;">#</th>
									        <th style="width: 95%;">Note</th>
									        <th style="width: 3%;">Action</th>
									      </tr>
									    </thead>
									    <tbody>
									    <?php
									    $cnt=1;
									    foreach ($GetNotes as $row)
									     {
									    ?> 	
									      <tr>
									        <td style="width: 2%;"><?= $cnt;?></td>
                                            <td style="width: 95%;"><?= $row->notes;?></td>
                                             <td style="width: 3%;"><a onclick="del_notes(id)" id="<?= $row->note_id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Location" data-placement="bottom"></i></span></a></td>
									      </tr>
									    <?php $cnt++; } ?>  
									    </tbody>
									  </table>
	                              </div> 	                          	
	                              <div class="col-md-5"> 
	                                  <div class="form-group">
	                                   <label> Note : <sup style="color: red">*</sup>
	                                   </label>
	                                    <textarea class="form-control" name="notes" rows="3"></textarea>
	                                   </div>
				                      <div class="text-center">
					                      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
					                      <span id="preview"></span>
				                      </div> 
	                              </div>         
	                          </div>
	                        </fieldset>                                             
	                       <br/>
 	                  </div>
	                </div>
	              </form>
	          </div>
	        </div>
	      </div>
	    </div>

		<!-- Footer -->
          <?php  $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->
  </body>


<script>
function del_notes(note_id)
{
	  var notice = new PNotify({
	        title: 'Confirmation',
	        text: '<p>Are you sure you want to delete this Note ?</p>',
	        hide: false,
	        type: 'warning',
	        confirm: {
	            confirm: true,
	            buttons: [
	                {
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
	   notice.get().on('pnotify.confirm', function()
	     {
	        var datastring = 'note_id='+note_id;
	        //alert(datastring);
	         $.ajax({
	          type: "post",
	          url: "<?php echo base_url('admin/Dashboard/del_notes'); ?>",
	          cache: false,    
	          data: datastring,
	          success: function(data)
	          {    
	            //alert(data);
	            $(function(){
	             new PNotify({
	                          title: 'Delete Note',
	                          text: 'Deleted successfully',
	                          type: 'success'
	                         });
	            });
	            setTimeout(function()
	             {
	                window.location="<?php echo base_url('admin/dashboard/view_dashboard');?>";
	             }, 1000);
	            
	           },
	          error: function()
	          {      
	           alert('Error while request..');
	          }
	       });
	    })
	    // On cancel
	    notice.get().on('pnotify.cancel', function()
	     {
	        // alert('Oh ok. Chicken, I see.');
	    });
   }
</script>

<script type="text/javascript">
 $(document).ready(function()
  {
    $('#add_notes_form').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
                   notes: {
                          validators: {
                              notEmpty: {
                                  message: 'Notes Required'
                              }
                      }
                  }

              }
           });
   });
</script>

<script type="text/javascript">
$(document).ready(function (e)
     {
       $("#add_notes_form").on('submit',(function(e)
           {  
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {
                  $.ajax({
                    url: "<?php echo base_url('admin/Dashboard/AddNotes'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                        // alert(data);
                         $(function(){
                           new PNotify({
                                        title: 'Add Note',
                                        text: 'Added Successfully',
                                        type: 'success'
                                       });
                          });
                       setTimeout(function()
                         {
                             window.location="<?php echo base_url('admin/dashboard/view_dashboard');?>";
                         }, 1000);
                      },
                      error: function() 
                      {
                        alert('fail');
                      }           
                   });
              }
              return false;
          }));
      });
</script>
  <script type="text/javascript">
  	function OpenScheduleSummary(type)
  	{
  	   window.location="<?php echo base_url('admin/Customer/ScheduleReport') ?>?Type="+type;
  	}
  	function OpenOrderSummary(type)
  	{
  	   window.location="<?php echo base_url('admin/Ecommerce/OrderReport') ?>?Type="+type;
  	}
  </script>

<script type="text/javascript">
	
// Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
credits:{
 enabled:false,
},

   title: {
        text: 'Leads/Opportunities by Source<br/><p style="font-size:12px;color:#FF5732;">Current Year (Jan 2019 - 31 Dec 2019)</p>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            colors: pieColors,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
            }
        }
    },
    series: [{
        name: 'Source',
        data: [
        		  <?php 
		                foreach ($LeadsBySourceSummary as $Source) 
						 {
						 ?>
	                   { name: '<?= $Source['sourcetitle']; ?>', y: <?= $Source['sourcecount']; ?> },
	             <?php } ?>
	          ]
    }]
});

</script>

<script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'funnel3d',
        options3d: {
            enabled: true,
            alpha: 10,
            depth: 50,
            viewDistance: 50
        }
    },
    title: {
         text: 'Leads/Opportunities by Stages<br/><p style="font-size:12px;color:#FF5732;"></p>'
    },
credits:{
 enabled:false,
},
    series: [{
        name: 'Count',
        data: [

    		  <?php 
	                foreach ($LeadsByStagesSummary as $Stages) 
					 {
					 ?>
					   ['<?= $Stages['stage_title']; ?>', <?= $Stages['StageCount']; ?>],
             <?php } ?>
            ]
    }]
});

</script>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
credits:{
 enabled:false,
},

    
    title: {
        text: 'Leads/Opportunities by Owners<br/><p style="font-size:12px;color:#FF5732;"></p>'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    // },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent Leads'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Employee",
            colorByPoint: true,
            data: [
    		     <?php 
	                foreach ($LeadsByOwnerSummary as $Employee) 
					 {
					 ?>
		                {
		                    name: '<?= $Employee['name']; ?>',
		                    y: <?= $Employee['OwnerCount']; ?>
		                    // drilldown: "Chrome"
		                },
		         <?php } ?>  
            ]
        }
    ],
});

</script>


<script type="text/javascript">
	
Highcharts.chart('source_chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Leads/Opportunities by Source</p>'
    },
credits:{
 enabled:false,
},
    
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,

        data: [
        		  <?php 
		                foreach ($LeadsBySourceSummary as $Source) 
						 {
						 ?>
	                   { name: '<?= $Source['sourcetitle']; ?>', y: <?= $Source['sourcecount']; ?> },
	             <?php } ?>
	          ]

    }]
});


</script>



<script type="text/javascript">
	
	document.addEventListener('DOMContentLoaded', function() 
	{


    // Animated progress with percentage count
    // ------------------------------

    // Initialize charts
    progressPercentage('#progress_percentage_one', 46, 3, "#eee", "#009DFB", 0.98);
    progressPercentage('#progress_percentage_two', 46, 3, "#eee", "#FFB733", 0.62);
    progressPercentage('#progress_percentage_three', 46, 3, "#eee", "#008779", 0.69);
    progressPercentage('#progress_percentage_four', 46, 3, "#eee", "#499C54", 0.43);
    progressPercentage('#progress_percentage_five', 46, 3, "#eee", "#ED687C", 0.53);

    // Chart setup
    function progressPercentage(element, radius, border, backgroundColor, foregroundColor, end) 
    {
        // Main variables
        var d3Container = d3.select(element),
            startPercent = 0,
            fontSize = 22,
            endPercent = end,
            twoPi = Math.PI * 2,
            formatPercent = d3.format('.0%'),
            boxSize = radius * 2;

        // Values count
        var count = Math.abs((endPercent - startPercent) / 0.01);

        // Values step
        var step = endPercent < startPercent ? -0.01 : 0.01;


        // Create chart
        // ------------------------------

        // Add SVG element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
            .attr('width', boxSize)
            .attr('height', boxSize)
            .append('g')
                .attr('transform', 'translate(' + radius + ',' + radius + ')');


        // Construct chart layout
        // ------------------------------

        // Arc
        var arc = d3.svg.arc()
            .startAngle(0)
            .innerRadius(radius)
            .outerRadius(radius - border)
            .cornerRadius(20);

        // Background path
        svg.append('path')
            .attr('class', 'd3-progress-background')
            .attr('d', arc.endAngle(twoPi))
            .style('fill', backgroundColor);

        // Foreground path
        var foreground = svg.append('path')
            .attr('class', 'd3-progress-foreground')
            .attr('filter', 'url(#blur)')
            .style({
            	'fill': foregroundColor,
            	'stroke': foregroundColor
            });

        // Front path
        var front = svg.append('path')
            .attr('class', 'd3-progress-front')
            .style({
            	'fill': foregroundColor,
            	'fill-opacity': 1
            });
        var numberText = svg
            .append('text')
                .attr('dx', 0)
                .attr('dy', (fontSize / 2) - border)
                .style({
                    'font-size': fontSize + 'px',
                    'line-height': 1,
                    'fill': foregroundColor,
                    'text-anchor': 'middle'
                });
        function updateProgress(progress) {
            foreground.attr('d', arc.endAngle(twoPi * progress));
            front.attr('d', arc.endAngle(twoPi * progress));
            numberText.text(formatPercent(progress));
        }
        // Animate text
        var progress = startPercent;
        (function loops() 
        {
            updateProgress(progress);
            if (count > 0) {
                count--;
                progress += step;
                setTimeout(loops, 10);
            }
        })();
    }

});

</script>

<script type="text/javascript">

const sequence = [];

$('#Schedulesummary').draggable({
  stop: display1
});

function display1()
{
	var children = document.getElementById("cards-target-left").children;

	var idArr = [];

	for (var i = 0; i < children.length; i++) {
	idArr.push(children[i].id);
	}

	console.log(idArr);

	// var i = document.getElementById('Schedulesummary');
	// var ssi_id = i.parentElement.id;
	// var ssdata = sequence.unshift(ssi_id);
    // const seq = [...new Set(sequence)]
	// alert(seq);
}


$('#goaltarget').draggable({
  stop: display2
});

function display2()
{
	var children = document.getElementById("cards-target-left").children;

	var idArr = [];

	for (var i = 0; i < children.length; i++) {
	idArr.push(children[i].id);
	}

	console.log(idArr);
	// var i = document.getElementById('goaltarget');
	// var gti_id = i.parentElement.id;
	// var gtdata = sequence.unshift(gti_id);
	// const seq = [...new Set(sequence)]
	// alert(seq);
}


$('#leadsopportunity').draggable({
  stop: display3
});

function display3()
{
	var children = document.getElementById("cards-target-left").children;

	var idArr = [];

	for (var i = 0; i < children.length; i++) {
	idArr.push(children[i].id);
	}

	console.log(idArr);
	// var i = document.getElementById('leadsopportunity');
	// var loi_id = i.parentElement.id;
	// var lodata = sequence.unshift(loi_id);
	// const seq = [...new Set(sequence)]
	// alert(seq);
}


$('#orderssummary').draggable({
  stop: display4
});

function display4()
{
	var children = document.getElementById("cards-target-left").children;

	var idArr = [];

	for (var i = 0; i < children.length; i++) {
	idArr.push(children[i].id);
	}

	console.log(idArr);
	// var i = document.getElementById('orderssummary');
	// var osi_id = i.parentElement.id;
	// var osdata = sequence.unshift(osi_id);
	// const seq = [...new Set(sequence)]
	// alert(seq);
}
</script>
</html>
