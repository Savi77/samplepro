
<style>
  table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #ajax_table th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #ajax_table th{
      text-wrap:nowrap !important;
    }
    table td:nth-child(2) div a:hover{
        color: #605959 !important;
    }
    table td:nth-child(2) div a{
      color: #000 !important;
      font-weight:600
    }
</style>

  <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
      <h6 class="card-title py-sm-4 card-headings">&nbsp;Leads-Opportunities By Source By Stage For  <?= $GetSourceStageData['source_title'] ?> ( <?= $GetSourceStageData['stage_title']  ?> ) </h6>
      <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body p-0">
      <form class="form-horizontal">
        <table  class="table table-striped" id="ajax_table">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Lead / Opportunity ID</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Mobile No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>Account Manager</th>
                <th>Product/Service</th>
                <th>Expected Revenue</th>
                <th>Expected Closure Date</th>             
            </tr>
          </thead>
          <tbody>
              <?php
                  $count = 1;
                  foreach($ViewDetails as $row) 
                  {                   
                ?>
                <tr>
                      <td>
                        <div>
                        <?= $count; ?>
                        </div>
                      </td>
                        <td>
                          <div style="width:150px;">
                          <a rel="tooltip" title="View Leads / Opportunities Details" target="_blank" href="<?= base_url('admin/Leads/ViewDetails')?>?leadopp_id=<?= $row['lead_id']?>">
                           <?= $row['leadopp_id'] ?>
                          </a>
                          </div>
                          
                        </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['company'] ?>
                        </div>
                      </td>

                      <td>
                        <div style="width:150px;" class="text-wrap-col" >
                        <?= $row['contactperson'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['mobile'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['email'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['address'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['assign_to'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;" class="text-wrap-col">
                        <?= $row['prdsrv_name'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['project_business_value'] ?>
                        </div>
                      </td>
                      <td>
                        <div style="width:150px;">
                        <?= $row['closure_date'] ?>
                        </div>
                      </td>
               </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>
      </form>
  </div>

