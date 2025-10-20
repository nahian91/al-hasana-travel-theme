(function ($) {
  "use strict";

  document.addEventListener('DOMContentLoaded', function () {
    // Open modal automatically
    var sliderModal = new bootstrap.Modal(document.getElementById('sliderModal'));
    sliderModal.show();

    // Start carousel auto sliding
    var myCarousel = document.querySelector('#modalCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000,  // Slide every 3 seconds
        ride: 'carousel', // Autoplay
        wrap: true        // Loop slides
    });
});

  const $documentOn = $(document);
  const $windowOn   = $(window);

  $documentOn.ready(function () {

    //============================
    // 1. SlickNav Mobile Menu
    //============================
    if ($('#menu-main-menu').length) {
      $('#menu-main-menu').slicknav({
        prependTo: '.mobile-menu-wrap', 
        allowParentLinks: true,
        label: ''
      });
    }

    //============================
    // 2. Body Overlay Close
    //============================
    $(".body-overlay").on("click", function () {
      $(".offcanvas__area").removeClass("offcanvas-opened");
      $(".df-search-area").removeClass("opened");
      $(".body-overlay").removeClass("opened");
    });

    //============================
    // 3. SVG Chevron Arrows + Submenu Toggle
    //============================
    $(".menu-item-has-children > a").each(function() {
      var $link = $(this);
      var $parent = $link.parent();

      // Create SVG chevron if not exists
      if (!$link.find("svg.chevron-icon").length) {
        var svgNS = "http://www.w3.org/2000/svg";
        var svg = document.createElementNS(svgNS, "svg");
        svg.setAttribute("class", "chevron-icon");
        svg.setAttribute("width", "12");
        svg.setAttribute("height", "12");
        svg.setAttribute("viewBox", "0 0 448 512");
        svg.style.marginLeft = "5px";
        svg.style.marginTop = "3px";
        svg.style.transition = "transform 0.3s ease";

        var path = document.createElementNS(svgNS, "path");
        // Font Awesome Chevron Down Path
        path.setAttribute("d", "M207.029 381.476L12.686 187.029c-9.373-9.373-9.373-24.569 0-33.941l22.627-22.627c9.357-9.357 24.522-9.375 33.901-.04L224 284.118l154.786-154.697c9.379-9.335 24.544-9.317 33.901.04l22.627 22.627c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.373-24.569 9.373-33.942 0z");
        path.setAttribute("fill", "currentColor");

        svg.appendChild(path);
        $link.append(svg);

        // Inline styles for link
        $link.css({
          position: 'relative',
          paddingRight: '20px',
          display: 'inline-flex',
          alignItems: 'center'
        });

        // Toggle submenu on click (desktop)
        $link.on("click", function(e) {
          if ($(window).width() > 991) {
            e.preventDefault();
            var $submenu = $parent.children(".sub-menu");
            $submenu.slideToggle(300);
            svg.style.transform = $submenu.is(":visible") ? "rotate(180deg)" : "rotate(0deg)";
          }
        });

        // Optional: rotate arrow on hover (desktop)
        $parent.hover(
          function() { if ($(window).width() > 991) svg.style.transform = "rotate(180deg)"; },
          function() { if ($(window).width() > 991) svg.style.transform = "rotate(0deg)"; }
        );
      }
    });

    //============================
    // 4. Back To Top Button
    //============================
    $windowOn.on('scroll', function () {
      $("#back-top").toggleClass("show", $(this).scrollTop() > 20);
    });
    $documentOn.on('click', '#back-top', function () {
      $('html, body').animate({ scrollTop: 0 }, 800);
      return false;
    });

    //============================
    // 5. Image / Video Popup
    //============================
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

    //============================
    // 6. Testimonial Slider
    //============================
    if ($('.testimonial-slider').length) {
      new Swiper(".testimonial-slider", {
        spaceBetween: 30,
        speed: 2000,
        loop: true,
        autoplay: { delay: 2000, disableOnInteraction: false },
        navigation: { prevEl: ".array-prevs", nextEl: ".array-nexts" },
        breakpoints: {
          1199: { slidesPerView: 3 },
          991: { slidesPerView: 2 },
          767: { slidesPerView: 1 },
          575: { slidesPerView: 1 },
          0: { slidesPerView: 1 },
        },
      });
    }

    //============================
    // 7. Price Filter Example
    //============================
    const priceInput = document.getElementById('filter-price');
    const priceDisplay = document.getElementById('price-display');
    const applyBtn = document.getElementById('apply-filters');

    if (priceInput && priceDisplay && applyBtn) {
      priceInput.addEventListener('input', function() {
        priceDisplay.textContent = this.value;
      });

      applyBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const destination = document.getElementById('filter-destination').value;
        const duration = document.getElementById('filter-duration').value;
        const price = document.getElementById('filter-price').value;
        console.log({ destination, duration, price });
        // TODO: handle AJAX filtering
      });
    }

    //============================
    // 8. WOW Animation
    //============================
    if (typeof WOW === "function") {
      new WOW().init();
    }

  }); // End Document Ready

})(jQuery);
