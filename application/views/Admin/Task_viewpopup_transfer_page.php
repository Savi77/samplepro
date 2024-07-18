<?php $this->load->view('Admin/includes/n-header'); ?>

<style>
    .col-sm-2 {
        -ms-flex: 0 0 16.66667%;
        flex: 0 0 12.66667%;
        max-width: 12.66667%;
    }
    .billing{
        font-size: 14px;
        padding: 10px 50px;
    }
    table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
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
    #view_remark table th,#view_document table th{
        text-wrap:nowrap !important;
    }
</style>

<div class="content-wrapper">
        <!-- Content area -->
    <div class="content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <span class="span-py-10 white-text">View Task Details for <?= $get_details['ticket_no'];?></span>                           
                </div>
                <div>
                   
                    <div style="padding:20px;" class="row">
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['contact_person_name'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Resource Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['company_name'];?>" readonly>
                                        </div>
                                    </div>
                                    <?php
                                        $user_sess_type = $this->session->user_type;
                                        if ($this->session->user_type != "SA") {
                                            $emp_id = $this->session->id;
                                            $name_emp = $this->session->name;
                                        } else {
                                            $emp_id = '';
                                        }
                                    ?>
                                    <input type="hidden" class="form-control" id="user_type_session" value="<?= $user_sess_type ?>" readonly>
                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2" style="margin: 10px auto auto ;" for="Youtube">Product Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['product_name'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2" for="email" style="margin: 10px auto auto">Comments</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" rows="2" value ="<?= $get_details['issue'];?>" readonly>
                                            <!-- <textarea class="form-control" rows="1" value ="<?= $get_details['issue'];?>" readonly></textarea> -->
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Schedule Date</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                </span>
                                                <input type="text" class="form-control" value ="<?= $get_details['schedule_date'];?>" readonly>                                            
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Schedule Type</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['schedule_type'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Start Time</label>
                                        <div class="col-sm-4 clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" value ="<?= $get_details['start_time'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">End Time</label>
                                        <div class="col-sm-4 clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" value ="<?= $get_details['end_time'];?>" readonly>                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Priority</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['priority'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="Youtube">Status</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['status'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">User</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['users_ids'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="email">Reminder Before Time</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['reminder_before_time'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Notify By</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['notify_by_name'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="email">Notes</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" rows="2" value ="<?= $get_details['reminder_note'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 d-flex">
                                        <label class="control-label col-sm-2 m-auto" for="email">Recurring Interval </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" value ="<?= $get_details['interval'];?>" readonly>
                                        </div>
                                        <label class="control-label col-sm-2 m-auto" for="email">Recurring EOD</label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                    </span>
                                                    <input type="text" class="form-control" value ="<?= $get_details['recurring_eod'];?>" readonly>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- <div class="col-12 pl-3">
                                        <input type="checkbox" name="addReminder" class="checkboxchecked cursor-pointer" id="addReminder" value="1" >
                                        <label class="custom-control-label1" for="rbi_request" id="req_name_line">&nbsp;&nbsp;&nbsp; Add Reminder</label>
                                    </div> -->
                                    <!-- <div class="reminderSetting col-sm-12">
                                        <div class="row" style="padding:0 0 0 20px;"> -->
                                            <!-- <div class="form-group col-sm-12 d-flex">
                                                <label style="margin: 10px auto auto 10px;" class="control-label col-sm-2" for="email">User</label>
                                                <div class="col-sm-4" style="padding-left:0px;">
                                                    <input type="text" class="form-control" value ="<?= $get_details['users_ids'];?>" readonly>
                                                </div>
                                                <label class="control-label col-sm-2" style="margin: 10px auto auto;" for="email">Reminder Before Time</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" value ="<?= $get_details['reminder_before_time'];?>" readonly>
                                                </div>
                                            </div> -->


                                            <!-- <div class="form-group col-sm-6">
                                                
                                            </div> -->
                                            <!-- <div class="form-group col-sm-12 d-flex">
                                                <label class="control-label col-sm-2" for="email" style="margin: 10px auto auto 10px;">Notify By</label>
                                                <div class="col-sm-4" style="padding-left:0px;">
                                                    <input type="text" class="form-control" value ="<?= $get_details['notify_by_name'];?>" readonly>
                                                </div>
                                                <label class="control-label col-sm-2" style="margin:10px auto auto auto" for="email">Notes</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" rows="2" value ="<?= $get_details['reminder_note'];?>" readonly>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group col-sm-6">
                                                
                                            </div> -->
                                            <!-- <div class="form-group col-sm-12 d-flex">
                                                <label class="control-label col-sm-2" style="margin: 10px auto auto 10px;" for="email">Recurring <span style="color: red;">*</span></label>
                                                <div class="col-sm-10" style="padding-left:0px">
                                                    <select class="form-control" name="recurring_set" id="recurring_set_type3" onchange="showDataRecurring(this.value)" title="Select Recurring" data-placeholder="Select Recurring">
                                                        <option value="">Select Recurring</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <div class="recuuringData col-sm-12" style="clear:both;padding:0 0 0 20px;"> -->
                                        <!-- <div class="form-group col-sm-12 d-flex">
                                            <label class="control-label col-sm-2" for="email" style="padding-right:0;margin: 10px auto auto 10px;">Recurring Interval </label>
                                            <div class="col-sm-4" style="padding-left:0;">
                                                <input type="text" class="form-control" value ="<?= $get_details['interval'];?>" readonly>
                                            </div>
                                            <label class="control-label col-sm-2" for="email" style="margin: 10px auto auto">Recurring EOD</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                        </span>
                                                        <input type="text" class="form-control" value ="<?= $get_details['recurring_eod'];?>" readonly>
                                                    </div>
                                                </div>
                                        </div> -->
                                        <!-- <div class="form-group col-sm-6">
                                            
                                        </div>
                                    </div> -->
                                </div>



                </div>
            </div>




            <div class="card">
                <div class="card tab mt-3">
                <div class="col-sm-12">
        <div class="tabbable tab-content-bordered">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified border pl-3 pr-3">
                <li class="nav-item"><a href="#view_remark" class="nav-link active" data-toggle="tab">Remarks</a></li>
                <!-- <li class="nav-item"><a href="#view_photos" class="nav-link" data-toggle="tab">Photos</a></li> -->
                <li class="nav-item" <?= $UploadDocClass; ?>><a href="#view_document" class="nav-link" data-toggle="tab">Upload Documents</a></li>
                <li class="nav-item"><a href="#view_Billing" class="nav-link" data-toggle="tab">Billing</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane has-padding active" id="view_remark">
                    <div class="table-responsive">
                        <table class="table table-striped" style="border:1px solid #dddddd;">
                            <thead>
                                <tr>
                                    <th  style="width:35px;">Sr No.</th>
                                    <th>Resource Name</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                    <th>Timeline</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $cnt21 = 1;
                                foreach ($remark_list as $remark) {
                                ?>
                                    <tr>
                                        <td>
                                            <div>
                                                <?= $cnt21 ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;text-wrap:wrap;">
                                                <?= $remark['employee_name'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                                <?= ucwords($remark['status']); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;text-wrap:wrap;">
                                                <?= $remark['remark'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                                <?= date("d F Y H:ia", strtotime($remark['created_date'])); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $cnt21++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <!-- <div class="tab-pane has-padding" id="view_photos">
                    <div class="col-sm-12">
                        <form id="upload_doc_form_photo" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="schedule_query_id" id="schedule_query_id" value="<?= $query_id ?>">
                            <div class="panel panel-flat">
                                <div class="panel-body" style="padding: 5px;">
                                    <fieldset>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-md-offset-2 nopadding form-group">
                                                        <div class="input-group1">
                                                            <input type="file" class="form-control" name="PhotoUpload[]">
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="education_fields_photo"></div>
                                            </div>
                                        </div>
                                        
                                        <div align="right">
                                            <button type="submit" class="btn btn-primary">Upload Photo<i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <br />
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="row" style="padding: 15px;margin-right: 8px;">
                        <div class="col-md-12" style="max-height: 150px;overflow-y: scroll;">
                        <?php

                        foreach ($doc_list as $res) {
                            $document = $res->uploadfilename;
                            $file = $res->doc_name;
                            $extension = explode(".", $document);
                            $ext = $extension[1];
                            if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {

                        ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="thumbnail" style="border: 1px solid #d2c7c7; padding: 10px; margin-bottom: 10px;">
                                        <div class="thumb">
                                            <div align="left" style="margin-bottom: 10px; ">
                                                <i class=" icon-image3" style="font-size: 28px;">
                                                </i>
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <div class="media-heading">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h6 class="pull-left no-margin">
                                                            <span class="text-semibold" style= "word-wrap: break-word;"><?= $file; ?></span>
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
                </div> -->

                <div class="tab-pane has-padding" id="view_document">
                    <!-- <div class="col-sm-12">
                        <form id="upload_doc_form" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="schedule_query_id" id="schedule_query_id" value="<?= $get_details['query'];?>">
                            <div class="panel panel-flat">
                                <div class="panel-body" style="padding: 5px;">
                                    <fieldset>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-md-offset-2 nopadding form-group">
                                                        <div class="input-group">
                                                            <input type="file" class="form-control rmv-border-right" name="Document[]">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success rmv-border-left" type="button" onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="education_fields"></div>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <button type="submit" class="btn btn-primary">Upload Documents<i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <br />
                                </div>
                            </div>
                        </form>
                    </div> -->
                    
                    <div class="row" style="padding: 15px;margin-right: 8px;">
                        <div class="col-md-12" style="max-height: 150px;overflow-y: scroll;">
                        <?php
                        
                            // if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {
                            // } else {
                        ?>
                            <table class="table table-striped" style="border:1px solid #dddddd;">
                                <thead>
                                    <tr>
                                        <th style="width:35px;">Sr.No</th>
                                        <th>Document Name</th>
                                        <th style="width:150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count = 1;
                                    foreach ($doc_list as $res) {
                                        $document = $res->uploadfilename;
                                        $file = $res->doc_name;
                                        $extension = explode(".", $document);
                                        $ext = $extension[1];
                                        
                                ?>
                                    <tr>
                                        <td>
                                            <div>
                                                <?= $count;?>
                                            </div>
                                        </td> 
                                        <td>
                                            <div>
                                                <a style="color:#333333;" target="_blank" href="<?= base_url() ?>assets/admin/scheduledocuments/<?= $document; ?>"><b><?= $file;?></b></a>
                                            </div>
                                        </td> 
                                        <!-- <td>
                                            <a target="_blank" rel="tooltip" title="View File" href="<?= base_url() ?>assets/admin/scheduledocuments/<?= $document; ?>">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </td>  -->


                                        <td>
                                            <div>
                                                <ul class="pull-right dflex Padding-0 m-auto">
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
                                                                        <a  style="color:#333333;" target="_blank" href="<?= base_url() ?>assets/admin/scheduledocuments/<?= $document; ?>">
                                                                            <span class="status-mark position-left dot dot-blue"></span> View File
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
                                <!-- <div class="col-lg-4 col-sm-6">
                                    <div class="thumbnail" style="border: 1px solid #d2c7c7; padding: 10px; margin-bottom: 10px;">
                                        <div class="thumb">
                                            <div align="left" style="margin-bottom: 10px;">
                                                <i class=" icon-file-text3" style="font-size: 28px;">
                                                </i>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <div class="media-heading">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h6 class="pull-left no-margin">
                                                            <span class="text-semibold" style= "word-wrap: break-word;"><?= $file; ?></span>
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
                                </div> -->
                        <?php 
                        // }
                        ?>
                        </div>
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
                    <div class="col-sm-12">


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
                                <span class="label bg-danger billing" >Billing Not Yet Done.</span>
                            </div>

                        <?php } ?>


                    </div>
                </div>


            </div>
        </div>

    </div>
 
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() 
    {
        Documentvalidator = {
                row: '.col-md-8',
                validators: {
                    notEmpty: {
                        message: 'Please Upload Document'
                    }
                }
            },
            $('#upload_doc_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'Document[]': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) 
    {
        $("#upload_doc_form").on('submit', (function(e) 
        {
            //e.preventDefault();
           
            if (e.isDefaultPrevented()) {
               
            } else {
                

                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Customer/UploadScheduleDocument') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        PNotify.removeAll();
                        $("#preview_upload").hide();
                        // new PNotify({
                        //     title: 'Upload Document',
                        //     text: 'Document Uploaded Successfully !',
                        //     type: 'success'
                        // });
                        $("#UploadDocumentModal").modal('show');
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList') ?>";
                        // }, 2000);
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
    </script>

<script>
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();   
});
</script>



<div class="modal fade" id="UploadDocumentModal" tabindex="-1" aria-labelledby="UploadModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UploadModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Document Uploaded Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/Task_view_page?task_id='.$get_details["query"].'')?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/Task_view_page?task_id='.$get_details["query"].'')?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


    <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-none w-100">
    	<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
    		<i class="icon-unfold mr-2"></i>
    		Footer
    	</button>
    </div>

    <!-- <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            copyright © 2022.All Rights Reserved.
        </span>
    </div> -->
</div>
<!-- /footer -->

<div class="btn-to-top"><button type="button" class="btn btn-dark btn-icon rounded-pill"><i class="icon-arrow-up8"></i></button></div></div>

<script>

        $(document).ready(function () {

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

        $(document).click(function (e) {
            if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});
                    
</script>


<?php $this->load->view('Admin/includes/n-footer'); ?>