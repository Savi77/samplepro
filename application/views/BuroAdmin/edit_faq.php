 <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>

<?php foreach ($edit_faq->result() as $value1) {
 ?>

  <form class="form-horizontal" id="update_faq" method="post">
    <div class="form-group">
          <label class="control-label col-sm-2" for="email">Question <span style="color: red;">*</span></label>
          <div class="col-sm-10">
           
            <input type="text" class="form-control" id="title1" name="title" placeholder="Enter Question" value="<?= $value1->question ?>" maxlength="100">
          </div>
        </div>
         <input type="hidden" class="form-control" id="faq_id1" name="faq_id" value="<?= $value1->faq_id ?>">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Answer <span style="color: red;">*</span></label>
          <div class="col-sm-10">
            <textarea rows="4" cols="50" class="form-control" id="title_description" name="title_description" maxlength="250"><?= $value1->answer ?></textarea>
            <span style="color:gray">Max 250 character</span>
          </div>
        </div>   

      <div class="form-group"> 
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary pull-right">Update</button>
          </div>
        </div>
</form>
    
<?php } ?>

<script>

    $(document).ready(function() {
    $('#update_faq').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
                   title: {
                        validators: {
                            notEmpty: {
                                message: 'Question is required'
                            }
                      }
                  },
                title_description: {
                    validators: {
                        notEmpty: {
                            message: 'Answer is required'
                            }
                    }
                }
        }
    });
    });

</script>
    

<!--======================================= / Validation login  ==========================================-->


<script>

$(document).ready(function (e)
   {
     $("#update_faq").on('submit',(function(e)
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
                 url: "<?php echo base_url('BA/Faq/update');?>",
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
                                            title: 'Edit FAQ',
                                            text: 'Updated  Successfully',
                                            type: 'success'
                                           });
                                  });

                                   setTimeout(function()
                                     {
                                         window.location="<?php echo base_url('BA/Faq');?>";
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


