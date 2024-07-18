
<style>
    #all_activity_filter_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    /* #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    } */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #all_activity_filter_table th{
      text-wrap: nowrap;
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
                <th>Last Task On</th>
                <th>Task</th>
                <th>Resource</th>
                <th>Status </th>
                <th>Total Biiling </th>
                <th>Total Task</th>
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
                      <div style="width:200px;" class="text-wrap-col">
                      <a rel="tooltip" title="View Contact With Task Details"  onclick="ViewDetails(id)" id="<?= $row['customer_id'] ?>"><?= $row['company_name'] ?></a>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?= $row['last_activity_date'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?= $row['last_activity'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;" class="text-wrap-col">
                      <?= $row['employee'] ?>
                      </div>
                    </td> 

                    <td>
                      <div style="width:150px;">
                      <?= ucwords($row['status']) ?>
                      </div>
                    </td> 
                    <td>
                      <div style="width:150px;">
                      <?= $row['total_bill'] ?>
                      </div>
                    </td> 
                    <td>
                      <div style="width:150px;">
                      <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="View Contact With Task Details"  onclick="ViewTotalActivityDetails(id)" id="<?= $row['customer_id'] ?>"><?= $row['total_activity'] ?></a>
                      </div>
                    </td> 
                </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>

<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>