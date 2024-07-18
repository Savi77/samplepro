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

<table class="table table-striped" id="all_activity_filter_table">
  <thead>
    <tr>
      <th>Sr No</th>
      <th>Segments</th>
      <th>Total</th>
      <th class="d-none">Sucess</th>
      <th class="d-none">Total</th>
      <th class="d-none">Average</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($SegmentWiseContact as $row) {
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
            <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;"
              rel="tooltip" title="View Segments Wise Contacts" onclick="ViewDetails(id)" id="<?= $row['business_id'] ?>">
              <?= $row['total'] ?>
            </a>
          </div>
        </td>
        <td class="d-none">
          <?= $count; ?>
        </td>
        <td class="d-none">
          <?= $count; ?>
        </td>
        <td class="d-none">
          <?= $count; ?>
        </td>
      </tr>
      <?php $count++;
    } ?>
  </tbody>
</table>



<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>

<script>
  Highcharts.chart('container3', {
            title: {
                text: 'Segment Contacts <br/><p style="font-size:12px;color:#FF5732;"></p>',
            },
            
            colors: [
                '#4caefe',
                '#3fbdf3',
                '#35c3e8',
                '#2bc9dc',
                '#20cfe1',
                '#16d4e6',
                '#0dd9db',
                '#03dfd0',
                '#00e4c5',
                '#00e9ba',
                '#00eeaf',
                '#23e274'
            ],
            xAxis: {
                categories: [
                    <?php
                    foreach ($SegmentWiseContact as $Employee) {
                    ?>
                    '<?= $Employee['business_name']; ?>',
                    <?php } ?>
                ]
            },
            series: [{
                type: 'column',
                name: 'Total',
                borderRadius: 5,
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($SegmentWiseContact as $Employee) {
                    ?>
                    <?= $Employee['total']; ?>,
                    <?php } ?>
                ],
                showInLegend: false
            }]
        });
</script>