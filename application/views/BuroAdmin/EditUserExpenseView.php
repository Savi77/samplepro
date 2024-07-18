          
            <?php 
            foreach ($EditArray as $key) 
            {
              ?> 

                <form id="edit_Form" method="post" enctype="multipart/form-data">
                  <div class="panel panel-flat">
                    <div class="panel-body">
                      <input type="hidden" name="ID" value="<?= $key->ID ?>">
                      <fieldset>
                          <div class="row">
                            <div class="col-md-4"> 
                                <div class="form-group">
                                  Expense Name : <sup style="color: red;">*</sup>
                                  <select class="form-control" name="ExpenseID">
                                    <option value="">Select Expense</option>
                                    <?php 
                                      foreach ($ExpenseMasterArray as  $res) 
                                      {
                                      ?>
                                      <option value="<?= $res->expense_id; ?>" <?php if($res->expense_id==$key->ExpenseID){ echo 'selected'; } ?> >
                                        <?= $res->expense_name; ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    Amount : <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="Amount" value="<?= $key->Amount ?>"  placeholder="Select Enter Amount"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">                      
                                </div>
                            </div>  
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    Upload Document : 
                                    <input type="file" class="form-control" name="Document" >                      
                                </div>
                            </div>
                          </div>
                      </fieldset>   

                      <fieldset>
                        <div class="row">
                          <div class="col-md-4"> 
                            <div class="form-group">
                                Note : 
                                <input type="text" class="form-control" name="Remark"  value="<?= $key->Remark ?>"  placeholder="Enter Remark" maxlength="50">                      
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group">
                              Start Date :  <sup style="color: red;">*</sup>
                              <input type="text" class="form-control datepicker" name="SDate"  value="<?= date("d M Y",strtotime($key->SDate)) ?>"   placeholder="Select Start Date"  autocomplete="off">
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group">
                              End Date :  <sup style="color: red;">*</sup>
                              <input type="text" class="form-control datepicker" name="EDate"  value="<?= date("d M Y",strtotime($key->EDate)) ?>"  placeholder="Select End Date" autocomplete="off">
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


        <script>
        $(function()
         {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd M yy' });
         });
        </script>

       <script type="text/javascript">
        $(document).ready(function() 
        {
          $('#edit_Form').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                         ExpenseID: {
                              validators: {
                                  notEmpty: {
                                      message: 'Expense Name Required'
                                  }
                          }
                      },
                         Amount: {
                              validators: {
                                  notEmpty: {
                                      message: 'Amount is Required'
                                  }
                          }
                      },

                         Remark: {
                              validators: {
                                  notEmpty: {
                                      message: 'Remark Name Required'
                                  }
                          }
                      },
                       SDate: {
                            validators: {
                                notEmpty: {
                                    message: 'Start Date Required'
                                }
                        }
                    },
                     EDate: {
                          validators: {
                              notEmpty: {
                                  message: 'End Date Required'
                              }
                      }
                  },
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
                    $.ajax({
                      url: "<?php echo base_url('admin/Expense/Update_User_Expense'); ?>",
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