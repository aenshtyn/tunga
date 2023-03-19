(function ($) {
  "use strict";
  $(document).ready(function () {
    // init jQuery UI Tabs
    setTimeout(function () {
      $(".dtheme-cmb2-tabs").tabs();
    });
  });

  window.CMB2 = (function (window, document, $, undefined) {
    $('ul.cmb2-image-select-list li input[type="radio"]').click(function (e) {
      e.stopPropagation(); // stop the click from bubbling
      $(this)
        .closest("ul")
        .find(".cmb2-image-select-selected")
        .removeClass("cmb2-image-select-selected");
      $(this).parent().closest("li").addClass("cmb2-image-select-selected");
    });
  })(window, document, jQuery);
})(jQuery);
