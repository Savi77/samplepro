

        <table  class="table datatable-basic" id="all_activity_filter_table">     
          <thead>
            <tr>
                <th>#</th>
                <th>Location</th>
                <th>Count</th>
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($LocationWiseContact as $row) 
                  {                   
                ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $row['location'] ?></td>
                    <td>
                         <a  title="Location wise Contact"  onclick="ViewDetails(id)" id="<?= $row['location_id'] ?>">
                        <b><?= $row['total'] ?></b>
                       </a>
                    </td> 
               </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>