
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>



<?php
foreach ($edit_prd_srv as $value) {
    // echo "<pre>";
    // print_r($value);

?>

    <form class="form-horizontal" id="edit_product_service">
        <input type="hidden" class="form-control" id="prd_srv_id" name="prd_srv_id" value="<?= $value->prd_srv_id ?>">
        <fieldset class="width-100" style="width:97%;margin:10px auto;">
            <div class="col-md-12 d-flex responsive">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="email">Product-Service Type <span style="color: red;">*</span></label>
                    </div>
                </div>
                <?php
                    if ($value->prdsrv_type == 'product') {
                        $display = "";
                ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="radio-inline">
                                <div class="choice d-flex">
                                    <span class="checked"><input type="radio" name="prd_srv_type" checked="" class="styled" value="product" onclick="product_group()"></span><span class="padding-left">Product</span>
                                </div>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="radio-inline">
                                <div class="choice d-flex"><span class="checked"><input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()"></span><span class="padding-left">Service</span>
                                </div>
                            </label>
                        </div>
                    </div>
                <?php }else{  ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="radio-inline">
                                <div class="choice d-flex">
                                    <span class="checked">
                                        <input type="radio" name="prd_srv_type" class="styled" value="product" onclick="product_group()"></span><span class="padding-left">Primary
                                    </span>
                                </div>
                            </label>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="radio-inline">
                                <div class="choice d-flex"><span class="checked"><input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()" checked="" ></span><span class="padding-left">Secondary</span>
                                </div>
                            </label>
                        </div>
                    </div>
                <?php   }   ?>
            </div>
        </fieldset>

        <fieldset>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Select Product Category <sup style="color: red">*</sup></label>
                        <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" id="menu_id_3" data-placeholder="Select Product Category">
                            <?php
                            foreach ($get_menu_list as $value1) {
                                if ($value->menu_id == $value1->id) {
                            ?>
                                    <option value="<?= $value1->id ?>" ><?= $value1->interest; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $value1->id ?>"><?= $value1->interest; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-sm-12" for="email">Select Product Sub-Category <span style="color: red;">*</span></label>
                        <div class="col-sm-12">
                            <select name="submenu_id" class="form-control" id="submmenu_data_3" data-placeholder="Select Product Sub-Category">
                                <?php
                                foreach ($get_submenu_list as $value2) {
                                    if ($value->submenu_id == $value2->submenu_id) {
                                ?>
                                        <option value="<?= $value2->submenu_id ?>" ><?= $value2->submmenu; ?></option>
                                    <?php } else { ?>

                                        <option value="<?= $value2->submenu_id ?>"><?= $value2->submmenu; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Name <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" id="prd_srv_name" name="prd_srv_name" placeholder="Enter Product / Service Name" value="<?= $value->prdsrv_name ?>" maxlength="50">
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Printing Name <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100" value = "<?= $value->printing_name;?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Code <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="product_code" placeholder="Enter Product Code" maxlength="50" value = "<?= $value->product_code;?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Image <sup style="color: red">*</sup></label>
                        <div class="d-flex no-margin-top">
                            <div class="media-left">
                                <a href="#"><img src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $value->image ?>" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah1"></a>
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
                        <select class="form-control" name="uom_type" id="uom_type_6" data-placeholder="Select UOM">
                            <option value="">Select UOM</option>
                            <?php
                            $prdsrv_uom = $value->prdsrv_uom;
                            foreach ($get_data->result() as $uom) 
                            {
                                $uom_id = $uom->uom_id;
                                if ($uom_id == $prdsrv_uom) 
                                {
                            ?>
                                <option value="<?= $uom->uom_id ?>" selected><?= $uom->uom_type; ?></option>
                            <?php 
                                } 
                                else 
                                { 
                            ?>
                                <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
                            <?php 
                                }
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Price <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" value="<?= $value->price ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Specification <sup style="color: red">*</sup></label>
                        <select class="form-control" name="specification_id" id="specification_id_6" data-placeholder="Select Product Specification">
                            <option value="">Select Specification</option>
                            <?php
                            $specification_id_get= $value->specification_id;
                            foreach ($specification_array as $row) 
                            {
                                $specification_id = $row->specification_id;
                                if ($specification_id == $specification_id_get) 
                                {
                            ?>
                                <option value="<?= $row->specification_id ?>" selected><?= $row->specification_name; ?></option>
                            <?php 
                                } 
                                else 
                                { 
                            ?>
                                <option value="<?= $row->specification_id ?>"><?= $row->specification_name; ?></option>
                            <?php 
                                }
                            } 
                            ?>
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
                        <?php
                        if($value->gst_applicable == 'Applicable')
                        {
                        ?>
                        <select class="form-control" name="gst_applicable" id="gst_applicable_6" data-placeholder="Select Type">
                            <option value="">Select Type</option>
                            <option value="Applicable" selected>Applicable</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Undefined">Undefined</option>
                        </select>
                        <?php
                        }
                        else if($value->gst_applicable == 'Not Applicable')
                        {
                        ?>
                        <select class="form-control" name="gst_applicable" id="gst_applicable_6" data-placeholder="Select Type">
                            <option value="">Select Type</option>
                            <option value="Applicable" >Applicable</option>
                            <option value="Not Applicable" selected>Not Applicable</option>
                            <option value="Undefined">Undefined</option>
                        </select>
                        <?php
                        }
                        else
                        {
                        ?>
                        <select class="form-control" name="gst_applicable" id="gst_applicable_6" data-placeholder="Select Type">
                            <option value="">Select Type</option>
                            <option value="Applicable" >Applicable</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Undefined" selected>Undefined</option>
                        </select>
                        <?php
                        }
                        ?>
                        <!-- <select class="form-control" name="gst_applicable" id="gst_applicable_2" data-placeholder="Select Type">
                            <option value="">Select Type</option>
                            <option value="Applicable">Applicable</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Undefined">Undefined</option>
                        </select> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>HSN / SAC Code <sup style="color: red">*</sup></label>
                        <select class="form-control" name="hsn_code" id="hsn_code_6" data-placeholder="Select HSN Code">
                            <option value="">Select HSN</option>
                            <?php
                            $hsn_code_get= $value->hsn_code;
                            foreach ($hsn_code_array as $hsn) 
                            {
                                $hsn_code = $hsn->hsn_id;
                                if ($hsn_code == $hsn_code_get) 
                                {
                            ?>
                                <option value="<?= $hsn->hsn_id ?>" selected><?= $hsn->hsn_code; ?></option>
                            <?php 
                                } 
                                else 
                                { 
                            ?>
                                <option value="<?= $hsn->hsn_id ?>"><?= $hsn->hsn_code; ?></option>
                            <?php 
                                }
                            } 
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>HSN Description </label>
                        <input type="text" class="form-control" name="hsn_desc" placeholder="Enter HSN Description" maxlength="50" value="<?= $value->hsn_desc;?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Taxability <sup style="color: red">*</sup></label>
                        <?php
                        if($value->taxability == 'Taxable')
                        {
                        ?>
                        <select class="form-control" name="taxability" id="taxability_6" id="Select Taxability" data-placeholder="Select Taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable" selected>Taxable</option>
                            <option value="Nil Rated ">Nil Rated </option>
                            <option value="Exempt">Exempt</option>
                            <option value="Unknwon">Unknwon</option>
                        </select>
                        <?php
                        }
                        else if($value->taxability == 'Nil Rated')
                        {
                        ?>
                        <select class="form-control" name="taxability" id="taxability_6" id="Select Taxability" data-placeholder="Select Taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable" >Taxable</option>
                            <option value="Nil Rated"selected>Nil Rated </option>
                            <option value="Exempt">Exempt</option>
                            <option value="Unknwon">Unknwon</option>
                        </select>
                        <?php
                        }
                        else if($value->taxability == 'Exempt')
                        {
                        ?>
                        <select class="form-control" name="taxability" id="taxability_6" id="Select Taxability" data-placeholder="Select Taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable">Taxable</option>
                            <option value="Nil Rated ">Nil Rated </option>
                            <option value="Exempt" selected>Exempt</option>
                            <option value="Unknwon">Unknwon</option>
                        </select>
                        <?php
                        }
                        else
                        {
                        ?>
                        <select class="form-control" name="taxability" id="taxability_6" id="Select Taxability" data-placeholder="Select Taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable">Taxable</option>
                            <option value="Nil Rated ">Nil Rated </option>
                            <option value="Exempt" >Exempt</option>
                            <option value="Unknwon" selected>Unknwon</option>
                        </select>
                        <?php
                        }
                        ?>
                        <!-- <select class="form-control" name="taxability" id="taxability_2" id="Select Taxability" data-placeholder="Select Taxability">
                            <option value="">Select Taxability</option>
                            <option value="Taxable">Taxable</option>
                            <option value="Nil Rated ">Nil Rated </option>
                            <option value="Exempt">Exempt</option>
                            <option value="Unknwon">Unknwon</option>
                        </select> -->
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>IGST <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="igst_tax" value="<?= $value->igst_tax ?>" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>CGST <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="cgst_tax" value="<?= $value->cgst_tax ?>" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>SGST <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="sgst_tax" value="<?= $value->sgst_tax ?>" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Cess</label>
                        <input type="text" class="form-control" name="cess" placeholder="Enter Cess" value="" maxlength="8">
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description <sup style="color: red">*</sup></label>
                        <textarea class="form-control" id="prd_srv_description1" name="prd_srv_description" placeholder="Enter Description" maxlength="250"><?= $value->prdsrv_description ?></textarea>
                        <div class="row" style="height: 16px;">
                            <div class="col-lg-8">
                                <span style="font-size:15px; color:gray">Max: 250 character</span>
                            </div>
                            <div class="col-lg-4 d-flex" >
                                <div class="col-lg-10" style="text-align:right;">
                                    <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left :</p>
                                </div>
                                <div class="col-lg-2" style="padding:0;">
                                    <div id="charNum1" class="pull-right" style="font-size:15px; color:gray;">250</div>
                                    <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                    <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- <?php
            $img_count = count($multiple_image);
            if ($img_count >= 3) {
                $readonly = "disabled=''";
            } else {
                $readonly = "";
            }
        ?>
        <input type="hidden" class="form-control" id="img_count" name="img_count" value="<?= $img_count ?>">
        <?php if (!empty($multiple_image)) { ?>
            <fieldset>
                <div class="row">
                    <?php foreach ($multiple_image as $img) { ?>
                        <div class="col-sm-4 text-center" style="position: relative;">
                            <img type="file" src="<?= base_url() ?>assets/admin/product_service/<?= $img->image ?>" class="img-sm" style="width: 150px!important; height: 100px!important;" alt="">                        
                            <div align="center">
                                <a onclick="del_pd_image(id)" id="<?= $img->id; ?>"><button class="red btn" style="line-height: 20px;position: absolute;top: -18px;right: 36px;"><i class="far fa-times-circle" style="font-size: 20px;color:#333333;" data-toggle="tooltip" title="Delete" data-placement="bottom"></i></button></a>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="second"></div>
                </div>
            </fieldset>
        <?php    } ?> -->
        
        
        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="padding-left:0;">
                        <label class="control-label">Slider Images </label>
                    </div>
                    <div class="col-md-12 d-flex" style="padding-left:0;">
                        <div class="col-xs-1">
                            <button type="button" class="addButton btn btn-success" style="margin-top: 20px;margin-right:20px;">
                                <i class="icon-add"></i>
                            </button>
                        </div>
                        <div class="col-xs-5">
                            File <input type="file" style="padding:4px;" class="input_disable_enable form-control" id="file-input" <?= $readonly ?> name="upload_file[]" onchange="getName()">
                            <!-- <?php
                            if((COUNT($multiple_image)) >= 3)
                            {
                            ?>
                            <small style="color:red;">Maximum Image Upload Limit is 3</small>
                            <?php
                            }
                            ?> -->
                        </div>
                        
                        <div class="col-xs-2">
                            <div id="thumb-output" style="margin-top: 20px;"></div>
                        </div>
                        
                    </div>
                    <div class="form-group hide" id="bookTemplate1">
                        <div class="col-md-12 d-flex col-md-offset-2" style="padding-left:0;">
                            <div class="col-xs-1">
                                <button type="button" class="removeButton btn btn-danger" style="margin-top: 20px;margin-right:20px;"><i class="fa fa-minus"></i></button>
                            </div>
                            <div class="col-xs-5">
                                File <input type="file" class="form-control" id="file-input" name="upload_file[]" onchange="getName()" style="padding:4px;">
                            </div>
                            <div class="col-xs-2">
                                <div id="thumb-output" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </fieldset>

        <?php
            $img_count = count($multiple_image);
            if ($img_count >= 3) {
                $readonly = "disabled=''";
                
            } else {
                $readonly = "";
            }
        ?>
        <input type="hidden" class="form-control" id="img_count" name="img_count" value="<?= $img_count ?>">
        <?php if (!empty($multiple_image)) { ?>
            <fieldset>
                <div class="row">
                    <?php foreach ($multiple_image as $img) { ?>
                        <div class="col-sm-4 text-center" style="position: relative;">
                            <img type="file" src="<?= base_url() ?>assets/admin/product_service/<?= $img->image ?>" class="img-sm" style="width: 150px!important; height: 100px!important;" alt="">                  
                            <div align="center">
                                <a onclick="del_pd_image(this)" data-id="<?= $img->id; ?>" id="<?= $img->id; ?>"><button class="red btn" style="line-height: 20px;position: absolute;top: -18px;right: 36px;"><i class="far fa-times-circle" style="font-size: 20px;color:#333333;" data-toggle="tooltip" title="Delete" data-placement="bottom"></i></button></a>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="second"></div>
                </div>
            </fieldset>
        <?php    } ?>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-12" style="text-align:right">
                <button type="submit" class="btn btn-primary pull-right">Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
<?php } ?>
<!-- ====================character count================= -->

<script type="text/javascript">
    $(document).ready(function() {
        var res = $("#prd_srv_description1").val();
        $("#charNum1").text(250 - res.length);
    });


    $("#prd_srv_description1").keyup(function() {
        el = $(this);
        if (el.val().length >= 250) {
            el.val(el.val().substr(0, 250));
            $("#charNum1").text(0);
        } else {
            $("#charNum1").text(250 - el.val().length);
        }
    });
</script>

<!-- ======================================= -->
<!-- ======================= Product group hide show ========================================= -->
<script type="text/javascript">
    function product_group() {
        $('#prd_grp1').show();
    }

    function service_group() {
        $('#prd_grp1').hide();
        // $('#prd_brand option:selected').remove();
        // $('#prd_specs option:selected').remove();
    }
</script>
<!-- ------------------------ Get submenu list -------------------------------- -->
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
                $('#submmenu_data_3').html(data);
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
</script>
<!-- ------------------------ Get submenu list -------------------------------- -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp1").change(function() {
        readURL(this);
    });
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

        $('#edit_product_service')
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
                    prd_srv_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Product / Service name'
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

                    igst_tax: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter IGST'
                            }
                        }
                    },

                    fileup: {
                        validators: {
                            file: {
                                extension: 'jpg,png,jpeg,pdf,doc',
                                maxSize: 2097152, //2 mb  maxsize
                                message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                            }
                        }
                    },
                    prd_srv_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select type'
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
                    // }
                }
            })

            // Add button click handler
            .on('click', '.addButton', function() {
                bookIndex++;
                var img_count = $('#img_count').val();

                // alert(result1);
                // var result = parseInt(img_count) + parseInt(bookIndex);

                // alert(result);
                if (img_count < 2) {
                    var result1 = parseInt(img_count) + 1;
                    $('#img_count').val(result1);
                    var $template = $('#bookTemplate1'),
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
                    $('#edit_product_service')
                        .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                } else {
                    PNotify.removeAll();
                    // new PNotify({
                    //     title: 'Image Upload',
                    //     text: 'Maximum image upload limit is 3',
                    //     type: 'warning'
                    // });
                    $('#ImagecountModal').modal('show');

                }

            })

            // Remove button click handler
            .on('click', '.removeButton', function() {
                var img_count = $('#img_count').val();
                // alert(img_count);
                var result = parseInt(img_count) - 1;
                // alert(result);
                $('#img_count').val(result);
                var $row = $(this).parents('.form-group'),
                    index = $row.attr('data-book-index');

                // Remove element containing the fields
                $row.remove();
            });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(e) {

        $("#edit_product_service").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
                return false;
            } else {

                // alert('test');  

                $.ajax({
                    url: "<?php echo base_url('admin/Product/update'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        PNotify.removeAll()
                        // alert(data);

                        $(function() {
                            // new PNotify({
                            //     title: 'Edit Form',
                            //     text: 'Updated  Successfully',
                            //     type: 'success'
                            // });
                            $("#UpdatesuccessModal").modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Product'); ?>";
                        // }, 1000);


                    },
                    error: function() {
                        $("#updateErrorModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#EditBusiness').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                business_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Business Title'
                        }
                    }
                }
            }
        });
    });
</script>


<!--=======================================  delete Image  ==========================================-->
<script>
    // function del_pd_image(id) {
    //     PNotify.removeAll();
    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to delete this image?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                     text: 'Yes',
    //                     addClass: 'btn-sm'
    //                 },
    //                 {
    //                     text: 'No',
    //                     addClass: 'btn-sm'
    //                 }
    //             ]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {
    //         var datastring = 'img_id=' + id;
    //         var prd_srv_id = $('#prd_srv_id').val();
    //         var datastring1 = 'prd_srv_id=' + prd_srv_id;

    //         // alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/product_service/delete_file'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 // alert(data);

    //                 $.ajax({
    //                     type: "post",
    //                     url: "<?php echo base_url('admin/Product_service/after_delete'); ?>",
    //                     cache: false,
    //                     data: datastring1,
    //                     success: function(data) {
    //                         // alert(data);

    //                         $('#first').hide();
    //                         $('#second').show();
    //                         $('#second').html(data);

    //                         PNotify.removeAll();
    //                         $(function() {
    //                             new PNotify({
    //                                 title: 'Delete File',
    //                                 text: 'Deleted successfully',
    //                                 type: 'success'
    //                             });
    //                         });
    //                         get_image_count();

    //                     },
    //                     error: function() {
    //                         alert('Error while request..');
    //                     }
    //                 });

    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });
    //     })
    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }

    function del_pd_image(element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationimgModal').modal('show');
    }

    $(document).ready(function(e) 
    {
    $("#deleteimgForm").on('submit', (function(e) 
    {
        //e.preventDefault();
        if (e.isDefaultPrevented()) 
        {
        // alert('invalid');
        } 
        else 
        {
            e.preventDefault();
            $("#preview").show();
            $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
            var datastring = $("#scheduletid").val();
            $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/product_service/delete_file'); ?>",
            cache: false,
            data: { "img_id": datastring },
            success: function(data) {
                if (data == 1) {
                // Close the modal if the condition is met
                
                    $('#deleteconfirmationimgModal').modal('hide');
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Product_service/after_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            $('#first').hide();
                            $('#second').show();
                            $('#second').html(data);

                            // PNotify.removeAll();
                            $(function() {
                                // new PNotify({
                                //     title: 'Delete File',
                                //     text: 'Deleted successfully',
                                //     type: 'success'
                                // });
                                $("#deleteSucessImageModal").modal('show');
                            });
                            get_image_count();
                            setTimeout(function() {
                                $("#deleteSucessImageModal").modal('hide');
                            }, 1000);

                        },
                        error: function() {
                            alert('Error while request..');
                        }
                    });
                }


            },
            error: function() {
                // alert('Error while request..');
                $("deleteErrorModal").modal('show');
            }
            });
        }

    }));
    });
</script>

<div class="modal fade" id="deleteconfirmationimgModal" tabindex="-1" aria-labelledby="deleteconfirmationimgModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteconfirmationimgModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Image?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteimgForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSucessImageModal" tabindex="-1" aria-labelledby="deleteSucessImageModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deleteSucessImageModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Image Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a> -->
            </div>
        </div>
    </div>
</div>

<!--======================================= / Delete Image  ==========================================-->

<!-- ================================ Get image count ================================================== -->
<script type="text/javascript">
    function get_image_count() {

        var prd_srv_id = $('#prd_srv_id').val();
        var datastring = 'prd_srv_id=' + prd_srv_id;

        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Product_service/get_image_count'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#img_count').val(data);
                $('.input_disable_enable').prop('disabled', false);
            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>

<!-- ===================================================================================================== -->

<!-- Select field  -->
<script>
    //  $('#menu_id_3').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#submmenu_data_3').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#uom_type_6').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#specification_id_6').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#gst_applicable_6').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#hsn_code_6').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    // $('#taxability_6').select2({
    //     dropdownParent: $("#modal_default1")
    // });
    
</script>

<script>
    $('body').on('shown.bs.modal', '#modal_default1', function() {
        $(this).find('select').each(function() {
            $(this).select2({ dropdownParent: $('#modal_default1') });
        });
    });
            
    $('#modal_default1').on('scroll', function (event) {
        $(this).find("select").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
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

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product-Service Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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