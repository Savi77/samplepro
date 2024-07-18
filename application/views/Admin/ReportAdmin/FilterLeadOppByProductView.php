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
                  <th>Products-Services</th>
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
                        <?= $row['product_name'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <a rel="tooltip" title="View Product Leads"  onclick="ViewDetails(id)" id="<?= $row['product_id'] ?>" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;">
                      <?= $row['total'] ?></a>
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
<table id="datatable" style="display:none;">
        <thead>
            <tr>
                <th></th>
                <th>Leads</th>
                <th>Opportunities</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($Lead_Opportunity_by_Product as $row) 
            {
                
        ?>
            <tr>
                <th><?= $row['product_name']; ?></th>
                <td><?= $row['lead'];?></td>
                <td><?= $row['opp'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<script>
  Highcharts.chart('container3', {
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Product Leads<br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            subtitle: {
                text:
                    ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Amount'
                }
            }
        });
</script>