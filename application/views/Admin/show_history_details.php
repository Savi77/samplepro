	   <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
			<h6 class="card-title py-sm-4 card-headings">History Details </h6>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
       <div class="modal-body">
			<div class="table-responsive">
				<table class="table table-framed table-sm table-striped" style="border:1px solid #dddddd;word-wrap: break-word;">
					<thead>
						<tr>
                            <th>Sr No</th>
                            <th>Account Manager</th>
                            <th>Contact Person</th>
                            <th>Creation Date Time</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Business Value</th>
                            <th>Remarks</th>
						</tr>
					</thead>
					 <tbody>
                        <?php
                        $count = 1;
                        foreach ($history_data as $res) {
                        ?>
                            <tr>
                                <td>
                                    <div style="width:35px;">
                                        <?= $count; ?>
                                    </div>
                                </td>
                                <td>
                                    <!-- <a onclick="show_history_details(this.id)" id="<?= $res->history_id; ?>" style="color:#333333;">
                                        <div style="width: 150px; font-weight: 600; color:#000; cursor: pointer;"><?= $res->empname; ?></div>
                                    </a> -->
                                    <div style="width:150px;text-wrap:wrap;">
                                        <?= $res->empname; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;text-wrap:wrap;">
                                        <?= $res->contact_person_name1; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= date("d F Y", strtotime($res->assign_datetime)); ?><br /><?= date("h:i a", strtotime($res->assign_datetime)); ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $res->phone_no; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:180px;text-wrap:wrap;">
                                    <?= $res->email; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $res->address; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;">
                                        <?= $res->project_business_value; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="width:150px;text-wrap:wrap;">
                                        <?= $res->remarks; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php $count++;
                        } ?>
                        <tr class="d-none">
                            <td>1</td>
                            <td>24 June, 2021
                                08:32 pm</td>
                            <td>Sameer Deokar</td>
                            <td>Sunil Kamble</td>
                            <td>+919657085965</td>
                            <td>sunilkamble330@gmail.com</td>
                            <td></td>
                            <td>0</td>
                            <td></td>
                        </tr>
                        <tr class="d-none">
                            <td>2</td>
                            <td>24 June, 2021
                                08:32 pm</td>
                            <td>Sameer Deokar</td>
                            <td>Sunil Kamble</td>
                            <td>+919657085965</td>
                            <td>sunilkamble330@gmail.com</td>
                            <td></td>
                            <td>0</td>
                            <td></td>
                        </tr>
                    </tbody>
				</table>
			</div>
       </div>