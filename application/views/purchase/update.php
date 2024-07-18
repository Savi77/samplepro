<?php init_app_head() ?>
<style type="text/css">
    .table th,
    .table td {
        padding: 0.25rem 1rem !important;
    }
</style>
<script>
    var comPstateId = 1;
</script>
<?php
if (isset($company['trade_name'])) {
    $com_state_id = $company['state'];
} else {
    $com_state_id = 1;
}
?>
<div class="app-content content">
    <div class="content-wrapper cardPaddingHeader">

        <!-- <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Purchase Order Update</h3>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>app">Home</a>
                </li>
              
                <li class="breadcrumb-item active">Purchase Order Update
                </li>
              </ol>
            </div>
          </div>
        </div> -->


        <div class="col-md-12 cardPadding">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Purchase Order
                        <a href="<?php echo base_url(); ?>purchase">
                            <button type="button" class="btn btn-Success pull-right">Back <i class="fa fa-arrow-left"></i></button>
                        </a>
                    </h4>
                </div>
                <hr>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Edit Purchase Order:</legend>

                            <form id="addOrder" class="form-horizontal" action="<?= base_url() ?>role/addRole">
                                <input type="hidden" name="action_path" class="action_path" value="purchase/ajax_update_purchase_order">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Select Vendor </label>
                                        <div class="col-md-8 pull-right">
                                            <select name="clientId" class="form-control clientAuto clientList" required>

                                                <?php
                                                
                                                foreach ($vendors as $vendor) {
                                                    if ($vendor['vendor_id'] == $order['order_client']) {
                                                ?>
                                                        <option selected class="form-control" value="<?= $vendor['vendor_id'] ?>"> <?= $vendor['vendor_name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Purchase Order Challan Id</label>
                                        <div class="col-md-8 pull-right">
                                            <input type="text" name="gui" value="<?php if (isset($order['po_challan_id'])) {
                                                                                        echo $order['po_challan_id'];
                                                                                    } ?>" placeholder="Performa #" required class="form-control" />
                                            <input type="hidden" name="customPOId" value="<?= $order['order_id']  ?>" />
                                            <input type="hidden" name="order_id" value="<?= $order['order_id']  ?>" />
                                            <input type="hidden" name="companyId" value="<?= $order['company_id'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Vendor Email </label>
                                        <div class="col-md-8 pull-left">
                                            <input name="clientEmail" type="text" class="form-control clientEmail" value="<?= $clientdetails['email'] ?>" placeholder="Vendor Email" readonly>
                                            <input name="stateid" type="hidden" class="stateid" value="<?php echo $order['address_state'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Date </label>
                                        <div class="col-md-8 pull-right">
                                            <input type="text" name="date_create" class="form-control datetimepicker" value="<?= dbdate_to_caldate($order['order_placed_on']) ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Vendor Quote Number: </label>
                                        <div class="col-md-8 pull-left">
                                            <input name="vendor_quote_number" type="text" class="form-control" value="<?= $order['vendor_quote_number'] ?>" placeholder="Vendor Quote Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-4 control-label pull-left ">Date </label>
                                        <div class="col-md-8 pull-right">
                                            <input type="text" name="vendor_quote_date" class="form-control datetimepicker" value="<?= dbdate_to_caldate($order['vendor_quote_date']) ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 pull-left">
                                        <div class="panel-body">
                                            <h5><strong> Billing Address </strong> </h5>
                                            <address class="addressview billingAddress">
                                                <strong>
                                                    <pre><?php
                                                            echo 'Address: ' . $clientdetails['vendor_name'] . ', ' . $order['address_line1'] . ', ' . $order['address_line2'] . ', ' . $order['city_name'] . ', ' . $order['state_name'] . ' (' . $order['country_name'] . ') ' . PHP_EOL;
                                                            echo 'Pincode: ' . $order['address_postal'] . PHP_EOL;
                                                            echo 'Contact Person: ' . $order['contact_person'] . PHP_EOL;
                                                            // echo 'Vat Number: ' . $order['vat_number'] . PHP_EOL;
                                                            echo 'GST Number: ' . $order['gst_number'] . PHP_EOL;
                                                            echo 'Phone Number: ' . $order['phone_number'] . PHP_EOL;
                                                            $stateid = $order['address_state'];
                                                            ?>
                                            <input name='stateid'  type='hidden'  class='stateid' value='<?= $order['address_state']  ?>'>
                                            <input name='party_category'  type='hidden'  class='gst_category' value="<?php echo $order['party_category'] ?>">
                                           </pre>
                                                </strong>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear" style="clear:both"> </div>

                                <div class="col " style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                            <tr>
                                                <th width="20" class="text-center"> S.N.</th>
                                                <th width="120" class="text-center"> Product</th>
                                                <th width="80" class="text-center"> Product HSN/SAC</th>

                                                <th width="80" class="text-center">Qty </th>
                                                <th width="80" class="text-center">Unit Price </th>
                                                <th width="30" class="text-center"> Dis % </th>
                                                <th width="80" class="text-center">Taxable Amount </th>
                                                <th width="80" class="text-center">GST</th>

                                                <th width="150" class="text-center">Total </th>
                                                <th width="10" class="text-center"> </th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemItreate">
                                            <?php

                                            $i = 1;
                                            foreach ($order_items as $key => $order_item) {




                                            ?>
                                                <tr id="<?= $i ?>">
                                                    <td>
                                                        <?= $i ?>
                                                    </td>
                                                    <!--   <td class="producttr" width="200">
                                            <input  id="itemsearchByname" type="text" class="form-control itemcode itemsearchByname" placeholder="Product Name" autocomplete="off" />
                                            <input name="productId[]"  type="hidden" class="productIdClass" /> 
                                            </td>-->
                                                    <td class="producttr">
                                                        <select name="productId[]" class="form-control autoProduct">
                                                            <option class="form-control" value="0">Select Product</option>
                                                            <?php
                                                            foreach ($products as $product) {
                                                                $selected = $product['product_id'] == $order_item['order_item_product']  ? 'selected' : '';
                                                            ?>
                                                                <option <?= $selected ?> class="form-control" value="<?= $product['product_id'] ?>"> <?= $product['product_name'] ?> </option>
                                                            <?php
                                                            }
                                                            ?>

                                                        </select>
                                                        <strong class="prddesc">
                                                            <?php
                                                            $this->db->where('id', $order_item['unit']);
                                                            $queryUnit = $this->db->get('klc_unit')->result_array();

                                                            if (isset($queryUnit[0]['unitcode'])) {
                                                                echo "UOM :" . $queryUnit[0]['unitcode'];
                                                            }
                                                            ?>
                                                        </strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong class="prdHSN">
                                                            <?php
                                                            if ($order_item['product_type'] == 1) {
                                                                echo $hsn = $order_item['hsn/sac_code'];
                                                            } else {
                                                                echo $hsn = $order_item['hsn/sac_code'];
                                                            }
                                                            ?>
                                                        </strong>
                                                    </td>

                                                    <td class="text-center" width="70">
                                                        <input name="qty[]" class="qty form-control numberinput" type="text" value="<?= $order_item['qty'] ?>" placeholder="0">
                                                    </td>
                                                    <td class="text-center" width="100">
                                                        <input name="unitprice[]" type="text" class="numberinput unitprice form-control" value="<?= $order_item['unit_price'] ?>" placeholder="0.00">

                                                    </td>
                                                    <td class="text-center" width="70">
                                                        <input name="lessdiscount[]" type="text" class="numberinput form-control lessdiscount" value="<?= $order_item['less_discount'] ?>">
                                                    </td>
                                                    <td width="100">
                                                        <input name="rowtotalx[]" type="text" readonly class="form-control rowtotalx" value="<?= $order_item['taxable_amount'] ?>" placeholder="0.00">
                                                    </td>

                                                    <td class="text-center">
                                                        <strong class="gst">GST : <?= $order_item['gst_val'] ?>% GST amount : <?= $order_item['gst_amount'] ?> </strong>
                                                        <input name="vatinput[]" type="hidden" class="vatinput" value="<?= $order_item['gst_val'] ?>">
                                                        <input name="vatAmountinput[]" type="hidden" class="vatAmountinput" value="<?= $order_item['gst_amount'] ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <input name="rowtotal[]" type="text" readonly class="form-control rowtotal" value="<?= $order_item['total'] ?>" placeholder="0.00">
                                                    </td>
                                                    <td><span id='<?= $i ?>' class='fa fa-2x fa-minus-square removeItem'></span></td>
                                                </tr>

                                            <?php $i++;
                                            } ?>

                                        </tbody>
                                    </table>
                                    <div class="col-md-3 pull-right">
                                        <div class="pull-right">
                                            <button class="btn btn-rounded btn-outline btn-primary addMoreRow" type="button"> <strong>Add More Row</strong></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear" style="clear:both"> </div>
                                <br> <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="control-label ">Note:-</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <textarea name="note" class="form-control"><?= $order['note'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="panel ">
                                                            <table class="taxSummary table table-bordered table-striped table-actions">
                                                                <?php if ($order['party_category'] == "SEZ") { ?>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>HSN/SAC <br> Code</th>
                                                                            <th>IGST % </th>
                                                                            <th>IGST <br> Amount </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        foreach ($order_items as $key => $order_item) {
                                                                            if ($order_item['product_type'] == 1) {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            } else {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            }
                                                                            echo "<tr><td>" . $hsn . "</td><td>" . $order_item['gst_val'] . "</td><td>" . $order_item['gst_amount'] . "</td></tr>";
                                                                        }
                                                                        ?>
                                                                    <tbody>
                                                                    <?php } else if ($stateid != $com_state_id) {
                                                                    // echo 'IGST';
                                                                    ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>HSN/SAC <br> Code</th>
                                                                                <th>IGST % </th>
                                                                                <th>IGST <br> Amount </th>
                                                                            </tr>
                                                                        </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        foreach ($order_items as $key => $order_item) {
                                                                            if ($order_item['product_type'] == 1) {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            } else {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            }
                                                                            echo "<tr><td>" . $hsn . "</td><td>" . $order_item['gst_val'] . "</td><td>" . $order_item['gst_amount'] . "</td></tr>";
                                                                        }
                                                                        ?>
                                                                    <tbody>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>HSN/SAC <br> Code</th>
                                                                                <th>CGST % </th>
                                                                                <th>CGST <br> Amount </th>
                                                                                <th>SGST % </th>
                                                                                <th>SGST <br> Amount </th>
                                                                            </tr>
                                                                        </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        foreach ($order_items as $key => $order_item) {
                                                                            if ($order_item['product_type'] == 1) {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            } else {
                                                                                $hsn = $order_item['hsn/sac_code'];
                                                                            }
                                                                            echo "<tr><td>" . $hsn . "</td><td>" . ($order_item['gst_val'] / 2) . "</td><td>" . ($order_item['gst_amount'] / 2) . "</td><td>" . ($order_item['gst_val'] / 2) . "</td><td>" . ($order_item['gst_amount'] / 2) . "</td></tr>";
                                                                        }
                                                                        ?>
                                                                    <tbody>
                                                                    <?php

                                                                }
                                                                    ?>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">Total Amount Before GST</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input name="grosstotal" type="text" class="form-control withouttax" readonly value="<?= $order['grros_total'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>


                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">Total GST</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input name="totalgst" type="text" class="form-control totalgst" placeholder="Total Gst" value="<?= $order['total_gst'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">Total</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input name="totalwithgst" type="text" class="form-control finalTotal" value="<?= $order['total_withgst'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <?php
                                                        $signsarrays = array("1" => "+", "2" => "-");
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">Round ( +/- )</label>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <select id="signRound" name="sign" class="form-control sign">
                                                                    <?php
                                                                    foreach ($signsarrays as $key => $signsarray) {
                                                                        if ($key == $order['round_sign']) {
                                                                    ?>
                                                                            <option selected value="<?= $key ?>" selected> <?= $signsarray  ?></option>
                                                                        <?php
                                                                        } else { ?>
                                                                            <option value="<?= $key ?>" selected> <?= $signsarray  ?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input name="roundfinalTotal" type="text" class="numberinput form-control roundfinalTotal" value="<?= $order['round_amount'] ?>">
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">In word Amount</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <strong class="word"> </strong>
                                                                <input name="inword" type="hidden" class="word  form-control " value="<?= $order['order_word'] ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="control-label ">Final Amount</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input readonly name="finalOrderPrice" type="text" class="finalOrderPrice  form-control " value="<?= $order['grand_total'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="clear" style="clear:both"> </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="hide error_msg alert alert-danger"></div>
                                <div class="hide success_msg alert alert-success"></div>


                                <div class="form-actions">
                                    <div class="text-right">

                                        <a href="<?= base_url() ?>purchase/print_invoice/<?= $order['order_id'] ?>" target="_blank"><button type="button" class="btn btn-primary generate_invoicec">Print Purchase Invoice <i class="ft-file position-right"></i></button> </a>



                                        <button type="submit" class="btn btn-primary update_btn">Update <i class="ft-thumbs-up position-right"></i></button>
                                    </div>
                                </div>

                            </form>






                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<?php init_app_tail() ?>
<script type="text/javascript">
    $.main_sidebar_li_status_update('li.purchaselist');
    var products = <?= json_encode($products); ?>

    $('.addMoreRow').click(function() {

        var _thisId = "";

        var counter = $("#addOrder tbody#itemItreate tr").length;


        var newId = counter + 1;

        var addRowHtml = "<tr  id='" + newId + "'>";
        addRowHtml += "<td>" + newId + "</td>";

        //ProductS

        addRowHtml += "<td class='producttr'><select name='productId[]' class='form-control autoProduct' ><option class='form-control' value='0'  >Select Product</option>";

        $.each(products, function(index, product) {
            addRowHtml += "<option class='form-control' value='" + product.product_id + "' >" + product.product_name + "  </option>";
        });
        addRowHtml += "</select><strong class='prddesc'>  </strong></td>";


        addRowHtml += "<td class='text-center'><strong class='prdHSN'>  </strong></td>";
        addRowHtml += "<td class='text-center hide'><textarea name='itemdesc[]' row='3' class='form-control prddesc'>  </textarea></td>";

        //Qty 
        addRowHtml += "<td class='text-center'  width='70'><input name='qty[]' class='qty form-control numberinput' type='text'  value='0' placeholder='0'></td>";

        //Unit Price
        addRowHtml += "<td class='text-center'  width='100'><input name='unitprice[]'  type='text'  class='unitprice form-control numberinput' value='0' placeholder='0.00'></td>";

        //Less Discount
        addRowHtml += "<td class='text-center'  width='70'><input name='lessdiscount[]' class='lessdiscount form-control numberinput' type='text'  value='0'></td>";

        //Taxable Amount
        addRowHtml += "<td class='text-center'  width='100'> <input  readonly name='rowtotalx[]' type='text' class=' form-control rowtotalx' value=''   placeholder='0.00'></td>";


        //Vat
        addRowHtml += "<td class='text-center'><strong class='gst'> </strong><input name='vatinput[]' type='hidden' class='vatinput'><input name='vatAmountinput[]' type='hidden' class='vatAmountinput'></td>";

        //Total
        addRowHtml += "<td class='text-center'><input  name='rowtotal[]' type='text' readonly class='form-control rowtotal' value=''   placeholder='0.00'> </td>";


        addRowHtml += "<td><span id='" + newId + "' class='fa fa-2x fa-minus-square removeItem'></span></td>";


        addRowHtml += "</tr>";

        $("#addOrder tbody#itemItreate").append(addRowHtml);

        performaActions();
        var _thisTr = $("#addOrder tbody#itemItreate tr#" + newId);

        autoProductSelectizAjax(_thisTr);

        removeItem();




    });

    function removeItem() {

        $(".removeItem").click(function() {
            var deleterowid = $(this).attr('id');
            $("#addOrder tbody#itemItreate tr#" + deleterowid).remove();
            totalBlock();
        });
    }
    removeItem();

    $('.clientAuto').change(function() {
        var vendorId = $(this).val();

        jQuery.ajax({
            url: url + 'vendor/ajaxGetVendor',
            type: "POST",
            data: {
                vendorId: vendorId
            },
            ContentType: "application/json",
            dataType: "json",
            async: false,

            success: function(response) {
                var client = response.vendor;
                var primaryAddres = response.primaryAddres;


                var billingAddress = "";
                var shippingAddress = "";
                var clientEmail = client.email;



                if (primaryAddres.addressId != 'undefined') {

                    billingAddress += "<strong>" + client.vendor_name + ", " + primaryAddres.line1 + ", " + primaryAddres.line2 + "<br>";

                    billingAddress += primaryAddres.cityName + ", " + primaryAddres.provinceName + "( " + primaryAddres.countryName + " )<br>";
                    billingAddress += "<input name='stateid'  type='hidden'  class='stateid' value='" + primaryAddres.province + "'>";
                    billingAddress += "<input name='gst_category'  type='hidden'  class='gst_category' value='" + primaryAddres.party_category + "'>";
                    billingAddress += "Pincode: " + primaryAddres.pincode + " <br>";

                    billingAddress += "Contact Person: " + client.contact_person + " <br>";
                    //billingAddress += "Vat Number: " + client.vat_number + " <br>" ;
                    billingAddress += "GST Number: " + client.gst_number + " <br>";
                    billingAddress += "Phone Number: " + client.phone_number + " <br>";

                }


                $("input.clientEmail").val(clientEmail);

                $("address.billingAddress").empty();
                $("address.billingAddress").append(billingAddress);

            },

            error: function(jqXHR, textStatus, errorThrown) {
                //alert( "Sorry You have not permission For This Action "); 
                //$("#mb-not-permission").addClass('open');
            }
        });
    });




    $('.autoProduct').change(function(e) {
        var prdId = $(this).val();
        var _thisTr = $(this).closest('tr');
        productChange(prdId, _thisTr);
    });

    function autoProductSelectizAjax(_thisTr) {

        _thisTr.find('.autoProduct').change(function(e) {
            var prdId = $(this).val();
            var _thisTr = $(this).closest('tr');
            productChange(prdId, _thisTr);

        });

    }

    function productChange(prdId, _thisTr) {
        InvType = "P";
        jQuery.ajax({
            url: url + 'product/ajax_get_product_details',
            type: "POST",
            data: {
                prdId: prdId,
                InvType: InvType
            },
            ContentType: "application/json",
            dataType: "json",
            async: false,

            success: function(response) {

                var prdName = response.prdName;

                var uomId = response.uom;
                var uom = response.uomName;

                var price = response.price;
                var hsnCode = response.hsnCode;

                var taxId = response.taxId;
                var taxPercent = response.tax;


                var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
                var total = parseFloat(taxAmoutn) + parseFloat(price);

                //Desc 
                var desc = '';
                if (prdId > 0) {
                    desc += response.prdDesc;

                    desc += " UOM :" + uom + "";
                }
                //ProductName
                _thisTr.find("strong.prdHSN").text(hsnCode);
                _thisTr.find(".prddesc").text(desc);

                _thisTr.find("input.qty").val(1);
                _thisTr.find("input.unitprice").val(price);
                /*_thisTr.find("input.unitpricett").val( price );*/
                _thisTr.find("input.lessdiscount").val(0);

                //Tax
                var stateId = $("input.stateid").val();

                _thisTr.find(".gst").html("GST : " + taxPercent + "%" + " <br>Tax amount: " + taxAmoutn.toFixed(2));



                _thisTr.find("input.vatinput").val(taxPercent);
                _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));

                //Total 
                _thisTr.find(".rowtotal").val(total.toFixed(2));

                _thisTr.find(".rowtotalx").val(price);

                summaryVatBlock();
                totalBlock();

            },

            error: function(jqXHR, textStatus, errorThrown) {}
        });

    }

    //Tax Summary Block 
    function summaryVatBlock() {

        $(".taxSummary").empty();
        var TotlataxAmoutn = 0;
        var stateId = $("input.stateid").val();
        var gstCategory = $("input.gst_category").val();
        // alert(gstCategory);
        if (typeof stateId == 'undefined') {
            var vatListHtml = `<thead><tr><th>HSN/SAC <br> Code</th><th>CGST % </th><th>CGST <br> Amount </th><th>SGST % </th><th>SGST <br> Amount </th></tr></thead><tbody>`;
        } else {
            if (stateId != 22 || gstCategory == "SEZ") {
                var vatListHtml = `<thead><tr><th>HSN/SAC <br> Code</th><th>IGST % </th><th>IGST Amount </th></tr></thead><tbody>`;
            } else {
                var vatListHtml = `<thead><tr><th>HSN/SAC <br> Code</th><th>CGST % </th><th>CGST <br> Amount </th><th>SGST % </th><th>SGST <br> Amount </th></tr></thead><tbody>`;
            }

        }
        $(".taxSummary").append(vatListHtml);
        $("#itemItreate tr").each(function(index) {

            var _thisTr = $(this);

            var prdHSN = _thisTr.find(".prdHSN").text();
            var taxPercent = _thisTr.find("input.vatinput").val();
            var taxAmoutn = _thisTr.find("input.vatAmountinput").val();
            //alert( taxPercent );
            if (taxAmoutn > 0) {
                TotlataxAmoutn = parseFloat(TotlataxAmoutn) + parseFloat(taxAmoutn);
                updateCombineTax(taxPercent, taxAmoutn, prdHSN);
            }

        });
        $(".taxSummary").append('</tbody>');
    }

    function updateCombineTax(taxPercent, taxAmoutn, prdHSN) {

        var gstintpercent = Math.floor(taxPercent);
        var stateId = $("input.stateid").val();
        var gstCategory = $("input.gst_category").val();

        if (typeof stateId == 'undefined') {
            var vatListHtml = `<tr><td>` + prdHSN + `</td><td>` + taxPercent / 2 + `</td><td>` + taxAmoutn / 2 + `</td><td>` + taxPercent / 2 + `</td><td>` + taxAmoutn / 2 + `</td></tr>`;
        } else {
            if (stateId != 22 || gstCategory == "SEZ") {
                var vatListHtml = `<tr><td>` + prdHSN + `</td><td>` + taxPercent + `</td><td>` + taxAmoutn + `</td></tr>`;
            } else {
                var vatListHtml = `<tr><td>` + prdHSN + `</td><td>` + taxPercent / 2 + `</td><td>` + taxAmoutn / 2 + `</td><td>` + taxPercent / 2 + `</td><td>` + taxAmoutn / 2 + `</td></tr>`;
            }

        }


        $(".taxSummary").append(vatListHtml);
    }



    //Total Balance Update 
    function totalBlock() {

        var totalBalance = 0;
        var vatBal = 0;
        var discountAmt = 0;
        var transportAmt = 0;
        var octria = 0;
        var totoalwithoutVat = 0;
        var grossTotal = 0;
        var totalgst = 0;

        var totalPrdamount = 0;

        $("#itemItreate tr").each(function(index) {

            var _thisTr = $(this);

            var rowTotal = _thisTr.find("input.rowtotal").val();
            var singelUnitPrice = _thisTr.find("input.unitprice").val();
            var rowTotalx = _thisTr.find("input.rowtotalx").val();
            var qty = _thisTr.find("input.qty").val();
            var gstAmount = _thisTr.find("input.vatAmountinput").val();

            if (rowTotal > 0) {
                totoalwithoutVat = totoalwithoutVat + parseFloat(rowTotalx);
                totalPrdamount = parseFloat(totalPrdamount) + parseFloat(rowTotal);
                grossTotal = parseFloat(grossTotal) + parseFloat(rowTotalx);
                totalgst = parseFloat(totalgst) + parseFloat(gstAmount);
            }
        });


        var vatAmount = totalPrdamount - totoalwithoutVat;

        /*       var discountAmount = $(".discountAmount").val();*/

        /*   var octria = $(".octria").val();*/

        totalBalance = (parseFloat(totalPrdamount));


        $("strong.withouttax").empty();
        $("strong.withtax").empty();

        /*       $("strong.withouttax").append( totoalwithoutVat.toFixed(2) + " Rs");
             $("strong.withtax").append( totalPrdamount.toFixed(2) + " Rs");*/

        $("input.withouttax").val(totoalwithoutVat.toFixed(2));
        $("input.withtax").val(totalPrdamount.toFixed(2));

        $("input.finalTotal").val();
        $("input.finalTotal").val(totalBalance.toFixed(2));

        $("input.orderFinal").val(totalBalance.toFixed(2));

        //$("input.vat").val( vatAmount.toFixed(2));

        $("input.totalgst").val(totalgst.toFixed(2));

        /*        
                $("strong.finalTotalwithoutTax").empty();
             $("strong.finalTotalwithoutTax").append( grossTotal.toFixed(2));*/

        var routAmount = $("input.roundfinalTotal").val();
        var sign = $("#signRound").val();

        if (sign == 1) {
            var grandTotla = totalBalance + parseFloat(routAmount);

        } else {
            var grandTotla = totalBalance - parseFloat(routAmount);
        }

        $("input.finalOrderPrice").val();
        $("input.finalOrderPrice").val(grandTotla.toFixed(2));
        //In word 

        var inword = toWords(grandTotla.toFixed(2));

        $("strong.word").empty();
        $("strong.word").append(inword);
        $("input.word").val(inword);
    }




    //Product Chnage Event      
    function performaActions() {



        //Qty Chnage 
        $(".qty").change(function() {
            var qtyChnage = $(this).val();
            var _thisTr = $(this).closest('tr');


            var unitPrice = _thisTr.find("input.unitprice").val();



            var lessDiscount = _thisTr.find('input.lessdiscount').val();


            //Default Price

            var discountedSingleUinitPrice = (parseFloat(unitPrice) * parseFloat(lessDiscount)) / 100;

            var discountedPrice = parseFloat(unitPrice) - parseFloat(discountedSingleUinitPrice);

            var price = parseFloat(qtyChnage) * parseFloat(discountedPrice);

            var taxPercent = _thisTr.find("input.vatinput").val()
            var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
            var total = parseFloat(taxAmoutn) + parseFloat(price);



            //Tax

            _thisTr.find(".gst").html("GST : " + taxPercent + "%" + " <br>Tax amount: " + taxAmoutn.toFixed(2));




            _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));


            //Total 

            _thisTr.find(".rowtotal").val(total.toFixed(2));
            _thisTr.find(".rowtotalx").val(price.toFixed(2));

            //Total
            summaryVatBlock();
            totalBlock();

        });

        $(".lessdiscount").change(function() {
            var lessdiscountchange = $(this).val();

            var _thisTr = $(this).closest('tr');

            var qty = _thisTr.find("input.qty").val();
            var unitPrice = _thisTr.find("input.unitprice").val();

            var taxAbleAmmount = parseFloat(qty) * parseFloat(unitPrice);

            var discountedAmmount = (parseFloat(taxAbleAmmount) * parseFloat(lessdiscountchange)) / 100;

            //Default Price

            var price = parseFloat(taxAbleAmmount) - parseFloat(discountedAmmount);

            var taxPercent = _thisTr.find("input.vatinput").val()
            var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
            var total = parseFloat(taxAmoutn) + parseFloat(price);


            //Tax
            _thisTr.find(".gst").html("GST : " + taxPercent + "%" + " <br>Tax amount: " + taxAmoutn.toFixed(2));


            _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));
            //Total 
            _thisTr.find(".rowtotal").val(total.toFixed(2));
            _thisTr.find(".rowtotalx").val(price.toFixed(2));

            //Total
            summaryVatBlock();
            totalBlock();

        });


        $(".unitprice").change(function() {
            var unitPrice = $(this).val();
            var _thisTr = $(this).closest('tr');


            var qtyChnage = _thisTr.find("input.qty").val();



            var lessDiscount = _thisTr.find('input.lessdiscount').val();


            //Default Price

            var discountedSingleUinitPrice = (parseFloat(unitPrice) * parseFloat(lessDiscount)) / 100;

            var discountedPrice = parseFloat(unitPrice) - parseFloat(discountedSingleUinitPrice);

            var price = parseFloat(qtyChnage) * parseFloat(discountedPrice);

            var taxPercent = _thisTr.find("input.vatinput").val()
            var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
            var total = parseFloat(taxAmoutn) + parseFloat(price);



            //Tax
            _thisTr.find(".gst").html("GST : " + taxPercent + "%" + " <br>Tax amount: " + taxAmoutn.toFixed(2));



            _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));


            //Total 

            _thisTr.find(".rowtotal").val(total.toFixed(2));
            _thisTr.find(".rowtotalx").val(price.toFixed(2));

            //Total
            summaryVatBlock();
            totalBlock();

        });





    }

    performaActions();


    /////////////////////////Chnage Function ==================    
    //Order Place=======================================================
    $('.generate_invoice').click(function() {
        $('.action_path').val('purchase/ajax_add_invoice');
        $('#addOrder').submit();
    })
    $('.update_btn').click(function() {
        $('.action_path').val('purchase/ajax_update_purchase_order');
    })

    $("#addOrder").on('submit', (function(e) {
        e.preventDefault();

        $("#addOrder .spineer").show();
        var action_path = $('.action_path').val()
        jQuery.ajax({
            url: url + action_path,
            type: "POST",
            data: new FormData(this),
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false

            //ContentType:"application/json",
            async: false,
            success: function(response) {

                var data = $.parseJSON(response);
                var status = data.status;
                var msg = data.msg;

                $(".spineer").hide();

                if (status == 0) {

                    var errors = data.errors;

                    var errorhtml = "";

                    var counter = 1;

                    if (typeof(errors.client) != "undefined" && errors.client !== null) {

                        errorhtml += "<p> " + counter + ". " + errors.client + "</p>";
                        counter = counter + 1;
                    }

                    if (typeof(errors.prdCheck) != "undefined" && errors.prdCheck !== null) {

                        errorhtml += "<p> " + counter + ". " + errors.prdCheck + "</p>";
                        counter = counter + 1;
                    }

                    if (typeof(errors.ServerCatExist) != "undefined" && errors.ServerCatExist !== null) {

                        errorhtml += "<p> " + counter + ". " + errors.ServerCatExist + "</p>";
                        counter = counter + 1;
                    }

                    $("#addOrder .error_msg").empty();
                    $("#addOrder .error_msg").html(errorhtml);
                    $('#addOrder .success_msg').hide();
                    $('#addOrder .error_msg').show();



                }


                if (status == 1) {

                    $("#addOrder .error_msg").hide();
                    $("#addOrder .success_msg").text(msg);
                    $("#addOrder .success_msg").show();
                    if (action_path == 'purchase/ajax_add_invoice') {
                        window.location.href = url + "purchase_invoice";
                    } else {
                        window.location.href = url + "purchase";
                    }

                }



            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });

    }));



    $("#signRound").change(function() {

        var ordeFinal = $("input.finalTotal").val();

        var routAmount = $("input.roundfinalTotal").val();
        var sign = $("#signRound").val();

        if (sign == 1) {
            var grandTotla = parseFloat(ordeFinal) + parseFloat(routAmount);

        } else {
            var grandTotla = parseFloat(ordeFinal) - parseFloat(routAmount);
        }

        $("input.finalOrderPrice").val("");
        $("input.finalOrderPrice").val(grandTotla);

        var inword = toWords(grandTotla);

        $("strong.word").empty();
        $("strong.word").append(inword);
        $("input.word").val(inword);
    });


    $(".roundfinalTotal").change(function() {

        var ordeFinal = $("input.finalTotal").val();


        var routAmount = $("input.roundfinalTotal").val();
        var sign = $("#signRound").val();

        if (sign == 1) {
            var grandTotla = parseFloat(ordeFinal) + parseFloat(routAmount);

        } else {
            var grandTotla = parseFloat(ordeFinal) - parseFloat(routAmount);
        }

        $("input.finalOrderPrice").val("");
        $("input.finalOrderPrice").val(grandTotla);

        var inword = toWords(grandTotla);


        $("strong.word").empty();
        $("strong.word").append(inword);
        $("input.word").val(inword);
    });









    function toWords(mydigit) {

        mydigit = mydigit.toString();
        var splitDigit = mydigit.split('.');





        if (typeof(splitDigit[0]) != "undefined" && splitDigit[0] !== null) {
            var x = splitDigit[0];
        } else {
            var x = mydigit;
        }





        var r = 0;
        var txter = x;
        var sizer = txter.length;
        var numStr = "";
        if (isNaN(txter)) {
            alert(" Invalid number");
            exit();
        }
        var n = parseInt(x);
        var places = 0;
        var str = "";
        var entry = 0;
        while (n >= 1) {
            r = parseInt(n % 10);

            if (places < 3 && entry == 0) {
                numStr = txter.substring(txter.length - 0, txter.length - 3) // Checks for 1 to 999.
                str = onlyDigit(numStr); //Calls function for last 3 digits of the value.
                entry = 1;
            }

            if (places == 3) {
                numStr = txter.substring(txter.length - 5, txter.length - 3)
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Thousand " + str;
                }
            }

            if (places == 5) {
                numStr = txter.substring(txter.length - 7, txter.length - 5) //Substring for 5 place to 7 place of the string
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Lakhs " + str; //Appends the word lakhs to it
                }
            }

            if (places == 6) {
                numStr = txter.substring(txter.length - 9, txter.length - 7) //Substring for 7 place to 8 place of the string
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Crores " + str; //Appends the word Crores
                }
            }

            n = parseInt(n / 10);
            places++;


        }

        var finalword = str;


        if (typeof(splitDigit[1]) != "undefined") {
            //alert(splitDigit[1]);

            var point = splitDigit[1];
            var pointdigit = other(point);
            var finalword = str + " point " + pointdigit + " only";
        }

        /*
        if(typeof(splitDigit[1] != "undefined" && splitDigit[1] !== null) ) {
         var point   =    splitDigit[1] ;
         var pointdigit = other(point );
         
         var finalword = str  + " point " + pointdigit + " only" ;
         
         
        }
        */

        return finalword;


    }

    function other(x) {
        var r = 0;
        var txter = x;
        var sizer = txter.length;
        var numStr = "";
        if (isNaN(txter)) {
            alert(" Invalid number");
            exit();
        }
        var n = parseInt(x);
        var places = 0;
        var str = "";
        var entry = 0;
        while (n >= 1) {
            r = parseInt(n % 10);

            if (places < 3 && entry == 0) {
                numStr = txter.substring(txter.length - 0, txter.length - 3) // Checks for 1 to 999.
                str = onlyDigit(numStr); //Calls function for last 3 digits of the value.
                entry = 1;
            }

            if (places == 3) {
                numStr = txter.substring(txter.length - 5, txter.length - 3)
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Thousand " + str;
                }
            }

            if (places == 5) {
                numStr = txter.substring(txter.length - 7, txter.length - 5) //Substring for 5 place to 7 place of the string
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Lakhs " + str; //Appends the word lakhs to it
                }
            }

            if (places == 6) {
                numStr = txter.substring(txter.length - 9, txter.length - 7) //Substring for 7 place to 8 place of the string
                if (numStr != "") {
                    str = onlyDigit(numStr) + " Crores " + str; //Appends the word Crores
                }
            }

            n = parseInt(n / 10);
            places++;


        }


        return str;

    }




    function onlyDigit(n) {
        //Arrays to store the string equivalent of the number to convert in words
        var units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
        var randomer = ['', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
        var tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
        var r = 0;
        var num = parseInt(n);
        var str = "";
        var pl = "";
        var tenser = "";
        while (num >= 1) {
            r = parseInt(num % 10);
            tenser = r + tenser;
            if (tenser <= 19 && tenser > 10) //Logic for 10 to 19 numbers
            {
                str = randomer[tenser - 10];
            } else {
                if (pl == 0) //If units place then call units array.
                {
                    str = units[r];
                } else if (pl == 1) //If tens place then call tens array.
                {
                    str = tens[r] + " " + str;
                }
            }
            if (pl == 2) //If hundreds place then call units array.
            {
                str = units[r] + " Hundred " + str;
            }

            num = parseInt(num / 10);
            pl++;
        }
        return str;
    }
</script>