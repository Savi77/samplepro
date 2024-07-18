

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
    /* table td:nth-child(2) div a:hover{
        color: #605959 !important;
    } */
</style>
    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
      <h6 class="card-title py-sm-4 card-headings">
        <!-- <i class="icon-shrink3" style="zoom:1.1; "></i> -->
          &nbsp;Segments Wise Contacts For <?= $FetchSegmentWiseContact->business_name; ?></h6>
      <button type="button" class="close" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body1">
        <table  class="table table-striped" id="ajax_table">     
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
                      <div>
                      <?= $count; ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:200px;" class="text-wrap-col">
                      <?= $row['company_name'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:200px;" class="text-wrap-col">
                      <?= $row['contact_person_name1'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;">
                      <?= $row['mobile'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:200px;" class="text-wrap-col">
                      <?= $row['email'] ?>
                      </div>
                    </td> 
                    <td>
                      <div style="width:150px;" class="text-wrap-col">
                      <?= $row['city'] ?>
                      </div>
                    </td>
                    <td>
                      <div style="width:150px;" class="text-wrap-col">
                      <?= $row['address'] ?>
                      </div>
                    </td>
               </tr>
               <?php $count++;  } ?> 
          </tbody>
        </table>
    </div>    