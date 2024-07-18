<style>
      #all_activity_filter_table_data th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }

    #all_activity_filter_table_data_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),
    #all_activity_filter_table_data_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),
    #all_activity_filter_table_data_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3) {
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
      <th>Resource</th>
      <th>Email</th>
      <th>Mobile No.</th>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
      <th class="d-none" ></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach ($AvailableTimeSlots as $row) {
    ?>
      <tr>
        <td>
          <div>
          <?= $count; ?>
          </div>
        </td>
        <td>
          <div style="width:150px;" class="text-wrap-col">
          <?= $row['name'] ?>
          </div>
        </td>
        <td>
          <div style="width:200px;" class="text-wrap-col">
          <?= $row['email'] ?>
          </div>
        </td>
        <td>
          <div style="width:150px;">
          <?= $row['mobile_no'] ?>
          </div>
        </td>
        <td class="d-none" ></td>
        <td class="d-none" ></td>
        <td class="d-none" ></td>
      </tr>
    <?php $count++;
    } ?>
  </tbody>
</table>
<script>
  $('#all_activity_filter_table').DataTable({
    // buttons: {
    //   dom: {
    //     button: {
    //       className: 'btn btn-default'
    //     }
    //   },
    //   buttons: [
    //     'copyHtml5',
    //     'excelHtml5',
    //     'csvHtml5',
    //     'pdfHtml5'
    //   ]
    // }
  buttons: 
  [
      {
          extend: 'colvis',
          text: '<i class="icon-grid3"></i> <span class="caret"></span>',
          className: 'btn bg-indigo-400 btn-icon'
      }
  ],

  });
</script>