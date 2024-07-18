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
    
    
</style>

        <table  class="table table-striped" id="all_activity_filter_table">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Segment</th>
                <th>Total</th>
                <th class="d-none">Sucess</th>
                <th class="d-none">Total</th>
                <th class="d-none">Average</th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($Lead_Opportunity_by_Segments as $row) 
                  {                   
                ?>
                <tr>
                    <td>
                      <div>
                        <?= $count; ?>
                      </div>
                    </td>

                    <td>
                      <div class="text-wrap-col" style="width:200px;">
                      <?= $row['business_name'] ?>
                      </div>
                    </td>

                     <td>
                      <div style="width:150px;">
                        <a rel="tooltip" title="View Leads / Opportunities By Segments"  onclick="ViewDetails(id)" id="<?= $row['business_id'] ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;">
                        <?= $row['total'] ?></a>
                      </div>
                    </td>
                    <td class="d-none"><?= $count; ?></td>
                    <td class="d-none"><?= $count; ?></td>
                    <td class="d-none"><?= $count; ?></td>
               </tr>
               <?php $count++;  } ?> 
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
                text: 'Segment Leads <br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            xAxis: {
                categories: [
                    <?php foreach ($Lead_Opportunity_by_Segments as $Employee) { ?>'<?= $Employee['business_name']; ?>',<?php } ?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                },
                stackLabels: {
                    enabled: true
                }
            },
            // legend: {
            //     align: 'left',
            //     x: 70,
            //     verticalAlign: 'top',
            //     y: 70,
            //     floating: true,
            //     backgroundColor:
            //         Highcharts.defaultOptions.legend.backgroundColor || 'white',
            //     borderColor: '#CCC',
            //     borderWidth: 1,
            //     shadow: false
            // },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'Lead',
                data: [
                    <?php foreach ($Lead_by_Segments as $Employee_lead) { ?><?= $Employee_lead['total']; ?>,<?php } ?>
                ]
            }, {
                name: 'Opportunity',
                data: [
                    <?php foreach ($Opportunity_by_Segments as $Employee_opp) { ?><?= $Employee_opp['total']; ?>,<?php } ?>
                ]
            }]
        });
</script>