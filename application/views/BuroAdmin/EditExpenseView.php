          
            <?php 
            foreach ($EditArray as $key) 
            {
              ?> 
            <form id="edit_Form" method="post" enctype="multipart/form-data">
              <div class="panel panel-flat">
                <div class="panel-body">
                  <input type="hidden" name="expense_id" value="<?= $key->expense_id ?>">
                  <fieldset>
                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="form-group">
                             <label>Expense Name : <sup style="color: red">*</sup></label>
                              <input type="text" class="form-control" name="expense_name"  value="<?= $key->expense_name;?>" >
                          </div>
                        </div>          
                      </div>
                  </fieldset>                                              
                 <br/>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                <span id="preview22"></span>
              </div>  
              </div>
            </div>
          </form>
         <?php } ?> 



       <script type="text/javascript">



        $(document).ready(function() 
        {
          $('#edit_Form').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                         expense_name: {
                              validators: {
                                  notEmpty: {
                                      message: 'Expense Name Required'
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
         $("#edit_Form").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  //alert('invalid');
                }
                else
                {

                  $("#preview22").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                  $("#preview22").show();   


                    $.ajax({
                      url: "<?php echo base_url('admin/Expense/update_expense'); ?>",
                      type: "POST",
                      data:  new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data)
                        {
                            $("#preview22").hide();   
                          // alert(data);
                           $(function(){
                             new PNotify({
                                            title: 'Update Expense',
                                            text: 'Expense Updated Successfully',
                                            type: 'success'
                                           });
                                       });
                             setTimeout(function()
                               {
                                   window.location="<?php echo base_url('admin/Expense');?>";
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