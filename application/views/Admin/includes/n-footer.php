<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-none w-100">
    	<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
    		<i class="icon-unfold mr-2"></i>
    		Footer
    	</button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            copyright &copy; 2022.All Rights Reserved.
        </span>
    </div>
</div>
<!-- /footer -->

</div>
<!-- /main content -->
</div>

</div>
<!-- /page content -->
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/editor_summernote.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/form_select2.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/ui/fullcalendar/main.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/ui/fullcalendar/locales-all.min.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/fullcalendar_formats.js"></script>
<script src="<?= base_url() ?>new-assets/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

<script src="<?= base_url() ?>new-assets/global_assets/js/demo_pages/datatables_extension_colvis.js"></script>

<script>
    function edit_notes(id) {
		var datastring = 'note_id=' + id;
		
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>admin/Dashboard/EditNotes",
			data: datastring,
			success: function (data) {
				$('#EditNotes').modal('show');
				$('#EditNotesModel').html(data);
                $(".popover-body").css('display','none');
			},
			error: function () {
				alert('Error while request..');
			}
		});
	}
    function updateUI_edit_button_close()
    {
        $(".popover-body").css('display','block');
        $('#edit_button_close').attr('data-dismiss', 'modal');
    }
    // function del_notes(note_id) {
    //     var notice = new PNotify({
    //         title: 'Confirmation',
    //         text: '<p>Are you sure you want to delete this Note ?</p>',
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
    //         var datastring = 'note_id=' + note_id;
    //         //alert(datastring);
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url('admin/Dashboard/del_notes'); ?>",
    //             cache: false,
    //             data: datastring,
    //             success: function(data) {
    //                 //alert(data);
    //                 $(function() {
    //                     new PNotify({
    //                         title: 'Delete Note',
    //                         text: 'Deleted successfully',
    //                         type: 'success'
    //                     });
    //                 });
    //                 setTimeout(function() {
    //                     window.location = "";
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

    function del_notes (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationnoteModal').modal('show');
        $(".popover-body").css('display','none');
    };

    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        $('#delete_button_close').attr('data-dismiss', 'modal');
    }

    $(document).ready(function() {
        $('#add_notes_form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                notes: {
                    validators: {
                        notEmpty: {
                            message: 'Notes Required'
                        }
                    }
                }

            }
        });
    });

    $(document).ready(function(e) {
        $("#add_notes_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('admin/Dashboard/AddNotes'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Add Note',
                            //     text: 'Added Successfully',
                            //     type: 'success'
                            // });
                            $('#successModalnote').modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location ="";
                        // }, 1000);
                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');
                    }
                });
            }
            return false;
        }));
    });

    $('#product_id').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#customer_id').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#schedule_type_id').select2({
        dropdownParent: $('#shortcut-add-activity')
    });
    $('#employee_id').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#reminder_before_time').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#reminder_notify_by').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#recurring_set').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('#interval_type').select2({
        dropdownParent: $('#shortcut-add-activity')
    });

    $('.clockpicker').clockpicker({
        placement: 'left',
        align: 'left',
        donetext: 'Done',
        minTime: '12:00' // 11:45:00 AM,
    });

    function showDataRecurring(id) {
        if (id == 1) {
            $('.recuuringData').css('display','flex');
        } else {
            $('.recuuringData').css('display','none');
        }
    }
    $(document).on('change', '.checkboxchecked', function() {
        if (this.checked) {
            $('.reminderSetting').show();
        } else {
            $('.reminderSetting').hide();
            $('#user_id').val("");
            $('#reminder_before_time').val("");
            $('#reminder_note').val('');
        }
    });

    $('#schedule_date').change(function() {
        $('#shortcut_shortcut_schedule_addFormschedule_addForm').bootstrapValidator('revalidateField', 'schedule_date');
    });

    // $('#schedule_start_time').change(function() {
    //     $('#shortcut_schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
    // });

    // $('#schedule_end_time').change(function() {
    //     $('#shortcut_schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
    // });

    $(document).ready(function() {
        $('#schedule_start_time_schedule_header').change(function() 
        {
            alert("HII");
            $('#shortcut_schedule_addForm').bootstrapValidator('revalidateField', 'schedule_start_time');
        });

        $('#schedule_end_time_schedule_header').change(function() {
            $('#shortcut_schedule_addForm').bootstrapValidator('revalidateField', 'schedule_end_time');
        });
        $('#shortcut_schedule_addForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                customer_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Customer'
                        }
                    }
                },

                product_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Product'
                        }
                    }
                },

                employee_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Resource'
                        }
                    }
                },

                schedule_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Schedule Date'
                        }
                    }
                },

                // query: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Please Enter Query'
                //         }
                //     }
                // },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                },
                reminder_notify_by: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Notify By.'
                        }
                    }
                },
                recurring_set: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Recurring Type'
                        }
                    }
                },

                schedule_start_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Time'
                        }
                    }
                },

                schedule_end_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Time'
                        }
                    }
                },

                schedule_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Schedule Type'
                        }
                    }
                },

                emailid: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Email.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },
                'user_id[]': {
                    validators: {
                        notEmpty: {
                            message: 'Please Select User'
                        }
                    }
                },
                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Notes'
                        }
                    }
                },
                priority_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Priority'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Status'
                        }
                    }
                },
            }
        });
    });
    $(document).ready(function(e) {
        $("#shortcut_schedule_addForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                var formresult = new FormData(this);
                object= {}
                formresult.forEach((value, key) => object[key] = value);
                var txt = JSON.stringify(object);
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/add_schedule'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        $("#preview").hide();
                        if (data == 1 || data == 11) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $("#shortcut-add-activity").modal('hide');
                                $("#successModalHeader").modal('show');
                            });

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            // }, 1000);
                        } else if (data == 2) 
                        {
                            $("#scheduleModalheader").modal('show');
                            $("input[name=formdata]").val(txt);
                            // var notice = new PNotify({
                            //     title: 'Confirmation',
                            //     text: '<p>Schedule is already assign on this time. Are sure want to overlap this schedule?</p>',
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
                            //     $.ajax({
                            //         url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                            //         type: "POST",
                            //         data: formresult,
                            //         contentType: false,
                            //         cache: false,
                            //         processData: false,
                            //         success: function(data) {
                            //             // alert(data);
                            //             $(function() {
                            //                 new PNotify({
                            //                     title: 'Add Schedule',
                            //                     text: 'Schedule Submited Successfully',
                            //                     type: 'success'
                            //                 });
                            //             });

                            //             setTimeout(function() {
                            //                 window.location =
                            //                     "<?php echo base_url('admin/ScheduleManagement/GridList'); ?>";
                            //             }, 800);


                            //         },
                            //         error: function() {
                            //             alert('Error while request..');
                            //         }
                            //     });
                            // })
                            // On cancel
                            // notice.get().on('pnotify.cancel', function() {
                            //     // alert('Oh ok. Chicken, I see.');
                            // });
                        }
                    },
                    error: function() {
                        $('#alertModalTask').modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalnote" tabindex="-1" aria-labelledby="successModalnoteLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalnoteLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Note Added Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url($_SERVER['REQUEST_URI']); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteconfirmationnoteModal" tabindex="-1" aria-labelledby="deleteconfirmationnoteModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteconfirmationnoteModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Note?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(e) 
{
  $("#deleteForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Dashboard/del_notes'); ?>",
          cache: false,
          data: { "note_id": datastring },
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

</body>

</html>


<div class="modal fade" id="successModalHeader" tabindex="-1" aria-labelledby="successModalHeaderLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalHeaderLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Task Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="scheduleModalheader" tabindex="-1" aria-labelledby="scheduleModalheaderLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="scheduleModalheaderLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-arrow-rotate-right" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Task is already assign on this time. Shall we proceed with overlapping this task?</div>
                <div class="modal-footer" style="justify-content: center;">
                <form method="POST" id="schedule_addForm_overwrite_header">
                    <input type='hidden' id='fetchdataheader' name="formdata" value=''>
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px; margin-right:10px;">Yes</button>
                </form>
                <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModalTask" tabindex="-1" aria-labelledby="alertModalTaskLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalTaskLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/GridList'); ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $("#schedule_addForm_overwrite_header").on('submit', (function(e) {
            e.preventDefault();
            // alert(e.isDefaultPrevented());
            if (e.isDefaultPrevented()) {
                // alert("default preented");
                $("#preview").html(
                    '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                // $("#preview").hide();
                $.ajax({
                    url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview").hide();
                        
                        if (data == 1 || data == 11) {
                            $(function() 
                            {
                                // alert("Bratati");
                                // alert(data);
                                // new PNotify({
                                //     title: 'Add Schedule',
                                //     text: 'Schedule Submited Successfully',
                                //     type: 'success'
                                // });
                                $("#shortcut-add-activity").modal('hide');
                                $("#scheduleModalheader").modal('hide');
                                $('#successModalHeader').modal("toggle");

                                // $("#successModal").modal('show');
                                
                            });
                            // setTimeout(function() {
                            //     $('#successModal').modal({show:true});
                            // }, 200);
                        }
                        else
                        {
                            $('#alertModalTask').modal('show');
                        }
                    },
                    error: function() 
                    {
                        $('#alertModalTask').modal('show');
                    }
                });
            }   
            else 
            {
                // $("#preview").html(
                //     '<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                // // $("#preview").hide();
                // $.ajax({
                //     url: "<?php echo base_url('admin/Customer/add_schedule_overright'); ?>",
                //     type: "POST",
                //     data: new FormData(this),
                //     contentType: false,
                //     cache: false,
                //     processData: false,
                //     success: function(data) {
                //         $("#preview").hide();
                        
                //         if (data == 1 || data == 11) {
                //             $(function() 
                //             {
                //                 alert("Bratati");
                //                 // alert(data);
                //                 // new PNotify({
                //                 //     title: 'Add Schedule',
                //                 //     text: 'Schedule Submited Successfully',
                //                 //     type: 'success'
                //                 // });
                //                 $("#schedule_model").modal('hide');
                //                 $("#scheduleModal").modal('hide');
                //                 $('#successModal').modal("toggle");

                //                 // $("#successModal").modal('show');
                                
                //             });
                //             // setTimeout(function() {
                //             //     $('#successModal').modal({show:true});
                //             // }, 200);
                //         }
                //         else
                //         {
                //             $('#alertModal').modal('show');
                //         }
                //     },
                //     error: function() 
                //     {
                //         $('#alertModal').modal('show');
                //     }
                // });
            }
        }));
    });
</script>

