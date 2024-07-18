<style>
    td{
        word-wrap: break-word;
    }
</style>


<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">Reschedule History</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>
<span class="label label-primary" style="font-size: 15px; margin-left: 19px;"><?= $reschedule_list['name'] ?></span>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table table-striped" style="border:1px solid #dddddd;">
            <thead>
                <tr>
                    <th>Schedule</th>
                    <th>Reschedule</th>
                    <!-- <th>Issue Raised Date</th> -->
                    <th>Schedule Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <!-- <th>Remark</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reschedule_list as $rescdl) { ?>
                    <tr>
                        <td>
                            <div style="width:150px;text-wrap:wrap;">
                                <?= $rescdl['prev_name'] ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;text-wrap:wrap;">
                                <?= $rescdl['name'] ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:100px;">
                                <?= date("d M Y", strtotime($rescdl['assign_date'])); ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:100px;">
                                <?= date("h:i a", strtotime($rescdl['assign_starttime'])); ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:100px;">
                                <?= date("h:i a", strtotime($rescdl['assign_endtime'])); ?>
                            </div>
                        </td>

                        <!-- <td></td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    

</div>