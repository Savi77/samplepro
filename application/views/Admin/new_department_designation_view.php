<style>
    #Designation-List .flex-form-group .col-sm-11{
        flex: 0 0 90% !important;
        max-width: 90% !important;
    }
    #Designation-List .flex-form-group .col-sm-1{
        flex: 0 0 10% !important;
        max-width: 10% !important;
        margin-top: 30px;
    }
    .flex-form-group{
        align-items: start !important;
    }
    #moreSupportUpload .form-group .col-sm-11{
        flex: 0 0 90% !important;
        max-width: 90% !important;
    }
    #moreSupportUpload .form-group .col-sm-1{
        flex: 0 0 10% !important;
        max-width: 10% !important;
    }
    table td{
        color: #000 !important;
    }
    /* table td:nth-child(1) a div:hover{
        color: #605959 !important;
    } */
    .popover .arrow{
        display: none !important;
    }
   .popover-body{
        width: 280px !important;
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
    .datatable-header,.datatable-footer{
        padding: 1.25rem 1.25rem 0 1.25rem !important;
    }
    .dt-button{
        color: #fff !important;
        background-color: #1e6196 !important;
        border-color: #1e6196 !important;
        width: 50px;
    }
    .dt-button:hover{
        color: #fff !important;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon ;
        display: inline-block ;
        border: 0 ;
        vertical-align: middle ;
        font-size: 1rem ;
        margin-left: 0.46875rem ;
        line-height: 1 ;
        position: relative ;
        content: "" ;
    }
    .dt-button .buttons-columnVisibility{
        width:100% ;
    }
    #MyDepartmentTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyDepartmentTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyDepartmentTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    tr.bg {
        background: #fff !important;
    }
    .dt-button-collection .dt-button.active {
        color: #fff !important;
        background-color: #2196f3 !important;
    }
    button.dt-button.buttons-collection.buttons-colvis.btn.bg-indigo-400.btn-icon{
        width:50px !important;
    }
    .dt-button.buttons-columnVisibility{
        background: #fff !important;
        color: #000 !important;
    }
    .dt-button.buttons-columnVisibility:hover{
        background-color: #eee !important;
    }
    .dt-button-collection .dt-button.active:hover{
        background-color: #2196f3 !important;
    }
    #MyDepartmentTable th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>
<?php $this->load->view('Admin/includes/n-header');  ?>
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

        if ($priviledge_key == 'ACTIVE') {
            if ($status == 1) {
                $StatusClass = 'style="display:block"; ';
            } else {
                $StatusClass = 'style="display:none"; ';
            }
        }
    }
?>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Department-Designation</span>
                <a <?= $AddClassP ?> data-toggle="modal" data-target="#Designation-List" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic  -->
            <table class="table table-striped" id="MyDepartmentTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Action</th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                        <th class="d-none" ></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($get_data as $row) {
                        if ($count % 2 == 0) {
                            $style = 'bg';
                        } else {
                            $style = '';
                        }

                    ?>
                        <tr class="<?= $style ?>">
                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->department_name ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->designation_name ?>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="row">
                                    <a class="cursor-pointer" data-toggle="tooltip" rel="tooltip" title="Edit Department / Designation" <?= $EditClass; ?> data-toggle="modal" onclick="edit_client(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="cursor-pointer" data-toggle="tooltip" rel="tooltip" title="Delete Department / Designation" <?= $DeleteClass; ?> onclick="del_client(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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
                                                            <a data-toggle="modal" onclick="edit_client(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Department-Designation  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="Delete_dep_deg(<?= $row->dep_id; ?>,<?= $row->deg_id; ?>)" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Department-Designation  
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 

                                        </li>
                                        <!-- </i></a></li> -->
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
<script>
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();   
});
</script>
<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->
<div id="Designation-List" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content border">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Add Department-Designation</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="TypeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Department Name <span class="color-red">*</span></label>
                        <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department Name" maxlength="50">
                    </div>
                    
                    <div class="row flex-form-group">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label>Designation Name <span class="color-red">*</span></label>
                                <input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter Designation Name" maxlength="50" >
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding: 0;">
                            <div class="form-group">
                                <button type="button" class="btn btn-success addButton" id="attachSupport" style="height:38px;"><i class="icon-add"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="moreSupportUpload"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Department-Designation</h6>
                <button type="button" class="close" onclick="updateUI_edit_client_button()" id="edit_client_button">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>
<script>
    function edit_client(dep_id, deg_id) {
        var datastring = 'dep_id=' + dep_id + '&deg_id=' + deg_id;
        // alert(datastring);return false;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master/edit_department_designation'); ?>",
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
    function updateUI_edit_client_button()
    {
        $(".popover-body").css('display','block');
        $('#edit_client_button').attr('data-dismiss', 'modal');
    }

    function del_client(dep_id, deg_id) {

        $('#dep_id').val(dep_id);
        $('#deg_id').val(deg_id);
        $('#deleteconfirmationModal').modal('show');

        // var notice = new PNotify({
        //     title: 'Confirmation',
        //     text: '<p>Are you sure you want to delete this Department / Designation?</p>',
        //     hide: false,
        //     type: 'warning',
        //     confirm: {
        //         confirm: true,
        //         buttons: [{
        //                 text: 'Yes',
        //                 addClass: 'btn-sm'
        //             },
        //             {
        //                 text: 'No',
        //                 addClass: 'btn-sm'
        //             }
        //         ]
        //     },
        //     buttons: {
        //         closer: false,
        //         sticker: false
        //     },
        //     history: {
        //         history: false
        //     }
        // })

        // // On confirm
        // notice.get().on('pnotify.confirm', function() {

        //     var datastring = 'dep_id=' + dep_id + '&deg_id=' + deg_id;
        //     // alert(datastring);return false;
        //     $.ajax({
        //         type: "post",
        //         url: "<?php echo base_url('admin/Master/deleteDepartmentDesignation'); ?>",
        //         cache: false,
        //         data: datastring,
        //         success: function(data) {
        //             //alert(data);
        //             $(function() {
        //                 new PNotify({
        //                     title: 'Delete Form',
        //                     text: 'Deleted successfully',
        //                     type: 'success'
        //                 });
        //             });

        //             setTimeout(function() {
        //                 window.location =
        //                     "<?php echo base_url('admin/Master/department_designation'); ?>";
        //             }, 1000);


        //         },
        //         error: function() {
        //             alert('Error while request..');
        //         }
        //     });
        // })
        // // On cancel
        // notice.get().on('pnotify.cancel', function() {
        //     // alert('Oh ok. Chicken, I see.');
        // });

    }

    function Delete_dep_deg(dep_id, deg_id)
    {
        $('#dep_id').val(dep_id);
        $('#deg_id').val(deg_id);
        $('#deleteconfirmationdepModal').modal('show');
    }

    $(document).ready(function(e) 
    {
    $("#deletedepForm").on('submit', (function(e) 
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
            var dep_id = $("#dep_id").val();
            var deg_id = $("#deg_id").val();
            
            $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master/deleteDepartmentDesignation'); ?>",
            cache: false,
            data: { "dep_id": dep_id , "deg_id": deg_id },
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


    $(document).ready(function () {
            designationvalidator = {
                    row: '.col-md-12',
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Designation Name'
                        }
                    }
                },
                $('#TypeForm')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        'designation[]': designationvalidator,
                        department: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Department Name'
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

    $(document).ready(function (e) {
        $("#TypeForm").on('submit', (function (e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?= base_url();?>admin/Master/add_department_designation",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == 1) {
                            $(function () {
                                // new PNotify({
                                //     title: 'Department / Designation',
                                //     text: 'Added  Successfully',
                                //     type: 'success'
                                // });
                                $("#Designation-List").modal('hide');
                                $("#successModalDepartmentdesignation").modal('show');
                            });

                            // setTimeout(function () {
                            //     window.location =
                            //         "<?php echo base_url(); ?>admin/Master/department_designation";
                            // }, 1000);
                        }
                        // else{
                        //     $(function () {
                        //         new PNotify({
                        //             title: 'Department / Designation',
                        //             text: 'Please atleast one designation add.',
                        //             type: 'error'
                        //         });
                        //     });
                        // }
                    },
                    error: function () {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });

    
    var cheque_number = 1;
    $('#attachSupport').click(function () {
        //add more file
        var moreUploadTag = '';
        moreUploadTag +=
            '<div class="form-group row"><label class="control-label col-sm-12" for="email">Designation Name</label><div class="col-sm-11"><input type="text" class="form-control" id="designation' +
            cheque_number +
            '" name="designation[]" placeholder="Enter Designation Name" maxlength="50"></div><div class="col-sm-1" style="padding: 0;"><button type="button" class="btn btn-danger removeButton" onclick="del_file(' +
            cheque_number + ')" style="height:38px;"><i class=" icon-trash"></i></button></div></div>';
        $('<dl id="delete_file' + cheque_number + '">' + moreUploadTag + '</dl>').appendTo('#moreSupportUpload');
        cheque_number++;
    });

    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
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
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalDepartmentdesignation" tabindex="-1" aria-labelledby="successModalDepartmentdesignationLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalDepartmentdesignationLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Department-Designation Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/department_designation'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteconfirmationdepModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Department-Designation?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletedepForm">
                        <input type="hidden" id="dep_id" name="dep_id" value="" >
                        <input type="hidden" id="deg_id" name="deg_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
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
        var rescheduleTable = $('#MyDepartmentTable').DataTable( {       
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