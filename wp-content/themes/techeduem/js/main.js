(function ($) {
  "use strict";
  /**
   * Header Area start
   */
  $("body.header-sticky header").addClass("animated");
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 245) {
      $("body.header-sticky header").removeClass("is-sticky");
    } else {
      $("body.header-sticky header").addClass("is-sticky");
    }
  });

  $("header.header-sticky").addClass("animated");
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 245) {
      $("header.header-sticky").removeClass("is-sticky");
    } else {
      $("header.header-sticky").addClass("is-sticky");
    }
  });

  if ($("body").hasClass("logged-in")) {
    var top_offset = $(".header-area").height() + 32;
  } else {
    var top_offset = $(".header-area").height() - 0;
  }

  $(".primary-nav-one-page nav").onePageNav({
    scrollOffset: top_offset,
    scrollSpeed: 750,
    easing: "swing",
    currentClass: "active",
  });

  $("body").scrollspy({ target: ".primary-nav-wrap nav" });

  $(".primary-nav-one-page nav ul li:first-child").addClass("active");

  $(".primary-nav-wrap > nav > ul > li").slice(-2).addClass("last-elements");

  /*-- Mobile Menu --*/

  $(".primary-nav-wrap nav").meanmenu({
    meanScreenWidth: mobile_menu_data.menu_width,
    meanMenuContainer: ".mobile-menu",
    meanMenuClose: '<i class="fa fa-times"></i>',
    meanMenuOpen: '<i class="fa fa-bars"></i>',
    meanRevealPosition: "right",
    meanMenuCloseSize: "25px",
  });

  var mainMenuNav = $(".main-menu nav");
  mainMenuNav.meanmenu({
    meanScreenWidth: mobile_menu_data.menu_width,
    meanMenuContainer: ".mobile-menu",
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: "right",
    meanMenuCloseSize: "0",
  });

  /*
   * Header Transparent
   */
  function headerTransparentTopbar() {
    var headerTopbarHeight = $(".header-top-area").innerHeight(),
      trigger = $(".main-header.header-transparent"),
      bodyTrigger = $("body.logged-in .main-header.header-transparent");
    if (trigger.parents().find(".header-top-area")) {
      trigger.css("top", headerTopbarHeight + "px");
    }
    if (bodyTrigger.parents().find(".header-top-area")) {
      bodyTrigger.css("top", headerTopbarHeight + 32 + "px");
    }
  }
  headerTransparentTopbar();

  /**
   * ScrollUp
   */
  function backToTop() {
    var didScroll = false,
      scrollTrigger = $("#back-to-top");

    scrollTrigger.on("click", function (e) {
      $("body,html").animate({ scrollTop: "0" });
      e.preventDefault();
    });

    $(window).scroll(function () {
      didScroll = true;
    });

    setInterval(function () {
      if (didScroll) {
        didScroll = false;

        if ($(window).scrollTop() > 250) {
          scrollTrigger.css("right", 20);
        } else {
          scrollTrigger.css("right", "-50px");
        }
      }
    }, 250);
  }
  backToTop();

  /**
   * Blog Gallery Post
   */
  $(".blog-gallery").owlCarousel({
    loop: true,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left"></i>',
      '<i class="fa fa-angle-right"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });

  /**
   * Enable Footer Fixed effect
   */
  function fixedFooter() {
    var fooCheck = $("footer").hasClass("fixed-footer-enable");
    if (fooCheck) {
      $(".site-wrapper").addClass("fixed-footer-active");
    }
    var FooterHeight = $("footer.fixed-footer-enable").height(),
      winWidth = $(window).width();
    if (winWidth > 991) {
      $(".fixed-footer-active").css({ "margin-bottom": FooterHeight });
      $(".fixed-footer-active .site-content").css({ background: "#ffffff" });
    } else {
      $("footer").removeClass("fixed-footer-enable");
    }
  }
  fixedFooter();

  /**
   * Page Preloading Effects
   */
  $(window).on("load", function () {
    $(".loading-init").fadeOut(500);
  });

  /**
   * Blog Masonry
   */
  $(".blog-masonry").imagesLoaded(function () {
    // init Isotope
    var $grid = $(".blog-masonry").isotope({
      itemSelector: ".grid-item",
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: ".grid-item",
      },
    });
  });

  // Sidebar Menu
  var menuToggle = $(".menu-toggle");
  var sideMenuClose = $(".side-menu-close");
  var sideMenuWrap = $(".side-menu-wrap");
  var sideMenuOverlay = $(".side-menu-overlay");

  menuToggle.on("click", function () {
    sideMenuWrap.addClass("side-menu-open");
    sideMenuOverlay.addClass("side-menu-open");
  });
  sideMenuClose.on("click", function () {
    sideMenuWrap.removeClass("side-menu-open");
    sideMenuOverlay.removeClass("side-menu-open");
  });
  sideMenuOverlay.on("click", function () {
    sideMenuWrap.removeClass("side-menu-open");
    sideMenuOverlay.removeClass("side-menu-open");
  });

  /*--
    Sidebar Submenu
	------------------------*/
  $(".side-menu .menu-item-has-children > a").prepend(
    '<i class="expand menu-expand fa fa-angle-down"></i>'
  );
  $(".side-menu .menu-item-has-children ul").slideUp();

  /*-- Category Sub Menu --*/
  $(".side-menu").on("click", "li a, li a .menu-expand", function (e) {
    var $a = $(this).hasClass("menu-expand") ? $(this).parent() : $(this);
    if ($a.parent().hasClass("menu-item-has-children")) {
      if ($a.attr("href") === "#" || $(this).hasClass("menu-expand")) {
        if ($a.siblings("ul:visible").length > 0) {
          $a.find(".menu-expand")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
          $a.siblings("ul").slideUp();
        } else {
          $(this)
            .parents("li")
            .siblings("li")
            .find(".menu-expand")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
          $(this).parents("li").siblings("li").find("ul:visible").slideUp();
          $a.find(".menu-expand")
            .removeClass("fa-angle-down")
            .addClass("fa-angle-up");
          $a.siblings("ul").slideDown();
        }
      }
    }
    if ($(this).hasClass("menu-expand") || $a.attr("href") === "#") {
      e.preventDefault();
      return false;
    }
  });

  /*--
		Shop page select
	-----------------------------------*/
  $(".orderby").niceSelect();

  /*----- 
        Cart Plus Minus
    --------------------------------*/
  $("body").on("click", ".quantity .plus", function (e) {
    var $input = $(this).parent().parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.trigger("change");
  });
  $("body").on("click", ".quantity .minus", function (e) {
    var $input = $(this).parent().parent().find("input");
    var value = parseInt($input.val()) - 1;
    if (value < 0) value = 0;
    $input.val(value);
    $input.trigger("change");
  });

  /*----- 
        Product Zoom
    --------------------------------*/
  $(".product-zoom").elevateZoom({
    zoomType: "inner",
    cursor: "crosshair",
    gallery: "pro-thumb-img",
    galleryActiveClass: "active",
  });

  /*---------------------
        countdown
      --------------------- */
  $("[data-countdown]").each(function () {
    var $this = $(this),
      finalDate = $(this).data("countdown");
    $this.countdown(finalDate, function (event) {
      $this.html(
        event.strftime(
          '<span class="cdown day">%-D : </span> <span class="cdown hour">%-H :</span> <span class="cdown minutes">%M :</span><span class="cdown second">%S</span>'
        )
      );
    });
  });

  /*====== sidebarSearch ======*/
  function sidebarSearch() {
    var searchTrigger = $("button.sidebar-trigger-search"),
      endTriggersearch = $("button.search-close"),
      container = $(".main-search-active");

    searchTrigger.on("click", function () {
      container.addClass("inside");
    });

    endTriggersearch.on("click", function () {
      container.removeClass("inside");
    });
  }
  sidebarSearch();

  //Quickview
  $(".product-wrapper").each(function () {
    $(this).on("mouseover click", function () {
      $(this).addClass("hover");
    });
    $(this).on("mouseleave", function () {
      $(this).removeClass("hover");
    });
  });

  //Add quick view box
  $("body").append(
    '<div class="modal fade woocommerce" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-android-close" aria-hidden="true">x</span></button><div class="modal-dialog product" role="document"><div class="modal-content"><div class="modal-body"></div></div></div></div>'
  );
  //show quick view
  $(".quickview").each(function () {
    var quickviewLink = $(this);
    var productID = quickviewLink.attr("data-quick-id");
    quickviewLink.on("click", function (event) {
      event.preventDefault();
      $(".modal-body").html(""); /*clear content*/
      $("body").addClass("quickview");
      window.setTimeout(function () {
        $.post(
          ajaxurl,
          {
            action: "techeduem_product_quickview",
            data: productID,
          },
          function (response) {
            console.log(response);
            $(".modal-body").html(response);
          }
        );
      }, 300);
    });
  });
  $(".closeqv").on("click", function (event) {
    $(".quickview-wrapper").removeClass("open");
    window.setTimeout(function () {
      $("body").removeClass("quickview");
    }, 500);
  });
})(jQuery);
