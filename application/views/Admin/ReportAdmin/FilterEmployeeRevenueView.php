
<style>
      #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
    
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
</style>
        <table  class="table table-striped" id="all_activity_filter_table">     
              <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Resource</th>
                    <th>Revenue</th>
                    <th class="d-none" ></th>
                    <th class="d-none" ></th>
                    <th class="d-none" ></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   $cnt=1;
                   foreach ($EmployeeRevenue as  $row2) 
                   {
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
                        <td>
                            <div style="width:200px;" class="text-wrap-col">
                            <?=  $row2['revenue']; ?>
                            </div>
                        </td>
                        <td class="d-none" ></td>
                        <td class="d-none" ></td>
                        <td class="d-none" ></td>
                     </tr>
                 <?php  $cnt++; } ?>
              </tbody>
        </table>
<script>
    Highcharts.chart('container32', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Revenue'
            },
            
            xAxis: {
                type: 'category',
                labels: {
                    autoRotation: [-45, -90],
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Revenue: <b>{point.y:.1f}</b>'
            },
            series: [{
                name: 'Population',
                colors: [
                    '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                    '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
                    '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
                    '#03c69b',  '#00f194'
                ],
                colorByPoint: true,
                groupPadding: 0,
                data: [
                    <?php
                    foreach ($EmployeeRevenue as $er) {
                    ?> 
                    ['<?= $er['name']; ?>', <?= $er['revenue']?>],
                    <?php } ?>
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    inside: true,
                    verticalAlign: 'top',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
</script>