   <!-- ==============multiselect ================-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <!-- ======================= -->

   <!-- ==============multiselect ================-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
   <!-- ======================= -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
   <style type="text/css">
     .pickadate {
       z-index: 100000;
     }

     /*  Display datepicker on modal (popup)  */
     .sidebar-default .navigation li > a {
    color: #fcfcfc;
}
.sidebar-default {
    color: #ffffff;
}

    /* Select css override */
    .select2-container .select2-selection--multiple .select2-selection__rendered {
          list-style: none;
          padding: 0;
          display: table-header-group;
      }
      .select2-container--default .select2-selection--multiple .select2-selection__choice {
          background: #1c2428;
          border-radius: 20px;
          display: list-item;
          padding: 1px 8px;
      }
      .select2-selection--single:not([class*=bg-]):not([class*=border-]) {
          border-color: #ddd;
          width: 95%;
          padding: 2px;
          height: 37px;
          margin-top: 1.1px;
      }
      .select2-container--default .select2-selection--single .select2-selection__arrow {
          height: 26px;
          position: absolute;
          top: 5px;
          right: 1px;
          width: 20px;
      }
      .select2-container .select2-search--inline .select2-search__field {
          background: transparent;
          border: none;
          outline: 0;
          box-shadow: none;
          -webkit-appearance: textfield;
          width: 200% !important;
      }
      .select2-search--dropdown .select2-search__field {
          padding-left: 15%;
          width: 100%;
          box-sizing: border-box;
      }
      /* Select css override */
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
     .textWidth{
       width: 95%;
     }
     label {
      margin-bottom: 6px;
      font-weight: 550;
    }
    .has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline, .has-success.radio label, .has-success.checkbox label, .has-success.radio-inline label, .has-success.checkbox-inline label {
        color: black;
    }
   </style>
   <!--===============================/ multiple select ======================================-->
   <?php foreach ($edit_customerresult->result() as $row1) {

      if ($row1->company_anniversary != '') {
        // $company_anniversary = date("Y-m-d", strtotime($row1->company_anniversary));
        $company_anniversary = date("d F, Y", strtotime($row1->company_anniversary));
      } else {
        $company_anniversary = '';
      }


      if ($row1->marriage_anniversary != '') {
        // $marriage_anniversary = date("Y-m-d", strtotime($row1->marriage_anniversary));
        $marriage_anniversary = date("d F, Y", strtotime($row1->marriage_anniversary));
      } else {
        $marriage_anniversary = '';
      }
    ?>
     <form class="form-horizontal" id="EditCustomerForm"> 

       <input type="hidden" class="form-control textWidth" id="customer_id" name="customer_id" value="<?= $row1->customer_id ?>">

            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Basic Info </legend>
                <fieldset>
                  <div class="row">
                      <div class="col-md-8 col-md-offset-3">
                          <div class="panel panel-default">
                                <div class="panel-body" style="padding: 2px;background: #F5F5F5;color: black;font-size: 15px;">  
                                  <div class="form-group" style="margin-bottom: 4px;display: flex;">
                                    <label class="control-label col-sm-6" for="email" style="margin-left: 3%;">Customer Type <span style="color: red;">*</span></label>
                                    <div class="col-sm-6" style="margin-left: -9%;">
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

                                              <label class="radio-inline" style="margin-left: 20%;">
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
                                                <input type="radio" name="custtype" class="styled" value="primary" onclick="customertype(this.value)">
                                                Primary
                                              </label>

                                              <label class="radio-inline" style="margin-left: 20%;">
                                                <input type="radio" name="custtype" class="styled" checked="" value="secondary" onclick="customertype(this.value)">
                                                Secondary
                                              </label>
                                        <?php }
                                      ?>
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
                      <?php if ($row1->parent_id=='0') { ?>
                          <div class="form-group" id="parentlist_display1">
                            <label>Organization Name : <sup style="color: red">*</sup></label>
                              <input type="text" class="form-control textWidth" id="ordanizer_name1" name="ordanizer_name" placeholder="Enter organization name" maxlength="100" value="<?= $row1->company_name ?>">
                          </div>
                          <div class="form-group" style="display: none" id="forsecondarylist_display1">
                            <label>Organization Name : <sup style="color: red">*</sup></label>
                            <select class="select-search form-control textWidth" name="parentid" id="parentid1">
                                  <option value="">organization List</option>
                                  <?php   
                                    foreach ($editprimary_customer->result() as $value21) 
                                    {
                                        $cust_id = $value21->customer_id;
                                        $parentid = $row1->parent_id;
                                        if ($parentid==$cust_id)
                                        { ?>
                                          <option value="<?= $value21->customer_id ?>" selected=""><?= $value21->company_name;?></option>
                              <?php  } else { ?>
                                      <option value="<?= $value21->customer_id ?>"><?= $value21->company_name;?></option>
                                <?php } } ?> 
                              </select>
                          </div>
                      <?php  }else { ?>
                          <div class="form-group" id="parentlist_display1" style="display: none" >
                              <label>Organization Name : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control textWidth" id="ordanizer_name1" name="ordanizer_name" placeholder="Enter organization name" maxlength="100" value="<?= $row1->company_name ?>">
                            </div>
                            <div class="form-group" style="display: block" id="forsecondarylist_display1">
                              <label>Organization Name : <sup style="color: red">*</sup></label>
                              <select class="select-search form-control textWidth" name="parentid" id="parentid1">
                                    <option value="">organization List</option>
                                    <?php   
                                      foreach ($editprimary_customer->result() as $value21) 
                                      {
                                          $cust_id = $value21->customer_id;
                                          $parentid = $row1->parent_id;
                                          if ($parentid==$cust_id)
                                          { ?>
                                            <option value="<?= $value21->customer_id ?>" selected=""><?= $value21->company_name;?></option>
                                <?php  } else { ?>
                                        <option value="<?= $value21->customer_id ?>"><?= $value21->company_name;?></option>
                                  <?php } } ?> 
                                </select>
                            </div>
                      <?php  } ?>
                      
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Mailing Name : <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control textWidth" name="mailing_name" placeholder="Enter Mailing name" maxlength="100" value="<?= $row1->mailing_name ?>">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <!-- <sup style="color: red">*</sup> [ <span>System Generated</span> ] -->
                        <label>Contact Code : </label>
                        <input type="text" class="form-control textWidth" name="contact_code" maxlength="15" value="<?= $row1->contact_code ?>">
                      </div>
                    </div>
                  </div>
                </fieldset>
            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Contact Details </legend>
              <fieldset>
                <div class="row" style="margin-top: 1%;">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Contact Person : <sup style="color: red">*</sup></label>
                      <input type="text" class="form-control textWidth" id="contact_person" name="contact_person" placeholder="Enter contact person name" maxlength="50" value="<?= $row1->contact_person_name1 ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Mobile Number : <sup style="color: red">*</sup></label>
                      <input type="text" class="form-control textWidth" id="contact_number1" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->phone_no ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Alternate Number : </label>
                      <input type="text" class="form-control textWidth" id="contact_number2" name="contact_number2" placeholder="Enter contact alternate number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->alternate_number ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Landline Number : </label>
                      <input type="text" class="form-control textWidth" id="landline_number" name="landline_number" placeholder="Enter Landline Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->landline_number ?>">
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Email ID : <sup style="color: red">*</sup></label>
                      <input type="text" class="form-control textWidth" id="email_id" name="email_id" placeholder="Enter email" maxlength="35" value="<?= $row1->email ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Alternate Email : </label>
                      <input type="text" class="form-control textWidth" id="alternate_email_id" name="alternate_email_id" placeholder="Enter Alternate Email" maxlength="35" value="<?= $row1->alternate_email ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Country : <sup style="color: red">*</sup></label>
                        <select onChange="updatestate(this.value);" name="country" class="countries form-control textWidth" id="countryId">
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
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>State :</label>
                          <select name="state" id="state1" class="form-control textWidth" >
                            <option value="">Select state</option>
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
                </div>
              </fieldset>
              <fieldset>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>City : </label>
                      <input type="text" class="form-control textWidth" id="city" name="city" placeholder="Enter City" maxlength="50" value="<?= $row1->city ?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Address : <sup style="color: red">*</sup></label>
                      <textarea class="form-control textWidth" name="address" cols="23" rows="3" placeholder="Enter Address" maxlength="200" ><?= $row1->address ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="email"> Google Address <a onclick="open_google_map_edit()"><img src="<?= base_url();?>assets/img/map.png" alt="map" style="margin-top: -6%;" data-toggle="tooltip" data-placement="top" title="Click here to get Google location"></a></label>
                      <textarea class="form-control textWidth col-md-8" id="address2" name="address2" cols="23" rows="3" placeholder="Fetch by google address" maxlength="200" readonly style="margin-top: -1.9%;"><?= $row1->address2 ?></textarea>
                    </div>
                  </div>
                    <input type="hidden" name="g_lat" id="g_lat_edit" value="<?= $row1->g_lat; ?>">
                    <input type="hidden" name="g_long" id="g_long_edit" value="<?= $row1->g_long ?>">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pincode : </label>
                      <input type="text" class="form-control textWidth" name="pincode" placeholder="Enter Pincode" maxlength="10" value="<?= $row1->pincode ?>">
                    </div>
                  </div>
                  <!-- <div class="col-md-3">
                            <div class="form-group">
                              <label>Address Line2 : </label>
                              <input type="text" class="form-control textWidth" name="address2" placeholder="Enter Address Line2" maxlength="100">
                            </div>
                          </div>
                  -->
                </div>
              </fieldset>

            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Taxation Details </legend>
              <fieldset>
                <div class="row" style="margin-top: 1%;">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Registration Type : <sup style="color: red">*</sup> </label>
                      <select class="select-search form-control textWidth" name="registration_type" id="registration_type">
                        <option value="">Select Registration Type</option>
                        <option value="Regular" <?php echo $reg_type = ($row1->registration_type == 'Regular') ? "selected" : "" ;?> >Regular</option>
                        <option value="Composition" <?php echo $reg_type = ($row1->registration_type == 'Composition') ? "selected" : "" ;?> >Composition</option>
                        <option value="Consumer" <?php echo $reg_type = ($row1->registration_type == 'Consumer') ? "selected" : "" ;?> >Consumer</option>
                        <option value="Unregistered" <?php echo $reg_type = ($row1->registration_type == 'Unregistered') ? "selected" : "" ;?> >Unregistered</option>
                        <option value="Unknown" <?php echo $reg_type = ($row1->registration_type == 'Unknown') ? "selected" : "" ;?> >Unknown</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>GST No. : </label>
                      <input type="text" class="form-control textWidth" name="gstin" placeholder="Enter GST No." maxlength="15" value="<?= $row1->gstin?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pan No. : </label>
                      <input type="text" class="form-control textWidth" name="pan_no" placeholder="Enter Pan No." maxlength="30" value="<?= $row1->pan_no?>" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tan No. : </label>
                      <input type="text" class="form-control textWidth" name="tan_no" placeholder="Enter Tan No." maxlength="30" value="<?= $row1->tan_no?>" >
                    </div>
                  </div>
                </div>
              </fieldset>
            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Calendar </legend>
              <fieldset>
                <div class="row" style="margin-top: 1%;">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Date of Birth : <sup style="color: red">*</sup></label>
                      <input type="text" class="form-control textWidth" id="dob1" name="dob" placeholder="Select DOB" value="<?= date("d/m/Y", strtotime($row1->dob)) ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Company Anniversary :</label>
                      <input type="text" class="form-control textWidth" id="company_aniversary1" name="company_aniversary" placeholder="Select Company Aniversary" maxlength="50" value="<?= $row1->company_anniversary?>" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Marriage Anniversary : </label>
                      <input type="text" class="form-control textWidth" id="marriage_aniversary1" name="marriage_aniversary" placeholder="Select Marriage Aniversary" maxlength="50" value="<?= $row1->marriage_anniversary?>" >
                    </div>
                  </div>
                </div>
              </fieldset>
            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Other Info </legend>
              <fieldset>
                <div class="row" style="margin-top: 1%;">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Type : </label>
                      <select name="type" id="type" class="form-control textWidth type" >
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
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Group : </label>
                        <select name="group" id="group" class="form-control textWidth group" >
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
                      $ids = array();
                      foreach ($selected_buss->result() as  $buss) 
                      {  
                        $sel_buss_id = $buss->business_id;
                        array_push($ids, $sel_buss_id);
                      }
                  ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Business Segment : </label>
                      <select name="business[]" id="business1" multiple class="form-control textWidth" >
                        <option value="">Select business segment</option>
                          <?php   
                            foreach ($business_list1 as $value1) 
                            {
                                 $business_id = $value1->business_id;
                                 $business = $row1->business_id;
                            if (in_array($business_id, $ids))
                            { ?>
                                <option value="<?= $value1->business_id ?>" selected><?= $value1->business_name;?></option>
                          <?php } else { ?>

                                <option value="<?= $value1->business_id ?>"><?= $value1->business_name;?></option>
                           <?php } } ?> 

                      </select>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Location : </label>
                      <select name="location" id="location" class="form-control textWidth location" >
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
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Credit Term : <sup style="color: red">*</sup></label>
                      <select class="select-search form-control textWidth" name="credit_term" id="credit_term">
                        <option value="">Select Credit Term</option>
                        <?php
                          foreach ($credit_term as $row) {
                          ?>
                          <option value="<?= $row->credit_id ?>" <?php echo $credit = ($row1->credit_term == $row->credit_id) ? "selected" : "" ;?> ><?= $row->credit_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Notes : <sup style="color: red">*</sup></label>
                      <textarea class="form-control textWidth" id="notes" name="notes" placeholder="Enter Notes" cols="3" rows="2"><?= $row1->notes; ?></textarea>
                    </div>
                  </div>

                </div>
              </fieldset>
            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border" style="margin: 0;">Account Manager </legend>
              <fieldset>
                  <div class="row" style="margin-top: 1%;">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <?php $acc_mng = explode(",",$row1->account_manager); ?>
                          <label>Account Manager :</label>
                              <select class="form-control account_manager"  name="account_manager[]" id="account_manager" multiple>
                              <option value="">Select Account Manager</option>
                              <option value="NA" <?php echo $acc = (in_array('NA',$acc_mng)) ? "Selected" : "" ;?> >NA</option>
                              <?php foreach ($account_manager as $row)  { ?>
                                  <option value="<?= $row->id ?>" <?php echo $acc = (in_array($row->id,$acc_mng)) ? "Selected" : "" ;?> ><?= $row->name;?></option>
                              <?php } ?> 
                          </select>
                        </div>
                      </div>
                  </div>
              </fieldset>
            </fieldset>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border" style="margin: 0;">Access Credentials </legend>
                <fieldset>
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>Password : <sup style="color: red">*</sup></label>
                                <input type="password" class="form-control textWidth"  name="password" placeholder="Enter Password" maxlength="35" value="<?php echo $row1->password; ?>">
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label>Confirm Password : <sup style="color: red">*</sup></label>
                              <input type="password" class="form-control textWidth"  name="confirm_password" placeholder="Enter Confirm Password">
                          </div>
                        </div>
                    </div>
                </fieldset>
              </fieldset>
            <div class="">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-primary pull-right">Update<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
     </form>
   <?php } ?>
   <div id="googlemapmodal2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 4rem;">
          <div class="modal-header bg-info" style="background-color:#00619F;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Search Google Address</h6>
          </div>
          <div class="modal-body">
            <div class="row">
              <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
              <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--========================== Date picker javascript ====================================-->
    <script type="text/javascript">
      $(function() {
        $('#dob1').datetimepicker({
          format: 'DD MMMM, YYYY',
          maxDate: 'now',
          useCurrent: true
        });
        $('#company_aniversary1').datetimepicker({
          format: 'DD MMMM, YYYY',
          maxDate: 'now',
          useCurrent: true
        });
        $('#marriage_aniversary1').datetimepicker({
          format: 'DD MMMM, YYYY',
          maxDate: 'now',
          useCurrent: true
        });
      });
    </script>
   <!--========================== / Date picker javascript ====================================-->
   <!---------------------------------------- Primary and secondary account ---------------------------------- -->
   <script type="text/javascript">
      $(document).ready(function(){
          $("#parentid1").select2();
          $(".countries").select2();
          $("#state1").select2();
          $("#registration_type").select2();
          $(".type").select2();
          $(".group").select2();
          $(".location").select2();
          $("#credit_term").select2();
          $(".account_manager").select2({
            placeholder: "Select Account Manager"
          });
          $("#business1").select2({
            placeholder: "Select Business Segment"
          });
      });
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

           dob: {
             validators: {
               notEmpty: {
                 message: 'Please Select DOB'
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
                  message: 'Please Enter Password'
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
  
     $(document).ready(function(e) {
       $("#EditCustomerForm").on('submit', (function(e) {
         //e.preventDefault();
         if (e.isDefaultPrevented()) {
           //alert('invalid');
         } else {

           $.ajax({
             url: "<?php echo base_url('admin/Customer/update'); ?>",
             type: "POST",
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData: false,
             success: function(data) {
               // alert(data);
               new PNotify({
                 title: 'Edit Contact',
                 text: 'Contact Information Updated Successfully!',
                 type: 'success'
               });

               setTimeout(function() {
                 window.location = "<?php echo base_url('admin/Customer'); ?>";
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
   
     function updatestate(val) {
       // alert(val);
       $.ajax({
         type: "POST",
         url: '<?php echo base_url('admin/Customer/getstate') ?>',
         data: 'country_id=' + val,
         success: function(data) {
           // alert(data);
           $("#state1").html(data);
         }
       });
     }
   </script>
   <!--  -->

   <!--=============================================== multiselect employee ================================== -->
   <script type="text/javascript">
    //  jQuery('#business1').multiselect({
    //    enableFiltering: true,
    //    maxHeight: 400,
    //    enableCaseInsensitiveFiltering: true,
    //    nonSelectedText: 'Select business segment',
    //    numberDisplayed: 10,
    //    selectAll: false,
    //    onChange: function(option, checked) {
    //      // Get selected options.
    //      var selectedOptions = jQuery('#business1 option:selected');

    //      if (selectedOptions.length >= 10) {
    //        // Disable all other checkboxes.
    //        var nonSelectedOptions = jQuery('#business1 option').filter(function() {
    //          return !jQuery(this).is(':selected');
    //        });

    //        nonSelectedOptions.each(function() {
    //          var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //          input.prop('disabled', true);
    //          input.parent('li').addClass('disabled');
    //        });

    //        new PNotify({
    //          title: 'Message',
    //          text: 'Please Select only 10 business segment',
    //          type: 'warning'
    //        });
    //      } else {
    //        // Enable all checkboxes.
    //        jQuery('#business1 option').each(function() {
    //          var input = jQuery('input[value="' + jQuery(this).val() + '"]');
    //          input.prop('disabled', false);
    //          input.parent('li').addClass('disabled');
    //        });
    //      }
    //    }
    //  });
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
   <script>
     function initialize2() {
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
                    document.getElementById("address2").value = location_name;
                    document.getElementById("g_lat_edit").value = lat;
                    document.getElementById("g_long_edit").value = lng;
                    $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                    $("#googlemapmodal2").modal('hide');
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
     function open_google_map_edit() {
      $("#googlemapmodal2").modal('show');
      initialize2();
    }
   </script>