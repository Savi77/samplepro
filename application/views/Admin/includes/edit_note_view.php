
<form id="editform1" method="post" enctype="multipart/form-data">
    <fieldset1>
        <div class="row" >
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Note</label>

                            <?php foreach ($notes1 as $row) { ?>
                                <input type="hidden" class="form-control" name="note_id" value="<?= $row->note_id; ?>">
                                
                                <textarea  class="form-control" name="editednote" maxlength="50" value="<?= $row->notes; ?>"  rows="5"><?= $row->notes; ?></textarea>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:right;">
            <span id="preview32"></span>
            <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
        </div>
        <br />
    </fieldset1>
</form>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#editform1").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview32").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview32").show();
                $.ajax({
                    url: "<?php echo base_url('admin/Dashboard/inserteditnote'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        $("#preview32").hide();
                        $(function() {
                            // new PNotify({
                            //     title: 'Update Notes',
                            //     text: 'Note Updated Successfully',
                            //     type: 'success'
                            // });
                            $("#UpdatesuccessModal").modal('show');

                        });

                        // setTimeout(function() {
                        //     window.location = "";
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
        <div class="modal-body" style="font-size: 18px;text-align: center;">Note Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="">
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
                <a href="<?php echo base_url($_SERVER['REQUEST_URI']); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>