<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!--============================ Date picker adjustment ================================ -->

<style type="text/css">
    tr.group,
    tr.group:hover {
        background-color: rgb(103, 98, 98) !important;
        color: white !important;
        font-size: 14px !important;
        font-weight: 600 !important;
    }

    .dataTables_length>label>span:first-child {
        float: left;
        margin: 5px 9px;
        margin-left: -15px;
    }

    .datatable-header>div:first-child,
    .datatable-footer>div:first-child {
        margin-left: 9px !important;
        left: -13px !important;
    }

    input,
    button,
    select,
    textarea {
        height: auto !important;
    }

    .btn-info {
        color: #fff;
        background-color: rgba(236, 14, 39, 0.77) !important;
        border-color: rgba(236, 14, 39, 0.77) !important;
    }

    .nav-tabs>li>a {
        margin-right: 0;
        color: #ddd !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 6px;
        /* border-bottom: 1px solid #111; */
    }
</style>
<!--============================ / Date picker adjustment ================================ -->

<!--============================ previous date hide datepicker color changes================================ -->
<style type="text/css">
    .ui-datepicker table td.ui-state-disabled span {
        color: #2d2d2d;
    }

    .ui-datepicker table td.ui-datepicker-today .ui-state-highlight {
        background-color: #2196F3;
        color: #252424;
    }

    .testing {
        z-index: 100000;
    }

    .ui-datepicker .ui-datepicker-title .ui-datepicker-year {
        font-size: 12px;
        color: #333232;
        margin-left: 5px;
    }

    .ui-datepicker .ui-datepicker-prev span,
    .ui-datepicker .ui-datepicker-next span {
        display: none !important;
    }

    .ui-datepicker table td.ui-datepicker-current-day .ui-state-active {
        background-color: #26A69A;
        color: #333;
    }
</style>
<!--============================ / previous date hide datepicker color changes================================ -->
<style type="text/css">
    .daterange-single {
        z-index: 100000;
    }

    /*  Display datepicker on modal (popup)  */

    .modal {
        z-index: 20;
    }

    .modal-backdrop {
        z-index: 10;
    }
</style>
<!--========================= Multiple target type assign to employee ===================================-->
<style type="text/css">
    input[type="radio"],
    input[type="checkbox"] {
        margin: 10px 0 0;
        margin-top: 1px \9;
        line-height: normal;
    }

    .form-horizontal .form-group .form-group {
        /*margin-left: -15px;*/
        margin-right: 0;
    }
</style>
<style>

.sidebar-expand-lg.sidebar-main{

z-index: 10 !important;

}
.dt-button{
    padding:6px;
}


</style>
<!--========================= / Multiple target type assign to employee ===================================-->

<?php
foreach ($edit_target->result() as $targetvalue) {
    $tr_auto_id = $targetvalue->tr_auto_id;
    $targettype_id = $targetvalue->targettype_id;
    $target_period = $targetvalue->target_period;
    $start_date = $targetvalue->start_date;
    $end_date = $targetvalue->end_date;
    $date_created = $targetvalue->date_created;
}
?>

<form class="form-horizontal" id="editTarget_Form">
    <div class="row">
        <div class="form-group col-sm-12">
            <label class="control-label col-sm-12" for="Youtube">Target Period <span style="color: red;">*</span></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="target_period1" name="target_period" value="<?= $target_period ?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 d-flex p-0">
            <div class="col-sm-6">
                <label class="control-label col-sm-12" for="Youtube">Start Date <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <input type="hidden" name="start_date" value="<?= date("d F Y", strtotime($start_date)); ?>" >
                    <input type="text" class="form-control" id="start_date12" name="start_date1" value="<?= date("d M Y", strtotime($start_date)); ?>" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="control-label col-sm-12" for="Youtube">End Date <span style="color: red;">*</span></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" onchange="mainInfo1(this.value);" id="end_date12" name="end_date" value="<?= date("d F Y", strtotime($end_date)); ?>">
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control testing" id="tr_auto_id" name="tr_auto_id" value="<?= $tr_auto_id ?>">
        <input type="hidden" class="form-control testing" id="created_date" name="created_date" value="<?= $date_created ?>">
        <div class="form-group col-12">
            <label class="control-label col-sm-12" for="Youtube">Target Type <span style="color: red;">*</span></label>
            <div class="col-sm-12">
                <input type="hidden" class="form-control" id="targettype_id1" name="targettype_id" value="<?= $targettype_id ?>" readonly>
                <?php
                foreach ($target_type->result() as $value2) {
                    $tt_id = $value2->targettype_id;
                    if ($tt_id == $targettype_id) { ?>
                        <input type="text" class="form-control" value="<?= $value2->target_type ?>" readonly>
                <?php }
                } ?>
                </select>
            </div>
        </div>
        <input class="form-control" type="hidden" id="name_values1" name="name_values1">

        <div class="form-group col-12" id="selectedemployeelist">
            <label class="control-label col-sm-12 emp-title" for="Youtube">Resource List <span style="color: red;">*</span></label>
            <div class="col-sm-12" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">
                <?php
                 foreach ($selected_employee_list as $emp1) {
                ?>
                    <div class="row">
                        <div class="col-md-1 form-group mt-2 text-left" >
                            <input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" checked="" value="<?= $emp1['emp_id'] ?>">
                        </div>
                        <div class="col-md-5 form-group">
                            <input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp1['emp_name'] ?>" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <input class="form-control day1" type="text" id="taget_value" name="taget_value[]" value="<?= $emp1['target_value'] ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 44' maxlength="15">
                        </div>
                        <div class="col-md-3 form-group">
                            <input class="form-control class" type="text" id="" class="" readonly="" name="" value="<?= $get_uom[0]->uom_type ?>">
                            <input class="form-control class" type="hidden" id="uom_id" class="" readonly="" name="uom_id" value="<?= $get_uom[0]->uom_id ?>">
                        </div>
                        <br>
                    </div>
                <?php } ?>

                <?php foreach ($all_employee_list->result() as $emp2) {
                ?>

                    <div class="row">
                        <div class="col-md-1 form-group mt-2 text-left">
                            <input type="checkbox" class="day" id="selected_emp" name="selected_emp[]" value="<?= $emp2->id ?>">
                        </div>
                        <div class="col-md-5 form-group">
                            <input class="form-control" type="text" id="emp_id" name="emp_id[]" value="<?= $emp2->name ?>" readonly>

                        </div>
                        <div class="col-md-3 form-group">
                            <input class="form-control day1" type="text" id="taget_value" name="taget_value[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 44' maxlength="15">
                        </div>
                        <div class="col-md-3 form-group">
                            <input class="form-control class" type="text" id="" class="" readonly="" name="" value="<?= $get_uom[0]->uom_type ?>">
                            <input class="form-control class" type="hidden" id="uom_id" class="" readonly="" name="uom_id" value="<?= $get_uom[0]->uom_id ?>">
                        </div>
                        <br>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="form-group col-12" id="issuelistdetails1" style="display: none">
            <label class="control-label col-sm-12 emp-title" for="Youtube">Resource list <span style="color: red;">*</span></label>
            <div class="col-sm-12" id="issue_schedule_list1" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">

            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-12" style="text-align:right;padding-right:25px;">
            <button type="submit" class="btn btn-primary pull-right" id="desktopbutton12">Update<i class="icon-arrow-right14 position-right"></i></button>
        </div>
        <div id="loader"></div>
    </div>
</form>
<!--========================== Date picker javascript ====================================-->
<!--       <script type="text/javascript">
          $(function () 
          {
              $('#end_date12').datetimepicker({format: 'DD MMMM, YYYY', useCurrent: true});
          });
      </script> -->
<script language="javascript">
    // $(document).ready(function () {
    //     $("#start_date1").datepicker({
    //         dateFormat: "d MM yy",
    //         minDate: 0
    //     });
    // });

    $(document).ready(function() {
        $("#end_date12").datepicker({
            dateFormat: "d MM yy",
            minDate: 0
        });
    });
</script>

<script type="text/javascript">
    // $('#end_date12').change(function(){
    // $('#editTarget_Form').bootstrapValidator('revalidateField', 'end_date'); 
    // });
</script>
<!--========================== / Date picker javascript ====================================-->
<!--============================== date comparision and get employee list ================================-->
<script type="text/javascript">
    function mainInfo1() {
        // alert();
        // $('#editTarget_Form').bootstrapValidator('revalidateField', 'end_date12');
        var startDate = document.getElementById("start_date12").value;
        var endDate = document.getElementById("end_date12").value;


        var target_period = document.getElementById("target_period1").value;

        // if (target_period=='Daily') 
        // {
        //     var endDate = document.getElementById("end_date").value;
        // }
        // else
        // {
        var endDate = document.getElementById("end_date12").value;
        // }

        var date = new Date(startDate);
        var newdate = new Date(date);


        if ((Date.parse(startDate) == Date.parse(endDate))) {

            $('#desktopbutton12').prop('disabled', false);
            start_date = $('#start_date12').val();
            end_date = $('#end_date12').val();
            targettype_id = $('#targettype_id1').val();
            tr_auto_id = $('#tr_auto_id').val();

            if (end_date != '' && targettype_id != '') {
                var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id + '&tr_auto_id=' + tr_auto_id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Target/getemployee_list1'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('input:checkbox').removeAttr('checked');
                        $('.day1').val('');

                        $('#selectedemployeelist').hide();
                        $('#issuelistdetails1').show();
                        $('#issue_schedule_list1').html(data);


                    },
                    error: function() {
                        // alert('Error while request..');
                        $('#deleteErrorModal').modal('show');

                    }
                });
                return false;

            }
            // alert();

        } else if ((Date.parse(startDate) > Date.parse(endDate))) {

            $('#desktopbutton12').prop('disabled', true);
            // new PNotify({
            //     title: 'Event',
            //     text: 'End date should be greater than Start date',
            //     type: 'warning'
            // });
            $('#alertTragetlistdateModal').modal('show');


        } else {
            $('#desktopbutton12').prop('disabled', false);
            start_date = $('#start_date12').val();
            end_date = $('#end_date12').val();
            targettype_id = $('#targettype_id1').val();
            tr_auto_id = $('#tr_auto_id').val();
            if (end_date != '' && targettype_id != '') {
                var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id + '&tr_auto_id=' + tr_auto_id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Target/getemployee_list1'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        $('input:checkbox').removeAttr('checked');
                        $('.day1').val('');
                        $('#selectedemployeelist').hide();
                        $('#issuelistdetails1').show();
                        $('#issue_schedule_list1').html(data);


                    },
                    error: function() {
                        // alert('Error while request..');
                        $('#deleteErrorModal').modal('show');

                        
                    }
                });
                return false;
            }
        }
    }
</script>

<!-- <script language="javascript">
        $(document).ready(function () {
            $("#start_date1").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });

        $(document).ready(function () {
            $("#end_date12").datepicker({
                dateFormat: "d MM yy",
                minDate: 0
            });
        });
</script> -->
<!--====================================== / date comparision and get employee list ==========================-->

<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#editTarget_Form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                    }
                },
                end_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end date'
                        }
                    }
                },

                targettype_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please select target type'
                        }
                    }
                },

                fileup1: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Image for Landing Page'
                        }
                    }
                },

                target_period: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Target Period'
                        }
                    }
                },

                emailid: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                }
            }
        });
    });
</script>

<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#editTarget_Form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                var values = [];
                $('input[type=checkbox]:checked').each(function(index) {
                    var id = $(this).val();
                    values.push(id);
                });
                // alert(values);
                // var datastring='areaid='+values;
                $('#name_values1').val(values);
                // alert(datastring);
                $.ajax({
                    url: "<?php echo base_url('admin/Target/edit_add_target'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        if (data == 0) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Edit Form',
                                //     text: 'Please tick the checkbox / fill necessary value',
                                //     type: 'warning'
                                // });
                                // alert("Please tick the checkbox / fill necessary value");
                                $("#checkboxModal").modal('show');

                                
                            });
                        } else {

                            $(function() {
                                // new PNotify({
                                //     title: 'Edit Form',
                                //     text: 'Target Updated successfully',
                                //     type: 'success'
                                // });
                                $("#UpdatesuccessModal").modal('show');

                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/Target'); ?>";
                            // }, 1000);
                        }
                    },
                    error: function() {
                        $("#updateErrorModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>


<!--  -->
<script>
    function updatestate(val) {
        // alert(val);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('admin/Customer/getstate') ?>',
            data: 'country_id=' + val,
            success: function(data) {
                // alert(data);
                $("#state1").html(data);
            }
        });
    }
</script>
<!--  -->

<!--=============================================== multiselect employee ================================== -->
<script type="text/javascript">
    jQuery('#business1').multiselect({
        enableFiltering: true,
        maxHeight: 400,
        enableCaseInsensitiveFiltering: true,
        nonSelectedText: 'Select business segment',
        numberDisplayed: 10,
        selectAll: false,
        onChange: function(option, checked) {
            // Get selected options.
            var selectedOptions = jQuery('#business1 option:selected');

            if (selectedOptions.length >= 10) {
                // Disable all other checkboxes.
                var nonSelectedOptions = jQuery('#business1 option').filter(function() {
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
                jQuery('#business1 option').each(function() {
                    var input = jQuery('input[value="' + jQuery(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
            }
        }
    });


    /*Add This to Block SHIFT Key*/
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
<!-- ====================================================================================================================== -->

<div class="modal fade" id="alertTragetlistdateModal" tabindex="-1" aria-labelledby="alertTragetlistdateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertTragetlistdateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Event</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">End date should be greater than Start date</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/View_master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
                <a href="<?php echo base_url('admin/Master'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Target Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
          </div>
    </div>  
</div>

<div class="modal fade" id="checkboxModal" tabindex="-1" aria-labelledby="checkboxModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="checkboxModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Please tick the checkbox / fill necessary value</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Target'); ?>"> -->
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                <!-- </a> -->
            </div>
        </div>
    </div>
</div>
