 <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>


<?php foreach ($edit_client->result() as $value) {
  ?>

        <form class="form-horizontal" id="Update_client">
				    <input type="hidden" class="form-control" id="id" name="id" value="<?= $value->id ?>" placeholder="Enter Company Name">

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Company Name <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" value="<?= $value->name ?>" placeholder="Enter Company Name" maxlength="35" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Site URL <span style="color: red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="url" name="url"  value="<?= $value->site_url ?>" placeholder="Enter Site URL" maxlength="40">
            </div>
          </div>

          <div class="form-group">
          <label class="col-lg-3 control-label">Client Logo <span style="color: red;">*</span></label>
          <div class="col-lg-9">
            <div class="media no-margin-top">

                  <?php if(!empty( $value->home_img)) { ?>
                     <div class="media-left">
                          <a href="#"><img src="<?= base_url() ?>assets/images/clients/<?= $value->home_img ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img1"></a>
                        </div>
                  <?php } else { ?>

                      <div class="media-left">
                          <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/testimonial/dummy.png" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img1"></a>
                        </div>
                 <?php } ?>

              <div class="media-body">
                <input type="file" class="file-styled" id="imgInp12" name="fileup" >
                <span id="home"><?= $value->home_img ?></span>
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
			  <div class="form-group"> 
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-primary pull-right">Update</button>
			    </div>
			  </div>
		  </form>

<?php } ?>

<!--============================== /Image view on page & Validation ========================================-->



<script type="text/javascript">
$(document).ready(function() {
$('#Update_client').bootstrapValidator({
    message: 'This value is not valid',
      fields: {
                 name: {
                      validators: {
                          notEmpty: {
                              message: 'Please Enter Company Name'
                          }
                  }
              },
              url: {
                  validators: {
                      notEmpty: {
                          message: 'Please Enter URL'
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

             $("#Update_client").on('submit',(function(e)
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
                                url: "<?php echo base_url('BA/Client/Edit_Add_Client');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                    PNotify.removeAll()
                                         // alert(data);

                                                   new PNotify({
                                                                title: 'Client Update',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });
                                                 
                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('BA/Client');?>";
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
<!--============================== Image view on page & Validation ========================================-->
<script type="text/javascript">

  function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#home_img1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp12").change(function(){
        readURL3(this);
    });

</script>


<script type="text/javascript">
  

var a=0;
//binds to onchange event of your input field
$('#imgInp12').bind('change', function() {

var ext = $('#imgInp12').val().split('.').pop().toLowerCase();
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




