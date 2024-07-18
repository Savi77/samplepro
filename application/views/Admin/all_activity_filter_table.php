

        <table class="table datatable-basic" id="all_activity_filter_table">     
          <thead>
            <tr>
                <th>#</th>
                <th>Source</th>
                <th>Total</th>
                <th>No. of Won Lead</th>
                <th>Sucess Ratio</th>
                <th>Total Revenue</th>
                <th>Average Lead per Lead</th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($Lead_Opportunity_by_Source as $row) 
                  {                       
                ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $row['source'] ?></td>
                    <td><?= $row['total'] ?></td>
                    <td><?= $row['no_of_close'] ?></td>
                    <td><?= $row['ratio'] ?></td>                      
                    <td><?= $row['total_revenue'] ?></td> 
                    <td><?= $row['total_revenue'] ?></td> 
                </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>