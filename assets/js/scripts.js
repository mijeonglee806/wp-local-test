var Module = (function() {

  // Menu Selected States
  var _navSelectedState = function() {
    $(".menu a").each(function() {
      var $this = $(this);
      if ($this.attr('href') === window.location.pathname + window.location.search || $this.attr('href') === window.location.href) {
        $this.addClass('selected').parents('li').addClass('selected');
      }
    });
  };

  // Desktop Menu
  var _navFramework = function() {
    // Initialize Menu Plugin
    var menu = $(".menu").dropdown_menu({
      site_class: 'root',
      drawer_toggle_class: 'drawer-toggle',
      drawer_overlay_class: 'content-overlay',
      sub_indicator_class: 'menu-arrow',
      hover_class: 'drop-open',
      sub_indicators: true,
      touch_double_click: true,
      mobile_main_link_clickable: true,
      open_delay: 150,
      close_delay: 100
    });

    // Set global menu variable for accessibility function
    window.cd_menu = menu;

    // Sticky Header
    var $body = $("body");
    var sticky_header = function(scroll, direction) {
      if (scroll > 650) {
        $body.addClass("sticky-header sticky-header--down");
      } else if (scroll < 650 && direction === "up") {
        $body.addClass("sticky-header sticky-header--up").removeClass("sticky-header--down");
      }
      if (scroll < 400) {
        $body.removeClass("sticky-header sticky-header--down sticky-header sticky-header--up");
      }
    };

    var lastScrollTop = 0;
    $(window).scroll(function() {
      var $scroll = $(this).scrollTop();
      var direction = "up";
      if ($scroll > lastScrollTop) {
        direction = "down";
      }
      lastScrollTop = $scroll;
      sticky_header($scroll, direction);
    });

    sticky_header($(window).scrollTop());

  }; // end nav framework

  // Slide Toggle
  var _slideToggle = function() {
    var $slideContainer = $(".slide-toggle-container"),
      $slideToggle = $slideContainer.find(".slide-toggle");

    $slideToggle.click(function(e) {
      e.preventDefault();
      var $this = $(this);
      $this.toggleClass("active");
      $this.parents(".slide-toggle-container").find(".slide-content").slideToggle();
    });

    // Accessibility - Works on Enter
    $slideToggle.keypress(function(e) {
      var key = e.which;
      if (key === 32) {
        $(this).click();
        return false;
      }
    });

  }; // end slide toggle

  // Responsive Tabs
  var _tabs = function() {
    // Horizontal Tabs
    $('.resp-tabs--horizontal').easyResponsiveTabs({
      type: 'horizontal',
      tabidentify: 'resp-tabs-group'
    });
    // Vertical Tabs
    $('.resp-tabs--vertical').easyResponsiveTabs({
      type: 'vertical',
      tabidentify: 'resp-tabs-group'
    });
  }; // end tabs


  // Initalize Private Methods
  var init = function() {
    _navSelectedState();
    _navFramework();
    _slideToggle();
    _tabs();
  };

  // Self Invoke Init Function Any Other Public Methods
  return {
    init: init
  };

})();

// Run Init Public Method When Dom is Ready
$(function() {
  Module.init();
});
