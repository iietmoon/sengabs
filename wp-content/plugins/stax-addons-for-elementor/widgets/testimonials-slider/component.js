var StaxTestimonialsSlider = StaxTestimonialsSlider || {};

(function ($) {
  // USE STRICT
  "use strict";

  StaxTestimonialsSlider.fn = {
    init: function () {
      $(".stx-testimonials-slider-wrapper").each(function () {
        StaxTestimonialsSlider.fn.initSlider($(this));
      });
    },

    initSlider: function ($currentItem) {
      var options = StaxTestimonialsSlider.fn.getOptions($currentItem),
        events = StaxTestimonialsSlider.fn.getEvents($currentItem, options);

      var $swiper = new Swiper($currentItem, Object.assign(options, events));
    },

    getOptions: function ($holder) {
      var sliderOptions =
          typeof $holder.data("options") !== "undefined"
            ? $holder.data("options")
            : {},
        spaceBetween =
          sliderOptions.spaceBetween !== undefined &&
          sliderOptions.spaceBetween !== ""
            ? sliderOptions.spaceBetween
            : 0,
        spaceBetweenTablet =
          sliderOptions.spaceBetweenTablet !== undefined &&
          sliderOptions.spaceBetweenTablet !== ""
            ? sliderOptions.spaceBetweenTablet
            : 0,
        spaceBetweenMobile =
          sliderOptions.spaceBetweenMobile !== undefined &&
          sliderOptions.spaceBetweenMobile !== ""
            ? sliderOptions.spaceBetweenMobile
            : 0,
        slidesPerView =
          sliderOptions.slidesPerView !== undefined &&
          sliderOptions.slidesPerView !== ""
            ? "auto" === sliderOptions.slidesPerView
              ? "auto"
              : parseInt(sliderOptions.slidesPerView)
            : 1,
        slidesPerViewTablet =
          sliderOptions.slidesPerViewTablet !== undefined &&
          sliderOptions.slidesPerViewTablet !== ""
            ? "auto" === sliderOptions.slidesPerViewTablet
              ? "auto"
              : parseInt(sliderOptions.slidesPerViewTablet)
            : 1,
        slidesPerViewMobile =
          sliderOptions.slidesPerViewMobile !== undefined &&
          sliderOptions.slidesPerViewMobile !== ""
            ? "auto" === sliderOptions.slidesPerViewMobile
              ? "auto"
              : parseInt(sliderOptions.slidesPerViewMobile)
            : 1,
        centeredSlides =
          sliderOptions.centeredSlides !== undefined &&
          sliderOptions.centeredSlides !== ""
            ? sliderOptions.centeredSlides
            : false,
        sliderScroll =
          sliderOptions.sliderScroll !== undefined &&
          sliderOptions.sliderScroll !== ""
            ? sliderOptions.sliderScroll
            : false,
        effect =
          sliderOptions.effect !== undefined && sliderOptions.effect !== ""
            ? sliderOptions.effect
            : "slide",
        loop =
          sliderOptions.loop !== undefined && sliderOptions.loop !== ""
            ? sliderOptions.loop
            : true,
        autoplay =
          sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== ""
            ? sliderOptions.autoplay
            : true,
        speed =
          sliderOptions.speed !== undefined && sliderOptions.speed !== ""
            ? parseInt(sliderOptions.speed, 10)
            : 5000,
        speedAnimation =
          sliderOptions.speedAnimation !== undefined &&
          sliderOptions.speedAnimation !== ""
            ? parseInt(sliderOptions.speedAnimation, 10)
            : 800,
        outsideNavigation =
          sliderOptions.outsideNavigation !== undefined &&
          sliderOptions.outsideNavigation === "yes",
        nextNavigation = outsideNavigation
          ? ".swiper-button-next-" + sliderOptions.unique
          : $holder.find(".swiper-button-next"),
        prevNavigation = outsideNavigation
          ? ".swiper-button-prev-" + sliderOptions.unique
          : $holder.find(".swiper-button-prev"),
        outsidePagination =
          sliderOptions.outsidePagination !== undefined &&
          sliderOptions.outsidePagination === "yes",
        pagination = outsidePagination
          ? ".swiper-pagination-" + sliderOptions.unique
          : $holder.find(".swiper-pagination");

      if (autoplay !== false && speed !== 5000) {
        autoplay = {
          delay: speed,
          disableOnInteraction: false,
        };
      } else if (autoplay !== false) {
        autoplay = {
          disableOnInteraction: false,
        };
      }

      var options = {
        slidesPerView: slidesPerView,
        centeredSlides: centeredSlides,
        sliderScroll: sliderScroll,
        loopedSlides: "12",
        spaceBetween: spaceBetween,
        effect: effect,
        autoplay: autoplay,
        loop: loop,
        speed: speedAnimation,
        navigation: { nextEl: nextNavigation, prevEl: prevNavigation },
        pagination: { el: pagination, type: "bullets", clickable: true },
        grabCursor: true,
        breakpoints: {
          "@0.00": {
            slidesPerView: slidesPerViewMobile,
            spaceBetween: spaceBetweenMobile,
          },
          "@0.75": {
            slidesPerView: slidesPerViewTablet,
            spaceBetween: spaceBetweenTablet,
          },
          "@1.00": {
            slidesPerView: slidesPerView,
            spaceBetween: spaceBetween,
          },
        },
      };

      return Object.assign(
        options,
        StaxTestimonialsSlider.fn.getSliderDatas($holder)
      );
    },

    getSliderDatas: function ($holder) {
      var dataList = $holder.data(),
        returnValue = {};

      for (var property in dataList) {
        if (dataList.hasOwnProperty(property)) {
          if (
            property !== "options" &&
            typeof dataList[property] !== "undefined" &&
            dataList[property] !== ""
          ) {
            returnValue[property] = dataList[property];
          }
        }
      }

      return returnValue;
    },

    getEvents: function ($holder, options) {
      return {
        on: {
          init: function () {
            $holder.addClass("stx-swiper--initialized");

            if (options.sliderScroll) {
              var scrollStart = false;

              $holder.on("mousewheel", function (e) {
                e.preventDefault();

                if (!scrollStart) {
                  scrollStart = true;

                  if (e.deltaY < 0) {
                    $holder[0].swiper.slideNext();
                  } else {
                    $holder[0].swiper.slidePrev();
                  }

                  setTimeout(function () {
                    scrollStart = false;
                  }, 1000);
                }
              });
            }
          },
        },
      };
    },
  };

  StaxTestimonialsSlider.fn.init();
})(jQuery);
