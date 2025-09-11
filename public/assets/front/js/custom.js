$(document).ready(function () {
  "use strict";
  $(window).load(function () {
    $("body").imagesLoaded(function () {
      $(".loader-cont").fadeOut();
      $("#loader-overflow").delay(200).fadeOut(700);
    });
  });
  if ($(".sticky-header").length) {
    $(".sticky-header").affix({ offset: { top: 1 } });
  }
  $(".section-heading").closest("section").addClass("adj");
  if ($(".search-bar-outer").length) {
    $(".search-bar-outer").parent(".sub-banner,.main-banner").addClass("mb-85");
  }
  $(".cd-search-trigger").on("click", function () {
    $("#cd-search").slideToggle("is-visible");
    $(".cd-search-trigger").toggleClass("is-visible");
  });
  if ($(".count-number").length) {
    $(".count-number").counterUp({ delay: 10, time: 1000 });
  }
  if ($('input[type="submit"]').length) {
    $('input[type="submit"]').addClass("submit-btn th-bg");
  }
  function cssInit(delay, speed) {
    delay += "ms";
    speed += "ms";
    return {
      "transition-duration": speed,
      "animation-duration": speed,
      "transition-timing-function": "ease",
      "transition-delay": delay,
    };
  }
  $("input,textarea").each(function () {
    $(this).data("holder", $(this).attr("placeholder"));
    $(this).on("focusin", function () {
      $(this).attr("placeholder", "");
    });
    $(this).on("focusout", function () {
      $(this).attr("placeholder", $(this).data("holder"));
    });
  });
  if (mobileDetect == !1) {
    if ($(".sub-banner,.parallax-section").length) {
      $.stellar({
        responsive: !1,
        verticalOffset: 60,
        parallaxElements: !0,
        parallaxBackgrounds: !0,
        hideDistantElements: !1,
        horizontalScrolling: !1,
        scrollProperty: "scroll",
      });
    }
  }
  if (typeof $.fn.dlmenu == "function") {
    $("#responsive-navigation").each(function () {
      $(this)
        .find(".dl-submenu")
        .each(function () {
          if (
            $(this).siblings("a").attr("href") &&
            $(this).siblings("a").attr("href") != "#"
          ) {
            var parent_nav = $('<li class="menu-item parent-menu"></li>');
            parent_nav.append($(this).siblings("a").clone());
            $(this).prepend(parent_nav);
          }
        });
      $(this).dlmenu();
    });
  }
  if ($(".slick-slider").length) {
    $(".slick-slider").on("init", function (e, slick) {
      var $firstAnimatingElements = $(".slick-slide:first-child").find(
        "[data-animation]"
      );
      doAnimations($firstAnimatingElements);
    });
    $(".slick-slider").on(
      "beforeChange",
      function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $(
          '.slick-slide[data-slick-index="' + nextSlide + '"]'
        ).find("[data-animation]");
        doAnimations($animatingElements);
      }
    );
    function doAnimations(elements) {
      var animationEndEvents =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
          "animation-delay": $animationDelay,
          "-webkit-animation-delay": $animationDelay,
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }
  if ($(".list-slider").length) {
    $(".list-slider").slick({
      slidesToShow: 3,
      easing: "linear",
      speed: 1000,
      responsive: [
        { breakpoint: 1200, settings: { slidesToShow: 2 } },
        { breakpoint: 992, settings: { slidesToShow: 2 } },
        { breakpoint: 768, settings: { slidesToShow: 1 } },
        { breakpoint: 481, settings: { slidesToShow: 1 } },
      ],
    });
  }
  if ($(".gallery-slider").length) {
    $(".gallery-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: !0,
      autoplaySpeed: 1000,
      responsive: [
        { breakpoint: 1200, settings: { slidesToShow: 2 } },
        { breakpoint: 992, settings: { slidesToShow: 2 } },
        { breakpoint: 768, settings: { slidesToShow: 1 } },
        { breakpoint: 481, settings: { slidesToShow: 1 } },
      ],
    });
  }
  if ($(".bg-slider").length) {
    $(".bg-slider").slick({
      autoplay: !0,
      autoplaySpeed: 7000,
      dots: !1,
      infinite: !0,
      speed: 500,
      fade: !0,
      cssEase: "linear",
      lazyLoad: "ondemand",
      lazyLoadBuffer: 0,
    });
  }
  if ($(".testimonial").length) {
    $(".testimonial").slick({ arrows: !1, dots: !1, fade: !0 });
  }
  if ($(".news-slider").length) {
    $(".news-slider").slick({ arrows: !0, dots: !1, fade: !1, speed: 1500, slidesToShow: 4});
  }
  if ($(".destination-slider").length) {
    $(".destination-slider").slick({ arrows: !0, dots: !1, fade: !0 });
  }
  if ($(".slider").length) {
    $(".slider").slick({
      dots: !1,
      fade: !0,
      speed: 900,
      arrows: !1,
      infinite: !0,
      draggable: !0,
      touchThreshold: 100,
      // prevArrow: $('.custom-prev'),
      // nextArrow: $('.custom-next'),
    });
  }
  if ($(".team_slider").length) {
    $(".team_slider").slick({
      dots: !1,
      fade: !0,
      speed: 900,
      arrows: !0,
      infinite: !0,
      draggable: !0,
      touchThreshold: 100,
    });
  }
  if ($(".brand-slider").length) {
    $(".brand-slider").slick({
      slidesToShow: 5.2,
      autoplay: !0,
      autoplaySpeed: 3000,
      dots: !0,
      prevArrow: $('.custom-prev'),
      nextArrow: $('.custom-next'),
      responsive: [
        { breakpoint: 992, settings: { slidesToShow: 3 } },
        { breakpoint: 768, settings: { slidesToShow: 3 } },
        { breakpoint: 481, settings: { slidesToShow: 1 } },
      ],
    });
  }
  if ($(".map-canvas").length) {
    initMap();
  }
  function initMap() {
    var gmMapDiv = $(".map-canvas");
    (function ($) {
      var gmCenterAddress = gmMapDiv.attr("data-address");
      var gmMarkerAddress = gmMapDiv.attr("data-address");
      var gmstreetViewControl = gmMapDiv.attr("data-view");
      gmMapDiv.gmap3({
        action: "init",
        marker: {
          address: gmMarkerAddress,
          options: { icon: "../images/loc-marker.png" },
        },
        map: {
          options: {
            zoom: 17,
            zoomControl: !0,
            zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL },
            mapTypeControl: !0,
            scaleControl: !1,
            scrollwheel: !1,
            streetViewControl: gmstreetViewControl,
            draggable: !0,
            styles: [
              {
                featureType: "administrative.country",
                elementType: "geometry",
                stylers: [{ visibility: "simplified" }, { hue: "#ff0000" }],
              },
            ],
          },
        },
      });
    })(jQuery);
  }
  $(function () {
    "use strict";
    var $form = $("#mc-embedded-subscribe-form");
    $("#mc-embedded-subscribe").on("click", function (event) {
      if (event) event.preventDefault();
      register($form);
    });
  });
  function register($form) {
    $.ajax({
      type: $form.attr("method"),
      url: $form.attr("action"),
      data: $form.serialize(),
      cache: !1,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      error: function (err) {
        $("#notification_container").html(
          '<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Could not connect to server. Please try again later.</div>'
        );
      },
      success: function (data) {
        if (data.result != "success") {
          var message = data.msg;
          $("#notification_container").html(
            '<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
              message +
              "</div>"
          );
        } else {
          var message = data.msg;
          $("#notification_container").html(
            '<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
              message +
              "</div>"
          );
        }
      },
    });
  }
});

$('.counter').countUp();
AOS.init();