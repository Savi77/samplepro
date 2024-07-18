<?php foreach($edit_intr->result() as $row) { ?>
		<form class="form-horizontal" id="edit_InterestForm">
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="email">Product Name <span style="color: red;">*</span></label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="interest" name="interest" value="<?= $row->interest; ?>" placeholder="Enter Language" maxlength="35">
		       <input type="hidden" class="form-control" name="id" value="<?= $row->id ?>">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-3 col-sm-9">
		      <button type="submit" class="btn btn-primary  pull-right">Submit&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
		    </div>
		  </div>
		</form>
<?php } ?>



<script type="text/javascript">
  $(document).ready(function() 
  {
      $('#edit_InterestForm').bootstrapValidator({
          message: 'This value is not valid',
          fields: {
                   interest: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Product Name'
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
             $("#edit_InterestForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Master_product/edit_area_interest_add');?>",
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
                                                                title: 'Edit Product',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Master_product');?>";
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
