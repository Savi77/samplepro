
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_product_group->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditProductGroup">
				    <input type="hidden" class="form-control" id="pd_grp_id" name="pd_grp_id" value="<?= $value->id ?>">

           <div class="form-group">
              <label class="control-label col-sm-3" for="email">Brand Name <span style="color: red;">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?= $value->brand_name ?>" placeholder="Enter Brand Name" maxlength="40">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Specification <span style="color: red;">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="specs" name="specs" placeholder="Enter Specification" value="<?= $value->specs ?>" maxlength="20">
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

             $("#EditProductGroup").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                      return false;
                    }
                    else
                    {

                              $.ajax({
                                 url: "<?php echo base_url('admin/Product_service/Edit_Add_product_group');?>",
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
                                                         window.location="<?php echo base_url('admin/Product_service/product_group');?>";
                                                     }, 2000);
                                         
                                        
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
$('#EditProductGroup').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               brand_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Brand Name'
                        }
                }
            },
            specs: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Specification'
                        }
                }
            },
    }
});
});
</script>


