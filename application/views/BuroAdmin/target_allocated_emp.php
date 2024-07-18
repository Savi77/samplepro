<div class="modal-header bg-info" style="background-color:#009FDF;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <?php foreach ($view_emp_list as $emplist) 
			{ 
				$target_type1 = $emplist['target_type'];
			 } 
	?> 
  <h6 class="modal-title">Allocated Employee List for <b><?= $target_type1 ?></b></h6>
</div>

<div class="modal-body">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Employee Name</th>
		        <th>Target Value</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    $count=1;
		    foreach ($view_emp_list as $emplist) 
			{ ?>
				 <tr>
			        <td><?= $count ?></td>
			        <td><?= $emplist['emp_name'] ?></td>
			        <td><?= $emplist['target_value'] ?></td>
			      </tr>
			<?php $count++; } ?> 
		    </tbody>
		  </table>
		
</div>
		  