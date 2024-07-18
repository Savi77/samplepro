<?php $this->load->view('Admin/includes/n-header'); ?>

<style>
    .col-sm-2 {
        -ms-flex: 0 0 16.66667%;
        flex: 0 0 12.66667%;
        max-width: 12.66667%;
    }
    .nopadding.form-group .form-control{
        padding:4px !important;
    }
    .billing{
        font-size: 14px;
        padding: 10px 50px;
    }
</style>

<div class="content-wrapper">
        <!-- Content area -->
    <div class="content">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                    <span class="span-py-10 white-text">View Customer Details</span>                           
                </div>
                <div>
                    
                    <!-- <?php
                    echo "<pre>";
                    print_r($get_details);
                    ?> -->
                    <div style="padding:20px;" class="row">
                        <div class="form-group col-sm-12 d-flex">
                            <label class="control-label col-sm-2 m-auto" for="Youtube">Company Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value ="<?= $get_details->company_name ?>" readonly>
                            </div>
                            <label class="control-label col-sm-2 m-auto" for="Youtube">Contact Person</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value ="<?= $get_details->contact_person_name1 ?>" readonly>
                            </div>
                        </div>
                        <?php
                            $user_sess_type = $this->session->user_type;
                            if ($this->session->user_type != "SA") {
                                $emp_id = $this->session->id;
                                $name_emp = $this->session->name;
                            } else {
                                $emp_id = '';
                            }
                        ?>
                        <div class="form-group col-sm-12 d-flex">
                            <label class="control-label col-sm-2" style="margin: 10px auto auto ;" for="Youtube">Mobile No</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value ="<?= $get_details->phone_no ?>" readonly>
                            </div>
                            <label class="control-label col-sm-2" for="email" style="margin: 10px auto auto">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" rows="2" value ="<?= $get_details->email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 d-flex">
                            <label class="control-label col-sm-2" style="margin: 10px auto auto ;" for="Youtube">City</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value ="<?= $get_details->city ?>" readonly>
                            </div>
                            <label class="control-label col-sm-2" for="email" style="margin: 10px auto auto">Address</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" rows="2" value ="<?= $get_details->address ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() 
    {
        Documentvalidator = {
                row: '.col-md-8',
                validators: {
                    notEmpty: {
                        message: 'Please Upload Document'
                    }
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
                    'Document[]': Documentvalidator,
                }
            })
    });

    $(document).ready(function(e) 
    {
        $("#upload_doc_form").on('submit', (function(e) 
        {
            //e.preventDefault();
           
            if (e.isDefaultPrevented()) {
               
            } else {
                

                $("#preview_upload").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
                $("#preview_upload").show();
                $.ajax({
                    url: '<?php echo base_url('admin/Customer/UploadScheduleDocument') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert(data);
                        PNotify.removeAll();
                        $("#preview_upload").hide();
                        // new PNotify({
                        //     title: 'Upload Document',
                        //     text: 'Document Uploaded Successfully !',
                        //     type: 'success'
                        // });
                        $("#UploadDocumentModal").modal('show');
                        // setTimeout(function() {
                        //     window.location = "<?php echo base_url('admin/ScheduleManagement/GridList') ?>";
                        // }, 2000);
                    },
                    error: function() {
                        // alert('fail');
                        $('#alertModal').modal('show');

                    }
                });
            }
            return false;
        }));
    });
    </script>



<script>
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();   
});
</script>
  

<div class="modal fade" id="UploadDocumentModal" tabindex="-1" aria-labelledby="UploadModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UploadModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Upload Document</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Document Uploaded Successfully !</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/Task_view_page?task_id='.$get_details["query"].'')?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="alertModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Alert!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/ScheduleManagement/Task_view_page?task_id='.$get_details["query"].'')?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>


    <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-none w-100">
    	<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
    		<i class="icon-unfold mr-2"></i>
    		Footer
    	</button>
    </div>

    <!-- <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            copyright © 2022.All Rights Reserved.
        </span>
    </div> -->
</div>
<!-- /footer -->

<div class="btn-to-top"><button type="button" class="btn btn-dark btn-icon rounded-pill"><i class="icon-arrow-up8"></i></button></div></div>


<?php $this->load->view('Admin/includes/n-footer'); ?>