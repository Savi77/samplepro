<style>
    #Manage-Products {
    overflow-y:scroll; 
    }

   #modal_default1{
    overflow-y:scroll;
   }
</style>
<?php $this->load->view('Admin/includes/n-header'); ?>
<style>
    .dt-buttons {
        display: none;
    }

    tr.odd {
        background: white;
        color: black;
    }
    table td{
        color: #000 !important;
    }
    /* table td .media-title a:hover{
        color: #605959 !important;
    } */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .popover .arrow{
        display: none !important;
    }
   .popover-body{
        width: 250px !important;
    }
    .popover-body ul{
        padding-left: 0;
        margin-bottom: 0;
    }
    #mydata_wrapper button.dt-button.buttons-columnVisibility:nth-last-child(1){
        display: none;
    }
    /* tr.bg {
        background: #fff !important;
    } */
    /* #MyProductSpecificationTable th:first-child{
        width:50px !important;
        text-wrap:nowrap !important;
    }
    .card-header:not([class*=bg-])+.dataTables_wrapper>.datatable-header {
        padding-top: 1.25rem;
    } */
    .popover-body li{
        padding: 2px 8px;
    }
    .popover-body li:hover{
        background: #eeebeb;
        
    }
</style>
<?php
    $AddClassP = 'style="display:block";';
    $EditClass = 'style="display:block";';
    $DeleteClass = 'style="display:block";';
    $StatusClass = 'display:block';
    $importClass = 'display:block';
    $exportClass = 'display:block';

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

        if ($priviledge_key == 'ACTIVE') {
            if ($status == 1) {
                $StatusClass = 'display:block';
            } else {
                $StatusClass = 'display:none';
            }
        }

        if ($priviledge_key == 'IMPORT') {
            if ($status == 1) {
                $importClass = 'display:block';
            } else {
                $importClass = 'display:none';
            }
        }
        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) {
                $exportClass = 'display:block';
            } else {
                $exportClass = 'display:none';
            }
        }
    }
?>
<div class="content-wrapper">
    <div class="content">
        <div class="row crm-row d-none">
            <div class="col-lg-12 center-align crm-col">
                <div class="col-lg-3 col-sm-4 small-col" <?= $AddClassP ?>>
                    <button type="button" class="notes" data-toggle="modal" data-target="#">
                        <figure class="sub-header-icon">
                            <a data-toggle="modal" data-target="#Manage-Products"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/add.png">
                                <figcaption> Add </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
                <div class="col-lg-3 col-sm-4 small-col">
                    <button type="button" class="notes" data-toggle="modal" data-target="#" style="<?= $importClass; ?>" onclick="ImportContact()">
                        <figure class="sub-header-icon">
                            <a href="#"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/import.png">
                                <figcaption> Import Lead </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <button type="button" class="notes" data-toggle="modal" data-target="#">
                        <figure class="sub-header-icon">
                            <a style="<?= $exportClass; ?>" href="<?= base_url('admin/Product/ExportProductService'); ?>"><img class="crm-img" src="<?= base_url() ?>new-assets/assets/Images/export.png">
                                <figcaption> Export Leads / Opp </figcaption>
                            </a>
                        </figure>
                    </button>
                </div>
            </div>

        </div>
        <form class="form-vertical" id="UpdateDataChk" method="post">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <span class="span-py-10 white-text">Manage Product</span>
                    <div class="small-div contact text-right" <?= $AddClassP ?> >
                        <span class="span-py-10 white-text"> <a data-toggle="modal" data-target="#Manage-Products"><i class="icon-file-plus text-primary"><span class="left-padding">Add</span></i></a></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="mydata">
                        <thead class="d-none"></thead>
                        <tbody>
                            <?php foreach ($get_list as $row) { ?>
                                <tr>
                                    <!-- <td class="p-0">
                                        <div class="col-sm-12 p-0">
                                            <div class="d-flex align-items-start flex-column flex-md-row">
                                                <div class="w-100  order-2 order-md-1">
                                                    <div class="card pt-3 pb-3 mb-0">
                                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">

                                                            <div class="col-md-2">
                                                                <?php if (!empty($row['image'])) { ?>
                                                                    <img style="height:100px;width:100%;" src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $row['image'] ?>">
                                                                <?php } else { ?>
                                                                    <img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg">
                                                                <?php } ?>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <div class="media-body" style="text-align: left;">
                                                                    <h6 class="media-title font-weight-semibold" style="margin-bottom: 0px;">
                                                                        <a href="#"><b><?= $row['prdsrv_name'] ?></b></a>
                                                                    </h6>
                                                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                                        <li class="list-inline-item"><a href="#" class="text-muted">Category : <?= ucwords($row['category']) ?></a></li>
                                                                        <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;Sub Category : <?= ucwords($row['subcategory']) ?></a></li>
                                                                        <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;UOM : <?= ucwords($row['prdsrv_uom']) ?></a></li>
                                                                        <li class="list-inline-item"><a href="#" class="text-muted">|&nbsp; &nbsp;Product Code : <?= ucwords($row['product_code']) ?></a></li>
                                                                    </ul>
                                                                    <p class="mb-3"><?= $row['prdsrv_description'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 text-center">
                                                                <h5 class="mb-0 font-weight-semibold" style="margin-top: 0px;">₹ <?= $row['price'] ?></h5>
                                                                <div class="mb-2" style="<?= $StatusClass; ?>">
                                                                    <?php if ($row['status'] == 1) { ?>
                                                                        <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row['prd_srv_id'] ?>" data-id="<?= $row['prd_srv_id']; ?>" onclick="deactivate(this)"> Active </button>
                                                                    <?php } else { ?>
                                                                        <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row['prd_srv_id'] ?>" data-id="<?= $row['prd_srv_id']; ?>" onclick="activate(this)"> Inactive </button>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-sm-12 ml-4 d-flex">
                                                                    <a class="cursor-pointer" data-toggle="modal" onclick="edit_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>" data-popup="tooltip" title="Edit Product" data-placement="bottom" data-original-title="Edit Product" <?= $EditClass; ?>><i class="fa fa-edit"></i></a>

                                                                    <a <?= $DeleteClass; ?> class="cursor-pointer" data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row['prd_srv_id']; ?>" id="<?= $row['prd_srv_id']; ?>" data-popup="tooltip" title="Delete Product" data-placement="bottom" data-original-title="Delete Product"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div style="width:150px">
                                            <?php if (!empty($row['image'])) { ?>
                                                <img style="height:100px;width:100%;" src="<?= base_url() ?>assets/admin/product_service/single_product_image/<?= $row['image'] ?>">
                                            <?php } else { ?>
                                                <img style="height:64px;width:64px;" src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg">
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:800px">
                                            <h6 class="media-title" style="margin-bottom: 0px;">
                                                <a style="color:#000;font-weight:600;cursor:auto;"><?= $row['prdsrv_name'] ?></a>
                                            </h6>
                                            <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                <li class="list-inline-item"><a class="text-muted">Category : <?= ucwords($row['category']) ?></a></li>
                                                <li class="list-inline-item"><a class="text-muted">|&nbsp; &nbsp;Sub Category : <?= ucwords($row['subcategory']) ?></a></li>
                                                <li class="list-inline-item"><a class="text-muted">|&nbsp; &nbsp;UOM : <?= ucwords($row['prdsrv_uom']) ?></a></li>
                                                <li class="list-inline-item"><a class="text-muted">|&nbsp; &nbsp;Product Code : <?= ucwords($row['product_code']) ?></a></li>
                                            </ul>
                                            <p class="mb-3"><?= $row['prdsrv_description'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:100px">
                                            <?= $row['price'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:150px">
                                            <?php if ($row['status'] == 1) { ?>
                                                <button type="button" class="green-btn" data-popup="tooltip" title="Click for Inactive" data-placement="bottom" data-original-title="Click for Inactive" id="<?= $row['prd_srv_id'] ?>" data-id="<?= $row['prd_srv_id']; ?>" onclick="deactivate(this)"> Active </button>
                                            <?php } else { ?>
                                                <button type="button" class="red-btn" data-popup="tooltip" title="Click for Activate" data-placement="bottom" data-original-title="Click for Activate" id="<?= $row['prd_srv_id'] ?>" data-id="<?= $row['prd_srv_id']; ?>" onclick="activate(this)"> Inactive </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:100px;">
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
                                                                    <a data-toggle="modal" onclick="edit_prdsrv(id)" id="<?= $row['prd_srv_id']; ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-green"></span> Edit Product
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="modal" onclick="DeleteList(this)" data-id="<?= $row['prd_srv_id']; ?>" id="<?= $row['prd_srv_id']; ?>" style="color:#333333;">
                                                                        <span class="status-mark position-left dot dot-red"></span> Delete Product
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> 

                                                </li>
                                            </ul>
                                        </div>
                                    </td>


                                    <!-- <td class="d-none"></td>
                                    <td class="d-none"></td>
                                    <td class="d-none"></td>
                                    <td class="d-none"></td> -->
                                    <td class="d-none"></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        var rescheduleTable = $('#mydata').DataTable({
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            // order: [[1, 'desc']],
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
        });
    });     
</script>
<!-- <script> 
$(document).ready(function(){
    var rescheduleTable = $('#mydata').DataTable( {       
        // scrollX:        true,
        scrollCollapse: true,
        // autoWidth:         true,  
        paging:         true, 
        order: [[0, 'desc']],
        // columnDefs: [
        // { "width": "150px", "targets": [3] },
        // { "width": "100px", "targets": [0,1,2,4,6] },  
        // { "width": "50px", "targets": [5,7] },
        // ],
        fixedColumns: true,
        "lengthMenu": [[10, 25, 50,100,500,1000,1500, -1], [10, 25, 50,100,500, 1000,1500,"All"]],
        buttons: [
            {
                extend: 'colvis',
                text: '<i class="icon-grid3"></i> <span class="caret"></span>',
                className: 'btn bg-indigo-400 btn-icon'
            }
        ],
        stateSave: true,
        columnDefs: [
            {
                targets: -1,
                visible: true,
            }
        ]
    } );

    // $('#myTable').dataTable();
});
</script> -->

<?php $this->load->view('Admin/includes/n-footer'); ?>

<div id="Manage-Products" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">&nbsp;Add New Product-Service</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form class="form-vertical" id="addManageProduct" method="post">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <fieldset class="width-100" style="width:97%;margin:10px auto;">
                                <div class="col-md-12 d-flex responsive">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-6" for="email">Product-Service Type <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice" style="display:flex;">
                                                    <span class="checked"><input type="radio" name="prd_srv_type" checked="" class="styled" value="product" onclick="product_group()"></span><span class="padding-left">Product</span>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <div class="choice" style="display:flex;"><span class="checked"><input type="radio" name="prd_srv_type" class="styled" value="service" onclick="service_group()"></span><span class="padding-left">Service</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Product Category <sup style="color: red">*</sup></label>
                                            <select name="menu_id" class="form-control" onchange="fetch_submenu(this.value)" id="menu_id_2" data-placeholder="Select Product Category">
                                                <option value="">Select Product Category</option>
                                                <?php
                                                foreach ($get_menu_list as $value) {
                                                ?>
                                                    <option value="<?= $value->id ?>"><?= $value->interest; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Product Sub-Category <sup style="color: red">*</sup></label>
                                            <select name="submenu_id" class="form-control" id="submmenu_data_2" data-placeholder="Select Product Sub-Category">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Name <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Printing Name <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="printing_name" placeholder="Enter Printing Name" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Code <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="product_code" placeholder="Enter Product Code" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Image <sup style="color: red">*</sup></label>
                                            <div class="d-flex no-margin-top">
                                                <div class="media-left">
                                                    <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/placeholder1.jpg" style="width: 50px; height: 50px;margin-right:10px;" class="img-rounded" alt="" id="blah"></a>
                                                </div>
                                                <div class="media-body">
                                                    <input type="file" name="fileup" id="imgInp" class="form-control" style="padding:4px;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select UOM <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="uom_type" id="uom_type_5" data-placeholder="Select UOM">
                                                <option value="">Select UOM</option>
                                                <?php
                                                foreach ($get_data->result() as $uom) {
                                                ?>
                                                    <option value="<?= $uom->uom_id ?>"><?= $uom->uom_type; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Price <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="prd_srv_price" name="prd_srv_price" placeholder="Enter Product / Service Price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Specification <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="specification_id" id="specification_id_2" data-placeholder="Select Product Specification">
                                                <option value="">Select Specification</option>
                                                <?php
                                                foreach ($specification_array as $row) {
                                                ?>
                                                    <option value="<?= $row->specification_id ?>"><?= $row->specification_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>GST Applicable <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="gst_applicable" id="gst_applicable_2" data-placeholder="Select Type">
                                                <option value="">Select Type</option>
                                                <option value="Applicable">Applicable</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                                <option value="Undefined">Undefined</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>HSN / SAC Code <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="hsn_code" id="hsn_code_2" data-placeholder="Select HSN Code" onChange="gethsndescription(this.value);">
                                                <option value="">Select HSN</option>
                                                <?php
                                                foreach ($hsn_code_array as $hsn) {
                                                ?>
                                                    <option value="<?= $hsn->hsn_id ?>"><?= $hsn->hsn_code; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>HSN Description </label>
                                            <input type="text" class="form-control" name="hsn_desc" id = 'hsn_desc' placeholder="Enter HSN Description" maxlength="50" value=''>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Taxability <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="taxability" id="taxability_2" id="Select Taxability" data-placeholder="Select Taxability">
                                                <option value="">Select Taxability</option>
                                                <option value="Taxable">Taxable</option>
                                                <option value="Nil Rated ">Nil Rated </option>
                                                <option value="Exempt">Exempt</option>
                                                <option value="Unknwon">Unknwon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>IGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="igst_tax" placeholder="Enter IGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="cgst_tax" placeholder="Enter CGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>SGST Rate <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="sgst_tax" placeholder="Enter SGST" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cess </label>
                                            <input type="text" class="form-control" name="cess" placeholder="Enter Cess" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Description <sup style="color: red">*</sup></label>
                                            <textarea class="form-control" id="prd_srv_description" name="prd_srv_description" placeholder="Enter Description" maxlength="250" rows="3"></textarea>
                                            <div class="row" style="height: 16px;">
                                                <div class="col-lg-8">
                                                    <span style="font-size:15px; color:gray">Max: 250 character</span>
                                                </div>
                                                <div class="col-lg-4 d-flex" style="text-align:right;">
                                                    <div class="col-lg-10">
                                                        <p class="req_left_char pull-right" style="font-size:15px; color:gray">Char Left :</p>
                                                    </div>
                                                    <div class="col-lg-2 p-0">
                                                        <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">250</div>
                                                        <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                        <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" id="imgadd_count" name="imgadd_count" value="0">
                                        <div class="form-group col-sm-12" style="padding-left:0;">
                                            <div class="col-md-12 " style="padding-left:0;">
                                                <label class="control-label">Slider Images </label>
                                            </div>
                                            <div class="col-md-10 d-flex" style="padding-left:0;">
                                                <div class="col-xs-1">
                                                    <button type="button" class="addButton btn btn-success" style="margin-top: 20px;margin-right:20px;">
                                                        <i class="icon-add"></i>
                                                    </button>
                                                </div>
                                                <div class="col-xs-5">
                                                    File <input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()" style="padding:4px;">
                                                </div>
                                                <div class="col-xs-2">
                                                    <div id="thumb-output" style="margin-top: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 d-flex hide" id="bookTemplate" style="padding-left:0;">
                                            <div class="col-md-10 d-flex col-md-offset-2" style="padding-left:0;">
                                                <div class="col-xs-1">
                                                    <button type="button" class="removeButton btn btn-danger" style="margin-top: 20px;margin-right:20px;"><i class="fa fa-minus"></i></button>
                                                </div>
                                                <div class="col-xs-5">
                                                    File <input type="file" id="file-input" class="form-control" name="upload_file[]" onchange="getName()" style="padding:4px;">
                                                </div>
                                                <div class="col-xs-2">
                                                    <div id="thumb-output" style="margin-top: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-12 mt-3" style="text-align:right;">
                                    <button type="submit" class="btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- /basic responsive configuration -->
<div id="modal_default1" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">&nbsp;Edit Prduct-Service</h6>
                <button type="button" class="close" data-dismiss="modal" onclick="updateUI_edit_button_close()" id="edit_button_close">&times;</button>
            </div>
            <div class="modal-body">
                <div id="prdsrv_model_data1">

                </div>
            </div>

        </div>
    </div>
</div>
<!--  -->
<div id="ImportContact_modal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings"><i class="icon-steering-wheel" style="zoom:1.1; "></i>&nbsp;&nbsp;Import Product / Service<</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding: 10px;">
                <form id="upload_doc_form" method="post" enctype="multipart/form-data">
                    <div class="panel panel-flat">
                        <div class="panel-body" style="padding: 5px;">
                            <fieldset>
                                
                                <div class="row">                                    
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="excel">
                                    </div>
                                    <div class="col-md-12 mt-2 mb-2">                                            
                                        <div class="label-block text-right">
                                            <button class="red-btn text-right"><a style="color:white;" href="<?= base_url() ?>assets/ExcelSheet/product.xlsx"><i class=" icon-download"></i>&nbsp;Download Sample File</a></button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div align="right">
                                    <button type="submit" class="btn btn-primary">Import Documents<i class="icon-arrow-right14 position-right"></i></button>
                                    <span id="preview_upload"></span>
                                </div>
                            </fieldset>
                            <br />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!-- ====================character count================= -->

<script type="text/javascript">
    function ImportContact() {
        $("#ImportContact_modal").modal({
            backdrop: "static"
        });
    }
    $("#prd_srv_description").keyup(function() {
        el = $(this);
        if (el.val().length >= 250) {
            el.val(el.val().substr(0, 250));
            $("#charNum").text(0);
        } else {
            $("#charNum").text(250 - el.val().length);
        }
    });
</script>

<!-- Import/Export File  -->
<script>
    $(document).ready(function() {
        Documentvalidator = {
                // row: '.col-md-9',
                validators: {
                    notEmpty: {
                        message: 'Excel File is required'
                    },
                    file: {
                        extension: 'xlx,xlsx',
                        type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        // maxSize: 5*1024*1024,   // 5 MB
                        message: 'The selected file is not valid, it should be (xlsx, xlx)'
                    },

                }
            },
            $('#upload_doc_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'excel': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) {
        $("#upload_doc_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Product/ImportProductService') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);

                        // $("#preview_upload").html(data);
                        $(function() {
                            new PNotify({
                                title: 'Import Product/Service',
                                text: 'Imported  Successfully !!',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Product'); ?>";
                        }, 3000);

                    },
                    error: function() {
                        alert('fail');
                    }
                });
            }
            return false;
        }));
    });
</script>
<!- -->
    <script>
        function file_upload(id) {
            $('#prd_id').val(id);
            $('#modal_file').modal('show');

        }
    </script>
    <!-- =================================================== Product service form =======================================-->
    <!-- ---------------------------- Image preview ----------------------------- -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>

    <!-- ---------------------------- / Image preview ----------------------------- -->
    <!-- ---------------------------- Submit form and validation ----------------------------- -->
    <script>
        $(document).ready(function() {
            brandvalidator = {
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'Required'
                        }
                    }
                },
                bookIndex = 0;
            // imgcnt = 0;

            $('#addManageProduct')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        'title[]': brandvalidator,
                        location: {
                            validators: {
                                notEmpty: {
                                    message: 'Location is required'
                                }
                            }
                        },
                        product_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Product / Service name'
                                }
                            }
                        },
                        menu_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Product Category'
                                }
                            }
                        },
                        submenu_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Product Sub-category'
                                }
                            }
                        },
                        prd_srv_price: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Product / Service price'
                                }
                            }
                        },
                        prd_srv_type: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select type'
                                }
                            }
                        },
                        fileup: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select File'
                                },
                                file: {
                                    extension: 'jpg,png,jpeg,pdf,doc',
                                    maxSize: 2097152, //2 mb  maxsize
                                    message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                                }
                            }
                        },
                        uom_type: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select UOM'
                                }
                            }
                        },
                        sgst_tax: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter SGST'
                                }
                            }
                        },
                        cgst_tax: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter CGST'
                                }
                            }
                        },

                        product_code: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Product Code'
                                }
                            }
                        },

                        printing_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Printing name'
                                }
                            }
                        },

                        specification_id: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Specification'
                                }
                            }
                        },
                        taxability: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Taxability'
                                }
                            }
                        },

                        gst_applicable: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select GST Applicable'
                                }
                            }
                        },

                        hsn_code: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Select HSN Code'
                                }
                            }
                        },

                        igst_tax: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter IGST'
                                }
                            }
                        },

                        prd_srv_description: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter Description'
                                }
                            }
                        },
                        // 'upload_file[]': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: 'Please Select File'
                        //         },
                        //         file: {
                        //             extension: 'jpg,png,jpeg,pdf,doc',
                        //             maxSize: 2097152, //2 mb  maxsize
                        //             message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                        //         }
                        //     }
                        // }
                    }
                })

                // Add button click handler
                .on('click', '.addButton', function() {
                    bookIndex++;
                    // alert(imgcnt);
                    var imgcnt = $('#imgadd_count').val();
                    // var imgstore_cnt $('#imgadd_count').val(imgcnt);
                    if (imgcnt < 2) {
                        var result2 = parseInt(imgcnt) + 1;
                        $('#imgadd_count').val(result2);

                        var $template = $('#bookTemplate'),
                            $clone = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('data-book-index', bookIndex)
                            .insertBefore($template);

                        // Update the name attributes
                        $clone
                            .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                            .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                        // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

                        // Add new fields
                        // Note that we also pass the validator rules for new field as the third parameter
                        $('#addManageProduct')
                            .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                    } else {
                        PNotify.removeAll()
                        // new PNotify({
                        //     title: 'Image Upload',
                        //     text: 'Maximum image upload size is 3',
                        //     type: 'warning'
                        // });
                        $('#ImagecountModal').modal('show');
                    }
                })

                // Remove button click handler
                .on('click', '.removeButton', function() {
                    var img_count1 = $('#imgadd_count').val();
                    // alert(img_count);
                    var result1 = parseInt(img_count1) - 1;
                    // alert(result);
                    $('#imgadd_count').val(result1);

                    var $row = $(this).parents('.form-group'),
                        index = $row.attr('data-book-index');

                    // Remove element containing the fields
                    $row.remove();
                });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#addManageProduct").on('submit', (function(e) {
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    // alert();
                    $.ajax({

                        url: "<?php echo base_url('admin/Product/add_product_service'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            // new PNotify({
                            //     title: 'Add  Product / Service',
                            //     text: 'Added  Successfully',
                            //     type: 'success'
                            // });
                            $('#Manage-Products').modal('hide');
                            $('#successmanageproduct').modal('show');

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/Product'); ?>";
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
        function file_upload() {
            // alert();

            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/About/get_file'); ?>",
                success: function(data) {
                    // alert(data);
                    $('#modal_file').modal('show');
                    $('#file_model_data').html(data);

                },
                error: function() {
                    alert('Error while request..');
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            brandvalidator = {
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'Select title'
                        }
                    }
                },
                bookIndex = 0;

            $('#sectionform12')
                .bootstrapValidator({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        'title[]': brandvalidator,
                        location: {
                            validators: {
                                notEmpty: {
                                    message: 'Location is required'
                                }
                            }
                        },
                        'upload_file[]': {
                            validators: {
                                notEmpty: {
                                    message: 'Select File'
                                },
                                file: {
                                    extension: 'jpg,png,jpeg,pdf,doc',
                                    maxSize: 2097152, //2 mb  maxsize
                                    message: 'Image Max File size should be upto 2 MB. Supported Format (jpg,png,jpeg,pdf,doc)'
                                }
                            }
                        }
                    }
                })

                // Add button click handler
                .on('click', '.addButton', function() {
                    bookIndex++;
                    var $template = $('#bookTemplate'),
                        $clone = $template
                        .clone()
                        .removeClass('hide')
                        .removeAttr('id')
                        .attr('data-book-index', bookIndex)
                        .insertBefore($template);

                    // Update the name attributes
                    $clone
                        .find('[name="title[]"]').attr('name', 'title[' + bookIndex + ']').end()
                        .find('[name="upload_file[]"]').attr('name', 'upload_file[' + bookIndex + ']').end();
                    // .find('[name="mobileno[]"]').attr('name', 'mobileno[' + bookIndex + ']').end();

                    // Add new fields
                    // Note that we also pass the validator rules for new field as the third parameter
                    $('#sectionform12')
                        .bootstrapValidator('addField', 'title[' + bookIndex + ']', brandvalidator);
                })

                // Remove button click handler
                .on('click', '.removeButton', function() {
                    var $row = $(this).parents('.form-group'),
                        index = $row.attr('data-book-index');

                    // Remove element containing the fields
                    $row.remove();
                });
        });
    </script>

    <!--======================================= / Validation login  ==========================================-->
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#sectionform12").on('submit', (function(e) {

                var content = CKEDITOR.instances['editor-full'].getData();
                // $("#inner_page_desc").val(content);
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    // alert();
                    $.ajax({

                        url: "<?php echo base_url('admin/Product/profile_file'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            // $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'Add  File',
                                text: 'Added  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Product'); ?>";
                            }, 1000);


                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;

            }));
        });
    </script>

    <script>
        function deactivate(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to Inactive this Product / Service?</p>',
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

                var datastring = 'uprdsrvid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Product/deactivate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        // alert(data);
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Inactive successfully',
                            type: 'success'
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Product'); ?>";
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
                text: '<p>Are you sure you want to activate this Product / Service?</p>',
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

                var datastring = 'uprdsrvid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Product/activate'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Product'); ?>";
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

    <script type="text/javascript">
        function fetch_submenu(id) {
            var datastring = 'menu_id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Product/fetch_submenu'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#submmenu_data_2').html(data);
                },
                error: function() {
                    alert('Error while request..');
                }
            });
        }

        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();

                    var last = null;

                    var groupadmin = [];

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {

                        if (last !== group) {

                            $(rows).eq(i).before(
                                '<tr class="group" id="' + i + '"><td colspan="10">' + group + '</td></tr>'
                            );
                            groupadmin.push(i);
                            last = group;
                        }
                    });

                    for (var k = 0; k < groupadmin.length; k++) {
                        // Code added for adding class to sibling elements as "group_<id>"  
                        $("#" + groupadmin[k]).nextUntil("#" + groupadmin[k + 1]).addClass(' group_' + groupadmin[k]);
                        // Code added for adding Toggle functionality for each group
                        $("#" + groupadmin[k]).click(function() {
                            var gid = $(this).attr("id");
                            $(".group_" + gid).slideToggle(300);
                        });

                    }
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#addManageProduct').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    product_name: {
                        validators: {
                            notEmpty: {
                                message: 'Product Name is required'
                            }
                        }
                    },
                    menu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Menu'
                            }
                        }
                    },
                    short_desc: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Short Description'
                            }
                        }
                    },
                    submenu_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Submenu'
                            }
                        }
                    }
                }
            });
        });
    </script>


    <script type="text/javascript">
        /*$(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })*/
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

    <!--======================================= / Validation login  ==========================================-->
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#addform1").on('submit', (function(e) {

                var content = CKEDITOR.instances['editor-full'].getData();
                $("#inner_page_desc").val(content);
                //e.preventDefault();
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({

                        url: "<?php echo base_url('admin/Product/add'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            $("#inner_page_desc").val('');
                            // alert(data);
                            new PNotify({
                                title: 'Add  Product',
                                text: 'Added  Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('admin/Product'); ?>";
                            }, 1000);


                        },
                        error: function() {
                            alert('fail');
                        }
                    });
                }
                return false;

            }));
        });
    </script>


    <!--=======================================  delete Product / Service  ==========================================-->

    <script>
        function del_prdsrv(id) {

            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this Product / Service?</p>',
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

                var datastring = 'uprdsrvid=' + id;
                // alert(datastring);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Product/delete'); ?>",
                    cache: false,
                    data: datastring,
                    success: function(data) {
                        //alert(data);
                        new PNotify({
                            title: 'Delete Product',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('admin/Product'); ?>";
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



    <!--======================================= / Delete Product / Service  ==========================================-->
    <!-- ====================================== Edit Product / Service ========================================= -->
    <script>
        function edit_prdsrv(id) {
            var datastring = 'prd_srv_id=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Product/edit_prdsrv'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $('#modal_default1').modal('show');
                    $('#prdsrv_model_data1').html(data);
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
            // $('#menu_id_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#submmenu_data_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#uom_type_5').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#specification_id_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#gst_applicable_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#hsn_code_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
            // $('#taxability_2').select2({
            //     dropdownParent: $("#Manage-Products")
            // });
</script>
<script>
    $('body').on('shown.bs.modal', '#Manage-Products', function() {
        $(this).find('select').each(function() {
            $(this).select2({ dropdownParent: $('#Manage-Products') });
        });
    });
            
    $('#Manage-Products').on('scroll', function (event) {
        $(this).find("select").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
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
<!-- <script>
    (function($) {

        var Defaults = $.fn.select2.amd.require('select2/defaults');

        $.extend(Defaults.defaults, {
        dropdownPosition: 'auto'
        });

        var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

        var _positionDropdown = AttachBody.prototype._positionDropdown;

        AttachBody.prototype._positionDropdown = function() {

        var $window = $(window);

            var isCurrentlyAbove = this.$dropdown.hasClass('select2-dropdown--above');
            var isCurrentlyBelow = this.$dropdown.hasClass('select2-dropdown--below');

            var newDirection = null;

            var offset = this.$container.offset();

            offset.bottom = offset.top + this.$container.outerHeight(false);
            
            var container = {
                height: this.$container.outerHeight(false)
            };

        container.top = offset.top;
        container.bottom = offset.top + container.height;

        var dropdown = {
        height: this.$dropdown.outerHeight(false)
        };

        var viewport = {
        top: $window.scrollTop(),
        bottom: $window.scrollTop() + $window.height()
        };

        var enoughRoomAbove = viewport.top < (offset.top - dropdown.height);
        var enoughRoomBelow = viewport.bottom > (offset.bottom + dropdown.height);

        var css = {
        left: offset.left,
        top: container.bottom
        };

        // Determine what the parent element is to use for calciulating the offset
        var $offsetParent = this.$dropdownParent;

        // For statically positoned elements, we need to get the element
        // that is determining the offset
        if ($offsetParent.css('position') === 'static') {
        $offsetParent = $offsetParent.offsetParent();
        }

        var parentOffset = $offsetParent.offset();

        css.top -= parentOffset.top
        css.left -= parentOffset.left;

        var dropdownPositionOption = this.options.get('dropdownPosition');

            if (dropdownPositionOption === 'above' || dropdownPositionOption === 'below') {

                newDirection = dropdownPositionOption;

        } else {
                
            if (!isCurrentlyAbove && !isCurrentlyBelow) {
                    newDirection = 'below';
                }

                if (!enoughRoomBelow && enoughRoomAbove && !isCurrentlyAbove) {
                newDirection = 'above';
                } else if (!enoughRoomAbove && enoughRoomBelow && isCurrentlyAbove) {
                newDirection = 'below';
                }

        }

        if (newDirection == 'above' ||
            (isCurrentlyAbove && newDirection !== 'below')) {
        css.top = container.top - parentOffset.top - dropdown.height;
        }

        if (newDirection != null) {
        this.$dropdown
            .removeClass('select2-dropdown--below select2-dropdown--above')
            .addClass('select2-dropdown--' + newDirection);
        this.$container
            .removeClass('select2-container--below select2-container--above')
            .addClass('select2-container--' + newDirection);
        }

        this.$dropdownContainer.css(css);

        };

        })(window.jQuery);


        $(document).ready(function() {
            $(".js-source-states").select2({
            dropdownPosition: 'below'
            });
        $('#specification_id_2').select2({
                dropdownParent: $("#Manage-Products"),
                dropdownPosition: 'auto'
            });
            $('#gst_applicable_2').select2({
                dropdownParent: $("#Manage-Products")
            });
            $('#hsn_code_2').select2({
                dropdownParent: $("#Manage-Products")
            });
            $('#taxability_2').select2({
                dropdownParent: $("#Manage-Products")
            });
        });

</script> -->

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
  $("#deleteproductForm").on('submit', (function(e) 
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
          url: "<?php echo base_url('admin/Product/delete'); ?>",
          cache: false,
          data: { "uprdsrvid": datastring },
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
    // alert("Hii");

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
          url: "<?php echo base_url('admin/Product/deactivate'); ?>",
          cache: false,
          data: { "uprdsrvid": datastring },
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
          url: "<?php echo base_url('admin/Product/activate'); ?>",
          cache: false,
          data: { "uprdsrvid": datastring },
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

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successmanageproduct" tabindex="-1" aria-labelledby="successmanageproductLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successmanageproductLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Product-Service Submited Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with deleting this Product-Service?</div>
                <div class="modal-footer" style="justify-content: center;">
                    <form class="form-horizontal" id="deleteproductForm">
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
                <a href="<?php echo base_url('admin/Product'); ?>">
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
                <a href="<?php echo base_url('admin/Product'); ?>">
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with inactivating this Product-Service?</div>
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
            <div class="modal-body" style="font-size: 18px; text-align: center;">Shall we proceed with activating this Product-Service?</div>
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
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateSucessModal" tabindex="-1" aria-labelledby="activateSucessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="activateSucessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Confirmation Form</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Active successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Product'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ImagecountModal" tabindex="-1" aria-labelledby="ImagecountModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="ImagecountModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Maximum image upload size is 3</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url($_SERVER['REQUEST_URI']); ?>">
                    <button type="submit" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

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

<script>
    function gethsndescription(val) {
        // alert(val);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('admin/Product/gethsndescription') ?>',
            data: 'hsn_code_id=' + val,
            success: function(data) {
                $("#hsn_desc").val(data);
            }
        });
    }
</script>