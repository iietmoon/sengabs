var StaxCounter = StaxCounter || {};

(function ($) {
  // USE STRICT
  "use strict";

  StaxCounter.fn = {
    init: function () {
      StaxCounter.fn.init();
    },

    init: function () {
      $(".stx-counter-wrapper").each(function () {
        StaxCounter.fn.initItem($(this));
      });
    },

    initItem: function ($currentItem) {
      var $counterElement = $currentItem.find(".stx-m-digit"),
        options = StaxCounter.fn.generateOptions($currentItem);

      StaxCounter.fn.isInViewport($currentItem, function () {
        StaxCounter.fn.counterScript($counterElement, options);
      });
    },

    generateOptions: function ($counter) {
      var options = {};
      options.start =
        typeof $counter.data("start-digit") !== "undefined" &&
        $counter.data("start-digit") !== ""
          ? $counter.data("start-digit")
          : 0;
      options.end =
        typeof $counter.data("end-digit") !== "undefined" &&
        $counter.data("end-digit") !== ""
          ? $counter.data("end-digit")
          : null;
      options.step = 1;
      options.delay = 100;
      options.txt =
        typeof $counter.data("digit-label") !== "undefined" &&
        $counter.data("digit-label") !== ""
          ? String($counter.data("digit-label"))
          : "";

      return options;
    },

    counterScript: function ($counterElement, options) {
      var defaults = {
        start: 0,
        end: null,
        step: 1,
        delay: 50,
        txt: "",
      };

      var settings = $.extend(defaults, options || {});
      var nb_start = settings.start;
      var nb_end = settings.end;

      $counterElement.text(nb_start + settings.txt);

      var counterInterval = setInterval(function () {
        if (nb_end !== null && nb_start >= nb_end) {
          return;
        }

        nb_start = nb_start + settings.step;

        if (nb_start >= nb_end) {
          nb_start = nb_end;
          clearInterval(counterInterval);
        }

        $counterElement.text(nb_start + settings.txt);
      }, settings.delay);

      var counter = function () {
        if (nb_end !== null && nb_start >= nb_end) {
          return;
        }

        nb_start = nb_start + settings.step;

        if (nb_start >= nb_end) {
          nb_start = nb_end;
        }

        $counterElement.text(nb_start + settings.txt);
      };
    },

    isInViewport: function ($element, callback, onlyOnce) {
      if ($element.length) {
        var offset =
          typeof $element.data("viewport-offset") !== "undefined"
            ? $element.data("viewport-offset")
            : 0.15;
        var observer = new IntersectionObserver(
          function (entries) {
            if (entries[0].isIntersecting === true) {
              callback.call($element);
              if (onlyOnce !== false) {
                observer.disconnect();
              }
            }
          },
          { threshold: [offset] }
        );
        observer.observe($element[0]);
      }
    },
  };

  StaxCounter.fn.init();
})(jQuery);
