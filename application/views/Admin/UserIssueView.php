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

    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
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
   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-multiselect.min.js"></script>

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
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>  
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
  


    <style type="text/css">
      .nav-tabs.nav-tabs-bottom > li 
      {
          margin-bottom: -4px;
      }
     .badge 
      {
        padding: 1px 7px 0px 7px !important;
        font-size: 14px;
      }
     </style>
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

      .nav-tabs[class*=bg-] > .active > a
      {
        background-color: rgba(0, 0, 0, 0.4) !important;
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

    </style>

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
    .table > tbody > tr > td
    {
      padding: 7px 15px !important;
    }
  </style>

  <style type="text/css">
    .daterange-single 
    {
      z-index: 100000;
    }
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
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4>
                <i class="icon-arrow-left52 position-left"></i>
               <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Issue
              </h4>
            </div>
            <div class="heading-elements">
              <div class="heading-btn-group">
                <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
              </div>
            </div>
          </div>
        </div>
        
      <?php
          if($this->session->user_type=='SA' OR $this->session->schedule_view=='1') 
          {
            $style="display: none";
            $id=""; 
            $class="table datatable-responsive";
            $cellspacing="";
            $incomplete_tab="";
          }
          else
          {
            $hidden = "hidden";
            $id="example"; 
            $class="display";
            $cellspacing="0";
            $incomplete_tab="display: none";
          }

          $reschedule_count=count($incomplete_issue_list);
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
                            <ul class="nav nav-tabs bg-primary-600"  id="myTab">
                              <li class="active">
                                <a href="#colored-tab1" data-toggle="tab" style="font-size: 16px;">
                                  <i class=" icon-newspaper2 position-left"></i>
                                   Issue List
                                </a>
                              </li>
                              <li>
                                 <a href="#colored-tab2" data-toggle="tab" style="font-size: 16px;<?= $incomplete_tab ?>">
                                   <i class=" icon-history position-left"></i> Re-Schedule&nbsp;
                                    <?php if($reschedule_count>0){?>
                                      <span  style="margin-top: 2px;">
                                        <span class="badge bg-warning-600"><?=$reschedule_count;?></span>
                                      </span>
                                    <?php } ?>  
                                  </a>
                              </li>
                              <li>
                                <a href="#colored-tab3" data-toggle="tab" style="font-size: 16px;<?= $incomplete_tab ?>">
                                 <i class=" icon-file-check2 position-left"></i> Completed Issue
                                </a>
                              </li>
                            </ul>

                            <div class="tab-content">
                              <div class="tab-pane active" id="colored-tab1">                              
                                   <table id="issue_list_grid" class="table ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ticket No.</th>
                                                <th>Status</th>
                                                <th>Company Name</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Issue</th>
                                                <th>Schedule Date</th>
                                                 <th>Priority</th>
                                                <th>Priority</th>
                                                <th>Issue Assign DateTime</th>
                                                <th>Upload Documents</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>

                              </div>

                              <div class="tab-pane" id="colored-tab2">                                
                                  <table id="reschedule_issue_list"  class="table ">
                                        <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Ticket No</th>
                                              <th>Company Name</th>
                                              <th>Customer Name</th>
                                              <th>Product Name</th>
                                              <th>Issue</th>
                                              <th>Issue Raised Date</th>
                                              <th>Issue Assign Date Time</th>
                                              <th>Priority</th>
                                              <th>Schedule To</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                 </table> 
                              </div>

                              <div class="tab-pane" id="colored-tab3">
                                 <table id="complete_issue_list"  class="table ">
                                        <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Ticket No</th>
                                              <th>Company Name</th>
                                              <th>Customer Name</th>
                                              <th>Product Name</th>
                                              <th>Issue</th>
                                              <th>Issue Raised Date</th>
                                              <th>Issue Assign Date Time</th>
                                              <th>Priority</th>
                                              <th>Schedule to</th>
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
          </div>
             
          <style type="text/css">
              .optionGroup 
              {
                  font-weight: bold !important;
                  /*color:red;*/
                  font-style: italic !important;
                  font-size: 16px;
              }
              .optionChild 
              {
                  padding-left: 30px !important;
              }
          </style>
                  <div id="schedule_model" class="modal fade" style="top: 15px;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info" style="background-color:#009FDF;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h6 class="modal-title"> Add Schedule</h6>
                            </div>

                            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                               <form class="form-horizontal" id="schedule_form">
                                      <div class="row">
                                        <div class="form-group">
                                                  <label class="control-label col-sm-2" for="Youtube">Company Name <span style="color: red;">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select class="select-search" name="customer_id" id="customer_id" >
                                                                  <option value="">Select Company</option>
                                                                  <?php 
                                                                  foreach ($customer_list as $value) 
                                                                  { ?>
                                                                        <option value="<?= $value->customer_id ?>"><?= $value->company_name ?> (<?= $value->contact_person_name1 ?> / <?= $value->phone_no ?>)</option>
                                                                <?php  } ?>
                                                        </select>
                                                    </div>
                                                   <label class="control-label col-sm-2" for="Youtube">Product Name <span style="color: red;">*</span></label>
                                                  <div class="col-sm-4">
                                                        <select class="select-search" name="product_id" id="product_id">
                                                                  <option value="">Select Product</option>
                                                                  <?php 
                                                                  foreach ($product_list as $value1) 
                                                                  { ?>
                                                                        <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                                <?php  } ?>
                                                        </select>
                                                  </div>
                                           <!-- </div> -->
                                        </div>
                                          <?php
                                              $user_sess_type=$this->session->user_type;
                                              if($this->session->user_type!=SA) 
                                              { 
                                                $emp_id = $this->session->id;
                                                $name_emp = $this->session->name;
                                              }
                                              else
                                              {
                                                $emp_id = '';
                                              }
                                          ?>
                                          <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                                          <div class="form-group">
                                             <label class="control-label col-sm-2" for="Youtube">Employee Name <span style="color: red;">*</span></label>
                                              <div class="col-sm-4">
                                                    <select class="select-search" name="employee_id" id="employee_id" onchange="getassignedissue()">
                                                              <option value="">Select Employee</option>
                                                              <?php 
                                                              foreach ($employee_list as $value2) 
                                                              { 
                                                                    $all_emp_id = $value2->id;
                                                                    if ($all_emp_id==$emp_id)
                                                                    { ?>
                                                                      <option value="<?= $value2->id ?>" selected=""><?= $value2->name ?></option> 
                                                              <?php } else { ?>
                                                                      <option value="<?= $value2->id ?>"><?= $value2->name ?></option>
                                                            <?php } } ?>
                                                    </select>
                                              </div>
                                              <label class="control-label col-sm-2" for="email">Schedule Date <span style="color: red;">*</span></label>
                                              <div class="col-sm-4">
                                                <input type="text" class="form-control" id="schedule_date" name="schedule_date" placeholder="Enter Schedule Date"  onchange="getassignedissue()">
                                              </div>
                                          </div>
                                        

                                         <div class="form-group" id="issuelistdetails" style="display: none">
                                                <label class="control-label col-sm-2" for="Youtube">Assign issue list</label>
                                                <div class="col-sm-10" id="issue_schedule_list" style="max-height: 110px; overflow: auto;">
                                                      
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="Youtube">Start Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                  <input type="text" class="form-control" id="schedule_start_time" name="schedule_start_time" value="" placeholder="Please select start time" onchange="mainInfo1()" onclick="document.getElementById('err3').innerHTML='' ">
                                                  <span id="err3" style="color:red; font-size: 12px;"></span>
                                            </div>
                                            <label class="control-label col-sm-2" for="Youtube">End Time <span style="color: red;">*</span></label>
                                            <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                  <input type="text" class="form-control" id="schedule_end_time"  name="schedule_end_time" value="" placeholder="Please select end time" onchange="mainInfo1()" onclick="document.getElementById('err4').innerHTML='' ">
                                                  <span id="err4" style="color:red; font-size: 12px;"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                  <label class="control-label col-sm-2" for="Youtube">Schedule Type <span style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="select-search" name="schedule_type_id" id="schedule_type_id" >
                                                                  <option value="">Select Schedule Type</option>
                                                                  <?php 
                                                                  foreach ($schedule_visit_list as $st_value) 
                                                                  { ?>
                                                                        <option value="<?= $st_value->id ?>"><?= $st_value->type_name ?></option>
                                                                <?php  } ?>
                                                        </select>
                                                    </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="email">Query(Issue) <span style="color: red;">*</span></label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" id="query" name="query" placeholder="Enter query" maxlength="500"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <div class="col-sm-offset-3 col-sm-8">
                                          <button type="submit" class="btn btn-primary pull-right" id="desktopbutton">
                                           Add Schedule  <i class="icon-arrow-right14 position-right"></i>
                                          </button>
                                        </div>
                                       <div class="col-sm-1">
                                          <div id="preview"></div>
                                       </div>
                                    </div>
                              </form>
                           </div>
                    </div>
                  </div>
             </div>

  <!-- ===================================================================================== -->
      <div id="upload_schedule_documents" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
               <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title" style="margin-top: -4px" >
                  <i class="icon-upload" style="zoom:1.1; "></i>
                    &nbsp;Upload Documents
                  </h5>
                </div>
                  <div class="modal-body" style="padding: 10px;">
                    <form id="upload_doc_form" method="post"  enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="schedule_query_id" id="schedule_query_id" > 
                      <div class="panel panel-flat">
                        <div class="panel-body" style="padding: 5px;">
                          <fieldset>
                            <br/>
                              <div class="row">
                                <div class="col-md-12"> 
                                   <div class="row"> 
                                     <div class="col-md-8 col-md-offset-2 nopadding form-group">
                                       <div class="input-group">                                         
                                          <input type="file" class="form-control" name="Document[]" >     
                                          <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
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
                                <button type="submit" class="btn btn-primary">Upload Documents<i class="icon-arrow-right14 position-right"></i></button>
                                 <span id="preview_upload"></span>
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


 <!--=============================== Assign task modal (ADMIN SIDE) ================================ -->

              <div id="modal_default" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog modal-lg">
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
<!--============================== Re-schedule ===========================================-->
              <div id="modal_default12" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Assign Task</h6>
                      </div>

                      <div class="modal-body">
                          <div id="user_model_data12">

                          </div>
                     </div>

                    </div>
                  </div>
              </div>
<!--=============================== / Assign task modal (ADMIN SIDE) ================================ -->

<!--=============================== Status Change modal (Employee SIDE) ================================ -->
              <div id="modal_status" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-info" style="background-color:#009FDF;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Change Status</h6>
                      </div>

                      <div class="modal-body">
                                <form class="form-horizontal" id="StatusForm">
                                    <div class="form-group">
                                      <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                                      <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" maxlength="150"></textarea>
                                      </div>
                                    </div>
                                    <label class="control-label col-sm-3" for="email">Change Status <span style="color: red;">*</span></label>
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
                          </div>
                        </div>
                   </div>
              </div>
<!--=============================== Remark modal (Admin SIDE) ================================ -->
            <div id="modal_remark" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        
                          <div class="modal-header bg-info" style="background-color:#009FDF;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title">Issue details</h6>
                          </div>
                            <div class="modal-body" id="remark_model_data">

                            </div>              
                      </div>
                 </div>
            </div>


          <!-- Modal -->
            <div class="modal fade" id="issue_details" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content"  id="bind_issue_data">

                </div>               
              </div>
            </div>
            <!--  -->

              <div id="modal_billing" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div id="billing_model_data">

                            </div>
                      </div>
                 </div>
            </div>

            <div id="modal_reschedule" class="modal fade" style="top: 15px;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div id="reschedule_model_data">

                            </div>
                      </div>
                 </div>
            </div>

        <script>
          function upload_documents(id)
          {        
             $('#schedule_query_id').val(id);    
             $('#upload_schedule_documents').modal('show');
          }
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
                divtest.innerHTML = '<div class="row"> <div class="col-md-8 col-md-offset-2 nopadding"><div class="form-group"><div class="input-group"> <input type="file" class="form-control" name="Document[]"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';        
                objTo.appendChild(divtest)
                 $('#upload_doc_form').bootstrapValidator('addField', 'Document[]');
              }
               function remove_education_fields(rid) 
               {
                 $('.removeclass'+rid).remove();
               }

          </script>

          <script>
          $(document).ready(function()
           {
                  Documentvalidator = {
                      row: '.col-md-8',
                      validators: {
                                    notEmpty: {
                                        message: 'Document is required'
                                    }
                      }
                  },
              $('#upload_doc_form')
                  .bootstrapValidator({
                      framework: 'bootstrap',
                      icon: {
                          valid: 'glyphicon glyphicon-ok',
                          invalid: 'glyphicon glyphicon-remove',
                          validating: 'glyphicon glyphicon-refresh'
                      },
                fields: {
                          'Document[]': Documentvalidator,
                      }
                  })
          });
          </script>

           <script type="text/javascript">
            $(document).ready(function (e)
               {
                 $("#upload_doc_form").on('submit',(function(e)
                     {
                       //e.preventDefault();
                       if (e.isDefaultPrevented())
                        {
                            //alert('invalid');
                        }
                        else
                        {
                            $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                            $("#preview_upload").show();                     
                                $.ajax({
                                      url: '<?php echo base_url('admin/Customer/UploadScheduleDocument') ?>',
                                      type: "POST",
                                      data:  new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false,
                                      success: function(data)
                                        {
                                           // alert(data);
                                           PNotify.removeAll();
                                           $("#preview_upload").hide();
                                             new PNotify({
                                                      title: 'Upload Document',
                                                      text: 'Document Uploaded Successfully !',
                                                      type: 'success'
                                                });
                                            setTimeout(function()
                                             {
                                                 window.location="<?php echo base_url('admin/Customer/Issue') ?>";
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
        function get_val(val)
        {
            alert(val);
        }
      </script>

      <script type="text/javascript">
        $( document ).ready(function() 
          {
            $('#issue_list_grid').DataTable({
                "bProcessing": true,
                "serverSide": true,               
                "displayLength": 5,
               "language": 
                {
                  "search": "Filter records:",
                  "searchPlaceholder": "Search by Name"
                },
               "ajax":{
                          url: "<?php echo base_url('admin/Customer/IssueAjaxUserData');?>",
                          type: "post", 
                          error: function()
                          {
                            $("#issue_list_grid").css("display","none");
                          }
                     }
              });   
          });
      </script>


      <script type="text/javascript">
        $( document ).ready(function() 
          {
            $('#reschedule_issue_list').DataTable({
                responsive: true,
                "bProcessing": true,
                "serverSide": true,
                "displayLength": 10,               

               "language": 
                {
                  "search": "Filter records:",
                  "searchPlaceholder": "Search by Name"
                },
                "ajax":{
                          url: "<?php echo base_url('admin/Customer/RescheduleIssueAjaxData');?>",
                          type: "post", 
                          error: function()
                          {
                            $("#reschedule_issue_list").css("display","none");
                          }
                     }
              });   
          });
      </script>

      <script type="text/javascript">
        $( document ).ready(function() 
          {
            $('#complete_issue_list').DataTable({
                responsive: true,
                "bProcessing": true,
                "serverSide": true,
                "displayLength": 10, 
                 "language": 
                  {
                    "search": "Filter records:",
                    "searchPlaceholder": "Search by Name"
                  },


        columnDefs: [
            { width: 500, targets: 4 }
        ],
        // fixedColumns: true

                "ajax":{
                          url: "<?php echo base_url('admin/Customer/CompleteIssueAjaxData');?>",
                          type: "post", 
                          error: function()
                          {
                            $("#reschedule_issue_list").css("display","none");
                          }
                     }
              });   
          });
      </script>

      <script type="text/javascript">
        $('#schedule_date').change(function()
        {
            $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_date'); 
        });

        $('#schedule_start_time').change(function()
        {
          $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_start_time'); 
        });

        $('#schedule_end_time').change(function()
        {
          $('#schedule_form').bootstrapValidator('revalidateField', 'schedule_end_time'); 
        });

      </script>


<script language="javascript">
  $(document).ready(function () {
      $("#schedule_date").datepicker({
          dateFormat: "d MM yy",
          minDate: 0
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function()
  {
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
  });
</script>

<script type="text/javascript">

function mainInfo1()
{
   var start_date = $('#schedule_date').val();
   var startTime = document.getElementById("schedule_start_time").value;
    var endTime = document.getElementById("schedule_end_time").value;
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
    if ((Date.parse(start_date) == Date.parse(someFormattedDate))) 
    {
          var now = new Date();
          var curr_time = now.getHours()+':'+now.getMinutes();
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
          var curr_time = now.getHours()+':'+now.getMinutes();
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
}
</script>


<script type="text/javascript">
$(document).ready(function() {
$('#schedule_form').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               

            customer_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Customer'
                        }
                }
            },

             product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select product'
                        }
                }
            },

             employee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Employee'
                        }
                }
            },

             schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Schedule Date'
                        }
                }
            },

             query: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Query'
                        }
                }
            },

             schedule_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start time'
                        }
                }
            },

             schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end time'
                        }
                }
            },

             schedule_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select schedule type'
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


<script type="text/javascript">
    $(document).ready(function (e)
       {

         $("#schedule_form").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  //alert('invalid');
                }
                else
                {
                  $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    var formresult = new FormData(this);
                          $.ajax({
                             url: "<?php echo base_url('admin/Customer/add_schedule'); ?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                    $("#preview").hide();
                                     if (data==1) 
                                     {
                                             $(function(){
                                               new PNotify({
                                                            title: 'Status Form',
                                                            text: 'Schedule Submited Successfully',
                                                            type: 'success'
                                                           });
                                              });

                                               setTimeout(function()
                                                 {
                                                     window.location="<?php echo base_url('admin/Customer/Issue');?>";
                                                 }, 1000);
                                     }
                                     else if(data==2)
                                     {
                                          var notice = new PNotify({
                                                      title: 'Confirmation',
                                                      text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
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
                                                          $.ajax({
                                                                     url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                                                                      type: "POST",
                                                                      data:  formresult,
                                                                      contentType: false,
                                                                      cache: false,
                                                                      processData:false,
                                                                      success: function(data)
                                                                      {    
                                                                        // alert(data);
                                                                        $(function(){
                                                                                   new PNotify({
                                                                                                title: 'Confirmation Form',
                                                                                                text: 'Schedule Submited Successfully',
                                                                                                type: 'success'
                                                                                               });
                                                                                  });

                                                                                    setTimeout(function()
                                                                                   {
                                                                                      window.location="<?php echo base_url('admin/Customer/Issue');?>";
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

<script>
    function chenge_status_model(id)
    {           
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

<script type="text/javascript">
  $(document).ready(function() 
  {
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
                        '<tr class="group" id="'+i+'"><td colspan="11">'+group+'</td></tr>'
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

  });

</script>


<script>
  function assign_to(id)
  {
      var datastring = 'query_id='+id;
      // alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/assign_task'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          // alert(data);
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
    function assign_to1(id)
    {
      var datastring = 'query_id='+id;
      // alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/assign_task1'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default12').modal('show');
            $('#user_model_data12').html(data);
        
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
            $('#modal_default1').modal('show');
           $('#user_model_data1').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script>
  function remark_list(id)
  {
    var datastring = 'ticket_no='+id;
    // alert(datastring);
     $.ajax({
      type: "post",
      url: "<?php echo base_url('admin/Customer/remark_list'); ?>",
      cache: false,    
      data: datastring,
      success: function(data)
      {    
        // alert(data);
            PNotify.removeAll();           
           $('#bind_issue_data').html(data);
           $('#issue_details').modal('show');
       },
      error: function(){      
       alert('Error while request..');
      }
     });

  }
</script>

<script>
    function bill_list(id)
    {
      var datastring = 'ticket_no='+id;
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/bill_list'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
            PNotify.removeAll();
             $('#modal_billing').modal('show');
             $('#billing_model_data').html(data);
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script>
    function reschedule_list(id)
    {
      var datastring = 'query_id='+id;
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/reschedule_list'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          // alert(data);
            PNotify.removeAll();
            if (data==0)
            {
                 new PNotify({
                                title: 'Remark',
                                text: 'No re-schedule result',
                                type: 'warning'
                               });
            }
            else
            {
                 $('#modal_reschedule').modal('show');
                 $('#reschedule_model_data').html(data);
            }
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script>
    function getassignedissue()
    {
        schedule_date = $('#schedule_date').val();
        employee_id = $('#employee_id').val();
        if (employee_id!='') 
        {
            var datastring = 'schedule_date='+schedule_date+'&employee_id='+employee_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
                cache: false,    
                data: datastring,
                success: function(data)
                {    
                    // alert(data);
                        $('#issuelistdetails').show();      
                        $('#issue_schedule_list').html(data);                 
                 },
                    error: function()
                    {      
                       alert('Error while request..');
                    }
                 });
                return false;
        }
    }


    $('#schedule_date').on('dp.change', function (e) 
    {
        var schedule_date = $('#schedule_date').val();
        employee_id = $('#employee_id').val();
        if (employee_id!='') 
        {
            var datastring = 'schedule_date='+schedule_date+'&employee_id='+employee_id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/getassignedissue'); ?>",
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

    });
</script>

<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'left',
    align: 'left',
    donetext: 'Done',
    minTime: '12:00' // 11:45:00 AM,
});

</script>

<script>

  function priority_normal(id)
  {         
    var datastring = 'query_id='+id;
    $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Customer/priority_normal'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
                PNotify.removeAll();
                $(function(){
                   new PNotify({
                                // title: 'priority Form',
                                text: 'Priority change  Successfully',
                                type: 'success'
                               });
                  });

                   setTimeout(function()
                     {
                         window.location="<?php echo base_url('admin/Customer/Issue');?>";
                     }, 1000);

          
         },
            error: function(){      
             alert('Error while request..');
            }
         });
        return false;

  }

    function priority_low(id)
    {
       var datastring = 'query_id='+id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/priority_low'); ?>",
                cache: false,    
                data: datastring,
                success: function(data)
                {    
                        PNotify.removeAll();
                        $(function(){
                           new PNotify({
                                        // title: 'priority Form',
                                        text: 'Priority change  Successfully',
                                        type: 'success'
                                       });
                          });

                           setTimeout(function()
                             {
                                 window.location="<?php echo base_url('admin/Customer/Issue');?>";
                             }, 1000);

                  
                 },
                    error: function(){      
                     alert('Error while request..');
                    }
                 });
                return false;
      }


    function priority_high(id)
     {
       var datastring = 'query_id='+id;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/priority_high'); ?>",
                cache: false,    
                data: datastring,
                success: function(data)
                {    
                        PNotify.removeAll();
                        $(function(){
                           new PNotify({
                                        // title: 'priority Form',
                                        text: 'Priority change  Successfully',
                                        type: 'success'
                                       });
                          });

                           setTimeout(function()
                             {
                                 window.location="<?php echo base_url('admin/Customer/Issue');?>";
                             }, 1000);

                  
                 },
                    error: function(){      
                     alert('Error while request..');
                    }
                 });
                return false;
    }
</script>

<script>
var param1var = getQueryVariable("param1");
function getQueryVariable(variable) 
{
    var key = window.location.search.substring(1);
    if(key=='addschedule')
    {
      $("#schedule_model").modal({backdrop: "static"});
    }
}
</script>



</body>
</html>
