
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_targettype->result() as $value) {
  ?>
        <form class="form-horizontal" id="EditTargetType">
				    <input type="hidden" class="form-control" id="targettype_id" name="targettype_id" value="<?= $value->targettype_id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-12" for="email">Target Type <span style="color: red;">*</span></label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="target_type123" name="target_type" value="<?= $value->target_type ?>" placeholder="Enter Target Type" maxlength="50" onkeyup="chk_target_type_list_edit()">
              <input type="hidden" class="form-control" id="target_type_id123" name="target_type_id123" value="<?= $value->targettype_id ?>">
              <small id="error_target_type_list123" style="color: #f00 !important;"></small>
            </div>
          </div>
          <div class="form-group" id="prd_grp">
            <label class="control-label col-sm-12" for="email">Select UOM <span style="color: red;">*</span></label>
            <div class="col-sm-12">
              <!-- <select class="form-control" name="uom_type" id="uom_type1" data-placeholder="Select UOM" >
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
              </select> -->

              <select class="form-control" data-placeholder="Select UOM" name="uom_type" id="uom_type1">
                <option value="">Select UOM</option>
                <?php 
                        $uom_id = $value->uom_id;
                      foreach ($get_data->result() as $uom) 
                      {
                        if ($uom->uom_id == $uom_id)
                        { ?>
                          <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                      <?php  } else {
                    ?>
                      <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                <?php } } ?>
              </select>

            </div>

          </div>

				  <div class="form-group" style="margin-bottom:0;"> 
				    <div class="col-sm-offset-3 col-sm-12" style="text-align:right;">
				      <button type="submit" class="btn btn-primary pull-right" id="target_type_list_sub_btn123">Update<i class="icon-arrow-right14 position-right"></i></button>
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
                                    // PNotify.removeAll()
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
                                                  //        window.location="<?php echo base_url('admin/Target/target_type');?>";
                                                  //    }, 500);
                                         
                                        
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

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Target Type Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target/target_type'); ?>">
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
                <a href="<?php echo base_url('admin/Target/target_type'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>

<script>
   $('#uom_type1').select2({
        dropdownParent: $('#modal_default1')
    });
    
</script>

<script>

    function chk_target_type_list_edit()
    {
        target_type = $('#target_type123').val();
        target_type_id = $('#target_type_id123').val();
        
        if (target_type == '') 
        {
            $('#error_target_type_list123').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_target_type_list_edit'); ?>",
                dataType: "html",
                type: "POST",
                data: {target_type: target_type,target_type_id: target_type_id},
                success: function(data) 
                {
                    if (data == 1) 
                    {
                        $('#error_target_type_list123').empty();
                        $('#error_target_type_list123').css('display','block');
                        $('#error_target_type_list123').html('Please add another target type , this target type is already created.');
                        $("#target_type_list_sub_btn123").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_target_type_list123').hide();
                    }
                }
            });
        }
    }
</script>
