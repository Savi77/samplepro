<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    .quotation li {
        margin-left: 20px;
        
    }
    table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .nav-item.tabs-nav-items{
        width: 20%;
    }
    .nav-item.tabs-nav-items a{
        text-align: center;
    }
    .nav-item.tabs-nav-items a.tablinks {
        justify-content: center;
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
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    #Quotation table td:nth-child(1) div a:hover{
        color: #605959 !important;
    }
    .status-btn{
        background: #009846;padding: 2px 10px;
        border-radius: 4px;color: #fff;
        text-align: left;
        font-size: 12px;
        border: 1px solid transparent;
        width:100px;
    }
    #AddAttachmentmodal .col-sm-6 input{
        padding: 4px !important;
    }
    .icon-drag-right{
        margin-right:0.5rem !important;
    }
    .modal{
        z-index: 1050 !important;
    }
    .pl-20{
        padding-left: 30px;
    }
    #Recent-Task table th,#Quotation table th,#view-details-document table th,#Lead-History table th{
        text-wrap:nowrap !important;
    }
    /* .select2-search__field{
        width: 532px !important;
    } */
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    
    @media screen and (max-width:1400px){
        .pl-20{
        padding-left: 20px;
    } 
    }
</style>
<!-- Main content -->
<div class="content-wrapper">
    <?php
        // echo json_encode($user_permission_lead);
        $CreateQutClassLead = 'style="display:block";';
        $EditClassLead = 'style="display:block";';
        $CovertToCtClassLead = 'style="display:block";';
        $TransferClassLead = 'style="display:block";';
        $ActivityClassLead = 'style="display:block";';
        $ShareClassLead = 'style="display:block";';
        $UploadClassLead = 'style="display:block";';
        $EditQutClassLead = 'style="display:block";';

        $CreateQutClassOpp = 'style="display:block";';
        $EditClassOpp = 'style="display:block";';
        $TransferClassOpp = 'style="display:block";';
        $ActivityClassOpp = 'style="display:block";';
        $ShareClassOpp = 'style="display:block";';
        $UploadClassOpp = 'style="display:block";';
        $EditQutClassOpp = 'style="display:block";';

        foreach ($user_permission_lead as $priviledge) {
            $priviledge_key = $priviledge->priviledge_key;
            $status = $priviledge->status;
            if ($priviledge_key == 'EDIT') {
                if ($status == 1) {
                    $EditClassLead = ' style="display:block"; ';
                } else {
                    $EditClassLead = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'CREATEQUOTATION') {
                // echo 11;
                if ($status == 1) {
                    $CreateQutClassLead = ' style="display:block"; ';
                } else {
                    $CreateQutClassLead = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'CONVERTCONTACT') {
                if ($status == 1) {
                    $CovertToCtClassLead = 'style="display:block"; ';
                } else {
                    $CovertToCtClassLead = 'style="display:none"; ';
                }
            }

            if ($priviledge_key == 'TRANSFERLEAD') {
                if ($status == 1) {
                    $TransferClassLead = 'style="display:block"; ';
                } else {
                    $TransferClassLead = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'ADDTASK') {
                if ($status == 1) {
                    $ActivityClassLead = 'style="display:block"; ';
                } else {
                    $ActivityClassLead = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'SHARE') {
                if ($status == 1) {
                    $ShareClassLead = 'style="display:block"; ';
                } else {
                    $ShareClassLead = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'UPLOADDOC') {
                if ($status == 1) {
                    $UploadClassLead = 'style="display:block"; ';
                } else {
                    $UploadClassLead = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'EDITQUOTATION') {
                if ($status == 1) {
                    $EditQutClassLead = 'style="display:block"; ';
                } else {
                    $EditQutClassLead = 'style="display:none"; ';
                }
            }
        }

        foreach ($user_permission_opp as $priviledgeOpp) {
            $priviledge_key = $priviledgeOpp->priviledge_key;
            $status = $priviledgeOpp->status;
            if ($priviledge_key == 'EDIT') {
                if ($status == 1) {
                    $EditClassOpp = ' style="display:block"; ';
                } else {
                    $EditClassOpp = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'CREATEQUOTATION') {
                // echo 11;
                if ($status == 1) {
                    $CreateQutClassOpp = ' style="display:block"; ';
                } else {
                    $CreateQutClassOpp = ' style="display:none"; ';
                }
            }

            if ($priviledge_key == 'TRANSFERLEAD') {
                if ($status == 1) {
                    $TransferClassOpp = 'style="display:block"; ';
                } else {
                    $TransferClassOpp = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'ADDTASK') {
                if ($status == 1) {
                    $ActivityClassOpp = 'style="display:block"; ';
                } else {
                    $ActivityClassOpp = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'SHARE') {
                if ($status == 1) {
                    $ShareClassOpp = 'style="display:block"; ';
                } else {
                    $ShareClassOpp = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'UPLOADDOC') {
                if ($status == 1) {
                    $UploadClassOpp = 'style="display:block"; ';
                } else {
                    $UploadClassOpp = 'style="display:none"; ';
                }
            }
            if ($priviledge_key == 'EDITQUOTATION') {
                if ($status == 1) {
                    $EditQutClassOpp = 'style="display:block"; ';
                } else {
                    $EditQutClassOpp = 'style="display:none"; ';
                }
            }
        }

    ?>
    <!-- Content area -->
    <div class="content">
        <div class="col-lg-12">
            <div class="card">
                <?php
               
                $taskparameter = 'leadopp_id=' . $lead_data['leadopp_id'] . '&GenerateID=' . $lead_data['lead_generate_id'] . '&tasktype=' . $lead_data['customer_type'];
                if ($lead_data['closure_date'] == '0000-00-00' || $lead_data['closure_date'] == '1970-01-01') {
                    $closure_date_display = "NA";
                } else {
                    $closure_date_display = date("d F, Y", strtotime($lead_data['closure_date']));
                }

                if ($lead_data['customer_type'] == 'Lead') {
                    $displaycontact = '';
                } else {
                    $displaycontact = 'display:none';
                }
                $assign_to = $lead_data['assign_to'];
                ?>
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <?php 
                        $l_o_id = $leadopp_id;
                        $lead_opp_gen_id = $this->db->select('lead_generate_id')->from('tbl_leads_opportunity')->where('leadopp_id',$l_o_id)->get()->row()->lead_generate_id;
                        if($lead_data['customer_type'] == 'Opportunity')
                        {
                            $type_name = 'Client Engagement';
                        }
                        else if($lead_data['customer_type'] == 'Lead')
                        {
                            $type_name = 'New Lead';
                        }
                    ?>
                    <span class="span-py-10 white-text">
                        <?= $type_name ?> Details for <?= $lead_opp_gen_id ?>
                    </span>
                    <input type="hidden" id="leadopp_id" name="leadopp_id" value="<?= $lead_data['leadopp_id'];?>">
                    <?php if ($lead_data['customer_type'] == 'Lead') {  ?>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 mr-2"></i>Action</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a onclick="create_quotation(this.id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $CreateQutClassLead ?> class="dropdown-item"><i class="icon-printer4"></i> Create New Quotation</a>

                            <a onclick="edit_lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $EditClassLead ?> class="dropdown-item"><i class="icon-pencil5"></i>Edit New Lead</a>
                            <?php
                            if($lead_data['is_convert'] == 0)
                            {
                            ?>
                                <a onclick="convert_to_contact(this)" data-id="<?= $lead_data['leadopp_id']; ?>" id="<?= $lead_data['leadopp_id']; ?>" <?= $CovertToCtClassLead; ?> class="dropdown-item"><i class="icon-user"></i>Convert to Contact</a>
                            <?php
                            }
                            else
                            {
                            ?>
                                <p class="dropdown-item" style="color:#7e7a7a"><i class="icon-user"></i>Converted As Contact</p>
                            <?php
                            }
                            ?>

                            <a onclick="Transfer_Lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $TransferClassLead ?> class="dropdown-item"><i class="icon-drag-right"></i> Transfer New Lead</a>

                            <a href="<?= base_url('admin/Customer/AddActivityTask') ?>?<?= $taskparameter ?>" <?= $ActivityClassLead ?> class="dropdown-item"><i class=" icon-clipboard6"></i>Add Task</a>

                            <a onclick="share_details(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $ShareClassLead ?> class="dropdown-item"><i class="icon-share3"></i>Share Details</a>

                            <!-- <div class="dropdown-divider"></div> -->
                            <a onclick="AddAttachment(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?> class="dropdown-item"><i class="icon-upload"></i>Upload Document</a> </span> </a>
                            <a onclick="AddNote(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?> class="dropdown-item"><i class="icon-upload"></i>Add Note</a> </span> </a>
                        </div>
                    <?php  } else { ?>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 mr-2"></i>Action</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a onclick="create_quotation(this.id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $CreateQutClassOpp; ?> class="dropdown-item"><i class="icon-printer4"></i> Create New Quotation</a>

                            <a onclick="edit_lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $EditClassOpp ?> class="dropdown-item"><i class="icon-pencil5"></i>Edit Client Engagement</a>

                            <a onclick="Transfer_Lead(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $TransferClassOpp ?> class="dropdown-item"><i class="icon-drag-right"></i> Transfer Client Engagement</a>

                            <a href="<?= base_url('admin/Customer/AddActivityTask') ?>?<?= $taskparameter ?>" <?= $ActivityClassOpp ?> class="dropdown-item"><i class=" icon-clipboard6"></i>Add Task</a>

                            <a onclick="share_details(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $ShareClassLead ?> class="dropdown-item"><i class="icon-share3"></i>Share Details</a>

                            <!-- <div class="dropdown-divider"></div> -->
                            <a onclick="AddAttachment(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?> class="dropdown-item"><i class="icon-upload"></i>Upload Document</a> </span> </a>

                            <a onclick="AddNote(id)" id="<?= $lead_data['leadopp_id']; ?>" <?= $UploadClassLead ?> class="dropdown-item"><i class="icon-upload"></i>Add Note</a> </span> </a>

                        </div>
                    <?php  } ?>
                </div>
                <!-- <?php
                echo "<pre>";
                print_r($lead_data);
                ?> -->

                <!-- <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                        </thead>
                        <tbody>
                            <tr> </tr>
                            <tr>
                                <td>Comapny Name</td>
                                <td><?= $lead_data['company_name']; ?></td>
                                <td>Interested In</td>
                                <td><?= $lead_data['prdsrv_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?= $lead_data['address']; ?></td>
                                <td>Source</td>
                                <td><?= $lead_data['source']; ?></td>
                            </tr>
                            <tr>
                                <td>Contact Person</td>
                                <td><?= $lead_data['contact_person_name1']; ?></td>
                                <td>Stage</td>
                                <td><?= $lead_data['stage']; ?></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td><?= $lead_data['phone_no']; ?></td>
                                <td>Expected Revenue</td>
                                <td><?= $lead_data['project_business_value']; ?></td>
                            </tr>
                            <tr>
                                <td>Email ID</td>
                                <td><?= $lead_data['email']; ?></td>
                                <td>Expected Closure Date</td>
                                <td><?= $closure_date_display; ?></td>
                            </tr>
                            <tr>
                                <td>Segment</td>
                                <td><?= $lead_data['business_name']; ?></td>
                                <td>Account Manager</td>
                                <td> <?= $lead_data['empname']; ?></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><?= $lead_data['type']; ?></td>
                                <td>TAG</td>
                                <td> <?= $lead_data['tag']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->



                <div style="padding:20px;" class="row">
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Company Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['company_name']; ?>" readonly>
                        </div>

                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Contact Person</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['contact_person_name1']; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Contact Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['phone_no']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Email ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Address</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['address']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Interested In</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['prdsrv_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Source</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" rows="2" value ="<?= $lead_data['source']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Stage</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['stage']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Business Segment</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['business_name']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Expected Closure Date</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $closure_date_display; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Expected Revenue</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['project_business_value']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Generated By</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['generated_by']?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Account Manager</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['empname']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="email"> Resourec Type</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $lead_data['type']; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 d-flex">
                        
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Tag</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" rows="2" value ="<?= $lead_data['tag']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Remark</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" rows="2" value ="<?= $lead_data['remarks'];?>" readonly>
                        </div>
                    </div>   

                    
                                   
                </div>




            </div>

            
            <div class="card">
                <div class="card tab mt-3">
                    <div class="col-lg-12">
                        <div class="card-body tabsbody">
                            <ul class="nav nav-tabs nav-tabs-solid border mobile-resposive padding-top">
                                <li class="nav-item tabs-nav-items"><a href="#Recent-Task" class="nav-link active tablinks" data-toggle="tab">Recent Task</a></li>
                                <li class="nav-item tabs-nav-items"><a href="#Quotation" class="nav-link tablinks" data-toggle="tab">Quotation</a></li>
                                <li class="nav-item tabs-nav-items"><a href="#view-details-document" class="nav-link tablinks" data-toggle="tab">Documents</a></li>
                                <li class="nav-item tabs-nav-items"><a href="#Lead-History" class="nav-link tablinks" data-toggle="tab"><?= $lead_data['type']; ?> History</a></li>
                                <li class="nav-item tabs-nav-items"><a href="#Note_list" class="nav-link tablinks" data-toggle="tab"><?= $lead_data['type']; ?> Note</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Recent-Task">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border:1px solid #dddddd">
                                        <thead>
                                            <tr>
                                                <th>Ticket No.</th>
                                                <th>Task</th>
                                                <th>Account Manager</th>
                                                <th>Creation Date Time</th>
                                                <th>Due Date Time</th>
                                                <th>Task Date Time</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            
                                            if(!empty($activity_data))
                                            {
                                                $count1 = 1;
                                            foreach ($activity_data as $result) {
                                               
                                                $taskstatus = $result['taskstatus'];
                                                if ($taskstatus == 'in_progress') {
                                                    $taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">In Progress</button>';
                                                } else if ($taskstatus == 'reschedule') {
                                                    $taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Reschedule</button>';
                                                } else if ($taskstatus == 'pending') {
                                                    $taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Pending</button>';
                                                } else if ($taskstatus == 'completed') {
                                                    $taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Completed</button>';
                                                } else if ($taskstatus == 'in_complete') {
                                                    $taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">In-Completed</button>';
                                                }
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a rel="tooltip" title="View Lead-Opportunity"onclick="show_activity_details(this.id)" id="<?= $result['schedule_id']; ?>" style="color:#333333;">
                                                            <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= substr($result['ticket_no'],2); ?></div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;text-wrap:wrap;">
                                                            <?= $result['type_name']; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;text-wrap:wrap;">
                                                            <?= $result['empname']; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($result['created_date'])) . '<br/> ' . date("h:i a", strtotime($result['created_date'])); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($result['assign_date'])) . '<br/> ' . date("h:i a", strtotime($result->assign_starttime)); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($result['statusdatetime'])) . '<br/> ' . date("h:i a", strtotime($result['statusdatetime'])); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= $taskstatus; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;text-wrap:wrap;">
                                                            <?= $result['issue']; ?>
                                                        </div>
                                                    </td>
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
                                                                                    <a onclick="show_activity_details(this.id)" id="<?= $result['schedule_id']; ?>" style="color:#333333;">
                                                                                        <span class="status-mark position-left dot dot-blue"></span> View Lead-Opportunity  
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
                                            <?php $count1++;
                                            } 
                                            }
                                            else
                                            {?>
                                                <tr>
                                                    <td style="background-color: #fff;" colspan="9"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="Quotation">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border:1px solid #dddddd">
                                        <thead>
                                            <tr>
                                                <th>Quotation ID</th>
                                                <th>Contact person</th>
                                                <th>Contact Number</th>
                                                <th>Email</th>
                                                <th>Created on</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                // $count1 = 1;
                                            if(!empty($quotation_detail_list))
                                            {
                                            foreach ($quotation_detail_list as  $row) {
                                                $quotation_id = $row->quotation_id;
                                                if ($row->quotation_status == 'won') {
                                                    $class = "success";
                                                } else if ($row->quotation_status == 'lost') {
                                                    $class = "danger";
                                                } else {
                                                    $class = "primary";
                                                }
                                            ?>
                                            <tr>
                                                <td>
                                                    <div style="width:120px;">
                                                        <a rel="tooltip" title="View Quotation" style="text-transform: uppercase;font-weight:600;color:#000;" href="<?= base_url("admin/Leads/ViewQuotation?qid=$quotation_id") ?>"><?= $row->quotation_number; ?></a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div style="width:150px;text-wrap:wrap;">
                                                        <?= $row->contact_person; ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div style="width:150px;">
                                                        <?= $row->contact_number; ?>                                                    
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="text-wrap-col" style="width:180px;text-wrap:wrap;">
                                                        <?= $row->email; ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div style="width:150px;">
                                                        <?= date("d F Y", strtotime($row->quotation_date)); ?>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div style="width:150px;">
                                                        <?= date("d F Y", strtotime($row->valid_till)); ?>
                                                    </div>
                                                </td>

                                                <?php
                                                    if($row->quotation_status == 'lost')
                                                    {
                                                        $lead_status = 'Lost';
                                                    }
                                                    else if($row->quotation_status == 'none')
                                                    {
                                                        $lead_status = 'None';
                                                    }
                                                    else if($row->quotation_status == 'won')
                                                    {
                                                        $lead_status = 'Won';
                                                    }
                                                ?>
                                                                            
                                                
                                                <td style= "position: relative;">
                                                    <div style="width:150px">
                                                        <ul class="pull-right dflex Padding-0 m-auto text-black">
                                                            <li>
                                                                <ul class="list list-unstyled" style="position:relative;">
                                                                    <li>
                                                                        <div>
                                                                            <div class="panel-button">
                                                                                <input type="button" title="Status Update" rel="tooltip" value="<?= $lead_status; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                                                                <a title="Status Update" rel="tooltip">
                                                                                    <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                                                                </a>
                                                                            </div>
                                                                            
                                                                            <div class="my-popover-content" style="display:none">
                                                                                <ul>
                                                                                    <li class="active">
                                                                                        <a onclick="addQutationStatus('lost',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">
                                                                                            <span class="status-mark position-left dot dot-red"></span> Lost
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a onclick="addQutationStatus('none',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">
                                                                                            <span class="status-mark position-left dot dot-yellow"></span> None
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a onclick="addQutationStatus('won',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">
                                                                                            <span class="status-mark position-left dot dot-blue"></span> Won
                                                                                        </a>
                                                                                    </li>
                                                                                </ul> 
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td> 

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
                                                                           
                                                                            <?php if ($lead_data['customer_type'] == 'Lead') {  ?>
                                                                                <li <?= $EditClassLead ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-green"></span> Edit Quotation  
                                                                                </a></li>
                                                                            <?php } else { ?>
                                                                                <li <?= $EditClassOpp ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-green"></span> Edit Quotation  
                                                                                </a></li>  
                                                                            <?php } ?>
                                                                            <li>
                                                                                <a href="<?= base_url("admin/Leads/QuotationPdf?qid=$quotation_id") ?>" target="_blank" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-red"></span> Download Quotation  
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="<?= base_url("admin/Leads/ViewQuotation?qid=$quotation_id") ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-blue"></span> View Quotation  
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a onclick="quotation_mail(this.id)" id="<?= $quotation_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-yellow"></span> Send Quotation 
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
                                            <?php } 
                                            }
                                            else
                                            {?>
                                            <tr>
                                                <td style="background-color: #fff;" colspan="9"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- <div class="col-lg-12">
                                    <?php

                                    foreach ($quotation_detail_list as  $row) {
                                        $quotation_id = $row->quotation_id;
                                        if ($row->quotation_status == 'won') {
                                            $class = "success";
                                        } else if ($row->quotation_status == 'lost') {
                                            $class = "danger";
                                        } else {
                                            $class = "primary";
                                        }
                                    ?> -->

                                        <!-- <div class="card border-left-3 border-left-success rounded-left-0 margin-top">
                                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                                <div class="col-sm-12 p-0">
                                                    <div class="row card-row">
                                                        <div class="col-md-6 width-40" align="left">
                                                            <h6><a href="#">#<?= $row->quotation_number; ?></a></h6>
                                                        </div>
                                                        <div class="col-md-6 width-40" align="right"> Contact Number : &nbsp;<?= $row->contact_number; ?> </div>
                                                    </div>
                                                    <div class="row card-row">
                                                        <div class="col-md-6 width-40" align="left"> Contact person : &nbsp;<?= $row->contact_person; ?> </div>
                                                        <div class="col-md-6 width-40" align="right"> Email : &nbsp;<?= $row->email; ?> </div>
                                                    </div>
                                                    <div class="row card-row">
                                                        <div class="col-md-6 width-40" align="left"> Created on : <?= date("d F, Y", strtotime($row->quotation_date)); ?> </div>
                                                        <div class="col-md-6 width-40" align="right" style="display:block" ;=""> Status :
                                                            <button type="button" class="<?= $class; ?>-btn activity-btn-text"><?= $row->quotation_status; ?></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center view-details-card-footer">
                                                        <ul class="my-0 py-0">
                                                            <li><i class="icon-alarm-check"></i>&nbsp;: &nbsp;<span class="text-semibold"> Due: <?= date("d F, Y", strtotime($row->valid_till)); ?></span></li>
                                                        </ul>
                                                        <ul class="pull-right dflex Padding-0 quotation">
                                                            <li <?= $QuotationStatusClassLead; ?>>
                                                                <div class="dropdown">
                                                                    <a class="btn  details-footer-btn" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-popup="tooltip" title="Quotation Status" data-placement="bottom" data-original-title="Quotation Status"><i class="icon-task"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                        <a class="dropdown-item" onclick="addQutationStatus('won',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">Won</a>
                                                                        <a class="dropdown-item" onclick="addQutationStatus('lost',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">Lost</a>
                                                                        <a class="dropdown-item" onclick="addQutationStatus('none',<?= $quotation_id; ?>,<?= $lead_data['leadopp_id']; ?>)">None</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php if ($lead_data['customer_type'] == 'Lead') {  ?>
                                                                <li <?= $EditClassLead ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="Edit Quotation" data-placement="bottom" data-original-title="Edit Quotation"><i class="icon-pencil5"></i></a></li>
                                                            <?php } else { ?>
                                                                <li <?= $EditClassOpp ?>><a onclick="edit_quotation_details(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="Edit Quotation" data-placement="bottom" data-original-title="Edit Quotation"><i class="icon-pencil5"></i></a></li>
                                                            <?php } ?>
                                                            <li>
                                                                <a href="<?= base_url("admin/Leads/QuotationPdf?qid=$quotation_id") ?>" target="_blank" data-popup="tooltip" title="Download Quotation" data-placement="bottom" data-original-title="Download Quotation"><i class=" icon-file-download2"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= base_url("admin/Leads/ViewQuotation?qid=$quotation_id") ?>" target="_blank" data-popup="tooltip" title="View Quotation" data-placement="bottom" data-original-title="View Quotation"><i class="icon-file-eye2"></i></a>
                                                            </li>

                                                            <li>
                                                                <a onclick="quotation_mail(this.id)" id="<?= $quotation_id; ?>" data-popup="tooltip" title="Send Email" data-placement="bottom" data-original-title="Send Email"><i class="icon-envelop4"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!-- <?php } ?>
                                </div> -->
                            </div>

                            <div class="tab-pane" id="view-details-document">
                                

                                <div class="table-responsive">
                                    <table class="table table-striped" style="border:1px solid #dddddd">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">Sr.No</th>
                                                <th>Document Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(!empty($document_data))
                                            {
                                            $count = 1;
                                            foreach ($document_data as $res) {
                                                $document = $res->uploadfilename;
                                                $file = $res->name;
                                                
                                        ?>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <?= $count;?>
                                                    </div>
                                                </td> 
                                                <td>
                                                    <a rel="tooltip" title="View Document" href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file; ?>">
                                                    <div style="width:500px;text-wrap:wrap;color:#333333;">
                                                        <b><?= $document; ?></b>
                                                    </div>
                                                    </a>
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
                                                                                <a href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-blue"></span> View File 
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <!-- <a onclick="delete_document(this.id)" id="<?= $res->document_id; ?>" style="color:#333333;"> -->
                                                                                <a onclick="Delete_document(this)" id="<?= $res->document_id; ?>" data-id="<?=  $res->document_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-red"></span> Delete File
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
                                        }
                                        else
                                        {?>
                                        <tr>
                                            <td style="background-color: #fff;" colspan="9"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>



                                    <!-- <div class="col-lg-4 col-sm-4 demo-file">
                                        <div class="demo-file-thumbnail">
                                            <div class="thumb">
                                                <div class="col-md-6">
                                                    <div align="left"> <i class=" icon-file-text3"> </i> </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                            <div class="caption">
                                                <div class="media-heading">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h6 class="pull-left no-margin"> <span class="text-semibold"><?= $document; ?></span> <br>
                                                                <span class="text-muted"> <?= date("d F Y H:ia", strtotime($res->datecreated)); ?> </span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <ul class="icons-list pull-right demo-icon">
                                                                <li>
                                                                    <a target="_blank" data-popup="tooltip" title="Download File" data-placement="bottom" data-original-title="Download File" href="<?= base_url() ?>assets/admin/leaddocuments/<?= $file; ?>">
                                                                        <i class="icon-download"></i>
                                                                    </a>
                                                                    <a onclick="delete_document(this.id)" id="<?= $res->document_id; ?>" data-popup="tooltip" title="Delete File" data-placement="bottom" data-original-title="Delete File"><i class="icon-trash padding-left"></i> </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </div>

                            <div class="tab-pane" id="Lead-History">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border:1px solid #dddddd">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Account Manager</th>
                                                <th>Contact Person</th>
                                                <th>Creation Date Time</th>
                                                <th>Contact No.</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Business Value</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($history_data))
                                            {
                                            $count = 1;
                                            foreach ($history_data as $res) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div style="width:35px;">
                                                            <?= $count; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a rel="tooltip" title="View History Details" onclick="show_history_details(this.id)" id="<?= $res->history_id; ?>" style="color:#333333;">
                                                            <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $res->empname; ?></div>
                                                        </a>
                                                        <!-- <div style="width:150px;text-wrap:wrap;">
                                                            <?= $res->empname; ?>
                                                        </div> -->
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;text-wrap:wrap;">
                                                            <?= $res->contact_person_name1; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= date("d F Y", strtotime($res->assign_datetime)); ?><br /><?= date("h:i a", strtotime($res->assign_datetime)); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= $res->phone_no; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-wrap-col" style="width:180px;text-wrap:wrap;">
                                                        <?= $res->email; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-wrap-col" style="width:150px;">
                                                            <?= $res->address; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;">
                                                            <?= $res->project_business_value; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width:150px;text-wrap:wrap;">
                                                            <?= $res->remarks; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $count++;
                                            } 
                                            }
                                            else
                                            {?>
                                            <tr>
                                                <td style="background-color: #fff;" colspan="9"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                                            </tr>
                                            <?php } ?>
                                            <tr class="d-none">
                                                <td>1</td>
                                                <td>24 June, 2021
                                                    08:32 pm</td>
                                                <td>Sameer Deokar</td>
                                                <td>Sunil Kamble</td>
                                                <td>+919657085965</td>
                                                <td>sunilkamble330@gmail.com</td>
                                                <td></td>
                                                <td>0</td>
                                                <td></td>
                                            </tr>
                                            <tr class="d-none">
                                                <td>2</td>
                                                <td>24 June, 2021
                                                    08:32 pm</td>
                                                <td>Sameer Deokar</td>
                                                <td>Sunil Kamble</td>
                                                <td>+919657085965</td>
                                                <td>sunilkamble330@gmail.com</td>
                                                <td></td>
                                                <td>0</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="Note_list">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border:1px solid #dddddd">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(!empty($note_data))
                                            {
                                            $count = 1;
                                            foreach ($note_data as $res_note) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div style="width:35px;">
                                                        <?= $count; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:150px;text-wrap:wrap;">
                                                        <?=$res_note->notes; ?>
                                                    </div>
                                                </td>
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
                                                                                <a onclick="edit_note(this.id)" id="<?= $res_note->note_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-green"></span> Edit Note
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a onclick="Delete_note(this)" id="<?= $res_note->note_id; ?>" data-id="<?=  $res_note->note_id; ?>" style="color:#333333;">
                                                                                    <span class="status-mark position-left dot dot-red"></span> Delete Note
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
                                        <?php $count ++ ;}
                                            }
                                            else
                                            {
                                        ?>
                                            <tr>
                                                <td style="background-color: #fff;" colspan="3"><p style="color: #f00 !important;font-size: 15px;font-weight: 500;margin-left;margin-left:44%;">No Data Available</p></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Admin/includes/n-footer'); ?>
    <!-- Start Popup -->

    <div id="modal_default" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" style="z-index:1050;overflow-x: hidden;
    overflow-y: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings"> 
                        Convert <?= $lead_opp_gen_id ?> To Contact </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="complaint_model_data">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Transfer_Lead" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php
            if($lead_data['customer_type'] == 'Opportunity')
            {
                $type_name = 'Client Engagement';
            }
            else if($lead_data['customer_type'] == 'Lead')
            {
                $type_name = 'New Lead';
            }
            ?>
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings"> Transfer <?= $type_name ?> For <?= $lead_opp_gen_id ?> </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="TransferLeadForm">
                        <input type="hidden" name="db_lead_id" id="db_lead_id">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-12" for="Youtube">Resource  <sup style="color: red">*</sup></label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="emp_id" id="tarsfer_emp_id" data-placeholder="Select Resource">
                                        <span class="caret"></span>
                                        <option value="">Select Employee</option>
                                        <?php
                                        foreach ($employee_list as $res) {
                                            if ($res->id != $assign_to) {
                                        ?>
                                                <option value="<?= $res->id ?>">
                                                    <?= $res->name; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="float-right mr-3">
                            <span id="preview31"></span>
                            <button type="submit" class="btn btn-primary">Transfer Lead-Opportunity <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="AddAttachmentmodal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Upload Document </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addform" enctype='multipart/form-data'>
                        <input type="hidden" name="attachment_lead_id" id="attachment_lead_id">
                        <div class="">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-success addButton mt-3">
                                                    <i class="icon-add"></i>
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                Choose File <span style="color: red;">*</span><input type="file" class="form-control" name="uploadfile[]">
                                            </div>
                                            <div class="col-sm-5">
                                                Remark <span style="color: red;">*</span><textarea placeholder="Enter Remark" class="form-control" name="fileremark[]" maxlength="150" rows="1" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group hide" id="bookTemplate">
                                    <div class="d-flex">
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-danger rmv-border-left removeButton" style="margin-top:20px">
                                                <i class=" icon-trash"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            Choose File <span style="color: red;">*</span><input type="file" class="form-control" name="uploadfile[]">
                                        </div>
                                        <div class="col-sm-5">
                                            Remark <span style="color: red;">*</span><textarea placeholder="Enter Remark" class="form-control" name="fileremark[]" maxlength="150" rows="1" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right mr-3">
                                <button type="submit" class="btn btn-primary btn-xs">Upload <i class="icon-arrow-right14 position-right"></i></button>
                                <span id="preview"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="AddNotemodal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Add Note </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addnote" enctype='multipart/form-data'>
                        <input type="hidden" name="note_lead_id" id="note_lead_id">
                        <div class="">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class="col-sm-12">
                                                Note <span style="color: red;">*</span><textarea placeholder="Enter Note" class="form-control" name="note" maxlength="150" rows="1" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right mr-3">
                                <button type="submit" class="btn btn-primary btn-xs">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                <span id="preview"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="create_quotation_modal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">                
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">New Quotation For <?= $lead_opp_gen_id ?> </h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <form class="form-vertical" id="add_new_form" method="POST">
                                    <input type="hidden" name="db_quotation_lead_id" id="db_quotation_lead_id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-filedset email">
                                                <legend class="field bulk-email">Basic Info</legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Customer Name  </label>
                                                            <div class="col-lg-8">
                                                            <input type="text" id="cust_company_name" class="form-control" value ="<?= $lead_data['company_name']; ?>" readonly>
                                                                <!-- <span ></span> -->
                                                            </div>
                                                        </div>

                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Contact Number  <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="quotation_contact_phone_no" name="contact_number" placeholder="Enter Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" readonly>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Email ID  <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="quotation_contact_email" name="email" placeholder="Enter Email ID" maxlength="40" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Quotation Number  <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="hidden" name="quote_custome_numner" id="quote_custome_numner" value="<?= $order_id; ?>">
                                                                <input type="text" class="form-control" name="quotation_number" placeholder="Enter Quotation Number" maxlength="100" value="<?= $performaGui; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Quotation Date  <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control add-activity-selectors rounded-right" name="quotation_date" id="quotation_date" placeholder="Enter Quotation Date" value="<?= date('d F, Y') ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Contact Person <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="quotation_contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50" readonly>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group d-flex mb-0">
                                                            <label class="control-label col-lg-4 m-auto">Validity  <sup style="color: red">*</sup></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control" name="validity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Validity" maxlength="2">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                            <fieldset class="form-filedset email top-margin">
                                                <legend class="field bulk-email">Quotation Subject</legend>
                                                <div class="col-sm-12">
                                                    <textarea name="quto_subject" id="quto_subject" class="form-control" maxlength="1000" rows="3" placeholder="Enter Quotation Subject"></textarea>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-filedset email top-margin">
                                            <!-- <i class="fa fa-life-ring position-left"></i>  -->
                                                <legend class="field bulk-email">Product Details</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <b class="text-center">Select Product</b> <sup style="color: red">*</sup>
                                                            </div>

                                                            <div class="col-md-2 nopadding">
                                                                <b class="text-center">Product Code</b>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <b class="text-center">Price</b>
                                                            </div>
                                                            <div class="col-md-1 nopadding">
                                                                <b class="text-center">Quantity</b> <sup style="color: red">*</sup>
                                                            </div>
                                                            <div class="col-md-2 nopadding">
                                                                <b class="text-center">Discount in %-Flat</b>
                                                            </div>
                                                            

                                                            <div class="col-md-1 nopadding">
                                                                <b class="text-center">CGST %</b>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <b class="text-center">SGST %</b>
                                                            </div>

                                                            <div class="col-md-2 nopadding">
                                                                <b class="text-center">Total</b>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top: 1%;">
                                                        <div class="row">
                                                            <input type="hidden" name="cgstvalue[]" id="cgstvalue_0" readonly />
                                                            <input type="hidden" name="sgstvalue[]" id="sgstvalue_0" readonly />
                                                            <input type="hidden" name="subtotal[]" id="subtotal_0" readonly />
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <select class="form-control addSelect" name="product_id[]" id="productid_0" onchange="get_product_details(this.id)" data-placeholder="Select Product">
                                                                        <option value="">Select Product</option>
                                                                        <?php
                                                                        foreach ($product_list as  $row2) {
                                                                        ?>
                                                                            <option value="<?= $row2->prd_srv_id; ?>">
                                                                                <?= $row2->prdsrv_name; ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="productcode[]" placeholder="Product Code" id="productcode_0" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="price[]" id="productprice_0" placeholder="Price" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="quantity[]" placeholder="Enter Quantity" id="quantity_0" onkeyup="calculate_total(this.id)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="discount[]" id="discount_0" placeholder="Discount in %-Flat" onkeyup="calculate_discount(this.id)" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="cgst[]" id="cgst_0" placeholder="CGST %" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 nopadding">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="sgst[]" id="sgst_0" placeholder="SGST  %" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 nopadding">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input class="form-control rmv-border-rigth" name="total[]" type="text" id="total_0" placeholder="Total">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-success rmv-border-left" type="button" onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="col-sm-12 p-0">
                                                            <textarea class="form-control" name="desctiption[]" id="desctiption_0" rows="2" maxlength="250" placeholder="Enter desctiption"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id="education_fields"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset class="form-filedset email top-margin">
                                                <legend class="field bulk-email">
                                                    <!-- <i class="icon-clipboard6 position-left"></i> -->
                                                    Section
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="col-md-2 m-auto" style="flex: 0 0 12.66667%;max-width: 12.66667%;">Select Section  <sup style="color: red">*</sup></label>
                                                            <select class="form-control col-md-12" name="section_id" onchange="get_section(this.value)" data-placeholder="Select Section" id="section_id_1">
                                                                <option value="">Select Section</option>
                                                                <?php foreach ($getAllSection as  $row6) {  ?>
                                                                    <option value="<?= $row6->section_id; ?>"><?= $row6->section_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 25px;">
                                                        <div id="section_data"></div>
                                                    </div>
                                                </div>
                                                
                                            </fieldset>

                                            <div class="form-group">
                                                <div class="col-sm-12 pr-3" style="text-align:right;">
                                                    <span id="preview_quotation"></span>
                                                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_quotation_modal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Edit Quotation For <?= $lead_opp_gen_id ?> </h6>
                    <button type="button" class="close" onclick="updateUI_edit_quotation_button_close()" id="edit_quotation_button_close">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="edit_quotation_view">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_note_modal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Edit Note </h6>
                    <button type="button" class="close" onclick="updateUI_edit_note_button_close()" id="edit_note_button_close">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="edit_note_view">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="quotation_mail" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings"> 
                        Send Quotation Of <?= $lead_opp_gen_id ?> </h6>
                    <button type="button" class="close" onclick="updateUI_quotation_mail_button_close()" id="quotation_mail_button_close">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="SendQuotationForm" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-2" for="To">To <sup style="color: red">*</sup></label>
                                <div class="col-sm-12">
                                    <input type="text" name="to_mail" id="to_mail" class="form-control" placeholder="To Mail Address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-2" for="CC">CC </label>
                                <div class="col-sm-12">
                                    <input type="hidden" name="quotation_id" id="quotation_id_mail">
                                    <input type="text" name="cc_mail" id="cc_mail" class="form-control" placeholder="CC: Mail Address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-2" for="BCC">BCC </label>
                                <div class="col-sm-12">
                                    <input type="text" name="bcc_mail" id="bcc_mail" class="form-control" placeholder="BCC: Mail Address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-2" for="Subject">Subject <sup style="color: red">*</sup></label>
                                <div class="col-sm-12">
                                    <input type="text" name="email_subject" id="email_subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-sm-3" for="Subject">Email Draft </label>
                                <div class="col-sm-12">
                                    <textarea name="email_draft" id="email_draft" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <br />
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="margin-right:20px;">Send Quotation <i class="icon-arrow-right14 position-right"></i></button>
                            <span id="preview313"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="googlemapmodal2" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings"> 
                        Search Google Address </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input id="pac-input2" type="text" placeholder="Search by locality, landmark, or customer, Society location" class="form-control" type="text" autocomplete="off" style="border-bottom: 1px solid #009FDF !important;" />
                        <div class="col-sm-12" id="googleMap2" style="width:95%;height:300px; margin-left: 17px; margin-bottom: 6px; border: 2px solid #009FDF;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="show_activity" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="show_activity_details">

            </div>
        </div>
    </div>

    <div id="editmodal" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="Lead_edit">

            </div>product_id
        </div>
    </div>

    <div id="show_history" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="show_history_details">

            </div>
        </div>
    </div>

    <div id="interest_model" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">
                        Share Details of <?= $lead_opp_gen_id ?> </h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="share_form" method="post">
                        <input type="hidden" name="share_db_lead_id" id="share_db_lead_id">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <fieldset1>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Select Resource <span style="color: red;">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" multiple name="emp_id[]" id="emp_id_multiple" data-placeholder="Select Resource" style="width:532px;">

                                                    <!-- <select class="form-control" name="emp_id[]" id="emp_id_multiple1" data-placeholder="Select Resource" multiple> -->
                                                    <!-- <select name="emp_id[]" id="emp_id_multiple" data-placeholder="Select Employee" multiple > -->
                                                       
                                                       <?php
                                                        foreach ($employee_list as $value1) {
                                                        ?>
                                                            <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small id="emp_id_error" style="color: red;display:none;">Please Select Resource</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset1>

                                <div class="float-right">
                                    <span id="share_preview"></span>
                                    <button type="submit" class="btn btn-primary" id = "share_sub_btn">Share Details <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popup -->

    <script type="text/javascript">
        $('#emp_id_multiple').select2({
            dropdownParent: $('#interest_model'),
            placeholder: "Select Resource"
            // allowClear: true
        });
        $('#tarsfer_emp_id').select2({
            dropdownParent: $('#Transfer_Lead')
        });

        $("#quotation_date").on("dp.change", function(e) {
            $('#add_new_form').bootstrapValidator('revalidateField', 'quotation_date');
        });
        $(document).ready(function() {
            $('#email_draft').summernote();
        });
        
        

        function addQutationStatus(status, id, lead_id) {
            var datastring = 'status=' + status + '&id=' + id + '&lead_id=' + lead_id;
            $.ajax({
                url: "<?php echo base_url('admin/Leads/addQutationStatus'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    PNotify.removeAll();
                    if (data == 0) {
                        // new PNotify({
                        //     title: 'Qutation Status',
                        //     text: 'Alrady Quotation Status Added Won!',
                        //     type: 'error'
                        // });
                        // setTimeout(function() {
                        //     location.reload(true);
                        // }, 1500);
                        $('#successquotationstatusalreadyModal').modal('show');
                        $(".popover-body").css('display','none');
                    } else {
                        // new PNotify({
                        //     title: 'Qutation Status',
                        //     text: 'Quotation Status Added Successfully!',
                        //     type: 'success'
                        // });
                        // setTimeout(function() {
                        //     location.reload(true);
                        // }, 1500);
                        $('#successquotationstatusModal').modal('show');
                        $(".popover-body").css('display','none');
                    }
                },
                error: function() {
                    alert('Fail');
                }
            });
        }
        // function updateUI_addQutationStatus_button_close()
        // {
        //     $(".popover-body").css('display','block');
        //     $('#addQutationStatus_button_close').attr('data-dismiss', 'modal');
        // }

    </script>

    <script type="text/javascript">
        $(function() {
            $('#quotation_date').datetimepicker({
                format: 'DD MMMM, YYYY',
                maxDate: 'now',
                useCurrent: true
            });
        });
    </script>

    <script type="text/javascript">
        function get_section(section_id) {
            var datastring = 'section_id=' + section_id;
            // alert(datastring);
            $.ajax({
                url: '<?php echo base_url('admin/Leads/get_section') ?>',
                type: "POST",
                data: datastring,
                success: function(data) {
                    $('#section_data').html(data);
                    $('#section_content').summernote();
                },
                error: function() {
                    alert('fail');
                }
            });
        }

        // function get_terms_list(termsfor) {
        //   var datastring = 'termsfor=' + termsfor;
        //   // alert(datastring);
        //   $.ajax({
        //     url: '<?php echo base_url('admin/Leads/get_terms_list') ?>',
        //     type: "POST",
        //     data: datastring,
        //     success: function(data) {
        //       // alert(data);
        //       $("#termslist").html(data);
        //       $("#add_term_button").show();

        //     },
        //     error: function() {
        //       alert('fail');
        //     }
        //   });
        // }

        function edit_quotation_details(quotation_id) {
            var datastring = 'quotation_id=' + quotation_id;
            // alert(datastring);
            $.ajax({
                url: '<?php echo base_url('admin/Leads/edit_quotation_details') ?>',
                type: "POST",
                data: datastring,
                success: function(data) {
                    $("#edit_quotation_view").html(data);
                    $("#edit_quotation_modal").modal('show');
                    // $("#edit_quotation_id").val(quotation_id);
                    $(".popover-body").css('display','none');

                },
                error: function() {
                    alert('fail');
                }
            });
        }
        function updateUI_edit_quotation_button_close()
        {
            $(".popover-body").css('display','block');
            $('#edit_quotation_button_close').attr('data-dismiss', 'modal');
        }
    </script>



    <script type="text/javascript">
        function quotation_mail(quotation_id) {
            var datastring = 'quotation_id=' + quotation_id;
            // alert(datastring);
            $.ajax({
                url: '<?php echo base_url('admin/Leads/quotation_mail') ?>',
                type: "POST",
                data: datastring,
                success: function(data) {
                    $('#email_draft').summernote();
                    response = JSON.parse(data);
                    $("#quotation_id_mail").val(quotation_id);
                    $("#to_mail").val(response.email_id);
                    $("#email_subject").val(response.quotation_id);
                    $("#quotation_mail").modal('show');
                    $(".popover-body").css('display','none');
                },
                error: function() {
                    alert('fail');
                }
            });
        }
        function updateUI_quotation_mail_button_close()
        {
            $(".popover-body").css('display','block');
            $('#quotation_mail_button_close').attr('data-dismiss', 'modal');
        }
    </script>

    <script type="text/javascript">
        var room_term = 431;

        function add_terms_fields() {
            room_term++;
            var objTo = document.getElementById('termslist')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass1" + room_term);
            var rdiv = 'removeclass1' + room_term;
            divtest.innerHTML = '<div class="row"> <div class="col-md-12"> <div class="col-md-11"><div class="form-group"><textarea class="form-control" name="terms[]" rows="1"></textarea></div></div><div class="col-md-1 nopadding"><div class="form-group "><div class="input-group"><div class="input-group-btn"><button class="btn btn-danger rmv-border-left" type="button" onclick="remove_terms_fields(' + room_term + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div></div>';
            objTo.appendChild(divtest)

        }

        function remove_terms_fields(rid) {
            $('.removeclass1' + rid).remove();
        }

        var edit_room_term = 1431;

        function edit_add_terms_fields() {
            edit_room_term++;
            var objTo = document.getElementById('edit_termslist')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass21" + edit_room_term);
            var rdiv = 'removeclass1' + edit_room_term;
            divtest.innerHTML = '<div class="row"> <div class="col-md-12"> <div class="col-md-11"><div class="form-group"><textarea class="form-control" name="terms[]" rows="1"></textarea></div></div><div class="col-md-1 nopadding"><div class="form-group "><div class="input-group"><div class="input-group-btn"><button class="btn btn-danger rmv-border-left" type="button" onclick="edit_remove_terms_fields(' + edit_room_term + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div></div>';
            objTo.appendChild(divtest)
        }

        function edit_remove_terms_fields(rid) {
            $('.removeclass21' + rid).remove();
        }
    </script>

    <script type="text/javascript">
        var room = 1;

        function education_fields() {
            
            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<div class="row" style="margin-top:1%"><input  type="hidden"  name="cgstvalue[]"  id="cgstvalue_' + room + '"  readonly /><input  type="hidden" name="sgstvalue[]" readonly  id="sgstvalue_' + room + '" /><input  type="hidden" name="subtotal[]"  id="subtotal_' + room + '" readonly  /> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control addSelect" data-placeholder="Select Product" id="productid_' + room + '" name="product_id[]"  onchange="get_product_details(this.id)"><option value=""> Select Product</option><?php foreach ($product_list as  $row2) { ?><option value="<?= $row2->prd_srv_id; ?>"><?= $row2->prdsrv_name; ?></option><?php } ?></select> </div></div>  <div class="col-md-2 nopadding"><div class="form-group"><input  type="text" class="form-control" name="productcode[]"   placeholder="Product Code"  id="productcode_' + room + '" readonly  /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="price[]"  id="productprice_' + room + '"  placeholder="Price" /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="quantity[]" placeholder="Quantity" onkeyup="calculate_total(this.id)" id="quantity_' + room + '"   /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control" name="discount[]" id="discount_' + room + '" placeholder="Discount in %-Flat" onkeyup="calculate_discount(this.id)" /></div></div>  <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="cgst[]"  id="cgst_' + room + '"   placeholder="CGST  %"  readonly /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="sgst[]"  id="sgst_' + room + '" placeholder="SGST  %"  readonly /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><div class="input-group"> <input class="form-control rmv-border-right" name="total[]" placeholder="Total" type="text"  id="total_' + room + '"  >  <div class="input-group-btn"> <button class="btn btn-danger rmv-border-left" type="button" onclick="remove_education_fields(' + room + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div><div class="clear"></div></div><div class="col-sm-12" ><div><textarea class="form-control" name="desctiption[]" id="desctiption_' + room + '" rows="2" maxlength="250" placeholder="Enter desctiption"></textarea></div></div></div>';
            objTo.appendChild(divtest)

            $('.addSelect').select2({
                    dropdownParent: $("#create_quotation_modal")
                });

            $('#add_new_form').bootstrapValidator('addField', 'productid[]');
            $('#add_new_form').bootstrapValidator('addField', 'quantity[]');
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }
    </script>

    <script>
        // $(document).ready(function() {
        brandvalidator = {
                row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: ' Please Select Product'
                    }
                }
            },
            quantityvalidator = {
                row: '.col-md-3',
                validators: {
                    notEmpty: {
                        message: ' Please Enter Quantity'
                    }
                }
            },
            bookIndex = 0;

        $('#add_new_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'productid[]': brandvalidator,
                    'quantity[]': quantityvalidator,
                    quotation_number: {
                        validators: {
                            notEmpty: {
                                message: 'Quotation Number is required'
                            }
                        }
                    },
                    quotation_date: {
                        validators: {
                            notEmpty: {
                                message: 'Quotation date is required'
                            }
                        }
                    },
                    termsfor1: {
                        validators: {
                            notEmpty: {
                                message: 'Select Term for is required'
                            }
                        }
                    },

                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required.'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Enter valid email address'
                            }
                        }
                    },

                    validity: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Validity'
                            }
                        }
                    },
                    section_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Section'
                            }
                        }
                    }
                }
            })
            // Add button click handler
            .on('click', '.addButton', function() {})
            // Remove button click handler
            .on('click', '.removeButton', function() {});
        // });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#add_new_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview_quotation").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#preview_quotation").show();
                    $.ajax({
                        url: '<?php echo base_url('admin/Leads/AddQuotation') ?>',
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // alert(data);
                            PNotify.removeAll();
                            $("#preview_quotation").hide();
                            // new PNotify({
                            //     title: 'Create New Quotation',
                            //     text: 'Quotation Created Successfully !',
                            //     type: 'success'
                            // });
                            $("#create_quotation_modal").modal('hide');
                            $('#successquotationModal').modal('show');
                            // setTimeout(function() {
                            //     location.reload(true);
                            // }, 1500);
                        },
                        error: function() {
                            //alert('fail');
                            $('#failModal').modal('show');
                        }
                    });
                }
                return false;
            }));
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>

    <script type="text/javascript">
        function get_product_details(id) {
            var productid = $("#" + id).val();
            var myStringArray = id.split('_');
            var index = myStringArray[1];
            var datastring = 'productid=' + productid;
            // alert(datastring);
            $.ajax({
                url: '<?= base_url('admin/Leads/get_product_details') ?>',
                type: "POST",
                data: datastring,
                success: function(data) {
                    var json = $.trim(data);
                    // alert(json);
                    const obj = JSON.parse(json);
                    $("#productcode_" + index).val(obj.product_code);
                    $("#sgst_" + index).val(obj.sgst_tax);
                    $("#cgst_" + index).val(obj.cgst_tax);
                    $("#productprice_" + index).val(obj.price);
                    $("#desctiption_" + index).val(obj.prdsrv_description);
                },
                error: function() {
                    alert('fail');
                }
            });
        }

        function calculate_discount(id) {

            var discount = $("#" + id).val();
            var myStringArray = id.split('_');
            var index = myStringArray[1];
            var purchaserate = $("#productprice_" + index).val();
            var quantity = $("#quantity_" + index).val();
            // console.log(discount);
            if (discount != '') {
                if (discount.includes("%") == true) {
                    var discountNumber = removePer(discount);
                    var discount_value = (purchaserate * discountNumber / 100);
                    var preTotal = purchaserate - discount_value;
                    var total = quantity * preTotal;
                } else {
                    // var preTotal = purchaserate - discount;
                    var total = quantity * purchaserate - discount;
                }
            } else {
                var total = quantity * purchaserate;
            }
            // console.log(total);
            var cgst = $("#cgst_" + index).val();
            var sgst = $("#sgst_" + index).val();
            var cgst_value = (total * cgst / 100);
            var sgst_value = (total * sgst / 100);
            var final_total = cgst_value + sgst_value + total;

            $("#cgstvalue_" + index).val(cgst_value);
            $("#sgstvalue_" + index).val(sgst_value);
            $("#subtotal_" + index).val(total);
            $("#total_" + index).val(final_total);
        }

        function calculate_total(id) {

            var quantity = $("#" + id).val();
            var myStringArray = id.split('_');
            var index = myStringArray[1];
            var purchaserate = $("#productprice_" + index).val();
            var discount = $("#discount_" + index).val();
            // console.log(discount);
            if (discount != '') {
                if (discount.includes("%") == true) {
                    var discountNumber = removePer(discount);
                    var discount_value = (purchaserate * discountNumber / 100);
                    var preTotal = purchaserate - discount_value;
                    var total = quantity * preTotal;
                } else {
                    // var preTotal = purchaserate - discount;
                    var total = quantity * purchaserate - discount;
                }
            } else {
                var total = quantity * purchaserate;
            }
            // console.log(total);
            var cgst = $("#cgst_" + index).val();
            var sgst = $("#sgst_" + index).val();
            var cgst_value = (total * cgst / 100);
            var sgst_value = (total * sgst / 100);
            var final_total = cgst_value + sgst_value + total;

            $("#cgstvalue_" + index).val(cgst_value);
            $("#sgstvalue_" + index).val(sgst_value);
            $("#subtotal_" + index).val(total);
            $("#total_" + index).val(final_total);
        }

        function removePer(str) {
            while (str.search("%") >= 0) {
                str = (str + "").replace('%', '');
            }
            return str;
        };

        function Transfer_Lead(lead_id) {
            $("#db_lead_id").val(lead_id);
            $("#Transfer_Lead").modal('show');
        }

        function share_details(lead_id) {
            $("#share_db_lead_id").val(lead_id);
            $("#interest_model").modal('show');
        }



        function create_quotation(lead_id) {
            var datastring = 'lead_id=' + lead_id;
            // alert(datastring);
            $.ajax({
                url: '<?= base_url('admin/Leads/get_lead_details') ?>',
                type: "POST",
                data: datastring,
                success: function(data) {
                    $("#db_quotation_lead_id").val(lead_id);
                    var json = $.trim(data);
                    const obj = JSON.parse(json);
                    $("#quotation_contact_person").val(obj.contact_person_name1);
                    $("#quotation_contact_phone_no").val(obj.phone_no);
                    $("#quotation_contact_email").val(obj.email);
                    $("#cust_company_name").html(obj.company_name);
                    $("#create_quotation_modal").modal();
                },
                error: function() {
                    alert('fail');
                }
            });
        }

        function AddAttachment(lead_id) {
            // alert(lead_id);
            $("#attachment_lead_id").val(lead_id);
            $("#AddAttachmentmodal").modal({
                backdrop: 'static',
                keyboard: false
            });
        }

        function AddNote(lead_id)
        {
            $("#note_lead_id").val(lead_id);
            // $("#AddNotemodal").modal({
            //     backdrop: 'static',
            //     keyboard: false
            // });
            $("#AddNotemodal").modal('show');
        }

        function edit_lead(leadopp_id) {

            var datastring = 'leadopp_id=' + leadopp_id;
            // alert(datastring);
            $.ajax({
                url: "<?php echo base_url('admin/Leads/edit_lead'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    $("#editmodal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#Lead_edit").html(data);
                },
                error: function() {

                }
            });
        }




        function show_activity_details(schedule_id) {
            var datastring = 'schedule_id=' + schedule_id;
            $.ajax({
                url: "<?php echo base_url('admin/Leads/show_activity_details'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    $("#show_activity").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#show_activity_details").html(data);
                    $(".popover-body").css('display','none');
                },
                error: function() {

                }
            });

        }
        function updateUI_show_activity_details_button_close()
        {
            $(".popover-body").css('display','block');
            $('#show_activity_details_button_close').attr('data-dismiss', 'modal');
        }


        $(document).ready(function() {
            $('#TransferLeadForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    emp_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Resource'
                            }
                        }
                    }
                }
            });
        });
    </script>


    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#SendQuotationForm').bootstrapValidator({
        //         message: 'This value is not valid',
        //         fields: {
        //             to_mail: {
        //                 validators: {
        //                     notEmpty: {
        //                         message: 'Enter valid email address'
        //                     }
        //                 }
        //             },
        //             email_subject: {
        //                 validators: {
        //                     notEmpty: {
        //                         message: 'Please Enter Subject'
        //                     }
        //                 }
        //             }
        //             email_draft: {
        //                 validators: {
        //                     notEmpty: {
        //                         message: 'Please Enter Mail Content'
        //                     }
        //                 }
        //             }
        //         }
        //     });
        // });


        $(document).ready(function(e) {
            $("#SendQuotationForm").on('submit', (function(e) {
                
                
                if (e.isDefaultPrevented()) {
                   
                } else {

                    $("#preview313").show();
                    $("#preview313").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/SendQuotationMail'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                           
                            if (data == 0) {
                                // new PNotify({
                                //     title: 'Email',
                                //     text: 'Please Add Email Configuration Setting!',
                                //     type: 'error'
                                // });
                                $('#emailConfigurationModel').modal('show');
                                // setTimeout(function() {
                                //     window.location = "<?php echo base_url('admin/dashboard/ViewMyProfile'); ?>";
                                // }, 1000);
                            } else {
                                $("#preview313").hide();
                                // new PNotify({
                                //     title: 'Quotation Email',
                                //     text: 'Email Sent Successfully',
                                //     type: 'success'
                                // });
                                $('#emailSendmailModel').modal('show');

                                // setTimeout(function() {
                                //     window.location = "";
                                // }, 1000);
                            }

                            return false;
                        },
                        error: function() {
                            $('#failModal').modal('show');
                        }
                    });
                }
                return false;

            }));
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            empvalidator = {
                    row: '.col-md-12',
                    validators: {
                        notEmpty: {
                            message: ' Please Select Resource '
                        }
                    }
                },

                $('#share_form').bootstrapValidator({
                    // message: 'This value is not valid',
                    // fields: {
                    //     'emp_id[]': 'Please Select Resource' ,
                    // }
                    'emp_id[]': {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Resource'
                            }
                        }
                    },
                });
        });

        $(document).ready(function(e) {
            $("#share_form").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    // alert('invalid');
                } 
                else 
                {
                   
                    // if($("#emp_id_multiple").val() == '')
                    // {
                    //     $("#emp_id_error").show();
                    //     $("#share_sub_btn").attr('disabled', true);
                    // }
                    // else
                    // {
                        
                        $("#share_preview").show();
                        $("#share_preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                        $.ajax({
                            url: "<?php echo base_url('admin/Leads/ShareDetails'); ?>",
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                if(data == 1)
                                {
                                    $("#share_preview").hide();
                                    $("#interest_model").modal('hide');
                                    $("#successshareModal").modal('show');
                                }
                                else
                                {
                                    $('#failModal').modal('show');
                                }
                                // new PNotify({
                                //     title: 'Share Lead / Opportunity',
                                //     text: 'Mail Sent  Successfully',
                                //     type: 'success'
                                // });
                                // setTimeout(function() {
                                //     window.location = "";
                                // }, 1000);

                                return false;
                            },
                            error: function() {
                                $('#failModal').modal('show');
                            }
                        });
                    // }
                }
                return false;

            }));
        });
    </script>









    <script type="text/javascript">
        function open_google_map2() {
            $("#googlemapmodal2").modal('show');
            initialize2();
        }

        function initialize2() {
            // alert();
            var markers = [];
            var map = new google.maps.Map(document.getElementById('googleMap2'), {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true
            });
            var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(18.5204, 73.8567),
                new google.maps.LatLng(18.6204, 73.9567));
            map.fitBounds(defaultBounds);
            // Create the search box and link it to the UI element.
            var input = /** @type {HTMLInputElement} */ (
                document.getElementById('pac-input2'));
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            var searchBox = new google.maps.places.SearchBox((input));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                map.setZoom(15);
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                for (var i = 0, marker; marker = markers[i]; i++) {
                    marker.setMap(null);
                }
                // For each place, get the icon, place name, and location.
                markers = [];
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0, place; place = places[i]; i++) {
                    var image = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    var marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        title: place.name,
                        position: place.geometry.location
                    });
                    markers.push(marker);
                    bounds.extend(place.geometry.location);
                    google.maps.event.addListener(marker, 'click', function(event) {
                        get_city2(event.latLng.lat(), event.latLng.lng());
                        var lat = event.latLng.lat();
                        var lng = event.latLng.lng();
                        var latlng = new google.maps.LatLng(lat, lng);
                        var geocoder = geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            'latLng': latlng
                        }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[1]) {
                                    location_name = results[1].formatted_address;
                                    document.getElementById("address3").value = location_name;
                                    $('#EditCustomerForm').bootstrapValidator('revalidateField', 'address');
                                    $("#googlemapmodal2").modal('hide');
                                }
                            }
                        });
                    });
                }
                map.fitBounds(bounds);
            });
            // [END region_getplaces]
            // Bias the SearchBox results towards places that are within the bounds of the
            // current map's viewport.
            google.maps.event.addListener(map, 'bounds_changed', function() {
                var bounds = map.getBounds();
                searchBox.setBounds(bounds);
            });
        }

        function get_city2(lat, long) {
            var geocoder;
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(lat, long);
            geocoder.geocode({
                    'latLng': latlng
                },
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var add = results[0].formatted_address;
                            var value = add.split(",");
                            // alert(add);
                            count = value.length;
                            country = value[count - 1];
                            state = value[count - 2];
                            city = value[count - 3];
                            if (value[count - 3] = null) {
                                city = '';
                            }
                            // alert(city);
                            document.getElementById('city2').value = city;
                            $('#EditCustomerForm').bootstrapValidator('revalidateField', 'city');
                        } else {
                            alert("address not found");
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                }
            );
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#TransferLeadForm").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    // alert('invalid');
                } else {

                    $("#preview31").show();
                    $("#preview31").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');

                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/Transfer_Lead'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            var type = "<?= $this->session->user_type ?>"
                            // alert(type);
                            $("#preview31").hide();
                            // new PNotify({
                            //     title: 'Transfer Leads',
                            //     text: 'Leads Transfered  Successfully',
                            //     type: 'success'
                            // });
                            if (type == 'E') {
                                $('#Transfer_Lead').modal('hide');
                                $('#successTransferLeadEmpModal').modal('show');
                                // setTimeout(function() {
                                //     window.location = "<?= base_url('admin/Leads/leads_opportunity'); ?>";
                                // }, 1000);
                            } else {
                                // setTimeout(function() {
                                //     window.location = "";
                                // }, 1000);
                                $('#Transfer_Lead').modal('hide');
                                $('#successTransferLeadModal').modal('show');
                            }

                            return false;
                        },
                        error: function() {
                            $(function() {
                                // new PNotify({
                                //     title: 'Leads Transfer',
                                //     text: 'Failed to load page',
                                //     type: 'warning'
                                // });
                                $('#failModal').modal('show');
                            });
                        }
                    });
                }
                return false;

            }));
        });
    </script>
    <script>
        // function convert_to_contact(id) 
        // {
        //     var notice = new PNotify({
        //         title: 'Confirmation',
        //         text: '<p>Are you sure you want to convert to contact this Leads ?</p>',
        //         hide: false,
        //         type: 'success',
        //         confirm: {
        //             confirm: true,
        //             buttons: [{
        //                     text: 'Convert',
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

        //     notice.get().on('pnotify.confirm', function() {
        //         var datastring = 'leadopp_id=' + id;

        //         $.ajax({
        //             type: "post",
        //             url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
        //             cache: false,
        //             data: datastring,
        //             success: function(data) {
        //                 $('#modal_default').modal('show');
        //                 $('#complaint_model_data').html(data);
        //             },
        //             error: function() {
        //                 alert('Error while request..');
        //             }
        //         });
        //     })
        //     notice.get().on('pnotify.cancel', function() {
        //     });

        // }
    function convert_to_contact (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#leadopp_id').val(element.getAttribute("data-id"));
        $('#convertconfirmationModal').modal('show');
    };

    $(document).ready(function(e) 
    {
        $("#convertForm").on('submit', (function(e) 
        {
                //e.preventDefault();
                if (e.isDefaultPrevented()) 
                {
                // alert('invalid');
                } 
                else 
                {
                    e.preventDefault();
                    $("#preview").show();
                    $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                    var datastring = $("#leadopp_id").val();
                    $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Leads/convert_to_contact'); ?>",
                    cache: false,
                    data: { "leadopp_id": datastring },
                    success: function(data) {
                    // $(function() {
                       
                        
                           $('#convertconfirmationModal').modal('hide');
                           $('#modal_default').modal('show');
                           $('#complaint_model_data').html(data);
                           
                    // });
                    },
                    error: function() {
                        // alert('Error while request..');
                        $("convertErrorModal").modal('show');
                    }
                    });
                }
        }));
    });
    </script>


         <script>
            function del_leads(id) {

                var notice = new PNotify({
                    title: 'Confirmation',
                    text: '<p>Are you sure you want to delete this Leads opportunity?</p>',
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
                    var datastring = 'leadopp_id=' + id;
                    //alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Leads/del_leads'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            //alert(data);
                            new PNotify({
                                title: 'Delete Lead | Opportunity',
                                text: 'Deleted Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Leads/leads_opportunity'); ?>";
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

            function delete_document(document_id) {

                var notice = new PNotify({
                    title: 'Confirmation',
                    text: '<p>Are you sure you want to delete this document ?</p>',
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
                    var datastring = 'document_id=' + document_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Leads/delete_document'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            new PNotify({
                                title: 'Delete Document',
                                text: 'Deleted Successfully',
                                type: 'success'
                            });
                            setTimeout(function() {
                                window.location = "";
                            }, 2000);
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
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
    </script>

     <script>
            $(document).ready(function() {
                brandvalidator = {
                        row: '.col-xs-6',
                        validators: {
                            notEmpty: {
                                message: 'Please Add Attachment'
                            },
                            file: {
                                extension: 'pdf,doc,docx,jpg,jpeg,png,bmp,xsl,xlsx',
                                // type: 'application/pdf,application/msword',
                                // maxSize: 2048 * 1024,
                                message: 'Supported format - pdf, doc, docx, jpg, jpeg, png, bmp, xls, xlsx'
                            }

                        }
                    },
                    remarkValidator = {
                        row: '.col-xs-5',
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Remark'
                            }
                        }
                    },
                    bookIndex = 0;

                $('#addform')
                    .bootstrapValidator({
                        framework: 'bootstrap',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            'uploadfile[]': brandvalidator,
                            'fileremark[]': remarkValidator,
                        }
                    })
                    // Add button click handler
                    .on('click', '.addButton', function() {
                        bookIndex++;
                        var $template = $('#bookTemplate'),
                            $clone = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('data-book-index', bookIndex)
                            .insertBefore($template);

                        // Update the name attributes
                        $clone
                            .find('[name="uploadfile[]"]').attr('name', 'uploadfile[' + bookIndex + ']').end()
                            .find('[name="fileremark[]"]').attr('name', 'fileremark[' + bookIndex + ']').end();

                        $('#addform')
                            .bootstrapValidator('addField', 'uploadfile[' + bookIndex + ']', brandvalidator)
                            .bootstrapValidator('addField', 'fileremark[' + bookIndex + ']', remarkValidator);
                    })
                    // Remove button click handler
                    .on('click', '.removeButton', function() {
                        var $row = $(this).parents('.form-group'),
                            index = $row.attr('data-book-index');

                        // Remove element containing the fields
                        $row.remove();
                    });
            });
    </script>

     <script type="text/javascript">
            $(document).ready(function(e) {
                $("#addform").on('submit', (function(e) {
                    //e.preventDefault();
                    if (e.isDefaultPrevented()) {
                        //alert('invalid');
                    } else {
                        $("#preview").show();
                        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('admin/Leads/UploadDocument'); ?>",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                                // alert(data);
                                $("#preview").hide();
                                $('#AddAttachmentmodal').modal('hide');
                                $('#successAddAttachmentModal').modal('show');
                                // new PNotify({
                                //     title: 'Upload Document',
                                //     text: 'Document Uploaded Successfully',
                                //     type: 'success'
                                // });
                                // setTimeout(function() {
                                //     window.location = "";
                                // }, 500);

                            },
                            error: function() {
                                // alert('fail');
                                $('#failModal').modal('show');
                            }
                        });
                    }
                    return false;
                }));
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#addnote').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    note: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Note'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(e) {
            $("#addnote").on('submit', (function(e) {
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#preview_upload").show();
                    $.ajax({
                        url: "<?php echo base_url('admin/Leads/AddNote'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#preview_upload").hide();
                            // alert(data);
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Credit Term',
                                //     text: 'Added Successfully !!',
                                //     type: 'success'
                                // });
                                $("#AddNotemodal").modal('hide');
                                $("#successModalAddNote").modal('show');
                            });
                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/CreditTerm'); ?>";
                            // }, 1000);
                        },
                        error: function() {
                            // alert('fail');
                            $("#alertModal").modal('show');

                        }
                    });
                }
                return false;
            }));
        });
    </script>


        <script type="text/javascript">
            function fake_load() {
                var cur_value = 1,
                    progress;
                // Make a loader.
                var loader = new PNotify({
                    title: "Loading ...",
                    text: '<div class="progress progress-striped active" style="margin:0">\
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">\
            <span class="sr-only">0%</span>\
            </div>\
        </div>',
                    //icon: 'fa fa-moon-o fa-spin',
                    icon: 'fa fa-cog fa-spin',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    },
                    history: {
                        history: false
                    },
                    before_open: function(notice) {
                        progress = notice.get().find("div.progress-bar");
                        progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
                        // Pretend to do something.
                        var timer = setInterval(function() {
                            if (cur_value == 90) {
                                loader.update({
                                    title: "Loading",
                                    icon: "fa fa-spinner fa-spin"
                                });
                            }
                            if (cur_value >= 100) {
                                // Remove the interval.
                                window.clearInterval(timer);
                                loader.remove();
                                return;
                            }
                            cur_value += 1;
                            progress.width(cur_value + "%").attr("aria-valuenow", cur_value).find("span").html(cur_value + "%");
                        }, 60);
                    }
                });
            }
    </script>
         <script type="text/javascript">
            // $('.addSelect').select2({
            //     dropdownParent: $("#create_quotation_modal")
            // });
            // $('#section_id_1').select2({
            //     dropdownParent: $("#create_quotation_modal")
            // });
            
            $('body').on('shown.bs.modal', '#create_quotation_modal', function() {
                $(this).find('.addSelect').each(function() {
                    $(this).select2({ dropdownParent: $('#create_quotation_modal') });
                });

                $(this).find('#section_id_1').each(function() {
                    $(this).select2({ dropdownParent: $('#create_quotation_modal') });
                });
               
            });
                    
            $('#create_quotation_modal').on('scroll', function (event) {
                $(this).find(".addSelect").each(function () {
                    $(this).select2({ dropdownParent: $(this).parent() });
                });

                $(this).find("#section_id_1").each(function () {
                    $(this).select2({ dropdownParent: $(this).parent() });
                });
               
            });
            
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

            $(document).ready(function () {
                var rescheduleTable = $('#Recent-Task');
                var quotationTable = $('#Quotation');
                var documentTable = $('#view-details-document')
                 
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
                    quotationTable.on('page.dt', function() {
                        var currentPage = quotationTable.page.info().page + 1;
                        
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

                
                    $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    documentTable.on('page.dt', function() {
                        var currentPage = documentTable.page.info().page + 1;
                        
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
    function Delete_document (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#document_id').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_document_button_close()
    {
        $(".popover-body").css('display','block');
        $('#delete_document_button_close').attr('data-dismiss', 'modal');
    }

</script>

<script>
    
    function Delete_note (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#note_id').val(element.getAttribute("data-id"));
        $('#deleteconfirmationNoteModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_note_button_close()
    {
        $(".popover-body").css('display','block');
        $('#delete_note_button_close').attr('data-dismiss', 'modal');
    }

    $(document).ready(function(e) 
    {
    $("#deletenote").on('submit', (function(e) 
    {
        //e.preventDefault();
        if (e.isDefaultPrevented()) 
        {
        // alert('invalid');
        } 
        else 
        {
            e.preventDefault();
            $("#preview").show();
            $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
            var datastring = $("#note_id").val();
            $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leads/delete_note'); ?>",
            cache: false,
            data: { "note_id": datastring },
            success: function(data) 
            {
                $(function() 
                {
                    $('#deleteconfirmationModal').modal('hide');
                    $("#deleteSucessModal").modal('show');
                });
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
$(document).ready(function(e) 
{
  $("#deleteForm1").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        e.preventDefault();
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#document_id").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Leads/delete_document'); ?>",
          cache: false,
          data: { "document_id": datastring },
          success: function(data) 
          {
            $(function() 
            {
                $('#deleteconfirmationModal').modal('hide');
                $("#deleteSucessModal").modal('show');
            });
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

<div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="failModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successTransferLeadEmpModal" tabindex="-1" aria-labelledby="successTransferLeadEmpModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successTransferLeadEmpModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Lead Transfered Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successTransferLeadModal" tabindex="-1" aria-labelledby="successTransferLeadModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successTransferLeadModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Lead Transfered Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successshareModal" tabindex="-1" aria-labelledby="successshareModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successshareModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Mail Sent Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="successAddAttachmentModal" tabindex="-1" aria-labelledby="successAddAttachmentModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successAddAttachmentModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Document Uploaded Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="convertconfirmationModal" tabindex="-1" aria-labelledby="convertconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="convertconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fas fa-exchange-alt" style="color: green;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with converting this Lead to a Contact?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="convertForm">
                        <input type="hidden" id="leadopp_id" name="leadopp_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="convertSucessModal" tabindex="-1" aria-labelledby="convertSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="convertSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="convertErrorModal" tabindex="-1" aria-labelledby="convertErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="convertErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successquotationModal" tabindex="-1" aria-labelledby="successquotationModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successquotationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Quotation Submitted Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successquotationstatusModal" tabindex="-1" aria-labelledby="successquotationstatusModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successquotationstatusModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
            <?php $path = base_url($_SERVER['REQUEST_URI']); ?>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Quotation Status Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo $path; ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successquotationstatusalreadyModal" tabindex="-1" aria-labelledby="successquotationstatusalreadyModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successquotationstatusalreadyModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
            <?php $path = base_url($_SERVER['REQUEST_URI']); ?>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Quotation Status Alrady Set As Won </div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo $path; ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this document?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteForm1">
                        <input type="hidden" id="document_id" name="document_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_document_button_close()" id="delete_document_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteconfirmationNoteModal" tabindex="-1" aria-labelledby="deleteconfirmationNoteModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteconfirmationNoteModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this note?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletenote">
                        <input type="hidden" id="note_id" name="note_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_note_button_close()" id="delete_note_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
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
                <a onclick="javascript:window.location.reload()">
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
                <a href="<?php echo base_url('admin/Master/locationlist'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailSendmailModel" tabindex="-1" aria-labelledby="emailSendmailModelLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="emailSendmailModelLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Email Sent Successfully </div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailConfigurationModel" tabindex="-1" aria-labelledby="emailConfigurationModelLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="emailConfigurationModelLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalAddNote" tabindex="-1" aria-labelledby="successModalAddNoteLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalAddNoteLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Note Submitted Successfully </div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/leads_opportunity'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>



<script>
    function show_history_details(history_id) {
            var datastring = 'history_id=' + history_id;
            $.ajax({
                url: "<?php echo base_url('admin/Leads/show_history_details'); ?>",
                type: "POST",
                data: datastring,
                success: function(data) {
                    $("#show_history").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#show_history_details").html(data);
                },
                error: function() {

                }
            });

        }
</script>


<script>
    function edit_note(note_id) 
    {
        var datastring = 'note_id=' + note_id;
        // alert(datastring);
        $.ajax({
            url: '<?php echo base_url('admin/Leads/edit_note_details') ?>',
            type: "POST",
            data: datastring,
            success: function(data) {
                $("#edit_note_view").html(data);
                $("#edit_note_modal").modal('show');
                // $("#edit_quotation_id").val(quotation_id);
                $(".popover-body").css('display','none');

            },
            error: function() {
                alert('fail');
            }
        });
    }
    function updateUI_edit_note_button_close()
    {
        $(".popover-body").css('display','block');
        $('#edit_note_button_close').attr('data-dismiss', 'modal');
    }
</script>