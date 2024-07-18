<?php $this->load->view('header_homepage'); ?>

<?php $this->load->view('menubar_homepage'); ?>

<?php
    $get_slider_stat = $get_slider->status;
    if( $get_slider_stat == 1)
    {
?>
<div class="main-banner-area">
    <div class="home-sliders owl-carousel owl-theme">
        <?php foreach ($slider_list as $slider) { ?>
            <div class="home-item item-bg2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="main-banner-content">
                                        <h1 style="color: black;"><?= $slider->title ?></h1>
                                        <p style="color: black;"><?= $slider->description ?></p>
                                        <div class="banner-btn">
                                            <a href="<?= base_url(); ?>SignUp" target="_blank" class="default-btn">
                                                <span class="socicon"></span> Get Started</span>
                                            </a>
                                            <a href="<?= $play_store[0]->link_url ?>" target="_blank" class="default-btn ml-1">
                                                <span class="socicon"></span> Download<span class="sub"> From play store</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="banner-image">
                                        <img src="<?= base_url() ?>assets/admin/assets/images/slider/<?= $slider->image; ?>" class="banner-img" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
        }    ?>
    </div>
</div>
<?php   }   ?>

<?php
    $get_it_services_stat = $get_it_services->status;
    if( $get_it_services_stat == 1)
    {
?>
<section class="services-section pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2><?= $get_service_feature_title[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $get_service_feature_title[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="row">
            <?php
                $color = array('', 'bg-fc9ba7', 'bg-2cdcf7', 'bg-009af0', 'bg-f4d62c', 'bg-1e2d75');
                $i = 0;
                foreach ($service_feature_list as $service_list) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services-two <?= $color[$i]; ?>">
                        <div class="icon">
                            <img src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $service_list['image']; ?>" alt="image">
                        </div>
                        <h3><?= $service_list['title']; ?></h3>
                        <p><?= $service_list['description']; ?></p>
                        <a href="<?= base_url() ?>Home/ServiceDetail?id=<?= $service_list['id'];?>" class="read-btn">Read More</a>
                    </div>
                </div>
            <?php $i++;   }   ?>
        </div>
    </div>
    <div class="default-shape">
        <div class="shape-1">
            <img src="<?= base_url() ?>assets/web/img/shape/4.png" alt="image">
        </div>
        <div class="shape-2 rotateme">
            <img src="<?= base_url() ?>assets/web/img/shape/5.svg" alt="image">
        </div>
        <div class="shape-3">
            <img src="<?= base_url() ?>assets/web/img/shape/6.svg" alt="image">
        </div>
        <div class="shape-4">
            <img src="<?= base_url() ?>assets/web/img/shape/7.png" alt="image">
        </div>
        <div class="shape-5">
            <img src="<?= base_url() ?>assets/web/img/shape/8.png" alt="image">
        </div>
    </div>
</section>
<?php   }   ?>

<?php
    $get_creative_features_stat = $get_creative_features->status;
    if( $get_creative_features_stat == 1)
    {
?>
<section class="features-section pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2><?= $get_creative_feature_title[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $get_creative_feature_title[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3 col-md-6">
                <div class="features-content">
                    <div class="icon">
                        <i class="flaticon-blueprint"></i>
                    </div>
                    <h3>Great Design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt</p>
                </div>
            </div> -->
            <?php foreach ($creative_feature_list as $feature_list) { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="features-content">
                        <div class="icon">
                            <img src="<?= base_url() ?>assets/admin/assets/images/creative_features/<?= $feature_list['image']; ?>" alt="image">
                        </div>
                        <h3><?= $feature_list['title']; ?></h3>
                        <p><?= $feature_list['description']; ?></p>
                    </div>
                </div>
            <?php   }   ?>
        </div>
    </div>
</section>
<?php   }   ?>

<?php
    $get_pricing_plan_stat = $get_pricing_plan->status;
    if( $get_pricing_plan_stat == 1)
    {
?>
<section class="pricing-section pt-100 pb-70" id="price">
    <div class="container">
        <div class="section-title">
            <h2>Our <span>Pricing</span> Plan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            <div class="bar"></div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-pricing">
                        <div class="pricing-header">
                            <h3>Basic</h3>
                            <p>Business Up</p>
                        </div>
                        <div class="price">
                            <sup>$</sup>29<sub>/mo</sub>
                        </div>
                        <ul class="pricing-list">
                            <li>
                                <i class="flaticon-checked"></i>
                                10 GB Hosting
                            </li>
                            <li>
                                <i class="flaticon-checked"></i>
                                2 Unique Users
                            </li>
                            <li>
                                <i class="flaticon-checked"></i>
                                12 GB Capacity
                            </li>
                            <li>
                                <i class="flaticon-cancel"></i>
                                Any Where Access
                            </li>
                            <li>
                                <i class="flaticon-cancel"></i>
                                Weekly Backup
                            </li>
                            <li>
                                <i class="flaticon-cancel"></i>
                                Support 24/Hour
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a href="pricing.html" class="default-btn">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-pricing">
                        <div class="pricing-header">
                            <h3>Standard</h3>
                            <p>Business Up</p>
                        </div>
                        <div class="price">
                            <sup>$</sup>79<sub>/mo</sub>
                        </div>
                        <ul class="pricing-list">
                            <li>
                                <i class="flaticon-checked"></i>
                                Visitor Info
                            </li>
                            <li>
                                <i class="flaticon-checked"></i>
                                Quick Responses
                            </li>
                            <li>
                                <i class="flaticon-checked"></i>
                                12 GB Capacity
                            </li>
                            <li>
                                <i class="flaticon-checked"></i>
                                Any Where Access
                            </li>
                            <li>
                                <i class="flaticon-cancel"></i>
                                Weekly Backup
                            </li>
                            <li>
                                <i class="flaticon-cancel"></i>
                                Support 24/Hour
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a href="pricing.html" class="default-btn">
                                Buy Now
                            </a>
                        </div>
                    </div>
				</div> -->
            <?php

            $price_count = 1;
            foreach ($plan_list as $row) {
                if ($price_count == 5) {
                    $popular = 'popular';
                } else {
                    $popular = '';
                }

                $module_list_array = $row['module_list_array'];
            ?>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 <?= $popular ?>">
                    <div class="single-pricing">
                        <div class="pricing-header">
                            <h3 class="text-left"><?= $row['plan_name']; ?></h3>
                            <!-- <p>Business Up</p> -->
                        </div>
                        <div class="price">
                            <div style="margin-left: 13px;margin-top: -6px;"><sup>&#x20B9;</sup><?= $row['price']; ?><sub>/Year</sub></div>
                        </div>
                        <ul class="pricing-list">
                            <?php
                            for ($i = 0; $i < sizeof($module_list_array); $i++) {
                            ?>
                                <li><i class="flaticon-cancel"></i><?= $module_list_array[$i]->module_name; ?></li>
                            <?php } ?>
                        </ul>
                        <div class="price-btn">
                            <a href="<?= base_url('SignUp'); ?>" class="default-btn">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            <?php $price_count++;
            } ?>
        </div>
    </div>
    <div class="default-shape">
        <div class="shape-1">
            <img src="<?= base_url() ?>assets/web/img/shape/4.png" alt="image">
        </div>
        <div class="shape-2 rotateme">
            <img src="<?= base_url() ?>assets/web/img/shape/5.svg" alt="image">
        </div>
        <div class="shape-3">
            <img src="<?= base_url() ?>assets/web/img/shape/6.svg" alt="image">
        </div>
        <div class="shape-4">
            <img src="<?= base_url() ?>assets/web/img/shape/7.png" alt="image">
        </div>
        <div class="shape-5">
            <img src="<?= base_url() ?>assets/web/img/shape/8.png" alt="image">
        </div>
    </div>
</section>
<?php   }   ?>

<?php
    $get_whychooseus_section_stat = $get_whychooseus_section->status;
    if( $get_whychooseus_section_stat == 1)
    {
?>
<section class="choose-section ptb-100">
    <div class="container">
        <div class="section-title">
            <h2><?= $whychooseus_title[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $whychooseus_title[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- <div class="choose-content">
                        <div class="icon">
                            <i class="flaticon-shared-folder"></i>
                        </div>
                        <h3>Consulting</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                    <div class="choose-content">
                        <div class="icon">
                            <i class="flaticon-blog"></i>
                        </div>
                        <h3>Data Management</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div>
                    <div class="choose-content">
                        <div class="icon">
                            <i class="flaticon-quality"></i>
                        </div>
                        <h3>Page Ranking</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                    </div> -->
                <?php if (!empty($sfeature_list)) {
                    foreach ($sfeature_list as $sfeature) { ?>
                        <div class="choose-content">
                            <div class="icon">
                                <img src="<?= base_url(); ?>assets/admin/assets/images/superfeature/<?= $sfeature->image; ?>" alt="">
                            </div>
                            <h3><?= $sfeature->title; ?></h3>
                            <p><?= $sfeature->description; ?></p>
                        </div>
                <?php   }
                } ?>

            </div>
            <div class="col-lg-6">
                <div class="choose-image">
                    <?php if ($whychooseus_title[0]->section_image == '') { ?>
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/section_image/shape.png" class="img-rounded" alt="" id="home_img_feature"></a>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/admin/assets/images/section_image/<?= $whychooseus_title[0]->section_image; ?>" alt="image">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php   }   ?>

<!-- <section class="projects-section pb-70" style="display: none;">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Projects</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            <div class="bar"></div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/1.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>App Update & Rebrand</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/2.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>IT Consultancy</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/3.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>Digital Marketing</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/4.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>App Development</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/5.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>IT Solutions</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/6.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>Data Management</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-projects">
                    <div class="projects-image">
                        <img src="<?= base_url() ?>assets/web/img/projects/7.jpg" alt="image">
                    </div>
                    <div class="projects-content">
                        <a href="single-projects.html">
                            <h3>E-commerce Development</h3>
                        </a>
                        <a href="single-projects.html">
                            <span>Research and startup</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php
    $get_faq_stat = $get_faq->status;
    if( $get_faq_stat == 1)
    {
?>
<section class="faq-section pt-50 pb-100">
    <div class="container">
        <div class="section-title">
            <h2><?= $get_data_faq[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $get_data_faq[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <ul class="accordion">
                        <?php
                        $i = 1;
                        foreach ($faq_list as $faq) {
                            if ($i <= 4) {
                                if ($i == 1) {
                                    $type = 'active';
                                    $display = 'display:block';
                                } else {
                                    $type = '';
                                    $display = '';
                                }
                        ?>
                                <li class="accordion-item">
                                    <a class="accordion-title <?= $type; ?> " href="javascript:void(0)">
                                        <i class='bx bx-chevron-down'></i>
                                        <?= trim($faq->question); ?>
                                    </a>
                                    <div class="accordion-content" style="<?= $display; ?>">
                                        <p><?= trim($faq->answer); ?></p>
                                    </div>
                                </li>
                        <?php $i++;
                            }
                        }  ?>
                    </ul>
                </div>
                <div class="row text-right">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <?php if (count($faq_list) > 4) { ?>
                            <a href="<?= base_url(); ?>Home/FaqList" class="default-btn mt-2">Read More..</a>
                        <?php   } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-image">
                    <?php if ($get_data_faq[0]->section_image == '') { ?>
                        <a href="#"><img src="<?= base_url() ?>assets/admin/assets/images/section_image/shape.png" class="img-rounded" alt="" id="home_img_feature"></a>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/admin/assets/images/section_image/<?= $get_data_faq[0]->section_image; ?>" alt="image">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php   }   ?>

<?php
    $get_testimonial_stat = $get_testimonial->status;
    if( $get_testimonial_stat == 1)
    {
?>
<section class="clients-section bg-background ptb-100">
    <div class="container">
        <div class="section-title">
            <h2><?= $get_data_testimonial[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $get_data_testimonial[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="clients-slider owl-carousel owl-theme">
            <?php foreach ($testimonial_list as $testimonial) { ?>
                <div class="clients-item">
                    <div class="icon">
                        <i class="flaticon-left-quotes-sign"></i>
                    </div>
                    <p></i>&nbsp;<?= $testimonial->description ?>&nbsp;</p>
                    <div class="clients-content">
                        <img src="<?= base_url(); ?>assets/admin/assets/images/testimonial/<?= $testimonial->profile; ?>" alt="" style="width: 100px;height: 100px;border-radius: 50%;overflow: hidden;margin: 0 auto;top: 0;left: 0;right: 0;">
                        <h3><?= $testimonial->name; ?></h3>
                        <span><?= $testimonial->company_name; ?></span>
                    </div>
                </div>
            <?php    }    ?>
        </div>
    </div>
</section>
<?php   }   ?>

<?php
    $get_client_stat = $get_client->status;
    if( $get_client_stat == 1)
    {
?>
<div class="partner-section ptb-100">
    <div class="container">
        <div class="partner-slider owl-carousel owl-theme">
            <?php foreach ($client_list as $client) { ?>
                <div class="partner-item">
                    <a href="#">
                        <img src="<?= base_url() ?>assets/images/clients/<?= $client->home_img; ?>" alt="partner">
                    </a>
                </div>
            <?php    }    ?>
        </div>
    </div>
</div>
<?php   }   ?>

<?php
    $get_newsletter_stat = $get_newsletter->status;
    if( $get_newsletter_stat == 1)
    {
?>
<section class="subscribe-inner-area ptb-100">
    <div class="container">
        <div class="subscribe-inner-text">
            <h2><?= $subcription_title[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $subcription_title[0]->description ?></p>
            <div class="bar"></div>
            <form class="newsletter-form" data-toggle="validator">
                <input type="email" class="input-newsletter" placeholder="Enter your email" name="email_subcription" id="email_subcription" required autocomplete="off">
                <button type="submit">Subscribe</button>
                <span id="subcription"></span>
                <div id="validator-newsletter" class="form-result"></div>
            </form>
        </div>
    </div>
</section>
<?php   }   ?>
<?php $this->load->view('footer_homepge'); ?>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#contactForm").on('submit', (function(e) {

            //e.preventDefault();
            if (e.isDefaultPrevented()) {
                //alert('invalid');
            } else {
                $("#preview3").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                $(':input[type="submit"]').prop('disabled', true);
                $.ajax({
                    url: '<?php echo base_url('Home/insert_contact_details') ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // alert("Thank you for submitting your details...");
                        // window.location="<?php echo base_url('Home'); ?>";
                        PNotify.removeAll();
                        $("#preview3").hide();

                        new PNotify({
                            title: "Contact Response",
                            text: "Thank you for submitting your details...",
                            opacity: 0.90,
                            type: "success",
                            width: "390px",
                            addclass: 'pnotify-center'
                        });

                        setTimeout(function() {
                            window.location = "<?php echo base_url('Home'); ?>";
                        }, 1000);
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