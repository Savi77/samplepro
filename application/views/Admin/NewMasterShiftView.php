<?php $this->load->view('Admin/includes/n-header');    ?>

<style>
   .datatable-header {
        padding-top: 1.25rem !important;
    }
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
    #MyShiftTable th:first-child{
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Shift</span>
                <a data-toggle="modal" data-target="#shift" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyShiftTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Shift Name</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; foreach ($MasterShiftArray as $row) { ?>
                        <tr>
                            <td>
                              <div>
                                <?php echo $count ?>
                              </div>
                            </td>

                            <td>
                              <div class="text-wrap-col" style="width:150px;">
                                <?= $row->shift_title; ?>
                              </div>
                            </td>

                            <td>
                              <div style="width:150px;">
                                <?= $row->from_timing; ?>
                              </div>
                            </td>

                            <td>
                              <div style="width:150px;">
                               <?= $row->to_timing; ?>
                              </div>
                            </td>

                            <td>
                              <div style="width:150px;">
                                <?php if ($row->status == '1') { ?>
                                    <button class="active-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" onclick="cancel_verification(this)" data-id="<?= $row->id ?>" id="<?= $row->id ?>" >Active</button>
                                <?php } else { ?>
                                    <button data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" onclick="confirm_verification(this)" data-id="<?= $row->id ?>" id="<?= $row->id ?>" class="red-btn">Inactive</button>
                                <?php } ?>
                              </div>
                            </td>

                            <!-- <td class="text-center d-flex">
                                <a class="cursor-pointer" data-popup="tooltip"onclick="edit_master_shift(id)" id="<?= $row->id; ?>" data-toggle="tooltip" title="Edit Shift" data-placement="bottom" data-original-title="Edit Shift">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="cursor-pointer" data-popup="tooltip" onclick="delete_master_shift(this)" data-id="<?= $row->id ?>" id="<?= $row->id; ?>" data-toggle="tooltip" title="Delete Shift" data-placement="bottom" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td> -->


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
                                                            <a onclick="edit_master_shift(id)" id="<?= $row->id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Shift  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="delete_master_shift(this)" data-id="<?= $row->id ?>" id="<?= $row->id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Shift  
                                                            </a>
                                                        </li>
                                                      </ul>
                                                </div>
                                            </div> 

                                        </li>
                                        <!-- </i></a></li> -->
                                    </ul>
                                </div>
                            </td>     


                        </tr>
                    <?php $count++; } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

<div id="shift" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content border">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                   Add Shift</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="addShift" method="post">
                <div class="modal-body pb-0">
                    <div class="form-group">
                        <label>Shift Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" data-mask="Shift Name" name="shift_title" placeholder="Enter Shift Name">
                    </div>
                    <div class="form-group">
                        <label>From Time <span class="text-danger">*</span> </label>
                        <div class="clearfix">
                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" placeholder="Enter From Time" name="from_timing" id="from_timing" autocomplete="off" readonly>
                                <!-- <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To Time <span class="text-danger">*</span> </label>
                        <div class="clearfix">
                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" placeholder="Enter To Time" name="to_timing" id="to_timing" autocomplete="off" readonly>
                                <!-- <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;"> Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Shift</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $('.clockpicker').clockpicker({
      placement: 'bottom',
      align: 'left',
      donetext: 'Done'
    });
  </script>
  <script>
    // function confirm_verification(id) {

    //   var notice = new PNotify({
    //     title: 'Confirmation',
    //     text: '<p>Are you sure you want to verify this Shift?</p>',
    //     hide: false,
    //     type: 'warning',
    //     confirm: {
    //       confirm: true,
    //       buttons: [{
    //         text: 'Yes',
    //         addClass: 'btn-sm'
    //       }, {
    //         text: 'No',
    //         addClass: 'btn-sm'
    //       }]
    //     },
    //     buttons: {
    //       closer: false,
    //       sticker: false
    //     },
    //     history: {
    //       history: false
    //     }
    //   })

    //   // On confirm
    //   notice.get().on('pnotify.confirm', function() {

    //     var datastring = 'user_id=' + id;
    //     // alert(datastring);
    //     $.ajax({
    //       type: "post",
    //       url: "<?php echo base_url('admin/Tracking/confirm_shift'); ?>",
    //       cache: false,
    //       data: datastring,
    //       success: function(data) {
    //         //alert(data);
    //         $(function() {
    //           new PNotify({
    //             title: 'Confirmation Form',
    //             text: 'Shift Active successfully',
    //             type: 'success'
    //           });
    //         });

    //         setTimeout(function() {
    //           window.location = "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
    //         }, 1000);

    //       },
    //       error: function() {
    //         alert('Error while request..');
    //       }
    //     });

    //   })

    //   // On cancel
    //   notice.get().on('pnotify.cancel', function() {
    //     // alert('Oh ok. Chicken, I see.');
    //   });

    // }

    // Cancel verification -------------------------------
    // function cancel_verification(id) {

    //   var notice = new PNotify({
    //     title: 'Confirmation',
    //     text: '<p>Are you sure you want to un-verify this Shift?</p>',
    //     hide: false,
    //     type: 'warning',
    //     confirm: {
    //       confirm: true,
    //       buttons: [{
    //         text: 'Yes',
    //         addClass: 'btn-sm'
    //       }, {
    //         text: 'No',
    //         addClass: 'btn-sm'
    //       }]
    //     },
    //     buttons: {
    //       closer: false,
    //       sticker: false
    //     },
    //     history: {
    //       history: false
    //     }
    //   })

    //   // On confirm
    //   notice.get().on('pnotify.confirm', function() {

    //     var datastring = 'user_id=' + id;
    //     // alert(datastring);
    //     $.ajax({
    //       type: "post",
    //       url: "<?php echo base_url('admin/Tracking/cancel_shift'); ?>",
    //       cache: false,
    //       data: datastring,
    //       success: function(data) {
    //         // alert(data);
    //         $(function() {
    //           new PNotify({
    //             title: 'Confirmation Form',
    //             text: 'Shift Inactive successfully',
    //             type: 'success'
    //           });
    //         });

    //         setTimeout(function() {
    //           window.location = "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
    //         }, 1000);

    //       },
    //       error: function() {
    //         alert('Error while request..');
    //       }
    //     });

    //   })

    //   // On cancel
    //   notice.get().on('pnotify.cancel', function() {
    //     // alert('Oh ok. Chicken, I see.');
    //   });

    // }
  </script>
  <script type="text/javascript">
    $("#from_timing").blur(function() {
      $('#addShift').bootstrapValidator('revalidateField', 'from_timing');
    });
    $("#to_timing").blur(function() {
      $('#addShift').bootstrapValidator('revalidateField', 'to_timing');
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#addShift').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
          shift_title: {
            validators: {
              notEmpty: {
                message: 'Please Enter Shift Name'
              }
            }
          },
          from_timing: {
            validators: {
              notEmpty: {
                message: 'Please Enter From Time'
              }
            }
          },
          to_timing: {
            validators: {
              notEmpty: {
                message: 'Please Enter To Time'
              }
            }
          },

        }
      });
    });
  </script>

  <script>
    $(document).ready(function (e) {
            $("#addShift").on('submit', (function (e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('admin/Tracking/add_master_shift'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            // alert(data);
                            
                            $(function () {
                                // new PNotify({
                                //     title: 'Shift Form',
                                //     text: 'Shift Added Successfully',
                                //     type: 'success'
                                // });
                                $("#shift").modal('hide');
                                $('#successModalshift').modal('show');
                            });

                            // setTimeout(function () {
                            //     window.location =
                            //         "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
                            // }, 1000);
                        },
                        error: function () {
                            $("#alertModal").modal('show');
                        }
                    });
                }
                return false;
            }));
        });
  </script>

  <!--============== / Validation form  ================-->

  <script>
    function edit_master_shift(id) {
      var datastring = 'id=' + id;
      $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Tracking/edit_master_shift'); ?>",
        cache: false,
        data: datastring,
        success: function(data) {
          // alert(data);
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

  </script>


  <!-- <script>
    function delete_master_shift(id) {

      var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this shift ?</p>',
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

        var datastring = 'id=' + id;
        // alert(datastring);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Tracking/delete_master_shift'); ?>",
          cache: false,
          data: datastring,
          success: function(data) {
            // alert(data);
            $(function() {
              new PNotify({
                title: 'Delete Master Shift',
                text: 'Deleted successfully',
                type: 'success'
              });
            });

            setTimeout(function() {
              window.location = "<?php echo base_url('admin/Tracking/MasterShift'); ?>";
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalshift" tabindex="-1" aria-labelledby="successModalshiftLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalshiftLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Shift Added Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Shift?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteshiftForm">
                        <input type="hidden" id="role_id" name="role_id" value="" >
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
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating  this Shift?</div>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Shift?</div>
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Shift Inactive successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Shift Active successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
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
                <a href="<?php echo base_url('admin/Tracking/MasterShift'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function cancel_verification (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deactivateconfirmationModal').modal('show');
    };
    function confirm_verification (element) 
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
    // alert("Hii");

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
          url: "<?php echo base_url('admin/Tracking/cancel_shift'); ?>",
          cache: false,
          data: { "user_id": datastring },
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
          url: "<?php echo base_url('admin/Tracking/confirm_shift'); ?>",
          cache: false,
          data: { "user_id": datastring },
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
    function delete_master_shift (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    }
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
  $("#deleteshiftForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Tracking/delete_master_shift'); ?>",
          cache: false,
          data: { "id": datastring },
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
        var rescheduleTable = $('#MyShiftTable').DataTable( {       
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