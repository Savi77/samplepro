          <?php
            // echo json_encode($EditArray);
            $ExpenseTitle = $EditArray[0]->ExpenseTitle;
            $REFID = $EditArray[0]->REFID;
            $UserID = $EditArray[0]->UserID;
            $name = $EditArray[0]->name;

            ?>

            <style>
               #editform .repeater .col-md-2{
                    flex: 0 0 14.55% !important;
                    max-width: 14.55% !important;
                }
                #editform .repeater .col-md-2:first-child{
                    flex: 0 0 16.66667% !important;
                    max-width: 16.66667% !important;
                }
            </style>
<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">
        &nbsp;Edit Expense Of <?=$name?> - <?=$ExpenseTitle;?></h6>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form id="editform" method="post" enctype="multipart/form-data">
        <fieldset1>
            <input type="hidden" name="REFID" value="<?= $REFID; ?>">
            <input type="hidden" name="UserID" value="<?= $UserID; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" style="margin-bottom: 1.25rem;">
                                Expense Title <sup style="color: red;">*</sup>
                                <input type="text" class="form-control" name="ExpenseTitle" maxlength="50" value="<?= $ExpenseTitle; ?>" placeholder="Enter Expense Title">
                            </div>
                        </div>

                        <div class="col-md-1 col-md-offset-5">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="button" style="margin-top: 20px;float: right;" onclick="education_fields2();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 repeater">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                Expense Head  <sup style="color: red;">*</sup>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                Start Date  <sup style="color: red;">*</sup>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                End Date  <sup style="color: red;">*</sup>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                Amount  <sup style="color: red;">*</sup>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                Remark 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            Upload Document
                                <!-- <i class="icon-upload" title="Attach Document"></i> -->
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0px; " />
                </div>

                <?php
                $rowcount = 1;
                foreach ($EditArray as $key) {
                    $Status = $key->Status;
                ?>


                    <div class="form-group remove2class<?= $rowcount; ?>">
                        <input type="hidden" name="Status[]" value="<?= $Status; ?>">
                        <div class="col-md-12 repeater">
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-md-2 nopadding">
                                    <div class="form-group">
                                        <select class="form-control ExpenseID_3" name="ExpenseID[] " id="" data-placeholder="Select Expense">
                                            <option value="">Select Expense</option>
                                            <?php
                                            foreach ($ExpenseMasterArray as  $res) {
                                            ?>
                                                <option value="<?= $res->expense_id; ?>" <?php if ($res->expense_id == $key->ExpenseID) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                    <?= $res->expense_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control pickadate-selectors" name="SDate[]" id="Sdate123"  value="<?= date("d F, Y", strtotime($key->SDate)); ?>" placeholder="Select Start Date" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-2 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control pickadate-selectors" name="EDate[]" id="Edate123" value="<?= date("d F, Y", strtotime($key->EDate)); ?>" placeholder="Select End Date" autocomplete="off" onchange="checkvalidationdate()">
                                            <small id = 'error_end_date123' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Amount[]" value="<?= $key->Amount; ?>" placeholder="Enter Amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-2 nopadding">
                                    <div class="form-group">
                                        <!-- <input type="text" class="form-control" name="Remark[]" value="<?= $key->Remark; ?>" placeholder="Enter Remark" maxlength="50"> -->
                                        <textarea class="form-control" name="Remark[]" value="<?= $key->Remark; ?>" placeholder="Enter Remark" rows="1"><?= $key->Remark; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 nopadding">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" name="StoredFile[]" value="<?= $key->Document; ?>">
                                        <input type="hidden" class="form-control" name="Filename[]" value="<?= $key->Filename; ?>">
                                        <a href="#"><img src="<?= base_url() ?>assets/admin/expensedocuments/<?= $key->Document ?>" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah1"></a>
                                        <input type="file" class="form-control" name="Document[]" style="padding:4px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button" style="margin-top: 0px;" onclick="remove_education_fields2(<?= $rowcount; ?>);"> <span class="fa fa-minus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                <?php $rowcount++;
                } ?>
                <div class="col-md-12">
                    <div id="education_fields2"></div>
                </div>
            </div>
            <br /> <br />
            <div align="right">
                <span id="preview32"></span>
                <button type="submit" class="btn btn-primary" id="sub_btn_update">Update <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <br />
        </fieldset1>
    </form>
</div>


          <script type="text/javascript">
              var room2 = <?= $rowcount; ?>;

              function education_fields2() {
                  room2++;
                  var objTo = document.getElementById('education_fields2')
                  var divtest = document.createElement("div");
                  divtest.setAttribute("class", "form-group remove2class" + room2);
                  var rdiv = 'remove2class' + room2;
                  divtest.innerHTML = '<div class="row"> <input type="hidden" name="Status[]" value="Pending"><div class="repeater" style="display:flex;margin-bottom: 15px "><div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control ExpenseID_3"  name="ExpenseID[]" data-placeholder="Select Expense"><option value=""> Select Expense</option><?php foreach ($ExpenseMasterArray as  $res) { ?><option value="<?= $res->expense_id; ?>"><?= $res->expense_name; ?></option><?php } ?></select> </div></div><div class="col-md-2 nopadding"><div class="form-group"> <input type="text" class="form-control pickadate-selectors" name="SDate[]" id="Sdate1" placeholder="Select Start Date"  autocomplete="off" > </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control pickadate-selectors" name="EDate[]" id="Edate1" placeholder="Select End Date"  autocomplete="off" onchange="checkvalidationdate1()" > <small id = "error_end_date12" style="display:none; color: #f00 !important">End date can not be less than start date</small> </div></div><div class="col-md-2 nopadding"><div class="form-group">  <input type="text" class="form-control" name="Amount[]" placeholder="Enter Amount"  onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45 " maxlength="15"  autocomplete="off"> </div></div><div class="col-md-2 nopadding"><div class="form-group"><textarea class="form-control" name="Remark[]" placeholder=" Enter Remark" rows="1"></textarea></div></div><div class="col-md-3 nopadding"><div class="form-group"><div class="input-group"><input type="hidden" class="form-control" name="StoredFile[]"><input type="hidden" class="form-control" name="Filename[]"><input type="file" class="form-control" name="Document[]" style="padding:4px;"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields2(' + room2 + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div></div>';
                  objTo.appendChild(divtest)
                //   $(".datepicker").datepicker({
                //       dateFormat: 'dd-mm-yy'
                //   });
                $('.ExpenseID_3').select2({
                    dropdownParent: $("#EditExpenseModalAll")
                });
                $('.pickadate-selectors').pickadate({
                    selectYears: 100,
                    selectMonths: true
                });
                  $('#editform').bootstrapValidator('addField', 'ExpenseID[]');
                  $('#editform').bootstrapValidator('addField', 'Amount[]');
                  $('#editform').bootstrapValidator('addField', 'SDate[]');
                  $('#editform').bootstrapValidator('addField', 'EDate[]');
              }

              function remove_education_fields2(rid) {
                  // alert(rid);
                  $('.remove2class' + rid).remove();
              }
              function checkvalidationdate1()
                {
                    var start_date = new Date($('#Sdate1').val());
                    var end_date = new Date($('#Edate1').val());
                
                    if (start_date > end_date) 
                    {
                        $('#error_end_date12').css('display','block');
                        $("#sub_btn_update").attr('disabled', true);
                    }
                    else
                    {
                        $('#error_end_date12').css('display','none');
                        $("#sub_btn_update").attr('disabled', false);
                    }
                } 
          </script>


          <script>
              $(function() {

                //   $(".datepicker").datepicker({
                //       dateFormat: 'dd M yy'
                //   });

                  $('.pickadate-selectors').pickadate({
                    selectYears: 100,
                    selectMonths: true
                });

              });
          </script>


          <script>
              $(document).ready(function() {
                  Expensevalidator = {
                          row: '.col-md-3',
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Expense Head'
                              }
                          }
                      },
                      Amountvalidator = {
                          row: '.col-md-2',
                          validators: {
                              notEmpty: {
                                  message: 'Please Enter Amount'
                              }
                          }
                      },
                      Sdatevalidator = {
                          row: '.col-md-2',
                          validators: {
                              notEmpty: {
                                  message: 'Please Select Start Date'
                              }
                          }
                      },
                      EDatevalidator = {
                          row: '.col-md-2',
                          validators: {
                              notEmpty: {
                                  message: 'Please Select End Date'
                              }
                          }
                      },
                      ExpenseTitlevalidator = {
                          row: '.col-md-6',
                          validators: {
                              notEmpty: {
                                  message: 'Please Enter Expense Title'
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
              $(document).ready(function(e) {
                  $("#editform").on('submit', (function(e) {
                      //e.preventDefault();
                      if (e.isDefaultPrevented()) {
                          //alert('invalid');
                      } 
                      else 
                      {  
                          $("#preview32").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                          $("#preview32").show();
                          $.ajax({
                              url: "<?php echo base_url('admin/Expense/Update_User_Expense_multiple'); ?>",
                              type: "POST",
                              data: new FormData(this),
                              contentType: false,
                              cache: false,
                              processData: false,
                              success: function(data) {
                                  // alert(data);
                                  $("#preview32").hide();
                                  $(function() {
                                    //   new PNotify({
                                    //       title: 'Update User Expense',
                                    //       text: 'Expense Updated Successfully',
                                    //       type: 'success'
                                    //   });
                                    $("#UpdatesuccessModal").modal('show');
                                  });

                                //   setTimeout(function() {
                                //       window.location = "<?php echo base_url('admin/Expense/UserExpense'); ?>";
                                //   }, 1000);

                              },
                              error: function() {
                                $("#updateErrorModal").modal('show');
                              }
                          });
                      }
                      return false;
                  }));
              });
          </script>
          </script>
    <script type="text/javascript">
        // $('.ExpenseID_3').select2({
        //     dropdownParent: $("#EditExpenseModalAll")
        // });

        $('body').on('shown.bs.modal', '#EditExpenseModalAll', function() {
            $(this).find('.ExpenseID_3').each(function() {
                $(this).select2({ dropdownParent: $('#EditExpenseModalAll') });
            });
        });
                
        $('#EditExpenseModalAll').on('scroll', function (event) {
            $(this).find(".ExpenseID_3").each(function () {
                $(this).select2({ dropdownParent: $(this).parent() });
            });
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
    function checkvalidationdate()
        {
            var start_date = new Date($('#Sdate123').val());
            var end_date = new Date($('#Edate123').val());
        
            if (start_date > end_date) 
            {
                $('#error_end_date123').css('display','block');
                $("#sub_btn_update").attr('disabled', true);
            }
            else
            {
                $('#error_end_date123').css('display','none');
                $("#sub_btn_update").attr('disabled', false);
            }
        } 
</script>