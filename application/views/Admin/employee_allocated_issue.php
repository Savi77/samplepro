<style>
     /*table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}*/
     .tablechange {
          padding: 1px 10px;
     }

     table td {
          color: #333333 !important;
          word-wrap: break-word;
     }
</style>


<?php $array_count = count($issue_detail_list);
if ($array_count > 0) {
     ?>
     <table class="table table-striped" style="border:1px solid #dddddd;">
          <thead>
               <tr>
                    <th>Sr No</th>
                    <th>Task ID</th>
                    <!-- <th>Customer Name</th> -->
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Status</th>
                    <th>Start Time</th>
                    <th>End Time</th>
               </tr>
          </thead>
          <tbody>
               <?php
               $count = 1;
               foreach ($issue_detail_list as $result) { ?>
                    <tr>
                         <td style="width:35px;text-wrap:wrap;">
                              <div>
                                   <?= $count ?>
                              </div>
                         </td>
                         <td>
                              <div style="width:100px;">
                                   <?= $result['ticket_no'] ?>
                              </div>
                         </td>
                         <!-- <td><?= $result['contact_person_name1'] ?></td> -->
                         <td>
                              <div style="width:150px;text-wrap:wrap;">
                                   <?= $result['company_name'] ?>
                              </div>
                         </td>
                         <td>
                              <div style="width:150px;text-wrap:wrap;">
                                   <?= $result['product_name'] ?>
                              </div>
                         </td>
                         <td>
                              <div style="width:100px;">
                                   <?= $result['status'] ?>
                              </div>
                         </td>
                         <td>
                              <div style="width:100px;">
                                   <?= $result['assign_starttime'] ?>
                              </div>
                         </td>
                         <td>
                              <div style="width:100px;">
                                   <?= $result['assign_endtime'] ?>
                              </div>
                         </td>
                    </tr>
                    <?php $count++;
               } ?>
          </tbody>
     </table>
<?php } else { ?>
     <!-- <div class="alert alert-primary no-border">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> -->
     <span class="text-semibold" style="color: #f00 !important">Alert! There is no task assigned for selected employee on
          selected date.</span>
     <!-- </div> -->
     <!-- <span>There is no event for this employee</span> -->
<?php } ?>