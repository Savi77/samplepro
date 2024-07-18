 

                    <?php foreach ($edit_title->result() as $key) 
                    {
                      ?> 
                        <form class="form-horizontal" id="edit_Form">

                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Title</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="edit_title" name="edit_title" placeholder="Enter Job Title" value="<?= $key->title ?>" maxlength="40">
                               <input type="hidden" class="form-control" id="edit_id" name="edit_id" placeholder="Enter Job Title" value="<?= $key->id ?>" maxlength="40">
                            </div>
                          </div>
                        <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Description</label>
                        <div class="col-sm-9">
                        <textarea type="text" class="form-control" id="edit_description" name="edit_description" placeholder="Enter Description" maxlength="250"><?= $key->description ?></textarea>
                        </div>
                        </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                            </div>
                          </div>
                        </form>

                    <?php } ?>



<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#edit_Form').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               edit_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Title'
                        }
                }
            },
            edit_description: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Description'
                        }
                }
            },
           
             emailid: {
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

             $("#edit_Form").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Job_Description/update_add_title');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);

                                                     $(function(){
                                                   new PNotify({
                                                                title: 'Edit Form',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Job_Description');?>";
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


