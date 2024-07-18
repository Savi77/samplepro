<style>
  #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),
  #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),
  #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3) {
    display: none;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, .05) !important;
  }

  /* #all_activity_filter_table td:nth-child(2) div a:hover {
      color: #605959 !important;
  } */
  #all_activity_filter_table td:nth-child(2) div a {
    color: #fff !important;
    font-weight: 400;
  }
  #all_activity_filter_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
</style>
<table class="table table-striped" id="all_activity_filter_table">
  <thead>
    <tr>
      <th>Sr No</th>
      <th>Resource</th>
      <?php
      for ($i1 = 0; $i1 < count($MonthArray); $i1++) {
        ?>
        <th>
          <?= $MonthArray[$i1]['month_name'] . ' ' . $MonthArray[$i1]['year'] ?>
        </th>
      <?php } ?>
      <th class="d-none"></th>
      <th class="d-none"></th>
      <th class="d-none"></th>
      <th class="d-none"></th>


    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    for ($c = 0; $c < count($LeadOppByUserwiseMonthlyCounts_new); $c++) {
      ?>
      <tr>
        <td><?= $count; ?></td>
        <td>
          <div class="text-wrap-col" style="width:200px;">
            <?= $LeadOppByUserwiseMonthlyCounts_new[$c]['emp_name']; ?>
          </div>
        </td>
        <?php
        $montharray = $LeadOppByUserwiseMonthlyCounts_new[$c]['montharray'];
        for ($b1 = 0; $b1 < count($montharray); $b1++) {
          ?>

          <td>
            <div style="width:150px;">
              <a rel="tooltip" title="View User Leads"
                style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;"
                onclick="ViewDetails(id)"
                id="<?= $montharray[$b1]['month'] . '|' . $montharray[$b1]['year'] . '|' . $LeadOppByUserwiseMonthlyCounts_new[$c]['emp_id']; ?>">
                <?= $montharray[$b1]['total'] ?>
              </a>
            </div>
          </td>
        <?php  } ?>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td class="d-none"></td>

      </tr>
    <?php $count++;  } ?>
  </tbody>
</table>

<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>