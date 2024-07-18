<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuroForce</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/hover.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/user_pages_team.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- /theme JS files -->
    <style>
        .pnotify-center {
            right: calc(50% - 150px) !important;
        }
    </style>
</head>

<body>
    <?php
    $gettrial = $this->db->select('trial_days')->from('tbl_trial_days')->where('created_by_id',$_SESSION['id'])->get()->row();
    if(!empty($gettrial))
    {
        $days = $gettrial->trial_days;
    }
    else
    {
        $days = 15;
    }
    ?>
    <!--  Load header value -->
    <?php $this->load->view('BuroAdmin/includes/admin_header'); ?>
    <!-- Page header -->
    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line breadcrumb-line-wide">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('BA/dashboard/view_dashboard'); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Set Trial Days</li>
            </ul>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Set Trial Days</span> - Manage</h4>
            </div>
        </div>
    </div>
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <?php $this->load->view('BuroAdmin/includes/sidebar'); ?>
            <!--  -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Hover rows -->
                <div class="panel panel-flat">
                    <div class="panel-heading" style="background-color: #009FDF;">
                        <h5 class="panel-title" style="font-size: 17px;color:#fff">Set Trial Days</h5>   
                    </div>
                    <hr style="margin: 0;">

                        <div class="panel-heading" style="padding-top: 45px;padding-bottom: 80px;padding-left: 45px;padding-right: 45px">
                            <form class="form-horizontal" id="addform">

                                <fieldset style="border: 1px solid #009fdf !important;position: relative;padding: 30px;">
                                    <legend style="font-size: 1.2em !important;font-weight: bold !important;text-align: left !important;width: auto;padding: 5px 10px;border-bottom: none;background: #009fdf;color: white;position: absolute;top: -17px;">Trial Period</legend>
                                    <div class="form-group">
                                        <label for="setTrial" class="form-label col-sm-2" style="font-size:13px;font-family: inherit;font-weight: 400;margin-bottom: 10px;">Set Trial Period<span style="color: red;margin-left: 5px;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="setTrial" placeholder="Enter Trial Period in Days" name= "setTrial" style="color: #000;font-size: 13px;font-family: inherit;" value="<?php echo $days;?>" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group" style="margin-right: 1%;">
                                <div class="col-sm-12" style="padding:0px 5px;margin-left:2.2%">
                                <button type="submit" style="background-color: #009FDF;color: #ffffff;border-color: #2196F3;padding: 7px 12px;font-size: 13px;border: 1px solid transparent;float: right;margin-top: 20px;">Submit</button>
                                </div>
                            </div>

                            </form>
                        </div>

                </div>
                <!-- /hover rows -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- Footer -->
        <?php $this->load->view('BuroAdmin/includes/admin_footer'); ?>
        <!-- /footer -->
    </div>
</body>


<script type="text/javascript">
    $(document).ready(function() {
            setTrial = {
                validators: {
                    notEmpty: {
                        message: 'Trial Period is required'
                    }
                }
            }
            bookIndex = 0;

           $('#addform')
               .bootstrapValidator({
                   framework: 'bootstrap',
                   icon: {
                       valid: 'glyphicon glyphicon-ok',
                       invalid: 'glyphicon glyphicon-remove',
                       validating: 'glyphicon glyphicon-refresh'
                   },
                   fields: {
                       'setTrial' : setTrial,
                   }
               })
       });
</script>
<script type="text/javascript">
        $(document).ready(function(e) {
            $("#addform").on('submit', (function(e) {

                if (e.isDefaultPrevented()) {
                    //alert('invalid');
                } else {
                    $.ajax({
                        url: "<?php echo base_url('Home/InsertTrialDays'); ?>",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            new PNotify({
                                title: 'Set Trial Days',
                                text: 'Trial Days Added Successfully',
                                type: 'success'
                            });

                            setTimeout(function() {
                                window.location = "<?php echo base_url('Home/SetTrialDays'); ?>";
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
    

</html>