          
            <?php 

            $Status=$_REQUEST['Status'];
            foreach ($StatusArray as $key) 
            {
              ?> 
                <form id="Expense_Status_Form" method="post" enctype="multipart/form-data">
                  <div class="panel panel-flat">
                    <div class="panel-body">
                      <input type="hidden" name="ID" value="<?= $key->ID ?>">
                      <fieldset>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Amount : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="Amount" value="<?= $key->Amount ?>"  readonly >                      
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    Admin Remark : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="AdminRemark"  value="<?= $key->AdminRemark; ?>"  placeholder="Enter Remark" maxlength="50">                      
                                </div>
                            </div>

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    Status : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="Status" value="<?= $Status; ?>" >                      
                                </div>
                            </div>

                            <?php if($Status=='Approved')
                             { ?>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                  Approved Amount : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="AdminApprovedAmount"  value="<?= $key->AdminApprovedAmount;?>"  placeholder="Enter Amount" maxlength="50">                      
                                </div>
                            </div>
                            <?php } ?>
                         </div>
                      </fieldset>   
                     <br/>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Status <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview2"></span>
                  </div>  
                  </div>
                </div>
              </form>

         <?php } ?> 


       <script type="text/javascript">
        $(document).ready(function() 
        {
          $('#Expense_Status_Form').bootstrapValidator({
              message: 'This value is not valid',
              fields: {

                         AdminApprovedAmount: {
                              validators: {
                                  notEmpty: {
                                      message: 'Approve Amount is Required'
                                  }
                          }
                      },

                         AdminRemark: {
                              validators: {
                                  notEmpty: {
                                      message: 'Remark Name Required'
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
         $("#Expense_Status_Form").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  //alert('invalid');
                }
                else
                {
                    $.ajax({
                      url: "<?php echo base_url('admin/Expense/Update_Expense_Status'); ?>",
                      type: "POST",
                      data:  new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data)
                        {
                          // alert(data);
                           $(function(){
                             new PNotify({
                                            title: 'Update User  Expense',
                                            text: 'Expense Updated Successfully',
                                            type: 'success'
                                           });
                                       });
  
                           setTimeout(function()
                               {
                                   window.location="<?php echo base_url('admin/Expense/UserExpense');?>";
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