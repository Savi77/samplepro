<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    /* .dt-buttons {
        display: none;
    } */
    tr.group{
        background: #fff;
        color: #000;
    }
    /* tr.odd{
        background: #e6f5fa;
    } */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    table td{
        color: #000 !important;
   }
   .text-wrap-col{
        width: 150px !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
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
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    #reminder_table2 th:first-child,#reminder_table1 th:first-child ,#bday_table th:first-child {
        width: 100px !important;
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
                <span class="span-py-10 white-text">Today's Event</span>
                <div class="small-div contact text-right">
                    <!-- <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#modal_default2"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span> -->
                </div>
            </div>
            <?php
                $get_reminder_details = $this->db->select('*')->from('tbl_organisation')->where('org_id',$this->session->org_id)->get()->row();
            ?>
        <div class="tab-section">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified border pl-3 pr-3" style="margin-top:1.25rem;">
                <li class="nav-item"><a href="#view_activity" class="nav-link active" data-toggle="tab">Birthday (<?= COUNT($birthday_list)?>)</a></li>
                <li class="nav-item"><a href="#view_contact" class="nav-link" data-toggle="tab">Marriage Anniversary (<?= COUNT($marriage_anniversary_list)?>)</a></li>
                <li class="nav-item"><a href="#view_general" class="nav-link" data-toggle="tab">Company Anniversary (<?= COUNT($company_anniversary_list)?>)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane has-padding active" id="view_activity">
                    <form method="post" class="form-horizontal" id="send_bulk_mail_bday">
                        <table class="table table-striped" id="bday_table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:80px;text-wrap:nowrap;"><input style="margin-right:10px;" class="selectall cursor-pointer" type="checkbox" id="selectAllChk" value = 0>#</th>
                                    <th>Name</th>
                                    <th class = 'd-none'></th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($birthday_list as $row) {
                                    
                                    if($row['department'] != '')
                                    {  
                                        $department = $this->db->select('department_name')->from('tbl_department')->where('dep_id',$row['department'])->get()->row()->department_name;
                                    }
                                    else
                                    {
                                        $department = '_';
                                    }

                                    if($row['role_id'] != '')
                                    {
                                        $role = $this->db->select('role_name')->from('tbl_role')->where('role_id',$row['role_id'])->get()->row()->role_name;
                                    }
                                    else
                                    {
                                        $role = '_';
                                    }
                                    $id = $row['id'];

                                ?>
                                    <tr <?= $bg_class ?>>
                                        <td>
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input-styled cursor-pointer mt-1 checkboxdata" name="updateFiled[]"  value="<?= $id; ?>" onclick="addValue('.$id.')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-wrap-col" style="width:150px;">
                                                <?= $row['name']; ?>
                                            </div>
                                        </td>
                                        <td class = 'd-none'>
                                        </td>
                                        <td>
                                            <div class="text-wrap-col" style="width:150px;">
                                                <?= $department; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-wrap-col" style="width:150px;">
                                                <?= $role; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:100px;">
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
                                                                            <a href="<?= base_url() ?>admin/Dashboard/Single_bday/<?= $row['id']; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                                <span class="status-mark position-left dot dot-blue"></span> Send Mail  
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>   
                                                        </div> 
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                        </table>
                        <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
                            <span id="loader_gif"></span>
                            <button class="btn btn-primary" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane has-padding" id="view_contact">
                    <form method="post" class="form-horizontal" id="send_bulk_mail_marriage">
                        <table class="table table-striped" id="reminder_table1">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:80px;text-wrap:nowrap;"><input style="margin-right:10px;" class="selectall_m cursor-pointer" type="checkbox" id="selectAllChk_m" value = 0>#</th>
                                    <th>Name</th>
                                    <!-- <th class="d-none"></th> -->
                                    <th>Marriage Anniversary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($marriage_anniversary_list as $row) {
                                    // echo "<pre>";
                                    // print_r($row);
                                ?>
                                    <tr <?= $bg_class ?>>
                                        <td>
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input-styled cursor-pointer mt-1 checkboxdata" name="updateFiled_m[]"  value="<?= $row['id']?>" onclick="addValue()">                                        </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-wrap-col" style="width:150px;">
                                                <?= $row['name'] ?>
                                            </div>
                                        </td>
                                        <td class="d-none"></td>
                                        <td> 
                                            <div style="width:200px;">
                                                <?= date('d F, Y',strtotime($row['marriage_anniversary_date']));?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:100px;">
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
                                                                            <a href="<?= base_url() ?>admin/Dashboard/Single_marriage/<?= $row['id']; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                                <span class="status-mark position-left dot dot-blue"></span> Send Mail  
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                        </table>
                        <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
                            <span id="loader_gif"></span>
                            <button class="btn btn-primary" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane has-padding" id="view_general">
                    <form method="post" class="form-horizontal" id="send_bulk_mail_company">
                        <table class="table table-striped" id="reminder_table2">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:80px;text-wrap:nowrap;"><input style="margin-right:10px;" class="selectall_c cursor-pointer" type="checkbox" id="selectAllChk_c" value = 0>#</th>
                                    <th>Name</th>
                                    <!-- <th class="d-none"></th> -->
                                    <th>Company Anniversary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($company_anniversary_list as $row) {
                                    
                                ?>
                                    <tr <?= $bg_class ?>>
                                        <td>
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input-styled cursor-pointer mt-1 checkboxdata" name="updateFiled_c[]"  value="<?= $row->customer_id?>" onclick="addValue('.$row->customer_id.')">                                        </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-wrap-col" style="width:150px;">
                                                <?= $row->company_name ?>
                                            </div>
                                        </td>
                                        <td class = 'd-none'> 
                                    
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                                <?= date('d M Y', strtotime($row->company_anniversary)) ?> 
                                            </div>
                                        </td>

                                        <td>
                                            <div style="width:100px;">
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
                                                                            <a href="<?= base_url() ?>admin/Dashboard/Single_company/<?= $row->customer_id; ?>" <?= $ViewClass; ?> style="color:#333333;">
                                                                                <span class="status-mark position-left dot dot-blue"></span> Send Mail  
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                        </table>
                        <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
                            <span id="loader_gif"></span>
                            <button class="btn btn-primary" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $this->load->view('Admin/includes/n-footer'); ?>
<!--popup-->
<script>
    $('.selectall').click(function(e) 
    {
        if($(this).val() == 0)
        {
            $('input[type=checkbox]').prop('checked', true);
            $('#selectAllChk').val(1);
            return false;
        }
        else
        {
            $('input[type=checkbox]').prop('checked', false);
            $('#selectAllChk').val(0);
            return false;
        }
    });
    $('.selectall_m').click(function(e)
    {
        if($(this).val() == 0)
        {
            $('input[type=checkbox]').prop('checked', true);
            $('#selectAllChk_m').val(1);
            return false;
        }
        else
        {
            $('input[type=checkbox]').prop('checked', false);
            $('#selectAllChk_m').val(0);
            return false;
        }
    });
    
    $('.selectall_c').click(function(e)
    {
        if($(this).val() == 0)
        {
            $('input[type=checkbox]').prop('checked', true);
            $('#selectAllChk_c').val(1);
            return false;
        }
        else
        {
            $('input[type=checkbox]').prop('checked', false);
            $('#selectAllChk_c').val(0);
            return false;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.clockpicker').clockpicker().find('input').change(function() {
            console.log(this.value);
        });
    });
    $(document).ready(function() {
        
    });

    function showDataRecurringData(id) {
        if (id == 1) {
            $('#recuuringDataAdd').show();
            $('#recuuringDataAdd').css('display','contents');
        } else {
            $('#recuuringDataAdd').hide();
            $('#recuuringDataAdd').css('display','none');
        }
    }
    $(document).ready(function() {
        var groupColumn = 2;
        var table = $('#bday_table').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                
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
                    table.on('page.dt', function() {
                        var currentPage = table.page.info().page + 1;
                        
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


                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });
            

               
            }
        });

        var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

        // Hide columns initially
        for (var i = 0; i < columnsToHide.length; i++) {
            table.column(columnsToHide[i]).visible(false);
        }

        // Event listener for column visibility change
        table.on('column-visibility.dt', function(e, settings, column, state) {
            // Update local storage with current visibility state
            var columnVisibility = table.columns().visible().toArray();
            localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
        });

        // Check local storage for saved column visibility preferences
        var columnVisibility = localStorage.getItem('columnVisibility');
        if (columnVisibility) {
            columnVisibility = JSON.parse(columnVisibility);
            // Apply stored column visibility preferences
            for (var i = 0; i < columnVisibility.length; i++) {
                table.column(i).visible(columnVisibility[i]);
            }
        }


        var table1 = $('#reminder_table1').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
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
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });

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
        });


        var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

        // Hide columns initially
        for (var i = 0; i < columnsToHide.length; i++) {
            table1.column(columnsToHide[i]).visible(false);
        }

        // Event listener for column visibility change
        table1.on('column-visibility.dt', function(e, settings, column, state) {
            // Update local storage with current visibility state
            var columnVisibility = table1.columns().visible().toArray();
            localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
        });

        // Check local storage for saved column visibility preferences
        var columnVisibility = localStorage.getItem('columnVisibility');
        if (columnVisibility) {
            columnVisibility = JSON.parse(columnVisibility);
            // Apply stored column visibility preferences
            for (var i = 0; i < columnVisibility.length; i++) {
                table1.column(i).visible(columnVisibility[i]);
            }
        }

        var table3 = $('#reminder_table2').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "fixedColumns": true,
            "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
            ],
            "stateSave": true,
            "order": [
                [groupColumn, 'desc']
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
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            // '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );
                        last = group;
                    }
                });

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
        });
    
        var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

        // Hide columns initially
        for (var i = 0; i < columnsToHide.length; i++) {
            table1.column(columnsToHide[i]).visible(false);
        }

        // Event listener for column visibility change
        table1.on('column-visibility.dt', function(e, settings, column, state) {
            // Update local storage with current visibility state
            var columnVisibility = table1.columns().visible().toArray();
            localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
        });

        // Check local storage for saved column visibility preferences
        var columnVisibility = localStorage.getItem('columnVisibility');
        if (columnVisibility) {
            columnVisibility = JSON.parse(columnVisibility);
            // Apply stored column visibility preferences
            for (var i = 0; i < columnVisibility.length; i++) {
                table1.column(i).visible(columnVisibility[i]);
            }
        }
    
    });

    $('#reminder_date').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_date');
    });

    $('#reminder_time').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_time');
    });

    $(document).ready(function() {
        
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'bottom',
            donetext: 'Done',
            minTime: '12:00'
        });
    });

    $(document).ready(function() {
        $('#ReminderForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                reminder_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Date'
                        }
                    }
                },
                reminder_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Time'
                        }
                    }
                },
                reminder_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Title'
                        }
                    }
                },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Before Time.'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Notify By.'
                        }
                    }
                },
                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Comment.'
                        }
                    }
                },
                recurring_set: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring.'
                        }
                    }
                }

            }
        });
    });

    $(document).ready(function(e) {
        $("#ReminderForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").show();
                $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                $.ajax({
                    url: "<?php echo base_url('admin/Reminder/add_reminder'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();

                        $(function() {
                            // new PNotify({
                            //     title: 'Reminder Form',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $("#modal_default2").modal('hide');
                            $("#successModalReminder").modal('show');
                        });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Reminder'); ?>";
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

    function edit_client(id) {
        var datastring = 'reminder_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Reminder/edit_reminder'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
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
        $(".popover-body").css('display','block');
        // $('#edit_button_close').attr('data-dismiss', 'modal');
        $('#modal_default1').modal('hide');

    }

    // function del_client(id) {

    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to delete this Reminder?</p>',
    //         hide: false,
    //         type: 'warning',
    //         confirm: {
    //             confirm: true,
    //             buttons: [{
    //                     text: 'Yes',
    //                     addClass: 'btn-sm'
    //                 },
    //                 {
    //                     text: 'No',
    //                     addClass: 'btn-sm'
    //                 }
    //             ]
    //         },
    //         buttons: {
    //             closer: false,
    //             sticker: false
    //         },
    //         history: {
    //             history: false
    //         }
    //     })

    //     // On confirm
    //     notice.get().on('pnotify.confirm', function() {

    //         var datastring = 'reminder_id=' + id;
    //         // alert(datastring);return false;
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Reminder/delete_reminder'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Delete Form',
    //                         text: 'Deleted successfully',
    //                         type: 'success'
    //                     });
    //                 });

    //                 setTimeout(function() {
    //                     window.location = "<?php echo base_url('admin/Reminder'); ?>";
    //                 }, 1000);


    //             },
    //             error: function() {
    //                 alert('Error while request..');
    //             }
    //         });
    //     })
    //     // On cancel
    //     notice.get().on('pnotify.cancel', function() {
    //         // alert('Oh ok. Chicken, I see.');
    //     });

    // }
</script>
<script>
    $('#reminder_notify_by_2').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#reminder_before_time_1').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#recurring_set_1').select2({
        dropdownParent: $('#modal_default2')
    });
    $('#interval_type_2').select2({
        dropdownParent: $('#modal_default2')
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

$(document).ready(function () {

// $(document).click(function (e) {
//     $(document).click(function (e) {
//             if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
//                 $('.panel-button').popover('hide');
//             }
//         });
// });
    $(document).click(function (e) {
        if ($(e.target).is('.close')) {
            $('.panel-button').popover('hide');
        }
    });
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
  $("#reminderdeleteForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Reminder/delete_reminder'); ?>",
          cache: false,
          data: { "reminder_id": datastring },
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
$("#send_bulk_mail_bday").on('submit', (function(e) {
    //e.preventDefault();
    if (e.isDefaultPrevented()) {
        //alert('invalid');
    } else {

        $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
        $("#loader_gif_contact").show();

        $.ajax({

            url: "<?php echo base_url('admin/Dashboard/bday_bulk_mail'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) 
            {
                // if(data == 1)
                // {
                    $("#successModalSendMail").modal('show');
                // }
                // else
                // {
                //     $("#alertModal").show();   
                // }
                // alert(data);
            },
            error: function() {
                $("#alertModal").show(); 
            }
        });
    }
    return false;
}));

$("#send_bulk_mail_marriage").on('submit',(function(e) {
    if (e.isDefaultPrevented()) 
    {
        //alert('invalid');
    } 
    else 
    {
        $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
        $("#loader_gif_contact").show();

        $.ajax({

            url: "<?php echo base_url('admin/Dashboard/marriage_bulk_mail'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) 
            {
                // if(data == 1)
                // {
                    $("#successModalSendMail").modal('show');
                // }
                // else
                // {
                //     $("#alertModal").show();   
                // }
                // alert(data);
            },
            error: function() {
                $("#alertModal").show(); 
            }
        });
    }
    return false;
}));

$("#send_bulk_mail_company").on('submit',(function(e) {
    if (e.isDefaultPrevented()) 
    {
        //alert('invalid');
    } 
    else 
    {
        $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
        $("#loader_gif_contact").show();

        $.ajax({

            url: "<?php echo base_url('admin/Dashboard/company_bulk_mail'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) 
            {
                // if(data == 1)
                // {
                    $("#successModalSendMail").modal('show');
                // }
                // else
                // {
                //     $("#alertModal").show();   
                // }
                // alert(data);
            },
            error: function() {
                $("#alertModal").show(); 
            }
        });
    }
    return false;
}));
</script>


<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalSendMail" tabindex="-1" aria-labelledby="successModalSendMailLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalSendMailLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Mail Send Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Dashboard/TodayEvent'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Reminder?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="reminderdeleteForm">
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
                <a href="<?php echo base_url('admin/Reminder'); ?>">
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
                <a href="<?php echo base_url('admin/Reminder'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
