<?php $this->load->view('Admin/includes/n-header'); ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<style>
    /* .dt-buttons{
        display: none;
    } */
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
    #example_default_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#example_default_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3),#example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1){
        display: none;
    }
    #example_default th:first-child{
        width:100px;
    }
    #example_default th{
        text-wrap: nowrap;
    }
    .dt-button-collection .dt-button:last-child{
        display: none;
    }
</style>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Distance Report</span></i>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter Task" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>

            </div>
            <!-- <div class="row"> -->
                <form method="post" class="form displayFilter" id="defaultForm" style="display:none;">
                    <div class="row"  style="padding:20px 20px 0 20px">
                        <div class="col-lg-3">
                            <label> Start Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date" id="start_date" value="<?= date('d F, Y');?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label>End Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date"  id="end_date" value="<?= date('d F, Y');?>" onchange="checkvalidationdate()">
                                <small id = 'error_end_date' style="display:none; color: #f00 !important">End date can not be less than start date</small>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Select Resource <span style="color: red;">*</span></label>
                                <select class="select form-control" name="emp_id" id="emp_id" onchange="btndisableremove()" data-placeholder="Select Resource">
                                    <span class="caret"></span>
                                    <option value="">Select Resource</option>
                                    <?php
                                    foreach ($employeelist as $value1) {
                                    ?>
                                        <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 mt-4 text-right">
                            <span id="loader_gif"></span>
                            <!-- <span id="preview" ></span> -->
                            <button type="submit" class="btn btn-primary" id="act_sub_btn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            
                        </div>
                    </div>


                    <!-- 
                    <div class="col-lg-12 dflex">
                        <div class="col-lg-4">
                            <label> Start Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="start_date">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>End Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="end_date">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Select Employee <span style="color: red;">*</span></label>
                                <select class="select form-control" name="emp_id" id="emp_id" onchange="btndisableremove()" data-placeholder="Select Employee">
                                    <span class="caret"></span>
                                    <option value="">Select Employee</option>
                                    <?php
                                    foreach ($employeelist as $value1) {
                                    ?>
                                        <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto">
                            <button type="submit" class="btn btn-primary" id="desktopbutton">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <span id="preview" ></span>
                        </div>
                    </div> -->
                </form>
            <!-- </div> -->

            
        </div>
        <div class="card">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table id="example_default" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Date</th>
                                <th>Distance (K.M.)</th>
                                <th class="d-none"></th>
                                <th class="d-none"></th>
                                <th class="d-none"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count=1;
                                foreach ($date_report as $value2)
                                {  ?>
                                    <tr>
                                        <td>
                                            <div>
                                            <?= $count ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                            <?= date("d M Y",strtotime($value2['Date']));  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:150px;">
                                            <?= $value2['Distance'];?>
                                            </div>
                                        </td>
                                        <td class="d-none"><?= $value2['Date']; ?></td>
                                        <td class="d-none"><?= $value2['Date']; ?></td>
                                        <td class="d-none"><?= $value2['Date']; ?></td>
                                        
                                    </tr>
                            <?php $count++; } ?> 
                        </tbody>
                    </table>
                </div>
            </div>    
            <div id='range_data'></div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $(document).ready(function() {

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '&rarr;',
                    'previous': '&larr;'
                }
            }
        });

        // Basic initialization
        var rescheduleTable = $('#example_default').DataTable({
            "buttons": [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        });

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

        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

    });
</script>
<?php $this->load->view('Admin/includes/n-footer'); ?>
<script>
    function btndisableremove() {


        var startDate = document.getElementById("start_date").value;
        var endDate = document.getElementById("end_date").value;

        if (startDate != '') {

            if ((Date.parse(startDate) == Date.parse(endDate))) {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            } else if ((Date.parse(startDate) > Date.parse(endDate))) {
                PNotify.removeAll();
                $('#desktopbutton').prop('disabled', true);
                new PNotify({
                    title: 'Event',
                    text: 'End date should be greater than Start date',
                    type: 'warning'
                });

            } else {
                PNotify.removeAll();
                document.getElementById("desktopbutton").disabled = false;
            }
        }

    }

    $(document).ready(function() {
        $("#emp_id").select2();
    });
    $("#start_date").on("dp.change", function(e) {
        $('#defaultForm').bootstrapValidator('revalidateField', 'start_date');
        document.getElementById("desktopbutton").disabled = false;
    });
    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Resource '
                        }
                    }
                },
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Date '
                        }
                    }
                },
                end_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select End Date '
                        }
                    }
                }
            }
        });
    });

    $(document).ready(function(e) {
        $("#defaultForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#loader_gif").show();
                // document.getElementById("desktopbutton").disabled = true;
                $("#loader_gif").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                // alert();
                // document.getElementById("desktopbutton").disabled = true;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('admin/Tracking/daterange_distance') ?>',
                    data: $('#defaultForm').serialize(),
                    success: function(data) {
                        // alert(data);
                        // document.getElementById("desktopbutton").disabled = false;
                        $("#example_default_wrapper").hide();
                        $("#range_data").html(data);
                        $("#example1").DataTable({
                            // responsive: true,
                            language: {
                                search: '<span>Filter:</span> _INPUT_',
                                lengthMenu: '<span>Show:</span> _MENU_',
                                paginate: {
                                    'first': 'First',
                                    'last': 'Last',
                                    'next': '&rarr;',
                                    'previous': '&larr;'
                                }
                            },
                            buttons: [
                                {
                                    extend: 'colvis',
                                    text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                                    className: 'btn bg-indigo-400 btn-icon'
                                }
                            ],
                        });
                        
                        // $('#example1').DataTable();
                        $("#act_sub_btn").attr('disabled', false);
                        $("#loader_gif").hide();
                        $("#all_data").hide();
                    }
                });
                // ------------------------
            }
            // return false;
            e.preventDefault();
        }));
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
    function showFilter() {
        var filter = document.querySelector(".displayFilter");
        // filter.style.display = "block";
        if (filter.style.display === "none") {
            filter.style.display = "block";
        } else {
            filter.style.display = "none";
        }

    }


</script>

<script>
    function checkvalidationdate()
        {
            var start_date = new Date($('#start_date').val());
            var end_date = new Date($('#end_date').val());
            if (start_date > end_date) 
            {
                $('#error_end_date').css('display','block');
                $("#act_sub_btn").attr('disabled', true);
            }
            else
            {
                $('#error_end_date').css('display','none');
                $("#act_sub_btn").attr('disabled', false);
            }
        } 
</script>