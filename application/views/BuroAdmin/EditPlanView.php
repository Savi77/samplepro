
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>

  <?php 
  foreach ($EditArray as $res) 
  {
      $ids = array();
      $selected = $res->module_id;
      $selectedregion = trim($selected, ',');
      $explode=explode(",", $selectedregion);
      for ($i=0; $i <count($explode); $i++) 
      { 
         $re_array_id=$explode[$i];
         array_push($ids, $re_array_id);
      }

  ?>
      <form  id="editform" method="post">
          <input type="hidden" name="plan_id" value="<?= $res->plan_id;?>">
          <div class="panel panel-flat">
              <div class="panel-body">
                <fieldset>
                  <div class="row">
                      <div class="col-md-12"> 
                        <div class="form-group">
                           <label>Plan Title : <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="plan_name" value="<?= $res->plan_name;?>" autocomplete="off">
                        </div>
                      </div>          
                  </div>
                </fieldset>   
                  <fieldset>
                    <div class="row">
                        <div class="col-md-12"> 
                          <div class="form-group">
                             <label>Plan Price : <sup style="color: red">*</sup></label>
                              <input type="text" class="form-control" name="price"  value="<?= $res->price;?>"  autocomplete="off"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' >
                          </div>
                        </div>          
                    </div>
                  </fieldset>  
                  <fieldset>
                    <div class="row">
                        <div class="col-md-6"> 
                          <div class="form-group">
                             <label>Discount Amount : <sup style="color: red">*</sup></label>
                              <input type="text" class="form-control" name="discount_amount"  value="<?= $res->discount_amount;?>"  autocomplete="off"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' >
                          </div>
                        </div> 
                        <div class="col-md-6"> 
                          <div class="form-group">
                             <label>Discount Percentage : <sup style="color: red">*</sup></label>
                              <input type="text" class="form-control" name="discount_perc"  value="<?= $res->discount_perc;?>"  autocomplete="off"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' >
                          </div>
                        </div>  
                    </div>
                  </fieldset> 

                  <fieldset>
                    <div class="row">
                     <div class="col-md-12"> 
                          <div class="form-group">
                             <label>Select Multiple Module :</label>
                            <div class="multi-select-full">
                              <select class="multiselect-select-all" multiple="multiple" name="module_ids[]">
                                <?php 
                                 foreach ($module_list as  $row) 
                                  {  
                                      $module_id=$row->module_id;
                                      
                                      if (in_array($module_id, $ids))
                                        { ?>
                                          <option value="<?php echo $row->module_id ?>" selected="selected">
                                            <?php echo $row->module_name ?>
                                          </option>
                                      <?php 
                                        }
                                      else
                                        { ?>
                                          <option value="<?php echo $row->module_id ?>">
                                            <?php echo $row->module_name ?>
                                          </option>
                                        <?php } ?>  
                                    <?php  
                                      } 
                                  ?>
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>
                  </fieldset>
               <br/>
              <div class="text-center">
              <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
              <span id="preview2"></span>
            </div>  
          </div>
        </div>
    </form>
<?php } ?>


<script type="text/javascript">
$(document).ready(function() {
    $('#editform').bootstrapValidator({
        message: 'This value is not valid',
        fields: {                
                   module_name: {
                          validators: {
                              notEmpty: {
                                  message: 'Title is Required'
                              }
                      }
                  },
                   price: {
                          validators: {
                              notEmpty: {
                                  message: 'Module Price is Required'
                              }
                      }
                  },
        }
    });
});
</script>

<script type="text/javascript">
  $(document).ready(function (e)
     {

       $("#editform").on('submit',(function(e)
           {  
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                //alert('invalid');
              }
              else
              {
                  $("#preview2").show();
                  $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                  $.ajax({
                     url: "<?php echo base_url('BA/PlanMaster/UpdateDetails'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                        $("#preview2").hide();
                         $(function()
                         {
                           new PNotify({
                                        title: 'Update Plan',
                                        text: 'Updated Successfully',
                                        type: 'success'
                                       });
                          });
                         setTimeout(function()
                           {
                               window.location="<?php echo base_url('BA/PlanMaster');?>";
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

 