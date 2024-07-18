<?php
    $new = array();
    foreach ($allreports['report_preference'] as $row) {
        array_push($new, explode(',', $row));
    }
?>
<?php $this->load->view('Admin/includes/n-header');    ?>
<!-- Main content -->
<style>
    .media-left .img-size-cmp{
        width: 90px; 
    }
    .nav-link.tablinks.active{
        height: auto !important;
    }
    .nav-tabs li.bv-tab-success>a {
        color: #000;
    }
    .dflex{
        margin-bottom: 0;
    }
    table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }
    .popover .arrow{
        display: none !important;
    }
   .popover-body{
        width: 250px !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    .datatable-header,.datatable-footer{
        padding: 1.25rem 1.25rem 0 1.25rem !important;
    }
    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    #myPrintingTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#myPrintingTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#myPrintingTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    legend.field {
        width:45% !important;
    }
    .tabs-nav-items{
        width: 33.33% !important;
    }
    #myPrintingTable th:first-child{
        width:100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }

</style>

<div class="content-wrapper">
    <?php
        if ($print_name == 'print_section') {
            $conatct_head_active = '';
            $conatct_section_active = '';
            $print_head_active = 'active';
            $print_section_active = 'active';
            $timeline_head_active = '';
            $timeline_section_active = '';
        }elseif ($print_name == 'timeline_setting') {
            $conatct_head_active = '';
            $conatct_section_active = '';
            $print_head_active = '';
            $print_section_active = '';
            $timeline_head_active = 'active';
            $timeline_section_active = 'active';
        }elseif ($print_name == 'basic_setting') {
            $conatct_head_active = '';
            $conatct_section_active = '';

            $print_head_active = '';
            $print_section_active = '';

            $timeline_head_active = '';
            $timeline_section_active = '';

            $basic_setting_head_active = 'active';
            $basic_setting_section_active = 'active';
        }else{
            $conatct_head_active = 'active';
            $conatct_section_active = 'active';

            $print_head_active = '';
            $print_section_active = '';

            $timeline_head_active = '';
            $timeline_section_active = '';

            $basic_setting_head_active = '';
            $basic_setting_section_active = '';
        }

        $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
    ?>
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card tab">
                    <div class="card-body tabsbody">
                        <ul class="nav nav-tabs nav-tabs-solid border">
                            <!-- <li class="nav-item tabs-nav-items">
                                <a href="#solid-bordered-tab1" class="nav-link <?= $conatct_head_active ?> tablinks" data-toggle="tab">Company Profile<img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/19 (1).svg"></a>
                            </li> -->
                            <li class="nav-item tabs-nav-items">
                                <a href="#solid-bordered-tab5" class="nav-link <?= $conatct_head_active ?>  tablinks" data-toggle="tab">Dashboard Setting<img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/23.svg"></a>
                            </li>
                            <li class="nav-item tabs-nav-items">
                                <a href="#solid-bordered-tab3" class="nav-link tablinks <?= $basic_setting_head_active ?>" data-toggle="tab">Basic Setting <img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/21 (1).svg"></a>
                            </li>
                            <li class="nav-item tabs-nav-items">
                                <a href="#solid-bordered-tab2" class="nav-link <?= $timeline_head_active ?> tablinks" data-toggle="tab">Timeline Setting <img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/20 (1).svg"></a>
                            </li>
                            
                            <!-- <li class="nav-item tabs-nav-items">
                                <a href="#solid-bordered-tab4" class="nav-link tablinks <?= $print_head_active ?>" data-toggle="tab">Printing Configuration<img class="tab-image-icon" src="<?= base_url() ?>new-assets/assets/Images/22.svg"></a>
                            </li> -->
                           

                        </ul>

                        <div class="tab-content">
                            <!-- <?php echo $conatct_head_active;?>
                            <div class="tab-pane <?= $conatct_head_active ?>" id="solid-bordered-tab1">
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
                                                                        <select data-placeholder="Please Select Time Zone" class="form-control" id="cmp_time_zone" data-fouc name="org_timezone">
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
                                                                        <select data-placeholder="Please Select Currency" class="form-control" data-fouc name="org_currency" id="cmp_currency">
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
                            </div> -->
                            <div class="tab-pane <?= $timeline_section_active ?>" id="solid-bordered-tab2">
                                <div class="card">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                                        <h6 class="card-title py-sm-4 card-headings">Add New Period</h6>
                                    </div>
                                    <form id="account_form" method="post">
                                        <div class="col-lg-12 dflex">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Period Name <span style="color: red;">*</span></label>
                                                    <input type="text" name="period_name" placeholder="Period Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Short Year </label>
                                                <input type="text" name="short_year" placeholder="Short Year" class="form-control">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Start Date <span style="color: red;">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" id="start_date" name="start_date" value="<?= date('d F, Y'); ?>" placeholder="Select start date" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <label>End Date <span style="color: red;">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" value="<?= date('d F, Y'); ?>" onchange="checkvalidationdate()" placeholder="Select end date" autocomplete="off">
                                                    <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 update-details" style="text-align:right;">
                                            <button class="btn btn-primary" type="submit" id="act_sub_btn" style="margin-bottom:20px;margin-right:10px;"> <span class="text-white">Add</span> <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                                        <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                                        <h6 class="card-title py-sm-4 card-headings">Timeline</h6>
                                    </div>
                                    <!-- datatable-button-flash-basic -->
                                    <table class="table table-striped" id="myTimelineTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 100px;">Sr No</th>
                                                <th>Period Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Current/Closed</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cnt1 = 1;
                                            foreach ($account_period_array as $row) {  ?>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <?= $cnt1;
                                                            $cnt1++; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;" class="text-wrap-col">
                                                            <?= $row->period_name; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($row->start_date)); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($row->end_date)); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?php if ($row->status == 1) { ?>
                                                                <button type="button" class="green-btn" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Closed" onclick="deactivate(this)" id="<?= $row->period_id  ?>" data-id="<?= $row->period_id ?>">Current</button>
                                                            <?php } else { ?>
                                                                <button type="button" class="red-btn" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Click for Activate" onclick="activate(this)" id="<?= $row->period_id ?>" data-id="<?= $row->period_id ?>">Closed</button>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td class="text-center">
                                                        <div>
                                                            <a class="cursor-pointer" data-toggle="modal" onclick="edit_accounting_period(id)" id="<?= $row->period_id ?>"><i class="fa fa-edit"></i></a>
                                                        </div>
                                                    </td> -->


                                                    <td>
                                                        <div>
                                                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                                <li>  
                                                                    <div>
                                                                        <div class="panel-button">
                                                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                                <i class="icon-menu9" style="cursor:pointer;"></i>
                                                                            </a>
                                                                        </div>
                                                                        
                                                                        <div class="my-popover-content" style="display:none">
                                                                            <ul>
                                                                                <li>
                                                                                    <a data-toggle="modal" onclick="edit_accounting_period(id)" style="color:#333333;" id="<?= $row->period_id ?>">
                                                                                        <span class="status-mark position-left dot dot-green"></span> Edit Timeline  
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> 

                                                                </li>
                                                                <!-- </i></a></li> -->
                                                            </ul>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php   }   ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="tab-pane <?= $basic_setting_section_active ?>" id="solid-bordered-tab3">
                                <div class="card">
                                    <form class="col-12" id="basic_settings_form" method="post">
                                        <div class="col-xl-12 col-flex">
                                            <div class="half">
                                                <fieldset class="form-filedset">
                                                    <legend class="field">Quotation</legend>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Title</label>
                                                        <input type="text" name="q_printing_title" class="form-control" id="q_printing_title" placeholder="Printing Title" value="<?= $organsation_array->q_printing_title ?>">
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Prefix</label>
                                                        <input type="text" name="quote_prefix" class="form-control" id="quote_prefix" placeholder="Quotation Prefix" value="<?= $organsation_array->quote_prefix ?>">
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Suffix</label>
                                                        <input type="text" name="quote_suffix" class="form-control" id="quote_suffix" placeholder="Quotation Suffix" value="<?= $organsation_array->quote_suffix ?>">
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Starting Number</label>
                                                        <input type="text" name="quote_number" class="form-control" id="quote_number" placeholder="Starting Number" value="<?= $organsation_array->quote_number ?>">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="half">
                                                <fieldset class="form-filedset">
                                                    <legend class="field">Reminder</legend>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Before Time</label>
                                                        <select class="form-control" name="rem_before_time_name" id="reminder_before_time_9" data-placeholder="Select Before Time">
                                                            <option value="">Select Before Time</option>
                                                            <!-- <?php foreach ($getTimeSlot as $value) { ?>
                                                                <option value="<?= $value->time_slot ?>"><?= $value->time_slot ?></option>
                                                            <?php  } ?> -->
                                                            <?php foreach ($getTimeSlot as $value) { ?>
                                                                <option value="<?= $value->time_slot ?>" <?= $rbt = ($get_reminder_details->rem_before_time_name == $value->time_slot) ? 'selected' : '' ?> ><?= $value->time_slot ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <?php $acc_mng = explode(",", $get_reminder_details->rem_notify_by_id); ?>
                                                        <label class="form-group-float-label black-text">Notify By</label>
                                                        <select class="form-control" name="rem_notify_by_id[]" id="reminder_notify_by_12" data-placeholder="Select Notify By" multiple>
                                                            <option value="">Select Notify By</option>
                                                            <option value="NA" <?php echo $acc = (in_array('NA', $acc_mng)) ? "Selected" : ""; ?>>NA</option>
                                                            <?php foreach ($getNotifyBy as $value) { ?>
                                                                <option value="<?= $value->notify_id ?>" <?php echo $acc = (in_array($value->notify_id, $acc_mng)) ? "Selected" : ""; ?>><?= $value->notify_by; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Recurring Interval</label>
                                                        <select class="form-control" name="rem_recurring_interval_name" id="interval_type_6" data-placeholder="Select Recurring Interval">
                        
                                                            <?php
                                                            if(!empty($get_reminder_details->rem_recurring_interval_name))
                                                            {
                                                                if($get_reminder_details->rem_recurring_interval_name == 'day')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day" selected=''>Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'week')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week" selected=''>Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'fortnightly')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly" selected=''>Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'monthly')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly" selected=''>Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'quaterly')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly" selected=''>Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'half-quarterly')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly" selected=''>Half Quarterly</option>
                                                                    <option value="year">Year</option>
                                                            <?php
                                                                }
                                                                else if($get_reminder_details->rem_recurring_interval_name == 'year')
                                                                {
                                                            ?>
                                                                    <option value="">Select Recurring Interval</option>
                                                                    <option value="day">Day</option>
                                                                    <option value="week">Week</option>
                                                                    <option value="fortnightly">Fortnightly</option>
                                                                    <option value="monthly">Monthly</option>
                                                                    <option value="quaterly">Quaterly</option>
                                                                    <option value="half-quarterly">Half Quarterly</option>
                                                                    <option value="year" selected=''>Year</option>
                                                            <?php
                                                                }
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <option value="">Select Recurring Interval</option>
                                                                <option value="day">Day</option>
                                                                <option value="week">Week</option>
                                                                <option value="fortnightly">Fortnightly</option>
                                                                <option value="monthly">Monthly</option>
                                                                <option value="quaterly">Quaterly</option>
                                                                <option value="half-quarterly">Half Quarterly</option>
                                                                <option value="year">Year</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-float">
                                                        <!-- <label class="form-group-float-label black-text">Starting Number</label>
                                                        <input type="text" name="quote_number" class="form-control" id="quote_number" placeholder="Starting Number" value="<?= $organsation_array->quote_number ?>"> -->
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-flex">
                                            <div class="half">
                                                <fieldset class="form-filedset">
                                                    <legend class="field">CRM</legend>
                                                    <div class="form-group form-group-float">
                                                        <label class="form-group-float-label black-text">Intimation On Last Action ( By Days ) </label>
                                                        <input type="text" name="intimation_days" class="form-control" id="intimation_days" placeholder="Intimation On Last Action ( By Days ) " value="<?= $id = ($organsation_array->intimation_days != '') ? $organsation_array->intimation_days : '2'; ?>">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="half">
                                                <fieldset class="form-filedset">
                                                    <legend class="field">Contact Management</legend>
                                                    <div class="form-group form-group-float" style="display:flex;">
                                                        <label class="cform-group-float-label black-text col-md-4" for="email" style="padding-left:0;">Contact Code</label>
                                                        <?php 
                                                        if(!empty($organsation_array->contact_code_id) || $organsation_array->contact_code_id != 0)
                                                        {
                                                            if($organsation_array->contact_code_id == 1)
                                                            {
                                                        ?>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="1" checked=""><span class="padding-left" style="margin-right:10px;color:#000;">Custom</span></lable>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="2"><span class="padding-left" style="color:#000;">Autocode</span>
                                                        </div>
                                                        <?php
                                                            }
                                                            else
                                                            {
                                                        ?>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="1"><span class="padding-left" style="margin-right:10px;color:#000;">Custom</span></lable>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="2" checked=""><span class="padding-left" style="color:#000;">Autocode</span>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="1"><span class="padding-left" style="margin-right:10px;color:#000;">Custom</span></lable>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="2" checked=""><span class="padding-left" style="color:#000;">Autocode</span>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="1"><span class="padding-left" style="margin-right:10px;color:#000;">Custom</span></lable>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="radio" name="contact_code" value="2" checked=""><span class="padding-left" style="color:#000;">Autocode</span>
                                                        </div> -->
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-12 update-details" style="text-align:right;">
                                            <button class="btn btn-primary" type="submit" style="margin-bottom:20px;margin-right:20px;"> <span class="text-white">Update</span> <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card">
                                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                                        <span class="span-py-10 white-text">Printing Configuration</span>
                                        <div class="small-div contact text-right">
                                            <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#addQuotationTemplate"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span>
                                        </div>
                                    </div>
                                    <!-- datatable-button-flash-basic -->
                                    <table class="table table-striped" id="myPrintingTable">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Printing Name</th>
                                                <th>Action</th>
                                                <th class="d-none" ></th>
                                                <th class="d-none" ></th>
                                                <th class="d-none" ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($get_section_array as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <?= $count;
                                                            $count++; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:200px;" class="text-wrap-col">
                                                            <?= $row->section_name; ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                        <a data-toggle="modal" onclick="Edit(id)" id="<?= $row->section_id; ?>" class="cursor-pointer"><i class="fa fa-edit"></i></a>
                                                        <a class="cursor-pointer" data-toggle="modal" onclick="Delete(id)" id="<?= $row->section_id; ?>"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </td> -->


                                                    <td>
                                                        <div>
                                                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                                <li>  
                                                                    <div>
                                                                        <div class="panel-button">
                                                                            <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                                <i class="icon-menu9" style="cursor:pointer;"></i>
                                                                            </a>
                                                                        </div>
                                                                        
                                                                        <div class="my-popover-content" style="display:none">
                                                                            <ul>
                                                                                <li>
                                                                                    <a data-toggle="modal" onclick="Edit(id)" id="<?= $row->section_id; ?>" style="color:#333333;">
                                                                                        <span class="status-mark position-left dot dot-green"></span> Edit Printing Configuration
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a data-toggle="modal" onclick="Delete(this)" id="<?= $row->section_id; ?>" data-id="<?= $row->section_id ?>" style="color:#333333;">
                                                                                        <span class="status-mark position-left dot dot-red"></span> Delete Printing Configuration
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> 

                                                                </li>
                                                                <!-- </i></a></li> -->
                                                            </ul>
                                                        </div>
                                                    </td>


                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- <div class="tab-pane <?= $print_section_active ?>" id="solid-bordered-tab4">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                                            <span class="span-py-10 white-text">Printing Configuration</span>
                                            <div class="small-div contact text-right">
                                                <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#addQuotationTemplate"><img class="white-icon small contact-icon" src="<?= base_url(); ?>new-assets/assets/Images/whitenotes.png"></a>Add</span>
                                            </div>
                                        </div>
                                        <table class="table table-striped" id="myPrintingTable">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Printing Name</th>
                                                    <th>Action</th>
                                                    <th class="d-none" ></th>
                                                    <th class="d-none" ></th>
                                                    <th class="d-none" ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1;
                                                foreach ($get_section_array as $row) { ?>
                                                    <tr>
                                                        <td>
                                                            <div style="width:150px;">
                                                                <?= $count;
                                                                $count++; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div style="width:200px;" class="text-wrap-col">
                                                                <?= $row->section_name; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                                    <li>  
                                                                        <div>
                                                                            <div class="panel-button">
                                                                                <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                                                    <i class="icon-menu9" style="cursor:pointer;"></i>
                                                                                </a>
                                                                            </div>
                                                                            
                                                                            <div class="my-popover-content" style="display:none">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a data-toggle="modal" onclick="Edit(id)" id="<?= $row->section_id; ?>" style="color:#333333;">
                                                                                            <span class="status-mark position-left dot dot-green"></span> Edit Printing Configuration
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a data-toggle="modal" onclick="Delete(this)" id="<?= $row->section_id; ?>" data-id="<?= $row->section_id ?>" style="color:#333333;">
                                                                                            <span class="status-mark position-left dot dot-red"></span> Delete Printing Configuration
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div> 

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>


                                                        <td class="d-none"></td>
                                                        <td class="d-none"></td>
                                                        <td class="d-none"></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->
                                    
                            <div class="tab-pane <?= $conatct_head_active ?> " id="solid-bordered-tab5">
                                
                                <div id="pricingWrapper" class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                                        <div class="card stacked mt-5">
                                            <div class="card-header reportscard pt-0">
                                                <span class="card-price card-image"><i class="fa fa-line-chart report-icons"></i></span>
                                                <h3 class="card-title mt-3 mb-1 black-text">CRM</h3>
                                                <div class="report-hight">
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Source Leads</label>
                                                        <input type="checkbox" class="col-2" id="leadsopportunitybysourcecard" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadsopportunitybysourcecard') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Segment Leads</label>
                                                        <input class="col-2" type="checkbox" id="leadsopportunitybysegment" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                if ($new[0][$i] == 'leadsopportunitybysegment') {
                                                                                                                                    print 'checked="checked" ';
                                                                                                                                }
                                                                                                                            } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Product Leads</label>
                                                        <input class="col-2" type="checkbox" id="leadoppbyproductservice" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                if ($new[0][$i] == 'leadoppbyproductservice') {
                                                                                                                                    print 'checked="checked" ';
                                                                                                                                }
                                                                                                                            } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Monthly Leads</label>
                                                        <input class="col-2" type="checkbox" id="leadoppbymonthlycount" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                            if ($new[0][$i] == 'leadoppbymonthlycount') {
                                                                                                                                print 'checked="checked" ';
                                                                                                                            }
                                                                                                                        } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">User Leads</label>
                                                        <input class="col-2" type="checkbox" id="leadoppbyuserwisemonthlycount" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadoppbyuserwisemonthlycount') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Sales Force Scores</label>
                                                        <input class="col-2" type="checkbox" id="leadsopportunitybysalesperson" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadsopportunitybysalesperson') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Stage Leads</label>
                                                        <input class="col-2" type="checkbox" id="leadsopportunitybystagecard" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadsopportunitybystagecard') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Sales Segment</label>
                                                        <input class="col-2" type="checkbox" id="leadsopportunitybysalesperson" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadsopportunitybysalesperson') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Sales Product</label>
                                                        <input class="col-2" type="checkbox" id="leadsopportunitybysalespersonproductwise" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'leadsopportunitybysalespersonproductwise') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                                        <div class="card stacked mt-5">
                                            <div class="card-header reportscard pt-0">
                                                <span class="card-price card-image"><i class="fa fa-users report-icons" aria-hidden="true"></i></span>
                                                <h3 class="card-title mt-3 mb-1 black-text">Contact</h3>
                                                <div class="report-hight">
                                                    <!-- <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">All Contacts</label>
                                                        <input type="checkbox" class="col-2" />
                                                    </div> -->
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Segment Contacts</label>
                                                        <input type="checkbox" class="col-2" id="segmentwisecontact" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                            if ($new[0][$i] == 'segmentwisecontact') {
                                                                                                                                print 'checked="checked" ';
                                                                                                                            }
                                                                                                                        } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Account Manager</label>
                                                        <input type="checkbox" class="col-2" id="leadopportunitybyowner" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                if ($new[0][$i] == 'leadopportunitybyowner') {
                                                                                                                                    print 'checked="checked" ';
                                                                                                                                }
                                                                                                                            } ?> />
                                                    </div>

                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Account Revenue</label>
                                                        <input type="checkbox" class="col-2" id="leadopportunitybyaccountwiserevenue" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                if ($new[0][$i] == 'leadopportunitybyaccountwiserevenue') {
                                                                                                                                    print 'checked="checked" ';
                                                                                                                                }
                                                                                                                            } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Contact List</label>
                                                        <input type="checkbox" class="col-2" id="contactsummary" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                        if ($new[0][$i] == 'contactsummary') {
                                                                                                                            print 'checked="checked" ';
                                                                                                                        }
                                                                                                                    } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Contact Types</label>
                                                        <input type="checkbox" class="col-2" id="typewisecontact" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                        if ($new[0][$i] == 'typewisecontact') {
                                                                                                                            print 'checked="checked" ';
                                                                                                                        }
                                                                                                                    } ?> />
                                                    </div>
                                                    <!-- <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Contact with activity</label>
                                                        <input type="checkbox" class="col-2">
                                                    </div> -->
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Inactive Contacts</label>
                                                        <input type="checkbox" class="col-2" id="contactnoactivity" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                        if ($new[0][$i] == 'contactnoactivity') {
                                                                                                                            print 'checked="checked" ';
                                                                                                                        }
                                                                                                                    } ?> />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                                        <div class="card stacked mt-5">
                                            <div class="card-header reportscard pt-0">
                                                <span class="card-price card-image"><i class="fa fa-user-plus report-icons" aria-hidden="true"></i></span>
                                                <h3 class="card-title mt-3 mb-1 black-text">Resource</h3>
                                                <div class="report-hight">
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Time Slots</label>
                                                        <input type="checkbox" class="col-2" id="availabletimeslots" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                            if ($new[0][$i] == 'availabletimeslots') {
                                                                                                                                print 'checked="checked" ';
                                                                                                                            }
                                                                                                                        } ?> />
                                                    </div>
                                                    <!-- <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Resource -Target</label>
                                                        <input type="checkbox" class="col-2">
                                                    </div> -->
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Resource Target</label>
                                                        <input type="checkbox" class="col-2" id="employeerevenue" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                        if ($new[0][$i] == 'employeerevenue') {
                                                                                                                            print 'checked="checked" ';
                                                                                                                        }
                                                                                                                    } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Resource Earnings</label>
                                                        <input type="checkbox" class="col-2" id="employeewiseactivity" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                            if ($new[0][$i] == 'employeewiseactivity') {
                                                                                                                                print 'checked="checked" ';
                                                                                                                            }
                                                                                                                        } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Resource Tasks</label>
                                                        <input type="checkbox" class="col-2" id="employeewiseactivitymapping" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                    if ($new[0][$i] == 'employeewiseactivitymapping') {
                                                                                                                                        print 'checked="checked" ';
                                                                                                                                    }
                                                                                                                                } ?> />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-1 card-1">
                                        <div class="card stacked mt-5">
                                            <div class="card-header reportscard pt-0">
                                                <span class="card-price card-image"><i class="fa fa-line-chart report-icons"></i></span>
                                                <h3 class="card-title mt-3 mb-1 black-text">General Report</h3>
                                                <div class="report-hight">
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Task Overview</label>
                                                        <input type="checkbox" class="col-2" id="schedulesummarycard" checked <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                            if ($new[0][$i] == 'schedulesummarycard') {
                                                                                                                                print 'checked="checked" ';
                                                                                                                            }
                                                                                                                        } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Target Overview</label>
                                                        <input type="checkbox" class="col-2" id="targetreport" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                    if ($new[0][$i] == 'targetreport') {
                                                                                                                        print 'checked="checked" ';
                                                                                                                    }
                                                                                                                } ?> />
                                                    </div>
                                                    <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">Task Today</label>
                                                        <input type="checkbox" class="col-2" id="Todaysactivitiescard" checked <?php for ($i = 0; $i <= 40; $i++) { if ($new[0][$i] == 'Todaysactivitiescard') { print 'checked="checked" '; } } ?> />
                                                    </div>
                                                    <!-- <div class="single-line-text row">
                                                        <label class="checkbox col-sm-10 text-left">LeadsOpportunities By Owner</label>
                                                        <input type="checkbox" class="col-2" id="leadsopportunitybyowner" <?php for ($i = 0; $i <= 40; $i++) {
                                                                                                                                if ($new[0][$i] == 'leadsopportunitybyowner') {
                                                                                                                                    print 'checked="checked" ';
                                                                                                                                }
                                                                                                                            } ?> />
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div id="addQuotationTemplate" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Add Printig Configuration (Quotation Template)</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addform" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Section for <sup class="text-danger">*</sup></label>
                            <input type="text" name="section_name" id="section_name" class="form-control" placeholder="E.g. Section 1">
                            <span id="error_section_name" style="color: red;font-size:13px"></span>
                        </div>

                        <div class="form-group" style="margin-bottom:0;">
                            <label>Section  <sup class="text-danger">*</sup></label>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea rows="1" name="section_content" id="section_content" class="form-control"></textarea>
                                    <span id="error_section" style="color: red;font-size:13px"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal_default" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Edit Timeline Setting</h6>
                    <button type="button" class="close" onclick="updateUI_edit_timeline_button_close()" id="edit_timeline_button_close">&times;</button>
                </div>

                <div class="modal-body">
                    <div id="complaint_model_data"></div>
                </div>

            </div>
        </div>
    </div>

    <div id="edit_section" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Edit Printing Configuration</h6>
                    <button type="button" id="edit_button_close" class="close" onclick="updateUI_edit_button_close()">&times;</button>
                </div>

                <div class="modal-body">
                    <div id="section_data"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- /content area -->
    <!-- Footer -->
    <?php $this->load->view('Admin/includes/n-footer.php');    ?>
    <script>
        function checkvalidationdate()
        {
            var start_date = new Date($('#start_date').val());
            var end_date = new Date($('#end_date').val());
            if (start_date > end_date) 
            {
                $('#error_end_date').css('display','block');
                $("#act_sub_btn").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#act_sub_btn").attr('disabled', false);
            }
        }
    </script>
    <script type="text/javascript">
        $('#section_content').summernote();

        $(document).ready(function() {
            $('#gstform').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    gst_applicable: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select GST Applicable'
                            }
                        }
                    },
                    org_website: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter URL'
                            }
                        }
                    },
                }
            });
        });
        $(document).ready(function(e) {
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
                                new PNotify({
                                    title: 'Company Setting',
                                    text: 'Company Setting Updated Successfully',
                                    type: 'success'
                                });
                            });
                            setTimeout(function() {
                                window.location =
                                    "<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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

        function GetState(country_id) {

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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInp').bind('change', function() {

            var ext = $('#imgInp').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1').slideDown("slow");
                $('#error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#error2').slideUp("slow");
                }
                $('#error1').slideUp("slow");

            }
        });
        // Timesetting
        $(document).ready(function() {
            $('#account_form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    period_name: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Period Name'
                            }
                        }
                    },

                    start_date: {
                        validators: {
                            notEmpty: {
                                message: 'Select Start Date'
                            }
                        }
                    },

                    end_date: {
                        validators: {
                            notEmpty: {
                                message: 'Select End Date'
                            }
                        }
                    },

                }
            });
        });
        $(document).ready(function(e) {
            $("#account_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Settings/AddAccountPeriod'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Period',
                                //     text: 'Added Successfully',
                                //     type: 'success'
                                // });
                                $('#successModaltimeline').modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/dashboard/CompanySetting?section=timeline_setting'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;

            }));
        });

        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Closed this financial year?</p>',
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

                var datastring = 'p_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/dashboard/deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        if (data == 1) {
                            $(function() {
                                new PNotify({
                                    title: 'Confirmation Form',
                                    text: 'Closed successfully',
                                    type: 'success'
                                });
                            });
                        }

                        setTimeout(function() {
                            window.location =
                                "<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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

        function activate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Activate this financial year?</p>',
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

                var datastring = 'p_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/dashboard/activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Confirmation Form',
                                text: 'Activated successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location =
                                "<?php echo base_url('admin/dashboard/CompanySetting'); ?>";
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

        function edit_accounting_period(id) {

            var datastring = 'id=' + id;

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/dashboard/edit_mastergroup'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //   alert(data);
                    $('#modal_default').modal('show');
                    $('#complaint_model_data').html(data);
                    $(".popover-body").css('display','none');
                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }
        function updateUI_edit_timeline_button_close()
        {
            // $(".popover-body").css('display','block');
            // $('#modal_default').modal('hide');
            location.reload();
        }
        // basic_settings_form
        $(document).ready(function(e) {
            $("#basic_settings_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Settings/UpdateBasicSettingDetails'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Basic Setting',
                                //     text: 'Updated Successfully',
                                //     type: 'success'
                                // });
                                $('#successModalbasicsetting').modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location =
                            //         "<?php echo base_url('admin/dashboard/CompanySetting?section=basic_setting'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            $('#alertModal').modal('show');
                        }
                    });
                }
                return false;

            }));
        });
        // Printing Configuration
        function Edit(id) {

            var edit_section = 'id=' + id;

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Settings/getData'); ?>",
                cache: false,
                data: edit_section,
                success: function(data) {
                    // alert(data);
                    $('#edit_section').modal('show');
                    $('#section_data').html(data);
                    $(".popover-body").css('display','none');
                },
                error: function() {
                    alert('Error while request..');
                }
            });

        }

        function updateUI_edit_button_close()
        {
            // $(".popover-body").css('display','block');
            // $('#edit_section').modal('hide');
            location.reload();
        }

        // function updateUI_edit_button_close()
        // {
        //     $(".popover-body").css('display','block');
        //     $('#edit_button_close').attr('data-dismiss', 'modal');
        // }

        function Delete1(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Delete this Section ?</p>',
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

                var datastring = 'section_id=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Settings/Delete'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        $(function() {
                            new PNotify({
                                title: 'Delete Section',
                                text: 'Deleted Section successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location =
                                "<?php echo base_url('admin/dashboard/CompanySetting?section=print_section'); ?>";
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
        $(document).ready(function(e) {
            $("#addform").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    section_content = $('#section_content').val();
                    section_name = $('#section_name').val();

                    if (section_content == '' && section_name == '') {
                        $('#error_section').html('Please enter section content..');
                        $('#error_section_name').html('Please enter section name..');
                        return false;
                    } else if (section_content == '') {
                        $('#error_section').html('');
                        $('#error_section_name').html('');
                        $('#error_section').html('Please enter section content..');
                        return false;
                    } else if (section_name == '') {
                        $('#error_section').html('');
                        $('#error_section_name').html('');
                        $('#error_section_name').html('Please enter section name..');
                        return false;
                    } else {
                        $('#error_section').html('');
                        $('#error_section_name').html('');
                        $("#preview_upload").html(
                            '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>'
                        );
                        $("#preview_upload").show();
                        $.ajax({
                            url: "<?= base_url('admin/Settings/addSection') ?>",
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
                                    $('#successModalprinting').modal('show');
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

    <!-- cards display starts.... -->
    <script>
        $(document).ready(function() {
            $('#leadsopportunitybysourcecard').change(function() {
                var reportname = document.getElementById('leadsopportunitybysourcecard').id;
                var datastring = 'report_name=' + reportname + ',';
                
                if (this.checked != true) {
                    // alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadsopportunitybystagecard').change(function() {
                var reportname = document.getElementById('leadsopportunitybystagecard').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            //alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#typewisecontact').change(function() {
                var reportname = document.getElementById('typewisecontact').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#schedulesummarycard').change(function() {
                var reportname = document.getElementById('schedulesummarycard').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#contactsummary').change(function() {
                var reportname = document.getElementById('contactsummary').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //	alert('checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadsopportunitybysalesperson').change(function() {
                var reportname = document.getElementById('leadsopportunitybysalesperson').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>
    

    <script>
        $(document).ready(function() {
            $('#leadsopportunitybysalespersonproductwise').change(function() {
                var reportname = document.getElementById('leadsopportunitybysalespersonproductwise').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadsopportunitybysegment').change(function() {
                var reportname = document.getElementById('leadsopportunitybysegment').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadopportunitybyowner').change(function() {
                var reportname = document.getElementById('leadopportunitybyowner').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#leadopportunitybyaccountwiserevenue').change(function() {
                var reportname = document.getElementById('leadopportunitybyaccountwiserevenue').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#targetreport').change(function() {
                var reportname = document.getElementById('targetreport').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    // alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#Todaysactivitiescard').change(function() {
                var reportname = document.getElementById('Todaysactivitiescard').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadsopportunitybyowner').change(function() {
                var reportname = document.getElementById('leadsopportunitybyowner').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#segmentwisecontact').change(function() {
                var reportname = document.getElementById('segmentwisecontact').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    // alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //	alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#employeerevenue').change(function() {
                var reportname = document.getElementById('employeerevenue').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadoppbyproductservice').change(function() {
                var reportname = document.getElementById('leadoppbyproductservice').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#leadoppbymonthlycount').change(function() {
                var reportname = document.getElementById('leadoppbymonthlycount').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#employeewiseactivity').change(function() {
                var reportname = document.getElementById('employeewiseactivity').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#employeewiseactivitymapping').change(function() {
                var reportname = document.getElementById('employeewiseactivitymapping').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#contactnoactivity').change(function() {
                var reportname = document.getElementById('contactnoactivity').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#availabletimeslots').change(function() {
                var reportname = document.getElementById('availabletimeslots').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#leadoppbyuserwisemonthlycount').change(function() {
                var reportname = document.getElementById('leadoppbyuserwisemonthlycount').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#losalespersonsegmentwise').change(function() {
                var reportname = document.getElementById('losalespersonsegmentwise').id;
                var datastring = 'report_name=' + reportname + ',';
                if (this.checked != true) {
                    //alert('not checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_delete'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });

                } else {
                    //alert('checked');
                    //alert(datastring);

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Dashboard/Report_settings_add'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert("working"+data);
                        },
                        error: function() {
                            alert('Error while request..2');
                        }
                    });
                }
            });
        });
    </script>
  

<script>
    $('#cmp_time_zone').select2();
    $('#cmp_currency').select2();
    $('#cmp_gst_applicable').select2();
    $('#interval_type_6').select2();
    $('#reminder_before_time_9').select2();
    $('#reminder_notify_by_12').select2({
        placeholder: 'Select Notify By'
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
<script>


$(document).ready(function(){
    var rescheduleTable = $('#myTimelineTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        // order: [[0, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        "drawCallback": function() {
                popoverOptions = {
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.my-popover-content').html();
                },
                placement: 'bottom',
                container: 'body',
                html: true,
                sanitize: false,
                // selector: '[data-toggle="popover"]',
            };
            $('.panel-button').popover(popoverOptions);

            $('.panel-button').click(function (e) {
                e.stopPropagation();
            });
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
            });
            }  
        // stateSave: true,
        // columnDefs: [
        //     {
        //         targets: -1,
        //         visible: true,
        //     }
        // ]
    } );

    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        rescheduleTable.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = rescheduleTable.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            rescheduleTable.column(i).visible(columnVisibility[i]);
        }
    }

    
});


$(document).ready(function(){
    var rescheduleTable = $('#myPrintingTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        // order: [[0, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        buttons: [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        drawCallback: function() {
                popoverOptions = {
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.my-popover-content').html();
                },
                placement: 'bottom',
                container: 'body',
                html: true,
                sanitize: false,
                // selector: '[data-toggle="popover"]',
            };
            $('.panel-button').popover(popoverOptions);

            $('.panel-button').click(function (e) {
                e.stopPropagation();
            });
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
            });
            }   
        // stateSave: true,
        // columnDefs: [
        //     {
        //         { "width": "10%", "targets": 0 }
        //     }
        // ]
    } );

    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        rescheduleTable.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = rescheduleTable.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            rescheduleTable.column(i).visible(columnVisibility[i]);
        }
    }

    
});

</script>

<script>

    $(document).ready(function () {
       
        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $(document).click(function (e) {
            if ($(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
    });

</script>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=print_section'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModaltimeline" tabindex="-1" aria-labelledby="successModaltimelineLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModaltimelineLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Timeline Setting Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=timeline_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalprinting" tabindex="-1" aria-labelledby="successModalprintingLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalprintingLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Printing Configuration Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=basic_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateconfirmationModal" tabindex="-1" aria-labelledby="deactivateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deactivateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with closing this Financial Year?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deactivateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateconfirmationModal" tabindex="-1" aria-labelledby="activateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="activateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with current Financial Year?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="activateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Closed successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=timeline_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Active successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=timeline_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=basic_setting'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalbasicsetting" tabindex="-1" aria-labelledby="successModalprofileLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalprofileLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Basic Setting Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=basic_setting'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Printing Configuration?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" id="delete_button_close" class="btn" onclick="updateUI_delete_button_close()"style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
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
    function deactivate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deactivateconfirmationModal').modal('show');
    };
    function activate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#activateconfirmationModal').modal('show');
    };
</script>

<script>
$(document).ready(function(e) 
{
  $("#deactivateForm").on('submit', (function(e) 
  {
    // alert("Hii");

    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/dashboard/deactivate'); ?>",
          cache: false,
          data: { "p_id": datastring },
          success: function(data) {
            $(function() {
              $("deactivateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#activateForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/dashboard/activate'); ?>",
          cache: false,
          data: { "p_id": datastring },
          success: function(data) {
            $(function() {
              $("activateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function Delete(element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };

    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
        $('#deleteconfirmationModal').modal('hide');

    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#deleteForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Settings/Delete'); ?>",
          cache: false,
          data: { "section_id": datastring },
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


