 <style>
     table td{
        color: #000 !important;
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
    #ajax_table th{
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }

 </style>
 
 <?php
    $complete_cnt = count($complete_issue_list);
    ?>
    <div class="panel11 panel-flat11">
        <!-- datatable-basic -->
     <table class="table table-striped" id="ajax_table" >
         <thead>
            <th>Task ID</th>  
            <th>Resource</th>  
            <th>Company Name</th>  
            <th>Product</th>  
            <th>Comment</th>  
            <th>Planned Date Time</th>  
            <!-- <th>Sheduled Time</th>   -->
            <th>Priorty</th>
            <th>Status</th>  
            <th>Action</th>  
         </thead>
         <tbody>
            <?php for ($k = 0; $k < $complete_cnt; $k++) 
            {
                $ticket_no_1_complete = $complete_issue_list[$k]['ticket_no'];
                $issue_1_complete = $complete_issue_list[$k]['issue'];
                $check_1_complete = $complete_issue_list[$k]['check'];
                $company_name_1_complete = $complete_issue_list[$k]['company_name'];
                $created_date_1_complete = $complete_issue_list[$k]['schedule_date'];
                $created_on11 = $complete_issue_list[$k]['created_date'];
                $priority_complete = $complete_issue_list[$k]['priority'];
                $status_remark = $complete_issue_list[$k]['status_remark'];
                $query_1_complete = $complete_issue_list[$k]['query_id'];
                $product_name_filter = $complete_issue_list[$k]['product_name'];
                $action_btn = $complete_issue_list[$k]['action_btn'];

                if($complete_issue_list[$k]['value_priority'] == '')
                {
                    $value_priority = 'No Priority';
                }
                else
                {
                    $value_priority = $complete_issue_list[$k]['value_priority'];
                }

                $value_status = $complete_issue_list[$k]['value_status']; 
             ?>
             <tr>
                <td>
                    <div style="width:150px;">
                        <?= $ticket_no_1_complete; ?>
                    </div>
                </td>  
                <td>
                    <div style="display:flex;">
                        <?= $check_1_complete; ?>
                    </div>
                </td>  
                <td>
                    <div class="text-wrap-col" style="width:200px;">
                        <?= $company_name_1_complete; ?>
                    </div>
                </td>  
                <td>
                    <div class="text-wrap-col" style="width:200px;">
                        <?= $product_name_filter ?>
                    </div>
                </td>  
                <td>
                    <div style="width:150px;">
                        <?= $issue_1_complete; ?>
                    </div>
                </td>  
                <td>
                    <div style="width:150px;">
                        <?= $created_date_1_complete; ?><br><small><?= $complete_issue_list[$k]['scheduledatetime'];?></small>
                    </div>
                </td>  
                <!-- <td>
                    <div style="width:150px;"> 
                        <?= $complete_issue_list[$k]['scheduledatetime'];?>
                    </div>
                </td>   -->
                <td>
                    <div style="width:150px;">
                        <?= $value_priority; ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <?= $value_status ?>
                    </div>
                </td>  
                <!-- <td>
                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                        <li><a  id="<?= $query_1_complete ?>" data-toggle="modal" title="Restore Activity" rel="tooltip" onclick="restore_activity(this)" data-id="<?= $query_1_complete ?>"><i class="icon-store2"></i></a></li>
                        <li <?= $DeleteClass; ?> class="ml-1"><a id="<?= $query_1_complete ?>" data-toggle="modal" title="Delet Activity" rel="tooltip" onclick="delete_activity(this)" data-id="<?= $query_1_complete ?>"><i class="icon-trash activity-trash"></i></a></li>

                    </ul>
                </td>  -->


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
                                                <a id="<?= $query_1_complete ?>" data-toggle="modal" onclick="restore_activity(this)" data-id="<?= $query_1_complete ?>" style="color:#333333;">
                                                    <span class="status-mark position-left dot dot-green"></span> Restore Task  
                                                </a>
                                            </li>
                                            <li>
                                                <a id="<?= $query_1_complete ?>" data-toggle="modal" onclick="delete_activity(this)" data-id="<?= $query_1_complete ?>" style="color:#333333;">
                                                    <span class="status-mark position-left dot dot-red"></span> Delete Task  
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
                $record_cnt_complete = $k + 1;
                if ($record_cnt_complete < $complete_cnt) {
                    $ticket_no_2_complete = $complete_issue_list[$record_cnt_complete]['ticket_no'];
                    $issue_2_complete = $complete_issue_list[$record_cnt_complete]['issue'];
                    $check_2_complete = $complete_issue_list[$record_cnt_complete]['check'];
                    $company_name_2_complete = $complete_issue_list[$record_cnt_complete]['company_name'];

                    $created_date_2_complete = $complete_issue_list[$record_cnt_complete]['schedule_date'];
                    $created_on211 = $complete_issue_list[$record_cnt_complete]['created_date'];

                    $priority_2_complete = $complete_issue_list[$record_cnt_complete]['priority'];
                    $status_remark2 = $complete_issue_list[$record_cnt_complete]['status_remark'];
                    $query_2_complete = $complete_issue_list[$record_cnt_complete]['query_id'];
                    $product_name_filter2 = $complete_issue_list[$record_cnt_complete]['product_name'];
                    $action_btn_2 = $complete_issue_list[$record_cnt_complete]['action_btn'];

                    if($complete_issue_list[$record_cnt_complete]['value_priority'] == '')
                    {
                        $value_priority_2 = 'No Priority';
                    }
                    else
                    {
                        $value_priority_2 = $complete_issue_list[$record_cnt_complete]['value_priority'];
                    }

                    $value_status_2 = $complete_issue_list[$record_cnt_complete]['value_status']; 
            ?>
            <tr>
                <td>
                    <div style="width:150px;">
                        <?= $ticket_no_2_complete; ?>
                    </div>
                </td>  
                <td>
                    <div style="display:flex;">
                        <?= $check_2_complete; ?>
                    </div>
                </td>  
                <td>
                    <div class="text-wrap-col" style="width:200px;">
                        <?= $company_name_1_complete; ?>
                    </div>
                </td>  
                <td>
                    <div class="text-wrap-col" style="width:200px;">
                        <?= $product_name_filter2 ?>
                    </div>
                </td>  
                <td>
                    <div style="width:150px;">
                        <?= $issue_2_complete; ?>
                    </div>
                </td>  
                <td>
                    <div style="width:150px;">
                        <?= $created_date_2_complete; ?><br><small><?= $complete_issue_list[$record_cnt_complete]['scheduledatetime'];?></small>
                    </div>
                </td>  
                <!-- <td>
                    <div style="width:150px;">
                        <?= $complete_issue_list[$record_cnt_complete]['scheduledatetime'];?>
                    </div>
                </td>   -->
                <td>
                    <div style="width:150px;">
                        <?= $value_priority_2; ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <?= $value_status_2 ?>
                    </div>
                </td>  
                <!-- <td>
                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                        <li><a  id="<?= $query_2_complete ?>" data-toggle="modal" title="Restore Activity" rel="tooltip" onclick="restore_activity(this)" data-id="<?= $query_2_complete ?>"><i class="icon-store2"></i></a></li>
                        <li <?= $DeleteClass; ?> class="ml-1"><a id="<?= $query_2_complete ?>" data-toggle="modal" title="Delete Activity" rel="tooltip" onclick="delete_activity(this)" data-id="<?= $query_1_complete ?>"><i class="icon-trash activity-trash"></i></a></li>
                    </ul>
                </td>  -->
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
                                                <a id="<?= $query_2_complete ?>" data-toggle="modal" onclick="restore_activity(this)" data-id="<?= $query_2_complete ?>" style="color:#333333;">
                                                    <span class="status-mark position-left dot dot-green"></span> Restore Task  
                                                </a>
                                            </li>
                                            <li>
                                                <a id="<?= $query_2_complete ?>" data-toggle="modal" onclick="delete_activity(this)" data-id="<?= $query_1_complete ?>" style="color:#333333;">
                                                    <span class="status-mark position-left dot dot-red"></span> Delete Task  
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
            }
            ?>
            <?php
            $k = $record_cnt_complete;
            } 
            ?>
         </tbody>
     </table>
    </div>


     <script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>
     <script>

        $(document).ready(function () {

        $(document).click(function (e) {
            if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
        });

        </script>
