<?php $this->load->view('Admin/includes/n-header'); ?>

<style>
    .tabs-nav-items{
        width: 50%;
        height: 95px;
    }
    .tab-image-icon{
        height: 70px;
    }
    i.fa.fa-trash {
        background: transparent;
    }
    .show-content {
        display: none;
    }

    .card {
        min-height: 0px;
    }
   
</style>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="tab-pane <?= $conatct_head_active ?>" id="solid-bordered-tab1"> -->
            
            <div class="card tab">
                <div class="card-body tabsbody">
                    <ul class="nav nav-tabs nav-tabs-solid border">
                        <li class="nav-item tabs-nav-items">
                            <a href="#registration-tab" class="nav-link tablinks active" data-toggle="tab">Registration Information<img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/23.svg"></a>
                        </li>
                        <li class="nav-item tabs-nav-items">
                            <a href="#company-tab" class="nav-link tablinks" data-toggle="tab">Company Information<img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/21 (1).svg"></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="registration-tab">
                            <form id="gstform" method="post">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                                                <h6 class="card-title py-sm-4 card-headings">About Company</h6>
                                            </div>
                                            <div class="card-body padding-30">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Company Name </label>
                                                            <input type="text" class="form-control " placeholder="Enter Company Name" name="org_cname" maxlength="150" autocomplete="off" value="<?= $organsation_array->org_cname; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Company Domain </label>
                                                            <input type="text" class="form-control " placeholder="Enter domain" maxlength="50" id="org_cdomain" name="org_cdomain" autocomplete="off" value="<?= $organsation_array->org_cdomain; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="card">
                                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                                        <h6 class="card-title py-sm-4 card-headings">User Info</h6>

                                                    </div>
                                                    <div class="card-body padding-0">
                                                        <div class="avtara" style="background:#fff;">
                                                            <?php
                                                            if ($profile_array->profile_img == '') {
                                                                $profile_img = base_url() . "new-assets/assets/Images/avtara.png";
                                                            } else {
                                                                $profile_img = base_url() . 'assets/admin/assets/images/users/' . $profile_array->profile_img;
                                                            }
                                                            ?>
                                                            <img src="<?= $profile_img ?>">
                                                            <h5> <?= $organsation_array->org_fname . ' ' . $organsation_array->org_lname ?> </h5>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align">First Name:</label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" class="form-control " placeholder="Enter First Name" name="org_fname" id="org_fname" autocomplete="off" value="<?= $organsation_array->org_fname; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align">Last Name </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" class="form-control " placeholder="Enter Last Name" name="org_lname" id="org_lname" autocomplete="off" value="<?= $organsation_array->org_lname; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align">Email / User Name </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" id="org_email" class="form-control " placeholder="Enter Email" name="org_email" autocomplete="off" value="<?= $organsation_array->org_email; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align">Contact No. </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" class="form-control " placeholder="Contact No." name="org_contact" maxlength="10" autocomplete="off" value="<?= $organsation_array->org_contact; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align"> LandLine No. </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" class="form-control " placeholder="Landline" name="org_landline" autocomplete="off" value="<?= $organsation_array->org_landline; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label left-align">Address </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <textarea class="form-control" rows="3" name="org_address" onblur="bind_address(this.value)"><?= $organsation_array->org_address; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row margin-0">
                                                                <label class="col-lg-4 col-form-label left-align">Website </label>
                                                                <div class="col-lg-7 col-sm-6 w-90">
                                                                    <input type="text" class="form-control " placeholder="Website" name="org_website" autocomplete="off" value="<?= $organsation_array->org_web_url; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8">

                                                <div class="card">
                                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                                        <h6 class="card-title py-sm-4 card-headings">Other Details</h6>

                                                    </div>
                                                    <div class="card-body padding-30">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <select data-placeholder="Please Select Country" class="form-control form-control-select2" name="org_country" id="org_country" onchange="GetState(this.value)">
                                                                        <?php foreach ($CountryArray as  $res) { ?>
                                                                            <option value="<?= $res->id; ?>" <?= $country = ($organsation_array->org_country == $res->id) ? 'selected' : ''; ?>>
                                                                                <?= $res->name; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>State </label>
                                                                    <select data-placeholder="Please Select State" class="form-control form-control-select2" data-fouc name="org_state" id="bind_state_list">>
                                                                        <?php foreach ($StateArray as  $res) { ?>
                                                                            <option value="<?= $res->id; ?>" <?= $state = ($organsation_array->org_state == $res->id) ? 'selected' : ''; ?>>
                                                                                <?= $res->name; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control " placeholder="City Name" name="org_city" autocomplete="off" value="<?= $organsation_array->org_city ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Post Code</label>
                                                                    <input type="text" class="form-control " placeholder="Post Code" name="org_postcode" autocomplete="off" maxlength="6" value="<?= $organsation_array->org_postcode ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Time Zone</label>
                                                                    <!-- <select data-placeholder="Please Select Time Zone" class="form-control form-control-select2" data-fouc name="org_timezone"> -->
                                                                    <select data-placeholder="Please Select Time Zone" class="form-control form-control-select2" id="cmp_time_zone" data-fouc name="org_timezone">
                                                                        <?php foreach ($TimeZoneArray as  $res) { ?>
                                                                            <option value="<?= $res->timezone_code; ?>" <?= $time = ($organsation_array->org_timezone == $res->timezone_code) ? 'selected' : ''; ?>>
                                                                                <?= ucfirst($res->country); ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Currency</label>
                                                                    <!-- <select data-placeholder="Please Select Currency" class="form-control form-control-select2" data-fouc name="org_currency"> -->
                                                                    <select data-placeholder="Please Select Currency" class="form-control form-control-select2" data-fouc name="org_currency" id="cmp_currency">
                                                                        <?php foreach ($CurrencyArray as  $res) { ?> <option value="<?= $res->currency_id; ?>" <?= $crs = ($organsation_array->org_currency == $res->currency_id) ? 'selected' : ''; ?>>
                                                                                <?= ucfirst($res->currency_sign); ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>About Company</label>
                                                                    <textarea class="form-control " rows="1" placeholder="About Comapny" name="org_abt_compnay" maxlength="100"><?= $organsation_array->org_abt_compnay ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Company Logo </label>
                                                                    <div class="media no-margin-top" style="margin-top:0;">
                                                                        <div class="media-left">
                                                                            <?php
                                                                            if ($organsation_array->org_company_logo != '') {
                                                                                $file = base_url() . 'assets/admin/company_logo/' . $organsation_array->org_company_logo;
                                                                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                                                if ($ext == 'pdf' || $ext == 'PDF') { ?>
                                                                                    <a href="<?= $file ?>" target="_blank" class="img-size-cmp img-rounded" alt="" id="home_img"><i class="icon-file-pdf doc-style " data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></i></a>
                                                                                <?php    } elseif ($ext == "doc" || $ext == "docx") { ?>
                                                                                    <a href="<?= $file ?>" target="_blank" class="img-size-cmp img-rounded" alt="" id="home_img"><i class="icon-file-word doc-style" data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></i></a>
                                                                                <?php    } else { ?>
                                                                                    <a href="<?= $file ?>" target="_blank"><img src="<?= $file ?>" class="img-size-cmp img-rounded" alt="" id="home_img" data-popup="tooltip" title="<?= $organsation_array->org_company_logo; ?>" data-placement="top" data-original-title=""></a>
                                                                                <?php }
                                                                            } else {
                                                                                ?>
                                                                                <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/company.png" class="img-size-cmp img-rounded" alt="" id="home_img"></a>
                                                                            <?php    }   ?>
                                                                        </div>
                                                                        <div class="media-body ml-2">
                                                                            <label class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="imgInp" name="fileup">
                                                                                <span class="custom-file-label">Choose file</span>
                                                                            </label>

                                                                            <p id="error1" style="display:none; color:#FF0000;">
                                                                                Invalid Image Format! Image Format Must Be
                                                                                JPG, JPEG, PNG or GIF.
                                                                            </p>
                                                                            <p id="error2" style="display:none; color:#FF0000;">
                                                                                Maximum File Size Limit is 1MB.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label> File Attachment </label>
                                                                    <div class="media no-margin-top"  style="margin-top:0;">
                                                                        <div class="media-left">
                                                                            <?php
                                                                            if ($organsation_array->org_company_attachment != '') {
                                                                                $file = base_url() . 'assets/admin/company_attachment/' . $organsation_array->org_company_attachment;
                                                                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                                                if ($ext == 'pdf' || $ext == 'PDF') { ?>
                                                                                    <a href="<?= $file ?>" target="_blank" class="img-size-cmp img-rounded" alt="" id="blah"><i class="icon-file-pdf doc-style" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
                                                                                <?php    } elseif ($ext == "doc" || $ext == "docx") { ?>
                                                                                    <a href="<?= $file ?>" target="_blank" class="img-size-cmp img-rounded" alt="" id="blah"><i class="icon-file-word doc-style" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></i></a>
                                                                                <?php    } else { ?>
                                                                                    <a href="<?= $file ?>" target="_blank"><img src="<?= $file ?>" class="img-size-cmp img-rounded" alt="" id="blah" data-popup="tooltip" title="<?= $organsation_array->org_company_attachment; ?>" data-placement="top" data-original-title=""></a>
                                                                                <?php }
                                                                            } else { ?>
                                                                                <a><img src="<?= base_url(); ?>assets/admin/assets/images/placeholder1.jpg" class="img-size-cmp img-rounded" alt="" id="blah"></a>
                                                                            <?php    }
                                                                            ?>
                                                                        </div>
                                                                        <div class="media-body ml-2">
                                                                            <label class="custom-file">
                                                                                <input type="file" class="custom-file-input" name="org_company_attachment" id="org_company_attachment" class="form-control">
                                                                                <span class="custom-file-label">Choose file</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-xl-12 bottom-border">
                                                            <p class="GSTSdetails"> GST Details</p>
                                                        </div>
                                                        <?php
                                                        $gst_applicable = $gst_array[0]->gst_applicable;
                                                        $gst_no = $gst_array[0]->gst_no;
                                                        ?>
                                                        <div class="row my-20">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>GST Applicable</label>
                                                                    <select class="form-control" name="gst_applicable" onchange="gst_details(this.value)" id="cmp_gst_applicable" data-placeholder="Select GST Applicable">
                                                                        <option value="">Select GST Applicable</option>
                                                                        <option value="Yes" <?php if ($gst_applicable == 'Yes') {
                                                                                                echo 'selected';
                                                                                            } ?>>Yes</option>
                                                                        <option value="No" <?php if ($gst_applicable == 'No') {
                                                                                                echo 'selected';
                                                                                            } ?>>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>GST</label>
                                                                    <input type="text" placeholder="GST No." class="form-control" name="gst_no" id="gst_no" maxlength="15" value="<?= $gst_no; ?>">
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <fieldset class="form-filedset email">
                                                        <legend class="field bulk-email">GST Details</legend>
                                                        <?php
                                                        $gst_applicable = $gst_array[0]->gst_applicable;
                                                        $gst_no = $gst_array[0]->gst_no;
                                                        ?>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                    <label>GST Applicable</label>
                                                                    <select class="form-control form-control-select2" name="gst_applicable" onchange="gst_details(this.value)" id="cmp_gst_applicable" data-placeholder="Select GST Applicable">
                                                                        <option value="">Select GST Applicable</option>
                                                                        <option value="Yes" <?php if ($gst_applicable == 'Yes') {
                                                                                                echo 'selected';
                                                                                            } ?>>Yes</option>
                                                                        <option value="No" <?php if ($gst_applicable == 'No') {
                                                                                                echo 'selected';
                                                                                            } ?>>No</option>
                                                                    </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                    <label>GST</label>
                                                                    <input type="text" placeholder="GST No." class="form-control" name="gst_no" id="gst_no" maxlength="15" value="<?= $gst_no; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 update-details" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit"> <span class="text-white">Update</span><i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="company-tab">
                            <div class="row">
                                <div class="col-md-12" style="text-align:right;margin-bottom:15px;">
                                    <a data-toggle="modal" data-target="#addQuotationTemplate" class="btn btn-link btn-float has-text" style="background:#1e6196;"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>                                                      
                                    <!-- <span class="span-py-10 white-text" style="background:#1e6196;"><a data-toggle="modal" data-target="#addQuotationTemplate"><i class="fa fa-plus" style="margin-right:5px;"></i>Add</a></span> -->
                                </div>
                            </div>
                            <?php
                            if(!empty($get_company_details))
                            {
                                foreach ($get_company_details as $value)
                                {
                            ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card toggle-header">
                                            <h6 class="card-title py-sm-4 card-headings"><?= $value->title?></h6>
                                            <div class="small-div contact text-right">
                                                <!-- <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#addQuotationTemplate"><i class="fa fa-plus"></i></a></span> -->
                                                <span class="span-py-10 white-text"> <a data-toggle="modal" onclick="Edit(id)" id="<?= $value->id; ?>"><i class="icon-pencil"></i></a></span>
                                                <span class="span-py-10 white-text"> <a data-toggle="modal" onclick="Delete(this)" id="<?= $value->id; ?>" data-id="<?= $value->id;?>"><i class="fa fa-trash"></i></a></span>
                                                <a style="padding-top:7px;" class="read-more-btn" title="Read More" rel="tooltip"><i class="fa fa-angle-down" style="font-size:20px ;color:#fff ;"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body padding-30 show-content" id="show">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <?= $value->content;?>
                                                    </div>
                                                    <!-- <div>
                                                        <button class="blue-btn left-margin read-more" onclick="readMore()">Read More</button>
                                                        <button class="blue-btn left-margin read-less" onclick="readLess()">Read Less</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            else
                            {
                            ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group" style="text-align:center; color:#f00 !important">
                                                No Data Found
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<div id="addQuotationTemplate" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" style="overflow:auto;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Add Company Details</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addform_title" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title <sup class="text-danger">*</sup></label>
                        <input type="text" name="title_name" id="title_name" class="form-control" placeholder="Please Enter Title" onchange=checkvalue();>
                        <span id="error_section_name" style="color: red;font-size:13px"></span>
                    </div>
                    <div class="form-group">
                        <label>Role <sup class="text-danger">*</sup></label>
                        <select class="form-control" name="role" id="role" data-placeholder="Select Role">
                            <option value="">Select Role</option>
                            <option value="all">All</option>
                            <?php foreach ($role_array as $value) { ?>
                                <option value="<?= $value->role_id ?>"><?= $value->role_name; ?></option>
                            <?php } ?>
                        </select>
                        <span id="error_role" style="color: red;font-size:13px"></span>
                    </div>

                    <div class="form-group" style="margin-bottom:0;">
                        <label>Content  <sup class="text-danger">*</sup></label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea rows="1" name="section_content" id="section_content" class="form-control"></textarea>
                                <span id="error_section" style="color: red;font-size:13px"></span>
                                <span id="character-count" style="color: red;font-size:13px"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;" id="btn-submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit_section" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" style="overflow: auto;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Company Details</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="section_data"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    // $('#section_content').summernote({
    //     maximumFileSize: 10485760 // 10MB in bytes
    // });

    // $(document).ready(function() {
    //     $('#section_content').summernote({
    //         callbacks: {
    //             onKeyup: function(e) {
    //                 var htmlContent = $('#section_content').summernote('code');
    //                 var maxLength = 3000; // Maximum character limit including HTML content

    //                 // Calculate length of HTML content (excluding HTML tags)
    //                 var textLength = $(htmlContent).text().length;

    //                 if (textLength > maxLength) {
    //                     // Show an error message
    //                     $('#character-count').text('Character limit exceeded!');
    //                     $('#btn-submit').attr('disabled', true);
                        
    //                 } else {
    //                     $('#character-count').text('');
    //                     $('#btn-submit').attr('disabled', false);
    //                 }
    //             }
    //         }
    //     });
    // });
    $(document).ready(function() {
    $('#section_content').summernote({
        callbacks: {
            onKeyup: function(e) {
                var htmlContent = $('#section_content').summernote('code');
                var maxLength = 3000; // Maximum character limit including HTML content

                // Calculate length of HTML content (excluding HTML tags)
                var textLength = $(htmlContent).text().length;

                if (textLength > maxLength) {
                    // Show an error message
                    $('#character-count').text('Character limit exceeded!');
                    $('#btn-submit').attr('disabled', true);
                    
                } else {
                    $('#character-count').text('');
                    $('#btn-submit').attr('disabled', false);
                }
            },
            // onImageUpload: function(files) {
            
            //     var maxSizeMB = 2; 

            //     if (files.size > maxSizeMB * 1024 * 1024) {
            //         alert('Image size exceeds ' + maxSizeMB + 'MB limit: ' + files.name);
            //         return false; 
            //     }
            //     else
            //     {
            //         return true;
            //     }
        
            // }
            onImageUpload: function(files) {
                var maxSizeMB = 2; // Maximum allowed size in MB

                // Function to check file size and insert image
                function checkAndInsertImage(file) {
                    return new Promise(function(resolve, reject) {
                        // Check file size
                        if (file.size > maxSizeMB * 1024 * 1024) {
                            // Show an alert or handle size exceed error
                            alert('Image size exceeds ' + maxSizeMB + 'MB limit: ' + file.name);
                            reject('Size limit exceeded');
                        } else {
                            // Create a URL for the image to display in the editor
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var imgSrc = e.target.result;
                                // Insert image into Summernote editor
                                $('#section_content').summernote('editor.insertImage', imgSrc);
                                resolve();
                            };
                            // Read the file as a data URL
                            reader.readAsDataURL(file);
                        }
                    });
                }

                // Array to hold promises for each file upload
                var uploadPromises = [];

                // Iterate through each file and add upload promise to array
                for (var i = 0; i < files.length; i++) {
                    uploadPromises.push(checkAndInsertImage(files[i]));
                }

                // Execute all upload promises
                Promise.all(uploadPromises)
                    .then(function() {
                        // All files processed successfully
                        console.log('All images uploaded and inserted.');
                    })
                    .catch(function(error) {
                        // Handle errors if any file size limit was exceeded
                        console.error('Upload error:', error);
                    });

                // Return false to cancel default Summernote image upload behavior
                return false;
            }
        }
    });
});

    $(document).ready(function() 
    {
        $('#gstform').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                // gst_applicable: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Select GST Applicable'
                //         }
                //     }
                // },
                // org_website: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter URL'
                //         }
                //     }
                // },
            }
        });
    });
    $(document).ready(function(e) 
    {
        $("#gstform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Settings/InsertGstDetails'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Company Setting',
                            //     text: 'Company Setting Updated Successfully',
                            //     type: 'success'
                            // });
                            $('#successModalprofile').modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location =
                        //         "<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
            }
            return false;

        }));
    });
    function GetState(country_id) 
    {

        var datastring = 'country_id=' + country_id;

        $.ajax({
            type: "post",
            url: "<?php echo base_url('CreateProfile/GetStates'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#bind_state_list').html(data);
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
</script>

<script>
    $('#cmp_time_zone').select2();
    $('#cmp_currency').select2();
    $('#cmp_gst_applicable').select2();

    $('#role').select2({
        dropdownParent: $("#addQuotationTemplate")
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
<?php $this->load->view('Admin/includes/n-footer'); ?>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/profile_setting'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalprofile" tabindex="-1" aria-labelledby="successModalprofileLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalprofileLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Company Profile Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/profile_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(e) {
        $("#addform_title").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                content = $('#section_content').val();
                title = $('#title_name').val();
                role = $('#role').val();

                if (content == '' && title == '' && role == '') {
                    $('#error_section').html('Please Enter Content.');
                    $('#error_section_name').html('Please Enter Title.');
                    $('#error_role').html('Please Select Role.');
                    return false;
                } else if (content == '') {
                    $('#error_section').html('');
                    $('#error_section_name').html('');
                    $('#error_role').html('');
                    $('#error_section').html('Please Enter Content.');
                    return false;
                } else if (title == '') {
                    $('#error_section').html('');
                    $('#error_section_name').html('');
                    $('#error_role').html('');
                    $('#error_section_name').html('Please Enter Title.');
                    return false;
                }else if (role == '') {
                    $('#error_section').html('');
                    $('#error_section_name').html('');
                    $('#error_role').html('');
                    $('#error_role').html('Please Select Role');
                    return false; 
                }else {
                    $('#error_section').html('');
                    $('#error_section_name').html('');
                    $('#error_role').html('');
                    $("#preview_upload").html(
                        '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                    );
                    $("#preview_upload").show();
                    $.ajax({
                        url: "<?= base_url('admin/dashboard/addCompany_rolewise_details') ?>",
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
                                //     title: 'Add Section',
                                //     text: 'Added Successfully !!',
                                //     type: 'success'
                                // });
                                $('#addQuotationTemplate').modal('hide');
                                $('#successModaltitle').modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/dashboard/CompanySetting?section=print_section'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
            }
            return false;
        }));
    });
</script>

<script>
    function Edit(id) 
    {
        var edit_title = 'id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/dashboard/getDataCompany'); ?>",
            cache: false,
            data: edit_title,
            success: function(data) {
                // alert(data);
                $('#edit_section').modal('show');
                $('#section_data').html(data);
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    function Delete(element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
    };

    $(document).ready(function(e) 
{
  $("#deleteForm_CompanyDetails").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Dashboard/Delete_company_details'); ?>",
          cache: false,
          data: { "id": datastring },
          success: function(data) {
            $(function() {
              $("deleteSucessModal").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Master'); ?>";
            // }, 1000);


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

<div class="modal fade" id="successModaltitle" tabindex="-1" aria-labelledby="successModaltitleLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModaltitleLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Company Details Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/profile_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Company Details?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteForm_CompanyDetails">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSucessModal" tabindex="-1" aria-labelledby="deleteSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deleteSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=print_section'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=print_section'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.read-more-btn').on('click', function() {
        $(this).closest('.toggle-header').siblings('.show-content').toggle();
    });
});
    </script>