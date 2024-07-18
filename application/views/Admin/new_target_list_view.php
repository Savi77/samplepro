<?php $this->load->view('Admin/includes/n-header');    ?>
<style>

.sidebar-expand-lg.sidebar-main{

z-index: 10 !important;

}
table td{
        color: #000 !important;
    }
    table td:nth-child(1) a div:hover{
        color: #605959 !important;
    }

    .dt-button{
            color: #fff;
            background-color: #1e6196;
            border-color: #1e6196;
            width: 50px
        }
    .dt-button:hover{
        color: #fff;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon;
        display: inline-block;
        border: 0;
        vertical-align: middle;
        font-size: 1rem;
        margin-left: 0.46875rem;
        line-height: 1;
        position: relative;
        content: "";
    }
    .dt-button .buttons-columnVisibility{
        width:100%;
    }
    .popover .arrow{
        display: none !important;
    }

   .popover-body{
        width: 200px !important;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .text-wrap-col{
        /* width: 150px !important; */
        white-space: nowrap !important;
        text-overflow: ellipsis !important ;
        overflow: hidden !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    tr.bg {
     background: #fff !important;
     }
    .datatable-header {
        padding-top: 1.25rem !important;
    }
    #MyTargetListTable th:first-child{
        width:100px !important;
        text-wrap: nowrap !important;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
    #view_targate{
        z-index: 1050 !important;
    }

</style>
<?php
// echo json_encode($user_permission);
$AddClassP = 'style="display:block";';
$EditClass = 'style="display:block";';
$DeleteClass = 'style="display:block";';
$ViewClass = 'style="display:block";';

foreach ($user_permission as $priviledge) {
    $priviledge_key = $priviledge->priviledge_key;
    $status = $priviledge->status;
    if ($priviledge_key == 'ADD') {
        if ($status == 1) {
            $AddClassP = ' style="display:block"; ';
        } else {
            $AddClassP = ' style="display:none"; ';
        }
    }

    if ($priviledge_key == 'EDIT') {
        // echo 11;
        if ($status == 1) {
            $EditClass = ' style="display:block"; ';
        } else {
            $EditClass = ' style="display:none"; ';
        }
    }

    if ($priviledge_key == 'DELETE') {
        if ($status == 1) {
            $DeleteClass = 'style="display:block"; ';
        } else {
            $DeleteClass = 'style="display:none"; ';
        }
    }

    if ($priviledge_key == 'VIEW') {
        if ($status == 1) {
            $ViewClass = 'style="display:block"; ';
        } else {
            $ViewClass = 'style="display:none"; ';
        }
    }
}

?>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Target List</span>
                <a <?= $AddClassP ?> data-toggle="modal" data-target="#GroupsPopup" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>

            <!-- datatable-button-flash-basic" -->
            <table class="table table-striped" id="MyTargetListTable">
                <thead >
                    <tr>
                        <th>Sr No</th>
                        <th>Target Period</th>
                        <th>Target Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Allocated Resource</th>
                        <th>Created Date</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;

                    foreach ($target_list as $row) {
                        if ($count % 2 == 0) {
                            $bg_color_class = 'class="bg"';
                        } else {
                            $bg_color_class = '';
                        }
                    ?>
                        <tr <?= $bg_color_class ?>>

                            <td>
                                <div>
                                    <?php echo $count ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:150px;">
                                    <?= $row['target_period'] ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row['target_type'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['start_date'])); ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['end_date'])); ?>
                                </div>
                            </td>

                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row['emp_list'] ?>
                                </div>
                            </td>

                            <td>
                                <div style="width:150px;">
                                    <?= date("d M Y", strtotime($row['date_created'])); ?>
                                </div>
                            </td>

                            <!-- <td class="text-center">
                                <div class="d-flex">
                                    <a class="cursor-pointer" data-toggle="modal" onclick="view_employee(id)" id="<?= $row['tr_auto_id']; ?>" data-popup="tooltip" title="View Allocated Employee List" data-placement="bottom" data-original-title="Edit Target" <?= $EditClass; ?>><i class="view fa fa-eye"></i></a>

                                    <a class="cursor-pointer" data-toggle="modal" onclick="edit_target('<?= $row['target_id']; ?>','<?= $row['tr_auto_id']; ?>')" id="<?= $row['target_id']; ?>" data-popup="tooltip" title="Edit Target" data-placement="bottom" data-original-title="Edit Target" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>
                                    <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id = "<?= $row['tr_auto_id']; ?>" id="<?= $row['tr_auto_id']; ?>" data-popup="tooltip" title="Delete Target" data-placement="bottom" data-original-title="Delete Target"><i class="fa fa-trash"></i></a>

                                </div>
                            </td> -->

                            <td>
                                <div style="width:150px;">
                                    <ul class="pull-right dflex Padding-0 m-auto text-black">
                                        <li>  
                                            <div>
                                                <div class="panel-button">
                                                    <a class="list-icons-item" title="Select Action" rel="tooltip">
                                                        <i class="icon-menu9" style="cursor:pointer;"></i>
                                                    </a>
                                                </div>
                                                
                                                <div class="my-popover-content" style="display:none">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="modal" onclick="edit_target('<?= $row['target_id']; ?>','<?= $row['tr_auto_id']; ?>')" id="<?= $row['target_id']; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Target  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" onclick="DeleteList(this)" data-id = "<?= $row['tr_auto_id']; ?>" id="<?= $row['tr_auto_id']; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Target
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" onclick="view_employee(id)" id="<?= $row['tr_auto_id']; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-blue"></span> View Target  
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div> 

                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>
<!--popup-->

<div id="GroupsPopup" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" style="z-index: 1050 !important;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Target List</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="Target_Form">
                <div class="modal-body">
                    <div class="row">

                        <div class="d-flex col-12">
                            <div class="form-group col-6 p-0">
                                <label class="control-label col-sm-6" for="Youtube">Target Period <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="target_period" id="target_period" onchange="mainInfo()" data-placeholder="Select Target Period">
                                        <option value=""> Select Target Period </option>
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
                            <div class="form-group col-6">
                                <label class="control-label col-sm-6" for="Youtube">Recurring Count <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="recurring_cnt" name="recurring_cnt" placeholder="Enter Recurring Count" value="1"onkeyup="mainInfo()">
                                </div>
                            </div>
                        </div>

                        <div id="onchange_display" style="display: none">
                            <div class="d-flex col-12 row pl-4">
                                <div class="form-group col-6 p-0">

                                    <label>Start Date <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control add-activity-selectors rounded-right" id="start_date" name="start_date" onchange="startdate_result()" value="<?= date('d F, Y'); ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>End Date <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                        </span>
                                        <input type="text" class="form-control rounded-right" id="end_date" name="end_date" onchange="enddate_result()" readonly>
                                        <input type="text" style="display: none" class="form-control add-activity-selectors rounded-right" id="end_date1" name="end_date1" onchange="enddate_result()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-12 row">
                            <div class="form-group col-6">
                                <label class="control-label col-sm-12" for="Youtube">Target Type <span style="color: red;">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="targettype_id" id="targettype_id" onchange="mainInfo1()" data-placeholder="Select Target Type">
                                        <option value="">Select Target Type</option>
                                        <?php
                                        foreach ($target_type->result() as $value2) { ?>
                                            <option value="<?= $value2->targettype_id ?>">
                                                <?= $value2->target_type ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div id="issuelistdetails">
                                    <!-- <input class="form-control" type="hidden" id="name_values" name="name_values"> -->
                                    <input class="form-control" type="hidden" id="checked_index" name="checked_index">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12" id="issuelistdetailsshow" style="max-height: 330px; overflow: scroll; overflow-x: hidden;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-right:40px;">
                        <button type="submit" class="btn btn-primary" id="sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview"></span>
                </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<div id="modal_default1" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog" style="z-index:1050 !important">
    <div class="modal-dialog modal-lg modal-adj">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Target List</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>

<div id="view_targate" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div id="view_targate1"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#start_date').change(function() {
        $('#Target_Form').bootstrapValidator('revalidateField', 'start_date');
    });

    $('#end_date').change(function() {
        $('#Target_Form').bootstrapValidator('revalidateField', 'end_date');
    });
</script>

<!--========================== / Date picker javascript ====================================-->
<!--========================= Show hide div target creation ==================================-->
<script type="text/javascript">
    function displaydiv() {
        // alert();
        $('#onchange_display').show();
        $('#onchange_display').css("display", "contents");
    }
</script>

<!-- <script type="text/javascript">
  
  function getdate()
  {
      var tt = document.getElementById('txtDate').value;

      var date = new Date(tt);
      var newdate = new Date(date);

      newdate.setDate(newdate.getDate() + 3);
      
      var dd = newdate.getDate();
      var mm = newdate.getMonth() + 1;
      var y = newdate.getFullYear();

      var someFormattedDate = mm + '/' + dd + '/' + y;
      document.getElementById('follow_Date').value = someFormattedDate;
  }

</script> -->
<!--========================= / Show hide div target creation ==================================-->


<!--============================== date comparision and get employee list ================================-->

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
            // if (target_period == 'Daily') {
            //     newdate.setDate(newdate.getDate() + 0);
            //     // var add_days='0';
            // } else if (target_period == 'Weekly') {
            //     newdate.setDate(newdate.getDate() + 7);
            //     var add_days = '7';
            //     // $('#end_date').prop('readonly',true);
            //     // $('#end_date').attr('readonly',true);
            //     // alert(add_days);
            // } else if (target_period == 'Fortnightly') {
            //     newdate.setDate(newdate.getDate() + 15);
            //     // var add_days='15';
            // } else if (target_period == 'Monthly') {
            //     newdate.setDate(newdate.getDate() + 30);
            //     // var add_days='31';
            // }

            if (target_period == 'Daily') 
                {
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
                    var cnt1 = recurring_cnt * 90 - 1;
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

            var someFormattedDate = dd + ' ' + full_month + ', ' + y;
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

            $('#end_date').prop('readonly',true);
            // $('#end_date').attr('readonly',true);


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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;

                }
                // alert();

            } 
            // else if ((Date.parse(startDate) > Date.parse(endDate))) {

            //     $('#desktopbutton').prop('disabled', true);
            //     new PNotify({
            //         title: 'Event',
            //         text: 'End date should be greater than Start date',
            //         type: 'warning'
            //     });

            // } 
            else {
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;

                } else {
                    $('#issuelistdetailsshow').hide();
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;

                } else {
                    $('#issuelistdetailsshow').hide();
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
                }
            }
        }
    }
</script>



<script type="text/javascript">
    function mainInfo() {
        var startDate = document.getElementById("start_date").value;
        var recurring_cnt = document.getElementById("recurring_cnt").value;
        // alert(startDate);
        $('#onchange_display').show();
        $('#onchange_display').css("display", "contents");
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
                var cnt1 = recurring_cnt * 90 - 1;
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

            var someFormattedDate = dd + ' ' + full_month + ', ' + y;
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
                // alert(start_date);
                if (target_period == 'Daily') {
                    var end_date = document.getElementById("end_date").value;
                } else {
                    var end_date = document.getElementById("end_date1").value;
                }
                targettype_id = $('#targettype_id').val();

                if (end_date != '' && targettype_id != '') {
                    
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // console.log(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);
                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
                }
                // alert();

            } 
            // else if ((Date.parse(startDate) > Date.parse(endDate))) {

            //     $('#desktopbutton').prop('disabled', true);
            //     new PNotify({
            //         title: 'Event',
            //         text: 'End date should be greater than Start date',
            //         type: 'warning'
            //     });

            // } 
            else {
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            // $('#issuelistdetails').show();
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
                }
            }
        }
    }


    function mainInfo1() {
        // alert();
        var startDate = document.getElementById("start_date").value;
        // alert("hii");
        $('#onchange_display').show();
        $('#onchange_display').css("display", "contents");
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
                // alert("If");
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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
                            $('#issuelistdetailsshow').css("display","block");
                            $('#issuelistdetailsshow').html(data);
                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;

                } else {
                    $('#issuelistdetailsshow').hide();
                }
                // alert();

            } 
            // else if ((Date.parse(startDate) > Date.parse(endDate))) {

            //     $('#desktopbutton').prop('disabled', true);
            //     new PNotify({
            //         title: 'Event',
            //         text: 'End date should be greater than Start date',
            //         type: 'warning'
            //     });

            // } 
            else {
                // alert("else");

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
                    var datastring = 'start_date=' + start_date + '&end_date=' + end_date + '&targettype_id=' + targettype_id;
                    // alert(datastring);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('admin/Target/getallemployeefortargetliist'); ?>",
                        cache: false,
                        data: datastring,
                        success: function(data) {
                            // alert(data);
//$('#issuelistdetails').show();
                            $('#issuelistdetailsshow').css("display","block");
                            $('#issuelistdetailsshow').html(data);


                        },
                        error: function() {
                            $('#deleteErrorModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    $('#issuelistdetailsshow').hide();
                }
            }
        }
    }
</script>


<!--========================= selected area form submit ==================================-->
<script type="text/javascript">
    function getCheckedCheckboxesFor() {
        var values = [];
        $('input[type=checkbox]:checked').each(function(index) {
            var id = $(this).val();
            values.push(id);

        });
        // alert(values);
        var datastring = 'areaid=' + values;
        $('#name_values').val(datastring);
        // alert(datastring);
        $.ajax({
            url: "<?php echo base_url('admin/Target/add_target'); ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // alert(data);

                PNotify.removeAll();
                new PNotify({
                    title: 'Add Target',
                    text: 'Target added successfully',
                    type: 'success'
                });
            },
            error: function() {
                alert('fail');
            }
        });

    }
</script>
<!--========================= / selected area form submit ==================================-->

<!--=======================================  Validation login  ==========================================-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#Target_Form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        }
                    }
                },
                end_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please select end date'
                        }
                    }
                },

                targettype_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Target Type'
                        }
                    }
                },

                recurring_cnt: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Recurring Count'
                        }
                    }
                },

                target_period: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Target Period'
                        }
                    }
                },

                emailid: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                }
            }
        });
    });
</script>


<!--======================================= / Validation login  ==========================================-->
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#Target_Form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                var pos = [];
                $(".day").each(function(i) {
                    if (this.checked) {
                        // alert("Checkbox at index " + i + " is checked.");
                        pos.push(i);
                    }
                });

                // $('#checked_index').val(pos);

                // // alert(pos);
                // var values = [];
                // $('input[type=checkbox]:checked').each(function(index) {
                //     var id = $(this).val();
                //     values.push(id);
                // });
                // // alert(values);
                // // var datastring='areaid='+values;
                // $('#name_values').val(values);
                // // alert(datastring);
                $.ajax({
                    url: "<?php echo base_url('admin/Target/add_target'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 0) {
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Form',
                                //     text: 'Please tick the checkbox / fill necessary value',
                                //     type: 'warning'
                                // });
                                $("#checkboxModal").modal('show');
                                $('#sub_btn').prop('disabled', false);

                            });
                        } 
                        else if(data == 1)
                        {
                            $(function() {
                                // new PNotify({
                                //     title: 'Add Form',
                                //     text: 'Target added successfully',
                                //     type: 'success'
                                // });
                                $("#GroupsPopup").modal('hide');
                                $("#successModalTargetList").modal('show');

                            });
                        }
                        else 
                        {
                            $("#alertModal").modal('show');

                        }
                    },
                    error: function() {
                        $("#alertModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>



<!--=======================================  delete Event  ==========================================-->

<script>
    function delete_target(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Target?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'targetid=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Target/delete_target'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Form',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Target'); ?>";
                    }, 1000);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>



<!--======================================= / Delete Event  ==========================================-->


<!--========================= View selected employee list ==================================-->
<script type="text/javascript">
    function view_employee(id) {
        var datastring = 'targetid=' + id;
        // $('#name_values').val(datastring);
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Target/view_emp_list'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                $('#view_targate').modal('show');
                $('#view_targate1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('fail');
            }
        });

    }
    function updateUI_view_button_close()
    {
        $(".popover-body").css('display','block');
        $('#view_button_close').attr('data-dismiss', 'modal');
    }
</script>
<!--========================= / View selected employee list ==================================-->

<script>
    function edit_target(id,auto_id) {
        var datastring = 'targetid=' + id + '&tr_auto_id='+auto_id;
        // alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Target/edit_target'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                // alert('Error while request..');
                $('#deleteErrorModal').modal('show');
            }
        });

    }
    function updateUI_edit_button_close()
    {
        // $(".popover-body").css('display','block');
        // $('#modal_default1').modal('hide');
        location.reload();
    }
</script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Type?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'typeid=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/deactivate3'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Inactive successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master/typelist'); ?>";
                    }, 800);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<script>
    function activate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Type?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

        // On confirm
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'typeid=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Master/activate3'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Master/typelist'); ?>";
                    }, 800);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>


<!--======================================= / Activate & Deactivate ==========================================-->

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalTargetList" tabindex="-1" aria-labelledby="successModalTargetListLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalTargetListLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Target Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertTragetlistdateModal" tabindex="-1" aria-labelledby="alertTragetlistdateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertTragetlistdateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Event</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">End date should be greater than Start date</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkboxModal" tabindex="-1" aria-labelledby="checkboxModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="checkboxModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-exclamation" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Edit Form</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Please tick the checkbox / fill necessary value</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteconfirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="confirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-trash" style="color: red;font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Target?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deletetargetlistForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" onclick="updateUI_delete_button_close()" id="delete_button_close" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSucessModal" tabindex="-1" aria-labelledby="deleteSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deleteSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Delete Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Deleted successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteErrorModal" tabindex="-1" aria-labelledby="deleteErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deleteErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Error while request..</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Target'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateconfirmationModal" tabindex="-1" aria-labelledby="deactivateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="deactivateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on" style="color: #d70404; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Target?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deactivateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateconfirmationModal" tabindex="-1" aria-labelledby="activateconfirmationModalLabel" data-keyboard="false" data-backdrop="static" style=" padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px">
        <div class="modal-content" style="padding: 30px">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="activateconfirmationModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-toggle-on fa-rotate-180" style="color: #36df20; font-size: 55px;background: transparent;margin-bottom: 15px;"></i>Confirmation</h5> 
            </div>
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Target?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="activateForm">
                        <input type="hidden" id="scheduletid" name="scheduletid" value="" >
                        <button type="submit" class="btn" style="background-color: #1e6196;color: #fff; font-size: 16px; margin-right:10px;">Yes</button>
                    </form>
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deactivateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Inactive successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="deactivateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="deactivateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Active successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Master/NotifyBy'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function deactivate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deactivateconfirmationModal').modal('show');
    };
    function activate (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#activateconfirmationModal').modal('show');
    };
</script>

<script>
$(document).ready(function(e) 
{
  $("#deactivateForm").on('submit', (function(e) 
  {
    if (e.isDefaultPrevented()) 
    {
    
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Master/notify_by_deactivate'); ?>",
          cache: false,
          data: { "time_slot_id": datastring },
          success: function(data) {
            $(function() {
              $("deactivateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
$(document).ready(function(e) 
{
  $("#activateForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
      // alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();
        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Master/notify_by_activate'); ?>",
          cache: false,
          data: { "time_slot_id": datastring },
          success: function(data) {
            $(function() {
              $("activateSucessModal").modal('show');
            });

          },
          error: function() {
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>

<script>
    function DeleteList (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    };
    function updateUI_delete_button_close()
    {
        $(".popover-body").css('display','block');
        $('#deleteconfirmationModal').modal('hide');
        // $('#delete_button_close').attr('data-dismiss', 'modal');
    }
</script>

<script>
$(document).ready(function(e) 
{
  $("#deletetargetlistForm").on('submit', (function(e) 
  {
    //e.preventDefault();
    if (e.isDefaultPrevented()) 
    {
    //   alert('invalid');
    } 
    else 
    {
        $("#preview").show();
        $("#preview").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
        var datastring = $("#scheduletid").val();

        $.ajax({
          type: "post",
          url: "<?php echo base_url('admin/Target/delete_target'); ?>",
          cache: false,
          data: { "targetid": datastring },
          success: function(data) {
            $(function() {
              $("deleteSucessModal").modal('show');
            });

            // setTimeout(function() {
            //   window.location = "<?php echo base_url('admin/Master'); ?>";
            // }, 1000);


          },
          error: function() {
            // alert('Error while request..');
            $("deleteErrorModal").modal('show');
          }
        });
    }

  }));
});
</script>
<script>
    $('#targettype_id').select2({
        tags: true,
		dropdownParent: $("#GroupsPopup")
   });
   $('#target_period').select2({
        tags: true,
		dropdownParent: $("#GroupsPopup")
   });
</script>
<script>
   $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
            value.focus();
        });
    });
</script>

<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyTargetListTable').DataTable( {       
        scrollCollapse: true,
        paging:         true, 
        // order: [[0, 'desc']],
        // fixedColumns: true,
        // lengthMenu: [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
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

    var columnsToHide = [2, 3]; // Example: Hide Phone and Address columns

    // Hide columns initially
    for (var i = 0; i < columnsToHide.length; i++) {
        rescheduleTable.column(columnsToHide[i]).visible(false);
    }

    // Event listener for column visibility change
    rescheduleTable.on('column-visibility.dt', function(e, settings, column, state) {
        // Update local storage with current visibility state
        var columnVisibility = rescheduleTable.columns().visible().toArray();
        localStorage.setItem('columnVisibility', JSON.stringify(columnVisibility));
    });

    // Check local storage for saved column visibility preferences
    var columnVisibility = localStorage.getItem('columnVisibility');
    if (columnVisibility) {
        columnVisibility = JSON.parse(columnVisibility);
        // Apply stored column visibility preferences
        for (var i = 0; i < columnVisibility.length; i++) {
            rescheduleTable.column(i).visible(columnVisibility[i]);
        }
    }

    
});
</script>
<script>

        $(document).ready(function () {
       
        // $(document).click(function (e) {
        //     if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
        //         $('.panel-button').popover('hide');
        //     }
        // });
        $(document).click(function (e) {
            if ($(e.target).is('.close')) {
                $('.panel-button').popover('hide');
            }
        });
});

</script>

