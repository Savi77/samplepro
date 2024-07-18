<style>
      #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3) {
        display: none;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
    #all_activity_filter_table td:nth-child(2) div a:hover{
        color: #605959 !important;
    }
    #all_activity_filter_table td:nth-child(2) div a{
        font-weight:600;
        color: #000;
    }
</style>

        <table  class="table table-striped" id="all_activity_filter_table">     
            <thead>
              <tr>
                  <th>Sr No</th>
                  <th>Resource</th>
                  <th>Target</th>
                  <th>Target Periodicity</th>
                  <th>Amount</th>
                  <th class="d-none">Balance</th>
                  <th>Balance</th>
                  <th>Achieved</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach($EmployeeTarget as $row) 
                    {                       
                  ?>
                  <tr>
                      <td>
                        <div>
                        <?= $count; ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <!-- <a rel="tooltip" title="View Resource Target" onclick="ViewDetails(id)" id="<?= $row['emp_name'] ?>"><?= $row['emp_name'] ?></a> -->
                        <?= $row['emp_name'] ?>
                        </div>
                      </td> 
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['TargetName'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['target_period'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['TargetAmount'] ?>
                        </div>
                      </td>
                      <td class="d-none"></td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['TargetBalance'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['TargetAchieved'] ?>
                        </div>
                      </td>
                  </tr>
                 <?php $count++;  } ?> 
            </tbody>
        </table>

<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>