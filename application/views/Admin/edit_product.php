  

   <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>


<?php foreach($edit_intr->result() as $row) { ?>

      <form class="form-horizontal" id="edit_InterestForm">
        <div class="row">

          <input type="hidden" class="form-control" name="edit_id" value="<?= $row->product_id ?>">

           <div class="col-md-12">
              <div class="form-group">
                <label class="control-label col-sm-3" for="menu_id">Select Menu <span style="color: red;">*</span></label>
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
                <label class="control-label col-sm-3" for="email">Select Submenu </label>
                <div class="col-sm-9">
                   <select name="submenu_id" class="form-control">
                        <?php   
                          foreach ($get_submenu_list as $value) 
                          {
                            if($row->submenu_id==$value->submenu_id)
                            {
                        ?>
                        <option value="<?= $value->submenu_id ?>" selected><?= $value->submmenu;?></option>
                       <?php }  else { ?> 

                        <option value="<?= $value->submenu_id ?>"><?= $value->submmenu;?></option>

                         <?php } } ?>  
                   </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Product Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?= $row->product_name?>">
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-sm-3" for="email">Product Image</label>
                 <div class="col-sm-9">
                   <div class="col-sm-2">
                    <?php if (!empty($row->image)) 
                        { ?>
                           <img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/products/<?= $row->image ?>" id="prd_img">
                      <?php } else { ?> 
                             <td><img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/logo.png ?>"></td>
                        <?php } ?>
                      
                   </div> 
                   <div class="col-sm-10">
                      <div class="media-body">
                           <input type="file" class="file-styled" id="imgtemp123" name="image">
                      </div>
                  </div>                  
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Short Description</label>
                <div class="col-sm-9">
                  <textarea name="short_desc" class="form-control" placeholder="Enter Short Description"><?= $row->short_desc?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Long Description</label>
                <div class="col-sm-9">
                  <textarea name="long_desc" class="form-control" placeholder="Enter Short Description"><?= $row->long_desc?></textarea>
                </div>
              </div>

              <div class="form-group"> 
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-primary pull-right">Update Details</button>
                </div>
              </div>

          </div>
        </div>  
      </form>


<?php } ?>


<script type="text/javascript">

  function readURL(input) {
    alert();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#prd_img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgtemp123").change(function(){
      alert();
        readURL(this);
    });

</script>

<script type="text/javascript">
$(document).ready(function() {
$('#edit_InterestForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               product_name: {
                    validators: {
                        notEmpty: {
                            message: 'Product Name is required'
                        }
                  }
              },
              // image: {
              //           validators: {
              //           file: {
              //                    extension: 'jpg,png,jpeg',
              //                    maxSize: 2097152,   //2 mb  maxsize
              //                    message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
              //            }
              //         }
              // },
            menu_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Menu'
                        }
                }
            },
            short_desc: {
                validators: {
                    notEmpty: {
                        message: 'Enter Short Description'
                        }
                }
            },


            submenu_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Submenu'
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
                                 url: "<?php echo base_url('admin/Product/update');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         alert(data);
                                                      new PNotify({
                                                                title: 'Edit Product',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Product');?>";
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
