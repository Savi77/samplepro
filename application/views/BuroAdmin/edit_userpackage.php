	          
       
 <?php 
  foreach ($edit_package->result() as  $package) 
  {  
 ?>
        <div class="col-md-10 col-md-offset-1">
          <form class="form-horizontal" id="edit_categoryform">
               <input type="hidden" name="uspackage_id" id="uspackage_id" value="<?= $package->uspackage_id?>">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="Category Name">Package Name / Duration :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="uspackage_duration" name="uspackage_duration" placeholder="Enter Package Name / Duration" value="<?= $package->uspackage_duration?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="category_desc">Package Amount :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="uspackage_amount2" name="uspackage_amount" placeholder="Enter Package Amount" maxlength="10"  value="<?= $package->uspackage_amount?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="category_desc">Package Description :</label>
                  <div class="col-sm-9">
                   <textarea class="form-control" name="uspackage_desc" id="uspackage_desc"><?= $package->uspackage_desc?></textarea> 
                  </div>
                </div>
                <br/>
                <div class="form-group">        
                   <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" class="btn bg-teal btn-xlg hvr-grow" data-style="expand-right" data-spinner-size="20">
                           <span class="ladda-label">Update Details</span>
                            <div class="ladda-progress" style="width: 159px;"></div>
                      </button>
                    </div>
                   <div class="col-sm-3">
                     <span id="preview4"></span>
                  </div>
                </div>
              </form>
		   </div>
<?php } ?>	   

<script type="text/javascript">
  $('#uspackage_amount2').keypress(function(event)
   {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) 
    {
      event.preventDefault();
    }
  });
</script>
<script type="text/javascript">
    $(document).ready(function() 
      {
          $('#edit_categoryform').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                uspackage_duration: {
                        validators: {
                            notEmpty: {
                                message: 'Package name is required'
                            }
                        }
                    },
                uspackage_amount: {
                    validators: {
                       notEmpty: {
                                message: 'Package amount is required'
                            }
                      }
                   },             
                 package_desc1: {
                    validators: {
                       notEmpty: {
                                message: 'Package description is required'
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
       $("#edit_categoryform").on('submit',(function(e)
           {
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
                }
              else
              {
                 $("#preview4").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                  $.ajax({
                        url: '<?php echo base_url('admin/UserSubscriptionPackage/update_package') ?>',
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data)
                          {
                              $("#preview4").hide();
                             //alert(data);
                             new PNotify({
                                           title: 'Update Package',
                                           text: 'Package details updated successfully',
                                           type: 'success'
                                  });
                                setTimeout(function()
                                 {
                                     window.location="<?php echo base_url('admin/UserSubscriptionPackage') ?>";
                                 }, 1200);
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