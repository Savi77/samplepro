   <!-- ==============multiselect ================-->
   <link rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <!-- ======================= -->

   <!-- ==============multiselect ================-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js">
   </script>
   <!-- ======================= -->

   <script
       src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
   </script>


   <style type="text/css">
.pickadate {
    z-index: 100000;
}

/*  Display datepicker on modal (popup)  */

.modal {
    z-index: 20;
}

.modal-backdrop {
    z-index: 10;
}

​
   </style>
   <!--=============================== multiple select ======================================-->
   <style type="text/css">
/*--------------------------------------------------*/
.multiselect-container>li>a>label.checkbox {
    margin: -6px 12px;
}

.multiselect-container {
    min-width: 275px;
    max-height: 250px;
    overflow-y: auto;
}

.btn-group>.btn:first-child {
    margin-left: 0;
    width: 275px !important;
}
   </style>
   <!--===============================/ multiple select ======================================-->
   <?php foreach($edit_customerresult->result() as $row1) {
        // echo "<pre>";
        // print_r($row1);
        // die;
         if ($row1->company_anniversary!='') 
        {
            $company_anniversary = date("d F, Y", strtotime($row1->company_anniversary));
        }
        else 
        {
            $company_anniversary = '';
        }
        if ($row1->marriage_anniversary!='') 
        {
           $marriage_anniversary = date("d F, Y", strtotime($row1->marriage_anniversary));
        }
        else
        {
          $marriage_anniversary = '';
        }
 ?>
   <form class="form-horizontal" id="EditCustomerForm">
       <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?= $row1->customer_id ?>">
       <input type="hidden" class="form-control" id="leadopp_id" name="leadopp_id" value="<?= $row1->leadopp_id;?>">
       <!-- <div class="row">
           <div class="col-md-12 col-md-offset-3 dflex responsive"> -->
                <!-- <div class="panel panel-default"> -->
                    <div class="panel-body width-100 ">

                       <!-- <div class="form-group" style="margin-bottom: 4px;">
                           <label class="control-label col-sm-6" for="email">Customer Type <span style="color: red;">*</span></label>
                           <div class="col-sm-6">
                               <?php 
                                    if ($row1->parent_id=='0')
                                    { 
                                        $display ="";
                                        $parentdisplay ="";
                                        $parentdisplay1 ="display:none";
                                ?>
                               <label class="radio-inline">
                                   <input type="radio" name="custtype" class="styled" value="primary" checked="" onclick="customertype(this.value)">
                                   Primary
                               </label>

                               <label class="radio-inline">
                                   <input type="radio" name="custtype" class="styled" value="secondary" onclick="customertype(this.value)">
                                   Secondary
                               </label>
                               <?php }
                                    else
                                    { 
                                        $display ="display:none";
                                        $parentdisplay ="display:none";
                                        $parentdisplay1 ="";
                                    ?>
                               <label class="radio-inline">
                                   <input type="radio" name="custtype" class="styled" value="primary" onclick="customertype(this.value)"> Primary
                               </label>

                               <label class="radio-inline">
                                   <input type="radio" name="custtype" class="styled" checked="" value="secondary" onclick="customertype(this.value)"> Secondary
                               </label>
                               <?php }  ?>
                           </div>
                       </div> -->
                        <div class="col-md-12 dflex responsive ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-sm-6" for="email">Customer Type <span style="color: red;">*</span></label>
                                </div>
                            </div>
                                <?php 
                                    if ($row1->parent_id=='0')
                                    { 
                                        $display ="";
                                        $parentdisplay ="";
                                        $parentdisplay1 ="display:none";
                                ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" style="margin-right: 10px;" name="custtype" class="styled" value="primary" checked="" onclick="customertype(this.value)">Primary </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" style="margin-right: 10px;" name="custtype" class="styled" value="secondary" onclick="customertype(this.value)">Secondary</label>
                                    </div>
                                </div>
                                <?php }
                                    else
                                    { 
                                        $display ="display:none";
                                        $parentdisplay ="display:none";
                                        $parentdisplay1 ="";
                                ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" style="margin-right: 10px;" name="custtype" class="styled" value="primary" onclick="customertype(this.value)"> Primary </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" style="margin-right: 10px;" name="custtype" class="styled" checked="" value="secondary" onclick="customertype(this.value)"> Secondary</label> 
                                    </div>
                                </div>
                                <?php }  ?>
                        </div>
                                

                    </div>

                <!-- </div>
           </div>
       </div> -->

       <fieldset class="form-filedset">
           <legend class="field">Contact Details</legend>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Contact Name <span class="color-red">*</span></label>
                        <input type="text" class="form-control" id="ordanizer_name" name="ordanizer_name" placeholder="Enter Contact name" value="<?= $row1->company_name;?>" maxlength="100" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mailing Name <span class="color-red">*</span></label>
                        <input type="text" class="form-control" name="mailing_name" id="" placeholder="Enter Mailing Name" maxlength="100">
                    </div>
                </div>

               <!-- <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Company Name <span style="color: red;">*</span></label>
                       <div id="parentlist_display1" style="<?= $parentdisplay ?>">
                           <input type="text" class="form-control" id="ordanizer_name1" name="ordanizer_name" placeholder="Enter Company Name" maxlength="100" value="<?= $row1->company_name ?>">
                       </div>
                       <div style="<?= $parentdisplay1 ?>" id="forsecondarylist_display1">
                           <select class="select-search form-control" name="parentid" id="parentid1" data-placeholder="Select Company Name">
                               <option value="">Select Company Name</option>
                               <?php   
                                    foreach ($editprimary_customer->result() as $value21) 
                                    {
                                        $cust_id = $value21->customer_id;
                                        $parentid = $row1->parent_id;
                                        if ($parentid==$cust_id)
                                        { ?>
                               <option value="<?= $value21->customer_id ?>" selected=""><?= $value21->company_name;?>
                               </option>
                               <?php  } else { ?>
                               <option value="<?= $value21->customer_id ?>"><?= $value21->company_name;?></option>
                               <?php } } ?>
                           </select>
                       </div>
                   </div>
               </div> -->

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Contact Person <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50" value="<?= $row1->contact_person_name1 ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Mobile Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Enter Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->phone_no ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Alternate Number</label>
                        <input type="text" class="form-control" id="contact_number2" name="contact_number2"
                            placeholder="Enter Alternate Number"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
                            maxlength="15" value="<?= $row1->alternate_number ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Landline Number</label>
                        <input type="text" class="form-control" id="landline_number" name="landline_number"
                            placeholder="Enter Landline Number"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
                            maxlength="15" value="<?= $row1->landline_number ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Email ID <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="email_id" name="email_id"
                            placeholder="Enter Email" maxlength="35" value="<?= $row1->email ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Alternate Email</label>
                        <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id"
                            placeholder="Enter Alternate Email" value="<?= $row1->alternate_email ?>" maxlength="35">
                   </div>
               </div>


               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Country <span style="color: red;">*</span></label>
                        <select onChange="updatestate(this.value);" name="country" class="countries form-control" id="countryId_1" data-placeholder="Select Country">
                            <option value="">Select Country</option>
                            <?php   
                            foreach ($country_list1 as $value5) 
                            { 
                            $country_id = $value5->id;
                            $country = $row1->country;

                            if ($country_id==$country) 
                            { ?>

                            <option value="<?= $value5->id ?>" selected><?= $value5->name;?></option>

                            <?php } else { ?>

                            <option value="<?= $value5->id ?>"><?= $value5->name;?></option>
                            <?php } } ?>
                        </select>
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">

                       <label class="control-label col-lg-4" for="email">State <span style="color: red;">*</span></label>
                           <select name="state" id="state_1" class="form-control" data-placeholder="Select State">
                               <option value="">Select State</option>
                                <?php   
                                foreach ($selected_state_list as $value6)
                                { 
                                        $state_id = $value6->id;
                                        $state = $row1->state;
                                        if ($state_id==$state) 
                                        { ?>
                               <option value="<?= $value6->id ?>" selected><?= $value6->name;?></option>
                               <?php } else { ?>
                               <option value="<?= $value6->id ?>"><?= $value6->name;?></option>
                               <?php } } ?>
                           </select>
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">City <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="city2" name="city" placeholder="Enter City"
                            maxlength="50" value="<?= $row1->city ?>">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email"> Address <span style="color: red;">*</span></label>
                        <textarea class="form-control" id="getaddress" name="address" placeholder="Enter Address" maxlength="200" onkeyup="latitudelogitude_crm(this.value);"></textarea>
                   </div>
               </div>

               <div class="col-md-6">
                    <div class="form-group">
                        <label>Pincode <span class="color-red">*</span></label>
                        <textarea type="text" class="form-control" name="pincode" id="pincode3" placeholder="Enter Pincode" maxlength="6"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- <div class="form-group">
                        <label for="email"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;"></a></label>
                        <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch By Google Eddress" maxlength="200" readonly style="margin-top: -1.9%;" col="5" row="3"></textarea>

                        <input type="hidden" name="g_lat" id="g_lat">
                        <input type="hidden" name="g_long" id="g_long">
                    </div> -->
                    <div class="form-group">
                        <label for="email" style="margin-bottom:6px;"> Google Address <a onclick="open_google_map_add()"><img src="<?= base_url(); ?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                        <textarea class="form-control col-md-12" id="google_address" name="address2" placeholder="Fetch By Google Eddress" maxlength="200" readonly col="5" row="3"></textarea>

                        <input type="hidden" name="g_lat" id="g_lat">
                        <input type="hidden" name="g_long" id="g_long">
                    </div>
                </div>
           </div>
           <!-- </div>
           </div>
           </div>
           </div> -->
       </fieldset>

       <!-- </div> -->

       <fieldset class="form-filedset">
           <legend class="field">Calender</legend>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="email">Date of Birth </label>
                        <!-- <input type="text" class="form-control pickadate-selectors" id="dob1" name="dob" placeholder="Select Date Of Birth" maxlength="50" value="<?= date("d F, Y", strtotime($row1->dob)) ?>"> -->
                        <input type="text" class="form-control pickadate-selectors" id="dob1" name="dob" placeholder="Select Date Of Birth" maxlength="50">
                    </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Company Anniversary</label>
                        <input type="text" class="form-control pickadate-selectors" id="company_aniversary1" name="company_aniversary" placeholder="Select Company Aniversary" maxlength="50" value="<?= $company_anniversary ?>">
                   </div>
               </div>

           
                <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Marriage Anniversary</label>
                        <input type="text" class="form-control pickadate-selectors" id="marriage_aniversary1" name="marriage_aniversary" placeholder="Select Marriage Aniversary" maxlength="50" value="<?= $marriage_anniversary ?>">
                   </div>
               </div>
            </div>
       </fieldset>



       <fieldset class="form-filedset">
           <legend class="field">Other Info</legend>
           <div class="row">
               

               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email"> Contact Type</label>
                        <select name="type" id="type_1" class="form-control" data-placeholder="Select Type">
                            <option value="">Select Type</option>
                            <?php   
                            foreach ($type_list1 as $value) 
                            {
                                $type_id = $value->type_id;
                                    $type = $row1->type_id;
                            if ($type_id==$type) 
                            { ?>
                            <option value="<?= $value->type_id ?>" selected><?= $value->title;?></option>
                            <?php } else { ?>

                            <option value="<?= $value->type_id ?>"><?= $value->title;?></option>
                            <?php } } ?>
                        </select>

                       <?php

                            // $ids = array();
                            // foreach ($selected_buss->result() as  $buss) 
                            // {  
                            //     $sel_buss_id = $buss->business_id;
                            //     array_push($ids, $sel_buss_id);
                            // }
                            $ids = array();
                            $selected = $lead_data['business_id'];

                            $selectedstudent = trim($selected, ',');
                            $explode = explode(",", $selectedstudent);
                            for ($i = 0; $i < count($explode); $i++) {
                                $student_id = $explode[$i];
                                array_push($ids, $student_id);
                            }
                        ?>
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">

                       <label class="control-label" for="email">Group</label>
                        <select name="group" id="group_1" class="form-control" data-placeholder="Select Group">
                            <option value="">Select Group</option>
                            <?php   
                                foreach ($group_list1 as $value2) 
                                {

                                    $group_id = $value2->group_id;
                                        $group = $row1->group_id;
                                if ($group_id==$group) 
                                { ?>
                            <option value="<?= $value2->group_id ?>" selected><?= $value2->group_name;?></option>
                            <?php } else { ?>

                            <option value="<?= $value2->group_id ?>"><?= $value2->group_name;?></option>
                            <?php } } ?>
                           </select>
                   </div>
               </div>
<?php
// echo "<pre>";
// foreach ($business_list as $bus) {
// print_r($bus->business_id);
// }
?>
               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Business Segment</label>
                        <!-- <select name="business[]" id="business1" class="form-control" data-placeholder="Select Segment" multiple> -->
                        <select data-placeholder="Select Segment" class="form-control" name="business[]" id="business12"  multiple>
                            <option value="">Select segment</option>
                            <!-- <?php   
                                foreach ($business_list1 as $value1) 
                                {
                                    $business_id = $value1->business_id;
                                    // $business = $row1->business_id;
                                // if ($business_id==$business) 
                                if (in_array($business_id, $ids))
                                { ?>
                                <option value="<?= $value1->business_id ?>" selected><?= $value1->business_name;?>
                                </option>
                                <?php } else { ?>

                                <option value="<?= $value1->business_id ?>"><?= $value1->business_name;?></option>
                            <?php } } ?> -->
            
                            <?php
                            foreach ($business_list as $value) {
                                $business_id = $value->business_id;

                            ?>
                                <option value="<?= $value->business_id ?>" <?php if (in_array($business_id, $ids)) { echo 'selected="selected"'; } ?>><?= $value->business_name; ?></option>
                            <?php } ?> 

                        </select>
                   </div>
               </div>


               <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label" for="email">Location</label>
                        <select name="location" id="location_1" class="form-control" data-placeholder="Select Location">
                            <option value="">Select Location</option>
                            <?php   
                                foreach ($location_list1 as $value3) 
                                {

                                    $location_id = $value3->location_id;
                                    $location = $row1->location_id;
                                if ($location_id==$location) 
                                { ?>
                                    <option value="<?= $value3->location_id ?>" selected><?= $value3->location;?></option>
                                    <?php } else { ?>

                                    <option value="<?= $value3->location_id ?>"><?= $value3->location;?></option>
                            <?php } } ?>
                        </select>
                   </div>
               </div>

               <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Credit Term <sup style="color: red">*</sup></label> -->
                        <label>Credit Term </label>
                        <select class="form-control" name="credit_term" id="credit_term_3" data-placeholder="Select Credit Term">
                            <option value="">Select Credit Term</option>
                            
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Notes <sup style="color: red">*</sup></label> -->
                        <label>Notes </label>
                        <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="1"></textarea>
                    </div>
                </div>

           </div>
       </fieldset>


       <fieldset class="form-filedset">
           <legend class="field">Connection</legend>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Account Manager</label>
                        <select data-placeholder="Select Account Manager" class="form-control" id="c2c_account">
                            <option value="">Select Account Manager</option>
                           
                        </select>
                    </div>
               </div>

               <div class="col-md-6">
                   <div class="form-group">
                       <label>Referred By</label>
                       <select data-placeholder="Select Reference" class="form-control" name="reference" id="c2c_reference">
                            <option value="">Select Reference</option>
                            
                        </select>                   
                    </div>
               </div>

            </div>
       </fieldset>

       <fieldset class="form-filedset">
           <legend class="field">Reference Documents</legend>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Document </label>
                        <input type="file" style="padding:4px;" class="form-control" name="" id="" multiple>
                    </div>
               </div>

            </div>
       </fieldset>

       <fieldset class="form-filedset">
           <legend class="field">Access Credentials</legend>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Password <span class="color-red">*</span></label>
                        <input type="password" class="form-control" name="password" id="" placeholder="Enter Password" maxlength="35">

                    </div>
               </div>

               <div class="col-md-6">
                    <div class="form-group">
                        <label> Confirm Password <span class="color-red">*</span></label>
                        <input type="password" class="form-control" name="confirm_password" id="" placeholder="Enter Confirm Password">
                    </div>
               </div>

            </div>
       </fieldset>

       
       <div class="form-group" style="text-align:right;">
           <div class="col-sm-offset-3 col-sm-12">
               <button style="margin-right:15px;" type="submit" class="btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
           </div>
       </div>
   </form>
   <?php } ?>
   <!---------------------------------------- Primary and secondary account ---------------------------------- -->
   <script type="text/javascript">
function customertype(val) {
    // alert(val);
    if (val == 'secondary') {
        $('#parentlist_display1').hide();
        $('#forsecondarylist_display1').show();
    } else {
        $('#forsecondarylist_display1').hide();
        $('#parentlist_display1').show();
    }
}
   </script>
   <!---------------------------------------- / Primary and secondary account ---------------------------------- -->
   <!--========================== Date picker javascript ====================================-->
   <script type="text/javascript">
// $(function() {
//     $('#dob1').datetimepicker({
//         format: 'DD MMMM, YYYY',
//         maxDate: 'now',
//         useCurrent: true
//     });
//     $('#company_aniversary1').datetimepicker({
//         format: 'DD MMMM, YYYY',
//         maxDate: 'now',
//         useCurrent: true
//     });
//     $('#marriage_aniversary1').datetimepicker({
//         format: 'DD MMMM, YYYY',
//         maxDate: 'now',
//         useCurrent: true
//     });
// });
   </script>
   <!--========================== / Date picker javascript ====================================-->
   <script type="text/javascript">
$("#dob1").on("dp.change", function(e) {
    $('#EditCustomerForm').bootstrapValidator('revalidateField', 'dob1');
});
   </script>

   <!--=======================================  Validation login  ==========================================-->

   <script type="text/javascript">
$(document).ready(function() {
    $('#EditCustomerForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            ordanizer_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Organizer Name'
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
            address: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Address'
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
                        message: 'Please Enter Country Name'
                    }
                }
            },

            state: {
                validators: {
                    notEmpty: {
                        message: 'Please Select State'
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

            // dob: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Please Select DOB'
            //         }
            //     }
            // },

            pincode: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Pincode'
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
                        message: 'Please Enter Confirm Password'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
        }
    });
});
   </script>

   <!--======================================= / Validation login  ==========================================-->

   <script type="text/javascript">
$(document).ready(function(e) {
    $("#EditCustomerForm").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
            //alert('invalid');
        } else {
            $.ajax({
                url: "<?php echo base_url('admin/Customer/update_lead_customer');?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // new PNotify({
                    //     title: 'Convrt to Contact',
                    //     text: 'Converted Successfully',
                    //     type: 'success'
                    // });
                    $('#successConverttocontactModal').modal('show');

                    // setTimeout(function() {
                    //     window.location =
                    //         "<?php echo base_url('admin/Leads/leads_opportunity');?>";
                    // }, 2000);


                },
                error: function() {
                    $('#alertModal').modal('show');
                }
            });
        }
        return false;

    }));
});
   </script>

   <!--  -->
   <script>
function updatestate(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url('admin/Customer/getstate') ?>',
        data: 'country_id=' + val,
        success: function(data) {
            // alert(data);
            $("#state_1").html(data);
        }
    });
}
   </script>
   <!--  -->

   <!--=============================================== multiselect employee ================================== -->
   <!-- <script type="text/javascript">
jQuery('#business1').multiselect({
    enableFiltering: true,
    maxHeight: 400,
    enableCaseInsensitiveFiltering: true,
    nonSelectedText: 'Select business segment',
    numberDisplayed: 10,
    selectAll: false,
    onChange: function(option, checked) {
        // Get selected options.
        var selectedOptions = jQuery('#business1 option:selected');

        if (selectedOptions.length >= 10) {
            // Disable all other checkboxes.
            var nonSelectedOptions = jQuery('#business1 option').filter(function() {
                return !jQuery(this).is(':selected');
            });

            nonSelectedOptions.each(function() {
                var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                input.prop('disabled', true);
                input.parent('li').addClass('disabled');
            });

            new PNotify({
                title: 'Message',
                text: 'Please Select only 10 business segment',
                type: 'warning'
            });
        } else {
            // Enable all checkboxes.
            jQuery('#business1 option').each(function() {
                var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                input.prop('disabled', false);
                input.parent('li').addClass('disabled');
            });
        }
    }
});


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
   </script> -->
   <!-- ====================================================================================================================== -->

   <script>
    
    $('#c2c_reference').select2({
        dropdownParent: $("#modal_default")
    });
    $('#c2c_account').select2({
        dropdownParent: $("#modal_default")
    });
    $('#state_1').select2({
        dropdownParent: $("#modal_default")
    });
   
    $('#countryId_1').select2({
        dropdownParent: $("#modal_default")
    });
    $('#type_1').select2({
        dropdownParent: $("#modal_default")
    });
    $('#location_1').select2({
        dropdownParent: $("#modal_default")
    });
    $('#group_1').select2({
        dropdownParent: $("#modal_default")
    });
    // $('#business1').select2({
    //     dropdownParent: $("#modal_default")
    // });
    $('#business12').select2({
            // dropdownParent: $("#modal_default")
        });
    $('#parentid1').select2({
        dropdownParent: $("#modal_default")
    });
    $('#country2').select2({
        dropdownParent: $("#modal_default")
    });
    $('#credit_term_3').select2({
        dropdownParent: $("#modal_default")
    });
    

   </script>
   <script>
    $('#dob1').pickadate({
        selectYears: 100,
        selectMonths: true
    });
    $('#company_aniversary1').pickadate({
        selectYears: 100,
        selectMonths: true
    });
    $('#marriage_aniversary1').pickadate({
        selectYears: 100,
        selectMonths: true
    });
    
   </script>
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
<script>
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
        alert(map);
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
                        alert(city);
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
</script>


<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successConverttocontactModal" tabindex="-1" aria-labelledby="successConverttocontactModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successConverttocontactModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Converted Sucessfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
   <!-- <script>
    (function($) {

var Defaults = $.fn.select2.amd.require('select2/defaults');

$.extend(Defaults.defaults, {
  dropdownPosition: 'auto'
});

var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

var _positionDropdown = AttachBody.prototype._positionDropdown;

AttachBody.prototype._positionDropdown = function() {

  var $window = $(window);

  var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
  var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');

  var newDirection = null;

  var offset = this.$container.offset();

  offset.bottom = offset.top + this.$container.outerHeight(false);

  var container = {
      height: this.$container.outerHeight(false)
  };

  container.top = offset.top;
  container.bottom = offset.top + container.height;

  var dropdown = {
    height: this.$dropdown.outerHeight(false)
  };

  var viewport = {
    top: $window.scrollTop(),
    bottom: $window.scrollTop() + $window.height()
  };

  var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
  var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);

  var css = {
    left: offset.left,
    top: container.bottom
  };

  // Determine what the parent element is to use for calciulating the offset
  var $offsetParent = this.$dropdownParent;

  // For statically positoned elements, we need to get the element
  // that is determining the offset
  if ($offsetParent.css('position') === 'static') {
    $offsetParent = $offsetParent.offsetParent();
  }

  var parentOffset = $offsetParent.offset();

  css.top -= parentOffset.top
  css.left -= parentOffset.left;

  var dropdownPositionOption = this.options.get('dropdownPosition');

  if (dropdownPositionOption === 'above' || dropdownPositionOption === 'below') {
    newDirection = dropdownPositionOption;
  } else {

    if (!isCurrentlyAbove && !isCurrentlyBelow) {
      newDirection = 'below';
    }

    if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
      newDirection = 'above';
    } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
      newDirection = 'below';
    }

  }

  if (newDirection == 'above' ||
  (isCurrentlyAbove && newDirection !== 'below')) {
      css.top = container.top - parentOffset.top - dropdown.height;
  }

  if (newDirection != null) {
    this.$dropdown
      .removeClass('select2-dropdown--below select2-dropdown--above')
      .addClass('select2-dropdown--' + newDirection);
    this.$container
      .removeClass('select2-container--below select2-container--above')
      .addClass('select2-container--' + newDirection);
  }

  this.$dropdownContainer.css(css);

};

})(window.jQuery);
   </script>

   <script>
     $('#state_1').select2({
        // dropdownParent: $("#modal_default")
        dropdownPosition: 'below'
    });
   </script> -->
<script>
    function latitudelogitude_crm(value)
    {
        var geocoder = new google.maps.Geocoder();
        var address = value;
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
