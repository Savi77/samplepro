   
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_multiselect.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <?php 
    foreach ($edit_user->result() as $value) 
    {
      $ids = array();
      $selected = $value->module_ids;
      
      $selectedregion = trim($selected, ',');
      $explode=explode(",", $selectedregion);
      for ($i=0; $i <count($explode); $i++) 
      { 
         $re_array_id=$explode[$i];
         array_push($ids, $re_array_id);
      }

     ?>
      <form id="EditUserForm1" enctype="multipart/form-data" method="post">
          <input type="hidden"  value="<?= $value->id ?>" id="user_id" name="user_id">
          <div class="panel panel-flat">
              <div class="panel-body">
                  <fieldset>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Name: <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" value="<?= $value->name ?>" id="name" name="name" placeholder="Enter Name" maxlength="35">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Email: <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" value="<?= $value->email ?>" id="email1" name="email" placeholder="Enter Email" maxlength="35" onkeyup="checkmail1()" onkeypress="checkmail1()" >
                                  <span id="mail_error1" style="color:red;" maxlength="40"> </span>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Password: <span style="color: red;">*</span></label>
                                  <input type="password" class="form-control" value="<?= $value->Password ?>" id="password" name="password" placeholder="Enter Password" maxlength="35">
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <fieldset>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Mobile No.: <span style="color: red;">*</span></label>
                                     <input type="text" class="form-control" value="<?= $value->mobile_no ?>" id="mobile_no1" name="mobile_no" placeholder="Enter Mobile no" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" onkeyup="checkmobile1()">
                                     <span id="mobile_error1" style="color:red;" maxlength="40"> </span>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Profile:</label>
                                  <div class="media no-margin-top">
                                  <?php if(!empty( $value->profile_img)) { ?>
                                   <div class="media-left">
                                      <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/users/<?= $value->profile_img ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="u_image"></a>
                                    </div>
                                    <?php } else { ?>

                                       <div class="media-left">
                                            <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/testimonial/dummy.png" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
                                    </div>
                                   <?php } ?>
                                    <div class="media-body">
                                      <input type="file" class="file-styled" id="imgtemp123" name="fileup">
                                      <span><?= $value->profile_img ?></span>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Select Module:</label>
                                  <div class="multi-select-full">
                                      <select class="multiselect" multiple="multiple" name="module_ids[]">
                                            <?php 

                                             foreach ($array_module as  $result) 
                                              {  
                                                  $module_id=$result->module_id;
                                                  
                                                  if (in_array($module_id, $ids))
                                                    { ?>
                                                      <option value="<?php echo $result->module_id ?>" selected="selected">
                                                        <?php echo $result->module_name ?>
                                                      </option>
                                                  <?php 
                                                    }
                                                  else
                                                    { ?>
                                                      <option value="<?php echo $result->module_id ?>">
                                                        <?php echo $result->module_name ?>
                                                      </option>
                                                    <?php } ?>  
                                                <?php  
                                                  } 
                                              ?>

                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>
                  <br/>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                      <span id="preview2"></span>
                  </div>
              </div>
          </div>
      </form>

<?php } ?>


<script type="text/javascript">

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#u_image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgtemp123").change(function(){
      // alert();
        readURL(this);
    });

</script>



<script type="text/javascript">
  

var a=0;
//binds to onchange event of your input field
$('#imgtemp123').bind('change', function() {

var ext = $('#imgtemp123').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
  $('#error14').slideDown("slow");
  $('#error24').slideUp("slow");
  a=0;
  }else{
  var picsize = (this.files[0].size);
  if (picsize > 1000000){
  $('#error24').slideDown("slow");
  a=0;
  }else{
  a=1;
  $('#error24').slideUp("slow");
  }
  $('#error14').slideUp("slow");
  
}
});

</script>



<script type="text/javascript">
$(document).ready(function() {
$('#EditUserForm1').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Full Name'
                        }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Password'
                        }
                }
            },

            mobile_no: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Mobile Number'
                        }
                }
            },

            file: {
                      validators: {
                        file: {
                                 extension: 'jpg,png,jpeg',
                                 maxSize: 2097152,   //2 mb  maxsize
                                 message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg)'
                              }
                      }
                  },

             email: {
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

             $("#EditUserForm1").on('submit',(function(e)
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
                            url: "<?php echo base_url('admin/Users/Edit_Add_user');?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                            {
                                 // alert(data);
                                PNotify.removeAll()
                                new PNotify({
                                          title: 'Update User Form',
                                          text: 'Updated  Successfully !',
                                          type: 'success'
                                         });
                                setTimeout(function()
                                 {
                                     window.location="<?php echo base_url('admin/Users');?>";
                                 }, 1000);
                                
                                return false;
                                                                                 
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
   function checkmail1()
   {
    // alert();
    // var mobileno=$("#mobileno").val();
      var x=$("#email1").val();

                var datastring = 'email_id='+x;
                    //alert(datastring);
                     $.ajax({
                      type: "post",
                      url: "<?php echo base_url('admin/Users/check_existmail'); ?>",
                      cache: false,    
                      data: datastring,
                      success: function(data)
                      {
                              // console.log(data);
                              // alert(data);
                              if(data==1)
                              {
                                $('#sign-in-button1').prop('disabled', true);  
                                $("#mail_error1").html('Email is already exist');
                              }
                              else
                              {
                                $('#sign-in-button1').prop('disabled', false); 
                                $("#mail_error1").html('');
                              }
                      }
                });
  }
</script>

<script type="text/javascript">
   function checkmobile1()
   {
    // var mobileno=$("#mobileno").val();
      var x=$("#mobile_no1").val();

                var datastring = 'mobile_no='+x;
                    //alert(datastring);
                     $.ajax({
                      type: "post",
                      url: "<?php echo base_url('admin/Users/check_mobile'); ?>",
                      cache: false,    
                      data: datastring,
                      success: function(data)
                      {
                              // console.log(data);
                              // alert(data);
                              if(data==1)
                              {
                                $('#sign-in-button1').prop('disabled', true);  
                                $("#mobile_error1").html('Mobile number is already exist');
                              }
                              else
                              {
                                $('#sign-in-button1').prop('disabled', false); 
                                $("#mobile_error1").html('');
                              }
                      }
                });
  }
</script>
<!--===================================== Email/Mobile number validation(already exist or not) =====================================-->





