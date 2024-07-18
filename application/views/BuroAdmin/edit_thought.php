
  <?php 

  foreach ($edit_thought as $res) 
  {
    $thought=$res->thought;
    $thought_id=$res->thought_id;
  ?>
        <form  id="editform" method="post">
          <div class="panel panel-flat">
            <div class="panel-body">
              <input type="hidden" name="thought_id" value="<?= $thought_id;?>">
              <fieldset>
               <div class="row">
                 <div class="col-md-12"> 
                        <fieldset>
                         <div class="row">
                           <div class="col-md-12"> 
                              <div class="form-group">
                                <label>Enter Thought :</label>
                                 <textarea class="form-control" name="thought" rows="2" maxlength="500"><?= $thought;?></textarea>
                              </div>
                            </div>
                          </div>
                        </fieldset>
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
                   
               thought: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Thought'
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
             
             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Thoughts/Update'); ?>",
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
                                                      title: 'Update Thought',
                                                      text: 'Updated Successfully',
                                                      type: 'success'
                                                     });
                                        });
                                       setTimeout(function()
                                         {
                                             window.location="<?php echo base_url('admin/Thoughts');?>";
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

