<?php $this->load->view('Admin/includes/n-header');    ?>

<style>
    /* .dt-buttons {
        display: none;
    } */
    #GroupsPopup .flex-form-group .col-sm-11{
        flex: 0 0 90%;
        max-width: 90%;
    }
    #GroupsPopup .flex-form-group .col-sm-1{
        flex: 0 0 10%;
        max-width: 10%;
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
        width: 250px !important;
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
     
     #MyTermConditionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyTermConditionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyTermConditionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    .datatable-header {
        padding-top: 1.25rem !important;
    }
    #MyTermConditionTable th:first-child{
        width:100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    #MyTermConditionTable td:nth-child(3) ul{
        padding-left: 0;
    }
</style>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Terms & Conditions</span>
                <a data-toggle="modal" data-target="#GroupsPopup" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
              <!-- <table class="table" id="example">
                <thead>
                    <tr>
                        <th  style="display:none;">Terms id</th>
                        <th>Terms For</th>
                        <th>Terms & Conditions</th>
                        <th>Status</th>
                        <th style="width:10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;

                    foreach ($listdata as $row) {
                        $terms = explode("$^", $row->term_condition);
                        $final_terms = '<ul>';
                        for ($i = 1; $i < count($terms); $i++) 
                        {
                            $final_terms = $final_terms . '<li>' . $terms[$i] . '</li>';
                        }
                        $final_terms .= '</ul>';
                    ?>
                        <tr>
                            <td style="display:none;"><?= $row->term_id; ?></td>
                            <td><?= $row->term_for; ?></td>
                            <td>
                                    <?= $final_terms; ?>
                            </td>
                            <td><?php if ($row->status == 1) { ?>
                                    <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->term_id ?>" onclick="deactivate(this)" data-id="<?= $row->term_id ?>"> Active </button>
                                <?php } else { ?>
                                    <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->term_id ?>" onclick="activate(this)" data-id="<?= $row->term_id ?>"> Inactive </button>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <a class="cursor-pointer" data-toggle="modal" onclick="Edit(id)" id="<?= $row->term_id; ?>" data-popup="tooltip" title="Edit Terms & Conditions" data-placement="bottom" data-original-title="Edit Terms & Conditions"><i class="fa fa-edit"></i></a>
                                    <a class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->term_id ?>" id="<?= $row->term_id; ?>" data-popup="tooltip" title="Delete Terms & Conditions" data-placement="bottom" data-original-title="Delete Terms & Conditions"><i class="fa fa-trash"></i></a>

                                </div>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table> -->
          <table class="table table-striped" id="MyTermConditionTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Terms For</th>
                        <th>Terms & Conditions</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count = 1;

                    foreach ($listdata as $row) 
                    {
                        $terms = explode("$^", $row->term_condition);
                        $final_terms = '<ul>';
                        for ($i = 1; $i < count($terms); $i++) 
                        {
                            $final_terms = $final_terms . '<li  class="text-wrap-col" style="margin-bottom: 10px;width:500px;">' . $terms[$i] . '</li>';
                        }
                        $final_terms .= '</ul>';
                    ?>
                    <tr>
                        <td>
                            <div>
                                <?= $count;?>
                            </div>
                        </td>

                        <td>
                            <div class="text-wrap-col" style="width:150px;">
                                <?= $row->term_for; ?>
                            </div>
                        </td>

                        <td>
                            <div style="width:500px;">
                                <?= $final_terms; ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;">
                                <?php 
                                    if ($row->status == 1) 
                                    { 
                                ?>
                                    <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->term_id ?>" onclick="deactivate(this)" data-id="<?= $row->term_id ?>"> Active </button>
                                <?php 
                                    } 
                                    else 
                                    { 
                                ?>
                                    <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->term_id ?>" onclick="activate(this)" data-id="<?= $row->term_id ?>"> Inactive </button>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </td>

                        <!-- <td class="text-center">
                            <div class="row">
                                <a class="cursor-pointer" data-toggle="modal" onclick="Edit(id)" id="<?= $row->term_id; ?>" data-popup="tooltip" title="Edit Terms & Conditions" data-placement="bottom" data-original-title="Edit Terms & Conditions"><i class="fa fa-edit"></i></a>
                                <a class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->term_id ?>" id="<?= $row->term_id; ?>" data-popup="tooltip" title="Delete Terms & Conditions" data-placement="bottom" data-original-title="Delete Terms & Conditions"><i class="fa fa-trash"></i></a>&nbsp &nbsp
                                <a class="cursor-pointer" data-toggle="modal" onclick="ViewTermCondition(this)" data-id="<?= $row->term_id ?>" id="<?= $row->term_id; ?>" title="View Term & Condition" data-popup="tooltip" data-placement="bottom" data-original-title="View Terms & Conditions"><i class="icon-eye"></i></a>
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
                                                        <a data-toggle="modal" onclick="Edit(id)" id="<?= $row->term_id; ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-green"></span> Edit Term & Condition  
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->term_id ?>" id="<?= $row->term_id; ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-red"></span> Delete Term & Condition  
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="modal" onclick="ViewTermCondition(this)" data-id="<?= $row->term_id ?>" id="<?= $row->term_id; ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-blue"></span> View Term & Condition  
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> 

                                    </li>
                                </ul>
                            </div>
                        </td>

                        <td class="d-none"></td>
                        <td class="d-none"></td>
                        <td class="d-none"></td>

                    </tr>
                <?php 
                    $count++;
                    } 
                ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <script> 
$(document).ready(function(){
    var rescheduleTable = $('#mytermtable').DataTable( {       

        scrollCollapse: true,
        paging:         true, 
        order: [[0, 'DESC']],
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

            }  
        
    } ); -->
        
<!-- }); -->

<!-- </script> -->

<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

<div id="GroupsPopup" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Terms & Conditions</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addform">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Term For  <sup style="color: red">*</sup></label>
                        <input type="text" name="term_for" id="term_for" class="form-control" placeholder="E.g. Tally" onkeyup="chk_term_condition()">
                        <small id="error_term_for" style="color: #f00 !important;"></small>
                    </div>
                    <div class="row flex-form-group" style="align-items:flex-start;">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label>Terms & Conditions <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="terms1" name="terms[]" placeholder="Enter Terms & Condition">
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding-left: 0;padding-right: 0;">
                            <div class="form-group">
                                <button type="button" class="btn btn-success addButton" id="attachSupport" style="margin-top:28px"><i class="icon-add"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="moreSupportUpload"></div>
                </div>
                <div class="modal-footer" style="padding-right: 20px;">
                    <button type="submit" class="btn btn-primary" id="termcon_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
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
                <h6 class="card-title py-sm-4 card-headings">Edit Terms & Conditions</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>

<script>
    var cheque_number = 1;
    $('#attachSupport').click(function() {
        //add more file
        var moreUploadTag = '';
        moreUploadTag +=
            '<div class="form-group row"><div class="col-sm-11"><input type="text" class="form-control" id="terms' +
            cheque_number + '" name="terms[]" placeholder="Enter Terms & Condition"></div><div class="col-sm-1" style="padding-left: 0;padding-right: 0;" ><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
            cheque_number + ')"><i class=" icon-trash"></i></button></div></div>';
        $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
        cheque_number++;
    });

    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        var groupColumn = 1;
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [0, 'desc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) 
                {
                    if (last !== group) 
                    {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="5">' + group + '</td></tr>'  
                        );

                        last = group;
                    }
                    
                });
            }
        });

    });
</script> -->

<script>
    $(document).ready(function() {
        termsvalidator = {
                row: '.col-md-12',
                validators: {
                    notEmpty: {
                        message: 'Please Enter Term & Condition'
                    }
                }
            },
            $('#addform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'terms[]': termsvalidator,
                    term_for: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Terms for'
                            }
                        }
                    },
                }
            })
            // Add button click handler
            .on('click', '.addButton', function() {})
            // Remove button click handler
            .on('click', '.removeButton', function() {});
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
                    url: "<?php echo base_url('admin/TermConditions/Add'); ?>",
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
                            //     title: 'Add Term | Condition',
                            //     text: 'Added Successfully !!',
                            //     type: 'success'
                            // });
                            $("#Target-Type-List").modal('hide');
                            $("#successModalTermsandCondition").modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/TermConditions'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;
        }));
    });
</script>


<script>
    function Edit(term_id) {
        var datastring = 'term_id=' + term_id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/TermConditions/Edit'); ?>",
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
    function Delete(term_id) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Term Condition ?</p>',
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
            var datastring = 'term_id=' + term_id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/TermConditions/Delete'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Specification',
                            text: 'Deleted successfully !!',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/TermConditions'); ?>";
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
            text: '<p>Are you sure you want to activate this TermConditions?</p>',
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

            var datastring = 'termid=' + $id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/TermConditions/activate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Activate Term Conditions',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/TermConditions'); ?>";
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
            text: '<p>Are you sure you want to deactivate this TermsConditions?</p>',
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

            var datastring = 'termid=' + $id;
            alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/TermConditions/deactivate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'deactivate Term Conditions',
                            text: 'deactivated successfully',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/TermConditions'); ?>";
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTermsandCondition" tabindex="-1" aria-labelledby="successModalTermsandConditionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTermsandConditionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Term & Condition Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Term & Condition?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletetermForm">
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
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
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
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Term & Condition?</div>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Term & Condition?</div>
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
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
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
                <a href="<?php echo base_url('admin/TermConditions'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="viewtermModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">View Terms & Conditions Details</h6>
                <button type="button" class="close" data-dismiss="modal" onclick="updateUI_view_button_close()">&times;</button>
            </div>
            <div class="modal-body">
                <div id="viewterm_model_data"></div>
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
          url: "<?php echo base_url('admin/TermConditions/deactivate'); ?>",
          cache: false,
          data: { "termid": datastring },
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
          url: "<?php echo base_url('admin/TermConditions/activate'); ?>",
          cache: false,
          data: { "termid": datastring },
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
        $('#deleteconfirmationModal').modal('hide');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
    }

    function ViewTermCondition(element)
    {
        var Id = element.getAttribute("data-id");
        
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/TermConditions/ViewTermCondition'); ?>",
          cache: false,
          data: { "term_id": Id },
          success: function(data) 
          {
            
            $(function() 
            {
              $("#viewtermModal").modal('show');
              $('#viewterm_model_data').html(data);
              $(".popover-body").css('display','none');
            });
          },
          error: function() {
            alert('Error while request..');
          }
        });
    }
    function updateUI_view_button_close()
    {
        $(".popover-body").css('display','block');
        // $('view_button_close').attr('data-dismiss', 'modal');
        $("#viewtermModal").modal('hide');

    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#deletetermForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/TermConditions/Delete'); ?>",
          cache: false,
          data: { "term_id": datastring },
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
    function chk_term_condition()
    {
        term_for = $('#term_for').val();
        
        if (term_for == '') 
        {
            $('#error_term_for').empty();
            // $('#error_emp_code').html('Employee Id is required');
            // $('#emp_id').focus();
        } 
        else 
        {
            $.ajax({
                url: "<?php echo base_url('admin/Master/chk_term_condition'); ?>",
                dataType: "html",
                type: "POST",
                data: {term_for: term_for},
                success: function(data) 
                {
                    
                    if (data == 1) 
                    {
                        $('#error_term_for').empty();
                        $('#error_term_for').css('display','block');
                        $('#error_term_for').html('Please add another term, this term is already created.');
                        $("#termcon_sub_btn").attr('disabled', true);
                        // $().(disabled="disabled")
                    }   
                    else 
                    {
                        $('#error_term_for').hide();
                    }
                }
            });
        }
    }
</script>

<script>
$(document).ready(function(){
    var rescheduleTable = $('#MyTermConditionTable').DataTable( {       
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