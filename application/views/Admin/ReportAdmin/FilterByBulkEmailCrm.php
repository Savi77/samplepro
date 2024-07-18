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
  
    #crm-table th{
      text-wrap: nowrap;
    }
    
    #crm-table th:first-child{
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
  <table class="table table-striped" id="crm-table">
    <thead>
      <tr>
        <th><div class="d-flex" style="column-gap:10px;" >Select User <br> <input type="checkbox" id="selectAll" /></div> </th>
        <th>ID No.</th>
        <th>Owner</th>
        <th>Type</th>
        <th>Tag</th>
        <th>Company Name</th>
        <th>Contact Person</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Interested In</th>
        <th>Source</th>
        <th>Stage</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>

      <?php $count = 1; foreach ($leads_opportunity as $row) { ?>
        <tr>
          <td>
              <div class="form-check" >
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input-styled-primary" name="crmEmail[]"  value="<?= $row['email'] ?>">
                </label>
              </div>
          </td>
          <td>
            <div style="width:150px;">
            <?= $row['lead_generate_id'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['emp_name'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['customer_type'] ?>
            </div>
          </td>
          <td>
            <div style="width:150px;">
            <?= $row['tag'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:200px;">
            <?= $row['company_name'] ?>
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
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['email'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:200px;">
            <?= $row['prdsrv_name'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['source_title'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:150px;">
            <?= $row['stage_title'] ?>
            </div>
          </td>
          <td>
            <div class="text-wrap-col" style="width:200px;">
            <?= $row['remarks'] ?>
            </div>
          </td>
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
  $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
  });


  $(document).ready(function(){
    var rescheduleTable = $('#crm-table').DataTable( {       
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

