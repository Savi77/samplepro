<?php $this->load->view('Admin/includes/n-header');    ?>
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
    
    #MyRolePermissionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyRolePermissionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyRolePermissionTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    #MyRolePermissionTable th:first-child{
        width:100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    #Role-Permission fieldset.form-filedset {
        margin: 0;
    }
    .role-text {
        margin-top: 0%;
    }
</style>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Role Permission</span>
                <a data-toggle="modal" data-target="#Role-Permission" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyRolePermissionTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Role Name</th>
                        <th>Action</th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;  foreach ($role_list as $value) { ?>
                        <tr>
                            <td>
                                <div>
                                    <?= $i; $i++; ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:250px;">
                                    <?= $value['role_name'] ?>
                                </div>
                            </td>

                            <!-- <td class="text-center">
                                <a class="cursor-pointer" onclick="edit_permission(id)" id="<?= $value['role_id']; ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Role Permission" title="Edit Role Permission">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a class="cursor-pointer" data-popup="tooltip" data-placement="bottom" title="Delete Role Permission" <?= $DeleteClass; ?> onclick="del_role(<?= $value['role_id']; ?>)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
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
                                                            <a onclick="edit_permission(id)" id="<?= $value['role_id']; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Role Permission  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="del_role(<?= $value['role_id']; ?>)" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Role Permission  
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
                    <?php   }   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->
<div id="Role-Permission" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Add Role Permission</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" id="roelPermissionForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role <sup class="text-danger">*</sup></label>
                                <div class="">
                                    <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role" data-bv-field="role">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role Description <sup class="text-danger">*</sup></label>
                                <div class="">
                                    <input type="text" name="role_description" id="role_description" class="form-control" placeholder="Enter Role Description" data-bv-field="role">
                                </div>
                            </div>
                        </div>
                    </div>
                    <fieldset class="form-filedset email min-height-200" style="margin-bottom:30px;">
                        <legend class="field bulk-email">Role Permission</legend>
                        <table class="table" style="border: 2px solid #bb9c9c8c;">
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($feature_list as $row) {
                                    $collapse = "demo" . $i;
                                    $privilege = $row['privilege'];
                                    $component_id = $row['component_id'];
                                ?>
                                    <tr>
                                        <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                            <b><?= $row['component_title']; ?></b>
                                        </td>
                                        <td style="width: 78%;">
                                            <div class="form-group">
                                                <div class="row">
                                                    <?php
                                                    $checkbox = 1;

                                                    foreach ($privilege as  $row) {
                                                        $custom_id = $component_id . '/' . $row->privilege_id;
                                                    ?>
                                                        <div class="col-md-2">
                                                            <div class="checkbox">
                                                                <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                    <input style="height:16px;align-self:start;" type="checkbox" name="feature_ids[]" class="styled col-2" value="<?= $custom_id; ?>">
                                                                    <span class="role-text" ><?= $row->privilege;  ?></span>
                                                                </label>                                                            
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $checkbox++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                } ?>

                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="form-filedset email min-height-200">
                        <legend class="field bulk-email">Role Wise Report Permission</legend>
                        <table class="table" style="border: 2px solid #bb9c9c8c;">
                            <tbody>
                            <?php
                                    for($j=0;$j<COUNT($report_list);$j++) 
                                    {
                                        $frequency_id = $report_list[$j]->frquency_id;
                                        $get_report = $this->db->select('*')->from('tbl_frequency_wise_report_type')->where('frquency_id',$frequency_id)->get()->result();
                                    ?>
                                        <tr>
                                            <td style="width: 22%;background-color: #f3f3f3;border-right: 2px solid #ded4d4 !important;">
                                                <b><?=  $report_list[$j]->frequency_name;?></b>
                                            </td>
                                            <td style="width: 78%;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <?php
                                                        $checkbox = 1;

                                                        foreach ($get_report as $value) { 
                                                            $report_id = $value->frquency_id . '/' . $value->report_type_id;

                                                        ?>
                                                            <div class="col-md-2">
                                                                <div class="checkbox">
                                                                    <label style="display: flex;align-items: start;justify-content: flex-start;column-gap: 5px;">
                                                                        <input style="height:16px;align-self:start;" type="checkbox" name="report_id[]" class="styled col-2" value="<?= $report_id; ?>">
                                                                        <span class="role-text"><?= $value->report_type  ?></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        <?php
                                                            $checkbox++;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                <?php
                                    $i++;
                                } ?>

                            </tbody>
                        </table>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  style="margin-right:4px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Role Permission</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>
<script>
    $('#roelPermissionForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            role: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Role'
                    }
                }
            },
            role_description: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Role Description'
                    }
                }
            },
        }
    });
    $(document).ready(function(e) {
        $("#roelPermissionForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview44").show();
                $("#preview44").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $('#submitBtn').prop('disabled', true);
                $.ajax({
                    url: "<?php echo base_url('admin/UserPermission/SetRolePermission'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview44").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $(function() {
                            // new PNotify({
                            //     title: 'Assign Module Permission',
                            //     text: 'Permission Set Successfully',
                            //     type: 'success'
                            // });
                            $("#Role-Permission").modal('hide');
                            $("#successModalrolepermission").modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/UserPermission/PermissionRole'); ?>";
                        // }, 2000);
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
    function edit_permission(id) {
        var datastring = 'role_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/UserPermission/edit_mastergroup'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
            //alert(data);
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
        // $('#modal_default1').modal('hide');
        // $(".popover-body").css('display','block');
        location.reload();
    }
</script>

<script>
    function del_role(role_id) 
    {
        $('#role_id').val(role_id);
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    }
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
        $('#deleteconfirmationModal').modal('hide');
    }

    $(document).ready(function(e) 
    {
        $("#deleteroleForm").on('submit', (function(e) 
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
                var dep_id = $("#role_id").val();
                $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/UserPermission/deleteRolePermission'); ?>",
                cache: false,
                data: { "role_id": dep_id },
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalrolepermission" tabindex="-1" aria-labelledby="successModalrolepermissionLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalrolepermissionLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Role & Permission Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/UserPermission/PermissionRole'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Role & Permission?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteroleForm">
                        <input type="hidden" id="role_id" name="role_id" value="" >
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
                <a href="<?php echo base_url('admin/Master/department_designation'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyRolePermissionTable').DataTable( {       
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