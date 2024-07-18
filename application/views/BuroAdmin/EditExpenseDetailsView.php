          

            <?php 
            // echo json_encode($EditArray);
            $ExpenseTitle=$EditArray[0]->ExpenseTitle;
            $REFID=$EditArray[0]->REFID;
            $UserID=$EditArray[0]->UserID;
            
            ?>

              <form id="editform" method="post" enctype="multipart/form-data"> 
                  <fieldset>
                    <input type="hidden" name="REFID" value="<?= $REFID;?>">
                    <input type="hidden" name="UserID" value="<?= $UserID;?>">
                      <div class="row">      
                        <div class="col-md-12"> 
                           <div class="row"> 
                             <div class="col-md-6">
                                <div class="form-group">
                                    Expense Title : 
                                    <input type="text" class="form-control" name="ExpenseTitle" maxlength="50"  value="<?= $ExpenseTitle;?>">                     
                                </div>
                             </div>

                              <div class="col-md-1 col-md-offset-5">
                                 <div class="input-group">
                                    <div class="input-group-btn">
                                      <button class="btn btn-success" type="button" style="margin-top: 20px;float: right;"  onclick="education_fields2();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>         
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12"> 
                           <div class="row"> 
                              <div class="col-md-2">
                                <div class="form-group">
                                  Expense Head : <sup style="color: red;">*</sup>
                                </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                  Start Date : <sup style="color: red;">*</sup>
                                </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                  End Date : <sup style="color: red;">*</sup>
                                </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                 Amount : <sup style="color: red;">*</sup>
                                </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                  Note :  
                                </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                   <i class="icon-upload" title="Attach Document"></i>
                                </div>
                              </div>
                           </div>
                           <hr style="margin-top: 0px; " />
                         </div>  

                      <?php 
                      $rowcount=1;
                      foreach ($EditArray as $key) 
                      {
                        ?> 


                        <div class="form-group remove2class<?= $rowcount;?>">
                         <div class="col-md-12"> 
                           <div class="row"  style="margin-bottom: 15px;"> 
                             <div class="col-md-2 nopadding">
                              <div class="form-group">                              
                                <select class="form-control" name="ExpenseID[] ">
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

                            <div class="col-md-2 nopadding">
                              <div class="form-group">
                                <input type="text" class="form-control datepicker " name="SDate[]" value="<?= date("d M Y",strtotime($key->SDate));?>"    placeholder="Select Start Date"  autocomplete="off">
                              </div>
                            </div>

                            <div class="col-md-2 nopadding">
                              <div class="form-group">
                                <div class="input-group">    
                                  <input type="text" class="form-control datepicker" name="EDate[]"   value="<?= date("d M Y",strtotime($key->EDate));?>"   placeholder="Select End Date" autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2 nopadding">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="Amount[]"   value="<?= $key->Amount;?>" placeholder="Select Enter Amount"  onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15"  autocomplete="off">                      
                              </div>
                            </div>
                            <div class="col-md-2 nopadding">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="Remark[]"   value="<?= $key->Remark;?>" placeholder=" Enter Remark" maxlength="50">                      
                              </div>
                            </div>
                            <div class="col-md-2 nopadding">
                               <div class="input-group">
                                  <input type="hidden" class="form-control" name="StoredFile[]" value="<?= $key->Document;?>">  
                                  <input type="hidden" class="form-control" name="Filename[]" value="<?= $key->Filename;?>"> 
                                  <input type="file" class="form-control" name="Document[]" >     
                                  <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button" style="margin-top: 0px;"  onclick="remove_education_fields2(<?=$rowcount;?>);"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                                  </div>         
                               </div>
                            </div>
                            <div class="clear"></div>
                          </div>  
                          </div>
                        </div>  
                        <?php  $rowcount++; } ?>
                        <div class="col-md-12"> 
                          <div id="education_fields2"></div>  
                        </div>
                    </div>   
                   <br/> <br/>
                  <div align="center">
                    <button type="submit" class="btn btn-primary">Update Expenses <i class="icon-arrow-right14 position-right"></i></button>
                     <span id="preview32"></span>
                  </div> 
                  <br/>
              </fieldset>  
            </form>


          <script type="text/javascript">
              var room2 = <?= $rowcount;?>;
              function education_fields2() 
               {
                  room2++;
                  var objTo = document.getElementById('education_fields2')
                  var divtest = document.createElement("div");
                  divtest.setAttribute("class", "form-group remove2class"+room2);
                  var rdiv = 'remove2class'+room2;
                  divtest.innerHTML = '<div class="row"> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control"  name="ExpenseID[]"><option value=""> Select Expense</option><?php foreach ($ExpenseMasterArray as  $res) { ?><option value="<?=$res->expense_id; ?>"><?= $res->expense_name;?></option><?php } ?></select> </div></div><div class="col-md-2 nopadding"><div class="form-group"> <input type="text" class="form-control datepicker" name="SDate[]"   placeholder="Select Start Date"  autocomplete="off" > </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control datepicker" name="EDate[]"  placeholder="Select End Date"  autocomplete="off" ></div></div><div class="col-md-2 nopadding"><div class="form-group">  <input type="text" class="form-control" name="Amount[]" placeholder="Select Enter Amount"  onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45 " maxlength="15"  autocomplete="off"> </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control" name="Remark[]" placeholder=" Enter Remark" ></div></div><div class="col-md-2 nopadding"><div class="form-group"><div class="input-group"><input type="hidden" class="form-control" name="StoredFile[]"><input type="hidden" class="form-control" name="Filename[]"><input type="file" class="form-control" name="Document[]"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields2('+ room2 +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';        
                  objTo.appendChild(divtest)                 
                   $(".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
                   $('#editform').bootstrapValidator('addField', 'ExpenseID[]');
                   $('#editform').bootstrapValidator('addField', 'Amount[]');
                   $('#editform').bootstrapValidator('addField', 'SDate[]');
                   $('#editform').bootstrapValidator('addField', 'EDate[]');
                }
          
               function remove_education_fields2(rid) 
               {
                   // alert(rid);
                  $('.remove2class'+rid).remove();
               }
          </script>
             

        <script>
          $( function()
           {
              $( ".datepicker" ).datepicker({ dateFormat: 'dd M yy' });
          } );
        </script>


    <script>
    $(document).ready(function() {
            Expensevalidator = {
                row: '.col-md-3',
                validators: {
                              notEmpty: {
                                  message: ' Expense is required'
                              }
                }
            },
            Amountvalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' Amount is required'
                              }
                }
            },
            Sdatevalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' Start Date is required'
                              }
                }
            },
            EDatevalidator = {
                row: '.col-md-2',
                validators: {
                              notEmpty: {
                                  message: ' End Date is required'
                              }
                }
            },
            ExpenseTitlevalidator = {
                row: '.col-md-6',
                validators: {
                              notEmpty: {
                                  message: ' Expense Title is required'
                              }
                }
            },

        $('#editform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
          fields: {
                    'ExpenseID[]': Expensevalidator,
                    'Amount[]': Amountvalidator,  
                    'SDate[]': Sdatevalidator,    
                    'EDate[]': EDatevalidator,
                     ExpenseTitle: ExpenseTitlevalidator,
                }
            })
    });
    </script>


    <script type="text/javascript">
      $(document).ready(function (e)
       {
         $("#editform").on('submit',(function(e)
             {  
               //e.preventDefault();
               if (e.isDefaultPrevented())
                {
                  //alert('invalid');
                }
                else
                {
                    $("#preview32").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#preview32").show();   
                    $.ajax({
                      url: "<?php echo base_url('admin/Expense/Update_User_Expense_multiple'); ?>",
                      type: "POST",
                      data:  new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data)
                        {
                          // alert(data);
                          $("#preview32").hide();
                           $(function(){
                             new PNotify({
                                            title: 'Update User Expense',
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