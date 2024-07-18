<?php
    $data = $this->db->get("tbl_web_logo")->row();
    
    if ($data->logo_name_one != '') {
        $fileOne = base_url().'assets/images/web_images/'.$data->logo_name_one;
    }
?>
 <!-- Footer -->
 <section class="footer-section pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <img src="<?= $fileOne; ?>" alt="" style="width:350px;height:80px;"><br>
                        </div>
                        <p><?= $Contact_details->about_us?></p>
                        <ul class="footer-social">
                            <?php if ($Contact_details->facebook_link != '') { ?>
                                <li>
                                    <a href="<?= $Contact_details->facebook_link; ?>">
                                        <i class="flaticon-facebook"></i>
                                    </a>
                                </li>
                            <?php   }   ?>
                            <?php if ($Contact_details->twitter_link != '') { ?>
                                <li>
                                    <a href="<?= $Contact_details->twitter_link; ?>">
                                        <i class="flaticon-twitter"></i>
                                    </a>
                                </li>
                            <?php   }   ?>
                            <?php if ($Contact_details->pinterest_link != '') { ?>
                                <li>
                                    <a href="<?= $Contact_details->pinterest_link; ?>">
                                        <i class="flaticon-pinterest"></i>
                                    </a>
                                </li>
                            <?php   }   ?>
                            <?php if ($Contact_details->instagram_link != '') { ?>
                                <li>
                                    <a href="<?= $Contact_details->instagram_link; ?>">
                                        <i class="flaticon-instagram"></i>
                                    </a>
                                </li>
                            <?php   }   ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Important Links</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <?php
                                if (!empty($service_feature_list)) {
                                    foreach ($service_feature_list as $value) {
                            ?>
                                <li>
                                    <a href="<?= base_url() ?>Home/ServiceDetail?id=<?= $value['id'];?>"><?= $value['title']; ?></a>
                                </li>      
                            <?php    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Policies</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <li>
                                <a href="<?= base_url();?>PrivacyPolicy">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>TermsandConditions">Terms Of Service</a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>RefundCancellation">Refund & Cancellation Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Contact</h3>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-phone-call"></i>
                            <h3>Phone</h3>
                            <span><a href="tel:<?= $Contact_details->mob_no; ?>"><?= $Contact_details->mob_no; ?></a></span><br>
                            <span><a href="tel:<?= $Contact_details->tel_no; ?>"><?= $Contact_details->tel_no; ?></a></span>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-envelope"></i>
                            <h3>Email</h3>
                            <span><?= $Contact_details->prinary_email; ?> <br> <?= $Contact_details->secondary_email; ?></span>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-pin"></i>
                            <h3>Address</h3>
                            <span><?= $Contact_details->address ;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p style="color: white;">
                            Copyright © <?= date('Y'); ?> Buroforce | All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul>
                            <li>
                                <!-- Powered By  -->
                                Dexterity TechSys Private Limited
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="go-top">
        <i class="bx bx-chevron-up"></i>
        <i class="bx bx-chevron-up"></i>
    </div>

    <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    
    <script src="<?= base_url()?>assets/web/js/jquery.min.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrapValidator.min.js"></script>
    
    <script src="<?= base_url()?>assets/web/js/popper.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/bootstrap.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/jquery.meanmenu.js"></script>

    <script src="<?= base_url()?>assets/web/js/owl.carousel.js"></script>

    <script src="<?= base_url()?>assets/web/js/jquery.magnific-popup.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/jquery.appear.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/odometer.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/jquery.ajaxchimp.min.js"></script>

    <script src="<?= base_url()?>assets/web/js/form-validator.min.js"></script>

    <!-- <script src="<?= base_url()?>assets/web/js/contact-form-script.js"></script> -->

    <script src="<?= base_url()?>assets/web/js/wow.min.js"></script>

	<script src="<?= base_url()?>assets/web/js/main.js"></script>
	
	<script src="<?= base_url() ?>assets/notify/pnotify.custom.min.js"></script>
    </body>

</html>