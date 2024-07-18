<?php $this->load->view('Admin/includes/n-header');    ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<style>
    /* .dt-buttons {
        display: none;
    } */
    tr.odd {
        background: #fff;
        color: #000;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
    }
    /* #employee_grid tbody tr.dtrg-group {
        background-color: rgba(0,0,0,.05) !important;
    } */
    /* #employee_grid tbody tr.group {
        display: none;
        } */
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
    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px;
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
    tr.dtrg-level-0 {
        border-bottom: none;
    }
    tr.group {
        color: #000;
        /* font-weight: 600; */
        background-color: rgba(0,0,0,.05) !important;
        /* display: none; */
    }
    tr.dtrg-group{
        display: none;
    }
    #employee_grid_wrapper button.dt-button.buttons-columnVisibility:nth-child(2),#employee_grid_wrapper button.dt-button.buttons-columnVisibility:nth-child(3){
        display: none;
    }
    #addform .col-md-2.nopadding{
        flex: 0 0 14.55% !important;
        max-width: 14.55% !important;
    }
    #addform .col-md-2.nopadding:first-child{
        flex: 0 0 16.66667% !important;
        max-width: 16.66667% !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
    }
</style>
<div class="content-wrapper">
    <div class="content">
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Expenses</span>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" title="Filter Expenses" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#AddExpences"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span>
                </div>
                <!-- <div class="small-div contact text-right">
                    <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#AddExpences"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span>
                </div> -->
            </div>
            <!-- <div class="col-lg-12 dflex " > -->
               
               
                <form method="post" class="form-horizontal displayFilter" id="defaultForm" style="padding: 20px;">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label" style="text-wrap: nowrap;">Start Date </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please select start date"  autocomplete="off" value="<?= date('d F, Y'); ?>">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <label class="col-form-label" style="text-wrap: nowrap;">End Date</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please select end date" autocomplete="off" value="<?= date('d F, Y'); ?>" onchange="checkvalidationdate()">
                                <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than Start Date</small>
                            </div>
                        </div>

                        <div class="col-lg-6" style="text-align:right;padding-right: 0;margin-top:38px;">
                            <button type="submit" id="sub_btn123" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                        
                    </div>
                    
                    
                </form>
            <!-- </div> -->
        </div>


        <div class="card">
            <table id="employee_grid" class="table">
                <thead>
                    <tr>
                        <th style="padding-left: 107px;">Expense Head</th>
                        <th></th>
                        <th></th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
            
        
    </div>

    <?php $this->load->view('Admin/includes/n-footer');    ?>
</div>
</div>

<div id="AddExpences" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Add Expense</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addform" method="post" enctype="multipart/form-data">
                    <fieldset1>
                        
                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 nopadding">
                                        <div class="form-group">
                                            Expense Title <sup style="color: red;">*</sup>
                                            <input type="text" class="form-control" name="ExpenseTitle" maxlength="50" placeholder="Enter Expense Title">
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <br>
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-2 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Expense Head  <sup style="color: red;">*</sup></label>
                                                <select class="form-control addExpense" name="ExpenseID[]" id="expenseID_1" data-placeholder="Select Expense">
                                                    <option value="">Select Expense</option>
                                                    <?php
                                                    foreach ($ExpenseMasterArray as  $res) {
                                                    ?>
                                                        <option value="<?= $res->expense_id; ?>"><?= $res->expense_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Start Date  <sup style="color: red;">*</sup></label>
                                                <input type="text" class="form-control pickadate-selectors rounded-right" name="SDate[]" id="Sdate"  placeholder="Select Start Date"  autocomplete="off" >
                                                <!-- <input type="text" class="form-control datepicker datechnage sdate" name="SDate[]"   placeholder="Select Start Date"  autocomplete="off" > -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">End Date  <sup style="color: red;">*</sup></label>
                                                <input type="text" class="form-control pickadate-selectors rounded-right" name="EDate[]" id="Edate"  placeholder="Select End Date"  autocomplete="off" onchange="checkvalidationdate1()">
                                                <!-- <input type="text" class="form-control datepicker datechnage edate" name="EDate[]"   placeholder="Select End Date"  autocomplete="off" onchange="checkvalidationdate1()"> -->
                                                <small id = 'error_end_date1' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-2 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Amount  <sup style="color: red;">*</sup></label>
                                                <input type="text" class="form-control" name="Amount[]" placeholder="Enter Amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Note </label>
                                                <!-- <input type="text" class="form-control" name="Remark[]" placeholder=" Enter Remark" maxlength="50"> -->
                                                <textarea class="form-control" name="Remark[]" placeholder=" Enter Remark" rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 nopadding">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="">Upload Document</label>
                                                
                                                
                                                <div class="input-group-btn d-flex">
                                                    <input type="file" class="form-control rmv-border-right" name="Document[]" style="padding:4px;">
                                                    <button class="btn btn-success rmv-border-left" type="button" onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div id="education_fields"></div>
                            </div>
                        </div>
                        
                        <div align="right">
                            <span id="preview"></span>
                            <button type="submit" class="btn btn-primary" id="remove_disable_btn" >Submit <i class="icon-arrow-right14 position-right"></i></button>
                            
                        </div>
                    </fieldset1>
                    <br />
                </form>
            </div>
        </div>
    </div>
</div>

<div id="EditExpenseModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-coins" style="zoom:1.1; "></i>
                    &nbsp;Edit Expense</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body"> -->
                <div id="complaint_model_data">

                </div>
            <!-- </div> -->
        </div>
    </div>
</div>


<div id="ChangeStatus" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-coins" style="zoom:1.1; "></i>
                    &nbsp;Change Status</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"> -->
                <div id="ChangeStatusData">

                </div>
            <!-- </div> -->
        </div>
    </div>
</div>


<div id="EditExpenseModalAll" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-coins" style="zoom:1.1; "></i>
                    &nbsp;Edit Expense</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"> -->
                <div id="complaint_model_data_all">

                </div>
            <!-- </div> -->
        </div>
    </div>
</div>


<div id="ExpenseChangeStatusModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-clippy" style="zoom:1.1; "></i>
                    &nbsp;Change Expense Status</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"> -->
                <div id="ExpenseChangeStatusData">

                </div>
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- /footer -->
<script type="text/javascript">
    $("#start_date").on("dp.change", function(e) {
        // alert();
        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;

        if (startDate != '') {

            if ((Date.parse(startDate) == Date.parse(endDate))) {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            } else if ((Date.parse(startDate) > Date.parse(endDate))) {
                PNotify.removeAll();
                $('#desktopbutton').prop('disabled', true);
                new PNotify({
                    title: 'Event',
                    text: 'End date should be greater than Start date',
                    type: 'warning'
                });
            } else {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            }
        }
    });

    $("#end_date").on("dp.change", function(e) {
        // alert();
        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;

        if (startDate != '') {

            if ((Date.parse(startDate) == Date.parse(endDate))) {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            } else if ((Date.parse(startDate) > Date.parse(endDate))) {
                PNotify.removeAll();
                $('#desktopbutton').prop('disabled', true);
                new PNotify({
                    title: 'Event',
                    text: 'End date should be greater than Start date',
                    type: 'warning'
                });

            } else {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            }
        }
    });
</script>

<script type="text/javascript">
    $("#start_date").on("dp.change", function(e) {
        $('#defaultForm').bootstrapValidator('revalidateField', 'start_date');
    });

    $("#end_date").on("dp.change", function(e) {
        $('#defaultForm').bootstrapValidator('revalidateField', 'end_date');
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Date'
                        }
                    }
                },

                end_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Date'
                        }
                    }
                },
            }
        });
    });
</script>

<script type="text/javascript">
    
    $(document).ready(function(e) {
        $("#defaultForm").on('submit', (function(e) {
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: '<?php echo base_url('admin/Expense/SetSession') ?>',
                    // url: '<?php echo base_url('admin/Expense/AjaxData') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        var getdata = data;
                        // alert(JSON.stringify(getdata));
                        $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Uploading...." /> ');
                        $("#employee_grid").dataTable().fnDestroy();
                        $("#sub_btn123").attr('disabled', false);
                        var groupColumn = 1;
                        var rescheduleTable =  $('#employee_grid').DataTable({
                            "bProcessing": true,
                            "serverSide": true,
                            "order": [
                                [2, 'asc'],
                                [1, 'asc']
                            ],
                            "rowGroup": {
                                dataSrc: [2, 1]
                            },
                            "columnDefs": [{
                                targets: [1, 2],
                                visible: false
                            }],

                            "displayLength": 10,
                            "drawCallback": function(settings) 
                            {
                                var api = this.api();
                                var rows = api.rows({
                                    page: 'current'
                                }).nodes();
                                var last = null;
                                var groupadmin = [];
                                api.column(groupColumn, {
                                    page: 'current'
                                }).data().each(function(group, i) {
                                    if (last !== group) {
                                        $(rows).eq(i).before(
                                            '<tr class="group" id="' + i + '"><td colspan="9">' + group + '</td></tr>'
                                        );
                                        groupadmin.push(i);
                                        last = group;
                                    }
                                });
                                for (var k = 0; k < groupadmin.length; k++) {
                                    $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                                    $("#" + groupadmin[k]).click(function() {
                                        var gid = $(this).attr("id");
                                    });
                                }
                                popoverOptions = {
                                        content: function () {
                                            return $(this).siblings('.my-popover-content').html();
                                        },
                                        placement: 'bottom',
                                        container: 'body',
                                        html: true,
                                        sanitize: false,
                                    };
                                    $('.panel-button').popover(popoverOptions);

                                    $('.panel-button').click(function (e) {
                                        e.stopPropagation();
                                    });
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
                                                }
                                            }
                                        
                                        });
                                    });
                                        
                                }
                                $('.panel-button').on('click', function (e) {
                                    $('.panel-button').not(this).popover('hide');
                                });

                                $(document).ready(function(){
                                $('[rel="tooltip"]').tooltip();   
                                });

                            },
                            "ajax": {
                                url: "<?php echo base_url('admin/Expense/AjaxData'); ?>",
                                type: "post", // type of method  ,GET/POST/DELETE
                                // dataType: 'json',
                                // data: getdata,
                                // success: function()
                                // {
                                //     $("#sub_btn123").attr('disabled', false);
                                // },
                                error: function() {
                                    $("#employee_grid_processing").css("display", "none");
                                }
                            },
                            "buttons": [
                            {
                                extend: 'colvis',
                                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                                className: 'btn bg-indigo-400 btn-icon'
                            }
                        ],
                        });
                        // document.getElementById("desktopbutton").disabled = false;
                        $("#loader_gif").hide();
                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            e.preventDefault();
        }));
    });

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
</script>


<script type="text/javascript">
    function EditExpenseDetails(REFID) {
        var datastring = 'REFID=' + REFID;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/EditExpenseDetailsAdmin'); ?>",
            data: datastring,
            success: function(data) {
                $('#EditExpenseModalAll').modal('show');
                $('#complaint_model_data_all').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    function updateUI_EditExpenseDetails_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#EditExpenseDetails_button_close').attr('data-dismiss', 'modal');
        location.reload();
    }

    function ExpenseChangeStatus(REFID) {
        var datastring = 'REFID=' + REFID;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ExpenseChangeStatus'); ?>",
            data: datastring,
            success: function(data) {
                $('#ExpenseChangeStatusModal').modal('show');
                $('#ExpenseChangeStatusData').html(data);
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
</script>

<script>
    $(function() {
        $(".datepicker").pickadate({
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectMonths: true,
            selectYears: true
        }) 
    });
    $('.datepicker').change(function() {
        $('#addform').bootstrapValidator('revalidateField', 'SDate[]');
        $('#addform').bootstrapValidator('revalidateField', 'EDate[]');
    });
</script>

<script type="text/javascript">
    var room = 1;

    function education_fields() {
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="row"> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control addExpense"  name="ExpenseID[]" data-placeholder="Select Expense"><option value=""> Select Expense</option><?php foreach ($ExpenseMasterArray as  $res) { ?><option value="<?= $res->expense_id; ?>"><?= $res->expense_name; ?></option><?php } ?></select> </div></div><div class="col-md-2 nopadding"><div class="form-group"> <input type="text" class="form-control datepicker datechnage sdate" name="SDate[]" id="Sdate1"  placeholder="Select Start Date"  autocomplete="off" > </div></div><div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control datepicker datechnage edate" name="EDate[]" id="Edate1" placeholder="Select End Date"  autocomplete="off" onchange="checkvalidationdate2()" ><small id = "error_end_date2" style="display:none; color: #f00 !important">End date can not be less than start date</small></div></div><div class="col-md-2 nopadding"><div class="form-group">  <input type="text" class="form-control" name="Amount[]" placeholder="Enter Amount"  onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45 " maxlength="15"  autocomplete="off"> </div></div><div class="col-md-2 nopadding"><div class="form-group"><textarea class="form-control" name="Remark[]" placeholder=" Enter Remark" rows="1"></textarea></div></div><div class="col-md-3 nopadding"><div class="form-group"><div class="input-group"> <input type="file" class="form-control" name="Document[]" style="padding:4px;"><div class="input-group-btn rmv-border-right"> <button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';
        objTo.appendChild(divtest)

        
        $(".datepicker").pickadate({
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectMonths: true,
            selectYears: true
        });

        $('.addExpense').select2({
            dropdownParent: $("#AddExpences")
        });
        
        $('.datepicker').change(function() {
            // $('#addform').bootstrapValidator('revalidateField', 'SDate[]');
            // $('#addform').bootstrapValidator('revalidateField', 'EDate[]');
        });
        
        $('#addform').bootstrapValidator('addField', 'ExpenseID[]');
        $('#addform').bootstrapValidator('addField', 'Amount[]');
        // $('#addform').bootstrapValidator('addField', 'SDate[]');
        // $('#addform').bootstrapValidator('addField', 'EDate[]');


        

    }

    function checkvalidationdate2()
    {
        var start_date = new Date($('#Sdate1').val());
        var end_date = new Date($('#Edate1').val());
        if (start_date > end_date) 
        {
            $('#error_end_date2').css('display','block');
            $("#remove_disable_btn").attr('disabled', true);
        }
        else
        {
            $('#error_end_date2').css('display','none');
            $("#remove_disable_btn").attr('disabled', false);
        }
    }

    function checkvalidationdate1()
    {
        var start_date = new Date($('#Sdate').val());
        var end_date = new Date($('#Edate').val());
        if (start_date > end_date) 
        {
            $('#error_end_date1').css('display','block');
            $("#remove_disable_btn").attr('disabled', true);
        }
        else
        {
            $('#error_end_date1').css('display','none');
            $("#remove_disable_btn").attr('disabled', false);
        }
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
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

            $('#addform')
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
        $("#addform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Expense/Insert_user_expense  ') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        PNotify.removeAll();
                        $("#preview").hide();
                        // new PNotify({
                        //     title: 'Add Expenses',
                        //     text: 'Expense Added Successfully !',
                        //     type: 'success'
                        // });
                        $("#AddExpences").modal('hide');
                        $("#successModalExpense").modal('show');
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Expense/UserExpense') ?>";
                        // }, 2000);
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


<script type="text/javascript">
    $(document).ready(function() {
        var groupColumn = 1;
        var rescheduleTable =  $('#employee_grid').DataTable({
            "bProcessing": true,
            "serverSide": true,
            "order": [
                [2, 'asc'],
                [1, 'asc']
            ],
            "rowGroup": {
                dataSrc: [2, 1]
            },
            "columnDefs": [{
                targets: [1, 2],
                visible: false
            }],

            "displayLength": 10,
            // "order": [[ 3, "desc" ]],
            "drawCallback": function(settings) 
            {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                var groupadmin = [];
                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group" id="' + i + '"><td colspan="9">' + group + '</td></tr>'
                        );
                        groupadmin.push(i);
                        last = group;
                    }
                });
                for (var k = 0; k < groupadmin.length; k++) {
                    $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                    $("#" + groupadmin[k]).click(function() {
                        var gid = $(this).attr("id");
                    });
                }


                // popoverOptions = {
                //     content: function () {
                //         // Get the content from the hidden sibling.
                //         return $(this).siblings('.my-popover-content').html();
                //     },
                //     placement: 'bottom',
                //     container: 'body',
                //     html: true,
                //     sanitize: false,
                //     // selector: '[data-toggle="popover"]',
                // };
                // $('.panel-button').popover(popoverOptions);

                // $('.panel-button').click(function (e) {
                //     e.stopPropagation();
                // });

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

                $(document).ready(function(){
                $('[rel="tooltip"]').tooltip();   
                });

            },
            // "language": {
            //     "search": "Filter:    ",
            //     "searchPlaceholder": "Search by Name"
            // },
            "ajax": {
                url: "<?php echo base_url('admin/Expense/AjaxData_default'); ?>",
                type: "post", // type of method  ,GET/POST/DELETE
                error: function() {
                    $("#employee_grid_processing").css("display", "none");
                }
            },
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        });

        
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

<script type="text/javascript">
    function EditExpense(ID) {
        // alert(ID);
        var datastring = 'ID=' + ID;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/EditUserExpense'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#EditExpenseModal').modal('show');
                $('#complaint_model_data').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    function updateUI_EditExpense_close()
    {
        $(".popover-body").css('display','block');
        $('#EditExpense_button_close').attr('data-dismiss', 'modal');
    }


    function OnHoldExpense(ID) {
        var datastring = 'ID=' + ID + '&Status=On Hold';
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#ChangeStatus').modal('show');
                $('#ChangeStatusData').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }

    function RejectExpense(ID) {
        var datastring = 'ID=' + ID + '&Status=Rejected';
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#ChangeStatus').modal('show');
                $('#ChangeStatusData').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }

    function ApproveExpense(ID) {
        var datastring = 'ID=' + ID + '&Status=Approved';
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Expense/ChangeExpenseStatus'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#ChangeStatus').modal('show');
                $('#ChangeStatusData').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
    function updateUI_ApproveExpense_button_close()
    {
        $(".popover-body").css('display','block');
        $('#ApproveExpense_button_close').attr('data-dismiss', 'modal');
    }

</script>




<script>
    function delete_expense(expense_id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this expense?</p>',
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

            var datastring = 'expense_id=' + expense_id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Expense/delete_expense'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Expense',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                    });
                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Expense'); ?>";
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
</script>
    <script type="text/javascript">
        // $('.addExpense').select2({
        //     dropdownParent: $("#AddExpences")
        // });

        $('body').on('shown.bs.modal', '#AddExpences', function() {
            $(this).find('.addExpense').each(function() {
                $(this).select2({ dropdownParent: $('#AddExpences') });
            });
        });
                
        $('#AddExpences').on('scroll', function (event) {
            $(this).find(".addExpense").each(function () {
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

    <!-- <script>
        function showFilter() {
            var filter = document.querySelector(".displayFilter");
            // filter.style.display = "block";
            if (filter.style.display === "none") {
                filter.style.display = "block";
            } else {
                filter.style.display = "none";
            }

        }
</script> -->

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
<script>
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();   
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
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalExpense" tabindex="-1" aria-labelledby="successModalExpenseLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalExpenseLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Expense Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense/UserExpense'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date').val());
            var end_date = new Date($('#end_date').val());
            if (start_date > end_date) 
            {
                $('#error_end_date').css('display','block');
                $("#sub_btn123").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#sub_btn123").attr('disabled', false);
            }
        } 
</script>
