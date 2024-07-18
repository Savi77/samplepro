<?php $this->load->view('header_homepage'); ?>
<?php $this->load->view('menubar_homepage'); ?>
<section class="faq-section pb-100">
    <div class="container">
        <div class="section-title">
            <h2><?= $get_data_faq[0]->title ?></h2>
            <p style="margin: 0;display: contents;"><?= $get_data_faq[0]->description ?></p>
            <div class="bar"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="faq-accordion">
                    <ul class="accordion">
                        <?php
                            $i = 1;
                            foreach ($getFaqList as $faq) {
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
                        }  }  ?>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="faq-image">
                    <img src="<?= base_url() ?>assets/web/img/faq.png" alt="image">
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php $this->load->view('footer_homepge'); ?>