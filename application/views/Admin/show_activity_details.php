	   <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
			<h6 class="card-title py-sm-4 card-headings">Task Details </h6>
			<button type="button" class="close" onclick="updateUI_show_activity_details_button_close()" id="show_activity_details_button_close">&times;</button>
		</div>
       <div class="modal-body">
			<div class="table-responsive">
				<table class="table table-framed table-sm table-striped" style="border:1px solid #dddddd">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Account Manager</th>
							<th>Creation DateTime</th>
							<!-- <th>Ticket No.</th> -->
							<th>Remark</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							foreach ($task_status as $res) {
								$taskstatus = $res->status;

								if ($taskstatus == 'in_progress') {
									$taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">In Progress</button>';
								} else if ($taskstatus == 'reschedule') {
									$taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Reschedule</button>';
								} else if ($taskstatus == 'pending') {
									$taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Pending</button>';
								} else if ($taskstatus == 'completed') {
									$taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">Completed</button>';
								} else if ($taskstatus == 'in_complete') {
									$taskstatus = '<button type="button" class="status-btn" style="cursor:default !important">In-Completed</button>';
								}


							?>
							<tr>
								<td>
									<div style="width:35px;">
										<?= $count; ?>
									</div>
								</td>
								<td>
									<div style="width:150px;text-wrap:wrap;">
										<?= $res->empname; ?>
									</div>
								</td>
								<td>
									<div style="width:150px;">
										<?= date("d F Y", strtotime($res->created_date)); ?><br /><?= date("h:i a", strtotime($res->created_date)); ?>
									</div>
								</td>
								
								<!-- <td>
									<div style="width:150px;">
										<?= $res->ticket_no; ?>
									</div>
								</td> -->
								<td>
									<div style="width:150px;text-wrap:wrap;">
										<?= $res->remark; ?>
									</div>
								</td>
								<td>
									<div style="width:150px;">
										<?= $taskstatus; ?>
									</div>
								</td>
							</tr>
						<?php
								$count++;
							}
							?>
					</tbody>
				</table>
			</div>
       </div>