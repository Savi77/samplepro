    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>    
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/picker_date.js"></script>



<?php foreach ($editAccountingPeriod->result() as $value) {

    if ($value->start_date != '') {
        $start_date = date("d F, Y", strtotime($value->start_date));
    } else {
        $start_date = '';
    }

    if ($value->end_date != '') {
        $end_date = date("d F, Y", strtotime($value->end_date));
    } else {
        $end_date = '';
    }

?>
    <form class="form-horizontal" id="EditGroup" method='post'>
        <fieldset1>
            <div class="row">
                <input type="hidden" name="edit_id" id="edit_id" value="<?= $value->period_id; ?>">
                <div class="col-md-6" style="padding: 0px 20px;">
                    <div class="form-group">
                        <label>Period Name <span style="color: red;">*</span></label>
                        <input type="text" name="period_name_edit" id="period_name_edit" placeholder="Period Name" class="form-control" value="<?= $value->period_name?>" required>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 0px 20px;">
                    <div class="form-group">
                        <label>Short Year </label>
                        <input type="text" name="short_year" placeholder="Short Year" class="form-control" value="<?= $value->short_year?>">
                    </div>
                </div>
                <div class="col-lg-6" style="padding: 0px 20px;">
                    <label>Start Date <span style="color: red;">*</span></label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar5 "></i></span>
                        </span>
                        <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date_edit" id="start_date_edit" placeholder="Please select start date" autocomplete="off" value="<?= $start_date?>">
                    </div>
                </div>

                <div class="col-lg-6" style="padding: 0px 20px;">
                    <label>End Date <span style="color: red;">*</span></label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                        </span>
                        <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date_edit" id="end_date_edit" placeholder="Please select end date" autocomplete="off" value="<?= $end_date?>" onchange="checkvalidationdate()">
                        <small id = 'error_end_date_edit' style="display:none; color: #f00 !important">End date can not be less than start date.</small>
                    </div>
                </div>
            </div>
            <br />
            <div class="row mr-1" style="float: right;">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;" id="act_sub_btn_edit">Update<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </fieldset1>
    </form>

<?php } ?>

<script>
    function checkvalidationdate()
    {
       
        var start_date = new Date($('#start_date_edit').val());
        var end_date = new Date($('#end_date_edit').val());
        // if(end_date == 'Invalid Date')
        // {
        //     $('#error_end_date_edit').empty();
        //     $('#error_end_date_edit').css('display','block');
        //     $('#error_end_date_edit').html('Please Select End Date.');
        //     $("#act_sub_btn_edit").attr('disabled', true);
        // }
        // else
        // {
            if (start_date > end_date) 
            {
                // $('#error_end_date_edit').empty();
                $('#error_end_date_edit').css('display','block');
                // $('#error_end_date_edit').html('End date can not be less than start date.');
                $("#act_sub_btn_edit").attr('disabled', true);
            }
            else
            {
                $('#error_end_date_edit').css('display','none');
                $("#act_sub_btn_edit").attr('disabled', false);
            }
        // }
        
    }
    </script>
<script type="text/javascript">
	$(function() {
        $('#start_date_edit').pickadate({
            selectYears: true,
            selectMonths: true
        });
        $('#end_date_edit').pickadate({
            selectYears: true,
            selectMonths: true
        });
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
            $('#EditGroup').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    period_name_edit: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Period Name'
                            }
                        }
                    },

                    start_date_edit: {
                        validators: {
                            notEmpty: {
                                message: 'Select Start Date'
                            }
                        }
                    },

                    // end_date_edit: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Select End Date'
                    //         }
                    //     }
                    // },

                }
            });
        });

    $("#EditGroup").on('submit', (function(e) {
        //e.preventDefault();
        if (e.isDefaultPrevented()) {
            //alert('invalid');
            return false;
        } else {
            // alert('test');  
           
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/EditAccountingPeriod'); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    PNotify.removeAll()
                    // alert(data);

                    // $(function() {
                        // new PNotify({
                        //     title: 'Edit Form',
                        //     text: 'Updated  Successfully',
                        //     type: 'success'
                        // });
                        $("#UpdatesuccessModal").modal('show');
                    // });

                    // setTimeout(function() {
                    //     window.location = "<?php echo base_url('admin/dashboard/CompanySetting?section=timeline_setting'); ?>";
                    // }, 300);


                },
                error: function() {
                    // alert('fail');
                    $("#updateErrorModal").modal('show');

                }
            });
        }
        return false;

    }));
</script>

<script type="text/javascript">
    /* $(document).ready(function() {
        $('#EditGroup').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                period_name_edit: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Period Name'
                        }
                    }
                },
                start_date_edit: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Start Date'
                        }
                    }
                },
                end_date_edit: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter End Date'
                        }
                    }
                },
            }
        });
    }); */
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Timeline Setting Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=timeline_setting'); ?>">
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
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=timeline_setting'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>