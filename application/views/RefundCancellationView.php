<?php $this->load->view('header_homepage'); ?>

<?php $this->load->view('menubar_homepage'); ?>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<style>
    .blockquote_privacy {
        font-size: 14px;
        color: #3a3a3a;
        padding: 20px !important;
        border-left: 3px solid #086ad8;
        background: #f8f8f8;
        margin-top: 20px;
        margin-bottom: 20px;
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

<div class="container" id="faq">
    <div class="section" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="left">Refund & Cancellation Policy</h2>
            </div>
            <div class="col-md-12">
                <div class="blockquote_privacy">
                    <p style="text-align: justify;font-size:14px !important;">
                        THE REFUND & CANCELLATION POLICY FOR ALL PAYMENTS MADE TOWARDS BURO FORCE SUBSCRIPTION USING THE PAYMENT GATEWAY SHALL STAND AS UNDER:
                    </p>
                </div>
            </div>
            <div class="col-md-12">
                    <ul class="list-group"> 
                    <li class="list-group-item"><b><i class="fa fa-dot-circle-o" style="font-size:15px !important;"></i></b>&nbsp;&nbsp;The subscription charges paid for availing Buro Force Portal Access as well as Mobile subscription along with add-ons (if any), is totally non-refundable.</li> 
                    <li class="list-group-item"><b><i class="fa fa-dot-circle-o" style="font-size:15px !important;"></i></b>&nbsp;&nbsp;In case you have paid the charges relating to Buro Force subscription multiple times, please write to us at support@buroforce.com and we will initiate the required steps to refund your money extra money. In case your payment has been collected by our channel partner and not by Dexterity TechSys Private Limited, you may request for a full refund of the charges from the channel partner.</li> 
                </ul>
                </div>
        </div>
    </div>
</div>
<br/><br/>
<div class="remove-top" id="contact">
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