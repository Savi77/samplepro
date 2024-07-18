
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script> 
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>
    <style type="text/css">
      .pickadate 
      {
        z-index: 100000;
      }

      .modal 
      {
        overflow-y:auto !important;
      }

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

      .sidebar-main 
      {
          z-index: 0 !important;
      }

      .icons-list > li > a > i
      {
        top: -15px !important;
        margin-left: 8px !important;
      }
    </style>
    <style type="text/css">
      .multiselect-container>li>a>label.checkbox 
      {
          margin: -6px 12px;
      }
      .multiselect-container 
      {
        min-width: 275px;
        max-height: 250px;
        overflow-y: auto;
      }
     .btn-group > .btn:first-child
      {
          margin-left: 0;
          width: 240px !important;
      }
     .help-block
      {
        color: #F44336 !important;
      }      
      .table-xs > tbody > tr > td
      {
        font-size: 15px !important;
      }

      .table-sm > tbody > tr > td
      {
          padding: 5px 8px !important;
          text-align: center !important; 
      }



   </style>
</head>

<body style="overflow-x: hidden;">
 <?php  $this->load->view('Admin/includes/admin_header'); ?>
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Leads/leads_opportunity');?>">
          <span class="text-semibold">Lead | Opportunity List</span></a> 
        </h4>
      </div>
    </div>
  </div>
  <div class="page-container">
    <div class="page-content">
      <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <?php

                 $taskparameter='leadopp_id='.$lead_data['leadopp_id'].'&GenerateID='.$lead_data['lead_generate_id'].'&tasktype='.$lead_data['customer_type'];
                 if($lead_data['closure_date']=='0000-00-00' || $lead_data['closure_date']=='1970-01-01')
                 {
                   $closure_date_display="NA";
                 }
                 else
                 {
                   $closure_date_display=date("d F, Y",strtotime($lead_data['closure_date']));
                 }

                 if($lead_data['customer_type']=='Lead')
                 {
                   $displaycontact='';
                 }
                 else
                 {  
                   $displaycontact='display:none';
                 }

               $assign_to=$lead_data['assign_to'];


            ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title text-semibold">
                      <?= $lead_data['lead_generate_id']; ?>
                    </h5>
                    <div class="heading-elements">
                      <div class="heading-btn">
                           <a  onclick="edit_lead(id)" id="<?= $lead_data['leadopp_id'];?>">
                             <button type="button" class="btn  bg-teal-400 btn-icon"  data-toggle="tooltip" title="Edit Record" data-placement="top">
                              <i class="icon-pencil5" style="color: white;"></i>                        
                             </button>   
                           </a> 
                           <a onclick="convert_to_contact(id)"  id="<?= $lead_data['leadopp_id'];?>" style="<?= $displaycontact;?>">
                              <button type="button" class="btn btn-info btn-icon"  data-toggle="tooltip" title="Convert To Contact" data-placement="top">
                               <i class="glyphicon glyphicon-user" style="color: white;"></i>                            
                              </button>
                             </a>    
                            <a onclick="Transfer_Lead(id)"  id="<?= $lead_data['leadopp_id'];?>">
                              <button type="button" class="btn btn-primary btn-icon"  data-toggle="tooltip" title="Transfer Lead" data-placement="top">
                                <i class="icon-drag-right"  style="color: white;"></i>                             
                              </button>
                            </a>
                            <a  href="<?= base_url('admin/Customer/AddActivityTask')?>?<?= $taskparameter?>" >
                              <button type="button" class="btn btn-success btn-icon"  data-toggle="tooltip" title="Add Activity Task" data-placement="top">
                                  <i class=" icon-clipboard6" style="color: white;" ></i>                             
                              </button>
                            </a>
                            <a onclick="Transfer_Lead(id)"  id="<?= $lead_data['leadopp_id'];?>">
                              <button type="button" class="btn btn-warning btn-icon"  data-toggle="tooltip" title="Share Details" data-placement="top">
                               <i class="icon-share3" style="color: white;"></i>                        
                            </button>   
                           </a> 
                            <a  onclick="AddAttachment(id)" id="<?= $lead_data['leadopp_id'];?>">
                             <button type="button" class="btn bg-purple btn-icon"   data-toggle="tooltip" title="Add Attachment" data-placement="top">
                              <i class="icon-upload" style="color: white;"></i>
                           </a> 
                      </div>
                    </div>
                  </div>

                  <div class="panel-body">
                    <div class="row"> 
                       <table class="table table-bordered table-xs sampletabledata">
                          <tbody>
                            <tr>
                              <td style="width: 20%;">Comapny Name</td>
                                <td style="color: #591F46;">
                                  <b><?= $lead_data['company_name'];?></b>
                                </td>
                              <td style="width: 20%;">Interested In</td>
                                <td  style="color: #1A6EA4  ;">
                                  <b><?= $lead_data['prdsrv_name'];?></b>
                                </td>
                            </tr>

                            <tr>
                              <td>Address</td> <td><?= $lead_data['address'];?></td>
                              <td>Source</td>
                                <td  style="color: #FF5732;">
                                  <b><?= $lead_data['source'];?></b>
                                </td>                                 
                            </tr>

                            <tr>
                              <td>Contact Person</td> <td><?= $lead_data['contact_person_name1'];?></td>
                               <td>Stage</td> 
                                <td  style="color: #4FAD57;">
                                  <b><?= $lead_data['stage'];?></b>
                                </td> 
                            </tr>
                            <tr>
                              <td>Contact Number</td> <td><?= $lead_data['phone_no'];?></td>
                              <td>Expected Revenue</td>
                                 <td  style="color: #6440B2;">
                                   <b><?= $lead_data['project_business_value']; ?></b>
                                </td>                             
                            </tr>
                            <tr>
                              <td>Email ID</td> <td><?= $lead_data['email'];?></td>
                              <td >Expected Closure Date</td>
                              <td  style="color: #00BBD1;">
                                <b><?= $closure_date_display; ?></b>
                              </td>                              
                            </tr>
                            <tr>
                              <td>Segment</td> <td><?= $lead_data['business_name'];?></td>
                              <td>Account Manager</td>
                              <td style="color: #B61B6B;">
                               <b> <?= $lead_data['empname'];?></b>
                              </td>
                            </tr>
                            <tr>
                              <td>Type</td> <td><?= $lead_data['type'];?></td>
                              <td>TAG</td>
                              <td style="color:#BC990B;">
                               <b> <?= $lead_data['tag'];?></b>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>  



                      
                      <div class="row" style="margin-top: 15px;"> 
                          <div class="tabbable tab-content-bordered">
                            <ul class="nav nav-tabs nav-tabs-highlight" id="myTab">
                              <li class="active"><a href="#bordered-tab1" data-toggle="tab" style="color: #0096EF !important;font-weight: 600;font-size: 15px;">Recent Activities/Task</a></li>
                              <li><a href="#bordered-tab3" data-toggle="tab" style="color: #6440B2 !important;font-weight: 600;font-size: 15px;">Documents</a></li>
                               <li><a href="#bordered-tab2" data-toggle="tab" style="color: #F14860 !important;font-weight: 600;font-size: 15px;"><?= $lead_data['type'];?> History</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane has-padding active" id="bordered-tab1">
                                 <div class="row">
                                    <div class="table-responsive">
                                      <table class="table table-bordered table-framed table-sm">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Activities/Task</th>
                                              <th>Account Manager</th>
                                              <th>Creation Date Time</th>
                                              <th>Due Date Time</th>
                                              <th>Task Date Time</th>
                                              <th>Status</th>
                                              <th>Remarks</th>
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                             $count1=1;
                                             foreach ($activity_data as $result) 
                                             {

                                                $taskstatus=$result['taskstatus'];
                                                if($taskstatus=='in_progress')
                                                {
                                                  $taskstatus='<span class="label label-primary"><b>In Progress</b></span>';
                                                }
                                               else if($taskstatus=='reschedule')
                                                {
                                                    $taskstatus='<span class="label label-info"><b>Reschedule</b></span>';
                                                }
                                               else if($taskstatus=='pending')
                                                {
                                                   $taskstatus='<span class="label label-warning" style="background-color: #FF9800;border-color: #FF9800;"><b>pending</b></span>';
                                                }
                                               else if($taskstatus=='completed')
                                                {
                                                  $taskstatus='<span class="label label-success"><b>completed</b></span>';
                                                }
                                               else if($taskstatus=='in_complete')
                                                {
                                                  $taskstatus='<span class="label label-danger"><b>In Completed</b></span>';
                                                }
                                            ?>
                                             <tr>
                                                  <td><?= $count1;?></td>
                                                  <td><?= $result['type_name'];?></td>
                                                  <td><?= $result['empname'];?></td>
                                                  <td><?= date("d F, Y",strtotime($result['created_date'])).'<br/> '.date("h:i a",strtotime($result['created_date']));?></td>
                                                  <td><?= date("d F, Y",strtotime($result['assign_date'])).'<br/> '.date("h:i a",strtotime($result->assign_starttime));?></td>
                                                  <td><?= date("d F, Y",strtotime($result['statusdatetime'])).'<br/> '.date("h:i a",strtotime($result['statusdatetime']));?></td>
                                                  <td><?= $taskstatus;?></td>
                                                  <td><?= $result['issue'];?></td>
                                                  <td>
                                                       <a onclick="show_activity_details(this.id)" id="<?= $result['schedule_id']; ?>" class="label label-primary label-icon" title="View  Activity Details">
                                                        <i class="icon-file-eye2"></i>
                                                      </a>
                                                  </td>
                                              </tr>
                                           <?php
                                              $count1++; 
                                            } 
                                           ?>  
                                        </tbody>
                                      </table>
                                    </div>
                                 </div> 
                              </div>

                              <div class="tab-pane has-padding" id="bordered-tab2">
                                 <div class="row">
                                    <div class="table-responsive">
                                      <table class="table table-bordered table-framed table-sm">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Creation Date Time</th>
                                              <th>Account Manager</th>
                                              <th>Contact Person</th>
                                              <th>Contact No.</th>
                                              <th>Email</th>
                                              <th>Address</th>
                                              <th>Business Value</th>
                                              <th>Remarks</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                          <?php 
                                           $count=1;
                                           foreach ($history_data as $res) 
                                           {
                                          ?>
                                              <tr>
                                                  <td><?= $count;?></td>
                                                  <td><?= date("d F, Y",strtotime($res->assign_datetime));?><br/><?= date("h:i a",strtotime($res->assign_datetime));?></td>
                                                  <td><?= $res->empname;?></td>
                                                  <td><?= $res->contact_person_name1;?></td>
                                                  <td><?= $res->phone_no;?></td>
                                                  <td><?= $res->email;?></td>
                                                  <td><?= $res->address;?></td>
                                                  <td><?= $res->project_business_value;?></td>
                                                  <td><?= $res->remarks;?></td>
                                              </tr>
                                           <?php
                                              $count++; } 
                                           ?>     
                                        </tbody>
                                      </table>
                                    </div>
                                 </div> 
                              </div>

                              <div class="tab-pane has-padding" id="bordered-tab3">
                               <div class="row">
                                <?php 

                                 foreach ($document_data as $res) 
                                 {
                                    $document=$res->uploadfilename;
                                    $file=$res->name;

                                 ?>
                                    <div class="col-lg-4 col-sm-6">
                                      <div class="thumbnail">
                                          <div class="thumb">
                                            <div align="left" style="margin-left: 32px;margin-top: 11px;">
                                              <i class="icon-file-text3" style="font-size: 28px;">
                                              </i>
                                            </div>                                        
                                          </div>

                                         <div class="caption">
                                            <div class="media-heading">
                                             <div class="row"> 
                                               <div class="col-md-8"> 
                                                  <h6 class="pull-left no-margin">
                                                    <span class="text-semibold"><?= $document;?></span> 
                                                    <br/>
                                                    <span class="text-muted" style="font-size: 12px;">
                                                      <?= date("d F, Y H:ia",strtotime($res->datecreated)); ?>
                                                    </span>
                                                  </h6>
                                               </div>
                                               <div class="col-md-4">  
                                                  <ul class="icons-list pull-right">
                                                      <li>
                                                        <a target="_blank"  data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file;?>">
                                                          <i class="icon-download"  style="color:#4FAD57;font-size: 20px;"></i>
                                                        </a>
                                                      </li>
                                                      <li>
                                                        &nbsp; &nbsp;
                                                        <a onclick="delete_document(this.id)" id="<?=$res->document_id;?>"  data-toggle="tooltip" title="Delete File" >
                                                          <i class="icon-trash" style="color:#FF5732;font-size: 20px;"></i>
                                                        </a>
                                                      </li>
                                                  </ul>
                                               </div> 
                                            </div>  

                                            </div>
                                             <div class="media-annotation mt-12 text-semibold" style="color:#5f463de6;font-size: 14px"> 
                                                <?= $res->remark;?>
                                              </div>
                                          </div>

                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                          </div>
                         <br/>
                      </div>  
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>

     <div id="modal_default" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Convert To Contact</h6>
            </div>
            <div class="modal-body">
                <div id="complaint_model_data">
                </div>
           </div>
          </div>
        </div>
     </div>

     <div id="Transfer_Lead" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Transfer Lead Opportunity</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" id="TransferLeadForm">
                      <input type="hidden" name="db_lead_id" id="db_lead_id" >
                         <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-3" for="Youtube">Employee Name :  <sup style="color: red">*</sup></label>
                                   <div class="col-sm-9">
                                      <select class="select-search form-control" name="emp_id" id="emp_id">
                                         <span class="caret"></span>
                                          <option value="">Select Employee</option>
                                            <?php   
                                              foreach ($employee_list as $res) 
                                              {
                                                if($res->id!=$assign_to)
                                                {
                                            ?>
                                            <option value="<?= $res->id ?>">
                                              <?= $res->name;?>
                                            </option>
                                           <?php } } ?> 
                                      </select>
                                  </div>
                            </div>
                         </div>
                          <br/>
                          <div class="text-right">
                            <button type="submit" class="btn btn-primary">Transfer Lead <i class="icon-arrow-right14 position-right"></i></button>
                            <span id="preview31"></span>
                        </div> 
                    </form>  
                </div>
             </div>
          </div>
        </div>
     </div>



     <div id="AddAttachmentmodal" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info" style="background-color:#009FDF;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Add Attachment</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                   <div class="panel panel-flat" style="margin-bottom: 20px;border-color: #ddd;color: #333333;">
                      <div class="panel-body">
                        <form class="form-horizontal" id="addform"  enctype='multipart/form-data'>
                          <input type="hidden" name="attachment_lead_id" id="attachment_lead_id" >
                              <div class="">   
                                 <div class="col-md-12">
                                   <div class="form-group ">
                                      <div class="">  
                                       <div class="col-md-12">
                                            <div class="col-xs-1">
                                                <button type="button" class="btn btn-success addButton" style="margin-top:20px;">
                                                  <i class="icon-add"></i>
                                                </button>
                                            </div>
                                            <div class="col-xs-6">
                                                Choose File :<input type="file" class="form-control" name="uploadfile[]" >
                                            </div>
                                            <div class="col-xs-5">
                                                Remark :<textarea class="form-control" name="fileremark[]"  maxlength="150" rows="1"></textarea> 
                                            </div>
                                          </div> 
                                     </div>  
                                  </div>
                                </div>
                                <div class="col-md-12"> 
                                  <div class="form-group hide" id="bookTemplate" >
                                       <div class="col-md-12">
                                            <div class="col-xs-1">
                                               <button type="button" class="btn btn-danger removeButton" style="margin-top:20px">
                                                <i class=" icon-trash"></i>
                                              </button>
                                            </div>
                                            <div class="col-xs-6">
                                                Choose File :<input type="file" class="form-control" name="uploadfile[]" >
                                            </div>
                                            <div class="col-xs-5">
                                                Remark :<textarea class="form-control" name="fileremark[]" maxlength="150"  rows="1"></textarea> 
                                            </div>
                                      </div>
                                  </div>  
                               </div>
                                <div class="col-md-3 col-md-offset-4">
                                   <br/>
                                   <button type="submit" class="btn btn-primary btn-xs"><i class="icon-upload position-left"></i> Upload Document</button>
                                   <span id="preview"></span>
                                  </div>
                                </div> 
                            </form>  
                        </div>                     
                       </div>
                    </div> 
                </div>
             </div>
          </div>
        </div>
     </div>



     <div id="googlemapmodal2" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content" style="margin-top: 4rem;">
            <div class="modal-header bg-info" style="background-color:#00619F;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Search Google Address</h6>
            </div>
              <div class="modal-body">
                <div class="row">
                    <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control"  type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;"/>
                     <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
                    </div>
                </div>
              </div>
          </div>
        </div>
     </div>


     <div id="editmodal" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="margin-top: 4rem;" id="Lead_edit">       

          </div>
        </div>
     </div>

     <div id="show_activity" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="margin-top: 4rem;" id="show_activity_details">       



          </div>
        </div>
     </div>





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

      function Transfer_Lead(lead_id) 
      {
        $("#db_lead_id").val(lead_id); 
        $("#Transfer_Lead").modal('show');        
      }

      function AddAttachment(lead_id) 
      {
        // alert(lead_id);
        $("#attachment_lead_id").val(lead_id); 
        $("#AddAttachmentmodal").modal({backdrop: 'static',keyboard: false});                                      
      }

      function edit_lead(leadopp_id) 
      {
  
        var datastring='leadopp_id='+leadopp_id;
        // alert(datastring);
          $.ajax({
                    url: "<?php echo base_url('admin/Leads/edit_lead');?>",
                    type: "POST",
                    data:  datastring,
                    success: function(data)
                      {
                          $("#editmodal").modal({backdrop: 'static',keyboard: false});  
                          $("#Lead_edit").html(data);
                      },
                    error: function() 
                    {

                    }           
              });
      }


      function show_activity_details(schedule_id) 
      {
          var datastring='schedule_id='+schedule_id;
          $.ajax({
                    url: "<?php echo base_url('admin/Leads/show_activity_details');?>",
                    type: "POST",
                    data:  datastring,
                    success: function(data)
                      {
                          $("#show_activity").modal({backdrop: 'static',keyboard: false});  
                          $("#show_activity_details").html(data);
                      },
                    error: function() 
                    {

                    }           
              });

      }



      $(document).ready(function()
      {
          $('#TransferLeadForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                       emp_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Employee Name'
                                }
                           }
                      }                  
                }
            });
      });

 </script>

  <script type="text/javascript">

    function open_google_map2()
    {
      $("#googlemapmodal2").modal('show');
       initialize2();
    }

   function initialize2()
       {
        // alert();
          var markers = [];
          var map = new google.maps.Map(document.getElementById('googleMap2'), {
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              disableDefaultUI: true
          });
          var defaultBounds = new google.maps.LatLngBounds(
          new google.maps.LatLng(18.5204, 73.8567),
          new google.maps.LatLng(18.6204, 73.9567));
          map.fitBounds(defaultBounds);
          // Create the search box and link it to the UI element.
          var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input2'));
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
          var searchBox = new google.maps.places.SearchBox((input));
          google.maps.event.addListener(searchBox, 'places_changed', function ()
           {
              map.setZoom(15);
              var places = searchBox.getPlaces();
              if (places.length == 0) {
                  return;
              }
              for (var i = 0, marker; marker = markers[i]; i++) {
                  marker.setMap(null);
              }
              // For each place, get the icon, place name, and location.
              markers = [];
              var bounds = new google.maps.LatLngBounds();
              for (var i = 0, place; place = places[i]; i++) {
                  var image = {
                      url: place.icon,
                      size: new google.maps.Size(71, 71),
                      origin: new google.maps.Point(0, 0),
                      anchor: new google.maps.Point(17, 34),
                      scaledSize: new google.maps.Size(25, 25)
                  };
                  // Create a marker for each place.
                  var marker = new google.maps.Marker({
                      map: map,
                      draggable: true,
                      title: place.name,
                      position: place.geometry.location
                  });
                  markers.push(marker);
                  bounds.extend(place.geometry.location);
                  google.maps.event.addListener(marker, 'click', function (event)
                   {
                      get_city2(event.latLng.lat(),event.latLng.lng());
                      var lat =event.latLng.lat();
                      var lng =event.latLng.lng();
                      var latlng = new google.maps.LatLng(lat, lng);
                      var geocoder = geocoder = new google.maps.Geocoder();
                      geocoder.geocode({ 'latLng': latlng }, function (results, status)
                       {
                          if (status == google.maps.GeocoderStatus.OK) {
                              if (results[1])
                              {
                                  location_name =results[1].formatted_address;
                                  document.getElementById("address3").value = location_name;
                                  $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                  $("#googlemapmodal2").modal('hide');
                              }
                          }
                      });
                  });
              }
              map.fitBounds(bounds);
          });
         // [END region_getplaces]
          // Bias the SearchBox results towards places that are within the bounds of the
          // current map's viewport.
          google.maps.event.addListener(map, 'bounds_changed', function () {
              var bounds = map.getBounds();
              searchBox.setBounds(bounds);
          });
      }

  function get_city2(lat,long)
  {
      var geocoder;
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(lat, long);
      geocoder.geocode(
          {'latLng': latlng}, 
          function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                  {
                      if (results[0]) {
                          var add= results[0].formatted_address ;
                          var  value=add.split(",");
                          // alert(add);
                          count=value.length;
                          country=value[count-1];
                          state=value[count-2];
                          city=value[count-3];
                          if(value[count-3]=null)
                          {
                            city='';
                          }
                          // alert(city);
                          document.getElementById('city2').value = city;
                          $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                      }
                      else 
                      {
                          alert("address not found");
                      }
              }
               else 
               {
                  alert("Geocoder failed due to: " + status);
              }
          }
    );
  }
</script>

    <script type="text/javascript">
      $(document).ready(function (e)
       {
          $("#TransferLeadForm").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  // alert('invalid');
                }
                else
                {

                  $("#preview31").show();
                  $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                 
                  $.ajax({
                            url: "<?php echo base_url('admin/Leads/Transfer_Lead');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                 var type="<?= $this->session->user_type ?>"
                              // alert(type);
                                  $("#preview31").hide();
                                  new PNotify({
                                              title: 'Transfer Leads',
                                              text: 'Leads Transfered  Successfully',
                                              type: 'success'
                                             });
                                  if(type=='E')
                                  {
                                     setTimeout(function()
                                       {
                                         window.location="<?= base_url('admin/Leads/leads_opportunity');?>";                                      
                                       }, 1000); 
                                  }
                                  else
                                  {
                                     setTimeout(function()
                                       {
                                         window.location="";                                      
                                       }, 1000); 
                                  }

                                 return false;     
                              },
                            error: function() 
                            {
                               $(function(){
                                       new PNotify({
                                                    title: 'Leads Transfer',
                                                    text: 'Failed to load page',
                                                    type: 'warning'
                                                   });
                                      });
                                }           
                      });
                }
                return false;
            
            }));
        });
    </script>
<script>
  function convert_to_contact(id)
  {
    var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to convert to contact this Leads ?</p>',
          hide: false,
          type: 'success',
          confirm: {
              confirm: true,
              buttons: [
                  {
                      text: 'Convert',
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
            var datastring = 'leadopp_id='+id;
                  // alert(datastring);
                   $.ajax({
                          type: "post",
                          url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
                          cache: false,    
                          data: datastring,
                          success: function(data)
                          {    
                            // alert(data);
                            $('#modal_default').modal('show');
                            $('#complaint_model_data').html(data);
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


<script>
  function del_leads(id)
  {

    var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to delete this Leads opportunity?</p>',
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
          var datastring = 'leadopp_id='+id;
          //alert(datastring);
           $.ajax({
                  type: "post",
                  url: "<?php echo base_url('admin/Leads/del_leads'); ?>",
                  cache: false,    
                  data: datastring,
                  success: function(data)
                  {    
                    //alert(data);
                           new PNotify({
                                        title: 'Delete Lead | Opportunity',
                                        text: 'Deleted Successfully',
                                        type: 'success'
                                       });

                          setTimeout(function()
                         {
                            window.location="<?php echo base_url('admin/Leads/leads_opportunity');?>";
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
  function delete_document(document_id)
  {

    var notice = new PNotify({
          title: 'Confirmation',
          text: '<p>Are you sure you want to delete this document ?</p>',
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
          var datastring = 'document_id='+document_id;
          // alert(datastring);
           $.ajax({
                  type: "post",
                  url: "<?php echo base_url('admin/Leads/delete_document'); ?>",
                  cache: false,    
                  data: datastring,
                  success: function(data)
                  {    
                    // alert(data);
                       new PNotify({
                                      title: 'Delete Document',
                                      text: 'Deleted Successfully',
                                      type: 'success'
                                   });
                        setTimeout(function()
                         {
                            window.location="";
                         }, 2000);
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


<script>
// $(document).ready(function(){
//     $('[data-toggle="tooltip"]').tooltip(); 
// });
</script>

<script>
$(document).ready(function() 
{
        brandvalidator = {
            row: '.col-xs-6',
            validators: {
               notEmpty: 
                      {
                        message: 'Attachment is required'
                      },
                    file: {
                              extension: 'pdf,doc,docx,jpg,jpeg,png,bmp,xsl,xlsx',
                              // type: 'application/pdf,application/msword',
                              maxSize: 2048 * 1024,
                              message: 'Supported format - pdf, doc, docx, jpg, jpeg, png, bmp, xls, xlsx'
                          }

                  }
              },
        remarkValidator = {
            row: '.col-xs-5',
            validators: {
               notEmpty: 
                      {
                        message: 'Remark is required'
                      }
                  }
              },
     bookIndex = 0;

    $('#addform')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                      'uploadfile[]': brandvalidator,
                      'fileremark[]': remarkValidator,                
                  }
        })
        // Add button click handler
        .on('click', '.addButton', function()
         {
            bookIndex++;
            var $template = $('#bookTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-book-index', bookIndex)
                                .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="uploadfile[]"]').attr('name', 'uploadfile[' + bookIndex + ']').end()
                .find('[name="fileremark[]"]').attr('name', 'fileremark[' + bookIndex + ']').end()
                ;

              $('#addform')
                      .bootstrapValidator('addField', 'uploadfile[' + bookIndex + ']', brandvalidator)
                      .bootstrapValidator('addField', 'fileremark[' + bookIndex + ']', remarkValidator)
                      ;
              })
              // Remove button click handler
              .on('click', '.removeButton', function() 
              {
                  var $row  = $(this).parents('.form-group'),
                      index = $row.attr('data-book-index');

                  // Remove element containing the fields
                  $row.remove();
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
                  $("#preview").show();
                  $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                   $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('admin/Leads/UploadDocument'); ?>",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    // alert(data);
                                     $("#preview").hide();
                                     new PNotify({
                                                   title: 'Upload Document',
                                                   text: 'Document Uploaded Successfully',
                                                   type: 'success'
                                          });
                                        setTimeout(function()
                                         {
                                            window.location="";
                                         }, 500);

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

</body>
</html>
