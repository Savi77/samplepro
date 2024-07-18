<style>
     #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
    
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
</style>
<table class="table table-striped" id="all_activity_filter_table">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Resource</th>
            <th>Ticket (Issues)</th>
            <th>Task</th>
            <th>Own</th>
            <th class="d-none"></th>
            <th class="d-none"></th>
            <th class="d-none"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cnt = 1;
        foreach ($EmployeewiseActivitiesMapping as $row2) {
            ?>
            <tr>
                <td>
                    <div>
                        <?= $cnt; ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;" class="text-wrap-col">
                        <?= $row2['name']; ?>
                    </div>
                </td>

                <td>
                    <div style="width:150px;">
                        <?= $row2['total_issue']; ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <?= $row2['task_issue']; ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <?= $row2['own_issue']; ?>
                    </div>
                </td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
            </tr>
            <?php $cnt++;
        } ?>
    </tbody>

</table>