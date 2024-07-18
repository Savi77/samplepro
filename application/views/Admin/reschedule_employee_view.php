<div class="modal-header bg-info" style="background-color:#009FDF;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Reschedule details</h6>
</div>
<br>
<span class="label label-primary" style="font-size: 15px; margin-left: 19px;"><?= $reschedule_list['name'] ?></span>
<div class="modal-body">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Schedule</th>
		        <th>Re-schedule</th>
		        <!-- <th>Issue Raised Date</th> -->
		        <th>Schedule Date</th>
		        <th>Start Time</th>
		        <th>End Time</th>
		        <!-- <th>Remark</th> -->
		      </tr>
		    </thead>
		     <tbody>
			    <?php foreach ($reschedule_list as $rescdl) 
				{ ?>
					 <tr>
					 	<td align="center"><?= $rescdl['prev_name'] ?></td>
					 	<td align="center"><?= $rescdl['name'] ?></td>
					 	<td><?= date("d M Y", strtotime($rescdl['assign_date'])); ?></td>
				        <td><?= $rescdl['assign_starttime'] ?></td>
				        <td><?= $rescdl['assign_endtime'] ?></td>
				        <!-- <td></td> -->
				      </tr>
				<?php } ?> 
		    </tbody>
		  </table>
		
</div>


