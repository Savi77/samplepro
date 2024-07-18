<?php $this->load->view('Admin/includes/n-header');    ?>

<style>
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
     
     #MyNotifyByTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyNotifyByTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyNotifyByTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    .datatable-header {
        padding-top: 1.25rem !important;
    }
    #MyNotifyByTable th:first-child{
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
                <span class="span-py-10 white-text">Frequency Wise Report</span>
                <a <?= $AddClassP ?> data-toggle="modal" data-target="#addFreqwiseReport" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>

            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyNotifyByTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Report Name</th>
                        <th>Frequency Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Scheduled Time</th>
                        <th <?= $StatusClass; ?>>Status</th>
                        <th >Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count = 1;

                    foreach ($get_freq_wise_report as $row) 
                    {
                        if ($count % 2 == 0) 
                        {
                            $bg_color_class = 'class="bg"';
                        } 
                        else 
                        {
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
                            <div class="text-wrap-col" style="width:200px;">
                                <?= $row->report_type ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:200px;">
                                <?= $row->frequency_name ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:200px;">
                                <?= date("d F, Y", strtotime($row->start_date)) ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:200px;">
                                <?= date("d F, Y", strtotime($row->end_date)) ?>
                            </div>
                        </td>
                        <td>
                            <div class="text-wrap-col" style="width:200px;">
                                <?= date("h:i a", strtotime($row->schedule_time))?>
                            </div>
                        </td>
                        <td <?= $StatusClass; ?>><?php if ($row->status == 0) { ?>
                            <div style="width:150px;">
                                <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->report_type_id ?>" onclick="deactivate(this)" data-id="<?= $row->report_type_id ?>"> Active </button>
                                <?php } else { ?>
                                    <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->report_type_id ?>" onclick="activate(this)" data-id="<?= $row->report_type_id ?>"> Inactive </button>
                                <?php } ?>
                            </div>
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
                                                        <a data-toggle="modal" onclick="edit_freq_wise_report(id)" id="<?= $row->report_type_id; ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-green"></span> Edit Frequency Wise Report 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->report_type_id ?>" id="<?= $row->report_type_id; ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-red"></span> Delete Frequency Wise Report 
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
                    <?php
                    $count++;
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

<div id="addFreqwiseReport" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                Add Frequency Wise Report</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form class="form-horizontal" id="insertFreqwiseReport">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3 p-0" for="email">Frequency Type  <span style="color: red;">*</span></label>
                        <div class="col-sm-12 p-0">
                            <select name="freq" id="freq" data-placeholder="Select Frequency Type">
                                <option value="">Select Frequency Type</option>
                                <?php
                                    foreach ($freq_type as $value) 
                                    { ?>
                                        <option value="<?= $value->id ?>"><?= $value->frequency_name ?></option>
                                <?php  
                                    } 
                                ?>
                            </select>
                            <small id="error_freq_type" style="color: #f00 !important;"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 p-0" for="email">Report Type  <span style="color: red;">*</span></label>
                        <div class="col-sm-12 p-0">
                            <select name="report" id="report" data-placeholder="Select Report Type">
                                <option value="">Select Report Type</option>
                                <option value="Product Lead">Product Lead</option>
                                <option value="Monthly Lead">Monthly Lead</option>
                                <option value="User Lead">User Lead</option>
                                <option value="Sales Force Score">Sales Force Score</option>
                                <option value="Sales Segment">Sales Segment</option>
                                <option value="Sales Product">Sales Product</option>
                                <option value="Time Slot">Time Slot</option>
                                <option value="Resource Task">Resource Task</option>
                                <option value="Task Mapping">Task Mapping</option>
                                <option value="Target Overview">Target Overview</option>
                                <option value="Task Today">Task Today</option>
                            </select>
                            <small id="error_report_type" style="color: #f00 !important;"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 p-0" for="email">Starting Date  <span style="color: red;">*</span></label>
                        <div class="col-sm-12 p-0">
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date_report" id="start_date_report" placeholder="Please Select Starting Date" autocomplete="off">
                            <small id="error_start_date_report" style="color: #f00 !important;"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 p-0" for="email">Ending Date <span style="color: red;">*</span></label>
                        <div class="col-sm-12 p-0">
                            <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date_report" id="end_date_report" placeholder="Please Select Ending Date" autocomplete="off" onchange="checkvalidationdate()">
                            <small id="error_end_date_report" style="display:none; color: #f00 !important;">Ending date can not be less than starting date</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 p-0" for="email">Schedule Time  <span style="color: red;">*</span></label>
                        <div class="col-sm-12 p-0 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control" id="schedule_time" name="schedule_time" placeholder="Select Schedule Time"  autocomplete="off" readonly>
                            <span id="error_schedule_time" style="color:red; font-size: 12px;"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-right: 20px;">
                    <button type="submit" class="btn btn-primary" id="freqwise_report_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#freq').select2({
        tags: true,
		dropdownParent: $("#addFreqwiseReport")
    });
    $('#report').select2({
            tags: true,
            dropdownParent: $("#addFreqwiseReport")
    });
</script>

<div id="MyeditForm" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Frequency Wise Report</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>

<script>
        $('#start_date_report').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'start_date_report');
        });
        $('#end_date_report').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'end_date_report');
        });

        $(document).ready(function() {
                $('.clockpicker').clockpicker().find('input').change(function() {
                    console.log(this.value);
                });
            });

        $('#schedule_time').change(function() {
            $('#insertFreqwiseReport').bootstrapValidator('revalidateField', 'schedule_time');
        });
    </script>

    <script>

        $(document).ready(function() {
            $('#insertFreqwiseReport').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    freq: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Frequency Type'
                            }
                        }
                    },
                    report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Report Type'
                            }
                        }
                    },
                    start_date_report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Starting Date'
                            }
                        }
                    },
                    end_date_report: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Ending Date'
                            }
                        }
                    },
                    schedule_time: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Schedule Time'
                            }
                        }
                    },
                }
            });
        });
        $(document).ready(function(e) {
            $("#insertFreqwiseReport").on('submit', (function(e) {
            //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {

                    $.ajax({
                        url: "<?php echo base_url('admin/Master/insertFreqwiseReport'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $(function() {
                                $("#addfreqreport").modal('hide');
                                $("#successModalFreqWiseReport").modal('show');
                            });
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
    function edit_freq_wise_report(id) {
        var datastring = 'report_id=' + id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Master/edit_freq_wise_report'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#MyeditForm').modal('show');
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
        // $('#MyeditForm').modal('hide');
        // $(".popover-body").css('display','block');
        location.reload();

    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('input[placeholder]').placeholderLabel();
    })
    $(document).ready(function() {
        $('textarea[placeholder]').placeholderLabel();
    })
</script>


<!--======================================= Activate & deactivate  ==========================================-->

<!-- <script>
    function deactivate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Notify By?</p>',
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

            var datastring = 'time_slot_id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/notify_by_deactivate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Notify By',
                            text: 'Inactive successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master/NotifyBy'); ?>";
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
    function activate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Notify By?</p>',
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

            var datastring = 'time_slot_id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/notify_by_activate'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Notify By',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master/NotifyBy'); ?>";
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
</script> -->


<!--======================================= / Activate & Deactivate ==========================================-->

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalFreqWiseReport" tabindex="-1" aria-labelledby="successModalFreqWiseReportLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalFreqWiseReportLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Frequency Wise Report Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/FrequencywiseReport'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Frequency Wise Report?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletefreqwisereportForm">
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
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
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
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Frequency Wise Report?</div>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Frequency Wise Report?</div>
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
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
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
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
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
          url: "<?php echo base_url('admin/Master/freq_wise_report_deactivate'); ?>",
          cache: false,
          data: { "report_id": datastring },
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
          url: "<?php echo base_url('admin/Master/freq_wise_report_activate'); ?>",
          cache: false,
          data: { "report_id": datastring },
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
</script>

<script>
$(document).ready(function(e) 
{
  $("#deletefreqwisereportForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Master/delete_freq_wise_report'); ?>",
          cache: false,
          data: { "report_id": datastring },
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
    $(document).ready(function(){
        var rescheduleTable = $('#MyNotifyByTable').DataTable( {       
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
<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date_report').val());
            var end_date = new Date($('#end_date_report').val());

            if (start_date > end_date) 
            {
                $('#error_end_date_report').css('display','block');
                $("#freqwise_report_sub_btn").attr('disabled', true);
            }
            else
            {
                
                $('#error_end_date_report').css('display','none');
                $("#freqwise_report_sub_btn").attr('disabled', false);
            }
        } 
</script>
