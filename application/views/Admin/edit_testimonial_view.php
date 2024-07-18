<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
<?php foreach ($edit_Testimonial->result() as $value) {
 ?>
              <form class="form-horizontal" id="EditTestimonialForm" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Name <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Language" value="<?= $value->name ?>" maxlength="35">
                  </div>
                </div>

                <input type="hidden" class="form-control" id="test_id" name="test_id" placeholder="Enter Language" value="<?= $value->test_id ?>">
               
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Company Name <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="<?= $value->company_name ?>" maxlength="40" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Profile</label>
                  <div class="col-lg-9">
                    <div class="media no-margin-top">
                      <div class="media-left">
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/testimonial/<?= $value->profile ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah1"></a>
                      </div>

                      <div class="media-body">
                        <input type="file" class="file-styled" id="imgInp1" name="fileup">
                        <span><?= $value->profile ?></span>
                        <p id="error1" style="display:none; color:#FF0000;">
                          Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                          </p>
                          <p id="error2" style="display:none; color:#FF0000;">
                          Maximum File Size Limit is 1MB.
                          </p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if(!empty( $value->site_name)) { ?>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Site Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter Site Name" value="<?= $value->site_name ?>" maxlength="40">
                        </div>
                      </div>
                  <?php } ?>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Please Enter Description" value="<?= $value->description ?>" maxlength="500">
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
        $(document).ready(function (e)
           {

             $("#EditTestimonialForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Testimonial/Edit_Add_Testimonial');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                         //alert(data);

                                                   new PNotify({
                                                                title: 'Edit Form',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Testimonial');?>";
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
$('#EditTestimonialForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Full Name'
                        }
                }
            },
            company_name: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Company Name'
                        }
                }
            },

            description: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Description'
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

<!--============================== Image view on page & Validation ========================================-->
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





<script type="text/javascript">
  

var a=0;
//binds to onchange event of your input field
$('#imgInp1').bind('change', function() {

var ext = $('#imgInp1').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
  $('#error1').slideDown("slow");
  $('#error2').slideUp("slow");
  a=0;
  }else{
  var picsize = (this.files[0].size);
  if (picsize > 1000000){
  $('#error2').slideDown("slow");
  a=0;
  }else{
  a=1;
  $('#error2').slideUp("slow");
  }
  $('#error1').slideUp("slow");
  
}
});




</script>


<!--============================== /Image view on page & Validation ========================================-->

