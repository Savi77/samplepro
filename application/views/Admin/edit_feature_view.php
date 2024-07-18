<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>

<?php foreach ($edit_feature->result() as $value) 
  {
?>
              <form class="form-horizontal" id="EditFeatureForm" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="feature_id" name="feature_id" placeholder="Enter Language" value="<?= $value->id ?>">
               
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Title <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $value->title ?>" maxlength="40" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Profile</label>
                  <div class="col-lg-9">
                    <div class="media no-margin-top">
                      <div class="media-left">
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/superfeature/<?= $value->image ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="blah1"></a>
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

                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Description <span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title_description" name="title_description" placeholder="Please Enter Description" value="<?= $value->description ?>" maxlength="300">
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

             $("#EditFeatureForm").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Feature/Edit_Add_Feature');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {

                                                   new PNotify({
                                                                title: 'Edit Form',
                                                                text: 'Updated  Successfully',
                                                                type: 'success'
                                                               });

                                                   setTimeout(function()
                                                     {
                                                         window.location="<?php echo base_url('admin/Feature');?>";
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
$('#EditFeatureForm').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               title: {
                    validators: {
                        notEmpty: {
                            message: 'Title is required'
                        }
                  }
              },
            title_description: {
                validators: {
                    notEmpty: {
                        message: 'Description is required'
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

