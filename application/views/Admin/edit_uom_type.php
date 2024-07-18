
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edituom->result() as $value) {
  ?>
        <form class="form-horizontal" id="UpdateUOM">
				    <input type="hidden" class="form-control" id="uom_id" name="uom_id" value="<?= $value->uom_id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">UOM Type <span style="color: red;">*</span></label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="type" name="type" value="<?= $value->uom_type ?>" placeholder="Enter UOM Type" maxlength="50" >
            </div>
          </div>

				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
				      <button type="submit" class="btn btn-primary pull-right">Update <i class="icon-arrow-right14 position-right"></i></button>
				    </div>
				  </div>
		  </form>

<?php } ?>




<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#UpdateUOM").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/UOM/Edit_Add_uom');?>",
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
                                                  //  new PNotify({
                                                  //               title: 'Edit Form',
                                                  //               text: 'Updated  Successfully',
                                                  //               type: 'success'
                                                  //              });
                                                  $("#UpdatesuccessModal").modal('show');
                                                  });

                                                  //  setTimeout(function()
                                                  //    {
                                                  //        window.location="<?php echo base_url('admin/UOM');?>";
                                                  //    }, 900);
                                         
                                        
                                    },
                                  error: function() 
                                  {
                                    $("#updateErrorModal").modal('show');
                                    }           
                               });
                    }
                    return false;
                
                }));
            });
</script>

<script type="text/javascript">
$(document).ready(function() {
$('#UpdateUOM').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
             type: {
                  validators: {
                      notEmpty: {
                          message: 'Please Enter UOM Type'
                      }
                }
                }
        }
    });
});

</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">UOM Type Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UOM'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UOM'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

