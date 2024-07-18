<?php $this->load->view('Admin/includes/n-header'); ?>
<div class="content-wrapper">
    <?php 
        $quotation_id = $_REQUEST['qid']; 

        $data = $this->db->get("tbl_web_logo")->row();
        if ($data->logo_name_two != '') {
            $file = '<img class="black-logo" src="'.base_url().'assets/images/web_images/'.$data->logo_name_two.'">';
        }else{
            $file = '';
        }

        if ($organisationData->q_printing_title != '') {
            $quotation_name = $organisationData->q_printing_title;
        } else {
            $quotation_name = '';
        }
    ?>
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header header-elements-sm-inline py-sm-0 blue-color-card ">
                        <span class="span-py-10 white-text">Quotation</span>
                        <a href="<?= base_url("admin/Leads/QuotationPdf?qid=$quotation_id") ?>" target="_blank"><i class="icon-file-plus text-primary"><span class="left-padding">Download Quotation</span></i></a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <h4><?= $org_array->org_cname ?></h4>
                                    <ul class="list list-unstyled mb-0">
                                        <li><?= $org_array->org_address ?></li>
                                        <li>Email ID : <?= $org_array->org_email ?></li>
                                        <li>Contact No : <?= $org_array->org_contact ?></li>
                                        <li>Website : <?= $org_array->org_web_url ?></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <div class="text-sm-right">
                                        <?= $file ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1">
                            <span>Quotation</span>
                        </p>
                        <div class="d-lg-flex flex-lg-wrap">
                            <div class="mb-4 mb-lg-2">
                                <ul class="list list-unstyled mb-0">

                                    <li> To :</li>
                                    <li><?= $quotation_array['company_name']; ?>,</li>
                                    <li><?= $quotation_array['company_address']; ?> <?= $city = ($quotation_array['city'] != '') ? ',' . $quotation_array['city'] : ''; ?></li>
                                    <li><?= $quotation_array['email']; ?></li>
                                    <li><?= $quotation_array['phone_no']; ?></li>
                                </ul>
                            </div>

                            <div class="mb-2 ml-auto">
                                <ul class="list list-unstyled text-right mb-0 ml-auto">

                                    <li>Quotation No. : <span class="font-weight-semibold"><?= $quotation_array['quotation_number']; ?></span></li>
                                    <li>Quotation Date : <span class="font-weight-semibold"><?= $quotation_array['quotation_date']; ?></span></li>
                                    <li>Due Date : <span class="font-weight-semibold"><?= $quotation_array['valid_till']; ?></span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if ($quotation_array['quto_subject'] != '') { ?>
                        <div class="row">
                            <div class="form-group col-sm-12 d-flex text-center">
                                <div class="col-lg-12">
                                    <span class="font-weight-semibold">Subject: </span>
                                    <span><?= $quotation_array['quto_subject']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php   }   ?>
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead class="border-style">
                                <tr>
                                    <th class="border">#</th>
                                    <th class="border">PARTICULARS</th>
                                    <th class="border">PRODUCT CODE</th>
                                    <th class="border">QTY</th>
                                    <th class="border">RATE</th>
                                    <th class="border">GROSS AMOUNT</th>
                                    <th class="border">CGST</th>
                                    <th class="border">SGST</th>
                                    <th class="border">NET AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;

                                $cgstvalue = 0;
                                $sgstvalue = 0;
                                $subtotal = 0;
                                $grossamt_total = 0;
                                foreach ($quotation_product_array as $row) {
                                    $cgstvalue = $cgstvalue + $row->cgstvalue;
                                    $sgstvalue = $sgstvalue + $row->sgstvalue;
                                    $subtotal = $subtotal + $row->subtotal;
                                    $gross_amt = $row->quantity * $row->price;
                                    $grossamt_total = $grossamt_total + $gross_amt;

                                ?>
                                    <tr>
                                        <td class="border" ><?= $cnt; ?></td>
                                        <td class="border" style="width: 35%;">
                                            <h6 class="no-margin" style="font-weight: 650;"><?= $row->prdsrv_name; ?></h6>
                                            <small><?= $row->desctiption; ?></small>
                                        </td>
                                        <td class="border" style="width: 12%;"><?= $row->product_code; ?></td>
                                        <td class="border" ><?= $row->quantity; ?></td>
                                        <td class="border text-right">&#x20B9 <?= $row->price; ?></td>
                                        <td class="border text-right">&#x20B9 <?= $row->quantity * $row->price; ?></td>
                                        <td class="border text-right">&#x20B9 <?= $row->cgst; ?></td>
                                        <td class="border text-right">&#x20B9 <?= $row->sgst; ?></td>
                                        <td class="border text-right">&#x20B9 <?= $row->subtotal; ?></td>
                                    </tr>

                                <?php
                                    $cnt++;
                                }
                                $final_total = $subtotal + $cgstvalue + $sgstvalue;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr class="bottom-border">
                                    <td class="border" colspan="5">&nbsp;</td>
                                    <td class="border text-right">&#x20B9 <?= $grossamt_total; ?></td>
                                    <td class="border text-right">&#x20B9 <?= $cgstvalue; ?></td>
                                    <td class="border text-right">&#x20B9 <?= $sgstvalue; ?></td>
                                    <td class="border text-right">&#x20B9 <?= $subtotal; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-body no-padding-bottom">
                        <div class="row invoice-payment">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <?php
                                    $number = $final_total;
                                    $no = round($final_total);
                                    $point = round($number - $no, 2) * 100;
                                    $hundred = null;
                                    $digits_1 = strlen($no);
                                    $i = 0;
                                    $str = array();
                                    $words = array('0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fourteen', '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty', '40' => 'forty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninety');
                                    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                                    while ($i < $digits_1) {
                                        $divider = ($i == 2) ? 10 : 100;
                                        $number = floor($no % $divider);
                                        $no = floor($no / $divider);
                                        $i += ($divider == 10) ? 1 : 2;
                                        if ($number) {
                                            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                            $str[] = ($number < 21) ? $words[$number] .
                                                " " . $digits[$counter] . $plural . " " . $hundred
                                                :
                                                $words[floor($number / 10) * 10]
                                                . " " . $words[$number % 10] . " "
                                                . $digits[$counter] . $plural . " " . $hundred;
                                        } else $str[] = null;
                                    }
                                    $str = array_reverse($str);
                                    $in_result = implode('', $str);
                                    $points = ($point) ?
                                        "." . $words[$point / 10] . " " .
                                        $words[$point = $point % 10] : '';
                                    $in_result . "Rupees  " . $points . " Paise";



                                    $terms_conditions = $quotation_array['terms_conditions'];
                                    $termsarray = explode("$^", $terms_conditions);


                                ?>
                                <table class="right" id="footerData">
                                    <tbody class="border-style">
                                        <tr class="bottom-border">
                                            <td class="left ml-1 border padding">Gross Value </td>
                                            <td class="text-right border padding"><b>&#x20B9 <?= number_format($grossamt_total, 2) ?></b></td>
                                        </tr>
                                        <?php if ($cgstvalue >= 1) { ?>
                                            <tr class="bottom-border">
                                                <td class="left border padding">GST Value</td>
                                                <td class="text-right border padding"><b>&#x20B9 <?= $cgstvalue; ?></b></td>
                                            </tr>
                                        <?php   }   ?>
                                        <?php if ($cgstvalue >= 1) { ?>
                                            <tr class="bottom-border">
                                                <td class="left border padding">SGST Value</td>
                                                <td class="text-right border padding"><b>&#x20B9 <?= $sgstvalue; ?></b></td>
                                            </tr>
                                        <?php   }   ?>
                                        <tr class="bottom-border">
                                            <td class="left border padding">NET Value</td>
                                            <td class="text-right border padding"><b>&#x20B9 <?= number_format($final_total, 2) ?></td>
                                        </tr>
                                        <tr class="bottom-border">
                                            <td class="left border padding">Amount in Words </td>
                                            <td class="right border padding">
                                                <div style="text-align: end;">
                                                    <b><?= 'Rupees ' . ucwords($in_result) . ' Only'; ?></b>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                <div> <?= $quotation_array['section_content']; ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Admin/includes/n-footer'); ?>
    