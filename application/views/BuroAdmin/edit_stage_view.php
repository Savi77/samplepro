
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editstage->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditType">
				    <input type="hidden" class="form-control" id="stage_id" name="stage_id" value="<?= $value->stage_id ?>">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Stage Title <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="stage_title" name="stage_title" value="<?= $value->stage_title ?>" placeholder="Enter Stage Title" maxlength="50" >
            </div>
          </div>

				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-primary pull-right">Update</button>
				    </div>
				  </div>
		  </form>

<?php } ?>



<script type="text/javascript">
$(document).ready(function() {
$('#EditType').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               stage_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Stage Title'
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

<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#EditType").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                      return false;
                    }
                    else
                    {
                           
                           // alert('test');  

                              $.ajax({
                                 url: "<?php echo base_url('admin/Leads/Edit_Add_stage');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    PNotify.removeAll()
                                         // alert(data);

                                                     $(function(){
                                                   new PNotify({
                                                                title: 'Edit Form',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Leads/Stage');?>";
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



