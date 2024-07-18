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

           <?php
   
             if($lead_data->closure_date=='0000-00-00' || $lead_data->closure_date=='1970-01-01')
               {
                 $closure_date=''; 
               }
             else
               {
                 $closure_date=date("d F, Y",strtotime($lead_data->closure_date)); 
               }
   
               $ids = array();
               $selected = $lead_data->business_id;
   
               $selectedstudent = trim($selected, ',');
               $explode=explode(",", $selectedstudent);
               for ($i=0; $i <count($explode); $i++) 
               { 
                 $student_id=$explode[$i];
                  array_push($ids, $student_id);
               }
   
   
           ?>

           <div class="modal-header bg-info" style="background-color:#009FDF;" data-backdrop="static" tabindex="-1"
           	role="dialog">
           	<button type="button" class="close" data-dismiss="modal">&times;</button>
           	<h6 class="modal-title"><i class="icon-store2"></i>&nbsp;&nbsp;Edit <?= $lead_data->customer_type;?> :
           		<?= $lead_data->lead_generate_id;?> </h6>
           </div>
           <div class="modal-body">
           	<div class="row" id="Lead_edit">
           	    <form id="EditProjectForm" method="post">
           			<input type="hidden" name="" value="">
           			<input type="hidden" name="project_id" value="<?= $main_list['pid']; ?>">
           			<div class="panel panel-flat">
           				<div class="panel-body">

           					<fieldset class="scheduler-border">
           						<legend class="scheduler-border">Project Details</legend>
           						<div class="row">
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Project Name:<span class="text-danger">*</span>
           									</label>
           									<input type="text" name="ProjectName" id="ProjectName"
           										class="form-control" maxlength="150" value="<?= $main_list['pname'];?>">

           								</div>
           							</div>
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Client:<span class="text-danger">*</span></label>
           									<select name="ClientName" id="ClientName" data-placeholder="Client Name"
           										class="form-control">
           										<option value="<?=$main_list['pclient']?>"><?=$main_list['pclient_name']?></option>
           										<?php
                                        foreach ($primary_customer->result() as $value21) {
                                        ?>
           										<option value="<?= $value21->customer_id ?>" <?php if($value21->company_name==$main_list['pclient_name']){echo 'selected';} ?>>
                                   

           											<?= $value21->company_name; ?></option>
           										<?php } ?>
           									</select>
           								</div>
           							</div>
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Interested In:<span class="text-danger">*</span></label>
           									<select name="InterestesIn" id="InterestesIn"
           										data-placeholder="Interestes In" class="form-control">
           										<option value=""></option>
           										<?php
                                        foreach ($product_list as $row1) { ?>
           										?>
           										<option value="<?= $row1->product_id ?>" <?php if($row1->product_name==$main_list['pinterestedin']){echo 'selected';} ?>>
                                                   <?= $row1->product_name; ?>
                                                </option>
           										<?php } ?>
           									</select>
           								</div>
           							</div>


           						</div>
           					</fieldset>

           					<fieldset class="scheduler-border">
           						<legend class="scheduler-border">Status /
           							Priority</legend>
           						<div class="row">
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Status:<span class="text-danger">*</span></label>
           									<select name="StatusType" id="StatusType" data-placeholder="StatusType"
           										class="form-control">
           										<option value="<?= $main_list['pstatus']; ?>"><?= $main_list['pstatus']; ?></option>
           										<option value="In Progress">In Progress</option>
           										<option value="Deffered">Deffered</option>
           										<option value="Cancelled">Cancelled</option>
           										<option value="Abandoned">Abandoned</option>
           										<option value="Completed">Completed</option>
           									</select>
           								</div>
           							</div>
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Priority:<span class="text-danger">*</span></label>
           									<select name="PriorityType" id="PriorityType" data-placeholder="Priority"
           										class="form-control">
           										<option value="<?= $main_list['ppriority']; ?>"   ><?= $main_list['ppriority']; ?></option>
           										<option value="low">low</option>
           										<option value="Medium">Medium</option>
           										<option value="High">High</option>
           									</select>
           								</div>
           							</div>



           						</div>
           					</fieldset>

           					<fieldset>
           						<div class="row">



           						</div>
           					</fieldset>

           					<fieldset class="scheduler-border">
           						<legend class="scheduler-border">Commercially</legend>
           						<div class="row">
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Rate:<span class="text-danger">*</span>
           									</label>
           									<input type="text" name="Rate" id="Rate" class="form-control" value="<?= $main_list['prate']; ?>">

           								</div>
           							</div>
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Per:<span class="text-danger">*</span></label>
           									<select name="Per" id="Per" data-placeholder="Per" class="form-control">
           										<option value="<?= $main_list['pper']; ?>"   ><?= $main_list['pper']; ?></option>
           										<option value="Fixed">Fixed</option>
           										<option value="Hourly">Hourly</option>
           									</select>
           								</div>
           							</div>

           						</div>
           					</fieldset>

           					<fieldset>
           						<div class="row">


           						</div>
           					</fieldset>
           					<fieldset>
           						<div class="row">


           						</div>
           					</fieldset>
           					<fieldset class="scheduler-border">
           						<legend class="scheduler-border">Resource
           							Management</legend>
           						<div class="collapse in" id="demo2">
           							<div class="row">
           								<div class="col-md-6">
           								<div class="form-group">
           										<label>Project Manager:<span class="text-danger">*</span></label>
           										<select name="ProjectManager" id="ProjectManager"
           											data-placeholder="Project Manager Name" class="form-control">
           											<option value=""></option>
           											<?php
                                            foreach ($array_users as $row1) { ?>
           											?>
           											<option value="<?= $row1['id']?>" <?php if($row1['id'] == $main_list['pmanager']){echo 'selected';} ?>>
           												<?= $row1['name'] ?></option>
           											<?php } ?>
           										</select>
           									</div>
           								</div>

                                           <?php
                                           $ids = array();
                                           foreach ($selected_list as  $buss) 
                                           {  
                                             $sel_buss_id = $buss->id;
                                             array_push($ids, $sel_buss_id);
                                           }
                                       ?>
                                       <div class="col-md-4">
                                         <div class="form-group">
                                           <label>Team : </label>
                                           <select name="Team[]" id="Team" multiple class="form-control textWidth" >
                                             <option value="">Select Team</option>
                                               <?php   
                                                 foreach ($array_users as $value1) 
                                                 {
                                                      $business_id = $value1['id'];
                                                     // $business = $row1->business_id;
                                                 if (in_array($business_id, $ids))
                                                 { ?>
                                                     <option value="<?= $value1['id'] ?>" selected><?= $value1['name'];?></option>
                                               <?php } else { ?>
                     
                                                     <option value="<?= $value1['id'] ?>"><?= $value1['name']?></option>
                                                <?php } } ?> 
                     
                                           </select>
                                         </div>
           								</div>

           							</div>
           						</div>
           					</fieldset>
           					<fieldset class="scheduler-border">
           						<legend class="scheduler-border">Timeline</legend>
           						<div class="row">

           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Frequency:<span class="text-danger">*</span></label>
           									<select name="frequency" id="frequency" onchange="setvalue(); mainInfo()"
           										data-placeholder="Frequency" class="form-control">

												   <option value="One Time" <?= $retVal = ($main_list['pfrequency'] == 'One Time') ? 'selected' : '' ;?> > One Time</option>

                                                    <option value="Repeatative" <?= $retVal = ($main_list['pfrequency'] == 'Repeatative') ? 'selected' : '' ;?>  >Repeatative</option>


                                               
           									</select>
           								</div>
           							</div>

           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Target Period:<span class="text-danger">*</span></label>
           									<select class="form-control" name="target_period" id="target_period"
           										onchange="mainInfo()">
           										<option value="<?= $main_list['targetperiod']; ?>"   ><?= $main_list['targetperiod']; ?></option>
           										<option value="Daily">Daily</option>
           										<option value="Weekly">Weekly</option>
           										<option value="Fortnightly">Fortnightly</option>
           										<option value="Monthly">Monthly</option>
           										<option value="Quarterly">Quarterly</option>
           										<option value="Half Yearly">Half Yearly</option>
           										<option value="Yearly">Yearly</option>
           									</select>
           								</div>
           							</div>
									<?php
										if($main_list['pfrequency'] == 'One Time'){
											$recn_cnt = 'disabled';
										}else {
											$recn_cnt = '';
										}
									?>
           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Recurring Count: <sup style="color: red">*</sup></label>
           									<input type="text" class="form-control" id="recurring_cnt"
           										name="recurring_cnt" value="<?= $main_list['precurringcount']; ?>" onkeyup="mainInfo()" <?= $recn_cnt?>>

           								</div>
           							</div>

           							<div class="col-md-6">
           								<div class="form-group">
           									<label>Start Date : <sup style="color: red">*</sup></label>
           									<input type="text" class="form-control" id="start_date" name="start_date"
           										placeholder="Select Start Date" onchange="startdate_result()"
           										onkeyup="mainInfo()" value="<?= $main_list['sdate']; ?>">
           								</div>
           							</div>
           						</div>

           						<div class="row">


           							<div class="col-md-6">
           								<div class="form-group">
           									<label>End Date : <sup style="color: red">*</sup></label>
           									<input type="text" class="form-control" id="end_date" name="end_date" value="<?= $main_list['edate']; ?>"
           										placeholder="Select End Date" onchange="enddate_result()">
           									<input type="text" style="display: none" class="form-control"
           										id="end_date1" name="end_date1" onchange="enddate_result1()">
           								</div>
           							</div>
           						</div>
           					</fieldset>

                               <fieldset class="scheduler-border">
													<legend class="scheduler-border" style="margin: 0;">Description
													</legend>
													<div class="row">


														<div class="col-md-4">
															<div class="form-group">
																<label for="email"> Project Description: </label>
																<textarea class="form-control col-md-12"
																	id="ProjectDescription" name="ProjectDescription"
																	placeholder="Please enter Description" 
																	maxlength="200" style="margin-top: -1.9%;" col="5"
																	row="3"
																	data-bv-field="ProjectDescription"><?=$main_list['pdescription'];?></textarea>
																<small class="help-block"
																	data-bv-validator="stringLength"
																	data-bv-for="ProjectDescription"
																	data-bv-result="NOT_VALIDATED"
																	style="display: none;"></small></div>
														</div>
													</div>
												</fieldset>

           				</div>
           				<div class="text-right">
           					<button type="submit" class="btn btn-primary" style="margin: 5px;">Update<i
           							class="icon-arrow-right14 position-right"></i></button>
           					<span id="preview31"></span>
           				</div>
           				</fieldset>

           				<br />

           			</div>
           	</div>
           	</form>
           </div>
           </div>



           <script type="text/javascript">
           	$("#remarkslead").keyup(function () {
           		el = $(this);
           		if (el.val().length >= 500) {
           			el.val(el.val().substr(0, 500));
           			$("#charNum").text(0);
           		} else {
           			$("#charNum").text(500 - el.val().length);
           		}
           	});
               $('#Team').select2();
               $('#ProjectManager').select2();
           </script>

           <script type="text/javascript">
           	$(function () {
           		$('#start_date').datetimepicker({
           			format: 'DD MMMM, YYYY',
           			useCurrent: true
           		});
           	});
			   $(function () {
           		$('#end_date').datetimepicker({
           			format: 'DD MMMM, YYYY',
           			useCurrent: true
           		});
           	});
			   $(function () {
           		$('#end_date1').datetimepicker({
           			format: 'DD MMMM, YYYY',
           			useCurrent: true
           		});
           	});

           </script>

			
				
<script type="text/javascript">
			$("#StartDate").on("dp.change", function (e) {
				$('#projectmanagement').bootstrapValidator('revalidateField', 'StartDate');
			});
			$("#start_date").on("dp.change", function (e) {
				var startDate = document.getElementById("start_date").value;
				var recurring_cnt = document.getElementById("recurring_cnt").value;
				// alert(recurring_cnt);
				$('#onchange_display').show();
				if (startDate != '') {
					var target_period = document.getElementById("target_period").value;
					var date = new Date(startDate);
					var newdate = new Date(date);
					// alert(target_period);
					if (target_period == 'Daily') {
						if (recurring_cnt > 1) {
							var add_days = recurring_cnt - 1;
							// alert(add_days);  
							newdate.setDate(newdate.getDate() + add_days);
						} else {
							// alert('else');
							newdate.setDate(newdate.getDate() + 0);
						}

						// var add_days='0';
					} else if (target_period == 'Weekly') {
						var cnt1 = recurring_cnt * 7 - 1;
						// var add_days=cnt1-1; 
						// alert(add_days);  
						newdate.setDate(newdate.getDate() + cnt1);
					} else if (target_period == 'Fortnightly') {
						var cnt1 = recurring_cnt * 15 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='15';
					} else if (target_period == 'Monthly') {
						var cnt1 = recurring_cnt * 30 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Quarterly') {
						var cnt1 = recurring_cnt * 91 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Half Yearly') {
						var cnt1 = recurring_cnt * 183 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					} else if (target_period == 'Yearly') {
						var cnt1 = recurring_cnt * 365 - 1;
						newdate.setDate(newdate.getDate() + cnt1);
						// var add_days='31';
					}

					if (target_period == 'Daily') {
						var endDate = document.getElementById("end_date").value;
					} else {
						var endDate = document.getElementById("end_date1").value;
					}

					const monthNames = ["January", "February", "March", "April", "May", "June",
						"July", "August", "September", "October", "November", "December"
					];

					var dd = newdate.getDate();
					var mm = newdate.getMonth();
					var y = newdate.getFullYear();

					const d = mm;
					var full_month = monthNames[d];

					var someFormattedDate = dd + ' ' + full_month + ' ' + y;
					// alert(someFormattedDate);
					if (target_period == 'Daily') {
						$('#end_date1').hide();
						$('#end_date').show();
						document.getElementById('end_date').value = someFormattedDate;
					} else {
						$('#end_date').hide();
						$('#end_date1').show();
						document.getElementById('end_date1').value = someFormattedDate;
					}


					// alert(startDate);
					// return result;

					if ((Date.parse(startDate) == Date.parse(endDate))) {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();

						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);
								},
								error: function () {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
						// alert();

					} else if ((Date.parse(startDate) > Date.parse(endDate))) {

						$('#desktopbutton').prop('disabled', true);
						new PNotify({
							title: 'Event',
							text: 'End date should be greater than Start date',
							type: 'warning'
						});

					} else {
						$('#desktopbutton').prop('disabled', false);
						start_date = $('#start_date').val();
						// end_date = $('#end_date').val();
						if (target_period == 'Daily') {
							var end_date = document.getElementById("end_date").value;
						} else {
							var end_date = document.getElementById("end_date1").value;
						}
						targettype_id = $('#targettype_id').val();
						if (end_date != '' && targettype_id != '') {
							var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
								targettype_id;
							// alert(datastring);
							$.ajax({
								type: "post",
								url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
								cache: false,
								data: datastring,
								success: function (data) {
									// alert(data);
									$('#issuelistdetails').show();
									$('#issue_schedule_list').html(data);


								},
								error: function () {
									alert('Error while request..');
								}
							});
							return false;
						} else {
							$('#issuelistdetails').hide();
						}
					}
				}
			});

		</script>			



<script type="text/javascript">
           	$(document).ready(function () {
           		$('#EditProjectForm').bootstrapValidator({
           			message: 'This value is not valid',
           			fields: {
						ProjectName: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter Project Name'
           						}
           					}
           				},
						   ClientName: {
           					validators: {
           						notEmpty: {
           							message: 'Please select client Name'
           						}
           					}
           				},
						   InterestesIn: {
           					validators: {
           						notEmpty: {
           							message: 'Please select interest'
           						}
           					}
           				},
						   StatusType: {
           					validators: {
           						notEmpty: {
           							message: 'Please select status'
           						}
           					}
           				},
						   ProjectManager: {
           					validators: {
           						notEmpty: {
           							message: 'Please select manager Name'
           						}
           					}
           				},
						   Team: {
           					validators: {
           						notEmpty: {
           							message: 'Please select team Name'
           						}
           					}
           				},
						   frequency: {
           					validators: {
           						notEmpty: {
           							message: 'Please select frequency'
           						}
           					}
           				},
						   target_period: {
           					validators: {
           						notEmpty: {
           							message: 'Please select target period'
           						}
           					}
           				},
						   frequency: {
           					validators: {
           						notEmpty: {
           							message: 'Please select frequency'
           						}
           					}
           				},
						   recurring_cnt: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter recurring count'
           						}
           					}
           				},
						   start_date: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter start date'
           						}
           					}
           				},
						   end_date: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter end date'
           						}
           					}
           				},
						   end_date1: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter end date'
           						}
           					}
           				},
						   ProjectDescription: {
           					validators: {
           						notEmpty: {
           							message: 'Please Enter description'
           						}
           					}
           				},
						   Priority: {
           					validators: {
           						notEmpty: {
           							message: 'Please select priority'
           						}
           					}
           				},
						   
           				
           			}
           		});
           	});

           </script>




           <script type="text/javascript">
           	$(document).ready(function (e) {
           		$("#EditProjectForm").on('submit', (function (e) {
           			//e.preventDefault();
           			if (e.isDefaultPrevented()) {
           				// alert('invalid');
           			} else {
           				$("#preview31").show();
           				$("#preview31").html(
           					'<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />'
           					);
           				$.ajax({
           					url: "<?php echo base_url('admin/ProjectManagement/Updateproject');?>",
           					type: "POST",
           					data: new FormData(this),
           					contentType: false,
           					cache: false,
           					processData: false,
           					success: function (data) {
           						// alert(data);
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






           <script type="text/javascript">
           	jQuery('#business_lead').multiselect({
           		enableFiltering: true,
           		maxHeight: 170,
           		enableCaseInsensitiveFiltering: true,
           		nonSelectedText: 'Select business segment',
           		numberDisplayed: 10,
           		selectAll: false,
           		onChange: function (option, checked) {
           			// Get selected options.
           			var selectedOptions = jQuery('#business_lead option:selected');

           			if (selectedOptions.length >= 10) {
           				// Disable all other checkboxes.
           				var nonSelectedOptions = jQuery('#business_lead option').filter(function () {
           					return !jQuery(this).is(':selected');
           				});

           				nonSelectedOptions.each(function () {
           					var input = jQuery('input[value="' + jQuery(this).val() + '"]');
           					input.prop('disabled', true);
           					input.parent('li').addClass('disabled');
           				});

           				new PNotify({
           					title: 'Message',
           					text: 'Please Select only 10 business segment',
           					type: 'warning'
           				});
           			} else {
           				// Enable all checkboxes.
           				jQuery('#business option').each(function () {
           					var input = jQuery('input[value="' + jQuery(this).val() + '"]');
           					input.prop('disabled', false);
           					input.parent('li').addClass('disabled');
           				});
           			}
           		}
           	});

           	var shiftClick = jQuery.Event("click");
           	shiftClick.shiftKey = true;

           	$(".multiselect-container li *").click(function (event) {
           		if (event.shiftKey) {
           			//alert("Shift key is pressed");
           			event.preventDefault();
           			return false;
           		} else {
           			//alert('No shift hey');
           		}
           	});

           </script>

           <script>
           	function setvalue() {

           		var dropdown1 = document.getElementById('frequency');
           		if (dropdown1.value == "One Time") {
           			var a = 1;
           			var textbox = document.getElementById('recurring_cnt');
           			textbox.value = a;
           			$("#recurring_cnt").attr("disabled", "disabled");
           		} else {
           			$("#recurring_cnt").prop("disabled", false);
           		}

           	}

           </script>

           <script type="text/javascript">
           	function mainInfo() {
           		var startDate = document.getElementById("start_date").value;
           		var recurring_cnt = document.getElementById("recurring_cnt").value;
           		// alert(recurring_cnt);
           		$('#onchange_display').show();
           		if (startDate != '') {
           			var target_period = document.getElementById("target_period").value;
           			var date = new Date(startDate);
           			var newdate = new Date(date);
           			// alert(target_period);
           			if (target_period == 'Daily') {
           				if (recurring_cnt > 1) {
           					var add_days = recurring_cnt - 1;
           					// alert(add_days);  
           					newdate.setDate(newdate.getDate() + add_days);
           				} else {
           					// alert('else');
           					newdate.setDate(newdate.getDate() + 0);
           				}

           				// var add_days='0';
           			} else if (target_period == 'Weekly') {
           				var cnt1 = recurring_cnt * 7 - 1;
           				// var add_days=cnt1-1; 
           				// alert(add_days);  
           				newdate.setDate(newdate.getDate() + cnt1);
           			} else if (target_period == 'Fortnightly') {
           				var cnt1 = recurring_cnt * 15 - 1;
           				newdate.setDate(newdate.getDate() + cnt1);
           				// var add_days='15';
           			} else if (target_period == 'Monthly') {
           				var cnt1 = recurring_cnt * 29 - 1;
           				newdate.setDate(newdate.getDate() + cnt1);
           				// var add_days='31';
           			} else if (target_period == 'Quarterly') {
           				var cnt1 = recurring_cnt * 120 - 1;
           				newdate.setDate(newdate.getDate() + cnt1);
           				// var add_days='31';
           			} else if (target_period == 'Half Yearly') {
           				var cnt1 = recurring_cnt * 182 - 1;
           				newdate.setDate(newdate.getDate() + cnt1);
           				// var add_days='31';
           			} else if (target_period == 'Yearly') {
           				var cnt1 = recurring_cnt * 365 - 1;
           				newdate.setDate(newdate.getDate() + cnt1);
           				// var add_days='31';
           			}

           			if (target_period == 'Daily') {
           				var endDate = document.getElementById("end_date").value;
           			} else {
           				var endDate = document.getElementById("end_date1").value;
           			}

           			const monthNames = ["January", "February", "March", "April", "May", "June",
           				"July", "August", "September", "October", "November", "December"
           			];

           			var dd = newdate.getDate();
           			var mm = newdate.getMonth();
           			var y = newdate.getFullYear();

           			const d = mm;
           			var full_month = monthNames[d];

           			var someFormattedDate = dd + ' ' + full_month + ' ' + y;
           			// alert(someFormattedDate);
           			if (target_period == 'Daily') {
           				$('#end_date1').hide();
           				$('#end_date').show();
           				document.getElementById('end_date').value = someFormattedDate;
           			} else {
           				$('#end_date').hide();
           				$('#end_date1').show();
           				document.getElementById('end_date1').value = someFormattedDate;
           			}


           			// alert(startDate);
           			// return result;

           			if ((Date.parse(startDate) == Date.parse(endDate))) {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();

           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);
           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           				// alert();

           			} else if ((Date.parse(startDate) > Date.parse(endDate))) {

           				$('#desktopbutton').prop('disabled', true);
           				new PNotify({
           					title: 'Event',
           					text: 'End date should be greater than Start date',
           					type: 'warning'
           				});

           			} else {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();
           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           			}
           		}
           	}


           	function mainInfo1() {
           		// alert();
           		var startDate = document.getElementById("start_date").value;

           		// alert(startDate);
           		$('#onchange_display').show();
           		if (startDate != '') {
           			var target_period = document.getElementById("target_period").value;

           			// alert(target_period);

           			var date = new Date(startDate);
           			var newdate = new Date(date);

           			if (target_period == 'Daily') {
           				var endDate = document.getElementById("end_date").value;
           			} else {
           				var endDate = document.getElementById("end_date1").value;
           			}

           			// alert(startDate);
           			// return result;

           			if ((Date.parse(startDate) == Date.parse(endDate))) {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();

           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;

           				} else {
           					$('#issuelistdetails').hide();
           				}
           				// alert();

           			} else if ((Date.parse(startDate) > Date.parse(endDate))) {

           				$('#desktopbutton').prop('disabled', true);
           				new PNotify({
           					title: 'Event',
           					text: 'End date should be greater than Start date',
           					type: 'warning'
           				});

           			} else {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();
           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           			}
           		}
           	}

           </script>

           <script type="text/javascript">
           	// $("#start_date").on("dp.change", function (e) 
           	// {
           	function startdate_result() {
           		// alert();
           		var startDate = document.getElementById("start_date").value;

           		// alert(startDate);
           		// $('#onchange_display').show();   
           		if (startDate != '') {
           			var target_period = document.getElementById("target_period").value;

           			// alert(target_period);

           			var date = new Date(startDate);
           			var newdate = new Date(date);

           			// alert(target_period);
           			if (target_period == 'Daily') {
           				newdate.setDate(newdate.getDate() + 0);
           				// var add_days='0';
           			} else if (target_period == 'Weekly') {
           				newdate.setDate(newdate.getDate() + 7);
           				var add_days = '7';
           				// $('#end_date').prop('readonly',true);
           				// $('#end_date').attr('readonly',true);
           				// alert(add_days);
           			} else if (target_period == 'Fortnightly') {
           				newdate.setDate(newdate.getDate() + 15);
           				// var add_days='15';
           			} else if (target_period == 'Monthly') {
           				newdate.setDate(newdate.getDate() + 30);
           				// var add_days='31';
           			}


           			if (target_period == 'Daily') {
           				var endDate = document.getElementById("end_date").value;
           			} else {
           				var endDate = document.getElementById("end_date1").value;
           			}

           			const monthNames = ["January", "February", "March", "April", "May", "June",
           				"July", "August", "September", "October", "November", "December"
           			];

           			var dd = newdate.getDate();
           			var mm = newdate.getMonth();
           			var y = newdate.getFullYear();

           			const d = mm;
           			var full_month = monthNames[d];

           			var someFormattedDate = dd + ' ' + full_month + ' ' + y;
           			// alert(someFormattedDate);
           			if (target_period == 'Daily') {
           				$('#end_date1').hide();
           				$('#end_date').show();
           				document.getElementById('end_date').value = someFormattedDate;
           			} else {
           				$('#end_date').hide();
           				$('#end_date1').show();
           				document.getElementById('end_date1').value = someFormattedDate;
           			}




           			// alert(startDate);
           			// return result;

           			if ((Date.parse(startDate) == Date.parse(endDate))) {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();

           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;

           				}
           				// alert();

           			} else if ((Date.parse(startDate) > Date.parse(endDate))) {

           				$('#desktopbutton').prop('disabled', true);
           				new PNotify({
           					title: 'Event',
           					text: 'End date should be greater than Start date',
           					type: 'warning'
           				});

           			} else {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();
           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           			}
           		}
           	}

           	// $("#end_date").on("dp.change", function (e) 
           	// {
           	function enddate_result() {
           		// alert();
           		var startDate = document.getElementById("start_date").value;
           		var end_date = document.getElementById("end_date").value;

           		// alert(startDate);
           		// $('#onchange_display').show();   
           		if (end_date != '') {
           			var target_period = document.getElementById("target_period").value;

           			// alert(target_period);

           			var date = new Date(startDate);
           			var newdate = new Date(date);

           			// alert(target_period);
           			// if (target_period=='Daily') 
           			// {
           			//      newdate.setDate(newdate.getDate() + 0);
           			//     // var add_days='0';
           			// }
           			// else if (target_period=='Weekly') 
           			// {
           			//      newdate.setDate(newdate.getDate() + 7);
           			//     var add_days='7';
           			//     // $('#end_date').prop('readonly',true);
           			//     // $('#end_date').attr('readonly',true);
           			//     // alert(add_days);
           			// }
           			// else if (target_period=='Fortnightly') 
           			// {
           			//      newdate.setDate(newdate.getDate() + 15);
           			//     // var add_days='15';
           			// }
           			// else if (target_period=='Monthly') 
           			// {
           			//      newdate.setDate(newdate.getDate() + 30);
           			//     // var add_days='31';
           			// }


           			if (target_period == 'Daily') {
           				var endDate = document.getElementById("end_date").value;
           			} else {
           				var endDate = document.getElementById("end_date1").value;
           			}

           			// const monthNames = ["January", "February", "March", "April", "May", "June",
           			//   "July", "August", "September", "October", "November", "December"
           			// ];

           			// var dd = newdate.getDate();
           			// var mm = newdate.getMonth();
           			// var y = newdate.getFullYear();

           			// const d = mm;
           			// var full_month = monthNames[d];

           			// var someFormattedDate = dd + ' ' + full_month + ' ' + y;
           			// // alert(someFormattedDate);
           			// if (target_period=='Daily')
           			// {
           			//     $('#end_date1').hide(); 
           			//     $('#end_date').show();  
           			//     document.getElementById('end_date').value = someFormattedDate; 
           			// }
           			// else
           			// {
           			//   $('#end_date').hide();
           			//   $('#end_date1').show(); 
           			//   document.getElementById('end_date1').value = someFormattedDate;
           			// }




           			// alert(startDate);
           			// return result;

           			if ((Date.parse(startDate) == Date.parse(endDate))) {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();

           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;

           				} else {
           					$('#issuelistdetails').hide();
           				}
           				// alert();

           			} else if ((Date.parse(startDate) > Date.parse(endDate))) {

           				$('#desktopbutton').prop('disabled', true);
           				new PNotify({
           					title: 'Event',
           					text: 'End date should be greater than Start date',
           					type: 'warning'
           				});

           			} else {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();
           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           			}
           		}
           	}

           	// $("#end_date1").on("dp.change", function (e) 
           	//   {
           	function enddate_result1() {
           		// alert();
           		var startDate = document.getElementById("start_date").value;
           		var end_date1 = document.getElementById("end_date1").value;

           		// alert(end_date1);
           		// $('#onchange_display').show();   
           		if (end_date1 != '') {
           			var target_period = document.getElementById("target_period").value;

           			// alert(target_period);

           			var date = new Date(startDate);
           			var newdate = new Date(date);

           			if (target_period == 'Daily') {
           				var endDate = document.getElementById("end_date").value;
           			} else {
           				var endDate = document.getElementById("end_date1").value;
           			}

           			if ((Date.parse(startDate) == Date.parse(endDate))) {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();

           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;

           				} else {
           					$('#issuelistdetails').hide();
           				}
           				// alert();

           			} else if ((Date.parse(startDate) > Date.parse(endDate))) {

           				$('#desktopbutton').prop('disabled', true);
           				new PNotify({
           					title: 'Event',
           					text: 'End date should be greater than Start date',
           					type: 'warning'
           				});

           			} else {
           				$('#desktopbutton').prop('disabled', false);
           				start_date = $('#start_date').val();
           				// end_date = $('#end_date').val();
           				if (target_period == 'Daily') {
           					var end_date = document.getElementById("end_date").value;
           				} else {
           					var end_date = document.getElementById("end_date1").value;
           				}
           				targettype_id = $('#targettype_id').val();
           				if (end_date != '' && targettype_id != '') {
           					var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' +
           						targettype_id;
           					// alert(datastring);
           					$.ajax({
           						type: "post",
           						url: "<?php echo base_url('admin/Target/getemployee_list'); ?>",
           						cache: false,
           						data: datastring,
           						success: function (data) {
           							// alert(data);
           							$('#issuelistdetails').show();
           							$('#issue_schedule_list').html(data);


           						},
           						error: function () {
           							alert('Error while request..');
           						}
           					});
           					return false;
           				} else {
           					$('#issuelistdetails').hide();
           				}
           			}
           		}
           	}

           </script>
