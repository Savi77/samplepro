
<style>
   table td{
        color: #000 !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    #ajax_table2 th:first-child{
        width:100px !important;
        text-wrap:nowrap !important;
    }
    #ajax_table2 th{
      text-wrap:nowrap !important;
    }
</style>
<?php
$ids = $formdata['ids'];
$explode = explode("|", $ids);
$schedule_type_name = $this->db->select('type_name')->from('tbl_schedule_type_name')->where('id',$explode[0])->where('org_id',$this->session->org_id)->get()->row()->type_name;
?>

<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">&nbsp;Task Details Of <?= $EmpActivityData[0]['name'] . ' For ' . $schedule_type_name;?> </h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body p-0">
    <form class="form-horizontal">
        <table class="table table-striped" id="ajax_table2">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Ticket No.</th>
                    <th>Product Name</th>
                    <th>Issue</th>
                    <th>Status</th>
                    <th>Assign To</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($EmpActivityData as $row) {
                    if(!empty($row['priority']))
                    {
                        $priority = $row['priority'];
                    }
                    else
                    {
                        $priority = 'No Priority';
                    }
                ?>
                    <tr>
                        <td>
                            <div>
                            <?= $count; ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;">
                            <?= $row['ticket_no'] ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:200px;" class="text-wrap-col">
                            <?= $row['product_name'] ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;" class="text-wrap-col">
                            <?= $row['issue'] ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                            <?= ucwords($row['status']) ?>
                            </div>
                        </td>
                        <td>
                            <div style="width:150px;">
                            <?= $row['name'] ?>
                            </div>
                        </td>

                        <td>
                            <div style="width:150px;width:100px;background: #009846;margin-right: 5px;padding: 2px 5px;border-radius: 4px;color: #fff;text-align: left;font-size: 12px;border: 1px solid transparent;">
                            <?= $priority ?>
                            </div>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </form>
</div>