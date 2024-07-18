<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>

<?php foreach ($edit_work->result() as $value) {    ?>
    <form class="form-horizontal" id="EditWorkForm" enctype="multipart/form-data">
        <input type="hidden" name="case_studies_id" id="case_studies_id" value="<?= $value->case_studies_id ?>" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Case Studie Name <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="case_studies_name" name="case_studies_name" value="<?= $value->case_studies_name ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Image 1<span style="color: red;">*</span></label>
            <div class="col-lg-10">
                <div class="media no-margin-top">
                    <div class="media-left">
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/Case_Studies/<?= $value->image_one ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_one_edit"></a>
                    </div>

                    <div class="media-body">
                        <input type="file" class="file-styled" id="imgInpOne_edit" name="fileupone">
                        <p id="error1_one_edit" style="display:none; color:#FF0000;">
                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                        </p>
                        <p id="error2_one_edit" style="display:none; color:#FF0000;">
                            Maximum File Size Limit is 1MB.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Image 2 <span style="color: red;">*</span></label>
            <div class="col-lg-10">
                <div class="media no-margin-top">
                    <div class="media-left">
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/Case_Studies/<?= $value->image_two ?>" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img_two_edit"></a>
                    </div>

                    <div class="media-body">
                        <input type="file" class="file-styled" id="imgInpTwo_edit" name="fileuptwo">
                        <p id="error1_two_edit" style="display:none; color:#FF0000;">
                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                        </p>
                        <p id="error2_two_edit" style="display:none; color:#FF0000;">
                            Maximum File Size Limit is 1MB.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Competitor Analysis <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <textarea rows="4" cols="50" class="form-control" id="competitor_analysis" name="competitor_analysis"><?= $value->competitor_analysis ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Core Development <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <textarea rows="4" cols="50" class="form-control" id="core_development" name="core_development"><?= $value->core_development ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Define Your Choices <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <textarea rows="4" cols="50" class="form-control" id="define_your_choices" name="define_your_choices"><?= $value->define_your_choices ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Client <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client" value="<?= $value->client ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Category <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" value="<?= $value->category ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Date <span style="color: red;">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="case_date" name="case_date" placeholder="Enter Date" value="<?= date('d F, Y',strtotime($value->case_date)) ?>" >
            </div>
        </div>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border"> <i class="icon-link"></i> Link</legend>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Facebook </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link" value="<?= $value->facebook_link ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Twitter </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Enter Twitter Kink" value="<?= $value->twitter_link ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Pinterest Link </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pinterest_Link " name="pinterest_Link " placeholder="Enter Pinterest Link " value="<?= $value->pinterest_Link ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Instagram </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Link" value="<?= $value->instagram_link ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Live Link </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="live_link" name="live_link" placeholder="Enter Live Link" value="<?= $value->live_link ?>" >
                </div>
            </div>
        </fieldset>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        </div>
    </form>
<?php } ?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#EditWorkForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                case_studies_name: {
                    validators: {
                        notEmpty: {
                            message: 'Competitor Analysis is required'
                        }
                    }
                },
                competitor_analysis: {
                    validators: {
                        notEmpty: {
                            message: 'Competitor Analysis is required'
                        }
                    }
                },
                core_development: {
                    validators: {
                        notEmpty: {
                            message: 'Core Development is required'
                        }
                    }
                },
                define_your_choices: {
                    validators: {
                        notEmpty: {
                            message: 'Define Your Choices is required'
                        }
                    }
                },
                client: {
                    validators: {
                        notEmpty: {
                            message: 'Client is required'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'Category is required'
                        }
                    }
                },
                case_date: {
                    validators: {
                        notEmpty: {
                            message: 'Project Date is required'
                        }
                    }
                }
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(e) {

        $("#EditWorkForm").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('BA/Case_Studies/update'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        new PNotify({
                            title: 'Update Record',
                            text: 'Updated  Successfully',
                            type: 'success'
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('BA/Case_Studies'); ?>";
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


<!--============================== Image view on page & Validation ========================================-->
<script>
    $(function() {
        $('#case_date').datetimepicker({
            format: 'DD MMMM, YYYY',
            useCurrent: true
        });
    });
</script>
<!-- ======================= Image preview and validation ======================== -->
<script type="text/javascript">
    function readURLOneEdit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#home_img_one_edit').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInpOne_edit").change(function() {
        readURLOneEdit(this);
    });

    function readURLTwoEdit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#home_img_two_edit').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInpTwo_edit").change(function() {
        readURLTwoEdit(this);
    });
</script>

<script type="text/javascript">
    var a = 0;
    //binds to onchange event of your input field
    $('#imgInpOne_edit').bind('change', function() {

        var ext = $('#imgInpOne_edit').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('#error1_one_edit').slideDown("slow");
            $('#error2_one_edit').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#error2_one_edit').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error2_one_edit').slideUp("slow");
            }
            $('#error1_one_edit').slideUp("slow");

        }
    });

    var b = 0;
    //binds to onchange event of your input field
    $('#imgInpTwo_edit').bind('change', function() {

        var ext = $('#imgInpTwo_edit').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('#error1_two_edit').slideDown("slow");
            $('#error2_two_edit').slideUp("slow");
            b = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#error2_two_edit').slideDown("slow");
                b = 0;
            } else {
                b = 1;
                $('#error2_two_edit').slideUp("slow");
            }
            $('#error1_two_edit').slideUp("slow");

        }
    });
</script>