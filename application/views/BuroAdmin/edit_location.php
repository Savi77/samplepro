
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_masterlocation->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditLocation">
				    <input type="hidden" class="form-control" id="location_id" name="location_id" value="<?= $value->location_id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Location <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="location" name="location" value="<?= $value->location ?>" placeholder="Enter Location" maxlength="50" >
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
        $(document).ready(function (e)
           {

             $("#EditLocation").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Master/Edit_Add_location');?>",
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
                                                         window.location="<?php echo base_url('admin/Master/locationlist');?>";
                                                     }, 300);
                                         
                                        
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

<script type="text/javascript">
$(document).ready(function() {
$('#EditLocation').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               location: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Location'
                        }
                }
            }
    }
});
});
</script>


