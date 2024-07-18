
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
    <title>Buroforce Sign Up</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/custom.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/components.min.css">
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/notify/pnotify.custom.min.css">
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
        h3
         {
            font-size: 1.2rem !important;
        }
        .line-on-side 
        {
            border-bottom: 1px solid #DADADA !important;
            line-height: .1em !important;
            margin: 3px 0 15px !important;
        }
        .btn-social-icon 
        {
            height: 1.95rem !important;
            width: 1.95rem !important;
            padding: 0 !important;
        }
        .btn-social-icon>:first-child, .btn-social>:first-child 
        {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2.95rem;
            line-height: 1.9rem !important;
            font-size: 1em;
        }
        .bv-form .help-block 
        {
          color: #ad0c0c !important;
        }
        .col-sm-12
        {
          position: relative !important;
          width: auto !important;
        }
    </style>
  </head>
  <!-- END: Head-->

  <?php
  $gettrial = $this->db->select('trial_days')->from('tbl_trial_days')->get()->row();
  if(!empty($gettrial))
  {
      $days = $gettrial->trial_days;
  }
  else
  {
      $days = 15;
  }
  $text = $days.' Day Free Trial Now!';
  ?>

  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
               <div class="row"> 
                <div class="row d-flex align-items-center justify-content-center">
                    <div class=" col-md-5 col-sm-12 text-left hero-message">
                       <h2 class="m-0 mt-3">Hello!</h2>
                        <h1>
                            <span class="strong">Get Started</span> with <b style="color: #00619F;">Buroforce</b></h1>
                         <ul class="mt-3 mb-4 d-none d-md-block show-list">
                            <li class="">
                                <h3><i class="fa fa-check"></i> &nbsp;Try unlimited features of #1 Integrated ERP</h3>
                            </li>
                            <li class="d-flex flex-row">
                                <h3><i class="fa fa-check"></i> &nbsp;Easy to use ERP with a built in process flow</h3>
                            </li>
                            <li class="d-flex flex-row">
                                <h3><i class="fa fa-check"></i> &nbsp;No Hidden Charges. Absolutely free to try!</h3>
                            </li>
                            <li class="d-flex flex-row">
                                <h3><i class="fa fa-check"></i> &nbsp;No Installation. Quick Setup. Go-Live in hours</h3>
                            </li>
                        </ul>
                        <h2 class="mb-5 d-none d-md-block">Start your <span class="font-weight-bold"><?php echo $text;?></span>, or get started with regular subscriptions.</h2>
                        <div class="divider my-5 d-none d-md-block"></div>
                    </div>

                    <div class="col-sm-12  col-lg-4 col-md-4 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                     <img src="<?= base_url() ?>app-assets/images/logo/stack-logo-dark.png" style="height: 5rem;" >
                                     <br/>
                                     <img src="<?= base_url() ?>app-assets/images/logo/logo_two.png" style="height: 0.7rem;width: 6rem;">  
                                      <br/>
                                     <img src="<?= base_url() ?>app-assets/images/logo/logo_three.png" style="height: 0.6rem;width:15rem;"> 

                                </div>
                            </div>
                            <div class="card-content">
                              <p class="card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1"><span> Sign Up</span></p>
                                <div class="card-body">
                                    <form class="form-horizontal" id="contactForm" method="POST" style="position: relative">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Your Email ID" required>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <div id="showError"></div>  
                                        <!--  <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </fieldset> -->
                                        <button type="submit" class="btn btn-outline-primary btn-block"><b>GET STARTED&nbsp; &nbsp; <i class="fa fa-arrow-right"></i> </b></button>
                                        <div align="center" id="preview3"></div>    
                                    </form>
                                </div>
                                 <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Or Register With</span></h6>
                                <div class="text-center">
                                    <a href="<?= base_url('User_authentication');?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="fa fa-facebook"></span></a>
                                    <a href="<?= base_url('User_authentication/google_authentication');?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-google"><span class="fa fa-google"></span></a>
                               </div>
                               <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-right text-center m-0">Already have an account ?  <a href="<?= base_url('SignIn');?>" class="card-link">Sign In</a></p>
                                    </div>
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
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url() ?>app-assets/js/core/app-menu.min.js"></script>
    <script src="<?= base_url() ?>app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
          $(document).ready(function() 
          {
              $('#contactForm').bootstrapValidator({
                  message: 'This value is not valid',
                  fields: {
                     email_id: {
                      validators: {
                            notEmpty: {
                               message: 'Email is required'
                           },
                              regexp: {
                                  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                  message: 'Enter valid an email address'
                              }
                           }
                          },
                           password: {
                              validators: {
                                  notEmpty: {
                                      message: 'Password is required'
                                  }
                              }
                          }
                      }
                  });
              });
      </script>

     <script type="text/javascript">
      $(document).ready(function (e)
         {
           $("#contactForm").on('submit',(function(e)
             {
                 //e.preventDefault();
                 if (e.isDefaultPrevented())
                  {
                      //alert('invalid');
                  }
                  else
                    {
                        // var email_id=$("#email_id").val();
                        // var password=$("#password").val();
                        // localStorage.setItem('emailid', email_id);   
                        $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Authenticate data...."/>');
                        $("#preview3").show();  

                        $.ajax({
                                  url: '<?php echo base_url('SignUp/SendVerificationEmail') ?>',
                                  type: "POST",
                                  data:  new FormData(this),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                   {
                                     if(data == 'Given mailid is already exist.')
                                     {
                                        // alert(data);
                                        $("#showError").html('<small style="color:#C2001B!important; position: absolute; top: 40px">Given mailid is already exist</small>');
                                        $("#preview3").hide();
                                        setTimeout(function()
                                        {
                                            window.location="<?php echo base_url('SignUp') ?>";
                                        }, 1000);
                                     }
                                     else
                                     {
                                        $("#preview3").hide();
                                        setTimeout(function()
                                        {
                                            window.location="<?php echo base_url('CreateProfile/EmailAuthentication') ?>";
                                        }, 100);
                                     }
                                     
                                    },
                                    error: function(exception)
                                    {
                                      PNotify.removeAll();
                                      alert('Exeption:'+exception);
                                    }
                           });                       

                    }
              return false;
              }));
          });
    </script>

  </body>



  <!-- END: Body-->
</html>