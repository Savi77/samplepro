<?php 
$query = $this->db->select('*')->from('tbl_expense_details')->join('tbl_expense_master','tbl_expense_details.ExpenseID=tbl_expense_master.expense_id')->where('tbl_expense_details.UserID',$StatusArray[0]->UserID)->where('tbl_expense_details.ID',$StatusArray[0]->ID)->get()->result();
?>
<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Change Status Of <?= $query[0]->expense_name;?></h6>
                <button type="button" class="close"  onclick="updateUI_ApproveExpense_button_close()" id="ApproveExpense_button_close">&times;</button>
            </div>
            <div class="modal-body">      
            <?php 

            // $Status=$_REQUEST['Status'];
            foreach ($StatusArray as $key) 
            {
               $Status=$_REQUEST['Status'];
            
              ?> 
                <form id="Expense_Status_Form" method="post" enctype="multipart/form-data">
                  <div class="panel panel-flat">
                    <div class="panel-body">
                      <input type="hidden" name="ID" value="<?= $key->ID ?>">

                      <fieldset1>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Amount  <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control"  value="<?= $key->Amount ?>"  readonly >                      
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    Status  <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" readonly name="Status" value="<?= $Status; ?>" >                      
                                </div>
                            </div>
                                  
                            <?php
                               if($Status=='Approved')
                               {
                               ?>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                  Approved Amount  <sup style="color: red;">*</sup>
                                    <input type="text" class="form-control" name="AdminApprovedAmount"  value="<?= $key->AdminApprovedAmount;?>"  placeholder="Enter Approved Amount"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">                      
                                </div>
                            </div>
                           <?php } ?>
                           
                           <div class="col-md-6"> 
                                <div class="form-group">
                                    Admin Remark  <sup style="color: red;">*</sup>
                                    <!-- <input type="text" class="form-control" name="AdminRemark"  value="<?= $key->AdminRemark; ?>"  placeholder="Enter Remark" maxlength="50">-->
                                    <textarea class="form-control" name="AdminRemark"  value="<?= $key->AdminRemark; ?>"  placeholder="Enter Remark" rows="1"></textarea>
                                </div>
                            </div>
                         </div>  
                      </fieldset1>  
                     <br/>
                    <div align="right">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;">Update <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview2"></span>
                  </div>  
                  </div>
                </div>
              </form>
            <?php } ?> 
            </div>

       <script type="text/javascript">
        $(document).ready(function() 
        {
          $('#Expense_Status_Form').bootstrapValidator({
              message: 'This value is not valid',
              fields: {

                         AdminApprovedAmount: {
                              validators: {
                                  notEmpty: {
                                      message: 'Please Enter Approved Amount'
                                  }
                          }
                      },

                         AdminRemark: {
                              validators: {
                                  notEmpty: {
                                      message: 'Please Enter Remark'
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
                            //  new PNotify({
                            //                 title: 'Change Expense Status',
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

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Expense Status Updated Successfully</div>
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