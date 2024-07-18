<?php $this->load->view('header_homepage'); ?>
<?php $this->load->view('menubar_homepage'); ?>
<style>
    .tab {
        float: left;
        /* border: 1px solid #ccc; */
        background-color: #FFFFFF;
        width: 22%;
        min-height: 800px;
    }

    ._3R9IF {
        display: -ms-flexbox;
        display: flex;
    }

    .tab button.active {
        background-color: white;
        width: 100%;
    }

    .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
    }

    .tabcontent {
        float: left;
        padding: 0px 12px;
        /* border: 1px solid #ccc; */
        width: 60%;
        border-left: none;
        min-height: 800px;
    }

    .footer {
        background: #2e3767;
        padding-bottom: 10px;
        display: inline-flex;
        width: 100%;
    }
</style>
<section class="services-section">
    
    <div class="tab" style="background-color: #f3f3f3;">
        <button class="tablinks  " onclick="openCity(event, '1')" style="margin-top: 29px;font-size: 18px">Privacy Policy</button>
        <button class="tablinks  " onclick="openCity(event, '2') " style="font-size: 18px">Terms Of Service</button>
        <button class="tablinks  active" onclick="openCity(event, '3') " style="    font-size: 18px">Refund & Cancellation Policy</button>
    </div>
    <div id="1" class="tabcontent" style="display: none;">
        <div class="container">
            <div class="panel-group" id="accordion" style="margin-left: 25px;width: 110%">
                <h6 style="font-size: 20px"></h6>
                <!-- <h6 style="font-size: 21px;margin-top: -40px">Privacy Policy</h6> -->
                <div class="panel-body" style="text-align: justify;">
                    <?php if (!empty($getPoliciesData)) {
                            foreach ($getPoliciesData as $value) {
                                if ($value['policies_type'] == 'Privacy_Policy') {
                                    echo $value['policies_section'];
                                }
                            }
                    }?>
                </div>
            </div>
        </div>
    </div>
    <div id="2" class="tabcontent" style="display: none;">
        <div class="container">
            <div class="panel-group active" id="accordion" style="margin-left: 25px;width: 110%">
                <!-- <h6 style="font-size: 21px;margin-top: -40px">Privacy Policy</h6> -->
                <div class="panel-body" style="text-align: justify;">
                    <?php if (!empty($getPoliciesData)) {
                            foreach ($getPoliciesData as $value) {
                                if ($value['policies_type'] == 'Terms_Service') {
                                    echo $value['policies_section'];
                                }
                            }
                    }?>
                </div>
            </div>
        </div>
    </div>
    <div id="3" class="tabcontent" style="display: block;">
        <div class="container">

            <div class="panel-group" id="accordion" style=" margin-left: 25px;width: 110%">
                <!-- <h6 style="font-size: 21px;margin-top: -40px">Terms of Service</h6> -->
                <div class="panel-body" style="text-align: justify;">
                    <?php if (!empty($getPoliciesData)) {
                            foreach ($getPoliciesData as $value) {
                                if ($value['policies_type'] == 'Refund_Cancellation') {
                                    echo $value['policies_section'];
                                }
                            }
                    }?>
                </div>

            </div>
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

<?php $this->load->view('footer_homepge'); ?>
<script>
    function openCity(evt, cityName) {

        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks ");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>