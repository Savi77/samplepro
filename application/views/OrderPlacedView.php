
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Buroforce Sign In">
    <meta name="keywords" content="Buroforce Sign In">
    <meta name="author" content="Buroforce">
    <title>Buroforce</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/custom.css">
    <!-- END: Vendor CSS-->
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/notify/pnotify.custom.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/components.min.css">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/style.css">
    <!-- END: Custom CSS-->
    <style type="text/css">
        .line-on-side 
        {
            border-bottom: 1px solid #DADADA !important;
            line-height: .1em !important;
            margin: 3px 0 15px !important;
        }
        .bv-form .help-block 
        {
          color: #ad0c0c !important;
        }
      .brighttheme-notice 
      {
          background-color: #9c4242!important;
          border: 0 solid #FF0 !important;
          color: #FFF  !important;
      }
      .bg-gradient-x-primary 
      {
        background-image: linear-gradient(to right,#01385a 0,#4ea0ca 100%) !important;
      }

      .blank-page .content-wrapper .flexbox-container 
      {
           height: 20vh !important;
      }


    .blank-page .content-wrapper .flexbox-container
     {
        height: 37vh !important;
    }
    </style>
  </head>
  <!-- END: Head-->


  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
                <div align="center">   
                   
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player
    src="https://assets6.lottiefiles.com/packages/lf20_evNjeW.json"  background="transparent"  speed="1"  style="width: 250px; height: 250px;"  loop  autoplay >
</lottie-player>
                </div>


            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-9 col-sm-12 col-md-offset-3">
                      <div class="card text-white box-shadow-0 bg-gradient-x-primary">
                        <div class="card-header" style="border-bottom: 1px solid rgba(253, 235, 235, 0.06);">
                           <div align="center">
                             <h1 class="card-title">
                                <b>Registration has been Completed !!!</b>
                             </h1>
                          </div>
                          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show">
                          <div class="card-body">
                             <div align="center">
                               <p class="card-text">
                                  Please check login credential that has been sent your email account to login and access dashboard.
                               </p>    
                             </div>                        
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </section>




         </div>
       </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pnotify.custom.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="<?= base_url() ?>app-assets/js/core/app-menu.min.js"></script>
    <script src="<?= base_url() ?>app-assets/js/core/app.min.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <script type="text/javascript">
      
       window.onload = function() 
        {
            setTimeout(function()
             {
                 window.location="<?php echo base_url('SignIn') ?>";
             }, 7000);
        };
    </script>


   </body>
  </html>