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
    $text = 'Start '.$days.' Day Free Trial!';
    
    ?>
    <!-- end class="header container" -->
    <div class="container">
        <div class="row justify-content-md-center hero-message">
            <div class="col col-lg-12">
                <div class="text-center">
                    <h2 class="m-0 mt-3">Get Started with Buroforce</h2>
                    <h1>Pick a
                    <span class="strong">Subscription Plan</span>
                </h1>
                    <h3 class="mb-3">Explore the power of an <span class="strong">ALL-IN-ONE-ERP</span> with our Suite of Applications</h3>
                </div>
            </div>
        </div>
        <div class="product-plan work-area">
            <div class="container">
               
<!--                 <div class="row mt-2 mb-1">
                    <div class="col d-flex justify-content-center">
                        <form class="form-inline" <label for="referral_code" class="m-0">Referral Code:
                            <input type="text" name="referral_code" class="form-control mb-2 mr-2 ml-2" id="referral_code">
                            <button type="submit" class="btn btn-primary mb-2">Apply</button>
                        </form>
                    </div>
                </div> -->

                <div class="row mt-2 mb-1">
                    <div class="col d-flex justify-content-center">
                        <ul id="tier-nav" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                  <a class="nav-link active" href="#monthly" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                    <i class="fa fa-align-right"></i> Monthly
                                 </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" href="#yearly" role="tab" id="hats-tab" data-toggle="tab" aria-controls="hats" aria-expanded="false">
                                    <i class="fa fa-align-right"></i> Yearly
                                </a> 
                           </li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <!-- Content Panel -->
                        <div id="tier-nav-content" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="monthly" aria-labelledby="monthly-payment" aria-expanded="true">

                                <div class="row d-flex justify-content-center">
                                  <?php
                                    foreach ($PlanArray as $key => $row)
                                     {
                                        $plan_id=$row->plan_id;                                        
                                        $price=$row->price/12;
                                        $perdayprice=$row->price/365;

                                        if($row->price!=0)
                                        {
                                            
                                    ?>
                                    <div class="col-md-2 m-0 p-2">
                                        <div class="card business-tier">
                                            <div class="card-block card-body tier-block">
                                                <h6 class="text-center tier-name"><?= $row->plan_name; ?></h6>
                                                <h1 class="text-center tier-price" ><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;</span><span class="currency-base"><?= floor($price); ?></span><span class="period">/month</span></h1>
                                                <ul>
                                                    <li><strong><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;
                                                     </span><span class="currency-base"><?= round($perdayprice,2);?></span></strong> Per User per Day</li>
                                                    <li><strong>ERP</strong> with Full Access</li>
                                                    <li><strong>1</strong> Users</li>
                                                    <li><strong>24/7</strong> Phone Support</li>
                                                    <li><strong>Monthly</strong> Auto-Backups</li>
                                                </ul>
                                            </div>
                                            <button  onclick="BuyNow(this.id)" id="<?= $plan_id; ?>" class="btn btn-lg btn-block btn-business-tier" >Buy Now</button>
                                        </div>
                                    </div>

                                <?php } }?>        

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="yearly" aria-labelledby="yearly-payment" aria-expanded="true">

                                <div class="row d-flex justify-content-center">
                                  <?php
                                    foreach ($PlanArray as $key => $row)
                                     {
                                        $plan_id=$row->plan_id;                                        
                                        $price=$row->price;
                                        $perdayprice=$row->price/365;

                                        if($row->price!=0)
                                        {
                                    ?>
                                    <div class="col-md-2 m-0 p-2">
                                        <div class="card business-tier">
                                            <div class="card-block card-body tier-block">
                                                <h6 class="text-center tier-name"><?= $row->plan_name; ?></h6>
                                                <h1 class="text-center tier-price"><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;</span><span class="currency-base"><?= floor($price); ?></span><span class="period">/month</span></h1>
                                                <ul>
                                                    <li><strong><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;
                                                     </span><span class="currency-base"><?= round($perdayprice,2);?></span></strong> Per User per Day</li>
                                                    <li><strong>ERP</strong> with Full Access</li>
                                                    <li><strong>1</strong> Users</li>
                                                    <li><strong>24/7</strong> Phone Support</li>
                                                    <li><strong>Monthly</strong> Auto-Backups</li>
                                                </ul>
                                            </div>
                                            <button  onclick="BuyNow(this.id)" id="<?= $plan_id; ?>" class="btn btn-lg btn-block btn-business-tier">Buy Now</button>
                                        </div>
                                    </div>

                                <?php }  }?>        

                                </div>
                            </div>

                            <br/>

                            <div class="row d-flex justify-content-center">
                                <div class="col col-md-10 m-0 p-2">
                                    <div class="card" style="border-radius: 10px;border: 3px solid #2196f33b;">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h2 class="m-0 mt-3" style="text-align: center;">Select Custom Plan</h2>
                                                    </div>      
                                                    <div class="col-md-3">
                                                         <button onclick="Custom_plan(this.id)" id="6"  style="background:#F44336;color:#fff;width: 13rem;padding: 1rem;"  class="btn btn-lg btn-primary btn-starter-tier" >Continue</button>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br/><br/>

                            <div class="row d-flex justify-content-center divider divider-text-circle">
                                <div class="col m-0 p-0">
                                    <hr class="hr-text circular-text" data-content="OR">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col col-md-10 col-lg-8 m-0 p-2">
                                    <div class="card starter-tier as-common-card">
                                       <a  onclick="FreeTrial(this.id)" id="5" >
                                         <button style="background:#00629B;color:#fff;"  class="btn btn-lg btn-block btn-primary btn-starter-tier"><?php echo $text;?></button>
                                       </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="CustomPlanModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
     $(document).ready(function() 
      {
          localStorage.setItem('plan_id', '');   
       });
    </script>

    <script type="text/javascript">
      
        function CustomBuyNow(plan_id)
        {
            $("#CustomPlanModal").modal('show');
        }

       function BuyNow(plan_id)
        {
            // alert(plan_id);
            window.location="<?php echo base_url('CreateUser/PaidPlanContinue?plan_id=') ?>"+plan_id;
        }

       function FreeTrial(plan_id)
        {
            // alert(plan_id);
            window.location="<?php echo base_url('CreateProfile/RegisterNewCompany?url=fDV8MSwyLDMsNHw1fDB8dHJpYWw=') ?>";
        }




       function Custom_plan(plan_id)
        {
            // alert(plan_id);
            localStorage.setItem('plan_id', plan_id);   
            window.location="<?php echo base_url('CreateProfile/Custom_plan') ?>";
        }


    </script>

</body>

</html>