<?php $this->load->view('Admin/includes/n-header'); ?>

<?php
// echo json_encode($user_permission);
$AddClassP = 'style="display:block";';
$EditClass = 'style="display:block";';
$DeleteClass = 'style="display:block";';
$StatusClass = 'style="display:block";';

foreach ($user_permission as $priviledge) {
     $priviledge_key = $priviledge->priviledge_key;
     $status = $priviledge->status;
     if ($priviledge_key == 'ADD') {
          if ($status == 1) {
               $AddClassP = ' style="display:block"; ';
          } else {
               $AddClassP = ' style="display:none"; ';
          }
     }

     if ($priviledge_key == 'EDIT') {
          // echo 11;
          if ($status == 1) {
               $EditClass = ' style="display:block"; ';
          } else {
               $EditClass = ' style="display:none"; ';
          }
     }

     if ($priviledge_key == 'DELETE') {
          if ($status == 1) {
               $DeleteClass = 'style="display:block"; ';
          } else {
               $DeleteClass = 'style="display:none"; ';
          }
     }

     if ($priviledge_key == 'ACTIVE') {
          if ($status == 1) {
               $StatusClass = 'style="display:block"; ';
          } else {
               $StatusClass = 'style="display:none"; ';
          }
     }
}

?>
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
    tr.bg {
     background: #fff !important;
     }
     
     #MyTaskTypeTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyTaskTypeTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyTaskTypeTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    #MyTaskTypeTable th:first-child{
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
                    <span class="span-py-10 white-text">Task Type List</span>
                    <a data-toggle="modal" data-target="#Activity-Type" class="btn btn-link btn-float has-text"><i
                              class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
               </div>

               <table class="table table-striped" id="MyTaskTypeTable">
                    <thead>
                         <tr>
                              <th>Sr No</th>
                              <th>Task Type</th>
                              <th <?= $StatusClass; ?>>Status</th>
                              <th>Action</th>
                              <th class="d-none"></th>
                              <th class="d-none"></th>
                              <th class="d-none"></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php

                         $count = 1;
                         foreach ($get_data->result() as $row) {
                              if ($count % 2 == 0) {
                                   $bg_color_class = 'class="bg"';
                              } else {
                                   $bg_color_class = '';
                              }
                              ?>
                              <tr <?= $bg_color_class ?>>
                                   <?php
                                   if ($row->org_id == 0) {
                                        ?>
                                        <td>
                                             <div>
                                                  <?php echo $count ?>
                                             </div>
                                        </td>

                                        <td>
                                             <div style="width:200px;">
                                                  <?= $row->title ?>
                                             </div>
                                        </td>

                                        <td <?= $StatusClass; ?>>
                                             <?php if ($row->status == 1) { ?>
                                                  <!-- <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row->schedule_id ?>" onclick="deactivate(this)" data-id="<?= $row->schedule_id ?>"> Active </button> -->
                                             <?php } else { ?>
                                                  <!-- <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row->schedule_id ?>" onclick="activate(this)" data-id="<?= $row->schedule_id ?>"> Inactive </button> -->
                                             <?php } ?>
                                        </td>

                                        <td class="text-center">
                                             <!-- <div class="row">
                                                  <a class="cursor-pointer" data-toggle="modal" onclick="edit_client(id)" id="<?= $row->schedule_id; ?>" data-popup="tooltip" title="Edit Task Type" data-placement="bottom" data-original-title="Edit Task" <?= $EditClass; ?> ><i class="fa fa-edit"></i></a>
                                                  
                                                  <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id = "<?= $row->schedule_id; ?>" id="<?= $row->schedule_id; ?>" data-popup="tooltip" title="Delete Task Type " data-placement="bottom" data-original-title="Delete Task"  ><i class="fa fa-trash"></i></a>
                                             </div> -->
                                        </td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <?php
                                   } else {
                                        ?>

                                        <td>
                                             <div>
                                                  <?php echo $count ?>
                                             </div>
                                        </td>

                                        <td>
                                             <div style="width:200px;">
                                                  <?= $row->title ?>
                                             </div>
                                        </td>

                                        <td <?= $StatusClass; ?>>
                                             <div style="width:150px;">
                                                  <?php if ($row->status == 1) { ?>
                                                       <button type="button" class="green-btn" data-popup="tooltip"
                                                            title="Click for Inactive" data-placement="bottom"
                                                            data-original-title="Click for Inactive" id="<?= $row->schedule_id ?>"
                                                            onclick="deactivate(this)" data-id="<?= $row->schedule_id ?>"> Active </button>
                                                  <?php } else { ?>
                                                       <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate"
                                                            data-placement="bottom" data-original-title="Click for Activate"
                                                            id="<?= $row->schedule_id ?>" onclick="activate(this)"
                                                            data-id="<?= $row->schedule_id ?>"> Inactive </button>
                                                  <?php } ?>
                                             </div>
                                        </td>
<!-- 
                                        <td class="text-center">
                                             <div class="row">
                                                  <a class="cursor-pointer" data-toggle="modal" onclick="edit_client(id)"
                                                       id="<?= $row->schedule_id; ?>" data-popup="tooltip" title="Edit Task Type"
                                                       data-placement="bottom" data-original-title="Edit Task" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>

                                                  <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal"
                                                       onclick="DeleteList(this)" data-id="<?= $row->schedule_id; ?>"
                                                       id="<?= $row->schedule_id; ?>" data-popup="tooltip"
                                                       title="Delete Task Type " data-placement="bottom"
                                                       data-original-title="Delete Task"><i class="fa fa-trash"></i></a>
                                             </div>
                                        </td> -->

                                        <td>
                                             <div>
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
                                                                           <a data-toggle="modal" onclick="edit_client(id)" id="<?= $row->schedule_id; ?>" style="color:#333333;">
                                                                                <span class="status-mark position-left dot dot-green"></span> Edit Task Type  
                                                                           </a>
                                                                      </li>
                                                                      <li>
                                                                           <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->schedule_id; ?>" id="<?= $row->schedule_id; ?>" style="color:#333333;">
                                                                                <span class="status-mark position-left dot dot-red"></span> Delete Task Type  
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
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <?php
                                   }
                                   ?>

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

<div id="Activity-Type" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                         Add Task Type List</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form class="form-horizontal" id="ScheduleForm">
                    <div class="modal-body">
                         <div class="form-group" style="margin-bottom:0;">
                              <label class="control-label col-sm-3 p-0" for="email">Task Type <span
                                        style="color: red;">*</span></label>
                              <div class="col-sm-12 p-0">
                                   <input type="text" class="form-control" id="schedule_type" name="schedule_type"
                                        placeholder="Enter Task Type" maxlength="50" onkeyup=chk_activity_type_list()>
                                   <small id="error_activity_type_list" style="color: #f00 !important;"></small>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer" style="padding-right: 20px;">
                         <button type="submit" class="btn btn-primary" id="act_sub_btn">Submit <i
                                   class="icon-arrow-right14 position-right"></i></button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true"
     role="dialog">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">Edit Task Type List</h6>
                    <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
               </div>

               <div class="modal-body">
                    <div id="complaint_model_data1"></div>
               </div>

          </div>
     </div>
</div>


<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
     $(document).ready(function () {
          $('#ScheduleForm').bootstrapValidator({
               message: 'This value is not valid',
               fields: {
                    schedule_type: {
                         validators: {
                              notEmpty: {
                                   message: 'Please Enter Task Type'
                              }
                         }
                    },
                    url: {
                         validators: {
                              notEmpty: {
                                   message: 'Please Enter URL'
                              }
                         }
                    },

                    fileup: {
                         validators: {
                              notEmpty: {
                                   message: 'Please Select Image for Home Page'
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
     $(document).ready(function (e) {
          $("#ScheduleForm").on('submit', (function (e) {
               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    //alert('invalid');
               } else {

                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                         url: "<?php echo base_url('admin/Master/add_schedule'); ?>",
                         type: "POST",
                         data: new FormData(this),
                         contentType: false,
                         cache: false,
                         processData: false,
                         success: function (data) {
                              $("#preview").hide();
                              $(function () {
                                   // new PNotify({
                                   //   title: 'Register Form',
                                   //   text: 'Added  Successfully',
                                   //   type: 'success'
                                   // });
                                   $("#Activity-Type").modal('hide');
                                   $("#successModalActivityTypeList").modal('show');
                              });

                              // setTimeout(function() {
                              //   window.location = "<?php echo base_url('admin/Master'); ?>";
                              // }, 1000);


                         },
                         error: function () {
                              // alert('fail');
                              $("#alertModal").modal('show');
                         }
                    });
               }
               return false;

          }));
     });
</script>



<!--=======================================  delete Event  ==========================================-->

<script>
     function del_client(id) {

          var notice = new PNotify({
               title: 'Confirmation',
               text: '<p>Are you sure you want to delete this Activity Type?</p>',
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
          notice.get().on('pnotify.confirm', function () {

               var datastring = 'scheduletid=' + id;
               //alert(datastring);
               $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/delete_schedule'); ?>",
                    cache: false,
                    data: datastring,
                    success: function (data) {
                         //alert(data);
                         $(function () {
                              new PNotify({
                                   title: 'Delete Form',
                                   text: 'Deleted successfully',
                                   type: 'success'
                              });
                         });

                         setTimeout(function () {
                              window.location = "<?php echo base_url('admin/Master'); ?>";
                         }, 1000);


                    },
                    error: function () {
                         alert('Error while request..');
                    }
               });
          })
          // On cancel
          notice.get().on('pnotify.cancel', function () {
               // alert('Oh ok. Chicken, I see.');
          });

     }
</script>


<script type="text/javascript">
     var url = "<?php echo base_url(); ?>";

     function delete (id) {
          var r = confirm("Do you want to delete this?")
          if (r == true)
               window.location = url + "user/deleteuser/" + id;
          else
               return false;
     }
</script>


<!--======================================= / Delete Event  ==========================================-->

<script>
     function edit_client(id) {
          var datastring = 'scheduleid=' + id;
          //alert(datastring);
          $.ajax({
               type: "post",
               url: "<?php echo base_url('admin/Master/edit_master'); ?>",
               cache: false,
               data: datastring,
               success: function (data) {
                    //alert(data);
                    $('#modal_default1').modal('show');
                    $('#complaint_model_data1').html(data);
                    $(".popover-body").css('display','none');
               },
               error: function () {
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

<script type="text/javascript">
     $(document).ready(function () {
          $('input[placeholder]').placeholderLabel();
     })
     $(document).ready(function () {
          $('textarea[placeholder]').placeholderLabel();
     })
</script>
<script type="text/javascript">
     var _gaq = _gaq || [];
     _gaq.push(['_setAccount', 'UA-36251023-1']);
     _gaq.push(['_setDomainName', 'jqueryscript.net']);
     _gaq.push(['_trackPageview']);

     (function () {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
     })();
</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
     function deactivate(id) {

          var notice = new PNotify({
               title: 'Confirmation',
               text: '<p>Are you sure you want to Inactive this Activity Type?</p>',
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
          notice.get().on('pnotify.confirm', function () {

               var datastring = 'scheduletid=' + id;
               // alert(datastring);
               $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function (data) {
                         // alert(data);
                         $(function () {
                              new PNotify({
                                   title: 'Confirmation Form',
                                   text: 'Inactive successfully',
                                   type: 'success'
                              });
                         });

                         setTimeout(function () {
                              window.location = "<?php echo base_url('admin/Master'); ?>";
                         }, 800);


                    },
                    error: function () {
                         alert('Error while request..');
                    }
               });
          })
          // On cancel
          notice.get().on('pnotify.cancel', function () {
               // alert('Oh ok. Chicken, I see.');
          });

     }
</script>

<script>
     function activate(id) {

          var notice = new PNotify({
               title: 'Confirmation',
               text: '<p>Are you sure you want to activate this Activity Type?</p>',
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
          notice.get().on('pnotify.confirm', function () {

               var datastring = 'scheduletid=' + id;
               // alert(datastring);
               $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Master/activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function (data) {
                         //alert(data);
                         $(function () {
                              new PNotify({
                                   title: 'Confirmation Form',
                                   text: 'Activated successfully',
                                   type: 'success'
                              });
                         });

                         setTimeout(function () {
                              window.location = "<?php echo base_url('admin/Master'); ?>";
                         }, 800);


                    },
                    error: function () {
                         alert('Error while request..');
                    }
               });
          })
          // On cancel
          notice.get().on('pnotify.cancel', function () {
               // alert('Oh ok. Chicken, I see.');
          });

     }
</script>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false"
     data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding:30px;">
               <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                    <h5 class="modal-title" id="alertModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!
                    </h5>
               </div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn" data-dismiss="modal"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="successModalActivityTypeList" tabindex="-1"
     aria-labelledby="successModalActivityTypeListLabel" data-keyboard="false" data-backdrop="static"
     style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding: 30px;">
               <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                    <h5 class="modal-title" id="successModalActivityTypeListLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-circle-check"
                              style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
               </div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Task Type Submited Successfully
               </div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
     data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
     <div class="modal-dialog modal-dialog-centered" style="width:400px">
          <div class="modal-content" style="padding: 30px">
               <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                    <h5 class="modal-title" id="confirmationModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-trash"
                              style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation
                    </h5>
               </div>
               <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Task Type?</div>
               <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletetasktypelistForm">
                         <input type="hidden" id="scheduletid" name="scheduletid" value="">
                         <button type="submit" class="btn"
                              style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;" >No</button>
               </div>
          </div>
     </div>
</div>
</div>

<div class="modal fade" id="deleteSucessModal" tabindex="-1" aria-labelledby="deleteSucessModalLabel"
     data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding: 30px;">
               <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                    <h5 class="modal-title" id="deleteSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5></div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel"
     data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding:30px;">
               <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                    <h5 class="modal-title" id="deleteErrorModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!
                    </h5>
               </div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn" data-dismiss="modal"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="deactivateconfirmationModal" tabindex="-1"
     aria-labelledby="deactivateconfirmationModalLabel" data-keyboard="false" data-backdrop="static"
     style=" padding-right: 15px;" aria-modal="true" role="dialog">
     <div class="modal-dialog modal-dialog-centered" style="width:400px">
          <div class="modal-content" style="padding: 30px">
               <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                    <h5 class="modal-title" id="deactivateconfirmationModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-toggle-on"
                              style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation
                    </h5>
               </div>
               <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Task Type?</div>
               <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deactivateForm">
                         <input type="hidden" id="scheduletid" name="scheduletid" value="">
                         <button type="submit" class="btn"
                              style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal"
                         style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
               </div>
          </div>
     </div>
</div>
</div>

<div class="modal fade" id="activateconfirmationModal" tabindex="-1" aria-labelledby="activateconfirmationModalLabel"
     data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
     <div class="modal-dialog modal-dialog-centered" style="width:400px">
          <div class="modal-content" style="padding: 30px">
               <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                    <h5 class="modal-title" id="activateconfirmationModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-toggle-on fa-rotate-180"
                              style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation
                    </h5>
               </div>
               <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Task Type?</div>
               <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="activateForm">
                         <input type="hidden" id="scheduletid" name="scheduletid" value="">
                         <button type="submit" class="btn"
                              style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal"
                         style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
               </div>
          </div>
     </div>
</div>
</div>

<div class="modal fade" id="deactivateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel"
     data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding: 30px;">
               <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                    <h5 class="modal-title" id="deactivateSucessModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-circle-check"
                              style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
               </div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Inactive successfully</div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel"
     data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" style="width:400px;">
          <div class="modal-content" style="padding: 30px;">
               <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                    <h5 class="modal-title" id="deactivateSucessModalLabel"
                         style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i
                              class="fa fa-circle-check"
                              style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
               </div>
               <div class="modal-body" style="font-size: 18px;text-align: center;">Active successfully</div>
               <div class="modal-footer" style="justify-content: center;">
                    <a href="<?php echo base_url('admin/Master'); ?>">
                         <button type="button" class="btn"
                              style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                    </a>
               </div>
          </div>
     </div>
</div>


<script>
     function DeleteList(element) {
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
     $(document).ready(function (e) {
          $("#deletetasktypelistForm").on('submit', (function (e) {
               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    // alert('invalid');
               }
               else {
                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    var datastring = $("#scheduletid").val();
                    $.ajax({
                         type: "post",
                         url: "<?php echo base_url('admin/Master/delete_schedule'); ?>",
                         cache: false,
                         data: { "scheduletid": datastring },
                         success: function (data) {
                              $(function () {
                                   $("deleteSucessModal").modal('show');
                              });

                              // setTimeout(function() {
                              //   window.location = "<?php echo base_url('admin/Master'); ?>";
                              // }, 1000);


                         },
                         error: function () {
                              // alert('Error while request..');
                              $("deleteErrorModal").modal('show');
                         }
                    });
               }

          }));
     });
</script>

<script>
     function deactivate(element) {
          var Id = element.getAttribute("data-id");
          $('#scheduletid').val(element.getAttribute("data-id"));
          $('#deactivateconfirmationModal').modal('show');
     };
     function activate(element) {
          var Id = element.getAttribute("data-id");
          $('#scheduletid').val(element.getAttribute("data-id"));
          $('#activateconfirmationModal').modal('show');
     };
</script>
<script>
     $(document).ready(function (e) {
          $("#deactivateForm").on('submit', (function (e) {

               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    // alert('invalid');
               }
               else {
                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    var datastring = $("#scheduletid").val();
                    $.ajax({
                         type: "post",
                         url: "<?php echo base_url('admin/Master/deactivate'); ?>",
                         cache: false,
                         data: { "scheduletid": datastring },
                         success: function (data) {
                              // alert(data);
                              $(function () {
                                   $("deactivateSucessModal").modal('show');
                              });

                              // setTimeout(function() {
                              //   window.location = "<?php echo base_url('admin/Master'); ?>";
                              // }, 1000);


                         },
                         error: function () {
                              // alert('Error while request..');
                              $("deleteErrorModal").modal('show');
                         }
                    });
               }

          }));
     });
</script>

<script>
     $(document).ready(function (e) {
          $("#activateForm").on('submit', (function (e) {

               //e.preventDefault();
               if (e.isDefaultPrevented()) {
                    // alert('invalid');
               }
               else {
                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    var datastring = $("#scheduletid").val();
                    $.ajax({
                         type: "post",
                         url: "<?php echo base_url('admin/Master/activate'); ?>",
                         cache: false,
                         data: { "scheduletid": datastring },
                         success: function (data) {
                              // alert(data);
                              $(function () {
                                   $("activateSucessModal").modal('show');
                              });

                              // setTimeout(function() {
                              //   window.location = "<?php echo base_url('admin/Master'); ?>";
                              // }, 1000);


                         },
                         error: function () {
                              // alert('Error while request..');
                              $("deleteErrorModal").modal('show');
                         }
                    });
               }

          }));
     });
</script>

<script>
     function chk_activity_type_list() {
          activity_type_list = $('#schedule_type').val();
          if (activity_type_list == '') {
               $('#error_activity_type_list').empty();
               // $('#error_emp_code').html('Employee Id is required');
               // $('#emp_id').focus();
          }
          else {
               $.ajax({
                    url: "<?php echo base_url('admin/Master/chk_activity_type_list'); ?>",
                    dataType: "html",
                    type: "POST",
                    data: { activity_type_list: activity_type_list },
                    success: function (data) {

                         if (data == 1) {
                              $('#error_activity_type_list').empty();
                              $('#error_activity_type_list').css('display', 'block');
                              $('#error_activity_type_list').html('Please add another activity type, this type is already created.');
                              $("#act_sub_btn").attr('disabled', true);
                              // $().(disabled="disabled")
                         }
                         else {
                              $('#error_activity_type_list').hide();
                         }
                    }
               });
          }
     }

</script>

<script>
     $(document).ready(function(){
          var rescheduleTable = $('#MyTaskTypeTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
     //    order: [[0, 'desc']],
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
       
     //    $(document).click(function (e) {
     //        if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
     //            $('.panel-button').popover('hide');
     //        }
     //    });
          $(document).click(function (e) {
               if ($(e.target).is('.close')) {
                    $('.panel-button').popover('hide');
               }
          });
});

</script>