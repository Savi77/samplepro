<?php foreach($edit_intr->result() as $row) { ?>
		<form class="form-horizontal" id="edit_InterestForm">

        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Select Menu <span style="color: red;">*</span></label>
          <div class="col-sm-9">
             <select name="menu_id" class="form-control" >
                  <?php   
                    foreach ($get_menu_list as $value) 
                    {
                      if($row->menu_id==$value->id)
                      {
                  ?>
                  <option value="<?= $value->id ?>" selected><?= $value->interest;?></option>
                 <?php } else { ?> 
                 <option value="<?= $value->id ?>"><?= $value->interest;?></option>
               <?php } } ?>  
             </select>
          </div>
        </div>
      
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="email">Sub-Categories Name <span style="color: red;">*</span></label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="submmenu" name="submmenu" value="<?= $row->submmenu; ?>" placeholder="Enter Language" maxlength="35">
		       <input type="hidden" class="form-control" name="id" value="<?= $row->submenu_id ?>">
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

                   menu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Select Menu'
                            }
                    }
                  },
                   submmenu: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Submmenu Name'
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
                                                   new PNotify({
                                                                title: 'Edit Submenu',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });
                                                  });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Master_submenu');?>";
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
