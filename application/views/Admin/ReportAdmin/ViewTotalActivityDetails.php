<style>
  table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #ajax_table2 th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #ajax_table2 th{
      text-wrap:nowrap !important;
    }
</style>

                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <h6 class="card-title py-sm-4 card-headings">&nbsp;Contact With Task Details Of <?= $FetchCustomerData->company_name; ?></h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body p-0">
                    <form class="form-horizontal">
                      <table  class="table table-striped" id="ajax_table2">     
                        <thead>
                          <tr>
                              <th>Sr No</th>
                              <th>Ticket No.</th>
                              <th>Product Name</th>
                              <th>Issue</th>
                              <th>Status</th>
                              <th>Assign To</th>
                              <th>Priority</th>
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
                                    <?= $row['ticket_no'] ?>
                                    </div>
                                  </td>
                                  <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?= $row['product_name'] ?>
                                    </div>
                                  </td>
                                  <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?= $row['issue'] ?>
                                    </div>
                                  </td>
                                  <td>
                                    <div style="width:150px;" >
                                    <?= ucwords($row['status']) ?>
                                    </div>
                                  </td>  
                                  <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?= $row['assign_to'] ?>
                                    </div>
                                  </td>
                                  <td>
                                    <div style="width:150px;" >
                                    <?= $row['priority'] ?>
                                    </div>
                                  </td>
                             </tr>
                             <?php $count++;  } ?> 
                        </tbody>
                      </table>
                    </form>
                </div>

