<style>
    .dropdown-btn{
        padding: 12px 30px !important;
        display: inline-block;
        background-color: #086ad8;
        color: #ffffff !important;
        font-weight: 600 !important;
        border-radius: 30px;
        transition: .5s;
        margin-top: 15px;
    }
    @media screen and (max-width: 1000px) {
        .dropdown-btn{
            padding: 12px 35px !important;
            background-color: #ffffff;
            color: #677294 !important;
            font-weight: 200!important;
            border-radius: 0px;
            transition: .5s;
        }
    }
</style>
<?php
    $data = $this->db->get("tbl_web_logo")->row();
    
    if ($data->logo_name_one != '') {
        $fileOne = base_url().'assets/images/web_images/'.$data->logo_name_one;
    }
?>
<div class="navbar-area">
    <div class="fria-responsive-nav">
        <div class="container">
            <div class="fria-responsive-menu">
                <div class="logo">
                    <p style="color: white;">
						<img src="<?= $fileOne; ?>" alt="" style="width:419px;">	
					</p>
                </div>
            </div>
        </div>
    </div>
    <div class="fria-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <div class="row align-items-center">
                        <p style="color: white;">
                            <img src="<?= $fileOne; ?>" alt="" style="width:419px;height:80px;">	
                        </p>
                    </div>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url();?>Home/AboutUs" class="nav-link">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Case Studies
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (!empty($case_studies_list)) { foreach ($case_studies_list as $case_studies) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url();?>Home/Case_Studies?id=<?= $case_studies->case_studies_id; ?>" class="nav-link">
                                            <?= $case_studies->case_studies_name; ?>
                                        </a>
                                    </li>
                                <?php   }   }   ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>#price" class="nav-link">
                                Pricing
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                Blog
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?php echo base_url('Home/Contact'); ?>" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-btn">
                                User
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="<?= base_url('SignIn'); ?>" class="nav-link">
                                        Sign-In
                                    </a>
                                </li>
                                <li class="nav-item">
								<!-- SignUp Controller call -->
                                    <a href="<?= base_url('SignUp'); ?>" class="nav-link">
                                        Sign-Up
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="others-options">
                        <a href="<?= base_url(); ?>SignIn" class="default-btn " style="display: none;">Sign In</a>
                        <?php if ($type == 'contact') { ?>

                        <?php   } else { ?>
                            <div class="burger-menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <?php }   ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="sidebar-modal">
    <div class="sidebar-modal-inner">
        <div class="sidebar-about-area">
            <div class="title">
                <h2>About Us</h2>
                <p><?= $Contact_details->about_us?></p>
            </div>
        </div>
        <div class="sidebar-contact-feed">
            <h2>Contact</h2>
            <div class="contact-form">
                <form class="scrollme animateme" data-when="enter" data-from="1" data-to="0.1" data-scale="1.8" data-opacity="0" id="contactForm">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="person_name" id="person_name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="email" name="person_email" id="person_email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="contact_number" id="contact_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required
                                    data-error="Please enter your subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="desc_message" class="form-control" id="desc_message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message" maxlength="250"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="send-btn" style="text-align: right;">
                                <span id="preview3"></span>
                                <button type="submit" class="default-btn animated fadeInDown">
                                    Send Message
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="sidebar-contact-area">
            <div class="contact-info">
                <div class="contact-info-content">
                    <h2>
                        <span><a href="tel:+917350000673">+917350000673</a></span>
                        <span><a href="tel:020-24499444">020-24499444</a></span>
                        <span>OR</span>
                        <span>support@buroforce.com <br> contact@dexterityindia.in</span>
                    </h2>
                    <ul class="social">
                        <li>
                            <a href="#" target="_blank">
                                <i class="flaticon-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="flaticon-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="flaticon-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="flaticon-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <span class="close-btn sidebar-modal-close-btn">
            <i class="flaticon-cancel"></i>
        </span>
    </div>
</div>