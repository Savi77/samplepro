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

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>

      <!-- /theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>


    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>


    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <!-- /theme JS files -->

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

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
  <!-- /theme JS files -->

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
        height: 30px !important;
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

  </style>

  <!-- ============================================= multiselect dropdown ============================================ -->

  <style type="text/css">
  .multiselect-container > li {
    padding: 0px 10px;
}

.multiselect-container .input-group {
    margin: 5px;
    display: none;
}

.btn-group.open .multiselect.btn-default 
{
    width: 476px !important;
}

.btn-group > .btn:first-child 
{
    margin-left: 0;
    width: 476px !important;
}
.multiselect-container {
    min-width: 476px !important;
}

.multiselect-container>li>a>label>input[type=checkbox] 
{
    margin-top: -4px !important;
}

</style>
<!-- ============================================= / multiselect dropdown ============================================ -->
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
</head>

<body style="overflow-x: hidden;">

  <?php  $this->load->view('Admin/includes/admin_header'); ?>

    <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Schedule
        </h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
  <?php
          if($this->session->user_type!=SA) 
          {
            $hidden = "hidden";
            $id="example"; 
            $class="display";
            $cellspacing="0";
          }
          else
          {
            $style="display: none";
            $id=""; 
            $class="table datatable-responsive";
            $cellspacing="";

          }
       ?>

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
            <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#009FDF;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab">Schedule List<i class="icon-menu7 position-right"></i></a></li>
                 
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                      <table id="<?= $id ?>" cellspacing="<?= $cellspacing ?>" class="<?= $class ?>">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Ticket No</th>
                              <th>status</th>
                              <th>Company Name</th>
                              <th>Customer Name</th>
                              <th>Product Name</th>
                              <th>Issue</th>
                              <th>Issue raised date</th>
                              <th style="<?= $style ?>">Issue assign date/time</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;
                         foreach ($schedule_list as $row)
                        { 
                          if ($row['employee_name']=='') 
                            {
                                $color="#ffd2d2";
                            }
                            else
                            {
                                $color="#ffffff";
                            }

                             $startTime = date('h:i A', strtotime($row['starttime']));
                             $endTime = date('h:i A', strtotime($row['endtime']));

                          ?>
                          <tr style="background-color: <?= $color ?>">
                            <td><?php echo $count ?></td>
                            <td><?= $row['ticket_no'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['company_name'] ?></td>
                            <td><?= $row['contact_person_name1'] ?></td>
                            <td><?= $row['product_name'] ?></td>
                            <td><?= $row['issue'] ?></td>
                            <td ><?= date("d M Y", strtotime($row['created_date'])); ?></td>
                            <td style="<?= $style ?>"><?= date("d M Y", strtotime($row['assign_date'])); ?> <br> <?= $startTime ?> to <?= $endTime ?></td>
                            
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

      </div>
    </div>

</div>

<div id="modal_default" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Assign Task</h6>
        </div>

        <div class="modal-body">
            <div id="user_model_data">

            </div>
       </div>

      </div>
    </div>
</div>


        <div id="schedule_model" class="modal fade">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"> Add Schedule</h6>
                  </div>

                  <div class="modal-body">
                     <form class="form-horizontal" id="assignto_form1" method="post">
                            <div class="row">
                              <div class="form-group">
                                   <div class="col-md-12 col-md-offset-2">
                                        <label class="control-label col-sm-2" for="Youtube">Customer Name</label>
                                        <div class="col-sm-6">
                                              <select class="select-search" name="customer_id" id="customer_id" onchange="getcustomerdetails(this.value)">
                                                        <option value="">Select Customer</option>
                                                        <?php 
                                                        foreach ($customer_list as $value) 
                                                        { ?>
                                                              <option value="<?= $value->customer_id ?>"><?= $value->contact_person_name1 ?></option>
                                                      <?php  } ?>
                                              </select>
                                        </div>
                                 </div>
                              </div>
                              <div style="display: none">
                                  <div class="form-group">
                                      <div class="col-md-12 col-md-offset-2">
                                          <label class="control-label col-sm-2" for="Youtube">Date</label>
                                          <div class="col-sm-6">
                                            <input type="text" class="form-control daterange-single" id="start_date" name="start_date" onchange="check_availability()" >
                                            <span id="err2" style="color:red; font-size: 12px;"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="Youtube">Start Time</label>
                                    <div class="col-sm-4 clockpicker">
                                          <input type="text" class="form-control" id="event_start_time" name="event_start_time" value="" onchange="document.getElementById('err3').innerHTML='' ">
                                          <span id="err3" style="color:red; font-size: 12px;"></span>
                                    </div>
                                    <label class="control-label col-sm-2" for="Youtube">End Time</label>
                                    <div class="col-sm-4 clockpicker">
                                          <input type="text" class="form-control" id="event_end_time"  name="event_end_time" value="" onchange="document.getElementById('err4').innerHTML='' ">
                                          <span id="err4" style="color:red; font-size: 12px;"></span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-2">
                                        <label>Employee name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div id="all_employee">
                                            <select class="form-control soft_skill_list" id="employee" multiple="multiple" name="employee[]" onchange="document.getElementById('err1').innerHTML='' " readonly="">
                                            <?php foreach ($assign_issue->result() as $value)
                                            { ?>
                                              <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php } ?>
                                          </select>
                                           <span id="err1" style="color:red; font-size: 12px;"></span>
                                      </div>
                                      <div id="available_employee"></div>
                                    </div>
                                </div>
                                <br><br>
                              </div>
                          </div>

                        <div class="form-group"> 
                          
                          <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary pull-right" id="desktopbutton" onclick="return form_assignto()">Submit</button>
                          </div>
                          <div id="loader"></div>
                        </div>
                    </form>
                 </div>
          </div>
        </div>
   </div>

<div id="modal_status" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Change Status</h6>
        </div>

        <div class="modal-body">
            <!-- <div id="status_model_data"> -->
              <form class="form-horizontal" id="StatusForm">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Description</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" maxlength="100"></textarea>
                  </div>
                </div>
                <label class="control-label col-sm-3" for="email">Change Status </label>
                <div class="col-sm-9">
                   <select name="status_update" class="form-control">
                      <option value="">Select status</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In progress</option>
                        <option value="completed">Completed</option>
                   </select>
                </div>

                 <input type="hidden" id="qry_id" class="file-styled"  name="query_id">
                 <br>
                <div class="form-group"> 
                  <div class="col-sm-offset-3 col-sm-9">
                    <br>
                    <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                  </div>
                </div>
            </form>
            <!-- </div> -->
       </div>
      </div>
    </div>
</div>

<!-- ========================  Get customer details  =========================-->
<script>
 function getcustomerdetails(val) 
  {
    // alert(val);
    $.ajax({
    type: "POST",
     url: '<?php echo base_url('admin/Schedule/getcustdetails') ?>',
    data:'country_id='+val,
    success: function(data)
    {
      // alert(data);
       $("#state1").html(data);
    }
    });
  }
</script>
<!-- ========================  / Get customer details  =========================-->

<!--======================================= Change status ==========================================-->
<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>
<script>
    function chenge_status_model(id)
    {
      // alert(id);
            
         $('#modal_status').modal('show');
          $('#status_model_data').html();
          // document.getElementById("qry_id").value=id;
          $("#qry_id").val(id);
    }
</script>

<script>
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this product?</p>',
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

            var datastring = 'userid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/activate'); ?>",
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
                              window.location="<?php echo base_url('admin/Product');?>";
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


<script>
    function del_interest(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this product?</p>',
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

            var datastring = 'userid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                         title: 'Delete Product',
                                         text: 'Deleted successfully',
                                         type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Product');?>";
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


<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#StatusForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Full Name'
                        }
                }
            },
            status_update: {
                validators: {
                    notEmpty: {
                        message: 'Please select status'
                        }
                }
            },

            description: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Description'
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

             $("#StatusForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Customer/change_status'); ?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);

                                                     $(function(){
                                                   new PNotify({
                                                                title: 'Status Form',
                                                                text: 'Status change  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Customer/Issue');?>";
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



<!--=======================================  delete Event  ==========================================-->


<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();

            var last=null;
 
            var groupadmin = []; 
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {

                if ( last !== group ) {
  
                    $(rows).eq( i ).before(
                        '<tr class="group" id="'+i+'"><td colspan="9">'+group+'</td></tr>'
                    );
                    groupadmin.push(i);
                    last = group;
                }
            } );
            
            for( var k=0; k < groupadmin.length; k++){
        // Code added for adding class to sibling elements as "group_<id>"  
                  $("#"+groupadmin[k]).nextUntil("#"+groupadmin[k+1]).addClass(' group_'+groupadmin[k]); 
                // Code added for adding Toggle functionality for each group
                    $("#"+groupadmin[k]).click(function(){
                        var gid = $(this).attr("id");
                         $(".group_"+gid).slideToggle(300);
                    });
                 
            }
        }
    } );
} );

</script>


<script>
    function assign_to(id)
    {
      var datastring = 'query_id='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/assign_task'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
           $('#user_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script>
    function Viewdetails(id)
    {
      var datastring = 'query_id='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/issue_detail'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
           $('#user_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>


<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
jQuery('#employee').multiselect({
        enableFiltering: true,
        maxHeight:400,
        enableCaseInsensitiveFiltering:true, 
        nonSelectedText: 'Please select employee', 
        numberDisplayed: 5, 
        selectAll: false, 
        onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = jQuery('#employee option:selected');
 
                if (selectedOptions.length >= 5) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = jQuery('#employee option').filter(function() {
                        return !jQuery(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });

                     new PNotify({
                                      title: 'Message',
                                      text: 'Please Select only 5 employee',
                                      type: 'warning'
                                     });
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#employee option').each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }});
            
            
     /*Add This to Block SHIFT Key*/       
var shiftClick = jQuery.Event("click");
shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });
</script>
<!-- ====================================================================================================================== -->

</body>
</html>
