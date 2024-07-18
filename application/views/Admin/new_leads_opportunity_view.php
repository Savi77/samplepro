<style>
    .dt-button{
            color: #fff !important;
            background-color: #1e6196 !important;
            border-color: #1e6196 !important;
            width: 50px ;
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
    table td{
        color: #000 !important;
    }
    table td:nth-child(2) a div:hover{
        color: #605959 !important;
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
    .datatable-header {
        padding-top: 1.25rem !important;
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
    #myTableleadopp th:first-child{
        width: 100px;
    }

    #myTableleadopp_wrapper button.dt-button.buttons-columnVisibility:nth-child(2){
        display: none;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    #myTableleadopp tr{
        text-wrap: nowrap;
    }
</style>
<?php $this->load->view('Admin/includes/n-header'); ?>

<?php
    $AddClassP = 'style="display:block";';
    $ImportClass = 'style="display:block";';
    $ExportClass = 'style="display:block";';
    foreach ($user_permission_lead as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;
        if ($priviledge_key == 'ADD') {
            if ($status == 1) {
                $AddClassP = ' style="display:block"; ';
            } else {
                $AddClassP = ' style="display:none"; ';
            }
        }
    }
?>

<div class="content-wrapper">
    <div class="content">
        <div class="row crm-row d-none">
            <div class="col-lg-12 center-align crm-col">
                <div class="col-lg-3 col-sm-4 small-col">
                    <button type="button" class="notes" data-toggle="modal" data-target="#">
                        <figure class="sub-header-icon">
                            <a href="<?= base_url() ?>admin/Leads/add_leads_opportunity"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/add.png">
                                <figcaption> Add </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
                <div class="col-lg-3 col-sm-4 small-col">
                    <button type="button" class="notes" data-toggle="modal" data-target="#">
                        <figure class="sub-header-icon">
                            <a style="<?= $ImportClass; ?>" onclick="ImportContact()"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/import.png">
                                <figcaption> Import Lead </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <button type="button" class="notes" data-toggle="modal" data-target="#">
                        <figure class="sub-header-icon">
                            <a style="<?= $ExportClass; ?>" href="<?= base_url('admin/Leads/ExportLeadOpp'); ?>"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/export.png">
                                <figcaption> Export Leads / Opp </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">New Lead-Client Engagement</span>
                <div class="small-div contact text-right" <?= $AddClassP ?> >
                    <!-- <span class="span-py-10 white-text"> <a href='<?= base_url() ?>admin/Leads/add_leads_opportunity'><img class="white-icon small contact-icon" src="<?= base_url() ?>new-assets/assets/Images/whitenotes.png"></a>Add</span> -->
                    <span class="span-py-10 white-text"> <a style="color:#fff;" href='<?= base_url() ?>admin/Leads/add_leads_opportunity'> <i class="icon-file-plus text-primary" style="margin-right:10px;"></i>Add</a></span>
                </div>
            </div>
            <!-- <table class="table datatable-colvis-state"> -->
            <table class="table table-striped" id="myTableleadopp">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class='d-none'></th>
                        <th>ID No.</th>
                        <th>Owner</th>
                        <th>Type</th>
                        <th>Tag</th>
                        <th>Company Name</th>
                        <th>Contact Person</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Interested In</th>
                        <th>Source</th>
                        <th>Stage</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($leads_opportunity as $row) {
                        // echo "<pre>";
                        // print_r($row);

                    ?>
                        <tr>
                            <td>
                                <div>
                                    <?php if ($row['welcome_email_status'] == 1) 
                                    { 
                                    ?>
                                        <a>
                                            <img src="<?= base_url() ?>assets/images/open_welcome.png" alt="welcome" data-popup="tooltip" title="Welcome Email Sent" data-placement="bottom" data-original-title="" width="25px" height="25px">
                                        </a>
                                    <?php 
                                    } 
                                    else 
                                    { 
                                    ?>
                                        <a onclick="sent_welcome_email('<?= $row['leadopp_id']; ?>')">
                                            <img src="<?= base_url() ?>assets/images/welcome.png" alt="welcome" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Send Welcome Email" width="25px" height="25px">
                                        </a>
                                        <span id="sentWelComeEmail<?= $row['leadopp_id']; ?>"></span>
                                    <?php 
                                    } 
                                    ?>
                                </div>
                            </td>
                            <td class='d-none'><?= $row['leadopp_id']; ?></td>
                            
                            <td>
                                <a rel="tooltip" title="View Details" href="<?= base_url('admin/Leads/ViewDetails') ?>?leadopp_id=<?= $row['leadopp_id'] ?>">
                                    <div style="width: 150px;color:#000;font-weight:600;"><?= $row['lead_generate_id'] ?></div>
                                </a>
                            </td>

                            <td>
                                <div style="width: 200px;" class="text-wrap-col"><?= $row['emp_name'] ?></div>
                            </td>

                            <td>
                                <div style="width: 150px;">
                                    <?php
                                    if($row['customer_type'] == 'Opportunity')
                                    {
                                        $type_name = 'Client Engagement';
                                    }
                                    else if($row['customer_type'] == 'Lead')
                                    {
                                        $type_name = 'New Lead';
                                    }
                                    ?>
                                    <?= $type_name ?>
                                </div>
                            </td>

                            <td>
                                <div style="width: 150px;">
                                    <?= $row['tag'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width: 250px;" class="text-wrap-col"><?= $row['company_name'] ?></div>
                            </td>

                            <td>
                                <div style="width: 250px;" class="text-wrap-col"><?= $row['contact_person_name1'] ?></div>
                            </td>

                            <td>
                                <div style="width: 150px;">
                                    <?= $row['phone_no'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width: 250px;" class="text-wrap-col">
                                    <?= $row['email'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="width: 250px;" class="text-wrap-col"><?= $row['prdsrv_name'] ?></div>
                            </td>
                            <td>
                                <div style="width: 200px;" class="text-wrap-col"><?= $row['source_title'] ?></div>
                            </td>
                            <td>
                                <div style="width: 200px;" class="text-wrap-col"><?= $row['stage_title'] ?></div>
                            </td>
                            <td>
                                <div style="width: 200px;" class="text-wrap-col"><?= $row['remarks'] ?></div>
                            </td>

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
                                                            <a href="<?= base_url('admin/Leads/ViewDetails') ?>?leadopp_id=<?= $row['leadopp_id'] ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-blue"></span> View Lead-Oppurtunity 
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
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var rescheduleTable = $('#myTableleadopp').DataTable( {       
        // scrollX:        true,
        scrollCollapse: true,
        // autoWidth:         true,  
        paging:         true,
        order: [[1, 'desc']],
        // columnDefs: [
        // { "width": "150px", "targets": [3] },
        // { "width": "100px", "targets": [0,1,2,4,6] },  
        // { "width": "50px", "targets": [5,7] },
        // ],
        // fixedColumns: true,
        // "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        buttons: [
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

    // $('#myTable').dataTable();

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

<div id="ImportContact_modal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="icon-file-excel" style="zoom:1.1; "></i>
                    &nbsp;Import Leads </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding: 10px;">
                <form id="upload_doc_form" method="post" enctype="multipart/form-data">
                    <div class="panel panel-flat">
                        <div class="panel-body" style="padding: 5px;">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 col-md-offset-3">
                                        <div class="input-group">
                                            <input type="file" class="form-control mr-2" name="excel">
                                            <button class="red-btn text-right m-auto">
                                                <span class="label label-danger text-right"><a class="text-white" href="<?= base_url() ?>assets/ExcelSheet/lead.xlsx"><i class=" icon-download"></i>&nbsp;Download Sample File</a></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div align="right">
                                <button type="submit" class="btn btn-primary">Import Leads<i class="icon-arrow-right14 position-right"></i></button>
                                <span id="preview_upload"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>
<script>
    function ImportContact() {
        $("#ImportContact_modal").modal({
            backdrop: "static"
        });
    }
</script>
<script type="text/javascript">
    function sent_welcome_email(main_id) {
        var datastring = 'Main_lead_id=' + main_id;

        $('#sentWelComeEmail' + main_id).show();
        $('#sentWelComeEmail' + main_id).html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leads/WelComeEmailSent'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                if (data == 0) {
                    // new PNotify({
                    //     title: 'Email',
                    //     text: 'Please Add Email Configuration Setting!',
                    //     type: 'error'
                    // });
                    // setTimeout(function() {
                    //     window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                    // }, 1000);
                    $('#WelcomeMailErrorModal').modal('show');
                } else {
                    // $('#sentWelComeEmail' + main_id).hide();
                    // new PNotify({
                    //     title: 'Welcome Email',
                    //     text: 'Welcome Email Sent Successfully',
                    //     type: 'success'
                    // });

                    // setTimeout(function() {
                    //     window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                    // }, 1000);
                    $('#successWelcomeMail').modal('show');
                }
            },
            error: function() {
                // alert('Error while request..');
                $('#ErrorModal').modal('show');
            }
        });
    }
    $("#remarkslead").keyup(function() {
        el = $(this);
        if (el.val().length >= 500) {
            el.val(el.val().substr(0, 500));
            $("#charNum").text(0);
        } else {
            $("#charNum").text(500 - el.val().length);
        }
    });
</script>

<script type="text/javascript">
    $("#remarksopp").keyup(function() {
        el = $(this);
        if (el.val().length >= 500) {
            el.val(el.val().substr(0, 500));
            $("#charNum2").text(0);
        } else {
            $("#charNum2").text(500 - el.val().length);
        }
    });
</script>

<script type="text/javascript">
    function Transfer_Lead(lead_id) {
        $("#db_lead_id").val(lead_id);
        $("#Transfer_Lead").modal('show');
    }

    function AddAttachment(lead_id) {
        $("#attachment_lead_id").val(lead_id);
        $("#AddAttachmentmodal").modal('show');
    }

    $(document).ready(function() {
        $('#TransferLeadForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Employee Name'
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function() {
        $('#LeadForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                org_name_lead: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Company Name'
                        }
                    }
                },
                contact_number1: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Contact Number'
                        }
                    }
                },
                source: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Source'
                        }
                    }
                },
                product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Interest'
                        }
                    }
                },
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Account Manager '
                        }
                    }
                },
                branch_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Branch Name '
                        }
                    }
                },
                stage: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Stage'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#LeadForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $("#preview1").show();
                $("#preview1").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $.ajax({
                    url: "<?php echo base_url('admin/Leads/InsertLead'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#preview1").hide();
                        new PNotify({
                            title: 'Add Leads',
                            text: 'Leads Added  Successfully',
                            type: 'success'
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                        }, 1000);

                    },
                    error: function() {
                        $(function() {
                            new PNotify({
                                title: 'Leads / Opportunity Add',
                                text: 'Failed to load page',
                                type: 'warning'
                            });
                        });
                    }
                });
            }
            return false;

        }));
    });
</script>


<script type="text/javascript">
    $(document).ready(function(e) {
        $("#TransferLeadForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                // alert('invalid');
            } else {

                $("#preview31").show();
                $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $.ajax({
                    url: "<?php echo base_url('admin/Leads/Transfer_Lead'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#preview31").hide();
                        new PNotify({
                            title: 'Transfer Leads',
                            text: 'Leads Transfered  Successfully',
                            type: 'success'
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                        }, 1000);
                        return false;

                    },
                    error: function() {
                        $(function() {
                            new PNotify({
                                title: 'Leads Transfer',
                                text: 'Failed to load page',
                                type: 'warning'
                            });
                        });
                    }
                });
            }
            return false;

        }));
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#OpportunityForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                var company_id = $("#company_id").val();
                var source_opp = $("#source_opp").val();
                var stage_opp = $("#stage_opp").val();
                var opp_product_id = $("#opp_product_id").val();
                var opp_emp_id = $("#opp_emp_id").val();

                if (company_id == '') {
                    $("#company_id_error").show();
                } else if (source_opp == '') {
                    $("#source_error").show();
                } else if (stage_opp == '') {
                    $("#stage_error").show();
                } else if (opp_product_id == '') {
                    $("#opp_product_id_error").show();
                } else if (opp_emp_id == '') {
                    $("#opp_emp_id_error").show();
                } else {
                    $("#preview2").show();
                    $("#preview2").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/InsertOpportunity'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview2").hide();
                            new PNotify({
                                title: 'Add Opportunity',
                                text: 'Opportunity Added  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
                            }, 1000);
                        },
                        error: function() {
                            $(function() {
                                new PNotify({
                                    title: 'Leads / Opportunity Add',
                                    text: 'Failed to load page',
                                    type: 'warning'
                                });
                            });
                        }
                    });
                }
            }
            return false;
        }));
    });
</script>

<script type="text/javascript">
    function get_cust_detail(value) {
        // alert(value);
        var datastring = 'customerid=' + value;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leads/get_cust_detail'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                var obj = JSON.parse(data);
                $('#opp_company_name').val(obj[0].company_name);
                $('#contact_person2').val(obj[0].contact_person_name1);
                $('#address2').val(obj[0].address);
                $('#contact_number2').val(obj[0].phone_no);
                $('#email_id2').val(obj[0].email);
                $('#location_opp').val(obj[0].location);
                $('#city1').val(obj[0].city);
                // alert(obj[0].business_name);
                $('#business_opp').val(obj[0].business_name);
                $('#group_opp').val(obj[0].group_name);
                $('#location_id').val(obj[0].location_id);
                $('#business_id').val(obj[0].business_id);
                $('#group_id').val(obj[0].group_id);
                $('#company_id_error').hide();
            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
</script>

<script type="text/javascript">
    /*   $("#closure_date").on("dp.change", function (e) 
        {
            $('#LeadForm').bootstrapValidator('revalidateField', 'closure_date'); 
        });

        $("#closure_date1").on("dp.change", function (e) 
        {
            $('#OpportunityForm').bootstrapValidator('revalidateField', 'closure_date'); 
        });
        */
</script>

<script type="text/javascript">
    $(function() {
        $('#closure_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true
        });
        $('#closure_date1').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true
        });
    });
</script>

<script type="text/javascript">
    function open_google_map2() {
        $("#googlemapmodal2").modal('show');
        initialize2();
    }

    function initialize2() {
        // alert();
        var markers = [];
        var map = new google.maps.Map(document.getElementById('googleMap2'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        });
        var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(18.5204, 73.8567),
            new google.maps.LatLng(18.6204, 73.9567));
        map.fitBounds(defaultBounds);
        // Create the search box and link it to the UI element.
        var input = /** @type {HTMLInputElement} */ (
            document.getElementById('pac-input2'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var searchBox = new google.maps.places.SearchBox((input));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            map.setZoom(15);
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            for (var i = 0, marker; marker = markers[i]; i++) {
                marker.setMap(null);
            }
            // For each place, get the icon, place name, and location.
            markers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                var marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    title: place.name,
                    position: place.geometry.location
                });
                markers.push(marker);
                bounds.extend(place.geometry.location);
                google.maps.event.addListener(marker, 'click', function(event) {
                    get_city2(event.latLng.lat(), event.latLng.lng());
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    var latlng = new google.maps.LatLng(lat, lng);
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'latLng': latlng
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[1]) {
                                location_name = results[1].formatted_address;
                                document.getElementById("address3").value = location_name;
                                $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                $("#googlemapmodal2").modal('hide');
                            }
                        }
                    });
                });
            }
            map.fitBounds(bounds);
        });
        // [END region_getplaces]
        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
            var bounds = map.getBounds();
            searchBox.setBounds(bounds);
        });
    }



    function get_city2(lat, long) {
        var geocoder;
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat, long);
        geocoder.geocode({
                'latLng': latlng
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var add = results[0].formatted_address;
                        var value = add.split(",");
                        // alert(add);
                        count = value.length;
                        country = value[count - 1];
                        state = value[count - 2];
                        city = value[count - 3];
                        if (value[count - 3] = null) {
                            city = '';
                        }
                        // alert(city);
                        document.getElementById('city2').value = city;
                        $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                    } else {
                        alert("address not found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            }
        );
    }
</script>


<script>
    function convert_to_contact(id) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to convert to contact this Leads ?</p>',
            hide: false,
            type: 'success',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Convert',
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

            var datastring = 'leadopp_id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#modal_default').modal('show');
                    $('#complaint_model_data').html(data);
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
    function del_leads(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Leads opportunity?</p>',
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
            var datastring = 'leadopp_id=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/del_leads'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    new PNotify({
                        title: 'Delete Lead | Opportunity',
                        text: 'Deleted Successfully',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
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
    function edit_customer(id) {
        var datastring = 'customerid=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Customer/edit_customer'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#modal_default').modal('show');
                $('#complaint_model_data').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });
    }
</script>

<script type="text/javascript">
    jQuery('#business_lead').multiselect({
        enableFiltering: true,
        maxHeight: 170,
        enableCaseInsensitiveFiltering: true,
        nonSelectedText: 'Select business segment',
        numberDisplayed: 10,
        selectAll: false,
        onChange: function(option, checked) {
            var selectedOptions = jQuery('#business_lead option:selected');
            if (selectedOptions.length >= 10) {
                // Disable all other checkboxes.
                var nonSelectedOptions = jQuery('#business_lead option').filter(function() {
                    return !jQuery(this).is(':selected');
                });
                nonSelectedOptions.each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', true);
                    input.parent('li').addClass('disabled');
                });
                new PNotify({
                    title: 'Message',
                    text: 'Please Select only 10 business segment',
                    type: 'warning'
                });
            } else {
                // Enable all checkboxes.
                jQuery('#business option').each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
            }
        }
    });
    var shiftClick = jQuery.Event("click");
    shiftClick.shiftKey = true;

    $(".multiselect-container li *").click(function(event) {
        if (event.shiftKey) {
            //alert("Shift key is pressed");
            event.preventDefault();
            return false;
        } else {
            //alert('No shift hey');
        }
    });
</script>
<script>
    $(document).ready(function() {
        Documentvalidator = {
                // row: '.col-md-9',
                validators: {
                    notEmpty: {
                        message: 'Excel File is required'
                    },
                    file: {
                        extension: 'xlx,xlsx',
                        type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        // maxSize: 5*1024*1024,   // 5 MB
                        message: 'The selected file is not valid, it should be (xlsx, xlx)'
                    },

                }
            },
            $('#upload_doc_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'excel': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) {
        $("#upload_doc_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Leads/ImportLeadOpp') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        // $("#preview_upload").html(data);
                        $(function() {
                            new PNotify({
                                title: 'Import Contact',
                                text: 'Imported  Successfully !!',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Leads'); ?>";
                        }, 3000);

                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;
        }));
    });
</script>
<script>

        $(document).ready(function () {
       
        $(document).click(function (e) {
            if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>

<div class="modal fade" id="successWelcomeMail" tabindex="-1" aria-labelledby="successWelcomeMailLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successWelcomeMailLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Welcome Email Sent Successfully </div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                <!-- <a onclick="javascript:window.location.reload()"> -->
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="WelcomeMailErrorModal" tabindex="-1" aria-labelledby="WelcomeMailErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="WelcomeMailErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Please Add Email Configuration Setting!</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ErrorModal" tabindex="-1" aria-labelledby="ErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="ErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>