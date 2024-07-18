<?php $this->load->view('header_homepage'); ?>
<?php $this->load->view('menubar_homepage'); ?>
<style>
    img.img_shape {
        border-radius: 7px;
        width: 570px;
        height: 310px;
        margin-top: 0% !important;
    }
    .default-padding {
        padding-top: 35px;
        padding-bottom: 35px;
    }

    .default-padding, .default-padding-top, .default-padding-bottom {
        position: relative;
        z-index: 1;
    }
</style>
<section class="faq-section pt-50">
    <div class="container">
        <div class="section-title">
            <h2><?= $getServiceDetail->title ?></h2>
            <div class="bar"></div>
        </div>
    </div>
</section>

<?php if ($getServiceDetail->image_one != '' || $getServiceDetail->tilte_one != '' || $getServiceDetail->detail_content_one != '' ) { ?>
    <div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
        <div class="container">
            <div class="about-items choseus-items right-thumb">
                <div class="row align-end">
                    <div class="col-lg-6">
                        <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <h2><?= $getServiceDetail->tilte_one; ?></h2>
                            <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_one; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_one ?>" alt="Thumb" style="margin-top: 10%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php   }   ?>

<?php if ($getServiceDetail->image_two != '' || $getServiceDetail->tilte_two != '' || $getServiceDetail->detail_content_two != '' ) { ?>
<div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
    <div class="container">
        <div class="about-items choseus-items right-thumb">
            <div class="row align-end">
                <div class="col-lg-6">
                    <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_two ?>" alt="Thumb" style="margin-top: 10%;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                        <h2><?= $getServiceDetail->tilte_two?></h2>
                        <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_two ?></p>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   }   ?>

<?php if ($getServiceDetail->image_three != '' || $getServiceDetail->tilte_three != '' || $getServiceDetail->detail_content_three != '' ) { ?>
    <div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
        <div class="container">
            <div class="about-items choseus-items right-thumb">
                <div class="row align-end">
                    <div class="col-lg-6">
                        <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <h2><?= $getServiceDetail->tilte_three; ?></h2>
                            <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_three; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_three ?>" alt="Thumb" style="margin-top: 10%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php   }   ?>

<?php if ($getServiceDetail->image_four != '' || $getServiceDetail->tilte_four != '' || $getServiceDetail->detail_content_four != '' ) { ?>
    <div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
        <div class="container">
            <div class="about-items choseus-items right-thumb">
                <div class="row align-end">
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_four ?>" alt="Thumb" style="margin-top: 10%;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <h2><?= $getServiceDetail->tilte_four?></h2>
                            <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_four ?></p>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php   }   ?>

<?php if ($getServiceDetail->image_five != '' || $getServiceDetail->title_five != '' || $getServiceDetail->detail_content_five != '' ) { ?>
    <div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
        <div class="container">
            <div class="about-items choseus-items right-thumb">
                <div class="row align-end">
                    <div class="col-lg-6">
                        <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <h2><?= $getServiceDetail->title_five; ?></h2>
                            <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_five; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_five ?>" alt="Thumb" style="margin-top: 10%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php   }   ?>

<?php if ($getServiceDetail->image_six != '' || $getServiceDetail->title_six != '' || $getServiceDetail->detail_content_six != '' ) { ?>
    <div class="about-area bg-gray overflow-hidden rectangular-shape default-padding">
        <div class="container">
            <div class="about-items choseus-items right-thumb">
                <div class="row align-end">
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="img_shape" src="<?= base_url() ?>assets/admin/assets/images/service_features/<?= $getServiceDetail->image_six ?>" alt="Thumb" style="margin-top: 10%;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                            <h2><?= $getServiceDetail->title_six?></h2>
                            <p style="padding: 0px; margin-bottom: 15px; color: rgb(102, 102, 102); line-height: 28px; font-family: Nunito, sans-serif; font-size: 15px; text-align: justify;"><?= $getServiceDetail->detail_content_six ?></p>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php   }   ?>

<?php $this->load->view('footer_homepge'); ?>