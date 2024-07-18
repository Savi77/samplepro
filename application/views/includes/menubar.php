
<style type="text/css">  
 @media(min-width:769px)
  {
      .menuadjust
      {
        /*margin-left: -60% !important;*/
      }
  } 
</style>


<?php 

$user_type=$this->session->user_type;

?>

<div class="navbar navbar-default" id="navbar-second">
  <ul class="nav navbar-nav no-border visible-xs-block">
    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
  </ul>
  <div class="navbar-collapse collapse" id="navbar-second-toggle">
    <ul class="nav navbar-nav">
    
     <?php if($user_type=='Admin'){?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon icon-cogs"></i> Masters <span class="caret"></span>
        </a>
        <ul class="dropdown-menu width-200 menuadjust" >
            <li class="dropdown-header">Masters</li>
            <li><a href="<?= base_url('Company') ?>"><i class="icon icon-home5"></i>Company</a></li> 
            <li><a href="<?= base_url('Branch') ?>"><i class="icon icon-tree6"></i>Branch</a></li>
            <li><a href="<?= base_url('BranchManager') ?>"><i class="icon-user-tie"></i>Branch Manager</a></li>
            <li><a href="<?= base_url('Debtors') ?>"><i class="icon-office"></i>Consignee / Consignor</a></li> 
            <li><a href="<?= base_url('BillingParty') ?>"><i class="icon icon-city"></i>Billing Party</a></li>
            <li><a href="<?= base_url('Customer') ?>"><i class="icon icon-users4"></i>Customers / Vendor</a></li>
            <li><a href="<?= base_url('Vendor') ?>"><i class="icon-address-book2"></i>Vendor</a></li>

            <li><a href="<?= base_url('ExpenseHead') ?>"><i class="icon-font-size"></i>Expense Head</a></li> 
            <li><a href="<?= base_url('Specification') ?>"><i class="icon-menu2"></i>Specification</a></li> 

            <li><a href="<?= base_url('Drivers') ?>"><i class="icon-users4"></i>Drivers</a></li> 
            <li><a href="<?= base_url('Vehicle') ?>"><i class="icon-bus"></i>Vehicle</a></li>           
            <li><a href="<?= base_url('FuelStation') ?>"  style="display: none;"><i class="icon-droplet"></i>Fuel Station</a></li>
            <li>
              <a href="<?= base_url('VehicleType') ?>">
               <i class="icon-truck"></i>
                Vehicle Type
              </a>
           </li>
           <li><a href="<?= base_url('Taxation') ?>"><i class="icon-percent"></i>Taxation</a></li> 
          </ul>
      </li>
      <?php } else{ ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon icon-cogs"></i> Masters <span class="caret"></span>
        </a>
        <ul class="dropdown-menu width-200">
            <li class="dropdown-header">Masters</li>
            <li><a href="<?= base_url('BranchManager') ?>"><i class="icon-user-tie"></i>Employee</a></li>
        </ul>
      </li>
    <?php } ?>  
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon-make-group position-left"></i> LR Details <span class="caret"></span>
        </a>
        <ul class="dropdown-menu width-250">
          <li class="dropdown-header">Create New LR Details</li>
          <li>
            <a href="<?= base_url('LRData') ?>"><i class="icon-diff-added"></i>Create New LR</a>
          </li>
          <li>
            <a href="<?= base_url('ViewLR') ?>"><i class="icon-clipboard3"></i>View LR</a>
          </li>
        </ul>
      </li>
     

     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon-shredder position-left"></i>  Generate Bill (Invoice)   <span class="caret"></span>
        </a>
        <ul class="dropdown-menu width-250">
          <li class="dropdown-header">Bill Details</li>
          <li>
            <a href="<?= base_url('GenerateBill') ?>"><i class="icon-diff-added"></i>Generate Invoice</a>
          </li>
          <li>
            <a href="<?= base_url('GenerateBill/ViewData') ?>"><i class="icon-clipboard3"></i>View Invoice Details</a>
          </li>
        </ul>
      </li>



    </ul>
  </div>
</div>
