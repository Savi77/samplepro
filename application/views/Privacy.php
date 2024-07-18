<?php $this->load->view('header_homepage'); ?>

<?php $this->load->view('menubar_homepage'); ?>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<style>
    .blockquote_privacy {
        font-size: 14px;
        color: #3a3a3a;
        padding: 10px 20px !important;
        border-left: 3px solid #086ad8;
        background: #f8f8f8;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .dark:before 
    {
        content: '';
            background: none; 
    }
    .customers .dark-hex:before {
        content: '';
        position: absolute;
        background-image: none !important;
        background-repeat: no-repeat;
        background-size: 100%;
        left: 0;
        width: 118px;
        height: 100%;
        display: inline-block;
        background-position: 50%;
    }
    .dark {
        background: #192A3B;
        position: relative;
        padding-top: 90px;
    }
    .dark h2 {
        color: #fff;
        text-align: center;
        font-size: 30px;
    }
    .centered {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .dark strong {
        color: #7c8b9b;
    }
    p {
        margin: 0 0 20px 0 !important;
    }
    .icon-wrapper {
        padding-top: 60px;
    }
    .icon {
        text-align: center;
        padding: 0 60px;
        border-right: 1px solid #30404f;
        margin-bottom: 60px;
    }
    .icon .dark-hex img {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
    }
    .icon .dark-hex {
        background-color: #253545;
        background-image: url(assets/images/dark-hex.svg);
        background-repeat: no-repeat;
        background-size: 102%;
        width: 113px;
        height: 126px;
        display: inline-block;
        background-position: -1px 0px;
        margin-bottom: 30px;
    }
    .icon h5 {
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0px 0px 20px;
        font-weight: 600;
    }

    .icon h5, .icon p {
        color: #fff;
        font-size: 13px;
    }
    .list-group-item {
        font-size: 13px !important;
    }
    h2.left:after, h3.left:after, h4.left:after, h5.left:after, h6.left:after {
        content: '';
        display: block;
        height: 2px;
        width: 70px;
        background: #26a1e0;
        margin: 20px 0 0 0;
        -webkit-animation: title-border .5s ease-in;
        -moz-animation: title-border .5s ease-in;
        -o-animation: title-border .5s ease-in;
        animation: title-border .5s ease-in;
    }
    .H-line:after {
        content: '';
        display: block;
        height: 2px;
        width: 70px;
        background: #26a1e0;
        margin: 20px auto 0 auto;
        -webkit-animation: title-border .5s ease-in;
        -moz-animation: title-border .5s ease-in;
        -o-animation: title-border .5s ease-in;
        animation: title-border .5s ease-in;
    }
    @media (min-width: 992px){
        .col-md-push-2 {
            left: 16.66666667%;
        }
    }
    .open-map {
        background: #26a1e0;
        text-align: center;
        margin: 60px 0 0 0;
        -webkit-transition: all 300ms ease-in-out;
        -moz-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
    }
    .open-map a {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        padding: 20px 0;
    }
    .open-map:hover {
        background: #4a2e77;
    }
</style>

<style type="text/css">
        
    .service-box{
        position: relative;
        overflow: hidden;
        margin-bottom:10px;
        perspective:1000px;
        -webkit-perspective:1000px;
    }
    .service-icon{
        width: 100%;
        height: 220px;
        padding: 20px;
        text-align: center;
        transition: all .5s ease;
    }

    .service-content{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        opacity: 0;
        width: 100%;
        height: 220px;
        padding: 20px;
        text-align: center;
        transition: all .5s ease;
        background-color: #474747;
        backface-visibility:hidden;
        transform-style: preserve-3d;
        -webkit-transform: translateY(110px) rotateX(-90deg);
        -moz-transform: translateY(110px) rotateX(-90deg);
        -ms-transform: translateY(110px) rotateX(-90deg);
        -o-transform: translateY(110px) rotateX(-90deg);
        transform: translateY(110px) rotateX(-90deg);
    }
    .service-box .service-icon .front-content{
        position: relative;
        top:80px;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .service-box .service-icon .front-content i {
        font-size: 28px;
        color: #fff;
        font-weight: normal;
    }

    .service-box .service-icon .front-content h3 {
        font-size: 15px;
        color: #fff;
        text-align: center;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    .service-box .service-content h3 {
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        margin-bottom:10px;
        text-transform: uppercase;
    }
    .service-box .service-content p {
        font-size: 13px;
        color: #b1b1b1;
        margin:0;
    }
    .yellow{background-color: #65c0ef;}
    .orange{background-color: #00A0DF;}
    .red{background-color: #00619F;}
    .grey{background-color: #00A0DF;}
    .service-box:hover .service-icon{
        opacity: 0;
        -webkit-transform: translateY(-110px) rotateX(90deg);
        -moz-transform: translateY(-110px) rotateX(90deg);
        -ms-transform: translateY(-110px) rotateX(90deg);
        -o-transform: translateY(-110px) rotateX(90deg);
        transform: translateY(-110px) rotateX(90deg);
    }
    .service-box:hover .service-content {
        opacity: 1;
        -webkit-transform: rotateX(0);
        -moz-transform: rotateX(0);
        -ms-transform: rotateX(0);
        -o-transform: rotateX(0);
        transform: rotateX(0);
    }        
</style>

<div class="container" id="faq">
    <div class="section" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="left">Privacy Policy</h2>
            </div>
            <div class="col-md-12">
                <div class="blockquote_privacy">
                    <p style="text-align: justify;font-size: 14px !important;font-style: inherit;">This notice applies across all websites that we own and operate and all services we provide, including our online and mobile accounting and financial services products, and any other apps or services we may offer (our “services”) When we say “personal data”, we mean information that would identify you, like your name, email, address, telephone number, bank account details, payment information and so on. The same would apply to information that could identify other users in your teams that are shared with Buro Force.
                        <br /> If you can’t be identified (for example, when personal data has been aggregated and anonymised), the information wouldn’t be personal data anymore, and this notice doesn’t apply.fy other users in your teams that are shared with Buro Force. We may need to update this notice from time to time. When a significant change is made, we’ll make sure we let you know – usually by sending you an email.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="dark" style="margin-top: 5%;">
    <div class="container">
        <div class="row">
            <h2 class="H-line">Principles of Data Protection</h2>
            <div class="row">
                <div class="col-md-8 col-md-push-2 centered">
                    <p><strong>Our approach to data protection is built around three key principles:</strong></p>
                </div>
            </div>
            <div class="row icon-wrapper">
                <div class="col-md-4 col-sm-6 icon scrollme">
                    <span class="dark-hex animateme" data-when="enter" data-from="0.5" data-to="0" data-crop="false" data-opacity="0" data-scale="2" style="opacity: 1;transform: translate3d(0px, 0px, 0px) rotateX( 0deg ) rotateY( 0deg ) rotateZ( 0deg ) scale3d(1.001, 1.001, 1.001);">
                        <img src="assets/images/icon-5.png" alt="">
                    </span>
                    <h5 class="no-underline">Transparency</h5>
                    <p>We are open, honest and transparent, and you could always contact us if you have any queries.</p>
                </div>

                <div class="col-md-4 col-sm-6 icon scrollme">
                    <span class="dark-hex animateme" data-when="enter" data-from="0.5" data-to="0" data-crop="false" data-opacity="0" data-scale="2">
                        <img src="assets/images/icon-6.png" alt="">
                    </span>
                    <h5 class="no-underline">Enablement</h5>
                    <p>We have efficient use of personal data to enhance productivity and growth and to have you make connections between the information you have and the insights you want.</p>
                </div>

                <div class="col-md-4 col-sm-6 icon scrollme" style="border: none;">
                    <span class="dark-hex animateme" data-when="enter" data-from="0.5" data-to="0" data-crop="false" data-opacity="0" data-scale="2">
                        <img src="assets/images/icon-7.png" alt="">
                    </span>
                    <h5 class="no-underline">Security</h5>
                    <p>We adopt industry leading approaches to secure the personal data entrusted to us.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="left">Information we Collect</h2>
                <p style="text-align: justify;font-size:14px;">
                    When you visit our websites or use our services, we collect personal data. The ways we collect it can be broadly categorised into the following:
                </p>
            </div>
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item"><b>Information you submit in order to use our product:</b> &nbsp; When you use our product, we might ask you to provide personal data to us. For example, we may ask for your information and/or your colleagues’ information to create an employee database for various purposes like accounting and payroll. If you don’t want to provide us with personal data, you don’t have to, but it might mean you can’t use some parts of our product. </li>
                    <li class="list-group-item"><b>Information you provide to us directly:</b> &nbsp; When you visit or use some parts of our websites and/or services, we might ask you to provide personal data to us. For example, we ask for your contact information when you sign up for a free trial, join us on social media, take part in training and events, contact us with questions or request support. If you don’t want to provide us with personal data, you don’t have to, but it might mean you can’t use some parts of our websites or services.</li>
                    <li class="list-group-item"><b>Information we collect automatically:</b> &nbsp; We collect some information about you automatically when you visit our websites or use our product/services, like your IP address and device type. We also collect information when you navigate through our websites and services, including what pages you looked at and what links you clicked on. This information is useful for us as it helps us get a better understanding of how you’re using our websites and services so that we can continue to provide the best experience possible (e.g., by personalising the content you see). Some of this information is collected using cookies and similar tracking technologies.</li>
                    <li class="list-group-item"><b>Information we get from third parties:</b> &nbsp;The majority of information we collect, we collect directly from you. Sometimes we might collect personal data about you from other sources, such as publicly available materials or trusted third parties like our marketing and research partners. We use this information to supplement the personal data we already have about you, in order to better inform, personalise and improve our services, and to validate the personal data you provide.
                        <p>
                            Where we collect personal data, we’ll only process it:
                        <ul>
                            <li>to perform a contract with you; or</li>
                            <li>where we have legitimate interests to process the personal data and they’re not overridden by your rights; or</li>
                            <li>in accordance with a legal obligation; or</li>
                            <li>Where we have your consent. <br />If we don’t collect your personal data, we may be unable to provide you with all our services, and some functions and features on our websites may not be available to you.
                                If you’re someone who doesn’t have a relationship with us, but believe that a Buro Force subscriber has entered your personal data into our websites or services, you’ll need to contact that Buro Force subscriber for any questions you have about your personal data (including where you want to access, correct, amend, or request that the user delete, your personal data). Alternatively, you</li>
                        </ul>
                        </p>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="left">Sharing your data</h2>
                <p style="text-align: justify;font-size:14px;">
                    There will be times when we need to share your personal data with third parties. We will only disclose your personal data to:
                </p>
            </div>
            <div class="col-md-12">
                <ol style="text-align: justify;font-size:14px;">
                    <li>Third party service providers and partners who assist and enable us to use the personal data to, for example, support delivery of or provide functionality on the website or services, or to market or promote our goods and services to you;</li>
                    <li>Regulators, law enforcement bodies, government agencies, courts or other third parties where we think it’s necessary to comply with applicable laws or regulations, or to exercise, establish or defend our legal rights. Where possible and appropriate, we will notify you of this type of disclosure;</li>
                    <li>An actual or potential buyer (and its agents and advisers) in connection with an actual or proposed purchase, merger or acquisition of any part of our business; and Other people where we have your consent.</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon yellow">
                        <div class="front-content">
                            <i class="fa fa-lock"></i>
                            <h3 class="H-line">Security</h3>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="H-line">Security</h3>
                        <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon orange">
                        <div class="front-content">
                            <i class="fa fa-anchor"></i>
                            <h3 class="H-line">Updates</h3>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="H-line">Updates to this Privacy Policy/Notice</h3>
                        <p>From time to time we may change our privacy policies/notice. We will notify you of any material changes to this policy as required by law. We will also post an updated copy on our website. Please check our site periodically to know more about the revisions.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-box ">
                    <div class="service-icon red">
                        <div class="front-content">
                            <i class="fa fa-trophy"></i>
                            <h3 class="H-line">Jurisdiction</h3>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="H-line">Jurisdiction</h3>
                        <p>This agreement shall be governed and constructed by the laws of India, and the courts of Maharashtra shall have exclusive jurisdiction.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="remove-top" id="contact" style="margin-top: 30px;">
    <div class="open-map" style="    margin: 0px 0 0 0;">
        <a class="mapopen" onclick="map_open()" style="cursor: pointer; text-decoration: none">Our location</a>
        <input type="hidden" id="openclose" value="close">
    </div>
</div>

<div id="map1" style="overflow: hidden; display: none;  height: 300px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.291295780802!2d73.83267425035845!3d18.515734074093082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf8f5cb04d3d%3A0xb17e6003ba39c042!2sDexterity+TechSys+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1522153189997" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php $this->load->view('footer_homepge'); ?>

<script type="text/javascript">
    function map_open(val) {

        // alert(val);
        var res = $('#openclose').val();
        // alert(res);
        if (res == 'close') {
            $('#openclose').val('open');
            $('#map1').show();
        } else {
            $('#openclose').val('close');
            $('#map1').hide();
        }

    }
</script>