<?php foreach($edit_intr->result() as $row) { ?>
		<form class="form-horizontal" id="edit_InterestForm">

        <div class="form-group">
          <label class="control-label col-sm-12" for="email">Select Product Category <span style="color: red;">*</span></label>
          <div class="col-sm-12">
            <?php
            $catagory_name = $this->db->select('interest')->from('tbl_categories')->where('id',$row->menu_id)->get()->row()->interest;
            ?>
             <select name="menu_id" class="form-control" id="menu_id_8" data-placeholder="Select Product Category" value="<?= $catagory_name;?>">
                <option value="<?=$row->menu_id?>"><?= $catagory_name;?></option>
                  <?php   
                    foreach ($get_menu_list as $value) 
                    {
                      if($row->menu_id==$value->id)
                      {
                  ?>
                  <option value="<?= $value->id ?>" ><?= $value->interest;?></option>
                 <?php } else { ?> 
                 <option value="<?= $value->id ?>"><?= $value->interest;?></option>
               <?php } } ?>  
             </select>
          </div>
        </div>
      
		  <div class="form-group">
		    <label class="control-label col-sm-12" for="email">Product Sub-Category Name <span style="color: red;">*</span></label>
		    <div class="col-sm-12">
		      <input type="text" class="form-control" id="submmenu" name="submmenu" value="<?= $row->submmenu; ?>" placeholder="Enter Product Sub-Category" maxlength="35">
		       <input type="hidden" class="form-control" name="id" value="<?= $row->submenu_id ?>">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-3 col-sm-12"  style="text-align:right;">
		      <button type="submit" class="btn btn-primary pull-right">Update <i class="icon-arrow-right14 position-right"></i></button>
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

                   menu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Product Category'
                            }
                    }
                  },
                   submmenu: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Product Sub-Category'
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
                                 url: "<?php echo base_url('admin/Master_submenu/update');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);
                                             
                                                     $(function(){
                                                  //  new PNotify({
                                                  //               title: 'Edit Submenu',
                                                  //               text: 'Updated  Successfully',
                                                  //               type: 'success'
                                                  //              });
                                                  $("#UpdatesuccessModal").modal('show');
                                                  });

                                                  //  setTimeout(function()
                                                  //    {
                                                  //        window.location="<?php echo base_url('admin/Master_submenu');?>";
                                                  //    }, 1000);

                                        
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

<script>
     $('#menu_id_8').select2({
        dropdownParent: $("#modal_default1")
    });
   
</script>
<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product Sub-category Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master_submenu'); ?>">
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
                <a href="<?php echo base_url('admin/Master_submenu'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
