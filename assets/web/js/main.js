(function($) {
    "use strict";
    jQuery(document).on('ready', function() {
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 120) { $('.navbar-area').addClass("is-sticky"); } else { $('.navbar-area').removeClass("is-sticky"); }
        });
        jQuery('.mean-menu').meanmenu({ meanScreenWidth: "991" });
        $(".burger-menu").on('click', function() { $('.sidebar-modal').toggleClass('active'); });
        $(".sidebar-modal-close-btn").on('click', function() { $('.sidebar-modal').removeClass('active'); });
        $('.close-btn').on('click', function() {
            $('.search-overlay').fadeOut();
            $('.search-btn').show();
            $('.close-btn').removeClass('active');
        });
        $('.search-btn').on('click', function() {
            $(this).hide();
            $('.search-overlay').fadeIn();
            $('.close-btn').addClass('active');
        });
        $('.home-sliders').owlCarousel({ loop: true, margin: 0, nav: false, mouseDrag: true, items: 1, autoHeight: true, dots: true, autoplay: true, smartSpeed: 500, autoplayHoverPause: true, navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right-1'></i>", ], });
        $(".home-sliders").on("translate.owl.carousel", function() {
            $(".main-banner-content span, .main-banner-content h1, .main-banner-content .typewrite").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content p").removeClass("animated fadeInDown").css("opacity", "0");
            $(".main-banner-content a").removeClass("animated fadeInDown").css("opacity", "0");
            $(".banner-image").removeClass("animated slideInUp").css("opacity", "0");
        });
        $(".home-sliders").on("translated.owl.carousel", function() {
            $(".main-banner-content span, .main-banner-content h1, .main-banner-content .typewrite").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content p").addClass("animated fadeInDown").css("opacity", "1");
            $(".main-banner-content a").addClass("animated fadeInDown").css("opacity", "1");
            $(".banner-image").addClass("animated slideInUp").css("opacity", "1");
        });
        $('.clients-slider').owlCarousel({ loop: true, nav: false, dots: true, autoplayHoverPause: true, autoplay: true, smartSpeed: 1000, margin: 0, navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right'></i>"], responsive: { 0: { items: 1 }, 576: { items: 1 }, 768: { items: 1 }, 1200: { items: 1 } } });
        $('.partner-slider').owlCarousel({ loop: true, nav: false, dots: false, smartSpeed: 2000, margin: 30, autoplayHoverPause: true, autoplay: true, responsive: { 0: { items: 2 }, 576: { items: 3 }, 768: { items: 4 }, 1200: { items: 5 } } });
        (function($) {
            $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
            $('.tab ul.tabs li a').on('click', function(g) {
                var tab = $(this).closest('.tab'),
                    index = $(this).closest('li').index();
                tab.find('ul.tabs > li').removeClass('current');
                $(this).closest('li').addClass('current');
                tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
                tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
                g.preventDefault();
            });
        })(jQuery);
        $('.odometer').appear(function(e) {
            var odo = $(".odometer");
            odo.each(function() {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });
        $(function() {
            $(window).on('scroll', function() { var scrolled = $(window).scrollTop(); if (scrolled > 600) $('.go-top').addClass('active'); if (scrolled < 600) $('.go-top').removeClass('active'); });
            $('.go-top').on('click', function() { $("html, body").animate({ scrollTop: "0" }, 500); });
        });
        $(function() {
            $('.accordion').find('.accordion-title').on('click', function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle('fast');
                $('.accordion-content').not($(this).next()).slideUp('fast');
                $('.accordion-title').not($(this)).removeClass('active');
            });
        });
        
        $(".newsletter-form").validator().on("submit", function(event) {
            if (event.isDefaultPrevented()) {
                formErrorSub();
                submitMSGSub(false, "Please enter your email correctly.");   
            } else {
                var urlLink = 'Home/insert_email_subcription'; 
                event.preventDefault(); 
                $("#subcription").html('<img src="assets/images/default.gif" style="height:50px;width:50px;" alt="sending data...."/>');
                $(':input[type="submit"]').prop('disabled', true);
                $.ajax({
                    url: urlLink,
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        // alert(data);
                        PNotify.removeAll();
                        $("#subcription").hide();
                        if (data == 1) {
                            new PNotify({
                                title: "Subcription",
                                text: "Thank you for subscribing!",
                                opacity: 0.90,
                                type: "success",
                                width: "390px",
                                addclass: 'pnotify-center'
                            });
    
                            setTimeout(function()
                            {
                                window.location="Home";
                            }, 1000);
                        } else {
                            new PNotify({
                                title: "Fail",
                                text: "Something Went To Wrong..",
                                opacity: 0.90,
                                type: "error",
                                width: "390px",
                                addclass: 'pnotify-center'
                            });
    
                            setTimeout(function()
                            {
                                window.location="Home";
                            }, 1000);
                        }
                        
                    },
                    error: function()
                    {
                        alert('fail');
                    }
                });
            }
        });

         function formSuccessSub() {
            $(".newsletter-form")[0].reset();
            submitMSGSub(true, "Thank you for subscribing!");
            setTimeout(function() { $("#validator-newsletter").addClass('hide'); }, 4000)
        }

        function formErrorSub() {
            $(".newsletter-form").addClass("animated shake");
            setTimeout(function() { $(".newsletter-form").removeClass("animated shake"); }, 1000)
        }

        function submitMSGSub(valid, msg) {
            if (valid) { var msgClasses = "validation-success"; } else { var msgClasses = "validation-danger"; }
            $("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
        }
        
        // $(".newsletter-form").ajaxChimp({ 
        //     url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", callback: callbackFunction 
        // });
        function callbackFunction(resp) {
            if (resp.result === "success") { formSuccessSub(); } else { formErrorSub(); }
        }

        function makeTimer() {
            var endTime = new Date("april  30, 2020 17:00:00 PDT");
            var endTime = (Date.parse(endTime)) / 1000;
            var now = new Date();
            var now = (Date.parse(now) / 1000);
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }
            $("#days").html(days + "<span>Days</span>");
            $("#hour").html(hours + "<span>Hours</span>");
            $("#minu").html(minutes + "<span>minutes</span>");
            $("#seco").html(seconds + "<span>seconds</span>");
        }
        setInterval(function() { makeTimer(); }, 300);
        jQuery('.skill-bar').each(function() {
            jQuery(this).find('.progress-content').animate({ width: jQuery(this).attr('data-percentage') }, 2000);
            jQuery(this).find('.progress-number-mark').animate({ left: jQuery(this).attr('data-percentage') }, {
                duration: 2000,
                step: function(now, fx) {
                    var data = Math.round(now);
                    jQuery(this).find('.percent').html(data + '%');
                }
            });
        });
        $('.popup-youtube').magnificPopup({ disableOn: 320, type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: false, fixedContentPos: false });
        (function($) {
            $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
            $('.tab ul.tabs li a').on('click', function(g) {
                var tab = $(this).closest('.tab'),
                    index = $(this).closest('li').index();
                tab.find('ul.tabs > li').removeClass('current');
                $(this).closest('li').addClass('current');
                tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
                tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
                g.preventDefault();
            });
        })(jQuery);

        function makeTimer() {
            var endTime = new Date("September 30, 2022 17:00:00 PDT");
            var endTime = (Date.parse(endTime)) / 1000;
            var now = new Date();
            var now = (Date.parse(now) / 1000);
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }
            $("#days").html(days + "<span>Days</span>");
            $("#hours").html(hours + "<span>Hours</span>");
            $("#minutes").html(minutes + "<span>Minutes</span>");
            $("#seconds").html(seconds + "<span>Seconds</span>");
        }
        setInterval(function() { makeTimer(); }, 1000);
    });
    $('.image-sliders').owlCarousel({ loop: true, nav: true, dots: false, autoplayHoverPause: true, autoplay: true, smartSpeed: 1000, margin: 20, navText: ["<i class='flaticon-left'></i>", "<i class='flaticon-right'></i>"], responsive: { 0: { items: 1, }, 768: { items: 1, }, 1200: { items: 1, } } });
    $(window).on('load', function() {
        if ($(".wow").length) {
            var wow = new WOW({ boxClass: 'wow', animateClass: 'animated', offset: 20, mobile: true, live: true, });
            wow.init();
        }
    });
    jQuery(window).on('load', function() { $('.preloader').fadeOut() })
}(jQuery));