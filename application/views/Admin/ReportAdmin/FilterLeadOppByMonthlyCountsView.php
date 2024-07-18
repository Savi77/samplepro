<style>
  #all_activity_filter_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    #all_activity_filter_table{
      text-wrap:nowrap !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #all_activity_filter_table td:nth-child(2) div a {
        color: #fff !important;
        /* font-weight: 600; */
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
      <th>Type</th>
      <?php
      for ($i = 0; $i < count($LeadOppByMonthlyCounts); $i++) {
        $array = $LeadOppByMonthlyCounts[$i];
        for ($j = 0; $j < count($array); $j++) {
      ?>
          <th><?= $array[$j]['month_name'] . ' ' . $array[$j]['year'] ?></th>
      <?php  }
        break;
      } ?>
      <th class="d-none"></th>
      <th class="d-none"></th>
      <th class="d-none"></th>
      <th class="d-none"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $ff = 0;
    $count = 1;
    for ($a = 0; $a < count($LeadOppByMonthlyCounts); $a++) {
    ?>
      <tr>
        <td><?= $count;?></td>
        <td>
          <div class="text-wrap-col" style="width:150px;">
            <?= $LeadOppByMonthlyCounts[$a][0]['customer_type']; ?>
          </div>
        </td>
        <?php
        $array = $LeadOppByMonthlyCounts[$a];
        for ($b = 0; $b < count($array); $b++) {
        ?>
          <td>
            <div style="width:150px;">
            <a rel="tooltip" title="View Monthly Leads" onclick="ViewDetails(id)" id="<?= $array[$b]['month'] . '|' . $array[$b]['year'] . '|' . $array[$b]['customer_type']; ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;"><?= $array[$b]['total'] ?></a>
            </div>
          </td>
        <?php  } ?>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td class="d-none"></td>
      </tr> <?php $count ++; $ff++;
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
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Monthly Leads<br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php
                    // foreach ($LeadOppByStage as $Employee) {
                    for ($i = 0; $i < count($LeadOppByMonthlyCountsGraph); $i++) 
                    {
                        $array = $LeadOppByMonthlyCountsGraph[$i];
                        for ($j = 0; $j < count($array); $j++) {
                            
                    ?> 
                    {
                        name: '<?= $array[$j]['month_name'] . ' ' . $array[$j]['year'] . ' :- ' . $array[$j]['customer_type'] ?>',
                        y: <?= $array[$j]['total']; ?>
                        // drilldown: "Chrome"
                    },
                    <?php } }?>
                ]
            }],
        });
</script>