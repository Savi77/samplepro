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
        width: 25%;
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
                    for($i=0;$i<count($recent_task_details);$i++)
                    {
                ?>
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <span class="span-py-10 white-text">
                        Recent Task Details for  Task ID <?= substr($recent_task_details[$i]['ticket_no'],2); ?>
                    </span>
                </div>
                <div style="padding:20px;" class="row">
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Ticket No.	</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= substr($recent_task_details[$i]['ticket_no'],2); ?>" readonly>
                        </div>

                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Task	</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $recent_task_details[$i]['type_name']; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Account Manager</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $recent_task_details[$i]['empname']; ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Creation Date Time	</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= date("d F Y", strtotime($recent_task_details[$i]['created_date'])) . ' ' . date("h:i a", strtotime($recent_task_details[$i]['created_date'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Due Date Time	</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= date("d F Y", strtotime($recent_task_details[$i]['assign_date'])) . ' ' . date("h:i a", strtotime($recent_task_details[$i]['assign_date'])); ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Task Date Time	</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= date("d F Y", strtotime($recent_task_details[$i]['statusdatetime'])) . ' ' . date("h:i a", strtotime($recent_task_details[$i]['statusdatetime'])); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 d-flex">
                        <label class="control-label col-sm-2 m-auto pl-20" for="email">Status</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" rows="2" value ="<?= ucfirst($recent_task_details[$i]['taskstatus']); ?>" readonly>
                        </div>
                        <label class="control-label col-sm-2 m-auto pl-20" for="Youtube">Remarks</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value ="<?= $recent_task_details[$i]['issue']; ?>" readonly>
                        </div>
                    </div> 
                    <?php
                    }
                    ?>        
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Admin/includes/n-footer'); ?>
    