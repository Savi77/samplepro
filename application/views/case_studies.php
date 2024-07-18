<?php $this->load->view('header_homepage'); ?>

<?php $this->load->view('menubar_homepage'); ?>

<div class="page-title-area item-bg-5">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Case Studies </h2>
                    <ul>
                        <li><a href="<?= base_url(); ?>">Home</a></li>
                        <li><?= $Case_Studies_Data->case_studies_name; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="project-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="project-details-image">
                    <img src="<?= base_url() ?>assets/admin/assets/images/Case_Studies/<?= $Case_Studies_Data->image_one ?>" style="width: 546px;height:546px" class="img-rounded" alt="" id="home_img_one_edit">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="project-details-image">
                <img src="<?= base_url() ?>assets/admin/assets/images/Case_Studies/<?= $Case_Studies_Data->image_two ?>"  style="width: 546px;height:546px" class="img-rounded" alt="" id="home_img_one_edit">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="projects-details-desc">
                    <h3>Competitor Analysis</h3>
                    <p><?= $Case_Studies_Data->competitor_analysis; ?></p>
                    <div class="features-text">
                        <h4><i class="flaticon-tick"></i> Core Development</h4>
                        <p><?= $Case_Studies_Data->core_development; ?></p>
                    </div>
                    <div class="features-text">
                        <h4><i class="flaticon-tick"></i> Define Your Choices</h4>
                        <p><?= $Case_Studies_Data->define_your_choices; ?>.</p>
                    </div>
                    <br>
                    <div class="project-details-info">
                        <div class="single-info-box">
                            <h4>Client</h4>
                            <span><?= $Case_Studies_Data->client; ?></span>
                        </div>
                        <div class="single-info-box">
                            <h4>Category</h4>
                            <span><?= $Case_Studies_Data->category; ?></span>
                        </div>
                        <div class="single-info-box">
                            <h4>Date</h4>
                            <span><?= date('F d, Y' , strtotime($Case_Studies_Data->case_date)); ?></span>
                        </div>
                        <div class="single-info-box">
                            <h4>Share</h4>
                            <ul class="social">
                                <li>
                                    <?php if ($Case_Studies_Data->facebook_link != '') { ?>
                                        <a href="<?= $Case_Studies_Data->facebook_link; ?>" target="_blank"><i class="flaticon-facebook"></i></a>
                                    <?php   }   ?>
                                </li>
                                <li>
                                    <?php if ($Case_Studies_Data->twitter_link != '') { ?>
                                        <a href="<?= $Case_Studies_Data->twitter_link; ?>" target="_blank"><i class="flaticon-twitter"></i></a>
                                    <?php   }   ?>
                                </li>
                                <li>
                                    <?php if ($Case_Studies_Data->pinterest_Link != '') { ?>
                                        <a href="<?= $Case_Studies_Data->pinterest_Link; ?>" target="_blank"><i class="flaticon-pinterest"></i></a>
                                    <?php   }   ?>
                                </li>
                                <li>
                                    <?php if ($Case_Studies_Data->instagram_link != '') { ?>
                                        <a href="<?= $Case_Studies_Data->instagram_link; ?>" target="_blank"><i class="flaticon-instagram"></i></a>
                                    <?php   }   ?>
                                </li>
                            </ul>
                        </div>
                        <?php if ($Case_Studies_Data->live_link != '') { ?>
                            <div class="single-info-box">
                                <a href="<?= $Case_Studies_Data->live_link; ?>" class="default-btn">Live Preview</a>
                            </div>
                        <?php   }   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('footer_homepge'); ?>