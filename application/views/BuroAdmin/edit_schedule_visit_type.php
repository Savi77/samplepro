
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($editscheduletype->result() as $value) 
{
  ?>
        <form class="form-horizontal" id="Updatescheduetype">
				    <input type="hidden" class="form-control" id="visittype_id" name="visittype_id" value="<?= $value->id ?>">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Schedule Visit Type <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="type_name" name="type_name" value="<?= $value->type_name ?>" placeholder="Enter Schedule Visit Type" maxlength="35" >
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

             $("#Updatescheduetype").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Schedule_visit_type/Edit_Add_scheduletype');?>",
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
                                                         window.location="<?php echo base_url('admin/Schedule_visit_type');?>";
                                                     }, 900);
                                         
                                        
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
$('#Updatescheduetype').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
             type_name: {
                  validators: {
                      notEmpty: {
                          message: 'Please Enter Schedule Visit Type'
                      }
                }
                }
        }
    });
});

</script>


