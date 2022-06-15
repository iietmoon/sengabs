var StaxAccordion = StaxAccordion || {};

(function ($) {
  // USE STRICT
  "use strict";

  StaxAccordion.fn = {
    init: function () {
      $(".stx-accordion-wrapper").each(function () {
        StaxAccordion.fn.initItem($(this));
      });
    },

    initItem: function ($currentItem) {
      if ($currentItem.hasClass("stx-behaviour-accordion")) {
        StaxAccordion.fn.initAccordion($currentItem);
      }

      if ($currentItem.hasClass("stx-behaviour-toggle")) {
        StaxAccordion.fn.initToggle($currentItem);
      }

      $currentItem.addClass("stx-init");
    },

    initAccordion: function ($accordion) {
      $accordion.accordion({
        animate: "swing",
        collapsible: true,
        active: 0,
        icons: "",
        heightStyle: "auto",
      });
    },

    initToggle: function ($toggle) {
      var $toggleAccordionTitle = $toggle.find(".stx-e-title-holder"),
        $toggleAccordionContent = $toggleAccordionTitle.next();

      $toggle.addClass(
        "accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset"
      );
      $toggleAccordionTitle.addClass(
        "ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom"
      );
      $toggleAccordionContent
        .addClass(
          "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"
        )
        .hide();

      $toggleAccordionTitle.each(function () {
        var $thisTitle = $(this);

        $thisTitle.hover(function () {
          $thisTitle.toggleClass("ui-state-hover");
        });

        $thisTitle.on("click", function () {
          $thisTitle.toggleClass(
            "ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom"
          );
          $thisTitle
            .next()
            .toggleClass("ui-accordion-content-active")
            .slideToggle(400);
        });
      });
    },
  };

  StaxAccordion.fn.init();
})(jQuery);
