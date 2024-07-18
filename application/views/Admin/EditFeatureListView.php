
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>

  <?php 
  foreach ($EditArray as $res) 
  {
      $ids = array();
      $selected = $res->Privilegeids;
      
      $selectedregion = trim($selected, ',');
      $explode=explode(",", $selectedregion);
      for ($i=0; $i <count($explode); $i++) 
      { 
         $re_array_id=$explode[$i];
         array_push($ids, $re_array_id);
      }

  ?>
      <form  id="editform" method="post">
          <input type="hidden" name="component_id" value="<?= $res->component_id;?>">
          <div class="panel panel-flat">
              <div class="panel-body">
                <fieldset>
                  <div class="row">
                      <div class="col-md-12"> 
                        <div class="form-group">
                           <label>Title : <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="component_title" value="<?= $res->component_title;?>" autocomplete="off">
                        </div>
                      </div>          
                  </div>
                </fieldset>   

                        <fieldset>
                          <div class="row">
                           <div class="col-md-12"> 
                                <div class="form-group">
                                   <label>Select Multiple Privilege :</label>
                                  <div class="multi-select-full">
                                    <select class="multiselect-select-all" multiple="multiple" name="Privilegeids[]">
                                      <?php 
                                       foreach ($privilege_list as  $row) 
                                        {  
                                            $privilege_id=$row->privilege_id;
                                            
                                            if (in_array($privilege_id, $ids))
                                              { ?>
                                                <option value="<?php echo $row->privilege_id ?>" selected="selected">
                                                  <?php echo $row->privilege ?>
                                                </option>
                                            <?php 
                                              }
                                            else
                                              { ?>
                                                <option value="<?php echo $row->privilege_id ?>">
                                                  <?php echo $row->privilege ?>
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
              component_title: {
                      validators: {
                          notEmpty: {
                              message: 'Title is required'
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
                     url: "<?php echo base_url('admin/FeatureList/UpdateDetails'); ?>",
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
                                        title: 'Update Feature',
                                        text: 'Updated Successfully',
                                        type: 'success'
                                       });
                          });
                         setTimeout(function()
                           {
                               window.location="<?php echo base_url('admin/FeatureList');?>";
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

