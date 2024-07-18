<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
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
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/dashboard.js"></script>
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
	
.progress2{
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

</head>
<body>

 <!--  Load header value -->
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->

	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="index.html"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li>
			</ul>
			<ul class="breadcrumb-elements">
				<li><a href="#"><i class="icon-calendar2 position-left"></i>Add Schedule</a></li>
                <li><a href="#"><i class="icon-users4 position-left"></i>Customer List</a></li>
                <li><a href="#"><i class="icon-target position-left"></i>Target</a></li>
                <li><a href="#"><i class="icon-user-tie position-left"></i>Employee</a></li>
			</ul>
		</div>
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
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
			<div class="row">
			  <div class="col-md-6">
				<div class="panel panel-white">
	            	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-blue-600 border-top border-top-blue-600">
						<li class="">
							<a class="text-size-small text-uppercase" data-toggle="tab" style="float: left;cursor: none;">
								<b>SCHEDULE SUMMARY</b>
							</a>
						</li>
					</ul>
					<div class="container-fluid">
	                    <div class="row">
						   <div class="">
							   <div class="">
							        <div class="card">
							            <div class="card-content">
							                <div class="media align-items-stretch">
							                    <div class="p-2 text-center bg-danger bg-darken-2">
							                        <i class=" icon-calendar3 font-large-2 white"></i>
							                    </div>
							                    <div class="p-2 bg-gradient-x-danger white media-body">
							                        <h6>Today Count  &nbsp;&nbsp;-  12</h6>
							                       
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							 <div class="col-md-12">
							   <div class="col-xl-12">
							        <div class="col-md-6 col-sm-6">
							            <div class="progress2 blue">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value">90</div>
							            </div>
							           <div align="center"> <b style="font-weight: 500;"> All </b></div>
							        </div>
							        <div class="col-md-6 col-sm-6">
							            <div class="progress2 green">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value">60</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Completed </b></div>
							        </div>
							        <div class="col-md-6 col-sm-6">
							            <div class="progress2 yellow">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value">20</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Pending </b></div>
							        </div>
							        <div class="col-md-6 col-sm-6">
							            <div class="progress2 pink">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress2-value">10</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Incompleted </b></div>
							        </div>
							    </div>
							</div>
						</div>
					 </div>	
			       </div>
			    </div>   
			    <div class="col-md-6">
				<div class="panel panel-white">
	            	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-primary-600 border-top border-top-primary-600">
						<li class="">
							<a class="text-size-small text-uppercase" data-toggle="tab" style="float: left;cursor: not-allowed;;">
								<b> ECOMMERCE | ORDERS SUMMARY</b>
							</a>
						</li>
					</ul>
					<div class="container-fluid">
	                    <div class="row">
							<div class="">
							   <div class="">
							        <div class="card">
							            <div class="card-content">
							                <div class="media align-items-stretch">
							                    <div class="p-2 text-center bg-primary bg-darken-2">
							                        <i class=" icon-cart font-large-2 white"></i>
							                    </div>
							                    <div class="p-1 bg-gradient-x-primary white media-body">
							                        <h6>Today Count  &nbsp;&nbsp;-  12</h6>
							                        <h6>Month Count  &nbsp;-  12</h6>
							                        <h6>Year Count  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-  12</h6>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							<div class="col-lg-12">
							   <div class="col-xl-12">
							        <div class="col-md-4" >
							            <div class="progress2 blue">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value">90</div>
							            </div>
							           <div align="center"> <b style="font-weight: 500;"> Booked </b></div>
							        </div>
							         <div class="col-md-4">
							            <div class="progress2 yellow">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value">60</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Processed </b></div>
							        </div>
							         <div class="col-md-4">
							            <div class="progress2 teal">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value">10</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Shipped </b></div>
							        </div>
							        <div class="col-md-4" >
							            <div class="progress2 green">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value">10</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Completed </b></div>
							        </div>

							         <div class="col-md-4" >
							            <div class="progress2 pink">
							                <span class="progress2-left">
							                    <span class="progress2-bar"></span>
							                </span>
							                <span class="progress2-right">
							                    <span class="progress2-bar"></span>
							                </span>
							                <div class="progress3-value">10</div>
							            </div>
							             <div align="center"> <b style="font-weight: 500;"> Canceled </b></div>
							        </div>

							    </div>
							</div>					
						</div>
					 </div>	
			       </div>
			      </div>
			 </div>     

		 <div class="row">
			<div class="col-md-12">
					<div class="panel panel-white">
						<div class="container-fluid">
		                    <div class="row">
			                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-teal-600 border-top border-top-teal-600">
									<li class="">
										<a class="text-size-small text-uppercase" data-toggle="tab" style="float: left;cursor: none;">
											<b>TARGET SUMMARY</b>
										</a>
									</li>
								</ul>
								<div class="tab-content">
		  							 <div class="tab-pane active fade in has-padding" id="messages-tue">
				                         <div class="card">
											<div class="table-responsive">
												<table class="table text-nowrap">
													<tr>
														<th>SR. No.</th>
														<th style="width: 10%;">Target Name</th>
														<th>Achieved</th>
														<th>Balance</th>
													</tr>
													<tbody>

														<tr>
															<td style="width: 10%;">
																<div class="d-flex align-items-center">
																	<div class="content-group">
																		<a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
																			<span class="letter-icon">
																			   1
																		   </span>
																		</a>
																		
																	</div>
																</div>
															</td>
															<td style="width: 10%;">
																Revenue Collection - Customization
															</td>
															<td style="width: 10%;">
																<div class="d-flex align-items-center">
																	<div class="content-group">
																		<h6 class="text-semibold no-margin">
																			10
																	   </h6>
																	</div>
																</div>
															</td>
															<td style="width: 10%;">
																<div class="d-flex align-items-center">
																	<div class="content-group">
																		<h6 class="text-semibold no-margin">
																		   5	
																		 </h6>
																		<!-- <span class="text-muted text-size-small">this year</span> -->
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									 </div>
	  							  </div>
								<!-- /tabs content -->
							</div>
						 </div>	
				       </div>
			      </div>
				 <div class="col-md-12"> 
					<div class="panel panel-white">
						<div class="container-fluid">
		                    <div class="row">
			                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-success-600 border-top border-top-success-600">
									<li class="">
										<a class="text-size-small text-uppercase" data-toggle="tab" style="float: left;cursor: none;">
											<b>LEADS | OPPORTUNITIES SUMMARY</b>
										</a>
									</li>
								</ul>
								<div class="tab-content">
		  							 <div class="tab-pane active fade in has-padding" id="messages-tue">
	<!-- 			                        <div class="card">
										</div> -->
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
		<!-- /page content -->

		<!-- Footer -->
          <?php  $this->load->view('Admin/includes/admin_footer'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->
  </body>



</html>
