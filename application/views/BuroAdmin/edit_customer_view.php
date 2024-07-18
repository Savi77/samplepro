   <!-- ==============multiselect ================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <!-- ======================= -->

  <!-- ==============multiselect ================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <!-- ======================= -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<style type="text/css">
  
  .pickadate 
  {
    z-index: 100000;
  }

/*  Display datepicker on modal (popup)  */

      .modal
      {
         z-index: 20;   
      }
      .modal-backdrop
      {
         z-index: 10;        
      }​

</style>
<!--=============================== multiple select ======================================-->
  <style type="text/css">
    
    /*--------------------------------------------------*/
      .multiselect-container>li>a>label.checkbox 
      {
          margin: -6px 12px;
      }

      .multiselect-container 
      {
            min-width: 275px;
            max-height: 250px;
            overflow-y: auto;
        }

      .btn-group > .btn:first-child {
    margin-left: 0;
    width: 275px !important;
}

  </style>
<!--===============================/ multiple select ======================================-->
<?php foreach($edit_customerresult->result() as $row1) {

         if ($row1->company_anniversary!='') 
        {
            // $company_anniversary = date("Y-m-d", strtotime($row1->company_anniversary));
            $company_anniversary = date("d F, Y", strtotime($row1->company_anniversary));
        }
        else 
        {
            $company_anniversary = '';
        }


        if ($row1->marriage_anniversary!='') 
        {
           // $marriage_anniversary = date("Y-m-d", strtotime($row1->marriage_anniversary));
           $marriage_anniversary = date("d F, Y", strtotime($row1->marriage_anniversary));
        }
        else
        {
          $marriage_anniversary = '';
        }
 ?>
          <form class="form-horizontal" id="EditCustomerForm">

                <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?= $row1->customer_id ?>">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-body" style="padding: 10px;">
                                <div class="form-group" style="margin-bottom: 4px;">
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
                                                        <input type="radio" name="custtype" class="styled" value="primary" onclick="customertype(this.value)">
                                                        Primary
                                                      </label>

                                                      <label class="radio-inline">
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

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Organization Name <span style="color: red;">*</span></label>
                   <div class="col-sm-4" id="parentlist_display1" style="<?= $parentdisplay ?>">
                      <input type="text" class="form-control" id="ordanizer_name1" name="ordanizer_name" placeholder="Enter organization name" maxlength="100" value="<?= $row1->company_name ?>">
                    </div>
                     <div class="col-sm-4"  style="<?= $parentdisplay1 ?>" id="forsecondarylist_display1">
                        <select class="select-search form-control" name="parentid" id="parentid1">
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
                  <label class="control-label col-sm-2" for="email">
                    Address
                     <a onclick="open_google_map2()">( Use Google Address )</a> 

                     <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <textarea class="form-control" id="address2" name="address" placeholder="Enter address" maxlength="200"><?= $row1->address ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Contact Person <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person name" maxlength="50" value="<?= $row1->contact_person_name1 ?>">
                  </div>
                  <label class="control-label col-sm-2" for="email">Contact Number <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" readonly id="contact_number1" name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->phone_no ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Alternate Number</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Enter contact alternate number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->alternate_number ?>">
                  </div>
                  <label class="control-label col-sm-2" for="email">Landline Number</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="landline_number" name="landline_number" placeholder="Enter Landline Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row1->landline_number ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email ID <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter email" maxlength="35" value="<?= $row1->email ?>">
                  </div>
                  <label class="control-label col-sm-2" for="email">Alternate Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="alternate_email_id" name="alternate_email_id" placeholder="Enter Alternate Email" value="<?= $row1->alternate_email ?>" maxlength="35">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Date of Birth <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="dob1" name="dob" placeholder="Select DOB" maxlength="50" value="<?= date("d F, Y", strtotime($row1->dob)) ?>">
                  </div>
                  <label class="control-label col-sm-2" for="email">Company Anniversary</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="company_aniversary1" name="company_aniversary" placeholder="Select Company Aniversary" maxlength="50" value="<?= $company_anniversary ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Marriage Anniversary</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="marriage_aniversary1" name="marriage_aniversary" placeholder="Select Marriage Aniversary" maxlength="50" value="<?= $marriage_anniversary ?>">
                  </div>
                  <label class="control-label col-sm-2" for="email">City <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="city2" name="city" placeholder="Enter City" maxlength="50" value="<?= $row1->city ?>">
                  </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-2" for="email">Country <span style="color: red;">*</span></label>
                    <div class="col-sm-4">
                        <select onChange="updatestate(this.value);" name="country" class="countries form-control" id="countryId">
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
                  <label class="control-label col-sm-2" for="email">State <span style="color: red;">*</span></label>
                  <div class="col-sm-4">
                    <select name="state" id="state1" class="form-control" >
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
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Type</label>
                    <div class="col-sm-4">
                      <select name="type" id="type" class="form-control" >
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
                    <?php

                      $ids = array();
                      foreach ($selected_buss->result() as  $buss) 
                      {  
                        $sel_buss_id = $buss->business_id;
                        array_push($ids, $sel_buss_id);
                      }
                    ?>
                    <label class="control-label col-sm-2" for="email">Business Segment</label>
                    <div class="col-sm-4">
                      <select name="business[]" id="business1" multiple class="form-control" >
                        <!-- <option value="">Select business segment</option> -->
                          <?php   
                            foreach ($business_list1 as $value1) 
                            {
                                 $business_id = $value1->business_id;
                                 $business = $row1->business_id;
                            // if ($business_id==$business) 
                            if (in_array($business_id, $ids))
                            { ?>
                                <option value="<?= $value1->business_id ?>" selected><?= $value1->business_name;?></option>
                          <?php } else { ?>

                                <option value="<?= $value1->business_id ?>"><?= $value1->business_name;?></option>
                           <?php } } ?> 

                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Location</label>
                  <div class="col-sm-4">
                   <select name="location" id="location" class="form-control" >
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
                   <label class="control-label col-sm-2" for="email">Group</label>
                  <div class="col-sm-4">
                   <select name="group" id="group" class="form-control" >
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
               

                <div class="form-group"> 
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                  </div>
                </div>
            </form>
<?php } ?>
<!---------------------------------------- Primary and secondary account ---------------------------------- -->
      <script type="text/javascript">
            function customertype(val)
            {
              // alert(val);
                if(val=='secondary')
                {
                    $('#parentlist_display1').hide();
                    $('#forsecondarylist_display1').show();
                }
                else
                {
                    $('#forsecondarylist_display1').hide();
                    $('#parentlist_display1').show();
                }
            }

      </script>
<!---------------------------------------- / Primary and secondary account ---------------------------------- -->
<!--========================== Date picker javascript ====================================-->
      <script type="text/javascript">
          $(function () 
          {
              $('#dob1').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
              $('#company_aniversary1').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
              $('#marriage_aniversary1').datetimepicker({format: 'DD MMMM, YYYY',maxDate: 'now', useCurrent: true});
          });
      </script>
<!--========================== / Date picker javascript ====================================-->
<script type="text/javascript">
   $("#dob1").on("dp.change", function (e) 
    {
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
            }
    }
});
});
</script>
    
<!--======================================= / Validation login  ==========================================-->

<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#EditCustomerForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Customer/update');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         // alert(data);
                                                      new PNotify({
                                                                title: 'Edit Customer',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Customer');?>";
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

<!--  -->
<script>
 function updatestate(val) 
  {
    // alert(val);
    $.ajax({
    type: "POST",
     url: '<?php echo base_url('admin/Customer/getstate') ?>',
    data:'country_id='+val,
    success: function(data)
    {
      // alert(data);
       $("#state1").html(data);
    }
    });
  }
</script>
<!--  -->

<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
jQuery('#business1').multiselect({
        enableFiltering: true,
        maxHeight:400,
        enableCaseInsensitiveFiltering:true, 
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
                }
                else {
                    // Enable all checkboxes.
                    jQuery('#business1 option').each(function() {
                        var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }});
            
            
     /*Add This to Block SHIFT Key*/       
var shiftClick = jQuery.Event("click");
shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
           //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        }
        else {
            //alert('No shift hey');
        }
    });
</script>
<!-- ====================================================================================================================== -->