<?php $this->load->view('header_homepage'); ?>

<?php $this->load->view('menubar_homepage'); ?>

    <div class="page-title-area item-bg-5">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="<?= base_url(); ?>">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="contact-box pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-box">
                        <i class="flaticon-pin"></i>
                        <div class="content-title">
                            <h3>Address</h3>
                            <p style="height: 100px;"><?= $Contact_details->address; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-box">
                        <i class="flaticon-envelope"></i>
                        <div class="content-title">
                            <h3>Email</h3>
                            <p style="height: 100px;"><?= $Contact_details->prinary_email; ?>
                            <?= $Contact_details->secondary_email; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-contact-box">
                        <i class="flaticon-phone-call"></i>
                        <div class="content-title">
                            <h3>Phone</h3>
                            <p style="height: 100px;"><?= $Contact_details->mob_no; ?> <br>
                            <?= $Contact_details->tel_no; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-section pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-text">
                        <h3>Have Any Questions About Us?</h3>
                        <p>Please fill below form in order to serve you better.</p>
                    </div>
                    <div class="contact-form">
                        <form class="scrollme animateme" data-when="enter" data-from="1" data-to="0.1" data-scale="1.8" data-opacity="0" id="contactFormFill">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="person_name" id="person_name" class="form-control" required
                                    data-error="Please enter your name" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="person_email" id="person_email" class="form-control" required
                                    data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" required
                                    data-error="Please enter your number" class="form-control"
                                    placeholder="Your Phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45" maxlength="15">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="desc_message" class="form-control" id="desc_message" cols="30" rows="6" required
                                    data-error="Write your message" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="send-btn">
                                <button type="submit" class="default-btn">
                                    Send Message
                                </button>
                                <div id="contactLoader" class="text-center"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="<?= base_url(); ?>assets/web/img/contact.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('footer_homepge'); ?>
<script type="text/javascript">
    $(document).ready(function (e){
        $("#contactFormFill").on('submit',(function(e){
            if (e.isDefaultPrevented())
            {
                //alert('invalid');
            }
            else
            {
                $("#contactLoader").html('<img src="<?= base_url() ?>assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                $(':input[type="submit"]').prop('disabled', true);
                $.ajax({
                    url: '<?php echo base_url('Home/insert_contact_details') ?>',
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        $("#contactLoader").hide();
                        PNotify.removeAll();

                        new PNotify({
                            title: "Contact Response",
                            text: "Thank you for submitting your details...",
                            opacity: 0.90,
                            type: "success",
                            width: "390px",
                            addclass: 'pnotify-center'
                        });

                        setTimeout(function()
                        {
                            window.location="<?php echo base_url('Home/Contact');?>";
                        }, 1000);
                    },
                    error: function()
                    {
                        alert('fail');
                    }
                });
            }
            return false;
        }));
    });
</script>