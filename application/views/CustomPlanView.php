<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buroforce Subscription</title>
    <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/main.css">
    <link rel="apple-touch-icon" href="<?= base_url() ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>app-assets/images/ico/favicon.ico">
    <meta name="description" content="Buroforce Subscription ">
    <meta name="keywords" content="Buroforce Subscription">
    <meta name="author" content="Buroforce">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">       
      .check
      {
        opacity:0.5;
        color:#996;    
      }
    .price .head h2 
      {
        font-size: 30px;
        color: #4a4240;
        text-transform: none;
        font-weight: 500;
        /* letter-spacing: 0; */
        margin-bottom: 20px;
      }
    </style>

</head>

<body class="products">
    <div class="header container pt-2">
        <div class="row justify-content-md-center pt-2">
            <div class="col col-lg-12">
                <a href="/Buroforce/SignIn" title="Buroforce" class="text-center d-block deskera-logo-placeholder">
                     <img src="<?= base_url() ?>app-assets/images/logo/stack-logo-dark.png" style="height: 5rem;" >
                     <br/>
                     <img src="<?= base_url() ?>app-assets/images/logo/logo_two.png" style="height: 0.9rem;width: 8rem;">                    
                     <br/>
                     <img src="<?= base_url() ?>app-assets/images/logo/logo_three.png" style="height: 0.6rem;width:18rem;"> 
                </a>
            </div>
        </div>
    </div>
    <!-- end class="header container" -->
    <div class="container">
        <div class="row justify-content-md-center hero-message">
            <div class="col col-lg-12">
                <div class="text-center">
                    <br/>
                    <h4 class="m-0 mt-1" style="font-size:24px;">Custom Plan</h4>                    
                </div>
            </div>
        </div>
        <hr/>
        <div class="product-plan work-area">
            <div class="container">
                <input type="hidden" class="text-field" id="FinalModuleIds" value="1" />
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div id="tier-nav-content" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="monthly" aria-labelledby="monthly-payment" aria-expanded="true">
                                <div class="row d-flex justify-content-center">
                               

                                  <?php

                                    $TotalPrice=0;
                                    $basicPrice=$ModulesArray[0]['price'];

                                    $count=1;
                                    foreach ($ModulesArray as  $row)
                                     {
                                        $module_name=$row['module_name'];
                                        $price=round($row['price']);
                                        $perdayprice=round($price/365);
                                        $feature_list_array=$row['feature_list_array'];   
                                        $module_id=$row['module_id']; 
                                         // print_r($feature_list_array);
                                    ?>
                                    <div class="col-md-3 m-0 p-2">
                                        <div class="card business-tier">
                                             <input type="hidden" class="text-field" value="<?= $row['module_id']; ?>" />
                                            <h6 style="font-size:16px;margin-top: 25px;color: #444040;"><?= $module_name; ?></h6>       
                                            <div class="card-block card-body tier-block" style="min-height: 400px;">
                                                <h6 class="text-center tier-name"><?= $row->plan_name; ?></h6>
                                                <h1 class="text-center tier-price"><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;</span><span class="currency-base"><?= $price; ?></span><span class="period">/Year</span></h1>
                                                <ul>
                                                    <li><span class="currency-sign"><i class="fa fa-inr"></i> <?=  $perdayprice?> Per User per Day</li>
                                                 <?php
                                                    for($k=0;$k<count($feature_list_array);$k++) 
                                                    { 
                                                    ?>
                                                    <li><?= $feature_list_array[$k]->component_title;?></li>
                                                   <?php } ?>
                                                </ul>
                                            </div>
                                            <?php 
                                             if($count==1)
                                             {
                                            ?>
                                            <button  class="img-check btn btn-lg btn-block btn-business-tier check" style="cursor: none;"> DEFAULT</button>
                                          <?php } else{ ?> 
                                             <button onclick="Add_module(this.id)" id="<?= $module_id;?>"  class="img-check btn btn-lg btn-block btn-business-tier"> SELECT</button>
                                         <?php } ?>
                                        </div>
                                    </div>
                              <?php $count++; }?>        
                             </div>
                          </div>
                          <br/>
                          <br/>
                            <div class="row d-flex justify-content-center">
                                <div class="col col-md-12 m-0 p-2">
                                    <div class="card" style="border-radius: 10px;border: 3px solid #2196f33b;">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="m-0 mt-3" style="text-align: center;">Custom Plan Price : &nbsp;
                                                            <span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;<span id="FinalPricePlan"><?= $basicPrice;?></span>
                                                        </h4>
                                                    </div>      
                                                    <div class="col-md-6">
                                                         <button onclick="BuyNow(this.id)" id="6"  style="background:#F44336;color:#fff;width: 13rem;padding: 1rem;"  class="btn btn-lg btn-primary btn-starter-tier" >Continue</button>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="bt-alert"></div>
    <!--Footer-->
    <footer class="page-footer mt-5">
        <div class="footer-misc">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center flex-md-wrap">
                    <div class="col col-12 px-0 mx-0 text-center">
                      <b style="font-size:15px;"> @2019 Buro Force | All Rights are reserved</b>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <script src="<?= base_url() ?>app-assets/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url() ?>app-assets/js/modernizr.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url() ?>app-assets/js/main.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
       function BuyNow(plan_id)
        {
            var module_ids= $("#FinalModuleIds").val(); 
            window.location="<?php echo base_url('CreateUser/CustomPlan') ?>?plan_id="+plan_id+'&module_ids='+module_ids+'&type=paid';
        }
    </script>

    <script type="text/javascript">
     var arr = [1];
     function Add_module(module_id)
        {
            $("#"+module_id).toggleClass("check");
            if($("#"+module_id).hasClass("check"))
            {
                var datastring='module_id='+module_id;
                $.ajax({
                        url: '<?php echo base_url('CreateProfile/Add_module') ?>',
                        type: "POST",
                        data:  datastring,
                        success: function(data)
                         {
                            var res=$.trim(data);
                            var TotalPrice=$("#FinalPricePlan").html();
                            var FinalPricePlan=+TotalPrice+ + res;
                            $("#FinalPricePlan").html(FinalPricePlan);
                            $("#"+module_id).html('SELECTED');
                         },
                      error: function(exception)
                      {
                        PNotify.removeAll();
                        alert('Exeption:'+exception);
                      }
                   });

                arr.push(module_id);
            }   
            else
            {
                var datastring='module_id='+module_id;
                // alert(datastring);
                $.ajax({
                        url: '<?php echo base_url('CreateProfile/Add_module') ?>',
                        type: "POST",
                        data:  datastring,
                        success: function(data)
                         {
                            var res=$.trim(data);
                            var TotalPrice=$("#FinalPricePlan").html();
                            var FinalPricePlan=+TotalPrice - +res;
                            $("#FinalPricePlan").html(FinalPricePlan);
                            $("#"+module_id).html('SELECT');

                         },
                      error: function(exception)
                      {
                        PNotify.removeAll();
                        alert('Exeption:'+exception);
                      }
                   });

                  var index = arr.indexOf(module_id);
                  if (index > -1) 
                   {
                      arr.splice(index, 1);
                   }
            }  

            // alert(arr);
           $("#FinalModuleIds").val(arr); 

       }
    </script>

</body>

</html>