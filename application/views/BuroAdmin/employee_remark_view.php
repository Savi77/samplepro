<div class="modal-header bg-info" style="background-color:#009FDF;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h6 class="modal-title"><?= $remark_list['employee_name'] ?>Remark details</h6>
</div>

<div class="modal-body">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		      	<th>Employee Name</th>
		        <th>Status</th>
		        <th>Remark</th>
		        <th>Remark Date</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($remark_list as $remark) 
			{ ?>
				 <tr>
				 	<td><?= $remark['employee_name'] ?></td>
			        <td><?= $remark['status'] ?></td>
			        <td><?= $remark['remark'] ?></td>
			        <td><?= date("d M Y", strtotime($remark['created_date'])); ?></td>
			      </tr>
			<?php } ?> 
		    </tbody>
		  </table>
		
</div>