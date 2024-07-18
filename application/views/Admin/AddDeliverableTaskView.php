



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
	<h6 class="modal-title"><i class="icon-store2"></i>&nbsp;&nbsp;Add <?= $lead_data->customer_type;?> 
		<?= $lead_data->lead_generate_id;?> </h6>
</div>
<div class="modal-body">
	<div class="row" id="Lead_edit">
		<form id="AddNewTask" method="POST">

			<div class="panel panel-flat">
				<div class="panel-body">

				<fieldset>
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Deliverable's <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="parent_task_id" onchange="show_dir(this.value)">
								  <option value="">Select Deliverable's</option>

								  <?php foreach ($task_list->result() as $result1)  {  ?>
								  <option value="<?=$result1->project_task_id?>"><?= date('d/M/Y',strtotime($result1->sdate));?>&nbsp;&nbsp;<?= date('d/M/Y',strtotime($result1->edate)); ?>&nbsp;&nbsp;(<?= $result1->pointer?>)</option>
                                      <?php } ?>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>

                      <fieldset id="parent_dir" style="display: none;">
                        <div class="row" >
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Parent Directory : <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="dir_parentid">
                                      <option value="">Select Parent Directory</option>
                                          <?php 
                                            // $count=1;
                                            foreach ($MainDirectoryList as $row22) 
                                            {
                                            ?>
                                             <option value="<?= $row22->dir_id; ?>"><?= $row22->dir_name; ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>


                      <fieldset>
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Add Task <sup style="color: red">*</sup></label>
                                  <input type="text" class="form-control" name="task_name"  id="task_name" onkeyup="upper_case(value)">
                              </div>
                            </div>          
                        </div>
                      </fieldset>


                      <fieldset>
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                                 <label>Directory Access : <sup style="color: red">*</sup></label>
                                  <select class="form-control" name="dir_access">
                                      <option value="">Select Directory Access</option>
                                      <option value="Secured">Secured</option>
                                      <option value="Opened">Opened</option>
                                  </select>
                              </div>
                            </div>          
                        </div>
                      </fieldset>



				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary" style="margin: 5px;">Add<i
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
		$("#AddNewTask").on('submit', (function (e) {
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
					url: "<?php echo base_url('admin/ProjectManagement/AddNewTask');?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function (data) {
						//alert(data);
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
