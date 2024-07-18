<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<?php   foreach ($getData as $row) {    ?>
    <form id="editform" method="post">
        <input type="hidden" name="title_id" id="title_id" value="<?= $row['id']; ?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title <sup style="color: red">*</sup></label>
                                <input type="text" name="title_name" id="title_name" class="form-control" placeholder="E.g. Section 1" value="<?= $row['title']; ?>">
                                <span id="error_section_name" style="color: red;font-size:13px"></span>
                            </div>
                        </div>
                    </div>
                </fieldset1>
                <fieldset1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Role <sup style="color: red">*</sup></label>
                                <select class="form-control" name="role" id="role_edit" data-placeholder="Select Role">
                                    <?php
                                    if($row['role_id'] == 'all')
                                    {
                                    ?>
                                    <option value="">Select Role</option>
                                    <option value="all" selected>All</option>
                                    <?php foreach ($role_array as $value) { ?>
                                        <option value="<?= $value->role_id ?>"><?= $value->role_name; ?></option>
                                    <?php } ?>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <option value="">Select Role</option>
                                    <option value="all">All</option>
                                    <?php foreach ($role_array as $value) { ?>
                                        <option value="<?= $value->role_id ?>" 
                                        <?php if($value->role_id==$row['role_id']){ echo "selected"; } ?> >
                                        <?= $value->role_name; ?>
                                    </option>
                                    <?php   
                                        }   
                                    }?>
                                </select>
                                <span id="error_role" style="color: red;font-size:13px"></span>
                            </div>
                        </div>
                    </div>
                </fieldset1>
                <fieldset1>
                    <label>Content <sup style="color: red">*</sup></label>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea rows="1" name="section_content" id="section_content_edit" class="form-control"><?= $row['content']; ?></textarea>
                            <span id="error_section" style="color: red;font-size:13px"></span>
                            <span id="character-count_edit" style="color: red;font-size:13px"></span>
                        </div>
                    </div>
                </fieldset1>
                <br />
                <div class="row float-right">
                    <button type="submit" class="btn btn-primary  pull-right" id="btn-update">Update&nbsp;<i class="icon-arrow-right14 position-right"></i><span id="preview"></span></button>
                    <span id="preview_upload"></span>
                </div>
            </div>
        </div>
    </form>
<?php } ?>

<script>
     $('#role_edit').select2({
        dropdownParent: $("#edit_section")
    });
</script>

<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#section_content_edit').summernote();
    // });
    $(document).ready(function() {
        $('#section_content_edit').summernote({
            callbacks: {
                onKeyup: function(e) {
                    var htmlContent = $('#section_content_edit').summernote('code');
                    var maxLength = 3000; // Maximum character limit including HTML content

                    // Calculate length of HTML content (excluding HTML tags)
                    var textLength = $(htmlContent).text().length;

                    if (textLength > maxLength) {
                        // Show an error message
                        $('#character-count_edit').text('Character limit exceeded!');
                        $('#btn-update').attr('disabled', true);
                        
                    } else {
                        $('#character-count_edit').text('');
                        $('#btn-update').attr('disabled', false);
                    }
                }
            }
        });
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
                    url: "<?php echo base_url('admin/Dashboard/Update_company_details'); ?>",
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Company Details Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/dashboard/profile_setting'); ?>">
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
                <a href="<?php echo base_url('admin/dashboard/profile_setting'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>
