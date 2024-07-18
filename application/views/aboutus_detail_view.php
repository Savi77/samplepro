<?php $this->load->view('header_homepage'); ?>
<?php $this->load->view('menubar_homepage'); ?>

<section class="about-section ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="about-image">
                    <img src="<?= base_url();?>assets/admin/assets/images/about_us/<?= $About_details->image?>" alt="image" style="display: block;">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-tab">
                    <h2><?= $About_details->title_name; ?></h2>
                    <div class="bar"></div>
                    <p><?= $About_details->title_description; ?></p>

                    <!-- <div class="tab about-list-tab">
                        <ul class="tabs">
                            <li>
                                <a href="#">
                                    Our History
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Our Mission
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Friendly Support
                                </a>
                            </li>
                        </ul>
                        <div class="tab_content">
                            <div class="tabs_item">
                                <div class="text">
                                    <h3>How to generate your Creative Idea With IT Business</h3>
                                </div>
                                <ul class="list">
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Philosopy of Business Analytics
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Fast Track Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Lies & Damn Lies About Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Ultimate Deal on Business
                                    </li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                                <a class="default-btn" href="#">
                                    Discover More
                                </a>
                            </div>
                            <div class="tabs_item">
                                <div class="text">
                                    <h3>How to generate your Creative Idea With IT Business</h3>
                                </div>
                                <ul class="list">
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Philosopy of Business Analytics
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Fast Track Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Lies & Damn Lies About Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Ultimate Deal on Business
                                    </li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                                <a class="default-btn" href="#">
                                    Discover More
                                </a>
                            </div>
                            <div class="tabs_item">
                                <div class="text">
                                    <h3>How to generate your Creative Idea With IT Business</h3>
                                </div>
                                <ul class="list">
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Philosopy of Business Analytics
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Fast Track Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        Lies & Damn Lies About Your Business
                                    </li>
                                    <li>
                                        <i class="flaticon-tick"></i>
                                        The Ultimate Deal on Business
                                    </li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan facilisis.</p>
                                <a class="default-btn" href="#">
                                    Discover More
                                </a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('footer_homepge'); ?>