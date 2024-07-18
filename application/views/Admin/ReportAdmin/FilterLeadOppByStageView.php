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
      <th>Stage</th>
      <th>Total</th>
      <th class="d-none">Sucess</th>
      <th class="d-none">Total</th>
      <th class="d-none">Average</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($LeadOppByStage as $row) {
      ?>
      <tr>
        <td>
          <div>
            <?= $count; ?>
          </div>
        </td>
        <td>
          <div class="text-wrap-col" style="width:200px;">
            <?= $row['stage_title'] ?>
          </div>
        </td>
        <td>
          <div style="width:150px;">
            <a rel="tooltip" title="View Stage Leads" onclick="ViewDetails(id)" id="<?= $row['stage_id'] ?>"
              style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;">
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
   Highcharts.chart('container2', {
      chart: {
          type: 'column'
      },

      title: {
          text: 'Stage Leads'
      },

      legend: {
          align: 'right',
          verticalAlign: 'middle',
          layout: 'vertical'
      },

      xAxis: {
          categories: [
              <?php
              foreach ($LeadOppByStage as $stage) {
              ?> 
              '<?= $stage['stage_title']; ?>',
              <?php } ?>
          ],
          // labels: {
          //     x: -10
          // }
      },

      yAxis: {
          allowDecimals: false,
          title: {
              text: 'Amount'
          }
      },

      series: [{
          name: 'Lead',
          data: [
              <?php
              foreach($LeadscountByStagesSummary as $countlead)
              {
              ?>
              <?= $countlead['StageCount']; ?>,
              <?php } ?>
          ]
      }, {
          name: 'Opportunity',
          data: [
              <?php
              foreach($OpportunitycountByStagesSummary as $countopp)
              {
              ?>
              <?= $countopp['StageCount']; ?>,
              <?php } ?>
          ]
      }],

      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      align: 'center',
                      verticalAlign: 'bottom',
                      layout: 'horizontal'
                  },
                  yAxis: {
                      labels: {
                          // align: 'left',
                          x: 0,
                          y: -10
                      },
                      title: {
                          text: null
                      }
                  },
                  subtitle: {
                      text: null
                  },
                  credits: {
                      enabled: false
                  }
              }
          }]
      }
  });
</script>