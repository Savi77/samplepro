<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('Admin/includes/header'); ?>
  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
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
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <style type="text/css">
  .modal {
    display: none;
    overflow: hidden;
    position: fixed;
    top: 10%;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
    .pickadate {
      z-index: 100000;
    }

    .modal {
      overflow-y: auto !important;
    }

    .modal {
      z-index: 20;
    }

    .modal-backdrop {
      z-index: 10;
    }

    ​ .modal-lg {
      width: 90% !important;
    }

    @media (min-width: 769px) {
      .modal-lg {
        width: 90% !important;
      }
    }

    .sidebar-main {
      z-index: 0 !important;
    }

    .icons-list>li>a>i {
      top: -15px !important;
      margin-left: 8px !important;
    }
  </style>
  <style type="text/css">
    .multiselect-container>li>a>label.checkbox {
      margin: -6px 12px;
    }

    .multiselect-container {
      min-width: 275px;
      max-height: 250px;
      overflow-y: auto;
    }

    /* .btn-group>.btn:first-child {
      margin-left: 0;
      width: 240px !important;
    } */

    .help-block {
      color: #F44336 !important;
    }

    .table-xs>tbody>tr>td {
      font-size: 15px !important;
    }

    .table-sm>tbody>tr>td {
      padding: 5px 8px !important;
      text-align: center !important;
    }

    .dropdown-item {
      display: block;
      width: 100%;
      padding: .25rem 2.5rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }

    .dropdown-item.active,
    .dropdown-item:hover {
      color: #fff;
      text-decoration: none;
      background-color: #007bff;
    }

    fieldset.scheduler-border {
      border: 1px solid #009FDF !important;
      padding: 0 1.4em 1.4em 1.4em !important;
      margin: 0 0% 1.5em 0% !important;
      -webkit-box-shadow: 0px 0px 0px 0px #000;
      box-shadow: 0px 0px 0px 0px #009fdf;
    }

    legend.scheduler-border {
      font-size: 1.2em !important;
      font-weight: bold !important;
      text-align: left !important;
      width: auto;
      padding: 5px 10px;
      border-bottom: none;
      background: #009FDF;
      color: white;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      right: 0 !important;
      left: -100px;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 160px;
      padding: 5px 0;
      margin: 2px 0 0;
      list-style: none;
      font-size: 13px;
      text-align: left;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 3px;
      -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
      box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
      background-clip: padding-box;
    }
  </style>
</head>

<body style="overflow-x: hidden;">
  <?php $this->load->view('Admin/includes/admin_header'); ?>
  <?php
    // echo json_encode($user_permission_lead);
    $CreateQutClassLead = 'style="display:block";';
    $EditClassLead = 'style="display:block";';
    $CovertToCtClassLead = 'style="display:block";';
    $TransferClassLead = 'style="display:block";';
    $ActivityClassLead = 'style="display:block";';
    $ShareClassLead = 'style="display:block";';
    $UploadClassLead = 'style="display:block";';
    $EditQutClassLead = 'style="display:block";';

    $CreateQutClassOpp = 'style="display:block";';
    $EditClassOpp = 'style="display:block";';
    $TransferClassOpp = 'style="display:block";';
    $ActivityClassOpp = 'style="display:block";';
    $ShareClassOpp = 'style="display:block";';
    $UploadClassOpp = 'style="display:block";';
    $EditQutClassOpp = 'style="display:block";';

    foreach ($user_permission_lead as $priviledge) {
      $priviledge_key = $priviledge->priviledge_key;
      $status = $priviledge->status;
      if ($priviledge_key == 'EDIT') {
        if ($status == 1) {
          $EditClassLead = ' style="display:block"; ';
        } else {
          $EditClassLead = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'CREATEQUOTATION') {
        // echo 11;
        if ($status == 1) {
          $CreateQutClassLead = ' style="display:block"; ';
        } else {
          $CreateQutClassLead = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'CONVERTCONTACT') {
        if ($status == 1) {
          $CovertToCtClassLead = 'style="display:block"; ';
        } else {
          $CovertToCtClassLead = 'style="display:none"; ';
        }
      }

      if ($priviledge_key == 'TRANSFERLEAD') {
        if ($status == 1) {
          $TransferClassLead = 'style="display:block"; ';
        } else {
          $TransferClassLead = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'ADDTASK') {
        if ($status == 1) {
          $ActivityClassLead = 'style="display:block"; ';
        } else {
          $ActivityClassLead = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'SHARE') {
        if ($status == 1) {
          $ShareClassLead = 'style="display:block"; ';
        } else {
          $ShareClassLead = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'UPLOADDOC') {
        if ($status == 1) {
          $UploadClassLead = 'style="display:block"; ';
        } else {
          $UploadClassLead = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'EDITQUOTATION') {
        if ($status == 1) {
          $EditQutClassLead = 'style="display:block"; ';
        } else {
          $EditQutClassLead = 'style="display:none"; ';
        }
      }
    }

    foreach ($user_permission_opp as $priviledgeOpp) {
      $priviledge_key = $priviledgeOpp->priviledge_key;
      $status = $priviledgeOpp->status;
      if ($priviledge_key == 'EDIT') {
        if ($status == 1) {
          $EditClassOpp = ' style="display:block"; ';
        } else {
          $EditClassOpp = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'CREATEQUOTATION') {
        // echo 11;
        if ($status == 1) {
          $CreateQutClassOpp = ' style="display:block"; ';
        } else {
          $CreateQutClassOpp = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'TRANSFERLEAD') {
        if ($status == 1) {
          $TransferClassOpp = 'style="display:block"; ';
        } else {
          $TransferClassOpp = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'ADDTASK') {
        if ($status == 1) {
          $ActivityClassOpp = 'style="display:block"; ';
        } else {
          $ActivityClassOpp = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'SHARE') {
        if ($status == 1) {
          $ShareClassOpp = 'style="display:block"; ';
        } else {
          $ShareClassOpp = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'UPLOADDOC') {
        if ($status == 1) {
          $UploadClassOpp = 'style="display:block"; ';
        } else {
          $UploadClassOpp = 'style="display:none"; ';
        }
      }
      if ($priviledge_key == 'EDITQUOTATION') {
        if ($status == 1) {
          $EditQutClassOpp = 'style="display:block"; ';
        } else {
          $EditQutClassOpp = 'style="display:none"; ';
        }
      }
    }

  ?>
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
          <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
            <span class="text-semibold">Lead | Opportunity Details</span></a>
        </h4>
      </div>
    </div>
  </div>
  <div class="page-container">
    <div class="page-content">
      <?php $this->load->view('Admin/includes/sidebar'); ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <?php

              $taskparameter = 'leadopp_id=' . $lead_data['leadopp_id'] . '&GenerateID=' . $lead_data['lead_generate_id'] . '&tasktype=' . $lead_data['customer_type'];
              if ($lead_data['closure_date'] == '0000-00-00' || $lead_data['closure_date'] == '1970-01-01') {
                $closure_date_display = "NA";
              } else {
                $closure_date_display = date("d F, Y", strtotime($lead_data['closure_date']));
              }

              if ($lead_data['customer_type'] == 'Lead') {
                $displaycontact = '';
              } else {
                $displaycontact = 'display:none';
              }
              $assign_to = $lead_data['assign_to'];
            ?>
           
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title text-semibold">
                    <?= $lead_data['lead_generate_id']; ?>
                  </h5>
                  <div class="heading-elements">
                    <div class="heading-btn" style="display: flex;">
                      <?php if ($lead_data['customer_type'] == 'Lead') {  ?>
                          <div class="dropdown">
                            <button class="btn bg-indigo-400 dropdown-toggle" type="button" data-toggle="dropdown"> <i class="icon-gear mr-2"></i> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li>
                                <a onclick="create_quotation(this.id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $CreateQutClassLead ?>>
                                  <i class="icon-printer4" style="color: black;"></i> Create New Quotation
                                </a>
                              </li>
                              <li>
                                <a onclick="edit_lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $EditClassLead ?>>
                                  <i class="icon-pencil5" style="color: black;"></i> Edit Record
                                </a>
                              </li>
                              <li>
                                <a onclick="convert_to_contact(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $CovertToCtClassLead; ?>>
                                  <i class="glyphicon glyphicon-user" style="color: black;"></i> Convert To Contact
                                </a>
                              </li>
                              <li>
                                  <a onclick="Transfer_Lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $TransferClassLead ?>>
                                    <i class="icon-drag-right" style="color: black;"></i> Transfer Lead
                                  </a>
                              </li>
                              <li>
                                <a href="<?= base_url('admin/Customer/AddActivityTask') ?>?<?= $taskparameter ?>" <?= $ActivityClassLead ?>>
                                  <i class=" icon-clipboard6" style="color: black;"></i> Add Activity Task
                                </a>
                              </li>
                              <li>
                                  <a onclick="share_details(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $ShareClassLead ?>>
                                    <i class="icon-share3" style="color: black;"></i> Share Details
                                  </a>
                              </li>
                              <li>
                                  <a onclick="AddAttachment(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?>>
                                      <i class="icon-upload" style="color: black;"></i>  Add Attachment
                                  </a>
                              </li>
                            </ul>
                          </div>
                      <?php  } else { ?>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown"> <i class="icon-gear mr-2"></i> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li>
                                <a onclick="create_quotation(this.id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $CreateQutClassOpp; ?>>
                                    <i class="icon-printer4" style="color: black;"></i> Create New Quotation
                                </a>
                              </li>
                              <li>
                              <a onclick="edit_lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $EditClassOpp ?>>
                                  <i class="icon-pencil5" style="color: black;"></i> Edit Record
                              </a>
                              </li>
                              <li>
                                <a onclick="Transfer_Lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $TransferClassOpp ?>>
                                    <i class="icon-drag-right" style="color: black;"></i> Transfer Lead
                                </a>
                              </li>
                              <li>
                                <a href="<?= base_url('admin/Customer/AddActivityTask') ?>?<?= $taskparameter ?>" <?= $ActivityClassOpp ?>>
                                    <i class=" icon-clipboard6" style="color: black;"></i> Add Activity Task
                                </a>
                              </li>
                              <li>
                                  <a onclick="share_details(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $ShareClassLead ?>>
                                    <i class="icon-share3" style="color: black;"></i> Share Details
                                  </a>
                              </li>
                              <li>
                                  <a onclick="AddAttachment(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?>>
                                      <i class="icon-upload" style="color: black;"></i>  Add Attachment
                                  </a>
                              </li>
                            </ul>
                        </div>
                      <?php  }
                      ?>
                    </div>
                  </div>
                </div>

                <div class="panel-body">
                  <div class="row table-responsive">
                    <table class="table table-bordered table-xs sampletabledata">
                      <tbody>
                        <tr>
                          <td style="width: 20%;">Comapny Name</td>
                          <td style="color: #591F46;">
                            <b><?= $lead_data['company_name']; ?></b>
                          </td>
                          <td style="width: 20%;">Interested In</td>
                          <td style="color: #1A6EA4  ;">
                            <b><?= $lead_data['prdsrv_name']; ?></b>
                          </td>
                        </tr>

                        <tr>
                          <td>Address</td>
                          <td><?= $lead_data['address']; ?></td>
                          <td>Source</td>
                          <td style="color: #FF5732;">
                            <b><?= $lead_data['source']; ?></b>
                          </td>
                        </tr>

                        <tr>
                          <td>Contact Person</td>
                          <td><?= $lead_data['contact_person_name1']; ?></td>
                          <td>Stage</td>
                          <td style="color: #4FAD57;">
                            <b><?= $lead_data['stage']; ?></b>
                          </td>
                        </tr>
                        <tr>
                          <td>Contact Number</td>
                          <td><?= $lead_data['phone_no']; ?></td>
                          <td>Expected Revenue</td>
                          <td style="color: #6440B2;">
                            <b><?= $lead_data['project_business_value']; ?></b>
                          </td>
                        </tr>
                        <tr>
                          <td>Email ID</td>
                          <td><?= $lead_data['email']; ?></td>
                          <td>Expected Closure Date</td>
                          <td style="color: #00BBD1;">
                            <b><?= $closure_date_display; ?></b>
                          </td>
                        </tr>
                        <tr>
                          <td>Segment</td>
                          <td><?= $lead_data['business_name']; ?></td>
                          <td>Account Manager</td>
                          <td style="color: #B61B6B;">
                            <b> <?= $lead_data['empname']; ?></b>
                          </td>
                        </tr>
                        <tr>
                          <td>Type</td>
                          <td><?= $lead_data['type']; ?></td>
                          <td>TAG</td>
                          <td style="color:#BC990B;">
                            <b> <?= $lead_data['tag']; ?></b>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row" style="margin-top: 15px;">
                    <div class="tabbable tab-content-bordered">
                      <ul class="nav nav-tabs nav-tabs-highlight" id="myTab">
                        <li class="active"><a href="#bordered-tab1" data-toggle="tab" style="color: #0096EF !important;font-weight: 600;font-size: 15px;">Recent Activities/Task</a></li>
                        <li><a href="#quotation-tab" data-toggle="tab" style="color: #EC4279 !important;font-weight: 600;font-size: 15px;">Quotation</a></li>
                        <li><a href="#bordered-tab3" data-toggle="tab" style="color: #6440B2 !important;font-weight: 600;font-size: 15px;">Documents</a></li>
                        <li><a href="#bordered-tab2" data-toggle="tab" style="color: #F14860 !important;font-weight: 600;font-size: 15px;"><?= $lead_data['type']; ?> History</a></li>
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

                                  $count1 = 1;
                                  foreach ($activity_data as $result) {

                                    $taskstatus = $result['taskstatus'];
                                    if ($taskstatus == 'in_progress') {
                                      $taskstatus = '<span class="label label-primary"><b>In Progress</b></span>';
                                    } else if ($taskstatus == 'reschedule') {
                                      $taskstatus = '<span class="label label-info"><b>Reschedule</b></span>';
                                    } else if ($taskstatus == 'pending') {
                                      $taskstatus = '<span class="label label-warning" style="background-color: #FF9800;border-color: #FF9800;"><b>pending</b></span>';
                                    } else if ($taskstatus == 'completed') {
                                      $taskstatus = '<span class="label label-success"><b>completed</b></span>';
                                    } else if ($taskstatus == 'in_complete') {
                                      $taskstatus = '<span class="label label-danger"><b>In Completed</b></span>';
                                    }
                                  ?>
                                    <tr>
                                      <td><?= $count1; ?></td>
                                      <td><?= $result['type_name']; ?></td>
                                      <td><?= $result['empname']; ?></td>
                                      <td><?= date("d F, Y", strtotime($result['created_date'])) . '<br/> ' . date("h:i a", strtotime($result['created_date'])); ?></td>
                                      <td><?= date("d F, Y", strtotime($result['assign_date'])) . '<br/> ' . date("h:i a", strtotime($result->assign_starttime)); ?></td>
                                      <td><?= date("d F, Y", strtotime($result['statusdatetime'])) . '<br/> ' . date("h:i a", strtotime($result['statusdatetime'])); ?></td>
                                      <td><?= $taskstatus; ?></td>
                                      <td><?= $result['issue']; ?></td>
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


                        <div class="tab-pane has-padding" id="quotation-tab">
                          <div class="row">
                            <?php

                            foreach ($quotation_detail_list as  $row) {
                              $quotation_id = $row->quotation_id;
                              if ($row->quotation_status == 'won') {
                                $class = "success";
                              } else if ($row->quotation_status == 'lost') {
                                $class = "danger";
                              } else {
                                $class = "primary";
                              }
                            ?>

                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="panel invoice-grid">
                                      <div class="panel-body">
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <h6 class="text-semibold no-margin-top" style="color:#EC4479;">#<?= $row->quotation_number; ?></h6>
                                            <ul class="list list-unstyled">
                                              <li>Contact person : &nbsp;<?= $row->contact_person; ?></li>
                                              <li>Created on : <span class="text-semibold"><?= date("d F, Y", strtotime($row->quotation_date)); ?></span></li>
                                            </ul>
                                          </div>
                                          <div class="col-md-6">
                                            <ul class="list list-unstyled text-right">
                                              <li>Contact Number : &nbsp;<?= $row->contact_number; ?></li>
                                              <li>Email : &nbsp;<?= $row->email; ?></li>
                                              <li class="dropdown">
                                                Status : &nbsp;
                                                <a href="#" class="label bg-<?= $class; ?>-400 dropdown-toggle"><?= $row->quotation_status; ?></a>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-footer">
                                        <ul class="pull-left">
                                          <li><span class="status-mark border-danger position-left"></span> Due: <span class="text-semibold"><?= date("d F, Y", strtotime($row->valid_till)); ?></span></li>
                                        </ul>
                                        <ul class="pull-right" style="display: flex;">
                                          <li <?= $QuotationStatusClassLead; ?>>
                                            <div class="dropdown">
                                              <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;padding: 0;" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Quotation Status"><i class="icon-task"></i>
                                              </a>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" onclick="addQutationStatus('won',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">Won</a>
                                                <a class="dropdown-item" onclick="addQutationStatus('lost',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">Lost</a>
                                                <a class="dropdown-item" onclick="addQutationStatus('none',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">None</a>
                                              </div>
                                            </div>
                                          </li>
                                          <?php if ($lead_data['customer_type'] == 'Lead') {  ?>
                                            <li <?= $EditClassLead ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Edit Quotation"><i class="icon-pencil5"></i></a></li>
                                          <?php } else { ?>
                                            <li <?= $EditClassOpp ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Edit Quotation"><i class="icon-pencil5"></i></a></li>
                                          <?php } ?>
                                          <li><a href="<?= base_url("admin/Leads/QuotationPdf?qid=$quotation_id") ?>" target="_blank" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Download"><i class=" icon-file-download2"></i></a></li>
                                          <li><a href="<?= base_url("admin/Leads/ViewQuotation?qid=$quotation_id") ?>" target="_blank" data-popup="tooltip" title="" data-placement="bottom" data-original-title="View Quotation"><i class="icon-file-eye2"></i></a></li>

                                          <li><a onclick="quotation_mail(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Send Email"><i class="icon-envelop4"></i></a></li>
                                        </ul>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>
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
                                  $count = 1;
                                  foreach ($history_data as $res) {
                                  ?>
                                    <tr>
                                      <td><?= $count; ?></td>
                                      <td><?= date("d F, Y", strtotime($res->assign_datetime)); ?><br /><?= date("h:i a", strtotime($res->assign_datetime)); ?></td>
                                      <td><?= $res->empname; ?></td>
                                      <td><?= $res->contact_person_name1; ?></td>
                                      <td><?= $res->phone_no; ?></td>
                                      <td><?= $res->email; ?></td>
                                      <td><?= $res->address; ?></td>
                                      <td><?= $res->project_business_value; ?></td>
                                      <td><?= $res->remarks; ?></td>
                                    </tr>
                                  <?php
                                    $count++;
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>


                        <div class="tab-pane has-padding" id="bordered-tab3">
                          <div class="row">
                            <?php

                            foreach ($document_data as $res) {
                              $document = $res->uploadfilename;
                              $file = $res->name;

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
                                            <span class="text-semibold"><?= $document; ?></span>
                                            <br />
                                            <span class="text-muted" style="font-size: 12px;">
                                              <?= date("d F, Y H:ia", strtotime($res->datecreated)); ?>
                                            </span>
                                          </h6>
                                        </div>
                                        <div class="col-md-4">
                                          <ul class="icons-list pull-right">
                                            <li>
                                              <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file; ?>">
                                                <i class="icon-download" style="color:#4FAD57;font-size: 20px;"></i>
                                              </a>
                                            </li>
                                            <li>
                                              &nbsp; &nbsp;
                                              <a onclick="delete_document(this.id)" id="<?= $res->document_id; ?>" data-toggle="tooltip" title="Delete File">
                                                <i class="icon-trash" style="color:#FF5732;font-size: 20px;"></i>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>

                                    </div>
                                    <div class="media-annotation mt-12 text-semibold" style="color:#5f463de6;font-size: 14px">
                                      <?= $res->remark; ?>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br />
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
                <input type="hidden" name="db_lead_id" id="db_lead_id">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label col-sm-3" for="Youtube">Employee Name : <sup style="color: red">*</sup></label>
                    <div class="col-sm-9">
                      <select class="select-search form-control" name="emp_id" id="emp_id">
                        <span class="caret"></span>
                        <option value="">Select Employee</option>
                        <?php
                        foreach ($employee_list as $res) {
                          if ($res->id != $assign_to) {
                        ?>
                            <option value="<?= $res->id ?>">
                              <?= $res->name; ?>
                            </option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <br />
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
                  <form class="form-horizontal" id="addform" enctype='multipart/form-data'>
                    <input type="hidden" name="attachment_lead_id" id="attachment_lead_id">
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
                                Choose File :<input type="file" class="form-control" name="uploadfile[]">
                              </div>
                              <div class="col-xs-5">
                                Remark :<textarea class="form-control" name="fileremark[]" maxlength="150" rows="1"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group hide" id="bookTemplate">
                          <div class="col-md-12">
                            <div class="col-xs-1">
                              <button type="button" class="btn btn-danger removeButton" style="margin-top:20px">
                                <i class=" icon-trash"></i>
                              </button>
                            </div>
                            <div class="col-xs-6">
                              Choose File :<input type="file" class="form-control" name="uploadfile[]">
                            </div>
                            <div class="col-xs-5">
                              Remark :<textarea class="form-control" name="fileremark[]" maxlength="150" rows="1"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-md-offset-4">
                        <br />
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


  <!--  -->
  <div id="create_quotation_modal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" style="margin-top: -4px">
            <i class="icon-printer4" style="zoom:1.1; "></i>
            &nbsp;Create Quotation
          </h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="panel panel-flat">
              <div class="panel-body">
                <form class="form-vertical" id="add_new_form" method="POST">
                  <input type="hidden" name="db_quotation_lead_id" id="db_quotation_lead_id">
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Basic Info</legend>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-lg-4">Customer Name : </label>
                              <div class="col-lg-8">
                                <span id="cust_company_name"></span>
                              </div>
                            </div>
                            <br />

                            <div class="form-group">
                              <label class="control-label col-lg-4">Contact Number : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" id="quotation_contact_phone_no" name="contact_number" placeholder="Enter Contact Number" maxlength="15">
                              </div>
                            </div>
                            <br />
                            <div class="form-group">
                              <label class="control-label col-lg-4">Email ID : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" id="quotation_contact_email" name="email" placeholder="Enter Email ID" maxlength="40">
                              </div>
                            </div>
                            <br />
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-lg-4">Quotation Number : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="hidden" name="quote_custome_numner" id="quote_custome_numner" value="<?= $order_id; ?>">
                                <input type="text" class="form-control" name="quotation_number" placeholder="Enter Quotation Number" maxlength="100" value="<?= $performaGui; ?>" readonly>
                              </div>
                            </div>
                            <br />
                            <div class="form-group">
                              <label class="control-label col-lg-4">Quotation Date : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" name="quotation_date" id="quotation_date" placeholder="Enter Quotation Date" value="<?= date('d M, Y')?>">
                              </div>
                            </div>
                            <br />
                            <div class="form-group">
                              <label class="control-label col-lg-4">Kind Attention : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" id="quotation_contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50">
                              </div>
                            </div>
                            <br />
                            <div class="form-group">
                              <label class="control-label col-lg-4">Validity : <sup style="color: red">*</sup></label>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" name="validity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Validity" maxlength="2">
                              </div>
                            </div>
                          </div>

                        </div>
                      </fieldset>
                      <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Subject</legend>
                          <div class="row">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <textarea name="quto_subject" id="quto_subject" class="form-control" maxlength="1000" rows="3" placeholder="Enter Quotation Subject"></textarea>
                              </div>
                            </div>
                          </div>
                      </fieldset>
                      <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><i class="fa fa-life-ring position-left"></i> Product Details</legend>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-2">
                                <b class="text-center">Select Product</b>
                              </div>

                              <div class="col-md-2 nopadding">
                                <b class="text-center">Product Code</b>
                              </div>

                              <div class="col-md-1 nopadding">
                                <b class="text-center">Price</b>
                              </div>
                              <div class="col-md-2 nopadding">
                                <b class="text-center">Discount in %-Flat</b>
                              </div>
                              <div class="col-md-1 nopadding">
                                <b class="text-center">Quantity</b>
                              </div>

                              <div class="col-md-1 nopadding">
                                <b class="text-center">CGST %</b>
                              </div>

                              <div class="col-md-1 nopadding">
                                <b class="text-center">SGST %</b>
                              </div>

                              <div class="col-md-2 nopadding">
                                <b class="text-center">Total</b>
                              </div>
                              <div class="clear"></div>
                            </div>
                          </div>

                          <div class="col-md-12" style="margin-top: 1%;">
                            <div class="row">
                              <input type="hidden" name="cgstvalue[]" id="cgstvalue_0" readonly />
                              <input type="hidden" name="sgstvalue[]" id="sgstvalue_0" readonly />
                              <input type="hidden" name="subtotal[]" id="subtotal_0" readonly />
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control" name="productid[]" onchange="get_product_details(this.id)" id="productid_0">
                                    <option value="">Select Product</option>
                                    <?php
                                    foreach ($product_list as  $row2) {
                                    ?>
                                      <option value="<?= $row2->prd_srv_id; ?>">
                                        <?= $row2->prdsrv_name; ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="productcode[]" placeholder="Product Code" id="productcode_0" readonly />
                                </div>
                              </div>

                              <div class="col-md-1 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="price[]" id="productprice_0" placeholder="Price" />
                                </div>
                              </div>
                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="discount[]" id="discount_0" placeholder="Discount in %-Flat" onkeyup="calculate_discount(this.id)" />
                                </div>
                              </div>
                              <div class="col-md-1 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="quantity[]" placeholder="Enter Quantity" id="quantity_0" onkeyup="calculate_total(this.id)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                </div>
                              </div>

                              <div class="col-md-1 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="cgst[]" id="cgst_0" placeholder="CGST %" readonly />
                                </div>
                              </div>

                              <div class="col-md-1 nopadding">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="sgst[]" id="sgst_0" placeholder="SGST  %" readonly />
                                </div>
                              </div>

                              <div class="col-md-2 nopadding">
                                <div class="form-group">
                                  <div class="input-group">
                                    <input class="form-control" name="total[]" type="text" id="total_0" placeholder="Total">
                                    <div class="input-group-btn">
                                      <button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="clear"></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-4">
                                <textarea class="form-control" name="desctiption[]" id="desctiption_0" rows="2" maxlength="250" placeholder="Enter desctiption"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div id="education_fields"></div>
                          </div>
                        </div>
                      </fieldset>
                      <br />
                      <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><i class="icon-clipboard6 position-left"></i>
                          Section
                        </legend>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Select Section : <sup style="color: red">*</sup></label>
                              <select class="select-search form-control" name="section_id" onchange="get_section(this.value)">
                                <option value="">Select Section</option>
                                <?php foreach ($getAllSection as  $row6) {  ?>
                                  <option value="<?= $row6->section_id; ?>"><?= $row6->section_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-10" style="margin-top: 25px;">
                            <div id="section_data"></div>
                          </div>
                        </div>
                        <!-- <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Select Term For : <sup style="color: red">*</sup></label>
                              <select class="select-search form-control" name="termsfor" onchange="get_terms_list(this.value)">
                                <option value="">Select Term For</option>
                                <?php
                                foreach ($terms_for as  $row6) {
                                ?>
                                  <option value="<?= $row6->term_id; ?>"><?= $row6->term_for; ?></option>
                                <?php } ?>


                              </select>
                            </div>
                          </div>
                          <div class="col-md-10" style="margin-top: 25px;">
                            <button class="btn btn-success" type="button" onclick="add_terms_fields();" style="float: right;"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div id="termslist">
                            </div>
                          </div>
                        </div> -->
                      </fieldset>

                      <br /><br /><br />
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary pull-right">Submit<i class="icon-arrow-right14 position-right"></i></button>
                          <span id="preview_quotation" ></span>
                        </div>
                      </div>
                      <br /><br />
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
  <!--  -->

  <div id="edit_quotation_modal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="top: 10% !important;">
        <div class="modal-header" style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" style="margin-top: -4px">
            <i class="icon-printer4" style="zoom:1.1; "></i>
            &nbsp;Edit Quotation
          </h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="panel panel-flat">
              <div class="panel-body" id="edit_quotation_view">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->

  <div id="quotation_mail" class="modal fade" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Send Quotation</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <form class="form-horizontal" id="SendQuotationForm">
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label col-sm-2" for="To">To: <sup style="color: red">*</sup></label>
                  <div class="col-sm-10">
                    <input type="text" name="to_mail" id="to_mail" class="form-control" placeholder="To Mail Address">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label col-sm-2" for="CC">CC: </label>
                  <div class="col-sm-10">
                    <input type="hidden" name="quotation_id" id="quotation_id_mail">
                    <input type="text" name="cc_mail" id="cc_mail" class="form-control" placeholder="CC: Mail Address">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label col-sm-2" for="BCC">BCC: </label>
                  <div class="col-sm-10">
                    <input type="text" name="bcc_mail" id="bcc_mail" class="form-control" placeholder="BCC: Mail Address">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label col-sm-2" for="Subject">Subject <sup style="color: red">*</sup></label>
                  <div class="col-sm-10">
                    <input type="text" name="email_subject" id="email_subject" class="form-control" placeholder="Subject">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label col-sm-2" for="Subject">Email Draft <sup style="color: red">*</sup></label>
                  <div class="col-sm-10">
                    <textarea name="email_draft" id="email_draft" class="form-control" rows="3"></textarea>
                  </div>
                </div>
              </div>

              <br />
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Send Quotation<i class="icon-arrow-right14 position-right"></i></button>
                <span id="preview313"></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div id="googlemapmodal2" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top: 4rem;">
        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Search Google Address</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
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


  <div id="interest_model" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="top: 10% !important;">
        <div class="modal-header" style="background-color: #009FDF;color: white;padding: 13px; height: 55px;">
          <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" style="margin-top: -4px">
            <i class="icon-share3" style="zoom:1.1; "></i>
            &nbsp; &nbsp;Share Details
          </h5>
        </div>
        <div class="modal-body">
          <form id="share_form" method="post">
            <input type="hidden" name="share_db_lead_id" id="share_db_lead_id">
            <div class="panel panel-flat">
              <div class="panel-body">
                <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Select Employee :</label>
                        <div class="multi-select-full">
                          <select class="multiselect-select-all" multiple="multiple" name="emp_id[]">
                            <?php
                            foreach ($employee_list as $value1) {
                            ?>
                              <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>

                <br />
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Share Details <i class="icon-arrow-right14 position-right"></i></button>
                  <span id="share_preview"></span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script type="text/javascript">
    $("#quotation_date").on("dp.change", function(e) {
      $('#add_new_form').bootstrapValidator('revalidateField', 'quotation_date');
    });
    $(document).ready(function(){
      $('#email_draft').summernote();
    });

    function addQutationStatus(status, id, lead_id) {
      var datastring = 'status=' + status + '&id=' + id + '&lead_id=' + lead_id;
      $.ajax({
        url: "<?php echo base_url('admin/Leads/addQutationStatus'); ?>",
        type: "POST",
        data: datastring,
        success: function(data) {
          PNotify.removeAll();
          if (data == 0) {
            new PNotify({
              title: 'Qutation Status',
              text: 'Alrady Quotation Status Added Won!',
              type: 'error'
            });
            setTimeout(function() {
              location.reload(true);
            }, 1500);
          } else {
            new PNotify({
              title: 'Qutation Status',
              text: 'Quotation Status Added Successfully!',
              type: 'success'
            });
            setTimeout(function() {
              location.reload(true);
            }, 1500);
          }
        },
        error: function() {
          alert('Fail');
        }
      });
    }
  </script>

  <script type="text/javascript">
    $(function() {
      $('#quotation_date').datetimepicker({
        format: 'DD MMMM, YYYY',
        maxDate: 'now',
        useCurrent: true
      });
    });
  </script>

  <script type="text/javascript">

    function get_section(section_id) {
      var datastring = 'section_id=' + section_id;
      // alert(datastring);
      $.ajax({
        url: '<?php echo base_url('admin/Leads/get_section') ?>',
        type: "POST",
        data: datastring,
        success: function(data) {
          $('#section_data').html(data);
          $('#section_content').summernote();
        },
        error: function() {
          alert('fail');
        }
      });
    }

    // function get_terms_list(termsfor) {
    //   var datastring = 'termsfor=' + termsfor;
    //   // alert(datastring);
    //   $.ajax({
    //     url: '<?php echo base_url('admin/Leads/get_terms_list') ?>',
    //     type: "POST",
    //     data: datastring,
    //     success: function(data) {
    //       // alert(data);
    //       $("#termslist").html(data);
    //       $("#add_term_button").show();

    //     },
    //     error: function() {
    //       alert('fail');
    //     }
    //   });
    // }

    function edit_quotation_details(quotation_id) {
      var datastring = 'quotation_id=' + quotation_id;
      // alert(datastring);
      $.ajax({
        url: '<?php echo base_url('admin/Leads/edit_quotation_details') ?>',
        type: "POST",
        data: datastring,
        success: function(data) {
          $("#edit_quotation_view").html(data);
          $("#edit_quotation_modal").modal('show');
          // $("#edit_quotation_id").val(quotation_id);
        },
        error: function() {
          alert('fail');
        }
      });
    }
  </script>



  <script type="text/javascript">
    function quotation_mail(quotation_id) {
      var datastring = 'quotation_id=' + quotation_id;
      // alert(datastring);
      $.ajax({
        url: '<?php echo base_url('admin/Leads/quotation_mail') ?>',
        type: "POST",
        data: datastring,
        success: function(data) {
          $('#email_draft').summernote();
          response = JSON.parse(data);
          $("#quotation_id_mail").val(quotation_id);
          $("#to_mail").val(response.email_id);
          $("#email_subject").val(response.quotation_id);
          $("#quotation_mail").modal('show');
        },
        error: function() {
          alert('fail');
        }
      });
    }
  </script>

  <script type="text/javascript">
    var room_term = 431;

    function add_terms_fields() {
      room_term++;
      var objTo = document.getElementById('termslist')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass1" + room_term);
      var rdiv = 'removeclass1' + room_term;
      divtest.innerHTML = '<div class="row"> <div class="col-md-12"> <div class="col-md-11"><div class="form-group"><textarea class="form-control" name="terms[]" rows="1"></textarea></div></div><div class="col-md-1 nopadding"><div class="form-group "><div class="input-group"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_terms_fields(' + room_term + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div></div></div>';
      objTo.appendChild(divtest)

    }

    function remove_terms_fields(rid) {
      $('.removeclass1' + rid).remove();
    }

    var edit_room_term = 1431;

    function edit_add_terms_fields() {
      edit_room_term++;
      var objTo = document.getElementById('edit_termslist')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass21" + edit_room_term);
      var rdiv = 'removeclass1' + edit_room_term;
      divtest.innerHTML = '<div class="row"> <div class="col-md-12"> <div class="col-md-11"><div class="form-group"><textarea class="form-control" name="terms[]" rows="1"></textarea></div></div><div class="col-md-1 nopadding"><div class="form-group "><div class="input-group"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="edit_remove_terms_fields(' + edit_room_term + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div></div></div>';
      objTo.appendChild(divtest)
    }

    function edit_remove_terms_fields(rid) {
      $('.removeclass21' + rid).remove();
    }
  </script>

  <script type="text/javascript">
    var room = 1;

    function education_fields() {
      room++;
      var objTo = document.getElementById('education_fields')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass" + room);
      var rdiv = 'removeclass' + room;
      divtest.innerHTML = '<div class="row" style="margin-top:1%"><input  type="hidden"  name="cgstvalue[]"  id="cgstvalue_' + room + '"  readonly /><input  type="hidden" name="sgstvalue[]" readonly  id="sgstvalue_' + room + '" /><input  type="hidden" name="subtotal[]"  id="subtotal_' + room + '" readonly  /> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control"  name="productid[]"  onchange="get_product_details(this.id)" id="productid_' + room + '"><option value=""> Select Product</option><?php foreach ($product_list as  $row2) { ?><option value="<?= $row2->prd_srv_id; ?>"><?= $row2->prdsrv_name; ?></option><?php } ?></select> </div></div>  <div class="col-md-2 nopadding"><div class="form-group"><input  type="text" class="form-control" name="productcode[]"   placeholder="Product Code"  id="productcode_' + room + '" readonly  /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="price[]"  id="productprice_' + room + '"  placeholder="Price" /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control" name="discount[]" id="discount_' + room + '" placeholder="Discount in %-Flat" onkeyup="calculate_discount(this.id)" /></div></div>  <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="quantity[]" placeholder="Quantity" onkeyup="calculate_total(this.id)" id="quantity_' + room + '"   /></div></div><div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="cgst[]"  id="cgst_' + room + '"   placeholder="CGST  %"  readonly /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="sgst[]"  id="sgst_' + room + '" placeholder="SGST  %"  readonly /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><div class="input-group"> <input class="form-control" name="total[]" placeholder="Total" type="text"  id="total_' + room + '"  >  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div><div class="clear"></div></div><div class="row" ><div class="col-sm-8" style="padding: 0px 6px 0px 20px;"><textarea class="form-control" name="desctiption[]" id="desctiption_' + room + '" rows="2" maxlength="250" placeholder="Enter desctiption"></textarea></div></div></div>';
      objTo.appendChild(divtest)

      $('#add_new_form').bootstrapValidator('addField', 'productid[]');
      $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
    }

    function remove_education_fields(rid) {
      $('.removeclass' + rid).remove();
    }
  </script>

  <script>
    // $(document).ready(function() {
      brandvalidator = {
          row: '.col-md-3',
          validators: {
            notEmpty: {
              message: ' Product is required'
            }
          }
        },
        quantityvalidator = {
          row: '.col-md-3',
          validators: {
            notEmpty: {
              message: ' Quantity is required'
            }
          }
        },
        bookIndex = 0;

      $('#add_new_form')
        .bootstrapValidator({
          framework: 'bootstrap',
          icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },

          fields: {
            'productid[]': brandvalidator,
            'quantity[]': quantityvalidator,
            quotation_number: {
              validators: {
                notEmpty: {
                  message: 'Quotation Number is required'
                }
              }
            },
            quotation_date: {
              validators: {
                notEmpty: {
                  message: 'Quotation date is required'
                }
              }
            },
            termsfor1: {
              validators: {
                notEmpty: {
                  message: 'Select Term for is required'
                }
              }
            },

            email: {
              validators: {
                notEmpty: {
                  message: 'Email is required.'
                },
                regexp: {
                  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                  message: 'Enter valid email address'
                }
              }
            },

            validity: {
              validators: {
                notEmpty: {
                  message: 'Validity is required'
                }
              }
            },
          }
        })
        // Add button click handler
        .on('click', '.addButton', function() {})
        // Remove button click handler
        .on('click', '.removeButton', function() {});
    // });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $("#add_new_form").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          //alert('invalid');
        } else {
          $("#preview_quotation").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
          $("#preview_quotation").show();
          $.ajax({
            url: '<?php echo base_url('admin/Leads/AddQuotation') ?>',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              // alert(data);
              PNotify.removeAll();
              $("#preview_quotation").hide();
              new PNotify({
                title: 'Create New Quotation',
                text: 'Quotation Created Successfully !',
                type: 'success'
              });
              setTimeout(function() {
                location.reload(true);
              }, 1500);
            },
            error: function() {
              alert('fail');
            }
          });
        }
        return false;
      }));
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
    });
  </script>

  <script type="text/javascript">
    function get_product_details(id) {
      var productid = $("#" + id).val();
      var myStringArray = id.split('_');
      var index = myStringArray[1];
      var datastring = 'productid=' + productid;
      // alert(datastring);
      $.ajax({
        url: '<?= base_url('admin/Leads/get_product_details') ?>',
        type: "POST",
        data: datastring,
        success: function(data) {
          var json = $.trim(data);
          // alert(json);
          const obj = JSON.parse(json);
          // alert(obj.price);
          $("#productcode_" + index).val(obj.product_code);
          $("#sgst_" + index).val(obj.sgst_tax);
          $("#cgst_" + index).val(obj.cgst_tax);
          $("#productprice_" + index).val(obj.price);
          $("#desctiption_" + index).val(obj.prdsrv_description);
        },
        error: function() {
          alert('fail');
        }
      });
    }

    function calculate_discount(id) {
      
      var discount = $("#" + id).val();
      var myStringArray = id.split('_');
      var index = myStringArray[1];
      var purchaserate = $("#productprice_" + index).val();
      var quantity = $("#quantity_" + index).val();
      // console.log(discount);
      if (discount != '') {
        if (discount.includes("%") == true) {
          var discountNumber = removePer(discount);
          var discount_value = (purchaserate * discountNumber / 100);
          var preTotal = purchaserate - discount_value;
          var total = quantity * preTotal;
        } else {
          // var preTotal = purchaserate - discount;
          var total = quantity * purchaserate - discount;
        }
      } else {
        var total = quantity * purchaserate;
      }
      // console.log(total);
      var cgst = $("#cgst_" + index).val();
      var sgst = $("#sgst_" + index).val();
      var cgst_value = (total * cgst / 100);
      var sgst_value = (total * sgst / 100);
      var final_total = cgst_value + sgst_value + total;

      $("#cgstvalue_" + index).val(cgst_value);
      $("#sgstvalue_" + index).val(sgst_value);
      $("#subtotal_" + index).val(total);
      $("#total_" + index).val(final_total);
    }

    function calculate_total(id) {
      
      var quantity = $("#" + id).val();
      var myStringArray = id.split('_');
      var index = myStringArray[1];
      var purchaserate = $("#productprice_" + index).val();
      var discount = $("#discount_" + index).val();
      // console.log(discount);
      if (discount != '') {
        if (discount.includes("%") == true) {
          var discountNumber = removePer(discount);
          var discount_value = (purchaserate * discountNumber / 100);
          var preTotal = purchaserate - discount_value;
          var total = quantity * preTotal;
        } else {
          // var preTotal = purchaserate - discount;
          var total = quantity * purchaserate - discount;
        }
      } else {
        var total = quantity * purchaserate;
      }
      // console.log(total);
      var cgst = $("#cgst_" + index).val();
      var sgst = $("#sgst_" + index).val();
      var cgst_value = (total * cgst / 100);
      var sgst_value = (total * sgst / 100);
      var final_total = cgst_value + sgst_value + total;

      $("#cgstvalue_" + index).val(cgst_value);
      $("#sgstvalue_" + index).val(sgst_value);
      $("#subtotal_" + index).val(total);
      $("#total_" + index).val(final_total);
    }

    function removePer(str) {
      while (str.search("%") >= 0) {
        str = (str + "").replace('%', '');
      }
      return str;
    };

    function Transfer_Lead(lead_id) {
      $("#db_lead_id").val(lead_id);
      $("#Transfer_Lead").modal('show');
    }

    function share_details(lead_id) {
      $("#share_db_lead_id").val(lead_id);
      $("#interest_model").modal('show');
    }



    function create_quotation(lead_id) {
      var datastring = 'lead_id=' + lead_id;
      // alert(datastring);
      $.ajax({
        url: '<?= base_url('admin/Leads/get_lead_details') ?>',
        type: "POST",
        data: datastring,
        success: function(data) {
          $("#db_quotation_lead_id").val(lead_id);
          var json = $.trim(data);
          const obj = JSON.parse(json);
          $("#quotation_contact_person").val(obj.contact_person_name1);
          $("#quotation_contact_phone_no").val(obj.phone_no);
          $("#quotation_contact_email").val(obj.email);
          $("#cust_company_name").html(obj.company_name);
          $("#create_quotation_modal").modal();
        },
        error: function() {
          alert('fail');
        }
      });
    }

    function AddAttachment(lead_id) {
      // alert(lead_id);
      $("#attachment_lead_id").val(lead_id);
      $("#AddAttachmentmodal").modal({
        backdrop: 'static',
        keyboard: false
      });
    }

    function edit_lead(leadopp_id) {

      var datastring = 'leadopp_id=' + leadopp_id;
      // alert(datastring);
      $.ajax({
        url: "<?php echo base_url('admin/Leads/edit_lead'); ?>",
        type: "POST",
        data: datastring,
        success: function(data) {
          $("#editmodal").modal({
            backdrop: 'static',
            keyboard: false
          });
          $("#Lead_edit").html(data);
        },
        error: function() {

        }
      });
    }




    function show_activity_details(schedule_id) {
      var datastring = 'schedule_id=' + schedule_id;
      $.ajax({
        url: "<?php echo base_url('admin/Leads/show_activity_details'); ?>",
        type: "POST",
        data: datastring,
        success: function(data) {
          $("#show_activity").modal({
            backdrop: 'static',
            keyboard: false
          });
          $("#show_activity_details").html(data);
        },
        error: function() {

        }
      });

    }

    $(document).ready(function() {
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
    $(document).ready(function() {
      $('#SendQuotationForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
          to_mail: {
            validators: {
              notEmpty: {
                message: 'Enter valid email address'
              }
            }
          },
          email_subject: {
            validators: {
              notEmpty: {
                message: 'Please Enter Subject'
              }
            }
          }
        }
      });
    });


    $(document).ready(function(e) {
      $("#SendQuotationForm").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          // alert('invalid');
        } else {

          $("#preview313").show();
          $("#preview313").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

          $.ajax({
            url: "<?php echo base_url('admin/Leads/SendQuotationMail'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {

              if (data == 0) {
                new PNotify({
                  title: 'Email',
                  text: 'Please Add Email Configuration Setting!',
                  type: 'error'
                });
                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                }, 1000);
              } else {
                $("#preview313").hide();
                new PNotify({
                  title: 'Quotation Email',
                  text: 'Email Sent Successfully',
                  type: 'success'
                });

                setTimeout(function() {
                  window.location = "";
                }, 1000);
              }

              return false;
            },
            error: function() {}
          });
        }
        return false;

      }));
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      empvalidator = {
          row: '.col-md-12',
          validators: {
            notEmpty: {
              message: ' Please Select Employee '
            }
          }
        },

        $('#share_form').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
            'emp_id[]': empvalidator,
          }
        });
    });

    $(document).ready(function(e) {
      $("#share_form").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          // alert('invalid');
        } else {

          $("#share_preview").show();
          $("#share_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

          $.ajax({
            url: "<?php echo base_url('admin/Leads/ShareDetails'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              // alert(data);
              $("#share_preview").hide();
              new PNotify({
                title: 'Share Lead / Opportunity',
                text: 'Mail Sent  Successfully',
                type: 'success'
              });
              setTimeout(function() {
                window.location = "";
              }, 1000);

              return false;
            },
            error: function() {}
          });
        }
        return false;

      }));
    });
  </script>









  <script type="text/javascript">
    function open_google_map2() {
      $("#googlemapmodal2").modal('show');
      initialize2();
    }

    function initialize2() {
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
      var input = /** @type {HTMLInputElement} */ (
        document.getElementById('pac-input2'));
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      var searchBox = new google.maps.places.SearchBox((input));
      google.maps.event.addListener(searchBox, 'places_changed', function() {
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
          google.maps.event.addListener(marker, 'click', function(event) {
            get_city2(event.latLng.lat(), event.latLng.lng());
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              'latLng': latlng
            }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                  location_name = results[1].formatted_address;
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
      google.maps.event.addListener(map, 'bounds_changed', function() {
        var bounds = map.getBounds();
        searchBox.setBounds(bounds);
      });
    }

    function get_city2(lat, long) {
      var geocoder;
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(lat, long);
      geocoder.geocode({
          'latLng': latlng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              var add = results[0].formatted_address;
              var value = add.split(",");
              // alert(add);
              count = value.length;
              country = value[count - 1];
              state = value[count - 2];
              city = value[count - 3];
              if (value[count - 3] = null) {
                city = '';
              }
              // alert(city);
              document.getElementById('city2').value = city;
              $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
            } else {
              alert("address not found");
            }
          } else {
            alert("Geocoder failed due to: " + status);
          }
        }
      );
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $("#TransferLeadForm").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          // alert('invalid');
        } else {

          $("#preview31").show();
          $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

          $.ajax({
            url: "<?php echo base_url('admin/Leads/Transfer_Lead'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              var type = "<?= $this->session->user_type ?>"
              // alert(type);
              $("#preview31").hide();
              new PNotify({
                title: 'Transfer Leads',
                text: 'Leads Transfered  Successfully',
                type: 'success'
              });
              if (type == 'E') {
                setTimeout(function() {
                  window.location = "<?= base_url('admin/Leads/leads_opportunity'); ?>";
                }, 1000);
              } else {
                setTimeout(function() {
                  window.location = "";
                }, 1000);
              }

              return false;
            },
            error: function() {
              $(function() {
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
    function convert_to_contact(id) {
      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to convert to contact this Leads ?</p>',
        hide: false,
        type: 'success',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {
        var datastring = 'leadopp_id=' + id;
        // alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            // alert(data);
            $('#modal_default').modal('show');
            $('#complaint_model_data').html(data);
          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
        // alert('Oh ok. Chicken, I see.');
      });

    }
  </script>


  <script>
    function del_leads(id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this Leads opportunity?</p>',
        hide: false,
        type: 'warning',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {
        var datastring = 'leadopp_id=' + id;
        //alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Leads/del_leads'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            //alert(data);
            new PNotify({
              title: 'Delete Lead | Opportunity',
              text: 'Deleted Successfully',
              type: 'success'
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
            }, 1000);
          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
        // alert('Oh ok. Chicken, I see.');
      });

    }

    function delete_document(document_id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this document ?</p>',
        hide: false,
        type: 'warning',
        confirm: {
          confirm: true,
          buttons: [{
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
      notice.get().on('pnotify.confirm', function() {
        var datastring = 'document_id=' + document_id;
        // alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Leads/delete_document'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            // alert(data);
            new PNotify({
              title: 'Delete Document',
              text: 'Deleted Successfully',
              type: 'success'
            });
            setTimeout(function() {
              window.location = "";
            }, 2000);
          },
          error: function() {
            alert('Error while request..');
          }
        });
      })
      // On cancel
      notice.get().on('pnotify.cancel', function() {
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
    $(document).ready(function() {
      brandvalidator = {
          row: '.col-xs-6',
          validators: {
            notEmpty: {
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
            notEmpty: {
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
        .on('click', '.addButton', function() {
          bookIndex++;
          var $template = $('#bookTemplate'),
            $clone = $template
            .clone()
            .removeClass('hide')
            .removeAttr('id')
            .attr('data-book-index', bookIndex)
            .insertBefore($template);

          // Update the name attributes
          $clone
            .find('[name="uploadfile[]"]').attr('name', 'uploadfile[' + bookIndex + ']').end()
            .find('[name="fileremark[]"]').attr('name', 'fileremark[' + bookIndex + ']').end();

          $('#addform')
            .bootstrapValidator('addField', 'uploadfile[' + bookIndex + ']', brandvalidator)
            .bootstrapValidator('addField', 'fileremark[' + bookIndex + ']', remarkValidator);
        })
        // Remove button click handler
        .on('click', '.removeButton', function() {
          var $row = $(this).parents('.form-group'),
            index = $row.attr('data-book-index');

          // Remove element containing the fields
          $row.remove();
        });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      $("#addform").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
          //alert('invalid');
        } else {
          $("#preview").show();
          $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/Leads/UploadDocument'); ?>",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              // alert(data);
              $("#preview").hide();
              new PNotify({
                title: 'Upload Document',
                text: 'Document Uploaded Successfully',
                type: 'success'
              });
              setTimeout(function() {
                window.location = "";
              }, 500);

            },
            error: function() {
              alert('fail');
            }
          });
        }
        return false;
      }));
    });
  </script>


  <script type="text/javascript">
    function fake_load() {
      var cur_value = 1,
        progress;
      // Make a loader.
      var loader = new PNotify({
        title: "Loading ...",
        text: '<div class="progress progress-striped active" style="margin:0">\
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">\
          <span class="sr-only">0%</span>\
        </div>\
      </div>',
        //icon: 'fa fa-moon-o fa-spin',
        icon: 'fa fa-cog fa-spin',
        hide: false,
        buttons: {
          closer: false,
          sticker: false
        },
        history: {
          history: false
        },
        before_open: function(notice) {
          progress = notice.get().find("div.progress-bar");
          progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
          // Pretend to do something.
          var timer = setInterval(function() {
            if (cur_value == 90) {
              loader.update({
                title: "Loading",
                icon: "fa fa-spinner fa-spin"
              });
            }
            if (cur_value >= 100) {
              // Remove the interval.
              window.clearInterval(timer);
              loader.remove();
              return;
            }
            cur_value += 1;
            progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
          }, 60);
        }
      });
    }
  </script>

</body>

</html>