
<style>
   #all_activity_filter_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #all_activity_filter_table th{
      text-wrap: nowrap;
    }
</style>
<table class="table table-striped" id="all_activity_filter_table">
  <thead>
    <tr>
      <th>Sr No</th>
      <th>Conatct Type</th>
      <th>Total</th>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($TypewiseContact as $row) {
    ?>
      <tr>
        <td>
          <div>
          <?= $count; ?>
          </div>
        </td>
        <td>
          <div style="width:200px;" class="text-wrap-col">
          <?= $row['title'] ?>
          </div>
        </td>
        <td>
          <div style="width:200px;">
          <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="View Contact Type" onclick="ViewDetails(id)" id="<?= $row['type_id'] ?>">
            <?= $row['total'] ?></a>
          </div>
          
          
        </td>
        <td class="d-none" ></td>
        <td class="d-none" ></td>
        <td class="d-none" ></td>
      </tr>
    <?php $count++;
    } ?>
  </tbody>
</table>


<script>
$(document).ready(function(){

  $('[rel="tooltip"]').tooltip();   
});
</script>