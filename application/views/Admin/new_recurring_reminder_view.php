<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    /* .dt-buttons {
        display: none;
    } */
    tr.group{
        background: #aeeca7;
        color: #006b20;
    }
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
    #reminder_table th:first-child {
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
                <span class="span-py-10 white-text">Recurring Reminder</span></i>
                <a onclick="deleteReminder(<?= $reminder_id ?>)" class="btn btn-link btn-float has-text" style="display:flex;"><i class="icon-trash" style="margin-right:10px;"></i><span style="padding-top:0;">Delete Reminder</span></a>
            </div>
            <input type="hidden" name="reminder_id" id="reminder_id" value="<?= $reminder_id ?>" >

            <table class="table table-striped" id="reminder_table">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Planned Date Time</th>
                        <th>Reminder Date Time </th>
                        <th>Notify By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($getRecurringData as $row) {

                        $rem_notify_by = $row->notify_id;
                        $str_arr = preg_split ("/\,/", $rem_notify_by);  
                        
                        $rem_notify_name = "";
                        for ($i = 0; $i < count($str_arr); $i++) 
                        {
                            $rem_notify_by_name = $this->db->select('notify_by')->from('tbl_notify_by')->where('notify_id',$str_arr[$i])->where('org_id',$this->session->org_id)->get()->row()->notify_by;  
                            $rem_notify_name = $rem_notify_name . $rem_notify_by_name . ",";
                        }
                        $rem_notify_name1 = trim($rem_notify_name, ',');
                    ?>
                        <tr <?= $bg_class ?>>
                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row->reminder_title ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:100px;">
                                    <?= $row->module_name ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date('d M Y', strtotime($row->reminder_date)) ?><br><small><?= date('H:i A', strtotime($row->reminder_time)) ?></small>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date('d M Y', strtotime($row->recurring_date)) ?><br><small><?= date('H:i A', strtotime($row->recurring_time)) ?></small>
                                </div>
                            </td>

                            <td> 
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $rem_notify_name1; ?> 
                                </div>
                            </td>

                            <!-- <td class="text-center">
                                <div class="d-flex">
                                    <a class="cursor-pointer" data-toggle="modal" data-toggle="modal" onclick="edit_recurring_data(id)" id="<?= $row->recurring_id; ?>" data-popup="tooltip" title="Edit Reminder <?= $row->reminder_title ?>" data-placement="bottom" data-original-title="Edit Reminder <?= $row->reminder_title ?>" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>

                                    <a class="cursor-pointer" data-toggle="modal" onclick="del_client(id)" id="<?= $row->recurring_id; ?>" data-popup="tooltip" title="Delete Reminder <?= $row->reminder_title ?>" data-placement="bottom" data-original-title="Delete Reminder <?= $row->reminder_title ?>"><i class="fa fa-trash"></i></a>
                                </div>
                            </td> -->


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
                                                            <a data-toggle="modal" onclick="edit_recurring_data(id)" id="<?= $row->recurring_id; ?>" <?= $EditClass; ?> style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Reminder  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <!-- <a data-toggle="modal" onclick="del_client(id)" id="<?= $row->recurring_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
                                                            </a> -->
                                                            <a data-toggle="modal" onclick="DeleteList(this)" id="<?= $row->reminder_id; ?>" data-id="<?= $row->reminder_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Reminder  
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
<?php $this->load->view('Admin/includes/n-footer'); ?>
<!--popup-->

<div id="modal_default1" class="modal fade show" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Reminder</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div> -->

            <!-- <div class="modal-body"> -->
                <div id="complaint_model_data1"></div>
            <!-- </div> -->

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#recurringEOD').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
    });

    function showDataRecurringData(id) {
        if (id == 1) {
            $('#recuuringDataAdd').show();
        } else {
            $('#recuuringDataAdd').hide();
        }
    }
    $(document).ready(function() {
        var groupColumn = 2;
        var table = $('#reminder_table').DataTable({
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
                [groupColumn, 'asc']
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
            }
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
    $(document).ready(function() {
        $("#rmd_user_id").select2({
            dropdownParent: $("#interest_model")
        });
    });

    $('#reminder_date').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_date');
    });

    $('#reminder_time').change(function() {
        $('#ReminderForm').bootstrapValidator('revalidateField', 'reminder_time');
    });

    $(document).ready(function() {
        $('#reminder_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true,
        });
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
                            message: 'Please Enter Reminder Date'
                        }
                    }
                },
                reminder_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Reminder Time'
                        }
                    }
                },
                reminder_title: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Reminder Title'
                        }
                    }
                },
                reminder_before_time: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
                        }
                    }
                },
                reminder_note: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Reminder Before Time.'
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
                            new PNotify({
                                title: 'Reminder Form',
                                text: 'Added  Successfully',
                                type: 'success'
                            });
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url(); ?>admin/Reminder/view/" + reminder_id + "";
                        }, 1000);


                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;

        }));
    });

    function edit_recurring_data(id) {
        var datastring = 'recurring_id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Reminder/edit_recurring_data'); ?>",
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
        // $(".popover-body").css('display','block');
        // $('#modal_default1').modal('hide');
        location.reload();

    }

    function del_client(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Reminder?</p>',
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
            var reminder_id = $('#reminder_id').val();
            var datastring = 'recurring_id=' + id;
            
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Reminder/deleteRecurringReminder'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Form',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url(); ?>admin/Reminder/view/" + reminder_id + "";
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

    function deleteReminder(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this All Reminder?</p>',
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
            var reminder_id = $('#reminder_id').val();
            var datastring = 'reminder_id=' + id;
            // alert(datastring);return false;
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Reminder/deleteAllReminder'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Form',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url(); ?>admin/Reminder";
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

$(document).ready(function () {

$(document).click(function (e) {
    // $(document).click(function (e) {
    //         if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
    //             $('.panel-button').popover('hide');
    //         }
    //     });
    $(document).click(function (e) {
        if ($(e.target).is('.close')) {
            $('.panel-button').popover('hide');
        }
    });
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
        $('#deleteconfirmationModal').modal('hide');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#recurringdeleteForm").on('submit', (function(e) 
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

<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Reminder?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="recurringdeleteForm">
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