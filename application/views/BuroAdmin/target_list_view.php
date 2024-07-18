
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Admin/includes/header'); ?>

  <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
     <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

      <!-- /theme JS files -->

        <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>

   
    
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>


    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
  <!-- /theme JS files -->

    <!-- <script type="text/javascript" src="assets/admin/assets/js/pages/datatables_responsive.js"></script> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <!-- /theme JS files -->

  <!--============================ Date picker adjustment ================================ -->

  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }

    .dataTables_length > label > span:first-child
      {
        float: left;
        margin: 5px 9px;
        margin-left: -15px;
      }
    .datatable-header > div:first-child, .datatable-footer > div:first-child 
    {
        margin-left: 9px !important;
        left: -13px !important;
    }

    input, button, select, textarea 
    {
        height: auto !important;
    }
      .btn-info 
      {
          color: #fff;
          background-color: rgba(236, 14, 39, 0.77) !important;
          border-color: rgba(236, 14, 39, 0.77) !important;
      }
      .nav-tabs > li > a 
     {
        margin-right: 0;
        color: #ddd !important;
     }

     table.dataTable thead th, table.dataTable thead td 
     {
        padding: 10px 6px;
        border-bottom: 1px solid #111;
    }

  </style>
  <!--============================ / Date picker adjustment ================================ -->

  <!--============================ previous date hide datepicker color changes================================ -->
  <style type="text/css">
  .ui-datepicker table td.ui-state-disabled span 
  {
    color: #2d2d2d;
  }
  .ui-datepicker table td.ui-datepicker-today .ui-state-highlight 
  {
    background-color: #2196F3;
    color: #252424;
  }
   .testing 
  {
    z-index: 100000;
  }
  .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
    font-size: 12px;
    color: #333232;
    margin-left: 5px;
}

.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span
 {
    display: none !important;
 }

 .ui-datepicker table td.ui-datepicker-current-day .ui-state-active 
 {
    background-color: #26A69A;
    color: #333;
}

</style>
<!--============================ / previous date hide datepicker color changes================================ -->
  <style type="text/css">
  
  .daterange-single 
  {
    z-index: 100000;
  }

/*  Display datepicker on modal (popup)  */

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

</style>
<!--========================= Multiple target type assign to employee ===================================-->
<style type="text/css">
  input[type="radio"], input[type="checkbox"] 
  {
    margin: 10px 0 0;
    margin-top: 1px \9;
    line-height: normal;
  }
  .form-horizontal .form-group .form-group 
  {
    /*margin-left: -15px;*/
    margin-right: 0;
  }
</style>
<!--========================= / Multiple target type assign to employee ===================================-->
</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>


    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Target List
        </h4>
      </div>
     <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
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
      <!--  -->
      <!-- Main content -->
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
        <!-- Basic responsive configuration -->
            <div class="panel panel-flat">
              <div class="panel-heading table_header">
                <h5 class="panel-title" style="color:white">Target</h5>
                <div class="heading-elements">
                  <td> 
                     <!-- <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#interest_model">
                        <span class="glyphicon glyphicon-plus-sign" data-popup="tooltip" title="Add Client" data-placement="bottom" style=" font-size: 25px; margin-top: -8px;"></span>
                      </a> -->
                   </td>
                </div>
              </div>

              <table class="table datatable-save-state">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Target Period</th>
                    <th>Target Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Allocated Employee</th>
                    <th>Created Date</th>
                    <th class="hidden">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                          $count = 1;
                          foreach($target_list as $row) { ?>
                          <tr>
                            <td ><?php echo $count ?></td>
                            <td ><?= $row['target_period'] ?></td>
                            <td ><?= $row['target_type'] ?></td>
                            <td><?= date("d M Y", strtotime($row['start_date'])); ?></td>
                            <td><?= date("d M Y", strtotime($row['end_date'])); ?></td>
                            <td ><?= $row['emp_list'] ?></td>
                            <td><?= date("d M Y", strtotime($row['date_created'])); ?></td>
                            <td class="hidden"> </td>
                            <td class="text-center">
                               <ul class="icons-list">
                                  <li><a onclick="view_employee(id)" id="<?= $row['tr_auto_id'] ?>"><span class="label bg-info" style="line-height: 20px;"><i class="glyphicon glyphicon-eye-open" style="font-size: 12px;" data-toggle="tooltip" title="View Allocated Employee List" data-placement="bottom"></i></span></a></li>
                                  <li><a data-toggle="modal" onclick="edit_target(id)" id="<?= $row['tr_auto_id'] ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Type" data-placement="bottom"></i></span></a></li>

                                  <li><a onclick="delete_target(id)" id="<?= $row['tr_auto_id'] ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Type" data-placement="bottom"></i></span></a></li>
                              </ul>
                            </td>
                          </tr>
                        <?php $count++; } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
      </div>
    </div>
</div>

        <!-- /basic responsive configuration -->

              <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"> Create Target</h6>
                            </div>

                            <div class="modal-body">
                              <form class="form-horizontal" id="Target_Form">
                                      <div class="row">
                                           <div class="form-group">
                                               <label class="control-label col-sm-2" for="Youtube">Target Period <span style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                      <select class="form-control" name="target_period" id="target_period" onchange="mainInfo()">
                                                                <option value=""> - Select - </option>
                                                                <option value="Daily">Daily</option>
                                                                <option value="Weekly">Weekly</option>
                                                                <option value="Fortnightly">Fortnightly</option>
                                                                <option value="Monthly">Monthly</option>
                                                                <option value="Quarterly">Quarterly</option>
                                                                <option value="Half Yearly">Half Yearly</option>
                                                                <option value="Yearly">Yearly</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div id="onchange_display" style="display: none">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="Youtube">Start Date <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                      <input type="text" class="form-control" id="start_date" name="start_date" onchange="startdate_result()" value="<?= date("d F Y") ?>">
                                                    </div>
                                                    <label class="control-label col-sm-2" for="Youtube">End Date <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                      <input type="text" class="form-control" id="end_date" name="end_date" onchange="enddate_result()">
                                                      <input type="text" style="display: none" class="form-control" id="end_date1" name="end_date1" onchange="enddate_result1()">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label class="control-label col-sm-2" for="Youtube">Target Type <span style="color: red;">*</span></label>
                                                      <div class="col-sm-10">
                                                            <select class="select-search form-control" name="targettype_id" id="targettype_id" onchange="mainInfo1()">
                                                                      <option value="">Select Target Type</option>
                                                                      <?php 
                                                                      foreach ($target_type->result() as $value2) 
                                                                      { ?>
                                                                            <option value="<?= $value2->targettype_id ?>"><?= $value2->target_type ?></option>
                                                                    <?php  } ?>
                                                            </select>
                                                      </div>
                                                </div>
                                                <input class="form-control" type="hidden" id="name_values" name="name_values">
                                                <input class="form-control" type="hidden" id="checked_index" name="checked_index">
                                                <div class="form-group" id="issuelistdetails" style="display: none">
                                                      <label class="control-label col-sm-2" for="Youtube">Employee list <span style="color: red;">*</span></label>
                                                      <div class="col-sm-10" id="issue_schedule_list" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">
                                                              
                                                      </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                      <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">Submit</button>
                                      </div>
                                      <div id="loader"></div>
                                    </div>
                              </form>
                           </div>
                    </div>
                  </div>
             </div>

             <div id="modal_default" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-info" style="background-color:#009FDF;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h6 class="modal-title">Edit Target</h6>
                        </div>

                        <div class="modal-body">
                            <div id="complaint_model_data">

                            </div>
                       </div>
                    </div>
                  </div>
            </div>
            <div id="modal_default1" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                            <div id="complaint_model_data1">

                            </div>
                    </div>
                  </div>
            </div>
<!--========================== Date picker javascript ====================================-->
 <!--      <script type="text/javascript">
          $(function () 
          {
              $('#start_date').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now', useCurrent: true});
              $('#end_date').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now', useCurrent: true});
              $('#end_date1').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now', useCurrent: true});
          });
      </script> -->

      <script type="text/javascript">
         $('#start_date').change(function()
         {
              $('#Target_Form').bootstrapValidator('revalidateField', 'start_date'); 
          });

        $('#end_date').change(function()
        {
              $('#Target_Form').bootstrapValidator('revalidateField', 'end_date'); 
          });
      </script>

      <script language="javascript">
        $(document).ready(function () {
            $("#start_date").datepicker({
                dateFormat: "d MM yy",
                minDate: 0,
                useCurrent: true
            });
        });

        $(document).ready(function () {
            $("#end_date").datepicker({
                dateFormat: "d MM yy",
                minDate: 0,
                useCurrent: true
            });
        });

        $(document).ready(function () {
            $("#end_date1").datepicker({
                dateFormat: "d MM yy",
                minDate: 0,
                useCurrent: true
            });
        });
</script>
<!--========================== / Date picker javascript ====================================-->
<!--========================= Show hide div target creation ==================================-->
<script type="text/javascript">
   function displaydiv()
    {
      // alert();
         $('#onchange_display').show();         
    }
</script>

<!-- <script type="text/javascript">
  
  function getdate()
  {
      var tt = document.getElementById('txtDate').value;

      var date = new Date(tt);
      var newdate = new Date(date);

      newdate.setDate(newdate.getDate() + 3);
      
      var dd = newdate.getDate();
      var mm = newdate.getMonth() + 1;
      var y = newdate.getFullYear();

      var someFormattedDate = mm + '/' + dd + '/' + y;
      document.getElementById('follow_Date').value = someFormattedDate;
  }

</script> -->
<!--========================= / Show hide div target creation ==================================-->


<!--============================== date comparision and get employee list ================================-->

<script type="text/javascript">
  
      // $("#start_date").on("dp.change", function (e) 
      // {
      function startdate_result()
      {
              // alert();
              var startDate = document.getElementById("start_date").value;
              
              // alert(startDate);
              // $('#onchange_display').show();   
              if (startDate!='') 
              {
                    var target_period = document.getElementById("target_period").value;

                    // alert(target_period);

                    var date = new Date(startDate);
                    var newdate = new Date(date);

                    // alert(target_period);
                    if (target_period=='Daily') 
                    {
                         newdate.setDate(newdate.getDate() + 0);
                        // var add_days='0';
                    }
                    else if (target_period=='Weekly') 
                    {
                         newdate.setDate(newdate.getDate() + 7);
                        var add_days='7';
                        // $('#end_date').prop('readonly',true);
                        // $('#end_date').attr('readonly',true);
                        // alert(add_days);
                    }
                    else if (target_period=='Fortnightly') 
                    {
                         newdate.setDate(newdate.getDate() + 15);
                        // var add_days='15';
                    }
                    else if (target_period=='Monthly') 
                    {
                         newdate.setDate(newdate.getDate() + 30);
                        // var add_days='31';
                    }


                     if (target_period=='Daily') 
                    {
                        var endDate = document.getElementById("end_date").value;
                    }
                    else
                    {
                      var endDate = document.getElementById("end_date1").value;
                    }

                      const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                      ];

                      var dd = newdate.getDate();
                      var mm = newdate.getMonth();
                      var y = newdate.getFullYear();

                      const d = mm;
                      var full_month = monthNames[d];

                      var someFormattedDate = dd + ' ' + full_month + ' ' + y;
                      // alert(someFormattedDate);
                      if (target_period=='Daily')
                      {
                          $('#end_date1').hide(); 
                          $('#end_date').show();  
                          document.getElementById('end_date').value = someFormattedDate; 
                      }
                      else
                      {
                        $('#end_date').hide();
                        $('#end_date1').show(); 
                        document.getElementById('end_date1').value = someFormattedDate;
                      }
                      



                    // alert(startDate);
                    // return result;

                     if ((Date.parse(startDate) == Date.parse(endDate))) 
                    {
                        $('#desktopbutton').prop('disabled', false);
                        start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();

                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                              error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;

                                  }
                       // alert();

                    }
                    else if ((Date.parse(startDate) > Date.parse(endDate))) 
                    {

                        $('#desktopbutton').prop('disabled', true);
                        new PNotify({
                                       title: 'Event',
                                       text: 'End date should be greater than Start date',
                                       type: 'warning'
                                    });

                    }
                    else
                    {
                                $('#desktopbutton').prop('disabled', false);
                                 start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                 if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();
                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                                  error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;
                                }
                                else
                                {
                                    $('#issuelistdetails').hide();   
                                }
                    }  
              }
      }

      // $("#end_date").on("dp.change", function (e) 
      // {
      function enddate_result()
      {
                    // alert();
              var startDate = document.getElementById("start_date").value;
              var end_date = document.getElementById("end_date").value;
              
              // alert(startDate);
              // $('#onchange_display').show();   
              if (end_date!='') 
              {
                    var target_period = document.getElementById("target_period").value;

                    // alert(target_period);

                    var date = new Date(startDate);
                    var newdate = new Date(date);

                    // alert(target_period);
                    // if (target_period=='Daily') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 0);
                    //     // var add_days='0';
                    // }
                    // else if (target_period=='Weekly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 7);
                    //     var add_days='7';
                    //     // $('#end_date').prop('readonly',true);
                    //     // $('#end_date').attr('readonly',true);
                    //     // alert(add_days);
                    // }
                    // else if (target_period=='Fortnightly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 15);
                    //     // var add_days='15';
                    // }
                    // else if (target_period=='Monthly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 30);
                    //     // var add_days='31';
                    // }


                     if (target_period=='Daily') 
                    {
                        var endDate = document.getElementById("end_date").value;
                    }
                    else
                    {
                      var endDate = document.getElementById("end_date1").value;
                    }

                      // const monthNames = ["January", "February", "March", "April", "May", "June",
                      //   "July", "August", "September", "October", "November", "December"
                      // ];

                      // var dd = newdate.getDate();
                      // var mm = newdate.getMonth();
                      // var y = newdate.getFullYear();

                      // const d = mm;
                      // var full_month = monthNames[d];

                      // var someFormattedDate = dd + ' ' + full_month + ' ' + y;
                      // // alert(someFormattedDate);
                      // if (target_period=='Daily')
                      // {
                      //     $('#end_date1').hide(); 
                      //     $('#end_date').show();  
                      //     document.getElementById('end_date').value = someFormattedDate; 
                      // }
                      // else
                      // {
                      //   $('#end_date').hide();
                      //   $('#end_date1').show(); 
                      //   document.getElementById('end_date1').value = someFormattedDate;
                      // }
                      



                    // alert(startDate);
                    // return result;

                     if ((Date.parse(startDate) == Date.parse(endDate))) 
                    {
                        $('#desktopbutton').prop('disabled', false);
                        start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();

                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                              error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;

                                  }
                                   else
                                  {
                                      $('#issuelistdetails').hide();   
                                  }
                       // alert();

                    }
                    else if ((Date.parse(startDate) > Date.parse(endDate))) 
                    {

                        $('#desktopbutton').prop('disabled', true);
                        new PNotify({
                                       title: 'Event',
                                       text: 'End date should be greater than Start date',
                                       type: 'warning'
                                    });

                    }
                    else
                    {
                                $('#desktopbutton').prop('disabled', false);
                                 start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                 if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();
                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                                  error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;
                                }
                                else
                                {
                                    $('#issuelistdetails').hide();   
                                }
                    }  
              }
      }

    // $("#end_date1").on("dp.change", function (e) 
    //   {
      function enddate_result1()
      {
                    // alert();
              var startDate = document.getElementById("start_date").value;
              var end_date1 = document.getElementById("end_date1").value;
              
              // alert(end_date1);
              // $('#onchange_display').show();   
              if (end_date1!='') 
              {
                    var target_period = document.getElementById("target_period").value;

                    // alert(target_period);

                    var date = new Date(startDate);
                    var newdate = new Date(date);

                    // alert(target_period);
                    // if (target_period=='Daily') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 0);
                    //     // var add_days='0';
                    // }
                    // else if (target_period=='Weekly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 7);
                    //     var add_days='7';
                    //     // $('#end_date').prop('readonly',true);
                    //     // $('#end_date').attr('readonly',true);
                    //     // alert(add_days);
                    // }
                    // else if (target_period=='Fortnightly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 15);
                    //     // var add_days='15';
                    // }
                    // else if (target_period=='Monthly') 
                    // {
                    //      newdate.setDate(newdate.getDate() + 30);
                    //     // var add_days='31';
                    // }


                     if (target_period=='Daily') 
                    {
                        var endDate = document.getElementById("end_date").value;
                    }
                    else
                    {
                      var endDate = document.getElementById("end_date1").value;
                    }

                    //   const monthNames = ["January", "February", "March", "April", "May", "June",
                    //     "July", "August", "September", "October", "November", "December"
                    //   ];

                    //   var dd = newdate.getDate();
                    //   var mm = newdate.getMonth();
                    //   var y = newdate.getFullYear();

                    //   const d = mm;
                    //   var full_month = monthNames[d];

                    //   var someFormattedDate = dd + ' ' + full_month + ' ' + y;
                    //   alert(someFormattedDate);
                    //   if (target_period=='Daily')
                    //   {
                    //       $('#end_date1').hide(); 
                    //       $('#end_date').show();  
                    //       document.getElementById('end_date').value = someFormattedDate; 
                    //   }
                    //   else
                    //   {
                    //     $('#end_date').hide();
                    //     $('#end_date1').show(); 
                    //     document.getElementById('end_date1').value = someFormattedDate;
                    //   }
                      



                    // alert(startDate);
                    // return result;

                     if ((Date.parse(startDate) == Date.parse(endDate))) 
                    {
                        $('#desktopbutton').prop('disabled', false);
                        start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();

                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                              error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;

                                  }
                                  else
                                  {
                                      $('#issuelistdetails').hide();   
                                  }
                       // alert();

                    }
                    else if ((Date.parse(startDate) > Date.parse(endDate))) 
                    {

                        $('#desktopbutton').prop('disabled', true);
                        new PNotify({
                                       title: 'Event',
                                       text: 'End date should be greater than Start date',
                                       type: 'warning'
                                    });

                    }
                    else
                    {
                                $('#desktopbutton').prop('disabled', false);
                                 start_date = $('#start_date').val();
                                 // end_date = $('#end_date').val();
                                 if (target_period=='Daily') 
                                {
                                    var end_date = document.getElementById("end_date").value;
                                }
                                else
                                {
                                  var end_date = document.getElementById("end_date1").value;
                                }
                                 targettype_id = $('#targettype_id').val();
                                 if (end_date!='' && targettype_id !='') 
                                 {
                                     var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                                     // alert(datastring);
                                          $.ajax({
                                              type: "post",
                                              url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                              cache: false,    
                                              data: datastring,
                                              success: function(data)
                                              {    
                                                // alert(data);
                                                  $('#issuelistdetails').show();      
                                                  $('#issue_schedule_list').html(data);

                                                
                                               },
                                                  error: function(){      
                                                   alert('Error while request..');
                                                  }
                                               });
                                              return false;
                                }
                                else
                                {
                                    $('#issuelistdetails').hide();   
                                }
                    }  
              }
      }
</script>



<script type="text/javascript">

function mainInfo()
{
    // alert();
    var startDate = document.getElementById("start_date").value;
    
    // alert(startDate);
    $('#onchange_display').show();   
    if (startDate!='') 
    {
          var target_period = document.getElementById("target_period").value;

          // alert(target_period);

          var date = new Date(startDate);
          var newdate = new Date(date);

          // alert(target_period);
          if (target_period=='Daily') 
          {
               newdate.setDate(newdate.getDate() + 0);
              // var add_days='0';
          }
          else if (target_period=='Weekly') 
          {
               newdate.setDate(newdate.getDate() + 7);
              var add_days='7';
              // $('#end_date').prop('readonly',true);
              // $('#end_date').attr('readonly',true);
              // alert(add_days);
          }
          else if (target_period=='Fortnightly') 
          {
               newdate.setDate(newdate.getDate() + 15);
              // var add_days='15';
          }
          else if (target_period=='Monthly') 
          {
               newdate.setDate(newdate.getDate() + 30);
              // var add_days='31';
          }
          else if (target_period=='Quarterly') 
          {
               newdate.setDate(newdate.getDate() + 121);
              // var add_days='31';
          }
          else if (target_period=='Half Yearly') 
          {
               newdate.setDate(newdate.getDate() + 183);
              // var add_days='31';
          }
          else if (target_period=='Yearly') 
          {
               newdate.setDate(newdate.getDate() + 365);
              // var add_days='31';
          }


          if (target_period=='Daily') 
          {
              var endDate = document.getElementById("end_date").value;
          }
          else
          {
            var endDate = document.getElementById("end_date1").value;
          }

            const monthNames = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"
            ];

            var dd = newdate.getDate();
            var mm = newdate.getMonth();
            var y = newdate.getFullYear();

            const d = mm;
            var full_month = monthNames[d];

            var someFormattedDate = dd + ' ' + full_month + ' ' + y;
            // alert(someFormattedDate);
            if (target_period=='Daily')
            {
                $('#end_date1').hide(); 
                $('#end_date').show();  
                document.getElementById('end_date').value = someFormattedDate; 
            }
            else
            {
              $('#end_date').hide();
              $('#end_date1').show(); 
              document.getElementById('end_date1').value = someFormattedDate;
            }
            



          // alert(startDate);
          // return result;

           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
              $('#desktopbutton').prop('disabled', false);
              start_date = $('#start_date').val();
                       // end_date = $('#end_date').val();
                      if (target_period=='Daily') 
                      {
                          var end_date = document.getElementById("end_date").value;
                      }
                      else
                      {
                        var end_date = document.getElementById("end_date1").value;
                      }
                       targettype_id = $('#targettype_id').val();

                       if (end_date!='' && targettype_id !='') 
                       {
                           var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                           // alert(datastring);
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                    cache: false,    
                                    data: datastring,
                                    success: function(data)
                                    {    
                                      // alert(data);
                                        $('#issuelistdetails').show();      
                                        $('#issue_schedule_list').html(data);

                                      
                                     },
                                    error: function(){      
                                         alert('Error while request..');
                                        }
                                     });
                                    return false;

                        }
                        else
                        {
                            $('#issuelistdetails').hide();   
                        }
             // alert();

          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {

              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });

          }
          else
          {
                      $('#desktopbutton').prop('disabled', false);
                       start_date = $('#start_date').val();
                       // end_date = $('#end_date').val();
                       if (target_period=='Daily') 
                      {
                          var end_date = document.getElementById("end_date").value;
                      }
                      else
                      {
                        var end_date = document.getElementById("end_date1").value;
                      }
                       targettype_id = $('#targettype_id').val();
                       if (end_date!='' && targettype_id !='') 
                       {
                           var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                           // alert(datastring);
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                    cache: false,    
                                    data: datastring,
                                    success: function(data)
                                    {    
                                      // alert(data);
                                        $('#issuelistdetails').show();      
                                        $('#issue_schedule_list').html(data);

                                      
                                     },
                                        error: function(){      
                                         alert('Error while request..');
                                        }
                                     });
                                    return false;
                      }
                      else
                      {
                          $('#issuelistdetails').hide();   
                      }
          }  
    }
}


function mainInfo1()
{
    // alert();
    var startDate = document.getElementById("start_date").value;
    
    // alert(startDate);
    $('#onchange_display').show();   
    if (startDate!='') 
    {
          var target_period = document.getElementById("target_period").value;

          // alert(target_period);

          var date = new Date(startDate);
          var newdate = new Date(date);

          // // alert(target_period);
          // if (target_period=='Daily') 
          // {
          //      newdate.setDate(newdate.getDate() + 0);
          //     // var add_days='0';
          // }
          // else if (target_period=='Weekly') 
          // {
          //      newdate.setDate(newdate.getDate() + 7);
          //     var add_days='7';
          //     // $('#end_date').prop('readonly',true);
          //     // $('#end_date').attr('readonly',true);
          //     // alert(add_days);
          // }
          // else if (target_period=='Fortnightly') 
          // {
          //      newdate.setDate(newdate.getDate() + 15);
          //     // var add_days='15';
          // }
          // else if (target_period=='Monthly') 
          // {
          //      newdate.setDate(newdate.getDate() + 30);
          //     // var add_days='31';
          // }


           if (target_period=='Daily') 
          {
              var endDate = document.getElementById("end_date").value;
          }
          else
          {
            var endDate = document.getElementById("end_date1").value;
          }

            // const monthNames = ["January", "February", "March", "April", "May", "June",
            //   "July", "August", "September", "October", "November", "December"
            // ];

            // var dd = newdate.getDate();
            // var mm = newdate.getMonth();
            // var y = newdate.getFullYear();

            // const d = mm;
            // var full_month = monthNames[d];

            // var someFormattedDate = dd + ' ' + full_month + ' ' + y;
            // // alert(someFormattedDate);
            // if (target_period=='Daily')
            // {
            //     $('#end_date1').hide(); 
            //     $('#end_date').show();  
            //     document.getElementById('end_date').value = someFormattedDate; 
            // }
            // else
            // {
            //   $('#end_date').hide();
            //   $('#end_date1').show(); 
            //   document.getElementById('end_date1').value = someFormattedDate;
            // }
            



          // alert(startDate);
          // return result;

           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
              $('#desktopbutton').prop('disabled', false);
              start_date = $('#start_date').val();
                       // end_date = $('#end_date').val();
                      if (target_period=='Daily') 
                      {
                          var end_date = document.getElementById("end_date").value;
                      }
                      else
                      {
                        var end_date = document.getElementById("end_date1").value;
                      }
                       targettype_id = $('#targettype_id').val();

                       if (end_date!='' && targettype_id !='') 
                       {
                           var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                           // alert(datastring);
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                    cache: false,    
                                    data: datastring,
                                    success: function(data)
                                    {    
                                      // alert(data);
                                        $('#issuelistdetails').show();      
                                        $('#issue_schedule_list').html(data);

                                      
                                     },
                                    error: function(){      
                                         alert('Error while request..');
                                        }
                                     });
                                    return false;

                        }
                        else
                        {
                            $('#issuelistdetails').hide();   
                        }
             // alert();

          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {

              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });

          }
          else
          {
                      $('#desktopbutton').prop('disabled', false);
                       start_date = $('#start_date').val();
                       // end_date = $('#end_date').val();
                       if (target_period=='Daily') 
                      {
                          var end_date = document.getElementById("end_date").value;
                      }
                      else
                      {
                        var end_date = document.getElementById("end_date1").value;
                      }
                       targettype_id = $('#targettype_id').val();
                       if (end_date!='' && targettype_id !='') 
                       {
                           var datastring = 'start_date='+start_date+'&end_date='+end_date+'&targettype_id='+targettype_id;
                           // alert(datastring);
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
                                    cache: false,    
                                    data: datastring,
                                    success: function(data)
                                    {    
                                      // alert(data);
                                        $('#issuelistdetails').show();      
                                        $('#issue_schedule_list').html(data);

                                      
                                     },
                                        error: function(){      
                                         alert('Error while request..');
                                        }
                                     });
                                    return false;
                      }
                      else
                      {
                          $('#issuelistdetails').hide();   
                      }
          }  
    }
}

</script>


<!--====================================== / date comparision and get employee list ==========================-->



<!--========================= selected area form submit ==================================-->
<script type="text/javascript">
   function getCheckedCheckboxesFor()
    {
          var values = [];
          $('input[type=checkbox]:checked').each(function(index)
          {
            var id=$(this).val();
            values.push(id);
            
          });
        // alert(values);
        var datastring='areaid='+values;
         $('#name_values').val(datastring);
                  // alert(datastring);
          $.ajax({
                 url: "<?php echo base_url('admin/Target/add_target');?>",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                    { 
                       // alert(data);

                           PNotify.removeAll();
                            new PNotify({
                                  title: 'Add Target',
                                  text: 'Target added successfully',
                                  type: 'success'
                               }); 
                      },
                    error: function()
                    {
                      alert('fail');
                      }
                 });
        
      }
</script>
<!--========================= / selected area form submit ==================================-->

<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#Target_Form').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                }
            },
            end_date: {
                validators: {
                    notEmpty: {
                        message: 'Please select end date'
                        }
                }
            },

            targettype_id: {
                validators: {
                    notEmpty: {
                        message: 'Please select target type'
                        }
                }
            },

            fileup1: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Image for Landing Page'
                        }
                }
            },

            target_period: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Target Period'
                        }
                }
            },
           
             emailid: {
                validators: {
                    notEmpty: {
                         message: 'Email is required.'
                 },
                regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            }
    }
});
});
</script>

    
<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#Target_Form").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                              var pos = [];
                               $(".day").each(function(i) {
                                   if (this.checked) {
                                       // alert("Checkbox at index " + i + " is checked.");
                                       pos.push(i);
                                   }
                                });

                                $('#checked_index').val(pos);

                               // alert(pos);
                               var values = [];
                                $('input[type=checkbox]:checked').each(function(index)
                                {
                                  var id=$(this).val();
                                  values.push(id);
                                });
                              // alert(values);
                                // var datastring='areaid='+values;
                               $('#name_values').val(values);
                                        // alert(datastring);
                                $.ajax({
                                       url: "<?php echo base_url('admin/Target/add_target');?>",
                                      type: "POST",
                                      data:  new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false,
                                      success: function(data)
                                          { 
                                             // alert(data);
                                             if (data==0)
                                             {
                                                  $(function(){
                                                   new PNotify({
                                                                title: 'Add Form',
                                                                text: 'Please tick the checkbox / fill necessary value',
                                                                type: 'warning'
                                                               });
                                                  });
                                             }
                                             else
                                             {

                                                  $(function(){
                                                     new PNotify({
                                                                  title: 'Add Form',
                                                                  text: 'Target added successfully',
                                                                  type: 'success'
                                                                 });
                                                    });

                                                      setTimeout(function()
                                                     {
                                                        window.location="<?php echo base_url('admin/Target');?>";
                                                     }, 1000);
                                             }    
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



<!--=======================================  delete Event  ==========================================-->

<script>
    function delete_target(id)
    {

      var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Target?</p>',
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

      var datastring = 'targetid='+id;
            //alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Target/delete_target'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                            $(function(){
                                                 new PNotify({
                                                              title: 'Delete Form',
                                                              text: 'Deleted successfully',
                                                              type: 'success'
                                                             });
                                                });

                                                  setTimeout(function()
                                                 {
                                                    window.location="<?php echo base_url('admin/Target');?>";
                                                 }, 1000);

                
               },
                  error: function(){      
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
    var url="<?php echo base_url();?>";
    function delete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"user/deleteuser/"+id;
        else
          return false;
        } 
</script>


<!--======================================= / Delete Event  ==========================================-->


<!--========================= View selected employee list ==================================-->
<script type="text/javascript">
   function view_employee(id)
    {
        var datastring='targetid='+id;
         // $('#name_values').val(datastring);
                  // alert(datastring);
             $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Target/view_emp_list'); ?>",
                    cache: false,    
                    data: datastring,
                    success: function(data)
                    {    
                          $('#modal_default1').modal('show');
                          $('#complaint_model_data1').html(data);
                    },
                    error: function()
                    {
                      alert('fail');
                    }
                 });
        
      }
</script>
<!--========================= / View selected employee list ==================================-->

<script>
    function edit_target(id)
    {
      var datastring = 'targetid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Target/edit_target'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
           $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Type?</p>',
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

            var datastring = 'typeid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master/deactivate3'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Master/typelist');?>";
                           }, 800);

                
               },
                  error: function(){      
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

<script>
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Type?</p>',
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

            var datastring = 'typeid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Master/activate3'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Master/typelist');?>";
                           }, 800);

                
               },
                  error: function(){      
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


<!--======================================= / Activate & Deactivate ==========================================-->


</body>
</html>
