<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<?php   foreach ($getData as $row) {    ?>
    <form id="editform" method="post">
        <input type="hidden" name="section_id" id="section_id" value="<?= $row['section_id']; ?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Section For <sup style="color: red">*</sup></label>
                                <input type="text" name="section_name" id="section_name" class="form-control" placeholder="E.g. Section 1" value="<?= $row['section_name']; ?>">
                                <span id="error_section_name" style="color: red;font-size:13px"></span>
                            </div>
                        </div>
                    </div>
                </fieldset1>
                <fieldset1>
                    <label>Section <sup style="color: red">*</sup></label>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea rows="1" name="section_content" id="section_content_edit" class="form-control"><?= $row['section_content']; ?></textarea>
                            <span id="error_section" style="color: red;font-size:13px"></span>
                        </div>
                    </div>
                </fieldset1>
                <br />
                <div class="row float-right">
                    <button type="submit" class="btn btn-primary  pull-right">Update&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                    <span id="preview_upload"></span>
                </div>
            </div>
        </div>
    </form>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#section_content_edit').summernote();
    });

    $(document).ready(function(e) {

        $("#editform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview_edit").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_edit").show();

                $.ajax({
                    url: "<?php echo base_url('admin/Settings/Update'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#preview_edit").hide();
                        $(function() {
                            // new PNotify({
                            //     title: 'Update  Section',
                            //     text: 'Updated Successfully !!',
                            //     type: 'success'
                            // });
                            $("#UpdatesuccessModal").modal('show');
                        });
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/dashboard/CompanySetting?section=print_section'); ?>";
                        // }, 1000);
                    },
                    error: function() {
                        $("#updateErrorModal").modal('show');
                    }
                });
            }
            return false;

        }));
    });
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Printing Configuration Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=basic_setting'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/configuration_setting?section=basic_setting'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
