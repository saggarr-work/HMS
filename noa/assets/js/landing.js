function resetData(){$("#myonoffswitch23").prop("checked",!0),$("#myonoffswitch1").prop("checked",!0),$("body").addClass("ltr"),$(".slick-slider").slick("slickSetOption","rtl",!1),$("html[lang=en]").attr("dir","ltr"),$("body").removeClass("rtl"),$("head link#style").attr("href",$(this)),document.getElementById("style").setAttribute("href","https://laravel8.spruko.com/noa/assets/plugins/bootstrap/css/bootstrap.min.css");var e=$(".owl-carousel");$.each(e,(function(e,o){var t=$(o).data("owl.carousel");t.settings.rtl=!1,t.options.rtl=!1,$(o).trigger("refresh.owl.carousel")})),$("body").removeClass("dark-mode"),$("body").addClass("light-mode"),$("#myonoffswitch3").prop("checked",!0),$("#myonoffswitch6").prop("checked",!0),localStorage.clear()}!function(e){"use strict";window.addEventListener("load",(function(o){e("#global-loader").fadeOut("slow")})),e(window).on("scroll",(function(o){e(this).scrollTop()>0?e("#back-to-top").fadeIn("slow"):e("#back-to-top").fadeOut("slow"),e(window).scrollTop()>=10?(e(".horizontal-main").addClass("fixed-header"),e(".horizontal-main").addClass("visible-title"),document.querySelector(".demo-screen-headline").style.paddingTop="70px"):(e(".horizontal-main").removeClass("fixed-header"),e(".horizontal-main").removeClass("visible-title"),document.querySelector(".demo-screen-headline").style.paddingTop="0px")})),e("#back-to-top").on("click",(function(o){return e("html, body").animate({scrollTop:0},0),!1})),e(document).on("ready",(function(){e("#myCarousel").carousel({interval:3e3})})),e(".testimonial-owl-carousel2").owlCarousel({margin:25,loop:!0,nav:!1,autoplay:!0,dots:!1,animateOut:"fadeOut",smartSpeed:150,responsive:{0:{items:1},600:{items:2},1300:{items:3}}}),e(".owl-carousel-icons2").owlCarousel({loop:!0,rewind:!1,margin:25,animateIn:"fadeInDowm",animateOut:"fadeOutDown",autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!0,dots:!1,nav:!0,autoplay:!0,responsiveClass:!0,responsive:{0:{items:1,nav:!0},600:{items:2,nav:!0},1300:{items:4,nav:!0}}});try{new Tobii}catch(e){}e(".testimonial-owl-carousel3").owlCarousel({margin:25,loop:!0,nav:!1,autoplay:!0,dots:!0,responsive:{0:{items:1}}}),e(".customer-logos").slick({slidesToShow:6,slidesToScroll:1,autoplay:!0,autoplaySpeed:1e3,arrows:!1,dots:!1,pauseOnHover:!1,responsive:[{breakpoint:768,settings:{slidesToShow:3}},{breakpoint:520,settings:{slidesToShow:2}}]}),e(".responsive-screens").slick({slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3,arrows:!1,dots:!1,pauseOnHover:!1,responsive:[{breakpoint:768,settings:{slidesToShow:1}},{breakpoint:520,settings:{slidesToShow:1}}]}),e(".testi1").owlCarousel({loop:!0,margin:30,nav:!1,dots:!0,autoplay:!0,responsiveClass:!0,responsive:{0:{items:1,nav:!1},1024:{items:2}}}),e(".banner-carousel").owlCarousel({loop:!0,margin:30,nav:!1,dots:!0,autoplay:!0,responsiveClass:!0,responsive:{0:{items:1},600:{items:1},1300:{items:1}}});e(document).on("click",'[data-bs-toggle="card-collapse"]',(function(o){return e(this).closest("div.card").toggleClass("card-collapsed"),o.preventDefault(),!1}));function o(e){const o=document.querySelectorAll(".nav-scroll"),t=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop;for(let e=0;e<o.length;e++){const s=o[e],l=s.getAttribute("href"),a=document.querySelector(l),r=t+73;a.offsetTop<=r&&a.offsetTop+a.offsetHeight>r?(document.querySelector(".nav-scroll").classList.remove("active"),s.classList.add("active")):s.classList.remove("active")}}document.querySelectorAll(".nav-scroll").forEach((e=>{e.addEventListener("click",(o=>{o.preventDefault(),document.querySelector(e.getAttribute("href")).scrollIntoView({behavior:"smooth",offsetTop:-59})}))})),window.document.addEventListener("scroll",o);[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e){return new bootstrap.Tooltip(e)}));function t(){for(var e=document.querySelectorAll(".reveal"),o=0;o<e.length;o++){var t=window.innerHeight;e[o].getBoundingClientRect().top<t-150?e[o].classList.add("active"):e[o].classList.remove("active")}}function o(e){const o=document.querySelectorAll(".side-menu__item"),t=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop;o.forEach((e=>{const o=e.getAttribute("href"),s=document.querySelector(o),l=t+73;s.offsetTop<=l&&s.offsetTop+s.offsetHeight>l?e.classList.add("active"):e.classList.remove("active")}))}if(window.addEventListener("scroll",t),t(),window.document.addEventListener("scroll",o),jQuery(".demo-icon").click((function(){e(".demo_changer").hasClass("active")?e(".demo_changer").animate({right:"-280px"},(function(){e(".demo_changer").removeClass("active")})):e(".demo_changer").animate({right:"0px"},(function(){e(".demo_changer").addClass("active")}))})),e(document).on("click",".page",(function(){e(".demo_changer").hasClass("active")&&e(".demo_changer").animate({right:"-280px"},(function(){e(".demo_changer").removeClass("active")}))})),e("#myonoffswitch24").on("click",(function(){if(this.checked){e("body").addClass("rtl"),e(".slick-slider").slick("slickSetOption","rtl",!0),e("html[lang=en]").attr("dir","rtl"),e("body").removeClass("ltr"),e("head link#style").attr("href",e(this)),document.getElementById("style").setAttribute("href","https://laravel8.spruko.com/noa/assets/plugins/bootstrap/css/bootstrap.rtl.min.css");var o=e(".owl-carousel");e.each(o,(function(o,t){var s=e(t).data("owl.carousel");s.settings.rtl=!0,s.options.rtl=!0,e(t).trigger("refresh.owl.carousel")})),localStorage.setItem("noartl",!0),localStorage.removeItem("noaltr")}})),e("#myonoffswitch23").on("click",(function(){if(this.checked){e("body").addClass("ltr"),e(".slick-slider").slick("slickSetOption","rtl",!1),e("html[lang=en]").attr("dir","ltr"),e("body").removeClass("rtl"),e("head link#style").attr("href",e(this)),document.getElementById("style").setAttribute("href","https://laravel8.spruko.com/noa/assets/plugins/bootstrap/css/bootstrap.min.css");var o=e(".owl-carousel");e.each(o,(function(o,t){var s=e(t).data("owl.carousel");s.settings.rtl=!1,s.options.rtl=!1,e(t).trigger("refresh.owl.carousel")})),localStorage.setItem("noaltr",!0),localStorage.removeItem("noartl")}})),e(document).on("click","#myonoffswitch1",(function(){this.checked&&(e("body").removeClass("dark-mode"),e("body").addClass("light-mode"),e("#myonoffswitch3").prop("checked",!0),e("#myonoffswitch6").prop("checked",!0),localStorage.removeItem("noadarkMode"))})),e(document).on("click","#myonoffswitch2",(function(){this.checked&&(e("body").addClass("dark-mode"),e("body").removeClass("light-mode"),e("#myonoffswitch5").prop("checked",!0),e("#myonoffswitch8").prop("checked",!0),localStorage.setItem("noadarkMode",!0))})),e(document).on("click",'[data-bs-toggle="sidebar"]',(function(o){o.preventDefault(),e(".app").toggleClass("sidenav-toggled")})),window.innerWidth<=992&&e("body").removeClass("sidenav-toggled"),localStorage.getItem("noartl")&&e("body").addClass("rtl"),localStorage.getItem("noadarkMode")&&e("body").addClass("dark-mode"),e("body").hasClass("rtl")){e(".slick-slider").slick("slickSetOption","rtl",!0),e("#slide-left").removeClass("d-none"),e("#slide-right").removeClass("d-none"),e("html[lang=en]").attr("dir","rtl"),e("body").removeClass("ltr"),e("head link#style").attr("href",e(this)),document.getElementById("style").setAttribute("href","https://laravel8.spruko.com/noa/assets/plugins/bootstrap/css/bootstrap.rtl.min.css");var s=e(".owl-carousel");e.each(s,(function(o,t){var s=e(t).data("owl.carousel");s.settings.rtl=!0,s.options.rtl=!0,e(t).trigger("refresh.owl.carousel")})),e("#myonoffswitch24").prop("checked",!0)}e("body").hasClass("dark-mode")&&(e("body").removeClass("light-mode"),e("#myonoffswitch2").prop("checked",!0))}(jQuery);
