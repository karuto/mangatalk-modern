/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {
console.log('Hey', ss);
// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var mtNamespace = {
  // All pages
  common: {
    init: function() {
      /* JavaScript to be fired on all pages */
      mtFunctions.globalController();
      /* END JavaScript to be fired on all pages */
    }
  },
  // Home page
  home: {
    init: function() {
      /* JavaScript to be fired on the home page */
      mtFunctions.homeController();
      /* END JavaScript to be fired on the home page */
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = mtNamespace;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

// Load all your jQuery scripts from this point onward.



// Declare additional namespaces
var mtFunctions = mtFunctions || {};

mtFunctions = {

  navOn: function(nav) {
    // console.log("is-normal");
    nav.removeClass("is-immersive").addClass("is-normal");
  },

  navOff: function(nav) {
    console.log("is-immersive");
    nav.removeClass("is-normal");
  },

  scrollController: function(mtNav) {
    var mt = this;
    $(window).scroll(function() {
      var scrollThreshold = $('#mt-front');
      var hT = scrollThreshold.offset().bottom,
          hH = scrollThreshold.outerHeight(),
          wH = $(window).height(),
          wS = $(this).scrollTop();
      // console.log("thres height", hT, "outerHeight", hH, "windowHeight", wH, "scrollTop", wS);
      if ((wS) > (hH)){
        mtNav.css("position", "fixed");
        mt.navOn(mtNav);
      } else {
        mtNav.css("position", "relative");
        mt.navOff(mtNav);

      }
    });
  }, /* END scrollController */

  /* Reference: http://getbootstrap.com/css/#grid-options
  xs: width <768px
  sm: width 768-992
  md: width 992-1200
  lg: width >1200
  */
  globalController: function() {
    var mt = this;
    $('[data-toggle="tooltip"]').tooltip();

    var mtSearch = $("#mt-search");
    mtSearch.hide();

    // Top banner related functions
    var mtNav = $('.mt-banner');

    if (mtNav.length) { // if banner exists
      // Change banner display mode
      if ($('.cover-image').length) { // cover exists, immersive mode
        // Hover toggle visual effect on top banner
        mtNav.hover(function() {
          mt.navOff(mtNav);
        }, function() {
          mt.navOn(mtNav);
        });
        mt.navOff(mtNav);
      } else { // no cover, normal mode
        mt.navOn(mtNav);
      }

      // Toggle global search bar via button switch
      $("#nav-search").click(function () {
        var icon = $(this).find("#nav-search-icon");
        if (icon.hasClass("glyphicon-zoom-out")) {
          // Currently it's showing search, make it hidden!
          if (mtSearch.length) { // if search exists
            mtNav.css("top", "0");
            $("#cover-story").css("top", "0");
            mtSearch.hide();
          }
          
          icon.removeClass("glyphicon-zoom-out");
          icon.addClass("glyphicon-search");
        } else {
          // Currently it's not showing search, make it show!
          if (mtSearch.length) { // if search exists
            mtNav.css("top", "50px");
            $("#cover-story").css("top", "50px");
            mtSearch.show();
          }
          
          icon.removeClass("glyphicon-search");
          icon.addClass("glyphicon-zoom-out");
        }
      });
      
    } else {
      // console.log("Banner did not exist on this page");
    }
    
    var width = $(window).width(); 
    var screenLargeEnough = ($(window).width() > 1200) ? true : false;
    // TODO: mobile users won't be able to see this. Find a way to let user disable all hover effects.

    // Hover / toggle effect on article blocks
    var blocks = $(".mt-block");
    if (blocks.length) { // if blocks exist

      blocks.mouseenter(function () {
        // If you hovered over block, darken its background
        var bg = $(this).find(".cover-shade");
        bg.css({ opacity: 1 });

        // If you hovered over block, show its summary
        var summary = $(this).find(".excerpt");
        summary.removeClass("hidden");
        summary.addClass("entry-summary");
      });
      blocks.mouseleave(function () {
        // If you lefted block, lighten its background
        var bg = $(this).find(".cover-shade");
        bg.css({ opacity: 0.8 });

        // If you lefted block, hide its summary
        var summary = $(this).find(".excerpt");
        summary.removeClass("entry-summary");
        summary.addClass("hidden");
      });

    } else {
      // console.log("No blocks exist on this page");
    }

    this.scrollController(mtNav);
  }, /* END globalController */

  homeController: function() {
    $('#home-cover').lazyLoadImage();

    // Activate story link remove feature
    var storyRemove = $('#story-remove');
    if (storyRemove.length) {
      storyRemove.click(function () {
        $('.mt-story-banner').fadeOut();
      });
    }

    // Retrieve inner link and apply to title of frontpage cover
    var mtFrontcover = $('#mt-front');
    if (mtFrontcover.length) {
      $("#cover-story").click(function () {
        window.location = $("#cover-story-link").attr("href");
      });
    } else {
      console.log("Front cover did not exist on this page");
    }
  }, /* END homeController */


  p: function(printTarget) {
    if (!arguments.length) {
      console.log("needs input");
      return false;
    }
    console.log(printTarget);  
    return true;
  } /* END p */

};