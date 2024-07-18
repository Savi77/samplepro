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
      <th>Source</th>
      <th>Total</th>
      <?php
      foreach ($StageArray as $row2) {
      ?>
        <th><?= $row2->stage_title; ?></th>
      <?php } ?>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($Lead_Opportunity_by_Source as $row) {
      $stage_cnt_array = $row['stage_cnt_array'];
      $stage_id_array = $row['stage_id_array'];
    ?>
      <tr>
        <td>
          <div>
            <?= $count; ?>
          </div>
        </td>
        <td>
          <div class="text-wrap-col" style="width:200px;">
            <?= $row['source'] ?>
          </div>
        </td>
        <td>
          <div style="width:150px;">
            <a rel="tooltip" title="View Leads / Opportunities By Source" onclick="ViewTotalDetails(id)" id="<?= $row['source_id'] ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;">
            <?= $row['total'] ?></a>
          </div>
        </td>

        <?php
        for ($c = 0; $c < count($stage_cnt_array); $c++) {
          $stage_id = $stage_id_array[$c] . '|' . $row['source_id'];
        ?>
          <td>
            <div style="width:180px;">
              <a rel="tooltip" title="Leads / Opportunities By Stage" onclick="ViewStageDetails(id)" id="<?= $stage_id; ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;">
              <?= $stage_cnt_array[$c]; ?></a>
            </div>
          </td>
        <?php } ?>
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

<script>
  Highcharts.chart('container3', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Source Leads<br/><p style="font-size:12px;color:#FF5732;"></p>'                
    },

    xAxis: {
        categories: [
            <?php foreach ($Lead_Opportunity_by_Source as  $Source) { ?> '<?= $Source['source']; ?>',
            <?php } ?>
        ]
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: ''
        }
    },

    tooltip: {
        format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
            'Total: {point.stackTotal}'
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [{
        name: 'Lead',
        data: [
            <?php foreach ($LeadcountountBySourceSummary as  $SourceLead) {?> <?= $SourceLead['total']; ?>,
            <?php } ?>
        ],
        stack: ''
    }, {
        name: 'Opportunity',
        data: [
            <?php foreach ($OppCountBySourceSummary as  $SourceOpp) {?> <?= $SourceOpp['total']; ?>,
            <?php } ?>
        ],
        stack: ''
    }]
  });

</script>