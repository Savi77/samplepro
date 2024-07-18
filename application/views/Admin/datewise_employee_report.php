  <table id="example2" class="display" cellspacing="0">
      <thead>
        <tr>
          <th style="text-align: center;">#</th>
          <th style="text-align: center;">employee name</th>
          <th style="text-align: center;">Company Name</th>
          <th style="text-align: center;">Location</th>
          <th style="text-align: center;">From</th>
          <th style="text-align: center;">To</th>
          <th style="text-align: center;">Interval</th>
        </tr>
      </thead>
      <tbody>
           <?php
                $i=1;
                foreach ($Tracking_Report as $track)  { ?>
                <tr class="gradeA">
                      <td style="text-align: center;"><?=   $i; ?></td>
                      <td style="text-align: center;"><?=   $track['emp_name']; ?></td>
                      <td style="text-align: center;"><?=   $track['company_name']; ?></td>
                      <td style="text-align: center;"><?=   $track['location']; ?></td>
                      <td style="text-align: center;"><?=   $track['from']; ?></td>
                      <td style="text-align: center;"><?=   $track['to']; ?></td>
                      <td style="text-align: center;"><?=   $track['interval']; ?></td>
                </tr>
          <?php $i++; } ?>
      </tbody>
    </table>