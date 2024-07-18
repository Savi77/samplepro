<?php $this->load->view('Admin/includes/n-header');    ?>
<?php
    // echo json_encode($user_permission);
    $ViewClass='style="display:block";';

    foreach ($user_permission as $priviledge) 
    {
        $priviledge_key=$priviledge->priviledge_key;
        $status=$priviledge->status;
        if ($priviledge_key=='VIEW')
        {
            if($status==1)
            {
                $ViewClass=' style="display:block"; ';
            } 
            else
            {
                $ViewClass=' style="display:none"; ';   
            }
        }     
    }
?>
<style>
    table td{
        color: #000 !important;
    }
    /* table td:nth-child(1) a div:hover{
        color: #605959 !important;
    } */

    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px;
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
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    #MyEcommerceTable_wrapper {
        margin-top: 0;
    }
    #MyEcommerceTable th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    tr.bg {
        background: #fff;
    }
    .card-header:not([class*=bg-])+.dataTables_wrapper>.datatable-header {
        padding-top: 1.25rem;
    }
    /* #default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#default_issue_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    } */
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
                <span class="span-py-10 white-text">E-Commerce</span>
            </div>
            <table class="table table-striped" id="MyEcommerceTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Order By</th>
                        <th>Contact Name</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 1;
                        foreach ($order_list as $row) {
                            if ($count % 2 == 0) {
                                $bg_class = 'class="bg"';
                            }else {
                                $bg_class = '';
                            }
                            $ord_id=$row['order_id'];
                    ?>
                        <tr <?= $bg_class ?> >
                            <td>
                                <div>
                                <?= $count ?>
                                </div>
                            </td>
                            <td >
                                <div style="width:150px;" class="text-wrap-col">
                                <?= $row['order_by'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;" class="text-wrap-col">
                                <?= $row['customer_name'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= $row['total'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <button type="button" style="width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent; text-align:center;"><?= $row['status'] ?></button>
                                </div>
                            </td>
                            <td>
                                <div style="width:150px;">
                                <?= date("d M Y", strtotime($row['order_date'])); ?>
                                </div>
                            </td>
                            <!-- <td>
                                <div>
                                <a href="<?php echo base_url('admin/Ecommerce/view_order?id=') ?><?= $ord_id ?>" <?= $ViewClass; ?> data-toggle="tooltip" title="View Order" data-placement="bottom" >
                                    <i class="icon-eye"></i>
                                </a>
                                </div>
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
                                                        
                                                        <a href="<?php echo base_url('admin/Ecommerce/view_order?id=') ?><?= $ord_id ?>" style="color:#333333;">
                                                            <span class="status-mark position-left dot dot-blue"></span> View Order  
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
                    <?php  $count++; } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>

$(document).ready(function(){
            var rescheduleTable = $('#MyEcommerceTable').DataTable( {       
                // scrollX:        true,
                scrollCollapse: true,
                // autoWidth:         true,  
                paging:         true, 
                // order: [[0, 'desc']],
                buttons: [
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

            // $('#myTable').dataTable();
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

<?php $this->load->view('Admin/includes/n-footer');    ?>