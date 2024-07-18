 
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Buroforce Sign In">
    <meta name="keywords" content="Buroforce Sign In">
    <meta name="author" content="Buroforce">
    <title>Register New Company</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/logo_one.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/vendors/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/components.min.css">
    <link href="<?= base_url() ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/notify/pnotify.custom.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/pages/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/css/style.css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
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
    </style>
    
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <?php

        $session_firstname=$_SESSION['session_firstname'];
        $session_lastname=$_SESSION['session_lastname'];
        $session_email=$_SESSION['session_email'];
        $currentURL = current_url();
        $params   = $_SERVER['QUERY_STRING'];
        $fullURL = $currentURL . '?' . $params; 
        // $session_password=$_SESSION['session_password'];
    ?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


          <?php 
             if($this->session->flashdata('true')){
           ?>
             <div class="alert alert-success"> 
               <?php  echo $this->session->flashdata('true'); ?>
          <?php    
          } else if($this->session->flashdata('err')){
          ?>
           <div class = "alert alert-danger">
             <?php echo $this->session->flashdata('err'); ?>
           </div>
          <?php } ?>
            <br/>
                <div class="row justify-content-md-center">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" style="border-bottom: 1px solid #D3DCE9;">
                                    <h4 class="card-title" id="bordered-layout-colored-controls">
                                        Company Registration
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collpase show">
                                  <div class="card-body">
                                     <?php
                                         $order_id=rand(99,99999);
                                      ?>
                                          <form method="post" name="customerData" id="customerData"  action="<?= base_url('CreateProfile/InsertDataCompany');?>" >
                                           <!-- Payumoney Changes -->
                                              <input type="hidden" name="url" id="url" value="<?= $fullURL;?>" readonly/>
                                              <input type="hidden" name="tid" id="tid" readonly />
                                              <input type="hidden" name="merchant_id" value="230196"/>
                                              <input type="hidden" name="order_id" value="<?= $order_id; ?>"/>
                                              <input type="hidden" name="amount" value="<?= $PlanArray['price'];?>"/>

                                              <input type="hidden" name="currency" value="INR"/>
                                              <input type="hidden" name="redirect_url" value="<?= base_url() ?>CreateProfile/ResponseHandler"/>
                                              <input type="hidden" name="cancel_url" value="<?= base_url() ?>CreateProfile/ResponseHandler"/>
                                              <input type="hidden" name="language" value="EN"/>
                                              <input type="hidden" name="billing_name" id="billing_name" />
                                              <input type="hidden" name="billing_address" id="billing_address" />
                                              <input type="hidden" name="billing_city" id="billing_city"/>
                                              <input type="hidden" name="billing_state" id="billing_state" />
                                              <input type="hidden" name="billing_zip" id="billing_zip" />
                                              <input type="hidden" name="billing_country" value="India" />
                                              <input type="hidden" name="billing_tel" id="billing_tel"/>
                                              <input type="hidden" name="billing_email"  id="billing_email"  value="<?= $session_email;?>"   />
                                              <input type="hidden" name="plan_id"  value="<?= $PlanArray['plan_id'];?>">
                                              <input type="hidden" name="module_ids" value="<?= $PlanArray['module_id'];?>">
                                              <input type="hidden" name="no_of_user" value="<?= $PlanArray['no_of_user'];?>">
                                              <input type="hidden" name="price"  value="<?= $PlanArray['price'];?>">
                                              <input type="hidden" name="subscription_type"  value="<?= $PlanArray['type'];?>">
                                             
                                              <div class="form-body">
                                                  <h4 class="form-section"><i class="fa fa-eye"></i> About Company</h4>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput1">Company Name <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <!-- <input type="text"  class="form-control " placeholder="Enter Company Name" name="org_cname" maxlength="150" autocomplete="off" onkeyup="generate_domain(this.value)"> -->
                                                                  <input type="text"  class="form-control " placeholder="Enter Company Name" name="org_cname" maxlength="150" autocomplete="off">
                                                                </div>
                                                                <?php
                                                                if($this->session->flashdata('error-company'))
                                                                {
                                                                ?>
                                                                <small style="color:#ad0c0c !important;position: absolute; top: 40px;"><?php echo $this->session->flashdata('error-company'); ?></small>    
                                                                <?php
                                                                }
                                                                ?>     
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Company Domain <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="text"  class="form-control " placeholder="Enter domain" maxlength="20"  id="org_cdomain" name="org_cdomain" autocomplete="off">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <h4 class="form-section"><i class="ft-mail"></i> Contact Info &amp; Bio </h4>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput1">First Name <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="text"  class="form-control " placeholder="Enter First Name" name="org_fname" id="org_fname" autocomplete="off"   value="<?= $session_firstname;?>" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Last Name <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="text"  class="form-control " placeholder="Enter Last Name" name="org_lname"  id="org_lname" autocomplete="off" onblur="bind_name(this.value)"  value="<?= $session_lastname;?>" >
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput1">Username / Email <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="text" id="org_email" class="form-control " placeholder="Enter Email" name="org_email" autocomplete="off" value="<?= $session_email;?>" readonly>
                                                              </div>
                                                          </div>
                                                          <?php
                                                          if($this->session->flashdata('error'))
                                                          {
                                                          ?>
                                                          <small style="color:#ad0c0c !important;position: absolute; top: 40px;"><?php echo $this->session->flashdata('error'); ?></small>    
                                                          <?php
                                                          }
                                                          ?>      
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Password <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="password"  class="form-control " placeholder="Password" name="password" maxlength="30" autocomplete="off">
                                                              </div>
                                                          </div>
                                                     </div>

                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Contact No. <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <!-- <input type="tel" class="form-control " placeholder="Contact No." name="org_contact" maxlength="10" autocomplete="off" > -->
                                                                  <input type="tel" class="form-control " placeholder="Contact No." name="org_contact" id="inputBox" autocomplete="off" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Landline </label>
                                                              <div class="col-md-9">
                                                                  <input type="text" class="form-control " placeholder="Landline" name="org_landline" autocomplete="off"  onblur="bind_phone(this.value)" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput1">Address <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <textarea class="form-control" rows="1" name="org_address"  onblur="bind_address(this.value)" ></textarea>
                                                               </div>
                                                          </div>
                                                      </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput2">Website </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control " placeholder="Website" name="org_website" autocomplete="off"  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Country <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <select class="form-control"  name="org_country" id="org_country" onchange="GetState(this.value)">
                                                                      <option value="">Please Select Country</option>
                                                                       <?php
                                                                        foreach ($CountryArray as  $res) 
                                                                        {
                                                                      ?>
                                                                       <option value="<?= $res->id; ?>"> <?= $res->name; ?></option>     
                                                                      <?php } ?> 
                                                                  </select>
                                                              </div>
                                                          </div>
                                                        </div>
                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput1">State <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <select class="form-control" name="org_state" id="bind_state_list">
                                                                      <option value="">Please Select State</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">City <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <input type="text"  class="form-control " placeholder="City Name" name="org_city" autocomplete="off"  onblur="bind_city(this.value)" >
                                                              </div>
                                                          </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Post Code <span class="text-danger"> *</span></label>
                                                              <div class="col-md-9">
                                                                  <!-- <input type="tel;"  class="form-control " placeholder="Post Code" name="org_postcode" autocomplete="off" maxlength="6"  onblur="bind_pincode(this.value)" > -->
                                                                  <input type="tel;"  class="form-control " placeholder="Post Code" name="org_postcode" autocomplete="off"  id="inputBoxpostcode" onblur="bind_pincode(this.value)" >
                                                              </div>
                                                          </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Time Zone</label>
                                                              <div class="col-md-9">
                                                                  <select class="form-control"  name="org_timezone" onchange="GetState(this.value)">
                                                                      <!-- <option value="">Please Select Time Zone</option> -->
                                                                       <?php
                                                                        foreach ($TimeZoneArray as  $res) 
                                                                        {
                                                                      ?>
                                                                       <option value="<?= $res->timezone_code; ?>"> <?= ucfirst($res->country); ?></option>     
                                                                      <?php } ?> 
                                                                  </select>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="userinput2">Currency</label>
                                                              <div class="col-md-9">
                                                                  <select class="form-control"  name="org_currency" onchange="GetState(this.value)">
                                                                      <!-- <option value="">Please Select Currency</option> -->
                                                                       <?php
                                                                        foreach ($CurrencyArray as  $res) 
                                                                        {
                                                                      ?>
                                                                       <option value="<?= $res->currency_id; ?>"> <?= ucfirst($res->currency_sign); ?></option>     
                                                                      <?php } ?> 
                                                                  </select>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-2 label-control" for="userinput2" style="flex: 0 0 12.5%;max-width: 12.5%;">About Company </label>
                                                                <div class="col-md-10" style="flex: 0 0 87.2%;max-width: 87.2%;">
                                                                    <textarea  class="form-control " placeholder="About Comapny" name="org_abt_compnay" maxlength="100"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 control-label">Company Logo </label>
                                                                <div class="col-lg-10">
                                                                    <div class="media no-margin-top">
                                                                        <div class="media-left">
                                                                            <img src="<?= base_url() ?>assets/admin/assets/images/company.png" style="width: 58px; height: 58px;" class="img-rounded" alt="" id="home_img">
                                                                        </div>

                                                                        <div class="media-body ml-5">
                                                                            <input type="file" class="file-styled" id="imgInp" name="fileup">
                                                                            <p id="error1" style="display:none; color:#FF0000;">
                                                                                Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                                                            </p>
                                                                            <p id="error2" style="display:none; color:#FF0000;">
                                                                                Maximum File Size Limit is 1MB.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-actions right">                                              
                                                 <button type="submit" class="btn btn-primary">
                                                      <i class="fa fa-check-square-o"></i> Register
                                                  </button>
                                                  <span id="preview3"></span>
                                              </div>
                                     </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    <!-- END: Content-->
    
        <!-- BEGIN: Vendor JS-->
        <script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
        <script src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
        <script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
        <script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
        <script src="<?= base_url() ?>app-assets/js/core/app-menu.min.js"></script>
        <script src="<?= base_url() ?>app-assets/js/core/app.min.js"></script>
        <script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.min.js"></script>
        <!-- END: Page JS-->

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#home_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        
        setTimeout(function(){
            $( "#updateMsg" ).fadeOut( "slow" );
        },2000);
    </script>

    <script type="text/javascript">
        var a = 0;
        //binds to onchange event of your input field
        $('#imgInp').bind('change', function() {

            var ext = $('#imgInp').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#error1').slideDown("slow");
                $('#error2').slideUp("slow");
                a = 0;
            } else {
                var picsize = (this.files[0].size);
                if (picsize > 1000000) {
                    $('#error2').slideDown("slow");
                    a = 0;
                } else {
                    a = 1;
                    $('#error2').slideUp("slow");
                }
                $('#error1').slideUp("slow");

            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#org_country').select2();
        });
        window.onload = function() 
        {
            var d = new Date().getTime();
            document.getElementById("tid").value = d;
        };
    </script>

    <script type="text/javascript">
      
       function bind_name(lastname)
        {
           var fname=$("#org_fname").val();
           var billing_name=fname+' '+lastname;
           $("#billing_name").val(billing_name);
        }
       function bind_address(address)
        {
           $("#billing_address").val(address);
        }
       function bind_city(billing_city)
        {
           $("#billing_city").val(billing_city);
        }
       function bind_pincode(billing_zip)
        {
           $("#billing_zip").val(billing_zip);
        }
       function bind_phone(billing_tel)
        {
           $("#billing_tel").val(billing_tel);
        }

    </script>

    <script type="text/javascript">
        function GetState(country_id)
        {
            // alert(country_id);
            var datastring = 'country_id='+country_id;
            // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('CreateProfile/GetStates'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                 $('#bind_state_list').html(data);              
               },
              error: function()
              {      
                alert('Error while request..');
              }
             });
        }
    </script>

    <script type="text/javascript">
        
        function generate_domain(domain)
        {
           str = domain.replace(/\s+/g, " ");
           var length2 = str.length; 
           if(length2<7)
           {
              $('#org_cdomain').val(str);
           }
        }

    </script>

    <script type="text/javascript">
      
     $(document).ready(function() 
      {
          var org_email = localStorage.getItem('emailid');
          if(org_email!=null)
          {
            $("#org_email").val(org_email);
            // $("#billing_email").val(org_email);
          }
          // alert(org_email);             
          $('#customerData').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                 org_email: {
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
                       org_cname: {
                          validators: {
                              notEmpty: {
                                  message: 'Company Name is required'
                              },
                                stringLength: {
                                    min: 8,
                                    message: 'Company name must be greater than 8 characters'
                                }
                          }
                      },

                       org_fname: {
                          validators: {
                              notEmpty: {
                                  message: 'First Name is required'
                              }
                          }
                      },
                       org_lname: {
                          validators: {
                              notEmpty: {
                                  message: 'Last Name is required'
                              }
                          }
                      },

                       org_cdomain: {
                          validators: {
                                      notEmpty: 
                                      {
                                          message: 'domain is required'
                                      }
                              }
                      },

                       org_contact: {
                          validators: {
                              notEmpty: {
                                  message: 'Contact is required'
                              },
                                integer: {
                                  message: 'Please enter valid Contact No. '
                              }
                              
                          }
                      },

                       org_address: {
                          validators: {
                              notEmpty: {
                                  message: 'Address is required'
                              }
                          }
                      },

                       org_country: {
                          validators: {
                              notEmpty: {
                                  message: 'Country is required'
                              }
                          }
                      },
                       password: {
                          validators: {
                              notEmpty: {
                                  message: 'Password is required'
                              }
                          }
                      },
                       org_state: {
                          validators: {
                              notEmpty: {
                                  message: 'State is required'
                              }
                          }
                      },
                       org_postcode: {
                                  validators: {
                                      notEmpty: {
                                          message: 'Post Code is required'
                                      },
                                integer: {
                                  message: 'Please enter valid Post Code '
                              }

                          }
                      },
                       org_city: {
                          validators: {
                              notEmpty: {
                                  message: 'City is required'
                              }
                          }
                      },

                  }
              });
          });
      </script>

      <script type="text/javascript">
          $(document).ready(function (e)
             {
               $("#CompanyForm222").on('submit',(function(e)
                   {
                     //e.preventDefault();
                     if (e.isDefaultPrevented())
                      {
                          //alert('invalid');
                      }
                      else
                        {
                            $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="Uploading data...."/>');
                            $("#preview3").show();   
                            $.ajax({
                            url: "<?php echo base_url('CreateProfile/InsertDataCompany'); ?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                              {
                                PNotify.removeAll();
                                $("#preview3").hide();
                                var res=$.trim(data);
                                if(res==0)
                                {
                                   new PNotify({
                                            title: 'Company Already Exist',
                                            text: 'Please enter another company name',
                                            type: 'danger'
                                      });              
                                }
                                else if(res==2)
                                {
                                   new PNotify({
                                            title: 'Email Already Exist',
                                            text: 'Please enter another email',
                                            type: 'danger'
                                      });              
                                }
                                else
                                {
                                   new PNotify({
                                            title: 'Registration',
                                            text: 'Company Registration Completed Successfully',
                                            type: 'success'
                                      });
                                    setTimeout(function()
                                     {
                                         window.location="<?php echo base_url('SignIn') ?>";
                                     }, 2000);
                                }
                              },
                              error: function() 
                              {
                                alert('fail');
                                }           
                           });
                        }
                  return false;
                  }));
              });
        </script>

<script>
$(function() {
setTimeout(function() {
    $(".alert-danger").hide('blind', {}, 500)
}, 5000);
});
</script>

<script>
    function isNumber(event) {
            var allowed = "";
            if (event.target.value.includes(".")) {
                allowed = "0123456789";
            } else {
                allowed = "0123456789";
            }
            if (!allowed.includes(event.key)) {
                event.preventDefault();
            }
            }
            
            document.getElementById('inputBox').addEventListener('keypress',isNumber);
            document.getElementById('inputBoxpostcode').addEventListener('keypress',isNumber);
            
</script>

  </body>
  <!-- END: Body-->
</html>