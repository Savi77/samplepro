<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('Admin/includes/header'); ?>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrapValidator.css" />
    <link href="<?= base_url() ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/notify/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist1/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/ui/drilldown.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/components_popups.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/assets/js/pages/datatables_responsive.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>

    <style type="text/css">
        td {
            padding: 8px 20px !important;
        }

        .line-on-side {
            border-bottom: 1px solid #ddd !important;
            line-height: .1em !important;
            margin: 3px 0 15px !important;
        }

        .line-on-side span {
            background: #2196f3;
            padding: 3px 15px 3px 15px;
            color: white;
            font-size: 22px;
        }
        #quotData td, th{
            border: 0px solid #ddd;
            padding: 10px !important;
            padding-bottom: 0px !important;
            padding-top: 5px !important;
        }
    </style>


</head>

<body style="overflow-x: hidden;">
    <?php $this->load->view('Admin/includes/admin_header'); ?>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <i class="icon-arrow-left52 position-left"></i>
                    <a href="<?php echo base_url('admin/Dashboard/view_dashboard'); ?>"> <span class="text-semibold">Home</span></a> - QUOTATION
                </h4>
            </div>
            <div class="heading-elements">
            </div>
        </div>
    </div>

    <div class="page-container">
        <div class="page-content">
            <?php
                $this->load->view('Admin/includes/sidebar');
                $quotation_id = $_REQUEST['qid'];
            ?>
            <div class="content-wrapper">
                <!-- Invoice template -->
                <div class="panel panel-white" style="border: 2px solid #00aff0;">
                    <div class="panel-heading">
                        <h6 class="panel-title">QUOTATION</h6>
                        <div class="heading-elements">
                            <a href="<?= base_url("admin/Leads/QuotationPdf?qid=$quotation_id") ?>" target="_blank">
                                <button type="button" class="btn btn-primary btn-labeled"><b><i class="icon-file-download2"></i></b> Download Quotation</button>
                            </a>
                        </div>
                    </div>

                    <?php
                        $imgpath = base_url() . 'assets/images/Logo/logo_one.png';
                        $imgpath2 = base_url() . 'assets/images/Logo/logo_two.png';
                        $imgpath3 = base_url() . 'assets/images/Logo/logo_three.png';

                        $data = $this->db->get("tbl_web_logo")->row();
                        if ($data->logo_name_two != '') {
                            $file = base_url() . 'assets/images/web_images/' . $data->logo_name_two;
                        }

                        if ($organisationData->q_printing_title != '') {
                            $quotation_name = $organisationData->q_printing_title;
                        } else {
                            $quotation_name = '';
                        }
                    ?>

                    <div class="panel-body no-padding-bottom">
                        <div class="row">
                            <div class="col-md-6 content-group">
                                <div class="invoice-details1">
                                    <h5 class="text-uppercase text-semibold"><?= $org_array->org_cname ?></h5>
                                    <ul class="list-condensed list-unstyled col-sm-8" style="padding: 0;">
                                        <li><?= $org_array->org_address ?></li>
                                        <li>Email ID : <?= $org_array->org_email ?> </li>
                                        <li>Contact No : <span><?= $org_array->org_contact ?></span></li>
                                        <li>Website : <span><?= $org_array->org_web_url ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 content-group" style="text-align: end;">
                                <img src="<?= $file; ?>" class="content-group" style="height: 65px;margin-bottom: 8px !important;">
                            </div>
                        </div>
                        <p class="card-subtitle line-on-side text-muted text-center font-medium-1 mx-2 my-1">
                            <span><?= $quotation_name; ?></span>
                        </p>
                        <div class="row">
                            <div class="col-md-6 col-lg-9 content-group">
                                <span class="text-semibold">To :</span>
                                <ul class="list-condensed list-unstyled">
                                    <li><span class="text"><?= $quotation_array['company_name']; ?></span>,</li>
                                    <li><?= $quotation_array['company_address']; ?> <?= $city = ($quotation_array['city'] != '') ? ',' . $quotation_array['city'] : ''; ?> </li>
                                    <li><?= $quotation_array['email']; ?></li>
                                    <li><?= $quotation_array['phone_no']; ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 content-group">
                                <table id="quotData" style="width: 100%;">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <td align="right">Quotation No. :</td>
                                            <td align="left"><b><?= $quotation_array['quotation_number']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Quotation Date :</td>
                                            <td align="left"><b><?= $quotation_array['quotation_date']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Due Date :</td>
                                            <td align="left"><b><?= $quotation_array['valid_till']; ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if ($quotation_array['quto_subject'] != '') { ?>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-lg-1" style="font-size: 16px;font-weight: 500;"> <u>Subject:</u> </label>
                                    <div class="col-lg-10">
                                        <label class="control-label" style="font-size: 16px;"> <?= $quotation_array['quto_subject']; ?> </label>
                                    </div>
                                </div>
                            </div>
                        <?php   }   ?>
                    </div>

                    <style>
                        #invTable th,
                        #invTable td {
                            border: 1px solid #ddd;
                            padding: 12px;
                        }

                        .tb1 {
                            padding: 12px;
                            color: white;
                            background: #0363ab;
                        }

                        .tb2 {
                            padding: 12px;
                            color: white;
                            background: #00aef3;
                        }

                        td {
                            word-wrap: break-word;
                        }

                        td,
                        th {
                            border: 1px solid #ddd;
                            padding: 12px !important;
                        }

                       
                    </style>
                    <div class="table-responsive panel-body no-padding-bottom ">
                        <table class="table table-lg">
                            <thead id="invTable">
                                <tr>
                                    <th class="tb1">#</th>
                                    <th class="tb1">PARTICULARS</th>
                                    <th class="tb1">PRODUCT CODE</th>
                                    <th class="tb1">QTY</th>
                                    <th class="tb2">RATE</th>
                                    <th class="tb2">GROSS AMOUNT</th>
                                    <th class="tb2">CGST</th>
                                    <th class="tb2">SGST</th>
                                    <th class="tb2">NET AMOUNT</th>
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
                                        <td><?= $cnt; ?></td>
                                        <td style="width: 35%;">
                                            <h6 class="no-margin" style="font-weight: 650;"><?= $row->prdsrv_name; ?></h6>
                                            <small><?= $row->desctiption; ?></small>
                                        </td>
                                        <td style="width: 12%;"><?= $row->product_code; ?></td>
                                        <td><?= $row->quantity; ?></td>
                                        <td class="text-right">&#x20B9 <?= $row->price; ?></td>
                                        <td class="text-right">&#x20B9 <?= $row->quantity * $row->price; ?></td>
                                        <td class="text-right">&#x20B9 <?= $row->cgst; ?></td>
                                        <td class="text-right">&#x20B9 <?= $row->sgst; ?></td>
                                        <td class="text-right">&#x20B9 <?= $row->subtotal; ?></td>
                                    </tr>

                                <?php
                                    $cnt++;
                                }
                                $final_total = $subtotal + $cgstvalue + $sgstvalue;
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                    <td class="text-right">&#x20B9 <?= $grossamt_total; ?></td>
                                    <td class="text-right">&#x20B9 <?= $cgstvalue; ?></td>
                                    <td class="text-right">&#x20B9 <?= $sgstvalue; ?></td>
                                    <td class="text-right">&#x20B9 <?= $subtotal; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="panel-body no-padding-bottom" style="border-top: 0px;padding-top: 0px;">
                        <div class="row invoice-payment">
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
                            </div>
                            <div class="col-sm-6">
                                <table class="right" id="footerData" style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td class="left ml-1">Gross Value </td>
                                            <td class="text-right"><b>&#x20B9 <?= number_format($grossamt_total, 2) ?></b></td>
                                        </tr>
                                        <?php if ($cgstvalue >= 1) { ?>
                                            <tr>
                                                <td class="left" style="width: 32%;">GST Value</td>
                                                <td class="text-right"><b>&#x20B9 <?= number_format($cgstvalue, 2) ?></b></td>
                                            </tr>
                                        <?php   }   ?>
                                        <?php if ($sgstvalue >= 1) { ?>
                                            <tr>
                                                <td class="left" style="width: 32%;">SGST Value</td>
                                                <td class="text-right"><b>&#x20B9 <?= number_format($sgstvalue, 2) ?></b></td>
                                            </tr>
                                        <?php   }   ?>
                                        <tr>
                                            <td class="left" style="width: 32%;">NET Value</td>
                                            <td class="text-right"><b>&#x20B9 <?= number_format($final_total, 2) ?></b></td>
                                        </tr>
                                        <tr>
                                            <td class="left">Amount in Words </td>
                                            <td class="right" style="padding-left: 0px !important;">
                                                <div style="text-align: end;">
                                                    <b><?= 'Rupees ' . ucwords($in_result) . ' Only'; ?></b>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-md-3 col-md-offset-3">
                                        <div class="content-group" >
                                            <div class="table-responsive no-border">
                                                <table class="table" >
                                                    <tbody>
                                                        <tr>
                                                            <th>Subtotal:</th>
                                                            <td class="text-center"><?= $subtotal; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>CGST: <span class="text-regular"></span></th>
                                                            <td class="text-center"><?= $cgstvalue; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>SGST: <span class="text-regular"></span></th>
                                                            <td class="text-center"><?= $sgstvalue; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td class="text-center text-primary"><h5 class="text-semibold"><?= $final_total; ?></h5></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7 col-md-offset-5">
                                         <table class="table" >
                                            <tr class="text-right">
                                                <th  class="text-right">Total In Words:</th>
                                                <td class="text-left text-primary"><h6 class="text-semibold"><?= $in_result; ?></h6></td>
                                            </tr>
                                          </table>
                                    </div> -->

                            <!-- <div class="col-md-12">
                                       <div class="col-md-12"> 
                                           <h6><b>Terms & Conditions:</b></h6>
                                           <ol>
                                           <?php
                                            for ($k = 1; $k < count($termsarray); $k++) {
                                            ?>
                                             <li><?= $termsarray[$k] ?></li>
                                         <?php } ?>
                                           </ol>
                                      </div>  
                                    </div>   -->

                            <div class="col-md-12">
                                <?= $quotation_array['section_content']; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>