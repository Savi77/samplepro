<?php $this->load->view('Admin/includes/n-header');    ?>
<?php
   
    $this->db->select("priviledge_id,priviledge_key,status");
    $where_array = array('user_id' => $_SESSION['id'], 'module_id' => 2, 'feature_id' => 9);
    $this->db->where($where_array);
    $crm_permisstion = $this->db->get("tbl_module_permission")->result();

    $this->db->select("priviledge_id,priviledge_key,status");
    $where_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 1);
    $this->db->where($where_array);
    $contact_permisstion = $this->db->get("tbl_module_permission")->result();

    $this->db->select("priviledge_id,priviledge_key,status");
    $where_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 2);
    $this->db->where($where_array);
    $product_permisstion = $this->db->get("tbl_module_permission")->result();

    $productImportClass = 'display:block';
    $productExportClass = 'display:block';

    foreach ($product_permisstion as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;

        if ($priviledge_key == 'IMPORT') {
            if ($status == 1) {
                $productImportClass = 'display:block';
            } else {
                $productImportClass = 'display:none';
            }
        }
        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) {
                $productExportClass = 'display:block';
            } else {
                $productExportClass = 'display:none';
            }
        }
    }

    $contactImportClass = 'display:block';
    $contactExportClass = 'display:block';

    foreach ($contact_permisstion as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;

        if ($priviledge_key == 'IMPORT') {
            if ($status == 1) {
                $contactImportClass = 'display:block';
            } else {
                $contactImportClass = 'display:none';
            }
        }
        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) {
                $contactExportClass = 'display:block';
            } else {
                $contactExportClass = 'display:none';
            }
        }
    }

    $crmImportClass = 'display:block';
    $crmExportClass = 'display:block';

    foreach ($crm_permisstion as $priviledge) {
        $priviledge_key = $priviledge->priviledge_key;
        $status = $priviledge->status;

        if ($priviledge_key == 'IMPORT') {
            if ($status == 1) {
                $crmImportClass = 'display:block';
            } else {
                $crmImportClass = 'display:none';
            }
        }
        if ($priviledge_key == 'EXPORT') {
            if ($status == 1) {
                $crmExportClass = 'display:block';
            } else {
                $crmExportClass = 'display:none';
            }
        }
    }
?>
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <?php if($crmImportClass != 'display:none' && $crmExportClass != 'display:none'){ ?>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">Contact Management</h6>
                        </div>

                        <div class="card-body">
                            <div class="row utility">
                                <div class="col-xl-6" <?= $contactImportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a data-toggle="modal" data-target="#import-contact" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/import.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Import Contact</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6" <?= $contactExportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a href="<?= base_url('admin/Customer/ExportContacts'); ?>" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/export.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Export Contact</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-dots">
                                <span class="dot dot-red"></span>
                                <span class="dot dot-yellow"></span>
                                <span class="dot dot-green"></span>
                                <span class="dot dot-blue"></span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php   }   ?>
            <?php if($contactImportClass != 'display:none' && $contactExportClass != 'display:none'){ ?>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">CRM</h6>
                        </div>

                        <div class="card-body">
                            <div class="row utility">
                                <div class="col-xl-6" <?= $crmImportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a data-toggle="modal" data-target="#import-crm" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/import.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Import </h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6" <?= $crmExportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a href="<?= base_url('admin/Leads/ExportLeadOpp'); ?>" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/export.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Export</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-dots">
                                <span class="dot dot-red"></span>
                                <span class="dot dot-yellow"></span>
                                <span class="dot dot-green"></span>
                                <span class="dot dot-blue"></span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php   }   ?>
            <?php if($productImportClass != 'display:none' && $productExportClass != 'display:none'){ ?>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                            <h6 class="card-title py-sm-4 card-headings">Product</h6>
                        </div>

                        <div class="card-body">
                            <div class="row utility">
                                <div class="col-xl-6" <?= $productImportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a data-toggle="modal" data-target="#import-product" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/import.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Import </h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6" <?= $productExportClass?> >
                                    <div class="card">
                                        <div class="center-btn">
                                            <a href="<?= base_url('admin/Product/ExportProductService'); ?>" class="btn btn-link btn-float has-text"><img class="import-img" src="<?= base_url() ?>new-assets/assets/Images/export.png"></a>
                                        </div>
                                        <div class="card-footer export">
                                            <h5 class="p-10 import">Export</h4>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-dots">
                                <span class="dot dot-red"></span>
                                <span class="dot dot-yellow"></span>
                                <span class="dot dot-green"></span>
                                <span class="dot dot-blue"></span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php   }   ?>
        </div>
    </div>
</div>
<!--Import pcontact popup-->
<div id="import-contact" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Import Contact</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="upload_doc_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="custom-file">
                                    <!-- <input type="file" class="custom-file-input" name="excel">
                                    <span class="custom-file-label">Choose file</span> -->
                                    <input type="file" class="form-control" name="excel" style="padding:4px;">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 import-icon">
                            <ul class="icons-list import-files-icon">
                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/ExcelSheet/sample.xlsx">
                                    <li style="display:block">
                                        <i class="icon-download"></i> <span class="ml-1 text-black" >Download Sample File</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div align="right">
                        <span id="conatct_preview_upload"></span>
                        <button type="submit" class="btn btn-primary">Import Contact<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div id="import-crm" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Import CRM</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="upload_crm_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="custom-file">
                                    <!-- <input type="file" class="custom-file-input" name="crm_excel">
                                    <span class="custom-file-label">Choose file</span> -->
                                    <input type="file" class="form-control" name="crm_excel" style="padding:4px;">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 import-icon">
                            <ul class="icons-list import-files-icon">
                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/ExcelSheet/lead.xlsx">
                                    <li style="display:block">
                                        <i class="icon-download"></i> <span class="ml-1 text-black" >download Sample File</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div align="right">
                        <span id="crm_preview_upload"></span>
                        <button type="submit" class="btn btn-primary">Import CRM<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div id="import-product" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
                <h6 class="card-title py-sm-4 card-headings">
                    &nbsp;Import Product</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="upload_product_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="custom-file">
                                    <!-- <input type="file" class="custom-file-input" name="product_excel">
                                    <span class="custom-file-label">Choose file</span> -->
                                    <input type="file" class="form-control" name="product_excel" style="padding:4px;">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 import-icon">
                            <ul class="icons-list import-files-icon">
                                <a target="_blank" data-toggle="tooltip" title="Download File" href="<?= base_url() ?>assets/ExcelSheet/product.xlsx">
                                    <li style="display:block">
                                        <i class="icon-download"></i> <span class="ml-1 text-black" >Download Sample File</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div align="right">
                        <span id="product_preview_upload"></span>
                        <button type="submit" class="btn btn-primary">Import Product<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer');    ?>

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
                $("#conatct_preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#conatct_preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Customer/ImportContacts') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        
                        $('#successModalcontactcreate').modal('show');

                        // $("#conatct_preview_upload").html(data);
                        // $(function() {
                            // new PNotify({
                            //     title: 'Import Contact',
                            //     text: 'Imported  Successfully !!',
                            //     type: 'success'
                            // });
                            
                        // });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Utility'); ?>";
                        // }, 3000);

                    },
                    error: function() {
                        // alert('fail');
                        $('#failleadcreateModal').modal('show');
                    }
                });
            }
            return false;
        }));
    });

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
            $('#upload_crm_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'crm_excel': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) {
        $("#upload_crm_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#crm_preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#crm_preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Leads/ImportLeadOpp') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $('#successModalcrmcreate').modal('show');
                        // $("#crm_preview_upload").html(data);
                        // $(function() {
                        //     new PNotify({
                        //         title: 'Import Contact',
                        //         text: 'Imported  Successfully !!',
                        //         type: 'success'
                        //     });
                        // });

                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Utility'); ?>";
                        // }, 3000);

                    },
                    error: function() {
                        // alert('fail');
                        $('#failleadcreateModal').modal('show');
                    }
                });
            }
            return false;
        }));
    });

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
            $('#upload_product_form')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'product_excel': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) {
        $("#upload_product_form").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#product_preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#product_preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Product/ImportProductService') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $('#successModalcrmcreate').modal('show');
                        // $("#product_preview_upload").html(data);
                        // $(function() {
                        //     new PNotify({
                        //         title: 'Import Product/Service',
                        //         text: 'Imported  Successfully !!',
                        //         type: 'success'
                        //     });
                        // });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/Utility'); ?>";
                        // }, 3000);
                    },
                    error: function() {
                        $('#failleadcreateModal').modal('show');
                    }
                });
            }
            return false;
        }));
    });
</script>

<div class="modal fade" id="successModalcrmcreate" tabindex="-1" aria-labelledby="successModalcrmcreateLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalcrmcreateLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> CRM Excel Imported Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Utility'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalcontactcreate" tabindex="-1" aria-labelledby="successModalcontactcreateLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalcontactcreateLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Contact Excel Imported Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Utility'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalcontactcreate" tabindex="-1" aria-labelledby="successModalcontactcreateLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalcontactcreateLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Product-Service Excel Imported Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Utility'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="failleadcreateModal" tabindex="-1" aria-labelledby="failleadcreateModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failleadcreateModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Utility'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>