<?php foreach ($view_emp_list as $emplist) {
		$target_type1 = $emplist['target_type'];
	}
?>
<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
	<h6 class="card-title py-sm-4 card-headings">Allocated Resource List for <b><?= $target_type1 ?></b></h6>	
	<button type="button" class="close" onclick="updateUI_view_button_close()" id="view_button_close">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped " style="border: 1px solid #dddddd">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Resource Name</th>
				<th>Target Value</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count = 1;
			foreach ($view_emp_list as $emplist) { ?>
				<tr>
					<td><?= $count ?></td>
					<td><?= $emplist['emp_name'] ?></td>
					<td><?= $emplist['target_value'] ?></td>
				</tr>
			<?php $count++;
			} ?>
		</tbody>
	</table>

</div>