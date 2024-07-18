
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

  <?php 
  foreach ($editactivity_detail->result() as $value) 
  {
    ?>
        <form class="form-horizontal" id="EditType">
          <div class="panel panel-flat">
            <div class="panel-body">    
    				    <input type="hidden" class="form-control" id="activity_id" name="activity_id" value="<?= $value->activity_id ?>">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Activity Title <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="activity_title" name="activity_title" value="<?= $value->activity_title ?>" placeholder="Enter Activity Title" maxlength="50" autocomplete="off">
                  </div>
                </div>
      				  <div class="form-group"> 
      				    <div class="col-md-offset-2 col-md-10">
      				      <button type="submit" class="btn btn-primary pull-right">Update&nbsp;<span id="preview2"></span></button>
      				    </div>
      				  </div>
            </div>
          </div>  
		  </form>

<?php } ?>



<script type="text/javascript">
$(document).ready(function() {
$('#EditType').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               activity_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Activity Title'
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
                            $("#preview2").show();
                            $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                            $.ajax({
                                 url: "<?php echo base_url('admin/Leads/Edit_Add_activity');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    $("#preview2").hide();
                                    PNotify.removeAll()
                                         // alert(data);
                                   $(function(){
                                     new PNotify({
                                                  title: 'Edit Activity',
                                                  text: 'Updated  Successfully',
                                                  type: 'success'
                                                 });
                                    });
                                     setTimeout(function()
                                       {
                                           window.location="<?php echo base_url('admin/Leads/activity');?>";
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



