
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_targettype->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditTargetType">
				    <input type="hidden" class="form-control" id="targettype_id" name="targettype_id" value="<?= $value->targettype_id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Target Type <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="target_type" name="target_type" value="<?= $value->target_type ?>" placeholder="Enter Target Type" maxlength="50" >
            </div>
          </div>
          <div class="form-group" id="prd_grp">
            <label class="control-label col-sm-3" for="email">Select UOM</label>
            <div class="col-sm-9">
              <select class="select-search form-control" name="uom_type" id="uom_type">
                    <option value="">Select UOM</option>
                     <?php 
                          $uom_id = $value->uom_id;
                        foreach ($get_data->result() as $uom) 
                        {
                          if ($uom->uom_id == $uom_id)
                          { ?>
                            <option value="<?= $uom->uom_id ?>" selected><?= $uom->uom_type;?></option>
                        <?php  } else {
                      ?>
                        <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                     <?php } } ?> 
                </select>
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

             $("#EditTargetType").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Target/Edit_Add_targettype');?>",
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
                                                         window.location="<?php echo base_url('admin/Target/target_type');?>";
                                                     }, 500);
                                         
                                        
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
$('#EditTargetType').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               target_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Target Type'
                        }
                }
            },
            uom_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select UOM Type'
                        }
                }
            }
    }
});
});
</script>


