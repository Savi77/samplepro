
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editstatus->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditStatus">
				    <input type="hidden" class="form-control" id="order_status_id" name="order_status_id" value="<?= $value->order_status_id ?>">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Activity Title <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="status_name" name="status_name" value="<?= $value->name ?>" placeholder="Enter Order Status" maxlength="15" >
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

             $("#EditStatus").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Ecommerce/Edit_Add_status');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    PNotify.removeAll()
                                         // alert(data);

                                                   new PNotify({
                                                                title: 'Order Status Edit Form',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Ecommerce/status');?>";
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

<script type="text/javascript">
$(document).ready(function() {
$('#EditStatus').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               status_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Status Name'
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


