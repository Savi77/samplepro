<?php $this->load->view('Admin/includes/n-header');    ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<!-- Main content -->
<?php
$ExportBtn = 0;

foreach ($user_permission as $priviledge) {
    $priviledge_key = $priviledge->priviledge_key;
    $status = $priviledge->status;
    if ($priviledge_key == 'EXPORT') {
        if ($status == 1) { ?>
            <style>
                .dt-buttons {
                    float: right;
                    display: inline-block;
                    margin: 0 0 20px 20px;
                }
            </style>
        <?php } else { ?>
            <style>
                .dt-buttons {
                    float: right;
                    display: none;
                    margin: 0 0 20px 20px;
                }
            </style>
<?php  }
    }
}
?>
<style>
     /* span.select2.select2-container.select2-container--default{
        width: 89% !important;
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
    table td{
        color: #000 !important;
    }
    /* table td:nth-child(1) a div:hover{
        color: #605959 !important;
    } */

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
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    #default_issue_table_wrapper {
        margin-top: 0;
    }
    #default_issue_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    /* #default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    } */
    #default_issue_table th{
        text-wrap:nowrap;
    }
    .multiselect {
        width:200px !important;
    }
</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <div class="col-lg-12"></div>
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <h6 class="card-title py-sm-4 card-headings">All Contacts</h6>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div class="card-body padding-30 mb-2"> -->
                <form method="post" class="form-horizontal displayFilter" id="get_data_form" style="display:none;padding:20px;">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-users4"></i></span>
                                </span> -->
                                <select class="form-control" name="customer_type" id="customer_type_11" data-placeholder="Select Type">
                                    <option value="">Select Type</option>
                                    <option value="All">All</option>
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Contact Type </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-hour-glass"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="TypeArray[]">
                                    <?php foreach ($TypeArray as  $row) { ?>
                                        <option value="<?= $row->type_id; ?>"><?= $row->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Group </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-make-group"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" id="customer_type" name="group[]">>
                                    <?php foreach ($get_groupdata->result() as  $row) { ?>
                                        <option value="<?= $row->group_id; ?>"><?= $row->group_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Segments </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-briefcase3"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="SegmentArray[]">
                                    <?php foreach ($SegmentArray as  $row) { ?>
                                        <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- <div class="col-lg-4">
                            <label>Segements </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-briefcase3"></i></span>
                                </span>
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="SegmentArray[]">
                                    <?php foreach ($SegmentArray as  $row) { ?>
                                        <option value="<?= $row->business_id; ?>"><?= $row->business_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-lg-3">
                            <label>Locations </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-location4"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="LocationArray[]">
                                    <?php foreach ($LocationArray as  $row) { ?>
                                        <option value="<?= $row->location_id; ?>"><?= $row->location; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>Account Manager </label>
                            <div class="input-group">
                                <!-- <span class="input-group-prepend">
                                    <span class="input-group-text calender"><i class="icon-user-tie"></i></span>
                                </span> -->
                                <select class="multiselect-select-all" multiple="multiple" style="display: none;" name="EmpArray[]">
                                    <?php foreach ($EmpArray as  $row2) { ?>
                                        <option value="<?= $row2->id; ?>"><?= $row2->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-4 text-right">
                            <span id="loader_gif_contact"></span>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                    <!-- <div class="row mt-2">
                        <div class="col-lg-2">
                            <span id="loader_gif_contact"></span>
                        </div>
                        <div class="col-sm-10 mt-4 text-right">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                    </div> -->
                </form>
            <!-- </div> -->
        </div>

        <div class="card col-md-12 p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="default_issue_table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Type</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Alternate Number</th>
                            <th>Landline Number</th>
                            <th>Email</th>
                            <th>Alternate Email</th>
                            <th>Country </th>
                            <th>State </th>
                            <th>City </th>
                            <th>Address</th>
                            <th>Google Address</th>
                            <th>Pincode</th>
                            <th>GST No.</th>
                            <th>Pan No.</th>
                            <th>Tan No.</th>
                            <th>Date of Birth</th>
                            <th>Company Anniversary</th>
                            <th>Marriage Anniversary</th>
                            <th>Type</th>
                            <th>Group</th>
                            <th>Location</th>
                            <th>Credit Term </th>
                            <th>Account Manager </th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 1;
                        foreach ($Allcontact as $row) {
                            if ($row->cust_type == 'primary') {
                                $cust_type = '<button style="background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;cursor:auto;" >Primary</button>';
                            } else {
                                $cust_type = '<button style="background: #009846;margin-right: 5px;padding: 2px 10px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;cursor:auto;" >Secondary</button>';
                            }

                            if ($row->dob == '') {
                                $dob = '';
                            } else {
                                $dob = date('d F Y', strtotime($row->dob));
                            }

                            if ($row->company_anniversary == '') {
                                $CompanyAnniversary = '';
                            } else {
                                $CompanyAnniversary = date('d F Y', strtotime($row->company_anniversary));
                            }

                            if ($row->marriage_anniversary == '') {
                                $MarriageAnniversary = '';
                            } else {
                                $MarriageAnniversary = date('d F Y', strtotime($row->marriage_anniversary));
                            }

                        ?>
                            <tr>
                                <td>
                                    <div>
                                    <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;cursor:auto;">
                                    <?= $cust_type; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <div class="text-wrap-col" style="width:200px;"><a href="#" style="font-weight:600;color:#000;cursor: auto;"><?= ucwords($row->company_name); ?></a></div>
                                            <div class="text-muted font-size-sm">
                                                Created On : <?= date("d M Y", strtotime($row->created_date)) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->contact_person_name1; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $row->phone_no; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $row->alternate_number; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $row->landline_number; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->email; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->alternate_email; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->c_name; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;">
                                        <?= $row->s_name; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->city; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;"><?= $row->address; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:200px;"><?= $row->address2; ?></div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $row->pincode; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $gstin; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $pan_no; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                    <?= $tan_no; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;"><?= $dob; ?></div>
                                </td>
                                <td>
                                    <div style="width:150px;"><?= $CompanyAnniversary; ?></div>
                                </td>
                                <td>
                                    <div style="width:150px;"><?= $MarriageAnniversary; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->title; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->group_name; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->location; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->credit_name; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->a_name; ?></div>
                                </td>
                                <td>
                                    <div class="text-wrap-col" style="width:150px;"><?= $row->notes; ?></div>
                                </td>
                            </tr>
                          
                        <?php $count++;  }   ?>
                    </tbody>
                </table>
            </div>
            <div id="rsdata" style="display: none;"></div>
        </div>
    </div>
    <!-- View Modal -->
    <div id="ViewDetailsModal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="ViewDetailsModalData">
            </div>
        </div>
    </div>
    <!--  -->

    <?php $this->load->view('Admin/includes/n-footer');    ?>

    <script>
        // $('#default_issue_table').DataTable();

        $(document).ready(function(){
            var rescheduleTable = $('#default_issue_table').DataTable( {       
                // scrollX:        true,
                scrollCollapse: true,
                // autoWidth:         true,  
                paging:         true, 
                // order: [[0, 'desc']],
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                        className: 'btn bg-indigo-400 btn-icon'
                    }
                ],

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

        $(document).ready(function(e) {
            $("#get_data_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $('#subBtnRp').prop('disabled', true);
                    $("#loader_gif_contact").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif_contact").show();

                    var datanew = $('#get_data_form').serialize();

                    $.ajax({

                        url: "<?php echo base_url('admin/ReportAdmin/Reports/DateRangeAllContact'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#subBtnRp').removeAttr('disabled');
                            $("#loader_gif_contact").hide();
                            $('#default_issue_table').dataTable().fnClearTable();
                            $('#default_issue_table').dataTable().fnDestroy();
                            $("#default_issue_table").hide();
                            $("#rsdata").css('display','block');
                            $("#rsdata").html(data);
                            $('#all_activity_filter_table').DataTable({
                                // buttons: {
                                //     dom: {
                                //         button: {
                                //             className: 'btn btn-default'
                                //         }
                                //     },
                                //     buttons: [
                                //         // 'copyHtml5',
                                //         'excelHtml5',
                                //         // 'csvHtml5',
                                //         // 'pdfHtml5'
                                //     ]
                                // }
                                        buttons: [
                                    {
                                        extend: 'colvis',
                                        text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                                        className: 'btn bg-indigo-400 btn-icon'
                                    }
                                ],
                            });

                            


                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;
            }));
        });
        a
    </script>
     <script type="text/javascript">
          $('#customer_type_11').select2();
        
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
    function showFilter() {
        var filter = document.querySelector(".displayFilter");
        // filter.style.display = "block";
        if (filter.style.display === "none") {
            filter.style.display = "block";
        } else {
            filter.style.display = "none";
        }

    }
</script>