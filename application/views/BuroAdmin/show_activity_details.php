       



        <div class="modal-header bg-info" style="background-color:#00619F;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><i class="icon-file-text3"> </i> &nbsp;Activity Details</h6>
        </div>
        <div class="modal-body">

        <div class="table-responsive">
          <table class="table table-bordered table-framed table-sm">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Creation DateTime</th>
                  <th>Account Manager</th>
                  <th>Ticket No.</th>
                  <th>Remark</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
              <?php 
	               $count=1;
	               foreach ($task_status as $res) 
	               {
	                    $taskstatus=$res->status;
	                    
	                    if($taskstatus=='in_progress')
	                    {
	                      $taskstatus='<span class="label label-primary"><b>In Progress</b></span>';
	                    }
	                   else if($taskstatus=='reschedule')
	                    {
	                      $taskstatus='<span class="label label-info"><b>Reschedule</b></span>';

	                    }
	                   else if($taskstatus=='pending')
	                    {
	                       $taskstatus='<span class="label label-warning" style="background-color: #FF9800;border-color: #FF9800;"><b>pending</b></span>';
	                    }
	                   else if($taskstatus=='completed')
	                    {
	                       $taskstatus='<span class="label label-success"><b>completed</b></span>';
	                    }

	                   else if($taskstatus=='completed')
	                    {
	                       $taskstatus='<span class="label label-success"><b>completed</b></span>';
	                    }

                       else if($taskstatus=='in_complete')
                        {
                          $taskstatus='<span class="label label-danger"><b>In Completed</b></span>';
                        }


	              ?>
	                  <tr>
	                      <td><?= $count;?></td>
	                      <td><?= date("d F, Y",strtotime($res->created_date));?><br/><?= date("h:i a",strtotime($res->created_date));?></td>


	                      <td><?= $res->empname;?></td>
	                      <td><?= $res->ticket_no;?></td>
	                      <td><?= $res->remark;?></td>
	                      <td><?= $taskstatus;?></td>
	                  </tr>
	               <?php
	                  $count++; 
	               } 
               ?>     
            </tbody>
          </table>
        </div>


 
       </div>
       
