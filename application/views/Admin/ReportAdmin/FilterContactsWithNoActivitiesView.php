        <style>
             table td{
                color: #000 !important;
            }
            /* table td:nth-child(1) a div:hover{
                color: #605959 !important;
            } */
            .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(0,0,0,.05) !important;
            }
            .text-wrap-col{
                width: 150px !important;
                white-space: nowrap !important;
                text-overflow: ellipsis !important ;
                overflow: hidden !important;
            }
            table th:first-child{
                width:100px ;
            }
            #all_activity_filter_table td:nth-child(2) div a:hover{
                color: #605959 !important;
            }
            #all_activity_filter_table td:nth-child(2) div a{
                color: #000 !important;
                font-weight:600
            }
            
        </style>

        <table  class="table table-striped" id="all_activity_filter_table">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Company Name</th>
                <th>Last Task Before</th>
                <th>Task</th>
                <th>Resource</th>
                <th>Status </th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  
                  foreach($ContactsActivities as $row) 
                  {                       
                ?>
                <tr>
                    <td>
                        <div>
                            <?= $count; ?>
                        </div>
                    </td>
                    <td>
                        <div class="text-wrap-col" style="width:150px;">
                            <a  rel="tooltip"style="color:#000" title="View Inactive Contacts"  onclick="ViewDetails(id)" id="<?= $row['customer_id'] ?>"><?= $row['company_name'] ?></a>
                        </div>
                    </td>
                    <td>
                        <div style="width:150px;">
                            <?= $row['last_activity_before'] ?> Days
                        </div>
                    </td>
                    <td>
                        <div style="width:150px;">
                            <?= $row['last_activity'] ?>
                        </div>
                    </td>
                    <td>
                        <div style="width:150px;">
                            <?= $row['employee'] ?>
                        </div>
                    </td> 
                    <td>
                        <div style="width:150px;">
                            <?= ucwords($row['status']) ?>
                        </div>
                    </td>                     
                </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>

<script>
    $(document).ready(function(){
        $('#all_activity_filter_table').DataTable( {       
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

                }  
            // stateSave: true,
            // columnDefs: [
            //     {
            //         targets: -1,
            //         visible: true,
            //     }
            // ]
        } );

        
    });
</script>


<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>