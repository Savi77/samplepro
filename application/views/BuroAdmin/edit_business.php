
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editbusiness->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditBusiness">
				    <input type="hidden" class="form-control" id="business_id" name="business_id" value="<?= $value->business_id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Business Title <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="business_name" name="business_name" value="<?= $value->business_name ?>" placeholder="Enter Business Title" maxlength="50" >
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

             $("#EditBusiness").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Master/Edit_Add_business');?>",
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
                                                         window.location="<?php echo base_url('admin/Master/businesslist');?>";
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
$('#EditBusiness').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               business_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Business Title'
                        }
                }
            }
    }
  });
});
</script>


