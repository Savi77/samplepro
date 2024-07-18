<?php $this->load->view('Admin/includes/n-header'); ?>
<?php
// echo json_encode($user_permission);
$OrderStatusClass = 'style="display:table-cell";';

foreach ($user_permission as $priviledge) {
    $priviledge_key = $priviledge->priviledge_key;
    $status = $priviledge->status;
    if ($priviledge_key == 'ORDERSTATUS') {
        if ($status == 1) {
            $OrderStatusClass = ' style="display:table-cell"; ';
        } else {
            $OrderStatusClass = ' style="display:none"; ';
        }
    }
}
?>
<?php

foreach ($view_order as $order) {
    $order_date = $order['order_date'];
    $customer_name = $order['customer_name'];
    $email = $order['email'];
    $phone_no = $order['phone_no'];
    $address = $order['address'];
    $order_id = $order['order_id'];
    $total = $order['total'];
    $total = $order['total'];
}
?>
</style>
<style>
     /* span.select2.select2-container.select2-container--default{
        width: 95% !important;
    }
    @media only screen and (max-width: 1680px){
        span.select2.select2-container.select2-container--default{
            width: 94% !important;
        }
    }
    @media only screen and (max-width: 1440px){
        span.select2.select2-container.select2-container--default{
            width: 93% !important;
        }
    }
    @media only screen and (max-width: 1280px){
        span.select2.select2-container.select2-container--default{
            width: 92% !important;
        }
    } */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05) !important;
    }
    .order-detail tr td:nth-child(1) a:hover{
        color: #605959 !important;
    }
    .customer-detail tr td:nth-child(2) a:hover{
        color: #605959 !important;
    }
</style>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <h6 class="card-title py-sm-4 card-headings">Order Details</h6>
                    </div>
                    <div class="table-responsive order-detail">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-red"></span><span class="padding-left"><a href="<?= base_url();?>" style="font-weight:600;color:#000;" target="_blank">Buroforce</a></span></td>
                                </tr>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-yellow"></span><span class="padding-left"><?= date("d M Y", strtotime($order_date)); ?></span></td>
                                </tr>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-green"></span><span class="padding-left">Cash On Delivery</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <h6 class="card-title py-sm-4 card-headings">Contact Details</h6>
                    </div>
                    <div class="table-responsive customer-detail">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-red"></span><span class="padding-left"><a><?= $customer_name ?></a></span></td>
                                </tr>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-yellow"></span><span class="padding-left"><a style="font-weight:600;color:#000;" href="mailto:<?= $email ?>"><?= $email ?></a></span></td>


                                </tr>
                                <tr>
                                    <td class="Order-td"><span class="dot dot-green"></span><span class="padding-left"><?= $phone_no ?></span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <h6 class="card-title py-sm-4 card-headings">Order (#<?= $order_id ?>) </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="1px solid #f5f5f5">
                            <thead>
                                <tr class="border">
                                    <th colspan="5">Contact Address : <?= $address ?></th>
                                </tr>
                                <!-- <tr class="border">
                                    <th colspan="5"><?= $address ?></th>
                                </tr> -->

                                <th>Product</th>
                                <th>UOM</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($product_orderlist as $product_list) {
                                    $sub_total = $product_list['sub_total'];
                                ?>
                                    <tr>
                                        <td ><a><?= $product_list['product_name'] ?></a></td>
                                        <td ><?= $product_list['prdsrv_uom'] ?></td>
                                        <td ><?= $product_list['quantity'] ?></td>
                                        <td >Rs. <?= $product_list['price'] ?></td>
                                        <td >Rs. <?= $product_list['total'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="4" ></td>
                                    <td >Total : Rs. <?= $sub_total ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <h6 class="card-title py-sm-4 card-headings">Add Order History</h6>
                    </div>
                    <form class="form-horizontal" id="statusform">
                        <input type="hidden" name="ord_id" id="ord_id" value="<?= $order_id ?>">
                        <div class="col-lg-12 dflex">
                            <label class="col-form-label col-md-2">Order Status</label>
                            <div class="col-md-8">

                                <div class="input-group" style="width:80%;">
                                    <!-- <span class="input-group-prepend">
                                        <span class="input-group-text calender"><i class="icon-paste3"></i></span>
                                    </span> -->
                                    <select class="form-control" name="order_status_id" id="input-order-status" data-placeholder="Select Order Status">
                                        <option value="">Select Order Status</option>
                                        <?php foreach ($order_status as $status_list) {
                                        ?>
                                            <option value="<?= $status_list->order_status_id ?>"><?= $status_list->name ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 dflex">
                            <label class="col-form-label col-md-2">Notify Contact</label>
                            <div class="col-md-8 order-checkbox">
                                <div class="input-group">
                                    <input type="checkbox" name="notify" id="input-notify">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 dflex">
                            <label class="col-form-label col-md-2">Remark</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="col-sm-10">

                                        <textarea name="comment" id="description" rows="2" class="form-control" maxlength="50" spellcheck="false" placeholder="Enter Remark"></textarea>
                                        <div class="row" style="height: 20px">
                                            <div class="col-lg-6">
                                                <span style="font-size:15px; color:gray">Max: 50 character</span>
                                            </div>
                                            <div class="col-lg-6 text-right" style="height: 20px;display:flex;">
                                                <!-- <div class="col-lg-6">
                                                </div> -->
                                                <!-- <div class="col-lg-10" style="text-align:right;"> -->
                                                    <!-- <p class="req_left_char pull-right" style="font-size:15px; color:gray;">Char Left:</p> -->
                                                    <p class="pull-right" style="font-size:15px; color:gray; padding-left:143px">Char Left: <span id="charNum" style="font-size:13px; color:gray;">50</span></p>

                                                <!-- </div>
                                                <div class="col-lg-2">
                                                    <div id="charNum" class="pull-right" style="font-size:15px; color:gray;">50</div>

                                                    <span id="disp_message" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                    <span id="err7" style="color:red; margin-right: 10px; font-size: 12px;"></span>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="text-align:right;margin: auto auto 0 0;">
                                <button type="submit" id="button-history" data-loading-text="Loading..." class="btn btn-primary" <?= $OrderStatusClass; ?>> Submit <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <h6 class="card-title py-sm-4 card-headings">Order History</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="border:1px solid #f5f5f5;">
                            <thead>
                                <!-- <tr class="border">
                                    <th><a href="#">History</a></th>
                                </tr> -->
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                                <tr>
                                    <td>Date Added</td>
                                    <td>Remark</td>
                                    <td>Status</td>
                                    <td>Contact Notified</td>

                                </tr>
                                <?php

                                foreach ($product_orderhistory as $history) {
                                    $notify = $history['notify'];
                                    if ($notify == '0') {
                                        $cust_notify = 'No';
                                    } else {
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
                </div>
                
                    <!-- <div class="col-lg-12 left-text mt-3">
                        <span></span>
                    </div> -->
                    
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Admin/includes/n-footer'); ?>


<!-- ====================character count================= -->

<script type="text/javascript">
    $("#description").keyup(function() {
        el = $(this);
        if (el.val().length >= 50) {
            el.val(el.val().substr(0, 50));
            $("#charNum").text(0);
        } else {
            $("#charNum").text(50 - el.val().length);
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
    $(document).ready(function(e) {
        $("#statusform").on('submit', (function(e) {
            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {

                $.ajax({
                    url: "<?php echo base_url('admin/Ecommerce/change_order_status'); ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        
                        if (data == '2') {
                            // new PNotify({
                            //     title: 'Order Form',
                            //     text: 'PLease Enter Comment',
                            //     type: 'warning'
                            // });
                            $('#errorModal').modal('show');
                        } else {
                            $('#successModal').modal('show');
                            // new PNotify({
                            //     title: 'Order Form',
                            //     text: 'Order Status Change  Successfully',
                            //     type: 'success'
                            // });
                            // setTimeout(function() {
                            //     parent.window.location.reload();
                            // }, 1000);
                        }
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


<!--=======================================  delete Event  ==========================================-->

<script>
    function del_activity(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
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
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'id=' + id;
            //alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/delete_activity'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Delete Form',
                            text: 'Deleted successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Leads/activity'); ?>";
                    }, 1000);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>


<script type="text/javascript">
    var url = "<?php echo base_url(); ?>";

    function delete(id) {
        var r = confirm("Do you want to delete this?")
        if (r == true)
            window.location = url + "user/deleteuser/" + id;
        else
            return false;
    }
</script>


<!--======================================= / Delete Event  ==========================================-->

<script>
    function edit_activity(id) {
        var datastring = 'id=' + id;
        //alert(datastring);
        $.ajax({
            type: "post",
            url: "<?php echo base_url('admin/Leads/edit_activity'); ?>",
            cache: false,
            data: datastring,
            success: function(data) {
                //alert(data);
                $('#modal_default').modal('show');
                $('#complaint_model_data').html(data);

            },
            error: function() {
                alert('Error while request..');
            }
        });

    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[placeholder]').placeholderLabel();
    })
    $(document).ready(function() {
        $('textarea[placeholder]').placeholderLabel();
    })
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>



<!--======================================= Activate & deactivate  ==========================================-->

<script>
    function deactivate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Inactive this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
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
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/deactivate_activity'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    // alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Inactive successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Leads/activity'); ?>";
                    }, 800);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>

<script>
    function activate(id) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to activate this Activity?</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [{
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
        notice.get().on('pnotify.confirm', function() {

            var datastring = 'id=' + id;
            // alert(datastring);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('admin/Leads/activate_activity'); ?>",
                cache: false,
                data: datastring,
                success: function(data) {
                    //alert(data);
                    $(function() {
                        new PNotify({
                            title: 'Confirmation Form',
                            text: 'Activated successfully',
                            type: 'success'
                        });
                    });

                    setTimeout(function() {
                        window.location = "<?php echo base_url('admin/Leads/activity'); ?>";
                    }, 800);


                },
                error: function() {
                    alert('Error while request..');
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });

    }
</script>
<!--======================================= / Activate & Deactivate ==========================================-->
    <script type="text/javascript">
          $('#input-order-status').select2();
        
    </script>

    <script>
    $(document).on('select2:open', (e) => {
            const selectId = e.target.id;
            $(".select2-search__field[aria-controls='select2-"+selectId+"-results']").each(function (key,value,){
                value.focus();
            });
        });
    </script>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="successModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Success</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;"> Order Status Changed Successfully </div>
            <div class="modal-footer" style="justify-content: center;">
            <?php $url = base_url($_SERVER['REQUEST_URI']);?>
                <a href="<?php echo $url; ?>">
                <!-- <a onclick="javascript:window.location.reload()"> -->
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="errorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">PLease Enter Remark</div>
            <div class="modal-footer" style="justify-content: center;">
            <?php $url = base_url($_SERVER['REQUEST_URI']);?>
                <a href="<?php echo $url; ?>">
                    <button type="button" class="btn" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>