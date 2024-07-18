

<!-- class="datatable-basic"   id="ajax_table"-->
<div class="table-responsive">
        <table  class="table table-striped" style="border:1px solid #dddddd;">     
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Company Name</th>
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
                    <td>
                      <div style="width:35px;">
                        <?= $count; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                        <?= $row['company_name'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                        <?= $row['contact_person_name1'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                        <?= $row['mobile'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:180px;word-wrap:break-word;">
                        <?= $row['email'] ?>
                      </div>
                    </td>                      
                    <td>
                      <div style="width:100px;">
                        <?= $row['city'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:200px;">
                        <?= $row['address'] ?>
                      </div>
                    </td>
               </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>
</div>
        