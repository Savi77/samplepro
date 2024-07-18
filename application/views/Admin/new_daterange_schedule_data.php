<?php
    // var_dump($complete_issue_list);
    $complete_cnt = count($complete_issue_list);
    // echo "<pre>";
    // echo $complete_cnt;
    // print_r($complete_issue_list)
    ?>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/assets/css/table.css"> -->
    <style>
        .sorting_1 a{
            cursor: auto !important;
        }
        table tbody tr .list-unstyled .dropdown-menu{
            transform: translate3d(-124px, 26px, 0px) !important;
        }
        /* #myTable1 tbody tr .list-unstyled{
            position: relative !important;
        } */
        /* #set{
            display: block !important;
        }
        #set .datatable-scroll-wrap{
            display: none !important;
        }
        #set .datatable-footer{
            display: none !important;
        } */
        /* .datatable-scroll-wrap {
            overflow-x: unset !important;
        }
        div#myTable1_wrapper{
            overflow-x: auto !important;
        }      */
        /* table#myTable1{
            border-top: 1px solid #dddddd !important;
            border-bottom: 1px solid #dddddd !important;
        }
        .datatable-header {
            border-bottom: none !important;
        }  
        .datatable-footer {
            border-top: none !important;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05) !important;
        } */
        /* #myTable1.dataTable td:nth-child(2),#myTable1.dataTable td:nth-child(3) {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        #myTable1.dataTable td:nth-child(2),#myTable1.dataTable td:nth-child(3){
            max-width: 100px;
        } */
        /* .content .card {
            position: relative !important;
        }
        .datatable-footer{
            position: relative;
        }
        @media only screen and (max-width: 1680px){
            .dt-buttons{
                position: absolute !important;
                right: 2.3% !important;
            }
            #myTable1_paginate{
                position: absolute !important;
                right: 2.3% !important;
                top:9px !important;
            }
            .dataTables_length{
                position: absolute !important;
                right:  9% !important;
            }
        }
        @media only screen and (max-width: 1600px){
            .dt-buttons{
                position: absolute !important;
                right: -4% !important;
            }
            #myTable1_paginate{
                position: absolute !important;
                right: -4% !important;
                top:9px !important;
            }
            .dataTables_length{
                position: absolute !important;
                right:  3% !important;
            }
        }
        @media only screen and (max-width: 1536px){
            .dt-buttons{
                position: absolute !important;
                right: -9% !important;
            }
            .dataTables_length{
                position: absolute !important;
                right:  -2% !important;
            }
            #myTable1_paginate{
                position: absolute !important;
                right: -9% !important;
                top:9px !important;
            }
        }
        @media only screen and (max-width: 1440px){
            .dt-buttons{
                position: absolute !important;
                right: -18.5% !important;
            }
            #myTable1_paginate{
                position: absolute !important;
                right: -18.5% !important;
                top:9px !important;
            }
            .dataTables_length{
                position: absolute !important;
                right:  -10% !important;
            }
        }
        @media only screen and (max-width: 1400px){
            .dt-buttons{
                position: absolute !important;
                right: -23% !important;
            }
            #myTable1_paginate{
                position: absolute !important;
                right: -23% !important;
                top:9px !important;
            }
            .dataTables_length{
                position: absolute !important;
                right:  -15% !important;
            }
        } */
        /* @media only screen and (max-width: 1366px){
            .dataTables_length{
                position: absolute !important;
                right: -29% !important;
            }
            .dt-buttons,#myTable1_paginate{
                position: absolute !important;
                right: -37.5% !important;
            }
        }
        @media only screen and (max-width: 1280px){
            .dataTables_length{
                position: absolute !important;
                right:  -29% !important;
            }
            .dt-buttons,#myTable1_paginate{
                position: absolute !important;
                right: -37.5% !important;
            }
        } */
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
        table td{
            color: #000 !important;
        }
        table td:nth-child(1) a div:hover{
            color: #605959 !important;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05) !important;
        }
        .list.list-unstyled input{
                padding-left: 10px !important;
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
            width: 150px !important;
            white-space: nowrap !important;
            text-overflow: ellipsis !important ;
            overflow: hidden !important;
        }
        .popover-body ul{
            padding-left: 0;
            margin-bottom: 0;
        }
        .popover-body li{
            padding: 2px 8px;
        }
        .popover-body li:hover{
            background: #eeebeb;
            
        }
    </style>

 <div class="panel11 panel-flat11">
    <!-- id="myTable1"  -->
    <!-- <table class="table table-striped datatable-colvis-state">   -->
    <table class="table table-striped" id="myTable1">  
        <thead>  
        <!-- <tr>  
            <th>ID</th>  
            <th>EMPName</th>  
            <th>Company Name</th>  
            <th>Product</th>  
            <th>Comment</th>  
            <th>Date</th>  
            <th>Sheduled Time</th>  
            <th>Priorty</th>
            <th>Status</th>  
            <th>Action</th>  
        </tr>   -->
        <tr>  
            <th>Task ID</th>  
            <th>Product-Service</th>  
            <th>Contact Details</th>  
            <th>Task Owner</th>  
            <th>Planned Date Time</th>  
            <th>Priority</th>  
            <th>Status</th>  
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            for ($k = 0; $k < $complete_cnt; $k++) 
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

                // $value_status = $complete_issue_list[$k]['value_status'];

                
                if($complete_issue_list[$k]['value_status'] == 'Inprogress')
                {
                    $value_status = 'In-progress';
                }
                else if($complete_issue_list[$k]['value_status'] == 'in_progress')
                {
                    $value_status = 'In-progress';
                }
                else if($complete_issue_list[$k]['value_status'] == 'pending')
                {
                    $value_status = 'Pending';
                }
                else if($complete_issue_list[$k]['value_status'] == 'completed')
                {
                    $value_status = 'Completed';
                }
                else
                {
                    $value_status = $complete_issue_list[$k]['value_status'];
                }
               
            ?>
            <tr>
            <td>
                <a href="<?= base_url('admin/ScheduleManagement/Task_view_page') ?>?task_id=<?= $query_1_complete ?>">
                    <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $ticket_no_1_complete ?></div>
                </a>
                <!-- <div style="width: 100px;"><a style="font-weight: 600;color: #000;">#<?= $ticket_no_1_complete ?></a></div> -->
            </td>  
            <td>
                <div class="text-wrap-col" style="width:150px;"><?= $product_name_filter; ?></div>
            </td>  
            <td>
                <div class="text-wrap-col" style="width:150px;"><?= $company_name_1_complete; ?></div>
            </td>  
            <td>
                <div style="width:200px;display:flex;"><?= $check_1_complete ?></div>
            </td>  
            <!-- <td><?= $issue_1_complete; ?></td>   -->
            <td>
                <div style="width: 150px;"><?= $created_date_1_complete; ?> <br> <small><?= $complete_issue_list[$k]['scheduledatetime'];?><small></div>
            </td>  
            <!-- <td><?= $complete_issue_list[$k]['scheduledatetime'];?></td>  -->
            <td style= "position: relative;">
                <div style="width:150px">
                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                        <li>
                            <ul class="list list-unstyled" style="position:relative;">
                                <li>
                                    <div>
                                        <div class="panel-button" >
                                            <input type="button" title="Add Priority" rel="tooltip" value="<?= $value_priority; ?>" readonly style="width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                            <a title="Add Priority" rel="tooltip">
                                                <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                            </a>
                                        </div>
                                        <div class="my-popover-content" style="display:none;">
                                            <?= $priority_complete; ?>
                                        </div>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </td>


            <td style= "position: relative;">
                <div style="width:150px">
                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                        <li>
                            <ul class="list list-unstyled" style="position:relative;">
                                <li>
                                    <div>
                                        <div class="panel-button">
                                            <input type="button" title="Status Update" rel="tooltip" value="<?= $value_status; ?>" readonly style="width: 100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                                            <a title="Status Update" rel="tooltip">
                                                <i class="fas fa-angle-down" style="position: absolute;right: 10px;top: 4px;color: white;"></i>
                                            </a>
                                        </div>
                                        <div class="my-popover-content" style="display:none">
                                            <?= $status_remark ?>
                                        </div>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </td>

            <td>
                <div style="width:150px;">
                    <ul class="pull-right dflex Padding-0 m-auto text-black" style="display: flex;justify-content: flex-start;">
                        <li>
                            <div>
                                <div class="panel-button">
                                    <a class="list-icons-item" rel="tooltip" title="Select Action">
                                        <i class="icon-menu9" style="cursor:pointer;"></i>
                                    </a>
                                </div>
                                <div class="my-popover-content" style="display:none">
                                    <?= $action_btn; ?>
                                </div>
                            </div>
                            
                        </li>
                        <!-- <li><a id="<?= $ticket_no_1_complete ?>" onclick="remark_list_pending(this.id)" data-toggle="modal" title="View Activity" rel="tooltip"><i class="icon-eye"></i></a></li> -->
                        <!-- <li <?= $DeleteClass; ?> class="ml-1"><a id="<?= $query_1_complete ?>" onclick="delete_activity(this.id)" data-toggle="modal" title="Delete Activity" data-placement="bottom"><i class="icon-trash activity-trash" ></i></a></li> -->
                        <!-- <li display:block="" class="ml-1"><a onclick="openAddBookDialog(this)" id="<?= $query_1_complete ?>" data-id="<?= $query_1_complete ?>"  data-toggle="modal" title="Delete Activity" rel="tooltip"><i class="icon-trash activity-trash"></i></a></li> -->
                    </ul>
                </div>
                
            
            </td> 

            </tr>

            
            <?php }?>    
        </tbody>
    </table>
 </div>


 <script>
    $(document).ready(function(){
    $('[rel="tooltip"]').tooltip();   
    });
</script>

<script>


$(document).ready(function(){
    var rescheduleTable = $('#myTable1').DataTable( {       
        // scrollX:        true,
        scrollCollapse: true,
        // autoWidth:         true,  
        paging:         true, 
        order: [[0, 'desc']],
        // columnDefs: [
        // { "width": "150px", "targets": [3] },
        // { "width": "100px", "targets": [0,1,2,4,6] },  
        // { "width": "50px", "targets": [5,7] },
        // ],
        // fixedColumns: true,
        // "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
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

    
    // $('#myTable').dataTable();
});

</script>




<script>

// var currentPopover = null;

// // Open popover on button click
// $('.panel-button').click(function() {
// // Close previous popover if exists
// if (currentPopover) {
//     currentPopover.hide();
// }
// // Show new popover
// $('.popover-body').show();
// // Update reference to current popover
// currentPopover = $('.popover-body');
// });

 // Close popover when DataTable page changes
    // table.on('page.dt', function() {
    //     if ('.popover-body') {
    //         $('.popover-body').hide();
    //     // currentPopover = null;
    //     }
    // });
                    
</script>




<!-- <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Are you sure you want to delete this Activity?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form action="<?php echo base_url('admin/ScheduleManagement/delete_activity'); ?>" method="POST">
                        <input type="hidden" id="queryId" name="query_id" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openAddBookDialog (element) 
    {
        var Id = element.getAttribute("data-id");
        
        $('#queryId').val(element.getAttribute("data-id"));
        $('#confirmationModal').modal('show');
    };
</script> -->

<script>

        // $(document).ready(function () {

        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });

        // });

        </script>