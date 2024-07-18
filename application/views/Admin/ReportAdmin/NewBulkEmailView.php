<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    #rsdata{
        overflow-x: scroll !important;
    }
    /* span.select2.select2-container.select2-container--default{
        width: 89.7% !important;
    }
    @media only screen and (max-width: 1680px){
        span.select2.select2-container.select2-container--default{
            width: 88% !important;
        }
    }
    @media only screen and (max-width: 1600px){
        span.select2.select2-container.select2-container--default{
            width: 87.5% !important;
        }
    }
    @media only screen and (max-width: 1536px){
        span.select2.select2-container.select2-container--default{
            width: 86.5% !important;
        }
    }
    @media only screen and (max-width: 1440px){
        span.select2.select2-container.select2-container--default{
            width: 84% !important;
        }
    }
    @media only screen and (max-width: 1280px){
        span.select2.select2-container.select2-container--default{
            width: 82% !important;
        }
    } */
    .pl-25{
        padding-left: 30px;
    }


</style>
<div class="content-wrapper">
    <div class="content">

        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card card-height">
                <h6 class="card-title py-sm-4 card-headings">Bulk Email</h6>
            </div>

            <div class="card-body">
                <div class="panel-body width-100">
                    <div class="col-md-12 dflex responsive">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-6" for="email">Module</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="contact" checked="" onclick="ModuleType(this.value)"></span><span class="padding-left">Contact</span></lable>
                                    </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <div class="choice"><span class="checked"><input type="radio" name="custtype" class="styled" value="crm" checked="" onclick="ModuleType(this.value)"></span><span class="padding-left">CRM</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contact_display" style="display:none">
                <div class="col-xl-12">
                    <form method="post" class="form-horizontal" id="get_data_form_contact">
                        <input type="hidden" name="typeModule" id="typeModule" value="contact">
                        <fieldset class="form-filedset email">
                            <legend class="field bulk-email">Filter Criteria</legend>

                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-lg-2 col-md-1">Contact Type</label>
                                <div class="col-lg-4 col-md-5">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                        </span> -->
                                        <select class="form-control" name="cust_type" id="cust_type_cnt" data-placeholder="Select Customer Type">
                                            <option value="">Select Customer Type</option>
                                            <option value="All">All</option>
                                            <option value="primary">Primary</option>
                                            <option value="secondary">Secondary</option>
                                        </select>
                                    </div>
                                </div>

                                <label class="col-form-label col-lg-2 col-md-1 pl-25">Type of Contact </label>
                                <div class="col-lg-4 col-md-5">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-hour-glass"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" name="TypeArray[]" style="display: none;">
                                            <?php foreach ($TypeArray as  $row) { ?>
                                                <option value="<?= $row->type_id; ?>"><?= $row->title; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-lg-2 col-md-1"> Group </label>
                                <div class="col-lg-4 col-md-5">

                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-make-group"></i></span>
                                        </span> -->

                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;">
                                            <?php foreach ($get_groupdata->result() as  $row) { ?>
                                                <option value="<?= $row->group_id; ?>"><?= $row->group_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2 col-md-1 pl-25">Segments </label>
                                <div class="col-lg-4 col-md-5">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" name="SegmentArray[]" style="display: none;">
                                            <?php foreach ($SegmentArray as  $row) { ?>
                                                <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label  col-lg-2 col-md-1">Locations </label>
                                <div class="col-lg-4 col-md-5">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-hour-glass"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" name="LocationArray[]" style="display: none;">
                                            <?php foreach ($LocationArray as  $row) { ?>
                                                <option value="<?= $row->location_id; ?>"><?= $row->location; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2 col-md-1 pl-25"> Account Manager </label>
                                <div class=" col-lg-4 col-md-5">

                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-make-group"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="EmpArray[]">
                                            <?php foreach ($EmpArray as  $row2) { ?>
                                                <option value="<?= $row2->id; ?>"><?= $row2->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-12 float-right-btn">
                                <div class="text-right">
                                    <span id="loader_gif_contact"></span>
                                    <button type="submit" class="btn btn-primary margin-right" style="margin-right:0;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>

                        </fieldset>
                        
                    </form>
                </div>
            </div>

            <!--crm tab-->
            <div id="crm_display">
                <div class="col-xl-12">

                <form method="post" class="form-horizontal" id="get_data_form_crm">
                        <input type="hidden" name="typeModule" id="typeModule" value="crm">
                        <fieldset class="form-filedset email">
                            <legend class="field bulk-email">Filter Criteria</legend>

                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-md-2">Start Date </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" placeholder="Please Select Start Date" autocomplete="off" value="<?= date('01 F, Y'); ?>">
                                    </div>
                                </div>

                                <label class="col-form-label col-md-2 pl-25">End Date </label>
                                <div class="col-md-4">            
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date" id="end_date" placeholder="Please Select End Date" autocomplete="off" value="<?= date('d F, Y'); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 dflex tab-view">

                                <label class="col-form-label col-md-2">Type </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-paste3"></i></span>
                                        </span> -->
                                        <select class="form-control" name="lead_type" id="lead_type" data-placeholder="Select Type">
                                            <option value="" >Select Type</option>
                                            <option value="All">All</option>
                                            <option value="Lead">Lead</option>
                                            <option value="Opportunity">Opportunity</option>
                                        </select>

                                    </div>
                                </div>
                                <label class="col-form-label col-md-2 pl-25">Source</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-shrink3"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="sourceArray[]">
                                            <?php foreach ($SourceArray as  $row) { ?>
                                                <option value="<?= $row->source_id; ?>"><?= $row->source_title; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-md-2"> Segments</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class=" icon-cube3"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="SegmentArray[]">
                                            <?php foreach ($SegmentArray as  $row) { ?>
                                                <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-form-label col-md-2 pl-25"> Stage </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-hour-glass"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="StageArray[]">
                                            <?php foreach ($StageArray as  $row) { ?>
                                                <option value="<?= $row->stage_id; ?>"><?= $row->stage_title; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-md-2">Product</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-shutter"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;">
                                            <?php foreach ($ProductArray as  $row) { ?>
                                                <option value="<?= $row->prd_srv_id; ?>"><?= $row->prdsrv_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-form-label col-md-2 pl-25">Account Manager</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-user-tie"></i></span>
                                        </span> -->
                                        <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="EmpArray[]" >
                                            <?php foreach ($EmpArray as  $row2) { ?>
                                                <option value="<?= $row2->id; ?>"><?= $row2->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 dflex tab-view">
                                <label class="col-form-label col-md-2">Tag</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!-- <span class="input-group-prepend">
                                            <span class="input-group-text calender"><i class="icon-paste3"></i></span>
                                        </span> -->
                                        <select class="form-control" name="tag_type" id="tag_type" data-placeholder="Select Tag">
                                            <option value="" >Tag</option>
                                            <option value="Business">Business</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-xl-12 float-right-btn">
                                <div class="text-right">
                                    <span id="loader_gif_crm" ></span>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>

            <fieldset class="form-filedset email p-0" id="result_display" style="display: none;">
                <legend class="field bulk-email">Show Result</legend>
                <div class="col-md-12 p-0" id="rsdata"></div>
            </fieldset>
        </div>

    </div>

</div>
</div>




<script type="text/javascript">
    function ModuleType(val) {
        if (val == 'contact') {
            $('#contact_display').show();
            $('#crm_display').hide();
            // $("#rsdata").hide();
        } else if (val == 'crm') {
            $('#crm_display').show();
            $('#contact_display').hide();
            // $("#rsdata").hide();
        }

    }
</script>
<script type="text/javascript">
    function ModuleType(val) {
        if (val == 'crm') {
            $('#crm_display').show();
            $('#contact_display').hide();
            // $("#rsdata").hide();
        } else if (val == 'contact') {
            $('#crm_display').hide();
            $('#contact_display').show();
            // $("#rsdata").hide();
        } else {
            window.location.href = "<?= base_url(); ?>admin/ReportAdmin/Reports/mail_write";
        }
    }

    function ViewDetails(customer_id) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
        // alert(datastring);
        $.ajax({
            url: "<?php echo base_url('admin/ReportAdmin/Reports/ContactsActivitiesDetails'); ?>",
            type: "POST",
            data: datastring,
            success: function(data) {
                // alert(data);
                $("#ViewDetailsModalData").html(data);
                $("#ViewDetailsModal").modal();
                // $('#ajax_table').DataTable();  

                $('#ajax_table').DataTable({
                    buttons: {
                        dom: {
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    }
                });

            },
            error: function() {
                alert('fail');
            }
        });
    }


    function ViewTotalActivityDetails(customer_id) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var datastring = 'customer_id=' + customer_id + '&start_date=' + start_date + '&end_date=' + end_date;
        // alert(datastring);
        $.ajax({
            url: "<?php echo base_url('admin/ReportAdmin/Reports/ViewTotalActivityDetails'); ?>",
            type: "POST",
            data: datastring,
            success: function(data) {
                // alert(data);
                $("#ViewTotalActivityDetailsModalData").html(data);
                $("#ViewTotalActivityDetailsModal").modal();
                // $('#ajax_table').DataTable();  

                $('#ajax_table2').DataTable({
                    buttons: {
                        dom: {
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    }
                });

            },
            error: function() {
                alert('fail');
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#get_data_form_crm").on('submit', (function(e) {

            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $("#loader_gif_crm").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#loader_gif_crm").show();

                $.ajax({

                    url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeBulkEmail'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#loader_gif_crm").hide();
                        $('#result_display').show();
                        $("#rsdata").html(data);
                        // $("#rsdata").DataTable()
                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;
        }));
        $("#get_data_form_contact").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#loader_gif_contact").show();

                $.ajax({

                    url: "<?php echo base_url('admin/ReportAdmin/Reports/DaterangeBulkEmail'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#loader_gif_contact").hide();
                        $('#result_display').show();
                        $("#rsdata").html(data);
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

<script type="text/javascript">
    $(function() {
        $(".start_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "d M yy"
        });
        $(".end_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "d M yy"
        });
    });
</script>


<script type="text/javascript">
    $(function() {

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '&rarr;',
                    'previous': '&larr;'
                }
            }
        });

        // Basic initialization
        $('#default_issue_table').DataTable({
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-default'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }
        });

        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

    });

    
</script>


<!-- <script src="/new-assets/global_assets/js/main/jquery.min.js"></script> -->
<!-- <script src="http://buroforce.loc/new-assets/global_assets/js/plugins/forms/selects/select2.min.js"></script> -->

<?php $this->load->view('Admin/includes/n-footer'); ?>


<script>
    $('#lead_type').select2();
    $('#tag_type').select2();
    $('#cust_type_cnt').select2();
</script>


<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>