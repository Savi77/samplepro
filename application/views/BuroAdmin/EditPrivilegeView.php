
  <?php 
  foreach ($EditArray as $res) 
  {
  ?>
      <form  id="editform" method="post">
          <input type="hidden" name="privilege_id" value="<?= $res->privilege_id;?>">
          <div class="panel panel-flat">
              <div class="panel-body">
                <fieldset>
                  <div class="row">
                      <div class="col-md-12"> 
                        <div class="form-group">
                           <label>Privilege : <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="privilege" value="<?= $res->privilege;?>">
                        </div>
                      </div> 

                      <div class="col-md-12"> 
                        <div class="form-group">
                           <label>Privilege Key : <sup style="color: red">*</sup></label>
                            <input type="text" class="form-control" name="privilege_key" placeholder="E.g. ADD,..." value="<?= $res->privilege_key;?>">
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
              privilege: {
                      validators: {
                          notEmpty: {
                              message: 'Privilege is required'
                          }
                  }
              },
                   privilege_key: {
                          validators: {
                              notEmpty: {
                                  message: 'Privilege Key Required'
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
                  $.ajax({
                     url: "<?php echo base_url('BA/Privilege/UpdatePrivelege'); ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                      {
                         $(function()
                         {
                           new PNotify({
                                        title: 'Update Privilege',
                                        text: 'Updated Successfully',
                                        type: 'success'
                                       });
                          });
                         setTimeout(function()
                           {
                               window.location="<?php echo base_url('BA/Privilege');?>";
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

