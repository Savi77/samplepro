			<div class="modal-header bg-info" style="background-color:#009FDF;">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title"><i class=" icon-drawer3"></i>&nbsp;&nbsp; <?= $remark_list[0]['ticket_no'] ?> <b>

			    </b></h4>
			</div>
			<?php
      // echo json_encode($user_permission);
      $UploadDataClass = 'style="display:table-cell";';

      foreach ($user_permission as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;
        if ($priviledge_key == 'UPLOADDOC') {
          if ($status == 1) {
            $UploadDataClass = ' style="display:table-cell"; ';
          } else {
            $UploadDataClass = ' style="display:none"; ';
          }
        }
      }
      ?>
			<div class="modal-body">
			  <div class="row">
			    <div class="tabbable tab-content-bordered">
			      <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
			        <li class="active"><a href="#view_remark" data-toggle="tab"><strong style="color: #0000009e;">Remarks</strong></a></li>
			        <li><a href="#view_photos" data-toggle="tab"><strong style="color: #0000009e;;">Photos</strong></a></li>
			        <li <?= $UploadDataClass; ?>><a href="#view_document" data-toggle="tab"><strong style="color: #0000009e;;">Documents</strong></a></li>
			        <li><a href="#view_Target" data-toggle="tab"><strong style="color: #0000009e;;">Target</strong></a></li>

			        <li><a href="#view_Billing" data-toggle="tab"><strong style="color: #0000009e;;">Billing</strong></a></li>

			      </ul>

			      <div class="tab-content">
			        <div class="tab-pane has-padding active" id="view_remark">
			          <table class="table table-bordered">
			            <tr>
			              <th>#</th>
			              <th>Employee Name</th>
			              <th>Status</th>
			              <th>Comments</th>
			              <th>Timeline</th>
			            </tr>
			            <tbody>
			              <?php
                    $cnt21 = 1;
                    foreach ($remark_list as $remark) {
                    ?>
			                <tr>
			                  <td><?= $cnt21 ?></td>
			                  <td><?= $remark['employee_name'] ?></td>
			                  <td><?= ucwords($remark['status']); ?></td>
			                  <td><?= $remark['remark'] ?></td>
			                  <td><?= date("d F, Y H:ia", strtotime($remark['created_date'])); ?></td>
			                </tr>
			              <?php $cnt21++;
                    } ?>
			            </tbody>
			          </table>
			        </div>

			        <div class="tab-pane has-padding" id="view_photos">
			          <div class="row">
			            <?php

                  foreach ($doc_list as $res) {
                    $document = $res->uploadfilename;
                    $file = $res->doc_name;
                    $extension = explode(".", $document);
                    $ext = $extension[1];
                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {

                  ?>
			                <div class="col-lg-4 col-sm-6">
			                  <div class="thumbnail" style="    border: 1px solid #d2c7c7;">
			                    <div class="thumb">
			                      <div align="left" style="margin-left: 32px;margin-top: 11px;">
			                        <i class=" icon-image3" style="font-size: 28px;">
			                        </i>
			                      </div>
			                    </div>

			                    <div class="caption">
			                      <div class="media-heading">
			                        <div class="row">
			                          <div class="col-md-8">
			                            <h6 class="pull-left no-margin">
			                              <span class="text-semibold"><?= $file; ?></span>
			                              <br />
			                              <span class="text-muted" style="font-size: 12px;">
			                                <?= date("d F, Y H:ia", strtotime($res->date_created)); ?>
			                              </span>
			                            </h6>
			                          </div>
			                          <div class="col-md-4">
			                            <ul class="icons-list pull-right">
			                              <li>
			                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/admin/scheduledocuments/<?= $document; ?>">
			                                  <i class="icon-download" style="color:#4FAD57;font-size: 20px;"></i>
			                                </a>
			                              </li>
			                            </ul>
			                          </div>
			                        </div>
			                      </div>

			                    </div>

			                  </div>
			                </div>
			            <?php }
                  } ?>
			          </div>
			        </div>

			        <div class="tab-pane has-padding" id="view_document" <?= $UploadDataClass; ?>>
			          <div class="row">
			            <?php
                  foreach ($doc_list as $res) {
                    $document = $res->uploadfilename;
                    $file = $res->doc_name;
                    $extension = explode(".", $document);
                    $ext = $extension[1];
                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {
                    } else {
                  ?>
			                <div class="col-lg-4 col-sm-6">
			                  <div class="thumbnail" style="    border: 1px solid #d2c7c7;">
			                    <div class="thumb">
			                      <div align="left" style="margin-left: 32px;margin-top: 11px;">
			                        <i class=" icon-file-text3" style="font-size: 28px;">
			                        </i>
			                      </div>
			                    </div>
			                    <div class="caption">
			                      <div class="media-heading">
			                        <div class="row">
			                          <div class="col-md-8">
			                            <h6 class="pull-left no-margin">
			                              <span class="text-semibold"><?= $file; ?></span>
			                              <br />
			                              <span class="text-muted" style="font-size: 12px;">
			                                <?= date("d F, Y H:ia", strtotime($res->date_created)); ?>
			                              </span>
			                            </h6>
			                          </div>
			                          <div class="col-md-4">
			                            <ul class="icons-list pull-right">
			                              <li>
			                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/admin/scheduledocuments/<?= $document; ?>">
			                                  <i class="icon-download" style="color:#4FAD57;font-size: 20px;"></i>
			                                </a>
			                              </li>
			                            </ul>
			                          </div>
			                        </div>
			                      </div>

			                    </div>

			                  </div>
			                </div>
			            <?php }
                  } ?>
			          </div>
			        </div>


			        <div class="tab-pane has-padding" id="view_Target">
			          <div class="row">
			            <?php $count = count($bill_list[0]);

                  if ($count > 0) {
                  ?>
			              <!-- <h3 style="margin-top: 3px;">Billing </h3> -->
			              <table class="table table-bordered">
			                <!-- <thead> -->
			                <tr>
			                  <!-- <th>Status</th> -->
			                  <th>#</th>
			                  <th width="20%">Target Type</th>
			                  <th width="10%">Amount</th>
			                  <th width="25%">Approved Amount</th>
			                  <th width="30%">Remark</th>
			                  <th width="25%">Date</th>
			                </tr>
			                <!-- </thead> -->
			                <tbody>
			                  <?php $count = count($bill_list[0]);
                        $cnt = 1;


                        for ($i = 0; $i < $count; $i++) { ?>
			                    <tr>
			                      <td class="heightsize"><?= $cnt ?></td>
			                      <td class="heightsize"><?= $bill_list[0][$i]['target_type'] ?></td>
			                      <td class="heightsize"><?= $bill_list[0][$i]['targettype_value'] ?></td>
			                      <td class="heightsize">
			                        <!-- <div class="row"> -->
			                        <input type="hidden" name="targettype_id" id="targettypeid_<?= $i ?>" value="<?= $bill_list[0][$i]['targettype_id'] ?>">

			                        <input type="hidden" name="achieveid" id="achieveid_<?= $i ?>" value="<?= $bill_list[0][$i]['id'] ?>">

			                        <?php
                              if (empty($bill_list[0][$i]['adm_approved_price'])) {
                                $btn_name = "Update";
                                $btn_color = "info";
                                $readonly = "";
                                $status = "update";
                                $title = "Update price";
                                $function_name = "update_price";
                              } else {
                                $btn_name = "Activate";
                                $btn_color = "warning";
                                $readonly = "readonly";
                                $status = "activate";
                                $title = "Activate for update price";
                                $function_name = "activate_price";
                              }
                              ?>
			                        <div class="col-md-6">
			                          <div class="form-group" style="width: 95px; margin-bottom: 4px;">
			                            <input type="text" class="form-control" <?= $readonly ?> name="adm_approved_price" id="admapprovedprice_<?= $i ?>" value="<?= $bill_list[0][$i]['adm_approved_price'] ?>" maxlength="15">
			                          </div>
			                        </div>
			                        <div class="col-md-3 activateupdate_<?= $i ?>" style="margin-left: 20px; margin-top: 8px;">
			                          <a data-toggle="tooltip" title="<?= $title ?>" data-placement="bottom" onclick="<?= $function_name ?>(this.id)" id="<?= $i ?>"><span class="label label-<?= $btn_color ?>"><?= $btn_name ?></span></a>
			                        </div>
			                        <div class="col-md-3 afteractivateupdate_<?= $i ?>" style="margin-left: 20px; display:none; margin-top: 8px;">
			                          <a data-toggle="tooltip" title="Update price" data-placement="bottom" onclick="update_price(this.id)" id="<?= $i ?>"><span class="label label-info">Update</span></a>
			                        </div>
			                      </td>
			                      <td><?= $bill_list['billing_remark'] ?></td>
			                      <td><?php echo date("d M Y", strtotime($bill_list['date_created'])); ?></td>
			                    </tr>
			                  <?php $cnt++;
                        } ?>
			                </tbody>
			              </table>
			            <?php } else { ?>
			              <div align="center">
			                <br>
			                <span class="label bg-danger" style="line-height: 20px; font-size: 20px; text-transform: none; padding: 2px 75px 2px 85px;">Target Billing Not Yet Done.</span>
			              </div>

			            <?php } ?>
			          </div>
			        </div>

			        <div class="tab-pane has-padding" id="view_Billing">
			          <div class="row">


			            <?php

                  $cnt121 = 1;
                  $count22 = count($target_list);
                  if ($count22 > 0) {
                  ?>
			              <!-- <h3 style="margin-top: 3px;">Billing </h3> -->
			              <table class="table table-bordered">
			                <!-- <thead style="display: none !important;"> -->
			                <tr>
			                  <th>#</th>
			                  <th>Billing Amount</th>
			                  <th>Billing Status</th>
			                  <th>Admin Approved Amount</th>
			                </tr>
			                <!-- </thead> -->
			                <tbody>

			                  <tr>
			                    <td class="">1</td>
			                    <td class=""><?= $target_list['billing_amount'] ?></td>
			                    <td class=""><?= $target_list['billing_status'] ?></td>
			                    <td class="">
			                      <!-- <div class="row"> -->
			                      <input type="hidden" name="achieve_id" id="achieve_id" value="<?= $target_list['achieve_id'] ?>">

			                      <?php if ($target_list['billing_app_amount'] > 0) {
                              $btn_name = "Update";
                              $btn_color = "info";
                              $readonly = "";
                              $status = "update";
                              $title = "Update price";
                              $function_name = "update_price2";
                            } else {
                              $btn_name = "Activate";
                              $btn_color = "warning";
                              $readonly = "readonly";
                              $status = "activate";
                              $title = "Activate for update price";
                              $function_name = "activate_price2";
                            }
                            ?>
			                      <div class="col-md-6">
			                        <div class="form-group" style="width: 95px; margin-bottom: 4px;">
			                          <input type="text" class="form-control" <?= $readonly ?> name="billing_app_amount" id="billing_app_amount" value="<?= $target_list['billing_app_amount'] ?>" maxlength="15">
			                        </div>
			                      </div>
			                      <div class="col-md-3 activateupdate2" style="margin-left: 20px; margin-top: 8px;">
			                        <a data-toggle="tooltip" title="<?= $title ?>" data-placement="bottom" onclick="<?= $function_name ?>(this.id)" id="<?= $target_list['achieve_id'] ?>"><span class="label label-<?= $btn_color ?>"><?= $btn_name ?></span></a>
			                      </div>
			                      <div class="col-md-3 afteractivateupdate2" style="margin-left: 20px; display:none; margin-top: 8px;">
			                        <a data-toggle="tooltip" title="Update price" data-placement="bottom" onclick="update_price2(this.id)" id="<?= $target_list['achieve_id'] ?>"><span class="label label-info">Update</span></a>
			                      </div>
			                    </td>

			                  </tr>
			                </tbody>
			              </table>
			            <?php } else { ?>
			              <div align="center">
			                <br>
			                <span class="label bg-danger" style="line-height: 20px; font-size: 20px; text-transform: none; padding: 2px 75px 2px 85px;">Billing Not Yet Done.</span>
			              </div>

			            <?php } ?>


			          </div>
			        </div>


			      </div>
			    </div>

			  </div>
			</div>


			<script>
			  function update_price2(value) {
			    // alert(value);
			    PNotify.removeAll();

			    var billing_app_amount = $('#billing_app_amount').val();
			    // var id = $('#bill_achieve_id').val();


			    var notice = new PNotify({
			      title: 'Confirmation',
			      text: '<p>Are you sure you want to Update the value ' + billing_app_amount + '</p>',
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
			      // var adm_approved_price = $('#adm_approved_price').val();
			      var datastring = 'achieve_id=' + value + '&billing_app_amount=' + billing_app_amount;
			      // alert(datastring);

			      $.ajax({
			        type: "post",
			        url: "<?php echo base_url('admin/Customer/update_price2'); ?>",
			        cache: false,
			        data: datastring,
			        success: function(data) {
			          // alert(data);
			          PNotify.removeAll();
			          // if (data==0)
			          // {
			          new PNotify({
			            title: 'Billing Amount Update',
			            text: 'updated successfully',
			            type: 'success'
			          });

			          // $('#bill_value').val(data);
			          // }
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

			  function activate_price2(value) {
			    // var lastid = value.split("_").pop();

			    var notice = new PNotify({
			      title: 'Confirmation',
			      text: '<p>Are you sure you want to activate for update value </p>',
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
			      document.getElementById("billing_app_amount").readOnly = false;
			      $(".activateupdate2").hide();
			      $(".afteractivateupdate2").show();

			    })
			    // On cancel
			    notice.get().on('pnotify.cancel', function() {
			      // alert('Oh ok. Chicken, I see.');
			    });
			  }
			</script>