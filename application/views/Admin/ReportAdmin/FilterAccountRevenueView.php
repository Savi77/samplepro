<style>
      #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }

    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3) {
        display: none;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
</style>

        <table  class="table table-striped" id="all_activity_filter_table">     
          <thead>
            <tr>
                  <th>Sr No</th>
                  <th>Company Name</th>
                  <th>Revenue</th>
                  <th class="d-none" ></th>
                  <th class="d-none" ></th>
                  <th class="d-none" ></th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  
                  
                  foreach($AccountRevenue as $row) 
                  {  
                    if($row['company_name'] != '')
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
                        <?= $row['company_name'] ?>
                        </div>
                    </td>
                    <td>
                        <div style="width:200px;">
                        <?= $row['revenue'] ?>
                        </div>
                    </td> 
                    <td class="d-none" ></td>
                    <td class="d-none" ></td>
                    <td class="d-none" ></td>
               </tr>
               <?php $count++;  } } ?> 
          </tbody>
        </table>

<script>
  Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: ' Account Revenue<br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                   
                      foreach ($AccountRevenue as $Employee) {
                        if($Employee['company_name'] != '')
                        {  
                          
                    ?> {
                            name: '<?= $Employee['company_name']; ?>',
                            y: <?= $Employee['revenue']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } }?>
                ]
            }],
        });
</script>