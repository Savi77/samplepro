<style type="text/css">
    .StatusTable>td {
        padding: 10px 15px !important;
        line-height: 1.15384616 !important;
    }
    table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #expenseChangeTable th{
        text-wrap:nowrap !important;
    }
</style>



<?php

// echo json_encode($EditArray);

$ExpenseTitle = $EditArray[0]->ExpenseTitle;
$ExpenseName = $EditArray[0]->name;
$REFID = $EditArray[0]->REFID;

?>
<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">
        &nbsp;Change Expense Status Of <?= $ExpenseName?> - <?= $ExpenseTitle; ?></h6>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form id="changestatusform" method="post" enctype="multipart/form-data">
    <fieldset1>
        <div class="row">
            <!-- <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><h5><b><?= $ExpenseName?></b></h5></label><br>
                            <label><h5><b><?= $ExpenseTitle; ?></b></h5></label>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 table-responsive">
                <table class="table table-striped" style="border:1px solid #dddddd;word-wrap: break-word;" id="expenseChangeTable">
                    <thead>
                        <tr>
                            <th style="width:35px;">Sr No</th>
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
                        $rowcount = 1;
                        foreach ($EditArray as $key) {

                            // echo json_encode($ExpenseMasterArray);
                        
                            foreach ($ExpenseMasterArray as $res) {
                                if ($res->expense_id == $key->ExpenseID) {
                                    $expenhead = $res->expense_name;
                                }
                            }

                            $expense_name = $key->expense_name;

                            ?>
                            
                            <tr class="StatusTable">
                                <td>
                                    <div>
                                        <?= $rowcount; ?>
                                        <input type="hidden" class="form-control" name="ID[]" value="<?= $key->ID; ?>" readonly>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;text-wrap:wrap;">
                                        <?= $expense_name; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:120px;">
                                        <?= date("d M Y", strtotime($key->SDate)); ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:120px;">
                                        <?= date("d M Y", strtotime($key->EDate)); ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:120px;">
                                        <?= $key->Amount; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;text-wrap:wrap;">
                                        <?= $key->Remark; ?>
                                    </div>
                                </td>
                                <td style="position:relative;">
                                    <div class="input-group" style="width:120px;">
                                        <div class="form-group" style="margin-bottom:0;">
                                            <select class="form-control" name="Status[]" id="Status_exp"
                                                data-placeholder="Select Status">
                                                <option value="Pending" <?php if ($key->Status == 'Pending') {
                                                    echo 'selected';
                                                } ?>>Pending</option>
                                                <option value="On Hold" <?php if ($key->Status == 'On Hold') {
                                                    echo 'selected';
                                                } ?>>On Hold</option>
                                                <option value="Approved" <?php if ($key->Status == 'Approved') {
                                                    echo 'selected';
                                                } ?>>Approved</option>
                                                <option value="Rejected" <?php if ($key->Status == 'Rejected') {
                                                    echo 'selected';
                                                } ?>>Rejected</option>
                                            </select>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="input-group" style="width:120px;">
                                        <div class="form-group" style="margin-bottom:0;">
                                            <input type="text" class="form-control" name="AdminApprovedAmount[]"
                                                value="<?= $key->AdminApprovedAmount; ?>" style="width:95px;">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group" style="width:150px;">
                                        <div class="form-group" style="margin-bottom:0;">
                                            <!-- <input type="text" class="form-control" name="AdminRemark[]"
                                                value="<?= $key->AdminRemark; ?>"> -->
                                                <textarea class="form-control" name="AdminRemark[]" value="<?= $key->AdminRemark; ?>" cols="10" rows="1"></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $rowcount++; ?>
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <br /> <br />
        <div align="right">
            <button type="submit" class="btn btn-primary">Update <i
                    class="icon-arrow-right14 position-right"></i></button>
            <span id="preview6"></span>
        </div>
        <br />
    </fieldset1>
</form>
</div>

<script>
    $(document).ready(function () {
        AdminRemarkvalidator = {
            row: '.col-md-2',
            validators: {
                notEmpty: {
                    message: 'Please Enter Remark'
                }
            }
        },
            Statusvalidator = {
                row: '.col-md-1',
                validators: {
                    notEmpty: {
                        message: 'Please Select Status'
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
    $(document).ready(function (e) {
        $("#changestatusform").on('submit', (function (e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview6").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview6").show();
                $.ajax({
                    url: "<?php echo base_url('admin/Expense/Update_User_Expense_Status'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        // alert(data);
                        $("#preview6").hide();
                        $(function () {
                            // new PNotify({
                            //     title: 'Update Expense Status',
                            //     text: 'Status Updated Successfully',
                            //     type: 'success'
                            // });
                            $("#statusUpdatesuccessModal").modal('show');
                        });

                        // setTimeout(function () {
                        //     window.location = "<?php echo base_url('admin/Expense/UserExpense'); ?>";
                        // }, 1000);

                    },
                    error: function () {
                        $("#statusupdateErrorModal").modal('show');
                    }
                });
            }
            return false;
        }));
    });
</script>


<script type="text/javascript">
    // $('.addSelect').select2({
    //     dropdownParent: $("#ExpenseChangeStatusModal")
    // });
    $('#Status_exp').select2({
        dropdownParent: $("#ExpenseChangeStatusModal")
    });

</script>

<script>
    $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function (key, value,) {
            value.focus();
        });
    });
</script>

<div class="modal fade" id="statusUpdatesuccessModal" tabindex="-1" aria-labelledby="statusUpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="statusUpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
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

<div class="modal fade" id="statusupdateErrorModal" tabindex="-1" aria-labelledby="statusupdateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="statusupdateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
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

