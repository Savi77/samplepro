
 <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

<?php foreach ($edit_prd_srv as $value) 
{
  ?>
         <form class="form-horizontal" id="edit_product_service">
                          <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="padding: 10px;">
                                        <div class="form-group" style="margin-bottom: 4px;">
                                          <label class="control-label col-sm-6" for="email">Product / Service Type <span style="color: red;">*</span></label>
                                          <div class="col-sm-6">
                                            <?php 
                                                  if ($value->prdsrv_type=='product')
                                                  { 
                                                      $display ="";
                                                    ?>
                                                     <label class="radio-inline">
                                                        <input type="radio" name="prd_srv_type" class="styled" value="product" checked="" onclick="product_group()">
                                                        Product
                                                      </label>

                                                      <label class="radio-inline">
                                                        <input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()">
                                                        Service
                                                      </label>
                                                 <?php }
                                                  else
                                                  { 
                                                      $display ="display:none";
                                                    ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="prd_srv_type" class="styled" value="product" onclick="product_group()">
                                                        Product
                                                      </label>

                                                      <label class="radio-inline">
                                                        <input type="radio" name="prd_srv_type" class="styled" checked="" value="service" onclick="service_group()">
                                                        Service
                                                      </label>
                                                <?php }
                                              ?>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="menu_id">Select Category / Brand <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                              <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" >
                                          <?php   
                                            foreach ($get_menu_list as $value1) 
                                            {
                                              if($value->menu_id==$value1->id)
                                              {
                                          ?>
                                          <option value="<?= $value1->id ?>" selected><?= $value1->interest;?></option>
                                         <?php } else { ?> 
                                         <option value="<?= $value1->id ?>"><?= $value1->interest;?></option>
                                       <?php } } ?>  
                              </select>
                            </div>
                            <label class="control-label col-sm-2" for="email">Select Sub-Category <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                                 <select name="submenu_id" class="form-control" id="submmenu_data1">
                                          <?php   
                                            foreach ($get_submenu_list as $value2) 
                                            {
                                              if($value->submenu_id==$value2->submenu_id)
                                              {
                                          ?>
                                          <option value="<?= $value2->submenu_id ?>" selected><?= $value2->submmenu;?></option>
                                         <?php }  else { ?> 

                                          <option value="<?= $value2->submenu_id ?>"><?= $value2->submmenu;?></option>

                                           <?php } } ?>  
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Product Name <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="prd_srv_name" name="prd_srv_name" placeholder="Enter Product / Service Name" value="<?= $value->prdsrv_name ?>" maxlength="50">
                            </div>
                            <label class="control-label col-sm-2" for="email">Select Image <span style="color: red;">*</span></label>
                            <div class="col-sm-4">
                                <div class="media no-margin-top">
                                    <div class="media-left">
                                      <a href="#"><img src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $value->image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah1"></a>
                                    </div>
                                    <div class="media-body">
                                      <input type="file" class="file-styled" id="imgInp1" name="fileup" accept="image/*">
                                    </div>
                                </div>
                            </div>
                          </div>

                          <input type="hidden" class="form-control" id="prd_srv_id" name="prd_srv_id" value="<?= $value->prd_srv_id ?>">

                           
                           <div class="form-group">
                                  <label class="control-label col-sm-2" for="email">Select UOM <span style="color: red;">*</span></label>
                                    <div class="col-sm-4">
                                      <select class="select-search form-control" name="uom_type" id="uom_type">
                                            <option value="">Select UOM</option>
                                             <?php  
                                                 $prdsrv_uom = $value->prdsrv_uom;
                                                foreach ($get_data->result() as $uom) 
                                                {
                                                  $uom_id = $uom->uom_id;
                                                  if ($uom_id == $prdsrv_uom)
                                                  {
                                                ?>
                                                <option value="<?= $uom->uom_id ?>" selected><?= $uom->uom_type;?></option>
                                             <?php } else { ?> 
                                             <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type;?></option>
                                             <?php } } ?> 
                                        </select>
                                    </div>
                                
                                  <label class="control-label col-sm-2" for="email">Price <span style="color: red;">*</span></label>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" value="<?= $value->price ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                  </div>
                          </div>

                          <div class="form-group" style="display: none">
                            <label class="control-label col-sm-2" for="email">UoM (counting unit.)<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="prd_srv_uom" name="prd_srv_uom" placeholder="Enter UoM Unit" value="<?= $value->prdsrv_uom ?>" maxlength="50">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Description <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="prd_srv_description1" name="prd_srv_description" placeholder="Enter Description" maxlength="250"><?= $value->prdsrv_description ?></textarea>
                              <div class="row" style="height: 16px;">
                                   <div class="col-lg-6">
                                      <span style="font-size:15px; color:gray">Max: 500 character</span>
                                  </div>
                                   <div class="col-lg-6" style="height: 15px;">
                                      <div class="col-lg-6">
                                      </div>
                                      <div class="col-lg-5">
                                        <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left:</p> 
                                      </div>
                                      <div class="col-lg-1">
                                          <div id="charNum1" class="pull-right" style="font-size:15px; color:gray;">500</div>
                                         <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                         <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                      </div>
                                   </div>
                                </div>
                            </div>
                          </div>
                          <?php
                              $img_count = count($multiple_image);
                               if ($img_count>=3)
                               {
                                 $readonly="disabled=''";
                               }
                               else
                               {
                                  $readonly="";
                               }
                           ?>
                          <input type="hidden" class="form-control" id="img_count" name="img_count" value="<?= $img_count ?>">

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email"></label>
                            <div class="col-sm-10" id="first">
                                <?php foreach ($multiple_image as $img) 
                                { ?>  
                                    <div class="col-sm-3">
                                          <img type="file" src="<?= base_url() ?>assets/admin/product_service/<?= $img->image ?>" class="img-sm" style="width: 150px!important; height: 100px!important;" alt="" >
                                          <br><br>
                                          <div align="center">
                                              <a onclick="del_pd_image(id)" id="<?= $img->id; ?>"><span class="label bg-danger" style="line-height: 20px;"><i class="glyphicon glyphicon-trash" style="font-size: 12px;" data-toggle="tooltip" title="Delete" data-placement="bottom"></i></span></a>
                                          </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="second"></div>
                          </div>

                          <div class="form-group" style="">
                              <!-- <div class="col-lg-12">   -->
                                 <div class="col-md-2">
                                  <br>
                                  <label class="control-label">Slider Images:<sup style="color: red">*</sup></label>
                                 </div> 
                                  <div class="col-md-10">
                                    <div class="col-xs-1">
                                        <button type="button" class="btn btn-default addButton" style="margin-top: 20px;">
                                          <i class="icon-stack-plus" style="top: -5px;"></i>
                                        </button>
                                    </div>
                                    <div class="col-xs-5">
                                        File : <span style="color: red;">*</span><input type="file" class="input_disable_enable" id="file-input" <?= $readonly ?> name="upload_file[]" onchange="getName()">                                                       
                                    </div>
                                     <div class="col-xs-2">
                                        <div id="thumb-output" style="margin-top: 20px;"></div>
                                      </div>
                                  </div> 
                             <!-- </div>   -->
                          </div>
                          <div class="form-group hide" id="bookTemplate1" >
                             <!-- <div class="col-lg-12">  -->
                                    <div class="col-md-10 col-md-offset-2">
                                        <div class="col-xs-1">
                                           <button type="button" class="btn btn-default removeButton" style="margin-top: 20px;"><i class="icon-stack-minus"></i></button>
                                        </div>
                                        <div class="col-xs-5">
                                            File : <span style="color: red;">*</span><input type="file" id="file-input"  name="upload_file[]" onchange="getName()">                                                       
                                        </div>
                                        <div class="col-xs-2">
                                            <div id="thumb-output" style="margin-top: 20px;"></div>
                                        </div>
                                    </div>
                              <!-- </div> -->
                          </div>
       
                        <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                  </form>
<?php } ?>
<!-- ====================character count================= -->

  <script type="text/javascript">
    $(document).ready(function() 
      {
          var res = $("#prd_srv_description1").val();
          $("#charNum1").text(500-res.length);
      });

    
    $("#prd_srv_description1").keyup(function()
    {
          el = $(this);
          if(el.val().length >= 500)
          {
              el.val( el.val().substr(0, 500) );
              $("#charNum1").text(0);
          }
           else 
          {
              $("#charNum1").text(500-el.val().length);
          }
    });

  </script>

<!-- ======================================= -->
<!-- ======================= Product group hide show ========================================= -->
<script type="text/javascript">
  
  function product_group()
  {
    $('#prd_grp1').show();
  }

  function service_group()
  {
    $('#prd_grp1').hide();
     // $('#prd_brand option:selected').remove();
     // $('#prd_specs option:selected').remove();
  }

</script>
<!-- ------------------------ Get submenu list -------------------------------- -->
<script type="text/javascript">
  function fetch_submenu(id)
    {
      var datastring = 'menu_id='+id;
      // alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
            // alert(data);
            $('#submmenu_data1').html(data);
        },
          error: function(){      
           alert('Error while request..');
        }
       });
    }
</script>
<!-- ------------------------ Get submenu list -------------------------------- -->
<script type="text/javascript">

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp1").change(function(){
        readURL(this);
    });

</script>


<script>

$(document).ready(function() {
        brandvalidator = {
            row: '.col-xs-3',
            validators: {
                notEmpty: {
                    message: 'Select title'
                }
            }
        },
        bookIndex = 0;

    $('#edit_product_service')
        .bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                'title[]': brandvalidator,  
                    location: {
                        validators: {
                            notEmpty: {
                                message: 'Location is required'
                            }
                        }
                    },
                    prd_srv_name: {
                        validators: {
                            notEmpty: {
                                message: 'Product / Service name is required'
                            }
                      }
                  },
                   prd_srv_price: {
                        validators: {
                            notEmpty: {
                                message: 'Product / Service price is required'
                            }
                      }
                  },

                  fileup: {
                        validators: {
                        file: {
                                 extension: 'jpg,png,jpeg,pdf,doc',
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                         }
                      }
                  },
                  prd_srv_type: {
                        validators: {
                            notEmpty: {
                                message: 'Please select type'
                            }
                      }
                  },
                  uom_type: {
                        validators: {
                            notEmpty: {
                                message: 'UOM is required'
                            }
                      }
                  },
                  prd_srv_description: {
                        validators: {
                            notEmpty: {
                                message: 'Description is required'
                            }
                      }
                  },
                  'upload_file[]': {
                        validators: {
                        file: {
                                 extension: 'jpg,png,jpeg,pdf,doc',
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                         }
                      }
                }
            }
        })

        // Add button click handler
        .on('click', '.addButton', function()
         {
            bookIndex++;
             var img_count = $('#img_count').val();
             
             // alert(result1);
             // var result = parseInt(img_count) + parseInt(bookIndex);

             // alert(result);
                if (img_count<2) 
                {
                    var result1 = parseInt(img_count) + 1;
                    $('#img_count').val(result1);
                    var $template = $('#bookTemplate1'),
                        $clone    = $template
                                        .clone()
                                        .removeClass('hide')
                                        .removeAttr('id')
                                        .attr('data-book-index', bookIndex)
                                        .insertBefore($template);

                        // Update the name attributes
                       
                            $clone
                            .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                            .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                            // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

                        // Add new fields
                        // Note that we also pass the validator rules for new field as the third parameter
                            $('#edit_product_service')
                                .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                }
                else
                {
                    PNotify.removeAll();
                   new PNotify({
                                  title: 'Image Upload',
                                  text: 'Maximum image upload limit is 3',
                                  type: 'warning'
                                 });
                }
                
            })

        // Remove button click handler
        .on('click', '.removeButton', function() 
        {
            var img_count = $('#img_count').val();
            // alert(img_count);
            var result = parseInt(img_count) - 1;
            // alert(result);
            $('#img_count').val(result);
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-book-index');

            // Remove element containing the fields
            $row.remove();
        });
});
</script>



<script type="text/javascript">
        $(document).ready(function (e)
           {

             $("#edit_product_service").on('submit',(function(e)
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
                                 url: "<?php echo base_url('admin/Product/update');?>",
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

<script type="text/javascript">
$(document).ready(function() {
$('#EditBusiness').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               business_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Business Title'
                        }
                }
            }
    }
  });
});
</script>


<!--=======================================  delete Image  ==========================================-->
<script>
    function del_pd_image(id)
    {
        PNotify.removeAll();
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this image?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

         // On confirm
        notice.get().on('pnotify.confirm', function()
         {
            var datastring = 'img_id='+id;
            var prd_srv_id = $('#prd_srv_id').val();
            var datastring1 = 'prd_srv_id='+prd_srv_id;
            
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/product_service/delete_file'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);

                        $.ajax({
                                  type: "post",
                                  url: "<?php echo base_url('admin/Product_service/after_delete'); ?>",
                                  cache: false,    
                                  data: datastring1,
                                  success: function(data)
                                  { 
                                    // alert(data);

                                        $('#first').hide();
                                        $('#second').show();
                                        $('#second').html(data);

                                        PNotify.removeAll();
                                        $(function(){
                                               new PNotify({
                                                             title: 'Delete File',
                                                             text: 'Deleted successfully',
                                                             type: 'success'
                                                           });
                                              });
                                        get_image_count();

                                  },
                              error: function(){      
                               alert('Error while request..');
                              }
                             });
                
               },
                  error: function(){      
                   alert('Error while request..');
                  }
               });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<!--======================================= / Delete Image  ==========================================-->

<!-- ================================ Get image count ================================================== -->
<script type="text/javascript">
  
  function get_image_count()
  {

            var prd_srv_id = $('#prd_srv_id').val();
            var datastring = 'prd_srv_id='+prd_srv_id;
            
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Product_service/get_image_count'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                    // alert(data);
                      $('#img_count').val(data);
                      $('.input_disable_enable').prop('disabled', false);
               },
              error: function(){      
               alert('Error while request..');
              }
           });

  }

</script>

<!-- ===================================================================================================== -->