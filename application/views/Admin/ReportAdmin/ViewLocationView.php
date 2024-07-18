<div class="modal-header bg-info" style="background-color:#009FDF;">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h6 class="modal-title">Location wise Contact : <?= $FetchLocationData->location; ?></h6>
</div>
<div class="modal-body">
    <form class="form-horizontal">
      <table  class="table datatable-basic" id="ajax_table">     
        <thead>
          <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Contact Person</th>
              <th>Mobile No.</th>
              <th>Email</th>
              <th>City</th>
              <th>Address</th>
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
                  <td><?= $row['company_name'] ?></td>
                  <td><?= $row['contact_person_name1'] ?></td>
                  <td><?= $row['mobile'] ?></td>
                  <td><?= $row['email'] ?></td>                      
                  <td><?= $row['city'] ?></td>
                  <td><?= $row['address'] ?></td>
             </tr>
             <?php $count++;  } ?> 
        </tbody>
      </table>
    </form>
</div>