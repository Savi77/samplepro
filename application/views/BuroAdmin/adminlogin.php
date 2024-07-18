<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buroforce Admin Login</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
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
	<!-- Theme JS files -->
	
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/login.js"></script>
	<!-- /theme JS files -->
</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
    	</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container login-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Advanced login -->
					<form id="defaultForm" method="post">
						<div class="login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control input-lg" placeholder="Username" name="username" id="username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="Password" class="form-control input-lg" placeholder="Password" name="password" id="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<!-- <label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label> -->
									</div>
									<div class="col-sm-6 text-right">
										<!-- <a href="login_password_recover.html">Forgot password?</a> -->
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block btn-lg">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
							<div class="form-group">
							<div class="form-group">
							   <div align="center" id="preview3"></div>	
							</div>
                      </div>
					</form>
					<!-- /advanced login -->
					<!-- Footer -->
                        <?php  $this->load->view('Admin/includes/admin_footer'); ?>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
<!--   change password -->
<script type="text/javascript">
    $(document).ready(function() 
      {
          $('#defaultForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                username: {
                        validators: {
                            notEmpty: {
                                message: 'The Username is required'
                            }
                        }
                    },
                 password: {
                    validators: {
                       notEmpty: {
                                message: 'The Password is required'
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
       $("#defaultForm").on('submit',(function(e)
           {
             //e.preventDefault();
             if (e.isDefaultPrevented())
              {
                  //alert('invalid');
                }
              else
              {

                  $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                        $.ajax({
                              url: '<?php echo base_url('admin/Admin_authentication') ?>',
                              type: "POST",
                              data:  new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false,
                              success: function(data)
                                {
                                	// alert(data);
                                	PNotify.removeAll();
                                   $("#preview3").hide();
                                       if(data==1)
	                                   {
	                                       new PNotify({
	                                                title: 'Login',
	                                                text: 'Login successful',
	                                                type: 'success'
	                                          });
	                                        setTimeout(function()
	                                         {
	                                             window.location="<?php echo base_url('admin/Dashboard/view_dashboard') ?>";
	                                         }, 300);
	                                   } 
	                                   else
	                                   {
	                                   	// alert('else');
	                                    $("#preview3").hide();
	                                        new PNotify({
	                                            title: 'Login Fail',
	                                            text: 'Invalid Username/Password',
	                                            type: 'danger'
	                                        });
	                                        
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
</html>

