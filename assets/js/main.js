(function ($) {
  "use strict";

  const $documentOn = $(document);
  const $windowOn   = $(window);

  $documentOn.ready(function () {

    // $('#menu-menu-1').slicknav();
    $('#menu-main-menu').slicknav();

    //>> Body Overlay
    $(".body-overlay").on("click", function () {
      $(".offcanvas__area").removeClass("offcanvas-opened");
      $(".df-search-area").removeClass("opened");
      $(".body-overlay").removeClass("opened");
    });

    //>> Image / Video Popup
    function initPopup(selector, type = "image", gallery = false) {
      if ($(selector).length) {
        $(selector).magnificPopup({
          type: type,
          gallery: { enabled: gallery },
        });
      }
    }
    initPopup(".img-popup", "image", true);
    initPopup(".img-popup2", "image", true);
    initPopup(".video-popup", "iframe");

    //>> WOW Animation
    if (typeof WOW === "function") {
      new WOW().init();
    }


    //>> Testimonial Slider
    if ($('.testimonial-slider').length) {
      new Swiper(".testimonial-slider", {
        spaceBetween: 30,
        speed: 2000,
        loop: true,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        navigation: {
          prevEl: ".array-prevs",
          nextEl: ".array-nexts",
        },
        breakpoints: {
          1199: { slidesPerView: 3 },
          991: { slidesPerView: 2 },
          767: { slidesPerView: 1 },
          575: { slidesPerView: 1 },
          0: { slidesPerView: 1 },
        },
      });
    }

    //>> Mouse Cursor
    function mousecursor() {
      const e = document.querySelector(".cursor-inner"),
            t = document.querySelector(".cursor-outer");
      if (e && t) {
        let n, i = 0, o = false;
        window.onmousemove = function (s) {
          if (!o) {
            t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)";
          }
          e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)";
          n = s.clientY;
          i = s.clientX;
        };
        $("body").on("mouseenter", "a, .cursor-pointer", function () {
          e.classList.add("cursor-hover"); 
          t.classList.add("cursor-hover");
        });
        $("body").on("mouseleave", "a, .cursor-pointer", function () {
          if (!($(this).is("a") && $(this).closest(".cursor-pointer").length)) {
            e.classList.remove("cursor-hover");
            t.classList.remove("cursor-hover");
          }
        });
        e.style.visibility = "visible";
        t.style.visibility = "visible";
      }
    }
    mousecursor();
    
document.addEventListener('DOMContentLoaded', function() {
    const priceInput = document.getElementById('filter-price');
    const priceDisplay = document.getElementById('price-display');
    const applyBtn = document.getElementById('apply-filters');

    priceInput.addEventListener('input', function() {
        priceDisplay.textContent = this.value;
    });

    applyBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // For now, just log filter data (later, we’ll handle AJAX)
        const destination = document.getElementById('filter-destination').value;
        const duration = document.getElementById('filter-duration').value;
        const price = document.getElementById('filter-price').value;
        console.log({ destination, duration, price });

        // TODO: trigger AJAX filtering here
    });
});


    //>> Back To Top
    $windowOn.on('scroll', function () {
      $("#back-top").toggleClass("show", $(this).scrollTop() > 20);
    });
    $documentOn.on('click', '#back-top', function () {
      $('html, body').animate({ scrollTop: 0 }, 800);
      return false;
    });

  }); // End Document Ready

  // Optional loader call
  if (typeof loader === "function") {
    loader();
  }

})(jQuery);
