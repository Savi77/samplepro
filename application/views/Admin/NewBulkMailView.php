<?php $this->load->view('Admin/includes/n-header');    ?>
<style>
    .content-group {
        width: 100%;
    }
   .note-editor.note-frame.card{
        margin-inline: 10px !important;
    }
</style>
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">	
                        <span class="span-py-10 white-text">Compose Mail</span>
                    </div>

                    <!--<div class="panel-heading table_header" style="color: white;">-->
                    <!--  <h5 class="panel-title">Compose Mail</h5>-->
                    <!--</div>-->
                    <div class="card-body">
                        <form id="FeedbackForm" method="post">
                            <!-- Mail details -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="align-top py-0">
                                                <div class="py-2 mr-sm-3">To <sup style="color: red">*</sup></div>
                                            </td>

                                            <td class="align-top py-0" style="padding: 0;">
                                                <div class="d-sm-flex flex-sm-wrap">
                                                    <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" style="margin-right: 21px;height: 44px;" name="to" value="<?= $email_id; ?>">
                                                    <ul class="list-inline list-inline-dotted text-nowrap pt-sm-2 pb-2 mb-0 ml-sm-3" style="margin: 10px;font-size: 14px;">
                                                        <li class="list-inline-item"><a href="#" id="copy">Copy</a></li>
                                                        <li class="list-inline-item"><a href="#" id="hiddenCopy">Hidden copy</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="cc_display" style="display: none;">
                                            <td class="align-top py-0">
                                                <div class="py-2 mr-sm-3">CC</div>
                                            </td>
                                            <td class="align-top py-0">
                                                <div class="d-sm-flex flex-sm-wrap">
                                                    <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" style="height: 44px;" name="cc">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="bcc_display">
                                            <td class="align-top py-0">
                                                <div class="py-2 mr-sm-3">BCC</div>
                                            </td>
                                            <td class="align-top py-0" style="padding: 0;">
                                                <div class="d-sm-flex flex-sm-wrap">
                                                    <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add recipients" name="bcc" value="<?php echo $emial = ($bcc_email) ? "$bcc_email" : ""; ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-top py-0">
                                                <div class="py-2 mr-sm-3">Subject</div>
                                            </td>
                                            <td class="align-top py-0" style="padding: 0;">
                                                <div class="d-sm-flex flex-sm-wrap">
                                                    <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" placeholder="Add Subject" name="subject">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /mail details -->
                            <div class="row">
                                <div class="content-group mt-3">
                                    <textarea name="editor-full" id="editor-full" rows="4" cols="45"> </textarea>
                                </div>
                            </div>


                            <div class="text-right right-btn">
                                <span id="loader_gif"></span>
                                <button type="submit" class="btn btn-primary">Send mail <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>

    <script>
        $('#editor-full').summernote();
        $("#copy").click(function() {
            $('#cc_display').toggle();
        });
        $("#hiddenCopy").click(function() {
            $('#bcc_display').toggle();
        });

        $(document).ready(function() {
            $('#FeedbackForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    service_type: {
                        validators: {
                            notEmpty: {
                                message: 'Type is required'
                            }
                        }
                    },
                    prd_service: {
                        validators: {
                            notEmpty: {
                                message: 'Select Product/Service'
                            }
                        }
                    },
                }
            });
        });

        $(document).ready(function(e) {
            $("#FeedbackForm").on('submit', (function(e) {

                var content = $('#summernote').summernote('code');
                // var content = CKEDITOR.instances['editor-full'].getData();
                $("#inner_page_desc").val(content);
                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $("#loader_gif").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                    $("#loader_gif").show();
                    $.ajax({
                        url: "<?php echo base_url('admin/ReportAdmin/Reports/send_email_crm'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#loader_gif").hide();
                            // alert(data);   
                            $("#inner_page_desc").val('');
                            // alert('Thank for your valuable Feedback !!');
                            // new PNotify({
                            //     title: 'Email',
                            //     text: 'Email Sent Successfully!',
                            //     type: 'success'
                            // });
                            if(data == 1)
                            {
                                $('#successModalEmail').modal('show');
                            }
                            else
                            {
                                $('#alertModal').modal('show'); 
                            }

                            // setTimeout(function() {
                            //     window.location = "<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail'); ?>";
                            // }, 3000);


                        },
                        error: function() {
                            $('#alertModal').modal('show');
                        }
                    });
                }
                return false;
            }));
        });

        $(document).ready(function() {
            $('#editor-full').summernote();
        });
    </script>
    <?php $this->load->view('Admin/includes/n-footer');    ?>


    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Expense'); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalEmail" tabindex="-1" aria-labelledby="successModalEmailLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalEmailLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Email Sent Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ReportAdmin/Reports/BulkEmail'); ?>">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>