<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<?php
foreach ($quotation_details as  $row5) {
  $quotation_date_edit = date("d F Y", strtotime($row5->quotation_date));
?>
  <form class="form-vertical" id="edit_quotation_form" method="post">
    <input type="hidden" name="edit_quotation_id" value="<?= $row5->quotation_id; ?>">
    <input type="hidden" name="leadopp_id" value="<?= $row5->leadopp_id; ?>">

    <div class="row">
      <div class="col-md-12">
      <fieldset class="form-filedset email">
        <legend class="field bulk-email">Basic Info</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Customer Name  </label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="cust_company_name" value="<?= $cust_details->company_name; ?>" readonly>
                  <!-- <span id="cust_company_name"><?= $cust_details->company_name; ?></span> -->
                </div>
              </div>
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Contact Number  <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="quotation_contact_phone_no" name="contact_number" placeholder="Enter Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' maxlength="15" value="<?= $row5->contact_number; ?>" readonly>
                </div>
              </div>
              
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Email ID  <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="quotation_contact_email" name="email" placeholder="Enter Email" maxlength="40" value="<?= $row5->email; ?>" readonly>
                </div>
              </div>
              
            </div>

            <div class="col-md-6">
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Quotation Number  <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="quotation_number" placeholder="Enter Quotation Number" maxlength="100" value="<?= $row5->quotation_number; ?>" readonly>
                </div>
              </div>
              
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Quotation Date  <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control add-activity-selectors rounded-right" name="quotation_date" id="edit_quotation_date" placeholder="Enter Quotation Date" value="<?= date('d F, Y', strtotime($quotation_date_edit)); ?>">
                </div>
              </div>
              
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Contact Person <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="quotation_contact_person" name="contact_person" placeholder="Enter Contact Person" maxlength="50" value="<?= $row5->contact_person; ?>" readonly>
                </div>
              </div>
              
              <div class="form-group d-flex mb-0">
                <label class="control-label col-lg-4 m-auto">Validity  <sup style="color: red">*</sup></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="validity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Validity" maxlength="2" value="<?= $row5->validity; ?>">
                </div>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset class="form-filedset email">
          <legend class="field bulk-email">Quotation Subject</legend>
            <div class="form-group">
              <div class="col-lg-12">
                <textarea name="quto_subject" id="quto_subject" class="form-control" rows="3" placeholder="Enter Quotation Subject"><?= $row5->quto_subject; ?></textarea>   
              </div>
            </div>
        </fieldset>
        <fieldset class="form-filedset email">
        <!-- <i class="fa fa-life-ring position-left"></i> -->
          <legend class="field bulk-email"> Product Details </legend>
          <!-- <button class="btn btn-success  float-right" type="button" onclick="edit_add_product_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button> -->
          <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2">
                    <b class="text-center">Select Product</b> <sup style="color: red">*</sup>
                  </div>

                  <div class="col-md-2 nopadding">
                    <b class="text-center">Product Code</b>
                  </div>
                  <div class="col-md-1 nopadding">
                    <b class="text-center">Price</b>
                  </div>
                  <div class="col-md-1 nopadding">
                    <b class="text-center">Quantity</b> <sup style="color: red">*</sup>
                  </div>
                  <div class="col-md-2 nopadding">
                    <b class="text-center">Discount in %-Flat</b>
                  </div>
                  

                  <div class="col-md-1 nopadding">
                    <b class="text-center">CGST %</b>
                  </div>

                  <div class="col-md-1 nopadding">
                    <b class="text-center">SGST %</b>
                  </div>

                  <div class="col-md-2 nopadding">
                    <b class="text-center">Total</b>
                  </div>
                  <div class="clear"></div>
                </div>
              <?php
                $prdct_cnt = 0;
                foreach ($quotation_product_details as  $row6) {
              ?>
                <div class="row removeclass321<?= $prdct_cnt; ?>" style="margin-top: 1%;">
                  <input type="hidden" name="cgstvalue[]" id="cgstvalue2_<?= $prdct_cnt; ?>" value="<?= $row6->cgstvalue ?>" readonly />
                  <input type="hidden" name="sgstvalue[]" id="sgstvalue2_<?= $prdct_cnt; ?>" value="<?= $row6->sgstvalue ?>" readonly />
                  <input type="hidden" name="subtotal[]" id="subtotal2_<?= $prdct_cnt; ?>" value="<?= $row6->subtotal ?>" readonly />

                  <div class="col-md-2">
                    <div class="form-group">
                      <select class="form-control editQuotation" name="productid[]" onchange="get_product_details2(this.id)" id="productid_7<?= $prdct_cnt; ?>" data-placeholder="Select Product">
                        <option value="">Select Product </option>
                        <?php
                        foreach ($product_list as  $row2) {
                        ?>
                          <option value="<?= $row2->prd_srv_id; ?>" <?php if ($row6->product_id == $row2->prd_srv_id) {
                                                                      echo 'selected';
                                                                    } ?>>
                            <?= $row2->prdsrv_name; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="productcode[]" placeholder="Product Code" id="productcode2_<?= $prdct_cnt; ?>" value="<?= $row6->product_code ?>" readonly />
                    </div>
                  </div>

                  <div class="col-md-1 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="quantity[]" placeholder="Enter Quantity" id="quantity2_<?= $prdct_cnt; ?>" value="<?= $row6->quantity ?>" onkeyup="calculate_total2(this.id)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                    </div>
                  </div>

                  <div class="col-md-1 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="price[]" id="productprice2_<?= $prdct_cnt; ?>" placeholder="Price" value="<?= $row6->price ?>" />
                    </div>
                  </div>

                  <div class="col-md-2 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="discount[]" id="discount2_<?= $prdct_cnt; ?>" placeholder="Discount in %-Flat" onkeyup="calculate_discount2(this.id)" value="<?= $row6->discount ?>" />
                    </div>
                  </div>

                  <div class="col-md-1 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="cgst[]" id="cgst2_<?= $prdct_cnt; ?>" placeholder="CGST %" value="<?= $row6->cgst ?>" readonly />
                    </div>
                  </div>

                  <div class="col-md-1 nopadding">
                    <div class="form-group">
                      <input type="text" class="form-control" name="sgst[]" id="sgst2_<?= $prdct_cnt; ?>" placeholder="SGST  %" value="<?= $row6->sgst ?>" readonly />
                    </div>
                  </div>

                  <div class="col-md-2 nopadding">
                    <div class="form-group">
                      <div class="input-group">
                        <input class="form-control" name="total[]" type="text" id="total2_<?= $prdct_cnt; ?>" placeholder="Total" value="<?= $row6->total ?>">
                        <div class="input-group-btn">
                          <!-- <button class="btn btn-danger rmv-border-left" type="button" onclick="edit_remove_product_fields(this.id);" id="<?= $prdct_cnt; ?>"> <span class="fa fa-minus" aria-hidden="true"></span> </button> -->
                          <button class="btn btn-success  float-right" type="button" onclick="edit_add_product_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
                <!-- <div class="row"> -->
                  <div class="col-sm-12 p-0">
                    <textarea class="form-control" name="desctiption[]" id="desctiption2_<?= $prdct_cnt; ?>" rows="2" maxlength="250" placeholder="Enter desctiption"><?= $row6->desctiption; ?></textarea>
                  </div>
                <!-- </div> -->
              <?php $prdct_cnt++;
              } ?>
            </div>
            <div class="col-md-12">
              <div id="edit_product_education_fields"></div>
            </div>
          </div>
        </fieldset>

        <fieldset class="form-filedset email" >
          <legend class="field bulk-email">
            Section
          </legend>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" style="display:flex;">
                <label class="col-md-2" style="flex: 0 0 12.66667%;max-width: 12.66667%;">Select Section  <sup style="color: red">*</sup></label>
                  <select class="select-search form-control col-md-10" name="section_id_edit" id="section_id_edit" onchange="get_section(this.value)" data-placeholder="Select Section">
                      <option value="">Select Section</option>
                      <?php foreach ($getAllSection as  $row6) {  ?>
                        <option value="<?= $row6->section_id; ?>" <?php if ($row6->section_id == $row5->section_id) { echo 'selected'; } ?>>
                        <?= $row6->section_name; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>
            <div class="col-md-12">
              <div id="edit_section_data">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <textarea class="form-control" name="section_content" id="section_content_edit" rows="3"><?= $row5->section_content; ?></textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          
        </fieldset>
        <div class="form-group" style="text-align:right;">
          <div class="col-sm-offset-3 col-sm-12">
            <button type="submit" class="btn btn-primary pull-right" style="margin-right:10px;">Update <i class="icon-arrow-right14 position-right"></i></button>
            <span id="preview_quotation_edit"></span>
          </div>
        </div>
        <br /><br />
      </div>
    </div>
  </form>

<?php } ?>

<script>
  var max = new Date();
        $('#edit_quotation_date').pickadate({
            selectYears: 100,
            selectMonths: true,
            min: max,
        });
</script>

<!-- <script type="text/javascript">
  $(function() {
    $('#edit_quotation_date').datetimepicker({
      format: 'DD MMMM, YYYY',
      maxDate: 'now',
      useCurrent: true
    });
  });
</script> -->


<script type="text/javascript">
  /*function get_terms_list2(termsfor) {
    var datastring = 'termsfor=' + termsfor;
    // alert(datastring);
    $.ajax({
      url: '<?php echo base_url('admin/Leads/get_terms_list') ?>',
      type: "POST",
      data: datastring,
      success: function(data) {
        // alert(data);
        $("#edit_termslist").html(data);
        // $("#add_term_button").show();

      },
      error: function() {
        alert('fail');
      }
    });
  } */
  function get_section(section_id) {
    var datastring = 'section_id=' + section_id;
    $.ajax({
      url: '<?php echo base_url('admin/Leads/get_section') ?>',
      type: "POST",
      data: datastring,
      success: function(data) {
        
        $('#edit_section_data').html(data);
        $('#section_content_edit').summernote();
      },
      error: function() {
        alert('fail');
      }
    });
  }
  $(document).ready(function(){
    $('#section_content_edit').summernote();
  });
  //------------------------------------------------------------------------  
  var edit_room_term = 6431;

  function edit_add_product_fields() {
    edit_room_term++;
    var objTo = document.getElementById('edit_product_education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass321" + edit_room_term);
    var rdiv = 'removeclass321' + edit_room_term;
    divtest.innerHTML = '<div class="row" style="margin-top:1%"><input  type="hidden"  name="cgstvalue[]"  id="cgstvalue2_' + edit_room_term + '"  readonly /><input  type="hidden" name="sgstvalue[]" readonly  id="sgstvalue2_' + edit_room_term + '" /><input  type="hidden" name="subtotal[]"  id="subtotal2_' + edit_room_term + '" readonly  /> <div class="col-md-2 nopadding"><div class="form-group"> <select class="form-control editQuotation" data-placeholder="Select Product"  name="productid[]"  onchange="get_product_details2(this.id)" id="productid_7' + edit_room_term + '"><option value=""> Select Product</option><?php foreach ($product_list as  $row2) { ?><option value="<?= $row2->prd_srv_id; ?>"><?= $row2->prdsrv_name; ?></option><?php } ?></select> </div></div>  <div class="col-md-2 nopadding"><div class="form-group"><input  type="text" class="form-control" name="productcode[]"   placeholder="Product Code"  id="productcode2_' + edit_room_term + '" readonly  /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="quantity[]" placeholder="Quantity" onkeyup="calculate_total2(this.id)" id="quantity2_' + edit_room_term + '"   /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="price[]"  id="productprice2_' + edit_room_term + '"  placeholder="Price"  /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><input type="text" class="form-control" name="discount[]" id="discount2_' + edit_room_term + '" placeholder="Discount in %-Flat" onkeyup="calculate_discount2(this.id)" /></div></div>  <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="cgst[]"  id="cgst2_' + edit_room_term + '"   placeholder="CGST  %"  readonly /></div></div> <div class="col-md-1 nopadding"><div class="form-group"><input  type="text" class="form-control" name="sgst[]"  id="sgst2_' + edit_room_term + '" placeholder="SGST  %"  readonly /></div></div> <div class="col-md-2 nopadding"><div class="form-group"><div class="input-group"> <input class="form-control" name="total[]" placeholder="Total" type="text"  id="total2_' + edit_room_term + '"  >  <div class="input-group-btn"> <button class="btn btn-danger rmv-border-left" type="button" onclick="edit_remove_product_fields(' + edit_room_term + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div><div class="col-sm-12" style="padding: 0px 6px 0px 10px;margin-top:1%" ><textarea class="form-control" name="desctiption[]" id="desctiption2_' + edit_room_term + '" rows="2" maxlength="250" placeholder="Enter desctiption"></textarea></div></div>';
    objTo.appendChild(divtest)

    $('.editQuotation').select2({
        dropdownParent: $('#edit_quotation_modal')
    });
  }

  function edit_remove_product_fields(rid) {
    // alert(rid);
    $('.removeclass321' + rid).remove();
  }


  function get_product_details2(id) {
    var productid = $("#" + id).val();
    var myStringArray = id.split('_');
    var index = myStringArray[1];
    var datastring = 'productid=' + productid;
    // alert(datastring);
    $.ajax({
      url: '<?= base_url('admin/Leads/get_product_details') ?>',
      type: "POST",
      data: datastring,
      success: function(data) {
        var json = $.trim(data);
        // alert(json);
        const obj = JSON.parse(json);
        // alert(obj.price);
        $("#productcode2_" + index).val(obj.product_code);
        $("#sgst2_" + index).val(obj.sgst_tax);
        $("#cgst2_" + index).val(obj.cgst_tax);
        $("#productprice2_" + index).val(obj.price);
        $("#desctiption2_" + index).val(obj.prdsrv_description);
      },
      error: function() {
        alert('fail');
      }
    });
  }

  function calculate_discount2(id) {
    var discount = $("#" + id).val();
    var myStringArray = id.split('_');
    var index = myStringArray[1];
    var purchaserate = $("#productprice2_" + index).val();
    var quantity = $("#quantity2_" + index).val();
    // console.log(discount);
    if (discount != '') {
      if (discount.includes("%") == true) {
        var discountNumber = removePer(discount);
        var discount_value = (purchaserate * discountNumber / 100);
        var preTotal = purchaserate - discount_value;
        var total = quantity * preTotal;
      } else {
        // var preTotal = purchaserate - discount;
        var total = quantity * purchaserate - discount;
      }
    } else {
      var total = quantity * purchaserate;
    }
    // console.log(total);
    var cgst = $("#cgst2_" + index).val();
    var sgst = $("#sgst2_" + index).val();
    var cgst_value = (total * cgst / 100);
    var sgst_value = (total * sgst / 100);
    var final_total = cgst_value + sgst_value + total;

    $("#cgstvalue2_" + index).val(cgst_value);
    $("#sgstvalue2_" + index).val(sgst_value);
    $("#subtotal2_" + index).val(total);
    $("#total2_" + index).val(final_total);
  }

  function calculate_total2(id) {
    var quantity = $("#" + id).val();
    var myStringArray = id.split('_');
    var index = myStringArray[1];
    var purchaserate = $("#productprice2_" + index).val();
    var discount = $("#discount2_" + index).val();
    // console.log(discount);
    if (discount != '') {
      if (discount.includes("%") == true) {
        var discountNumber = removePer(discount);
        var discount_value = (purchaserate * discountNumber / 100);
        var preTotal = purchaserate - discount_value;
        var total = quantity * preTotal;
      } else {
        // var preTotal = purchaserate - discount;
        var total = quantity * purchaserate - discount;
      }
    } else {
      var total = quantity * purchaserate;
    }
    // console.log(total);
    var cgst = $("#cgst2_" + index).val();
    var sgst = $("#sgst2_" + index).val();
    var cgst_value = (total * cgst / 100);
    var sgst_value = (total * sgst / 100);
    var final_total = cgst_value + sgst_value + total;

    $("#cgstvalue2_" + index).val(cgst_value);
    $("#sgstvalue2_" + index).val(sgst_value);
    $("#subtotal2_" + index).val(total);
    $("#total2_" + index).val(final_total);
  }
</script>



<script>
  $(document).ready(function() {
    brandvalidator = {
        row: '.col-md-3',
        validators: {
          notEmpty: {
            message: ' Product is required'
          }
        }
      },
      quantityvalidator = {
        row: '.col-md-3',
        validators: {
          notEmpty: {
            message: ' Quantity is required'
          }
        }
      },
      $('#edit_quotation_form')
      .bootstrapValidator({
        framework: 'bootstrap',
        icon: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
          'productid[]': brandvalidator,
          'quantity[]': quantityvalidator,
          quotation_number: {
            validators: {
              notEmpty: {
                message: 'Quotation Number is required'
              }
            }
          },
          quotation_date: {
            validators: {
              notEmpty: {
                message: 'Quotation date is required'
              }
            }
          },
          termsfor1: {
            validators: {
              notEmpty: {
                message: 'Select Term for is required'
              }
            }
          },

          email: {
            validators: {
              notEmpty: {
                message: 'Email is required.'
              },
              regexp: {
                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                message: 'Enter valid email address'
              }
            }
          },

          validity: {
            validators: {
              notEmpty: {
                message: 'Validity is required'
              }
            }
          }
        }
      })
      // Add button click handler
      .on('click', '.addButton', function() {})
      // Remove button click handler
      .on('click', '.removeButton', function() {});
  });
</script>

<script type="text/javascript">
  $(document).ready(function(e) {
    $("#edit_quotation_form").on('submit', (function(e) {
      //e.preventDefault();
      if (e.isDefaultPrevented()) {
        //alert('invalid');
      } else {
        $("#preview_quotation_edit").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:30px;width:30px;" alt="sending data...."/>');
        $("#preview_quotation").show();
        $.ajax({
          url: '<?php echo base_url('admin/Leads/UpldateQuotation') ?>',
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $("#preview_quotation_edit").hide();
            // new PNotify({
            //   title: 'Update Quotation',
            //   text: 'Quotation Updated Successfully',
            //   type: 'success'
            // });
            $("#UpdatesuccessModal").modal('show');
            // setTimeout(function() {
            //   window.location = "";
            // }, 1000);


          },
          error: function() {
            $("#updateErrorModal").modal('show');
          }
        });
      }
      return false;
    }));
  });
</script>
<script>
  // $('.editQuotation').select2({
  //       dropdownParent: $('#edit_quotation_modal')
  //   });
  //   $('#section_id_edit').select2({
  //       dropdownParent: $('#edit_quotation_modal')
  //   });

    $('body').on('shown.bs.modal', '#edit_quotation_modal', function() {
        $(this).find('.editQuotation').each(function() {
            $(this).select2({ dropdownParent: $('#edit_quotation_modal') });
        });

        $(this).find('#section_id_edit').each(function() {
            $(this).select2({ dropdownParent: $('#edit_quotation_modal') });
        });
    });
            
    $('#edit_quotation_modal').on('scroll', function (event) {
        $(this).find(".editQuotation").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });

        $(this).find("#section_id_edit").each(function () {
            $(this).select2({ dropdownParent: $(this).parent() });
        });
    });

    
</script>

<div class="modal fade" id="UpdatesuccessModal" tabindex="-1" aria-labelledby="UpdatesuccessModalLabel" data-keyboard="false" data-backdrop="static" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding: 30px;">
            <div class="modal-header" style="display: flex;align-items: center; justify-content: center;">
                <h5 class="modal-title" id="UpdatesuccessModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-circle-check" style="color: green;font-size: 55px;margin-bottom:15px;"></i>Updated</h5>
            </div>
        <div class="modal-body" style="font-size: 18px;text-align: center;">Quotation Updated Successfully</div>
            <div class="modal-footer" style="justify-content: center;">
                <!-- <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?>"> -->
                  <a onclick="javascript:window.location.reload()">
                    <button type="button" class="btn"  style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateErrorModal" tabindex="-1" aria-labelledby="updateErrorModalLabel" data-keyboard="false" data-backdrop="static" style="padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content" style="padding:30px;">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: center;">
                <h5 class="modal-title" id="updateErrorModalLabel" style="display: flex;flex-direction: column;text-align: center;font-size: 24px;"><i class="fa fa-bug" style="color: #f3d323;font-size: 55px;margin-bottom:15px;"></i>Error!!!</h5>
            </div>
            <div class="modal-body" style="font-size: 18px;text-align: center;">Fail</div>
            <div class="modal-footer" style="justify-content: center;">
                <a href="<?php echo base_url('admin/Leads/ViewDetails?leadopp_id='); ?>">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #1e6196;color: #fff;font-size: 16px;">Ok</button>
                </a>
            </div>
        </div>
    </div>
</div>

