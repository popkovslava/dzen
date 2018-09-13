require('slick-carousel');
// !!! If Not if not needed parallax delete code !!!!

import { TweenMax, TimelineMax, Linear } from "gsap";
import ScrollMagic from 'scrollmagic';
import 'animation.gsap';

// !!! AND If Not if not needed parallax delete code !!!!

$(document).ready(function () {

    $('.review-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        rows: 0,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: true,
                centerPadding: '3px',
                slidesToShow: 1
            }
        }]
    });

    $('.clients-slider').slick({
        centerMode: true,
        slidesToShow: 3,
        arrows: false,
        rows: 0,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1,
                dots: true
            }
        }]
    })
    $('.screenshot-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        arrows: true,
        dots: true,
        adaptiveHeight: true,
        rows: 0,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: true,
                dots: true,
                slidesToShow: 1,
                centerPadding: '0px',
                arrows: false
            }
        }]
    });
    $('.sm-screenshot-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        slidesToShow: 3,
        slidersToScroll: 1,
        rows: 0,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: true,
                dots: true,
                slidesToShow: 1,
                centerPadding: '0px',
                arrows: false
            }
        }]
    });
    $('.other-projects .projects-gallery').slick({
        arrows: false,
        dots: false,
        slidesToShow: 3,
        slidersToScroll: 1,
        rows: 0,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: true,
                dots: true,
                slidesToShow: 1,
                centerPadding: '0px'
            }
        }]
    });
    if ($('.top-banner-slider').length) {
        var $sliderTop;
        $sliderTop = $('.top-banner-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 10000,
            pauseOnHover: false,
            speed: 0,
            initialSlide: 0,
            rows: 0,
            fade: true,
            cssEase: 'linear'
        });
        $sliderTop.slick('slickGoTo', 1);
    }

    $('.slick-slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        instanceLayzr.check();
    });



    // !!! If Not if not needed parallax delete code !!!!

    /* parallax effect */
    var u = -1;
    var controller = new ScrollMagic.Controller();
    var scene = new ScrollMagic.Scene();

    if ($('#parallax').length) {
        initParallax();
    }

    function initParallax() {
        controller = new ScrollMagic.Controller();
        scene = new ScrollMagic.Scene({
            triggerHook: "onLeave",
            triggerElement: "#parallax",
            duration: '90%'
        }).setPin(
            "#parallax",
            { pushFollowers: !1 }
        );
        scene.setTween("#parallax", { y: "-=52%" });
        scene.on("progress", function (e) {
            var l = $('#parallax').outerHeight();
            e.progress > (l - 190) / l ? $('.header').addClass('white') : $('.header').removeClass('white');
            e.progress !== u && (u = e.progress, setTimeout(function () {
                $('#parallax').addClass("repaint")
            }, 0), setTimeout(function () {
                $('#parallax').removeClass("repaint")
            }, 100))
        });
        controller.addScene(scene);
    }

    if ($(window).innerWidth() < 1025) {
        if (controller !== null && controller !== undefined) {
            controller = controller.destroy(true);
        }
    }

    // !!! AND If Not if not needed parallax delete code !!!!
    $(window).on('resize', function () {


        // !!! If Not if not needed parallax delete code !!!!
        if ($('#parallax').length) {
            // disable parallax if width < 1025
            if ($(window).width() < 1025) {
                if (controller !== null && controller !== undefined) {
                    controller = controller.destroy(true);
                }
            } else {
                if (controller === null || controller === undefined) {
                    initParallax();
                }
            }
        }

        // !!! AND If Not if not needed parallax delete code !!!!
    });

});