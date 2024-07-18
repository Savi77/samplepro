<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<!-- Global stylesheets -->
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">	
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
    <style type="text/css">   	
	.content-group 
	 {
	   margin-bottom: 0px !important; 
	 }

	.nav-tabs[class*=bg-] > .active > a
	{
	   background-color: #3F51B5 !important; 
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
	.card, .navbar-nav {
	    display: -moz-box;
	    -webkit-box-orient: vertical;
	}
	.card, .card-footer, .card-header {
	    background-color: #FFF;
	}
	.align-items-stretch {
	    -webkit-box-align: stretch!important;
	    -webkit-align-items: stretch!important;
	    -moz-box-align: stretch!important;
	    -ms-flex-align: stretch!important;
	    align-items: stretch!important;
	}.media {
	    display: flex;
	    -webkit-box-align: start;
	    -webkit-align-items: flex-start;
	    -moz-box-align: start;
	    -ms-flex-align: start;
	    align-items: flex-start;
	}
	.media, .progress-bar {
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: -moz-box;
	    display: -ms-flexbox;
	}
	.bg-primary.bg-darken-2, .btn-primary.btn-darken-2 {
	    background-color: #008385!important;
	}
	.text-center {
	    text-align: center!important;
	}

	.font-large-2 {
	    font-size: 3rem!important;
	}
	.bg-gradient-x-primary {
	    background-image: -webkit-gradient(linear,left top,right top,from(#008385),to(#00E7EB));
	    background-image: -webkit-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: -moz-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: -o-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: linear-gradient(to right,#008385 0,#00E7EB 100%);
	    background-repeat: repeat-x;
	}
	.bg-gradient-x-primary {
	    background-image: -webkit-gradient(linear,left top,right top,from(#008385),to(#00E7EB));
	    background-image: -webkit-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: -moz-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: -o-linear-gradient(left,#008385 0,#00E7EB 100%);
	    background-image: linear-gradient(to right,#008385 0,#00E7EB 100%);
	    background-repeat: repeat-x;
	}
	.white {
	    color: #FFF!important;
	}

	.media-body {
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
	.text-bold-400 {
	    font-weight: 400;
	}
	.font-large-2
	 {
	    font-size: 4rem!important;
	    margin-top: 1rem !important;
	}
	/**/
	.bg-danger.bg-darken-2, .btn-danger.btn-darken-2 {
	    background-color: #FF425C!important;
	}
	.bg-danger {
	    background-color: #FF7588!important;
	}

	.bg-gradient-x-danger {
	    background-image: -webkit-gradient(linear,left top,right top,from(#FF425C),to(#FFA8B4));
	    background-image: -webkit-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: -moz-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: -o-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: linear-gradient(to right,#FF425C 0,#FFA8B4 100%);
	    background-repeat: repeat-x;
	}

	.bg-gradient-x-danger {
	    background-image: -webkit-gradient(linear,left top,right top,from(#FF425C),to(#FFA8B4));
	    background-image: -webkit-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: -moz-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: -o-linear-gradient(left,#FF425C 0,#FFA8B4 100%);
	    background-image: linear-gradient(to right,#FF425C 0,#FFA8B4 100%);
	    background-repeat: repeat-x;
	}
	/**/
	.bg-gradient-x-success {
	    background-image: -webkit-gradient(linear,left top,right top,from(#11A578),to(#32EAB2));
	    background-image: -webkit-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: -moz-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: -o-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: linear-gradient(to right,#11A578 0,#32EAB2 100%);
	    background-repeat: repeat-x;
	}

	.bg-gradient-x-success {
	    background-image: -webkit-gradient(linear,left top,right top,from(#11A578),to(#32EAB2));
	    background-image: -webkit-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: -moz-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: -o-linear-gradient(left,#11A578 0,#32EAB2 100%);
	    background-image: linear-gradient(to right,#11A578 0,#32EAB2 100%);
	    background-repeat: repeat-x;
	}

	.bg-success.bg-darken-2, .btn-success.btn-darken-2 {
	    background-color: #11A578!important;
	}

	.bg-success {
	    background-color: #16D39A!important;
	}

    .bg-gradient-x-purple {
	    background-image: -webkit-gradient(linear,left top,right top,from(#7f16c9),to(#e8d6f5));
	    background-image: -webkit-linear-gradient(left,#7f16c9 0 0,#e8d6f5 100%);
	    background-image: -moz-linear-gradient(left,#7f16c9 0 0,#e8d6f5 100%);
	    background-image: -o-linear-gradient(left,#7f16c9 0 0,#e8d6f5 100%);
	    background-image: linear-gradient(to right,#7f16c9 0 0,#e8d6f5 100%);
	    background-repeat: repeat-x;
	}
	.bg-gradient-x-purple {
	    background-image: -webkit-gradient(linear,left top,right top,from(#7f16c9),to(#e8d6f5));
	    background-image: -webkit-linear-gradient(left,#7f16c9 0,#e8d6f5 100%);
	    background-image: -moz-linear-gradient(left,#7f16c9 0,#e8d6f5 100%);
	    background-image: -o-linear-gradient(left,#7f16c9 0,#e8d6f5 100%);
	    background-image: linear-gradient(to right,#7f16c9 0,#e8d6f5 100%);
	    background-repeat: repeat-x;
	}

	.bg-purple.bg-darken-2, .btn-purple.btn-darken-2 {
	    background-color: #7f16c9!important;
	}

	.bg-purple {
	    background-color: #b157f0!important;
	}
</style>
<script src="https://kit.fontawesome.com/6a2e8e265f.js" crossorigin="anonymous"></script>
</head>
<body>

 <!--  Load header value -->
  <?php  $this->load->view('BuroAdmin/includes/admin_header'); ?>
  <!-- Page header -->

	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-share2 position-left" style="zoom:1.4"></i>Quick Links</a></li>
			</ul>
			<ul class="breadcrumb-elements">
                <li><a href="<?= base_url('BA/PlanMaster'); ?>"><i class="icon-grid5 position-left"></i>Plan Master</a></li>
				<li><a href="<?= base_url('BA/Module'); ?>"><i class="icon-store2 position-left"></i>Module Master</a></li>
				<li><a href="<?= base_url('BA/BuroCustomer/SubscribedCustomer'); ?>"><i class="icon-user-check position-left"></i>SUbscribed Customer</a></li>
				<li><a href="<?= base_url('BA/BuroCustomer/TrialCustomer'); ?>"><i class="icon-users2 position-left"></i>Trial Customer</a></li>
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
         <?php  $this->load->view('BuroAdmin/includes/sidebar'); ?>


			<div class="content-wrapper">
					<div class="row">
					  <div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">	
								
							</div>
							<div class="container-fluid">
		                        <div class="row">
									<div class="col-lg-4">
									   <div class="col-xl-12">
									        <div class="card">
									            <div class="card-content">
									                <div class="media align-items-stretch">
									                    <div class="p-2 text-center bg-primary bg-darken-2">
									                        <i class=" icon-calendar52 font-large-2 white"></i>
									                    </div>
									                    <div class="p-2 bg-gradient-x-primary white media-body">
                                                            <a href="<?= base_url('BA/BuroCustomer/AllCustomer');?>" style="color:white;">
                                                                <h4>Total Customer</h4>
                                                                <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>
                                                                <?= $summaryarray['totalcount']; ?>
                                                                </h5>
                                                            </a>
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
									</div>
									<div class="col-lg-4">
									   <div class="col-xl-12">
									        <div class="card">
									            <div class="card-content">
									                <div class="media align-items-stretch">
									                    <div class="p-2 text-center bg-danger bg-darken-2">
									                        <i class="icon-calendar2 font-large-2 white"></i>
									                    </div>
									                    <div class="p-2 bg-gradient-x-danger white media-body">
										                    <a href="<?= base_url('BA/BuroCustomer/SubscribedCustomer');?>" style="color:white;">
										                        <h4>Subscribed Customer</h4>
										                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>
										                           <?= $summaryarray['paidcount']; ?>
										                        </h5>
										                   </a>     
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
									</div>
									<div class="col-lg-4">
									   <div class="col-xl-12">
									        <div class="card">
									            <div class="card-content">
									                <div class="media align-items-stretch">
									                    <div class="p-2 text-center bg-success bg-darken-2">
									                        <i class="icon-cash4 font-large-2 white"></i>
									                    </div>
									                    <div class="p-2 bg-gradient-x-success white media-body">

									                    	<a href="<?= base_url('BA/BuroCustomer/TrialCustomer');?>" style="color:white;">
									                        <h4>Trial Customer</h4>
									                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>
									                          <?= $summaryarray['trialcount']; ?>
									                        </h5>
									                       </a>
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-4">
									   <div class="col-xl-12">
									        <div class="card">
									            <div class="card-content">
									                <div class="media align-items-stretch">
									                    <div class="p-2 text-center bg-purple bg-darken-2">
                                                        <i class="fa fa-circle-question" style="color: #ffffff; font-size:50px"></i>
									                    </div>
									                    <div class="p-2 bg-gradient-x-purple white media-body">
                                                            <a href="<?= base_url('BA/BuroCustomer/UnverifiedCustomer');?>" style="color:white;">
									                        <h4>Unverified Customer</h4>
									                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>
									                        <?= $summaryarray['unverifiedcount']; ?>
									                        </h5>
									                    </div>
									                </div>
									            </div>
									        </div>
									    </div>
									</div>	
								</div>
							</div>
							<div id="messages-stats"></div>

					       </div>		
						</div>
				     </div>		
			     </div>
				<!-- /dashboard content -->

		</div>
		<!-- /page content -->

		<!-- Footer -->
          <?php  $this->load->view('BuroAdmin/includes/admin_footer'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->
  </body>

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
         text: 'Leads/Opportunities by Stages<br/><p style="font-size:12px;color:#FF5732;">Current Year (Jan 2019 - 31 Dec 2019)</p>'
    },
credits:{
 enabled:false,
},
    // plotOptions: {
    //     series: {
    //         dataLabels: {
    //             enabled: true,
    //             // format: '<b>{point.name}</b> ({point.y:})',
    //             // allowOverlap: true,
    //             y: 10
    //         },
    //         neckWidth: '30%',
    //         neckHeight: '25%',
    //         width: '80%',
    //         height: '80%'
    //     }
    // },

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
        text: 'Leads/Opportunities by Owners<br/><p style="font-size:12px;color:#FF5732;">Current Year (Jan 2019 - 31 Dec 2019)</p>'
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
    drilldown: {
        series: [
            {
                name: "Chrome",
                id: "Chrome",
                data: [
                    [
                        "v65.0",
                        0.1
                    ],
                    [
                        "v64.0",
                        1.3
                    ],
                    [
                        "v63.0",
                        53.02
                    ],
                    [
                        "v62.0",
                        1.4
                    ],
                    [
                        "v61.0",
                        0.88
                    ],
                    [
                        "v60.0",
                        0.56
                    ],
                    [
                        "v59.0",
                        0.45
                    ],
                    [
                        "v58.0",
                        0.49
                    ],
                    [
                        "v57.0",
                        0.32
                    ],
                    [
                        "v56.0",
                        0.29
                    ],
                    [
                        "v55.0",
                        0.79
                    ],
                    [
                        "v54.0",
                        0.18
                    ],
                    [
                        "v51.0",
                        0.13
                    ],
                    [
                        "v49.0",
                        2.16
                    ],
                    [
                        "v48.0",
                        0.13
                    ],
                    [
                        "v47.0",
                        0.11
                    ],
                    [
                        "v43.0",
                        0.17
                    ],
                    [
                        "v29.0",
                        0.26
                    ]
                ]
            },
            {
                name: "Firefox",
                id: "Firefox",
                data: [
                    [
                        "v58.0",
                        1.02
                    ],
                    [
                        "v57.0",
                        7.36
                    ],
                    [
                        "v56.0",
                        0.35
                    ],
                    [
                        "v55.0",
                        0.11
                    ],
                    [
                        "v54.0",
                        0.1
                    ],
                    [
                        "v52.0",
                        0.95
                    ],
                    [
                        "v51.0",
                        0.15
                    ],
                    [
                        "v50.0",
                        0.1
                    ],
                    [
                        "v48.0",
                        0.31
                    ],
                    [
                        "v47.0",
                        0.12
                    ]
                ]
            },
            {
                name: "Internet Explorer",
                id: "Internet Explorer",
                data: [
                    [
                        "v11.0",
                        6.2
                    ],
                    [
                        "v10.0",
                        0.29
                    ],
                    [
                        "v9.0",
                        0.27
                    ],
                    [
                        "v8.0",
                        0.47
                    ]
                ]
            },
            {
                name: "Safari",
                id: "Safari",
                data: [
                    [
                        "v11.0",
                        3.39
                    ],
                    [
                        "v10.1",
                        0.96
                    ],
                    [
                        "v10.0",
                        0.36
                    ],
                    [
                        "v9.1",
                        0.54
                    ],
                    [
                        "v9.0",
                        0.13
                    ],
                    [
                        "v5.1",
                        0.2
                    ]
                ]
            },
            {
                name: "Edge",
                id: "Edge",
                data: [
                    [
                        "v16",
                        2.6
                    ],
                    [
                        "v15",
                        0.92
                    ],
                    [
                        "v14",
                        0.4
                    ],
                    [
                        "v13",
                        0.1
                    ]
                ]
            },
            {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v50.0",
                        0.96
                    ],
                    [
                        "v49.0",
                        0.82
                    ],
                    [
                        "v12.1",
                        0.14
                    ]
                ]
            }
        ]
    }
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


        //
        // Append chart elements
        //

        // Paths
        // ------------------------------

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


        // Text
        // ------------------------------

        // Percentage text value
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

        // Animation
        // ------------------------------
        // Animate path
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


</html>
