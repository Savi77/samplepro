<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Lead | Opportunity - Monthly Counts</title>
    <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
      <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
      <link href="<?= base_url() ?>assets/admin/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/jquery-ui.js"></script>
      <!-- /theme JS files -->
      <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switchery.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/switch.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/highcharts-3d.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/cylinder.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/funnel3d.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/exporting.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/export-data.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/data.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/highchart/drilldown.js"></script>

      <script src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
      <script src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
      <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

      <style type="text/css">        
        .modal-body 
          {
            position: relative !important;
            padding-top: -14px !important; 
            padding: 0px !important;
         }
        select[name='ajax_table_length'],select[name='all_activity_filter_table_length'] 
        {
              margin-top: 8px !important;
        }
        .datatable-header, .datatable-footer 
        {
            /*padding-top: 0px !important;*/
        }
      </style>
      <!--  -->

     <style type="text/css">       
      .panel-flat > .panel-heading
       {
            padding-top: 20px !important;
            padding-bottom:20px !important;
       }
      .dataTables_wrapper 
      {
          padding: 10px !important;
      }
      .form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline 
      {
          padding-top: 0px !important;
      }
      .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
          padding: 8px 13px !important;
      }
      .page-title 
      {
          padding: 7px 30px 10px 0px  !important;
      }
      .list-inline-condensed > li 
      {
          padding-right: 0px !important;
      }

      @media (min-width: 1025px){
                  .modal-lg {
                      width: 99% !important;
                  }
          }
          .page-header-content {
			position: relative;
			background-color: inherit;
			padding: 18px 23px !important;
			top: -11px;
		}

		.heading-elements {
			background-color: inherit;
			position: absolute;
			top: 50%;
			right: 20px;
			height: 36px;
			margin-top: -10px;
		}

		.list-inline {
			margin-left: 265px;
			font-size: 0;
		}

		.page-title {
			padding: 0px 30px 6px 0px !important;
			top: 17px;
		}

      </style>
</head>


<body style="overflow-x: hidden;">

    <?php  $this->load->view('Admin/includes/admin_header'); ?>
    <?php
          $ExportBtn=0;

          foreach ($user_permission as $priviledge) 
          {
            $priviledge_key=$priviledge->priviledge_key;
            $status=$priviledge->status;
            if ($priviledge_key=='EXPORT')
            {
                if($status==1)
                { ?>
                  <style>
                      .dt-buttons {
                          float: right;
                          display: inline-block;
                          margin: 0 0 20px 20px;
                      }
                  </style>
               <?php } 
                else
                { ?>
                  <style>
                    .dt-buttons {
                        float: right;
                        display: none;
                        margin: 0 0 20px 20px;
                    }
                </style>
              <?php  }
            }     
          }
      ?>
        <!-- Page header -->
        
        <!-- /page header -->

        <!-- Page container -->
        <div class="page-container">
            <div class="page-content">
                <!-- Main sidebar -->
                <?php  $this->load->view('Admin/includes/sidebar'); ?>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row">
                            <div class="page-header">

<div class="page-header-content">

  <?php $this->load->view('Admin/includes/panel'); ?>

  <div class="page-title">
    <h4>
      <i class="icon-arrow-left52 position-left"></i>
      <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span
          class="text-semibold">Dashboard</span></a> -
      <a href="<?php echo base_url('admin/ReportAdmin/Reports/ReportViewCard');?>">
        <span class="text-semibold">Reports</span></a>
      - Lead | Opportunity - Monthly Counts
    </h4>
  </div>

</div>
</div>
                                <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading table_header">
                                            <h5 class="panel-title" style="color:white">Lead | Opportunity - Monthly Counts</h5>
                                        </div>
                                        <div class="row">
                                               <div class="col-md-12" id="all_activity_filter" style="margin-top: 10px;">                  
                                                   <form method="post" class="form-horizontal" id="get_data_form">
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label class="col-sm-2 control-label">From:<span style="color: red;">*</span></label>
                                                              <div class="col-sm-10">
                                                                  <div class="input-group date">
                                                                      <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                      <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('01 M Y');?>">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label class="col-sm-2 control-label" >To:<span style="color: red;">*</span></label>
                                                              <div class="col-sm-10">
                                                                  <div class="input-group date">
                                                                      <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                      <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y');?>">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>

                                                      <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="icon-paste3"></i></span>
                                                                   <div class="multi-select-full">
                                                                    <select  class="form-control"  name="customer_type" id="customer_type">
                                                                       <option value="All" selected>Type</option>
                                                                       <option value="All" >All</option>
                                                                       <option value="Lead">Lead</option>
                                                                       <option value="Opportunity">Opportunity</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>

                                                        <div class="col-md-1">  
                                                           <button class="btn btn-primary" type="submit">Submit<span id="loader_gif"></span></button>
                                                        </div>                  
                                                    </form> 
                                                    
                                                 </div>  

                                                <div class="col-md-12">
                                                   <hr style="border: 1px solid #2912121a;margin-top: -5px;margin-bottom: -20px;"/> 
                                                    <table class="table datatable-basic" id="default_issue_table">     
                                                    

                                                        <thead>
                                                              <tr>
                                                                  <th>Type</th>
                                                                  <?php   
                                                                      for($i=0;$i<count($LeadOppByMonthlyCounts);$i++)
                                                                      {
                                                                        $array=$LeadOppByMonthlyCounts[$i];
                                                                        for($j=0;$j<count($array);$j++)
                                                                         {
                                                                    ?> 
                                                                    <th><?= $array[$j]['month_name'].' '.$array[$j]['year'] ?></th>
                                                                  <?php  }  break;} ?>
                                                              </tr>
                                                        </thead>
                                                        <tbody>
                                                              <?php  
                                                                  $ff=0; 
                                                                  for($a=0;$a<count($LeadOppByMonthlyCounts);$a++)
                                                                  { 
                                                                    ?>
                                                                  <tr>
                                                                      <td>
                                                                         <?= $LeadOppByMonthlyCounts[$a][0]['customer_type']; ?>
                                                                      </td>
                                                                  <?php  
                                                                    $array=$LeadOppByMonthlyCounts[$a];
                                                                    for($b=0;$b<count($array);$b++)
                                                                     {
                                                                ?> 
                                                                    <td>
                                                                      <a  onclick="ViewDetails(id)" id="<?= $array[$b]['month'].'|'.$array[$b]['year'].'|'.$array[$b]['customer_type'];?>"><b><?= $array[$b]['total'] ?></b></a>
                                                                    </td>
                                                              <?php  } ?>  </tr> <?php $ff++; } ?>                     
                                                              
                                                        </tbody>

                                                    </table>
                                                 </div>
                                          <div class="col-md-12" id="rsdata"></div>  

                                          <div class="col-md-12">
                                              <div class=" panel-body">
                                                 <div id="container3" style="min-width: 400px; height: 350px; margin: 0 auto"></div>
                                              </div>
                                              <br/>
                                              <br/>
                                          </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


  <!-- View Modal -->
    <div id="ViewDetailsModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"  id="ViewDetailsModalData">

            </div>
        </div>
    </div>
<!--  -->
<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->

</body>


<script type="text/javascript">
  
  function ViewDetails(ids)
  {
      var start_date=$("#start_date").val();
      var end_date=$("#end_date").val();
      var customer_type=$("#customer_type").val();
      var datastring='ids='+ids+'&start_date='+start_date+'&end_date='+end_date+'&customer_type='+customer_type;
      // alert(datastring);

      $.ajax({
              url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewMonthlyDetails'); ?>",
              type: "POST",
              data: datastring,
              success: function(data)
                {
                    $("#ViewDetailsModalData").html(data);
                    $("#ViewDetailsModal").modal();
                    $('#ajax_table').DataTable({
                        buttons: {            
                            dom: {
                                button: {
                                    className: 'btn btn-default'
                                }
                            },
                            buttons: [
                                'copyHtml5',
                                'excelHtml5',
                                'csvHtml5',
                                'pdfHtml5'
                            ]
                        }
                    });                
                 },
                error: function() 
                {
                  alert('fail');
                }           
       });
  }

$(document).ready(function (e)
   {
     $("#get_data_form").on('submit',(function(e)
         {  
           //e.preventDefault();
           if (e.isDefaultPrevented())
            {
              //alert('invalid');
            }
            else
            {
                  $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                  $("#loader_gif").show();                    
                  $.ajax({

                    url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeLeadOppByMonthlyCounts'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                          $("#loader_gif").hide();  
                          $("#rsdata").html(data);
                          $('#all_activity_filter_table').DataTable({
                              buttons: {            
                                  dom: {
                                      button: {
                                          className: 'btn btn-default'
                                      }
                                  },
                                  buttons: [
                                      'copyHtml5',
                                      'excelHtml5',
                                      'csvHtml5',
                                      'pdfHtml5'
                                  ]
                              }
                          });

                          $('#default_issue_table').dataTable().fnClearTable();
                          $('#default_issue_table').dataTable().fnDestroy();
                          $("#default_issue_table").hide();

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
  $(function () 
  {
     $("#start_date").datepicker({changeMonth: true,changeYear: true,dateFormat: "d M yy"});
     $("#end_date").datepicker({changeMonth: true,changeYear: true,dateFormat: "d M yy"});
  });
</script>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container3', {
    chart: {
        type: 'line'
    },
  credits:{
   enabled:false,
  },
     
    title: {
        text: 'Lead | Opportunity - Monthly Counts<br/><p style="font-size:12px;color:#FF5732;"></p>'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    // },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total'
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
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
    },

    series: [
        {
            name: "Source",
            colorByPoint: true,
            data: [
                    <?php 
                        foreach ($LeadOppByStage as $Employee) 
                       {
                   ?>
                    {
                        name: '<?= $Employee['stage_title']; ?>',
                        y: <?= $Employee['total']; ?>                        
                    },
             <?php } ?>  
            ]
        }
    ],
});

</script>

<script type="text/javascript">
  $(function() {

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });

    // Basic initialization
    $('#default_issue_table').DataTable({
        buttons: {            
            dom: {
                button: {
                    className: 'btn btn-default'
                }
            },
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        }
    });

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
</script>

</html>