<?php $this->load->view('Admin/includes/n-header');    ?>
<style>
     table td{
        color: #000 !important;
    }
    /* table td:nth-child(1) a div:hover{
        color: #605959 !important;
    } */
    .popover .arrow{
        display: none !important;
    }
   .popover-body{
        width: 250px !important;
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
    #MyProductSpecificationTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1),#MyProductSpecificationTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(2),#MyProductSpecificationTable_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(3){
        display: none;
    }
    tr.bg {
        background: #fff !important;
    }
    .dt-button{
        color: #fff ;
        background-color: #1e6196 ;
        border-color: #1e6196 ;
        width: 50px;
    }
    .dt-button:hover{
        color: #fff ;
    }
    .dt-button .icon-grid3::after{
        font-family: icomoon ;
        display: inline-block ;
        border: 0 ;
        vertical-align: middle ;
        font-size: 1rem ;
        margin-left: 0.46875rem ;
        line-height: 1 ;
        position: relative ;
        content: "" ;
    }
    .dt-button .buttons-columnVisibility{
        width:100% ;
    }
    #MyProductSpecificationTable th:first-child{
        width:50px !important;
        text-wrap:nowrap !important;
    }
    .card-header:not([class*=bg-])+.dataTables_wrapper>.datatable-header {
        padding-top: 1.25rem;
    }
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>
<?php
// echo json_encode($user_permission);
$AddClassP = 'style="display:block";';
$EditClass = 'style="display:block";';
$DeleteClass = 'style="display:block";';
$StatusClass = 'style="display:block";';

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
}

?>

<div class="content">
    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                <span class="span-py-10 white-text">Product Specification</span>
                <a <?= $AddClassP ?> data-toggle="modal" data-target="#Product-Specification" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a>
            </div>
            <!-- datatable-button-flash-basic -->
            <table class="table table-striped" id="MyProductSpecificationTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Specification Name</th>
                        <th>Specification Description</th>
                        <th>Action</th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                        <th class="d-none"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($listdata as $row) {
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
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->specification_name ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap-col" style="width:200px;">
                                    <?= $row->specification_desc ?>
                                </div>
                            </td>
                            <!-- <td class="text-center">
                                <div class="row">
                                    <a class="cursor-pointer" data-toggle="modal" onclick="Edit(id)" id="<?= $row->specification_id; ?>" data-popup="tooltip" title="Edit schedule" data-placement="bottom" data-original-title="Edit schedule" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>
                                    <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->specification_id ?>"  id="<?= $row->specification_id; ?>" data-popup="tooltip" title="Delete schedule" data-placement="bottom" data-original-title="Delete schedule"><i class="fa fa-trash"></i></a>
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
                                                            <a data-toggle="modal" onclick="Edit(id)" id="<?= $row->specification_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-green"></span> Edit Product Specification  
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row->specification_id ?>"  id="<?= $row->specification_id; ?>" style="color:#333333;">
                                                                <span class="status-mark position-left dot dot-red"></span> Delete Product Specification  
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 

                                        </li>
                                        <!-- </i></a></li> -->
                                    </ul>
                                </div>
                            </td>

                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
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

<div id="Product-Specification" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    Add Product Specification</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-horizontal" id="addProductSpecification">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product Specification Name <sup style="color: red">*</sup></label>
                        <input type="text" class="form-control" name="specification_name" autocomplete="off" placeholder="Enter Product Specification Name">
                    </div>
                    <div class="form-group">
                        <label>Product Specification Description </label>
                        <input type="text" class="form-control" name="specification_desc" autocomplete="off" placeholder="Enter Product Specification Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">Edit Product Specification</h6>
                <button type="button" class="close" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>

            <div class="modal-body">
                <div id="complaint_model_data1"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#addProductSpecification').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                specification_name: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Product Specification Name'
                        }
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#addProductSpecification").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: "<?php echo base_url('admin/ProductSpecification/Add'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_upload").hide();
                        // alert(data);
                        $(function() {
                            // new PNotify({
                            //     title: 'Add Specification',
                            //     text: 'Added Successfully !!',
                            //     type: 'success'
                            // });
                            $('#Product-Specification').modal('hide');
                            $('#successproductspecification').modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/ProductSpecification'); ?>";
                        // }, 1000);
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


<script>
    function Edit(specification_id) {
        var datastring = 'specification_id=' + specification_id;
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/ProductSpecification/Edit'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                // alert(data);
                $('#modal_default1').modal('show');
                $('#complaint_model_data1').html(data);
                $(".popover-body").css('display','none');
            },
            error: function() {
                alert('Error while request..');
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

<script>
    function Delete(specification_id) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this specification ?</p>',
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

            var datastring = 'specification_id=' + specification_id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/ProductSpecification/Delete'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Specification',
                            text: 'Deleted successfully !!',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/ProductSpecification'); ?>";
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
    function DeleteList (element) 
    {
        var Id = element.getAttribute("data-id");
        $('#scheduletid').val(element.getAttribute("data-id"));
        $('#deleteconfirmationModal').modal('show');
        $(".popover-body").css('display','none');
    }
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
  $("#deleteprdspeForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/ProductSpecification/Delete'); ?>",
          cache: false,
          data: { "specification_id": datastring },
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successproductspecification" tabindex="-1" aria-labelledby="successproductspecificationLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successproductspecificationLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product Specification Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Product Specification?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteprdspeForm">
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
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
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
                <a href="<?php echo base_url('admin/ProductSpecification'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var rescheduleTable = $('#MyProductSpecificationTable').DataTable( {       
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
