<?php $this->load->view('Admin/includes/n-header'); ?>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

<style>
    /* .dt-buttons {
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
    /* #example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3),#example1_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1){
        display: none;
    } */
    #example_default th:first-child{
        width:100px;
    }
    #example_default th{
        text-wrap: nowrap;
    }
</style>
<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card" style="min-height: unset;">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                <span class="span-py-10 white-text">Client Visit Report</span></i>
                <div class="col-md-6" style="display: flex;justify-content: end;align-items: center;column-gap: 20px;">
                    <a style="padding-top:7px;" onclick="showFilter()" title="Filter Task" rel="tooltip"><i class="fi fi-rs-search-alt" style="font-size:17px ;color:#fff ;"></i></a>
                    <!-- <a data-toggle="modal" data-target="#schedule_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a> -->
                </div>
            </div>
            <!-- <div class="row"> -->
                <form method="post" class="form displayFilter"  id="defaultForm" style="display:none;">
                    <div class="row" style="padding:20px 20px 0 20px;">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Select Resource <span style="color: red;">*</span></label>
                                <select class="form-control select2-accessible" name="emp_id" id="live_emp_id" onchange="btndisableremove()" data-placeholder="Select Resource">
                                    <span class="caret"></span>
                                    <option value="">Select Resource</option>
                                    <?php
                                    foreach ($employee_list as $value1) {
                                    ?>
                                        <option value="<?= $value1->id ?>"><?= $value1->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label> Start Date <span style="color: red;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-selectors rounded-right" name="form_date" id="form_date" value="<?= date('d F, Y');?>">
                            </div>
                        </div>
                        <div class="col-lg-6 mt-4 text-right">
                            <span id="loader_gif"></span>
                            <button type="submit" class="btn btn-primary" id="mybtn">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            <!-- <span id="preview"></span> -->
                        </div>
                    </div>
                </form>
            <!-- </div> -->

        </div>
        <div class="card">
            <div class="ibox-content">
                <div class="table-responsive">
                <table id="example_default" class="table table-striped" >
                    <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Company Name</th>
                        <th>Location</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Interval</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($ClientReport as $res)  { ?>
                            <tr class="gradeA">
                                    <td>
                                    <div>
                                    <?=  $i; ?>
                                    </div>
                                    </td>
                                    <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?=  $res['company_name']; ?>
                                    </div>
                                    </td>
                                    <td>
                                    <div style="width:150px;" class="text-wrap-col">
                                    <?=   $res['address']; ?>
                                    </div>
                                    </td>
                                    <td>
                                    <div style="width:150px;">
                                    <?=  $res['from']; ?>
                                    </div>
                                    </td>
                                    <td>
                                    <div style="width:150px;">
                                    <?=   $res['to']; ?>
                                    </div>
                                    </td>
                                    <td>
                                    <div style="width:150px;">
                                    <?=   $res['interval']; ?>
                                    </div>
                                    </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
        <div id='range_data'></div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>

<script type="text/javascript">
    $(function() {

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


<script type="text/javascript">
    $(function() {
        $('#form_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            maxDate: 'now',
            useCurrent: true
        });
    });
</script>
<script type="text/javascript">
    $("#form_date").on("dp.change", function(e) {

        $('#defaultForm').bootstrapValidator('revalidateField', 'form_date');
        document.getElementById("mybtn").disabled = false;
    });
</script>
<!--========================== / Date picker javascript ====================================-->

<script type="text/javascript">
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
                form_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Start Date '
                        }
                    }
                },
                
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#defaultForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#loader_gif").show();
                $("#loader_gif").html('<img src="<?= base_url() ?>assets/img/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('admin/Tracking/FetchClientReport') ?>',
                    data: $('#defaultForm').serialize(),
                    success: function(data) {
                        // alert(data);
                        $("#example_default_wrapper").hide();
                        $("#range_data").html(data);
                        $("#loader_gif").hide();
                        document.getElementById("mybtn").disabled = false;
                        // $('#example2').DataTable(
                        //     buttons: [
                        //         {
                        //             extend: 'colvis',
                        //             text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                        //             className: 'btn bg-indigo-400 btn-icon'
                        //         }
                        //     ],
                        // );
                        $("#example2").DataTable({
                           
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

                    }
                });
                // ------------------------
            }
            // return false;
            e.preventDefault();
        }));
    });
</script>
<script type="text/javascript">
          $('#live_emp_id').select2();
        
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