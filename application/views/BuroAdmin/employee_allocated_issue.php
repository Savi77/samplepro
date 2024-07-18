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
.tablechange
{
    padding: 0px;
}
</style>


<?php $array_count=count($issue_detail_list);
  if ($array_count>0) 
  {
 ?>
<table border="1px" >
  <thead>
    <tr>
    	<th class="tablechange">#</th>
      <th class="tablechange" style="width:14%">Ticken No</th>
      <!-- <th class="tablechange">Customer Name</th> -->
      <th class="tablechange" style="width:30%">Company Name</th>
      <th class="tablechange" style="width:25%">Product Name</th>
      <th class="tablechange">Status</th>
      <th class="tablechange">Start Time</th>
      <th class="tablechange">End Time</th>
    </tr>
  </thead>
  <tbody>
    	<?php 
    	$count = 1;
    	foreach ($issue_detail_list as $result) 
    	{ ?>
       <tr>
      <td class="tablechange"><?= $count ?></td>
      <td class="tablechange" style="width:14%"><?= $result['ticket_no'] ?></td>
      <!-- <td class="tablechange"><?= $result['contact_person_name1'] ?></td> -->
      <td class="tablechange" style="width:30%"><?= $result['company_name'] ?></td>
      <td class="tablechange" style="width:25%"><?= $result['product_name'] ?></td>
      <td class="tablechange"><?= $result['status'] ?></td>
      <td class="tablechange"><?= $result['assign_starttime'] ?></td>
      <td class="tablechange"><?= $result['assign_endtime'] ?></td>
      </tr>
      <?php $count++; } ?>
  </tbody>
</table>
<?php } else { ?>
  <div class="alert alert-primary no-border">
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
      <span class="text-semibold">Alert!</span> There is no schedule allocated for selected employee on selected date.
  </div>
<!-- <span>There is no event for this employee</span> -->
<?php } ?>