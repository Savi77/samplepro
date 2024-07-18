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
  <script type="text/javascript">
    $(document).ready(function() {
      $.fn.dataTable.ext.errMode = 'none';
    });
  </script>
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
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


  <!-- <link rel="stylesheet" href="http://demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/assets/css/bootstrap_limitless.min.css"> -->


  <style type="text/css">
    thead {
      display: none !important;
    }

    .icon-newspaper2:before {
      content: "\e99b";
      /*color: white !important;*/
    }
  </style>

  <style type="text/css">
    .nav-tabs.nav-tabs-bottom>li {
      margin-bottom: -4px;
    }

    .badge {
      padding: 1px 7px 0px 7px !important;
      font-size: 14px;
    }
  </style>
  <style type="text/css">
    tr.group,
    tr.group:hover {
      background-color: rgb(103, 98, 98) !important;
      color: white !important;
      font-size: 14px !important;
      font-weight: 600 !important;
    }

    .dataTables_length>label>span:first-child {
      float: left;
      margin: 5px 9px;
      margin-left: -15px;
    }

    .datatable-header>div:first-child,
    .datatable-footer>div:first-child {
      margin-left: 20px !important;
      left: -13px !important;
    }

    .dataTables_length {
      margin-right: 11px !important;
    }

    input,
    button,
    select,
    textarea {
      height: auto !important;
    }

    .btn-info {
      color: #fff;
      background-color: rgba(236, 14, 39, 0.77) !important;
      border-color: rgba(236, 14, 39, 0.77) !important;
    }

    .nav-tabs>li>a {
      margin-right: 0;
      color: #ddd !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
      padding: 10px 6px;
      border-bottom: 1px solid #111;
    }

    .nav-tabs[class*=bg-]>.active>a {
      background-color: rgba(0, 0, 0, 0.4) !important;
    }

    .dataTables_length>label>span:first-child {
      float: left;
      margin: 5px 9px;
      margin-left: -15px;
    }

    .datatable-header>div:first-child,
    .datatable-footer>div:first-child {
      margin-left: 20px !important;
      left: 0px !important;
    }

    .dataTables_length {
      margin-right: 11px !important;
    }
  </style>

  <style type="text/css">
    .ui-datepicker table td.ui-state-disabled span {
      color: #2d2d2d;
    }

    .ui-datepicker table td.ui-datepicker-today .ui-state-highlight {
      background-color: #2196F3;
      color: #252424;
    }

    .testing {
      z-index: 100000;
    }

    .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
      font-size: 12px;
      color: #333232;
      margin-left: 5px;
    }

    .ui-datepicker .ui-datepicker-prev span,
    .ui-datepicker .ui-datepicker-next span {
      display: none !important;
    }

    .ui-datepicker table td.ui-datepicker-current-day .ui-state-active {
      background-color: #26A69A;
      color: #333;
    }

    .table>tbody>tr>td {
      padding: 7px 15px !important;
    }
  </style>

  <style type="text/css">
    .daterange-single {
      z-index: 100000;
    }

    

    ​ .overflow-auto {
      overflow: hidden !important;
    }
  </style>
  <style>
    #blinklink {
      animation: blinklink 1.5s linear infinite;
    }

    @keyframes blinklink {
      100% {
        opacity: 0;
      }
    }

    .panel-body {
      padding: 10px !important;
    }
  </style>
</head>

<body style="overflow-x: hidden;">
  <?php $this->load->view('Admin/includes/admin_header'); ?>
  <!-- Page header -->
  <?php
  // echo json_encode($user_permission);
    $AddClassP = 'style="display:block";';
    $EditClass = 'style="display:block";';
    $DeleteClass = 'style="display:block";';
    $StatusClass = 'display:block';
    $importClass = 'display:block';
    $exportClass = 'display:block';

    foreach ($user_permission as $priviledge) {
      $priviledge_key = $priviledge->priviledge_key;
      $status = $priviledge->status;
      if ($priviledge_key == 'ADD') {
        if ($status == 1) {
          $AddClassP = ' style="display:block"; ';
        } else {
          $AddClassP = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'EDIT') {
        // echo 11;
        if ($status == 1) {
          $EditClass = ' style="display:block"; ';
        } else {
          $EditClass = ' style="display:none"; ';
        }
      }

      if ($priviledge_key == 'DELETE') {
        if ($status == 1) {
          $DeleteClass = 'style="display:block"; ';
        } else {
          $DeleteClass = 'style="display:none"; ';
        }
      }

      if ($priviledge_key == 'ACTIVE') {
        if ($status == 1) {
          $StatusClass = 'display:block';
        } else {
          $StatusClass = 'display:none';
        }
      }

      if ($priviledge_key == 'IMPORT') {
        if ($status == 1) {
          $importClass = 'display:block';
        } else {
          $importClass = 'display:none';
        }
      }
      if ($priviledge_key == 'EXPORT') {
        if ($status == 1) {
          $exportClass = 'display:block';
        } else {
          $exportClass = 'display:none';
        }
      }
    }
  ?>
 
  <!-- /page header -->


  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
      <?php $this->load->view('Admin/includes/sidebar'); ?>
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
          <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Dashboard</span></a> -
          <a href="<?php echo base_url('admin/ProductSpecification/Product'); ?>"> <span class="text-semibold">Product Management</span></a> - Product
        </h4>
      </div>

      <div class="heading-elements">
        <div class="heading-btn-group" style="display: flex;">
          <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text" <?= $AddClassP; ?>><i class="icon-file-plus text-primary"></i><span>ADD</span></a>
          <a style="color: green; <?= $importClass; ?> " onclick="ImportContact()" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-success"></i><span><b>Import Contact</b></span></a>
          <a style="color: red; <?= $exportClass; ?>" href="<?= base_url('admin/Product/ExportProductService'); ?>" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-danger"></i><span><b>Export Contact</b></span></a>
        </div>
      </div>
    </div>
  </div>
              <div class="panel panel-flat">
                <div class="panel-heading table_header">
                  <h5 class="panel-title" style="color:white"> Product | Service List</h5>
                </div>
                <?php
                 // $pending_cnt = count($issue_list_array);
                  // $quotient = (int)($pending_cnt/2);
                ?>
                <table class="table datatable-basic">
                  <tbody>
                    <?php foreach ($get_list as $row) { ?>
                      <tr>
                        <td class="hidden"></td>
                        <td class="hidden"><a href="#"></a></td>
                        <td class="hidden"></td>
                        <td class="hidden"></td>
                        <td style="width:100%;">
                          <div class="row">
                            <div class="d-flex align-items-start flex-column flex-md-row">
                              <div class="w-100  order-2 order-md-1">
                                <div class="card card-body">
                                  <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">

                                    <div class="col-md-2">
                                      <?php if (!empty($row['image'])) { ?>
                                        <img style="height:100px;width:100%;" src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $row['image'] ?>">
                                      <?php } else { ?>
                                        <img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg">
                                      <?php } ?>
                                    </div>

                                    <div class="col-md-8">
                                      <div class="media-body" style="text-align: left;">
                                        <h6 class="media-title font-weight-semibold" style="margin-bottom: 0px;">
                                          <a href="#"><b><?= $row['prdsrv_name'] ?></b></a>
                                        </h6>
                                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                          <li class="list-inline-item"><a href="#" class="text-muted">Category : <?= ucwords($row['category']) ?></a></li>
                                          <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;Sub Category : <?= ucwords($row['subcategory']) ?></a></li>
                                          <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;UOM : <?= ucwords($row['prdsrv_uom']) ?></a></li>
                                          <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;Product Code : <?= ucwords($row['product_code']) ?></a></li>
                                        </ul>
                                        <p class="mb-3"><?= $row['prdsrv_description'] ?></p>
                                      </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                      <h5 class="mb-0 font-weight-semibold" style="margin-top: 0px;">₹ <?= $row['price'] ?></h5>
                                      <div style="margin-bottom: 9px;<?= $StatusClass; ?>">
                                        <?php if ($row['status'] == 1) { ?>
                                          <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row['prd_srv_id'] ?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                        <?php } else { ?>

                                          <a data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row['prd_srv_id'] ?>" onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                        <?php } ?>
                                      </div>
                                    </div>
                                    <ul class="icons-list" style="display: inline-flex;">
                                      <li <?= $EditClass; ?>><a onclick="edit_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>"><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Product" data-placement="bottom"></i></span></a></li>
                                      <li <?= $DeleteClass; ?>><a onclick="del_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Product" data-placement="bottom"></i></span></a></li>
                                    </ul>
                                    <!-- <button type="button" class="btn bg-teal-400 mt-3"><i class="icon-cart-add mr-2"></i> Add to cart</button> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
              </div>

              </td>
              <td class="hidden">22 Jun 1972</td>
              </tr>
            <?php

                    } ?>
            </tbody>
            </table>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>




    <div id="interest_model" class="modal fade" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
            <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title" style="margin-top: -4px">
              <i class="fa fa-life-ring" style="zoom:1.1; "></i>
              &nbsp;Add New Product
            </h5>
          </div>
          <div class="modal-body">
            <form class="form-vertical" id="addform" method="post">
              <div class="panel panel-flat">
                <div class="panel-body">
                  <fieldset>
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                          <div class="panel-body" style="padding: 10px;">
                            <div class="form-group" style="margin-bottom: 4px;">
                              <label class="control-label col-sm-6" for="email">Product / Service Type <span style="color: red;">*</span></label>
                              <div class="col-sm-6">
                                <label class="radio-inline">
                                  <input type="radio" name="prd_srv_type" checked="" class="styled" value="product" onclick="product_group()">
                                  Product
                                </label>

                                <label class="radio-inline">
                                  <input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()">
                                  Service
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Category : <sup style="color: red">*</sup></label>
                          <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)">
                            <option value="">Select Category</option>
                            <?php
                            foreach ($get_menu_list as $value) {
                            ?>
                              <option value="<?= $value->id ?>"><?= $value->interest; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Sub-Category : <sup style="color: red">*</sup></label>
                          <select name="submenu_id" class="form-control" id="submmenu_data">
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Product Name : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" maxlength="100">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Printing Name : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Product Code : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="product_code" placeholder="Enter Product Name" maxlength="50">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Product Image : <sup style="color: red">*</sup></label>
                          <div class="media no-margin-top">
                            <div class="media-left">
                              <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
                            </div>
                            <div class="media-body">
                              <input type="file" class="file-styled" id="imgInp" name="fileup" accept="image/*">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select UOM : <sup style="color: red">*</sup></label>
                          <select class="select-search form-control" name="uom_type">
                            <option value="">Select UOM</option>
                            <?php
                            foreach ($get_data->result() as $uom) {
                            ?>
                              <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Product Price : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Product Specification : <sup style="color: red">*</sup></label>
                          <select class="select-search form-control" name="specification_id">
                            <option value="">Select Specification</option>
                            <?php
                            foreach ($specification_array as $row) {
                            ?>
                              <option value="<?= $row->specification_id ?>"><?= $row->specification_name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>GST Applicable : <sup style="color: red">*</sup></label>
                          <select class="select-search form-control" name="gst_applicable">
                            <option value="">Select Type</option>
                            <option value="Applicable">Applicable</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Undefined">Undefined</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>HSN / SAC Code : <sup style="color: red">*</sup></label>
                          <select class="select-search form-control" name="hsn_code">
                            <option value="">Select HSN</option>
                            <?php
                            foreach ($hsn_code_array as $hsn) {
                            ?>
                              <option value="<?= $hsn->hsn_id ?>"><?= $hsn->hsn_code; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>HSN Description :</label>
                          <input type="text" class="form-control" name="hsn_desc" placeholder="Enter Product / Service Price" maxlength="50">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Taxability : <sup style="color: red">*</sup></label>
                          <select class="select-search form-control" name="taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable">Taxable</option>
                            <option value="Nil Rated ">Nil Rated </option>
                            <option value="Exempt">Exempt</option>
                            <option value="Unknwon">Unknwon</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </fieldset>


                  <fieldset>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>IGST Rate : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="igst_tax" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>CGST Rate : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="cgst_tax" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>SGST Rate : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="sgst_tax" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Cess : <sup style="color: red">*</sup></label>
                          <input type="text" class="form-control" name="cess" placeholder="Enter Cess" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Product Description : <sup style="color: red">*</sup></label>
                          <textarea class="form-control" id="prd_srv_description" name="prd_srv_description" placeholder="Enter Description" maxlength="250" rows="1"></textarea>
                          <div class="row" style="height: 16px;">
                            <div class="col-lg-8">
                              <span style="font-size:15px; color:gray">Max: 250 character</span>
                            </div>
                            <div class="col-lg-4" style="height: 15px;">
                              <div class="col-lg-6">
                                <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left:</p>
                              </div>
                              <div class="col-lg-6">
                                <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">250</div>
                                <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="hidden" class="form-control" id="imgadd_count" name="imgadd_count" value="0">
                        <div class="form-group">
                          <div class="col-md-2">
                            <br>
                            <label class="control-label">Slider Images:<sup style="color: red">*</sup></label>
                          </div>
                          <div class="col-md-10">
                            <div class="col-xs-1">
                              <button type="button" class="btn btn-default addButton" style="margin-top: 20px;">
                                <i class="icon-stack-plus"></i>
                              </button>
                            </div>
                            <div class="col-xs-5">
                              File : <span style="color: red;">*</span><input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()">
                            </div>
                            <div class="col-xs-2">
                              <div id="thumb-output" style="margin-top: 20px;"></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group hide" id="bookTemplate">
                          <div class="col-md-10 col-md-offset-2">
                            <div class="col-xs-1">
                              <button type="button" class="btn btn-default removeButton" style="margin-top: 20px;"><i class="icon-stack-minus"></i></button>
                            </div>
                            <div class="col-xs-5">
                              File : <span style="color: red;">*</span><input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()">
                            </div>
                            <div class="col-xs-2">
                              <div id="thumb-output" style="margin-top: 20px;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>


                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-primary pull-right">Submit<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>




    <!-- /basic responsive configuration -->
    <div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info" style="background-color:#009FDF;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><i class="icon-steering-wheel"></i>&nbsp;&nbsp;Edit Prduct / Service</h6>
          </div>

          <div class="modal-body">
            <div id="prdsrv_model_data1">

            </div>
          </div>

        </div>
      </div>
    </div>
    <!--  -->
    <div id="ImportContact_modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #2196f3;color: white;padding: 13px; height: 55px;">
            <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title" style="margin-top: -4px">
              <i class="icon-file-excel" style="zoom:1.1; "></i>
              &nbsp;Import Product / Service
            </h5>
          </div>
          <div class="modal-body" style="padding: 10px;">
            <form id="upload_doc_form" method="post" enctype="multipart/form-data">
              <div class="panel panel-flat">
                <div class="panel-body" style="padding: 5px;">
                  <fieldset>
                    <br />
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-9 col-md-offset-3">
                            <div class="input-group">
                              <input type="file" class="form-control" name="excel">
                              <div class="label-block text-right" style="margin-top: 15%;">
                                <span class="label label-danger text-right"><a style="color:white;" href="<?= base_url() ?>assets/ExcelSheet/product.xlsx"><i class=" icon-download"></i>&nbsp;Download Sample File</a></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br /> <br />
                    <div align="center">
                      <button type="submit" class="btn btn-primary">Import Documents<i class="icon-arrow-right14 position-right"></i></button>
                      <span id="preview_upload"></span>
                    </div>
                  </fieldset>
                  <br />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--  -->

    <!-- Footer -->
    <?php $this->load->view('Admin/includes/admin_footer.php'); ?>
    <!-- /footer -->
    <!-- ====================character count================= -->

    <script type="text/javascript">
      function ImportContact() {
        $("#ImportContact_modal").modal({
          backdrop: "static"
        });
      }
      $("#prd_srv_description").keyup(function() {
        el = $(this);
        if (el.val().length >= 250) {
          el.val(el.val().substr(0, 250));
          $("#charNum").text(0);
        } else {
          $("#charNum").text(250 - el.val().length);
        }
      });
    </script>

    <!-- Import/Export File  -->
    <script>
      $(document).ready(function() {
        Documentvalidator = {
            // row: '.col-md-9',
            validators: {
              notEmpty: {
                message: 'Excel File is required'
              },
              file: {
                extension: 'xlx,xlsx',
                type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                // maxSize: 5*1024*1024,   // 5 MB
                message: 'The selected file is not valid, it should be (xlsx, xlx)'
              },

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
              'excel': Documentvalidator,
            }
          })
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(e) {
        $("#upload_doc_form").on('submit', (function(e) {
          //e.preventDefault();
          if (e.isDefaultPrevented()) {
            //alert('invalid');
          } else {
            $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
            $("#preview_upload").show();
            $.ajax({
              url: '<?php echo base_url('admin/Product/ImportProductService') ?>',
              type: "POST",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                // alert(data);

                // $("#preview_upload").html(data);
                $(function() {
                  new PNotify({
                    title: 'Import Product/Service',
                    text: 'Imported  Successfully !!',
                    type: 'success'
                  });
                });
                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/Product'); ?>";
                }, 3000);

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
    <!- -->
      <script>
        function file_upload(id) {
          $('#prd_id').val(id);
          $('#modal_file').modal('show');

        }
      </script>
      <!-- =================================================== Product service form =======================================-->
      <!-- ---------------------------- Image preview ----------------------------- -->
      <script type="text/javascript">
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#imgInp").change(function() {
          readURL(this);
        });
      </script>

      <!-- ---------------------------- / Image preview ----------------------------- -->
      <!-- ---------------------------- Submit form and validation ----------------------------- -->
      <script>
        $(document).ready(function() {
          brandvalidator = {
              row: '.col-xs-3',
              validators: {
                notEmpty: {
                  message: 'Required'
                }
              }
            },
            bookIndex = 0;
          // imgcnt = 0;

          $('#addform')
            .bootstrapValidator({
              framework: 'bootstrap',
              icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
              },

              fields: {
                'title[]': brandvalidator,
                location: {
                  validators: {
                    notEmpty: {
                      message: 'Location is required'
                    }
                  }
                },
                product_name: {
                  validators: {
                    notEmpty: {
                      message: 'Product / Service name is required'
                    }
                  }
                },
                menu_id: {
                  validators: {
                    notEmpty: {
                      message: 'Please Select Menu'
                    }
                  }
                },
                submenu_id: {
                  validators: {
                    notEmpty: {
                      message: 'Please Select Submenu'
                    }
                  }
                },
                prd_srv_price: {
                  validators: {
                    notEmpty: {
                      message: 'Product / Service price is required'
                    }
                  }
                },
                prd_srv_type: {
                  validators: {
                    notEmpty: {
                      message: 'Please select type'
                    }
                  }
                },
                fileup: {
                  validators: {
                    notEmpty: {
                      message: 'Please select File'
                    },
                    file: {
                      extension: 'jpg,png,jpeg,pdf,doc',
                      maxSize: 2097152, //2 mb  maxsize
                      message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                    }
                  }
                },
                uom_type: {
                  validators: {
                    notEmpty: {
                      message: 'UOM is required'
                    }
                  }
                },
                sgst_tax: {
                  validators: {
                    notEmpty: {
                      message: 'SGST is required'
                    }
                  }
                },
                cgst_tax: {
                  validators: {
                    notEmpty: {
                      message: 'CGST is required'
                    }
                  }
                },

                product_code: {
                  validators: {
                    notEmpty: {
                      message: 'Product Code is required'
                    }
                  }
                },

                printing_name: {
                  validators: {
                    notEmpty: {
                      message: 'Printing name is required'
                    }
                  }
                },

                specification_id: {
                  validators: {
                    notEmpty: {
                      message: 'Specification is required'
                    }
                  }
                },
                taxability: {
                  validators: {
                    notEmpty: {
                      message: 'Taxability is required '
                    }
                  }
                },

                gst_applicable: {
                  validators: {
                    notEmpty: {
                      message: 'GST Applicable  is required'
                    }
                  }
                },

                hsn_code: {
                  validators: {
                    notEmpty: {
                      message: 'HSN  is required'
                    }
                  }
                },

                igst_tax: {
                  validators: {
                    notEmpty: {
                      message: 'IGST is required'
                    }
                  }
                },

                prd_srv_description: {
                  validators: {
                    notEmpty: {
                      message: 'Description is required'
                    }
                  }
                },
                'upload_file[]': {
                  validators: {
                    notEmpty: {
                      message: 'Select File'
                    },
                    file: {
                      extension: 'jpg,png,jpeg,pdf,doc',
                      maxSize: 2097152, //2 mb  maxsize
                      message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                    }
                  }
                }
              }
            })

            // Add button click handler
            .on('click', '.addButton', function() {
              bookIndex++;
              // alert(imgcnt);
              var imgcnt = $('#imgadd_count').val();
              // var imgstore_cnt $('#imgadd_count').val(imgcnt);
              if (imgcnt < 2) {
                var result2 = parseInt(imgcnt) + 1;
                $('#imgadd_count').val(result2);

                var $template = $('#bookTemplate'),
                  $clone = $template
                  .clone()
                  .removeClass('hide')
                  .removeAttr('id')
                  .attr('data-book-index', bookIndex)
                  .insertBefore($template);

                // Update the name attributes
                $clone
                  .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                  .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

                // Add new fields
                // Note that we also pass the validator rules for new field as the third parameter
                $('#addform')
                  .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
              } else {
                PNotify.removeAll()
                new PNotify({
                  title: 'Image Upload',
                  text: 'Maximum image upload size is 3',
                  type: 'warning'
                });
              }
            })

            // Remove button click handler
            .on('click', '.removeButton', function() {
              var img_count1 = $('#imgadd_count').val();
              // alert(img_count);
              var result1 = parseInt(img_count1) - 1;
              // alert(result);
              $('#imgadd_count').val(result1);

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
            if (e.isDefaultPrevented()) {
              //alert('invalid');
            } else {
              // alert();
              $.ajax({

                url: "<?php echo base_url('admin/Product/add_product_service'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                  // $("#inner_page_desc").val('');
                  // alert(data);
                  new PNotify({
                    title: 'Add  Product / Service',
                    text: 'Added  Successfully',
                    type: 'success'
                  });

                  setTimeout(function() {
                    window.location = "<?php echo base_url('admin/Product'); ?>";
                  }, 1000);


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
      <script>
        function file_upload() {
          // alert();

          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/About/get_file'); ?>",
            success: function(data) {
              // alert(data);
              $('#modal_file').modal('show');
              $('#file_model_data').html(data);

            },
            error: function() {
              alert('Error while request..');
            }
          });
        }
      </script>

      <script>
        $(document).ready(function() {
          brandvalidator = {
              row: '.col-xs-3',
              validators: {
                notEmpty: {
                  message: 'Select title'
                }
              }
            },
            bookIndex = 0;

          $('#sectionform12')
            .bootstrapValidator({
              framework: 'bootstrap',
              icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
              },

              fields: {
                'title[]': brandvalidator,
                location: {
                  validators: {
                    notEmpty: {
                      message: 'Location is required'
                    }
                  }
                },
                'upload_file[]': {
                  validators: {
                    notEmpty: {
                      message: 'Select File'
                    },
                    file: {
                      extension: 'jpg,png,jpeg,pdf,doc',
                      maxSize: 2097152, //2 mb  maxsize
                      message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                    }
                  }
                }
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
                .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
              // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

              // Add new fields
              // Note that we also pass the validator rules for new field as the third parameter
              $('#sectionform12')
                .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
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

      <!--======================================= / Validation login  ==========================================-->
      <script type="text/javascript">
        $(document).ready(function(e) {
          $("#sectionform12").on('submit', (function(e) {

            var content = CKEDITOR.instances['editor-full'].getData();
            // $("#inner_page_desc").val(content);
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
              //alert('invalid');
            } else {
              // alert();
              $.ajax({

                url: "<?php echo base_url('admin/Product/profile_file'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                  // $("#inner_page_desc").val('');
                  // alert(data);
                  new PNotify({
                    title: 'Add  File',
                    text: 'Added  Successfully',
                    type: 'success'
                  });

                  setTimeout(function() {
                    window.location = "<?php echo base_url('admin/Product'); ?>";
                  }, 1000);


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

      <script>
        function deactivate(id) {

          var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Product / Service?</p>',
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

            var datastring = 'uprdsrvid=' + id;
            // alert(datastring);
            $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/deactivate'); ?>",
              cache: false,
              data: datastring,
              success: function(data) {
                // alert(data);
                new PNotify({
                  title: 'Confirmation Form',
                  text: 'Inactive successfully',
                  type: 'success'
                });
                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/Product'); ?>";
                }, 800);


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
        function activate(id) {

          var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Product / Service?</p>',
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

            var datastring = 'uprdsrvid=' + id;
            // alert(datastring);
            $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/activate'); ?>",
              cache: false,
              data: datastring,
              success: function(data) {
                //alert(data);
                new PNotify({
                  title: 'Confirmation Form',
                  text: 'Activated successfully',
                  type: 'success'
                });
                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/Product'); ?>";
                }, 800);


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

      <script type="text/javascript">
        function fetch_submenu(id) {
          var datastring = 'menu_id=' + id;
          // alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
              // alert(data);
              $('#submmenu_data').html(data);
            },
            error: function() {
              alert('Error while request..');
            }
          });
        }

        $(document).ready(function() {
          var table = $('#example').DataTable({
            "columnDefs": [{
              "visible": false,
              "targets": 2
            }],
            "order": [
              [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
              var api = this.api();
              var rows = api.rows({
                page: 'current'
              }).nodes();

              var last = null;

              var groupadmin = [];

              api.column(2, {
                page: 'current'
              }).data().each(function(group, i) {

                if (last !== group) {

                  $(rows).eq(i).before(
                    '<tr class="group" id="' + i + '"><td colspan="10">' + group + '</td></tr>'
                  );
                  groupadmin.push(i);
                  last = group;
                }
              });

              for (var k = 0; k < groupadmin.length; k++) {
                // Code added for adding class to sibling elements as "group_<id>"  
                $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                // Code added for adding Toggle functionality for each group
                $("#" + groupadmin[k]).click(function() {
                  var gid = $(this).attr("id");
                  $(".group_" + gid).slideToggle(300);
                });

              }
            }
          });
        });
      </script>


      <script type="text/javascript">
        $(document).ready(function() {
          $('#addform').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
              product_name: {
                validators: {
                  notEmpty: {
                    message: 'Product Name is required'
                  }
                }
              },
              menu_id: {
                validators: {
                  notEmpty: {
                    message: 'Please Select Menu'
                  }
                }
              },
              short_desc: {
                validators: {
                  notEmpty: {
                    message: 'Enter Short Description'
                  }
                }
              },
              submenu_id: {
                validators: {
                  notEmpty: {
                    message: 'Please Select Submenu'
                  }
                }
              }
            }
          });
        });
      </script>


      <script type="text/javascript">
        /*$(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })*/
      </script>
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
        })();
      </script>

      <!--======================================= / Validation login  ==========================================-->
      <script type="text/javascript">
        $(document).ready(function(e) {
          $("#addform1").on('submit', (function(e) {

            var content = CKEDITOR.instances['editor-full'].getData();
            $("#inner_page_desc").val(content);
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
              //alert('invalid');
            } else {
              $.ajax({

                url: "<?php echo base_url('admin/Product/add'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                  $("#inner_page_desc").val('');
                  // alert(data);
                  new PNotify({
                    title: 'Add  Product',
                    text: 'Added  Successfully',
                    type: 'success'
                  });

                  setTimeout(function() {
                    window.location = "<?php echo base_url('admin/Product'); ?>";
                  }, 1000);


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


      <!--=======================================  delete Product / Service  ==========================================-->

      <script>
        function del_prdsrv(id) {

          var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Product / Service?</p>',
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

            var datastring = 'uprdsrvid=' + id;
            // alert(datastring);
            $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/delete'); ?>",
              cache: false,
              data: datastring,
              success: function(data) {
                //alert(data);
                new PNotify({
                  title: 'Delete Product',
                  text: 'Deleted successfully',
                  type: 'success'
                });
                setTimeout(function() {
                  window.location = "<?php echo base_url('admin/Product'); ?>";
                }, 800);


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



      <!--======================================= / Delete Product / Service  ==========================================-->
      <!-- ====================================== Edit Product / Service ========================================= -->
      <script>
        function edit_prdsrv(id) {
          var datastring = 'prd_srv_id=' + id;
          //alert(datastring);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Product/edit_prdsrv'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
              // alert(data);
              $('#modal_default1').modal('show');
              $('#prdsrv_model_data1').html(data);

            },
            error: function() {
              alert('Error while request..');
            }
          });
        }
      </script>



</body>

</html>