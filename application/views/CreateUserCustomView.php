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

<style type="text/css">
form 
{
    /*width: 300px;*/
    margin: 0 auto;
    text-align: center;
    padding-top: 50%;
}
.value-button 
{
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 60px;
  height: 60px;
  text-align: center;
  vertical-align: middle;
  padding: 5px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover 
{
  cursor: pointer;
}

form #decrease
{
  margin-right: -4px;
  border-radius: 4px 0 0 4px;
}

form #increase 
{
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

form #input-wrap 
{
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border-top: 2px solid #ddd;
  border-bottom: 2px solid #ddd;
  margin: 0px;
  width: 60px;
  height: 64px;
  font-weight: 600;
  font-size: 16px;

}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button 
{
    -webkit-appearance: none;
    margin: 0;
}

</style>
<style> 
#pricefinal {
    text-align: center;
    border: none;
    border: 2px solid #bdb8b8;
    /* border-bottom: 1px solid #ddd; */
    margin: 0px;
    width: 100%;
    height: 50px;
    font-weight: 600;
    font-size: 20px;
    border-radius: 15px;
}

#tier-nav-content .card .tier-block ul, #custom-plan-nav-content .card .tier-block ul 
{
  font-size: 1.1rem !important;
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
                    <h4 class="m-0 mt-1" style="font-size:24px;">Enter User Details</h4>                    
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

                                   foreach ($plan_list as $row) 
                                   { 
                                      $module_list_array=$row['module_list_array'];
                                      $module_id=$row['module_id'];         
                                      $plan_id=$row['plan_id'];                              
                                      // $price=$row['price']; 
                                      $final_price=0;
                                      for ($j=0;$j<sizeof($module_list_array);$j++)
                                      {
                                        $module_price=$module_list_array[$j]->price;
                                        $final_price=$final_price+$module_price; 
                                      }
                                     $perday=$price/365;
                                  ?>

                                    <div class="col-md-4 m-0 p-2">
                                        <div class="card business-tier">     
                                            <div class="card-block card-body tier-block" style="min-height: 400px;">
                                                <h6 class="text-center tier-name"><?= $row['plan_name']; ?></h6>
                                                <h1 class="text-center tier-price"><span class="currency-sign"><i class="fa fa-inr"></i>&nbsp;</span><span class="currency-base"><?= $final_price; ?></span><span class="period" style="font-size: 15px;"> /Year</span></h1>
                                                <ul>
                                                    <li>ERP with Full Access</li>
                                                        <?php

                                                        for ($i=0;$i<sizeof($module_list_array);$i++)
                                                        {
                                                        ?>
                                                    <li><?= $module_list_array[$i]->module_name;?></li>
                                                   <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                  <?php 
                                    } 
                                  ?>

                                  <div class="col-md-8">
                                     <div class="card business-tier" style="margin-top:5px;">  
                                      <div class="card-block card-body tier-block" style="min-height: 400px;">       
                                         <div class="row"> 
                                              <input type="hidden" id="priceprefinal" value="<?=$final_price;?>" />
                                              <input type="hidden" id="module_id" value="<?= $_REQUEST['module_ids'];?>" />
                                              <input type="hidden" id="plan_id" value="<?=$plan_id;?>" />
                                              <input type="hidden" id="type" value="<?= $_REQUEST['type'];?>" />


                                              <div class="col-md-4">
                                                <form>
                                                  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value" style="background-color: #F44336;color: white;"><b style="font-size:30px;">-</b></div>
                                                    <input type="number" id="number" value="1" readonly="" />
                                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value" style="background-color: #02c509;color: white;"><b style="font-size:30px;">+</b></div>
                                                </form> 
                                              </div>
                                              <div class="col-md-2">
                                                <div align="center" style="padding-top: 115px;">
                                                  <img src="<?= base_url() ?>assets/icons/equal_to.png" style="height: 50px;">     
                                                </div>
                                              </div> 

                                              <div class="col-md-3">
                                                <div align="center" style="padding-top: 115px;">
                                                  <input type="text"  name="pricefinal"  id="pricefinal" readonly="" value="<?=$final_price;?>">
                                                </div>
                                              </div>
                                         </div>  
                                         <br/><br/><br/><br/>
                                          <div class="col-md-12"> 
                                             <div class="card starter-tier as-common-card">
                                               <a onclick="CompleteResgistration()">
                                                 <button style="background:#00629B;color:#fff;" class="btn btn-lg btn-block btn-primary btn-starter-tier">Complete Registration <i class="fa fa-arrow-circle-o-right"  style="font-size:20px;"></i></button>
                                               </a> 
                                             </div>
                                          </div> 
                                       </div>  
                                   </div>                                                          
                                </div>    
                             </div>
                          </div>
                          <br/>
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
      
      function increaseValue()
        {
            var pricefinal=$("#priceprefinal").val();
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            var finalprice=pricefinal*value;
            document.getElementById('number').value = value;
            $("#pricefinal").val(finalprice);   
        }

      function decreaseValue() 
      {
        var pricefinal=$("#priceprefinal").val();
        var value = parseInt(document.getElementById('number').value, 10);
        if(value>1)
        {
          value = isNaN(value) ? 0 : value;
          value < 1 ? value = 1 : '';
          value--;
          var finalprice=pricefinal*value;
          document.getElementById('number').value = value;   
          $("#pricefinal").val(finalprice);      
        }
      }
    </script>

    <script type="text/javascript">
     
      function CompleteResgistration()
        {
           var type=$("#type").val();
           var pricefinal=$("#pricefinal").val();
           var plan_id=$("#plan_id").val();
           var module_id=$("#module_id").val();
           var number_of_users=$("#number").val();
           var datastring='?pricefinal='+pricefinal+'&plan_id='+plan_id+'&module_id='+module_id+'&number_of_users='+number_of_users+'&type='+type;
           // alert(datastring);
           window.location="<?php echo base_url('CreateUser/EncodeURL') ?>"+datastring;
        }
    </script>



</body>

</html>