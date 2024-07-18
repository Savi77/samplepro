<style>
    #Manage-Products {
    overflow-y:scroll;
}

</style>
<?php $this->load->view('Admin/includes/n-header');  ?>

<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">


        <!-- Main charts -->
        <div class="row">
            <!-- <div class="col-xl-4">
                <div class="card green-bg-card">
                    <div class="internel-text">
                        <span>
                            <h4 class="green-text">Product Specification</h4>
                        </span>
                        <span>
                            <a data-toggle="modal" data-target="#Product-Specification"><i class="fa fa-user-plus product-icon" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('admin/ProductSpecification'); ?>"><img class="crm-img product" src="<?= base_url() ?>new-assets/assets/Images/add.png"></a>
                        </span>
                    </div>
                </div>
            </div> -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Product Specification</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Product-Specification"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/ProductSpecification'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">HSN Code</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#HSN-Code"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/HSNCode'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">UOM Type List</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#UOMList"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/UOM'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Product Categories</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Product-Categories"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Master_product'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>

            <!-- <div class="col-xl-4">
                <div class="card blue-bg-card">
                    <div class="internel-text">
                        <span>
                            <h4 class="bb-text">Product Categories</h4>
                        </span>
                        <span>
                            <a data-toggle="modal" data-target="#Product-Categories"><i class="fa fa-user-plus product-icon" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('admin/Master_product'); ?>"><img class="crm-img product" src="<?= base_url() ?>new-assets/assets/Images/add.png"></a>
                        </span>
                    </div>
                </div>
            </div> -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body gb-card no-padding">
                        <h4 class="green-text">Product Sub-Categories</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Product-Sub-Categories"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Master_submenu'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body bb-card no-padding">
                        <h4 class="bb-text">Manage Products</h4>
                    </div>
                    <div class="card-footer master-btn">
                        <button type="button" class="commom-btn" data-toggle="modal" data-target="#Manage-Products"><span class="m-p-5 padding-right">Add</span><img class="user" src="<?= base_url() ?>new-assets/assets/Images/adition.png"></button>
                        <a href="<?php echo base_url('admin/Product'); ?>"><button type="button" class="commom-btn">
                                <span class="m-p-5">View</span>
                                <img class="user flex-btn" src="<?= base_url() ?>new-assets/assets/Images/vision.png"></a></button>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
<!-- Start Popup -->
<div id="Product-Specification" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Product Specification</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addProductSpecification">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Specification Name <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="specification_name" autocomplete="off" placeholder="Enter Product Specification Name">
                    </div>
                    <div class="form-group">
                        <label>Product Specification Description </label>
                        <input type="text" class="form-control" name="specification_desc" autocomplete="off" placeholder="Enter Product Specification Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right:5px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="HSN-Code" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add HSN Code</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addHSN">
                <div class="modal-body">
                    <div class="form-group">
                        <label>HSN Code <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="hsn_code" autocomplete="off" placeholder="Enter HSN Code">
                    </div>
                    <div class="form-group">
                        <label>HSN Description </label>
                        <input type="text" class="form-control" name="hsn_desc" autocomplete="off" placeholder="Enter HSN Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right:5px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="UOMList" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                     UOM Type</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addUOM">
                <div class="modal-body">
                    <div class="form-group">
                        <label>UOM Type <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Enter UOM Type" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right:5px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="Product-Categories" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Product Categories</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" id="addProductCategories">
                    <div class="form-group">
                        <label class="control-label col-sm-12" for="email">Product Category Name <span style="color: red;">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="interest" name="interest" placeholder="Enter Product Category Name" maxlength="35">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
                            <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="Manage-Products" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add New Product-Service</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form class="form-vertical" id="addManageProduct" method="post">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <fieldset class="width-100" style="width:97%;margin:10px auto;">
                                <div class="col-md-12 d-flex responsive">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-6" for="email">Product-Service Type <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice">
                                                    <span class="checked"><input type="radio" name="prd_srv_type" checked="" class="styled" value="product" onclick="product_group()"></span><span class="padding-left">Product</span>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice"><span class="checked"><input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()"></span><span class="padding-left">Service</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Product Category  <sup style="color: red">*</sup></label>
                                            <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" id="menu_id_1" data-placeholder="Select Product Category">
                                                <option value="">Select Product Category</option>
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
                                            <label>Select Product Sub-Category <sup style="color: red">*</sup></label>
                                            <select name="submenu_id" class="form-control" id="submmenu_data" data-placeholder="Select Product Sub-Category">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Name <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Printing Name <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Code <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="product_code" placeholder="Enter Product code" maxlength="50">
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Image <sup style="color: red">*</sup></label>
                                            <div class="d-flex no-margin-top">
                                                <div class="media-left">
                                                    <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah"></a>
                                                </div>
                                                <div class="media-body ml-2">
                                                    <label class="custom-file">
                                                        <input type="file" class="custom-file-input" name="org_company_attachment" id="org_company_attachment" class="form-control">
                                                        <span class="custom-file-label">Choose file</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Image <sup style="color: red">*</sup></label>
                                            <div class="d-flex no-margin-top">
                                                <div class="media-left">
                                                    <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah"></a>
                                                </div>
                                                <div class="media-body">
                                                    <input type="file" name="fileup" id="imgInp" class="form-control" style="padding:4px;">
                                                    
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
                                            <label>Select UOM <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="uom_type" id="uom_type_4" data-placeholder="Select UOM">
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
                                            <label>Product Price <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Specification <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="specification_id" id="specification_id_1" data-placeholder="Select Product Specification">
                                                <option value="">Select Product Specification</option>
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
                                            <label>GST Applicable <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="gst_applicable" id="gst_applicable_1" data-placeholder="Select Type">
                                                <option value="">Select Type</option>
                                                <option value="Applicable">Applicable</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                                <option value="Undefined">Undefined</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>HSN / SAC Code <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="hsn_code" id="hsn_code_1" data-placeholder="Select HSN Code" onChange="gethsndescription(this.value);">
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
                                            <label>HSN Description </label>
                                            <input type="text" class="form-control" name="hsn_desc" id="hsn_desc" placeholder="Enter HSN Description" maxlength="50" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Taxability <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="taxability" id="taxability_1" data-placeholder="Select Taxability">
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
                                            <label>IGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="igst_tax" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="cgst_tax" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="sgst_tax" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cess</label>
                                            <input type="text" class="form-control" name="cess" placeholder="Enter Cess" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Description <sup style="color: red">*</sup></label>
                                            <textarea class="form-control" id="prd_srv_description" name="prd_srv_description" placeholder="Enter Product Description" maxlength="250" rows="3"></textarea>
                                            <div class="row" style="height: 16px;">
                                                <div class="col-lg-8">
                                                    <span style="font-size:15px; color:gray">Max: 250 character</span>
                                                </div>
                                                <div class="col-lg-4 d-flex">
                                                    <div class="col-lg-10" style="text-align:right;">
                                                        <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left :</p>
                                                    </div>
                                                    <div class="col-lg-2 p-0">
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
                                        <div class="form-group col-sm-12" style="padding-left:0;">
                                            <div class="col-md-12" style="padding-left:0;">
                                                <label class="control-label">Slider Images </label>
                                            </div>
                                            <div class="col-md-10 d-flex" style="padding-left:0;">
                                                <div class="col-xs-1">
                                                    <button type="button" class="addButton btn btn-success" style="margin-top: 20px;margin-right:20px;">
                                                        <i class="icon-add"></i>
                                                    </button>
                                                </div>
                                                <div class="col-xs-5">
                                                    File <input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()" style="padding:4px;">
                                                </div>
                                                <div class="col-xs-2">
                                                    <div id="thumb-output" style="margin-top: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 d-flex hide" id="bookTemplate" style="padding-left:0;">
                                            <div class="col-md-10 d-flex col-md-offset-2" style="padding-left:0;">
                                                <div class="col-xs-1">
                                                    <button type="button" class="removeButton btn btn-danger" style="margin-top: 20px;margin-right:20px;"><i class="fa fa-minus"></i></button>
                                                </div>
                                                <div class="col-xs-5">
                                                    File <input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()" style="padding:4px;">
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
                                <div class="col-sm-offset-3 col-sm-12 mt-3" style="text-align:right;">
                                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="Product-Sub-Categories" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Product Sub-Categories</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" id="addProductSubCategories">
                    <div class="form-group">
                        <label class="control-label col-sm-12" for="email">Select Product Category <span style="color: red;">*</span></label>
                        <div class="col-sm-12">
                            <select name="menu_id" class="form-control" id="menu_id_4" data-placeholder="Select Product Category">
                                <option value="">Select Product Category </option>
                                <?php
                                foreach ($get_menu_list as $value) {
                                ?>
                                    <option value="<?= $value->id ?>"><?= $value->interest; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-12" for="email">Product Sub-Category Name <span style="color: red;">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Enter Product Sub-category Name" maxlength="35">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 " style="text-align:right;">
                            <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Popup -->

<?php $this->load->view('Admin/includes/n-footer');    ?>

<script>
    $(document).ready(function() {
        $('#addProductSpecification').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                specification_name: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Product Specification Name'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#addProductSpecification").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                );
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/ProductSpecification/Add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_upload").hide();
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Add Specification',
                            //     text: 'Added Successfully !!',
                            //     type: 'success'
                            // });
                            $('#Product-Specification').modal('hide');
                            $('#successproductspecification').modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location =
                        //         "<?php echo base_url('admin/ProductSpecification'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;
        }));
    });

    $(document).ready(function() {
        $('#addHSN').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                hsn_code: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter HSN Code'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#addHSN").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/HSNCode/Add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_upload").hide();
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Add HSN',
                            //     text: 'Added Successfully !!',
                            //     type: 'success'
                            // });
                            $('#HSN-Code').modal('hide');
                            $('#successhsncode').modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/HSNCode'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;
        }));
    });
    $(document).ready(function() {
        $('#addUOM').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter UOM Type'
                        }
                    }
                },
                url: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter URL'
                        }
                    }
                },

                fileup: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Image for Home Page'
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

    $(document).ready(function(e) {
        $("#addUOM").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('admin/UOM/add_type'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $(function() {
                            // new PNotify({
                            //     title: 'Register Form',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $('#UOMList').modal('hide');
                            $('#succesuomtype').modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/UOM'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
    $(document).ready(function() {
        $('#addProductCategories').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                interest: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Product Category Name'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#addProductCategories").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Master_product/add_area_interest'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        //alert(data);


                        $(function() {
                            // new PNotify({
                            //     title: 'Add  Product Categories',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $('#Product-Categories').modal('hide');
                            $('#successproductcategories').modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Master_product'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });

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

        $('#addManageProduct')
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
                                message: 'Please Enter Product / Service name'
                            }
                        }
                    },
                    menu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Product Category'
                            }
                        }
                    },
                    submenu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Product Sub-category'
                            }
                        }
                    },
                    prd_srv_price: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Product / Service price'
                            }
                        }
                    },
                    prd_srv_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Type'
                            }
                        }
                    },
                    fileup: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select File'
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
                                message: 'Please Select UOM'
                            }
                        }
                    },
                    sgst_tax: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter SGST'
                            }
                        }
                    },
                    cgst_tax: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter CGST'
                            }
                        }
                    },

                    product_code: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Product Code'
                            }
                        }
                    },

                    printing_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Printing Name'
                            }
                        }
                    },

                    specification_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Specification'
                            }
                        }
                    },
                    taxability: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Taxability'
                            }
                        }
                    },

                    gst_applicable: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select GST Applicable'
                            }
                        }
                    },

                    hsn_code: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select HSN'
                            }
                        }
                    },

                    igst_tax: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter IGST'
                            }
                        }
                    },

                    prd_srv_description: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Description'
                            }
                        }
                    },
                    // 'upload_file[]': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please Select File'
                    //         },
                    //         file: {
                    //             extension: 'jpg,png,jpeg,pdf,doc',
                    //             maxSize: 2097152, //2 mb  maxsize
                    //             message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                    //         }
                    //     }
                    // },

                    'org_company_attachment': {
                        validators: {
                            notEmpty: {
                                message: 'Please Select File'
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
                    $('#addManageProduct')
                        .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                } else {
                    PNotify.removeAll()
                    // new PNotify({
                    //     title: 'Image Upload',
                    //     text: 'Maximum image upload size is 3',
                    //     type: 'warning'
                    // });
                    $('#ImagecountModal').modal('show');
                    
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

    $(document).ready(function(e) {
        $("#addManageProduct").on('submit', (function(e) {
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
                        // new PNotify({
                        //     title: 'Add  Product / Service',
                        //     text: 'Added  Successfully',
                        //     type: 'success'
                        // });
                        $('#Manage-Products').modal('hide');
                        $('#successmanageproduct').modal('show');

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Product'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });

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
        $('#addProductSubCategories').bootstrapValidator({
            message: 'This value is not valid',
            fields: {

                menu_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Product Category'
                        }
                    }
                },
                submenu: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Product Sub-category'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#addProductSubCategories").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Master_submenu/add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        //alert(data);


                        $(function() {
                            // new PNotify({
                            //     title: 'Add  Product Sub-Categories',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $('#Product-Sub-Categories').modal('hide');
                            $('#successproductsubcategories').modal('show');
                            
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Master_submenu'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>
<script>
     $('#menu_id_4').select2({
        dropdownParent: $("#Product-Sub-Categories")
    });
    $('#menu_id_1').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#submmenu_data').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#uom_type_4').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#specification_id_1').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#gst_applicable_1').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#hsn_code_1').select2({
        dropdownParent: $("#Manage-Products")
    });
    $('#taxability_1').select2({
        dropdownParent: $("#Manage-Products")
    });
    
</script>
<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

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
<script>
    function gethsndescription(val) {
        // alert(val);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('admin/Product/gethsndescription') ?>',
            data: 'hsn_code_id=' + val,
            success: function(data) {
                $("#hsn_desc").val(data);
            }
        });
    }
</script>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successproductspecification" tabindex="-1" aria-labelledby="successproductspecificationLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successproductspecificationLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product Specification Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successhsncode" tabindex="-1" aria-labelledby="successhsncodeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successhsncodeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">HSN Code Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/HSNCode'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="succesuomtype" tabindex="-1" aria-labelledby="succesuomtypeLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="succesuomtypeLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">UOM Type Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UOM'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successproductcategories" tabindex="-1" aria-labelledby="successproductcategoriesLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successproductcategoriesLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product Category Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master_product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successproductsubcategories" tabindex="-1" aria-labelledby="successproductsubcategoriesLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successproductsubcategoriesLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product Sub-category Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master_submenu'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successmanageproduct" tabindex="-1" aria-labelledby="successmanageproductLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successmanageproductLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product-Service Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ImagecountModal" tabindex="-1" aria-labelledby="ImagecountModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="ImagecountModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Maximum image upload size is 3</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/Product'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>