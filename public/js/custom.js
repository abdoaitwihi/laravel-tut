/* addig class when scrolling down */
$(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 10) {
        $(".smart-scroll").addClass("nav-scrooled");
    } else {
        $(".smart-scroll").removeClass("nav-scrooled");
    }
});
/* setting height for home carousel */
let homeBannerHeight = $(window).height() - $("header").outerHeight();
$(".banner").css("height", homeBannerHeight);
$(".home-banner").css("height", homeBannerHeight);

/* end of addig class when scrolling down */
$(document).ready(function () {
    var review = $(".details-carousel");
    if (review.length) {
        review.owlCarousel({
            items: 3,
            loop: true,

            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 3000,
            nav: true,
            navText: ["", ""],
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                991: {
                    items: 4,
                },
            },
        });
    }
    var references = $(".references-carousel");
    if (references.length) {
        references.owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 2000,
            nav: false,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                991: {
                    items: 4,
                },
            },
        });
    }
    var testemonials = $(".testemonials-carousel");
    if (testemonials.length) {
        testemonials.owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 2000,
            nav: true,
            navText: ["", ""],
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 1,
                },
                991: {
                    items: 2,
                },
            },
        });
    }

    // top menu hovering
    let activeItem;

    $("#your-needs").hover(
        function () {
            // over
            $(".sub-menu").addClass("show-sub-menu");
        },
        function () {
            // out
            $(".sub-menu").removeClass("show-sub-menu");
        }
    );
    $(".sub-menu").hover(
        function () {
            // over
            $(".sub-menu").addClass("show-sub-menu");
        },
        function () {
            // out
            $(".sub-menu").removeClass("show-sub-menu");
        }
    );
    $(".poles-urls").hover(
        function () {
            // over
            $(".services-urls").hide();
            let toShow = $(this).attr("data-pole");
            activeItem = $(`.services-urls[data-pole*=${toShow}]`);
            activeItem.fadeIn();
        },
        function () {
            // out
            if ($(".sub-meu:hover").length != 0) {
                activeItem.fadeOut();
            }
        }
    );
    // Mobile Navigation
    if ($(".your-needs").length) {
        var $mobile_nav = $(".your-needs").clone().prop({
            class: "mobile-nav-needs-links d-lg-none",
            style: "display : none",
        });
        $("body").append($mobile_nav);
        $(".mobile-nav-needs-links").prepend(
            `<div class="text-right">
            <button style="display : none" type="button" class="mobile-nav-needs-links-toggle d-lg-none">
                <img src="/assets/icons/close-line.svg" alt="">
            </button>
            </div>
            `
        );
    }
    $("#your-needs").click(function (e) {
        e.preventDefault();
        $(".mobile-nav-needs-links").fadeIn();
        $(".mobile-nav-needs-links-toggle").fadeIn();
    });
    $(".mobile-nav-needs-links .pole-link").click(function (e) {
        e.preventDefault();
        let toShow = $(this).attr("data-pole");
        activeItem = $(`.services-urls[data-pole*=${toShow}]`);
        activeItem.toggle();
        activeItem.toggleClass("animate-in");
    });
    $(".mobile-nav-needs-links-toggle").click(function (e) {
        e.preventDefault();
        $(".mobile-nav-needs-links").fadeOut();
        $(".mobile-nav-needs-links-toggle").fadeOut();
    });
});
