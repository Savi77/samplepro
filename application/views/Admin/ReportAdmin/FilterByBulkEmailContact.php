<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_extension_colvis.js"></script>
<style>
  .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    table td{
        color: #000 !important;
   }
   .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
  
    #conatct-table th{
      text-wrap: nowrap;
    }
    
    #conatct-table th:first-child{
        width: 150px !important;
        text-wrap: nowrap !important;
    }

   
    .dt-buttons{
        color: #fff !important;
        background-color: #1e6196 !important;
        border-color: #1e6196 !important;
        width: 50px;
        border-radius: 0.25rem;
    }
    .dt-buttons:hover{
        color: #fff !important;
    }
    .dt-buttons .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
        color: #fff;
    }
    .dt-buttons .buttons-columnVisibility{
        width:100%;
    }
    .icon-grid3:before {
        color: #fff;
    }
    .datatable-header {
        padding: 1.25rem 1.25rem 0 1.25rem !important;
    }
</style>
<form action="<?= base_url(); ?>admin/ReportAdmin/Reports/mail_write" method="post">

  <table class="table table-striped" id="conatct-table">
    <thead>
      <tr>
        <th>
          <div class="d-flex" style="column-gap:10px;">
            Select All  <span> <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="selectAll">
              <span class="custom-control-label p-0"></span>
            </label>
          </div>
          </span>
        </th>
        <th>Customer Name</th>
        <th>Contact Person</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      foreach ($leads_opportunity as $row) {
        if ($row->cust_type == 'primary') {
          $bgcolor = "#efefef";
        } else {
          $bgcolor = "white";
        }
        if ($count % 2 == 0) {
          $bg_color = 'class="bg"';
        } else {
          $bg_color = '';
        }
      ?>
        <tr>
          <td class="text-center">
            <span>
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="crmEmail[]" value="<?= $row['email'] ?>">
                <span class="custom-control-label p-0"></span>
              </label>
            </span>
          </td>
          <td>
            <div class="media" >
              <div class="media-body align-self-center text-wrap-col" style="width:150px;">
                <a ><?= ucwords($row['company_name']) ?></a>
                <div class="text-muted font-size-sm">
                  Created On : <?= date("d M Y", strtotime($row['created_date'])) ?>
                </div>
              </div>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['contact_person_name1'] ?>
            </div>
          </td>
          <td>
            <div style="width:150px;">
            <?= $row['phone_no'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:200px;">
            <?= $row['email'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:200px;">
            <?= $row['address'] ?>
            </div>
          </td>
          <?php if ($row['cust_type'] == 'primary') { ?>
            <td>
              <div style="width:150px;">
              <button type="button" style="width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Primary</button>
              </div>
            </td>
          <?php  } else { ?>
            <td>
              <div style="width:150px;">
              <button type="button" style="width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: center;font-size: 12px;border: 1px solid transparent;">Secondary</button>
              </div>
            </td>
          <?php } ?>

        </tr>
      <?php $count++;
      } ?>
    </tbody>
  </table>
  <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
    <span id="loader_gif"></span>
    <button class="btn btn-primary" type="submit">Submit <i class="icon-arrow-right14 position-right"></i></button>
    
  </div>
</form>
<script>
  $('#selectAll').click(function(e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
  });

  // $('#conatct-table').DataTable({
  //   "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]]
  // });


  $(document).ready(function(){
    var rescheduleTable = $('#conatct-table').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        order: [[0, 'desc']],
        
        "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        
      });
    });
</script>

<script>

$(document).ready(function () {
       
       $(document).click(function (e) {
           if (($('.dt-buttons').has(e.target).length == 0) || $(e.target).is('.close')) {
               $('.dt-button-collection').hide();
               $('.dt-button-background').css('position','relative');
               
           }
       });
});


</script>