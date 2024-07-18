<?php
foreach ($EditArray as $res) {
?>
    <form id="editform" method="post">
        <input type="hidden" name="currency_id" value="<?= $res->currency_id; ?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Privilege : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="country" value="<?= $res->country; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Privilege Key : <sup style="color: red">*</sup></label>
                                <input type="text" class="form-control" name="currency_sign" placeholder="E.g.Asia/Kolkata" value="<?= $res->currency_sign; ?>">
                            </div>
                        </div>

                    </div>

                </fieldset>
                <br />
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Details <i class="icon-arrow-right14 position-right"></i></button>
                    <span id="preview2"></span>
                </div>
            </div>
        </div>
    </form>
<?php } ?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#editform').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                country: {
                    validators: {
                        notEmpty: {
                            message: 'Country is required'
                        }
                    }
                },
                currency_sign: {
                    validators: {
                        notEmpty: {
                            message: 'Country Sign Required'
                        }
                    }
                },

            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $("#editform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $.ajax({
                    url: "<?php echo base_url('BA/Currency/UpdateDetails'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(function() {
                            new PNotify({
                                title: 'Update Currency',
                                text: 'Updated Successfully',
                                type: 'success'
                            });
                        });
                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Currency'); ?>";
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