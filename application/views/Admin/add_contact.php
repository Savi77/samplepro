<?php $this->load->view('Admin/includes/n-header'); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<style>
    .select2-search__field{
        cursor: pointer !important;
    }
    
</style>
<div class="content-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Add Contact</span>
            </div>

            <form class="form-vertical" id="CustomerForm" method="post" enctype="multipart">
                <fieldset class="form-filedset email min-height-200">
                    <legend class="field bulk-email">Basic Info</legend>
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
                                        <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="primary" onclick="customertype(this.value)"></span><span class="padding-left">Primary</span></lable>
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
                                        <label> Contact Name <span class="color-red">*</span></label>
                                        <input type="text" class="form-control" id="ordanizer_name" name="ordanizer_name" onkeyup="bind_mailing_name(this.value)" placeholder="Enter Contact name" maxlength="100">
                                    </div>
                                </div>
                                <div id="secondary_display">
                                    <div class="form-group">
                                        <label>Contact Name <span class="color-red">*</span></label>
                                        <select class="form-control select2" name="parentid" id="parentid">
                                            <option value="">Select Company Name</option>
                                            <?php foreach ($primary_customer->result() as $value21) { ?>
                                                <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mailing Name <span class="color-red">*</span></label>
                                    <input type="text" class="form-control" name="mailing_name" id="mailing_name" placeholder="Enter Mailing Name" maxlength="100">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?php
                                    $contact_type = $this->db->select('contact_code_id')->from('tbl_organisation')->where('org_id', $this->session->org_id)->get()->row()->contact_code_id;
                                    if(!empty($contact_type))
                                    {
                                        if($contact_type == 1)
                                        {
                                        ?>
                                            <label>Contact Code</label>
                                            <input type="text" class="form-control" name="contact_code" id="contact_code" maxlength="15" placeholder="Enter Contact Code">
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Contact Details</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Contact Person <span class="color-red">*</span></label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label" for="email">Mobile Number <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Enter Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="control-label" for="email">Alternate Number</label>
                                <input type="text" class="form-control" id="contact_number2" name="contact_number2"
                                    placeholder="Enter Alternate Number"
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
                                    maxlength="15" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="control-label" for="email">Landline Number</label>
                                <input type="text" class="form-control" id="landline_number" name="landline_number"
                                    placeholder="Enter Landline Number"
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
                                    maxlength="15" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label" for="email">Email ID <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email" maxlength="35" onkeyup="credentialTitle(this.value)">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="control-label" for="email">Alternate Email</label>
                                <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id"
                                    placeholder="Enter Alternate Email" maxlength="35">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Country <span class="color-red">*</span></label>
                                    <select class="form-control select2" onChange="getstate(this.value);" name="country" id="addContryId">
                                        <option value="">Select Country</option>
                                        <?php foreach ($country_list as $value5) { ?>
                                            <option value="<?= $value5->id ?>"><?= $value5->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>State <span class="color-red">*</span></label>
                                    <select name="state" id="state" class="form-control" data-placeholder="Select state">
                                        <option value="">Select state</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City <span class="color-red">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Address <span class="color-red">*</span></label>
                                    <textarea class="form-control" name="address" id="getaddress" placeholder="Enter Address" maxlength="200" col="5" row="3" onkeyup="latitudelogitude(this.value);"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Pincode </label>
                                    <textarea type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode" maxlength="6"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" style="margin-bottom:6px;"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                                    <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch By Google Eddress" maxlength="200" readonly col="5" row="3"></textarea>

                                    <input type="hidden" name="g_lat" id="g_lat">
                                    <input type="hidden" name="g_long" id="g_long">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Calendar</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date Of Birth </label>
                                    <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Date Of Birth" readonly="" id="dob" name="dob">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Company Anniversay </label>
                                    <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Company Anniversary" readonly="" id="company_aniversary" name="company_aniversary">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Marriage Anniversary </label>
                                    <input type="text" class="form-control pickadate-accessibility rounded-right picker__input picker__input--active" placeholder="Select Marriage Anniversary" readonly="" id="marriage_aniversary" name="marriage_aniversary">
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Other Info</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Contact Type </label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Contact Type</option>
                                        <?php foreach ($type_list as $value) { ?>
                                            <option value="<?= $value->type_id ?>"><?= $value->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Group </label>
                                    <select name="group" id="group" class="form-control">
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
                                    <label>Business Segment </label>
                                    <select data-placeholder="Select Segment" class="form-control" name="business[]" id="business"  multiple>
                                        <option value="" >Select Segment</option>
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
                                    <label>Location </label>
                                    <select name="location" id="location" class="form-control">
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
                                    <label>Credit Term </label>
                                    <select class="form-control" name="credit_term" id="credit_term">
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
                                    <label>Notes </label>
                                    <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Connection</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Account Manager</label>
                                    <select data-placeholder="Select Account Manager" class="form-control" data-fouc multiple name="account_manager[]" id="account_manager">
                                        <option value="">Select Account Manager</option>
                                        <?php foreach ($account_manager as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Referred By</label>
                                    <select data-placeholder="Select Reference" class="form-control" name="reference" id="reference">
                                        <option value="">Select Reference</option>
                                        <?php foreach ($primary_customer->result() as $value21) { ?>
                                            <option value="<?= $value21->customer_id ?>"><?= $value21->company_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email">
                    <legend class="field bulk-email">Reference Documents</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Document </label>
                                    <input type="file" style="padding:4px;" class="form-control" name="document[]" id="document" multiple>

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-filedset email">
                    <legend class="field bulk-email" style="max-height: max-content;"><p id="getemailidsend" style="margin-left: 10px;margin-right: 10px;">Access Credentials</p></legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Password</label>
                                    <!-- <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" maxlength="35"> -->
                                    <div class="shbtn" id="show_hide_password" style="display: flex;">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" maxlength="35" value="buro123">
                                        <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                            <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Confirm Password</label>
                                    <!-- <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password"> -->
                                    <div class="shbtn" id="show_hide_cpassword" style="display: flex;">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="buro123">
                                        <div class="input-group-addon" style="padding:5px 13px 5px 14px;">
                                            <a><i class="icon-eye-blocked" aria-hidden="true" style="background: #1e6196;color: #fff;padding: 6px;font-size: 13px;border: 1px solid;border-radius: 4px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                

                <div class="col-sm-12 text-right mb-3" style="padding-left:20px; padding-right:20px;">
                    <button type="submit" class="btn btn-primary" id="btn_hide"> Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhz3ogOGaScW-hw70pr1Glx70Q0KO_lMI&v=3.exp&signed_in=true&libraries=places"></script>


<div id="googlemapmodalAdd" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="fa-fa-map" style="zoom:1.1; "></i>
                    &nbsp;Search Google Address </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" style="position:relative;">
                    
                    <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" /><a onclick="getredmark()"><i class="fa fa-magnifying-glass" style="right: 12px;top: 11px;position: absolute;"></i>
                    </a>
                    <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; border: 2px solid #009FDF;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="multiselect-dropdown.js" ></script> -->

<script>
$(document).on('select2:open', () => {
    // $('.select2-search__field input').prop('focus', 0);
    document.querySelector('.select2-search__field').focus();
});

$('#parentid').select2({
    placeholder: 'Select Company Name',
    
});

$('#addContryId').select2({
    placeholder: 'Select Country'
});

$('#state').select2({
    placeholder: 'Select State'
});

$('#type').select2({
    placeholder: 'Select Contact Type'
});

$('#registration_type').select2();

$('#group').select2({
    placeholder: 'Select Group'
});

$('#business').select2({
    placeholder: 'Select Segment'
});

$('#location').select2({
    placeholder: 'Select Location'
});

$('#credit_term').select2({
    placeholder: 'Select Credit Term'
});
$('#account_manager').select2();

$('#reference').select2();

$('.select2-selection__rendered').hover(function () {
    $(this).removeAttr('title');
});


$("ul.select2-selection__rendered").hover(function(){
  $(this).find('li').removeAttr('title');
});


$(".select2-container--default").tooltip({
    title: function() {
        return $(this).prev().attr("title");
    },
    placement: "auto",
    //container: 'body'
});

    function customertype(val) {
        if (val == 'secondary') {
            $('#Primery_display').hide();
            $('#secondary_display').show();
        } else {
            $('#secondary_display').hide();
            $('#Primery_display').show();
        }
    }

    function companycode(val)
    {
        if (val == 'customcode') {
            $('#custCode').show();
        } else {
            $('#custCode').hide();
        }
    }


    function bind_mailing_name(value) {
        $("#mailing_name").val(value);
    }

    function credentialTitle(value) 
    {
        $("#getemailidsend").text('Access Credential For - ' + value);
        email_id = value;
       
        var datastring = 'email_id=' + email_id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Users/check_existmail_add'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    if (data == 1) {
                        $('#btn_hide').prop('disabled', true);
                        $("#mail_error").html('Email is already exist');
                    } else {
                        $('#btn_hide').prop('disabled', false);
                        $("#mail_error").html('');
                    }
                }
            });
    }

    function open_google_map_add() {
        $("#googlemapmodalAdd").modal('show');
        initializeadd();
    }

    function initializeadd() {
        var getaddress = $('#google_address').val();
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

        // document.getElementById("pac-input2").value = location_name;

        document.getElementById('pac-input2').value = getaddress;

        var input = /** @type {HTMLInputElement} */ (
            document.getElementById('pac-input2'));
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
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
                            
                            // alert(results);
                            if (results[1]) {
                                location_name = results[1].formatted_address;
                                // document.getElementById("address2").value = location_name;
                                document.getElementById("google_address").value = location_name;
                                $('#g_lat').val(lat);
                                $('#g_long').val(lng);
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


    function getredmark()
    {
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
        var input = /** @type {HTMLInputElement} */ (document.getElementById('pac-input2'));
        var searchBox = new google.maps.places.SearchBox((input));

        var geocoder = new google.maps.Geocoder();

        var address = $('#pac-input2').val();
        var marker;
        
        geocoder.geocode( { 'address': address}, function(results, status) 
        {
            if (status == google.maps.GeocoderStatus.OK) 
            {
                map.setCenter(results[0].geometry.location);
                if (marker && marker.setPosition) 
                {
                    marker.setPosition(results[0].geometry.location);
                } 
                else 
                {
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });
                    map.setZoom(25);
                    map.panTo(marker.position);
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
                                
                                // alert(results);
                                if (results[1]) {
                                    location_name = results[1].formatted_address;
                                    if(document.getElementById("google_address").value != '')
                                    {

                                    }
                                    else
                                    {
                                        document.getElementById("google_address").value = location_name;
                                    }
                                    $('#g_lat').val(lat);
                                    $('#g_long').val(lng);
                                    $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                    $("#googlemapmodalAdd").modal('hide');
                                }
                            }
                        });
                    });
                }
            }
        });
        
        // google.maps.event.addListener(searchBox, 'places_changed', function() 
        // {
        //     map.setZoom(15);
        //     var places = searchBox.getPlaces();
        //     if (places.length == 0) 
        //     {
        //         return;
        //     }
        //     for (var i = 0, marker; marker = markers[i]; i++) 
        //     {
        //         marker.setMap(null);
        //     }
        //     // For each place, get the icon, place name, and location.
        //     markers = [];
        //     var bounds = new google.maps.LatLngBounds();
        //     for (var i = 0, place; place = places[i]; i++) {
        //         var image = {
        //             url: place.icon,
        //             size: new google.maps.Size(71, 71),
        //             origin: new google.maps.Point(0, 0),
        //             anchor: new google.maps.Point(17, 34),
        //             scaledSize: new google.maps.Size(25, 25)
        //         };
        //         // Create a marker for each place.
        //         var marker = new google.maps.Marker({
        //             map: map,
        //             draggable: true,
        //             title: place.name,
        //             position: place.geometry.location
        //         });
        //         markers.push(marker);
        //         bounds.extend(place.geometry.location);
        //         // google.maps.event.addListener(marker, 'click', function(event) {
        //         //     get_city2(event.latLng.lat(), event.latLng.lng());
        //         //     var lat = event.latLng.lat();
        //         //     var lng = event.latLng.lng();
        //         //     var latlng = new google.maps.LatLng(lat, lng);
        //         //     var geocoder = geocoder = new google.maps.Geocoder();
        //         //     geocoder.geocode({
        //         //         'latLng': latlng
        //         //     }, function(results, status) {
        //         //         if (status == google.maps.GeocoderStatus.OK) {
                            
        //         //             // alert(results);
        //         //             if (results[1]) {
        //         //                 location_name = results[1].formatted_address;
        //         //                 // document.getElementById("address2").value = location_name;
        //         //                 document.getElementById("google_address").value = location_name;
        //         //                 $('#g_lat').val(lat);
        //         //                 $('#g_long').val(lng);
        //         //                 $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
        //         //                 $("#googlemapmodalAdd").modal('hide');
        //         //             }
        //         //         }
        //         //     });
        //         // });
        //     }
        //     map.fitBounds(bounds);
        // });
        // // [END region_getplaces]
        // // Bias the SearchBox results towards places that are within the bounds of the
        // // current map's viewport.
        // google.maps.event.addListener(map, 'bounds_changed', function() {
        //     var bounds = map.getBounds();
        //     searchBox.setBounds(bounds);
        // });
    }


    

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

    $(document).ready(function() {
        $('#CustomerForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                ordanizer_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Company Name'
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
                            message: 'Please Select Company Name'
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

                // password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Password'
                //         }
                //     }
                // },

                // notes: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Notes'
                //         },
                //     }
                // },
                // password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Password'
                //         },
                //     }
                // },
                // confirm_password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Confirm Password'
                //         },
                //         identical: {
                //             field: 'password',
                //             message: 'The password and its confirm are not the same'
                //         }
                //     }
                // },


                // registration_type: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Select Registration Type'
                //         }
                //     }
                // },

                // credit_term: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Select Credit Term'
                //         }
                //     }
                // },
                account_manager: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Account Mangager'
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
                            message: 'Please Enter Contact Number'
                        }
                    }
                },

                email_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Email'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },

                mailing_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Mailing Name'
                        }
                    }
                },

                // contact_code: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Contact Code'
                //         }
                //     }
                // },
                // pincode: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Pincode'
                //         }
                //     } 
                // }
            }
        });
    });

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
                        $(function() {
                            // new PNotify({
                            //     title: 'Add Contact',
                            //     text: 'Contact Information Added Successfully !!',
                            //     type: 'success'
                            // });
                            $("#successModalContact").modal('show');
                        });

                        // var param1var = getQueryVariable("param1");

                        // function getQueryVariable(variable) {
                        //     var query = window.location.search.substring(1);
                        //     if (query == 'customer=add') {
                        //         setTimeout(function() {
                        //             window.location = "<?php echo base_url('admin/Tracking/add_location'); ?>";
                        //         }, 1000);
                        //     } else {
                        //         setTimeout(function() {
                        //             window.location = "<?php echo base_url('admin/Customer'); ?>";
                        //         }, 1000);
                        //     }
                        // }
                    },
                    error: function() {
                        $(function() {
                            // new PNotify({
                            //     title: 'Register Form',
                            //     text: 'Failed to load page',
                            //     type: 'warning'
                            // });
                            $("#alertModal").modal('show'); 
                        });
                    }
                });
            }
            return false;

        }));
    });

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

<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

<script>
    function latitudelogitude(value)
    {
        var geocoder = new google.maps.Geocoder();
        var address = value;
        // alert(address);
        geocoder.geocode( { 'address': address}, function(results, status) 
        {
            if (status == google.maps.GeocoderStatus.OK) 
            {
                var latitude = results[0].geometry.location.lat();
                var logitude = results[0].geometry.location.lng();
                // alert(latitude);
                // alert(logitude)

                var latlng = new google.maps.LatLng(latitude, logitude);
                // alert(latlng);
                geocoder.geocode({'latLng': latlng}, function(results, status) 
                {
                        if (status == google.maps.GeocoderStatus.OK) {
                            
                            if (results[1]) 
                            {
                                location_name = results[1].formatted_address;
                                // alert(location_name);
                                document.getElementById("google_address").value = location_name;
                               
                                // $('#g_lat').val(lat);
                                // $('#g_long').val(lng);
                                // $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                // $("#googlemapmodalAdd").modal('show');
                            }
                        }
                    });

            } 
            else 
            {
                // alert('Geocode was not successful for the following reason: ' + status);
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
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalContact" tabindex="-1" aria-labelledby="successModalContactLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalContactLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Contact Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Customer'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("icon-eye-blocked");
                $('#show_hide_password i').removeClass("icon-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("icon-eye-blocked");
                $('#show_hide_password i').addClass("icon-eye");
            }
        });
    });
    $(document).ready(function() {
        $("#show_hide_cpassword a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_cpassword input').attr("type") == "text") {
                $('#show_hide_cpassword input').attr('type', 'password');
                $('#show_hide_cpassword i').addClass("icon-eye-blocked");
                $('#show_hide_cpassword i').removeClass("icon-eye");
            } else if ($('#show_hide_cpassword input').attr("type") == "password") {
                $('#show_hide_cpassword input').attr('type', 'text');
                $('#show_hide_cpassword i').removeClass("icon-eye-blocked");
                $('#show_hide_cpassword i').addClass("icon-eye");
            }
        });
    });
</script>

