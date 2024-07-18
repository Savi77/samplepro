<?php $this->load->view('Admin/includes/n-header');    ?>

<?php
    // echo json_encode($user_permission);
    $AddClassP = 'style="display:block";';
    $EditClass = 'style="display:block";';
    $DeleteClass = 'style="display:block";';
    $StatusClass = 'style="display:block";';

    foreach ($user_permission as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;
        if ($priviledge_key == 'ADD') {
            if ($status == 1) {
                $AddClassP = ' style="display:block"; ';
            } else {
                $AddClassP = ' style="display:none"; ';
            }
        }

        if ($priviledge_key == 'EDIT') {
            // echo 11;
            if ($status == 1) {
                $EditClass = ' style="display:block"; ';
            } else {
                $EditClass = ' style="display:none"; ';
            }
        }

        if ($priviledge_key == 'DELETE') {
            if ($status == 1) {
                $DeleteClass = 'style="display:block"; ';
            } else {
                $DeleteClass = 'style="display:none"; ';
            }
        }
    }

?>

<style>
     .datatable-header {
        padding-top: 1.25rem !important;
    }
     table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }

    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    tr.bg {
     background: #fff !important;
     }
     
     #MyCreditTermTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyCreditTermTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyCreditTermTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    #MyCreditTermTable th:first-child{
        width:100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Credit Term</span>
                <a <?= $AddClassP ?> data-toggle="modal" data-target="#Credit-Term" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic" -->
            <table class="table table-striped" id="MyCreditTermTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Credit Name</th>
                        <th>Credit Days</th>
                        <th <?= $StatusClass; ?>>Status</th>
                        <th >Action</th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($listdata as $row) {
                        if ($count % 2 == 0) {
                            $bg_color_class = 'class="bg"';
                        } else {
                            $bg_color_class = '';
                        }
                    ?>
                        <tr <?= $bg_color_class ?>>

                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->credit_name ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                     <?= $row->credit_days ?>
                                </div>
                            </td>

                            <td <?= $StatusClass; ?>><?php if ($row->status == 1) { ?>
                                <div style="width:150px;">
                                    <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->credit_id ?>" onclick="deactivate(this)" data-id="<?= $row->credit_id ?>"> Active </button>
                                    <?php } else { ?>
                                        <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->credit_id ?>" onclick="activate(this)" data-id="<?= $row->credit_id ?>"> Inactive </button>
                                    <?php } ?>
                                </div>
                            </td>

                            <!-- <td class="text-center">
                                <div class="row">
                                    <a class="cursor-pointer" data-toggle="modal" onclick="EditCreditTerm(id)" id="<?= $row->credit_id; ?>" data-popup="tooltip" title="Edit Credit Term" data-placement="bottom" data-original-title="Edit Credit Term" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>
                                    <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->credit_id ?>"  id="<?= $row->credit_id; ?>" data-popup="tooltip" title="Delete Credit Term" data-placement="bottom" data-original-title="Delete Credit Term"><i class="fa fa-trash"></i></a>

                                </div>
                            </td> -->

                            <td>
                                <div style="width:150px;">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>  
                                            <div>
                                                <div class="panel-button">
                                                    <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                        <i class="icon-menu9" style="cursor:pointer;"></i>
                                                    </a>
                                                </div>
                                                
                                                <div class="my-popover-content" style="display:none">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="modal" onclick="EditCreditTerm(id)" id="<?= $row->credit_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Credit Term  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->credit_id ?>"  id="<?= $row->credit_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Credit Term  
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 

                                        </li>
                                    </ul>
                                </div>
                            </td>

                            <td class="d-none" ></td>
                            <td class="d-none" ></td>
                            <td class="d-none" ></td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

<div id="Credit-Term" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Credit Term</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addform">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Credit Name <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="credit_name" id="credit_name" placeholder="Enter Credit Name" onkeyup="chk_credit_name()">
                        <small id="error_credit_name" style="color: #f00 !important;"></small>
                    </div>
                    <div class="form-group clockpicker" data-autoclose="true" style="margin-bottom:0;">
                        <label>Credit Days <sup style="color: red">*</sup></label>
                        <input type="tel" class="form-control" name="credit_days" placeholder="Enter Credit Days" id="credit_days" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" onkeyup="chk_credit_days()">
                        <small id="error_credit_days" style="color: #f00 !important;"></small>
                    </div>
                </div>
                <div class="modal-footer" style="padding-right: 20px;">
                    <button type="submit" class="btn btn-primary" id="credit_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Credit Term</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#addform').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                credit_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Credit Name'
                        }
                    }
                },
                credit_days: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Credit Days'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#addform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/CreditTerm/AddCreditTerm'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_upload").hide();
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Add Credit Term',
                            //     text: 'Added Successfully !!',
                            //     type: 'success'
                            // });
                            $("#Credit-Term").modal('hide');
                            $("#successModalCreditTerm").modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/CreditTerm'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        // alert('fail');
                        $("#alertModal").modal('show');

                    }
                });
            }
            return false;
        }));
    });
</script>


<script>
    function EditCreditTerm(credit_id) {
        var datastring = 'credit_id=' + credit_id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/CreditTerm/EditCreditTerm'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    function updateUI_edit_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#modal_default1').modal('hide');
        location.reload();

    }
</script>

<script>
    function DeleteCreditTerm(credit_id) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this term ?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'credit_id=' + credit_id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/CreditTerm/DeleteCreditTerm'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Credit Term',
                            text: 'Deleted successfully !!',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/CreditTerm'); ?>";
                    }, 800);
                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });
    }
</script>


<script>
    function activate($id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Credit Term?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'creditid=' + $id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/CreditTerm/activate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Activate Credit Term',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/CreditTerm'); ?>";
                    }, 1000);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<script>
    function deactivate($id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to deactivate this Credit Term?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'creditid=' + $id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/CreditTerm/deactivate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'deactivate Credit Term',
                            text: 'deactivated successfully',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/CreditTerm'); ?>";
                    }, 1000);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<div class="modal fade" id="successModalCreditTerm" tabindex="-1" aria-labelledby="successModalCreditTermLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalCreditTermLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Credit Term Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/CreditTerm'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Credit Term?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletecreditForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSucessModal" tabindex="-1" aria-labelledby="deleteSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deleteSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/branch_master'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/branch_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateconfirmationModal" tabindex="-1" aria-labelledby="deactivateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deactivateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Credit Term?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deactivateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="modal fade" id="activateconfirmationModal" tabindex="-1" aria-labelledby="activateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="activateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Credit Term?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="activateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Inactive successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Active successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function deactivate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deactivateconfirmationModal').modal('show');
    };
    function activate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#activateconfirmationModal').modal('show');
    };
</script>

<script>
$(document).ready(function(e) 
{
  $("#deactivateForm").on('submit', (function(e) 
  {
    // alert("Hii");

    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/deactivate'); ?>",
          cache: false,
          data: { "creditid": datastring },
          success: function(data) {
            $(function() {
              $("deactivateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#activateForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/activate'); ?>",
          cache: false,
          data: { "creditid": datastring },
          success: function(data) {
            $(function() {
              $("activateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function DeleteList (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
        $('#deleteconfirmationModal').modal('hide');
    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#deletecreditForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/CreditTerm/DeleteCreditTerm'); ?>",
          cache: false,
          data: { "credit_id": datastring },
          success: function(data) {
            $(function() {
              $("deleteSucessModal").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Master'); ?>";
            // }, 1000);


          },
          error: function() {
            // alert('Error while request..');
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function chk_credit_name()
    {
        credit_name = $('#credit_name').val();
        
        if (credit_name == '') 
        {
            $('#error_credit_name').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_name'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_name: credit_name},
                success: function(data) 
                {
                   
                    if (data == 1) 
                    {
                        $('#error_credit_name').empty();
                        $('#error_credit_name').css('display','block');
                        $('#error_credit_name').html('Please add another credit name, this credit name is already created.');
                        $("#credit_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_name').hide();
                    }
                }
            });
        }
    }
    
    function chk_credit_days()
    {
        credit_days = $('#credit_days').val();
        if (credit_days == '') 
        {
            $('#error_credit_days').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_credit_days'); ?>",
                dataType: "html",
                type: "POST",
                data: {credit_days: credit_days},
                success: function(data) 
                {

                    if (data == 1) 
                    {
                        $('#error_credit_days').empty();
                        $('#error_credit_days').css('display','block');
                        $('#error_credit_days').html('Please add another credit days, this credit days is already created.');
                        $("#credit_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_credit_days').hide();
                    }
                }
            });
        }
    }
</script>

<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyCreditTermTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        // order: [[0, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        "drawCallback": function() {
                popoverOptions = {
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.my-popover-content').html();
                },
                placement: 'bottom',
                container: 'body',
                html: true,
                sanitize: false,
                // selector: '[data-toggle="popover"]',
            };
            $('.panel-button').popover(popoverOptions);

            $('.panel-button').click(function (e) {
                e.stopPropagation();
            });
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
            });
            }  
        // stateSave: true,
        // columnDefs: [
        //     {
        //         targets: -1,
        //         visible: true,
        //     }
        // ]
    } );

    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        rescheduleTable.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = rescheduleTable.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            rescheduleTable.column(i).visible(columnVisibility[i]);
        }
    }

    
});
</script>
<script>

        $(document).ready(function () {
       
        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $(document).click(function (e) {
            if ($(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>