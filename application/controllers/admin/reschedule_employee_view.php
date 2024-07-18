<div class="modal-header bg-info" style="background-color:#F04458;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title">Reschedule details</h6>
</div>
<br>
<span class="label label-primary" style="font-size: 15px; margin-left: 19px;"> </span>
<div class="modal-body">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <!-- <th>Status</th> -->
		        <th>Issue Raised Date</th>
		        <th>Schedule Date</th>
		        <th>Start Time</th>
		        <th>End Time</th>
		        <!-- <th>Status</th> -->
		      </tr>
		    </thead>
		     <tbody>
			    <?php foreach ($reschedule_list as $rescdl) 
				{ ?>
					 <tr>
					 	<td><?= date("d M Y", strtotime($rescdl['issue_raise_date'])); ?></td>
					 	<td><?= date("d M Y", strtotime($rescdl['assign_date'])); ?></td>
				        <td><?= $rescdl['assign_starttime'] ?></td>
				        <td><?= $rescdl['assign_endtime'] ?></td>
				      </tr>
				<?php } ?> 
		    </tbody>
		  </table>
		
</div>


