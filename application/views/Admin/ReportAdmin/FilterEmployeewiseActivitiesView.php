
<style>
      #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
/*     
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    } */
</style>

        <table  class="table table-striped" id="all_activity_filter_table">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Resource</th>
                <!-- <?php
                foreach ($ActivityArray as  $row) 
                {
                 ?>
                <th><?=  $row->type_name; ?></th>
              <?php } ?> -->
              <?php
                foreach ($EmployeewiseActivities as  $row2) 
                {
                  $NewActivityArray[]=$row2['ActivityArray'];
                } 
                for($i=0;$i<count($NewActivityArray[0]);$i++)
                {
                  $typename=$NewActivityArray[0][$i]['type_name'];
              ?>
              <th><?=  $typename; ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
              <?php
               $cnt=1;
               foreach ($EmployeewiseActivities as  $row2) 
               {
                 $NewActivityArray=$row2['ActivityArray'];
               ?>
                <tr>
                 <td>
                  <div>
                  <?=  $cnt; ?>
                  </div>
                </td>
                 <td>
                  <div style="width:200px;" class="text-wrap-col">
                  <?=  $row2['name']; ?>
                  </div>
                </td>
                   <?php 
                   for($i=0;$i<count($NewActivityArray);$i++)
                   {$ids=$NewActivityArray[$i]['id'].'|'.$row2['emp_id'];
                   ?>
                  <td>
                    <div style="width:150px;" class="text-wrap-col">
                    <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="View Resource Wise Task"  onclick="ViewDetails(id)" id="<?= $ids ?>"><?=  $NewActivityArray[$i]['type_count']; ?></a>
                    </div>
                  </td>
                <?php } ?>





                 </tr>
             <?php  $cnt++; } ?>
          </tbody>
        </table>


<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>

        