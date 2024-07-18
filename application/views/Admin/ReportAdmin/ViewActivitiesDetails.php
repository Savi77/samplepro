<!--  -->


                <div class="modal-header bg-info" style="background-color:#009FDF;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Activity Details :  <?= $FetchScheduleType->type_name;?></h6>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                      <table  class="table datatable-basic" id="ajax_table2">     
                        <thead>
                          <tr>
                              <th>#</th>
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
                                  <td><?= $count; ?></td>
                                  <td><?= $row['ticket_no'] ?></td>
                                  <td><?= $row['product_name'] ?></td>
                                  <td><?= $row['issue'] ?></td>
                                  <td><?= ucwords($row['status']) ?></td>                      
                                  <td><?= $row['assign_to'] ?></td>
                                  <td><?= $row['priority'] ?></td>
                             </tr>
                             <?php $count++;  } ?> 
                        </tbody>
                      </table>
                    </form>
                </div>
