          
       
        <?php 

            // echo json_encode($EditArray);
            // echo "<pre>";
            // print_r($EditArray);

            foreach ($EditArray as $key) 
            {
              foreach ($ExpenseMasterArray as  $res) 
              {
                if($res->expense_id==$key->ExpenseID)
                {
                   $expense_name = $res->expense_name;
                }
              }
              ?> 
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Edit Expense Of <?= $expense_name; ?></h6>
                <button type="button" class="close"  onclick="updateUI_EditExpense_close()" id="EditExpense_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <form id="edit_Form" method="post" enctype="multipart/form-data">
                  <div class="panel panel-flat">
                    <div class="panel-body">
                      <input type="hidden" name="ID" value="<?= $key->ID ?>">
                      <fieldset1>
                          <div class="row">
                            <div class="col-md-4"> 
                                <div class="form-group">
                                  Expense Name  <sup style="color: red;">*</sup>
                                  <select class="form-control" name="ExpenseID" id="expenseID_2" data-placeholder="Select Expense">
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
                                    Amount  <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="Amount" value="<?= $key->Amount ?>"  placeholder="Enter Amount"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">                      
                                </div>
                            </div>  
                            <!-- <div class="col-md-4"> 
                                <a href="#"><img src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $value->image ?>" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah1"></a>
                                <div class="form-group">
                                    Upload Document  
                                    <input type="file" class="form-control" name="Document" style="padding:4px;" value="<?= $key->Filename ?>">                      
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Document </label>
                                    <div class="d-flex no-margin-top">
                                        <div class="media-left">
                                            <a href="#"><img src="<?= base_url() ?>assets/admin/expensedocuments/<?= $key->Document ?>" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah1"></a>
                                        </div>
                                        <div class="media-body">
                                            <input type="file" name="Document" id="Document" class="form-control" style="padding:4px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </fieldset1>   

                      <fieldset1>
                        <div class="row">
                          <div class="col-md-4"> 
                            <div class="form-group">
                                Remark<sup style="color: red;">*</sup> 
                                <!-- <input type="text" class="form-control" name="Remark"  value="<?= $key->Remark ?>"  placeholder="Enter Remark" maxlength="50">    -->
                                <textarea class="form-control" name="Remark"  value="<?= $key->Remark ?>"  placeholder="Enter Remark" rows="1"><?= $key->Remark ?></textarea>                   
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group">
                              Start Date   <sup style="color: red;">*</sup>
                              <input type="text" class="form-control pickadate-selectors rounded-right" name="SDate" id="Sdate12"  value="<?= date("d F, Y",strtotime($key->SDate)) ?>"   placeholder="Select Start Date"  autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group">
                              End Date   <sup style="color: red;">*</sup>
                              <input type="text" class="form-control pickadate-selectors rounded-right" name="EDate" id="Edate12" value="<?= date("d F, Y",strtotime($key->EDate)) ?>"  placeholder="Select End Date" autocomplete="off" onchange="checkvalidationdate12()">
                              <!-- <input type="text" class="form-control datepicker" name="EDate"  value="<?= date("d F, Y",strtotime($key->EDate)) ?>"  placeholder="Select End Date" autocomplete="off" onchange="checkvalidationdate()"> -->
                              <small id = 'error_end_date12' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                            </div>
                          </div>
                        </div>
                       </fieldset1>  

                     <br/>
                    <div align="right">
                    <button type="submit" class="btn btn-primary" id="sub_btn12" style="margin-bottom: 25px;">Update <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview2"></span>
                  </div>  
                  </div>
                </div>
              </form>
            </div>

         <?php } ?> 


        <script>
        // $(function()
        //  {
        //     $( ".datepicker" ).datepicker({ dateFormat: 'dd M yy' });
        //  });

        // $('.datepicker').pickadate({
        //     selectYears: 100,
        //     selectMonths: true
        // });
        $('.pickadate-selectors').pickadate({
                    selectYears: 100,
                    selectMonths: true
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
                                      message: 'Please Select Expense Name'
                                  }
                          }
                      },
                         Amount: {
                              validators: {
                                  notEmpty: {
                                      message: 'Please Enter Amount'
                                  }
                          }
                      },

                         Remark: {
                              validators: {
                                  notEmpty: {
                                      message: 'Please Enter Remark'
                                  }
                          }
                      },
                       SDate: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Start Date'
                                }
                        }
                    },
                     EDate: {
                          validators: {
                              notEmpty: {
                                  message: 'Please Select End Date'
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
                            //  new PNotify({
                            //                 title: 'Update User  Expense',
                            //                 text: 'Expense Updated Successfully',
                            //                 type: 'success'
                            //                });
                            $("#UpdatesuccessModal").modal('show');
                            });

                          //  setTimeout(function()
                          //      {
                          //          window.location="<?php echo base_url('admin/Expense/UserExpense');?>";
                          //      }, 1000);

                        },
                        error: function() 
                        {
                          $("#updateErrorModal").modal('show');
                        }           
                     });
                }
                return false;
            }));
        });
    </script>

    <script type="text/javascript">
          $('#expenseID_2').select2({
            dropdownParent: $("#EditExpenseModal")
        });
        
    </script>

    <script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
    </script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Expense Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense/UserExpense'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense/UserExpense'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>

<script>
    function checkvalidationdate12()
        {
            var start_date = new Date($('#Sdate12').val());
            var end_date = new Date($('#Edate12').val());
            
            if (start_date > end_date) 
            {
                $('#error_end_date12').css('display','block');
                $("#sub_btn12").attr('disabled', true);
            }
            else
            {
                $('#error_end_date12').css('display','none');
                $("#sub_btn12").attr('disabled', false);
            }
        } 
</script>