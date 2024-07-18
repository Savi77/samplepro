
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Admin/includes/header'); ?>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css"/>
  <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  <!-- Core JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
  <!-- /core JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
  <!-- Theme JS files -->
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.placeholder.label.js"></script> 
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
  <!-- /theme JS files -->
  <style type="text/css">
      .btn-info
      {
        background-color: #03A9F4;
      }
  </style>
</head>

<body style="overflow-x: hidden;">
  <?php  $this->load->view('Admin/includes/admin_header'); ?>
 <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4>
          <i class="icon-arrow-left52 position-left"></i>
         <a href="<?php echo base_url('admin/Dashboard/view_dashboard');?>"> <span class="text-semibold">Home</span></a> - Order Details
        </h4>
      </div>
     <div class="heading-elements">
        <div class="heading-btn-group">
          <!-- <a data-toggle="modal" data-target="#interest_model" class="btn btn-link btn-float has-text"><i class="icon-file-plus text-primary"></i><span>ADD</span></a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- /page header -->
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main sidebar -->
      <?php  $this->load->view('Admin/includes/sidebar'); ?>
      <!--  -->
      <?php

          foreach($view_order as $order)
          {
              $order_date = $order['order_date'];
              $customer_name = $order['customer_name'];
              $email = $order['email'];
              $phone_no = $order['phone_no'];
              $address = $order['address'];
              $order_id = $order['order_id'];
              $total = $order['total'];
          }
      ?>
      <!-- Main content -->
      <div class="content-wrapper">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order Details</h3>
                        </div>
                        <table class="table">
                          <tbody>
                            <tr>
                              <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Store"><i class="fa fa-shopping-cart"></i></button></td>
                              <td><a href="http://192.168.1.10/Buroforce" target="_blank">Buroforce</a></td>
                            </tr>
                            <tr>
                              <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Date Added"><i class="fa fa-calendar"></i></button></td>
                              <td><?= date("d M Y", strtotime($order_date)); ?></td>
                            </tr>
                            <tr>
                              <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Payment Method"><i class="fa fa-credit-card"></i></button></td>
                              <td>Cash On Delivery</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
                        </div>
                        <table class="table">
                          <tbody><tr>
                            <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button></td>
                            <td>                
                              <a><?= $customer_name ?></a>
                              </td>
                          </tr>
                          <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="E-Mail"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                            <td><a href="mailto:swapnesh@ileaf.in"><?= $email ?></a></td>
                          </tr>
                          <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs" data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                            <td><?= $phone_no ?></td>
                          </tr>
                        </tbody></table>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-info-circle"></i> Order (#<?= $order_id ?>)</h3>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td style="width: 50%;" class="text-left">Customer Address</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-left"><?= $address ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td class="text-left">Product</td>
                            <td class="text-left">UOM</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Price</td>
                            <td class="text-right">Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($product_orderlist as $product_list) 
                          {
                            $sub_total = $product_list['sub_total'];
                          ?>
                            <tr>
                              <td class="text-left"><a><?= $product_list['product_name'] ?></a></td>
                              <td class="text-left"><?= $product_list['prdsrv_uom'] ?></td>
                              <td class="text-right"><?= $product_list['quantity'] ?></td>
                              <td class="text-right">Rs. <?= $product_list['price'] ?></td>
                              <td class="text-right">Rs. <?= $product_list['total'] ?></td>
                            </tr>
                          <?php } ?>
                            <tr>
                              <td colspan="4" class="text-right">Total</td>
                              <td class="text-right">Rs. <?= $sub_total ?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-comment-o"></i> Order History</h3>
                    </div>
                    <div class="panel-body">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-history" data-toggle="tab">History</a></li>
                      </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab-history">
                            <div id="history">
                              <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <td class="text-left">Date Added</td>
                                  <td class="text-left">Comment</td>
                                  <td class="text-left">Status</td>
                                  <td class="text-left">Customer Notified</td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($product_orderhistory as $history)
                                {
                                  $notify = $history['notify'];
                                  if($notify=='0')
                                  {
                                    $cust_notify = 'No';
                                  }
                                  else
                                  {
                                    $cust_notify = 'Yes';
                                  }
                                ?>
                                  <tr>
                                    <td class="text-left"><?= date("d M Y", strtotime($history['date_added'])); ?></td>
                                    <td class="text-left"><?= $history['comment'] ?></td>
                                    <td class="text-left"><?= $history['status'] ?></td>
                                    <td class="text-left"><?= $cust_notify ?></td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          <br>
                          <fieldset>
                            <legend>Add Order History</legend>
                            <form class="form-horizontal" id="statusform">
                              <input type="hidden" name="ord_id" id="ord_id" value="<?= $order_id ?>">
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-order-status">Order Status</label>
                                <div class="col-sm-10">
                                  <select name="order_status_id" id="input-order-status" class="form-control">
                                    <option value="">Select Order Status</option>
                                    <?php foreach($order_status as $status_list)
                                    {
                                    ?>
                                      <option value="<?= $status_list->order_status_id ?>"><?= $status_list->name ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-notify">Notify Customer</label>
                                <div class="col-sm-10">
                                  <input type="checkbox" name="notify" id="input-notify">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-comment">Comment</label>
                                <div class="col-sm-10">
                                  <textarea name="comment" id="description" rows="3" id="input-comment" class="form-control" maxlength="50"></textarea>
                                  <div class="row" style="height: 20px">
                                       <div class="col-lg-6">
                                          <span style="font-size:15px; color:gray">Max: 50 character</span>
                                      </div>
                                       <div class="col-lg-6" style="height: 20px">
                                          <div class="col-lg-6">
                                          </div>
                                          <div class="col-lg-5">
                                            <p class="req_left_char pull-right" style="font-size:15px; color:gray;">Char Left:</p>
                                          </div> 
                                          <div class="col-lg-1">
                                              <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">50</div>
                                          
                                             <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                             <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                          </div>
                                          
                                       </div>
                                 </div>
                                </div>
                              </div>
                              <div class="text-right">
                                <button type="submit" id="button-history" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Update Status</button>
                              </div>
                            </form>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
      </div>
    </div>

</div>
 
<!-- ====================character count================= -->

  <script type="text/javascript">
    
    $("#description").keyup(function()
    {
          el = $(this);
          if(el.val().length >= 50)
          {
              el.val( el.val().substr(0, 50) );
              $("#charNum").text(0);
          }
           else 
          {
              $("#charNum").text(50-el.val().length);
          }
    });

  </script>

<!-- ======================================= -->

<!--=======================================  Validation Form  ==========================================-->

<script type="text/javascript">
$(document).ready(function() {
$('#statusform').bootstrapValidator({
    message: 'This value is not valid',
    fields: {
               order_status_id: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Order Status'
                        }
                }
            },
           
             emailid: {
                validators: {
                    notEmpty: {
                         message: 'Email is required.'
                 },
                regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            }
    }
});
});
</script>
    
<!--======================================= / Validation login  ==========================================-->



<script type="text/javascript">
        $(document).ready(function (e)
           {
             $("#statusform").on('submit',(function(e)
                 {  
                   //e.preventDefault();
                   if (e.isDefaultPrevented())
                    {
                      //alert('invalid');
                    }
                    else
                    {
                             
                              $.ajax({
                                 url: "<?php echo base_url('admin/Ecommerce/change_order_status');?>",
                                type: "POST",
                                data:  new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(data)
                                  {
                                      // alert(data);
                                      if (data=='2')
                                      {
                                          new PNotify({
                                                  title: 'Order Form',
                                                  text: 'PLease Enter Comment',
                                                  type: 'warning'
                                                 });
                                      }
                                      else
                                      {
                                          new PNotify({
                                                  title: 'Order Form',
                                                  text: 'Order Status Change  Successfully',
                                                  type: 'success'
                                                 });
                                         setTimeout(function()
                                           {
                                               parent.window.location.reload();
                                           }, 1000);
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


<!--=======================================  delete Event  ==========================================-->

<script>
    function del_activity(id)
    {

      var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

         // On confirm
       notice.get().on('pnotify.confirm', function()
         {

      var datastring = 'id='+id;
            //alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Leads/delete_activity'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                            $(function(){
                                                 new PNotify({
                                                              title: 'Delete Form',
                                                              text: 'Deleted successfully',
                                                              type: 'success'
                                                             });
                                                });

                                                  setTimeout(function()
                                                 {
                                                    window.location="<?php echo base_url('admin/Leads/activity');?>";
                                                 }, 1000);

                
               },
                  error: function(){      
                   alert('Error while request..');
                  }
               });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>


<script type="text/javascript">
    var url="<?php echo base_url();?>";
    function delete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"user/deleteuser/"+id;
        else
          return false;
        } 
</script>


<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_activity(id)
    {
      var datastring = 'id='+id;
      //alert(datastring);
       $.ajax({
        type: "post",
        url: "<?php echo base_url('admin/Leads/edit_activity'); ?>",
        cache: false,    
        data: datastring,
        success: function(data)
        {    
          //alert(data);
            $('#modal_default').modal('show');
            $('#complaint_model_data').html(data);
        
         },
        error: function(){      
         alert('Error while request..');
        }
       });

    }
</script>

<script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
     $(document).ready(function (){
      $('textarea[placeholder]').placeholderLabel();
    })
  </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

         // On confirm
        notice.get().on('pnotify.confirm', function()
         {

            var datastring = 'id='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Leads/deactivate_activity'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                // alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Inactive successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Leads/activity');?>";
                           }, 800);

                
               },
                  error: function(){      
                   alert('Error while request..');
                  }
               });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<script>
    function activate(id)
    {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn-sm'
                    },
                    {
                        text: 'No',
                        addClass: 'btn-sm'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        })

         // On confirm
        notice.get().on('pnotify.confirm', function()
         {

            var datastring = 'id='+id;
           // alert(datastring);
             $.ajax({
              type: "post",
              url: "<?php echo base_url('admin/Leads/activate_activity'); ?>",
              cache: false,    
              data: datastring,
              success: function(data)
              {    
                //alert(data);
                $(function(){
                           new PNotify({
                                        title: 'Confirmation Form',
                                        text: 'Activated successfully',
                                        type: 'success'
                                       });
                          });

                            setTimeout(function()
                           {
                              window.location="<?php echo base_url('admin/Leads/activity');?>";
                           }, 800);

                
               },
                  error: function(){      
                   alert('Error while request..');
                  }
               });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function()
         {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>
<!--======================================= / Activate & Deactivate ==========================================-->

</body>
</html>
