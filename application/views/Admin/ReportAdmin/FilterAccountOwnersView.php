
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
                <th>Resource</th>
                <th>Numbers of Accounts</th>
                <th class="d-none" ></th>
                <th class="d-none" ></th>
                <th class="d-none" ></th>
            </tr>
          </thead>
          <tbody>
              <?php
                  
                  $count = 1;
                  foreach($AccountOwners as $row) 
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
                        <?= $row['emp_name'] ?>
                        </div>
                    </td>
                    <td>
                        <div style="width:200px;">
                        <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="View Account Manger"  onclick="ViewDetails(id)" id="<?= $row['emp_id'] ?>"><?= $row['total'] ?></a>
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
  Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Account Manger <br/><p style="font-size:12px;color:#FF5732;"></p>'
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
                    foreach ($AccountOwners as $Employee) {

                    ?> {
                            name: '<?= $Employee['emp_name']; ?>',
                            y: <?= $Employee['total']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } ?>
                ]
            }],
        });
</script>

<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>



        