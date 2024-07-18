           
        <style type="text/css">
         .btn-group > .btn:first-child
          {
              margin-left: 0;
              width: 400px !important;
          }
        </style>    

        <?php

          if($lead_data->closure_date=='0000-00-00' || $lead_data->closure_date=='1970-01-01')
            {
              $closure_date=''; 
            }
          else
            {
              $closure_date=date("d F, Y",strtotime($lead_data->closure_date)); 
            }

            $ids = array();
            $selected = $lead_data->business_id;

            $selectedstudent = trim($selected, ',');
            $explode=explode(",", $selectedstudent);
            for ($i=0; $i <count($explode); $i++) 
            { 
              $student_id=$explode[$i];
               array_push($ids, $student_id);
            }


        ?>

        <div class="modal-header bg-info" style="background-color:#00619F;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Edit <?= $lead_data->customer_type;?> : <?= $lead_data->lead_generate_id;?> </h6>
        </div>
        <div class="modal-body">
          <div class="row" id="Lead_edit">                 
              <form id="EditLeadForm" method="post">
                  <input type="hidden" name="leadopp_type" value="<?= $lead_data->customer_type;?>">
                   <input type="hidden" name="leadopp_id" value="<?= $lead_data->leadopp_id;?>">
                  <div class="panel panel-flat">
                    <div class="panel-body">
                      <fieldset>
                        <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Company Name  : <sup style="color: red">*</sup></label>
                                  <input type="text" class="form-control" name="org_name_lead"  placeholder="Enter Company name" maxlength="50" autocomplete="off"  value="<?= $lead_data->company_name;?>"> 
                              </div>
                            </div>     
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Source :  <sup style="color: red">*</sup></label>
                                    <select name="source" id="source" class="form-control" >
                                      <option value="">Select Source</option>
                                        <?php   
                                          foreach ($source_details as $value) 
                                          {
                                        ?>
                                        <option value="<?= $value->source_id ?>" <?php if($value->source_id==$lead_data->source){echo 'selected';} ?>>
                                          <?= $value->source_title;?>
                                        </option>
                                       <?php } ?> 
                                   </select>
                              </div>
                            </div>
                        </div>
                      </fieldset>

                      <fieldset>
                        <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Contact Person : </label>
                                   <input type="text" class="form-control"  name="contact_person" placeholder="Enter contact person name" maxlength="50"  autocomplete="off" value="<?= $lead_data->contact_person_name1;?>">
                              </div>
                            </div>   
                           <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Stage :  <sup style="color: red">*</sup></label>
                                  <select name="stage" class="form-control" >
                                    <option value="">Select Stage</option>
                                      <?php   
                                        foreach ($stage_details as $value) 
                                        {

                                      ?>
                                      <option value="<?= $value->stage_id ?>"  <?php if($value->stage_id==$lead_data->stage){echo 'selected';} ?>>
                                        <?= $value->stage_title;?>
                                      </option>
                                     <?php } ?> 
                                 </select>
                              </div>
                            </div> 
                        </div>
                      </fieldset>

                      <fieldset>
                        <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Contact Number :  <sup style="color: red">*</sup></label>
                                   <input type="text" class="form-control"  name="contact_number1" placeholder="Enter contact number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off" value="<?= $lead_data->phone_no;?>"> 
                              </div>
                            </div> 

                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Interested In :  <sup style="color: red">*</sup></label>
                                  <select name="product_id" class="form-control" >
                                    <option value="">Select Interest</option>
                                      <?php   
                                        foreach ($product_list as $res) 
                                        {
                                      ?>
                                      <option value="<?= $res->product_id ?>"  <?php if($res->product_id==$lead_data->product_id){echo 'selected';} ?>>
                                        <?= $res->product_name;?>
                                      </option>
                                     <?php } ?> 
                                 </select>
                               </div>
                            </div> 
                        </div>
                      </fieldset>

                      <fieldset>
                        <div class="row">  
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Address : </label>
                                   <textarea class="form-control" name="address" placeholder="Enter address" rows="1" ><?= $lead_data->address;?></textarea>
                              </div>
                            </div>
                             <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Account Manager :  <sup style="color: red">*</sup></label>
                                  <select name="emp_id"  class="form-control" >
                                    <option value="">Select Account Manager</option>
                                      <?php   
                                        foreach ($employee_list as $emp) 
                                        {
                                      ?>
                                      <option value="<?= $emp->id;?>"   <?php if($emp->id==$lead_data->assign_to){echo 'selected';} ?>>
                                        <?= $emp->name;?>
                                      </option>
                                     <?php } ?> 
                                 </select>
                               </div>
                            </div>
                          </div>
                      </fieldset>  

                      <fieldset>
                          <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Email ID : </label>
                                  <input type="text" class="form-control" name="email_id" placeholder="Enter email" maxlength="35"  autocomplete="off"  value="<?= $lead_data->email;?>">
                              </div>
                            </div>
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Expected Revenue : </label>
                                  <input type="text" class="form-control"  name="project_business_value" placeholder="Enter Expected Revenue" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'  autocomplete="off"  value="<?= $lead_data->project_business_value;?>">
                              </div>
                            </div> 
                         </div>
                      </fieldset>
                      <fieldset>
                        <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Business Segment : </label>
                                    <select name="business[]" id="business_lead" multiple class="form-control" >
                                      <span class="caret"></span>
                                      <?php   
                                        foreach ($business_list as $value1) 
                                        {
                                           $business_id=$value1->business_id;
                                      ?>
                                      <option value="<?= $value1->business_id ?>"
                                          <?php 
                                          if (in_array($business_id, $ids))
                                            {
                                              echo 'selected="selected"';
                                            }
                                          ?>
                                         >
                                        <?= $value1->business_name;?>
                                      </option>
                                     <?php } ?> 
                                   </select>
                              </div>
                            </div> 
                             <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Expected Closure Date : </label>
                                    <input type="text" class="form-control" id="edit_closure_date" name="closure_date" placeholder="Expected Closure Date" autocomplete="off"  value="<?= $closure_date;?>">
                              </div>
                            </div> 
                        </div>
                      </fieldset>   
                      <fieldset>
                          <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group">
                                 <label>Tag : </label>
                                  <input type="text" class="form-control" name="tag" placeholder="Enter Tag" maxlength="40"  autocomplete="off" value="<?= $lead_data->tag;?>">
                              </div>
                            </div>
                              <div class="col-md-6"> 
                                <div class="form-group">
                                   <label>Remark : </label>
                                   <textarea class="form-control"  id="remarkslead"   name="remarks" placeholder="Enter Remark" rows="2"  maxlength="500"><?= $lead_data->remarks;?></textarea>  
                                     <div class="row">
                                        <div class="col-md-6">
                                            <span style="font-size:13px; ">Max: 500 character</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="col-md-10">
                                                 <p class="pull-right" style="font-size:13px;">Char Left:</p>
                                                </div>
                                                <div class="col-md-2">
                                                  <div id="charNum" style="font-size:13px; color:gray;">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div> 
                         </div>
                      </fieldset>
                     <br/>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">Update <?= $lead_data->customer_type;?> <i class="icon-arrow-right14 position-right"></i></button>
                      <span id="preview31"></span>
                  </div>  
                </div>
              </div>
            </form>
          </div>
        </div>



     <script type="text/javascript">
      $("#remarkslead").keyup(function()
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

    <script type="text/javascript">
      $(function () 
      {
          $('#edit_closure_date').datetimepicker({format: 'DD MMMM, YYYY',useCurrent: true});
      });
    </script>

    <script type="text/javascript">

      $(document).ready(function()
      {
          $('#EditLeadForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                       org_name_lead: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Company Name'
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
                      source: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Source'
                                  }
                          }
                      },
                      product_id: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Interest'
                                  }
                          }
                      },
                      emp_id: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Account Manager '
                                  }
                          }
                      },
                      stage: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Stage'
                                  }
                          }
                      }                  
                }
            });
        });
    </script>



    <script type="text/javascript">
      $(document).ready(function (e)
       {
          $("#EditLeadForm").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  // alert('invalid');
                }
                else
                {
                  $("#preview31").show();
                  $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                  $.ajax({
                            url: "<?php echo base_url('admin/Leads/UpdateLead');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                  // alert(data);
                                  $("#preview31").hide();
                                  new PNotify({
                                              title: 'Update <?= $lead_data->customer_type;?>',
                                              text: '<?= $lead_data->customer_type;?> Updated  Successfully',
                                              type: 'success'
                                             });

                                 setTimeout(function()
                                   {
                                       window.location.reload();
                                   }, 1000); 
                                   return false;  
   
                              },
                            error: function() 
                            {
                               $(function(){
                                             new PNotify({
                                                          title: 'Leads Transfer',
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








    <script type="text/javascript">
      jQuery('#business_lead').multiselect({
              enableFiltering: true,
              maxHeight:170,
              enableCaseInsensitiveFiltering:true, 
              nonSelectedText: 'Select business segment', 
              numberDisplayed: 10, 
              selectAll: false, 
              onChange: function(option, checked) {
                      // Get selected options.
                      var selectedOptions = jQuery('#business_lead option:selected');
       
                      if (selectedOptions.length >= 10) {
                          // Disable all other checkboxes.
                          var nonSelectedOptions = jQuery('#business_lead option').filter(function() {
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
                          jQuery('#business option').each(function() {
                              var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                              input.prop('disabled', false);
                              input.parent('li').addClass('disabled');
                          });
                      }
                  }});
                 
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
