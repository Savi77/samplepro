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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css">
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
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <!-- /theme JS files -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>


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
          background-color: #0099cc !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }
      table.dataTable tr.dtrg-group td {
        background-color: #e4e4e4 !important;
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
        left: 0px !important;
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
        padding: 10px 20px;
        border-bottom: 1px solid #111;
    }

    .dataTables_info 
    {
        margin-left: 20px !important;
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
  .modal-lg 
    {
        width: 95% !important;
    }
   .modal-lg 
    {
        width: 1210px !important;
    }
  .input-group .form-control:first-child
    {
        width: 90% !important;
    }

  .dtrg-level-1
  {
     display: none !important;
  }



</style>


</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  
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
            <?php $this->load->view('Admin/includes/panel'); ?>
            <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Dashboard</span></a> - Expenses
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text">
            <i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
        <!-- Basic responsive configuration -->
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white">Expenses</h5>
                </div>

                <div class="panel-heading col-md-12" style="padding-bottom: 0px;">          
                  <form method="post" class="form-horizontal" id="defaultForm">
                    <div class="col-md-10">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Start Date<span style="color: red;">*</span></label>
                              <div class="col-sm-9" id="data_1">
                                  <div class="input-group date">
                                      <span class="input-group-addon"><i class="icon icon-calendar"></i></span>
                                      <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off">
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">End Date<span style="color: red;">*</span></label>
                              <div class="col-sm-9" id="data_1">
                                  <div class="input-group date">
                                      <span class="input-group-addon"><i class="icon icon-calendar"></i></span>
                                      <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off">
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-2">  
                            <button class="btn btn-primary" type="submit" id="desktopbutton" style="padding: 6px 30px;">Submit</button>
                          &nbsp;&nbsp; <span id="loader_gif"></span>
                      </div>
                    </form> 
                </div>  
                <hr style="border: 1px solid #29121229;"/>    

                <table id="employee_grid" class="table ">
                    <thead>
                        <tr>
                            <th>Expense Head</th>
                            <th>Employee Name</th>
                            <th>Expense Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            <th>Note</th>                                         
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
          <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
            <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title" style="margin-top: -4px" >
            <i class="icon-coins" style="zoom:1.1; "></i>
              &nbsp;Add Expenses
            </h5>
          </div>
            <div class="modal-body" style="padding: 10px;">

              <form id="addform" method="post"  enctype="multipart/form-data">
                <div class="panel panel-flat">
                  <div class="panel-body" style="padding: 5px;">
                    <fieldset>
                      <br/>
                        <div class="row">      

                          <div class="col-md-12"> 
                             <div class="row"> 
                               <div class="col-md-6 nopadding">
                                  <div class="form-group">
                                      Expense Title : 
                                      <input type="text" class="form-control" name="ExpenseTitle" maxlength="50">                     
                                  </div>
                               </div>
                             </div>
                          </div>

                           <div class="col-md-12"> 
                             <div class="row"> 

                               <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  Expense Head : <sup style="color: red;">*</sup>
                                  <select class="form-control" name="ExpenseID[]">
                                    <option value="">Select Expense</option>
                                    <?php 
                                      foreach ($ExpenseMasterArray as  $res) 
                                      {
                                      ?>
                                      <option value="<?= $res->expense_id; ?>"><?= $res->expense_name; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  Start Date :  <sup style="color: red;">*</sup>
                                  <input type="text" class="form-control datepicker " name="SDate[]"   placeholder="Select Start Date"  autocomplete="off">
                                </div>
                              </div>

                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  <div class="input-group">
                                    End Date :  <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control datepicker" name="EDate[]"  placeholder="Select End Date" autocomplete="off">
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                    Amount : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="Amount[]" placeholder="Select Enter Amount"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">                      
                                </div>
                              </div>
                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                    Note : 
                                    <input type="text" class="form-control" name="Remark[]" placeholder=" Enter Remark" maxlength="50">                      
                                </div>
                              </div>

                              <div class="col-md-2 nopadding">
                                 <div class="input-group">
                                   <i class="icon-upload" title="Attach Document"></i>
                                    <input type="file" class="form-control" name="Document[]" >     
                                    <div class="input-group-btn">
                                      <button class="btn btn-success" type="button" style="margin-top: 20px;"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>         
                                 </div>
                              </div>
                              <div class="clear"></div>
                            </div>  
                            </div>
                              <div class="col-md-12"> 
                                <div id="education_fields"></div>  
                              </div>
                          </div>   
                         <br/> <br/>
                        <div align="center">
                          <button type="submit" class="btn btn-primary">Add Expenses <i class="icon-arrow-right14 position-right"></i></button>
                           <span id="preview"></span>
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

<div id="EditExpenseModal" class="modal fade">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info" style="background-color:#00619F;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Edit Expense</h6>
      </div>
      <div class="modal-body">
          <div id="complaint_model_data">

          </div>
     </div>
    </div>
  </div>
</div>


<div id="ChangeStatus" class="modal fade">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info" style="background-color:#00619F;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Change Status</h6>
      </div>
      <div class="modal-body">
        <div id="ChangeStatusData">

        </div>
     </div>
    </div>
  </div>
</div>


<div id="EditExpenseModalAll" class="modal fade">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info" style="background-color:#00619F;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="icon-coins" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Edit Expense</h6>
      </div>
      <div class="modal-body" style="border: 8px solid #d4d0d0;">
          <div id="complaint_model_data_all">

          </div>
     </div>
    </div>
  </div>
</div>

<div id="ExpenseChangeStatusModal" class="modal fade">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info" style="background-color:#00619F;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="icon-clippy" style="zoom:1.1; "></i>
                &nbsp; &nbsp;Change Expense Status</h6>
      </div>
      <div class="modal-body" style="border: 8px solid #d4d0d0;">
          <div id="ExpenseChangeStatusData">

          </div>
     </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
<script type="text/javascript">
 $("#start_date").on("dp.change", function (e) 
  {
    // alert();
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
     
    if (startDate!='') 
    {
         
           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
             PNotify.removeAll();    
            document.getElementById("desktopbutton").disabled = false;
          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {
            PNotify.removeAll();
              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });
          }
          else
          {
              PNotify.removeAll();
              document.getElementById("desktopbutton").disabled = false;
          }  
    }
  });

  $("#end_date").on("dp.change", function (e) 
  {
    // alert();
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
     
    if (startDate!='') 
    {
         
           if ((Date.parse(startDate) == Date.parse(endDate))) 
          {
              PNotify.removeAll();
            document.getElementById("desktopbutton").disabled = false;
          }
          else if ((Date.parse(startDate) > Date.parse(endDate))) 
          {
              PNotify.removeAll();
              $('#desktopbutton').prop('disabled', true);
              new PNotify({
                             title: 'Event',
                             text: 'End date should be greater than Start date',
                             type: 'warning'
                          });

          }
          else
          {
              PNotify.removeAll();
              document.getElementById("desktopbutton").disabled = false;
          }  
    }
  });

</script>

<script type="text/javascript">
    $(function () 
    {
        $('#start_date').datetimepicker({format: 'DD MMMM, YYYY', useCurrent: true});
        $('#end_date').datetimepicker({format: 'DD MMMM, YYYY', useCurrent: true});
    });
</script>
 <script type="text/javascript">
   $("#start_date").on("dp.change", function (e) 
  {
        $('#defaultForm').bootstrapValidator('revalidateField', 'start_date'); 
    });

  $("#end_date").on("dp.change", function (e) 
  {
        $('#defaultForm').bootstrapValidator('revalidateField', 'end_date'); 
    });
</script>



 <script type="text/javascript">
    $(document).ready(function() 
    {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               from_date: {
                validators: {
                      notEmpty: {
                                 message: 'Customer is required'
                     }
                        }
                    },
               start_date: {
                validators: {
                      notEmpty: {
                                 message: 'Start Date is required'
                     }
                        }
                    },

               end_date: {
                validators: {
                      notEmpty: {
                                 message: 'End Date is required'
                     }
                        }
                    },
                 emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Employee '
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
       $("#defaultForm").on('submit',(function(e)
           {           
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
              }
              else
              {
                  $.ajax({
                        url: '<?php echo base_url('admin/Expense/SetSession') ?>',
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data)
                        {
                            $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Uploading...." /> ');
                            document.getElementById("desktopbutton").disabled = true;
                            $("#employee_grid").dataTable().fnDestroy();

                            var groupColumn2 = 1;
                              $('#employee_grid').DataTable({
                                  "bProcessing": true,
                                  "serverSide": true,
                                  // "columnDefs": [
                                  //             { "visible": false, "targets": groupColumn2 }
                                  //         ],

                                    "order": [[2, 'asc'], [1, 'asc']],
                                    "rowGroup": {
                                        dataSrc: [ 2, 1 ]
                                    },
                                    "columnDefs": [ {
                                        targets: [ 1, 2 ],
                                        visible: false
                                    } ],

                                  "drawCallback": function ( settings ) 
                                  {
                                      var api = this.api();
                                      var rows = api.rows( {page:'current'} ).nodes();
                                      var last=null;
                                       var groupadmin = []; 
                                       api.column(groupColumn2, {page:'current'} ).data().each( function ( group, i ) {
                                        if ( last !== group )
                                        {
                                          $(rows).eq( i ).before(
                                              '<tr class="group" id="'+i+'"><td colspan="9">'+group+'</td></tr>'
                                          );
                                          groupadmin.push(i);
                                          last = group;
                                        }
                                      } );
                                      for( var k=0; k < groupadmin.length; k++)
                                      {
                                          $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                                          $("#"+groupadmin[k]).click(function()
                                          {
                                              var gid = $(this).attr("id");
                                          });
                                      }
                                  },
                                 "language": 
                                  {
                                    "search": "Filter records:",
                                    "searchPlaceholder": "Search by Name"
                                  },
                                  "ajax":{
                                            url: "<?php echo base_url('admin/Expense/AdminAjaxDataDateRange');?>",
                                            type: "post", 
                                            error: function()
                                            {
                                              // alert('test');

                                            }
                                       }
                                });
                             document.getElementById("desktopbutton").disabled = false;
                             $("#loader_gif").hide();
                        },
                        error: function()
                        {
                          alert('fail');
                        }
                     });
              }
           e.preventDefault();
          }));
      });
</script>


<script type="text/javascript">     
  function  EditExpenseDetails(REFID)
    {
      var datastring = 'REFID='+REFID;
      // alert(datastring);
      $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Expense/EditExpenseDetailsAdmin'); ?>",
              data: datastring,
              success: function(data)
              {    
                 $('#EditExpenseModalAll').modal('show');
                 $('#complaint_model_data_all').html(data);                             
               },
              error: function()
              {      
               alert('Error while request..');
              }
            });
    }

  function  ExpenseChangeStatus(REFID)
    {
      var datastring = 'REFID='+REFID;
      // alert(datastring);
      $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Expense/ExpenseChangeStatus'); ?>",
              data: datastring,
              success: function(data)
              {    
                 $('#ExpenseChangeStatusModal').modal('show');
                 $('#ExpenseChangeStatusData').html(data);                             
               },
              error: function()
              {      
               alert('Error while request..');
              }
            });
    }
 </script>

 <script>
    $( function()
     {
        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    } );
    $('.datepicker').change(function()
    {
      // alert();
        $('#addform').bootstrapValidator('revalidateField', 'SDate[]'); 
        $('#addform').bootstrapValidator('revalidateField', 'EDate[]'); 
    });
 </script>

   <script type="text/javascript">
      var room = 1;
      function education_fields() 
      {
          room++;
          var objTo = document.getElementById('education_fields')
          var divtest = document.createElement("div");
          divtest.setAttribute("class", "form-group removeclass"+room);
          var rdiv = 'removeclass'+room;
          divtest.innerHTML = '<div class="row"> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control"  name="ExpenseID[]"><option value=""> Select Expense</option><?php foreach ($ExpenseMasterArray as  $res) { ?><option value="<?=$res->expense_id; ?>"><?= $res->expense_name;?></option><?php } ?></select> </div></div><div class="col-md-2 nopadding"><div class="form-group"> <input type="text" class="form-control datepicker" name="SDate[]"   placeholder="Select Start Date"  autocomplete="off" > </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control datepicker" name="EDate[]"  placeholder="Select End Date"  autocomplete="off" ></div></div><div class="col-md-2 nopadding"><div class="form-group">  <input type="text" class="form-control" name="Amount[]" placeholder="Select Enter Amount"  onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45 " maxlength="15"  autocomplete="off"> </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control" name="Remark[]" placeholder=" Enter Remark" ></div></div><div class="col-md-2 nopadding"><div class="form-group"><div class="input-group"> <input type="file" class="form-control" name="Document[]"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';        
          objTo.appendChild(divtest)
           
           $(".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
           $('#addform').bootstrapValidator('addField', 'ExpenseID[]');
           $('#addform').bootstrapValidator('addField', 'Amount[]');
           $('#addform').bootstrapValidator('addField', 'SDate[]');
           $('#addform').bootstrapValidator('addField', 'EDate[]');

        }
         function remove_education_fields(rid) 
         {
           $('.removeclass'+rid).remove();
         }

    </script>

    <script>
    $(document).ready(function() {
            Expensevalidator = {
                row: '.col-md-3',
                validators: {
                              notEmpty: {
                                  message: ' Expense is required'
                              }
                }
            },
            Amountvalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' Amount is required'
                              }
                }
            },
            Sdatevalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' Start Date is required'
                              }
                }
            },
            EDatevalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' End Date is required'
                              }
                }
            },
            ExpenseTitlevalidator = {
                row: '.col-md-6',
                validators: {
                              notEmpty: {
                                  message: ' Expense Title is required'
                              }
                }
            },

        $('#addform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
          fields: {
                    'ExpenseID[]': Expensevalidator,
                    'Amount[]': Amountvalidator,  
                    'SDate[]': Sdatevalidator,    
                    'EDate[]': EDatevalidator,
                     ExpenseTitle: ExpenseTitlevalidator,
                }
            })
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
                      $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                      $("#preview").show();                     
                          $.ajax({
                                url: '<?php echo base_url('admin/Expense/Insert_user_expense  ') ?>',
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                     // alert(data);
                                     PNotify.removeAll();
                                     $("#preview").hide();
                                       new PNotify({
                                                title: 'Add Expenses',
                                                text: 'Expense Added Successfully !',
                                                type: 'success'
                                          });
                                      setTimeout(function()
                                       {
                                           window.location="<?php echo base_url('admin/Expense/UserExpense') ?>";
                                       }, 2000);
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
    $( document ).ready(function() 
      {
        var groupColumn = 2;
        $('#employee_grid').DataTable({
            "bProcessing": true,
            "serverSide": true,
            // "columnDefs": [
            //     { "visible": true, "targets": groupColumn }
            // ],

                "order": [[2, 'asc'], [1, 'asc']],
                "rowGroup": {
                    dataSrc: [ 2, 1 ]
                },
                "columnDefs": [ {
                    targets: [ 1, 2 ],
                    visible: false
                } ],





            "displayLength": 10,
            // "order": [[ 3, "desc" ]],
            "drawCallback": function ( settings ) 
            {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
                 var groupadmin = []; 
                 api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                  if ( last !== group )
                  {
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="9">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                  }
                } );
                for( var k=0; k < groupadmin.length; k++)
                {
                    $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                    $("#"+groupadmin[k]).click(function()
                    {
                        var gid = $(this).attr("id");
                    });
                }
            },
           "language": 
            {
              "search": "Filter records:",
              "searchPlaceholder": "Search by Name"
            },
            "ajax":{
                      url: "<?php echo base_url('admin/Expense/AjaxData');?>",
                      type: "post",  // type of method  ,GET/POST/DELETE
                      error: function()
                      {
                        $("#employee_grid_processing").css("display","none");
                      }
                 }
          });   
      });
  </script>

 <script type="text/javascript">

  function  EditExpense(ID)
  {
    // alert(ID);
    var datastring = 'ID='+ID;
    // alert(datastring);
    $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/EditUserExpense'); ?>",
            cache: false,    
            data: datastring,
            success: function(data)
            {    
              //alert(data);
               $('#EditExpenseModal').modal('show');
               $('#complaint_model_data').html(data);           
               
             },
            error: function()
            {      
             alert('Error while request..');
            }
          });
  }


  function  OnHoldExpense(ID)
  {
    var datastring = 'ID='+ID+'&Status=On Hold';
    $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,    
            data: datastring,
            success: function(data)
            {    
              //alert(data);
               $('#ChangeStatus').modal('show');
               $('#ChangeStatusData').html(data);           
               
             },
            error: function()
            {      
             alert('Error while request..');
            }
          });
  }

  function  RejectExpense(ID)
  {
    var datastring = 'ID='+ID+'&Status=Rejected';
    $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,    
            data: datastring,
            success: function(data)
            {    
              //alert(data);
               $('#ChangeStatus').modal('show');
               $('#ChangeStatusData').html(data);           
               
             },
            error: function()
            {      
             alert('Error while request..');
            }
          });
  }

  function  ApproveExpense(ID)
  {
    var datastring = 'ID='+ID+'&Status=Approved';
    $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,    
            data: datastring,
            success: function(data)
            {    
              //alert(data);
               $('#ChangeStatus').modal('show');
               $('#ChangeStatusData').html(data);           
               
             },
            error: function()
            {      
             alert('Error while request..');
            }
          });
  }



 </script>




<script>
function delete_expense(expense_id)
{

  var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this expense?</p>',
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

          var datastring = 'expense_id='+expense_id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Expense/delete_expense'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            //alert(data);
            $(function(){
                     new PNotify({
                                  title: 'Delete Expense',
                                  text: 'Deleted successfully',
                                  type: 'success'
                                 });
                    });
                setTimeout(function()
                 {
                    window.location="<?php echo base_url('admin/Expense');?>";
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



</body>
</html>
