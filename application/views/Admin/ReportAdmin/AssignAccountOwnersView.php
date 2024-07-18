<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Account Owners</title>
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
      </style>
</head>

<body style="overflow-x: hidden;">
    <?php  $this->load->view('Admin/includes/admin_header'); ?>
        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <ul class="list-inline list-inline-condensed no-margin-bottom">    
                      <li><a href="#" class="btn btn-link btn-sm legitRipple"><i class="icon-stats-growth position-left"></i> Reports</a></li>          
                      <li class="dropdown">
                        <a href="#" class="btn btn-link btn-sm dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
                          <i class="icon-address-book2 position-left"></i> Contact <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/SegmentWiseContact');?>">
                             <i class="icon-vcard"></i> Segments wise Contacts</a>
                           </li>   

                           <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners');?>" >
                             <i class="icon-user-tie"></i> Account Owners</a>
                           </li>

                           <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/LocationWiseContact');?>" >
                             <i class="icon-map"></i> Location wise Contact</a>
                           </li>

                           <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/TypewiseContact');?>" >
                             <i class="icon-toggle"></i> Type wise Contact</a>
                           </li>


                           <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivities');?>" >
                             <i class="icon-file-presentation"></i> Contacts with Activities Details</a>
                           </li>
                           
                        </ul>
                      </li>
                       <li><a  href="<?php echo base_url('admin/ReportAdmin/Reports/AccountOwners');?>" class="btn btn-link btn-sm legitRipple">
                         <i class="icon-user-tie"></i> Account Owners</a>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Page container -->
        <div class="page-container">
            <div class="page-content">
                <!-- Main sidebar -->
                <?php  $this->load->view('Admin/includes/sidebar'); ?>
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
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading table_header">
                                            <h5 class="panel-title" style="color:white">Account Owners</h5>
                                        </div>
                                        <div class="row">
                                               <div class="col-md-12" id="all_activity_filter" style="margin-top: 10px;">                  
                                                   <form method="post" class="form-horizontal" id="get_data_form">   
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                              <label class="col-sm-3 control-label">Segments:</label>
                                                              <div class="col-sm-9">
                                                                  <div class="input-group date">
                                                                      <span class="input-group-addon"><i class="icon-hour-glass"></i></span>   
                                                                     <div class="multi-select-full">
                                                                        <select  class="multiselect-select-all" multiple="multiple"  name="EmpArray[]">
                                                                          <?php
                                                                          foreach ($EmpArray as  $row) 
                                                                          {
                                                                          ?>
                                                                          <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                                                        <?php }?>
                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                              <label class="col-sm-2 control-label">Type:</label>
                                                              <div class="col-sm-10">
                                                                  <div class="input-group date">
                                                                      <span class="input-group-addon"><i class="icon-users4"></i></span>   
                                                                     <div class="multi-select-full">
                                                                        <select  class="form-control"  name="cust_type" id="cust_type">
                                                                           <option value="All">Customer Type</option>
                                                                           <option value="All">All</option>
                                                                           <option value="Primary">Primary</option>
                                                                           <option value="Secondary">Secondary</option>
                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-1">  
                                                           <button class="btn btn-primary" type="submit" style="padding: 6px 30px;">Submit</button>
                                                        </div>
                                                        <div class="col-md-1">  
                                                            <span id="loader_gif"></span>
                                                        </div>                     
                                                    </form> 
                                                    
                                                 </div>  

                                                <div class="col-md-12">
                                                   <hr style="border: 1px solid #2912121a;margin-top: -5px;margin-bottom: -20px;"/> 
                                                    <table class="table" id="default_issue_table">     
                                                      <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Employee</th>
                                                            <th>Nos. of Accounts</th>
                                                            <th class="hidden">Sucess Ratio</th>
                                                            <th class="hidden">Total Revenue</th>
                                                            <th class="hidden">Average Lead per Lead</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                              $count = 1;
                                                              foreach($AccountOwners as $row) 
                                                              {                       
                                                            ?>
                                                            <tr>
                                                                <td><?= $count; ?></td>
                                                                <td><?= $row['emp_name'] ?></td>
                                                                <td><a  title="Segments wise Contacts"  onclick="ViewDetails(id)" id="<?= $row['emp_id'] ?>"><b><?= $row['total'] ?></b></a></td> 
                                                                <td class="hidden">1</td>
                                                                <td class="hidden">1</td> 
                                                                <td class="hidden">1</td>
                                                            </tr>
                                                           <?php $count++;  } ?> 
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
            <div class="modal-content" id="ViewDetailsModalData">

            </div>
        </div>
    </div>
<!--  -->
<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
</body>

<script type="text/javascript">  
  function ViewDetails(emp_id)
  {
      var cust_type=$("#cust_type").val();
      var datastring='emp_id='+emp_id+'&cust_type='+cust_type;
    //   alert(datastring);
    //   return
      $.ajax({
              url: "<?php echo base_url('admin/ReportAdmin/Reports/AccountOwnersDetails'); ?>",
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
</script>

<script type="text/javascript">
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
                  var datanew=$('#get_data_form').serialize();
                  $.ajax({

                    url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeAssignAccountOwners'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                          //------------------------------------------------
                          $.ajax({
                                  url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeAccountOwnersGraph'); ?>",
                                  type: "POST",
                                  data: datanew,
                                  success: function(responsedata)
                                  {
                                    var responsedata=$.trim(responsedata);
                                    // alert(responsedata);
                                    var json = $.parseJSON(responsedata);
                                    plotgraph(json);
                                  },
                                  error: function() 
                                  {
                                    alert('fail');
                                  }           
                           });
                        //------------------------------------------------------------
                          $("#loader_gif").hide();  
                          $("#default_issue_table").hide();
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
        text: 'Account Owners <br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                        foreach ($AccountOwners as $Employee) 
                       {
                   ?>
                    {
                        name: '<?= $Employee['emp_name']; ?>',
                        y: <?= $Employee['total']; ?>
                        // drilldown: "Chrome"
                    },
             <?php } ?>  
            ]
        }
    ],
});



 function plotgraph(json)
  {
      // Create the chart
      Highcharts.chart('container3', {
          chart: {
              type: 'line'
          },
        credits:{
         enabled:false,
        },
           
          title: {
              text: 'Account Owners <br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                  data: json
              }
          ],
      });

  }

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