



<style type="text/css">
	.multiselect.btn-default,
	.multiselect.btn-default.disabled {
		background-color: #fff;
		border-color: #ddd;
	}

	.btn-group>.btn,
	.btn-group-vertical>.btn {
		position: relative;
		float: left;
	}

	.multiselect {
		width: 100%;
		min-width: 100%;
		text-align: left;
		padding-left: 29px;
		padding-right: 29px;
		text-overflow: ellipsis;
		overflow: hidden;
	}

	.btn-group>.btn:first-child {
		margin-left: 0;
		width: 400px !important;
	}

</style>



<div class="modal-header bg-info" style="background-color:#009FDF;" data-backdrop="static" tabindex="-1" role="dialog">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h6 class="modal-title"><i class="icon-store2"></i>&nbsp;&nbsp;Edit <?= $lead_data->customer_type;?> :
		<?= $lead_data->lead_generate_id;?> </h6>
</div>
<div class="modal-body">
	<div class="row" id="Lead_edit">
		<form id="AddDays" method="POST">

			<div class="panel panel-flat">
				<div class="panel-body">

					<fieldset class="scheduler-border">
						<legend class="scheduler-border">Add</legend>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Add Day's<?= $data['project_id']; ?><span class="text-danger">*</span>
									</label>
                                    

									<?php
									foreach ($project_task_id as $row) 
									{ ?>
     

									<input type="text" name="project_task_id" id="project_task_id" value="<?= $row->project_task_id ?>" hidden></input>
									
									<?php }?>
									<input type="text" name="adddays" id="adddays" class="form-control"
										maxlength="150"></input>

								</div>
							</div>



						</div>
					</fieldset>



				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary" style="margin: 5px;">Update<i
							class="icon-arrow-right14 position-right"></i></button>
					<span id="preview31"></span>
				</div>


				<br />

			</div>
	</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function (e) {
		$("#AddDays").on('submit', (function (e) {
			//e.preventDefault();
			if (e.isDefaultPrevented()) {
				// alert('invalid');
			} else {
				$("#preview31").show();
				$("#preview31").html(
					'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
				);
                //alert("da");
				$.ajax({
					url: "<?php echo base_url('admin/ProjectManagement/Adddays');?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function (data) {
					//	alert(data);
						$("#preview31").hide();
						new PNotify({
							title: 'Update <?= $lead_data->customer_type;?>',
							text: '<?= $lead_data->customer_type;?> Updated  Successfully',
							type: 'success'
						});

						setTimeout(function () {
							window.location =
								"<?php echo base_url('admin/ProjectManagement');?>";
						}, 1000);

					},
					error: function () {
						$(function () {
							new PNotify({
								title: 'Leads Transfer',
								text: 'Failed to load page',
								type: 'warning'
							});
						});
					}
				});
			}
			return false;

		}));
	});

</script>
