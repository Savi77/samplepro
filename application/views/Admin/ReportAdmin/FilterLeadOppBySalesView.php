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
                <th>Resource</th>
                <th>Total</th>
                <th class="d-none" ></th>
                <th class="d-none" ></th>
                <th class="d-none" ></th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($Lead_Opportunity_by_Product as $row) 
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
                      <div style="width:150px;">
                      <a rel="tooltip" title="View Sales Force Scores"  onclick="ViewDetails(id)" id="<?= $row['emp_id'] ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;"><?= $row['total'] ?></a>
                      </div>
                    </td>
                     <td class="d-none" ></td>
                     <td class="d-none" ></td>
                     <td class="d-none" ></td>
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
                type: 'column',
                // styledMode: true
            },

            title: {
                text: 'Sales Force Scores<br/><p style="font-size:12px;color:#FF5732;"></p>',
                // align: 'left'
            },

            // subtitle: {
            //     text: 'Source: ' +
            //         '<a href="https://www.worlddata.info/average-bodyheight.php"' +
            //         'target="_blank">WorldData</a>',
            //     align: 'left'
            // },

            xAxis: {
                categories: [
                    <?php
                    foreach ($Lead_Opportunity_by_Product as $Employee) {
                    ?>
                    '<?= $Employee['emp_name']; ?>',
                    <?php } ?>
                ]
            },

            yAxis: [{ // Primary axis
                className: 'highcharts-color-0',
                title: {
                    text: 'Leads'
                }
            }, { // Secondary axis
                className: 'highcharts-color-1',
                opposite: true,
                title: {
                    text: 'Opportunities'
                }
            }],

            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },

            series: [{
                name: 'Lead',
                data: [
                    <?php
                     foreach ($Lead_Opportunity_by_Product as $Employee) {
                        
                    ?>
                    <?= $Employee['lead'];?>,
                    <?php } ?>
                ],
                // tooltip: {
                //     valueSuffix: ' kg'
                // }
            }, {
                name: 'Opportunity',
                data: [
                    <?php
                     foreach ($Lead_Opportunity_by_Product as $Employee) {
                    ?>
                    <?= $Employee['opp'];?>,
                    <?php } ?>
                ],
                yAxis: 1
            }]
        });
</script>