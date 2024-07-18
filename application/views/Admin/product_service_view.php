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

    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
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

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


  <style type="text/css">
      tr.group, tr.group:hover 
      {
          background-color: rgb(103, 98, 98) !important;
          color: white !important;
          font-size: 14px !important;
          font-weight: 600 !important;
      }

        @media (min-width: 1025px){
              .modal-lg {
                  width: 80% !important;
              }
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
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Product
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
            <div class="panel panel-flat">
              <div class="panel-body" style="padding:0px;">
                <div class="tabbable">
                  <ul class="nav nav-tabs nav-tabs-bottom" style="background-color:#00619F;">
                    <li class="active" style="font-size: 18px;"><a href="#right-icon-tab1" data-toggle="tab"><i class="fa fa-life-ring position-left"></i>Product / Service List</a></li>
                                     
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="right-icon-tab1">
                      
                      <table id="example" class="display" cellspacing="0">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Sub-Category</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Price</th>
                              <th>UOM</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             <?php
                               //print_r($get_list->result());
                               $count = 1;
                               foreach($get_list as $row) { ?>
                              <tr>
                                <td><?php echo $count ?></td> 
                                <?php if (!empty($row['image'])) 
                                { ?>
                                   <td><img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $row['image'] ?>"></td>
                              <?php } else { ?> 
                                     <td><img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/logo.png ?>"></td>
                                <?php } ?>                     
                               
                                <td><?= $row['category'] ?></td>
                                <td><?= $row['subcategory'] ?></td>
                                <td><?= $row['prdsrv_name'] ?></td>  
                                <td><?= $row['prdsrv_type'] ?></td>

                                <td><?= $row['price'] ?></td>
                                <td><?= $row['prdsrv_uom'] ?></td>
                                <td><?= $row['prdsrv_description'] ?></td>

                                <td><?php if($row['status']==1){ ?>
                                         <a data-popup="tooltip" title="" data-placement="bottom"  data-original-title="Click for Inactive"  id="<?= $row['prd_srv_id']?>" onclick="deactivate(this.id)"><span class="label label-success">Active</span></a>
                                       <?php } else {?>

                                       <a  data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate"  id="<?= $row['prd_srv_id'] ?>"   onclick="activate(this.id)"><span class="label label-danger">Inactive</span></a>
                                        <?php } ?>
                                </td>
                                <td class="text-center" style="padding: 7px 7px;">
                                   <ul class="icons-list">
                                      <li><a onclick="edit_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>" ><span class="label bg-success" style="line-height: 20px;"><i class="glyphicon glyphicon-edit" style="font-size: 12px;" data-toggle="tooltip" title="Edit Product" data-placement="bottom"></i></span></a></li>
                                      <li><a onclick="del_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete Product" data-placement="bottom"></i></span></a></li>
                                       <!-- <li><a onclick="file_upload(id)" id=""><span class="label bg-info" style="line-height: 20px;"><i class="glyphicon glyphicon-file" style="font-size: 12px;" data-toggle="tooltip" title="Upload File" data-placement="bottom"></i></span></a></li> -->
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

      </div>
    </div>

</div>




  <div id="interest_model" class="modal fade"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #2196f3; color: white;padding: 13px; height: 55px;">
             <button type="button" style="color: white;top: 25%;font-weight:600;" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="margin-top: -4px" >
                <i class="fa fa-life-ring" style="zoom:1.1; "></i>
                  &nbsp;Add New Product
                </h5>
            </div>
              <div class="modal-body">
                 <form class="form-vertical" id="addform" method="post" >
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
                                <div class="form-group" >
                                  <label>Select Category :  <sup style="color: red">*</sup></label>
                                   <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" >
                                    <option value="">Select Category</option>
                                      <?php   
                                        foreach ($get_menu_list as $value) 
                                        {
                                      ?>
                                      <option value="<?= $value->id ?>"><?= $value->interest;?></option>
                                     <?php } ?> 
                                 </select>
                                </div>
                              </div>                            
                              <div class="col-md-4"> 
                                <div class="form-group">
                                  <label>Select Sub-Category :  <sup style="color: red">*</sup></label>
                                  <select name="submenu_id" class="form-control" id="submmenu_data">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4"> 
                                <div class="form-group" >
                                  <label>Product Name :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" maxlength="100">
                                </div>
                              </div>  
                            </div>
                          </fieldset>   

                          <fieldset>
                           <div class="row">
                             <div class="col-md-4"> 
                                <div class="form-group" >
                                  <label>Printing Name :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100">
                                </div>
                              </div> 

                             <div class="col-md-4"> 
                                <div class="form-group" >
                                  <label>Product Code :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control"  name="product_code" placeholder="Enter Product Name" maxlength="50">
                                </div>
                              </div> 

                              <div class="col-md-4"> 
                                <div class="form-group">
                                  <label>Product Image :  <sup style="color: red">*</sup></label>
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
                                <div class="form-group" >
                                  <label>Select UOM :  <sup style="color: red">*</sup></label>
                                   <select class="select-search form-control" name="uom_type">
                                    <option value="">Select UOM</option>
                                      <?php   
                                        foreach ($get_data->result() as $uom) 
                                        {
                                      ?>
                                        <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                                     <?php } ?> 
                                 </select>
                                </div>
                              </div> 
                              <div class="col-md-4"> 
                                <div class="form-group" >
                                  <label>Product Price :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                </div>
                              </div> 

                              <div class="col-md-4"> 
                                <div class="form-group" >
                                  <label>Product Specification :  <sup style="color: red">*</sup></label>
                                   <select class="select-search form-control" name="specification_id">
                                    <option value="">Select Specification</option>
                                      <?php   
                                        foreach ($specification_array as $row) 
                                        {
                                      ?>
                                        <option value="<?= $row->specification_id ?>"><?= $row->specification_name;?></option>
                                     <?php } ?> 
                                   </select>                                 
                                </div>
                              </div> 

                            </div>
                          </fieldset> 

                          <fieldset>
                           <div class="row">
                             <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>GST Applicable :  <sup style="color: red">*</sup></label>
                                   <select class="select-search form-control" name="gst_applicable">
                                      <option value="">Select Type</option>
                                      <option value="Applicable">Applicable</option>
                                      <option value="Not Applicable">Not Applicable</option>
                                      <option value="Undefined">Undefined</option>  
                                   </select>
                                </div>
                              </div>   
                              <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>HSN / SAC Code :  <sup style="color: red">*</sup></label>
                                   <select class="select-search form-control" name="hsn_code">
                                    <option value="">Select HSN</option>
                                      <?php   
                                        foreach ($hsn_code_array as $hsn) 
                                        {
                                      ?>
                                        <option value="<?= $hsn->hsn_id ?>"><?= $hsn->hsn_code;?></option>
                                     <?php } ?> 
                                   </select>                                 
                                </div>
                              </div> 
                              <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>HSN Description :</label>
                                   <input type="text" class="form-control"  name="hsn_desc" placeholder="Enter Product / Service Price"  maxlength="50">
                                </div>
                              </div> 
                              <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>Taxability :  <sup style="color: red">*</sup></label>
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
                                <div class="form-group" >
                                  <label>IGST Rate :  <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control"  name="igst_tax" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                </div>
                              </div> 

                             <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>CGST Rate :  <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control"  name="cgst_tax" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                </div>
                              </div> 

                             <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>SGST Rate :  <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control"  name="sgst_tax" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                </div>
                              </div> 
                             <div class="col-md-3"> 
                                <div class="form-group" >
                                  <label>Cess :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control"  name="cess" placeholder="Enter Cess" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                </div>
                              </div> 
                            </div>
                          </fieldset>

                          <fieldset>
                           <div class="row">
                             <div class="col-md-12"> 
                                <div class="form-group" >
                                  <label>Product Description  :  <sup style="color: red">*</sup></label>
                                 <textarea class="form-control" id="prd_srv_description" name="prd_srv_description" placeholder="Enter Description" maxlength="500" rows="1"></textarea>
                                  <div class="row" style="height: 16px;">
                                     <div class="col-lg-8">
                                        <span style="font-size:15px; color:gray">Max: 500 character</span>
                                    </div>
                                     <div class="col-lg-4" style="height: 15px;">                                       
                                        <div class="col-lg-6">
                                          <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left:</p> 
                                        </div>
                                        <div class="col-lg-6">
                                           <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">500</div>
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
                                              File : <span style="color: red;">*</span><input type="file" id="file-input"  class="form-control"  name="upload_file[]" onchange="getName()">                                                       
                                          </div>
                                           <div class="col-xs-2">
                                              <div id="thumb-output" style="margin-top: 20px;"></div>
                                            </div>
                                        </div> 
                                </div>
                                <div class="form-group hide" id="bookTemplate" >
                                    <div class="col-md-10 col-md-offset-2">
                                        <div class="col-xs-1">
                                         <button type="button" class="btn btn-default removeButton" style="margin-top: 20px;"><i class="icon-stack-minus"></i></button>
                                         </div>
                                        <div class="col-xs-5">
                                          File : <span style="color: red;">*</span><input type="file" id="file-input" class="form-control"  name="upload_file[]" onchange="getName()">                                                       
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
         <div id="modal_default" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info" style="background-color:#009FDF;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title">Edit Prduct / Service</h6>
                </div>

                <div class="modal-body">
                    <div id="prdsrv_model_data">

                    </div>
               </div>

              </div>
            </div>
       </div>


<!-- ====================character count================= -->

  <script type="text/javascript">
    
    $("#prd_srv_description").keyup(function()
    {
          el = $(this);
          if(el.val().length >= 500)
          {
              el.val( el.val().substr(0, 500) );
              $("#charNum").text(0);
          }
           else 
          {
              $("#charNum").text(500-el.val().length);
          }
    });

  </script>

<!-- ======================================= -->

<script>
    function file_upload(id)
    {
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
                    
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            $("#imgInp").change(function(){
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
                                       maxSize: 2097152,   //2 mb  maxsize
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
                                       maxSize: 2097152,   //2 mb  maxsize
                                       message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                               }
                            }
                    }
                  }
              })

              // Add button click handler
              .on('click', '.addButton', function()
               {
                    bookIndex++;
                    // alert(imgcnt);
                    var imgcnt = $('#imgadd_count').val();
                    // var imgstore_cnt $('#imgadd_count').val(imgcnt);
                    if (imgcnt<2) 
                    {
                            var result2 = parseInt(imgcnt) + 1;
                            $('#imgadd_count').val(result2);

                                var $template = $('#bookTemplate'),
                                $clone    = $template
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
                      }
                      else
                      {
                          PNotify.removeAll()
                         new PNotify({
                                        title: 'Image Upload',
                                        text: 'Maximum image upload size is 3',
                                        type: 'warning'
                                       });
                      }
                  })

              // Remove button click handler
              .on('click', '.removeButton', function() 
              {
                  var img_count1 = $('#imgadd_count').val();
                    // alert(img_count);
                    var result1 = parseInt(img_count1) - 1;
                    // alert(result);
                    $('#imgadd_count').val(result1);

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
                         if (e.isDefaultPrevented())
                          {
                            //alert('invalid');
                          }
                          else
                          {   
                            // alert();
                              $.ajax({

                                 url: "<?php echo base_url('admin/Product/add_product_service');?>",
                                        type: "POST",
                                        data:  new FormData(this),
                                        contentType: false,
                                        cache: false,
                                        processData:false,
                                        success: function(data)
                                         {

                                            // $("#inner_page_desc").val('');
                                           // alert(data);
                                           new PNotify({
                                                          title: 'Add  Product / Service',
                                                          text: 'Added  Successfully',
                                                          type: 'success'
                                                        });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Product');?>";
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
<script>
    function file_upload()
    { 
      // alert();

        $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/About/get_file'); ?>",
        success: function(data)
        {    
          // alert(data);
             $('#modal_file').modal('show');
             $('#file_model_data').html(data);
        
         },
        error: function(){      
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
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                         }
                      }
              }
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
                .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
            $('#sectionform12')
                    .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
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

<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#sectionform12").on('submit',(function(e)
                 {  

                    var content = CKEDITOR.instances['editor-full'].getData();
                    // $("#inner_page_desc").val(content);
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {   
                      // alert();
                        $.ajax({

                           url: "<?php echo base_url('admin/Product/profile_file');?>",
                                  type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                   {

                                    // $("#inner_page_desc").val('');
                                   // alert(data);
                                     new PNotify({
                                                    title: 'Add  File',
                                                    text: 'Added  Successfully',
                                                    type: 'success'
                                                   });

                                             setTimeout(function()
                                               {
                                                   window.location="<?php echo base_url('admin/Product');?>";
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

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Product / Service?</p>',
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

            var datastring = 'uprdsrvid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/deactivate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
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
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Product / Service?</p>',
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

            var datastring = 'uprdsrvid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/activate'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
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

 <script type="text/javascript">
  
    function fetch_submenu(id)
    {
      var datastring = 'menu_id='+id;
      // alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
            // alert(data);
            $('#submmenu_data').html(data);
           },
          error: function(){      
           alert('Error while request..');
        }
       });
    }

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
                        '<tr class="group" id="'+i+'"><td colspan="10">'+group+'</td></tr>'
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
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
  $(document).ready(function (e)
     {
       $("#addform1").on('submit',(function(e)
           {  

              var content = CKEDITOR.instances['editor-full'].getData();
              $("#inner_page_desc").val(content);
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {   
                  $.ajax({

                     url: "<?php echo base_url('admin/Product/add');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                             {

                              $("#inner_page_desc").val('');
                             // alert(data);
                               new PNotify({
                                              title: 'Add  Product',
                                              text: 'Added  Successfully',
                                              type: 'success'
                                             });

                                       setTimeout(function()
                                         {
                                             window.location="<?php echo base_url('admin/Product');?>";
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


<!--=======================================  delete Product / Service  ==========================================-->

<script>
    function del_prdsrv(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Product / Service?</p>',
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

            var datastring = 'uprdsrvid='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product/delete'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                           new PNotify({
                                         title: 'Delete Product',
                                         text: 'Deleted successfully',
                                         type: 'success'
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



<!--======================================= / Delete Product / Service  ==========================================-->
<!-- ====================================== Edit Product / Service ========================================= -->
<script>
    function edit_prdsrv(id)
    {
        var datastring = 'prd_srv_id='+id;
        //alert(datastring);
         $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Product/edit_prdsrv'); ?>",
          cache: false,    
          data: datastring,
          success: function(data)
          {    
            // alert(data);
              $('#modal_default').modal('show');
              $('#prdsrv_model_data').html(data);
          
           },
          error: function(){      
           alert('Error while request..');
          }
         });
    }
</script>



</body>
</html>
