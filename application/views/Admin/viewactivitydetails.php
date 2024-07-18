
<?php

	$scheduledatetime = date("H:ia", strtotime($profile_array->assign_starttime)) . ' To ' . date("H:ia", strtotime($profile_array->assign_endtime));

	if ($profile_array->priority == 'Normal') {
		$Normal = 'selected';
	} else if ($profile_array->priority == 'Low') {
		$Low = 'selected';
	} else if ($profile_array->priority == 'High') {
		$High = 'selected';
	}
?>
<!-- <div class="card border-left-3 border-left-success rounded-left-0 mb-0">
	<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">

		<div class="col-sm-12 p-0">
			<div class="row card-row">
				<div class="col-md-6 width-40" align="left">
					<h6><a href="#">#<?= $profile_array->title; ?></a></h6>
				</div>
				<div class="col-md-6 width-40" align="right">
					<h6><i class=" icon-user-tie"></i><span class="f-10"> &nbsp;: &nbsp;<?= $profile_array->empname; ?></span>
					</h6>
				</div>
			</div>

			<div class="row card-row">
				<div class="col-md-6 width-40" align="left">
					<ul class="list list-unstyled">
						<li><i class="icon-calendar"></i><?= date("d F, Y", strtotime($profile_array->assign_date)); ?> <br> <i style="font-size: 10px;">Created on <?= date("d F, Y", strtotime($profile_array->created_date)); ?></i>
						</li>

					</ul>
				</div>
				<div class="col-md-6 width-40" align="right">
					<ul class="list list-unstyled ">
						<li class="dropdown">
							<i class=" icon-shrink3"></i>&nbsp;: &nbsp;
								<?= $profile_array->product_name; ?>
						</li>
					</ul>
				</div>
			</div>
			<div class="row card-row">
				<div class="col-md-6 width-40" align="left">
					<ul class="list list-unstyled">
						<li><i class="icon-alarm-check"></i> : <?= $scheduledatetime; ?> </li>
					</ul>
				</div>
				<div class="col-md-6 width-40" align="right" style="display:block" ;="">
					<ul class="list list-unstyled ">
						<li class="dropdown">
							<i class="icon-hour-glass"></i>&nbsp;: &nbsp;
							<a href="#" class="label label-info dropdown-toggle" data-toggle="dropdown">
								Normal <span class="caret"></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-right active">
								<li class="<?= $Normal ?>">
									<a href="#">
										<span class="dot dot-red"></span> Normal
									</a>
								</li>
								<li class="<?= $Normal ?>">
									<a href="#">
										<span class="dot dot-yellow"></span> Low
									</a>
								</li>
								<li class="<?= $Normal ?>">
									<a href="#">
										<span class="dot dot-blue"></span> High
									</a>
								</li>
							</ul>
						</li>
					</ul>
					
				</div>
			</div>
			<div class="row card-row">
				<div class="col-md-12" align="left">
					<ul class="list list-unstyled">
						<li><i class=" icon-office"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $profile_array->company_name; ?></span></li>
					</ul>
				</div>

				<div class="col-md-12" align="left">
					<ul class="list list-unstyled">
						<li><i class=" icon-magazine"></i>&nbsp;: &nbsp;<span class="text-semibold"><?= $profile_array->issue; ?></span></li>
					</ul>
				</div>
			</div>
			<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center activity-card-footer">
				<span>

					<i class="icon-alarm-check"></i>
					<span class="font-weight-semibold"> : <?= $scheduledatetime; ?> </span>
				</span>

				<ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">

					<li class="list-inline-item">
						<span><?= ucwords($profile_array->newstatus); ?></b></span>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div> -->

<div class="tab-content">
	<div class="tab-pane active" id="Recent-Task">
		<div class="table-responsive">
			<table class="table table-striped" style="border:1px solid #dddddd">
				<thead>
					<tr>
					    <th>Task ID</th>  
						<th>Product-Service</th>  
						<th>Contact Details</th>  
						<th>Task Owner</th>  
						<th>Planned Date Time</th>  
						<th>Priority</th>  
						<th>Status</th>  
					</tr>
				</thead>
				<tbody>
				    <td style="text-wrap: nowrap;"><?= $profile_array->title; ?></td>  
					<td><?= $profile_array->product_name; ?></td>  
					<td><?= $profile_array->contact_person_name1;?></td>  
					<td><?= $profile_array->empname; ?></td>  
					<td><?= date("d F, Y", strtotime($profile_array->assign_date)); ?><br><small><?= $scheduledatetime; ?></small></td>  
					<td>
					    <div>
                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                <li><?= ucwords($profile_array->priority); ?></li>
                            </ul>
                        </div>
					</td>  
					<td>
						<div>
                            <ul class="pull-right dflex Padding-0 m-auto text-black">
                                <li><?= ucwords($profile_array->newstatus); ?></li>
                            </ul>
                        </div>
					</td>  
				</tbody>
            </table>
        </div>
	</div>
</div>

<!-- <script> 
$(document).ready(function(){
    var rescheduleTable = $('#myTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        order: [[0, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        // "buttons": [
        //     {
        //         extend: 'colvis',
        //         text: '<i class="icon-grid3"></i> <span class="caret"></span>',
        //         className: 'btn bg-indigo-400 btn-icon'
        //     }
        // ],
        "drawCallback": function() {
                popoverOptions = {
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.my-popover-content').html();
                },
                placement: 'bottom',
                container: 'body',
                html: true,
                sanitize: false,
                // selector: '[data-toggle="popover"]',
            };
            $('.panel-button').popover(popoverOptions);

            $('.panel-button').click(function (e) {
                e.stopPropagation();
            });
            // alert($("a").attr("data-dt-idx"));
            if ('.paginate_button.current') 
            {
                
                
                $(".panel-button").click(function()
                {
                    var currentPage_default = 1;
                    rescheduleTable.on('page.dt', function() {
                        var currentPage = rescheduleTable.page.info().page + 1;
                        
                    if(currentPage_default != currentPage)
                    {
                        if (($('.popover-body').css('display','block'))) 
                        {
                            $('.popover-body').css('display','none');
                            // var currentPage_default = currentPage;
                        }
                    }
                   
                });
                    });
                
            }
            $('.panel-button').on('click', function (e) {
                $('.panel-button').not(this).popover('hide');
            });
            }
        // stateSave: true,
        // columnDefs: [
        //     {
        //         targets: -1,
        //         visible: true,
        //     }
        // ]
    } );

    // $('#myTable').dataTable();
});
</script> -->