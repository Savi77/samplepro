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
    <!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>


    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <!-- /theme JS files -->

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->

<!--====================== Tab active color and bottom style ====================================-->
   <style type="text/css">

    .nav-tabs.nav-tabs-bottom > li 
    {
        margin-bottom: -4px;
    }

   </style>
<!--====================== / Tab active color and bottom style ====================================-->

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
        margin-left: 20px !important;
        left: -13px !important;
    }
    .dataTables_length 
    {
        margin-right: 11px !important;
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
  <!--============================ Date picker adjustment ================================ -->

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
    z-index: 2000;
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


</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Shift
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
              <div class="panel panel-flat" >
                 <div class="panel-body" style="padding:0px;">
                      <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#00619F;">
                          <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab"><i class="icon-briefcase3 position-right" style="zoom:1.4;"></i>Assign Employee Shift</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="right-icon-tab1">
                                <!-- <div class="row"> -->
                                      <table class="table datatable-responsive">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Name</th>
                                              <th>Shift</th>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Interval Time</th>
                                              <th class="hidden">Description</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                <?php 
                                                  $count=1;
                                                  foreach ($emp_shift as $row) 
                                                  {
                                                  ?>
                                                    <tr>
                                                      <td><?php echo $count ?></td>
                                                      <td><?= $row['name'] ?></td>
                                                      <td><?= $row['shift'] ?></td>
                                                      <td><?= date("d M Y", strtotime($row['shift_startdate'])); ?></td>
                                                      <td><?= date("d M Y", strtotime($row['shift_enddate'])); ?></td>
                                                      <td><?= $row['interval'] ?></td>
                                                      <td class="hidden"></td>
                                                      <td>
                                                          <ul class="icons-list">
                                                              <li><a data-toggle="modal" onclick="edit_shift(id)" id="<?= $row['shift_id']; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Shift" data-placement="bottom"></i></span></a></li>
                                                          </ul>
                                                      </td>
                                                    </tr>
                                                <?php $count++; } ?>
                                          </tbody>
                                        </table>
                                 <!-- </div> -->
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
</div>
<div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"> Add Shift </h6>
                </div>

                <div class="modal-body">
                  <form class="form-horizontal" id="addform">
                           <div class="form-group">
                             <div class="col-md-12">
                                  <label class="control-label col-sm-2" for="Youtube">Employee Name</label>
                                  <div class="col-sm-4">
                                        <select class="select-search form-control" name="emp_id" id="emp_id">
                                           <span class="caret"></span>
                                            <option value="">Select Employee</option>
                                              <?php   
                                                foreach ($employee_list as $value1) 
                                                {
                                              ?>
                                              <option value="<?= $value1->id ?>"><?= $value1->name;?></option>
                                             <?php } ?> 
                                  </select>
                                  </div>
                                   <label class="control-label col-sm-2" for="Youtube">Interval Time</label>
                                  <div class="col-sm-4">
                                        <select class="form-control" name="interval" id="interval">
                                             <span class="caret"></span>
                                              <option value="">Select Interval</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                        </select>
                                  </div>
                           </div>
                        </div>


                        <div class="form-group">
                             <div class="col-md-12">
                                   <label class="control-label col-sm-2" for="Youtube">Shift</label>
                                  <div class="col-sm-10">
                                        <select class="form-control" name="shift" id="shift" onchange="view_time(this.value)">
                                             <span class="caret"></span>
                                              <option value="">Select Shift</option>
                                                <option value="12 Hours(8 am-8 pm)">12 Hours(8 am-8 pm)</option>
                                                <option value="12 Hours(8 pm-8 am)">12 Hours(8 pm-8 am)</option>
                                                <option value="flexible">Flexible</option>
                                        </select>
                                  </div>
                           </div>
                        </div> 

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Start Date</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="schedule_date" name="schedule_date" placeholder="Enter Schedule Date"  onblur="mainInfo()">
                          </div>

                          <label class="control-label col-sm-2" for="email">End Date</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="schedule_date1" name="schedule_date1" placeholder="Enter Schedule Date"  onblur="mainInfo()">
                          </div>
                      </div>

                        <div class="form-group" style="display: none" id="flexible_timing">
                          <label class="control-label col-sm-2" for="Youtube">Start Time</label>
                          <div class="col-sm-4 clockpicker">
                                <input type="text" class="form-control" onchange="mainInfo1(this.value);" id="event_start_time" name="event_start_time" value="00:00">
                          </div>
                          <label class="control-label col-sm-2" for="Youtube">End Time</label>
                          <div class="col-sm-4 clockpicker">
                                <input type="text" class="form-control" onchange="mainInfo1(this.value);" id="event_end_time"  name="event_end_time" value="00:00">
                          </div>
                       </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" id="desktopbutton" class="btn btn-primary pull-right">Submit</button>
                            </div>
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
                              <h6 class="modal-title">Edit Shift</h6>
                            </div>

                            <div class="modal-body">
                                <div id="complaint_model_data">

                                </div>
                           </div>

                          </div>
                        </div>
                   </div>
<!--========================== Date picker javascript ====================================-->
     <!--  <script type="text/javascript">
          $(function () 
          {
              $('#schedule_date').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now'});
              $('#schedule_date1').datetimepicker({format: 'DD MMMM, YYYY',minDate: 'now'});
          });
      </script> -->

       <script type="text/javascript">
         $("#schedule_date").on("dp.change", function (e) 
        {
              $('#addform').bootstrapValidator('revalidateField', 'schedule_date'); 
          });

        $("#schedule_date1").on("dp.change", function (e) 
        {
              $('#addform').bootstrapValidator('revalidateField', 'schedule_date1'); 
          });
      </script>
<!--========================== / Date picker javascript ====================================-->
<!--============================== date comparision ================================-->
<script language="javascript">
        $(document).ready(function () {
            $("#schedule_date").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });

        $(document).ready(function () {
            $("#schedule_date1").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });
</script>

<script type="text/javascript">
  
  function view_time(value)
  {
    if (value=='flexible') 
    {
        $('#flexible_timing').show();
    }
    else
    {
         $('#flexible_timing').hide();
    }
  }

</script>

    <!--============================== Time comparision ================================-->
<script type="text/javascript">

function mainInfo1()
{
    // alert();
   var start_date = $('#schedule_date').val();
   // alert(start_date);
   var startTime = document.getElementById("event_start_time").value;
   // alert(startTime);
    var endTime = document.getElementById("event_end_time").value;
    // alert(endTime);

     var newdate = new Date();

    newdate.setDate(newdate.getDate());


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

    if ((Date.parse(start_date) == Date.parse(someFormattedDate))) 
    {
          var now = new Date();
          var curr_time = now.getHours()+':'+now.getMinutes();
          // alert(curr_time);
          // alert(startTime);
          if (startTime>=curr_time) 
          {
               if (startTime >= endTime) 
                {

                   $('#desktopbutton').prop('disabled', true);
                    new PNotify({
                                   title: 'Schedule',
                                   text: 'End time should be greater than Start time',
                                   type: 'warning'
                                });

                }
                else
                {
                  $('#desktopbutton').prop('disabled', false);
                }  
          } 
          else
          {
               $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Schedule',
                             text: 'Selected timing is less then current time',
                             type: 'warning'
                          });
          }
    }
    else
    {
      var now = new Date();
          // alert(now);
          var curr_time = now.getHours()+':'+now.getMinutes();
          // alert(startTime);
          // alert(startTime);
          // if (startTime>=curr_time) 
          // {
               if (startTime >= endTime) 
                {

                   $('#desktopbutton').prop('disabled', true);
                    new PNotify({
                                   title: 'Schedule',
                                   text: 'End time should be greater than Start time',
                                   type: 'warning'
                                });

                }
                else
                {
                      $('#desktopbutton').prop('disabled', false);
                }  
          // } 
    }
}


</script>
    <!--============================== Time comparision ================================-->

<script type="text/javascript">

function mainInfo()
{
  // alert();
   var startDate = document.getElementById("schedule_date").value;
    var endDate = document.getElementById("schedule_date1").value;
 
     if ((Date.parse(startDate) == Date.parse(endDate))) 
    {

       $('#desktopbutton').prop('disabled', false);
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
    }  
}


</script>
<!--====================================== / date comparision ==========================-->
<!--============================== Time comparision ================================-->
<script type="text/javascript">


$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>
<!--====================================== / date comparision ==========================-->

<!--=======================================  Validation form  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#addform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               

            emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select employee'
                        }
                }
            },

             interval: {
                    validators: {
                        notEmpty: {
                            message: 'Please select time interval'
                        }
                }
            },

             shift: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Shift'
                        }
                }
            },

             schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                }
            },

             schedule_date1: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end date'
                        }
                }
            },

            //  event_start_time: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please select start time'
            //             }
            //     }
            // },

            //  event_end_time: {
            //         validators: {
            //             notEmpty: {
            //                 message: 'Please select end time'
            //             }
            //     }
            // },

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



<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#addform").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                        var formresult = new FormData(this);
                              $.ajax({
                                 url: "<?php echo base_url('admin/Tracking/add_shift'); ?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    // alert(data);
                                         if (data==1) 
                                         {
                                                 $(function(){
                                                   new PNotify({
                                                                title: 'Shift Form',
                                                                text: 'Shift Added Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Tracking/shift');?>";
                                                     }, 1000);
                                         }
                                         else
                                         {
                                              $(function(){
                                                   new PNotify({
                                                                title: 'Shift Form',
                                                                text: 'Shift is already added on this date',
                                                                type: 'warning'
                                                               });
                                                  });
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

    
<!--======================================= / Validation form  ==========================================-->

<script>
    function edit_shift(id)
    {
      $(window).scrollTop(0);
      var datastring = 'shiftid='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Tracking/edit_shift'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          // alert(data);
            $('#modal_default').modal('show');
           $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>



</body>
</html>
