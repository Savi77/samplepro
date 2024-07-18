<?php $this->load->view('Admin/includes/n-header');    ?>

<style>
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
    
    .datatable-header {
        padding-top: 1.25rem !important;
    }
    #MyArchiveTargetListTable th:first-child{
        width:100px;
        text-wrap: nowrap;
    }
</style>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Archive Target List</span></i>
                <a data-toggle="modal" class="btn btn-link btn-float has-text"><span>&nbsp;</span></a>
            </div>

            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyArchiveTargetListTable">
                <thead >
                    <tr>
                        <th>Sr No</th>
                        <th>Target Period</th>
                        <th>Target Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Allocated Resource</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;

                    foreach ($archive_target as $row) {
                        if ($count % 2 == 0) {
                            $bg_color_class = 'class="bg"';
                        } else {
                            $bg_color_class = '';
                        }
                    ?>
                        <tr <?= $bg_color_class ?>>

                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row['target_period'] ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row['target_type'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['start_date'])); ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['end_date'])); ?>
                                </div>
                            </td>
                    
                            <td>
                                <div class="text-wrap-col" style="width:300px;">
                                    <?= $row['emp_list'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['date_created'])); ?>
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


<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyArchiveTargetListTable').DataTable( {       
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
        // "drawCallback": function() {
        //         popoverOptions = {
        //         content: function () {
        //             // Get the content from the hidden sibling.
        //             return $(this).siblings('.my-popover-content').html();
        //         },
        //         placement: 'bottom',
        //         container: 'body',
        //         html: true,
        //         sanitize: false,
        //         // selector: '[data-toggle="popover"]',
        //     };
        //     $('.panel-button').popover(popoverOptions);

        //     $('.panel-button').click(function (e) {
        //         e.stopPropagation();
        //     });

        //     }  
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
<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

