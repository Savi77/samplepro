<div class="card-header header-elements-sm-inline py-sm-0 blue-color-card">
    <h6 class="card-title py-sm-4 card-headings">
        &nbsp;Upload Attachment</h6>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body pl-0 pr-0">
    <div class="col-sm-12">
        <!-- <div class="panel panel-flat" style="border: 1px solid #ddd; padding: 0px 20px;"> -->
            <div class="panel-body" style="padding: 0px;">
                <form class="form-horizontal" id="addattachform" enctype='multipart/form-data'>
                    <input type="hidden" name="db_dir_id" id="db_dir_id">
                    <div class="">
                        <!-- <div class="page-header page-header-default">
                            <div class="page-header-content">
                                <div class="page-title" style="padding: 10px 30px 5px 5px;">
                                    <h5>
                                        <i class=" icon-folder2 position-left"></i>
                                        <span class="text-semibold">Directory</span>
                                    </h5>
                                </div>
                            </div>

                            <div class="breadcrumb-line breadcrumb-line-popup">
                                <ul class="breadcrumb">
                                    <?php
                                    $string = '';
                                    for ($dd = 0; $dd < count($GetDirData); $dd++) {
                                        $string = $string . '/' . $GetDirData[$dd];
                                    }
                                    ?>
                                    <li><a class="text-black" href="#"><b><?= implode(' / ', $GetDirData) ?></b></a></li>
                                </ul>
                            </div>
                        </div> -->

                        <?php $path = substr($string, 1); ?>

                        <input type="hidden" name="path" id="path" value="<?= $path ?>">



                        <div class="form-group ">
                            <div class="col-sm-12 p-0 d-flex">
                                <div class="col-sm-6 p-0">
                                    Choose File <sup style="color: red">*</sup><input type="file" class="form-control" name="uploadfile[]">
                                </div>
                                <div class="col-sm-5 pr-0">
                                    Remark <sup style="color: red">*</sup><textarea class="form-control" name="fileremark[]" maxlength="150" rows="1" placeholder="Enter Remark"></textarea>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-success addButton" style="margin-top:20px;">
                                        <i class="icon-add"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-group hide" id="bookTemplate">
                                <div class="col-sm-12 p-0 d-flex">
                                    <div class="col-sm-6 p-0">
                                        Choose File <sup style="color: red">*</sup><input type="file" class="form-control" name="uploadfile[]">
                                    </div>
                                    <div class="col-sm-5 pr-0">
                                        Remark <sup style="color: red">*</sup><textarea class="form-control" name="fileremark[]" maxlength="150" rows="1" placeholder="Enter Remark">></textarea>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-danger removeButton" style="margin-top:20px">
                                            <i class=" icon-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-0" align="right">
                            <br />
                            <span id="preview222"></span>
                            <button type="submit" class="btn btn-primary btn-lg" style="margin-bottom:1%;"> Upload Document <i class="icon-arrow-right14 position-right"></i></button>
                            <br /><br />
                        </div>

                    </div>
                </form>
            </div>
        <!-- </div> -->
    </div>
</div>

<script>
    $(document).ready(function() {
        brandvalidator = {
                row: '.col-xs-6',
                validators: {
                    notEmpty: {
                        message: 'Please Add Attachment'
                    },
                    file: {
                        extension: 'pdf,doc,docx,jpg,jpeg,png,bmp,xsl,xlsx',
                        // type: 'application/pdf,application/msword',
                        maxSize: 2048 * 1024,
                        message: 'Supported format - pdf, doc, docx, jpg, jpeg, png, bmp, xls, xlsx'
                    }

                }
            },
            remarkValidator = {
                row: '.col-xs-5',
                validators: {
                    notEmpty: {
                        message: 'Please Enter Remark'
                    }
                }
            },
            bookIndex = 0;

        $('#addattachform')
            .bootstrapValidator({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'uploadfile[]': brandvalidator,
                    'fileremark[]': remarkValidator,
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
                    .find('[name="uploadfile[]"]').attr('name', 'uploadfile[' + bookIndex + ']').end()
                    .find('[name="fileremark[]"]').attr('name', 'fileremark[' + bookIndex + ']').end();

                $('#addattachform')
                    .bootstrapValidator('addField', 'uploadfile[' + bookIndex + ']', brandvalidator)
                    .bootstrapValidator('addField', 'fileremark[' + bookIndex + ']', remarkValidator);
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

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#addattachform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview222").show();
                $("#preview222").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" />');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin/DocumentUpload/UploadDocument'); ?>",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#preview222").hide();
                        // $('#AddAttachmentmodal').modal('hide');
                        $('#successAddAttachmentmodalModal').modal('show');
                        // new PNotify({
                        //     title: 'Upload Document',
                        //     text: 'Document Uploaded Successfully',
                        //     type: 'success'
                        // });
                        // setTimeout(function() {
                        //     window.location = "";

                        //     window.location = "<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>";
                        // }, 500);

                    },
                    error: function() {
                        $('#failModal').modal('show');
                    }
                });
            }
            return false;
        }));
    });
</script>

<div class="modal fade" id="successAddAttachmentmodalModal" tabindex="-1" aria-labelledby="successAddAttachmentmodalModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successAddAttachmentmodalModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Document Uploaded Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>"> -->
                <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="failModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="failModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Failed to load page</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/DocumentUpload/CreateDirectory'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>