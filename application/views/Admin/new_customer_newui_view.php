<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    /* .dt-buttons {
        display: none;
    } */
    .dropdown-menu {
        left: 15% !important;
    }
    span.select2.select2-container.select2-container--default .select2-selection__rendered .select2-search .select2-search__field{
        width: 100% !important;
    }
    .select2-results .select2-results__options li:nth-child(1){
        display: none !important;
    }
    .select2-results__option.select2-results__option--highlighted
    {
        color: #fff;
        background-color: #2196f3;
    }
    .cursor-pointer .tooltipText{
        display: none;
    }
    .cursor-pointer:hover .tooltipText{
        display: block;
    }
    .list-icons-item .tooltipText{
        display: none;
    }
    .list-icons-item:hover .tooltipText{
        display: block;
    }
    table td{
        color: #000 !important;
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
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    .dot-light-blue{
        background-color: #00BCD4;
    }
    /* #employee_grid_data td:nth-child(6){
        width:200px !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;

    } */
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>
<div class="content-wrapper">
    <div class="content">
        <form class="form-vertical" id="UpdateDataChk" method="post">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <span class="span-py-10 white-text">Contact Management</span>
                    <div class="small-div contact text-right">
                        <button type="submit" class="btn p-0">
                            <a class="btn btn-link btn-float has-text"><i class="icon-pencil text-primary"><span class="left-padding">Update Field</i></span></a>
                        </button>
                        <!-- <a href='<?= base_url() ?>admin/Customer/add'><span class="span-py-10 white-text"><img class="white-icon small contact-icon" src="<?= base_url() ?>new-assets/assets/Images/whitenotes.png">Add</span></a> -->
                        <a href='<?= base_url() ?>admin/Customer/add'><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
                        <!-- <a  href='<?= base_url() ?>admin/Customer/add'><span class="span-py-10 white-text"><i class="icon-file-plus text-primary"></i>Add</span></a> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="employee_grid_data" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:80px;text-wrap:nowrap;"><input style="margin-right:10px;" class="selectall cursor-pointer" type="checkbox" id="selectAllChk" value = 0>#</th>
                                <th>Company Name</th>
                                <th>Contact Code</th>
                                <!-- <th>Contact Code2</th> -->
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Landline</th>
                                <th>Group</th>
                                <th>Location</th>
                                <!-- <th>Segment</th>
                                <th>Reference</th> -->
                                <th>Uploads</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>


<?php $this->load->view('Admin/includes/n-footer'); ?>

<div id="Add-New-Contact" class="modal fade" tabindex="1">
    <div class="modal-dialog modal-xl">
        <form class="form-vertical" id="CustomerForm" method="post">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Add New Contact</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">BASIC INFO</legend>
                        <div class="panel-body width-100">
                            <div class="col-md-12 dflex responsive">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-6" for="email">Contact Type</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="Primery" onclick="customertype(this.value)"></span><span class="padding-left">Primary</span></lable>
                                            </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="secondary" checked="" onclick="customertype(this.value)"></span><span class="padding-left">Secondary</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div id="Primery_display" style="display:none">
                                        <div class="form-group">
                                            <label> Contact Name :<span class="color-red">*</span></label>
                                            <input type="text" class="form-control" id="ordanizer_name" name="ordanizer_name" onkeyup="bind_mailing_name(this.value)" placeholder="Enter Contact name" maxlength="100">
                                        </div>
                                    </div>
                                    <div id="secondary_display">
                                        <div class="form-group">
                                            <label>Contact Name: <span class="color-red">*</span></label>
                                            <select class="form-control select2" name="parentid" id="parentid">
                                                <option value="">organization List</option>
                                                <?php foreach ($primary_customer->result() as $value21) { ?>
                                                    <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Mailing Name : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="mailing_name" placeholder="Enter Mailing name" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Contact Code : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="contact_code" maxlength="15">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">CONTACT DETAILS</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Contact Person : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person name" maxlength="50">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Mobile Number :<span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Alternate Number : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Enter contact alternate number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Landline Number :<span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="landline_number" name="landline_number" placeholder="Enter Landline Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Email ID : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter email" maxlength="35">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Alternate Email : </label>
                                        <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id" placeholder="Enter Alternate Email" maxlength="35">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select class="form-control select2" onChange="getstate(this.value);" name="country" id="addContryId">
                                            <option value="">Select Country</option>
                                            <?php foreach ($country_list as $value5) { ?>
                                                <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select name="state" id="state" class="select-search form-control">
                                            <option value="">Select state</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City : </label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Address : </label>
                                        <textarea class="form-control" name="address" placeholder="Enter Address" maxlength="200" col="5" row="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="email"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                                        <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch by google address" maxlength="200" readonly style="margin-top: -1.9%;" col="5" row="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Pin Code : </label>
                                        <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">TAXATION DETAILS</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label id= 'choose'>Registration Type :</label>
                                        <select class="select-search form-control" name="registration_type">
                                            <option value="">Select Registration Type</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Composition">Composition</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Unregistered">Unregistered</option>
                                            <option value="Unknown">Unknown</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>GST No. : </label>
                                        <input type="text" class="form-control" name="gstin" placeholder="Enter GST No." maxlength="15">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>PAN No. : </label>
                                        <input type="text" class="form-control" name="pan_no" placeholder="Enter Pan No.">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>TAN No. : </label>
                                        <input type="text" class="form-control" name="tan_no" placeholder="Enter Tan No.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">CALENDAR</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Date Of Birth : </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" readonly="" id="dob" name="dob">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Company Anniversay : </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Company Aniversary" readonly="" id="company_aniversary" name="company_aniversary">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Marriage Anniversary : </label>
                                        <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" readonly="" id="marriage_aniversary" name="marriage_aniversary">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">OTHER INFO</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Type :</label>
                                        <select name="type" id="type" class="select-search form-control">
                                            <option value="">Select Type</option>
                                            <?php foreach ($type_list as $value) { ?>
                                                <option value="<?= $value->type_id ?>"><?= $value->title; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Group : </label>
                                        <select name="group" id="group" class="select-search form-control">
                                            <option value="">Select Group</option>
                                            <?php
                                            foreach ($group_list as $value2) {
                                            ?>
                                                <option value="<?= $value2->group_id ?>"><?= $value2->group_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Business Segment : </label>
                                        <select name="business[]" id="business" multiple="multiple" class="form-control">
                                            <option value="">Select Business Segment</option>
                                            <?php
                                            foreach ($business_list as $value) {
                                            ?>
                                                <option value="<?= $value->business_id ?>"><?= $value->business_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Select Location : </label>
                                        <select name="location" id="location" class="select-search form-control">
                                            <option value="">Select Location</option>
                                            <?php
                                            foreach ($location_list as $value3) {
                                            ?>
                                                <option value="<?= $value3->location_id ?>"><?= $value3->location; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Credit Term : <sup style="color: red">*</sup></label>
                                        <select class="select-search form-control" name="credit_term">
                                            <option value="">Select Credit Term</option>
                                            <?php
                                            foreach ($credit_term as $row) {
                                            ?>
                                                <option value="<?= $row->credit_id ?>"><?= $row->credit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Notes : <sup style="color: red">*</sup></label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">ACCOUNT MANAGER</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Account Manager</label>
                                        <select data-placeholder="Select Account Manager" multiple="multiple" class="form-control select" name="account_manager[]" id="account_manager">>
                                            <option value="NA">NA</option>
                                            <?php foreach ($account_manager as $row) { ?>
                                                <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>



                    <fieldset class="form-filedset email">
                        <legend class="field bulk-email">ACCESS CREDENTIALS</legend>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Password : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="password" placeholder="Enter Password" maxlength="35">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Confirm Password : <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="icon-user" style="zoom:1.1; "></i>
                    &nbsp;Edit Contact </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="complaint_model_data1">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="get_account_manager" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> 
                    Account Manager </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="account_manager_model_data">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="get_document_details" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Uploaded Document</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="document_details_model_data">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="get_account_manager_no_data" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Account Manager </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" border="1">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center"> Account Manager </th>
                            </tr>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Name</th>
                            </tr>
                        </thead>
                        <tbody id="stageData">
                            <tr>
                                <td colspan="3" class="text-center" style="color:red;"><b>No Data Found</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="googlemapmodalAdd" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="fa-fa-map" style="zoom:1.1; "></i>
                    &nbsp;Search Google Address </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
                    <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; border: 2px solid #009FDF;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->

<div id="ImportContact_modal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="icon-file-excel" style="zoom:1.1; "></i>
                    &nbsp;Import Contact </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                            <div class="col-md-12 col-md-offset-3">
                                                <div class="input-group">
                                                    <input type="file" class="form-control mr-2" name="excel">
                                                    <button class="red-btn text-right m-auto">
                                                        <span class="label label-danger text-right"><a class="text-white" href="<?= base_url() ?>assets/ExcelSheet/sample.xlsx"><i class=" icon-download"></i>&nbsp;Download Sample File</a></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br /> <br />
                                <div align="right">
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

<div id="schedule_model" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Task </h6>
                <button type="button" class="close" onclick="updateUI_add_task_button_close()" id="add_task_button_close">&times;</button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div id="add_activity_data"></div>
            </div>
        </div>
    </div>
</div>

<div id="reminder_model" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Reminder </h6>
                <button type="button" class="close" onclick="updateUI_add_reminder_button_close()" id="add_reminder_button_close">&times;</button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <div id="add_reminder_data"></div>
            </div>
        </div>
    </div>
</div>


<div id="update_field_model" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> Bulk Action For <span id="countRecords"></span> Records </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="overflow-y: auto; max-height: 550px;">
                <form id="updateFiledData" method="post">
                    <input type="hidden" name="custome_id" id="custome_id">
                    <div class="panel panel-flat">
                        <div class="panel-body" style="padding: 5px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Field <sup style="color: red">*</sup></label>
                                    <select class="select2 form-control" onchange="getFieldChange(this.value);" name="UpdateFieldChange" id="UpdateFieldChange">
                                        <option value="">Select Field</option>
                                        <option value="account_manager">Account Manager</option>
                                        <option value="location">Location</option>
                                        <option value="segment">Segment</option>
                                        <option value="group">Group</option>
                                        <option value="credit_terms">Credit Term</option>
                                        <option value="country">Country</option>
                                        <option value="state">State</option>
                                        <option value="city">City</option>
                                        <option value="registration_type">Registration Type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="account_manager_edit" style="display: none;">
                                <div class="form-group">
                                    <label>Account Manager <sup style="color: red">*</sup></label>
                                    <select class="form-control select-search" name="account_manager[]" id="account_manager_update" multiple="multiple" placeholder="Select Account Manager" style="width: 100% !important;">
                                        <option value="">Select Account Manager</option>
                                        <option value="NA">NA</option>
                                        <?php
                                        foreach ($account_manager as $row) {
                                        ?>
                                            <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="accountmanagerchk"style="color: red; display: none; font-size: 80%; font-weight: 400;" >Please Select Account Manager</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="location_update" style="display: none;">
                                <div class="form-group">
                                    <label>Select Location <sup style="color: red">*</sup></label>
                                    <select name="location" id="location_update1" class="select2 form-control">
                                        <option value="">Select Location</option>
                                        <?php
                                        foreach ($location_list as $value3) {
                                        ?>location_update
                                            <option value="<?= $value3->location_id ?>"><?= $value3->location; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="locationchk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Location</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="segment_update" style="display: none;">
                                <div class="form-group">
                                    <label>Business Segment <sup style="color: red">*</sup></label>
                                    <select name="segment[]" id="business_update" multiple="multiple" class="form-control" data-placeholder="Select Business Segment">
                                        <option value="">Select Business Segment</option>
                                        <?php
                                        foreach ($business_list as $value) {
                                        ?>
                                            <option value="<?= $value->business_id ?>"><?= $value->business_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="segmentchk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Business Segment</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="group_update" style="display: none;">
                                <div class="form-group">
                                    <label>Group <sup style="color: red">*</sup></label>
                                    <select class="select2 form-control" name="group" id="group1">
                                        <option value="">Select Group</option>
                                        <?php
                                        foreach ($group_list as $value2) {
                                        ?>
                                            <option value="<?= $value2->group_id ?>"><?= $value2->group_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="groupchk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Group</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="credit_terms_update" style="display: none;">
                                <div class="form-group">
                                    <label>Credit Term <sup style="color: red">*</sup></label>
                                    <select class="select2 form-control" name="credit_terms" id="credit_terms">
                                        <option value="">Select Credit Term</option>
                                        <?php
                                        foreach ($credit_term as $row) {
                                        ?>
                                            <option value="<?= $row->credit_id ?>"><?= $row->credit_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="credittermchk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Credit Term</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="country_update" style="display: none;">
                                <div class="form-group">
                                    <label>Country <sup style="color: red">*</sup></label>
                                    <select class="select2 form-control country" name="country" id="countryId">
                                        <option value="">Select Country</option>
                                        <?php
                                        foreach ($country_list as $value5) {
                                        ?>
                                            <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="countrychk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Country</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="state_update" style="display: none;">
                                <div class="form-group">
                                    <label>State <sup style="color: red">*</sup></label>
                                    <select class="select2 form-control" name="state" id="state1">
                                        <option value="">Select state</option>
                                        <?php
                                        foreach ($state_list as $value5) {
                                        ?>
                                            <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small id="statechk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select State</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="city_update" style="display: none;">
                                <div class="form-group">
                                    <label>City <sup style="color: red">*</sup></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50">
                                    <small id="citychk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Enter City</small>
                                </div>
                            </div>
                            <div class="col-md-12" id="registration_type_update" style="display: none;">
                                <div class="form-group">
                                    <label>Registration Type <sup style="color: red">*</sup> </label>
                                    <select class="select2 form-control" name="registration_type" id="registration_type">
                                        <option value="">Select Registration Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Composition">Composition</option>
                                        <option value="Consumer">Consumer</option>
                                        <option value="Unregistered">Unregistered</option>
                                        <option value="Unknown">Unknown</option>
                                    </select>
                                    <small id="registrationchk"style="color: red; display: none;font-size: 80%;font-weight: 400;" >Please Select Registration Type</small>
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary" id="updateBtn"> Update <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $('#parentid').select2({
        dropdownParent: $("#Add-New-Contact")
    });

    $('#addContryId').select2();

    // $('.selectall').click(function(e) {
    //     alert('e');

    //     if ($('#selectAllChk').attr('checked', true)) 
    //     {
    //         // alert('checkbox');
    //         // $('input[type=checkbox]').attr('checked', true);
    //         // return false;  
    //         $(this).closest('table').find('tbody tr td input:checkbox').prop('checked', true);
    //         return false;
    //     } 
    //     else
    //     {
    //         alert('checkbox 12');
    //     }
        
    // });

    $('.selectall').click(function(e) 
    {
        if($(this).val() == 0)
        {
            $('input[type=checkbox]').prop('checked', true);
            $('#selectAllChk').val(1);
            return false;
        }
        else
        {
            $('input[type=checkbox]').prop('checked', false);
            $('#selectAllChk').val(0);
            return false;
        }
    });


    $(".js-example-placeholder-multiple").select2({
    placeholder: "Select Account Manager"
    });


    // $('#selectAllChk').on('click', function(e){
    //     alert("Hii");
    //     // var rows = table.rows({ 'search': 'applied' }).nodes();
    //     // alert(rows);
    //     if (this.checked)
    //     {
    //         alert("if");
        
    //     $(this).closest('table').find('tbody tr td input:checkbox').prop('checked', this.checked);
    //     return false;

    //     $('input[type="checkbox"]:not(:disabled)', rows).prop('checked', true);
    //     $('.updateFiled').prop('disabled', false);
    //     } 
    //     else 
    //     {
    //         alert("else");
    //     $('input[type="checkbox"]:not(:disabled)', rows).prop('checked', false);
    //     $(this).closest('table').find('tbody tr td input:checkbox').prop('checked', this.checked);
    //     $('.updateFiled').prop('disabled', true);
    //     }

    // });
        // $(document).on('change', '.row-select', function () {
        // // $('.row-select').on('click', function(){
        // if (this.checked) {
        // //$('input[type="checkbox"]', rows).prop('checked', true);

        // // $('#payAll').prop('disabled', false);
        // var totalRecords = $('#totalRecords').val();

        // var array = [];

        // table.$('input.row-select:checked').each(function() {
        // var str = $(this).val();
        // var parts = str.split('/');
        // array.push(parts[0]);
        // });

        // if(totalRecords == array.length){
        // $('#selectAll').prop('checked', true);
        // }
        // $('#payAll').prop('disabled', false);

        // } else {
        // //$('input[type="checkbox"]', rows).prop('checked', false);
        // // $('#payAll').prop('disabled', true);
        // $('#selectAll').prop('checked', false);

        // var array = [];

        // table.$('input.row-select:checked').each(function() {
        // var str = $(this).val();
        // var parts = str.split('/');
        // array.push(parts[0]);
        // });

        // if(array.length == 0){
        // $('#payAll').prop('disabled', true);
        // }
        // else{
        // $('#payAll').prop('disabled', false);
        // }
        // }
    
    

    

    function getFieldChange(id) {
        if (id == 'account_manager') {
            $('#account_manager_edit').show();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').hide();
        } else if (id == 'location') {

            $('#account_manager_edit').hide();
            $('#location_update').show();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').hide();

        } else if (id == 'segment') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').show();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').hide();

        } else if (id == 'group') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').show();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').hide();

        } else if (id == 'credit_terms') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').show();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').hide();

        } else if (id == 'country') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').show();
            $('#state_update').hide();
            $('#city_update').hide();

        } else if (id == 'state') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').show();
            $('#city_update').hide();
            $('#registration_type_update').hide();

        } else if (id == 'city') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').show();
            $('#registration_type_update').hide();
        } else if (id == 'registration_type') {

            $('#account_manager_edit').hide();
            $('#location_update').hide();
            $('#segment_update').hide();
            $('#group_update').hide();
            $('#credit_terms_update').hide();
            $('#country_update').hide();
            $('#state_update').hide();
            $('#city_update').hide();
            $('#registration_type_update').show();
        }

    }

    $(document).ready(function() {
        $('#business_update').select2({
            placeholder: "Select Business Segment"
        });
        $('#account_manager_update').select2({
            placeholder: "Select Account Manager"
        });
    });

    $("#UpdateDataChk").on('submit', (function(e) {
        // e.preventDefault();
        if (e.isDefaultPrevented()) {
            // alert('invalid');
            // return false;
        } else {
            $.ajax({
                url: "<?= base_url(); ?>admin/Customer/Demo",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    response = JSON.parse(data);

                    if (response.count == 0) {
                        $(function() {
                            // new PNotify({
                            //     title: 'Bulk Action',
                            //     text: 'Select Atleast One Contact.',
                            //     type: 'warning'
                            // });
                            $('#BulkactionalertModal').modal('show');
                        });
                    } else {
                        $('#update_field_model').modal('show');
                        $('#custome_id').val(response.customer_id);
                        $('#countRecords').html(response.count);
                    }
                },
                error: function() {
                    $(function() {
                        // new PNotify({
                        //     title: 'Register Form',
                        //     text: 'Failed to load page',
                        //     type: 'warning'
                        // });
                        $('alertModal').modal('show');
                    });
                }
            });
        }
        return false;

    }));

    $(document).ready(function() {
        $('#updateFiledData').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                UpdateFieldChange: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Field'
                        }
                    }
                },
                // location: {
                //     require : function(element)
                //     {
                        
                //     }
                    
                // }

            }
        });
    });

    $("#updateFiledData").on('submit', (function(e) {
        // e.preventDefault();
        
        
        
        if (e.isDefaultPrevented()) 
        {
            // alert('invalid');
            // return false;
        } 
        else 
        {
            if($('#UpdateFieldChange').val() == '')
            {
                // alert('NULL');
            }
            else
            {
                // alert("Hii");

                // if($('#account_manager_edit').show())
                // {
                    if($('#account_manager_update').val() == '')
                    {
                        $("#accountmanagerchk").show();  
                    }
                    
                    else
                    {
                        $("#accountmanagerchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#location_update').show())
                // {
                    if($('#location_update1').val() == '')
                    {
                        $("#locationchk").show();
                    }
                    else
                    {
                        $("#locationchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#segment_update').show())
                // {
                    if($('#business_update').val() == '')
                    {
                        $("#segmentchk").show();
                    }
                    else
                    {
                        $("#segmentchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#group_update').show())
                // {
                    if($('#group1').val() == '')
                    {
                        $("#groupchk").show();
                    }
                    else
                    {
                        $("#groupchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#credit_terms_update').show())
                // {
                    if($('#credit_terms').val() == '')
                    {
                        $("#credittermchk").show();
                    }
                    else
                    {
                        $("#credittermchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#country_update').show())
                // {
                    if($('#countryId').val() == '')
                    {
                        $("#countrychk").show();
                    }
                    else
                    {
                        $("#countrychk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#state_update').show())
                // {
                    if($('#state1').val() == '')
                    {
                        $("#statechk").show();
                    }
                    else
                    {
                        $("#statechk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#city_update').show())
                // {
                    if($('#city').val() == '')
                    {
                        $("#citychk").show();
                    }
                    else
                    {
                        $("#citychk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
                // else if( $('#registration_type_update').show())
                // {
                    if($('#registration_type').val() == '')
                    {
                        $("#registrationchk").show();
                    }
                    else
                    {
                        $("#registrationchk").hide();
                        $.ajax({
                        url: "<?= base_url(); ?>admin/Customer/updateFiledData",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                            success: function(data) {
                                var count = $('#countRecords').html();
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Bulk Action',
                                    //     text: data + ' Updated Successfully For ' + count + ' Contact',
                                    //     type: 'success'
                                    // });
                                    var str = data + ' Updated Successfully For '  + count + ' Contact'; 
                                    $('#UpdatesuccessModal').modal('show');
                                    $("#modal_body").html(str); 
                                });
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/Customer'); ?>";
                                // }, 3000);
                            },
                            error: function() {
                                $(function() {
                                    // new PNotify({
                                    //     title: 'Register Form',
                                    //     text: 'Failed to load page',
                                    //     type: 'warning'
                                    // });
                                    $('#alertModal').modal('show');
                                });
                            }
                        });
                    }
                // }
            
            }
            
            
        }
        return false;

    }));
</script>

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

    $(document).ready(function(e) {
        $("#upload_doc_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Customer/ImportContacts') ?>',
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
                                title: 'Import Contact',
                                text: 'Imported  Successfully !!',
                                type: 'success'
                            });
                        });


                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Customer'); ?>";
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

<script type="text/javascript">
    function customertype(val) {

        if (val == 'secondary') {
            $('#Primery_display').hide();
            $('#secondary_display').show();
        } else {
            $('#secondary_display').hide();
            $('#Primery_display').show();
        }
    }

    function ImportContact() {
        $("#ImportContact_modal").modal({
            backdrop: "static"
        });
    }
</script>

<script type="text/javascript">
    $("#dob").on("dp.change", function(e) {
        $('#CustomerForm').bootstrapValidator('revalidateField', 'dob');
    });
</script>


<script type="text/javascript">
    var param1var = getQueryVariable("param1");

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        if (query == 'customer=add') {
            //alert(query);
            // $("#useractivate").modal('show');
            $("#customer_model").modal({
                backdrop: "static"
            });
        }
    }
</script>
<!--========================== / Date picker javascript ====================================-->

<script type="text/javascript">
    function bind_mailing_name(value) {
        $("#mailing_name").val(value);
    }

    function open_google_map_add() {
        $("#googlemapmodalAdd").modal('show');
        initializeadd();
    }

    function initializeadd() {
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
                                // document.getElementById("address2").value = location_name;
                                document.getElementById("google_address").value = location_name;
                                document.getElementById("g_lat").value = lat;
                                document.getElementById("g_long").value = lng;
                                $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                $("#googlemapmodalAdd").modal('hide');
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


    // google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
    function get_city(lat, long) {
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
                        document.getElementById('city').value = city;
                        $('#CustomerForm').bootstrapValidator('revalidateField', 'city');
                    } else {
                        alert("address not found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            }
        );
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
    $(document).ready(function() {
        var groupColumn = 1;
        var rescheduleTable = $('#employee_grid_data').DataTable({
            "bProcessing": true,
            "serverSide": true,
            "stateSave": true,
            // "lengthMenu": [
            //     [10, 25, 50, 100, 500, 1000, 1500, -1],
            //     [10, 25, 50, 100, 500, 1000, 1500, "All"]
            // ],
            "columnDefs": [{
                visible: false
            }],

            "language": {
                "search": "Filter: ",
                "searchPlaceholder": "Type to filter..."
            },
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

            $('[rel="tooltip"]').tooltip();
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
            } ,
            "ajax": {
                url: "<?php echo base_url('admin/Customer/EmployeeAjaxData'); ?>",
                type: "post",
                error: function() {
                    $("#employee_grid_processing").css("display", "none");
                },
            },
           
            
             
        });

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

    function get_account_manger(id) {
        var datastring = 'customerid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/get_account_manger'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#get_account_manager').modal('show');
                $('#account_manager_model_data').html(data);

            },
            error: function() {
                // alert('Error while request..');
                $('#get_account_manager_no_data').modal('show');
                // $('#account_manager_model_data').html(data);
                // $('#errorwhilerequestModal').modal('show');
            }
        });
    }

    function document_count(id) {
        var datastring = 'customerid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/document_details'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#get_document_details').modal('show');
                $('#document_details_model_data').html(data);

            },
            error: function() {
                // alert('Error while request..');
                $('#get_document_details').modal('show');
                $('#document_details_model_data').html(data);
                // $('#account_manager_model_data').html(data);
                // $('#errorwhilerequestModal').modal('show');
            }
        });
    }



</script>


<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#CustomerForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                ordanizer_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Organizer Name'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Address'
                        }
                    }
                },

                parentid: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Organizer Name'
                        }
                    }
                },



                custtype: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Customer Type'
                        }
                    }
                },

                contact_person: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact Person Name'
                        }
                    }
                },

                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Password'
                        }
                    }
                },

                notes: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Notes'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Password'
                        },
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Password'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },


                registration_type: {
                    validators: {
                        notEmpty: {
                            message: 'Registration type required'
                        }
                    }
                },

                credit_term: {
                    validators: {
                        notEmpty: {
                            message: 'Credit Term required'
                        }
                    }
                },
                account_manager: {
                    validators: {
                        notEmpty: {
                            message: 'Account Manager required'
                        }
                    }
                },

                city: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter City Name'
                        }
                    }
                },

                country: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Country'
                        }
                    }
                },

                state: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select State '
                        }
                    }
                },

                contact_number1: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact number'
                        }
                    }
                },

                email_id: {
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
    $(document).ready(function(e) {

        $("#CustomerForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/Add_customer'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        $(function() {
                            new PNotify({
                                title: 'Add Contact',
                                text: 'Contact Information Added Successfully !!',
                                type: 'success'
                            });
                        });

                        var param1var = getQueryVariable("param1");

                        function getQueryVariable(variable) {
                            var query = window.location.search.substring(1);
                            if (query == 'customer=add') {
                                setTimeout(function() {
                                    window.location = "<?php echo base_url('admin/Tracking/add_location'); ?>";
                                }, 1000);
                            } else {
                                setTimeout(function() {
                                    window.location = "<?php echo base_url('admin/Customer'); ?>";
                                }, 1000);
                            }
                        }
                    },
                    error: function() {
                        $(function() {
                            new PNotify({
                                title: 'Register Form',
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


<!--  -->
<script>
    function getstate(val) {
        // alert(val);

        $.ajax({
            type: "POST",
            url: '<?php echo base_url('admin/Customer/getstate') ?>',
            data: 'country_id=' + val,
            success: function(data) {
                // alert(data);
                $("#state").html(data);
                $("#state").select2();
            }
        });
    }
</script>
<!--  -->

<!-- Password Match -->

<script type="text/javascript">
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Password Match').css('color', 'green');
            document.getElementById("btn_hide").disabled = false;
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            document.getElementById("btn_hide").disabled = true;
        }
    });
</script>

<!-- /Password Match -->

<!--=======================================  delete Event  ==========================================-->

<script>
    function del_customer(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Contact?</p>',
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

            var datastring = 'customerid=' + id;
            // alert(datastring);
            // return
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Customer/delete_customer'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Contact',
                            text: 'Contact Information Deleted successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Customer'); ?>";
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
</script>


<script type="text/javascript">
    // var url = "<?php //echo base_url(); 
                    ?>";

    // function delete(id) {
    //   var r = confirm("Do you want to delete this?")
    //   if (r == true)
    //     window.location = url + "user/deleteuser/" + id;
    //   else
    //     return false;
    // }
</script>


<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_customer(id) {
        var datastring = 'customerid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/edit_customer'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });
    }

    function add_activity(id) {
        var datastring = 'customerid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/add_activity'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#schedule_model').modal('show');
                $('#add_activity_data').html(data);
                $(".popover-body").css('display','none');

            },
            error: function() {
                alert('Error while request...');
            }
        });
    }
    function updateUI_add_task_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#add_task_button_close').attr('data-dismiss', 'modal');
        location.reload();
    }


    function add_reminder(id) {
        var datastring = 'customer_id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/add_reminder'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#reminder_model').modal('show');
                $('#add_reminder_data').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request...');
            }
        });
    }
    function updateUI_add_reminder_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#add_reminder_button_close').attr('data-dismiss', 'modal');
        location.reload();
    }
</script>

<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#business').select2({
            placeholder: "Select Business Segment"
        });
        $('#account_manager').select2({
            placeholder: "Select Account Manager"
        });
    });
    // jQuery('#business').multiselect({
    //   enableFiltering: true,
    //   maxHeight: 400,
    //   enableCaseInsensitiveFiltering: true,
    //   nonSelectedText: 'Select business segment',
    //   numberDisplayed: 10,
    //   selectAll: false,
    //   onChange: function(option, checked) {
    //     // Get selected options.
    //     var selectedOptions = jQuery('#business option:selected');

    //     if (selectedOptions.length >= 10) {
    //       // Disable all other checkboxes.
    //       var nonSelectedOptions = jQuery('#business option').filter(function() {
    //         return !jQuery(this).is(':selected');
    //       });

    //       nonSelectedOptions.each(function() {
    //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //         input.prop('disabled', true);
    //         input.parent('li').addClass('disabled');
    //       });

    //       new PNotify({
    //         title: 'Message',
    //         text: 'Please Select only 10 business segment',
    //         type: 'warning'
    //       });
    //     } else {
    //       // Enable all checkboxes.
    //       jQuery('#business option').each(function() {
    //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //         input.prop('disabled', false);
    //         input.parent('li').addClass('disabled');
    //       });
    //     }
    //   }
    // });

    // jQuery('#account_manager').multiselect({
    //   enableFiltering: true,
    //   maxHeight: 400,
    //   enableCaseInsensitiveFiltering: true,
    //   nonSelectedText: 'Select Account Manager',
    //   numberDisplayed: 10,
    //   selectAll: false,
    //   onChange: function(option, checked) {
    //     // Get selected options.
    //     var selectedOptions = jQuery('#account_manager option:selected');

    //     if (selectedOptions.length >= 10) {
    //       // Disable all other checkboxes.
    //       var nonSelectedOptions = jQuery('#account_manager option').filter(function() {
    //         return !jQuery(this).is(':selected');
    //       });

    //       nonSelectedOptions.each(function() {
    //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //         input.prop('disabled', true);
    //         input.parent('li').addClass('disabled');
    //       });

    //       new PNotify({
    //         title: 'Message',
    //         text: 'Please Select only 10 Account Manager',
    //         type: 'warning'
    //       });
    //     } else {
    //       // Enable all checkboxes.
    //       jQuery('#account_manager option').each(function() {
    //         var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //         input.prop('disabled', false);
    //         input.parent('li').addClass('disabled');
    //       });
    //     }
    //   }
    // });


    /*Add This to Block SHIFT Key*/
    var shiftClick = jQuery.Event("click");
    shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
            //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        } else {
            //alert('No shift hey');
        }
    });
</script>
<!-- ====================================================================================================================== -->
<script type="text/javascript">
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
                            '<tr class="group" id="' + i + '"><td colspan="10" style="padding: 15px 20px !important;">' + group + '</td></tr>'
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

<div class="modal fade" id="BulkactionalertModal" tabindex="-1" aria-labelledby="BulkactionalertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="BulkactionalertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Warning!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Select Atleast One Contact</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="errorwhilerequestModal" tabindex="-1" aria-labelledby="errorwhilerequestModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="errorwhilerequestModal" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Warning!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" id="modal_body" style="font-size: 18px;text-align: center;"></div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Customer'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Contact?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletecontactForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
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
                <a href="<?php echo base_url('admin/Customer'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#UpdateFieldChange').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });

   $('#location_update1').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });
   $('#group1').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });
   $('#credit_terms').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });
   $('#countryId').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });
   $('#state1').select2({
        tags: true,
		dropdownParent: $("#update_field_model")
   });

   $('#registration_type').select2({
        tags: true,
		dropdownParent: $("#update_field_model"),
        closeOnSelect: true
   });

    $(document).ready(function(){
    $('[rel="tooltip"]').tooltip();   
    });

   function DeleteList (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        $('#deleteconfirmationModal').modal('hide');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
    }

    $(document).ready(function(e) 
{
  $("#deletecontactForm").on('submit', (function(e) 
  {
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
          url: "<?php echo base_url('admin/Customer/delete_customer'); ?>",
          cache: false,
          data: { "customerid": datastring },
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
            $("errorwhilerequestModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
    // if($('#UpdateFieldChange').val() == 'account_manager')
    // {
        // if($('#account_manager_edit').show())
        // {
            $(document).on('change','#account_manager_update',function()
            {
                $("#accountmanagerchk").hide();
                $("#updateBtn").attr('disabled', false);
                $("#updateBtn").attr('enable', true);
            });
        // }
    // }
    
    
    // if($('#UpdateFieldChange').val() == 'location')
    // {
        $(document).on('change','#location_update1',function()
        {
            $("#locationchk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }

    // if($('#UpdateFieldChange').val() == 'segment')
    // {
        $(document).on('change','#segment_update',function()
        {
            $("#segmentchk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }

    // if($('#UpdateFieldChange').val() == 'group')
    // {
        $(document).on('change','#group_update',function()
        {
            $("#groupchk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }

    // if($('#UpdateFieldChange').val() == 'credit_terms')
    // {
        $(document).on('change','#credit_terms_update',function()
        {
            $("#credittermchk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }


    // if($('#UpdateFieldChange').val() == 'country')
    // {
        $(document).on('change','#country_update',function()
        {
            $("#countrychk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }


    // if($('#UpdateFieldChange').val() == 'state')
    // {
        $(document).on('change','#state_update',function()
        {
            $("#statechk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }

    // if($('#UpdateFieldChange').val() == 'city')
    // {
        $(document).on('change','#city_update',function()
        {
            $("#citychk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }

    // if($('#UpdateFieldChange').val() == 'registration_type')
    // {
        $(document).on('change','#registration_type_update',function()
        {
            $("#registrationchk").hide();
            $("#updateBtn").attr('disabled', false);
            $("#updateBtn").attr('enable', true);
        });
    // }
    
</script>

<script>
    $("#options option").click(function()
    {
        $("#choose").text($(this).text());
        $(this).parent().hide();
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

<script>
    $(document).ready(function() {
            // Initialize DataTable
            var table = $('#employee_grid_data').DataTable();

            $('.dataTables_filter input[type="search"]').val('').trigger('keyup');
            
            // Clear column filters if any exist
            table.columns().every(function() {
                var column = this;
                column.search('');
            });

            table.draw();
            
        });
</script>


