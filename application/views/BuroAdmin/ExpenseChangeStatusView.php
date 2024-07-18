          
          <style type="text/css">
            .StatusTable > td
            {    
              padding: 10px 15px !important;
             line-height: 1.15384616 !important;
            }
          </style>



            <?php 
            // echo json_encode($EditArray);
            $ExpenseTitle=$EditArray[0]->ExpenseTitle;
            $REFID=$EditArray[0]->REFID;
            ?>

              <form id="changestatusform" method="post" enctype="multipart/form-data"> 
                  <fieldset>                   
                      <div class="row">      
                        <div class="col-md-12"> 
                           <div class="row"> 
                             <div class="col-md-12">
                                <div class="form-group">
                                    <h6> Expense Title : <label> <h5><b><?= $ExpenseTitle;?></b></h5></label></h6>
                                    <hr/>
                                </div>
                             </div>
                           </div>
                        </div>
                      <div class="col-md-12">
                        <table class="table ">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Expense Head</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Amount</th>
                              <th>Note</th>
                              <th>Status</th>
                              <th>Approved Amount</th>
                              <th>Admin Remark</th>
                            </tr>
                          </thead>
                          <tbody>

                      <?php 
                      $rowcount=1;
                      foreach ($EditArray as $key) 
                      {
                          foreach ($ExpenseMasterArray as  $res) 
                          {
                            if($res->expense_id==$key->ExpenseID)
                            {
                              $expenhead=$res->expense_name;
                            }
                          }
                        ?> 

                          <tr class="StatusTable">
                            <td><?= $rowcount; ?>
                              <input type="hidden" class="form-control" name="ID[]"   value="<?= $key->ID;?>" readonly> 

                           </td>
                            <td><?= $expenhead; ?></td>
                            <td><?= date("d M Y",strtotime($key->SDate));?></td>
                            <td><?= date("d M Y",strtotime($key->EDate));?></td>
                            <td><?= $key->Amount;?></td>
                            <td><?= $key->Remark;?></td>
                            <td>
                              <div class="input-group">
                                <div class="form-group">                              
                                  <select class="form-control" name="Status[]">
                                      <option value="Pending" <?php if($key->Status=='Pending'){ echo 'selected'; } ?> >Pending</option>   
                                      <option value="On Hold" <?php if($key->Status=='On Hold'){ echo 'selected'; } ?> >On Hold</option>   
                                      <option value="Approved" <?php if($key->Status=='Approved'){ echo 'selected'; } ?> >Approved</option> 
                                      <option value="Rejected" <?php if($key->Status=='Rejected'){ echo 'selected'; } ?> >Rejected</option>                              
                                  </select>
                                 </div>
                               </div>  
                            </td>
                            <td style="width: 10%;">
                               <div class="input-group">
                                <div class="form-group">                               
                                    <input type="text" class="form-control" name="AdminApprovedAmount[]" value="<?= $key->AdminApprovedAmount;?>" >                      
                                </div>
                              </div>
                             </td>
                              <td>
                                 <div class="input-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="AdminRemark[]" value="<?= $key->AdminRemark;?>"  >                      
                                  </div>
                                 </div>
                             </td>
                          </tr>
                              <?php  $rowcount++; } ?>  
                          </tbody>
                        </table>
                      </div>

                    </div>   
                   <br/> <br/>
                  <div align="center">
                    <button type="submit" class="btn btn-primary">Change Status <i class="icon-arrow-right14 position-right"></i></button>
                     <span id="preview6"></span>
                  </div> 
                  <br/>
              </fieldset>  
            </form>

          <script>
          $(document).ready(function() {
                  AdminRemarkvalidator = {
                      row: '.col-md-2',
                      validators: {
                                    notEmpty: {
                                        message: ' Required'
                                    }
                      }
                  },
                  Statusvalidator = {
                      row: '.col-md-1',
                      validators: {
                                    notEmpty: {
                                        message: 'Required'
                                    }
                      }
                  },

              $('#changestatusform')
                  .bootstrapValidator({
                      framework: 'bootstrap',
                      icon: {
                          valid: 'glyphicon glyphicon-ok',
                          invalid: 'glyphicon glyphicon-remove',
                          validating: 'glyphicon glyphicon-refresh'
                      },
                fields: {
                          'AdminRemark[]': AdminRemarkvalidator,
                          'Status[]': Statusvalidator,
                      }
                  })
          });
          </script>

                  <script type="text/javascript">
                    $(document).ready(function (e)
                     {
                       $("#changestatusform").on('submit',(function(e)
                           {  
                             //e.preventDefault();
                             if (e.isDefaultPrevented())
                              {
                                //alert('invalid');
                              }
                              else
                              {
                                  $("#preview6").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                                  $("#preview6").show();   
                                  $.ajax({
                                    url: "<?php echo base_url('admin/Expense/Update_User_Expense_Status'); ?>",
                                    type: "POST",
                                    data:  new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    success: function(data)
                                      {
                                        // alert(data);
                                        $("#preview6").hide();
                                         $(function(){
                                           new PNotify({
                                                          title: 'Update Expense Status',
                                                          text: 'Status Updated Successfully',
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