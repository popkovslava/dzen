$(document).ready(function(){function e(e){var a=$(e).val(),t=/(&nbsp;)|(\s)|( )/;return""===a||t.test(a)?($(e).parents(".field-wrapper").addClass("error"),$(e).parents(".field-wrapper").addClass("error").append('<span class="msg-error"><span>'+o+"</span></span>"),!1):($(e).parents(".field-wrapper").removeClass("error").find(".msg-error").remove(),!0)}function a(e){var a=$(e).val(),t=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;return""===a?($(e).parents(".field-wrapper").addClass("error").append('<span class="msg-error"><span>'+o+"</span></span>"),!1):t.test(a)?($(e).parents(".field-wrapper").removeClass("error").find(".msg-error").remove(),!0):($(e).parents(".field-wrapper").addClass("error").append('<span class="msg-error"><span>'+n+"</span></span>"),!1)}function t(e){var a=$(window).height(),t=e.offset().top,s=$(window).scrollTop();return a+s>t+300&&s<t+e.height()}function s(){k=new ScrollMagic.Controller,(C=new ScrollMagic.Scene({triggerHook:"onLeave",triggerElement:"#parallax",duration:"100%"}).setPin("#parallax",{pushFollowers:!1})).setTween("#parallax",{y:"-=52%"}),C.on("progress",function(e){var a=$("#parallax").outerHeight();e.progress>(a-130)/a?$(f).addClass("white"):$(f).removeClass("white"),e.progress!==y&&(y=e.progress,setTimeout(function(){$("#parallax").addClass("repaint")},0),setTimeout(function(){$("#parallax").removeClass("repaint")},100))}),k.addScene(C)}if($(".review-slider").slick({centerMode:!0,centerPadding:"0px",slidesToShow:3,responsive:[{breakpoint:768,settings:{centerMode:!0,centerPadding:"3px",slidesToShow:1}}]}),$(".clients-slider").slick({centerMode:!0,slidesToShow:3,arrows:!1,responsive:[{breakpoint:768,settings:{centerMode:!0,centerPadding:"0px",slidesToShow:1,dots:!0}}]}),$(".screenshot-slider").slick({centerMode:!0,centerPadding:"0px",arrows:!0,dots:!0,adaptiveHeight:!0,responsive:[{breakpoint:768,settings:{centerMode:!0,dots:!0,slidesToShow:1,centerPadding:"0px",arrows:!1}}]}),$(".sm-screenshot-slider").slick({centerMode:!0,centerPadding:"0px",arrows:!0,dots:!1,adaptiveHeight:!0,slidesToShow:3,slidersToScroll:1,responsive:[{breakpoint:768,settings:{centerMode:!0,dots:!0,slidesToShow:1,centerPadding:"0px",arrows:!1}}]}),$(".other-projects .projects-gallery").slick({arrows:!1,dots:!1,slidesToShow:3,slidersToScroll:1,responsive:[{breakpoint:768,settings:{centerMode:!0,dots:!0,slidesToShow:1,centerPadding:"0px"}}]}),$(".top-banner-slider").length){$(".top-banner-slider").slick({dots:!1,arrows:!1,infinite:!0,autoplay:!0,autoplaySpeed:1e4,pauseOnHover:!1,speed:0,initialSlide:0,fade:!0,cssEase:"linear"}).slick("slickGoTo",1)}$(".field-wrapper label").on("click",function(){$(this).parent().find(".js-from-field").focus()}),$(".js-from-field").on("focus",function(){$(this).parents(".field-wrapper").addClass("focused")}),$(".js-from-field").on("blur",function(){$(this).val().length<1&&$(this).parents(".field-wrapper").removeClass("focused")}),$("textarea").each(function(e,a){$(a).height(0).height($(a)[0].scrollHeight)}),$("textarea").on("change keyup keydown paste cut",function(e){$(this).height(0).height(this.scrollHeight)}),$(".js_validate").on("submit",function(t){$(this).find('input[type="text"]:required, input[type="email"]:required, input[type="tel"]:required').parents(".field-wrapper").removeClass("error").find(".msg-error").remove();var s=0;$(this).find('input[type="text"]:required').each(function(a,t){e(t)||s++}),$(this).find('input[type="tel"]:required').each(function(a,t){e(t)||s++}),$(this).find('input[type="email"]:required').each(function(e,t){a(t)||s++}),s>0&&t.preventDefault()}),$(".js_validate input, .js_validate textarea").on("keyup",function(){$(this).parents(".field-wrapper").removeClass("error")});var o="Field is required",n="Invalid Email address",r={svgHome1:{strokepath:[{path:"M480 435H90",ease:"easeInExpo",duration:2e3},{path:"M196.94 409.84h176.12a12.58 12.58 0 1 1 0 25.16H196.94a12.58 12.58 0 1 1 0-25.16z",ease:"easeInOutExpo",duration:2e3},{path:"M480 309.19v25.16a25.26 25.26 0 0 1-25.16 25.16H115.16A25.25 25.25 0 0 1 90 334.35v-25.16zm0-239.03v239H90v-239A25.23 25.23 0 0 1 115.16 45h339.68A25.24 25.24 0 0 1 480 70.16z",ease:"easeOutExpo",duration:2e3},{path:"M115.16 70.16h339.68v239.03H115.16z",ease:"easeOutExpo",duration:2e3},{path:"M266.13 334.35h37.74",ease:"easeInOutExpo",duration:2e3},{path:"M203.23 133.06h163.55v176.13H203.23zm25.16 226.45h113.23v50.32H228.39z",ease:"easeInOutExpo",duration:2e3},{path:"M228.39 95.32h113.22a25.21 25.21 0 0 1 25.16 25.16v188.71H203.23V120.48a25.21 25.21 0 0 1 25.16-25.16z",ease:"easeInOutExpo",duration:2e3},{path:"M228.39 189.68v-25.16h25.16m88.06 25.16v-25.16h-25.16m-88.06 88.06v25.16h25.16m88.06-25.16v25.16h-25.16",ease:"easeInOutExpo",duration:2e3},{path:"M253.55 189.68l62.9 62.9m0-62.9l-62.9 62.9",ease:"easeInExpo",duration:2e3},{path:"M410.81 409.84h31.45m-239.03-25.16H152.9m-37.74 0h12.58m31.45 25.16h-31.45",strokeColor:"#c0c8ce",ease:"easeInOutExpo",duration:2e3},{path:"M366.77 384.68h50.33m37.74 0h-12.58",strokeColor:"#c0c8ce",ease:"easeInOutExpo",duration:2e3},{path:"M391.94 189.68h37.74m-37.74-37.74l18.87-12.59m-18.87 88.07L410.81 240m-232.75-50.32h-37.74m37.74-37.74l-18.87-12.59m18.87 88.07L159.19 240",strokeColor:"#5aa8ed",ease:"easeInOutExpo",duration:2e3}],dimensions:{width:570,height:480}}},i={svgHome2:{strokepath:[{path:"M283.43 48.65c-68.85 41.64-97.5 106.71-97.5 174.09 0 38 12.19 77.95 36.56 112.31h121.88c24.38-34.37 36.56-74.33 36.56-112.31 0-67.38-28.65-132.45-97.5-174.09z",ease:"easeInOutExpo",duration:2e3},{path:"M283.43 48.65c-23 13.9-41.48 30.42-55.94 48.75h111.87c-14.45-18.33-32.95-34.85-55.93-48.75zm-91.76 219.7l-30.12 27.1V396h24.38v-24.38l36.56-36.56a199.8 199.8 0 0 1-30.82-66.71zm91.76-24.72A42.66 42.66 0 1 0 240.77 201a42.74 42.74 0 0 0 42.66 42.63z",ease:"easeInOutExpo",duration:2e3},{path:"M375.19 268.35l30.12 27.1V396h-24.38v-24.38l-36.56-36.56a199.92 199.92 0 0 0 30.82-66.71z",ease:"easeInOutExpo",duration:2e3},{path:"M283.43 219.26A18.28 18.28 0 1 0 265.15 201a18.32 18.32 0 0 0 18.28 18.26z",duration:2e3,ease:"easeInExpo"},{path:"M362.18 304.59H204.67",duration:2e3,ease:"easeInExpo"},{path:"M283.43 359.44h-42.66c-18.36 25.78 30.47 48.74 42.66 67 12.19-18.28 61-41.25 42.66-67z",ease:"easeInExpo",duration:2e3},{path:"M222.49 335.06h121.88v24.38H222.49zm60.94 24.38v30.47",duration:2e3},{path:"M411.4 213.18v48.75m-255.94-48.75v48.75",duration:2e3,strokeColor:"#5aa8ed",ease:"easeInExpo"},{path:"M190.13 109.5a158.56 158.56 0 0 0-53 189.08m292.5 0a158.55 158.55 0 0 0-53-189.08",duration:2e3,strokeColor:"#5aa8ed",ease:"easeInExpo"},{path:"M233.71 55.28a188.93 188.93 0 0 0-96.53 301.84m73.13 54.67a187.42 187.42 0 0 0 33.22 10.44m79.8 0a187.58 187.58 0 0 0 33.22-10.44m73.13-54.67a188.93 188.93 0 0 0-96.53-301.84",duration:2e3,strokeColor:"#5aa8ed",ease:"easeInExpo"}],dimensions:{width:570,height:480}}},l={svgHome3:{strokepath:[{path:"M285 331.41A91.41 91.41 0 1 0 193.59 240 91.58 91.58 0 0 0 285 331.41z",duration:1450},{path:"M224.06 308.13a91.39 91.39 0 0 0 121.88 0v-31.57a24.42 24.42 0 0 0-24.37-24.37h-73.13a24.42 24.42 0 0 0-24.37 24.38zM285 227.81a24.38 24.38 0 1 0-24.37-24.37A24.42 24.42 0 0 0 285 227.81zm0 201.1q-9.26 0-18.28-.88v-54a18.28 18.28 0 0 1 36.56 0v54q-9 .87-18.28.88zm0-377.81c-6.17 0-12.26.31-18.28.89v54a18.28 18.28 0 0 0 36.56 0V52c-6-.58-12.12-.89-18.28-.89zM96.09 240q0-9.25.89-18.28h54a18.28 18.28 0 1 1 0 36.56H97q-.87-9-.89-18.28zm377.81 0c0-6.17-.31-12.26-.89-18.28h-54a18.28 18.28 0 1 0 0 36.56h54c.59-6.02.9-12.11.9-18.28z",duration:1450},{path:"M266.75 52A189 189 0 0 0 97 221.75h36.77a152.4 152.4 0 0 1 133-133V52zM97 258.25A189 189 0 0 0 266.75 428v-36.75a152.4 152.4 0 0 1-133-133H97zM303.25 428A189 189 0 0 0 473 258.25h-36.75a152.41 152.41 0 0 1-133 133V428zM473 221.75A189 189 0 0 0 303.25 52v36.75a152.41 152.41 0 0 1 133 133H473z",duration:1450,ease:"easeInExpo"},{path:"M194.51 149.52l8.62 8.61m163.74 163.74l8.61 8.62m-180.97 0l8.62-8.62m163.74-163.74l8.61-8.61",duration:1450,ease:"easeInExpo"},{path:"M473.91 128.43a220.54 220.54 0 0 0-77.34-77.34m-223.14 0a220.57 220.57 0 0 0-77.33 77.34m0 223.14a220.51 220.51 0 0 0 77.33 77.33m223.14 0a220.57 220.57 0 0 0 77.34-77.33",duration:1450,strokeColor:"#5aa8ed",ease:"easeInExpo"}],dimensions:{width:570,height:480}}},p={svgHome4:{strokepath:[{path:"M96.09 197.35L285 428.91l188.91-231.56H96.09z",duration:1250},{path:"M217.97 197.35h134.06L285 99.85l-67.03 97.5zm255.94 0H352.03l60.94-97.5 60.94 97.5zm-255.94 0H96.09l60.94-97.5 60.94 97.5zM285 428.91l-67.03-231.56h134.06L285 428.91m0-329.06H157.03l60.94 97.49L285 99.85z",duration:1450,ease:"easeInExpo"},{path:"M285 99.85h127.98l-60.94 97.49L285 99.85z",duration:1450,ease:"easeInExpo"},{path:"M285 51.09a188 188 0 0 0-92.86 24.38M96.15 236c0 1.34-.05 2.68-.05 4 0 92.75 66.84 169.87 155 185.86m67.89 0c88.13-16 155-93.11 155-185.86 0-1.34 0-2.69-.05-4m-96-160.5A188 188 0 0 0 285 51.09",duration:1450,strokeColor:"#5aa8ed"},{path:"M131.47 279.27a158.79 158.79 0 0 0 84.21 103.23m138.63 0a158.8 158.8 0 0 0 84.22-103.23",duration:1450,strokeColor:"#5aa8ed",ease:"easeInExpo"}],dimensions:{width:570,height:480}}},d=!1;$("#svgHome1").lazylinepainter({svgData:r,strokeWidth:"4px",strokeColor:"#898989",drawSequential:!1}).lazylinepainter("paint"),$("#svgHome1").lazylinepainter("pause"),$("#svgHome1").length&&$(window).on("scroll",function(){t($("#svgHome1"))&&!d?(d=!0,$("#svgHome1").lazylinepainter("resume")):(d=!1,$("#svgHome1").lazylinepainter("pause"))});var h=!1;$("#svgHome2").lazylinepainter({svgData:i,strokeWidth:"4px",strokeColor:"#898989",drawSequential:!1}).lazylinepainter("paint"),$("#svgHome2").lazylinepainter("pause"),$("#svgHome2").length&&$(window).on("scroll",function(){t($("#svgHome2"))&&!h?(h=!0,$("#svgHome2").lazylinepainter("resume")):(h=!1,$("#svgHome2").lazylinepainter("pause"))});var u=!1;$("#svgHome3").lazylinepainter({svgData:l,strokeWidth:"4px",strokeColor:"#898989",drawSequential:!1}).lazylinepainter("paint"),$("#svgHome3").lazylinepainter("pause"),$("#svgHome3").length&&$(window).on("scroll",function(){t($("#svgHome3"))&&!u?(u=!0,$("#svgHome3").lazylinepainter("resume")):(u=!1,$("#svgHome3").lazylinepainter("pause"))});var c=!1;$("#svgHome4").lazylinepainter({svgData:p,strokeWidth:"4px",strokeColor:"#898989",drawSequential:!1}).lazylinepainter("paint"),$("#svgHome4").lazylinepainter("pause"),$("#svgHome4").length&&$(window).on("scroll",function(){t($("#svgHome4"))&&!c?(c=!0,$("#svgHome4").lazylinepainter("resume")):(c=!1,$("#svgHome4").lazylinepainter("pause"))});var m,g=0,v=$(".top-banner"),w=0,f=$(".header"),z=$(".tabs-nav"),H=0;$(z).length&&(H=$(z).offset().top),$(v).length?w=$(v).outerHeight():$(f).addClass("white"),$(".header .nav-mobile #menuToggle input").on("change",function(){this.checked?$(f).addClass("nav-open"):$(f).removeClass("nav-open")}),$(window).on("scroll",function(e){g=$(window).scrollTop(),(!$("#parallax").length||$("#parallax").length&&$(window).width()<1025)&&(!$(v).length||g>180?$(f).addClass("white"):$(f).removeClass("white")),$(z).length&&(g<=H?$(z).removeClass("tabs-nav-fixed").removeAttr("style").parent().removeAttr("style"):$(z).addClass("tabs-nav-fixed").css({top:$(f).outerHeight()-6,position:"fixed"}).parent().css("paddingTop",$(z).outerHeight())),m=g});var x=$(".why-what-img");if($(x).length){var M;$(window).width()>767?(M=!1,x.css("background-image",x.attr("lg-img"))):(M=!0,x.css("background-image",x.attr("sm-img")))}var y=-1,k=new ScrollMagic.Controller,C=new ScrollMagic.Scene;$("#parallax").length&&s(),$(window).innerWidth()<1025&&null!==k&&void 0!==k&&(k=k.destroy(!0)),$(window).on("resize",function(){$(window).width()<1025?null!==k&&void 0!==k&&(k=k.destroy(!0)):null!==k&&void 0!==k||s(),$(x).length&&($(window).width()>767&&M&&(M=!1,x.css("background-image",x.attr("lg-img"))),$(window).width()<767&&!M&&(M=!0,x.css("background-image",x.attr("sm-img")))),$(v).length&&(w=$(v).outerHeight()),$(".clients-slider").each(function(e,a){var t=0;$(a).find(".cients-slider-item").each(function(e,a){var s=$(a).removeAttr("style").height();t<s&&(t=s)}),$(a).find(".cients-slider-item").height(t)})}),$(window).resize(),$("#phone").intlTelInput({initialCountry:"auto",geoIpLookup:function(e){$.get("https://ipinfo.io",function(){},"jsonp").always(function(a){var t=a&&a.country?a.country:"";e(t)})}});var E=function(e){e.removeClass("error")};$("#phone").blur(function(){E($(this)),$.trim($(this).val())&&($(this).intlTelInput("isValidNumber")||$(this).addClass("error"))}),$("#phone").on("keyup change",E($(this))),$(".custom-select").selectric();$("#upload .uploaded-files");$(".js_popup-youtube").magnificPopup({type:"iframe",iframe:{patterns:{youtube:{src:"//www.youtube.com/embed/%id%?autoplay=1&rel=0"}}}})});