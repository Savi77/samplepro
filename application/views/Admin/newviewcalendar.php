<?php $this->load->view('Admin/includes/n-header');    ?>

<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h6 class="card-title py-sm-4 card-headings">Calender</h6>
                </div>
                <div class="card-body">
                    <div id="fullcalendar-languages"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="issue_details" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content border">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"> <i class="icon-drawer3" ></i> Customer Details</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="bind_issue_data">
                
            </div>
        </div>
    </div>
</div>

<div id="EditExpenseModalAll" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content border">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Task Details</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="complaint_model_data_all">
                
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function(){        
        $('#fullcalendar-languages').fullCalendar({
            header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?= date('Y-m-d') ?>',
			timezone: 'local',
			selectable: true,
			eventLimit: true,
			views: {
				month: {
					eventLimit: 3
				}
			},
			events: <?php echo json_encode($schedule_data); ?>,
			eventClick: function(calEvent, jsEvent, view) {
				// console.log('Event: ' + calEvent.title);
				show_event_data(calEvent.id);
				// remark_list(calEvent.id,calEvent.title);
				// console.log('Event: ' + calEvent.products[0].name);
			},
        });
    });

    function show_event_data(schedule_id) {
		var datastring = 'schedule_id=' + schedule_id;
		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/dashboard/eventdata'); ?>",
			data: datastring,
			success: function(data) {
				// alert(data);

				$('#EditExpenseModalAll').modal('show');
				$('#complaint_model_data_all').html(data);
			},
			error: function() {
				alert('Error while request..');
			}
		});
	}

	function remark_list(schedule_id, ticket_no) {
		var datastring = 'ticket_no=' + ticket_no;
		// alert(datastring);

		$.ajax({
			type: "post",
			url: "<?php echo base_url('admin/Customer/remark_list'); ?>",
			cache: false,
			data: datastring,
			success: function(data) {
				// alert(data);
				// PNotify.removeAll();           
				$('#bind_issue_data').html(data);
				$('#issue_details').modal('show');
			},
			error: function() {
				alert('Error while request..');
			}
		});

	}
</script>

<?php $this->load->view('Admin/includes/n-footer');    ?>