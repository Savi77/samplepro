<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bulk Email</title>

     <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
     <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
     <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
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
          .modal-body {
               position: relative !important;
               padding-top: -14px !important;
               padding: 0px !important;
          }

          select[name='ajax_table_length'],
          select[name='all_activity_filter_table_length'] {
               margin-top: 8px !important;
          }

          .datatable-header,
          .datatable-footer {
               /*padding-top: 0px !important;*/
          }
     </style>
     <!--  -->

     <style type="text/css">
          /* .panel-flat>.panel-heading {
               padding-top: 10px !important;
               padding-bottom: 10px !important;
          } */

          .dataTables_wrapper {
               padding: 10px !important;
          }

          .form-horizontal .radio,
          .form-horizontal .checkbox,
          .form-horizontal .radio-inline,
          .form-horizontal .checkbox-inline {
               padding-top: 0px !important;
          }

          .table>thead>tr>th,
          .table>tbody>tr>th,
          .table>tfoot>tr>th,
          .table>thead>tr>td,
          .table>tbody>tr>td,
          .table>tfoot>tr>td {
               padding: 8px 13px !important;
          }

          .page-title {
               padding: 7px 30px 10px 0px !important;
          }

          .list-inline-condensed>li {
               padding-right: 0px !important;
          }

          @media (min-width: 1025px) {
               .modal-lg {
                    width: 99% !important;
               }
          }
          fieldset.scheduler-border {
               border: 1px solid #009fdf !important;
               padding: 0 1.4em 0.4em 1.4em !important;
               margin: 0 2% 1.5em 2% !important;
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
               background: #009fdf;
               color: white;
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
     <?php $this->load->view('Admin/includes/admin_header'); ?>
    

     <!-- Page container -->
     <div class="page-container">
          <div class="page-content">
               <!-- Main sidebar -->
               <?php $this->load->view('Admin/includes/sidebar'); ?>
               
               <div class="content-wrapper">
                    <div class="row">
                   
                         <div class="row">
                        
                              <div class="col-md-12">
                            
                                    <!-- Page header -->
                                    <div class="page-header">

<div class="page-header-content">

     <?php $this->load->view('Admin/includes/panel'); ?>

     <div class="page-title">
          <h4>
               <i class="icon-arrow-left52 position-left"></i>
               <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span
                         class="text-semibold">Dashboard</span></a> 
               
               - Bulk Email
          </h4>
     </div>

</div>
</div>
     <!-- /page header -->
                                   <div class="panel panel-flat">
                                        <div class="panel-heading table_header">
                                             <h5 class="panel-title" style="color:white">Bulk Email</h5>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-12" id="all_activity_filter" style="margin-top: 10px;">
                                                  <fieldset>
                                                       <div class="row">
                                                            <div class="col-md-12" style="padding-left: 8%;padding-right: 8%;">
                                                                 <div class="panel panel-default">
                                                                      <div class="panel-body" style="padding: 10px;background: #F5F5F5;color: black;">
                                                                           <label class="control-label col-sm-6" for="email">Module <span style="color: red;">*</span></label>
                                                                           <div class="form-group" style="margin-bottom: 4px;">
                                                                                <div class="col-sm-6" style="margin-left: -9%;">
                                                                                     <label class="radio-inline" style="margin-left: 20%;margin-top: 4px;">
                                                                                          <input type="radio" name="custtype" class="styled" value="contact" checked="" onclick="ModuleType(this.value)">
                                                                                          Contact
                                                                                     </label>
                                                                                     <label class="radio-inline" style="margin-left: 40%;">
                                                                                          <input type="radio" name="custtype" class="styled" value="crm"  onclick="ModuleType(this.value)">
                                                                                          CRM
                                                                                     </label>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </fieldset>

                                                  <div id="contact_display">
                                                       <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Filter Criteria</legend>
                                                            <form method="post" class="form-horizontal" id="get_data_form_contact">
                                                                 <input type="hidden" name="typeModule" id="typeModule" value="contact">
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label" style="padding: 4px;">Contact Type:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-shrink3"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select  class="form-control"  name="cust_type" id="cust_type">
                                                                                               <option value="All">Customer Type</option>
                                                                                               <option value="All">All</option>
                                                                                               <option value="primary">Primary</option>
                                                                                               <option value="secondary">Secondary</option>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Type of Contacts:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-hour-glass"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="TypeArray[]">
                                                                                               <?php
                                                                                               foreach ($TypeArray as  $row) {
                                                                                               ?>
                                                                                                    <option value="<?= $row->type_id; ?>"><?= $row->title; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Group:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-make-group"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple"  id="customer_type" name="group[]">
                                                                                               <?php
                                                                                                    foreach ($get_groupdata->result() as  $row) {
                                                                                               ?>
                                                                                                    <option value="<?= $row->group_id; ?>"><?= $row->group_name; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="row" style="padding: 1.1%;">
                                                                      <div class="col-md-4">
                                                                           <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Segements:</label>
                                                                                <div class="col-sm-9">
                                                                                     <div class="input-group date">
                                                                                          <span class="input-group-addon"><i class=" icon-briefcase3"></i></span>
                                                                                          <div class="multi-select-full">
                                                                                               <select class="multiselect-select-all" multiple="multiple" name="SegmentArray[]">
                                                                                                    <?php
                                                                                                    foreach ($SegmentArray as  $row) {
                                                                                                    ?>
                                                                                                         <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                                                                                    <?php } ?>
                                                                                               </select>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>

                                                                      <div class="col-md-4">
                                                                           <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Locations:</label>
                                                                                <div class="col-sm-9">
                                                                                     <div class="input-group date">
                                                                                          <span class="input-group-addon"><i class="icon-location4"></i></span>
                                                                                          <div class="multi-select-full">
                                                                                               <select class="multiselect-select-all" multiple="multiple" name="LocationArray[]">
                                                                                                    <?php
                                                                                                    foreach ($LocationArray as  $row) {
                                                                                                    ?>
                                                                                                         <option value="<?= $row->location_id; ?>"><?= $row->location; ?></option>
                                                                                                    <?php } ?>
                                                                                               </select>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <div class="col-md-4">
                                                                           <div class="form-group">
                                                                                <label class="col-sm-3 control-label" style="padding: 0;">Account Manager:</label>
                                                                                <div class="col-sm-9">
                                                                                     <div class="input-group date">
                                                                                          <span class="input-group-addon"><i class="icon-user-tie"></i></span>
                                                                                          <div class="multi-select-full">
                                                                                               <select class="multiselect-select-all" multiple="multiple" name="EmpArray[]">
                                                                                                    <?php
                                                                                                    foreach ($EmpArray as  $row2) {
                                                                                                    ?>
                                                                                                         <option value="<?= $row2->id; ?>"><?= $row2->name; ?></option>
                                                                                                    <?php } ?>
                                                                                               </select>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
                                                                      <button class="btn btn-primary" type="submit">Submit</button>
                                                                      <span id="loader_gif_contact"></span>
                                                                 </div>
                                                            </form>
                                                       </fieldset>
                                                  </div>

                                                  <div id="crm_display" style="display: none;">
                                                       <fieldset class="scheduler-border">
                                                                 <legend class="scheduler-border">Filter Criteria</legend>
                                                            <form method="post" class="form-horizontal" id="get_data_form_crm">
                                                                 <input type="hidden" name="typeModule" id="typeModule" value="crm">
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">From:<span style="color: red;">*</span></label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                     <input type="text" class="form-control start_date" name="start_date" id="start_date" placeholder="Please select start date" autocomplete="off" value="<?= date('01 M Y'); ?>">
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">To:<span style="color: red;">*</span></label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                     <input type="text" class="form-control end_date" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d M Y'); ?>">
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Type :</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="form-group">
                                                                                     <div class="input-group date">
                                                                                          <span class="input-group-addon"><i class="icon-paste3"></i></span>
                                                                                          <div class="multi-select-full">
                                                                                               <select class="form-control" name="lead_type" id="lead_type">
                                                                                                    <option value="" selected>Type</option>
                                                                                                    <option value="All">All</option>
                                                                                                    <option value="Lead">Lead</option>
                                                                                                    <option value="Opportunity">Opportunity</option>
                                                                                               </select>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Source:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-shrink3"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="sourceArray[]">
                                                                                               <?php
                                                                                               foreach ($SourceArray as  $row) {
                                                                                               ?>
                                                                                                    <option value="<?= $row->source_id; ?>"><?= $row->source_title; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Segements:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class=" icon-cube3"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="SegmentArray[]">
                                                                                               <?php
                                                                                               foreach ($SegmentArray as  $row) {
                                                                                               ?>
                                                                                                    <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Stage:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-hour-glass"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="StageArray[]">
                                                                                               <?php
                                                                                               foreach ($StageArray as  $row) {
                                                                                               ?>
                                                                                                    <option value="<?= $row->stage_id; ?>"><?= $row->stage_title; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Product:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-shutter"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="ProductArray[]">
                                                                                               <?php foreach ($ProductArray as  $row) { ?>
                                                                                                    <option value="<?= $row->prd_srv_id; ?>"><?= $row->prdsrv_name; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label" style="padding: 0;">Account Manager:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-user-tie"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="multiselect-select-all" multiple="multiple" name="EmpArray[]">
                                                                                               <?php
                                                                                               foreach ($EmpArray as  $row2) {
                                                                                               ?>
                                                                                                    <option value="<?= $row2->id; ?>"><?= $row2->name; ?></option>
                                                                                               <?php } ?>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-4">
                                                                      <div class="form-group">
                                                                           <label class="col-sm-3 control-label">Tag:</label>
                                                                           <div class="col-sm-9">
                                                                                <div class="input-group date">
                                                                                     <span class="input-group-addon"><i class="icon-paste3"></i></span>
                                                                                     <div class="multi-select-full">
                                                                                          <select class="form-control" name="tag_type" id="tag_type">
                                                                                               <option value="" selected>Tag</option>
                                                                                               <option value="Business">Business</option>
                                                                                          </select>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="col-md-12" style="text-align: right;margin-bottom: 10px">
                                                                      <span id="loader_gif_crm"></span>
                                                                      <button class="btn btn-primary" type="submit">Submit</button>
                                                                 </div>
                                                            </form>
                                                       </fieldset>
                                                  </div>
                                             </div>

                                             <div class="col-md-12" id="rsdata"></div>
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
               <div class="modal-content">
                    <div class="modal-header bg-info" style="background-color:#009FDF;">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h6 class="modal-title">Contact Details</h6>
                    </div>
                    <div class="modal-body">
                         <form class="form-horizontal" id="ViewDetailsModalData">

                         </form>
                    </div>
               </div>
          </div>
     </div>
     <!--  -->

     <!-- View Modal -->
     <div id="ViewTotalActivityDetailsModal" class="modal fade">
          <div class="modal-dialog modal-lg">
               <div class="modal-content" id="ViewTotalActivityDetailsModalData">

               </div>
          </div>
     </div>
     <!--  -->


</body>

<!-- Footer -->
<?php $this->load->view('Admin/includes/admin_footer.php'); ?>
        <!-- /footer -->
<script type="text/javascript">
     function ModuleType(val) {
          if (val == 'crm') {
               $('#crm_display').show();
               $('#contact_display').hide();
               // $("#rsdata").hide();
          } else if (val == 'contact') {
               $('#crm_display').hide();
               $('#contact_display').show();
               // $("#rsdata").hide();
          } else {
               window.location.href = "<?= base_url();?>admin/ReportAdmin/Reports/mail_write";
          }
     }

     function ViewDetails(customer_id) {
          var start_date = $("#start_date").val();
          var end_date = $("#end_date").val();
          var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
          // alert(datastring);
          $.ajax({
               url: "<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivitiesDetails'); ?>",
               type: "POST",
               data: datastring,
               success: function(data) {
                    // alert(data);
                    $("#ViewDetailsModalData").html(data);
                    $("#ViewDetailsModal").modal();
                    // $('#ajax_table').DataTable();  

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
               error: function() {
                    alert('fail');
               }
          });
     }


     function ViewTotalActivityDetails(customer_id) {
          var start_date = $("#start_date").val();
          var end_date = $("#end_date").val();
          var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
          // alert(datastring);
          $.ajax({
               url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewTotalActivityDetails'); ?>",
               type: "POST",
               data: datastring,
               success: function(data) {
                    // alert(data);
                    $("#ViewTotalActivityDetailsModalData").html(data);
                    $("#ViewTotalActivityDetailsModal").modal();
                    // $('#ajax_table').DataTable();  

                    $('#ajax_table2').DataTable({
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
               error: function() {
                    alert('fail');
               }
          });
     }
</script>

<script type="text/javascript">
     $(document).ready(function(e) {
          $("#get_data_form_crm").on('submit', (function(e) {

               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    //alert('invalid');
               } else {

                    $("#loader_gif_crm").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif_crm").show();

                    $.ajax({

                         url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeBulkEmail'); ?>",
                         type: "POST",
                         data: new FormData(this),
                         contentType: false,
                         cache: false,
                         processData: false,
                         success: function(data) {
                              // alert(data);
                              $("#loader_gif_crm").hide();
                              $("#rsdata").html(data);
                              // $('#all_activity_filter_table').DataTable();
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

                              // animateCSS('#all_activity_filter_table', 'zoomIn');
                              // Show_graph_report();
                         },
                         error: function() {
                              alert('fail');
                         }
                    });
               }
               return false;
          }));
          $("#get_data_form_contact").on('submit', (function(e) {
               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    //alert('invalid');
               } else {

                    $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif_contact").show();

                    $.ajax({

                         url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeBulkEmail'); ?>",
                         type: "POST",
                         data: new FormData(this),
                         contentType: false,
                         cache: false,
                         processData: false,
                         success: function(data) {
                              // alert(data);
                              $("#loader_gif_contact").hide();
                              $("#rsdata").html(data);
                              // $('#all_activity_filter_table').DataTable();
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
     $(function() {
          $(".start_date").datepicker({
               changeMonth: true,
               changeYear: true,
               dateFormat: "d M yy"
          });
          $(".end_date").datepicker({
               changeMonth: true,
               changeYear: true,
               dateFormat: "d M yy"
          });
     });
</script>


<script type="text/javascript">
     $(function() {

          // Setting datatable defaults
          $.extend($.fn.dataTable.defaults, {
               autoWidth: false,
               dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
               language: {
                    search: '<span>Filter:</span> _INPUT_',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                         'first': 'First',
                         'last': 'Last',
                         'next': '&rarr;',
                         'previous': '&larr;'
                    }
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
          $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
          // Enable Select2 select for the length option
          $('.dataTables_length select').select2({
               minimumResultsForSearch: Infinity,
               width: 'auto'
          });

     });
</script>


</html>