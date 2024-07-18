<style>
     .datatable-header {
        padding-top: 1.25rem !important;
    }
 .select2-selection--multiple .select2-search--inline:first-child .select2-search__field
    {
        width:125px !important;
    }
    table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }

    .dt-button{
        color: #fff !important;
        background-color: #1e6196 !important;
        border-color: #1e6196 !important;
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
    #MyAssignShiftTable th:first-child{
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

<?php $this->load->view('Admin/includes/n-header');    ?>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Assign Shift</span>
                <a data-toggle="modal" data-target="#assign-shift" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyAssignShiftTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Resource Name </th>
                        <th>Shift Name</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; foreach ($emp_shift as $row) { ?>
                        <tr>
                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row['name'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row['shift'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                    <?= $row['start_time']; ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                    <?= $row['end_time']; ?>
                                </div>
                            </td>
                            <!-- <td>
                                <a onclick="edit_shift(id)" id="<?= $row['shift_id']; ?>" data-toggle="tooltip" title="Edit Shift" data-original-title="Edit Shift"  data-placement="bottom"><i class="fa fa-edit"></i></a>
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
                                                            <a onclick="edit_shift(id)" id="<?= $row['shift_id']; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Shift 
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 

                                        </li>
                                    </ul>
                                </div>
                            </td>



                        </tr>

                    <?php $count++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Assign Shift</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="user_model_data1"></div>
            </div>

        </div>
    </div>
</div>
<div id="assign-shift" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Assign Shift</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addAssignShift" method="post">
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Resource <span class="text-danger" >*</span> </label>
                        <select class="form-control" multiple name="emp_id[]" id="edit_add_emp_id1" data-placeholder="Select Resource">
                            <?php foreach ($array_users->result() as $row3) { ?>
                                <option value="<?= $row3->id; ?>"><?= $row3->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Shift <span class="text-danger" >*</span> </label>
                        <select data-placeholder="Select Shift" class="form-control select2" data-fouc name="shift_timing" id="shift">
                            <option value="">Select Shift</option>
                            <?php foreach ($shift_list as $shift) { ?>
                                <option value="<?= $shift->id; ?>"><?= $shift->shift_title; ?> <?= $shift->from_timing.'-'.$shift->to_timing ?></option>
                            <?php   }   ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right:4px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>

<!--popup-->


<script type="text/javascript">
    $(document).ready(function () {
        FromLocationValidator = {
            row: '.col-md-12',
            validators: {
                notEmpty: {
                    message: 'Please Select Resource'
                }
            }
        };

        $('#addAssignShift').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                'emp_id[]': FromLocationValidator,
                shift_timing: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Shift'
                        }
                    }
                }
            }
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $("#addAssignShift").on('submit', (function (e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                var formresult = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url('admin/Tracking/add_shift'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        // alert(data);
                        $(function () {
                            // new PNotify({
                            //     title: 'Assign Shift',
                            //     text: 'Shift Assigned Successfully',
                            //     type: 'success'
                            // });
                            $("#assign-shift").modal('hide');
                            $('#successModalshiftassign').modal('show');
                        });
                        // setTimeout(function () {
                        //     window.location = "<?php echo base_url('admin/Tracking/shift');?>";
                        // }, 1000);

                    },
                    error: function () {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;
        }));
    });

</script>

<script>
    function edit_shift(id) {
        $(window).scrollTop(0);
        var datastring = 'shiftid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Tracking/edit_shift'); ?>",
            cache: false,
            data: datastring,
            success: function (data) {
                // alert(data);
                $('#modal_default1').modal('show');
                $('#user_model_data1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function () {
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

<div class="modal fade" id="successModalshiftassign" tabindex="-1" aria-labelledby="successModalshiftassignLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="ssuccessModalshiftassignLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Shift Assigned Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/shift'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#shift').select2({
        tags: true,
		dropdownParent: $("#assign-shift")
   });
   $('#edit_add_emp_id1').select2({
            tags: true,
            dropdownParent: $("#assign-shift"),
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

<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyAssignShiftTable').DataTable( {       
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