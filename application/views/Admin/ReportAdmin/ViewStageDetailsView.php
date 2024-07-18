


  <div class="modal-header bg-info" style="background-color:#009FDF;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h6 class="modal-title">Stage Leads :  <?= $GetSourceStageData->source_title.' :- '. $GetSourceStageData->stage_title; ?></h6>
  </div>
  <div class="modal-body">
      <form class="form-horizontal">
        <table  class="table datatable-basic" id="ajax_table">     
          <thead>
            <tr>
                <th>#</th>
                <th style="width: 140px;">LeadOpp. ID</th>
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
                      <td><?= $count; ?></td>
                        <td>
                          <a  title="View Lead | Opp. Details" target="_blank" href="<?= base_url('admin/Leads/ViewDetails')?>?leadopp_id=<?= $row['lead_id']?>">
                           <?= $row['leadopp_id'] ?>
                          </a>
                        </td>
                      <td><?= $row['company'] ?></td>
                      <td><?= $row['contactperson'] ?></td>
                      <td><?= $row['mobile'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['address'] ?></td>

                      <td><?= $row['assign_to'] ?></td>
                      <td><?= $row['prdsrv_name'] ?></td>
                      <td><?= $row['project_business_value'] ?></td>
                      <td><?= $row['closure_date'] ?></td>
               </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>
      </form>
  </div>

