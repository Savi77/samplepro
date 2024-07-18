<style>
    #all_activity_filter_table th:first-child {
        width: 100px !important;
        text-wrap: nowrap !important;
    }

    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),
    #all_activity_filter_table_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3) {
        display: none;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05) !important;
    }
</style>

<table class="table table-striped" id="all_activity_filter_table">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Resource</th>
            <?php
            for ($i = 0; $i < count($SegmentArray); $i++) {
            ?>
                <th><?= $SegmentArray[$i]->business_name;?></th>
            <?php } ?>
            <th class="d-none"></th>
            <th class="d-none"></th>
            <th class="d-none"></th>
            <th class="d-none"></th>
        </tr>
    </thead>
    <!-- <tbody>
        <?php
        $count = 1;
        foreach ($LeadOppBySalesPersonSegment as $row) {
            ?>
            <tr>
                <td>
                    <div>
                        <?= $count; ?>
                    </div>
                </td>
                <td>
                    <div  class="text-wrap-col" style="width:200px;">
                        <?= $row['emp_name'] ?> 
                    </div>
                </td>
                <td>
                    <div  class="text-wrap-col" style="width:200px;">
                    <?= $row['business_name'] ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="Leads / Opportunities By Sales Person - Segment Wise" onclick="ViewTotalDetails(id)"
                        id="<?= $row['business_id'] . '|' . $row['emp_id'] ?>">
                        <?= $row['total'] ?></a>
                    </div>
                </td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
            </tr>
            <?php $count++;
        } ?>
    </tbody> -->
    <tbody>
        <?php
        $count = 1;
        for ($c = 0; $c < count($LeadOppBySalesPersonSegment); $c++) {?>
            <tr>
                <td>
                    <div>
                        <?= $count; ?>
                    </div>
                </td>
                <td>
                    <div  class="text-wrap-col" style="width:200px;">
                    <?= $LeadOppBySalesPersonSegment[$c]['emp_name'] ?>
                    </div>
                </td>
                <!-- <td>
                    <div  class="text-wrap-col" style="width:200px;">
                    <?= $row['business_name'] ?>
                    </div>
                </td>
                <td>
                    <div style="width:150px;">
                        <a style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" rel="tooltip" title="Leads / Opportunities By Sales Person - Segment Wise" onclick="ViewTotalDetails(id)"
                        id="<?= $row['business_id'] . '|' . $row['emp_id'] ?>">
                        <?= $row['total'] ?></a>
                    </div>
                    
                </td> -->
                <?php
                $businessarray = $LeadOppBySalesPersonSegment[$c]['businessarray'];
                for ($b = 0; $b < count($businessarray); $b++) {
                ?>
                <td>
                    <div style="width:150px;">
                        <a rel="tooltip" title="Sales Segment" style="border: 1px solid green;background: green;color: #fff;border-radius: 4px;padding: 1px 8px;" onclick="ViewTotalDetails(id)" id="<?= $businessarray[$b]['business_id'] . '|' . $LeadOppBySalesPersonSegment[$c]['emp_id']; ?>"> <?= $businessarray[$b]['total']?></a>
                    </div>
                    
                </td>
                <?php }?>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
            </tr>
            <?php $count++;
        } ?>
    </tbody>
</table>


<script>
  $(document).ready(function () {

    $('[rel="tooltip"]').tooltip();
  });
</script>

<script>
    Highcharts.chart('container3', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false,
            },

            title: {
                text: 'Sales Segment<br/><p style="font-size:12px;color:#FF5732;"></p>'
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [{
                name: "Source",
                colorByPoint: true,
                data: [
                    <?php
                    foreach ($LeadOppBySalesPersonSegmentGraph as $Employee) {
                    ?> {
                            name: '<?= $Employee['emp_name'] . ' :-  ' . $Employee['business_name']; ?>',
                            y: <?= $Employee['total']; ?>
                            // drilldown: "Chrome"
                        },
                    <?php } ?>
                ]
            }],
        });
</script>