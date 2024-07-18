
        <script>
          $( function()
           {
              $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
          } );
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